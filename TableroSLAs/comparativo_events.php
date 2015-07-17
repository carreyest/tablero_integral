<?php
//BindEvents Method @1-EB338965
function BindEvents()
{
    global $l_calificacion_incidentes1;
    global $Grid1;
    global $CCSEvents;
    $l_calificacion_incidentes1->s_id_periodo->ds->CCSEvents["BeforeExecuteSelect"] = "l_calificacion_incidentes1_s_id_periodo_ds_BeforeExecuteSelect";
    $Grid1->CCSEvents["BeforeShowRow"] = "Grid1_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//l_calificacion_incidentes1_s_id_periodo_ds_BeforeExecuteSelect @355-6E33379B
function l_calificacion_incidentes1_s_id_periodo_ds_BeforeExecuteSelect(& $sender)
{
    $l_calificacion_incidentes1_s_id_periodo_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $l_calificacion_incidentes1; //Compatibility
//End l_calificacion_incidentes1_s_id_periodo_ds_BeforeExecuteSelect

//Custom Code @520-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close l_calificacion_incidentes1_s_id_periodo_ds_BeforeExecuteSelect @355-88E61CAC
    return $l_calificacion_incidentes1_s_id_periodo_ds_BeforeExecuteSelect;
}
//End Close l_calificacion_incidentes1_s_id_periodo_ds_BeforeExecuteSelect

//Grid1_BeforeShowRow @2-FCC1FF76
function Grid1_BeforeShowRow(& $sender)
{
    $Grid1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
//End Grid1_BeforeShowRow
	global $l_calificacion_incidentes1;
	global $s_id_proveedor;
	global $s_id_periodo;
	global $anio_reporte;
	global $mes_reporte;
	global $opt_slas;
	global $conx_xls;
	global $n_opt_slas;
    	$conx_xls= new clsDBcon_xls();
    
	 $s_id_proveedor= CCGetParam("s_id_proveedor"); //$l_calificacion_incidentes1->$s_id_proveedor.GetValue();
	 $s_id_periodo=CCGetParam("s_id_periodo"); //$l_calificacion_incidentes1->$s_id_periodo.GetValue();
	 $opt_slas= CCGetParam("s_opt_slas"); //$l_calificacion_incidentes1->$s_id_proveedor.GetValue();
	if ($opt_slas=='SLA')
		$n_opt_slas=0;
	else
		$n_opt_slas=1;
		
	$anio_reporte =CCDLookUp("anio","periodos_carga","id_periodo=".$conx_xls->ToSQL($s_id_periodo, ccsInteger),   $conx_xls);
   	$mes_reporte =CCDLookUp("mes","periodos_carga","id_periodo=".$conx_xls->ToSQL($s_id_periodo, ccsInteger),   $conx_xls);
 
 
  if($s_id_proveedor>0 &&  $s_id_periodo>0 && $opt_slas!="") {
  	
//Custom Code @69-2A29BDB7
	global $db;
	global $lColorCelda;
	$db= new clsDBcon_xls();
	
	global $db2;
	$db2= new clsDBcon_xls();
	
	/*
	para que este código funcione es necesario que el nombre de los controles cumpla con lo esperado en el código
	un prefijo seguido del acronimo del SLA 
	*/
	//echo "antes de ";
	$consTableroCAPC="select  sc.descripcion, 
	 sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end) totherr_est_cost, 
		sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end) cumplenherr_est_cost,  		
		case when sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end)>0 then 
			sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end)/cast(sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end) as float)*100 
		else 0 end herr_est_cost, 		
	 (select meta from [TableroMyM_SDMA4].[dbo].mc_c_metrica where acronimo='herr_est_cost') as meta_herr_est_cost,   
	 sum(case when req_serv='1' or req_serv='0' then 1 else 0 end) totreq_serv, 
		sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end) cumplenreq_serv, 
		case when sum(case when req_serv='1' or req_serv='0' then 1 else 0 end)>0 then 
			sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end)/cast(sum(case when req_serv='1' or req_serv='0' then 1 else 0 end) as float)*100 
		else 0 end req_serv,
	 (select meta from [TableroMyM_SDMA4].[dbo].mc_c_metrica where acronimo='req_serv') as meta_req_serv,	 
	 
   sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end) totcumpl_req_func, 
		sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as float) else 0 end) cumplencumpl_req_func, 
		case when sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end)>0 then 
			sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as float) else 0 end)/cast(sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end) as float)*100 
		else 0 end cumpl_req_func ,
	 (select meta from [TableroMyM_SDMA4].[dbo].mc_c_metrica where acronimo='cumpl_req_func') as meta_cumpl_req_func,
	 
   sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end) totcalidad_prod_term, 
		sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end) cumplencalidad_prod_term, 
		case when sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end)>0 then 
			sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end)/cast(sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end) as float)*100 
		else 0 end calidad_prod_term,
	 (select meta from [TableroMyM_SDMA4].[dbo].mc_c_metrica where acronimo='calidad_prod_term') as meta_calidad_prod_term,
	 
   
	 sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end) totretr_entregable, 
		sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end) cumplenretr_entregable, 
		case when sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end)>0 then 
			sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end)/cast(sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end) as float)*100 
		else 0 end retr_entregable,
	 (select meta from [TableroMyM_SDMA4].[dbo].mc_c_metrica where acronimo='retr_entregable') as meta_retr_entregable,
	
	
	 sum(case when CAL_COD='1' or CAL_COD='0' then 1 else 0 end) totcal_cod, 
		sum(case when isnumeric(CAL_COD)=1 then cast(CAL_COD  as int) else 0 end) cumplencal_cod, 
		case when sum(case when CAL_COD='1' or CAL_COD='0' then 1 else 0 end)>0 then 
			sum(case when isnumeric(CAL_COD)=1 then cast(CAL_COD  as int) else 0 end)/cast(sum(case when CAL_COD='1' or CAL_COD='0' then 1 else 0 end) as float)*100 
		else 0 end cal_cod,
	 (select meta from [TableroMyM_SDMA4].[dbo].mc_c_metrica where acronimo='cal_cod') as meta_cal_cod,
   
   
	 sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end) totdef_fug_amb_prod, 
		sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end) cumplendef_fug_amb_prod, 
		case when sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end)>0 then 
			sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end)/cast(sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end) as float)*100  
		else 0 end def_fug_amb_prod,
	 (select meta from [TableroMyM_SDMA4].[dbo].mc_c_metrica where acronimo='def_fug_amb_prod') as meta_def_fug_amb_prod,
   
   
count(cumple_inc_tiempoasignacion) totinc_tiempoasignacion, 
		sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end) cumpleninc_tiempoasignacion, 
		case when sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end)>0 then 
			sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end)/cast(sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end) as float)*100 
		else 0 end inc_tiempoasignacion,
	 (select meta from [TableroMyM_SDMA4].[dbo].mc_c_metrica where acronimo='inc_tiempoasignacion') as meta_inc_tiempoasignacion,
   
	 count(cumple_inc_tiemposolucion) totinc_tiemposolucion, 
		sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end) cumpleninc_tiemposolucion, 
		case when sum(case when cumple_inc_tiempoSolucion='1' or cumple_inc_tiempoSolucion='0' then 1 else 0 end)>0 then 
			sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end)/cast(sum(case when cumple_inc_tiempoSolucion='1' or cumple_inc_tiempoSolucion='0' then 1 else 0 end) as float)*100 
		else 0 end inc_tiemposolucion,
	 (select meta from [TableroMyM_SDMA4].[dbo].mc_c_metrica where acronimo='inc_tiemposolucion') as meta_inc_tiemposolucion,
   
	 	 AVG(Cumple_EF) cumplen_efic_presup, AVG(total_ef) tot_efic_presup, avg(cast(Cumple_EF as float))/avg(total_ef)*100  efic_presup,
	 (Select Meta from [TableroMyM_SDMA4].[dbo].mc_c_metrica where acronimo='EFIC_PRESUP') as meta_efic_presup	 
from [TableroMyM_SDMA4].[dbo].mc_c_ServContractual sc 
left join (  select distinct m.*  FROM [TableroMyM_SDMA4].[dbo].[mc_calificacion_rs_MC] m,
   [TableroMyM_SDMA4].[dbo].[mc_universo_cds] u
   where u.numero=m.id_ppmc and SLO=$n_opt_slas and m.AnioReporte=u.anio and m.MesReporte=u.mes
   and m.AnioReporte=$anio_reporte and m.MesReporte=$mes_reporte  and m.id_proveedor = $s_id_proveedor and tipo<>'IN'
	) m on sc.Id  = m.id_servicio_cont
	 left join	(select Cumple_Inc_TiempoAsignacion, Cumple_Inc_TiempoSolucion, 
				id_proveedor, 'Servicio de Soporte de Aplicaciones'  servicio_cont
				from [TableroMyM_SDMA4].[dbo].mc_calificacion_incidentes_MC
				where  (MesReporte=$mes_reporte and AnioReporte=$anio_reporte  and id_proveedor = $s_id_proveedor
			) ) mi on  mi.servicio_cont = sc.Descripcion 
	left join (select SUM(case when EficienciaPresupuestal='1' or EficienciaPresupuestal='0' then 1 else 0 end) Cumple_EF, COUNT(EficienciaPresupuestal) Total_EF, Id_Proveedor,  2 IdServicioCont  
			from [TableroMyM_SDMA4].[dbo].mc_eficiencia_presupuestal 
			where  (anioreporte=$anio_reporte and MesReporte=$mes_reporte and id_proveedor = $s_id_proveedor 
			) group by id_proveedor ) ef on ef.IdServicioCont = sc.id
where sc.Aplica ='CDS' and IdOld <>0 and sc.descripcion='".$Grid1->DataSource->f(0)."' 
group by sc.Descripcion ";
$db2->query($consTableroCAPC);
//echo "<hr>".$consTableroCAPC;

if($db2->next_record())
	$si_hay_reg=1;
else
	$si_hay_reg=0;

//echo  "<hr>si_hay_reg ".$si_hay_reg;	
	$db->query("SELECT lower(Acronimo)  FROM mc_c_metrica where id_ver_metrica<12 ");
	while($db->next_record()){
		//var_dump ($db);
		//die();
		$sAcronimo= $db->f(0);
		$sImg= "img" . $db->f(0); //se asocia la imagen al acronimo
		$sCumplen = "cumplen" . $sAcronimo;
		$sTotal = "tot"  . $sAcronimo;
		$sMeta = "meta_" . $sAcronimo;
		$Grid1->$sCumplen->Visible=false;
		$Grid1->$sTotal->Visible=false;
		///
		//$db2->next_record();
		$sAcronimo1= $db->f(0)."1";
		$sImg1= "img" . $db->f(0)."1"; //se asocia la imagen al acronimo
		$sCumplen1 = "cumplen" . $sAcronimo."1";
		$sTotal1 = "tot"  . $sAcronimo."1";
		$sMeta1 = "meta_" . $sAcronimo."1";
		$Grid1->$sCumplen1->Visible=false;
		$Grid1->$sTotal1->Visible=false;
		///
		//echo "acr $sAcronimo <br> ";
		//if($db->f(0)==1){//si el campo activo del SLA para el servicio es 1, se pintan los semáforos, de lo contrario no aplica el SLA para el servicio
			$Grid1->$sImg->SetValue("images/blank_SLA.png");
			$Grid1->$sImg1->SetValue("images/blank_SLA.png");
			if (isset($Grid1->$sImg)){
				if($Grid1->DataSource->f($sTotal) != "0" && $Grid1->DataSource->f($sTotal)!=""){
					$Grid1->$sAcronimo->SetValue($Grid1->$sCumplen->GetValue() . "/" . $Grid1->$sTotal->GetValue() . " = " . round($Grid1->$sAcronimo->GetValue(),2) . "%");
					if($Grid1->DataSource->f($db->f(0))<$Grid1->DataSource->f($sMeta)){
						$Grid1->$sImg->SetValue("images/down.png");
					} else {
						$Grid1->$sImg->SetValue("images/up.png");
					}
				} else {
					$Grid1->$sImg->SetValue("images/left.png");
					$Grid1->$sAcronimo->SetValue("Sin Datos<br>para Medir");
				}
			}
		 //////
		 if (isset($Grid1->$sImg1)){
		 		//var_dump($sTotal);
				if($db2->f($sTotal) != "0" && $db2->f($sTotal)!=""){
					$Grid1->$sAcronimo1->SetValue($db2->f($sCumplen) . "/" . $db2->f($sTotal) . " = " . round($db2->f($sAcronimo),2) . "%");
					if($db2->f($sAcronimo)<$db2->f($sMeta)){
						$Grid1->$sImg1->SetValue("images/down.png");
					} else {
						$Grid1->$sImg1->SetValue("images/up.png");
					}
				} else {
					$Grid1->$sImg1->SetValue("images/left.png");
					$Grid1->$sAcronimo1->SetValue("Sin Datos<br>para Medir");
					//$Grid1->$sAcronimo1->SetValue($Grid1->DataSource->f(0)); 
				}
			}
		 /*
		 if (isset($Grid1->$sImg1)){
				if($db2->f($sTotal) != "0" && $db2->f($sTotal)!=""){
					$Grid1->$sAcronimo1->SetValue($db2->f($sCumplen) . "/" . $db2->f($sTotal) . " = " . round($db2->f($sAcronimo),2) . "%");
					if($db2->f($db2->f($sAcronimo)) <$db2->f($sMeta)){
						$Grid1->$sImg1->SetValue("images/down.png");
					} else {
						$Grid1->$sImg1->SetValue("images/up.png");
					}
				} else {
					$Grid1->$sImg1->SetValue("images/left.png");
					$Grid1->$sAcronimo1->SetValue("Sin Datos<br>para Medir");
					//$Grid1->$sAcronimo1->SetValue("hay_reg , ".$si_hay_reg);
				}
			}
		 
		 */
		 
		 
		 /////
	}

	$db->close();
	//die();
  	}	
//End Custom Code

//Close Grid1_BeforeShowRow @2-23E47D26
    return $Grid1_BeforeShowRow;
}
//End Close Grid1_BeforeShowRow

//Page_BeforeShow @1-5E3CCD92
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $comparativo; //Compatibility
//End Page_BeforeShow

//Custom Code @469-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
