<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="Login.ccp">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="25" connection="cnDisenio" dataSource="select p.nombre
, s.nombre servicio
, q.id_incidente
, q.Cumple_DISP_SOPORTE 
, q.Cumple_Inc_TiempoAsignacion
, q.Cumple_Inc_TiempoSolucion
, q.MesReporte, q.AnioReporte
, q.Obs_Manuales
, i.Obs_Proceso
, q.descartar
, i.descartar descartadoAUT
, i.Paquete  
, i.severidad
, i.id_proveedor
, i.id_servicio
from calificacion_incidentes_mc q
	inner join calificacion_incidentes_aut  i on i.id_incidente    = q.id_incidente  
	inner join c_proveedor p on p.id_proveedor = i.id_proveedor 
	inner join c_servicio s on s.id_servicio  = i.id_servicio  
where q.id_incidente like '%%'
and (i.id_proveedor={s_id_proveedor} or 0={s_id_proveedor})
and (i.severidad={s_severidad} or {s_severidad}=0)
and (q.descartar= {s_descartar} or {s_descartar}=-1)
and case when i.Paquete   is null then '' else i.Paquete end like '%{s_Paquete}%'
and q.MesReporte = {s_MesReporte}
and q.AnioReporte = {s_AnioReporte}
" name="grdIncidentes" pageSizeLimit="100" wizardCaption=" Grid1 Lista de" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" PathID="grdIncidentes">
			<Components>
				<Sorter id="3" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="grdIncidentesSorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="4" visible="True" name="Sorter_servicio" column="servicio" wizardCaption="Servicio" wizardSortingType="SimpleDir" wizardControl="servicio" wizardAddNbsp="False" PathID="grdIncidentesSorter_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="5" visible="True" name="Sorter_id_incidente" column="id_incidente" wizardCaption="Id Incidente" wizardSortingType="SimpleDir" wizardControl="id_incidente" wizardAddNbsp="False" PathID="grdIncidentesSorter_id_incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="6" visible="True" name="Sorter_Cumple_DISP_SOPORTE" column="Cumple_DISP_SOPORTE" wizardCaption="Cumple DISP SOPORTE" wizardSortingType="SimpleDir" wizardControl="Cumple_DISP_SOPORTE" wizardAddNbsp="False" PathID="grdIncidentesSorter_Cumple_DISP_SOPORTE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_Cumple_Inc_TiempoAsignacion" column="Cumple_Inc_TiempoAsignacion" wizardCaption="Cumple Inc Tiempo Asignacion" wizardSortingType="SimpleDir" wizardControl="Cumple_Inc_TiempoAsignacion" wizardAddNbsp="False" PathID="grdIncidentesSorter_Cumple_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_Cumple_Inc_TiempoSolucion" column="Cumple_Inc_TiempoSolucion" wizardCaption="Cumple Inc Tiempo Solucion" wizardSortingType="SimpleDir" wizardControl="Cumple_Inc_TiempoSolucion" wizardAddNbsp="False" PathID="grdIncidentesSorter_Cumple_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="9" visible="True" name="Sorter_Obs_Proceso" column="Obs_Proceso" wizardCaption="Obs Proceso" wizardSortingType="SimpleDir" wizardControl="Obs_Proceso" wizardAddNbsp="False" PathID="grdIncidentesSorter_Obs_Proceso">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="10" visible="True" name="Sorter_descartar" column="descartar" wizardCaption="Descartar" wizardSortingType="SimpleDir" wizardControl="descartar" wizardAddNbsp="False" PathID="grdIncidentesSorter_descartar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="11" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="grdIncidentesSorter_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="12" visible="True" name="Sorter_severidad" column="severidad" wizardCaption="Severidad" wizardSortingType="SimpleDir" wizardControl="severidad" wizardAddNbsp="False" PathID="grdIncidentesSorter_severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="14" fieldSourceType="DBColumn" dataType="Text" html="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncidentesnombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" name="servicio" fieldSource="servicio" wizardCaption="Servicio" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncidentesservicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="id_incidente" fieldSource="id_incidente" wizardCaption="Id Incidente" wizardSize="17" wizardMaxLength="17" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncidentesid_incidente" visible="Yes" sourceType="Table" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="CalificaIncidenteCAPC.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<LinkParameters>
						<LinkParameter id="52" sourceType="DataField" name="id_incidente" source="id_incidente"/>
					</LinkParameters>
				</Link>
				<Label id="17" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="Cumple_DISP_SOPORTE" fieldSource="Cumple_DISP_SOPORTE" wizardCaption="Cumple DISP SOPORTE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncidentesCumple_DISP_SOPORTE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="18" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="Cumple_Inc_TiempoAsignacion" fieldSource="Cumple_Inc_TiempoAsignacion" wizardCaption="Cumple Inc Tiempo Asignacion" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncidentesCumple_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="Cumple_Inc_TiempoSolucion" fieldSource="Cumple_Inc_TiempoSolucion" wizardCaption="Cumple Inc Tiempo Solucion" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncidentesCumple_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="Obs_Proceso" fieldSource="Obs_Manuales" wizardCaption="Obs Proceso" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncidentesObs_Proceso">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="descartar" fieldSource="descartar" wizardCaption="Descartar" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncidentesdescartar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="Paquete" fieldSource="Paquete" wizardCaption="Paquete" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdIncidentesPaquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Integer" html="False" name="severidad" fieldSource="severidad" wizardCaption="Severidad" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdIncidentesseveridad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="24" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}" PathID="grdIncidentesNavigator">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="13" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="id_incidente" parameterSource="s_id_incidente" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
				<TableParameter id="29" conditionType="Parameter" useIsNull="False" field="id_proveedor" parameterSource="s_id_proveedor" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="2"/>
				<TableParameter id="30" conditionType="Parameter" useIsNull="False" field="severidad" parameterSource="s_severidad" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3"/>
				<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="descartar" parameterSource="s_descartar" dataType="Boolean" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="4"/>
				<TableParameter id="32" conditionType="Parameter" useIsNull="False" field="Paquete" parameterSource="s_Paquete" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="5"/>
				<TableParameter id="33" conditionType="Parameter" useIsNull="False" field="MesReporte" parameterSource="s_MesReporte" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="6"/>
				<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="AnioReporte" parameterSource="s_AnioReporte" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="7"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="45" parameterType="URL" variable="s_id_incidente" dataType="Text" parameterSource="s_id_incidente"/>
				<SQLParameter id="46" parameterType="URL" variable="s_id_proveedor" dataType="Integer" parameterSource="s_id_proveedor" defaultValue="0"/>
				<SQLParameter id="47" parameterType="URL" variable="s_severidad" dataType="Integer" parameterSource="s_severidad" defaultValue="0"/>
				<SQLParameter id="48" parameterType="URL" variable="s_descartar" dataType="Integer" parameterSource="s_descartar" defaultValue="0"/>
				<SQLParameter id="49" parameterType="URL" variable="s_Paquete" dataType="Text" parameterSource="s_Paquete"/>
				<SQLParameter id="50" parameterType="URL" variable="s_MesReporte" dataType="Integer" parameterSource="s_MesReporte" defaultValue="date(&quot;m&quot;)"/>
				<SQLParameter id="51" parameterType="URL" variable="s_AnioReporte" dataType="Integer" parameterSource="s_AnioReporte" defaultValue="date(&quot;Y&quot;)"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
			<PKFields/>
		</Grid>
		<Record id="35" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="grdIncidentes1" wizardCaption=" Grd Incidentes Buscar" wizardOrientation="Horizontal" wizardFormMethod="post" PathID="grdIncidentes1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" returnPage="IncidentesCalificados.ccp">
			<Components>
				<Link id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="IncidentesCalificados.ccp" removeParameters="s_id_incidente;s_id_proveedor;s_severidad;s_descartar;s_Paquete;s_MesReporte;s_AnioReporte" wizardThemeItem="SorterLink" wizardDefaultValue="Limpiar" PathID="grdIncidentes1ClearParameters">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Button id="37" urlType="Relative" enableValidation="True" isDefault="True" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="grdIncidentes1Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_id_incidente" wizardCaption="Id Incidente" wizardSize="17" wizardMaxLength="17" wizardIsPassword="False" PathID="grdIncidentes1s_id_incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_severidad" wizardCaption="Severidad" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="grdIncidentes1s_severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_descartar" wizardCaption="Descartar" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" PathID="grdIncidentes1s_descartar" sourceType="ListOfValues" connection="cnDisenio" _valueOfList="-1" _nameOfList="Todos" dataSource="1;Descartados;0;No Descartados;-1;Todos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
				</ListBox>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Paquete" wizardCaption="Paquete" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" PathID="grdIncidentes1s_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="39" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" wizardCaption="Id Proveedor" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" PathID="grdIncidentes1s_id_proveedor" connection="cnDisenio" dataSource="c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
					<PKFields/>
				</ListBox>
				<ListBox id="43" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_MesReporte" wizardCaption="Mes Reporte" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" PathID="grdIncidentes1s_MesReporte" connection="cnDisenio" dataSource="C_Mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date(&quot;m&quot;, strtotime(&quot;-2 months&quot;))">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
					<PKFields/>
				</ListBox>
				<ListBox id="44" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_AnioReporte" wizardCaption="Anio Reporte" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" PathID="grdIncidentes1s_AnioReporte" connection="cnDisenio" dataSource="c_ano" boundColumn="Ano" textColumn="Ano" defaultValue="date(&quot;Y&quot;)">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
					<PKFields/>
				</ListBox>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
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
			<PKFields/>
		</Record>
		<IncludePage id="53" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="IncidentesCalificados_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="IncidentesCalificados.php" forShow="True" url="IncidentesCalificados.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
