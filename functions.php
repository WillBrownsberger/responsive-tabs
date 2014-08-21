<?php
/*
* File: functions.php
* Description: This file sets up theme
* -- includes auxiliary files (theme customization, widgets, theme front page options)
* -- registers and enqueues javascript for layout
* -- optionally suppresses bbpress breadcrumbs
* -- registers menu
* -- registers sidebars
* -- adds theme support for header, background, thumbnails, html5
* -- adds metabox to allow control of layout of posts (normal, wide, extra-wide)
*
* @package responsive-tabs
*
*/

/* assure that will die if accessed directly */ 
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

/*
* include theme customizer scripts
*/
include get_template_directory() . '/includes/responsive-tabs-customization.php';  		// note: it is apparently necessary to include this call outside is_admin() condition to allow refresh to work in customizer 
include get_template_directory() . '/includes/responsive-tabs-customization-css.php'; 	// assembles css for wp_head from theme customization selections

/*
* include widgets
*/
include get_template_directory() . '/includes/responsive-tabs-widgets.php'; 				

/*
* include admin classes for appearance>front page options
*/
$theme_options_tabs = array (
   	array ( 'tabs', 'Tabs' ),
   	array ( 'accordion', 'Accordion' ),
   	array ( 'scripts', 'CSS/Scripts' ),
   	array ( 'breadcrumbs', 'Breadcrumbs' ),
);

if ( is_admin() ) {
	global $theme_options_tabs;
	// include and construct the theme options page for tabs and accordions
	include get_template_directory() . '/includes/class-responsive-tabs-theme-options.php';
	// construct the tabs
	foreach ( $theme_options_tabs as $tab ) {
		include get_template_directory() . '/includes/class-responsive-tabs-' .  $tab[0] . '-tab.php';
	}
}

/*
* enqueue script for layout -- menu control and legacy browser-width
*/
function responsive_tabs_theme_setup() {
	if ( !is_admin() ) {
		wp_register_script(
		  'resize',
		 	get_template_directory_uri() . '/js/resize.js'
		);
		wp_enqueue_script('resize');
	} 		
}
add_action('wp_enqueue_scripts', 'responsive_tabs_theme_setup');

/*
*  suppress bbpress bread crumbs on bbp template forms -- since may be loading broader breadcrumb plugins or offering own
*/
add_filter( 'bbp_no_breadcrumb', '__return_true' );

/*
* set up menu
*/
function responsive_tabs_register_menus() {
	register_nav_menu( 'main-menu' ,__( 'Main Menu', 'responsive-tabs' ));
}
add_action( 'init', 'responsive_tabs_register_menus' );

/*
 * Register sidebars
*/
function responsive_tabs_widgets_init() {

	register_sidebar( array(
		'name' 				=> __( 'Header Bar Widget', 'responsive-tabs' ),
		'description' 		=> __( 'Widget on Header Bar (recommended for a search widget ) ', 'responsive-tabs' ),
		'id' 					=> 'header_bar_widget',
		'class' 				=> '',
		'before_widget' 	=> '<div class = "header-bar-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );

	register_sidebar( array(
		'name' 				=> __( 'Side Menu Widget', 'responsive-tabs' ),
		'description' 		=> __( 'Widget on Side Menu Bar', 'responsive-tabs' ),
		'id' 					=> 'side_menu_widget',
		'class' 				=> '',
		'before_widget' 	=> '<div class = "side-menu-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );

	register_sidebar( array(
		'name' 				=> __( 'Home Widget Bulk', 'responsive-tabs' ),
		'description' 		=> __( 'Large widget area to compose front page from multiple small widgets ', 'responsive-tabs' ),
		'id' 					=> 'home_bulk_widget',
		'class' 				=> '',
		'before_widget' 	=> '<div class = "home-bulk-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );
	
	register_sidebar( array(
		'name' 				=> __( 'Home Widget Two', 'responsive-tabs' ),
		'description' 		=> __( 'Second Widget Option for Front Page Tabs', 'responsive-tabs' ),
		'id' 					=> 'home_widget_2',
		'class' 				=> '',
		'before_widget' 	=> '<div class = "general-home-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );
	
	register_sidebar( array(
		'name' 				=> __( 'Home Widget Three', 'responsive-tabs' ),
		'description' 		=> __( 'Third Widget Option for Front Page Tabs', 'responsive-tabs' ),
		'id' 					=> 'home_widget_3',
		'class' 				=> '',
		'before_widget' 	=> '<div class = "general-home-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );

	register_sidebar( array(
		'name' 				=> __( 'Home Widget Four', 'responsive-tabs' ),
		'description' 		=> __( 'Fourth Widget Option for Front Page Tabs', 'responsive-tabs' ),
		'id' 					=> 'home_widget_4',
		'class' 				=> '',
		'before_widget' 	=> '<div class = "general-home-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );

	register_sidebar( array(
		'name' 				=> __( 'Home Widget Five', 'responsive-tabs' ),
		'description' 		=> __( 'Fifth Widget Option for Front Page Tabs', 'responsive-tabs' ),
		'id' 					=> 'home_widget_5',
		'class' 				=> '',
		'before_widget' 	=> '<div class = "general-home-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );

		register_sidebar( array(
		'name' 				=> __( 'Home Widget Six', 'responsive-tabs' ),
		'description' 		=> __( 'Sixth Widget Option for Front Page Tabs', 'responsive-tabs' ),
		'id' 					=> 'home_widget_6',
		'class' 				=> '',
		'before_widget' 	=> '<div class = "general-home-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );
	
	register_sidebar( array(
		'name' 				=> __( 'Home Widget Seven', 'responsive-tabs' ),
		'description' 		=> __( 'Seventh Widget Option for Front Page Tabs', 'responsive-tabs' ),
		'id' 					=> 'home_widget_7',
		'class' 				=> '',
		'before_widget' 	=> '<div class = "general-home-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );

	register_sidebar( array(
		'name' 				=> __( 'Post Sidebar', 'responsive-tabs' ),
		'description' 		=> __( 'Displayed with Posts', 'responsive-tabs' ),
		'id' 					=> 'post_sidebar',
		'before_widget' 	=> '<div class = "sidebar-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );

	register_sidebar( array(
		'name' 				=> __( 'Page Sidebar',  'responsive-tabs' ),
		'description' 		=> __( 'Displayed with Pages (except full-width pages)', 'responsive-tabs' ),
		'id' 					=> 'page_sidebar',
		'before_widget' 	=> '<div class = "sidebar-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );


	register_sidebar( array(
		'name' 				=> __( 'BBPress Sidebar', 'responsive-tabs' ),
		'description' 		=> __( 'Displayed with BBPress Topics and Posts', 'responsive-tabs' ),
		'id' 					=> 'bbpress_sidebar',
		'before_widget' 	=> '<div class = "sidebar-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2 class = widgettitle>',
		'after_title' 		=> '</h2>',
	) );

	register_sidebar( array(
		'name' 				=> __( 'Fine Print Bottom Widget', 'responsive-tabs' ),
		'description' 		=> __( 'Site credit, copyrights, etc.', 'responsive-tabs' ),
		'id' 					=> 'bottom_sidebar',
		'before_widget' 	=> '<div class = "bottom-widget-wrapper"> ',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class = widgettitle>',
		'after_title' 		=> '</h3>',
	) );
}

add_action( 'widgets_init', 'responsive_tabs_widgets_init' );


/*
* theme support items
*
*/

$header_default = array(
	'width'         => 300,
	'height'        => 325,
	'header-text'   => false,
	'uploads'       => true,
);
add_theme_support( 'custom-header', $header_default ); // note -- installed as background image in theme customizer

$background_default = array(
	'default-color'          => 'C6C2BA',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $background_default );

add_theme_support( 'post-thumbnails', array ( 'post', 'page'));
	add_image_size( 'front-page-thumb', 270, 9999 ); //270 pixels wide (and unlimited height)
	add_image_size( 'front-page-half-thumb', 135, 9999 ); //135 pixels wide (and unlimited height)

add_theme_support( 'html5', array( 'search-form' ) );

/*
* add metabox for post width (see nonce technique at http://www.wproots.com/complex-meta-boxes-in-wordpress/) 
*/
function responsive_tabs_call_meta_box( $post_type, $post ) {
   add_meta_box(
       'responsive_tabs_post_width_setting_box',
       __( 'Post Display Width', 'responsive_tabs' ),
       'responsive_tabs_post_width_meta_box',
       'post',
       'side',
       'high'
   );
}
add_action( 'add_meta_boxes', 'responsive_tabs_call_meta_box', 10, 2 );

/* display meta box post width options */
function responsive_tabs_post_width_meta_box($post, $args) {
   
	wp_nonce_field( site_url(__FILE__), 'responsive_tabs_meta_box_noncename' );
              
	$post_width_options = array(
		'0' => array(
			'value' =>	'normal',
			'label' =>   __( 'Normal (show sidebar)', 'responsive-tabs'),
		),
		'1' => array(
			'value' =>	'wide',
			'label' =>  __( 'Wide (hide sidebar)' , 'responsive-tabs'),
		),
		'2' => array(
			'value' => 'extra_wide',
			'label' => __( 'Extra Wide (maximize content)', 'responsive-tabs'),
		),
	);	 
    
	$selected = ( null !== get_post_meta( $post->ID, '_twcc_post_width', true ) ) ? get_post_meta( $post->ID, '_twcc_post_width', true ) : '';
   echo '<select id = "_twcc_post_width" name = "_twcc_post_width">';

	$p = '';
	$r = '';
	foreach ( $post_width_options as $option ) {
	  	$label = $option['label'];
		if ( $selected == $option['value'] ) { // Make selected first in list
		     $p = '<option selected = "selected" value="' . $option['value'] . '">' . esc_html( $label) . '</option>';
		} else { 
			$r .= '<option value="' . $option['value'] . '">' .  esc_html( $label ) .  '</option>';
		}
	}
 	echo $p . $r. '</select>';

}

/* save width from meta box */
function responsive_tabs_save_meta_box( $post_id, $post ) {
	
   if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
       return;
	}
	
	if( ! current_user_can('edit_post', $post_id)) {
      	return;
	}
		
   if( isset( $_POST['responsive_tabs_meta_box_noncename'] ) && wp_verify_nonce( $_POST['responsive_tabs_meta_box_noncename'], site_url( __FILE__ ) ) && check_admin_referer( site_url( __FILE__) , 'responsive_tabs_meta_box_noncename' ) ) {
   	update_post_meta( $post_id, '_twcc_post_width', $_POST['_twcc_post_width'] );
   }
   return;
   
}
add_action( 'save_post', 'responsive_tabs_save_meta_box', 10, 2 );