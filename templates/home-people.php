<div class="row">
  <div class="columns">
    <h2 class="prettytitle">
      <?php the_field("people_title"); ?>
      <small><?php the_field("people_subtitle"); ?></small>
    </h2>
  </div>
</div>

  <?php
    $args = array(
      'post_type' => array('member'),
      'order'               => 'ASC',
      'orderby'             => 'menu_order',
      'posts_per_page'         => 1000,
      'posts_per_archive_page' => 10,
    );
    $the_members = new WP_Query( $args );
  ?>

  <div class="row">
    <div class="columns large-10 large-push-2">
      <div class="row small-up-2 medium-up-3 large-up-4 xlarge-up-4 xxlarge-up-5 membersgrid">
        <?php while ($the_members->have_posts()) : $the_members->the_post(); ?>
          <div class="column"><?php get_template_part( 'templates/member', 'square' ); ?></div>
        <?php endwhile; ?>
        <?php while ($the_members->have_posts()) : $the_members->the_post(); ?>
          <div class="column"><?php get_template_part( 'templates/member', 'square' ); ?></div>
        <?php endwhile; ?>
        <?php while ($the_members->have_posts()) : $the_members->the_post(); ?>
          <div class="column"><?php get_template_part( 'templates/member', 'square' ); ?></div>
        <?php endwhile; ?>
        <?php while ($the_members->have_posts()) : $the_members->the_post(); ?>
          <div class="column"><?php get_template_part( 'templates/member', 'square' ); ?></div>
        <?php endwhile; ?>

      </div>
    </div>
  </div>

  <?php wp_reset_query(); ?>

