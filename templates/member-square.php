<div class="membersquare">
  <figure class="membersquare__photo">
    <?php the_post_thumbnail(small); ?>
  </figure>
  <h3 class="membersquare__name"><?php the_title(); ?></h3>
  <p class="membersquare__jobtitle"><?php the_field('job_title'); ?></p>
  <div class="membersquare__descr">
    <?php the_content(); ?>
  </div>
  <a class="membersquare__email" href="mailto:<?php the_field('e-mail'); ?>">
    <?php the_field('e-mail'); ?>
  </a>
</div>
