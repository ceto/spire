<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <section id="work" class="works"></section>
  <?php get_template_part('templates/home', 'works'); ?>

  <div id="intro" class="ps">
   <?php get_template_part('templates/home', 'intro'); ?>
  </div>

  <section id="about" class="ps">
    <?php get_template_part('templates/home', 'about'); ?>
  </section>

  <section id="process" class="ps">
    <?php get_template_part('templates/home', 'designprocess'); ?>
  </section>

  <section id="people" class="ps">
    <?php get_template_part('templates/home', 'people'); ?>
  </section>

  <section id="clients" class="ps ps--dark">
    <?php get_template_part('templates/home', 'clients'); ?>
  </section>

  <section id="contact" class="ps ps--accent">
    <?php get_template_part('templates/home', 'contact'); ?>
  </section>

<?php endwhile; ?>
