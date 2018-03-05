<?php

  if ( ! defined( 'ABSPATH' ) ) {
      exit; // Exit if accessed directly
  }

  if ( !is_user_logged_in() ) {wp_redirect(site_url('my-account'));exit;}

  function get_sections($productId, $chapter){
    $returnArray = array();
    foreach(range(1, MAX_SECTIONS) as $sectionIndex){
      if(get_field($chapter . '_section_' . $sectionIndex, $productId)){
        array_push($returnArray, get_field($chapter . '_section_' . $sectionIndex, $productId));
      }
    } 
    return $returnArray;
  }

  function bought_main_version($current_user, $id){
    if(get_field('main_version', $id)){
      return wc_customer_bought_product( $current_user->email, $current_user->ID, get_field('main_version', $id)->ID );
    } else {
      return wc_customer_bought_product( $current_user->email, $current_user->ID, $id );
    }
  }

  $productId = isset($_POST['PRODUCT_ID']) ? $_POST['PRODUCT_ID'] : null;
  if( !$productId ) {wp_send_json(array('error' => 'This book was not found.'));}

  $current_user = wp_get_current_user();
  if(!bought_main_version($current_user, $productId)){wp_send_json(array('error' => 'You haven\'t purchased this product.'));}

  $book_meta = array();

  foreach(AVAILABLE_CHAPTERS as $available_chapter){
    if(get_field($available_chapter, $productId)){

      array_push($book_meta, get_sections($productId, $available_chapter));
    }
  }

  wp_send_json($book_meta);
  

?>