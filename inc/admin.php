<?php
/**
 * Admin Functions
 *
 * Assorted administration functions.
 *
 * @package social-post-embed
 */

// Exit if accessed directly.

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add meta to plugin details
 *
 * Add options to plugin meta line
 *
 * @param    string $links  Current links.
 * @param    string $file   File in use.
 * @return   string         Links, now with settings added.
 */
function spte_add_plugin_meta( $links, $file ) {

	if ( false !== strpos( $file, 'social-post-embed.php' ) ) {

		$links = array_merge(
			$links,
			array( '<a href="https://github.com/dartiss/social-post-embed">' . __( 'Github', 'social-post-embed' ) . '</a>' ),
			array( '<a href="https://wordpress.org/support/plugin/social-post-embed">' . __( 'Support', 'social-post-embed' ) . '</a>' ),
			array( '<a href="https://artiss.blog/donate">' . __( 'Donate', 'social-post-embed' ) . '</a>' ),
			array( '<a href="https://wordpress.org/support/plugin/social-post-embed/reviews/#new-post">' . __( 'Write a Review', 'social-post-embed' ) . '&nbsp;⭐️⭐️⭐️⭐️⭐️</a>' )
		);
	}

	return $links;
}

add_filter( 'plugin_row_meta', 'spte_add_plugin_meta', 10, 2 );

/**
 * WordPress Fork Check
 *
 * Deactivate the plugin if an unsupported fork of WordPress is detected.
 *
 * @version 1.0
 */
function spte_fork_check() {

	// Check for a fork.

	if ( function_exists( 'calmpress_version' ) || function_exists( 'classicpress_version' ) ) {

		// Grab the plugin details.

		$plugins = get_plugins();
		$name    = $plugins[ SOCIAL_POST_EMBED_PLUGIN_BASE ]['Name'];

		// Deactivate this plugin.

		deactivate_plugins( SOCIAL_POST_EMBED_PLUGIN_BASE );

		// Set up a message and output it via wp_die.

		/* translators: 1: The plugin name. */
		$message = '<p><b>' . sprintf( __( '%1$s has been deactivated', 'social-post-embed' ), $name ) . '</b></p><p>' . __( 'Reason:', 'social-post-embed' ) . '</p>';
		/* translators: 1: The plugin name. */
		$message .= '<ul><li>' . __( 'A fork of WordPress was detected.', 'social-post-embed' ) . '</li></ul><p>' . sprintf( __( 'The author of %1$s will not provide any support until the above are resolved.', 'social-post-embed' ), $name ) . '</p>';

		$allowed = array(
			'p'  => array(),
			'b'  => array(),
			'ul' => array(),
			'li' => array(),
		);

		wp_die( wp_kses( $message, $allowed ), '', array( 'back_link' => true ) );
	}
}

add_action( 'admin_init', 'spte_fork_check' );
