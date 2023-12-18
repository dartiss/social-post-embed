<?php
/**
 * Spoutible Embedding
 *
 * Functions to embed Spoutible into a post.
 *
 * @package social-post-embed
 */

// Exit if accessed directly.

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Spoutible URL Handler.
 */
function spte_register_spoutible_handler() {
	wp_embed_register_handler(
		'spoutible',
		'#https://spoutible\.com/.*#i',
		'spte_spoutible_handler'
	);
}

add_action( 'init', 'spte_register_spoutible_handler' );

/**
 * Embed Spoutible Handler
 *
 * This is the callback function that will generate the Spoutible embed HTML.
 *
 * @param  array  $matches       An array containing any regex matches.
 * @param  array  $attr          An array containing the embed attributes.
 * @param  string $embed_url     The URL that was matched.
 * @param  array  $rawattr       An array containing the raw (unfiltered) embed attributes.
 * @return string                Resulting embed code.
 */
function spte_spoutible_handler( $matches, $attr, $embed_url, $rawattr ) {

	$rawattr = array(); // Array is not used here.

	// Divide out the link, seperating out the post ID as well as the user name.

	$matched = preg_match( '/\/(\d+)$/', $embed_url, $split );

	if ( 1 === $matched ) {
		$user = $split[1];
	} else {
		$user = false;
	}

	// Now generated the embed code - this is the code currently provided by Spoutible and is presented as-is.

	if ( ! $user ) {
		$embed = '<p>Error: Spoutible URL format not recognised.</p>';
	} else {
		// The following code makes use of a third party script from Spoutible. The Privacy Policy is at https://help.spoutible.com/support/solutions/articles/150000044459-privacy-policy
		// PHPCS is disabled for this next line, so there's no nag to enqueue this script.
		// phpcs:disable
		$embed = '<link rel="stylesheet" href="https://static.spoutible.com/spout/embed.css"><script async src="https://static.spoutible.com/spout/embed.js"></script><div class="sptbl_embed-spout" data-spout-id="' . $user . '"></div>';
	}

	return $embed;
}
