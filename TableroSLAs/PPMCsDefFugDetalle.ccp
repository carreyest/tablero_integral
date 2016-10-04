<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lDocs" PathID="lDocs">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Link id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkAnterior" PathID="lkAnterior" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Lista','textSourceDB':'','hrefSource':'PPMCsDefFugDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" hrefSource="PPMCsDefFugDetalle.ccp">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkSiguiente" PathID="lkSiguiente" wizardUseTemplateBlock="False" linkProperties="{&quot;textSource&quot;:&quot;Lista&quot;,&quot;textSourceDB&quot;:&quot;&quot;,&quot;hrefSource&quot;:&quot;PPMCsDefFugDetalle.ccp&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;length&quot;:0,&quot;objectType&quot;:&quot;linkParameters&quot;}}" hrefSource="PPMCsDefFugDetalle.ccp">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_rs_cr_deffug" connection="cnDisenio" dataSource="mc_info_rs_cr_deffug" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Calificar Defectos Fugados" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_info_rs_cr_deffug">
			<Components>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_info_rs_cr_deffugButton_Insert" returnPage="PPMCsDefFugDetalle.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_info_rs_cr_deffugButton_Update" returnPage="PPMCsDefFugDetalle.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="8" fieldSourceType="DBColumn" dataType="Integer" name="Id" fieldSource="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Id" caption="Id" required="True" unique="False" PathID="mc_info_rs_cr_deffugId">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Id_PPMC" fieldSource="Id_PPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id PPMC" caption="Id PPMC" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_deffugId_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="ID_Estimacion" fieldSource="ID_Estimacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="ID Estimacion" caption="ID Estimacion" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_deffugID_Estimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Incidentes" fieldSource="Incidentes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Incidentes" caption="Incidentes" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_info_rs_cr_deffugIncidentes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="NumIncidentes" fieldSource="NumIncidentes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Num Incidentes" caption="Num Incidentes" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_deffugNumIncidentes" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Paquetes" fieldSource="Paquetes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Paquetes" caption="Paquetes" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_info_rs_cr_deffugPaquetes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="NumPaquetes" fieldSource="NumPaquetes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Num Paquetes" caption="Num Paquetes" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_deffugNumPaquetes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IncidentesRAPE" fieldSource="IncidentesRAPE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Incidentes RAPE" caption="Incidentes RAPE" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_info_rs_cr_deffugIncidentesRAPE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="NumIncidentesRAPE" fieldSource="NumIncidentesRAPE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Num Incidentes RAPE" caption="Num Incidentes RAPE" required="True" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_deffugNumIncidentesRAPE" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="Deductiva" fieldSource="Deductiva" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Deductiva" caption="Deductiva" required="False" unique="False" wizardSize="12" wizardMaxLength="12" PathID="mc_info_rs_cr_deffugDeductiva">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CumpleDefFug" fieldSource="CumpleDefFug" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Def Fug" caption="Cumple Def Fug" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_info_rs_cr_deffugCumpleDefFug" sourceType="ListOfValues" dataSource="1;Cumple;0;No Cumple">
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
				<TextArea id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Observaciones" fieldSource="Observaciones" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Observaciones" caption="Observaciones" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_info_rs_cr_deffugObservaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UsuarioUltMod" fieldSource="UsuarioUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Usuario Ult Mod" caption="Usuario Ult Mod" required="False" unique="False" wizardSize="25" wizardMaxLength="25" PathID="mc_info_rs_cr_deffugUsuarioUltMod" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaUltMod" fieldSource="FechaUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Fecha Ult Mod" caption="Fecha Ult Mod" required="False" format="yyyy-mm-dd HH:nn" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_info_rs_cr_deffugFechaUltMod" defaultValue="date(&quot;Y-m-d H:i&quot;)" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="23" show_weekend="True" name="JDateTimePicker1" category="jQuery" enabled="True">
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
				<Hidden id="26" fieldSourceType="DBColumn" dataType="Text" name="hdIdProveedor" PathID="mc_info_rs_cr_deffughdIdProveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="30" urlType="Relative" enableValidation="True" isDefault="False" name="btnCalcula" PathID="mc_info_rs_cr_deffugbtnCalcula" operation="Search" returnPage="PPMCsDefFugDetalle.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="31" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="87" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbPPMC" PathID="mc_info_rs_cr_deffuglbPPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="88" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sNombreProyecto" PathID="mc_info_rs_cr_deffugsNombreProyecto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="89" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lServNegocio" PathID="mc_info_rs_cr_deffuglServNegocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="90" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="sTipoRequerimiento" PathID="mc_info_rs_cr_deffugsTipoRequerimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="91" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbTotalDefectos" PathID="mc_info_rs_cr_deffuglbTotalDefectos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="229" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lReportado" PathID="mc_info_rs_cr_deffuglReportado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="230" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="evidencia_salvedad" PathID="mc_info_rs_cr_deffugevidencia_salvedad" fieldSource="evidencia_salvedad" checkedValue="True" uncheckedValue="False">
<Components/>
<Events/>
<Attributes/>
<Features/>
</CheckBox>
<TextArea id="231" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="observacion_salvedad" PathID="mc_info_rs_cr_deffugobservacion_salvedad" fieldSource="observacion_salvedad">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="24" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="213"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="214"/>
					</Actions>
				</Event>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="221"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="7" conditionType="Parameter" useIsNull="False" field="Id" parameterSource="Id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="4" schemaName="undefined" tableName="mc_info_rs_cr_deffug"/>
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
		<EditableGrid id="92" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" sourceType="SQL" defaultPageSize="25" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="IncidentesPPMC" connection="cnDisenio" dataSource="SELECT mc_info_detalle_paquetes_df.Id, IdDetalle, Id_Incidente, ClaveMovimiento, DescMovimiento, FechaInicioMov, FechaFinMov, Paquete, Ignorar 
FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_incidente_avl ON
mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_incidente_avl.Id
WHERE Fuente = '{sFuente}' 
	and IdPadre = {Id}" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="Paquetes del en Incidente en PPMC" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="Id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="IncidentesPPMC" activeCollection="UFormElements" activeTableType="mc_info_detalle_paquetes_df" customUpdateType="Table" customUpdate="mc_info_detalle_paquetes_df">
			<Components>
				<Sorter id="96" visible="True" name="Sorter_Id_Incidente" column="Id_Incidente" wizardCaption="Id Incidente" wizardSortingType="SimpleDir" wizardControl="Id_Incidente" wizardAddNbsp="False" PathID="IncidentesPPMCSorter_Id_Incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="97" visible="True" name="Sorter_ClaveMovimiento" column="ClaveMovimiento" wizardCaption="Clave Movimiento" wizardSortingType="SimpleDir" wizardControl="ClaveMovimiento" wizardAddNbsp="False" PathID="IncidentesPPMCSorter_ClaveMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="98" visible="True" name="Sorter_DescMovimiento" column="DescMovimiento" wizardCaption="Desc Movimiento" wizardSortingType="SimpleDir" wizardControl="DescMovimiento" wizardAddNbsp="False" PathID="IncidentesPPMCSorter_DescMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="99" visible="True" name="Sorter_FechaInicioMov" column="FechaInicioMov" wizardCaption="Fecha Inicio Mov" wizardSortingType="SimpleDir" wizardControl="FechaInicioMov" wizardAddNbsp="False" PathID="IncidentesPPMCSorter_FechaInicioMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="100" visible="True" name="Sorter_FechaFinMov" column="FechaFinMov" wizardCaption="Fecha Fin Mov" wizardSortingType="SimpleDir" wizardControl="FechaFinMov" wizardAddNbsp="False" PathID="IncidentesPPMCSorter_FechaFinMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="101" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="IncidentesPPMCSorter_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="102" visible="True" name="Sorter_Ignorar" column="Ignorar" wizardCaption="Ignorar" wizardSortingType="SimpleDir" wizardControl="Ignorar" wizardAddNbsp="False" PathID="IncidentesPPMCSorter_Ignorar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="103" visible="True" name="Sorter_Id" column="Id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="Id" wizardAddNbsp="False" PathID="IncidentesPPMCSorter_Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="105" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Id_Incidente" fieldSource="Id_Incidente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id Incidente" caption="Id Incidente" required="False" unique="False" wizardSize="25" wizardMaxLength="25" PathID="IncidentesPPMCId_Incidente" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="ClaveMovimiento" fieldSource="ClaveMovimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Clave Movimiento" caption="Clave Movimiento" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="IncidentesPPMCClaveMovimiento" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="107" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DescMovimiento" fieldSource="DescMovimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Desc Movimiento" caption="Desc Movimiento" required="False" unique="False" wizardSize="50" wizardMaxLength="125" PathID="IncidentesPPMCDescMovimiento" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="108" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaInicioMov" fieldSource="FechaInicioMov" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" features="(assigned)" wizardCaption="Fecha Inicio Mov" caption="Fecha Inicio Mov" required="False" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="IncidentesPPMCFechaInicioMov" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="109" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
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
				</Label>
				<Label id="110" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FechaFinMov" fieldSource="FechaFinMov" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" features="(assigned)" wizardCaption="Fecha Fin Mov" caption="Fecha Fin Mov" required="False" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="IncidentesPPMCFechaFinMov" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="111" show_weekend="True" name="InlineDatePicker2" category="jQuery" enabled="True">
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
				</Label>
				<Label id="112" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Paquete" fieldSource="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Paquete" caption="Paquete" required="False" unique="False" wizardSize="50" wizardMaxLength="75" PathID="IncidentesPPMCPaquete" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="113" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="Ignorar" fieldSource="Ignorar" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Ignorar" PathID="IncidentesPPMCIgnorar" checkedValue="1" uncheckedValue="0" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Hidden id="114" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Id" fieldSource="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id" PathID="IncidentesPPMCId">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Navigator id="115" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="116" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="IncidentesPPMCButton_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="117"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="217" dataType="Text" designDefaultValue="PPMC" parameterSource="'PPMC'" parameterType="Expression" variable="sFuente"/>
				<SQLParameter id="218" dataType="Text" defaultValue="CCGetParam(&quot;Id&quot;)" parameterSource="Id" parameterType="URL" variable="Id"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="118" field="Ignorar" dataType="Boolean" parameterType="Control" parameterSource="Ignorar"/>
				<CustomParameter id="119" field="Id" dataType="Integer" parameterType="Control" parameterSource="Id"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="122" conditionType="Parameter" useIsNull="False" field="Id" dataType="Integer" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="Id"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="120" field="Ignorar" dataType="Boolean" parameterType="Control" parameterSource="Ignorar" omitIfEmpty="False" defaultValue="0"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
		<EditableGrid id="159" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" sourceType="SQL" defaultPageSize="25" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_detalle_PPMC_avl" connection="cnDisenio" dataSource="SELECT mc_info_detalle_paquetes_df.Id AS mc_info_detalle_paquetes_df_Id, Ignorar, Paquete, mc_detalle_PPMC_Monitor_avl.Id AS mc_detalle_PPMC_Monitor_avl_Id,
ClaveMovimiento, FechaInicioMov, FechaFinMov, Descripcion, c_rdl, PAQ_CVE_FOL 
FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_PPMC_Monitor_avl ON
mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_PPMC_Monitor_avl.Id
WHERE Fuente = '{sFuente}'  and mc_info_detalle_paquetes_df.IdPadre = {sIdPadre}" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="EditableGrid1" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="mc_info_detalle_paquetes_df_Id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="mc_info_detalle_PPMC_avl" customUpdateType="Table" activeCollection="UFormElements" activeTableType="mc_info_detalle_paquetes_df" customUpdate="mc_info_detalle_paquetes_df">
			<Components>
				<Sorter id="164" visible="True" name="Sorter_ClaveMovimiento" column="ClaveMovimiento" wizardCaption="Clave Movimiento" wizardSortingType="SimpleDir" wizardControl="ClaveMovimiento" wizardAddNbsp="False" PathID="mc_info_detalle_PPMC_avlSorter_ClaveMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="165" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="mc_info_detalle_PPMC_avlSorter_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="166" visible="True" name="Sorter_FechaInicioMov" column="FechaInicioMov" wizardCaption="Fecha Inicio Mov" wizardSortingType="SimpleDir" wizardControl="FechaInicioMov" wizardAddNbsp="False" PathID="mc_info_detalle_PPMC_avlSorter_FechaInicioMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="167" visible="True" name="Sorter_FechaFinMov" column="FechaFinMov" wizardCaption="Fecha Fin Mov" wizardSortingType="SimpleDir" wizardControl="FechaFinMov" wizardAddNbsp="False" PathID="mc_info_detalle_PPMC_avlSorter_FechaFinMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="168" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="mc_info_detalle_PPMC_avlSorter_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="169" visible="True" name="Sorter_c_rdl" column="c_rdl" wizardCaption="C Rdl" wizardSortingType="SimpleDir" wizardControl="c_rdl" wizardAddNbsp="False" PathID="mc_info_detalle_PPMC_avlSorter_c_rdl">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="170" visible="True" name="Sorter_PAQ_CVE_FOL" column="PAQ_CVE_FOL" wizardCaption="PAQ CVE FOL" wizardSortingType="SimpleDir" wizardControl="PAQ_CVE_FOL" wizardAddNbsp="False" PathID="mc_info_detalle_PPMC_avlSorter_PAQ_CVE_FOL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="171" visible="True" name="Sorter_Ignorar" column="Ignorar" wizardCaption="Ignorar" wizardSortingType="SimpleDir" wizardControl="Ignorar" wizardAddNbsp="False" PathID="mc_info_detalle_PPMC_avlSorter_Ignorar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="173" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ClaveMovimiento" fieldSource="ClaveMovimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Clave Movimiento" PathID="mc_info_detalle_PPMC_avlClaveMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="174" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Descripcion" PathID="mc_info_detalle_PPMC_avlDescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="175" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaInicioMov" fieldSource="FechaInicioMov" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Fecha Inicio Mov" format="ShortDate" PathID="mc_info_detalle_PPMC_avlFechaInicioMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="176" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaFinMov" fieldSource="FechaFinMov" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Fecha Fin Mov" format="ShortDate" PathID="mc_info_detalle_PPMC_avlFechaFinMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="177" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Paquete" PathID="mc_info_detalle_PPMC_avlPaquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="178" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="c_rdl" fieldSource="c_rdl" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="C Rdl" PathID="mc_info_detalle_PPMC_avlc_rdl">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="179" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="PAQ_CVE_FOL" fieldSource="PAQ_CVE_FOL" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="PAQ CVE FOL" PathID="mc_info_detalle_PPMC_avlPAQ_CVE_FOL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="180" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="Ignorar" fieldSource="Ignorar" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Ignorar" PathID="mc_info_detalle_PPMC_avlIgnorar" checkedValue="1" uncheckedValue="0" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Navigator id="181" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="Austere2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="182" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="mc_info_detalle_PPMC_avlButton_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="172" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="mc_info_detalle_paquetes_df_Id" fieldSource="mc_info_detalle_paquetes_df_Id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Mc Info Detalle Paquetes Df Id" PathID="mc_info_detalle_PPMC_avlmc_info_detalle_paquetes_df_Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="187"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="225" dataType="Text" designDefaultValue="REQ" parameterSource="'REQ'" parameterType="Expression" variable="sFuente"/>
				<SQLParameter id="226" dataType="Text" designDefaultValue="4024" parameterSource="CCGetParam(&quot;Id&quot;)" parameterType="Expression" variable="sIdPadre"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="184" conditionType="Parameter" useIsNull="False" field="Id" dataType="Integer" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="mc_info_detalle_paquetes_df_Id"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="183" field="Ignorar" dataType="Boolean" parameterType="Control" parameterSource="Ignorar" omitIfEmpty="False" defaultValue="0"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
		<EditableGrid id="188" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" sourceType="SQL" defaultPageSize="25" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="EditableGrid1" connection="cnDisenio" dataSource="SELECT mc_info_detalle_paquetes_df.Id AS mc_info_detalle_paquetes_df_Id, Ignorar, Id_Incidente, ClaveMovimiento, DescMovimiento, FechaInicioMov,
FechaFinMov, Paquete 
FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_incidente_avl ON
mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_incidente_avl.Id
WHERE Fuente = '{sFuente}' 
	and mc_info_detalle_paquetes_df.IdPadre= {Id}" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="Paquetes del Incidente del RAPE" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="mc_info_detalle_paquetes_df_Id" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="EditableGrid1" customUpdateType="Table" customUpdate="mc_info_detalle_paquetes_df" activeCollection="UConditions" activeTableType="customUpdate">
			<Components>
				<Sorter id="192" visible="True" name="Sorter_Id_Incidente" column="Id_Incidente" wizardCaption="Id Incidente" wizardSortingType="SimpleDir" wizardControl="Id_Incidente" wizardAddNbsp="False" PathID="EditableGrid1Sorter_Id_Incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="193" visible="True" name="Sorter_ClaveMovimiento" column="ClaveMovimiento" wizardCaption="Clave Movimiento" wizardSortingType="SimpleDir" wizardControl="ClaveMovimiento" wizardAddNbsp="False" PathID="EditableGrid1Sorter_ClaveMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="194" visible="True" name="Sorter_DescMovimiento" column="DescMovimiento" wizardCaption="Desc Movimiento" wizardSortingType="SimpleDir" wizardControl="DescMovimiento" wizardAddNbsp="False" PathID="EditableGrid1Sorter_DescMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="195" visible="True" name="Sorter_FechaInicioMov" column="FechaInicioMov" wizardCaption="Fecha Inicio Mov" wizardSortingType="SimpleDir" wizardControl="FechaInicioMov" wizardAddNbsp="False" PathID="EditableGrid1Sorter_FechaInicioMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="196" visible="True" name="Sorter_FechaFinMov" column="FechaFinMov" wizardCaption="Fecha Fin Mov" wizardSortingType="SimpleDir" wizardControl="FechaFinMov" wizardAddNbsp="False" PathID="EditableGrid1Sorter_FechaFinMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="197" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="EditableGrid1Sorter_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="198" visible="True" name="Sorter_Ignorar" column="Ignorar" wizardCaption="Ignorar" wizardSortingType="SimpleDir" wizardControl="Ignorar" wizardAddNbsp="False" PathID="EditableGrid1Sorter_Ignorar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="200" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Id_Incidente" fieldSource="Id_Incidente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Id Incidente" PathID="EditableGrid1Id_Incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="201" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ClaveMovimiento" fieldSource="ClaveMovimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Clave Movimiento" PathID="EditableGrid1ClaveMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="202" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DescMovimiento" fieldSource="DescMovimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Desc Movimiento" PathID="EditableGrid1DescMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="203" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaInicioMov" fieldSource="FechaInicioMov" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Fecha Inicio Mov" format="ShortDate" PathID="EditableGrid1FechaInicioMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="204" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaFinMov" fieldSource="FechaFinMov" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Fecha Fin Mov" format="ShortDate" PathID="EditableGrid1FechaFinMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="205" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Paquete" PathID="EditableGrid1Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="206" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="Ignorar" fieldSource="Ignorar" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Ignorar" PathID="EditableGrid1Ignorar" checkedValue="1" uncheckedValue="0" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Navigator id="207" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="208" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="EditableGrid1Button_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="210" fieldSourceType="DBColumn" dataType="Text" name="mc_info_detalle_paquetes_df_Id" PathID="EditableGrid1mc_info_detalle_paquetes_df_Id" fieldSource="mc_info_detalle_paquetes_df_Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="227" dataType="Text" designDefaultValue="RAPE" parameterSource="'RAPE'" parameterType="Expression" variable="sFuente"/>
				<SQLParameter id="228" dataType="Text" defaultValue="CCGetParam(&quot;Id&quot;)" parameterSource="Id" parameterType="URL" variable="Id"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="212" conditionType="Parameter" useIsNull="False" field="Id" dataType="Integer" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="mc_info_detalle_paquetes_df_Id"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="211" field="Ignorar" dataType="Boolean" parameterType="Control" parameterSource="Ignorar"/>
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
		<Link id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="None" name="lkCalidadCod" PathID="lkCalidadCod" hrefSource="PPMCsCrCalCodDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Calidad de Código','textSourceDB':'','hrefSource':'PPMCsCrCalCodDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'URL','parameterSource':'Id','parameterName':'Id'},'length':2,'objectType':'linkParameters'}}"><Components/>
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
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsDefFugDetalle_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsDefFugDetalle.php" forShow="True" url="PPMCsDefFugDetalle.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="222" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="29"/>
			</Actions>
		</Event>
	</Events>
</Page>
