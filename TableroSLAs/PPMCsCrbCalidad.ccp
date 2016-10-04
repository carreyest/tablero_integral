<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Label id="141" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lDocs" PathID="lDocs">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Record id="81" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_cr_calidad" connection="cnDisenio" dataSource="mc_info_rs_cr_calidad" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Calificar Calidad de Productos Terminados" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_info_rs_cr_calidad">
			<Components>
				<Button id="83" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_info_rs_cr_calidadButton_Insert" returnPage="PPMCsCrbCalidad.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="84" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_info_rs_cr_calidadButton_Update" returnPage="PPMCsCrbCalidad.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="id_ppmc" fieldSource="id_ppmc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Ppmc" caption="Id Ppmc" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_calidadid_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="id_estimacion" fieldSource="id_estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Estimacion" caption="Id Estimacion" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_calidadid_estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="88" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="RechazosDocAVL" fieldSource="RechazosDocAVL" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Rechazos Doc AVL" caption="Rechazos Doc AVL" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_calidadRechazosDocAVL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="89" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="HallazgosDocQC" fieldSource="HallazgosDocQC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Hallazgos Doc QC" caption="Hallazgos Doc QC" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_calidadHallazgosDocQC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="90" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="IndiceCalidadDoc" fieldSource="IndiceCalidadDoc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Indice Calidad Doc" caption="Indice Calidad Doc" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_info_rs_cr_calidadIndiceCalidadDoc" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DeductivaDoc" fieldSource="DeductivaDoc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Deductiva Doc" caption="Deductiva Doc" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_info_rs_cr_calidadDeductivaDoc" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="99" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="CumpleCalidad" fieldSource="CumpleCalidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Calidad" caption="Cumple Calidad" required="False" unique="False" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_cr_calidadCumpleCalidad" dataSource="1;Cumple;0;No Cumple">
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
				<TextArea id="100" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Observaciones" fieldSource="Observaciones" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Observaciones" caption="Observaciones" required="False" unique="False" wizardSize="50" wizardRows="3" PathID="mc_info_rs_cr_calidadObservaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="101" fieldSourceType="DBColumn" dataType="Text" name="UsuarioUltMod" fieldSource="UsuarioUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Usuario Ult Mod" caption="Usuario Ult Mod" required="False" unique="False" PathID="mc_info_rs_cr_calidadUsuarioUltMod" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="102" fieldSourceType="DBColumn" dataType="Date" name="FechaUltMod" fieldSource="FchaUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Fcha Ult Mod" caption="Fcha Ult Mod" required="False" format="yyyy-mm-dd HH:nn" unique="False" PathID="mc_info_rs_cr_calidadFechaUltMod" DBFormat="yyyy-mm-dd HH:nn:ss.S" defaultValue="date(&quot;Y-m-d H:i&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="92" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="RechazosFunAVL" fieldSource="RechazosFunAVL" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Rechazos Fun AVL" caption="Rechazos Fun AVL" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_calidadRechazosFunAVL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="93" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DefectosQC" fieldSource="DefectosQC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Defectos QC" caption="Defectos QC" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_calidadDefectosQC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="145" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sTipoRequerimiento" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_cr_calidadsTipoRequerimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="144" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sNombreProyecto" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_cr_calidadsNombreProyecto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="147" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbIdEstimacion" PathID="mc_info_rs_cr_calidadlbIdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="150" fieldSourceType="DBColumn" dataType="Text" name="hdId" PathID="mc_info_rs_cr_calidadhdId" defaultValue="CCGetParam(&quot;Id&quot;)" fieldSource="id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="158" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Text" returnValueType="Number" name="lsServNegocio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_cr_calidadlsServNegocio" fieldSource="Id_Serv_Negocio" connection="con_xls" dataSource="select id_servicio, nombre
from mc_c_servicio where id_tipo_servicio=2
order by nombre" boundColumn="id_servicio" textColumn="nombre" required="True" caption="Servicio de Negocio">
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
				</Hidden>
				<Hidden id="159" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="lsServContractual" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_cr_calidadlsServContractual" fieldSource="Id_Serv_Contractual" connection="con_xls" dataSource="mc_c_ServContractual" boundColumn="Id" textColumn="Descripcion" required="True" caption="Servicio Contractual">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="161" conditionType="Parameter" useIsNull="False" dataType="Text" field="Aplica" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="160" posHeight="104" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_ServContractual"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="162" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="163" dataType="Integer" fieldName="Id" tableName="mc_c_ServContractual"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="253" urlType="Relative" enableValidation="True" isDefault="False" name="btnCalcula" PathID="mc_info_rs_cr_calidadbtnCalcula" operation="Update" returnPage="PPMCsCrbCalidad.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="254"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="148" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbIdPPMC" PathID="mc_info_rs_cr_calidadlbIdPPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="98" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DeductivaTot" fieldSource="DeductivaTot" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Deductiva Tot" caption="Deductiva Tot" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_info_rs_cr_calidadDeductivaTot">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="94" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CasosdePrueba" fieldSource="CasosdePrueba" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Casosde Prueba" caption="Casosde Prueba" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_calidadCasosdePrueba">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="95" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="TotalDefectos" fieldSource="TotalDefectos" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Total Defectos" caption="Total Defectos" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_calidadTotalDefectos" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="96" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="IndiceCalidadFun" fieldSource="IndiceCalidadFun" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Indice Calidad Fun" caption="Indice Calidad Fun" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_info_rs_cr_calidadIndiceCalidadFun" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="97" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DeductivaFun" fieldSource="DeductivaFun" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Deductiva Fun" caption="Deductiva Fun" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_info_rs_cr_calidadDeductivaFun" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="315" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbServNegocio" PathID="mc_info_rs_cr_calidadlbServNegocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="316" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbServContractual" PathID="mc_info_rs_cr_calidadlbServContractual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="319" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lReportado" PathID="mc_info_rs_cr_calidadlReportado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="325" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="evidencia_salvedad" PathID="mc_info_rs_cr_calidadevidencia_salvedad" fieldSource="evidencia_salvedad" checkedValue="True" uncheckedValue="False">
<Components/>
<Events/>
<Attributes/>
<Features/>
</CheckBox>
<TextArea id="326" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="observacion_salvedad" PathID="mc_info_rs_cr_calidadobservacion_salvedad" fieldSource="observacion_salvedad">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="115" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="116" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="151"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="152"/>
					</Actions>
				</Event>
				<Event name="BeforeUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="157"/>
					</Actions>
				</Event>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="237"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="154" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id" logicOperator="And" orderNumber="1" parameterSource="Id" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="320" tableName="mc_info_rs_cr_calidad"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="155" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="156" dataType="Integer" fieldName="id" tableName="mc_info_rs_cr_calidad"/>
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
		<IncludePage id="143" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Link id="164" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkAnterior" PathID="lkAnterior" hrefSource="PPMCsCrbCalidad.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'lkAnterior','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="165" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkSiguiente" PathID="lkSiguiente" hrefSource="PPMCsCrbCalidad.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'lkSiguiente','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<EditableGrid id="166" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" sourceType="SQL" defaultPageSize="25" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_detalle_hallazgos" connection="cnDisenio" dataSource="SELECT det.*, mc_c_proveedor.Nombre
FROM  mc_universo_cds u 
	inner join mc_info_detalle_defectos_calidad  det on det.IdPadre = u.id 
	INNER JOIN mc_detalle_PPMC_Defectos def ON
		det.IdRelacionado = def.ID_DEFECTO
		and def.ID_PPMC =  u.numero 
		and MONTH(def.FECHA_CARGA )=u.mes  and YEAR(def.FECHA_CARGA ) = u.anio 
	LEFT JOIN mc_c_proveedor ON
         det.id_ProveedorPaq = mc_c_proveedor.id_proveedor
WHERE u.id = {Id}
AND det.TipoRegistro  = '{Expr0}'
" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption=" Lista de Hallazgos" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="Id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="mc_info_detalle_hallazgos" customUpdateType="Table" activeCollection="UFormElements" activeTableType="mc_info_detalle_defectos_calidad" customUpdate="mc_info_detalle_defectos_calidad" wizardAllowSorting="True">
			<Components>
				<Sorter id="171" visible="True" name="Sorter_TipoRegistro" column="TipoRegistro" wizardCaption="Tipo Registro" wizardSortingType="SimpleDir" wizardControl="TipoRegistro" wizardAddNbsp="False" PathID="mc_info_detalle_hallazgosSorter_TipoRegistro">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="172" visible="True" name="Sorter_Estado" column="Estado" wizardCaption="Estado" wizardSortingType="SimpleDir" wizardControl="Estado" wizardAddNbsp="False" PathID="mc_info_detalle_hallazgosSorter_Estado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="173" visible="True" name="Sorter_Tipo" column="Tipo" wizardCaption="Tipo" wizardSortingType="SimpleDir" wizardControl="Tipo" wizardAddNbsp="False" PathID="mc_info_detalle_hallazgosSorter_Tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="174" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="mc_info_detalle_hallazgosSorter_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="175" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="mc_info_detalle_hallazgosSorter_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="176" visible="True" name="Sorter_Ignorar" column="Ignorar" wizardCaption="Ignorar" wizardSortingType="SimpleDir" wizardControl="Ignorar" wizardAddNbsp="False" PathID="mc_info_detalle_hallazgosSorter_Ignorar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="179" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="TipoRegistro" fieldSource="TipoRegistro" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Tipo Registro" PathID="mc_info_detalle_hallazgosTipoRegistro">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="180" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Database" preserveParameters="GET" name="Estado" fieldSource="Estado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Estado" hrefSource="Estado" linkProperties="{'textSource':'','textSourceDB':'Estado','hrefSource':'','hrefSourceDB':'Estado','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" PathID="mc_info_detalle_hallazgosEstado">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="181" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Tipo" fieldSource="Tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Tipo" PathID="mc_info_detalle_hallazgosTipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="182" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Paquete" PathID="mc_info_detalle_hallazgosPaquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="183" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Descripcion" PathID="mc_info_detalle_hallazgosDescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="184" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="Ignorar" fieldSource="Ignorar" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Ignorar" PathID="mc_info_detalle_hallazgosIgnorar" defaultValue="Unchecked" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Hidden id="185" fieldSourceType="DBColumn" dataType="Integer" name="IdPadre" fieldSource="IdPadre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" visible="Yes" wizardCaption="Id Padre" caption="Id Padre" required="False" unique="False" PathID="mc_info_detalle_hallazgosIdPadre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="186" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Id" fieldSource="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id" PathID="mc_info_detalle_hallazgosId">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Navigator id="187" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="188" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="mc_info_detalle_hallazgosButton_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="266" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaInicioMov" PathID="mc_info_detalle_hallazgosFechaInicioMov" fieldSource="FechaInicioMov" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="dd/mm/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="279" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="IdRelacionado" PathID="mc_info_detalle_hallazgosIdRelacionado" fieldSource="IdRelacionado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="280" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="mc_info_detalle_hallazgosSorter1" wizardCaption="Sorter1" column="IdRelacionado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="314" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ProveedorPaq" PathID="mc_info_detalle_hallazgosProveedorPaq" fieldSource="Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="322"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="312" dataType="Integer" defaultValue="0" designDefaultValue="4004" parameterSource="Id" parameterType="URL" variable="Id"/>
				<SQLParameter id="313" dataType="Text" designDefaultValue="Hallazgo" parameterSource="'Hallazgo'" parameterType="Expression" variable="Expr0"/>
			</SQLParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<PKFields>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="192" variable="Ignorar" dataType="Boolean" parameterType="Control" parameterSource="Ignorar"/>
				<SQLParameter id="193" variable="IdPadre" dataType="Integer" parameterType="Control" parameterSource="IdPadre"/>
				<SQLParameter id="194" variable="Id" dataType="Integer" parameterType="Control" parameterSource="Id"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="189" field="Ignorar" dataType="Boolean" parameterType="Control" parameterSource="Ignorar"/>
				<CustomParameter id="190" field="IdPadre" dataType="Integer" parameterType="Control" parameterSource="IdPadre"/>
				<CustomParameter id="191" field="Id" dataType="Integer" parameterType="Control" parameterSource="Id"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="195" conditionType="Parameter" useIsNull="False" field="Id" dataType="Integer" parameterType="DataSourceColumn" searchConditionType="Equal" logicOperator="And" parameterSource="Id"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="198" field="Ignorar" dataType="Boolean" parameterType="Control" parameterSource="Ignorar" omitIfEmpty="False" defaultValue="0"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
		<EditableGrid id="200" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" sourceType="Table" defaultPageSize="25" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_detalle_defectos" connection="cnDisenio" dataSource="mc_info_detalle_defectos_calidad, mc_c_proveedor" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption=" Lista de Hallazgos" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="Id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="mc_info_detalle_defectos" customUpdateType="Table" activeCollection="UFormElements" activeTableType="mc_info_detalle_defectos_calidad" customUpdate="mc_info_detalle_defectos_calidad" wizardAllowSorting="True">
			<Components>
				<Sorter id="201" visible="True" name="Sorter_TipoRegistro" column="TipoRegistro" wizardCaption="Tipo Registro" wizardSortingType="SimpleDir" wizardControl="TipoRegistro" wizardAddNbsp="False" PathID="mc_info_detalle_defectosSorter_TipoRegistro">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="202" visible="True" name="Sorter_Estado" column="Estado" wizardCaption="Estado" wizardSortingType="SimpleDir" wizardControl="Estado" wizardAddNbsp="False" PathID="mc_info_detalle_defectosSorter_Estado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="203" visible="True" name="Sorter_Tipo" column="Tipo" wizardCaption="Tipo" wizardSortingType="SimpleDir" wizardControl="Tipo" wizardAddNbsp="False" PathID="mc_info_detalle_defectosSorter_Tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="204" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="mc_info_detalle_defectosSorter_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="205" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="mc_info_detalle_defectosSorter_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="206" visible="True" name="Sorter_Ignorar" column="Ignorar" wizardCaption="Ignorar" wizardSortingType="SimpleDir" wizardControl="Ignorar" wizardAddNbsp="False" PathID="mc_info_detalle_defectosSorter_Ignorar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="207" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="TipoRegistro" fieldSource="TipoRegistro" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Tipo Registro" PathID="mc_info_detalle_defectosTipoRegistro">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="208" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Database" preserveParameters="GET" name="Estado" fieldSource="Estado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Estado" hrefSource="Estado" linkProperties="{'textSource':'','textSourceDB':'Estado','hrefSource':'','hrefSourceDB':'Estado','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" PathID="mc_info_detalle_defectosEstado">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="209" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Tipo" fieldSource="Tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Tipo" PathID="mc_info_detalle_defectosTipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="210" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Paquete" PathID="mc_info_detalle_defectosPaquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="211" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Descripcion" PathID="mc_info_detalle_defectosDescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="212" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="Ignorar" fieldSource="Ignorar" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Ignorar" PathID="mc_info_detalle_defectosIgnorar" defaultValue="Unchecked" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Hidden id="213" fieldSourceType="DBColumn" dataType="Integer" name="IdPadre" fieldSource="IdPadre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" visible="Yes" wizardCaption="Id Padre" caption="Id Padre" required="False" unique="False" PathID="mc_info_detalle_defectosIdPadre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="214" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Id" fieldSource="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id" PathID="mc_info_detalle_defectosId">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Navigator id="215" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="216" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="mc_info_detalle_defectosButton_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="278" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="IdRelacionado" PathID="mc_info_detalle_defectosIdRelacionado" fieldSource="IdRelacionado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="281" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="mc_info_detalle_defectosSorter1" wizardCaption="Id " column="IdRelacionado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="293" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ProveedorPaq" PathID="mc_info_detalle_defectosProveedorPaq" fieldSource="nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="321"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="306" conditionType="Parameter" useIsNull="False" dataType="Integer" field="mc_info_detalle_defectos_calidad.IdPadre" logicOperator="And" parameterSource="Id" parameterType="URL" searchConditionType="Equal"/>
				<TableParameter id="307" conditionType="Parameter" useIsNull="False" dataType="Text" field="mc_info_detalle_defectos_calidad.TipoRegistro" logicOperator="And" parameterSource="'Defecto'" parameterType="Expression" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="323" tableName="mc_info_detalle_defectos_calidad"/>
				<JoinTable id="324" tableName="mc_c_proveedor"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="305" conditionType="Equal" fieldLeft="mc_info_detalle_defectos_calidad.id_ProveedorPaq" fieldRight="mc_c_proveedor.id_proveedor" joinType="left" tableLeft="mc_info_detalle_defectos_calidad" tableRight="mc_c_proveedor"/>
			</JoinLinks>
			<Fields>
				<Field id="308" fieldName="mc_info_detalle_defectos_calidad.*" tableName="mc_info_detalle_defectos_calidad"/>
				<Field id="309" fieldName="nombre" tableName="mc_c_proveedor"/>
			</Fields>
			<PKFields>
				<PKField id="310" dataType="Integer" fieldName="Id" tableName="mc_info_detalle_defectos_calidad"/>
				<PKField id="311" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="221" variable="Ignorar" dataType="Boolean" parameterType="Control" parameterSource="Ignorar"/>
				<SQLParameter id="222" variable="IdPadre" dataType="Integer" parameterType="Control" parameterSource="IdPadre"/>
				<SQLParameter id="223" variable="Id" dataType="Integer" parameterType="Control" parameterSource="Id"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="224" field="Ignorar" dataType="Boolean" parameterType="Control" parameterSource="Ignorar"/>
				<CustomParameter id="225" field="IdPadre" dataType="Integer" parameterType="Control" parameterSource="IdPadre"/>
				<CustomParameter id="226" field="Id" dataType="Integer" parameterType="Control" parameterSource="Id"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="227" conditionType="Parameter" useIsNull="False" field="Id" dataType="Integer" parameterType="DataSourceColumn" searchConditionType="Equal" logicOperator="And" parameterSource="Id"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="228" field="Ignorar" dataType="Boolean" parameterType="Control" parameterSource="Ignorar" omitIfEmpty="False" defaultValue="0"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
		<EditableGrid id="238" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" sourceType="SQL" defaultPageSize="5" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="EditableGrid1" connection="cnDisenio" dataSource="SELECT det.id id_rec, det.Paquete, det.ClaveMovimiento, det.c_rdl, det.PAQ_CVE_FOL, 
		paq.FechaInicioMov,  det.considerar, e.Tipo, det.ciclo,
		(select top 1 DescMovimiento from mc_detalle_PPMC_avl paq2 where paq2.Paquete = det.Paquete and paq2.c_rdl = det.c_rdl and paq2.DescMovimiento like ('%Cerrado%')) Cierre
from mc_detalle_PPMC_Monitor_avl det
		inner join mc_detalle_PPMC_avl paq on paq.Paquete = det.Paquete and paq.c_rdl = det.c_rdl and paq.ClaveMovimiento in (16,500)
		and paq.ciclo = det.ciclo  and det.Id_PPMC = paq.Id_PPMC 
		and month(paq.FechaCarga)= MONTH(det.FechaCarga )and year(paq.FechaCarga)= year(det.FechaCarga )
	inner JOIN mc_universo_cds ON det.Id_PPMC = mc_universo_cds.numero 
	      and mc_universo_cds.mes = month(det.fechacarga) and mc_universo_cds.anio = year(det.fechacarga)
	      and mc_universo_cds.id_proveedor = det.Id_Proveedor 
	left   join mc_c_Errores e on replace(e.Descripcion,' ','') = replace(det.Descripcion,' ','') --and e.AplicaCDS = 1 
where mc_universo_cds.id =  {Id} and (det.idpadre is null or det.idpadre = mc_universo_cds.id)
order by det.ciclo, det.c_rdl, det.fechainiciomov, e.tipo 
" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="Detalle de Rechazos" wizardGridType="Tabular" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="id_rec" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="EditableGrid1" customUpdateType="SQL" activeCollection="UFormElements" activeTableType="mc_detalle_PPMC_Monitor_avl" customUpdate="UPDATE mc_detalle_PPMC_Monitor_avl SET considerar='{considerar}' WHERE  Id = {id_rec}">
			<Components>
				<Label id="242" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Paquete" PathID="EditableGrid1Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="244" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="c_rdl" fieldSource="c_rdl" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="C Rdl" PathID="EditableGrid1c_rdl">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="246" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Tipo" fieldSource="Tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Tipo" PathID="EditableGrid1Tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="247" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ciclo" fieldSource="ciclo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Ciclo" PathID="EditableGrid1ciclo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="248" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="considerar" fieldSource="considerar" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Ignorar" PathID="EditableGrid1considerar" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Navigator id="249" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="250" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="EditableGrid1Button_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="241" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_rec" fieldSource="id_rec" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id Rec" PathID="EditableGrid1id_rec">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="267" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaInicioMov" PathID="EditableGrid1FechaInicioMov" fieldSource="FechaInicioMov" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="268" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Cierre" PathID="EditableGrid1Cierre" fieldSource="Cierre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="317" dataType="Integer" defaultValue="0" designDefaultValue="4024" parameterSource="Id" parameterType="URL" variable="Id"/>
				<SQLParameter id="318" dataType="Integer" defaultValue="0" designDefaultValue="68443" parameterSource="c_rdl" parameterType="URL" variable="c_rdl"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="262" variable="considerar" dataType="Boolean" parameterType="Control" parameterSource="considerar"/>
				<SQLParameter id="263" variable="id_rec" parameterType="Control" dataType="Integer" parameterSource="id_rec" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="252" conditionType="Parameter" useIsNull="False" field="Id" dataType="Integer" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="id_rec"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="251" field="considerar" dataType="Boolean" parameterType="Control" parameterSource="considerar" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
		<Link id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkReqFun" PathID="lkReqFun" hrefSource="PPMCsCumpReqFunDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cumplimiento de&lt;br&gt;            Requisitos Funcionales','textSourceDB':'','hrefSource':'PPMCsCumpReqFunDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'2':{'sourceType':'URL','parameterSource':'1','parameterName':'src'},'3':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'4':{'sourceType':'Expression','parameterSource':'1','parameterName':'src'},'length':5,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="130" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
				<LinkParameter id="139" sourceType="Expression" name="src" source="1"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkCalidad" PathID="lkCalidad" hrefSource="PPMCsCrbCalidad.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Calidad de Productos Terminados','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'length':1,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="132" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="133" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkRetEnt_Calidad" PathID="lkRetEnt_Calidad" hrefSource="PPMCsCrbDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Retraso en Entregables/&lt;br&gt;Completar Tareas en Ruta Crítica','textSourceDB':'','hrefSource':'PPMCsCrbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'length':2,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="134" sourceType="URL" format="yyyy-mm-dd" name="sID" source="Id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkCalidadCod" PathID="lkCalidadCod" hrefSource="PPMCsCrCalCodDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{&quot;textSource&quot;:&quot;Calidad de Código&quot;,&quot;textSourceDB&quot;:&quot;&quot;,&quot;hrefSource&quot;:&quot;PPMCsCrCalCodDetalle.ccp&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;0&quot;:{&quot;sourceType&quot;:&quot;URL&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;1&quot;:{&quot;sourceType&quot;:&quot;URL&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;length&quot;:2,&quot;objectType&quot;:&quot;linkParameters&quot;}}">
			<Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="136" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="Link1" PathID="Link1" hrefSource="PPMCsDefFugDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Defectos Fugados a Producción','textSourceDB':'','hrefSource':'PPMCsDefFugDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'length':1,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="138" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsCrbCalidad_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsCrbCalidad.php" forShow="True" url="PPMCsCrbCalidad.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="142" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="103"/>
			</Actions>
		</Event>
	</Events>
</Page>
