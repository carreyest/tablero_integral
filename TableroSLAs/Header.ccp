<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="True" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" PathID="Header">
	<Components>
		<ImageLink id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="HeaderImageLink1" linkProperties="{&quot;textSource&quot;:&quot;x&quot;,&quot;textSourceDB&quot;:&quot;&quot;,&quot;hrefSource&quot;:&quot;&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;length&quot;:0,&quot;objectType&quot;:&quot;linkParameters&quot;}}">
<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</ImageLink>
		<Hidden id="12" fieldSourceType="DBColumn" dataType="Text" name="hdLogoPath" PathID="HeaderhdLogoPath">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Hidden>
		<Panel id="14" visible="True" generateDiv="False" name="pnlMenu" PathID="HeaderpnlMenu">
			<Components>
				<Link id="2" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkUniverso" hrefSource="UniversoLista.ccp" PathID="HeaderpnlMenulkUniverso">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkIncidentes" hrefSource="IncidentesLista.ccp" PathID="HeaderpnlMenulkIncidentes">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="15" sourceType="Expression" format="yyyy-mm-dd" name="s_mes_param" source="CCGetParam(&quot;s_MesReporte&quot;)"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkRequerimientos" hrefSource="PPMCsApbLista.ccp" PathID="HeaderpnlMenulkRequerimientos">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkPPMCCierre" hrefSource="PPMCsCrbLista.ccp" PathID="HeaderpnlMenulkPPMCCierre">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="Link2" hrefSource="EficienciaPresLista.ccp" PathID="HeaderpnlMenuLink2">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="18" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="Link3" hrefSource="SLAsCAPCLista.ccp" PathID="HeaderpnlMenuLink3">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Panel id="24" visible="True" generateDiv="False" name="pnlMenuAdmin" wizardInnerHTML="&lt;div style=&quot;FONT-SIZE: 12px; HEIGHT: 40px; WIDTH: 100px; VERTICAL-ALIGN: bottom; COLOR: #ffffff; TEXT-ALIGN: center; BACKGROUND-COLOR: #ffffff&quot;&gt;
              &lt;!-- BEGIN Link lkAdmin --&gt;&lt;a href=&quot;{lkAdmin_Src}&quot; id=&quot;HeaderMyMpnlMenulkAdmin&quot; style=&quot;POSITION: relative; TOP: 20%&quot;&gt;Admin&lt;/a&gt;&lt;!-- END Link lkAdmin --&gt;
            &lt;/div&gt;" PathID="HeaderpnlMenupnlMenuAdmin">
					<Components>
						<Link id="7" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkAdmin" PathID="HeaderpnlMenupnlMenuAdminlkAdmin" hrefSource="MainAdmin.ccp" wizardUseTemplateBlock="True" linkProperties="{'textSource':'Admin','textSourceDB':'','hrefSource':'MainAdmin.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="19" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="13" visible="True" generateDiv="False" name="Panel1" wizardInnerHTML=" &lt;td style=&quot;FONT-SIZE: 10px; WIDTH: 25%; FONT-WEIGHT: bold; COLOR: rgb(0,122,173); BACKGROUND-COLOR: rgb(222,222,213)&quot;&gt;
      &lt;div style=&quot;HEIGHT: 24px; COLOR: #444444; MARGIN-LEFT: 7px; BACKGROUND-COLOR: #ffffff&quot;&gt;
        &lt;img style=&quot;MARGIN-TOP: 5px&quot; src=&quot;images/user.png&quot;&gt;&lt;/img&gt;&amp;nbsp;&amp;nbsp;Usuario:&amp;nbsp;{lSesion} 
      &lt;/div&gt;
 &lt;/td&gt; 
    &lt;td style=&quot;FONT-SIZE: 10px; WIDTH: 30%; FONT-WEIGHT: bold; COLOR: rgb(0,122,173); BACKGROUND-COLOR: rgb(222,222,213)&quot;&gt;
      &lt;div style=&quot;HEIGHT: 24px; MARGIN-LEFT: 0px; BACKGROUND-COLOR: #ffffff&quot;&gt;
        &amp;nbsp;&lt;img id=&quot;HeaderImage1&quot; style=&quot;MARGIN-TOP: 5px&quot; alt=&quot;Cerrar Sesión&quot; src=&quot;images/cierre.png&quot;&gt;&amp;nbsp; &lt;a href=&quot;{Link1_Src}&quot; id=&quot;HeaderMyMLink1&quot;&gt;Cerrar Sesión&lt;/a&gt; &lt;img style=&quot;MARGIN-TOP: 0px; MARGIN-RIGHT: -2px&quot; src=&quot;images/cierre2.png&quot;&gt;
      &lt;/div&gt;
 &lt;/td&gt; " PathID="HeaderPanel1">
			<Components>
				<Link id="8" fieldSourceType="CodeExpression" dataType="Text" html="False" name="lSesion" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="HeaderPanel1lSesion" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="CambiarPsw.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'','textSourceDB':'','hrefSource':'CambiarPsw.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
				<Link id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="HeaderPanel1Link1" hrefSource="Logout.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cerrar Sesión','textSourceDB':'','hrefSource':'Logout.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'1','parameterName':'Logout'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="23" visible="True" generateDiv="False" name="Panel2" wizardInnerHTML="&lt;table&gt;&lt;tr&gt;&lt;td&gt;
    &lt;div style=&quot;FONT-SIZE: 12px; HEIGHT: 20px; WIDTH: 100px; COLOR: #444444; MARGIN-LEFT: 7px; BACKGROUND-COLOR: #ffffff&quot;&gt;
		&lt;a href=&quot;{Link4_Src}&quot; id=&quot;HeaderMyMLink4&quot;&gt;Tablero SLAs&lt;/a&gt;&lt;/div&gt;&lt;/td&gt;&lt;td&gt;&lt;div style=&quot;FONT-SIZE: 12px; HEIGHT: 20px; WIDTH: 125px; COLOR: #444444; MARGIN-LEFT: 7px; BACKGROUND-COLOR: #ffffff&quot;&gt;
		&lt;a href=&quot;{Link5_Src}&quot; id=&quot;HeaderMyMLink5&quot;&gt;Métricas y Mediciones&lt;/a&gt; 
    &lt;/div&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt;" PathID="HeaderPanel2">
			<Components>
				<Link id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="HeaderPanel2Link4" hrefSource="TableroSLAs.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Tablero SLAs','textSourceDB':'','hrefSource':'TableroSLAs.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link5" PathID="HeaderPanel2Link5" hrefSource="MuestraReporte.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Reportes Métricas y Mediciones','textSourceDB':'','hrefSource':'MuestraReporte.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="Header_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="Header.php" forShow="True" url="Header.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="9"/>
			</Actions>
		</Event>
	</Events>
</Page>