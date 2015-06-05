<?php
//BindEvents Method @1-4904CE22
function BindEvents()
{
    global $universo_cds;
    global $GeneraUniverso;
    global $CCSEvents;
    $universo_cds->CCSEvents["OnValidate"] = "universo_cds_OnValidate";
    $universo_cds->CCSEvents["BeforeShow"] = "universo_cds_BeforeShow";
    $GeneraUniverso->Button_DoSearch->CCSEvents["OnClick"] = "GeneraUniverso_Button_DoSearch_OnClick";
    $GeneraUniverso->sFechaCorte->CCSEvents["BeforeShow"] = "GeneraUniverso_sFechaCorte_BeforeShow";
    $GeneraUniverso->CCSEvents["BeforeShow"] = "GeneraUniverso_BeforeShow";
    $GeneraUniverso->CCSEvents["OnValidate"] = "GeneraUniverso_OnValidate";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//universo_cds_OnValidate @2-F75592E4
function universo_cds_OnValidate(& $sender)
{
    $universo_cds_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $universo_cds; //Compatibility
//End universo_cds_OnValidate

//Custom Code @19-2A29BDB7
// -------------------------
    // se arma el insert a la tabla de universos

	//se valida que no haya caracteres raros	
	
	global $DBcnDisenio;
	$iIdProveedor = $universo_cds->id_proveedor->GetValue();
	$iMes= $universo_cds->mes->GetValue();
	$iAnio = $universo_cds->anio->GetValue();
	$aIncidentes = explode(',',$universo_cds->txtIncidentes->GetValue());
	// se descompone la cadena de Incidentes y se inserta
	foreach ($aIncidentes AS $Incidente){
		$ssql="Insert into mc_universo_cds (id_proveedor, numero, tipo, mes, anio ) values (" .  
			$iIdProveedor . ",'" .  trim($Incidente) . "','IN'," . $iMes . "," . $iAnio . ")";
		//if($Incidente !='') $DBcnDisenio->query($ssql);
	}

	// se arma el insrt de los PPMCs de Aprobación
	$aPPMCA = explode(',',$universo_cds->txtPPMC_Aprobados->GetValue());
	foreach ($aPPMCA AS $PA){
		$ssql="Insert into mc_universo_cds (id_proveedor, numero, tipo, mes, anio ) values (" .  
			$iIdProveedor . ",'" .  trim($PA) . "','PA'," . $iMes . "," . $iAnio . ")";
		//if($PA !='') $DBcnDisenio->query($ssql);
	}

	// se arma el insrt de los PPMCs de Cerrados
	$aPPMCC = explode(',',$universo_cds->txtPPMC_Cerrados->GetValue());
	foreach ($aPPMCC AS $PC){
		$ssql="Insert into mc_universo_cds (id_proveedor, numero, tipo, mes, anio ) values (" .  
			$iIdProveedor . ",'" .  trim($PC) . "','PC'," . $iMes . "," . $iAnio . ")";
		//if($PC !='')  $DBcnDisenio->query($ssql);
	}
// -------------------------
//End Custom Code

//Close universo_cds_OnValidate @2-74F87B74
    return $universo_cds_OnValidate;
}
//End Close universo_cds_OnValidate

//universo_cds_BeforeShow @2-411D7F80
function universo_cds_BeforeShow(& $sender)
{
    $universo_cds_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $universo_cds; //Compatibility
//End universo_cds_BeforeShow

//Custom Code @22-2A29BDB7
// -------------------------
   /*     
    global $DBcnDisenio;
    $DBcnDisenio->query	('exec haz_algo 69,\'tres\'');
    
    	$DBcnDisenio->next_record();
		$lstcursos = $DBcnDisenio->f(1);
		var_dump($lstcursos);
	*/
// -------------------------
//End Custom Code

//Close universo_cds_BeforeShow @2-4B031FFD
    return $universo_cds_BeforeShow;
}
//End Close universo_cds_BeforeShow

//GeneraUniverso_Button_DoSearch_OnClick @26-44865EC5
function GeneraUniverso_Button_DoSearch_OnClick(& $sender)
{
    $GeneraUniverso_Button_DoSearch_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GeneraUniverso; //Compatibility
//End GeneraUniverso_Button_DoSearch_OnClick

//Custom Code @36-2A29BDB7
// -------------------------
   /*     
    global $DBcnDisenio;
    $DBcnDisenio->query	('exec sp_inserta_ppmc_fromExcel \'2014-12-31\', \'\\172.16.8.10\ReportesMC\Informacion_Consolidada31122014.xlsx\'');
    
    	$DBcnDisenio->next_record();
		$lstcursos = $DBcnDisenio->f(1);
		var_dump($lstcursos);
	*/
// -------------------------
//End Custom Code

//Close GeneraUniverso_Button_DoSearch_OnClick @26-D780F2A1
    return $GeneraUniverso_Button_DoSearch_OnClick;
}
//End Close GeneraUniverso_Button_DoSearch_OnClick

//GeneraUniverso_sFechaCorte_BeforeShow @27-E2D080A0
function GeneraUniverso_sFechaCorte_BeforeShow(& $sender)
{
    $GeneraUniverso_sFechaCorte_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GeneraUniverso; //Compatibility
//End GeneraUniverso_sFechaCorte_BeforeShow

//Close GeneraUniverso_sFechaCorte_BeforeShow @27-5C5F1ADF
    return $GeneraUniverso_sFechaCorte_BeforeShow;
}
//End Close GeneraUniverso_sFechaCorte_BeforeShow

//GeneraUniverso_BeforeShow @23-C215565F
function GeneraUniverso_BeforeShow(& $sender)
{
    $GeneraUniverso_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GeneraUniverso; //Compatibility
//End GeneraUniverso_BeforeShow

//Custom Code @32-2A29BDB7
// -------------------------
	
// -------------------------
//End Custom Code

//Close GeneraUniverso_BeforeShow @23-E2C0150E
    return $GeneraUniverso_BeforeShow;
}
//End Close GeneraUniverso_BeforeShow

//GeneraUniverso_OnValidate @23-34A56A5D
function GeneraUniverso_OnValidate(& $sender)
{
    $GeneraUniverso_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GeneraUniverso; //Compatibility
//End GeneraUniverso_OnValidate

//Custom Code @38-2A29BDB7
// -------------------------
    
    global $db;
    global $dbAux;
    global $a;
	$db= new clsDBcnDisenio;
	$dbAux= new clsDBcnDisenio;
    $flgError=0;
    $aFechaCorte=$GeneraUniverso->sFechaCorte->GetValue();
    $sFechaArchivos= date('dmY',$aFechaCorte[0]);
    
    // valida que existan los archivos
 	$sSQL="select valor from mc_parametros where parametro='RutaArchivos CAPC'";
 	$db->query($sSQL);
 	if($db->next_record()){
 		$sRutaArchivos = $db->f(0);
 		$sSQL="select replace(valor,'ddmmyyyy',replace(convert(varchar,'" . $sFechaArchivos . "',112),'/','')) from mc_parametros where parametro like 'Archivo Informacion Consolidada' and valor like '%xls%'";
 		$db->query($sSQL);
 		while($db->next_record()){
 			$sSQL="exec sp_inserta_ppmc_fromExcel '" .  $sFechaArchivos= date('d-m-Y',$aFechaCorte[0]) . "', '" .  $sRutaArchivos  . "\\x" .  $db->f(0) ."'" ;
 			$dbAux->query($sSQL);
 			echo $sSQL;
 			die();
 			$dbAux->next_record();
 			if($dbAux->f(0)==0){
 			}
 		}
    } else {
   		$GeneraUniverso->Errors->addError("No se encuentra la información necesaria en la tabla de parámetros");
 	}
 	
 	
// -------------------------
//End Custom Code

//Close GeneraUniverso_OnValidate @23-DD3B7187
    return $GeneraUniverso_OnValidate;
}
//End Close GeneraUniverso_OnValidate

//Page_BeforeShow @1-30ABB143
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $UniversoCarga; //Compatibility
//End Page_BeforeShow

//Custom Code @21-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
