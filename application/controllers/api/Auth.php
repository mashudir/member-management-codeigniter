<?php
/**
*Author 	: Mashudi Rohmat Amd. Kom.
*Project 	: Member Management `Kalasan Youth`
*Year 		: 2021
*/
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Auth extends REST_Controller
{
	
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
		$this->load->model('M_auth','auth');
	}

	function admin_get(){
		$data = ['username'=>$this->input->get('username'),
				'password'=>md5($this->input->get('password'))];

		$auth = $this->auth->auth_admin($data);
		if ($auth) {
			
			$this->set_response([
                    'status' => TRUE,
                    'message' => 'Login success',
                    'data' => $auth
                ], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
                    'status' => FALSE,
                    'message' => 'Incorrect username or password'
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}
}
?>