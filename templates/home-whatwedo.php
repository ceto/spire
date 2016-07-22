<div class="row">
  <div class="columns">
    <h2 class="prettytitle">
      <?php the_field("sp_section_title"); ?>
      <small><?php the_field("sp_section_subtitle"); ?></small>
      <a href="#" class="whatwedoclose"><i class="icon icon--times"></i></a>
    </h2>
  </div>
</div>
<div class="row expanded overexp">
    <div class="column">
      <div class="whatwedocarousel owl-carousel">
        <?php while ( have_rows('areas') ) : the_row(); ?>
          <div class="card">
            <figure class="card__illustration">
              <?php
               $image = get_sub_field('illustration');
               echo wp_get_attachment_image($image['id'], 'medium' );
              ?>
            </figure>
            <h4 class="card__title"><?php the_sub_field('area_title'); ?></h4>
            <div class="card__text"><?php the_sub_field('description'); ?></div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
</div>