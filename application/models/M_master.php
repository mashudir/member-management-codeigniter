<?php 
/**
*Author 	: Mashudi Rohmat Amd. Kom.
*Project 	: Member Management `Kalasan Youth`
*Year 		: 2021
*/

class M_master extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function groups($id=null){
		if ($id == null) {
			$this->db->where("is_active",1);
			return $this->db->get('mst_group')->result_array();
		}else{
			$this->db->where("id",$id);
			$this->db->where("is_active",1);
			return $this->db->get('mst_group')->result_array();
		}
	}

	function add_group($data) {
		return $this->db->insert("mst_group",$data);
	}

	function update_group($data) {
		$this->db->where("id",$data['id']);
		return $this->db->update("mst_group",$data);
	}

	function delete_group($id) {
		$this->db->where("id",$id);
		return $this->db->delete("mst_group");
	}

	function categories($id=null){
		if ($id == null) {
			$this->db->where("is_active",1);
			return $this->db->get('mst_categories')->result_array();
		}else{
			$this->db->where("id",$id);
			$this->db->where("is_active",1);
			return $this->db->get('mst_categories')->result_array();
		}
	}

	function add_categories($data) {
		return $this->db->insert("mst_categories",$data);
	}

	function update_categories($data) {
		$this->db->where("id",$data['id']);
		return $this->db->update("mst_categories",$data);
	}

	function delete_categories($id) {
		$this->db->where("id",$id);
		return $this->db->delete("mst_categories");
	}
}
?>