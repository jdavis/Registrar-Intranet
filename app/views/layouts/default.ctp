<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

	<?php echo $this->Html->charset(); ?>
	<?php echo $html->meta('icon'); ?>
	<title>
		<?php echo $title_for_layout; ?> - The Office of the Registrar Intranet
	</title>
	

	<?php echo $html->css('main');?>
	
	<?php echo $html->css('print', 'stylesheet', array('media' => 'print'));?>
	
	<?php echo $html->css('misc');?>
	
	<?php echo $javascript->link('jquery-1.4.2.min.js', true);?>
	
	<?php echo $javascript->link('jquery-ui-1.8.5.custom.min.js', true);?>
	
	<?php echo $javascript->link('misc.js', true);?>
	
	<?php echo $javascript->link('master.js', true);?>
	
	<?php echo $javascript->link('timepicker.js', true);?>
	<script type="text/javascript" src="/js/aloha/aloha/aloha.js"></script>
	<?php echo $scripts_for_layout;?>
	
</head>

<body>
<div id="container">
	<div id="header">
		<div id="index"> 
			<ul>
				<li><a href="http://www.iastate.edu/index/alpha/A.shtml" id="indexlabel">INDEX</a></li> 
			<?php foreach(range('A', 'Z') as $c): ?>
				<li><a href="<?php echo "http://www.iastate.edu/index/alpha/$c.shtml"; ?>"><?php echo $c; ?></a></li>
			<?php endforeach; ?>
			</ul>
		</div> 
		
		<div id="logo">
			<?php echo $html->image("logo.png", array( "alt" => "Office of the Registrar",
				'url' => array('controller' => 'pages', 'action' => 'home'))); ?>
		</div>
		
		<ul id="navigation">
			<li><a href="/">Home</a></li>
			<li><a href="/announcements">Announcements</a></li>
			<li><a href="/staff">Staff</a></li>
			<li><a href="/news">News</a></li>
			<li><a href="/outreaches">Outreach</a></li>
			<li><a href="/documents">Documents</a></li>
		</ul>
		<ul id="account">
			<li>
				<a href="/staff/logout">Log Out</a>
			</li>
			<li>
				<a href="/settings">Settings</a>
			</li>
		</ul>
	</div>
	
<?php echo $this->Session->flash(); ?>
<?php echo $content_for_layout; ?>
	
	<div id="footer">
		Ames, IA 50011-2028, (515) 294-2223<br />
		The Office of Registrar, <a href="mailto:registrar@iastate.edu">registrar@iastate.edu</a>.<br />
		Copyright &copy; 1995-<? echo date("Y"); ?>, Iowa State University of Science and Technology. All rights reserved.<br/>
		Commit.
	</div>
	<?php #debug($this); ?>
</div>
</body>
</html>
