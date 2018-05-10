<?php

require get_template_directory() . '/inc/class-book-chapter.php';

/**
 * Book controller
 *
 * The book controller initializes the book from the WooCommerce product and has HTTP API methods which store user
 * preferences, chapters read, bookmarks, last chapter read, etc.
 *
 * @class       BookController
 * @version     1.0.0
 * @package     excelpro/inc
 * @category    Class
 * @author      Tim Lu
 */

class BookController {

    /** @const array Lists the available field names for chapters **/
    const CHAPTER_FIELD_NAMES = array(
        'chapter_zero',
        'chapter_one',
        'chapter_two',
        'chapter_three',
        'chapter_four',
        'chapter_five',
        'chapter_six',
        'chapter_seven',
        'chapter_eight',
        'chapter_nine',
        'chapter_ten'
    );



    /**
     * Constructor for the book controller class. Loads available chapters and user preferences.
     */
    function __construct($id){

        $this->id = $id;

        $this->can_access_book = self::_can_access_book($id);

        $this->bookmarks = self::get_bookmarks($id);
        $this->chapters = self::_return_available_chapters($id);
        $this->last_read_chapter = self::_return_last_read_chapter($id);

    }



    /**
     * Function to add a bookmark to the current list of bookmarks
     *
     * @param string $field_name
     *
     */
    public function add_bookmark(){

        if($this->can_access_book){

            $bookmarks = $this->get_bookmarks($this->id);

            $chapterIndex = isset($_POST['chapterIndex']) ? $_POST['chapterIndex'] : null;
            $startNodePath = isset($_POST['startNodePath']) ? $_POST['startNodePath'] : null;
            $startNodeOffset = isset($_POST['startNodeOffset']) ? $_POST['startNodeOffset'] : null;
            $endNodePath = isset($_POST['endNodePath']) ? $_POST['endNodePath'] : null;
            $endNodeOffset = isset($_POST['endNodeOffset']) ? $_POST['endNodeOffset'] : null;

            if($chapterIndex === null){return false;}
            if($startNodePath === null){return false;}
            if($startNodeOffset === null){return false;}
            if($endNodePath === null){return false;}
            if($endNodeOffset === null){return false;}

            $new_bookmark = array();

            $new_bookmark['chapterIndex'] = intval($chapterIndex);
            $new_bookmark['startNodePath'] = $startNodePath;
            $new_bookmark['startNodeOffset'] = intval($startNodeOffset);
            $new_bookmark['endNodePath'] = $endNodePath;
            $new_bookmark['endNodeOffset'] = intval($endNodeOffset);
            $new_bookmark['date'] = date('d/m/y');

            array_unshift($bookmarks, $new_bookmark);

            update_user_meta( wp_get_current_user()->ID, 'book_' . $this->id . '_bookmarks', $bookmarks);

            return true;

        }

        return false;

    }


    /**
     * Function to delete a bookmark from an array of bookmarks
     *
     * @param int $index
     *
     */
    public function delete_bookmark($delIndex){

        if($this->can_access_book){

            $bookmarks = $this->get_bookmarks($this->id);
            unset($bookmarks[$delIndex]);
            $bookmarks = array_values($bookmarks);

            update_user_meta( wp_get_current_user()->ID, 'book_' . $this->id . '_bookmarks', $bookmarks);
            return true;

        }

        return false;

    }



    /**
     * Function to get an array of bookmarks from the book id
     *
     * @param int $id
     *
     */
    public function get_bookmarks($id){

        if($this->can_access_book){

            $bookmarks = get_user_meta(wp_get_current_user()->ID, 'book_' . $id . '_bookmarks', true);

            if($bookmarks === ''){

                $bookmarks = array();

                update_user_meta(wp_get_current_user()->ID, 'book_' . $id . '_bookmarks', $bookmarks);            

            }

            return $bookmarks;

        }

    }



    /**
     * Function to mark a chapter as read through it's field name, depending on permissions
     *
     * @param string $field_name
     *
     */
    public function mark_chapter_read($field_name){

        if($this->can_access_book && $this->chapters[$field_name]){

            $this->chapters[$field_name]->mark_as_read();

        }

    }



    /**
     * Function to mark a chapter as unread through it's field name, depending on permissions
     *
     * @param string $field_name
     *
     */
    public function mark_chapter_unread($field_name){

        if($this->can_access_book && $this->chapters[$field_name]){

            $this->chapters[$field_name]->mark_as_unread();

        }

    }



    /**
     * Function to mark the last chapter read
     *
     * @param string $field_name
     *
     */
    public function mark_last_chapter_read($field_name){

        if($this->can_access_book && $this->chapters[$field_name]){

            update_user_meta(wp_get_current_user()->ID, 'book_' . $this->id . '_last_read_chapter', $field_name);

        }

    }



    /**
     * Function to return if the current user can initialize book and use its functions
     *
     * @param int $id
     * @return boolean
     *
     */

    private function _can_access_book($id){

        $can_access_book = false;

        if(in_array('administrator', wp_get_current_user()->roles)) {

            $can_access_book = true;

        } else if(get_field('main_version', $id)){

            $can_access_book = wc_customer_bought_product( wp_get_current_user()->email, wp_get_current_user()->ID, get_field('main_version', $id)->ID );

        } else {

            $can_access_book = wc_customer_bought_product( wp_get_current_user()->email, wp_get_current_user()->ID, $id );
        
        }

        return $can_access_book;

        
    }



    /**
     * Function to return an array of available chapters field anmes upon class construction
     *
     * @param int $id
     * @return array
     *
     */

    private function _return_available_chapters($id){

        $array = array();

        foreach(self::CHAPTER_FIELD_NAMES as $chapter_field_name){

            if(get_field($chapter_field_name, $id)){

                $array[$chapter_field_name] = new BookChapter($id, $chapter_field_name);

            }

        }

        return $array;

    }



    /**
     * Function to return the field name of the last read chapter that is stored in user meta
     *
     * @param int $id
     * @return string
     *
     */

    private function _return_last_read_chapter($id){

        $last_read_chapter = get_user_meta(wp_get_current_user()->ID, 'book_' . $id . '_last_read_chapter', true);

        // If user meta is not defined, set last read chapter by default to chapter one.
        if($last_read_chapter === ''){ 
            $last_read_chapter = 'chapter_zero';
            update_user_meta(wp_get_current_user()->ID, 'book_' . $id . '_last_read_chapter', $last_read_chapter, true);
        }

        return $last_read_chapter;

    }

}

?>