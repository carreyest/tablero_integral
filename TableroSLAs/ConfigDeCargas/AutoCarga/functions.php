<?php

 define("SERVER","localhost");
 define("BD_PARAM_LOAD", "Reportes_ACDMA");
 define("LOGIN","sa");
 //define("PASSWD","itera.2012");
 define("PASSWD","1t3r42015");
 define("STR_STATUS_OK","CARGA COMPLETA");
 define("STR_STATUS_ERROR","CARGA FALLIDA");

 include_once ("PHPExcel/Classes/PHPExcel/IOFactory.php");


 date_default_timezone_set( 'America/Mexico_City' );

function echo_cond($cadena,$salida="lineaComando")
{
  $pstyle ="style='background-color:#f4f4f4;color:#000000;font-family:Arial; font-size:11px'";
  if ($salida!='browser'){
  	echo($cadena);
  } else {
  	str_replace('\n\r', '<br>', $cadena);
  	echo("<p ".$pstyle."><b>".$cadena."</b></p>");
  }
}


function GestorDeErrores($errno, $errstr, $errfile, $errline)
{
	global $messages;
    switch ($errno) {
    case E_USER_ERROR:
    	$messages[]="ERROR: [$errno] $errstr en la línea $errline en el archivo $errfile\n";
        break;

    case E_USER_WARNING:
        $messages[]="WARNING: [$errno] $errstr\n";
        break;

    case E_USER_NOTICE:
        $messages[]="NOTICE: [$errno] $errstr\n";
        break;

    default:
        $messages[]="ERROR: [$errno] $errstr en la línea $errline en el archivo $errfile\n";
        break;
    }

    /* No ejecutar el gestor de errores interno de PHP */
    return true;
}

function DbConexion( $servername, $dataBaseName, $userName, $password ) {
	$dsn = "Driver={SQL Server};Server=".$servername.";Database=".$dataBaseName.";Integrated Security=SSPI;Persist Security Info=False;";
	$conn = odbc_connect( $dsn, $userName, $password ); 
    return $conn;
}

function GetProcessList(& $messages){
	$conn =  DbConexion( SERVER, BD_PARAM_LOAD, LOGIN ,PASSWD );
	if (!$conn)	{
		$messages[] = "ERROR: Al establecer la conexion para obtención de la lista de procesos para cargar" . $conn;
	}

	$sql = "SELECT cve_carga ,descripcion, mascara_archivo, tabla_destino
			FROM proceso_carga_archivos
			";
	// Se ejecuta la consulta y se guardan los resultados en el recordset rs
	$rs = odbc_exec( $conn, $sql );

	 if ( !$rs )
	 {
		 $messages[] = "ERROR: En la consulta SQL al obtener lista de procesos ";
	 }

	 $idx = 0;
	 while ( odbc_fetch_row( $rs ) )
	 {		 

		 $processList[$idx][]=odbc_result( $rs, "cve_carga" ); 
		 $processList[$idx][]=odbc_result( $rs, "descripcion" ); 
		 $processList[$idx][]=odbc_result( $rs, "mascara_archivo" ); 
		 $processList[$idx][]=odbc_result( $rs, "tabla_destino" ); 
		 $idx++;
	 }	
	odbc_close( $conn );
	return $processList;
}


function GetCtrlsLoad( $cveLoad ,  & $messages ){
	$ctrlLoad=array();
	$conn =  DbConexion( SERVER, BD_PARAM_LOAD, LOGIN ,PASSWD );
	if (!$conn)	{
		$messages[] = "ERROR: Al establecer la conexion para obtención de controles de carga ".$cveLoad.": " . $conn;
	}

	$sql = "SELECT * 
			FROM proceso_carga_archivos
			WHERE  cve_carga = '".$cveLoad."'";
	// Se ejecuta la consulta y se guardan los resultados en el recordset rs
	$rs = odbc_exec( $conn, $sql );

	 if ( !$rs )
	 {
		 $messages[] = "ERROR: En la consulta SQL al obtener controles de carga " . $cveLoad ;
	 }

	 while ( odbc_fetch_row( $rs ) )
	 {
		 
		 $ctrlLoad["cve_carga"]=odbc_result( $rs, "cve_carga" );
		 $ctrlLoad["descripcion"]=odbc_result( $rs, "descripcion" );
		 $ctrlLoad["mascara_archivo"]=odbc_result( $rs,"mascara_archivo" );
		 $ctrlLoad["formato_archivo"]=odbc_result( $rs,"formato_archivo" );
		 $ctrlLoad["repositorio"]=odbc_result( $rs,"repositorio" );
		 $ctrlLoad["mails_responsables"]=odbc_result( $rs, "mails_responsables" );
		 $ctrlLoad["db_destino"]=odbc_result( $rs, "db_destino" );
		 $ctrlLoad["tabla_destino"]=odbc_result( $rs, "tabla_destino" );
		 $ctrlLoad["procedimiento_extra"]=odbc_result( $rs, "procedimiento_extra" );
		 $ctrlLoad["numero_hoja_excel"]=odbc_result( $rs, "numero_hoja_excel" );
		 $ctrlLoad["filas_sin_datos_excel"]=odbc_result( $rs, "filas_sin_datos_excel" );
		 $ctrlLoad["campo_fecha_cierre"]=odbc_result( $rs, "campo_fecha_cierre" );
		 $ctrlLoad["campo_indice"]=odbc_result( $rs, "campo_indice" );
		 $ctrlLoad["campo_indice_identity"]=odbc_result( $rs, "campo_indice_identity" );
		 $ctrlLoad["periodicidad"]=odbc_result( $rs, "periodicidad" );
	 
	 }
	odbc_close( $conn );
	return $ctrlLoad;
}

function GetChgDate($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('d/m/y',mktime(0,0,0,$mon,$day+$dia,$year));        
}

function GetDaysInMonth($month, $year) 
{ 
// calculate number of days in a month 
return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31); 
} 

function getDateEndPrevMonth(){
	$hoy = date('Y-m-j');
	$fecha1MesAntes = date('y-m-d',strtotime('-1 months', strtotime($hoy)));
	list($aa1MesAntes,$mm1MesAntes,$dd1MesAntes) = explode("-", $fecha1MesAntes);
	$totalDias1Mesantes = GetDaysInMonth($mm1MesAntes,$aa1MesAntes);
    $nuevaFecha["dd"] = $totalDias1Mesantes;
    $nuevaFecha["mm"] = $mm1MesAntes;
    $nuevaFecha["aa"] = $aa1MesAntes;    
	return $nuevaFecha;
}


function GetFileToSearch( $fileMask , $periodicidad, & $dateFechaCierre, & $messages ){
	$fileToFind='';
	//$mask = array_pop(explode('_',$fileMask));
	$day = date( 'N' ); //1-7 Lunes-Domingo
  	$d = date('d');
	$m = date('m');
	$a = date('y');
	$Y = date('Y');
	if ($periodicidad == "semanal"){

		    if ( $day > 5 ) {

			    	$lastFriday = GetChgDate( $d."/".$m."/".$a , -($day-5) );
			    	list($d,$m,$a) = explode('/',$lastFriday);
			} elseif ( $day < 5 ) {
			        $lastFriday = GetChgDate( $d."/".$m."/".$a, -($day+2) );
			        list($d,$m,$a) = explode('/',$lastFriday);

			} 
			$fileToFind = str_replace( "dd", $d, str_replace( "mm", $m, str_replace( "aa", $a ,str_replace("aaaa", "20".$a, $fileMask) ) ) );
			$dateFechaCierre ="20$a/$m/$d 00:00"; 

	} elseif ($periodicidad == "quincenal"){

		   switch ($d) {
		   	 case $d < 15: 
		   	 		$DateEndPrevMonth = getDateEndPrevMonth(); 
		   	 		$fileToFind = str_replace( "dd", $DateEndPrevMonth["dd"], str_replace( "mm", $DateEndPrevMonth["mm"], str_replace( "aa", $DateEndPrevMonth["aa"] ,str_replace("aaaa", "20".$DateEndPrevMonth["aa"] ,$fileMask) ) ) ); 
		   	 		$dateFechaCierre ="20".$DateEndPrevMonth["aa"]."-".$DateEndPrevMonth["mm"]."-".$DateEndPrevMonth["dd"]." 00:00:00";
		   	 		break;
		   	 case $d >= 15: 
		   	 		$fileToFind = str_replace( "dd", "15", str_replace( "mm", $m, str_replace( "aa", $a ,str_replace("aaaa", $Y, $fileMask) ) ) );
		   	 		$dateFechaCierre ="$Y/$m/$d 00:00";
		   	 		break;
		   }

	} elseif ($periodicidad == "mensual_inicio"){
			$fileToFind = str_replace( "dd", "01", str_replace( "mm", $m, str_replace( "aa", $a ,str_replace("aaaa", $Y, $fileMask) ) ) );
			$dateFechaCierre ="$Y/$m/01 00:00";
			

	} elseif ($periodicidad == "mensual_fin"){
			if ($m != date("t")){
   	 			$DateEndPrevMonth = getDateEndPrevMonth();
			} else {
				$DateEndPrevMonth = array("dd" => $d , "mm" => $m , "aa" => $a); //Si hoy es fin de mes
			}

   	 		$fileToFind = str_replace( "dd", $DateEndPrevMonth["dd"], str_replace( "mm", $DateEndPrevMonth["mm"], str_replace( "aa", $DateEndPrevMonth["aa"] ,str_replace("aaaa", "20".$DateEndPrevMonth["aa"] ,$fileMask) ) ) ); 
		   	 $dateFechaCierre ="20".$DateEndPrevMonth["aa"]."/".$DateEndPrevMonth["mm"]."/".$DateEndPrevMonth["dd"]." 00:00";

	}

			 
	if ($fileToFind==''){
		$messages[] = "ERROR: Al obtener el nombre del archivo de carga";
	}	

	return $fileToFind;	
}

function GetStatusFlag( $cveLoad, $filePath, & $messages ){
	$status = 0;
	$conn =  DbConexion( SERVER, BD_PARAM_LOAD, LOGIN ,PASSWD );
	if (!$conn)	{
		$messages[] = "ERROR: Al establecer la conexion para obtención de status de carga para archivo ".$filePath.": " . $conn;
	}
	$sql = "SELECT 1 as flag 
			FROM bitacora_de_carga
			WHERE  nombreCarga = '".$cveLoad."'
			AND archivo_cargado = '".$filePath. "'
			AND status = 'CARGA COMPLETA'
			ORDER by fecha_ejecucion asc";
	// Se ejecuta la consulta y se guardan los resultados en el recordset rs
	$rs = odbc_exec( $conn, $sql );
	if ( !$rs ) {
		 $messages[] = "ERROR: Falla en la consulta SQL al obtener status de carga para archivo ". $filePath . "de la carga " . $cveLoad ;
	 } else {		 
     	$status=odbc_result( $rs, "flag" );
	 }
	 odbc_close( $conn );
	 return $status;
}

function Checkfile( $file, & $messages ){
	if ( file_exists( $file ) ){
		if ( ( $handle = fopen( $file, "r" ) ) !== FALSE ) {           
            return true;
		}  else {
			$messages[]='ERROR: Falla al tratar de leer el archivo '.$file;			
			return false;	 	
		} 
	} else {
  		    $messages[]='ERROR: Archivo inexistente '.$file;							
  		    return false;
	} 
}


function ReadExcel($file, $idxSheetData, $deleteLines, & $messages){

	$sheetData=array();
	$messages[] = 'Cargando archivo '.pathinfo($file,PATHINFO_BASENAME).' usando IOFactory para identificar el formato'; 
	$extFile = array_pop(explode(".",$file));
	switch($extFile){
		case 'xls' :
			$objReader = new PHPExcel_Reader_Excel5();
		break;
		case 'xlsx' :
			$objReader = new PHPExcel_Reader_Excel2007();
		break;
//	$objReader = new PHPExcel_Reader_Excel2003XML();
//	$objReader = new PHPExcel_Reader_OOCalc();
//	$objReader = new PHPExcel_Reader_SYLK();
//	$objReader = new PHPExcel_Reader_Gnumeric();
//	$objReader = new PHPExcel_Reader_CSV();
	}
$worksheetList = $objReader->listWorksheetNames($file);
$sheetname = $worksheetList[$idxSheetData]; 
$objReader->setLoadSheetsOnly($sheetname);
$objPHPExcel = $objReader->load($file);

if ($objPHPExcel ) {
			            
				//$objPHPExcel->setActiveSheetIndex($idxSheetData);
				
	            $objWorksheet    = $objPHPExcel->getActiveSheet();
	            $columnas        = PHPExcel_Cell::columnIndexFromString($objWorksheet->getHighestColumn());
	            $filas           = $objWorksheet->getHighestRow();          
	            $id='';
	            for ($fila = 0; $fila <= $filas; $fila++) {
		             for ($columna = 0; $columna < $columnas; $columna++) {
		                 $sheetData[$fila][$columna] = $objWorksheet->getCellByColumnAndRow($columna, $fila)->getCalculatedValue();

		             }
	         	} 
	         } else {
	  				$messages[] = "ERROR: Al cargar archivo excel ". $file ."formato incorrecto usando IOFactory";
	         }
	         //Limpiando el arreglo de filas vacias
             for ($fila = 0; $fila <= $filas; $fila++) {
	             	  for ($columna = 0; $columna <= $columnas; $columna++) {
	             	  	    if($sheetData[$fila][$columna] != '' &&  !is_null($sheetData[$fila][$columna]) ) {
				                  $sheetDataNew[$fila] = $sheetData[$fila];
				            }

		              }
		      }

//var_dump($sheetData);

//var_dump($sheetDataNew);

	         	

	$newSheetData = array_slice($sheetDataNew, $deleteLines);
	$objPHPExcel->disconnectWorksheets();
	unset($objPHPExcel);
	return $newSheetData; 

}


function DetectFieldIdentity( $dB, $table, & $messages ){

	$conn = DbConexion( SERVER, $dB, LOGIN ,PASSWD );
	if (!$conn)	{
		$messages[] = "ERROR: Falla al establecer la conexion para la obtención del valor del campo identity de la tabla ". $table . $conn;
	}
	$sql = "SELECT IDENT_CURRENT ('".$table."')  AUTOINCREMENT";
	// Se ejecuta la consulta y se guardan los resultados en el recordset rs
	$rs = odbc_exec( $conn, $sql );
	if ( !$rs ) {
		 $messages[] = "ERROR: Al ejecutar la consulta SQL al identificar campo identity de la tabla ". $table ;
	 }
	$flagIdentity=odbc_result( $rs, "AUTOINCREMENT" );
	odbc_close( $conn );
	$flagIdentity = ( is_null($flagIdentity) ) ? 0 : $flagIdentity;
	return $flagIdentity;
}

function ValidateExistColFechaCierre( $dB, $table, $campo_fecha_cierre,& $messages ){

	$flagFechaCierre=0;
	$conn = DbConexion( SERVER, $dB, LOGIN ,PASSWD );
	if (!$conn)	{
		$messages[] = "ERROR: Falla al establecer la conexion para la validacion del campo fecha cierre en la tabla ". $table . $conn;
	}
	$campo_fecha_cierre = str_replace('[', '', $campo_fecha_cierre);
	$campo_fecha_cierre = str_replace(']', '', $campo_fecha_cierre);
	$sql = "select count(*) from sys.columns where Name = '".$campo_fecha_cierre."' and Object_ID = Object_ID('".$table."')";

	// Se ejecuta la consulta y se guardan los resultados en el recordset rs
	$rs = odbc_exec( $conn, $sql );
	if ( !$rs ) {
		 $messages[] = "ERROR: Al ejecutar la consulta SQL para la validacion del campo fecha cierre en la tabla ". $table ;
	 }
	$flagFechaCierre=odbc_result( $rs, 1 );
	odbc_close( $conn );
	return $flagFechaCierre;
}


function GetLayoutTable($cveCarga, & $messages){
	$layout=array();
	$conn =  DbConexion( SERVER, BD_PARAM_LOAD, LOGIN ,PASSWD );
	if (!$conn)	{
		$messages[] = "ERROR: Al establecer la conexion para obtención del layout de la tabla para la carga". $cveCarga . $conn;
	}
	$sql = "SELECT nombre_columna_tabla, num_columna_excel, tipo_columna, acepta_nulo, dato_indispensable, valor_x_default, mapeo_de_valor
			FROM detalle_layout WHERE cve_carga = '".$cveCarga."'";

	// Se ejecuta la consulta y se guardan los resultados en el recordset rs
	$rs = odbc_exec( $conn, $sql );
	 if ( !$rs )
	 {
		 $messages[] = "ERROR: Al ejecutar consulta SQL al obtener layout tabla para la carga". $cveCarga ;
	 }
	 $idx=0;
	 while ( odbc_fetch_row( $rs ) )
	 {
		 
		 $layout[$idx]["nombre_columna_tabla"]=odbc_result( $rs, "nombre_columna_tabla" );
		 $layout[$idx]["num_columna_excel"]=odbc_result( $rs, "num_columna_excel" );
		 $layout[$idx]["tipo_columna"]=odbc_result( $rs, "tipo_columna" );
		 $layout[$idx]["acepta_nulo"]=odbc_result( $rs, "acepta_nulo" );
		 $layout[$idx]["dato_indispensable"]=odbc_result( $rs, "dato_indispensable" );
		 $layout[$idx]["valor_x_default"]=odbc_result( $rs, "valor_x_default" );
		 $layout[$idx]["mapeo_de_valor"]=odbc_result( $rs, "mapeo_de_valor" );

		 $idx++;
	 }

	odbc_close( $conn );
	return $layout;
}




function GetValidateTable($dB,$table, & $messages){

	$res="";
	$conn = DbConexion( SERVER, $dB, LOGIN ,PASSWD );
	if (!$conn)	{
		$messages[] = "ERROR: Al establecer la conexion para obtención de la existencia de la tabla ". $table . $conn;
	}
	$table = str_replace('[','',$table);
	$table = str_replace(']','',$table);

	$sql = "SELECT count(*) FROM sysobjects WHERE name='".$table."';";

	// Se ejecuta la consulta y se guardan los resultados en el recordset rs
	$rs = odbc_exec( $conn, $sql );
	 if ( !$rs )
	 {
		 $messages[] = "ERROR: Al ejecutar consulta SQL al obtener a existencia de la tabla ". $table ;
	 } else {
	 	$res = odbc_result( $rs, 1);
	 }

	 
	odbc_close( $conn );

	return $res;
}



								
function GetValidateDataExcel($table,$dataExcel, $layout, $deleteLines, $colFechaCierre, $valFechaCierre, & $messages, & $stringQuery){
//Obteniendo el maximo valor del numero de columna a utilizar, indicado por el layout
$colLiteral=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AU','AV','AW','AX','AY','AZ');	
$stringQuery='';
$MaxColExceReq=0; 
$realRow=0;
 //date_default_timezone_set( 'America/Mexico_City' );
foreach ($layout as $idxNum => $arrayValues) {	
	foreach ($arrayValues as $column => $valColumn) { 		
 		if ($column =="num_columna_excel") {
 			$MaxColExceReq = ($valColumn > $MaxColExceReq) ? $valColumn :  $MaxColExceReq ;
 		 }
 		
 	}
}
 
if ($MaxColExceReq >  count($dataExcel[0])+1 ) {
  	$messages[] = "Error: En el layout de este proceso se requiere una columna " . $MaxColExceReq ." que el archivo de excel carece solo tiene". count($dataExcel[0]);
  	return false;
}
  

//Inicia procedimiento de validacion
$nameCols = "";
$dataValues="";
//Se obtienen nombre de columnas
foreach ($layout as $key => $rowLayout) {
 	foreach ($rowLayout as $nomCol => $valCol) {
 		if($nomCol == "nombre_columna_tabla") {
 			$nameCols .= ($key == 0) ? $valCol : ",".$valCol;
 			$colReq[] = $rowLayout["num_columna_excel"];
 			$typeValidate[] = $rowLayout["tipo_columna"];
		    $isNull[] = $rowLayout["acepta_nulo"];
		    $essentialDate[] = $rowLayout["dato_indispensable"];
		    $defaultValue[] = $rowLayout["valor_x_default"];
		    $colDb[] = $rowLayout["nombre_columna_tabla"];
		    $flagMapData[] = $rowLayout["mapeo_de_valor"];
  		}
 	}
}

$idxValues=0;
$validateTipo=true;

foreach ($dataExcel as $key => $rowVal){
	$realRow = $key + $deleteLines + 1; 	
  	$dataValues.=($idxValues==0)? "(" : ",(";
  	foreach($colReq as $idx => $valIdx){
  			$dataExcel[$key][$valIdx]=trim($dataExcel[$key][$valIdx]);
  			//En caso de que exista un mapeo de valor en este campo se obtiene el dato especificado
  			if ($flagMapData[$idx]!=''){
		  			$parDato = explode(";", $flagMapData[$idx]);
		  			foreach ($parDato as $idxMap => $value) {
		  				$valAMapear[] = explode(",",$value);	
		  			}  			
		  			foreach ($valAMapear as $valMapeado) {
		  				if ($valMapeado[0]==$dataExcel[$key][$valIdx]) {
		  					$dataExcel[$key][$valIdx] = $valMapeado[1];
		  					break;
		  				}
		  			}
  			}



            if ( ( $dataExcel[$key][$valIdx] == '' || is_null($dataExcel[$key][$valIdx]) ) && $isNull[$idx]=="NO"){
              
               if($defaultValue[$idx]!='' ||  !is_null($defaultValue[$idx])) {
                 $dataExcel[$key][$valIdx] = $defaultValue[$idx];
                 $messages[]="WARNING: Dato en archivo excel (".$colLiteral[$valIdx].", ".$realRow .") es nulo o vacio, y columna en bd ".$colDb[$idx]." no acepta nulos";
                 $messages[]="WARNING: Se asigno valor por default ".$defaultValue[$idx]." en columna de Bd ".$colDb[$idx].", para hacer el campo no nulo";
               } else {
                $messages[]="ERROR: Dato en archivo excel (".$colLiteral[$valIdx].", ".$realRow .") es nulo o vacio, y columna en bd ".$colDb[$idx]." no acepta nulos y no existe valor por default para asignarle";
                return false;
               }
            } elseif ( ($dataExcel[$key ][$valIdx] == '' || is_null($dataExcel[$key][$valIdx]) ) && $isNull[$idx]=="SI"){
            	$dataExcel[$key][$valIdx] = NULL;

            } else {
            		
		            switch ($typeValidate[$idx]) {
		              case 'int':
		                $validateTipo=(is_numeric($dataExcel[$key][$valIdx]) && intval($dataExcel[$key][$valIdx])== $dataExcel[$key][$valIdx]) ? true : false;

		                break;
		              case 'float': 

	                    $validateTipo=(is_numeric($dataExcel[$key][$valIdx]))  ? true : false;		              	                 
	                 	break;
   		              case 'date':
   		              case 'datetime':
	                  	if (is_numeric($dataExcel[$key][$valIdx])) {
	                  		$validateTipo=true;
	                  	} else {
	                  		$validateStrDate = date_parse_from_format("d/m/Y H:i:s" ,$dataExcel[$key][$valIdx]);
	                  		if (is_string($dataExcel[$key][$valIdx]) && $validateStrDate["error_count"] == 0) {
	                  			$validateTipo = true;

	                  		} else {
	                  			$validateTipo=false;
	                  		}


	                  	}		              
		              break;

		            }

		            if(!$validateTipo){
		 			$realRow = $key + $deleteLines + 1;              			            	
		               if ($essentialDate[$idx]){

		                  $messages[]="ERROR: Tipo de dato  de el archivo de Excel en celda: (".$colLiteral[$valIdx].", ".$realRow .") se esperaba un ".$typeValidate[$idx]." y el campo es requerido";
		                  return false;
		                  
		               } else {
		                  if($defaultValue[$idx]!=''  && !is_null($defaultValue[$idx])){
		                      $messages[]="WARNING: Tipo de dato  de el archivo de Excel en celda: (".$colLiteral[$valIdx].", ".$realRow .") se esperaba un ".$typeValidate[$idx]." al ser un campo  requerido se asigna el valor por default ";
		                  } else{
		                      $messages[]="ERROR: Tipo de dato  de el archivo de Excel en celda: (".$colLiteral[$valIdx].", ".$realRow .") = " . $dataExcel[$key][$valIdx]." se esperaba un ".$typeValidate[$idx]." es un campo requerido y no hay declarado valor por default para ser sustituido ";
		                      return false;
		                  }          
		               }             
		            }               
          	}
          	
          	if ($dataExcel[$key][$valIdx] != NULL) {
		          	switch ($typeValidate[$idx]) {
				              case 'int':
				              case 'float':
				              	if (empty($dataExcel[$key][$valIdx])) $dataExcel[$key][$valIdx] = 0;
				              	$dataValues .= ($idx==0) ? $dataExcel[$key][$valIdx] : ",".$dataExcel[$key][$valIdx];		                
				                break;
				              case 'datetime':
				              case 'date':
				                $dateValue = $dataExcel[$key][$valIdx];
				                if (!is_numeric($dateValue)) {
				                	$fechaArray = date_parse_from_format("d/m/Y H:i:s" ,$dataExcel[$key][$valIdx]);
				                	$dateLoad = $fechaArray['year']."-".$fechaArray['month']."-".$fechaArray['day'] ." ".$fechaArray['hour'].":".$fechaArray['minute'];

				                } else {
				                   $intPart = intval($dateValue);
				                   $fecha_new=($intPart-25568)*24*60*60;
				                   if ($dateValue == $intPart){
				                   		$dateLoad=date("Y/m/d", $fecha_new);
				                   } else {
				                   		  $timeValue=$dateValue-$intPart;
							              $num_segundos=$timeValue*24*60*60;
							              $num_horas=$num_segundos/(60*60);
							              $part_entera_num_hora=explode(".",$num_horas);
							              $num_min= round(($num_segundos%(60*60))/60);
							              $fecha_new=($intPart-25568)*24*60*60;
							              $v=date("d/m/Y", $fecha_new);
								          $dia =substr($v,0,2); 
								          $mes =substr($v,3,2);       
								          $anio=substr($v,6,4);
								          $fecha_creada= mktime( $part_entera_num_hora[0],$num_min,0,$mes,$dia,$anio);
								          $dateLoad=date("Y/m/d H:i", $fecha_creada)  ;


				                   }
					            } 
		                        if ($typeValidate[$idx]=="date"){
						          if (count(explode(' ',$dateLoad))){
						          	list($dateLoad , $hora) = explode(' ', $dateLoad);
						          }	
						        }				          
					            $dataValues .= ($idx==0) ? "'".$dateLoad."'" : ",'".$dateLoad."'";
				                break;
				              	default:
				              	$dataValues .= ($idx==0) ? "'".str_replace("'","''",utf8_decode($dataExcel[$key][$valIdx]))."'" : ",'".str_replace("'","''",utf8_decode($dataExcel[$key][$valIdx]))."'";
				              	break;
					}
			} else {
				$dataValues .= ($idx==0) ? "NULL" : ",NULL";
			}		

  	}
  	$dataValues.=",'".$valFechaCierre."')";
 	$idxValues++;
 	if ($idxValues==990){
		$stringQuery.="INSERT INTO  ".$table."(".$nameCols.",".$colFechaCierre.")"." VALUES".$dataValues.";"; 		
		$idxValues=0;
		$dataValues='';
 	} 
 }

$messages[]="NOTICE: Sin errores de validación de datos en archivo excel";
$stringQuery.="INSERT INTO  ".$table."(".$nameCols.",".$colFechaCierre.")"." VALUES".$dataValues.";";
//echo($stringQuery);
return true;             

 
}
 
 function GetdataDbBeforeLoad($dB,$table, $colIdentity='' , $valFieldIdentity, & $messages){
	$conn = DbConexion( SERVER, $dB, LOGIN ,PASSWD );
 	if (!$conn)	{
 		$messages[] = "Error al establecer la conexion para obtención de número de registros antes de  carga en tabla ". $table . $conn;
 	}
 	$sql = "SELECT count(*)	as total FROM ".$table;
 	$rs = odbc_exec( $conn, $sql );
 	 if ( !$rs )
 	 {
 		 $messages[] = "Error en la consulta SQL al obtener count de la tabla ". $table ;
 	 }

 	 while ( odbc_fetch_row( $rs ) )
 	 {
		 
 		 $dataDbBeforeLoad["totalRegistros"]=odbc_result( $rs, "total" );
 	 }
 	 
 	 if($dataDbBeforeLoad["totalRegistros"]==0){
 			$sql = "SELECT IDENT_CURRENT ('".$table."')  lastRow";
 	 }else{
 	 	 	$sql = "SELECT max(".$colIdentity.") as lastRow FROM ".$table;
 	 }


	$rs = odbc_exec( $conn, $sql );
	 if ( !$rs ) {
		 $messages[] = "Error en la consulta SQL al obtener el max(".$dataFirstColLayout["columna"].")  de la tabla ". $table ;
	 }

	 	$dataDbBeforeLoad["ultimoRegistro"]=odbc_result( $rs, "lastRow" );

 	odbc_close( $conn );
 	return $dataDbBeforeLoad;


 }


 function LoadDataToDb($dB,$table, $ExtProcess,$dateFechaCierre, & $messages,  $insertQuery){
 	$valReturn = true;

 	if (strpos($dateFechaCierre," "))
		list($FechaCierre , $HoraCierre) =explode(" ",$dateFechaCierre);
	else 
		$FechaCierre = $dateFechaCierre ;


	//echo($insertQuery);
    if(!empty($ExtProcess) && $ExtProcess != '' && !is_null($ExtProcess)){
       $insertQuery .= "exec ".$ExtProcess." '".$FechaCierre."'"; 
    }

 	 $conn = DbConexion( SERVER, $dB, LOGIN ,PASSWD );
 	 if (!$conn)	{
 	 	$messages[] = "Error al establecer la conexion para iniciar la  carga en tabla ". $table . $conn;
 	 	$valReturn = false;
 	 }
 	 //print_r($insertQuery);
 	
 	 $rs = odbc_exec( $conn, $insertQuery );
 	  if ( !$rs )
 	  {
 	 	 $messages[] = "ERROR: Al realizar el insert en la base de datos ".$dB."con  la tabla ". $table ;
 	 	 $valReturn = false;
 	  } 

 	  odbc_close( $conn );
	  return $valReturn;	  
 }
	


 function UploadLog($salidaExec, $respMails='francisco.jaime@iteraprocess.com', $cveLoad, & $messages, $db, $table, $status, $filePath, $stringQuery, $existTable, $rowsBeforeLoad=0,$lastrow=0,$rowsFile=0){

 	$rowsNow =0;
 	$stringMessages='';
 	$conn =  DbConexion( SERVER, $db, LOGIN ,PASSWD );
 	if (!$conn)	{
 		$messages[] = "ERROR: Al establecer la conexion para obtener count de la tabla ". $table . "para bitacora" . $conn;
 	}

    
 	if ($existTable != 0) {
    	 	$sql = "SELECT count(*)	as total FROM ".$table;
		 	$rs = odbc_exec( $conn, $sql );
		 	 if ( !$rs )
		 	 {
		 		 $messages[] = "ERROR:  En la consulta SQL al obtener count de la tabla ". $table . "para bitacora" ;
		 	 }

		 	 while ( odbc_fetch_row( $rs ) )
		 	 {
				 
		 		 $rowsNow=odbc_result( $rs, "total" );
		 	 }	
	} else {
		$rowsNow=0;
	}	 	 

  	foreach ($messages as $key => $value) {
	  	$stringMessages .= $key+1 . " - ". $value."\n\r";
	}
    $stringQuery = str_replace("'","''",$stringQuery);
    $now=date("Y-m-d H:i:s");
    $sql = "INSERT INTO Bitacora_de_carga 
    		VALUES('".$cveLoad."',
    			   '".$now."',
    			   '".$status."',
    			   '".$filePath."',
    			    ".$rowsFile.",
    			   ".$rowsBeforeLoad.",
    			    '".$lastrow."',
    			    ".$rowsNow.",
    			   '".$stringQuery."',
    			   '".$stringMessages."'
    			   )";
    //echo("-- $sql ---");
	odbc_close( $conn );
	$conn2 = DbConexion( SERVER, BD_PARAM_LOAD, LOGIN ,PASSWD );
	//echo("$sql");
 	$rs = odbc_exec( $conn2, $sql );
	$strRes = '';
	$strRes .="Carga: ".$cveLoad ." Tabla : ". $table."<br>"."Registros antes de la carga:".$rowsBeforeLoad."<br>";
	$strRes .="Ultimo id antes de la carga:".$lastrow."<br>"."Número de filas del archivo:".$rowsFile."<br>";
	$strRes = utf8_decode($strRes);
	
 	if ( !$rs )
 	 {
 	 	$messages[] = "ERROR: Al tratar de guardar datos en bitacora";
		foreach ($messages as $key => $value) {
		  	$stringMessages .= $key+1 . " - ". $value."<br>";
		}		   
		$stringMessages = utf8_decode($stringMessages);
		//$strRes .="Registros despues de la carga:".$rowsNow."<br>"."Mensajes:<br>".$stringMessages."<br>"."Query ejecutado:<br>".$stringQuery."<br>"; 	 	
		$strRes .="Registros despues de la carga:".$rowsNow."<br>"."Mensajes:<br>".$stringMessages."<br>"; 	 	
		if ($salidaExec!="browser") {
 	 		echo(str_replace("<br>", "\n\r", $strRes));
		} else {
 	 		echo($strRes);
		}

		return false;

 	 } else {

 	 	$stringMessages = utf8_decode($stringMessages);
 	 	//$strRes .="Registros despues de la carga:".$rowsNow."<br>"."Mensajes:<br>".$stringMessages."<br>"."Query ejecutado:".$stringQuery."<br>";
 	 	$strRes .="Registros despues de la carga:".$rowsNow."<br>"."Mensajes:<br>".$stringMessages."<br>"; 	 	
 	 	$strRes = str_replace("\n\r", "<br>", $strRes);
 	 	if ($salidaExec=="browser"){
 	 		echo_cond($strRes,$salidaExec);
 	 	} 

 	 } 	
 	odbc_close( $conn2 );

 	sendmail( $respMails, $strRes, $salidaExec); 	 	 
    return true;
 }

function sendMail($to, $messageMail, $salidaExec){	
	require_once('PHPMailer_5.2.4/class.phpmailer.php');
	$mail = new PHPMailer();
	//indico a la clase que use SMTP
	$mail->IsSMTP();
	//permite modo debug para ver mensajes de las cosas que van ocurriendo
	$mail->SMTPDebug = 2;
	//Debo de hacer autenticación SMTP
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	//indico el servidor de Gmail para SMTP
	$mail->Host = "smtp.gmail.com";
	//indico el puerto que usa Gmail
	$mail->Port = 465;
	//$mail->Port = 587;                   // set the SMTP port for the GMAIL server

	//indico un usuario / clave de un usuario de gmail

	//$mail->SMTPSecure = "tls";                 // sets the prefix to the servier


	$mail->Username = "francisco.jaime2010@gmail.com";
	$mail->Password = "ironcar324";
	$mail->SetFrom('francisco.jaime2010@gmail.com', 'Francisco Jaime');
	//$mail->AddReplyTo("francisco.jaime2010@gmail.com","Francisco Jaime");
	$mail->Subject = "Reporte proceso de carga de archivos ";
	$mail->MsgHTML($messageMail);
	//indico destinatario

	if ( count( explode(',', $to) ) > 1 ) {
		$cmails = explode(',', $to);
		foreach($cmails as $key => $cmail){
			$mail->AddAddress($cmail,"");
		}
	} else {
		$address = $to;	
		$mail->AddAddress($address, "JIF");
	} 

	
	
	  if(!$mail->Send()) {
	   echo_cond("\n\rERROR: Error al enviar mail con Log de carga: " . $mail->ErrorInfo."\n\r",$salidaExec);
	   } else {
	   echo_cond("\n\rNOTICE: Correo con Log de carga enviado exitosamente"."\n\r",$salidaExec);
	   }	
}

?>