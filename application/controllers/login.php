<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->data['page_title'] = 'Login';
		$this->data['cs_scripts'] = array(base_url() . 'css/style.css');
		$this->data['jquery_enabled'] = true;
	}
	
	
	function index()
	{
		if ($this->session->userdata('is_logged_in')) {
			redirect('home');
		}
		else {
		$this->data['main_content']= 'login_view';
		$this->load->view('includes/template', $this->data);
		}
	}

	function validate_credentials()
	{
		$this->load->model('login_model');
		$query = $this->login_model->validate();
		
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

