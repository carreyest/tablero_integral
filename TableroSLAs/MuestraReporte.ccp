<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="3" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Label id="4" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lReportContent" PathID="lReportContent">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<ImageLink id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink2" PathID="ImageLink2" hrefSource="MuestraReporte.ccp" linkProperties="{'textSource':'images/cierra_verde.jpg','textSourceDB':'','hrefSource':'MuestraReporte.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':3,'objectType':'linkParameters','0':{'sourceType':'URL','parameterSource':'1','parameterName':'fullscreen'},'1':{'sourceType':'URL','parameterSource':'0','parameterName':'fullscreen'},'2':{'sourceType':'Expression','parameterSource':'0','parameterName':'fullscreen'}}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="29" sourceType="Expression" format="yyyy-mm-dd" name="fullscreen" source="0"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</ImageLink>
		<Report id="30" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="50" linesPerPhysicalPage="10" name="ReportesMyM" connection="cnDisenio" dataSource="SELECT IdReporte, Nombre, Grupo, usuario_reporteMyM.activo AS Perm_activo 
FROM ReportesMyM INNER JOIN usuario_reporteMyM ON
ReportesMyM.IdReporte = usuario_reporteMyM.id_reporte
WHERE (Grupo &lt;&gt; '{Expr0}' OR '{grupovaloracion}' =  'CAPC' )
AND ReportesMyM.activo = {Expr1}
AND id_usuario = {MyMUserID} " pageSizeLimit="100" wizardCaption="Reportes" changedCaptionReport="True" wizardLayoutType="GroupLeftAbove" wizardGridPaging="Centered" wizardHideDetail="False" wizardPercentForSums="False" wizardEnablePrintMode="False" wizardReportSeparator="False" wizardReportAddTotalRecords="False" wizardReportAddPageNumbers="False" wizardReportAddNbsp="False" wizardReportAddDateTime="False" wizardReportDateTimeAs="CurrentDate" wizardReportAddRowNumber="False" wizardReportRowNumberResetAt="Report" wizardUseSearch="False" wizardNoRecords="No hay registros" wizardUseInterVariables="False" wizardThemeApplyTo="Page" reportAddTemplatePanel="False" editableComponentTypeString="Report">
			<Components>
				<Section id="31" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="32" visible="False" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="33" visible="True" lines="1" name="Grupo_Header">
					<Components>
						<ReportLabel id="34" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Grupo" fieldSource="Grupo" wizardCaption="Grupo" wizardIsPassword="False" visible="Yes" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ReportesMyMGrupo_HeaderGrupo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="35" visible="True" lines="1" name="Detail">
					<Components>
						<Link id="37" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Nombre" fieldSource="Nombre" wizardCaption="Nombre" wizardIsPassword="False" visible="Dynamic" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ReportesMyMDetailNombre" hrefType="Page" urlType="Relative" preserveParameters="GET" linkProperties="{&quot;textSource&quot;:&quot;&quot;,&quot;textSourceDB&quot;:&quot;Nombre&quot;,&quot;hrefSource&quot;:&quot;&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;0&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;IdReporte&quot;,&quot;parameterName&quot;:&quot;IdReporte&quot;},&quot;1&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;IdReporte&quot;,&quot;parameterName&quot;:&quot;IdReporte&quot;},&quot;2&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;IdReporte&quot;,&quot;parameterName&quot;:&quot;IdReporte&quot;},&quot;length&quot;:3,&quot;objectType&quot;:&quot;linkParameters&quot;}}">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="38"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="39" sourceType="DataField" name="IdReporte" source="IdReporte"/>
							</LinkParameters>
						</Link>
						<ReportLabel id="76" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ReportesMyMDetailReportLabel1">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Hidden id="36" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="IdReporte" fieldSource="IdReporte" wizardCaption="Id Reporte" wizardIsPassword="False" visible="Yes" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="ReportesMyMDetailIdReporte">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<ReportLabel id="40" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="activo" fieldSource="Perm_activo" wizardCaption="Activo" wizardIsPassword="False" visible="Yes" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="ReportesMyMDetailactivo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="77"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="41" visible="True" lines="0" name="Grupo_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="42" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="43" visible="True" generateDiv="False" name="NoRecords" wizardNoRecords="No hay registros">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="44" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<Navigator id="45" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Navigator>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events>
<Event name="BeforeSelect" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="82"/>
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
				<SQLParameter id="78" dataType="Text" designDefaultValue="SLAS" parameterSource="'SLAs'" parameterType="Expression" variable="Expr0"/>
				<SQLParameter id="79" dataType="Integer" defaultValue="0" designDefaultValue="1" parameterSource="1" parameterType="Expression" variable="Expr1"/>
				<SQLParameter id="80" dataType="Integer" defaultValue="0" designDefaultValue="53" parameterSource="MyMUserID" parameterType="Session" variable="MyMUserID"/>
				<SQLParameter id="81" dataType="Text" designDefaultValue="SLAS" parameterSource="GrupoValoracion" parameterType="Session" variable="grupovaloracion"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="55" name="Grupo" field="Grupo" sortOrder="asc" sqlField="ReportesMyM.Grupo"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="MuestraReporte_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="MuestraReporte.php" forShow="True" url="MuestraReporte.php" comment="//" codePage="windows-1252"/>
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
