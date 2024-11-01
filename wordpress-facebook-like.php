<?php
/*
Plugin Name: Wordpress-Facebook-Like
Plugin URI: http://blog.gunnjerkens.com/2010/04/facebook-like-plugin-for-wordpress
Description: A filter for WordPress that lets you customize and add the Facebook Like button to pages and/or posts on your blog.
Version: 0.3
Author: Todd Williams
Author URI: http://www.gunnjerkens.com/
Plugin License: GPL
*/

// activate plugin
function wordpress_facebook_like_activate() {
	$options = array(
				'index' => 'yes',
				'page' => 'yes',
				'post' => 'yes',
				'show_faces' => 'yes',
				'layout_style' => 'standard',
				'width' => '450',
				'verb' => 'like',
				'font' => 'arial',
				'color_scheme' => 'light',
				'position' => 'below'
			);
	update_option('wordpress-facebook-like', $options);
}

register_activation_hook( __FILE__, 'wordpress_facebook_like_activate');

if (!class_exists("WordpressFacebookLike")) {
	class WordpressFacebookLike 
	{
  		function WordpressFacebookLike()
		{
			add_action('admin_init', array(&$this, 'options'));
			
			$this->path = plugins_url('/wordpress-facebook-like/');
			$this->options = get_option('wordpress-facebook-like');
			
			// display it!
			add_action('the_posts', array(&$this, 'initialize'));
			
			// admin stuff
			add_action('admin_menu', array(&$this, 'menu'));
			add_action('admin_head', array(&$this, 'admin_css'));
			add_action('admin_head', array(&$this, 'admin_js'));
		}
		
		function initialize($posts) {
			if(is_front_page() && $this->options['index'] == 'yes')
			{
				$this->display();
			}
			
			if(is_page() && $this->options['page'] == 'yes')
			{
				$this->display();
			}
			
			if(is_single() && $this->options['post'] == 'yes')
			{
				$this->display();
			}
			
			return $posts;
		}
		
		function display()
		{
			add_filter('the_content', array(&$this, 'show_wordpress_facebook_like'));
		}
		
		function options()
		{
			register_setting('wordpress_facebook_like_settings', 'wordpress-facebook-like');
		}
		
		function show_wordpress_facebook_like($content)
		{
			if($this->options['show_faces'] == "yes")
			{
				$height = '';
			} else {
				$height = '25';
			}
			
			$iframe = '<iframe src="http://www.facebook.com/plugins/like.php?href=' . urlencode(get_permalink($id)) . '&amp;layout=' . $this->options['layout_style'] . '&amp;show_faces=' . $this->options['show_faces'] . '&amp;width=' . $this->options['width'] . '&amp;action=' . $this->options['verb'] . '&amp;font=' . $this->options['font'] . '&amp;colorscheme=' . $this->options['color_scheme'] . '" scrolling="no" frameborder="0" allowTransparency="true" class="wordpress_facebook_like" style="border:none; overflow:hidden; width:' . $this->options['width'] . 'px; height:' . $height . 'px"></iframe>';
			
			if($this->options['position'] == 'below')
			{
				return $content . $iframe;
			} else {
				return $iframe . $content;
			}
		}

		function menu() {
		  add_options_page('Facebook-Like Options', 'Facebook-Like', 'update_plugins', 'wordpress_facebook_like_menu', array(&$this, 'wordpress_facebook_like_settings'));
		}
		
		function wordpress_facebook_like_settings() {
		  include( dirname(__FILE__) . '/options.php');
		}
		
		function admin_css() {
			echo '<link rel="stylesheet" href="' . $this->path . 'css/admin.css" type="text/css" />';
		}
		
		function admin_js()
		{
			echo '<script type="text/javascript" src="' . $this->path . 'js/wordpress_facebook_like_admin.js"></script>';
		}

	}
}

if (class_exists("WordpressFacebookLike")) {
  add_action('plugins_loaded', create_function('', 'global $WordpressFacebookLike; $WordpressFacebookLike = new WordpressFacebookLike();'));
}
?>