<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_calificacion_capc" connection="cnDisenio" dataSource="mc_calificacion_capc" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Agregar/Editar Universo CAPC" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_calificacion_capc">
			<Components>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_calificacion_capcButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_calificacion_capcButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="6" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="mc_calificacion_capcButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="numero" fieldSource="numero" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Numero" caption="Numero" required="True" unique="False" wizardSize="25" wizardMaxLength="25" PathID="mc_calificacion_capcnumero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="8" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="mes" fieldSource="mes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Mes" caption="Mes" required="True" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcmes" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
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
				<ListBox id="9" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="anio" fieldSource="anio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Anio" caption="Anio" required="True" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcanio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano">
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
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="IdEstimacion" fieldSource="IdEstimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Estimacion" caption="Id Estimacion" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_calificacion_capcIdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="SLO" fieldSource="SLO" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="SLO" checkedValue="1" uncheckedValue="0" PathID="mc_calificacion_capcSLO" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<ListBox id="12" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="id_tipo" fieldSource="id_tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Tipo" caption="Id Tipo" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcid_tipo" dataSource="mc_c_TipoPPMC" boundColumn="Id" textColumn="Descripcion">
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
				<ListBox id="87" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="analista" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcanalista" fieldSource="analista" connection="cnDisenio" dataSource="mc_c_usuarios" boundColumn="Usuario" textColumn="Usuario">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="97" conditionType="Parameter" useIsNull="False" dataType="Text" field="Grupo" logicOperator="And" parameterSource="'CAPC'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="96" posHeight="180" posLeft="10" posTop="10" posWidth="118" tableName="mc_c_usuarios"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="98" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="99" dataType="Integer" fieldName="Id" tableName="mc_c_usuarios"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<Hidden id="100" fieldSourceType="DBColumn" dataType="Integer" name="id_proveedor" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_capcid_proveedor" fieldSource="id_proveedor" defaultValue="1">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="89" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id" logicOperator="And" orderNumber="1" parameterSource="id" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="88" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="mc_calificacion_capc"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="90" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="91" dataType="Integer" fieldName="id" tableName="mc_calificacion_capc"/>
			</PKFields>
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
		<Grid id="17" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="mc_c_mes_mc_calificacion" connection="cnDisenio" dataSource="SELECT numero, mc_calificacion_capc.mes AS mc_calificacion_capc_mes, anio, IdEstimacion, SLO, mc_c_mes.Mes AS mc_c_mes_Mes, id 
FROM mc_calificacion_capc INNER JOIN mc_c_mes ON
mc_calificacion_capc.mes = mc_c_mes.IdMes
WHERE mc_calificacion_capc.numero LIKE '%{s_numero}%'
AND (IdMes = {s_mc_calificacion_capc_mes} or 0 = {s_mc_calificacion_capc_mes})
AND (mc_calificacion_capc.anio = {s_anio} or 0 = {s_anio})
AND (mc_calificacion_capc.SLO = {s_SLO} )" pageSizeLimit="100" pageSize="True" wizardCaption="Universo CAPC" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Centered" wizardUseSearch="True" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="mc_c_mes_mc_calificacion" composition="9" isParent="True">
			<Components>
				<Sorter id="34" visible="True" name="Sorter_numero" column="numero" wizardCaption="Numero" wizardSortingType="SimpleDir" wizardControl="numero" wizardAddNbsp="False" PathID="mc_c_mes_mc_calificacionSorter_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="35" visible="True" name="Sorter_mc_c_mes_Mes" column="mc_c_mes_Mes" wizardCaption="Mc C Mes Mes" wizardSortingType="SimpleDir" wizardControl="mc_c_mes_Mes" wizardAddNbsp="False" PathID="mc_c_mes_mc_calificacionSorter_mc_c_mes_Mes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="36" visible="True" name="Sorter_anio" column="anio" wizardCaption="Anio" wizardSortingType="SimpleDir" wizardControl="anio" wizardAddNbsp="False" PathID="mc_c_mes_mc_calificacionSorter_anio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="37" visible="True" name="Sorter_IdEstimacion" column="IdEstimacion" wizardCaption="Id Estimacion" wizardSortingType="SimpleDir" wizardControl="IdEstimacion" wizardAddNbsp="False" PathID="mc_c_mes_mc_calificacionSorter_IdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="38" visible="True" name="Sorter_SLO" column="SLO" wizardCaption="SLO" wizardSortingType="SimpleDir" wizardControl="SLO" wizardAddNbsp="False" PathID="mc_c_mes_mc_calificacionSorter_SLO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="39" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="numero" fieldSource="numero" wizardCaption="Numero" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_mes_mc_calificacionnumero" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" linkProperties="{'textSource':'','textSourceDB':'numero','hrefSource':'','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="81" sourceType="DataField" name="id" source="id"/>
					</LinkParameters>
				</Link>
				<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mc_c_mes_Mes" fieldSource="mc_c_mes_Mes" wizardCaption="Mc C Mes Mes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_mes_mc_calificacionmc_c_mes_Mes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="41" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="anio" fieldSource="anio" wizardCaption="Anio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_mes_mc_calificacionanio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="42" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="IdEstimacion" fieldSource="IdEstimacion" wizardCaption="Id Estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_mes_mc_calificacionIdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="SLO" fieldSource="SLO" wizardCaption="SLO" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_mes_mc_calificacionSLO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="44" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="82" dataType="Text" parameterSource="s_numero" parameterType="URL" variable="s_numero"/>
				<SQLParameter id="83" dataType="Integer" defaultValue="0" parameterSource="s_mc_calificacion_capc_mes" parameterType="URL" variable="s_mc_calificacion_capc_mes"/>
				<SQLParameter id="84" dataType="Integer" defaultValue="0" parameterSource="s_anio" parameterType="URL" variable="s_anio"/>
				<SQLParameter id="85" dataType="Integer" defaultValue="0" parameterSource="s_SLO" parameterType="URL" variable="s_SLO"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="45" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_mes_mc_calificacion1" searchIds="45" fictitiousConnection="cnDisenio" wizardCaption="  Buscar" wizardOrientation="Vertical" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardType="Grid" returnPage="SLAsCAPCUniverso.ccp" PathID="mc_c_mes_mc_calificacion1" composition="1">
			<Components>
				<Button id="46" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_c_mes_mc_calificacion1Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_numero" fieldSource="numero" wizardIsPassword="False" wizardCaption="Numero" caption="Numero" required="False" unique="False" wizardSize="25" wizardMaxLength="25" PathID="mc_c_mes_mc_calificacion1s_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="48" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_mc_calificacion_capc_mes" fieldSource="mc_calificacion_capc_mes" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mc Calificacion Capc Mes" caption="Mc Calificacion Capc Mes" required="False" unique="False" PathID="mc_c_mes_mc_calificacion1s_mc_calificacion_capc_mes" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
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
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_anio" fieldSource="anio" wizardIsPassword="False" wizardCaption="Anio" caption="Anio" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_c_mes_mc_calificacion1s_anio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_SLO" fieldSource="SLO" wizardIsPassword="False" wizardCaption="SLO" caption="SLO" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_c_mes_mc_calificacion1s_SLO" defaultValue="Unchecked" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
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
		<IncludePage id="86" name="SLAsCAPCMenu" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="SLAsCAPCMenu" page="SLAsCAPCMenu.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="SLAsCAPCUniverso.php" forShow="True" url="SLAsCAPCUniverso.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
