<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()

    {

        parent::__construct();

		error_reporting(0);

        ini_set('display_errors', 0);
		$this->load->model('Comman_model');
    } 
	
	public function index()
	{
		// $data['_view'] = 'login/user_login';
		if($this->session->has_userdata('user_data')){
			redirect('dashboard');	
		}else{

			$this->load->view('login/user_login');
		}
	}

	public function dashboard()
	{
		$data['total_developers'] = count($this->Comman_model->get_data('*','developer'));
		$data['total_projects'] = count($this->Comman_model->get_data('*','project'));
		$data['total_structurs'] = count($this->Comman_model->get_data('*','structure'));
		$data['total_observations'] = count($this->Comman_model->get_data('*','observations'));
		// print_r($data);exit;
		$data['_view'] = 'admin/dashboard';
		$this->load->view('template/view', $data);
	}

	public function login(){
		$postData = $this->input->post();
		if($postData){
			$password = base64_encode($postData['password']);
			// $user = $this->Comman_model->get_data('*','users', array('contact' => $postData['number'], 'password'=>$password));
			$user = $this->Comman_model->get_data_by_id('*','users', array('contact' => $postData['number'], 'password'=>$password));
			if($user){
				$this->session->set_userdata('user_data', $user);
				redirect('dashboard');
			}else{
				redirect('welcome/index');

			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_data');
		redirect('welcome/index');
	}


	public function test(){
		$data['_view'] = 'admin/test';
		$this->load->view('template/view', $data);
	}
}
