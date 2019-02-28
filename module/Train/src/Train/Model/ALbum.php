<?php 

namespace Train\Model;

/**
 * summary
 */
class Album
{
	public $id;
	public $artist;
	public $title;

	public function exchangeArray($data)
	{
		$this->id     = $data['id'];
		$this->artist = $data['artist'];
		$this->title  = $data['title'];
	}

	public function getId()
	{
		return $this->id;
	}

	public function getArtist()
	{
		return $this->artist;
	}

	public function getTitle()
	{
		return $this->title;
	}
}

?>