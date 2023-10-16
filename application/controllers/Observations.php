<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Observations extends CI_Controller {

	function __construct()

    {

        parent::__construct();

		error_reporting(0);

        ini_set('display_errors', 0);
		$this->load->model('Comman_model');
        $this->load->library('upload');
    }
	
	public function new_observation()
	{
        $postData = $this->input->post();
        if($postData){
            
            $observation_param = array(
                'client_id' => $postData['developer_id'],
                'project_id' => $postData['project_id'],
                'structure_id' => $postData['structure_id'],
                'floors' => json_encode($postData['stages_id']),
                'tradegroup_id' => $postData['trade_group'],
                'activity_id' => $postData['activity_id'],
                'observation_number' => $postData['observation_number'],
                'observation_category' => $postData['category_id'],
                'observation_type' => $postData['observation_Type_id'],
                'location' => $postData['location'],
                'description' => $postData['decsription'],
                'remark' => $postData['remark'],
                'reference' => $postData['reference'],
                'observation_severity' => $postData['severity_id'],
                'site_representative' => $postData['site_representative'],
                'status' => $postData['status'],
                'observation_date' => $postData['observation_date'],
                'target_date' => $postData['target_date']
            );
            // echo'<pre>';print_r($observation_param);exit;
            $observation_id = $this->Comman_model->insert_data('observations', $observation_param);
            if($observation_id){
                $image_name[] = $_FILES['observation_image'];
                $image_name[] = $_FILES['recommended_image'];
                                        // echo'<pre>';print_r($image_name);exit;
                foreach($image_name as $imgkey=>$imgval)
                {
                                $pcount = count($imgval['name']);
                                                
                                for($i=0;$i<$pcount;$i++)
                                {
                                    if (($imgval['size'][$i] != 0) || ($imgval['size'][$i] != ''))
                                    {
                                        $pdata= array();$filenm='';
                                        $config['upload_path']   		= UPLOAD_OBSERVATION; 
                                        $config['allowed_types'] 		= 'gif|jpg|jpeg|png|pdf'; 		
                                        $this->upload->initialize($config);
                                        //echo $_FILES[$image_name]['name'][$i];
                                        $newName = 'observation'.'_'.str_replace(' ', '',$imgval['name'][$i]);
                                        // echo'<pre>';print_r($newName);exit;
                                        $_FILES['userfile']['name']		= $newName;
                                        $_FILES['userfile']['type']		= $imgval['type'][$i];
                                        $_FILES['userfile']['tmp_name']	= $imgval['tmp_name'][$i];
                                        $_FILES['userfile']['error']	= $imgval['error'][$i];
                                        $_FILES['userfile']['size']		= $imgval['size'][$i];    
                                        if ( !$this->upload->do_upload('userfile'))
                                        {
                                            $filenm = '';
    
                                        }		
                                        else
                                        {
                                            $fname = $this->upload->data();
                                            $filenm = UPLOAD_OBSERVATION.$fname['file_name'];				
                                            
                                        }
                                        if($filenm !=''){
                                            $image_param = array(
                                                'observation_id' => $observation_id,
                                                'image_path' => $filenm,
                                                'image_type' => $imgkey
                                            );
                                            $this->Comman_model->insert_data('observation_images',$image_param);
                                            
                                        }
                                        
                                    }
                                }
                                
                            
                }
            }
           
                    // exit;
        }
        
        $data['all_tradesgroup'] = $this->Comman_model->get_data('*','trade_gruop');
        $data['all_developers'] = $this->Comman_model->get_data('*','developer');
        $data['observation_type'] = $this->Comman_model->get_data('*','observation_type');
        $data['observation_severity'] = $this->Comman_model->get_data('*','observation_severity');
        $data['observation_category'] = $this->Comman_model->get_data('*','categories');
		$data['_view'] = 'observations/new_observation';
		$this->load->view('template/view', $data);
	}

    public function observation_list(){
        $data['all_observations'] = $this->Comman_model->get_data('*', 'observations');
        $data['_view'] = 'observations/observation_list';
		$this->load->view('template/view', $data);
    }

    public function edit_view_observation($observation_id){

        $postData = $this->input->post();
        if($postData){
            // echo'<pre>';print_r($postData);exit;
            $observation_param = array(
                'client_id' => $postData['developer_id'],
                'project_id' => $postData['project_id'],
                'structure_id' => $postData['structure_id'],
                'floors' => json_encode($postData['stages_id']),
                'tradegroup_id' => $postData['trade_group'],
                'activity_id' => $postData['activity_id'],
                'observation_category' => $postData['category_id'],
                'observation_type' => $postData['observation_Type_id'],
                'location' => $postData['location'],
                'description' => $postData['decsription'],
                'remark' => $postData['remark'],
                'reference' => $postData['reference'],
                'observation_severity' => $postData['severity_id'],
                'site_representative' => $postData['site_representative'],
                'status' => $postData['status'],
                'observation_date' => $postData['observation_date'],
                'target_date' => $postData['target_date']
            );
            // echo'<pre>';print_r($observation_param);exit;
          $this->Comman_model->update_data('observations', $observation_param, array('observation_id'=>$observation_id));
        }

                $image_name[] = $_FILES['observation_image'];
                $image_name[] = $_FILES['recommended_image'];
                if(!empty($image_name[0])){
                //     echo'<pre>';print_r($image_name);exit;
                foreach($image_name as $imgkey=>$imgval)
                {
                                $pcount = count($imgval['name']);
                                                
                                for($i=0;$i<$pcount;$i++)
                                {
                                    if (($imgval['size'][$i] != 0) || ($imgval['size'][$i] != ''))
                                    {
                                        $pdata= array();$filenm='';
                                        $config['upload_path']   		= UPLOAD_OBSERVATION; 
                                        $config['allowed_types'] 		= 'gif|jpg|jpeg|png|pdf'; 		
                                        $this->upload->initialize($config);
                                        //echo $_FILES[$image_name]['name'][$i];
                                        $newName = 'observation'.'_'.str_replace(' ', '',$imgval['name'][$i]);
                                        // echo'<pre>';print_r($newName);exit;
                                        $_FILES['userfile']['name']		= $newName;
                                        $_FILES['userfile']['type']		= $imgval['type'][$i];
                                        $_FILES['userfile']['tmp_name']	= $imgval['tmp_name'][$i];
                                        $_FILES['userfile']['error']	= $imgval['error'][$i];
                                        $_FILES['userfile']['size']		= $imgval['size'][$i];    
                                        if ( !$this->upload->do_upload('userfile'))
                                        {
                                            $filenm = '';
    
                                        }		
                                        else
                                        {
                                            $fname = $this->upload->data();
                                            $filenm = UPLOAD_OBSERVATION.$fname['file_name'];				
                                            
                                        }
                                        if($filenm !=''){
                                            $image_param = array(
                                                'observation_id' => $observation_id,
                                                'image_path' => $filenm,
                                                'image_type' => $imgkey
                                            );
                                            $this->Comman_model->insert_data('observation_images',$image_param);
                                            
                                        }
                                        
                                    }
                                }
                            
                }
            }
        $data['observation'] = $this->Comman_model->get_data_by_id('*','observations', array('observation_id'=> $observation_id));
        $data['observation_image'] = $this->Comman_model->get_data('*','observation_images', array('observation_id'=> $observation_id, 'image_type'=>'0'));
        $data['recommendation_image'] = $this->Comman_model->get_data('*','observation_images', array('observation_id'=> $observation_id, 'image_type'=>'1'));
        $data['floors'] = get_floors_by_structure_id($data['observation']->structure_id);
        // echo'<pre>';print_r($data['floors']);exit;
        $data['all_tradesgroup'] = $this->Comman_model->get_data('*','trade_gruop');
        $data['all_developers'] = $this->Comman_model->get_data('*','developer');
        $data['observation_type'] = $this->Comman_model->get_data('*','observation_type');
        $data['observation_severity'] = $this->Comman_model->get_data('*','observation_severity');
        $data['observation_category'] = $this->Comman_model->get_data('*','categories');
		$data['_view'] = 'observations/edit_view_observation';
		$this->load->view('template/view', $data);
    }


    public function remove_observation($id){
            if($id){
                $this->Comman_model->permanant_delete('observations', array('observation_id'=> $id));
                $this->Comman_model->permanant_delete('observation_images', array('observation_id'=> $id));
                redirect('index.php/observation-list');
            }
            
    }

    public function delete_image ($id,$obj_id){
        if($id){
            $this->Comman_model->permanant_delete('observation_images', array('image_id'=> $id));
            redirect('index.php/edit-view-observation/'.$obj_id);
        }
    }

}
