<?php

require_once "Base_model.php";

class Accesses_model extends Base_model
{
	private $ip;
	private $date;
	private $idAccess;
	private $dispositive;
	private $city;

	public function __construct($ip = null, $dispositive = null, $city = null, $date = null, $idAccess = null)
	{
		parent::__construct();

		$this->idAccess = $idAccess;
		$this->ip = $ip;
		$this->date = $date;
		$this->dispositive = $dispositive;
		$this->city = $city;
	}

	public function insert()
	{
		$data = [
			'ip' => $this->ip,
			'dispositive' => $this->dispositive,
			'city' => $this->city
		];

		$this->idAccess = $this->addGetId('accesses', $data);
	}

	public function getAccess12MonthsThisYear()
	{
		$data = [];

		for($i = 1; $i <= 12; $i++){
			$this->db->select('*');
			$this->db->where('MONTH(date_access)', $i, false); 
			$this->db->where('YEAR(date_access)', 'YEAR(CURRENT_DATE)', false); 
        	$accesses = $this->db->get('accesses')->result();

        	$data[$i] = [
        		'accesses' => $accesses,
        	];
		}

		return $data;
	}

	public function getDeviceAccesses()
	{
		$this->db->select('count(id_access) as accesses, dispositive');
		$this->db->group_by('dispositive');
		return $this->db->get('accesses')->result();
	}

	public function getLocationAccesses()
	{
		$this->db->select('count(id_access) as accesses, city');
		$this->db->group_by('city');
		return $this->db->get('accesses')->result();
	}

}