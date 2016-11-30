<?php
//BindEvents Method @1-ABA9F8B8
function BindEvents()
{
    global $mc_info_rs_cr_calidad;
    global $mc_info_detalle_hallazgos;
    global $mc_info_detalle_defectos;
    global $CCSEvents;
    $mc_info_rs_cr_calidad->btnCalcula->CCSEvents["OnClick"] = "mc_info_rs_cr_calidad_btnCalcula_OnClick";
    $mc_info_rs_cr_calidad->CCSEvents["BeforeShow"] = "mc_info_rs_cr_calidad_BeforeShow";
    $mc_info_rs_cr_calidad->CCSEvents["BeforeInsert"] = "mc_info_rs_cr_calidad_BeforeInsert";
    $mc_info_rs_cr_calidad->ds->CCSEvents["BeforeExecuteInsert"] = "mc_info_rs_cr_calidad_ds_BeforeExecuteInsert";
    $mc_info_rs_cr_calidad->ds->CCSEvents["BeforeExecuteUpdate"] = "mc_info_rs_cr_calidad_ds_BeforeExecuteUpdate";
    $mc_info_rs_cr_calidad->CCSEvents["BeforeUpdate"] = "mc_info_rs_cr_calidad_BeforeUpdate";
    $mc_info_rs_cr_calidad->CCSEvents["OnValidate"] = "mc_info_rs_cr_calidad_OnValidate";
    $mc_info_detalle_hallazgos->CCSEvents["BeforeShow"] = "mc_info_detalle_hallazgos_BeforeShow";
    $mc_info_detalle_defectos->CCSEvents["BeforeShow"] = "mc_info_detalle_defectos_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_info_rs_cr_calidad_btnCalcula_OnClick @253-C3EF2E3C
function mc_info_rs_cr_calidad_btnCalcula_OnClick(& $sender)
{
    $mc_info_rs_cr_calidad_btnCalcula_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_calidad; //Compatibility
//End mc_info_rs_cr_calidad_btnCalcula_OnClick

//Custom Code @254-2A29BDB7
// -------------------------
    CalculaIndiceCalidad();
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_calidad_btnCalcula_OnClick @253-A4292F79
    return $mc_info_rs_cr_calidad_btnCalcula_OnClick;
}
//End Close mc_info_rs_cr_calidad_btnCalcula_OnClick


//mc_info_rs_cr_calidad_BeforeShow @81-04277B03
function mc_info_rs_cr_calidad_BeforeShow(& $sender)
{
    $mc_info_rs_cr_calidad_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_calidad; //Compatibility
//End mc_info_rs_cr_calidad_BeforeShow

//Custom Code @115-2A29BDB7
// -------------------------
    global $mc_detalle_PPMC_Defectos;
    global $mc_detalle_PPMC_Hallazgos;
    global $db;
    $db= new clsDBcnDisenio;
    
    global $DBcnDisenio;
	global $sPPMC;
	global $sTipoReq;
	global $lDocs;
	global $sServNegocio;


	//se va por la información de la estimación
	$DBcnDisenio->query('SELECT e.estimacion_id, sum(CAST(replace(e.esfuerzo,\',\',\'.\') AS FLOAT)) esfuerzo, e.tipo_unidad, sum(cast(replace(e.unidades_resultantes,\',\',\'.\') AS FLOAT)) unidades_resultantes, ' .
			' e.requerimiento_relacionado, e.solicitante, max(e.fecha_asignacion) fecha_asignacion, e.ID_PPMC, e.Proveedor, max(e.FECHA_APROBACION) FECHA_APROBACION, u.id_proveedor, max(m.Mes) NomMes ' .
			' FROM mc_universo_cds u inner join mc_c_mes m on m.IdMes = u.mes  LEFT JOIN PPMC_ESTIMACION e  ON e.Id_PPMC = u.Numero ' .
			' WHERE u.Id = ' . CCGetParam("Id",0) . ' and month(e.fecha_carga)=u.mes and YEAR(e.FECHA_CARGA) = u.anio ' .
				' and e.ESTADO_REQ_ESTIM = \'Estimación Aprobada\' and e.RESULTADO_ESTIMACION <> \'Rechazada\' '  . 
				' group by e.estimacion_id, e.tipo_unidad, unidades_resultantes,   e.requerimiento_relacionado, e.solicitante, e.ID_PPMC, e.Proveedor, u.id_proveedor ');
	if($DBcnDisenio->has_next_record()){
		$DBcnDisenio->next_record();
		$mc_info_rs_cr_calidad->id_ppmc->SetValue($DBcnDisenio->f("ID_PPMC"));
		$mc_info_rs_cr_calidad->id_estimacion->Setvalue($DBcnDisenio->f("estimacion_id"));
		$mc_info_rs_cr_calidad->lbIdEstimacion->Setvalue($DBcnDisenio->f("estimacion_id"));
		$mc_info_rs_cr_calidad->lbIdPPMC->Setvalue($DBcnDisenio->f("ID_PPMC"));
		$mc_info_rs_cr_calidad->lReportado->Setvalue( " - Reportado en " . $DBcnDisenio->f("NomMes"));
		$sPPMC = $DBcnDisenio->f("ID_PPMC");
		$sProveedor= $DBcnDisenio->f("Proveedor");
		$sTipoReq =$DBcnDisenio->f("requerimiento_relacionado");
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
				$DBcnDisenio->query('SELECT Project_Name, SERVICIO_NEGOCIO, TIPO_Solicitud, c.ESTADO, TIPO_SERVICIO_CTI ' .
					' FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC ' .
					' WHERE REQ_CAMBIO_ID  =  ' . $sPPMC );		
				break;
		}
	
		if($DBcnDisenio->has_next_record() ){
			$DBcnDisenio->next_record();
			$mc_info_rs_cr_calidad->sNombreProyecto->SetValue($DBcnDisenio->f(0));
			$mc_info_rs_cr_calidad->sTipoRequerimiento->SetValue($DBcnDisenio->f(2));
			$mc_info_rs_cr_calidad->lsServNegocio->SetValue($DBcnDisenio->f(1));
		}
	} 	else { // si no tiene Estimación
		$sql="SELECT ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA,  Proveedor, u.mes, u.anio, m.mes NomMes " .
			" from mc_universo_cds u inner join mc_c_mes m on m.IdMes = u.mes  LEFT JOIN vw_PPMC_Proy_RO_CC on " . 
			" vw_PPMC_Proy_RO_CC.ID_PPMC = u.numero  where month(fecha_carga)=u.mes and YEAR(FECHA_CARGA) = u.anio " .
			" AND u.id = " . CCGetParam("Id");
    	$db->query($sql);
		if($db->next_record()){
			$sPPMC = $db->f("ID_PPMC");
			$sProveedor= $db->f("Proveedor");
			$mc_info_rs_cr_calidad->id_ppmc->SetValue($db->f("ID_PPMC"));
			$mc_info_rs_cr_calidad->id_estimacion->Setvalue(0);
			$mc_info_rs_cr_calidad->lbIdEstimacion->Setvalue(0);
			$mc_info_rs_cr_calidad->lbIdPPMC->Setvalue($db->f("ID_PPMC"));
			$mc_info_rs_cr_calidad->sNombreProyecto->SetValue($db->f("NAME"));
			$mc_info_rs_cr_calidad->sTipoRequerimiento->SetValue($db->f("TIPO_REQUERIMIENTO"));
			$mc_info_rs_cr_calidad->lsServNegocio->SetValue($db->f("SERVICIO_NEGOCIO"));
			$mc_info_rs_cr_calidad->lReportado->Setvalue( " - Reportado en " . $db->f("NomMes"));
		}
	}
	$DBcnDisenio->query('SELECT UrlSharepoint, GUID_Lista, GUID_Vista, GUID_WebId from mc_c_proveedor ' . 
			' where razonsocial=\'' . $sProveedor . '\'' );		
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
		//}
	}	
	$sItems = $sItems . "</table>";
	$lDocs->SetValue(iconv('UTF-8','Windows-1252', $sItems));
	}
    
	//se trae la información general del requerimiento
	$sql = 'SELECT id_servicio_cont, id_servicio_negocio, id_tipo, idestimacion, mc.descripción NombreProyecto, ' .
		' sc.Descripcion  ServContractual, sn.nombre ServNegocio, t.Descripcion TipoPPMC ' .
		' FROM mc_calificacion_rs_MC mc  inner join mc_c_servcontractual sc on sc.id = mc.id_servicio_cont ' .
		' 		inner join mc_c_servicio   sn on sn.id_servicio   = mc.id_servicio_negocio and sn.id_tipo_servicio =2 ' .
		' 		inner join mc_c_TipoPPMC t on t.Id = mc.id_tipo WHERE idUniverso= ' . CCGetParam("Id") ;
    $db->query($sql);
	if($db->next_record()){
		$mc_info_rs_cr_calidad->lsServContractual->SetValue($db->f("id_servicio_cont"));
		$mc_info_rs_cr_calidad->lsServNegocio->SetValue($db->f("id_servicio_negocio"));
		$mc_info_rs_cr_calidad->id_estimacion->Setvalue($db->f("idestimacion"));
		$mc_info_rs_cr_calidad->lbIdEstimacion->Setvalue($db->f("idestimacion"));
		$mc_info_rs_cr_calidad->sNombreProyecto->SetValue($db->f("NombreProyecto"));
		$mc_info_rs_cr_calidad->sTipoRequerimiento->SetValue($db->f("TipoPPMC"));
		$mc_info_rs_cr_calidad->lbServNegocio->SetValue($db->f("ServNegocio"));
		$mc_info_rs_cr_calidad->lbServContractual->SetValue($db->f("ServContractual"));
	} else {
		$mc_info_rs_cr_calidad->Button_Insert->Visible= false;
	    $mc_info_rs_cr_calidad->Button_Update->Visible = false;
	}


    //if(!$mc_info_rs_cr_calidad->EditMode){		
		$flgCerrado=CCDLookUp("Medido","mc_universo_cds","Id=" .CCGetParam("Id","") ,$db);
	    if($flgCerrado==1){
	    	$mc_info_rs_cr_calidad->Button_Insert->Visible= false;
	    	$mc_info_rs_cr_calidad->Button_Update->Visible = false;
	    	$mc_info_rs_cr_calidad->btnCalcula->Visible = false;
	    } 
	    if($flgCerrado==0){
	    	//$mc_info_rs_cr_calidad->Button_Insert->Visible= true;
	    	$mc_info_rs_cr_calidad->Button_Update->Visible = true;
	    	$mc_info_rs_cr_calidad->btnCalcula->Visible = true;
	    }
	    
	    if($mc_info_rs_cr_calidad->Button_Insert->Visible==true){
	    	$mc_info_rs_cr_calidad->Button_Update->Visible= false;
	    }
		
		$db->close();
		if(!$mc_info_rs_cr_calidad->EditMode){
	 		CalculaIndiceCalidad();   
		}
    //}
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_calidad_BeforeShow @81-D81E11EB
    return $mc_info_rs_cr_calidad_BeforeShow;
}
//End Close mc_info_rs_cr_calidad_BeforeShow

//mc_info_rs_cr_calidad_BeforeInsert @81-BE052F39
function mc_info_rs_cr_calidad_BeforeInsert(& $sender)
{
    $mc_info_rs_cr_calidad_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_calidad; //Compatibility
//End mc_info_rs_cr_calidad_BeforeInsert

//Custom Code @116-2A29BDB7
// -------------------------
	
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_calidad_BeforeInsert @81-8DB7106E
    return $mc_info_rs_cr_calidad_BeforeInsert;
}
//End Close mc_info_rs_cr_calidad_BeforeInsert

//mc_info_rs_cr_calidad_ds_BeforeExecuteInsert @81-FB4CC941
function mc_info_rs_cr_calidad_ds_BeforeExecuteInsert(& $sender)
{
    $mc_info_rs_cr_calidad_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_calidad; //Compatibility
//End mc_info_rs_cr_calidad_ds_BeforeExecuteInsert

//Custom Code @151-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio;
    $sSQL = "SELECT Id_Proveedor, Numero, Mes, Anio FROM mc_universo_cds WHERE Id=" . CCGetParam("Id") ;
    $db->query($sSQL);
    if($db->next_record()){
    	$sIdProveedor = $db->f(0);
    	$sPPMC = $db->f(1);
    	$sMes = $db->f(2);
    	$sAnio = $db->f(3);
    }
    $sCumpleCalidad=$mc_info_rs_cr_calidad->CumpleCalidad->GetValue();
    $sServContractual= $mc_info_rs_cr_calidad->lsServContractual->GetValue();
    $sServNegocio  = $mc_info_rs_cr_calidad->lsServNegocio->GetValue();
	if($sCumpleCalidad === ""){
			$sCumpleCalidad="NULL";
	}
    // verifica si existe el PPMC en la tabla de calificación
    $sSQL="select count(*) from mc_calificacion_rs_MC where IdUniverso= " . CCGetParam("Id");
    $db->query($sSQL);
    if($db->next_record()){ 
    	if($db->f(0)==0){ // si no existe se inserta
    		$sSQL='INSERT INTO mc_calificacion_rs_mc (id_ppmc, id_proveedor,id_servicio_cont , id_servicio_negocio , CALIDAD_PROD_TERM, IdUniverso, MesReporte, AnioReporte ) ' .  
    			' VALUES (' . $sPPMC . ',' . $sIdProveedor . ',' . $sServNegocio . ',' . $sServContractual . ','.  $sCumpleCalidad . ',' .
    			 CCGetparam("Id") . ',' . $sMes . ',' . $sAnio .')';
    	} else { //si existe se actualiza
    		$sSQL = 'UPDATE  mc_calificacion_rs_mc SET CALIDAD_PROD_TERM = ' . $sCumpleCalidad .
    			', id_servicio_negocio= ' . $sServNegocio .
    			', id_servicio_cont= ' . $sServContractual .
    			' WHERE IdUniverso =' . CCGetParam("Id");
    	}
    	$db->query($sSQL);
    }
    $db->close();
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_calidad_ds_BeforeExecuteInsert @81-8AB89E8B
    return $mc_info_rs_cr_calidad_ds_BeforeExecuteInsert;
}
//End Close mc_info_rs_cr_calidad_ds_BeforeExecuteInsert

//mc_info_rs_cr_calidad_ds_BeforeExecuteUpdate @81-0D178E51
function mc_info_rs_cr_calidad_ds_BeforeExecuteUpdate(& $sender)
{
    $mc_info_rs_cr_calidad_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_calidad; //Compatibility
//End mc_info_rs_cr_calidad_ds_BeforeExecuteUpdate

//Custom Code @152-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio;
    $sSQL = "SELECT Id_Proveedor, Numero, Mes, Anio FROM mc_universo_cds WHERE Id=" . CCGetParam("Id") ;
    $db->query($sSQL);
    if($db->next_record()){
    	$sIdProveedor = $db->f(0);
    	$sPPMC = $db->f(1);
    	$sMes = $db->f(2);
    	$sAnio = $db->f(3);
    }
    $sCumpleCalidad=$mc_info_rs_cr_calidad->CumpleCalidad->GetValue();
	$sServContractual= $mc_info_rs_cr_calidad->lsServContractual->GetValue();
     $sServNegocio = $mc_info_rs_cr_calidad->lsServNegocio->GetValue();
	
	if($sCumpleCalidad === ""){
			$sCumpleCalidad ="NULL";
	}
	$sSQL = 'UPDATE  mc_calificacion_rs_mc SET CALIDAD_PROD_TERM = ' . $sCumpleCalidad .
    			', id_servicio_negocio= ' . $sServNegocio .
    			', id_servicio_cont= ' . $sServContractual .
    			' WHERE IdUniverso =' . CCGetParam("Id");
    $db->query($sSQL);
    $db->close();
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_calidad_ds_BeforeExecuteUpdate @81-45915F04
    return $mc_info_rs_cr_calidad_ds_BeforeExecuteUpdate;
}
//End Close mc_info_rs_cr_calidad_ds_BeforeExecuteUpdate

//mc_info_rs_cr_calidad_BeforeUpdate @81-2FC59AAD
function mc_info_rs_cr_calidad_BeforeUpdate(& $sender)
{
    $mc_info_rs_cr_calidad_BeforeUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_calidad; //Compatibility
//End mc_info_rs_cr_calidad_BeforeUpdate

//Custom Code @157-2A29BDB7
// -------------------------
    $mc_info_rs_cr_calidad->UsuarioUltMod->SetValue(CCGetUserLogin());
    $mc_info_rs_cr_calidad->FechaUltMod->SetValue(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y")));
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_calidad_BeforeUpdate @81-429ED1E1
    return $mc_info_rs_cr_calidad_BeforeUpdate;
}
//End Close mc_info_rs_cr_calidad_BeforeUpdate

//mc_info_rs_cr_calidad_OnValidate @81-FBB103F8
function mc_info_rs_cr_calidad_OnValidate(& $sender)
{
    $mc_info_rs_cr_calidad_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_calidad; //Compatibility
//End mc_info_rs_cr_calidad_OnValidate

//Custom Code @237-2A29BDB7
// -------------------------
    global $Redirect;
	global $PathToRoot;
	if(CCGetParam("src",0)==1){//si viene de la página de detalle lo regresa a esa misma
		$Redirect = $PathToRoot ."PPMCsCrInfoGeneral.php?".CCGetQueryString("QueryString",array("ccsForm","src"));
	} else {
		$Redirect = $PathToRoot ."PPMCsCrbLista.php?".CCGetQueryString("QueryString",array("ccsForm","src"));
	}
	
	
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_calidad_OnValidate @81-E7E57562
    return $mc_info_rs_cr_calidad_OnValidate;
}
//End Close mc_info_rs_cr_calidad_OnValidate

//mc_info_detalle_hallazgos_BeforeShow @166-5745D593
function mc_info_detalle_hallazgos_BeforeShow(& $sender)
{
    $mc_info_detalle_hallazgos_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_detalle_hallazgos; //Compatibility
//End mc_info_detalle_hallazgos_BeforeShow

//Custom Code @322-2A29BDB7
// -------------------------
    if(CCGetSession("GrupoValoracion")!="CAPC"){
		$mc_info_detalle_hallazgos->Visible=false;
		}
// -------------------------
//End Custom Code

//Close mc_info_detalle_hallazgos_BeforeShow @166-AF8C2B3D
    return $mc_info_detalle_hallazgos_BeforeShow;
}
//End Close mc_info_detalle_hallazgos_BeforeShow

//mc_info_detalle_defectos_BeforeShow @200-02C719A1
function mc_info_detalle_defectos_BeforeShow(& $sender)
{
    $mc_info_detalle_defectos_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_detalle_defectos; //Compatibility
//End mc_info_detalle_defectos_BeforeShow

//Custom Code @321-2A29BDB7
// -------------------------
    if(CCGetSession("GrupoValoracion")!="CAPC"){
		$mc_info_detalle_defectos->Visible=false;
		}
// -------------------------
//End Custom Code

//Close mc_info_detalle_defectos_BeforeShow @200-5C1EAF05
    return $mc_info_detalle_defectos_BeforeShow;
}
//End Close mc_info_detalle_defectos_BeforeShow

//Page_BeforeShow @1-66357301
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsCrbCalidad; //Compatibility
//End Page_BeforeShow

//Custom Code @103-2A29BDB7
// -------------------------
    global $lkAnterior;
    global $lkSiguiente;
    global $sPPMC;
    
    $aPPMCsAPbIds = unserialize(CCGetSession("aPPMCsAPbIds"));
    $aPPMCsAPbValues = unserialize(CCGetSession("aPPMCsAPbValues"));
	if(count($aPPMCsAPbIds)>1){
    	$iPos=array_search(CCGetParam("Id"),$aPPMCsAPbIds);
    	if($iPos==0){
			$lkAnterior->SetLink("PPMCsCrbLista.php?" . CCGetQueryString("QueryString",""));
			$lkAnterior->SetValue("Lista requerimientos");
    	} else {
    		$lkAnterior->SetValue($aPPMCsAPbValues[$iPos-1]);
    		$lkAnterior->SetLink("PPMCsCrbCalidad.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id"),"ccsForm"),"Id",$aPPMCsAPbIds[$iPos-1]));
    	}
    	if($iPos < count($aPPMCsAPbIds)-1){
    		$lkSiguiente->SetValue($aPPMCsAPbValues[$iPos+1]);
    		$lkSiguiente->SetLink("PPMCsCrbCalidad.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id"),"ccsForm"),"Id",$aPPMCsAPbIds[$iPos+1]));
    	} else {
    		$lkSiguiente->SetValue("");
    	}
    }


	//verifica si ya tienen registros relacionados en los detalles de paquetes, si no los tiene los genera.
	global $db;
	$db= new clsDBcnDisenio;
	$sSQL = 'select count(*) from mc_info_detalle_defectos_calidad  where IdPadre =' . CCGetParam("Id",0);
	$db->query($sSQL);
	if($db->next_record()){
		if($db->f(0)==0){//si no tiene detalle se inserta
			InsertaDatosPaquetes();
		}
	}

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

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
			  '				 <Contains><FieldRef Name="FileRef" /><Value Type="Text">_RDP_</Value></Contains> '.
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

function InsertaDatosPaquetes(){
	global $db;
    global $IdProveedor;
    global $sPPMC;
    global $sMes;
    global $sAnio;
    $sId = CCGetParam("Id");
    
    $db = new clsDBcnDisenio();
	$sql="select Id_Proveedor, Numero, Mes, Anio from mc_universo_cds where id=". $sId;
	$db->query($sql);
	if($db->next_record()){
		$IdProveedor = $db->f("Id_Proveedor");
		$sPPMC = $db->f("Numero");
		$sMes = $db->f("Mes");
		$sAnio = $db->f("Anio");
		//se borra si es que ya tiene algo
		$sSQL = 'Delete from mc_info_detalle_defectos_calidad   where IdPadre=' . $sId;
		$db->query($sSQL);    
	
		//inserta los hallazgos	
		$sSQL='insert into mc_info_detalle_defectos_calidad (Estado, TipoRegistro, Tipo, Paquete, Descripcion, IdRelacionado, Ignorar, IdPadre, Id_ProveedorPaq)' . 
				' SELECT distinct ESTADO, TIPO_INCIDENCIA, TIPO_DEFECTO, SUBSTRING(NOMBRE_RDL,1,74), DESCRIPCION, ID_DEFECTO, ' .
				' case when paq.id_proveedor = u.id_proveedor and  def.NOMBRE_RDL = paq.Paquete  then 0 else 1 end,' . $sId . 
				' ,paq.Id_proveedor  FROM mc_universo_cds u ' .
				' inner join mc_detalle_PPMC_Defectos def on def.ID_PPMC = u.numero ' .
				' left join   (select distinct id_ppmc, paquete, id_proveedor, FechaCarga  from mc_detalle_PPMC_avl pq ) as paq   ' .
				'	on paq.Paquete = def.NOMBRE_RDL and MONTH(FechaCarga )= MONTH(FECHA_CARGA) and YEAR(fechacarga)= YEAR(Fecha_carga) ' .
				' and paq.Id_PPMC = u.numero  and paq.id_proveedor = u.id_proveedor ' .
				' WHERE u.Id = ' . $sId . ' and  TIPO_INCIDENCIA = \'Defecto\'' .
				' and ESTADO in (\'Cerrado Corregido\', \'Cerrado Corrección Exitosa\', \'Cerrado Incidente Corregido\', \'Cerrado Prueba Exitosa\',  \'Corregido\', \'Validación\')' .
				' And Month(Fecha_Carga)= u.mes AND Year(Fecha_Carga)= u.Anio'   ;
		$db->query($sSQL);    

	    //inserta los defectos
		$sSQL='insert into mc_info_detalle_defectos_calidad (Estado, TipoRegistro, Tipo, Paquete, Descripcion, IdRelacionado, Ignorar, IdPadre, Id_ProveedorPaq)' . 
				' SELECT distinct ESTADO, TIPO_INCIDENCIA, TIPO_DEFECTO, NOMBRE_RDL, DESCRIPCION, ID_DEFECTO, ' .
				' case when paq.id_proveedor = u.id_proveedor and  def.NOMBRE_RDL = paq.Paquete  then 0 else 1 end,' . $sId . 
				' ,paq.Id_Proveedor FROM mc_universo_cds u ' .
				' inner join mc_detalle_PPMC_Defectos def on def.ID_PPMC = u.numero ' .
				' left join   (select distinct id_ppmc, paquete, id_proveedor, FechaCarga  from mc_detalle_PPMC_avl pq ) as paq   ' .
				'	on paq.Paquete = def.NOMBRE_RDL and MONTH(FechaCarga )= MONTH(FECHA_CARGA) and YEAR(fechacarga)= YEAR(Fecha_carga) ' .
				' and paq.Id_PPMC = u.numero  and paq.id_proveedor = u.id_proveedor ' .
				' WHERE u.Id = ' . $sId . ' and  TIPO_INCIDENCIA = \'Hallazgo\'' .
				' and ESTADO in (\'Cerrado Corregido\', \'Cerrado Corrección Exitosa\', \'Cerrado Incidente Corregido\', \'Cerrado Prueba Exitosa\',  \'Corregido\', \'Validación\')' .
				' And Month(Fecha_Carga)= u.mes AND Year(Fecha_Carga)= u.Anio'   ;
		$db->query($sSQL);    
		
		//inserta los rechazos
		
		
	}
}

function CalculaIndiceCalidad(){	    
	

	global $mc_info_rs_cr_calidad;
	
	$RechazosDocAVL=0;
    $IndiceCalidadDoc =0;
    $RechazosFunAVL=0;
    $IndiceCalidadFun =0;
    
    $db = new clsDBcnDisenio();
    
    $sql= 'SELECT count(*), e.tipo 	from mc_detalle_PPMC_Monitor_avl det ' .
    	' 	inner JOIN mc_universo_cds ON det.Id_PPMC = mc_universo_cds.numero  ' .
    	' 	      and mc_universo_cds.mes = month(det.fechacarga) and mc_universo_cds.anio = year(det.fechacarga) ' .
    	'		  and mc_universo_cds.id_proveedor = det.Id_Proveedor ' .
    	' 	inner   join mc_c_Errores e on replace(e.Descripcion,\' \',\'\')  = replace(det.Descripcion,\' \',\'\')  and e.AplicaCDS = 1 ' .
    	' where mc_universo_cds.id =  ' . CCGetParam("Id") . 
    	' and e.tipo like \'%docum%\'  and considerar= 1 group by e.tipo ';
    $db->query($sql);
    while($db->next_record()){
		$RechazosDocAVL = $RechazosDocAVL + $db->f(0);
    }
    $mc_info_rs_cr_calidad->RechazosDocAVL->SetValue($RechazosDocAVL);
    $sql='SELECT TIPO_HALLAZGO, count(TIPO_HALLAZGO),  ' .
    	' case when TIPO_HALLAZGO = \'Falta algún componente o vínculo en el d\'  then ' .
    	' 	case when count(TIPO_HALLAZGO)>10 then 3   ' .
		' 	when count(TIPO_HALLAZGO)<10 and count(TIPO_HALLAZGO)>5 then 2   ' .
		' 	else 1 end ' .
		' when TIPO_HALLAZGO =\'No cumple con los criterios de aceptació\' then ' .
		' 	case when count(TIPO_HALLAZGO)>10 then 3   ' .
		' 	when count(TIPO_HALLAZGO)<10 and count(TIPO_HALLAZGO)>5 then 2   ' .
		'	else 1 end ' .
		' else 	1 end ' .
		'FROM  mc_universo_cds u inner join mc_info_detalle_defectos_calidad  det on det.IdPadre = u.id ' .
		' 	INNER JOIN mc_detalle_PPMC_Defectos def ON det.IdRelacionado = def.ID_DEFECTO and def.ID_PPMC =  u.numero ' .
		' and MONTH(def.FECHA_CARGA )=u.mes  and YEAR(def.FECHA_CARGA ) = u.anio WHERE u.id = ' . CCGetParam("Id") . 
		' and Ignorar = 0 AND det.TipoRegistro  = \'Hallazgo\' group by TIPO_HALLAZGO' ; 
    $db->query($sql);
    $TotHallazgos=0;
    while($db->next_record()){
    	$TotHallazgos= $TotHallazgos + $db->f(2); 
    }
    $mc_info_rs_cr_calidad->HallazgosDocQC->SetValue( $TotHallazgos );
    $IndiceCalidadDoc =$mc_info_rs_cr_calidad->HallazgosDocQC->GetValue()+ $RechazosDocAVL;
    $mc_info_rs_cr_calidad->IndiceCalidadDoc->SetValue($IndiceCalidadDoc);
    if($IndiceCalidadDoc >=6 and $IndiceCalidadDoc <= 10 ){
    	$mc_info_rs_cr_calidad->DeductivaDoc->SetValue(2);
    }
	if($IndiceCalidadDoc > 10 ){
    	$mc_info_rs_cr_calidad->DeductivaDoc->SetValue(2 + ($IndiceCalidadDoc-10));
	}
	if($mc_info_rs_cr_calidad->DeductivaDoc->GetValue()>5){
		$mc_info_rs_cr_calidad->DeductivaDoc->SetValue(5);
	}
       
	//se contabilizan los rechazos por ciclo
    $sql= 'SELECT count(*), e.tipo from mc_detalle_PPMC_Monitor_avl det ' .
    	' 	inner JOIN mc_universo_cds ON det.Id_PPMC = mc_universo_cds.numero  ' .
    	' 	      and mc_universo_cds.mes = month(det.fechacarga) and mc_universo_cds.anio = year(det.fechacarga) ' .
    	'		  and mc_universo_cds.id_proveedor = det.Id_Proveedor  ' .
    	' 	inner   join mc_c_Errores e on replace(e.Descripcion,\' \',\'\')  = replace(det.Descripcion,\' \',\'\')   and e.AplicaCDS = 1 ' .
    	' where mc_universo_cds.id =  ' . CCGetParam("Id") . 
    	' and e.tipo not like \'%docum%\'  and considerar =1 group by e.tipo ';
    	//echo($sql);
    $db->query($sql);
    while($db->next_record()){
		$RechazosFunAVL = $RechazosFunAVL + $db->f(0);
    }
    $mc_info_rs_cr_calidad->RechazosFunAVL->SetValue($RechazosFunAVL);
    $sql="select count(*)  from mc_info_detalle_defectos_calidad where TipoRegistro='Defecto' and Ignorar=0 and IdPadre= " . CCGetParam("Id");
    $db->query($sql);
    if($db->next_record()){
    	$mc_info_rs_cr_calidad->DefectosQC->SetValue($db->f(0));
    }
     /*
       var Indice = CasosPruebas.valueOf()/DefectosQC.valueOf()*100;
        var TotalDefectos  =0;

        if(Indice <= 25){
                TotalDefectos = 1;
        }
        if(Indice > 25 && Indice <= 50){
                TotalDefectos = 2;
        }
        if(Indice > 50){
                TotalDefectos = 3;

	*/
	//se obtiene el indice de calidad
	//$mc_info_rs_cr_calidad->DefectosQC->GetValue()/$mc_info_rs_cr_calidad->DefectosQC->GetValue()*100;
	
	$IndiceCalidadFun =$mc_info_rs_cr_calidad->TotalDefectos->GetValue()+ $RechazosFunAVL;
    $mc_info_rs_cr_calidad->IndiceCalidadFun->SetValue($IndiceCalidadFun);
    if($IndiceCalidadFun >=6 and $IndiceCalidadFun <= 10 ){
    	$mc_info_rs_cr_calidad->DeductivaFun->SetValue(2);
    }
	if($IndiceCalidadFun > 10 ){
    	$mc_info_rs_cr_calidad->DeductivaFun->SetValue(2 + ($IndiceCalidadFun-10));
	}
	if($mc_info_rs_cr_calidad->DeductivaFun->GetValue()>8){
		$mc_info_rs_cr_calidad->DeductivaFun->SetValue(8);
	}
	$mc_info_rs_cr_calidad->DeductivaTot->SetValue($mc_info_rs_cr_calidad->DeductivaFun->GetValue() + $mc_info_rs_cr_calidad->DeductivaDoc->GetValue());
	//si la deductiva total es cero, cumple, si no, no cumple
		if($mc_info_rs_cr_calidad->DeductivaTot->GetValue()>0){
			$mc_info_rs_cr_calidad->CumpleCalidad->SetValue(0);
		} else {
			$mc_info_rs_cr_calidad->CumpleCalidad->SetValue(1);
		}
	
}
?>
