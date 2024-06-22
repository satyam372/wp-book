<?php
include 'C:\xampp\htdocs\blogs\wp-content\themes\twentytwentyfour\functions.php';
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://http://localhost:8080/blogs/wp-admin/plugins.php
 * @since             1.0.0
 * @package           Wp_Book
 *
 * @wordpress-plugin
 * Plugin Name:       wp book
 * Plugin URI:        https://http://localhost:8080/blogs/wp-admin/plugins.php
 * Description:       This is a description of the plugin.
 * Version:           1.0.0
 * Author:            satyam pokharna
 * Author URI:        https://http://localhost:8080/blogs/wp-admin/plugins.php/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-book
 * Domain Path:       /languages
 */




function cw_post_type_book() {
	$supports = array(
	'title', // post title
	'editor', // post content
	'author', // post author
	'thumbnail', // featured images
	'excerpt', // post excerpt
	'custom-fields', // custom fields
	'comments', // post comments
	'revisions', // post revisions
	'post-formats', // post formats
    // Meta boxes and fields
	// The above array is displayed in the custom post 
	// This array specifies the feature the post has
	);
	$labels = array(
	'name' => _x('Books', 'plural'),
	'singular_name' => _x('Books', 'singular'),
	'menu_name' => _x('Books', 'admin menu'),
	'name_admin_bar' => _x('Books', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New Book'),
	'new_item' => __('New Book'),
	'edit_item' => __('Edit Book'),
	'view_item' => __('View Books'),
	'all_items' => __('All Books'),
	'search_items' => __('Search Books'),
	'not_found' => __('No Books found.'),
	// _x , __ used for internationalization
	// The above array Displays the Text in various places
	// It dispalys the text in Wp-admin window , Post
	);
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'news'),
	'has_archive' => true,
	'hierarchical' => false,
	);
	register_post_type('news', $args);// Registers custom post type
	}
	add_action('init', 'cw_post_type_book');
// Refrence:-https://www.cloudways.com/blog/wordpress-custom-post-type/#what-are-cpt
	






// If this file is called directly, abort.
// if ( ! defined( 'WPINC' ) ) {
// 	die;
// }

// /**
//  * Currently plugin version.
//  * Start at version 1.0.0 and use SemVer - https://semver.org
//  * Rename this for your plugin and update it as you release new versions.
//  */
// define( 'WP_BOOK_VERSION', '1.0.0' );

// /**
//  * The code that runs during plugin activation.
//  * This action is documented in includes/class-wp-book-activator.php
//  */
// function activate_wp_book() {
// 	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-book-activator.php';
// 	Wp_Book_Activator::activate();
// }

// /**
//  * The code that runs during plugin deactivation.
//  * This action is documented in includes/class-wp-book-deactivator.php
//  */
// function deactivate_wp_book() {
// 	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-book-deactivator.php';
// 	Wp_Book_Deactivator::deactivate();
// }

// register_activation_hook( __FILE__, 'activate_wp_book' );
// register_deactivation_hook( __FILE__, 'deactivate_wp_book' );

// /**
//  * The core plugin class that is used to define internationalization,
//  * admin-specific hooks, and public-facing site hooks.
//  */
// require plugin_dir_path( __FILE__ ) . 'includes/class-wp-book.php';

// /**
//  * Begins execution of the plugin.
//  *
//  * Since everything within the plugin is registered via hooks,
//  * then kicking off the plugin from this point in the file does
//  * not affect the page life cycle.
//  *
//  * @since    1.0.0
//  */
// function run_wp_book() {

// 	$plugin = new Wp_Book();
// 	$plugin->run();

// }
// run_wp_book();
