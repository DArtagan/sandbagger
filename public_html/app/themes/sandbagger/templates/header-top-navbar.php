<header class="banner" role="banner">
  <div id="carousel-head" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php global $redux_options; 
        $banners = explode(',',$redux_options['banner']);
        foreach ($banners as $banner) : ?>
        <div class="item <?php if ($banner === reset($banners)) echo 'active'; ?>" style="background-image: url('<?php echo wp_get_attachment_url($banner); ?>');"></div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="navbar navbar-default navbar-static-top container-fluid" data-spy="affix" data-offset-top="450">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="mobile-cart">
        <?php if (is_active_sidebar('qf_navbar_right')) : ?>
          <?php dynamic_sidebar( 'qf_navbar_right' ); ?>
        <?php endif; ?>
      </div>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) {
          if ($post && get_post_meta($post->ID, 'concatenated_nav', true)) {
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav', 'menu' => 'header-menu', 'walker' => new QF_Concatenated_Roots_Nav_Walker($post->ID)));
          } else {
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
          }
        }
      ?>
      <?php if (is_active_sidebar('qf_navbar_right')) : ?>
        <ul id="qf_nav_right" class="nav navbar-nav navbar-right hidden-xs">
          <li>
            <?php dynamic_sidebar( 'qf_navbar_right' ); ?>
          </li>
        </ul>
      <?php endif; ?>
    </nav>
  </div>
</header>
