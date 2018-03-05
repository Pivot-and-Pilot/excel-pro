<?php
/**
 * Template part for displaying bookmarks on reader page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package excelpro
 */

?>

<?php global $curr_post_id; ?>

<aside id="chapter_list">
<?php
  $args = array(
    'orderby' => 'date',
    'order'   => 'ASC',
    'post_type' => 'chapters',
    'numberposts' => -1
  );

  $chapters_query = new WP_Query($args);
?>
  <ul>
    <?php while($chapters_query->have_posts()): ?> 
      <?php $chapters_query->the_post(); ?>
      <a class="chapter-permalink <?php if(get_the_ID() == $curr_post_id){echo 'state-active';}?>" data-chapter-id="<?php the_ID(); ?>" href="<?php the_permalink(); ?>">
        <li class="chapter-entry">
          <figure class="chapter-percentage"></figure>
          <p class="p-title"><?php the_title(); ?></p>
          <h2><?php the_field('chapter_title'); ?></h2>
        </li>
      </a>
    <?php endwhile ?>
    <?php wp_reset_postdata(); ?>
  </ul>

  <a href="#">
    <button class="hamburger state-active">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </a>
</aside>