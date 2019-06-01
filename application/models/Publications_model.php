<?php

require_once "Base_model.php";

class Publications_model extends Base_model
{
	private $publicationId;
	private $title;
	private $content;
	private $imagePath;
	private $publicationDate;
	private $categoryId;
	private $category;

	public function __construct($title = null, $content = null, $imagePath = null, $publicationDate= null, $category = null,$categoryId = null, $publicationId = null)
	{
		parent::__construct();
		$this->load->model('categories_model', 'categoryClass');

		$this->imagePath = $imagePath;
		$this->category = $category;
		$this->publicationDate = $publicationDate;
		$this->categoryId = $categoryId;
		$this->title = $title;
		$this->content = $content;
		$this->publicationId = $publicationId;
	}

	public function getCategory()
	{
		return $this->category;
	}

	public function getImagePath()
	{
		return $this->imagePath;
	}

	public function getPublicationDate()
	{
		return $this->publicationDate;
	}

	public function getCategoryId()
	{
		return $this->categoryId;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getResumedContent()
	{
		if(strlen($this->content) > 200){
			return substr($this->content, 0, 200);
		}else{
			return $this->content;
		}
	}

	public function getPublicationId()
	{
		return $this->publicationId;
	}

	public function getLink()
	{
		$arrayTitle = explode(' ', $this->title);
		$title = implode('-', $arrayTitle);
		return $title;
	}

	public function getAllPublicationsFromCategory($idCategory)
	{
		$this->db->select("name, description, id_publication, title, content, image_path,  DATE_FORMAT(publication_date,'%d/%m/%Y às %H:%i') AS publication_date");
		$this->db->from('publications');
		$this->db->join('categories','categories.id_category = publications.id_category');
		$this->db->where('publications.id_category', $idCategory); 
        $this->db->limit(10);
        $dataBasePublications = $this->db->get()->result();

        $publications = [];
        foreach ($dataBasePublications as $dataBasePublication) {
        	$category = new $this->categoryClass(
        		$dataBasePublication->name,
        		$dataBasePublication->description
        	);

        	$publication = new Publications_model(
        		$dataBasePublication->title,
        		$dataBasePublication->content,
        		$dataBasePublication->image_path,
        		$dataBasePublication->publication_date,
        		$category,
        		null,
        		$dataBasePublication->id_publication
        	);

        	$publications[] = $publication;
        }

        return $publications;
	}

	public function getPublications($limit = null, $start = null)
	{
		$this->db->select("name, description, id_publication, title, content, image_path,  DATE_FORMAT(publication_date,'%d/%m/%Y às %H:%i') AS publication_date");
		$this->db->from('publications');
		$this->db->join('categories','categories.id_category = publications.id_category');

		if($limit != null && $start  != null){
			$this->db->limit($limit, $start);
		}

		$dataBasePublications = $this->db->get()->result();

		$publications = [];
		foreach ($dataBasePublications as $dataBasePublication) {
			$category = new $this->categoryClass(
				$dataBasePublication->name,
				$dataBasePublication->description
			);

			$publication = new Publications_model(
				$dataBasePublication->title,
				$dataBasePublication->content,
				$dataBasePublication->image_path,
				$dataBasePublication->publication_date,
				$category,
				null,
				$dataBasePublication->id_publication
			);

			$publications[] = $publication;
		}

		return $publications;
	}

	public function insert()
	{
		$data = [
			'title' => $this->title,
			'content' => $this->content,
			'image_path' => $this->imagePath,
			'id_category' => $this->categoryId
		];

		$this->publicationId = $this->addGetId('publications', $data);
	}

}