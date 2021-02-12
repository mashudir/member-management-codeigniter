<?php 
/**
*Author 	: Mashudi Rohmat Amd. Kom.
*Project 	: Member Management `Kalasan Youth`
*Year 		: 2021
*/
class M_member extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function groups() {
		return $this->db->get('mst_group')->result_array();
	}

	function members($group){
		$sql = "SELECT a.id, a.name, gender, phone, b.name AS category, c.name AS grup, address, is_local, is_leave, a.is_active, DATE_FORMAT(born_date,'%W, %d %M %Y') as born_date, description, FLOOR(DATEDIFF(NOW(),a.born_date)/365.25) AS age
				FROM member a
				LEFT JOIN  mst_categories b ON a.categories = b.id
				LEFT JOIN  mst_group c ON a.mst_group = c.id
				WHERE a.is_active = '1' AND a.mst_group = '".$group."'
				GROUP BY a.id
				ORDER BY a.name ASC";

		$query = $this->db->query($sql)->result_array();

		return (!empty($query)) ? $query : FALSE;
	}

	function member($id){
		$sql = "SELECT a.id, a.name, gender, phone, b.name AS category,b.id AS category_id, c.name AS grup, c.id AS group_id, address, is_local, is_leave, a.is_active, DATE_FORMAT(born_date,'%Y-%m-%d') as born_date, description
				FROM member a
				LEFT JOIN  mst_categories b ON a.categories = b.id
				LEFT JOIN  mst_group c ON a.mst_group = c.id
				WHERE a.is_active = '1' AND a.id = '".$id."'
				GROUP BY a.id
				ORDER BY a.name ASC";

		$query = $this->db->query($sql)->row_array();

		return (!empty($query)) ? $query : FALSE;
	}

	function add_member($data){
		return $this->db->insert('member',$data);
	}

	function update_member($data){
		$this->db->where('id',$data['id']);
		return $this->db->update('member',$data);
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('member');
	}
}
?>