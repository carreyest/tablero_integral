<?php
//BindEvents Method @1-C36BE970
function BindEvents()
{
    global $Grid1;
    global $Grid2;
    global $CCSEvents;
    $Grid1->CCSEvents["BeforeShowRow"] = "Grid1_BeforeShowRow";
    $Grid1->CCSEvents["BeforeShow"] = "Grid1_BeforeShow";
    $Grid2->CCSEvents["BeforeShowRow"] = "Grid2_BeforeShowRow";
    $Grid2->CCSEvents["BeforeShow"] = "Grid2_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Grid1_BeforeShowRow @3-FCC1FF76
function Grid1_BeforeShowRow(& $sender)
{
    $Grid1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
//End Grid1_BeforeShowRow

//Custom Code @18-2A29BDB7
// -------------------------
    if($Grid1->SumaApb->GetValue()>0){
    	$Grid1->Cumplimiento->SetValue(number_format((($Grid1->SumaApb->GetValue()-$Grid1->incumplimientos->GetValue())/$Grid1->SumaApb->GetValue())*100 ),0)  ;
    	if($Grid1->Cumplimiento->GetValue()<$Grid1->Meta->GetValue()){
	    	$Grid1->Indicador->SetValue("images/NoCumple.png");
	    } else {
	    	$Grid1->Indicador->SetValue("images/Cumple.png");
	    }
    } else {
    	$Grid1->SumaApb->SetValue("Sin datos para<br>medir");
    	$Grid1->Cumplimiento->SetValue("Sin datos para<br>medir");
    	$Grid1->incumplimientos->SetValue("Sin datos para<br>medir");
    	$Grid1->Indicador->SetValue("images/left.png");
    }
    
// -------------------------
//End Custom Code

//Close Grid1_BeforeShowRow @3-23E47D26
    return $Grid1_BeforeShowRow;
}
//End Close Grid1_BeforeShowRow

//Grid1_BeforeShow @3-706857BD
function Grid1_BeforeShow(& $sender)
{
    $Grid1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
//End Grid1_BeforeShow

//Custom Code @51-2A29BDB7
// -------------------------
    
    //si no esta cerrado el mes de medición y no es CAPC no puede ver el cuadro CAPC    
    global $db;
    $db= new clsDBcnDisenio;
    $db->query("select  COUNT(*) from mc_universo_cds  where mes= " .CCGetParam("s_MesReporte",date('m')) . "  and anio = " .  CCGetParam("s_AnioReporte",date('Y')) . " and (Medido <>1 or Medido is null)");
	if($db->next_record()){
		if($db->f(0)> 0 && CCGetSession("GrupoValoracion","")!='CAPC' ){
	    	$Grid1->Visible =false;
	    } else {
	    	$Grid1->Visible =true;
		}
	}
// -------------------------
//End Custom Code

//Close Grid1_BeforeShow @3-C0F58113
    return $Grid1_BeforeShow;
}
//End Close Grid1_BeforeShow

//Grid2_BeforeShowRow @52-3751ABF8
function Grid2_BeforeShowRow(& $sender)
{
    $Grid2_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_BeforeShowRow

//Custom Code @66-2A29BDB7
// -------------------------
    if($Grid2->SumaApb->GetValue()>0){
    	$Grid2->Cumplimiento->SetValue(number_format((($Grid2->SumaApb->GetValue()-$Grid2->incumplimientos->GetValue())/$Grid2->SumaApb->GetValue())*100 ),0)  ;
    	if($Grid2->Cumplimiento->GetValue()<$Grid2->Meta->GetValue()){
	    	$Grid2->Indicador->SetValue("images/NoCumple.png");
	    } else {
	    	$Grid2->Indicador->SetValue("images/Cumple.png");
	    }
    } else {
    	$Grid2->SumaApb->SetValue("Sin datos para<br>medir");
    	$Grid2->Cumplimiento->SetValue("Sin datos para<br>medir");
    	$Grid2->incumplimientos->SetValue("Sin datos para<br>medir");
    	$Grid2->Indicador->SetValue("images/left.png");
    }
    
// -------------------------
//End Custom Code

//Close Grid2_BeforeShowRow @52-707E26A2
    return $Grid2_BeforeShowRow;
}
//End Close Grid2_BeforeShowRow

//Grid2_BeforeShow @52-F39F333E
function Grid2_BeforeShow(& $sender)
{
    $Grid2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_BeforeShow

//Custom Code @67-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close Grid2_BeforeShow @52-BC94A4C8
    return $Grid2_BeforeShow;
}
//End Close Grid2_BeforeShow

//Page_BeforeShow @1-201FFBD8
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsApbCuadroNSRSxls; //Compatibility
//End Page_BeforeShow

//Custom Code @83-2A29BDB7
// -------------------------
    global $mc_calificacion_rs_MC;
    $mc_calificacion_rs_MC->Visible = (CCGetSession("GrupoValoracion")=="CAPC" || CCGetSession("GrupoValoracion")=="SAT");
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
