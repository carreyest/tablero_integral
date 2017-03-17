<?php
//BindEvents Method @1-42DF831C
function BindEvents()
{
    global $mc_info_incidentesSearch;
    global $mc_info_incidentes;
    global $CCSEvents;
    $mc_info_incidentesSearch->Button_DoSearch->CCSEvents["OnClick"] = "mc_info_incidentesSearch_Button_DoSearch_OnClick";
    $mc_info_incidentes->lblRegistros->CCSEvents["BeforeShow"] = "mc_info_incidentes_lblRegistros_BeforeShow";
    $mc_info_incidentes->ImageLink1->CCSEvents["BeforeShow"] = "mc_info_incidentes_ImageLink1_BeforeShow";
    $mc_info_incidentes->Id_incidente->CCSEvents["BeforeShow"] = "mc_info_incidentes_Id_incidente_BeforeShow";
    $mc_info_incidentes->Cumple_Inc_TiempoAsignacion->CCSEvents["BeforeShow"] = "mc_info_incidentes_Cumple_Inc_TiempoAsignacion_BeforeShow";
    $mc_info_incidentes->Cumple_Inc_TiempoSolucion->CCSEvents["BeforeShow"] = "mc_info_incidentes_Cumple_Inc_TiempoSolucion_BeforeShow";
    $mc_info_incidentes->CCSEvents["BeforeShow"] = "mc_info_incidentes_BeforeShow";
    $mc_info_incidentes->CCSEvents["BeforeShowRow"] = "mc_info_incidentes_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_info_incidentesSearch_Button_DoSearch_OnClick @3-1927404C
function mc_info_incidentesSearch_Button_DoSearch_OnClick(& $sender)
{
    $mc_info_incidentesSearch_Button_DoSearch_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentesSearch; //Compatibility
//End mc_info_incidentesSearch_Button_DoSearch_OnClick

//Custom Code @67-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentesSearch_Button_DoSearch_OnClick @3-FB13FAAF
    return $mc_info_incidentesSearch_Button_DoSearch_OnClick;
}
//End Close mc_info_incidentesSearch_Button_DoSearch_OnClick

//mc_info_incidentes_lblRegistros_BeforeShow @85-DE081327
function mc_info_incidentes_lblRegistros_BeforeShow(& $sender)
{
    $mc_info_incidentes_lblRegistros_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_lblRegistros_BeforeShow

//Retrieve number of records @86-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close mc_info_incidentes_lblRegistros_BeforeShow @85-D4552926
    return $mc_info_incidentes_lblRegistros_BeforeShow;
}
//End Close mc_info_incidentes_lblRegistros_BeforeShow

//mc_info_incidentes_ImageLink1_BeforeShow @163-DB812DCE
function mc_info_incidentes_ImageLink1_BeforeShow(& $sender)
{
    $mc_info_incidentes_ImageLink1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_ImageLink1_BeforeShow

//Custom Code @164-2A29BDB7
// -------------------------
	global $Redirect;
   	$Redirect =  "IncidentesDetalleMedicion.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","export"),"ccsForm"),"export","1");
	$mc_info_incidentes->ImageLink1->SetLink($Redirect);

// -------------------------
//End Custom Code

//Close mc_info_incidentes_ImageLink1_BeforeShow @163-46759E85
    return $mc_info_incidentes_ImageLink1_BeforeShow;
}
//End Close mc_info_incidentes_ImageLink1_BeforeShow

//mc_info_incidentes_Id_incidente_BeforeShow @38-20E854EF
function mc_info_incidentes_Id_incidente_BeforeShow(& $sender)
{
    $mc_info_incidentes_Id_incidente_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_Id_incidente_BeforeShow

//Custom Code @66-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes_Id_incidente_BeforeShow @38-54C9C8C7
    return $mc_info_incidentes_Id_incidente_BeforeShow;
}
//End Close mc_info_incidentes_Id_incidente_BeforeShow

//mc_info_incidentes_Cumple_Inc_TiempoAsignacion_BeforeShow @140-93DFB80B
function mc_info_incidentes_Cumple_Inc_TiempoAsignacion_BeforeShow(& $sender)
{
    $mc_info_incidentes_Cumple_Inc_TiempoAsignacion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_Cumple_Inc_TiempoAsignacion_BeforeShow

//Custom Code @160-2A29BDB7
// -------------------------
	if ($mc_info_incidentes->Cumple_Inc_TiempoAsignacion->GetValue()=="1")
	{	$mc_info_incidentes->Cumple_Inc_TiempoAsignacion->SetValue("Images\Cumple.png");}
	else
	{	$mc_info_incidentes->Cumple_Inc_TiempoAsignacion->SetValue("Images\NoCumple.png");}
	
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes_Cumple_Inc_TiempoAsignacion_BeforeShow @140-2D18390E
    return $mc_info_incidentes_Cumple_Inc_TiempoAsignacion_BeforeShow;
}
//End Close mc_info_incidentes_Cumple_Inc_TiempoAsignacion_BeforeShow

//mc_info_incidentes_Cumple_Inc_TiempoSolucion_BeforeShow @141-DEE40D57
function mc_info_incidentes_Cumple_Inc_TiempoSolucion_BeforeShow(& $sender)
{
    $mc_info_incidentes_Cumple_Inc_TiempoSolucion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_Cumple_Inc_TiempoSolucion_BeforeShow

//Custom Code @161-2A29BDB7
// -------------------------
	if ($mc_info_incidentes->Cumple_Inc_TiempoSolucion->GetValue()=="1")
	{	$mc_info_incidentes->Cumple_Inc_TiempoSolucion->SetValue("Images\Cumple.png");}
	else
	{	$mc_info_incidentes->Cumple_Inc_TiempoSolucion->SetValue("Images\NoCumple.png");}


    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes_Cumple_Inc_TiempoSolucion_BeforeShow @141-59777C1A
    return $mc_info_incidentes_Cumple_Inc_TiempoSolucion_BeforeShow;
}
//End Close mc_info_incidentes_Cumple_Inc_TiempoSolucion_BeforeShow

//DEL  // -------------------------
//DEL  	if ($mc_info_incidentes->Cumple_DISP_SOPORTE->GetValue()=="1")
//DEL  	{	$mc_info_incidentes->Cumple_DISP_SOPORTE->SetValue("Images\Cumple.png");}
//DEL  	else
//DEL  	{	$mc_info_incidentes->Cumple_DISP_SOPORTE->SetValue("Images\NoCumple.png");}
//DEL  
//DEL      // Write your own code here.
//DEL  // -------------------------

//mc_info_incidentes_BeforeShow @26-64F4663D
function mc_info_incidentes_BeforeShow(& $sender)
{
    $mc_info_incidentes_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_BeforeShow
	global $mc_info_incidentesSearch;
//Custom Code @68-2A29BDB7
// -------------------------

	 $mesCons=CCGetParam("s_MesReporte",0);
	 $anioCons=CCGetParam("s_AnioReporte",0);


	if ($mc_info_incidentesSearch->s_MesReporte->GetValue()!=0)
  	 {
	    $mesCons = $mc_info_incidentesSearch->s_MesReporte->GetValue();	       
	    $anioCons = $mc_info_incidentesSearch->s_AnioReporte->GetValue();

	    if (($anioCons==2016 and $mesCons==7)){
	    	$temp =  $mc_info_incidentes->Id_incidente->GetLink();
	    	//$temp = str_replace("&amp;","&",$temp);
			$mc_info_incidentes->Id_incidente->SetLink(str_replace('IncidenteDetalle.php','IncidenteDetalle3.php',$temp));
	    }
	    if (($anioCons==2016 and $mesCons>=8) OR ($anioCons==2017 and $mesCons==1)){
	    	$temp =  $mc_info_incidentes->Id_incidente->GetLink();
	    	//$temp = str_replace("&amp;","&",$temp);
			$mc_info_incidentes->Id_incidente->SetLink(str_replace('IncidenteDetalle.php','IncidenteDetalle2.php',$temp));
	    }
	    if (($anioCons==2017 and $mesCons>=2)){
	    	$temp =  $mc_info_incidentes->Id_incidente->GetLink();
	    	//$temp = str_replace("&amp;","&",$temp);
			$mc_info_incidentes->Id_incidente->SetLink(str_replace('IncidenteDetalle.php','IncidenteDetalle4.php',$temp));
	    }
  	
  	 }
 
	 
		global $ExportToExcel;
		
			global $Grid1;
		
			$ExportFileName = "ListOfCourses.xls";
		 if (CCGetFromGet("export","") == "1") {
			//Set Content type to Excel
		 header("Content-Type: application/vnd.ms-excel");
		 //Fix IE 5.0-5.5 bug with Content-Disposition=attachment
			if (strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.5;") || 
		 strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.0;")) {
			header("Content-Disposition: filename=" . $fFileName);
			} else {
			header("Content-Disposition: attachment; filename=" . $ExportFileName);
		 }  
 		 }


    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes_BeforeShow @26-F01FD70E
    return $mc_info_incidentes_BeforeShow;
}
//End Close mc_info_incidentes_BeforeShow

//mc_info_incidentes_BeforeShowRow @26-EA447497
function mc_info_incidentes_BeforeShowRow(& $sender)
{
    $mc_info_incidentes_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_BeforeShowRow

//Custom Code @200-2A29BDB7
// -------------------------

    $mc_info_incidentes->Id_incidente->SetLink(str_replace('&amp;','&',$mc_info_incidentes->Id_incidente->GetLink())."&s_mes_param=".CCGetParam("s_MesReporte",0)."&s_anio_param=".CCGetParam("s_AnioReporte",0));
	switch (CCGetParam("s_id_proveedor",0)){
	//case 1 : $sProveedor = 'Evidencia_CAPC';break;
	case 2 : $sProveedor = 'Evidencias_CDS1y3';break;
	case 3 : $sProveedor = 'Evidencias_CDS2';break;
	//default: $sProveedor = 'Evidencias_CAPC';break;
	default: $sProveedor = 'Evidencias_CDS1y3';break;					
	}

	if(CCGetParam("s_MesReporte",0)<10){
		$sMes = "0" . CCGetParam("s_MesReporte",0);
	} else {
		$sMes = CCGetParam("s_MesReporte",0);
	}
	
	//$mc_info_incidentes->lkEvidencia->SetLink("http://satportal.dssat.sat.gob.mx/agcti/SDMA4-Admvo/Documentos compartidos/Operaci�n del Servicio/Itera/" . CCGetParam("s_AnioReporte","") . $sMes . "/EntregablesPeri�dicos/NivelesServicio/". $sProveedor ."/");
	
	if(CCGetParam("s_AnioReporte",0)==2015 && CCGetParam("s_MesReporte",0) <=9){
		$mc_info_incidentes->lkEvidencia->SetLink("http://sp13.dssat.sat.gob.mx/agcti/SDMA4-Admvo/Documentos%20compartidos/Forms/AllItems.aspx?RootFolder=%2Fagcti%2FSDMA4-Admvo%2FDocumentos%20compartidos%2FOperaci%C3%B3n%20del%20Servicio%2FItera%2F" . CCGetParam("s_AnioReporte","") . $sMes . "%2FEntregablesPeri%C3%B3dicos%2FNivelesServicio%2F". $sProveedor ."&FolderCTID=0x01200071A81A8B7B487F48A627E6ED3D7DC299&View=%7B96E558AB-DAB0-46EF-8563-31FCBBF53212%7D");											 
	} elseif( (CCGetParam("s_AnioReporte",0)==2015 && CCGetParam("s_MesReporte",0) >=10) OR
	          (CCGetParam("s_AnioReporte",0)==2016 && CCGetParam("s_MesReporte",0) <=8)
	         ){
				$mc_info_incidentes->lkEvidencia->SetLink("http://sp13.dssat.sat.gob.mx/agcti/SDMA4-Admvo/Documentos%20compartidos/Forms/AllItems.aspx?RootFolder=%2Fagcti%2FSDMA4-Admvo%2FDocumentos%20compartidos%2FOperaci%C3%B3n%20del%20Servicio%2FItera%2F" . CCGetParam("s_AnioReporte","") . $sMes . "%2FNivelesServicio%2F". $sProveedor ."&FolderCTID=0x01200071A81A8B7B487F48A627E6ED3D7DC299&View=%7B96E558AB-DAB0-46EF-8563-31FCBBF53212%7D");											 		
	         } else {
				$mc_info_incidentes->lkEvidencia->SetLink("http://sp13.dssat.sat.gob.mx/agcti/CAPC_ITERA4/Entregables%20Contractuales/Forms/AllItems.aspx?RootFolder=%2Fagcti%2FCAPC%5FITERA4%2FEntregables%20Contractuales%2FItera%2F" . CCGetParam("s_AnioReporte","") . $sMes . "%2FNivelesServicio%2F". $sProveedor ."&FolderCTID=0x01200071A81A8B7B487F48A627E6ED3D7DC299&View=%7B96E558AB-DAB0-46EF-8563-31FCBBF53212%7D");											 			         
	         }
	

/*    
	if (CCGetParam("s_id_proveedor")==4){
		$sProveedor ="3y4";
	} else {
		$sProveedor =CCGetParam("s_id_proveedor");
	}
	if(CCGetParam("s_MesReporte")<10){
		$sMes = "0" . CCGetParam("s_MesReporte");
	} else {
		$sMes = CCGetParam("s_MesReporte");
	}

	//$mc_info_incidentes->lkEvidencia->SetLink("http://satportal.dssat.sat.gob.mx/agcti/CAPC_ITERA/SDMA3/AdmonContrato/CAPC/Entregables_C/" . CCGetParam("s_AnioReporte","") . $sMes .  "/MC/Evidencia_CDS" . $sProveedor  . "/"); 
*/
		// . $mc_info_incidentes->id_ppmc->GetValue() . "_A.doc");
	
	//si es el SAT cambia la liga al repositorio de evidencia
	global $db;
	$db= new clsDBcnDisenio;
	if(CCDLookUp("Grupo","mc_c_usuarios","id= " . CCGetUserID() , $db) == "SAT"){
		$mc_info_incidentes->Id_incidente->SetLink($mc_info_incidentes->lkEvidencia->GetLink());
		if(CCGetParam("s_AnioReporte",0)>2013){
			$Redirect =  "CalificaIncidenteSAT.php?" . CCAddParam(CCGetQueryString("QueryString","export"),"Id_incidente",$mc_info_incidentes->Id_incidente->GetValue());
			$mc_info_incidentes->Id_incidente->SetLink($Redirect);
		}
	}

	if($mc_info_incidentes->DataSource->f("medido")==1 || CCGetSession("GrupoValoracion")=="CAPC"){
		$mc_info_incidentes->Panel1->Visible=true;
	} else {
		$mc_info_incidentes->Panel1->Visible=false;
	}
	
// -------------------------
//End Custom Code

//Close mc_info_incidentes_BeforeShowRow @26-9B24BC81
    return $mc_info_incidentes_BeforeShowRow;
}
//End Close mc_info_incidentes_BeforeShowRow

//Page_BeforeShow @1-3522CE4A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidentesDetalleNS; //Compatibility
//End Page_BeforeShow

//Custom Code @70-2A29BDB7
// -------------------------
    global $mc_info_incidentes;
    global $mc_info_incidentesSearch;
    //$mc_info_incidentesSearch->Visible =(CCGetSession("GrupoValoracion")=="CAPC" || CCGetSession("GrupoValoracion")=="SAT");
	$mc_info_incidentesSearch->Visible =True;

	global $DBcnDisenio;
	$DBcnDisenio= new clsDBcnDisenio;
	global $miArray;
  	$miArray = array();
  	
  	
  	$DBcnDisenio->query($mc_info_incidentes->DataSource->SQL);
  	while ($DBcnDisenio->has_next_record())
  	{

  		array_push($miArray,$DBcnDisenio->f(0));
  		$DBcnDisenio->next_record();

  
  	}
	array_push($miArray,$DBcnDisenio->f(0));
	array_push($miArray,"");


$_SESSION['SQL']= serialize($miArray); //$mc_info_incidentes->DataSource->SQL;



// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeInitialize @1-69DBC8AC
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidentesDetalleNS; //Compatibility
//End Page_BeforeInitialize

//Custom Code @71-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize


?>
