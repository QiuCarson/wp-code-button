<?php
/*
Plugin Name:WP-code-button
Plugin URI: http://www.phpsong.com/1645.html
Description: 一个基于 Google Code Prettify 实现的WordPress代码高亮插件,后台带代码插入功能
Version: 0.4 
Author: 小松
Author URI:  http://www.phpsong.com/
*/

if (in_array($pagenow, array('post.php', 'post-new.php', 'page.php', 'page-new.php'))) {
	add_action('init', 'wpgcp_addbuttons');
}

function wpgcp_addbuttons()
{
    // Add only in Rich Editor mode
    if (get_user_option('rich_editing') == 'true') {
        // add the button for wp25 in a new way
        add_filter("mce_external_plugins", "add_wpgcp_tinymce_plugin", 5);
		add_filter('mce_buttons', 'register_wpgcp_button', 5);
       
    }
}

// used to insert button in wordpress 2.5x editor
function register_wpgcp_button($buttons)
{
    array_push($buttons, "separator", "wpgcp");
    return $buttons;
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_wpgcp_tinymce_plugin($plugin_array){
    $plugin_array['wpgcp'] = get_option('siteurl') . '/wp-content/plugins/wp-code-button/editor_plugin.js';
    return $plugin_array;
}

function prettify_script() {
	if(is_single()){
		wp_enqueue_style( 'prettify-style12', plugins_url('/prettify.css', __FILE__) );

		wp_enqueue_script('prettify-script',plugins_url('/prettify.js', __FILE__),array(),false,true);
	}
}
add_action('wp_enqueue_scripts', 'prettify_script');



?>
