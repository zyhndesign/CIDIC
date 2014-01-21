<?php
/**
 * The template for displaying 404 pages (Not Found).
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
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/404.css" />
    <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/googleAnalytics.js"></script>
    </head>

<!--头部-->
<?php get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title">Sorry, we can not find what you need, try the other columns.</h1>
				</header>

				<!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>