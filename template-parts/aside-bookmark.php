<?php
/**
 * Template part for displaying bookmarks on reader page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package excelpro
 */
?>

<?php 

  $current_user = wp_get_current_user();
  $bookmarks = get_user_meta($current_user->ID, 'bookmarks'); 

?>

<aside id="bookmark_list">

  <div class="bookmark-container">

    <h2><img class="img-icon-small" src="<?php echo get_template_directory_uri() . '/img/icon-bookmark.svg' ?>"/>Bookmarks</h2>
    <input id="bookmark_search" class="js-load" type="text"/>

    <div class="no-bookmarks state-hidden">
      <noscript><p class="p-crimson"><i>Please Enable Javascript To Use Bookmarks</i></p></noscript>
      <p class="p-crimson"><i id="bookmark_message">You Have No Bookmarks</i></p>
      <p class="p-crimson">Using your mouse, highlight the text that you would like to add into your bookmarks.</p>
    </div>

    <li class="bookmark-entry bookmark-entry-template" data-chapter-id="" data-start-node-path="" data-start-node-offset="" data-end-node-path=""  data-end-node-offset="">
      <button class="bookmark-delete">&times;</button>
      <div class="bookmark-reveal">
        <p class="p-crimson"><i></i></p>
        <p class="p-crimson bookmark-excerpt"></p>
      </div>
    </li>

    <ul class="bookmark-list js-load">

      <?php foreach($bookmarks[0] as $bookmark): ?>
        <li class="bookmark-entry" data-chapter-id="<?php echo $bookmark[4] ?>" data-start-node-path="<?php echo $bookmark[0] ?>" data-start-node-offset="<?php echo $bookmark[1]?>" data-end-node-path="<?php echo $bookmark[2]?>"  data-end-node-offset="<?php echo $bookmark[3] ?>">
          <button class="bookmark-delete"></button>
          <div class="bookmark-reveal">
            <p class="p-crimson"><i><?php echo get_the_title($bookmark[4]); ?> - <?php echo $bookmark[5] ?></i></p>
            <p class="p-crimson bookmark-excerpt"></p>
          </div>
        </li>
      <?php endforeach ?>

    </ul>
  </div>

  <a href="#">
    <button class="hamburger state-active">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </a>

</aside>