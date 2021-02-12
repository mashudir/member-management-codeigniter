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

	function get_users(){
		$sql="SELECT a.code as user_code, a.name as user_name, a.email as user_email, a.npm as user_npm, a.image as user_image, a.description as user_description, b.name as fakultas, c.name as jurusan, IFNULL(e.poin,0) as poin, IFNULL(FORMAT(e.star,2),0) as star
		FROM user a
		LEFT JOIN mst_fakultas b ON a.cd_fakultas = b.code
		LEFT JOIN mst_jurusan c ON a.cd_jurusan = c.code
		LEFT JOIN
		(
			SELECT b.cd_user, IFNULL(SUM(b.star),0) as poin, IFNULL(SUM(b.star)/COUNT(b.cd_user),0) as star
			FROM user a
			LEFT JOIN rate b ON a.code = b.cd_user
			GROUP BY b.cd_user
		)e ON a.code = e.cd_user
		WHERE a.is_active = '1' AND a.is_banned = '0' GROUP BY a.code
		ORDER BY a.name";

		$query = $this->db->query($sql)->result_array();

		return (!empty($query)) ? $query : FALSE;
	}

	function get_user($id){
		$sql="SELECT a.code as user_code, a.name as user_name, a.email as user_email, a.npm as user_npm, a.image as user_image, a.description as user_description, b.name as fakultas, c.name as jurusan, d.province, d.district, d.subdistrict, d.village, d.rt, d.rw, IFNULL(star,0) as poin
		FROM user a
		LEFT JOIN mst_fakultas b ON a.cd_fakultas = b.code
		LEFT JOIN mst_jurusan c ON a.cd_jurusan = c.code
		LEFT JOIN user_address d ON a.code = d.cd_user
		LEFT JOIN
		(
			SELECT a.code, IFNULL(SUM(b.star),0) as star FROM user a LEFT JOIN rate b ON a.code = b.cd_user
			WHERE a.code = ".$id."
		)e
		ON a.code = e.code
		WHERE a.code = ".intval($id)." AND a.is_active = '1' AND a.is_banned = '0'
		GROUP BY a.code";

		$query = $this->db->query($sql)->row_array();

		return (!empty($query)) ? $query : FALSE;
	}

	function userByFilter($filter_text,$filter_prodi='filter',$filter_fakultas='filter'){
		$sql="SELECT a.code as user_code, a.name as user_name, a.email as user_email, a.npm as user_npm, a.image as user_image, a.description as user_description, b.name as fakultas, c.name as jurusan, d.province, d.district, d.subdistrict, d.village, d.rt, d.rw, IFNULL(star,0) as poin, g.name as expertise, g.code as expertise_code
		FROM user a
		LEFT JOIN mst_fakultas b ON a.cd_fakultas = b.code
		LEFT JOIN mst_jurusan c ON a.cd_jurusan = c.code
		LEFT JOIN user_address d ON a.code = d.cd_user
		INNER JOIN
		(
			SELECT a.code, IFNULL(SUM(b.star),0) as star FROM user a INNER JOIN rate b ON a.code = b.cd_user
		)e
		ON a.code = e.code
		LEFT JOIN trx_user_expertise f ON a.code = f.cd_user
		LEFT JOIN mst_expertise g ON f.cd_expertise = g.code
		WHERE a.is_active = '1' AND a.is_banned = '0' AND(a.name LIKE '%".$filter_text."%' OR a.npm LIKE '%".$filter_text."%' OR b.code LIKE '%".$filter_fakultas."%' OR c.code LIKE '%".$filter_prodi."%')
		ORDER BY a.name";

		$query = $this->db->query($sql)->result_array();

		return (!empty($query)) ? $query : FALSE;
	}

	function get_expertise($id){
		$sql="SELECT a.code as user_code, c.name as expertise
		FROM user a
		LEFT JOIN trx_user_expertise b ON a.code = b.cd_user
		LEFT JOIN mst_expertise c ON b.cd_expertise = c.code
		WHERE a.code = '".$id."'";

		$query = $this->db->query($sql)->result_array();

		return (!empty($query)) ? $query : FALSE;
	}

	function get_blocked_users(){
		$sql="SELECT a.code as user_code, a.name as user_name, a.email as user_email, a.npm as user_npm, a.image as user_image, a.description as user_description, b.name as fakultas, c.name as jurusan, IFNULL(e.poin,0) as poin, IFNULL(FORMAT(e.star,2),0) as star
		FROM user a
		LEFT JOIN mst_fakultas b ON a.cd_fakultas = b.code
		LEFT JOIN mst_jurusan c ON a.cd_jurusan = c.code
		LEFT JOIN
		(
			SELECT b.cd_user, IFNULL(SUM(b.star),0) as poin, IFNULL(SUM(b.star)/COUNT(b.cd_user),0) as star
			FROM user a
			LEFT JOIN rate b ON a.code = b.cd_user
			GROUP BY b.cd_user
		)e ON a.code = e.cd_user
		WHERE a.is_active = '0' AND a.is_banned = '1' GROUP BY a.code
		ORDER BY a.name";

		$query = $this->db->query($sql)->result_array();

		return (!empty($query)) ? $query : FALSE;
	}
}