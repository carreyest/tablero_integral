<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\Catalogos" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="mc_c_servicio" connection="cnDisenio" dataSource="mc_c_servicio" pageSizeLimit="100" pageSize="True" wizardCaption="Servicios de Negocio" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="True" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="GridRecord" wizardGridRecordLinkFieldType="field" wizardGridRecordLinkField="id_servicio" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="mc_c_servicio" composition="1" isParent="True">
<Components>
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="mc_c_servicio_Insert" hrefSource="ServiciosNegocio.ccp" removeParameters="id_servicio" wizardThemeItem="FooterA" wizardDefaultValue="Agregar Nuevo" wizardUseTemplateBlock="False" PathID="mc_c_serviciomc_c_servicio_Insert">
<Components/>
<Events/>
<LinkParameters/>
<Attributes/>
<Features/>
</Link>
<Label id="8" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mc_c_servicio_TotalRecords" wizardUseTemplateBlock="False" PathID="mc_c_serviciomc_c_servicio_TotalRecords">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Retrieve number of records" actionCategory="Database" id="9"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Label>
<Sorter id="11" visible="True" name="Sorter_id_servicio" column="id_servicio" wizardCaption="Id Servicio" wizardSortingType="SimpleDir" wizardControl="id_servicio" wizardAddNbsp="False" PathID="mc_c_servicioSorter_id_servicio">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="12" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="mc_c_servicioSorter_nombre">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Link id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="id_servicio" fieldSource="id_servicio" wizardCaption="Id Servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" linkProperties="''" wizardAlign="right" wizardAddNbsp="True" wizardThemeItem="GridA" PathID="mc_c_servicioid_servicio">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="14" sourceType="DataField" format="yyyy-mm-dd" name="id_servicio" source="id_servicio"/>
</LinkParameters>
<Attributes/>
<Features/>
</Link>
<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_servicionombre">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="17" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
</Components>
<Events/>
<TableParameters>
<TableParameter id="5" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="2" field="id_tipo_servicio" logicOperator="And" parameterSource="id_tipo_servicio" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="nombre" parameterSource="s_nombre" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1" searchFormParameter="True"/>
</TableParameters>
<JoinTables>
<JoinTable id="4" posHeight="136" posLeft="10" posTop="10" posWidth="117" tableName="mc_c_servicio"/>
</JoinTables>
<JoinLinks/>
<Fields>
<Field id="6" tableName="mc_c_servicio" fieldName="id_servicio"/>
<Field id="15" tableName="mc_c_servicio" fieldName="nombre"/>
</Fields>
<PKFields/>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="18" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_servicioSearch" searchIds="18" fictitiousConnection="cnDisenio" wizardCaption="  Buscar" wizardOrientation="Vertical" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardType="GridRecord" returnPage="ServiciosNegocio.ccp" PathID="mc_c_servicioSearch" composition="1">
<Components>
<Button id="19" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_c_servicioSearchButton_DoSearch">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<TextBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_nombre" fieldSource="nombre" wizardIsPassword="False" wizardCaption="Nombre" caption="Nombre" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_c_servicioSearchs_nombre">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
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
<Record id="21" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_servicio1" connection="cnDisenio" dataSource="mc_c_servicio" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id_servicio" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Agregar/Editar Servicio de Negocio" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="GridRecord" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_c_servicio1" composition="1">
<Components>
<Button id="23" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_c_servicio1Button_Insert">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<Button id="24" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_c_servicio1Button_Update">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<Button id="25" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancelar" PathID="mc_c_servicio1Button_Cancel">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<Hidden id="27" fieldSourceType="DBColumn" dataType="Integer" name="id_servicio_padre" fieldSource="id_servicio_padre" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Id Servicio Padre" caption="Id Servicio Padre" required="False" unique="False" PathID="mc_c_servicio1id_servicio_padre">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="nombre" fieldSource="nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Nombre" caption="Nombre" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_c_servicio1nombre">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="29" fieldSourceType="DBColumn" dataType="Text" name="descripcion" fieldSource="descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Descripcion" caption="Descripcion" required="False" unique="False" PathID="mc_c_servicio1descripcion">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Hidden id="30" fieldSourceType="DBColumn" dataType="Integer" name="id_tipo_servicio" fieldSource="id_tipo_servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Id Tipo Servicio" caption="Id Tipo Servicio" required="True" unique="False" PathID="mc_c_servicio1id_tipo_servicio" defaultValue="2">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="26" conditionType="Parameter" useIsNull="False" field="id_servicio" parameterSource="id_servicio" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables>
<JoinTable id="22" tableName="mc_c_servicio"/>
</JoinTables>
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
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="ServiciosNegocio.php" forShow="True" url="ServiciosNegocio.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="ServiciosNegocio_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
