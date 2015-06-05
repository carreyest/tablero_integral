<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="Login.ccp">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="25" connection="cnDisenio" dataSource="select  sn.nombre serv_negocio
	, sc.nombre serv_cont
	, p.nombre Proveedor
	, g.nombre  Tipo_PPMC
	, r.* 
from calificacion_rs_MC r
	inner join c_proveedor p on p.id_proveedor = r.id_proveedor 
	left join c_servicio sn on sn.id_servicio = r.id_servicio_negocio 
	left join c_servicio sc on sc.id_servicio = r.id_servicio_negocio 
	left join c_generico  g on r.id_tipo  = g.id_generico  and id_catalogo =17
where (r.id_ppmc = {s_id_ppmc} or 0={s_id_ppmc})
and (r.id_proveedor = {s_id_proveedor} or 0={s_id_proveedor})
and ({s_MesReporte} = r.mesreporte or 0={s_MesReporte} )
and (anioreporte ={s_AnioReporte}  or {s_AnioReporte}=0)" name="Grid1" pageSizeLimit="100" wizardCaption=" Grid1 Lista de" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" PathID="Grid1">
			<Components>
				<Sorter id="4" visible="True" name="Sorter_serv_negocio" column="serv_negocio" wizardCaption="Serv Negocio" wizardSortingType="SimpleDir" wizardControl="serv_negocio" wizardAddNbsp="False" PathID="Grid1Sorter_serv_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="5" visible="True" name="Sorter_serv_cont" column="serv_cont" wizardCaption="Serv Cont" wizardSortingType="SimpleDir" wizardControl="serv_cont" wizardAddNbsp="False" PathID="Grid1Sorter_serv_cont">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="6" visible="True" name="Sorter_Proveedor" column="Proveedor" wizardCaption="Proveedor" wizardSortingType="SimpleDir" wizardControl="Proveedor" wizardAddNbsp="False" PathID="Grid1Sorter_Proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_Tipo_PPMC" column="Tipo_PPMC" wizardCaption="Tipo PPMC" wizardSortingType="SimpleDir" wizardControl="Tipo_PPMC" wizardAddNbsp="False" PathID="Grid1Sorter_Tipo_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_id_ppmc" column="id_ppmc" wizardCaption="Id Ppmc" wizardSortingType="SimpleDir" wizardControl="id_ppmc" wizardAddNbsp="False" PathID="Grid1Sorter_id_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="13" visible="True" name="Sorter_descripci_n" column="descripción" wizardCaption="Descripción" wizardSortingType="SimpleDir" wizardControl="descripci_n" wizardAddNbsp="False" PathID="Grid1Sorter_descripci_n">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_HERR_EST_COST" column="HERR_EST_COST" wizardCaption="HERR EST COST" wizardSortingType="SimpleDir" wizardControl="HERR_EST_COST" wizardAddNbsp="False" PathID="Grid1Sorter_HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_REQ_SERV" column="REQ_SERV" wizardCaption="REQ SERV" wizardSortingType="SimpleDir" wizardControl="REQ_SERV" wizardAddNbsp="False" PathID="Grid1Sorter_REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_CUMPL_REQ_FUNC" column="CUMPL_REQ_FUNC" wizardCaption="CUMPL REQ FUNC" wizardSortingType="SimpleDir" wizardControl="CUMPL_REQ_FUNC" wizardAddNbsp="False" PathID="Grid1Sorter_CUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="17" visible="True" name="Sorter_CALIDAD_PROD_TERM" column="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardSortingType="SimpleDir" wizardControl="CALIDAD_PROD_TERM" wizardAddNbsp="False" PathID="Grid1Sorter_CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="18" visible="True" name="Sorter_RETR_ENTREGABLE" column="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardSortingType="SimpleDir" wizardControl="RETR_ENTREGABLE" wizardAddNbsp="False" PathID="Grid1Sorter_RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="19" visible="True" name="Sorter_COMPL_RUTA_CRITICA" column="COMPL_RUTA_CRITICA" wizardCaption="COMPL RUTA CRITICA" wizardSortingType="SimpleDir" wizardControl="COMPL_RUTA_CRITICA" wizardAddNbsp="False" PathID="Grid1Sorter_COMPL_RUTA_CRITICA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="20" visible="True" name="Sorter_EST_PROY" column="EST_PROY" wizardCaption="EST PROY" wizardSortingType="SimpleDir" wizardControl="EST_PROY" wizardAddNbsp="False" PathID="Grid1Sorter_EST_PROY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="21" visible="True" name="Sorter_DEF_FUG_AMB_PROD" column="DEF_FUG_AMB_PROD" wizardCaption="DEF FUG AMB PROD" wizardSortingType="SimpleDir" wizardControl="DEF_FUG_AMB_PROD" wizardAddNbsp="False" PathID="Grid1Sorter_DEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="23" visible="True" name="Sorter_MesReporte" column="MesReporte" wizardCaption="Mes Reporte" wizardSortingType="SimpleDir" wizardControl="MesReporte" wizardAddNbsp="False" PathID="Grid1Sorter_MesReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="24" visible="True" name="Sorter_AnioReporte" column="AnioReporte" wizardCaption="Anio Reporte" wizardSortingType="SimpleDir" wizardControl="AnioReporte" wizardAddNbsp="False" PathID="Grid1Sorter_AnioReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="26" visible="True" name="Sorter_ACSI" column="ACSI" wizardCaption="ACSI" wizardSortingType="SimpleDir" wizardControl="ACSI" wizardAddNbsp="False" PathID="Grid1Sorter_ACSI">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="28" visible="True" name="Sorter_descartar" column="descartar" wizardCaption="Descartar" wizardSortingType="SimpleDir" wizardControl="descartar" wizardAddNbsp="False" PathID="Grid1Sorter_descartar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" name="serv_negocio" fieldSource="serv_negocio" wizardCaption="Serv Negocio" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1serv_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="serv_cont" fieldSource="serv_cont" wizardCaption="Serv Cont" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1serv_cont">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="32" fieldSourceType="DBColumn" dataType="Text" html="False" name="Proveedor" fieldSource="Proveedor" wizardCaption="Proveedor" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1Proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="Tipo_PPMC" fieldSource="Tipo_PPMC" wizardCaption="Tipo PPMC" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1Tipo_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="34" fieldSourceType="DBColumn" dataType="Integer" html="False" name="id_ppmc" fieldSource="id_ppmc" wizardCaption="Id Ppmc" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1id_ppmc" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="CalificaPPMCCAPC.ccp" linkProperties="{'textSource':'','textSourceDB':'id_ppmc','hrefSource':'CalificaPPMCCAPC.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'ID','parameterName':'ID'},'length':1,'objectType':'linkParameters'}}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="79" sourceType="DataField" name="ID" source="ID"/>
					</LinkParameters>
				</Link>
				<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="False" name="descripci_n" fieldSource="descripción" wizardCaption="Descripción" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1descripci_n">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="40" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="HERR_EST_COST" fieldSource="HERR_EST_COST" wizardCaption="HERR EST COST" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="41" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="REQ_SERV" fieldSource="REQ_SERV" wizardCaption="REQ SERV" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="42" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="CUMPL_REQ_FUNC" fieldSource="CUMPL_REQ_FUNC" wizardCaption="CUMPL REQ FUNC" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1CUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="CALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="45" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="COMPL_RUTA_CRITICA" fieldSource="COMPL_RUTA_CRITICA" wizardCaption="COMPL RUTA CRITICA" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1COMPL_RUTA_CRITICA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="46" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="EST_PROY" fieldSource="EST_PROY" wizardCaption="EST PROY" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1EST_PROY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="DEF_FUG_AMB_PROD" fieldSource="DEF_FUG_AMB_PROD" wizardCaption="DEF FUG AMB PROD" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1DEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="49" fieldSourceType="DBColumn" dataType="Integer" html="False" name="MesReporte" fieldSource="MesReporte" wizardCaption="Mes Reporte" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1MesReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="50" fieldSourceType="DBColumn" dataType="Integer" html="False" name="AnioReporte" fieldSource="AnioReporte" wizardCaption="Anio Reporte" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1AnioReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="52" fieldSourceType="DBColumn" dataType="Integer" html="False" name="ACSI" fieldSource="ACSI" wizardCaption="ACSI" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="Grid1ACSI">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="54" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="descartar" fieldSource="descartar" wizardCaption="Descartar" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1descartar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="55" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}" PathID="Grid1Navigator">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="51" fieldSourceType="DBColumn" dataType="Text" html="False" name="ppmc_adicional" fieldSource="ppmc_adicional" wizardCaption="Ppmc Adicional" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1ppmc_adicional">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="48" fieldSourceType="DBColumn" dataType="Text" html="False" name="Obs_manuales" fieldSource="Obs_manuales" wizardCaption="Obs Manuales" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1Obs_manuales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="29" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="id_ppmc" parameterSource="s_id_ppmc" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
				<TableParameter id="59" conditionType="Parameter" useIsNull="False" field="id_proveedor" parameterSource="s_id_proveedor" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="2"/>
				<TableParameter id="60" conditionType="Parameter" useIsNull="False" field="id_servivio_cont" parameterSource="s_id_servivio_cont" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3"/>
				<TableParameter id="61" conditionType="Parameter" useIsNull="False" field="id_servicio_negocio" parameterSource="s_id_servicio_negocio" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="4"/>
				<TableParameter id="62" conditionType="Parameter" useIsNull="False" field="id_tipo" parameterSource="s_id_tipo" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="5"/>
				<TableParameter id="63" conditionType="Parameter" useIsNull="False" field="MesReporte" parameterSource="s_MesReporte" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="6"/>
				<TableParameter id="64" conditionType="Parameter" useIsNull="False" field="AnioReporte" parameterSource="s_AnioReporte" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="7"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="72" parameterType="URL" variable="s_id_ppmc" dataType="Integer" parameterSource="s_id_ppmc" defaultValue="0"/>
				<SQLParameter id="73" parameterType="URL" variable="s_id_proveedor" dataType="Integer" parameterSource="s_id_proveedor" defaultValue="0"/>
				<SQLParameter id="74" parameterType="URL" variable="s_id_servivio_cont" dataType="Integer" parameterSource="s_id_servivio_cont" defaultValue="0"/>
				<SQLParameter id="75" parameterType="URL" variable="s_id_servicio_negocio" dataType="Integer" parameterSource="s_id_servicio_negocio" defaultValue="0"/>
				<SQLParameter id="76" parameterType="URL" variable="s_id_tipo" dataType="Integer" parameterSource="s_id_tipo" defaultValue="0"/>
				<SQLParameter id="77" parameterType="URL" variable="s_MesReporte" dataType="Integer" parameterSource="s_MesReporte" defaultValue="0"/>
				<SQLParameter id="78" parameterType="URL" variable="s_AnioReporte" dataType="Integer" parameterSource="s_AnioReporte" defaultValue="0"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
			<PKFields/>
		</Grid>
		<Record id="56" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Grid2" wizardCaption=" Grid1 Buscar" wizardOrientation="Horizontal" wizardFormMethod="post" returnPage="PPMCsCalificados.ccp" PathID="Grid2">
			<Components>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="Grid2Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="65" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_id_ppmc" wizardCaption="Id Ppmc" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" PathID="Grid2s_id_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="66" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" wizardCaption="Id Proveedor" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" PathID="Grid2s_id_proveedor" connection="cnDisenio" dataSource="c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
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
				<ListBox id="70" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_MesReporte" wizardCaption="Mes Reporte" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" PathID="Grid2s_MesReporte" connection="cnDisenio" dataSource="c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date(&quot;m&quot;, strtotime(&quot;-2 months&quot;))">
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
				<ListBox id="71" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_AnioReporte" wizardCaption="Anio Reporte" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" PathID="Grid2s_AnioReporte" connection="cnDisenio" dataSource="C_Ano" boundColumn="Ano" textColumn="Ano" defaultValue="date(&quot;Y&quot;)">
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
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsCalificados_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsCalificados.php" forShow="True" url="PPMCsCalificados.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
