<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Label id="3" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lReportContent" PathID="lReportContent">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="MuestraReporteFrame_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="MuestraReporteFrame.php" forShow="True" url="MuestraReporteFrame.php" comment="//" codePage="windows-1252"/>
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
