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

	public function addGetId($table, $data)
	{
		$this->db->insert($table, $data);
		if ($this->db->affected_rows() == '1') {
			return $this->db->insert_id($table);;
		}
		
		return false;
	}

	public function edit($table, $data, $fieldID, $ID){
		$this->db->where($fieldID,$ID);
		$this->db->update($table, $data);

		if ($this->db->affected_rows() >= 0)
		{
			return true;
		}

		return false;       
	}

	public function delete($table, $fieldID, $ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);

        if ($this->db->affected_rows() == '1')
        {
            return true;
        }
        
        return false;        
    }

}