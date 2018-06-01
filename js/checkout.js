jQuery(document).ready(function($) {
  (function addHiddenCountryAndState() {
    $("#select2-billing_country-container").on("click", function() {
      $(".select2-results__option").each(function() {
        $(this).attr("aria-selected", "false");
      });
    });
    $(".select2-selection__arrow").on("click", function() {
      $(".select2-results__option").each(function() {
        $(this).attr("aria-selected", "false");
      });
    });
  })();
});
