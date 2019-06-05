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
		if(strlen($this->content) > 400){
			return substr($this->content, 0, 400);
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
		$this->db->order_by("publication_date", "asc"); 
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
		$this->db->order_by("publication_date", "asc"); 

		if(is_numeric($limit) && is_numeric($start)){
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

	public function getPublicationsAjax($limit = null, $start = null)
	{
		$this->db->select("name, description, id_publication, title, IF(CHAR_LENGTH(content) > 400, SUBSTRING(content, 1, 400), content) AS content, image_path,  DATE_FORMAT(publication_date,'%d/%m/%Y às %H:%i') AS publication_date");
		$this->db->from('publications');
		$this->db->join('categories','categories.id_category = publications.id_category');
		$this->db->order_by("publication_date", "asc"); 

		if(is_numeric($limit) && is_numeric($start)){
			$this->db->limit($limit, $start);
		}

		$dataBasePublications = $this->db->get()->result();
		return $dataBasePublications;
	}

	public function getPublicationsFromCategoryAjax($limit = null, $start = null, $categoryName)
	{
		$this->db->select("name, description, id_publication, title, IF(CHAR_LENGTH(content) > 400, SUBSTRING(content, 1, 400), content) AS content, image_path,  DATE_FORMAT(publication_date,'%d/%m/%Y às %H:%i') AS publication_date");
		$this->db->from('publications');
		$this->db->join('categories','categories.id_category = publications.id_category');
		$this->db->where('name', $categoryName);
		$this->db->order_by("publication_date", "asc"); 

		if(is_numeric($limit) && is_numeric($start)){
			$this->db->limit($limit, $start);
		}

		$dataBasePublications = $this->db->get()->result();
		return $dataBasePublications;
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

	public function searchPublications($keyWord)
	{
		$this->db->select('*');
		$this->db->like('title', "$keyWord");
		$this->db->or_like('content', "$keyWord");

        $dataBasePublications  = $this->db->get('publications')->result();
        return $dataBasePublications;
	}

	public function getPublicationById($idPublication)
	{
		$this->db->select('*');
		$this->db->where('id_publication', $idPublication);
		$this->db->limit(1);

        $dataBasePublication = $this->db->get('publications')->row();
        return $dataBasePublication;
	}

	public function getPublicationByName($publicationName)
	{
		$this->db->select("id_publication, title, content, image_path,  DATE_FORMAT(publication_date,'%d/%m/%Y às %H:%i') AS publication_date");
		$this->db->where('LOWER(title)', strtolower($publicationName));
		$this->db->limit(1);

		$dataBasePublication = $this->db->get('publications')->row();

		$publication = new Publications_model(
			$dataBasePublication->title,
			$dataBasePublication->content,
			$dataBasePublication->image_path,
			$dataBasePublication->publication_date
		);

		return $publication;
	}

}