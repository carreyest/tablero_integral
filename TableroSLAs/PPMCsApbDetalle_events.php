<?php
//BindEvents Method @1-6FE39869
function BindEvents()
{
    global $mc_info_rs_ap_EC;
    global $CCSEvents;
    $mc_info_rs_ap_EC->FechaAsignacion->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_FechaAsignacion_BeforeShow";
    $mc_info_rs_ap_EC->FechaEntregaPropuesta->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_FechaEntregaPropuesta_BeforeShow";
    $mc_info_rs_ap_EC->FechaEntregaEvidencia->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_FechaEntregaEvidencia_BeforeShow";
    $mc_info_rs_ap_EC->FechaAceptacionPropuesta->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_FechaAceptacionPropuesta_BeforeShow";
    $mc_info_rs_ap_EC->lstServContractual->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_lstServContractual_BeforeShow";
    $mc_info_rs_ap_EC->FechaEntregaHerramienta->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_FechaEntregaHerramienta_BeforeShow";
    $mc_info_rs_ap_EC->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_BeforeShow";
    $mc_info_rs_ap_EC->ds->CCSEvents["BeforeExecuteInsert"] = "mc_info_rs_ap_EC_ds_BeforeExecuteInsert";
    $mc_info_rs_ap_EC->ds->CCSEvents["BeforeBuildInsert"] = "mc_info_rs_ap_EC_ds_BeforeBuildInsert";
    $mc_info_rs_ap_EC->CCSEvents["BeforeInsert"] = "mc_info_rs_ap_EC_BeforeInsert";
    $mc_info_rs_ap_EC->ds->CCSEvents["BeforeBuildUpdate"] = "mc_info_rs_ap_EC_ds_BeforeBuildUpdate";
    $mc_info_rs_ap_EC->CCSEvents["BeforeUpdate"] = "mc_info_rs_ap_EC_BeforeUpdate";
    $mc_info_rs_ap_EC->ds->CCSEvents["BeforeExecuteUpdate"] = "mc_info_rs_ap_EC_ds_BeforeExecuteUpdate";
    $mc_info_rs_ap_EC->CCSEvents["OnValidate"] = "mc_info_rs_ap_EC_OnValidate";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["BeforeOutput"] = "Page_BeforeOutput";
}
//End BindEvents Method

//mc_info_rs_ap_EC_FechaAsignacion_BeforeShow @11-37563220
function mc_info_rs_ap_EC_FechaAsignacion_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_FechaAsignacion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_FechaAsignacion_BeforeShow

//Close mc_info_rs_ap_EC_FechaAsignacion_BeforeShow @11-369C588F
    return $mc_info_rs_ap_EC_FechaAsignacion_BeforeShow;
}
//End Close mc_info_rs_ap_EC_FechaAsignacion_BeforeShow

//mc_info_rs_ap_EC_FechaEntregaPropuesta_BeforeShow @13-011D60C9
function mc_info_rs_ap_EC_FechaEntregaPropuesta_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_FechaEntregaPropuesta_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_FechaEntregaPropuesta_BeforeShow

//Close mc_info_rs_ap_EC_FechaEntregaPropuesta_BeforeShow @13-7E98BEB3
    return $mc_info_rs_ap_EC_FechaEntregaPropuesta_BeforeShow;
}
//End Close mc_info_rs_ap_EC_FechaEntregaPropuesta_BeforeShow

//mc_info_rs_ap_EC_FechaEntregaEvidencia_BeforeShow @15-1E5D5D7F
function mc_info_rs_ap_EC_FechaEntregaEvidencia_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_FechaEntregaEvidencia_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_FechaEntregaEvidencia_BeforeShow

//Close mc_info_rs_ap_EC_FechaEntregaEvidencia_BeforeShow @15-3574376B
    return $mc_info_rs_ap_EC_FechaEntregaEvidencia_BeforeShow;
}
//End Close mc_info_rs_ap_EC_FechaEntregaEvidencia_BeforeShow

//mc_info_rs_ap_EC_FechaAceptacionPropuesta_BeforeShow @17-D333FFDD
function mc_info_rs_ap_EC_FechaAceptacionPropuesta_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_FechaAceptacionPropuesta_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_FechaAceptacionPropuesta_BeforeShow

//Close mc_info_rs_ap_EC_FechaAceptacionPropuesta_BeforeShow @17-76DE6F4C
    return $mc_info_rs_ap_EC_FechaAceptacionPropuesta_BeforeShow;
}
//End Close mc_info_rs_ap_EC_FechaAceptacionPropuesta_BeforeShow

//mc_info_rs_ap_EC_lstServContractual_BeforeShow @51-1764C809
function mc_info_rs_ap_EC_lstServContractual_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_lstServContractual_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_lstServContractual_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_lstServContractual_BeforeShow @51-576139FD
    return $mc_info_rs_ap_EC_lstServContractual_BeforeShow;
}
//End Close mc_info_rs_ap_EC_lstServContractual_BeforeShow

//mc_info_rs_ap_EC_FechaEntregaHerramienta_BeforeShow @113-E023D2C4
function mc_info_rs_ap_EC_FechaEntregaHerramienta_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_FechaEntregaHerramienta_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_FechaEntregaHerramienta_BeforeShow

//Close mc_info_rs_ap_EC_FechaEntregaHerramienta_BeforeShow @113-44115F12
    return $mc_info_rs_ap_EC_FechaEntregaHerramienta_BeforeShow;
}
//End Close mc_info_rs_ap_EC_FechaEntregaHerramienta_BeforeShow

//mc_info_rs_ap_EC_BeforeShow @3-0DCBBDF8
function mc_info_rs_ap_EC_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_BeforeShow

//Custom Code @25-2A29BDB7
// -------------------------
    global $DBcnDisenio;
	global $lDocs;
	global $sPPMC;
	global $sTipoReq;
	global $fUDX;
	global $db;
	//se va por la información de la estimación
	$DBcnDisenio->query('SELECT e.estimacion_id, sum(CAST(e.esfuerzo AS FLOAT)) esfuerzo, e.tipo_unidad, sum(cast(replace(e.unidades_resultantes,\',\',\'.\') AS FLOAT)) unidades_resultantes, ' .
			' e.requerimiento_relacionado, e.solicitante, max(e.fecha_asignacion) fecha_asignacion, e.ID_PPMC, e.Proveedor, max(e.FECHA_APROBACION) FECHA_APROBACION, u.id_proveedor, ' .
			' max(e.ESTADO_REQ_ESTIM) estado_req_estim, max(m.Mes) Mes ' .
			' FROM mc_universo_cds u inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor ' .
			' INNER JOIN ppmc_estimacion e  ON u.numero = e.ID_PPMC  and e.PROVEEDOR = p.RazonSocial  ' .
			' inner join mc_c_mes m on  m.IdMes  = u.mes ' .
			' WHERE u.Id = ' . CCGetParam("sID",0) . ' and month(e.fecha_carga)=u.mes and YEAR(e.FECHA_CARGA) = u.anio ' .
				' and (u.IdEstimacion = e.ESTIMACION_ID  or u.IdEstimacion is null ) ' .
				' group by e.estimacion_id, e.tipo_unidad, unidades_resultantes,   e.requerimiento_relacionado, e.solicitante, e.ID_PPMC, e.Proveedor, u.id_proveedor');
	if($DBcnDisenio->has_next_record()){
		$DBcnDisenio->next_record();
		$sIdEstimacion=$DBcnDisenio->f("estimacion_id");
		$mc_info_rs_ap_EC->sIDEstimacion->SetValue($DBcnDisenio->f("estimacion_id") .  '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $DBcnDisenio->f("estado_req_estim") . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $DBcnDisenio->f("FECHA_APROBACION") );
		$mc_info_rs_ap_EC->sHrsPropuesta->SetValue($DBcnDisenio->f("esfuerzo"));
		$mc_info_rs_ap_EC->sUnidades->SetValue(number_format($DBcnDisenio->f("unidades_resultantes"),2) . ' ' . $DBcnDisenio->f("tipo_unidad"));
		$mc_info_rs_ap_EC->sRAPE->SetValue($DBcnDisenio->f("solicitante"));
		if (! $mc_info_rs_ap_EC->EditMode){
			$mc_info_rs_ap_EC->FechaAsignacion->SetValue(CCParseDate($DBcnDisenio->f("fecha_asignacion"), array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss",".","S")));
			$mc_info_rs_ap_EC->FechaAceptacionPropuesta->SetValue(CCParseDate($DBcnDisenio->f("FECHA_APROBACION"), array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss",".","S")));
		}
		$mc_info_rs_ap_EC->Id_Proveedor->SetValue($DBcnDisenio->f("Proveedor"));
		$mc_info_rs_ap_EC->sIdPPMC->SetValue($DBcnDisenio->f("ID_PPMC") . " - ". $DBcnDisenio->f("requerimiento_relacionado") . " reportado en " . $DBcnDisenio->f("Mes") );
		$mc_info_rs_ap_EC->hIDPPMC->SetValue($DBcnDisenio->f("ID_PPMC"));
		//$mc_info_rs_ap_EC->DatosUltMod->SetValue('Modificado por ' . $mc_info_rs_ap_EC->hdUsrUltMod->GetValue() . ' el ' . $mc_info_rs_ap_EC->hdFechaUltMod->GetValue());
		
		while($DBcnDisenio->has_next_record()){
			$DBcnDisenio->next_record();
			//si es diferente estimación agrega el dato
			if($DBcnDisenio->f("estimacion_id")!=$sIdEstimacion){
				$mc_info_rs_ap_EC->sIDEstimacion->SetValue($mc_info_rs_ap_EC->sIDEstimacion->GetValue() . "<br>" . $DBcnDisenio->f("estimacion_id") .  '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $DBcnDisenio->f("estado_req_estim") . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $DBcnDisenio->f("FECHA_APROBACION") );
			}
			//si es diferente el rape, agrega el dato
			if($DBcnDisenio->f("solicitante") != $mc_info_rs_ap_EC->sRAPE->GetValue()){
				$mc_info_rs_ap_EC->sRAPE->SetValue($mc_info_rs_ap_EC->sRAPE->GetValue() . '<br>' . $DBcnDisenio->f("solicitante"));	
			}
			$mc_info_rs_ap_EC->sHrsPropuesta->SetValue($mc_info_rs_ap_EC->sHrsPropuesta->GetValue() + $DBcnDisenio->f("esfuerzo"));
			$mc_info_rs_ap_EC->sUnidades->SetValue($mc_info_rs_ap_EC->sUnidades->GetValue() . '<br>' . number_format($DBcnDisenio->f("unidades_resultantes"),2) . ' ' . $DBcnDisenio->f("tipo_unidad"));
		}
		$mc_info_rs_ap_EC->sHrsPropuesta->SetValue(number_format($mc_info_rs_ap_EC->sHrsPropuesta->GetValue(),2 ));
		$sPPMC = $DBcnDisenio->f("ID_PPMC");
		
		//se busca el id del Tipo de Requerimiento
		foreach ($mc_info_rs_ap_EC->sTipoRequerimiento->Values as $clave => $valor) {
    		$sTipoReq =$DBcnDisenio->f("requerimiento_relacionado");
    		if($sTipoReq == $valor[1]){
				$mc_info_rs_ap_EC->sTipoRequerimiento->SetValue($valor[0]);
			}
		}
		$sTipoReq =$DBcnDisenio->f("requerimiento_relacionado");
	}
	//va por los datos del requerimiento relacionado
	switch($DBcnDisenio->f("requerimiento_relacionado")){
		case "Proyecto";
			$DBcnDisenio->query('SELECT Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, ESTADO, TIPO_SERVICIO_CTI ' . 
				' FROM PPMC_PROYECTOS_AS ' .
				' WHERE ID_PROYECTO = ' . $sPPMC );
			break;
		case "RO";
			$DBcnDisenio->query('SELECT Name, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, ESTADO, TipoServicioCTI ' .
				' FROM PPMC_RO_AS ' .
				' WHERE REQUEST_ID = ' . $sPPMC );
			break;
		case "Control de Cambios";
			$DBcnDisenio->query('SELECT Project_Name, SERVICIO_NEGOCIO, TIPO_Solicitud, c.ESTADO, TIPO_SERVICIO_CTI, ID_PPMC,  TIP_REQUERIMIENTO  ' .
				' FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC ' .
				' inner join mc_universo_cds u on tipo=\'PA\'  and u.numero = REQ_CAMBIO_ID and month(c.fecha_carga)=u.mes and YEAR(c.FECHA_CARGA) = u.anio  ' .
				' WHERE REQ_CAMBIO_ID  =  ' . $sPPMC  . ' UNION ' .
				' SELECT NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, c.ESTADO, TIPOSERVICIOCTI, ID_RO,  TIPO_REQUERIMIENTO   ' .
				' FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS on PPMC_RO_AS.request_id = C.ID_RO ' .
				' inner join mc_universo_cds u on tipo=\'PA\'  and u.numero = ID_CC   and month(c.fecha_carga)=u.mes and YEAR(c.FECHA_CARGA) = u.anio  ' .
				' WHERE ID_CC  = ' . $sPPMC  );		
			break;
	}

	if($DBcnDisenio->has_next_record()){
		$DBcnDisenio->next_record();
		$mc_info_rs_ap_EC->sNombreProyecto->SetValue($DBcnDisenio->f(0));
		$mc_info_rs_ap_EC->hdNombreProyecto->SetValue($DBcnDisenio->f(0));
		$mc_info_rs_ap_EC->lServNegocio->SetValue($DBcnDisenio->f(1));
		$mc_info_rs_ap_EC->sEstadoPPMC->SetValue($DBcnDisenio->f(3));
		$mc_info_rs_ap_EC->hdEstado->SetValue($DBcnDisenio->f(3));
		$mc_info_rs_ap_EC->btnCalcular->Visible=true;
		if (! $mc_info_rs_ap_EC->EditMode){
			$mc_info_rs_ap_EC->btnCalcular->Visible=false;
			$mc_info_rs_ap_EC->sHorasManuales->SetValue($mc_info_rs_ap_EC->sHrsPropuesta->GetValue());	
			switch($sTipoReq ){
			case "Proyecto";
				break;
			case "RO";
				break;
			case "Control de Cambios";
				$mc_info_rs_ap_EC->sDatosPadre->SetValue($DBcnDisenio->f(5));
				foreach ($mc_info_rs_ap_EC->TipoPadre->Values as $clave => $valor) {
	    			if($DBcnDisenio->f(6)== $valor[1]){
						$mc_info_rs_ap_EC->TipoPadre->SetValue($valor[0]);
					}
				}
				if($mc_info_rs_ap_EC->sEstadoPPMC->GetValue()!="Cerrado"){
					$mc_info_rs_ap_EC->CumplioHE->SetValue(0);
					$mc_info_rs_ap_EC->CumplioRS->SetValue(0);
				}
				break;
	        }

			//se busca el id del servicio de Negocio
			foreach ($mc_info_rs_ap_EC->sServicioNegocio->Values as $clave => $valor) {
	    		if($DBcnDisenio->f(1)== $valor[1]){
					$mc_info_rs_ap_EC->sServicioNegocio->SetValue($valor[0]);
				}
			}
			//se busca el id del Tipo de Requerimiento
			foreach ($mc_info_rs_ap_EC->sTipoRequerimiento->Values as $clave => $valor) {
	    		if($DBcnDisenio->f(2)== $valor[1]){
					$mc_info_rs_ap_EC->sTipoRequerimiento->SetValue($valor[0]);
				}
			}	
	        // se calculan los días para la propuesta
	        switch($mc_info_rs_ap_EC->sTipoRequerimiento->GetValue()){
		        case 1: //control de cambios
			        if($mc_info_rs_ap_EC->sHrsPropuesta->GetValue()<51){
				        $mc_info_rs_ap_EC->sDiasPropuesta->SetValue(1);	
			        } else {
				        if($mc_info_rs_ap_EC->sHrsPropuesta->GetValue()>100){
					        //si hay udx y son más de 400 horas da 5 dias
					        if($mc_info_rs_ap_EC->sHrsPropuesta->GetValue()>400 && $fUDX){
                             	$mc_info_rs_ap_EC->sDiasPropuesta->SetValue(5);	
					        } else {
					        	$mc_info_rs_ap_EC->sDiasPropuesta->SetValue(3);	
					        }
				        } else {
					        $mc_info_rs_ap_EC->sDiasPropuesta->SetValue(2);	
				        }
			        }
			        break;
		        case 2: //Mantenimiento Mayor
			        $mc_info_rs_ap_EC->sDiasPropuesta->SetValue(5);
			        if($mc_info_rs_ap_EC->sHrsPropuesta->GetValue()<400){
			        	$mc_info_rs_ap_EC->CumplioHE->SetValue(0);
						$mc_info_rs_ap_EC->CumplioRS->SetValue(0);
			        }
			        break;
		        case 3: //Mantenimiento Menor
			        if($mc_info_rs_ap_EC->sHrsPropuesta->GetValue()<51){
				        $mc_info_rs_ap_EC->sDiasPropuesta->SetValue(1);	
			        } else {
				        if($mc_info_rs_ap_EC->sHrsPropuesta->GetValue()>100){
				        	$mc_info_rs_ap_EC->sDiasPropuesta->SetValue(3);	
					        if($mc_info_rs_ap_EC->sHrsPropuesta->GetValue()>400){
					        	$mc_info_rs_ap_EC->CumplioHE->SetValue(0);
								$mc_info_rs_ap_EC->CumplioRS->SetValue(0);
					        }
				        } else {
					        $mc_info_rs_ap_EC->sDiasPropuesta->SetValue(2);	
				        }
			        }
			        break;
		        case 4: //Nuevo Desarrollo
			        $mc_info_rs_ap_EC->sDiasPropuesta->SetValue(5);
			        break;
		        case 5: //Soporte
			        break;
		        case 6: //Servicios Comunes
			        break;
		        }
		}
	}
	$DBcnDisenio->query('SELECT UrlSharepoint, GUID_Lista, GUID_Vista, GUID_WebId from mc_c_proveedor ' . 
			' where razonsocial=\'' . $mc_info_rs_ap_EC->Id_Proveedor->GetValue(). '\'' );		
	if($DBcnDisenio->has_next_record()){
		$DBcnDisenio->next_record();
	}
	
	if($mc_info_rs_ap_EC->URLReferencia->GetValue()!=""){
		//$sRootFolder='PPMC: https://serviciosinternos.sat.gob.mx/itg/project/ViewProject.do?projectId=75266 Sharepoint:http://satportal.dssat.sat.gob.mx/agcti/CDS_SOFTTEK/Operaciones%20SDMA3/Forms/AllItems.aspx?RootFolder=%2Fagcti%2FCDS_SOFTTEK%2FOperaciones%20SDMA3%2FRequerimientos%20de%20Servicios%2FSTF_AGJ%20%28DMA-APE4%29%2FServicios%20Jur%C3%ADdicos%2FRegularizacion%2FOficialiaPartesMAT%2F88841-5%2FDoc%2EProyecto%2FIteracion%2E5%2E1&InitialTabId=Ribbon%2EDocument&VisibilityContext=WSSTabPersistence';
		$sRootFolder=$mc_info_rs_ap_EC->URLReferencia->GetValue();
		$sRootFolder=substr($sRootFolder,strpos($sRootFolder,'RootFolder'),strpos($sRootFolder,'&')-strpos($sRootFolder,'RootFolder'));
		$sRootFolder=urldecode(substr($sRootFolder,strpos($sRootFolder,'agcti')));
		$result = CallSOAPCurl("ListItems",0,$DBcnDisenio->f("UrlSharepoint") , $DBcnDisenio->f("GUID_Lista"), $DBcnDisenio->f("GUID_Vista"), $DBcnDisenio->f("GUID_WebId"),$sRootFolder);
	} else {
		$result = CallSOAPCurl("ListItems",0,$DBcnDisenio->f("UrlSharepoint") , $DBcnDisenio->f("GUID_Lista"), $DBcnDisenio->f("GUID_Vista"), $DBcnDisenio->f("GUID_WebId"),$sPPMC);
	}
	// se va por la información de archivos en el repositorio de Sharepoint via SOAP
	if($result!=""){
	// se procesan los resultados para mostrar información del elemento
	$doc = new DOMDocument();
	$doc->loadXML($result);
	$nodos=$doc->getElementsByTagName("row");
	$sItems = '<table class="Record" cellspacing="0" cellpadding="0" width="340px">';
	for ($item=0; $item < $nodos->length; $item++){
		//si tiene más de una versión va por el historial
		$sVersiones="";
		$sicono = strtolower (substr($nodos->item($item)->getAttribute('ows_LinkFilename'),strrpos($nodos->item($item)->getAttribute('ows_LinkFilename'),".")+1,3)) ;
		switch($sicono){
			case 'doc':
				$sicono='<img src="images/IcoWord.png">&nbsp;';
				break;
			case 'xls':
				$sicono='<img src="images/IcoExcel.png">&nbsp;';
				break;
			case 'pdf':
				$sicono='<img src="images/IcoAdobe.png">&nbsp;';
				break;
			case 'ppt':
				$sicono='<img src="images/IcoPowerPoint.png">&nbsp;';
				break;
			case 'mpp':
				$sicono='<img src="images/IcoProject.png">&nbsp;';
				break;
			default:
				$sicono="";
			}
			$sItems = $sItems . '<tr class="Controls">';
			$sItems = $sItems . '<td><div style="width:320px;overflow:auto">' . $sicono . '<a href="http://satportal.dssat.sat.gob.mx/' . substr($nodos->item($item)->getAttribute('ows_FileRef'),strpos($nodos->item($item)->getAttribute('ows_FileRef'),"#")+1) . '">' . $nodos->item($item)->getAttribute('ows_LinkFilename') . $sVersiones . "</a></div></td>";
			$sItems = $sItems . '<td width="20px"><a target="_blank" href="' . $DBcnDisenio->f("UrlSharepoint") . '/_layouts/versions.aspx?FileName=/'. rawurlencode(substr($nodos->item($item)->getAttribute('ows_FileRef'),strpos($nodos->item($item)->getAttribute('ows_FileRef'),"#")+1))  . '&listid=' . $DBcnDisenio->f("GUID_Lista") . '">' . $nodos->item($item)->getAttribute('ows_owshiddenversion'). '</a></td>';
			$sItems = $sItems . "<td width='90px'>" . CCFormatDate(CCParseDate(substr(strstr($nodos->item($item)->getAttribute('ows_Created_x0020_Date'),'#'),1),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","HH",":","nn")) . "</td>";
			$sItems = $sItems . "</tr>";
	}	
	$sItems = $sItems . "</table>";
	$lDocs->SetValue(iconv('UTF-8','Windows-1252', $sItems));
	}
	
    // Verifica si esta cerrado para medición
    $flgCerrado=CCDLookUp("Medido","mc_universo_cds","Id='" . CCGetParam("sID",0) ."'",$DBcnDisenio);
    if($flgCerrado==1){
    	$mc_info_rs_ap_EC->Button_Insert->Visible= false;
    	$mc_info_rs_ap_EC->Button_Update->Visible = false;
    }
	$DBcnDisenio->Close();
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_BeforeShow @3-D3594E4A
    return $mc_info_rs_ap_EC_BeforeShow;
}
//End Close mc_info_rs_ap_EC_BeforeShow

//mc_info_rs_ap_EC_ds_BeforeExecuteInsert @3-5AC3F9DB
function mc_info_rs_ap_EC_ds_BeforeExecuteInsert(& $sender)
{
    $mc_info_rs_ap_EC_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_ds_BeforeExecuteInsert

//Custom Code @30-2A29BDB7
// -------------------------
	
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_ds_BeforeExecuteInsert @3-7C9ECD1A
    return $mc_info_rs_ap_EC_ds_BeforeExecuteInsert;
}
//End Close mc_info_rs_ap_EC_ds_BeforeExecuteInsert

//mc_info_rs_ap_EC_ds_BeforeBuildInsert @3-82F5C152
function mc_info_rs_ap_EC_ds_BeforeBuildInsert(& $sender)
{
    $mc_info_rs_ap_EC_ds_BeforeBuildInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_ds_BeforeBuildInsert

//Custom Code @31-2A29BDB7
// -------------------------
	global $DBcnDisenio;
	global $vId;
	global $vIdPPMC;
	//obtiene los datos no editables
	$vId= CCGetParam("sID",0);
	$DBcnDisenio->query('SELECT id_proveedor, numero, tipo, mes, anio ' .
					' FROM mc_universo_cds u WHERE u.Id = ' . $vId );
	
	if($DBcnDisenio->next_record()){
    	$vIdProveedor = $DBcnDisenio->f(0);
    	$vIdPPMC = $DBcnDisenio->f(1);
    	$vMesReporte = $DBcnDisenio->f(3);
    	$vAnioReporte = $DBcnDisenio->f(4);
    }
	$mc_info_rs_ap_EC->sID->SetValue($vId);
    $mc_info_rs_ap_EC->hIDPPMC->SetValue($vIdPPMC);
    $mc_info_rs_ap_EC->hdUsrAlta->SetValue(CCGetUserLogin());
    $mc_info_rs_ap_EC->hdUsrUltMod->SetValue(CCGetUserLogin());
    
	//se guarda en califica para obtener el ID
	$sCumpleRS=$mc_info_rs_ap_EC->CumplioRS->GetValue();
	if($sCumpleRS === ""){
			$sCumpleRS="NULL";
	}
	$sCumpleHE=$mc_info_rs_ap_EC->CumplioHE->GetValue();
	if($sCumpleHE ===""){
		$sCumpleHE="NULL";
	}
	// verifica si existe el PPMC en la tabla de calificación
    $sSQL="select count(*) from mc_calificacion_rs_MC where IdUniverso= " . CCGetParam("sID");
    $DBcnDisenio->query($sSQL);
    if($DBcnDisenio->next_record()){ 
    	if($DBcnDisenio->f(0)==0){ // si no existe se inserta
			$sInsert="insert into mc_calificacion_rs_mc  (id_ppmc, id_proveedor, id_servicio_negocio, id_servicio_cont, id_tipo, [descripción], mesreporte, anioreporte, HERR_EST_COST, REQ_SERV,  obs_manuales, iduniverso) " .
				" values (" . $vIdPPMC . ", " . $vIdProveedor . ", " . $mc_info_rs_ap_EC->sServicioNegocio->GetValue() . ", " . $mc_info_rs_ap_EC->lstServContractual->GetValue() . ", " . 
				$mc_info_rs_ap_EC->sTipoRequerimiento->GetValue() . " , '" . $mc_info_rs_ap_EC->hdNombreProyecto->GetValue() . "'," . $vMesReporte . "," . $vAnioReporte . "," .
				$sCumpleHE . "," . $sCumpleRS . ",'" . str_replace("'","''",$mc_info_rs_ap_EC->Observaciones->GetValue()) . "'," . CCGetParam("sID") . ")";    	
    	} else {
    		$sInsert="update mc_calificacion_rs_mc  " .
			"set id_servicio_negocio = " . $mc_info_rs_ap_EC->sServicioNegocio->GetValue() .", " .
			" id_servicio_cont=" . $mc_info_rs_ap_EC->lstServContractual->GetValue() .", " .
			" id_tipo=" .  $mc_info_rs_ap_EC->sTipoRequerimiento->GetValue() . ", ". 
			" REQ_SERV=" . $sCumpleRS . ", HERR_EST_COST = " . $sCumpleHE .  ", " .
			" obs_manuales = '" . str_replace("'","''",$mc_info_rs_ap_EC->Observaciones->GetValue())  ."' " .
			" Where IdUniverso=" . CCGetParam("sID");
    	}
    	$DBcnDisenio->query($sInsert);
    }
    // checar si hay errores y hacer transaccional   
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_ds_BeforeBuildInsert @3-6561C0F5
    return $mc_info_rs_ap_EC_ds_BeforeBuildInsert;
}
//End Close mc_info_rs_ap_EC_ds_BeforeBuildInsert

//mc_info_rs_ap_EC_BeforeInsert @3-0674A207
function mc_info_rs_ap_EC_BeforeInsert(& $sender)
{
    $mc_info_rs_ap_EC_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_BeforeInsert

//Custom Code @104-2A29BDB7
// -------------------------

// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_BeforeInsert @3-C17FDAE4
    return $mc_info_rs_ap_EC_BeforeInsert;
}
//End Close mc_info_rs_ap_EC_BeforeInsert

//mc_info_rs_ap_EC_ds_BeforeBuildUpdate @3-1D5B4BD1
function mc_info_rs_ap_EC_ds_BeforeBuildUpdate(& $sender)
{
    $mc_info_rs_ap_EC_ds_BeforeBuildUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_ds_BeforeBuildUpdate

//Custom Code @118-2A29BDB7
// -------------------------
	
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_ds_BeforeBuildUpdate @3-AA48017A
    return $mc_info_rs_ap_EC_ds_BeforeBuildUpdate;
}
//End Close mc_info_rs_ap_EC_ds_BeforeBuildUpdate

//mc_info_rs_ap_EC_BeforeUpdate @3-E76DF002
function mc_info_rs_ap_EC_BeforeUpdate(& $sender)
{
    $mc_info_rs_ap_EC_BeforeUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_BeforeUpdate

//Custom Code @134-2A29BDB7
// -------------------------
	//se guarda en califica para obtener el ID
	$db=new clsDBcnDisenio;
	$vId= CCGetParam("sID",0);
	$db->query('SELECT id_proveedor, numero, tipo, mes, anio ' .
					' FROM mc_universo_cds u WHERE u.Id = ' . $vId );
	
	if($db->next_record()){
    	$vIdProveedor = $db->f(0);
    	$vIdPPMC = $db->f(1);
    	$vMesReporte = $db->f(3);
    	$vAnioReporte = $db->f(4);
	}
	
	$sCumpleRS=$mc_info_rs_ap_EC->CumplioRS->GetValue();
	if($sCumpleRS === ""){
		$sCumpleRS="NULL";
	}
	$sCumpleHE=$mc_info_rs_ap_EC->CumplioHE->GetValue();
	if($sCumpleHE ===""){
		$sCumpleHE="NULL";
	}
	
	// verifica si existe el PPMC en la tabla de calificación
    $sSQL="select count(*) from mc_calificacion_rs_MC where IdUniverso= " . CCGetParam("sID");
    $db->query($sSQL);
    if($db->next_record()){ 
    	if($db->f(0)==0){ // si no existe se inserta
			$sUpdate="insert into mc_calificacion_rs_mc  (id_ppmc, id_proveedor, id_servicio_negocio, id_servicio_cont, id_tipo, [descripción], mesreporte, anioreporte, HERR_EST_COST, REQ_SERV,  obs_manuales, iduniverso) " .
				" values (" . $vIdPPMC . ", " . $vIdProveedor . ", " . $mc_info_rs_ap_EC->sServicioNegocio->GetValue() . ", " . $mc_info_rs_ap_EC->lstServContractual->GetValue() . ", " . 
				$mc_info_rs_ap_EC->sTipoRequerimiento->GetValue() . " , '" . str_replace('\'','',$mc_info_rs_ap_EC->hdNombreProyecto->GetValue()) . "'," . $vMesReporte . "," . $vAnioReporte . "," .
				$sCumpleHE . "," . $sCumpleRS . ",'" . str_replace("'","''",$mc_info_rs_ap_EC->Observaciones->GetValue()) . "'," . CCGetParam("sID") . ")";    	
    	} else {
    		$sUpdate="update mc_calificacion_rs_mc  " .
			"set id_servicio_negocio = " . $mc_info_rs_ap_EC->sServicioNegocio->GetValue() .", " .
			" id_servicio_cont=" . $mc_info_rs_ap_EC->lstServContractual->GetValue() .", " .
			" id_tipo=" .  $mc_info_rs_ap_EC->sTipoRequerimiento->GetValue() . ", ". 
			" REQ_SERV=" . $sCumpleRS . ", HERR_EST_COST = " . $sCumpleHE .  ", " .
			" obs_manuales = '" . str_replace("'","''",$mc_info_rs_ap_EC->Observaciones->GetValue())  ."' " .
			" Where IdUniverso=" . CCGetParam("sID");
    	}
    }
    $db->query($sUpdate);
    
		
		//$mc_info_rs_ap_EC->hdFechaUltMod->SetValue(CCFormatDate(CCParseDate(date("Y-m-d H:i:s.u"),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss",".","S")),array("yyyy","-","mm","-","dd"," ","HH",":","nn",".","S")));
		$mc_info_rs_ap_EC->hdFechaUltMod->SetValue(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y")));                    
        $mc_info_rs_ap_EC->hdUsrUltMod->SetValue(CCGetUserLogin());
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_BeforeUpdate @3-0E561B6B
    return $mc_info_rs_ap_EC_BeforeUpdate;
}
//End Close mc_info_rs_ap_EC_BeforeUpdate

//mc_info_rs_ap_EC_ds_BeforeExecuteUpdate @3-303B7F58
function mc_info_rs_ap_EC_ds_BeforeExecuteUpdate(& $sender)
{
    $mc_info_rs_ap_EC_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_ds_BeforeExecuteUpdate

//Custom Code @143-2A29BDB7
// -------------------------
  
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_ds_BeforeExecuteUpdate @3-B3B70C95
    return $mc_info_rs_ap_EC_ds_BeforeExecuteUpdate;
}
//End Close mc_info_rs_ap_EC_ds_BeforeExecuteUpdate

//mc_info_rs_ap_EC_OnValidate @3-FBA3C4F1
function mc_info_rs_ap_EC_OnValidate(& $sender)
{
    $mc_info_rs_ap_EC_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_OnValidate

//Custom Code @147-2A29BDB7
// -------------------------
    for($i=0;$i<$mc_info_rs_ap_EC->FechaAsignacion->Errors->Count();$i++){
    	$mc_info_rs_ap_EC->FechaAsignacion->Errors->Errors[$i]=str_replace("HH:nn","HH:mm",$mc_info_rs_ap_EC->FechaAsignacion->Errors->Errors[$i]);
    }
    for($i=0;$i<$mc_info_rs_ap_EC->FechaEntregaPropuesta->Errors->Count();$i++){
    	$mc_info_rs_ap_EC->FechaEntregaPropuesta->Errors->Errors[$i]=str_replace("HH:nn","HH:mm",$mc_info_rs_ap_EC->FechaEntregaPropuesta->Errors->Errors[$i]);
    }
    for($i=0;$i<$mc_info_rs_ap_EC->FechaAceptacionPropuesta->Errors->Count();$i++){
    	$mc_info_rs_ap_EC->FechaAceptacionPropuesta->Errors->Errors[$i]=str_replace("HH:nn","HH:mm",$mc_info_rs_ap_EC->FechaAceptacionPropuesta->Errors->Errors[$i]);
    }
    //si es control de cambios debe llevar padre
    if($mc_info_rs_ap_EC->sTipoRequerimiento->GetValue()==1){
    	if($mc_info_rs_ap_EC->sDatosPadre->GetValue()==""){
    		$mc_info_rs_ap_EC->Errors->addError("Debe indicar el PPMC Padre");
    	}
    } else {
    	if($mc_info_rs_ap_EC->sDatosPadre->GetValue()!=""){
    		$mc_info_rs_ap_EC->Errors->addError("No haber PPMC Padre");
    	}
    } 
    //valida si debe tener fecha de evidencia herramienta estimacion
    if($mc_info_rs_ap_EC->SinEvidencia->GetValue()==0){
    	if($mc_info_rs_ap_EC->FechaEntregaEvidencia->GetValue()==""){
    		$mc_info_rs_ap_EC->Errors->addError("Debe especificar la fecha de entrega de la evidencia de la herramienta de estimación");	
    		}
    	}
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_OnValidate @3-ECA22AC3
    return $mc_info_rs_ap_EC_OnValidate;
}
//End Close mc_info_rs_ap_EC_OnValidate

//Page_BeforeShow @1-4760C198
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsApbDetalle; //Compatibility
//End Page_BeforeShow

//Custom Code @23-2A29BDB7
// -------------------------
    global $lkAnterior;
    global $lkSiguiente;
    
    $aPPMCsAPbIds = unserialize(CCGetSession("aPPMCsAPbIds"));
    $aPPMCsAPbValues = unserialize(CCGetSession("aPPMCsAPbValues"));

    if(count($aPPMCsAPbIds)>1){
    	$iPos=array_search(CCGetParam("sID"),$aPPMCsAPbIds);
    	if($iPos==0){
			$lkAnterior->SetLink("PPMCSApbLista.php?" . CCGetQueryString("QueryString",""));
			$lkAnterior->SetValue("Lista Requerimientos");
    	} else {
    		$lkAnterior->SetValue($aPPMCsAPbValues[$iPos-1]);
    		$lkAnterior->SetLink("PPMCsApbDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","sID"),"ccsForm"),"sID",$aPPMCsAPbIds[$iPos-1]));
    	}
    	if($iPos < count($aPPMCsAPbIds)-1){
    		$lkSiguiente->SetValue($aPPMCsAPbValues[$iPos+1]);
    		$lkSiguiente->SetLink("PPMCsApbDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","sID"),"ccsForm"),"sID",$aPPMCsAPbIds[$iPos+1]));
    	} else {
    		$lkSiguiente->SetValue("");
    	}
    }
    
    
    global $db;
    global $Tpl;
    $db = new clsDBcnDisenio;
    $sNoHabil="";
  	$sSQL= "SELECT fecha FROM dia_inhabil WHERE fecha > DATEADD(M,-6,getdate())";
	$db->query($sSQL);
	while($db->next_record()){
			$sNoHabil= $sNoHabil .  ","  . $db->f(0) ;
		}
    
    $Tpl->SetVar("lbNoHabiles",$sNoHabil);
    $db->close();
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeOutput @1-5A3EDBA4
function Page_BeforeOutput(& $sender)
{
    $Page_BeforeOutput = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsApbDetalle; //Compatibility
//End Page_BeforeOutput

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeOutput @1-8964C188
    return $Page_BeforeOutput;
}
//End Close Page_BeforeOutput

function CallSOAPCurl($tipoquery,$ItemId, $URLSahrepoint, $GUID_Lista, $GUID_Vista, $GUID_WebId, $sFolder){
	global $dbSOAPIds;
	global $sPPMC;
	global $mc_info_rs_ap_EC;
	// para información de la implementación buscar en internet CURL SOAP NTLM
	switch ($tipoquery){
		case "ListItems":
			// arma la petición de la lista de elementos
			$post_string='<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
			  '<soap:Body>'.
			  '  <GetListItems xmlns="http://schemas.microsoft.com/sharepoint/soap/">'.
			  '    <listName>' . $GUID_Lista . '</listName>'.
			  '		<viewName>' . $GUID_Vista . '</viewName>'.
			  '    <rowLimit>500</rowLimit>'.
			  '		<query><Query><Where>' .
			  '		<And>' .
			  '			<Eq><FieldRef Name="FSObjType" /><Value Type="Lookup">0</Value></Eq> '.
			  '			<And><Contains><FieldRef Name="FileRef" /><Value Type="Text">' . $sPPMC  . '</Value></Contains> '.
			  '				 <And><Contains><FieldRef Name="FileRef" /><Value Type="Text">Proy</Value></Contains>'.
			  '				 <Contains><FieldRef Name="FileRef" /><Value Type="Text">' . $sFolder . '</Value></Contains></And>' .
			  '			</And>' .
			  '		</And></Where></Query></query> '.
			  '	   <queryOptions> '.
			  '      <QueryOptions> '.
			  '         <ViewAttributes Scope="RecursiveAll"/> '.
			  '       </QueryOptions> '.
			  '     </queryOptions> '.
			  '    <webID>' . $GUID_WebId . '</webID>'.
			  '  </GetListItems>'.
			  '</soap:Body>'.
			'</soap:Envelope>';			
			break;
		case "ItemVersions":
			$post_string='<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
			 ' <soap:Body>'.
			 '   <GetVersionCollection xmlns="http://schemas.microsoft.com/sharepoint/soap/">'.
			 '     <strlistID>' . $GUID_Lista . '</strlistID>'.
			 '     <strlistItemID>' . $ItemId . '</strlistItemID>'.
			 '	   <strFieldName>ows_FileLeafRef</strFieldName> '.
			 '   </GetVersionCollection>'.
			 ' </soap:Body> '.
			'</soap:Envelope>';
			break;
		}
	
	//se indica la ruta del servicio 
	$url= $URLSahrepoint . "/_vti_bin/Lists.asmx";
	//información de autenticación
	$db= new clsDBcnDisenio;
	$db->query('SELECT UsrSharePoint, PwdSharePoint ' .
					' FROM mc_c_usuarios u WHERE u.Id = ' . CCGetUserId());
	
	if($db->next_record()){
    	$usr= $db->f(0);
    	$pwd= $db->f(1);
    }
	$db->close();	
	$curl = curl_init();
 	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_URL, $url);
 	curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
 	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
 	curl_setopt($curl, CURLOPT_USERPWD, $usr . ':' . $pwd);
 	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 	curl_setopt($curl, CURLOPT_HTTPHEADER,     array('Content-Type: text/xml; charset=utf-8','SOAPAction: "http://schemas.microsoft.com/sharepoint/soap/GetListItems"', 'Content-Length: '.strlen($post_string) ));
 	curl_setopt($curl, CURLOPT_POSTFIELDS,    $post_string); 
 	$result = curl_exec($curl);
 	curl_close($curl);
	return $result;
}
	
?>
