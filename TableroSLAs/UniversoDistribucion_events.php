<?php
//BindEvents Method @1-E553CA1A
function BindEvents()
{
    global $mc_universo_cds;
    global $mc_universo_cds1;
    $mc_universo_cds->TotalRecords->CCSEvents["BeforeShow"] = "mc_universo_cds_TotalRecords_BeforeShow";
    $mc_universo_cds->Button1->CCSEvents["OnClick"] = "mc_universo_cds_Button1_OnClick";
    $mc_universo_cds->CCSEvents["BeforeShowRow"] = "mc_universo_cds_BeforeShowRow";
    $mc_universo_cds1->TotalRecords->CCSEvents["BeforeShow"] = "mc_universo_cds1_TotalRecords_BeforeShow";
    $mc_universo_cds1->Button1->CCSEvents["OnClick"] = "mc_universo_cds1_Button1_OnClick";
    $mc_universo_cds1->CCSEvents["BeforeShowRow"] = "mc_universo_cds1_BeforeShowRow";
}
//End BindEvents Method

//mc_universo_cds_TotalRecords_BeforeShow @46-484AF67A
function mc_universo_cds_TotalRecords_BeforeShow(& $sender)
{
    $mc_universo_cds_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_universo_cds; //Compatibility
//End mc_universo_cds_TotalRecords_BeforeShow

//Retrieve number of records @47-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close mc_universo_cds_TotalRecords_BeforeShow @46-74162945
    return $mc_universo_cds_TotalRecords_BeforeShow;
}
//End Close mc_universo_cds_TotalRecords_BeforeShow

//mc_universo_cds_Button1_OnClick @110-E3FA9492
function mc_universo_cds_Button1_OnClick(& $sender)
{
    $mc_universo_cds_Button1_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_universo_cds; //Compatibility
//End mc_universo_cds_Button1_OnClick

//Custom Code @111-2A29BDB7
// -------------------------
    	$sSQL = "update mc_universo_cds set medido=1 where tipo='IN' and mes=" . CCGetParam("s_mes", date("m")-2) . " and anio=" . CCGetparam("s_anio",date("Y"));
    	global $db;
    	$db=new clsDBcnDisenio;
    	$db->query($sSQL);
    	
    	
    	$sSQL = "DELETE FROM mc_calificacion_incidentes_SAT WHERE MesReporte = " . CCGetParam("s_mes", date("m")-2) . " and AnioReporte = " . CCGetparam("s_anio",date("Y")) ;
    	$db->query($sSQL);
    	
    
    	//se insertan los incidentes medido en las tablas del SAT
    	$sSQL = "insert into mc_calificacion_incidentes_SAT  " .
				" ([id_incidente],[Cumple_DISP_SOPORTE],[Cumple_Inc_TiempoSolucion],[Cumple_Inc_TiempoAsignacion] " .
      			" ,[FechaCierre],[descartar],[Obs_Manuales],[severidad],[MesReporte],[AnioReporte],[id_servicio] " .
      			" ,[id_proveedor],[UrlEvidencia]) " .
				" select [id_incidente], [Cumple_DISP_SOPORTE],[Cumple_Inc_TiempoSolucion],[Cumple_Inc_TiempoAsignacion] " .
      			" 	,[FechaCierre],[descartar],[Obs_Manuales],[severidad],[MesReporte],[AnioReporte] " .
      			" 	,[id_servicio],[id_proveedor],[UrlEvidencia] " .
				" from mc_calificacion_incidentes_MC  " .
				" where MesReporte =" . CCGetParam("s_mes", date("m")-2) . " 	and AnioReporte = " . CCGetparam("s_anio",date("Y")) . 
				"	and id_incidente not in (select numero from mc_universo_cds where SLO=1) " .
				" 	and id_incidente in  ( select numero from mc_universo_cds  where tipo='IN' " . 
				" 	and mes=" . CCGetParam("s_mes", date("m")-2) . " and anio =" . CCGetparam("s_anio",date("Y"))  . " and Medido =1 " .
				" 	and numero not in (select id_incidente from mc_calificacion_incidentes_SAT where MesReporte =" . CCGetParam("s_mes", date("m")-2) . " and AnioReporte = " . CCGetparam("s_anio",date("Y")) . "))";
    		$db->query($sSQL);
    	
// -------------------------
//End Custom Code

//Close mc_universo_cds_Button1_OnClick @110-523C6D97
    return $mc_universo_cds_Button1_OnClick;
}
//End Close mc_universo_cds_Button1_OnClick

//mc_universo_cds_BeforeShowRow @3-F0D49141
function mc_universo_cds_BeforeShowRow(& $sender)
{
    $mc_universo_cds_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_universo_cds; //Compatibility
//End mc_universo_cds_BeforeShowRow

//Custom Code @48-2A29BDB7
// -------------------------
    if($mc_universo_cds->descartar_manual->GetValue()==1){
    	$mc_universo_cds->descartar_manual->SetValue("No Considerar");
    }
    $mc_universo_cds->NumFila->SetValue($mc_universo_cds->RowNumber);
    $mc_universo_cds->TotalRecords->SetValue($mc_universo_cds->DataSource->RecordsCount);
// -------------------------
//End Custom Code

//Close mc_universo_cds_BeforeShowRow @3-AF36F5B4
    return $mc_universo_cds_BeforeShowRow;
}
//End Close mc_universo_cds_BeforeShowRow

//mc_universo_cds1_TotalRecords_BeforeShow @82-5E88E60F
function mc_universo_cds1_TotalRecords_BeforeShow(& $sender)
{
    $mc_universo_cds1_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_universo_cds1; //Compatibility
//End mc_universo_cds1_TotalRecords_BeforeShow

//Retrieve number of records @83-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close mc_universo_cds1_TotalRecords_BeforeShow @82-C01C3162
    return $mc_universo_cds1_TotalRecords_BeforeShow;
}
//End Close mc_universo_cds1_TotalRecords_BeforeShow

//mc_universo_cds1_Button1_OnClick @112-02B61DF5
function mc_universo_cds1_Button1_OnClick(& $sender)
{
    $mc_universo_cds1_Button1_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_universo_cds1; //Compatibility
//End mc_universo_cds1_Button1_OnClick

//Custom Code @113-2A29BDB7
// -------------------------
    $sSQL = "update mc_universo_cds set medido=1 where tipo IN ('PA','PC') and mes=" . CCGetParam("s_mes", date("m")-2) . " and anio=" . CCGetparam("s_anio",date("Y"));
    	global $db;
    	$db=new clsDBcnDisenio;
    	$db->query($sSQL);
	
	
    	$sSQL = "DELETE FROM mc_calificacion_rs_SAT WHERE MesReporte = " . CCGetParam("s_mes", date("m")-2) . " and AnioReporte = " . CCGetparam("s_anio",date("Y")) ;
    	$db->query($sSQL);
	
    
    $sSQL = "INSERT INTO mc_calificacion_rs_SAT " .
			" 	([id_ppmc],[id_proveedor],[id_servicio_cont],[id_servicio_negocio],[id_tipo],[descripción],[HERR_EST_COST] " .
      		" 	,[REQ_SERV],[CUMPL_REQ_FUNC],[CALIDAD_PROD_TERM],[RETR_ENTREGABLE],[COMPL_RUTA_CRITICA],[EST_PROY] " .
      		" 	,[DEF_FUG_AMB_PROD],[Obs_manuales],[MesReporte],[AnioReporte],[ppmc_adicional],[ACSI],[descartar] " .
      		" 	,[UrlEvidencia],[Unidades],[TipoUnidades],[IdUniverso],[Id]) " .
			" SELECT [id_ppmc],[id_proveedor],[id_servicio_cont],[id_servicio_negocio],[id_tipo],[descripción],[HERR_EST_COST] " .
      		" 	,[REQ_SERV],[CUMPL_REQ_FUNC],[CALIDAD_PROD_TERM],[RETR_ENTREGABLE],[COMPL_RUTA_CRITICA],[EST_PROY] " .
      		" 	,[DEF_FUG_AMB_PROD],[Obs_manuales],[MesReporte],[AnioReporte],[ppmc_adicional],[ACSI],[descartar] " .
      		" 	,[UrlEvidencia],[Unidades],[TipoUnidades],[Iduniverso],[Id] " .
			" FROM mc_calificacion_rs_MC " .
			" WHERE MesReporte = " . CCGetParam("s_mes", date("m")-2) . " and AnioReporte = " . CCGetparam("s_anio",date("Y")) .
			"	and iduniverso not in (select id from mc_universo_cds where SLO=1) " .
			" 	and iduniverso in  (select id from mc_universo_cds  where tipo<>'IN' " .
			" 	and mes=" . CCGetParam("s_mes", date("m")-2) . " and anio = " . CCGetparam("s_anio",date("Y")) . " and Medido =1 and id not in ( " . 
			" 		select iduniverso from mc_calificacion_rs_SAT where MesReporte =" . CCGetParam("s_mes", date("m")-2) . " and AnioReporte = " . CCGetparam("s_anio",date("Y")) . ")) " ;
    		$db->query($sSQL);
    			
    	
    	
// -------------------------
//End Custom Code

//Close mc_universo_cds1_Button1_OnClick @112-43DB69F1
    return $mc_universo_cds1_Button1_OnClick;
}
//End Close mc_universo_cds1_Button1_OnClick

//mc_universo_cds1_BeforeShowRow @57-609D7D38
function mc_universo_cds1_BeforeShowRow(& $sender)
{
    $mc_universo_cds1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_universo_cds1; //Compatibility
//End mc_universo_cds1_BeforeShowRow

//Custom Code @84-2A29BDB7
// -------------------------
    if($mc_universo_cds1->descartar_manual->GetValue()==1){
    	$mc_universo_cds1->descartar_manual->SetValue("No Considerar");
    }
    $mc_universo_cds1->NumFila->SetValue($mc_universo_cds1->RowNumber);
    $mc_universo_cds1->TotalRecords->SetValue($mc_universo_cds1->DataSource->RecordsCount);
// -------------------------
//End Custom Code

//Close mc_universo_cds1_BeforeShowRow @57-C3502FFB
    return $mc_universo_cds1_BeforeShowRow;
}
//End Close mc_universo_cds1_BeforeShowRow


?>
