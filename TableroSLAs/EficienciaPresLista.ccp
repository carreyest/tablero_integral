<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="5" name="mc_c_proveedor_mc_eficien" connection="cnDisenio" dataSource="SELECT nombre, GrupoAplicativos, ServiciosRelacionados, CFMAnterior, CFMActual, EficienciaPresupuestal, CumpleSLA, MesReporte, Id,
anioreporte, observaciones 
FROM mc_eficiencia_presupuestal INNER JOIN mc_c_proveedor ON
mc_eficiencia_presupuestal.Id_Proveedor = mc_c_proveedor.Id_Proveedor
WHERE (mc_eficiencia_presupuestal.id_proveedor = {s_Id_Proveedor} or {s_Id_Proveedor}=0)
AND mc_eficiencia_presupuestal.GrupoAplicativos LIKE '%{s_GrupoAplicativos}%'
AND (mc_eficiencia_presupuestal.MesReporte = {s_MesReporte} or {s_MesReporte}=0)
AND (anioreporte = {s_AnioRepote} or {s_AnioRepote}=0 )" pageSizeLimit="100" pageSize="True" wizardCaption="Eficiencia Presupuestal" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="True" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="mc_c_proveedor_mc_eficien" composition="3" isParent="True">
			<Components>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mc_c_proveedor_mc_eficien_TotalRecords" wizardUseTemplateBlock="False" PathID="mc_c_proveedor_mc_eficienmc_c_proveedor_mc_eficien_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="20" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="25" visible="True" name="Sorter_Id" column="Id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="Id" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_eficienSorter_Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="26" visible="True" name="Sorter_GrupoAplicativos" column="GrupoAplicativos" wizardCaption="Grupo Aplicativos" wizardSortingType="SimpleDir" wizardControl="GrupoAplicativos" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_eficienSorter_GrupoAplicativos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="27" visible="True" name="Sorter_ServiciosRelacionados" column="ServiciosRelacionados" wizardCaption="Servicios Relacionados" wizardSortingType="SimpleDir" wizardControl="ServiciosRelacionados" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_eficienSorter_ServiciosRelacionados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="28" visible="True" name="Sorter_CFMAnterior" column="CFMAnterior" wizardCaption="CFMAnterior" wizardSortingType="SimpleDir" wizardControl="CFMAnterior" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_eficienSorter_CFMAnterior">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="29" visible="True" name="Sorter_CFMActual" column="CFMActual" wizardCaption="CFMActual" wizardSortingType="SimpleDir" wizardControl="CFMActual" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_eficienSorter_CFMActual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="30" visible="True" name="Sorter_EficienciaPresupuestal" column="EficienciaPresupuestal" wizardCaption="Eficiencia Presupuestal" wizardSortingType="SimpleDir" wizardControl="EficienciaPresupuestal" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_eficienSorter_EficienciaPresupuestal">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="31" visible="True" name="Sorter_CumpleSLA" column="CumpleSLA" wizardCaption="Cumple SLA" wizardSortingType="SimpleDir" wizardControl="CumpleSLA" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_eficienSorter_CumpleSLA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="32" visible="True" name="Sorter_MesReporte" column="MesReporte" wizardCaption="Mes Reporte" wizardSortingType="SimpleDir" wizardControl="MesReporte" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_eficienSorter_MesReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="33" visible="True" name="Sorter_AnioRepote" column="AnioReporte" wizardCaption="Anio Repote" wizardSortingType="SimpleDir" wizardControl="AnioRepote" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_eficienSorter_AnioRepote" connection="cnDisenio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="34" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="mc_c_proveedor_mc_eficienSorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="Id" fieldSource="Id" wizardCaption="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" hrefSource="EficienciaPresLista.ccp" linkProperties="{'textSource':'','textSourceDB':'Id','hrefSource':'EficienciaPresLista.ccp','hrefSourceDB':'Id','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'length':2,'objectType':'linkParameters'}}" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_eficienId" urlType="Relative">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="52" sourceType="DataField" name="Id" source="Id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="36" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="GrupoAplicativos" fieldSource="GrupoAplicativos" wizardCaption="Grupo Aplicativos" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_eficienGrupoAplicativos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ServiciosRelacionados" fieldSource="ServiciosRelacionados" wizardCaption="Servicios Relacionados" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_eficienServiciosRelacionados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="38" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="CFMAnterior" fieldSource="CFMAnterior" wizardCaption="CFMAnterior" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_eficienCFMAnterior" format="0.0000">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="39" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="CFMActual" fieldSource="CFMActual" wizardCaption="CFMActual" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_eficienCFMActual" format="0.0000">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="40" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="EficienciaPresupuestal" fieldSource="EficienciaPresupuestal" wizardCaption="Eficiencia Presupuestal" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_eficienEficienciaPresupuestal" format="0.0000">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="41" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumpleSLA" fieldSource="CumpleSLA" wizardCaption="Cumple SLA" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_eficienCumpleSLA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="42" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="MesReporte" fieldSource="MesReporte" wizardCaption="Mes Reporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_eficienMesReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="AnioRepote" fieldSource="anioreporte" wizardCaption="Anio Repote" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_eficienAnioRepote">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_proveedor_mc_eficiennombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="45" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Image id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgCumpleSLA" PathID="mc_c_proveedor_mc_eficienimgCumpleSLA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="124" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="observaciones" PathID="mc_c_proveedor_mc_eficienobservaciones" fieldSource="observaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="119"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="125" dataType="Integer" defaultValue="0" designDefaultValue="3" parameterSource="s_Id_Proveedor" parameterType="URL" variable="s_Id_Proveedor"/>
				<SQLParameter id="126" dataType="Text" designDefaultValue="Todos" parameterSource="s_GrupoAplicativos" parameterType="URL" variable="s_GrupoAplicativos"/>
				<SQLParameter id="127" dataType="Integer" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))" designDefaultValue="1" parameterSource="s_MesReporte" parameterType="URL" variable="s_MesReporte"/>
				<SQLParameter id="128" dataType="Integer" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))" designDefaultValue="2014" parameterSource="s_AnioRepote" parameterType="URL" variable="s_AnioRepote"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="54" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_eficiencia_presupuesta" connection="cnDisenio" dataSource="mc_eficiencia_presupuestal" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Eficiencia Presupuestal " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_eficiencia_presupuesta" activeCollection="UFormElements" activeTableType="mc_eficiencia_presupuestal">
			<Components>
				<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_eficiencia_presupuestaButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_eficiencia_presupuestaButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="58" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="mc_eficiencia_presupuestaButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="60" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="Id_Proveedor" fieldSource="Id_Proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" caption="Id Proveedor" required="True" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_eficiencia_presupuestaId_Proveedor" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
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
				</Hidden>
				<Hidden id="61" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="GrupoAplicativos" fieldSource="GrupoAplicativos" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Grupo Aplicativos" caption="Grupo Aplicativos" required="True" unique="False" wizardSize="45" wizardMaxLength="45" PathID="mc_eficiencia_presupuestaGrupoAplicativos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="62" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ServiciosRelacionados" fieldSource="ServiciosRelacionados" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicios Relacionados" caption="Servicios Relacionados" required="True" unique="False" wizardSize="35" wizardMaxLength="35" PathID="mc_eficiencia_presupuestaServiciosRelacionados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CFMAnterior" fieldSource="CFMAnterior" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="CFMAnterior" caption="CFMAnterior" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_eficiencia_presupuestaCFMAnterior" format="0.0000">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="64" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CFMActual" fieldSource="CFMActual" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="CFMActual" caption="CFMActual" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_eficiencia_presupuestaCFMActual" format="0.0000">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="80"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="65" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EficienciaPresupuestal" fieldSource="EficienciaPresupuestal" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Eficiencia Presupuestal" caption="Eficiencia Presupuestal" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_eficiencia_presupuestaEficienciaPresupuestal" format="0.0000">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="103"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CumpleSLA" fieldSource="CumpleSLA" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple SLA" PathID="mc_eficiencia_presupuestaCumpleSLA" checkedValue="1" uncheckedValue="0" sourceType="ListOfValues" dataSource="1;Cumple;0;No Cumple;3;Sin Información para Medir">
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
				<TextArea id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Observaciones" PathID="mc_eficiencia_presupuestaObservaciones" fieldSource="Observaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Label id="113" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lProveedor" PathID="mc_eficiencia_presupuestalProveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="114" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lGrupoAplicativos" PathID="mc_eficiencia_presupuestalGrupoAplicativos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="115" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lServiciosRelacionados" PathID="mc_eficiencia_presupuestalServiciosRelacionados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="116" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="lCFMAnterior" PathID="mc_eficiencia_presupuestalCFMAnterior" format="0.0000">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="108"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="117"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="83" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Id" logicOperator="And" orderNumber="1" parameterSource="Id" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="82" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="mc_eficiencia_presupuestal"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="84" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="85" dataType="Integer" fieldName="Id" tableName="mc_eficiencia_presupuestal"/>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
<CustomParameter id="130" field="Id_Proveedor" dataType="Integer" parameterType="Control" parameterSource="Id_Proveedor"/>
<CustomParameter id="131" field="GrupoAplicativos" dataType="Text" parameterType="Control" parameterSource="GrupoAplicativos"/>
<CustomParameter id="132" field="ServiciosRelacionados" dataType="Text" parameterType="Control" parameterSource="ServiciosRelacionados"/>
<CustomParameter id="133" field="CFMAnterior" dataType="Float" parameterType="Control" parameterSource="CFMAnterior" format="0.0000"/>
<CustomParameter id="134" field="CFMActual" dataType="Float" parameterType="Control" parameterSource="CFMActual" format="0.0000"/>
<CustomParameter id="135" field="EficienciaPresupuestal" dataType="Float" parameterType="Control" parameterSource="EficienciaPresupuestal" format="0.0000"/>
<CustomParameter id="136" field="CumpleSLA" dataType="Integer" parameterType="Control" parameterSource="CumpleSLA"/>
<CustomParameter id="137" field="Observaciones" dataType="Text" parameterType="Control" parameterSource="Observaciones"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
<TableParameter id="138" conditionType="Parameter" useIsNull="False" field="Id" dataType="Integer" parameterType="DataSourceColumn" parameterSource="Id" searchConditionType="Equal" logicOperator="And"/>
<TableParameter id="139" conditionType="Parameter" useIsNull="False" field="Id" dataType="Integer" parameterType="URL" parameterSource="Id" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
</UConditions>
			<UFormElements>
<CustomParameter id="140" field="Id_Proveedor" dataType="Integer" parameterType="Control" parameterSource="Id_Proveedor"/>
<CustomParameter id="141" field="GrupoAplicativos" dataType="Text" parameterType="Control" parameterSource="GrupoAplicativos"/>
<CustomParameter id="142" field="ServiciosRelacionados" dataType="Text" parameterType="Control" parameterSource="ServiciosRelacionados"/>
<CustomParameter id="143" field="CFMAnterior" dataType="Float" parameterType="Control" parameterSource="CFMAnterior" format="0.0000"/>
<CustomParameter id="144" field="CFMActual" dataType="Float" parameterType="Control" parameterSource="CFMActual" format="0.0000"/>
<CustomParameter id="145" field="EficienciaPresupuestal" dataType="Float" parameterType="Control" parameterSource="EficienciaPresupuestal" format="0.0000"/>
<CustomParameter id="146" field="CumpleSLA" dataType="Integer" parameterType="Control" parameterSource="CumpleSLA"/>
<CustomParameter id="147" field="Observaciones" dataType="Text" parameterType="Control" parameterSource="Observaciones"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="70" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_eficiencia_presupuesta1" searchIds="70" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_eficiencia_presupuestal" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="mc_eficiencia_presupuesta1">
			<Components>
				<Button id="71" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_eficiencia_presupuesta1Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="72" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_Id_Proveedor" fieldSource="Id_Proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" PathID="mc_eficiencia_presupuesta1s_Id_Proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="77" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="76" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="78" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="79" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="73" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_GrupoAplicativos" fieldSource="GrupoAplicativos" wizardIsPassword="False" wizardCaption="Grupo Aplicativos" caption="Grupo Aplicativos" required="False" unique="False" wizardSize="45" wizardMaxLength="45" PathID="mc_eficiencia_presupuesta1s_GrupoAplicativos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="74" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_MesReporte" fieldSource="MesReporte" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mes Reporte" caption="Mes Reporte" required="False" unique="False" PathID="mc_eficiencia_presupuesta1s_MesReporte" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))">
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
				<ListBox id="75" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_AnioRepote" fieldSource="AnioRepote" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Anio Repote" caption="Anio Repote" required="False" unique="False" PathID="mc_eficiencia_presupuesta1s_AnioRepote" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))">
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
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="EficienciaPresLista.php" forShow="True" url="EficienciaPresLista.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="EficienciaPresLista_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="129"/>
			</Actions>
		</Event>
	</Events>
</Page>
