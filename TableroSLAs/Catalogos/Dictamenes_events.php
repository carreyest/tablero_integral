<?php
//BindEvents Method @1-7FA947F3
function BindEvents()
{
    global $mc_c_dictamenes;
    $mc_c_dictamenes->CCSEvents["BeforeShowRow"] = "mc_c_dictamenes_BeforeShowRow";
}
//End BindEvents Method

//mc_c_dictamenes_BeforeShowRow @3-21373D12
function mc_c_dictamenes_BeforeShowRow(& $sender)
{
    $mc_c_dictamenes_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_dictamenes; //Compatibility
//End mc_c_dictamenes_BeforeShowRow

//Custom Code @54-2A29BDB7
// -------------------------
    if($mc_c_dictamenes->SeMideSLA->GetValue()==0){
    	$mc_c_dictamenes->SeMideSLA->SetValue("No");
    } else {
    	$mc_c_dictamenes->SeMideSLA->SetValue("Si");
    }
    
    if($mc_c_dictamenes->FugadoProduccion->GetValue()==0){
    	$mc_c_dictamenes->FugadoProduccion->SetValue("No");
    } else {
    	$mc_c_dictamenes->FugadoProduccion->SetValue("Si");
    }
// -------------------------
//End Custom Code

//Close mc_c_dictamenes_BeforeShowRow @3-54EA4648
    return $mc_c_dictamenes_BeforeShowRow;
}
//End Close mc_c_dictamenes_BeforeShowRow


?>
