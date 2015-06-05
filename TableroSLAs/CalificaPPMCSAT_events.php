<?php
//BindEvents Method @1-747000A5
function BindEvents()
{
    global $calificacion_rs_AUT;
    $calificacion_rs_AUT->CCSEvents["BeforeShow"] = "calificacion_rs_AUT_BeforeShow";
    $calificacion_rs_AUT->ds->CCSEvents["BeforeExecuteInsert"] = "calificacion_rs_AUT_ds_BeforeExecuteInsert";
    $calificacion_rs_AUT->ds->CCSEvents["BeforeExecuteUpdate"] = "calificacion_rs_AUT_ds_BeforeExecuteUpdate";
}
//End BindEvents Method

//calificacion_rs_AUT_BeforeShow @2-95FC3532
function calificacion_rs_AUT_BeforeShow(& $sender)
{
    $calificacion_rs_AUT_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $calificacion_rs_AUT; //Compatibility
//End calificacion_rs_AUT_BeforeShow

//Custom Code @122-2A29BDB7
// -------------------------
    // verifica si el incidente es de cierre o apertura, dependiendo de eso presenta el panel con los SLAs que le corresponden
    if($calificacion_rs_AUT->DataSource->f("TipoUniverso")=="PA"){
    	$calificacion_rs_AUT->pnlApertura->Visible=true;
    	$calificacion_rs_AUT->pnlCierre->Visible=false;
    } else {
    	$calificacion_rs_AUT->pnlApertura->Visible=false;
    	$calificacion_rs_AUT->pnlCierre->Visible=true;
    }
// -------------------------
//End Custom Code

//Close calificacion_rs_AUT_BeforeShow @2-3861B25B
    return $calificacion_rs_AUT_BeforeShow;
}
//End Close calificacion_rs_AUT_BeforeShow

//calificacion_rs_AUT_ds_BeforeExecuteInsert @2-06589D90
function calificacion_rs_AUT_ds_BeforeExecuteInsert(& $sender)
{
    $calificacion_rs_AUT_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $calificacion_rs_AUT; //Compatibility
//End calificacion_rs_AUT_ds_BeforeExecuteInsert

//Custom Code @220-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close calificacion_rs_AUT_ds_BeforeExecuteInsert @2-ABBD44D8
    return $calificacion_rs_AUT_ds_BeforeExecuteInsert;
}
//End Close calificacion_rs_AUT_ds_BeforeExecuteInsert

//calificacion_rs_AUT_ds_BeforeExecuteUpdate @2-42CA02EA
function calificacion_rs_AUT_ds_BeforeExecuteUpdate(& $sender)
{
    $calificacion_rs_AUT_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $calificacion_rs_AUT; //Compatibility
//End calificacion_rs_AUT_ds_BeforeExecuteUpdate

//Custom Code @221-2A29BDB7
// -------------------------

// -------------------------
//End Custom Code

//Close calificacion_rs_AUT_ds_BeforeExecuteUpdate @2-64948557
    return $calificacion_rs_AUT_ds_BeforeExecuteUpdate;
}
//End Close calificacion_rs_AUT_ds_BeforeExecuteUpdate


?>
