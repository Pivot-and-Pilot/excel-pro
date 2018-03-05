jQuery(document).ready(function($) {

  console.log('worksheets loaded');

  $('.chapter-entry').eq(0).addClass('state-active');

  $('.chapter-entry').on('click', function(){

    $('.chapter-entry').removeClass('state-active');
    $(this).addClass('state-active');

  });

});