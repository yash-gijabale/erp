<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Controller {

	function __construct()

    {

        parent::__construct();

		error_reporting(0);

        ini_set('display_errors', 0);
		$this->load->model('Comman_model');
    }
	

    public function check_list()
    {
        $postData = $this->input->post();
        if($postData)
        {
            if($postData['question_form'])
            {
             if($postData['question_check'])
             {
                foreach($postData['question_check'] as $question)
                {
                    $param = array('is_check' => '1');
                    $this->Comman_model->update_data('questions', $param, array('question_id' => $question));
                }
             }

            }

            if($postData['uncheck_question_form'])
            {
                if($postData['question_check'])
                {
                    foreach($postData['question_check'] as $question)
                    {
                        $param = array('is_check' => '0');
                        $this->Comman_model->update_data('questions', $param, array('question_id' => $question));
                    }
                }
            }
            $data['pre_data'] = $postData;
            $data['question_list'] = $this->Comman_model->get_data('*', 'questions', array('subgroup_id' => $postData['subgroup_id'], 'is_check' => '0'));
            $data['checked_question_list'] = $this->Comman_model->get_data('*', 'questions', array('subgroup_id' => $postData['subgroup_id'], 'is_check' => '1'));
            // echo'<pre>';print_r(json_encode($data['question_list']));exit;
        }

        $data['tradegroup'] = $this->Comman_model->get_data('*', 'trade_gruop');
        // print_r($data);exit;/
        $data['_view'] = 'checklist/check_list';
		$this->load->view('template/view', $data);
    }
	
}
