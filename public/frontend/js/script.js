var SLIDESHOW = (function() {
    // var slideGruop = function() {
    //     var swiper = new Swiper(".mySwiper", {
    //         slidesPerView: 2.5,
    //         spaceBetween: 30,
    //         loop: true,
    //         loopFillGroupWithBlank: true,
    //         breakpoints: {
    //             1025: {
    //                 slidesPerView: 2.5,
    //                 spaceBetween: 30,
    //             },
    //             1024: {
    //                 slidesPerView: 2.5,
    //                 spaceBetween: 30,
    //             },
    //             991: {
    //                 slidesPerView: 2.5,
    //                 spaceBetween: 30,
    //             },
    //             768: {
    //                 slidesPerView: 2.5,
    //                 spaceBetween: 15,
    //             },
    //             425: {
    //                 slidesPerView: 2,
    //                 spaceBetween: 10,
    //             },
    //             375: {
    //                 slidesPerView: 2,
    //                 spaceBetween: 10,
    //             },
    //             320: {
    //                 slidesPerView: 1,
    //                 spaceBetween: 10,
    //             },
    //         },
    //         pagination: {
    //             el: ".swiper-pagination",
    //             clickable: true,
    //         },
    //         navigation: {
    //             nextEl: ".swiper-button-next",
    //             prevEl: ".swiper-button-prev",
    //         },
    //         autoplay: {
    //             delay: 3000,
    //         },
    //     });
    // };
    var slideBanner = function() {
        var swiper_banner = new Swiper(".swiper-banner", {
            loop: true,

            pagination: {
                el: ".banner-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".banner-button-next",
                prevEl: ".banner-button-prev",
            },
            autoplay: {
                delay: 3000,
            },
        });
    };
    var slideCateHome = function() {
        var swiper_catehome = new Swiper(".list-cate-swiper", {
            //   loop: true,
            slidesPerView: 5,
            spaceBetween: 30,
            breakpoints: {
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
                1025: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                425: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                375: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
            },
            pagination: {
                el: ".swiper-cate-home",
                clickable: true,
            },
        });
    };
    var slideComment = function() {
        var swiper_comment = new Swiper(".swiper-user-comment", {
            //   loop: true,
            //   cssMode: true,
            navigation: {
                nextEl: ".comment-button-next",
                prevEl: ".comment-button-prev",
            },
            pagination: {
                el: ".comment-pagination",
                clickable: true,
            },
        });
    };
    var slideInstagram = function() {
        var swiper_instagram = new Swiper(".swiper-instagram", {
            //   loop: true,
            slidesPerView: 5,
            spaceBetween: 0,
            breakpoints: {
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
                1025: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                425: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                375: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
            },
            pagination: {
                el: ".instagram-pagination",
                clickable: true,
            },
        });
    };
    var slideBlogHome = function() {
        var swiper_blog = new Swiper(".slide_blog-home", {
            loop: true,
            slidesPerView: 3,
            spaceBetween: 30,
            breakpoints: {
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1025: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                991: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                425: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                375: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
            },
            pagination: {
                el: ".blog-home_pagination",
                clickable: true,
            },
        });
    };
    var slideUser = function() {
        var swiper_user = new Swiper(".swiper-user", {
            //   loop: true,
            slidesPerView: 4,
            spaceBetween: 0,

            pagination: {
                el: ".user-pagination",
                clickable: true,
            },
        });
    };
    var sliePageBlog = function() {
        var swiper_page_blog = new Swiper(".mySwiper_blog_slode", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".swiper-pagination_blog_slode",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
    };
    return {
        _: function() {
            slideCateHome();
            slideBanner();
            slideComment();
            slideInstagram();
            slideUser();
            slideBlogHome();
            sliePageBlog();
        },
    };
})();
var WEBS = (function() {
    var backTop = function() {
        var backTop = $(".back-to-top");
        $(window).scroll(function(event) {
            if ($(this).scrollTop() > 500) {
                backTop.show(200);
            } else {
                backTop.hide(200);
            }
        });
        backTop.click(function(event) {
            $("html,body").animate({ scrollTop: 0 }, 300);
        });
    };
    var scrollHeader = function() {
        if ($(".header").length > 0) {
            var header = $(".header").height();
            var height = $(this).scrollTop();
            $(window).scroll(function() {
                var header = $(".header").height();
                var height = $(this).scrollTop();
                if (height > header) {
                    $(".header").addClass("fixed");
                } else {
                    $(".header").removeClass("fixed");
                }
            });
            if (height > header) {
                $(".header").addClass("fixed");
            } else {
                $(".header").removeClass("fixed");
            }
        }
    };
    return {
        _: function() {
            backTop();
            scrollHeader();
        },
    };
})();
var MENU = (function() {
    var menu = function() {
        if ($(document).width() <= 991) {
            $(".menu").find("ul>li>ul").hide();
            $(".menu")
                .find("ul li")
                .each(function() {
                    if ($(this).find("ul>li").length > 0) {
                        $(this).prepend(
                            '<span class="show-menu__products"><i class="fa fa-angle-down"></i></span>'
                        );
                        $(this).addClass("active");
                    }
                });
        }
        $(".menu")
            .find("li span")
            .click(function(event) {
                var ul = $(this).nextAll("ul");
                if (ul.is(":hidden") === true) {
                    ul.slideDown(200);
                } else {
                    ul.slideUp(200);
                }
            });
    };
    var openMenuMobile = function() {
        if ($(".nav-menu").length > 0) {
            $(".show_menu").click(function() {
                $(".header-body").addClass("active");
                $("body").addClass("overflow-hidden");
                $(".nav-menu").toggleClass("nav_active");
                $(".menu_container").toggleClass("active");
                $(".nav-menu").toggleClass("col_active");
                $(".bg-menu").toggleClass("active");
                $(".bg-menu").addClass("smooth");
                $(".nav-menu").addClass("smooth");
                $(".header-body").addClass("smooth");
                $(".show_menu").addClass("d-none");

            });
        }
    };
    var closeMenuMobile = function() {
        if ($(".nav-menu").length > 0) {
            $(".bg-menu").click(function() {
                $("body").removeClass("overflow-hidden");
                $(".nav-menu").removeClass("nav_active");
                $(".menu_container").removeClass("active");
                $(".nav-menu").removeClass("col_active");
                $(".bg-menu").removeClass("active");
                $(".header-body").removeClass("active");
                $(".show_menu").removeClass("d-none");
            });
        }
    };
    var activeMenu = function() {
        var url = window.location.pathname;
        urlRegExp = new RegExp(url.replace(/\/$/, "") + "$");
        if (urlRegExp != "/$/") {
            $(".menu>ul>li>a").each(function() {
                if (urlRegExp.test(this.href.replace(/\/$/, ""))) {
                    $(this).addClass("active");
                    $(this).parents(".menu>ul>li").children("a").addClass("active");
                }
            });
        }
    };
    return {
        _: function() {
            activeMenu();
            menu();
            openMenuMobile();
            closeMenuMobile();
        },
    };
})();
var PRO = (function() {
    var getProperty = function(argument) {
        if ($(".btn_active").length > 0) {
            $(".btn_active").click(function(event) {
                event.preventDefault();

                if (!$(this).hasClass("active")) {
                    $(".btn_active.active").removeClass("active");
                    $(this).addClass("active");
                }

                var id = $(this).data("id");
                var href = $(this).attr("href");
                $.ajax({
                        url: href,
                        type: "GET",
                        data: { id: id },
                    })
                    .done(function(data) {
                        $(".list_data").html(data);
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
            });
        }
    };
    var getPropertyfsirt = function(argument) {
        if ($(".btn_active").length > 0) {
            $(".btn_active").first().addClass("active");
            var id = $(".nav-pills li").first().find(".btn_active").data("id");
            var href = $(".nav-pills li").first().find(".btn_active").attr("href");
            $.ajax({
                    url: href,
                    type: "GET",
                    data: { id: id },
                })
                .done(function(data) {
                    $(".list_data").html(data);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
        }
    };
    return {
        _: function() {
            getProperty();
            getPropertyfsirt();
        },
    };
})();
$(document).ready(function() {
    $.ajaxSetup({
        data: {
            csrf_tech5s_name: $('meta[name="csrf-token"]').attr("content"),
        },
    });
    success = function(json) {
        console.log(1);
        if (json.code == 200) {
            toastr.success(json.message);
            setTimeout(function() {
                window.location.reload();
            }, 800);
        } else {
            toastr.error(json.message);
        }
    };
    PRO._();
    MENU._();
    SLIDESHOW._();
    WEBS._();
    DETAIL._();
});
// map

var iframe =
    '<iframe src="' +
    $(".map").attr("data-map") +
    '" style="border:0;" allowfullscreen="" width="100%" class="bd" loading="lazy"></iframe>';
$(".map").html(iframe);
//



$('.mumber').each(function() {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 5000,
        easing: 'swing',
        step: function(now) {
            $(this).text(Math.ceil(now));
        }
    });
});