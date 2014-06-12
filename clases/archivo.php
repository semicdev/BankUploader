<?php
require_once("../PHPexcel/PHPExcel.php");
require_once("../PHPexcel/PHPExcel/Reader/Excel2007.php");

set_time_limit(1200);
ini_set('memory_limit','2048M');

class archivo 
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

		function leerLibro($nombreArchivo)
		{
			$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			$objReader->setReadDataOnly(true);
			$this->objPHPExcel = $objReader->load($nombreArchivo);
		}

		function getNumeroHojas()
		{
			return $this->objPHPExcel->getSheetCount(); 			 
		}


		function getUltimaFila()
		{

 			for ($c=0; $c < $this->getNumeroHojas() ; $c++)  
			{ 	
				$this->objPHPExcel->setActiveSheetIndex($c);  /// <-- indicamos la hoja a abrir
				$no[] = $this->objPHPExcel->getActiveSheet()->getHighestRow();	
			}
			return $no;
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

		function getDataSheet($hoja,$fila,$ultimafila)
		{
			$this->objPHPExcel->setActiveSheetIndex($hoja);
		    //$columnas = "j";
		    $ultcol = $this->getUltimaCol();
		    $documentos = $this->objPHPExcel->getActiveSheet()->rangeToArray('A'.$fila.':'.$ultcol.$ultimafila);
			return $documentos;
		}
}

	