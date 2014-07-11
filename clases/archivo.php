<?php
require_once("../PHPexcel/PHPExcel.php");
require_once("../PHPexcel/PHPExcel/Reader/Excel2007.php");

set_time_limit(1200);
ini_set('memory_limit','2048M');

class Archivo 
{		
		private $objPHPExcel, $currentSheet=0;
		protected $conexion;
		public $elementos,$query,$generaQuery, $resultado, $cantUsuarios;
		const DB='dataBankV1';
		const SERVER='JAYROSERVER-PC';
		private $db;

		function conectar() 
		{
			$this->conexion   = new MongoClient(self::SERVER);
			$this->db = $this->conexion->selectDB(self::DB);
		}

		function exportToMongo($documentos)
		{
			$this->db->rawData->drop();
			return $this->db->rawData->batchInsert($documentos);
		}

		function getRawData()
		{
			return $this->db->rawData->find();
		}

		function leerLibro($ubicTempArchivo)
		{
			$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			$objReader->setReadDataOnly(true);
			$this->objPHPExcel = $objReader->load($ubicTempArchivo);
		}

		function getNumeroHojas()
		{
			return $this->objPHPExcel->getSheetCount(); 			 
		}


		function getUltFilaHoja()
		{
 			for ($c=0; $c < $this->getNumeroHojas() ; $c++)  
			{ 	
				$numFilas[] = $this->objPHPExcel->setActiveSheetIndex($c)->getHighestRow(); /// <-- indicamos la hoja a abrir
			}
			return $numFilas;

		}

		function getNombreHojas()  
		{		 
 			for ($c=0; $c < $this->getNumeroHojas() ; $c++)  
			{ 	
				$this->objPHPExcel->setActiveSheetIndex($c);  /// <-- indicamos la hoja a abrir
				$nombreHojas[] = $this->objPHPExcel->getActiveSheet($c)->getTitle();	
			}
			return $nombreHojas;
		}

		 function getUltimaCol()
		 {
			 return $this->objPHPExcel->getActiveSheet()->getHighestColumn();
		 }

		function setCurrentSheet($hoja)
		{
			$hojase= $this->currentSheet = $hoja;
		}

		function getDataSheet($numHoja,$inicioFilaHoja,$ultimafilaHoja)
		{
			$this->objPHPExcel->setActiveSheetIndex($numHoja);
		    //$columnas = "j";
		    $ultColumna = $this->getUltimaCol();
		    $documentos = $this->objPHPExcel->getActiveSheet()->rangeToArray('A'.$inicioFilaHoja.':'.$ultColumna.$ultimafilaHoja);
			return $documentos;
		}

		function getClaveTramo($clave)
		{
			$clave = substr($clave,0,1);

			if($clave =="L" || $clave =="A")
			{
				return $cantCol = 13;
			}else{
				return $cantCol = 15;
			}

		}


}

	