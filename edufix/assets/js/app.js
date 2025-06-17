var AFFIXTHEME = AFFIXTHEME || {};

(function ($) {

    /*!----------------------------------------------
        # This beautiful code written with heart
        # by Xcodexe <xcodexe@gmail.com>
        # In Dhaka, BD at the Xcodexe workstation.
        ---------------------------------------------*/

    // USE STRICT
    "use strict";

    window.Dt = {
        init: function () {
            // Header
            this.header = $('.site-header');
            this.body = $('body');
            this.wpadminbar = $('#wpadminbar');

            this.headerFixed = {
                initialOffset: parseInt(this.header.attr('data-fixed-initial-offset')) || 100,

                enabled: $('[data-header-fixed]').length,
                value: false,

                mobileEnabled: $('[data-mobile-header-fixed]').length,
                mobileValue: false
            };

            // Logos
            this.siteTitle = this.header.find('.site-title');
            this.logo = this.header.find('.main-logo');
            this.logoForOnepage = this.header.find('.for-onepage');
            this.logoForOnepageLight = this.logoForOnepage.find('.light');

            // Menus
            this.megaMenu = this.header.find('#mega-menu-wrap');
            this.mobileMenu = 991;


            this.resize();
        },

        resize: function () {
            this.isDesktop = $(window).width() >= 991;
            this.isMobile = $(window).width() <= 991;
            this.isPad = $(window).width() <= 1024;
            this.isMobileMenu = $(window).width() <= Dt.mobileMenu
        }
    };

    AFFIXTHEME.initialize = {
        init: function () {
            AFFIXTHEME.initialize.general();
            AFFIXTHEME.initialize.blog();
            AFFIXTHEME.initialize.circuitServicesResize();
            AFFIXTHEME.initialize.swiperSlider();
            AFFIXTHEME.initialize.countUp();
            AFFIXTHEME.initialize.countDown();
            AFFIXTHEME.initialize.sectionSwitch();
            AFFIXTHEME.initialize.portfolio();
            AFFIXTHEME.initialize.contactFrom();
            AFFIXTHEME.initialize.backToTop();
            AFFIXTHEME.initialize.handleMobileHeader();
        },

        /*========================================================*/
        /*=           Collection of snippet and tweaks           =*/
        /*========================================================*/

        general: function () {
            $('.edufix-grid-wrapper').EdufixGridLayout();

            //Popup Search
            $('#search-menu-wrapper').removeClass('toggled');

            $('#search-icon').on('click', function (e) {
                e.stopPropagation();
                $('#search-menu-wrapper').toggleClass('toggled');
                $("#popup-search").focus();
            });

            $('#search-menu-wrapper input').on('click', function (e) {
                e.stopPropagation();
            });

            $('#search-menu-wrapper, body').on('click', function () {
                $('#search-menu-wrapper').removeClass('toggled');
            });


            if ($('body').hasClass("admin-bar")) {
                $('body').addClass('header-position');
            }

            var $body = $('body');
            var $popup = $('.canvas-menu-wrapper');

            // $("#hamburger-btn").on('click', function (e) {
            //     var mask = '<div class="mask-overlay">';
            //     $(mask).hide().appendTo('body').fadeIn('fast');
            //     $popup.addClass('open');
            //     $(".hamburger-content").addClass('open');
            //     $body.addClass('page-popup-open');
            //     $("html").addClass("no-scroll sidebar-open").height(window.innerHeight + "px");
            // });

            $("#page-open-main-menu, #hamburger-btn").on('click', function (e) {
                e.preventDefault();
                var mask = '<div class="mask-overlay">';
                $(mask).hide().appendTo('body').fadeIn('fast');
                $popup.addClass('open');
                $(".tt-hamburger, .hamburger-content").addClass('active');
                $body.addClass('page-popup-open');
                $("html").addClass("no-scroll sidebar-open").height(window.innerHeight + "px");
            });

            $("#page-close-main-menu, .mask-overlay, .hamburger-close").on('click', function (e) {
                e.preventDefault();
                $('.mask-overlay').remove();
                $body.removeClass('page-popup-open');
                $popup.removeClass('open');
                $('.sub-menu, .sub-menu-wide').removeAttr('style');
                $("html").removeClass("no-scroll sidebar-open").height("auto");
                $(".tt-hamburger, .hamburger-content").removeClass('active');
                $('.sub-menu, .sub-menu-wide').removeAttr('style');
                $('.has-submenu .menu-link').removeClass('active');
            });


            var wow = new WOW({
                boxClass: 'wow',
                animateClass: 'animated',
                offset: 0,
                mobile: false,
                live: true,
                scrollContainer: null
            });
            wow.init();

            // $('.social_link_expand').on('click', function () {
                // $(this).parent().toggleClass('active');
            // });


            $("#js-contcheckbox").change(function () {
                if (this.checked) {
                    $('.yearly-price').css('display', 'none');
                    $('.monthly-price').css('display', 'block');
                    $('.afterinput').addClass('active');
                    $('.pricing-switch-wrap').removeClass('yearly');
                    $('.beforeinput').removeClass('active');


                } else {
                    $('.pricing-switch-wrap').addClass('yearly');
                    $('.yearly-price').css('display', 'block');
                    $('.monthly-price').css('display', 'none');
                    $('.afterinput').removeClass('active');
                    $('.beforeinput').addClass('active');
                }
            });


            if ($("#wpadminbar").length && $(window).width() < 768) {
                $("#wpadminbar").css({
                    position: "fixed",
                    top: "0"
                })
            }


            var blogContainer = $(".blog-masonry");

            blogContainer.masonry({
                itemSelector: '.post-item',
                percentPosition: true
            });

            /* Magnefic Popup */
            $('.video-popup').each(function () {
                $('.video-popup').magnificPopup({
                    type: 'iframe'
                });
            });

            if ($('.count-bar').length) {
                $('.count-bar').appear(function(){
                    var el = $(this);
                    var percent = el.data('percent');
                    $(el).css('width',percent).addClass('counted');
                },{accY: -50});
        
            }

        },

        circuitServicesResize: function () {
            if (jQuery('.at_circuit_services').length) {
                setTimeout(function () {
                    jQuery('.at_circuit_services').each(function () {
                        var $this = jQuery(this);
                        var wwidth = $this.width();
                        if (wwidth < 370) {
                            $this.removeClass('tablet_resp').addClass('mobile_resp');
                        } else if (wwidth < 460) {
                            $this.removeClass('mobile_resp').addClass('tablet_resp');
                        } else {
                            $this.removeClass('tablet_resp mobile_resp');
                        }
                    });
                }, 1);
            }
        },

        /*===========================================*/
        /*=           handle Mobile Header          =*/
        /*===========================================*/
        handleMobileHeader: function () {

            if (Dt.header && Dt.header.length) {

                if (Dt.isMobileMenu) {
                    Dt.header.addClass('mobile-header');
                    Dt.body.addClass('is-mobile-menu');
                    setTimeout(function () {
                        $('.main-nav').addClass('unhidden');
                    }, 300);
                } else {
                    Dt.header.removeClass('mobile-header');
                    Dt.body.removeClass('is-mobile-menu');
                    $('.main-nav').addClass('visible');
                }
            }
        },

        expertizeRoundCircle: function () {
            var rounderContainer = $('.circle-progress');
            if (rounderContainer.length) {
                rounderContainer.each(function () {
                    var Self = $(this);
                    var value = Self.data('value');
                    var size = Self.parent().width();
                    var color = Self.data('abg-color');
                    var bgcolor = Self.data('bg-color');
                    var height = Self.data('height');
    
                    Self.find('span').each(function () {
                        var expertCount = $(this);
                        expertCount.appear(function () {
                            expertCount.countTo({
                                from: 1,
                                to: value*100,
                                speed: 3000
                            });
                        });
    
                    });
                    Self.appear(function () {					
                        Self.circleProgress({
                            value: value,
                            size: height,
                            thickness: 15,
                            emptyFill: bgcolor,
                            animation: {
                                duration: 3000
                            },
                            fill: {
                                color: color
                            }
                        });
                    });
                });
            };
        },

        /*==========================================*/
        /*=           handle Fixed Header          =*/
        /*==========================================*/

        handleFixedHeader: function () {

            Dt.init();
            var fixed = Dt.headerFixed;

            if ($(document).scrollTop() > fixed.initialOffset) {

                if ((!Dt.isMobileMenu && fixed.enabled && !fixed.value) ||
                    (Dt.isMobileMenu && fixed.mobileEnabled && !fixed.mobileValue)) {

                    if (Dt.isMobileMenu) {
                        fixed.mobileValue = true;
                    } else {
                        fixed.value = true;
                    }

                    Dt.header.addClass('header-fixed no-transition');

                }

            } else if (fixed.value || fixed.mobileValue) {

                fixed.value = false;
                fixed.mobileValue = false;

                Dt.header.removeClass('header-fixed');

            }

            // Effect appearance
            if ($(document).scrollTop() > fixed.initialOffset + 50) {
                Dt.header.removeClass('no-transition').addClass('showed');
            } else {
                Dt.header.removeClass('showed').addClass('no-transition');
            }
        },

        /*===========================*/
        /*=           Blog          =*/
        /*===========================*/

        blog: function () {

            if ((typeof $.fn.imagesLoaded !== 'undefined') && (typeof $.fn.isotope !== 'undefined')) {

                var blogContainer = $(".saaspik-masonry");

                blogContainer.masonry({
                    itemSelector: '.grid-item',
                    percentPosition: true
                });
            }
        },

        /*==================================*/
        /*=           Progressbar          =*/
        /*==================================*/
        progressBar: function () {
            if ($('.skill-wrapper').length) {
                $('.skills').not('.active').each(function () {
                    if ($(window).scrollTop() >= $(this).offset().top - $(window).height() * 1) {
                        $(this).addClass('active');
                        $(this).find('.skill').each(function () {
                            var procent = $(this).attr('data-percent');
                            $(this).find('.active-line').css('width', procent + '%');
                        });
                    }
                });
            }
        },

        /*====================================*/
        /*=           Swiper Slider          =*/
        /*====================================*/

        swiperSlider: function () {
            $('#portfolio-testimonial').each(function () {
                var swiper = new Swiper('#portfolio-testimonial', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    speed: 800,
                    autoplay: {
                        delay: 5000,
                    },
                    navigation: {
                        nextEl: '.testi-button-next',
                        prevEl: '.testi-button-prev',
                    },
                });
            });

            $('.related-product').each(function () {
                var swiper = new Swiper('.related-product', {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loop: true,
                    speed: 800,
                    autoplay: {
                        delay: 2000,
                    },
                    navigation: {
                        nextEl: '.product-button-next',
                        prevEl: '.product-button-prev',
                    },
                });
            });

        },

        /*==============================*/
        /*=           Portfolio        =*/
        /*==============================*/

        portfolio: function () {
            if ((typeof $.fn.imagesLoaded !== 'undefined') && (typeof $.fn.isotope !== 'undefined')) {

                $(".at-portfolio-items").imagesLoaded(function () {
                    var container = $(".at-portfolio-items");

                    container.isotope({
                        itemSelector: '.at-portfolio-item',
                        // percentPosition: true,
                        // transitionDuration: '0.5s',

                        // columnWidth: '.grid-sizer',
                        layoutMode: 'masonry',

                    });

                    $('.at-isotope-filter a').on('click', function () {
                        $('.at-isotope-filter').find('.current').removeClass('current');
                        $(this).parent().addClass('current');

                        var selector = $(this).attr("data-filter");
                        container.isotope({
                            filter: selector
                        });

                        return false;
                    });

                    $(window).resize(function () {
                        container.isotope();
                        blogContainer.masonry();
                    });

                });

                var blogContainer = $(".saaspik-masonry");

                blogContainer.masonry({
                    itemSelector: '.grid-item',
                    percentPosition: true
                });

            }
        },

        /*=====================================*/
        /*=           Section Switch          =*/
        /*=====================================*/

        sectionSwitch: function () {
            $('.page-scroll, .site-header .menu li a').on('click', function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    if (target.length > 0) {

                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        $('html,body').animate({
                            scrollTop: target.offset().top - 130
                        }, 1000);
                        return false;
                    }
                }
            });
        },

        /*==============================*/
        /*=           Countup          =*/
        /*==============================*/

        countUp: function () {
            var options = {
                useEasing: true,
                useGrouping: true,
                separator: '',
                decimal: '.',
                prefix: '',
                suffix: ''
            };

            var counteEl = $('[data-counter]');

            if (counteEl) {
                counteEl.each(function () {
                    var val = $(this).data('counter');

                    var countup = new CountUp(this, 0, val, 0, 2.5, options);
                    $(this).appear(function () {
                        countup.start();
                    }, {
                        accX: 0,
                        accY: 0
                    })
                });
            }
        },

        /*================================*/
        /*=           Countdown          =*/
        /*================================*/

        countDown: function () {
            $('.countdown').each(function (index, value) {
                var count_year = $(this).attr("data-count-year");
                var count_month = $(this).attr("data-count-month");
                var count_day = $(this).attr("data-count-day");
                var count_date = count_year + '/' + count_month + '/' + count_day;
                $(this).countdown(count_date, function (event) {
                    $(this).html(
                        event.strftime('<div class="counting"><span class="minus">-</span><span class="CountdownContent">%D<span class="CountdownLabel">Days</span></span><span class="CountdownSeparator">:</span></div><div class="counting"><span class="CountdownContent">%H <span class="CountdownLabel">Hours</span></span><span class="CountdownSeparator">:</span></div><div class="counting"><span class="CountdownContent">%M <span class="CountdownLabel">Minutes</span></span><span class="CountdownSeparator">:</span></div><div class="counting"><span class="CountdownContent">%S <span class="CountdownLabel">Seconds</span></span></div>')
                        );
                });
            });
        },


        /*=================================*/
        /*=           Contact Form          =*/
        /*=================================*/

        contactFrom: function () {
            $('[data-edufix-form]').each(function () {
                var $this = $(this);
                $('.form-result', $this).css('display', 'none');

                $this.submit(function () {
                    $('button[type="submit"]', $this).addClass('clicked');
                    // Create a object and assign all fields name and value.
                    var values = {};

                    $('[name]', $this).each(function () {
                        var $this = $(this),
                        $name = $this.attr('name'),
                        $value = $this.val();
                        values[$name] = $value;
                    });

                    // Make Request
                    $.ajax({
                        url: $this.attr('action'),
                        type: 'POST',
                        data: values,
                        success: function success(data) {

                            if (data.error == true) {
                                $('.form-result', $this).addClass('alert-warning').removeClass('alert-success alert-danger').css('display', 'block');
                            } else {
                                $('.form-result', $this).addClass('alert-success').removeClass('alert-warning alert-danger').css('display', 'block');
                            }
                            $('.form-result > .content', $this).html(data.message);
                            $('button[type="submit"]', $this).removeClass('clicked');
                        },
                        error: function error() {
                            $('.form-result', $this).addClass('alert-danger').removeClass('alert-warning alert-success').css('display', 'block');
                            $('.form-result > .content', $this).html('Sorry, an error occurred.');
                            $('button[type="submit"]', $this).removeClass('clicked');
                        }
                    });
                    return false;
                });

            });
        },

        
        //Scroll back to top
        backToTop: function () {         
            var bttPath = document.querySelector('.btt-wrap path');
            var pathLength = bttPath.getTotalLength();
            bttPath.style.transition = bttPath.style.WebkitTransition = 'none';
            bttPath.style.strokeDasharray = pathLength + ' ' + pathLength;
            bttPath.style.strokeDashoffset = pathLength;
            bttPath.getBoundingClientRect();
            bttPath.style.transition = bttPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';		
            var updatebtt = function () {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var btt = pathLength - (scroll * pathLength / height);
                bttPath.style.strokeDashoffset = btt;
            }
            updatebtt();
            $(window).scroll(updatebtt);	
            var offset = 50;
            var duration = 550;
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > offset) {
                    $('.btt-wrap').addClass('active-btt');
                } else {
                    $('.btt-wrap').removeClass('active-btt');
                }
            });				
            $('.btt-wrap').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({scrollTop: 0}, duration);
                return false;
            })
        }

    };
    

    AFFIXTHEME.documentOnReady = {
        init: function () {
            AFFIXTHEME.initialize.init();
            var width = 100,
            perfData = window.performance.timing,
            EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
            time = parseInt((EstimatedTime / 1000) % 60) * 100;

            $(".loadbar-percent").animate({
                width: width + "%"
            }, time);


            var PercentageID = $("#percent"),
            start = 0,
            end = 100,
            durataion = time;
            animateValue(PercentageID, start, end, durataion);

            function animateValue(id, start, end, duration) {

                var range = end - start,
                current = start,
                increment = end > start ? 1 : -1,
                stepTime = Math.abs(Math.floor(duration / range)),
                obj = $(id);

                var timer = setInterval(function () {
                    current += increment;
                    $(obj).text(current + "%");
                    if (current == end) {
                        clearInterval(timer);
                    }
                }, stepTime);
            }

            setTimeout(function () {
                $('#preloader-wrapper').addClass('preloader_end');
            }, time);

            $(window).on('load', function () {
                $('#preloader-wrapper').addClass('preloader_end');
                $('#loadbar-percent').fadeOut(300);
                $('#percent').fadeOut(300);
            });
        },
    };

    AFFIXTHEME.documentOnLoad = {
        init: function () {
            Dt.init();
            AFFIXTHEME.initialize.handleMobileHeader();
            $("#preloader").fadeOut("slow");
        },
    };

    AFFIXTHEME.documentOnResize = {
        init: function () {
            if ($("#wpadminbar").length && $(window).width() < 768) {
                $("#wpadminbar").css({
                    position: "fixed",
                    top: "0"
                })
            }
            Dt.resize();
            AFFIXTHEME.initialize.handleMobileHeader();
            AFFIXTHEME.initialize.handleFixedHeader();
            AFFIXTHEME.initialize.circuitServicesResize();
        },
    };

    AFFIXTHEME.documentOnScroll = {
        init: function () {
            AFFIXTHEME.initialize.handleFixedHeader();
            AFFIXTHEME.initialize.progressBar();
        },
    };

    // Initialize Functions
    $(document).ready(AFFIXTHEME.documentOnReady.init);
    $(window).on('load', AFFIXTHEME.documentOnLoad.init);
    $(window).on('resize', AFFIXTHEME.documentOnResize.init);
    $(window).on('scroll', AFFIXTHEME.documentOnScroll.init);

})(jQuery);

