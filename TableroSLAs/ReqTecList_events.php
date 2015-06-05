<?php
//BindEvents Method @1-146CBD2F
function BindEvents()
{
    global $grdDetalleRS;
    global $grdDetalleRS2;
    $grdDetalleRS->Grid1_TotalRecords->CCSEvents["BeforeShow"] = "grdDetalleRS_Grid1_TotalRecords_BeforeShow";
    $grdDetalleRS->ds->CCSEvents["BeforeExecuteSelect"] = "grdDetalleRS_ds_BeforeExecuteSelect";
    $grdDetalleRS->CCSEvents["BeforeShowRow"] = "grdDetalleRS_BeforeShowRow";
    $grdDetalleRS2->Grid1_TotalRecords->CCSEvents["BeforeShow"] = "grdDetalleRS2_Grid1_TotalRecords_BeforeShow";
    $grdDetalleRS2->ds->CCSEvents["BeforeExecuteSelect"] = "grdDetalleRS2_ds_BeforeExecuteSelect";
    $grdDetalleRS2->CCSEvents["BeforeShowRow"] = "grdDetalleRS2_BeforeShowRow";
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
	
	$grdDetalleRS->imgCumpleHE->Visible=($grdDetalleRS->HERR_EST_COST->GetValue()!="");
	$grdDetalleRS->imgCumpleRS->Visible=($grdDetalleRS->REQ_SERV->GetValue()!="");
	
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
	
	
	if (CCGetParam("s_id_proveedor")==4){
		$sProveedor ="3y4";
	} else {
		$sProveedor =CCGetParam("s_id_proveedor")-1;
	}
	if(CCGetParam("s_MesReporte")<10){
		$sMes = "0" . CCGetParam("s_MesReporte");
	} else {
		$sMes = CCGetParam("s_MesReporte");
	}
/*	
	if($grdDetalleRS->HERR_EST_COST->GetValue()!="" || $grdDetalleRS->REQ_SERV->GetValue()!="") {
		$grdDetalleRS->lkEvidencia->SetLink("http://satportal.dssat.sat.gob.mx/agcti/CAPC_ITERA/SDMA3/AdmonContrato/CAPC/Entregables_C/" . CCGetParam("s_AnioReporte","") . $sMes .  "/MC/Evidencia_CDS" . $sProveedor  . "/"); 
		// . $grdDetalleRS->id_ppmc->GetValue() . "_A.doc");
	} else {
		$grdDetalleRS->lkEvidencia->SetLink("http://satportal.dssat.sat.gob.mx/agcti/CAPC_ITERA/SDMA3/AdmonContrato/CAPC/Entregables_C/" . CCGetParam("s_AnioReporte","") . $sMes .  "/MC/Evidencia_CDS" . $sProveedor  . "/"); 
		//. $grdDetalleRS->id_ppmc->GetValue() . "_C.doc");
	}
	
	if($grdDetalleRS->DataSource->f("medido")==1 || CCGetSession("GrupoValoracion")=="CAPC"){
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
		*/
// -------------------------
//End Custom Code

//Close grdDetalleRS_BeforeShowRow @3-B4FEBB28
    return $grdDetalleRS_BeforeShowRow;
}
//End Close grdDetalleRS_BeforeShowRow

//grdDetalleRS2_Grid1_TotalRecords_BeforeShow @124-32B72AAB
function grdDetalleRS2_Grid1_TotalRecords_BeforeShow(& $sender)
{
    $grdDetalleRS2_Grid1_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS2; //Compatibility
//End grdDetalleRS2_Grid1_TotalRecords_BeforeShow

//Retrieve number of records @125-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close grdDetalleRS2_Grid1_TotalRecords_BeforeShow @124-3FB59955
    return $grdDetalleRS2_Grid1_TotalRecords_BeforeShow;
}
//End Close grdDetalleRS2_Grid1_TotalRecords_BeforeShow

//grdDetalleRS2_ds_BeforeExecuteSelect @123-7C33B862
function grdDetalleRS2_ds_BeforeExecuteSelect(& $sender)
{
    $grdDetalleRS2_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS2; //Compatibility
//End grdDetalleRS2_ds_BeforeExecuteSelect

//Custom Code @164-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close grdDetalleRS2_ds_BeforeExecuteSelect @123-FF52F32F
    return $grdDetalleRS2_ds_BeforeExecuteSelect;
}
//End Close grdDetalleRS2_ds_BeforeExecuteSelect

//grdDetalleRS2_BeforeShowRow @123-E55106AA
function grdDetalleRS2_BeforeShowRow(& $sender)
{
    $grdDetalleRS2_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS2; //Compatibility
//End grdDetalleRS2_BeforeShowRow

//Custom Code @165-2A29BDB7
// -------------------------
	$grdDetalleRS2->CUMPL_REQ_FUNC->Visible=false;
	$grdDetalleRS2->CALIDAD_PROD_TERM->Visible=false;
	$grdDetalleRS2->RETR_ENTREGABLE->Visible=false;
	$grdDetalleRS2->COMPL_RUTA_CRITICA->Visible=false;
	$grdDetalleRS2->EST_PROY->Visible=false;
	$grdDetalleRS2->DEF_FUG_AMB_PROD->Visible=false;
	
	$grdDetalleRS2->imgCUMPL_REQ_FUNC->Visible=($grdDetalleRS2->CUMPL_REQ_FUNC->GetValue()!="");
	$grdDetalleRS2->imgCALIDAD_PROD_TERM->Visible=($grdDetalleRS2->CALIDAD_PROD_TERM->GetValue()!="");
	$grdDetalleRS2->imgRETR_ENTREGABLE->Visible=($grdDetalleRS2->RETR_ENTREGABLE->GetValue()!="");
	$grdDetalleRS2->imgCOMPL_RUTA_CRITICA->Visible=($grdDetalleRS2->COMPL_RUTA_CRITICA->GetValue()!="");
	$grdDetalleRS2->imgEST_PROY->Visible=($grdDetalleRS2->EST_PROY->GetValue()!="");
	$grdDetalleRS2->imgDEF_FUG_AMB_PROD->Visible=($grdDetalleRS2->DEF_FUG_AMB_PROD->GetValue()!="");
	
	if($grdDetalleRS2->CUMPL_REQ_FUNC->GetValue()){
		$grdDetalleRS2->imgCUMPL_REQ_FUNC->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS2->imgCUMPL_REQ_FUNC->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS2->CALIDAD_PROD_TERM->GetValue()){
		$grdDetalleRS2->imgCALIDAD_PROD_TERM->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS2->imgCALIDAD_PROD_TERM->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS2->RETR_ENTREGABLE->GetValue()){
		$grdDetalleRS2->imgRETR_ENTREGABLE->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS2->imgRETR_ENTREGABLE->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS2->COMPL_RUTA_CRITICA->GetValue()){
		$grdDetalleRS2->imgCOMPL_RUTA_CRITICA->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS2->imgCOMPL_RUTA_CRITICA->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS2->EST_PROY->GetValue()){
		$grdDetalleRS2->imgEST_PROY->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS2->imgEST_PROY->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS2->DEF_FUG_AMB_PROD->GetValue()){
		$grdDetalleRS2->imgDEF_FUG_AMB_PROD->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS2->imgDEF_FUG_AMB_PROD->SetValue("images/NoCumple.png");
	}
	
	
	if (CCGetParam("s_id_proveedor")==4){
		$sProveedor ="3y4";
	} else {
		$sProveedor =CCGetParam("s_id_proveedor")-1;
	}
	if(CCGetParam("s_MesReporte")<10){
		$sMes = "0" . CCGetParam("s_MesReporte");
	} else {
		$sMes = CCGetParam("s_MesReporte");
	}

// -------------------------
//End Custom Code

//Close grdDetalleRS2_BeforeShowRow @123-6968635E
    return $grdDetalleRS2_BeforeShowRow;
}
//End Close grdDetalleRS2_BeforeShowRow
?>
