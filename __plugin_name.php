<?php
/*
Plugin Name: Divi Ex
Plugin URI:  
Description: A few custom divi modules
Version:     1.0.0
Author:      neilswart3
Author URI:  
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: divex-divi_ex
Domain Path: /languages

Divi Ex is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Divi Ex is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Divi Ex. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'divex_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function divex_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviEx.php';
}
add_action( 'divi_extensions_init', 'divex_initialize_extension' );
endif;
