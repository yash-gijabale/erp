<?php
require(APPPATH . 'libraries/RestController.php');

require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Project_api extends RestController
{


    function __construct()
    {

        parent::__construct();

        error_reporting(0);

        ini_set('display_errors', 0);
        $this->load->model('Comman_model');
        $this->load->module('Projects');

    }


    public function project_list_get()
    {
        // $data['all_projects'] = $this->Comman_model->get_data('*','project');
        $data = $this->Comman_model->get_data('*', 'project');
        $this->response($data, RestController::HTTP_OK);

    }


    public function add_project_post()
    {
        $postData = $this->post();
        if ($postData) {
            $pramas = array(
                'project_name' => $postData['project_name'],
                'developer_id' => $postData['developer_id'],
                'project_location' => $postData['project_location'],
                'configuration' => $postData['configuration'],
                'project_type' => $postData['project_type'],
                'mr_name' => $postData['mr_name'],
                'email_id' => $postData['email_id'],
                'contact_number' => $postData['contact_number']
            );

            // echo'<pre>';print_r($pramas);exit;
            $res = $this->Comman_model->insert_data('project', $pramas);
            $this->response($res, RestController::HTTP_OK);
        }

    }

    public function edit_project($details = array())
    {

        $pramas = array(
            'developer_id' => $details['developer_id'],
            'project_name' => $details['project_name'],
            'project_location' => $details['project_location'],
            'configuration' => $details['configuration'],
            'project_type' => $details['project_type'],
            'mr_name' => $details['mr_name'],
            'email_id' => $details['email_id'],
            'contact_number' => $details['contact_number']
        );
        $res = $this->Comman_model->update_Data('project', $pramas, array('project_id' => $project_id));

        $this->response($res, RestController::HTTP_OK);

    }


}
