<?php
//BindEvents Method @1-FA3AC75D
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//Page_OnInitializeView @1-11FAE1D3
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReporteIncidentes; //Compatibility
//End Page_OnInitializeView

//Custom Code @2-2A29BDB7
// -------------------------
    

define("UID", "capcmc\usrReportsMC");
define("PASWD", "itera.140401");
define("SERVICE_URL", "http://webiterasrv2/ReportServer");
define("REPORT", "http://webiterasrv2/AnalyticsReports/TMC_V3.0_v2/ListadoIncidentes.rdl");
	$sCDS=0;

	$sCDS= CCGetParam("s_cds_param");
	$sCDS=$sCDS-1;
	
if(CCGetParam("s_mes_param")<10){
	define("FILENAME", "Incidentes_CDS" . $sCDS . "_SLA_" . CCGetParam("s_anio_param")  . "0" . CCGetParam("s_mes_param") .  date("t") . ".xls");
} else {
	define("FILENAME", "Incidentes_CDS" . $sCDS . "_SLA_" . CCGetParam("s_anio_param")  . CCGetParam("s_mes_param") . date("t") .  ".xls");
}

try
{
    $ssrs_report = new SSRSReport(new Credentials(UID, PASWD),SERVICE_URL);
    $executionInfo = $ssrs_report->LoadReport2(REPORT, NULL);

    $parameters = array();
    $parameters[0] = new ParameterValue();
    $parameters[0]->Name = "Mes";
    $parameters[0]->Value = CCGetParam("s_mes_param",date("m"-1));
    $parameters[1] = new ParameterValue();
    $parameters[1]->Name = "Anio";
    $parameters[1]->Value = CCGetParam("s_anio_param",date("Y"));
    $parameters[2] = new ParameterValue();
    $parameters[2]->Name = "Proveedor";
    $parameters[2]->Value = CCGetParam("s_cds_param",0);
    $executionInfo = $ssrs_report->SetExecutionParameters2($parameters, "en-us");

    $ssrs_report->LoadReport2(REPORT, NULL);
				$renderAsEXCEL = new RenderAsEXCEL();
				$result_EXCEL = $ssrs_report->Render2($renderAsEXCEL,
											 PageCountModeEnum::$Estimate,
											 $Extension,
											 $MimeType,
											 $Encoding,
											 $Warnings,
											 $StreamIds);

				$handle = fopen(FILENAME, 'wb');
				fwrite($handle, $result_EXCEL);
				fclose($handle);
				
				global $Redirect;
				global $PathToRoot;
				$Redirect= $PathToRoot .  "\\" . FILENAME ;
 	
}

catch(SSRSReportException $serviceExcprion)

{

    echo $serviceExcprion->GetErrorMessage();

}

// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
