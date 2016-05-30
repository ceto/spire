<?php while (have_posts()) : the_post(); ?>
  <div class="ps">
    <?php get_template_part('templates/page', 'header'); ?>
    <div class="row">
      <div class="columns medium-10 large-8 medium-push-2">
        <?php get_template_part('templates/content', 'page'); ?>
      </div>
    </div>

  </div>

<?php endwhile; ?>
