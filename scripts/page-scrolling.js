$(window).scroll(function(){
    if ($(window).scrollTop() > 0) {
        $('.header').addClass('scroll');
        $('.container').css('position','inherit');
        $('#page-searcher').css('color','white');
        $('.setting').css('position','inherit');
    }
    else {
        $('.header').removeClass('scroll');
        $('.container').css('position','relative');
        $('#page-searcher').css('color','white');
        $('.setting').css('position','relative');

    }
});

