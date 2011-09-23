<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="/css/base.css" media="all"> 
	<link rel="stylesheet" href="/css/intraregistrar.css" media="all"> 
	<link rel="stylesheet" href="/css/jquery-ui-1.8.5.custom.css" media="all"> 
<?php foreach($controller_styles as $style): ?>
	<link rel="stylesheet" href="<?php echo $style; ?>" media="all">
<?php endforeach; ?>
	<!--[if lt IE 9]>
		<style>
			ul.left > li, ul.right > li{
				*display: inline;
			}
		</style>
		<link rel="stylesheet" href="/css/ie-fix.css">
		<script>
			(function()
			{
				var els = 'header,footer,section,aside,nav,article,hgroup,time'.split(',');
				for (var i = 0; i < els.length; i++)
					document.createElement(els[i]);
			})()
		</script>
	<![endif]--> 
	<title><?php echo $title_for_layout; ?> - Office of the Registrar Intranet</title> 
</head> 
<body> 
<!--[if lt IE 7]>
	<div style="background:#fbc118">
		<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
			<img style="display:block;margin:auto" src="http://www.theie6countdown.com/images/upgrade.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
		</a>
	</div>
<![endif]--> 
	<header> 
		<article id="top-strip">
			<?php echo $this->Session->flash(); ?> 
			<section class="grids-24"> 
				<section class="grid-8"> 
					<ul class="left"> 
						<li><a href="http://cymail.iastate.edu/">CyMail</a></li> 
						<li><a href="http://exchange.iastate.edu/">Outlook</a></li> 
						<li><a href="http://bb.its.iastate.edu/">Blackboard</a></li> 
						<li><a href="http://accessplus.iastate.edu/">AccessPlus</a></li> 
						<li><a href="http://www.registrar.iastate.edu/">Registrar</a></li> 
					</ul> 
				</section> 
				<section class="grid-16"> 
					<ul class="right"> 
						<li class="idx"><a href="http://www.iastate.edu/index/A/">A</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/B/">B</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/C/">C</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/D/">D</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/E/">E</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/F/">F</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/G/">G</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/H/">H</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/I/">I</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/J/">J</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/K/">K</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/L/">L</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/M/">M</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/N/">N</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/O/">O</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/P/">P</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/Q/">Q</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/R/">R</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/S/">S</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/T/">T</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/U/">U</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/V/">V</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/W/">W</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/X/">X</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/Y/">Y</a></li> 
						<li class="idx"><a href="http://www.iastate.edu/index/Z/">Z</a></li> 
						<li><a href="http://info.iastate.edu/">Directory</a></li> 
						<li><a href="/feedback/" id="feedback-link">Feedback</a></li> 
					</ul> 
				</section> 
			</section> 
		</article> 
		<article id="ribbon"> 
			<section class="grids-24"> 
				<section class="grid-16"> 
					<h1> 
						<a href="http://www.iastate.edu/"> 
							<img src="/img/sprite.png" alt="Iowa State University"/> 
						</a> 
					</h1> 
				</section> 
				<section class="grid-8"> 
				</section> 
				<section class="grids-24"> 
					<section class="grid-12"> 
						<h2><a href="/">The Office of the Registrar Intranet</a></h2> 
					</section> 
					<section class="grid-12"> 
						<h2></h2> 
					</section> 
				</section>
			</section> 
			<section id="main-nav" class="grids-24"> 
				<section class="grid-24"> 
					<nav> 
						<ul class="navigation"> 
						<li>
							<a href="javascript:;">Office Info</a> 
							<ul> 
								<li><a href="/announcements/">Announcements</a></li> 
								<li><a href="/calendars/">Calendar</a></li> 
								<li><a href="/documents/">Documents</a></li> 
							</ul> 
						</li>
						<li>
							<a href="javascript:;">Employees</a> 
							<ul> 
								<li><a href="/profiles/">Staff Directory</a></li> 
								<li><a href="/outreaches/">Brag Points</a></li>
							</ul> 
						</li> 
						<li>
							<a href="javascript:;">Resources</a> 
							<ul> 
								<li><a href="/help">Intranet Help</a></li>
								<li><a href="/feedback">Intranet Feedback</a></li>
							</ul> 
						</li> 
						<li>
							<a href="javascript:;">Registrar</a> 
							<ul> 
								<li><a href="/controls/">Website Controls</a></li> 
<?php						if ($this->Session->read('Profile.auth_level') >= 3): ?>
								<li><a href="/admin/">Admin Controls</a></li> 
<?php						endif; ?>
							</ul> 
						</li>
						<li>
							<a href="javascript:;">Account</a> 
							<ul> 
								<li><a href="/account/panel/">Your Account</a></li> 
								<li><a href="/account/profile/">Profile</a></li> 
								<li><a href="/account/settings/">Settings</a></li> 
								<li><a href="/account/logout/">Logout</a></li> 
							</ul> 
						</li>
						</ul> 
					</nav> 
				</section> 
				<div class="clear"></div>
			</section> 
		</article> 
	</header>
	
	<article>
	<section id="container">
		<section class="grids-24">
			<article id="content" class="grid-24">
				<section class="gutter">
					<section class="sub-nav"> 
						<ul id="breadcrumbs" class="left"> 
<?php 					for($i = 0; $i < count($sub_nav_breadcrumbs) && empty($back_link); $i++): ?>
							<li><?php echo $this->Registrar->link_for_breacrumb($i, $sub_nav_breadcrumbs); ?></li>
<?php 					endfor; ?>
						</ul>
<?php				if (!empty($back_link)): ?>
						<a class="back-link" href="<?php echo $back_link['link']; ?>">&laquo; <?php echo $back_link['title']; ?></a>
<?php				else: ?>
						<h3 class="page-title"><?php echo $sub_nav_title; ?></h3>
<?php				endif; ?>
						<ul class="actions right">
<?php 					for($i = 0; $i < count($sub_nav_buttons); $i++): ?>
							<li><?php echo $this->Registrar->link_for_subnav($i, $sub_nav_buttons); ?></li>
<?php 					endfor; ?>
						</ul>
						<ul class="right actions"> 
<?php				$selected_menus = 0; 
					$sub_nav_count = -1; ?>
<?php				foreach($sub_nav_menus as $menu) $selected_menus += ($menu['selected'] || count($menu['menu']) == 1) ? 1 : 0; ?>
<?php				foreach($sub_nav_menus as $menu_name=>$menu): ?>
<?php					if ($menu['selected'] == '' && count($menu['menu']) != 1):
							continue;
						else:
							$sub_nav_count += 1;
						endif; ?>
<?php					if ($sub_nav_count == 0 && $sub_nav_count != $selected_menus - 1): $menu_class = 'left'; ?>
<?php					elseif ($sub_nav_count == $selected_menus - 1 && $sub_nav_count != 0): $menu_class = 'right'; ?>
<?php					else: $menu_class = ''; ?>
<?php					endif; ?>
<?php					if (count($menu['menu']) == 1): ?>
<?php						foreach($menu['menu'] as $menu_key=>$menu_value): ?>
<?php							if (is_string($menu_value)): ?>
									<li><a class="<?php echo $menu_class; ?>" href="<?php echo $menu_value . $menu['params']; ?>"><?php echo $menu_key . $menu['title_params']; ?></a></li>
<?php							else: ?>
<?php								$link = ''; ?>
<?php								$link .= isset($menu_value['start']) ? $menu_value['start'] : ''; ?>
<?php								$link .= $menu['params']; ?>
<?php								$link .= isset($menu_value['end']) ? $menu_value['end'] : ''; ?>
									<li><a class="<?php echo $menu_class; ?>" href="<?php echo $link; ?>"><?php echo $menu_key . $menu['title_params']; ?></a></li>
<?php							endif; ?>
<?php						endforeach; ?>
<?php					else: ?>
							<li class="menu">
								<menu class="<?php echo $menu_class; ?>">
<?php						foreach($menu['menu'] as $menu_key=>$menu_value): ?>
<?php							$active = ($menu['selected'] == $menu_key) ? ' class="active"' : ''; ?>
<?php							if (is_string($menu_value)): ?>
									<li><a<?php echo $active; ?> href="<?php echo $menu_value . $menu['params']; ?>"><?php echo $menu_key . $menu['title_params']; ?></a></li>
<?php							else: ?>
<?php								$link = ''; ?>
<?php								$link .= isset($menu_value['start']) ? $menu_value['start'] : ''; ?>
<?php								$link .= $menu['params']; ?>
<?php								$link .= isset($menu_value['end']) ? $menu_value['end'] : ''; ?>
									<li><a<?php echo $active; ?> href="<?php echo $link; ?>"><?php echo $menu_key . $menu['title_params']; ?></a></li>
<?php							endif; ?>
<?php						endforeach; ?>
<?php					endif; ?>
								</menu>
							</li>
<?php					endforeach; ?>
						</ul>
						<div class="clear"></div> 
					</section>
<?php echo $content_for_layout; ?>
					
				</section>
			</article> 
		</section> 
	</section> 
	</article>
	
	<footer class="grids-24"> 
		<section id="footer" class="grids-24"> 
			<section class="grid-3 first"> 
				<a class="nameplate" href="/"><img alt="Iowa State University" src="/img/sprite.png"></a> 
			</section> 
			<section class="grid-18"> 
				<p> 
					Ames, Iowa 50011, (515) 294-2223.
					Published by: The Office of the Registrar, <a href="mailto:registrar@iastate.edu">registrar@iastate.edu</a> 
				</p> 
				<p> 
					Copyright &copy; 1995-2011, Iowa State University of Science and Technology.
					All rights reserved. 
				</p> 
				<p>Commit</p>
			</section>
		</section> 
	</footer> 
	<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.8.5.custom.min.js"></script>
	<script type="text/javascript" src="/js/base.js"></script>
<?php foreach($controller_scripts as $script): ?>
	<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php endforeach; ?>
</body> 
</html>
