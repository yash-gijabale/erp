<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contractor extends CI_Controller
{

    function __construct()
    {

        parent::__construct();

        error_reporting(0);

        ini_set('display_errors', 0);
        $this->load->model('Comman_model');
        $this->load->library('upload');

    }


    public function add_workers()
    {

        $postData = $this->input->post();
        if ($postData) {
            $image_name[] = $_FILES['adhaar_card'];
            $image_name[] = $_FILES['pan_card'];
            $image_name[] = $_FILES['user_image'];
            // echo '<pre>';
            // print_r($image_name);
            // exit;
            $image_param = array();
            foreach ($image_name as $imgkey => $imgval) {
                    if (($imgval['size']!= 0) || ($imgval['size']!= '')) {
                        $pdata = array();
                        $filenm = '';
                        $config['upload_path'] = UPLOAD_OBSERVATION;
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
                        $this->upload->initialize($config);
                        //echo $_FILES[$image_name]['name'][$i];
                        $newName = 'observation' . '_' . str_replace(' ', '', $imgval['name']);
                        $_FILES['userfile']['name'] = $newName;
                        $_FILES['userfile']['type'] = $imgval['type'];
                        $_FILES['userfile']['tmp_name'] = $imgval['tmp_name'];
                        $_FILES['userfile']['error'] = $imgval['error'];
                        $_FILES['userfile']['size'] = $imgval['size'];
                        if (!$this->upload->do_upload('userfile')) {
                            $filenm = '';

                        } else {
                            $fname = $this->upload->data();
                            $filenm = UPLOAD_OBSERVATION . $fname['file_name'];

                        }
                        if ($filenm != '') {
                            $image_param [] = $filenm;
                            // $this->Comman_model->insert_data('observation_images', $image_param);
                        }
                }
            }
            // echo'<pre>';print_r($image_param);exit;

            $param = array
            (
                'developer_id' => $postData['developer_id'],
                'project_id' => $postData['project_id'],
                'worker_name' => $postData['name'],
                'contact_number' => $postData['contact'],
                'address' => $postData['address'],
                'birth_date' => $postData['birth_date'],
                'age' => $postData['age'],
                'adhaar_card' => $image_param[0],
                'pan_card' => $image_param[1],
                'user_image' => $image_param[2]
            );
            $this->Comman_model->insert_data('workers', $param);
        }
        $data['all_developers'] = $this->Comman_model->get_data('*', 'developer');
        $data['_view'] = 'contractor/add_workers';
        $this->load->view('template/view', $data);
    }


    public function workers_list()
    {
        $postData = $this->input->post();
        if ($postData) {
            // print_r($postData);exit;
            $data['worker_list'] = $this->Comman_model->get_data('*', 'workers', array('project_id' => $postData['project_id']));
        } else {
            $data['worker_list'] = [];
        }
        $data['select_project'] = $postData['project_id'];
        $data['projects'] = $this->Comman_model->get_data('*', 'project');
        $data['_view'] = 'contractor/workers_list';
        $this->load->view('template/view', $data);
    }


    public function get_docs()
    {
        $id = $this->input->post('worker_id');
        $worker_data = $this->Comman_model->get_data_by_id('*', 'workers', array('worker_id' =>  $id));
        echo json_encode($worker_data);
    }

    public function add_attendence()
    {
        $postData = $this->input->post();
            // echo'<pre>';print_r($postData);exit;

        if($postData)
        {
            $param = array
            (
                'worker_id' => $postData['worker_id'],
                'att_date' => $postData['att_date'],
                'att_type' => $postData['att_status'],
                'att_month' => date('m', strtotime($postData['att_date'])),
                'att_year' => date('Y', strtotime($postData['att_date'])),
                
            );
            $res = $this->Comman_model->insert_data('worker_attendence', $param);
            if($res)
            {
                $data['worker_list'] = $this->Comman_model->get_data('*', 'workers', array('project_id' => $postData['project_id']));
                $data['select_project'] = $postData['project_id'];
                $data['projects'] = $this->Comman_model->get_data('*', 'project');
                $data['_view'] = 'contractor/workers_list';
                $this->load->view('template/view', $data);
            }
            // echo'<pre>';print_r($param);exit;

        }
    }

    public function view_profile($id)
    {
        $current_month = date('m');
        $current_year = date('Y');
        $days=cal_days_in_month(CAL_GREGORIAN,$current_month,$current_year);
        $att_array = array();
        for ($i = 1; $i <= $days; $i++) { 
            # code...
            $att = array();
            $row_date = $i.'-'.$current_month.'-'.$current_year;
            $date = date('Y-m-d', strtotime($row_date));
            $get_presenty = $this->Comman_model->get_data_by_id('*','worker_attendence', array('worker_id'=>$id, 'att_date'=>$date));
            $att['date'] = $date;
            $att['presenty_status'] = strval($get_presenty->att_type);
            array_push($att_array, $att);

        }
        // echo'<pre>';print_r($att_array);exit;
        $data['att_data'] = $att_array;
        $data['user_data'] = $this->Comman_model->get_data_by_id('*', 'workers', array('worker_id' => $id));
        $data['_view'] = 'contractor/profile';
        $this->load->view('template/view', $data);
    }
}

?>