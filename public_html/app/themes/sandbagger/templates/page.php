<?php while (have_posts()) : the_post(); ?>
  <div class="row">
    <div class="section">
      <div class="page-header">
        <h1>
          <?php echo roots_title(); ?>
        </h1>
      </div>
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile; ?>
