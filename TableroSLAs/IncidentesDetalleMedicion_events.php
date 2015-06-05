<?php
//BindEvents Method @1-6E95E2C6
function BindEvents()
{
    global $mc_info_incidentesSearch;
    global $mc_info_incidentes;
    global $CCSEvents;
    $mc_info_incidentesSearch->Button_DoSearch->CCSEvents["OnClick"] = "mc_info_incidentesSearch_Button_DoSearch_OnClick";
    $mc_info_incidentes->Id_incidente->CCSEvents["BeforeShow"] = "mc_info_incidentes_Id_incidente_BeforeShow";
    $mc_info_incidentes->lblRegistros->CCSEvents["BeforeShow"] = "mc_info_incidentes_lblRegistros_BeforeShow";
    $mc_info_incidentes->Cumple_Inc_TiempoAsignacion->CCSEvents["BeforeShow"] = "mc_info_incidentes_Cumple_Inc_TiempoAsignacion_BeforeShow";
    $mc_info_incidentes->Cumple_Inc_TiempoSolucion->CCSEvents["BeforeShow"] = "mc_info_incidentes_Cumple_Inc_TiempoSolucion_BeforeShow";
    $mc_info_incidentes->Cumple_DISP_SOPORTE->CCSEvents["BeforeShow"] = "mc_info_incidentes_Cumple_DISP_SOPORTE_BeforeShow";
    $mc_info_incidentes->ImageLink1->CCSEvents["BeforeShow"] = "mc_info_incidentes_ImageLink1_BeforeShow";
    $mc_info_incidentes->CCSEvents["BeforeShow"] = "mc_info_incidentes_BeforeShow";
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

//mc_info_incidentes_Cumple_DISP_SOPORTE_BeforeShow @142-48D1D159
function mc_info_incidentes_Cumple_DISP_SOPORTE_BeforeShow(& $sender)
{
    $mc_info_incidentes_Cumple_DISP_SOPORTE_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_Cumple_DISP_SOPORTE_BeforeShow

//Custom Code @162-2A29BDB7
// -------------------------
	if ($mc_info_incidentes->Cumple_DISP_SOPORTE->GetValue()=="1")
	{	$mc_info_incidentes->Cumple_DISP_SOPORTE->SetValue("Images\Cumple.png");}
	else
	{	$mc_info_incidentes->Cumple_DISP_SOPORTE->SetValue("Images\NoCumple.png");}

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes_Cumple_DISP_SOPORTE_BeforeShow @142-9CC0EF19
    return $mc_info_incidentes_Cumple_DISP_SOPORTE_BeforeShow;
}
//End Close mc_info_incidentes_Cumple_DISP_SOPORTE_BeforeShow

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
	global $Redirec;
   	$Redirec =  "IncidentesDetalleMedicion.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","export"),"ccsForm"),"export","1");
	$mc_info_incidentes->ImageLink1->SetLink($Redirec);

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes_ImageLink1_BeforeShow @163-46759E85
    return $mc_info_incidentes_ImageLink1_BeforeShow;
}
//End Close mc_info_incidentes_ImageLink1_BeforeShow

//mc_info_incidentes_BeforeShow @26-64F4663D
function mc_info_incidentes_BeforeShow(& $sender)
{
    $mc_info_incidentes_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_BeforeShow

//Custom Code @68-2A29BDB7
// -------------------------

		
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

/*
	global $DBcnDisenio;
	global $miArray;
  	$miArray = array();
  	
  	
  	$DBcnDisenio->query($mc_info_incidentes->DataSource->SQL);
  	while ($DBcnDisenio->has_next_record())
  	{

  		array_push($miArray,$DBcnDisenio->f(0));
  		$DBcnDisenio->next_record();

  
  	}
	array_push($miArray,$DBcnDisenio->f(0);
	array_push($miArray,"");


$_SESSION['SQL']= serialize($miArray); //$mc_info_incidentes->DataSource->SQL;
*/

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes_BeforeShow @26-F01FD70E
    return $mc_info_incidentes_BeforeShow;
}
//End Close mc_info_incidentes_BeforeShow

//Page_BeforeShow @1-7C796590
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidentesDetalleMedicion; //Compatibility
//End Page_BeforeShow

//Custom Code @70-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeInitialize @1-ADECE656
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidentesDetalleMedicion; //Compatibility
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
