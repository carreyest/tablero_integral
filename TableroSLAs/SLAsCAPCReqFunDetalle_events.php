<?php
//BindEvents Method @1-4C5746E4
function BindEvents()
{
    global $mc_info_rs_cr_RF;
    global $CCSEvents;
    $mc_info_rs_cr_RF->PublicacionCAES->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RF_PublicacionCAES_BeforeShow";
    $mc_info_rs_cr_RF->CCSEvents["BeforeShow"] = "mc_info_rs_cr_RF_BeforeShow";
    $mc_info_rs_cr_RF->CCSEvents["OnValidate"] = "mc_info_rs_cr_RF_OnValidate";
    $mc_info_rs_cr_RF->ds->CCSEvents["BeforeExecuteInsert"] = "mc_info_rs_cr_RF_ds_BeforeExecuteInsert";
    $mc_info_rs_cr_RF->ds->CCSEvents["BeforeExecuteUpdate"] = "mc_info_rs_cr_RF_ds_BeforeExecuteUpdate";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_info_rs_cr_RF_PublicacionCAES_BeforeShow @42-4F29523E
function mc_info_rs_cr_RF_PublicacionCAES_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RF_PublicacionCAES_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RF; //Compatibility
//End mc_info_rs_cr_RF_PublicacionCAES_BeforeShow

//Close mc_info_rs_cr_RF_PublicacionCAES_BeforeShow @42-BF839D50
    return $mc_info_rs_cr_RF_PublicacionCAES_BeforeShow;
}
//End Close mc_info_rs_cr_RF_PublicacionCAES_BeforeShow

//mc_info_rs_cr_RF_BeforeShow @3-82CEA42C
function mc_info_rs_cr_RF_BeforeShow(& $sender)
{
    $mc_info_rs_cr_RF_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RF; //Compatibility
//End mc_info_rs_cr_RF_BeforeShow

//Custom Code @19-2A29BDB7
// -------------------------
    global $sPPMC;
    $db= new clsDBcnDisenio;
    $sql="SELECT u.id, u.IdEstimacion, ID_PPMC, ESTIMACION_ID,  requerimiento_relacionado,  RESULTADO_ESTIMACION,  " .
			" UNIDADES_RESULTANTES, TIPO_UNIDAD, ESFUERZO, PROVEEDOR, ESTADO_REQ_ESTIM,   u.mes, u.anio, m.Mes NomMes  " .
			" from mc_calificacion_capc  u  inner join mc_c_mes m on m.IdMes = u.mes  LEFT JOIN PPMC_ESTIMACION on " . 
			" PPMC_ESTIMACION.ID_PPMC = u.numero  where month(fecha_carga)=u.mes and YEAR(FECHA_CARGA) = u.anio " .
			" AND u.id = " . CCGetParam("sID");
    $db->query($sql);
    if($db->next_record()){ // si tiene registro de estimacion
    		$sPPMC = $db->f("ID_PPMC");
    		$mc_info_rs_cr_RF->sID_Estimacion->SetValue($db->f("ESTIMACION_ID"));
    		$mc_info_rs_cr_RF->sId_PPMC->SetValue($db->f("ID_PPMC"));
    		$mc_info_rs_cr_RF->lReportado->SetValue(" - Reportado en " . $db->f("NomMes"));
    	if(!$mc_info_rs_cr_RF->EditMode){
    		$mc_info_rs_cr_RF->ID_Estimacion->SetValue($db->f("ESTIMACION_ID"));
    		$mc_info_rs_cr_RF->Id_PPMC->SetValue($db->f("ID_PPMC"));
    	}
    	$mc_info_rs_cr_RF->hdMes->SetValue($db->f("mes"));    	
		$mc_info_rs_cr_RF->hdAnio->SetValue($db->f("anio"));    	    	
		$sTipoReq =$db->f("requerimiento_relacionado");
		switch($db->f("requerimiento_relacionado")){
			case "Proyecto";
				$db->query('SELECT Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, ESTADO, TIPO_SERVICIO_CTI ' . 
					' FROM PPMC_PROYECTOS_AS ' .
					' WHERE ID_PROYECTO = ' . $sPPMC );
				break;
			case "RO";
				$db->query('SELECT Name, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, ESTADO, TipoServicioCTI ' .
					' FROM PPMC_RO_AS ' .
					' WHERE REQUEST_ID = ' . $sPPMC );
				break;
			case "Control de Cambios";
				$db->query('SELECT Project_Name, SERVICIO_NEGOCIO, TIPO_Solicitud, c.ESTADO, TIPO_SERVICIO_CTI ' .
					' FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC ' .
					' WHERE REQ_CAMBIO_ID  =  ' . $sPPMC );		
				break;
		}
		if($db->has_next_record()){
			$db->next_record();
			$mc_info_rs_cr_RF->sNombreProyecto->SetValue($db->f(0));
			$mc_info_rs_cr_RF->lTipoRequerimiento->SetValue($sTipoReq);
		}
		/*
		switch($sTipoReq){
		    case "Proyecto";
			    $sql= 'SELECT FIN_REAL  FROM PPMC_FasesActivas F ' .
					' where fase in (\'Liberación\',\'Cierre\')	and F.[%COMPLETADO] =100 ' .
					' and ID_PROYECTO = ' . $sPPMC ;
				break;
			case "RO";
				$sql= 'select CAST(FECHA_TRANSACCION as datetime) Fecha, cast(FECHA_TRANSACCION as date) FROM PPMC_FASE_ROS f ' .
					' where (( NOMBRE_PASO = \'Liberación (Todos)\' and f.ESTADO  = \'COMPLETE\') ' .
					' or (NOMBRE_PASO = \'Cierre de ACSN (AP)\')) ' .
					' and ID_REQUERIMIENTO =  ' . $sPPMC . '  and month(FECHA_TRANSACCION) = ' .
					$mc_info_rs_cr_RF->hdMes->GetValue() . ' and YEAR(FECHA_TRANSACCION) = ' . 
					$mc_info_rs_cr_RF->hdAnio->GetValue() ;
				break;
			case "Control de Cambios";
				break;
		}
		*/
		/*
		$db->query($sql);
		if(!$mc_info_rs_cr_RF->EditMode && $db->has_next_record() ){
			$db->next_record();
			//convierte la fecha en en el formato de la db
			$mc_info_rs_cr_RF->FechaSubida->SetValue(CCParseDate($db->f(0), array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss",".","S")));
		}
		*/
    } else {// si no tiene registro de estimación 
    	$sql="SELECT ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA,  u.mes, u.anio  " .
			" from mc_calificacion_capc u  LEFT JOIN vw_PPMC_Proy_RO_CC on " . 
			" vw_PPMC_Proy_RO_CC.ID_PPMC = u.numero  where month(fecha_carga)=u.mes and YEAR(FECHA_CARGA) = u.anio " .
			" AND u.id = " . CCGetParam("sID");

    	$db->query($sql);
    	if($db->next_record()){
    		$sPPMC = $db->f("ID_PPMC");
    		$mc_info_rs_cr_RF->sID_Estimacion->SetValue(0);
    		$mc_info_rs_cr_RF->sId_PPMC->SetValue($db->f("ID_PPMC"));
	    	if(!$mc_info_rs_cr_RF->EditMode){
	    		$mc_info_rs_cr_RF->ID_Estimacion->SetValue("0");
	    		$mc_info_rs_cr_RF->Id_PPMC->SetValue($db->f("ID_PPMC"));
	    	}
	    	$mc_info_rs_cr_RF->hdMes->SetValue($db->f("mes"));    	
			$mc_info_rs_cr_RF->hdAnio->SetValue($db->f("anio"));    	    	
			$mc_info_rs_cr_RF->sNombreProyecto->SetValue($db->f(1));
			$mc_info_rs_cr_RF->lTipoRequerimiento->SetValue($db->f("TIPO_REQUERIMIENTO"));
    	}
    }
    //se trae la información general del requerimiento
    $sql = 'SELECT id_serviciocont, id_servicio_negoico, id_tipo, idestimacion, TipoMedicion, mc.descripcion NombreProyecto,  ' .
    	' sc.Descripcion  ServContractual, sn.nombre ServNegocio, t.Descripcion TipoPPMC ' .
		' FROM mc_calificacion_CAPC mc  inner join mc_c_servcontractual sc on sc.id = mc.id_serviciocont  ' .
		' 		left  join mc_c_servicio   sn on sn.id_servicio   = mc.id_servicio_negoico and sn.id_tipo_servicio =2  ' .
		' 		inner join mc_c_TipoPPMC t on t.Id = mc.id_tipo  WHERE mc.id = ' . CCGetParam("sID") ;
    $db->query($sql);
	if($db->next_record()){
		$mc_info_rs_cr_RF->lTipoRequerimiento->SetValue($db->f("TipoPPMC"));
		if($db->f("idestimacion")!=""){
			$mc_info_rs_cr_RF->ID_Estimacion->SetValue($db->f("idestimacion"));
		}
		$mc_info_rs_cr_RF->sNombreProyecto->SetValue($db->f("NombreProyecto"));
		
		if($db->f("TipoMedicion")!="PC"){
			$mc_info_rs_cr_RF->Button_Insert->Visible= false;
    		$mc_info_rs_cr_RF->Button_Update->Visible = false;				
		}
	} else {
		$mc_info_rs_cr_RF->Button_Insert->Visible= false;
    	$mc_info_rs_cr_RF->Button_Update->Visible = false;	
	}


    $db->Close();
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RF_BeforeShow @3-59714B36
    return $mc_info_rs_cr_RF_BeforeShow;
}
//End Close mc_info_rs_cr_RF_BeforeShow

//mc_info_rs_cr_RF_OnValidate @3-74A6DD25
function mc_info_rs_cr_RF_OnValidate(& $sender)
{
    $mc_info_rs_cr_RF_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RF; //Compatibility
//End mc_info_rs_cr_RF_OnValidate

//Custom Code @23-2A29BDB7
// -------------------------
    if($mc_info_rs_cr_RF->Puntuacion->GetValue()>5){
    	$mc_info_rs_cr_RF->Errors->addError("La puntuación total no debe ser mayor a 5");
    }
    if($mc_info_rs_cr_RF->Puntuacion->GetValue()<0){
    	$mc_info_rs_cr_RF->Errors->addError("La puntuación total no debe ser menor a 0");
    }

	global $Redirect;
	global $PathToRoot;
	if(CCGetParam("src",0)==1){//si viene de la página de detalle lo regresa a esa misma
		$Redirect = $PathToRoot ."SLAsCAPCLista.php?".CCGetQueryString("QueryString",array("ccsForm","src"));
	} else {
		$Redirect = $PathToRoot ."SLAsCAPCLista.php?".CCGetQueryString("QueryString",array("ccsForm","src"));
	}
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RF_OnValidate @3-668A2FBF
    return $mc_info_rs_cr_RF_OnValidate;
}
//End Close mc_info_rs_cr_RF_OnValidate

//mc_info_rs_cr_RF_ds_BeforeExecuteInsert @3-189E0877
function mc_info_rs_cr_RF_ds_BeforeExecuteInsert(& $sender)
{
    $mc_info_rs_cr_RF_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RF; //Compatibility
//End mc_info_rs_cr_RF_ds_BeforeExecuteInsert

//Custom Code @52-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio;
    $sSQL = "SELECT Id_Proveedor, Numero, Mes, Anio FROM mc_calificacion_CAPC WHERE Id=" . CCGetParam("sID") ;
    $db->query($sSQL);
    if($db->next_record()){
    	$sIdProveedor = $db->f(0);
    	$sPPMC = $db->f(1);
    	$sMes = $db->f(2);
    	$sAnio = $db->f(3);
    }
    $sCumpleReqFun=$mc_info_rs_cr_RF->CumpleReqFun->GetValue();
	if($sCumpleReqFun === ""){
			$sCumpleReqFun="NULL";
	}
    // verifica si existe el PPMC en la tabla de calificación
    $sSQL="select count(*) from mc_calificacion_CAPC  where Id= " . CCGetParam("sID");
    $db->query($sSQL);
    if($db->next_record()){ 
    	if($db->f(0)==0){ // si no existe se inserta
    		$sSQL='INSERT INTO mc_calificacion_CAPC (id_ppmc, id_proveedor,id_servicio_cont , id_servicio_negocio , CUMPL_REQ_FUN, Id, MesReporte, AnioReporte ) ' .  
    			' VALUES (' . $sPPMC . ',' . $sIdProveedor . ',0,0,'.  $sCumpleReqFun . ',' .
    			 CCGetparam("sID") . ',' . $sMes . ',' . $sAnio .')';
    	} else { //si existe se actualiza
    		$sSQL = 'UPDATE  mc_calificacion_CAPC SET CUMPL_REQ_FUN = ' . $sCumpleReqFun .
    			' WHERE Id =' . CCGetParam("sID");
    	}
    	$db->query($sSQL);
    	
    }
    $db->close();

// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RF_ds_BeforeExecuteInsert @3-837864D8
    return $mc_info_rs_cr_RF_ds_BeforeExecuteInsert;
}
//End Close mc_info_rs_cr_RF_ds_BeforeExecuteInsert

//mc_info_rs_cr_RF_ds_BeforeExecuteUpdate @3-72668EF4
function mc_info_rs_cr_RF_ds_BeforeExecuteUpdate(& $sender)
{
    $mc_info_rs_cr_RF_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_cr_RF; //Compatibility
//End mc_info_rs_cr_RF_ds_BeforeExecuteUpdate

//Custom Code @53-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio;
    $sSQL = "SELECT Id_Proveedor, Numero, Mes, Anio FROM mc_calificacion_CAPC WHERE Id=" . CCGetParam("sID") ;
    $db->query($sSQL);
    if($db->next_record()){
    	$sIdProveedor = $db->f(0);
    	$sPPMC = $db->f(1);
    	$sMes = $db->f(2);
    	$sAnio = $db->f(3);
    }
    $sCumpleReqFun=$mc_info_rs_cr_RF->CumpleReqFun->GetValue();
	if($sCumpleReqFun === ""){
			$sCumpleReqFun ="NULL";
	}
	$sSQL = 'UPDATE  mc_calificacion_CAPC SET CUMPL_REQ_FUN= ' .  $sCumpleReqFun .
    		' WHERE Id =' . CCGetParam("sID");
    $db->query($sSQL);
    $db->close();
    
// -------------------------
//End Custom Code

//Close mc_info_rs_cr_RF_ds_BeforeExecuteUpdate @3-4C51A557
    return $mc_info_rs_cr_RF_ds_BeforeExecuteUpdate;
}
//End Close mc_info_rs_cr_RF_ds_BeforeExecuteUpdate

//Page_BeforeShow @1-4424F9FC
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SLAsCAPCReqFunDetalle; //Compatibility
//End Page_BeforeShow

//Custom Code @54-2A29BDB7
// -------------------------
    global $lkAnterior;
    global $lkSiguiente;
    
    $aPPMCsAPbIds = unserialize(CCGetSession("aPPMCsAPbIdsCAPC"));
    $aPPMCsAPbValues = unserialize(CCGetSession("aPPMCsAPbValuesCAPC"));

    if(count($aPPMCsAPbIds)>1){
    	$iPos=array_search(CCGetParam("sID"),$aPPMCsAPbIds);
    	if($iPos==0){
			$lkAnterior->SetLink("SLAsCAPCLista.php?" . CCGetQueryString("QueryString",""));
			$lkAnterior->SetValue("Lista requerimientos");
    	} else {
    		$lkAnterior->SetValue($aPPMCsAPbValues[$iPos-1]);
    		$lkAnterior->SetLink("SLAsCAPCReqFunDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","sID"),"ccsForm"),"sID",$aPPMCsAPbIds[$iPos-1]));
    	}
    	if($iPos < count($aPPMCsAPbIds)-1){
    		$lkSiguiente->SetValue($aPPMCsAPbValues[$iPos+1]);
    		$lkSiguiente->SetLink("SLAsCAPCReqFunDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","sID"),"ccsForm"),"sID",$aPPMCsAPbIds[$iPos+1]));
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
