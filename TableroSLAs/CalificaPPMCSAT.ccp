<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions" accessDeniedPage="Login.ccp">
	<Components>
		<IncludePage id="25" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="cnDisenio" name="calificacion_rs_AUT" dataSource="mc_calificacion_rs_SAT, mc_c_proveedor, mc_c_ServContractual, mc_c_servicio, mc_c_mes, mc_universo_cds" errorSummator="Error" wizardCaption="Agregar/Editar Calificacion Rs AUT " wizardFormMethod="post" PathID="calificacion_rs_AUT" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" returnPage="PPMCsApbDetalleRSxls.ccp" customUpdateType="Table" activeCollection="UConditions" activeTableType="customUpdate" customUpdate="mc_calificacion_rs_SAT">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="calificacion_rs_AUTButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="calificacion_rs_AUTButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="calificacion_rs_AUTButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="id_ppmc" fieldSource="id_ppmc" required="True" caption="Id Ppmc" wizardCaption="Id Ppmc" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="calificacion_rs_AUTid_ppmc" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="8" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="id_proveedor" fieldSource="RazonSocial" required="True" caption="Id Proveedor" wizardCaption="Id Proveedor" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="calificacion_rs_AUTid_proveedor" connection="cnDisenio" dataSource="c_proveedor" boundColumn="id_proveedor" textColumn="nombre" html="False">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
					<PKFields/>
				</Label>
				<Label id="10" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="id_servicio_negocio" fieldSource="mc_c_servicio_nombre" required="True" caption="Id Servicio Negocio" wizardCaption="Id Servicio Negocio" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="calificacion_rs_AUTid_servicio_negocio" connection="cnDisenio" dataSource="c_servicio" boundColumn="id_servicio" textColumn="nombre" activeCollection="TableParameters" html="False">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="id_tipo_servicio" dataType="Integer" searchConditionType="Equal" parameterType="Expression" logicOperator="And" parameterSource="2"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="30" tableName="c_servicio" posLeft="10" posTop="10" posWidth="117" posHeight="136"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
					<PKFields/>
				</Label>
				<Label id="11" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="id_tipo" fieldSource="id_tipo" required="False" caption="Id Tipo" wizardCaption="Id Tipo" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="calificacion_rs_AUTid_tipo" connection="cnDisenio" dataSource="c_generico" boundColumn="id_generico" textColumn="nombre" activeCollection="TableParameters" html="False">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="27" conditionType="Parameter" useIsNull="False" field="id_catalogo" dataType="Integer" searchConditionType="Equal" parameterType="Expression" logicOperator="And" parameterSource="17"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="26" tableName="c_generico" posLeft="10" posTop="10" posWidth="95" posHeight="136"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
					<PKFields/>
				</Label>
				<Label id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="descripci_n" fieldSource="descripción" required="False" caption="Descripción" wizardCaption="Descripción" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="calificacion_rs_AUTdescripci_n" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextArea id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Obs_manuales" fieldSource="Obs_manuales" required="False" caption="Obs Manuales" wizardCaption="Obs Manuales" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="calificacion_rs_AUTObs_manuales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Button id="32" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="calificacion_rs_AUTButton_Cancel" operation="Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="34" fieldSourceType="DBColumn" dataType="Text" html="False" name="Label1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="calificacion_rs_AUTLabel1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="88" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mc_c_ServContractual_Desc" PathID="calificacion_rs_AUTmc_c_ServContractual_Desc" fieldSource="mc_c_ServContractual_Desc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="AnioReporte" fieldSource="AnioReporte" required="True" caption="Anio Reporte" wizardCaption="Anio Reporte" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="calificacion_rs_AUTAnioReporte" connection="cnDisenio" dataSource="C_Ano" boundColumn="Ano" textColumn="Ano" html="False">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
					<PKFields/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="MesReporte" fieldSource="mc_c_mes_Mes" PathID="calificacion_rs_AUTMesReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Panel id="120" visible="True" generateDiv="False" name="pnlApertura" wizardInnerHTML="
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th1&quot;&gt;&lt;label for=&quot;calificacion_rs_AUTHERR_EST_COST&quot;&gt;Uso de una Herramienta para Estimación de Costo y Tiempos&lt;/label&gt;&lt;/td&gt; 
                  &lt;td class=&quot;th1&quot;&gt;
                    &lt;select id=&quot;calificacion_rs_AUTHERR_EST_COST&quot; name=&quot;{HERR_EST_COST_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;No Aplica&lt;/option&gt;
                      {HERR_EST_COST_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th1&quot;&gt;&lt;label for=&quot;calificacion_rs_AUTREQ_SERV&quot;&gt;Requisitos de Servicio&lt;/label&gt;&lt;/td&gt; 
                  &lt;td class=&quot;th1&quot;&gt;
                    &lt;select id=&quot;calificacion_rs_AUTREQ_SERV&quot; name=&quot;{REQ_SERV_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;No Aplica&lt;/option&gt;
                      {REQ_SERV_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td colspan=&quot;2&quot;&gt;{OBS_HERR_EST_COST}&lt;/td&gt;
                &lt;/tr&gt;
 " PathID="calificacion_rs_AUTpnlApertura">
					<Components>
						<ListBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="HERR_EST_COST" fieldSource="HERR_EST_COST" required="False" caption="HERR EST COST" wizardCaption="HERR EST COST" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="calificacion_rs_AUTpnlAperturaHERR_EST_COST" sourceType="ListOfValues" dataSource="0;No Cumple;1;Cumple">
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
						<ListBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="REQ_SERV" fieldSource="REQ_SERV" required="False" caption="REQ SERV" wizardCaption="REQ SERV" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="calificacion_rs_AUTpnlAperturaREQ_SERV" sourceType="ListOfValues" dataSource="0;No Cumple;1;Cumple">
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
						<Label id="105" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="OBS_HERR_EST_COST" PathID="calificacion_rs_AUTpnlAperturaOBS_HERR_EST_COST" fieldSource="OBS_HERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
				<Panel id="121" visible="True" generateDiv="False" name="pnlCierre" wizardInnerHTML="&lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th1&quot;&gt;&lt;label for=&quot;calificacion_rs_AUTCUMPL_REQ_FUNC&quot;&gt;Cumplimiento en Requisitos Funcionales&lt;/label&gt;&lt;/td&gt; 
                  &lt;td class=&quot;th1&quot;&gt;
                    &lt;select id=&quot;calificacion_rs_AUTCUMPL_REQ_FUNC&quot; name=&quot;{CUMPL_REQ_FUNC_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;No Aplica&lt;/option&gt;
                      {CUMPL_REQ_FUNC_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td colspan=&quot;2&quot;&gt;
                    &lt;div style=&quot;FONT-FAMILY: Verdana; WIDTH: 680px&quot;&gt;
                      {OBS_CUMPL_REQ_FUNC} 
                    &lt;/div&gt;
                  &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th1&quot;&gt;&lt;label for=&quot;calificacion_rs_AUTCALIDAD_PROD_TERM&quot;&gt;Calidad de Productos Terminados&lt;/label&gt;&lt;/td&gt; 
                  &lt;td class=&quot;th1&quot;&gt;
                    &lt;select id=&quot;calificacion_rs_AUTCALIDAD_PROD_TERM&quot; name=&quot;{CALIDAD_PROD_TERM_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;No Aplica&lt;/option&gt;
                      {CALIDAD_PROD_TERM_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td colspan=&quot;2&quot;&gt;
                    &lt;div style=&quot;FONT-FAMILY: Verdana; WIDTH: 680px&quot;&gt;
                      {OBS_CALIDAD_PROD_TERM} 
                    &lt;/div&gt;
                  &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th1&quot;&gt;&lt;label for=&quot;calificacion_rs_AUTRETR_ENTREGABLE&quot;&gt;Retraso en Entregables&lt;/label&gt;&lt;/td&gt; 
                  &lt;td class=&quot;th1&quot;&gt;
                    &lt;select id=&quot;calificacion_rs_AUTRETR_ENTREGABLE&quot; name=&quot;{RETR_ENTREGABLE_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;No Aplica&lt;/option&gt;
                      {RETR_ENTREGABLE_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th1&quot;&gt;&lt;label for=&quot;calificacion_rs_AUTCOMPL_RUTA_CRITICA&quot;&gt;Completar Tareas&lt;br&gt;
                    en Ruta Crítica&lt;/label&gt;&lt;/td&gt; 
                  &lt;td class=&quot;th1&quot;&gt;
                    &lt;select id=&quot;calificacion_rs_AUTCOMPL_RUTA_CRITICA&quot; name=&quot;{COMPL_RUTA_CRITICA_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;No Aplica&lt;/option&gt;
                      {COMPL_RUTA_CRITICA_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td colspan=&quot;2&quot;&gt;
                    &lt;div style=&quot;FONT-FAMILY: Verdana; WIDTH: 680px&quot;&gt;
                      {OBS_COMPL_RUTA_CRITICA} 
                    &lt;/div&gt;
                  &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th1&quot;&gt;&lt;label for=&quot;calificacion_rs_AUTEST_PROY&quot;&gt;Estimación de Proyectos&lt;br&gt;
                    (Costo Actual vs. Costo Estimado)&lt;/label&gt;&lt;/td&gt; 
                  &lt;td class=&quot;th1&quot;&gt;
                    &lt;select id=&quot;calificacion_rs_AUTEST_PROY&quot; name=&quot;{EST_PROY_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;No Aplica&lt;/option&gt;
                      {EST_PROY_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td colspan=&quot;2&quot;&gt;
                    &lt;div style=&quot;FONT-FAMILY: Verdana; WIDTH: 680px&quot;&gt;
                      {OBS_EST_PROY} 
                    &lt;/div&gt;
                  &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th1&quot;&gt;&lt;label for=&quot;calificacion_rs_AUTDEF_FUG_AMB_PROD&quot;&gt;Defectos Fugados a Producción&lt;/label&gt;&lt;/td&gt; 
                  &lt;td class=&quot;th1&quot;&gt;
                    &lt;select id=&quot;calificacion_rs_AUTDEF_FUG_AMB_PROD&quot; name=&quot;{DEF_FUG_AMB_PROD_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;No Aplica&lt;/option&gt;
                      {DEF_FUG_AMB_PROD_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td colspan=&quot;2&quot;&gt;
                    &lt;div style=&quot;FONT-FAMILY: Verdana; WIDTH: 680px&quot;&gt;
                      {OBS_DEF_FUG_AMB_PROD} 
                    &lt;/div&gt;
                  &lt;/td&gt;
                &lt;/tr&gt;
 " PathID="calificacion_rs_AUTpnlCierre">
					<Components>
						<ListBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CUMPL_REQ_FUNC" fieldSource="CUMPL_REQ_FUNC" required="False" caption="CUMPL REQ FUNC" wizardCaption="CUMPL REQ FUNC" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="calificacion_rs_AUTpnlCierreCUMPL_REQ_FUNC" sourceType="ListOfValues" dataSource="0;No Cumple;1;Cumple">
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
						<Label id="104" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="OBS_CUMPL_REQ_FUNC" PathID="calificacion_rs_AUTpnlCierreOBS_CUMPL_REQ_FUNC" fieldSource="OBS_CUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<ListBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM" required="False" caption="CALIDAD PROD TERM" wizardCaption="CALIDAD PROD TERM" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="calificacion_rs_AUTpnlCierreCALIDAD_PROD_TERM" sourceType="ListOfValues" dataSource="0;No Cumple;1;Cumple">
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
						<Label id="106" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="OBS_CALIDAD_PROD_TERM" PathID="calificacion_rs_AUTpnlCierreOBS_CALIDAD_PROD_TERM" fieldSource="OBS_CALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<ListBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" required="False" caption="RETR ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="calificacion_rs_AUTpnlCierreRETR_ENTREGABLE" sourceType="ListOfValues" dataSource="0;No Cumple;1;Cumple">
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
						<Label id="107" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="OBS_COMPL_RUTA_CRITICA" PathID="calificacion_rs_AUTpnlCierreOBS_COMPL_RUTA_CRITICA" fieldSource="OBS_COMPL_RUTA_CRITICA">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<ListBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="EST_PROY" fieldSource="EST_PROY" required="False" caption="EST PROY" wizardCaption="EST PROY" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="calificacion_rs_AUTpnlCierreEST_PROY" sourceType="ListOfValues" dataSource="0;No Cumple;1;Cumple">
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
						<Label id="108" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="OBS_EST_PROY" PathID="calificacion_rs_AUTpnlCierreOBS_EST_PROY" fieldSource="OBS_EST_PROY">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<ListBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DEF_FUG_AMB_PROD" fieldSource="DEF_FUG_AMB_PROD" required="False" caption="DEF FUG AMB PROD" wizardCaption="DEF FUG AMB PROD" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="calificacion_rs_AUTpnlCierreDEF_FUG_AMB_PROD" sourceType="ListOfValues" dataSource="0;No Cumple;1;Cumple">
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
						<Label id="109" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="OBS_DEF_FUG_AMB_PROD" PathID="calificacion_rs_AUTpnlCierreOBS_DEF_FUG_AMB_PROD" fieldSource="OBS_DEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="122"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="220"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="221"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="233" conditionType="Parameter" useIsNull="False" dataType="Integer" field="IdUniverso" logicOperator="And" orderNumber="1" parameterSource="IdUniverso" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="240" tableName="mc_calificacion_rs_SAT"/>
				<JoinTable id="241" tableName="mc_c_proveedor"/>
				<JoinTable id="242" tableName="mc_c_ServContractual"/>
				<JoinTable id="243" tableName="mc_c_servicio"/>
				<JoinTable id="244" tableName="mc_c_mes"/>
				<JoinTable id="245" tableName="mc_universo_cds"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="228" fieldLeft="mc_calificacion_rs_SAT.id_proveedor" fieldRight="mc_c_proveedor.id_proveedor" joinType="inner" tableLeft="mc_calificacion_rs_SAT" tableRight="mc_c_proveedor"/>
				<JoinTable2 id="229" conditionType="Equal" fieldLeft="mc_calificacion_rs_SAT.id_servicio_cont" fieldRight="mc_c_ServContractual.Id" joinType="inner" tableLeft="mc_calificacion_rs_SAT" tableRight="mc_c_ServContractual"/>
				<JoinTable2 id="230" conditionType="Equal" fieldLeft="mc_calificacion_rs_SAT.id_servicio_negocio" fieldRight="mc_c_servicio.id_servicio" joinType="inner" tableLeft="mc_calificacion_rs_SAT" tableRight="mc_c_servicio"/>
				<JoinTable2 id="231" conditionType="Equal" fieldLeft="mc_calificacion_rs_SAT.MesReporte" fieldRight="mc_c_mes.IdMes" joinType="inner" tableLeft="mc_calificacion_rs_SAT" tableRight="mc_c_mes"/>
				<JoinTable2 id="232" conditionType="Equal" fieldLeft="mc_calificacion_rs_SAT.IdUniverso" fieldRight="mc_universo_cds.id" joinType="inner" tableLeft="mc_calificacion_rs_SAT" tableRight="mc_universo_cds"/>
			</JoinLinks>
			<Fields>
				<Field id="234" fieldName="RazonSocial" tableName="mc_c_proveedor"/>
				<Field id="235" alias="mc_c_ServContractual_Desc" fieldName="mc_c_ServContractual.Descripcion" tableName="mc_c_ServContractual"/>
				<Field id="236" alias="mc_c_servicio_nombre" fieldName="mc_c_servicio.nombre" tableName="mc_c_servicio"/>
				<Field id="237" alias="mc_c_mes_Mes" fieldName="mc_c_mes.Mes" tableName="mc_c_mes"/>
				<Field id="238" alias="TipoUniverso" fieldName="tipo" tableName="mc_universo_cds"/>
				<Field id="239" fieldName="mc_calificacion_rs_SAT.*" tableName="mc_calificacion_rs_SAT"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="110" conditionType="Parameter" useIsNull="False" field="IdUniverso" dataType="Integer" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="IdUniverso"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="111" field="HERR_EST_COST" dataType="Integer" parameterType="Control" parameterSource="HERR_EST_COST" omitIfEmpty="True"/>
				<CustomParameter id="112" field="REQ_SERV" dataType="Integer" parameterType="Control" parameterSource="REQ_SERV" omitIfEmpty="True"/>
				<CustomParameter id="113" field="CUMPL_REQ_FUNC" dataType="Integer" parameterType="Control" parameterSource="CUMPL_REQ_FUNC" omitIfEmpty="True"/>
				<CustomParameter id="114" field="CALIDAD_PROD_TERM" dataType="Integer" parameterType="Control" parameterSource="CALIDAD_PROD_TERM" omitIfEmpty="True"/>
				<CustomParameter id="115" field="RETR_ENTREGABLE" dataType="Integer" parameterType="Control" parameterSource="RETR_ENTREGABLE" omitIfEmpty="True"/>
				<CustomParameter id="116" field="COMPL_RUTA_CRITICA" dataType="Integer" parameterType="Control" parameterSource="COMPL_RUTA_CRITICA" omitIfEmpty="True"/>
				<CustomParameter id="117" field="EST_PROY" dataType="Integer" parameterType="Control" parameterSource="EST_PROY" omitIfEmpty="True"/>
				<CustomParameter id="118" field="DEF_FUG_AMB_PROD" dataType="Integer" parameterType="Control" parameterSource="DEF_FUG_AMB_PROD" omitIfEmpty="True"/>
				<CustomParameter id="119" field="Obs_manuales" dataType="Text" parameterType="Control" parameterSource="Obs_manuales" omitIfEmpty="True"/>
				<CustomParameter id="181" field="UsuarioUltMod" dataType="Text" parameterType="Expression" omitIfEmpty="True" parameterSource="CCGetUserLogin()"/>
				<CustomParameter id="182" field="FechaUltMod" dataType="Text" parameterType="Expression" omitIfEmpty="False" parameterSource="date(&quot;Y-m-d H:i:s&quot;)" defaultValue="date(&quot;Y-m-d H:i:s&quot;)"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
			<PKFields/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="CalificaPPMCSAT.php" forShow="True" url="CalificaPPMCSAT.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="CalificaPPMCSAT_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
