<?php
//BindEvents Method @1-8C62B479
function BindEvents()
{
    global $Grid1;
    global $c_servicio_negocio_ppm_ap;
    $Grid1->Grid1_TotalRecords->CCSEvents["BeforeShow"] = "Grid1_Grid1_TotalRecords_BeforeShow";
    $c_servicio_negocio_ppm_ap->CCSEvents["BeforeShow"] = "c_servicio_negocio_ppm_ap_BeforeShow";
}
//End BindEvents Method

//Grid1_Grid1_TotalRecords_BeforeShow @5-B7E018B0
function Grid1_Grid1_TotalRecords_BeforeShow(& $sender)
{
    $Grid1_Grid1_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
//End Grid1_Grid1_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close Grid1_Grid1_TotalRecords_BeforeShow @5-1485BB7B
    return $Grid1_Grid1_TotalRecords_BeforeShow;
}
//End Close Grid1_Grid1_TotalRecords_BeforeShow

//c_servicio_negocio_ppm_ap_BeforeShow @54-4E528817
function c_servicio_negocio_ppm_ap_BeforeShow(& $sender)
{
    $c_servicio_negocio_ppm_ap_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $c_servicio_negocio_ppm_ap; //Compatibility
//End c_servicio_negocio_ppm_ap_BeforeShow

//Custom Code @77-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBConnCarga;
    if(CCGetParam("id_servicio","")!=""){
    	$c_servicio_negocio_ppm_ap->servicio_negocio_aplic->SetValue(CCDLookUp("servicio_negocio", "c_servicio_negocio_repo", " id_servicio=" . CCGetParam("id_servicio"), $db));
    }
// -------------------------
//End Custom Code

//Close c_servicio_negocio_ppm_ap_BeforeShow @54-69C755B5
    return $c_servicio_negocio_ppm_ap_BeforeShow;
}
//End Close c_servicio_negocio_ppm_ap_BeforeShow


?>
