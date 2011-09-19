<?php
/**
 * Registrar
 *
 * @package		Registrar
 * @author		Josh Davis
 * @copyright	Copyright (c) 2010 - 2011
 * @link		http://www.registrar.iastate.edu
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Ark_Navigation
 *
 * The library to generate the navigation links.
 *
 * @package		Registrar
 * @subpackage	Libs
 * @category	Ark_Navigation
 * @since		Version 1.2
 * @author		Josh Davis
 */

 function childCmp($c1, $c2) {
	if ($c1->attr['order'] == $c2->attr['order']) return 0;
	return ($c1->attr['order'] < $c2->attr['order']) ? -1 : 1;
 }
 
class Ark_Navigation {
	private $parent;
	private $children = array();
	public $attr;
	private $isRoot = false;
	private $selected = false;
	private $db;
	
	function __construct($nav = null, $parent = null, $results = null) {
		$this->parent = &$parent;
		
		if ($nav == null) {
			// Setup the root node info
			$this->isRoot = true;
			$this->selected = true;
			$this->spare_nodes = array();
			$this->attr = array('id' => '', 'order' => 1);
			
			foreach($results as $result) {
				if (isset($result['Page'])) $result = $result['Page'];
				elseif (isset($result['Control'])) $result = $result['Control'];
				
				if (!$this->addChild($result)) {
					array_push($this->spare_nodes, $result);
				}
			}
			
			$inf_protector = 0;
			
			while(!empty($this->spare_nodes)) {
				$temp_nodes = array();
				foreach($this->spare_nodes as $node) {
					if (!$this->addChild($node))
						array_push($temp_nodes, $node);
				}
				
				$this->spare_nodes = $temp_nodes;
				
				$inf_protector += 1;
				
				if ($inf_protector > 500) break;
			}

		} else {
			$this->attr = $nav;
		}
		
		$this->sort();
	}
	
	function createLink($link, $title, $parent = 0) {
		// TODO: Sanitize the input!
		
		//	Create a new nav element to save
		$new_nav = array(
			'parent_id' => $parent,
			'title' => $title,
			'link' => $link,
		);
		
		$this->db->save('navigation', $new_nav);
		
		// Update the variable in the Cache so we know that it has been modified recently.
		$this->db->touch('cache', 'navigation');
		
		return true;
	}
	
	function deleteLink($id) {
		$this->db->delete('navigation', $id);
		
		// Update the variable in the Cache so we know that it has been modified recently.
		$this->db->touch('cache', 'navigation');
	}
	
	function sort() {
		uasort($this->children, 'childCmp');
		
		foreach ($this->children as $child) {
			uasort($child->children, 'childCmp');
		}
	}
	
	function addChild($nav) {
		$parent_url = substr($nav['id'], 0, strlen($nav['id']) - strlen(substr(strrchr($nav['id'], '/'), 1)) - 1);
		
		if ($parent_url === '' || strpos($this->attr['id'], $parent_url) === 0) {
			$this->children[] = new Ark_Navigation($nav, $this);
			return true;
		}
		
		foreach($this->children as $child) {
			$found = $child->addChild($nav);
			
			if ($found) return true;
		}
		
		return false;
	}
	
	function select($uri_components, $depth = 0) {
		$this->selected = true;
		$uri = '/' . implode($uri_components, '/');

		if ($uri === $this->attr['id']) return true;
		
		foreach($this->children as $child) {
			if ($child->attr['id'] === '/') {
				if ($uri === '/') return $child->select($uri_components);
				else continue;
			}
			if (strpos($uri . '/', $child->attr['id'] . '/') === 0)
				return $child->select($uri_components, $depth + 1);
		}
		
		return false;
	}
	
	function address() {
		$current = $this;
		$href = '/';
		
		// Move back up through the parents and construct the address
		do {
			$href = "{$current->attr['url_id']}$href";
			$current = $current->parent;
		} while($current->parent);
		
		return DIR_OFFSET . $href;
	}
	
	function html_options($depth = 0) {
		$options = array('/' => '----');
		
		$indent = '';
		for($i = 0; $i < $depth; $i++) $indent .= "----";
		
		foreach($this->children as $child) {
			if ($child->attr['id'] == '') continue;
			
			$options[$child->attr['id']] = $indent . ' ' . $child->attr['title'];
			#\debug($indent . '- ' . $child->attr['title']);
			$options = array_merge($options, $child->html_options($depth + 1));
		}
		
		return $options;
	}
	
	function __toString() {
		$html_nodes = array();
		
		if (isset($this->attr['title']) && !isset($this->attr['span'])) {
			// List elements should be tabbed only if their parent isn't the root
			$tab = isset($this->parent->attr['title']) ? "\t" : '';
			$select = $this->selected ? ' class="selected"' : '';
			
			// Construct our li element
			$offset = '/redux/cake';
			$node_str = "$tab<li$select><a href=\"{$offset}{$this->attr['id']}\">{$this->attr['title']}</a>";
			
			// Pretty up some of the html by adding the li on the same line
			// if there are no children
			if (!$this->children) {
				$node_str .= '</li>';
			}
			
			$html_nodes[] = $node_str;
		} elseif (isset($this->attr['span']))  {
			// List elements should be tabbed only if their parent isn't the root
			$tab = isset($this->parent->attr['title']) ? "\t" : '';
			
			// Construct our li element
			$offset = '/redux/cake';
			$node_str = "$tab<li><span class=\"heading\">{$this->attr['title']}</span>";
			
			// Pretty up some of the html by adding the li on the same line
			// if there are no children
			if (!$this->children) {
				$node_str .= '</li>';
			}
			
			$html_nodes[] = $node_str;
		}
		
		if ($this->children) {
			if ($this->selected) {
				if ($this->isRoot)
					$html_nodes[] = "<ul class=\"navigation\">";
				else
					$html_nodes[] = "\t<ul>";
				
				foreach($this->children as $child) {
					$nodes = $child->__toString();
					$new_nodes = array();
					
					foreach($nodes as $line) {
						$new_nodes[] = "\t" . $line;
					}
					
					$html_nodes = array_merge($html_nodes, $new_nodes);
				}
				
				// Oh the lengths I go to to make pretty HTML...
				if ($this->isRoot)
					$html_nodes[] = "</ul>";
				else
					$html_nodes[] = "\t</ul>";
			}
			
			if (isset($this->attr['title'])) {
				$html_nodes[] = "</li>";
			}
		}
		
		if ($this->isRoot)
			return implode("\n\t\t\t\t", $html_nodes);
		else
			return $html_nodes;
	}
}