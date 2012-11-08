<?php
class Upload_model extends CI_Model {
	
	private $upload_path;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->upload_path = realpath(APPPATH . 'public/files/');
	}
	
	public function do_upload() {
		$config = array(
			'allowed_types'		=>	'jpg|jpeg|gif|doc|docx|png|xls|xlsx|txt',
			'upload_path'		=>	$this->upload_path,
			'max_size' 			=> 2048
		);
		
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('upload_form', $error);
			}
			else
			{
				$file_data = $this->upload->data();
			}
	}
}

?>