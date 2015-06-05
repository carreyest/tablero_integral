<?php
//BindEvents Method @1-11200235
function BindEvents()
{
    global $mc_c_aplicacionSearch;
    global $mc_c_aplicacion1;
    $mc_c_aplicacionSearch->CCSEvents["BeforeShow"] = "mc_c_aplicacionSearch_BeforeShow";
    $mc_c_aplicacion1->descripcion->CCSEvents["OnValidate"] = "mc_c_aplicacion1_descripcion_OnValidate";
    $mc_c_aplicacion1->CCSEvents["BeforeShow"] = "mc_c_aplicacion1_BeforeShow";
    $mc_c_aplicacion1->ds->CCSEvents["BeforeBuildInsert"] = "mc_c_aplicacion1_ds_BeforeBuildInsert";
}
//End BindEvents Method

//mc_c_aplicacionSearch_BeforeShow @2-31E40A4C
function mc_c_aplicacionSearch_BeforeShow(& $sender)
{
    $mc_c_aplicacionSearch_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_aplicacionSearch; //Compatibility
//End mc_c_aplicacionSearch_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_c_aplicacionSearch_BeforeShow @2-338FFA1C
    return $mc_c_aplicacionSearch_BeforeShow;
}
//End Close mc_c_aplicacionSearch_BeforeShow

//mc_c_aplicacion1_descripcion_OnValidate @45-DA401E64
function mc_c_aplicacion1_descripcion_OnValidate(& $sender)
{
    $mc_c_aplicacion1_descripcion_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_aplicacion1; //Compatibility
//End mc_c_aplicacion1_descripcion_OnValidate

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_c_aplicacion1_descripcion_OnValidate @45-D10CD23A
    return $mc_c_aplicacion1_descripcion_OnValidate;
}
//End Close mc_c_aplicacion1_descripcion_OnValidate

//DEL  // -------------------------
//DEL  	$mc_c_aplicacion1->hIdUsuario->SetValue(1);
//DEL  
//DEL      // Write your own code here.
//DEL  // -------------------------

//DEL  // -------------------------
//DEL  	$mc_c_aplicacion1->hIdUsuario->SetValue(1);
//DEL  
//DEL      // Write your own code here.
//DEL  // -------------------------

//mc_c_aplicacion1_BeforeShow @41-888F0B16
function mc_c_aplicacion1_BeforeShow(& $sender)
{
    $mc_c_aplicacion1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_aplicacion1; //Compatibility
//End mc_c_aplicacion1_BeforeShow

//Custom Code @48-2A29BDB7
// -------------------------
	$mc_c_aplicacion1->hIdUsuario->SetValue(1);

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_c_aplicacion1_BeforeShow @41-0B9C7BC8
    return $mc_c_aplicacion1_BeforeShow;
}
//End Close mc_c_aplicacion1_BeforeShow

//mc_c_aplicacion1_ds_BeforeBuildInsert @41-B4E3E0DF
function mc_c_aplicacion1_ds_BeforeBuildInsert(& $sender)
{
    $mc_c_aplicacion1_ds_BeforeBuildInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_aplicacion1; //Compatibility
//End mc_c_aplicacion1_ds_BeforeBuildInsert

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_c_aplicacion1_ds_BeforeBuildInsert @41-495D9825
    return $mc_c_aplicacion1_ds_BeforeBuildInsert;
}
//End Close mc_c_aplicacion1_ds_BeforeBuildInsert
?>
