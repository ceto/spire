<div class="row">
  <div class="columns">
    <h2 class="prettytitle">
      <?php the_field("cl_section_title"); ?>
      <small><?php the_field("cl_section_subtitle"); ?></small>
    </h2>
  </div>
</div>

<div class="row">
  <div class="columns medium-10 large-8 medium-push-2">
    <div class="row expanded small-up-3 medium-up-4">
      <?php while ( have_rows('clients') ) : the_row(); ?>
        <div class="column">
          <figure class="clientlogo">
            <?php
             $image = get_sub_field('logo');
             echo wp_get_attachment_image($image['id'], 'medium' );
            ?>
            <figcaption><?php the_sub_field('clients_name') ?></figcaption>
          </figure>
        </div>
        <div class="column">
          <figure class="clientlogo">
            <?php
             $image = get_sub_field('logo');
             echo wp_get_attachment_image($image['id'], 'medium' );
            ?>
            <figcaption><?php the_sub_field('clients_name') ?></figcaption>
          </figure>
        </div>
        <div class="column">
          <figure class="clientlogo">
            <?php
             $image = get_sub_field('logo');
             echo wp_get_attachment_image($image['id'], 'medium' );
            ?>
            <figcaption><?php the_sub_field('clients_name') ?></figcaption>
          </figure>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>