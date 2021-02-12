<?php 
/**
*Author 	: Mashudi Rohmat Amd. Kom.
*Project 	: Member Management `Kalasan Youth`
*Year 		: 2021
*/
class M_base extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function groups(){
		if ($this->session->userdata('ses_role') == 'kmm_desa' or $this->session->userdata('ses_role') == 'ppd') {
			$where = '';
		}else if($this->session->userdata('ses_role') == 'kmm_klp') {
			$where = $this->db->where('id',$this->session->userdata('ses_group'));
		}

		$this->db->select("*");
		$this->db->from("mst_group");
		$where;
		$this->db->where('is_active','1');
		$result = $this->db->get()->result_array();
		return $result;
	}

	function categories(){
		return $this->db->get('mst_categories')->result_array();
	}
}

 ?>