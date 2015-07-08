<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\Catalogos" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_aplicacionSearch" searchIds="34" fictitiousConnection="cnDisenio" wizardCaption="{res:Search_Form}" wizardOrientation="Vertical" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="True" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardType="GridRecord" returnPage="AplicacionesLista.ccp" PathID="mc_c_aplicacionSearch" composition="8">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" PathID="mc_c_aplicacionSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_id" fieldSource="id" wizardIsPassword="False" wizardCaption="{res:id}" caption="{res:id}" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_c_aplicacionSearchs_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_descripcion" fieldSource="descripcion" wizardIsPassword="False" wizardCaption="{res:descripcion}" caption="{res:descripcion}" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_c_aplicacionSearchs_descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_severidad" fieldSource="severidad" wizardIsPassword="False" wizardCaption="{res:severidad}" caption="{res:severidad}" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_c_aplicacionSearchs_severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="52"/>
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
		<Record id="41" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_aplicacion1" connection="cnDisenio" dataSource="mc_c_aplicacion" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id" encryptPasswordField="False" wizardUseInterVariables="True" pkIsAutoincrement="True" wizardCaption="{res:mc_c_aplicacion_RecordForm}" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="GridRecord" changedCaptionRecord="False" recordDirection="Vertical" templatePageRecord="C:/Users/ELOPEZ/Documents/CodeChargeStudio5/Projects/Valoracion3/Templates/Record/Horizontal.ccp|userTemplate" recordAddTemplatePanel="False" PathID="mc_c_aplicacion1" composition="9">
			<Components>
				<Button id="42" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="mc_c_aplicacion1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="43" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="mc_c_aplicacion1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" PathID="mc_c_aplicacion1Button_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="descripcion" fieldSource="descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:descripcion}" caption="{res:descripcion}" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_c_aplicacion1descripcion">
					<Components/>
					<Events>
						<Event name="OnValidate" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="53"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="severidad" fieldSource="severidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:severidad}" caption="{res:severidad}" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_c_aplicacion1severidad" sourceType="ListOfValues" dataSource="0;0;1;1;2;2;3;3;4;4">
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
				<Hidden id="47" fieldSourceType="DBColumn" dataType="Integer" name="hIdUsuario" PathID="mc_c_aplicacion1hIdUsuario" fieldSource="UsuarioAlta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="48"/>
					</Actions>
				</Event>
				<Event name="BeforeBuildInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="49" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="id" parameterSource="id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="51" tableName="mc_c_aplicacion"/>
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
		<Grid id="12" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="mc_c_aplicacion" connection="cnDisenio" dataSource="mc_c_aplicacion" pageSizeLimit="100" pageSize="True" wizardCaption="{res:mc_c_aplicacion_GridForm}" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Simple" wizardUseSearch="True" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="GridRecord" wizardGridRecordLinkFieldType="field" wizardGridRecordLinkField="id" wizardUseInterVariables="True" addTemplatePanel="False" changedCaptionGrid="False" gridExtendedHTML="False" PathID="mc_c_aplicacion" composition="1" isParent="True">
			<Components>
				<Link id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="mc_c_aplicacion_Insert" hrefSource="AplicacionesLista.ccp" removeParameters="id" wizardThemeItem="FooterA" wizardDefaultValue="{res:CCS_InsertLink}" wizardUseTemplateBlock="False" PathID="mc_c_aplicacionmc_c_aplicacion_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Sorter id="14" visible="True" name="Sorter_id" column="id" wizardCaption="{res:id}" wizardSortingType="SimpleDir" wizardControl="id" wizardAddNbsp="False" PathID="mc_c_aplicacionSorter_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_descripcion" column="descripcion" wizardCaption="{res:descripcion}" wizardSortingType="SimpleDir" wizardControl="descripcion" wizardAddNbsp="False" PathID="mc_c_aplicacionSorter_descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_severidad" column="severidad" wizardCaption="{res:severidad}" wizardSortingType="SimpleDir" wizardControl="severidad" wizardAddNbsp="False" PathID="mc_c_aplicacionSorter_severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="17" visible="True" name="Sorter_FechaAlta" column="FechaAlta" wizardCaption="{res:FechaAlta}" wizardSortingType="SimpleDir" wizardControl="FechaAlta" wizardAddNbsp="False" PathID="mc_c_aplicacionSorter_FechaAlta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="18" visible="True" name="Sorter_UsuarioAlta" column="UsuarioAlta" wizardCaption="{res:UsuarioAlta}" wizardSortingType="SimpleDir" wizardControl="UsuarioAlta" wizardAddNbsp="False" PathID="mc_c_aplicacionSorter_UsuarioAlta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="19" visible="True" name="Sorter_FechaUltMod" column="FechaUltMod" wizardCaption="{res:FechaUltMod}" wizardSortingType="SimpleDir" wizardControl="FechaUltMod" wizardAddNbsp="False" PathID="mc_c_aplicacionSorter_FechaUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="20" visible="True" name="Sorter_UsuarioUltMod" column="UsuarioUltMod" wizardCaption="{res:UsuarioUltMod}" wizardSortingType="SimpleDir" wizardControl="UsuarioUltMod" wizardAddNbsp="False" PathID="mc_c_aplicacionSorter_UsuarioUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripcion" fieldSource="descripcion" wizardCaption="{res:descripcion}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_aplicaciondescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="severidad" fieldSource="severidad" wizardCaption="{res:severidad}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_aplicacionseveridad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaAlta" fieldSource="FechaAlta" wizardCaption="{res:FechaAlta}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_aplicacionFechaAlta" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="UsuarioAlta" fieldSource="UsuarioAlta" wizardCaption="{res:UsuarioAlta}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_aplicacionUsuarioAlta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaUltMod" fieldSource="FechaUltMod" wizardCaption="{res:FechaUltMod}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_aplicacionFechaUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="28" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="UsuarioUltMod" fieldSource="UsuarioUltMod" wizardCaption="{res:UsuarioUltMod}" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_aplicacionUsuarioUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="29" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="{res:CCS_First}" wizardPrev="True" wizardPrevText="{res:CCS_Previous}" wizardNext="True" wizardNextText="{res:CCS_Next}" wizardLast="True" wizardLastText="{res:CCS_Last}" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="Basic">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="id" wizardCaption="{res:id}" wizardIsPassword="False" wizardUseTemplateBlock="False" linkProperties="''" wizardAlign="right" wizardAddNbsp="True" wizardThemeItem="GridA" PathID="mc_c_aplicacionid" urlType="Relative" fieldSource="id">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="22" sourceType="DataField" format="yyyy-mm-dd" name="id" source="id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="30" conditionType="Parameter" useIsNull="False" field="id" parameterSource="s_id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" searchFormParameter="True"/>
				<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="descripcion" parameterSource="s_descripcion" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2" searchFormParameter="True"/>
				<TableParameter id="32" conditionType="Parameter" useIsNull="False" field="severidad" parameterSource="s_severidad" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3" searchFormParameter="True"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="33" tableName="mc_c_aplicacion"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="34" tableName="mc_c_aplicacion" fieldName="id"/>
				<Field id="35" tableName="mc_c_aplicacion" fieldName="descripcion"/>
				<Field id="36" tableName="mc_c_aplicacion" fieldName="severidad"/>
				<Field id="37" tableName="mc_c_aplicacion" fieldName="FechaAlta"/>
				<Field id="38" tableName="mc_c_aplicacion" fieldName="UsuarioAlta"/>
				<Field id="39" tableName="mc_c_aplicacion" fieldName="FechaUltMod"/>
				<Field id="40" tableName="mc_c_aplicacion" fieldName="UsuarioUltMod"/>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<IncludePage id="54" name="Header" PathID="Header" page="../Header.ccp">
<Components/>
<Events/>
<Features/>
</IncludePage>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="AplicacionesLista.php" forShow="True" url="AplicacionesLista.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="AplicacionesLista_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
