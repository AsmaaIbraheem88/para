(function($) {
    "use strict";

    
    
     

    /*----------------------------
     wow js active
    ------------------------------ */
    new WOW().init();

    /*------------- preloader js --------------*/
    $(window).on('load', function() { // makes sure the whole site is loaded
        $('.preloder-wrap').fadeOut(); // will first fade out the loading animation
        $('.loader').delay(150).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(150).css({ 'overflow': 'visible' })
    })

    // slider-active
    $('.slider-active').owlCarousel({
        margin: 0,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: true,
        smartSpeed: 800,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        URLhashListener: true,
        startPosition: 'URLHash',
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // slider-active
    $('.slider-active').owlCarousel({
        margin: 0,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: true,
        smartSpeed: 800,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        URLhashListener: true,
        startPosition: 'URLHash',
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // slider-active2
    $('.slider-active2').owlCarousel({
        margin: 0,
        loop: true,
        animateOut: 'slideOutDown',
        animateIn: 'slideInDown',
        autoplay: true,
        autoplayTimeout: 4000,
        nav: true,
        smartSpeed: 800,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        URLhashListener: true,
        startPosition: 'URLHash',
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // slider-active3
    $('.slider-active3').owlCarousel({
        margin: 0,
        loop: false,
        animateOut: 'fadeOut',
        animateIn: 'FadepIn',
        autoplay: true,
        autoplayTimeout: 4000,
        nav: true,
        smartSpeed: 800,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        URLhashListener: true,
        startPosition: 'URLHash',
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    //slider-area background setting
    function sliderBgSetting() {
        if ($(".slider-area .slider-items").length) {
            $(".slider-area .slider-items").each(function() {
                var $this = $(this);
                var img = $this.find(".slider").attr("src");

                $this.css({
                    backgroundImage: "url(" + img + ")",
                    backgroundSize: "cover",
                    backgroundPosition: "center center"
                })
            });
        }
    }

    // test-active
    $('.test-img-active ').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.test-content-active'
    });
    $('.test-content-active').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.test-img-active',
        dots: true,
        arrows: false,
        centerMode: false,
        focusOnSelect: false
    });


    // test-active
    $('.about-img-active').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        nextArrow: '<i class="fa fa-chevron-right"></i>',
        prevArrow: '<i class="fa fa-chevron-left"></i>',
        fade: true,
        asNavFor: '.about-active'
    });
    $('.about-active').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.about-img-active',
        dots: false,
        arrows: false,
        centerMode: false,
        focusOnSelect: false
    });

    // brand-active
    $('.test-active').owlCarousel({
        margin: 0,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: true,
        smartSpeed: 800,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        URLhashListener: true,
        startPosition: 'URLHash',
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });


    // slider-active2
    $('.about-page-active').owlCarousel({
        margin: 0,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: true,
        smartSpeed: 800,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        URLhashListener: true,
        startPosition: 'URLHash',
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    /*==========================================================================
        WHEN DOCUMENT LOADING
    ==========================================================================*/
    $(window).on('load', function() {
        sliderBgSetting()
    });

    // Parallax background
    function bgParallax() {
        if ($(".parallax").length) {
            $(".parallax").each(function() {
                var height = $(this).position().top;
                var resize = height - $(window).scrollTop();
                var parallaxSpeed = $(this).data("speed");
                var doParallax = -(resize / parallaxSpeed);
                var positionValue = doParallax + "px";
                var img = $(this).data("bg-image");

                $(this).css({
                    backgroundImage: "url(" + img + ")",
                    backgroundPosition: "50%" + positionValue,
                    backgroundSize: "cover",
                });

                if (window.innerWidth < 768) {
                    $(this).css({
                        backgroundPosition: "center center"
                    });
                }
            });
        }
    }
    bgParallax();
    $(window).on("scroll", function() {
        bgParallax();
    });


    // // stickey menu
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop(),
            mainHeader = $('#sticky-header'),
            mainHeaderHeight = mainHeader.innerHeight();

        // console.log(mainHeader.innerHeight());
        if (scroll > 0) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });

    /*--------------------------
     scrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    
    

    /*--
    Magnific Popup
    ------------------------*/
    $('.popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }

    });

    $('.video-popup').magnificPopup({
        type: 'iframe',
        gallery: {
            enabled: true
        }

    });

    // counter up
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    // counter up
    $('#counter').counterUp({
        delay: 10,
        time: 1000
    });


    // slicknav
    $('ul#navigation').slicknav({
        prependTo: ".responsive-menu-wrap"
    });

   

        

    /*-------------------------------------------------------
        blog details
    -----------------------------------------------------*/
    if ($(".about-area,.skill-area").length) {
        var post = $(".about-img,.skill-img");

        post.each(function() {
            var $this = $(this);
            var entryMedia = $this.find("img");
            var entryMediaPic = entryMedia.attr("src");

            $this.css({
                backgroundImage: "url(" + entryMediaPic + ")",
                backgroundSize: "cover",
                backgroundPosition: "center center",
            })
        })
    }

    function setTwoColEqHeight($col1, $col2) {
        var firstCol = $col1,
            secondCol = $col2,
            firstColHeight = $col1.innerHeight(),
            secondColHeight = $col2.innerHeight();

        if (firstColHeight > secondColHeight) {
            secondCol.css({
                "height": firstColHeight + 1 + "px"
            })
        } else {
            firstCol.css({
                "height": secondColHeight + 1 + "px"
            })
        }
    }


    $(window).on("load", function() {
        setTwoColEqHeight($(".about-img.skill-img"), $(".about-wrap,.skill-wrap"));

    });

  
  

})(jQuery);



///////////////////////////////////////////////////////////////////////
   
    
 //Scroll to section
    
 $('.mainmenu li ').click(function () {
        
    $('html,body').animate({
       
        scrollTop: $('#' + $(this).data('scroll')).offset().top
    }, 1000);
    
});

////////////////////////////////////////////////////////////////////////////
  
   //Dynamic active section
    
   $(window).scroll(function () {
        
    $('.block').each(function () {
        
        if ($(window).scrollTop() > $(this).offset().top - 70) {
            var blockID = $(this).attr('id');
            $('.mainmenu li').removeClass('active');
            $('.mainmenu li[data-scroll=' + blockID + ']').addClass('active');
        }
    
    });
   
});


////////////////////////////////////////////////////////////////////  


$('.project-menu a').on('click', function() {
    $(this).addClass('active').siblings().removeClass('active');   
});

//////////////////////////////////////////////////////////
 
    
    /*Header Height */
    $('.slider-items').height($(window).height());
    
/////////////////////////////////////////////////////////// 



window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    document.getElementById("fixed-social").style.display = "block";
} else {
    document.getElementById("fixed-social").style.display = "none";
}
}
// ......///////////////////////////////////

$(".project-menu a").on("click", function(){
    $(".project-menu").find(".active").removeClass("active");
    $(this).addClass("active");
 });

/////////////////////////////////////////////
$(document).bind("contextmenu",function(e) {  //to provent right click
	e.preventDefault();
 
});
////////////////////////////////////////////
// $(document).keydown(function(e){     //to provent f12 inspect
//     if(e.which === 123){
 
//        return false;
 
//     }
 
// });