<?php
/**
 * Template Name: Landing Page Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <div class="ps lala">
    <div class="row">
      <div class="columns">
        <div class="section teaser">
          <a href="<?php the_permalink(45); ?>" class="typewriter"></a>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>
