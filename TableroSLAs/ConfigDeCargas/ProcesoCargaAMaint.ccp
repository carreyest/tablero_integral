<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\ConfigDeCargas" secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="ConnCarga" name="proceso_carga_archivos" dataSource="proceso_carga_archivos" errorSummator="Error" buttonsType="button" wizardRecordKey="cve_carga" wizardCaption="Add/Edit Proceso Carga Archivos " wizardFormMethod="post" wizardThemeApplyTo="Page" returnPage="ProcesoCargaAList.ccp" PathID="proceso_carga_archivos">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="proceso_carga_archivosButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="proceso_carga_archivosButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="proceso_carga_archivosButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="descripcion" fieldSource="descripcion" required="False" wizardIsPassword="False" wizardCaption="Descripcion" caption="Descripcion" unique="False" wizardSize="50" wizardMaxLength="200" PathID="proceso_carga_archivosdescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="mascara_archivo" fieldSource="mascara_archivo" required="True" wizardIsPassword="False" wizardCaption="Mascara Archivo" caption="Mascara Archivo" unique="False" wizardSize="50" wizardMaxLength="50" PathID="proceso_carga_archivosmascara_archivo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="formato_archivo" fieldSource="formato_archivo" required="True" wizardIsPassword="False" wizardCaption="Formato Archivo" caption="Formato Archivo" unique="False" wizardSize="10" wizardMaxLength="10" PathID="proceso_carga_archivosformato_archivo" sourceType="ListOfValues" dataSource="xlsx;xlsx;xls;xls">
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
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="repositorio" fieldSource="repositorio" required="True" wizardIsPassword="False" wizardCaption="Repositorio" caption="Repositorio" unique="False" wizardSize="50" wizardMaxLength="150" PathID="proceso_carga_archivosrepositorio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="mails_responsables" fieldSource="mails_responsables" required="True" wizardIsPassword="False" wizardCaption="Mails Responsables" caption="Mails Responsables" unique="False" wizardSize="50" wizardMaxLength="200" PathID="proceso_carga_archivosmails_responsables">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="tabla_destino" fieldSource="tabla_destino" required="True" wizardIsPassword="False" wizardCaption="Tabla Destino" caption="Tabla Destino" unique="False" wizardSize="50" wizardMaxLength="100" PathID="proceso_carga_archivostabla_destino">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="procedimiento_extra" fieldSource="procedimiento_extra" required="False" wizardIsPassword="False" wizardCaption="Procedimiento Extra" caption="Procedimiento Extra" unique="False" wizardSize="50" wizardMaxLength="200" PathID="proceso_carga_archivosprocedimiento_extra">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="numero_hoja_excel" fieldSource="numero_hoja_excel" required="True" wizardIsPassword="False" wizardCaption="Numero Hoja Excel" caption="Numero Hoja Excel" unique="False" wizardSize="5" wizardMaxLength="5" PathID="proceso_carga_archivosnumero_hoja_excel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="filas_sin_datos_excel" fieldSource="filas_sin_datos_excel" required="True" wizardIsPassword="False" wizardCaption="Filas Sin Datos Excel" caption="Filas Sin Datos Excel" unique="False" wizardSize="5" wizardMaxLength="5" PathID="proceso_carga_archivosfilas_sin_datos_excel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="campo_fecha_cierre" fieldSource="campo_fecha_cierre" required="False" wizardIsPassword="False" wizardCaption="Campo Fecha Cierre" caption="Campo Fecha Cierre" unique="False" wizardSize="50" wizardMaxLength="50" PathID="proceso_carga_archivoscampo_fecha_cierre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="campo_indice" fieldSource="campo_indice" required="False" wizardIsPassword="False" wizardCaption="Campo Indice" caption="Campo Indice" unique="False" wizardSize="50" wizardMaxLength="50" PathID="proceso_carga_archivoscampo_indice">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="campo_indice_identity" fieldSource="campo_indice_identity" required="False" wizardIsPassword="False" wizardCaption="Campo Indice Identity" PathID="proceso_carga_archivoscampo_indice_identity" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<ListBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="periodicidad" fieldSource="periodicidad" required="False" wizardIsPassword="False" wizardCaption="Periodicidad" caption="Periodicidad" unique="False" wizardSize="20" wizardMaxLength="20" PathID="proceso_carga_archivosperiodicidad" sourceType="ListOfValues" dataSource="semanal;semanal;quincenal;quincenal;mensual_fin;Fin de mes;mensual_inicio;Inicio de mes">
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
				<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="cve_carga" PathID="proceso_carga_archivoscve_carga" fieldSource="cve_carga">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="db_destino" PathID="proceso_carga_archivosdb_destino" fieldSource="db_destino" required="True" unique="False" sourceType="ListOfValues" dataSource="Reportes_ACDMA;Reportes_ACDMA;TableroMyM_SDMA4;TableroMyM_SDMA4;archivosxls;archivosxls;MesaControl_Prod;MesaControl_Prod;MesaControlHistorico_Desa;MesaControlHistorico_Desa;replica_mcam;replica_mcam;replica_mcam_temp;replica_mcam_temp;replica_mcam_v2;replica_mcam_v2;Tablero_MesaControl_Pruebas;Tablero_MesaControl_Pruebas">
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
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="6" conditionType="Parameter" useIsNull="False" field="cve_carga" parameterSource="cve_carga" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="25" tableName="proceso_carga_archivos"/>
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
		<IncludePage id="22" name="Header" PathID="Header" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Menu id="31" secured="False" sourceType="Table" returnValueType="Number" name="Menu1" menuType="Horizontal" menuSourceType="Static" PathID="Menu1">
			<Components>
				<Link id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ItemLink" PathID="Menu1ItemLink">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<MenuItems>
				<MenuItem id="33" name="MenuItem2" caption="Procesos de carga" url="ProcesoCargaAList.ccp" target="_self"/>
<MenuItem id="34" name="MenuItem3" caption="Layouts de procesos de carga" url="DetalleLayoutList.ccp" target="_self"/>
<MenuItem id="35" name="MenuItem1" caption="Log ultimas cargas" url="UltimasCargas.ccp" target="_self"/>
<MenuItem id="36" name="MenuItem4" caption="Ejecutar Carga" url="ExecCarga.ccp" target="_self"/>
</MenuItems>
			<Features/>
		</Menu>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="ProcesoCargaAMaint.php" forShow="True" url="ProcesoCargaAMaint.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="21" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
