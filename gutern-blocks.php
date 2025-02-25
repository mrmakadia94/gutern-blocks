<?php
/**
 * Plugin Name:       Gutern Blocks
 * Description:       The Gutenberg Accordion Block is a customizable and interactive block that allows users to display content in a collapsible format. It enhances user experience by organizing content into expandable sections, making pages cleaner and more structured.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            Meet Makadia
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gutern-blocks
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function gutern_blocks_block_init() {
	register_block_type( __DIR__ . '/build/accordion' );
	register_block_type( __DIR__ . '/build/accordion-item' );
}
add_action( 'init', 'gutern_blocks_block_init' );

/**
* Enqueue Bootstrap in the block editor.
 */
function gutern_blocks_enqueue_editor_assets()
{
	wp_enqueue_style(
		'guternblocks-bootstrap5',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
		array(),
		'5.3.3'
	);
	wp_enqueue_script(
		'guternblocks-bootstrap5',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
		array(),
		'5.3.3',
		true
	);
}
add_action('enqueue_block_assets', 'gutern_blocks_enqueue_editor_assets');

/**
 * Enqueue Bootstrap on the front end of the site.
 */
function gutern_blocks_enqueue_frontend()
{
	wp_enqueue_style(
		'guternblocks-bootstrap5',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
		array(),
		'5.3.3'
	);

	wp_enqueue_script(
		'guternblocks-bootstrap5',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
		array(),
		'5.3.3',
		true
	);
}
add_action('wp_enqueue_scripts', 'gutern_blocks_enqueue_frontend');

