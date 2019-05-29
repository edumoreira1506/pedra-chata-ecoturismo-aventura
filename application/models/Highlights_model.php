<?php

require_once "Base_model.php";

class Highlights_model extends Base_model
{
	private $highlightId;
	private $title;
	private $description;
	private $active;
	private $imagePath;

	public function __construct($highlightId = null, $title = null, $description = null, $active = null, $imagePath = null)
	{
		parent::__construct();

		$this->description = $description;
		$this->highlightId = $highlightId;
		$this->title = $title;
		$this->active = $active;
		$this->imagePath = $imagePath;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getActive()
	{
		if($this->active){
			return "Ativo";
		}else{
			return "Inativo";
		}
	}

	public function getHighlightId()
	{
		return $this->highlightId;
	}

	public function getImagePath()
	{
		return $this->imagePath;
	}

	public function getNumberActive()
	{
		return $this->active;
	}

	public function insert()
	{
		$data = [
			'title' => $this->title,
			'description' => $this->description,
			'image_path' => $this->imagePath
		];

		$this->highlightId = $this->addGetId('highlights', $data);
	}

	public function getAllHighlights()
	{
		$this->db->select('*');
        $databaseHighlights  = $this->db->get('highlights')->result();

        $highlights = [];
        foreach ($databaseHighlights as $databaseHighlight) {
        	$highlight = new Highlights_model(
        		$databaseHighlight->id_highlight,
        		$databaseHighlight->title,
        		$databaseHighlight->description,
        		$databaseHighlight->active,
        		$databaseHighlight->image_path
        	);

        	$highlights[] = $highlight;
        }

        return $highlights;
	}

	public function getAllHighlightsActive()
	{
		$this->db->select('*');
		$this->db->where('active', '1'); 
        $databaseHighlights  = $this->db->get('highlights')->result();

        $highlights = [];
        foreach ($databaseHighlights as $databaseHighlight) {
        	$highlight = new Highlights_model(
        		$databaseHighlight->id_highlight,
        		$databaseHighlight->title,
        		$databaseHighlight->description,
        		$databaseHighlight->active,
        		$databaseHighlight->image_path
        	);

        	$highlights[] = $highlight;
        }

        return $highlights;
	}

	public function searchHighlights($keyWord)
	{
		$this->db->select('*');
		$this->db->like('title', "$keyWord");
		$this->db->or_like('description', "$keyWord");

        $databaseUsers  = $this->db->get('highlights')->result();
        return $databaseUsers;
	}

	public function getHighlightById($idHighlight)
	{
		$this->db->select('*');
		$this->db->where('id_highlight', $idHighlight); 
        $this->db->limit(1);
        return $this->db->get('highlights')->row();
	}

}