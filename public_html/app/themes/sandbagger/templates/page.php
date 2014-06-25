<?php
$post_meta = get_post_meta( get_the_id(), 'include_pages', false);
$group_data = array();
if ($post_meta) {
  foreach ($post_meta as $data) {
    $group_data[$data['page']] = $data['style'];
  }
}

while (have_posts()) : the_post(); ?>
  <div id="<?php echo 'qf_' . sanitize_title($post->post_title); ?>" class="row section <?php if (array_key_exists($post->ID, $group_data)) { echo $group_data[$post->ID]; }; ?>">
    <div class="col-xs-12 container">
      <h1>
        <?php the_title(); ?>
      </h1>
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile; ?>
