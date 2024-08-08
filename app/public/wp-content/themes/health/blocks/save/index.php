<section class="container resp-[py/120/80]">
  <h2 class="title-2 title-2-red resp-[mb/40/30]">
    Save stories
  </h2>

  <ul class="flex flex-col  resp-[gap-x/32] resp-[gap-y/25]">
    <?php
    $cooke = getCookies('save');
    $i = 0;
    foreach ($cooke as $item_id) {
      if ($item_id !== 0) { ?>
        <li class="flex justify-between tablet:flex-row flex-col-reverse resp-[gap/60/20] resp-[pb/25]">
          <div class="resp-[mt/25] flex resp-[gap/20] flex-col tablet:resp-[w-max/675/280] tablet:resp-[w-min/675/280]">
            <a href="<?php the_permalink($item_id); ?>">
              <h3 class="resp-[mb/15] resp-[font/30/18] leading-none font-accent text-line-overflow-2">
                <?= get_the_title($item_id) ?>
              </h3>
            </a>

            <p class="font-accent-regular leading-[1.5] resp-[font/24/14] resp-[mb/18] text-line-overflow-3">
              <?= get_the_excerpt($item_id); ?>
            </p>

            <div class="flex items-center justify-between resp-[gap/20]">
              <div class="flex resp-[gap/10] items-center left-[10px] bottom-[24px]">
                <div class="flex items-center resp-[gap/10] ">
                  <?php
                  $terms = wp_get_post_terms($item_id, 'stories-category');
                  if ($terms) { ?>
                    <?php foreach ($terms as $term) { ?>
                      <div class="bg-[#3462A0] resp-[px/10] resp-[pt/5] resp-[pb/3] rounded-[10px] leading-none relative block font-accent  resp-[font/24/16/16]">
                        <?= $term->name; ?>
                      </div>
                  <?php }
                  } ?>
                </div>

                <div class="block resp-[font/20] font-accent-regular">
                  <?= calculate_reading_time(get_post_field('post_content', $item_id)) ?> min read
                </div>
              </div>

              <div class="svg-fill-green save-item cursor-pointer <?php if (isCookieValueExists('save', $item_id)) echo 'added' ?>" data-id="<?= $item_id ?>">
                <?php renderAssetsSVG('sticker'); ?>
              </div>
            </div>

          </div>

          <div class="stories-img rounded-[15px]  overflow-hidden h-full !max-w-full tablet:!resp-[w-max/450] tablet:!aspect-ratio-[440/350]">
            <?= get_the_post_thumbnail($item_id) ?>
          </div>
        </li>
    <?php }
    } ?>
  </ul>
</section>