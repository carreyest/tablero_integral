<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Label id="141" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lDocs" PathID="lDocs">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Record id="81" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_cr_calidad_capc" connection="cnDisenio" dataSource="mc_info_rs_cr_calidad_CAPC" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Calificar Calidad de Productos Terminados" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_info_rs_cr_calidad_capc">
			<Components>
				<Button id="83" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_info_rs_cr_calidad_capcButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="84" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_info_rs_cr_calidad_capcButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="id_ppmc" fieldSource="id_ppmc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Ppmc" caption="Id Ppmc" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_calidad_capcid_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="id_estimacion" fieldSource="id_estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Estimacion" caption="Id Estimacion" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_calidad_capcid_estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="90" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="IndiceCalidadDoc" fieldSource="IndiceCalidadDoc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Indice Calidad Doc" caption="Indice Calidad Doc" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_info_rs_cr_calidad_capcIndiceCalidadDoc" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DeductivaDoc" fieldSource="DeductivaDoc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Deductiva Doc" caption="Deductiva Doc" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_info_rs_cr_calidad_capcDeductivaDoc" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="99" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="CumpleCalidad" fieldSource="CumpleCalidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Calidad" caption="Cumple Calidad" required="False" unique="False" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_cr_calidad_capcCumpleCalidad" dataSource="1;Cumple;0;No Cumple">
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
				<TextArea id="100" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Observaciones" fieldSource="Observaciones" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Observaciones" caption="Observaciones" required="False" unique="False" wizardSize="50" wizardRows="3" PathID="mc_info_rs_cr_calidad_capcObservaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="101" fieldSourceType="DBColumn" dataType="Text" name="UsuarioUltMod" fieldSource="UsuarioUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Usuario Ult Mod" caption="Usuario Ult Mod" required="False" unique="False" PathID="mc_info_rs_cr_calidad_capcUsuarioUltMod" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="102" fieldSourceType="DBColumn" dataType="Date" name="FechaUltMod" fieldSource="FchaUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Fcha Ult Mod" caption="Fcha Ult Mod" required="False" format="yyyy-mm-dd HH:nn" unique="False" PathID="mc_info_rs_cr_calidad_capcFechaUltMod" DBFormat="yyyy-mm-dd HH:nn:ss.S" defaultValue="date(&quot;Y-m-d H:i&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="144" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sNombreProyecto" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_rs_cr_calidad_capcsNombreProyecto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="147" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbIdEstimacion" PathID="mc_info_rs_cr_calidad_capclbIdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="150" fieldSourceType="DBColumn" dataType="Text" name="hdId" PathID="mc_info_rs_cr_calidad_capchdId" defaultValue="CCGetParam(&quot;Id&quot;)" fieldSource="id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="158" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Text" returnValueType="Number" name="lsServNegocio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_cr_calidad_capclsServNegocio" fieldSource="Id_Serv_Negocio" connection="cnDisenio" dataSource="select id_servicio, nombre
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
				<Hidden id="159" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="lsServContractual" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_cr_calidad_capclsServContractual" fieldSource="Id_Serv_Contractual" connection="cnDisenio" dataSource="mc_c_ServContractual" boundColumn="Id" textColumn="Descripcion" required="True" caption="Servicio Contractual">
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
				<Button id="253" urlType="Relative" enableValidation="True" isDefault="False" name="btnCalcula" PathID="mc_info_rs_cr_calidad_capcbtnCalcula" operation="Insert" returnPage="PPMCsCrbCalidadCAPC.ccp">
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
				<Label id="148" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbIdPPMC" PathID="mc_info_rs_cr_calidad_capclbIdPPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="98" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DeductivaTot" fieldSource="DeductivaTot" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Deductiva Tot" caption="Deductiva Tot" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_info_rs_cr_calidad_capcDeductivaTot">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="315" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbServNegocio" PathID="mc_info_rs_cr_calidad_capclbServNegocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="316" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbServContractual" PathID="mc_info_rs_cr_calidad_capclbServContractual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="319" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lReportado" PathID="mc_info_rs_cr_calidad_capclReportado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="329" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="hallazgo_errores_ort" PathID="mc_info_rs_cr_calidad_capchallazgo_errores_ort" fieldSource="hallazgos_errores_ortogr">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="330" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="hallazgo_formato_incorrecto" PathID="mc_info_rs_cr_calidad_capchallazgo_formato_incorrecto" fieldSource="hallazgos_formato_incorrecto">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="331" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="hallazgo_falta_vinculo" PathID="mc_info_rs_cr_calidad_capchallazgo_falta_vinculo" fieldSource="hallazgos_falta_vinculo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Label id="145" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sTipoRequerimiento" PathID="mc_info_rs_cr_calidad_capcsTipoRequerimiento">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<TextBox id="335" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="hallazgo_doc_incorrecta" PathID="mc_info_rs_cr_calidad_capchallazgo_doc_incorrecta" fieldSource="hallazgos_doc_incorrecta">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="336" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="hallazgo_incumpl_acept" PathID="mc_info_rs_cr_calidad_capchallazgo_incumpl_acept" fieldSource="hallazgos_incumpl_acept">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="337" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="defectos_errores_ort" PathID="mc_info_rs_cr_calidad_capcdefectos_errores_ort" fieldSource="defectos_errores_ortogr">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="338" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="defectos_formato_incorrecto" PathID="mc_info_rs_cr_calidad_capcdefectos_formato_incorrecto" fieldSource="defectos_formato_incorrecto">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="339" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="defectos_falta_vinculo" PathID="mc_info_rs_cr_calidad_capcdefectos_falta_vinculo" fieldSource="defectos_falta_vinculo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="340" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="defectos_incumpl_acept" PathID="mc_info_rs_cr_calidad_capcdefectos_incumpl_acept" fieldSource="defectos_incumpl_acept">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="341" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="defectos_doc_incorrecta" PathID="mc_info_rs_cr_calidad_capcdefectos_doc_incorrecta" fieldSource="defectos_doc_incorrecta">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="342" urlType="Relative" enableValidation="True" isDefault="False" name="btnCalculaUpdate" operation="Update" PathID="mc_info_rs_cr_calidad_capcbtnCalculaUpdate">
<Components/>
<Events>
<Event name="OnClick" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="343"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Button>
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
				<TableParameter id="333" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id" logicOperator="And" orderNumber="1" parameterSource="Id" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="334" tableName="mc_info_rs_cr_calidad_CAPC"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<PKFields>
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
		<Link id="164" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkAnterior" PathID="lkAnterior" hrefSource="PPMCsCrbCalidadCAPC.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'lkAnterior','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="165" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkSiguiente" PathID="lkSiguiente" hrefSource="PPMCsCrbCalidadCAPC.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'lkSiguiente','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkReqFun" PathID="lkReqFun" hrefSource="PPMCsCumpReqFunDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cumplimiento de&lt;br&gt;            Requisitos Funcionales','textSourceDB':'','hrefSource':'PPMCsCumpReqFunDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'2':{'sourceType':'URL','parameterSource':'1','parameterName':'src'},'3':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'4':{'sourceType':'Expression','parameterSource':'1','parameterName':'src'},'length':5,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="130" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
				<LinkParameter id="139" sourceType="Expression" name="src" source="1"/>
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
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsCrbCalidadCAPC_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsCrbCalidadCAPC.php" forShow="True" url="PPMCsCrbCalidadCAPC.php" comment="//" codePage="windows-1252"/>
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
