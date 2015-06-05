<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="26" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="25" name="Grid1" connection="cnDisenio" dataSource="
select 
	s.* 
	, p.nombre proveedor
	, ts.nombre tipo_de_servicio
from c_servicio s
	inner join c_tipo_servicio ts on ts.id_tipo_servicio = s.id_tipo_servicio 
	left join proveedor_servicio ps on ps.id_servicio = s.id_servicio 
	left join c_proveedor p on p.id_proveedor = ps.id_proveedor 
where  (s.id_tipo_servicio={s_id_tipo_servicio} or ({s_id_tipo_servicio}=0 and s.id_tipo_servicio in (1,2) ))
	and s.nombre like '%{s_nomre}%'
    and (p.id_proveedor = {s_idProveedor} or {s_idProveedor}=0)" pageSizeLimit="100" pageSize="True" wizardCaption="Lista de Servicios" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Centered" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" wizardAllowSorting="True">
			<Components>
				<Sorter id="27" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="Grid1Sorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="28" visible="True" name="Sorter_descripcion" column="descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="descripcion" wizardAddNbsp="False" PathID="Grid1Sorter_descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="29" visible="True" name="Sorter_tipo_de_servicio" column="tipo_de_servicio" wizardCaption="Tipo De Servicio" wizardSortingType="SimpleDir" wizardControl="tipo_de_servicio" wizardAddNbsp="False" PathID="Grid1Sorter_tipo_de_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1nombre" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="EditarServicios.ccp" linkProperties="{'textSource':'','textSourceDB':'nombre','hrefSource':'EditarServicios.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id_servicio','parameterName':'id_servicio'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="59" sourceType="DataField" name="id_servicio" source="id_servicio"/>
					</LinkParameters>
				</Link>
				<Label id="32" fieldSourceType="DBColumn" dataType="Text" html="False" name="descripcion" fieldSource="descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="tipo_de_servicio" fieldSource="tipo_de_servicio" wizardCaption="Tipo De Servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1tipo_de_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="34" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="50" fieldSourceType="DBColumn" dataType="Text" html="False" name="lProveedor" PathID="Grid1lProveedor" fieldSource="proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="54" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="Grid1Sorter1" wizardCaption="Proveedor" column="proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="30" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="51" dataType="Text" parameterSource="s_nomre" parameterType="URL" variable="s_nomre"/>
				<SQLParameter id="52" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_id_tipo_servicio" parameterType="URL" variable="s_id_tipo_servicio"/>
				<SQLParameter id="53" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_idProveedor" parameterType="URL" variable="s_idProveedor"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="35" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Grid2" searchIds="35" fictitiousConnection="cnDisenio" fictitiousDataSource="c_servicio" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Vertical" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="True" wizardResultsForm="Grid1" returnPage="ListaServicios.ccp" PathID="Grid2">
			<Components>
				<Button id="36" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="Grid2Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_nombre" fieldSource="nombre" wizardIsPassword="False" wizardCaption="Nombre" caption="Nombre" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="Grid2s_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="40" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_tipo_servicio" fieldSource="id_tipo_servicio" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Tipo Servicio" caption="Id Tipo Servicio" required="False" unique="False" connection="cnDisenio" dataSource="c_tipo_servicio" boundColumn="id_tipo_servicio" textColumn="nombre" PathID="Grid2s_id_tipo_servicio">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="56" conditionType="Expression" useIsNull="False" dataType="Integer" expression="id_tipo_servicio in (1,2)" field="id_tipo_servicio" logicOperator="And" parameterSource="id_tipo_servicio" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="55" posHeight="104" posLeft="10" posTop="10" posWidth="104" tableName="c_tipo_servicio"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="57" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="58" dataType="Integer" fieldName="id_tipo_servicio" tableName="c_tipo_servicio"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="48" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_idProveedor" wizardEmptyCaption="Seleccionar Valor" PathID="Grid2s_idProveedor" connection="cnDisenio" dataSource="c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="49" tableName="c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events/>
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
		<IncludePage id="60" name="Header" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="ListaServicios_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="ListaServicios.php" forShow="True" url="ListaServicios.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="25"/>
			</Actions>
		</Event>
	</Events>
</Page>
