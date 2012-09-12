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
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('tbldescription');
		
		return $query->result();	
	}

	public function get_feed_descriptions($user_id)
	{
		$sql = 'SELECT * FROM tblsenders_receivers, tbldocument, tbluser WHERE (tblsenders_receivers.sender = '.$user_id.' OR tblsenders_receivers.receiver = '.$user_id.') AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND tbluser.id = tblsenders_receivers.receiver';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return null;
		}
		
	}
	
	public function get_feed_descriptions_beta($user_id)
	{
		$stream = array();
		$feed_senders = $this->get_feed_descriptions_as_sender($user_id);
		$feed_receivers = $this->get_feed_descriptions_as_receiver($user_id);
		if($feed_senders == null) {
			
		} else {
			foreach ($feed_senders as $row) {
				array_push($stream, $row);
			}
		}
		if($feed_receivers == null) { 
			
		} else {
			foreach ($feed_receivers as $row) {
				array_push($stream, $row);
			}
		}
		return $stream;
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
	
	public function get_feed_descriptions_as_sender($user_id)
	{
		$sql = 'SELECT * FROM tblsenders_receivers, tbldocument, tbldescription WHERE tblsenders_receivers.sender = '.$user_id.' AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND tbldescription.user_id = tblsenders_receivers.receiver';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return null;
		}
		
	}
	
	public function get_feed_descriptions_as_receiver($user_id)
	{
		$sql = 'SELECT * FROM tblsenders_receivers, tbldocument, tbldescription WHERE tblsenders_receivers.receiver = '.$user_id.' AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND tbldescription.user_id = tblsenders_receivers.sender';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_non_verified_feeds($user_id)
	{
		$sql = 'SELECT * FROM tblsenders_receivers, tbldocument, tbldescription WHERE tblsenders_receivers.receiver = '.$user_id.' AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND tbldescription.user_id = tblsenders_receivers.sender AND tbldocument.verified = 0';
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_descriptions_of_id($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('tbluser');
		return $query->result();
	}
	
	public function get_id_of_sender($tracking_id, $user_id)
	{
		$this->db->where('receiver', $user_id);
		$this->db->where('tracking_id', $tracking_id);
		$query = $this->db->get('tblsenders_receivers');
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				return $row->sender;
			}
		} else {
			return null;
		}
	}
	
	public function get_list_of_receivers()
	{
		//$this->db->select('id', 'first_name', 'last_name', 'profession', 'location');
		$query = $this->db->get('tbluser');
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return null;
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
		$this->db->where('tbldocument.tracking_id', $tracking_id);
		$this->db->where('tblsenders_receivers.tracking_id', $tracking_id);
		$this->db->from('tbldocument');
		$this->db->from('tblsenders_receivers');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_sender_description($tracking_id, $user_id) {
		$this->db->where('tracking_id', $tracking_id);
		//$this->db->where('receiver', $user_id);
		$this->db->where('user_id', $user_id);
		$this->db->from('tblsenders_receivers');
		$this->db->from('tbldescription');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_receiver_description($tracking_id, $user_id) {
		$this->db->where('tracking_id', $tracking_id);
		//$this->db->where('sender', $user_id);
		$this->db->where('user_id', $user_id);
		$this->db->from('tblsenders_receivers');
		$this->db->from('tbldescription');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function update_verification($tracking_id) {
		$data = array(
			'verified' => 1
		);
		$this->db->where('tracking_id', $tracking_id);
		$this->db->update('tbldocument', $data);
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
		
		for ($i = 0; $i<=$query->num_rows(); $i++)
		{
				$row->tracking_id,
				$row->name,
				$row->description,
				$row->date_time,
				$row->sender,
				$row->receiver
		}
		
			return $query->result();
		}
		else {
			return null;
		}
	}
	
}
//09071981954
?>
