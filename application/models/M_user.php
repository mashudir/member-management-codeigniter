<?php 
/**
* Author 	: Mashudi Rohmat
* Project	: Confide
* Years		: 2020
*/
class M_user extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function users($id=null){
		if ($id==null) {
			$sql="SELECT a.id, a.name, a.username, a.password, a.role, a.is_active, b.name as group_name, b.id as group_id
			FROM user a
			LEFT JOIN mst_group b ON a.mst_group = b.id
			WHERE a.is_active = '1'
			ORDER BY a.name";
		}else{
			$sql="SELECT a.id, a.name, a.username, a.password, a.role, a.is_active, b.name as group_name, b.id as group_id
			FROM user a
			LEFT JOIN mst_group b ON a.mst_group = b.id
			WHERE a.is_active = '1' AND a.id = ".$id." 
			ORDER BY a.name";
		}

		$query = $this->db->query($sql)->result_array();

		return (!empty($query)) ? $query : FALSE;
	}

	function add($data) {
		return $this->db->insert("user",$data);
	}

	function update($data) {
		$this->db->where("id",$data['id']);
		return $this->db->update("user",$data);
	}

	function delete($id) {
		$this->db->where("id",$id);
		return $this->db->delete("user");
	}
}