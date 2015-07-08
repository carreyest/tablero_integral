<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="Grid1" connection="cnDisenio" pageSizeLimit="100" pageSize="True" wizardCaption="Cuadro NS RSs" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="Grid1" dataSource="
select mc_c_metrica.nombre, c.SumaApb,  c.HERR_EST_COST,  mc_c_metrica.Meta,  mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(HERR_EST_COST) SumaApb,
	sum(cast(~HERR_EST_COST as int)) HERR_EST_COST
	from mc_calificacion_rs_mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and IdUniverso  in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
	and IdUniverso not in (select id from mc_universo_cds where revision=2  )
	group by id_proveedor  
) c
where acronimo ='HERR_EST_COST'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(REQ_SERV) SumaApb,
	sum(cast(~REQ_SERV as int)) REQ_SERV
	from mc_calificacion_rs_mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and IdUniverso  in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
	and IdUniverso not in (select id from mc_universo_cds where revision=2  )
	group by id_proveedor  
) c
where acronimo ='REQ_SERV'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(CUMPL_REQ_FUNC) SumaApb,
	sum(cast(~CUMPL_REQ_FUNC as int)) REQ_SERV
	from mc_calificacion_rs_mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and IdUniverso  in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
	and IdUniverso not in (select id from mc_universo_cds where revision=2  )
	group by id_proveedor  
) c
where acronimo ='CUMPL_REQ_FUNC'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(CALIDAD_PROD_TERM) SumaApb,
	sum(cast(~CALIDAD_PROD_TERM as int)) REQ_SERV
	from mc_calificacion_rs_mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and IdUniverso  in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
	and IdUniverso not in (select id from mc_universo_cds where revision=2  )
	group by id_proveedor  
) c
where acronimo ='CALIDAD_PROD_TERM'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(RETR_ENTREGABLE) SumaApb,
	sum(cast(~RETR_ENTREGABLE as int)) REQ_SERV
	from mc_calificacion_rs_mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and IdUniverso  in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
	and IdUniverso not in (select id from mc_universo_cds where revision=2  )
	group by id_proveedor  
) c
where acronimo ='RETR_ENTREGABLE'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(COMPL_RUTA_CRITICA) SumaApb,
	sum(cast(~COMPL_RUTA_CRITICA as int)) REQ_SERV
	from mc_calificacion_rs_mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and IdUniverso  in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
	and IdUniverso not in (select id from mc_universo_cds where revision=2  )
	group by id_proveedor  
) c
where acronimo ='COMPL_RUTA_CRITICA'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(EST_PROY) SumaApb,
	sum(cast(~EST_PROY as int)) REQ_SERV
	from mc_calificacion_rs_mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and IdUniverso  in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
	and IdUniverso not in (select id from mc_universo_cds where revision=2  )
	group by id_proveedor  
) c
where acronimo ='EST_PROY'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(DEF_FUG_AMB_PROD) SumaApb,
	sum(cast(~DEF_FUG_AMB_PROD as int)) REQ_SERV
	from mc_calificacion_rs_mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and IdUniverso  in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
	and IdUniverso not in (select id from mc_universo_cds where revision=2  )
	group by id_proveedor  
) c
where acronimo ='DEF_FUG_AMB_PROD'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.CUMPLE_SLA  ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
( select id_proveedor,
	COUNT(CUMPLESLA) SumaApb,
	sum(cast(~cast(CUMPLESLA as bit) as int)) CUMPLE_SLA
	from mc_eficiencia_presupuestal 
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and CumpleSLA in (0,1)
	--and ((id_proveedor &lt;&gt;4 and GrupoAplicativos not like '%Todos%') or (Id_Proveedor =4))
	and (([GrupoAplicativos] not like 'Todos%' and (4&lt;&gt;4 or (MesReporte&gt;2 and anioreporte &gt;2013)) ) 
					or (4=4 and MesReporte&lt;=2 and anioreporte &lt;2014 ) or 0=4)
	group by id_proveedor  
) c
where acronimo ='EFIC_PRESUP'
union all

select mc_c_metrica.nombre, c.SumaApb,  c.CAL_COD,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(CAL_COD) SumaApb,
	sum(cast(~CAL_COD as int)) CAL_COD
	from mc_calificacion_rs_mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and IdUniverso  in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
	and IdUniverso not in (select id from mc_universo_cds where revision=2  )
	group by id_proveedor  
) c
where acronimo ='CAL_COD'



">
			<Components>
				<Sorter id="4" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="Grid1Sorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="5" visible="True" name="Sorter_SumaApb" column="SumaApb" wizardCaption="Suma Apb" wizardSortingType="SimpleDir" wizardControl="SumaApb" wizardAddNbsp="False" PathID="Grid1Sorter_SumaApb">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="6" visible="True" name="Sorter_HERR_EST_COST" column="HERR_EST_COST" wizardCaption="HERR EST COST" wizardSortingType="SimpleDir" wizardControl="HERR_EST_COST" wizardAddNbsp="False" PathID="Grid1Sorter_HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_Meta" column="Meta" wizardCaption="Meta" wizardSortingType="SimpleDir" wizardControl="Meta" wizardAddNbsp="False" PathID="Grid1Sorter_Meta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_pena" column="pena" wizardCaption="Pena" wizardSortingType="SimpleDir" wizardControl="pena" wizardAddNbsp="False" PathID="Grid1Sorter_pena">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="10" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="11" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="SumaApb" fieldSource="SumaApb" wizardCaption="Suma Apb" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1SumaApb">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="12" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="incumplimientos" fieldSource="HERR_EST_COST" wizardCaption="HERR EST COST" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1incumplimientos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="13" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="Meta" fieldSource="Meta" wizardCaption="Meta" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1Meta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="14" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="pena" fieldSource="pena" wizardCaption="Pena" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1pena">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="16" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="Cumplimiento" PathID="Grid1Cumplimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="19" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Indicador" PathID="Grid1Indicador" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="18" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="51" eventType="Server"/>
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
				<SQLParameter id="90" dataType="Integer" defaultValue="0" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
<SQLParameter id="91" dataType="Integer" defaultValue="0" designDefaultValue="1" parameterSource="s_MesReporte" parameterType="URL" variable="s_MesReporte"/>
<SQLParameter id="92" dataType="Integer" defaultValue="0" designDefaultValue="2014" parameterSource="s_AnioReporte" parameterType="URL" variable="s_AnioReporte"/>
<SQLParameter id="93" dataType="Integer" defaultValue="0" designDefaultValue="1" parameterSource="sSLO" parameterType="URL" variable="sSLO"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="20" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_calificacion_rs_MC" searchIds="20" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_calificacion_rs_MC" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="mc_calificacion_rs_MC">
			<Components>
				<Button id="21" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_calificacion_rs_MCButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="22" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" PathID="mc_calificacion_rs_MCs_id_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="26" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="31" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="27" fieldName="nombre" tableName="mc_c_proveedor"/>
						<Field id="28" fieldName="descripcion" tableName="mc_c_proveedor"/>
						<Field id="29" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</Fields>
					<PKFields>
						<PKField id="30" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="23" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_MesReporte" fieldSource="MesReporte" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mes Reporte" caption="Mes Reporte" required="False" unique="False" PathID="mc_calificacion_rs_MCs_MesReporte" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
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
				<ListBox id="24" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Integer" returnValueType="Number" name="s_AnioReporte" fieldSource="AnioReporte" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Anio Reporte" caption="Anio Reporte" required="False" unique="False" PathID="mc_calificacion_rs_MCs_AnioReporte" connection="cnDisenio" dataSource="SELECT * 
FROM mc_c_anio 
where ano &gt; 2013
order by ano" boundColumn="Ano" textColumn="Ano">
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
		<IncludePage id="49" name="MenuTablero" PathID="MenuTablero" page="MenuTablero.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="52" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="Grid2" connection="cnDisenio" dataSource="select mc_c_metrica.nombre, c.SumaApb,  c.HERR_EST_COST,  mc_c_metrica.Meta,  mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(HERR_EST_COST) SumaApb,
	sum(cast(~HERR_EST_COST as int)) HERR_EST_COST
	from mc_calificacion_rs_sat
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1 )
	group by id_proveedor  
) c
where acronimo ='HERR_EST_COST'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(REQ_SERV) SumaApb,
	sum(cast(~REQ_SERV as int)) REQ_SERV
	from mc_calificacion_rs_sat
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1 )
	group by id_proveedor  
) c
where acronimo ='REQ_SERV'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(CUMPL_REQ_FUNC) SumaApb,
	sum(cast(~CUMPL_REQ_FUNC as int)) REQ_SERV
	from mc_calificacion_rs_sat
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor  
) c
where acronimo ='CUMPL_REQ_FUNC'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(CALIDAD_PROD_TERM) SumaApb,
	sum(cast(~CALIDAD_PROD_TERM as int)) REQ_SERV
	from mc_calificacion_rs_sat
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor  
) c
where acronimo ='CALIDAD_PROD_TERM'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(RETR_ENTREGABLE) SumaApb,
	sum(cast(~RETR_ENTREGABLE as int)) REQ_SERV
	from mc_calificacion_rs_sat
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor  
) c
where acronimo ='RETR_ENTREGABLE'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(COMPL_RUTA_CRITICA) SumaApb,
	sum(cast(~COMPL_RUTA_CRITICA as int)) REQ_SERV
	from mc_calificacion_rs_sat
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor  
) c
where acronimo ='COMPL_RUTA_CRITICA'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(EST_PROY) SumaApb,
	sum(cast(~EST_PROY as int)) REQ_SERV
	from mc_calificacion_rs_sat
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor  
) c
where acronimo ='EST_PROY'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(DEF_FUG_AMB_PROD) SumaApb,
	sum(cast(~DEF_FUG_AMB_PROD as int)) REQ_SERV
	from mc_calificacion_rs_sat
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor  
) c
where acronimo ='DEF_FUG_AMB_PROD'
union all
select mc_c_metrica.nombre, c.SumaApb,  c.CUMPLE_SLA  ,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(CUMPLESLA) SumaApb,
	sum(cast(~cast(CUMPLESLA as bit) as int)) CUMPLE_SLA
	from mc_eficiencia_presupuestal 
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and CumpleSLA in (0,1)
	--and ((id_proveedor &lt;&gt;4 and GrupoAplicativos not like '%Todos%') or (Id_Proveedor =4))
	and (([GrupoAplicativos] not like 'Todos%' and (4&lt;&gt;4 or (MesReporte&gt;2 and anioreporte &gt;2013)) ) 
					or (4=4 and MesReporte&lt;=2 and anioreporte &lt;2014 ) or 0=4)
	group by id_proveedor  
) c
where acronimo ='EFIC_PRESUP'" pageSizeLimit="100" pageSize="True" wizardCaption="Cuadro NS RSs" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="Grid2">
			<Components>
				<Sorter id="53" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="Grid2Sorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="54" visible="True" name="Sorter_SumaApb" column="SumaApb" wizardCaption="Suma Apb" wizardSortingType="SimpleDir" wizardControl="SumaApb" wizardAddNbsp="False" PathID="Grid2Sorter_SumaApb">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="55" visible="True" name="Sorter_HERR_EST_COST" column="HERR_EST_COST" wizardCaption="HERR EST COST" wizardSortingType="SimpleDir" wizardControl="HERR_EST_COST" wizardAddNbsp="False" PathID="Grid2Sorter_HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="56" visible="True" name="Sorter_Meta" column="Meta" wizardCaption="Meta" wizardSortingType="SimpleDir" wizardControl="Meta" wizardAddNbsp="False" PathID="Grid2Sorter_Meta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="57" visible="True" name="Sorter_pena" column="pena" wizardCaption="Pena" wizardSortingType="SimpleDir" wizardControl="pena" wizardAddNbsp="False" PathID="Grid2Sorter_pena">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="58" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="59" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="SumaApb" fieldSource="SumaApb" wizardCaption="Suma Apb" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2SumaApb">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="60" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="incumplimientos" fieldSource="HERR_EST_COST" wizardCaption="HERR EST COST" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2incumplimientos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="61" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="Meta" fieldSource="Meta" wizardCaption="Meta" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2Meta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="62" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="pena" fieldSource="pena" wizardCaption="Pena" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2pena">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="63" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="64" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="Cumplimiento" PathID="Grid2Cumplimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="65" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Indicador" PathID="Grid2Indicador" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="66"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="67"/>
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
				<SQLParameter id="87" dataType="Integer" defaultValue="0" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="88" dataType="Integer" defaultValue="0" designDefaultValue="1" parameterSource="s_MesReporte" parameterType="URL" variable="s_MesReporte"/>
				<SQLParameter id="89" dataType="Integer" defaultValue="0" designDefaultValue="2014" parameterSource="s_AnioReporte" parameterType="URL" variable="s_AnioReporte"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsApbCuadroNSRSxls.php" forShow="True" url="PPMCsApbCuadroNSRSxls.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsApbCuadroNSRSxls_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="50" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="83"/>
			</Actions>
		</Event>
	</Events>
</Page>
