<?php get_template_part('templates/project','keyboard'); ?>
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

    <div class="row ps">
      <div class="columns medium-10 large-8">
        <header class="pageheader fadeInUp wow">
          <a href="<?= esc_url(home_url('/')); ?>" class="backtowork">
            <i class="icon icon--times"></i>
          </a>
          <h1 class="pageheader__title"><?php the_title(); ?></h1>
        </header>
        <div class="projectcontent fadeInUp wow" data-wow-delay="125ms" data-wow-duration="875ms">
          <?php the_content(); ?>
        </div>
        <footer class="fadeInUp wow" data-wow-delay="1250ms" data-wow-duration="500ms">
          <nav class="projectnav">
            <?php previous_post_link('%link', '<i class="icon icon--chevron-left"></i> %title', FALSE) ?> |
            <?php next_post_link('%link', '%title <i class="icon icon--chevron-right"></i>', FALSE) ?>
          </nav>
        </footer>
      </div>
    </div>
    <?php
      $the_gallery = get_field('gallery');
      if( $the_gallery ): ?>
        <div class="row expanded collapse fadeInUp wow" data-wow-delay="500ms" data-wow-duration="750ms">
          <div class="columns">
            <aside class="projectcarousel owl-carousel">
              <?php foreach( $the_gallery as $image ): ?>
                <div class="item">
                  <!-- <a href="<?= $image['url']; ?>"> -->
                    <?= wp_get_attachment_image($image['id'], 'large' ); ?>
                  <!-- </a> -->
                </div>
              <?php endforeach; ?>
            </aside>
          </div>
        </div>
    <?php endif; ?>
  </article>
<?php endwhile; ?>