<?php
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
	'name'              => _x('Books', 'plural'),
	'singular_name'     => _x('Books', 'singular'),
	'menu_name'         => _x('Books', 'admin menu'),
	'name_admin_bar'    => _x('Books', 'admin bar'),
	'add_new'           => _x('Add New', 'add new'),
	'add_new_item'      => __('Add New Book'),
	'new_item'          => __('New Book'),
	'edit_item'         => __('Edit Book'),
	'view_item'         => __('View Books'),
	'all_items'         => __('All Books'),
	'search_items'      => __('Search Books'),
	'not_found'         => __('No Books found.'),
	// _x , __ used for internationalization
	// The above array Displays the Text in various places
	// It dispalys the text in Wp-admin window , Post...
	);
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'book'),
	'has_archive' => true,
	'hierarchical' => false,
	'menu_position' => null,
	'supports'=>array('title','editor','author','thumbnail','excerpt','comments')
);
register_post_type('book', $args);// Registers custom post type
}
add_action('init', 'cw_post_type_book',0);
// Refrence:-https://www.cloudways.com/blog/wordpress-custom-post-type/#what-are-cpt

	
// Function to create custom taxonomies
function wp_book_custom_taxonomies() {
    //new hierarchical taxonomy (like categories)
    $labels = array(
        'name'              => _x('Book Categories', 'taxonomy general name', 'wp-book'),
        'singular_name'     => _x('Book Category', 'taxonomy singular name', 'wp-book'),
        'search_items'      => __('Search Book Categories', 'wp-book'),
        'all_items'         => __('All Book Categories', 'wp-book'),
        'parent_item'       => __('Parent Book Category', 'wp-book'),
        'parent_item_colon' => __('Parent Book Category:', 'wp-book'),
        'edit_item'         => __('Edit Book Category', 'wp-book'),
        'update_item'       => __('Update Book Category', 'wp-book'),
        'add_new_item'      => __('Add New Book Category', 'wp-book'),
        'new_item_name'     => __('New Book Category Name', 'wp-book'),
        'menu_name'         => __('Book Categories', 'wp-book'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'book-category'),
    );
    register_taxonomy('book_category', array('book'), $args);
	// refrence:-https://wordpress.stackexchange.com/questions/15775/custom-taxonomy-hierarchy-for-custom-post-types-eg-categories-and-subcategories
	// refrence:-https://solidwp.com/blog/wordpress-taxonomies/#h-taxonomy-template-hierarchy
}
// Hook into the init action and call wp_book_custom_taxonomies when it fires
add_action('init', 'wp_book_custom_taxonomies');


function wp_book_Tags(){

	$labels=array(
		'name'                       =>_x('Book Tags','taxonomy general name','wp-book'),
		'singular_name'              =>_x('Book Tag','taxonomy singular name','wp-book'),
		'popular_items'              =>_x('search Book Tags','wp-book'),
		'edit_item'                  => __('Edit Book Tag', 'wp-book'),
        'update_item'                => __('Update Book Tag', 'wp-book'),
        'add_new_item'               => __('Add New Book Tag', 'wp-book'),// text on button
        'new_item_name'              => __('New Book Tag Name', 'wp-book'),
        'separate_items_with_commas' => __('Separate book tags with commas', 'wp-book'),
        'add_or_remove_items'        => __('Add or remove book tags', 'wp-book'),
        'choose_from_most_used'      => __('Choose from the most used book tags', 'wp-book'),
        'not_found'                  => __('No book tags found.', 'wp-book'),
        'menu_name'                  => __('Book Tags', 'wp-book'),
	);

	$args=array(
		'hierarchical'          =>false,
		'labels'                =>$labels,
		'show_ui'               =>true,
		'show_admin_column'     =>true,
		'update_count_callback' =>true,
		'query_var'             =>true,
		'rewrite'               =>array('slug'=>'book-tags'),
	);
	register_taxonomy('book-tags',array('book'),$args);
}
add_action('init','wp_book_Tags');



