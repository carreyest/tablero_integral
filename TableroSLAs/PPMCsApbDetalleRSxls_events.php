<?php
//BindEvents Method @1-5B0BA769
function BindEvents()
{
    global $grdDetalleRS;
    global $CCSEvents;
    $grdDetalleRS->Grid1_TotalRecords->CCSEvents["BeforeShow"] = "grdDetalleRS_Grid1_TotalRecords_BeforeShow";
    $grdDetalleRS->ds->CCSEvents["BeforeExecuteSelect"] = "grdDetalleRS_ds_BeforeExecuteSelect";
    $grdDetalleRS->CCSEvents["BeforeShowRow"] = "grdDetalleRS_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//grdDetalleRS_Grid1_TotalRecords_BeforeShow @4-BB6833FC
function grdDetalleRS_Grid1_TotalRecords_BeforeShow(& $sender)
{
    $grdDetalleRS_Grid1_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS; //Compatibility
//End grdDetalleRS_Grid1_TotalRecords_BeforeShow

//Retrieve number of records @5-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close grdDetalleRS_Grid1_TotalRecords_BeforeShow @4-4F1A7186
    return $grdDetalleRS_Grid1_TotalRecords_BeforeShow;
}
//End Close grdDetalleRS_Grid1_TotalRecords_BeforeShow

//grdDetalleRS_ds_BeforeExecuteSelect @3-4AA6CEE4
function grdDetalleRS_ds_BeforeExecuteSelect(& $sender)
{
    $grdDetalleRS_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS; //Compatibility
//End grdDetalleRS_ds_BeforeExecuteSelect

//Custom Code @40-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close grdDetalleRS_ds_BeforeExecuteSelect @3-8BAB682E
    return $grdDetalleRS_ds_BeforeExecuteSelect;
}
//End Close grdDetalleRS_ds_BeforeExecuteSelect

//grdDetalleRS_BeforeShowRow @3-443CB4DF
function grdDetalleRS_BeforeShowRow(& $sender)
{
    $grdDetalleRS_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS; //Compatibility
//End grdDetalleRS_BeforeShowRow

//Custom Code @46-2A29BDB7
// -------------------------
	$grdDetalleRS->HERR_EST_COST->Visible=false;
	$grdDetalleRS->REQ_SERV->Visible=false;
	$grdDetalleRS->CUMPL_REQ_FUNC->Visible=false;
	$grdDetalleRS->CALIDAD_PROD_TERM->Visible=false;
	$grdDetalleRS->RETR_ENTREGABLE->Visible=false;
	$grdDetalleRS->COMPL_RUTA_CRITICA->Visible=false;
	$grdDetalleRS->EST_PROY->Visible=false;
	$grdDetalleRS->DEF_FUG_AMB_PROD->Visible=false;
	
	/*
	$grdDetalleRS->imgCumpleHE->Visible=true;
	$grdDetalleRS->imgCumpleRS->Visible=true;
	$grdDetalleRS->imgCUMPL_REQ_FUNC->Visible=true;
	$grdDetalleRS->imgCALIDAD_PROD_TERM->Visible=true;
	$grdDetalleRS->imgRETR_ENTREGABLE->Visible=true;
	$grdDetalleRS->imgCOMPL_RUTA_CRITICA->Visible=true;
	$grdDetalleRS->imgEST_PROY->Visible=true;
	$grdDetalleRS->imgDEF_FUG_AMB_PROD->Visible=true;
	*/
	$grdDetalleRS->imgCumpleHE->Visible=($grdDetalleRS->HERR_EST_COST->GetValue()!="");
	$grdDetalleRS->imgCumpleRS->Visible=($grdDetalleRS->REQ_SERV->GetValue()!="");
	$grdDetalleRS->imgCUMPL_REQ_FUNC->Visible=($grdDetalleRS->CUMPL_REQ_FUNC->GetValue()!="");
	$grdDetalleRS->imgCALIDAD_PROD_TERM->Visible=($grdDetalleRS->CALIDAD_PROD_TERM->GetValue()!="");
	$grdDetalleRS->imgRETR_ENTREGABLE->Visible=($grdDetalleRS->RETR_ENTREGABLE->GetValue()!="");
	//$grdDetalleRS->imgCOMPL_RUTA_CRITICA->Visible=($grdDetalleRS->COMPL_RUTA_CRITICA->GetValue()!="");
	//$grdDetalleRS->imgEST_PROY->Visible=($grdDetalleRS->EST_PROY->GetValue()!="");
	$grdDetalleRS->imgDEF_FUG_AMB_PROD->Visible=($grdDetalleRS->DEF_FUG_AMB_PROD->GetValue()!="");
	
	if($grdDetalleRS->HERR_EST_COST->GetValue()){
		$grdDetalleRS->imgCumpleHE->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS->imgCumpleHE->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS->REQ_SERV->GetValue()){
		$grdDetalleRS->imgCumpleRS->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS->imgCumpleRS->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS->CUMPL_REQ_FUNC->GetValue()){
		$grdDetalleRS->imgCUMPL_REQ_FUNC->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS->imgCUMPL_REQ_FUNC->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS->CALIDAD_PROD_TERM->GetValue()){
		$grdDetalleRS->imgCALIDAD_PROD_TERM->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS->imgCALIDAD_PROD_TERM->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS->RETR_ENTREGABLE->GetValue()){
		$grdDetalleRS->imgRETR_ENTREGABLE->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS->imgRETR_ENTREGABLE->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS->CAL_COD->GetValue()){
		switch($grdDetalleRS->CAL_COD->GetValue()){
			case -1: $imagen_calcod="images/noaplica.png";
			case  0: $imagen_calcod="images/NoCumple.png";
			case  1: $imagen_calcod="images/Cumple.png";
		}	
		$grdDetalleRS->imgCAL_COD->SetValue($imagen_calcod);
	} else {
		$grdDetalleRS->imgCAL_COD->SetValue("images/noaplica.png");
	}


	/*
	if($grdDetalleRS->COMPL_RUTA_CRITICA->GetValue()){
		$grdDetalleRS->imgCOMPL_RUTA_CRITICA->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS->imgCOMPL_RUTA_CRITICA->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS->EST_PROY->GetValue()){
		$grdDetalleRS->imgEST_PROY->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS->imgEST_PROY->SetValue("images/NoCumple.png");
	}
	*/
	if($grdDetalleRS->DEF_FUG_AMB_PROD->GetValue()){
		$grdDetalleRS->imgDEF_FUG_AMB_PROD->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS->imgDEF_FUG_AMB_PROD->SetValue("images/NoCumple.png");
	}
	
	
//	if (CCGetParam("s_id_proveedor")==4){
//		$sProveedor ="3y4";
//	} else {
//		$sProveedor =CCGetParam("s_id_proveedor")-1;
//	}
	
	
	switch (CCGetParam("s_id_proveedor")){
	case 1 : $sProveedor = 'Evidencia_CAPC';break;
	case 2 : $sProveedor = 'Evidencias_CDS1y3';break;
	case 3 : $sProveedor = 'Evidencias_CDS2';break;
	default: $sProveedor = 'Evidencias_CAPC';break;		
	}

	if(CCGetParam("s_MesReporte")<10){
		$sMes = "0" . CCGetParam("s_MesReporte");
	} else {
		$sMes = CCGetParam("s_MesReporte");
	}
	
	if($grdDetalleRS->HERR_EST_COST->GetValue()!="" || $grdDetalleRS->REQ_SERV->GetValue()!="") {
		$grdDetalleRS->lkEvidencia->SetLink("http://satportal.dssat.sat.gob.mx/agcti/SDMA4-Admvo/Documentos compartidos/Operación del Servicio/Itera/" . CCGetParam("s_AnioReporte","") . $sMes . "/EntregablesPeriódicos/NivelesServicio/". $sProveedor ."/");
		// . $grdDetalleRS->id_ppmc->GetValue() . "_A.doc");
	} else {
		$grdDetalleRS->lkEvidencia->SetLink("http://satportal.dssat.sat.gob.mx/agcti/SDMA4-Admvo/Documentos compartidos/Operación del Servicio/Itera/" . CCGetParam("s_AnioReporte","") . $sMes . "/EntregablesPeriódicos/NivelesServicio/". $sProveedor ."/");		
		//. $grdDetalleRS->id_ppmc->GetValue() . "_C.doc");
	}
	
	if(CCGetParam("s_AnioReporte",0)<2014){
		$grdDetalleRS->id_ppmc->SetLink($grdDetalleRS->lkEvidencia->GetLink());
	}
	
	if($grdDetalleRS->DataSource->f("medido")==1 || CCGetSession("GrupoValoracion")=="CAPC" || CCGetParam("s_AnioReporte",0)<2014){
		$grdDetalleRS->Panel1->Visible=true;
	} else {
		$grdDetalleRS->Panel1->Visible=false;
	}
	
	//si tiene datos en el mes que fue trascicionado le pone la leyenda "Pendiente de Medicióon"
	if($grdDetalleRS->DataSource->f("mestransicion")!="" && $grdDetalleRS->DataSource->f("mestransicion") != CCGetParam("s_MesReporte")){
		$grdDetalleRS->DEF_FUG_AMB_PROD->Visible=true;
		$grdDetalleRS->DEF_FUG_AMB_PROD->SetValue("Pendiente de Medición");
		$grdDetalleRS->imgDEF_FUG_AMB_PROD->Visible= false;
	}
	
	//si es RT lo arega
	$grdDetalleRS->lkRT->Visible= ($grdDetalleRS->DataSource->f("EsReqTecnico")==1);
	
// -------------------------
//End Custom Code

//Close grdDetalleRS_BeforeShowRow @3-B4FEBB28
    return $grdDetalleRS_BeforeShowRow;
}
//End Close grdDetalleRS_BeforeShowRow

//Page_BeforeShow @1-498315D6
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsApbDetalleRSxls; //Compatibility
//End Page_BeforeShow

//Custom Code @121-2A29BDB7
// -------------------------
    global $grdDetalleRS1;
    $grdDetalleRS1->Visible =(CCGetSession("GrupoValoración")=="CAPC");

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
