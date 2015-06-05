<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0" accessDeniedPage="Login.ccp">
	<Components>
		<Record id="15" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="grdFiltra" wizardCaption=" Grid1 Buscar" wizardOrientation="Horizontal" wizardFormMethod="post" returnPage="UniversoLista.ccp" PathID="grdFiltra">
			<Components>
				<Button id="16" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="grdFiltraButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="21" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" wizardCaption="Id Proveedor" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" PathID="grdFiltras_id_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="99" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="98" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="100" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
					<PKFields>
						<PKField id="101" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
				</ListBox>
				<ListBox id="22" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_mes" wizardCaption="Mes" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" PathID="grdFiltras_mes" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" activeCollection="TableParameters" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))">
					<Components/>
					<Events/>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="71" posHeight="104" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_mes"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="72" fieldName="*"/>
					</Fields>
					<Attributes/>
					<Features/>
					<PKFields/>
				</ListBox>
				<ListBox id="23" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_anio" wizardCaption="Anio" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" PathID="grdFiltras_anio" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="date('Y')">
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
				</ListBox>
				<ListBox id="24" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="s_tipo" wizardCaption="Tipo" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" PathID="grdFiltras_tipo" connection="cnDisenio" _valueOfList="PC" _nameOfList="PPMC de Cierre" dataSource="IN;Incidente;PA;PPMC de Apertura;PC;PPMC de Cierre">
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
				</ListBox>
				<CheckBox id="107" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="sPendientes" PathID="grdFiltrasPendientes" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextBox id="122" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Numero" PathID="grdFiltras_Numero">
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
		<IncludePage id="44" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Panel id="45" visible="Dynamic" name="Panel1" wizardInnerHTML="     &lt;!-- BEGIN Record universo_cds --&gt;
      &lt;form id=&quot;universo_cds&quot; method=&quot;post&quot; name=&quot;{HTMLFormName}&quot; action=&quot;{Action}&quot;&gt;
        &lt;table cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;
          &lt;tr&gt;
            &lt;td valign=&quot;top&quot;&gt;
              &lt;table class=&quot;Header&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;
                &lt;tr&gt;
                  &lt;td class=&quot;HeaderLeft&quot;&gt;&lt;img border=&quot;0&quot; alt=&quot;&quot; src=&quot;Styles/{CCS_Style}/Images/Spacer.gif&quot;&gt;&lt;/td&gt; 
                  &lt;td class=&quot;th&quot;&gt;&lt;strong&gt;Agregar/Editar &lt;/strong&gt;&lt;/td&gt; 
                  &lt;td class=&quot;HeaderRight&quot;&gt;&lt;img border=&quot;0&quot; alt=&quot;&quot; src=&quot;Styles/{CCS_Style}/Images/Spacer.gif&quot;&gt;&lt;/td&gt;
                &lt;/tr&gt;
              &lt;/table&gt;
 
              &lt;table class=&quot;Record&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;
                &lt;!-- BEGIN Error --&gt;
                &lt;tr class=&quot;Error&quot;&gt;
                  &lt;td colspan=&quot;2&quot;&gt;{Error}&lt;/td&gt;
                &lt;/tr&gt;
                &lt;!-- END Error --&gt;
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&lt;label for=&quot;universo_cdsid_proveedor&quot;&gt;Id Proveedor&lt;/label&gt;&lt;/td&gt; 
                  &lt;td&gt;
                    &lt;select id=&quot;universo_cdsid_proveedor&quot; name=&quot;{id_proveedor_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;Seleccionar Valor&lt;/option&gt;
                      {id_proveedor_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&lt;label for=&quot;universo_cdsnumero&quot;&gt;Numero&lt;/label&gt;&lt;/td&gt; 
                  &lt;td&gt;&lt;input id=&quot;universo_cdsnumero&quot; maxlength=&quot;25&quot; size=&quot;25&quot; value=&quot;{numero}&quot; name=&quot;{numero_Name}&quot;&gt;&lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&lt;label for=&quot;universo_cdstipo&quot;&gt;Tipo&lt;/label&gt;&lt;/td&gt; 
                  &lt;td&gt;
                    &lt;select id=&quot;universo_cdstipo&quot; name=&quot;{tipo_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;Seleccionar Valor&lt;/option&gt;
                      {tipo_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&lt;label for=&quot;universo_cdsmes&quot;&gt;Mes&lt;/label&gt;&lt;/td&gt; 
                  &lt;td&gt;
                    &lt;select id=&quot;universo_cdsmes&quot; name=&quot;{mes_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;Seleccionar Valor&lt;/option&gt;
                      {mes_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&lt;label for=&quot;universo_cdsanio&quot;&gt;Anio&lt;/label&gt;&lt;/td&gt; 
                  &lt;td&gt;
                    &lt;select id=&quot;universo_cdsanio&quot; name=&quot;{anio_Name}&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;Seleccionar Valor&lt;/option&gt;
                      {anio_Options}
                    &lt;/select&gt;
 &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Bottom&quot;&gt;
                  &lt;td colspan=&quot;2&quot; align=&quot;right&quot;&gt;
                    &lt;!-- BEGIN Button Button_Insert --&gt;&lt;input id=&quot;universo_cdsButton_Insert&quot; class=&quot;Button&quot; alt=&quot;Agregar&quot; type=&quot;submit&quot; value=&quot;Grabar&quot; name=&quot;{Button_Name}&quot;&gt;&lt;!-- END Button Button_Insert --&gt;
                    &lt;!-- BEGIN Button Button_Update --&gt;&lt;input id=&quot;universo_cdsButton_Update&quot; class=&quot;Button&quot; alt=&quot;Enviar&quot; type=&quot;submit&quot; value=&quot;Grabar&quot; name=&quot;{Button_Name}&quot;&gt;&lt;!-- END Button Button_Update --&gt;
                    &lt;!-- BEGIN Button Button_Delete --&gt;&lt;input id=&quot;universo_cdsButton_Delete&quot; class=&quot;Button&quot; alt=&quot;Borrar&quot; type=&quot;submit&quot; value=&quot;Borrar&quot; name=&quot;{Button_Name}&quot;&gt;&lt;!-- END Button Button_Delete --&gt;&lt;/td&gt;
                &lt;/tr&gt;
              &lt;/table&gt;
            &lt;/td&gt;
          &lt;/tr&gt;
        &lt;/table&gt;
      &lt;/form&gt;
      &lt;!-- END Record universo_cds --&gt;&lt;br&gt;
    " PathID="Panel1" generateDiv="False">
			<Components>
				<Record id="31" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="cnDisenio" name="universo_cds" dataSource="mc_universo_cds" errorSummator="Error" wizardCaption="Agregar/Editar Universo Cds " wizardFormMethod="post" PathID="Panel1universo_cds" removeParameters="id" customDeleteType="Procedure" parameterTypeListName="ParameterTypeList" customDelete="spD_BorraReq;1" activeCollection="DSPParameters">
					<Components>
						<Button id="32" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="Panel1universo_cdsButton_Insert">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="33" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="Panel1universo_cdsButton_Update">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="34" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="Panel1universo_cdsButton_Delete">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<ListBox id="36" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="id_proveedor" fieldSource="id_proveedor" required="True" caption="Id Proveedor" wizardCaption="Id Proveedor" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="Panel1universo_cdsid_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre" defaultValue="CCGetParam(&quot;s_id_proveedor&quot;)">
							<Components/>
							<Events/>
							<TableParameters>
								<TableParameter id="103" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
							</TableParameters>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables>
								<JoinTable id="102" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="mc_c_proveedor"/>
							</JoinTables>
							<JoinLinks/>
							<Fields>
								<Field id="104" fieldName="*"/>
							</Fields>
							<Attributes/>
							<Features/>
							<PKFields>
								<PKField id="105" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
							</PKFields>
						</ListBox>
						<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="numero" fieldSource="numero" required="True" caption="Numero" wizardCaption="Numero" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="Panel1universo_cdsnumero">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<ListBox id="38" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="tipo" fieldSource="tipo" required="True" caption="Tipo" wizardCaption="Tipo" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="Panel1universo_cdstipo" connection="cnDisenio" _valueOfList="PC" _nameOfList="PPMC de Cierre" dataSource="IN;Incidente;PA;PPMC de Aprobación;PC;PPMC de Cierre" defaultValue="CCGetParam(&quot;s_tipo&quot;)">
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
						</ListBox>
						<ListBox id="39" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="mes" fieldSource="mes" required="True" caption="Mes" wizardCaption="Mes" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="Panel1universo_cdsmes" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="CCGetParam(&quot;s_mes&quot;)">
							<Components/>
							<Events/>
							<TableParameters>
							</TableParameters>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables>
								<JoinTable id="79" posHeight="104" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_mes"/>
							</JoinTables>
							<JoinLinks/>
							<Fields>
								<Field id="80" fieldName="*"/>
							</Fields>
							<Attributes/>
							<Features/>
							<PKFields>
							</PKFields>
						</ListBox>
						<ListBox id="40" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="anio" fieldSource="anio" required="True" caption="Año" wizardCaption="Anio" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Seleccionar Valor" PathID="Panel1universo_cdsanio" connection="cnDisenio" dataSource="2012;2012;2013;2013;2014;2014;2015;2015" defaultValue="CCGetParam(&quot;s_anio&quot;)">
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
						</ListBox>
						<CheckBox id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="chkDescartar" PathID="Panel1universo_cdschkDescartar" fieldSource="descartar_manual" checkedValue="1" uncheckedValue="0">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
						<TextBox id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="notas_manual" PathID="Panel1universo_cdsnotas_manual" fieldSource="notas_manual" caption="Comentario" required="True">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<CheckBox id="96" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="NoMedir" PathID="Panel1universo_cdsNoMedir" fieldSource="NoMedir" checkedValue="1" uncheckedValue="0">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
						<Link id="97" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Panel1universo_cdsLink1" fieldSource="Limpiar Campos" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Limpiar Campos','textSourceDB':'Limpiar Campos','hrefSource':'','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="id">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<CheckBox id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="chkEsReqTeq" PathID="Panel1universo_cdschkEsReqTeq" fieldSource="EsReqTecnico" checkedValue="1" uncheckedValue="0">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
						<ListBox id="131" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="ReqTecnico" wizardEmptyCaption="Seleccionar Valor" PathID="Panel1universo_cdsReqTecnico" fieldSource="ReqTecnico" connection="cnDisenio" dataSource="mc_universo_cds" boundColumn="numero" textColumn="numero">
							<Components/>
							<Events/>
							<TableParameters>
								<TableParameter id="164" conditionType="Parameter" useIsNull="False" dataType="Integer" field="EsReqTecnico" logicOperator="And" parameterSource="1" parameterType="Expression" searchConditionType="Equal"/>
								<TableParameter id="165" conditionType="Parameter" useIsNull="False" dataType="Text" field="tipo" logicOperator="And" parameterSource="'PC'" parameterType="Expression" searchConditionType="Equal"/>
							</TableParameters>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables>
								<JoinTable id="163" posHeight="180" posLeft="10" posTop="10" posWidth="137" tableName="mc_universo_cds"/>
							</JoinTables>
							<JoinLinks/>
							<Fields>
								<Field id="166" fieldName="numero" tableName="mc_universo_cds"/>
							</Fields>
							<PKFields>
								<PKField id="167" dataType="Integer" fieldName="id" tableName="mc_universo_cds"/>
							</PKFields>
							<Attributes/>
							<Features/>
						</ListBox>
						<CheckBox id="138" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="chkSLO" PathID="Panel1universo_cdschkSLO" fieldSource="SLO" checkedValue="1" uncheckedValue="0">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
						<TextBox id="139" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IdEstimacion" PathID="Panel1universo_cdsIdEstimacion" fieldSource="IdEstimacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<CheckBox id="192" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="chkRevision" PathID="Panel1universo_cdschkRevision" fieldSource="Revision" checkedValue="1" uncheckedValue="0">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
					</Components>
					<Events>
						<Event name="BeforeExecuteInsert" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="120"/>
							</Actions>
						</Event>
						<Event name="AfterExecuteInsert" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="121"/>
							</Actions>
						</Event>
						<Event name="BeforeDelete" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="129"/>
							</Actions>
						</Event>
						<Event name="OnValidate" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="136"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="170"/>
							</Actions>
						</Event>
						<Event name="BeforeSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="171"/>
							</Actions>
						</Event>
						<Event name="AfterExecuteUpdate" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="178"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="93" conditionType="Parameter" useIsNull="False" dataType="Integer" field="id" logicOperator="And" old_temp_id="35" orderNumber="1" parameterSource="id" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="179" tableName="mc_universo_cds"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="94" fieldName="*"/>
					</Fields>
					<ISPParameters/>
					<ISQLParameters/>
					<IFormElements/>
					<USPParameters/>
					<USQLParameters/>
					<UConditions/>
					<UFormElements/>
					<DSPParameters>
						<SPParameter id="Key1" parameterName="@RETURN_VALUE" parameterSource="RETURN_VALUE" dataType="Int" parameterType="URL" dataSize="0" direction="ReturnValue" scale="0" precision="10"/>
						<SPParameter id="Key2" parameterName="@IdU" parameterSource="id" dataType="Int" parameterType="URL" dataSize="0" direction="Input" scale="0" precision="10"/>
					</DSPParameters>
					<DSQLParameters/>
					<DConditions/>
					<SecurityGroups/>
					<Attributes/>
					<Features/>
					<PKFields>
						<PKField id="95" dataType="Integer" fieldName="id" tableName="mc_universo_cds"/>
					</PKFields>
				</Record>
			</Components>
			<Events/>
			<Attributes/>
			<Features>
			</Features>
		</Panel>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="25" connection="cnDisenio" dataSource="select u.id, u.numero, p.nombre proveedor, m.mes, u.anio ,
	case when tipo ='IN' THEN 'Incidente'
		when tipo='PA' THEN 'Aprobación PPMC'
		when tipo='PC' THEN 'Cierre PPMC'
	end as desc_tipo,
	u.descartar_manual,
	u.tipo, u.medido, u.slo, u.EsReqTecnico 
from mc_universo_cds u
	left join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
	left join mc_c_mes m on m.idMes = u.mes 
where (
	(u.id_proveedor = {s_id_proveedor} or {s_id_proveedor}=0)
    and (u.mes={s_mes} or 0={s_mes})
    and (u.anio={s_anio} or 0={s_anio})
    and u.tipo like '%{s_tipo}%'
    --and (u.descartar_manual =0 or u.descartar_manual is null)
    and u.numero like '%{s_Numero}%'
) or (u.descartar_manual = {sPendientes} and  1={sPendientes})" name="grdUniverso" pageSizeLimit="100" wizardCaption=" Grid1 Lista de" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" PathID="grdUniverso">
			<Components>
				<Sorter id="3" visible="True" name="Sorter_tipo" column="tipo" wizardCaption="Tipo" wizardSortingType="SimpleDir" wizardControl="tipo" wizardAddNbsp="False" PathID="grdUniversoSorter_tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="4" visible="True" name="Sorter_numero" column="numero" wizardCaption="Numero" wizardSortingType="SimpleDir" wizardControl="numero" wizardAddNbsp="False" PathID="grdUniversoSorter_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="5" visible="True" name="Sorter_proveedor" column="proveedor" wizardCaption="Proveedor" wizardSortingType="SimpleDir" wizardControl="proveedor" wizardAddNbsp="False" PathID="grdUniversoSorter_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="6" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="grdUniversoSorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_anio" column="anio" wizardCaption="Anio" wizardSortingType="SimpleDir" wizardControl="anio" wizardAddNbsp="False" PathID="grdUniversoSorter_anio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="8" fieldSourceType="DBColumn" dataType="Text" html="False" name="tipo" fieldSource="desc_tipo" wizardCaption="Tipo" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdUniversotipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="9" fieldSourceType="DBColumn" dataType="Text" html="False" name="hnumero" fieldSource="numero" wizardCaption="Numero" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdUniversohnumero" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" linkProperties="{'textSource':'','textSourceDB':'numero','hrefSource':'','hrefSourceDB':'','title':'','target':'_self','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'1':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'2':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'3':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'4':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'5':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'length':6,'objectType':'linkParameters'}}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
					</LinkParameters>
				</Link>
				<Label id="10" fieldSourceType="DBColumn" dataType="Text" html="False" name="proveedor" fieldSource="proveedor" wizardCaption="Proveedor" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdUniversoproveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="11" fieldSourceType="DBColumn" dataType="Text" html="False" name="mes" fieldSource="mes" wizardCaption="Nombre" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdUniversomes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="12" fieldSourceType="DBColumn" dataType="Integer" html="False" name="anio" fieldSource="anio" wizardCaption="Anio" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdUniversoanio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="13" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}" PathID="grdUniversoNavigator">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="113" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descartar_manual" PathID="grdUniversodescartar_manual" fieldSource="descartar_manual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="140" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lbSLO_RT" PathID="grdUniversolbSLO_RT" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="ReqTecList.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'','textSourceDB':'','hrefSource':'ReqTecList.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Link>
				<Link id="168" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="grdUniversoLink1" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Editar','textSourceDB':'','hrefSource':'','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="169" sourceType="DataField" name="id" source="id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="114"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="185" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="186" dataType="Integer" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))" designDefaultValue="8" parameterSource="s_mes" parameterType="URL" variable="s_mes"/>
				<SQLParameter id="187" dataType="Integer" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))" designDefaultValue="2013" parameterSource="s_anio" parameterType="URL" variable="s_anio"/>
				<SQLParameter id="188" dataType="Text" designDefaultValue="0" parameterSource="s_tipo" parameterType="URL" variable="s_tipo"/>
				<SQLParameter id="189" dataType="Integer" defaultValue="0" designDefaultValue="1" parameterSource="sPendientes" parameterType="URL" variable="sPendientes"/>
				<SQLParameter id="190" dataType="Text" parameterSource="s_Numero" parameterType="URL" variable="s_Numero"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
			<PKFields/>
		</Grid>
		<Record id="147" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_universo_cds" connection="cnDisenio" dataSource="mc_universo_cds" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Editar Requerimiento Técnico" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_universo_cds">
			<Components>
				<Button id="149" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_universo_cdsButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<CheckBox id="151" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="EsReqTecnico" fieldSource="EsReqTecnico" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Es Req Tecnico" PathID="mc_universo_cdsEsReqTecnico" defaultValue="Unchecked">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<ListBox id="152" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="ReqTecnico" fieldSource="ReqTecnico" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Req Tecnico" caption="Req Tecnico" required="False" unique="False" connection="cnDisenio" wizardEmptyCaption="Seleccionar Valor" PathID="mc_universo_cdsReqTecnico" dataSource="mc_universo_cds" boundColumn="numero" textColumn="numero">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="159" conditionType="Parameter" useIsNull="False" dataType="Integer" field="EsReqTecnico" logicOperator="And" parameterSource="1" parameterType="Expression" searchConditionType="Equal"/>
						<TableParameter id="160" conditionType="Parameter" useIsNull="False" dataType="Text" field="tipo" logicOperator="And" parameterSource="'PC'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="158" posHeight="180" posLeft="10" posTop="10" posWidth="137" tableName="mc_universo_cds"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="161" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="162" dataType="Integer" fieldName="id" tableName="mc_universo_cds"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="191"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="150" conditionType="Parameter" useIsNull="False" field="id" parameterSource="id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="148" schemaName="undefined" tableName="mc_universo_cds"/>
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
		<Panel id="180" visible="True" generateDiv="False" name="Panel2" wizardInnerHTML="&lt;table width=&quot;50%&quot; class=&quot;Header&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;
        &lt;tr&gt;
          &lt;td class=&quot;th&quot; style=&quot;width: 300px;&quot;&gt;&lt;a href=&quot;{Link3_Src}&quot; id=&quot;Link3&quot;&gt;Incidentes Relacionados&lt;/a&gt;&lt;/td&gt; 
          &lt;td class=&quot;th&quot; style=&quot;width: 300px;&quot;&gt;
            &lt;!-- BEGIN Link lkCargaMultiple --&gt;&lt;a href=&quot;{lkCargaMultiple_Src}&quot; id=&quot;lkCargaMultiple&quot;&gt;Cargar Multiples Claves&lt;/a&gt;&lt;!-- END Link lkCargaMultiple --&gt;&lt;/td&gt; 
          &lt;td class=&quot;th&quot; style=&quot;width: 300px;&quot;&gt;&amp;nbsp;&lt;a href=&quot;{Link1_Src}&quot; id=&quot;Link1&quot;&gt;Calcular Universo&lt;/a&gt;&lt;/td&gt; 
          &lt;td class=&quot;th&quot; style=&quot;width: 300px;&quot;&gt;&lt;a href=&quot;{Link2_Src}&quot; id=&quot;Link2&quot;&gt;Distribuir Universo&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
      &lt;/table&gt;" PathID="Panel2">
			<Components>
				<Link id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="Panel2Link3" hrefSource="IncidentesRelacionados.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Incidentes Relacionados','textSourceDB':'','hrefSource':'IncidentesRelacionados.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="43" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkCargaMultiple" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Panel2lkCargaMultiple" hrefSource="UniversoCarga.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="73" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Panel2Link1" hrefSource="UniversoCarga.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Calcular Universo','textSourceDB':'','hrefSource':'UniversoCarga.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'1','parameterName':'Generar'},'1':{'sourceType':'Expression','parameterSource':'1','parameterName':'Generar'},'length':2,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="184" sourceType="Expression" format="yyyy-mm-dd" name="Generar" source="1" old_temp_id="74"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="Panel2Link2" hrefSource="UniversoDistribucion.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Distribuir Universo','textSourceDB':'','hrefSource':'UniversoDistribucion.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="UniversoLista_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="UniversoLista.php" forShow="True" url="UniversoLista.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="42"/>
			</Actions>
		</Event>
	</Events>
</Page>
