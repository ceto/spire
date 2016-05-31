<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <section id="work" class="works">
    <?php get_template_part('templates/home', 'works'); ?>
  </section>

  <div id="about" class="">

    <div class="aboutcarousel owl-carousel">
      <section id="intro" class="ps">
       <?php get_template_part('templates/home', 'intro'); ?>
      </section>

      <section id="whatwedo" class="ps">
        <?php get_template_part('templates/home', 'whatwedo'); ?>
      </section>

      <section id="process1" class="ps">
        <?php get_template_part('templates/home', 'designprocess'); ?>
      </section>

      <section id="process2" class="ps">
        <?php get_template_part('templates/home', 'designprocess'); ?>
      </section>

    </div>


  </div>

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
