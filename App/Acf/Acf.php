<?php

namespace App\Acf;

class Acf {
	public static function isAcfPluginActivated(): bool {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}

		if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
			return true;
		}

		return false;
	}
}