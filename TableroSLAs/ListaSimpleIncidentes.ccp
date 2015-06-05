<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="None" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="200" name="Grid1" connection="cnDisenio" dataSource="select id_incidente, 
	cumple_inc_tiemposolucion, 
	cumple_inc_tiempoasignacion   
from mc_calificacion_incidentes_mc
where mesreporte= {s_MesReporte}
	and anioreporte = {s_AnioReporte}
	and id_proveedor = {s_id_proveedor}	" pageSizeLimit="200" pageSize="False" wizardCaption="Grid1" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="False" gridExtendedHTML="False" PathID="Grid1">
			<Components>
				<Label id="6" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="id_incidente" fieldSource="id_incidente" wizardCaption="Id Incidente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1id_incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="7" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumple_inc_tiemposolucion" fieldSource="cumple_inc_tiemposolucion" wizardCaption="Cumple Inc Tiemposolucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1cumple_inc_tiemposolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="8" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cumple_inc_tiempoasignacion" fieldSource="cumple_inc_tiempoasignacion" wizardCaption="Cumple Inc Tiempoasignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1cumple_inc_tiempoasignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="10" dataType="Integer" defaultValue="0" designDefaultValue="3" parameterSource="s_cds_param" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="11" dataType="Integer" defaultValue="0" designDefaultValue="4" parameterSource="s_mes_param" parameterType="URL" variable="s_MesReporte"/>
				<SQLParameter id="12" dataType="Integer" defaultValue="0" designDefaultValue="2014" parameterSource="s_anio_param" parameterType="URL" variable="s_AnioReporte"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="13" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="200" name="mc_calificacion_rs_MC" connection="cnDisenio" dataSource="mc_calificacion_rs_MC" pageSizeLimit="200" pageSize="False" wizardCaption=" Mc Calificacion Rs MC Lista de" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="False" gridExtendedHTML="False" PathID="mc_calificacion_rs_MC">
			<Components>
				<Label id="15" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_ppmc" fieldSource="id_ppmc" wizardCaption="Id Ppmc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_calificacion_rs_MCid_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="16" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="HERR_EST_COST" fieldSource="HERR_EST_COST" wizardCaption="HERR EST COST" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_calificacion_rs_MCHERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="REQ_SERV" fieldSource="REQ_SERV" wizardCaption="REQ SERV" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_calificacion_rs_MCREQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="18" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CUMPL_REQ_FUNC" fieldSource="CUMPL_REQ_FUNC" wizardCaption="CUMPL REQ FUNC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_calificacion_rs_MCCUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_calificacion_rs_MCCALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="20" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_calificacion_rs_MCRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="COMPL_RUTA_CRITICA" fieldSource="COMPL_RUTA_CRITICA" wizardCaption="COMPL RUTA CRITICA" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_calificacion_rs_MCCOMPL_RUTA_CRITICA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="EST_PROY" fieldSource="EST_PROY" wizardCaption="EST PROY" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_calificacion_rs_MCEST_PROY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="DEF_FUG_AMB_PROD" fieldSource="DEF_FUG_AMB_PROD" wizardCaption="DEF FUG AMB PROD" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_calificacion_rs_MCDEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="31" conditionType="Parameter" useIsNull="False" dataType="Integer" field="MesReporte" logicOperator="And" parameterSource="s_mes_param" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="32" conditionType="Parameter" useIsNull="False" dataType="Integer" field="AnioReporte" logicOperator="And" parameterSource="s_anio_param" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="33" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_proveedor" logicOperator="And" parameterSource="s_cds_param" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="30" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="mc_calificacion_rs_MC"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="34" fieldName="*"/>
</Fields>
			<PKFields>
				<PKField id="35" dataType="Integer" fieldName="ID" tableName="mc_calificacion_rs_MC"/>
</PKFields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="ListaSimpleIncidentes_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="ListaSimpleIncidentes.php" forShow="True" url="ListaSimpleIncidentes.php" comment="//" codePage="windows-1252"/>
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
