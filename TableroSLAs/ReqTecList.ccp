<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="grdDetalleRS" connection="cnDisenio" dataSource="select sc.Descripcion ServContractual, sn.nombre  ServNegocio, c.id_ppmc, t.Descripcion Tipo, 
	c.descripción, c.HERR_EST_COST, c.REQ_SERV, c.CUMPL_REQ_FUNC, c.CALIDAD_PROD_TERM, c.RETR_ENTREGABLE, c.COMPL_RUTA_CRITICA,
	c.EST_PROY, c.DEF_FUG_AMB_PROD ,  c.Obs_manuales, c.id_servicio_negocio,
	'Nivel de Servicio: Retraso en Entregables. '  +  i.observaciones ObsRetrEnt,  
	'Nivel de Servicio: Defectos Fugados a Producción. ' + df.observaciones ObsDefFug,  
	'Nivel de Servicio: Requisitos Funcionales. ' + rf.observaciones ObsReqFun,  
	'Nivel de Servicio: Calidad de Productos Terminados/Retraso en Entregables. ' + ca.observaciones  ObsCalidad,
	'Nivel de Servicio: Estimación de Proyectos.' + ep.Observaciones ObsEstProy, 
	ap.observaciones Obs_Apertura ,
	c.IdUniverso, u.medido, mcSAT.Obs_Manuales Obs_SAT,
	u.mestransicion, u.IdEstimacion
from mc_calificacion_rs_MC c
	inner join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
	inner join mc_c_ServContractual sc on sc.Id = c.id_servicio_cont and id_tipo_servicio = 2
	left join mc_c_TipoPPMC  t on t.Id = c.id_tipo 
	left join mc_info_rs_cr_re_rc i on i.id = c.iduniverso
    left join mc_info_rs_cr_deffug df on df.id = c.iduniverso
    left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso
    left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso 
    left join mc_info_rs_cr_EP ep on ep.id = c.iduniverso
    left join mc_info_rs_ap_ec ap on ap.id = c.iduniverso
    left join mc_universo_cds u on u.id = c.iduniverso
    left join mc_calificacion_rs_SAT mcSAT on mcSAT.IdUniverso = c.IdUniverso
where (c.id_proveedor = {s_id_proveedor} or {s_id_proveedor}=0 )
	and (c.MesReporte = {s_MesReporte} or {s_MesReporte}=0)
	and (c.AnioReporte = {s_AnioReporte} or {s_AnioReporte}=0)
	and (u.EsReqTecnico =1) 
	and u.Tipo = 'PA'
	and (numero = '{s_Requerimiento}' or ReqTecnico ='{s_Requerimiento}' or ''='{s_Requerimiento}'
	     or ReqTecnico IN (select reqtecnico from mc_universo_cds where numero ='{s_Requerimiento}'))
order by c.id_ppmc, u.TipoPPMC desc" pageSizeLimit="100" pageSize="True" wizardCaption="DetalleRS" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="grdDetalleRS" wizardAllowSorting="True">
			<Components>
				<Label id="4" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Grid1_TotalRecords" wizardUseTemplateBlock="False" PathID="grdDetalleRSGrid1_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="5" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="6" visible="True" name="Sorter_ServContractual" column="ServContractual" wizardCaption="Serv Contractual" wizardSortingType="SimpleDir" wizardControl="ServContractual" wizardAddNbsp="False" PathID="grdDetalleRSSorter_ServContractual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_ServNegocio" column="ServNegocio" wizardCaption="Serv Negocio" wizardSortingType="SimpleDir" wizardControl="ServNegocio" wizardAddNbsp="False" PathID="grdDetalleRSSorter_ServNegocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_id_ppmc" column="id_ppmc" wizardCaption="Id Ppmc" wizardSortingType="SimpleDir" wizardControl="id_ppmc" wizardAddNbsp="False" PathID="grdDetalleRSSorter_id_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="9" visible="True" name="Sorter_Tipo" column="Tipo" wizardCaption="Tipo" wizardSortingType="SimpleDir" wizardControl="Tipo" wizardAddNbsp="False" PathID="grdDetalleRSSorter_Tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="10" visible="True" name="Sorter_descripci_n" column="descripción" wizardCaption="Descripción" wizardSortingType="SimpleDir" wizardControl="descripci_n" wizardAddNbsp="False" PathID="grdDetalleRSSorter_descripci_n">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="11" visible="True" name="Sorter_HERR_EST_COST" column="HERR_EST_COST" wizardCaption="HERR EST COST" wizardSortingType="SimpleDir" wizardControl="HERR_EST_COST" wizardAddNbsp="False" PathID="grdDetalleRSSorter_HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="12" visible="True" name="Sorter_REQ_SERV" column="REQ_SERV" wizardCaption="REQ SERV" wizardSortingType="SimpleDir" wizardControl="REQ_SERV" wizardAddNbsp="False" PathID="grdDetalleRSSorter_REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Navigator id="24" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Panel id="101" visible="True" generateDiv="False" name="Panel1" wizardInnerHTML="              &lt;tr class=&quot;Row&quot;&gt;
                &lt;td&gt;{ServContractual}&lt;/td&gt; 
                &lt;td&gt;{ServNegocio}&lt;/td&gt; 
                &lt;td style=&quot;text-align: right;&quot;&gt;&lt;a href=&quot;{id_ppmc_Src}&quot; id=&quot;grdDetalleRSid_ppmc_{grdDetalleRS:rowNumber}&quot;&gt;{id_ppmc}&lt;/a&gt;&lt;/td&gt; 
                &lt;td&gt;{Tipo}&lt;/td&gt; 
                &lt;td&gt;{descripci_n}&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{HERR_EST_COST} 
                  &lt;!-- BEGIN Image imgCumpleHE --&gt;&lt;img id=&quot;grdDetalleRSimgCumpleHE_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgCumpleHE}&quot;&gt;&lt;!-- END Image imgCumpleHE --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{REQ_SERV} 
                  &lt;!-- BEGIN Image imgCumpleRS --&gt;&lt;img id=&quot;grdDetalleRSimgCumpleRS_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgCumpleRS}&quot;&gt;&lt;!-- END Image imgCumpleRS --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{CUMPL_REQ_FUNC} 
                  &lt;!-- BEGIN Image imgCUMPL_REQ_FUNC --&gt;&lt;img id=&quot;grdDetalleRSimgCUMPL_REQ_FUNC_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgCUMPL_REQ_FUNC}&quot;&gt;&lt;!-- END Image imgCUMPL_REQ_FUNC --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{CALIDAD_PROD_TERM} 
                  &lt;!-- BEGIN Image imgCALIDAD_PROD_TERM --&gt;&lt;img id=&quot;grdDetalleRSimgCALIDAD_PROD_TERM_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgCALIDAD_PROD_TERM}&quot;&gt;&lt;!-- END Image imgCALIDAD_PROD_TERM --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{RETR_ENTREGABLE} 
                  &lt;!-- BEGIN Image imgRETR_ENTREGABLE --&gt;&lt;img id=&quot;grdDetalleRSimgRETR_ENTREGABLE_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgRETR_ENTREGABLE}&quot;&gt;&lt;!-- END Image imgRETR_ENTREGABLE --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{COMPL_RUTA_CRITICA} 
                  &lt;!-- BEGIN Image imgCOMPL_RUTA_CRITICA --&gt;&lt;img id=&quot;grdDetalleRSimgCOMPL_RUTA_CRITICA_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgCOMPL_RUTA_CRITICA}&quot;&gt;&lt;!-- END Image imgCOMPL_RUTA_CRITICA --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{EST_PROY} 
                  &lt;!-- BEGIN Image imgEST_PROY --&gt;&lt;img id=&quot;grdDetalleRSimgEST_PROY_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgEST_PROY}&quot;&gt;&lt;!-- END Image imgEST_PROY --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{DEF_FUG_AMB_PROD} 
                  &lt;!-- BEGIN Image imgDEF_FUG_AMB_PROD --&gt;&lt;img id=&quot;grdDetalleRSimgDEF_FUG_AMB_PROD_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgDEF_FUG_AMB_PROD}&quot;&gt;&lt;!-- END Image imgDEF_FUG_AMB_PROD --&gt;&lt;/td&gt; 
                &lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot;&gt;{Obs_Apertura}&lt;br&gt;
                  {ObsReqFun}&lt;br&gt;
                  {ObsCalidad}&lt;br&gt;
                  {ObsRetrEnt}&lt;br&gt;
                  {ObsEstProy}&lt;br&gt;
                  {ObsDefFug}&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot; rowspan=&quot;1&quot; colspan=&quot;1&quot;&gt;&lt;a href=&quot;{lkEvidencia_Src}&quot; id=&quot;grdDetalleRSlkEvidencia_{grdDetalleRS:rowNumber}&quot;&gt;Ver Evidencia&lt;/a&gt;&lt;/td&gt;
              &lt;/tr&gt;
" PathID="grdDetalleRSPanel1">
					<Components>
						<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ServContractual" fieldSource="ServContractual" wizardCaption="Serv Contractual" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRSPanel1ServContractual">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ServNegocio" fieldSource="ServNegocio" wizardCaption="Serv Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRSPanel1ServNegocio">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Link id="17" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_ppmc" fieldSource="id_ppmc" wizardCaption="Id Ppmc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdDetalleRSPanel1id_ppmc" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="CalificaPPMCSAT.ccp" linkProperties="{'textSource':'','textSourceDB':'id_ppmc','hrefSource':'CalificaPPMCSAT.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'IdUniverso','parameterName':'IdUniverso'},'length':1,'objectType':'linkParameters'}}"><Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="105" sourceType="DataField" name="IdUniverso" source="IdUniverso" old_temp_id="97"/>
							</LinkParameters>
						</Link>
						<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Tipo" fieldSource="Tipo" wizardCaption="Tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRSPanel1Tipo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripci_n" fieldSource="descripción" wizardCaption="Descripción" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRSPanel1descripci_n">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="HERR_EST_COST" fieldSource="HERR_EST_COST" wizardCaption="HERR EST COST" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRSPanel1HERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="44" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCumpleHE" PathID="grdDetalleRSPanel1imgCumpleHE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="REQ_SERV" fieldSource="REQ_SERV" wizardCaption="REQ SERV" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRSPanel1REQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="45" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCumpleRS" PathID="grdDetalleRSPanel1imgCumpleRS">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="113" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="IdEstimacion" PathID="grdDetalleRSPanel1IdEstimacion" fieldSource="IdEstimacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="40" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="46" eventType="Server"/>
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
				<SQLParameter id="178" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
<SQLParameter id="179" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_MesReporte" parameterType="URL" variable="s_MesReporte"/>
<SQLParameter id="180" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_AnioReporte" parameterType="URL" variable="s_AnioReporte"/>
<SQLParameter id="181" dataType="Text" parameterSource="s_Requerimiento" parameterType="URL" variable="s_Requerimiento"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="25" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="grdDetalleRS1" searchIds="25" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_calificacion_rs_MC" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="True" wizardResultsForm="grdDetalleRS" returnPage="ReqTecList.ccp" PathID="grdDetalleRS1">
			<Components>
				<Button id="26" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="grdDetalleRS1Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="30" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" PathID="grdDetalleRS1s_id_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="34" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="33" posHeight="180" posLeft="10" posTop="10" posWidth="115" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="35" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="36" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="31" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_MesReporte" fieldSource="MesReporte" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mes Reporte" caption="Mes Reporte" required="False" unique="False" PathID="grdDetalleRS1s_MesReporte" connection="cnDisenio" dataSource="mc_c_Mes" boundColumn="IdMes" textColumn="Mes">
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
				<ListBox id="32" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Integer" returnValueType="Number" name="s_AnioReporte" fieldSource="AnioReporte" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Anio Reporte" caption="Anio Reporte" required="False" unique="False" PathID="grdDetalleRS1s_AnioReporte" connection="cnDisenio" dataSource="SELECT * 
FROM mc_c_anio 
order by ano" boundColumn="Ano" textColumn="Ano">
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
				<TextBox id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Requerimiento" PathID="grdDetalleRS1s_Requerimiento">
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
		<IncludePage id="74" name="MenuTablero" PathID="MenuTablero" page="MenuTablero.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="123" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="grdDetalleRS2" connection="cnDisenio" dataSource="select sc.Descripcion ServContractual, sn.nombre  ServNegocio, c.id_ppmc, t.Descripcion Tipo, 
	c.descripción, c.HERR_EST_COST, c.REQ_SERV, c.CUMPL_REQ_FUNC, c.CALIDAD_PROD_TERM, c.RETR_ENTREGABLE, c.COMPL_RUTA_CRITICA,
	c.EST_PROY, c.DEF_FUG_AMB_PROD ,  c.Obs_manuales, c.id_servicio_negocio,
	'Nivel de Servicio: Retraso en Entregables. '  +  i.observaciones ObsRetrEnt,  
	'Nivel de Servicio: Defectos Fugados a Producción. ' + df.observaciones ObsDefFug,  
	'Nivel de Servicio: Requisitos Funcionales. ' + rf.observaciones ObsReqFun,  
	'Nivel de Servicio: Calidad de Productos Terminados/Retraso en Entregables. ' + ca.observaciones  ObsCalidad,
	'Nivel de Servicio: Estimación de Proyectos.' + ep.Observaciones ObsEstProy, 
	ap.observaciones Obs_Apertura ,
	c.IdUniverso, u.medido, mcSAT.Obs_Manuales Obs_SAT,
	u.mestransicion, u.IdEstimacion
from mc_calificacion_rs_MC c
	inner join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
	inner join mc_c_ServContractual sc on sc.Id = c.id_servicio_cont and id_tipo_servicio = 2
	left join mc_c_TipoPPMC  t on t.Id = c.id_tipo 
	left join mc_info_rs_cr_re_rc i on i.id = c.iduniverso
    left join mc_info_rs_cr_deffug df on df.id = c.iduniverso
    left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso
    left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso 
    left join mc_info_rs_cr_EP ep on ep.id = c.iduniverso
    left join mc_info_rs_ap_ec ap on ap.id = c.iduniverso
    left join mc_universo_cds u on u.id = c.iduniverso
    left join mc_calificacion_rs_SAT mcSAT on mcSAT.IdUniverso = c.IdUniverso
where (c.id_proveedor = {s_id_proveedor} or {s_id_proveedor}=0 )
	and (c.MesReporte = {s_MesReporte} or {s_MesReporte}=0)
	and (c.AnioReporte = {s_AnioReporte} or {s_AnioReporte}=0)
	and (u.EsReqTecnico =1) 
	and u.Tipo = 'PC'
	and (numero = '{s_Requerimiento}' or ReqTecnico ='{s_Requerimiento}' or ''='{s_Requerimiento}'
	     or ReqTecnico IN (select reqtecnico from mc_universo_cds where numero ='{s_Requerimiento}'))
order by c.id_ppmc, u.TipoPPMC desc" pageSizeLimit="100" pageSize="True" wizardCaption="DetalleRS" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="grdDetalleRS2" wizardAllowSorting="True">
			<Components>
				<Label id="124" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Grid1_TotalRecords" wizardUseTemplateBlock="False" PathID="grdDetalleRS2Grid1_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="125" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="126" visible="True" name="Sorter_ServContractual" column="ServContractual" wizardCaption="Serv Contractual" wizardSortingType="SimpleDir" wizardControl="ServContractual" wizardAddNbsp="False" PathID="grdDetalleRS2Sorter_ServContractual">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="127" visible="True" name="Sorter_ServNegocio" column="ServNegocio" wizardCaption="Serv Negocio" wizardSortingType="SimpleDir" wizardControl="ServNegocio" wizardAddNbsp="False" PathID="grdDetalleRS2Sorter_ServNegocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="128" visible="True" name="Sorter_id_ppmc" column="id_ppmc" wizardCaption="Id Ppmc" wizardSortingType="SimpleDir" wizardControl="id_ppmc" wizardAddNbsp="False" PathID="grdDetalleRS2Sorter_id_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="129" visible="True" name="Sorter_Tipo" column="Tipo" wizardCaption="Tipo" wizardSortingType="SimpleDir" wizardControl="Tipo" wizardAddNbsp="False" PathID="grdDetalleRS2Sorter_Tipo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="130" visible="True" name="Sorter_descripci_n" column="descripción" wizardCaption="Descripción" wizardSortingType="SimpleDir" wizardControl="descripci_n" wizardAddNbsp="False" PathID="grdDetalleRS2Sorter_descripci_n">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Navigator id="133" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Sorter id="134" visible="True" name="Sorter_CUMPL_REQ_FUNC" wizardSortingType="SimpleDir" PathID="grdDetalleRS2Sorter_CUMPL_REQ_FUNC" wizardCaption="Cumplimiento en Requisitos Funcionales" column="CUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="135" visible="True" name="Sorter_CALIDAD_PROD_TERM" wizardSortingType="SimpleDir" PathID="grdDetalleRS2Sorter_CALIDAD_PROD_TERM" wizardCaption="Calidad de&lt;br&gt;Productos&lt;br&gt;Terminados" column="CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="136" visible="True" name="Sorter_RETR_ENTREGABLE" wizardSortingType="SimpleDir" PathID="grdDetalleRS2Sorter_RETR_ENTREGABLE" wizardCaption="Retraso en&lt;br&gt;Entregables" column="RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="137" visible="True" name="Sorter_COMPL_RUTA_CRITICA" wizardSortingType="SimpleDir" PathID="grdDetalleRS2Sorter_COMPL_RUTA_CRITICA" wizardCaption="Completar&lt;br&gt;Tareas – en&lt;br&gt;Ruta Crítica" column="COMPL_RUTA_CRITICA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="138" visible="True" name="Sorter_EST_PROY" wizardSortingType="SimpleDir" PathID="grdDetalleRS2Sorter_EST_PROY" wizardCaption="Estimación de&lt;br&gt;Proyectos&lt;br&gt;(Costo Actual&lt;br&gt;vs. Costo&lt;br&gt;Estimado)" column="EST_PROY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="139" visible="True" name="Sorter_DEF_FUG_AMB_PROD" wizardSortingType="SimpleDir" PathID="grdDetalleRS2Sorter_DEF_FUG_AMB_PROD" wizardCaption="Defectos&lt;br&gt;Fugados al&lt;br&gt;Ambiente&lt;br&gt;Productivo" column="DEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Panel id="140" visible="True" generateDiv="False" name="Panel1" wizardInnerHTML="              &lt;tr class=&quot;Row&quot;&gt;
                &lt;td&gt;{ServContractual}&lt;/td&gt; 
                &lt;td&gt;{ServNegocio}&lt;/td&gt; 
                &lt;td style=&quot;text-align: right;&quot;&gt;&lt;a href=&quot;{id_ppmc_Src}&quot; id=&quot;grdDetalleRSid_ppmc_{grdDetalleRS:rowNumber}&quot;&gt;{id_ppmc}&lt;/a&gt;&lt;/td&gt; 
                &lt;td&gt;{Tipo}&lt;/td&gt; 
                &lt;td&gt;{descripci_n}&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{HERR_EST_COST} 
                  &lt;!-- BEGIN Image imgCumpleHE --&gt;&lt;img id=&quot;grdDetalleRSimgCumpleHE_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgCumpleHE}&quot;&gt;&lt;!-- END Image imgCumpleHE --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{REQ_SERV} 
                  &lt;!-- BEGIN Image imgCumpleRS --&gt;&lt;img id=&quot;grdDetalleRSimgCumpleRS_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgCumpleRS}&quot;&gt;&lt;!-- END Image imgCumpleRS --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{CUMPL_REQ_FUNC} 
                  &lt;!-- BEGIN Image imgCUMPL_REQ_FUNC --&gt;&lt;img id=&quot;grdDetalleRSimgCUMPL_REQ_FUNC_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgCUMPL_REQ_FUNC}&quot;&gt;&lt;!-- END Image imgCUMPL_REQ_FUNC --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{CALIDAD_PROD_TERM} 
                  &lt;!-- BEGIN Image imgCALIDAD_PROD_TERM --&gt;&lt;img id=&quot;grdDetalleRSimgCALIDAD_PROD_TERM_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgCALIDAD_PROD_TERM}&quot;&gt;&lt;!-- END Image imgCALIDAD_PROD_TERM --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{RETR_ENTREGABLE} 
                  &lt;!-- BEGIN Image imgRETR_ENTREGABLE --&gt;&lt;img id=&quot;grdDetalleRSimgRETR_ENTREGABLE_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgRETR_ENTREGABLE}&quot;&gt;&lt;!-- END Image imgRETR_ENTREGABLE --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{COMPL_RUTA_CRITICA} 
                  &lt;!-- BEGIN Image imgCOMPL_RUTA_CRITICA --&gt;&lt;img id=&quot;grdDetalleRSimgCOMPL_RUTA_CRITICA_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgCOMPL_RUTA_CRITICA}&quot;&gt;&lt;!-- END Image imgCOMPL_RUTA_CRITICA --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{EST_PROY} 
                  &lt;!-- BEGIN Image imgEST_PROY --&gt;&lt;img id=&quot;grdDetalleRSimgEST_PROY_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgEST_PROY}&quot;&gt;&lt;!-- END Image imgEST_PROY --&gt;&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot;&gt;{DEF_FUG_AMB_PROD} 
                  &lt;!-- BEGIN Image imgDEF_FUG_AMB_PROD --&gt;&lt;img id=&quot;grdDetalleRSimgDEF_FUG_AMB_PROD_{grdDetalleRS:rowNumber}&quot; alt=&quot;&quot; src=&quot;{imgDEF_FUG_AMB_PROD}&quot;&gt;&lt;!-- END Image imgDEF_FUG_AMB_PROD --&gt;&lt;/td&gt; 
                &lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot;&gt;{Obs_Apertura}&lt;br&gt;
                  {ObsReqFun}&lt;br&gt;
                  {ObsCalidad}&lt;br&gt;
                  {ObsRetrEnt}&lt;br&gt;
                  {ObsEstProy}&lt;br&gt;
                  {ObsDefFug}&lt;/td&gt; 
                &lt;td style=&quot;text-align: center;&quot; rowspan=&quot;1&quot; colspan=&quot;1&quot;&gt;&lt;a href=&quot;{lkEvidencia_Src}&quot; id=&quot;grdDetalleRSlkEvidencia_{grdDetalleRS:rowNumber}&quot;&gt;Ver Evidencia&lt;/a&gt;&lt;/td&gt;
              &lt;/tr&gt;
" PathID="grdDetalleRS2Panel1">
					<Components>
						<Label id="141" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ServContractual" fieldSource="ServContractual" wizardCaption="Serv Contractual" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRS2Panel1ServContractual">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="142" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ServNegocio" fieldSource="ServNegocio" wizardCaption="Serv Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRS2Panel1ServNegocio">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Link id="143" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id_ppmc" fieldSource="id_ppmc" wizardCaption="Id Ppmc" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdDetalleRS2Panel1id_ppmc" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="CalificaPPMCSAT.ccp" linkProperties="{'textSource':'','textSourceDB':'id_ppmc','hrefSource':'CalificaPPMCSAT.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'IdUniverso','parameterName':'IdUniverso'},'length':1,'objectType':'linkParameters'}}"><Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters>
								<LinkParameter id="144" sourceType="DataField" name="IdUniverso" source="IdUniverso" old_temp_id="97"/>
							</LinkParameters>
						</Link>
						<Label id="145" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Tipo" fieldSource="Tipo" wizardCaption="Tipo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRS2Panel1Tipo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="146" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripci_n" fieldSource="descripción" wizardCaption="Descripción" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRS2Panel1descripci_n">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="151" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="CUMPL_REQ_FUNC" PathID="grdDetalleRS2Panel1CUMPL_REQ_FUNC" fieldSource="CUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="152" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCUMPL_REQ_FUNC" PathID="grdDetalleRS2Panel1imgCUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="153" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="CALIDAD_PROD_TERM" PathID="grdDetalleRS2Panel1CALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="154" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCALIDAD_PROD_TERM" PathID="grdDetalleRS2Panel1imgCALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="155" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="RETR_ENTREGABLE" PathID="grdDetalleRS2Panel1RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="156" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgRETR_ENTREGABLE" PathID="grdDetalleRS2Panel1imgRETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="157" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="COMPL_RUTA_CRITICA" PathID="grdDetalleRS2Panel1COMPL_RUTA_CRITICA" fieldSource="COMPL_RUTA_CRITICA">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="158" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCOMPL_RUTA_CRITICA" PathID="grdDetalleRS2Panel1imgCOMPL_RUTA_CRITICA">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="159" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="EST_PROY" PathID="grdDetalleRS2Panel1EST_PROY" fieldSource="EST_PROY">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="160" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgEST_PROY" PathID="grdDetalleRS2Panel1imgEST_PROY">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="161" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DEF_FUG_AMB_PROD" PathID="grdDetalleRS2Panel1DEF_FUG_AMB_PROD" fieldSource="DEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="162" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgDEF_FUG_AMB_PROD" PathID="grdDetalleRS2Panel1imgDEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="163" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="IdEstimacion" PathID="grdDetalleRS2Panel1IdEstimacion" fieldSource="IdEstimacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="164"/>
					</Actions>
				</Event>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="165"/>
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
				<SQLParameter id="174" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
<SQLParameter id="175" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_MesReporte" parameterType="URL" variable="s_MesReporte"/>
<SQLParameter id="176" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="s_AnioReporte" parameterType="URL" variable="s_AnioReporte"/>
<SQLParameter id="177" dataType="Text" parameterSource="s_Requerimiento" parameterType="URL" variable="s_Requerimiento"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="ReqTecList_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="ReqTecList.php" forShow="True" url="ReqTecList.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="89" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
