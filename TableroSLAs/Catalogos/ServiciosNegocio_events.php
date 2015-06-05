<?php
//BindEvents Method @1-2231485C
function BindEvents()
{
    global $mc_c_servicio;
    $mc_c_servicio->mc_c_servicio_TotalRecords->CCSEvents["BeforeShow"] = "mc_c_servicio_mc_c_servicio_TotalRecords_BeforeShow";
}
//End BindEvents Method

//mc_c_servicio_mc_c_servicio_TotalRecords_BeforeShow @8-2761A43C
function mc_c_servicio_mc_c_servicio_TotalRecords_BeforeShow(& $sender)
{
    $mc_c_servicio_mc_c_servicio_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_servicio; //Compatibility
//End mc_c_servicio_mc_c_servicio_TotalRecords_BeforeShow

//Retrieve number of records @9-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close mc_c_servicio_mc_c_servicio_TotalRecords_BeforeShow @8-3C8BD3BB
    return $mc_c_servicio_mc_c_servicio_TotalRecords_BeforeShow;
}
//End Close mc_c_servicio_mc_c_servicio_TotalRecords_BeforeShow


?>
