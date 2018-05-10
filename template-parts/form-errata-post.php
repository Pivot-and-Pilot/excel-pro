<?php

$args = array(
    'post_type'             => 'product',
    'post_status'           => 'publish'
);

$book_loop = new WP_Query($args);

$current_user = wp_get_current_user();

?>

<button class="hamburger state-active toggle-errata">
  <span></span>
  <span></span>
  <span></span>
</button>

<form id="form_errata" method="POST">
  <h3>Errata Form</h3>
  <h2>Personal Information</h2>
    <div class="container-inputs">
      <input name="FNAME" type="text" placeholder="first name" value="<?php echo $current_user->user_firstname ?>"/>
      <input name="LNAME" type="text" placeholder="last name" value="<?php echo $current_user->user_lastname ?>"/>
      <input name="EMAIL" type="email" placeholder="email*"/ value="<?php echo $current_user->user_email ?>">
      <input name="PHONE" type="text" placeholder="phone number"/>
    </div>
  <!-- <h2>Where did you find the mistake?</h2>
    <div class="container-dropdowns">
      <select id="#select_book" name="PRODUCT_ID">
          <option value="">Book</option>
        <?php while ( $book_loop->have_posts() ) : $book_loop->the_post(); ?>
          <option value="<?php the_ID(); ?>"><?php the_title() ?></option>
        <?php endwhile ?>
        <?php wp_reset_postdata(); ?> 
      </select>
      <select name="CHAPTER">
        <option value="">Chapter</option>
        <option value="0">Chapter 1</option>
        <option value="1">Chapter 2</option>
        <option value="2">Chapter 3</option>
        <option value="3">Chapter 4</option>
        <option value="4">Chapter 5</option>
        <option value="5">Chapter 6</option>
        <option value="6">Chapter 7</option>
        <option value="7">Chapter 8</option>
        <option value="8">Chapter 9</option>
        <option value="9">Chapter 10</option>
      </select>
      <select name="SECTION">
        <option value="">Section</option>
        <option value="1">Section 1</option>
        <option value="2">Section 2</option>
        <option value="3">Section 3</option>
        <option value="4">Section 4</option>
        <option value="5">Section 5</option>
      </select>
    </div> -->
    <h2>Tell us more about the mistake:</h2>
    <textarea name="COMMENT" placeholder="Please be as detailed as possible"></textarea>
    <button class="button-orange" data-text="Submit Form"><span>Submit Form</span></button>
</form>