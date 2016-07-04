  <?php
    $args = array(
      'post_type' => array('project'),
      'order'               => 'ASC',
      'orderby'             => 'menu_order',
      'posts_per_page'         => 1000,
      'posts_per_archive_page' => 10,
    );
    $the_works = new WP_Query( $args );
  ?>

      <div class="row expanded collapse small-up-2 medium-up-3 large-up-4 xlarge-up-5 xxlarge-up-6 worksgrid">
        <?php while ($the_works->have_posts()) : $the_works->the_post(); ?>
          <div class="column"><?php get_template_part( 'templates/project', 'square' ); ?></div>
        <?php endwhile; ?>
      </div>

  <?php wp_reset_query(); ?>

