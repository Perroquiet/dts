<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	public function add_user()
	{
		$data=array(
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'profession'=>$this->input->post('profession'),
			'location'=>$this->input->post('location'),
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password'))
			);
		$this->db->insert('tbluser',$data);
	}
	public function check_user_exist($usr)
    {
		
        $this->db->where("username",$usr);
        $query=$this->db->get("tbluser");
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>
