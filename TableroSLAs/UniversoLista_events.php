<?php
//BindEvents Method @1-4E9D4841
function BindEvents()
{
    global $universo_cds;
    global $grdUniverso;
    global $mc_universo_cds;
    global $CCSEvents;
    $universo_cds->ds->CCSEvents["BeforeExecuteInsert"] = "universo_cds_ds_BeforeExecuteInsert";
    $universo_cds->ds->CCSEvents["AfterExecuteInsert"] = "universo_cds_ds_AfterExecuteInsert";
    $universo_cds->CCSEvents["BeforeDelete"] = "universo_cds_BeforeDelete";
    $universo_cds->CCSEvents["OnValidate"] = "universo_cds_OnValidate";
    $universo_cds->CCSEvents["BeforeShow"] = "universo_cds_BeforeShow";
    $universo_cds->CCSEvents["BeforeSelect"] = "universo_cds_BeforeSelect";
    $universo_cds->ds->CCSEvents["AfterExecuteUpdate"] = "universo_cds_ds_AfterExecuteUpdate";
    $grdUniverso->CCSEvents["BeforeShowRow"] = "grdUniverso_BeforeShowRow";
    $mc_universo_cds->CCSEvents["BeforeShow"] = "mc_universo_cds_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//universo_cds_ds_BeforeExecuteInsert @31-FC57A502
function universo_cds_ds_BeforeExecuteInsert(& $sender)
{
    $universo_cds_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $universo_cds; //Compatibility
//End universo_cds_ds_BeforeExecuteInsert

//Custom Code @120-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close universo_cds_ds_BeforeExecuteInsert @31-1AA38932
    return $universo_cds_ds_BeforeExecuteInsert;
}
//End Close universo_cds_ds_BeforeExecuteInsert

//universo_cds_ds_AfterExecuteInsert @31-DF5B438C
function universo_cds_ds_AfterExecuteInsert(& $sender)
{
    $universo_cds_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $universo_cds; //Compatibility
//End universo_cds_ds_AfterExecuteInsert

//Custom Code @121-2A29BDB7
// -------------------------
    // se carga la información adicional si es que es un incidente
    
// -------------------------
//End Custom Code

//Close universo_cds_ds_AfterExecuteInsert @31-2C60E1C8
    return $universo_cds_ds_AfterExecuteInsert;
}
//End Close universo_cds_ds_AfterExecuteInsert

//universo_cds_BeforeDelete @31-84A2F6D0
function universo_cds_BeforeDelete(& $sender)
{
    $universo_cds_BeforeDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $universo_cds; //Compatibility
//End universo_cds_BeforeDelete

//Custom Code @129-2A29BDB7
// -------------------------
    //antes de quitar un registro del universo, borra los datos de las tablas de medicion
    $sSQL="Insert into mc_borrados_log (Datos, UsuarioBorro, FechaBorro) values (" .  $universo_cds->tipo->GetValue() . " - " . $universo_cds->numero->GetValue() . ",'" . CCGetUserLogin() . "',GETDATE())";
    $db = new clsDBCnDisenio;
    $db->query($sSQL);
// -------------------------
//End Custom Code

//Close universo_cds_BeforeDelete @31-259A7C5D
    return $universo_cds_BeforeDelete;
}
//End Close universo_cds_BeforeDelete

//universo_cds_OnValidate @31-F75592E4
function universo_cds_OnValidate(& $sender)
{
    $universo_cds_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $universo_cds; //Compatibility
//End universo_cds_OnValidate

//Custom Code @136-2A29BDB7
// -------------------------
    // valida los datos del Req Técnico.
    // Solo aplican para azartia y si es Req. Tecnico no puede a su vez estar relacionado a un Req Tecnico.
    //if($universo_cds->chkEsReqTeq->GetValue()==1 && $universo_cds->ReqTecnico->GetValue() !=""){
    //	$universo_cds->Errors->addError('El registro no puede ser un Requerimiento Técnico y al mismo tiempo estar relacionado a un Re. Técnico.');
    //}
    
    if($universo_cds->id_proveedor->GetValue() != 3 && ($universo_cds->chkEsReqTeq->GetValue() !="" || $universo_cds->ReqTecnico->GetValue()!="" )){
    	$universo_cds->Errors->addError('El Requerimiento Técnico solo aplica para el CDS 2 (Azertia)');
    }
    
// -------------------------
//End Custom Code

//Close universo_cds_OnValidate @31-74F87B74
    return $universo_cds_OnValidate;
}
//End Close universo_cds_OnValidate

//universo_cds_BeforeShow @31-411D7F80
function universo_cds_BeforeShow(& $sender)
{
    $universo_cds_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $universo_cds; //Compatibility
//End universo_cds_BeforeShow

//Custom Code @170-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close universo_cds_BeforeShow @31-4B031FFD
    return $universo_cds_BeforeShow;
}
//End Close universo_cds_BeforeShow

//universo_cds_BeforeSelect @31-1AF4A1D9
function universo_cds_BeforeSelect(& $sender)
{
    $universo_cds_BeforeSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $universo_cds; //Compatibility
//End universo_cds_BeforeSelect

//Custom Code @171-2A29BDB7
// -------------------------
    //si ya esta cerrada la medición no lo puede modificar
    
// -------------------------
//End Custom Code

//Close universo_cds_BeforeSelect @31-83CEE20E
    return $universo_cds_BeforeSelect;
}
//End Close universo_cds_BeforeSelect

//universo_cds_ds_AfterExecuteUpdate @31-D481D990
function universo_cds_ds_AfterExecuteUpdate(& $sender)
{
    $universo_cds_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $universo_cds; //Compatibility
//End universo_cds_ds_AfterExecuteUpdate

//Custom Code @178-2A29BDB7
// -------------------------
    // verifica si existe el registro medido, si es así actualiza el mes en la tabla de la medición
    
    global $db;
    $db= new clsDBcnDisenio;
    if($universo_cds->tipo->GetValue()=='IN'){
    	$db->query("select * from mc_calificacion_incidentes_mc where id_incidente='" . $universo_cds->numero->GetValue() . "'");
    	if($db->has_next_record()){
    		$db->query("Update mc_calificacion_incidentes_mc set mesreporte=" . $universo_cds->mes->GetValue() . "where id_incidente=" . $universo_cds->numero->GetValue() );
    		}
    } else {
    	$db->query("select * from mc_calificacion_rs_mc where iduniverso=" . CCGetParam("id") );
    	if($db->has_next_record()){
    		$db->query("Update mc_calificacion_rs_mc set mesreporte=" . $universo_cds->mes->GetValue() . "where iduniverso=" . CCGetParam("id") );
    		}
    }
    
// -------------------------
//End Custom Code

//Close universo_cds_ds_AfterExecuteUpdate @31-E3492047
    return $universo_cds_ds_AfterExecuteUpdate;
}
//End Close universo_cds_ds_AfterExecuteUpdate

//grdUniverso_BeforeShowRow @2-3A11DCF0
function grdUniverso_BeforeShowRow(& $sender)
{
    $grdUniverso_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdUniverso; //Compatibility
//End grdUniverso_BeforeShowRow

//Custom Code @114-2A29BDB7
// -------------------------
    global $PathToRoot;
    
    if(CCGetSession("GrupoValoracion","")=="SAT"){
    	$grdUniverso->Link1->Visible=false;
    	}
    $grdUniverso->lbSLO_RT->SetValue("");
    if($grdUniverso->DataSource->f("slo")==1){
    	$grdUniverso->lbSLO_RT->SetValue("SLO");
    } 
	
    if($grdUniverso->DataSource->f("EsReqTecnico")==1){
    	$grdUniverso->lbSLO_RT->SetValue($grdUniverso->lbSLO_RT->GetValue() . "MM-RT");
    }
    
    if($grdUniverso->descartar_manual->GetValue()==1){
    	$grdUniverso->descartar_manual->SetValue("No Reportar");
    }

    //si ya fue medido cambia el vínculo al detalle de la medición
    if($grdUniverso->DataSource->f("medido")==1){
    	$sTipo = $grdUniverso->DataSource->f("tipo");
    	switch($sTipo) {
    		case "IN":
    			$grdUniverso->hnumero->Page="IncidentesLista.php";
    			$grdUniverso->hnumero->Parameters = CCGetQueryString("QueryString", array("s_Numero","s_id_proveedor","s_mes","s_anio","s_tipo")); 
  				$grdUniverso->hnumero->Parameters = CCAddParam($grdUniverso->hnumero->Parameters,"s_anio_param", $grdUniverso->anio->Getvalue());
  				$grdUniverso->hnumero->Parameters = CCAddParam($grdUniverso->hnumero->Parameters,"s_mes_param", "0");  
  				$grdUniverso->hnumero->Parameters = CCAddParam($grdUniverso->hnumero->Parameters,"s_Id_incidente_param", $grdUniverso->hnumero->Getvalue());    
    			break;
    		case "PA":
    			$grdUniverso->hnumero->Page="PPMCsApbLista.php";
    			$grdUniverso->hnumero->Parameters = CCGetQueryString("QueryString", array("s_Numero","s_id_proveedor","s_mes","s_anio","s_tipo","s_numero","s_Id_incidente_param")); 
  				$grdUniverso->hnumero->Parameters = CCAddParam($grdUniverso->hnumero->Parameters,"s_anio_param", $grdUniverso->anio->Getvalue());
  				$grdUniverso->hnumero->Parameters = CCAddParam($grdUniverso->hnumero->Parameters,"s_mesparam", "0");  
  				$grdUniverso->hnumero->Parameters = CCAddParam($grdUniverso->hnumero->Parameters,"s_numero", $grdUniverso->hnumero->Getvalue());    
    			break;
    		case "PC":
    			$grdUniverso->hnumero->Page="PPMCsCrbLista.php";
    			$grdUniverso->hnumero->Parameters = CCGetQueryString("QueryString", array("s_Numero","s_id_proveedor","s_mes","s_anio","s_tipo","s_Id_incidente_param")); 
  				$grdUniverso->hnumero->Parameters = CCAddParam($grdUniverso->hnumero->Parameters,"s_anio_param", $grdUniverso->anio->Getvalue());
  				$grdUniverso->hnumero->Parameters = CCAddParam($grdUniverso->hnumero->Parameters,"s_mesparam", "0");  
  				$grdUniverso->hnumero->Parameters = CCAddParam($grdUniverso->hnumero->Parameters,"s_numero", $grdUniverso->hnumero->Getvalue());    
    			break;
    		}
    } else {
    	$grdUniverso->hnumero->Page="UniversoLista.php";
		$grdUniverso->hnumero->Parameters = CCGetQueryString("QueryString", array("s_Id_incidente_param","s_id_proveedor","s_numero")); 
		$grdUniverso->hnumero->Parameters = CCAddParam($grdUniverso->hnumero->Parameters,"id", $grdUniverso->DataSource->f("id"));
	}
    //numero
    
// -------------------------
//End Custom Code

//Close grdUniverso_BeforeShowRow @2-3D4F5F05
    return $grdUniverso_BeforeShowRow;
}
//End Close grdUniverso_BeforeShowRow

//mc_universo_cds_BeforeShow @147-6DEBD989
function mc_universo_cds_BeforeShow(& $sender)
{
    $mc_universo_cds_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_universo_cds; //Compatibility
//End mc_universo_cds_BeforeShow

//Custom Code @191-2A29BDB7
// -------------------------
// -------------------------
//End Custom Code

//Close mc_universo_cds_BeforeShow @147-BFD1472F
    return $mc_universo_cds_BeforeShow;
}
//End Close mc_universo_cds_BeforeShow

//Page_BeforeShow @1-F2A2E9FD
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $UniversoLista; //Compatibility
//End Page_BeforeShow

//Custom Code @42-2A29BDB7
// -------------------------
 	global $mc_universo_cds;

 	//si no es CAPC no puede editar el universo
 	if(CCGetSession("GrupoValoracion","")!="CAPC"){
		global $universo_cds ;
		global $Panel2;
		global $grdFiltra;
		//$universo_cds->DeleteAllowed =false;
		//$universo_cds->InsertAllowed =false;
		//$universo_cds->UpdateAllowed  =false;
		$Panel2->Visible = false;
		$grdFiltra->Visible=false;
		$mc_universo_cds->Visible=false;
		//$universo_cds->Visible=false;
 	}
 	
 	global $db;
 	global $universo_cds;
    $db= new clsDBcnDisenio;
    $db->Query("select medido from mc_universo_cds where id=" . CCGetParam("id",0));
    if($db->next_record()){
	    if($db->f("medido")==1){
	    	$mc_universo_cds->Visible=true;
	    	$universo_cds->UpdateAllowed= false;
	    	$universo_cds->DeleteAllowed = false;
	    	$universo_cds->InsertAllowed = false;
	    } else {
	    	$mc_universo_cds->Visible=false;
	    }
    }
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
