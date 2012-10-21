<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

private $user_id;

	function __construct() {
		parent::__construct();

		$this->load->model('home_model');		
	
		$this->data['page_title'] = 'DTS - Home';
		$this->data['jquery_enabled'] = true;
		$this->data['jqueryui_enabled'] = true;
		$this->data['js_scripts'] = array(
									base_url() . 'js/home_script.js',
									//base_url() . 'js/messages_script.js',
									base_url() . 'js/jquery.toastmessage.js'
									);
		$this->data['cs_scripts'] = array(
									base_url() . 'css/home_style.css',
									//base_url() . 'css/messages_style.css',
									base_url() . 'css/jquery.toastmessage.css'
									);
		$this->data['username'] = $this->home_model->get_user_info($this->home_model->get_user_id());
		$this->data['home_url'] = base_url();
		//$this->data['messages_content'] = 'messages_view.php';
		$this->data['header_content'] = 'custom_header_view.php';
		$this->data['main_content'] = 'main_view.php';
	}
	
	public function index() {
		
		
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			$feeds = $this->home_model->get_feed_descriptions($user_id);
			$this->data['feeds'] = $feeds;
			//$this->data['senders_receivers'] = $this->home_model->get_senders_receivers($user_id);
				
			$this->data['sub_content'] = 'home_view';
			$this->load->view('includes/template.php', $this->data);
			
		}
	}
	
	public function sort_send() {
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
			
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			if ($this->home_model->get_feed_descriptions_as_sender($user_id)) {
			$this->data['feeds'] = $this->home_model->get_feed_descriptions_as_sender($user_id);
			}
			
			$this->data['sub_content'] = 'home_view';
			$this->load->view('includes/template.php', $this->data);
		}
	}
	
	public function sort_received() {
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
			
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			if ($this->home_model->get_feed_descriptions_as_receiver($user_id)) {
			$this->data['feeds'] = $this->home_model->get_feed_descriptions_as_receiver($user_id);
			}
			
			$this->data['sub_content'] = 'home_view';
			$this->load->view('includes/template.php', $this->data);
		}
	}
	
	public function inbox() {
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			
			if ($this->home_model->get_non_verified_feeds($user_id)) {
				$this->data['feeds'] = $this->home_model->get_non_verified_feeds($user_id);
			}
			$this->data['sub_content'] = 'inbox_view';
			$this->load->view('includes/template.php', $this->data);
		}
	}
	
	public function viewitem($tracking_id) {
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			$this->data['currentLocation'] = $this->home_model->get_current_location($tracking_id);			
			if ($this->home_model->get_document_info($tracking_id)) {
				$this->data['documentView'] = $this->home_model->get_document_info($tracking_id);
			}
			
			$freeze = $this->home_model->get_document_info($tracking_id);
			
			foreach ($freeze as $row) {
		
				if ($row->sender == $this->home_model->get_user_id()) {
					// 2 if ($this->home_model->get_sender_description($tracking_id, $row->receiver))
					if ($this->home_model->get_receivers_names($tracking_id))
					{
						// 2 $this->data['relations'] = $this->home_model->get_sender_description($tracking_id, $row->receiver);
						$this->data['relations'] = $this->home_model->get_receivers_names($tracking_id);
					}
				}
			
				else if ($row->receiver = $this->home_model->get_user_id()) {
					if ($this->home_model->get_receiver_description($tracking_id, $row->sender))
					{
						$this->data['relations'] = $this->home_model->get_receiver_description($tracking_id, $row->sender);
						$this->data['forwardListPerson'] = $this->home_model->get_forward_receivers_list($tracking_id, $this->home_model->get_user_id());
						$this->data['forwardedDetails'] = $this->home_model->get_forwarded_name($tracking_id, $this->home_model->get_user_id());
					}
				}
			}
			$this->data['sub_content'] = 'view_document_view';
			$this->load->view('includes/template.php', $this->data);
		}	
	}
	
	public function viewitemdept($tracking_id) {
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			$this->data['currentLocation'] = $this->home_model->get_current_location($tracking_id);			
			if ($this->home_model->get_document_info($tracking_id)) {
				$this->data['documentView'] = $this->home_model->get_document_info($tracking_id);
			}
			
			$freeze = $this->home_model->get_document_info($tracking_id);
			
			foreach ($freeze as $row) {
		
				if ($row->sender == $this->home_model->get_user_id()) {
					// 2 if ($this->home_model->get_sender_description($tracking_id, $row->receiver))
					if ($this->home_model->get_department_receivers_names($tracking_id))
					{
						$this->data['relations'] = $this->home_model->get_department_receivers_names($tracking_id);
						
					}
				}
			
				else if ($row->dept_id == $this->home_model->get_department_id_by_handler($this->home_model->get_user_id())) {
					if ($this->home_model->get_department_sender_details($tracking_id, $row->dept_id))
					{
						$this->data['relations'] = $this->home_model->get_department_sender_details($tracking_id, $row->dept_id);
					}
				}
			}
			$this->data['sub_content'] = 'view_document_view';
			$this->load->view('includes/template.php', $this->data);
		}
	}
	
	public function forwardToPerson($tracking_id) {
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			
			$this->home_model->forward_to($tracking_id, $user_id);
			redirect('home/inbox');
		}
	}
	
	public function verifydoc($tracking_id, $receiver) {
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			
			$this->home_model->update_verification($tracking_id, $receiver);
			redirect('home/inbox');
		}
	}
	
	public function delete($tracking_id) {
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			
			$this->home_model->delete_feed($tracking_id, $user_id);
			redirect('home');
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
