<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\ConfigDeCargas" secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="detalle_layoutSearch" returnPage="DetalleLayoutList.ccp" wizardCaption="Search  " wizardOrientation="Vertical" wizardFormMethod="post" wizardTypeComponent="Search" PathID="detalle_layoutSearch" parentId="6">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" parentName="detalle_layoutSearch" PathID="detalle_layoutSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardCaption="Keyword" fieldSource="keyword" wizardIsPassword="False" parentName="detalle_layoutSearch" caption="Keyword" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="detalle_layoutSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Link id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="detalle_layout_list" hrefSource="DetalleLayoutList.ccp" wizardDefaultValue="Detalle Layout" PathID="detalle_layoutSearchdetalle_layout_list" parentType="Page">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
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
		<Grid id="6" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="20" name="detalle_layout" connection="ConnCarga" pageSizeLimit="100" wizardCaption="List of Detalle Layout " wizardGridType="Tabular" wizardAllowSorting="True" wizardSortingType="SimpleDir" wizardUsePageScroller="True" wizardAllowInsert="True" wizardAltRecord="False" wizardRecordSeparator="False" wizardAltRecordType="Controls" wizardUseSearch="True" childId="2" dataSource="detalle_layout">
			<Components>
				<Link id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="detalle_layout_Insert" hrefSource="DetalleLayoutMaint.ccp" removeParameters="id_detalle_layout" wizardThemeItem="NavigatorLink" wizardDefaultValue="Add New" parentName="detalle_layout" PathID="detalle_layoutdetalle_layout_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Sorter id="15" visible="True" name="Sorter_id_detalle_layout" column="id_detalle_layout" wizardCaption="Id Detalle Layout" wizardSortingType="SimpleDir" wizardControl="id_detalle_layout" wizardAddNbsp="False" PathID="detalle_layoutSorter_id_detalle_layout">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_cve_carga" column="cve_carga" wizardCaption="Cve Carga" wizardSortingType="SimpleDir" wizardControl="cve_carga" wizardAddNbsp="False" PathID="detalle_layoutSorter_cve_carga">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="17" visible="True" name="Sorter_nombre_columna_tabla" column="nombre_columna_tabla" wizardCaption="Nombre Columna Tabla" wizardSortingType="SimpleDir" wizardControl="nombre_columna_tabla" wizardAddNbsp="False" PathID="detalle_layoutSorter_nombre_columna_tabla">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="18" visible="True" name="Sorter_num_columna_excel" column="num_columna_excel" wizardCaption="Num Columna Excel" wizardSortingType="SimpleDir" wizardControl="num_columna_excel" wizardAddNbsp="False" PathID="detalle_layoutSorter_num_columna_excel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="19" visible="True" name="Sorter_tipo_columna" column="tipo_columna" wizardCaption="Tipo Columna" wizardSortingType="SimpleDir" wizardControl="tipo_columna" wizardAddNbsp="False" PathID="detalle_layoutSorter_tipo_columna">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="20" visible="True" name="Sorter_acepta_nulo" column="acepta_nulo" wizardCaption="Acepta Nulo" wizardSortingType="SimpleDir" wizardControl="acepta_nulo" wizardAddNbsp="False" PathID="detalle_layoutSorter_acepta_nulo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="21" visible="True" name="Sorter_dato_indispensable" column="dato_indispensable" wizardCaption="Dato Indispensable" wizardSortingType="SimpleDir" wizardControl="dato_indispensable" wizardAddNbsp="False" PathID="detalle_layoutSorter_dato_indispensable">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="22" visible="True" name="Sorter_valor_x_default" column="valor_x_default" wizardCaption="Valor X Default" wizardSortingType="SimpleDir" wizardControl="valor_x_default" wizardAddNbsp="False" PathID="detalle_layoutSorter_valor_x_default">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="id_detalle_layout" fieldSource="id_detalle_layout" wizardCaption="Id Detalle Layout" wizardIsPassword="False" parentName="detalle_layout" rowNumber="1" wizardAlign="right" hrefSource="DetalleLayoutMaint.ccp" PathID="detalle_layoutid_detalle_layout" urlType="Relative">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="25" sourceType="DataField" format="yyyy-mm-dd" name="id_detalle_layout" source="id_detalle_layout"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="cve_carga" fieldSource="cve_carga" wizardCaption="Cve Carga" wizardIsPassword="False" parentName="detalle_layout" rowNumber="1" PathID="detalle_layoutcve_carga">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre_columna_tabla" fieldSource="nombre_columna_tabla" wizardCaption="Nombre Columna Tabla" wizardIsPassword="False" parentName="detalle_layout" rowNumber="1" PathID="detalle_layoutnombre_columna_tabla">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="num_columna_excel" fieldSource="num_columna_excel" wizardCaption="Num Columna Excel" wizardIsPassword="False" parentName="detalle_layout" rowNumber="1" PathID="detalle_layoutnum_columna_excel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo_columna" fieldSource="tipo_columna" wizardCaption="Tipo Columna" wizardIsPassword="False" parentName="detalle_layout" rowNumber="1" PathID="detalle_layouttipo_columna">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="acepta_nulo" fieldSource="acepta_nulo" wizardCaption="Acepta Nulo" wizardIsPassword="False" parentName="detalle_layout" rowNumber="1" PathID="detalle_layoutacepta_nulo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="dato_indispensable" fieldSource="dato_indispensable" wizardCaption="Dato Indispensable" wizardIsPassword="False" parentName="detalle_layout" rowNumber="1" PathID="detalle_layoutdato_indispensable">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="valor_x_default" fieldSource="valor_x_default" wizardCaption="Valor X Default" wizardIsPassword="False" parentName="detalle_layout" rowNumber="1" PathID="detalle_layoutvalor_x_default">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="40" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="TextButtons" wizardFirst="True" wizardFirstText="|&amp;lt;" wizardPrev="True" wizardPrevText="&amp;lt;&amp;lt;" wizardNext="True" wizardNextText="&amp;gt;&amp;gt;" wizardLast="True" wizardLastText="&amp;gt;|" wizardPageNumbers="Simple" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Basic">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Hide-Show Component" actionCategory="General" id="41" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="51"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="52"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="59" conditionType="Parameter" useIsNull="False" dataType="Text" field="cve_carga" leftBrackets="1" logicOperator="Or" orderNumber="1" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
				<TableParameter id="60" conditionType="Parameter" useIsNull="False" dataType="Text" field="nombre_columna_tabla" logicOperator="Or" orderNumber="2" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
				<TableParameter id="61" conditionType="Parameter" useIsNull="False" dataType="Text" field="num_columna_excel" logicOperator="Or" orderNumber="3" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
				<TableParameter id="62" conditionType="Parameter" useIsNull="False" dataType="Text" field="tipo_columna" logicOperator="Or" orderNumber="4" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
				<TableParameter id="63" conditionType="Parameter" useIsNull="False" dataType="Text" field="acepta_nulo" logicOperator="Or" orderNumber="5" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
				<TableParameter id="64" conditionType="Parameter" useIsNull="False" dataType="Text" field="valor_x_default" logicOperator="Or" orderNumber="6" parameterSource="s_keyword" parameterType="URL" rightBrackets="1" searchConditionType="Contains"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="58" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="detalle_layout"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="65" fieldName="id_detalle_layout" tableName="detalle_layout"/>
				<Field id="66" fieldName="cve_carga" tableName="detalle_layout"/>
				<Field id="67" fieldName="nombre_columna_tabla" tableName="detalle_layout"/>
				<Field id="68" fieldName="num_columna_excel" tableName="detalle_layout"/>
				<Field id="69" fieldName="tipo_columna" tableName="detalle_layout"/>
				<Field id="70" fieldName="acepta_nulo" tableName="detalle_layout"/>
				<Field id="71" fieldName="dato_indispensable" tableName="detalle_layout"/>
				<Field id="72" fieldName="valor_x_default" tableName="detalle_layout"/>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<IncludePage id="43" name="Header" PathID="Header" parentType="Page" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Menu id="53" secured="False" sourceType="Table" returnValueType="Number" name="Menu1" menuType="Horizontal" menuSourceType="Static" PathID="Menu1">
			<Components>
				<Link id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ItemLink" PathID="Menu1ItemLink">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<MenuItems>
				<MenuItem id="73" name="MenuItem2" caption="Procesos de carga" url="ProcesoCargaAList.ccp" target="_self"/>
<MenuItem id="74" name="MenuItem3" caption="Layouts de procesos de carga" url="DetalleLayoutList.ccp" target="_self"/>
<MenuItem id="75" name="MenuItem1" caption="Log ultimas cargas" url="UltimasCargas.ccp" target="_self"/>
<MenuItem id="76" name="MenuItem4" caption="Ejecutar Carga" url="ExecCarga.ccp" target="_self"/>
</MenuItems>
			<Features/>
		</Menu>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="DetalleLayoutList_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="DetalleLayoutList.php" forShow="True" url="DetalleLayoutList.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="45" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="50"/>
			</Actions>
		</Event>
	</Events>
</Page>
