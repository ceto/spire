<div class="row">
  <div class="columns">
    <h2 class="prettytitle wow fadeInRight">
    <?php the_field("sp_section_title"); ?>
    <small><?php the_field("sp_section_subtitle"); ?></small>
    </h2>
  </div>
</div>
<div class="row">
  <div class="columns tablet-9 tablet-centered large-12">
    <div class="row small-up-2 large-up-4 whatwedogrid">
      <?php while ( have_rows('areas') ) : the_row(); ?>
      <div class="column">
        <div class="card card--simple">
          <figure class="card__illustration">
            <?php
              $image = get_sub_field('illustration');
              $popimg = wp_get_attachment_image_src($image['id'], 'full' );
            ?>
            <a class="popimg" href="<?= $popimg[0]; ?>" title="<?php the_sub_field('area_title'); ?>">
              <?= wp_get_attachment_image($image['id'], 'medium' ); ?>
            </a>
          </figure>
          <h4 class="card__title">
            <?php the_sub_field('area_title'); ?>
          </h4>
          <div class="card__text"><?php the_sub_field('description'); ?></div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>