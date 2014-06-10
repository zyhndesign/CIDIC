<?php
/**
 * Template Name: TongDao
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="CIDIC" />
    <meta name="keywords" content="CIDIC,DESIGN,ITALY" />
    <title><?php  wp_title("|",true,"right"); ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/common.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        a{
            color: #999;
        }
        a:hover{
            color:#333;
        }
        .title{
            text-align: center;
        }
        video{
            max-width: 100%;
            width:85%;
            margin:auto;
            height: auto;
            display: block;
        }
        .moreInfo{
            width: auto;
            margin: 20px auto;
            text-align: center;
        }
        .links{
            text-align: center;
        }
        .links .linkImage{
            vertical-align: middle;
        }
    </style>
    <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/googleAnalytics.js"></script>
</head>

<!--头部-->
<?php get_header(); ?>
<section id="primary" class="site-content">
    <h2 class="title">Gaeml Brocade Research&Innovation Project</h2>
    <video src="http://s40yes.bdcdn.duapp.com/dongjin1.mp4" autoplay="autoplay" controls="controls"></video>
    <div class="moreInfo">For more information, please follow our official Weibo
        <br><a href="http://weibo.com/newchannel2011" target="_blank">@新通道社会创新</a>
        <div class="links">
            <img class="linkImage" src="<?php echo get_template_directory_uri(); ?>/images/frontend/app/erweima.jpg">
            <a href="http://www.ljydesign.it/">http://www.ljydesign.it</a>
        </div>
    </div>
</section>

<?php /*get_footer(); */?>
</body>
</html>
