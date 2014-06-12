<?php

class directorio
{ 
	function getListaArchivos()
	{
		$path = "C:/wamp/www/cargador/files/";
		$directorio = dir($path);
		

		return $directorio;			
	}
}

?>