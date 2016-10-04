<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Austere4" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_calificacion_capc" connection="cnDisenio" dataSource="mc_calificacion_capc" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Detalle SLAs del CAPC" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_calificacion_capc">
			<Components>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_calificacion_capcButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_calificacion_capcButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="9" fieldSourceType="DBColumn" dataType="Integer" name="id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Id Proveedor" caption="Id Proveedor" required="True" unique="False" PathID="mc_calificacion_capcid_proveedor" defaultValue="1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="numero" fieldSource="numero" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Numero" caption="Numero" required="True" unique="False" wizardSize="25" wizardMaxLength="25" PathID="mc_calificacion_capcnumero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Descripcion" fieldSource="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Descripcion" caption="Descripcion" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_calificacion_capcDescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="12" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="mes" fieldSource="mes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Mes" caption="Mes" required="True" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcmes" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
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
				<ListBox id="13" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="anio" fieldSource="anio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Anio" caption="Anio" required="True" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcanio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano">
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
				<TextBox id="15" visible="No" fieldSourceType="DBColumn" dataType="Text" name="Agrupador" fieldSource="Agrupador" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Agrupador" caption="Agrupador" required="False" unique="False" wizardSize="50" wizardMaxLength="75" PathID="mc_calificacion_capcAgrupador">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="20" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="id_serviciocont" fieldSource="id_serviciocont" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Serviciocont" caption="Id Serviciocont" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcid_serviciocont" dataSource="mc_c_ServContractual" boundColumn="Id" textColumn="Descripcion">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="44" conditionType="Parameter" useIsNull="False" dataType="Text" field="Aplica" logicOperator="And" parameterSource="'CAPC'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="43" posHeight="136" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_ServContractual"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="45" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="46" dataType="Integer" fieldName="Id" tableName="mc_c_ServContractual"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextArea id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="URLEntregables" PathID="mc_calificacion_capcURLEntregables" fieldSource="urlentregables">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<CheckBox id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="CAPFirmada" PathID="mc_calificacion_capcCAPFirmada" fieldSource="CAPFirmada" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextBox id="59" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaFirmaCAES" PathID="mc_calificacion_capcFechaFirmaCAES" features="(assigned)" fieldSource="FechaFirmaCAES" format="dd/mm/yyyy" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="60" show_weekend="True" name="InlineDatePicker1" category="jQuery">
							<Components/>
							<Events/>
							<TableParameters/>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables/>
							<JoinLinks/>
							<Fields/>
							<Features/>
						</JDateTimePicker>
					</Features>
				</TextBox>
				<TextBox id="65" visible="No" fieldSourceType="DBColumn" dataType="Float" name="DiasRetrasoHabiles" PathID="mc_calificacion_capcDiasRetrasoHabiles" fieldSource="DiasRetrasoHabiles" format="0.00" defaultValue="0">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="165"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DiasRetrasoNaturales" PathID="mc_calificacion_capcDiasRetrasoNaturales" fieldSource="DiasRetrasoNaturales" format="0.00">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="166"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PctMaximo" PathID="mc_calificacion_capcPctMaximo" fieldSource="PctMaximo">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="167"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="35" visible="No" fieldSourceType="DBColumn" dataType="Float" name="DiasPlaneados" PathID="mc_calificacion_capcDiasPlaneados" fieldSource="DiasPlaneados" format="0.00" required="False" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="36" visible="No" fieldSourceType="DBColumn" dataType="Float" name="DiasReales" PathID="mc_calificacion_capcDiasReales" fieldSource="DiasReales" format="0.00">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Observaciones" caption="Observaciones" fieldSource="Observaciones" required="False" unique="False" PathID="mc_calificacion_capcObservaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="70" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IdEstimacion" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_capcIdEstimacion" fieldSource="IdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="75" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="id_tipo" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcid_tipo" connection="cnDisenio" dataSource="mc_c_TipoPPMC" boundColumn="Id" textColumn="Descripcion" fieldSource="id_tipo">
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
				<CheckBox id="76" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="SLO" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_capcSLO" checkedValue="1" uncheckedValue="0" fieldSource="SLO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<CheckBox id="110" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="paquetes_cerrados" PathID="mc_calificacion_capcpaquetes_cerrados" checkedValue="1" uncheckedValue="0" fieldSource="paquetes_cerrados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<ListBox id="19" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Boolean" returnValueType="Number" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="RETR ENTREGABLE" caption="RETR ENTREGABLE" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcRETR_ENTREGABLE" dataSource="0;No Cumple;1;Cumple">
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
				<Button id="111" urlType="Relative" enableValidation="True" isDefault="False" name="btnCalcular" PathID="mc_calificacion_capcbtnCalcular" returnPage="SLAsCAPCRetEnt.ccp" operation="Cancel">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="112"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<CheckBox id="169" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="evidencia_salvedad" PathID="mc_calificacion_capcevidencia_salvedad" fieldSource="evidencia_salvedad_re" checkedValue="True" uncheckedValue="Flase">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextArea id="170" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="observacion_salvedad" PathID="mc_calificacion_capcobservacion_salvedad" fieldSource="observacion_salvedad_dpo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="113"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="72" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id" logicOperator="And" orderNumber="1" parameterSource="id" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="168" tableName="mc_calificacion_capc"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="73" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="74" dataType="Integer" fieldName="id" tableName="mc_calificacion_capc"/>
			</PKFields>
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
		<Panel id="107" visible="True" generateDiv="False" name="Panel1" wizardInnerHTML="&lt;form action=&quot;{ActionFileUpload}&quot; enctype=&quot;multipart/form-data&quot; method=&quot;post&quot;&gt;
    &lt;input type=&quot;hidden&quot; name=&quot;MAX_FILE_SIZE&quot; value=&quot;100000&quot;&gt;&lt;br&gt;
    &lt;br&gt;
    &lt;b&gt;Cargar Artefactos de rchivo: &lt;/b&gt;&lt;br&gt;
    &lt;input type=&quot;file&quot; name=&quot;userfile&quot; accept=&quot;text/csv&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;input type=&quot;submit&quot; value=&quot;Procesar&quot;&gt;
  &lt;/form&gt;
 " PathID="Panel1">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Label id="109" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lErrores" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="lErrores">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Link id="114" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkAnterior" PathID="lkAnterior" hrefSource="SLAsCAPCRetEnt.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Anterior','textSourceDB':'','hrefSource':'SLAsCAPCRetEnt.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="116" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkSiguiente" PathID="lkSiguiente" hrefSource="SLAsCAPCRetEnt.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Siguiente','textSourceDB':'','hrefSource':'SLAsCAPCRetEnt.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkCumplimiento" PathID="lkCumplimiento" hrefSource="SLAsCAPCReqFunDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cumplimiento en&lt;br&gt;      Requisitos Funcionales','textSourceDB':'','hrefSource':'SLAsCAPCReqFunDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'length':6,'objectType':'linkParameters','2':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'3':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'4':{'sourceType':'URL','parameterSource':'id','parameterName':'sID'},'5':{'sourceType':'URL','parameterSource':'id','parameterName':'sID'}}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="118" sourceType="URL" format="yyyy-mm-dd" name="sID" source="id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="126" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkCalidad" PathID="lkCalidad" hrefSource="PPMCsCrbCalidadCAPC.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Calidad de &lt;br&gt; Productos Terminados','textSourceDB':'','hrefSource':'PPMCsCrbCalidadCAPC.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'2':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'length':5,'objectType':'linkParameters','3':{'sourceType':'URL','parameterSource':'sID','parameterName':'id'},'4':{'sourceType':'URL','parameterSource':'id','parameterName':'Id'}}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="124" sourceType="URL" format="yyyy-mm-dd" name="Id" source="id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkDeductiva" PathID="lkDeductiva" hrefSource="SLAsCAPCDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Deductivas por Omisión','textSourceDB':'','hrefSource':'SLAsCAPCDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'2':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'3':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'length':7,'objectType':'linkParameters','4':{'sourceType':'URL','parameterSource':'sID','parameterName':'id'},'5':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'6':{'sourceType':'URL','parameterSource':'id','parameterName':'id'}}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="122" sourceType="URL" format="yyyy-mm-dd" name="id" source="id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<EditableGrid id="134" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="False" allowDelete="True" validateData="True" preserveParameters="GET" sourceType="Table" defaultPageSize="10" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_cr_RE_RC_Artef" connection="cnDisenio" dataSource="mc_info_rs_cr_RE_RC_Artefacto_CAPC" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="Lista de Artefactos" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="Id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="mc_info_rs_cr_RE_RC_Artef" deleteControl="CheckBox_Delete">
			<Components>
				<Sorter id="137" visible="True" name="Sorter_Nombre" column="Nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="Nombre" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_ArtefSorter_Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="138" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_ArtefSorter_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="139" visible="True" name="Sorter_Formato" column="Formato" wizardCaption="Formato" wizardSortingType="SimpleDir" wizardControl="Formato" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_ArtefSorter_Formato">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="140" visible="True" name="Sorter_NombreConHerramienta" column="NombreConHerramienta" wizardCaption="Nombre Con Herramienta" wizardSortingType="SimpleDir" wizardControl="NombreConHerramienta" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_ArtefSorter_NombreConHerramienta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="141" visible="True" name="Sorter_FechaEstFin" column="FechaEstFin" wizardCaption="Fecha Est Fin" wizardSortingType="SimpleDir" wizardControl="FechaEstFin" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_ArtefSorter_FechaEstFin">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="142" visible="True" name="Sorter_FechaEntrega" column="FechaEntrega" wizardCaption="Fecha Entrega" wizardSortingType="SimpleDir" wizardControl="FechaEntrega" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_ArtefSorter_FechaEntrega">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="143" visible="True" name="Sorter_DiasHabilesDesviacion" column="DiasHabilesDesviacion" wizardCaption="Dias Habiles Desviacion" wizardSortingType="SimpleDir" wizardControl="DiasHabilesDesviacion" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_ArtefSorter_DiasHabilesDesviacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="144" visible="True" name="Sorter_DiasNaturalesDesviacion" column="DiasNaturalesDesviacion" wizardCaption="Dias Naturales Desviacion" wizardSortingType="SimpleDir" wizardControl="DiasNaturalesDesviacion" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_ArtefSorter_DiasNaturalesDesviacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="145" visible="True" name="Sorter_PctDeductiva" column="PctDeductiva" wizardCaption="Pct Deductiva" wizardSortingType="SimpleDir" wizardControl="PctDeductiva" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_ArtefSorter_PctDeductiva">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="146" visible="True" name="Sorter_Comentarios" column="Comentarios" wizardCaption="Comentarios" wizardSortingType="SimpleDir" wizardControl="Comentarios" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_ArtefSorter_Comentarios">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="147" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Nombre" fieldSource="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Nombre" PathID="mc_info_rs_cr_RE_RC_ArtefNombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="148" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Descripcion" PathID="mc_info_rs_cr_RE_RC_ArtefDescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="149" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Formato" fieldSource="Formato" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Formato" PathID="mc_info_rs_cr_RE_RC_ArtefFormato">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="150" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="NombreConHerramienta" fieldSource="NombreConHerramienta" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Nombre Con Herramienta" PathID="mc_info_rs_cr_RE_RC_ArtefNombreConHerramienta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="151" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaEstFin" fieldSource="FechaEstFin" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Fecha Est Fin" format="ShortDate" PathID="mc_info_rs_cr_RE_RC_ArtefFechaEstFin" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="152" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaEntrega" fieldSource="FechaEntrega" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Fecha Entrega" format="ShortDate" PathID="mc_info_rs_cr_RE_RC_ArtefFechaEntrega" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="153" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="DiasHabilesDesviacion" fieldSource="DiasHabilesDesviacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Dias Habiles Desviacion" PathID="mc_info_rs_cr_RE_RC_ArtefDiasHabilesDesviacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="154" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="DiasNaturalesDesviacion" fieldSource="DiasNaturalesDesviacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Dias Naturales Desviacion" PathID="mc_info_rs_cr_RE_RC_ArtefDiasNaturalesDesviacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="155" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="PctDeductiva" fieldSource="PctDeductiva" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Pct Deductiva" PathID="mc_info_rs_cr_RE_RC_ArtefPctDeductiva">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="156" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Comentarios" fieldSource="Comentarios" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Comentarios" PathID="mc_info_rs_cr_RE_RC_ArtefComentarios">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Panel id="157" visible="True" generateDiv="False" name="CheckBox_Delete_Panel">
					<Components>
						<CheckBox id="158" visible="Dynamic" fieldSourceType="CodeExpression" dataType="Boolean" defaultValue="Unchecked" name="CheckBox_Delete" checkedValue="true" uncheckedValue="false" wizardCaption="Borrar" wizardAddNbsp="True" PathID="mc_info_rs_cr_RE_RC_ArtefCheckBox_Delete_PanelCheckBox_Delete">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
				<Navigator id="159" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="Austere4">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="160" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="mc_info_rs_cr_RE_RC_ArtefButton_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="162" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Id_Padre" logicOperator="And" parameterSource="id" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="161" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="mc_info_rs_cr_RE_RC_Artefacto_CAPC"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="163" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="164" dataType="Integer" fieldName="Id" tableName="mc_info_rs_cr_RE_RC_Artefacto_CAPC"/>
			</PKFields>
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
		</EditableGrid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="SLAsCAPCRetEnt_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="SLAsCAPCRetEnt.php" forShow="True" url="SLAsCAPCRetEnt.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="AfterInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="108"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="127"/>
			</Actions>
		</Event>
	</Events>
</Page>
