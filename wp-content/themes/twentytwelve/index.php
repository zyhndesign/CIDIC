<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
$news_id=128;//新闻分类id

$programs_id=131; //项目分类id

$parteners_id=135; //合作伙伴分类id

$vision_id=1230; //未来展望文章id

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php wp_title() ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/css/app/index.css" rel="stylesheet" type="text/css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/libs/jquery-1.10.2.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/libs/greensock/TweenMax.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/libs/greensock/ScrollToPlugin.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/app/index.js"></script>
</head>
<body>
    <header class="page_header">
        <h1 class="top_logo"><a href="#">CIDIC</a></h1>
        <nav class="top_nav" id="top_nav">
            <ul>
                <li><a href="#section_news">news</a></li>
                <li><a href="#section_programs">programs</a></li>
                <li><a href="#section_partners">partners</a></li>
                <li><a href="#section_about">about</a></li>
                <li><a href="#section_contact">contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- **************** 新闻 ****************  -->
    <section class="section_news" id="section_news">
        <h2 class="section_title news_title">news</h2>
        <article class="news_post">

            <?php
            // The Query
            $query = new WP_Query(array(
                "cat_id"=>$news_id,"posts_per_page"=>1,"orderby"=>'date',"order"=>'DESC'
            ));

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $post_id=get_the_ID();
                    $date=get_post($post_id)->post_date;
                    $date=explode(" ",$date);

                    if($background=get_post_meta($post_id,"zy_background",true)){
                        $background=json_decode($background,true);
                        $background_src=$background["filepath"];
                    }else{
                        $background_src=get_template_directory_uri()."/images/default_bg/00.jpg";
                    }

                    ?>

                    <h3 class="post_title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="post_date"><?php echo $date[0] ?></p>
                    <div class="post_poster">
                        <img src="<?php echo $background_src; ?>" />
                    </div>

                    <?php
                }
            }

            /* Restore original Post Data */
            wp_reset_postdata();

            ?>

        </article>
        <a href="<?php echo get_category_link($news_id);?>" class="btn_more">NEWS ARCHIVE</a>
    </section>

    <!-----------项目-------------->
    <section class="section_programs" id="section_programs">
        <h2 class="section_title programs_title">programs</h2>
        <p class="section_heading">Push forward the cultural, economic, technological and design exchanges between China and Italy.</p>
        <ul class="post_list">

            <?php
            // The Query
            $query = new WP_Query(array(
                "cat"=>$programs_id,"posts_per_page"=>3,"orderby"=>'date',"order"=>'DESC'
            ));

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $post_id=get_the_ID();
                    $date=get_post($post_id)->post_date;
                    $date=explode(" ",$date);
                    if(has_post_thumbnail($post_id)){
                        $thumbnail_id=get_post_thumbnail_id($post_id);
                        if(wp_get_attachment_metadata($thumbnail_id)){

                            //如果存在保存媒体文件信息的metadata，那么系统是可以获取出缩略图的
                            $showDir= wp_get_attachment_image_src($thumbnail_id,"post-thumbnail");
                            $showDir=$showDir[0];
                        }else{

                            $guid=get_post($thumbnail_id)->guid;
                            $pathinfo=pathinfo($guid);
                            $filename=substr($guid,strrpos($guid,"/")+1,strrpos($guid,'.')-strrpos($guid,"/")-1);
                            $ext=$pathinfo["extension"];
                            $dirname=$pathinfo["dirname"];

                            //不能获取出缩略图，但是又绑定了，那么是原来迁过来的数据，直接找缩略图文件
                            $showDir=$dirname."/".$filename."-500x500.".$ext;
                        }
                    }else{
                        $showDir=get_template_directory_uri()."/images/app/thumb_default_500.png";
                    }
                    ?>
                    <li>
                        <div class="post_thumb">
                            <img src="<?php echo $showDir; ?>" />
                        </div>
                        <div class="post_abstract">
                            <h3 class="post_title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="post_date"><?php echo $date[0]; ?></p>
                        </div>
                    </li>

                    <?php
                }
            }

            /* Restore original Post Data */
            wp_reset_postdata();

            ?>

        </ul>
        </article>
        <a href="<?php echo get_category_link($programs_id);?>" class="btn_more">ALL PROGRAMS</a>
    </section>

    <!-----------合作方-------------->
    <section class="section_partners" id="section_partners">
        <h2 class="section_title partner_title">partners</h2>
        <p class="section_heading">Push forward the cultural, economic, technological and design exchanges between China and Italy.</p>
        <ul class="post_list">
            <?php
                // The Query
                $query = new WP_Query(array(
                    "cat"=>$parteners_id,"posts_per_page"=>12,"orderby"=>'date',"order"=>'DESC'
                ));

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        $post_id=get_the_ID();
                        $date=get_post($post_id)->post_date;
                        $date=explode(" ",$date);
                        if(has_post_thumbnail($post_id)){
                            $thumbnail_id=get_post_thumbnail_id($post_id);
                            if(wp_get_attachment_metadata($thumbnail_id)){

                                //如果存在保存媒体文件信息的metadata，那么系统是可以获取出缩略图的
                                $showDir= wp_get_attachment_image_src($thumbnail_id,"post-thumbnail");
                                $showDir=$showDir[0];
                            }else{

                                $guid=get_post($thumbnail_id)->guid;
                                $pathinfo=pathinfo($guid);
                                $filename=substr($guid,strrpos($guid,"/")+1,strrpos($guid,'.')-strrpos($guid,"/")-1);
                                $ext=$pathinfo["extension"];
                                $dirname=$pathinfo["dirname"];

                                //不能获取出缩略图，但是又绑定了，那么是原来迁过来的数据，直接找缩略图文件
                                $showDir=$dirname."/".$filename."-500x500.".$ext;
                            }
                        }else{
                            $showDir=get_template_directory_uri()."/images/app/thumb_default_500.png";
                        }
                        ?>

                        <li>
                            <div class="post_thumb">
                                <img src="<?php echo $showDir; ?>" />
                            </div>
                            <div class="post_abstract">
                                <h3 class="post_title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <p class="post_date"><?php echo $date[0]; ?></p>
                            </div>
                        </li>

                        <?php

                    }
                }

                /* Restore original Post Data */
                wp_reset_postdata();

            ?>

        </ul>
        </article>
        <a href="<?php echo get_category_link($parteners_id);?>" class="btn_more">ALL PARTNERS</a>
    </section>

    <!-----------关于-------------->
    <section class="section_about" id="section_about">
        <h2 class="section_title about_title">about</h2>
        <article class="intro_text">
            <h3>Who we are</h3>
            <p>Push Forward The Cultural, Economic, Technological And Design Exchanges Between China And Italy.</p>
            <h3>What we do</h3>
            <p>Push Forward The Cultural, Economic, Technological And Design Exchanges Between China And Italy.</p>
        </article>
        <a href="<?php echo post_permalink($vision_id); ?>" class="btn_more">OUR VISION</a>
    </section>

<?php get_footer();?>