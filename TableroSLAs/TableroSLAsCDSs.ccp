<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="55" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Grid2" searchIds="55" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_universo_cds" wizardCaption="Especificar Datos" changedCaptionSearch="True" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="True" wizardResultsForm="Grid1" returnPage="TableroSLAsCDSs.ccp" PathID="Grid2">
			<Components>
				<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="Grid2Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="60" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" PathID="Grid2s_id_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="276" posHeight="180" posLeft="10" posTop="10" posWidth="158" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="277" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="278" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="61" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_MesReporte" fieldSource="mes" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mes" caption="Mes" required="False" unique="False" PathID="Grid2s_MesReporte" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="211" tableName="mc_c_mes"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="62" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_AnioReporte" fieldSource="anio" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Anio" caption="Anio" required="False" unique="False" PathID="Grid2s_AnioReporte" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="310" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Ano" logicOperator="And" parameterSource="0" parameterType="Expression" searchConditionType="GreaterThan"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="313" tableName="mc_c_anio"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="311" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="312" dataType="Integer" fieldName="Ano" tableName="mc_c_anio"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="100"/>
					</Actions>
				</Event>
			</Events>
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
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="grdTableroSLAs" connection="cnDisenio" dataSource="select sc.IdOld, sc.orden,	sc.descripcion, mc.*
 from mc_c_ServContractual sc left join (
select  
	 COUNT(HERR_EST_COST) TotHERR_EST_COST, SUM(cast(HERR_EST_COST as int)) CumplenHERR_EST_COST, SUM(cast(HERR_EST_COST as float))/COUNT(HERR_EST_COST)*100 HERR_EST_COST,
	 (Select Meta from mc_c_metrica where acronimo='HERR_EST_COST') as Meta_HERR_EST_COST,
	 COUNT(REQ_SERV) TotREQ_SERV, SUM(cast(REQ_SERV as int)) CumplenREQ_SERV, SUM(cast(REQ_SERV as float))/COUNT(REQ_SERV)*100 REQ_SERV,
	 (Select Meta from mc_c_metrica where acronimo='REQ_SERV') as Meta_REQ_SERV,
	 COUNT(CUMPL_REQ_FUNC) TotCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as int)) CumplenCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as float))/COUNT(CUMPL_REQ_FUNC)*100 CUMPL_REQ_FUNC,
	 (Select Meta from mc_c_metrica where acronimo='CUMPL_REQ_FUNC') as Meta_CUMPL_REQ_FUNC,
	 COUNT(CALIDAD_PROD_TERM) TotCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as int)) CumplenCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as float))/COUNT(CALIDAD_PROD_TERM)*100 CALIDAD_PROD_TERM,
	 (Select Meta from mc_c_metrica where acronimo='CALIDAD_PROD_TERM') as Meta_CALIDAD_PROD_TERM,
	 COUNT(RETR_ENTREGABLE) TotRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as int)) CumplenRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as float))/COUNT(RETR_ENTREGABLE)*100 RETR_ENTREGABLE,
	 (Select Meta from mc_c_metrica where acronimo='RETR_ENTREGABLE') as Meta_RETR_ENTREGABLE,
	 COUNT(COMPL_RUTA_CRITICA) TotCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as int)) CumplenCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as float))/COUNT(COMPL_RUTA_CRITICA)*100 COMPL_RUTA_CRITICA,
	 (Select Meta from mc_c_metrica where acronimo='COMPL_RUTA_CRITICA') as Meta_COMPL_RUTA_CRITICA,
	 COUNT(CAL_COD) TotCAL_COD, SUM(cast(CAL_COD as int)) CumplenCAL_COD, SUM(cast(CAL_COD as float))/COUNT(CAL_COD)*100 CAL_COD,
	 (Select Meta from mc_c_metrica where acronimo='EST_PROY') as Meta_EST_PROY,
	 COUNT(DEF_FUG_AMB_PROD) TotDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as int)) CumplenDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as float))/COUNT(DEF_FUG_AMB_PROD)*100  DEF_FUG_AMB_PROD,
	 (Select Meta from mc_c_metrica where acronimo='DEF_FUG_AMB_PROD') as Meta_DEF_FUG_AMB_PROD,
	 COUNT(Cumple_Inc_TiempoAsignacion) TotTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as int)) CumplenTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as float))/COUNT(Cumple_Inc_TiempoAsignacion)*100 Inc_TiempoAsignacion,
	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoSolucion') as Meta_Inc_TiempoSolucion,
	 COUNT(Cumple_Inc_TiempoSolucion) TotTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as int)) CumplenTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as float))/COUNT(Cumple_Inc_TiempoSolucion)*100 Inc_TiempoSolucion,
	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoAsignacion') as Meta_Inc_TiempoAsignacion,
	 COUNT(Cumple_DISP_SOPORTE) TotCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as int)) CumplenCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as float))/COUNT(Cumple_DISP_SOPORTE)*100 DISP_SOPORTE,
	(Select Meta from mc_c_metrica where acronimo='DISP_SOPORTE') as Meta_DISP_SOPORTE,
	AVG(Cumple_EF) Cumple_EF, AVG(total_ef) Total_ef, avg(cast(Cumple_EF as float))/avg(total_ef)*100  EFIC_PRESUP,
	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as Meta_EFIC_PRESUP,
	 sc.Id   id_servicio_cont 
from mc_c_ServContractual sc left join mc_calificacion_rs_MC m on sc.Id = m.id_servicio_cont 
and m.id_ppmc not in (select numero from mc_universo_cds where SLO=1  )
and m.IdUniverso not in (select id from mc_universo_cds where revision=2  )
	 left join	(select Cumple_DISP_SOPORTE, Cumple_Inc_TiempoAsignacion, Cumple_Inc_TiempoSolucion, MesReporte , AnioReporte ,  
				id_proveedor, 5 IdServicioCont 
				from mc_calificacion_incidentes_MC
				where (id_proveedor = {sProveedor} or 0={sProveedor})  and MesReporte={sMes} and AnioReporte ={sAnio}
				)  mi on  mi.IdServicioCont= sc.Id 
left join  (select SUM(CumpleSLA) Cumple_EF, COUNT(CumpleSLA) Total_EF, Id_Proveedor, MesReporte , anioreporte , 2 IdServicioCont  
			from mc_eficiencia_presupuestal  where CumpleSLA in (1,0)  
			and (([GrupoAplicativos] not like 'Todos%' and (4&lt;&gt;4 or (MesReporte&gt;2 and anioreporte &gt;2013)) ) 
					or (4=4 and MesReporte&lt;=2 and anioreporte &lt;2014 ) or 0=4)
			group by Id_Proveedor, MesReporte , anioreporte  ) ef 
			on ef.Id_Proveedor  = m.id_proveedor  and m.MesReporte  = ef.MesReporte and m.AnioReporte  = ef.anioreporte  
				and ef.IdServicioCont= sc.Id 
where (m.mesreporte = {sMes} or mi.MesReporte = {sMes}) 
			and (m.anioreporte = {sAnio}  or mi.AnioReporte = {sAnio}) 
			and (m.id_proveedor = {sProveedor} or mi.id_proveedor = {sProveedor} or  {sProveedor}=0)
group by sc.id
) as mc on sc.id = mc.id_servicio_cont 
where sc.Aplica ='CDS'
order by sc.orden" pageSizeLimit="100" pageSize="True" wizardCaption="Niveles de Servicio" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="grdTableroSLAs" wizardAllowSorting="True">
			<Components>
				<Sorter id="12" visible="True" name="Sorter_TotCUMPL_REQ_FUNC" column="TotCUMPL_REQ_FUNC" wizardCaption="Tot CUMPL REQ FUNC" wizardSortingType="SimpleDir" wizardControl="TotCUMPL_REQ_FUNC" wizardAddNbsp="False" PathID="grdTableroSLAsSorter_TotCUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_TotCALIDAD_PROD_TERM" column="TotCALIDAD_PROD_TERM" wizardCaption="Tot CALIDAD PROD TERM" wizardSortingType="SimpleDir" wizardControl="TotCALIDAD_PROD_TERM" wizardAddNbsp="False" PathID="grdTableroSLAsSorter_TotCALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_TotRETR_ENTREGABLE" column="TotRETR_ENTREGABLE" wizardCaption="Tot RETR ENTREGABLE" wizardSortingType="SimpleDir" wizardControl="TotRETR_ENTREGABLE" wizardAddNbsp="False" PathID="grdTableroSLAsSorter_TotRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="20" visible="True" name="Sorter_TotCAL_COD" column="TotCAL_COD" wizardCaption="Tot EST PROY" wizardSortingType="SimpleDir" wizardControl="TotEST_PROY" wizardAddNbsp="False" PathID="grdTableroSLAsSorter_TotCAL_COD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="22" visible="True" name="Sorter_TotDEF_FUG_AMB_PROD" column="TotDEF_FUG_AMB_PROD" wizardCaption="Tot DEF FUG AMB PROD" wizardSortingType="SimpleDir" wizardControl="TotDEF_FUG_AMB_PROD" wizardAddNbsp="False" PathID="grdTableroSLAsSorter_TotDEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="24" visible="True" name="Sorter_TotTiempoAsignacion" column="TotTiempoAsignacion" wizardCaption="Tot Tiempo Asignacion" wizardSortingType="SimpleDir" wizardControl="TotTiempoAsignacion" wizardAddNbsp="False" PathID="grdTableroSLAsSorter_TotTiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="26" visible="True" name="Sorter_TotTiempoSolucion" column="TotTiempoSolucion" wizardCaption="Tot Tiempo Solucion" wizardSortingType="SimpleDir" wizardControl="TotTiempoSolucion" wizardAddNbsp="False" PathID="grdTableroSLAsSorter_TotTiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripcion" fieldSource="descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdTableroSLAsdescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotREQ_SERV" fieldSource="TotREQ_SERV" wizardCaption="Tot REQ SERV" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsTotREQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCUMPL_REQ_FUNC" fieldSource="TotCUMPL_REQ_FUNC" wizardCaption="Tot CUMPL REQ FUNC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsTotCUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCALIDAD_PROD_TERM" fieldSource="TotCALIDAD_PROD_TERM" wizardCaption="Tot CALIDAD PROD TERM" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsTotCALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="39" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotRETR_ENTREGABLE" fieldSource="TotRETR_ENTREGABLE" wizardCaption="Tot RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsTotRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCAL_COD" fieldSource="TotCAL_COD" wizardCaption="Tot EST PROY" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsTotCAL_COD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="45" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotDEF_FUG_AMB_PROD" fieldSource="TotDEF_FUG_AMB_PROD" wizardCaption="Tot DEF FUG AMB PROD" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsTotDEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotInc_TiempoAsignacion" fieldSource="TotTiempoAsignacion" wizardCaption="Tot Tiempo Asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsTotInc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="49" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotInc_TiempoSolucion" fieldSource="TotTiempoSolucion" wizardCaption="Tot Tiempo Solucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsTotInc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="53" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Sorter id="10" visible="True" name="Sorter_TotREQ_SERV" column="TotREQ_SERV" PathID="grdTableroSLAsSorter_TotREQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_TotHERR_EST_COST" column="TotHERR_EST_COST" PathID="grdTableroSLAsSorter_TotHERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="34" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenREQ_SERV" fieldSource="CumplenREQ_SERV" wizardCaption="Cumplen REQ SERV" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsCumplenREQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="36" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCUMPL_REQ_FUNC" fieldSource="CumplenCUMPL_REQ_FUNC" wizardCaption="Cumplen CUMPL REQ FUNC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsCumplenCUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="38" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCALIDAD_PROD_TERM" fieldSource="CumplenCALIDAD_PROD_TERM" wizardCaption="Cumplen CALIDAD PROD TERM" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsCumplenCALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="40" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenRETR_ENTREGABLE" fieldSource="CumplenRETR_ENTREGABLE" wizardCaption="Cumplen RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsCumplenRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCAL_COD" fieldSource="CumplenCAL_COD" wizardCaption="Cumplen EST PROY" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsCumplenCAL_COD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="46" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenDEF_FUG_AMB_PROD" fieldSource="CumplenDEF_FUG_AMB_PROD" wizardCaption="Cumplen DEF FUG AMB PROD" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsCumplenDEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="48" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenInc_TiempoAsignacion" fieldSource="CumplenTiempoAsignacion" wizardCaption="Cumplen Tiempo Asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsCumplenInc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="50" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenInc_TiempoSolucion" fieldSource="CumplenTiempoSolucion" wizardCaption="Cumplen Tiempo Solucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdTableroSLAsCumplenInc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="67" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="HERR_EST_COST" PathID="grdTableroSLAsHERR_EST_COST" fieldSource="HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="68" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="REQ_SERV" PathID="grdTableroSLAsREQ_SERV" fieldSource="REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="69" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CUMPL_REQ_FUNC" PathID="grdTableroSLAsCUMPL_REQ_FUNC" fieldSource="CUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="70" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CALIDAD_PROD_TERM" PathID="grdTableroSLAsCALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="71" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="RETR_ENTREGABLE" PathID="grdTableroSLAsRETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="73" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CAL_COD" PathID="grdTableroSLAsCAL_COD" fieldSource="CAL_COD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="74" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="DEF_FUG_AMB_PROD" PathID="grdTableroSLAsDEF_FUG_AMB_PROD" fieldSource="DEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="75" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Inc_TiempoAsignacion" PathID="grdTableroSLAsInc_TiempoAsignacion" fieldSource="Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="76" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Inc_TiempoSolucion" PathID="grdTableroSLAsInc_TiempoSolucion" fieldSource="Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="78" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_HERR_EST_COST" PathID="grdTableroSLAsImg_HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_REQ_SERV" PathID="grdTableroSLAsImg_REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CUMPL_REQ_FUNC" PathID="grdTableroSLAsImg_CUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CALIDAD_PROD_TERM" PathID="grdTableroSLAsImg_CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_RETR_ENTREGABLE" PathID="grdTableroSLAsImg_RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CAL_COD" PathID="grdTableroSLAsImg_CAL_COD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_DEF_FUG_AMB_PROD" PathID="grdTableroSLAsImg_DEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_Inc_TiempoAsignacion" PathID="grdTableroSLAsImg_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_Inc_TiempoSolucion" PathID="grdTableroSLAsImg_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="104" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenEFIC_PRESUP" PathID="grdTableroSLAsCumplenEFIC_PRESUP" fieldSource="Cumple_EF">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="108" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotEFIC_PRESUP" PathID="grdTableroSLAsTotEFIC_PRESUP" fieldSource="Total_ef">
					<Components/>
					<Events/>
					<Attributes/>

					<Features/>
				</Label>
				<Label id="112" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="EFIC_PRESUP" PathID="grdTableroSLAsEFIC_PRESUP" fieldSource="EFIC_PRESUP">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="116" visible="True" name="Sorter_EFIC_PRES" wizardSortingType="SimpleDir" PathID="grdTableroSLAsSorter_EFIC_PRES" wizardCaption="Eficiencia&lt;br&gt;Presupuestal" column="EFIC_PRESUP">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Image id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_EFIC_PRESUP" PathID="grdTableroSLAsImg_EFIC_PRESUP">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Sorter id="125" visible="True" name="Sorter_Orden" wizardSortingType="SimpleDir" PathID="grdTableroSLAsSorter_Orden" wizardCaption="Servicio" column="orden">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="32" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenHERR_EST_COST" fieldSource="CumplenHERR_EST_COST" PathID="grdTableroSLAsCumplenHERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotHERR_EST_COST" fieldSource="TotHERR_EST_COST" PathID="grdTableroSLAsTotHERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="89" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="208"/>
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
				<SQLParameter id="320" dataType="Integer" defaultValue="date('m')-2" designDefaultValue="1" parameterSource="s_MesReporte" parameterType="URL" variable="sMes"/>
				<SQLParameter id="321" dataType="Integer" defaultValue="date('Y')" designDefaultValue="2014" parameterSource="s_AnioReporte" parameterType="URL" variable="sAnio"/>
				<SQLParameter id="322" dataType="Integer" defaultValue="0" designDefaultValue="3" parameterSource="s_id_proveedor" parameterType="URL" variable="sProveedor"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<IncludePage id="121" name="MenuTablero" PathID="MenuTablero" page="MenuTablero.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Link id="209" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="UrlCDS" PathID="UrlCDS" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
			<LinkParameters/>
		</Link>
		<Panel id="239" visible="True" generateDiv="False" name="pnlSLAsCAPC" wizardInnerHTML="      &lt;!-- BEGIN Grid grdSLAsCAPC --&gt;
      &lt;table class=&quot;MainTable&quot; id=&quot;grdSLAsCAPC&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;
        &lt;tr&gt;
          &lt;td valign=&quot;top&quot;&gt;
            &lt;table class=&quot;Header&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;
              &lt;tr&gt;
                &lt;td class=&quot;HeaderLeft&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;Styles/{CCS_Style}/Images/Spacer.gif&quot;&gt;&lt;/td&gt; 
                &lt;td class=&quot;th&quot;&gt;&lt;strong&gt;Tablero de Niveles de Servicio del CAPC &lt;/strong&gt;&lt;/td&gt; 
                &lt;td class=&quot;HeaderRight&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;Styles/{CCS_Style}/Images/Spacer.gif&quot;&gt;&lt;/td&gt;
              &lt;/tr&gt;
            &lt;/table&gt;
 
            &lt;table class=&quot;Grid&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;
              &lt;tr class=&quot;Caption&quot;&gt;
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_Descripcion --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_Descripcion&quot;&gt;Descripcion&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_Descripcion --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;% de&lt;br&gt;
                deductivas&lt;br&gt;
                para el Total&lt;br&gt;
                de Defectos&lt;br&gt;
                de Calidad&lt;br&gt;
                Funcional &lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_Deductiva --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_Deductiva&quot;&gt;% de&lt;br&gt;
                deductivas&lt;br&gt;
                para el Total&lt;br&gt;
                de Puntos&lt;br&gt;
                en el Índice&lt;br&gt;
                de Calidad&lt;br&gt;
                Documental&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_Deductiva --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_pctcalidad --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_pctcalidad&quot;&gt;Valor de&lt;br&gt;
                Cumplimiento&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_pctcalidad --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_CALIDAD_PROD_TERM --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_CALIDAD_PROD_TERM&quot;&gt;Cumplimiento&lt;br&gt;
                vs. Objetivo&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_CALIDAD_PROD_TERM --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_ReportesCompletos --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_ReportesCompletos&quot;&gt;Reportes&lt;br&gt;
                entregados de&lt;br&gt;
                manera&lt;br&gt;
                completa&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_ReportesCompletos --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_SLAsNoReportados --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_SLAsNoReportados&quot;&gt;SLAs No&lt;br&gt;
                Reportados&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_SLAsNoReportados --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_DEDUC_OMISION --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_DEDUC_OMISION&quot;&gt;% De&lt;br&gt;
                Cumplimiento&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_DEDUC_OMISION --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;Cumplimiento&lt;br&gt;
                vs. Objetivo&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_UnidadesActuales --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_UnidadesActuales&quot;&gt;Costo Actual&lt;br&gt;
                y/o&lt;br&gt;
                Total de Unidades&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_UnidadesActuales --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_UnidadesAnteriores --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_UnidadesAnteriores&quot;&gt;Costo Estimado&lt;br&gt;
                y/o&lt;br&gt;
                Total de&lt;br&gt;
                Unidades&lt;br&gt;
                Optimizadas&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_UnidadesAnteriores --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;Diferencia&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_EFIC_PRESUP --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_EFIC_PRESUP&quot;&gt;Cumplimiento&lt;br&gt;
                vs. Objetivo&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_EFIC_PRESUP --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_DiasPlaneados --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_DiasPlaneados&quot;&gt;Días Hábiles&lt;br&gt;
                Planeados&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_DiasPlaneados --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_DiasReales --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_DiasReales&quot;&gt;Días Hábiles&lt;br&gt;
                Reales&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_DiasReales --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_RETR_ENTREGABLE --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdSLAsCAPCSorter_RETR_ENTREGABLE&quot;&gt;Valor de Cumplimiento&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_RETR_ENTREGABLE --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;&amp;nbsp;&lt;/th&gt;
              &lt;/tr&gt;
 
              &lt;!-- BEGIN Row --&gt;
              &lt;tr class=&quot;Row&quot;&gt;
                &lt;td&gt;{Descripcion}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{Label1}&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{Deductiva}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{pctcalidad}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;&amp;nbsp;&lt;img id=&quot;grdSLAsCAPCimgCALIDAD_PROD_TERM&quot; alt=&quot;&quot; src=&quot;{imgCALIDAD_PROD_TERM}&quot;&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{ReportesCompletos}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{SLAsNoReportados}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{DEDUC_OMISION}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot; rowspan=&quot;1&quot; colspan=&quot;1&quot;&gt;&lt;img id=&quot;grdSLAsCAPCimgDEDUC_OMISION_{grdSLAsCAPC:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgDEDUC_OMISION}&quot;&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{UnidadesActuales}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{UnidadesAnteriores}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot; rowspan=&quot;1&quot; colspan=&quot;1&quot;&gt;{Label2}&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;&lt;img id=&quot;grdSLAsCAPCimgEFIC_PRESUP_{grdSLAsCAPC:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgEFIC_PRESUP}&quot;&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{DiasPlaneados}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{DiasReales}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{RETR_ENTREGABLE}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot; rowspan=&quot;1&quot; colspan=&quot;1&quot;&gt;&lt;img id=&quot;grdSLAsCAPCimgRETR_ENTREGABLE&quot; alt=&quot;&quot; src=&quot;{imgRETR_ENTREGABLE}&quot;&gt;&lt;/td&gt;
              &lt;/tr&gt;
 &lt;!-- END Row --&gt;
              &lt;!-- BEGIN NoRecords --&gt;
              &lt;tr class=&quot;NoRecords&quot;&gt;
                &lt;td rowspan=&quot;1&quot; colspan=&quot;17&quot;&gt;No hay registros&lt;/td&gt;
              &lt;/tr&gt;
              &lt;!-- END NoRecords --&gt;
              &lt;tr class=&quot;Footer&quot;&gt;
                &lt;td rowspan=&quot;1&quot; colspan=&quot;17&quot;&gt;
                  &lt;!-- BEGIN Navigator Navigator --&gt;&lt;span class=&quot;Navigator&quot;&gt;Registro por página 
                  &lt;select name=&quot;{FormName}PageSize&quot; style=&quot;vertical-align: middle;&quot; data-grid-size=&quot;{FormName}&quot;&gt;
                    &lt;option selected value=&quot;&quot;&gt;-&lt;/option&gt;
 {PageSize_Options}
                  &lt;/select&gt;
 
                  &lt;!-- BEGIN First_On --&gt;&lt;a href=&quot;{First_URL}&quot;&gt;&lt;img alt=&quot;{First_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/First.gif&quot;&gt;&lt;/a&gt; &lt;!-- END First_On --&gt;
                  &lt;!-- BEGIN First_Off --&gt;&lt;img alt=&quot;{First_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/FirstOff.gif&quot;&gt;&lt;!-- END First_Off --&gt;
                  &lt;!-- BEGIN Prev_On --&gt;&lt;a href=&quot;{Prev_URL}&quot;&gt;&lt;img alt=&quot;{Prev_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/Prev.gif&quot;&gt;&lt;/a&gt; &lt;!-- END Prev_On --&gt;
                  &lt;!-- BEGIN Prev_Off --&gt;&lt;img alt=&quot;{Prev_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/PrevOff.gif&quot;&gt;&lt;!-- END Prev_Off --&gt;&amp;nbsp;{Page_Number} de&amp;nbsp;{Total_Pages}&amp;nbsp; 
                  &lt;!-- BEGIN Next_On --&gt;&lt;a href=&quot;{Next_URL}&quot;&gt;&lt;img alt=&quot;{Next_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/Next.gif&quot;&gt;&lt;/a&gt; &lt;!-- END Next_On --&gt;
                  &lt;!-- BEGIN Next_Off --&gt;&lt;img alt=&quot;{Next_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/NextOff.gif&quot;&gt;&lt;!-- END Next_Off --&gt;
                  &lt;!-- BEGIN Last_On --&gt;&lt;a href=&quot;{Last_URL}&quot;&gt;&lt;img alt=&quot;{Last_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/Last.gif&quot;&gt;&lt;/a&gt; &lt;!-- END Last_On --&gt;
                  &lt;!-- BEGIN Last_Off --&gt;&lt;img alt=&quot;{Last_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/LastOff.gif&quot;&gt;&lt;!-- END Last_Off --&gt;&lt;/span&gt;&lt;!-- END Navigator Navigator --&gt;&amp;nbsp;&lt;/td&gt;
              &lt;/tr&gt;
            &lt;/table&gt;
          &lt;/td&gt;
        &lt;/tr&gt;
      &lt;/table&gt;
 &lt;!-- END Grid grdSLAsCAPC --&gt;" PathID="pnlSLAsCAPC">
			<Components>
				<Grid id="213" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="grdSLAsCAPC" connection="cnDisenio" dataSource="select 
	c.agrupador ,
	v.Descripcion , 
	max(c.Deductiva) Deductiva,
	max(cast(c.CALIDAD_PROD_TERM as int)) CALIDAD_PROD_TERM ,
	sum(c.ReportesCompletos) ReportesCompletos,
	sum(c.SLAsNoReportados) SLAsNoReportados,
	max(cast(c.DEDUC_OMISION as int)) DEDUC_OMISION,
	sum(cast(c.UnidadesActuales as float)) UnidadesActuales,
	sum(cast(c.UnidadesAnteriores as float)) UnidadesAnteriores,  
	max(cast(c.EFIC_PRESUP as int)) EFIC_PRESUP,
	AVG(cast(c.DiasPlaneados as int)) DiasPlaneados,
	AVG(cast(c.DiasReales as int)) DiasReales,
	max(cast(c.RETR_ENTREGABLE as int)) RETR_ENTREGABLE,
	v.id IdServCont
	, avg(c.pctcalidad) pctcalidad
from dbo.mc_c_ServContractual v 
     left join mc_calificacion_CAPC c 
	on v.id = c.id_serviciocont and mes={sMes} and anio = {sAnio}
where v.Aplica ='CAPC'
group by 	
	v.Descripcion ,
	v.id ,
c.agrupador" pageSizeLimit="100" pageSize="True" wizardCaption="Tablero de Niveles de Servicio del CAPC" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="pnlSLAsCAPCgrdSLAsCAPC">
					<Components>
						<Sorter id="214" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_Descripcion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="5" visible="True" name="Sorter_CALIDAD_PROD_TERM" column="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardSortingType="SimpleDir" wizardControl="CALIDAD_PROD_TERM" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_CALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="6" visible="True" name="Sorter_ReportesCompletos" column="ReportesCompletos" wizardCaption="Reportes Completos" wizardSortingType="SimpleDir" wizardControl="ReportesCompletos" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_ReportesCompletos">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="7" visible="True" name="Sorter_SLAsNoReportados" column="SLAsNoReportados" wizardCaption="SLAs No Reportados" wizardSortingType="SimpleDir" wizardControl="SLAsNoReportados" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_SLAsNoReportados">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="215" visible="True" name="Sorter_DEDUC_OMISION" column="DEDUC_OMISION" wizardCaption="DEDUC OMISION" wizardSortingType="SimpleDir" wizardControl="DEDUC_OMISION" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_DEDUC_OMISION">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="9" visible="True" name="Sorter_UnidadesActuales" column="UnidadesActuales" wizardCaption="Unidades Actuales" wizardSortingType="SimpleDir" wizardControl="UnidadesActuales" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_UnidadesActuales">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="216" visible="True" name="Sorter_UnidadesAnteriores" column="UnidadesAnteriores" wizardCaption="Unidades Anteriores" wizardSortingType="SimpleDir" wizardControl="UnidadesAnteriores" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_UnidadesAnteriores">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="11" visible="True" name="Sorter_EFIC_PRESUP" column="EFIC_PRESUP" wizardCaption="EFIC PRESUP" wizardSortingType="SimpleDir" wizardControl="EFIC_PRESUP" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_EFIC_PRESUP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="217" visible="True" name="Sorter_DiasPlaneados" column="DiasPlaneados" wizardCaption="Dias Planeados" wizardSortingType="SimpleDir" wizardControl="DiasPlaneados" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_DiasPlaneados">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="13" visible="True" name="Sorter_DiasReales" column="DiasReales" wizardCaption="Dias Reales" wizardSortingType="SimpleDir" wizardControl="DiasReales" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_DiasReales">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="218" visible="True" name="Sorter_RETR_ENTREGABLE" column="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardSortingType="SimpleDir" wizardControl="RETR_ENTREGABLE" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_RETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="219" visible="True" name="Sorter_pctcalidad" column="pctcalidad" wizardCaption="Pctcalidad" wizardSortingType="SimpleDir" wizardControl="pctcalidad" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_pctcalidad">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCDescripcion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="221" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ReportesCompletos" fieldSource="ReportesCompletos" wizardCaption="Reportes Completos" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCReportesCompletos">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="SLAsNoReportados" fieldSource="SLAsNoReportados" wizardCaption="SLAs No Reportados" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCSLAsNoReportados">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="222" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DEDUC_OMISION" fieldSource="DEDUC_OMISION" wizardCaption="DEDUC OMISION" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCDEDUC_OMISION">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="UnidadesActuales" fieldSource="UnidadesActuales" wizardCaption="Unidades Actuales" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCUnidadesActuales">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="223" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="UnidadesAnteriores" fieldSource="UnidadesAnteriores" wizardCaption="Unidades Anteriores" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCUnidadesAnteriores">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="224" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DiasPlaneados" fieldSource="DiasPlaneados" wizardCaption="Dias Planeados" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCDiasPlaneados">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="225" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DiasReales" fieldSource="DiasReales" wizardCaption="Dias Reales" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCDiasReales">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="226" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCRETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="227" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="pctcalidad" fieldSource="pctcalidad" wizardCaption="Pctcalidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCpctcalidad">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Navigator id="228" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Navigator>
						<Image id="230" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgCALIDAD_PROD_TERM" PathID="pnlSLAsCAPCgrdSLAsCAPCimgCALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="231" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgDEDUC_OMISION" PathID="pnlSLAsCAPCgrdSLAsCAPCimgDEDUC_OMISION">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="232" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Label2" PathID="pnlSLAsCAPCgrdSLAsCAPCLabel2">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="233" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgEFIC_PRESUP" PathID="pnlSLAsCAPCgrdSLAsCAPCimgEFIC_PRESUP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="234" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgRETR_ENTREGABLE" PathID="pnlSLAsCAPCgrdSLAsCAPCimgRETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="284" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="agrupador" PathID="pnlSLAsCAPCgrdSLAsCAPCagrupador" fieldSource="agrupador">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
					</Components>
					<Events>
						<Event name="BeforeShowRow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="235"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="238"/>
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
						<SQLParameter id="307" dataType="Integer" defaultValue="0" designDefaultValue="8" old_temp_id="236" parameterSource="s_MesReporte" parameterType="URL" variable="sMes"/>
						<SQLParameter id="308" dataType="Integer" defaultValue="0" designDefaultValue="2014" old_temp_id="237" parameterSource="s_AnioReporte" parameterType="URL" variable="sAnio"/>
					</SQLParameters>
					<SecurityGroups/>
					<Attributes/>
					<Features/>
				</Grid>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="TableroSLAsCDSs_events.php" forShow="False" comment="//" codePage="windows-1252"/>
<CodeFile id="Code" language="PHPTemplates" name="TableroSLAsCDSs.php" forShow="True" url="TableroSLAsCDSs.php" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups>
		<Group id="129" groupID="2"/>
		<Group id="130" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="204"/>
			</Actions>
		</Event>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="205"/>
			</Actions>
		</Event>
		<Event name="AfterInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="206"/>
			</Actions>
		</Event>
	</Events>
</Page>
