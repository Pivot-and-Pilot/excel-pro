jQuery(document).ready(function($){

    (function playVideos(){
        let playButtons = $('.play_video');
        for (let i = 0; i < playButtons.length; i++){
            $(playButtons[i]).on('click', function(){
                if ($(this).attr('data-iframe-ref') === 'video_one'){
                    $('#video-1').css('opacity', '1');
                    $('#video-2').css('opacity', '0');
                    $('#video-1')[0].play();
                    $('#video-2')[0].pause();
                }
                if ($(this).attr('data-iframe-ref') === 'video_two'){
                    $('#video-1').css('opacity', '0');
                    $('#video-2').css('opacity', '1');
                    $('#video-2')[0].play();
                    $('#video-1')[0].pause();
                }
            })
        }
    })();

    (function redirectToCart(){
        $(window).load(function(){
            console.log(window.location.origin);
            if(window.location.href.indexOf(`${window.location.origin}/shop/?add-to-cart`) === 0){
                window.location.replace(`${window.location.origin}/cart`);
            }
        })
    })()
    
})