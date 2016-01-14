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
		<Record id="27" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_CC" connection="cnDisenio" dataSource="mc_info_rs_CC" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Calificar Calidad de Código" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_info_rs_CC" activeCollection="IFormElements" activeTableType="mc_info_rs_CC" customInsertType="Table" customInsert="mc_info_rs_CC" customUpdateType="Table" customUpdate="mc_info_rs_CC">
			<Components>
				<Button id="29" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_info_rs_CCButton_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="182"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="30" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_info_rs_CCButton_Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="211"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="33" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Id_PPMC" fieldSource="Id_PPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id PPMC" wizardAddNbsp="True" PathID="mc_info_rs_CCId_PPMC">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="46"/>
							</Actions>
						</Event>
					</Events>
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
				<ListBox id="36" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="CumpleCalidadCod" fieldSource="CumpleCalidadCod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Calidad Cod" caption="Cumple Calidad Cod" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_info_rs_CCCumpleCalidadCod" dataSource="-1;No Aplica;1;Cumplio;0;No Cumplio">
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
				<Hidden id="38" fieldSourceType="DBColumn" dataType="Date" name="FechaUltMod" fieldSource="FechaUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Fecha Ult Mod" caption="Fecha Ult Mod" required="False" format="yyyy-mm-dd HH:nn" unique="False" PathID="mc_info_rs_CCFechaUltMod" defaultValue="date(&quot;Y-m-d H:i&quot;)" DBFormat="yyyy-mm-dd HH:nn:ss.S">
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
				<Hidden id="165" fieldSourceType="DBColumn" dataType="Text" name="Id_PPMC_HID" PathID="mc_info_rs_CCId_PPMC_HID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="166" fieldSourceType="DBColumn" dataType="Text" name="ID_Estimacion_HID" PathID="mc_info_rs_CCID_Estimacion_HID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="194" fieldSourceType="DBColumn" dataType="Text" name="mesMed" PathID="mc_info_rs_CCmesMed">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="195" fieldSourceType="DBColumn" dataType="Text" name="anioMed" PathID="mc_info_rs_CCanioMed">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="45"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="167"/>
					</Actions>
				</Event>
				<Event name="BeforeInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="168"/>
					</Actions>
				</Event>
				<Event name="BeforeUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="169"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="170"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="181"/>
					</Actions>
				</Event>
				<Event name="AfterInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="198"/>
					</Actions>
				</Event>
				<Event name="AfterUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="199"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="207" conditionType="Parameter" useIsNull="False" dataType="Integer" field="IdUniverso" logicOperator="And" orderNumber="1" parameterSource="Id" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="213" tableName="mc_info_rs_CC"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="208" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="209" dataType="Integer" fieldName="Id" tableName="mc_info_rs_CC"/>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="157" field="PctReglas" dataType="Float" parameterType="Control" parameterSource="PctReglas" format="#.##" omitIfEmpty="True"/>
				<CustomParameter id="158" field="CumpleCalidadCod" dataType="Integer" parameterType="Control" parameterSource="CumpleCalidadCod" omitIfEmpty="True"/>
				<CustomParameter id="159" field="UsuarioUltMod" dataType="Text" parameterType="Control" parameterSource="UsuarioUltMod" omitIfEmpty="True"/>
				<CustomParameter id="160" field="FechaUltMod" dataType="Date" parameterType="Control" parameterSource="FechaUltMod" format="ShortDate" omitIfEmpty="True"/>
				<CustomParameter id="161" field="Observaciones" dataType="Text" parameterType="Control" parameterSource="Observaciones" omitIfEmpty="True"/>
				<CustomParameter id="162" field="PctMetricas" dataType="Float" parameterType="Control" parameterSource="PctMetricas" format="#.##" omitIfEmpty="True"/>
				<CustomParameter id="163" field="Id_PPMC" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Id_PPMC_HID"/>
				<CustomParameter id="164" field="ID_Estimacion" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="ID_Estimacion_HID"/>
				<CustomParameter id="204" field="IdUniverso" dataType="Integer" parameterType="URL" omitIfEmpty="True" parameterSource="Id"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="205" conditionType="Parameter" useIsNull="False" field="IdUniverso" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="Id"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="183" field="PctReglas" dataType="Float" parameterType="Control" omitIfEmpty="True" parameterSource="PctReglas"/>
				<CustomParameter id="187" field="Id_PPMC" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="Id_PPMC_HID"/>
				<CustomParameter id="188" field="ID_Estimacion" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="ID_Estimacion_HID"/>
				<CustomParameter id="189" field="PctMetricas" dataType="Float" parameterType="Control" omitIfEmpty="True" parameterSource="PctMetricas"/>
				<CustomParameter id="190" field="CumpleCalidadCod" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="CumpleCalidadCod"/>
				<CustomParameter id="191" field="UsuarioUltMod" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="UsuarioUltMod"/>
				<CustomParameter id="192" field="FechaUltMod" dataType="Date" parameterType="Control" omitIfEmpty="True" parameterSource="FechaUltMod"/>
				<CustomParameter id="193" field="Observaciones" dataType="Text" parameterType="Control" omitIfEmpty="True" parameterSource="Observaciones"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="47" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="CalidadCodigoMetricas" connection="ConnCarga" dataSource="CalidadCodigoMetricas" pageSizeLimit="100" pageSize="True" wizardCaption=" Calidad Codigo Metricas" wizardTheme="Austere4" wizardThemeApplyTo="Component" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay Registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="CalidadCodigoMetricas" wizardThemeVersion="3.0">
			<Components>
				<Sorter id="49" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="CalidadCodigoMetricasSorter_Paquete" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="50" visible="True" name="Sorter_N_mero_del_Aplicativo" column="[Número del Aplicativo]" wizardCaption="Número Del Aplicativo" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="N_mero_del_Aplicativo" wizardAddNbsp="False" PathID="CalidadCodigoMetricasSorter_N_mero_del_Aplicativo" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="51" visible="True" name="Sorter_Servicio_de_Negocio" column="[Servicio de Negocio]" wizardCaption="Servicio De Negocio" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="Servicio_de_Negocio" wizardAddNbsp="False" PathID="CalidadCodigoMetricasSorter_Servicio_de_Negocio" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="52" visible="True" name="Sorter_Tipo_de_requerimiento" column="[Tipo de requerimiento]" wizardCaption="Tipo De Requerimiento" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="Tipo_de_requerimiento" wizardAddNbsp="False" PathID="CalidadCodigoMetricasSorter_Tipo_de_requerimiento" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="53" visible="True" name="Sorter_Nombre_del_CDS" column="[Nombre del CDS]" wizardCaption="Nombre Del CDS" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="Nombre_del_CDS" wizardAddNbsp="False" PathID="CalidadCodigoMetricasSorter_Nombre_del_CDS" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="54" visible="True" name="Sorter_Porcentaje_de_calidad_m_tricas" column="[Porcentaje de calidad métricas]" wizardCaption="Porcentaje De Calidad Métricas" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="Porcentaje_de_calidad_m_tricas" wizardAddNbsp="False" PathID="CalidadCodigoMetricasSorter_Porcentaje_de_calidad_m_tricas" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="56" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardCaption="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoMetricasPaquete" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="58" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="N_mero_del_Aplicativo" fieldSource="Número_del Aplicativo" wizardCaption="Número Del Aplicativo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoMetricasN_mero_del_Aplicativo" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="60" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Servicio_de_Negocio" fieldSource="Servicio_de Negocio" wizardCaption="Servicio De Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoMetricasServicio_de_Negocio" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="62" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Tipo_de_requerimiento" fieldSource="Tipo_de requerimiento" wizardCaption="Tipo De Requerimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoMetricasTipo_de_requerimiento" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="64" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Nombre_del_CDS" fieldSource="Nombre_del CDS" wizardCaption="Nombre Del CDS" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoMetricasNombre_del_CDS" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="66" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="Porcentaje_de_calidad_m_tricas" fieldSource="Porcentaje_de calidad métricas" wizardCaption="Porcentaje De Calidad Métricas" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoMetricasPorcentaje_de_calidad_m_tricas" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="67" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardTheme="Austere4" wizardImagesScheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="100"/>
					</Actions>
				</Event>
				<Event name="BeforeBuildSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="101"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables>
				<JoinTable id="196" tableName="CalidadCodigoMetricas"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="117" fieldName="Paquete" tableName="CalidadCodigoMetricas"/>
				<Field id="118" alias="Número_del Aplicativo" fieldName="[Número del Aplicativo]" tableName="CalidadCodigoMetricas"/>
				<Field id="119" alias="Servicio_de Negocio" fieldName="[Servicio de Negocio]" tableName="CalidadCodigoMetricas"/>
				<Field id="120" alias="Tipo_de requerimiento" fieldName="[Tipo de requerimiento]" tableName="CalidadCodigoMetricas"/>
				<Field id="121" alias="Nombre_del CDS" fieldName="[Nombre del CDS]" tableName="CalidadCodigoMetricas"/>
				<Field id="122" alias="Porcentaje_de calidad métricas" fieldName="[Porcentaje de calidad métricas]" tableName="CalidadCodigoMetricas"/>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="123" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="CalidadCodigoReglas" connection="ConnCarga" dataSource="CalidadCodigoReglas" pageSizeLimit="100" pageSize="True" wizardCaption="Reglas" wizardTheme="Austere4" wizardThemeApplyTo="Component" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay Registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="CalidadCodigoReglas" wizardThemeVersion="3.0">
			<Components>
				<Sorter id="125" visible="True" name="Sorter_PPMC" column="PPMC" wizardCaption="PPMC" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="PPMC" wizardAddNbsp="False" PathID="CalidadCodigoReglasSorter_PPMC" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="126" visible="True" name="Sorter_N_mero_del_Aplicativo" column="[Número del Aplicativo]" wizardCaption="Número Del Aplicativo" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="N_mero_del_Aplicativo" wizardAddNbsp="False" PathID="CalidadCodigoReglasSorter_N_mero_del_Aplicativo" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="127" visible="True" name="Sorter_Servicio_de_Negocio" column="[Servicio de Negocio]" wizardCaption="Servicio De Negocio" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="Servicio_de_Negocio" wizardAddNbsp="False" PathID="CalidadCodigoReglasSorter_Servicio_de_Negocio" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="129" visible="True" name="Sorter_Tipo_de_requerimiento" column="[Tipo de requerimiento]" wizardCaption="Tipo De Requerimiento" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="Tipo_de_requerimiento" wizardAddNbsp="False" PathID="CalidadCodigoReglasSorter_Tipo_de_requerimiento" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="130" visible="True" name="Sorter_Nombre_del_CDS" column="[Nombre del CDS]" wizardCaption="Nombre Del CDS" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="Nombre_del_CDS" wizardAddNbsp="False" PathID="CalidadCodigoReglasSorter_Nombre_del_CDS" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="131" visible="True" name="Sorter_Porcentaje_de_Calidad_de_C_digo" column="[Porcentaje de Calidad de Código]" wizardCaption="Porcentaje De Calidad De Código" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="Porcentaje_de_Calidad_de_C_digo" wizardAddNbsp="False" PathID="CalidadCodigoReglasSorter_Porcentaje_de_Calidad_de_C_digo" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="133" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="PPMC" fieldSource="PPMC" wizardCaption="PPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoReglasPPMC" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="135" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="N_mero_del_Aplicativo" fieldSource="Número_del Aplicativo" wizardCaption="Número Del Aplicativo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoReglasN_mero_del_Aplicativo" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="137" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Servicio_de_Negocio" fieldSource="Servicio_de Negocio" wizardCaption="Servicio De Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoReglasServicio_de_Negocio" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="141" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Tipo_de_requerimiento" fieldSource="Tipo_de requerimiento" wizardCaption="Tipo De Requerimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoReglasTipo_de_requerimiento" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="143" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Nombre_del_CDS" fieldSource="Nombre_del CDS" wizardCaption="Nombre Del CDS" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoReglasNombre_del_CDS" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="145" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="Porcentaje_de_Calidad_de_C_digo" fieldSource="Porcentaje_de Calidad de Código" wizardCaption="Porcentaje De Calidad De Código" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoReglasPorcentaje_de_Calidad_de_C_digo" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="146" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardTheme="Austere4" wizardImagesScheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="139" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardCaption="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CalidadCodigoReglasPaquete" wizardTheme="Austere4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="128" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardTheme="Austere4" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="CalidadCodigoReglasSorter_Paquete" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="147"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables>
				<JoinTable id="197" tableName="CalidadCodigoReglas"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="149" alias="Número_del Aplicativo" fieldName="[Número del Aplicativo]" tableName="CalidadCodigoReglas"/>
				<Field id="150" alias="Servicio_de Negocio" fieldName="[Servicio de Negocio]" tableName="CalidadCodigoReglas"/>
				<Field id="151" fieldName="Paquete" tableName="CalidadCodigoReglas"/>
				<Field id="152" alias="Tipo_de requerimiento" fieldName="[Tipo de requerimiento]" tableName="CalidadCodigoReglas"/>
				<Field id="153" alias="Nombre_del CDS" fieldName="[Nombre del CDS]" tableName="CalidadCodigoReglas"/>
				<Field id="154" alias="Porcentaje_de Calidad de Código" fieldName="[Porcentaje de Calidad de Código]" tableName="CalidadCodigoReglas"/>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
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
