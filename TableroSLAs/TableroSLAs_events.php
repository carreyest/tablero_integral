<?php
//BindEvents Method @1-B66DCDA4
function BindEvents()
{
    global $Grid2;
    global $grdSLAsCAPC;
    global $grdTableroSLAsMG;
    global $grdTableroSLAs;
    global $CCSEvents;
    $Grid2->CCSEvents["BeforeShow"] = "Grid2_BeforeShow";
    $Grid2->CCSEvents["OnValidate"] = "Grid2_OnValidate";
    $grdSLAsCAPC->CCSEvents["BeforeShowRow"] = "grdSLAsCAPC_BeforeShowRow";
    $grdSLAsCAPC->CCSEvents["BeforeShow"] = "grdSLAsCAPC_BeforeShow";
    $grdTableroSLAsMG->CCSEvents["BeforeShow"] = "grdTableroSLAsMG_BeforeShow";
    $grdTableroSLAsMG->CCSEvents["BeforeShowRow"] = "grdTableroSLAsMG_BeforeShowRow";
    $grdTableroSLAs->CCSEvents["BeforeShowRow"] = "grdTableroSLAs_BeforeShowRow";
    $grdTableroSLAs->CCSEvents["BeforeShow"] = "grdTableroSLAs_BeforeShow";
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

//Grid2_OnValidate @55-16E2EE76
function Grid2_OnValidate(& $sender)
{
    $Grid2_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_OnValidate

//Custom Code @472-2A29BDB7
// -------------------------
// -------------------------
//End Custom Code

//Close Grid2_OnValidate @55-836FC041
    return $Grid2_OnValidate;
}
//End Close Grid2_OnValidate

//grdSLAsCAPC_BeforeShowRow @412-1E7B3DC7
function grdSLAsCAPC_BeforeShowRow(& $sender)
{
    $grdSLAsCAPC_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdSLAsCAPC; //Compatibility
//End grdSLAsCAPC_BeforeShowRow

//Custom Code @466-2A29BDB7
	global $db;
	global $lColorCelda;
	$db= new clsDBcnDisenio();
	/*
	para que este código funcione es necesario que el nombre de los controles cumpla con lo esperado en el código
	un prefijo seguido del acronimo del SLA 
	*/
	
//	$db->query("SELECT att.Activo , m.Acronimo  FROM mc_c_metrica m LEFT JOIN mc_metrica_atributo att " .
// 				" ON att.id_ver_metrica = m.id_ver_metrica  AND att.nombre = 'Aplica_Servicio' AND valor=" . $grdSLAsCAPC->DataSource->f("IdServCont") .
// 				" where  Acronimo is not null");
//	$db->query("SELECT att.Activo , m.Acronimo  FROM mc_c_metrica m LEFT JOIN mc_metrica_atributo att " .
// 				" ON att.id_ver_metrica = m.id_ver_metrica  AND att.nombre = 'Aplica_Servicio' AND valor=" . $grdSLAsCAPC->DataSource->f("id_serviciocont") .
// 				" where  Acronimo is not null and Acronimo not in ('CAL_COD','DEF_FUG_AMB_PROD','Inc_TiempoAsignacion','Inc_TiempoSolucion','EFIC_PRESUP')");
//	$db->query("SELECT att.Activo , m.Acronimo  FROM mc_c_metrica m LEFT JOIN mc_metrica_atributo att " .
// 				" ON att.id_ver_metrica = m.id_ver_metrica  AND att.nombre = 'Aplica_Servicio' AND valor in (select idOld from mc_c_ServContractual where Aplica='CAPC') " .
// 				" where  Acronimo is not null and Acronimo not in ('CAL_COD','DEF_FUG_AMB_PROD','Inc_TiempoAsignacion','Inc_TiempoSolucion','EFIC_PRESUP')");
	$db->query("SELECT att.Activo , m.Acronimo  FROM mc_c_metrica m LEFT JOIN mc_metrica_atributo att " .
 				" ON att.id_ver_metrica = m.id_ver_metrica  AND att.nombre = 'Aplica_Servicio' AND valor in (select idOld from mc_c_ServContractual where Aplica='CAPC') " .
 				" where  Acronimo is not null and Acronimo not in ('DEF_FUG_AMB_PROD','Inc_TiempoAsignacion','Inc_TiempoSolucion','EFIC_PRESUP')");


//	$db->query("select EsSLA, Acronimo from mc_c_metrica where id_ver_metrica in (1,2,3,5,6,13)");	

	while($db->next_record()){
		$sAcronimo= $db->f(1);
		$sImg= "Img_" . $db->f(1); //se asocia la imagen al acronimo
		$sCumplen = "Cumplen" . $sAcronimo;
		$sTotal = "Tot"  . $sAcronimo;
		$sMeta = "Meta_" . $sAcronimo;
		$grdSLAsCAPC->$sCumplen->Visible=false;
		$grdSLAsCAPC->$sTotal->Visible=false;
		if($db->f(0)==1){//si el campo activo del SLA para el servicio es 1, se pintan los semáforos, de lo contrario no aplica el SLA para el servicio
			$grdSLAsCAPC->$sImg->SetValue("images/blank_SLA.png");
			if (isset($grdSLAsCAPC->$sImg)){
				if($grdSLAsCAPC->DataSource->f($db->f(1)) != ""){
					if($grdSLAsCAPC->$sCumplen->GetValue() != 0) {
						$valPct=round($grdSLAsCAPC->$sCumplen->GetValue()/$grdSLAsCAPC->$sTotal->GetValue(),2)*100;
					} else{
					    $valPct=0;
					}
					$grdSLAsCAPC->$sAcronimo->SetValue($grdSLAsCAPC->$sCumplen->GetValue() . "/" . $grdSLAsCAPC->$sTotal->GetValue() . " = " . $valPct . "%");
					//if($grdSLAsCAPC->DataSource->f($db->f(1))<$grdSLAsCAPC->DataSource->f($sMeta)){
					if($valPct<$grdSLAsCAPC->DataSource->f($sMeta)){
						$grdSLAsCAPC->$sImg->SetValue("images/down.png");
					} else {
						$grdSLAsCAPC->$sImg->SetValue("images/up.png");
					}
				} else {
					$grdSLAsCAPC->$sImg->SetValue("images/left.png");					
					$grdSLAsCAPC->$sAcronimo->SetValue("Sin Datos<br>para Medir");

				}
			}
		} else {
			$grdSLAsCAPC->$sAcronimo->SetValue("No Aplica para<br>este servicio");
			//$grdSLAsCAPC->$sAcronimo->SetValue("");
			$grdSLAsCAPC->$sImg->SetValue("images/blank_SLA.png");
		}
		
		if( 
		($grdSLAsCAPC->DataSource->f("id_serviciocont") <> 6 ) AND ($sAcronimo=='DEDUC_OMISION') OR 
		($grdSLAsCAPC->DataSource->f("id_serviciocont") == 9 ) AND ($sAcronimo=='CUMPL_REQ_FUNC')
		) {
			$grdSLAsCAPC->$sAcronimo->SetValue("No Aplica para<br>este servicio");
			//$grdSLAsCAPC->$sAcronimo->SetValue("");
			$grdSLAsCAPC->$sImg->SetValue("images/blank_SLA.png");
			
		}
		
		
	}
	$db->close();


 	
// -------------------------
//End Custom Code

//Close grdSLAsCAPC_BeforeShowRow @412-DACAD852
    return $grdSLAsCAPC_BeforeShowRow;
}
//End Close grdSLAsCAPC_BeforeShowRow

//grdSLAsCAPC_BeforeShow @412-F626EBC4
function grdSLAsCAPC_BeforeShow(& $sender)
{
    $grdSLAsCAPC_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdSLAsCAPC; //Compatibility
    global $grdTableroSLAs;
//End grdSLAsCAPC_BeforeShow

//Custom Code @467-2A29BDB7
// -------------------------
	
	//dependiendo del proveedor se muestra o no el tablero del capc
	$grdTableroSLAs->Visible = (CCGetParam("s_id_proveedor",0)!=1);
	$grdSLAsCAPC->Visible = (CCGetParam("s_id_proveedor",0)==1);
	global $Tpl;
  	if(CCGetParam("s_id_proveedor",0)==1){
  		$Tpl->SetVar("iTableroCDS",'none');
  		$Tpl->SetVar("iTableroCAPC",'inline');
  	} else {
  		$Tpl->SetVar("iTableroCDS",'inline');
  		$Tpl->SetVar("iTableroCAPC",'none');
  	}
  	
// -------------------------
//End Custom Code

//Close grdSLAsCAPC_BeforeShow @412-653EDFBE
    return $grdSLAsCAPC_BeforeShow;
}
//End Close grdSLAsCAPC_BeforeShow

//grdTableroSLAsMG_BeforeShow @498-B214D701
function grdTableroSLAsMG_BeforeShow(& $sender)
{
    $grdTableroSLAsMG_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdTableroSLAsMG; //Compatibility
//End grdTableroSLAsMG_BeforeShow

//Custom Code @579-2A29BDB7
// -------------------------
    	//dependiendo del proveedor se muestra o no el tablero del capc
/*
	$grdTableroSLAsMG->Visible = (CCGetParam("s_id_proveedor",0)!=1);
	$grdSLAsCAPC->Visible = (CCGetParam("s_id_proveedor",0)==1);
	
	global $Tpl;
  	if(CCGetParam("s_id_proveedor",0)==1){
  		$Tpl->SetVar("iTableroCDS",'none');
  		$Tpl->SetVar("iTableroCAPC_MG",'inline');
  	} else {
  		$Tpl->SetVar("iTableroCDS",'inline');
  		$Tpl->SetVar("iTableroCAPC_MG",'none');
  	}
*/
// -------------------------
//End Custom Code

//Close grdTableroSLAsMG_BeforeShow @498-61B76007
    return $grdTableroSLAsMG_BeforeShow;
}
//End Close grdTableroSLAsMG_BeforeShow

//grdTableroSLAsMG_BeforeShowRow @498-6F7E8E1F
function grdTableroSLAsMG_BeforeShowRow(& $sender)
{
    $grdTableroSLAsMG_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdTableroSLAsMG; //Compatibility
//End grdTableroSLAsMG_BeforeShowRow

//Custom Code @580-2A29BDB7
// -------------------------
   	global $db;
	global $lColorCeldaMG;
	$db= new clsDBcnDisenio();
	/*
	para que este código funcione es necesario que el nombre de los controles cumpla con lo esperado en el código
	un prefijo seguido del acronimo del SLA 
	*/
	
/*	$db->query("SELECT att.Activo , m.Acronimo  FROM mc_c_metrica m LEFT JOIN mc_metrica_atributo att " .
 				" ON att.id_ver_metrica = m.id_ver_metrica  AND att.nombre = 'Aplica_Servicio' AND valor=" . $grdTableroSLAsMG->DataSource->f("IdOld") .
 				" where  Acronimo is not null and Acronimo <> 'DEDUC_OMISION' And Acronimo <> 'CAL_COD'");
*/
	$db->query("SELECT att.Activo , m.Acronimo  FROM mc_c_metrica m LEFT JOIN mc_metrica_atributo att " .
 				" ON att.id_ver_metrica = m.id_ver_metrica  AND att.nombre = 'Aplica_Servicio' AND valor=" . $grdTableroSLAsMG->DataSource->f("IdOld") .
 				" where  Acronimo is not null and Acronimo <> 'DEDUC_OMISION'");

	while($db->next_record()){
		$sAcronimoMG= $db->f(1)."_MG";
		$sImgMG= "Img_" . $sAcronimoMG; //se asocia la imagen al acronimo
		$sCumplenMG = "Cumplen" . $sAcronimoMG;
		$sTotalMG = "Tot"  . $sAcronimoMG;
		$sMetaMG = "Meta_" . $db->f(1);
		$grdTableroSLAsMG->$sCumplenMG->Visible=false;
		$grdTableroSLAsMG->$sTotalMG->Visible=false;
		if($db->f(0)==1){//si el campo activo del SLA para el servicio es 1, se pintan los semáforos, de lo contrario no aplica el SLA para el servicio
//			echo("|".$sImgMG."|");
			$grdTableroSLAsMG->$sImgMG->SetValue("images/blank_SLA.png");
			if (isset($grdTableroSLAsMG->$sImgMG)){
				if($grdTableroSLAsMG->DataSource->f($db->f(1)) != ""){
					$grdTableroSLAsMG->$sAcronimoMG->SetValue($grdTableroSLAsMG->$sCumplenMG->GetValue() . "/" . $grdTableroSLAsMG->$sTotalMG->GetValue() . " = " . $grdTableroSLAsMG->$sAcronimoMG->GetValue() . "%");
					if($grdTableroSLAsMG->DataSource->f($db->f(1))<$grdTableroSLAsMG->DataSource->f($sMetaMG)){
						$grdTableroSLAsMG->$sImgMG->SetValue("images/down.png");
					} else {
						$grdTableroSLAsMG->$sImgMG->SetValue("images/up.png");
					}
				} else {
					$grdTableroSLAsMG->$sImgMG->SetValue("images/left.png");
					$grdTableroSLAsMG->$sAcronimoMG->SetValue("Sin Datos<br>para Medir");
				}
			}
		} else {
			//$grdTableroSLAs->$sAcronimo->SetValue("No Aplica para<br>este servicio");
			$grdTableroSLAsMG->$sAcronimoMG->SetValue("");
			$grdTableroSLAsMG->$sImgMG->SetValue("images/blank_SLA.png");
		}
	}
	$db->close();

// -------------------------
//End Custom Code

//Close grdTableroSLAsMG_BeforeShowRow @498-E77C943A
    return $grdTableroSLAsMG_BeforeShowRow;
}
//End Close grdTableroSLAsMG_BeforeShowRow

//DEL  // -------------------------
//DEL      if($mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->GetValue()!=""){
//DEL  		$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->Visible=false;	
//DEL  		if($mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->GetValue()==1){
//DEL  			$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->SetValue("images/Cumple.png");
//DEL  		} else {
//DEL  			$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->SetValue("images/NoCumple.png");
//DEL  		}
//DEL  	} else {
//DEL  		$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->Visible=false;
//DEL  		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->SetValue("No&nbsp;Aplica");
//DEL      }
//DEL      
//DEL      if($mc_c_ServContractual_mc_c->DEDUC_OMISION->GetValue()!=""){
//DEL  		$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->DEDUC_OMISION->Visible=false;	
//DEL  		if($mc_c_ServContractual_mc_c->DEDUC_OMISION->GetValue()==1){
//DEL  			$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->SetValue("images/Cumple.png");
//DEL  		} else {
//DEL  			$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->SetValue("images/NoCumple.png");
//DEL  		}
//DEL  	} else {
//DEL  		$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->Visible=false;
//DEL  		$mc_c_ServContractual_mc_c->DEDUC_OMISION->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->DEDUC_OMISION->SetValue("No&nbsp;Aplica");
//DEL  	}
//DEL  	
//DEL  	/*
//DEL      if($mc_c_ServContractual_mc_c->EFIC_PRESUP->GetValue()!=""){
//DEL  		$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->EFIC_PRESUP->Visible=false;	
//DEL  		if($mc_c_ServContractual_mc_c->EFIC_PRESUP->GetValue()==1){
//DEL  			$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->SetValue("images/Cumple.png");
//DEL  		} else {
//DEL  			$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->SetValue("images/NoCumple.png");
//DEL  		}
//DEL  	} else {
//DEL  		$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->Visible=false;
//DEL  		$mc_c_ServContractual_mc_c->EFIC_PRESUP->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->EFIC_PRESUP->SetValue("No&nbsp;Aplica");
//DEL  	}
//DEL  	*/
//DEL  
//DEL      if($mc_c_ServContractual_mc_c->RETR_ENTREGABLE->GetValue()!=""){
//DEL  		$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->Visible=false;	
//DEL  		if($mc_c_ServContractual_mc_c->RETR_ENTREGABLE->GetValue()==1){
//DEL  			$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->SetValue("images/Cumple.png");
//DEL  		} else {
//DEL  			$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->SetValue("images/NoCumple.png");
//DEL  		}
//DEL  	} else {
//DEL  		$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->Visible=false;
//DEL  		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->SetValue("No&nbsp;Aplica");
//DEL  	}
//DEL  	
//DEL  	//nuevos para el SDMA4
//DEL  	if($mc_c_ServContractual_mc_c->HERR_EST_COST->GetValue()!=""){
//DEL  		$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->HERR_EST_COST->Visible=false;	
//DEL  		if($mc_c_ServContractual_mc_c->HERR_EST_COST->GetValue()==1){
//DEL  			$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->SetValue("images/Cumple.png");
//DEL  		} else {
//DEL  			$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->SetValue("images/NoCumple.png");
//DEL  		}
//DEL  	} else {
//DEL  		$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->Visible=false;
//DEL  		$mc_c_ServContractual_mc_c->HERR_EST_COST->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->HERR_EST_COST->SetValue("No&nbsp;Aplica");
//DEL  	}
//DEL  	
//DEL  	if($mc_c_ServContractual_mc_c->REQ_SERV->GetValue()!=""){
//DEL  		$mc_c_ServContractual_mc_c->Img_REQ_SERV->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->REQ_SERV->Visible=false;	
//DEL  		if($mc_c_ServContractual_mc_c->REQ_SERV->GetValue()==1){
//DEL  			$mc_c_ServContractual_mc_c->Img_REQ_SERV->SetValue("images/Cumple.png");
//DEL  		} else {
//DEL  			$mc_c_ServContractual_mc_c->Img_REQ_SERV->SetValue("images/NoCumple.png");
//DEL  		}
//DEL  	} else {
//DEL  		$mc_c_ServContractual_mc_c->Img_REQ_SERV->Visible=false;
//DEL  		$mc_c_ServContractual_mc_c->REQ_SERV->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->REQ_SERV->SetValue("No&nbsp;Aplica");
//DEL  	}
//DEL  	
//DEL  	if($mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->GetValue()!=""){
//DEL  		$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->Visible=false;	
//DEL  		if($mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->GetValue()==1){
//DEL  			$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->SetValue("images/Cumple.png");
//DEL  		} else {
//DEL  			$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->SetValue("images/NoCumple.png");
//DEL  		}
//DEL  	} else {
//DEL  		$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->Visible=false;
//DEL  		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->Visible=true;
//DEL  		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->SetValue("No&nbsp;Aplica");
//DEL  	}
//DEL  	
//DEL  // -------------------------

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
 				" where  Acronimo is not null and Acronimo <> 'DEDUC_OMISION'");
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
    global $grdSLAsCAPC;
//End grdTableroSLAs_BeforeShow

//Custom Code @208-2A29BDB7
// -------------------------
	
	//dependiendo del proveedor se muestra o no el tablero del capc
	$grdTableroSLAs->Visible = (CCGetParam("s_id_proveedor",0)!=1);
	$grdSLAsCAPC->Visible = (CCGetParam("s_id_proveedor",0)==1);
	
    
	global $Tpl;
  	if(CCGetParam("s_id_proveedor",0)==1){
  		$Tpl->SetVar("iTableroCDS",'none');
  		$Tpl->SetVar("iTableroCAPC",'inline');
  	} else {
  		$Tpl->SetVar("iTableroCDS",'inline');
  		$Tpl->SetVar("iTableroCAPC",'none');
  	}
  	
// -------------------------
//End Custom Code

//Close grdTableroSLAs_BeforeShow @3-82FBF0F0
    return $grdTableroSLAs_BeforeShow;
}
//End Close grdTableroSLAs_BeforeShow

//Page_BeforeShow @1-021F8B50
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $TableroSLAs; //Compatibility
//End Page_BeforeShow

//Custom Code @204-2A29BDB7
// -------------------------
	global $db;
	global $UrlCDS;
	global $grdTableroSLAsMG;
	global $pnlSLAsCAPC;
	$db = new clsDBcnDisenio();
	if(CCGetParam('s_id_proveedor',0)==0){
		$UrlCDS->SetValue("Sin Proveedor seleccionado");
		$grdTableroSLAsMG->Visible = true;
		
		$UrlCDS->SetLink('');
	} else {
		$grdTableroSLAsMG->Visible = false;
		if(CCDLookUp("UrlTableroCDS","mc_c_proveedor","id_proveedor = " . $db->ToSQL(CCGetParam('s_id_proveedor',0),ccsInteger),$db)==""){
			//$UrlCDS->SetValue("Sin datos para el tablero del proveedor");
			$UrlCDS->SetValue("");
			$UrlCDS->SetLink('');
		} else {
		    CCSetSession("id_proveedor",CCGetParam('s_id_proveedor',0));
			$UrlCDS->SetValue(CCDLookUp("UrlTableroCDS","mc_c_proveedor","id_proveedor = " . $db->ToSQL(CCGetParam('s_id_proveedor',0),ccsInteger),$db));
			$UrlCDS->SetLink(CCDLookUp("UrlTableroCDS","mc_c_proveedor","id_proveedor = " . $db->ToSQL(CCGetParam('s_id_proveedor',0),ccsInteger),$db));
		}
	}
	$db->close();
	
	$db->query("select  COUNT(*) from mc_universo_cds  where mes= " .CCGetParam("s_MesReporte",date('m')) . "  and anio = " .  CCGetParam("s_AnioReporte",date('Y')) . "and (Medido <>1 or Medido is null)");
	global $Tpl;
	if($db->next_record()){
		if($db->f(0)> 0 && CCGetSession("GrupoValoracion","")!='CAPC' ){
	    	$pnlSLAsCAPC->Visible=false;
	    	$Tpl->SetVar("iTableroSLAsCAPC",'none');
	    	$Tpl->SetVar("iTableroCAPC",'none');
	    } else {
	    	$pnlSLAsCAPC->Visible =true;
	    	$Tpl->SetVar("iTableroSLAsCAPC",'inline');
	    	$Tpl->SetVar("iTableroCAPC",'inline');
		}
	}
	$db->close();	
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_OnInitializeView @1-72E85547
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    //global $TableroSLAs; //Compatibility
    global $pnlTableroSLAs;
    global $pnlSLAsCAPC;
//End Page_OnInitializeView

//Custom Code @205-2A29BDB7
// -------------------------
//si no esta cerrado el mes de medición y no es CAPC no puede ver el cuadro CAPC    
    if(CCGetParam("s_id_proveedor")==1){
    	//$TableroSLAs->pnlTableroSLAs->Visible=false;
    	$pnlTableroSLAs->Visible=false;
    } else {
    	//$TableroSLAs->pnlSLAsCAPC->Visible=false;
    	$pnlSLAsCAPC->Visible=false;
    			      
    }
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_AfterInitialize @1-8C806B9F
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $TableroSLAs; //Compatibility
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
