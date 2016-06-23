<?php
/**
 * Template Name: Home Template
 */
?>

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

      <section id="process1" class="ps">
        <?php get_template_part('templates/home', 'designprocess'); ?>
      </section>

      <section id="process2" class="ps">
        <?php get_template_part('templates/home', 'designprocess'); ?>
      </section>


      <section class="homestylist ps--accent">
        <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/bannergraphics.jpg" alt="Inspired">
        <div class="row ps--narrow">
          <div class="columns medium-6 medium-push-6 large-4 large-push-8 text-right">
            <h2>Inspired</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident id obcaecati, et officia veritatis aliquam cupiditate necessitatibus quasi voluptas itaque eius quo temporibus porro laboriosam voluptates, ea eaque, recusandae fuga.</p>
          </div>
        </div>
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
