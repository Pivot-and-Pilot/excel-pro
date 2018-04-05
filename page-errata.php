<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package excelpro
 */

if ( !is_user_logged_in() ) {wp_redirect(site_url('my-account'));exit;}

function create_comment($current_user){

    $fName = isset($_POST['FNAME']) ? $_POST['FNAME'] : null;
    $lName = isset($_POST['LNAME']) ? $_POST['LNAME'] : null;
    $email = isset($_POST['EMAIL']) ? $_POST['EMAIL'] : null;
    $phone = isset($_POST['PHONE']) ? $_POST['PHONE'] : null;
    $comment = isset($_POST['COMMENT']) ? $_POST['COMMENT'] : null;

    $productId = isset($_POST['PRODUCT_ID']) ? $_POST['PRODUCT_ID'] : null;
    $chapter = isset($_POST['CHAPTER']) ? $_POST['CHAPTER'] : null;
    $section = isset($_POST['SECTION']) ? $_POST['SECTION'] : null;

    // add '!$fName || !$lName || !is_string($fName) || !is_string($lName) ||' to the if statement to require first name and last name
    if( !$email || !is_string($email)) return false;
    if($productId === null || $chapter === null || $section === null || $comment === null || $comment === "") return false;

    $productId = intval($productId);
    $chapter = intval($chapter);
    $section = intval($section);

    if(!wc_get_product($productId)) return false;
    if(!get_field(AVAILABLE_CHAPTERS[$chapter], $productId)) return false;
    if(!get_field(AVAILABLE_CHAPTERS[$chapter] . '_section_' . $section, $productId)) return false;

    $commentdata = array(
        'comment_approved' => 0,
        'comment_post_ID' => $productId, // to which post the comment will show up
        'comment_author' => $fName . " " . $lName, //fixed value - can be dynamic 
        'comment_author_email' => $email, //fixed value - can be dynamic 
        'comment_author_url' => 'http://excelpro.com', //fixed value - can be dynamic 
        'comment_content' => $comment, //fixed value - can be dynamic 
        'comment_type' => 'errata', //empty for regular comments, 'pingback' for pingbacks, 'trackback' for trackbacks
        'comment_parent' => 0, //0 if it's not a reply to another comment; if it's a reply, mention the parent comment ID here
        'user_id' => $current_user->ID, //passing current user ID or any predefined as per the demand
    );

    //Insert new comment and get the comment ID
    $comment_id = null;

    // wp_insert_comment($commentdata);

    try {

        $comment_id = wp_new_comment( $commentdata, true );
        wp_new_comment( $commentdata, true );
        add_comment_meta( $comment_id, 'CHAPTER', $chapter );
        add_comment_meta( $comment_id, 'SECTION', $section );

    } catch (Exception $e) {
        
        return false;

    }

    return $comment_id;

}

get_header(); ?>

  <div id="primary" class="content-area">

    <main id="main" class="site-main">

      <section class="section-first section-orange">

        <div class="max-width-wrapper">

          <article class="article-errata article-errata-alternate">

            <img class="img-icon" src="<?php echo get_template_directory_uri() . '/img/nav-errata-inverse.svg' ?>"/>
            
            <h3>In the unlikely event you find a mistake...</h3>
            
            <p>Before sending us your comments, check if the mistake has been submitted in the past.<br><i>Scroll down to find previous submissions</i></p>

          </article>

        </div>

      </section>

      <section class="section-errata">

        <div class="max-width-wrapper">

            <div class="container-errata">
            
                <?php get_template_part('template-parts/form', 'errata-get'); ?>

            </div>

        </div>

        <footer id="footer-errata" class="footer-fixed">
          
            <p class="p-caption">I have checked the errata and still want to submit a comment:</p>

            <button class="button-orange toggle-errata" data-text="Open Errata Form"><span>Submit an Error</span></button>

        </footer>

      </section>

      <section id="section-errata">

        <div class="max-width-wrapper">

          <?php get_template_part('template-parts/form', 'errata-post'); ?>

        </div>

      </section>

    </main><!-- #main -->
    
  </div><!-- #primary -->

<?php
get_footer();
