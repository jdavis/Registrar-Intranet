<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="/css/base.css" media="all">
	<link rel="stylesheet" href="/css/controls.css" media="all">
	<script type="text/javascript" src="/js/aloha/aloha/aloha.js"></script>
	<script type="text/javascript" src="/js/aloha/aloha/plugins/com.gentics.aloha.plugins.Format/plugin.js"></script>
	<script type="text/javascript" src="/js/aloha/aloha/plugins/com.gentics.aloha.plugins.Table/plugin.js"></script>
	<script type="text/javascript" src="/js/aloha/aloha/plugins/com.gentics.aloha.plugins.List/plugin.js"></script>
	<script type="text/javascript" src="/js/aloha/aloha/plugins/com.gentics.aloha.plugins.Link/plugin.js"></script>
	<script type="text/javascript">
		GENTICS.Aloha.settings = {
			logLevels: {'error': true, 'warn': true, 'info': true, 'debug': false},
			errorhandling : false,
			ribbon: false,	
			"i18n": {
				// you can either let the system detect the users language (set acceptLanguage on server)
				// In PHP this would would be '<?=$_SERVER['HTTP_ACCEPT_LANGUAGE']?>' resulting in 
				// "acceptLanguage": 'de-de,de;q=0.8,it;q=0.6,en-us;q=0.7,en;q=0.2'
				// or set current on server side to be in sync with your backend system 
				"current": "en" 
			},
			"repositories": {
				"com.gentics.aloha.repositories.LinkList": {
					data: [
						{ name: 'Aloha Developers Wiki', url:'http://www.aloha-editor.com/wiki', type:'website', weight: 0.50 },
						{ name: 'Aloha Editor - The HTML5 Editor', url:'http://aloha-editor.com', type:'website', weight: 0.90  },
						{ name: 'Aloha Demo', url:'http://www.aloha-editor.com/demos.html', type:'website', weight: 0.75  },
						{ name: 'Aloha Wordpress Demo', url:'http://www.aloha-editor.com/demos/wordpress-demo/index.html', type:'website', weight: 0.75  },
						{ name: 'Aloha Logo', url:'http://www.aloha-editor.com/images/aloha-editor-logo.png', type:'image', weight: 0.10  }
					]
				}
			},
			"plugins": {
				"com.gentics.aloha.plugins.Format": {
					// all elements with no specific configuration get this configuration
					config : [ 'b', 'i','sub','sup'],
					editables : {
						// no formatting allowed for title
						'#title'	: [ ], 
						// formatting for all editable DIVs
						'div'		: [ 'b', 'i', 'del', 'sub', 'sup'  ], 
						// content is a DIV and has class .article so it gets both buttons
						'.article'	: [ 'b', 'i', 'p', 'title', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'pre', 'removeFormat']
					}
				},
				"com.gentics.aloha.plugins.List": { 
					// all elements with no specific configuration get an UL, just for fun :)
					config : [ 'ul' ],
					editables : {
						// Even if this is configured it is not set because OL and UL are not allowed in H1.
						'#title'	: [ 'ol' ], 
						// all divs get OL
						'div'		: [ 'ol' ], 
						// content is a DIV. It would get only OL but with class .article it also gets UL.
						'.article'	: [ 'ul' ]
					}
				},
				"com.gentics.aloha.plugins.Link": {
					// all elements with no specific configuration may insert links
					config : [ 'a' ],
					editables : {
						// No links in the title.
						'#title'	: [  ]
					},
					// all links that match the targetregex will get set the target
					// e.g. ^(?!.*aloha-editor.com).* matches all href except aloha-editor.com
					targetregex : '^(?!.*aloha-editor.com).*',
					// this target is set when either targetregex matches or not set
					// e.g. _blank opens all links in new window
					target : '_blank',
					// the same for css class as for target
					cssclassregex : '^(?!.*aloha-editor.com).*',
					cssclass : 'aloha',
					// use all resources of type website for autosuggest
					objectTypeFilter: ['website'],
					// handle change of href
					onHrefChange: function( obj, href, item ) {
						if ( item ) {
							jQuery(obj).attr('data-name', item.name);
						} else {
							jQuery(obj).removeAttr('data-name');
						}
					}
				},
				"com.gentics.aloha.plugins.Table": { 
					// all elements with no specific configuration are not allowed to insert tables
					config : [ ],
					editables : {
						// Allow insert tables only into .article
						'.article'	: [ 'table' ] 
					}
				}
			}
		};
		
		function saveEditable(eve, eveProperties) {
			alert('save called!');
		}
		
		GENTICS.Aloha.EventRegistry.subscribe(GENTICS.Aloha, "editableDeactivated", saveEditable);
		
		$(function(){
		  $('h1').aloha();
		});
	</script>
</script>
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
				));?>
				
					<?php echo $this->Form->input('id', array(
						'type' => 'hidden',
					));?>
					
					<?php echo $this->Form->input('parent_id', array(
						'type' => 'hidden',
					));?>
					
					<?php echo $this->Form->input('title', array(
						'type' => 'hidden',
					));?>
					
					<?php echo $this->Form->input('url', array(
						'type' => 'hidden',
					));?>
					
					<?php echo $this->Form->input('content', array(
						'type' => 'hidden',
					)); ?>
					
					<?php echo $this->Form->input('left_column', array(
						'type' => 'hidden',
					)); ?>
					
					<?php echo $this->Form->input('right_column', array(
						'type' => 'hidden',
					)); ?>
					
					<?php echo $this->Form->input('is_page', array(
						'type' => 'hidden',
						'value' => true,
					)); ?>
					
					<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $this->data['referrer']; ?>" />
					
					<?php echo $form->button('Save the Page', array(
						'type' => 'submit',
					)); ?>
				</form>
				
				<?php echo $this->Form->create('Control', array(
					'url' => '/controls/pages/add/',
				));?>
					<?php echo $this->Form->input('id', array(
						'type' => 'hidden',
					));?>
					
					<?php echo $this->Form->input('parent_id', array(
						'type' => 'hidden',
					));?>

					<?php echo $this->Form->input('title', array(
						'type' => 'hidden',
					));?>
					
					<?php echo $this->Form->input('url', array(
						'type' => 'hidden',
					));?>
					
					<?php echo $this->Form->input('content', array(
						'type' => 'hidden',
					)); ?>
					
					<?php echo $this->Form->input('left_column', array(
						'type' => 'hidden',
					)); ?>
					
					<?php echo $this->Form->input('right_column', array(
						'type' => 'hidden',
					)); ?>
					
					<?php echo $this->Form->input('is_page', array(
						'type' => 'hidden',
						'value' => true,
					)); ?>
					
					<input type="hidden" name="data[referrer]" id="referrer_link" value="<?php echo $this->data['referrer']; ?>" />
					
					<?php echo $form->button('Continue Editing', array(
						'type' => 'submit',
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
					<form method="get" action="http://google.iastate.edu/search">
						<input type="hidden" name="output" value="xml_no_dtd"/>
						<input type="hidden" name="client" value="default_frontend"/>
						<input type="hidden" name="site" value=""/>
						<input type="hidden" name="proxystylesheet" value="default_frontend"/>
						<input type="text" name="q" tabindex="1" accesskey="s" placeholder="Search"/>
						<input type="submit" name="btnG" value="" title="Search"/>
					</form>
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
		<section class="grids-24">
			<aside id="left-sidebar" class="grid-5">
				<?php echo $current_navigation; ?> 
				<?php if ($this->data['Control']['left_column']): ?>
				<article>
					<?php echo $this->data['Control']['left_column']; ?> 
				</article>
			<?php endif; ?>
			</aside>
			<article id="content" class="<?php echo ($this->data['Control']['right_column'] != '') ? 'grid-13' : 'grid-19'; ?>">
				<?php echo $this->data['Control']['content']; ?> 
			</article>
			<?php if ($this->data['Control']['right_column']): ?>
			<aside class="grid-5" id="right-sidebar">
				<?php echo $this->data['Control']['right_column']; ?>
			</aside>
			<?php endif; ?>
		</section>
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
</body>
</html>