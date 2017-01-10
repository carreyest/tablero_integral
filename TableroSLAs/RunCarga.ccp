<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="3" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Label id="4" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lblmssgs" PathID="lblmssgs">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Link id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="CargaMW.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Realizar otra carga','textSourceDB':'','hrefSource':'CargaMW.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
<Events/>
<LinkParameters/>
<Attributes/>
<Features/>
</Link>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="RunCarga.php" forShow="True" url="RunCarga.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="RunCarga_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
		<Event name="AfterInitialize" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="6"/>
</Actions>
</Event>
</Events>
</Page>
