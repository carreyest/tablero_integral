<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\Catalogos" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="15" name="mc_c_dictamenes" connection="cnDisenio" dataSource="mc_c_dictamenes" pageSizeLimit="100" pageSize="True" wizardCaption="Lista de dictamenes" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="True" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="GridRecord" wizardGridRecordLinkFieldType="field" wizardGridRecordLinkField="Id" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="mc_c_dictamenes" composition="5" isParent="True">
			<Components>
				<Link id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="mc_c_dictamenes_Insert" hrefSource="Dictamenes.ccp" removeParameters="Id" wizardThemeItem="FooterA" wizardDefaultValue="Agregar Nuevo" wizardUseTemplateBlock="False" PathID="mc_c_dictamenesmc_c_dictamenes_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Sorter id="11" visible="True" name="Sorter_Id" column="Id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="Id" wizardAddNbsp="False" PathID="mc_c_dictamenesSorter_Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="12" visible="True" name="Sorter_Codigo" column="Codigo" wizardCaption="Codigo" wizardSortingType="SimpleDir" wizardControl="Codigo" wizardAddNbsp="False" PathID="mc_c_dictamenesSorter_Codigo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="13" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="mc_c_dictamenesSorter_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_Uso" column="Uso" wizardCaption="Uso" wizardSortingType="SimpleDir" wizardControl="Uso" wizardAddNbsp="False" PathID="mc_c_dictamenesSorter_Uso">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_SeMideSLA" column="SeMideSLA" wizardCaption="Se Mide SLA" wizardSortingType="SimpleDir" wizardControl="SeMideSLA" wizardAddNbsp="False" PathID="mc_c_dictamenesSorter_SeMideSLA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_TipoSLA" column="TipoSLA" wizardCaption="Tipo SLA" wizardSortingType="SimpleDir" wizardControl="TipoSLA" wizardAddNbsp="False" PathID="mc_c_dictamenesSorter_TipoSLA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="17" visible="True" name="Sorter_FugadoProduccion" column="FugadoProduccion" wizardCaption="Fugado Produccion" wizardSortingType="SimpleDir" wizardControl="FugadoProduccion" wizardAddNbsp="False" PathID="mc_c_dictamenesSorter_FugadoProduccion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="18" visible="True" name="Sorter_Comentarios" column="Comentarios" wizardCaption="Comentarios" wizardSortingType="SimpleDir" wizardControl="Comentarios" wizardAddNbsp="False" PathID="mc_c_dictamenesSorter_Comentarios">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="Id" fieldSource="Id" wizardCaption="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" linkProperties="''" wizardAlign="right" wizardAddNbsp="True" wizardThemeItem="GridA" PathID="mc_c_dictamenesId" urlType="Relative">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="20" sourceType="DataField" format="yyyy-mm-dd" name="Id" source="Id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Codigo" fieldSource="Codigo" wizardCaption="Codigo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_dictamenesCodigo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_dictamenesDescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Uso" fieldSource="Uso" wizardCaption="Uso" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_dictamenesUso">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="34" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Comentarios" fieldSource="Comentarios" wizardCaption="Comentarios" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_dictamenesComentarios">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="35" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="28" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="SeMideSLA" fieldSource="SeMideSLA" wizardCaption="Se Mide SLA" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_dictamenesSeMideSLA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="32" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="FugadoProduccion" fieldSource="FugadoProduccion" wizardCaption="Fugado Produccion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_dictamenesFugadoProduccion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="TipoSLA" fieldSource="TipoSLA" wizardCaption="Tipo SLA" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_dictamenesTipoSLA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="54"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="7" conditionType="Parameter" useIsNull="False" field="Codigo" parameterSource="s_Codigo" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1" searchFormParameter="True"/>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="SeMideSLA" parameterSource="s_SeMideSLA" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="2" searchFormParameter="True"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="TipoSLA" parameterSource="s_TipoSLA" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="3" searchFormParameter="True"/>
				<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="FugadoProduccion" parameterSource="s_FugadoProduccion" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="4" searchFormParameter="True"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="mc_c_dictamenes"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="5" tableName="mc_c_dictamenes" fieldName="Id"/>
				<Field id="21" tableName="mc_c_dictamenes" fieldName="Codigo"/>
				<Field id="23" tableName="mc_c_dictamenes" fieldName="Descripcion"/>
				<Field id="25" tableName="mc_c_dictamenes" fieldName="Uso"/>
				<Field id="27" tableName="mc_c_dictamenes" fieldName="SeMideSLA"/>
				<Field id="29" tableName="mc_c_dictamenes" fieldName="TipoSLA"/>
				<Field id="31" tableName="mc_c_dictamenes" fieldName="FugadoProduccion"/>
				<Field id="33" tableName="mc_c_dictamenes" fieldName="Comentarios"/>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="36" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_dictamenesSearch" searchIds="36" fictitiousConnection="cnDisenio" wizardCaption="  Buscar" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardType="GridRecord" returnPage="Dictamenes.ccp" PathID="mc_c_dictamenesSearch" composition="5">
			<Components>
				<Button id="37" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_c_dictamenesSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Codigo" fieldSource="Codigo" wizardIsPassword="False" wizardCaption="Codigo" caption="Codigo" required="False" unique="False" wizardSize="5" wizardMaxLength="5" PathID="mc_c_dictamenesSearchs_Codigo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="39" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_SeMideSLA" fieldSource="SeMideSLA" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Se Mide SLA" caption="Se Mide SLA" required="False" unique="False" PathID="mc_c_dictamenesSearchs_SeMideSLA">
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
				<ListBox id="40" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_TipoSLA" fieldSource="TipoSLA" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Tipo SLA" caption="Tipo SLA" required="False" unique="False" PathID="mc_c_dictamenesSearchs_TipoSLA">
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
				<ListBox id="41" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_FugadoProduccion" fieldSource="FugadoProduccion" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Fugado Produccion" caption="Fugado Produccion" required="False" unique="False" PathID="mc_c_dictamenesSearchs_FugadoProduccion">
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
		<Record id="42" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_dictamenes1" connection="cnDisenio" dataSource="mc_c_dictamenes" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Agregar/Editar Mc C Dictamenes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="GridRecord" changedCaptionRecord="False" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_c_dictamenes1" composition="5">
			<Components>
				<Button id="44" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_c_dictamenes1Button_Insert" removeParameters="Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="45" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_c_dictamenes1Button_Update" removeParameters="Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Codigo" fieldSource="Codigo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Codigo" caption="Codigo" required="True" unique="False" wizardSize="5" wizardMaxLength="5" PathID="mc_c_dictamenes1Codigo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Descripcion" fieldSource="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Descripcion" caption="Descripcion" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_c_dictamenes1Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Uso" fieldSource="Uso" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Uso" caption="Uso" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_c_dictamenes1Uso">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<CheckBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="SeMideSLA" fieldSource="SeMideSLA" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Se Mide SLA" checkedValue="1" uncheckedValue="0" PathID="mc_c_dictamenes1SeMideSLA" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TipoSLA" fieldSource="TipoSLA" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo SLA" caption="Tipo SLA" required="False" unique="False" wizardSize="15" wizardMaxLength="15" PathID="mc_c_dictamenes1TipoSLA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="FugadoProduccion" fieldSource="FugadoProduccion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fugado Produccion" checkedValue="1" uncheckedValue="0" PathID="mc_c_dictamenes1FugadoProduccion" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextArea id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Comentarios" fieldSource="Comentarios" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Comentarios" caption="Comentarios" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_c_dictamenes1Comentarios">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="Id" parameterSource="Id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="43" tableName="mc_c_dictamenes"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="Dictamenes.php" forShow="True" url="Dictamenes.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="Dictamenes_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
