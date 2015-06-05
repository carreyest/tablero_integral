<?php
// //Events @1-F81417CB

//MenuTableroSLOs_BeforeShow @1-F78D99B0
function MenuTableroSLOs_BeforeShow(& $sender)
{
    $MenuTableroSLOs_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $MenuTableroSLOs; //Compatibility
//End MenuTableroSLOs_BeforeShow

//Custom Code @14-2A29BDB7
// -------------------------
	global $Tpl;
	global $Link2;
	global $lkReporteExcel1;
  	if(CCGetSession("GrupoValoracion","")=='SAT'){
	    $Tpl->SetVar("sGrupoSAT",'inline');
  	} else {
  		$Tpl->SetVar("sGrupoSAT",'none');
  	}
  	if(CCGetParam("s_id_proveedor","")!="" && CCGetParam("s_AnioReporte","")!="" && CCGetParam("s_MesReporte","")!=""){
    	$Tpl->SetVar("sParametros",'inline');
    } else {
    	$Tpl->SetVar("sParametros",'none');
    	$Tpl->SetVar("sGrupoSAT",'none');
  	}
  	//dependiendo el proveedor se manda a la página del tablero
  	if(CCGetParam("s_id_proveedor",0)==1){
  		global $PathToRoot;
  		//$lkAnterior->SetLink("PPMCsCrbLista.php?" . CCGetQueryString("QueryString",""));
  		$sender->Link2->SetLink("TableroExcelCAPC.php?" . CCGetQueryString("QueryString",""));
  		$sender->lkReporteExcel1->SetLink("TableroExcelCAPC.php?" . CCGetQueryString("QueryString",""));
  		
  		$vMes  = CCGetParam("s_mes",CCGetParam("s_MesReporte"));
		$vAnio = CCGetParam("s_anio",CCGetParam("s_AnioReporte"));
	
  		$sender->lkDetalleRS->SetLink("SLAsCAPCLista.php?" . CCAddParam(CCAddParam(CCGetQueryString("QueryString",""),"s_mes",$vMes),"s_anio",$vAnio));
  		
  	
  	}
// -------------------------
//End Custom Code

//Close MenuTableroSLOs_BeforeShow @1-BE7DF4F7
    return $MenuTableroSLOs_BeforeShow;
}
//End Close MenuTableroSLOs_BeforeShow
?>
