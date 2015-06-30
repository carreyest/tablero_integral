<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="21" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Buscar" PathID="Buscar">
			<Components>
				<Button id="24" urlType="Relative" enableValidation="True" isDefault="False" name="Button_buscar" operation="Search" returnPage="ListadoVerificacionEntregables.ccp" PathID="BuscarButton_buscar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="76" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="MesReporte" fieldSource="MesReporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Mes Reporte" caption="Mes Reporte" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="BuscarMesReporte" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date('m')"><Components/>
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
				<ListBox id="77" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="anioreporte" fieldSource="anioreporte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Anioreporte" caption="Anioreporte" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="Buscaranioreporte" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="2015">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="78" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Ano" logicOperator="And" parameterSource="2013" parameterType="Expression" searchConditionType="GreaterThan"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="79" posHeight="88" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_anio"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="80" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="81" dataType="Integer" fieldName="Ano" tableName="mc_c_anio"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="120" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="busqproveedor" wizardEmptyCaption="Seleccionar Valor" PathID="Buscarbusqproveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="121" posHeight="180" posLeft="10" posTop="10" posWidth="158" schemaName="dbo" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="122" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
						<Field id="123" fieldName="nombre" tableName="mc_c_proveedor"/>
					</Fields>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="129"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
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
		<EditableGrid id="93" urlType="Relative" secured="False" emptyRows="0" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" sourceType="SQL" defaultPageSize="20" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="GridEntregables" connection="cnDisenio" dataSource="SELECT e.id_registro, c.id_entregable, c.entregable, c.periodicidad, p.nombre proveedor, e.entregado, e.comentarios, m.mes, e.anio_corte 
FROM entregables_periodicos_smda4 e
LEFT JOIN mc_c_entregables_periodicos c ON e.id_entregable=c.id_entregable
LEFT JOIN mc_c_mes m ON m.IdMes = e.mes_corte
LEFT JOIN mc_c_proveedor p ON p.id_proveedor = e.id_proveedor
WHERE e.mes_corte = {MesReporte} and e.anio_corte = {anioreporte} AND e.id_proveedor = {busqproveedor}" pageSizeLimit="100" wizardGridPageSize="True" wizardUseSearch="False" allowCancel="False" wizardSubmitConfirmation="False" wizardCaption="GridEntregables" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridKey="id_registro" wizardGridPaging="Simple" wizardAddNbsp="False" wizardTotalRecords="False" wizardButtonsType="button" changedCaptionEditableGrid="True" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardType="EditableGrid" wizardThemeApplyTo="Page" addTemplatePanel="False" PathID="GridEntregables" customUpdateType="Table" customUpdate="entregables_periodicos_smda4" activeCollection="UConditions" activeTableType="customUpdate">
			<Components>
				<Sorter id="99" visible="True" name="Sorter_proveedor" column="proveedor" wizardCaption="Proveedor" wizardSortingType="SimpleDir" wizardControl="proveedor" wizardAddNbsp="False" PathID="GridEntregablesSorter_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="100" visible="True" name="Sorter_entregado" column="entregado" wizardCaption="Entregado" wizardSortingType="SimpleDir" wizardControl="entregado" wizardAddNbsp="False" PathID="GridEntregablesSorter_entregado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="101" visible="True" name="Sorter_mes" column="mes" wizardCaption="Mes" wizardSortingType="SimpleDir" wizardControl="mes" wizardAddNbsp="False" PathID="GridEntregablesSorter_mes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="102" visible="True" name="Sorter_anio_corte" column="anio_corte" wizardCaption="Anio Corte" wizardSortingType="SimpleDir" wizardControl="anio_corte" wizardAddNbsp="False" PathID="GridEntregablesSorter_anio_corte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="105" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="entregable" fieldSource="entregable" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Entregable" PathID="GridEntregablesentregable">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="106" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="periodicidad" fieldSource="periodicidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Periodicidad" PathID="GridEntregablesperiodicidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="107" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="proveedor" fieldSource="proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Proveedor" PathID="GridEntregablesproveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ListBox id="108" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="entregado" fieldSource="entregado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Entregado" caption="Entregado" required="True" unique="False" connection="cnDisenio" dataSource="0;No;1;NoAplica;2;Si" PathID="GridEntregablesentregado">
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
				<TextArea id="109" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="comentarios" fieldSource="comentarios" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Comentarios" caption="Comentarios" required="False" unique="False" wizardSize="50" wizardRows="3" PathID="GridEntregablescomentarios">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Label id="110" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mes" fieldSource="mes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Mes" PathID="GridEntregablesmes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="111" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="anio_corte" fieldSource="anio_corte" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardCaption="Anio Corte" PathID="GridEntregablesanio_corte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="112" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="113" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardCaption="Enviar" PathID="GridEntregablesButton_Submit">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Sorter id="98" visible="True" name="Sorter_periodicidad" column="periodicidad" PathID="GridEntregablesSorter_periodicidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="97" visible="True" name="Sorter_entregable" column="entregable" PathID="GridEntregablesSorter_entregable">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Hidden id="104" fieldSourceType="DBColumn" dataType="Integer" name="id_entregable" caption="Id Entregable" fieldSource="id_entregable" required="False" unique="False" PathID="GridEntregablesid_entregable">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="118"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="138"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="134" dataType="Integer" defaultValue="1" parameterSource="MesReporte" parameterType="URL" variable="MesReporte"/>
				<SQLParameter id="135" dataType="Integer" defaultValue="2015" parameterSource="anioreporte" parameterType="URL" variable="anioreporte"/>
				<SQLParameter id="136" dataType="Integer" defaultValue="1" parameterSource="busqproveedor" parameterType="URL" variable="busqproveedor"/>
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
				<TableParameter id="117" conditionType="Parameter" useIsNull="False" field="id_registro" dataType="Integer" searchConditionType="Equal" parameterType="DataSourceColumn" logicOperator="And" parameterSource="id_registro"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="115" field="entregado" dataType="Integer" parameterType="Control" parameterSource="entregado"/>
				<CustomParameter id="116" field="comentarios" dataType="Memo" parameterType="Control" parameterSource="comentarios"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
		<Link id="133" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lnkexcellista" PathID="lnkexcellista" hrefSource="EntregablesExcel.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'&lt;img style=\'BORDER-LEFT-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px; VERTICAL-ALIGN: middle; BORDER-BOTTOM-WIDTH: 0px; BORDER-TOP-WIDTH: 0px; border-image: none\'  src=\'images/xls.jpg\' width=\'20\' height=\'20\'&gt;&amp;nbsp;Excel Lista de Entregables','textSourceDB':'','hrefSource':'EntregablesExcel.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="139"/>
</Actions>
</Event>
</Events>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Record id="44" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="GenList" connection="cnDisenio" dataSource="entregables_periodicos_smda4" customInsertType="SQL" customInsert="INSERT INTO entregables_periodicos_smda4(entregado, comentarios, anio_corte, mes_corte, id_entregable, id_proveedor) 
SELECT e.entregado ,NULL, {AnioGenCorte}, {MesGenCorte}, c.id_entregable, {Genproveedor}
FROM mc_c_entregables_periodicos c 
LEFT JOIN entregables_periodicos_smda4 e ON e.id_entregable = c.id_entregable
LEFT JOIN mc_c_proveedor p ON p.id_proveedor = e.id_proveedor
WHERE e.mes_corte=MONTH(DATEADD(mm, -1, '{AnioGenCorte}-{MesGenCorte}-1')) 
AND e.anio_corte = YEAR(DATEADD(mm, -1, '{AnioGenCorte}-{MesGenCorte}-1'))
AND e.id_proveedor = {Genproveedor}
AND (c.proveedor = 'CDS Y CAPC'
OR c.proveedor = p.descripcion)" PathID="GenList">
			<Components>
				<Button id="46" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Generar" operation="Insert" PathID="GenListButton_Generar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="82" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="MesGenCorte" caption="Mes Reporte" fieldSource="MesReporte" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date('m')" required="False" unique="False" PathID="GenListMesGenCorte">
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
				<ListBox id="83" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="AnioGenCorte" caption="Anioreporte" fieldSource="anioreporte" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="2015" required="False" unique="False" PathID="GenListAnioGenCorte">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="84" conditionType="Parameter" useIsNull="False" field="Ano" dataType="Integer" searchConditionType="GreaterThan" parameterType="Expression" parameterSource="2013" logicOperator="And"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="85" tableName="mc_c_anio" posWidth="95" posHeight="88" posLeft="10" posTop="10"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="86" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="87" tableName="mc_c_anio" fieldName="Ano" dataType="Integer"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="124" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="Genproveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre" PathID="GenListGenproveedor">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="125" tableName="mc_c_proveedor" posWidth="158" posHeight="180" posLeft="10" posTop="10"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="126" tableName="mc_c_proveedor" fieldName="id_proveedor"/>
						<Field id="127" tableName="mc_c_proveedor" fieldName="nombre"/>
					</Fields>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="137"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="91" variable="MesGenCorte" dataType="Integer" parameterType="Control" parameterSource="MesGenCorte" defaultValue="1"/>
				<SQLParameter id="92" variable="AnioGenCorte" dataType="Integer" parameterType="Control" parameterSource="AnioGenCorte" defaultValue="2015"/>
				<SQLParameter id="128" variable="Genproveedor" dataType="Integer" parameterType="Control" parameterSource="Genproveedor" defaultValue="0"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="88" field="MesReporte" dataType="Integer" parameterType="Control" parameterSource="MesGenReporte"/>
				<CustomParameter id="89" field="anioreporte" dataType="Integer" parameterType="Control" parameterSource="anioGenReporte"/>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="ListadoVerificacionEntregables_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="ListadoVerificacionEntregables.php" forShow="True" url="ListadoVerificacionEntregables.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
