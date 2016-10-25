<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Austere4" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="periodos_carga" searchIds="3" fictitiousConnection="cnDisenio" fictitiousDataSource="periodos_carga" wizardCaption="Seleccionar Periodo" changedCaptionSearch="True" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="periodos_carga">
			<Components>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="periodos_cargaButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="5" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Integer" returnValueType="Number" name="s_id_periodo" fieldSource="id_periodo" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Periodo" caption="Id Periodo" required="True" unique="False" connection="cnDisenio" dataSource="select distinct id_periodo,  periodo+tipo_periodo as periodo
from archivosxls.dbo.periodos_hist
where (id_proveedor=0 or id_proveedor={s_id_proveedor} or {s_id_proveedor} =1)
and id_periodo &gt; 30
and id_periodo  in (select distinct id_periodo from resumen_sat where id_proveedor={s_id_proveedor})


" boundColumn="id_periodo" textColumn="periodo" PathID="periodos_cargas_id_periodo" defaultValue="31">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters>
						<SQLParameter id="169" dataType="Text" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
					</SQLParameters>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="7" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="True" unique="False" connection="cnDisenio" dataSource="select id_proveedor, nombre from mc_c_proveedor where descripcion!='CAPC'" boundColumn="id_proveedor" textColumn="nombre" PathID="periodos_cargas_id_proveedor" defaultValue="2">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="8" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="s_opt_slas" wizardEmptyCaption="Seleccionar Valor" PathID="periodos_cargas_opt_slas" dataSource="SLA;SLA;SLO;SLO" defaultValue="'SLA'" required="True">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<Link id="134" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="periodos_cargaLink1" hrefSource="comparativo_resumen.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Resumen','textSourceDB':'','hrefSource':'comparativo_resumen.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="157" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="periodos_cargaLink2" hrefSource="comparativo_incidentes.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Incidentes','textSourceDB':'','hrefSource':'comparativo_incidentes.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="164" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="periodos_cargaLink3" hrefSource="comparativo_apertura.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Apertura','textSourceDB':'','hrefSource':'comparativo_apertura.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="165" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="periodos_cargaLink4" hrefSource="comparativo_cierre.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Cierre','textSourceDB':'','hrefSource':'comparativo_cierre.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="173" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Label1" PathID="periodos_cargaLabel1">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="174"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="175" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="result_comparativo_cierre" connection="cnDisenio" dataSource="result_comparativo_cierre" orderBy="id_ppmc" pageSizeLimit="100" pageSize="True" wizardCaption=" Requerimientos con diferencias" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="result_comparativo_cierre">
<Components>
<Label id="177" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="result_comparativo_cierre_TotalRecords" wizardUseTemplateBlock="False" PathID="result_comparativo_cierreresult_comparativo_cierre_TotalRecords">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Retrieve number of records" actionCategory="Database" id="178"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Label>
<Sorter id="179" visible="True" name="Sorter_id_ppmc" column="id_ppmc" wizardCaption="Id Ppmc" wizardSortingType="SimpleDir" wizardControl="id_ppmc" wizardAddNbsp="False" PathID="result_comparativo_cierreSorter_id_ppmc">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="180" visible="True" name="Sorter_id_estimacion" column="id_estimacion" wizardCaption="Id Estimacion" wizardSortingType="SimpleDir" wizardControl="id_estimacion" wizardAddNbsp="False" PathID="result_comparativo_cierreSorter_id_estimacion">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Link id="182" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="id_ppmc" fieldSource="id_ppmc" wizardCaption="Id Ppmc" wizardIsPassword="False" wizardUseTemplateBlock="False" hrefSource="comparativo_cierre.ccp" linkProperties="{'textSource':'','textSourceDB':'id_ppmc','hrefSource':'comparativo_cierre.ccp','hrefSourceDB':'id_ppmc','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id_ppmc','parameterName':'s_id_ppmc_cierre'},'1':{'sourceType':'DataField','parameterSource':'id_ppmc','parameterName':'s_id_ppmc_cierre'},'2':{'sourceType':'DataField','parameterSource':'id_estimacion','parameterName':'s_id_estimacion'},'3':{'sourceType':'DataField','parameterSource':'id_ppmc','parameterName':'s_id_ppmc_cierre'},'4':{'sourceType':'DataField','parameterSource':'id_estimacion','parameterName':'s_id_estimacion_cierre'},'length':5,'objectType':'linkParameters'}}" wizardAlign="right" wizardAddNbsp="True" PathID="result_comparativo_cierreid_ppmc">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="191" sourceType="DataField" name="s_id_ppmc_cierre" source="id_ppmc"/>
<LinkParameter id="222" sourceType="DataField" name="s_id_estimacion_cierre" source="id_estimacion"/>
</LinkParameters>
<Attributes/>
<Features/>
</Link>
<Label id="183" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_estimacion" fieldSource="id_estimacion" wizardCaption="Id Estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="result_comparativo_cierreid_estimacion">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="184" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="Austere4">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="181" styles="Row;AltRow" name="rowStyle"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="186" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_periodo" logicOperator="And" parameterSource="s_id_periodo" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="187" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_proveedor" logicOperator="And" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="188" conditionType="Parameter" useIsNull="False" dataType="Text" field="tipo_nivel_servicio" logicOperator="And" parameterSource="s_opt_slas" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="189" conditionType="Expression" useIsNull="False" expression="estado_comparativo != 'REGISTRO CDS'" logicOperator="And" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
<JoinTables>
<JoinTable id="185" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="result_comparativo_cierre"/>
</JoinTables>
<JoinLinks/>
<Fields>
<Field id="190" fieldName="*"/>
</Fields>
<PKFields/>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="192" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="result_comparativo_cierre1" connection="cnDisenio" dataSource="result_comparativo_cierre" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="id_ppmc" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Registro CAPC" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="result_comparativo_cierre1">
<Components>
<Label id="195" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_estimacion" fieldSource="id_estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Estimacion" wizardAddNbsp="True" PathID="result_comparativo_cierre1id_estimacion">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="196" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_negocio" fieldSource="servicio_negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicio Negocio" wizardAddNbsp="True" PathID="result_comparativo_cierre1servicio_negocio">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="197" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo" fieldSource="tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo" wizardAddNbsp="True" PathID="result_comparativo_cierre1tipo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="198" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cump_req_func" fieldSource="cump_req_func" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cump Req Func" wizardAddNbsp="True" PathID="result_comparativo_cierre1cump_req_func">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="199" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="retraso_entregables" fieldSource="retraso_entregables" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Retraso Entregables" wizardAddNbsp="True" PathID="result_comparativo_cierre1retraso_entregables">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="200" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="calidad_prod_term" fieldSource="calidad_prod_term" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Calidad Prod Term" wizardAddNbsp="True" PathID="result_comparativo_cierre1calidad_prod_term">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="201" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="calidad_codigo" fieldSource="calidad_codigo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Calidad Codigo" wizardAddNbsp="True" PathID="result_comparativo_cierre1calidad_codigo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="202" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="defectos_fugados_amb_prod" fieldSource="defectos_fugados_amb_prod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Defectos Fugados Amb Prod" wizardAddNbsp="True" PathID="result_comparativo_cierre1defectos_fugados_amb_prod">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="203" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="serv_contractual" fieldSource="serv_contractual" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Serv Contractual" wizardAddNbsp="True" PathID="result_comparativo_cierre1serv_contractual">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="204" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_caes" fieldSource="fecha_caes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Caes" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="result_comparativo_cierre1fecha_caes" DBFormat="yyyy-mm-dd HH:nn:ss.S">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="205" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo_nivel_servicio" fieldSource="tipo_nivel_servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo Nivel Servicio" wizardAddNbsp="True" PathID="result_comparativo_cierre1tipo_nivel_servicio">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="206" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_periodo" fieldSource="id_periodo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Periodo" wizardAddNbsp="True" PathID="result_comparativo_cierre1id_periodo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="207" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" wizardAddNbsp="True" PathID="result_comparativo_cierre1id_proveedor">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="215" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="id_ppmc" PathID="result_comparativo_cierre1id_ppmc" fieldSource="id_ppmc" defaultValue="&quot;&lt;font color=red&gt;ID NO REPORTADO&lt;/font&gt;&quot;">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Image id="217" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcump_req_func" PathID="result_comparativo_cierre1imgcump_req_func">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
<Image id="218" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgretraso_entregables" PathID="result_comparativo_cierre1imgretraso_entregables">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
<Image id="219" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcalidad_prod_term" PathID="result_comparativo_cierre1imgcalidad_prod_term">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
<Image id="220" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcalidad_codigo" PathID="result_comparativo_cierre1imgcalidad_codigo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
<Image id="221" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgdefectos_fugados_amb_prod" PathID="result_comparativo_cierre1imgdefectos_fugados_amb_prod">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
</Components>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="216"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="283" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_ppmc" logicOperator="And" orderNumber="1" parameterSource="s_id_ppmc_cierre" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="284" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_periodo" logicOperator="And" parameterSource="s_id_periodo" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="285" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_proveedor" logicOperator="And" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="286" conditionType="Parameter" useIsNull="False" dataType="Text" field="tipo_nivel_servicio" logicOperator="And" parameterSource="s_opt_slas" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="287" conditionType="Expression" useIsNull="False" expression="estado_comparativo='REGISTRO CAPC' or estado_comparativo='REG. CAPC QUE NO CARGO CDS'" logicOperator="And" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="288" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_estimacion" logicOperator="And" parameterSource="s_id_estimacion_cierre" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables>
<JoinTable id="282" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="result_comparativo_cierre"/>
</JoinTables>
<JoinLinks/>
<Fields>
<Field id="289" fieldName="*"/>
</Fields>
<PKFields/>
<ISPParameters/>
<ISQLParameters/>
<IFormElements/>
<USPParameters/>
<USQLParameters/>
<UConditions/>
<UFormElements/>
<DSPParameters/>
<DSQLParameters/>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
<Record id="231" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="result_comparativo_cierre2" connection="cnDisenio" dataSource="result_comparativo_cierre" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="id_ppmc" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Registro CDS" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="result_comparativo_cierre2">
<Components>
<Label id="234" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_estimacion" fieldSource="id_estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Estimacion" wizardAddNbsp="True" PathID="result_comparativo_cierre2id_estimacion">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="235" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_negocio" fieldSource="servicio_negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicio Negocio" wizardAddNbsp="True" PathID="result_comparativo_cierre2servicio_negocio">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="236" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo" fieldSource="tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo" wizardAddNbsp="True" PathID="result_comparativo_cierre2tipo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="237" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="cump_req_func" fieldSource="cump_req_func" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cump Req Func" wizardAddNbsp="True" PathID="result_comparativo_cierre2cump_req_func">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="238" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="retraso_entregables" fieldSource="retraso_entregables" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Retraso Entregables" wizardAddNbsp="True" PathID="result_comparativo_cierre2retraso_entregables">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="239" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="calidad_prod_term" fieldSource="calidad_prod_term" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Calidad Prod Term" wizardAddNbsp="True" PathID="result_comparativo_cierre2calidad_prod_term">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="240" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="calidad_codigo" fieldSource="calidad_codigo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Calidad Codigo" wizardAddNbsp="True" PathID="result_comparativo_cierre2calidad_codigo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="241" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="defectos_fugados_amb_prod" fieldSource="defectos_fugados_amb_prod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Defectos Fugados Amb Prod" wizardAddNbsp="True" PathID="result_comparativo_cierre2defectos_fugados_amb_prod">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="242" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="serv_contractual" fieldSource="serv_contractual" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Serv Contractual" wizardAddNbsp="True" PathID="result_comparativo_cierre2serv_contractual">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="243" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_caes" fieldSource="fecha_caes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Caes" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="result_comparativo_cierre2fecha_caes" DBFormat="yyyy-mm-dd HH:nn:ss.S">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="244" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo_nivel_servicio" fieldSource="tipo_nivel_servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo Nivel Servicio" wizardAddNbsp="True" PathID="result_comparativo_cierre2tipo_nivel_servicio">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="245" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_periodo" fieldSource="id_periodo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Periodo" wizardAddNbsp="True" PathID="result_comparativo_cierre2id_periodo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="246" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" wizardAddNbsp="True" PathID="result_comparativo_cierre2id_proveedor">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="247" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="id_ppmc" PathID="result_comparativo_cierre2id_ppmc" defaultValue="&quot;&lt;font color=red&gt;ID NO REPORTADO&lt;/font&gt;&quot;" fieldSource="id_ppmc">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Image id="256" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcump_req_func" PathID="result_comparativo_cierre2imgcump_req_func">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
<Image id="257" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgretraso_entregables" PathID="result_comparativo_cierre2imgretraso_entregables">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
<Image id="258" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcalidad_prod_term" PathID="result_comparativo_cierre2imgcalidad_prod_term">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
<Image id="259" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgcalidad_codigo" PathID="result_comparativo_cierre2imgcalidad_codigo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
<Image id="260" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgdefectos_fugados_amb_prod" PathID="result_comparativo_cierre2imgdefectos_fugados_amb_prod">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
</Components>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="261"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="291" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_ppmc" logicOperator="And" orderNumber="1" parameterSource="s_id_ppmc_cierre" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="292" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_estimacion" logicOperator="And" parameterSource="s_id_estimacion_cierre" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="293" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_proveedor" logicOperator="And" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="294" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_periodo" logicOperator="And" parameterSource="s_id_periodo" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="295" conditionType="Expression" useIsNull="False" expression="estado_comparativo='REGISTRO CDS' OR estado_comparativo='REG. CDS QUE NO CARGO CAPC'" logicOperator="And" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="296" conditionType="Parameter" useIsNull="False" dataType="Text" field="tipo_nivel_servicio" logicOperator="And" parameterSource="s_opt_slas" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables>
<JoinTable id="290" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="result_comparativo_cierre"/>
</JoinTables>
<JoinLinks/>
<Fields>
<Field id="297" fieldName="*"/>
</Fields>
<PKFields/>
<ISPParameters/>
<ISQLParameters/>
<IFormElements/>
<USPParameters/>
<USQLParameters/>
<UConditions/>
<UFormElements/>
<DSPParameters/>
<DSQLParameters/>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="comparativo_cierre.php" forShow="True" url="comparativo_cierre.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="comparativo_cierre_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
