let player;
let videoContainer = document.getElementById('video-container');
const url = window.location.search;

if (videoContainer) {
    let videoUrl = videoContainer.dataset.video;


    function onYouTubeIframeAPIReady() {
        player = new YT.Player('video', {
            height: '100%',
            width: '100%',
            videoId: videoUrl,
            playerVars: {
                'autoplay': 0, // Autoplay is set to 0 to prevent immediate playback
                'controls': 1,
                'disablekb': 1,
                'fs': 0,
                'modestbranding': 1,
                'rel': 0,
                'showinfo': 0,
                'iv_load_policy': 3, // Turn off video annotations
                'autohide': 1, 
                'playsinline': 1,
                'origin': window.location.origin,
                'start': 0 // Start the video from the beginning
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerReady(event) {
        // Добавьте обработчик события для клика по обложке
        // document.getElementById('thumbnail-container').addEventListener('click', function () {
        event.target.playVideo();
        // });
    }

    function onPlayerStateChange(event) {
        // Скройте обложку после начала воспроизведения
        if (event.data === YT.PlayerState.PLAYING) {
            document.getElementById('thumbnail-container').style.display = 'none';
        }
    }

    let buttonPlay = document.getElementById('play-button')
    if (buttonPlay) buttonPlay.addEventListener('click', onYouTubeIframeAPIReady);


    if (url.split("play=")[1] === 'true') {
        onYouTubeIframeAPIReady();
    } 
}