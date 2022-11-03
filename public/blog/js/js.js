$('.nav__item--has-sub').hover(function (e) {
    var sh = $(this).find('.nav__sub').prop('scrollHeight');
    $(this).find('.nav__sub').css({'height': sh + 'px', 'transition': 'all 200ms ease'});
}, function () {
    sh = $(this).find('.nav__sub').prop('scrollHeight');
    $(this).find('.nav__sub').css({'height': 0, 'transition': 'all 200ms ease'});
})


$(".c-header__button-search").on("click", function () {
    $(this).toggleClass("c-header__icons--is-active");
    $('.c-search').toggleClass("c-search--is-active");
})
$('.c-header__button-nav').on('click', function () {
    $(this).toggleClass("c-header__icons--is-active");
    $('.nav').toggleClass("nav--is-acitve");
    $('.overlay').toggleClass("overlay--is-acitve");
})
$(window).scroll(function () {
    if ($(this).scrollTop() > 150) {
        $(".nav").addClass("nav--sticky");
        $('.scroll-top').fadeIn()
    }else{
        $(".nav").removeClass("nav--sticky")
        $('.scroll-top').fadeOut()
    }
})

$(document).ready(function(){
    $(".scroll-top").on("click", function () {
        $("html,body").animate({
           'scrollTop': 0
        }, 800);
    })
    $('.btn--comments-reply[href^="#"]').on('click',function (e) {
        e.preventDefault();
        var target = this.hash;
        var $target = $(target);
        $('html, body').animate({
            'scrollTop': $target.offset().top -100
        }, 900, 'swing', function () {
            // window.location.hash = target;
        });
    });
});
