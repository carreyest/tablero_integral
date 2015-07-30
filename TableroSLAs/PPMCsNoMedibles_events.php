<?php
//BindEvents Method @1-158A2C0F
function BindEvents()
{
    global $mc_PPMC_NoMedibles1;
    global $CCSEvents;
    $mc_PPMC_NoMedibles1->FechaEstimacion->CCSEvents["BeforeShow"] = "mc_PPMC_NoMedibles1_FechaEstimacion_BeforeShow";
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
}
//End BindEvents Method

//mc_PPMC_NoMedibles1_FechaEstimacion_BeforeShow @39-18B6E87F
function mc_PPMC_NoMedibles1_FechaEstimacion_BeforeShow(& $sender)
{
    $mc_PPMC_NoMedibles1_FechaEstimacion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_PPMC_NoMedibles1; //Compatibility
//End mc_PPMC_NoMedibles1_FechaEstimacion_BeforeShow

//Close mc_PPMC_NoMedibles1_FechaEstimacion_BeforeShow @39-A2FFF5DC
    return $mc_PPMC_NoMedibles1_FechaEstimacion_BeforeShow;
}
//End Close mc_PPMC_NoMedibles1_FechaEstimacion_BeforeShow

//Page_AfterInitialize @1-9C5459A3
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsNoMedibles; //Compatibility
//End Page_AfterInitialize

//Custom Code @53-2A29BDB7
// -------------------------
    global $PathToRoot;
	global $db;
    global $FileName;
    global $ActionFileUpload;
    global $lErrores;  
    global $iErrores;
    global $sErrores;
    
    $iErrores=0;
    
    $ActionFileUpload= $FileName . "?" . CCGetQueryString("QueryString", "");
    $sValues="";
 	$db = new clsDBcnDisenio;

 	if (isset($_FILES['userfile']['name'])) {
	 	$nombre_archivo = $_FILES['userfile']['name']; 
	 	$tipo_archivo = $_FILES['userfile']['type']; 
	 	$tamano_archivo = $_FILES['userfile']['size']; 
	 	//compruebo si las características del archivo son las que deseo NoMedibles CDS FechaDDMMYYYY
 		$aNombreArchivo = preg_split ("/ /",$nombre_archivo);
 		
 		// se valida el nombre del proveedor
 		$db->query("select id_proveedor from mc_c_proveedor where nombre ='" . $aNombreArchivo[1] . "'");
 		if($db->next_record()){
 			$idProveedor = $db->f(0);
 		} else {
 			$lErrores->SetValue("<div style='color:red'>El nombre del CDS en el nombre de archivo no se encuentra en la base de datos.</td></tr></table></div>"); 
 			$iErrores = $iErrores +1;
 		}
 		// se valida el mes del archivo
 		$db->query("select idmes from mc_c_mes where mes='" . $aNombreArchivo[2] . "'");
 		if($db->next_record()){
 			$idMes = $db->f(0);
 		} else {
 			$lErrores->SetValue("<div style='color:red'>El nombre del mes en el nombre de archivo no se encuentra en la base de datos.</td></tr></table></div>"); 
 			$iErrores = $iErrores +1;
 		}
 		// se valida el año del archivo
 		$aAno = preg_split('/\./',$aNombreArchivo[3]);
 		$db->query("select Ano from mc_c_anio where ano=" . $aAno[0] );
 		if($db->next_record()){
 			$idAno = $db->f(0);
 		} else {
 			$lErrores->SetValue("<div style='color:red'>El año en el nombre de archivo no se encuentra en la base de datos.</td></tr></table></div>"); 
 			$iErrores = $iErrores +1;
 		}
 		if( $iErrores  > 0){
 			echo($lErrores->GetValue() . "--");
 		} else {
 			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $PathToRoot . '/Uploads/'. $nombre_archivo)) { 
	        	$row = 1;
				if (($handle = fopen($PathToRoot . '/Uploads/'. $nombre_archivo, "r")) !== FALSE) {
				    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				        if($row>1){//se ignora la linea 1, tiene los titulos
				        	$num = count($data);
				        	if($num>6){
				        		$lErrores->SetValue($lErrores->GetValue() .  "<div style='color:red'>La fila " . $row . " tiene más columnas de las esperadas.  No se proceso la fila</div>");
				        	} else {
				        		$data[3] = CCFormatDate(CCParseDate($data[3],array("dd","/","mm","/","yyyy"," ","HH",":","nn")),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss")) ;
				        		$sValues = $data[0] . "," . $data[1] . ",'" . $data[2] . "','" . $data[3] . "','" . $data[4] . "','" . $data[5] . "'"  ;
					        	$sValues = $sValues . "," . $idMes . "," . $idAno . "," . $idProveedor . ")";
					        	$ssqlI="Insert into mc_PPMC_NoMedibles (IdPPMC, IdEstimacion, Descripcion, FechaEstimacion, Servicio_Negocio, Notas, MesReporte, AnioReporte, id_proveedor) values (";
					        	if(strlen($data[1])>0){
					        		//valida que el Id de PPMC no esté en el universo
					        		$ssql= "select mes,anio , tipo  from mc_universo_cds where tipo <>'IN' and numero=" . $data[0];
					        		$db->query($ssql);
					        		if($db->next_record()){
					        			$sErrores = $sErrores . "<div style='color:red'>Ya existe el PPMC " . $data[0] . " en el universo. Tipo:" . $db->f(0) . ", Mes:" . $db->f(1) . ", Año:" . $db->f(2) . "</div><br>"; 
 										$iErrores = $iErrores +1;	
					        		} else {
					        			//valida que el Id de PPMC no esté en ese mes
					        			$ssql= "select IDPPMC  from mc_ppmc_nomedibles where IDPPMC = " . $data[0] . " and  mesreporte = " . $idMes .  " and anioreporte = " . $idAno ;
					        			$db->query($ssql);
					        			if($db->next_record()){
					        				//$sErrores = $sErrores . "<div style='color:red'>Ya existe el PPMC " . $data[0] . " en el universo. Tipo:" . $db->f(0) . ", Mes:" . $db->f(1) . ", Año:" . $db->f(2) . "</div><br>"; 
 											//$iErrores = $iErrores +1;	
					        			} else {
					        				$db->query($ssqlI . $sValues);
					        			}
					        			//echo  $ssqlI . $sValues . "<br>";  
					        		}
					        		if($db->Errors->Count()>0 || $iErrores >0){
					        			$lErrores->Setvalue("<br><div style='color:red'>Hubo errores al procesar el archivo, verifique la información cargada</div><br>". $sErrores);
					        		} else {
					        			$lErrores->Setvalue("Se proceso el archivo, verifique la información cargada");
					        		}
					        	}
				        	}
				        }
				        $row++;
				    }
				    fclose($handle);
					//$db->query($ssql);
				}
 			}			
 		}
 	}
// -------------------------
//End Custom Code

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize


?>
