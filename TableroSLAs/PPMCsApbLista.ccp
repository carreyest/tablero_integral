<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="grdReqsApertura" connection="cnDisenio" dataSource="select cast(u.numero as integer) ID_PPMC, DatosPPMC.NAME, 
	isnull(sn.nombre,  DatosPPMC.SERVICIO_NEGOCIO ) SERVICIO_NEGOCIO , 
	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) TIPO_REQUERIMIENTO,
	p.nombre, u.IdEstimacion, u.Id, c.HERR_EST_COST , c.REQ_SERV,
	i.FechaAsignacion, i.FechaEntregaPropuesta, i.FechaAceptacionPropuesta, i.HorasAprobadas, i.DiasPropuesta, 
	i.Observaciones, i.IdTipoReq, i.id_servicio_cont,  i.idpadre, i.tipopadre, u.Analista, u.EsReqTecnico 
from mc_universo_cds u left join 
	(
SELECT DISTINCT REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_RO_AS 
UNION ALL
SELECT DISTINCT ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_PROYECTOS_AS 
UNION ALL
SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo
	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC 
	and c.FECHA_CARGA = PPMC_Proyectos_AS.FECHA_CARGA 
UNION ALL
SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo
	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  
 ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) 
 and (isnull(DatosPPMC.slo,0) = u.slo or DatosPPMC.fecha_carga &gt; '2015-06-01') -- a partir de este corte ya no hay dos cargas
inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and c.iduniverso= u.id  
left join mc_info_rs_ap_ec i on i.id = u.id
left join mc_c_TipoPPMC t on t.Id = i.IdTipoReq 
left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
where (mes = {s_mesparam} or {s_mesparam}=0)
	and anio = {s_anioparam}
	AND (u.id_proveedor ={s_id_proveedor} OR 0={s_id_proveedor})
	AND (u.numero ='{s_numero}' OR 0='{s_numero}')
	and (tipo='PA' or tipo='AC')
	and (u.analista like '%{sAnalista}%' or u.analista  is null)
	and u.slo= {sSLO}" pageSizeLimit="100" pageSize="True" wizardCaption="Requerimientos de Apertura" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="grdReqsApertura" wizardAllowSorting="True">
			<Components>
				<Sorter id="6" visible="True" name="Sorter_ID_PPMC" column="ID_PPMC" wizardCaption="ID PPMC" wizardSortingType="SimpleDir" wizardControl="ID_PPMC" wizardAddNbsp="False" PathID="grdReqsAperturaSorter_ID_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_SERVICIO_NEGOCIO" column="SERVICIO_NEGOCIO" wizardCaption="SERVICIO NEGOCIO" wizardSortingType="SimpleDir" wizardControl="SERVICIO_NEGOCIO" wizardAddNbsp="False" PathID="grdReqsAperturaSorter_SERVICIO_NEGOCIO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="grdReqsAperturaSorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="9" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ID_PPMC" fieldSource="ID_PPMC" wizardCaption="ID PPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdReqsAperturaID_PPMC" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="PPMCsApbDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'ID_PPMC','hrefSource':'PPMCsApbDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'ID_PPMC'},'1':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'ID_PPMC'},'2':{'sourceType':'DataField','parameterSource':'IdEstimacion','parameterName':'IdEstimacion'},'3':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'ID_PPMC'},'4':{'sourceType':'DataField','parameterSource':'IdEstimacion','parameterName':'IdEstimacion'},'5':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'6':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'7':{'sourceType':'DataField','parameterSource':'Id','parameterName':'sId'},'8':{'sourceType':'DataField','parameterSource':'Id','parameterName':'sID'},'length':9,'objectType':'linkParameters'}}" format="####">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="47" sourceType="DataField" name="sID" source="Id"/>
					</LinkParameters>
				</Link>
				<Label id="10" fieldSourceType="DBColumn" dataType="Memo" html="False" generateSpan="False" name="NAME" fieldSource="NAME" wizardCaption="NAME" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdReqsAperturaNAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="11" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="SERVICIO_NEGOCIO" fieldSource="SERVICIO_NEGOCIO" wizardCaption="SERVICIO NEGOCIO" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdReqsAperturaSERVICIO_NEGOCIO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="12" fieldSourceType="DBColumn" dataType="Memo" html="False" generateSpan="False" name="TIPO_REQUERIMIENTO" fieldSource="TIPO_REQUERIMIENTO" wizardCaption="TIPO REQUERIMIENTO" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdReqsAperturaTIPO_REQUERIMIENTO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="13" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdReqsAperturanombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="14" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Sorter id="17" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="grdReqsAperturaSorter1" wizardCaption="Proyecto" column="NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="18" visible="True" name="Sorter2" wizardSortingType="SimpleDir" PathID="grdReqsAperturaSorter2" wizardCaption="Tipo de Requerimiento" column="TIPO_REQUERIMIENTO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="51" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="IdEstimacion" PathID="grdReqsAperturaIdEstimacion" fieldSource="IdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="52" visible="True" name="Sorter3" wizardSortingType="SimpleDir" PathID="grdReqsAperturaSorter3" wizardCaption="Estimación" column="IdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="73" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="HERR_EST_COST" PathID="grdReqsAperturaHERR_EST_COST" fieldSource="HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="74" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="REQ_SERV" PathID="grdReqsAperturaREQ_SERV" fieldSource="REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="79" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaAsignacion" PathID="grdReqsAperturaFechaAsignacion" fieldSource="FechaAsignacion" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="dd/mm/yyyy HH:nn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="85" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaEntregaPropuesta" PathID="grdReqsAperturaFechaEntregaPropuesta" fieldSource="FechaEntregaPropuesta" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="dd/mm/yyyy HH:nn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="86" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaAceptacionPropuesta" PathID="grdReqsAperturaFechaAceptacionPropuesta" fieldSource="FechaAceptacionPropuesta" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="dd/mm/yyyy HH:nn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="87" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="Label1" PathID="grdReqsAperturaLabel1" fieldSource="HorasAprobadas" format="0.##">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="93" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCumpleHE" PathID="grdReqsAperturaimgCumpleHE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="94" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCumpleRS" PathID="grdReqsAperturaimgCumpleRS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="105" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Analista" PathID="grdReqsAperturaAnalista" fieldSource="Analista">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="111" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ReqTec" PathID="grdReqsAperturaReqTec" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="ReqTecList.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'','textSourceDB':'','hrefSource':'ReqTecList.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'s_Requerimiento'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="112" sourceType="DataField" name="s_Requerimiento" source="ID_PPMC"/>
					</LinkParameters>
				</Link>
				<Label id="128" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lAnalista" PathID="grdReqsAperturalAnalista" defaultValue="&quot;Analista&quot;">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="37"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="135" dataType="Integer" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))" designDefaultValue="11" parameterSource="s_mesparam" parameterType="URL" variable="s_mesparam"/>
				<SQLParameter id="136" dataType="Integer" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))" designDefaultValue="2013" parameterSource="s_anioparam" parameterType="URL" variable="s_anioparam"/>
				<SQLParameter id="137" dataType="Integer" defaultValue="CCGetSession(&quot;CDSPreferido&quot;)" designDefaultValue="0" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="138" dataType="Text" designDefaultValue="eminero" parameterSource="sAnalista" parameterType="URL" variable="sAnalista"/>
				<SQLParameter id="139" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_numero" parameterType="URL" variable="s_numero"/>
				<SQLParameter id="140" dataType="Integer" defaultValue="0" parameterSource="sSLO" parameterType="URL" variable="sSLO"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="21" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="grsBusca" searchIds="21" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_universo_cds" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="True" wizardResultsForm="Grid1" returnPage="PPMCsApbLista.ccp" PathID="grsBusca">
			<Components>
				<Button id="22" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="grsBuscaButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="grsBuscas_id_proveedor" sourceType="Table" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre" defaultValue="CCGetSession(&quot;CDSPreferido&quot;,&quot;&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters>
						<TableParameter id="76" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="75" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="77" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="78" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
				</ListBox>
				<TextBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_numero" fieldSource="numero" wizardIsPassword="False" wizardCaption="Numero" caption="Numero" required="False" unique="False" wizardSize="25" wizardMaxLength="25" PathID="grsBuscas_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_mesparam" fieldSource="mes" wizardIsPassword="False" wizardCaption="Mes" caption="Mes" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="grsBuscas_mesparam" sourceType="Table" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))">
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
				<ListBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_anioparam" fieldSource="anio" wizardIsPassword="False" wizardCaption="Anio" caption="Anio" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="grsBuscas_anioparam" sourceType="Table" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="122"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters>
						<TableParameter id="119" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Ano" logicOperator="And" parameterSource="2013" parameterType="Expression" searchConditionType="GreaterThan"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="118" posHeight="88" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_anio"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="120" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="121" dataType="Integer" fieldName="Ano" tableName="mc_c_anio"/>
					</PKFields>
				</ListBox>
				<ListBox id="59" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="sAnalista" wizardEmptyCaption="Seleccionar Valor" PathID="grsBuscasAnalista" connection="cnDisenio" dataSource="mc_c_usuarios" boundColumn="Usuario" textColumn="Usuario" orderBy="Usuario">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="147" conditionType="Parameter" useIsNull="False" dataType="Text" defaultValue="'CAPC'" field="Grupo" logicOperator="And" parameterSource="Grupo" parameterType="URL" searchConditionType="Equal"/>
<TableParameter id="148" conditionType="Parameter" useIsNull="False" dataType="Text" field="Grupo" logicOperator="And" parameterSource="'CAPC'" parameterType="Expression" searchConditionType="Equal"/>
</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="146" posHeight="180" posLeft="10" posTop="10" posWidth="118" tableName="mc_c_usuarios"/>
</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="149" fieldName="*"/>
</Fields>
					<PKFields>
						<PKField id="150" dataType="Integer" fieldName="Id" tableName="mc_c_usuarios"/>
</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<CheckBox id="134" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="sSLO" PathID="grsBuscasSLO" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
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
		<Link id="100" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkCuadroNS" PathID="lkCuadroNS" hrefSource="PPMCsApbCuadroNSRSxls.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cuadro Ns RSs','textSourceDB':'','hrefSource':'PPMCsApbCuadroNSRSxls.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkDetalleRS" PathID="lkDetalleRS" hrefSource="PPMCsApbDetalleRSxls.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Detalle RSs','textSourceDB':'','hrefSource':'PPMCsApbDetalleRSxls.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="104" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkTableroSLAs" PathID="lkTableroSLAs" hrefSource="TableroSLAs.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Tablero SLAs','textSourceDB':'','hrefSource':'TableroSLAs.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsApbLista.php" forShow="True" url="PPMCsApbLista.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsApbLista_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="56" groupID="3"/>
		<Group id="57" groupID="4"/>
		<Group id="58" groupID="5"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="38"/>
			</Actions>
		</Event>
		<Event name="BeforeOutput" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="39"/>
			</Actions>
		</Event>
	</Events>
</Page>
