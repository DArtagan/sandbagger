<?php
$post_meta = get_post_meta( get_the_id(), 'include_pages', false);
if ($post_meta) {
  foreach ($post_meta as $data) {
    $group_data[$data['page']] = $data['style'];
  }
}

while (have_posts()) : the_post(); ?>
  <div class="row <?php if ($group_data[$post->ID]) { echo $group_data[$post->ID]; }; ?>">
    <div class="section">
      <div class="page-header">
        <h1>
          <?php echo roots_title(); ?>
        </h1>
      </div>
      <?php the_content(); ?>
      <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
    </div>
  </div>
<?php endwhile; ?>
