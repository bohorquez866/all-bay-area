let sliders = ['.home-work__item', '.home-testimonies__item'];

function sliderSettler(selector) {

}
for (let i = 0; i < sliders.length; i++) {

    let valueSlider = new Swiper(sliders[i], {
        slidesPerView: 1,
        spaceBetween: 50,
        loop: true,
        speed: 1700,
        effect: "fade",
        fadeEffect: { crossFade: true },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: `${sliders[i]} .swiper-pagination`,

        }
    });
}

if (window.innerWidth < 768) {

    let typeSlider = new Swiper('.home-types__item', {
        slidesPerView: 1,
        spaceBetween: 50,
        loop: true,
        speed: 1700,

        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            960: {
                slidesPerView: 3,
                spaceBetween: 50,
                loop: true,
            }
        },
        pagination: {
            el: `.home-types__item .swiper-pagination`,

        }
    });

}
if (window.innerWidth < 768) {
    let valueAboutSlider = new Swiper('.about-value', {
        slidesPerView: 1,
        spaceBetween: 50,
        speed: 1700,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: `.home-types__item .swiper-pagination`,
        }
    });
}



let slider2;
let sliderList = ['.home-value-slider', '.home-services__item']
for (let i = 0; i < sliderList.length; i++) {
    if (window.innerWidth > 968) {
        slider2 = new Swiper(sliderList[i], {
            slidesPerView: 3,
            spaceBetween: 40,
            loop: true,
            speed: 1700,

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                960: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                    loop: true,
                }
            },
            pagination: {
                el: `${sliderList[i]} .swiper-pagination`,

            }
        });
    } else {
        slider2 = new Swiper(sliderList[i], {
            slidesPerView: 1,
            spaceBetween: 50,
            loop: true,
            speed: 1700,
            effect: "fade",
            fadeEffect: { crossFade: true },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: `${sliderList[i]} .swiper-pagination`,

            }
        });
    }
}


(function() {
    equalHeight(false, ".home-value__item p");
    equalHeight(false, ".home-services__item p");
})();

window.onresize = function() {
    equalHeight(true, ".home-value__item p");
    equalHeight(true, ".home-services__item p");
}

function equalHeight(resize, selector) {
    var elements = document.querySelectorAll(selector),
        allHeights = [],
        i = 0;
    if (resize === true) {
        for (i = 0; i < elements.length; i++) {
            elements[i].style.height = 'auto';
        }
    }
    for (i = 0; i < elements.length; i++) {
        var elementHeight = elements[i].clientHeight;
        allHeights.push(elementHeight);
    }
    for (i = 0; i < elements.length; i++) {
        elements[i].style.height = Math.max.apply(Math, allHeights) + 'px';
        /*if(resize === false){
          elements[i].className = elements[i].className + " show";
        }*/
    }
}

let $trashTrigger = document.querySelectorAll('.social_trash'),
    $contactTrigger = document.querySelectorAll('.contact_trigger'),

    $closeBooking = document.querySelector('.close-booking'),
    $closeLocation = document.querySelector('.close-location'),
    $closeAppointment = document.querySelector('.close-appointment')

$booking = document.querySelector('.booking'),
    $location = document.querySelector('.location'),
    $appointment = document.querySelector('.section_appoinment'),

    $locationBtn = document.querySelectorAll('.btn--location'),
    $bookingBtn = document.querySelectorAll('.btn--book'),

    $burgerMenu = document.querySelectorAll('.burger-menu'),
    $mobileMenu = document.querySelector('.mobile-menu');



let closeModal = (trigger, objective, className) => {
    if (trigger) {
        trigger.addEventListener('click', () => {
            objective.classList.remove(className);
        })
    }
}
let toggleModal = (trigger, objective, className, event) => {
    if (trigger) {
        trigger.forEach(element => {
            element.addEventListener(event, (e) => {
                objective.classList.toggle(className);

            });
        });

    }

};



toggleModal($trashTrigger, $booking, 'active', 'click');
closeModal($closeBooking, $booking, 'active');

toggleModal($contactTrigger, $appointment, 'active', 'click');
closeModal($closeLocation, $location, 'active');


toggleModal($locationBtn, $location, 'active', 'click');
toggleModal($bookingBtn, $appointment, 'active', 'click');
closeModal($closeAppointment, $appointment, 'active');


let toggleModal2 = (trigger, objective, className) => {
    if (trigger) {

        if (trigger.length > 1) {
            trigger.forEach(element => {

                element.addEventListener('click', () => {
                    objective.classList.toggle(className);

                });
            });

        } else if (trigger.length === 1) {
            trigger.addEventListener('click', () => {
                objective.classList.toggle(className);

            })

        }
    }
};
toggleModal2($burgerMenu, $mobileMenu, 'active');