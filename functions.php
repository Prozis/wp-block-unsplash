<?php

use App\Acf\Acf;

const TM_TEXTDOMAIN  = 'unsplash-acf-block-theme';
const ASSETS_VERSION = '1.1';


// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * Initialize all the core classes of the theme
 */
if (class_exists('App\\Init')) {
	App\Init::register_services();
}

add_action('wp_enqueue_scripts', 'enqueue_theme_styles');
function enqueue_theme_styles() {
	wp_enqueue_style('swiper-slider', get_stylesheet_directory_uri() . '/assets/css/swiper-slider/swiper-bundle.min.css',);

	$style_asset = include dirname(__FILE__) . '/assets/webpack-dist/css/main.asset.php';
	wp_enqueue_style(
		TM_TEXTDOMAIN . '-main',
		get_stylesheet_directory_uri() . '/assets/webpack-dist/css/main.css',
		$style_asset['dependencies'],
		$style_asset['version']);
}

add_action('wp_enqueue_scripts', 'enqueue_theme_script');
function enqueue_theme_script() {
	$script_asset = include dirname(__FILE__) . '/assets/webpack-dist/js/main.asset.php';

	wp_enqueue_script(
		TM_TEXTDOMAIN . '-main',
		get_stylesheet_directory_uri() . '/assets/webpack-dist/js/main.js',
		$script_asset['dependencies'],
		$script_asset['version'],
	);
}

add_action( 'init', 'register_acf_blocks' );

function register_acf_blocks(): void
{
	if (Acf::isAcfPluginActivated()) {
		foreach (get_blocks_name() as $block_name) {
			register_block_type(__DIR__ . '/assets/webpack-dist/gutenberg/' . $block_name);
		}
	}
}

function get_blocks_name(): array
{
	return array_diff(scandir(__DIR__ . '/assets/webpack-dist/gutenberg/'), ['..', '.']);
}