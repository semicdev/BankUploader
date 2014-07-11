<?php

class datos 
{	
	function getEstacion($nombreCarretera,$numero,$claveCarretera,$cont,$NOMBRE_ESTACION,$KM,$TIPO,$SENTIDO,$Lunes,$Martes,$Miercoles,$Jueves,$Viernes,$Sabado,$Domingo,
		$TDPA,$M,$A,$B,$C2,$C3,$T3S2,$T3S3,$T3S2R4,$OTROS,$AA,$BB,$CC,$D,$K_x0027_,$LAT,$LONG)
	{
	  

		$datosEstacion = array('NOMBRE_ESTACION' => $NOMBRE_ESTACION,
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