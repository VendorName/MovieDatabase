<?php

namespace VendorName\MovieDatabase\Controller;

use Zork\Stdlib\Message;
use Zork\Mvc\Controller\AbstractAdminController;
use VendorName\MovieDatabase\Model\Movie\Structure as MovieStructure;

class AdminEditController extends AbstractAdminController {
	
	/**
	 *
	 * @var array
	 */
	protected $aclRights = array (
			// checked at every action
			'' => array (
					'movieDatabase.admin' => 'view' 
			),
			// checked only at 'edit' action
			'edit' => array (
					'movieDatabase.admin' => 'edit' 
			) 
	);
	
	/**
	 * Edit action
	 */
	public function editAction() {
		$params = $this->params ();
		$request = $this->getRequest ();
		
		/* @var $model \VendorName\MovieDatabase\Model\Movie\Model */
		$model = $this->getServiceLocator ()->get ( 'VendorName\MovieDatabase\Model\Movie\Model' );
		
		$title = $this->params ()->fromRoute ( 'title' );
		$year = $this->params ()->fromRoute ( 'year' );
		
		if ($title && $year) {
			/* @var $movie \VendorName\MovieDatabase\Model\Movie\Structure */
			$movie = $model->findByTitleAndReleaseYear ( $title, $year );
			
			if (empty ( $movie )) {
				$this->getResponse ()->setStatusCode ( 404 );
				return;
			}
		} else {
			$movie = new MovieStructure();
		}
		
		$form = $this->getServiceLocator ()->get ( 'Form' )->get ( 'VendorName\MovieDatabase\Movie' );
		
		$form->setHydrator ( $model->getMapper () )->bind ( $movie );
		
		if ($request->isPost ()) {
			
			$form->setData ( $request->getPost () );
			
			if ($form->isValid ()) {

				/* @var \VendorName\MovieDatabase\Model\Imdb\Model $imdbModel */
				$imdbModel = $this->getServiceLocator ()->get ( 'VendorName\MovieDatabase\Model\Imdb\Model' );
				
				$imdbData = $imdbModel->getImdbDataByTitle($movie->getTitle(), $movie->getReleaseYear());
				
				if (isset($imdbData->imdbID) && $imdbData->imdbID != 'N/A') {
					$movie->setImdbId($imdbData->imdbID);
				} else {
					$movie->setImdbId(null);
				}
				
				if ($model->save ( $movie )) {
					
					$this->messenger ()->add ( 'movieDatabase.message.save.success', 'myVendorMyModule', Message::LEVEL_INFO );
					
					return $this->redirect ()->toUrl ( $this->url ()->fromRoute ( 'VendorName\MovieDatabase\Admin\Movie\List', array (
							'locale' => ( string ) $this->locale () 
					) ) );
				} else {
					$this->messenger ()->add ( 'movieDatabase.message.save.failed', 'myVendorMyModule', Message::LEVEL_ERROR );
				}
			}
		}
		
		return array (
				'form' => $form,
				'movie' => $movie 
		);
	}
}
