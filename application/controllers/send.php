<?php

class Send extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->data['page_title'] = 'Send Document';
		$this->data['cs_scripts'] = array(base_url() . 'css/home_style.css');
		
	}
	
	function index() {
		$this->data['main_content'] = 'send_view.php';
		$this->load->view('includes/template.php', $this->data);
		
	}

}
?>