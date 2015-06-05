<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="grdIncCuadroNS" connection="cnDisenio" dataSource="select mc_c_metrica.nombre,  ''  DescSev, 0 severidad, c.Suma,  c.Cumplen,  mc_c_metrica.Meta,  mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(Cumple_DISP_SOPORTE) Suma,
	sum(cast(~Cast(Cumple_DISP_SOPORTE as bit) as int)) Cumplen
	from mc_calificacion_incidentes_MC mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor 
) c
where acronimo ='DISP_SOPORTE'
union all
select mc_c_metrica.nombre, 'Severidad', c.severidad, c.Suma,  c.Cumplen,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select sv.severidad, id_proveedor,
	COUNT(Cumple_Inc_TiempoAsignacion) Suma,
	sum(cast(~CAST(Cumple_Inc_TiempoAsignacion as bit) as int)) Cumplen
	from (select distinct severidad  from mc_c_aplicacion) sv left join  mc_calificacion_incidentes_MC mc
		on mc.severidad= sv.severidad
	and id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor, sv.severidad   
) c
where acronimo ='Inc_TiempoAsignacion'
union all
select mc_c_metrica.nombre, 'Severidad', c.severidad,  c.Suma,  c.Cumplen,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select sv.severidad, id_proveedor,
	COUNT(Cumple_Inc_TiempoSolucion) Suma,
	sum(cast(~CAST(Cumple_Inc_TiempoSolucion as bit) as int)) Cumplen
	from (select distinct severidad  from mc_c_aplicacion) sv left join  mc_calificacion_incidentes_MC mc
		on mc.severidad= sv.severidad
	and id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor, sv.severidad   
) c
where acronimo ='Inc_TiempoSolucion'" pageSizeLimit="100" pageSize="True" wizardCaption="grdIncCuadroNS" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="grdIncCuadroNS">
			<Components>
				<Sorter id="7" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="grdIncCuadroNSSorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_severidad" column="severidad" wizardCaption="Severidad" wizardSortingType="SimpleDir" wizardControl="severidad" wizardAddNbsp="False" PathID="grdIncCuadroNSSorter_severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="9" visible="True" name="Sorter_Suma" column="Suma" wizardCaption="Suma" wizardSortingType="SimpleDir" wizardControl="Suma" wizardAddNbsp="False" PathID="grdIncCuadroNSSorter_Suma">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="10" visible="True" name="Sorter_Cumplen" column="Cumplen" wizardCaption="Cumplen" wizardSortingType="SimpleDir" wizardControl="Cumplen" wizardAddNbsp="False" PathID="grdIncCuadroNSSorter_Cumplen">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="11" visible="True" name="Sorter_Meta" column="Meta" wizardCaption="Meta" wizardSortingType="SimpleDir" wizardControl="Meta" wizardAddNbsp="False" PathID="grdIncCuadroNSSorter_Meta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="12" visible="True" name="Sorter_pena" column="pena" wizardCaption="Pena" wizardSortingType="SimpleDir" wizardControl="pena" wizardAddNbsp="False" PathID="grdIncCuadroNSSorter_pena">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="13" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncCuadroNSnombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="14" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="severidad" fieldSource="severidad" wizardCaption="Severidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdIncCuadroNSseveridad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="15" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Suma" fieldSource="Suma" wizardCaption="Suma" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdIncCuadroNSSuma">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="16" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Cumplen" fieldSource="Cumplen" wizardCaption="Cumplen" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdIncCuadroNSCumplen">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="Meta" fieldSource="Meta" wizardCaption="Meta" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncCuadroNSMeta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="pena" fieldSource="pena" wizardCaption="Pena" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncCuadroNSpena">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="19" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="30" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="PctCumplimiento" PathID="grdIncCuadroNSPctCumplimiento" format="0%">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ImgCumple" PathID="grdIncCuadroNSImgCumple">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="32" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="39" eventType="Server"/>
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
				<SQLParameter id="75" dataType="Integer" defaultValue="0" designDefaultValue="3" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
<SQLParameter id="76" dataType="Integer" defaultValue="date(&quot;m&quot;)" designDefaultValue="1" parameterSource="s_MesReporte" parameterType="URL" variable="s_MesReporte"/>
<SQLParameter id="77" dataType="Integer" defaultValue="date(&quot;Y&quot;)" designDefaultValue="2014" parameterSource="s_AnioReporte" parameterType="URL" variable="s_AnioReporte"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="21" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_calificacion_incidente" searchIds="21" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_calificacion_incidentes_MC" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="mc_calificacion_incidente">
			<Components>
				<Button id="22" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_calificacion_incidenteButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="23" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" PathID="mc_calificacion_incidentes_id_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="27" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="26" posHeight="180" posLeft="10" posTop="10" posWidth="158" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="28" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="29" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="24" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_MesReporte" fieldSource="MesReporte" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mes Reporte" caption="Mes Reporte" required="False" unique="False" PathID="mc_calificacion_incidentes_MesReporte" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
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
				<ListBox id="25" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_AnioReporte" fieldSource="AnioReporte" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Anio Reporte" caption="Anio Reporte" required="False" unique="False" PathID="mc_calificacion_incidentes_AnioReporte" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="72" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Ano" logicOperator="And" parameterSource="2013" parameterType="Expression" searchConditionType="GreaterThan"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="71" posHeight="88" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_anio"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="73" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="74" dataType="Integer" fieldName="Ano" tableName="mc_c_anio"/>
					</PKFields>
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
		<IncludePage id="37" name="MenuTablero" PathID="MenuTablero" page="MenuTablero.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="40" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="grdIncCuadroNS1" connection="cnDisenio" dataSource="
select mc_c_metrica.nombre,  ''  DescSev, 0 severidad, c.Suma,  c.Cumplen,  mc_c_metrica.Meta,  mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select id_proveedor,
	COUNT(Cumple_DISP_SOPORTE) Suma,
	sum(cast(~Cast(Cumple_DISP_SOPORTE as bit) as int)) Cumplen
	from mc_calificacion_incidentes_SAT mc
	where id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor 
) c
where acronimo ='DISP_SOPORTE'
union all
select mc_c_metrica.nombre, 'Severidad', c.severidad, c.Suma,  c.Cumplen,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select sv.severidad, id_proveedor,
	COUNT(Cumple_Inc_TiempoAsignacion) Suma,
	sum(cast(~CAST(Cumple_Inc_TiempoAsignacion as bit) as int)) Cumplen
	from (select distinct severidad  from mc_c_aplicacion) sv left join  mc_calificacion_incidentes_SAT mc
		on mc.severidad= sv.severidad
	and id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor, sv.severidad   
) c
where acronimo ='Inc_TiempoAsignacion'
union all
select mc_c_metrica.nombre, 'Severidad', c.severidad,  c.Suma,  c.Cumplen,  mc_c_metrica.Meta, mc_c_metrica.pena   
from mc_c_metrica 
CROSS JOIN 
(select sv.severidad, id_proveedor,
	COUNT(Cumple_Inc_TiempoSolucion) Suma,
	sum(cast(~CAST(Cumple_Inc_TiempoSolucion as bit) as int)) Cumplen
	from (select distinct severidad  from mc_c_aplicacion) sv left join  mc_calificacion_incidentes_SAt mc
		on mc.severidad= sv.severidad
	and id_proveedor= {s_id_proveedor}
	and mesreporte= {s_MesReporte}
	and AnioReporte = {s_AnioReporte}
	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)
	group by id_proveedor, sv.severidad   
) c
where acronimo ='Inc_TiempoSolucion'" pageSizeLimit="100" pageSize="True" wizardCaption="grdIncCuadroNS" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="grdIncCuadroNS1">
			<Components>
				<Sorter id="41" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="grdIncCuadroNS1Sorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="42" visible="True" name="Sorter_severidad" column="severidad" wizardCaption="Severidad" wizardSortingType="SimpleDir" wizardControl="severidad" wizardAddNbsp="False" PathID="grdIncCuadroNS1Sorter_severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="43" visible="True" name="Sorter_Suma" column="Suma" wizardCaption="Suma" wizardSortingType="SimpleDir" wizardControl="Suma" wizardAddNbsp="False" PathID="grdIncCuadroNS1Sorter_Suma">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="44" visible="True" name="Sorter_Cumplen" column="Cumplen" wizardCaption="Cumplen" wizardSortingType="SimpleDir" wizardControl="Cumplen" wizardAddNbsp="False" PathID="grdIncCuadroNS1Sorter_Cumplen">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="45" visible="True" name="Sorter_Meta" column="Meta" wizardCaption="Meta" wizardSortingType="SimpleDir" wizardControl="Meta" wizardAddNbsp="False" PathID="grdIncCuadroNS1Sorter_Meta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="46" visible="True" name="Sorter_pena" column="pena" wizardCaption="Pena" wizardSortingType="SimpleDir" wizardControl="pena" wizardAddNbsp="False" PathID="grdIncCuadroNS1Sorter_pena">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncCuadroNS1nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="48" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="severidad" fieldSource="severidad" wizardCaption="Severidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdIncCuadroNS1severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="49" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Suma" fieldSource="Suma" wizardCaption="Suma" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdIncCuadroNS1Suma">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="50" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Cumplen" fieldSource="Cumplen" wizardCaption="Cumplen" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdIncCuadroNS1Cumplen">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="51" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="Meta" fieldSource="Meta" wizardCaption="Meta" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncCuadroNS1Meta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="52" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="pena" fieldSource="pena" wizardCaption="Pena" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncCuadroNS1pena">
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
				<Label id="54" fieldSourceType="DBColumn" dataType="Float" html="True" generateSpan="False" name="PctCumplimiento" PathID="grdIncCuadroNS1PctCumplimiento" format="0%">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ImgCumple" PathID="grdIncCuadroNS1ImgCumple">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="56"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="57"/>
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
				<SQLParameter id="78" dataType="Integer" defaultValue="0" designDefaultValue="3" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
<SQLParameter id="79" dataType="Integer" defaultValue="date(&quot;m&quot;)" designDefaultValue="1" parameterSource="s_MesReporte" parameterType="URL" variable="s_MesReporte"/>
<SQLParameter id="80" dataType="Integer" defaultValue="date(&quot;Y&quot;)" designDefaultValue="2014" parameterSource="s_AnioReporte" parameterType="URL" variable="s_AnioReporte"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="IncidentesCuadroNSxls.php" forShow="True" url="IncidentesCuadroNSxls.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="IncidentesCuadroNSxls_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="38" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="36"/>
			</Actions>
		</Event>
	</Events>
</Page>
