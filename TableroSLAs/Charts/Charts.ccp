<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\Charts" secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="4" name="Header" PathID="Header" page="../Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="5" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_metrica" searchIds="5" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_c_metrica" wizardCaption="  Seleccionar Nivel de Servicio" changedCaptionSearch="True" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="mc_c_metrica">
			<Components>
				<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_c_metricaButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<CheckBoxList id="7" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" html="True" returnValueType="Number" name="s_Acronimo" fieldSource="Acronimo" wizardIsPassword="False" wizardCaption="Acronimo" caption="Acronimo" required="False" unique="False" PathID="mc_c_metricas_Acronimo" connection="cnDisenio" dataSource="mc_c_metrica, mc_metrica_atributo" boundColumn="Acronimo" textColumn="mc_c_metrica_nombre" orderBy="valor">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="30" conditionType="Expression" useIsNull="False" dataType="Text" expression="Acronimo is not null" field="mc_c_metrica.Acronimo" logicOperator="And" parameterSource="Acronimo" parameterType="Expression" searchConditionType="Equal"/>
						<TableParameter id="31" conditionType="Parameter" useIsNull="False" dataType="Text" field="mc_metrica_atributo.nombre" logicOperator="And" parameterSource="'Orden'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="27" posHeight="180" posLeft="10" posTop="10" posWidth="117" tableName="mc_c_metrica"/>
						<JoinTable id="28" posHeight="180" posLeft="148" posTop="10" posWidth="149" tableName="mc_metrica_atributo"/>
					</JoinTables>
					<JoinLinks>
						<JoinTable2 id="29" conditionType="Equal" fieldLeft="mc_c_metrica.id_ver_metrica" fieldRight="mc_metrica_atributo.id_ver_metrica" joinType="inner" tableLeft="mc_c_metrica" tableRight="mc_metrica_atributo"/>
					</JoinLinks>
					<Fields>
						<Field id="32" fieldName="Acronimo" tableName="mc_c_metrica"/>
						<Field id="33" alias="mc_c_metrica_nombre" fieldName="mc_c_metrica.nombre" tableName="mc_c_metrica"/>
					</Fields>
					<PKFields>
					</PKFields>
					<Attributes/>
					<Features/>
				</CheckBoxList>
				<ListBox id="17" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_Anio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_c_metricas_Anio" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="date('Y')">
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
				<ListBox id="18" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="s_Metrica" wizardEmptyCaption="Seleccionar Valor" PathID="mc_c_metricas_Metrica" dataSource="0;% Cumplimiento;1;# Medidos;2;# Cumplen" defaultValue="0">
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
				<ListBox id="34" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_Mes" wizardEmptyCaption="Seleccionar Valor" PathID="mc_c_metricas_Mes" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
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
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="Charts.php" forShow="True" url="Charts.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="Charts_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="2"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="3"/>
			</Actions>
		</Event>
	</Events>
</Page>
