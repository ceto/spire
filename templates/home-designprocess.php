<?php
  $hlines = Array();
  $hsublines = Array();
  while ( have_rows('headlines') ) {
    the_row();
    $hlines[] = get_sub_field("headline_title",false);
    $hsublines[] = get_sub_field("headline_subtitle",false);
  };
  $i=0;
?>

<div class="approachcarousel owl-carousel">
  <?php while ( have_rows('process') ) : the_row(); ?>
  <div class="item ps">
    <div class="row">
      <div class="columns">
        <h2 class="prettytitle wow fadeInRight">
        <?= $hlines[$i]; ?>
        <small><?= $hsublines[$i++]; ?></small>
        </h2>
      </div>
    </div>
    <div class="row expanded overexp">
      <div class="columns medium-6">
        <div class="card">
          <figure class="card__illustration">
            <?php
            $image = get_sub_field('pr_illustration');
            echo wp_get_attachment_image($image['id'], 'large' );
            ?>
          </figure>
          <h4 class="card__title"><?php the_sub_field('process_title'); ?></h4>
          <div class="card__text"><?php the_sub_field('pr_description'); ?></div>
        </div>
      </div>
      <?php if (have_rows('process')) : the_row(); ?>
      <div class="columns medium-6">
        <div class="card">
          <figure class="card__illustration">
            <?php
            $image = get_sub_field('pr_illustration');
            echo wp_get_attachment_image($image['id'], 'large' );
            ?>
          </figure>
          <h4 class="card__title"><?php the_sub_field('process_title'); ?></h4>
          <div class="card__text"><?php the_sub_field('pr_description'); ?></div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endwhile; ?>
  <div class="item">
    <section class="stylist ps ps--accent">
      <?php  get_template_part('templates/home', 'inspired' ); ?>
    </section>
  </div>
</div>