<?php
/**
 * Registrar
 *
 * @package		Registrar
 * @author		Josh Davis
 * @copyright	Copyright (c) 2010 - 2011
 * @link		http://www.registrar.iastate.edu
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * RegistrarHelper
 *
 * Some functions that make things a little easier to work with.
 *
 * @package		Registrar
 * @subpackage	Helpers
 * @category	Date
 * @author		Josh Davis
 */
class RegistrarHelper extends AppHelper {
	/*
	** Used on the default.ctp layout to organize the subnavigation.
	** It spits out a link formatted to fit into the subnav.
	*/
	function link_for_subnav($i, $sub_nav) {
		// Each button gets a class depending on where it is at.
		// This aligns the buttons so they look cohesive.
		if ($i == 0) {
			if ($i == count($sub_nav) - 1) $class = '';
			else $class = 'left';
		} else if ($i == count($sub_nav) - 1) {
			$class = 'right';
		} else {
			$class = 'middle';
		}
		
		// All subnav elements should have a link and title element.
		if (isset($sub_nav[$i]['link'])) {
			$link = $sub_nav[$i]['link'];
		} else {
			$link = '';
		}
		
		if (isset($sub_nav[$i]['title'])) {
			$title = $sub_nav[$i]['title'];
		} else {
			$title = '';
		}
		
		return "<a href=\"$link\" class=\"$class\">$title</a>";
	}
	
	/*
	** Used on the default.ctp layout to display the breadcrumbs.
	** A breadcrumb is just used to show where you are at within a webpage.
	** Like Home > Calendar > Add an Event
	*/
	function link_for_breacrumb($i, $sub_nav) {
		$link = $sub_nav[$i]['link'];
		$title = $sub_nav[$i]['title'];
		
		return "<a href=\"$link\"><strong>$title</strong></a>  <strong>&#62;</strong>";
	}
	
	/*
	** This returns only the records that we want from the total list.
	*/
	function pagination($records, $page, $limit) {
		// Do some error checking...
		if ($records == null || empty($records))
			return array();
		
		return array_slice($records, ($page - 1) * $limit, $limit);
	}
	
	/*
	** This returns only the records that we want from the total list.
	*/
	function pagination_links($records, $page, $limit, $pages_to_show, $link) {
		// Make a place to store our HTML nodes
		$html_nodes = array();
		
		// Start it off with the basic div
		$html_nodes[] = '<div class="link-controls">';
		
		// Add one so even empty pages have 1 page.
		$total_pages = (int) (count($records) / $limit) + 1;
		
		// We don't need any pagination if there is only 1 page.
		if ($total_pages == 1) return '';
		
		// This prevents it from trying to show more pages than we actually have.
		if ($pages_to_show > $total_pages) $pages_to_show = $total_pages;
		
		// Side pages is the number of pages that should show up
		// on either side of the currently selected page.
		// For example, 1 2 _3_ 4 5
		// has a side_pages of two because there are two on each side.
		$side_pages = (int) ($pages_to_show / 2);
		
		// There are three different things that can occur with the pagination.
		if ($page <= $side_pages) {
			// If we are at a page that comes before the half way point
			// we don't want to center the currently selected page.
			// Instead, we want to start with 1 and just go for how ever many
			// pages we are supposed to show.
			$start_page = 1;
			$end_page = $pages_to_show;
		} elseif ($page > ($total_pages - $side_pages - 1)) {
			// This is a lot like the other one. Except we want to end
			// on the last page if we are past the half way point.
			$start_page = $total_pages - $pages_to_show + 1;
			$end_page = $total_pages;
		} else {
			// This is the default because we just want to show the
			// pages on either side of the currently selected one.
			$start_page = $page - $side_pages;
			$end_page = $page + $side_pages;
		}
		
		// Only put a link for the first page if we can't see it.
		if ($start_page > 1)
			$html_nodes[] = "<a class=\"button\" href=\"{$link}1\">First</a>";
		
		// Put a previous page button as long as there are previous pages.
		if ($page != 1)
			$html_nodes[] = '<a class="button" href="' . $link . ($page - 1) . '">&laquo;</a>';
		
		// Count up from $start_page to $enc_page and then add
		// the link for each page
		for($i = $start_page; $i <= $end_page; $i++) {
			// The current page should only be the one selected.
			$a_class = ($i == $page) ? ' current' : '';
			
			$html_nodes[] = "<a class=\"button$a_class\" href=\"$link$i\">$i</a>";
		}
		
		// Put a next page button as long as there are next pages.
		if ($page != $total_pages)
			$html_nodes[] = '<a class="button" href="' . $link . ($page + 1) . '">&raquo;</a>';
		
		// Only put a link for the Last page if we can't see it.
		if ($end_page < $total_pages)
			$html_nodes[] = "<a class=\"button\" href=\"$link$total_pages\">Last</a>";
		
		$html_nodes[] = '</div>';
		
		// Fly out at once.
		return implode($html_nodes);
	}
	
	function pretty_datetime($datetime) {
		$datetime = strtotime($datetime);
		
		$given_date = date('Y-m-d', $datetime);
		$given_time = date('Y-m-d', $datetime);
		
		// There probably is a better way to do this.
		$yesterday = date('Y-m-d', strtotime('-1 day'));
		$today = date('Y-m-d');
		$tomorrow = date('Y-m-d', strtotime('+1 day'));
		
		// Check to see if the day was yeterday, today, or tomorrow
		// else just use the standard format
		if ($given_date == $yesterday) $result = 'Yesterday';
		elseif ($given_date == $today) $result = 'Today';
		elseif ($given_date == $tomorrow) $result = 'Tomorrow';
		else $result = date('M jS', $datetime);
		
		// We only want to append the year if it isn't the current year.
		// It saves some space.
		$given_year = date('Y', $datetime);
		if ($given_year != date('Y')) $result .= ', ' . $given_year;
		
		// Append the time.
		$result .= ' at ' . date('g:ia', $datetime);
		
		return $result;
	}
}