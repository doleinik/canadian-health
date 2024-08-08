<?php
if (isset($args['id'])) {
  $item_id = $args['id'];
}
global $post;
$post = get_post($item_id);
?>
<div class="h-full w-full flex flex-col short-item resp-[mb/120] last:mb-0" data-item="<?= $item_id ?>" data-next="<?= get_next_post_id($item_id); ?>">
  <div class="flex items-center resp-[gap/20] resp-[mb/15]">
    <div class="resp-[width/78/30] resp-[height/78/30] rounded-full bg-[#FFBEBE]"></div>

    <div>
      <div>
        <?= getAuthorByPostId($item_id) ?>
      </div>
      <div class="flex resp-[gap/20]">
        <?php $terms = wp_get_post_terms($item_id, 'tag'); ?>
        <?php foreach ($terms as $term) { ?>
          <div class="text-accent">
            #<?= $term->name; ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <h3>
    <?= get_the_title($item_id) ?>
  </h3>
  <div class="h-full rounded-[5px] !max-w-full relative">
    <!--    <div class="customPlayButton w-full h-full flex-center z-[100]">&#9654;</div>-->

    <?php
    $video_url = get_field('video', $item_id);
    //      if ($video_url) { 
    ?>
    <!--            <video loop playsinline preload="metadata" muted="muted">-->
    <!--              <source src="https://www.youtube.com/embed/1RSdLGO4hw4" type="video/mp4">-->
    <!--            </video>-->
    <!--      --><?php //} else { 
                  ?>
    <!--          --><? //= get_the_post_thumbnail($item_id, 'full', array()); 
                      ?>
    <!--      --><?php //} 
                  ?>
    <!--    <iframe width="485" height="100%" src="https://www.youtube.com/embed/1RSdLGO4hw4" title="The Best Funny Animals!" frameborder="0"-->
    <!--            allow="autoplay; loop; web-share;" allowfullscreen></iframe>-->
    <!--    <div class="progressBar"></div>-->

    <!--    <div id="player"></div>-->
    <iframe width="485" height="100%" src="https://www.youtube.com/embed/r5peePXHZvE?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
  </div>


  <script>
    // var player;
    //
    // // Функція викликається при завантаженні API
    // function onYouTubeIframeAPIReady() {
    //     // Створення відеоплеєра
    //     player = new YT.Player('player', {
    //         height: '360',
    //         width: '100%',
    //         videoId: '1RSdLGO4hw4',
    //         events: {
    //             'onReady': onPlayerReady,
    //         }
    //     });
    // }
    //
    // // Функція викликається, коли відеоплеєр готовий
    // function onPlayerReady(event) {
    //     // Відтворити відео при завантаженні
    //     event.target.playVideo();
    // }
  </script>

</div>