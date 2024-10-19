<footer class="content-info container" role="contentinfo">
  <div class="row">
    <div class="footer_sidebar col-xs-6">
      <?php dynamic_sidebar('sidebar-footer'); ?>
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </div>
    <div class="footer_menu col-xs-6">
      <?php wp_nav_menu( array('theme_location'=>'qf_footer') ); ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
