<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChecklistAllocation extends CI_Controller {

	function __construct()

    {

        parent::__construct();

		error_reporting(0);

        ini_set('display_errors', 0);
		$this->load->model('Comman_model');
    }
	

    public function checklistAllocation()
    {
        $postData = $this->input->post();
        if($postData)
        {
            echo'<pre>';print_r($postData);exit;
        }
        $data['checkList'] = $this->Comman_model->get_data('*', 'checklist');
        $data['all_developers'] = $this->Comman_model->get_data('*', 'developer');
        $data['_view'] = 'checklistAllocation/checklistAllocation';
		$this->load->view('template/view', $data);
    }

    public function get_subgroup_by_checklist_id()
    {
        $checklist_id = $this->input->post('checklist_id');
        $join = array($this->db->join('checklist_subgroup b','b.subgroup_id=a.subgroup_id'));
        $subgroups = $this->Comman_model->get_data('a.*, b.*','subgroup a', array('b.checklist_id' => $checklist_id));
        
        echo json_encode($subgroups);
    }

    public function get_checklist_questions_by_checklist_subgroup()
    {
        $checklist_id = $this->input->post('checklist_id');
        $subgroup_id = $this->input->post('subgroup_id');

        $join2 = array($this->db->join('checklist_questions b','b.question_id=a.question_id'));
        $questionid_list = $this->Comman_model->get_data('a.*, b.*', 'questions a', array('b.checklist_id'=>$checklist_id, 'b.subgroup_id'=>$subgroup_id));
        echo json_encode($questionid_list);

    }
    
}
