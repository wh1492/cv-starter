<?php 
/**
 * @package CV Starter
 */

/*
Plugin Name: CV Starter
Plugin URI: https://acbn.xyz/
Description: Basic funtions to convert Wordpress in a CV Resume with custom Endpoints for Rest API.
Version: 1.0.0
Author: WH1492
Author URI: https://acbn.xyz/
License: GPLv2 or later
Text Domain: cv-starter
*/



define( 'CV__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );



require_once( CV__PLUGIN_DIR . '/cv-includes/cv-config-page.php' );
require_once( CV__PLUGIN_DIR . '/cv-includes/cv-cpt.php' );
require_once( CV__PLUGIN_DIR . '/cv-includes/cv-metabox.php' );
require_once( CV__PLUGIN_DIR . '/cv-includes/cv-endpoint.php' );