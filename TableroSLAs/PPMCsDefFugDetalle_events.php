<?php
//BindEvents Method @1-2D3F384B
function BindEvents()
{
    global $mc_info_rs_cr_deffug;
    global $IncidentesPPMC;
    global $mc_info_detalle_PPMC_avl;
    global $CCSEvents;
    $mc_info_rs_cr_deffug->FechaUltMod->CCSEvents["BeforeShow"] = "mc_info_rs_cr_deffug_FechaUltMod_BeforeShow";
    $mc_info_rs_cr_deffug->btnCalcula->CCSEvents["OnClick"] = "mc_info_rs_cr_deffug_btnCalcula_OnClick";
    $mc_info_rs_cr_deffug->CCSEvents["BeforeShow"] = "mc_info_rs_cr_deffug_BeforeShow";
    $mc_info_rs_cr_deffug->ds->CCSEvents["BeforeExecuteInsert"] = "mc_info_rs_cr_deffug_ds_BeforeExecuteInsert";
    $mc_info_rs_cr_deffug->ds->CCSEvents["BeforeExecuteUpdate"] = "mc_info_rs_cr_deffug_ds_BeforeExecuteUpdate";
    $mc_info_rs_cr_deffug->CCSEvents["OnValidate"] = "mc_info_rs_cr_deffug_OnValidate";
    $IncidentesPPMC->FechaInicioMov->CCSEvents["BeforeShow"] = "IncidentesPPMC_FechaInicioMov_BeforeShow";
    $IncidentesPPMC->FechaFinMov->CCSEvents["BeforeShow"] = "IncidentesPPMC_FechaFinMov_BeforeShow";
    $IncidentesPPMC->ds->CCSEvents["BeforeExecuteSelect"] = "IncidentesPPMC_ds_BeforeExecuteSelect";
    $mc_info_detalle_PPMC_avl->ds->CCSEvents["BeforeExecuteSelect"] = "mc_info_detalle_PPMC_avl_ds_BeforeExecuteSelect";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_info_rs_cr_deffug_FechaUltMod_BeforeShow @22-C62454EB
function mc_info_rs_cr_deffug_FechaUltMod_BeforeShow(& $sender)
{
    $mc_info_rs_cr_deffug_FechaUltMod_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_deffug; //Compatibility
//End mc_info_rs_cr_deffug_FechaUltMod_BeforeShow

//Close mc_info_rs_cr_deffug_FechaUltMod_BeforeShow @22-BF50BAFA
    return $mc_info_rs_cr_deffug_FechaUltMod_BeforeShow;
}
//End Close mc_info_rs_cr_deffug_FechaUltMod_BeforeShow

//mc_info_rs_cr_deffug_btnCalcula_OnClick @30-23321482
function mc_info_rs_cr_deffug_btnCalcula_OnClick(& $sender)
{
    $mc_info_rs_cr_deffug_btnCalcula_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_deffug; //Compatibility
//End mc_info_rs_cr_deffug_btnCalcula_OnClick

//Custom Code @31-2A29BDB7
// -------------------------
    InsertaDatosPaquetes();
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_deffug_btnCalcula_OnClick @30-B778C443
    return $mc_info_rs_cr_deffug_btnCalcula_OnClick;
}
//End Close mc_info_rs_cr_deffug_btnCalcula_OnClick

//mc_info_rs_cr_deffug_BeforeShow @3-E121A56A
function mc_info_rs_cr_deffug_BeforeShow(& $sender)
{
    $mc_info_rs_cr_deffug_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_deffug; //Compatibility
//End mc_info_rs_cr_deffug_BeforeShow

//Custom Code @24-2A29BDB7
// -------------------------
	global $sPPMC ;
	$db= new clsDBcnDisenio;
    $sql="SELECT u.id, u.IdEstimacion, ID_PPMC, ESTIMACION_ID,  requerimiento_relacionado,  RESULTADO_ESTIMACION,  " .
			" UNIDADES_RESULTANTES, TIPO_UNIDAD, ESFUERZO, PROVEEDOR, ESTADO_REQ_ESTIM,   u.mes, u.anio, m.mes NomMes  " .
			" from mc_universo_cds u inner join mc_c_mes m on m.IdMes = u.mes  LEFT JOIN PPMC_ESTIMACION on " . 
			" PPMC_ESTIMACION.ID_PPMC = u.numero  where month(fecha_carga)=u.mes and YEAR(FECHA_CARGA) = u.anio " .
			" AND u.id = " . CCGetParam("Id");
    $db->query($sql);
    if($db->next_record()){
    	$sPPMC = $db->f("ID_PPMC");
    	if(!$mc_info_rs_cr_deffug->EditMode){
    		$mc_info_rs_cr_deffug->ID_Estimacion->SetValue($db->f("ESTIMACION_ID"));
    		$mc_info_rs_cr_deffug->Id_PPMC->SetValue($sPPMC);
    		BuscaDatosPaquetes(); 	
    	} 
    	$mc_info_rs_cr_deffug->lbPPMC->SetValue($sPPMC);
    	$mc_info_rs_cr_deffug->lReportado->SetValue(" - Reportado en " . $db->f("NomMes"));
    	$sProveedor= $db->f("Proveedor");
    	
		$sTipoReq =$db->f("requerimiento_relacionado");
		switch($db->f("requerimiento_relacionado")){
			case "Proyecto";
				$db->query('SELECT Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, ESTADO, TIPO_SERVICIO_CTI ' . 
					' FROM PPMC_PROYECTOS_AS ' .
					' WHERE ID_PROYECTO = ' . $sPPMC );
				break;
			case "RO";
				$db->query('SELECT Name, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, ESTADO, TipoServicioCTI ' .
					' FROM PPMC_RO_AS ' .
					' WHERE REQUEST_ID = ' . $sPPMC );
				break;
			case "Control de Cambios";
				$db->query('SELECT Project_Name, SERVICIO_NEGOCIO, TIPO_Solicitud, c.ESTADO, TIPO_SERVICIO_CTI ' .
					' FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC ' .
					' WHERE REQ_CAMBIO_ID  =  ' . $sPPMC );		
				break;
		}
		if($db->has_next_record()){
			$db->next_record();
			$mc_info_rs_cr_deffug->sNombreProyecto->SetValue($db->f(0));
			$mc_info_rs_cr_deffug->lServNegocio->SetValue($db->f(1));
			$mc_info_rs_cr_deffug->sTipoRequerimiento->SetValue($db->f(2));
		}
    
    } else {// si no tiene Estimación
		$sql="SELECT ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA,  Proveedor, u.mes, u.anio, m.Mes NomMes  " .
			" from mc_universo_cds u inner join mc_c_mes m on m.IdMes = u.mes  LEFT JOIN vw_PPMC_Proy_RO_CC on " . 
			" vw_PPMC_Proy_RO_CC.ID_PPMC = u.numero  where month(fecha_carga)=u.mes and YEAR(FECHA_CARGA) = u.anio " .
			" AND u.id = " . CCGetParam("Id");
    	$db->query($sql);
		if($db->next_record()){
			$sPPMC = $db->f("ID_PPMC");
	    	if(!$mc_info_rs_cr_deffug->EditMode){
	    		$mc_info_rs_cr_deffug->ID_Estimacion->SetValue(0);
	    		$mc_info_rs_cr_deffug->Id_PPMC->SetValue($sPPMC);
	    		BuscaDatosPaquetes(); 	
	    	} 
	    	$mc_info_rs_cr_deffug->lbPPMC->SetValue($sPPMC);
	    	$mc_info_rs_cr_deffug->lReportado->SetValue(" - Reportado en " . $db->f("NomMes"));
	    	$sProveedor= $db->f("Proveedor");
	    	$mc_info_rs_cr_deffug->sNombreProyecto->SetValue($db->f("NAME"));
			$mc_info_rs_cr_deffug->lServNegocio->SetValue($db->f("SERVICIO_NEGOCIO"));
			$mc_info_rs_cr_deffug->sTipoRequerimiento->SetValue($db->f("TIPO_REQUERIMIENTO"));
		}  
    }
    //se trae la información general del requerimiento
    $sql = 'SELECT id_servicio_cont, id_servicio_negocio, id_tipo, idestimacion, mc.descripción NombreProyecto, ' .
    	' sc.Descripcion  ServContractual, sn.nombre ServNegocio, t.Descripcion TipoPPMC ' .
		' FROM mc_calificacion_rs_MC mc  inner join mc_c_servcontractual sc on sc.id = mc.id_servicio_cont ' .
		' 		inner join mc_c_servicio   sn on sn.id_servicio   = mc.id_servicio_negocio and sn.id_tipo_servicio =2 ' .
		' 		inner join mc_c_TipoPPMC t on t.Id = mc.id_tipo WHERE idUniverso= ' . CCGetParam("Id") ;
    $db->query($sql);
	if($db->next_record() ){
		$mc_info_rs_cr_deffug->lServNegocio->SetValue($db->f("ServNegocio"));
		if(!$mc_info_rs_cr_deffug->EditMode){
			$mc_info_rs_cr_deffug->sTipoRequerimiento->SetValue($db->f("TipoPPMC"));
			$mc_info_rs_cr_deffug->lServNegocio->SetValue($db->f("ServNegocio"));
			$mc_info_rs_cr_deffug->sNombreProyecto->SetValue($db->f("NombreProyecto"));
		}
	} else {
    	$mc_info_rs_cr_deffug->Button_Insert->Visible= false;
    	$mc_info_rs_cr_deffug->Button_Update->Visible = false;	
	}
    
    // Verifica si esta cerrado para medición
    $flgCerrado=CCDLookUp("Medido","mc_universo_cds","id=" . CCGetParam("Id","") ,$db);
    if($flgCerrado==1){
    	$mc_info_rs_cr_deffug->Button_Insert->Visible= false;
    	$mc_info_rs_cr_deffug->Button_Update->Visible = false;
    }
    if($flgCerrado==0){
    	//$mc_info_rs_cr_deffug->Button_Insert->Visible= true;
    	//$mc_info_rs_cr_deffug->Button_Update->Visible = true;
    }
    $db->Close();
    
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_deffug_BeforeShow @3-73EB461E
    return $mc_info_rs_cr_deffug_BeforeShow;
}
//End Close mc_info_rs_cr_deffug_BeforeShow

//mc_info_rs_cr_deffug_ds_BeforeExecuteInsert @3-E75E8987
function mc_info_rs_cr_deffug_ds_BeforeExecuteInsert(& $sender)
{
    $mc_info_rs_cr_deffug_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_deffug; //Compatibility
//End mc_info_rs_cr_deffug_ds_BeforeExecuteInsert

//Custom Code @213-2A29BDB7
// -------------------------
    //verifica si ya existe el registro en la tabla de calificaciones, si no existe lo crea, si existe lo actualiza
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
    
    $sCumpleDefFug = $mc_info_rs_cr_deffug->CumpleDefFug->GetValue();
	if($sCumpleDefFug === ""){
			$sCumpleDefFug ="NULL";
	}
    $sSQl='SELECT count(Id) from mc_calificacion_rs_mc where IdUniverso=' . CCGetParam("Id");
    $db->query($sSQl);
    if($db->next_record()){
    	if($db->f(0)==0){ // si no existe se inserta
    		$sSQL='insert into mc_calificacion_rs_mc (id_ppmc, id_proveedor,id_servicio_cont , id_servicio_negocio , DEF_FUG_AMB_PROD, IdUniverso, MesReporte, AnioReporte ) ' .  
    			' values (' . $sPPMC . ',' . $sIdProveedor . ',0,0,'.  $sCumpleDefFug . ',' .
    			 CCGetparam("Id") . ',' . $sMes . ',' . $sAnio .')';
    	} else { //si existe se actualiza
    		$sSQL = 'Update mc_calificacion_rs_mc set DEF_FUG_AMB_PROD = ' . $sCumpleDefFug .
    			' where IdUniverso =' . CCGetParam("Id");
    	}
    }
    $db->query($sSQL);
    $db->close();
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_deffug_ds_BeforeExecuteInsert @3-978794C4
    return $mc_info_rs_cr_deffug_ds_BeforeExecuteInsert;
}
//End Close mc_info_rs_cr_deffug_ds_BeforeExecuteInsert

//mc_info_rs_cr_deffug_ds_BeforeExecuteUpdate @3-89324664
function mc_info_rs_cr_deffug_ds_BeforeExecuteUpdate(& $sender)
{
    $mc_info_rs_cr_deffug_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_deffug; //Compatibility
//End mc_info_rs_cr_deffug_ds_BeforeExecuteUpdate

//Custom Code @214-2A29BDB7
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
    $sCumpleDefFug = $mc_info_rs_cr_deffug->CumpleDefFug->GetValue();
	if($sCumpleDefFug === ""){
			$sCumpleDefFug ="NULL";
	}
	$sSQL = 'UPDATE  mc_calificacion_rs_mc SET def_fug_amb_prod = ' . $sCumpleDefFug .
    			' WHERE IdUniverso =' . CCGetParam("Id");
    $db->query($sSQL);
    $db->close();
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_deffug_ds_BeforeExecuteUpdate @3-58AE554B
    return $mc_info_rs_cr_deffug_ds_BeforeExecuteUpdate;
}
//End Close mc_info_rs_cr_deffug_ds_BeforeExecuteUpdate

//mc_info_rs_cr_deffug_OnValidate @3-0A79EE34
function mc_info_rs_cr_deffug_OnValidate(& $sender)
{
    $mc_info_rs_cr_deffug_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_deffug; //Compatibility
//End mc_info_rs_cr_deffug_OnValidate

//Custom Code @221-2A29BDB7
// -------------------------
    global $Redirect;
	global $PathToRoot;
	
	$mc_info_rs_cr_deffug->UsuarioUltMod->SetValue(CCGetUserLogin());
	$mc_info_rs_cr_deffug->FechaUltMod->SetValue(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y")));
	
	if(CCGetParam("src",0)==1){//si viene de la página de detalle lo regresa a esa misma
		$Redirect = $PathToRoot ."PPMCsCrInfoGeneral.php?".CCGetQueryString("QueryString",array("ccsForm","src"));
	} else {
		$Redirect = $PathToRoot ."PPMCsCrbLista.php?".CCGetQueryString("QueryString",array("ccsForm","src"));
	}
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_deffug_OnValidate @3-4C102297
    return $mc_info_rs_cr_deffug_OnValidate;
}
//End Close mc_info_rs_cr_deffug_OnValidate


//IncidentesPPMC_FechaInicioMov_BeforeShow @108-2DCF536B
function IncidentesPPMC_FechaInicioMov_BeforeShow(& $sender)
{
    $IncidentesPPMC_FechaInicioMov_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidentesPPMC; //Compatibility
//End IncidentesPPMC_FechaInicioMov_BeforeShow

//Close IncidentesPPMC_FechaInicioMov_BeforeShow @108-D2CCB6E3
    return $IncidentesPPMC_FechaInicioMov_BeforeShow;
}
//End Close IncidentesPPMC_FechaInicioMov_BeforeShow

//IncidentesPPMC_FechaFinMov_BeforeShow @110-3CD1EC4C
function IncidentesPPMC_FechaFinMov_BeforeShow(& $sender)
{
    $IncidentesPPMC_FechaFinMov_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidentesPPMC; //Compatibility
//End IncidentesPPMC_FechaFinMov_BeforeShow

//Close IncidentesPPMC_FechaFinMov_BeforeShow @110-C6622CC5
    return $IncidentesPPMC_FechaFinMov_BeforeShow;
}
//End Close IncidentesPPMC_FechaFinMov_BeforeShow

//IncidentesPPMC_ds_BeforeExecuteSelect @92-6116593C
function IncidentesPPMC_ds_BeforeExecuteSelect(& $sender)
{
    $IncidentesPPMC_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidentesPPMC; //Compatibility
//End IncidentesPPMC_ds_BeforeExecuteSelect

//Custom Code @117-2A29BDB7
// -------------------------
	global $mc_info_rs_cr_deffug;
	$IncidentesPPMC->DataSource->SQL = 'SELECT mc_info_detalle_paquetes_df.Id, IdDetalle, Id_Incidente, ClaveMovimiento, DescMovimiento, FechaInicioMov, FechaFinMov, Paquete, Ignorar  ' .
			'FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_incidente_avl ON mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_incidente_avl.Id ' .
			' WHERE Fuente = \'PPMC\' and Id_Incidente IN  (\'' . $mc_info_rs_cr_deffug->Incidentes->GetValue() . '\')';
// -------------------------
//End Custom Code

//Close IncidentesPPMC_ds_BeforeExecuteSelect @92-EDA399F7
    return $IncidentesPPMC_ds_BeforeExecuteSelect;
}
//End Close IncidentesPPMC_ds_BeforeExecuteSelect

//DEL  // -------------------------
//DEL      	global $mc_info_rs_cr_deffug;
//DEL  		$mc_info_detalle_paquetes->DataSource->SQL = 'SELECT mc_info_detalle_paquetes_df.Id, IdDetalle, Id_Incidente, ClaveMovimiento, DescMovimiento, FechaInicioMov, FechaFinMov, Paquete, Ignorar  ' .
//DEL  			'FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_incidente_avl ON mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_incidente_avl.Id ' .
//DEL  			' WHERE Fuente = \'RAPE\' and Id_Incidente=\'' . $mc_info_rs_cr_deffug->IncidentesRAPE->GetValue() . '\'';
//DEL  // -------------------------

//mc_info_detalle_PPMC_avl_ds_BeforeExecuteSelect @159-4D591A0F
function mc_info_detalle_PPMC_avl_ds_BeforeExecuteSelect(& $sender)
{
    $mc_info_detalle_PPMC_avl_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_detalle_PPMC_avl; //Compatibility
//End mc_info_detalle_PPMC_avl_ds_BeforeExecuteSelect

//Custom Code @187-2A29BDB7
// -------------------------
    $sSQL = 'SELECT mc_info_detalle_paquetes_df.Id AS mc_info_detalle_paquetes_df_Id, Ignorar, Paquete, mc_detalle_ppmc_avl.Id AS mc_detalle_PPMC_Monitor_avl_Id,  ' .
    	' ClaveMovimiento, FechaInicioMov, FechaFinMov, DescMovimiento Descripcion, c_rdl, PAQ_CVE_FOL  FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_ppmc_avl ON ' .
    	' mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_ppmc_avl.Id WHERE Fuente = \'REQ\'  and IdPadre = ' . CCGetParam('Id');
    $mc_info_detalle_PPMC_avl->DataSource->SQL=$sSQL;
    
// -------------------------
//End Custom Code

//Close mc_info_detalle_PPMC_avl_ds_BeforeExecuteSelect @159-4E388AA0
    return $mc_info_detalle_PPMC_avl_ds_BeforeExecuteSelect;
}
//End Close mc_info_detalle_PPMC_avl_ds_BeforeExecuteSelect

//Page_BeforeShow @1-2B4C6BA9
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsDefFugDetalle; //Compatibility
//End Page_BeforeShow

//Custom Code @29-2A29BDB7
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
    		$lkAnterior->SetLink("PPMCsDefFugDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id"),"ccsForm"),"Id",$aPPMCsAPbIds[$iPos-1]));
    	}
    	if($iPos < count($aPPMCsAPbIds)-1){
    		$lkSiguiente->SetValue($aPPMCsAPbValues[$iPos+1]);
    		$lkSiguiente->SetLink("PPMCsDefFugDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id"),"ccsForm"),"Id",$aPPMCsAPbIds[$iPos+1]));
    	} else {
    		$lkSiguiente->SetValue("");
    	}
    }

	//verifica si ya tienen registros relacionados en los detalles de paquetes, si no los tiene los genera.
	global $db;
	$db= new clsDBcnDisenio;
	$sSQL = 'select count(*) from mc_info_detalle_paquetes_df where IdPadre =' . CCGetParam("Id",0);
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
		case "Garantias":
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
			  '				 <Contains><FieldRef Name="FileRef" /><Value Type="Text">ReporteGarant</Value></Contains> '.
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

function BuscaDatosPaquetes(){
	global $db;
    global $lDocs;
    global $IdProveedor;
    global $sPPMC;
    global $mc_info_rs_cr_deffug;
    
    $db = new clsDBcnDisenio();
	$sql="select Id_Proveedor, Numero from mc_universo_cds where id=".CCGetParam("Id");
	$db->query($sql);
	$db->next_record();
	$IdProveedor = $db->f("Id_Proveedor");
	$sPPMC = $db->f("Numero");
	$mc_info_rs_cr_deffug->hdIdProveedor->SetValue($IdProveedor);
	$mc_info_rs_cr_deffug->Id_PPMC->SetValue($sPPMC);
    
    // busca la información del incidente registrado en las observciones del PPMC
    if($mc_info_rs_cr_deffug->Incidentes->GetValue()!=""){
		$iPaquetes =0;
		$sPaquetes ="";
		$db->query('select count(distinct Id_Incidente)  from mc_info_detalle_paquetes_df ' .
					' INNER JOIN mc_detalle_incidente_avl ON mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_incidente_avl.Id ' .
  					' where fuente=\'PPMC\' and Ignorar=0 and IdPadre=' . CCGetParam("Id"));
		if($db->next_record()){
			$iPaquetes = $db->f(0);
		}    
    	$mc_info_rs_cr_deffug->NumIncidentes->SetValue($iPaquetes);
    }
    
    // busca los paquetes del PPMC
	$db->query('select count(*) from mc_info_detalle_paquetes_df where fuente=\'REQ\' and Ignorar=0 and IdPadre=' . CCGetParam("Id"));
	$iPaquetes =0;
	$sPaquetes ="";
	if($db->next_record()){
		$sPaquetes = 'Si';
		$iPaquetes = $db->f(0);
	} else {
		$sPaquetes = 'No';
		$iPaquetes = 0;
	}
	$mc_info_rs_cr_deffug->Paquetes->SetValue($sPaquetes);
    $mc_info_rs_cr_deffug->NumPaquetes->SetValue($iPaquetes);
    	
    // busca la información del reporte de garantías
    $db->query('SELECT UrlSharepoint, GUID_Administracion, Vista_Administracion, GUID_WebId from mc_c_proveedor ' . 
			' where id_proveedor=' . $IdProveedor  );		
	if($db->has_next_record()){
		$db->next_record();
	}
	// se va por la información de archivos en el repositorio de Sharepoint via SOAP
	//echo "Garantias" . $sPPMC . "<br>" . $db->f("UrlSharepoint") . "<br>" . $db->f("GUID_Administracion"). "<br>" . $db->f("Vista_Administracion"). "<br>" . $db->f("GUID_WebId");
	//die();
	$result = CallSOAPCurl("Garantias",$sPPMC,$db->f("UrlSharepoint") , $db->f("GUID_Administracion"), $db->f("Vista_Administracion"), $db->f("GUID_WebId"));
	if($result!=""){
	// se procesan los resultados para mostrar información del elemento
	$doc = new DOMDocument();
	$doc->loadXML($result);
	$nodos=$doc->getElementsByTagName("row");
	$sItems = '<table class="Record" cellspacing="0" cellpadding="0" width="340px">';
	$sVersiones="";
	for ($item=0; $item < $nodos->length; $item++){
			if ($item==0){
				//$sItems = $sItems . '<tr class="Controls"><td colspan="3">' . substr(strstr($nodos->item($item)->getAttribute('ows_FileRef'),'#'),1,strrpos(substr(strstr($nodos->item($item)->getAttribute('ows_FileRef'),'')) . "</td></tr>";
			}
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
			$sItems = $sItems . '<td width="20px"><a target="_blank" href="' . $db->f("UrlSharepoint") . '/_layouts/versions.aspx?FileName=/'. rawurlencode(substr($nodos->item($item)->getAttribute('ows_FileRef'),strpos($nodos->item($item)->getAttribute('ows_FileRef'),"#")+1))  . '&listid=' . $db->f("GUID_Administracion") . '">' . $nodos->item($item)->getAttribute('ows_owshiddenversion'). '</a></td>';
			$sItems = $sItems . "<td width='90px'>" . CCFormatDate(CCParseDate(substr(strstr($nodos->item($item)->getAttribute('ows_Created_x0020_Date'),'#'),1),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","HH",":","nn")) . "</td>";
			$sItems = $sItems . "</tr>";
	}	
	$sItems = $sItems . "</table>";
	$lDocs->SetValue(iconv('UTF-8','Windows-1252', $sItems));
	}

    // busca la información del Incidente que dijo el RAPE
	if($mc_info_rs_cr_deffug->IncidentesRAPE->GetValue()!=""){
		$db->query('select count(*) from mc_info_detalle_paquetes_df where fuente=\'RAPE\' and Ignorar=0 and IdPadre=' . CCGetParam("Id"));
		$iPaquetesRAPE = 0;
		$sPaquetesRAPE = "";
		if($db->next_record()){
			$iPaquetesRAPE = $db->f(0);
		} 
		$mc_info_rs_cr_deffug->NumIncidentesRAPE->SetValue($iPaquetesRAPE);
	}
	$mc_info_rs_cr_deffug->lbTotalDefectos->SetValue($mc_info_rs_cr_deffug->NumIncidentes->GetValue() + $mc_info_rs_cr_deffug->NumPaquetes->GetValue() + 
    $mc_info_rs_cr_deffug->NumIncidentesRAPE->GetValue() );
	$mc_info_rs_cr_deffug->Deductiva->SetValue((
		$mc_info_rs_cr_deffug->NumIncidentes->GetValue() + $mc_info_rs_cr_deffug->NumPaquetes->GetValue() + 
		$mc_info_rs_cr_deffug->NumIncidentesRAPE->GetValue() )) ;
	if($mc_info_rs_cr_deffug->Deductiva->GetValue()>0){
		$mc_info_rs_cr_deffug->CumpleDefFug->SetValue(0);
	} else {
		$mc_info_rs_cr_deffug->CumpleDefFug->SetValue(1);
	}
}


function InsertaDatosPaquetes(){
	global $db;
    global $IdProveedor;
    global $sPPMC;
    global $sMes;
    global $sAnio;
    global $mc_info_rs_cr_deffug;
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
		$sSQL = 'Delete from mc_info_detalle_paquetes_df  where IdPadre=' . $sId;
		$db->query($sSQL);    
		
		$sSQL='insert into mc_info_detalle_paquetes_df (IdPadre, IdDetalle, Ignorar, Fuente) ' . 
			' SELECT  ' . $sId . ', Id, 0, \'PPMC\' FROM mc_detalle_incidente_avl where ClaveMovimiento in (16,500) ' .
			' and Id_Incidente IN (\'' . str_replace(',',"','",str_replace(' ','',$mc_info_rs_cr_deffug->Incidentes->GetValue()))  .
			'\') And Month(FechaCarga)= ' . $sMes . ' AND Year(FechaCarga)='  . $sAnio ;
		$db->query($sSQL);    
	    
	    // busca los paquetes del PPMC
		$sSQL='insert into mc_info_detalle_paquetes_df (IdPadre, IdDetalle, Ignorar, Fuente) ' . 
			'SELECT ' . $sId . ', Id, 0, \'REQ\' from mc_detalle_ppmc_avl  where ClaveMovimiento  IN (100) and Id_PPMC  =\'' . $sPPMC . 
			'\' And Month(FechaCarga)= ' . $sMes . ' AND Year(FechaCarga)=' . $sAnio ;
		$db->query($sSQL);
		
		// busca la información del Incidente que dijo el RAPE
		$sSQL='insert into mc_info_detalle_paquetes_df (IdPadre, IdDetalle, Ignorar, Fuente) ' . 
			' SELECT  ' . $sId . ', Id, 0, \'RAPE\' FROM mc_detalle_incidente_avl where ClaveMovimiento in (16,500) ' .
			' and Id_Incidente IN (\'' . str_replace(',',"','",str_replace(' ','',$mc_info_rs_cr_deffug->IncidentesRAPE->GetValue()))  . 
			'\') And Month(FechaCarga)= ' . $sMes . ' AND Year(FechaCarga)=' . $sAnio ;
		$db->query($sSQL);    
	}
}
?>
