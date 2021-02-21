<?php
/**
*Author 	: Mashudi Rohmat Amd. Kom.
*Project 	: Member Management `Kalasan Youth`
*Year 		: 2021
*/
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller
{
	
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('M_user','user');
	}

	function users_get() {
		if ($this->user->users()) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => $this->user->users()
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function user_get() {
		$id = $this->input->get('id');
		if ($this->user->users($id)) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => $this->user->users($id)
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function add_user_post(){
		$data = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'role' => $this->input->post('role'),
			'mst_group' => $this->input->post('mst_group'),
			'is_active' => $this->input->post('is_active')
		);

		if ($this->user->add($data)) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => $data
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function update_user_post(){
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'role' => $this->input->post('role'),
			'mst_group' => $this->input->post('mst_group'),
			'is_active' => $this->input->post('is_active')
		);

		if ($this->input->post('password') != $this->input->post('old_password')) {
			$data['password'] = md5($this->input->post('password'));
		}
		
		if ($this->user->update($data)) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => $data
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function delete_post(){
		$id = $this->input->post('id');
		$this->user->delete($id);
		$this->set_response([
			'status' => TRUE,
			'message' => 'success'
		], REST_Controller::HTTP_OK);
	}
}