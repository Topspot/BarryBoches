<?php
/*
Plugin Name: Twitter Bootstrap Collapse aka Accordian Shortcode
Plugin URI: http://mohsinrasool.wordpress.com/twitter_bootstrap_collapse_aka_accordian
Description: It will enable [collapse_groupe] and [collapse] shortcode to generate twitter bootstrap's collapse aka accordian.
Version: 1.0
Author: Mohsin Rasool
Author URI: http://mohsinrasool.wordpress.com
License: GPL2
    Copyright 2012  Mohsin Rasool  (email : mohsin.rasool@gmail.com)

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
*/

function tbsca_admin() {  
    include('admin_view.php');  
	//echo 'yes';
} 

function tbsca_admin_actions() {  
	add_options_page("TBS Collapse", "TBS Collapse", 'manage_options', "tbs_collapse.php", "tbsca_admin");  
}  
add_action('admin_menu', 'tbsca_admin_actions');  



function collapse_group( $atts, $content = null ) {  
    extract(shortcode_atts(array(  
    'id' => '',
    'class' => ''
    ), $atts));  
	
	$output  = '<div class="accordion '.$class.'"  ';
	
	if(!empty($id))
		$output .= 'id="'.$id.'"';
		
	$output .='>'.do_shortcode($content).'</div>';
	return $output;  
}  
add_shortcode("collapse_group", "collapse_group");


function collapse($atts, $content = null) {  
    extract(shortcode_atts(array(  
    'id' => '',
    'title' => '',
	'open'=>'n' 
    ), $atts));  

	// autogenerate id to link the accordian title with contents.
	if(empty($id))
		$id = 'accordian_item_'.rand(100,999);
		
	$output = '<div class="accordion-group">
        <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" 
        data-parent="#accordion2" href="#'.$id.'">'.$title.'</a>
        </div>
         <div id="'.$id.'" class="accordion-body collapse '.($open == 'y' ? 'in' :'').'">
            <div class="accordion-inner">'.$content.'</div>
         </div>
        </div>';  
		
	return $output;
}  

add_shortcode("collapse", "collapse");

?>