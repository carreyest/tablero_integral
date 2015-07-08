<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\ConfigDeCargas" secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="proceso_carga_archivosSearch" returnPage="ProcesoCargaAList.ccp" wizardCaption="Search  " wizardOrientation="Vertical" wizardFormMethod="post" wizardTypeComponent="Search" PathID="proceso_carga_archivosSearch" parentId="6">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="proceso_carga_archivosSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardCaption="Keyword" fieldSource="keyword" wizardIsPassword="False" caption="Keyword" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="proceso_carga_archivosSearchs_keyword">
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
		<Grid id="6" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="20" name="proceso_carga_archivos" connection="ConnCarga" pageSizeLimit="100" wizardCaption="List of Proceso Carga Archivos " wizardGridType="Tabular" wizardAllowSorting="True" wizardSortingType="SimpleDir" wizardUsePageScroller="True" wizardAllowInsert="True" wizardAltRecord="False" wizardRecordSeparator="False" wizardAltRecordType="Controls" wizardUseSearch="True" childId="2" dataSource="proceso_carga_archivos">
			<Components>
				<Link id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="proceso_carga_archivos_Insert" hrefSource="ProcesoCargaAMaint.ccp" removeParameters="cve_carga" wizardThemeItem="NavigatorLink" wizardDefaultValue="Add New" PathID="proceso_carga_archivosproceso_carga_archivos_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Sorter id="21" visible="True" name="Sorter_cve_carga" column="cve_carga" wizardCaption="Cve Carga" wizardSortingType="SimpleDir" wizardControl="cve_carga" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_cve_carga">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="22" visible="True" name="Sorter_descripcion" column="descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="descripcion" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="23" visible="True" name="Sorter_mascara_archivo" column="mascara_archivo" wizardCaption="Mascara Archivo" wizardSortingType="SimpleDir" wizardControl="mascara_archivo" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_mascara_archivo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="24" visible="True" name="Sorter_formato_archivo" column="formato_archivo" wizardCaption="Formato Archivo" wizardSortingType="SimpleDir" wizardControl="formato_archivo" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_formato_archivo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="25" visible="True" name="Sorter_repositorio" column="repositorio" wizardCaption="Repositorio" wizardSortingType="SimpleDir" wizardControl="repositorio" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_repositorio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="27" visible="True" name="Sorter_db_destino" column="db_destino" wizardCaption="Db Destino" wizardSortingType="SimpleDir" wizardControl="db_destino" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_db_destino">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="28" visible="True" name="Sorter_tabla_destino" column="tabla_destino" wizardCaption="Tabla Destino" wizardSortingType="SimpleDir" wizardControl="tabla_destino" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_tabla_destino">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="30" visible="True" name="Sorter_numero_hoja_excel" column="numero_hoja_excel" wizardCaption="Numero Hoja Excel" wizardSortingType="SimpleDir" wizardControl="numero_hoja_excel" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_numero_hoja_excel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="31" visible="True" name="Sorter_filas_sin_datos_excel" column="filas_sin_datos_excel" wizardCaption="Filas Sin Datos Excel" wizardSortingType="SimpleDir" wizardControl="filas_sin_datos_excel" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_filas_sin_datos_excel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="32" visible="True" name="Sorter_campo_fecha_cierre" column="campo_fecha_cierre" wizardCaption="Campo Fecha Cierre" wizardSortingType="SimpleDir" wizardControl="campo_fecha_cierre" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_campo_fecha_cierre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="33" visible="True" name="Sorter_campo_indice" column="campo_indice" wizardCaption="Campo Indice" wizardSortingType="SimpleDir" wizardControl="campo_indice" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_campo_indice">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="35" visible="True" name="Sorter_periodicidad" column="periodicidad" wizardCaption="Periodicidad" wizardSortingType="SimpleDir" wizardControl="periodicidad" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_periodicidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" preserveParameters="GET" name="cve_carga" fieldSource="cve_carga" wizardCaption="Cve Carga" wizardIsPassword="False" hrefSource="ProcesoCargaAMaint.ccp" PathID="proceso_carga_archivoscve_carga" urlType="Relative">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="38" sourceType="DataField" format="yyyy-mm-dd" name="cve_carga" source="cve_carga"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripcion" fieldSource="descripcion" wizardCaption="Descripcion" wizardIsPassword="False" PathID="proceso_carga_archivosdescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="42" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mascara_archivo" fieldSource="mascara_archivo" wizardCaption="Mascara Archivo" wizardIsPassword="False" PathID="proceso_carga_archivosmascara_archivo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="formato_archivo" fieldSource="formato_archivo" wizardCaption="Formato Archivo" wizardIsPassword="False" PathID="proceso_carga_archivosformato_archivo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="46" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="repositorio" fieldSource="repositorio" wizardCaption="Repositorio" wizardIsPassword="False" PathID="proceso_carga_archivosrepositorio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="50" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="db_destino" fieldSource="db_destino" wizardCaption="Db Destino" wizardIsPassword="False" PathID="proceso_carga_archivosdb_destino">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="52" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tabla_destino" fieldSource="tabla_destino" wizardCaption="Tabla Destino" wizardIsPassword="False" PathID="proceso_carga_archivostabla_destino">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="56" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="numero_hoja_excel" fieldSource="numero_hoja_excel" wizardCaption="Numero Hoja Excel" wizardIsPassword="False" wizardAlign="right" PathID="proceso_carga_archivosnumero_hoja_excel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="58" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="filas_sin_datos_excel" fieldSource="filas_sin_datos_excel" wizardCaption="Filas Sin Datos Excel" wizardIsPassword="False" wizardAlign="right" PathID="proceso_carga_archivosfilas_sin_datos_excel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="60" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="campo_fecha_cierre" fieldSource="campo_fecha_cierre" wizardCaption="Campo Fecha Cierre" wizardIsPassword="False" PathID="proceso_carga_archivoscampo_fecha_cierre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="62" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="campo_indice" fieldSource="campo_indice" wizardCaption="Campo Indice" wizardIsPassword="False" PathID="proceso_carga_archivoscampo_indice">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="66" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="periodicidad" fieldSource="periodicidad" wizardCaption="Periodicidad" wizardIsPassword="False" PathID="proceso_carga_archivosperiodicidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="67" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="TextButtons" wizardFirst="True" wizardFirstText="|&amp;lt;" wizardPrev="True" wizardPrevText="&amp;lt;&amp;lt;" wizardNext="True" wizardNextText="&amp;gt;&amp;gt;" wizardLast="True" wizardLastText="&amp;gt;|" wizardPageNumbers="Simple" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Basic">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Hide-Show Component" actionCategory="General" id="68" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="293" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="campo_grupo" PathID="proceso_carga_archivoscampo_grupo" fieldSource="grupo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Sorter id="294" visible="True" name="Grupo" wizardSortingType="SimpleDir" PathID="proceso_carga_archivosGrupo" wizardCaption="Sorter1" column="grupo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="267" conditionType="Parameter" useIsNull="False" dataType="Text" field="periodicidad" logicOperator="Or" orderNumber="12" parameterSource="s_keyword" parameterType="URL" rightBrackets="1" searchConditionType="Contains"/>
<TableParameter id="268" conditionType="Parameter" useIsNull="False" dataType="Text" field="campo_indice" logicOperator="Or" orderNumber="11" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
<TableParameter id="269" conditionType="Parameter" useIsNull="False" dataType="Text" field="campo_fecha_cierre" logicOperator="Or" orderNumber="10" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
<TableParameter id="270" conditionType="Parameter" useIsNull="False" dataType="Text" field="procedimiento_extra" logicOperator="Or" orderNumber="9" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
<TableParameter id="271" conditionType="Parameter" useIsNull="False" dataType="Text" field="tabla_destino" logicOperator="Or" orderNumber="8" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
<TableParameter id="272" conditionType="Parameter" useIsNull="False" dataType="Text" field="db_destino" logicOperator="Or" orderNumber="7" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
<TableParameter id="273" conditionType="Parameter" useIsNull="False" dataType="Text" field="mails_responsables" logicOperator="Or" orderNumber="6" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
<TableParameter id="274" conditionType="Parameter" useIsNull="False" dataType="Text" field="repositorio" logicOperator="Or" orderNumber="5" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
<TableParameter id="275" conditionType="Parameter" useIsNull="False" dataType="Text" field="formato_archivo" logicOperator="Or" orderNumber="4" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
<TableParameter id="276" conditionType="Parameter" useIsNull="False" dataType="Text" field="mascara_archivo" logicOperator="Or" orderNumber="3" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
<TableParameter id="277" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="Or" orderNumber="2" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
<TableParameter id="278" conditionType="Parameter" useIsNull="False" dataType="Text" field="cve_carga" leftBrackets="1" logicOperator="Or" orderNumber="1" parameterSource="s_keyword" parameterType="URL" searchConditionType="Contains"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="266" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="proceso_carga_archivos"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="279" fieldName="periodicidad" tableName="proceso_carga_archivos"/>
<Field id="280" fieldName="campo_indice" tableName="proceso_carga_archivos"/>
<Field id="281" fieldName="campo_fecha_cierre" tableName="proceso_carga_archivos"/>
<Field id="282" fieldName="filas_sin_datos_excel" tableName="proceso_carga_archivos"/>
<Field id="283" fieldName="numero_hoja_excel" tableName="proceso_carga_archivos"/>
<Field id="284" fieldName="tabla_destino" tableName="proceso_carga_archivos"/>
<Field id="285" fieldName="db_destino" tableName="proceso_carga_archivos"/>
<Field id="286" fieldName="repositorio" tableName="proceso_carga_archivos"/>
<Field id="287" fieldName="formato_archivo" tableName="proceso_carga_archivos"/>
<Field id="288" fieldName="mascara_archivo" tableName="proceso_carga_archivos"/>
<Field id="289" fieldName="descripcion" tableName="proceso_carga_archivos"/>
<Field id="290" fieldName="cve_carga" tableName="proceso_carga_archivos"/>
<Field id="291" fieldName="grupo" tableName="proceso_carga_archivos"/>
</Fields>
			<PKFields>
				<PKField id="292" dataType="Text" fieldName="cve_carga" tableName="proceso_carga_archivos"/>
</PKFields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<IncludePage id="70" name="Header" PathID="Header" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Menu id="13" secured="False" sourceType="Table" returnValueType="Number" name="Menu1" menuType="Horizontal" menuSourceType="Static" PathID="Menu1">
			<Components>
				<Link id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ItemLink" PathID="Menu1ItemLink">
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
				<MenuItem id="295" name="MenuItem2" caption="Procesos de carga" url="ProcesoCargaAList.ccp" target="_self"/>
<MenuItem id="296" name="MenuItem3" caption="Layouts de procesos de carga" url="DetalleLayoutList.ccp" target="_self"/>
<MenuItem id="297" name="MenuItem1" caption="Log ultimas cargas" url="UltimasCargas.ccp" target="_self"/>
</MenuItems>
			<Features/>
		</Menu>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="ProcesoCargaAList_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="ProcesoCargaAList.php" forShow="True" url="ProcesoCargaAList.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="69" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
