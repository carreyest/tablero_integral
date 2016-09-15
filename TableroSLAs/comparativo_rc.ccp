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
and id_periodo &gt; 30
and id_periodo  in (select distinct id_periodo from resumen_sat where id_proveedor={s_id_proveedor})


" boundColumn="id_periodo" textColumn="periodo" PathID="periodos_cargas_id_periodo" defaultValue="31">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters>
						<SQLParameter id="169" dataType="Text" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
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
				<Link id="157" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="periodos_cargaLink2" hrefSource="comparativo_inc.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Incidentes','textSourceDB':'','hrefSource':'comparativo_inc.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="164" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="periodos_cargaLink3" hrefSource="comparativo_ra.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Apertura','textSourceDB':'','hrefSource':'comparativo_ra.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="165" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="periodos_cargaLink4" hrefSource="comparativo_rc.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Cierre','textSourceDB':'','hrefSource':'comparativo_rc.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="173" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Label1" PathID="periodos_cargaLabel1">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="174"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
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
select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from 
(
select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, 
	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, 
	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,
	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , 
	c.CUMPL_REQ_FUNC cump_req_func, 
	C.CALIDAD_PROD_TERM calidad_prod_term ,
	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,
	c.CAL_COD calidad_codigo,
	i.FechaFirmaCAES fecha_caes,    
	sc.descripcion serv_contractual,
    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio
from mc_universo_cds u inner join 
	(
SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_RO_AS 
UNION ALL
SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_PROYECTOS_AS 
UNION ALL
SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo
	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC 
	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA
UNION ALL
SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo
	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  
 ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO 
inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id
left join mc_info_rs_cr_re_rc i on i.id = u.id
left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo
left join mc_info_rs_cr_deffug df on df.id = c.iduniverso
left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso
left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso 
left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso
left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id
left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio 
where  isnull(descartar_manual,0)=0 and tipo='PC'
	AND pc.id_periodo = {s_id_periodo}
	AND u.id_proveedor ={s_id_proveedor} 
) a 
where tipo_nivel_servicio = '{s_opt_slas}'
	
) datoscapc
INNER JOIN (

select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,
case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,
case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,
case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,
case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,
case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,
a.tipo,a.serv_contractual,a.fecha_caes, 'SLA' tipo_nivel_servicio
FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a
        WHERE a.id_proveedor = {s_id_proveedor}
        AND a.id_periodo = {s_id_periodo}
        AND a.tipo_nivel_servicio = '{s_opt_slas}'
        AND a.estatus='F'
        and  a.num_carga=(
        SELECT max(b.num_carga)
        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b
        WHERE b.id_proveedor = {s_id_proveedor}
        AND b.id_periodo = {s_id_periodo}
        AND b.tipo_nivel_servicio = '{s_opt_slas}'
        AND b.estatus='F'
        )

) datossat ON datossat.id_ppmc=datoscapc.id_ppmc and datossat.id_estimacion=datoscapc.id_estimacion
AND  (datossat.cump_req_func!=datoscapc.cump_req_func
OR datossat.retraso_entregables!=datoscapc.retraso_entregables
OR datossat.calidad_prod_term!=datoscapc.calidad_prod_term
OR datossat.calidad_codigo!=datoscapc.calidad_codigo
OR datossat.defectos_fugados_amb_prod!=datoscapc.defectos_fugados_amb_prod
--OR datossat.tipo!=datoscapc.tipo
--OR datossat.serv_contractual!=datoscapc.serv_contractual
)


UNION

SELECT datossat.*,'REGISTRO CDS' estado_comparativo from (

select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,
case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,
case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,
case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,
case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,
case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,
a.tipo,a.serv_contractual,a.fecha_caes, '{s_opt_slas}' tipo_nivel_servicio
FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a
        WHERE a.id_proveedor = {s_id_proveedor}
        AND a.id_periodo = {s_id_periodo}
        AND a.tipo_nivel_servicio = '{s_opt_slas}'
        AND a.estatus='F'
        and  a.num_carga=(
        SELECT max(b.num_carga)
        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b
        WHERE b.id_proveedor = {s_id_proveedor}
        AND b.id_periodo = {s_id_periodo}
        AND b.tipo_nivel_servicio = '{s_opt_slas}'
        AND b.estatus='F'
        )
) datossat
INNER JOIN (
select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from 
(
select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, 
	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, 
	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,
	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , 
	c.CUMPL_REQ_FUNC cump_req_func, 
	C.CALIDAD_PROD_TERM calidad_prod_term ,
	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,
	c.CAL_COD calidad_codigo,
	i.FechaFirmaCAES fecha_caes,    
	sc.descripcion serv_contractual,
    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio
from mc_universo_cds u inner join 
	(
SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_RO_AS 
UNION ALL
SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_PROYECTOS_AS 
UNION ALL
SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo
	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC 
	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA
UNION ALL
SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo
	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  
 ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO 
inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id
left join mc_info_rs_cr_re_rc i on i.id = u.id
left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo
left join mc_info_rs_cr_deffug df on df.id = c.iduniverso
left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso
left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso 
left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso
left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id
left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio 
where  isnull(descartar_manual,0)=0 and tipo='PC'
	AND pc.id_periodo = {s_id_periodo}
	AND u.id_proveedor ={s_id_proveedor} 
) a 
where tipo_nivel_servicio = '{s_opt_slas}'

) datoscapc ON datossat.id_ppmc=datoscapc.id_ppmc and datossat.id_estimacion=datoscapc.id_estimacion
AND  (datossat.cump_req_func!=datoscapc.cump_req_func
OR datossat.retraso_entregables!=datoscapc.retraso_entregables
OR datossat.calidad_prod_term!=datoscapc.calidad_prod_term
OR datossat.calidad_codigo!=datoscapc.calidad_codigo
OR datossat.defectos_fugados_amb_prod!=datoscapc.defectos_fugados_amb_prod
--OR datossat.tipo!=datoscapc.tipo
--OR datossat.serv_contractual!=datoscapc.serv_contractual
)

UNION

select *,'REG. CDS QUE NO CARGO CAPC' estado_comparativo  from  (
select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,
case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,
case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,
case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,
case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,
case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,
a.tipo,a.serv_contractual,a.fecha_caes, '{s_opt_slas}' tipo_nivel_servicio
FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a
        WHERE a.id_proveedor = {s_id_proveedor}
        AND a.id_periodo = {s_id_periodo}
        AND a.tipo_nivel_servicio = '{s_opt_slas}'
        AND a.estatus='F'
        and  a.num_carga=(
        SELECT max(b.num_carga)
        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b
        WHERE b.id_proveedor = {s_id_proveedor}
        AND b.id_periodo = {s_id_periodo}
        AND b.tipo_nivel_servicio = '{s_opt_slas}'
        AND b.estatus='F'
        )
        
) uno
WHERE NOT EXISTS (
select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from 
(
select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, 
	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, 
	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,
	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , 
	c.CUMPL_REQ_FUNC cump_req_func, 
	C.CALIDAD_PROD_TERM calidad_prod_term ,
	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,
	c.CAL_COD calidad_codigo,
	i.FechaFirmaCAES fecha_caes,    
	sc.descripcion serv_contractual,
    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio
from mc_universo_cds u inner join 
	(
SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_RO_AS 
UNION ALL
SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_PROYECTOS_AS 
UNION ALL
SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo
	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC 
	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA
UNION ALL
SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo
	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  
 ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO 
inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id
left join mc_info_rs_cr_re_rc i on i.id = u.id
left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo
left join mc_info_rs_cr_deffug df on df.id = c.iduniverso
left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso
left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso 
left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso
left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id
left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio 
where  isnull(descartar_manual,0)=0 and tipo='PC'
	AND pc.id_periodo = {s_id_periodo}
	AND u.id_proveedor ={s_id_proveedor} 
) a 
where tipo_nivel_servicio = '{s_opt_slas}'
AND a.id_ppmc=uno.id_ppmc and a.id_estimacion=uno.id_estimacion
)

UNION

select *,'REG. CAPC QUE NO CARGO CDS' estado_comparativo from  (
select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from 
(
select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, 
	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, 
	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,
	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , 
	c.CUMPL_REQ_FUNC cump_req_func, 
	C.CALIDAD_PROD_TERM calidad_prod_term ,
	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,
	c.CAL_COD calidad_codigo,
	i.FechaFirmaCAES fecha_caes,    
	sc.descripcion serv_contractual,
    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio
from mc_universo_cds u inner join 
	(
SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_RO_AS 
UNION ALL
SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_PROYECTOS_AS 
UNION ALL
SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo
	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC 
	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA
UNION ALL
SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo
	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  
 ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO 
inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id
left join mc_info_rs_cr_re_rc i on i.id = u.id
left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo
left join mc_info_rs_cr_deffug df on df.id = c.iduniverso
left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso
left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso 
left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso
left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id
left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio 

where  isnull(descartar_manual,0)=0 and tipo='PC'
    AND pc.id_periodo = {s_id_periodo}
	AND u.id_proveedor ={s_id_proveedor} 
) a 
where tipo_nivel_servicio = '{s_opt_slas}'
) uno
WHERE NOT EXISTS (
select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,
case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,
case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,
case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,
case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,
case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,
a.tipo,a.serv_contractual,a.fecha_caes, 'SLA' tipo_nivel_servicio
FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a
        WHERE a.id_proveedor = {s_id_proveedor}
        AND a.id_periodo = {s_id_periodo}
        AND a.tipo_nivel_servicio = '{s_opt_slas}'
        AND a.estatus='F'
        and  a.num_carga=(
        SELECT max(b.num_carga)
        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b
        WHERE b.id_proveedor = {s_id_proveedor}
        AND b.id_periodo = {s_id_periodo}
        AND b.tipo_nivel_servicio = '{s_opt_slas}'
        AND b.estatus='F'
		AND a.id_ppmc=uno.id_ppmc and a.id_estimacion=uno.id_estimacion        
        )

)
) as total order by id_ppmc,id_estimacion,estado_comparativo
" pageSizeLimit="100" pageSize="True" wizardCaption="Comparativo Requerimientos Cierre" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="Grid1">
			<Components>
				<Label id="139" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="estado_comparativo" fieldSource="estado_comparativo" wizardCaption="Estado Comparativo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1estado_comparativo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="140" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_ppmc" fieldSource="id_ppmc" wizardCaption="Id Ppmc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1id_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="141" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_estimacion" fieldSource="id_estimacion" wizardCaption="Id Estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1id_estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="142" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_negocio" fieldSource="servicio_negocio" wizardCaption="Servicio Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1servicio_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="143" fieldSourceType="DBColumn" dataType="Memo" html="False" generateSpan="False" name="descripcion" fieldSource="descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="144" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="cump_req_func" fieldSource="cump_req_func" wizardCaption="Cump Req Func" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1cump_req_func">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="145" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="retraso_entregables" fieldSource="retraso_entregables" wizardCaption="Retraso Entregables" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1retraso_entregables">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="146" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="calidad_prod_term" fieldSource="calidad_prod_term" wizardCaption="Calidad Prod Term" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1calidad_prod_term">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="147" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="calidad_codigo" fieldSource="calidad_codigo" wizardCaption="Calidad Codigo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1calidad_codigo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="148" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="defectos_fugados_amb_prod" fieldSource="defectos_fugados_amb_prod" wizardCaption="Defectos Fugados Amb Prod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1defectos_fugados_amb_prod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="149" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo" fieldSource="tipo" wizardCaption="Tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="150" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="serv_contractual" fieldSource="serv_contractual" wizardCaption="Serv Contractual" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1serv_contractual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="151" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_caes" fieldSource="fecha_caes" wizardCaption="Fecha Caes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1fecha_caes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="152" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo_nivel_servicio" fieldSource="tipo_nivel_servicio" wizardCaption="Tipo Nivel Servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1tipo_nivel_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="153" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="Austere4">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Image id="158" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcump_req_func" PathID="Grid1imgcump_req_func">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="159" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgretraso_entregables" PathID="Grid1imgretraso_entregables">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="160" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcalidad_prod_term" PathID="Grid1imgcalidad_prod_term">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="161" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcalidad_codigo" PathID="Grid1imgcalidad_codigo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="162" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgdefectos_fugados_amb_prod" PathID="Grid1imgdefectos_fugados_amb_prod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="163"/>
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
				<SQLParameter id="170" dataType="Text" defaultValue="'SLA'" designDefaultValue="'SLA'" parameterSource="s_opt_slas" parameterType="URL" variable="s_opt_slas"/>
				<SQLParameter id="171" dataType="Text" defaultValue="31" designDefaultValue="31" parameterSource="s_id_periodo" parameterType="URL" variable="s_id_periodo"/>
				<SQLParameter id="172" dataType="Text" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="comparativo_rc.php" forShow="True" url="comparativo_rc.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="comparativo_rc_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
