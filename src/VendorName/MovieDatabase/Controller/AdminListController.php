<?php
 
namespace VendorName\MovieDatabase\Controller;
 
use Grid\Core\Controller\AbstractListController;
 
class AdminListController extends AbstractListController {
 
	/**
	 *
	 * @var array
	 */
	protected $aclRights = array (
			'list' => array (
					'movieDatabase.admin' => 'view' 
			) 
	);
 
	/**
	 * Get paginator for listing
	 *
	 * @return \Zend\Paginator\Paginator
	 */
	protected function getPaginator() {
		return $this->getServiceLocator ()->get ( 'VendorName\MovieDatabase\Model\Movie\Model' )->getPaginator ();
	}
}
