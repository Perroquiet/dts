<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docverify extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->data['page_title'] = 'Verify Document';
	}
	
	function index() {
		$this->data['main_content'] = 'docverify_view';
		$this->load->view('includes/template.php', $this->data);
		
	}
}
?>