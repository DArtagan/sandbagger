<?php
$post_meta = get_post_meta( get_the_id(), 'include_pages', false);
$group_data = array();
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
          <?php the_title(); ?>
        </h1>
      </div>
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile; ?>
