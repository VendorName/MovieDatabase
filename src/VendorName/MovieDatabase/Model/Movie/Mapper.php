<?php
 
namespace VendorName\MovieDatabase\Model\Movie;
 
use Zork\Model\Mapper\DbAware\ReadWriteMapperAbstract;
 
/**
 * Movie mapper
 */
class Mapper extends ReadWriteMapperAbstract {
 
	/**
	 * Table name used in queries
	 *
	 * @var string
	 */
	protected static $tableName = 'movies';
 
	/**
	 * Default column-conversion functions as types;
	 * used in selected(), deselect()
	 *
	 * @var array
	 */
	protected static $columns = array (
			'id' => self::INT,
			'title' => self::STR,
			'releaseYear' => self::INT,
			'imdbId' => self::STRING 
	);
 
	/**
	 * Constructor
	 *
	 * @param \Grid\Core\Model\Module\Structure $structure        	
	 */
	public function __construct(Structure $structure = null) {
		parent::__construct ( $structure ?  : new Structure () );
	}
 
	/**
	 * Find movie by name and release year
	 *
	 * @param string $name        	
	 * @param int $releaseYear        	
	 * @return \Grid\Core\Model\Module\Structure
	 */
	public function findByTitleAndReleaseYear($title, $releaseYear) {
		return $this->findOne ( array (
				'title' => ( string ) $title,
				'releaseYear' => ( string ) $releaseYear 
		) );
	}
}