<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="50" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_proveedor_mc_EfPresu1" searchIds="50" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_EfPresup_base" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="True" wizardResultsForm="mc_c_proveedor_mc_EfPresu" returnPage="EficienciaPresBase.ccp" PathID="mc_c_proveedor_mc_EfPresu1">
			<Components>
				<Button id="51" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_c_proveedor_mc_EfPresu1Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="55" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_Id_Proveedor" fieldSource="Id_Proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" PathID="mc_c_proveedor_mc_EfPresu1s_Id_Proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="59" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="58" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="60" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="61" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_GrupoAplicativos" fieldSource="GrupoAplicativos" wizardIsPassword="False" wizardCaption="Grupo Aplicativos" caption="Grupo Aplicativos" required="False" unique="False" wizardSize="50" wizardMaxLength="75" PathID="mc_c_proveedor_mc_EfPresu1s_GrupoAplicativos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="57" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_ServiciosRelacionados" fieldSource="ServiciosRelacionados" wizardIsPassword="False" wizardCaption="Servicios Relacionados" caption="Servicios Relacionados" required="False" unique="False" wizardSize="50" wizardMaxLength="125" PathID="mc_c_proveedor_mc_EfPresu1s_ServiciosRelacionados">
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
<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="mc_c_proveedor_mc_EfPresu" connection="cnDisenio" dataSource="SELECT nombre, mc_EfPresup_base.* 
FROM mc_EfPresup_base INNER JOIN mc_c_proveedor ON
mc_EfPresup_base.Id_Proveedor = mc_c_proveedor.Id_Proveedor
WHERE (mc_EfPresup_base.Id_Proveedor = {s_Id_Proveedor} or {s_Id_Proveedor}=0)
AND GrupoAplicativos LIKE '%{s_GrupoAplicativos}%'
AND ServiciosRelacionados LIKE '%{s_ServiciosRelacionados}%' " pageSizeLimit="100" pageSize="True" wizardCaption="Eficiencia Presupuestal Base" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="GridRecord" wizardGridRecordLinkFieldType="field" wizardGridRecordLinkField="Id" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="mc_c_proveedor_mc_EfPresu" composition="6" isParent="True">
			<Components>
				<Link id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="mc_c_proveedor_mc_EfPresu_Insert" hrefSource="EficienciaPresBase.ccp" removeParameters="Id" wizardThemeItem="FooterA" wizardDefaultValue="Agregar Nuevo" wizardUseTemplateBlock="False" PathID="mc_c_proveedor_mc_EfPresumc_c_proveedor_mc_EfPresu_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="12" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mc_c_proveedor_mc_EfPresu_TotalRecords" wizardUseTemplateBlock="False" PathID="mc_c_proveedor_mc_EfPresumc_c_proveedor_mc_EfPresu_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="13" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="14" visible="True" name="Sorter_Id" column="Id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="Id" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_EfPresuSorter_Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_EfPresuSorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_GrupoAplicativos" column="GrupoAplicativos" wizardCaption="Grupo Aplicativos" wizardSortingType="SimpleDir" wizardControl="GrupoAplicativos" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_EfPresuSorter_GrupoAplicativos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="17" visible="True" name="Sorter_ServiciosRelacionados" column="ServiciosRelacionados" wizardCaption="Servicios Relacionados" wizardSortingType="SimpleDir" wizardControl="ServiciosRelacionados" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_EfPresuSorter_ServiciosRelacionados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="18" visible="True" name="Sorter_CFMAnterior" column="CFMAnterior" wizardCaption="CFMAnterior" wizardSortingType="SimpleDir" wizardControl="CFMAnterior" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_EfPresuSorter_CFMAnterior">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="19" visible="True" name="Sorter_Vigente" column="Vigente" wizardCaption="Vigente" wizardSortingType="SimpleDir" wizardControl="Vigente" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_EfPresuSorter_Vigente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="Id" fieldSource="Id" wizardCaption="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" linkProperties="''" wizardAlign="right" wizardAddNbsp="True" wizardThemeItem="GridA" PathID="mc_c_proveedor_mc_EfPresuId" urlType="Relative">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="21" sourceType="DataField" format="yyyy-mm-dd" name="Id" source="Id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_EfPresunombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="GrupoAplicativos" fieldSource="GrupoAplicativos" wizardCaption="Grupo Aplicativos" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_EfPresuGrupoAplicativos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ServiciosRelacionados" fieldSource="ServiciosRelacionados" wizardCaption="Servicios Relacionados" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_EfPresuServiciosRelacionados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="CFMAnterior" fieldSource="CFMAnterior" wizardCaption="CFMAnterior" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_EfPresuCFMAnterior" format="0.0000">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="Vigente" fieldSource="Vigente" wizardCaption="Vigente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_EfPresuVigente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="27" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
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
				<SQLParameter id="62" dataType="Integer" defaultValue="0" parameterSource="s_Id_Proveedor" parameterType="URL" variable="s_Id_Proveedor"/>
				<SQLParameter id="63" dataType="Text" parameterSource="s_GrupoAplicativos" parameterType="URL" variable="s_GrupoAplicativos"/>
				<SQLParameter id="64" dataType="Text" parameterSource="s_ServiciosRelacionados" parameterType="URL" variable="s_ServiciosRelacionados"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
<Record id="28" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_EfPresup_base" connection="cnDisenio" dataSource="mc_EfPresup_base" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Registro de CFM Histórico" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="GridRecord" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_EfPresup_base" composition="5">
			<Components>
				<Button id="30" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_EfPresup_baseButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="31" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_EfPresup_baseButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="32" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancelar" PathID="mc_EfPresup_baseButton_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="37" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="Id_Proveedor" fieldSource="Id_Proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" caption="Id Proveedor" required="True" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_EfPresup_baseId_Proveedor" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="47" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="46" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="48" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="49" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="GrupoAplicativos" fieldSource="GrupoAplicativos" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Grupo Aplicativos" caption="Grupo Aplicativos" required="True" unique="False" wizardSize="50" wizardMaxLength="75" PathID="mc_EfPresup_baseGrupoAplicativos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ServiciosRelacionados" fieldSource="ServiciosRelacionados" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicios Relacionados" caption="Servicios Relacionados" required="True" unique="False" wizardSize="50" wizardMaxLength="125" PathID="mc_EfPresup_baseServiciosRelacionados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CFMAnterior" fieldSource="CFMAnterior" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="CFMAnterior" caption="CFMAnterior" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_EfPresup_baseCFMAnterior" format="0.0000">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="Vigente" fieldSource="Vigente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Vigente" PathID="mc_EfPresup_baseVigente" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextBox id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="AnioServicio" PathID="mc_EfPresup_baseAnioServicio" fieldSource="AnioServicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="33" conditionType="Parameter" useIsNull="False" field="Id" parameterSource="Id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="29" tableName="mc_EfPresup_base"/>
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
<Record id="67" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_eficiencia_presupuesta" connection="cnDisenio" dataSource="mc_eficiencia_presupuestal" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Actualizar Costo Fijo Vigente para Medición" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_eficiencia_presupuesta" customInsertType="SQL" customInsert="insert into mc_eficiencia_presupuestal 
(Id_Proveedor, GrupoAplicativos, ServiciosRelacionados , CFMAnterior , MesReporte , anioreporte   )
select Id_Proveedor, GrupoAplicativos, ServiciosRelacionados , CFMAnterior ,{MesReporte} , {anioreporte}
from mc_EfPresup_base 
where Vigente  =1
and Id_Proveedor = {Id_Proveedor}
	and GrupoAplicativos not in (select GrupoAplicativos from mc_eficiencia_presupuestal 
	where MesReporte ={MesReporte}  
and anioreporte = {anioreporte} and id_proveedor= {Id_Proveedor})" parameterTypeListName="ParameterTypeList" activeCollection="ISQLParameters">
<Components>
<Button id="69" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_eficiencia_presupuestaButton_Insert">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<ListBox id="71" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="Id_Proveedor" fieldSource="Id_Proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" caption="Id Proveedor" required="True" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_eficiencia_presupuestaId_Proveedor" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
<Components/>
<Events/>
<TableParameters>
<TableParameter id="75" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables>
<JoinTable id="74" posHeight="180" posLeft="10" posTop="10" posWidth="158" tableName="mc_c_proveedor"/>
</JoinTables>
<JoinLinks/>
<Fields>
<Field id="76" fieldName="nombre" tableName="mc_c_proveedor"/>
<Field id="77" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
</Fields>
<PKFields>
<PKField id="78" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
</PKFields>
<Attributes/>
<Features/>
</ListBox>
<ListBox id="72" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="MesReporte" fieldSource="MesReporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Mes Reporte" caption="Mes Reporte" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_eficiencia_presupuestaMesReporte" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date('m')"><Components/>
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
<ListBox id="73" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="anioreporte" fieldSource="anioreporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Anioreporte" caption="Anioreporte" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_eficiencia_presupuestaanioreporte" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="2014">
<Components/>
<Events/>
<TableParameters>
<TableParameter id="82" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Ano" logicOperator="And" parameterSource="2013" parameterType="Expression" searchConditionType="GreaterThan"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables>
<JoinTable id="81" posHeight="88" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_anio"/>
</JoinTables>
<JoinLinks/>
<Fields>
<Field id="83" fieldName="*"/>
</Fields>
<PKFields>
<PKField id="84" dataType="Integer" fieldName="Ano" tableName="mc_c_anio"/>
</PKFields>
<Attributes/>
<Features/>
</ListBox>
</Components>
<Events>
<Event name="BeforeInsert" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="79"/>
</Actions>
</Event>
<Event name="OnValidate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="80"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="70" conditionType="Parameter" useIsNull="False" field="Id" parameterSource="Id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables>
<JoinTable id="68" schemaName="undefined" tableName="mc_eficiencia_presupuestal"/>
</JoinTables>
<JoinLinks/>
<Fields/>
<PKFields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="88" variable="Id_Proveedor" parameterType="Control" defaultValue="0" dataType="Integer" parameterSource="Id_Proveedor"/>
<SQLParameter id="91" variable="MesReporte" dataType="Integer" parameterType="Control" parameterSource="MesReporte"/>
<SQLParameter id="92" variable="anioreporte" dataType="Integer" parameterType="Control" parameterSource="anioreporte"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="85" field="Id_Proveedor" dataType="Integer" parameterType="Control" parameterSource="Id_Proveedor"/>
<CustomParameter id="86" field="MesReporte" dataType="Integer" parameterType="Control" parameterSource="MesReporte"/>
<CustomParameter id="87" field="anioreporte" dataType="Integer" parameterType="Control" parameterSource="anioreporte"/>
</IFormElements>
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
		<CodeFile id="Code" language="PHPTemplates" name="EficienciaPresBase.php" forShow="True" url="EficienciaPresBase.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="EficienciaPresBase_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="65" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
