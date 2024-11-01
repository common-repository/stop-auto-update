<?php
/*
Plugin Name: Stop Auto Updating Dangit
Author URI: http://wordpress.ieonly.com/category/my-plugins/
Author: Eli Scheetz
Author URI: http://wordpress.ieonly.com/category/my-plugins/
Contributors: scheeeli
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8VWNB5QEJ55TJ
License: GPLv2 
Description: This plugin simply stop WordPress from automatically updating for you.
Version: 0.14.14
*/

function aud_setting_input() {
 	echo '<input name="aud_stop_updating" type="checkbox" value="1" '.checked(1, get_option('aud_stop_updating', true), false).' />';
}

function aud_admin_init(){
	$menu_slug = 'general';
	add_settings_field('aud_stop_updating', 'Stop Auto Updating Dangit', 'aud_setting_input', $menu_slug);
	register_setting($menu_slug, 'aud_stop_updating');
}

function stop_auto_updating_dangit($opt) {
	return (get_option('aud_stop_updating', true)?true:$opt);
}

add_action('admin_init', 'aud_admin_init');
add_filter('automatic_updater_disabled', 'stop_auto_updating_dangit');