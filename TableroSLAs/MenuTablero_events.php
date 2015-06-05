<?php
// //Events @1-F81417CB

//MenuTablero_BeforeShow @1-683FD57E
function MenuTablero_BeforeShow(& $sender)
{
    $MenuTablero_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $MenuTablero; //Compatibility
//End MenuTablero_BeforeShow

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

//Close MenuTablero_BeforeShow @1-6766B15C
    return $MenuTablero_BeforeShow;
}
//End Close MenuTablero_BeforeShow


?>
