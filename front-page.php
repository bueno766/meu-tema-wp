<?php get_header(); ?>

<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <?php
    // args
    $my_args_banner = array(
      'post_type' => 'banners',
      'posts_per_page' => 3,
    );

    // query
    $my_query_banner = new WP_Query($my_args_banner);
    ?>

    <?php if ($my_query_banner->have_posts()) :
      $banner = $banners[0];
      $c = 0;
      while ($my_query_banner->have_posts()) :
        $my_query_banner->the_post();
    ?>

        <div class="carousel-item <?php $c++;
                                  if ($c == 1) {
                                    echo ' active';
                                  } ?>">
          <?php the_post_thumbnail('post-thumbnail', array('class' => 'full-img')) ?>
          <div class="carousel-caption d-md-block">
            <div id="title-banner">
              <h1 class="text-title"><?php echo get_theme_mod('banner_title', 'Meu primeiro tema de WordPress'); ?>
                <hr class="hr">
              </h1>
              <h3 class="subtitle"><?php echo get_theme_mod('banner_text', 'Feito por mim com muita dedicação e esforço'); ?></h3>
            </div>
          </div>
        </div>

    <?php endwhile;
    endif; ?>

    <?php wp_reset_query(); ?>
  </div>

  <a class="carousel-control-prev d-none" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>

  <a class="carousel-control-next d-none" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>

  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>
</div>

<div class="row justify-content-md-center">

  <?php
  // args
  $my_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'category_name' => 'destaque'
  );

  // query
  $my_query = new WP_Query($my_args);
  ?>

  <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>

      <div class="col-sm-12 col-md-4 mb-5">

        <div class="card">
          <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid card-img-top')) ?>
          <div class="card-body">
            <h5 class="card-title mb-4">
              <?php the_title(); ?>
            </h5>
            <a href="<?php the_permalink(); ?>" class="btn btn-my-color-5">Leia mais</a>
          </div>
        </div>

      </div>

  <?php endwhile;
  endif; ?>

  <?php wp_reset_query(); ?>

</div>

<div class="row justify-content-md-center">

  <div class="col-md-8 col-sm-12">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('template-parts/content', get_post_format()); ?>

      <?php endwhile; ?>

    <?php else : get_404_template();
    endif; ?>

    <div class="blog-pagination mb-5">
      <?php next_posts_link('Mais antigos'); ?> <?php previous_posts_link('Mais novos'); ?>
    </div>

  </div>

</div>

</div>

<?php the_content(); ?>
<?php get_footer(); ?>