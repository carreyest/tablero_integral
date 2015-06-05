<?php
//BindEvents Method @1-9DB7449F
function BindEvents()
{
    global $grdIncidentes;
    $grdIncidentes->CCSEvents["BeforeShowRow"] = "grdIncidentes_BeforeShowRow";
}
//End BindEvents Method

//grdIncidentes_BeforeShowRow @2-8A8DA2A4
function grdIncidentes_BeforeShowRow(& $sender)
{
    $grdIncidentes_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdIncidentes; //Compatibility
//End grdIncidentes_BeforeShowRow

//Set Row Style @13-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close grdIncidentes_BeforeShowRow @2-8BDCECAE
    return $grdIncidentes_BeforeShowRow;
}
//End Close grdIncidentes_BeforeShowRow


?>
