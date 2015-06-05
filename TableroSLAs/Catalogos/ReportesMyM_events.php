<?php
//BindEvents Method @1-116D87C6
function BindEvents()
{
    global $ReportesMyM1;
    global $CCSEvents;
    $ReportesMyM1->ReportesMyM1_TotalRecords->CCSEvents["BeforeShow"] = "ReportesMyM1_ReportesMyM1_TotalRecords_BeforeShow";
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
