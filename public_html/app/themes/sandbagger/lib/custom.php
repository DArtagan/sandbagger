<?php
/** 
 * Max upload size
 */

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/** 
 * Custom Meta Boxes
 */
require_once( get_template_directory() . '/lib/Custom-Meta-Boxes/custom-meta-boxes.php' );

add_filter( 'cmb_meta_boxes', 'cmb_metaboxes' );

function cmb_metaboxes( array $meta_boxes ) {
  
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
function get_ID_by_pagename($page_name) {
   global $wpdb;
   $page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".mysql_real_escape_string($page_name)."' AND post_type = 'page'");
   return $page_name_id;
}


/** 
 * Concatenate Pages
 */
add_action('pre_get_posts', 'concatenate_pages');

function concatenate_pages( $query ) {
  if ($query->is_page() && $query->is_main_query()) {
    $current_id = $query->query_vars['page_id'];
    if ($current_id == 0) {
      $current_id = get_ID_by_pagename($query->query_vars['pagename']);
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
