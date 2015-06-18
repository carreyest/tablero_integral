<?php
//BindEvents Method @1-7FA77AD3
function BindEvents()
{
    global $detalle_layout;
    global $CCSEvents;
    $detalle_layout->Navigator->CCSEvents["BeforeShow"] = "detalle_layout_Navigator_BeforeShow";
    $detalle_layout->CCSEvents["BeforeSelect"] = "detalle_layout_BeforeSelect";
    $detalle_layout->ds->CCSEvents["BeforeExecuteSelect"] = "detalle_layout_ds_BeforeExecuteSelect";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//detalle_layout_Navigator_BeforeShow @40-AF74643D
function detalle_layout_Navigator_BeforeShow(& $sender)
{
    $detalle_layout_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $detalle_layout; //Compatibility
//End detalle_layout_Navigator_BeforeShow

//Hide-Show Component @41-0DB41530
    $Parameter1 = $Container->DataSource->PageCount();
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close detalle_layout_Navigator_BeforeShow @40-DA5C2CC3
    return $detalle_layout_Navigator_BeforeShow;
}
//End Close detalle_layout_Navigator_BeforeShow

//detalle_layout_BeforeSelect @6-D7D29EA6
function detalle_layout_BeforeSelect(& $sender)
{
    $detalle_layout_BeforeSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $detalle_layout; //Compatibility
//End detalle_layout_BeforeSelect

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close detalle_layout_BeforeSelect @6-EDCC0300
    return $detalle_layout_BeforeSelect;
}
//End Close detalle_layout_BeforeSelect

//detalle_layout_ds_BeforeExecuteSelect @6-C6B56E1A
function detalle_layout_ds_BeforeExecuteSelect(& $sender)
{
    $detalle_layout_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $detalle_layout; //Compatibility
//End detalle_layout_ds_BeforeExecuteSelect

//Custom Code @52-2A29BDB7
// -------------------------
    if (CCGetParam("cve_carga")!='') {
		if ($detalle_layout->DataSource->Where <> "") {
		    $detalle_layout->DataSource->Where .= " AND ";
		  }
		
		$detalle_layout->DataSource->Where .= " cve_carga = '".CCGetParam("cve_carga")."'";
    }
    // Write your own code here.
// -------------------------
//End Custom Code

//Close detalle_layout_ds_BeforeExecuteSelect @6-45D2E541
    return $detalle_layout_ds_BeforeExecuteSelect;
}
//End Close detalle_layout_ds_BeforeExecuteSelect

//Page_BeforeShow @1-14D46F5A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $DetalleLayoutList; //Compatibility
//End Page_BeforeShow

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
