<?php
//BindEvents Method @1-05DE5171
function BindEvents()
{
    global $mc_calificacion_capc;
    global $CCSEvents;
    $mc_calificacion_capc->FechaFirmaCAES->CCSEvents["BeforeShow"] = "mc_calificacion_capc_FechaFirmaCAES_BeforeShow";
    $mc_calificacion_capc->CCSEvents["BeforeShow"] = "mc_calificacion_capc_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_calificacion_capc_FechaFirmaCAES_BeforeShow @59-33870576
function mc_calificacion_capc_FechaFirmaCAES_BeforeShow(& $sender)
{
    $mc_calificacion_capc_FechaFirmaCAES_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_capc; //Compatibility
//End mc_calificacion_capc_FechaFirmaCAES_BeforeShow

//Close mc_calificacion_capc_FechaFirmaCAES_BeforeShow @59-D780BEBB
    return $mc_calificacion_capc_FechaFirmaCAES_BeforeShow;
}
//End Close mc_calificacion_capc_FechaFirmaCAES_BeforeShow

//mc_calificacion_capc_BeforeShow @3-5FF7ECB3
function mc_calificacion_capc_BeforeShow(& $sender)
{
    $mc_calificacion_capc_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_capc; //Compatibility
//End mc_calificacion_capc_BeforeShow

//Custom Code @78-2A29BDB7
// -------------------------
     global $db;
     $db= new clsDBcnDisenio;
     $sSQL="select top 1 * from  ( " .
		"SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo " .
		"	FROM PPMC_RO_AS  " .
		"UNION ALL " .
		"SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo " .
		"	FROM PPMC_PROYECTOS_AS  " .
		"UNION ALL " .
		"SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo " .
		"	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC  " .
		"UNION ALL " .
		"SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo " .
		"	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO   " .
		" ) as DatosPPMC " .
	"WHERE id_ppmc LIKE '%" . CCGetParam("s_numero") . "%'";
     //on DatosPPMC.ID_PPMC = numero 	and mc_calificacion_capc.mes = month(FECHA_CARGA) and mc_calificacion_capc.anio = YEAR(FECHA_CARGA)  " .
     $db->query($sSQL);
	if($db->next_record()){
		$mc_calificacion_capc->Descripcion->SetValue($db->f("NAME"));
	}
// -------------------------
//End Custom Code

//Close mc_calificacion_capc_BeforeShow @3-4A8DC635
    return $mc_calificacion_capc_BeforeShow;
}
//End Close mc_calificacion_capc_BeforeShow

//Page_BeforeShow @1-1443ABB5
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SLAsCAPCDetalle; //Compatibility
//End Page_BeforeShow

//Custom Code @77-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
