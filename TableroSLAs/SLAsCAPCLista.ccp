<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="39" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_calificacion_capc" searchIds="39" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_calificacion_capc" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="mc_calificacion_capc">
			<Components>
				<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_calificacion_capcButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_numero" fieldSource="numero" wizardIsPassword="False" wizardCaption="Numero" caption="Numero" required="False" unique="False" wizardSize="25" wizardMaxLength="25" PathID="mc_calificacion_capcs_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="42" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_mes" fieldSource="mes" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mes" caption="Mes" required="False" unique="False" PathID="mc_calificacion_capcs_mes" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))">
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
				<ListBox id="43" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_anio" fieldSource="anio" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Anio" caption="Anio" required="False" unique="False" PathID="mc_calificacion_capcs_anio" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))">
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
				<ListBox id="44" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_serviciocont" fieldSource="id_serviciocont" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Serviciocont" caption="Id Serviciocont" required="False" unique="False" PathID="mc_calificacion_capcs_id_serviciocont" connection="cnDisenio" dataSource="mc_c_ServContractual" boundColumn="Id" textColumn="Descripcion">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="53" conditionType="Parameter" useIsNull="False" dataType="Text" field="Aplica" logicOperator="And" parameterSource="'CAPC'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="52" posHeight="136" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_ServContractual"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="54" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="55" dataType="Integer" fieldName="Id" tableName="mc_c_ServContractual"/>
					</PKFields>
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
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="mc_c_ServContractual_mc_c" connection="cnDisenio" dataSource="SELECT mc_calificacion_capc.*, mc_c_ServContractual.Descripcion AS mc_c_ServContractual_Descripcion 
FROM mc_calificacion_capc left  JOIN mc_c_ServContractual ON mc_calificacion_capc.id_serviciocont = mc_c_ServContractual.Id
WHERE numero LIKE '%{s_numero}%'
AND (mes = {s_mes} or  {s_mes}=0)
AND (anio = {s_anio} or {s_anio}=0)
AND (id_serviciocont = {s_id_serviciocont}  or 0={s_id_serviciocont} )" pageSizeLimit="100" pageSize="True" wizardCaption="Detalle SLAs CAPC" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="mc_c_ServContractual_mc_c">
			<Components>
				<Sorter id="12" visible="True" name="Sorter_mc_c_ServContractual_Descripcion" column="mc_c_ServContractual_Descripcion" wizardCaption="Mc C Serv Contractual Descripcion" wizardSortingType="SimpleDir" wizardControl="mc_c_ServContractual_Descripcion" wizardAddNbsp="False" PathID="mc_c_ServContractual_mc_cSorter_mc_c_ServContractual_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="13" visible="True" name="Sorter_numero" column="numero" wizardCaption="Numero" wizardSortingType="SimpleDir" wizardControl="numero" wizardAddNbsp="False" PathID="mc_c_ServContractual_mc_cSorter_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="mc_c_ServContractual_mc_cSorter_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_Agrupador" column="Agrupador" wizardCaption="Agrupador" wizardSortingType="SimpleDir" wizardControl="Agrupador" wizardAddNbsp="False" PathID="mc_c_ServContractual_mc_cSorter_Agrupador" connection="cnDisenio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_CALIDAD_PROD_TERM" column="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardSortingType="SimpleDir" wizardControl="CALIDAD_PROD_TERM" wizardAddNbsp="False" PathID="mc_c_ServContractual_mc_cSorter_CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="17" visible="True" name="Sorter_DEDUC_OMISION" column="DEDUC_OMISION" wizardCaption="DEDUC OMISION" wizardSortingType="SimpleDir" wizardControl="DEDUC_OMISION" wizardAddNbsp="False" PathID="mc_c_ServContractual_mc_cSorter_DEDUC_OMISION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="19" visible="True" name="Sorter_RETR_ENTREGABLE" column="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardSortingType="SimpleDir" wizardControl="RETR_ENTREGABLE" wizardAddNbsp="False" PathID="mc_c_ServContractual_mc_cSorter_RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="20" visible="True" name="Sorter_Observaciones" column="Observaciones" wizardCaption="Observaciones" wizardSortingType="SimpleDir" wizardControl="Observaciones" wizardAddNbsp="False" PathID="mc_c_ServContractual_mc_cSorter_Observaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mc_c_ServContractual_Descripcion" fieldSource="mc_c_ServContractual_Descripcion" wizardCaption="Mc C Serv Contractual Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_ServContractual_mc_cmc_c_ServContractual_Descripcion" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="SLAsCAPCDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'mc_c_ServContractual_Descripcion','hrefSource':'SLAsCAPCDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="56" sourceType="DataField" name="id" source="id"/>
					</LinkParameters>
				</Label>
				<Link id="23" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="numero" fieldSource="numero" wizardCaption="Numero" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_ServContractual_mc_cnumero" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="SLAsCapcApbDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'numero','hrefSource':'SLAsCapcApbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'numero','parameterName':'s_numero'},'1':{'sourceType':'DataField','parameterSource':'id','parameterName':'sID'},'length':2,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="97" sourceType="DataField" name="s_numero" source="numero"/>
						<LinkParameter id="98" sourceType="DataField" name="sID" source="id"/>
					</LinkParameters>
				</Link>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_ServContractual_mc_cDescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="25" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Agrupador" fieldSource="Agrupador" wizardCaption="Agrupador" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_ServContractual_mc_cAgrupador" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="SLAsCAPCDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'Agrupador','hrefSource':'SLAsCAPCDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="57" sourceType="DataField" name="id" source="id"/>
					</LinkParameters>
				</Link>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="CALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_ServContractual_mc_cCALIDAD_PROD_TERM" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="SLAsCAPCCalidadDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'CALIDAD_PROD_TERM','hrefSource':'SLAsCAPCCalidadDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'id','parameterName':'id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="45" sourceType="DataField" name="id" source="id"/>
					</LinkParameters>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="DEDUC_OMISION" fieldSource="DEDUC_OMISION" wizardCaption="DEDUC OMISION" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_ServContractual_mc_cDEDUC_OMISION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_ServContractual_mc_cRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Observaciones" fieldSource="Observaciones" wizardCaption="Observaciones" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_c_ServContractual_mc_cObservaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="31" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Image id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CALIDAD_PROD_TERM" PathID="mc_c_ServContractual_mc_cImg_CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_DEDUC_OMISION" PathID="mc_c_ServContractual_mc_cImg_DEDUC_OMISION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_RETR_ENTREGABLE" PathID="mc_c_ServContractual_mc_cImg_RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Link id="78" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="mc_c_ServContractual_mc_cLink2" hrefSource="SLAsCapcApbDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Agregar Medición de Apertura','textSourceDB':'','hrefSource':'SLAsCapcApbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="mc_c_ServContractual_mc_cLink1" hrefSource="SLAsCAPCDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Agregar Medición','textSourceDB':'','hrefSource':'SLAsCAPCDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="79" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="HERR_EST_COST" PathID="mc_c_ServContractual_mc_cHERR_EST_COST" fieldSource="HERR_EST_COST" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="SLAsCapcApbDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'','textSourceDB':'HERR_EST_COST','hrefSource':'SLAsCapcApbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'numero','parameterName':'numero'},'1':{'sourceType':'DataField','parameterSource':'numero','parameterName':'s_numero'},'2':{'sourceType':'DataField','parameterSource':'numero','parameterName':'s_numero'},'3':{'sourceType':'DataField','parameterSource':'id','parameterName':'sID'},'length':4,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="94" sourceType="DataField" name="s_numero" source="numero"/>
						<LinkParameter id="95" sourceType="DataField" name="sID" source="id"/>
					</LinkParameters>
				</Label>
				<Label id="80" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="REQ_SERV" PathID="mc_c_ServContractual_mc_cREQ_SERV" fieldSource="REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="81" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="CUMPL_REQ_FUN" PathID="mc_c_ServContractual_mc_cCUMPL_REQ_FUN" fieldSource="CUMPL_REQ_FUN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_HERR_EST_COST" PathID="mc_c_ServContractual_mc_cImg_HERR_EST_COST" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="SLAsCapcApbDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'','hrefSource':'SLAsCapcApbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'numero','parameterName':'numero'},'1':{'sourceType':'DataField','parameterSource':'numero','parameterName':'numero'},'2':{'sourceType':'DataField','parameterSource':'id','parameterName':'sID'},'3':{'sourceType':'DataField','parameterSource':'numero','parameterName':'s_numero'},'4':{'sourceType':'DataField','parameterSource':'id','parameterName':'sID'},'length':5,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="93" sourceType="DataField" name="s_numero" source="numero"/>
						<LinkParameter id="96" sourceType="DataField" name="sID" source="id"/>
					</LinkParameters>
				</Image>
				<Image id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_REQ_SERV" PathID="mc_c_ServContractual_mc_cImg_REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="88" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CUMPL_REQ_FUN" PathID="mc_c_ServContractual_mc_cImg_CUMPL_REQ_FUN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="46" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
			</Fields>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="89" dataType="Text" parameterSource="s_numero" parameterType="URL" variable="s_numero"/>
				<SQLParameter id="90" dataType="Integer" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))" designDefaultValue="0" parameterSource="s_mes" parameterType="URL" variable="s_mes"/>
				<SQLParameter id="91" dataType="Integer" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))" designDefaultValue="2014" parameterSource="s_anio" parameterType="URL" variable="s_anio"/>
				<SQLParameter id="92" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_id_serviciocont" parameterType="URL" variable="s_id_serviciocont"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Link id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkTableroExcelCAPC" PathID="lkTableroExcelCAPC" hrefSource="TableroExcelCAPC.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Tablero Excel CAPC','textSourceDB':'','hrefSource':'TableroExcelCAPC.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="SLAsCAPCLista.php" forShow="True" url="SLAsCAPCLista.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="SLAsCAPCLista_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="73"/>
			</Actions>
		</Event>
	</Events>
</Page>