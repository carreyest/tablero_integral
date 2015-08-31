<?php
//BindEvents Method @1-9E47F639
function BindEvents()
{
    global $grdDetalleRS;
    global $grdDetalleRS1;
    global $grid_capc;
    global $CCSEvents;
    $grdDetalleRS->Grid1_TotalRecords->CCSEvents["BeforeShow"] = "grdDetalleRS_Grid1_TotalRecords_BeforeShow";
    $grdDetalleRS->ds->CCSEvents["BeforeExecuteSelect"] = "grdDetalleRS_ds_BeforeExecuteSelect";
    $grdDetalleRS->CCSEvents["BeforeShowRow"] = "grdDetalleRS_BeforeShowRow";
    $grdDetalleRS->CCSEvents["BeforeShow"] = "grdDetalleRS_BeforeShow";
    $grdDetalleRS1->CCSEvents["BeforeShow"] = "grdDetalleRS1_BeforeShow";
    $grid_capc->Grid2_TotalRecords->CCSEvents["BeforeShow"] = "grid_capc_Grid2_TotalRecords_BeforeShow";
    $grid_capc->CCSEvents["BeforeShowRow"] = "grid_capc_BeforeShowRow";
    $grid_capc->CCSEvents["BeforeShow"] = "grid_capc_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//grdDetalleRS_Grid1_TotalRecords_BeforeShow @4-BB6833FC
function grdDetalleRS_Grid1_TotalRecords_BeforeShow(& $sender)
{
    $grdDetalleRS_Grid1_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS; //Compatibility
//End grdDetalleRS_Grid1_TotalRecords_BeforeShow

//Retrieve number of records @5-ABE656B4
   	$Component->SetValue($Container->DataSource->RecordsCount);    
/*
    if( CCGetSession("GrupoValoracion")=="CAPC" || CCGetParam("s_AnioReporte",0)<2014){
   		$Component->SetValue($Container->DataSource->RecordsCount);
    } else {
        $Component->SetValue(0);
	}
*/	
//End Retrieve number of records

//Close grdDetalleRS_Grid1_TotalRecords_BeforeShow @4-4F1A7186
    return $grdDetalleRS_Grid1_TotalRecords_BeforeShow;
}
//End Close grdDetalleRS_Grid1_TotalRecords_BeforeShow

//grdDetalleRS_ds_BeforeExecuteSelect @3-4AA6CEE4
function grdDetalleRS_ds_BeforeExecuteSelect(& $sender)
{
    $grdDetalleRS_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS; //Compatibility
//End grdDetalleRS_ds_BeforeExecuteSelect

//Custom Code @40-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close grdDetalleRS_ds_BeforeExecuteSelect @3-8BAB682E
    return $grdDetalleRS_ds_BeforeExecuteSelect;
}
//End Close grdDetalleRS_ds_BeforeExecuteSelect

//grdDetalleRS_BeforeShowRow @3-443CB4DF
function grdDetalleRS_BeforeShowRow(& $sender)
{
    $grdDetalleRS_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS; //Compatibility    
//End grdDetalleRS_BeforeShowRow

//Custom Code @46-2A29BDB7
// -------------------------

	global $db;
	$tipo_ppmc='';
	$SLO_ppmc='';
	$_en='';
  	$db = new clsDBcnDisenio;
	$sqlGetTipo="	SELECT mes,anio, SLO, tipo
					FROM mc_universo_cds 
					WHERE tipo = 'PC'
					AND numero like '%". $grdDetalleRS->id_ppmc->GetValue() . "%'";
    
    $db->query($sqlGetTipo);
    
    if($db->next_record()){
  		$tipo_ppmc = $db->f("tipo"); 
  		$SLO_ppmc = $db->f("SLO");
  		$medido_en = $db->f("mes")."/".$db->f("anio");
    }



	$grdDetalleRS->HERR_EST_COST->Visible=false;
	$grdDetalleRS->REQ_SERV->Visible=false;
	$grdDetalleRS->CUMPL_REQ_FUNC->Visible=false;
	$grdDetalleRS->CALIDAD_PROD_TERM->Visible=false;
	$grdDetalleRS->RETR_ENTREGABLE->Visible=false;
	//$grdDetalleRS->COMPL_RUTA_CRITICA->Visible=false;
	//$grdDetalleRS->EST_PROY->Visible=false;
	$grdDetalleRS->DEF_FUG_AMB_PROD->Visible=false;
	
	/*
	$grdDetalleRS->imgCumpleHE->Visible=true;
	$grdDetalleRS->imgCumpleRS->Visible=true;
	$grdDetalleRS->imgCUMPL_REQ_FUNC->Visible=true;
	$grdDetalleRS->imgCALIDAD_PROD_TERM->Visible=true;
	$grdDetalleRS->imgRETR_ENTREGABLE->Visible=true;
	$grdDetalleRS->imgCOMPL_RUTA_CRITICA->Visible=true;
	$grdDetalleRS->imgEST_PROY->Visible=true;
	$grdDetalleRS->imgDEF_FUG_AMB_PROD->Visible=true;
	*/
	//$grdDetalleRS->imgCumpleHE->Visible=($grdDetalleRS->HERR_EST_COST->GetValue()!="");
	//$grdDetalleRS->imgCumpleRS->Visible=($grdDetalleRS->REQ_SERV->GetValue()!="");
	//$grdDetalleRS->imgCUMPL_REQ_FUNC->Visible=($grdDetalleRS->CUMPL_REQ_FUNC->GetValue()!="");
	//$grdDetalleRS->imgCALIDAD_PROD_TERM->Visible=($grdDetalleRS->CALIDAD_PROD_TERM->GetValue()!="");
	//$grdDetalleRS->imgRETR_ENTREGABLE->Visible=($grdDetalleRS->RETR_ENTREGABLE->GetValue()!="");
	//$grdDetalleRS->imgCOMPL_RUTA_CRITICA->Visible=($grdDetalleRS->COMPL_RUTA_CRITICA->GetValue()!="");
	//$grdDetalleRS->imgEST_PROY->Visible=($grdDetalleRS->EST_PROY->GetValue()!="");
	//$grdDetalleRS->imgDEF_FUG_AMB_PROD->Visible=($grdDetalleRS->DEF_FUG_AMB_PROD->GetValue()!="");
	
	if($grdDetalleRS->HERR_EST_COST->GetValue()!=''){		
		switch($grdDetalleRS->HERR_EST_COST->GetValue()){
			case  0: $imagen_hec="images/NoCumple.png"; break;
			case  1: $imagen_hec="images/Cumple.png"; break;
		}	
		$grdDetalleRS->imgCumpleHE->SetValue($imagen_hec);	
	} else {
		$grdDetalleRS->imgCumpleHE->SetValue("images/noaplica.png");
		if ($tipo_ppmc=='PC') {
			$grdDetalleRS->HERR_EST_COST->Visible=true;
			$grdDetalleRS->HERR_EST_COST->SetValue("Medido en ".$medido_en. " ");
	   }

	}

	if($grdDetalleRS->REQ_SERV->GetValue()!=''){
		switch($grdDetalleRS->REQ_SERV->GetValue()){
			case  0: $imagen_rs="images/NoCumple.png"; break;
			case  1: $imagen_rs="images/Cumple.png"; break;
		}	
		$grdDetalleRS->imgCumpleRS->SetValue($imagen_rs);
	} else {
		$grdDetalleRS->imgCumpleRS->SetValue("images/noaplica.png");
	}

	

	if($grdDetalleRS->CUMPL_REQ_FUNC->GetValue()!=''){
		switch($grdDetalleRS->CUMPL_REQ_FUNC->GetValue()){
			case  0: $imagen_crf="images/NoCumple.png"; break;
			case  1: $imagen_crf="images/Cumple.png"; break;
		}			
		$grdDetalleRS->imgCUMPL_REQ_FUNC->SetValue($imagen_crf);
	} else {
		$grdDetalleRS->imgCUMPL_REQ_FUNC->SetValue("images/noaplica.png");
	}
	
	
	if($grdDetalleRS->CALIDAD_PROD_TERM->GetValue()!=''){
		switch($grdDetalleRS->CALIDAD_PROD_TERM->GetValue()){
			case  0: $imagen_cpt="images/NoCumple.png"; break;
			case  1: $imagen_cpt="images/Cumple.png"; break;
		}			

		$grdDetalleRS->imgCALIDAD_PROD_TERM->SetValue($imagen_cpt);
	} else {
		$grdDetalleRS->imgCALIDAD_PROD_TERM->SetValue("images/noaplica.png");
	}

	if($grdDetalleRS->RETR_ENTREGABLE->GetValue()!=''){
		switch($grdDetalleRS->RETR_ENTREGABLE->GetValue()){
			case  0: $imagen_re="images/NoCumple.png"; break;
			case  1: $imagen_re="images/Cumple.png"; break;
		}			

		$grdDetalleRS->imgRETR_ENTREGABLE->SetValue($imagen_re);
	} else {
		$grdDetalleRS->imgRETR_ENTREGABLE->SetValue("images/noaplica.png");
	}

	if($grdDetalleRS->CAL_COD->GetValue()!=''){
		switch($grdDetalleRS->CAL_COD->GetValue()){
			case  -1: $imagen_calcod="images/noaplica.png"; break;
			case  0: $imagen_calcod="images/NoCumple.png"; break;
			case  1: $imagen_calcod="images/Cumple.png"; break;
		}	
		$grdDetalleRS->imgCAL_COD->SetValue($imagen_calcod);
	} else {
		$grdDetalleRS->imgCAL_COD->SetValue("images/noaplica.png");
	}


	/*
	if($grdDetalleRS->COMPL_RUTA_CRITICA->GetValue()){
		$grdDetalleRS->imgCOMPL_RUTA_CRITICA->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS->imgCOMPL_RUTA_CRITICA->SetValue("images/NoCumple.png");
	}
	if($grdDetalleRS->EST_PROY->GetValue()){
		$grdDetalleRS->imgEST_PROY->SetValue("images/Cumple.png");
	} else {
		$grdDetalleRS->imgEST_PROY->SetValue("images/NoCumple.png");
	}
	*/
	if($grdDetalleRS->DEF_FUG_AMB_PROD->GetValue()!=''){
		switch($grdDetalleRS->DEF_FUG_AMB_PROD->GetValue()){
			case  0: $imagen_dfap="images/NoCumple.png"; break;
			case  1: $imagen_dfap="images/Cumple.png"; break;
		}	

		$grdDetalleRS->imgDEF_FUG_AMB_PROD->SetValue($imagen_dfap);
	} else {
		$grdDetalleRS->imgDEF_FUG_AMB_PROD->SetValue("images/noaplica.png");
	}
	
	
//	if (CCGetParam("s_id_proveedor")==4){
//		$sProveedor ="3y4";
//	} else {
//		$sProveedor =CCGetParam("s_id_proveedor")-1;
//	}
	
	
	switch (CCGetParam("s_id_proveedor")){
	case 1 : $sProveedor = 'Evidencia_CAPC';break;
	case 2 : $sProveedor = 'Evidencias_CDS1y3';break;
	case 3 : $sProveedor = 'Evidencias_CDS2';break;
	default: $sProveedor = 'Evidencias_CAPC';break;		
	}

	if(CCGetParam("s_MesReporte")<10){
		$sMes = "0" . CCGetParam("s_MesReporte");
	} else {
		$sMes = CCGetParam("s_MesReporte");
	}
	
	if($grdDetalleRS->HERR_EST_COST->GetValue()!="" || $grdDetalleRS->REQ_SERV->GetValue()!="") {
		$grdDetalleRS->lkEvidencia->SetLink("http://satportal.dssat.sat.gob.mx/agcti/SDMA4-Admvo/Documentos compartidos/Operación del Servicio/Itera/" . CCGetParam("s_AnioReporte","") . $sMes . "/EntregablesPeriódicos/NivelesServicio/". $sProveedor ."/");
		// . $grdDetalleRS->id_ppmc->GetValue() . "_A.doc");
	} else {
		$grdDetalleRS->lkEvidencia->SetLink("http://satportal.dssat.sat.gob.mx/agcti/SDMA4-Admvo/Documentos compartidos/Operación del Servicio/Itera/" . CCGetParam("s_AnioReporte","") . $sMes . "/EntregablesPeriódicos/NivelesServicio/". $sProveedor ."/");		
		//. $grdDetalleRS->id_ppmc->GetValue() . "_C.doc");
	}
	
	if(CCGetParam("s_AnioReporte",0)<2014){
		$grdDetalleRS->id_ppmc->SetLink($grdDetalleRS->lkEvidencia->GetLink());
	}
	
	if($grdDetalleRS->DataSource->f("medido")==1 || CCGetSession("GrupoValoracion")=="CAPC" || CCGetParam("s_AnioReporte",0)<2014){
   		$grdDetalleRS->Panel1->Visible=true;
	} else {
		$grdDetalleRS->Panel1->Visible=false;
	}
	
	//si tiene datos en el mes que fue trascicionado le pone la leyenda "Pendiente de Medicióon"
	if($grdDetalleRS->DataSource->f("mestransicion")!="" && $grdDetalleRS->DataSource->f("mestransicion") != CCGetParam("s_MesReporte")){
		$grdDetalleRS->DEF_FUG_AMB_PROD->Visible=true;
		$grdDetalleRS->DEF_FUG_AMB_PROD->SetValue("Pendiente de Medición");
		$grdDetalleRS->imgDEF_FUG_AMB_PROD->Visible= false;
	}
	
	//si es RT lo arega
	$grdDetalleRS->lkRT->Visible= ($grdDetalleRS->DataSource->f("EsReqTecnico")==1);
	
// -------------------------
//End Custom Code

//Close grdDetalleRS_BeforeShowRow @3-B4FEBB28
    return $grdDetalleRS_BeforeShowRow;
}
//End Close grdDetalleRS_BeforeShowRow

//grdDetalleRS_BeforeShow @3-60D59EFD
function grdDetalleRS_BeforeShow(& $sender)
{
    $grdDetalleRS_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS; //Compatibility
//End grdDetalleRS_BeforeShow

//Custom Code @188-2A29BDB7
// -------------------------

    if(CCGetParam("s_id_proveedor","") == 1){
    	$grdDetalleRS->Panel1->Visible=false;
    	$grdDetalleRS->Visible=false;
    } else {
    	$grdDetalleRS->Panel1->Visible=true;
    	$grdDetalleRS->Visible=true;
    }

// -------------------------
//End Custom Code

//Close grdDetalleRS_BeforeShow @3-C02F3321
    return $grdDetalleRS_BeforeShow;
}
//End Close grdDetalleRS_BeforeShow

//grdDetalleRS1_BeforeShow @25-E1258B76
function grdDetalleRS1_BeforeShow(& $sender)
{
    $grdDetalleRS1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdDetalleRS1; //Compatibility
//End grdDetalleRS1_BeforeShow

//Custom Code @138-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio();
    $db->query("select month(cast(max(cast(anioreporte as varchar) + '-' + CAST(mesreporte as varchar) + '-01') as date)) " .
    	 ", year(cast(max(cast(anioreporte as varchar) + '-' + CAST(mesreporte as varchar) + '-01') as date)) from mc_calificacion_rs_MC");
    if($db->next_record()){
    	if(CCGetParam("s_MesReporte","")==""){
    		//$Grid2->s_MesReporte->SetValue($db->f(0));
    		$grdDetalleRS1->s_MesReporte->SetValue(date("m")-2);
    	}
    	if(CCGetParam("s_AnioReporte","")==""){
    		$grdDetalleRS1->s_AnioReporte->SetValue($db->f(1));
    		$grdDetalleRS1->s_AnioReporte->SetValue(date("Y"));
    	}
    }
    $db->close();


// -------------------------
//End Custom Code

//Close grdDetalleRS1_BeforeShow @25-7BFD7B85
    return $grdDetalleRS1_BeforeShow;
}
//End Close grdDetalleRS1_BeforeShow

//grid_capc_Grid2_TotalRecords_BeforeShow @172-65BC3C47
function grid_capc_Grid2_TotalRecords_BeforeShow(& $sender)
{
    $grid_capc_Grid2_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grid_capc; //Compatibility
//End grid_capc_Grid2_TotalRecords_BeforeShow

//Retrieve number of records @173-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close grid_capc_Grid2_TotalRecords_BeforeShow @172-E628FE46
    return $grid_capc_Grid2_TotalRecords_BeforeShow;
}
//End Close grid_capc_Grid2_TotalRecords_BeforeShow

//grid_capc_BeforeShowRow @139-14D42E04
function grid_capc_BeforeShowRow(& $sender)
{
    $grid_capc_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grid_capc; //Compatibility
//End grid_capc_BeforeShowRow

//Custom Code @183-2A29BDB7
// -------------------------
    if($grid_capc->CALIDAD_PROD_TERM->GetValue()!=""){
		$grid_capc->Img_CALIDAD_PROD_TERM->Visible=true;
		$grid_capc->CALIDAD_PROD_TERM->Visible=false;	
		if($grid_capc->CALIDAD_PROD_TERM->GetValue()==1){
			$grid_capc->Img_CALIDAD_PROD_TERM->SetValue("images/Cumple.png");
		} else {
			$grid_capc->Img_CALIDAD_PROD_TERM->SetValue("images/NoCumple.png");
		}
    } else {
		$grid_capc->Img_CALIDAD_PROD_TERM->Visible=false;
		$grid_capc->CALIDAD_PROD_TERM->Visible=true;
		$grid_capc->CALIDAD_PROD_TERM->SetValue("No&nbsp;Aplica");
    }
    
    if($grid_capc->DEDUC_OMISION->GetValue()!=""){
		$grid_capc->Img_DEDUC_OMISION->Visible=true;
		$grid_capc->DEDUC_OMISION->Visible=false;	
		if($grid_capc->DEDUC_OMISION->GetValue()==1){
			$grid_capc->Img_DEDUC_OMISION->SetValue("images/Cumple.png");
		} else {
			$grid_capc->Img_DEDUC_OMISION->SetValue("images/NoCumple.png");
		}
	} else {
		$grid_capc->Img_DEDUC_OMISION->Visible=false;
		$grid_capc->DEDUC_OMISION->Visible=true;
		$grid_capc->DEDUC_OMISION->SetValue("No&nbsp;Aplica");
	}
	
    if($grid_capc->RETR_ENTREGABLE->GetValue()!=""){
		$grid_capc->Img_RETR_ENTREGABLE->Visible=true;
		$grid_capc->RETR_ENTREGABLE->Visible=false;	
		if($grid_capc->RETR_ENTREGABLE->GetValue()==1){
			$grid_capc->Img_RETR_ENTREGABLE->SetValue("images/Cumple.png");
		} else {
			$grid_capc->Img_RETR_ENTREGABLE->SetValue("images/NoCumple.png");
		}
	} else {
		$grid_capc->Img_RETR_ENTREGABLE->Visible=false;
		$grid_capc->RETR_ENTREGABLE->Visible=true;
		$grid_capc->RETR_ENTREGABLE->SetValue("No&nbsp;Aplica");
	}
	
	//nuevos para el SDMA4
	if($grid_capc->HERR_EST_COST->GetValue()!=""){
		$grid_capc->Img_HERR_EST_COST->Visible=true;
		$grid_capc->HERR_EST_COST->Visible=false;	
		if($grid_capc->HERR_EST_COST->GetValue()==1){
			$grid_capc->Img_HERR_EST_COST->SetValue("images/Cumple.png");
		} else {
			$grid_capc->Img_HERR_EST_COST->SetValue("images/NoCumple.png");
		}
	} else {
		$grid_capc->Img_HERR_EST_COST->Visible=false;
		$grid_capc->HERR_EST_COST->Visible=true;
		$grid_capc->HERR_EST_COST->SetValue("No&nbsp;Aplica");
	}
	
	if($grid_capc->REQ_SERV->GetValue()!=""){
		$grid_capc->Img_REQ_SERV->Visible=true;
		$grid_capc->REQ_SERV->Visible=false;	
		if($grid_capc->REQ_SERV->GetValue()==1){
			$grid_capc->Img_REQ_SERV->SetValue("images/Cumple.png");
		} else {
			$grid_capc->Img_REQ_SERV->SetValue("images/NoCumple.png");
		}
	} else {
		$grid_capc->Img_REQ_SERV->Visible=false;
		$grid_capc->REQ_SERV->Visible=true;
		$grid_capc->REQ_SERV->SetValue("No&nbsp;Aplica");
	}
	
	if($grid_capc->CUMPL_REQ_FUN->GetValue()!=""){
		$grid_capc->Img_CUMPL_REQ_FUN->Visible=true;
		$grid_capc->CUMPL_REQ_FUN->Visible=false;	
		if($grid_capc->CUMPL_REQ_FUN->GetValue()==1){
			$grid_capc->Img_CUMPL_REQ_FUN->SetValue("images/Cumple.png");
		} else {
			$grid_capc->Img_CUMPL_REQ_FUN->SetValue("images/NoCumple.png");
		}
	} else {
		$grid_capc->Img_CUMPL_REQ_FUN->Visible=false;
		$grid_capc->CUMPL_REQ_FUN->Visible=true;
		$grid_capc->CUMPL_REQ_FUN->SetValue("No&nbsp;Aplica");
	}
	

// -------------------------
//End Custom Code

//Close grid_capc_BeforeShowRow @139-B59113B9
    return $grid_capc_BeforeShowRow;
}
//End Close grid_capc_BeforeShowRow

//grid_capc_BeforeShow @139-B8E8F08E
function grid_capc_BeforeShow(& $sender)
{
    $grid_capc_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grid_capc; //Compatibility
//End grid_capc_BeforeShow

//Custom Code @184-2A29BDB7
// -------------------------
    
    if(CCGetParam("s_id_proveedor","")==1){
    	$grid_capc->Visible=true;
    } else {
    	$grid_capc->Visible=false;
    }
    
// -------------------------
//End Custom Code

//Close grid_capc_BeforeShow @139-E4DC3207
    return $grid_capc_BeforeShow;
}
//End Close grid_capc_BeforeShow

//Page_BeforeShow @1-498315D6
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsApbDetalleRSxls; //Compatibility
//End Page_BeforeShow

//Custom Code @121-2A29BDB7
// -------------------------
    global $grdDetalleRS1;
    $grdDetalleRS1->Visible =(CCGetSession("GrupoValoracion")=="CAPC" || CCGetSession("GrupoValoracion")=="SAT");

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
