<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\ConfigDeCargas" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="../Header.ccp">
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
				<MenuItem id="33" name="MenuItem2" caption="Procesos de carga" url="ProcesoCargaAList.ccp" target="_self"/>
				<MenuItem id="34" name="MenuItem3" caption="Layouts de procesos de carga" url="DetalleLayoutList.ccp" target="_self"/>
				<MenuItem id="35" name="MenuItem1" caption="Log ultimas cargas" url="UltimasCargas.ccp" target="_self"/>
				<MenuItem id="36" name="MenuItem4" caption="Ejecutar Carga" url="ExecCarga.ccp" target="_self"/>
			</MenuItems>
			<Features/>
		</Menu>
		<Grid id="18" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="Grid1" connection="ConnCarga" dataSource="select b.nombreCarga,b.fecha_ejecucion,b.status,b.archivo_cargado, b.registros_en_archivo Registros, P.tabla_destino, b.mensajes
from bitacora_de_carga b
inner join (select nombreCarga,  MAX(fecha_ejecucion) maxfecha from bitacora_de_carga group by nombreCarga) j on b.nombreCarga=j.nombreCarga and b.fecha_ejecucion=j.maxfecha
left join proceso_carga_archivos P ON b.nombreCarga=P.cve_carga
order by 2 desc" pageSizeLimit="100" pageSize="True" wizardCaption="Ultimas cargas realizadas" wizardTheme="{CCS_Style}" wizardThemeApplyTo="Component" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay Registros" wizardGridPagingType="Custom" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="Grid1" wizardThemeVersion="3.0">
			<Components>
				<Sorter id="19" visible="True" name="Sorter_nombreCarga" column="nombreCarga" wizardCaption="Nombre Carga" wizardTheme="{CCS_Style}" wizardSortingType="SimpleDir" wizardControl="nombreCarga" wizardAddNbsp="False" PathID="Grid1Sorter_nombreCarga" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="20" visible="True" name="Sorter_fecha_ejecucion" column="fecha_ejecucion" wizardCaption="Fecha Ejecucion" wizardTheme="{CCS_Style}" wizardSortingType="SimpleDir" wizardControl="fecha_ejecucion" wizardAddNbsp="False" PathID="Grid1Sorter_fecha_ejecucion" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="21" visible="True" name="Sorter_status" column="status" wizardCaption="Status" wizardTheme="{CCS_Style}" wizardSortingType="SimpleDir" wizardControl="status" wizardAddNbsp="False" PathID="Grid1Sorter_status" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="22" visible="True" name="Sorter_archivo_cargado" column="archivo_cargado" wizardCaption="Archivo Cargado" wizardTheme="{CCS_Style}" wizardSortingType="SimpleDir" wizardControl="archivo_cargado" wizardAddNbsp="False" PathID="Grid1Sorter_archivo_cargado" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="23" visible="True" name="Sorter_Registros" column="Registros" wizardCaption="Registros" wizardTheme="{CCS_Style}" wizardSortingType="SimpleDir" wizardControl="Registros" wizardAddNbsp="False" PathID="Grid1Sorter_Registros" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="24" visible="True" name="Sorter_tabla_destino" column="tabla_destino" wizardCaption="Tabla Destino" wizardTheme="{CCS_Style}" wizardSortingType="SimpleDir" wizardControl="tabla_destino" wizardAddNbsp="False" PathID="Grid1Sorter_tabla_destino" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombreCarga" fieldSource="nombreCarga" wizardCaption="Nombre Carga" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1nombreCarga" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>

				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_ejecucion" fieldSource="fecha_ejecucion" wizardCaption="Fecha Ejecucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1fecha_ejecucion" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="GeneralDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="status" fieldSource="status" wizardCaption="Status" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1status" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="archivo_cargado" fieldSource="archivo_cargado" wizardCaption="Archivo Cargado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1archivo_cargado" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Registros" fieldSource="Registros" wizardCaption="Registros" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1Registros" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tabla_destino" fieldSource="tabla_destino" wizardCaption="Tabla Destino" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1tabla_destino" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Memo" html="False" generateSpan="False" name="mensajes" fieldSource="mensajes" wizardCaption="Mensajes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1mensajes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="32" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardTheme="{CCS_Style}" wizardImagesScheme="{ccs_style}" wizardThemeVersion="3.0">
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
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="UltimasCargas.php" forShow="True" url="UltimasCargas.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
