<?php
//BindEvents Method @1-FA3AC75D
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//Page_OnInitializeView @1-99FDEDA8
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $TableroExcelCAPCSLO; //Compatibility
//End Page_OnInitializeView

//Custom Code @2-2A29BDB7
// -------------------------
    

define("UID", "capcmc\usrReportsMC");
define("PASWD", "itera.140401");
define("SERVICE_URL", "http://webiterasrv2/ReportServer");
define("REPORT", "http://webiterasrv2/AnalyticsReports/TMC_V3.0_v2/ReporteCAPC.rdl");
	
$vMes  = CCGetParam("s_mes",CCGetParam("s_MesReporte"));
$vAnio = CCGetParam("s_anio",CCGetParam("s_AnioReporte"));


if( $vMes < 10 ){
	define("FILENAME", "ReporteNS_CAPC_"  .  $vAnio . "0" . $vMes .  date("t") . ".xls");
} else {
	define("FILENAME", "ReporteNS_CAPC_" . $vAnio . $vMes . date("t") .  ".xls");
}

try
{
    $ssrs_report = new SSRSReport(new Credentials(UID, PASWD),SERVICE_URL);
    $executionInfo = $ssrs_report->LoadReport2(REPORT, NULL);

    $parameters = array();
    $parameters[0] = new ParameterValue();
    $parameters[0]->Name = "Mes";
    $parameters[0]->Value = $vMes;
    $parameters[1] = new ParameterValue();
    $parameters[1]->Name = "Anio";
    $parameters[1]->Value = $vAnio;
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
