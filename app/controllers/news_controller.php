<?php

class NewsController extends AppController {
	var $uses = array();
	function index() {
		App::import('Xml');
		$raw_xml = file_get_contents("http://news.google.com/news?ned=us&topic=h&output=rss");
		$parsed_xml = & new XML($raw_xml);

		$parsed_xml = Set::reverse($parsed_xml);

		$this->set('feed',$parsed_xml);
	}
}

?>