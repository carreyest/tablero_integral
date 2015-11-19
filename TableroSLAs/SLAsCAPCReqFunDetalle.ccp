<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_cr_RF" connection="cnDisenio" dataSource="mc_info_capc_cr_RF" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Cumplimiento de Requisitos Funcionales" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_info_rs_cr_RF">
			<Components>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_info_rs_cr_RFButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_info_rs_cr_RFButton_Update" returnPage="SLAsCAPCReqFunDetalle.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="8" fieldSourceType="DBColumn" dataType="Integer" name="Id_PPMC" fieldSource="Id_PPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Id PPMC" caption="Id PPMC" required="True" unique="False" PathID="mc_info_rs_cr_RFId_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="9" fieldSourceType="DBColumn" dataType="Integer" name="ID_Estimacion" fieldSource="ID_Estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="ID Estimacion" caption="ID Estimacion" required="True" unique="False" PathID="mc_info_rs_cr_RFID_Estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="Puntuacion" fieldSource="Puntuacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Puntuacion" caption="Puntuacion" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_info_rs_cr_RFPuntuacion">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="22"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="URLRepositorio" fieldSource="URLRepositorio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="URLRepositorio" caption="URLRepositorio" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_info_rs_cr_RFURLRepositorio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaSubida" fieldSource="FechaSubida" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Fecha Subida" caption="Fecha Subida" required="False" format="dd/mm/yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_info_rs_cr_RFFechaSubida" DBFormat="yyyy-mm-dd HH:nn:ss.S" defaultValue="CurrentDate">
					<Components/>
					<Events>
						<Event name="OnChange" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="31"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features>
						<JDateTimePicker id="14" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
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
				<ListBox id="15" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="CumpleReqFun" fieldSource="CumpleReqFun" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Req Fun" caption="Cumple Req Fun" required="False" unique="False" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_cr_RFCumpleReqFun" dataSource="1;Cumple;0;No Cumple">
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
				<TextArea id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Observaciones" fieldSource="Observaciones" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Observaciones" caption="Observaciones" required="False" unique="False" wizardSize="50" wizardRows="3" PathID="mc_info_rs_cr_RFObservaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="17" fieldSourceType="DBColumn" dataType="Text" name="UsuarioUltMod" fieldSource="UsuarioUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Usuario Ult Mod" caption="Usuario Ult Mod" required="False" unique="False" PathID="mc_info_rs_cr_RFUsuarioUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="18" fieldSourceType="DBColumn" dataType="Date" name="FechaUltMod" fieldSource="FechaUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Fecha Ult Mod" caption="Fecha Ult Mod" required="False" format="ShortDate" unique="False" PathID="mc_info_rs_cr_RFFechaUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sId_PPMC" PathID="mc_info_rs_cr_RFsId_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sID_Estimacion" PathID="mc_info_rs_cr_RFsID_Estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="TienePonderacion" PathID="mc_info_rs_cr_RFTienePonderacion" fieldSource="TienePonderacion">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="34"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</CheckBox>
				<CheckBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="TieneCalificacion" PathID="mc_info_rs_cr_RFTieneCalificacion" fieldSource="TieneCalificacion">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="33"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</CheckBox>
				<CheckBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="ListaenPDF" PathID="mc_info_rs_cr_RFListaenPDF" fieldSource="ListaenPDF">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="32"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Hidden id="35" fieldSourceType="DBColumn" dataType="Text" name="Id" PathID="mc_info_rs_cr_RFId" fieldSource="Id" defaultValue="CCGetParam(&quot;sID&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<CheckBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="ListaenCAES" PathID="mc_info_rs_cr_RFListaenCAES" fieldSource="ListaenCAES">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="41"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="PublicacionCAES" PathID="mc_info_rs_cr_RFPublicacionCAES" features="(assigned)" format="dd/mm/yyyy" DBFormat="yyyy-mm-dd" fieldSource="PublicacionCAES">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="43" show_weekend="True" name="InlineDatePicker2" category="jQuery">
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
				<Hidden id="48" fieldSourceType="DBColumn" dataType="Text" name="hdMes" PathID="mc_info_rs_cr_RFhdMes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="49" fieldSourceType="DBColumn" dataType="Text" name="hdAnio" PathID="mc_info_rs_cr_RFhdAnio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="50" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sNombreProyecto" PathID="mc_info_rs_cr_RFsNombreProyecto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="51" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lTipoRequerimiento" PathID="mc_info_rs_cr_RFlTipoRequerimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="TotalRequisitos" fieldSource="TotalRequisitos" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Total Requisitos" caption="Total Requisitos" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_RFTotalRequisitos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="78" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lReportado" PathID="mc_info_rs_cr_RFlReportado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="19"/>
					</Actions>
				</Event>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="23"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="52"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="53"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="84" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Id" logicOperator="And" orderNumber="1" parameterSource="sID" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="87" tableName="mc_info_capc_cr_RF"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="85" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="86" dataType="Integer" fieldName="Id" tableName="mc_info_capc_cr_RF"/>
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
		<Link id="88" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkAnterior" PathID="lkAnterior" hrefSource="SLAsCAPCReqFunDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Anterior','textSourceDB':'','hrefSource':'SLAsCAPCReqFunDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="90" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkSiguiente" PathID="lkSiguiente" hrefSource="SLAsCAPCReqFunDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Siguiente','textSourceDB':'','hrefSource':'SLAsCAPCReqFunDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="97" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkCalidad" PathID="lkCalidad" hrefSource="PPMCsCrbCalidadCAPC.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Calidad de&lt;br&gt;      Productos Terminados','textSourceDB':'','hrefSource':'PPMCsCrbCalidadCAPC.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'length':4,'objectType':'linkParameters','2':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'3':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'}}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="98" sourceType="URL" format="yyyy-mm-dd" name="Id" source="sID"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="101" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkDeductiva" PathID="lkDeductiva" hrefSource="SLAsCAPCDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Deductivas por Omisión','textSourceDB':'','hrefSource':'SLAsCAPCDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'2':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'3':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'length':6,'objectType':'linkParameters','4':{'sourceType':'URL','parameterSource':'sID','parameterName':'id'},'5':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'}}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="102" sourceType="URL" format="yyyy-mm-dd" name="id" source="sID"/>
				<LinkParameter id="103" sourceType="URL" name="Id" source="Id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="107" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkRetraso" PathID="lkRetraso" hrefSource="SLAsCAPCRetEnt.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Retraso en entregables','textSourceDB':'','hrefSource':'SLAsCAPCRetEnt.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'2':{'sourceType':'URL','parameterSource':'sID','parameterName':'Id'},'length':4,'objectType':'linkParameters','3':{'sourceType':'URL','parameterSource':'sID','parameterName':'id'}}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="108" sourceType="URL" format="yyyy-mm-dd" name="id" source="sID"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="SLAsCAPCReqFunDetalle_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="SLAsCAPCReqFunDetalle.php" forShow="True" url="SLAsCAPCReqFunDetalle.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="57" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="54"/>
			</Actions>
		</Event>
	</Events>
</Page>
