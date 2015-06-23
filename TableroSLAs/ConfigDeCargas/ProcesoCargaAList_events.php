<?php
//BindEvents Method @1-2349F4B0
function BindEvents()
{
    global $proceso_carga_archivos;
    $proceso_carga_archivos->Navigator->CCSEvents["BeforeShow"] = "proceso_carga_archivos_Navigator_BeforeShow";
}
//End BindEvents Method

//proceso_carga_archivos_Navigator_BeforeShow @67-1622F559
function proceso_carga_archivos_Navigator_BeforeShow(& $sender)
{
    $proceso_carga_archivos_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $proceso_carga_archivos; //Compatibility
//End proceso_carga_archivos_Navigator_BeforeShow

//Hide-Show Component @68-0DB41530
    $Parameter1 = $Container->DataSource->PageCount();
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close proceso_carga_archivos_Navigator_BeforeShow @67-9452EA84
    return $proceso_carga_archivos_Navigator_BeforeShow;
}
//End Close proceso_carga_archivos_Navigator_BeforeShow


?>
