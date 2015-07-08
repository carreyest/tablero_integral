<?php
//BindEvents Method @1-A291D2AE
function BindEvents()
{
    global $Grid2;
    global $grdTableroSLAs;
    global $mc_c_ServContractual_mc_c;
    global $CCSEvents;
    $Grid2->CCSEvents["BeforeShow"] = "Grid2_BeforeShow";
    $grdTableroSLAs->CCSEvents["BeforeShowRow"] = "grdTableroSLAs_BeforeShowRow";
    $grdTableroSLAs->CCSEvents["BeforeShow"] = "grdTableroSLAs_BeforeShow";
    $mc_c_ServContractual_mc_c->CCSEvents["BeforeShowRow"] = "mc_c_ServContractual_mc_c_BeforeShowRow";
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

//mc_c_ServContractual_mc_c_BeforeShowRow @323-0196D746
function mc_c_ServContractual_mc_c_BeforeShowRow(& $sender)
{
    $mc_c_ServContractual_mc_c_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_ServContractual_mc_c; //Compatibility
//End mc_c_ServContractual_mc_c_BeforeShowRow

//Custom Code @344-2A29BDB7
// -------------------------
    if($mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->Visible=true;
		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->Visible=false;	
		if($mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_CALIDAD_PROD_TERM->Visible=false;
		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->Visible=true;
		$mc_c_ServContractual_mc_c->CALIDAD_PROD_TERM->SetValue("No&nbsp;Aplica");
    }
    
    if($mc_c_ServContractual_mc_c->DEDUC_OMISION->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->Visible=true;
		$mc_c_ServContractual_mc_c->DEDUC_OMISION->Visible=false;	
		if($mc_c_ServContractual_mc_c->DEDUC_OMISION->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_DEDUC_OMISION->Visible=false;
		$mc_c_ServContractual_mc_c->DEDUC_OMISION->Visible=true;
		$mc_c_ServContractual_mc_c->DEDUC_OMISION->SetValue("No&nbsp;Aplica");
	}
	
	/*
    if($mc_c_ServContractual_mc_c->EFIC_PRESUP->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->Visible=true;
		$mc_c_ServContractual_mc_c->EFIC_PRESUP->Visible=false;	
		if($mc_c_ServContractual_mc_c->EFIC_PRESUP->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_EFIC_PRESUP->Visible=false;
		$mc_c_ServContractual_mc_c->EFIC_PRESUP->Visible=true;
		$mc_c_ServContractual_mc_c->EFIC_PRESUP->SetValue("No&nbsp;Aplica");
	}
	*/

    if($mc_c_ServContractual_mc_c->RETR_ENTREGABLE->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->Visible=true;
		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->Visible=false;	
		if($mc_c_ServContractual_mc_c->RETR_ENTREGABLE->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_RETR_ENTREGABLE->Visible=false;
		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->Visible=true;
		$mc_c_ServContractual_mc_c->RETR_ENTREGABLE->SetValue("No&nbsp;Aplica");
	}
	
	//nuevos para el SDMA4
	if($mc_c_ServContractual_mc_c->HERR_EST_COST->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->Visible=true;
		$mc_c_ServContractual_mc_c->HERR_EST_COST->Visible=false;	
		if($mc_c_ServContractual_mc_c->HERR_EST_COST->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_HERR_EST_COST->Visible=false;
		$mc_c_ServContractual_mc_c->HERR_EST_COST->Visible=true;
		$mc_c_ServContractual_mc_c->HERR_EST_COST->SetValue("No&nbsp;Aplica");
	}
	
	if($mc_c_ServContractual_mc_c->REQ_SERV->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_REQ_SERV->Visible=true;
		$mc_c_ServContractual_mc_c->REQ_SERV->Visible=false;	
		if($mc_c_ServContractual_mc_c->REQ_SERV->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_REQ_SERV->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_REQ_SERV->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_REQ_SERV->Visible=false;
		$mc_c_ServContractual_mc_c->REQ_SERV->Visible=true;
		$mc_c_ServContractual_mc_c->REQ_SERV->SetValue("No&nbsp;Aplica");
	}
	
	if($mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->GetValue()!=""){
		$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->Visible=true;
		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->Visible=false;	
		if($mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->GetValue()==1){
			$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->SetValue("images/Cumple.png");
		} else {
			$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->SetValue("images/NoCumple.png");
		}
	} else {
		$mc_c_ServContractual_mc_c->Img_CUMPL_REQ_FUN->Visible=false;
		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->Visible=true;
		$mc_c_ServContractual_mc_c->CUMPL_REQ_FUN->SetValue("No&nbsp;Aplica");
	}
	
// -------------------------
//End Custom Code

//Close mc_c_ServContractual_mc_c_BeforeShowRow @323-A587CB49
    return $mc_c_ServContractual_mc_c_BeforeShowRow;
}
//End Close mc_c_ServContractual_mc_c_BeforeShowRow

//DEL  // -------------------------
//DEL      global $db;
//DEL  	global $lColorCelda;
//DEL  	$db= new clsDBcnDisenio();
//DEL  	/*
//DEL  	para que este código funcione es necesario que el nombre de los controles cumpla con lo esperado en el código
//DEL  	un prefijo seguido del acronimo del SLA 
//DEL  	*/
//DEL  	$db->query("SELECT att.Activo , m.Acronimo  FROM mc_c_metrica m LEFT JOIN mc_metrica_atributo att " .
//DEL   				" ON att.id_ver_metrica = m.id_ver_metrica  AND att.nombre = 'Aplica_Servicio' AND valor=" . $grdTableroSLAs->DataSource->f("IdOld") .
//DEL   				" where  Acronimo is not null");
//DEL  	while($db->next_record()){
//DEL  		$sAcronimo= $db->f(1);
//DEL  		$sImg= "Img_" . $db->f(1); //se asocia la imagen al acronimo
//DEL  		$sCumplen = "Cumplen" . $sAcronimo;
//DEL  		$sTotal = "Tot"  . $sAcronimo;
//DEL  		$sMeta = "Meta_" . $sAcronimo;
//DEL  		$grdTableroSLAs->$sCumplen->Visible=false;
//DEL  		$grdTableroSLAs->$sTotal->Visible=false;
//DEL  		if($db->f(0)==1){//si el campo activo del SLA para el servicio es 1, se pintan los semáforos, de lo contrario no aplica el SLA para el servicio
//DEL  			$grdTableroSLAs->$sImg->SetValue("images/blank_SLA.png");
//DEL  			if (isset($grdTableroSLAs->$sImg)){
//DEL  				if($grdTableroSLAs->DataSource->f($db->f(1)) != ""){
//DEL  					$grdTableroSLAs->$sAcronimo->SetValue($grdTableroSLAs->$sCumplen->GetValue() . "/" . $grdTableroSLAs->$sTotal->GetValue() . " = " . $grdTableroSLAs->$sAcronimo->GetValue() . "%");
//DEL  					if($grdTableroSLAs->DataSource->f($db->f(1))<$grdTableroSLAs->DataSource->f($sMeta)){
//DEL  						$grdTableroSLAs->$sImg->SetValue("images/down.png");
//DEL  					} else {
//DEL  						$grdTableroSLAs->$sImg->SetValue("images/up.png");
//DEL  					}
//DEL  				} else {
//DEL  					$grdTableroSLAs->$sImg->SetValue("images/left.png");
//DEL  					$grdTableroSLAs->$sAcronimo->SetValue("Sin Datos<br>para Medir");
//DEL  				}
//DEL  			}
//DEL  		} else {
//DEL  			//$grdTableroSLAs->$sAcronimo->SetValue("No Aplica para<br>este servicio");
//DEL  			$grdTableroSLAs->$sAcronimo->SetValue("");
//DEL  			$grdTableroSLAs->$sImg->SetValue("images/blank_SLA.png");
//DEL  		}
//DEL  	}
//DEL  	$db->close();
//DEL  // -------------------------

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

//Page_OnInitializeView @1-72E85547
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $TableroSLAs; //Compatibility
//End Page_OnInitializeView

//Custom Code @205-2A29BDB7
// -------------------------
	
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
