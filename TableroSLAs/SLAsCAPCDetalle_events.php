<?php
//BindEvents Method @1-05DE5171
function BindEvents()
{
    global $mc_calificacion_capc;
    global $CCSEvents;
    $mc_calificacion_capc->FechaFirmaCAES->CCSEvents["BeforeShow"] = "mc_calificacion_capc_FechaFirmaCAES_BeforeShow";
    $mc_calificacion_capc->CCSEvents["BeforeShow"] = "mc_calificacion_capc_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_calificacion_capc_FechaFirmaCAES_BeforeShow @59-33870576
function mc_calificacion_capc_FechaFirmaCAES_BeforeShow(& $sender)
{
    $mc_calificacion_capc_FechaFirmaCAES_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_capc; //Compatibility
//End mc_calificacion_capc_FechaFirmaCAES_BeforeShow

//Close mc_calificacion_capc_FechaFirmaCAES_BeforeShow @59-D780BEBB
    return $mc_calificacion_capc_FechaFirmaCAES_BeforeShow;
}
//End Close mc_calificacion_capc_FechaFirmaCAES_BeforeShow

//mc_calificacion_capc_BeforeShow @3-5FF7ECB3
function mc_calificacion_capc_BeforeShow(& $sender)
{
    $mc_calificacion_capc_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_capc; //Compatibility
//End mc_calificacion_capc_BeforeShow

//Custom Code @77-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio;
    global $DBcnDisenio;
	$DBcnDisenio->query('SELECT TipoMedicion FROM mc_calificacion_capc where id='. CCGetParam("id",0));
		if($DBcnDisenio->has_next_record()){
			$DBcnDisenio->next_record();
				if($DBcnDisenio->f("TipoMedicion")!="PC" ){
					$mc_calificacion_capc->Button_Insert->Visible=false;
					$mc_calificacion_capc->Button_Update->Visible=false;
					//$mc_calificacion_capc->Button_Delete->Visible=false;
				} 
	}

// -------------------------
//End Custom Code

//Close mc_calificacion_capc_BeforeShow @3-4A8DC635
    return $mc_calificacion_capc_BeforeShow;
}
//End Close mc_calificacion_capc_BeforeShow

//Page_BeforeShow @1-1443ABB5
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SLAsCAPCDetalle; //Compatibility
//End Page_BeforeShow

//Custom Code @91-2A29BDB7
// -------------------------
    global $lkAnterior;
    global $lkSiguiente;
    global $sPPMC;
    
    $aPPMCsAPbIds = unserialize(CCGetSession("aPPMCsAPbIdsCAPC"));
    $aPPMCsAPbValues = unserialize(CCGetSession("aPPMCsAPbValuesCAPC"));
	if(count($aPPMCsAPbIds)>1){
    	$iPos=array_search(CCGetParam("id"),$aPPMCsAPbIds);
    	if($iPos==0){
			$lkAnterior->SetLink("SLAsCAPCLista.php?" . CCGetQueryString("QueryString",""));
			$lkAnterior->SetValue("Lista requerimientos");
    	} else {
    		$lkAnterior->SetValue($aPPMCsAPbValues[$iPos-1]);
    		$lkAnterior->SetLink("SLAsCAPCDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","id"),"ccsForm"),"id",$aPPMCsAPbIds[$iPos-1]));
    	}
    	if($iPos < count($aPPMCsAPbIds)-1){
    		$lkSiguiente->SetValue($aPPMCsAPbValues[$iPos+1]);
    		$lkSiguiente->SetLink("SLAsCAPCDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","id"),"ccsForm"),"id",$aPPMCsAPbIds[$iPos+1]));
    	} else {
    		$lkSiguiente->SetValue("");
    	}
    }

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
