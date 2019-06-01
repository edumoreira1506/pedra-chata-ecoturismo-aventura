<?php

require_once "Base_model.php";

class Categories_model extends Base_model
{
	private $categoryId;
	private $name;
	private $description;

	public function __construct($name = null, $description = null, $categoryId = null)
	{
		parent::__construct();

		$this->name = $name;
		$this->description = $description;
		$this->categoryId = $categoryId;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getCategoryId()
	{
		return $this->categoryId;
	}

	public function getLink()
	{
		$arrayNomeCategoria = explode(' ', $this->name);
		$nomeCategoria = implode('-', $arrayNomeCategoria);
		return $nomeCategoria;
	}

	public function insert()
	{
		$data = [
			'name' => $this->name,
			'description' => $this->description
		];

		$this->categoryId = $this->addGetId('categories', $data);
	}

	public function getAllCategories()
	{
		$this->db->select('*');
        $databaseCategories  = $this->db->get('categories')->result();

        $categories = [];
        foreach ($databaseCategories as $databaseCategory) {
        	$category = new Categories_model(
        		$databaseCategory->name,
        		$databaseCategory->description,
        		$databaseCategory->id_category
        	);

        	$categories[] = $category;
        }

        return $categories;
	}

	public function searchCategories($keyWord)
	{
		$this->db->select('*');
		$this->db->like('name', "$keyWord");
		$this->db->or_like('description', "$keyWord");

        $databaseCategories = $this->db->get('categories')->result();
        return $databaseCategories;
	}

	public function getCategoryById($idCategory)
	{
		$this->db->select('*');
		$this->db->where('id_category', $idCategory); 
        $this->db->limit(1);
        return $this->db->get('categories')->row();
	}

	public function getCategoryByName($categoryName)
	{
		$this->db->select('*');
		$this->db->where('name', $categoryName); 
        $this->db->limit(1);
        $databaseCategory = $this->db->get('categories')->row();

        $category = new Categories_model(
        	$databaseCategory->name,
        	$databaseCategory->description,
        	$databaseCategory->id_category
        );

        return $category;
	}

}