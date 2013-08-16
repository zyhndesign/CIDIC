<?php
/**
 * Template Name: 测试query语句（查询语句）
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $wp_query;

print_r($wp_query->query);

echo "<br>";

print_r($wp_query->query_vars);


echo "<br>";


//$menu_items = wp_get_nav_menu_items("main");
//print_r($menu_items);

echo "<br>";
echo get_tag_link(1500);

echo "<br>";
print_r(get_tag(1505));

$str="1023 年 1121月";
echo preg_replace("/年|月/","-",$str);

echo "<br>";
$string="ssss/ssssss/展示团盘.jpg";
$path=pathinfo("ssss/你好ssssss/展示团盘ssssss.jpg");
print_r($path);
echo substr($string,strrpos($string,"/")+1,strrpos($string,".")-strrpos($string,"/")-1);