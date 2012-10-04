<?php

class Send_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('home_model');
	}
	
	public function insert_description() {
		$data = array(
			'name' => $this->input->post('documentName'),
			'description' => $this->input->post('documentDescription'),
			'date_time_sent' => date('F d, Y g:ia', time())
		);
		
		$this->db->insert('tbldocument', $data);
		
		$tracking_id = mysql_insert_id();
		
		$recipient = explode(",", $this->input->post('recipients'));
		
		$numberOfRecipients = count($recipient);
		
		for ($i=0; $i<$numberOfRecipients; $i++) {
		
			if (!$this->check_recipient_duplication($tracking_id, $this->home_model->get_user_id(), $recipient[$i])) {
				$this->insert_sender_receiver($tracking_id, $this->home_model->get_user_id(), $recipient[$i]);
			} else {
				return null;
			}
			
		}
	}
	
	public function check_recipient_duplication($tracking_id, $user_id, $recipient) {
		$this->db->where('tracking_id', $tracking_id);
		$this->db->where('sender', $user_id);
		$this->db->where('receiver', $recipient);
		$query = $this->db->get('tblsenders_receivers');
		if ($query->num_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function insert_sender_receiver($tracking_id,$sender_id, $receiver_id) {
		$data = array(
			'tracking_id' => $tracking_id,
			'sender' => $sender_id,
			'receiver' => $receiver_id,
			'verified' => 0
		);
		$this->db->insert('tblsenders_receivers', $data);
	}
	
	public function get_id_and_names($user_id) {
		$sql = "SELECT CONCAT(first_name, ' ', last_name) as name, user_id as id FROM tbldescription WHERE user_id != ".$user_id."";
		//$this->db->where('user_id !=', $user_id);
		//$query = $this->db->get('tbldescription');
		$query = $this->db->query($sql);
		return $query->result();
	}


}

?>