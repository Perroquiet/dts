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
		
		for ($i=1; $i<=100; $i++) {
		
			if (!$this->input->post('receiverName' . $i) == 0) {
				$this->insert_sender_receiver($tracking_id, $this->home_model->get_user_id(), $this->input->post('receiverName' . $i));
			} else {
				return null;
			}
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
		$this->db->where('user_id !=', $user_id);
		$query = $this->db->get('tbldescription');
		return $query->result();
	}


}

?>