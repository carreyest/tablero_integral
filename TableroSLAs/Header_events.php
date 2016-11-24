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
    	$Component->Panel4->Visible=false;
    } else {
    	$Component->lSesion->SetValue(CCGetSession('NombreCorto'));
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
    	if(CCGetGroupID()==4 && CCGetSession("GrupoValoracion")=="MyM"){
    		$Component->pnlMenu->Visible=true;
    		$Component->Panel3->Visible=false;
    		$Component->pnlMenuAdmin->Visible=true;
    	} 
    }
    if(CCGetSession("Rape",0)==1) {
	   	$Component->Link6->Visible = false;
    	$Component->LabelReportesSitioSAT->Visible = true;
    	$Component->LabelReportesSitioSAT->SetValue("Reportes Sitio SAT");
    } else {
   	   	$Component->Link6->Visible = true;
    	$Component->LabelReportesSitioSAT->Visible = false;

    }
/*
	   	   	$Component->Link7->Visible = true;
	   	   	$Component->Link7->SetLink("http://webiterasrv2:8080/CargaSegOperativo/rep_seg_operativo.php");
	    	$Component->LabelSeguimientoOperativo->Visible = false;
*/

        if (CCGetUserID()!='') {
	        global $db;
		    $db= new clsDBcnDisenio;
			$aut_segoperativo = CCDLookUp("Seg_Operativo" ,"mc_c_usuarios","id= " . CCGetUserID() , $db);
	    	$db->close();
	
		    if($aut_segoperativo == 0) {
			   	$Component->Link7->Visible = false;
		    	$Component->LabelSeguimientoOperativo->Visible = true;
		    	$Component->LabelSeguimientoOperativo->SetValue("Seguimiento Operativo");
		    } else {
		   	   	$Component->Link7->Visible = true;
		   	   	$Component->Link7->SetLink("/CargaSegOperativo/rep_seg_operativo.php");
		    	$Component->LabelSeguimientoOperativo->Visible = false;
		
		    }
        }
   
    global $id_repo;
    
    if ((CCGetUserLogin()=="fjaime"))
    {
    
    if ( CCGetParam("fullscreen",0)==1) {    	
    	$Component->img_abre_pantalla->SetValue("images/cierra_verde.jpg");
    	$Component->img_abre_pantalla->SetLink(str_replace("fullscreen=0","fullscreen=1",$Component->img_abre_pantalla->GetLink()));
    }
    } 
    
    $id_repo=CCGetParam("IdReporte",0) ; 
   if($id_repo<1)
    	$Component->img_abre_pantalla->Visible=false;
    	
    global $FileName;
    //echo  $FileName."hola";
    if ($FileName!="MuestraReporte.php"){
    	$Component->img_abre_pantalla->Visible=false;
   }
// -------------------------
//End Custom Code

//Close Header_BeforeShow @1-E0152CE0
    return $Header_BeforeShow;
}
//End Close Header_BeforeShow
?>
