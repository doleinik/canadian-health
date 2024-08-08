<?php
if (isset($args['id'])) {
  $item_id = $args['id'];
  $item = $args['item'] ?? 0;
}
$video = get_field('video', $item_id);
?>
<li class="flex flex-col <?php if ($item == 1) echo 'stories-first'; ?>">
  <div class="stories-img hover-scale-image rounded-[15px] relative  overflow-hidden h-full resp-[h-max/320] tablet:resp-[h-max/190] tablet:grid-rows-[35vh_35vh]">
    <?php echo get_the_post_thumbnail($item_id) ?>
    <?php if ($video) { ?>
      <a href="<?php the_permalink($item_id); ?>?play=true" class="stories-play flex position-center opacity-80 hover:opacity-100">
        <div class="resp-[svg-width/40] resp-[svg-height/40]">
          <?php renderAssetsSVG('watch'); ?>
        </div>
      </a>
    <?php } ?>
    <div class="flex resp-[gap/10] absolute left-[10px] bottom-[24px]">
      <?php foreach (get_the_category($item_id) as $category) { ?>
        <div class="stories-category-item bg-secondary resp-[px/13] resp-[pt/8] resp-[pb/3] leading-none relative block font-helvetica-light uppercase resp-[font/12]">
          <?= $category->name; ?>

          <span class="triangle border-secondary absolute left-0 top-[100%]"></span>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="resp-[mt/25] flex resp-[gap/20]">
    <div class="flex flex-col">
      <a href="<?php the_permalink($item_id); ?>">
        <h3 class="resp-[mb/15] resp-[font/24/18] leading-none font-georgia-bold">
          <?= get_the_title($item_id) ?>
        </h3>
      </a>

      <p class="font-mont-light leading-[1.5] resp-[font/16/14] resp-[mb/18] text-line-overflow-2">
        <?php echo get_the_excerpt($item_id); ?>
      </p>

      <?php if ($video) { ?>
        <a href="<?php the_permalink($item_id); ?>?play=true" class="flex items-center resp-[gap/4] resp-[font/16] font-helvetica-bold uppercase">
          <span class="resp-[mt/3]">Watch</span>
          <div>
            <?php renderAssetsSVG('watch'); ?>
          </div>
        </a>
      <?php } else { ?>
        <a href="<?php the_permalink($item_id); ?>" class="flex items-center resp-[gap/4] resp-[font/16] font-helvetica-bold uppercase">
          <span class="resp-[mt/3]">READ ARTICLE</span>
          <div>
            <?php renderAssetsSVG('article'); ?>
          </div>
        </a>
      <?php } ?>
    </div>

    <div class="svg-fill-green save-item cursor-pointer <?php if (isCookieValueExists('save', $item_id)) echo 'added' ?>" data-id="<?= $item_id ?>">
      <?php renderAssetsSVG('sticker'); ?>
    </div>
  </div>
</li>