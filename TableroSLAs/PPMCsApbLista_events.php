<?php
//BindEvents Method @1-F909BCBE
function BindEvents()
{
    global $grdReqsApertura;
    global $grsBusca;
    global $CCSEvents;
    $grdReqsApertura->CCSEvents["BeforeShowRow"] = "grdReqsApertura_BeforeShowRow";
    $grsBusca->s_anioparam->ds->CCSEvents["BeforeBuildSelect"] = "grsBusca_s_anioparam_ds_BeforeBuildSelect";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["BeforeOutput"] = "Page_BeforeOutput";
}
//End BindEvents Method

//grdReqsApertura_BeforeShowRow @3-0BB07370
function grdReqsApertura_BeforeShowRow(& $sender)
{
    $grdReqsApertura_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdReqsApertura; //Compatibility
//End grdReqsApertura_BeforeShowRow

//Custom Code @37-2A29BDB7
// -------------------------
    global $aPPMCsAPbIds;
    global $aPPMCsAPbValues;
  	array_push($aPPMCsAPbIds,$grdReqsApertura->ds->f("Id"));
  	array_push($aPPMCsAPbValues,$grdReqsApertura->ds->f("ID_PPMC"));
	$grdReqsApertura->imgCumpleHE->Visible=true;
	$grdReqsApertura->imgCumpleRS->Visible=true;
	
	$grdReqsApertura->HERR_EST_COST->Visible=false;
	$grdReqsApertura->REQ_SERV->Visible=false;
	
	if($grdReqsApertura->HERR_EST_COST->GetValue()!=""){
		$grdReqsApertura->imgCumpleHE->Visible=true;
	} else {
		$grdReqsApertura->imgCumpleHE->Visible=false;
		if($grdReqsApertura->FechaEntregaPropuesta->GetValue()!=""){
			$grdReqsApertura->HERR_EST_COST->Visible=true;
			$grdReqsApertura->HERR_EST_COST->SetValue("No Aplica");
			}
	}
	
	if($grdReqsApertura->REQ_SERV->GetValue()!=""){
		$grdReqsApertura->imgCumpleRS->Visible=true;
	} else {
		$grdReqsApertura->imgCumpleRS->Visible=false;
		if($grdReqsApertura->FechaEntregaPropuesta->GetValue()!=""){
			$grdReqsApertura->REQ_SERV->Visible=true;
			$grdReqsApertura->REQ_SERV->SetValue("No Aplica");
			}
	}
	
	if($grdReqsApertura->HERR_EST_COST->GetValue()==1){
		$grdReqsApertura->imgCumpleHE->SetValue("images/Cumple.png");
	} else {
		$grdReqsApertura->imgCumpleHE->SetValue("images/NoCumple.png");
	}
	if($grdReqsApertura->REQ_SERV->GetValue()==1){
		$grdReqsApertura->imgCumpleRS->SetValue("images/Cumple.png");
	} else {
		$grdReqsApertura->imgCumpleRS->SetValue("images/NoCumple.png");
	}
	
	if($grdReqsApertura->DataSource->f("EsReqTecnico")==1){
		$grdReqsApertura->ReqTec->SetValue("MM-RT");
	} else {
		$grdReqsApertura->ReqTec->SetValue("");
	}
	
	if(CCGetSession("GrupoValoracion")!="CAPC"){
		$grdReqsApertura->Analista->Visible=false;	
		$grdReqsApertura->lAnalista->Visible=false;
	}
// -------------------------
//End Custom Code

//Close grdReqsApertura_BeforeShowRow @3-378CA860
    return $grdReqsApertura_BeforeShowRow;
}
//End Close grdReqsApertura_BeforeShowRow

//grsBusca_s_anioparam_ds_BeforeBuildSelect @30-96478862
function grsBusca_s_anioparam_ds_BeforeBuildSelect(& $sender)
{
    $grsBusca_s_anioparam_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grsBusca; //Compatibility
//End grsBusca_s_anioparam_ds_BeforeBuildSelect

//Custom Code @122-2A29BDB7
// -------------------------
    if(CCGetSession("GrupoValoracion","")=="CAPC"){
    	$Grid2->s_anioparam->DataSource->SQL="select * from mc_c_anio";
    	$Grid2->s_anioparam->DataSource->Where="";
    }
// -------------------------
//End Custom Code

//Close grsBusca_s_anioparam_ds_BeforeBuildSelect @30-D9F0FC3A
    return $grsBusca_s_anioparam_ds_BeforeBuildSelect;
}
//End Close grsBusca_s_anioparam_ds_BeforeBuildSelect

//Page_BeforeShow @1-B8DEABEB
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsApbLista; //Compatibility
//End Page_BeforeShow

//Custom Code @38-2A29BDB7
// -------------------------
    global $aPPMCsAPbIds;
    global $aPPMCsAPbValues;
  	
  	$aPPMCsAPbIds= array();
	$aPPMCsAPbValues = array();
	
	global $Grid2;
	$Grid2->Visible=(CCGetSession("GrupoValoracion")=="CAPC");
	
	
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeOutput @1-D1238EED
function Page_BeforeOutput(& $sender)
{
    $Page_BeforeOutput = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsApbLista; //Compatibility
//End Page_BeforeOutput

//Custom Code @39-2A29BDB7
// -------------------------
	global $aPPMCsAPbIds;
    global $aPPMCsAPbValues;
  	
	CCSetSession("aPPMCsAPbIds",serialize($aPPMCsAPbIds));
	CCSetSession("aPPMCsAPbValues",serialize($aPPMCsAPbValues));
// -------------------------
//End Custom Code

//Close Page_BeforeOutput @1-8964C188
    return $Page_BeforeOutput;
}
//End Close Page_BeforeOutput


?>
