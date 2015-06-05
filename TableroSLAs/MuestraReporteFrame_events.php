<?php
//BindEvents Method @1-D40060DD
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Page_BeforeShow @1-18A6509D
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $MuestraReporteFrame; //Compatibility
//End Page_BeforeShow

//Custom Code @2-2A29BDB7
// -------------------------
    	require_once 'SSRSReport.php';
    //se verifica si existe el registro para el mes que se está creando, si es así genera el reporte, si no pide los datos.
		global $REPORT;
		global $FILENAME;
		
		global $UID;
		global $PASWD;
		global $SERVICE_URL;
		
		$UID = "capcmc\sharepoint";
		$PASWD = "itera.2012";
		$SERVICE_URL = "http://localhost/ReportServer";
		
		global $db;
		$db= new clsDBcnDisenio;
		$REPORT = CCDLookUp("NombreRDL","ReportesMyM","IdReporte=" .  CCGetParam("IdReporte","0"),$db);
		
		if($REPORT !=""){
			try {
				$ssrs_report = new SSRSReport(new Credentials($UID, $PASWD),$SERVICE_URL);
			    $executionInfo = $ssrs_report->LoadReport2($REPORT, NULL);			
			    /*
			    $parameters = array();
			    $parameters[0] = new ParameterValue();
			    $parameters[0]->Name = "Mes";
			    $parameters[0]->Value = 11;
			    $parameters[1] = new ParameterValue();
			    $parameters[1]->Name = "Anio";
			    $parameters[1]->Value = 2014;
			    $parameters[2] = new ParameterValue();
			    $parameters[2]->Name = "Proveedor";
			    $parameters[2]->Value = 2;
			    $executionInfo = $ssrs_report->SetExecutionParameters2($parameters, "en-us");
				*/
			    $ssrs_report->LoadReport2($REPORT, NULL);
				$renderAsHTML = new RenderAsHTML();
				//$renderAsHTML->ReplacementRoot = getPageURL();
				$result_html = $ssrs_report->Render2($renderAsHTML,
	                                     PageCountModeEnum::$Estimate,
	                                     $Extension,
	                                     $MimeType,
	                                     $Encoding,
	                                     $Warnings,
	                                     $StreamIds); 
	                                     
				global $lReportContent;
				$lReportContent->SetValue("<div style='overflow:auto; width:1000px; height:700px'>" . $result_html . "</div>");
			 	
			}
			catch(SSRSReportException $serviceExcprion){
				echo $serviceExcprion->GetErrorMessage();
			}
		}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow




    function getPageURL()
    {
        $PageUrl = $_SERVER["HTTPS"] == "on"? 'https://' : 'http://';
        $uri = $_SERVER["REQUEST_URI"];
        $index = strpos($uri, '?');
        if($index !== false)
        {
             $uri = substr($uri, 0, $index);
        }
        $PageUrl .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $uri;
        return $PageUrl;
    }


?>
