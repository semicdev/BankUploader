<?php

class datos 
{
	function getAnyo()
	{
		$datosAnyo = array("auscultacion"=>"2013", "entrega"=>"2014");	  				
		return $datosAnyo;
	}

	function getEstacion($claveCarretera,$cont,$NOMBRE_ESTACION,$KM,$TIPO,$SENTIDO,$Lunes,$Martes,$Miercoles,$Jueves,$Viernes,$Sabado,$Domingo,
		$TDPA,$M,$A,$B,$C2,$C3,$T3S2,$T3S3,$T3S2R4,$OTROS,$AA,$BB,$CC,$D,$K_x0027_,$LAT,$LONG)
	{
	   $claveCarreteraSig  = $json[$cont+1][6];

	   if($claveCarretera == $claveCarreteraSig){

		$datosEstacion = array('NOMBRE_ESTACION' => $NOMBRE_ESTACION,
						  'KM' => $KM,
						  'TIPO' => $TIPO,
						  'SENTIDO' => $SENTIDO,
						 // 'histograma' => array("Lunes"=>$Lunes,"Martes"=>$Martes,"Miercoles"=>$Miercoles,"Jueves"=>$Jueves,"Viernes"=>$Viernes,"Sabado"=>$Sabado,"Domingo"=>$Domingo),
						  'TDPA' => $TDPA,
						  'M'=>$M,
						  'A'=>$A,
						  'B'=>$B,
						  'C2'=>$C2,
						  'C3'=>$C3,
						  'T3S2'=>$T3S2,
						  'T3S3'=>$T3S3,
						  'T3S2R4'=>$T3S2R4,
						  'OTROS'=>$OTROS,
						  'AA'=>$AA,
						  'BB'=>$BB,
						  'CC'=>$CC,
						  'D'=>$D,
						  'K_x0027_'=>$K_x0027_,
						  'LAT'=>$LAT,
						  'LONG'=>$LONG
						  );
		return $datosEstacion;
	}

}


}

________________________________________________________
despues de

generaDoc.php
<link rel="stylesheet" type="text/css" href="../bst/css/bootstrap.min.css">
<?php
include('../clases/datosAnexos.php');
$datos = new datos();

$json = $_POST['chkarray'];
$ubicacionArchivo = $_POST['nombreArchivo'];


//var_dump($json);
foreach ($json as $key => $value) {
	$json[$key] = json_decode($value);	
}

for ($cont=1; $cont<sizeof($json); $cont++) 
{
	//ESTADO
       $nombreEstado 		= $json[$cont][2];

    //CARRETERA
	   $nombreCarretera  	= $json[$cont][3];
	   $numero		 		= $json[$cont][5];
	   $claveCarretera     	= $json[$cont][6];
	   $claveCarreteraSig 	=$json[$cont+1][6];

	 		if($claveCarretera == $claveCarreteraSig)
	 			{
	 				$carreterasdoc[$cont]=$claveCarretera;
	 			}
	 			 else{
	 			$numCarreterasdif[$cont]=$claveCarretera;
	 			 }
/*
		//ESTACION
		   $NOMBRE_ESTACION	 	= $json[$cont][10];
		   $KM	 				= $json[$cont][13];	
		   $TIPO	 			= $json[$cont][11];	
		   $SENTIDO	 			= $json[$cont][12];

			//HISTOGRAMA
			   //$HISTOGRAMA	 		= $json[$cont][8];	
			   $Lunes	 			= $json[$cont][29];
			   $Martes	 			= $json[$cont][30];
			   $Miercoles	 		= $json[$cont][31];
			   $Jueves	 			= $json[$cont][32];
			   $Viernes	 			= $json[$cont][33];		
			   $Sabado	 			= $json[$cont][34];
			   $Domingo	 			= $json[$cont][35];		
		//ESTACION
			$TDPA	 			= $json[$cont][14];	 
			$M	 				= $json[$cont][15];
			$A	 				= $json[$cont][16];
			$B	 				= $json[$cont][17];
			$C2	 				= $json[$cont][18];
			$C3	 				= $json[$cont][19];
			$T3S2	 			= $json[$cont][20];
			$T3S3	 			= $json[$cont][21]; 
			$T3S2R4	 			= $json[$cont][22]; 
			$OTROS	 			= $json[$cont][23]; 
			$AA	 				= $json[$cont][24]; 
			$BB	 				= $json[$cont][25]; 
			$CC	 				= $json[$cont][26]; 
			$D	 				= $json[$cont][27];  
			$K_x0027_	 		= $json[$cont][28]; 
			$LAT	 			= $json[$cont][36]; 
			$LONG	 			= $json[$cont][37]; 

			//$Estacion  = $datos->getEstacion($nombreCarretera,$numero,$claveCarretera,$cont,$NOMBRE_ESTACION,$KM,$TIPO,$SENTIDO,$Lunes,$Martes,$Miercoles,$Jueves,$Viernes,$Sabado,$Domingo,$TDPA,$M,$A,$B,$C2,$C3,$T3S2,$T3S3,$T3S2R4,$OTROS,$AA,$BB,$CC,$D,$K_x0027_,$LAT,$LONG);

*/
/*

	   $RUTA 	 			= $json[$cont][7];	
	   $RED 	 			= $json[$cont][8];	
	
	   //si claveCarretera cambia volver a insertar el arreglo carretera si recorre todas las estaciones y forman un bloque
		//ESTACION
		   $NOMBRE_ESTACION	 	= $json[$cont][10];
		   $KM	 				= $json[$cont][13];	
		   $TIPO	 			= $json[$cont][11];	
		   $SENTIDO	 			= $json[$cont][12];	
			//HISTOGRAMA
			   //$HISTOGRAMA	 		= $json[$cont][8];	
			   $Lunes	 			= $json[$cont][29];
			   $Martes	 			= $json[$cont][30];
			   $Miercoles	 		= $json[$cont][31];
			   $Jueves	 			= $json[$cont][32];
			   $Viernes	 			= $json[$cont][33];		
			   $Sabado	 			= $json[$cont][34];
			   $Domingo	 			= $json[$cont][35];		
		//ESTACION
			$TDPA	 			= $json[$cont][14];	 
			$M	 				= $json[$cont][15];
			$A	 				= $json[$cont][16];
			$B	 				= $json[$cont][17];
			$C2	 				= $json[$cont][18];
			$C3	 				= $json[$cont][19];
			$T3S2	 			= $json[$cont][20];
			$T3S3	 			= $json[$cont][21]; 
			$T3S2R4	 			= $json[$cont][22]; 
			$OTROS	 			= $json[$cont][23]; 
			$AA	 				= $json[$cont][24]; 
			$BB	 				= $json[$cont][25]; 
			$CC	 				= $json[$cont][26]; 
			$D	 				= $json[$cont][27];  
			$K_x0027_	 		= $json[$cont][28]; 
			$LAT	 			= $json[$cont][36]; 
			$LONG	 			= $json[$cont][37]; 


			$Estacion  = $datos->getEstacion($NOMBRE_ESTACION,$KM,$TIPO,$SENTIDO,$Lunes,$Martes,$Miercoles,$Jueves,$Viernes,$Sabado,$Domingo,$TDPA,$M,$A,$B,$C2,$C3,$T3S2,$T3S3,$T3S2R4,$OTROS,$AA,$BB,$CC,$D,$K_x0027_,$LAT,$LONG);
*/
			//$arrayFinal = array($nombreEstado,$nombreCarretera,$numero,$claveCarretera,/*$RUTA,$RED,*/$Estacion);
		//	$elementName = array('nombreEstado','nombreCarretera','numero','claveCarretera',/*'RUTA','RED',*/'Estacion');
		//	$arrayFinal= array_combine ($elementName, $arrayFinal);
		//	var_dump($arrayFinal);
			/*
			$arrayFinal = array($nombreEstado,$nombreCarretera,$numero,$claveCarretera,$RUTA,$RED,$NOMBRE_ESTACION,$KM,$TIPO,$SENTIDO,$Lunes,$Martes,$Miercoles,$Jueves,$Viernes,$Sabado,$Domingo,$TDPA,$M,$A,$B,$C2,$C3,$T3S2,$T3S3,$T3S2R4,$OTROS,$AA,$BB,$CC,$D,$K_x0027_,$LAT,$LONG);
			var_dump($arrayFinal);
			
/*	
		$geo  = $datos->getGeo($latitud,$longitud,$elevacion,$x,$y,$rango,$tipo);
		$campos =  array("IRI izq"=>$json[$cont][10],"IRI der"=>$json[$cont][11],"IRI prom"=>$json[$cont][12]);
		$consecutivo = $cont;

		$arrayFinal = array($idProyecto,$nombreCarretera, $tramo,$sentido,$carril,$rubro, $abrEstudio, $anyo, $geo, $campos,$consecutivo);

		$elementName = array("idProyecto","carretera","tramo","sentido","carril","rubro","abrEstudio","anyo","geo","campos","consecutivo");

		$arrayFinal= array_combine ($elementName, $arrayFinal);

		var_dump($arrayFinal);*/
}

/*foreach ($carreterasdoc as $value) {
	var_dump($value);

}*/



$contador=count($numCarreterasdif);
echo"contador_carreteras en el doc".$contador;

foreach ($numCarreterasdif as $value) {
//var_dump($value);
}

for ($i=0;$i<$contador;$i++) {
	for ($cont=1; $cont<sizeof($json); $cont++) 
	{
	$claveCarretera    = $json[$cont][6];
		if($numCarreterasdif[$i]==$claveCarretera){
			//ESTACION
		   $arreglo[$cont]= $json[$cont][10];
		   

		}
	}
}
foreach ($arreglo as $value) {
	var_dump($value);
}

?>
____________________________________________
despues de
datos_anexos.php

<?php

class datos 
{
	function getAnyo()
	{
		$datosAnyo = array("auscultacion"=>"2013", "entrega"=>"2014");	  				
		return $datosAnyo;
	}

	function getEstacion($nombreCarretera,$numero,$claveCarretera,$cont,$NOMBRE_ESTACION,$KM,$TIPO,$SENTIDO,$Lunes,$Martes,$Miercoles,$Jueves,$Viernes,$Sabado,$Domingo,
		$TDPA,$M,$A,$B,$C2,$C3,$T3S2,$T3S3,$T3S2R4,$OTROS,$AA,$BB,$CC,$D,$K_x0027_,$LAT,$LONG)
	{
	  
		$datosEstacion = array('' => $NOMBRE_ESTACION,
						 'estacion' => array("NOMBRE_ESTACION"),
						  'KM' => $KM,
						  'TIPO' => $TIPO,
						  'SENTIDO' => $SENTIDO,
						  'histograma' => array("Lunes"=>$Lunes,"Martes"=>$Martes,"Miercoles"=>$Miercoles,"Jueves"=>$Jueves,"Viernes"=>$Viernes,"Sabado"=>$Sabado,"Domingo"=>$Domingo),
						  'TDPA' => $TDPA,
						  'M'=>$M,
						  'A'=>$A,
						  'B'=>$B,
						  'C2'=>$C2,
						  'C3'=>$C3,
						  'T3S2'=>$T3S2,
						  'T3S3'=>$T3S3,
						  'T3S2R4'=>$T3S2R4,
						  'OTROS'=>$OTROS,
						  'AA'=>$AA,
						  'BB'=>$BB,
						  'CC'=>$CC,
						  'D'=>$D,
						  'K_x0027_'=>$K_x0027_,
						  'LAT'=>$LAT,
						  'LONG'=>$LONG
						  );
		return $datosEstacion;
}


}