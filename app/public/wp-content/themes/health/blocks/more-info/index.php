<?php $arr = get_field('block_content') ?>

<section class="container resp-[pt/50] resp-[pb/70]">
  <h2 class="title-3 text-center w-full resp-[w-max/380] mx-auto resp-[mb/32]">
    <?= $arr['title'] ?>
  </h2>

  <p class="resp-[font/24] text-center helvetica-light w-full resp-[w-max/610] mx-auto resp-[mb/45]">
    <?= $arr['text'] ?>
  </p>

  <ul class="flex justify-center flex-wrap resp-[gap/25/15] resp-[w-max/850] mx-auto">
    <?php foreach ($arr['list'] as $item) { ?>
      <li class="w-full mobile:resp-[w-max/190] bg-blue rounded-[5px] resp-[py/10] resp-[px/10] text-center">
        <div class="resp-[svg-width/24] resp-[svg-height/24] mx-auto resp-[mb/4]">
          <?php renderUploadsSVG($item['icon']); ?>
        </div>

        <div class="resp-[font/14] uppercase">
          <?= $item['heading'] ?>
        </div>

        <div class="resp-[font/12]">
          <?= $item['text'] ?>
        </div>
      <?php } ?>
  </ul>
</section>