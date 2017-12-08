<?php

class WP_Job_Manager_Blocks_Jobs {
	function __construct() {
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_block_assets' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
	}

	function enqueue_block_assets() {
		// Scripts.
		wp_enqueue_script(
			'wp-job-manager/jobs', // Handle.
			plugins_url( 'block.js', __FILE__ ), // Block.js: We register the block here.
			array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
			filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime — Gets file modification time.
		);
		// Styles.
		wp_enqueue_style(
			'wp-job-manager/jobs', // Handle.
			plugins_url( 'style.css', __FILE__ ), // Block editor CSS.
			array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
			filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
		);
	}

	/**
	 * Enqueue scripts and styles
	 */
	function enqueue_block_editor_assets() {
		// Scripts.
		wp_enqueue_script(
			'wp-job-manager/jobs', // Handle.
			plugins_url( 'block.js', __FILE__ ), // Block.js: We register the block here.
			array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
			filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime — Gets file modification time.
		);
		// Styles.
		wp_enqueue_style(
			'wp-job-manager/jobs', // Handle.
			plugins_url( 'editor.css', __FILE__ ), // Block editor CSS.
			array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
			filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
		);
	}
}

new WP_Job_Manager_Blocks_Jobs();
