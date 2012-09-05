<?php

class Send extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->data['jquery_enabled'] = true;
		$this->data['page_title'] = 'Send Document';
		$this->data['cs_scripts'] = array(base_url() . 'css/home_style.css');
		
	}
	
	function index() {
		
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->load->model('home_model');
			$this->data['login'] = true;
			$this->data['receivers'] = $this->home_model->get_list_of_receivers();
			$this->data['main_content'] = 'send_view.php';
			$this->load->view('includes/template.php', $this->data);
		}
	}

}
?>