<?php

namespace VendorName\MovieDatabase\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;
use VendorName\MovieDatabase\Model\Imdb\Model;

class Imdb  extends AbstractHelper {
	public function __invoke($imdbId) {
		
		$imdbModel = new Model();
		
		$imdbData = $imdbModel->getImdbDataById($imdbId);
		
		if ($imdbData->Response == 'True') {
			return $imdbData;
		} else {
			return null;
		}
	}
}

