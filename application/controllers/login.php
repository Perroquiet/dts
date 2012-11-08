<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->data['page_title'] = 'Login';
		$this->data['cs_scripts'] = array(base_url() . 'css/style.css');
		$this->data['jquery_enabled'] = true;
		$this->load->model('home_model');
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
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->load->model('login_model');
			$query = $this->login_model->validate();
			
			if($query)
			{
				
				$data = array (
					'username' => $this->input->post('username'),
					'id'		=> $this->home_model->get_user_id(),
					'is_logged_in' => true
				);

				$this->session->set_userdata($data);
				//echo "You have sucessfully logged in!";
				redirect('home');
				
			}
			else
			{
				//echo "diri nisulod sa else";
				$this->data['mismatch'] = true;
				$this->index();
				
			
			}
		}
		
	}

}

