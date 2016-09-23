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
          <div class="teasercont is-hidden"><?php the_content(); ?></div>
          <a href="<?php the_permalink(45); ?>" class="typewriter"></a>
        </div>
      </div>
    </div>
  </div>
  <a href="<?php the_permalink(45); ?>" class="skipintro">Skip intro <i class="icon  icon--chevron-right"></i></a>
<?php endwhile; ?>
