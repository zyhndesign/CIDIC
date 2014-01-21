<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
	<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="description" content="CIDIC" />
        <meta name="keywords" content="CIDIC,DESIGN,ITALY" />
        <title><?php  wp_title("|",true,"right"); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/common.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/single.css"/>
        <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/googleAnalytics.js"></script>
    </head>
    <!--头部-->
    <?php get_header(); ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">

            <?php while (have_posts()) : the_post(); ?>

            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>

                <p class="entry-date" datetime="2013-03-08T16:35:20+00:00"><?php the_date(); ?></p>
            <?php /*?><?php echo get_the_tag_list('<ul class="entry-tags"><li>', '</li><li>', '</li></ul>'); ?><?php */?>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            
            <?php endwhile; // end of the loop. ?>
            <a href="<?php echo home_url(); ?>" class="btn_home">Back to home</a>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->
    <?php /*?><?php get_sidebar(); ?><?php */?>
	<?php get_footer(); ?>