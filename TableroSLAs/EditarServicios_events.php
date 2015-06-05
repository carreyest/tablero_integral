<?php
//BindEvents Method @1-D40060DD
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Page_BeforeShow @1-8791EFAD
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $EditarServicios; //Compatibility
//End Page_BeforeShow

//Custom Code @12-2A29BDB7
// -------------------------
    if(CCGetSession("GrupoValoracion","")!="CAPC" ){
    		global $c_servicio ;
    		$c_servicio->InsertAllowed =false; 
    		$c_servicio->UpdateAllowed  =false;
    }
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
