<?php
//BindEvents Method @1-33A79EAE
function BindEvents()
{
    global $mc_c_proveedor_mc_EfPresu;
    global $mc_eficiencia_presupuesta;
    $mc_c_proveedor_mc_EfPresu->mc_c_proveedor_mc_EfPresu_TotalRecords->CCSEvents["BeforeShow"] = "mc_c_proveedor_mc_EfPresu_mc_c_proveedor_mc_EfPresu_TotalRecords_BeforeShow";
    $mc_eficiencia_presupuesta->CCSEvents["BeforeInsert"] = "mc_eficiencia_presupuesta_BeforeInsert";
    $mc_eficiencia_presupuesta->CCSEvents["OnValidate"] = "mc_eficiencia_presupuesta_OnValidate";
}
//End BindEvents Method

//mc_c_proveedor_mc_EfPresu_mc_c_proveedor_mc_EfPresu_TotalRecords_BeforeShow @12-4225C2E9
function mc_c_proveedor_mc_EfPresu_mc_c_proveedor_mc_EfPresu_TotalRecords_BeforeShow(& $sender)
{
    $mc_c_proveedor_mc_EfPresu_mc_c_proveedor_mc_EfPresu_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_proveedor_mc_EfPresu; //Compatibility
//End mc_c_proveedor_mc_EfPresu_mc_c_proveedor_mc_EfPresu_TotalRecords_BeforeShow

//Retrieve number of records @13-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close mc_c_proveedor_mc_EfPresu_mc_c_proveedor_mc_EfPresu_TotalRecords_BeforeShow @12-39E463B0
    return $mc_c_proveedor_mc_EfPresu_mc_c_proveedor_mc_EfPresu_TotalRecords_BeforeShow;
}
//End Close mc_c_proveedor_mc_EfPresu_mc_c_proveedor_mc_EfPresu_TotalRecords_BeforeShow

//mc_eficiencia_presupuesta_BeforeInsert @67-2F455BF5
function mc_eficiencia_presupuesta_BeforeInsert(& $sender)
{
    $mc_eficiencia_presupuesta_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_eficiencia_presupuesta; //Compatibility
//End mc_eficiencia_presupuesta_BeforeInsert

//Custom Code @79-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_eficiencia_presupuesta_BeforeInsert @67-4822F336
    return $mc_eficiencia_presupuesta_BeforeInsert;
}
//End Close mc_eficiencia_presupuesta_BeforeInsert

//mc_eficiencia_presupuesta_OnValidate @67-3E7C0B46
function mc_eficiencia_presupuesta_OnValidate(& $sender)
{
    $mc_eficiencia_presupuesta_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_eficiencia_presupuesta; //Compatibility
//End mc_eficiencia_presupuesta_OnValidate

//Custom Code @80-2A29BDB7
// -------------------------
    $iMes=  $mc_eficiencia_presupuesta->MesReporte->GetValue();
    $iAnio=  $mc_eficiencia_presupuesta->anioreporte->GetValue() ;
    $iProveedor=  $mc_eficiencia_presupuesta->Id_Proveedor->GetValue();
    //se verifica si el mes esta cerrado para medición
	$sSQL='SELECT count(*) FROM mc_universo_cds  WHERE Medido = 1 	' .
		' and anio = ' . $iAnio . 
		' and mes = ' . $iMes .
		' and id_proveedor = ' . $iProveedor;
	$db = new clsDBCnDisenio;
	$db->query($sSQL);
	$db->next_record();
	if($db->f(0) > 0 ){ //si tiene registros marcados como cerrados
			$mc_eficiencia_presupuesta->Errors->addError('El Proveedor, para el mes y año indicado tiene registros marcados con medición cerrada, por lo que se considera que el universo esta cerrado a mediciones, no se puede actualizar la Eficiencia Presupuestal');
	} else { //si continua con el proceso va a ejecutar el custom insert que mete los nuevos costos vigentes, 
			// antes se actualizan los existentes y se borran los que sobran
		$sSQL = 'UPDATE mc_eficiencia_presupuestal  SET mc_eficiencia_presupuestal.CFMActual = eb.CFMAnterior ' .
			' FROM mc_eficiencia_presupuestal  ef INNER JOIN mc_EfPresup_base eb' .
			' ON ef.Id_Proveedor = eb.Id_Proveedor AND ef.GrupoAplicativos = eb.GrupoAplicativos ' .
			' AND ef.ServiciosRelacionados = eb.ServiciosRelacionados AND eb.Vigente =1 ' .
			' WHERE ef.MesReporte = ' . $iMes . ' AND ef.anioreporte = ' . $iAnio . ' AND ef.Id_Proveedor  = ' . $iProveedor;
		$db->query($sSQL);
	}
// -------------------------
//End Custom Code

//Close mc_eficiencia_presupuesta_OnValidate @67-507F4A5E
    return $mc_eficiencia_presupuesta_OnValidate;
}
//End Close mc_eficiencia_presupuesta_OnValidate


?>
