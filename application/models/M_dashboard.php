<?php 
/**
*Author 	: Mashudi Rohmat Amd. Kom.
*Project 	: Member Management `Kalasan Youth`
*Year 		: 2021
*/
class M_dashboard extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function groups() {
		return $this->db->get('mst_group')->result_array();
	}

	function total_member($klp=NULL){
		if ($klp == NULL) {
			$sql = "SELECT COUNT(id) as total FROM member WHERE is_active = '1'";
		}else{
			$sql = "SELECT COUNT(id) as total FROM member WHERE is_active = '1' AND mst_group = '".$klp."'";
		}
		$query = $this->db->query($sql)->row_array();

		return (!empty($query)) ? $query['total'] : 0;
	}

	function member_by_gender($params,$klp=NULL){
		if ($klp == NULL) {
			$sql = "SELECT COUNT(id) as total FROM member WHERE is_active = '1' AND gender = '".$params."'";
		}else{
			$sql = "SELECT COUNT(id) as total FROM member WHERE is_active = '1' AND gender = '".$params."' AND mst_group = '".$klp."'";
		}
		$query = $this->db->query($sql)->row_array();

		return (!empty($query)) ? $query['total'] : 0;
	}

	function member_by_category($params,$klp=NULL){
		if ($klp == NULL) {
			$sql = "SELECT COUNT(id) as total FROM member WHERE is_active = '1' AND categories = '".$params."'";
		}else{
			$sql = "SELECT COUNT(id) as total FROM member WHERE is_active = '1' AND categories = '".$params."' AND mst_group = '".$klp."'";
		}
		$query = $this->db->query($sql)->row_array();

		return (!empty($query)) ? $query['total'] : 0;
	}

	function member_by_origin($params,$klp=NULL){
		if ($klp == NULL) {
			$sql = "SELECT COUNT(id) as total FROM member WHERE is_active = '1' AND is_local = '".$params."'";
		}else{
			$sql = "SELECT COUNT(id) as total FROM member WHERE is_active = '1' AND is_local = '".$params."' AND mst_group = '".$klp."'";
		}
		$query = $this->db->query($sql)->row_array();

		return (!empty($query)) ? $query['total'] : 0;
	}

}

 ?>