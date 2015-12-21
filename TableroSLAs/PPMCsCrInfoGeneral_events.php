<?php
//BindEvents Method @1-143F60EF
function BindEvents()
{
    global $mc_calificacion_rs_MC;
    global $CCSEvents;
    $mc_calificacion_rs_MC->CCSEvents["BeforeShow"] = "mc_calificacion_rs_MC_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_calificacion_rs_MC_BeforeShow @3-54D6F7CA
function mc_calificacion_rs_MC_BeforeShow(& $sender)
{
    $mc_calificacion_rs_MC_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_rs_MC; //Compatibility
//End mc_calificacion_rs_MC_BeforeShow

//Custom Code @23-2A29BDB7
// -------------------------
	global $db;
    global $sSQL;
    global $sRutaEv;
    global $sPPMC;
    global $sCDS;
    global $flgCerrado;
    
    $db= new clsDBcnDisenio();
    $sSQL = "select mc_universo_cds.*, mc_c_proveedor.razonsocial, mc_c_proveedor.Nombre_CDS, m.Mes NomMes " .
   				" from mc_universo_cds inner join mc_c_proveedor on mc_c_proveedor.id_proveedor = mc_universo_cds.id_proveedor " .
   				" inner join mc_c_mes m on m.IdMes = mc_universo_cds.mes " .
   				" where Id=" .  CCGetParam("Id");
   	$db->query($sSQL);
   	if($db->next_record()){
		$sPPMC = $db->f("numero");
		$sNomMes = $db->f("NomMes");
		$sCDS = $db->f("Nombre_CDS");
		$flgCerrado = $db->f("Medido");
		$mc_calificacion_rs_MC->NombreProveedor->SetValue($db->f("razonsocial"));
    	// si es nuevo, recupera la información de las tablas con los datos importados de PPMC
    	if(!$mc_calificacion_rs_MC->EditMode){ 	
   			$mc_calificacion_rs_MC->hdid_ppmc->SetValue($sPPMC);
   			$mc_calificacion_rs_MC->id_ppmc->SetValue($sPPMC . " Reportado en " . $sNomMes);
   			$mc_calificacion_rs_MC->lReportado->Setvalue( " Reportado en " . $sNomMes);
   			$mc_calificacion_rs_MC->MesReporte->SetValue($db->f("mes"));
   			$mc_calificacion_rs_MC->AnioReporte->SetValue($db->f("anio"));
   			$mc_calificacion_rs_MC->id_proveedor->SetValue($db->f("id_proveedor"));
   			//////////////////////////////////
			//se va por la información de la estimación
			$sSQL= 'SELECT e.estimacion_id, sum(CAST(e.esfuerzo AS FLOAT)) esfuerzo, e.tipo_unidad, sum(cast(replace(e.unidades_resultantes,\',\',\'.\') AS FLOAT)) unidades_resultantes, ' .
					' e.requerimiento_relacionado, e.solicitante, max(e.fecha_asignacion) fecha_asignacion, e.ID_PPMC, e.Proveedor, max(e.FECHA_APROBACION) FECHA_APROBACION, u.id_proveedor ' .
					' FROM mc_universo_cds u LEFT JOIN PPMC_ESTIMACION e  ON e.Id_PPMC = u.Numero ' .
					' WHERE u.Id = ' . CCGetParam("Id",0) . ' and month(e.fecha_carga)=u.mes and YEAR(e.FECHA_CARGA) = u.anio ' .
						' and e.ESTADO_REQ_ESTIM = \'Estimación Aprobada\' and e.RESULTADO_ESTIMACION <> \'Rechazada\' '  . 
						' group by e.estimacion_id, e.tipo_unidad, unidades_resultantes,   e.requerimiento_relacionado, e.solicitante, e.ID_PPMC, e.Proveedor, u.id_proveedor ';
			$db->query($sSQL);
			if($db->next_record()){
				$mc_calificacion_rs_MC->IdEstimacion->SetValue($db->f("estimacion_id"));
				$sTipoReq =$db->f("requerimiento_relacionado");
				switch($db->f("requerimiento_relacionado")){
					case "Proyecto";
						$sSQL='SELECT Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, ESTADO, TIPO_SERVICIO_CTI ' . 
							' FROM PPMC_PROYECTOS_AS ' .
							' WHERE ID_PROYECTO = ' . $sPPMC ;
						break;
					case "RO";
						$sSQL= 'SELECT Name, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, ESTADO, TipoServicioCTI ' .
							' FROM PPMC_RO_AS ' .
							' WHERE REQUEST_ID = ' . $sPPMC ;
						break;
					case "Control de Cambios";
						$sSQL = 'SELECT Project_Name, SERVICIO_NEGOCIO, TIPO_Solicitud, c.ESTADO, TIPO_SERVICIO_CTI ' .
							' FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC ' .
							' WHERE REQ_CAMBIO_ID  =  ' . $sPPMC ;		
						break;
				}
				$db->query($sSQL);
				if($db->next_record()){
					$mc_calificacion_rs_MC->descripci_n->SetValue($db->f(0));
					$mc_calificacion_rs_MC->id_tipo->SetValue($db->f(2));					
					//se busca el servicio de negocio
					foreach ($mc_calificacion_rs_MC->id_servicio_negocio->Values as $clave => $valor) {
				 		if($db->f(1)== $valor[1]){
							$mc_calificacion_rs_MC->id_servicio_negocio->SetValue($valor[0]);
				    	}
					}
					//se busca el tipo de PPMC
					foreach ($mc_calificacion_rs_MC->id_tipo->Values as $clave => $valor) {
				 		if($db->f(2)== $valor[1]){
							$mc_calificacion_rs_MC->id_tipo->SetValue($valor[0]);
				    	}
					}
				}
			} 	else { // si no tiene Estimación
				$sql="SELECT ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA,  Proveedor, u.mes, u.anio  " .
					" from mc_universo_cds u  LEFT JOIN vw_PPMC_Proy_RO_CC on " . 
					" vw_PPMC_Proy_RO_CC.ID_PPMC = u.numero  where month(fecha_carga)=u.mes and YEAR(FECHA_CARGA) = u.anio " .
					" AND u.id = " . CCGetParam("Id");
		    	$db->query($sql);
				if($db->next_record()){
					$mc_calificacion_rs_MC->IdEstimacion->Setvalue(0);
					$mc_calificacion_rs_MC->descripci_n->SetValue($db->f("NAME"));
					$mc_calificacion_rs_MC->id_tipo->SetValue($db->f("TIPO_REQUERIMIENTO"));
					foreach ($mc_calificacion_rs_MC->id_servicio_negocio->Values as $clave => $valor) {
			    		if($db->f(2)== $valor[1]){
							$mc_calificacion_rs_MC->id_servicio_negocio->SetValue($valor[0]);
			    		}
					}
					//se busca el tipo de PPMC
					foreach ($mc_calificacion_rs_MC->id_tipo->Values as $clave => $valor) {
				 		if($db->f(3)== $valor[1]){
							$mc_calificacion_rs_MC->id_tipo->SetValue($valor[0]);
				    	}
					}
				}
			}
			/////////////////////////////////
			//se busca si ya se le metieron datos de apertura
			$sSQL='select mc_calificacion_rs_MC.[descripción] descripcion,  mc_calificacion_rs_MC.id_servicio_cont, mc_calificacion_rs_MC.id_servicio_negocio,  ' .
				' mc_calificacion_rs_MC.id_tipo, 	mc_info_rs_ap_ec.idpadre, mc_info_rs_ap_ec.UDX, mc_info_rs_ap_ec.UCO, mc_info_rs_ap_ec.UDA, mc_info_rs_ap_ec.USP,  mc_info_rs_ap_ec.UST,  mc_info_rs_ap_ec.UPL ' .
				' from mc_calificacion_rs_MC  inner join mc_info_rs_ap_ec on mc_info_rs_ap_ec.id = mc_calificacion_rs_MC.iduniverso ' .
				' where mc_calificacion_rs_MC.id_ppmc = ' . $sPPMC . ' and HERR_EST_COST is not null and REQ_SERV is not null';
			$db->query($sSQL);
			if($db->next_record()){
				$mc_calificacion_rs_MC->id_tipo->SetValue($db->f("id_tipo"));
				$mc_calificacion_rs_MC->id_servicio_negocio->SetValue($db->f("id_servicio_negocio"));
				$mc_calificacion_rs_MC->id_servicio_cont->SetValue($db->f("id_servicio_cont"));
				$mc_calificacion_rs_MC->descripci_n->SetValue($db->f("descripcion"));
				$mc_calificacion_rs_MC->ppmc_adicional->SetValue($db->f("idpadre"));
				$mc_calificacion_rs_MC->UDX->SetValue($db->f("UDX"));
				$mc_calificacion_rs_MC->UCOS->SetValue($db->f("UCO"));
				$mc_calificacion_rs_MC->UDA->SetValue($db->f("UDA"));
				$mc_calificacion_rs_MC->USP->SetValue($db->f("USP"));
				$mc_calificacion_rs_MC->UST->SetValue($db->f("UST"));
				$mc_calificacion_rs_MC->UPL->SetValue($db->f("UPL"));
			}
   		}else {
   			//$mc_calificacion_rs_MC->id_ppmc->SetValue($sPPMC);
   			$mc_calificacion_rs_MC->id_ppmc->SetValue($sPPMC . " Reportado en " . $sNomMes);
   			$mc_calificacion_rs_MC->lReportado->Setvalue( " Reportado en " . $sNomMes);
   		}  	
   	} 
    //si no tiene la ruta de la evidencia se agrega
    if($mc_calificacion_rs_MC->UrlEvidencia->GetValue()==""){
    	// se arma la ruta de la evidencia
	    $sSQL='SELECT * FROM mc_parametros WHERE parametro = \'RutaEvidencia\'';
	    $db->query($sSQL);
	    if($db->next_record()){
			if($mc_calificacion_rs_MC->MesReporte->GetValue()<10){
				$sRutaEv = $db->f("valor") . $mc_calificacion_rs_MC->AnioReporte->GetValue() . '0' . $mc_calificacion_rs_MC->MesReporte->GetValue() . "/MC/Evidencia_" . $sCDS .  "/" . $sPPMC;
			} else {
				$sRutaEv = $db->f("valor") . $mc_calificacion_rs_MC->AnioReporte->GetValue() . $mc_calificacion_rs_MC->MesReporte->GetValue() . "/MC/Evidencia_" . $sCDS .  "/" . $sPPMC;
			}
			if($mc_calificacion_rs_MC->DataSource->f("Tipo")=='PA' ){
				$sRutaEv = $sRutaEv . "_A.doc";
			} else {
				$sRutaEv = $sRutaEv . "_C.doc";
			}
	    }
    	$mc_calificacion_rs_MC->UrlEvidencia->SetValue($sRutaEv);
    }
    
    $db->close();
    
    // Verifica si esta cerrado para medición
    if($flgCerrado==1){
    	$mc_calificacion_rs_MC->Button_Insert->Visible= false;
    	$mc_calificacion_rs_MC->Button_Update->Visible = false;
    }
// -------------------------
//End Custom Code

//Close mc_calificacion_rs_MC_BeforeShow @3-9453A30A
    return $mc_calificacion_rs_MC_BeforeShow;
}
//End Close mc_calificacion_rs_MC_BeforeShow

//Page_BeforeShow @1-A8311896
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsCrInfoGeneral; //Compatibility
//End Page_BeforeShow

//Custom Code @147-2A29BDB7
// -------------------------
	global $lkAnterior;
    global $lkSiguiente;
    
    $aPPMCsAPbIds = unserialize(CCGetSession("aPPMCsAPbIds"));
    $aPPMCsAPbValues = unserialize(CCGetSession("aPPMCsAPbValues"));
	if(count($aPPMCsAPbIds)>1){
    	$iPos=array_search(CCGetParam("Id"),$aPPMCsAPbIds);
    	if($iPos==0){
			$lkAnterior->SetLink("PPMCsCrbLista.php?" . CCGetQueryString("QueryString",""));
			$lkAnterior->SetValue("Lista requerimientos");
    	} else {
    		$lkAnterior->SetValue($aPPMCsAPbValues[$iPos-1]);
    		$lkAnterior->SetLink("PPMCsCrInfoGeneral.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id"),"ccsForm"),"Id",$aPPMCsAPbIds[$iPos-1]));
    	}
    	if($iPos < count($aPPMCsAPbIds)-1){
    		$lkSiguiente->SetValue($aPPMCsAPbValues[$iPos+1]);
    		$lkSiguiente->SetLink("PPMCsCrInfoGeneral.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id"),"ccsForm"),"Id",$aPPMCsAPbIds[$iPos+1]));
    	} else {
    		$lkSiguiente->SetValue("");
    	}
    }

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
