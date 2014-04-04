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

$head_line_id=1493; //头条文章id

$program_categories=get_categories(array("parent"=>$programs_id,"hide_empty"=>false,'orderby'=>'id'));

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="CIDIC" />
    <meta name="keywords" content="CIDIC,DESIGN,ITALY" />
    <title><?php  wp_title("|",true,"right"); ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/common.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/index.css" rel="stylesheet" type="text/css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/jquery-1.10.2.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/TweenMax.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/ScrollToPlugin.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/index.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/googleAnalytics.js"></script>
</head>
<body>
    <header class="page_header">
        <h1 class="top_logo"><a href="<?php echo home_url(); ?>">CIDIC</a></h1>
        <a class="hnid" href="http://www.hnid.org" target="_blank">hnid.org</a>
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

    <?php
    // The Query
    $query = new WP_Query(array(
        "tag_id"=>$head_line_id,"posts_per_page"=>1,"orderby"=>'date',"order"=>'DESC'
    ));

    $background_src=get_template_directory_uri()."/images/frontend/app/00.jpg";
    //print_r($query->posts);
    if($background=get_post_meta($query->posts[0]->ID,"zy_background",true)){

        $background=json_decode($background,true);
        $background_src=$background["filepath"];
    }
    ?>
    <div class="top_bg">
        <img src="<?php echo $background_src ?>" />
    </div>

    <!-- **************** 新闻 ****************  -->
    <section class="section_news section_common" id="section_news">

        <h2 class="section_title news_title">news</h2>
        <p class="section_heading">Push forward the cultural, economic, technological and design exchanges between China and Italy.</p>
        <ul class="post_list">


            <?php
            $query = new WP_Query(array(
                "cat"=>$news_id,"posts_per_page"=>3,"orderby"=>'date',"order"=>'DESC'
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
                        $showDir=get_template_directory_uri()."/images/frontend/app/thumb_default_500.png";
                    }

                    ?>

                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <div class="post_thumb">
                                <img src="<?php echo $showDir; ?>" />
                            </div>
                            <div class="post_abstract">
                                <h3 class="post_title">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="post_date"><?php echo $date[0]; ?></p>
                            </div>
                        </a>
                    </li>


                <?php
                }
            }

            /* Restore original Post Data */
            wp_reset_postdata();

            ?>

        </ul>
        <a href="<?php echo get_category_link($news_id);?>" class="btn_more">NEWS ARCHIVE</a>
    </section>

    <!-----------项目-------------->
    <section class="section_programs section_common" id="section_programs">
        <h2 class="section_title programs_title">programs</h2>
        <p class="section_heading">Push forward the cultural, economic, technological and design exchanges between China and Italy.</p>
        <ul class="post_list">

            <?php
            foreach ($program_categories as $key=>$category) {

            ?>
                <li>
                    <a href="<?php echo get_category_link($category->cat_ID); ?>">
                        <div class="post_thumb">
                            <?php
                                $post=get_posts(array('posts_per_page' => 1, 'category' => $category->cat_ID));
                                $thumbnail_id=get_post_thumbnail_id($post[0]->ID);
                                $showDir= wp_get_attachment_image_src($thumbnail_id,"post-thumbnail");
                                $showDir=$showDir[0];
                            ?>
                            <img src="<?php echo $showDir; ?>">
                        </div>
                        <div class="post_abstract">
                            <h3 class="post_title">
                                <?php echo $category->name; ?>
                            </h3>
                            <p class="post_date"><?php echo ""; ?></p>
                        </div>
                    </a>
                </li>
            <?php
            }
            ?>

            <li>
                <a href="http://www.hnid.org/CIDIC/showtongdao">
                    <div class="post_thumb">
                        <img src="http://www.hnid.org/CIDIC/wp-content/uploads/2014/04/dongjin.jpg">
                    </div>
                    <div class="post_abstract">
                        <h3 class="post_title">
                            Gaeml Brocade
                        </h3>
                        <p class="post_date"><?php echo ""; ?></p>
                    </div>
                </a>
            </li>
        </ul>
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
                    "cat"=>$parteners_id,"posts_per_page"=>30,"orderby"=>'date',"order"=>'DESC'
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
                            $showDir=get_template_directory_uri()."/images/frontend/app/thumb_default_500.png";
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
        <a href="<?php echo get_category_link($parteners_id);?>" class="btn_more">ALL PARTNERS</a>
    </section>

    <!-----------关于-------------->
    <section class="section_about" id="section_about">
        <h2 class="section_title about_title">about</h2>
        <article class="intro_text">
            <div>
                <h3>Our Organization</h3>
                <ul class="post_list">
                    <?php
                    /*wp_list_bookmarks(array(
                        'title_li'=>null
                    ));*/
                    mylinkorder_list_bookmarks(array(
                        'orderby'=>"order",
                        'title_li'=>null,
                        'categorize'=> 0
                    ));
                    ?>
                </ul>
            </div>
            <div>
                <!--<h1 class="bottom_logo"><a href="<?php /*echo home_url(); */?>">CIDIC</a></h1>-->
                <h3>Who we are</h3>
                <p>

                    Based on the guideline of Mr. Zhou Qiang, the previous Hunan Province Secretary of the CCP Committee, according to the ‘Three Year Action Plan of Strengthening Sino-Italian Economic Cooperation’ signed by Premier Wen Jiabao and Italian Premier, consented by the Ministry of Science and Technology, China-Italy Design and Innovation Centre (Hunan) was established to enhance design cooperation, serve local economic innovation and development between the two countries.
                </p><p>
                    We aim to internationalise our industrial design development, integrating resources and creating international brands by leading the design innovation integration of upstream and downstream industries, gathering national and international design resources and talents to Hunan to further enhance the industrial design innovation level in Hunan and China.

                </p>

            </div>
        </article>
        <a href="<?php echo post_permalink($vision_id); ?>" class="btn_more">OUR VISION</a>
    </section>

<?php get_footer();?>