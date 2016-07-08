<?php
//BindEvents Method @1-020C2C74
function BindEvents()
{
    global $mc_info_rs_CC;
    global $CalidadCodigoMetricas;
    global $CalidadCodigoReglas;
    global $CCSEvents;
    $mc_info_rs_CC->Button_Insert->CCSEvents["BeforeShow"] = "mc_info_rs_CC_Button_Insert_BeforeShow";
    $mc_info_rs_CC->Button_Update->CCSEvents["OnClick"] = "mc_info_rs_CC_Button_Update_OnClick";
    $mc_info_rs_CC->Id_PPMC->CCSEvents["BeforeShow"] = "mc_info_rs_CC_Id_PPMC_BeforeShow";
    $mc_info_rs_CC->CCSEvents["BeforeShow"] = "mc_info_rs_CC_BeforeShow";
    $mc_info_rs_CC->ds->CCSEvents["BeforeExecuteInsert"] = "mc_info_rs_CC_ds_BeforeExecuteInsert";
    $mc_info_rs_CC->CCSEvents["BeforeInsert"] = "mc_info_rs_CC_BeforeInsert";
    $mc_info_rs_CC->CCSEvents["BeforeUpdate"] = "mc_info_rs_CC_BeforeUpdate";
    $mc_info_rs_CC->ds->CCSEvents["BeforeExecuteUpdate"] = "mc_info_rs_CC_ds_BeforeExecuteUpdate";
    $mc_info_rs_CC->ds->CCSEvents["AfterExecuteSelect"] = "mc_info_rs_CC_ds_AfterExecuteSelect";
    $mc_info_rs_CC->CCSEvents["AfterInsert"] = "mc_info_rs_CC_AfterInsert";
    $mc_info_rs_CC->CCSEvents["AfterUpdate"] = "mc_info_rs_CC_AfterUpdate";
    $CalidadCodigoMetricas->CCSEvents["BeforeSelect"] = "CalidadCodigoMetricas_BeforeSelect";
    $CalidadCodigoMetricas->ds->CCSEvents["BeforeBuildSelect"] = "CalidadCodigoMetricas_ds_BeforeBuildSelect";
    $CalidadCodigoReglas->ds->CCSEvents["BeforeExecuteSelect"] = "CalidadCodigoReglas_ds_BeforeExecuteSelect";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_info_rs_CC_Button_Insert_BeforeShow @29-D34C5F30
function mc_info_rs_CC_Button_Insert_BeforeShow(& $sender)
{
    $mc_info_rs_CC_Button_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_Button_Insert_BeforeShow

//Custom Code @182-2A29BDB7
// -------------------------
	global $db;
  	$db = new clsDBcnDisenio;
	$sqlGetPPMC="	SELECT u.numero as numero , e.ESTIMACION_ID as IdEstimacion
					FROM mc_universo_cds u , PPMC_ESTIMACION e
					WHERE u.numero = e.ID_PPMC 
					AND u.id=". CCGetParam("Id"). "
					AND month(e.FECHA_CARGA)=u.mes 
					AND YEAR(e.FECHA_CARGA) = u.anio";
//					AND e.ESTADO_REQ_ESTIM = 'Estimación Aprobada' 
//					AND e.RESULTADO_ESTIMACION <> 'Rechazada'";
    
    $db->query($sqlGetPPMC);
    
    if($db->next_record()){
  		$IdPPMC = $db->f("numero"); 
  		$IdEstimacion = $db->f("IdEstimacion");
    }
	
	
	
 // verifica si existe el PPMC en la tabla de calificación
/*
		$sSQL="
    		SELECT count(*) 
    		FROM mc_info_rs_CC 
    		WHERE Id_PPMC=".$IdPPMC. " 
    		AND ID_Estimacion=".$IdEstimacion;
*/
		$sSQL="
    		SELECT count(*) 
    		FROM mc_info_rs_CC 
    		WHERE Id_PPMC=".$IdPPMC. " 
    		AND IdUniverso=".CCGetParam("Id");


        $db->query($sSQL);
	    if($db->next_record()){
	  		$countReg = $db->f(0); 
	    }
    	if($countReg==0){ // si no existe se activa boton de insert
     		$mc_info_rs_CC->Button_Insert->Visible=true;
			$mc_info_rs_CC->Button_Update->Visible=false;
    	} else { //si existe se activa boton de update
     		$mc_info_rs_CC->Button_Insert->Visible=false;
			$mc_info_rs_CC->Button_Update->Visible=true;
    	}	
    	
  $db->Close();


    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_rs_CC_Button_Insert_BeforeShow @29-5CC8A61B
    return $mc_info_rs_CC_Button_Insert_BeforeShow;
}
//End Close mc_info_rs_CC_Button_Insert_BeforeShow

//mc_info_rs_CC_Button_Update_OnClick @30-DE398A06
function mc_info_rs_CC_Button_Update_OnClick(& $sender)
{
    $mc_info_rs_CC_Button_Update_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_Button_Update_OnClick

//Custom Code @211-2A29BDB7
// -------------------------

// -------------------------
//End Custom Code

//Close mc_info_rs_CC_Button_Update_OnClick @30-09881C17
    return $mc_info_rs_CC_Button_Update_OnClick;
}
//End Close mc_info_rs_CC_Button_Update_OnClick

//mc_info_rs_CC_Id_PPMC_BeforeShow @33-D85E30E0
function mc_info_rs_CC_Id_PPMC_BeforeShow(& $sender)
{
    $mc_info_rs_CC_Id_PPMC_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_Id_PPMC_BeforeShow

//Custom Code @46-2A29BDB7
// -------------------------
  	global $IdPPMC;
  	global $CalMet;
  	global $CalReg;
  	global $Cumple;
  	global $IdEstimacion;
  	
  	global $db;
  	$db = new clsDBcnDisenio;
  	  	
    //$sqlGetPPMC="SELECT numero, IdEstimacion FROM mc_universo_cds WHERE id=" . CCGetParam("Id");
    

    $sqlGetPPMC="	SELECT u.numero as numero , e.ESTIMACION_ID as IdEstimacion,  u.mes as mes , u.anio as anio
					FROM mc_universo_cds u , PPMC_ESTIMACION e
					WHERE u.numero = e.ID_PPMC 
					AND u.id=". CCGetParam("Id"). "
					AND e.ESTADO_REQ_ESTIM like '%Aprob%'
					AND month(e.fecha_carga)=u.mes 
					AND YEAR(e.FECHA_CARGA) = u.anio";
//					AND e.ESTADO_REQ_ESTIM = 'Estimación Aprobada' 
//					AND e.RESULTADO_ESTIMACION <> 'Rechazada'";
					
    $db->query($sqlGetPPMC);
    
    if($db->next_record()){
  		$IdPPMC = $db->f("numero"); 
  		$IdEstimacion = $db->f("IdEstimacion");  		
  		$mesmedicion = $db->f("mes");
  		$aniomedicion = $db->f("anio");
    }
/*    
    $sSQL="
    		SELECT count(*) 
    		FROM mc_info_rs_CC 
    		WHERE Id_PPMC=".$IdPPMC. " 
    		AND ID_Estimacion=".$IdEstimacion;
*/
    $sSQL="
    		SELECT count(*) 
    		FROM mc_info_rs_CC 
    		WHERE Id_PPMC=".$IdPPMC. " 
    		AND IdUniverso=".CCGetParam("Id");


	$db->query($sSQL);
	if($db->next_record()){
	  		$countReg = $db->f(0); 
	}
    if($countReg==0){ // si no se ha capturado se traen datos de tablas CalidadCodigoReglas y CalidadCodigoMetricas

		$db->Close();

	    $db = new clsDBConnCarga;
	    
	    
	    $sqlGetPorCalReg = "SELECT MAX([Porcentaje de Calidad de Código]) as calReg FROM CalidadCodigoReglas WHERE PPMC = '" . $IdPPMC ."' AND month([FECHA DE CORTE]) = ".$mesmedicion." AND year([FECHA DE CORTE])= ".$aniomedicion;
	  	$db->query($sqlGetPorCalReg);
	    if($db->next_record()){
			  	$CalReg = $db->f("calReg");  
	    }
	    

		$sqlGetPorCalMet = "SELECT MAX([Porcentaje de calidad métricas]) as calMet FROM CalidadCodigoMetricas WHERE PPMC = '" . $IdPPMC ."' AND month([FECHA DE CORTE]) = ".$mesmedicion." AND year([FECHA DE CORTE])= ".$aniomedicion;
	  	$db->query($sqlGetPorCalMet);
	    if($db->next_record()){
			  	$CalMet = $db->f("calMet");  
		}
	    if (is_int($CalMet) && is_int($CalMet)) {	    	
			$cumple = ($CalMet < 90 || $CalReg < 90) ? 0 : 1;
	    } else {
	    	$cumple = -1;
	    }
	  	$mc_info_rs_CC->Id_PPMC->SetValue($IdPPMC);
	  	$mc_info_rs_CC->Id_PPMC_HID->SetValue($IdPPMC);
	  	$mc_info_rs_CC->ID_Estimacion->SetValue($IdEstimacion);
	  	$mc_info_rs_CC->ID_Estimacion_HID->SetValue($IdEstimacion);
	  	$mc_info_rs_CC->PctMetricas->SetValue($CalMet);
	  	$mc_info_rs_CC->PctReglas->SetValue($CalReg);
	  	$mc_info_rs_CC->CumpleCalidadCod->SetValue($cumple);

    } else { //si ya se capturo
/*
    $sSQL = "SELECT Id_PPMC, ID_Estimacion, PctReglas, PctMetricas, CumpleCalidadCod,UsuarioUltMod,FechaUltMod,Observaciones
    		 FROM mc_info_rs_CC
     		 WHERE Id_PPMC=".$IdPPMC. " 
    		 AND ID_Estimacion=".$IdEstimacion;
*/
    $sSQL = "SELECT Id_PPMC, ID_Estimacion, PctReglas, PctMetricas, CumpleCalidadCod,UsuarioUltMod,FechaUltMod,Observaciones
    		 FROM mc_info_rs_CC
     		 WHERE Id_PPMC=".$IdPPMC. " 
    		 AND IdUniverso=".CCGetParam("Id");


		  	$db->query($sSQL);
			if($db->next_record()){
			  	$mc_info_rs_CC->Id_PPMC->SetValue($db->f(0));
			  	$mc_info_rs_CC->Id_PPMC_HID->SetValue($IdPPMC);
			  	$mc_info_rs_CC->ID_Estimacion->SetValue($db->f(1));
			  	$mc_info_rs_CC->ID_Estimacion_HID->SetValue($IdEstimacion);
			  	$mc_info_rs_CC->PctMetricas->SetValue($db->f(3));
			  	$mc_info_rs_CC->PctReglas->SetValue($db->f(2));
			  	$mc_info_rs_CC->CumpleCalidadCod->SetValue($db->f(4));		 
			  	$mc_info_rs_CC->Observaciones->SetValue($db->f(7));
			}
    }	
    
  	$mc_info_rs_CC->UsuarioUltMod->SetValue(CCGetUserLogin());
  	$mc_info_rs_CC->FechaUltMod->SetValue(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y")));                    
  	//$mc_info_rs_CC->FechaUltMod->SetValue(date('Y-m-d G:i',mktime(date('H'),date('i'),date('s'),date('n'),date('j'),date('Y'))));
  	
  	
	
	$mc_info_rs_CC->mesMed->SetValue($mesmedicion);
	$mc_info_rs_CC->anioMed->SetValue($aniomedicion);
    $db->close();

  		
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_rs_CC_Id_PPMC_BeforeShow @33-1E4F86A8
    return $mc_info_rs_CC_Id_PPMC_BeforeShow;
}
//End Close mc_info_rs_CC_Id_PPMC_BeforeShow

//mc_info_rs_CC_BeforeShow @27-1A95C476
function mc_info_rs_CC_BeforeShow(& $sender)
{
    $mc_info_rs_CC_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_BeforeShow

//Custom Code @45-2A29BDB7
// -------------------------
    
    
// -------------------------
//End Custom Code

//Close mc_info_rs_CC_BeforeShow @27-356E6805
    return $mc_info_rs_CC_BeforeShow;
}
//End Close mc_info_rs_CC_BeforeShow

//mc_info_rs_CC_ds_BeforeExecuteInsert @27-5840456E
function mc_info_rs_CC_ds_BeforeExecuteInsert(& $sender)
{
    $mc_info_rs_CC_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_ds_BeforeExecuteInsert

//Custom Code @167-2A29BDB7
// -------------------------
// -------------------------
//End Custom Code

//Close mc_info_rs_CC_ds_BeforeExecuteInsert @27-9343C12F
    return $mc_info_rs_CC_ds_BeforeExecuteInsert;
}
//End Close mc_info_rs_CC_ds_BeforeExecuteInsert

//mc_info_rs_CC_BeforeInsert @27-BBF65DC6
function mc_info_rs_CC_BeforeInsert(& $sender)
{
    $mc_info_rs_CC_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_BeforeInsert

//Custom Code @168-2A29BDB7
// -------------------------

// -------------------------
//End Custom Code

//Close mc_info_rs_CC_BeforeInsert @27-6493EAE4
    return $mc_info_rs_CC_BeforeInsert;
}
//End Close mc_info_rs_CC_BeforeInsert

//mc_info_rs_CC_BeforeUpdate @27-FB3CBEEA
function mc_info_rs_CC_BeforeUpdate(& $sender)
{
    $mc_info_rs_CC_BeforeUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_BeforeUpdate

//Custom Code @169-2A29BDB7
// -------------------------

// -------------------------
//End Custom Code

//Close mc_info_rs_CC_BeforeUpdate @27-ABBA2B6B
    return $mc_info_rs_CC_BeforeUpdate;
}
//End Close mc_info_rs_CC_BeforeUpdate

//mc_info_rs_CC_ds_BeforeExecuteUpdate @27-F7BC8871
function mc_info_rs_CC_ds_BeforeExecuteUpdate(& $sender)
{
    $mc_info_rs_CC_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_ds_BeforeExecuteUpdate

//Custom Code @170-2A29BDB7
// -------------------------
// -------------------------
//End Custom Code

//Close mc_info_rs_CC_ds_BeforeExecuteUpdate @27-5C6A00A0
    return $mc_info_rs_CC_ds_BeforeExecuteUpdate;
}
//End Close mc_info_rs_CC_ds_BeforeExecuteUpdate

//mc_info_rs_CC_ds_AfterExecuteSelect @27-3DD97BDC
function mc_info_rs_CC_ds_AfterExecuteSelect(& $sender)
{
    $mc_info_rs_CC_ds_AfterExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_ds_AfterExecuteSelect

//Custom Code @181-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_rs_CC_ds_AfterExecuteSelect @27-EA5AE5FC
    return $mc_info_rs_CC_ds_AfterExecuteSelect;
}
//End Close mc_info_rs_CC_ds_AfterExecuteSelect

//mc_info_rs_CC_AfterInsert @27-A07079B0
function mc_info_rs_CC_AfterInsert(& $sender)
{
    $mc_info_rs_CC_AfterInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_AfterInsert

//Custom Code @198-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio;
    if ($mc_info_rs_CC->CumpleCalidadCod->GetValue() < 0 ) {
	$sSQL = 'UPDATE  mc_calificacion_rs_mc SET CAL_COD = NULL WHERE IdUniverso =' . CCGetParam("Id");    	
    } else {
    $sSQL = 'UPDATE  mc_calificacion_rs_mc SET CAL_COD = ' . $mc_info_rs_CC->CumpleCalidadCod->GetValue() .
    			' WHERE IdUniverso =' . CCGetParam("Id");
    }
	
    $db->query($sSQL);
    $db->close();


    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_rs_CC_AfterInsert @27-09F2A028
    return $mc_info_rs_CC_AfterInsert;
}
//End Close mc_info_rs_CC_AfterInsert

//mc_info_rs_CC_AfterUpdate @27-A52987C0
function mc_info_rs_CC_AfterUpdate(& $sender)
{
    $mc_info_rs_CC_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_rs_CC; //Compatibility
//End mc_info_rs_CC_AfterUpdate

//Custom Code @199-2A29BDB7
// -------------------------
   global $db;

 
    $db= new clsDBcnDisenio;
    if ($mc_info_rs_CC->CumpleCalidadCod->GetValue() < 0 ) {
	$sSQL = 'UPDATE  mc_calificacion_rs_mc SET CAL_COD = NULL WHERE IdUniverso =' . CCGetParam("Id");    	
    } else {
    $sSQL = 'UPDATE  mc_calificacion_rs_mc SET CAL_COD = ' . $mc_info_rs_CC->CumpleCalidadCod->GetValue() .
    			' WHERE IdUniverso =' . CCGetParam("Id");
    }
    $db->query($sSQL);
    
    if (strlen($mc_info_rs_CC->Observaciones->Value)==0){
    $cSQL = "UPDATE  mc_info_rs_CC SET Observaciones = '' WHERE IdUniverso =" . CCGetParam("Id");    	    
    }
    $db->query($cSQL);    
    $db->close();

// -------------------------
//End Custom Code

//Close mc_info_rs_CC_AfterUpdate @27-C6DB61A7
    return $mc_info_rs_CC_AfterUpdate;
}
//End Close mc_info_rs_CC_AfterUpdate

//CalidadCodigoMetricas_BeforeSelect @47-E4B8B929
function CalidadCodigoMetricas_BeforeSelect(& $sender)
{
    $CalidadCodigoMetricas_BeforeSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CalidadCodigoMetricas; //Compatibility
//End CalidadCodigoMetricas_BeforeSelect

//Custom Code @100-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close CalidadCodigoMetricas_BeforeSelect @47-0D298044
    return $CalidadCodigoMetricas_BeforeSelect;
}
//End Close CalidadCodigoMetricas_BeforeSelect

//CalidadCodigoMetricas_ds_BeforeBuildSelect @47-FB572768
function CalidadCodigoMetricas_ds_BeforeBuildSelect(& $sender)
{
    $CalidadCodigoMetricas_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CalidadCodigoMetricas; //Compatibility
//End CalidadCodigoMetricas_ds_BeforeBuildSelect

//Custom Code @101-2A29BDB7
// -------------------------
	global $mc_info_rs_CC;
	global $Id_PPMC;
	global $mc_info_rs_CC; //Compatibility
	$Id_PPMC=$mc_info_rs_CC->Id_PPMC->GetValue();
	$mesMed = $mc_info_rs_CC->mesMed->GetValue();
	$anioMed = $mc_info_rs_CC->anioMed->GetValue();
	$CalidadCodigoMetricas->DataSource->Where .= " PPMC = '".$Id_PPMC."' AND month([FECHA DE CORTE])=".$mesMed." AND YEAR([FECHA DE CORTE]) = ".$anioMed;
// -------------------------
//End Custom Code

//Close CalidadCodigoMetricas_ds_BeforeBuildSelect @47-20198D58
    return $CalidadCodigoMetricas_ds_BeforeBuildSelect;
}
//End Close CalidadCodigoMetricas_ds_BeforeBuildSelect

//CalidadCodigoReglas_ds_BeforeExecuteSelect @123-6AD94114
function CalidadCodigoReglas_ds_BeforeExecuteSelect(& $sender)
{
    $CalidadCodigoReglas_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CalidadCodigoReglas; //Compatibility
//End CalidadCodigoReglas_ds_BeforeExecuteSelect

//Custom Code @147-2A29BDB7
// -------------------------
	global $mc_info_rs_CC;
	global $Id_PPMC;
	$Id_PPMC=$mc_info_rs_CC->Id_PPMC->GetValue();
	$mesMed = $mc_info_rs_CC->mesMed->GetValue();
	$anioMed = $mc_info_rs_CC->anioMed->GetValue();
	$CalidadCodigoReglas->DataSource->Where .= " PPMC = '".$Id_PPMC."' AND  month([FECHA DE CORTE])=".$mesMed." AND YEAR([FECHA DE CORTE]) = ".$anioMed;
    // Write your own code here.
// -------------------------
//End Custom Code

//Close CalidadCodigoReglas_ds_BeforeExecuteSelect @123-0408D25F
    return $CalidadCodigoReglas_ds_BeforeExecuteSelect;
}
//End Close CalidadCodigoReglas_ds_BeforeExecuteSelect

//Page_BeforeShow @1-753209D6
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsCrCalCodDetalle; //Compatibility
//End Page_BeforeShow

//Custom Code @26-2A29BDB7
// -------------------------
    global $lkAnterior;
    global $lkSiguiente;
    global $sPPMC;

    $aPPMCsAPbIds = unserialize(CCGetSession("aPPMCsAPbIds"));
    $aPPMCsAPbValues = unserialize(CCGetSession("aPPMCsAPbValues"));
	if(count($aPPMCsAPbIds)>1){
    	$iPos=array_search(CCGetParam("Id"),$aPPMCsAPbIds);
    	if($iPos==0){
			$lkAnterior->SetLink("PPMCsCrbLista.php?" . CCGetQueryString("QueryString",""));
			$lkAnterior->SetValue("Lista requerimientos");
    	} else {
    		$lkAnterior->SetValue($aPPMCsAPbValues[$iPos-1]);
    		$lkAnterior->SetLink("PPMCsCrCalCodDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id"),"ccsForm"),"Id",$aPPMCsAPbIds[$iPos-1]));
    	}
    	if($iPos < count($aPPMCsAPbIds)-1){
    		$lkSiguiente->SetValue($aPPMCsAPbValues[$iPos+1]);
    		$lkSiguiente->SetLink("PPMCsCrCalCodDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id"),"ccsForm"),"Id",$aPPMCsAPbIds[$iPos+1]));
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
