=== YD Zoomify ===
Contributors: ydubois
Donate link: http://www.yann.com/
Tags: plugin, zoomify, zoom, images, image, template, page, post, content, flash
Requires at least: 2.0.0
Tested up to: 2.7.1
Stable tag: trunk

Allows for simple insertion of a Zoomify zoomable web image in a post content, page or template.


== Description ==

= Zoom on your images! =

This Wordpress plugin allows for simple insertion of a Zoomify zoomable web image in a post content, page or template.

Zoomify express is a free technology based on Flash: http://www.zoomify.com/. However, the WordPress content editor tends to break the Flash inclusion code (it deletes the needed parameters). 
This plugin is a simple way to get around this problem and insert zoomable image code that will display perfectly with all flash-supporting browsers.

= Active support =

Drop me a line on my support site to report bugs, ask for specific feature or improvement, or just tell me how you're using the plugin.
It's still in an active development stage, with new features coming out on a regular basis.

= Disclaimer =

I have no relationship with Zoomify Inc. Please go to their website http://www.zoomify.com/ if you encounter problems with their product.


== Installation ==

1. Unzip yd-zoomify.zip
1. Upload the `yd-zoomify` directory and all its contents into the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Goto http://www.zoomify.com/ and download their free "zoomifyer" utility
1. use the zoomifyer on any web image to generate the zoom data directory
1. upload the zoom data directory somewhere on your blog, write down the URL
1. call the `<?php yd_display_zoomify_here( 'zoom_directory_url', width, height, 'name' ) ?>` function anywhere in your template files, or
1. use the `<!-- YDZOOM( zoom_directory_url, width, height, name ) -->` anywhere in a page or post content, to display your zoomable image


== Frequently Asked Questions ==

= Where should I ask questions? =

http://www.yann.com/wp-plugins/yd-zoomify

Use comments.

I will answer only on that page so that all users can benefit from the answer. 
So please come back to see the answer or subscribe to that page's post comments.


== Screenshots ==

1. The plugin in use on the http://www.nogent-citoyen.com WP blog to display a zoomable image inside a page.


== Revisions ==

0.1.0. Initial beta release


== Did you like it? ==

Drop me a line on http://www.yann.com/wp-plugins/yd-zoomify

And... *please* rate this plugin --&gt;