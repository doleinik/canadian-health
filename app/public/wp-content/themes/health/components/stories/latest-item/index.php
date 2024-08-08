<?php
if (isset($args['id'])) {
  $item_id = $args['id'];
}
?>
<li class="swiper-slide w-full resp-[w-max/330]">
  <a href="<?php the_permalink($item_id); ?>" class="">
    <div class="aspect-ratio-[330/186] resp-[mb/30] rounded-[10px]">
      <?php echo get_the_post_thumbnail($item_id) ?>
    </div>

    <h4 class="title-4 resp-[mb/15] text-line-overflow-2">
      <?= get_the_title($item_id) ?>
    </h4>
    <div class="flex resp-[gap/4] items-center font-accent-regular">
      <div>
        <?php the_date('Y',); ?>
      </div>
      <div>-</div>
      <div>
        <?= getAuthorByPostId($item_id) ?>
      </div>
    </div>
  </a>
</li>