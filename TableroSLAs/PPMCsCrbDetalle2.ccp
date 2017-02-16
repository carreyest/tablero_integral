<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Austere3" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_ap_EC" connection="cnDisenio" dataSource="mc_info_rs_cr_RE_RC" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="ID_PPMC" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Calificar Requerimiento" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_info_rs_ap_EC" activeCollection="IFormElements" activeTableType="mc_info_rs_ap_EC">
			<Components>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_info_rs_ap_ECButton_Insert">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="141" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_info_rs_ap_ECButton_Update" returnPage="PPMCsCrbDetalle2.ccp">
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
				<Hidden id="26" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sServicioNegocio" PathID="mc_info_rs_ap_ECsServicioNegocio" visible="Yes" sourceType="SQL" connection="con_xls" dataSource="
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
				</Hidden>
				<ListBox id="27" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sTipoRequerimiento" PathID="mc_info_rs_ap_ECsTipoRequerimiento" visible="Yes" sourceType="Table" connection="cnDisenio" boundColumn="Id" textColumn="Descripcion" caption="Tipo Requerimiento" required="True" fieldSource="IdTipoReq" dataSource="mc_c_TipoPPMC">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="65" eventType="Client"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="278" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
				</ListBox>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sEstadoPPMC" PathID="mc_info_rs_ap_ECsEstadoPPMC">
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
				<Hidden id="51" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="lstServContractual" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_ap_EClstServContractual" connection="con_xls" dataSource="mc_c_ServContractual" boundColumn="Id" textColumn="Descripcion" caption="Servicio Contractual" required="True" fieldSource="id_servicio_cont">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="52" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="314" conditionType="Expression" useIsNull="False" expression="Aplica = 'CDS'" logicOperator="And" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="313" posHeight="104" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_ServContractual"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="315" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="316" dataType="Integer" fieldName="Id" tableName="mc_c_ServContractual"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</Hidden>
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
				<TextArea id="149" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="URLReferencia" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECURLReferencia" fieldSource="URLReferencia">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<ListBox id="266" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="lbSLA" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_ap_EClbSLA" fieldSource="TipoSLA">
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
				<ListBox id="272" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sTipoRequerimiento1" PathID="mc_info_rs_ap_ECsTipoRequerimiento1" visible="Yes" sourceType="ListOfValues" connection="cnDisenio" dataSource="2;Mantenimiento Mayor;3;Mantenimiento Menor" boundColumn="Id" caption="Tipo Medición" required="False" fieldSource="IdReqCC">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="273" eventType="Client"/>
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
				<TextBox id="268" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="FechaFirmaCAES" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECFechaFirmaCAES" fieldSource="FechaFirmaCAES" format="ShortDate" DBFormat="yyyy-mm-dd HH:nn:ss.S" required="False" generateDiv="False" features="(assigned)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="274" show_weekend="True" name="InlineDatePicker1" category="jQuery" featureNameChanged="No">
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
				<TextBox id="146" visible="No" fieldSourceType="DBColumn" dataType="Float" name="txtDiasEstimados" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECtxtDiasEstimados" fieldSource="DiasDesarrolloEst" required="False" defaultValue="0" caption="Días Planeados" format="0.000">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="147" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="MaxDiasRetrasoNat" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECMaxDiasRetrasoNat" fieldSource="MaxDiasRetrasoNat" required="False" defaultValue="0" format="0.000">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="267" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="411"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="148" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="MaxDiasRetrasoHab" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECMaxDiasRetrasoHab" fieldSource="MaxDiasRetrasoHab" required="False" defaultValue="0" format="0.000">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="412"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="276" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PctMax" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECPctMax" fieldSource="PctMax" defaultValue="0" format="0.0000">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="279" id_oncopy="279" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="413"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="263" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="CumplioRS" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_ap_ECCumplioRS" fieldSource="CumplioRC" dataSource=";No Aplica;1;Cumplio;0;No Cumplio">
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
				<ListBox id="264" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="CumplioHE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_ap_ECCumplioHE" fieldSource="CumplioRE" dataSource=";No Aplica;1;Cumple;0;No Cumple">
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
				<Hidden id="29" fieldSourceType="DBColumn" dataType="Integer" name="hIDPPMC" PathID="mc_info_rs_ap_EChIDPPMC" fieldSource="ID_PPMC" required="True" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextArea id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="Observaciones" fieldSource="Observaciones" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Observaciones" caption="Observaciones" required="False" unique="False" wizardSize="50" wizardRows="3" PathID="mc_info_rs_ap_ECObservaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Image id="280" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Image1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECImage1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<CheckBox id="265" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="CAPFirmada" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECCAPFirmada" fieldSource="CAPFirmada">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<CheckBox id="283" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="TPaquetes" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECTPaquetes" fieldSource="TPaquetes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Hidden id="302" fieldSourceType="DBColumn" dataType="Integer" name="hExiste" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_EChExiste">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="28" fieldSourceType="DBColumn" dataType="Integer" name="sID" PathID="mc_info_rs_ap_ECsID" fieldSource="Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="45" fieldSourceType="DBColumn" dataType="Text" name="hdUsrUltMod" fieldSource="UsuarioUltMod" PathID="mc_info_rs_ap_EChdUsrUltMod" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="372" urlType="Relative" enableValidation="True" isDefault="False" name="btnCalcular" PathID="mc_info_rs_ap_ECbtnCalcular" operation="Cancel" returnPage="PPMCsCrbDetalle2.ccp" removeParameters="URLReferencia">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="373"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="406" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lReportado" PathID="mc_info_rs_ap_EClReportado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="415" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="evidencia_salvedad" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECevidencia_salvedad" fieldSource="evidencia_salvedad" checkedValue="True" uncheckedValue="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextArea id="416" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="observacion_salvedad" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECobservacion_salvedad" fieldSource="observacion_salvedad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="417" fieldSourceType="DBColumn" dataType="Text" name="porc_re" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_ap_ECporc_re">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="25" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="30" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeBuildInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="31" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="104" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeBuildUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="118" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="134" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="143" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="311"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="130" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Id" logicOperator="And" orderNumber="1" parameterSource="sID" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="414" tableName="mc_info_rs_cr_RE_RC"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<PKFields>
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
		<Link id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkSiguiente" PathID="lkSiguiente" hrefSource="PPMCsCrbDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Siguiente','textSourceDB':'','hrefSource':'PPMCsApbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkAnterior" PathID="lkAnterior" hrefSource="PPMCsCrbDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Anterior','textSourceDB':'','hrefSource':'PPMCsApbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Record id="190" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_cr_RE_RC_Artef1" connection="cnDisenio" dataSource="mc_info_rs_cr_RE_RC_Artefacto" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Agregar/Editar Mc Info Rs Cr RE RC Artefacto " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="GridRecord" changedCaptionRecord="False" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_rs_cr_RE_RC_Artef1" composition="6" editableComponentTypeString="Record">
			<Components>
				<Button id="191" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_info_rs_cr_RE_RC_Artef1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="192" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_info_rs_cr_RE_RC_Artef1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="204" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DiasHabilesReales" fieldSource="DiasHabilesReales" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Dias Habiles Reales" caption="Dias Habiles Reales" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_RE_RC_Artef1DiasHabilesReales" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="208" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UsuarioAlta" fieldSource="UsuarioAlta" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Usuario Alta" caption="Usuario Alta" required="False" unique="False" wizardSize="25" wizardMaxLength="25" PathID="mc_info_rs_cr_RE_RC_Artef1UsuarioAlta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="209" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaUltMod" fieldSource="FechaUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Fecha Ult Mod" caption="Fecha Ult Mod" required="False" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_info_rs_cr_RE_RC_Artef1FechaUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="210" show_weekend="True" name="InlineDatePicker4" category="jQuery" enabled="True">
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
				</Hidden>
				<Hidden id="211" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UsuarioUltMod" fieldSource="UsuarioUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Usuario Ult Mod" caption="Usuario Ult Mod" required="False" unique="False" wizardSize="25" wizardMaxLength="25" PathID="mc_info_rs_cr_RE_RC_Artef1UsuarioUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="200" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaEntrega" fieldSource="FechaEntrega" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Fecha Entrega" caption="Fecha Entrega" required="True" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_info_rs_cr_RE_RC_Artef1FechaEntrega" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="201" show_weekend="True" name="InlineDatePicker2" category="jQuery" enabled="True">
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
				<TextArea id="205" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="Comentarios" fieldSource="Comentarios" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Comentarios" caption="Comentarios" required="False" unique="False" wizardSize="50" wizardRows="3" PathID="mc_info_rs_cr_RE_RC_Artef1Comentarios">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="193" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ID_PPMC" fieldSource="ID_PPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="ID PPMC" caption="ID PPMC" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_RE_RC_Artef1ID_PPMC">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="214" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="231" fieldSourceType="DBColumn" dataType="Text" name="Id_Padre" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_cr_RE_RC_Artef1Id_Padre" fieldSource="Id_Padre">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="232" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextArea id="195" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Descripcion" fieldSource="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Descripcion" caption="Descripcion" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="mc_info_rs_cr_RE_RC_Artef1Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="194" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Nombre" fieldSource="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Nombre" caption="Nombre" required="True" unique="False" wizardSize="50" wizardMaxLength="50" PathID="mc_info_rs_cr_RE_RC_Artef1Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="196" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Formato" fieldSource="Formato" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Formato" caption="Formato" required="False" unique="False" wizardSize="20" wizardMaxLength="20" PathID="mc_info_rs_cr_RE_RC_Artef1Formato">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="198" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaEstFin" fieldSource="FechaEstFin" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Fecha Est Fin" caption="Fecha Compromiso" required="True" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_info_rs_cr_RE_RC_Artef1FechaEstFin" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="199" show_weekend="True" name="JDateTimePicker1" category="jQuery" enabled="True">
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
				<TextBox id="197" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NombreConHerramienta" fieldSource="NombreConHerramienta" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Nombre Con Herramienta" caption="Nombre en Herramienta" required="True" unique="False" wizardSize="50" wizardMaxLength="50" PathID="mc_info_rs_cr_RE_RC_Artef1NombreConHerramienta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="202" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DiasHabilesDesviacion" fieldSource="DiasHabilesDesviacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Dias Habiles Desviacion" caption="Dias Habiles Desviacion" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_RE_RC_Artef1DiasHabilesDesviacion" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="203" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DiasNaturalesDesviacion" fieldSource="DiasNaturalesDesviacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Dias Naturales Desviacion" caption="Dias Naturales Desviacion" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_RE_RC_Artef1DiasNaturalesDesviacion" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="277" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="Pct" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_cr_RE_RC_Artef1Pct" fieldSource="Pct">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="269" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="lblDeductiva" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_cr_RE_RC_Artef1lblDeductiva" visible="Yes" fieldSource="PctDeductiva" format="0.000">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="270"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="304" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="mc_info_rs_cr_RE_RC_Artef1Button_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="305" message="Borrar registro?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events>
				<Event name="BeforeInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="215"/>
					</Actions>
				</Event>
				<Event name="BeforeUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="216"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="317"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="212" conditionType="Parameter" useIsNull="False" field="Id" parameterSource="Id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="213" tableName="mc_info_rs_cr_RE_RC_Artefacto"/>
			</JoinTables>
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
		<Label id="32" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lDocs" PathID="lDocs">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Label id="319" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lErrores" PathID="lErrores">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Link id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkReqFun" PathID="lkReqFun" hrefSource="PPMCsCumpReqFunDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cumplimiento de&lt;br&gt;        Requisitos Funcionales','textSourceDB':'','hrefSource':'PPMCsCumpReqFunDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'2':{'sourceType':'URL','parameterSource':'1','parameterName':'src'},'3':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'4':{'sourceType':'Expression','parameterSource':'1','parameterName':'src'},'5':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'6':{'sourceType':'Expression','parameterSource':'1','parameterName':'src'},'length':7,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="361" sourceType="URL" format="yyyy-mm-dd" name="Id" source="sID"/>
				<LinkParameter id="139" sourceType="Expression" name="src" source="1"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkCalidad" PathID="lkCalidad" hrefSource="PPMCsCrbCalidad.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Calidad de&lt;br&gt;        Productos Terminados','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'length':2,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="132" sourceType="URL" format="yyyy-mm-dd" name="Id" source="sID"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="133" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkRetEnt_Calidad" PathID="lkRetEnt_Calidad" hrefSource="PPMCsCrbDetalle2.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Retraso en entregables','textSourceDB':'','hrefSource':'PPMCsCrbDetalle2.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'2':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'3':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'4':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'5':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'6':{'sourceType':'URL','parameterSource':'sID','parameterName':'sID'},'length':7,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="367" sourceType="URL" format="yyyy-mm-dd" name="sID" source="sID"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="370" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkCalidadCod" PathID="lkCalidadCod" hrefSource="PPMCsCrCalCodDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Calidad de Código','textSourceDB':'','hrefSource':'PPMCsCrCalCodDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'2':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'length':3,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="371" sourceType="URL" format="yyyy-mm-dd" name="Id" source="sID"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="Link1" PathID="Link1" hrefSource="PPMCsDefFugDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Defectos Fugados&lt;br&gt;        a Producción','textSourceDB':'','hrefSource':'PPMCsDefFugDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'sId','parameterName':'Id'},'2':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'length':3,'objectType':'linkParameters'}}" removeParameters="Observaciones">
			<Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="138" sourceType="URL" format="yyyy-mm-dd" name="Id" source="sID"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<EditableGrid id="374" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="False" allowDelete="True" validateData="True" preserveParameters="GET" sourceType="Table" defaultPageSize="25" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_cr_RE_RC_Artef2" connection="cnDisenio" dataSource="mc_info_rs_cr_RE_RC_Artefacto" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="Lista de Artefactos" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="Id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="mc_info_rs_cr_RE_RC_Artef2" deleteControl="CheckBox_Delete">
			<Components>
				<Sorter id="378" visible="True" name="Sorter_Id" column="Id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="Id" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_Artef2Sorter_Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="379" visible="True" name="Sorter_Nombre" column="Nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="Nombre" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_Artef2Sorter_Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="380" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_Artef2Sorter_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="381" visible="True" name="Sorter_Formato" column="Formato" wizardCaption="Formato" wizardSortingType="SimpleDir" wizardControl="Formato" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_Artef2Sorter_Formato">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="382" visible="True" name="Sorter_NombreConHerramienta" column="NombreConHerramienta" wizardCaption="Nombre Con Herramienta" wizardSortingType="SimpleDir" wizardControl="NombreConHerramienta" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_Artef2Sorter_NombreConHerramienta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="383" visible="True" name="Sorter_FechaEstFin" column="FechaEstFin" wizardCaption="Fecha Est Fin" wizardSortingType="SimpleDir" wizardControl="FechaEstFin" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_Artef2Sorter_FechaEstFin">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="384" visible="True" name="Sorter_FechaEntrega" column="FechaEntrega" wizardCaption="Fecha Entrega" wizardSortingType="SimpleDir" wizardControl="FechaEntrega" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_Artef2Sorter_FechaEntrega">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="385" visible="True" name="Sorter_DiasHabilesDesviacion" column="DiasHabilesDesviacion" wizardCaption="Dias Habiles Desviacion" wizardSortingType="SimpleDir" wizardControl="DiasHabilesDesviacion" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_Artef2Sorter_DiasHabilesDesviacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="386" visible="True" name="Sorter_DiasNaturalesDesviacion" column="DiasNaturalesDesviacion" wizardCaption="Dias Naturales Desviacion" wizardSortingType="SimpleDir" wizardControl="DiasNaturalesDesviacion" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_Artef2Sorter_DiasNaturalesDesviacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="387" visible="True" name="Sorter_PctDeductiva" column="PctDeductiva" wizardCaption="Pct Deductiva" wizardSortingType="SimpleDir" wizardControl="PctDeductiva" wizardAddNbsp="False" PathID="mc_info_rs_cr_RE_RC_Artef2Sorter_PctDeductiva">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="388" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="Id" fieldSource="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id" hrefSource="PPMCsCrbDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'Id','hrefSource':'PPMCsCrbDetalle.ccp','hrefSourceDB':'Id','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'length':2,'objectType':'linkParameters'}}" PathID="mc_info_rs_cr_RE_RC_Artef2Id" urlType="Relative">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="389" sourceType="DataField" format="yyyy-mm-dd" name="Id" source="Id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="390" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Nombre" fieldSource="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Nombre" PathID="mc_info_rs_cr_RE_RC_Artef2Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="391" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Descripcion" PathID="mc_info_rs_cr_RE_RC_Artef2Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="392" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Formato" fieldSource="Formato" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Formato" PathID="mc_info_rs_cr_RE_RC_Artef2Formato">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="393" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="NombreConHerramienta" fieldSource="NombreConHerramienta" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Nombre Con Herramienta" PathID="mc_info_rs_cr_RE_RC_Artef2NombreConHerramienta">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="394" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaEstFin" fieldSource="FechaEstFin" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Fecha Est Fin" format="ShortDate" PathID="mc_info_rs_cr_RE_RC_Artef2FechaEstFin" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="395" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaEntrega" fieldSource="FechaEntrega" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Fecha Entrega" format="ShortDate" PathID="mc_info_rs_cr_RE_RC_Artef2FechaEntrega" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="396" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="DiasHabilesDesviacion" fieldSource="DiasHabilesDesviacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Dias Habiles Desviacion" PathID="mc_info_rs_cr_RE_RC_Artef2DiasHabilesDesviacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="397" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="DiasNaturalesDesviacion" fieldSource="DiasNaturalesDesviacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Dias Naturales Desviacion" PathID="mc_info_rs_cr_RE_RC_Artef2DiasNaturalesDesviacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="398" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="PctDeductiva" fieldSource="PctDeductiva" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Pct Deductiva" PathID="mc_info_rs_cr_RE_RC_Artef2PctDeductiva">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="399" fieldSourceType="DBColumn" dataType="Memo" html="False" generateSpan="False" name="Comentarios" fieldSource="Comentarios" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Comentarios" PathID="mc_info_rs_cr_RE_RC_Artef2Comentarios">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Panel id="400" visible="True" generateDiv="False" name="CheckBox_Delete_Panel">
					<Components>
						<CheckBox id="401" visible="Dynamic" fieldSourceType="CodeExpression" dataType="Boolean" defaultValue="Unchecked" name="CheckBox_Delete" checkedValue="true" uncheckedValue="false" wizardCaption="Borrar" wizardAddNbsp="True" PathID="mc_info_rs_cr_RE_RC_Artef2CheckBox_Delete_PanelCheckBox_Delete">
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
				<Navigator id="402" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="Austere3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="403" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="mc_info_rs_cr_RE_RC_Artef2Button_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="405"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="376" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Id_Padre" logicOperator="And" parameterSource="sID" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="375" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="mc_info_rs_cr_RE_RC_Artefacto"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<PKFields>
				<PKField id="377" tableName="mc_info_rs_cr_RE_RC_Artefacto" fieldName="Id" dataType="Integer"/>
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
		<Link id="404" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="Link2" hrefSource="ListaEntregablesSharePoint.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Documentos en el Repositorio','textSourceDB':'','hrefSource':'ListaEntregablesSharePoint.ccp','hrefSourceDB':'','title':'','target':'_blank','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Panel id="408" visible="True" generateDiv="False" name="Panel1" wizardInnerHTML="&lt;form action=&quot;{ActionFileUpload}&quot; enctype=&quot;multipart/form-data&quot; method=&quot;post&quot;&gt;
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
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsCrbDetalle2_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsCrbDetalle2.php" forShow="True" url="PPMCsCrbDetalle2.php" comment="//" codePage="windows-1252"/>
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
		<Event name="AfterInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="318"/>
			</Actions>
		</Event>
	</Events>
</Page>
