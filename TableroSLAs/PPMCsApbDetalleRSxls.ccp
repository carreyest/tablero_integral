<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Austere4" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="grdDetalleRS" connection="cnDisenio" dataSource="select sc.Descripcion ServContractual, sn.nombre  ServNegocio, c.id_ppmc, t.Descripcion Tipo, 
	c.descripción, c.HERR_EST_COST, c.REQ_SERV, c.CUMPL_REQ_FUNC, c.CALIDAD_PROD_TERM, c.RETR_ENTREGABLE, c.COMPL_RUTA_CRITICA,
	c.EST_PROY, c.DEF_FUG_AMB_PROD , c.CAL_COD,  c.Obs_manuales, c.id_servicio_negocio,
	case when c.RETR_ENTREGABLE is not null then 
		'Nivel de Servicio: Retraso en Entregables. '  +  i.observaciones
	else
		'Nivel de Servicio: Completar Tareas en Ruta Crítica. '  +  i.observaciones 
	end ObsRetrEnt,  
	'Nivel de Servicio: Defectos Fugados a Producción. ' + df.observaciones ObsDefFug,  
	'Nivel de Servicio: Requisitos Funcionales. ' + rf.observaciones ObsReqFun,  
	'Nivel de Servicio: Calidad de Productos Terminados/Retraso en Entregables. ' + ca.observaciones  ObsCalidad,
	'Nivel de Servicio: Estimación de Proyectos.' + ep.Observaciones ObsEstProy, 
	ap.observaciones Obs_Apertura ,
	c.IdUniverso, u.medido, mcSAT.Obs_Manuales Obs_SAT,
	u.mestransicion, u.IdEstimacion , u.EsReqTecnico 
from mc_calificacion_rs_MC c
	inner join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
	inner join mc_c_ServContractual sc on sc.Id = c.id_servicio_cont and id_tipo_servicio = 2
	left  join mc_c_TipoPPMC  t on t.Id = c.id_tipo 
	left join mc_info_rs_cr_re_rc i on i.id = c.iduniverso
    left join mc_info_rs_cr_deffug df on df.id = c.iduniverso
    left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso
    left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso 
    left join mc_info_rs_cr_EP ep on ep.id = c.iduniverso
    left join mc_info_rs_ap_ec ap on ap.id = c.iduniverso
    left join mc_universo_cds u on u.id = c.iduniverso
    left join mc_calificacion_rs_SAT mcSAT on mcSAT.IdUniverso = c.IdUniverso
where c.id_proveedor = {s_id_proveedor}
	and c.MesReporte = {s_MesReporte}
	and c.AnioReporte = {s_AnioReporte}
	and (u.slo={sSLO} ) 
	and (u.numero like '%{s_PPMC}%')
	and (u.revision&lt;&gt;2 or revision is null) 
	" pageSizeLimit="100" pageSize="True" wizardCaption="DetalleRS" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="True" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="grdDetalleRS" wizardAllowSorting="True">
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
				<Sorter id="13" visible="True" name="Sorter_Obs_manuales" column="Obs_manuales" wizardCaption="Obs Manuales" wizardSortingType="SimpleDir" wizardControl="Obs_manuales" wizardAddNbsp="False" PathID="grdDetalleRSSorter_Obs_manuales">
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
				<Sorter id="57" visible="True" name="Sorter_CUMPL_REQ_FUNC" wizardSortingType="SimpleDir" PathID="grdDetalleRSSorter_CUMPL_REQ_FUNC" wizardCaption="Cumplimiento en Requisitos Funcionales" column="CUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="59" visible="True" name="Sorter_CALIDAD_PROD_TERM" wizardSortingType="SimpleDir" PathID="grdDetalleRSSorter_CALIDAD_PROD_TERM" wizardCaption="Calidad de&lt;br&gt;Productos&lt;br&gt;Terminados" column="CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="61" visible="True" name="Sorter_RETR_ENTREGABLE" wizardSortingType="SimpleDir" PathID="grdDetalleRSSorter_RETR_ENTREGABLE" wizardCaption="Retraso en&lt;br&gt;Entregables" column="RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="65" visible="True" name="Sorter_EST_PROY" wizardSortingType="SimpleDir" PathID="grdDetalleRSSorter_EST_PROY" wizardCaption="Estimación de&lt;br&gt;Proyectos&lt;br&gt;(Costo Actual&lt;br&gt;vs. Costo&lt;br&gt;Estimado)" column="EST_PROY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="67" visible="True" name="Sorter_DEF_FUG_AMB_PROD" wizardSortingType="SimpleDir" PathID="grdDetalleRSSorter_DEF_FUG_AMB_PROD" wizardCaption="Defectos&lt;br&gt;Fugados al&lt;br&gt;Ambiente&lt;br&gt;Productivo" column="DEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
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
						<Label id="56" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="CUMPL_REQ_FUNC" PathID="grdDetalleRSPanel1CUMPL_REQ_FUNC" fieldSource="CUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="68" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCUMPL_REQ_FUNC" PathID="grdDetalleRSPanel1imgCUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="58" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="CALIDAD_PROD_TERM" PathID="grdDetalleRSPanel1CALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="69" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCALIDAD_PROD_TERM" PathID="grdDetalleRSPanel1imgCALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="60" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="RETR_ENTREGABLE" PathID="grdDetalleRSPanel1RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="70" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgRETR_ENTREGABLE" PathID="grdDetalleRSPanel1imgRETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="64" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="CAL_COD" PathID="grdDetalleRSPanel1CAL_COD" fieldSource="CAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="72" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCAL_COD" PathID="grdDetalleRSPanel1imgCAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="66" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DEF_FUG_AMB_PROD" PathID="grdDetalleRSPanel1DEF_FUG_AMB_PROD" fieldSource="DEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="73" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgDEF_FUG_AMB_PROD" PathID="grdDetalleRSPanel1imgDEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Obs_Apertura" fieldSource="Obs_Apertura" wizardCaption="Obs Manuales" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdDetalleRSPanel1Obs_Apertura">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="78" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ObsReqFun" PathID="grdDetalleRSPanel1ObsReqFun" fieldSource="ObsReqFun">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="79" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ObsCalidad" PathID="grdDetalleRSPanel1ObsCalidad" fieldSource="ObsCalidad">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="80" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ObsRetrEnt" PathID="grdDetalleRSPanel1ObsRetrEnt" fieldSource="ObsRetrEnt">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="81" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ObsEstProy" PathID="grdDetalleRSPanel1ObsEstProy" fieldSource="ObsEstProy">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="85" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ObsDefFug" PathID="grdDetalleRSPanel1ObsDefFug" fieldSource="ObsDefFug">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Link id="93" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkEvidencia" PathID="grdDetalleRSPanel1lkEvidencia" fieldSource="Ver Evidencia" wizardUseTemplateBlock="False" linkProperties="{&quot;textSource&quot;:&quot;&quot;,&quot;textSourceDB&quot;:&quot;Ver Evidencia&quot;,&quot;hrefSource&quot;:&quot;satportal.dssat.sat.gob.mx/agcti/SDMA4-Admvo/Documentos compartidos/Operación del Servicio/Itera/201505/EntregablesPeriódicos/NivelesServicio/Evidencias_CDS2&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;length&quot;:0,&quot;objectType&quot;:&quot;linkParameters&quot;}}" hrefSource="satportal.dssat.sat.gob.mx/agcti/SDMA4-Admvo/Documentos compartidos/Operación del Servicio/Itera/201505/EntregablesPeriódicos/NivelesServicio/Evidencias_CDS2">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<Label id="109" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Obs_SAT" PathID="grdDetalleRSPanel1Obs_SAT" fieldSource="Obs_SAT">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="113" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="IdEstimacion" PathID="grdDetalleRSPanel1IdEstimacion" fieldSource="IdEstimacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Link id="117" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lkRT" PathID="grdDetalleRSPanel1lkRT" visible="Dynamic" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="ReqTecList.ccp" fieldSource="T" wizardUseTemplateBlock="False" linkProperties="{'textSource':'RT','textSourceDB':'','hrefSource':'ReqTecList.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<LinkParameters/>
						</Link>
						<Image id="44" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCumpleHE" PathID="grdDetalleRSPanel1imgCumpleHE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
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
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="188"/>
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
				<SQLParameter id="189" dataType="Integer" defaultValue="0" designDefaultValue="3" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="190" dataType="Integer" defaultValue="0" designDefaultValue="4" parameterSource="s_MesReporte" parameterType="URL" variable="s_MesReporte"/>
				<SQLParameter id="191" dataType="Integer" defaultValue="0" designDefaultValue="2014" parameterSource="s_AnioReporte" parameterType="URL" variable="s_AnioReporte"/>
				<SQLParameter id="192" dataType="Integer" defaultValue="0" designDefaultValue="1" parameterSource="sSLO" parameterType="URL" variable="sSLO"/>
				<SQLParameter id="193" dataType="Text" parameterSource="s_PPMC" parameterType="URL" variable="s_PPMC"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="25" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="grdDetalleRS1" searchIds="25" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_calificacion_rs_MC" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="True" wizardResultsForm="grdDetalleRS" returnPage="PPMCsApbDetalleRSxls.ccp" PathID="grdDetalleRS1">
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
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="185" posHeight="180" posLeft="10" posTop="10" posWidth="158" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="186" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="187" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
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
where ano &gt; 2013 
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
				<TextBox id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_PPMC" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="grdDetalleRS1s_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="138"/>
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
		<IncludePage id="137" name="MenuTablero1" PathID="MenuTablero1" page="MenuTablero.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="139" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="grid_capc" connection="cnDisenio" dataSource="SELECT mc_calificacion_capc.*, mc_c_ServContractual.Descripcion AS mc_c_ServContractual_Descripcion ,
	a.Observaciones Obs_Ap
FROM mc_calificacion_capc 
	left  JOIN mc_c_ServContractual ON mc_calificacion_capc.id_serviciocont = mc_c_ServContractual.Id
		left join mc_info_capc_ap a on a.id =  mc_calificacion_capc.id 
WHERE numero LIKE '%{s_numero}%'
AND (mes = {s_mes} or  {s_mes}=0)
AND (anio = {s_anio} or {s_anio}=0)
" pageSizeLimit="100" pageSize="True" wizardCaption="DetalleRS" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="grid_capc">
			<Components>
				<Sorter id="144" visible="True" name="Sorter_mc_c_ServContractual_Descripcion" column="mc_c_ServContractual_Descripcion" wizardCaption="Mc C Serv Contractual Descripcion" wizardSortingType="SimpleDir" wizardControl="mc_c_ServContractual_Descripcion" wizardAddNbsp="False" PathID="grid_capcSorter_mc_c_ServContractual_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="145" visible="True" name="Sorter_numero" column="numero" wizardCaption="Numero" wizardSortingType="SimpleDir" wizardControl="numero" wizardAddNbsp="False" PathID="grid_capcSorter_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="146" visible="True" name="Sorter_Descripcion" column="Descripcion" wizardCaption="Descripcion" wizardSortingType="SimpleDir" wizardControl="Descripcion" wizardAddNbsp="False" PathID="grid_capcSorter_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="147" visible="True" name="Sorter_Agrupador" column="Agrupador" wizardCaption="Agrupador" wizardSortingType="SimpleDir" wizardControl="Agrupador" wizardAddNbsp="False" PathID="grid_capcSorter_Agrupador">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="148" visible="True" name="Sorter_HERR_EST_COST" column="HERR_EST_COST" wizardCaption="HERR EST COST" wizardSortingType="SimpleDir" wizardControl="HERR_EST_COST" wizardAddNbsp="False" PathID="grid_capcSorter_HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="149" visible="True" name="Sorter_REQ_SERV" column="REQ_SERV" wizardCaption="REQ SERV" wizardSortingType="SimpleDir" wizardControl="REQ_SERV" wizardAddNbsp="False" PathID="grid_capcSorter_REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="150" visible="True" name="Sorter_CUMPL_REQ_FUN" column="CUMPL_REQ_FUN" wizardCaption="CUMPL REQ FUN" wizardSortingType="SimpleDir" wizardControl="CUMPL_REQ_FUN" wizardAddNbsp="False" PathID="grid_capcSorter_CUMPL_REQ_FUN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="151" visible="True" name="Sorter_CALIDAD_PROD_TERM" column="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardSortingType="SimpleDir" wizardControl="CALIDAD_PROD_TERM" wizardAddNbsp="False" PathID="grid_capcSorter_CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="152" visible="True" name="Sorter_DEDUC_OMISION" column="DEDUC_OMISION" wizardCaption="DEDUC OMISION" wizardSortingType="SimpleDir" wizardControl="DEDUC_OMISION" wizardAddNbsp="False" PathID="grid_capcSorter_DEDUC_OMISION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="153" visible="True" name="Sorter_RETR_ENTREGABLE" column="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardSortingType="SimpleDir" wizardControl="RETR_ENTREGABLE" wizardAddNbsp="False" PathID="grid_capcSorter_RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="154" visible="True" name="Sorter_DetalleCalidad" column="DetalleCalidad" wizardCaption="Detalle Calidad" wizardSortingType="SimpleDir" wizardControl="DetalleCalidad" wizardAddNbsp="False" PathID="grid_capcSorter_DetalleCalidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="155" visible="True" name="Sorter_Observaciones" column="Observaciones" wizardCaption="Observaciones" wizardSortingType="SimpleDir" wizardControl="Observaciones" wizardAddNbsp="False" PathID="grid_capcSorter_Observaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="156" visible="True" name="Sorter_id" column="id" wizardCaption="Id" wizardSortingType="SimpleDir" wizardControl="id" wizardAddNbsp="False" PathID="grid_capcSorter_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="157" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="mc_c_ServContractual_Descripcion" fieldSource="mc_c_ServContractual_Descripcion" wizardCaption="Mc C Serv Contractual Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcmc_c_ServContractual_Descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="158" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Database" preserveParameters="GET" name="numero" fieldSource="numero" wizardCaption="Numero" wizardIsPassword="False" wizardUseTemplateBlock="False" hrefSource="numero" linkProperties="{'textSource':'','textSourceDB':'numero','hrefSource':'','hrefSourceDB':'numero','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" wizardAddNbsp="True" PathID="grid_capcnumero">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="159" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Descripcion" fieldSource="Descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcDescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="160" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Agrupador" fieldSource="Agrupador" wizardCaption="Agrupador" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcAgrupador">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Label>
				<Label id="161" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="HERR_EST_COST" fieldSource="HERR_EST_COST" wizardCaption="HERR EST COST" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcHERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="162" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="REQ_SERV" fieldSource="REQ_SERV" wizardCaption="REQ SERV" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcREQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="163" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="CUMPL_REQ_FUN" fieldSource="CUMPL_REQ_FUN" wizardCaption="CUMPL REQ FUN" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcCUMPL_REQ_FUN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters/>
				</Label>
				<Label id="164" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="CALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcCALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="165" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="DEDUC_OMISION" fieldSource="DEDUC_OMISION" wizardCaption="DEDUC OMISION" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcDEDUC_OMISION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="166" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="167" fieldSourceType="DBColumn" dataType="Memo" html="False" generateSpan="False" name="Obs_Ap" fieldSource="Obs_Ap" wizardCaption="Obs Ap" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcObs_Ap">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="168" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DetalleCalidad" fieldSource="DetalleCalidad" wizardCaption="Detalle Calidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcDetalleCalidad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="169" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Observaciones" fieldSource="Observaciones" wizardCaption="Observaciones" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grid_capcObservaciones">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="170" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="id" fieldSource="id" wizardCaption="Id" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grid_capcid">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="171" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="Austere4">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="172" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Grid2_TotalRecords" PathID="grid_capcGrid2_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="173"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="177" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_HERR_EST_COST" PathID="grid_capcImg_HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="178" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_REQ_SERV" PathID="grid_capcImg_REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="179" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CUMPL_REQ_FUN" PathID="grid_capcImg_CUMPL_REQ_FUN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="180" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CALIDAD_PROD_TERM" PathID="grid_capcImg_CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="181" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_DEDUC_OMISION" PathID="grid_capcImg_DEDUC_OMISION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="182" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_RETR_ENTREGABLE" PathID="grid_capcImg_RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="183"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="184"/>
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
				<SQLParameter id="174" dataType="Text" designDefaultValue="0" parameterSource="s_PPMC" parameterType="URL" variable="s_numero"/>
				<SQLParameter id="175" dataType="Integer" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))" designDefaultValue="6" parameterSource="s_MesReporte" parameterType="URL" variable="s_mes"/>
				<SQLParameter id="176" dataType="Integer" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))" designDefaultValue="2015" parameterSource="s_AnioReporte" parameterType="URL" variable="s_anio"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsApbDetalleRSxls_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsApbDetalleRSxls.php" forShow="True" url="PPMCsApbDetalleRSxls.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="89" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="121"/>
			</Actions>
		</Event>
	</Events>
</Page>
