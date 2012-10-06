<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

private $user_id;

	function __construct() {
		parent::__construct();

		$this->load->model('home_model');		
	
		$this->data['page_title'] = 'DTS - Home';
		$this->data['jquery_enabled'] = true;
		$this->data['js_scripts'] = array(base_url() . 'js/home_script.js');
		$this->data['cs_scripts'] = array(base_url() . 'css/home_style.css');
		$this->data['username'] = $this->home_model->get_user_info($this->home_model->get_user_id());
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
			$this->data['sub_content'] = 'home_view';
			$this->load->view('includes/template.php', $this->data);
			
		}
	}
	
	public function sort_send() {
			$this->data['logged_in'] = true;
			
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			if ($this->home_model->get_feed_descriptions_as_sender($user_id)) {
			$this->data['feeds'] = $this->home_model->get_feed_descriptions_as_sender($user_id);
			}
			
			$this->data['sub_content'] = 'home_view';
			$this->load->view('includes/template.php', $this->data);
	}
	
	public function sort_received() {
			$this->data['logged_in'] = true;
			
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			if ($this->home_model->get_feed_descriptions_as_receiver($user_id)) {
			$this->data['feeds'] = $this->home_model->get_feed_descriptions_as_receiver($user_id);
			}
			
			$this->data['sub_content'] = 'home_view';
			$this->load->view('includes/template.php', $this->data);
	}
	
	public function inbox() {
			$this->data['logged_in'] = true;
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			
			if ($this->home_model->get_non_verified_feeds($user_id)) {
				$this->data['feeds'] = $this->home_model->get_non_verified_feeds($user_id);
			}
			$this->data['sub_content'] = 'inbox_view';
			$this->load->view('includes/template.php', $this->data);
	}
	
	public function viewitem($tracking_id) {
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
					}
				}
			}
			$this->data['sub_content'] = 'view_document_view';
			$this->load->view('includes/template.php', $this->data);
			
	}
	
	public function verifydoc($tracking_id, $receiver) {
			$this->data['logged_in'] = true;
			$user_id = $this->home_model->get_user_id();
			$this->data['user_id'] = $user_id;
			
			$this->home_model->update_verification($tracking_id, $receiver);
			redirect('home/inbox');
			
	}
	
	public function logout() {
		$this->session->set_userdata(array(
				'username' => '',
				'is_logged_in' => '' 
			));
		$this->session->sess_destroy();
		redirect('login');
	}
	
	//Testing
	// private function relativeTime($dt,$precision=2)
	// {
		// $times=array(	365*24*60*60	=> "year",
						// 30*24*60*60		=> "month",
						// 7*24*60*60		=> "week",
						// 24*60*60		=> "day",
						// 60*60			=> "hour",
						// 60				=> "minute",
						// 1				=> "second");
		
		// $passed=time()-$dt;
		
		// if($passed<5)
		// {
			// $output='less than 5 seconds ago';
		// }
		// else
		// {
			// $output=array();
			// $exit=0;
			
			// foreach($times as $period=>$name)
			// {
				// if($exit>=$precision || ($exit>0 && $period<60)) break;
				
				// $result = floor($passed/$period);
				// if($result>0)
				// {
					// $output[]=$result.' '.$name.($result==1?'':'s');
					// $passed-=$result*$period;
					// $exit++;
				// }
				// else if($exit>0) $exit++;
			// }
					
			// $output=implode(' and ',$output).' ago';
		// }
		
		// return $output;
	//}
	
	
}


?>
