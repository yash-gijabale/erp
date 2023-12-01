<?php
require(APPPATH.'libraries/RestController.php');

require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;
class Login_api extends RestController{


	function __construct()

    {

        parent::__construct();

		error_reporting(0);

        ini_set('display_errors', 0);
		$this->load->model('Comman_model');
    }


    public function login_post($postData=array()){
		$postData = $this->post();
			$password = base64_encode($postData['password']);
			$user = $this->Comman_model->get_data('*','users', array('contact' => $postData['number'], 'password'=>$password));
            if($user)
            {
                $res = array(
                    'success' => TRUE,
                    'message' => 'succes'
                );
                $this->response($res, RestController::HTTP_OK);
            }else{
                $res = array(
                    'success' => FALSE,
                    'message' => 'Invalid Credintial'
                );
                $this->response($res, RestController::HTTP_OK);

            }

    }

}

