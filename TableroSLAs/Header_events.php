<?php

// //Events @1-F81417CB

//Header_pnlMenu_BeforeShow @14-F2DF091B
function Header_pnlMenu_BeforeShow(& $sender)
{
    $Header_pnlMenu_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Header; //Compatibility
//End Header_pnlMenu_BeforeShow

//Custom Code @19-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Header_pnlMenu_BeforeShow @14-E7393C77
    return $Header_pnlMenu_BeforeShow;
}
//End Close Header_pnlMenu_BeforeShow

//Header_BeforeShow @1-19A6F438
function Header_BeforeShow(& $sender)
{
    $Header_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Header; //Compatibility
//End Header_BeforeShow

//Custom Code @9-2A29BDB7
// -------------------------
	global $PathToRoot;
	global $Panel1;
	global $Tpl;
	$Tpl->SetVar("imgUserPath",$PathToRoot  . "images/user.png");
	$Tpl->SetVar("imgCierrePath",$PathToRoot  . "images/cierre.png");
	$Tpl->SetVar("imgCierre2Path",$PathToRoot  . "images/cierre2.png");
    $Component->hdLogoPath->SetValue($PathToRoot . "SDMA_CAPCV.png");
    
    if(CCGetUserLogin()==""){
    	$Component->Panel1->Visible=false;
    	$Component->Panel2->Visible=false;
    } else {
    	$Component->lSesion->SetValue(CCGetUserLogin());
    }
    if(CCGetSession("GrupoValoracion")=="CAPC"){
    	$Component->pnlMenu->Visible=true;
    	$Component->Panel2->Visible=true;
    } else {
    	if(CCGetSession("GrupoValoracion")=="SLAs"){
    		$Component->pnlMenu->Visible=false;
    		$Component->Panel2->Visible=true;
    	} else {
    		$Component->pnlMenu->Visible=false;
    		$Component->Panel2->Visible=false;
    	}
    }
    if(CCGetGroupID()<5){
    	$Component->pnlMenuAdmin->Visible=false;
    	}
// -------------------------
//End Custom Code

//Close Header_BeforeShow @1-E0152CE0
    return $Header_BeforeShow;
}
//End Close Header_BeforeShow
?>