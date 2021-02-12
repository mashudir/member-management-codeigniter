<?php 
/**
*Author 	: Mashudi Rohmat Amd. Kom.
*Project 	: Member Management `Kalasan Youth`
*Year 		: 2021
*/
class M_auth extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function auth_admin($data){
		$this->db->select('username,password,name,role,mst_group');
		$this->db->from('user');
		$this->db->where('username',$data['username']);
		$this->db->where('password',$data['password']);
		$this->db->where('is_active','1');

		$query = $this->db->get()->row_array();

		return (!empty($query)) ? $query : FALSE;
		
	}
}
?>