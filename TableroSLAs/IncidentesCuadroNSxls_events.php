<?php
//BindEvents Method @1-C86AC1B8
function BindEvents()
{
    global $grdIncCuadroNS;
    global $mc_calificacion_incidente;
    global $grdIncCuadroNS1;
    global $CCSEvents;
    $grdIncCuadroNS->CCSEvents["BeforeShowRow"] = "grdIncCuadroNS_BeforeShowRow";
    $grdIncCuadroNS->CCSEvents["BeforeShow"] = "grdIncCuadroNS_BeforeShow";
    $mc_calificacion_incidente->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_BeforeShow";
    $grdIncCuadroNS1->CCSEvents["BeforeShowRow"] = "grdIncCuadroNS1_BeforeShowRow";
    $grdIncCuadroNS1->CCSEvents["BeforeShow"] = "grdIncCuadroNS1_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//grdIncCuadroNS_BeforeShowRow @3-B30A1573
function grdIncCuadroNS_BeforeShowRow(& $sender)
{
    $grdIncCuadroNS_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdIncCuadroNS; //Compatibility
//End grdIncCuadroNS_BeforeShowRow

//Custom Code @32-2A29BDB7
// -------------------------
    global $sSLA ;
    if($sSLA == $grdIncCuadroNS->nombre->GetValue()){
    	$grdIncCuadroNS->nombre->SetValue("");
    } else {
    	$sSLA = $grdIncCuadroNS->nombre->GetValue();
    }
    if($grdIncCuadroNS->Suma->GetValue()>0){
    	$grdIncCuadroNS->PctCumplimiento->SetValue((($grdIncCuadroNS->Suma->GetValue()-$grdIncCuadroNS->Cumplen->GetValue())/$grdIncCuadroNS->Suma->GetValue()))  ;
    } else {
    	$grdIncCuadroNS->PctCumplimiento->SetValue(1)  ;
    }
    if($grdIncCuadroNS->Suma->GetValue()==0){
    	$grdIncCuadroNS->ImgCumple->SetValue("images/Left.png");
    	
    	$grdIncCuadroNS->Suma->SetValue("Sin Datos para<br>Medir");
    	$grdIncCuadroNS->Cumplen->SetValue("Sin Datos para<br>Medir");
    	$grdIncCuadroNS->PctCumplimiento->SetValue("Sin Datos para<br>Medir");
    } else {
	    if($grdIncCuadroNS->PctCumplimiento->GetValue()<($grdIncCuadroNS->Meta->GetValue()/100)){
	    	$grdIncCuadroNS->ImgCumple->SetValue("images/NoCumple.png");
	    } else {
	    	$grdIncCuadroNS->ImgCumple->SetValue("images/Cumple.png");
	    }
    }
    
    //dependiendo de la severidad se pone la pena
    if($grdIncCuadroNS->DataSource->f('nombre')=='Manejo de Incidentes (Tiempo de Solución)'){
	    switch($grdIncCuadroNS->severidad->GetValue()){
	    	case 0:
	    		$grdIncCuadroNS->pena->SetValue('20%');
	    		break;
	    	case 1:
	    		$grdIncCuadroNS->pena->SetValue('15%');
	    		break;
	    	case 2:
	    		$grdIncCuadroNS->pena->SetValue('10%');
	    		break;
	    	case 3:
	    		$grdIncCuadroNS->pena->SetValue('5%');
	    		break;
	    	case 4:
	    		$grdIncCuadroNS->pena->SetValue('5%');
	    		break;
	    	default:
	    		//$grdIncCuadroNS->pena->SetValue('20%');
		} 
    } 
    

    if($grdIncCuadroNS->DataSource->f('nombre')=='Manejo de Incidentes (Tiempo de Atención)'){
	    switch($grdIncCuadroNS->severidad->GetValue()){
	    	case 0:
	    		$grdIncCuadroNS->pena->SetValue('15%');
	    		break;
	    	case 1:
	    		$grdIncCuadroNS->pena->SetValue('10%');
	    		break;
	    	case 2:
	    		$grdIncCuadroNS->pena->SetValue('5%');
	    		break;
	    	case 3:
	    		$grdIncCuadroNS->pena->SetValue('5%');
	    		break;
	    	case 4:
	    		$grdIncCuadroNS->pena->SetValue('5%');
	    		break;
	    	default:
	    		//$grdIncCuadroNS->pena->SetValue('20%');
		} 
    } 
    
// -------------------------
//End Custom Code

//Close grdIncCuadroNS_BeforeShowRow @3-12C1AF6B
    return $grdIncCuadroNS_BeforeShowRow;
}
//End Close grdIncCuadroNS_BeforeShowRow

//grdIncCuadroNS_BeforeShow @3-9DA8F987
function grdIncCuadroNS_BeforeShow(& $sender)
{
    $grdIncCuadroNS_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdIncCuadroNS; //Compatibility
//End grdIncCuadroNS_BeforeShow

//Custom Code @39-2A29BDB7
// -------------------------
    
    //si no esta cerrado el mes de medición y no es CAPC no puede ver el cuadro CAPC    
    global $db;
    $db= new clsDBcnDisenio;
    $db->query("select  COUNT(*) from mc_universo_cds  where mes= " .CCGetParam("s_MesReporte",date('m')) . "  and anio = " .  CCGetParam("s_AnioReporte",date('Y')) . "and (Medido <>1 or Medido is null)");
	if($db->next_record()){
		if($db->f(0)> 0 && CCGetSession("GrupoValoracion","")!='CAPC' ){
	    	$grdIncCuadroNS->Visible =false;
	    } else {
	    	$grdIncCuadroNS->Visible =true;
		}
	}
// -------------------------
//End Custom Code

//Close grdIncCuadroNS_BeforeShow @3-DE50B52E
    return $grdIncCuadroNS_BeforeShow;
}
//End Close grdIncCuadroNS_BeforeShow

//mc_calificacion_incidente_BeforeShow @21-BCFAF919
function mc_calificacion_incidente_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_BeforeShow

//Custom Code @81-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio();
    $db->query("select month(cast(max(cast(anioreporte as varchar) + '-' + CAST(mesreporte as varchar) + '-01') as date)) " .
    	 ", year(cast(max(cast(anioreporte as varchar) + '-' + CAST(mesreporte as varchar) + '-01') as date)) from mc_calificacion_rs_MC");
    if($db->next_record()){
    	if(CCGetParam("s_MesReporte","")==""){
    		//$Grid2->s_MesReporte->SetValue($db->f(0));
    		$mc_calificacion_incidente->s_MesReporte->SetValue(date("m")-2);
    	}
    	if(CCGetParam("s_AnioReporte","")==""){
    		$mc_calificacion_incidente->s_AnioReporte->SetValue($db->f(1));
    		$mc_calificacion_incidente->s_AnioReporte->SetValue(date("Y"));
    	}
    }
    $db->close();

// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_BeforeShow @21-DB37D23A
    return $mc_calificacion_incidente_BeforeShow;
}
//End Close mc_calificacion_incidente_BeforeShow

//grdIncCuadroNS1_BeforeShowRow @40-10466D9B
function grdIncCuadroNS1_BeforeShowRow(& $sender)
{
    $grdIncCuadroNS1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdIncCuadroNS1; //Compatibility
//End grdIncCuadroNS1_BeforeShowRow

//Custom Code @56-2A29BDB7
// -------------------------
    global $sSLA ;
    if($sSLA == $grdIncCuadroNS1->nombre->GetValue()){
    	$grdIncCuadroNS1->nombre->SetValue("");
    } else {
    	$sSLA = $grdIncCuadroNS1->nombre->GetValue();
    }
    if($grdIncCuadroNS1->Suma->GetValue()>0){
    	$grdIncCuadroNS1->PctCumplimiento->SetValue((($grdIncCuadroNS1->Suma->GetValue()-$grdIncCuadroNS1->Cumplen->GetValue())/$grdIncCuadroNS1->Suma->GetValue()))  ;
    } else {
    	$grdIncCuadroNS1->PctCumplimiento->SetValue(1)  ;
    }
    if($grdIncCuadroNS1->Suma->GetValue()==0){
    	$grdIncCuadroNS1->ImgCumple->SetValue("images/Left.png");
    	
    	$grdIncCuadroNS1->Suma->SetValue("Sin Datos para<br>Medir");
    	$grdIncCuadroNS1->Cumplen->SetValue("Sin Datos para<br>Medir");
    	$grdIncCuadroNS1->PctCumplimiento->SetValue("Sin Datos para<br>Medir");
    } else {
	    if($grdIncCuadroNS1->PctCumplimiento->GetValue()<($grdIncCuadroNS1->Meta->GetValue()/100)){
	    	$grdIncCuadroNS1->ImgCumple->SetValue("images/NoCumple.png");
	    } else {
	    	$grdIncCuadroNS1->ImgCumple->SetValue("images/Cumple.png");
	    }
    }
    
        //dependiendo de la severidad se pone la pena
    if($grdIncCuadroNS1->DataSource->f('nombre')=='Manejo de Incidentes (Tiempo de Solución)'){
	    switch($grdIncCuadroNS1->severidad->GetValue()){
	    	case 0:
	    		$grdIncCuadroNS1->pena->SetValue('20%');
	    		break;
	    	case 1:
	    		$grdIncCuadroNS1->pena->SetValue('15%');
	    		break;
	    	case 2:
	    		$grdIncCuadroNS1->pena->SetValue('10%');
	    		break;
	    	case 3:
	    		$grdIncCuadroNS1->pena->SetValue('5%');
	    		break;
	    	case 4:
	    		$grdIncCuadroNS1->pena->SetValue('5%');
	    		break;
	    	default:
	    		//$grdIncCuadroNS->pena->SetValue('20%');
		} 
    } 
    

    if($grdIncCuadroNS1->DataSource->f('nombre')=='Manejo de Incidentes (Tiempo de Atención)'){
	    switch($grdIncCuadroNS1->severidad->GetValue()){
	    	case 0:
	    		$grdIncCuadroNS1->pena->SetValue('15%');
	    		break;
	    	case 1:
	    		$grdIncCuadroNS1->pena->SetValue('10%');
	    		break;
	    	case 2:
	    		$grdIncCuadroNS1->pena->SetValue('5%');
	    		break;
	    	case 3:
	    		$grdIncCuadroNS1->pena->SetValue('5%');
	    		break;
	    	case 4:
	    		$grdIncCuadroNS1->pena->SetValue('5%');
	    		break;
	    	default:
	    		//$grdIncCuadroNS->pena->SetValue('20%');
		} 
    } 

// -------------------------
//End Custom Code

//Close grdIncCuadroNS1_BeforeShowRow @40-D58117E4
    return $grdIncCuadroNS1_BeforeShowRow;
}
//End Close grdIncCuadroNS1_BeforeShowRow

//grdIncCuadroNS1_BeforeShow @40-694BA4A9
function grdIncCuadroNS1_BeforeShow(& $sender)
{
    $grdIncCuadroNS1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdIncCuadroNS1; //Compatibility
//End grdIncCuadroNS1_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close grdIncCuadroNS1_BeforeShow @40-EB5C1992
    return $grdIncCuadroNS1_BeforeShow;
}
//End Close grdIncCuadroNS1_BeforeShow

//Page_BeforeShow @1-5D260EA5
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidentesCuadroNSxls; //Compatibility
//End Page_BeforeShow

//Custom Code @36-2A29BDB7
// -------------------------
    global $sSLA;
    $sSLA="";
    
    global $mc_calificacion_incidente;
    $mc_calificacion_incidente->Visible=(CCGetSession("GrupoValoracion")=="CAPC" || CCGetSession("GrupoValoracion")=="SAT");
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
