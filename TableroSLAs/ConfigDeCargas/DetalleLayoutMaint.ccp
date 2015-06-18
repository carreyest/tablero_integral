<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\ConfigDeCargas" secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="ConnCarga" name="detalle_layout" dataSource="detalle_layout" errorSummator="Error" buttonsType="button" wizardRecordKey="id_detalle_layout" wizardCaption="Add/Edit Detalle Layout " wizardFormMethod="post" wizardThemeApplyTo="Page" returnPage="DetalleLayoutList.ccp" PathID="detalle_layout">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="detalle_layoutButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="detalle_layoutButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="5" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="detalle_layoutButton_Delete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="cve_carga" fieldSource="cve_carga" required="True" wizardIsPassword="False" wizardCaption="Cve Carga" caption="Cve Carga" unique="False" wizardSize="50" wizardMaxLength="50" PathID="detalle_layoutcve_carga" sourceType="SQL" connection="ConnCarga" dataSource="select cve_carga, cve_carga from proceso_carga_archivos">
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
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="nombre_columna_tabla" fieldSource="nombre_columna_tabla" required="True" wizardIsPassword="False" wizardCaption="Nombre Columna Tabla" caption="Nombre Columna Tabla" unique="False" wizardSize="50" wizardMaxLength="50" PathID="detalle_layoutnombre_columna_tabla">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="num_columna_excel" fieldSource="num_columna_excel" required="True" wizardIsPassword="False" wizardCaption="Num Columna Excel" caption="Num Columna Excel" unique="False" wizardSize="50" wizardMaxLength="50" PathID="detalle_layoutnum_columna_excel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="tipo_columna" fieldSource="tipo_columna" required="True" wizardIsPassword="False" wizardCaption="Tipo Columna" caption="Tipo Columna" unique="False" wizardSize="50" wizardMaxLength="50" PathID="detalle_layouttipo_columna" sourceType="ListOfValues" dataSource="varchar;varchar;int;int;float;float;date;date;datetime;datetime">
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
				<ListBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="acepta_nulo" fieldSource="acepta_nulo" required="True" wizardIsPassword="False" wizardCaption="Acepta Nulo" caption="Acepta Nulo" unique="False" wizardSize="50" wizardMaxLength="50" PathID="detalle_layoutacepta_nulo" sourceType="ListOfValues" dataSource="NO;No;SI;Si">
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
				<CheckBox id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="dato_indispensable" fieldSource="dato_indispensable" required="True" wizardIsPassword="False" wizardCaption="Dato Indispensable" PathID="detalle_layoutdato_indispensable" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="valor_x_default" fieldSource="valor_x_default" required="False" wizardIsPassword="False" wizardCaption="Valor X Default" caption="Valor X Default" unique="False" wizardSize="50" wizardMaxLength="50" PathID="detalle_layoutvalor_x_default">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="mapeo_de_valor" PathID="detalle_layoutmapeo_de_valor" caption="Mapeo de valor" fieldSource="mapeo_de_valor" required="False" unique="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="6" conditionType="Parameter" useIsNull="False" field="id_detalle_layout" parameterSource="id_detalle_layout" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="19" tableName="detalle_layout"/>
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
		<IncludePage id="15" name="Header" PathID="Header" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Menu id="23" secured="False" sourceType="Table" returnValueType="Number" name="Menu1" menuType="Horizontal" menuSourceType="Static" PathID="Menu1">
			<Components>
				<Link id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ItemLink" PathID="Menu1ItemLink">
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
				<MenuItem id="24" name="MenuItem2" caption="Procesos de carga" url="ProcesoCargaAList.ccp" target="_self"/>
<MenuItem id="25" name="MenuItem3" caption="Layouts de procesos de carga" url="DetalleLayoutList.ccp" target="_self"/>
<MenuItem id="26" name="MenuItem1" caption="Log ultimas cargas" url="UltimasCargas.ccp" target="_self"/>
<MenuItem id="27" name="MenuItem4" caption="Ejecutar Carga" url="ExecCarga.ccp" target="_self"/>
</MenuItems>
			<Features/>
		</Menu>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="DetalleLayoutMaint.php" forShow="True" url="DetalleLayoutMaint.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="14" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
