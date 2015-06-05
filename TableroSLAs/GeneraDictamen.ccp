<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Basic1" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Grid id="21" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="100" name="Grid2" connection="cnDisenio" dataSource="

select metrica, id_ver_metrica, 
	sla.nombre, sla.idsla, sla.sla, sum(sla.cumplen) cumplen, sum(sla.totales) as totales, avg(sla.meta) meta, 
	sla.id_proveedor, sla.MesReporte, sla.AnioReporte, sla.Acronimo  
	from vw_Servicios_Proveedores vsp
		left join vw_SLAs_v3 sla on sla.id_proveedor = vsp.id_proveedor
		    and vsp.id_servicio = sla.id_servicio_cont 
			and vsp.id_ver_metrica = sla.idsla						
			and mesreporte = {s_MesReporte}  
			and anioreporte = {s_AnioReporte}
where vsp.id_proveedor = {s_id_proveedor}
	and idSLA is not null
group by metrica, id_ver_metrica, 
	sla.nombre, sla.idsla, sla.sla, sla.id_proveedor, sla.MesReporte, sla.AnioReporte, sla.Acronimo  
order by id_ver_metrica " pageSizeLimit="100" pageSize="True" wizardCaption="Grid2" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Centered" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False">
			<Components>
				<Navigator id="33" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="24" fieldSourceType="DBColumn" dataType="Integer" html="False" name="idSLA" fieldSource="id_ver_metrica" wizardCaption="Id SLA" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2idSLA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="SLA" fieldSource="metrica" wizardCaption="SLA" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2SLA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Text" html="True" name="txtCumplimiento" PathID="Grid2txtCumplimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="36" fieldSourceType="DBColumn" dataType="Text" html="True" name="txtDetalle1" PathID="Grid2txtDetalle1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Panel id="48" visible="True" name="Panel1" wizardInnerHTML="&lt;input type=&quot;hidden&quot; style=&quot;WIDTH: 62px; HEIGHT: 22px&quot; id=&quot;Grid2nombre_{Grid2:rowNumber}&quot; name=&quot;{nombre_Name}&quot; value=&quot;{nombre}&quot; size=&quot;8&quot;&gt;&amp;nbsp;&lt;input type=&quot;hidden&quot; style=&quot;WIDTH: 64px; HEIGHT: 22px&quot; id=&quot;Grid2servicio_{Grid2:rowNumber}&quot; name=&quot;{servicio_Name}&quot; value=&quot;{servicio}&quot; size=&quot;8&quot;&gt;&lt;input type=&quot;hidden&quot; style=&quot;WIDTH: 69px; HEIGHT: 22px&quot; id=&quot;Grid2Cumplen_{Grid2:rowNumber}&quot; name=&quot;{Cumplen_Name}&quot; value=&quot;{Cumplen}&quot; size=&quot;9&quot;&gt;&lt;input type=&quot;hidden&quot; style=&quot;WIDTH: 62px; HEIGHT: 22px&quot; id=&quot;Grid2Totales_{Grid2:rowNumber}&quot; name=&quot;{Totales_Name}&quot; value=&quot;{Totales}&quot; size=&quot;8&quot;&gt;&lt;input type=&quot;hidden&quot; style=&quot;WIDTH: 48px; HEIGHT: 22px&quot; id=&quot;Grid2Meta_{Grid2:rowNumber}&quot; name=&quot;{Meta_Name}&quot; value=&quot;{Meta}&quot; size=&quot;6&quot;&gt;&lt;input type=&quot;hidden&quot; style=&quot;WIDTH: 108px; HEIGHT: 22px&quot; id=&quot;Grid2id_servivio_cont_{Grid2:rowNumber}&quot; name=&quot;{id_servivio_cont_Name}&quot; value=&quot;{id_servivio_cont}&quot; size=&quot;14&quot;&gt;&lt;input type=&quot;hidden&quot; style=&quot;WIDTH: 97px; HEIGHT: 22px&quot; id=&quot;Grid2id_proveedor_{Grid2:rowNumber}&quot; name=&quot;{id_proveedor_Name}&quot; value=&quot;{id_proveedor}&quot; size=&quot;13&quot;&gt;&amp;nbsp;&lt;input type=&quot;hidden&quot; style=&quot;WIDTH: 92px; HEIGHT: 22px&quot; id=&quot;Grid2MesReporte_{Grid2:rowNumber}&quot; name=&quot;{MesReporte_Name}&quot; value=&quot;{MesReporte}&quot; size=&quot;12&quot;&gt;&amp;nbsp;&amp;nbsp;&lt;input type=&quot;hidden&quot; style=&quot;WIDTH: 92px; HEIGHT: 22px&quot; id=&quot;Grid2AnioReporte_{Grid2:rowNumber}&quot; name=&quot;{AnioReporte_Name}&quot; value=&quot;{AnioReporte}&quot; size=&quot;12&quot;&gt;" PathID="Grid2Panel1">
					<Components>
						<Hidden id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2Panel1nombre">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="26" fieldSourceType="DBColumn" dataType="Float" html="False" name="Cumplen" fieldSource="cumplen" wizardCaption="Cumplen" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid2Panel1Cumplen">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="27" fieldSourceType="DBColumn" dataType="Integer" html="False" name="Totales" fieldSource="totales" wizardCaption="Totales" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2Panel1Totales">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="28" fieldSourceType="DBColumn" dataType="Integer" html="False" name="Meta" fieldSource="meta" wizardCaption="Meta" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2Panel1Meta">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="30" fieldSourceType="DBColumn" dataType="Integer" html="False" name="id_proveedor" fieldSource="id_proveedor" wizardCaption="Id Proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2Panel1id_proveedor">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="31" fieldSourceType="DBColumn" dataType="Integer" html="False" name="MesReporte" fieldSource="MesReporte" wizardCaption="Mes Reporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2Panel1MesReporte">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="32" fieldSourceType="DBColumn" dataType="Integer" html="False" name="AnioReporte" fieldSource="AnioReporte" wizardCaption="Anio Reporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid2Panel1AnioReporte">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="49" fieldSourceType="DBColumn" dataType="Text" name="Acronimo" PathID="Grid2Panel1Acronimo" fieldSource="Acronimo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="34"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="59"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="64" dataType="Integer" defaultValue="date('m')" designDefaultValue="4" parameterSource="s_MesReporte" parameterType="URL" variable="s_MesReporte"/>
<SQLParameter id="65" dataType="Integer" defaultValue="date('Y')" designDefaultValue="2013" parameterSource="s_AnioReporte" parameterType="URL" variable="s_AnioReporte"/>
<SQLParameter id="66" dataType="Integer" defaultValue="0" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="True" name="Label1" PathID="Label1">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Label id="53" fieldSourceType="DBColumn" dataType="Text" html="False" name="lblPeriodo" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="lblPeriodo" defaultValue="date('d-m-Y',mktime(0,0,0,ccgetparam(&quot;s_MesReporte&quot;,date('m')),1,ccgetparam(&quot;s_AnioReporte&quot;,date('Y'))))"><Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Label id="54" fieldSourceType="DBColumn" dataType="Text" html="False" name="lblMesCierre" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="lblMesCierre">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<IncludePage id="63" name="Header" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="GeneraDictamen_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="GeneraDictamen.php" forShow="True" url="GeneraDictamen.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="2"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="55"/>
			</Actions>
		</Event>
	</Events>
</Page>
