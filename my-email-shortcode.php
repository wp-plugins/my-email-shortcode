<?php
/*
	Plugin Name: My Email Shortcode
	Plugin URI: http://www.blogworkorange.net/my-email-shortcode/
	Description: This plugin adds a shortcode to help users manage their email addresses on the site
	Author: Paweł Pela
	Version: 0.91
	Author URI: http://www.paulpela.com
	License: GPL2

	Copyright 2010  Paweł Pela  (email : paulpela@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
	--------------------------------------------------------------------------
*/

function my_email_shortcode($atts) {
	if(isset($atts['subject'])) {
		$subject = "?subject=" . $atts['subject'];
	} else {
		$subject = "";
	}
	$email = antispambot(get_the_author_meta("user_email"));
	if($email) {
		return "<a href=\"mailto:$email" . "$subject\" class=\"my-email-shortcode\">$email</a>";
	} else {
		return " Error. Please set your email address in Users->Your profile. ";
	}
}

add_shortcode("my-email", "my_email_shortcode");
 ?>