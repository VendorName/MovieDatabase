<?php
namespace VendorName\MovieDatabase\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Grid\Paragraph\View\Model\MetaContent;

class MovieController extends AbstractActionController
{

    public function indexAction()
    {
        /* @var \VendorName\MovieDatabase\Model\Movie\Model $model */
        $model = $this->getServiceLocator()->get('VendorName\MovieDatabase\Model\Movie\Model');
        
        /* @var \VendorName\MovieDatabase\Model\Movie\Structure $movie */
        $movie = $model->findByTitleAndReleaseYear($this->params()
            ->fromRoute('title'), $this->params()
            ->fromRoute('year'));
        
        if (empty($movie)) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        
        $this->paragraphLayout();
        
        return new MetaContent('vendorNameMovieDatabase.movieData', array(
            'movie' => $movie
        ));
    }
}
