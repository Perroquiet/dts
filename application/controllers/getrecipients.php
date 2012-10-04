<?php
class Getrecipients extends CI_Controller {

	public function index() {
		$this->load->model('send_model');
		$this->load->model('home_model');
		$data['receivers'] = $this->send_model->get_id_and_names($this->home_model->get_user_id());
		$this->load->view('recipients_view', $data);
	}
	

}
?>