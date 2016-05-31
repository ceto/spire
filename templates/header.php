<div data-sticky-container>
  <header class="top-bar" data-sticky data-sticky-on="small" data-margin-top="0" data-top-anchor="main">
    <div class="row expanded collapse" data-magellan data-bar-offset="47" >
      <div class="columns">
        <div class="top-bar-title">
          <a class="homelogo" href="<?= esc_url(home_url('/')); ?>">
            <?php bloginfo('name'); ?>
          </a>
          <span class="csiki" data-responsive-toggle="responsive-menu" data-hide-for="tablet">
            <button class="menu-icon dark" type="button" data-toggle></button>
          </span>
        </div>
        <div id="responsive-menu">
          <nav class="top-bar-right primarynav">
            <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--main']);
            endif;
            ?>
          </nav>
        </div>
      </div>
    </div>
  </header>
</div>


