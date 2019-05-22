<?php

require_once "Base_model.php";

class Menu_options_model extends Base_model
{
	private $menuOptionId;
	private $name;
	private $link;

	public function __construct($name = null, $link = null, $menuOptionId = null)
	{
		parent::__construct();

		$this->menuOptionId = $menuOptionId;
		$this->name = $name;
		$this->link = $link;
	}

	public function getMenuOptionId()
	{
		return $this->menuOptionId;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getLink()
	{
		return $this->link;
	}

	public function getAllMenuOptions()
	{
		$this->db->select('*');
        $databaseMenuOptions  = $this->db->get('menu_options')->result();

        $menuOptions = [];
        foreach ($databaseMenuOptions as $databaseMenuOption) {
        	$menuOption = new Menu_options_model(
        		$databaseMenuOption->name,
        		$databaseMenuOption->link,
        		$databaseMenuOption->id_menu
        	);

        	$menuOptions[] = $menuOption;
        }

        return $menuOptions;
	}

	public function getMenuOptionByLink($link)
	{
		$this->db->select('*');
		$this->db->where('link', $link); 
        $this->db->limit(1);
        return $this->db->get('menu_options')->row();
	}

	public function getMenuOptionById($idOptionMenu)
	{
		$this->db->select('*');
		$this->db->where('id_menu', $idOptionMenu); 
        $this->db->limit(1);
        return $this->db->get('menu_options')->row();
	}

	public function insert()
	{
		$data = [
			'name' => $this->name,
			'link' => $this->link,
		];

		$this->add('menu_options', $data);
	}

	public function searchMenuOptions($keyWord)
	{
		$this->db->select('*');
		$this->db->like('name', "$keyWord");
		$this->db->or_like('link', "$keyWord");

        $databaseUsers  = $this->db->get('menu_options')->result();
        return $databaseUsers;
	}

}