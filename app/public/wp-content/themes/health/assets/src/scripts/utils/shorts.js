const shortContainer = document.querySelector('.shorts-list');
const body = document.querySelector('body');
let isScrolling;
let touchStartY;

if (shortContainer) {
    shortContainer.addEventListener('touchstart', function (event) {
        touchStartY = event.touches[0].clientY;
    }, {passive: true});

    shortContainer.addEventListener('wheel', function (event) {
        clearTimeout(isScrolling);
        isScrolling = setTimeout(function () {
            if (event.deltaY > 0) {
                load_short();
            }
        }, 200);
    }, {passive: true});

    document.addEventListener('keydown', function (event) {
        if (event.key === 'ArrowDown') {
            load_short();
        }
    }, {passive: true});

    shortContainer.addEventListener('touchmove', function (event) {
        clearTimeout(isScrolling);
        isScrolling = setTimeout(function () {
            const touchDeltaY = event.touches[0].clientY - touchStartY;
            if (touchDeltaY > 0) {
                load_short();
            }
        }, 200);
    }, {passive: true});

    function addActiveShort() {
        const shortItem = document.querySelectorAll('.short-item');

        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                let thisVideo = entry.target;
                if (entry.intersectionRatio > 0) {
                    if (!thisVideo.classList.contains("active")) {
                        playVideo(thisVideo);
                    }
                } else {
                    if (thisVideo.classList.contains("active")) {
                        pauseVideo(thisVideo);
                    }
                }
            });
        });

        shortItem.forEach((el) => {
            io.observe(el);
        });
    }

    function playVideo(thisVideo) {
        const video = thisVideo.querySelector('video');
        const progressBar = thisVideo.querySelector('.progressBar');
        const customPlayButton = thisVideo.querySelector('.customPlayButton');

        thisVideo.classList.add("active");

        // video.play().then(() => {
        //     // video.muted = false;
        //     customPlayButton.style.opacity = '0';
        // }).catch(error => {
        //     console.error('Error playing video:', error.message);
        // });
        //
        // // Update progress bar
        // video.addEventListener('timeupdate', function () {
        //     const progress = (video.currentTime / video.duration) * 100;
        //     progressBar.style.width = progress + '%';
        // });
    }

    function pauseVideo(thisVideo) {
        const video = thisVideo.querySelector('video');
        const customPlayButton = thisVideo.querySelector('.customPlayButton');

        // thisVideo.classList.remove("active");
        //
        // video.pause();
        // customPlayButton.style.opacity = '0';
        // // video.muted = true;
        // video.currentTime = 0;
    }

    function load_short() {
        let currentNext = document.querySelectorAll('.short-item')
        let next_id = currentNext[currentNext.length - 1].dataset.next;

        let params = new URLSearchParams({
            action: 'load_shorts',
            next_id
        }).toString()

        fetch(ajax_object.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: params,
        })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (next_id !== 'end') {
                    shortContainer.insertAdjacentHTML('beforeend', data.short_item);
                }
            })
            .then(function () {
                addActiveShort();
            })
            .catch(function (error) {
                console.error('Fetch error:', error);
            });
    }

    document.addEventListener('DOMContentLoaded', function () {
        body.classList.add('overflow-hidden');
        // load_short();
    }, false);
}