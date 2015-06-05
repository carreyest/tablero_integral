<?php
//BindEvents Method @1-38180087
function BindEvents()
{
    global $mc_info_rs_cr_RE_RC_Artef;
    $mc_info_rs_cr_RE_RC_Artef->Label1->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RE_RC_Artef_Label1_BeforeShow";
    $mc_info_rs_cr_RE_RC_Artef->PctDeductiva->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RE_RC_Artef_PctDeductiva_BeforeShow";
    $mc_info_rs_cr_RE_RC_Artef->ImageLink1->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RE_RC_Artef_ImageLink1_BeforeShow";
    $mc_info_rs_cr_RE_RC_Artef->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RE_RC_Artef_BeforeShow";
    $mc_info_rs_cr_RE_RC_Artef->ds->CCSEvents["BeforeBuildSelect"] = "mc_info_rs_cr_RE_RC_Artef_ds_BeforeBuildSelect";
}
//End BindEvents Method


//mc_info_rs_cr_RE_RC_Artef_Label1_BeforeShow @80-31D75FDC
function mc_info_rs_cr_RE_RC_Artef_Label1_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef_Label1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef_Label1_BeforeShow

//Custom Code @81-2A29BDB7
// -------------------------
	$mc_info_rs_cr_RE_RC_Artef->Label1->SetValue ($mc_info_rs_cr_RE_RC_Artef->RowNumber);
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef_Label1_BeforeShow @80-7E336D9C
    return $mc_info_rs_cr_RE_RC_Artef_Label1_BeforeShow;
}
//End Close mc_info_rs_cr_RE_RC_Artef_Label1_BeforeShow

//mc_info_rs_cr_RE_RC_Artef_PctDeductiva_BeforeShow @82-486A4A35
function mc_info_rs_cr_RE_RC_Artef_PctDeductiva_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef_PctDeductiva_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef_PctDeductiva_BeforeShow

//Custom Code @83-2A29BDB7
// -------------------------
	if ($mc_info_rs_cr_RE_RC_Artef->PctDeductiva->GetValue() != ""){
		$mc_info_rs_cr_RE_RC_Artef->PctDeductiva->SetValue($mc_info_rs_cr_RE_RC_Artef->PctDeductiva->GetValue() . " %");
	}
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef_PctDeductiva_BeforeShow @82-5323EA31
    return $mc_info_rs_cr_RE_RC_Artef_PctDeductiva_BeforeShow;
}
//End Close mc_info_rs_cr_RE_RC_Artef_PctDeductiva_BeforeShow

//mc_info_rs_cr_RE_RC_Artef_ImageLink1_BeforeShow @84-11C1C50C
function mc_info_rs_cr_RE_RC_Artef_ImageLink1_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef_ImageLink1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef_ImageLink1_BeforeShow

//Custom Code @85-2A29BDB7
// -------------------------
	global $Redirec;
   	$Redirec =  "ArtefactosDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","export"),"ccsForm"),"export","1");
	$mc_info_rs_cr_RE_RC_Artef->ImageLink1->SetLink($Redirec);
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef_ImageLink1_BeforeShow @84-FDB65943
    return $mc_info_rs_cr_RE_RC_Artef_ImageLink1_BeforeShow;
}
//End Close mc_info_rs_cr_RE_RC_Artef_ImageLink1_BeforeShow

//mc_info_rs_cr_RE_RC_Artef_BeforeShow @57-A7404468
function mc_info_rs_cr_RE_RC_Artef_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef_BeforeShow

//Custom Code @86-2A29BDB7
// -------------------------
	global $mc_info_rs_cr_RE_RC_Artef;
	global $Panel1;
	global $ExportToExcel;
	$ExportFileName = "ListaDeArtefactos.xls";
			
	if (CCGetFromGet("export","") == "1") {
		$mc_info_rs_cr_RE_RC_Artef->ImageLink1->Visible=false;
		$mc_info_rs_cr_RE_RC_Artef->Panel1->Visible = false;
		$Panel1->Visible = false;
		//Set Content type to Excel
	 	header("Content-Type: application/vnd.ms-excel");
	 	//Fix IE 5.0-5.5 bug with Content-Disposition=attachment
		if (strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.5;") || strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.0;")) {
			header("Content-Disposition: filename=" . $ExportFileName);
		} else {
			header("Content-Disposition: attachment; filename=" . $ExportFileName);
	 	}  
	}
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef_BeforeShow @57-06034404
    return $mc_info_rs_cr_RE_RC_Artef_BeforeShow;
}
//End Close mc_info_rs_cr_RE_RC_Artef_BeforeShow

//mc_info_rs_cr_RE_RC_Artef_ds_BeforeBuildSelect @57-06D263D5
function mc_info_rs_cr_RE_RC_Artef_ds_BeforeBuildSelect(& $sender)
{
    $mc_info_rs_cr_RE_RC_Artef_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RE_RC_Artef; //Compatibility
//End mc_info_rs_cr_RE_RC_Artef_ds_BeforeBuildSelect

//Custom Code @104-2A29BDB7
// -------------------------
    if (CCGetFromGet("export","") == "1") {
		//Show up to 10,000 records
	    $mc_info_rs_cr_RE_RC_Artef->PageSize = 10000;
	    $mc_info_rs_cr_RE_RC_Artef->ds->PageSize = 10000;
		//Hide the Navigator
	    $mc_info_rs_cr_RE_RC_Artef->Navigator->Visible = false;
    }
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RE_RC_Artef_ds_BeforeBuildSelect @57-B8784739
    return $mc_info_rs_cr_RE_RC_Artef_ds_BeforeBuildSelect;
}
//End Close mc_info_rs_cr_RE_RC_Artef_ds_BeforeBuildSelect


?>
