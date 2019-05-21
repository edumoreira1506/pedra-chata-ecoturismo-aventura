<?php

class Base_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function add($table, $data)
	{
		$this->db->insert($table, $data);
		if ($this->db->affected_rows() == '1') {
			return true;
		}
		
		return false;
	}

}