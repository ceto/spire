<div class="row">
  <div class="columns">
    <h2 class="prettytitle">
      <?php the_field("sp_section_title"); ?>
      <small><?php the_field("sp_section_subtitle"); ?></small>
    </h2>
  </div>
</div>
<div class="row expanded small-up-1 medium-up-2 large-up-3">
  <?php while ( have_rows('areas') ) : the_row(); ?>
    <div class="column">
      <div class="card">
        <figure class="card__illustration">
          <?php
           $image = get_sub_field('illustration');
           echo wp_get_attachment_image($image['id'], 'large' );
          ?>
        </figure>
        <h3 class="card__title"><?php the_sub_field('area_title'); ?></h3>
        <div class="card__text"><?php the_sub_field('description'); ?></div>
      </div>
    </div>
  <?php endwhile; ?>
</div>