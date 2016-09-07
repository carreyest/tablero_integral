<?php
//BindEvents Method @1-AF8E8E7E
function BindEvents()
{
    global $mc_info_incidentesSearch;
    global $mc_info_incidentes;
    global $CCSEvents;
    $mc_info_incidentesSearch->Button_DoSearch->CCSEvents["OnClick"] = "mc_info_incidentesSearch_Button_DoSearch_OnClick";
    $mc_info_incidentesSearch->s_anio_param->ds->CCSEvents["BeforeBuildSelect"] = "mc_info_incidentesSearch_s_anio_param_ds_BeforeBuildSelect";
    $mc_info_incidentes->Id_incidente->CCSEvents["BeforeShow"] = "mc_info_incidentes_Id_incidente_BeforeShow";
    $mc_info_incidentes->lblRegistros->CCSEvents["BeforeShow"] = "mc_info_incidentes_lblRegistros_BeforeShow";
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

//mc_info_incidentesSearch_s_anio_param_ds_BeforeBuildSelect @51-DC6FA573
function mc_info_incidentesSearch_s_anio_param_ds_BeforeBuildSelect(& $sender)
{
    $mc_info_incidentesSearch_s_anio_param_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentesSearch; //Compatibility
//End mc_info_incidentesSearch_s_anio_param_ds_BeforeBuildSelect

//Custom Code @177-2A29BDB7
// -------------------------
    if(CCGetSession("GrupoValoracion","")=="CAPC"){
    	$mc_info_incidentesSearch->s_anio_param->DataSource->SQL="select * from mc_c_anio";
    	$mc_info_incidentesSearch->s_anio_param->DataSource->Where="";
    	}
// -------------------------
//End Custom Code

//Close mc_info_incidentesSearch_s_anio_param_ds_BeforeBuildSelect @51-94AD2CE8
    return $mc_info_incidentesSearch_s_anio_param_ds_BeforeBuildSelect;
}
//End Close mc_info_incidentesSearch_s_anio_param_ds_BeforeBuildSelect

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

	global $DBcnDisenio;
	global $miArray;
	global $mc_info_incidentesSearch;
  	$miArray = array();
  	
    //Modificación para llamar a un segundo detalle para aplicar solicitud a partir de Agosto 2016; 
    
	    $mesCons = $mc_info_incidentesSearch->s_mes_param->GetValue();
	    $anioCons = $mc_info_incidentesSearch->s_anio_param->GetValue();
	    if (($anioCons==2016 and $mesCons>=8) OR ($anioCons>2016)){
	    	$temp =  $mc_info_incidentes->Id_incidente->GetLink();
	    	$temp = str_replace("&amp;","&",$temp);
			$mc_info_incidentes->Id_incidente->SetLink(str_replace('IncidenteDetalle.php','IncidenteDetalle2.php',$temp));
	    }
  	
  	
  	$DBcnDisenio->query($mc_info_incidentes->DataSource->SQL);
  	while ($DBcnDisenio->has_next_record())
  	{

  		array_push($miArray,$DBcnDisenio->f(0));
  		$DBcnDisenio->next_record();

  
  	}
	array_push($miArray,$DBcnDisenio->f(0));
	array_push($miArray,"");

//$_SESSION['SQLUrl']=CCGetQueryString("QueryString","Id");

//echo $miArray[2];

$_SESSION['SQL']= serialize($miArray); //$mc_info_incidentes->DataSource->SQL;

    if(CCGetSession("GrupoValoracion")!="CAPC"){
    	$mc_info_incidentes->analista->Visible=false;
    	$mc_info_incidentes->lAnalista->Visible=false;
    }
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

//Custom Code @208-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes_BeforeShowRow @26-9B24BC81
    return $mc_info_incidentes_BeforeShowRow;
}
//End Close mc_info_incidentes_BeforeShowRow

//Page_BeforeShow @1-E4231228
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidentesLista; //Compatibility
//End Page_BeforeShow

//Custom Code @70-2A29BDB7
// -------------------------
    global $mc_info_incidentesSearch;
    $mc_info_incidentesSearch->Visible=(CCGetSession("GrupoValoracion")=="CAPC");
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeInitialize @1-D09D5F1C
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidentesLista; //Compatibility
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
