<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\Catalogos" secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="24" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_usuariosSearch" searchIds="24" fictitiousConnection="cnDisenio" wizardCaption="  Buscar" wizardOrientation="Vertical" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardType="GridRecord" returnPage="Usuarios.ccp" PathID="mc_c_usuariosSearch" composition="3">
			<Components>
				<Button id="25" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_c_usuariosSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Usuario" fieldSource="Usuario" wizardIsPassword="False" wizardCaption="Usuario" caption="Usuario" required="False" unique="False" wizardSize="15" wizardMaxLength="15" PathID="mc_c_usuariosSearchs_Usuario">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Grupo" fieldSource="Grupo" wizardIsPassword="False" wizardCaption="Grupo" caption="Grupo" required="False" unique="False" wizardSize="15" wizardMaxLength="15" PathID="mc_c_usuariosSearchs_Grupo" sourceType="ListOfValues" dataSource="SAT;SAT;CAPC;CAPC;CDS;CDS">
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
		<Grid id="3" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="25" name="mc_c_usuarios" connection="cnDisenio" dataSource="mc_c_usuarios" pageSizeLimit="100" pageSize="True" wizardCaption="Lista de Usuarios" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="True" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="GridRecord" wizardGridRecordLinkFieldType="field" wizardGridRecordLinkField="Id" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="mc_c_usuarios" composition="4" isParent="True">
			<Components>
				<Link id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="mc_c_usuarios_Insert" hrefSource="Usuarios.ccp" removeParameters="Id" wizardThemeItem="FooterA" wizardDefaultValue="Agregar Nuevo" wizardUseTemplateBlock="False" PathID="mc_c_usuariosmc_c_usuarios_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="7" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mc_c_usuarios_TotalRecords" wizardUseTemplateBlock="False" PathID="mc_c_usuariosmc_c_usuarios_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="8"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="11" visible="True" name="Sorter_Id" column="Id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="Id" wizardAddNbsp="False" PathID="mc_c_usuariosSorter_Id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="12" visible="True" name="Sorter_Usuario" column="Usuario" wizardCaption="Usuario" wizardSortingType="SimpleDir" wizardControl="Usuario" wizardAddNbsp="False" PathID="mc_c_usuariosSorter_Usuario">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="13" visible="True" name="Sorter_Nivel" column="Nivel" wizardCaption="Nivel" wizardSortingType="SimpleDir" wizardControl="Nivel" wizardAddNbsp="False" PathID="mc_c_usuariosSorter_Nivel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_Grupo" column="Grupo" wizardCaption="Grupo" wizardSortingType="SimpleDir" wizardControl="Grupo" wizardAddNbsp="False" PathID="mc_c_usuariosSorter_Grupo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="Id" fieldSource="Id" wizardCaption="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" linkProperties="''" wizardAlign="right" wizardAddNbsp="True" wizardThemeItem="GridA" PathID="mc_c_usuariosId" urlType="Relative">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="16" sourceType="DataField" format="yyyy-mm-dd" name="Id" source="Id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Usuario" fieldSource="Usuario" wizardCaption="Usuario" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_usuariosUsuario">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="20" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Nivel" fieldSource="Nivel" wizardCaption="Nivel" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_c_usuariosNivel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Grupo" fieldSource="Grupo" wizardCaption="Grupo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_usuariosGrupo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="23" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="56" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Nombre" PathID="mc_c_usuariosNombre" fieldSource="Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="88" conditionType="Parameter" useIsNull="False" dataType="Text" field="Usuario" logicOperator="And" orderNumber="1" parameterSource="s_Usuario" parameterType="URL" searchConditionType="Contains" searchFormParameter="True"/>
<TableParameter id="89" conditionType="Parameter" useIsNull="False" dataType="Text" field="Grupo" logicOperator="And" orderNumber="2" parameterSource="s_Grupo" parameterType="URL" searchConditionType="Contains" searchFormParameter="True"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="87" posHeight="180" posLeft="10" posTop="10" posWidth="118" tableName="mc_c_usuarios"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="90" fieldName="Id" tableName="mc_c_usuarios"/>
<Field id="91" fieldName="Usuario" tableName="mc_c_usuarios"/>
<Field id="92" fieldName="Nivel" tableName="mc_c_usuarios"/>
<Field id="93" fieldName="Grupo" tableName="mc_c_usuarios"/>
<Field id="94" fieldName="Nombre" tableName="mc_c_usuarios"/>
</Fields>
			<PKFields>
				<PKField id="95" dataType="Integer" fieldName="Id" tableName="mc_c_usuarios"/>
</PKFields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="28" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_usuarios1" connection="cnDisenio" dataSource="mc_c_usuarios" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="True" encryptPasswordFieldName="Clave" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Editar Usuario" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="GridRecord" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_c_usuarios1" composition="2">
			<Components>
				<Button id="31" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_c_usuarios1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="33" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_c_usuarios1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Usuario" fieldSource="Usuario" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Usuario" caption="Usuario" required="True" unique="False" wizardSize="15" wizardMaxLength="15" PathID="mc_c_usuarios1Usuario">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Clave" fieldSource="Clave" wizardIsPassword="True" wizardUseTemplateBlock="False" wizardCaption="Clave" caption="Clave" required="True" unique="False" wizardSize="15" wizardMaxLength="15" PathID="mc_c_usuarios1Clave">
					<Components/>
					<Events>
						<Event name="OnValidate" type="Server">
							<Actions>
								<Action actionName="Reset Password Validation" actionCategory="Security" id="38" passwordControlName="Clave" id_oncopy="38"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="39" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="Nivel" fieldSource="Nivel" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Nivel" caption="Nivel" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" dataSource="1;Visitante;2;Capturista;3;Analista;4;Supervisor;5;Administrador" PathID="mc_c_usuarios1Nivel">
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
				<ListBox id="40" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="Grupo" fieldSource="Grupo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Grupo" caption="Grupo" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" dataSource="SLAs;SLAs;CAPC;CAPC;CDS;CDS;MyM;MyM" PathID="mc_c_usuarios1Grupo">
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
				<Hidden id="41" fieldSourceType="DBColumn" dataType="Text" name="Clave_Shadow" PathID="mc_c_usuarios1Clave_Shadow">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UsrSharepoint" PathID="mc_c_usuarios1UsrSharepoint" fieldSource="UsrSharePoint">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PwdSharePoint" PathID="mc_c_usuarios1PwdSharePoint" fieldSource="PwdSharePoint">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CDSDefault" PathID="mc_c_usuarios1CDSDefault" fieldSource="CDSDefault" sourceType="Table" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre" defaultValue="0">
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
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Nombre" PathID="mc_c_usuarios1Nombre" fieldSource="Nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="74" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="CheckBox1" PathID="mc_c_usuarios1CheckBox1" fieldSource="Activo" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Preserve Password" actionCategory="Security" id="30" passwordControlName="Clave" shadowControlName="Clave_Shadow" id_oncopy="30"/>
						<Action actionName="Custom Code" actionCategory="General" id="75"/>
					</Actions>
				</Event>
				<Event name="BeforeBuildInsert" type="Server">
					<Actions>
						<Action actionName="Encrypt Password" actionCategory="Security" id="32" passwordControlName="Clave" shadowControlName="Clave_Shadow" id_oncopy="32"/>
					</Actions>
				</Event>
				<Event name="BeforeBuildUpdate" type="Server">
					<Actions>
						<Action actionName="Encrypt Password" actionCategory="Security" id="34" passwordControlName="Clave" shadowControlName="Clave_Shadow" id_oncopy="34"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="53" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Id" logicOperator="And" orderNumber="1" parameterSource="Id" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="52" posHeight="180" posLeft="10" posTop="10" posWidth="118" tableName="mc_c_usuarios"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="54" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="55" dataType="Integer" fieldName="Id" tableName="mc_c_usuarios"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="Usuarios.php" forShow="True" url="Usuarios.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="Usuarios_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="42" groupID="4"/>
		<Group id="43" groupID="5"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="77"/>
			</Actions>
		</Event>
	</Events>
</Page>