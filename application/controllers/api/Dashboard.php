<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*Author 	: Mashudi Rohmat Amd. Kom.
*Project 	: Member Management `Kalasan Youth`
*Year 		: 2021
*/
class Dashboard extends REST_Controller
{
	
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('M_dashboard','dashboard');
	}

	function totalmember_get(){
		if ($this->dashboard->total_member()) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => $this->dashboard->total_member()
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}


	function member_by_gender_get(){
		$male = $this->dashboard->member_by_gender('l');
		$female = $this->dashboard->member_by_gender('p');
		if ($male || $female) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => array('male' => $male, 'female' => $female)
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function member_by_category_get(){
		$pra_remaja = $this->dashboard->member_by_category('1');
		$remaja = $this->dashboard->member_by_category('2');
		if ($pra_remaja || $remaja) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => array('pra_remaja' => $pra_remaja, 'remaja' => $remaja)
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function member_by_origin_get(){
		$local = $this->dashboard->member_by_origin('1');
		$pendatang = $this->dashboard->member_by_origin('0');
		if ($local || $pendatang) {
			$this->set_response([
				'status' => TRUE,
				'message' => 'success',
				'data' => array('local' => $local, 'pendatang' => $pendatang)
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'failed'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function summary_group_get(){
		$groups = $this->dashboard->groups();
		$data = array();

		foreach ($groups as $k => $v) {
			$data[$k]['name'] = $v['name'];
			$data[$k]['total'] = $this->dashboard->total_member($v['id']);
			$data[$k]['male'] = $this->dashboard->member_by_gender('l',$v['id']);
			$data[$k]['female'] = $this->dashboard->member_by_gender('p',$v['id']);
			$data[$k]['remaja'] = $this->dashboard->member_by_category('2',$v['id']);
			$data[$k]['pre_remaja'] = $this->dashboard->member_by_category('1',$v['id']);
			$data[$k]['local'] = $this->dashboard->member_by_origin('1',$v['id']);
			$data[$k]['pendatang'] = $this->dashboard->member_by_origin('0',$v['id']);
		}
		if ($groups) {
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
}