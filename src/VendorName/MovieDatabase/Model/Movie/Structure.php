<?php
 
namespace VendorName\MovieDatabase\Model\Movie;
 
use Zork\Model\Structure\MapperAwareAbstract;
 
/**
 * Data structure for movie entry
 */
class Structure extends MapperAwareAbstract {
 
	/**
	 * Unique ID
	 *
	 * @var int
	 */
	protected $id;
 
	/**
	 * Movie's title
	 *
	 * @var string
	 */
	protected $title;
 
	/**
	 * Release Year
	 *
	 * @var int
	 */
	protected $releaseYear;
 
	/**
	 * ID on http://imdb.com
	 *
	 * @var string
	 */
	protected $imdbId;
 
	/**
	 * Getter for the id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
 
	/**
	 * Getter of the title
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}
 
	/**
	 * Setter of the title
	 *
	 * @param string $title        	
	 * @return \VendorName\MovieDatabase\Model\Movie\Structure
	 */
	public function setTitle($title) {
		$this->title = ( string ) $title;
		return $this;
	}
 
	/**
	 * Getter of the releaseYear
	 *
	 * @return int
	 */
	public function getReleaseYear() {
		return $this->releaseYear;
	}
 
	/**
	 * Setter of the releaseYear
	 *
	 * @param unknown $releaseYear        	
	 * @return \VendorName\MovieDatabase\Model\Movie\Structure
	 */
	public function setReleaseYear($releaseYear) {
		$this->releaseYear = ( int ) $releaseYear;
		return $this;
	}
 
	/**
	 * Getter of the imdbId
	 *
	 * @return string
	 */
	public function getImdbId() {
		return $this->imdbId;
	}
 
	/**
	 * Setter of the imdbId
	 *
	 * @param string $imdbId        	
	 * @return \VendorName\MovieDatabase\Model\Movie\Structure
	 */
	public function setImdbId($imdbId) {
		$this->imdbId = ( string ) $imdbId;
		return $this;
	}
}
