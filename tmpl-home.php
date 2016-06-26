<?php
/**
* Template Name: Home Template
*/
?>
<div class="keyboard">
  <nav class="holder">
    <a href="#" class="btn up"><span class="pressed">up</span></a>
    <a href="#" class="btn left" data-owltarget="about"><span class="pressed">left</span></a>
    <a href="#" class="btn down"><span class="pressed">down</span></a>
    <a href="#" class="btn right" data-owltarget="about"><span class="pressed">right</span></a>
  </nav>
</div>
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
    <section class="stylist ps ps--accent">
      <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/bannergraphics.jpg" alt="Inspired">
      <div class="row ps--narrow">
        <div class="columns medium-6 medium-push-6 large-4 large-push-8">
          <h2 class="styleist__title">Inspired</h3>
          <div class="styleist__text">results<br>people<br>work<br>clients<br>talent</div>
        </div>
      </div>
    </section>
  </div>
</section>
<section id="process" class="ps" data-magellan-target="process">
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
</section>
<?php endwhile; ?>