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
		<Report id="5" secured="False" enablePrint="False" showMode="Web" sourceType="SQL" returnValueType="Number" linesPerWebPage="50" linesPerPhysicalPage="10" name="ReportesMyM" connection="cnDisenio" dataSource="SELECT * 
FROM ReportesMyM 
where (grupo &lt;&gt; 'SLAs' or '{GrupoValoracion}'  ='SLAs')
	and activo=1
ORDER BY Nombre" pageSizeLimit="100" wizardCaption="Reportes" changedCaptionReport="True" wizardLayoutType="GroupAbove" wizardGridPaging="Centered" wizardHideDetail="False" wizardPercentForSums="False" wizardEnablePrintMode="False" wizardReportSeparator="False" wizardReportAddTotalRecords="False" wizardReportAddPageNumbers="False" wizardReportAddNbsp="False" wizardReportAddDateTime="False" wizardReportDateTimeAs="CurrentDate" wizardReportAddRowNumber="False" wizardReportRowNumberResetAt="Report" wizardUseSearch="False" wizardNoRecords="No hay registros" wizardUseInterVariables="False" wizardThemeApplyTo="Page" reportAddTemplatePanel="False" editableComponentTypeString="Report">
			<Components>
				<Section id="7" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="8" visible="True" lines="0" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="10" visible="True" lines="2" name="grupo_Header">
					<Components>
						<ReportLabel id="16" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="grupo" fieldSource="Grupo" fieldTableSource="ReportesMyM" wizardCaption="Grupo" wizardIsPassword="False" visible="Yes" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="ReportesMyMgrupo_Headergrupo">
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
				<Section id="11" visible="True" lines="1" name="Detail">
					<Components>
						<Link id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" preserveParameters="GET" name="Nombre" fieldSource="Nombre" fieldTableSource="ReportesMyM" wizardCaption="Nombre" wizardIsPassword="False" linkProperties="{'textSource':'','textSourceDB':'Nombre','hrefSource':'','hrefSourceDB':'Nombre','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'IdReporte','parameterName':'IdReporte'},'length':1,'objectType':'linkParameters'}}" PathID="ReportesMyMDetailNombre" urlType="Relative" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="19" sourceType="DataField" name="IdReporte" source="IdReporte"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="12" visible="True" lines="0" name="grupo_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="13" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="14" visible="True" generateDiv="False" name="NoRecords" wizardNoRecords="No hay registros">
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
				<Section id="15" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<Navigator id="17" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardImagesScheme="{ccs_style}">
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
			<Events/>
			<TableParameters/>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<PKFields>
			</PKFields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="20" dataType="Text" designDefaultValue="SLAs" parameterSource="GrupoValoracion" parameterType="Session" variable="GrupoValoracion"/>
			</SQLParameters>
			<ReportGroups>
				<ReportGroup id="9" name="grupo" field="Grupo" sqlField="ReportesMyM.Grupo" sortOrder="asc"/>
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
