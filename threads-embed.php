<?php
/**
 * Threads Embed
 *
 * @package           threads-embed
 * @author            David Artiss
 * @license           GPL-2.0-or-later
 *
 * Plugin Name:       Threads Embed
 * Plugin URI:        https://gist.github.com/dartiss/97b7da945b9de709dba8fed5a7f23ede
 * Description:       🧵 Add Threads embedding to a WordPress post.
 * Version:           0.1
 * Requires at least: 4.6
 * Requires PHP:      8.0
 * Author:            David Artiss
 * Author URI:        https://artiss.blog
 * Text Domain:       threads-embed
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

/**
 * Add meta to plugin details
 *
 * Add options to plugin meta line
 *
 * @param    string $links  Current links.
 * @param    string $file   File in use.
 * @return   string         Links, now with settings added.
 */
function threads_embed_plugin_meta( $links, $file ) {

	if ( false !== strpos( $file, 'threads-embed.php' ) ) {

		$links = array_merge(
			$links,
			array( '<a href="https://github.com/dartiss/threads-embed">' . __( 'Github', 'threads-embed' ) . '</a>' ),
			array( '<a href="https://github.com/dartiss/threads-embed/issues">' . __( 'Support', 'threads-embed' ) . '</a>' ),
			array( '<a href="https://artiss.blog/donate">' . __( 'Donate', 'threads-embed' ) . '</a>' ),
		);
	}

	return $links;
}

add_filter( 'plugin_row_meta', 'threads_embed_plugin_meta', 10, 2 );

/**
 * Register Threads URL Handler.
 */
function register_threads_embed_handler() {
	wp_embed_register_handler(
		'threads',                          // Unique identifier for this handler.
		'#https://www\.threads\.net/.*#i',  // The regex for URLs you want to embed.
		'threads_embed_handler'             // The callback function to run when a match is found.
	);
}

add_action( 'init', 'register_threads_embed_handler' );

/**
 * Threads Embed Handler
 *
 * This is the callback function that will generate the Threads embed HTML.
 *
 * @param  array  $matches       An array containing any regex matches.
 * @param  array  $attr          An array containing the embed attributes.
 * @param  string $threads_url   The URL that was matched.
 * @param  array  $rawattr       An array containing the raw (unfiltered) embed attributes.
 * @return string                Threads embed code.
 */
function threads_embed_handler( $matches, $attr, $threads_url, $rawattr ) {

	$url = false;

	// Divide out the link, based on forward slashes. The 4th party should be the ID for the Threads post.
	$split = explode( '/', $threads_url );
	if ( 't' == $split[3] ) {
		$url = $split[4];
	} else {
		// If not the format I was expecting, look further along the array.
		if ( 'post' == $split[4] ) {
			$split2 = explode( '?', $split[5] );
			$url    = $split2[0];
		}
	}

	// Now generated the embed code - this is the code currently provided by Threads and is presented as-is.
	if ( ! $url ) {
		$embed = '<p>Error: Threads URL format not recognised.</p>';
	} else {
		$embed = '<blockquote class="text-post-media" data-text-post-permalink="https://www.threads.net/t/' . $url . '" data-text-post-version="0" id="ig-tp-' . $url . '" style=" background:#FFF; border-width: 1px; border-style: solid; border-color: #00000026; border-radius: 16px; max-width:540px; margin: 1px; min-width:270px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"> </blockquote><script async src="https://www.threads.net/embed.js"></script>';
	}

	return $embed;
}
