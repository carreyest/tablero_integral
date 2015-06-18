<?php
ini_set('memory_limit', '-1');
set_time_limit(0);
set_error_handler("GestorDeErrores");
include_once( "./functions.php" );
$messages = array();		
$sliceName = explode(DIRECTORY_SEPARATOR,$_SERVER['PHP_SELF']);
$execFile = (array_pop($sliceName));
$processList = GetProcessList($messages);
$origenExec = "lineaComando";

if (!$_SERVER['argc']) { //Validamos si se ejecuta por browser
	$origenExec = "browser";
    if ($_GET['cveCarga']!='') {
   		$argc = 2;
		$argv[1]=$_GET['cveCarga'] != "ListaClaves" ? $_GET['cveCarga'] : "-l";
    } else{
    	echo_cond("Ejecución incorrecta, la sintaxis correcta debe ser :". $_SERVER['PHP_SELF'] ."?cveCarga=[Clave valida de carga]\n\r",$origenExec);
		echo_cond("O si desea obtener un listado de las posibles cargas :". $_SERVER['PHP_SELF'] ."?cveCarga=ListaClaves\n\r",$origenExec);    	
    	exit;
    }
} else {
   	$argc = 1;
}


	if ($argc > 1){

			if ($argc == 2) {

			switch($argv[1]){
				case '-l':
					echo_cond("LAS CARGAS POSIBLES SON:\n\r\n\r",$origenExec); 
					foreach ($processList as $key => $value) {
						//echo($value[0] ." => ".$value[1]." , Archivo: ".$value[2]." Tabla: ". $value[3]."\n \r");
						echo_cond("[".$value[0]."]" ."   => ".$value[1]." , Archivo: ".$value[2].", Tabla: ". $value[3]."\n\r\n\r",$origenExec);
					}
					exit;
					break;
				case '-h':
					echo($execFile . " [-l] | [-h] | [Cve de Proceso] \n\r");
					echo($execFile . " => Sin parametros intenta la carga de todos los procesos cargados\n\r");
					echo($execFile . " -l => Lista todas las claves de carga permitidas\n\r");
					echo($execFile . " -h => Muestra esta ayuda\n\r");
					echo($execFile . " [Clave de carga] => Intenta unicamente la carga especificada\n\r");
					exit;
					break;
				default:
				    $flagExistProcess = false;
				    foreach ($processList as $key => $value) {			    	
				    	if ($value[0] == $argv[1]){
				    		$flagExistProcess = true;
				    	}	    	
				    }
					if ($flagExistProcess){
						$processList = array(0=>array(0=>$argv[1]));

					}else {
						echo_cond("Proceso '".$argv[1]."' inexistente\n\r",$origenExec);
						if ($origenExec!="browser")
						{
							echo("Teclee:".$execFile ." -l   Para listar los procesos permitidos");							
						} 
						exit;
					}

				break;

			}


		} else {
			echo("Parametros incorrectos o uso incorrecto de comando, Teclee:  \n\r". $execFile." -h  \n\r Para obtener ayuda");
		}

	} 

 
 //print_r($processList);

	foreach ($processList as $key => $regcveLoad) {
				$cveLoad = $regcveLoad[0];
				$ctrlsLoad = GetCtrlsLoad( $cveLoad , $messages ); //Obtiene todos los parametros de la carga a efectuar
				$fileToSearch = GetFileToSearch( $ctrlsLoad["mascara_archivo"] , $ctrlsLoad["periodicidad"], $dateFechaCierre, $messages ); //Obtiene el nombre del archivo que debe tener el archivo a cargar
				$stringQuery = '';
				$valFieldIdentity = 0;
				$existTable = 0;
				$status = STR_STATUS_ERROR;

				if ($fileToSearch !=''){
					$filePath = $ctrlsLoad["repositorio"].DIRECTORY_SEPARATOR.$fileToSearch.".".$ctrlsLoad["formato_archivo"]; //Se arma el nombre del archivo completo con todo y el path
					$statusFlag = GetStatusFlag($cveLoad,$filePath, $messages); //Obtiene el valor del campo status en la bitacora de carga para saber si ya se hizo la carga del archivo obtenido anteriormente
					if (  $statusFlag == 0) { //Si la bandera es 0 significa que no se ha echo la carga de este archivo

						if ( Checkfile( $filePath , $messages) ) { //Realiza la validación de la existencia y la lectura del archivo en cuestion
	
											
							if ($ctrlsLoad["formato_archivo"]=='xls' || $ctrlsLoad["formato_archivo"]=='xlsx') { //En caso de ser excel

								$dataFile = ReadExcel( $filePath, $ctrlsLoad["numero_hoja_excel"], $ctrlsLoad["filas_sin_datos_excel"], $messages );

							} else { //Por el momento sólo se ha definido tipo de archivo excel.
								$messages[]="ERROR: Formato de archivo(".$ctrlsLoad["formato_archivo"].") no configurado para la carga";
								UploadLog( $origenExec, $ctrlsLoad["mails_responsables"], $cveLoad, $messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath,$stringQuery,$existTable);
								echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);
								continue;					
							}

							
								$existTable = GetValidateTable($ctrlsLoad["db_destino"],$ctrlsLoad["tabla_destino"],  $messages);
								if ($existTable==0){ 

									$messages[]="ERROR: Tabla Destino inexistente: ".$ctrlsLoad["tabla_destino"];
									UploadLog( $origenExec, $ctrlsLoad["mails_responsables"], $cveLoad,$messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath,$stringQuery,$existTable);
									echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);									
									continue;
								}
							


								if($ctrlsLoad["campo_indice"]!=''){
									$valFieldIdentity = DetectFieldIdentity($ctrlsLoad["db_destino"],$ctrlsLoad["tabla_destino"],$messages); //Se detecta si existe un campo autoincrement y si existe se obtiene su valor
									if ($valFieldIdentity==0) {
										$messages[] = "ERROR: Aunque el layout se especifica un campo identity para la tabla ".$ctrlsLoad["tabla_destino"].", en realidad no existe un campo identity";
										UploadLog($origenExec, $ctrlsLoad["mails_responsables"], $cveLoad,$messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath,$stringQuery,$existTable);
										echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);
										continue;
									}
								} else {
									$messages[] = "ERROR: Se tiene que declarar el campo indice identity en el layout de la tabla ". $ctrlsLoad["tabla_destino"];
									UploadLog($origenExec, $ctrlsLoad["mails_responsables"], $cveLoad,$messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath,$stringQuery,$existTable);
									echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);
									continue;
								}


								$valFechaCierre = ValidateExistColFechaCierre($ctrlsLoad["db_destino"],$ctrlsLoad["tabla_destino"], $ctrlsLoad["campo_fecha_cierre"],$messages);
								if($ctrlsLoad["campo_fecha_cierre"]!=''){
									if ($valFechaCierre==0){
										$messages[] = "ERROR: Aunque el layout se especifica un campo para fecha de cierre en la tabla ".$ctrlsLoad["tabla_destino"].", en realidad no existe el campo";						
										UploadLog($origenExec, $ctrlsLoad["mails_responsables"], $cveLoad,$messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath,$stringQuery,$existTable);
										echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);
										continue;					
									} 					
								} else {
									$messages[] = "ERROR: Se tiene que declarar el campo fecha de cierre en el layout de la tabla ". $ctrlsLoad["tabla_destino"];
									UploadLog($origenExec, $ctrlsLoad["mails_responsables"], $cveLoad,$messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath,$stringQuery,$existTable);
									echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);
									continue;					

								}


							$layout = GetLayoutTable($cveLoad, $messages); //Se obtiene el layout de la tabla donde se realizará la carga
							
							if ( count($dataFile)  > 1 && count($layout) > 1 ) { //Si se obtuvieron datos del archivo de excel y se obtuvo el layout

								if( GetValidateDataExcel($ctrlsLoad["tabla_destino"],$dataFile, $layout, $ctrlsLoad["filas_sin_datos_excel"], $ctrlsLoad["campo_fecha_cierre"], $dateFechaCierre,  $messages,  $stringQuery) ) { //Se validan datos vs. layout


									$dataDbBeforeLoad = GetdataDbBeforeLoad( $ctrlsLoad["db_destino"],$ctrlsLoad["tabla_destino"], $ctrlsLoad["campo_indice"] , $valFieldIdentity, $messages ); //Se obtiene numero de registros en la tabla antes de la carga

									$loadToDb = LoadDataToDb($ctrlsLoad["db_destino"],$ctrlsLoad["tabla_destino"],$ctrlsLoad["procedimiento_extra"],$dateFechaCierre, $messages, $stringQuery);	

								 	if ($loadToDb){
								 		$status=STR_STATUS_OK;
								 		UploadLog($origenExec,$ctrlsLoad["mails_responsables"], $cveLoad, $messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath, $stringQuery,$existTable, $dataDbBeforeLoad["totalRegistros"],$dataDbBeforeLoad["ultimoRegistro"],count($dataFile));
								 		echo_cond("Carga Finalizada :".$cveLoad."\n\r",$origenExec);
								 	}		
								 	else {
										$status=STR_STATUS_ERROR;
								 		UploadLog($origenExec,$ctrlsLoad["mails_responsables"], $cveLoad, $messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath, $stringQuery,$existTable, $dataDbBeforeLoad["totalRegistros"],$dataDbBeforeLoad["ultimoRegistro"],count($dataFile));								 		
								 		echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);
								 	}		
								 							
								} else {
									$messages[]="ERROR: En validación de datos del archivo Excel";
									UploadLog($origenExec,$ctrlsLoad["mails_responsables"], $cveLoad, $messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath, $stringQuery,$existTable);				        	
									echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);
									continue;
								}
								
						    } else {

						    		$messages[]=(count($dataFile) <= 1) ? "ERROR: No se obtuvieron datos del archivo excel" : "ERROR: No se obtuvieron datos para esta carga en detalle_layout";
									UploadLog($origenExec,$ctrlsLoad["mails_responsables"], $cveLoad, $messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath, $stringQuery,$existTable);				        	
									echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);
									continue;						    	
						    }

						}
						else {
							UploadLog($origenExec,$ctrlsLoad["mails_responsables"], $cveLoad, $messages , $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, $filePath,$stringQuery,$existTable);
							echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);
							continue;
						}
					} else {
							echo_cond("Carga de archivo ".$filePath." efectuada con anterioridad exitosamente "."\n\r",$origenExec);
							continue;
							
					}

					
				} else {
					
					UploadLog($origenExec,$ctrlsLoad["mails_responsables"], $cveLoad, $messages, $ctrlsLoad["db_destino"], $ctrlsLoad["tabla_destino"], $status, 'No se obtuvo nombre de archivo',$stringQuery,$existTable);
					echo_cond("Error en Carga :".$cveLoad."\n\r",$origenExec);				
					continue;
				}
	}


?>