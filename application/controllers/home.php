<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->data['page_title'] = 'DTS - Home';
		$this->data['jquery_enabled'] = true;
		$this->data['js_scripts'] = array(base_url() . 'js/home_script.js');
		$this->data['cs_scripts'] = array(base_url() . 'css/home_style.css');
	}
	
	public function index() {
		
		
		if ($this->session->userdata('is_logged_in')) {
			$this->data['logged_in'] = true;
/*			echo "Welcome! " . $this->session->userdata('username'); */
			$this->data['main_content'] = 'home_view';
			$this->load->view('includes/template.php', $this->data);

		}
		else {
			redirect('login');
		}
		
	}
	
	public function logout() {
		$this->session->set_userdata(array(
				'username' => '',
				'is_logged_in' => '' 
			));
		$this->session->sess_destroy();
		redirect('login');
	}
	

}


?>
