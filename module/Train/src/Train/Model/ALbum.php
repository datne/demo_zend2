<?php 

namespace Train\Model;

/**
 * summary
 */
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Album
{
	public $id;
	public $artist;
	public $title;
	protected $inputFilter;


	public function exchangeArray($data)
	{
		$this->id     = $data['id'];
		$this->artist = $data['artist'];
		$this->title  = $data['title'];
	}

	public function setTitle($title)
	{
		$this->title = $title;
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