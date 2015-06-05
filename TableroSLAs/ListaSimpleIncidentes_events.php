<?php
//BindEvents Method @1-D40060DD
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Page_BeforeShow @1-504154FA
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ListaSimpleIncidentes; //Compatibility
//End Page_BeforeShow

//Custom Code @9-2A29BDB7
// -------------------------
    if (CCGetFromGet("export","") == "1") {
		//Set Content type to Excel
		header("Content-Type: application/vnd.ms-excel");
		if (strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.5;") || strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.0;")) {
			header("Content-Disposition: filename=" . $ExportFileName);
		} else {
			header("Content-Disposition: attachment; filename=" . $ExportFileName);
		}
	}
		
	global $ExportToExcel;
	
	$ExportFileName = "IncidentesPlano.xls";
	if (CCGetFromGet("export","") == "1") {
		//Set Content type to Excel
		header("Content-Type: application/vnd.ms-excel");
		//Fix IE 5.0-5.5 bug with Content-Disposition=attachment
		if (strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.5;") || strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.0;")) {
			header("Content-Disposition: filename=" . $fFileName);
		} else {
			header("Content-Disposition: attachment; filename=" . $ExportFileName);
		}  
 	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
