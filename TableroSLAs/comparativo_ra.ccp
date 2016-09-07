<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Austere4" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="periodos_carga" searchIds="3" fictitiousConnection="cnDisenio" fictitiousDataSource="periodos_carga" wizardCaption="Seleccionar Periodo" changedCaptionSearch="True" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="periodos_carga">
			<Components>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="periodos_cargaButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="5" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Integer" returnValueType="Number" name="s_id_periodo" fieldSource="id_periodo" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Periodo" caption="Id Periodo" required="False" unique="False" connection="cnDisenio" dataSource="select distinct id_periodo,  periodo+tipo_periodo as periodo
from archivosxls.dbo.periodos_hist
where (id_proveedor=0 or id_proveedor={s_id_proveedor} or {s_id_proveedor} =1)
and id_periodo &gt; 28	
and id_periodo  in (select distinct id_periodo from resumen_sat where id_proveedor={s_id_proveedor})


" boundColumn="id_periodo" textColumn="periodo" PathID="periodos_cargas_id_periodo" defaultValue="29">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters>
						<SQLParameter id="23" dataType="Text" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
					</SQLParameters>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="7" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" connection="cnDisenio" dataSource="select id_proveedor, nombre from mc_c_proveedor where descripcion!='CAPC'" boundColumn="id_proveedor" textColumn="nombre" PathID="periodos_cargas_id_proveedor" defaultValue="2">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="8" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="s_opt_slas" wizardEmptyCaption="Seleccionar Valor" PathID="periodos_cargas_opt_slas" dataSource="SLA;SLA;SLO;SLO" defaultValue="'SLA'">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<Link id="134" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="periodos_cargaLink1" hrefSource="comparativo.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Resumen','textSourceDB':'','hrefSource':'comparativo.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="177" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="periodos_cargaLink2" hrefSource="comparativo_inc.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Incidentes','textSourceDB':'','hrefSource':'comparativo_inc.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="178" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="periodos_cargaLink3" hrefSource="comparativo_ra.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Apertura','textSourceDB':'','hrefSource':'comparativo_ra.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="182" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="periodos_cargaLink4" hrefSource="comparativo_rc.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Cierre','textSourceDB':'','hrefSource':'comparativo_rc.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="135" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="Grid1" connection="cnDisenio" dataSource="select * from (

SELECT datoscapc.*,'REGISTRO CAPC' estado_comparativo from (
select * from (
select cast(u.numero as integer) id_ppmc, DatosPPMC.NAME descripcion, 
	isnull(sn.nombre,  DatosPPMC.SERVICIO_NEGOCIO ) servicio_negocio , 
	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,
	--p.nombre, 
	u.IdEstimacion id_estimacion, 
	--u.Id, 
	c.HERR_EST_COST herr_est_cost, c.REQ_SERV req_serv,
	i.FechaAsignacion fecha_asignacion, i.FechaEntregaPropuesta fecha_entrega_prop, i.FechaAceptacionPropuesta fecha_acepta_prop, i.HorasAprobadas horas_aprobadas, i.DiasPropuesta tiempo_limite_entrega_prop, 
	i.Observaciones observaciones, 
	--i.IdTipoReq, 	i.id_servicio_cont,  
	i.idpadre ppmc_padre, 
	--i.tipopadre tipo_padre, 
	--u.Analista, u.EsReqTecnico ,
	sc.Descripcion serv_contractual,
	case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio
from mc_universo_cds u left join 
	(
SELECT DISTINCT REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_RO_AS 
UNION ALL
SELECT DISTINCT ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_PROYECTOS_AS 
UNION ALL
SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo
	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC 
	and c.FECHA_CARGA = PPMC_Proyectos_AS.FECHA_CARGA 
UNION ALL
SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo
	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  
 ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) 
 and (isnull(DatosPPMC.slo,0) = u.slo or DatosPPMC.fecha_carga &gt; '2015-06-01') -- a partir de este corte ya no hay dos cargas
inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and c.iduniverso= u.id  
left join mc_info_rs_ap_ec i on i.id = u.id
left join mc_c_TipoPPMC t on t.Id = i.IdTipoReq 
left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio 
left join mc_c_ServContractual sc on sc.Id = i.id_servicio_cont
where pc.id_periodo = {s_id_periodo}
	AND u.id_proveedor ={s_id_proveedor} 
	and (tipo='PA' or tipo='AC')
) as uno	
where	tipo_nivel_servicio='{s_opt_slas}'
	
) datoscapc
INNER JOIN (
SELECT a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.herr_est_cost,a.req_serv,a.fecha_asignacion,a.fecha_entrega_prop,a.fecha_acepta_prop,a.horas_aprobadas,a.tiempo_limite_entrega_prop,a.observaciones,a.tipo,a.serv_contractual,case when isnumeric(a.ppmc_padre)&lt;&gt;1 then NULL else a.ppmc_padre END ppmc_padre,a.tipo_padre , '{s_opt_slas}' tipo_nivel_servicio 
FROM archivosxls.dbo.l_detalle_medicion_apertura_sat a
WHERE a.id_proveedor = {s_id_proveedor}
AND a.id_periodo ={s_id_periodo}
AND a.tipo_nivel_servicio = '{s_opt_slas}' 
AND a.estatus='F'
and  a.num_carga=(
SELECT max(b.num_carga)
FROM archivosxls.dbo.l_detalle_medicion_apertura_sat b
WHERE b.id_proveedor = {s_id_proveedor}
AND b.id_periodo = {s_id_periodo}
AND b.tipo_nivel_servicio = '{s_opt_slas}' 
AND b.estatus='F'
)
) datossat ON datossat.id_ppmc=datoscapc.id_ppmc and datossat.id_estimacion=datoscapc.id_estimacion
AND  (datossat.herr_est_cost!=datoscapc.herr_est_cost
OR datossat.req_serv!=datoscapc.req_serv
--OR datossat.fecha_asignacion!=datoscapc.fecha_asignacion
--OR datossat.fecha_entrega_prop!=datoscapc.fecha_entrega_prop
--OR datossat.fecha_acepta_prop!=datoscapc.fecha_acepta_prop
--OR datossat.horas_aprobadas!=datoscapc.horas_aprobadas
--OR datossat.tiempo_limite_entrega_prop!=datoscapc.tiempo_limite_entrega_prop
--OR datossat.tipo!=datoscapc.tipo
--OR datossat.serv_contractual!=datoscapc.serv_contractual
)

UNION

SELECT datoscapc.*,'REGISTRO CDS' estado_comparativo from (
SELECT a.id_ppmc,a.descripcion, a.servicio_negocio, a.tipo, a.id_estimacion, a.herr_est_cost , a.req_serv, a.fecha_asignacion , a.fecha_entrega_prop, a.fecha_acepta_prop, a.horas_aprobadas, a.tiempo_limite_entrega_prop, a.observaciones,case when isnumeric(a.ppmc_padre)&lt;&gt;1 then NULL else a.ppmc_padre END ppmc_padre , 
--a.tipo_padre, 
a.serv_contractual, a.tipo_nivel_servicio
--SELECT a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.herr_est_cost,a.req_serv,a.fecha_asignacion,a.fecha_entrega_prop,a.fecha_acepta_prop,a.horas_aprobadas,a.tiempo_limite_entrega_prop,a.observaciones,a.tipo,a.serv_contractual,a.ppmc_padre,a.tipo_padre , a.tipo_nivel_servicio
FROM archivosxls.dbo.l_detalle_medicion_apertura_sat a
WHERE a.id_proveedor = {s_id_proveedor}
AND a.id_periodo ={s_id_periodo}
AND a.tipo_nivel_servicio = '{s_opt_slas}' 
AND a.estatus='F'
and  a.num_carga=(
SELECT max(b.num_carga)
FROM archivosxls.dbo.l_detalle_medicion_apertura_sat b
WHERE b.id_proveedor = {s_id_proveedor}
AND b.id_periodo = {s_id_periodo}
AND b.tipo_nivel_servicio = '{s_opt_slas}' 
AND b.estatus='F'
)
	
) datoscapc
INNER JOIN (
select * from (
select cast(u.numero as integer) id_ppmc, DatosPPMC.NAME descripcion, 
	isnull(sn.nombre,  DatosPPMC.SERVICIO_NEGOCIO ) servicio_negocio , 
	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,
	--p.nombre, 
	u.IdEstimacion id_estimacion, 
	--u.Id, 
	c.HERR_EST_COST herr_est_cost, c.REQ_SERV req_serv,
	i.FechaAsignacion fecha_asignacion, i.FechaEntregaPropuesta fecha_entrega_prop, i.FechaAceptacionPropuesta fecha_acepta_prop, i.HorasAprobadas horas_aprobadas, i.DiasPropuesta tiempo_limite_entrega_prop, 
	i.Observaciones observaciones, 
	--i.IdTipoReq, 	i.id_servicio_cont,  
	i.idpadre ppmc_padre, i.tipopadre tipo_padre, 
	--u.Analista, u.EsReqTecnico ,
	sc.Descripcion serv_contractual,
	case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio
from mc_universo_cds u left join 
	(
SELECT DISTINCT REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_RO_AS 
UNION ALL
SELECT DISTINCT ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_PROYECTOS_AS 
UNION ALL
SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo
	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC 
	and c.FECHA_CARGA = PPMC_Proyectos_AS.FECHA_CARGA 
UNION ALL
SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo
	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  
 ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) 
 and (isnull(DatosPPMC.slo,0) = u.slo or DatosPPMC.fecha_carga &gt; '2015-06-01') -- a partir de este corte ya no hay dos cargas
inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and c.iduniverso= u.id  
left join mc_info_rs_ap_ec i on i.id = u.id
left join mc_c_TipoPPMC t on t.Id = i.IdTipoReq 
left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio 
left join mc_c_ServContractual sc on sc.Id = i.id_servicio_cont
where pc.id_periodo = {s_id_periodo}
	AND u.id_proveedor ={s_id_proveedor} 
	and (tipo='PA' or tipo='AC')
) as uno	
where	tipo_nivel_servicio='{s_opt_slas}'

) datossat ON datossat.id_ppmc=datoscapc.id_ppmc and datossat.id_estimacion=datoscapc.id_estimacion
AND  (datossat.herr_est_cost!=datoscapc.herr_est_cost
OR datossat.req_serv!=datoscapc.req_serv
--OR datossat.fecha_asignacion!=datoscapc.fecha_asignacion
--OR datossat.fecha_entrega_prop!=datoscapc.fecha_entrega_prop
--OR datossat.fecha_acepta_prop!=datoscapc.fecha_acepta_prop
--OR datossat.horas_aprobadas!=datoscapc.horas_aprobadas
--OR datossat.tiempo_limite_entrega_prop!=datoscapc.tiempo_limite_entrega_prop
--OR datossat.tipo!=datoscapc.tipo
--OR datossat.serv_contractual!=datoscapc.serv_contractual
)

UNION

select *,'REG. CDS QUE NO CARGO CAPC' estado_comparativo  from  (
SELECT a.id_ppmc,a.descripcion, a.servicio_negocio, a.tipo, a.id_estimacion, a.herr_est_cost , a.req_serv, a.fecha_asignacion , a.fecha_entrega_prop, a.fecha_acepta_prop, a.horas_aprobadas, a.tiempo_limite_entrega_prop, a.observaciones,case when isnumeric(a.ppmc_padre)&lt;&gt;1 then NULL else a.ppmc_padre END ppmc_padre , a.serv_contractual, a.tipo_nivel_servicio
--SELECT a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.herr_est_cost,a.req_serv,a.fecha_asignacion,a.fecha_entrega_prop,a.fecha_acepta_prop,a.horas_aprobadas,a.tiempo_limite_entrega_prop,a.observaciones,a.tipo,a.serv_contractual,a.ppmc_padre,a.tipo_padre , '{s_opt_slas}' tipo_nivel_servicio,'REG. CDS QUE NO CARGO CAPC' estado_comparativo  
FROM archivosxls.dbo.l_detalle_medicion_apertura_sat a
WHERE a.id_proveedor = {s_id_proveedor}
AND a.id_periodo ={s_id_periodo}
AND a.tipo_nivel_servicio = '{s_opt_slas}' 
AND a.estatus='F'
and  a.num_carga=(
SELECT max(b.num_carga)
FROM archivosxls.dbo.l_detalle_medicion_apertura_sat b
WHERE b.id_proveedor = {s_id_proveedor}
AND b.id_periodo = {s_id_periodo}
AND b.tipo_nivel_servicio = '{s_opt_slas}' 
AND b.estatus='F'
)
) uno
WHERE NOT EXISTS (
select * from (
select cast(u.numero as integer) id_ppmc, DatosPPMC.NAME descripcion, 
	isnull(sn.nombre,  DatosPPMC.SERVICIO_NEGOCIO ) servicio_negocio , 
	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,
	--p.nombre, 
	u.IdEstimacion id_estimacion, 
	--u.Id, 
	c.HERR_EST_COST herr_est_cost, c.REQ_SERV req_serv,
	i.FechaAsignacion fecha_asignacion, i.FechaEntregaPropuesta fecha_entrega_prop, i.FechaAceptacionPropuesta fecha_acepta_prop, i.HorasAprobadas horas_aprobadas, i.DiasPropuesta tiempo_limite_entrega_prop, 
	i.Observaciones observaciones, 
	--i.IdTipoReq, 	i.id_servicio_cont,  
	i.idpadre ppmc_padre, 
	--i.tipopadre tipo_padre, 
	--u.Analista, u.EsReqTecnico ,
	sc.Descripcion serv_contractual,
	case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio
from mc_universo_cds u left join 
	(
SELECT DISTINCT REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_RO_AS 
UNION ALL
SELECT DISTINCT ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_PROYECTOS_AS 
UNION ALL
SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo
	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC 
	and c.FECHA_CARGA = PPMC_Proyectos_AS.FECHA_CARGA 
UNION ALL
SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo
	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  
 ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) 
 and (isnull(DatosPPMC.slo,0) = u.slo or DatosPPMC.fecha_carga &gt; '2015-06-01') -- a partir de este corte ya no hay dos cargas
inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and c.iduniverso= u.id  
left join mc_info_rs_ap_ec i on i.id = u.id
left join mc_c_TipoPPMC t on t.Id = i.IdTipoReq 
left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio 
left join mc_c_ServContractual sc on sc.Id = i.id_servicio_cont
where pc.id_periodo = {s_id_periodo}
	AND u.id_proveedor ={s_id_proveedor} 
	and (tipo='PA' or tipo='AC')
	AND u.numero=uno.id_ppmc and u.IdEstimacion=uno.id_estimacion
)uno    where	uno.tipo_nivel_servicio='{s_opt_slas}'
)

UNION

select *,'REG. CAPC QUE NO CARGO CDS' estado_comparativo from  (
select cast(u.numero as integer) id_ppmc, DatosPPMC.NAME descripcion, 
	isnull(sn.nombre,  DatosPPMC.SERVICIO_NEGOCIO ) servicio_negocio , 
	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,
	--p.nombre, 
	u.IdEstimacion id_estimacion, 
	--u.Id, 
	c.HERR_EST_COST herr_est_cost, c.REQ_SERV req_serv,
	i.FechaAsignacion fecha_asignacion, i.FechaEntregaPropuesta fecha_entrega_prop, i.FechaAceptacionPropuesta fecha_acepta_prop, i.HorasAprobadas horas_aprobadas, i.DiasPropuesta tiempo_limite_entrega_prop, 
	i.Observaciones observaciones, 
	--i.IdTipoReq, 	i.id_servicio_cont,  
	i.idpadre ppmc_padre, 
	--i.tipopadre tipo_padre, 
	--u.Analista, u.EsReqTecnico ,
	sc.Descripcion serv_contractual,
	case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio
from mc_universo_cds u left join 
	(
SELECT DISTINCT REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_RO_AS 
UNION ALL
SELECT DISTINCT ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_PROYECTOS_AS 
UNION ALL
SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo
	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC 
	and c.FECHA_CARGA = PPMC_Proyectos_AS.FECHA_CARGA 
UNION ALL
SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo
	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  
 ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) 
 and (isnull(DatosPPMC.slo,0) = u.slo or DatosPPMC.fecha_carga &gt; '2015-06-01') -- a partir de este corte ya no hay dos cargas
inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and c.iduniverso= u.id  
left join mc_info_rs_ap_ec i on i.id = u.id
left join mc_c_TipoPPMC t on t.Id = i.IdTipoReq 
left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio 
left join mc_c_ServContractual sc on sc.Id = i.id_servicio_cont
where pc.id_periodo = {s_id_periodo}
	AND u.id_proveedor ={s_id_proveedor} 
	and (tipo='PA' or tipo='AC')
	
) uno
WHERE	uno.tipo_nivel_servicio='{s_opt_slas}'
AND NOT EXISTS (
SELECT a.id_ppmc,a.descripcion, a.servicio_negocio, a.tipo, a.id_estimacion, a.herr_est_cost , a.req_serv, a.fecha_asignacion , a.fecha_entrega_prop, a.fecha_acepta_prop, a.horas_aprobadas, a.tiempo_limite_entrega_prop, a.observaciones,case when isnumeric(a.ppmc_padre)&lt;&gt;1 then NULL else a.ppmc_padre END ppmc_padre , a.serv_contractual, a.tipo_nivel_servicio
--SELECT a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.herr_est_cost,a.req_serv,a.fecha_asignacion,a.fecha_entrega_prop,a.fecha_acepta_prop,a.horas_aprobadas,a.tiempo_limite_entrega_prop,a.observaciones,a.tipo,a.serv_contractual,a.ppmc_padre,a.tipo_padre , '{s_opt_slas}' tipo_nivel_servicio
FROM archivosxls.dbo.l_detalle_medicion_apertura_sat a
WHERE a.id_proveedor = {s_id_proveedor}
AND a.id_periodo ={s_id_periodo}
AND a.tipo_nivel_servicio = '{s_opt_slas}' 
AND a.estatus='F'
and  a.num_carga=(
SELECT max(b.num_carga)
FROM archivosxls.dbo.l_detalle_medicion_apertura_sat b
WHERE b.id_proveedor = {s_id_proveedor}
AND b.id_periodo = {s_id_periodo}
AND b.tipo_nivel_servicio = '{s_opt_slas}' 
AND b.estatus='F'
)
AND a.id_ppmc=uno.id_ppmc and a.id_estimacion=uno.id_estimacion
)
) as total order by id_ppmc,id_estimacion,estado_comparativo
" pageSizeLimit="100" pageSize="True" wizardCaption="Comparativo Requerimientos Apertura" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="Grid1">
			<Components>
				<Sorter id="139" visible="True" name="Sorter_estado_comparativo" column="estado_comparativo" wizardCaption="Estado Comparativo" wizardSortingType="SimpleDir" wizardControl="estado_comparativo" wizardAddNbsp="False" PathID="Grid1Sorter_estado_comparativo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="140" visible="True" name="Sorter_id_ppmc" column="id_ppmc" wizardCaption="Id Ppmc" wizardSortingType="SimpleDir" wizardControl="id_ppmc" wizardAddNbsp="False" PathID="Grid1Sorter_id_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="141" visible="True" name="Sorter_id_estimacion" column="id_estimacion" wizardCaption="Id Estimacion" wizardSortingType="SimpleDir" wizardControl="id_estimacion" wizardAddNbsp="False" PathID="Grid1Sorter_id_estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="142" visible="True" name="Sorter_servicio_negocio" column="servicio_negocio" wizardCaption="Servicio Negocio" wizardSortingType="SimpleDir" wizardControl="servicio_negocio" wizardAddNbsp="False" PathID="Grid1Sorter_servicio_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="143" visible="True" name="Sorter_tipo" column="tipo" wizardCaption="Tipo" wizardSortingType="SimpleDir" wizardControl="tipo" wizardAddNbsp="False" PathID="Grid1Sorter_tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="144" visible="True" name="Sorter_herr_est_cost" column="herr_est_cost" wizardCaption="Herr Est Cost" wizardSortingType="SimpleDir" wizardControl="herr_est_cost" wizardAddNbsp="False" PathID="Grid1Sorter_herr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="145" visible="True" name="Sorter_req_serv" column="req_serv" wizardCaption="Req Serv" wizardSortingType="SimpleDir" wizardControl="req_serv" wizardAddNbsp="False" PathID="Grid1Sorter_req_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="146" visible="True" name="Sorter_fecha_asignacion" column="fecha_asignacion" wizardCaption="Fecha Asignacion" wizardSortingType="SimpleDir" wizardControl="fecha_asignacion" wizardAddNbsp="False" PathID="Grid1Sorter_fecha_asignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="147" visible="True" name="Sorter_fecha_entrega_prop" column="fecha_entrega_prop" wizardCaption="Fecha Entrega Prop" wizardSortingType="SimpleDir" wizardControl="fecha_entrega_prop" wizardAddNbsp="False" PathID="Grid1Sorter_fecha_entrega_prop">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="148" visible="True" name="Sorter_fecha_acepta_prop" column="fecha_acepta_prop" wizardCaption="Fecha Acepta Prop" wizardSortingType="SimpleDir" wizardControl="fecha_acepta_prop" wizardAddNbsp="False" PathID="Grid1Sorter_fecha_acepta_prop">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="149" visible="True" name="Sorter_horas_aprobadas" column="horas_aprobadas" wizardCaption="Horas Aprobadas" wizardSortingType="SimpleDir" wizardControl="horas_aprobadas" wizardAddNbsp="False" PathID="Grid1Sorter_horas_aprobadas">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="150" visible="True" name="Sorter_tiempo_limite_entrega_prop" column="tiempo_limite_entrega_prop" wizardCaption="Tiempo Limite Entrega Prop" wizardSortingType="SimpleDir" wizardControl="tiempo_limite_entrega_prop" wizardAddNbsp="False" PathID="Grid1Sorter_tiempo_limite_entrega_prop">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="151" visible="True" name="Sorter_ppmc_padre" column="ppmc_padre" wizardCaption="Ppmc Padre" wizardSortingType="SimpleDir" wizardControl="ppmc_padre" wizardAddNbsp="False" PathID="Grid1Sorter_ppmc_padre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="152" visible="True" name="Sorter_serv_contractual" column="serv_contractual" wizardCaption="Serv Contractual" wizardSortingType="SimpleDir" wizardControl="serv_contractual" wizardAddNbsp="False" PathID="Grid1Sorter_serv_contractual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="153" visible="True" name="Sorter_tipo_nivel_servicio" column="tipo_nivel_servicio" wizardCaption="Tipo Nivel Servicio" wizardSortingType="SimpleDir" wizardControl="tipo_nivel_servicio" wizardAddNbsp="False" PathID="Grid1Sorter_tipo_nivel_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="154" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="estado_comparativo" fieldSource="estado_comparativo" wizardCaption="Estado Comparativo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1estado_comparativo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="155" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_ppmc" fieldSource="id_ppmc" wizardCaption="Id Ppmc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1id_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="156" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_estimacion" fieldSource="id_estimacion" wizardCaption="Id Estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1id_estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="157" fieldSourceType="DBColumn" dataType="Memo" html="False" generateSpan="False" name="descripcion" fieldSource="descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="158" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_negocio" fieldSource="servicio_negocio" wizardCaption="Servicio Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1servicio_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="159" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo" fieldSource="tipo" wizardCaption="Tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="160" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="herr_est_cost" fieldSource="herr_est_cost" wizardCaption="Herr Est Cost" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1herr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="161" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="req_serv" fieldSource="req_serv" wizardCaption="Req Serv" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1req_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="162" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_asignacion" fieldSource="fecha_asignacion" wizardCaption="Fecha Asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1fecha_asignacion" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="GeneralDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="163" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_entrega_prop" fieldSource="fecha_entrega_prop" wizardCaption="Fecha Entrega Prop" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1fecha_entrega_prop" format="GeneralDate" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="164" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_acepta_prop" fieldSource="fecha_acepta_prop" wizardCaption="Fecha Acepta Prop" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1fecha_acepta_prop" format="GeneralDate" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="165" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="horas_aprobadas" fieldSource="horas_aprobadas" wizardCaption="Horas Aprobadas" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1horas_aprobadas">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="166" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="tiempo_limite_entrega_prop" fieldSource="tiempo_limite_entrega_prop" wizardCaption="Tiempo Limite Entrega Prop" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1tiempo_limite_entrega_prop">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="167" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ppmc_padre" fieldSource="ppmc_padre" wizardCaption="Ppmc Padre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1ppmc_padre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="168" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="serv_contractual" fieldSource="serv_contractual" wizardCaption="Serv Contractual" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1serv_contractual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="169" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo_nivel_servicio" fieldSource="tipo_nivel_servicio" wizardCaption="Tipo Nivel Servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1tipo_nivel_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="170" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="Austere4">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Image id="171" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Imgherr_est_cost" PathID="Grid1Imgherr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="172" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgreq_serv" PathID="Grid1imgreq_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="173"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="183" dataType="Text" defaultValue="'SLA'" designDefaultValue="'SLA'" parameterSource="s_opt_slas" parameterType="URL" variable="s_opt_slas"/>
<SQLParameter id="184" dataType="Text" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
<SQLParameter id="185" dataType="Text" defaultValue="29" designDefaultValue="29" parameterSource="s_id_periodo" parameterType="URL" variable="s_id_periodo"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="comparativo_ra.php" forShow="True" url="comparativo_ra.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="comparativo_ra_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
