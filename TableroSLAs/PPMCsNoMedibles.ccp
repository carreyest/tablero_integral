<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="20" name="mc_PPMC_NoMedibles" connection="cnDisenio" dataSource="mc_PPMC_NoMedibles, mc_c_proveedor" pageSizeLimit="200" pageSize="False" wizardCaption=" Lista de PPMC No Medibles " wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardUseSearch="True" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="mc_PPMC_NoMedibles" composition="7" isParent="True" wizardUsePageScroller="True" editableComponentTypeString="Grid" childId="19">
			<Components>
				<Link id="9" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Id" fieldSource="Id" wizardCaption="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_PPMC_NoMediblesId" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" linkProperties="{'textSource':'','textSourceDB':'Id','hrefSource':'','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="51" sourceType="DataField" name="Id" source="Id"/>
					</LinkParameters>
				</Link>
				<Label id="10" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="IDPPMC" fieldSource="IDPPMC" wizardCaption="IDPPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_PPMC_NoMediblesIDPPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="11" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="IDEstimacion" fieldSource="IDEstimacion" wizardCaption="IDEstimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_PPMC_NoMediblesIDEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="12" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_PPMC_NoMediblesDescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="13" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaEstimacion" fieldSource="FechaEstimacion" wizardCaption="Fecha Estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_PPMC_NoMediblesFechaEstimacion" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="dd/mm/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="14" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Servicio_Negocio" fieldSource="Servicio_Negocio" wizardCaption="Servicio Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_PPMC_NoMediblesServicio_Negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Notas" fieldSource="Notas" wizardCaption="Notas" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_PPMC_NoMediblesNotas">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="16" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="mesreporte" fieldSource="mesreporte" wizardCaption="Mesreporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_PPMC_NoMediblesmesreporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="anioreporte" fieldSource="anioreporte" wizardCaption="Anioreporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_PPMC_NoMediblesanioreporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="id_proveedor" fieldSource="nombre" wizardCaption="Id Proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_PPMC_NoMediblesid_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="49" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator1" PathID="mc_PPMC_NoMediblesNavigator1" wizardPagingType="Custom" wizardPageNumbers="Centered" wizardTotalPages="True" wizardHideDisabled="False" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageSize="True" wizardFirstText="Inicio" wizardPrevText="Anterior" wizardNextText="Siguiente" wizardLastText="Final" wizardOfText="de">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="57" conditionType="Parameter" useIsNull="False" dataType="Integer" field="mc_PPMC_NoMedibles.IDPPMC" logicOperator="And" orderNumber="1" parameterSource="s_IDPPMC" parameterType="URL" searchConditionType="Equal" searchFormParameter="True"/>
				<TableParameter id="58" conditionType="Parameter" useIsNull="False" dataType="Integer" field="mc_PPMC_NoMedibles.mesreporte" logicOperator="And" orderNumber="2" parameterSource="s_mesreporte" parameterType="URL" searchConditionType="Equal" searchFormParameter="True"/>
				<TableParameter id="59" conditionType="Parameter" useIsNull="False" dataType="Integer" field="mc_PPMC_NoMedibles.anioreporte" logicOperator="And" orderNumber="3" parameterSource="s_anioreporte" parameterType="URL" searchConditionType="Equal" searchFormParameter="True"/>
				<TableParameter id="60" conditionType="Parameter" useIsNull="False" dataType="Integer" field="mc_PPMC_NoMedibles.id_proveedor" logicOperator="And" orderNumber="4" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal" searchFormParameter="True"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="54" posHeight="180" posLeft="10" posTop="10" posWidth="134" tableName="mc_PPMC_NoMedibles"/>
				<JoinTable id="55" posHeight="180" posLeft="165" posTop="10" posWidth="158" schemaName="dbo" tableName="mc_c_proveedor"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="56" conditionType="Equal" fieldLeft="mc_PPMC_NoMedibles.id_proveedor" fieldRight="mc_c_proveedor.id_proveedor" joinType="inner" tableLeft="mc_PPMC_NoMedibles" tableRight="mc_c_proveedor"/>
			</JoinLinks>
			<Fields>
				<Field id="61" fieldName="mc_PPMC_NoMedibles.*" tableName="mc_PPMC_NoMedibles"/>
				<Field id="62" fieldName="nombre" tableName="mc_c_proveedor"/>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="19" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_PPMC_NoMediblesSearch" searchIds="19" fictitiousConnection="cnDisenio" wizardCaption="  Buscar" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardType="Grid" returnPage="PPMCsNoMedibles.ccp" PathID="mc_PPMC_NoMediblesSearch" composition="7">
			<Components>
				<Button id="20" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_PPMC_NoMediblesSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_IDPPMC" fieldSource="IDPPMC" wizardIsPassword="False" wizardCaption="IDPPMC" caption="IDPPMC" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_PPMC_NoMediblesSearchs_IDPPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="22" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_mesreporte" fieldSource="mesreporte" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mesreporte" caption="Mesreporte" required="False" unique="False" PathID="mc_PPMC_NoMediblesSearchs_mesreporte" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
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
				<ListBox id="23" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_anioreporte" fieldSource="anioreporte" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Anioreporte" caption="Anioreporte" required="False" unique="False" PathID="mc_PPMC_NoMediblesSearchs_anioreporte" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano">
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
				<ListBox id="24" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" PathID="mc_PPMC_NoMediblesSearchs_id_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="26" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="25" posHeight="180" posLeft="10" posTop="10" posWidth="158" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="27" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="28" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
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
		<Record id="29" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_PPMC_NoMedibles1" connection="cnDisenio" dataSource="mc_PPMC_NoMedibles" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Detalle PPMC No Medible " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_PPMC_NoMedibles1">
			<Components>
				<Button id="31" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_PPMC_NoMedibles1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="32" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_PPMC_NoMedibles1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="33" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="mc_PPMC_NoMedibles1Button_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="35" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_PPMC_NoMedibles1id_proveedor" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="46" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="45" posHeight="180" posLeft="10" posTop="10" posWidth="158" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="47" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="48" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="IDPPMC" fieldSource="IDPPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="IDPPMC" caption="IDPPMC" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_PPMC_NoMedibles1IDPPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="IDEstimacion" fieldSource="IDEstimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="IDEstimacion" caption="IDEstimacion" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_PPMC_NoMedibles1IDEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Descripcion" fieldSource="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Descripcion" caption="Descripcion" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_PPMC_NoMedibles1Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaEstimacion" fieldSource="FechaEstimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Fecha Estimacion" caption="Fecha Estimacion" required="False" format="dd/mm/yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_PPMC_NoMedibles1FechaEstimacion" DBFormat="yyyy-mm-dd HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="40" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
							<Components/>
							<Events/>
							<TableParameters/>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables/>
							<JoinLinks/>
							<Fields/>
							<Features/>
						</JDateTimePicker>
					</Features>
				</TextBox>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Servicio_Negocio" fieldSource="Servicio_Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicio Negocio" caption="Servicio Negocio" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_PPMC_NoMedibles1Servicio_Negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Notas" fieldSource="Notas" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Notas" caption="Notas" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_PPMC_NoMedibles1Notas">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="43" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="mesreporte" fieldSource="mesreporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Mesreporte" caption="Mesreporte" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_PPMC_NoMedibles1mesreporte" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
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
				<ListBox id="44" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="anioreporte" fieldSource="anioreporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Anioreporte" caption="Anioreporte" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_PPMC_NoMedibles1anioreporte" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano">
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
			<TableParameters>
				<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="Id" parameterSource="Id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="50" tableName="mc_PPMC_NoMedibles"/>
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
		<Label id="52" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lErrores" PathID="lErrores">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsNoMedibles_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsNoMedibles.php" forShow="True" url="PPMCsNoMedibles.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="AfterInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="53"/>
			</Actions>
		</Event>
	</Events>
</Page>
