<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('verify_model');
		
		$this->data['page_title'] = 'Verify Document';
		$this->data['cs_scripts'] = array(base_url() . 'css/home_style.css');
	}
	
	function index() {
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		} else {
			echo 9;
			
			$this->data['main_content'] = 'verify_view';
			$this->load->view('includes/template.php', $this->data);
		}
	}
}
?>
