<?php
//BindEvents Method @1-78D67E39
function BindEvents()
{
    global $Grid1;
    global $CCSEvents;
    $Grid1->CCSEvents["BeforeShowRow"] = "Grid1_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Grid1_BeforeShowRow @26-FCC1FF76
function Grid1_BeforeShowRow(& $sender)
{
    $Grid1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
//End Grid1_BeforeShowRow

//Set Row Style @30-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close Grid1_BeforeShowRow @26-23E47D26
    return $Grid1_BeforeShowRow;
}
//End Close Grid1_BeforeShowRow

//Page_BeforeShow @1-079E0691
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ListaServicios; //Compatibility
//End Page_BeforeShow

//Custom Code @25-2A29BDB7
// -------------------------
    

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
