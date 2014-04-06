<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div id="carousel-head" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-head" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-head" data-slide-to="1"></li>
      <li data-target="#carousel-head" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active" style="background-image: url(http://placekitten.com/g/2002/500);">
      </div>
      <div class="item" style="background-image: url(http://placebear.com/2000/500);">
      </div>
      <div class="item" style="background-image: url(http://placekitten.com/2000/500);">
      </div>
    </div>
  </div>
  <div data-spy="affix" data-offset-top="450">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
</header>
