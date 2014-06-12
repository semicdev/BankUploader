<?php

class datos 
{
	function getAnyo()
	{
		$datosAnyo = array("auscultacion"=>"2013", "entrega"=>"2014");	  				
		return $datosAnyo;
	}

	function getGeo($latitud,$longitud,$elevacion,$x,$y,$rango,$tipo)
	{
		$datosGeo = array('latitud' => $latitud,
						  'longitud' => $longitud,
						  'elevacion' => $elevacion,
						  'x' => $x,
						  'y' => $y,
						  'rango' => $rango,
						  'loc' => array("latitud"=>$latitud,"longitud"=>$longitud),
						  'tipo' => $tipo
						  );
		return $datosGeo;
	}



}