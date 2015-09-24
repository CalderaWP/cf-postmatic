<?php
/**
 * @package   Caldera_Forms_Postmatic
 * @author    Josh Pollock <Josh@CalderaWP.com>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2015 Josh Pollock for CalderaWP
 *
 * @wordpress-plugin
 * Plugin Name: Postmatic For Caldera Forms
 * Plugin URI:  https://calderawp.com/downloads/postmatic-for-caldera-forms/
 * Description: Postmatic integration for Caldera Forms
 * Version: 1.2.1
 * Author:      Josh Pollock <Josh@CalderaWP.com>
 * Author URI:  http://calderawp.com
 * Text Domain: cf-postmatic
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// define constants
define( 'CF_POSTMATIC_PATH',  plugin_dir_path( __FILE__ ) );
define( 'CF_POSTMATIC_URL',  plugin_dir_url( __FILE__ ) );
define( 'CF_POSTMATIC_VER', '1.2.1' );

// add filter to register addon with Caldera Forms
add_filter('caldera_forms_get_form_processors', 'cf_postmatic_register');

//show success notices
add_filter( 'caldera_forms_render_notices', 'cf_postmatic_maybe_notices' );

// pull in the functions file
include CF_POSTMATIC_PATH . 'includes/functions.php';



