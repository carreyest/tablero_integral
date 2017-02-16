<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_calificacion_rs_MC" connection="cnDisenio" dataSource="mc_calificacion_rs_MC" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Iduniverso" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Agregar/Editar Información de Requerimiento" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_calificacion_rs_MC" activeCollection="IFormElements" activeTableType="mc_calificacion_rs_MC" customInsert="mc_calificacion_rs_MC" customInsertType="Table">
			<Components>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_calificacion_rs_MCButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_calificacion_rs_MCButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="id_ppmc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Ppmc" caption="Id Ppmc" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_calificacion_rs_MCid_ppmc" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="9" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="NombreProveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Proveedor" caption="Id Proveedor" required="True" unique="False" connection="con_xls" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_rs_MCNombreProveedor" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre" html="False">
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
				</Label>
				<ListBox id="10" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="id_servicio_cont" fieldSource="id_servicio_cont" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Servicio Cont" caption="Servicio Contractual" required="True" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_rs_MCid_servicio_cont" dataSource="mc_c_ServContractual" boundColumn="Id" textColumn="Descripcion">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="114" conditionType="Parameter" useIsNull="False" dataType="Text" field="Aplica" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="113" posHeight="136" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_ServContractual"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="115" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="116" dataType="Integer" fieldName="Id" tableName="mc_c_ServContractual"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="11" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Integer" returnValueType="Number" name="id_servicio_negocio" fieldSource="id_servicio_negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Servicio Negocio" caption="Servicio de Negocio" required="True" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_rs_MCid_servicio_negocio" dataSource="select id_servicio, nombre
from mc_c_servicio where id_tipo_servicio=2
order by nombre" boundColumn="id_servicio" textColumn="nombre">
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
				<ListBox id="12" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="id_tipo" fieldSource="id_tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Tipo" caption="Tipo de Requerimiento" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_rs_MCid_tipo" dataSource="mc_c_TipoPPMC" boundColumn="Id" textColumn="Descripcion">
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
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="descripci_n" fieldSource="descripción" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Descripción" caption="Descripción" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_calificacion_rs_MCdescripci_n">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Obs_manuales" fieldSource="Obs_manuales" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Obs Manuales" caption="Obs Manuales" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_calificacion_rs_MCObs_manuales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="15" fieldSourceType="DBColumn" dataType="Integer" name="MesReporte" fieldSource="MesReporte" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Mes Reporte" caption="Mes Reporte" required="True" unique="False" PathID="mc_calificacion_rs_MCMesReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="16" fieldSourceType="DBColumn" dataType="Integer" name="AnioReporte" fieldSource="AnioReporte" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Anio Reporte" caption="Anio Reporte" required="True" unique="False" PathID="mc_calificacion_rs_MCAnioReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ppmc_adicional" fieldSource="ppmc_adicional" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Ppmc Adicional" caption="Ppmc Adicional" required="False" unique="False" wizardSize="20" wizardMaxLength="20" PathID="mc_calificacion_rs_MCppmc_adicional">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UrlEvidencia" fieldSource="UrlEvidencia" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Url Evidencia" caption="Url Evidencia" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_calificacion_rs_MCUrlEvidencia">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="UCOS" fieldSource="UCOS" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Unidades" caption="UCOS" required="True" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_calificacion_rs_MCUCOS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IdEstimacion" PathID="mc_calificacion_rs_MCIdEstimacion" caption="Id de Estimacion" fieldSource="IdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="107" fieldSourceType="DBColumn" dataType="Integer" name="id_proveedor" PathID="mc_calificacion_rs_MCid_proveedor" fieldSource="id_proveedor" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="108" fieldSourceType="DBColumn" dataType="Text" name="hdid_ppmc" PathID="mc_calificacion_rs_MChdid_ppmc" fieldSource="id_ppmc" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="148" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="UDX" PathID="mc_calificacion_rs_MCUDX" fieldSource="UDX" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="149" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="USP" PathID="mc_calificacion_rs_MCUSP" fieldSource="USP" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="150" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="UDA" PathID="mc_calificacion_rs_MCUDA" fieldSource="UDA" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="161" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lReportado" PathID="mc_calificacion_rs_MClReportado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="162" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="UST" PathID="mc_calificacion_rs_MCUST" fieldSource="UST" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="163" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="UPL" PathID="mc_calificacion_rs_MCUPL" fieldSource="UPL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="23"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="141" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Iduniverso" logicOperator="And" parameterSource="Id" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="167" tableName="mc_calificacion_rs_MC"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="142" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="143" dataType="Integer" fieldName="ID" tableName="mc_calificacion_rs_MC"/>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="81" field="id_servicio_cont" dataType="Integer" parameterType="Control" parameterSource="id_servicio_cont" omitIfEmpty="True"/>
				<CustomParameter id="82" field="id_servicio_negocio" dataType="Integer" parameterType="Control" parameterSource="id_servicio_negocio" omitIfEmpty="True"/>
				<CustomParameter id="83" field="id_tipo" dataType="Integer" parameterType="Control" parameterSource="id_tipo" omitIfEmpty="True"/>
				<CustomParameter id="84" field="descripción" dataType="Text" parameterType="Control" parameterSource="descripci_n" omitIfEmpty="True"/>
				<CustomParameter id="85" field="Obs_manuales" dataType="Text" parameterType="Control" parameterSource="Obs_manuales" omitIfEmpty="True"/>
				<CustomParameter id="86" field="MesReporte" dataType="Integer" parameterType="Control" parameterSource="MesReporte" omitIfEmpty="True"/>
				<CustomParameter id="87" field="AnioReporte" dataType="Integer" parameterType="Control" parameterSource="AnioReporte" omitIfEmpty="True"/>
				<CustomParameter id="88" field="ppmc_adicional" dataType="Text" parameterType="Control" parameterSource="ppmc_adicional" omitIfEmpty="True"/>
				<CustomParameter id="89" field="UrlEvidencia" dataType="Text" parameterType="Control" parameterSource="UrlEvidencia" omitIfEmpty="True"/>
				<CustomParameter id="92" field="Iduniverso" dataType="Integer" parameterType="URL" parameterSource="Id" omitIfEmpty="True"/>
				<CustomParameter id="117" field="id_ppmc" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="hdid_ppmc"/>
				<CustomParameter id="118" field="id_proveedor" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="id_proveedor"/>
				<CustomParameter id="152" field="IdEstimacion" dataType="Text" parameterType="Control" parameterSource="IdEstimacion" omitIfEmpty="True"/>
				<CustomParameter id="153" field="UDX" dataType="Float" parameterType="Control" parameterSource="UDX" omitIfEmpty="True"/>
				<CustomParameter id="154" field="USP" dataType="Float" parameterType="Control" parameterSource="USP" omitIfEmpty="True"/>
				<CustomParameter id="155" field="UDA" dataType="Float" parameterType="Control" parameterSource="UDA" omitIfEmpty="True"/>
				<CustomParameter id="156" field="UCOS" dataType="Float" parameterType="Control" omitIfEmpty="True" parameterSource="UCOS"/>
				<CustomParameter id="165" field="UST" dataType="Float" parameterType="Control" omitIfEmpty="True" parameterSource="UST"/>
				<CustomParameter id="166" field="UPL" dataType="Float" parameterType="Control" omitIfEmpty="True" parameterSource="UPL"/>
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
		<Link id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkReqFun" PathID="lkReqFun" hrefSource="PPMCsCumpReqFunDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cumplimiento de&lt;br&gt;            Requisitos Funcionales','textSourceDB':'','hrefSource':'PPMCsCumpReqFunDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'2':{'sourceType':'URL','parameterSource':'1','parameterName':'src'},'3':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'4':{'sourceType':'Expression','parameterSource':'1','parameterName':'src'},'length':5,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="130" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
				<LinkParameter id="139" sourceType="Expression" name="src" source="1"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkCalidad" PathID="lkCalidad" hrefSource="PPMCsCrbCalidad.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Calidad de&lt;br&gt;            Productos Terminados','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'2':{'sourceType':'Expression','parameterSource':'1','parameterName':'src'},'length':3,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="132" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
				<LinkParameter id="160" sourceType="Expression" name="src" source="1"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="133" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkRetEnt_Calidad" PathID="lkRetEnt_Calidad" hrefSource="PPMCsCrbDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Retraso en Entregables/&lt;br&gt;            Completar Tareas en Ruta Crítica','textSourceDB':'','hrefSource':'PPMCsCrbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'2':{'sourceType':'URL','parameterSource':'Id','parameterName':'sID'},'3':{'sourceType':'Expression','parameterSource':'1','parameterName':'src'},'length':4,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="134" sourceType="URL" format="yyyy-mm-dd" name="sID" source="Id"/>
				<LinkParameter id="159" sourceType="Expression" name="src" source="1"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkCalidadCodigo" PathID="lkCalidadCodigo" hrefSource="PPMCsCrCalCodDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{&quot;textSource&quot;:&quot;Calidad de Código&quot;,&quot;textSourceDB&quot;:&quot;&quot;,&quot;hrefSource&quot;:&quot;PPMCsCrCalCodDetalle.ccp&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;0&quot;:{&quot;sourceType&quot;:&quot;URL&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;1&quot;:{&quot;sourceType&quot;:&quot;URL&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;2&quot;:{&quot;sourceType&quot;:&quot;Expression&quot;,&quot;parameterSource&quot;:&quot;1&quot;,&quot;parameterName&quot;:&quot;src&quot;},&quot;3&quot;:{&quot;sourceType&quot;:&quot;URL&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;4&quot;:{&quot;sourceType&quot;:&quot;Expression&quot;,&quot;parameterSource&quot;:&quot;1&quot;,&quot;parameterName&quot;:&quot;src&quot;},&quot;length&quot;:5,&quot;objectType&quot;:&quot;linkParameters&quot;}}">
			<Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="136" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
				<LinkParameter id="158" sourceType="Expression" name="src" source="1"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="PPMCsDefFugDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Defectos Fugados&lt;br&gt;            a Producción','textSourceDB':'','hrefSource':'PPMCsDefFugDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'2':{'sourceType':'Expression','parameterSource':'1','parameterName':'src'},'length':3,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters>
				<LinkParameter id="138" sourceType="URL" format="yyyy-mm-dd" name="Id" source="Id"/>
				<LinkParameter id="157" sourceType="Expression" name="src" source="1"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="144" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkAnterior" PathID="lkAnterior" hrefSource="PPMCsCrbCalidad.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'lkAnterior','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="146" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkSiguiente" PathID="lkSiguiente" hrefSource="PPMCsCrbCalidad.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'lkSiguiente','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsCrInfoGeneral.php" forShow="True" url="PPMCsCrInfoGeneral.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsCrInfoGeneral_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="22" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="147"/>
			</Actions>
		</Event>
	</Events>
</Page>
