=== Parallelize ===
Contributors: SEO Jerusalem, iLobster
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7746509
Tags: parallelize, hostname, parallel
Requires at least: 2.8
Tested up to: 2.9
Stable tag: 1.0

Parallelize allows automatically parallelizing resources across multiple hostnames, speeding page load.

== Description ==

While browsers can handle up to 60 http requests simultaneously, only 2-4 simultaneous requests can be handled from the same hostname. This can potentially slow down page loads on your site.

The solution <a href="http://code.google.com/speed/page-speed/docs/rtt.html#ParallelizeDownloads">Recommended by Google</a> is parallizing resources across 2-5 hostnames on sites serving 10 or more static resources.

Parallelize allows automatically parallelizing WordPress attachement files (images or any files uploaded with the wordpress media features) across multiple hostnames, speeding page load. To assist caching, resources will always load from the same hostname.

This plugin is distributed as-is, no warranty whatsoever.

== Installation ==


1. Upload the plugin to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to Settings > Parrallelize to confugure your hostnames
1. Click 'Update Posts' to parallelize images in existing posts. This might take a while


= Uninstalling =

1. Go to Settings > Parrallelize
1. Click 'Restore Posts'
1. Deactivate the plugin through the 'Plugins' menu in WordPress


== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the directory of the stable readme.txt, so in this case, `/tags/4.3/screenshot-1.png` (or jpg, jpeg, gif)
2. This is the second screen shot

== Changelog ==

= 1.0 =
* Initial release.