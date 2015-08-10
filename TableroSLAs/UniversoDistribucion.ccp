<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0" accessDeniedPage="UniversoLista.ccp">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="22" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_proveedor_mc_EfPresu" searchIds="22" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_universo_cds" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="True" wizardResultsForm="mc_c_proveedor_mc_EfPresu" returnPage="UniversoDistribucion.ccp" PathID="mc_c_proveedor_mc_EfPresu">
			<Components>
				<Button id="23" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_c_proveedor_mc_EfPresuButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="24" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" PathID="mc_c_proveedor_mc_EfPresus_id_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="39" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="38" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="40" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="41" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_numero" fieldSource="numero" wizardIsPassword="False" wizardCaption="Numero" caption="Numero" required="False" unique="False" wizardSize="25" wizardMaxLength="25" PathID="mc_c_proveedor_mc_EfPresus_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="26" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="s_tipo" fieldSource="tipo" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Tipo" caption="Tipo" required="False" unique="False" PathID="mc_c_proveedor_mc_EfPresus_tipo" dataSource="IN;Incidente;PA;PPMC de Apertura;PC;PPMC de Cierre">
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
				<ListBox id="27" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_mes" fieldSource="mes" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mes" caption="Mes" required="False" unique="False" PathID="mc_c_proveedor_mc_EfPresus_mes" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date(&quot;m&quot;)-2">
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
				<ListBox id="28" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_anio" fieldSource="anio" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Anio" caption="Anio" required="False" unique="False" PathID="mc_c_proveedor_mc_EfPresus_anio" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="date(&quot;Y&quot;)">
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
				<ListBox id="29" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_analista" fieldSource="analista" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Analista" caption="Analista" required="False" unique="False" PathID="mc_c_proveedor_mc_EfPresus_analista" connection="cnDisenio" dataSource="mc_c_usuarios" boundColumn="Usuario" textColumn="Usuario">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="149" conditionType="Parameter" useIsNull="False" dataType="Text" defaultValue="'CAPC'" field="Grupo" logicOperator="And" parameterSource="Grupo" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="150" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Activo" logicOperator="And" parameterSource="1" parameterType="Expression" searchConditionType="Equal"/>
</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="148" posHeight="180" posLeft="10" posTop="10" posWidth="118" tableName="mc_c_usuarios"/>
</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="151" fieldName="*"/>
</Fields>
					<PKFields>
						<PKField id="152" dataType="Integer" fieldName="Id" tableName="mc_c_usuarios"/>
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
		<EditableGrid id="3" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" sourceType="SQL" defaultPageSize="25" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_universo_cds" connection="cnDisenio" dataSource="SELECT mc_universo_cds.*, mc_c_proveedor.nombre , m.mes NombreMes
FROM mc_universo_cds 
	INNER JOIN mc_c_proveedor ON  mc_universo_cds.id_proveedor = mc_c_proveedor.id_proveedor 
	left join mc_c_mes m on m.idMes = mc_universo_cds.mes 
where (mc_universo_cds.id_proveedor={s_id_proveedor} or 0={s_id_proveedor})
	and (mc_universo_cds.analista like '%{s_analista}%' or '{s_analista}' ='')
	and (mc_universo_cds.anio = {s_anio} or 0={s_anio})
	and (mc_universo_cds.mes = {s_mes} or 0={s_mes})
	and (mc_universo_cds.tipo like '%{s_tipo}%')
	and (mc_universo_cds.numero like '%{s_numero}%')
	and (mc_universo_cds.tipo like 'IN')" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="Distribucion Universo" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="mc_universo_cds" customUpdateType="Table" customUpdate="mc_universo_cds" activeCollection="UFormElements" activeTableType="mc_universo_cds">
			<Components>
				<Sorter id="6" visible="True" name="Sorter_id" column="id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="id" wizardAddNbsp="False" PathID="mc_universo_cdsSorter_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_id_proveedor" column="id_proveedor" wizardCaption="Id Proveedor" wizardSortingType="SimpleDir" wizardControl="id_proveedor" wizardAddNbsp="False" PathID="mc_universo_cdsSorter_id_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_numero" column="numero" wizardCaption="Numero" wizardSortingType="SimpleDir" wizardControl="numero" wizardAddNbsp="False" PathID="mc_universo_cdsSorter_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="9" visible="True" name="Sorter_tipo" column="tipo" wizardCaption="Tipo" wizardSortingType="SimpleDir" wizardControl="tipo" wizardAddNbsp="False" PathID="mc_universo_cdsSorter_tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="10" visible="True" name="Sorter_mes" column="mes" wizardCaption="Mes" wizardSortingType="SimpleDir" wizardControl="mes" wizardAddNbsp="False" PathID="mc_universo_cdsSorter_mes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="11" visible="True" name="Sorter_anio" column="anio" wizardCaption="Anio" wizardSortingType="SimpleDir" wizardControl="anio" wizardAddNbsp="False" PathID="mc_universo_cdsSorter_anio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="12" visible="True" name="Sorter_analista" column="analista" wizardCaption="Analista" wizardSortingType="SimpleDir" wizardControl="analista" wizardAddNbsp="False" PathID="mc_universo_cdsSorter_analista">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="13" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id" fieldSource="id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id" PathID="mc_universo_cdsid">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="14" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="id_proveedor" fieldSource="nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id Proveedor" PathID="mc_universo_cdsid_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="numero" fieldSource="numero" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Numero" PathID="mc_universo_cdsnumero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo" fieldSource="tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Tipo" PathID="mc_universo_cdstipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mes" fieldSource="NombreMes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Mes" PathID="mc_universo_cdsmes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="18" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="anio" fieldSource="anio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Anio" PathID="mc_universo_cdsanio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ListBox id="19" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Text" returnValueType="Number" name="analista" fieldSource="analista" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Analista" caption="Analista" required="False" unique="False" connection="cnDisenio" PathID="mc_universo_cdsanalista" dataSource="SELECT * 
FROM mc_c_usuarios
WHERE Grupo = '{Grupo}'
AND Activo = {Expr0} 
   OR usuario IN (
     SELECT DISTINCT analista 
     FROM mc_universo_cds 
     WHERE mes = {sMes}  AND anio = {sAnio} )
" boundColumn="Usuario" textColumn="Usuario">
					<Components/>
					<Events/>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters>
						<SQLParameter id="144" dataType="Text" defaultValue="'CAPC'" parameterSource="Grupo" parameterType="URL" variable="Grupo"/>
<SQLParameter id="145" dataType="Integer" defaultValue="0" designDefaultValue="1" parameterSource="1" parameterType="Expression" variable="Expr0"/>
<SQLParameter id="146" dataType="Integer" defaultValue="0" designDefaultValue="5" parameterSource="s_mes" parameterType="URL" variable="sMes"/>
<SQLParameter id="147" dataType="Integer" defaultValue="0" designDefaultValue="2014" parameterSource="s_anio" parameterType="URL" variable="sAnio"/>
</SQLParameters>
					<JoinTables>
					</JoinTables>
					<JoinLinks/>
					<Fields>
					</Fields>
					<PKFields>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Navigator id="20" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="21" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="mc_universo_cdsButton_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="42" fieldSourceType="DBColumn" dataType="Text" name="hdID" PathID="mc_universo_cdshdID" fieldSource="id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="43" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descartar_manual" PathID="mc_universo_cdsdescartar_manual" fieldSource="descartar_manual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="45" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="NumFila" PathID="mc_universo_cdsNumFila">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="46" fieldSourceType="CodeExpression" dataType="Text" html="False" generateSpan="False" name="TotalRecords" wizardUseTemplateBlock="False" PathID="mc_universo_cdsTotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="47" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="notas_manual" PathID="mc_universo_cdsnotas_manual" fieldSource="notas_manual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="Medido" PathID="mc_universo_cdsMedido" fieldSource="Medido" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Button id="110" urlType="Relative" enableValidation="True" isDefault="False" name="Button1" PathID="mc_universo_cdsButton1">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="111"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="48"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="93" dataType="Integer" defaultValue="0" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="94" dataType="Text" parameterSource="s_analista" parameterType="URL" variable="s_analista"/>
				<SQLParameter id="95" dataType="Integer" defaultValue="date(&quot;Y&quot;)" designDefaultValue="2014" parameterSource="s_anio" parameterType="URL" variable="s_anio"/>
				<SQLParameter id="96" dataType="Integer" defaultValue="date(&quot;m&quot;)-2" designDefaultValue="1" parameterSource="s_mes" parameterType="URL" variable="s_mes"/>
				<SQLParameter id="97" dataType="Text" designDefaultValue="PA" parameterSource="s_tipo" parameterType="URL" variable="s_tipo"/>
				<SQLParameter id="98" dataType="Text" parameterSource="s_numero" parameterType="URL" variable="s_numero"/>
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
			<UConditions>
				<TableParameter id="55" conditionType="Parameter" useIsNull="False" field="id" dataType="Integer" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="hdID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="56" field="analista" dataType="Text" parameterType="Control" parameterSource="analista"/>
				<CustomParameter id="108" field="Medido" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Medido"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
		<EditableGrid id="57" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" sourceType="SQL" defaultPageSize="25" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_universo_cds1" connection="cnDisenio" dataSource="SELECT mc_universo_cds.*, mc_c_proveedor.nombre , m.mes NombreMes
FROM mc_universo_cds 
	INNER JOIN mc_c_proveedor ON  mc_universo_cds.id_proveedor = mc_c_proveedor.id_proveedor 
	left join mc_c_mes m on m.idMes = mc_universo_cds.mes 
where (mc_universo_cds.id_proveedor={s_id_proveedor} or 0={s_id_proveedor})
	and (mc_universo_cds.analista like '%{s_analista}%' or '{s_analista}' ='')
	and (mc_universo_cds.anio = {s_anio} or 0={s_anio})
	and (mc_universo_cds.mes = {s_mes} or 0={s_mes})
	and (mc_universo_cds.tipo like '%{s_tipo}%')
	and (mc_universo_cds.numero like '%{s_numero}%')
	and (mc_universo_cds.tipo not like 'IN')" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="Distribucion Universo" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="mc_universo_cds1" customUpdateType="Table" customUpdate="mc_universo_cds" activeCollection="UFormElements" activeTableType="mc_universo_cds">
			<Components>
				<Sorter id="58" visible="True" name="Sorter_id" column="id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="id" wizardAddNbsp="False" PathID="mc_universo_cds1Sorter_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="59" visible="True" name="Sorter_id_proveedor" column="id_proveedor" wizardCaption="Id Proveedor" wizardSortingType="SimpleDir" wizardControl="id_proveedor" wizardAddNbsp="False" PathID="mc_universo_cds1Sorter_id_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="60" visible="True" name="Sorter_numero" column="numero" wizardCaption="Numero" wizardSortingType="SimpleDir" wizardControl="numero" wizardAddNbsp="False" PathID="mc_universo_cds1Sorter_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="61" visible="True" name="Sorter_tipo" column="tipo" wizardCaption="Tipo" wizardSortingType="SimpleDir" wizardControl="tipo" wizardAddNbsp="False" PathID="mc_universo_cds1Sorter_tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="62" visible="True" name="Sorter_mes" column="mes" wizardCaption="Mes" wizardSortingType="SimpleDir" wizardControl="mes" wizardAddNbsp="False" PathID="mc_universo_cds1Sorter_mes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="63" visible="True" name="Sorter_anio" column="anio" wizardCaption="Anio" wizardSortingType="SimpleDir" wizardControl="anio" wizardAddNbsp="False" PathID="mc_universo_cds1Sorter_anio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="64" visible="True" name="Sorter_analista" column="analista" wizardCaption="Analista" wizardSortingType="SimpleDir" wizardControl="analista" wizardAddNbsp="False" PathID="mc_universo_cds1Sorter_analista">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="65" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id" fieldSource="id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id" PathID="mc_universo_cds1id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="66" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="id_proveedor" fieldSource="nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id Proveedor" PathID="mc_universo_cds1id_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="67" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="numero" fieldSource="numero" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Numero" PathID="mc_universo_cds1numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="68" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo" fieldSource="tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Tipo" PathID="mc_universo_cds1tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="69" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mes" fieldSource="NombreMes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Mes" PathID="mc_universo_cds1mes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="70" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="anio" fieldSource="anio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Anio" PathID="mc_universo_cds1anio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ListBox id="71" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Text" returnValueType="Number" name="analista" fieldSource="analista" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Analista" caption="Analista" required="False" unique="False" connection="cnDisenio" PathID="mc_universo_cds1analista" dataSource="SELECT * 
FROM mc_c_usuarios
WHERE Grupo = '{Grupo}'
AND Activo = {Expr0} 
	or usuario in (
select distinct  analista 
from mc_universo_cds 
where mes = {sMes} and anio = {sAnio})" boundColumn="Usuario" textColumn="Usuario">
					<Components/>
					<Events/>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters>
						<SQLParameter id="153" dataType="Text" defaultValue="'CAPC'" parameterSource="Grupo" parameterType="URL" variable="Grupo"/>
<SQLParameter id="154" dataType="Integer" defaultValue="0" designDefaultValue="1" parameterSource="1" parameterType="Expression" variable="Expr0"/>
<SQLParameter id="155" dataType="Integer" defaultValue="0" designDefaultValue="5" parameterSource="s_mes" parameterType="URL" variable="sMes"/>
<SQLParameter id="156" dataType="Integer" defaultValue="0" designDefaultValue="2014" parameterSource="s_anio" parameterType="URL" variable="sAnio"/>
</SQLParameters>
					<JoinTables>
					</JoinTables>
					<JoinLinks/>
					<Fields>
					</Fields>
					<PKFields>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Navigator id="76" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="77" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="mc_universo_cds1Button_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="78" fieldSourceType="DBColumn" dataType="Text" name="hdID" PathID="mc_universo_cds1hdID" fieldSource="id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="79" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descartar_manual" PathID="mc_universo_cds1descartar_manual" fieldSource="descartar_manual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="81" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="NumFila" PathID="mc_universo_cds1NumFila">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="82" fieldSourceType="CodeExpression" dataType="Text" html="False" generateSpan="False" name="TotalRecords" wizardUseTemplateBlock="False" PathID="mc_universo_cds1TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="83" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="80" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="notas_manual" PathID="mc_universo_cds1notas_manual" fieldSource="notas_manual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="107" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="Medido" PathID="mc_universo_cds1Medido" fieldSource="Medido" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Button id="112" urlType="Relative" enableValidation="True" isDefault="False" name="Button1" PathID="mc_universo_cds1Button1">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="113"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="84"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="99" dataType="Integer" defaultValue="0" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="100" dataType="Text" parameterSource="s_analista" parameterType="URL" variable="s_analista"/>
				<SQLParameter id="101" dataType="Integer" defaultValue="date(&quot;Y&quot;)" designDefaultValue="2014" parameterSource="s_anio" parameterType="URL" variable="s_anio"/>
				<SQLParameter id="102" dataType="Integer" defaultValue="date(&quot;m&quot;)-2" designDefaultValue="1" parameterSource="s_mes" parameterType="URL" variable="s_mes"/>
				<SQLParameter id="103" dataType="Text" designDefaultValue="PA" parameterSource="s_tipo" parameterType="URL" variable="s_tipo"/>
				<SQLParameter id="104" dataType="Text" parameterSource="s_numero" parameterType="URL" variable="s_numero"/>
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
			<UConditions>
				<TableParameter id="91" conditionType="Parameter" useIsNull="False" field="id" dataType="Integer" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="hdID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="92" field="analista" dataType="Text" parameterType="Control" parameterSource="analista"/>
				<CustomParameter id="109" field="Medido" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Medido"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="UniversoDistribucion.php" forShow="True" url="UniversoDistribucion.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="UniversoDistribucion_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="133" groupID="4"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
