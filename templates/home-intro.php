<div class="row">
  <div class="columns">
    <h2 class="prettytitle wow fadeInRight" >
      <?php the_field("home_title"); ?>
      <small><?php the_field("home_subtitle"); ?></small>
    </h2>
  </div>
</div>
<div class="row wow fadeInLeft">
  <div class="columns medium-10 large-8 medium-push-2">
    <?php get_template_part('templates/content', 'page'); ?>
    <a href="#" class="homeintromore"><i class="icon icon--plus"></i></a>
  </div>
</div>
