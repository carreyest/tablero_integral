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
						<SQLParameter id="166" dataType="Text" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
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
				<Link id="160" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="periodos_cargaLink2" hrefSource="comparativo_inc.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Incidentes','textSourceDB':'','hrefSource':'comparativo_inc.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="161" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="periodos_cargaLink3" hrefSource="comparativo_ra.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Apertura','textSourceDB':'','hrefSource':'comparativo_ra.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="162" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="periodos_cargaLink4" hrefSource="comparativo_rc.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Cierre','textSourceDB':'','hrefSource':'comparativo_rc.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="170" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Label1" PathID="periodos_cargaLabel1">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="171"/>
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
SELECT datossat.*,'REGISTRO CDS' estado_comparativo from (
SELECT a.id_incidencia, a.servicio_de_negocio , a.severidad, a.Cumple_Inc_TiempoAsignacion, a.Cumple_Inc_TiempoSolucion, a.Obs_Proceso, a.id_periodo,a.id_proveedor  , a.nombre_del_producto
FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a
WHERE a.id_proveedor = {s_id_proveedor}
AND a.id_periodo = {s_id_periodo}
AND a.tipo_nivel_servicio = '{s_opt_slas}' 
AND a.estatus='F'
and  a.num_carga=(
SELECT max(b.num_carga)
FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b
WHERE b.id_proveedor = {s_id_proveedor}
AND b.id_periodo = {s_id_periodo}
AND b.tipo_nivel_servicio = '{s_opt_slas}' 
AND b.estatus='F'
)
) datossat
INNER JOIN (select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales, mc.MesReporte , mc.AnioReporte , {s_id_periodo} id_periodo,
				mc.id_proveedor,mci.Aplicacion nombre_del_producto
				from mc_calificacion_incidentes_MC mc
				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio
				LEFT JOIN    mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente
				LEFT JOIN    mc_c_servicio serv ON serv.id_servicio = mc.id_servicio 
				where (mc.id_proveedor = {s_id_proveedor} or 0={s_id_proveedor})  
				and pc.id_periodo = {s_id_periodo} 
				and mc.Id_incidente in (select numero from (
														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'
														) as uno
														where uno.tipo_nivel_servicio='{s_opt_slas}'
										) 

) datoscapc ON datossat.id_incidencia=datoscapc.id_incidencia
AND (
--        datossat.servicio_de_negocio!=datoscapc.servicio_de_negocio 
--	 OR datossat.nombre_del_producto!=datoscds.nombre_del_producto
--	 OR datossat.severidad!= datoscapc.severidad
--	 OR 
	 datossat.Cumple_Inc_TiempoAsignacion!= datoscapc.Cumple_Inc_TiempoAsignacion
	 OR datossat.Cumple_Inc_TiempoSolucion != datoscapc.Cumple_Inc_TiempoSolucion)	 


UNION

SELECT datoscapc.*,'REGISTRO CAPC' estado_comparativo from (

select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales, {s_id_periodo} id_periodo,mc.id_proveedor ,mci.Aplicacion nombre_del_producto
				from mc_calificacion_incidentes_MC mc
				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio
				LEFT JOIN mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente
				LEFT JOIN  mc_c_servicio serv ON serv.id_servicio = mc.id_servicio 
				where (mc.id_proveedor = {s_id_proveedor} or 0={s_id_proveedor})  
				and pc.id_periodo = {s_id_periodo} 
				and mc.Id_incidente in (select numero from (
														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'
														) as uno
														where uno.tipo_nivel_servicio='{s_opt_slas}'
										) 
) datoscapc
INNER JOIN (
SELECT a.* 
FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a
WHERE a.id_proveedor = {s_id_proveedor}
AND a.id_periodo = {s_id_periodo}
AND a.tipo_nivel_servicio = '{s_opt_slas}' 
AND a.estatus='F'
and  a.num_carga=(
SELECT max(b.num_carga)
FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b
WHERE b.id_proveedor = {s_id_proveedor}
AND b.id_periodo = {s_id_periodo}
AND b.tipo_nivel_servicio = '{s_opt_slas}' 
AND b.estatus='F'
)
 )
datossat ON datossat.id_incidencia=datoscapc.id_incidencia
AND (
--datossat.servicio_de_negocio!=datoscapc.servicio_de_negocio 
--	 OR datossat.nombre_del_producto!=datoscds.nombre_del_producto
--	 OR datossat.severidad!= datoscapc.severidad
--	 OR 
	 datossat.Cumple_Inc_TiempoAsignacion!= datoscapc.Cumple_Inc_TiempoAsignacion
	 OR datossat.Cumple_Inc_TiempoSolucion != datoscapc.Cumple_Inc_TiempoSolucion)	 

UNION
select *,'REG. CDS QUE NO CARGO CAPC' estado_comparativo  from (
SELECT a.id_incidencia, a.servicio_de_negocio , a.severidad, a.Cumple_Inc_TiempoAsignacion, a.Cumple_Inc_TiempoSolucion, a.Obs_Proceso, a.id_periodo,a.id_proveedor , a.nombre_del_producto 
FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a
WHERE a.id_proveedor = {s_id_proveedor}
AND a.id_periodo = {s_id_periodo}
AND a.tipo_nivel_servicio = ' {s_opt_slas}' 
AND a.estatus='F'
and  a.num_carga=(
SELECT max(b.num_carga)
FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b
WHERE b.id_proveedor = {s_id_proveedor}
AND b.id_periodo = {s_id_periodo}
AND b.tipo_nivel_servicio = '{s_opt_slas}' 
AND b.estatus='F')
) uno
 WHERE NOT EXISTS (
select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales, mc.MesReporte , mc.AnioReporte , {s_id_periodo} id_periodo,
				mc.id_proveedor, mci.Aplicacion nombre_del_producto
				from mc_calificacion_incidentes_MC mc
				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio
				LEFT JOIN mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente
				LEFT JOIN  mc_c_servicio serv ON serv.id_servicio = mc.id_servicio 
				where (mc.id_proveedor = {s_id_proveedor} or 0={s_id_proveedor})  
				and pc.id_periodo = {s_id_periodo} 
				and mc.Id_incidente in (select numero from (
														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'
														) as uno
														where uno.tipo_nivel_servicio='{s_opt_slas}'
										) 
				AND mc.id_incidente=uno.id_incidencia 

)
UNION
select *,'REG. CAPC QUE NO CARGO CDS' estado_comparativo  from (
select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales,  {s_id_periodo} id_periodo,
				mc.id_proveedor, mci.Aplicacion nombre_del_producto
				from mc_calificacion_incidentes_MC mc
				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio
				LEFT JOIN mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente
				LEFT JOIN  mc_c_servicio serv ON serv.id_servicio = mc.id_servicio 
				where (mc.id_proveedor = {s_id_proveedor} or 0={s_id_proveedor})  
				and pc.id_periodo = {s_id_periodo} 
				and mc.Id_incidente in (select numero from (
														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'
														) as uno
														where uno.tipo_nivel_servicio='{s_opt_slas}'
										) 

) uno
 WHERE NOT EXISTS (
SELECT a.id_incidencia, a.servicio_de_negocio , a.severidad, a.Cumple_Inc_TiempoAsignacion, a.Cumple_Inc_TiempoSolucion, a.Obs_Proceso, a.id_periodo,a.id_proveedor , a.nombre_del_producto
FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a
WHERE a.id_proveedor = {s_id_proveedor}
AND a.id_periodo = {s_id_periodo}
AND a.tipo_nivel_servicio = '{s_opt_slas}' 
AND a.estatus='F'
and  a.num_carga=(
SELECT max(b.num_carga)
FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b
WHERE b.id_proveedor = {s_id_proveedor}
AND b.id_periodo = {s_id_periodo}
AND b.tipo_nivel_servicio = '{s_opt_slas}' 
AND b.estatus='F')
AND a.id_incidencia=uno.id_incidencia
)
 
) as total order by id_incidencia
" pageSizeLimit="100" pageSize="True" wizardCaption="Comparativo Incidencias" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="Grid1">
			<Components>
				<Sorter id="139" visible="True" name="Sorter_estado_comparativo" column="estado_comparativo" wizardCaption="Estado Comparativo" wizardSortingType="SimpleDir" wizardControl="estado_comparativo" wizardAddNbsp="False" PathID="Grid1Sorter_estado_comparativo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="140" visible="True" name="Sorter_id_incidencia" column="id_incidencia" wizardCaption="Id Incidencia" wizardSortingType="SimpleDir" wizardControl="id_incidencia" wizardAddNbsp="False" PathID="Grid1Sorter_id_incidencia">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="141" visible="True" name="Sorter_servicio_de_negocio" column="servicio_de_negocio" wizardCaption="Servicio De Negocio" wizardSortingType="SimpleDir" wizardControl="servicio_de_negocio" wizardAddNbsp="False" PathID="Grid1Sorter_servicio_de_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="142" visible="True" name="Sorter_severidad" column="severidad" wizardCaption="Severidad" wizardSortingType="SimpleDir" wizardControl="severidad" wizardAddNbsp="False" PathID="Grid1Sorter_severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="143" visible="True" name="Sorter_nombre_del_producto" column="nombre_del_producto" wizardCaption="Nombre Del Producto" wizardSortingType="SimpleDir" wizardControl="nombre_del_producto" wizardAddNbsp="False" PathID="Grid1Sorter_nombre_del_producto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="144" visible="True" name="Sorter_Cumple_Inc_TiempoAsignacion" column="Cumple_Inc_TiempoAsignacion" wizardCaption="Cumple Inc Tiempo Asignacion" wizardSortingType="SimpleDir" wizardControl="Cumple_Inc_TiempoAsignacion" wizardAddNbsp="False" PathID="Grid1Sorter_Cumple_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="145" visible="True" name="Sorter_Cumple_Inc_TiempoSolucion" column="Cumple_Inc_TiempoSolucion" wizardCaption="Cumple Inc Tiempo Solucion" wizardSortingType="SimpleDir" wizardControl="Cumple_Inc_TiempoSolucion" wizardAddNbsp="False" PathID="Grid1Sorter_Cumple_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="146" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="estado_comparativo" fieldSource="estado_comparativo" wizardCaption="Estado Comparativo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1estado_comparativo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="147" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="id_incidencia" fieldSource="id_incidencia" wizardCaption="Id Incidencia" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1id_incidencia">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="148" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_de_negocio" fieldSource="servicio_de_negocio" wizardCaption="Servicio De Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1servicio_de_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="149" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="severidad" fieldSource="severidad" wizardCaption="Severidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="150" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre_del_producto" fieldSource="nombre_del_producto" wizardCaption="Nombre Del Producto" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1nombre_del_producto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="151" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Cumple_Inc_TiempoAsignacion" fieldSource="Cumple_Inc_TiempoAsignacion" wizardCaption="Cumple Inc Tiempo Asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1Cumple_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="152" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Cumple_Inc_TiempoSolucion" fieldSource="Cumple_Inc_TiempoSolucion" wizardCaption="Cumple Inc Tiempo Solucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1Cumple_Inc_TiempoSolucion">
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
				<Image id="154" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ImgCumple_Inc_TiempoSolucion" PathID="Grid1ImgCumple_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="155" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ImgCumple_Inc_TiempoAsignacion" PathID="Grid1ImgCumple_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="156"/>
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
				<SQLParameter id="167" dataType="Text" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="168" dataType="Text" defaultValue="31" designDefaultValue="31" parameterSource="s_id_periodo" parameterType="URL" variable="s_id_periodo"/>
				<SQLParameter id="169" dataType="Text" defaultValue="'SLA'" designDefaultValue="'SLA'" parameterSource="s_opt_slas" parameterType="URL" variable="s_opt_slas"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="comparativo_inc.php" forShow="True" url="comparativo_inc.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="comparativo_inc_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
