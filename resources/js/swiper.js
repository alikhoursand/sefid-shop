import Swiper from 'swiper'
import {Autoplay, Navigation, Pagination, Thumbs, EffectCards} from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/effect-cards';

document.addEventListener('DOMContentLoaded', function () {

    new Swiper(".hero-swiper", {
        modules: [Pagination, Autoplay],
        slidesPerView: 1,
        grabCursor:true,
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
        },
        speed: 750,
        loop: true,
        pagination: {
            el: ".swiper-pagination",

            clickable: true,
        },
    });

    new Swiper(".product-slider", {
        modules: [Navigation, Autoplay],
        slidesPerView: 2,
        grabCursor:true,
        spaceBetween: 5,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        speed: 1000,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 8,
            },
            425: {
                slidesPerView: 2,
                spaceBetween: 8,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 32,
            },

        },
    });

    new Swiper(".offerSlider", {
        modules: [Navigation, Autoplay],
        slidesPerView: 1,
        spaceBetween: 10,
        grabCursor:true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        speed: 1000,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 40,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1280: {
                slidesPerView: 4,
                spaceBetween: 20,
            }
        },
    });

    let productThumbs = new Swiper(".product-thumbs", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        grabCursor:true,
        freeMode: true,
        watchSlidesProgress: true,
    });

    new Swiper(".product-gallery", {
        modules: [Thumbs, Autoplay],
        loop: true,
        grabCursor:true,
        spaceBetween: 12,
        thumbs: {
            swiper: productThumbs,
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
    });

    new Swiper('.testimonials', {
        effect: 'cards',
        loop: false,
        grabCursor:true,
        modules: [EffectCards],
        speed: 2000,
    });

})

