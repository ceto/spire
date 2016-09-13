<div data-sticky-container>
  <header class="top-bar darkened" data-sticky data-sticky-on="small" data-margin-top="0" data-top-anchor="main">
    <div id="topmagellan" class="row expanded collapse">
      <div class="columns">
        <div class="top-bar-title">
          <a class="homelogo" href="<?= esc_url(home_url('/')); ?>" data-realhome="<?php the_permalink(45); ?>">
            <?php bloginfo('name'); ?>
          </a>
          <span class="csiki" data-responsive-toggle="responsive-menu" data-hide-for="tablet">
            <button class="menu-icon" type="button" data-toggle></button>
          </span>
        </div>
        <div id="responsive-menu" class="responsive-menu">
          <nav class="top-bar-right primarynav"
            <?php if (is_page_template('tmpl-home.php' )): ?>
                data-magellan data-threshold="0" data-bar-offset="90"
            <?php endif ?>
          >

            <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(  array(
                'theme_location' => 'primary_navigation',
                'menu_class' => 'menu menu--main',
                ));
            endif;
            ?>
          </nav>
        </div>
      </div>
    </div>
  </header>
</div>


