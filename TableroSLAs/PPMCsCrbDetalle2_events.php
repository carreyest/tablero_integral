<?php
//BindEvents Method @1-64642A64
function BindEvents()
{
    global $mc_info_rs_ap_EC;
    global $mc_info_rs_cr_RE_RC_Artef1;
    global $mc_info_rs_cr_RE_RC_Artef2;
    global $CCSEvents;
    $mc_info_rs_ap_EC->sTipoRequerimiento->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_sTipoRequerimiento_BeforeShow";
    $mc_info_rs_ap_EC->lstServContractual->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_lstServContractual_BeforeShow";
    $mc_info_rs_ap_EC->FechaFirmaCAES->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_FechaFirmaCAES_BeforeShow";
    $mc_info_rs_ap_EC->MaxDiasRetrasoNat->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_MaxDiasRetrasoNat_BeforeShow";
    $mc_info_rs_ap_EC->PctMax->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_PctMax_BeforeShow";
    $mc_info_rs_ap_EC->btnCalcular->CCSEvents["OnClick"] = "mc_info_rs_ap_EC_btnCalcular_OnClick";
    $mc_info_rs_ap_EC->CCSEvents["BeforeShow"] = "mc_info_rs_ap_EC_BeforeShow";
    $mc_info_rs_ap_EC->ds->CCSEvents["BeforeExecuteInsert"] = "mc_info_rs_ap_EC_ds_BeforeExecuteInsert";
    $mc_info_rs_ap_EC->ds->CCSEvents["BeforeBuildInsert"] = "mc_info_rs_ap_EC_ds_BeforeBuildInsert";
    $mc_info_rs_ap_EC->CCSEvents["BeforeInsert"] = "mc_info_rs_ap_EC_BeforeInsert";
    $mc_info_rs_ap_EC->ds->CCSEvents["BeforeBuildUpdate"] = "mc_info_rs_ap_EC_ds_BeforeBuildUpdate";
    $mc_info_rs_ap_EC->CCSEvents["BeforeUpdate"] = "mc_info_rs_ap_EC_BeforeUpdate";
    $mc_info_rs_ap_EC->ds->CCSEvents["BeforeExecuteUpdate"] = "mc_info_rs_ap_EC_ds_BeforeExecuteUpdate";
    $mc_info_rs_ap_EC->CCSEvents["OnValidate"] = "mc_info_rs_ap_EC_OnValidate";
    $mc_info_rs_cr_RE_RC_Artef1->FechaUltMod->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RE_RC_Artef1_FechaUltMod_BeforeShow";
    $mc_info_rs_cr_RE_RC_Artef1->FechaEntrega->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RE_RC_Artef1_FechaEntrega_BeforeShow";
    $mc_info_rs_cr_RE_RC_Artef1->ID_PPMC->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RE_RC_Artef1_ID_PPMC_BeforeShow";
    $mc_info_rs_cr_RE_RC_Artef1->Id_Padre->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RE_RC_Artef1_Id_Padre_BeforeShow";
    $mc_info_rs_cr_RE_RC_Artef1->FechaEstFin->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RE_RC_Artef1_FechaEstFin_BeforeShow";
    $mc_info_rs_cr_RE_RC_Artef1->lblDeductiva->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RE_RC_Artef1_lblDeductiva_BeforeShow";
    $mc_info_rs_cr_RE_RC_Artef1->CCSEvents["BeforeInsert"] = "mc_info_rs_cr_RE_RC_Artef1_BeforeInsert";
    $mc_info_rs_cr_RE_RC_Artef1->CCSEvents["BeforeUpdate"] = "mc_info_rs_cr_RE_RC_Artef1_BeforeUpdate";
    $mc_info_rs_cr_RE_RC_Artef1->ds->CCSEvents["BeforeExecuteInsert"] = "mc_info_rs_cr_RE_RC_Artef1_ds_BeforeExecuteInsert";
    $mc_info_rs_cr_RE_RC_Artef2->CCSEvents["BeforeShowRow"] = "mc_info_rs_cr_RE_RC_Artef2_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["BeforeOutput"] = "Page_BeforeOutput";
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
}
//End BindEvents Method

//mc_info_rs_ap_EC_sTipoRequerimiento_BeforeShow @27-BDFDC5DB
function mc_info_rs_ap_EC_sTipoRequerimiento_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_sTipoRequerimiento_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_sTipoRequerimiento_BeforeShow

//Custom Code @278-2A29BDB7
// -------------------------

 
//  $mc_info_rs_ap_EC->sTipoRequerimiento->Values = array(array("1", "High"),array("2", "Normal"), array("3", "Low"));


    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_sTipoRequerimiento_BeforeShow @27-A26E5CC5
    return $mc_info_rs_ap_EC_sTipoRequerimiento_BeforeShow;
}
//End Close mc_info_rs_ap_EC_sTipoRequerimiento_BeforeShow

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

//mc_info_rs_ap_EC_FechaFirmaCAES_BeforeShow @268-26CC1E55
function mc_info_rs_ap_EC_FechaFirmaCAES_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_FechaFirmaCAES_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_FechaFirmaCAES_BeforeShow

//Close mc_info_rs_ap_EC_FechaFirmaCAES_BeforeShow @268-AD519623
    return $mc_info_rs_ap_EC_FechaFirmaCAES_BeforeShow;
}
//End Close mc_info_rs_ap_EC_FechaFirmaCAES_BeforeShow

//mc_info_rs_ap_EC_MaxDiasRetrasoNat_BeforeShow @147-59FF7E81
function mc_info_rs_ap_EC_MaxDiasRetrasoNat_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_MaxDiasRetrasoNat_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_MaxDiasRetrasoNat_BeforeShow

//Custom Code @267-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_MaxDiasRetrasoNat_BeforeShow @147-0FABA218
    return $mc_info_rs_ap_EC_MaxDiasRetrasoNat_BeforeShow;
}
//End Close mc_info_rs_ap_EC_MaxDiasRetrasoNat_BeforeShow

//mc_info_rs_ap_EC_PctMax_BeforeShow @276-95121BE8
function mc_info_rs_ap_EC_PctMax_BeforeShow(& $sender)
{
    $mc_info_rs_ap_EC_PctMax_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_PctMax_BeforeShow

//Custom Code @279-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_PctMax_BeforeShow @276-99422E0B
    return $mc_info_rs_ap_EC_PctMax_BeforeShow;
}
//End Close mc_info_rs_ap_EC_PctMax_BeforeShow

//mc_info_rs_ap_EC_btnCalcular_OnClick @372-B63639AC
function mc_info_rs_ap_EC_btnCalcular_OnClick(& $sender)
{
    $mc_info_rs_ap_EC_btnCalcular_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_ap_EC; //Compatibility
//End mc_info_rs_ap_EC_btnCalcular_OnClick

//Custom Code @373-2A29BDB7
// -------------------------
    global $db;
    global $mc_info_rs_cr_RE_RC_Artef1;
    $db= new clsDBcnDisenio;
    $sSQL= 'update mc_info_rs_cr_RE_RC set MaxDiasRetrasoNat  =(select top 1 DiasNaturalesDesviacion from mc_info_rs_cr_RE_RC_Artefacto where Id_Padre = mc_info_rs_cr_RE_RC.Id   order by DiasNaturalesDesviacion desc ), ' .
			' MaxDiasRetrasoHab = (select top 1 DiasHabilesDesviacion from mc_info_rs_cr_RE_RC_Artefacto where Id_Padre = mc_info_rs_cr_RE_RC.Id order by DiasHabilesDesviacion desc ) , ' .
			' PctMax = isnull((select top 1 PctDeductiva from mc_info_rs_cr_RE_RC_Artefacto where Id_Padre = mc_info_rs_cr_RE_RC.Id  order by PctDeductiva desc ),0)	' .
			' where mc_info_rs_cr_RE_RC.Id= ' . CCGetParam("sID",0) ;
	$db->query($sSQL);
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_btnCalcular_OnClick @372-F08542AE
    return $mc_info_rs_ap_EC_btnCalcular_OnClick;
}
//End Close mc_info_rs_ap_EC_btnCalcular_OnClick

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
	global $lbMostrarSLA;
	global $db;
	
	//se va por la información de la estimación
	$DBcnDisenio->query('SELECT e.estimacion_id, sum(CAST(e.esfuerzo AS FLOAT)) esfuerzo, e.tipo_unidad, sum(cast(e.unidades_resultantes AS FLOAT)) unidades_resultantes, ' .
			' e.requerimiento_relacionado, e.solicitante, max(e.fecha_asignacion) fecha_asignacion, e.ID_PPMC, e.Proveedor, max(e.FECHA_APROBACION) FECHA_APROBACION, u.id_proveedor, , Max(m.Mes) NomMes ' .
			' FROM mc_universo_cds u inner join mc_c_mes m on m.IdMes = u.mes  LEFT JOIN PPMC_ESTIMACION e  ON e.Id_PPMC = u.Numero ' .
			' WHERE u.Id = ' . CCGetParam("sID",0) . ' and (u.IdEstimacion = ESTIMACION_ID  or u.IdEstimacion is null) and month(e.fecha_carga)=u.mes and YEAR(e.FECHA_CARGA) = u.anio ' .
				' and e.ESTADO_REQ_ESTIM = \'Estimación Aprobada\' and e.RESULTADO_ESTIMACION <> \'Rechazada\' '  . 
				' group by e.estimacion_id, e.tipo_unidad, unidades_resultantes,   e.requerimiento_relacionado, e.solicitante, e.ID_PPMC, e.Proveedor, u.id_proveedor ');
	if($DBcnDisenio->has_next_record()){
		$DBcnDisenio->next_record();
		if (! $mc_info_rs_ap_EC->EditMode){
			$lbMostrarSLA='onload="MostrarSLA(3)"';
		} else {
			$lbMostrarSLA='onload="MostrarSLA(0)"';
		}
		
		$mc_info_rs_ap_EC->Id_Proveedor->SetValue($DBcnDisenio->f("Proveedor"));
		$mc_info_rs_ap_EC->sIdPPMC->SetValue($DBcnDisenio->f("ID_PPMC") );
		$mc_info_rs_ap_EC->lReportado->SetValue( " - Reportado en " . $DBcnDisenio->f("NomMes"));
		$mc_info_rs_ap_EC->hIDPPMC->SetValue($DBcnDisenio->f("ID_PPMC"));
		//$mc_info_rs_ap_EC->DatosUltMod->SetValue('Modificado por ' . $mc_info_rs_ap_EC->hdUsrUltMod->GetValue() . ' el ' . $mc_info_rs_ap_EC->hdFechaUltMod->GetValue());
		
		$sPPMC = $DBcnDisenio->f("ID_PPMC");
		$sTipoReq =$DBcnDisenio->f("requerimiento_relacionado");
		//se busca el id del Tipo de Requerimiento
		foreach ($mc_info_rs_ap_EC->sTipoRequerimiento->Values as $clave => $valor) {
    		if($sTipoReq == $valor[1]){
				$mc_info_rs_ap_EC->sTipoRequerimiento->SetValue($valor[0]);
			}
		}
	} else { // si no tiene Estimación
		$db= new clsDBcnDisenio;
		$sql="SELECT ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA,  Proveedor, u.mes, u.anio, m.mes NomMes  " .
			" from mc_universo_cds u  inner join mc_c_mes m on m.IdMes = u.mes  LEFT JOIN vw_PPMC_Proy_RO_CC on " . 
			" vw_PPMC_Proy_RO_CC.ID_PPMC = u.numero  where month(fecha_carga)=u.mes and YEAR(FECHA_CARGA) = u.anio " .
			" AND u.id = " . CCGetParam("sID");
    	$db->query($sql);
		if($db->next_record()){
			if (! $mc_info_rs_ap_EC->EditMode){
				$lbMostrarSLA='onload="MostrarSLA(3)"';
			} else {
				$lbMostrarSLA='onload="MostrarSLA(0)"';
			}
			
			$mc_info_rs_ap_EC->Id_Proveedor->SetValue($db->f("Proveedor"));
			$mc_info_rs_ap_EC->sIdPPMC->SetValue($db->f("ID_PPMC") );
			$mc_info_rs_ap_EC->lReportado->SetValue( " - Reportado en " . $db->f("NomMes"));
			$mc_info_rs_ap_EC->hIDPPMC->SetValue($db->f("ID_PPMC"));
			//$mc_info_rs_ap_EC->DatosUltMod->SetValue('Modificado por ' . $mc_info_rs_ap_EC->hdUsrUltMod->GetValue() . ' el ' . $mc_info_rs_ap_EC->hdFechaUltMod->GetValue());
			
			$sPPMC = $db->f("ID_PPMC");
			$sTipoReq =$db->f("TIPO_REQUERIMIENTO");
			//se busca el id del Tipo de Requerimiento
			foreach ($mc_info_rs_ap_EC->sTipoRequerimiento->Values as $clave => $valor) {
	    		if($sTipoReq == $valor[1]){
					$mc_info_rs_ap_EC->sTipoRequerimiento->SetValue($valor[0]);
				}
			}
		}
	}


	
	switch($sTipoReq){
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
			$DBcnDisenio->query('SELECT Project_Name, SERVICIO_NEGOCIO, TIPO_Solicitud, c.ESTADO, TIPO_SERVICIO_CTI ' .
				' FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC ' .
				' WHERE REQ_CAMBIO_ID  =  ' . $sPPMC );		
			break;
		default:
			$DBcnDisenio->query('SELECT NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, ESTADO, TIPO_SERVICIO_CTI ' .
				' FROM vw_PPMC_Proy_RO_CC WHERE id_ppmc = ' . $sPPMC );		
			break;
	}

	if($DBcnDisenio->has_next_record()){
		$DBcnDisenio->next_record();
		$mc_info_rs_ap_EC->sNombreProyecto->SetValue($DBcnDisenio->f(0));
		$mc_info_rs_ap_EC->hdNombreProyecto->SetValue($DBcnDisenio->f(0));
		$mc_info_rs_ap_EC->lServNegocio->SetValue($DBcnDisenio->f(1));
		//$mc_info_rs_ap_EC->sTipoRequerimiento->SetValue($DBcnDisenio->f(2));
		$mc_info_rs_ap_EC->sEstadoPPMC->SetValue($DBcnDisenio->f(3));
		$mc_info_rs_ap_EC->hdEstado->SetValue($DBcnDisenio->f(3));
		//$mc_info_rs_ap_EC->lServContractual->SetValue($DBcnDisenio->f(4));
		$mc_info_rs_ap_EC->btnCalcular->Visible=true;
		if (! $mc_info_rs_ap_EC->EditMode){
			$mc_info_rs_ap_EC->btnCalcular->Visible=false;	
			switch($sTipoReq ){
			case "Proyecto";
				break;
			case "RO";
				break;
			case "Control de Cambios";
				if($mc_info_rs_ap_EC->sEstadoPPMC->GetValue()!="Cerrado"){
					$mc_info_rs_ap_EC->CumplioHE->SetValue(0);
					$mc_info_rs_ap_EC->CumplioRS->SetValue(0);
				}
				break;
	        }
			$mc_info_rs_ap_EC->sServicioNegocio->SetValue($DBcnDisenio->f(1));
			//se busca el id del Tipo de Requerimiento
			$mc_info_rs_ap_EC->sTipoRequerimiento->SetValue($DBcnDisenio->f(2));
			//si el tipo de requerimiento es mantenimiento Mayor o nuevo desarrollo pone por default Completar Tareas en Ruta Crítica
		    if($mc_info_rs_ap_EC->sTipoRequerimiento->GetValue()==2 || $mc_info_rs_ap_EC->sTipoRequerimiento->GetValue()==4){
		        $mc_info_rs_ap_EC->lbSLA->SetValue(0);
		    } else { //si no, pone por default Retraso en Entregables
		    	$mc_info_rs_ap_EC->lbSLA->SetValue(1);
		    }
		}
	}
	$DBcnDisenio->query('SELECT UrlSharepoint, GUID_Lista, GUID_Vista, GUID_WebId from mc_c_proveedor ' . 
			' where razonsocial=\'' . $mc_info_rs_ap_EC->Id_Proveedor->GetValue(). '\'' );		
	if($DBcnDisenio->has_next_record()){
		$DBcnDisenio->next_record();
	}
	// se va por la información de archivos en el repositorio de Sharepoint via SOAP
	$result = CallSOAPCurl("ListItems",0,$DBcnDisenio->f("UrlSharepoint") , $DBcnDisenio->f("GUID_Lista"), $DBcnDisenio->f("GUID_Vista"), $DBcnDisenio->f("GUID_WebId"));
	if($result!=""){
	// se procesan los resultados para mostrar información del elemento
	$doc = new DOMDocument();
	$doc->loadXML($result);
	$nodos=$doc->getElementsByTagName("row");
	$sItems = '<table class="Record" cellspacing="0" cellpadding="0" width="340px">';
	for ($item=0; $item < $nodos->length; $item++){
		//si tiene más de una versión va por el historial
		$sVersiones="";
		/*
		if($nodos->item($item)->getAttribute('ows_owshiddenversion')!='1') {
			$versiones = CallSOAPCurl("ItemVersions",$nodos->item($item)->getAttribute('ows_ID'));
			$vdoc = new DOMDocument();
			$vdoc->loadXML($versiones);
			$nVersion = $vdoc->getElementsByTagName("Version");
			$sVersiones='<table class="Record" cellspacing="0" cellpadding="0">';
			for ($vitem=0; $vitem < $nVersion->length; $vitem++){
				$sVersiones = $sVersiones . '<tr class="Controls">';
				$sVersiones = $sVersiones. "<td>" . $nVersion->item($vitem)->getAttribute('ows_FileLeafRef') . "</td>";
				$sVersiones = $sVersiones. "<td>" . $nVersion->item($vitem)->getAttribute('Modified'). "</td>";
				$sVersiones = $sVersiones. "</tr>";
			}	
			$sVersiones = $sVersiones. "</table>";
			$sItems = $sItems . '<tr class="Controls"><td colspan=3>' .  $sVersiones . '</td></tr>';
		} else {*/
			if ($item==0){
				//$sItems = $sItems . '<tr class="Controls"><td colspan="3">' . substr(strstr($nodos->item($item)->getAttribute('ows_FileRef'),'#'),1,strrpos(substr(strstr($nodos->item($item)->getAttribute('ows_FileRef'),'')) . "</td></tr>";
			}
			$sItems = $sItems . '<tr class="Controls">';
			$sItems = $sItems . '<td><div style="width:320px;overflow:auto"><a href="http://satportal.dssat.sat.gob.mx/' . substr($nodos->item($item)->getAttribute('ows_FileRef'),strpos($nodos->item($item)->getAttribute('ows_FileRef'),"#")+1) . '">' . $nodos->item($item)->getAttribute('ows_LinkFilename') . $sVersiones . "</a></div></td>";
			$sItems = $sItems . '<td width="20px"><a target="_blank" href="' . $DBcnDisenio->f("UrlSharepoint") . '/_layouts/versions.aspx?FileName=/'. rawurlencode(substr($nodos->item($item)->getAttribute('ows_FileRef'),strpos($nodos->item($item)->getAttribute('ows_FileRef'),"#")+1))  . '&listid=' . $DBcnDisenio->f("GUID_Lista") . '">' . $nodos->item($item)->getAttribute('ows_owshiddenversion'). '</a></td>';
			$sItems = $sItems . "<td width='90px'>" . CCFormatDate(CCParseDate(substr(strstr($nodos->item($item)->getAttribute('ows_Created_x0020_Date'),'#'),1),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","HH",":","nn")) . "</td>";
			$sItems = $sItems . "</tr>";
		//}
	}	
	$sItems = $sItems . "</table>";
	$lDocs->SetValue(iconv('UTF-8','Windows-1252', $sItems));
	}

	$mc_info_rs_ap_EC->hExiste->SetValue(1);
	if (!$mc_info_rs_ap_EC->EditMode){
		$mc_info_rs_ap_EC->hExiste->SetValue(0);
		$DBcnDisenio->query('select top 1 ' .
	                        '(select top 1 DiasNaturalesDesviacion from mc_info_rs_cr_RE_RC_Artefacto where Id_Padre = A1.Id_Padre   order by DiasNaturalesDesviacion desc ) ' .
	                        ' DiasNaturalesDesviacion, (select top 1 DiasHabilesDesviacion from mc_info_rs_cr_RE_RC_Artefacto where Id_Padre = A1.Id_Padre   order by DiasHabilesDesviacion desc ) ' . 
							' DiasHabilesDesviacion, isnull((select top 1 PctDeductiva  from mc_info_rs_cr_RE_RC_Artefacto where Id_Padre = A1.Id_Padre   order by PCT desc ),0) PCT ' .
							' from dbo.mc_info_rs_cr_RE_RC_Artefacto A1 where id_Padre='.CCGetParam("sID",0) . ' order by DiasHabilesDesviacion desc');
	
	  	if ($DBcnDisenio->has_next_record()){
			$DBcnDisenio->next_record();
			$mc_info_rs_ap_EC->MaxDiasRetrasoNat->SetValue($DBcnDisenio->f("DiasNaturalesDesviacion"));
			$mc_info_rs_ap_EC->MaxDiasRetrasoHab->SetValue($DBcnDisenio->f("DiasHabilesDesviacion"));
			$mc_info_rs_ap_EC->PctMax->SetValue($DBcnDisenio->f("PCT"));
		}
		//se busca la información registrada cuando fue de apertura
	    $db = new clsDBcnDisenio;
	    $sql='select id_servicio_cont from mc_info_rs_ap_ec ' .
	    				' WHERE ID_PPMC= ' . $sPPMC ; //. ' AND u.IdEstimacion = ' . $sIdEstimacion ;
	    $db->query($sql);
	    if($db->next_record()){
	        $mc_info_rs_ap_EC->lstServContractual->SetValue($db->f("id_servicio_cont"));
	    }
	}
    //se trae la información general del requerimiento
    $sql = 'SELECT id_servicio_cont, id_servicio_negocio, id_tipo, idestimacion, mc.descripción NombreProyecto, ' .
    	' sc.Descripcion  ServContractual, sn.nombre ServNegocio, t.Descripcion TipoPPMC ' .
		' FROM mc_calificacion_rs_MC mc  inner join mc_c_servcontractual sc on sc.id = mc.id_servicio_cont ' .
		' 		inner join mc_c_servicio   sn on sn.id_servicio   = mc.id_servicio_negocio and sn.id_tipo_servicio =2 ' .
		' 		inner join mc_c_TipoPPMC t on t.Id = mc.id_tipo WHERE idUniverso= ' . CCGetParam("sID",0) ;
    $db->query($sql);
	if($db->next_record()){
		$mc_info_rs_ap_EC->lstServContractual->SetValue($db->f("id_servicio_cont"));
		$mc_info_rs_ap_EC->sServicioNegocio->SetValue($db->f("id_servicio_negocio"));
		$mc_info_rs_ap_EC->sTipoRequerimiento->SetValue($db->f("id_tipo"));
		$mc_info_rs_ap_EC->sNombreProyecto->SetValue($db->f("NombreProyecto"));
		$mc_info_rs_ap_EC->lServNegocio->SetValue($db->f("ServNegocio"));
		$mc_info_rs_ap_EC->lServContractual->SetValue($db->f("ServContractual"));
		//si el tipo de requerimiento es mantenimiento Mayor o nuevo desarrollo pone por default Completar Tareas en Ruta Crítica
	    if($mc_info_rs_ap_EC->sTipoRequerimiento->GetValue()==2 || $mc_info_rs_ap_EC->sTipoRequerimiento->GetValue()==4){
	        $mc_info_rs_ap_EC->lbSLA->SetValue(0);
	    } else { //si no, pone por default Retraso en Entregables
	    	$mc_info_rs_ap_EC->lbSLA->SetValue(1);
	    }
	} else {
		$mc_info_rs_ap_EC->Button_Insert->Visible= false;
    	$mc_info_rs_ap_EC->Button_Update->Visible = false;	
	}
    
    $db->Close();
	

	$flgCerrado=CCDLookUp("Medido","mc_universo_cds","Id=" .CCGetParam("sID","") ,$DBcnDisenio);
    if($flgCerrado==1){
    	$mc_info_rs_ap_EC->Button_Insert->Visible= false;
    	$mc_info_rs_ap_EC->Button_Update->Visible = false;
    }

    if($flgCerrado==0){
    	//$mc_info_rs_ap_EC->Button_Insert->Visible= true;
    	$mc_info_rs_ap_EC->Button_Update->Visible = true;
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
	$DBcnDisenio->query('SELECT id_proveedor, numero, tipo, mes, anio FROM mc_universo_cds u WHERE u.Id = ' . $vId );
	
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
	if($sCumpleRS == ""){
			$sCumpleRS="NULL";
	}
	$sCumpleHE=$mc_info_rs_ap_EC->CumplioHE->GetValue();
	if($sCumpleHE ==""){
		$sCumpleHE="NULL";
	}
	$sSQL="select count(*) from mc_calificacion_rs_MC where IdUniverso= " . $vId;
    $DBcnDisenio->query($sSQL);
    if($DBcnDisenio->next_record()){ 
    	if($DBcnDisenio->f(0)==0){ // si no existe se inserta
			$sInsert="insert into mc_calificacion_rs_mc  (id_ppmc, id_proveedor, id_servicio_negocio, id_servicio_cont, id_tipo, [descripción], mesreporte, anioreporte, RETR_ENTREGABLE, COMPL_RUTA_CRITICA, IdUniverso) " .
					" values (" . $vIdPPMC . ", " . $vIdProveedor . ", " . $mc_info_rs_ap_EC->sServicioNegocio->GetValue() . ", " . $mc_info_rs_ap_EC->lstServContractual->GetValue() . ", " . 
					$mc_info_rs_ap_EC->sTipoRequerimiento->GetValue() . " , '" . $mc_info_rs_ap_EC->hdNombreProyecto->GetValue() . "'," . $vMesReporte . "," . $vAnioReporte . "," .
					$sCumpleHE . "," . $sCumpleRS . "," .  $vId . ")";
    	} else { //si existe se actualiza
    		$sSQL = 'UPDATE  mc_calificacion_rs_mc SET RETR_ENTREGABLE = ' . $sCumpleHE .
    			', COMPL_RUTA_CRITICA = ' . $sCumpleRS .
    			' WHERE IdUniverso =' . $vId;
    	}
		$DBcnDisenio->query($sSQL);
    }
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
	//$mc_info_rs_ap_EC->FechaUltMod->SetValue(CCFormatDate(CCParseDate(date("Y-m-d H:i:s"),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","HH",":","nn")));
	
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
	if($sCumpleRS == ""){
			$sCumpleRS="NULL";
	}
	$sCumpleHE=$mc_info_rs_ap_EC->CumplioHE->GetValue();
	if($sCumpleHE ==""){
		$sCumpleHE="NULL";
	}
	$sUpdate="update mc_calificacion_rs_mc  " .
			"set  RETR_ENTREGABLE=" . $sCumpleHE . ", COMPL_RUTA_CRITICA = " . $sCumpleRS .  " " .
			" Where iduniverso=" .  $vId ;
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

//Custom Code @311-2A29BDB7
// -------------------------
	if ($mc_info_rs_ap_EC->lbSLA->GetValue()=="Completar Ruta Critica"){
		if ($mc_info_rs_ap_EC->txtDiasEstimados->GetValue()==0){
			$mc_info_rs_ap_EC->Errors->addError("El campo Días Planeados obligatorio");
		}
	}
	global $Redirect;
	global $PathToRoot;
	//si es nuevo, se deja en la página.
	if($mc_info_rs_ap_EC->EditMode){
		if(CCGetParam("src",0)==1){//si viene de la página de detalle lo regresa a esa misma
			$Redirect = $PathToRoot ."PPMCsCrInfoGeneral.php?".CCGetQueryString("QueryString",array("ccsForm","src"));
		} else {
			$Redirect = $PathToRoot ."PPMCsCrbLista.php?".CCGetQueryString("QueryString",array("ccsForm","src"));
		}
	}
// -------------------------
//End Custom Code

//Close mc_info_rs_ap_EC_OnValidate @3-ECA22AC3
    return $mc_info_rs_ap_EC_OnValidate;
}
//End Close mc_info_rs_ap_EC_OnValidate

//DEL  // -------------------------
//DEL  /*
//DEL  if (CCGetUserLogin()=='fjaime'){
//DEL   $mc_info_rs_ap_EC->DataSource->SQL = "SELECT Id, ID_PPMC, URLReferencia, FechaFirmaCAES, CASE WHEN LEN(Observaciones)<3000 THEN Observaciones ELSE SUBSTRING(Observaciones,1,4000)+' .... (NOTA: OBSERVACION CON MAS CARACTERES DE LOS PERMITIDOS PARA VISUALIZAR)' END Observaciones, CumplioRE, CumplioRC, CAPFirmada, IdTipoReq, id_servicio_cont, id_servicio_negocio,DiasDesarrolloEst, MaxDiasRetrasoNat, MaxDiasRetrasoHab, FechaAlta, UsuarioAlta, FechaUltMod, UsuarioUltMod, TipoSLA, IdReqCC,PctMax, TPaquetes FROM mc_info_rs_cr_RE_RC";
//DEL   
//DEL  }
//DEL  */
//DEL  // -------------------------

//mc_info_rs_cr_RE_RC_Artef1_FechaUltMod_BeforeShow @209-854CFEB6
function mc_info_rs_cr_RE_RC_Artef1_FechaUltMod_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef1_FechaUltMod_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef1; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef1_FechaUltMod_BeforeShow

//Close mc_info_rs_cr_RE_RC_Artef1_FechaUltMod_BeforeShow @209-D72F3A2F
    return $mc_info_rs_cr_RE_RC_Artef1_FechaUltMod_BeforeShow;
}
//End Close mc_info_rs_cr_RE_RC_Artef1_FechaUltMod_BeforeShow

//mc_info_rs_cr_RE_RC_Artef1_FechaEntrega_BeforeShow @200-16503867
function mc_info_rs_cr_RE_RC_Artef1_FechaEntrega_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef1_FechaEntrega_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef1; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef1_FechaEntrega_BeforeShow

//Close mc_info_rs_cr_RE_RC_Artef1_FechaEntrega_BeforeShow @200-359578C5
    return $mc_info_rs_cr_RE_RC_Artef1_FechaEntrega_BeforeShow;
}
//End Close mc_info_rs_cr_RE_RC_Artef1_FechaEntrega_BeforeShow

//mc_info_rs_cr_RE_RC_Artef1_ID_PPMC_BeforeShow @193-67FED5BA
function mc_info_rs_cr_RE_RC_Artef1_ID_PPMC_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef1_ID_PPMC_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef1; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef1_ID_PPMC_BeforeShow

//Custom Code @214-2A29BDB7
// -------------------------
	global $mc_info_rs_ap_EC;
	$mc_info_rs_cr_RE_RC_Artef1->ID_PPMC->SetValue($mc_info_rs_ap_EC->hIDPPMC->GetValue());
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef1_ID_PPMC_BeforeShow @193-E0A880D4
    return $mc_info_rs_cr_RE_RC_Artef1_ID_PPMC_BeforeShow;
}
//End Close mc_info_rs_cr_RE_RC_Artef1_ID_PPMC_BeforeShow

//mc_info_rs_cr_RE_RC_Artef1_Id_Padre_BeforeShow @231-768B741B
function mc_info_rs_cr_RE_RC_Artef1_Id_Padre_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef1_Id_Padre_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef1; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef1_Id_Padre_BeforeShow

//Custom Code @232-2A29BDB7
// -------------------------
	global $mc_info_rs_ap_EC;
	$mc_info_rs_cr_RE_RC_Artef1->Id_Padre->SetValue(CCGetParam("sID",0));
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef1_Id_Padre_BeforeShow @231-931D8176
    return $mc_info_rs_cr_RE_RC_Artef1_Id_Padre_BeforeShow;
}
//End Close mc_info_rs_cr_RE_RC_Artef1_Id_Padre_BeforeShow

//mc_info_rs_cr_RE_RC_Artef1_FechaEstFin_BeforeShow @198-D703F5A0
function mc_info_rs_cr_RE_RC_Artef1_FechaEstFin_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef1_FechaEstFin_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef1; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef1_FechaEstFin_BeforeShow

//Close mc_info_rs_cr_RE_RC_Artef1_FechaEstFin_BeforeShow @198-B6A7DC81
    return $mc_info_rs_cr_RE_RC_Artef1_FechaEstFin_BeforeShow;
}
//End Close mc_info_rs_cr_RE_RC_Artef1_FechaEstFin_BeforeShow

//mc_info_rs_cr_RE_RC_Artef1_lblDeductiva_BeforeShow @269-D50EDBC5
function mc_info_rs_cr_RE_RC_Artef1_lblDeductiva_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef1_lblDeductiva_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef1; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef1_lblDeductiva_BeforeShow

//Custom Code @270-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef1_lblDeductiva_BeforeShow @269-F566F104
    return $mc_info_rs_cr_RE_RC_Artef1_lblDeductiva_BeforeShow;
}
//End Close mc_info_rs_cr_RE_RC_Artef1_lblDeductiva_BeforeShow

//mc_info_rs_cr_RE_RC_Artef1_BeforeInsert @190-B15DF9A8
function mc_info_rs_cr_RE_RC_Artef1_BeforeInsert(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef1_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef1; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef1_BeforeInsert

//Custom Code @215-2A29BDB7
// -------------------------
	$mc_info_rs_cr_RE_RC_Artef1->UsuarioAlta->SetValue(CCGetUserLogin());
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef1_BeforeInsert @190-B78E7AFD
    return $mc_info_rs_cr_RE_RC_Artef1_BeforeInsert;
}
//End Close mc_info_rs_cr_RE_RC_Artef1_BeforeInsert

//mc_info_rs_cr_RE_RC_Artef1_BeforeUpdate @190-AA682E3B
function mc_info_rs_cr_RE_RC_Artef1_BeforeUpdate(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef1_BeforeUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef1; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef1_BeforeUpdate

//Custom Code @216-2A29BDB7
// -------------------------
	$mc_info_rs_cr_RE_RC_Artef1->UsuarioUltMod->SetValue(CCGetUserLogin());
	$mc_info_rs_cr_RE_RC_Artef1->FechaUltMod->SetValue(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y")));

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef1_BeforeUpdate @190-78A7BB72
    return $mc_info_rs_cr_RE_RC_Artef1_BeforeUpdate;
}
//End Close mc_info_rs_cr_RE_RC_Artef1_BeforeUpdate

//mc_info_rs_cr_RE_RC_Artef1_ds_BeforeExecuteInsert @190-FF38721F
function mc_info_rs_cr_RE_RC_Artef1_ds_BeforeExecuteInsert(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef1; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef1_ds_BeforeExecuteInsert

//Custom Code @317-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio;
    $db->query('update mc_info_rs_cr_RE_RC set MaxDiasRetrasoHab =(select top 1 DiasNaturalesDesviacion from mc_info_rs_cr_RE_RC_Artefacto where Id_Padre = mc_info_rs_cr_RE_RC.Id   order by DiasNaturalesDesviacion desc ), ' .
			' MaxDiasRetrasoNat = (select top 1 DiasHabilesDesviacion from mc_info_rs_cr_RE_RC_Artefacto where Id_Padre = mc_info_rs_cr_RE_RC.Id order by DiasHabilesDesviacion desc ) , ' .
			' PctMax = isnull((select top 1 PctDeductiva from mc_info_rs_cr_RE_RC_Artefacto where Id_Padre = mc_info_rs_cr_RE_RC.Id  order by PCT desc ),0)	' .
			' where mc_info_rs_cr_RE_RC.Id= ' . $mc_info_rs_cr_RE_RC_Artef1->Id_Padre->GetValue() );
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef1_ds_BeforeExecuteInsert @190-FFF81411
    return $mc_info_rs_cr_RE_RC_Artef1_ds_BeforeExecuteInsert;
}
//End Close mc_info_rs_cr_RE_RC_Artef1_ds_BeforeExecuteInsert

//mc_info_rs_cr_RE_RC_Artef2_BeforeShowRow @374-C26AA603
function mc_info_rs_cr_RE_RC_Artef2_BeforeShowRow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef2_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef2; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef2_BeforeShowRow

//Custom Code @405-2A29BDB7
// -------------------------
//Si la fecha de entrega  al cargar el archivo no existia en el despliegue se eliminaba la visibilidad, esto se quita para poner etiqueta html en su lugar correo Luis Dominguez 08/3/2017
    	//$aDate=$mc_info_rs_cr_RE_RC_Artef2->FechaEntrega->GetValue();
    	//$mc_info_rs_cr_RE_RC_Artef2->FechaEntrega->Visible = ($aDate[0]!= 441784800);
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef2_BeforeShowRow @374-E40C4EAC
    return $mc_info_rs_cr_RE_RC_Artef2_BeforeShowRow;
}
//End Close mc_info_rs_cr_RE_RC_Artef2_BeforeShowRow

//DEL  // -------------------------
//DEL      $mc_info_rs_cr_RE_RC_Artef2->Label1->SetValue ($mc_info_rs_cr_RE_RC_Artef2->RowNumber);
//DEL  // -------------------------

//Page_BeforeShow @1-672471D5
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsCrbDetalle2; //Compatibility
//End Page_BeforeShow

//Custom Code @23-2A29BDB7
// -------------------------
    global $lkAnterior;
    global $lkSiguiente;
    
    $aPPMCsAPbIds = unserialize(CCGetSession("aPPMCsAPbIds"));
    $aPPMCsAPbValues = unserialize(CCGetSession("aPPMCsAPbValues"));


    global $db;
    global $Tpl;
    $db = new clsDBcnDisenio;
    $sNoHabil = "";
  	$sSQL= "SELECT fecha FROM dia_inhabil WHERE fecha > DATEADD(M,-6,getdate())";
	$db->query($sSQL);
	while($db->next_record()){
			$sNoHabil= $sNoHabil .  ","  . $db->f(0) ;
		}
    
    $Tpl->SetVar("lbNoHabil",$sNoHabil);
    $db->close();
    
    if(count($aPPMCsAPbIds)>1){
    	$iPos=array_search(CCGetParam("sID"),$aPPMCsAPbIds);
    	if($iPos==0){
			$lkAnterior->SetLink("PPMCSCrbLista.php?" . CCGetQueryString("QueryString",""));
			$lkAnterior->SetValue("Lista requerimientos");
    	} else {
    		$lkAnterior->SetValue($aPPMCsAPbValues[$iPos-1]);
    		$lkAnterior->SetLink("PPMCsCrbDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","sID"),"ccsForm"),"sID",$aPPMCsAPbIds[$iPos-1]));
    	}
    	if($iPos < count($aPPMCsAPbIds)-1){
    		$lkSiguiente->SetValue($aPPMCsAPbValues[$iPos+1]);
    		$lkSiguiente->SetLink("PPMCsCrbDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","sID"),"ccsForm"),"sID",$aPPMCsAPbIds[$iPos+1]));
    	} else {
    		$lkSiguiente->SetValue("");
    	}
    }
    
    global $Panel1;
	if(CCGetSession("GrupoValoracion")!="CAPC"){
		$Panel1->Visible=false;
		}    
    
//   	$temp =$lkRetEnt_Calidad->GetLink();
//	$temp = str_replace("&amp;","&",$temp);
//	$lkRetEnt_Calidad->SetLink(str_replace('sID=','sID='.CCGetParam("Id"),$temp));
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeOutput @1-48565348
function Page_BeforeOutput(& $sender)
{
    $Page_BeforeOutput = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsCrbDetalle2; //Compatibility
//End Page_BeforeOutput

//Custom Code @53-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close Page_BeforeOutput @1-8964C188
    return $Page_BeforeOutput;
}
//End Close Page_BeforeOutput

//Page_AfterInitialize @1-895105EF
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsCrbDetalle2; //Compatibility
//End Page_AfterInitialize

//Custom Code @318-2A29BDB7
// -------------------------
    global $sPPMC;
	global $PathToRoot;
    global $db;
    global $FileName;
    global $ActionFileUpload;
    global $lErrores;
	global $Tpl;
              
    $ActionFileUpload= $FileName . "?" . CCGetQueryString("QueryString", "");
    $sValues="";
 	$db = new clsDBcnDisenio;
 	$vId= CCGetParam("sID",0);
	$db->query('SELECT numero, mes, anio FROM mc_universo_cds u WHERE u.Id = ' . $vId );
	if($db->next_record()){
    	$vIdPPMC = $db->f(0);
    	$vMes= $db->f(1);
    	$vAnio = $db->f(2);
	}

    

 	if (isset($_FILES['userfile']['name'])) {
	 	$nombre_archivo = $_FILES['userfile']['name']; 
	 	$tipo_archivo = $_FILES['userfile']['type']; 
	 	$tamano_archivo = $_FILES['userfile']['size']; 
	 	//compruebo si las características del archivo son las que deseo 
	 	if ($tamano_archivo > 100000) {
			$lErrores->SetValue("<div style='color:red'>El tamaño del archivo es mayor al permitido. se permiten archivos de 100 Kb máximo.</td></tr></table></div>"); 
	 	} else {
	     	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $PathToRoot . '/Uploads/'. $nombre_archivo)) { 
	        	$row = 1;
				if (($handle = fopen($PathToRoot . '/Uploads/'. $nombre_archivo, "r")) !== FALSE) {
				    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				        if($row>1){//se ignora la linea 1, tiene los titulos
				        	$num = count($data);
				        	if($num>7){
				        		$lErrores->SetValue( "<div style='color:red'>La fila " . $row . " tiene más columnas de las esperadas.  No se proceso la fila</div>");
				        	} else {
				        		$sValues = $vIdPPMC . "," . $vId . ",";
					        	$EstFin = CCParseDate($data[6],array("dd","/","mm","/","yyyy"));
					        	//se da formato a las fechas
					        	$data[5] = CCFormatDate(CCParseDate($data[5],array("dd","/","mm","/","yyyy")),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss")) ;
					        	$data[6] = CCFormatDate(CCParseDate($data[6],array("dd","/","mm","/","yyyy")),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss")) ;
					        	for ($c=1; $c < $num; $c++) { // se descarta la columna 1 que es el numerador del archivo
					            	if($c==2){
					            		$sValues = $sValues . "'" . substr($data[$c],0,450) . "',";
					            	} else {
					            		if($c==3){
					            			$sValues = $sValues . "'" . substr($data[$c],0,40) . "',";
					            		} else {
					            			$sValues = $sValues . "'" . $data[$c] . "',";
					            		}
					            	}
					        	}
					        	//si no tiene fecha de entrega se toma la del ultimo día del mes de medición
					        	$dUltDia = "1900-01-01";
					        	if($EstFin == strtotime($dUltDia)){
					        		$EstFin= date("Y-m-d",mktime(0, 0, 0, $vMes  , date("t",mktime(0, 0, 0, $vMes  , 1, $vAnio)), $vAnio));
//					        		$sValues = $sValues . " case when datediff(d,'" . $data[5]  . "','" . $EstFin . "')<0 THEN 0 else datediff(d,'" . $data[5]  . "','" . $EstFin . "') end , ";
//					        		$sValues = $sValues  . "dbo.ufNumDiasHabilesMC('" . $data[5] . "','" . $EstFin . "')- (select COUNT(fecha) from dia_inhabil where fecha >= '" . $data[5] . "' and fecha <= '" . $EstFin . "')";
//                                  Cambio Solicitado por Luis Dominguez en correo del 8/3/2017 que en registros sin fecha de entrega ponga en automatico 35 días
					        		$sValues = $sValues . " 35 , ";
					        		$sValues = $sValues  . " 35 ";
					        	} else {
					        		$sValues = $sValues . " case when datediff(d,'" . $data[5]  . "','" . $data[6] . "')<0 THEN 0 else datediff(d,'" . $data[5]  . "','" . $data[6] . "') end , ";
					        		$sValues = $sValues  . "dbo.ufNumDiasHabilesMC('" . $data[5] . "','" . $data[6] . "')- (select COUNT(fecha) from dia_inhabil where fecha >= '" . $data[5] . "' and fecha <= '" . $data[6] . "')";
					        	}
					        	//$sValues = $sValues . " case when datediff(d,'" . $data[5]  . "','" . $data[6] . "')<0 THEN 0 else datediff(d,'" . $data[5]  . "','" . $data[6] . "') end , ";
					        	//$sValues = $sValues  . "dbo.ufNumDiasHabilesMC('" . $data[5] . "','" . $data[6] . "')- (select COUNT(fecha) from dia_inhabil where fecha >= '" . $data[5] . "' and fecha <= '" . $data[6] . "')";
					        	$sValues = $sValues . ",0)";
					        	$ssql="Insert into mc_info_rs_cr_RE_RC_Artefacto (Id_PPMC, Id_Padre, Nombre, Descripcion, Formato, NombreConHerramienta, FechaEstFin, FechaEntrega, DiasNaturalesDesviacion,DiasHabilesDesviacion,DiasHabilesReales) values (";
					        	if(strlen($data[1])>0){
					        		$db->query($ssql . $sValues); //echo $ssql . $sValues . "<br><br>";
					        		if($db->Errors->Count()>0){
					        			$lErrores->Setvalue("<br><div style='color:red'>Hubo errores al procesar el archivo, verifique la información cargada</div><br>". $ssql . $sValues);
					        		} else {
					        			$lErrores->Setvalue("Se proceso el archivo, verifique la información cargada");
					        		}
					        	}
				        	}
				        }
				        $row++;
				    }
				    fclose($handle);
				    //se actualiza la deductiva de los artefactos				    

				    $ssql = ' update mc_info_rs_cr_RE_RC_Artefacto set PctDeductiva = ' .
							' case when DiasNaturalesDesviacion>0 then ' . 
							'	case ' . 
							'	when rc.idtiporeq=-1 then ' . 
							'		case when DiasDesarrolloEst >0 then ' .
							'			case when (abs(af.DiasNaturalesDesviacion-rc.DiasDesarrolloEst)/rc.DiasDesarrolloEst)*100 >= 10 then 5 else 0 end ' . 
							'		else 5 end ' .
							'	else ' . 
							'		case when af.DiasNaturalesDesviacion between 1 and 3 then 2 ' . 
							'			when af.DiasNaturalesDesviacion between 4 and 6 then 3 ' . 
							'			when af.DiasNaturalesDesviacion between 7 and 10 then 5 ' . 
							'			else ' . 
							'				case when af.DiasNaturalesDesviacion >35 then 30 + af.DiasNaturalesDesviacion  * 0.2' . 
							'				else (abs(af.DiasNaturalesDesviacion-5)) end ' . 
							'		end ' . 
							'	end ' . 
							'else 0.0 end ' . 
						' from mc_info_rs_cr_RE_RC_Artefacto af ' . 
						'	inner join  mc_info_rs_cr_RE_RC  rc on rc.id = af.Id_Padre ' . 
						' where rc.id = ' . $vId ;
					$db->query($ssql);
				} else {
					$lErrores->Setvalue("<div style='color:red'>No se puede cargar el archivo</div>");
				}
	     	} else { 
	        	$lErrores->Setvalue("<div style='color:red'>Ocurrió algún error al subir el archivo. No pudo guardarse.</div>"); 
	     	}
	 	}	
 	}
 	$db->close();
// -------------------------
//End Custom Code

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize

//DEL  // -------------------------
//DEL  
//DEL      global $mc_info_rs_ap_EC;
//DEL   	$db = new clsDBcnDisenio;
//DEL   	$vId= CCGetParam("sID",0);
//DEL  	$db->query('SELECT numero, mes, anio FROM mc_universo_cds u WHERE u.Id = ' . $vId );
//DEL  	if($db->next_record()){
//DEL      	$vIdPPMC = $db->f(0);
//DEL      	$vMes= $db->f(1);
//DEL      	$vAnio = $db->f(2);
//DEL  	}
//DEL  
//DEL      if ( ($vMes >= 11 AND $vAnio==2016) OR $vAnio>2016){
//DEL      	$mc_info_rs_ap_EC->porc_re->SetValue('.2');
//DEL      }
//DEL      else {
//DEL      	$mc_info_rs_ap_EC->porc_re->SetValue('.143');
//DEL      }
//DEL  
//DEL      // Write your own code here.
//DEL  // -------------------------


function CallSOAPCurl($tipoquery,$ItemId, $URLSahrepoint, $GUID_Lista, $GUID_Vista, $GUID_WebId){
	global $dbSOAPIds;
	global $sPPMC;
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
			  '				 <Contains><FieldRef Name="FileRef" /><Value Type="Text">Proyecto</Value></Contains> '.
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
 	curl_setopt($curl, CURLOPT_HTTPHEADER,     array('Content-Type: text/xml; charset=utf-8', 'Content-Length: '.strlen($post_string) ));
 	curl_setopt($curl, CURLOPT_POSTFIELDS,    $post_string); 
 	$result = curl_exec($curl);
 	curl_close($curl);
	return $result;
}
	
?>
