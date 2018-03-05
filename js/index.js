jQuery(document).ready(function($) {

$('.menu-toggle').on('click', function(){
  $('#primary-menu').toggleClass('state-active');
  $('#masthead').toggleClass('state-active');
});

$('.slider').slick({
  adaptiveHeight: true,
  arrows: false,
  centerMode: true,
  centerPadding: '11.25px',
  infinite: true,
  initialSlide: 1,
  mobileFirst: true,
  pauseOnFocus: false,
  pauseOnHover: false,
  responsive: [
  {
    breakpoint: 767,
    settings: {
      adaptiveHeight: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 5000,
      centerMode: false,
      centerPadding: 0,
      cssEase: 'linear',
      dots: false,
      draggable: false,
      fade: true,
      infinite: true,
      pauseOnFocus: false,
      pauseOnHover: false
    }
  }]
});

$(window).on('load', function(){
  setTimeout(function(){
    $('#masthead').addClass('js-loaded');
    $('#loader-table').addClass('state-loaded');
    $('#loader').addClass('state-loaded');

      setTimeout(function(){
        $('#loader').remove();
      }, 5000)

  }, 1500);
});

});

(function(){


    const buttonAccount = document.querySelector('.login');

    buttonAccount.addEventListener('mouseenter', function(){

        this.classList.add('state-active');
        this.timeoutFunction = null;

    });

    buttonAccount.addEventListener('mouseleave', function(){

        this.classList.add('state-active');
        this.timeoutFunction = setTimeout(function(){
            this.classList.remove('state-active');
        }.bind(this), 1000);

    });


    var last_known_scroll_position = 0;
    var ticking = false;

    const masthead = document.getElementById('masthead');

    window.addEventListener('scroll', function(e) {

        if (!ticking) {

            window.requestAnimationFrame(function() {

                toggleMasthead(window.scrollY);
                ticking = false;

            });

        }

      ticking = true;

    });


    function toggleMasthead(scroll_pos) {
        // Fire downscroll logic for masthead.
        if(scroll_pos > last_known_scroll_position){

            if(scroll_pos > Math.floor(masthead.clientHeight / 3)){

                masthead.classList.add('state-hidden');
                masthead.classList.add('state-background-active');

            }

        // Fire upscroll logic for masthead.
        } else {

            masthead.classList.remove('state-hidden');

            if(scroll_pos < Math.floor(masthead.clientHeight / 3)){

                masthead.classList.remove('state-background-active');

            }

        }

        last_known_scroll_position = window.scrollY;

    }

})();