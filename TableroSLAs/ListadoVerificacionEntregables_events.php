<?php
//BindEvents Method @1-6501BB6B
function BindEvents()
{
    global $Buscar;
    global $GridEntregables;
    global $GenList;
    $Buscar->CCSEvents["OnValidate"] = "Buscar_OnValidate";
    $GridEntregables->ds->CCSEvents["BeforeExecuteSelect"] = "GridEntregables_ds_BeforeExecuteSelect";
    $GenList->CCSEvents["OnValidate"] = "GenList_OnValidate";
}
//End BindEvents Method

//Buscar_OnValidate @21-8BB9751A
function Buscar_OnValidate(& $sender)
{
    $Buscar_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Buscar; //Compatibility
//End Buscar_OnValidate

//Custom Code @129-2A29BDB7
// -------------------------
    $VMes=  $Buscar->MesReporte->GetValue();
    $VAnio=  $Buscar->anioreporte->GetValue() ;
    $VProveedor= $Buscar->busqproveedor->GetValue() ;
    if($VMes == "" || $VAnio == "" || $VProveedor == ""  ){ //Ya existe el mes
			$Buscar->Errors->addError('Parametros incompletos');
	}
// -------------------------
//End Custom Code

//Close Buscar_OnValidate @21-38B09BA9
    return $Buscar_OnValidate;
}
//End Close Buscar_OnValidate

//GridEntregables_ds_BeforeExecuteSelect @93-59EC50FC
function GridEntregables_ds_BeforeExecuteSelect(& $sender)
{
    $GridEntregables_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GridEntregables; //Compatibility
//End GridEntregables_ds_BeforeExecuteSelect

//Custom Code @118-2A29BDB7
// -------------------------
	 //$condicion =  (CCGetParam("MesReporte")!='' && CCGetParam("anioreporte")!='' && CCGetParam("busqproveedor")!='') ? " WHERE e.mes_corte = ".CCGetParam("MesReporte")." and e.anio_corte = ".CCGetParam("anioreporte")." AND e.id_proveedor = ".CCGetParam("busqproveedor")  : "WHERE e.mes_corte = (select max(mes_corte) from entregables_periodicos_smda4 ) and e.anio_corte = (select max(anio_corte) from entregables_periodicos_smda4 )" ." AND e.id_proveedor = 1";
/*	 $condicion =  (CCGetParam("MesReporte")!='' && CCGetParam("anioreporte")!='' && CCGetParam("busqproveedor")!='') ? " WHERE e.mes_corte = ".CCGetParam("MesReporte")." and e.anio_corte = ".CCGetParam("anioreporte")." AND e.id_proveedor = ".CCGetParam("busqproveedor")  : "WHERE 1 <> 1";  
    
   	 $GridEntregables->DataSource->SQL = "SELECT e.id_registro, c.id_entregable, c.entregable, c.periodicidad, p.nombre proveedor, e.entregado, e.comentarios, m.mes, e.anio_corte 
FROM entregables_periodicos_smda4 e
LEFT JOIN mc_c_entregables_periodicos c ON e.id_entregable=c.id_entregable
LEFT JOIN mc_c_mes m ON m.IdMes = e.mes_corte
LEFT JOIN mc_c_proveedor p ON p.id_proveedor = e.id_proveedor  ". $condicion;
*/	  	     
    // Write your own code here.
// -------------------------
//End Custom Code

//Close GridEntregables_ds_BeforeExecuteSelect @93-B309ABA8
    return $GridEntregables_ds_BeforeExecuteSelect;
}
//End Close GridEntregables_ds_BeforeExecuteSelect

//GenList_OnValidate @44-E789AC32
function GenList_OnValidate(& $sender)
{
    $GenList_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GenList; //Compatibility
//End GenList_OnValidate

//Custom Code @119-2A29BDB7
// -------------------------
    $VMes=  $GenList->MesGenCorte->GetValue();
    $VAnio=  $GenList->AnioGenCorte->GetValue() ;
    $VProveedor= $GenList->Genproveedor->GetValue() ;
    if($VMes == "" || $VAnio == "" || $VProveedor == ""  ){ //Ya existe el mes
			$GenList->Errors->addError('Parametros incompletos');
	}
    //Verificando la existencia del mes , a�o y proveedor 
	$sSQL='SELECT count(*) FROM entregables_periodicos_smda4  WHERE ' .
		' anio_corte = ' . $VAnio . 
		' and mes_corte = ' . $VMes .
		' and id_proveedor = ' . $VProveedor;
		
	$db = new clsDBCnDisenio;
	$db->query($sSQL);
	$db->next_record();
	if($db->f(0) > 0 ){ //Ya existe el mes
			$GenList->Errors->addError('Ya esta cargado el mes indicado');
	} 
    // Write your own code here.
// -------------------------
//End Custom Code

//Close GenList_OnValidate @44-31D5EFA4
    return $GenList_OnValidate;
}
//End Close GenList_OnValidate
// -------------------------
// Write your own code here.
// -------------------------

?>