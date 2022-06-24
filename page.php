<?php get_header(); ?>

<div class="container">

  <div class="row">

    <div class="col-sm-12 col-md-8">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <h3 class="mb-3">
            <?php the_title(); ?>
          </h3>

          <?php the_content(); ?>

        <?php endwhile; ?>

      <?php else : get_404_template();
      endif; ?>

    </div>

    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>

  </div>

</div>
</div>
<?php get_footer(); ?>