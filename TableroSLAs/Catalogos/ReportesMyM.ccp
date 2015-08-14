<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\Catalogos" secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Grid id="3" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="ReportesMyM1" connection="cnDisenio" dataSource="ReportesMyM" pageSizeLimit="100" pageSize="True" wizardCaption="Lista de Reportes de Metricas y Mediciones" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="True" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="GridRecord" wizardGridRecordLinkFieldType="field" wizardGridRecordLinkField="Nombre" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="ReportesMyM1" composition="8" isParent="True">
			<Components>
				<Link id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ReportesMyM1_Insert" hrefSource="ReportesMyM.ccp" removeParameters="IdReporte" wizardThemeItem="FooterA" wizardDefaultValue="Agregar Nuevo" wizardUseTemplateBlock="False" PathID="ReportesMyM1ReportesMyM1_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="7" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ReportesMyM1_TotalRecords" wizardUseTemplateBlock="False" PathID="ReportesMyM1ReportesMyM1_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="8"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="11" visible="True" name="Sorter_Nombre" column="Nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="Nombre" wizardAddNbsp="False" PathID="ReportesMyM1Sorter_Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="12" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="ReportesMyM1Sorter_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="13" visible="True" name="Sorter_NombreRDL" column="NombreRDL" wizardCaption="Nombre RDL" wizardSortingType="SimpleDir" wizardControl="NombreRDL" wizardAddNbsp="False" PathID="ReportesMyM1Sorter_NombreRDL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" preserveParameters="GET" name="Nombre" fieldSource="Nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" wizardThemeItem="GridA" PathID="ReportesMyM1Nombre" urlType="Relative" linkProperties="{&quot;textSource&quot;:&quot;&quot;,&quot;textSourceDB&quot;:&quot;Nombre&quot;,&quot;hrefSource&quot;:&quot;&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;0&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;IdReporte&quot;,&quot;parameterName&quot;:&quot;IdReporte&quot;},&quot;1&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;IdReporte&quot;,&quot;parameterName&quot;:&quot;IdReporte&quot;},&quot;length&quot;:2,&quot;objectType&quot;:&quot;linkParameters&quot;}}">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="16" sourceType="DataField" format="yyyy-mm-dd" name="IdReporte" source="IdReporte"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ReportesMyM1Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="20" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="NombreRDL" fieldSource="NombreRDL" wizardCaption="Nombre RDL" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ReportesMyM1NombreRDL" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="../MuestraReporte.ccp" linkProperties="{'textSource':'Ver Reporte','textSourceDB':'','hrefSource':'../MuestraReporte.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'IdReporte','parameterName':'IdReporte'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="36" sourceType="DataField" name="IdReporte" source="IdReporte"/>
					</LinkParameters>
				</Link>
				<Navigator id="21" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="Nombre" parameterSource="s_Nombre" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1" searchFormParameter="True"/>
				<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="NombreRDL" parameterSource="s_NombreRDL" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2" searchFormParameter="True"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="ReportesMyM"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="5" tableName="ReportesMyM" fieldName="IdReporte"/>
				<Field id="14" tableName="ReportesMyM" fieldName="Nombre"/>
				<Field id="17" tableName="ReportesMyM" fieldName="Descripcion"/>
				<Field id="19" tableName="ReportesMyM" fieldName="NombreRDL"/>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="22" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="ReportesMyMSearch" searchIds="22" fictitiousConnection="cnDisenio" wizardCaption="  Buscar" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardType="GridRecord" returnPage="ReportesMyM.ccp" PathID="ReportesMyMSearch" composition="8">
			<Components>
				<Button id="23" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="ReportesMyMSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Nombre" fieldSource="Nombre" wizardIsPassword="False" wizardCaption="Nombre" caption="Nombre" required="False" unique="False" wizardSize="50" wizardMaxLength="75" PathID="ReportesMyMSearchs_Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_NombreRDL" fieldSource="NombreRDL" wizardIsPassword="False" wizardCaption="Nombre RDL" caption="Nombre RDL" required="False" unique="False" wizardSize="50" wizardMaxLength="125" PathID="ReportesMyMSearchs_NombreRDL">
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
		<Record id="26" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="ReportesMyM2" connection="cnDisenio" dataSource="ReportesMyM" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="IdReporte" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Agregar/Editar Reporte" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="GridRecord" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="ReportesMyM2" composition="8">
			<Components>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Nombre" fieldSource="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Nombre" caption="Nombre" required="False" unique="False" wizardSize="50" wizardMaxLength="75" PathID="ReportesMyM2Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Descripcion" fieldSource="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Descripcion" caption="Descripcion" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ReportesMyM2Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="grupo" PathID="ReportesMyM2grupo" fieldSource="Grupo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NombreRDL" fieldSource="NombreRDL" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Nombre RDL" caption="Nombre RDL" required="False" unique="False" wizardSize="50" wizardMaxLength="125" PathID="ReportesMyM2NombreRDL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<CheckBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Checked" name="CheckBox1" PathID="ReportesMyM2CheckBox1" fieldSource="activo" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
<Button id="28" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="ReportesMyM2Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="29" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="ReportesMyM2Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="30" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancelar" PathID="ReportesMyM2Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
</Components>
			<Events>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="50"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="51"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="47" conditionType="Parameter" useIsNull="False" dataType="Integer" field="IdReporte" logicOperator="And" orderNumber="1" parameterSource="IdReporte" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="46" posHeight="136" posLeft="10" posTop="10" posWidth="95" tableName="ReportesMyM"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="48" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="49" dataType="Integer" fieldName="IdReporte" tableName="ReportesMyM"/>
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
		<IncludePage id="35" name="Header" PathID="Header" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="ReportesMyM.php" forShow="True" url="ReportesMyM.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="ReportesMyM_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="2"/>
			</Actions>
		</Event>
	</Events>
</Page>
