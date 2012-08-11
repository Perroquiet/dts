<?php

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->data['page_title'] = 'Login';
		$this->data['cs_scripts'] = array(base_url() . 'css/style.css');
	}
	
	
	function index()
	{
		if ($this->session->userdata('is_logged_in')) {
			redirect('home');
		}
		else {
		$this->data['main_content']= 'login_form';
		$this->load->view('includes/template', $this->data);
		}
	}

	function validate_credentials()
	{
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		
		if($query)
		{
			
			$data = array (
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);

			$this->session->set_userdata($data);
			//echo "You have sucessfully logged in!";
			redirect('home');
			
		}
		else
		{
			//echo "diri nisulod sa else";
			$this->index();
		}
	

	}

}

