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
						<SQLParameter id="186" dataType="Text" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
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
				<Link id="177" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="periodos_cargaLink2" hrefSource="comparativo_incidentes.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Incidentes','textSourceDB':'','hrefSource':'comparativo_incidentes.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="178" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="periodos_cargaLink3" hrefSource="comparativo_apertura.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Apertura','textSourceDB':'','hrefSource':'comparativo_apertura.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="182" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="periodos_cargaLink4" hrefSource="comparativo_cierre.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Cierre','textSourceDB':'','hrefSource':'comparativo_cierre.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="190" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Label1" PathID="periodos_cargaLabel1">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="191"/>
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
		<Grid id="192" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="result_comparativo_apertu" connection="cnDisenio" dataSource="result_comparativo_aperturas" pageSizeLimit="100" pageSize="True" wizardCaption="Registro CDS" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="result_comparativo_apertu">
			<Components>
				<Label id="194" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="result_comparativo_apertu_TotalRecords" wizardUseTemplateBlock="False" PathID="result_comparativo_aperturesult_comparativo_apertu_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="195"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="196" visible="True" name="Sorter_id_ppmc" column="id_ppmc" wizardCaption="Id Ppmc" wizardSortingType="SimpleDir" wizardControl="id_ppmc" wizardAddNbsp="False" PathID="result_comparativo_apertuSorter_id_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="197" visible="True" name="Sorter_id_estimacion" column="id_estimacion" wizardCaption="Id Estimacion" wizardSortingType="SimpleDir" wizardControl="id_estimacion" wizardAddNbsp="False" PathID="result_comparativo_apertuSorter_id_estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="199" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="id_ppmc" fieldSource="id_ppmc" wizardCaption="Id Ppmc" wizardIsPassword="False" wizardUseTemplateBlock="False" hrefSource="comparativo_apertura.ccp" linkProperties="{'textSource':'','textSourceDB':'id_ppmc','hrefSource':'comparativo_apertura.ccp','hrefSourceDB':'id_ppmc','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id_ppmc','parameterName':'s_id_ppmc'},'1':{'sourceType':'DataField','parameterSource':'id_ppmc','parameterName':'s_id_ppmc'},'2':{'sourceType':'DataField','parameterSource':'id_estimacion','parameterName':'s_id_estimacion'},'length':3,'objectType':'linkParameters'}}" wizardAlign="right" wizardAddNbsp="True" PathID="result_comparativo_apertuid_ppmc" urlType="Relative">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="208" sourceType="DataField" name="s_id_ppmc" source="id_ppmc"/>
						<LinkParameter id="269" sourceType="DataField" name="s_id_estimacion" source="id_estimacion"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="200" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_estimacion" fieldSource="id_estimacion" wizardCaption="Id Estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="result_comparativo_apertuid_estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="201" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="Austere4">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="198" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="203" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_proveedor" logicOperator="And" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="204" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_periodo" logicOperator="And" parameterSource="s_id_periodo" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="205" conditionType="Parameter" useIsNull="False" dataType="Text" field="tipo_nivel_servicio" logicOperator="And" parameterSource="s_opt_slas" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="206" conditionType="Expression" useIsNull="False" expression="estado_comparativo != 'REGISTRO CDS'" logicOperator="And" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="268" tableName="result_comparativo_aperturas"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="207" fieldName="*"/>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="209" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="result_comparativo_apertu1" connection="cnDisenio" dataSource="result_comparativo_aperturas" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="id_ppmc" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Registro CAPC" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="result_comparativo_apertu1">
			<Components>
				<Label id="212" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_estimacion" fieldSource="id_estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Estimacion" wizardAddNbsp="True" PathID="result_comparativo_apertu1id_estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="213" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_negocio" fieldSource="servicio_negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicio Negocio" wizardAddNbsp="True" PathID="result_comparativo_apertu1servicio_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="214" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo" fieldSource="tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo" wizardAddNbsp="True" PathID="result_comparativo_apertu1tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="215" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="herr_est_cost" fieldSource="herr_est_cost" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Herr Est Cost" wizardAddNbsp="True" PathID="result_comparativo_apertu1herr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="216" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="req_serv" fieldSource="req_serv" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Req Serv" wizardAddNbsp="True" PathID="result_comparativo_apertu1req_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="217" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_asignacion" fieldSource="fecha_asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Asignacion" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="result_comparativo_apertu1fecha_asignacion" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="218" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_entrega_prop" fieldSource="fecha_entrega_prop" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Entrega Prop" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="result_comparativo_apertu1fecha_entrega_prop" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="219" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_acepta_prop" fieldSource="fecha_acepta_prop" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Acepta Prop" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="result_comparativo_apertu1fecha_acepta_prop" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="220" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="horas_aprobadas" fieldSource="horas_aprobadas" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Horas Aprobadas" wizardAddNbsp="True" PathID="result_comparativo_apertu1horas_aprobadas">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="221" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="tiempo_limite_entrega_prop" fieldSource="tiempo_limite_entrega_prop" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tiempo Limite Entrega Prop" wizardAddNbsp="True" PathID="result_comparativo_apertu1tiempo_limite_entrega_prop">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="222" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ppmc_padre" fieldSource="ppmc_padre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Ppmc Padre" wizardAddNbsp="True" PathID="result_comparativo_apertu1ppmc_padre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="223" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="serv_contractual" fieldSource="serv_contractual" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Serv Contractual" wizardAddNbsp="True" PathID="result_comparativo_apertu1serv_contractual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="224" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo_nivel_servicio" fieldSource="tipo_nivel_servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo Nivel Servicio" wizardAddNbsp="True" PathID="result_comparativo_apertu1tipo_nivel_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="225" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="estado_comparativo" fieldSource="estado_comparativo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Estado Comparativo" wizardAddNbsp="True" PathID="result_comparativo_apertu1estado_comparativo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="226" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_periodo" fieldSource="id_periodo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Periodo" wizardAddNbsp="True" PathID="result_comparativo_apertu1id_periodo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="227" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" wizardAddNbsp="True" PathID="result_comparativo_apertu1id_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="228" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="id_ppmc" PathID="result_comparativo_apertu1id_ppmc" fieldSource="id_ppmc" defaultValue="&quot;&lt;font color=red&gt;ID NO REPORTADO&lt;/font&gt;&quot;">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="229" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgherr_est_cost" PathID="result_comparativo_apertu1imgherr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="230" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgreq_serv" PathID="result_comparativo_apertu1imgreq_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="238"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="271" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_ppmc" logicOperator="And" orderNumber="1" parameterSource="s_id_ppmc" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="272" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_periodo" logicOperator="And" parameterSource="s_id_periodo" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="273" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_proveedor" logicOperator="And" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="274" conditionType="Parameter" useIsNull="False" dataType="Text" field="tipo_nivel_servicio" logicOperator="And" parameterSource="s_opt_slas" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="275" conditionType="Expression" useIsNull="False" dataType="Text" expression="estado_comparativo = 'REGISTRO CAPC' OR estado_comparativo = 'REG. CAPC QUE NO CARGO CDS'" field="estado_comparativo" logicOperator="And" parameterSource="estado_comparativo" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="276" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_estimacion" logicOperator="And" parameterSource="s_id_estimacion" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="270" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="result_comparativo_aperturas"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="277" fieldName="*"/>
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
		<Record id="239" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="result_comparativo_apertu2" connection="cnDisenio" dataSource="result_comparativo_aperturas" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="id_ppmc" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Registro CDS" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="result_comparativo_apertu2">
			<Components>
				<Label id="242" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_estimacion" fieldSource="id_estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Estimacion" wizardAddNbsp="True" PathID="result_comparativo_apertu2id_estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="243" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_negocio" fieldSource="servicio_negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicio Negocio" wizardAddNbsp="True" PathID="result_comparativo_apertu2servicio_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="244" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo" fieldSource="tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo" wizardAddNbsp="True" PathID="result_comparativo_apertu2tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="245" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="herr_est_cost" fieldSource="herr_est_cost" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Herr Est Cost" wizardAddNbsp="True" PathID="result_comparativo_apertu2herr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="246" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="req_serv" fieldSource="req_serv" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Req Serv" wizardAddNbsp="True" PathID="result_comparativo_apertu2req_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="247" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_asignacion" fieldSource="fecha_asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Asignacion" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="result_comparativo_apertu2fecha_asignacion" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="248" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_entrega_prop" fieldSource="fecha_entrega_prop" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Entrega Prop" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="result_comparativo_apertu2fecha_entrega_prop" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="249" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="fecha_acepta_prop" fieldSource="fecha_acepta_prop" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Acepta Prop" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="result_comparativo_apertu2fecha_acepta_prop" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="250" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="horas_aprobadas" fieldSource="horas_aprobadas" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Horas Aprobadas" wizardAddNbsp="True" PathID="result_comparativo_apertu2horas_aprobadas">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="251" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="tiempo_limite_entrega_prop" fieldSource="tiempo_limite_entrega_prop" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tiempo Limite Entrega Prop" wizardAddNbsp="True" PathID="result_comparativo_apertu2tiempo_limite_entrega_prop">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="252" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ppmc_padre" fieldSource="ppmc_padre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Ppmc Padre" wizardAddNbsp="True" PathID="result_comparativo_apertu2ppmc_padre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="253" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="serv_contractual" fieldSource="serv_contractual" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Serv Contractual" wizardAddNbsp="True" PathID="result_comparativo_apertu2serv_contractual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="254" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo_nivel_servicio" fieldSource="tipo_nivel_servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo Nivel Servicio" wizardAddNbsp="True" PathID="result_comparativo_apertu2tipo_nivel_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="255" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_periodo" fieldSource="id_periodo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Periodo" wizardAddNbsp="True" PathID="result_comparativo_apertu2id_periodo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="256" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" wizardAddNbsp="True" PathID="result_comparativo_apertu2id_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="257" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="id_ppmc" PathID="result_comparativo_apertu2id_ppmc" fieldSource="id_ppmc" defaultValue="&quot;&lt;font color=red&gt;ID NO REPORTADO&lt;/font&gt;&quot;">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="258" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgherr_est_cost" PathID="result_comparativo_apertu2imgherr_est_cost">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="259" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgreq_serv" PathID="result_comparativo_apertu2imgreq_serv">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="267"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="279" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_ppmc" logicOperator="And" orderNumber="1" parameterSource="s_id_ppmc" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="280" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_periodo" logicOperator="And" parameterSource="s_id_periodo" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="281" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_proveedor" logicOperator="And" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="282" conditionType="Parameter" useIsNull="False" dataType="Text" field="tipo_nivel_servicio" logicOperator="And" parameterSource="s_opt_slas" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="283" conditionType="Expression" useIsNull="False" expression="estado_comparativo = 'REGISTRO CDS'  or estado_comparativo = 'REG. CDS QUE NO CARGO CAPC'" logicOperator="And" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="284" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_estimacion" logicOperator="And" parameterSource="s_id_estimacion" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="278" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="result_comparativo_aperturas"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="285" fieldName="*"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="comparativo_apertura.php" forShow="True" url="comparativo_apertura.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="comparativo_apertura_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
