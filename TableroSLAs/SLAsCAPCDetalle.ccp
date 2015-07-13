<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
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
				<Button id="7" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="mc_calificacion_capcButton_Delete">
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
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Agrupador" fieldSource="Agrupador" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Agrupador" caption="Agrupador" required="False" unique="False" wizardSize="50" wizardMaxLength="75" PathID="mc_calificacion_capcAgrupador">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="17" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Boolean" returnValueType="Number" name="DEDUC_OMISION" fieldSource="DEDUC_OMISION" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="DEDUC OMISION" caption="DEDUC OMISION" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcDEDUC_OMISION" dataSource="1;Cumple;0;No Cumple" defaultValue="1">
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
				<ListBox id="18" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Boolean" returnValueType="Number" name="EFIC_PRESUP" fieldSource="EFIC_PRESUP" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="EFIC PRESUP" caption="EFIC PRESUP" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcEFIC_PRESUP" dataSource="1;Cumple;0;No Cumple">
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
				<ListBox id="19" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Boolean" returnValueType="Number" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="RETR ENTREGABLE" caption="RETR ENTREGABLE" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcRETR_ENTREGABLE" dataSource="1;Cumple;0;No Cumple">
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
				<ListBox id="16" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Boolean" returnValueType="Number" name="CALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="CALIDAD PROD TERM" caption="CALIDAD PROD TERM" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_capcCALIDAD_PROD_TERM" dataSource="1;Cumple;0;No Cumple">
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
				<TextArea id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="txtEntregableCalidad" PathID="mc_calificacion_capctxtEntregableCalidad" fieldSource="EntregableCalidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Hallazgos" PathID="mc_calificacion_capcHallazgos" fieldSource="Hallazgos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DetalleCalidad" PathID="mc_calificacion_capcDetalleCalidad" fieldSource="DetalleCalidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextArea id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="txtEntregableEF" PathID="mc_calificacion_capctxtEntregableEF" fieldSource="EntregableEficiencia">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextArea id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DetalleEficPres" PathID="mc_calificacion_capcDetalleEficPres" fieldSource="DetalleEficiencia">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UnidadesAnteriores" PathID="mc_calificacion_capcUnidadesAnteriores" fieldSource="UnidadesAnteriores">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UnidadesActuales" PathID="mc_calificacion_capcUnidadesActuales" fieldSource="UnidadesActuales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="URLEntregables" PathID="mc_calificacion_capcURLEntregables" fieldSource="urlentregables">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Defectos" PathID="mc_calificacion_capcDefectos" fieldSource="Defectos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Deductiva" PathID="mc_calificacion_capcDeductiva" fieldSource="Deductiva">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="HallazgosSinSev" PathID="mc_calificacion_capcHallazgosSinSev" fieldSource="HallazgosSinSev">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="HallazgosAlta" PathID="mc_calificacion_capcHallazgosAlta" fieldSource="HallazgosAlta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="HallazgosMedia" PathID="mc_calificacion_capcHallazgosMedia" fieldSource="HallazgosMedia">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Checked" name="RevisionPares" PathID="mc_calificacion_capcRevisionPares" fieldSource="RevisionPares" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
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
				<TextBox id="65" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DiasRetrasoHabiles" PathID="mc_calificacion_capcDiasRetrasoHabiles" fieldSource="DiasRetrasoHabiles">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DiasRetrasoNaturales" PathID="mc_calificacion_capcDiasRetrasoNaturales" fieldSource="DiasRetrasoNaturales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PctMaximo" PathID="mc_calificacion_capcPctMaximo" fieldSource="PctMaximo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PctCalidad" PathID="mc_calificacion_capcPctCalidad" fieldSource="PctCalidad" format="0.00">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DiasPlaneados" PathID="mc_calificacion_capcDiasPlaneados" fieldSource="DiasPlaneados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DiasReales" PathID="mc_calificacion_capcDiasReales" fieldSource="DiasReales">
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
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="72" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id" logicOperator="And" orderNumber="1" parameterSource="id" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="71" posHeight="253" posLeft="10" posTop="10" posWidth="160" tableName="mc_calificacion_capc"/>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="SLAsCAPCDetalle.php" forShow="True" url="SLAsCAPCDetalle.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="SLAsCAPCDetalle_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
