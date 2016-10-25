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
				<ListBox id="5" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Integer" returnValueType="Number" name="s_id_periodo" fieldSource="id_periodo" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Periodo" caption="Id Periodo" required="True" unique="False" connection="cnDisenio" dataSource="select distinct id_periodo,  periodo+tipo_periodo as periodo
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
						<SQLParameter id="141" dataType="Text" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
					</SQLParameters>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="7" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="True" unique="False" connection="cnDisenio" dataSource="select id_proveedor, nombre from mc_c_proveedor where descripcion!='CAPC'" boundColumn="id_proveedor" textColumn="nombre" PathID="periodos_cargas_id_proveedor" defaultValue="2">
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
				<ListBox id="8" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="s_opt_slas" wizardEmptyCaption="Seleccionar Valor" PathID="periodos_cargas_opt_slas" dataSource="SLA;SLA;SLO;SLO" defaultValue="'SLA'" required="True">
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
				<Link id="134" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="periodos_cargaLink1" hrefSource="comparativo_resumen.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Resumen','textSourceDB':'','hrefSource':'comparativo_resumen.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="periodos_cargaLink2" hrefSource="comparativo_incidentes.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Incidentes','textSourceDB':'','hrefSource':'comparativo_incidentes.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="136" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="periodos_cargaLink3" hrefSource="comparativo_apertura.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Apertura','textSourceDB':'','hrefSource':'comparativo_apertura.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="periodos_cargaLink4" hrefSource="comparativo_cierre.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Cierre','textSourceDB':'','hrefSource':'comparativo_cierre.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="148" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Label1" PathID="periodos_cargaLabel1">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="149" eventType="Server"/>
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
		<Grid id="24" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="Grid2" connection="cnDisenio" dataSource="select * from (
select  replace(capc.descripcion,CHAR(9),'') descripcion_sat,
	 sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end) totherr_est_cost_sat, 
		sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end) cumplenherr_est_cost_sat, 
		case when sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end)&gt;0 then 
			sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end)/cast((sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end)) as float)*100 
		else 0 end herr_est_cost_sat,	 
	 (select meta from mc_c_metrica where acronimo='herr_est_cost') as meta_herr_est_cost_sat,
	 
	 sum(case when req_serv='1' or req_serv='0' then 1 else 0 end) totreq_serv_sat, 
		sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end) cumplenreq_serv_sat, 
		case when sum(case when req_serv='1' or req_serv='0' then 1 else 0 end)&gt;0 then 
			sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end)/cast((sum(case when req_serv='1' or req_serv='0' then 1 else 0 end)) as float)*100 
		else 0 end req_serv_sat,	 
	 (select meta from mc_c_metrica where acronimo='req_serv') as meta_req_serv_sat,
	 
	 sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end) totcumpl_req_func_sat, 
		sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as int) else 0 end) cumplencumpl_req_func_sat, 
		case when sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end)&gt;0 then 
			sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as int) else 0 end)/cast((sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end)) as float)*100 
		else 0 end cumpl_req_func_sat ,
	 (select meta from mc_c_metrica where acronimo='cumpl_req_func') as meta_cumpl_req_func_sat,
	 
	 
	 sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end) totcalidad_prod_term_sat, 
		sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end) cumplencalidad_prod_term_sat, 
		case when sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end)&gt;0 then 
			sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end)/
		 cast(	(sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end))AS float)*100 
		else 0 end calidad_prod_term_sat,
	 (select meta from mc_c_metrica where acronimo='calidad_prod_term') as meta_calidad_prod_term_sat,
	
	
	 sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end) totretr_entregable_sat, 
		sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end) cumplenretr_entregable_sat, 
		case when sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end)&gt;0 then 
			sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end)/cast((sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end)) as float)*100 
		else 0 end retr_entregable_sat,	 
	 (select meta from mc_c_metrica where acronimo='retr_entregable') as meta_retr_entregable_sat,
	 
	 sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end) totcal_cod_sat, 
		sum(case when isnumeric(calidad_codigo)=1 then cast(calidad_codigo  as int) else 0 end) cumplencal_cod_sat, 
		case when sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end)&gt;0 then 
			sum(case when isnumeric(calidad_codigo)=1 then cast(calidad_codigo  as int) else 0 end)/cast((sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end)) as float)*100 
		else 0 end cal_cod_sat,	 
	 (select meta from mc_c_metrica where acronimo='cal_cod') as meta_cal_cod_sat,
	 
	 sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end) totdef_fug_amb_prod_sat, 
		sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end) cumplendef_fug_amb_prod_sat, 
		case when sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end)&gt;0 then 
			sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end)/cast((sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end)) as float)*100  
		else 0 end def_fug_amb_prod_sat,	 
	 (select meta from mc_c_metrica where acronimo='def_fug_amb_prod') as meta_def_fug_amb_prod_sat,
	 
	 sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end)  totinc_tiempoasignacion_sat, 
		sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end) cumpleninc_tiempoasignacion_sat, 
		case when sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end)&gt;0 then 
			sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end)/cast((sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end)) as float)*100 
		else 0 end inc_tiempoasignacion_sat,
	 (select meta from mc_c_metrica where acronimo='inc_tiempoasignacion') as meta_inc_tiempoasignacion_sat,
	
	 sum(case when cumple_inc_tiemposolucion='1' or cumple_inc_tiemposolucion='0' then 1 else 0 end) totinc_tiemposolucion_sat, 
		sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end) cumpleninc_tiemposolucion_sat, 
		case when sum(case when cumple_inc_tiemposolucion='1' or cumple_inc_tiemposolucion='0' then 1 else 0 end)&gt;0 then 
			sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end)/cast((sum(case when cumple_inc_tiemposolucion='1' or cumple_inc_tiemposolucion='0' then 1 else 0 end)) as float)*100 
		else 0 end inc_tiemposolucion_sat,	 
	 (select meta from mc_c_metrica where acronimo='inc_tiemposolucion') as meta_inc_tiemposolucion_sat,
	 	
	 	 AVG(Cumple_EF) cumplenefic_presup_sat, AVG(total_ef) totefic_presup_sat, avg(cast(Cumple_EF as float))/avg(total_ef)*100  efic_presup_sat,
	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as meta_efic_presup_sat
from mc_c_ServContractual capc 
left join (select * from [archivosxls].[dbo].l_calificacion_rs_aut_sat m
	where m.id_periodo= {s_id_periodo}    and m.id_proveedor ={s_id_proveedor} and m.tipo_nivel_servicio ='{s_opt_slas}' and m.estatus ='F' 
	and num_carga=(
       select max(b.num_carga)
       from [archivosxls].[dbo].l_calificacion_rs_aut_sat  b
       where b.id_proveedor = {s_id_proveedor} 
       and b.id_periodo =  {s_id_periodo} 
       and b.tipo_nivel_servicio = '{s_opt_slas}' 
       and b.estatus='F'
       )) m on replace(capc.Descripcion,CHAR(9),'')  = m.servicio_cont  
	 left join	(select cumple_inc_tiempoasignacion, cumple_inc_tiempoSolucion, 
				id_proveedor, 'Servicio de Soporte de Aplicaciones'  servicio_cont
				from [archivosxls].[dbo].l_calificacion_incidentes_AUT_sat
				where (id_periodo= {s_id_periodo}   and id_proveedor = {s_id_proveedor}  and tipo_nivel_servicio ='{s_opt_slas}'   and estatus ='F'
				and num_carga=(select max(b.num_carga) from [archivosxls].[dbo].l_calificacion_incidentes_aut_sat b 
				where b.id_proveedor = {s_id_proveedor}  and b.id_periodo =   {s_id_periodo}  and b.tipo_nivel_servicio = '{s_opt_slas}'  and b.estatus='F' ) 
				) )  mi on  mi.servicio_cont = replace(capc.Descripcion,CHAR(9),'') 
	left join (select SUM(case when efic_presupuestal='1' then 1 else 0 end) Cumple_EF, COUNT(efic_presupuestal) Total_EF, Id_Proveedor,  2 IdServicioCont  
			from [archivosxls].[dbo].l_detalle_eficiencia_presupuestal_sat 
			where (id_periodo=  {s_id_periodo}   and id_proveedor = {s_id_proveedor}  and tipo_nivel_servicio ='{s_opt_slas}'   and estatus ='F'
				and num_carga=(select max(b.num_carga) from [archivosxls].[dbo].l_detalle_eficiencia_presupuestal_sat b 
				where b.id_proveedor = {s_id_proveedor}  and b.id_periodo = {s_id_periodo}  and b.tipo_nivel_servicio = '{s_opt_slas}'  and b.estatus='F' ) 
				) group by id_proveedor ) ef on ef.IdServicioCont = capc.id
where capc.Aplica ='CDS' and IdOld &lt;&gt;0
group by capc.Descripcion
) as sat
left join (
select 	replace(sc.descripcion,CHAR(9),'') descripcion, mc.*
 from mc_c_ServContractual sc left join (
select  
	 COUNT(HERR_EST_COST) totherr_est_cost, SUM(cast(HERR_EST_COST as int)) cumplenherr_est_cost, SUM(cast(HERR_EST_COST as float))/COUNT(HERR_EST_COST)*100 herr_est_cost,
	 (Select Meta from mc_c_metrica where acronimo='HERR_EST_COST') as meta_herr_est_cost,
	 COUNT(REQ_SERV) totreq_serv, SUM(cast(REQ_SERV as int)) cumplenreq_serv, SUM(cast(REQ_SERV as float))/COUNT(REQ_SERV)*100 req_serv,
	 (Select Meta from mc_c_metrica where acronimo='REQ_SERV') as meta_req_serv,
	 COUNT(CUMPL_REQ_FUNC) totcumpl_req_func, SUM(cast(CUMPL_REQ_FUNC as int)) cumplencumpl_req_func, SUM(cast(CUMPL_REQ_FUNC as float))/COUNT(CUMPL_REQ_FUNC)*100 cumpl_req_func,
	 (Select Meta from mc_c_metrica where acronimo='CUMPL_REQ_FUNC') as meta_cumpl_req_func,
	 COUNT(CALIDAD_PROD_TERM) totcalidad_prod_term, SUM(cast(CALIDAD_PROD_TERM as int)) cumplencalidad_prod_term, SUM(cast(CALIDAD_PROD_TERM as float))/COUNT(CALIDAD_PROD_TERM)*100 calidad_prod_term,
	 (Select Meta from mc_c_metrica where acronimo='CALIDAD_PROD_TERM') as meta_calidad_prod_term,
	 COUNT(RETR_ENTREGABLE) totretr_entregable, SUM(cast(RETR_ENTREGABLE as int)) cumplenretr_entregable, SUM(cast(RETR_ENTREGABLE as float))/COUNT(RETR_ENTREGABLE)*100 retr_entregable,
	 (Select Meta from mc_c_metrica where acronimo='RETR_ENTREGABLE') as meta_retr_entregable,
	 COUNT(CAL_COD) totcal_cod, SUM(cast(CAL_COD as int)) cumplencal_cod, SUM(cast(CAL_COD as float))/COUNT(CAL_COD)*100 cal_cod,
	 (Select Meta from mc_c_metrica where acronimo='CAL_COD') as meta_cal_cod,
	 COUNT(DEF_FUG_AMB_PROD) totdef_fug_amb_prod, SUM(cast(DEF_FUG_AMB_PROD as int)) cumplendef_fug_amb_prod, SUM(cast(DEF_FUG_AMB_PROD as float))/COUNT(DEF_FUG_AMB_PROD)*100  def_fug_amb_prod,
	 (Select Meta from mc_c_metrica where acronimo='DEF_FUG_AMB_PROD') as meta_def_fug_amb_prod,
	 COUNT(Cumple_Inc_TiempoAsignacion) totinc_tiempoasignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as int)) cumpleninc_tiempoasignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as float))/COUNT(Cumple_Inc_TiempoAsignacion)*100 inc_tiempoasignacion,
	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoSolucion') as meta_inc_tiemposolucion,
	 COUNT(Cumple_Inc_TiempoSolucion) totinc_tiemposolucion, SUM(cast(Cumple_Inc_TiempoSolucion as int)) cumpleninc_tiemposolucion, SUM(cast(Cumple_Inc_TiempoSolucion as float))/COUNT(Cumple_Inc_TiempoSolucion)*100 inc_tiemposolucion,
	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoAsignacion') as meta_inc_tiempoasignacion,
	AVG(Cumple_EF) cumplenefic_presup, AVG(total_ef) totefic_presup, avg(cast(Cumple_EF as float))/avg(total_ef)*100  efic_presup,
	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as meta_efic_presup,
	 sc.Id   id_servicio_cont 
from mc_c_ServContractual sc 
left join mc_calificacion_rs_MC m on sc.Id = m.id_servicio_cont 
and m.IdUniverso in (select id from (
										select id,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo &lt;&gt; 'IN'
										) as uno
										where uno.tipo_nivel_servicio='{s_opt_slas}'
									)
and m.IdUniverso not in (select id from mc_universo_cds where revision=2  )
	 left join	(select mc.Cumple_DISP_SOPORTE, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.MesReporte , mc.AnioReporte ,  
				mc.id_proveedor, 5 IdServicioCont 
				from mc_calificacion_incidentes_MC mc
				LEFT JOIN
                                periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio
				where (mc.id_proveedor = {s_id_proveedor} or 0={s_id_proveedor})  
				and pc.id_periodo = {s_id_periodo} 
				and mc.Id_incidente in (select numero from (
														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'
														) as uno
														where uno.tipo_nivel_servicio='{s_opt_slas}'
										) 
				)  mi on  mi.IdServicioCont= sc.Id 
left join  (select SUM(CumpleSLA) Cumple_EF, COUNT(CumpleSLA) Total_EF, Id_Proveedor, MesReporte , anioreporte , 2 IdServicioCont  
			from mc_eficiencia_presupuestal  where CumpleSLA in (1,0)  
			and (([GrupoAplicativos] not like 'Todos%' and (4&lt;&gt;4 or (MesReporte&gt;2 and anioreporte &gt;2013)) ) 
					or (4=4 and MesReporte&lt;=2 and anioreporte &lt;2014 ) or 0=4)
			group by Id_Proveedor, MesReporte , anioreporte  ) ef 
			on ef.Id_Proveedor  = m.id_proveedor  and m.MesReporte  = ef.MesReporte and m.AnioReporte  = ef.anioreporte  
				and ef.IdServicioCont= sc.Id 
LEFT JOIN
            periodos_carga pc ON (m.MesReporte = pc.mes OR mi.MesReporte = pc.mes) AND (m.AnioReporte = pc.anio OR mi.AnioReporte = pc.anio)
								
where  pc.id_periodo = {s_id_periodo} 
			and (m.id_proveedor = {s_id_proveedor} or mi.id_proveedor = {s_id_proveedor} or  {s_id_proveedor}=0)
group by sc.id
) as mc on sc.id = mc.id_servicio_cont 
where sc.Aplica ='CDS'
) as cds on cds.descripcion = sat.descripcion_sat" pageSizeLimit="100" pageSize="True" wizardCaption="resumen_ns" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="Grid2">
			<Components>
				<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripcion_sat" fieldSource="descripcion_sat" wizardCaption="Descripcion Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2descripcion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totherr_est_cost_sat" fieldSource="totherr_est_cost_sat" wizardCaption="Totherr Est Cost Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totherr_est_cost_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totherr_est_cost" fieldSource="totherr_est_cost" wizardCaption="Totherr Est Cost" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totherr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totreq_serv_sat" fieldSource="totreq_serv_sat" wizardCaption="Totreq Serv Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totreq_serv_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="41" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totreq_serv" fieldSource="totreq_serv" wizardCaption="Totreq Serv" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totreq_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="45" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totcumpl_req_func_sat" fieldSource="totcumpl_req_func_sat" wizardCaption="Totcumpl Req Func Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totcumpl_req_func_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="49" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totcumpl_req_func" fieldSource="totcumpl_req_func" wizardCaption="Totcumpl Req Func" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totcumpl_req_func">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="53" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totcalidad_prod_term_sat" fieldSource="totcalidad_prod_term_sat" wizardCaption="Totcalidad Prod Term Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totcalidad_prod_term_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="57" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totcalidad_prod_term" fieldSource="totcalidad_prod_term" wizardCaption="Totcalidad Prod Term" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totcalidad_prod_term">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="61" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totretr_entregable_sat" fieldSource="totretr_entregable_sat" wizardCaption="Totretr Entregable Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totretr_entregable_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="65" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totretr_entregable" fieldSource="totretr_entregable" wizardCaption="Totretr Entregable" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totretr_entregable">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="69" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totcal_cod_sat" fieldSource="totcal_cod_sat" wizardCaption="Totcal Cod Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totcal_cod_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="73" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totcal_cod" fieldSource="totcal_cod" wizardCaption="Totcal Cod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totcal_cod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="77" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totdef_fug_amb_prod_sat" fieldSource="totdef_fug_amb_prod_sat" wizardCaption="Totdef Fug Amb Prod Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totdef_fug_amb_prod_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="81" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totdef_fug_amb_prod" fieldSource="totdef_fug_amb_prod" wizardCaption="Totdef Fug Amb Prod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totdef_fug_amb_prod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="85" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totinc_tiempoasignacion_sat" fieldSource="totinc_tiempoasignacion_sat" wizardCaption="Totinc Tiempoasignacion Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totinc_tiempoasignacion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="89" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totinc_tiempoasignacion" fieldSource="totinc_tiempoasignacion" wizardCaption="Totinc Tiempoasignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totinc_tiempoasignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="93" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totinc_tiemposolucion_sat" fieldSource="totinc_tiemposolucion_sat" wizardCaption="Totinc Tiemposolucion Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totinc_tiemposolucion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="97" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totinc_tiemposolucion" fieldSource="totinc_tiemposolucion" wizardCaption="Totinc Tiemposolucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totinc_tiemposolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="101" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplenefic_presup_sat" fieldSource="cumplenefic_presup_sat" wizardCaption="Cumplenefic Presup Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplenefic_presup_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="105" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplenefic_presup" fieldSource="cumplenefic_presup" wizardCaption="Cumplenefic Presup" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplenefic_presup">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="30" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplenherr_est_cost_sat" fieldSource="cumplenherr_est_cost_sat" wizardCaption="Cumplenherr Est Cost Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplenherr_est_cost_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="herr_est_cost_sat" fieldSource="herr_est_cost_sat" wizardCaption="Herr Est Cost Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2herr_est_cost_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="32" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_herr_est_cost_sat" fieldSource="meta_herr_est_cost_sat" wizardCaption="Meta Herr Est Cost Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_herr_est_cost_sat" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="34" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplenherr_est_cost" fieldSource="cumplenherr_est_cost" wizardCaption="Cumplenherr Est Cost" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplenherr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="herr_est_cost" fieldSource="herr_est_cost" wizardCaption="Herr Est Cost" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2herr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="36" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_herr_est_cost" fieldSource="meta_herr_est_cost" wizardCaption="Meta Herr Est Cost" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_herr_est_cost" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="38" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplenreq_serv_sat" fieldSource="cumplenreq_serv_sat" wizardCaption="Cumplenreq Serv Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplenreq_serv_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="39" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="req_serv_sat" fieldSource="req_serv_sat" wizardCaption="Req Serv Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2req_serv_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="40" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_req_serv_sat" fieldSource="meta_req_serv_sat" wizardCaption="Meta Req Serv Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_req_serv_sat" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="42" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplenreq_serv" fieldSource="cumplenreq_serv" wizardCaption="Cumplenreq Serv" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplenreq_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="req_serv" fieldSource="req_serv" wizardCaption="Req Serv" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2req_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="44" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_req_serv" fieldSource="meta_req_serv" wizardCaption="Meta Req Serv" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_req_serv" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="46" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplencumpl_req_func_sat" fieldSource="cumplencumpl_req_func_sat" wizardCaption="Cumplencumpl Req Func Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplencumpl_req_func_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="cumpl_req_func_sat" fieldSource="cumpl_req_func_sat" wizardCaption="Cumpl Req Func Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2cumpl_req_func_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="48" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_cumpl_req_func_sat" fieldSource="meta_cumpl_req_func_sat" wizardCaption="Meta Cumpl Req Func Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_cumpl_req_func_sat" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="50" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplencumpl_req_func" fieldSource="cumplencumpl_req_func" wizardCaption="Cumplencumpl Req Func" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplencumpl_req_func">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="51" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="cumpl_req_func" fieldSource="cumpl_req_func" wizardCaption="Cumpl Req Func" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2cumpl_req_func">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="52" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_cumpl_req_func" fieldSource="meta_cumpl_req_func" wizardCaption="Meta Cumpl Req Func" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_cumpl_req_func" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="54" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplencalidad_prod_term_sat" fieldSource="cumplencalidad_prod_term_sat" wizardCaption="Cumplencalidad Prod Term Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplencalidad_prod_term_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="55" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="calidad_prod_term_sat" fieldSource="calidad_prod_term_sat" wizardCaption="Calidad Prod Term Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2calidad_prod_term_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="56" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_calidad_prod_term_sat" fieldSource="meta_calidad_prod_term_sat" wizardCaption="Meta Calidad Prod Term Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_calidad_prod_term_sat" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="58" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplencalidad_prod_term" fieldSource="cumplencalidad_prod_term" wizardCaption="Cumplencalidad Prod Term" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplencalidad_prod_term">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="59" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="calidad_prod_term" fieldSource="calidad_prod_term" wizardCaption="Calidad Prod Term" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2calidad_prod_term">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="60" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_calidad_prod_term" fieldSource="meta_calidad_prod_term" wizardCaption="Meta Calidad Prod Term" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_calidad_prod_term" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="62" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplenretr_entregable_sat" fieldSource="cumplenretr_entregable_sat" wizardCaption="Cumplenretr Entregable Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplenretr_entregable_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="63" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="retr_entregable_sat" fieldSource="retr_entregable_sat" wizardCaption="Retr Entregable Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2retr_entregable_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="64" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_retr_entregable_sat" fieldSource="meta_retr_entregable_sat" wizardCaption="Meta Retr Entregable Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_retr_entregable_sat" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="66" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplenretr_entregable" fieldSource="cumplenretr_entregable" wizardCaption="Cumplenretr Entregable" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplenretr_entregable">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="67" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="retr_entregable" fieldSource="retr_entregable" wizardCaption="Retr Entregable" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2retr_entregable">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="68" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_retr_entregable" fieldSource="meta_retr_entregable" wizardCaption="Meta Retr Entregable" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_retr_entregable" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="70" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplencal_cod_sat" fieldSource="cumplencal_cod_sat" wizardCaption="Cumplencal Cod Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplencal_cod_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="71" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="cal_cod_sat" fieldSource="cal_cod_sat" wizardCaption="Cal Cod Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2cal_cod_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="72" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_cal_cod_sat" fieldSource="meta_cal_cod_sat" wizardCaption="Meta Cal Cod Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_cal_cod_sat" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="74" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplencal_cod" fieldSource="cumplencal_cod" wizardCaption="Cumplencal Cod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplencal_cod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="75" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="cal_cod" fieldSource="cal_cod" wizardCaption="Cal Cod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2cal_cod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="76" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_cal_cod" fieldSource="meta_cal_cod" wizardCaption="Meta Cal Cod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_cal_cod" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="78" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplendef_fug_amb_prod_sat" fieldSource="cumplendef_fug_amb_prod_sat" wizardCaption="Cumplendef Fug Amb Prod Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplendef_fug_amb_prod_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="79" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="def_fug_amb_prod_sat" fieldSource="def_fug_amb_prod_sat" wizardCaption="Def Fug Amb Prod Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2def_fug_amb_prod_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="80" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_def_fug_amb_prod_sat" fieldSource="meta_def_fug_amb_prod_sat" wizardCaption="Meta Def Fug Amb Prod Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_def_fug_amb_prod_sat" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="82" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumplendef_fug_amb_prod" fieldSource="cumplendef_fug_amb_prod" wizardCaption="Cumplendef Fug Amb Prod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumplendef_fug_amb_prod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="83" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="def_fug_amb_prod" fieldSource="def_fug_amb_prod" wizardCaption="Def Fug Amb Prod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2def_fug_amb_prod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="84" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_def_fug_amb_prod" fieldSource="meta_def_fug_amb_prod" wizardCaption="Meta Def Fug Amb Prod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_def_fug_amb_prod" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="86" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumpleninc_tiempoasignacion_sat" fieldSource="cumpleninc_tiempoasignacion_sat" wizardCaption="Cumpleninc Tiempoasignacion Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumpleninc_tiempoasignacion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="87" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="inc_tiempoasignacion_sat" fieldSource="inc_tiempoasignacion_sat" wizardCaption="Inc Tiempoasignacion Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2inc_tiempoasignacion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="88" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_inc_tiempoasignacion_sat" fieldSource="meta_inc_tiempoasignacion_sat" wizardCaption="Meta Inc Tiempoasignacion Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_inc_tiempoasignacion_sat" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="90" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumpleninc_tiempoasignacion" fieldSource="cumpleninc_tiempoasignacion" wizardCaption="Cumpleninc Tiempoasignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumpleninc_tiempoasignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="91" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="inc_tiempoasignacion" fieldSource="inc_tiempoasignacion" wizardCaption="Inc Tiempoasignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2inc_tiempoasignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="94" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumpleninc_tiemposolucion_sat" fieldSource="cumpleninc_tiemposolucion_sat" wizardCaption="Cumpleninc Tiemposolucion Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumpleninc_tiemposolucion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="95" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="inc_tiemposolucion_sat" fieldSource="inc_tiemposolucion_sat" wizardCaption="Inc Tiemposolucion Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2inc_tiemposolucion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="96" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_inc_tiemposolucion_sat" fieldSource="meta_inc_tiemposolucion_sat" wizardCaption="Meta Inc Tiemposolucion Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_inc_tiemposolucion_sat" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="98" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumpleninc_tiemposolucion" fieldSource="cumpleninc_tiemposolucion" wizardCaption="Cumpleninc Tiemposolucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2cumpleninc_tiemposolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="99" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="inc_tiemposolucion" fieldSource="inc_tiemposolucion" wizardCaption="Inc Tiemposolucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2inc_tiemposolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="102" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totefic_presup_sat" fieldSource="totefic_presup_sat" wizardCaption="Totefic Presup Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totefic_presup_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="103" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="efic_presup_sat" fieldSource="efic_presup_sat" wizardCaption="Efic Presup Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2efic_presup_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="104" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_efic_presup_sat" fieldSource="meta_efic_presup_sat" wizardCaption="Meta Efic Presup Sat" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_efic_presup_sat" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="106" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="totefic_presup" fieldSource="totefic_presup" wizardCaption="Totefic Presup" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2totefic_presup">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="107" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="efic_presup" fieldSource="efic_presup" wizardCaption="Efic Presup" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2efic_presup">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="108" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_efic_presup" fieldSource="meta_efic_presup" wizardCaption="Meta Efic Presup" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_efic_presup" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Image id="111" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgherr_est_cost_sat" PathID="Grid2imgherr_est_cost_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="112" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgherr_est_cost" PathID="Grid2imgherr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="113" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgreq_serv_sat" PathID="Grid2imgreq_serv_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="114" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgreq_serv" PathID="Grid2imgreq_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcumpl_req_func_sat" PathID="Grid2imgcumpl_req_func_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="116" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcumpl_req_func" PathID="Grid2imgcumpl_req_func">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcalidad_prod_term_sat" PathID="Grid2imgcalidad_prod_term_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcalidad_prod_term" PathID="Grid2imgcalidad_prod_term">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgretr_entregable_sat" PathID="Grid2imgretr_entregable_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="120" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgretr_entregable" PathID="Grid2imgretr_entregable">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcal_cod_sat" PathID="Grid2imgcal_cod_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="122" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcal_cod" PathID="Grid2imgcal_cod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgdef_fug_amb_prod_sat" PathID="Grid2imgdef_fug_amb_prod_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="124" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgdef_fug_amb_prod" PathID="Grid2imgdef_fug_amb_prod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imginc_tiempoasignacion_sat" PathID="Grid2imginc_tiempoasignacion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="126" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imginc_tiempoasignacion" PathID="Grid2imginc_tiempoasignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imginc_tiemposolucion_sat" PathID="Grid2imginc_tiemposolucion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imginc_tiemposolucion" PathID="Grid2imginc_tiemposolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgefic_presup_sat" PathID="Grid2imgefic_presup_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>

				</Image>
				<Image id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgefic_presup" PathID="Grid2imgefic_presup">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Hidden id="100" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_inc_tiempoasignacion" fieldSource="meta_inc_tiempoasignacion" wizardCaption="Meta Inc Tiempoasignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_inc_tiempoasignacion" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="92" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="meta_inc_tiemposolucion" fieldSource="meta_inc_tiemposolucion" wizardCaption="Meta Inc Tiemposolucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2meta_inc_tiemposolucion" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="110"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="153"/>
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
				<SQLParameter id="150" dataType="Text" designDefaultValue="'SLA'" parameterSource="s_opt_slas" parameterType="URL" variable="s_opt_slas"/>
				<SQLParameter id="151" dataType="Text" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="152" dataType="Text" designDefaultValue="31" parameterSource="s_id_periodo" parameterType="URL" variable="s_id_periodo"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="9" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="Grid1" connection="cnDisenio" dataSource="SELECT sat.Medicion Medicion_sat,sat.Total Total_sat,capc.Total Total_capc 
FROM resumen_SAT sat LEFT JOIN resumen_CAPC capc ON sat.Medicion=capc.Medicion 
WHERE sat.id_proveedor = {s_id_proveedor} 
AND sat.id_periodo = {s_id_periodo}
AND sat.tipo_nivel_servicio = '{s_opt_slas}' 
AND sat.id_periodo = capc.id_periodo 
AND sat.id_proveedor = capc.id_proveedor 
AND sat.tipo_nivel_servicio = capc.tipo_nivel_servicio
AND sat.fecha_visible&lt;=getDATE()" pageSizeLimit="100" PathID="Grid1">
			<Components>
				<Sorter id="13" visible="True" name="Sorter_Medicion_sat" column="Medicion_sat" PathID="Grid1Sorter_Medicion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_Total_sat" column="Total_sat" PathID="Grid1Sorter_Total_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_Total_capc" column="Total_capc" PathID="Grid1Sorter_Total_capc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Medicion_sat" fieldSource="Medicion_sat" PathID="Grid1Medicion_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Total_sat" fieldSource="Total_sat" PathID="Grid1Total_sat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="18" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Total_capc" fieldSource="Total_capc" PathID="Grid1Total_capc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="19" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
<Event name="AfterExecuteSelect" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="154"/>
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
				<SQLParameter id="142" dataType="Integer" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="143" dataType="Integer" defaultValue="31" designDefaultValue="31" parameterSource="s_id_periodo" parameterType="URL" variable="s_id_periodo"/>
				<SQLParameter id="144" dataType="Text" defaultValue="'SLA'" designDefaultValue="'SLA'" parameterSource="s_opt_slas" parameterType="URL" variable="s_opt_slas"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="comparativo_resumen.php" forShow="True" url="comparativo_resumen.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="comparativo_resumen_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
