<?php
//BindEvents Method @1-AA142979
function BindEvents()
{
    global $mc_reporte_ns;
    global $CCSEvents;
    $mc_reporte_ns->Fecha->CCSEvents["BeforeShow"] = "mc_reporte_ns_Fecha_BeforeShow";
    $mc_reporte_ns->CCSEvents["OnValidate"] = "mc_reporte_ns_OnValidate";
    $mc_reporte_ns->CCSEvents["BeforeInsert"] = "mc_reporte_ns_BeforeInsert";
    $mc_reporte_ns->ds->CCSEvents["AfterExecuteInsert"] = "mc_reporte_ns_ds_AfterExecuteInsert";
    $mc_reporte_ns->ds->CCSEvents["AfterExecuteUpdate"] = "mc_reporte_ns_ds_AfterExecuteUpdate";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//mc_reporte_ns_Fecha_BeforeShow @18-862ED090
function mc_reporte_ns_Fecha_BeforeShow(& $sender)
{
    $mc_reporte_ns_Fecha_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_reporte_ns; //Compatibility
//End mc_reporte_ns_Fecha_BeforeShow

//Close mc_reporte_ns_Fecha_BeforeShow @18-9186E61C
    return $mc_reporte_ns_Fecha_BeforeShow;
}
//End Close mc_reporte_ns_Fecha_BeforeShow

//mc_reporte_ns_OnValidate @5-AFA73FEE
function mc_reporte_ns_OnValidate(& $sender)
{
    $mc_reporte_ns_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_reporte_ns; //Compatibility
//End mc_reporte_ns_OnValidate

//Custom Code @46-2A29BDB7
// -------------------------
	
// -------------------------
//End Custom Code

//Close mc_reporte_ns_OnValidate @5-30F2104C
    return $mc_reporte_ns_OnValidate;
}
//End Close mc_reporte_ns_OnValidate

//mc_reporte_ns_BeforeInsert @5-DC0A7D64
function mc_reporte_ns_BeforeInsert(& $sender)
{
    $mc_reporte_ns_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_reporte_ns; //Compatibility
//End mc_reporte_ns_BeforeInsert

//Custom Code @47-2A29BDB7
// -------------------------

// -------------------------
//End Custom Code

//Close mc_reporte_ns_BeforeInsert @5-BB685B82
    return $mc_reporte_ns_BeforeInsert;
}
//End Close mc_reporte_ns_BeforeInsert

//mc_reporte_ns_ds_AfterExecuteInsert @5-4E8733CE
function mc_reporte_ns_ds_AfterExecuteInsert(& $sender)
{
    $mc_reporte_ns_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_reporte_ns; //Compatibility
//End mc_reporte_ns_ds_AfterExecuteInsert

//Custom Code @115-2A29BDB7
// -------------------------
    GeneraReporte();
// -------------------------
//End Custom Code

//Close mc_reporte_ns_ds_AfterExecuteInsert @5-AF37F29F
    return $mc_reporte_ns_ds_AfterExecuteInsert;
}
//End Close mc_reporte_ns_ds_AfterExecuteInsert

//mc_reporte_ns_ds_AfterExecuteUpdate @5-A8E0D4FD
function mc_reporte_ns_ds_AfterExecuteUpdate(& $sender)
{
    $mc_reporte_ns_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_reporte_ns; //Compatibility
//End mc_reporte_ns_ds_AfterExecuteUpdate

//Custom Code @116-2A29BDB7
// -------------------------

    GeneraReporte();

// -------------------------
//End Custom Code

//Close mc_reporte_ns_ds_AfterExecuteUpdate @5-601E3310
    return $mc_reporte_ns_ds_AfterExecuteUpdate;
}
//End Close mc_reporte_ns_ds_AfterExecuteUpdate

//Page_OnInitializeView @1-C9FDD8D3
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $TableroExcel; //Compatibility
//End Page_OnInitializeView

//Custom Code @2-2A29BDB7
// -------------------------
	global $db;
	global $Redirect;
	global $PathToRoot;
	global $mc_reporte_ns;
	global $mc_reporte_ns1;
	
	//si se envio la forma verifica si ya existe el registro y redirecciona a la informaci�n guardada
	/*
	if(count($_POST)>0 && array_key_exists("Button_Insert",$_POST)){
		$db= new clsDBcnDisenio;
		$db->query("select * from mc_reporte_ns where mesreporte = ". 
					((CCGetFromPost("s_MesReporte",0)=="")?0:CCGetFromPost("s_MesReporte",0)) . 
					" and anioreporte=" . ((CCGetFromPost("s_AnioReporte",0)=="")?0:CCGetFromPost("s_AnioReporte",0)) . 
					" and id_proveedor=" . ((CCGetFromPost("s_id_proveedor",0)=="")?0:CCGetFromPost("s_id_proveedor",0)));
		if($db->has_next_record()){
			$mc_reporte_ns->InsertAllowed = false;
			$Redirect= $PathToRoot .  "TableroExcel.php?" . CCAddParam(CCGetQueryString("QueryString",array("ccsForm","s_id_proveedor")),"s_id_proveedor",$_POST["s_id_proveedor"]) . "&" .
					CCAddParam(CCGetQueryString("QueryString",array("ccsForm","s_MesReporte")),"s_MesReporte",$_POST["s_MesReporte"])  . "&" .
					CCAddParam(CCGetQueryString("QueryString",array("ccsForm","s_AnioReporte")),"s_AnioReporte",$_POST["s_AnioReporte"]) ;	
			header("Location: " . $Redirect );
		}
	}
	*/
	
	
	//se verifica si existe el registro para el mes que se est� creando, si es as� genera el reporte, si no pide los datos.
if(CCGetParam("s_AnioReporte",0)!=0 & CCGetParam("s_MesReporte",0)!=0 &&  CCGetParam("s_id_proveedor",0)!=0 )
{

	global $dbReporte;
	$dbReporte = new clsDBcnDisenio();
//	$dbReporte->query('select * from mc_reporte_ns where mesreporte= ' . ((CCGetFromPost("s_MesReporte",0)=="")?0:CCGetFromPost("s_MesReporte",0)) . 
//							' and anioreporte=' . ((CCGetFromPost("s_AnioReporte",0)=="")?0:CCGetFromPost("s_AnioReporte",0)) . 
//							' and id_proveedor=' . ((CCGetFromPost("s_id_proveedor",0)=="")?0:CCGetFromPost("s_id_proveedor",0)) .
//							' and Dyp=' . ((CCGetFromPost("DyP",0)=="")?0:CCGetFromPost("DyP",0)) . ' and SLO = ' . ((CCGetFromPost("s_SLO",0)=="")?0:CCGetFromPost("s_SLO",0)));
	$dbReporte->query('select * from mc_reporte_ns where mesreporte= ' . ((CCGetFromGet("s_MesReporte",0)=="")?0:CCGetFromGet("s_MesReporte",0)) . 
							' and anioreporte=' . ((CCGetFromGet("s_AnioReporte",0)=="")?0:CCGetFromGet("s_AnioReporte",0)) . 
							' and id_proveedor=' . ((CCGetFromGet("s_id_proveedor",0)=="")?0:CCGetFromGet("s_id_proveedor",0)) .
							' and Dyp=' . ((CCGetFromGet("DyP",0)=="")?0:CCGetFromGet("DyP",0)) . ' and SLO = ' . ((CCGetFromGet("s_SLO",0)=="")?0:CCGetFromGet("s_SLO",0)));
							
	$tipo_sl = CCGetFromGet("s_SLO",0)==1? "SLOs":"SLAs";
	if(!$dbReporte->has_next_record()){
		global $mc_reporte_ns;
		$dbReporte->query('Select Nombre_CDS from mc_c_proveedor where id_proveedor=' . CCGetParam("s_id_proveedor",0));
		if($dbReporte->next_record())
			$mc_reporte_ns->Fuente->SetValue($dbReporte->f(0));
				
		$aMeses=array(1=>"enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
		$mc_reporte_ns->Comentario->SetValue("Mediciones ".$tipo_sl." correspondientes a " . $aMeses[CCGetParam("s_MesReporte",1)] . " de " . CCGetParam("s_AnioReporte",0) . " para Niveles de Servicio");
		$mc_reporte_ns->Observaciones->SetValue("Para mayor detalle de la medici�n verificar los archivos de Evidencia, uno por cada requerimiento e incidente reportado.  En el caso de los requerimientos de servicio, las evidencia se generaron en Word, y para los incidentes se generaron en Excel.");
		$mc_reporte_ns->Instrucciones->SetValue("La informaci�n requerida para llenar este formato, corresponde a las tablas del detalle de incidentes y requerimientos de servicio, misma que debe alimentarse en las tablas de las pesta�as Detalle Incidentes NS y Detalle RSS, respectivamente. \n" . 
						"El tablero de control (pesta�a Tablero RSs) y los cuadros de incidentes y requerimientos (pesta�as Cuadro NS Incidentes y Cuadro NS RSS) se llenan autom�ticamente conforme se alimenta la informaci�n de los detalles mencionados.");
	
	}
	$dbReporte->close();
	
		//si falta algun par�metro no muestra el record

//	if(CCGetParam("s_AnioReporte",0)==0 || CCGetParam("s_MesReporte",0)==0 ||  CCGetParam("s_id_proveedor",0)==0 )
//	{
		//echo "x.x";

}
else
{
	global $Panel1;
	$Panel1->Visible=false;
	$mc_reporte_ns1->Errors->addError('Seleccione proveedor');
}
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeInitialize @1-40751EDC
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $TableroExcel; //Compatibility
//End Page_BeforeInitialize

//Custom Code @74-2A29BDB7
// -------------------------

// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

function GeneraReporte(){
	global $db;
	global $Redirect;
	global $PathToRoot;
	global $mc_reporte_ns;


	
	$db= new clsDBcnDisenio;
	//si se envio la forma verifica si ya existe el registro y redirecciona a la informaci�n guardada
	/*
	if(count($_POST)>0 && array_key_exists("Button_Insert",$_POST)){
		
		$db->query("select * from mc_reporte_ns where mesreporte = ". 
					((CCGetFromPost("s_MesReporte",0)=="")?0:CCGetFromPost("s_MesReporte",0)) . 
					" and anioreporte=" . ((CCGetFromPost("s_AnioReporte",0)=="")?0:CCGetFromPost("s_AnioReporte",0)) . 
					" and id_proveedor=" . ((CCGetFromPost("s_id_proveedor",0)=="")?0:CCGetFromPost("s_id_proveedor",0)));
		if($db->has_next_record()){
			$mc_reporte_ns->InsertAllowed = false;
			$Redirect= $PathToRoot .  "TableroExcel.php?" . CCAddParam(CCGetQueryString("QueryString",array("ccsForm","s_id_proveedor")),"s_id_proveedor",$_POST["s_id_proveedor"]) . "&" .
					CCAddParam(CCGetQueryString("QueryString",array("ccsForm","s_MesReporte")),"s_MesReporte",$_POST["s_MesReporte"])  . "&" .
					CCAddParam(CCGetQueryString("QueryString",array("ccsForm","s_AnioReporte")),"s_AnioReporte",$_POST["s_AnioReporte"]) ;	
			header("Location: " . $Redirect );
		}
	}
	*/
	
	
	//se verifica si existe el registro para el mes que se est� creando, si es as� genera el reporte, si no pide los datos.
		global $REPORT;
		global $FILENAME;
		
		global $UID;
		global $PASWD;
		global $SERVICE_URL;

		$UID = CCDLookUp("valor","mc_parametros","parametro='UsrSSRS'",$db);
		$PASWD = CCDLookUp("valor","mc_parametros","parametro='PwdSSRS'",$db);
		$SERVICE_URL = CCDLookUp("valor","mc_parametros","parametro='SSRSURL'",$db);
		
	if(CCGetParam("s_id_proveedor",0)>1) {	

		if( (CCGetParam("DyP",0)==1) AND (CCGetParam("s_SLO",0)==1) ){

			$REPORT="http://webiterasrv2/AnalyticsReports/SLASSDMA4/ReporteDP_SLO.rdl";
			$TipoReporte="DyP";
			$ReporteSLO="_SLO";

		} else if( (CCGetParam("DyP",0)==1) AND (CCGetParam("s_SLO",0)==0) ){
			$REPORT="http://webiterasrv2/AnalyticsReports/SLASSDMA4/ReporteDP.rdl";
			$TipoReporte="DyP";
			$ReporteSLO="";
		} else if( (CCGetParam("s_SLO",0)==1)  AND (CCGetParam("DyP",0)==0) ){
			$REPORT="http://webiterasrv2/AnalyticsReports/SLASSDMA4/ReporteCompleto_SLO.rdl";
			$ReporteSLO="_SLO";
			$TipoReporte="NS";
		} else {
			$REPORT="http://webiterasrv2/AnalyticsReports/SLASSDMA4/ReporteCompleto.rdl";
			$TipoReporte="NS";
			$ReporteSLO="";
		}

		$sCDS= CCGetParam("s_id_proveedor");
			$sCDS=$sCDS-1;
			$tCDS="CDS".$sCDS;
		
		$mesAnio = CCGetParam("s_AnioReporte")."-".CCGetParam("s_MesReporte")."-1";
	
    	$txtcero=CCGetParam("s_MesReporte")<10?"0" . CCGetParam("s_MesReporte"):CCGetParam("s_MesReporte");
		$FILENAME = "Reporte" . $TipoReporte . $ReporteSLO . "_" . $tCDS . "_" . CCGetParam("s_AnioReporte")  . $txtcero .  date("t", strtotime($mesAnio)) . ".xls";



	} else 	{
		if( (CCGetParam("DyP",0)==1) ){

			$REPORT="http://webiterasrv2/AnalyticsReports/SLASSDMA4/ReporteDP_CAPC.rdl";
			$TipoReporte="DeductivasPenalizaciones_";
		} else {
			$REPORT="http://webiterasrv2/AnalyticsReports/SLASSDMA4/ReporteCAPC.rdl";
			$TipoReporte="RepNivelesServicio_";
		}	
		$mesAnio = CCGetParam("s_AnioReporte")."-".CCGetParam("s_MesReporte")."-1";
	
    	$txtcero=CCGetParam("s_MesReporte")<10?"0" . CCGetParam("s_MesReporte"):CCGetParam("s_MesReporte");
		$FILENAME = $TipoReporte . "CAPC_" . CCGetParam("s_AnioReporte")  . $txtcero .  date("t", strtotime($mesAnio)) . ".xls";


	
	}
	
	
		
		try {
			$ssrs_report = new SSRSReport(new Credentials($UID, $PASWD),$SERVICE_URL);
		    $executionInfo = $ssrs_report->LoadReport2($REPORT, NULL);
		
		    $parameters = array();
		    $parameters[0] = new ParameterValue();
		    $parameters[0]->Name = "Mes";
		    $parameters[0]->Value = CCGetParam("s_MesReporte",date("m"-1));
		    $parameters[1] = new ParameterValue();
		    $parameters[1]->Name = "Anio";
		    $parameters[1]->Value = CCGetParam("s_AnioReporte",date("Y"));
		    
			if(CCGetParam("s_id_proveedor",0)>1) {			    
		  	 $parameters[2] = new ParameterValue();
		   	 $parameters[2]->Name = "Proveedor";
		   	 $parameters[2]->Value = CCGetParam("s_id_proveedor",0);
			}
		    $executionInfo = $ssrs_report->SetExecutionParameters2($parameters, "en-us");
			
		    $ssrs_report->LoadReport2($REPORT, NULL);
			$renderAsEXCEL = new RenderAsEXCEL();
			$result_EXCEL = $ssrs_report->Render2($renderAsEXCEL,
													 PageCountModeEnum::$Estimate,
													 $Extension,
													 $MimeType,
													 $Encoding,
													 $Warnings,
													 $StreamIds);
		
			$handle = fopen($FILENAME, 'wb');
			fwrite($handle, $result_EXCEL);
			fclose($handle);
						
			global $PathToRoot;
			$Redirect= $PathToRoot .  "\\" . $FILENAME ;
		 	

		}
		catch(SSRSReportException $serviceExcprion){

			echo $serviceExcprion->GetErrorMessage();
		}
}

?>
