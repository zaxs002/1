<?php
/*
Plugin Name: Parallelize
Plugin URI:  http://www.seo-jerusalem.com/home/seo-friendly-web-development/parallelize/
Description: Parallelize image downloads across hostnames
Version: 1.0
Author: SEO Jerusalem
Author URI: http://www.seo-jerusalem.com

=== RELEASE NOTES ===
2009-12-28 - v1.0 - first version
*/


$hostnames = '';
$current_hostname = parse_url(get_bloginfo('url'), PHP_URL_HOST);

add_action('admin_menu', 'pi_admin_menu');

add_filter('wp_get_attachment_url', 'parallelize_hostnames', 10, 2);

function pi_get_hostnames() {
	global $hostnames;
	if (empty($hostnames)) $hostnames = explode(' ', get_option('parallelize_hostnames'));
	return $hostnames;
}

function pi_admin_menu() {
	add_options_page('Parallelize Options', 'Parallelize', 'administrator', 'parallelize_options', 'pi_options_page');
}

function pi_options_page() {
	echo '<div class="wrap">';
	echo '<h2>Parallelize Options</h2>';

	// update posts	
	if (isset($_POST['pi_update'])) {
		echo '<h3>Update image links in posts</h3>';
		global $current_hostname;	
		$posts = get_posts('post_type=any&numberposts=-1');
		$pattern = '|<img.*src="http://(' . $current_hostname . ')([A-Za-z0-9-\/\._\-\+]+)"|';
		
		echo '<ol>';
		
		foreach ($posts as $post) {
			echo '<li><strong>' . $post->ID . ':</strong> ' . $post->post_title;
			$newpost = preg_replace_callback($pattern, 'pi_new_hostnames', $post->post_content);
			if ($newpost != $post->post_content) {
				wp_update_post(array('ID' => $post->ID, 'post_content' => $newpost));
				echo ' <strong>Updated</strong>';				
			}
			echo '</li>';
		}
		
		echo '</ol>';
		echo '<strong>Success!!!</strong>';
		
	} else if (isset($_POST['pi_revert'])) {
		echo '<h3>Revert image links in posts</h3>';	
		global $current_hostname;
		$hostnames = pi_get_hostnames();
		$posts = get_posts('post_type=any&numberposts=-1');
		$pattern = '^<img.*src="http://(' . implode('|', $hostnames) . ')^';
		
		
		echo '<ol>';
		
		foreach ($posts as $post) {
			echo '<li><strong>' . $post->ID . ':</strong> ' . $post->post_title;
			$newpost = preg_replace_callback($pattern, 'pi_old_hostname', $post->post_content);
			if ($newpost != $post->post_content) {
				wp_update_post(array('ID' => $post->ID, 'post_content' => $newpost));
				echo ' <strong>Updated</strong>';				
			}
			echo '</li>';
		}
		
		echo '</ol>';
		echo '<strong>Success!!!</strong>';
	} else {
		if (isset($_POST['pi_options'])) {
			$newhostnames = trim(implode(' ', $_POST['hostname']));
			update_option('parallelize_hostnames', $newhostnames);
			echo '<div class="updated fade"><p>Settings saved.</p></div>';

		}
		?>
		
		<?php $hosts = explode(' ', get_option('parallelize_hostnames')); ?>		
		<p>Parallelize will spread image requests to your site across multiple hostnames. Before removing a hostname from the list, you should revert all posts to the default hostname. After the new hostnames are saved, you can re convert them.</p>
		<p>hostnames are assumed to have the same directory structure as your main wordpress installation.</p>
		<h3>Hostnames</h3>
		<p>Please enter your hostnames for serving images, without <em>http://</em></p>
		<form action="" method="post">
			<p>
				<input type="text" name="hostname[]" value="<?php echo $hosts[0]; ?>" />
				<input type="text" name="hostname[]" value="<?php echo $hosts[1]; ?>" />
				<input type="text" name="hostname[]" value="<?php echo $hosts[2]; ?>" />
				<input type="text" name="hostname[]" value="<?php echo $hosts[3]; ?>" />
				<input type="text" name="hostname[]" value="<?php echo $hosts[4]; ?>" />
				<input type="text" name="hostname[]" value="<?php echo $hosts[5]; ?>" />
				<input type="text" name="hostname[]" value="<?php echo $hosts[6]; ?>" />
				<input type="text" name="hostname[]" value="<?php echo $hosts[7]; ?>" />
				<input type="text" name="hostname[]" value="<?php echo $hosts[8]; ?>" />
				<input type="text" name="hostname[]" value="<?php echo $hosts[9]; ?>" />
			</p>
			<p>
				<input type="submit" class="button-primary" name="pi_options" value="Update Options" />
			</p>
		</form>
		
		<h3>Update posts</h3>
		<p>You can use this tool to update the image urls in existing posts.<br />
		<strong>Warning!</strong> This mught take a while.</p>

		<form action="" method="post">
			<p><input type="submit" class="button-primary" name="pi_update" value="Update Posts" /></p>
		</form>
		
		<h3>Restore posts</h3>
		<p>You can use this tool to restore images back to the original hostname. You muxt do this before disabling the plugin, or when removing a hostname from the list.<br />
		<strong>Warning!</strong> This mught take a while.</p>
		<form action="" method="post">
			<p><input type="submit" class="button-primary" name="pi_revert" value="Restore Posts" /></p>
		</form>		
		<?php
	}
	 
	echo '</div>';

}

function pi_new_hostnames($args) {
	$host = par_get_hostname(basename($args[2]));
	$result = str_replace($args[1], $host, $args[0]);
	return $result;
}

function pi_old_hostname($args) {
	global $current_hostname;
	$result = str_replace($args[1], $current_hostname, $args[0]);
	return $result;
}

function parallelize_hostnames($url, $id) {
	global $current_hostname;
	$hostname = par_get_hostname($url);
	$url =  str_replace($current_hostname, $hostname, $url);
	return $url;
}


function par_get_hostname($name) {
	$hostnames = pi_get_hostnames();
	$host = abs(crc32(basename($name)) % count($hostnames));
	$hostname = $hostnames[$host];
	return $hostname;
}


?>