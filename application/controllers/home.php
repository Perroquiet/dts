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
	}
	
	public function index() {
		
		
		if (!$this->session->userdata('is_logged_in')) {
			redirect('login');
		}
		else {
			$this->data['logged_in'] = true;

/*			echo "Welcome! " . $this->session->userdata('username'); */
			$this->data['username'] = $this->session->userdata('username');
			
			$user_id = $this->home_model->get_user_id();
			
			$this->data['user_info'] = $this->home_model->get_user_info($user_id);
			//this->home_model->get_tracking_ids();
			
			//$this->data['feeds'] = $this->home_model->get_all_stream($user_id);
			$this->data['feeds'] = $this->home_model->get_feed_descriptions_as_sender($user_id);




			$this->data['main_content'] = 'home_view';
			$this->load->view('includes/template.php', $this->data);
			
		}
		$this->load->view('send_view');
		
	}
	
	public function page() {
		
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
	private function relativeTime($dt,$precision=2)
	{
		$times=array(	365*24*60*60	=> "year",
						30*24*60*60		=> "month",
						7*24*60*60		=> "week",
						24*60*60		=> "day",
						60*60			=> "hour",
						60				=> "minute",
						1				=> "second");
		
		$passed=time()-$dt;
		
		if($passed<5)
		{
			$output='less than 5 seconds ago';
		}
		else
		{
			$output=array();
			$exit=0;
			
			foreach($times as $period=>$name)
			{
				if($exit>=$precision || ($exit>0 && $period<60)) break;
				
				$result = floor($passed/$period);
				if($result>0)
				{
					$output[]=$result.' '.$name.($result==1?'':'s');
					$passed-=$result*$period;
					$exit++;
				}
				else if($exit>0) $exit++;
			}
					
			$output=implode(' and ',$output).' ago';
		}
		
		return $output;
	}
	
	
}


?>
