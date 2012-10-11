<?php

class Send extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->data['jquery_enabled'] = true;
		$this->data['jqueryui_enabled'] = true;
		$this->data['page_title'] = 'Send Document';
		$this->data['cs_scripts'] = array(
									base_url() . 'css/home_style.css',
									base_url() . 'css/send_style.css',
									base_url() . 'css/token-input-facebook.css',
									base_url() . 'css/token-input.css'
		
									);
		$this->data['js_scripts'] = array(base_url() . 'js/jquery.tokeninput.js');
		
		$this->load->model('send_model');
		$this->load->model('home_model');
		$this->data['username'] = $this->home_model->get_user_info($this->home_model->get_user_id());
		$this->data['header_content'] = 'custom_header_view.php';
	}
	
	function getRecipients() {
		$data['receivers'] = $this->send_model->get_id_and_names($this->home_model->get_user_id());
		$this->load->view('recipients_view', $data);
	}
	
	function index() {
		
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
			$this->data['login'] = true;
			$this->data['receivers'] = json_encode($this->send_model->get_id_and_names($this->home_model->get_user_id()));
			
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
			$this->form_validation->set_rules('recipients', 'Receiver', 'required');		
			
			
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