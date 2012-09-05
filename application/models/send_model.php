<?php

class Send_model extends CI_Model {
	
	public function insert_description() {
		$data = array(
			'name' = $this->input->post('documentName');
			'description' = $this->input->post('documentDescription');
			
		);
	}

}

?>