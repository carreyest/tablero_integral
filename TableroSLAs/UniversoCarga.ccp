<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<IncludePage id="20" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="cnDisenio" name="universo_cds" dataSource="mc_universo_cds" errorSummator="Error" wizardCaption="Agregar/Editar Universo Cds " wizardFormMethod="post" PathID="universo_cds" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customInsertType="SQL" customInsert="Select 1" returnPage="UniversoLista.ccp">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="universo_cdsButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="4" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="id_proveedor" fieldSource="id_proveedor" required="True" caption="CDS" wizardCaption="Id Proveedor" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="universo_cdsid_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre" activeCollection="TableParameters">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="5" conditionType="Parameter" useIsNull="False" field="descripcion" dataType="Text" searchConditionType="Equal" parameterType="Expression" logicOperator="And" parameterSource="&quot;CDS&quot;"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
					<PKFields/>
				</ListBox>
				<TextArea id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="txtIncidentes" fieldSource="numero" required="True" caption="Numero" wizardCaption="Numero" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="universo_cdstxtIncidentes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<ListBox id="8" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="mes" fieldSource="mes" required="True" caption="Mes" wizardCaption="Mes" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="universo_cdsmes" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" activeCollection="TableParameters" defaultValue="date('m')"><Components/>
					<Events/>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="33" posHeight="104" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_mes"/>
					</JoinTables>
					<JoinLinks>
					</JoinLinks>
					<Fields>
						<Field id="34" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
					<PKFields/>
				</ListBox>
				<ListBox id="15" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="anio" fieldSource="anio" required="True" caption="Anio" wizardCaption="Anio" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="universo_cdsanio" connection="cnDisenio" dataSource="2013;2013;2014;2014;2015;2015" defaultValue="date('Y')"><Components/>
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
				</ListBox>
				<TextArea id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="txtPPMC_Aprobados" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="universo_cdstxtPPMC_Aprobados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextArea id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="txtPPMC_Cerrados" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="universo_cdstxtPPMC_Cerrados">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
			</Components>
			<Events>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="19" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="22"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="18" conditionType="Parameter" useIsNull="False" field="id" parameterSource="id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
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
			<PKFields/>
		</Record>
		<Record id="23" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="GeneraUniverso" actionPage="UniversoCarga" errorSummator="Error" wizardFormMethod="post" PathID="GeneraUniverso" wizardOrientation="Vertical" connection="cnDisenio" dataSource="

select valor RutaArchivos, Month(FechaCarga) MesCarga, Year(FechaCarga) AnioCarga , FechaCorte  
from mc_parametros p
	inner join (select 
	dateadd(m,1,max(convert(date,cast(anio as varchar) + '-' + cast(mes as varchar)+ '-1'))) FechaCarga,
	case when DATEPART(W, getdate()) &lt;6 then 
			DATEADD(d,(-1*(DATEPART(W, getdate())+1)),GETDATE())
		else 
			DATEADD(d,6-DATEPART(W, getdate()),getdate())
		end FechaCorte,1 id
from mc_universo_cds 
	) as  mesd  on mesd.id= p.id 
where p.parametro ='RutaArchivos CAPC'
"><Components><TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="sMesMedicion" PathID="GeneraUniversosMesMedicion" fieldSource="MesCarga"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="26" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="GeneraUniversoButton_DoSearch">
					<Components/>
					<Events>
<Event name="OnClick" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="36"/>
</Actions>
</Event>
</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="sFechaCorte" PathID="GeneraUniversosFechaCorte" features="(assigned)" fieldSource="FechaCorte" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="dd/mm/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="28" show_weekend="True" name="InlineDatePicker1" category="jQuery">
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
				</TextBox>
				<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="sRutaArchivos" PathID="GeneraUniversosRutaArchivos" fieldSource="RutaArchivos">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="sAnioMedicion" PathID="GeneraUniversosAnioMedicion" fieldSource="AnioCarga">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lMensaje" PathID="GeneraUniversolMensaje">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="32"/>
					</Actions>
				</Event>
				<Event name="OnValidate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="38"/>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="UniversoCarga.php" forShow="True" url="UniversoCarga.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="UniversoCarga_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="35" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="21"/>
			</Actions>
		</Event>
	</Events>
</Page>
