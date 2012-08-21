<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup extends CI_Controller{
	function __construct() {
		parent::__construct();
		
		$this->load->model('registration_model');
	
		// View Modifications
		$this->data['page_title'] = 'Registration';
		$this->data['jquery_enabled'] = true;
		$this->data['cs_scripts'] = array(base_url() . 'css/style.css');
		$this->data['js_scripts'] = array(base_url() . 'js/signup_script.js');
	}
	public function index()
	{
		$this->data['main_content'] = 'registration_view';
		$this->load->view("includes/template.php", $this->data);
	}

	public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Firstname', 'required');
		$this->form_validation->set_rules('last_name', 'Lastname', 'required');		
		$this->form_validation->set_rules('profession', 'Profession');
		$this->form_validation->set_rules('location', 'Location');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|xss_clean|callback_check_user_ci');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->registration_model->add_user();
			redirect('login');
		}
	}
	

public function check_user_ci()
	{
		$usr=$this->input->post('username');
        $result=$this->registration_model->check_user_exist($usr);
        if($result)
		{
			$this->form_validation->set_message('check_user', 'User Name already exit.');
			return false;
		}
		else
		{
			return true;
		}
	}
	
	// this function will check username in database if already exist
	public function check_user()
	{
		$usr=$this->input->post('username');
        $result=$this->registration_model->check_user_exist($usr);
        if($result)
        {
			echo "false";
			
        }
        else{
			
			echo "true";
        }
	}
}
?>
