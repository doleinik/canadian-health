<section class="resp-[pt/100/50] overflow-hidden">
  <div class='container'>
    <h2 class="title-2 resp-[mb/40/20]">
      Quick Clips
    </h2>
    <div class="swiper quick_clips_swiper !overflow-visible w-full h-full flex">
      <div class="swiper-wrapper">
        <?php
        $args = array(
          'post_type' => 'shorts',
          'posts_per_page' => -1,
          'orderby' => 'date',
          'order' => 'DESC',
        );

        $shorts = new WP_Query($args);


        if ($shorts->have_posts()) :
          while ($shorts->have_posts()) : $shorts->the_post(); ?>
            <div class="swiper-slide !resp-[width/230] !resp-[height/350] bg-white overflow-hidden rounded-[10px]">
              <a href="/quick-clips?short=<?= get_the_ID() ?>">
                <?= get_the_post_thumbnail(get_the_ID(), 'full', array()); ?>
              </a>
            </div>
        <?php endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </div>
</section>