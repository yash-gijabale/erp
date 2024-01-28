<?php
require(APPPATH . 'libraries/RestController.php');

require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Observation_api extends RestController
{


    function __construct()
    {

        parent::__construct();

        // error_reporting(0);

        // ini_set('display_errors', 0);
        $this->load->model('Comman_model');

    }


    public function getObservationList_get($user_id)
    {
        // $user_session = $this->session->userdata('user_data');
            $user = $this->Comman_model->get_data_by_id('*', 'users', array('user_id' => $user_id));

            if(!empty($user)){
            $user_type = $user->user_type;
            $user_id = $user->user_id;
            if ($user_type == '1') {
                $observations= $this->Comman_model->get_data('*', 'observations');
                foreach ($observations as $obj) {
                    $obj->floors = json_decode($obj->floors);
                    foreach($obj->floors as $key=>$value){
                        $obj->floors[$key] = (int)$value;
                    }
                }

            } else {
                $table = get_history_table_by_role_id($user_type);
                $allow_projects = $this->Comman_model->get_data('*', 'user_project_access', array('user_id' => $user_id));
                // echo'<pre>';print_r($allow_projects);exit;

                $objects = array();
                foreach ($allow_projects as $userAccess) {
                    $join = array($this->db->join($table . ' b', 'a.observation_id=b.observation_id'));
                    $objects = $this->Comman_model->get_data('a.*,b.*', 'observations a', array('a.project_id' => $userAccess->project_id), $join);

                }

                foreach ($objects as $obj) {
                    $obj->floors = json_decode($obj->floors);
                    foreach($obj->floors as $key=>$value){
                        $obj->floors[$key] = (int)$value;
                    }
                }

                $observations = $objects;
            }
            $res = array(
                'success' => FALSE,
                'message' => 'response available',
                'result' => $observations
            );
            $this->response($res, RestController::HTTP_OK);
        }else{
            $res = array(
                'success' => FALSE,
                'message' => 'Login to access this resourse OR invalid user ID',
                'result' => []

            );
            $this->response($res, RestController::HTTP_BAD_REQUEST);
        }

    }


    public function newobservation_post($user_id)
    {
        $postData = $this->post();
        $user = $this->Comman_model->get_data_by_id('*', 'users', array('user_id' => $user_id));
        if($user){

            if ($postData) {

                $no = mt_rand(1000,9999999);
                // print_r($no);exit;
                // $isObjNumberExist = $this->Comman_model->
                $observation_param = array(
                    'client_id' => $postData['client_id'],
                    'project_id' => $postData['project_id'],
                    'structure_id' => $postData['structure_id'],
                    'floors' => $postData['floors'],
                    'tradegroup_id' => $postData['tradegroup_id'],
                    'activity_id' => $postData['activity_id'],
                    'observation_number' => $no,
                    'observation_category' => $postData['observation_category'],
                    'observation_type' => $postData['observation_type'],
                    'location' => $postData['location'],
                    'description' => $postData['description'] ? $postData['description'] : '',
                    'remark' => $postData['remark'],
                    'reference' => $postData['reference'] ? $postData['reference'] : '',
                    'observation_severity' => $postData['observation_severity'],
                    'site_representative' => $postData['site_representative'],
                    'status' => $postData['status'],
                    'closed_by' => $postData['closed_by'],
                    'observation_date' => $postData['observation_date'],
                    'target_date' => $postData['target_date'],
                    'created_by' => $user->user_id,
                    'temp_observation_number' => $postData['temp_observation_number']
                );
                // echo'<pre>';print_r($observation_param);exit;
                $observation_id = $this->Comman_model->insert_data('observations', $observation_param);

                //Adding temparory image name to db
                $observation_img = $postData['observation_image'];
                // print_r($observation_img);exit;

                foreach($observation_img as $key=>$img)
                {
                    $temp_img = array(
                        'observation_id' => $observation_id,
                        'temp_obj_id' => $postData['temp_observation_number'],
                        'image_name' => $img
                    );

                    $this->Comman_model->insert_data('temp_img_name', $temp_img);
                }
                
                $history_param = array
                (
                    'observation_id' => $observation_id,
                    'user_id' => $user->user_id,
                    'role_id' => $user->user_type,
                    'comment' => $postData['remark'],
                );
                $history_id = $this->Comman_model->insert_data('observation_history', $history_param);

                //Adding new observation to reviwer table
                $paramRview = array
                (
                    'observation_id' => $observation_id,
                    'obj_history_id' => $history_id,
                    'added_By' => $user->user_id,
                    'assigned_to' => $user->user_id,
                    'comment' => '',
                    'is_approved' => '0',
                );
                
                $ress = $this->Comman_model->insert_data('responsible_history', $paramRview);
                $resss = $this->Comman_model->insert_data('site_enginner_history', $paramRview);

                // if ($observation_id) {
                //     $image_name[] = $_FILES['observation_image'];
                //     $image_name[] = $_FILES['recommended_image'];
                //     // echo'<pre>';print_r($image_name);exit;
                //     foreach ($image_name as $imgkey => $imgval) {
                //         $pcount = count($imgval['name']);

                //         for ($i = 0; $i < $pcount; $i++) {
                //             if (($imgval['size'][$i] != 0) || ($imgval['size'][$i] != '')) {
                //                 $pdata = array();
                //                 $filenm = '';
                //                 $config['upload_path'] = UPLOAD_OBSERVATION;
                //                 $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
                //                 $this->upload->initialize($config);
                //                 //echo $_FILES[$image_name]['name'][$i];
                //                 $newName = 'observation' . '_' . str_replace(' ', '', $imgval['name'][$i]);
                //                 // echo'<pre>';print_r($newName);exit;
                //                 $_FILES['userfile']['name'] = $newName;
                //                 $_FILES['userfile']['type'] = $imgval['type'][$i];
                //                 $_FILES['userfile']['tmp_name'] = $imgval['tmp_name'][$i];
                //                 $_FILES['userfile']['error'] = $imgval['error'][$i];
                //                 $_FILES['userfile']['size'] = $imgval['size'][$i];
                //                 if (!$this->upload->do_upload('userfile')) {
                //                     $filenm = '';

                //                 } else {
                //                     $fname = $this->upload->data();
                //                     $filenm = UPLOAD_OBSERVATION . $fname['file_name'];

                //                 }
                //                 if ($filenm != '') {
                //                     $image_param = array(
                //                         'observation_id' => $observation_id,
                //                         'image_path' => $filenm,
                //                         'obj_history_id' => $history_id,
                //                         'image_type' => $imgkey
                //                     );
                //                     $this->Comman_model->insert_data('observation_images', $image_param);

                //                 }

                //             }
                //         }


                //     }
                // }

                // exit;
                if($history_id){
                    $Newobservation = $this->Comman_model->get_data_by_id('*', 'observations', array('observation_id' => $observation_id));
                    
                    $Newobservation->floors = json_decode($Newobservation->floors);
                    foreach($Newobservation->floors as $key=>$value){
                        $Newobservation->floors[$key] = (int)$value;
                    }
                    

                    $res = array(
                        'success' => TRUE,
                        'message' => 'Observation Created',
                        'result' => $Newobservation
        
                    );
                    $this->response($res, RestController::HTTP_OK);
                }

            }else{
                $this->response([], RestController::HTTP_BAD_REQUEST);

            }
        }else{
            $res = array(
                'success' => FALSE,
                'message' => 'Login to access this resourse OR invalid user ID',
                'result' => []

            );
            $this->response($res, RestController::HTTP_BAD_REQUEST);
        }

    }


}