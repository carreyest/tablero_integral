<?php
//BindEvents Method @1-FA3AC75D
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//Page_OnInitializeView @1-DEB896E6
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $EntregablesExcel; //Compatibility
//End Page_OnInitializeView

//Custom Code @2-2A29BDB7
// -------------------------
/*    
	global $db;
	global $Redirect;
	global $PathToRoot;

	global $REPORT;
	global $FILENAME;
		
	global $UID;
	global $PASWD;
	global $SERVICE_URL;
		
	$UID = CCDLookUp("valor","mc_parametros","valor='UsrSSRS'",$db);
	$PASWD = CCDLookUp("valor","mc_parametros","valor='PwdSSRS'",$db);
	$SERVICE_URL = CCDLookUp("valor","mc_parametros","valor='SSRSURL'",$db);
	$REPORT= "http://webiterasrv2/AnalyticsReports/SLASSDMA4/ReporteListaEntregables.rdl";
*/
	define("UID", "capcmc\usrReportsMC");
	define("PASWD", "itera.140401");
	define("SERVICE_URL", "http://webiterasrv2/ReportServer");
	define("REPORT", "http://webiterasrv2/AnalyticsReports/SLASSDMA4/ReporteListaEntregables.rdl");

	
	
$vMes  = CCGetParam("MesReporte", date("m"-1));
$vAnio = CCGetParam("anioreporte", date("Y"));
$vProveedor = CCGetParam("busqproveedor",1);
$usuario = CCGetUserLogin();

$sSQL='SELECT nombre FROM mc_c_proveedor  WHERE id_proveedor = ' . $vProveedor;
		
	$db = new clsDBCnDisenio;
	$db->query($sSQL);
	$db->next_record();
	if($db->f(0) != "" ){ //
			$vNomProveedor=$db->f(0);
	} 
	




if( $vMes < 10 ){
	define("FILENAME", "Entregables_" . $vNomProveedor . "_" .  $vAnio . "0" . $vMes .  date("t",mktime(0,0,0,$vMes,1,$vAnio)) . ".xls");
} else {
	define("FILENAME", "Entregables_"  . $vNomProveedor . "-" . $vAnio . $vMes . date("t",mktime(0,0,0,$vMes,1,$vAnio)) .  ".xls");
}

try
{
    $ssrs_report = new SSRSReport(new Credentials(UID, PASWD),SERVICE_URL);
    $executionInfo = $ssrs_report->LoadReport2(REPORT, NULL);

    $parameters = array();
    $parameters[0] = new ParameterValue();
    $parameters[0]->Name = "MesCorte";
    $parameters[0]->Value = $vMes;
    $parameters[1] = new ParameterValue();
    $parameters[1]->Name = "AnioCorte";
    $parameters[1]->Value = $vAnio;
    $parameters[2] = new ParameterValue();
    $parameters[2]->Name = "usuario";
    $parameters[2]->Value = $usuario;
    $parameters[3] = new ParameterValue();
    $parameters[3]->Name = "proveedor";
    $parameters[3]->Value = $vProveedor;
    
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
