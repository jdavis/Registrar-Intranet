<?php 

class AppError extends ErrorHandler {
	function error404($params) {
		var_dump('404 called!');
		parent::error404($params);
	}
}