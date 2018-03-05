<?php

    /**
    * DEPRECATED
     **/

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    if ( !is_user_logged_in() ) {wp_redirect(site_url('my-account'));exit;}

    $id = isset($_POST['id']) ? intval($_POST['id']) : null;

    $action = isset($_POST['action']) ? $_POST['action'] : null;
    $action_data = isset($_POST['action_data']) ? $_POST['action_data'] : null;

    if($id !== null){

        $bookController = new BookController($id);

        if($bookController->can_access_book){

            switch($action){
                case 'DEL_BOOKMARK':{
                    $bookController->delete_bookmark($action_data);
                    break;
                }
                case 'SET_BOOKMARK':{
                    $bookController->add_bookmark();
                    break;
                }
                case 'GET_BOOKMARKS':{
                    $bookController->get_bookmarks();
                    break;
                }
                case 'MARK_LAST_READ':{
                    $bookController->mark_last_chapter_read($action_data);
                    break;
                }
                case 'MARK_READ':{
                    $bookController->mark_chapter_read($action_data);
                    break;
                }
                case 'MARK_UNREAD':{
                    $bookController->mark_chapter_unread($action_data);
                    break;
                }

            }

            wp_send_json(array('id'=>$id, 'action'=>$action, 'action_data'=>$action_data));

        }

    }

?>