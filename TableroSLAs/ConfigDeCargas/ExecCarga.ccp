<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\ConfigDeCargas" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Menu id="3" secured="False" sourceType="Table" returnValueType="Number" name="Menu1" menuType="Horizontal" menuSourceType="Static" PathID="Menu1">
			<Components>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ItemLink" PathID="Menu1ItemLink">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="55"/>
					</Actions>
				</Event>
			</Events>
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
				<MenuItem id="51" name="MenuItem2" caption="Procesos de carga" url="ProcesoCargaAList.ccp" target="_self"/>
				<MenuItem id="52" name="MenuItem3" caption="Layouts de procesos de carga" url="DetalleLayoutList.ccp" target="_self"/>
				<MenuItem id="53" name="MenuItem1" caption="Log ultimas cargas" url="UltimasCargas.ccp" target="_self"/>
				<MenuItem id="54" name="MenuItem4" caption="Ejecutar Carga" url="ExecCarga.ccp" target="_self"/>
			</MenuItems>
			<Features/>
		</Menu>
		<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="LExec" PathID="LExec">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Grid id="40" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="30" name="proceso_carga_archivos" connection="ConnCarga" dataSource="proceso_carga_archivos" orderBy="cve_carga" pageSizeLimit="100" pageSize="True" wizardCaption="De un click sobre el proceso para ejecutar" wizardTheme="{CCS_Style}" wizardThemeApplyTo="Component" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay Registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="proceso_carga_archivos" wizardThemeVersion="3.0">
			<Components>
				<Sorter id="42" visible="True" name="Sorter_cve_carga" column="cve_carga" wizardCaption="Cve Carga" wizardTheme="{CCS_Style}" wizardSortingType="SimpleDir" wizardControl="cve_carga" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_cve_carga" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="43" visible="True" name="Sorter_descripcion" column="descripcion" wizardCaption="Descripcion" wizardTheme="{CCS_Style}" wizardSortingType="SimpleDir" wizardControl="descripcion" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_descripcion" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="44" visible="True" name="Sorter_periodicidad" column="periodicidad" wizardCaption="Periodicidad" wizardTheme="{CCS_Style}" wizardSortingType="SimpleDir" wizardControl="periodicidad" wizardAddNbsp="False" PathID="proceso_carga_archivosSorter_periodicidad" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="45" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="cve_carga" fieldSource="cve_carga" wizardCaption="Cve Carga" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="proceso_carga_archivoscve_carga" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="ExecCarga.ccp" linkProperties="{'textSource':'','textSourceDB':'cve_carga','hrefSource':'ExecCarga.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':1,'objectType':'linkParameters','0':{'sourceType':'DataField','parameterSource':'cve_carga','parameterName':'cveCarga'}}}"><Components/>
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
					<LinkParameters>
						<LinkParameter id="49" sourceType="DataField" name="cveCarga" source="cve_carga"/>
					</LinkParameters>
				</Link>
				<Label id="46" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripcion" fieldSource="descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="proceso_carga_archivosdescripcion" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="periodicidad" fieldSource="periodicidad" wizardCaption="Periodicidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="proceso_carga_archivosperiodicidad" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="48" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardTheme="{CCS_Style}" wizardImagesScheme="{ccs_style}" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="50"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables>
				<JoinTable id="41" posHeight="180" posLeft="10" posTop="10" posWidth="160" schemaName="dbo" tableName="proceso_carga_archivos"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="ExecCarga.php" forShow="True" url="ExecCarga.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="ExecCarga_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="12"/>
			</Actions>
		</Event>
	</Events>
</Page>
