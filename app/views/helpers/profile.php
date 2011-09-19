<?php
class ProfileHelper extends AppHelper {
	function image($profile) {
		$photo_url = '/img/staff/profile' . $profile['Profile']['id'] . '.png';
		
		if (!fileExistsInPath($photo_url)) {
			$photo_url = '/img/staff/no_image.jpg';
		}
		
		return "<img src=\"{$photo_url}\" alt=\"{$profile['Profile']['full_name']} Profile Picture\">";
	}
	
	function status($profile) {
		return ucfirst($profile['Profile']['status']);
	}
	
	function duties($profile) {
		return split("\n", $profile['Profile']['duties']);
	}
}