<?php
//BindEvents Method @1-88A68ABF
function BindEvents()
{
    global $ReportesMyM;
    global $CCSEvents;
    $ReportesMyM->Nombre->CCSEvents["BeforeShow"] = "ReportesMyM_Nombre_BeforeShow";
    $ReportesMyM->Detail->CCSEvents["BeforeShow"] = "ReportesMyM_Detail_BeforeShow";
    $ReportesMyM->CCSEvents["BeforeShow"] = "ReportesMyM_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//ReportesMyM_Nombre_BeforeShow @18-E12B16BF
function ReportesMyM_Nombre_BeforeShow(& $sender)
{
    $ReportesMyM_Nombre_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReportesMyM; //Compatibility
//End ReportesMyM_Nombre_BeforeShow

//Custom Code @25-2A29BDB7
// -------------------------
    // Write your own code here.  	
    global $tipo_pantalla;
    $tipo_pantalla=    CCGetParam("fullscreen",0) ; 
    global $Tpl;
    if ($tipo_pantalla==1) {
    	//pantalla completa
    	$Tpl->SetVar("func_pantalla","ocultar()");
    	
    	}
    else{
    	//pantalla normal
    	$Tpl->SetVar("func_pantalla","mostrar()");
    	
    	}
    
// -------------------------
//End Custom Code

//Close ReportesMyM_Nombre_BeforeShow @18-E17C3411
    return $ReportesMyM_Nombre_BeforeShow;
}
//End Close ReportesMyM_Nombre_BeforeShow

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      
//DEL      // $Component->SetValue("green");
//DEL  // -------------------------

//ReportesMyM_Detail_BeforeShow @11-DDA6CAD8
function ReportesMyM_Detail_BeforeShow(& $sender)
{
    $ReportesMyM_Detail_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReportesMyM; //Compatibility
//End ReportesMyM_Detail_BeforeShow

//Custom Code @24-2A29BDB7
// -------------------------
    // Write your own code here.
    global $Tpl;
    //hidden=getparam
   if($ReportesMyM->Hidden1->GetValue()==CCGetParam("IdReporte"))
 	{
 		$Tpl->SetVar("vbgcolor","rgb(59,148,55)");
   	 	$Tpl->SetVar("vfontcolor","white"); 
	}
   else{
    	$Tpl->SetVar("vbgcolor","rgb(244,244,244)");
   	$Tpl->SetVar("vfontcolor","black"); 
   } 
   	 
    // $Component->ReportLabel1->SetValue("green");

// -------------------------
//End Custom Code

//Close ReportesMyM_Detail_BeforeShow @11-E5038549
    return $ReportesMyM_Detail_BeforeShow;
}
//End Close ReportesMyM_Detail_BeforeShow

//ReportesMyM_BeforeShow @5-5317CB32
function ReportesMyM_BeforeShow(& $sender)
{
    $ReportesMyM_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReportesMyM; //Compatibility
//End ReportesMyM_BeforeShow

//Custom Code @21-2A29BDB7
// -------------------------
    // Write your own code here.
//     $Component->ReportLabel1->SetValue("green");
    
// -------------------------
//End Custom Code

//Close ReportesMyM_BeforeShow @5-06B7CC95
    return $ReportesMyM_BeforeShow;
}
//End Close ReportesMyM_BeforeShow

//Page_BeforeShow @1-F9FE9218
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $MuestraReporte; //Compatibility
//End Page_BeforeShow

//Custom Code @2-2A29BDB7
// -------------------------
	
	//inicia sesión en el servidor de reportes para evitar el doblehop
	$ldaprdn  = 'sharepoint@capcmc.itera';     // ldap rdn or dn
	$ldappass = 'itera.2012';  // associated password
	// connect to ldap server
	$ldapconn = ldap_connect("capcmc.itera")
    or die("No es posible conectarse con el servidor de dominio.");

	if ($ldapconn) {
    	// binding to ldap server
    	$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
    	// verify binding
    	if ($ldapbind) {
    		
    	} else {
        	echo "No es posible autenticarse con el AD...";
    	}
	}

	
	
	if(CCGetParam("frame","2")==2){
		global $lReportContent;
		global $db;
		$db= new clsDBcnDisenio;
		$db->query("select nombrerdl from ReportesMyM where IdReporte=" . CCGetParam("IdReporte","0"));
		if($db->next_record()){
			global $PathToRoot;
			$lReportContent->SetValue("<iframe  id='rep_metri'  style='overflow:auto; width:1160px; height:700px;' frameborder=0 src=" . $PathToRoot . "reportviewer/VerReporte.aspx?urlreporte=" . $db->f(0) . "&fullscreen=" . CCGetParam("fullscreen",0) ."></iframe>");
		}
		$db->close();
	} else {
		if(CCGetParam("frame","")==1){
			global $lReportContent;
			$lReportContent->SetValue("<iframe id='rep_metri'  style='overflow:auto; width:1220px; height:700px;frameborder=0;' src=MuestraReporteFrame.php?IdReporte=". CCGetParam("IdReporte","0") . "></iframe>");
		} else {
			require_once 'SSRSReport.php';
	    	//se verifica si existe el registro para el mes que se está creando, si es así genera el reporte, si no pide los datos.
			global $REPORT;
			global $FILENAME;
			
			global $UID;
			global $PASWD;
			global $SERVICE_URL;
			
			$UID = "CAPCMC\Sharepoint";
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
					$lReportContent->SetValue("<div style='overflow:auto; width:1000px; height:700px' >" . $result_html . "</div>");
				 	
				}
				catch(SSRSReportException $serviceExcprion){
					echo $serviceExcprion->GetErrorMessage();
				}
			}
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
