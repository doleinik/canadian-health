<?php
if (isset($args['id'])) {
    $item_id = $args['id'];
}
?>
<li class="flex flex-col w-full tablet:w-[calc(33%_-_16px)] tablet:resp-[w-max/416] tablet:[&:nth-child(1)]:max-w-[calc(50%_-_16px)] tablet:[&:nth-child(1)]:w-full tablet:[&:nth-child(2)]:max-w-[calc(50%_-_16px)] tablet:[&:nth-child(2)]:w-full">
    <div class="stories-img rounded-[15px] relative  overflow-hidden h-full aspect-ratio-[400/250] !w-full !max-w-full resp-[mb/30]">
        <?php echo get_the_post_thumbnail($item_id) ?>

        <div class="flex resp-[gap/10] absolute left-[10px] bottom-[24px]">
            <?php foreach (get_the_category($item_id) as $category) { ?>
                <div class="stories-category-item bg-secondary resp-[px/13] resp-[pt/8] resp-[pb/3] leading-none relative block font-helvetica-light uppercase resp-[font/12]">
                    <?= $category->name; ?>

                    <span class="triangle border-secondary absolute left-0 top-[100%]"></span>
                </div>
            <?php } ?>
        </div>
    </div>

    <a href="<?php the_permalink($item_id); ?>">
        <h3 class="resp-[mb/32] resp-[font/24/18] leading-none font-accent ">
            <?= get_the_title($item_id) ?>
        </h3>
    </a>

    <p class="font-accent-regular leading-[1.5] resp-[font/16] resp-[mb/24] text-line-overflow-2">
        <?php echo get_the_excerpt($item_id); ?>
    </p>



    <div class="flex resp-[gap/20]">
        <!-- <div class="flex items-center resp-[gap/5]">
            <?php renderAssetsSVG('controls/like'); ?>
            <span>
                234
            </span>
        </div>
        <div class="flex items-center resp-[gap/5]">
            <?php renderAssetsSVG('controls/comment'); ?>
            <span>
                23
            </span>
        </div> -->
        <div class="font-helvetica-light resp-[font/14] font-light resp-[mb/20]">
            <?= calculate_reading_time(get_post_field('post_content', $item_id)) ?> min read
        </div>
        <div class="svg-fill-green save-item ml-auto cursor-pointer <?php if (isCookieValueExists('save', $item_id)) echo 'added' ?>" data-id="<?= $item_id ?>">
            <?php renderAssetsSVG('sticker'); ?>
        </div>
    </div>
</li>