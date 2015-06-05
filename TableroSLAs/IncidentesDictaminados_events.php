<?php
//BindEvents Method @1-BF19E44B
function BindEvents()
{
    global $grdIncidentes;
    $grdIncidentes->CCSEvents["BeforeShowRow"] = "grdIncidentes_BeforeShowRow";
    $grdIncidentes->CCSEvents["BeforeShow"] = "grdIncidentes_BeforeShow";
}
//End BindEvents Method

//grdIncidentes_BeforeShowRow @2-8A8DA2A4
function grdIncidentes_BeforeShowRow(& $sender)
{
    $grdIncidentes_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdIncidentes; //Compatibility
//End grdIncidentes_BeforeShowRow

//Set Row Style @13-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @55-2A29BDB7
// -------------------------
    if($grdIncidentes->Cumple_Inc_TiempoAsignacion->GetValue()==1){
    	$grdIncidentes->imgTiempoAsignacion->SetValue("images/Cumple.png");
    } else {
    	$grdIncidentes->imgTiempoAsignacion->SetValue("images/NoCumple.png"); 
    }
    if($grdIncidentes->Cumple_DISP_SOPORTE->GetValue()==1){
    	$grdIncidentes->imgDISPSOPORTE->SetValue("images/Cumple.png");
    } else {
    	$grdIncidentes->imgDISPSOPORTE->SetValue("images/NoCumple.png"); 
    }
    if($grdIncidentes->Cumple_Inc_TiempoSolucion->GetValue()==1){
    	$grdIncidentes->ImgTiempoSolucion->SetValue("images/Cumple.png");
    } else {
    	$grdIncidentes->ImgTiempoSolucion->SetValue("images/NoCumple.png"); 
    }
	/*
	if($grdIncidentes->descartar->GetValue()=="1"){
    	$grdIncidentes->descartar->SetValue("Si");
    } else {
    	$grdIncidentes->descartar->SetValue("No"); 
    }
    */
// -------------------------
//End Custom Code

//Close grdIncidentes_BeforeShowRow @2-8BDCECAE
    return $grdIncidentes_BeforeShowRow;
}
//End Close grdIncidentes_BeforeShowRow

//grdIncidentes_BeforeShow @2-ECDCBAFF
function grdIncidentes_BeforeShow(& $sender)
{
    $grdIncidentes_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdIncidentes; //Compatibility
//End grdIncidentes_BeforeShow

//Custom Code @59-2A29BDB7
// -------------------------
    $grdIncidentes->Label1->SetValue($grdIncidentes->DataSource->RecordsCount );
// -------------------------
//End Custom Code

//Close grdIncidentes_BeforeShow @2-9184FF36
    return $grdIncidentes_BeforeShow;
}
//End Close grdIncidentes_BeforeShow


?>
