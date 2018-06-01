jQuery(document).ready(function($) {
  (function addHiddenCountryAndState() {
    $(".woocommerce-input-wrapper").on("click", function() {
      $(".select2-results__option").each(function() {
        $(this).attr("aria-selected", "false");
      });
    });
  })();
});
