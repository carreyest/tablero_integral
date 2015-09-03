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
				<Panel id="27" visible="True" generateDiv="False" name="Panel3" wizardInnerHTML="&lt;td&gt;
            &lt;div style=&quot;FONT-SIZE: 12px; HEIGHT: 40px; WIDTH: 100px; VERTICAL-ALIGN: bottom; COLOR: #ffffff; TEXT-ALIGN: center; BACKGROUND-COLOR: #ffffff&quot;&gt;
              &lt;a href=&quot;{lkUniverso_Src}&quot; id=&quot;HeaderpnlMenulkUniverso&quot; style=&quot;POSITION: relative; TOP: 20%&quot;&gt;Universo de Medición&lt;/a&gt;
            &lt;/div&gt;
 &lt;/td&gt; 
          &lt;td&gt;
            &lt;div style=&quot;FONT-SIZE: 12px; HEIGHT: 40px; WIDTH: 100px; VERTICAL-ALIGN: bottom; COLOR: #ffffff; TEXT-ALIGN: center; BACKGROUND-COLOR: #ffffff&quot;&gt;
&lt;a href=&quot;{lkIncidentes_Src}&quot; id=&quot;HeaderpnlMenulkIncidentes&quot; style=&quot;POSITION: relative; TOP: 20%&quot;&gt;Incidentes&lt;/a&gt; 
            &lt;/div&gt;
 &lt;/td&gt; 
          &lt;td&gt;
            &lt;div style=&quot;FONT-SIZE: 12px; HEIGHT: 40px; WIDTH: 100px; VERTICAL-ALIGN: bottom; COLOR: #ffffff; TEXT-ALIGN: center; BACKGROUND-COLOR: #ffffff&quot;&gt;
&lt;a href=&quot;{lkRequerimientos_Src}&quot; id=&quot;HeaderpnlMenulkRequerimientos&quot; style=&quot;POSITION: relative; TOP: 20%&quot;&gt;SLAs de Apertura&lt;/a&gt; 
            &lt;/div&gt;
 &lt;/td&gt; 
          &lt;td&gt;
            &lt;div style=&quot;FONT-SIZE: 12px; HEIGHT: 40px; WIDTH: 100px; VERTICAL-ALIGN: bottom; COLOR: #ffffff; TEXT-ALIGN: center; BACKGROUND-COLOR: #ffffff&quot;&gt;
&lt;a href=&quot;{lkPPMCCierre_Src}&quot; id=&quot;HeaderpnlMenulkPPMCCierre&quot; style=&quot;POSITION: relative; TOP: 20%&quot;&gt;SLAs de Cierre&lt;/a&gt; 
            &lt;/div&gt;
 &lt;/td&gt; 
          &lt;td&gt;
            &lt;div style=&quot;FONT-SIZE: 12px; HEIGHT: 40px; WIDTH: 100px; VERTICAL-ALIGN: bottom; COLOR: #ffffff; TEXT-ALIGN: center; BACKGROUND-COLOR: #ffffff&quot;&gt;
&lt;a href=&quot;{Link2_Src}&quot; id=&quot;HeaderpnlMenuLink2&quot; style=&quot;POSITION: relative; TOP: 20%&quot;&gt;Eficiencia&lt;br&gt;
              Presupuestal&lt;/a&gt; 
            &lt;/div&gt;
 &lt;/td&gt; 
          &lt;td&gt;
            &lt;div style=&quot;FONT-SIZE: 12px; HEIGHT: 40px; WIDTH: 100px; VERTICAL-ALIGN: bottom; COLOR: #ffffff; TEXT-ALIGN: center; BACKGROUND-COLOR: #ffffff&quot;&gt;
              &lt;!-- BEGIN Link Link3 --&gt;&lt;a href=&quot;{Link3_Src}&quot; id=&quot;HeaderpnlMenuLink3&quot; style=&quot;POSITION: relative; TOP: 20%&quot;&gt;SLAs CAPC&lt;/a&gt;&lt;!-- END Link Link3 --&gt;
            &lt;/div&gt;
 &lt;/td&gt; " PathID="HeaderpnlMenuPanel3">
					<Components>
						<Link id="2" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkUniverso" hrefSource="UniversoLista.ccp" PathID="HeaderpnlMenuPanel3lkUniverso">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkIncidentes" hrefSource="IncidentesLista.ccp" PathID="HeaderpnlMenuPanel3lkIncidentes">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="30" sourceType="Expression" format="yyyy-mm-dd" name="s_mes_param" source="CCGetParam(&quot;s_MesReporte&quot;)" old_temp_id="15"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkRequerimientos" hrefSource="PPMCsApbLista.ccp" PathID="HeaderpnlMenuPanel3lkRequerimientos">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkPPMCCierre" hrefSource="PPMCsCrbLista.ccp" PathID="HeaderpnlMenuPanel3lkPPMCCierre">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="Link2" hrefSource="EficienciaPresLista.ccp" PathID="HeaderpnlMenuPanel3Link2">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="18" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="Link3" hrefSource="SLAsCAPCLista.ccp" PathID="HeaderpnlMenuPanel3Link3">
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
				<ImageLink id="25" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="img_abre_pantalla" PathID="HeaderPanel1img_abre_pantalla" linkProperties="{'textSource':'images/abre_verde.jpg','textSourceDB':'','hrefSource':'MuestraReporte.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':2,'objectType':'linkParameters','0':{'sourceType':'Expression','parameterSource':'fullscreen','parameterName':'fullscreen'},'1':{'sourceType':'Expression','parameterSource':'1','parameterName':'fullscreen'}}}" hrefSource="MuestraReporte.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="26" sourceType="Expression" name="fullscreen" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
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
				<Link id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="HeaderPanel2Link4" hrefSource="TableroSLAs.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Tablero SLAs','textSourceDB':'','hrefSource':'TableroSLAs.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link5" PathID="HeaderPanel2Link5" hrefSource="MuestraReporte.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Métricas y Mediciones','textSourceDB':'','hrefSource':'MuestraReporte.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
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
		<Panel id="34" visible="True" generateDiv="False" name="Panel4" PathID="HeaderPanel4">
<Components>
<Link id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link6" PathID="HeaderPanel2Link6" hrefSource="http://webiterasrv2/sites/SDMA_Reporte/Pages/default.aspx" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Reportes Sitio SAT','textSourceDB':'','hrefSource':'http://webiterasrv2/sites/SDMA_Reporte/Pages/default.aspx','hrefSourceDB':'','title':'','target':'_blank','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
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
