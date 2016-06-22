<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

    <div class="row ps">
      <div class="columns medium-10 large-8">
        <header class="pageheader">
          <a href="<?= esc_url(home_url('/')); ?>" class="backtowork">
            <i class="icon icon--times"></i>
          </a>
          <h1><?php the_title(); ?></h1>
        </header>
        <div class="projectcontent">
          <?php the_content(); ?>
        </div>
        <footer>
          <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
      </div>
    </div>
    <?php
      $the_gallery = get_field('gallery');
      if( $the_gallery ): ?>
        <div class="row expanded collapse">
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