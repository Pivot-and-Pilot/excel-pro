<form class="search">

    <?php if(isset($_GET['PRODUCT_ID'])): ?><input type="hidden" name="PRODUCT_ID" value="<?php echo $_GET['PRODUCT_ID'] ?>"/><?php endif ?>
    <?php if(isset($_GET['CHAPTER'])): ?><input type="hidden" name="CHAPTER" value="<?php echo $_GET['CHAPTER'] ?>"/><?php endif ?>
    <?php if(isset($_GET['SECTION'])): ?><input type="hidden" name="SECTION" value="<?php echo $_GET['SECTION'] ?>"/><?php endif ?>

    <input name="SEARCH" type="text"/>

    <input type="submit"/>

</form>

<?php

$args = array(
    'post_type'             => 'product',
    'post_status'           => 'publish'
);

$book_loop = new WP_Query($args);

$current_user = wp_get_current_user();

?>

<div class="container-dropdowns">

    <ul class="dropdown state-active">

        <?php if(isset($_GET['PRODUCT_ID']) && wc_get_product($_GET['PRODUCT_ID'])): ?>

            <li><button><?php echo get_the_title($_GET['PRODUCT_ID']); ?></button></li>

            <li><a href="?" ><button>All Books</button></a></li>

        <?php else: ?>

            <li><button>Select Book</button></li>

        <?php endif ?>

        <?php if(isset($_GET['PRODUCT_ID']) && wc_get_product($_GET['PRODUCT_ID'])): ?>

            <?php while ( $book_loop->have_posts() ) : $book_loop->the_post(); ?>

                <?php if($_GET['PRODUCT_ID'] != get_the_ID()): ?>

                    <li><a href="?PRODUCT_ID=<?php the_ID(); ?>" ><button><?php the_title(); ?></button></a></li>

                <?php endif ?>

            <?php endwhile ?>

        <?php else: ?>

            <?php while ( $book_loop->have_posts() ) : $book_loop->the_post(); ?>

                <li><a href="?PRODUCT_ID=<?php the_ID(); ?>" ><button><?php the_title(); ?></button></a></li>

            <?php endwhile ?>

        <?php endif ?>

    </ul>


    <?php if(isset($_GET['PRODUCT_ID']) && wc_get_product($_GET['PRODUCT_ID']) ): ?>

        <ul class="dropdown state-active">

            <?php if(isset($_GET['CHAPTER'])): ?>

                <li><button><?php echo AVAILABLE_CHAPTERS_NAMES[$_GET['CHAPTER']]; ?></button></li>

            <?php else: ?>

                <li><button>Select Chapter</button></li>

            <?php endif ?>


            <?php if(isset($_GET['CHAPTER'])): ?>

                <?php foreach(AVAILABLE_CHAPTERS as $index=>$available_chapter): ?>

                    <?php if(get_field($available_chapter, $_GET['PRODUCT_ID'])):  ?>

                        <?php if($_GET['CHAPTER'] != $index): ?>

                            <li><a href="?PRODUCT_ID=<?php echo $_GET['PRODUCT_ID']; ?>&CHAPTER=<?php echo $index; ?>" ><button><?php echo AVAILABLE_CHAPTERS_NAMES[$index]; ?></button></a></li>

                        <?php endif ?>

                    <?php endif ?>

                <?php endforeach ?>

            <?php else: ?>

                <?php foreach(AVAILABLE_CHAPTERS as $index=>$available_chapter): ?>

                    <?php if(get_field($available_chapter, $_GET['PRODUCT_ID'])):  ?>

                        <li><a href="?PRODUCT_ID=<?php echo $_GET['PRODUCT_ID']; ?>&CHAPTER=<?php echo $index; ?>" ><button><?php echo AVAILABLE_CHAPTERS_NAMES[$index]; ?></button></a></li>

                    <?php endif ?>

                <?php endforeach ?>

            <?php endif ?>

        </ul>

    <?php else: ?>

        <ul class="dropdown">

            <li><button>Select Chapter</button></li>

        </ul>

    <?php endif ?>


    <?php if(isset($_GET['CHAPTER'])): ?>

        <ul class="dropdown state-active">

        <?php if(isset($_GET['SECTION'])): ?>

            <li><button>Section <?php echo $_GET['SECTION']; ?></button></li>

        <?php else: ?>

            <li><button>Select Section</button></li>

        <?php endif ?>

        <?php if(isset($_GET['PRODUCT_ID']) && wc_get_product($_GET['PRODUCT_ID'])): ?>

            <?php if(isset($_GET['SECTION'])): ?>

                <?php foreach(range(1,5) as $section): ?>

                    <?php if(get_field(AVAILABLE_CHAPTERS[$_GET['CHAPTER']] . '_section_' . $section, $_GET['PRODUCT_ID'])):  ?>

                        <?php if($_GET['SECTION'] != $section): ?>

                            <li><a href="?PRODUCT_ID=<?php echo $_GET['PRODUCT_ID']; ?>&CHAPTER=<?php echo $_GET['CHAPTER']; ?>&SECTION=<?php echo $section ?>" ><button>Section <?php echo $section ?></button></a></li>

                        <?php endif ?>
                    
                    <?php endif ?>

                <?php endforeach ?>

            <?php else: ?>

                <?php foreach(range(1,5) as $section): ?>

                    <?php if(get_field(AVAILABLE_CHAPTERS[$_GET['CHAPTER']] . '_section_' . $section, $_GET['PRODUCT_ID'])):  ?>

                        <li><a href="?PRODUCT_ID=<?php echo $_GET['PRODUCT_ID']; ?>&CHAPTER=<?php echo $_GET['CHAPTER']; ?>&SECTION=<?php echo $section ?>" ><button>Section <?php echo $section ?></button></a></li>
                    
                    <?php endif ?>

                <?php endforeach ?>

            <?php endif ?>

        <?php endif ?>

        </ul>

    <?php else: ?>

        <ul class="dropdown">

            <li><button>Select Section</button></li>

        </ul>

    <?php endif ?>

</div>


<?php

    $MAX_COMMENTS_PER_PAGE = 4;

    $pageNum = isset($_GET['PAGE']) ? $_GET['PAGE'] : 1;
    $productId = isset($_GET['PRODUCT_ID']) ? $_GET['PRODUCT_ID'] : 0;
    $chapterIndex = isset($_GET['CHAPTER']) ? $_GET['CHAPTER'] : null;
    $search = isset($_GET['SEARCH']) ? $_GET['SEARCH'] : "";
    $sectionNum = isset($_GET['SECTION']) ? $_GET['SECTION'] : null;
    $offset = ($pageNum - 1) * $MAX_COMMENTS_PER_PAGE;

    $meta_query = array();

    if($chapterIndex !== null){

        $meta_query_item = array(
            'key' => 'CHAPTER',
            'value' => $chapterIndex,
            'compare' => '='
        );

        array_push($meta_query, $meta_query_item);

    }

    if($sectionNum !== null){

        $meta_query_item = array(
            'key' => 'SECTION',
            'value' => $sectionNum,
            'compare' => '='
        );

        array_push($meta_query, $meta_query_item);

    }

    $args = array(
        'offset'        =>      $offset,
        'post_id'       =>      $productId,
        'meta_query'    =>      $meta_query,
        'number'        =>      $MAX_COMMENTS_PER_PAGE,
        'search'        =>      $search,
        'status'        =>      'approve',
        'type'          =>      'errata'
    );

    $comments = get_comments($args);

    $args['number'] = null;
    $maxComments = count(get_comments($args));
    $maxPages = ceil($maxComments / 4);
    
?>

<div class="container-comments">

<!-- commented out because the client doesnt want to show any errata, uncomment to show errata  -->
<?php foreach($comments as $comment): 
    
?>

    

    <?php $chapterIndex = get_comment_meta($comment->comment_ID, 'CHAPTER', true); ?>
    <?php $sectionNum = get_comment_meta($comment->comment_ID, 'SECTION', true); ?>

    <article class="article-comment">

        <p><i><?php echo date("F j, Y", strtotime($comment->comment_date)); ?></i></p>

        <h4><?php echo get_the_title($comment->comment_post_ID); ?></h4>

        <!-- <p class="p-title"><b><?php echo AVAILABLE_CHAPTERS_NAMES[$chapterIndex]; ?></b> : <?php echo get_field(AVAILABLE_CHAPTERS[$chapterIndex] . '_title', $comment->comment_post_ID); ?></p> -->

        <!-- <h2><?php echo 'Section ' . $sectionNum . ': ' . get_field(AVAILABLE_CHAPTERS[$chapterIndex] . '_section_' . $sectionNum, $comment->comment_post_ID); ?></h2> -->

        <p class="content"><?php echo $comment->comment_content; ?></p>

    </article>

<?php endforeach ?> 

<!-- change the if condition back to count($comments) === 0 to show the errata normally -->
<?php if(count($comments) === 0): ?>

    <h3>No errata have yet been identified.</h3>

<?php else: ?>

    <form class="pagination">

        <?php if(isset($_GET['PRODUCT_ID'])): ?><input type="hidden" name="PRODUCT_ID" value="<?php echo $_GET['PRODUCT_ID'] ?>"/><?php endif ?>
        <?php if(isset($_GET['CHAPTER'])): ?><input type="hidden" name="CHAPTER" value="<?php echo $_GET['CHAPTER'] ?>"/><?php endif ?>
        <?php if(isset($_GET['SECTION'])): ?><input type="hidden" name="SECTION" value="<?php echo $_GET['SECTION'] ?>"/><?php endif ?>

    <?php foreach(range(1, $maxPages) as $page): ?>

        <input class="<?php if($pageNum == $page){echo 'state-active';} ?>" name="PAGE" type="submit" value="<?php echo $page ?>"/>

    <?php endforeach ?>

    </form>

<?php endif ?>

</div>