<?php
 
namespace VendorName\MovieDatabase\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Grid\Paragraph\View\Model\MetaContent;
 
class ListController extends AbstractActionController
{
    public function indexAction() {
        /* @var \VendorName\MovieDatabase\Model\Movie\Model $model */
        $model = $this->getServiceLocator()->get('VendorName\MovieDatabase\Model\Movie\Model');
 
        $paginator = $model->getPaginator();
 
        $paginator->setCurrentPageNumber($this->params()->fromQuery('page', 1));
 
        $this->paragraphLayout();
 
        return new MetaContent( 'vendorNameMovieDatabase.movieList', array('paginator' => $paginator));
    }
}
