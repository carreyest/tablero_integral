<?php
//BindEvents Method @1-5DE7023B
function BindEvents()
{
    global $ReportesMyM;
    global $CCSEvents;
    $ReportesMyM->Nombre->CCSEvents["BeforeShow"] = "ReportesMyM_Nombre_BeforeShow";
    $ReportesMyM->Detail->CCSEvents["BeforeShow"] = "ReportesMyM_Detail_BeforeShow";
    $ReportesMyM->CCSEvents["BeforeSelect"] = "ReportesMyM_BeforeSelect";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//DEL  // -------------------------
//DEL      // Write your own code here.  	
//DEL  
//DEL      global $tipo_pantalla;
//DEL      $tipo_pantalla=    CCGetParam("fullscreen",0) ; 
//DEL      global $Tpl;
//DEL      if ($tipo_pantalla==1) {
//DEL      	//pantalla completa
//DEL      	$Tpl->SetVar("func_pantalla","ocultar()");
//DEL      	
//DEL      	}
//DEL      else{
//DEL      	//pantalla normal
//DEL      	$Tpl->SetVar("func_pantalla","mostrar()");
//DEL      	
//DEL      	}
//DEL      
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      
//DEL      // $Component->SetValue("green");
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      global $Tpl;
//DEL      //hidden=getparam
//DEL     if($ReportesMyM->Hidden1->GetValue()==CCGetParam("IdReporte"))
//DEL   	{
//DEL   		$Tpl->SetVar("vbgcolor","rgb(59,148,55)");
//DEL     	 	$Tpl->SetVar("vfontcolor","white"); 
//DEL  	}
//DEL     else{
//DEL      	$Tpl->SetVar("vbgcolor","rgb(244,244,244)");
//DEL     	$Tpl->SetVar("vfontcolor","black"); 
//DEL     } 
//DEL     	 
//DEL      // $Component->ReportLabel1->SetValue("green");
//DEL  
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL  //     $Component->ReportLabel1->SetValue("green");
//DEL      
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      if($ReportesMyM->DataSource->f("Activo")==1){
//DEL      	$ReportesMyM->Nombre->SetLink($ReportesMyM->Nombre->GetLink());
//DEL      } else {
//DEL      	$ReportesMyM->Nombre->SetLink("");
//DEL      }
//DEL  // -------------------------

//ReportesMyM_Nombre_BeforeShow @37-E12B16BF
function ReportesMyM_Nombre_BeforeShow(& $sender)
{
    $ReportesMyM_Nombre_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReportesMyM; //Compatibility
//End ReportesMyM_Nombre_BeforeShow

//Custom Code @38-2A29BDB7
// -------------------------
    
    if($ReportesMyM->activo->GetValue()==1){
    	if($ReportesMyM->Nombre->GetValue()=="Tendencias de Niveles de Servicio"){
    		$ReportesMyM->Nombre->SetLink("Charts/Charts.php");
    		}
    	$ReportesMyM->Nombre->Visible = true;
    	$ReportesMyM->ReportLabel1->Visible = false;
    } else {
    	$ReportesMyM->Nombre->Visible=false;
    	$ReportesMyM->ReportLabel1->Visible=true;
    	$ReportesMyM->ReportLabel1->SetValue($ReportesMyM->Nombre->GetText());
    }
    $ReportesMyM->activo->SetValue("");
    $ReportesMyM->IdReporte->SetValue("");
// -------------------------
//End Custom Code

//Close ReportesMyM_Nombre_BeforeShow @37-E17C3411
    return $ReportesMyM_Nombre_BeforeShow;
}
//End Close ReportesMyM_Nombre_BeforeShow

//ReportesMyM_Detail_BeforeShow @35-DDA6CAD8
function ReportesMyM_Detail_BeforeShow(& $sender)
{
    $ReportesMyM_Detail_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReportesMyM; //Compatibility
//End ReportesMyM_Detail_BeforeShow

//Custom Code @77-2A29BDB7
// -------------------------
      global $Tpl;
    //hidden=getparam
   if($ReportesMyM->IdReporte->GetValue()==CCGetParam("IdReporte"))
 	{
 		$Tpl->SetVar("vbgcolor","rgb(59,148,55)");
   	 	$Tpl->SetVar("vfontcolor","white"); 
	}
   else{
    	$Tpl->SetVar("vbgcolor","rgb(244,244,244)");
   	$Tpl->SetVar("vfontcolor","black"); 
   } 
// -------------------------
//End Custom Code

//Close ReportesMyM_Detail_BeforeShow @35-E5038549
    return $ReportesMyM_Detail_BeforeShow;
}
//End Close ReportesMyM_Detail_BeforeShow

//ReportesMyM_BeforeSelect @30-A1CA7FDE
function ReportesMyM_BeforeSelect(& $sender)
{
    $ReportesMyM_BeforeSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReportesMyM; //Compatibility
//End ReportesMyM_BeforeSelect

//Custom Code @82-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

  If ($ReportesMyM->DataSource->Order == "") { 
     $ReportesMyM->DataSource->Order = "orden asc";
  }

//Close ReportesMyM_BeforeSelect @30-3130CD7B
    return $ReportesMyM_BeforeSelect;
}
//End Close ReportesMyM_BeforeSelect

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
			if(CCGetSession("Rape","")==1 && CCGetSession("Nivel","")!=5){ //Sólo si es rape pero no administrador
				$lReportContent->SetValue("<iframe  id='rep_metri'  style='overflow:auto; width:1160px; height:700px;' frameborder=0 src=" . $PathToRoot . "reportviewer/VerReporte2.aspx?urlreporte=" . $db->f(0) . "&fullscreen=" . CCGetParam("fullscreen",0) ."&Admon=".CCGetSession("AdministracionRape","")."></iframe>");
  			} else {
				$lReportContent->SetValue("<iframe  id='rep_metri'  style='overflow:auto; width:1160px; height:700px;' frameborder=0 src=" . $PathToRoot . "reportviewer/VerReporte.aspx?urlreporte=" . $db->f(0) . "&fullscreen=" . CCGetParam("fullscreen",0) ."></iframe>");  			
  			}
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
