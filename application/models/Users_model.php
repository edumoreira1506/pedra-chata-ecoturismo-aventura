<?php

class Users_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getUserByEmail($email)
	{
		$this->db->select('*');
		$this->db->where('email', $email); 
        $this->db->limit(1);
        return $this->db->get('users')->row();
	}

}