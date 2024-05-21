$(document).ready(function (){
    $('header .header__burger-button').on('click', function(){
        $(this).hasClass('active') ? $(this).removeClass('active') : $(this).addClass('active');

        let emptyBlock = $('header .emerging-block');
        emptyBlock.hasClass('active') ? emptyBlock.removeClass('active') : emptyBlock.addClass('active');
        emptyBlock.hasClass('active') ? $('body').css('overflow', 'hidden') : $('body').css('overflow', 'auto');
    })

    $('header .additional-button').on('click', function () {
        let emptyBlock = $('header .emerging-block');
        emptyBlock.removeClass('active');
        $('body').css('overflow', 'auto');
        $('header .header__burger-button').removeClass('active');
    })

    CheckScroll();

    window.addEventListener('scroll', function () {
        CheckScroll();
    });

    function CheckScroll() {
        if ($(window).width() < 1023) {
            let scrollPosition = window.scrollY;
            let header = $('header');
            let mobileLogo = $('header .header__mobile-logo');
            if (scrollPosition > 0 || header.hasClass('other-page')) {
                header.addClass('start-scroll');
                mobileLogo.addClass('show');
            } else {
                header.removeClass('start-scroll');
                mobileLogo.removeClass('show');
            }
        }
    }
});