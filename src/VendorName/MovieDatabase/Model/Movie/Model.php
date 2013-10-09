<?php
 
namespace VendorName\MovieDatabase\Model\Movie;
 
use Zork\Model\MapperAwareTrait;
use Zork\Model\MapperAwareInterface;
 
/**
 * Movie model
 */
class Model implements MapperAwareInterface {
 
	use MapperAwareTrait;
 
	/**
	 * Construct model
	 *
	 * @param \Core\Model\Module\Mapper $moduleMapper        	
	 */
	public function __construct(Mapper $moduleMapper) {
		$this->setMapper ( $moduleMapper );
	}
 
	/**
	 * Create a movie
	 *
	 * @param array $data        	
	 * @return \Grid\Core\Model\SubDomain\Structure
	 */
	public function create($data) {
		return $this->getMapper ()->create ( $data );
	}
 
	/**
	 * Find a movie by id
	 *
	 * @param int $id        	
	 * @return \Grid\Core\Model\SubDomain\Structure
	 */
	public function find($id) {
		return $this->getMapper ()->find ( $id );
	}
 
	/**
	 * Save a movie
	 * 
	 * @param array | \Grid\Core\Model\SubDomain\Structure $structure
	 * @return int Number of affected rows
	 */
	public function save( $structure ) {
	    return $this->getMapper()->save( $structure );
	}
	
	/**
	 * Save a movie
	 *
	 * @param array | \Grid\Core\Model\SubDomain\Structure $structure
	 * @return int Number of affected rows
	 */
	public function delete( $structure ) {
		return $this->getMapper()->delete( $structure );
	}
	
	/**
	 * Find a movie by name and release year
	 *
	 * @param string $name        	
	 * @return \Grid\Core\Model\SubDomain\Structure
	 */
	public function findByTitleAndReleaseYear($title, $releaseYear) {
		return $this->getMapper ()->findByTitleAndReleaseYear ( $title, $releaseYear );
	}
 
	/**
	 *
	 * @return \Zend\Paginator\Paginator
	 */
	public function getPaginator() {
		return $this->getMapper ()->getPaginator ( null, array (
				'title' => 'asc' 
		) );
	}
}
