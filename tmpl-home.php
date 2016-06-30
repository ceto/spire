<?php
/**
* Template Name: Home Template
*/
?>
<?php get_template_part('templates/keyboard'); ?>
<?php while (have_posts()) : the_post(); ?>
<section id="work" class="works" data-magellan-target="work">
  <?php get_template_part('templates/home', 'works'); ?>
</section>
<section id="about" data-magellan-target="about">
  <div class="aboutcarousel owl-carousel">
    <section id="intro" class="ps">
      <?php get_template_part('templates/home', 'intro'); ?>
    </section>
    <section id="whatwedo" class="ps">
      <?php get_template_part('templates/home', 'whatwedo'); ?>
    </section>
    <section id="process" class="ps">
      <?php get_template_part('templates/home', 'designprocess'); ?>
    </section>
    <section class="stylist ps ps--accent">
      <?php  get_template_part('templates/home', 'inspired' ); ?>
    </section>
  </div>
</section>

<section id="people" class="ps" data-magellan-target="people">
  <?php get_template_part('templates/home', 'people'); ?>
</section>
<section id="clients" class="ps ps--dark" data-magellan-target="clients">
  <?php get_template_part('templates/home', 'clients'); ?>
</section>
<section id="contact" class="ps ps--accent" data-magellan-target="contact">
  <?php get_template_part('templates/home', 'contact'); ?>
</section>
<?php endwhile; ?>