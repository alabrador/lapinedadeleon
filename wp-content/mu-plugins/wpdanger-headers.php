<?php
/**
Plugin Name: WPdanger Headers
Plugin URI: https://www.wpdanger.com/
Description: This plugins hides some headers...
Version: 1.0
Author: Javier Casares
Author URI: https://www.javiercasares.com/
License: GPLv2 or later
**/
defined('ABSPATH') or die('Bye bye!');
// Sets the cookies used to store an unauthenticated commentator’s identity. Typically used to recall previous comments by this commentator that are still held in moderation.
remove_action('set_comment_cookies', 'wp_set_comment_cookies');
// Sets the display status of the admin bar.
//add_filter('show_admin_bar','__return_false');
// Display the generator XML or Comment for RSS, ATOM, etc.
add_filter('the_generator', '__return_false');
// Displays the relational links for the posts adjacent to the current post.
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
// Displays relational links for the posts adjacent to the current post for single post pages.
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// Display the links to the general feeds.
remove_action('wp_head', 'feed_links', 2);
// Display the links to the extra feeds such as category feeds.
remove_action('wp_head', 'feed_links_extra', 3);
// Display relational link for the site index. Up to 3.3.0
//remove_action('wp_head', 'index_rel_link');
// Display relational link for parent item. Up to 3.3.0
//remove_action('wp_head', 'parent_post_rel_link', 10, 0);
// Display the link to the Really Simple Discovery service endpoint.
remove_action('wp_head', 'rsd_link');
// Display relational link for the first post. Up to 3.3.0
//remove_action('wp_head', 'start_post_rel_link', 10, 0);
// Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wlwmanifest_link');
// Displays the XHTML generator that is generated on the wp_head hook.
remove_action('wp_head', 'wp_generator');
// Injects rel=shortlink into the head if a shortlink is defined for the current page.
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
?>