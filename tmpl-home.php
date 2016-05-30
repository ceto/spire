<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/home', 'works'); ?>

  <div class="ps">
   <?php get_template_part('templates/home', 'intro'); ?>
  </div>

  <section class="ps">
    <?php get_template_part('templates/home', 'about'); ?>
  </section>

  <section class="ps">
    <?php get_template_part('templates/home', 'designprocess'); ?>
  </section>

  <section class="ps">
    <?php get_template_part('templates/home', 'people'); ?>
  </section>

  <section class="ps ps--dark">
    <?php get_template_part('templates/home', 'clients'); ?>
  </section>

  <section class="ps ps--accent">
    <?php get_template_part('templates/home', 'contact'); ?>
  </section>

<?php endwhile; ?>
