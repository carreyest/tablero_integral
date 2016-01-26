<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 days" needGeneration="0" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentesSearch" searchIds="2" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_info_incidentes" wizardCaption="Search  " changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="mc_info_incidentesSearch">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="mc_info_incidentesSearchButton_DoSearch">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="67"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="25" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_cds_param" wizardEmptyCaption="Select Value" PathID="mc_info_incidentesSearchs_cds_param" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="129" conditionType="Parameter" useIsNull="False" dataType="Text" defaultValue="&quot;CDS&quot;" field="descripcion" logicOperator="And" parameterSource="&quot;CDS&quot;" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="128" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="130" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="131" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="50" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_mes_param" wizardEmptyCaption="Select Value" PathID="mc_info_incidentesSearchs_mes_param" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))">
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
				<ListBox id="51" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_anio_param" wizardEmptyCaption="Select Value" PathID="mc_info_incidentesSearchs_anio_param" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="177"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="173" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Ano" logicOperator="And" parameterSource="2013" parameterType="Expression" searchConditionType="GreaterThan"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="178" tableName="mc_c_anio"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="174" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="175" dataType="Integer" fieldName="Ano" tableName="mc_c_anio"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="61" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Id_incidente_param" PathID="mc_info_incidentesSearchs_Id_incidente_param">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="93" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_analista_param1" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="mc_info_incidentesSearchs_analista_param1" connection="cnDisenio" dataSource="mc_c_usuarios" boundColumn="Usuario" textColumn="Usuario">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="203" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Nivel" logicOperator="Or" parameterSource="&quot;3&quot;" parameterType="Expression" searchConditionType="Equal"/>
<TableParameter id="204" conditionType="Parameter" useIsNull="False" dataType="Text" field="Usuario" logicOperator="Or" parameterSource="&quot;rramos&quot;" parameterType="Expression" searchConditionType="Equal"/>
<TableParameter id="205" conditionType="Parameter" useIsNull="False" dataType="Text" field="Usuario" logicOperator="Or" parameterSource="&quot;ldominguez&quot;" parameterType="Expression" searchConditionType="Equal"/>
</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="202" posHeight="180" posLeft="10" posTop="10" posWidth="153" tableName="mc_c_usuarios"/>
</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="206" fieldName="*"/>
</Fields>
					<PKFields>
						<PKField id="207" dataType="Integer" fieldName="Id" tableName="mc_c_usuarios"/>
</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="117" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="s_estado_param" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="mc_info_incidentesSearchs_estado_param" dataSource="Calificado;Calificados;No Calificado;No Calificados">
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
				<Link id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_incidentesSearchLink1" hrefSource="IncidentesDetalleMedicion.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Lista Calificados','textSourceDB':'','hrefSource':'IncidentesDetalleMedicion.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="139" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="mc_info_incidentesSearchLink2" hrefSource="ReporteIncidentes.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Reporte en Excel','textSourceDB':'','hrefSource':'ReporteIncidentes.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'URL','parameterSource':'s_mes_param','parameterName':'s_mes_param'},'1':{'sourceType':'URL','parameterSource':'s_anio_param','parameterName':'s_anio_param'},'2':{'sourceType':'URL','parameterSource':'s_cds_param','parameterName':'s_cds_param'},'length':3,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="140" sourceType="URL" format="yyyy-mm-dd" name="s_mes_param" source="s_mes_param"/>
						<LinkParameter id="141" sourceType="URL" format="yyyy-mm-dd" name="s_anio_param" source="s_anio_param"/>
						<LinkParameter id="142" sourceType="URL" format="yyyy-mm-dd" name="s_cds_param" source="s_cds_param"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="163" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="mc_info_incidentesSearchLink3" hrefSource="ListaSimpleIncidentes.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Listado Simple','textSourceDB':'','hrefSource':'ListaSimpleIncidentes.ccp','hrefSourceDB':'','title':'','target':'_blank','name':'','linkParameters':{'0':{'sourceType':'Expression','parameterSource':'1','parameterName':'export'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="164" sourceType="Expression" format="yyyy-mm-dd" name="export" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
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
		<Grid id="26" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="mc_info_incidentes" connection="cnDisenio" dataSource="select mci.Id_incidente ,mci.ServicioNegocio ,mci.Aplicacion ,mci.FechaNuevo ,mci.FechaAsignado ,mci.FechaEnCurso ,mci.FechaPendiente ,mci.FechaResuelto ,mci.FechaCerrado, mcu.analista,
(CASE WHEN (SELECT COUNT(id_incidente) from  mc_calificacion_incidentes_MC where id_incidente = mcu.Numero and MesReporte=mcu.mes and Anioreporte=mcu.anio and id_proveedor=mcu.Id_Proveedor)&gt;0 THEN 'Calificado' ELSE 'No Calificado' END  ) as Estado,
mcu.mes, mcu.anio 
from mc_universo_cds mcu 
	inner join  mc_info_incidentes mci on mci.id_incidente=mcu.Numero  and month(mci.FechaCarga)= mcu.mes and YEAR(mci.FechaCarga ) = mcu.anio
where mcu.tipo='IN'
and (id_proveedor={s_cds_param} OR {s_cds_param}=0  )
and (mes={s_mes_param} or 0={s_mes_param})
and anio={s_anio_param}
and (mcu.analista='{s_analista_param1}' OR '{s_analista_param1}'=''  ) 
and Id_incidente like '%{s_Id_incidente_param}%'
and ((CASE WHEN (SELECT COUNT(id_incidente) from  mc_calificacion_incidentes_MC where id_incidente = mcu.Numero and MesReporte=mcu.mes and Anioreporte=mcu.anio and id_proveedor=mcu.Id_Proveedor)&gt;0 THEN 'Calificado' ELSE 'No Calificado' END  )='{s_estado_param}' or '{s_estado_param}'='' )
" pageSizeLimit="100" pageSize="True" wizardCaption="Grid1" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="False" gridExtendedHTML="False" PathID="mc_info_incidentes" wizardAllowSorting="True">
			<Components>
				<Sorter id="29" visible="True" name="Sorter_Id_incidente" column="Id_incidente" wizardCaption="Id Incidente" wizardSortingType="SimpleDir" wizardControl="Id_incidente" wizardAddNbsp="False" PathID="mc_info_incidentesSorter_Id_incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="30" visible="True" name="Sorter_ServicioNegocio" column="ServicioNegocio" wizardCaption="Servicio Negocio" wizardSortingType="SimpleDir" wizardControl="ServicioNegocio" wizardAddNbsp="False" PathID="mc_info_incidentesSorter_ServicioNegocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="31" visible="True" name="Sorter_Aplicacion" column="Aplicacion" wizardCaption="Aplicacion" wizardSortingType="SimpleDir" wizardControl="Aplicacion" wizardAddNbsp="False" PathID="mc_info_incidentesSorter_Aplicacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="32" visible="True" name="Sorter_FechaNuevo" column="FechaNuevo" wizardCaption="Fecha Nuevo" wizardSortingType="SimpleDir" wizardControl="FechaNuevo" wizardAddNbsp="False" PathID="mc_info_incidentesSorter_FechaNuevo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="33" visible="True" name="Sorter_FechaAsignado" column="FechaAsignado" wizardCaption="Fecha Asignado" wizardSortingType="SimpleDir" wizardControl="FechaAsignado" wizardAddNbsp="False" PathID="mc_info_incidentesSorter_FechaAsignado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="34" visible="True" name="Sorter_FechaEnCurso" column="FechaEnCurso" wizardCaption="Fecha En Curso" wizardSortingType="SimpleDir" wizardControl="FechaEnCurso" wizardAddNbsp="False" PathID="mc_info_incidentesSorter_FechaEnCurso">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="35" visible="True" name="Sorter_FechaPendiente" column="FechaPendiente" wizardCaption="Fecha Pendiente" wizardSortingType="SimpleDir" wizardControl="FechaPendiente" wizardAddNbsp="False" PathID="mc_info_incidentesSorter_FechaPendiente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="36" visible="True" name="Sorter_FechaResuelto" column="FechaResuelto" wizardCaption="Fecha Resuelto" wizardSortingType="SimpleDir" wizardControl="FechaResuelto" wizardAddNbsp="False" PathID="mc_info_incidentesSorter_FechaResuelto">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="37" visible="True" name="Sorter_FechaCerrado" column="FechaCerrado" wizardCaption="Fecha Cerrado" wizardSortingType="SimpleDir" wizardControl="FechaCerrado" wizardAddNbsp="False" PathID="mc_info_incidentesSorter_FechaCerrado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="38" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Id_incidente" fieldSource="Id_incidente" wizardCaption="Id Incidente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesId_incidente" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="IncidenteDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'Id_incidente','hrefSource':'IncidenteDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id_incidente','parameterName':'s_Id_incidente'},'1':{'sourceType':'DataField','parameterSource':'Id_incidente','parameterName':'Id_incidente'},'2':{'sourceType':'DataField','parameterSource':'Id_incidente','parameterName':'Id_incidente'},'3':{'sourceType':'DataField','parameterSource':'Id_incidente','parameterName':'Id_incidente'},'4':{'sourceType':'DataField','parameterSource':'mes','parameterName':'s_MesReporte'},'5':{'sourceType':'DataField','parameterSource':'Id_incidente','parameterName':'Id_incidente'},'6':{'sourceType':'DataField','parameterSource':'mes','parameterName':'s_mes_param'},'7':{'sourceType':'DataField','parameterSource':'Id_incidente','parameterName':'Id_incidente'},'8':{'sourceType':'DataField','parameterSource':'mes','parameterName':'s_mes_param'},'9':{'sourceType':'DataField','parameterSource':'anio','parameterName':'s_anio_param'},'length':10,'objectType':'linkParameters'}}">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="66"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="56" sourceType="DataField" name="Id_incidente" source="Id_incidente"/>
						<LinkParameter id="171" sourceType="DataField" name="s_mes_param" source="mes"/>
						<LinkParameter id="179" sourceType="DataField" name="s_anio_param" source="anio"/>
					</LinkParameters>
				</Link>
				<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ServicioNegocio" fieldSource="ServicioNegocio" wizardCaption="Servicio Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesServicioNegocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Aplicacion" fieldSource="Aplicacion" wizardCaption="Aplicacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesAplicacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="41" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaNuevo" fieldSource="FechaNuevo" wizardCaption="Fecha Nuevo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesFechaNuevo" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="42" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaAsignado" fieldSource="FechaAsignado" wizardCaption="Fecha Asignado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesFechaAsignado" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaEnCurso" fieldSource="FechaEnCurso" wizardCaption="Fecha En Curso" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesFechaEnCurso" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaPendiente" fieldSource="FechaPendiente" wizardCaption="Fecha Pendiente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesFechaPendiente" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="45" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaResuelto" fieldSource="FechaResuelto" wizardCaption="Fecha Resuelto" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesFechaResuelto" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="46" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaCerrado" fieldSource="FechaCerrado" wizardCaption="Fecha Cerrado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesFechaCerrado" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="47" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="85" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lblRegistros" PathID="mc_info_incidenteslblRegistros">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="86"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="105" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lblCalificado" PathID="mc_info_incidenteslblCalificado" fieldSource="Estado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="111" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="mc_info_incidentesSorter1" wizardCaption="Estado" column="Estado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="156" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="analista" PathID="mc_info_incidentesanalista" fieldSource="analista">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="186" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lAnalista" PathID="mc_info_incidenteslAnalista" defaultValue="&quot;Analista&quot;">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="68"/>
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
				<SQLParameter id="180" dataType="Text" parameterSource="s_Id_incidente_param" parameterType="URL" variable="s_Id_incidente_param"/>
				<SQLParameter id="181" dataType="Integer" defaultValue="0" designDefaultValue="3" parameterSource="s_cds_param" parameterType="URL" variable="s_cds_param"/>
				<SQLParameter id="182" dataType="Integer" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))" designDefaultValue="11" parameterSource="s_mes_param" parameterType="URL" variable="s_mes_param"/>
				<SQLParameter id="183" dataType="Text" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))" designDefaultValue="2013" parameterSource="s_anio_param" parameterType="URL" variable="s_anio_param"/>
				<SQLParameter id="184" dataType="Text" designDefaultValue="'gestrada'" parameterSource="s_analista_param1" parameterType="URL" variable="s_analista_param1"/>
				<SQLParameter id="185" dataType="Text" designDefaultValue="'Calificado'" parameterSource="s_estado_param" parameterType="URL" variable="s_estado_param"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<IncludePage id="136" name="Header" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="IncidentesLista.php" forShow="True" url="IncidentesLista.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="IncidentesLista_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="149" groupID="3"/>
	</SecurityGroups>
	<CachingParameters>
		<CachingParameter id="69" name="SQL" sourceType="URL" target="Key"/>
	</CachingParameters>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="70"/>
			</Actions>
		</Event>
		<Event name="BeforeInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="71"/>
			</Actions>
		</Event>
	</Events>
</Page>
