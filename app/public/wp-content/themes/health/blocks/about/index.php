<?php $arr = get_field('block_content') ?>

<section class="container flex flex-col tablet:flex-row">
  <div class="bg-overlay-black bg-cover bg-no-repeat	tablet:w-[60%] resp-[px/100/20] resp-[py/20/20/60]  flex flex-col justify-center" style="background-image: url('<?= $arr['background']['url'] ?>')">
    <h2 class="title-3 resp-[mb/24/18]">
      <?= $arr['title'] ?>
    </h2>

    <p class="resp-[font/21/16]">
      <?= $arr['text'] ?>
    </p>
  </div>

  <div class="hidden tablet:block tablet:w-[40%] aspect-square">
    <img src="<?= $arr['image']['url'] ?>" alt="">
  </div>
</section>