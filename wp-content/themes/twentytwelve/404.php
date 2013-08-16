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
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/app/404.css" />
    <script src="<?php echo get_template_directory_uri(); ?>/js/libs/jquery-1.10.2.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/app/HNID.UIManager.js"></script>    <script src="<?php echo get_template_directory_uri(); ?>/js/app/404.js"></script>
    <title><?php wp_title() ?></title>
    </head>

<!--头部-->
<?php get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title">很抱歉，我们无法找到您需要的内容，请尝试其他栏目。</h1>
				</header>

				<!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>