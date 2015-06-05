<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="True" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" needGeneration="0">
	<Components>
		<Link id="2" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkCuadroNS" PathID="MenuTablerolkCuadroNS" hrefSource="PPMCsApbCuadroNSRSxls.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cuadro Ns RSs','textSourceDB':'','hrefSource':'PPMCsApbCuadroNSRSxls.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkDetalleRS" PathID="MenuTablerolkDetalleRS" hrefSource="PPMCsApbDetalleRSxls.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Detalle RSs','textSourceDB':'','hrefSource':'PPMCsApbDetalleRSxls.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkTableroSLAs" PathID="MenuTablerolkTableroSLAs" hrefSource="TableroSLAs.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Tablero SLAs','textSourceDB':'','hrefSource':'TableroSLAs.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkCuadroNSInc" PathID="MenuTablerolkCuadroNSInc" hrefSource="IncidentesCuadroNSxls.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cuadro NS Incidentes','textSourceDB':'','hrefSource':'IncidentesCuadroNSxls.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkDetalleIncidentesNS" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="MenuTablerolkDetalleIncidentesNS" hrefSource="IncidentesDetalleNS.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Detalle NS Incidentes','textSourceDB':'','hrefSource':'IncidentesDetalleNS.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Panel id="13" visible="True" generateDiv="False" name="pnlDictamen" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" wizardInnerHTML="
 	&lt;div style=&quot;width: 100px; height: 30px; text-align: center; font-weight: bold; background-color: rgb(160, 160, 160);&quot;&gt;
 		&lt;a href=&quot;{Link1_Src}&quot; id=&quot;MenuTableroLink1&quot; style=&quot;top: 20%; color: rgb(250, 250, 250); position: relative;&quot;&gt;Generar Dictamen&lt;/a&gt;
 	&lt;/div&gt;" PathID="MenuTableropnlDictamen">
			<Components>
				<Link id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="MenuTableropnlDictamenLink1" hrefSource="GeneraDictamen.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Generar Dictamen','textSourceDB':'','hrefSource':'GeneraDictamen.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'1','parameterName':'chkExport'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="15" sourceType="Expression" name="chkExport" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<ImageLink id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkReporteExcel1" PathID="MenuTablerolkReporteExcel1" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Reporte Excel','textSourceDB':'','hrefSource':'TableroExcel.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" hrefSource="TableroExcel.ccp">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</ImageLink>
		<Link id="17" visible="No" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="MenuTableroLink2" hrefSource="TableroExcel.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Mod. de Gobierno','textSourceDB':'','hrefSource':'TableroExcel.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'1','parameterName':'SAT'},'length':1,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="18" sourceType="Expression" name="SAT" source="1"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkReporteExcel2" PathID="MenuTablerolkReporteExcel2" wizardUseTemplateBlock="False" linkProperties="{'textSource':'x','textSourceDB':'','hrefSource':'TableroExcel.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'1','parameterName':'DyP'},'1':{'sourceType':'Expression','parameterSource':'1','parameterName':'DyP'},'length':2,'objectType':'linkParameters'}}" hrefSource="TableroExcel.ccp">
			<Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="20" sourceType="Expression" name="DyP" source="1"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="MenuTablero.php" forShow="True" url="MenuTablero.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="MenuTablero_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="14"/>
			</Actions>
		</Event>
	</Events>
</Page>
