<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 days" needGeneration="0" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0">
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
				<ListBox id="25" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" wizardEmptyCaption="Select Value" PathID="mc_info_incidentesSearchs_id_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
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
				<ListBox id="51" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_AnioReporte" wizardEmptyCaption="Select Value" PathID="mc_info_incidentesSearchs_AnioReporte" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="225" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Ano" logicOperator="And" parameterSource="2013" parameterType="Expression" searchConditionType="GreaterThan"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="224" posHeight="88" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_anio"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="226" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="227" dataType="Integer" fieldName="Ano" tableName="mc_c_anio"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="150" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_MesReporte" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="mc_info_incidentesSearchs_MesReporte" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))">
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
				<TextBox id="228" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Id_incidente_param" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_info_incidentesSearchs_Id_incidente_param">
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
		<Grid id="26" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="mc_info_incidentes" connection="cnDisenio" dataSource="select mc.Id_incidente ,mci.ServicioNegocio ,mci.Aplicacion ,mci.FechaNuevo ,mci.FechaAsignado ,mci.FechaEnCurso ,mci.FechaPendiente ,mci.FechaResuelto ,mci.FechaCerrado, mc.severidad ,
(select top 1 FechaInicioMov from mc_detalle_incidente_avl where Id_Incidente=mci.Id_incidente order by paquete,clavemovimiento ) as RegistroAVL,
mc.Cumple_Inc_TiempoAsignacion ,mc.Cumple_Inc_TiempoSolucion ,mc.Cumple_DISP_SOPORTE ,mc.Obs_Manuales , mci.Estado, mcu.analista ,
mcSAT.Obs_Manuales Obs_SAT, mcu.medido
from mc_universo_cds mcu 
	inner join mc_calificacion_incidentes_MC mc on mc.id_incidente = mcu.numero
	left join  mc_info_incidentes mci on mci.id_incidente=mcu.Numero 
               and month(mci.FechaCarga) = mcu.mes and YEAR(mci.FechaCarga )= mcu.anio 
    left join mc_calificacion_incidentes_SAT mcSAT on mcSAT.id_incidente = mc.id_incidente 
where mcu.tipo='IN'
and mcu.mes={s_mes_param}
and mcu.anio={s_anio_param}
and (mcu.analista='{s_analista_param}' OR '{s_analista_param}'=''  ) 
and ((mcu.id_proveedor={s_cds_param}) or ({s_cds_param}=0))
and (mci.Id_incidente like '%{s_Id_incidente_param}%' or mci.Id_incidente is null)
and (mcu.slo is null or mcu.slo =0)" pageSizeLimit="100" pageSize="True" wizardCaption="Grid1" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="False" gridExtendedHTML="False" PathID="mc_info_incidentes" wizardAllowSorting="True">
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
				<ImageLink id="163" visible="No" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="mc_info_incidentesImageLink1" linkProperties="{'textSource':'','textSourceDB':'','hrefSource':'','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="164"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Panel id="212" visible="True" generateDiv="False" name="Panel1" wizardInnerHTML="&lt;tr class=&quot;Row&quot;&gt;
          &lt;td&gt;&lt;a href=&quot;{Id_incidente_Src}&quot; id=&quot;mc_info_incidentesId_incidente_{mc_info_incidentes:rowNumber}&quot;&gt;{Id_incidente}&lt;/a&gt;&amp;nbsp;&lt;/td&gt; 
          &lt;td&gt;
            &lt;div align=&quot;center&quot;&gt;
              {ServicioNegocio} 
            &lt;/div&gt;
 &amp;nbsp;&lt;/td&gt; 
          &lt;td&gt;
            &lt;div align=&quot;center&quot;&gt;
              {Aplicacion} 
            &lt;/div&gt;
 &amp;nbsp;&lt;/td&gt; 
          &lt;td&gt;&amp;nbsp; 
            &lt;div align=&quot;center&quot;&gt;
              {Severidad} 
            &lt;/div&gt;
          &lt;/td&gt; 
          &lt;td align=&quot;center&quot;&gt;&amp;nbsp; 
            &lt;p align=&quot;center&quot;&gt;&lt;img id=&quot;mc_info_incidentesCumple_Inc_TiempoAsignacion_{mc_info_incidentes:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Cumple_Inc_TiempoAsignacion}&quot;&gt;&lt;/p&gt;
          &lt;/td&gt; 
          &lt;td&gt;&amp;nbsp; 
            &lt;p align=&quot;center&quot;&gt;&lt;img id=&quot;mc_info_incidentesCumple_Inc_TiempoSolucion_{mc_info_incidentes:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Cumple_Inc_TiempoSolucion}&quot;&gt;&lt;/p&gt;
          &lt;/td&gt; 
          &lt;td&gt;&amp;nbsp; 
            &lt;p align=&quot;center&quot;&gt;&lt;img id=&quot;mc_info_incidentesCumple_DISP_SOPORTE_{mc_info_incidentes:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Cumple_DISP_SOPORTE}&quot;&gt;&lt;/p&gt;
          &lt;/td&gt; 
          &lt;td&gt;&amp;nbsp; 
            &lt;div&gt;
              {Obs_Manuales} 
            &lt;/div&gt;
          &lt;/td&gt; 
          &lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot;&gt;&lt;a href=&quot;{lkEvidencia_Src}&quot; id=&quot;mc_info_incidenteslkEvidencia_{mc_info_incidentes:rowNumber}&quot;&gt;Ver Evidencia&lt;/a&gt;&lt;/td&gt; 
          &lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot;&gt;{Obs_SAT}&lt;/td&gt;
        &lt;/tr&gt;" PathID="mc_info_incidentesPanel1">
					<Components>
						<Link id="38" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Id_incidente" fieldSource="Id_incidente" wizardCaption="Id Incidente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesPanel1Id_incidente" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="IncidenteDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'Id_incidente','hrefSource':'IncidenteDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id_incidente','parameterName':'s_Id_incidente'},'1':{'sourceType':'DataField','parameterSource':'Id_incidente','parameterName':'Id_incidente'},'2':{'sourceType':'DataField','parameterSource':'Id_incidente','parameterName':'Id_incidente'},'3':{'sourceType':'DataField','parameterSource':'Id_incidente','parameterName':'Id_incidente'},'4':{'sourceType':'Expression','parameterSource':'1','parameterName':'NC'},'length':5,'objectType':'linkParameters'}}">
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
								<LinkParameter id="215" sourceType="DataField" name="Id_incidente" source="Id_incidente" old_temp_id="56"/>
								<LinkParameter id="230" sourceType="Expression" name="NC" source="1"/>
</LinkParameters>
						</Link>
						<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ServicioNegocio" fieldSource="ServicioNegocio" wizardCaption="Servicio Negocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesPanel1ServicioNegocio">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Aplicacion" fieldSource="Aplicacion" wizardCaption="Aplicacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_info_incidentesPanel1Aplicacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="138" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Severidad" PathID="mc_info_incidentesPanel1Severidad" fieldSource="severidad">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="140" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Cumple_Inc_TiempoAsignacion" PathID="mc_info_incidentesPanel1Cumple_Inc_TiempoAsignacion" fieldSource="Cumple_Inc_TiempoAsignacion" visible="Yes">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="160"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="141" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="Cumple_Inc_TiempoSolucion" PathID="mc_info_incidentesPanel1Cumple_Inc_TiempoSolucion" fieldSource="Cumple_Inc_TiempoSolucion" visible="Yes">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="161"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="143" fieldSourceType="DBColumn" dataType="Memo" html="False" generateSpan="False" name="Obs_Manuales" PathID="mc_info_incidentesPanel1Obs_Manuales" fieldSource="Obs_Manuales">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Link id="199" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkEvidencia" PathID="mc_info_incidentesPanel1lkEvidencia" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Ver Evidencia','textSourceDB':'','hrefSource':'','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<Label id="206" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Obs_SAT" PathID="mc_info_incidentesPanel1Obs_SAT" fieldSource="Obs_SAT">
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
				<Sorter id="216" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="mc_info_incidentesSorter1" wizardCaption="Manejo de Incidentes &lt;BR&gt;Tiempo de Atención " column="Cumple_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="217" visible="True" name="Sorter2" wizardSortingType="SimpleDir" PathID="mc_info_incidentesSorter2" wizardCaption="Manejo de Incidentes &lt;br&gt;Tiempo de Solución" column="Cumple_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="68"/>
					</Actions>
				</Event>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="200"/>
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
				<SQLParameter id="219" dataType="Text" parameterSource="s_Id_incidente_param" parameterType="URL" variable="s_Id_incidente_param"/>
				<SQLParameter id="220" dataType="Integer" defaultValue="0" designDefaultValue="3" parameterSource="s_id_proveedor" parameterType="URL" variable="s_cds_param"/>
				<SQLParameter id="221" dataType="Integer" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))" designDefaultValue="11" parameterSource="s_MesReporte" parameterType="URL" variable="s_mes_param"/>
				<SQLParameter id="222" dataType="Text" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))" designDefaultValue="2013" parameterSource="s_AnioReporte" parameterType="URL" variable="s_anio_param"/>
				<SQLParameter id="223" dataType="Text" parameterSource="s_analista_param" parameterType="URL" variable="s_analista_param"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<IncludePage id="165" name="Header" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<IncludePage id="229" name="MenuTablero" page="MenuTablero.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="IncidentesDetalleNS_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="IncidentesDetalleNS.php" forShow="True" url="IncidentesDetalleNS.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
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
