<?php
/**
 * @package YD_Zoomify
 * @author Yann Dubois
 * @version 0.1.0
 */

/*
 Plugin Name: YD Zoomify
 Plugin URI: http://www.yann.com/wp-plugins/yd-zoomify
 Description: This Wordpress plugin allows for simple insertion of a Zoomify zoomable web image in a post content, page or template.
 Author: Yann Dubois
 Version: 0.1.0
 Author URI: http://www.yann.com/
 */

/**
 * @copyright 2009  Yann Dubois  ( email : yann _at_ abc.fr )
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
/**
 Revision 0.1.0:
 - First beta release
 */
/**
 *	TODO:
 *  - Test, debug, final release
 */

/** Display function **/
function yd_display_zoomify( $echo = TRUE, $src='http://www.zoomify.com/content/test/', $width=450, $height=300, $zid='theMovie' ) {
	$src = preg_replace( "/['\"\s]/", '', $src );
	$width = preg_replace( "/['\"\s]/", '', $width );
	$height = preg_replace( "/['\"\s]/", '', $height );
	$zid = preg_replace( "/['\"\s]/", '', $zid );
	if( !$src ) $src='http://www.zoomify.com/content/test/';
	if( !$width ) $width=450;
	if( !$height ) $height=300;
	if( !$zid ) $zid='theMovie';
	$plugin_dir = basename(dirname(__FILE__));
	$zoompath = get_bloginfo('wpurl') . '/wp-content/plugins/' . $plugin_dir . '/zoomifyViewer.swf';
	$html =	'<OBJECT CLASSID="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ' .
			'CODEBASE="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" ' .
			'WIDTH="' . $width . '" HEIGHT="' . $height . '" ID="' . $zid . '">' . "\n" .
            "\t" . '<PARAM NAME="FlashVars" VALUE="zoomifyImagePath=' . $src . '">' . "\n" .
            "\t" . '<PARAM NAME="MENU" VALUE="FALSE">' . "\n" .
			"\t" . '<PARAM NAME="SRC" VALUE="' . $zoompath . '">' . "\n" .
            "\t" . '<EMBED FlashVars="zoomifyImagePath=' . $src . '" SRC="' . $zoompath . '" MENU="false" ' .
			'PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" ' .
			' WIDTH="' . $width . '" HEIGHT="' . $height . '" NAME="' . $zid . '"></EMBED>' . "\n" .
            '</OBJECT>';
	if( isset( $echo ) && $echo !== FALSE ) {
		echo $html;
	} else {
		return $html;
	}
}

/** Display inside content **/
function yd_zoomify_generate( $content ) {
	if ( strpos( $content, "<!-- YDZOOM(" ) !== FALSE ) {
		$content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
		$content = preg_replace( "/<!-- YDZOOM\(([^,]*),?([^,]*),?([^,]*),?([^,]*)\) -->/ie", "yd_display_zoomify( FALSE, '\\1', '\\2', '\\3', '\\4' )", $content);
	}
	return $content;
}
add_filter('the_content', 'yd_zoomify_generate');

/** Display inside templates **/
function yd_display_zoomify_here( $src, $width, $height, $zid ) {
	yd_display_zoomify( TRUE, $src, $width, $height, $zid );
}
?>