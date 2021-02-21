<?php
/**
*Author 	: Mashudi Rohmat Amd. Kom.
*Project 	: Member Management `Kalasan Youth`
*Year 		: 2021
*/
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Masters extends REST_Controller
{
	
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('M_master','master');
	}

	function groups_get() {
		$id = null;
		if ($this->input->get('id') != null) {
			$id = $this->input->get('id');
		}

		if ($this->master->groups($id)) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => $this->master->groups($id)
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function add_group_post(){
		$data = array(
			'name' => $this->input->post('name'),
			'is_active' => $this->input->post('is_active')
		);

		if ($this->master->add_group($data)) {
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

	function update_group_post(){
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'is_active' => $this->input->post('is_active')
		);
		
		if ($this->master->update_group($data)) {
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

	function delete_group_post(){
		$id = $this->input->post('id');
		$this->master->delete_group($id);
		$this->set_response([
			'status' => TRUE,
			'message' => 'success'
		], REST_Controller::HTTP_OK);
	}

	function categories_get() {
		$id = null;
		if ($this->input->get('id') != null) {
			$id = $this->input->get('id');
		}
		
		if ($this->master->categories($id)) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => $this->master->categories($id)
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function add_categories_post(){
		$data = array(
			'name' => $this->input->post('name'),
			'is_active' => $this->input->post('is_active')
		);

		if ($this->master->add_categories($data)) {
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

	function update_categories_post(){
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'is_active' => $this->input->post('is_active')
		);
		
		if ($this->master->update_categories($data)) {
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

	function delete_categories_post(){
		$id = $this->input->post('id');
		$this->master->delete_categories($id);
		$this->set_response([
			'status' => TRUE,
			'message' => 'success'
		], REST_Controller::HTTP_OK);
	}
}