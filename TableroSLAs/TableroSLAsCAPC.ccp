<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="grdSLAsCAPC" connection="cnDisenio" dataSource="select 
	v.Descripcion , 
	max(c.Deductiva) Deductiva,
	max(cast(c.CALIDAD_PROD_TERM as int)) CALIDAD_PROD_TERM ,
	sum(c.ReportesCompletos) ReportesCompletos,
	sum(c.SLAsNoReportados) SLAsNoReportados,
	max(cast(c.DEDUC_OMISION as int)) DEDUC_OMISION,
	sum(cast(c.UnidadesActuales as int)) UnidadesActuales,
	sum(cast(c.UnidadesAnteriores as int)) UnidadesAnteriores,  
	max(cast(c.EFIC_PRESUP as int)) EFIC_PRESUP,
	sum(cast(c.DiasPlaneados as int)) DiasPlaneados,
	sum(cast(c.DiasReales as int)) DiasReales,
	max(cast(c.RETR_ENTREGABLE as int)) RETR_ENTREGABLE,
	v.id IdServCont
	, avg(c.pctcalidad) pctcalidad
from dbo.mc_c_ServContractual v 
     left join mc_calificacion_CAPC c 
	on v.id = c.id_serviciocont and mes={sMes} and anio = {sAnio}
where v.Aplica ='CAPC'
group by 	
	v.Descripcion ,
	v.id 
" pageSizeLimit="100" pageSize="True" wizardCaption="Tablero de Niveles de Servicio del CAPC" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="grdSLAsCAPC">
			<Components>
				<Sorter id="3" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="4" visible="True" name="Sorter_Deductiva" column="Deductiva" wizardCaption="Deductiva" wizardSortingType="SimpleDir" wizardControl="Deductiva" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_Deductiva">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="5" visible="True" name="Sorter_CALIDAD_PROD_TERM" column="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardSortingType="SimpleDir" wizardControl="CALIDAD_PROD_TERM" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="6" visible="True" name="Sorter_ReportesCompletos" column="ReportesCompletos" wizardCaption="Reportes Completos" wizardSortingType="SimpleDir" wizardControl="ReportesCompletos" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_ReportesCompletos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_SLAsNoReportados" column="SLAsNoReportados" wizardCaption="SLAs No Reportados" wizardSortingType="SimpleDir" wizardControl="SLAsNoReportados" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_SLAsNoReportados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_DEDUC_OMISION" column="DEDUC_OMISION" wizardCaption="DEDUC OMISION" wizardSortingType="SimpleDir" wizardControl="DEDUC_OMISION" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_DEDUC_OMISION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="9" visible="True" name="Sorter_UnidadesActuales" column="UnidadesActuales" wizardCaption="Unidades Actuales" wizardSortingType="SimpleDir" wizardControl="UnidadesActuales" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_UnidadesActuales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="10" visible="True" name="Sorter_UnidadesAnteriores" column="UnidadesAnteriores" wizardCaption="Unidades Anteriores" wizardSortingType="SimpleDir" wizardControl="UnidadesAnteriores" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_UnidadesAnteriores">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="11" visible="True" name="Sorter_EFIC_PRESUP" column="EFIC_PRESUP" wizardCaption="EFIC PRESUP" wizardSortingType="SimpleDir" wizardControl="EFIC_PRESUP" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_EFIC_PRESUP">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="12" visible="True" name="Sorter_DiasPlaneados" column="DiasPlaneados" wizardCaption="Dias Planeados" wizardSortingType="SimpleDir" wizardControl="DiasPlaneados" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_DiasPlaneados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="13" visible="True" name="Sorter_DiasReales" column="DiasReales" wizardCaption="Dias Reales" wizardSortingType="SimpleDir" wizardControl="DiasReales" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_DiasReales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_RETR_ENTREGABLE" column="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardSortingType="SimpleDir" wizardControl="RETR_ENTREGABLE" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="20" visible="True" name="Sorter_pctcalidad" column="pctcalidad" wizardCaption="Pctcalidad" wizardSortingType="SimpleDir" wizardControl="pctcalidad" wizardAddNbsp="False" PathID="grdSLAsCAPCSorter_pctcalidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdSLAsCAPCDescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Deductiva" fieldSource="Deductiva" wizardCaption="Deductiva" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdSLAsCAPCDeductiva">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ReportesCompletos" fieldSource="ReportesCompletos" wizardCaption="Reportes Completos" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdSLAsCAPCReportesCompletos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="SLAsNoReportados" fieldSource="SLAsNoReportados" wizardCaption="SLAs No Reportados" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdSLAsCAPCSLAsNoReportados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DEDUC_OMISION" fieldSource="DEDUC_OMISION" wizardCaption="DEDUC OMISION" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdSLAsCAPCDEDUC_OMISION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="UnidadesActuales" fieldSource="UnidadesActuales" wizardCaption="Unidades Actuales" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdSLAsCAPCUnidadesActuales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="UnidadesAnteriores" fieldSource="UnidadesAnteriores" wizardCaption="Unidades Anteriores" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdSLAsCAPCUnidadesAnteriores">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DiasPlaneados" fieldSource="DiasPlaneados" wizardCaption="Dias Planeados" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdSLAsCAPCDiasPlaneados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DiasReales" fieldSource="DiasReales" wizardCaption="Dias Reales" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdSLAsCAPCDiasReales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="32" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdSLAsCAPCRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="38" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="pctcalidad" fieldSource="pctcalidad" wizardCaption="Pctcalidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdSLAsCAPCpctcalidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="39" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="40" fieldSourceType="CodeExpression" dataType="Text" html="False" generateSpan="False" name="Label1" PathID="grdSLAsCAPCLabel1" fieldSource="&quot;No Aplica para este Servicio&quot;">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgCALIDAD_PROD_TERM" PathID="grdSLAsCAPCimgCALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgDEDUC_OMISION" PathID="grdSLAsCAPCimgDEDUC_OMISION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Label2" PathID="grdSLAsCAPCLabel2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgEFIC_PRESUP" PathID="grdSLAsCAPCimgEFIC_PRESUP">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgRETR_ENTREGABLE" PathID="grdSLAsCAPCimgRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="41" eventType="Server"/>
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
				<SQLParameter id="47" dataType="Integer" defaultValue="0" parameterSource="s_MesReporte" parameterType="URL" variable="sMes"/>
				<SQLParameter id="48" dataType="Integer" defaultValue="0" parameterSource="s_AnioReporte" parameterType="URL" variable="sAnio"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="TableroSLAsCAPC.php" forShow="True" url="TableroSLAsCAPC.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="TableroSLAsCAPC_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
<Group id="49" groupID="5"/>
</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
