jQuery(document).ready(function($){

    (function playVideos(){
        let playButtons = $('.play_video');
        for (let i = 0; i < playButtons.length; i++){
            $(playButtons[i]).on('click', function(){
                if ($(this).attr('data-iframe-ref') === 'video_one'){
                    $('#video-1').css('opacity', '1');
                    $('#video-2').css('opacity', '0');
                    $('#video-3').css('opacity', '0');
                    $('#video_player').css('background-image', 'url(../wp-content/themes/excelpro-1.1/img/placeholder_laptop.png)')
                    $('#video-1')[0].play();
                    $('#video-2')[0].pause();
                    $('#video-3')[0].pause();
                    $('.picture-laptop-alternate > .figure-price').css('right', 'unset');
                }
                if ($(this).attr('data-iframe-ref') === 'video_two'){
                    $('#video-1').css('opacity', '0');
                    $('#video-2').css('opacity', '1');
                    $('#video-3').css('opacity', '0');
                    $('#video_player').css('background-image', 'url(../wp-content/themes/excelpro-1.1/img/placeholder_laptop.png)')
                    $('#video-2')[0].play();
                    $('#video-1')[0].pause();
                    $('#video-3')[0].pause();
                    $('.picture-laptop-alternate > .figure-price').css('right', 'unset');
                }
                if ($(this).attr('data-iframe-ref') === 'video_three'){
                    $('#video-1').css('opacity', '0');
                    $('#video-2').css('opacity', '0');
                    $('#video-3').css('opacity', '1');
                    $('#video_player').css('background-image', 'url(../wp-content/themes/excelpro-1.1/img/placeholder_phone.png)')
                    $('#video-2')[0].pause();
                    $('#video-1')[0].pause();
                    $('#video-3')[0].play();
                    $('.picture-laptop-alternate > .figure-price').css('right', '160px');
                }
            })
        }
    })();

    (function redirectToCart(){
        $(window).load(function(){
            if(window.location.href.indexOf(`${window.location.origin}/shop/?add-to-cart`) === 0){
                window.location.replace(`${window.location.origin}/cart`);
            }
        })
    })()
    
})