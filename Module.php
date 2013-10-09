<?php

namespace VendorName\MovieDatabase;

use Zork\Stdlib\ModuleAbstract;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

/**
 * Module class for Movie Database tutorial application
 */
class Module extends ModuleAbstract implements ViewHelperProviderInterface {
	
	/**
	 * Base directory of the module
	 * @const string
	 */
	const BASE_DIR = __DIR__;
	
	public function getViewHelperConfig() {
		return array (
				'invokables' => array (
						'imdb' => 'VendorName\MovieDatabase\View\Helper\Imdb' 
				) 
		);
	}
}