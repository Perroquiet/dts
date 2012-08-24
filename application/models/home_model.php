<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

public $user_id;
public $first_name;
public $last_name;
public $profession;
public $location;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_user_id() {
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->select('id');		
		$query = $this->db->get('tbluser');
		foreach ($query->result() as $result) {
			$this->user_id = $result->id;
		}
	}

	public function get_user_desc()
	{
		$this->get_user_id();
		$this->db->where('id', $this->user_id);
		$query = $this->db->get('tbluser');
		foreach($query->result() as $result) {
			$this->first_name = $result->first_name;
			$this->last_name = $result->last_name;
			$this->profession = $result->profession;
			$this->location = $result->location;	
		}	
	}
/*
	{
		$this->db->where('sender', $this->user_id);
		$this->db->or_where('receiver', $this->user_id);
		$query = $this->db->get('tblsenders_receivers');
		if($query->num_rows() > 0) {
			foreach ($query->result() as $result) {
				$result->tracking_id;
			}	
		}
	}

	public function get_document($id) {
		$this->db->where->('tracking_id', $id);
		$this->db->get('tbldocument');
	}
	
*/	
}

?>