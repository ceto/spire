<?php
/**
* Template Name: Home Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
<section id="work" class="works" data-magellan-target="work">
  <?php get_template_part('templates/home', 'works'); ?>
</section>

<section id="about" class="ps" data-magellan-target="about">
  <?php get_template_part('templates/home', 'whatwedo'); ?>
</section>

<section id="approach" data-magellan-target="approach">
  <?php get_template_part('templates/home', 'designprocess'); ?>
</section>



<section id="people" class="ps" data-magellan-target="people">
  <?php get_template_part('templates/home', 'people'); ?>
</section>


<section id="clients" class="ps ps--dark" data-magellan-target="clients">
  <?php get_template_part('templates/home', 'clients'); ?>
</section>


<section id="contact" class="ps ps--accent" data-magellan-target="contact">
  <?php get_template_part('templates/home', 'contact'); ?>
  <?php get_template_part('templates/footer'); ?>
</section>


<?php endwhile; ?>
<?php get_template_part('templates/keyboard'); ?>