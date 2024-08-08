<?php
$shortId = get_next_post_id();
if (isset($_GET['short'])) {
  $shortId = $_GET['short'];
}
?>

<section class="container h-[100dvh] overflow-hidden" id="shorts">
  <div class="flex resp-[pt/120/70] resp-[pb/40] h-full">
    <div class="hidden tablet:flex flex-col resp-[gap/35]">
      <div class="resp-[font/28]">
        Latest Clips
      </div>
      <div class="resp-[font/28]">
        Favorites
      </div>
      <div class="resp-[font/28]">
        Explore
      </div>
    </div>
    <div class="resp-[w-max/705] mx-auto flex resp-[gap/48] shorts-container scrollbar-hide relative">
      <div class="resp-[width/580] shorts-list relative">
        <?php renderComponent('shorts/item', ['id' => $shortId]); ?>
      </div>

      <div class="hidden tablet:flex flex-col resp-[gap/40]">
        <div class="flex-center resp-[width/81] resp-[height/81] rounded-full bg-[#707070]">
          save
        </div>
        <div class="flex-center resp-[width/81] resp-[height/81] rounded-full bg-[#707070]">
          like
        </div>
        <div class="flex-center resp-[width/81] resp-[height/81] rounded-full bg-[#707070]">
          comment
        </div>
        <div class="flex-center resp-[width/81] resp-[height/81] rounded-full bg-[#707070]">
          share
        </div>
      </div>
    </div>
  </div>
</section>