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
						<SQLParameter id="166" dataType="Text" defaultValue="2" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
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
				<Link id="134" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="periodos_cargaLink1" hrefSource="comparativo_cierre.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Resumen','textSourceDB':'','hrefSource':'comparativo_cierre.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="160" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="periodos_cargaLink2" hrefSource="comparativo_incidentes.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Incidentes','textSourceDB':'','hrefSource':'comparativo_incidentes.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="161" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="periodos_cargaLink3" hrefSource="comparativo_apertura.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Apertura','textSourceDB':'','hrefSource':'comparativo_apertura.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="162" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="periodos_cargaLink4" hrefSource="comparativo_cierre.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Req. Cierre','textSourceDB':'','hrefSource':'comparativo_cierre.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="s_id_incidencia;s_id_ppmc;s_id_estimacion;s_id_ppmc_cierre;s_id_estimacion_cierre">
<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="170" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Label1" PathID="periodos_cargaLabel1">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="171"/>
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
		<Grid id="172" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="result_comparativo_incide" connection="cnDisenio" dataSource="result_comparativo_incidentes" orderBy="id_incidencia" pageSizeLimit="100" pageSize="True" wizardCaption="Incidentes con diferencias" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="result_comparativo_incide">
			<Components>
				<Label id="174" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="result_comparativo_incide_TotalRecords" wizardUseTemplateBlock="False" PathID="result_comparativo_incideresult_comparativo_incide_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="175"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="176" visible="True" name="Sorter_id_incidencia" column="id_incidencia" wizardCaption="Id Incidencia" wizardSortingType="SimpleDir" wizardControl="id_incidencia" wizardAddNbsp="False" PathID="result_comparativo_incideSorter_id_incidencia" connection="cnDisenio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="178" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" preserveParameters="GET" name="id_incidencia" fieldSource="id_incidencia" wizardCaption="Id Incidencia" wizardIsPassword="False" wizardUseTemplateBlock="False" hrefSource="comparativo_incidentes.ccp" linkProperties="{'textSource':'','textSourceDB':'id_incidencia','hrefSource':'comparativo_incidentes.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id_incidencia','parameterName':'s_id_incidencia'},'length':1,'objectType':'linkParameters'}}" wizardAddNbsp="True" PathID="result_comparativo_incideid_incidencia" urlType="Relative">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="198" sourceType="DataField" name="s_id_incidencia" source="id_incidencia"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Navigator id="179" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="Austere4">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="177" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="375" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="31" field="id_periodo" logicOperator="And" parameterSource="s_id_periodo" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="376" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="2" field="id_proveedor" logicOperator="And" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="377" conditionType="Parameter" useIsNull="False" dataType="Text" defaultValue="'SLA'" field="tipo_nivel_servicio" logicOperator="And" parameterSource="s_opt_slas" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="378" conditionType="Expression" useIsNull="False" dataType="Text" expression="estado_comparativo != 'REGISTRO CDS'" field="tipo_nivel_servicio" logicOperator="And" parameterSource="tipo_nivel_servicio" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="380" tableName="result_comparativo_incidentes"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="379" fieldName="id_incidencia" isExpression="False" tableName="result_comparativo_incidentes"/>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="199" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="result_comparativo_incide1" connection="cnDisenio" dataSource="result_comparativo_incidentes" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="id_incidencia" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Registro CAPC" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="result_comparativo_incide1">
			<Components>
				<Label id="202" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_de_negocio" fieldSource="servicio_de_negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicio De Negocio" wizardAddNbsp="True" PathID="result_comparativo_incide1servicio_de_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="203" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="severidad" fieldSource="severidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Severidad" wizardAddNbsp="True" PathID="result_comparativo_incide1severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="204" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Cumple_Inc_TiempoAsignacion" fieldSource="Cumple_Inc_TiempoAsignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Inc Tiempo Asignacion" wizardAddNbsp="True" PathID="result_comparativo_incide1Cumple_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="205" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Cumple_Inc_TiempoSolucion" fieldSource="Cumple_Inc_TiempoSolucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Inc Tiempo Solucion" wizardAddNbsp="True" PathID="result_comparativo_incide1Cumple_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="207" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_periodo" fieldSource="id_periodo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Periodo" wizardAddNbsp="True" PathID="result_comparativo_incide1id_periodo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="208" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" wizardAddNbsp="True" PathID="result_comparativo_incide1id_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="209" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre_del_producto" fieldSource="nombre_del_producto" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Nombre Del Producto" wizardAddNbsp="True" PathID="result_comparativo_incide1nombre_del_producto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="211" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo_nivel_servicio" fieldSource="tipo_nivel_servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo Nivel Servicio" wizardAddNbsp="True" PathID="result_comparativo_incide1tipo_nivel_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="212" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="estado_comparativo" fieldSource="estado_comparativo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Estado Comparativo" wizardAddNbsp="True" PathID="result_comparativo_incide1estado_comparativo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="285" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgCumple_Inc_TiempoAsignacion" PathID="result_comparativo_incide1imgCumple_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="286" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgCumple_Inc_TiempoSolucion" PathID="result_comparativo_incide1imgCumple_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="298" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="id_incidencia" PathID="result_comparativo_incide1id_incidencia" fieldSource="id_incidencia" defaultValue="&quot;&lt;font color=red&gt;ID NO REPORTADO&lt;/font&gt;&quot;">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="287"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="382" conditionType="Parameter" useIsNull="False" dataType="Text" field="id_incidencia" logicOperator="And" orderNumber="1" parameterSource="s_id_incidencia" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="383" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_periodo" logicOperator="And" parameterSource="s_id_periodo" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="384" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_proveedor" logicOperator="And" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="385" conditionType="Expression" useIsNull="False" dataType="Text" expression="estado_comparativo = 'REGISTRO CAPC' OR estado_comparativo = 'REG. CAPC QUE NO CARGO CDS'" field="estado_comparativo" logicOperator="And" parameterSource="estado_comparativo" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="386" conditionType="Parameter" useIsNull="False" dataType="Text" defaultValue="'SLA'" field="tipo_nivel_servicio" logicOperator="And" parameterSource="s_opt_slas" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="381" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="result_comparativo_incidentes"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="387" fieldName="*"/>
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
		<Record id="219" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="result_comparativo_incide2" connection="cnDisenio" dataSource="result_comparativo_incidentes" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="id_incidencia" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Registro CDS" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="result_comparativo_incide2">
			<Components>
				<Label id="222" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_de_negocio" fieldSource="servicio_de_negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicio De Negocio" wizardAddNbsp="True" PathID="result_comparativo_incide2servicio_de_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="223" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="severidad" fieldSource="severidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Severidad" wizardAddNbsp="True" PathID="result_comparativo_incide2severidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="224" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Cumple_Inc_TiempoAsignacion" fieldSource="Cumple_Inc_TiempoAsignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Inc Tiempo Asignacion" wizardAddNbsp="True" PathID="result_comparativo_incide2Cumple_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="225" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Cumple_Inc_TiempoSolucion" fieldSource="Cumple_Inc_TiempoSolucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Inc Tiempo Solucion" wizardAddNbsp="True" PathID="result_comparativo_incide2Cumple_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="227" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_periodo" fieldSource="id_periodo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Periodo" wizardAddNbsp="True" PathID="result_comparativo_incide2id_periodo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="228" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" wizardAddNbsp="True" PathID="result_comparativo_incide2id_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="229" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre_del_producto" fieldSource="nombre_del_producto" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Nombre Del Producto" wizardAddNbsp="True" PathID="result_comparativo_incide2nombre_del_producto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="231" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="tipo_nivel_servicio" fieldSource="tipo_nivel_servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Tipo Nivel Servicio" wizardAddNbsp="True" PathID="result_comparativo_incide2tipo_nivel_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="232" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="estado_comparativo" fieldSource="estado_comparativo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Estado Comparativo" wizardAddNbsp="True" PathID="result_comparativo_incide2estado_comparativo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="288" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgCumple_Inc_TiempoAsignacion" PathID="result_comparativo_incide2imgCumple_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="289" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="imgCumple_Inc_TiempoSolucion" PathID="result_comparativo_incide2imgCumple_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="299" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="id_incidencia" PathID="result_comparativo_incide2id_incidencia" fieldSource="id_incidencia" defaultValue="&quot;&lt;font color=red&gt;ID NO REPORTADO&lt;/font&gt;&quot;">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="290"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="351" conditionType="Parameter" useIsNull="False" dataType="Text" field="id_incidencia" logicOperator="And" orderNumber="1" parameterSource="s_id_incidencia" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="352" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="31" field="id_periodo" logicOperator="And" parameterSource="s_id_periodo" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="353" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="2" field="id_proveedor" logicOperator="And" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="354" conditionType="Parameter" useIsNull="False" dataType="Text" defaultValue="'SLA'" field="tipo_nivel_servicio" logicOperator="And" parameterSource="s_opt_slas" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="355" conditionType="Expression" useIsNull="False" expression="estado_comparativo = 'REGISTRO CDS' OR estado_comparativo = 'REG. CDS QUE NO CARGO CAPC'" logicOperator="And" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="350" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="result_comparativo_incidentes"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="356" fieldName="*"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="comparativo_incidentes.php" forShow="True" url="comparativo_incidentes.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="comparativo_incidentes_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
