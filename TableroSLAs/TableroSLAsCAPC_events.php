<?php
//BindEvents Method @1-6B308C16
function BindEvents()
{
    global $grdSLAsCAPC;
    $grdSLAsCAPC->CCSEvents["BeforeShowRow"] = "grdSLAsCAPC_BeforeShowRow";
}
//End BindEvents Method

//grdSLAsCAPC_BeforeShowRow @2-1E7B3DC7
function grdSLAsCAPC_BeforeShowRow(& $sender)
{
    $grdSLAsCAPC_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdSLAsCAPC; //Compatibility
//End grdSLAsCAPC_BeforeShowRow

//Custom Code @41-2A29BDB7
// -------------------------
    
    if($grdSLAsCAPC->DataSource->f("IdServCont") ==7){
    	$grdSLAsCAPC->Deductiva->SetValue("No Aplica Para Este Servicio");
    	$grdSLAsCAPC->pctcalidad->SetValue("No Aplica Para Este Servicio");
    } else {
    	if(!is_numeric($grdSLAsCAPC->Deductiva->GetValue())){
    		$grdSLAsCAPC->Deductiva->SetValue(0);
    	}
    	if(is_numeric($grdSLAsCAPC->pctcalidad->GetValue())){
			$grdSLAsCAPC->pctcalidad->SetValue(number_format($grdSLAsCAPC->pctcalidad->GetValue(),2,'.','') . " %");
    	} else {
    		$grdSLAsCAPC->pctcalidad->SetValue("Sin Datos Para Medir");
    	}
    }
    if($grdSLAsCAPC->DataSource->f("IdServCont") !=6){ 
    		$grdSLAsCAPC->ReportesCompletos->SetValue("No Aplica Para Este Servicio");
    		$grdSLAsCAPC->SLAsNoReportados->SetValue("No Aplica Para Este Servicio");
    		$grdSLAsCAPC->DEDUC_OMISION->SetValue("No Aplica Para Este Servicio");
    } else {
    	if($grdSLAsCAPC->DataSource->f("DEDUC_OMISION")==""){
    		$grdSLAsCAPC->ReportesCompletos->SetValue("No Aplica");
    		$grdSLAsCAPC->SLAsNoReportados->SetValue("No Aplica");
    		$grdSLAsCAPC->DEDUC_OMISION->SetValue("No Aplica");
    	} else {
    		$grdSLAsCAPC->ReportesCompletos->SetValue(1);
    		$grdSLAsCAPC->SLAsNoReportados->SetValue(0);
    		$grdSLAsCAPC->DEDUC_OMISION->SetValue("100%");
    	}
    }
    if($grdSLAsCAPC->DataSource->f("IdServCont") <8){ 
    	$grdSLAsCAPC->UnidadesActuales->SetValue("No Aplica Para Este Servicio");
    	$grdSLAsCAPC->UnidadesAnteriores->SetValue("No Aplica Para Este Servicio");
    	$grdSLAsCAPC->Label2->SetValue("No Aplica Para Este Servicio");
    } else {
    	if($grdSLAsCAPC->UnidadesActuales->GetValue()==""){
    		$grdSLAsCAPC->UnidadesActuales->SetValue("Sin Datos Para Medir");
    		$grdSLAsCAPC->UnidadesAnteriores->SetValue("Sin Datos Para Medir");
    		$grdSLAsCAPC->Label2->SetValue("Sin Datos Para Medir");
    	} else {
    		$grdSLAsCAPC->Label2->SetValue((100*$grdSLAsCAPC->UnidadesActuales->GetValue()/$grdSLAsCAPC->UnidadesAnteriores->GetValue())-100);
    	}
    }
    if($grdSLAsCAPC->DiasPlaneados->GetValue()==""){
   		$grdSLAsCAPC->DiasPlaneados->SetValue("Sin Datos para Medir");
    }
    if($grdSLAsCAPC->DiasReales->GetValue()==""){
   		$grdSLAsCAPC->DiasReales->SetValue("Sin Datos para Medir");
   		$grdSLAsCAPC->RETR_ENTREGABLE->SetValue("Sin Datos para Medir");
    } else {
   		$grdSLAsCAPC->RETR_ENTREGABLE->SetValue(0);
    }
    
    //dependiendo del resultado de los SLAs, se ponen las flechas
    //Semáforo de calidad
    if($grdSLAsCAPC->DataSource->f("CALIDAD_PROD_TERM")=="" || $grdSLAsCAPC->DataSource->f("IdServCont") ==7){
    	$grdSLAsCAPC->imgCALIDAD_PROD_TERM->SetValue("images/left.png");
    } else {
    	if($grdSLAsCAPC->DataSource->f("CALIDAD_PROD_TERM")!=0){
    		$grdSLAsCAPC->imgCALIDAD_PROD_TERM->SetValue("images/up.png");
    	} else {
    		$grdSLAsCAPC->imgCALIDAD_PROD_TERM->SetValue("images/down.png");
    	}
    }
    //Semáforo de deductiva por omisión
    if($grdSLAsCAPC->DataSource->f("IdServCont") ==6){ 
    	if($grdSLAsCAPC->DataSource->f("DEDUC_OMISION")==""){
    		$grdSLAsCAPC->imgDEDUC_OMISION->SetValue("images/left.png");
    	} else {
    		if($grdSLAsCAPC->DataSource->f("DEDUC_OMISION")){
    			$grdSLAsCAPC->imgDEDUC_OMISION->SetValue("images/up.png");
    		} else {
    			$grdSLAsCAPC->imgDEDUC_OMISION->SetValue("images/down.png");
    		}
    	}
    }
    //Semáforo de eficiencia presupuestal
    if($grdSLAsCAPC->DataSource->f("EFIC_PRESUP")==""){
    	$grdSLAsCAPC->imgEFIC_PRESUP->SetValue("images/left.png");
    } else {
    	if($grdSLAsCAPC->DataSource->f("EFIC_PRESUP")){
    		$grdSLAsCAPC->imgEFIC_PRESUP->SetValue("images/up.png");
    	} else {
    		$grdSLAsCAPC->imgEFIC_PRESUP->SetValue("images/down.png");
    	}
    }
    //Semáforo de retraso en entregables
    if($grdSLAsCAPC->DataSource->f("RETR_ENTREGABLE")==""){
    	$grdSLAsCAPC->imgRETR_ENTREGABLE->SetValue("images/left.png");
    } else {
    	if($grdSLAsCAPC->DataSource->f("RETR_ENTREGABLE")){
    		$grdSLAsCAPC->imgRETR_ENTREGABLE->SetValue("images/up.png");
    	} else {
    		$grdSLAsCAPC->imgRETR_ENTREGABLE->SetValue("images/down.png");
    	}
    }
    
// -------------------------
//End Custom Code

//Close grdSLAsCAPC_BeforeShowRow @2-DACAD852
    return $grdSLAsCAPC_BeforeShowRow;
}
//End Close grdSLAsCAPC_BeforeShowRow


?>
