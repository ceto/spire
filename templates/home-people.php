<div class="row">
  <div class="columns">
    <h2 class="prettytitle wow fadeInRight">
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
    <div class="columns tablet-10 tablet-push-1 large-10 large-push-1">
      <section class="memberscarousel owl-carousel">
        <?php while ($the_members->have_posts()) : $the_members->the_post(); ?>
          <div><?php get_template_part( 'templates/member', 'square' ); ?></div>
        <?php endwhile; ?>
      </section>

    </div>
  </div>


  <?php wp_reset_query(); ?>

