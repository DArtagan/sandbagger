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
 * Concatenate Pages
 */
add_action( 'pre_get_posts', 'concatenate_pages' );

function concatenate_pages( &$wp_query ) {
  if ($wp_query->is_main_query() && get_post() != NULL && get_post_meta( get_the_id(), 'include_pages', false)) {
    $group_data = get_post_meta( get_the_id(), 'include_pages', false);

    foreach ($group_data as $data) {
      array_push($ids, $data->page);
    }

    $wp_query->set('page_id', $ids);
  }
}
