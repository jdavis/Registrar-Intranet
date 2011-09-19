<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="http://www.registrar.iastate.edu/redux/cake/css/base.css" media="all">
	<link rel="stylesheet" href="/css/controls.css" media="all">
	<link rel="stylesheet" href="http://www.registrar.iastate.edu/redux/cake/css/registrar.css" media="all">
	<!--[if lte IE 8]>
		<style>
			#ribbon form > input[name="q"]{
				color: #000;
			}
			ul.left > li, ul.right > li{
				*display: inline;
			}
		</style>
		<script>
			(function()
			{
				var els = 'header,footer,section,aside,nav,article,hgroup,time,figure,figcaption'.split(',');
				for (var i = 0; i < els.length; i++)
					document.createElement(els[i]);
			})();
		</script>
	<![endif]--> 
</head>
<body>
	<section class="skip"><a accesskey="2" href="#container">Skip Navigation</a></section>
	<header>
		<section id="top-strip">
			<section id="preview">
				<?php echo $this->Form->create('Control', array(
					'url' => '/controls/pages/save/',
					'id' => 'save-page',
					'inputDefaults' => array(
						'div' => false,
					),
				));?>
				
					<?php echo $this->Form->input('id', array(
						'type' => 'hidden',
					));?>
					
					<?php echo $this->Form->input('parent_id', array(
						'options' => $current_navigation->html_options(),
						'label' => false,
					));?>
					
					<?php echo $this->Form->input('title');?>
					
					<?php echo $this->Form->input('url');?>
					
					<?php echo $this->Form->input('content', array(
						'type' => 'hidden',
						'id' => 'content-input',
					)); ?>
					
					<?php echo $this->Form->input('left_column', array(
						'type' => 'hidden',
						'id' => 'left-column-input',
					)); ?>
					
					<?php echo $this->Form->input('right_column', array(
						'type' => 'hidden',
						'id' => 'right-column-input',
					)); ?>
					
					<?php echo $this->Form->input('is_page', array(
						'type' => 'hidden',
						'value' => true,
					)); ?>
					
					<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $back_link['link']; ?>" />
					
					<?php echo $form->button('Add Left Column', array(
						'type' => 'button',
						'id' => 'add-left-column',
					)); ?> 
					<?php echo $form->button('Add Right Column', array(
						'type' => 'button',
						'id' => 'add-right-column',
					)); ?> 
					<?php echo $form->button($form_save, array(
						'type' => 'submit',
					)); ?>
					<?php echo $form->button($form_close, array(
						'type' => 'button',
						'class' => 'cancel-action enabled-javascript',
					)); ?> 
				</form>
			</section>
			<section class="grids-24">
				<section class="grid-8">
					<ul class="left">
						<li><a href="http://cymail.iastate.edu/">CyMail</a></li>
						<li><a href="http://exchange.iastate.edu/">Outlook</a></li>
						<li><a href="http://bb.its.iastate.edu/">Blackboard</a></li>
						<li><a href="http://accessplus.iastate.edu/">AccessPlus</a></li>
					</ul>
				</section>
				<section class="grid-16">
					<ul class="right">
						<li class="idx"><a href="http://www.iastate.edu/index/A/">A</a></li><li class="idx"><a href="http://www.iastate.edu/index/B/">B</a></li><li class="idx"><a href="http://www.iastate.edu/index/C/">C</a></li><li class="idx"><a href="http://www.iastate.edu/index/D/">D</a></li><li class="idx"><a href="http://www.iastate.edu/index/E/">E</a></li><li class="idx"><a href="http://www.iastate.edu/index/F/">F</a></li><li class="idx"><a href="http://www.iastate.edu/index/G/">G</a></li><li class="idx"><a href="http://www.iastate.edu/index/H/">H</a></li><li class="idx"><a href="http://www.iastate.edu/index/I/">I</a></li><li class="idx"><a href="http://www.iastate.edu/index/J/">J</a></li><li class="idx"><a href="http://www.iastate.edu/index/K/">K</a></li><li class="idx"><a href="http://www.iastate.edu/index/L/">L</a></li><li class="idx"><a href="http://www.iastate.edu/index/M/">M</a></li><li class="idx"><a href="http://www.iastate.edu/index/N/">N</a></li><li class="idx"><a href="http://www.iastate.edu/index/O/">O</a></li><li class="idx"><a href="http://www.iastate.edu/index/P/">P</a></li><li class="idx"><a href="http://www.iastate.edu/index/Q/">Q</a></li><li class="idx"><a href="http://www.iastate.edu/index/R/">R</a></li><li class="idx"><a href="http://www.iastate.edu/index/S/">S</a></li><li class="idx"><a href="http://www.iastate.edu/index/T/">T</a></li><li class="idx"><a href="http://www.iastate.edu/index/U/">U</a></li><li class="idx"><a href="http://www.iastate.edu/index/V/">V</a></li><li class="idx"><a href="http://www.iastate.edu/index/W/">W</a></li><li class="idx"><a href="http://www.iastate.edu/index/X/">X</a></li><li class="idx"><a href="http://www.iastate.edu/index/Y/">Y</a></li><li class="idx"><a href="http://www.iastate.edu/index/Z/">Z</a></li>
						<li><a href="http://info.iastate.edu/">Directory</a></li>
						<li><a href="http://www.iastate.edu/contact-us/">Contact Us</a></li>
					</ul>
				</section>
			</section>
		</section>
		<section id="ribbon">
			<section class="grids-24">
				<section class="grid-16">
					<h1 class="nameplate">
						<a href="http://www.iastate.edu/" accesskey="1">
							<img src="/img/sprite.png" alt="Iowa State University"/>
						</a>
					</h1>
				</section>
				<section class="grid-8">
				</section>
			</section>
			<section class="grids-24">
				<section class="grid-12">
					<h2 class="site-title"><a href="/">The Office of the Registrar</a></h2>
				</section>
				<section class="grid-12">
					<h2 class="site-tagline"></h2>
				</section>
			</section>
		</section>
	</header>
	<article id="container">
		<section id="container-content" class="grids-24">
			<aside id="left-sidebar" class="grid-5">
				<?php echo $current_navigation; ?>
<?php		if (!empty($this->data)): ?>
				<article id="left-column-edit" class="sidebar-item"><?php echo $this->data['Control']['left_column']; ?></article>
			</aside>
			<div class="grid" id="content-edit"><?php echo $this->data['Control']['content']; ?></div>
			<article id="right-sidebar-edit"><?php echo $this->data['Control']['right_column']; ?></article>
<?php		else: ?>
				<article id="left-column-edit" class="sidebar-item"></article>
			</aside>
			<div class="grid" id="content-edit"><div id="content" class="grid-13"></div></div>
			<article id="right-sidebar-edit" style="float: left;"></article>
<?php 		endif; ?>
		</section>
	</article>
	<article id="containable-editable" class="grids-24" style="display: none;">
		<textarea class="tabby" id="editable" style="font: 100% Courier, monospace; width: 98%;"></textarea>
	</article>
	<footer class="grids-24">
		<section id="footer" class="grids-24">
			<section class="grid-3 first">
				<a class="nameplate" href="/"><img alt="Iowa State University" src="/img/sprite.png"></a>
			</section>
			<section class="grid-21 last">
				<p>The Office of the Registrar, Ames, IA, (515) 294-1840, registrar@iastate.edu.</p>
				<p>
					Copyright &copy; 1995-2011, Iowa State University of Science and Technology.
					All rights reserved. 
				</p>
			</section>
		</section>
	</footer>
	<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.8.5.custom.min.js"></script>
	<script type="text/javascript" src="/js/base.js"></script>
	<script type="text/javascript" src="/js/autoresize.jquery.min.js"></script>
	<script type="text/javascript" src="/js/tabby.jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			function noClick() { return false; }
			
			$('a').bind('click', noClick);
			
			function registerEditable(element, parent) {
				$(element)
					.bind('click', function contentEdit(event) {
						var currentElement = this;
						if (parent)
							var previousContent = $(this).parent().html().replace(' style="background-color: rgb(183, 214, 250); "', '');
						else
							var previousContent = $(this).html().replace(' style="background-color: rgb(183, 214, 250); "', '');
							
						var rows = previousContent.split("\n").length + 5;
						
						$('#container').toggle();
						$('#containable-editable').toggle();
						$('#editable')
							.focus()
							.blur(function(event) {
								$('#container').toggle();
								$('#containable-editable').toggle();
								
								var htmlText = $(this).val().replace(' style="background-color: white; "', '');
								
								if (parent) {
									var eleParent = $(currentElement).parent();
									$(eleParent).html(htmlText);
									registerEditable($(eleParent).children(':first-child'), true);
								} else {
									$(currentElement).html(htmlText);
								}
								$(this).unbind('blur');
							})
							.val(previousContent)
							.attr('rows', rows);
						})
					.bind('mouseenter', function() {
						$(this).css('background-color', '#B7D6FA');
					})
					.bind('mouseleave', function() {
						$(this).css('background-color', 'white');
					});
			}
			
			registerEditable($('#content'), true);
			registerEditable($('#right-sidebar'), true);
			registerEditable($('#left-column-edit'), false);
			
			$('#save-page').bind('submit', function() {
				$('#content-input').val($('#content-edit').html());
				$('#right-column-input').val($('#right-sidebar-edit').html());
				$('#left-column-input').val($('#left-column-edit').html());
			});
			
			$('#add-left-column').bind('click', function() {
				if ($('#left-column-edit').html() == '') {
					$('#left-column-edit').html('<div class="sidebar-item">\n\t<h4 class="title">Sample Header</h4>\n\t<p>\n\t\tSample Text\n\t</p>\n</div>');
					$('#left-column-edit').click();
					$(this).text('Remove Left Column');
				} else {
					$('#left-column-edit').html('');
					$(this).text('Add Left Column');
				}
			});
			
			$('#add-right-column').bind('click', function() {
				if ($('#right-sidebar-edit').html() == '') {
					$('#right-sidebar-edit').html('<div class="grid-5" id="right-sidebar">\n\t<div class="sidebar-item">\n\t\t<h3 class="title">Sample Header</h3>\n\t\t<p>\n\t\t\tSample Content\n\t\t</p>\n\t</div>\n</div>');
					registerEditable($('#right-sidebar'), true);
					$('#right-sidebar').click();
					$(this).text('Remove Right Column');
				} else {
					$('#right-sidebar-edit').html('');
					$(this).text('Add Right Column');
				}
			});
			
			if ($('#right-sidebar-edit').html() != '') $('#add-right-column').text('Remove Right Column');
			if ($('#left-column-edit').html() != '') $('#add-left-column').text('Remove Left Column');
		});
	</script>
</body>
</html>