<?php
/**
 * Social Post Embed
 *
 * @package           social-post-embed
 * @author            David Artiss
 * @license           GPL-2.0-or-later
 *
 * Plugin Name:       Social Post Embed
 * Plugin URI:        https://wordpress.org/plugins/social-post-embed/
 * Description:       📌 Add embedding for various social media platforms to your WordPress posts
 * Version:           2.0
 * Requires at least: 4.6
 * Requires PHP:      8.0
 * Author:            David Artiss
 * Author URI:        https://artiss.blog
 * Text Domain:       social-post-embed
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

 // Define global to hold the plugin base file name.

if ( ! defined( 'SOCIAL_POST_EMBED_PLUGIN_BASE' ) ) {
	define( 'SOCIAL_POST_EMBED_PLUGIN_BASE', plugin_basename( __FILE__ ) );
}

// Include all the various functions.

$functions_dir = plugin_dir_path( __FILE__ ) . 'inc/';

require_once $functions_dir . 'threads.php';       // Add Threads embedding.

require_once $functions_dir . 'spoutible.php';     // Add Spoutible embedding.

if ( is_admin() ) {

	include_once $functions_dir . 'admin.php';     // Administration configuration.

}
