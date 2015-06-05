<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Link id="3" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkAnterior" PathID="lkAnterior" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Lista','textSourceDB':'','hrefSource':'PPMCsDefFugDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" hrefSource="PPMCsDefFugDetalle.ccp">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkSiguiente" PathID="lkSiguiente" wizardUseTemplateBlock="False" linkProperties="{&quot;textSource&quot;:&quot;Lista&quot;,&quot;textSourceDB&quot;:&quot;&quot;,&quot;hrefSource&quot;:&quot;PPMCsDefFugDetalle.ccp&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;length&quot;:0,&quot;objectType&quot;:&quot;linkParameters&quot;}}" hrefSource="PPMCsDefFugDetalle.ccp">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkReqFun" PathID="lkReqFun" hrefSource="PPMCsCumpReqFunDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cumplimiento de&lt;br&gt;            Requisitos Funcionales','textSourceDB':'','hrefSource':'PPMCsCumpReqFunDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'2':{'sourceType':'URL','parameterSource':'1','parameterName':'src'},'3':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'4':{'sourceType':'Expression','parameterSource':'1','parameterName':'src'},'length':5,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="7" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
				<LinkParameter id="8" sourceType="Expression" name="src" source="1"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkCalidad" PathID="lkCalidad" hrefSource="PPMCsCrbCalidad.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Calidad de Productos Terminados','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'length':1,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="13" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkRetEnt_Calidad" PathID="lkRetEnt_Calidad" hrefSource="PPMCsCrbDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Retraso en Entregables/&lt;br&gt;Completar Tareas en Ruta Crítica','textSourceDB':'','hrefSource':'PPMCsCrbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'length':2,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="17" sourceType="URL" format="yyyy-mm-dd" name="sID" source="Id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkCalidadCod" PathID="lkCalidadCod" hrefSource="PPMCsCrCalCodDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Calidad de Código','textSourceDB':'','hrefSource':'PPMCsCrCalCodDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'length':2,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="21" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="Link1" PathID="Link1" hrefSource="PPMCsDefFugDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Defectos Fugados a Producción','textSourceDB':'','hrefSource':'PPMCsDefFugDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'length':1,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="25" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Record id="27" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_CC" connection="cnDisenio" dataSource="mc_info_rs_CC" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Calificar Calidad de Código" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_info_rs_CC">
			<Components>
				<Button id="29" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_info_rs_CCButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="30" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_info_rs_CCButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="32" fieldSourceType="DBColumn" dataType="Integer" name="Id" fieldSource="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Id" caption="Id" required="True" unique="False" PathID="mc_info_rs_CCId">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="33" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Id_PPMC" fieldSource="Id_PPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id PPMC" wizardAddNbsp="True" PathID="mc_info_rs_CCId_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="34" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ID_Estimacion" fieldSource="ID_Estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="ID Estimacion" wizardAddNbsp="True" PathID="mc_info_rs_CCID_Estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PctReglas" fieldSource="PctReglas" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Pct Calidad" caption="Pct Calidad" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_info_rs_CCPctReglas" format="#.##">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="36" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="CumpleCalidadCod" fieldSource="CumpleCalidadCod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Calidad Cod" caption="Cumple Calidad Cod" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_CCCumpleCalidadCod" dataSource=";No Aplica;1;Cumplio;0;No Cumplio">
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
				<Hidden id="37" fieldSourceType="DBColumn" dataType="Text" name="UsuarioUltMod" fieldSource="UsuarioUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Usuario Ult Mod" caption="Usuario Ult Mod" required="False" unique="False" PathID="mc_info_rs_CCUsuarioUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="38" fieldSourceType="DBColumn" dataType="Date" name="FechaUltMod" fieldSource="FechaUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Fecha Ult Mod" caption="Fecha Ult Mod" required="False" format="ShortDate" unique="False" PathID="mc_info_rs_CCFechaUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextArea id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Observaciones" fieldSource="Observaciones" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Observaciones" caption="Observaciones" required="False" unique="False" wizardSize="50" wizardRows="3" PathID="mc_info_rs_CCObservaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PctMetricas" PathID="mc_info_rs_CCPctMetricas" fieldSource="PctMetricas" format="#.##">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="41" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Id" logicOperator="And" orderNumber="1" parameterSource="Id" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="40" posHeight="180" posLeft="10" posTop="10" posWidth="143" tableName="mc_info_rs_CC"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="42" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="43" dataType="Integer" fieldName="Id" tableName="mc_info_rs_CC"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsCrCalCodDetalle.php" forShow="True" url="PPMCsCrCalCodDetalle.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsCrCalCodDetalle_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="26"/>
			</Actions>
		</Event>
	</Events>
</Page>
