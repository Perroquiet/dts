<?php

class Send extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->data['jquery_enabled'] = true;
		$this->data['page_title'] = 'Send Document';
		$this->data['cs_scripts'] = array(base_url() . 'css/home_style.css');
		
		$this->load->model('send_model');
		$this->load->model('home_model');
	}
	
	function index() {
		
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['login'] = true;
			$this->data['receivers'] = $this->send_model->get_id_and_names($this->home_model->get_user_id());
			
			$this->data['main_content'] = 'send_view.php';
			$this->load->view('includes/template.php', $this->data);
		}
	}

	function submit() {
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		} else
		{
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('documentName', 'Subject', 'required');
			$this->form_validation->set_rules('receiverName1', 'Receiver', 'required');		
			
			
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			} else {
			
			$this->send_model->insert_description();
			redirect('home');
			
			}
		}
		
		
		
	}
}
?>