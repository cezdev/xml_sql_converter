<?php
	function cez_autoloader($klasse){
		require_once( strtolower($klasse) . '.php');
	}

	spl_autoload_register('cez_autoloader');;
?>