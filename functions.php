<?php
/**
 * excelpro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package excelpro
 */

function my_mce4_options($init) {
  $default_colours = '"000000", "Black",
                      "993300", "Burnt orange",
                      "333300", "Dark olive",
                      "003300", "Dark green",
                      "003366", "Dark azure",
                      "000080", "Navy Blue",
                      "333399", "Indigo",
                      "333333", "Very dark gray",
                      "800000", "Maroon",
                      "FF6600", "Orange",
                      "808000", "Olive",
                      "008000", "Green",
                      "008080", "Teal",
                      "0000FF", "Blue",
                      "666699", "Grayish blue",
                      "808080", "Gray",
                      "FF0000", "Red",
                      "FF9900", "Amber",
                      "99CC00", "Yellow green",
                      "339966", "Sea green",
                      "33CCCC", "Turquoise",
                      "3366FF", "Royal blue",
                      "800080", "Purple",
                      "999999", "Medium gray",
                      "FF00FF", "Magenta",
                      "FFCC00", "Gold",
                      "FFFF00", "Yellow",
                      "00FF00", "Lime",
                      "00FFFF", "Aqua",
                      "00CCFF", "Sky blue",
                      "993366", "Red violet",
                      "FFFFFF", "White",
                      "FF99CC", "Pink",
                      "FFCC99", "Peach",
                      "FFFF99", "Light yellow",
                      "CCFFCC", "Pale green",
                      "CCFFFF", "Pale cyan",
                      "99CCFF", "Light sky blue",
                      "CC99FF", "Plum"';

  $custom_colours =  '"800000", "File Name",
                      "800000", "File Name",
                      "009c38", "Excel Location",
                      "548dd4", "Keyboard/Mouse",
                      "6545e1", "Formula",
                      "949494", "Typed Data",
                      "f36e3f", "Procedure",
                      "ff0000", "Red"';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

  // enable 6th row for custom colours in grid
  $init['textcolor_rows'] = 6;

  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

/*Proceed to Checkout*/

define( 'AVAILABLE_CHAPTERS', 
  array(
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
  )
);

define( 'AVAILABLE_CHAPTERS_NAMES', 
  array(
    'Introduction & Table of Contents',
    'Chapter 1',
    'Chapter 2',
    'Chapter 3',
    'Chapter 4',
    'Chapter 5',
    'Chapter 6',
    'Chapter 7',
    'Chapter 8',
    'End Matters',
    'Chapter Ten'
  )
);

define( 'EXCELPRO_PRODUCT_ID', 25);
define( 'MAX_SECTIONS', 5 );
define( 'UNDER_CONSTRUCTION', false );

function excelpro_register_post_and_client_types(){
  // Add a custom user role

  add_role( 'teacher', __(

  'Teacher' ),

    array(

      'read' => true, // true allows this capability
      'edit_posts' => false, // Allows user to edit their own posts
      'edit_pages' => false, // Allows user to edit pages
      'edit_others_posts' => false, // Allows user to edit others posts not just their own
      'create_posts' => false, // Allows user to create new posts
      'manage_categories' => false, // Allows user to manage post categories
      'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
      'edit_themes' => false, // false denies this capability. User can’t edit your theme
      'install_plugins' => false, // User cant add new plugins
      'update_plugin' => false, // User can’t update any plugins
      'update_core' => false // user cant perform core updates

    )

  );

  // Add theme post types
  $labels = array(
    'name'          =>  'Chapters',
    'singular_name' =>  'Chapter',
    'add_new'       =>  _x('Add New Chapter', 'Chapter'),
    'add_new_item'  =>  'Add Chapter',
    'edit_item'     =>  'Edit Chapter',
    'new_item'      =>  'New Chapter',
    'view_item'     =>  'View Chapter',
    'search_items'  =>  'Search Chapters',
    'not_found'     =>  'No Chapters Found',
    'not_found_in_trash' => 'No Chapters found in Trash',
    'all_items'     =>  'View All Chapters',
    'archives'      =>  'Chapters',
    'insert_into_item'  =>  'Insert Into Chapter',
    'uploaded_to_this_item' => 'Uploaded to this Chapter',
    'menu_name'     =>  'Chapters',
    'name_admin_bar'=>  'Chapters'
  );

  register_post_type('chapters',
    array(
      'description' => 'Chapter for the online e-book.',
      'has_archive' => false,
      'labels'      => $labels,
      'menu_position' => -1,
      'public'      => true,
      'publicly_queryable' => true,
      'rewrite'     => array(
        'with_front'  => false,
        'slug'      => 'excelling-in-life'
        ),
      'supports'    => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        ),
      'show_ui'     => true
    )
  );
}

add_action( 'init' , 'excelpro_register_post_and_client_types');

remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 ); 
add_action('woocommerce_proceed_to_checkout', 'sm_woo_custom_checkout_button_text',20);

function sm_woo_custom_checkout_button_text() {
    $checkout_url = WC()->cart->get_checkout_url();
  ?>
       <a href="<?php echo $checkout_url; ?>"><button class="button-green" data-text="Proceed To Checkout"><span><?php  _e( 'Proceed To Checkout', 'woocommerce' ); ?></span></button></a> 
  <?php
}

remove_action( 'woocommerce_order_button_html', 'woocommerce_button_proceed_to_checkout', 20 ); 
add_action('woocommerce_order_button_html', 'sm_woo_custom_order_button_html',20);

function sm_woo_custom_order_button_html($order_button_text) {
    $checkout_url = WC()->cart->get_checkout_url();
  ?>
       <button class="button-green" name="woocommerce_checkout_place_order" id="place_order" value="Continue to payment" data-value="Place order" data-text="Continue to payment"><span>Continue to payment</span></button>
  <?php
}  


add_filter('woocommerce_style_smallscreen_breakpoint','woo_custom_breakpoint');

function woo_custom_breakpoint($px) {
  $px = '767px';
  return $px;
}

add_filter( 'woocommerce_checkout_login_message', 'excelpro_return_login_message' );
 
function excelpro_return_login_message($string) {
  $couponImageUrl = get_template_directory_uri() . '/img/nav-login-black.svg';
  return "<img src='{$couponImageUrl}'/>" . $string;
}

add_filter( 'woocommerce_checkout_coupon_message', 'excelpro_return_customer_message' );
 
function excelpro_return_customer_message($string) {
  $couponImageUrl = get_template_directory_uri() . '/img/educator-ticket-inverse.svg';
  return "<img src='{$couponImageUrl}'/>" . $string;
}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
  $fields['billing']['billing_first_name']['placeholder'] = "First Name*";
  $fields['billing']['billing_last_name']['placeholder'] = "Last Name*";
  $fields['billing']['billing_company']['placeholder'] = "Company";
  $fields['billing']['billing_city']['placeholder'] = "City*";
  $fields['billing']['billing_state']['placeholder'] = "Province";
  $fields['billing']['billing_postcode']['placeholder'] = "Postal Code*";
  $fields['billing']['billing_phone']['placeholder'] = "Phone number*";
  $fields['billing']['billing_email']['placeholder'] = "Email*";

  return $fields;

}

// Add custom user fields on WP user profiles
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
function my_show_extra_profile_fields( $user ) { ?>
	<h3>Extra profile information</h3>
	<table class="form-table">
    <tr>
			<th><label for="age">Age</label></th>
			<td>
				<select placeholder="Age" name="age" id="age" value="<?php echo esc_attr( get_the_author_meta( 'age', $user->ID ) ); ?>" class="regular-text">
          <option value="12-18" <?php if (get_the_author_meta( 'age', $user->ID) == '12-18' ) echo 'selected="selected"'; ?>>12-18</option>
          <option value="19-25" <?php if (get_the_author_meta( 'age', $user->ID) == '19-25' ) echo 'selected="selected"'; ?>>19-25</option>
          <option value="26-35" <?php if (get_the_author_meta( 'age', $user->ID) == '26-35' ) echo 'selected="selected"'; ?>>26-35</option>
          <option value="36-45" <?php if (get_the_author_meta( 'age', $user->ID) == '36-45' ) echo 'selected="selected"'; ?>>36-45</option>
          <option value="46-55" <?php if (get_the_author_meta( 'age', $user->ID) == '46-55' ) echo 'selected="selected"'; ?>>46-55</option>
          <option value="56-65" <?php if (get_the_author_meta( 'age', $user->ID) == '56-65' ) echo 'selected="selected"'; ?>>56-65</option>
          <option value="66-75" <?php if (get_the_author_meta( 'age', $user->ID) == '66-75' ) echo 'selected="selected"'; ?>>66-75</option>
          <option value="75 years or older" <?php if (get_the_author_meta( 'age', $user->ID) == '75 years or older' ) echo 'selected="selected"'; ?>>75 years or older</option>
          <option value="Not Specified" <?php if (get_the_author_meta( 'age', $user->ID) == 'Not Specified' ) echo 'selected="selected"'; ?>>Not Specified</option>
        </select>
			</td>
		</tr>
		<tr>
			<th><label for="occupation">Occupation</label></th>
			<td>
				<input type="text" name="occupation" id="occupation" value="<?php echo esc_attr( get_the_author_meta( 'occupation', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
    <tr>
			<th><label for="gender">Gender</label></th>
			<td>
				<select name="gender" id="gender" value="<?php echo esc_attr( get_the_author_meta( 'gender', $user->ID ) ); ?>" class="regular-text">
          <option value="Male" <?php if (get_the_author_meta( 'gender', $user->ID) == 'Male' ) echo 'selected="selected"'; ?>>Male</option>

          <option value="Female" <?php if (get_the_author_meta( 'gender', $user->ID) == 'Female' ) echo 'selected="selected"'; ?>>Female</option>

          <option value="Other" <?php if (get_the_author_meta( 'gender', $user->ID) == 'Other' ) echo 'selected="selected"'; ?>>Other</option>

          <option value="Not specified" <?php if (get_the_author_meta( 'gender', $user->ID) == 'Not specified' ) echo 'selected="selected"'; ?>>Not specified</option>
        </select>
			</td>
		</tr>
	</table>
<?php }

// Add custom woocommerce fields for registration
function wooc_extra_register_fields() {?>
  <?php 
    wp_enqueue_script('wc-country-select');
    woocommerce_form_field('billing_country', array(
      'type'        => 'country',
      'class'       => array('chzn-drop'),
      'label'       => __('Country'),
      'placeholder' => __('Choose your country.'),
      'required'    => true,
      'clear'       => true
      // 'default'     => 'CA'
    ));
  ?>
  <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_age"><?php _e( 'Age', 'woocommerce' ); ?> <span class="required">*</span></label>
    <select class="" placeholder="Age" name="age" id="reg_age" value="<?php echo ( ! empty( $_POST['age'] ) ) ? esc_attr( $_POST['age'] ) : ''; ?>">
      <option value="12-18">12-18</option>
      <option value="19-25">19-25</option>
      <option value="26-35">26-35</option>
      <option value="36-45">36-45</option>
      <option value="46-55">46-55</option>
      <option value="56-65">56-65</option>
      <option value="66-75">66-75</option>
      <option value="75 years or older">75 years or older</option>
      <option value="Not Specified">Not Specified</option>
    </select>
  </p>
  <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_occupation"><?php _e( 'Occupation', 'woocommerce' ); ?>
       <!-- <span class="required">*</span> -->
       </label>
    <input placeholder="Occupation" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="occupation" id="reg_occupation" value="<?php echo ( ! empty( $_POST['occupation'] ) ) ? esc_attr( $_POST['occupation'] ) : ''; ?>"/>
  </p>
  <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_gender"><?php _e( 'Gender', 'woocommerce' ); ?></label>
    <select name="gender" id="reg_gender" value="<?php echo ( ! empty( $_POST['gender'] ) ) ? esc_attr( $_POST['gender'] ) : ''; ?>">
      <option value="Male" <?php selected('Male', get_user_meta($user->ID, 'gender', true)); ?>>Male</option>
      <option value="Female" <?php selected('Female', get_user_meta($user->ID, 'gender', true)); ?>>Female</option>
      <option value="Other" <?php selected('Other', get_user_meta($user->ID, 'gender', true)); ?>>Other</option>
      <option value="Not specified" <?php selected('Not specified', get_user_meta($user->ID, 'gender', true)); ?>>Not specified</option>
    </select>
  </p>
  <?php
}
add_action( 'woocommerce_register_form', 'wooc_extra_register_fields');

// Validate woocommerce fields in registration
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
  if ( isset( $_POST['billing_country'] ) && empty( $_POST['billing_country'] ) ) {
    $validation_errors->add( 'billing_country_error', __( '<strong>Error</strong>: Please choose a country.', 'woocommerce') );
  }
  if ( isset( $_POST['age'] ) && empty( $_POST['age'] ) ) {
    $validation_errors->add( 'age_error', __( '<strong>Error</strong>: Please enter your age range.', 'woocommerce') );
  }

  // check if occupation if empty
  // if ( isset( $_POST['occupation'] ) && empty( $_POST['occupation'] ) ) {
  //   $validation_errors->add( 'occupation_error', __( '<strong>Error</strong>: Please enter your occupation.', 'woocommerce') );
  // }
  return $validation_errors;  
}
add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3);

// Save custom woocommerce fields in registration to WP user profile
function wooc_save_extra_register_fields( $customer_id ) {
  if ( isset( $_POST['billing_country']) ) {
    update_user_meta( $customer_id, 'billing_country', sanitize_text_field( $_POST['billing_country'] ));
  }
  if ( isset( $_POST['age']) ) {
    update_user_meta( $customer_id, 'age', sanitize_text_field( $_POST['age'] ));
  }
  if ( isset( $_POST['occupation']) ) {
    update_user_meta( $customer_id, 'occupation', sanitize_text_field( $_POST['occupation'] ));
  }
  if ( isset( $_POST['gender']) ) {
    update_user_meta( $customer_id, 'gender', sanitize_text_field( $_POST['gender'] ));
  }
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields');

if ( ! function_exists( 'excelpro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function excelpro_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on excelpro, use a find and replace
	 * to change 'excelpro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'excelpro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'excelpro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'excelpro_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'excelpro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function excelpro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'excelpro_content_width', 640 );
}
add_action( 'after_setup_theme', 'excelpro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function excelpro_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'excelpro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'excelpro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'excelpro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function excelpro_scripts() {
	wp_enqueue_style( 'excelpro-style', get_stylesheet_uri() );

  wp_enqueue_style('excelpro-woocommerce-overrides', get_template_directory_uri() . '/woocommerce-overrides.css');

	wp_enqueue_style('excelpro-slick', get_template_directory_uri() . '/js/slick/slick.css', true );

  wp_enqueue_style( 'excelpro-style-custom', get_template_directory_uri() . '/style-custom.css' );

  // book contents page
  wp_enqueue_style( 'excelpro-style-book-contents-page', get_template_directory_uri() . '/book-contents.css' );
  
  wp_enqueue_script('excelpro-checkout', get_template_directory_uri() . '/js/checkout.js', array(), null, true);

  if(is_singular('chapters')){

    wp_enqueue_style( 'excelpro-style-reader', get_template_directory_uri() . '/style-reader.css' );

  }

  if(is_page('educator-packages')){

    wp_enqueue_script('excelpro-educator-packages', get_template_directory_uri() . '/js/educator-packages.js', array(), null, true);

  }

  if(is_page('errata')){
    
    wp_enqueue_script('excelpro-errata', get_template_directory_uri() . '/js/errata.js', array(), null, true);

  }

  if(is_page('my-account')){

    wp_enqueue_script('excelpro-my-account', get_template_directory_uri() . '/js/my-account.js', array(), null, true);

  }

  // if(is_archive('product')){
    
    wp_enqueue_script('excelpro-shop', get_template_directory_uri() . '/js/shop.js', array(), null, true);

  // }

  if(is_page('testimonials')){

    wp_enqueue_script('excelpro-testimonials', get_template_directory_uri() . '/js/testimonials.js', array(), null, true);

  }

  if(is_page('working-files')){

    wp_enqueue_script('excelpro-working-files', get_template_directory_uri() . '/js/working-files.js', array(), null, true);

  }

	wp_enqueue_script('excelpro-slickjs', get_template_directory_uri() . '/js/slick/slick.js', array(), null, true);

	wp_enqueue_script('excelpro-index', get_template_directory_uri() . '/js/index.js', array(), null, true);

	wp_enqueue_script( 'excelpro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'excelpro-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	if (is_front_page()){
		wp_enqueue_script('excelpro-front-page', get_template_directory_uri() . '/js/front-page.js', array(), null, true);		
	}
}
add_action( 'wp_enqueue_scripts', 'excelpro_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Book Controller Functions.
 */
require get_template_directory() . '/inc/class-book-controller.php';

// function admin_bar(){

//   if(is_user_logged_in()){
//     add_filter( 'show_admin_bar', '__return_true' , 1000 );
//   }
// }
// add_action('init', 'admin_bar' );

add_theme_support( 'woocommerce' );