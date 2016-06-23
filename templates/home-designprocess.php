<div class="row">
  <div class="columns">
    <h2 class="prettytitle">
      <?php the_field("pr_section_title"); ?>
      <small><?php the_field("pr_section_subtitle"); ?></small>
    </h2>
  </div>
</div>
<div class="row expanded overexp small-up-1 medium-up-2 tablet-up-3">
  <?php
    $i=0;
    while ( have_rows('process') && $i++<3 ) : the_row(); ?>
    <div class="column">
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
  <?php endwhile; ?>
</div>