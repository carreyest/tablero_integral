<?php
//BindEvents Method @1-39089411
function BindEvents()
{
    global $mc_c_proveedor_mc_eficien;
    global $mc_eficiencia_presupuesta;
    global $CCSEvents;
    $mc_c_proveedor_mc_eficien->mc_c_proveedor_mc_eficien_TotalRecords->CCSEvents["BeforeShow"] = "mc_c_proveedor_mc_eficien_mc_c_proveedor_mc_eficien_TotalRecords_BeforeShow";
    $mc_c_proveedor_mc_eficien->CCSEvents["BeforeShowRow"] = "mc_c_proveedor_mc_eficien_BeforeShowRow";
    $mc_eficiencia_presupuesta->ds->CCSEvents["AfterExecuteUpdate"] = "mc_eficiencia_presupuesta_ds_AfterExecuteUpdate";
    $mc_eficiencia_presupuesta->CCSEvents["BeforeShow"] = "mc_eficiencia_presupuesta_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_c_proveedor_mc_eficien_mc_c_proveedor_mc_eficien_TotalRecords_BeforeShow @19-CE8A6AF1
function mc_c_proveedor_mc_eficien_mc_c_proveedor_mc_eficien_TotalRecords_BeforeShow(& $sender)
{
    $mc_c_proveedor_mc_eficien_mc_c_proveedor_mc_eficien_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_proveedor_mc_eficien; //Compatibility
//End mc_c_proveedor_mc_eficien_mc_c_proveedor_mc_eficien_TotalRecords_BeforeShow

//Retrieve number of records @20-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close mc_c_proveedor_mc_eficien_mc_c_proveedor_mc_eficien_TotalRecords_BeforeShow @19-2EB55C45
    return $mc_c_proveedor_mc_eficien_mc_c_proveedor_mc_eficien_TotalRecords_BeforeShow;
}
//End Close mc_c_proveedor_mc_eficien_mc_c_proveedor_mc_eficien_TotalRecords_BeforeShow

//mc_c_proveedor_mc_eficien_BeforeShowRow @3-FF6B795D
function mc_c_proveedor_mc_eficien_BeforeShowRow(& $sender)
{
    $mc_c_proveedor_mc_eficien_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_proveedor_mc_eficien; //Compatibility
//End mc_c_proveedor_mc_eficien_BeforeShowRow

//Custom Code @119-2A29BDB7
// -------------------------
    switch($mc_c_proveedor_mc_eficien->CumpleSLA->GetValue()){
		case 0:
			$mc_c_proveedor_mc_eficien->imgCumpleSLA->SetValue("images/NoCumple.png");
			break;
		case 1:
			$mc_c_proveedor_mc_eficien->imgCumpleSLA->SetValue("images/Cumple.png");
			break;
		case 3: 
			$mc_c_proveedor_mc_eficien->imgCumpleSLA->SetValue("");
			break;
	}
// -------------------------
//End Custom Code

//Close mc_c_proveedor_mc_eficien_BeforeShowRow @3-13A483EA
    return $mc_c_proveedor_mc_eficien_BeforeShowRow;
}
//End Close mc_c_proveedor_mc_eficien_BeforeShowRow

//mc_eficiencia_presupuesta_ds_AfterExecuteUpdate @54-C6DE26EF
function mc_eficiencia_presupuesta_ds_AfterExecuteUpdate(& $sender)
{
    $mc_eficiencia_presupuesta_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_eficiencia_presupuesta; //Compatibility
//End mc_eficiencia_presupuesta_ds_AfterExecuteUpdate

//Custom Code @108-2A29BDB7
// -------------------------
    // va por el mes y año del CFM Actualizado
    $db=new clsDBcnDisenio();
    $db1=new clsDBcnDisenio();
    $db->Query('select id_proveedor, MesReporte, anioreporte  from mc_eficiencia_presupuestal ' .
    	' where id = '. CCGetParam("Id",0));
    if($db->has_next_record()){
    	$db->next_record();
        if($db->f(0)!=4){
        	$db1->Query('update mc_eficiencia_presupuestal set CFMActual =( ' .
            	 'select sum(CFMActual) from mc_eficiencia_presupuestal ' .
             	' where MesReporte = ' . $db->f(1) . ' and anioreporte =' . $db->f(2) . ' and Id_Proveedor =  ' . $db->f(0) .
             	' and GrupoAplicativos not like \'Todo%\' group by id_proveedor, mesreporte, anioreporte ' .
             	' ) where MesReporte = ' . $db->f(1) . ' and anioreporte =' . $db->f(2) . ' and Id_Proveedor = ' . $db->f(0) . ' and GrupoAplicativos like \'Todo%\'');

    		$db1->Query('update mc_eficiencia_presupuestal set EficienciaPresupuestal = ( ' .
    	    	' select (1-(CFMActual/CFMAnterior))*100 from mc_eficiencia_presupuestal ' .
    	    	' where MesReporte = ' . $db->f(1) . ' and anioreporte =' . $db->f(2) . ' and Id_Proveedor =  ' . $db->f(0) . 
	 			' and GrupoAplicativos like \'Todo%\'' .  
	 			' ) where MesReporte = ' . $db->f(1) . ' and anioreporte =' . $db->f(2) . ' and Id_Proveedor = ' . $db->f(0) . 
	 			' and GrupoAplicativos like \'Todo%\'');
        }
    }
    $db->close();
    $db1->close();
// -------------------------
//End Custom Code

//Close mc_eficiencia_presupuesta_ds_AfterExecuteUpdate @54-7F431F38
    return $mc_eficiencia_presupuesta_ds_AfterExecuteUpdate;
}
//End Close mc_eficiencia_presupuesta_ds_AfterExecuteUpdate

//mc_eficiencia_presupuesta_BeforeShow @54-9F816E53
function mc_eficiencia_presupuesta_BeforeShow(& $sender)
{
    $mc_eficiencia_presupuesta_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_eficiencia_presupuesta; //Compatibility
//End mc_eficiencia_presupuesta_BeforeShow

//Custom Code @117-2A29BDB7
// -------------------------
    if($mc_eficiencia_presupuesta->EditMode){
    	$db=new clsDBcnDisenio ;
    	$nProveedor = CCDLookUp("nombre", "mc_c_proveedor", "id_proveedor=" . $mc_eficiencia_presupuesta->Id_Proveedor->GetValue(), $db);
    	$mc_eficiencia_presupuesta->lProveedor->SetValue($nProveedor);
    	$mc_eficiencia_presupuesta->lGrupoAplicativos->SetValue($mc_eficiencia_presupuesta->GrupoAplicativos->GetValue());
    	$mc_eficiencia_presupuesta->lServiciosRelacionados->SetValue($mc_eficiencia_presupuesta->ServiciosRelacionados->GetValue());
    	$mc_eficiencia_presupuesta->lCFMAnterior->SetValue($mc_eficiencia_presupuesta->CFMAnterior->GetValue());
    }
// -------------------------
//End Custom Code

//Close mc_eficiencia_presupuesta_BeforeShow @54-6F842ED7
    return $mc_eficiencia_presupuesta_BeforeShow;
}
//End Close mc_eficiencia_presupuesta_BeforeShow

//Page_BeforeShow @1-5D88BD9B
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $EficienciaPresLista; //Compatibility
//End Page_BeforeShow

//Custom Code @129-2A29BDB7
// -------------------------
    global $mc_eficiencia_presupuesta1;
	$mc_eficiencia_presupuesta1->Visible=(CCGetSession("GrupoValoracion")=="CAPC");
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
