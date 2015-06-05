<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="20" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_universo_cds" searchIds="20" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_universo_cds" wizardCaption="  Buscar Incidentes" changedCaptionSearch="True" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="mc_universo_cds">
			<Components>
				<Button id="21" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_universo_cdsButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_numero" fieldSource="numero" wizardIsPassword="False" wizardCaption="Numero" caption="Numero" required="False" unique="False" wizardSize="25" wizardMaxLength="25" PathID="mc_universo_cdss_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="23" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_mes" fieldSource="mes" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mes" caption="Mes" required="False" unique="False" PathID="mc_universo_cdss_mes" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="CCGetParam(&quot;s_mes&quot;)">
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
				<ListBox id="24" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_anio" fieldSource="anio" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Anio" caption="Anio" required="False" unique="False" PathID="mc_universo_cdss_anio" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="CCGetParam(&quot;s_anio&quot;)">
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
		<EditableGrid id="3" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="False" allowDelete="True" validateData="True" preserveParameters="GET" sourceType="SQL" defaultPageSize="25" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="EditableGrid1" connection="cnDisenio" dataSource="
select distinct d.id_incidente, paquete, FechaAsignado , u.id_proveedor
from mc_detalle_incidente_avl d
	inner join mc_universo_cds u on  u.numero = d.id_incidente
	and month(d.FechaCarga )= u.mes  and YEAR(d.FechaCarga) = u.anio 
	inner join mc_info_incidentes i on i.id_incidente = u.numero 
	and month(i.FechaCarga )= u.mes  and YEAR(i.FechaCarga) = u.anio 
where mes= {s_mes} and anio = {s_anio}
	and tipo='IN'
and Paquete in (
	select Paquete
	from mc_detalle_incidente_avl 
		inner join mc_universo_cds u on u.mes = MONTH(FechaCarga) and u.anio = YEAR(FechaCarga) and u.numero = Id_Incidente 
	where month(FechaCarga )= u.mes  and YEAR(FechaCarga) = u.anio 
	group by Paquete 
	having count(distinct id_incidente) &gt;1
) 
and d.Id_Incidente not in (select inc_principal from mc_incidentes_relacionados )
and (paquete = '{s_numero}' or ''='{s_numero}')
order by 2,3
" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="Incidentes con paquetes relacionados" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="id_incidente" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="EditableGrid1" deleteControl="CheckBox_Delete" customDeleteType="SQL" parameterTypeListName="CustomTableParameterTypeList" activeCollection="DSQLParameters" customDelete="select 1">
			<Components>
				<Sorter id="5" visible="True" name="Sorter_id_incidente" column="id_incidente" wizardCaption="Id Incidente" wizardSortingType="SimpleDir" wizardControl="id_incidente" wizardAddNbsp="False" PathID="EditableGrid1Sorter_id_incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="6" visible="True" name="Sorter_paquete" column="paquete" wizardCaption="Paquete" wizardSortingType="SimpleDir" wizardControl="paquete" wizardAddNbsp="False" PathID="EditableGrid1Sorter_paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_FechaCarga" column="FechaAsignado" wizardCaption="Fecha Carga" wizardSortingType="SimpleDir" wizardControl="FechaCarga" wizardAddNbsp="False" PathID="EditableGrid1Sorter_FechaCarga">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="8" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="id_incidente" fieldSource="id_incidente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id Incidente" PathID="EditableGrid1id_incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="9" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="paquete" fieldSource="paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Paquete" PathID="EditableGrid1paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="10" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaCarga" fieldSource="FechaAsignado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Fecha Carga" format="dd/mm/yyyy HH:nn" PathID="EditableGrid1FechaCarga" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Panel id="11" visible="True" generateDiv="False" name="CheckBox_Delete_Panel">
					<Components>
						<CheckBox id="12" visible="Dynamic" fieldSourceType="CodeExpression" dataType="Boolean" defaultValue="Unchecked" name="CheckBox_Delete" checkedValue="true" uncheckedValue="false" wizardCaption="Borrar" wizardAddNbsp="True" PathID="EditableGrid1CheckBox_Delete_PanelCheckBox_Delete">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
				<Navigator id="13" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="14" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="EditableGrid1Button_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="16" fieldSourceType="DBColumn" dataType="Text" name="hdIdIncidente" PathID="EditableGrid1hdIdIncidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="25" fieldSourceType="DBColumn" dataType="Text" name="hdPaquete" PathID="EditableGrid1hdPaquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="15" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="17" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="42" dataType="Integer" defaultValue="0" designDefaultValue="7" parameterSource="s_mes" parameterType="URL" variable="s_mes"/>
<SQLParameter id="43" dataType="Integer" defaultValue="date('Y')" designDefaultValue="2014" parameterSource="s_anio" parameterType="URL" variable="s_anio"/>
<SQLParameter id="44" dataType="Text" parameterSource="s_numero" parameterType="URL" variable="s_numero"/>
</SQLParameters>
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
			<DSQLParameters>
				<SQLParameter id="18" variable="CheckBox_Delete" parameterType="Control" dataType="Text" parameterSource="CheckBox_Delete"/>
				<SQLParameter id="19" variable="hdIdIncidente" parameterType="Control" dataType="Text" parameterSource="hdIdIncidente"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
		<Grid id="29" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="25" name="Grid1" connection="cnDisenio" dataSource="select i.* 
from mc_universo_cds u 
	inner join mc_incidentes_relacionados i on i.inc_principal = u.numero 
where u.mes= {s_mes} and u.anio = {s_anio}
      " pageSizeLimit="100" pageSize="False" wizardCaption="Incidentes Relacionados" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="Grid1">
			<Components>
				<Sorter id="32" visible="True" name="Sorter_Id" column="Id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="Id" wizardAddNbsp="False" PathID="Grid1Sorter_Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="33" visible="True" name="Sorter_Inc_Principal" column="Inc_Principal" wizardCaption="Inc Principal" wizardSortingType="SimpleDir" wizardControl="Inc_Principal" wizardAddNbsp="False" PathID="Grid1Sorter_Inc_Principal">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="34" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="Grid1Sorter_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="35" visible="True" name="Sorter_Inc_Secundario" column="Inc_Secundario" wizardCaption="Inc Secundario" wizardSortingType="SimpleDir" wizardControl="Inc_Secundario" wizardAddNbsp="False" PathID="Grid1Sorter_Inc_Secundario">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="36" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Id" fieldSource="Id" wizardCaption="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Inc_Principal" fieldSource="Inc_Principal" wizardCaption="Inc Principal" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1Inc_Principal">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="38" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardCaption="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Inc_Secundario" fieldSource="Inc_Secundario" wizardCaption="Inc Secundario" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1Inc_Secundario">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="40" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="False" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="41"/>
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
				<SQLParameter id="30" dataType="Integer" defaultValue="0" designDefaultValue="7" parameterSource="s_mes" parameterType="URL" variable="s_mes"/>
				<SQLParameter id="31" dataType="Integer" defaultValue="0" designDefaultValue="2014" parameterSource="s_anio" parameterType="URL" variable="s_anio"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="IncidentesRelacionados.php" forShow="True" url="IncidentesRelacionados.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="IncidentesRelacionados_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
