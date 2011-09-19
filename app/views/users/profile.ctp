<?php
$profileFields = array(
	'title' => 'Title',
	'birthday' => 'Birthday',
);
$contactFields = array(
	'email' => 'Email',
	'cell_phone' => 'Cell Phone',
	'home_phone' => 'Home Phone',
);
?>
<div id="content">
	<div id="profile">
		<h1><?php echo $user['Profile']['full_name']; ?></h1>
		<?php
			$photo_path = '/img/staff/profile' . $user['User']['id'] . '.png';
			
			if (fileExistsInPath($photo_path)) {
				echo $html->image($photo_path, array('alt' => $user['User']['username'] . ' profile image'));
			} else {
				echo $html->image('/img/staff/no_image.jpg', array(
					'alt' => 'no profile image',
				));
			}
		?>
		
		<dl>
			<dd><span>Personal Info</span><dd>
		<?php foreach ($profileFields as $key => $value):?>
			<dt><?php echo $value;?>:</dt>
				<dd><?php echo $user['Profile'][$key] ?></dd>
		<?php endforeach; ?>
		</dl>
		
		<dl>
			<dd><span>Contact Info</span><dd>
		<?php foreach ($contactFields as $key => $value):?>
			<dt><?php echo $value;?>:</dt>
				<dd><?php echo $user['Profile'][$key] ?></dd>
		<?php endforeach; ?>
		</dl>
		<?/*
		<dl>
			<dd><span>Emergency Contacts</span><dd>
		<?php foreach ($user['EmergencyContact'] as $key => $value):?>
			<dt><?php echo $value;?>:</dt>
				<dd><?php echo $user['Profile'][$key] ?></dd>
		<?php endforeach; ?>
		</dl>*/
		?>
	</div>
	<div id="clear"></div>
</div>