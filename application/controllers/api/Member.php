<?php
/**
*Author 	: Mashudi Rohmat Amd. Kom.
*Project 	: Member Management `Kalasan Youth`
*Year 		: 2021
*/
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Member extends REST_Controller
{
	
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('M_member','member');
	}

	function members_get() {
		$group = $this->input->get('group');
		if ($this->member->members($group)) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => $this->member->members($group)
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function member_get() {
		$id = $this->input->get('id');
		if ($this->member->member($id)) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => $this->member->member($id)
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function add_member_post(){
		$data = array(
			'name' => $this->input->post('name'),
			'gender' => $this->input->post('gender'),
			'phone' => $this->input->post('phone'),
			'categories' => $this->input->post('categories'),
			'mst_group' => $this->input->post('mst_group'),
			'address' => $this->input->post('address'),
			'is_local' => $this->input->post('is_local'),
			'is_leave' => $this->input->post('is_leave'),
			'is_active' => $this->input->post('is_active'),
			'born_date' => $this->input->post('born_date'),
			'description' => $this->input->post('description')
		);

		if ($this->member->add_member($data)) {
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

	function update_member_post(){
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'gender' => $this->input->post('gender'),
			'phone' => $this->input->post('phone'),
			'categories' => $this->input->post('categories'),
			'mst_group' => $this->input->post('mst_group'),
			'address' => $this->input->post('address'),
			'is_local' => $this->input->post('is_local'),
			'is_leave' => $this->input->post('is_leave'),
			'is_active' => $this->input->post('is_active'),
			'born_date' => $this->input->post('born_date'),
			'description' => $this->input->post('description')
		);
		
		if ($this->member->update_member($data)) {
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
		$this->member->delete($id);
		$this->set_response([
			'status' => TRUE,
			'message' => 'success'
		], REST_Controller::HTTP_OK);
	}
}