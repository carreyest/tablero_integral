<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\Catalogos" secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="30" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Grid2" searchIds="30" fictitiousConnection="ConnCarga" fictitiousDataSource="c_mapeo_admin_serv_rape_repo" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="True" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="True" wizardResultsForm="Grid1" returnPage="EquivalenciasReportes.ccp" PathID="Grid2">
			<Components>
				<Button id="31" urlType="Relative" enableValidation="True" isDefault="True" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="Grid2Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_id_admon" fieldSource="id_admon" wizardIsPassword="False" wizardCaption="Id Admon" caption="Id Admon" required="False" unique="False" wizardSize="50" wizardMaxLength="150" PathID="Grid2s_id_admon">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_id_servicio" fieldSource="id_servicio" wizardIsPassword="False" wizardCaption="Id Servicio" caption="Id Servicio" required="False" unique="False" wizardSize="50" wizardMaxLength="150" PathID="Grid2s_id_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_id_rape" fieldSource="id_rape" wizardIsPassword="False" wizardCaption="Id Rape" caption="Id Rape" required="False" unique="False" wizardSize="50" wizardMaxLength="150" PathID="Grid2s_id_rape">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
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
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="Grid1" connection="ConnCarga" dataSource="select m.id_mapeo, a.administracion, s.servicio_negocio,  r.rape , r.id_rape, s.id_servicio
from c_mapeo_admin_serv_rape_repo m 
inner join c_administracion_repo a on m.id_admon=a.id_admon
inner join c_rape_repo r on    m.id_rape=r.id_rape
inner join c_servicio_negocio_repo s on m.id_servicio=s.id_servicio 
where a.administracion like '%{s_Admon}%'
	and s.servicio_negocio like '%{s_Servicio}%'
	and r.rape like '%{s_RAPE}%'" pageSizeLimit="100" pageSize="True" wizardCaption="Matriz de Relaciones" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="GridRecord" wizardGridRecordLinkFieldType="field" wizardGridRecordLinkField="id_mapeo" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="Grid1" composition="1" isParent="True">
			<Components>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Grid1_Insert" hrefSource="EquivalenciasReportes.ccp" removeParameters="id_mapeo" wizardThemeItem="FooterA" wizardDefaultValue="Agregar Nuevo" wizardUseTemplateBlock="False" PathID="Grid1Grid1_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="5" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Grid1_TotalRecords" wizardUseTemplateBlock="False" PathID="Grid1Grid1_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="6" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="7" visible="True" name="Sorter_id_mapeo" column="id_mapeo" wizardCaption="Id Mapeo" wizardSortingType="SimpleDir" wizardControl="id_mapeo" wizardAddNbsp="False" PathID="Grid1Sorter_id_mapeo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_administracion" column="administracion" wizardCaption="Administracion" wizardSortingType="SimpleDir" wizardControl="administracion" wizardAddNbsp="False" PathID="Grid1Sorter_administracion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="9" visible="True" name="Sorter_servicio_negocio" column="servicio_negocio" wizardCaption="Servicio Negocio" wizardSortingType="SimpleDir" wizardControl="servicio_negocio" wizardAddNbsp="False" PathID="Grid1Sorter_servicio_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="10" visible="True" name="Sorter_rape" column="rape" wizardCaption="Rape" wizardSortingType="SimpleDir" wizardControl="rape" wizardAddNbsp="False" PathID="Grid1Sorter_rape">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="id_mapeo" fieldSource="id_mapeo" wizardCaption="Id Mapeo" wizardIsPassword="False" wizardUseTemplateBlock="False" linkProperties="''" wizardAlign="right" wizardAddNbsp="True" wizardThemeItem="GridA" PathID="Grid1id_mapeo" urlType="Relative">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="12" sourceType="DataField" format="yyyy-mm-dd" name="id_mapeo" source="id_mapeo"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="13" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="administracion" fieldSource="administracion" wizardCaption="Administracion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1administracion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="14" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_negocio" fieldSource="servicio_negocio" wizardCaption="Servicio Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1servicio_negocio" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" linkProperties="{'textSource':'','textSourceDB':'servicio_negocio','hrefSource':'','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id_servicio','parameterName':'id_servicio'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="70" sourceType="DataField" name="id_servicio" source="id_servicio"/>
					</LinkParameters>
				</Link>
				<Link id="15" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="rape" fieldSource="rape" wizardCaption="Rape" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1rape" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" linkProperties="{'textSource':'','textSourceDB':'rape','hrefSource':'','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id_rape','parameterName':'id_rape'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="52" sourceType="DataField" name="id_rape" source="id_rape"/>
					</LinkParameters>
				</Link>
				<Navigator id="16" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="67" dataType="Text" parameterSource="s_id_rape" parameterType="URL" variable="s_RAPE"/>
				<SQLParameter id="68" dataType="Text" parameterSource="s_id_admon" parameterType="URL" variable="s_Admon"/>
				<SQLParameter id="69" dataType="Text" parameterSource="s_id_servicio" parameterType="URL" variable="s_Servicio"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="17" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="c_mapeo_admin_serv_rape_r" connection="ConnCarga" dataSource="c_mapeo_admin_serv_rape_repo" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="id_mapeo" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Agregar/Editar Mapeo" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="GridRecord" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="c_mapeo_admin_serv_rape_r" composition="9">
			<Components>
				<Button id="19" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="c_mapeo_admin_serv_rape_rButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="20" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="c_mapeo_admin_serv_rape_rButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="21" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="c_mapeo_admin_serv_rape_rButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="22" message="Borrar registro?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="23" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancelar" PathID="c_mapeo_admin_serv_rape_rButton_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="25" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="id_admon" fieldSource="id_admon" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Admon" caption="Id Admon" required="True" unique="False" connection="ConnCarga" wizardEmptyCaption="Seleccionar Valor" PathID="c_mapeo_admin_serv_rape_rid_admon" dataSource="c_administracion_repo" boundColumn="id_admon" textColumn="administracion">
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
				<ListBox id="26" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="id_servicio" fieldSource="id_servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Servicio" caption="Id Servicio" required="True" unique="False" connection="ConnCarga" wizardEmptyCaption="Seleccionar Valor" PathID="c_mapeo_admin_serv_rape_rid_servicio" dataSource="c_servicio_negocio_repo" boundColumn="id_servicio" textColumn="servicio_negocio">
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
				<ListBox id="27" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="id_rape" fieldSource="id_rape" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Rape" caption="Id Rape" required="True" unique="False" connection="ConnCarga" wizardEmptyCaption="Seleccionar Valor" PathID="c_mapeo_admin_serv_rape_rid_rape" dataSource="c_rape_repo" boundColumn="id_rape" textColumn="rape">
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
				<ListBox id="28" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="id_administrador" fieldSource="id_administrador" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Administrador" caption="Id Administrador" required="True" unique="False" connection="ConnCarga" wizardEmptyCaption="Seleccionar Valor" PathID="c_mapeo_admin_serv_rape_rid_administrador" dataSource="c_administrador_repo" boundColumn="id_administrador" textColumn="administrador">
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
				<CheckBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="estatus" fieldSource="estatus" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Estatus" checkedValue="1" uncheckedValue="0" PathID="c_mapeo_admin_serv_rape_restatus" defaultValue="Checked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="24" conditionType="Parameter" useIsNull="False" field="id_mapeo" parameterSource="id_mapeo" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="18" tableName="c_mapeo_admin_serv_rape_repo"/>
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
		<Record id="42" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="c_rape_repo" connection="ConnCarga" dataSource="c_rape_repo" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id_rape" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Agregar/Editar Rape" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="c_rape_repo">
			<Components>
				<Button id="44" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="c_rape_repoButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="45" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="c_rape_repoButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="rape" fieldSource="rape" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Rape" caption="Rape" required="True" unique="False" wizardSize="50" wizardMaxLength="150" PathID="c_rape_reporape">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="estatus" fieldSource="estatus" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Estatus" checkedValue="1" uncheckedValue="0" PathID="c_rape_repoestatus" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="id_rape" parameterSource="id_rape" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="53" tableName="c_rape_repo"/>
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
		<Record id="54" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="c_servicio_negocio_ppm_ap" connection="ConnCarga" dataSource="c_servicio_negocio_ppm_aplicativo_repo" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id_mapa_servicio" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Agregar/Editar Alias de Servicio de Negocio" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="c_servicio_negocio_ppm_ap">
			<Components>
				<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="c_servicio_negocio_ppm_apButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="servicio_negocio_aplic" fieldSource="servicio_negocio_aplic" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicio Negocio Aplic" caption="Servicio Negocio Aplic" required="True" unique="False" wizardSize="50" wizardMaxLength="150" PathID="c_servicio_negocio_ppm_apservicio_negocio_aplic">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="59" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="servicio_negocio_ppm" fieldSource="servicio_negocio_ppm" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicio Negocio Ppm" caption="Servicio Negocio Ppm" required="True" unique="False" wizardSize="50" wizardMaxLength="150" PathID="c_servicio_negocio_ppm_apservicio_negocio_ppm">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="60" fieldSourceType="DBColumn" dataType="Integer" name="estatus" fieldSource="estatus" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Estatus" caption="Estatus" required="True" unique="False" PathID="c_servicio_negocio_ppm_apestatus" defaultValue="1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="76" fieldSourceType="DBColumn" dataType="Text" name="id_servicio" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="c_servicio_negocio_ppm_apid_servicio" fieldSource="id_servicio" defaultValue="CCGetParam(&quot;id_servicio&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
			<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="77"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="72" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id_mapa_servicio" logicOperator="And" orderNumber="1" parameterSource="id_mapa_servicio" parameterType="URL" searchConditionType="Equal"/>
</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="71" posHeight="136" posLeft="10" posTop="10" posWidth="150" tableName="c_servicio_negocio_ppm_aplicativo_repo"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
<Field id="73" fieldName="*"/>
</Fields>
			<PKFields>
<PKField id="74" dataType="Text" fieldName="servicio_negocio_aplic" tableName="c_servicio_negocio_ppm_aplicativo_repo"/>
<PKField id="75" dataType="Text" fieldName="servicio_negocio_ppm" tableName="c_servicio_negocio_ppm_aplicativo_repo"/>
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
		<Grid id="61" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="15" name="c_servicio_negocio_ppm_ap1" connection="ConnCarga" dataSource="SELECT * 
FROM c_servicio_negocio_ppm_aplicativo_repo 
where servicio_negocio_aplic = (select servicio_negocio from c_servicio_negocio_repo where id_servicio={id_servicio})" pageSizeLimit="100" pageSize="True" wizardCaption="Alias del Servicio de Negocio" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="Simple" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="c_servicio_negocio_ppm_ap1">
			<Components>
				<Sorter id="63" visible="True" name="Sorter_servicio_negocio_ppm" column="servicio_negocio_ppm" wizardCaption="Servicio Negocio Ppm" wizardSortingType="Simple" wizardControl="servicio_negocio_ppm" wizardAddNbsp="False" PathID="c_servicio_negocio_ppm_ap1Sorter_servicio_negocio_ppm">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="64" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="servicio_negocio_ppm" fieldSource="servicio_negocio_ppm" wizardCaption="Servicio Negocio Ppm" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="c_servicio_negocio_ppm_ap1servicio_negocio_ppm">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="65" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="66" dataType="Integer" defaultValue="0" designDefaultValue="1" parameterSource="id_servicio" parameterType="URL" variable="id_servicio"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="EquivalenciasReportes_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="EquivalenciasReportes.php" forShow="True" url="EquivalenciasReportes.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
