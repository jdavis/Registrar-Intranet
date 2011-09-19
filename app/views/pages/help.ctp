<div class="grid-19"> 
						<div class="header gutter"> 
			<h1>PHP Template</h1> 
			
		</div> 
				<div class="gutter"> 
<div class="toc"> 
	<ul type="none"> 
		<li><span>1</span> <a href="#overview">Overview</a></li> 
		<li><span>2</span> <a href="#setup">Setup</a></li> 
		<li> 
			<span>3</span> <a href="#php">PHP</a> 
			<ul type="none"> 
				<li><span>3.1</span> <a href="#headers">Headers</a></li> 
				<li><span>3.2</span> <a href="#sidebars">Sidebars</a></li> 
				<li><span>3.3</span> <a href="#navigation">Navigation</a></li> 
			</ul> 
		</li> 
		<li><span>4</span> <a href="#html">HTML</a></li> 
		<li><span>5</span> <a href="#download">Download</a></li> 
	</ul> 
</div> 
<h2 id="overview">Overview</h2> 
<p> 
	The <strong>PHP Template</strong> contains public assets (images,
	stylesheets) and php classes to quickly create new pages with a uniform
	look while still being able to customize groups of pages or each individual
	page.
</p> 
<ol> 
	<li> 
		<code>Webdev\Template</code> defines the core templating
		functionalities
	</li> 
	<li> 
		<code>Webdev\DepartmentTemplate</code> defines a generic html look for
		the new ISU Template
		<ul> 
			<li>Extends <code>Webdev\Template</code></li> 
		</ul> 
	</li> 
	<li> 
		<code>Webdev\Page</code> sets up the final page for each sub-page in
		that cateogry.
		<ul> 
			<li>Extends <code>Webdev\DepartmentTemplate</code></li> 
			<li>This is the class you should be creating and modifying</li> 
		</ul> 
	</li> 
</ol> 
 
<h2 id="setup">Setup</h2> 
<p> 
	Installation is fairly simple. Included in the package are the following files:
</p> 
<pre>webdev-php-template/
 |- template/
 |   |- department.inc.php
 |   |- main.inc.php
 |   `- template.inc.php
 `- www/
     |- css/
     |   `- base.css
     |- img/
     |   `- sprite.png
     `- homepage.php</pre> 
<ol> 
	<li>Copy the contents of <code>template/</code> and <code>www/</code> to the appropriate places</li> 
	<li>Modify <code>template/main.inc.php</code> to personalize your template and duplicate this file to create different templates</li> 
	<li>Place site content in <code>www/homepage.php</code> and duplicate this file to create additional pages</li> 
</ol> 
 
<h2 id="php">PHP</h2> 
<p> 
	All pages are created with the <code>Webdev\Page</code> class.
</p> 
<pre class="nows"><span style="color: #000000"> 
<span style="color: #0000BB">&lt;?<br /></span><span style="color: #FF8000">//&nbsp;Include&nbsp;the&nbsp;template&nbsp;file&nbsp;used&nbsp;to&nbsp;draw&nbsp;this&nbsp;page<br /></span><span style="color: #007700">require(</span><span style="color: #DD0000">'../template/main.inc.php'</span><span style="color: #007700">);<br /><br /></span><span style="color: #FF8000">//&nbsp;Instantiate&nbsp;a&nbsp;page&nbsp;object&nbsp;with&nbsp;the&nbsp;page&nbsp;title<br /></span><span style="color: #0000BB">$page&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">Webdev</span><span style="color: #007700">\</span><span style="color: #0000BB">Page</span><span style="color: #007700">(</span><span style="color: #DD0000">'Hello&nbsp;World!'</span><span style="color: #007700">);<br /><br /></span><span style="color: #FF8000">//&nbsp;Different&nbsp;ways&nbsp;to&nbsp;set&nbsp;options<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">[</span><span style="color: #DD0000">'showRightSidebar'</span><span style="color: #007700">]&nbsp;=&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">setOption</span><span style="color: #007700">(</span><span style="color: #DD0000">'showRightSidebar'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">setOptions</span><span style="color: #007700">(array(</span><span style="color: #DD0000">'showRightSidebar'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">));<br /><br /></span><span style="color: #FF8000">//&nbsp;Adding&nbsp;stylesheets<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">addStyle</span><span style="color: #007700">(</span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">baseUrl&nbsp;</span><span style="color: #007700">.</span><span style="color: #DD0000">'css/extra.css'</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'screen'</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">addStyle</span><span style="color: #007700">(</span><span style="color: #DD0000">'&lt;link&nbsp;href="'</span><span style="color: #007700">.&nbsp;</span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">baseUrl&nbsp;</span><span style="color: #007700">.</span><span style="color: #DD0000">'css/extra.css"&nbsp;rel="stylesheet"&gt;'</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">addStyle</span><span style="color: #007700">(&lt;&lt;&lt;EOHTML<br /></span><span style="color: #DD0000">&lt;style&gt;<br />/*&nbsp;...&nbsp;*/<br />&lt;/style&gt;<br /></span><span style="color: #007700">EOHTML<br />);<br /><br /></span><span style="color: #FF8000">//&nbsp;Adding&nbsp;scripts<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">addScript</span><span style="color: #007700">(</span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">baseUrl&nbsp;</span><span style="color: #007700">.</span><span style="color: #DD0000">'js/init-charts.js'</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">addScript</span><span style="color: #007700">(&lt;&lt;&lt;EOHTML<br /></span><span style="color: #DD0000">&lt;script&gt;<br />//&nbsp;...<br />&lt;/script&gt;<br /></span><span style="color: #007700">EOHTML<br />);<br /><br /></span><span style="color: #FF8000">//&nbsp;Add&nbsp;content&nbsp;to&nbsp;the&nbsp;sidebar<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getSidebar</span><span style="color: #007700">(</span><span style="color: #DD0000">'left'</span><span style="color: #007700">)-&gt;</span><span style="color: #0000BB">add</span><span style="color: #007700">(</span><span style="color: #DD0000">'news'</span><span style="color: #007700">,&nbsp;&lt;&lt;&lt;EOHTML<br /></span><span style="color: #DD0000">&lt;div&nbsp;id="news-widget"&nbsp;class="sidebar-item"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;h4&nbsp;class="title"&gt;News&lt;/h4&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;/p&gt;<br />&lt;/div&gt;<br /></span><span style="color: #007700">EOHTML<br />);<br /><br /></span><span style="color: #FF8000">//&nbsp;Modify&nbsp;navigation&nbsp;in&nbsp;the&nbsp;sidebar<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getSidebar</span><span style="color: #007700">(</span><span style="color: #DD0000">'left'</span><span style="color: #007700">)-&gt;</span><span style="color: #0000BB">get</span><span style="color: #007700">(</span><span style="color: #DD0000">'nav'</span><span style="color: #007700">)-&gt;</span><span style="color: #0000BB">add</span><span style="color: #007700">(array(</span><span style="color: #DD0000">'path'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'/sample/'</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'title'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'Sample'</span><span style="color: #007700">));<br /><br /></span><span style="color: #FF8000">//&nbsp;Draw&nbsp;the&nbsp;page&nbsp;header<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">drawHeader</span><span style="color: #007700">();<br /><br /></span><span style="color: #FF8000">//&nbsp;Draw&nbsp;the&nbsp;page&nbsp;content<br /></span><span style="color: #0000BB">?&gt;<br /></span>Welcome.<br /><span style="color: #0000BB">&lt;?<br /><br /></span><span style="color: #FF8000">//&nbsp;Draw&nbsp;the&nbsp;page&nbsp;footer<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">drawFooter</span><span style="color: #007700">();<br /></span><span style="color: #0000BB">?&gt;</span> 
</span> 
</pre><p class="note"> 
	<strong>Note:</strong> Please make sure to use email obfuscation using <code>$page-&gt;email()</code> or a similar method.
</p> 
<h3 id="headers">Headers</h3> 
<p> 
	There are three positions in the html for header items. Two are in the
	<code>&lt;head&gt;</code> element called <strong>head</strong> and
	<strong>style</strong>, the other is before the closing <code>&lt;body&gt;</code> tag called
	<strong>script</strong>. To modify these items you can use the following
	methods:
</p> 
<ul> 
	<li><code>resetHeaders()</code> - clear out all items</li> 
	<li><code>addHeader($str, $ns = 'head')</code> - append a generic html snippet to <code>&lt;head&gt;</code></li> 
	<li><code>addScript($str, $ns = 'script')</code> - include javascript. <code>$str</code> can be either the web address of the js file or an html snippet containing <code>&lt;script&gt;</code> tags</li> 
	<li><code>addStyle($str, $media = 'all', $ns = 'style')</code> - include stylesheets. <code>$str</code> can be either the web address of the css file or an html snippet containing <code>&lt;link&gt;</code> and/or <code>&lt;style&gt;</code> tags</li> 
</ul> 
<h3 id="sidebars">Sidebars</h3> 
<p> 
	By default The template allows for two sidebars on either side of the
	content pane. To show/hide sidebars set the page's <code>showLeftSidebar</code> 
	and <code>showRightSidebar</code> options. Adding html blocks to the sidebar
	is fairly simple as well:
</p> 
<pre class="nows"><span style="color: #000000"> 
<span style="color: #0000BB">&lt;?<br />$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getSidebar</span><span style="color: #007700">(</span><span style="color: #DD0000">'left'</span><span style="color: #007700">)-&gt;</span><span style="color: #0000BB">add</span><span style="color: #007700">(</span><span style="color: #DD0000">'news-items'</span><span style="color: #007700">,&nbsp;&lt;&lt;&lt;EOHTML<br /></span><span style="color: #DD0000">&lt;div&nbsp;class="sidebar-item"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&nbsp;class="title"&gt;New&nbsp;Items&lt;/h3&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;/p&gt;<br />&lt;/div&gt;<br /></span><span style="color: #007700">EOHTML<br />);<br /></span><span style="color: #0000BB">?&gt;</span> 
</span> 
</pre><p class="note"> 
	<strong>Note:</strong> All sidebar items require a class of <code>sidebar-item</code>.
</p> 
<h3 id="navigation">Navigation</h3> 
<p> 
	A standard <code>Webdev\Navigation</code> class is provided to dynamically
	generate navigation links.
</p> 
<pre class="nows"><span style="color: #000000"> 
<span style="color: #0000BB">&lt;?<br />$navNode&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">Webdev</span><span style="color: #007700">\</span><span style="color: #0000BB">Navigation</span><span style="color: #007700">(&lt;&lt;&lt;EOHTML<br /></span><span style="color: #DD0000">&lt;section&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;section&nbsp;path="/"&nbsp;title="Homepage"/&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;section&nbsp;path="/menu/"&nbsp;title="Menu&nbsp;Item"&nbsp;showchildren="true"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;section&nbsp;path="/menu/submenu/"&nbsp;title="Sub&nbsp;Menu&nbsp;Item"/&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;/section&gt;<br />&lt;/section&gt;<br /></span><span style="color: #007700">EOHTML<br />);<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getSidebar</span><span style="color: #007700">(</span><span style="color: #DD0000">'left'</span><span style="color: #007700">)-&gt;</span><span style="color: #0000BB">add</span><span style="color: #007700">(</span><span style="color: #DD0000">'nav'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$navNode</span><span style="color: #007700">);<br /></span><span style="color: #FF8000">//&nbsp;...<br /></span><span style="color: #0000BB">$page</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">getSidebar</span><span style="color: #007700">(</span><span style="color: #DD0000">'left'</span><span style="color: #007700">)-&gt;</span><span style="color: #0000BB">get</span><span style="color: #007700">(</span><span style="color: #DD0000">'nav'</span><span style="color: #007700">)-&gt;</span><span style="color: #0000BB">getParent</span><span style="color: #007700">()-&gt;</span><span style="color: #0000BB">add</span><span style="color: #007700">(array(<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'path'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'/about/'</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'title'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'About&nbsp;Us'<br /></span><span style="color: #007700">));<br /></span><span style="color: #0000BB">?&gt;</span> 
</span> 
</pre><h2 id="html">HTML</h2> 
<p> 
	Please refer to the HTML Template <a href="../html/">documentation</a> page
</p> 
 
<h2 id="download">Download</h2> 
<ul> 
	<li> 
		<a href="webdev-php-template-0.6.zip">webdev-php-template-0.6.zip</a> (v0.6, 59.4KB)
		<ul> 
			<li><strong>Changed:</strong> Removed dependency on new and unstable html5 elements</li> 
		</ul> 
	</li> 
	<li> 
		<a href="webdev-php-template-0.5.zip">webdev-php-template-0.5.zip</a> (v0.5, 59.5KB)
		<ul> 
			<li><strong>Added:</strong> The main <code>&lt;header&gt;</code> and <code>&lt;footer&gt;</code> now have <code>hwrapper</code> and <code>fwrapper</code> classes respectively</li> 
			<li><strong>Changed:</strong> Improved html markup</li> 
			<li><strong>Changed:</strong> Sidebar items now require a class of <code>sidebar-item</code></li> 
		</ul> 
	</li> 
	<li><a href="webdev-php-template-0.4.zip">webdev-php-template-0.4.zip</a> (v0.4, 59.3KB)</li> 
	<li> 
		<a href="webdev-php-template-0.3.zip">webdev-php-template-0.3.zip</a> (v0.3, 59.1KB)
		<ul> 
			<li><strong>Added:</strong> Example pages</li> 
			<li><strong>Changed:</strong> Template::renderFooter is now Template::renderPageFooter</li> 
			<li><strong>Changed:</strong> Each block of html now broken down into multiple render methods</li> 
		</ul> 
	</li> 
	<li> 
		<a href="webdev-php-template-0.2.zip">webdev-php-template-0.2.zip</a> (v0.2, 31.1KB)
		<ul> 
			<li><strong>Fixed:</strong> CSS compatibility for older browsers</li> 
		</ul> 
	</li> 
	<li><a href="webdev-php-template-0.1.zip">webdev-php-template-0.1.zip</a> (v0.1, 31.1KB)</li> 
</ul> 