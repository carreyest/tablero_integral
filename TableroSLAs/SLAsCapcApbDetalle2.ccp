<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_ap_EC" connection="cnDisenio" dataSource="mc_info_capc_ap" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="ID_PPMC" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Calificar Requerimiento" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_info_rs_ap_EC" activeCollection="IFormElements" activeTableType="mc_info_rs_ap_EC">
			<Components>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_info_rs_ap_ECButton_Insert">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="141"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_info_rs_ap_ECButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="7" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="mc_info_rs_ap_ECButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Id_Proveedor" fieldSource="Id_Proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" caption="Id Proveedor" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_ap_ECId_Proveedor" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextArea id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="URLReferencia" fieldSource="URLReferencia" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="URLReferencia" caption="URLReferencia" required="False" unique="False" wizardSize="50" wizardRows="3" PathID="mc_info_rs_ap_ECURLReferencia">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaAsignacion" fieldSource="FechaAsignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Fecha Asignacion" caption="Fecha Asignacion" required="True" format="dd/mm/yyyy HH:nn" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_info_rs_ap_ECFechaAsignacion" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="12" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
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
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaEntregaPropuesta" fieldSource="FechaEntregaPropuesta" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Fecha Entrega Propuesta" caption="Fecha Entrega Propuesta" format="dd/mm/yyyy HH:nn" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_info_rs_ap_ECFechaEntregaPropuesta" DBFormat="yyyy-mm-dd HH:nn:ss.S" required="True">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="59"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features>
						<JDateTimePicker id="14" show_weekend="True" name="InlineDatePicker2" category="jQuery" enabled="True">
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
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaEntregaEvidencia" fieldSource="FechaEntregaEvidencia" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Fecha Entrega Evidencia" caption="Fecha Entrega Evidencia" format="dd/mm/yyyy HH:nn" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_info_rs_ap_ECFechaEntregaEvidencia" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="16" show_weekend="True" name="InlineDatePicker3" category="jQuery" enabled="True">
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
				<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaAceptacionPropuesta" fieldSource="FechaAceptacionPropuesta" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Fecha Aceptacion Propuesta" caption="Fecha Aceptacion Propuesta" required="True" format="dd/mm/yyyy HH:nn" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_info_rs_ap_ECFechaAceptacionPropuesta" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="18" show_weekend="True" name="InlineDatePicker4" category="jQuery" enabled="True">
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
				<TextArea id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="Observaciones" fieldSource="Observaciones" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Observaciones" caption="Observaciones" required="False" unique="False" wizardSize="50" wizardRows="3" PathID="mc_info_rs_ap_ECObservaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<ListBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CumplioRS" fieldSource="CumplioRS" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumplio RS" PathID="mc_info_rs_ap_ECCumplioRS" checkedValue="1" uncheckedValue="0" sourceType="ListOfValues" dataSource="1;Cumple;0;No Cumple">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
				</ListBox>
				<Label id="22" fieldSourceType="CodeExpression" dataType="Text" html="False" generateSpan="False" name="sIdPPMC" PathID="mc_info_rs_ap_ECsIdPPMC" defaultValue="CCGetParam(&quot;ID_PPMC&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sNombreProyecto" PathID="mc_info_rs_ap_ECsNombreProyecto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ListBox id="26" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sServicioNegocio" PathID="mc_info_rs_ap_ECsServicioNegocio" visible="Yes" sourceType="SQL" connection="cnDisenio" dataSource="
select id_servicio, nombre
from mc_c_servicio where id_tipo_servicio=2
order by nombre
" boundColumn="id_servicio" textColumn="nombre" required="True" caption="Servicio de Negocio" fieldSource="id_servicio_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
				</ListBox>
				<ListBox id="27" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sTipoRequerimiento" PathID="mc_info_rs_ap_ECsTipoRequerimiento" visible="Yes" sourceType="Table" connection="cnDisenio" dataSource="mc_c_TipoPPMC" boundColumn="Id" textColumn="Descripcion" caption="Tipo Requerimiento" required="True" fieldSource="IdTipoReq">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="65"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
				</ListBox>
				<Hidden id="28" fieldSourceType="DBColumn" dataType="Integer" name="sID" PathID="mc_info_rs_ap_ECsID" fieldSource="Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<ListBox id="33" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="CumplioHE" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_ap_ECCumplioHE" dataSource="1;Cumple;0;No Cumple" fieldSource="CumplioHE">
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
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sEstadoPPMC" PathID="mc_info_rs_ap_ECsEstadoPPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="38" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="sIDEstimacion" PathID="mc_info_rs_ap_ECsIDEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="sUnidades" PathID="mc_info_rs_ap_ECsUnidades">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="40" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="sDatosPadre" PathID="mc_info_rs_ap_ECsDatosPadre" visible="Yes" fieldSource="IdPadre" format="###0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="41" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sHrsPropuesta" PathID="mc_info_rs_ap_ECsHrsPropuesta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="42" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="sDiasPropuesta" PathID="mc_info_rs_ap_ECsDiasPropuesta" visible="Yes" required="True" fieldSource="DiasPropuesta" caption="Dias para Propuesta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="43" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="sRAPE" PathID="mc_info_rs_ap_ECsRAPE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="44" fieldSourceType="DBColumn" dataType="Text" name="hdUsrAlta" PathID="mc_info_rs_ap_EChdUsrAlta" fieldSource="UsuarioAlta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<ListBox id="51" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="lstServContractual" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_ap_EClstServContractual" connection="cnDisenio" dataSource="mc_c_ServContractual" boundColumn="Id" textColumn="Descripcion" caption="Servicio Contractual" required="True" fieldSource="id_servicio_cont">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="52"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="186" posHeight="136" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_ServContractual"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="187" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="188" dataType="Integer" fieldName="Id" tableName="mc_c_ServContractual"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="sUnidadesManuales" PathID="mc_info_rs_ap_ECsUnidadesManuales" fieldSource="UnidadesApb" caption="Unidades Aprobadas" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="sHorasManuales" PathID="mc_info_rs_ap_ECsHorasManuales" required="True" fieldSource="HorasAprobadas" caption="Horas Aprobadas">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="57" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lServContractual" PathID="mc_info_rs_ap_EClServContractual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="58" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lServNegocio" PathID="mc_info_rs_ap_EClServNegocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="29" fieldSourceType="DBColumn" dataType="Integer" name="hIDPPMC" PathID="mc_info_rs_ap_EChIDPPMC" fieldSource="ID_PPMC" required="True" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="113" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="FechaEntregaHerramienta" PathID="mc_info_rs_ap_ECFechaEntregaHerramienta" fieldSource="FechaEntregaHerramienta" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S" caption="Fecha Entrega Herramienta Estimación" generateDiv="False" features="(assigned)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="119" show_weekend="True" name="InlineDatePicker5" category="jQuery" featureNameChanged="No">
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
				<TextBox id="114" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="UDX" PathID="mc_info_rs_ap_ECUDX" fieldSource="UDX" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="UDA" PathID="mc_info_rs_ap_ECUDA" fieldSource="UDA" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="116" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="USP" PathID="mc_info_rs_ap_ECUSP" fieldSource="USP" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="120" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="URLEvidencia" PathID="mc_info_rs_ap_ECURLEvidencia" fieldSource="URLInfoEvidencia" checkedValue="True" uncheckedValue="False">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="137"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</CheckBox>
				<CheckBox id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="formatoEvidencia" PathID="mc_info_rs_ap_ECformatoEvidencia" checkedValue="True" uncheckedValue="False" fieldSource="formatoEvidencia">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="138"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</CheckBox>
				<CheckBox id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="IDsCorrectos" PathID="mc_info_rs_ap_ECIDsCorrectos" fieldSource="IDsCorrectos" checkedValue="True" uncheckedValue="False">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="139"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</CheckBox>
				<ListBox id="128" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="TipoPadre" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_ap_ECTipoPadre" fieldSource="TipoPadre" connection="cnDisenio" dataSource="mc_c_TipoPPMC" boundColumn="Id" textColumn="Descripcion" caption="Tipo Padre">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="146" tableName="mc_c_TipoPPMC"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<Hidden id="45" fieldSourceType="DBColumn" dataType="Text" name="hdUsrUltMod" fieldSource="UsuarioUltMod" PathID="mc_info_rs_ap_EChdUsrUltMod" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="135" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DatosUltMod" PathID="mc_info_rs_ap_ECDatosUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="136" fieldSourceType="DBColumn" dataType="Date" name="hdFechaUltMod" PathID="mc_info_rs_ap_EChdFechaUltMod" DBFormat="yyyy-mm-dd HH:nn:ss.S" fieldSource="FechaUltMod" format="yyyy-mm-dd HH:nn" visible="Yes" defaultValue="date(&quot;Y-m-d H:i&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="140" urlType="Relative" enableValidation="True" isDefault="False" name="btnCalcular" PathID="mc_info_rs_ap_ECbtnCalcular">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="142"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="144" fieldSourceType="DBColumn" dataType="Text" name="hdEstado" PathID="mc_info_rs_ap_EChdEstado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="145" fieldSourceType="DBColumn" dataType="Text" name="hdNombreProyecto" PathID="mc_info_rs_ap_EChdNombreProyecto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="148" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="URLEvidenciaMed" PathID="mc_info_rs_ap_ECURLEvidenciaMed" fieldSource="URLEvidencia">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="163" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="SinEvidencia" PathID="mc_info_rs_ap_ECSinEvidencia" checkedValue="1" uncheckedValue="0" fieldSource="SinEvidencia">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="164"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextBox id="180" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="UST" PathID="mc_info_rs_ap_ECUST" fieldSource="UST" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="198" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="SLO" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECSLO" fieldSource="SLO" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextBox id="213" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DHoraSAT" PathID="mc_info_rs_ap_ECDHoraSAT" features="(assigned)" format="0;(0)">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="220"/>
							</Actions>
						</Event>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="221"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features>
						<JNumericUpDown id="214" enabled="True" step="1" page="1" type="Numeric" minValue="0" maxValue="1000" name="NumericUpDown1" category="jQuery">
							<Components/>
							<Events/>
							<ControlPoints/>
							<Features/>
						</JNumericUpDown>
					</Features>
				</TextBox>
				<TextBox id="215" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DMinSAT" PathID="mc_info_rs_ap_ECDMinSAT" features="(assigned)" format="0;(0)">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="222"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features>
						<JNumericUpDown id="216" enabled="True" step="1" page="1" type="Numeric" minValue="0" maxValue="59" name="NumericUpDown2" category="jQuery">
							<Components/>
							<Events/>
							<ControlPoints/>
							<Features/>
						</JNumericUpDown>
					</Features>
				</TextBox>
				<TextBox id="217" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DSegSAT" PathID="mc_info_rs_ap_ECDSegSAT" features="(assigned)" format="0;(0)">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="223"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features>
						<JNumericUpDown id="218" enabled="True" step="1" page="1" type="Numeric" minValue="0" maxValue="59" name="NumericUpDown3" category="jQuery">
							<Components/>
							<Events/>
							<ControlPoints/>
							<Features/>
						</JNumericUpDown>
					</Features>
				</TextBox>
				<Hidden id="219" fieldSourceType="DBColumn" dataType="Float" name="HorasSAT" PathID="mc_info_rs_ap_ECHorasSAT" fieldSource="HorasSAT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="25"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="30"/>
					</Actions>
				</Event>
				<Event name="BeforeBuildInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="31"/>
					</Actions>
				</Event>
				<Event name="BeforeInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="104"/>
					</Actions>
				</Event>
				<Event name="BeforeBuildUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="118"/>
					</Actions>
				</Event>
				<Event name="BeforeUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="134"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="143"/>
					</Actions>
				</Event>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="147"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="209" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Id" logicOperator="And" orderNumber="1" parameterSource="sID" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="212" tableName="mc_info_capc_ap"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="210" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="211" dataType="Text" fieldName="ID_PPMC" tableName="mc_info_capc_ap"/>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="87" variable="URLReferencia" dataType="Memo" parameterType="Control" parameterSource="URLReferencia"/>
				<SQLParameter id="88" variable="FechaAsignacion" dataType="Date" parameterType="Control" parameterSource="FechaAsignacion" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S"/>
				<SQLParameter id="89" variable="FechaEntregaPropuesta" dataType="Date" parameterType="Control" parameterSource="FechaEntregaPropuesta" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S"/>
				<SQLParameter id="90" variable="FechaEntregaEvidencia" dataType="Date" parameterType="Control" parameterSource="FechaEntregaEvidencia" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S"/>
				<SQLParameter id="91" variable="FechaAceptacionPropuesta" dataType="Date" parameterType="Control" parameterSource="FechaAceptacionPropuesta" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S"/>
				<SQLParameter id="92" variable="Observaciones" dataType="Memo" parameterType="Control" parameterSource="Observaciones"/>
				<SQLParameter id="93" variable="CumplioRS" dataType="Integer" parameterType="Control" parameterSource="CumplioRS"/>
				<SQLParameter id="94" variable="sServicioNegocio" dataType="Text" parameterType="Control" parameterSource="sServicioNegocio"/>
				<SQLParameter id="95" variable="sTipoRequerimiento" dataType="Text" parameterType="Control" parameterSource="sTipoRequerimiento"/>
				<SQLParameter id="96" variable="sID" dataType="Integer" parameterType="Control" parameterSource="sID"/>
				<SQLParameter id="97" variable="hIDPPMC" dataType="Integer" parameterType="Control" parameterSource="hIDPPMC"/>
				<SQLParameter id="98" variable="CumplioHE" dataType="Integer" parameterType="Control" parameterSource="CumplioHE"/>
				<SQLParameter id="99" variable="sDiasPropuesta" dataType="Integer" parameterType="Control" parameterSource="sDiasPropuesta"/>
				<SQLParameter id="100" variable="lstServContractual" dataType="Text" parameterType="Control" parameterSource="lstServContractual"/>
				<SQLParameter id="101" variable="sUnidadesManuales" dataType="Integer" parameterType="Control" parameterSource="sUnidadesManuales"/>
				<SQLParameter id="102" variable="sHorasManuales" dataType="Integer" parameterType="Control" parameterSource="sHorasManuales"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="71" field="URLReferencia" dataType="Memo" parameterType="Control" parameterSource="URLReferencia" omitIfEmpty="True"/>
				<CustomParameter id="72" field="FechaAsignacion" dataType="Date" parameterType="Control" parameterSource="FechaAsignacion" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S" omitIfEmpty="True"/>
				<CustomParameter id="73" field="FechaEntregaPropuesta" dataType="Date" parameterType="Control" parameterSource="FechaEntregaPropuesta" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S" omitIfEmpty="True"/>
				<CustomParameter id="74" field="FechaEntregaEvidencia" dataType="Date" parameterType="Control" parameterSource="FechaEntregaEvidencia" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S" omitIfEmpty="True"/>
				<CustomParameter id="75" field="FechaAceptacionPropuesta" dataType="Date" parameterType="Control" parameterSource="FechaAceptacionPropuesta" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S" omitIfEmpty="True"/>
				<CustomParameter id="76" field="Observaciones" dataType="Memo" parameterType="Control" parameterSource="Observaciones" omitIfEmpty="True"/>
				<CustomParameter id="77" field="CumplioRS" dataType="Integer" parameterType="Control" parameterSource="CumplioRS" omitIfEmpty="True"/>
				<CustomParameter id="78" field="id_servicio_negocio" dataType="Text" parameterType="Control" parameterSource="sServicioNegocio" omitIfEmpty="True"/>
				<CustomParameter id="79" field="IdTipoReq" dataType="Text" parameterType="Control" parameterSource="sTipoRequerimiento" omitIfEmpty="True"/>
				<CustomParameter id="80" field="Id" dataType="Integer" parameterType="Control" parameterSource="sID" omitIfEmpty="True"/>
				<CustomParameter id="81" field="ID_PPMC" dataType="Integer" parameterType="Control" parameterSource="hIDPPMC" omitIfEmpty="True"/>
				<CustomParameter id="82" field="CumplioHE" dataType="Integer" parameterType="Control" parameterSource="CumplioHE" omitIfEmpty="True"/>
				<CustomParameter id="83" field="DiasPropuesta" dataType="Integer" parameterType="Control" parameterSource="sDiasPropuesta" omitIfEmpty="True"/>
				<CustomParameter id="84" field="id_servicio_cont" dataType="Text" parameterType="Control" parameterSource="lstServContractual" omitIfEmpty="True"/>
				<CustomParameter id="85" field="UnidadesAprobadas" dataType="Integer" parameterType="Control" parameterSource="sUnidadesManuales" omitIfEmpty="True"/>
				<CustomParameter id="86" field="HorasAprobadas" dataType="Integer" parameterType="Control" parameterSource="sHorasManuales" omitIfEmpty="True"/>
			</IFormElements>
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
		<Label id="32" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lDocs" PathID="lDocs">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Link id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkSiguiente" PathID="lkSiguiente" hrefSource="SLAsCapcApbDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Siguiente','textSourceDB':'','hrefSource':'PPMCsApbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkAnterior" PathID="lkAnterior" hrefSource="SLAsCapcApbDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Anterior','textSourceDB':'','hrefSource':'PPMCsApbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="SLAsCapcApbDetalle2_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="SLAsCapcApbDetalle2.php" forShow="True" url="SLAsCapcApbDetalle2.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="62" groupID="3"/>
		<Group id="63" groupID="4"/>
		<Group id="64" groupID="5"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="23"/>
			</Actions>
		</Event>
		<Event name="BeforeOutput" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="53"/>
			</Actions>
		</Event>
	</Events>
</Page>
