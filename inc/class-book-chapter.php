<?php

/**
 * Chapter
 *
 * The chapter object stores specific details on the chapter and functions to add bookmarks and stores
 * read/unread states
 *
 * @class       BookChapter
 * @version     1.0.0
 * @package     excelpro/inc
 * @category    Class
 * @author      Tim Lu
 */

class BookChapter {


    /**
     * Constructor for the chapter class. Loads chapter state from a product and chapter field name.
     */
    function __construct($id, $field_name){

        $this->book_id = $id;
        $this->is_completed = self::_is_chapter_completed($id, $field_name);
        $this->field_name = $field_name;
        $this->title = self::_return_friendly_title($field_name);

    }

    /**
     * Function to mark chapter as read in the user meta
     */
    public function mark_as_read(){

        update_user_meta(wp_get_current_user()->ID, 'book_' . $this->book_id . '_' . $this->field_name, true);

    }

    /**
     * Function to mark chapter as unread in the user meta
     */
    public function mark_as_unread(){

        update_user_meta(wp_get_current_user()->ID, 'book_' . $this->book_id . '_' . $this->field_name, false);

    }


    /**
     * Function to return if this chapter has been read or not by the user preferences
     * @param int $id Book ID
     * @param string $field_name Field Name
     * @return boolean
     */
    private function _is_chapter_completed($id, $field_name){

        $completed = get_user_meta(wp_get_current_user()->ID, 'book_' . $id . '_' . $field_name, true);

        // If user meta is not defined, set it to false.
        if($completed === ''){ 
            $completed = false;
            update_user_meta(wp_get_current_user()->ID, 'book_' . $id . '_' . $field_name, $completed, true);
        }

        return $completed;

    }

    /**
     * Function to return user-friendly field name
     * @param string $field_name Field Name
     * @return string
     */
    private function _return_friendly_title($field_name){
        $title = ucwords(str_replace('_', ' ', $field_name));
        return $title;
    }

}


?>