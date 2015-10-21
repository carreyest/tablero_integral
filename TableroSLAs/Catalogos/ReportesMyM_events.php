<?php
//BindEvents Method @1-D8A85826
function BindEvents()
{
    global $ReportesMyM1;
    global $ReportesMyM2;
    global $CCSEvents;
    $ReportesMyM1->ReportesMyM1_TotalRecords->CCSEvents["BeforeShow"] = "ReportesMyM1_ReportesMyM1_TotalRecords_BeforeShow";
    $ReportesMyM2->ds->CCSEvents["AfterExecuteInsert"] = "ReportesMyM2_ds_AfterExecuteInsert";
    $ReportesMyM2->CCSEvents["AfterUpdate"] = "ReportesMyM2_AfterUpdate";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//ReportesMyM1_ReportesMyM1_TotalRecords_BeforeShow @7-62D3CBD7
function ReportesMyM1_ReportesMyM1_TotalRecords_BeforeShow(& $sender)
{
    $ReportesMyM1_ReportesMyM1_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReportesMyM1; //Compatibility
//End ReportesMyM1_ReportesMyM1_TotalRecords_BeforeShow

//Retrieve number of records @8-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close ReportesMyM1_ReportesMyM1_TotalRecords_BeforeShow @7-045931C1
    return $ReportesMyM1_ReportesMyM1_TotalRecords_BeforeShow;
}
//End Close ReportesMyM1_ReportesMyM1_TotalRecords_BeforeShow

//ReportesMyM2_ds_AfterExecuteInsert @26-E10919E1
function ReportesMyM2_ds_AfterExecuteInsert(& $sender)
{
    $ReportesMyM2_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReportesMyM2; //Compatibility
//End ReportesMyM2_ds_AfterExecuteInsert

//Custom Code @50-2A29BDB7
// -------------------------
    global $DBcnDisenio;
	$DBcnDisenio->query("select idReporte,nombre from ReportesMyM where IdReporte = (select MAX(idReporte) from ReportesMyM)" );
	if($DBcnDisenio->next_record()){
		$sInsert="insert into usuario_reporteMyM(id_usuario, id_reporte, activo, nombre_reporte,usuario) 
				  select id, ".$DBcnDisenio->f("idReporte").",0,'".$DBcnDisenio->f("nombre")."',Usuario  from mc_c_usuarios";	
	}
	$DBcnDisenio->query($sInsert);    
    // Write your own code here.
// -------------------------
//End Custom Code

//Close ReportesMyM2_ds_AfterExecuteInsert @26-2AEB48BC
    return $ReportesMyM2_ds_AfterExecuteInsert;
}
//End Close ReportesMyM2_ds_AfterExecuteInsert

//ReportesMyM2_AfterUpdate @26-853227F8
function ReportesMyM2_AfterUpdate(& $sender)
{
    $ReportesMyM2_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReportesMyM2; //Compatibility
//End ReportesMyM2_AfterUpdate

//Custom Code @56-2A29BDB7
// -------------------------
        global $DBcnDisenio;
    	if (CCGetParam("IdReporte") != '')
	{

    	$DBcnDisenio->query("update usuario_reporteMyM set nombre_reporte='".$ReportesMyM2->Nombre->GetValue()."' where id_reporte = ".CCGetParam("IdReporte") );
	}

// -------------------------
//End Custom Code

//Close ReportesMyM2_AfterUpdate @26-97FB5944
    return $ReportesMyM2_AfterUpdate;
}
//End Close ReportesMyM2_AfterUpdate

//Page_BeforeShow @1-11CD6D5D
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ReportesMyM; //Compatibility
//End Page_BeforeShow

//Custom Code @2-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
