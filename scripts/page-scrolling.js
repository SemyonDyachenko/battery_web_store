$(window).scroll(function(){
    if ($(window).scrollTop() > 80) {
        $('.header').addClass('scroll');
        $('.container').css('position','inherit');
        $('#page-searcher').css('color','white');
    }
    else {
        $('.header').removeClass('scroll');
        $('.container').css('position','relative');
        $('#page-searcher').css('color','black');

    }
});