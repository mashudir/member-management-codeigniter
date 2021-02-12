<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

/**
* 
*/
class User extends REST_Controller
{
	
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('M_user','user');
	}

	function user_get(){
		$id = $this->input->get('code');

		if ($id != '') {
			$data = $this->user->get_user($id);
			if ($data) {
				$expertise = $this->user->get_expertise($data['user_code']);
				$this->set_response([
					'status' => TRUE,
					'message' => 'success',
					'data' => $data,
					'expertise' => $expertise
				], REST_Controller::HTTP_OK);
			}else{
				$this->set_response([
					'status' => FALSE,
					'message' => 'failed'
				], REST_Controller::HTTP_NOT_FOUND);
			}
		}else{
			$result = $this->user->get_users();
			if ($result) {
				$this->set_response([
					'status' => TRUE,
					'message' => 'success',
					'data' => $result
				], REST_Controller::HTTP_OK);
			}else{
				$this->set_response([
					'status' => FALSE,
					'message' => 'failed'
				], REST_Controller::HTTP_NOT_FOUND);
			}
		}
	}

	function blockeduser_get(){
		if ($this->user->get_blocked_users()) {
			$this->set_response([
					'status' => TRUE,
					'message' => 'success',
					'data' => $this->user->get_blocked_users()
				], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
					'status' => FALSE,
					'message' => 'failed'
				], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function userByFilter_get(){
		$filter_text = $this->input->get('filter_text');
		$filter_prodi = (!empty($this->input->get('filter_prodi')))?$this->input->get('filter_prodi'):'filter';
		$filter_fakultas = (!empty($this->input->get('filter_fakultas')))?$this->input->get('filter_fakultas'):'filter';

		$result = $this->user->userByFilter($filter_text,$filter_prodi,$filter_fakultas);
		if ($result) {
			$temp_arr = array();
			$temp_order = array();
			if(!empty($result)){
				$no_temp = NULL;
				foreach($result as $k => $v){
					if($no_temp != $v['user_code']){
						$temp = $result[$k];
						foreach(['expertise_code','expertise'] as $t){
							unset($temp[$t]);
						}
						$temp_arr[] = $temp;
					}
					$no_temp = $v['user_code'];
					if($no_temp == $v['user_code']){
						$temp = $v;
						foreach(['user_code','user_name','user_email','user_npm','user_image','user_description','fakultas','jurusan','province','district','subdistrict', 'village', 'rt', 'rw', 'poin'] as $t){
							unset($temp[$t]);
						}
						$temp_order[$v['user_code']][] = $temp;
					}
				}
				foreach($temp_order[1] as $element) {
					$hash = $element['expertise_code'];
					$unique_array[$hash] = $element;
				}

				foreach($temp_arr as $k => $v){
					$temp_arr[$k]['expertises'] = array_column($unique_array,'expertise','expertise_code');
				}
			}
			$this->set_response([
				'status' => TRUE,
				'message' => 'data found',
				'data' => $temp_arr
			], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				'status' => FALSE,
				'message' => 'data not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}
?>