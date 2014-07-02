<?php
/** 
 * Max upload size
 */

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


/**
 * WooCommerce support declaration
 */
add_theme_support( 'woocommerce' ); 
remove_action( 'admin_notices', 'woothemes_updater_notice' );


/**
 * Redux config load
 */
 require_once ( get_template_directory() . '/lib/redux.php');


/**
 * Register our menus, sidebars and widgetized areas.
 */
add_action( 'widgets_init', 'qf_widgets_init' );

function qf_widgets_init() {
	register_sidebar( array(
		'name' => 'Navbar right',
    'id' => 'qf_navbar_right',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}

register_nav_menu( 'qf_footer', 'Footer');


/**
 * Log in/out for footer location
 */
function qf_footer_add_login_logout_link( $items, $args  ) {
  if( $args->theme_location == 'qf_footer' ) {
          $loginoutlink = wp_loginout('index.php', false);
          $items .= '<li">'. $loginoutlink .'</li>';
      return $items;
      }
      return $items;
}
add_filter( 'wp_nav_menu_items', 'qf_footer_add_login_logout_link', 10, 2 );


/*
 * Remove tab from WooCommerce product details page
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] ); // Remove the additional information tab
  return $tabs;
}


/** 
 * Custom Meta Boxes
 */
require_once( get_template_directory() . '/lib/Custom-Meta-Boxes/custom-meta-boxes.php' );

add_filter( 'cmb_meta_boxes', 'qf_metaboxes' );

function qf_metaboxes( array $meta_boxes ) {
  
  $page_list = get_pages( array() );
  $pages = array();

  foreach ($page_list as $page) {
    $pages[$page->ID] = $page->post_title;
  }

  $styles = array(
    'light' => 'Light',
    'dark' => 'Dark',
  );

  $fields = array(
    array('name' => 'Page',
          'id' => 'header_page',
          'type' => 'title',
          'cols' => 8,
    ),
    array('name' => 'Style',
          'id' => 'header_style',
          'type' => 'title',
          'cols' => 4,
    ),
    array('id' => 'include_pages',
          'name' => '',
          'type' => 'group',
          'repeatable' => true,
          'fields' => array(
            array('id' => 'page',
                  'name' => '',
                  'type' => 'select',
                  'cols' => 8,
                  'options' => $pages),
            array('id' => 'style',
                  'name' => '',
                  'type' => 'select',
                  'cols' => 4,
                  'options' => $styles),
          ),
    ),
    array('name' => '',
          'id' => 'description',
          'type' => 'title',
          'cols' => 12,
          'desc' => "The current page will always be on top, don't list a page more than once."
    ),
    array('name' => 'Concatenated Navbar',
          'id' => 'concatenated_nav',
          'type' => 'checkbox',
          'desc' => 'Override the main navbar to include listings for this page.'
    ),
  );

  $meta_boxes[] = array(
    'title'   => 'Include Pages:',
    'pages'   => 'page',
    'context' => 'normal',
    'priority'=> 'high',
    'fields'  => $fields,
  );

  return $meta_boxes; 
}


/** 
 * Get ID by pagename
 */
function qf_get_ID_by_pagename($page_name) {
   global $wpdb;
   $page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".mysql_real_escape_string($page_name)."' AND post_type = 'page'");
   return $page_name_id;
}


/** 
 * Concatenate Pages
 */
add_action('pre_get_posts', 'qf_concatenate_pages');

function qf_concatenate_pages( $query ) {
  if ($query->is_page() && $query->is_main_query()) {
    $current_id = $query->query_vars['page_id'];
    if ($current_id == 0) {
      $current_id = qf_get_ID_by_pagename($query->query_vars['pagename']);
    }

    $pages = get_post_meta( $current_id, 'include_pages', false );

    if ($pages) {
      $id_list = array($current_id);

      foreach ($pages as $page) {
        array_push($id_list, $page['page']);
      }

      $query-> set('post_type', 'page');
      $query-> set('post__in', $id_list);
      $query-> set('orderby', 'post__in');
      $query-> set('p', null);
      $query-> set('pagename', null);
      $query-> set('page_id', null);
   
      remove_all_actions ( '__after_loop');
    }
  }
}


/** 
 * Navbar based on concatenated pages
 */
class QF_Concatenated_Roots_Nav_walker extends Roots_Nav_Walker {
  var $local_pages = array();

  function __construct($id = 0){
		$this->menu_id = $id;
		$this->menu_items[] = $id;
    foreach (get_post_meta( $id, 'include_pages', false ) as $page) {
      array_push($this->local_pages, $page['page']);
	  }
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $item_html = '';
    parent::start_el($item_html, $item, $depth, $args);
    
    if ($item->is_dropdown && ($depth === 0)) {
      $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html);
      $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
    }
    elseif (stristr($item_html, 'li class="divider')) {
      $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
    }
    elseif (stristr($item_html, 'li class="dropdown-header')) {
      $item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
    }
    
    if (in_array($item->object_id, $this->local_pages)) {
      $item_html = preg_replace('/(?<=href=")(.*)(?=")/iU', '#qf_' . sanitize_title($item->title), $item_html);
    }

    $item_html = apply_filters('roots_wp_nav_menu_item', $item_html);
    $output .= $item_html;
  }
}
