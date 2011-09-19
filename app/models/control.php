<?php
class Control extends AppModel {
	var $name = 'Control';
	var $useTable = 'registrar_pages';
	
	var $validate = array(
		
	);
	
	var $validations = array(
		'news' => array(
		
		),
		'pages' => array(
		
		)
	);
	
	function afterFind($data) {
		$altered_data = array();

		// Since our Add/Edit views use some extra variables
		// we want to add them to the data array
		foreach($data as $control) {
			if (isset($control['Control']['is_page'])) {
				$url = substr(strrchr($control['Control']['id'], '/'), 1);
				$control['Control']['url'] = $url;
				
				$parent_id = '/' . trim(substr($control['Control']['id'], 0, -1* strlen($url)), '/');
				$control['Control']['parent_id'] = $parent_id;
			}
				
			// Add our newly altered event.
			array_push($altered_data, $control);
		}
		
		return $altered_data;
	}
	
	function beforeSave() {
		if (isset($this->data['Control']['is_page'])) {
			$this->setSource('registrar_pages');
			$parent = ($this->data['Control']['parent_id'] == '/') ? '' : $this->data['Control']['parent_id'];
			$this->data['Control']['id'] = $parent . '/' . trim($this->data['Control']['url'], '/');
		} elseif (isset($this->data['Control']['is_news'])) {
			$this->setSource('registrar_news');
		}
		
		foreach($this->data['Control'] as $key=>$value) {
			if (is_string($value)) {
				$this->data['Control'][$key] = trim($value);
			}
		}
		
		// No errrors, go ahead and save it.
		return true;
	}
}