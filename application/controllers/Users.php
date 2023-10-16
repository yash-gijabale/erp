<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()

    {

        parent::__construct();

		error_reporting(0);

        ini_set('display_errors', 0);
		$this->load->model('Comman_model');
    }
	
	function user_list(){

        $data['users'] = $this->Comman_model->get_data('*','users');

        $data['_view'] = 'users/user_list';
        $this->load->view('template/view', $data);
    }
    
    public function create_user(){

        $postData = $this->input->post();
        if($postData){
            $params = array(
                'first_name' => $postData['first_name'],
                'last_name' => $postData['last_name'],
                'password' => base64_encode($postData['password']),
                'contact' => $postData['contact_number'],
                'email' => $postData['email'],
                'user_type' => $postData['user_type']
            );
            $res = $this->Comman_model->insert_data('users', $params);
            if($res){
                redirect('user-list');
            }
        }

        $data['_view'] = 'users/new_user';
        $this->load->view('template/view', $data);
    }

    public function edit_user($user_id){

        if($user_id){
            $postData = $this->input->post();
            if($postData){
                $params = array(
                    'first_name' => $postData['first_name'],
                    'last_name' => $postData['last_name'],
                    'contact' => $postData['contact_number'],
                    'email' => $postData['email'],
                    'user_type' => $postData['user_type']
                );
                $res = $this->Comman_model->update_data('users', $params, array('user_id' => $user_id));
            }
            $data['user'] = $this->Comman_model->get_data_by_id('*', 'users', array('user_id'=>$user_id));
            $data['_view'] = 'users/edit_user';
            $this->load->view('template/view', $data);
        }else{

            redirect('user-list');
        }

    }


    public function delete_user($user_id){
        if($user_id){
            $res = $this->Comman_model->permanant_delete('users', array('user_id' => $user_id));
            redirect('user-list');

        }else{
            redirect('user-list');
        }
    }

}
