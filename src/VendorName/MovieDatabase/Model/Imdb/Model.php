<?php

namespace VendorName\MovieDatabase\Model\Imdb;

use Zend\Cache\StorageFactory;

class Model {
	
	/**
	 * Get imdb data by title (and optionaly release year)
	 * 
	 * @param string $title        	
	 * @param int $releaseYear        	
	 * @return \stdClass NULL
	 */
	public function getImdbDataByTitle($title, $releaseYear = null) {
		$requestUrl = 'http://www.omdbapi.com/?t=' . urlencode ( $title );
		
		if (! is_null ( $releaseYear )) {
			$requestUrl .= '&y=' . $releaseYear;
		}
		
		$response = json_decode ( file_get_contents ( $requestUrl ) );
		
		if ($response->Response == 'True') {
			$response = $this->getImdbDataById ( $response->imdbID );
		}
		
		return $response;
	}
	
	/**
	 * Get imdb data by imdb id
	 *
	 * @param string $imdbId        	
	 * @return \stdClass NULL
	 */
	public function getImdbDataById($imdbId) {
		$cache = $this->getCache ();
		
		if (! $cache->hasItem ( $imdbId )) {
			$requestUrl = 'http://www.omdbapi.com/?i=' . urlencode ( $imdbId );
			$response = json_decode ( file_get_contents ( $requestUrl ) );
			
			$response->PosterLocal = null;
			
			if (isset ( $response->Poster ) && preg_match ( '/^http:\/\//', $response->Poster )) {
				$posterContent = file_get_contents ( $response->Poster );
				
				$imageUriDir = '/uploads/gridguyz_local/movieDatabase/imdb';
				
				$imageDir = 'public' . $imageUriDir;
				
				if (! is_dir ( $imageDir )) {
					mkdir ( $imageDir, 0775, true );
				}
				
				$posterFilename = $imdbId . '.jpg';
				$posterPath = $imageDir . '/' . $posterFilename;
				$imageUri = $imageUriDir . '/' . $posterFilename;
				
				file_put_contents ( $posterPath, $posterContent );
				
				$response->PosterLocalPath = $posterPath;
				$response->PosterLocalUri = $imageUri;
			}
			
			$cache->setItem ( $imdbId, $response );
		}
		
		$imdbData = $cache->getItem ( $imdbId );
		
		if ($imdbData->Response == 'True') {
			return $imdbData;
		} else {
			return null;
		}
	}
	
	/**
	 * Get cache object
	 * 
	 * @return \Zend\Cache\Storage\Adapter\Filesystem
	 */
	protected function getCache() {
		$cacheDir = 'data/cache/VendorName/MovieDatabase/imdb';
		
		if (! is_dir ( $cacheDir )) {
			mkdir ( $cacheDir, 0744, true );
		}
		
		$cache = StorageFactory::factory ( array (
				'adapter' => array (
						'name' => 'filesystem',
						'options' => array (
								'namespace' => 'VendorName/MovieDatabase/imdb',
								'cacheDir' => $cacheDir 
						) 
				),
				'plugins' => array (
						'exception_handler' => array (
								'throw_exceptions' => false 
						),
						'Serializer' 
				) 
		) );
		
		return $cache;
	}
}

