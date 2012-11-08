<?php

class Send_model extends CI_Model {
	
	private $tracking_id;
	private $upload_path;
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('home_model');
	}
	
	public function insert_description() {
		$data = array(
			'name' 				=> $this->input->post('documentName'),
			'description' 		=> $this->input->post('documentDescription'),
			'date_time_sent' 	=> date('F d, Y g:ia', time()),
			'page_number'		=> $this->input->post('pageNum'),
			'upload_file_path'	=>	$this->input->post('userfile')
		);
		
		$this->db->insert('tbldocument', $data);
		
		$this->tracking_id = mysql_insert_id();
		$recipient = explode(",", $this->input->post('recipients'));
		
		$numberOfRecipients = count($recipient);
		
		$this->create_directory($this->tracking_id);
		
		for ($i=0; $i<$numberOfRecipients; $i++) {
		
			if (!$this->check_recipient_duplication($this->tracking_id, $this->home_model->get_user_id(), $recipient[$i])) {
				$this->insert_sender_receiver($this->tracking_id, $this->home_model->get_user_id(), $recipient[$i]);
			} else {
				return null;
			}
			
		}
	}
	
	public function insert_description_dept() {
		$data = array(
			'name' 				=> $this->input->post('documentName'),
			'description' 		=> $this->input->post('documentDescription'),
			'date_time_sent' 	=> date('F d, Y g:ia', time()),
			'page_number'		=> $this->input->post('pageNum')
		);
		
		$this->db->insert('tbldocument', $data);
		
		$this->tracking_id = mysql_insert_id();
		$recipient = explode(",", $this->input->post('recipients'));
		$numberOfRecipients = count($recipient);
		
		for ($i=0; $i<$numberOfRecipients; $i++) {
		
			if (!$this->check_recipient_duplication($this->tracking_id, $this->home_model->get_user_id(), $recipient[$i])) {
				$this->insert_sender_department($this->tracking_id, $this->home_model->get_user_id(), $recipient[$i]);
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
			'verified' => 0,
			'display'	=> 1
		);
		$this->db->insert('tblsenders_receivers', $data);
	}
	
	public function insert_sender_department($tracking_id,$sender_id, $department_id) {
		$data = array(
			'tracking_id' => $tracking_id,
			'sender' => $sender_id,
			'dept_id' => $department_id,
			'verified' => 0,
			'display'	=> 1
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

	public function get_id_and_departments() {
		$sql = "SELECT CONCAT(tbldepartment.acronym, ' - ', office_name) as name, tbloffices.id FROM tbldepartment, tbloffices WHERE dept_id = tbldepartment.id";
		//$this->db->where('user_id !=', $user_id);
		//$query = $this->db->get('tbldescription');
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function create_directory($dir)
	{
		$directories_path = 'C:/wamp/www/dts/application/public/files/';
				
		if (!is_dir($directories_path . $dir))
		{
			mkdir($directories_path . $dir); // modes are useless on windows
		}
		else
		{
			return null;
		}
	}

	public function do_upload() {
	
		$this->create_directory($this->tracking_id);
		$config = array(
			'allowed_types'		=>	'jpg|jpeg|gif|doc|docx|png|xls|xlsx|txt',
			'upload_path'		=>	realpath(APPPATH . 'public/files/' . $this->tracking_id),
			'max_size' 			=>	2048
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		//$file_data = $this->upload->data();
		return true;
	}
}

?>