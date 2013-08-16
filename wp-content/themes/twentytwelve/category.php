<?php

/** The template for displaying Category pages.
 * Used to display archive-type pages for posts in a category.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package WordPress * @subpackage Twenty_Twelve * @since Twenty Twelve 1.0
 * */

$download_id=1502;//下载专区分类id

$recruitment_id=1500;//实习招聘分类id

$notification_id=1501;//通知公告分类id

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/app/category.css"/>
    <title><?php wp_title() ?></title>
</head>

<!--头部-->
<?php get_header(); ?>

<section id="primary" class="site-content">
    <div id="content" role="main">

        <header class="archive-header">
            <h1 class="archive-title"><?php single_cat_title(); ?></h1>
        </header>

        <ul class="post-list">

            <?php while (have_posts()) : the_post();?>

                <li>
                    <?php if(in_category(array($download_id,$recruitment_id,$notification_id))){?>

                        <!--下载专区文章没有缩略图-->
                        <div class="nothumb-abstract">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div>

                    <?php }else{
                        //获取缩略图
                        $post_id = get_the_ID();
                        if ($thumb_id = get_post_meta($post_id, "_thumbnail_id", true)) {
                            $guid = get_post($thumb_id)->guid;
                            $pathinfo = pathinfo($guid);
                            $filename = $pathinfo["filename"];
                            $ext = $pathinfo["extension"];
                            $dirname = $pathinfo["dirname"];
                            $showDir = $dirname . "/" . $filename . "-500x500." . $ext;
                        } else {
                            $showDir = get_template_directory_uri() . "/images/app/thumb_default_500.png";
                        }
                    ?>

                        <!--非下载分类有缩略图-->
                        <div class="post_thumb">
                            <img src="<?php echo $showDir ?>">
                        </div>
                        <div class="post_abstract">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                            <p class="entry-date"><?php echo get_the_date(); ?></p>

                            <p><?php the_excerpt(); ?></p>

                            <?php /*?><?php echo get_the_tag_list('<ul class="entry-tags"><li>', '</li><li>', '</li></ul>');?><?php */?>
                        </div>

                    <?php  } ?>

                    <a href="<?php the_permalink(); ?>" class="hnid_btn_more">more...</a>
                </li>

            <?php endwhile; ?>

        </ul>

        <div class="hnid_pagination">
            <?php
            global $wp_query;
            $total = $wp_query->max_num_pages;
            if ($total > 1) {
                if (!$current_page = get_query_var('paged')) {
                    $current_page = 1;
                }
                //获取路径
                $permalink_structure = get_option('permalink_structure');
                $format = empty($permalink_structure) ? '&page=%#%' : '/page/%#%/';
                echo paginate_links(array('base' => get_pagenum_link(1) . '%_%', 'format' => $format, 'current' => $current_page, 'total' => $total, 'mid_size' => 4, 'type' => 'list'));
            }
            ?>
        </div>
    </div>
    <!-- #content -->
</section>
<!-- #primary -->
<?php get_footer(); ?>