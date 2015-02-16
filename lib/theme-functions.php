<?php
/**
 * matwordtheme theme functions definted in /lib/init.php
 *
 * @package matwordtheme
 */


/**
 * Register Widget Areas
 */
function matword_widgets_init() {
	// Main Sidebar
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'matwordtheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

/**
 * Remove Dashboard Meta Boxes
 */
function matword_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	 //unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	 //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

/**
 * Change Admin Menu Order
 */
function matword_custom_menu_order( $menu_ord ) {
	if ( !$menu_ord ) return true;
	return array(
		// 'index.php', // Dashboard
		// 'separator1', // First separator
		// 'edit.php?post_type=page', // Pages
		// 'edit.php', // Posts
		// 'upload.php', // Media
		// 'gf_edit_forms', // Gravity Forms
		// 'genesis', // Genesis
		// 'edit-comments.php', // Comments
		// 'separator2', // Second separator
		// 'themes.php', // Appearance
		// 'plugins.php', // Plugins
		// 'users.php', // Users
		// 'tools.php', // Tools
		// 'options-general.php', // Settings
		// 'separator-last', // Last separator
	);
}

/**
 * Hide Admin Areas that are not used
 */
function matword_remove_menu_pages() {
	// remove_menu_page( 'link-manager.php' );
}

/**
 * Remove default link for images
 */
function matword_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	if ( $image_set !== 'none' ) {
		update_option( 'image_default_link_type', 'none' );
	}
}

/**
 * Enqueue scripts
 */
function matword_scripts() {

	//Bootstrap CSS
	wp_enqueue_style('bootstrap', get_bloginfo('template_directory').'/assets/plugins/css/bootstrap/css/bootstrap.min.css', array(), '3.3.2');
	wp_enqueue_style('bootstrap_theme', get_bloginfo('template_directory').'/assets/plugins/css/bootstrap/css/bootstrap-theme.min.css', array(), '3.3.2');
	
	//Fontawsome CSS
	wp_enqueue_style('fontawsome', get_bloginfo('template_directory').'/assets/plugins/css/font-awesome/css/font-awesome.min.css', array(), '4.2.0');
	
	wp_enqueue_style( 'wordcomat-style', get_stylesheet_uri() );
	wp_enqueue_style('wordcomat_theme', get_bloginfo('template_directory').'/assets/styles/wordcomat.css', array(), '1.0.0', 'screen, projection');
	wp_enqueue_style('wordcomat_responsive', get_bloginfo('template_directory').'/assets/styles/responsive.css', array(), '1.0.0', 'screen, projection');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( !is_admin() ) {
		wp_enqueue_script( 'jquery' );
		// Boottrap Javascript
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/plugins/css/bootstrap/js/bootstrap.min.js', array('jquery'), NULL, true );
		// wp_enqueue_script( 'customplugins', get_template_directory_uri() . '/assets/js/plugins.min.js', array('jquery'), NULL, true );
	}
}

/**
 * Remove Query Strings From Static Resources
 */
function matword_remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}

/**
 * Remove Read More Jump
 */
function matword_remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	if ($offset) {
		$end = strpos( $link, '"',$offset );
	}
	if ($end) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}

/**
* Add a filter to set limit of character displayed
*/
function plugin_myContentFilter($content)
{
	// Take the existing content and return a subset of it
	if(is_single() ){
		return $content;
	}else{
		$content = substr($content, 0, 1100)."...";
		return strip_tags($content, '<br /><ul><ol><li><p><i><b><u><img>'); 
	}
}