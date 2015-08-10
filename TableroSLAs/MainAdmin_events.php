<?php
//BindEvents Method @1-D40060DD
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Page_BeforeShow @1-3F75A81D
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $MainAdmin; //Compatibility
//End Page_BeforeShow

//Custom Code @15-2A29BDB7
// -------------------------
    if(CCGetGroupID()<5){
    	$Component->Link8->Visible=false;
    	$Component->Link9->Visible=false;
    }
    if(CCGetSession("GrupoValoracion")=="MyM"){
    	$Component->Link1->Visible=false;
    	$Component->Link2->Visible=false;
    	$Component->Link3->Visible=false;
    	$Component->Link4->Visible=false;
    	$Component->Link5->Visible=false;
    	$Component->Link6->Visible=false;
    	$Component->Link7->Visible=false;
    }
    
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
