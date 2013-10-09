<?php

namespace VendorName\MovieDatabase\Controller;

use Zork\Stdlib\Message;
use Zork\Mvc\Controller\AbstractAdminController;

class AdminDeleteController extends AbstractAdminController {
	
	/**
	 * Delete movie
	 */
	public function deleteAction() {
		/* @var $model \VendorName\MovieDatabase\Model\Movie\Model */
		$model = $this->getServiceLocator ()->get ( 'VendorName\MovieDatabase\Model\Movie\Model' );
		
		/* @var $movie \VendorName\MovieDatabase\Model\Movie\Structure */
		$movie = $model->findByTitleAndReleaseYear ( $this->params ()->fromRoute ( 'title' ), $this->params ()->fromRoute ( 'year' ) );
		
		if ($model->delete ( $movie )) {
			
			$this->messenger ()->add ( 'movieDatabase.message.delete.success', 'myVendorMyModule', Message::LEVEL_INFO );
			
			return $this->redirect ()->toUrl ( $this->url ()->fromRoute ( 'VendorName\MovieDatabase\Admin\Movie\List', array (
					'locale' => ( string ) $this->locale () 
			) ) );
		} else {
			$this->messenger ()->add ( 'movieDatabase.message.delete.failed', 'myVendorMyModule', Message::LEVEL_ERROR );
		}
	}
}
