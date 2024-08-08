import Swiper from '../../../../../../plugins/brainwave/assembly/node_modules/swiper';
import Navigation from '../../../../../../plugins/brainwave/assembly/node_modules/swiper/modules/navigation.min.mjs';
import Autoplay from '../../../../../../plugins/brainwave/assembly/node_modules/swiper/modules/autoplay.min.mjs';

// const ourTeamSwiper = document.querySelectorAll('.swiper');
// if (ourTeamSwiper.length > 0) {
//     ourTeamSwiper.forEach((element, index) => {
//         const swiperSlider = new Swiper(element, {
//             modules: [Navigation],
//             navigation: {
//                 nextEl: `.our-team .swiper-button-next`,
//                 prevEl: `.our-team .swiper-button-prev`,
//             },
//
//             breakpoints: {
//                 320: {
//                     slidesPerView: 1,
//                     spaceBetween: 20
//                 },
//                 560: {
//                     slidesPerView: 2,
//                     spaceBetween: 30
//                 },
//                 991: {
//                     slidesPerView: 3,
//                     spaceBetween: 40
//                 }
//             }
//         });
//     })
// }
const mainBanner = document.querySelectorAll('.main-banner');
if (mainBanner.length > 0) {
    mainBanner.forEach((element, index) => {
        var swiper = new Swiper(element, {
            modules: [Navigation,Autoplay],
            slidesPerView: 1,
            loop: true,
            navigation: {
                nextEl: ".main-banner .swiper-button-next",
                prevEl: ".main-banner .swiper-button-prev",
            },
             on: {
                afterInit: function () {
                    let slider = this;
                    let slideList = slider['slides'];
                    element.style.backgroundImage = `url("${slideList[0].dataset.bg}")`;
                },
                slideChangeTransitionStart: function () {
                    let slider = this;
                    let slideList = slider['slides'];
                    slideList.forEach(e => {
                        if (e.classList.contains('swiper-slide-active')) {
                            element.style.backgroundImage = `url("${e.dataset.bg}")`;
                        }
                    })
                },
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            });
        })  
}
const quickClipsSwiper = document.querySelectorAll('.quick_clips_swiper');
if (quickClipsSwiper.length > 0) {
    quickClipsSwiper.forEach((element, index) => {
        var swiper = new Swiper(element, {
            modules: [Navigation],
            spaceBetween: 20,
            // slidesPerView: 1,
            // breakpoints: {
            //     640: {
            //         slidesPerView: 2,
            //     },
            //     768: {
            //         slidesPerView: 4,
            //     },
            //     1024: {
            //         slidesPerView: 5,
            //     },
            // },
            slidesPerView: "auto",
            // navigation: {
            //     nextEl: `.quick_clips_swiper .arrow-button-next`,
            //     prevEl: `.quick_clips_swiper .arrow-button-prev`,
            // },
        });
    })
}

const trendingSwiper = document.querySelectorAll('.trending_swiper');
if (trendingSwiper.length > 0) {
    trendingSwiper.forEach((element, index) => {
        var swiper2 = new Swiper(element, {
            modules: [Navigation],
            spaceBetween: 24,
            slidesPerView: "auto",
            // on: {
            //     afterInit: function () {
            //         let slider = this;
            //         let slideList = slider['slides'];
            //         let sectionBg = document.querySelector('.trending_videos');
            //         sectionBg.style.backgroundImage = `url("${slideList[0].dataset.bg}")`;
            //     },
            //     slideChangeTransitionStart: function () {
            //         let slider = this;
            //         let slideList = slider['slides'];
            //         let sectionBg = document.querySelector('.trending_videos');
            //         slideList.forEach(e => {
            //             if (e.classList.contains('swiper-slide-active')) {
            //                 sectionBg.style.backgroundImage = `url("${e.dataset.bg}")`;
            //             }
            //         })
            //     },
            // },
        });
    })
}

const latestSwiper = document.querySelectorAll('.latest_episodes');
if (latestSwiper.length > 0) {
    latestSwiper.forEach((element, index) => {
        var swiper2 = new Swiper(element, {
            modules: [Navigation],
            spaceBetween: 24,
            slidesPerView: "auto",

            // slidesPerView: 1,
            // breakpoints: {
            //     640: {
            //         slidesPerView: 2,
            //     },
            //     768: {
            //         slidesPerView: 4,
            //     },
            //     1024: {
            //         slidesPerView: 5,
            //     },
            // },
            // slidesPerView: "auto",
            // navigation: {
            //     nextEl: `.quick_clips_swiper .arrow-button-next`,
            //     prevEl: `.quick_clips_swiper .arrow-button-prev`,
            // },
        });
    })
}