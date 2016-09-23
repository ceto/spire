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

<!--   <div class="row">
    <div class="columns tablet-10 tablet-push-1 large-10 large-push-1 xlarge-12 xlarge-push-0 xxlarge-12 xxlarge-push-0">
      <div class="row small-up-2 medium-up-3 tablet-up-3 large-up-4 xlarge-up-5 xxlarge-up-6 membersgrid">
        <?php while ($the_members->have_posts()) : $the_members->the_post(); ?>
          <div class="column"><?php get_template_part( 'templates/member', 'square' ); ?></div>
        <?php endwhile; ?>
      </div>
    </div>
  </div> -->


  <div class="row">
    <div class="columns tablet-10 tablet-push-1 large-10 large-push-1 xlarge-12 xlarge-push-0 xxlarge-12 xxlarge-push-0">
      <section class="memberscarousel owl-carousel">
        <?php while ($the_members->have_posts()) : $the_members->the_post(); ?>
          <div><?php get_template_part( 'templates/member', 'square' ); ?></div>
        <?php endwhile; ?>
      </section>

    </div>
  </div>


  <?php wp_reset_query(); ?>

