<?php
//BindEvents Method @1-25036293
function BindEvents()
{
    global $Grid2;
    global $grdTableroSLAs;
    global $grdSLAsCAPC;
    global $CCSEvents;
    $Grid2->CCSEvents["BeforeShow"] = "Grid2_BeforeShow";
    $grdTableroSLAs->CCSEvents["BeforeShowRow"] = "grdTableroSLAs_BeforeShowRow";
    $grdTableroSLAs->CCSEvents["BeforeShow"] = "grdTableroSLAs_BeforeShow";
    $grdSLAsCAPC->CCSEvents["BeforeShowRow"] = "grdSLAsCAPC_BeforeShowRow";
    $grdSLAsCAPC->CCSEvents["BeforeShow"] = "grdSLAsCAPC_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
}
//End BindEvents Method

//Grid2_BeforeShow @55-F39F333E
function Grid2_BeforeShow(& $sender)
{
    $Grid2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_BeforeShow

//Custom Code @100-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio();
    $db->query("select month(cast(max(cast(anioreporte as varchar) + '-' + CAST(mesreporte as varchar) + '-01') as date)) " .
    	 ", year(cast(max(cast(anioreporte as varchar) + '-' + CAST(mesreporte as varchar) + '-01') as date)) from mc_calificacion_rs_MC");
    if($db->next_record()){
    	if(CCGetParam("s_MesReporte","")==""){
    		//$Grid2->s_MesReporte->SetValue($db->f(0));
    		$Grid2->s_MesReporte->SetValue(date("m")-2);
    	}
    	if(CCGetParam("s_AnioReporte","")==""){
    		$Grid2->s_AnioReporte->SetValue($db->f(1));
    		$Grid2->s_AnioReporte->SetValue(date("Y"));
    	}
    }
    $db->close();
// -------------------------
//End Custom Code

//Close Grid2_BeforeShow @55-BC94A4C8
    return $Grid2_BeforeShow;
}
//End Close Grid2_BeforeShow

//grdTableroSLAs_BeforeShowRow @3-D4B17258
function grdTableroSLAs_BeforeShowRow(& $sender)
{
    $grdTableroSLAs_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdTableroSLAs; //Compatibility
//End grdTableroSLAs_BeforeShowRow


//Custom Code @89-2A29BDB7
	global $db;
	global $lColorCelda;
	$db= new clsDBcnDisenio();
	/*
	para que este código funcione es necesario que el nombre de los controles cumpla con lo esperado en el código
	un prefijo seguido del acronimo del SLA 
	*/
	$db->query("SELECT att.Activo , m.Acronimo  FROM mc_c_metrica m LEFT JOIN mc_metrica_atributo att " .
 				" ON att.id_ver_metrica = m.id_ver_metrica  AND att.nombre = 'Aplica_Servicio' AND valor=" . $grdTableroSLAs->DataSource->f("IdOld") .
 				" where  Acronimo is not null");
	while($db->next_record()){
		$sAcronimo= $db->f(1);
		$sImg= "Img_" . $db->f(1); //se asocia la imagen al acronimo
		$sCumplen = "Cumplen" . $sAcronimo;
		$sTotal = "Tot"  . $sAcronimo;
		$sMeta = "Meta_" . $sAcronimo;
		$grdTableroSLAs->$sCumplen->Visible=false;
		$grdTableroSLAs->$sTotal->Visible=false;
		if($db->f(0)==1){//si el campo activo del SLA para el servicio es 1, se pintan los semáforos, de lo contrario no aplica el SLA para el servicio
			$grdTableroSLAs->$sImg->SetValue("images/blank_SLA.png");
			if (isset($grdTableroSLAs->$sImg)){
				if($grdTableroSLAs->DataSource->f($db->f(1)) != ""){
					$grdTableroSLAs->$sAcronimo->SetValue($grdTableroSLAs->$sCumplen->GetValue() . "/" . $grdTableroSLAs->$sTotal->GetValue() . " = " . $grdTableroSLAs->$sAcronimo->GetValue() . "%");
					if($grdTableroSLAs->DataSource->f($db->f(1))<$grdTableroSLAs->DataSource->f($sMeta)){
						$grdTableroSLAs->$sImg->SetValue("images/down.png");
					} else {
						$grdTableroSLAs->$sImg->SetValue("images/up.png");
					}
				} else {
					$grdTableroSLAs->$sImg->SetValue("images/left.png");
					$grdTableroSLAs->$sAcronimo->SetValue("Sin Datos<br>para Medir");
				}
			}
		} else {
			//$grdTableroSLAs->$sAcronimo->SetValue("No Aplica para<br>este servicio");
			$grdTableroSLAs->$sAcronimo->SetValue("");
			$grdTableroSLAs->$sImg->SetValue("images/blank_SLA.png");
		}
	}
	$db->close();
// -------------------------
//End Custom Code

//Close grdTableroSLAs_BeforeShowRow @3-59DC762D
    return $grdTableroSLAs_BeforeShowRow;
}
//End Close grdTableroSLAs_BeforeShowRow

//grdTableroSLAs_BeforeShow @3-FDAE1039
function grdTableroSLAs_BeforeShow(& $sender)
{
    $grdTableroSLAs_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdTableroSLAs; //Compatibility
//End grdTableroSLAs_BeforeShow

//Custom Code @208-2A29BDB7
// -------------------------
    //si no esta cerrado el mes de medición y no es CAPC no puede ver el cuadro CAPC    
    global $db;
    $db= new clsDBcnDisenio();
    $db->query("select  COUNT(*) from mc_universo_cds  where mes= " .CCGetParam("s_MesReporte",date('m')) . "  and anio = " .  CCGetParam("s_AnioReporte",date('Y')) . "and (Medido <>1 or Medido is null)");
	if($db->next_record()){
		if($db->f(0)> 0 && CCGetSession("GrupoValoracion","")!='CAPC' ){
	    	$grdTableroSLAs->Visible =false;
	    } else {
	    	$grdTableroSLAs->Visible =true;
		}
	}
	$db->close();
	
	//dependiendo del proveedor se muestra o no el tablero del capc
	$grdTableroSLAs->Visible = (CCGetParam("s_id_proveedor",0)!=1);
	global $Tpl;
  	if(CCGetParam("s_id_proveedor",0)==1){
  		$Tpl->SetVar("iTableroCDS",'none');
  	} else {
  		$Tpl->SetVar("iTableroCDS",'inline');
  	}
// -------------------------
//End Custom Code

//Close grdTableroSLAs_BeforeShow @3-82FBF0F0
    return $grdTableroSLAs_BeforeShow;
}
//End Close grdTableroSLAs_BeforeShow

//DEL  	global $db;
//DEL  	global $lColorCelda;
//DEL  	$db= new clsDBcnDisenio();
//DEL  	/*
//DEL  	para que este código funcione es necesario que el nombre de los controles cumpla con lo esperado en el código
//DEL  	un prefijo seguido del acronimo del SLA 
//DEL  	*/
//DEL  	$db->query("SELECT att.Activo , m.Acronimo  FROM mc_c_metrica m LEFT JOIN mc_metrica_atributo att " .
//DEL   				" ON att.id_ver_metrica = m.id_ver_metrica  AND att.nombre = 'Aplica_Servicio' AND valor=" . $grdTableroSLAs_SAT->DataSource->f("IdOld") .
//DEL   				" where  Acronimo is not null");
//DEL  	while($db->next_record()){
//DEL  		$sAcronimo= $db->f(1);
//DEL  		$sImg= "Img_" . $db->f(1); //se asocia la imagen al acronimo
//DEL  		$sCumplen = "Cumplen" . $sAcronimo;
//DEL  		$sTotal = "Tot"  . $sAcronimo;
//DEL  		$sMeta = "Meta_" . $sAcronimo;
//DEL  		$grdTableroSLAs_SAT->$sCumplen->Visible=false;
//DEL  		$grdTableroSLAs_SAT->$sTotal->Visible=false;
//DEL  		if($db->f(0)==1){//si el campo activo del SLA para el servicio es 1, se pintan los semáforos, de lo contrario no aplica el SLA para el servicio
//DEL  			$grdTableroSLAs_SAT->$sImg->SetValue("images/blank_SLA.png");
//DEL  			if (isset($grdTableroSLAs_SAT->$sImg)){
//DEL  				if($grdTableroSLAs_SAT->DataSource->f($db->f(1)) != ""){
//DEL  					$grdTableroSLAs_SAT->$sAcronimo->SetValue($grdTableroSLAs_SAT->$sCumplen->GetValue() . "/" . $grdTableroSLAs_SAT->$sTotal->GetValue() . " = " . $grdTableroSLAs_SAT->$sAcronimo->GetValue() . "%");
//DEL  					if($grdTableroSLAs_SAT->DataSource->f($db->f(1))<$grdTableroSLAs_SAT->DataSource->f($sMeta)){
//DEL  						$grdTableroSLAs_SAT->$sImg->SetValue("images/down.png");
//DEL  					} else {
//DEL  						$grdTableroSLAs_SAT->$sImg->SetValue("images/up.png");
//DEL  					}
//DEL  				} else {
//DEL  					$grdTableroSLAs_SAT->$sImg->SetValue("images/left.png");
//DEL  					$grdTableroSLAs_SAT->$sAcronimo->SetValue("Sin Datos<br>para Medir");
//DEL  				}
//DEL  			}
//DEL  		} else {
//DEL  			//$grdTableroSLAs->$sAcronimo->SetValue("No Aplica para<br>este servicio");
//DEL  			$grdTableroSLAs_SAT->$sAcronimo->SetValue("");
//DEL  			$grdTableroSLAs_SAT->$sImg->SetValue("images/blank_SLA.png");
//DEL  		}
//DEL  	}
//DEL  	$db->close();
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      //si no es SAT, no puede ver el cuadro del SAT
//DEL      if(CCGetSession("GrupoValoracion","")=='SAT' || CCGetGroupID()> 3){
//DEL      	$grdTableroSLAs_SAT->Visible =true;
//DEL      } else {
//DEL      	$grdTableroSLAs_SAT->Visible =false;
//DEL      }
//DEL      
//DEL  	//dependiendo del proveedor se muestra o no el tablero del capc
//DEL  	$grdTableroSLAs_SAT->Visible = (CCGetParam("s_id_proveedor",0)!=1);    
//DEL  // -------------------------

//grdSLAsCAPC_BeforeShowRow @213-1E7B3DC7
function grdSLAsCAPC_BeforeShowRow(& $sender)
{
    $grdSLAsCAPC_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdSLAsCAPC; //Compatibility
//End grdSLAsCAPC_BeforeShowRow

//Custom Code @235-2A29BDB7
// -------------------------
    //se ponen las leyendas del SLA de Calidad
    if($grdSLAsCAPC->DataSource->f("IdServCont") ==7){
    	//$grdSLAsCAPC->Deductiva->SetValue("No Aplica Para Este Servicio");
    	$grdSLAsCAPC->pctcalidad->SetValue("No Aplica Para Este Servicio");
    } else {
    	//if(!is_numeric($grdSLAsCAPC->DataSource->f("Deductiva->GetValue())){
    		//$grdSLAsCAPC->Deductiva->SetValue(0);
    	//}
    	if(is_numeric($grdSLAsCAPC->pctcalidad->GetValue())){
			$grdSLAsCAPC->pctcalidad->SetValue(number_format($grdSLAsCAPC->pctcalidad->GetValue(),2,'.','') . " %");
    	} else {
    		$grdSLAsCAPC->pctcalidad->SetValue("Sin Datos Para Medir");
    	}
    }
    //se ponen las leyendas del SLA de Deductivas
    if($grdSLAsCAPC->DataSource->f("IdServCont") !=6){ 
    		$grdSLAsCAPC->ReportesCompletos->SetValue("No Aplica Para Este Servicio");
    		$grdSLAsCAPC->SLAsNoReportados->SetValue("No Aplica Para Este Servicio");
    		$grdSLAsCAPC->DEDUC_OMISION->SetValue("No Aplica Para Este Servicio");
    } else {
    	if($grdSLAsCAPC->DataSource->f("DEDUC_OMISION")==""){
    		$grdSLAsCAPC->ReportesCompletos->SetValue("No Aplica Para Este Servicio");
    		$grdSLAsCAPC->SLAsNoReportados->SetValue("No Aplica Para Este Servicio");
    		$grdSLAsCAPC->DEDUC_OMISION->SetValue("No Aplica Para Este Servicio");
    	} else {
    		$grdSLAsCAPC->ReportesCompletos->SetValue(1);
    		$grdSLAsCAPC->SLAsNoReportados->SetValue(0);
    		$grdSLAsCAPC->DEDUC_OMISION->SetValue("100%");
    	}
    }
    //se ponen las leyendas del SLA de Eficiencia Presupuestal
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
    	if($grdSLAsCAPC->DataSource->f("IdServCont") ==7){
    		$grdSLAsCAPC->imgCALIDAD_PROD_TERM->SetValue("images/noaplica.png");
    	} else {
    		$grdSLAsCAPC->imgCALIDAD_PROD_TERM->SetValue("images/left.png");
    	}
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
    } else {
    	$grdSLAsCAPC->imgDEDUC_OMISION->SetValue("images/noaplica.png");
    }
    //Semáforo de eficiencia presupuestal
    if($grdSLAsCAPC->DataSource->f("EFIC_PRESUP")==""){
    	if($grdSLAsCAPC->DataSource->f("IdServCont") <8){ 
    		$grdSLAsCAPC->imgEFIC_PRESUP->SetValue("images/noaplica.png");
    	} else {
    		$grdSLAsCAPC->imgEFIC_PRESUP->SetValue("images/left.png");
    	}
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

//Close grdSLAsCAPC_BeforeShowRow @213-DACAD852
    return $grdSLAsCAPC_BeforeShowRow;
}
//End Close grdSLAsCAPC_BeforeShowRow

//grdSLAsCAPC_BeforeShow @213-F626EBC4
function grdSLAsCAPC_BeforeShow(& $sender)
{
    $grdSLAsCAPC_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdSLAsCAPC; //Compatibility
//End grdSLAsCAPC_BeforeShow

//Custom Code @238-2A29BDB7
// -------------------------
    //dependiendo del proveedor se muestra o no el tablero del capc
	$grdSLAsCAPC->Visible = (CCGetParam("s_id_proveedor",0)==1);
// -------------------------
//End Custom Code

//Close grdSLAsCAPC_BeforeShow @213-653EDFBE
    return $grdSLAsCAPC_BeforeShow;
}
//End Close grdSLAsCAPC_BeforeShow

//DEL  // -------------------------
//DEL      
//DEL      if($grdSLAsCAPC->DataSource->f("IdServCont") ==7){
//DEL      	$grdSLAsCAPC->Deductiva->SetValue("No Aplica Para Este Servicio");
//DEL      	$grdSLAsCAPC->pctcalidad->SetValue("No Aplica Para Este Servicio");
//DEL      } else {
//DEL      	if(!is_numeric($grdSLAsCAPC->Deductiva->GetValue())){
//DEL      		$grdSLAsCAPC->Deductiva->SetValue(0);
//DEL      	}
//DEL      	if(is_numeric($grdSLAsCAPC->pctcalidad->GetValue())){
//DEL  			$grdSLAsCAPC->pctcalidad->SetValue(number_format($grdSLAsCAPC->pctcalidad->GetValue(),2,'.','') . " %");
//DEL      	} else {
//DEL      		$grdSLAsCAPC->pctcalidad->SetValue("Sin Datos Para Medir");
//DEL      	}
//DEL      }
//DEL      if($grdSLAsCAPC->DataSource->f("IdServCont") !=6){ 
//DEL      		$grdSLAsCAPC->ReportesCompletos->SetValue("No Aplica Para Este Servicio");
//DEL      		$grdSLAsCAPC->SLAsNoReportados->SetValue("No Aplica Para Este Servicio");
//DEL      		$grdSLAsCAPC->DEDUC_OMISION->SetValue("No Aplica Para Este Servicio");
//DEL      } else {
//DEL      	if($grdSLAsCAPC->DataSource->f("DEDUC_OMISION")==""){
//DEL      		$grdSLAsCAPC->ReportesCompletos->SetValue("No Aplica");
//DEL      		$grdSLAsCAPC->SLAsNoReportados->SetValue("No Aplica");
//DEL      		$grdSLAsCAPC->DEDUC_OMISION->SetValue("No Aplica");
//DEL      	} else {
//DEL      		$grdSLAsCAPC->ReportesCompletos->SetValue(1);
//DEL      		$grdSLAsCAPC->SLAsNoReportados->SetValue(0);
//DEL      		$grdSLAsCAPC->DEDUC_OMISION->SetValue("100%");
//DEL      	}
//DEL      }
//DEL      if($grdSLAsCAPC->DataSource->f("IdServCont") <8){ 
//DEL      	$grdSLAsCAPC->UnidadesActuales->SetValue("No Aplica Para Este Servicio");
//DEL      	$grdSLAsCAPC->UnidadesAnteriores->SetValue("No Aplica Para Este Servicio");
//DEL      	$grdSLAsCAPC->Label2->SetValue("No Aplica Para Este Servicio");
//DEL      } else {
//DEL      	if($grdSLAsCAPC->UnidadesActuales->GetValue()==""){
//DEL      		$grdSLAsCAPC->UnidadesActuales->SetValue("Sin Datos Para Medir");
//DEL      		$grdSLAsCAPC->UnidadesAnteriores->SetValue("Sin Datos Para Medir");
//DEL      		$grdSLAsCAPC->Label2->SetValue("Sin Datos Para Medir");
//DEL      	} else {
//DEL      		$grdSLAsCAPC->Label2->SetValue((100*$grdSLAsCAPC->UnidadesActuales->GetValue()/$grdSLAsCAPC->UnidadesAnteriores->GetValue())-100);
//DEL      	}
//DEL      }
//DEL      if($grdSLAsCAPC->DiasPlaneados->GetValue()==""){
//DEL     		$grdSLAsCAPC->DiasPlaneados->SetValue("Sin Datos para Medir");
//DEL      }
//DEL      if($grdSLAsCAPC->DiasReales->GetValue()==""){
//DEL     		$grdSLAsCAPC->DiasReales->SetValue("Sin Datos para Medir");
//DEL     		$grdSLAsCAPC->RETR_ENTREGABLE->SetValue("Sin Datos para Medir");
//DEL      } else {
//DEL     		$grdSLAsCAPC->RETR_ENTREGABLE->SetValue(0);
//DEL      }
//DEL      
//DEL      //dependiendo del resultado de los SLAs, se ponen las flechas
//DEL      //Semáforo de calidad
//DEL      if($grdSLAsCAPC->DataSource->f("CALIDAD_PROD_TERM")=="" || $grdSLAsCAPC->DataSource->f("IdServCont") ==7){
//DEL      	$grdSLAsCAPC->imgCALIDAD_PROD_TERM->SetValue("images/left.png");
//DEL      } else {
//DEL      	if($grdSLAsCAPC->DataSource->f("CALIDAD_PROD_TERM")!=0){
//DEL      		$grdSLAsCAPC->imgCALIDAD_PROD_TERM->SetValue("images/up.png");
//DEL      	} else {
//DEL      		$grdSLAsCAPC->imgCALIDAD_PROD_TERM->SetValue("images/down.png");
//DEL      	}
//DEL      }
//DEL      //Semáforo de deductiva por omisión
//DEL      if($grdSLAsCAPC->DataSource->f("IdServCont") ==6){ 
//DEL      	if($grdSLAsCAPC->DataSource->f("DEDUC_OMISION")==""){
//DEL      		$grdSLAsCAPC->imgDEDUC_OMISION->SetValue("images/left.png");
//DEL      	} else {
//DEL      		if($grdSLAsCAPC->DataSource->f("DEDUC_OMISION")){
//DEL      			$grdSLAsCAPC->imgDEDUC_OMISION->SetValue("images/up.png");
//DEL      		} else {
//DEL      			$grdSLAsCAPC->imgDEDUC_OMISION->SetValue("images/down.png");
//DEL      		}
//DEL      	}
//DEL      }
//DEL      //Semáforo de eficiencia presupuestal
//DEL      if($grdSLAsCAPC->DataSource->f("EFIC_PRESUP")==""){
//DEL      	$grdSLAsCAPC->imgEFIC_PRESUP->SetValue("images/left.png");
//DEL      } else {
//DEL      	if($grdSLAsCAPC->DataSource->f("EFIC_PRESUP")){
//DEL      		$grdSLAsCAPC->imgEFIC_PRESUP->SetValue("images/up.png");
//DEL      	} else {
//DEL      		$grdSLAsCAPC->imgEFIC_PRESUP->SetValue("images/down.png");
//DEL      	}
//DEL      }
//DEL      //Semáforo de retraso en entregables
//DEL      if($grdSLAsCAPC->DataSource->f("RETR_ENTREGABLE")==""){
//DEL      	$grdSLAsCAPC->imgRETR_ENTREGABLE->SetValue("images/left.png");
//DEL      } else {
//DEL      	if($grdSLAsCAPC->DataSource->f("RETR_ENTREGABLE")){
//DEL      		$grdSLAsCAPC->imgRETR_ENTREGABLE->SetValue("images/up.png");
//DEL      	} else {
//DEL      		$grdSLAsCAPC->imgRETR_ENTREGABLE->SetValue("images/down.png");
//DEL      	}
//DEL      }
//DEL      
//DEL  // -------------------------

//Page_BeforeShow @1-9C4916B1
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $TableroSLAsCDSs; //Compatibility
//End Page_BeforeShow

//Custom Code @204-2A29BDB7
// -------------------------
	global $db;
	global $UrlCDS;
	$db = new clsDBcnDisenio();
	if(CCGetParam('s_id_proveedor',0)==0){
		$UrlCDS->SetValue("Sin Proveedor seleccionado");
		$UrlCDS->SetLink('');
	} else {
		if(CCDLookUp("UrlTableroCDS","mc_c_proveedor","id_proveedor = " . $db->ToSQL(CCGetParam('s_id_proveedor',0),ccsInteger),$db)==""){
			$UrlCDS->SetValue("Sin datos para el tablero del proveedor");
			$UrlCDS->SetLink('');
		} else {
			$UrlCDS->SetValue(CCDLookUp("UrlTableroCDS","mc_c_proveedor","id_proveedor = " . $db->ToSQL(CCGetParam('s_id_proveedor',0),ccsInteger),$db));
			$UrlCDS->SetLink(CCDLookUp("UrlTableroCDS","mc_c_proveedor","id_proveedor = " . $db->ToSQL(CCGetParam('s_id_proveedor',0),ccsInteger),$db));
		}
	}
	$db->close();

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_OnInitializeView @1-DD6867EB
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $TableroSLAsCDSs; //Compatibility
//End Page_OnInitializeView

//Custom Code @205-2A29BDB7
// -------------------------
	
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_AfterInitialize @1-E75C00B3
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $TableroSLAsCDSs; //Compatibility
//End Page_AfterInitialize

//Custom Code @206-2A29BDB7
// -------------------------
	
// -------------------------
//End Custom Code

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize
?>
