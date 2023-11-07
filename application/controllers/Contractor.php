<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contractor extends CI_Controller {

	function __construct()

    {

        parent::__construct();

		error_reporting(0);

        ini_set('display_errors', 0);
		$this->load->model('Comman_model');
    }


    public function add_workers()
    {

        $postData = $this->input->post();
        if($postData){
            // echo'<pre>';print_r($postData);exit;
            $param = array
            (
                'developer_id' => $postData['developer_id'],
                'project_id' => $postData['project_id'],
                'worker_name' => $postData['name'],
                'contact_number' => $postData['contact'],
                'address' => $postData['address'],
                'birth_date' => $postData['birth_date'],
                'age' => $postData['age'],
            );
            $this->Comman_model->insert_data('workers', $param);
        }
        $data['all_developers'] = $this->Comman_model->get_data('*','developer');
        $data['_view'] = 'contractor/add_workers';
		$this->load->view('template/view', $data);
    }


    public function workers_list()
    {
        $postData = $this->input->post();
        if($postData){
            // print_r($postData);exit;
            $data['worker_list'] = $this->Comman_model->get_data('*', 'workers', array('project_id' => $postData['project_id']));
        }else{
            $data['worker_list'] = [];
        }
        $data['select_project'] = $postData['project_id'];
        $data['projects'] = $this->Comman_model->get_data('*','project');
        $data['_view'] = 'contractor/workers_list';
		$this->load->view('template/view', $data);   
    }
}

?>