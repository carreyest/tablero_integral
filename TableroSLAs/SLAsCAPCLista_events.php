<?php
//BindEvents Method @1-77F2B125
function BindEvents()
{
    global $mc_c_ServContractual_mc_c;
    global $CCSEvents;
    $mc_c_ServContractual_mc_c->CCSEvents["BeforeShowRow"] = "mc_c_ServContractual_mc_c_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["BeforeOutput"] = "Page_BeforeOutput";
}
//End BindEvents Method

//mc_c_ServContractual_mc_c_BeforeShowRow @3-0196D746
function mc_c_ServContractual_mc_c_BeforeShowRow(& $sender)
{
    $mc_c_ServContractual_mc_c_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_ServContractual_mc_c; //Compatibility
//End mc_c_ServContractual_mc_c_BeforeShowRow

//Custom Code @46-2A29BDB7
// -------------------------

    global $aPPMCsAPbIdsCAPC;
    global $aPPMCsAPbValuesCAPC;

    array_push($aPPMCsAPbIdsCAPC,$mc_c_ServContractual_mc_c->DataSource->f("id"));
    array_push($aPPMCsAPbValuesCAPC,$mc_c_ServContractual_mc_c->DataSource->f("numero"));

	if($mc_c_ServContractual_mc_c->Descripcion->GetValue()==""){
		$mc_c_ServContractual_mc_c->Descripcion->SetValue($mc_c_ServContractual_mc_c->DataSource->f("Name"));
	}
	
	if($mc_c_ServContractual_mc_c->DataSource->f("TipoMedicion")=="PC"){
		$mc_c_ServContractual_mc_c->numero->SetLink('SLAsCapcDetalle.php?'. CCAddParam("","id",$mc_c_ServContractual_mc_c->DataSource->f("id")) );
	} 
	
    if($mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->Visible=true;
		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->Visible=false;	
		if($mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->Visible=false;
		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->Visible=true;
		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->SetValue("No&nbsp;Aplica");
    }
    
    if($mc_c_ServContractual_mc_c->DEDUC_OMISION->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->Visible=true;
		$mc_c_ServContractual_mc_c->DEDUC_OMISION->Visible=false;	
		if($mc_c_ServContractual_mc_c->DEDUC_OMISION->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->Visible=false;
		$mc_c_ServContractual_mc_c->DEDUC_OMISION->Visible=true;
		$mc_c_ServContractual_mc_c->DEDUC_OMISION->SetValue("No&nbsp;Aplica");
	}
	
	/*
    if($mc_c_ServContractual_mc_c->EFIC_PRESUP->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->Visible=true;
		$mc_c_ServContractual_mc_c->EFIC_PRESUP->Visible=false;	
		if($mc_c_ServContractual_mc_c->EFIC_PRESUP->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->Visible=false;
		$mc_c_ServContractual_mc_c->EFIC_PRESUP->Visible=true;
		$mc_c_ServContractual_mc_c->EFIC_PRESUP->SetValue("No&nbsp;Aplica");
	}
	*/

    if($mc_c_ServContractual_mc_c->RETR_ENTREGABLE->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->Visible=true;
		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->Visible=false;	
		if($mc_c_ServContractual_mc_c->RETR_ENTREGABLE->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->Visible=false;
		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->Visible=true;
		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->SetValue("No&nbsp;Aplica");
	}
	
	//nuevos para el SDMA4
	if($mc_c_ServContractual_mc_c->HERR_EST_COST->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->Visible=true;
		$mc_c_ServContractual_mc_c->HERR_EST_COST->Visible=false;	
		if($mc_c_ServContractual_mc_c->HERR_EST_COST->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->Visible=false;
		$mc_c_ServContractual_mc_c->HERR_EST_COST->Visible=true;
		$mc_c_ServContractual_mc_c->HERR_EST_COST->SetValue("No&nbsp;Aplica");
	}
	
	if($mc_c_ServContractual_mc_c->REQ_SERV->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_REQ_SERV->Visible=true;
		$mc_c_ServContractual_mc_c->REQ_SERV->Visible=false;	
		if($mc_c_ServContractual_mc_c->REQ_SERV->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_REQ_SERV->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_REQ_SERV->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_REQ_SERV->Visible=false;
		$mc_c_ServContractual_mc_c->REQ_SERV->Visible=true;
		$mc_c_ServContractual_mc_c->REQ_SERV->SetValue("No&nbsp;Aplica");
	}
	
	if($mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->Visible=true;
		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->Visible=false;	
		if($mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->Visible=false;
		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->Visible=true;
		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->SetValue("No&nbsp;Aplica");
	}

 
/*
 	global $link_HERR_EST_COST;
 	global $link_REQ_SERV;
 	global $link_CUMPL_REQ_FUN;
 	global $link_CALIDAD_PROD_TERM;
 	global $link_DEDUC_OMISION;
 	global $link_RETR_ENTREGABLE;


 	$link_HERR_EST_COST=$mc_c_ServContractual_mc_c->HERR_EST_COST->GetLink();
 	$link_REQ_SERV=$mc_c_ServContractual_mc_c->REQ_SERV->GetLink();
 	$link_CUMPL_REQ_FUN=$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->GetLink();
 	$link_CALIDAD_PROD_TERM=$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->GetLink();
 	$link_DEDUC_OMISION=$mc_c_ServContractual_mc_c->DEDUC_OMISION->GetLink();
 	$link_RETR_ENTREGABLE=$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->GetLink();

	if($mc_c_ServContractual_mc_c->DataSource->f("TipoMedicion")=="PC"){
		$mc_c_ServContractual_mc_c->HERR_EST_COST->SetLink('');
		$mc_c_ServContractual_mc_c->REQ_SERV->SetLink('');
		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->SetLink($link_CUMPL_REQ_FUN);
		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->SetLink($link_CALIDAD_PROD_TERM);
		$mc_c_ServContractual_mc_c->DEDUC_OMISION->SetLink($link_DEDUC_OMISION);
		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->SetLink($link_RETR_ENTREGABLE);

	} 
	else {	
		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->SetLink('');
		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->SetLink('');
		$mc_c_ServContractual_mc_c->DEDUC_OMISION->SetLink('');
		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->SetLink('');
		$mc_c_ServContractual_mc_c->HERR_EST_COST->SetLink($link_HERR_EST_COST);
		$mc_c_ServContractual_mc_c->REQ_SERV->SetLink($link_REQ_SERV);

	}
*/
		
// -------------------------
//End Custom Code

//Close mc_c_ServContractual_mc_c_BeforeShowRow @3-A587CB49
    return $mc_c_ServContractual_mc_c_BeforeShowRow;
}
//End Close mc_c_ServContractual_mc_c_BeforeShowRow

//Page_BeforeShow @1-FEDEC8E4
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SLAsCAPCLista; //Compatibility
//End Page_BeforeShow

//Custom Code @73-2A29BDB7
// -------------------------
	global $aPPMCsAPbIdsCAPC;
    global $aPPMCsAPbValuesCAPC;
  	
  	$aPPMCsAPbIdsCAPC= array();
	$aPPMCsAPbValuesCAPC = array();

    global $mc_calificacion_capc;
	$mc_calificacion_capc->Visible=(CCGetSession("GrupoValoracion")=="CAPC");
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeOutput @1-9723EDE2
function Page_BeforeOutput(& $sender)
{
    $Page_BeforeOutput = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SLAsCAPCLista; //Compatibility
//End Page_BeforeOutput

//Custom Code @125-2A29BDB7
// -------------------------
    // Write your own code here.
	global $aPPMCsAPbIdsCAPC;
    global $aPPMCsAPbValuesCAPC;
  	
	CCSetSession("aPPMCsAPbIdsCAPC",serialize($aPPMCsAPbIdsCAPC));
	CCSetSession("aPPMCsAPbValuesCAPC",serialize($aPPMCsAPbValuesCAPC));

// -------------------------
//End Custom Code

//Close Page_BeforeOutput @1-8964C188
    return $Page_BeforeOutput;
}
//End Close Page_BeforeOutput


?>
