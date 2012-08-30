<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_user_id() {
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->select('id');		
		$query = $this->db->get('tbluser');
		foreach ($query->result() as $result) {
			return $result->id;
		}
	}

	public function get_user_info($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('tbluser');
		foreach($query->result() as $result) {
			
			return array(
				$result->first_name,
				$result->last_name,
				$result->profession,
				$result->location
			);
		}	
	}

	public function get_feed_descriptions_as_sender($user_id)
	{
		$sql = 'SELECT * FROM tblsenders_receivers, tbldocument, tbluser WHERE tblsenders_receivers.sender = '.$user_id.' AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND tbluser.id = tblsenders_receivers.receiver';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	
	public function get_feed_descriptions_as_receiver($user_id)
	{
		
	}
	
	
	public function get_relations($user_id)
	{
		$this->db->where('sender', $user_id);
		$this->db->or_where('receiver', $user_id);
		$query = $this->db->get('tblsenders_receivers');
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function get_relations_as_sender($user_id)
	{
		$this->db->where('sender', $user_id);
		$query = $this->db->get('tblsenders_receivers');
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function get_relations_as_receiver($user_id)
	{
		$this->db->where('receiver', $user_id);
		$query = $this->db->get('tblsenders_receivers');
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function get_document_info($tracking_id) {
		$this->db->where('tracking_id', $tracking_id);
		$query = $this->db->get('tbldocument');
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function get_all_stream_as_sender($user_id) {
		$sql = 'select * from tbldocument, tblsenders_receivers where tblsenders_receivers.sender = ' . $user_id . ' or tblsenders_receivers.receiver = ' . $user_id;
		$query = $this->db->query($sql);
		foreach ($query->result() as $row)
			return array(
				$row->tracking_id,
				$row->name,
				$row->description,
				$row->date_time,
				$row->sender,
				$row->receiver
			);
	}

	public function get_all_stream_as_receiver($user_id) {
		$sql = 'select * from tbldocument, tblsenders_receivers where tbldocument.tracking_id = tblsenders_receivers.tracking_id and tblsenders_receivers.receiver = ' . $user_id;
		$query = $this->db->query($sql);
		foreach ($query->result() as $row)
			return array(
				$row->tracking_id,
				$row->name,
				$row->description,
				$row->date_time,
				$row->sender,
				$row->receiver
			);
	}	

	public function get_all_stream($user_id) {
		$data = array(array());
		$sql = 'SELECT * FROM tbldocument, tblsenders_receivers WHERE tblsenders_receivers.tracking_id = tbldocument.tracking_id AND (tblsenders_receivers.sender = '.$user_id.' OR tblsenders_receivers.receiver = '.$user_id.')';
		$query = $this->db->query($sql);
		if($query->num_rows() >0 )
		{
		
		// for ($i = 0; $i<=$query->num_rows(); $i++)
		// {
				// $row->tracking_id,
				// $row->name,
				// $row->description,
				// $row->date_time,
				// $row->sender,
				// $row->receiver
		// }
		
			return $query->result();
		}
		else {
			return null;
		}
	}
	
}

?>
