<?php
if (isset($args['id'])) {
  $item_id = $args['id'];
}

$video = get_field('video', $item_id);
?>
<li class="swiper-slide flex flex-col  resp-[w-max/710] w-full" data-bg="<?= get_the_post_thumbnail_url($item_id) ?>">
  <a href="<?php the_permalink($item_id);
            if ($video) echo '?play=true'; ?>" class="block aspect-ratio-[710/350] rounded-[8px] overflow-hidden resp-[mb/30]">
    <?php echo get_the_post_thumbnail($item_id) ?>
    <?php if ($video) { ?>
      <span class="stories-play flex position-center opacity-80 hover:opacity-100 resp-[svg-width/80] resp-[svg-height/80]">
        <?php renderAssetsSVG('watch'); ?>
      </span>
    <?php } ?>
  </a>


  <div class="flex flex-col items-start resp-[gap/20] w-full">
    <div class="flex justify-between items-center resp-[gap/20] w-full">
      <div class="flex resp-[gap/10]">
        <?php foreach (get_the_category() as $category) { ?>
          <div class="bg-green resp-[px/10] resp-[pt/5] resp-[pb/3] rounded-[10px] leading-none relative block font-accent  resp-[font/24/16/16]">
            <?= $category->name; ?>
          </div>
        <?php } ?>
      </div>
      <div>
        <div class="flex items-center resp-[gap/20]">
          <div class="svg-fill-green save-item cursor-pointer <?php if (isCookieValueExists('save', $item_id)) echo 'added' ?>" data-id="<?= $item_id ?>">
            <?php renderAssetsSVG('sticker'); ?>
          </div>


          <?php if ($video) { ?>
            <a href="<?php the_permalink($item_id); ?>?play=true" class="flex flex-center resp-[gap/4] resp-[font/24] font-accent  text-white rounded-[10px] bg-green resp-[w-min/165] resp-[py/12] text-center">
              watch
            </a>
          <?php } else { ?>
            <a href="<?php the_permalink($item_id); ?>" class="flex flex-center resp-[gap/4] resp-[font/24] font-accent  text-white rounded-[10px] bg-green resp-[w-min/165] resp-[py/12] text-center">
              read
            </a>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class=" resp-[mt/25] w-full resp-[w-max/670]">
      <a href="<?php the_permalink($item_id); ?>">
        <h3 class="resp-[mb/30/15] resp-[font/48/22] font-mont-semibold leading-none font-accent text-line-overflow-2">
          <?= get_the_title($item_id) ?>
        </h3>
      </a>

      <p class="font-accent-regular leading-[1.5] resp-[font/28/16] resp-[mb/18] text-line-overflow-2">
        <?php echo get_the_excerpt($item_id); ?>
      </p>
    </div>
  </div>
</li>