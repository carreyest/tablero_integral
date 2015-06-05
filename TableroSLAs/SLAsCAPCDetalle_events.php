<?php
//BindEvents Method @1-14153431
function BindEvents()
{
    global $mc_calificacion_capc;
    $mc_calificacion_capc->FechaFirmaCAES->CCSEvents["BeforeShow"] = "mc_calificacion_capc_FechaFirmaCAES_BeforeShow";
}
//End BindEvents Method

//mc_calificacion_capc_FechaFirmaCAES_BeforeShow @59-33870576
function mc_calificacion_capc_FechaFirmaCAES_BeforeShow(& $sender)
{
    $mc_calificacion_capc_FechaFirmaCAES_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_capc; //Compatibility
//End mc_calificacion_capc_FechaFirmaCAES_BeforeShow

//Close mc_calificacion_capc_FechaFirmaCAES_BeforeShow @59-D780BEBB
    return $mc_calificacion_capc_FechaFirmaCAES_BeforeShow;
}
//End Close mc_calificacion_capc_FechaFirmaCAES_BeforeShow


?>
