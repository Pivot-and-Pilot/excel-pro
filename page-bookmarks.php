<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    if ( !is_user_logged_in() ) {wp_redirect(site_url('my-account'));exit;}

    function bought_main_version($current_user, $id){
      if(get_field('main_version', $id)){
            return wc_customer_bought_product( $current_user->email, $current_user->ID, get_field('main_version', $id)->ID );
        } else {
            return wc_customer_bought_product( $current_user->email, $current_user->ID, $id );
        }
    }

    $productId = isset($_POST['productId']) ? $_POST['productId'] : null;
    if( !$productId ) {wp_send_json(array('error' => 'No bookmarks were found.'));}

    $current_user = wp_get_current_user();
    if(!bought_main_version($current_user, $productId)){wp_send_json(array('error' => 'You haven\'t purchased this product.'));}

    $bookmarks = get_user_meta($current_user->ID, 'bookmarks_' . $productId, true);

    $action = isset($_POST['action']) ? $_POST['action'] : null;

    if($action === 'SET'){

        if(count($bookmarks) < 15){

            $chapterIndex = isset($_POST['chapterIndex']) ? $_POST['chapterIndex'] : null;
            $startNodePath = isset($_POST['startNodePath']) ? $_POST['startNodePath'] : null;
            $startNodeOffset = isset($_POST['startNodeOffset']) ? $_POST['startNodeOffset'] : null;
            $endNodePath = isset($_POST['endNodePath']) ? $_POST['endNodePath'] : null;
            $endNodeOffset = isset($_POST['endNodeOffset']) ? $_POST['endNodeOffset'] : null;

            if($chapterIndex == null){wp_send_json(array('error' => 'Chapter index value is an unpermitted value.'));}
            if($chapterIndex == null){wp_send_json(array('error' => 'Start node path is an unpermitted value.'));}
            if($chapterIndex == null){wp_send_json(array('error' => 'Start node offset is an unpermitted value.'));}
            if($chapterIndex == null){wp_send_json(array('error' => 'End node path is an unpermitted value.'));}
            if($chapterIndex == null){wp_send_json(array('error' => 'End node offset is an unpermitted value.'));}

            $new_bookmark = array();

            $new_bookmark['chapterIndex'] = intval($chapterIndex);
            $new_bookmark['startNodePath'] = $startNodePath;
            $new_bookmark['startNodeOffset'] = intval($startNodeOffset);
            $new_bookmark['endNodePath'] = $endNodePath;
            $new_bookmark['endNodeOffset'] = intval($endNodeOffset);
            $new_bookmark['date'] = date('d/m/y');

            array_unshift($bookmarks, $new_bookmark);
            update_user_meta( $current_user->ID, 'bookmarks_' . $productId, $bookmarks);
            wp_send_json($bookmarks);exit;

        } else {

            wp_send_json(array('error' => 'You may not have more than 15 bookmarks.'));exit;

        }


    } else if ($action === 'DEL') {

        $delIndex = isset($_POST['delIndex']) ? $_POST['delIndex'] : null;

        if($delIndex !== null){

            unset($bookmarks[$delIndex]);
            $bookmarks = array_values($bookmarks);
            update_user_meta( $current_user->ID, 'bookmarks_' . $productId, $bookmarks);
            wp_send_json($bookmarks);
            exit;

        } else {

            wp_send_json(array('error' => 'Index is an unpermitted value.'));
            exit;

        }

    } else {

        wp_send_json($bookmarks);
        exit;

    }

?>