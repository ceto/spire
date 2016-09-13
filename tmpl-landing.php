<?php
/**
 * Template Name: Landing Page Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <div class="ps">
    <div class="row">
      <div class="columns">
        <div class="section teaser">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>
