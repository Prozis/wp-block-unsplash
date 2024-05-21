<?php

namespace App\UnsplashHandler;

class UnsplashHandler {
	public function __construct() {
		\Unsplash\HttpClient::init( [
			'applicationId' => get_field( 'unsplash_access_key', 'option' )
		] );
	}

	public static function get_images( $search, $per_page, $orientation = '', $block_id = '' ) {
		$transient_cache_name = 'unsplash_images-' . $block_id;

		if ( false === ( $unsplash_images = get_transient( $transient_cache_name ) ) ) {
			// It wasn't there, so regenerate the data and save the transient
			try {
				$unsplash_images_query_results = \Unsplash\Search::photos( $search, 1, $per_page, $orientation );
			} catch ( Exception $e ) {
				error_log( date( "m.d.y" ) . '' . $e->getMessage() . "\n" );
			}

			$unsplash_images = [];

			if ( is_object( $unsplash_images_query_results ) ) {
				$result_images = $unsplash_images_query_results->getResults();

				foreach ( $result_images as $image ) {
					$unsplash_images[] = [
						'url' => $image['urls']['regular'],
						'alt' => $image['alt_description'],
					];
				}
			}

			set_transient( $transient_cache_name, $unsplash_images, 24 * HOUR_IN_SECONDS );
		}

		return $unsplash_images;
	}
}