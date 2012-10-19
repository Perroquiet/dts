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
		//$sql = 'SELECT DISTINCT * FROM tblsenders_receivers, tbldocument, tbldescription WHERE (tblsenders_receivers.sender = '.$user_id.' OR tblsenders_receivers.receiver = '.$user_id.') AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND (tbldescription.user_id = tblsenders_receivers.receiver OR tbldescription.user_id = tblsenders_receivers.sender) AND tbldescription.user_id != '.$user_id.' ORDER BY tbldocument.tracking_id DESC';
		//$sql = 'SELECT DISTINCT * FROM tblsenders_receivers, tbldocument WHERE (tblsenders_receivers.sender = '.$user_id.' OR tblsenders_receivers.receiver = '.$user_id.' OR tbloffices.id = tblsenders_receivers.dept_id) AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND tblsenders_receivers.display = 1 GROUP BY tblsenders_receivers.tracking_id ORDER BY tbldocument.tracking_id DESC ';
		$sql = 'SELECT DISTINCT * FROM tbloffices, tblsenders_receivers, tbldocument WHERE ((tbloffices.id = tblsenders_receivers.dept_id AND tbloffices.handler = '.$user_id.') OR tblsenders_receivers.sender = '.$user_id.' OR tblsenders_receivers.receiver = '.$user_id.') AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND tblsenders_receivers.display = 1 GROUP BY tblsenders_receivers.tracking_id ORDER BY tbldocument.tracking_id DESC';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_senders_receivers($user_id)
	{
		$sql = 'SELECT * FROM tblsenders_receivers a, tbldescription b WHERE (a.sender= '.$user_id.' OR a.receiver = '.$user_id.') AND (a.sender = b.user_id OR a.receiver = b.user_id) AND b.user_id != '.$user_id.' ORDER BY tracking_id DESC';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
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
		$sql = 'SELECT * FROM tblsenders_receivers, tbldocument, tbldescription WHERE tblsenders_receivers.sender = '.$user_id.' AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND tbldescription.user_id = tblsenders_receivers.receiver AND tblsenders_receivers.display = 1 ORDER BY tbldocument.tracking_id DESC';
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
		$sql = 'SELECT * FROM tblsenders_receivers, tbldocument, tbldescription WHERE tblsenders_receivers.receiver = '.$user_id.' AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND tbldescription.user_id = tblsenders_receivers.sender AND tblsenders_receivers.verified = 1 ORDER BY tbldocument.tracking_id DESC';
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
		$sql = 'SELECT * FROM tblsenders_receivers, tbldocument, tbldescription WHERE tblsenders_receivers.receiver = '.$user_id.' AND tbldocument.tracking_id = tblsenders_receivers.tracking_id AND tbldescription.user_id = tblsenders_receivers.sender AND tblsenders_receivers.verified = 0 ORDER BY tbldocument.tracking_id DESC';
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_names_of_receivers($tracking_id, $user_id)
	{
		$sql = 'SELECT * FROM tblsenders_receivers, tbldescription WHERE sender = '.$user_id.' AND tracking_id = '.$tracking_id.' AND receiver = user_id';
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_name_of_sender($tracking_id, $user_id)
	{
		$sql = 'SELECT * FROM tblsenders_receivers, tbldescription WHERE receiver = '.$user_id.' AND tracking_id = '.$tracking_id.' AND sender = user_id';
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
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('tbldescription');
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
	
	public function get_receivers_names($tracking_id) {
		$sql = 'SELECT tblsenders_receivers.dept_id, tblsenders_receivers.sender, tblsenders_receivers.receiver, tblsenders_receivers.verified, tblsenders_receivers.date_time_received, tbldescription.first_name, tbldescription.last_name, tbldescription.location, tbloffices.office_name FROM tblsenders_receivers, tbldescription, tbloffices WHERE tracking_id = '.$tracking_id.' AND (receiver = user_id OR tblsenders_receivers.dept_id = tbloffices.id) GROUP BY tblsenders_receivers.receiver';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_department_receivers_names($tracking_id) {
		$sql = 'SELECT * FROM tblsenders_receivers a, tbloffices b, tbldepartment c WHERE a.dept_id = b.id AND a.tracking_id = '.$tracking_id.' AND b.dept_id = c.id';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_department_sender_details($tracking_id, $dept_id) {
		$sql = 'SELECT * FROM tblsenders_receivers, tbldocument, tbldescription WHERE tbldocument.tracking_id = '.$tracking_id.' AND tblsenders_receivers.tracking_id = '.$tracking_id.' AND tblsenders_receivers.sender = tbldescription.user_id AND tblsenders_receivers.dept_id = '.$dept_id;
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_department_id_by_handler($user_id) {
		$this->db->where('handler', $user_id);
		$query = $this->db->get('tbloffices');
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				return $row->id;
			}
		} else {
			return null;
		}
	}
	
	// public function get_department_sender_details($tracking_id, $user_id) {
		// $sql = 'SELECT * FROM ';
	// }
	
	public function delete_feed($tracking_id, $user_id) {
		// $data = array (
			// 'display' => 0
		// );
		// $this->db->where('tracking_id', $tracking_id);
		// $this->db->or_where('sender', $user_id);
		// $this->db->or_where('receiver', $user_id);
		// $this->db->update('tblsenders_receivers', $data);
		$sql = 'UPDATE tblsenders_receivers SET display = 0 WHERE tracking_id = '.$tracking_id.' AND sender = '.$user_id;
		$this->db->query($sql);
	}
	
	public function update_verification($tracking_id, $receiver) {
		$data = array(
			'verified' => 1,
			'date_time_received' => date('F d, Y g:ia', time())
			);
		$this->db->where('tracking_id', $tracking_id);
		$this->db->where('receiver', $receiver);
		$this->db->or_where('dept_id', $receiver);
		$this->db->update('tblsenders_receivers', $data);
	}
	
	public function get_current_location($tracking_id) {
		$sql = 'SELECT * FROM tblsenders_receivers, tbldescription, tbloffices WHERE (receiver = user_id OR tbloffices.id = tblsenders_receivers.dept_id) AND tracking_id = '.$tracking_id.' AND verified = 1 ORDER BY date_time_received DESC';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function get_forward_receivers_list($tracking_id, $receiver_id)
	{
		$sql = 'SELECT * FROM tbldescription, tblsenders_receivers WHERE receiver != '.$receiver_id.' AND tracking_id = '.$tracking_id.' AND receiver == user_id';
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}
}

?>
