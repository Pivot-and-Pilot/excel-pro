jQuery(document).ready(function($){

  (function addHiddenCountryAndState(){
    $('body').on('click', function(){
      $('.select2-results__option').each(function(){
        $(this).attr('aria-selected', 'false');
      })
    })
  })();

})