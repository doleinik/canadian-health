<section class="container resp-[py/150/80] overflow-hidden">
    <h2 class="title-2 resp-[mb/45]">
        Categories
    </h2>
    <ul class="flex flex-wrap justify-between resp-[gap/32]">
        <?php
        $tags = get_terms(array('taxonomy' => 'stories-category'));
        foreach ($tags as $tag) { ?>
            <li class="tablet:w-[calc(33%_-_19px)] bg-blue  rounded-[16px] w-full text-center">
                <a href="" class=" resp-[py/24] resp-[px/24] flex justify-center items-center flex-col">
                    <!-- <div>
                        <?php $icon = get_field('image', $tag->taxonomy . '_' . $tag->term_id); ?>
                        <img src="<?php echo $icon ?>">
                    </div> -->
                    <div class="resp-[font/20] font-helvetica-light uppercase">
                        <?= $tag->name ?>
                    </div>
                    <div class="resp-[font/16] font-helvetica-light">
                        <?= $tag->count ?> items
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>
</section>