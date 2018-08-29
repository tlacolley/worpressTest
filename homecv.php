<?php
/* Template Name: HomeCv Template */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tlacolley
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">



        <?php
        $cat = array(2,3);
        foreach ($cat as $cat_id): ?>
        <section class="categorySec">

        <?php
        $cat = get_category($cat_id);
        // var_dump($cat);
        // print_r($cat);
        $args  = array('category' => $cat_id );
        $myposts = get_posts( $args );?>
        <h2> <?php  echo $cat->cat_name; ?></h2>
        <ul>
        <?php
        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
        <?php
        $postid = get_the_ID();
        if ( get_post_custom_keys($postid)[2]) :?>
        <?php
         // the_meta(); ?>
        <?php $customFielsId = get_post_custom_keys($postid)[2]; ?>
         <h3> <?= $customFielsId; ?> </h3>
        <?php $valSkill =  get_post_meta(get_the_ID($post),$customFielsId,true);
        // var_dump($customStyle)?>
        <div class="levelGrey">
            <div class="levelGreen" style="width:<?=$valSkill?>%">

            </div>
        </div>
    <?php endif ?>
        <li>
            <?php
              get_template_part('template-parts/content-post');
             ?>
        </li>
        <?php endforeach;

        wp_reset_postdata();?>
    </ul>
    </section>

    <?php endforeach ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
