(function($) {
    "use strict";

    jQuery(document).ready(function() {

        /*====== mobile off canvas active ======*/
        function headermobileAside() {
            var navbarTrigger = $('.mobile-aside-button'),
                endTrigger = $('.mobile-aside-close'),
                container = $('.mobile-off-canvas-active'),
                wrapper = $('.wrapper');
            wrapper.prepend('<div class="body-overlay"></div>');
            navbarTrigger.on('click', function(e) {
                e.preventDefault();
                container.addClass('inside');
                wrapper.addClass('overlay-active');
            });
            endTrigger.on('click', function() {
                container.removeClass('inside');
                wrapper.removeClass('overlay-active');
            });
            $('.body-overlay').on('click', function() {
                container.removeClass('inside');
                wrapper.removeClass('overlay-active');
            });
        };
        headermobileAside();


        /*--- language currency active ----*/
        $('.mobile-language-active').on('click', function(e) {
            e.preventDefault();
            $('.lang-dropdown-active').slideToggle(900);
        });
        $('.mobile-currency-active').on('click', function(e) {
            e.preventDefault();
            $('.curr-dropdown-active').slideToggle(900);
        });
        $('.mobile-account-active').on('click', function(e) {
            e.preventDefault();
            $('.account-dropdown-active').slideToggle(900);
        });


        /*---------------------
        	mobile-menu
        --------------------- */
        var $offCanvasNav = $('.mobile-menu'),
            $offCanvasNavSubMenu = $offCanvasNav.find('.dropdown');
        /*Add Toggle Button With Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i></i></span>');
        /*Close Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.slideUp();
        /*Category Sub Menu Toggle*/
        $offCanvasNav.on('click', 'li a, li .menu-expand', function(e) {
            var $this = $(this);
            if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
                e.preventDefault();
                if ($this.siblings('ul:visible').length) {
                    $this.parent('li').removeClass('active');
                    $this.siblings('ul').slideUp();
                } else {
                    $this.parent('li').addClass('active');
                    $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                    $this.closest('li').siblings('li').find('ul:visible').slideUp();
                    $this.siblings('ul').slideDown();
                }
            }
        });

        // mobile__menu__end







        // scrollToTop
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '300', // Distance from top before showing element (px)
            topSpeed: 300, // Speed back to top (ms)
            animation: 'fade', // Fade, slide, none
            animationInSpeed: 200, // Animation in speed (ms)
            animationOutSpeed: 200, // Animation out speed (ms)
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });

        // One Page Nav
        var top_offset = $('.headerarea').height() - 10;
        $('.main-menu nav ul').onePageNav({
            currentClass: 'active',
            scrollOffset: top_offset,
        });


        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll < 245) {
                $(".header__sticky").removeClass("sticky");
            } else {
                $(".header__sticky").addClass("sticky");
            }
        });





        /*====== Search active ======*/
        function sidebarSearch() {
            var searchTrigger = $('.header__icon'),
                endTriggersearch = $('.header__search__close'),
                container = $('.header__main__search__active ');
            searchTrigger.on('click', function(e) {
                e.preventDefault();
                container.addClass('inside');
            });
            endTriggersearch.on('click', function() {
                container.removeClass('inside');
            });
        };
        sidebarSearch();




        // // Counter Js
        $('.counter').counterUp({
            delay: 100,
            time: 1000
        });





        /* magnificPopup video view */
        $('.video-btn').magnificPopup({
            type: 'iframe'
        });


    


        // $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        //     $('.testimonial__slider__active').slick('setPosition');
        //   })


        // 02. Info Bar Js

        // $(".headerarea__bars").on("click", function () {

        //     $(".minicart").addClass("info-opened");

        //     $(".body-overlay").addClass("opened");

        // });

        

        // $(".minicart__close__btn").on("click", function () {
            
        //     $(".minicart").removeClass("info-opened");

        //     $(".body-overlay").removeClass("opened");

        // });

        // $(".body-overlay").on("click", function () {

        //     $(".minicart").removeClass("info-opened");

        //     $(".body-overlay").removeClass("opened");

        // });
        // setting__wraper

        // 02. Info Bar Js

        //Mini Cart with overlay

        $(".setting__wrap__active").on("click", function () {

            $(".setting__wrap__list").addClass("show");

            $(".body-overlay").addClass("opened");

        });

        $(".setting__wrap__close").on("click", function () {
            
            $(".setting__wrap__list").removeClass("show");

            $(".body-overlay").removeClass("opened");

        });



        

        //Mobile with overlay

        $(".mobile-aside-button").on("click", function () {
            $(".body-overlay").addClass("opened");
        });

        $(".mobile-aside-button").on("click", function () {
            $(".body-overlay").removeClass("opened");
        });


        
        

        /*====== Search active ======*/
        function sidebarSearch() {
            var searchTrigger = $('.headerarea__search'),
                endTriggersearch = $('.headersearch__active__close'),
                container = $('.headersearch__active ');
            searchTrigger.on('click', function(e) {
                e.preventDefault();
                container.addClass('inside');
            });
            endTriggersearch.on('click', function() {
                container.removeClass('inside');
            });
        };
        sidebarSearch();





        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })



        // Block Show/hide option
        if (document.querySelector('.toggle-btn') !== null) {
            $('.toggle-btn').on('click', function(e) {
                e.preventDefault();
                var $this = $(this).attr('data-target');
                $($this).toggleClass('visible');
            });
        }




        // image loaded portfolio init
        var gridfilter = $('.grid');
        if (gridfilter.length) {
            $('.grid').imagesLoaded(function() {
                $('.gridFilter').on('click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({
                        filter: filterValue
                    });
                });
                var $grid = $('.grid').isotope({
                    itemSelector: '.grid-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.grid-item',
                    }
                });
            });
        }

        // project Filter
        if ($('.gridFilter button').length) {
            var projectfiler = $('.gridFilter button');
            if (projectfiler.length) {
                $('.gridFilter button').on('click', function(event) {
                    $(this).siblings('.active').removeClass('active');
                    $(this).addClass('active');
                    event.preventDefault();
                });
            }
        }



        // WOW active
        new WOW().init();


        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $container.isotope('grid');
          });



        // Grid Countdown
        $('[data-countdown]').each(function() {
            var $this = $(this),
                finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('<div class="count"><p>%D</p><span>Days</span></div><div class="count"><p>%H</p> <span>Hrs</span></div><div class="count"><p>%M</p> <span>Min</span></div><div class="count"> <p>%S</p> <span>Sec</span></div>'));
            });
        });





    });




       /* magnificPopup video view */
       $('.video-btn').magnificPopup({
        type: 'iframe'
    });

	


        $('.herobanner__slider__active').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: true,
            arrows:true,
            prevArrow:'<span class="prev_class"><i class="icofont-arrow-up"></i></span>',
            nextArrow: '<span class="next_class"><i class="icofont-arrow-down"></i></span>',
            responsive: [{
                breakpoint: 1367,
                settings: {
                    slidesToShow:1,
                }
            },
            {
                breakpoint: 993,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 321,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
        
     });


     $('.testimonial__slider__active').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,        
        dots:true,
        arrows:false,
        prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
        nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
        responsive: [{
            breakpoint: 1367,
            settings: {
                slidesToShow:1,
            }
        },
        {
            breakpoint: 993,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 321,
            settings: {
                slidesToShow: 1,
            }
        },
    ]
    
 });


 $('.brand__slider__active').slick({
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 1,

    arrows:false,

    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:6,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 6,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 321,
        settings: {
            slidesToShow: 1,
        }
    },
]

});

$('.category__slider__active__2').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,

    arrows:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:4,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 575,
        settings: {
            slidesToShow: 2,
        }
    },
    {
        breakpoint: 321,
        settings: {
            slidesToShow: 1,
        }
    },
]

});


$('.small__product__slider__active').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    rows:3,
    arrows:false,
    dots:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:1,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 1,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 1,
        }
    },
    {
        breakpoint: 321,
        settings: {
            slidesToShow: 1,
        }
    },
]

});



   
     
  

    
    

 $('.feature__slider__active').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:4,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 600,
        settings: {
            slidesToShow: 2,
        }
    },
    {
        breakpoint: 351,
        settings: {
            slidesToShow: 2,
        }
    },
]

});

$('.feature__slider__active__3').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    rows:2,
    dots: false,
    arrows:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:4,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 2,
        }
    },
    {
        breakpoint: 351,
        settings: {
            slidesToShow: 2,
        }
    },
]

});




$('.blog__slider__active').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:3,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 2,
        }
    },
    {
        breakpoint: 351,
        settings: {
            slidesToShow: 1,
        }
    },
]

});


$('.instagram__slider__active').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: '80px',
    dots: false,
    arrows:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:3,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 2,
        }
    },
    {
        breakpoint: 351,
        settings: {
            slidesToShow: 1,
        }
    },
]

});



$('.instagram__slider__active__2').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: '80px',
    dots: false,
    arrows:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:3,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 2,
        }
    },
    {
        breakpoint: 351,
        settings: {
            slidesToShow: 1,
        }
    },
]

});




$('.instagram__slider__active__3').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:3,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 2,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 2,
        }
    },
    {
        breakpoint: 351,
        settings: {
            slidesToShow: 1,
        }
    },
]

});



$('.category__slider__active').slick({
    infinite: true,
    slidesToShow: 7,
    slidesToScroll: 1,
    dots: false,
    arrows:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow: 7,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 5,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 351,
        settings: {
            slidesToShow: 2,
        }
    },
]

});



$('.collections__slider__active').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:3,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 2,
        }
    },
    {
        breakpoint: 351,
        settings: {
            slidesToShow: 2,
        }
    },
]

});


$('.collections__slider__active__5').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    arrows:false,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1367,
        settings: {
            slidesToShow:4,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 2,
        }
    },
    {
        breakpoint: 351,
        settings: {
            slidesToShow: 2,
        }
    },
]

});




$('.featurearea__thumb__img').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.featurearea__big__img',
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    arrows:true,
    prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
    nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    responsive: [{
        breakpoint: 1169,
        settings: {
            slidesToShow: 4,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 3,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 4,
        }
    },
    {
        breakpoint: 351,
        settings: {
            slidesToShow: 3,
        }
    },
]
  });


  $('.featurearea__big__img').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.featurearea__thumb__img',
    responsive: [{
        breakpoint: 1169,
        settings: {
            slidesToShow: 1,
        }
    },
    {
        breakpoint: 993,
        settings: {
            slidesToShow: 1,
        }
    },
    {
        breakpoint: 769,
        settings: {
            slidesToShow: 1,
        }
    },
    {
        breakpoint: 321,
        settings: {
            slidesToShow: 1,
        }
    },
]

  });



    //  MiniCart

    $(".headermiddle__bar").on("click", function () {
        $(".minicart").addClass("info-opened");
        $(".body__overlay").addClass("opened");
    });
    
    $(".minicart__close__btn").on("click", function () {
        $(".minicart").removeClass("info-opened");
        $(".body__overlay").removeClass("opened");
    });
    
    // Only close the overlay when clicked, and make sure it's not interfering with the bar's click event
    $(".body__overlay").on("click", function (e) {
        // Check if the overlay itself is clicked, not its children
        if ($(e.target).hasClass("body__overlay")) {
            $(".minicart").removeClass("info-opened");
            $(".body__overlay").removeClass("opened");
        }
    });
    



    $('.herobannerarea__slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows:true,
        prevArrow:'<span class="prev_class"> <i class="fas fa-chevron-left"></i></span>',
        nextArrow: '<span class="next_class"><i class="fas fa-chevron-right"></i></span>',
    
    });




    /* magnificPopup img view */
    $('.popup__img').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },
    });

    /* magnificPopup video view */
    $('.video-btn').magnificPopup({
        type: 'iframe'
    });

    $('.sidebar__widget').on("click", function(){
        $(this).siblings('.widget-collapse-hide').slideToggle();
        $(this).toggleClass('widget-collapse-show');
    });



})(jQuery);




var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

var incrementPlus = buttonPlus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  $n.val(Number($n.val())+1 );
});

var incrementMinus = buttonMinus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  var amount = Number($n.val());
  if (amount > 1) {
    $n.val(amount-1);
  }
});




/* Slidebar collapse */ 
if (window.innerWidth < 767) {
    const sidebarCollapseBtns = document.querySelectorAll('.sidebar-collapse-btn');
    sidebarCollapseBtns.forEach(btn => {
      btn.addEventListener("click", function() {
        const sibling = this.nextElementSibling;
        sibling.style.display = sibling.style.display === 'block' ? 'none' : 'block';
        this.classList.toggle('sidebar-collapse-show');
      });
    });
  }


  document.querySelectorAll(".quick__view__action").forEach(anchor => {
    anchor.addEventListener("click", function(event) {
      event.preventDefault();
    });
  });
  