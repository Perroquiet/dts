<?php

class Send_model extends CI_Model {
	
	public function insert_description() {
		$data = array(
			'name' => $this->input->post('documentName'),
			'description' => $this->input->post('documentDescription')
		);
		
		$this->db->insert('tbldocument', $data);
	}
	
	public function insert_sender_receiver($tracking_id, $sender_id, $receiver_id) {
		$data = array(
			'tracking_id' => $tracking_id,
			'sender' => $user_id,
			'receiver' => $receiver_id
		);
	}
	
	public function get_id_and_names($user_id) {
		$this->db->where('user_id !=', $user_id);
		$query = $this->db->get('tbldescription');
		return $query->result();
	}


}

?>