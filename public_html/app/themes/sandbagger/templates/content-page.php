<?php while (have_posts()) : the_post();
  $group_data = get_post_meta( get_the_id(), 'include_pages', false);
  echo $post->ID;
  the_content();
  wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>'));
endwhile; ?>
