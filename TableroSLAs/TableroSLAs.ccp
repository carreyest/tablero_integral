<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Austere4" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="55" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Grid2" searchIds="55" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_universo_cds" wizardCaption="Especificar Datos" changedCaptionSearch="True" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="True" wizardResultsForm="Grid1" returnPage="TableroSLAs.ccp" PathID="Grid2">
			<Components>
				<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="Grid2Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="60" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" PathID="Grid2s_id_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre">
					<Components/>
					<Events/>
					<TableParameters>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="276" posHeight="180" posLeft="10" posTop="10" posWidth="158" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="277" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="278" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="61" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_MesReporte" fieldSource="mes" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Mes" caption="Mes" required="False" unique="False" PathID="Grid2s_MesReporte" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="475" posHeight="104" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_mes"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="476" fieldName="*"/>
					</Fields>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="62" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_AnioReporte" fieldSource="anio" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Anio" caption="Anio" required="False" unique="False" PathID="Grid2s_AnioReporte" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="310" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Ano" logicOperator="And" parameterSource="0" parameterType="Expression" searchConditionType="GreaterThan"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="313" tableName="mc_c_anio"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="311" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="312" dataType="Integer" fieldName="Ano" tableName="mc_c_anio"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<CheckBox id="318" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" defaultValue="Unchecked" name="sSLO" PathID="Grid2sSLO" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="100"/>
					</Actions>
				</Event>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="472"/>
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
		<IncludePage id="121" name="MenuTablero" PathID="MenuTablero" page="MenuTablero.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Link id="209" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="UrlCDS" PathID="UrlCDS" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
			<LinkParameters/>
		</Link>
		<Panel id="411" visible="True" generateDiv="False" name="pnlSLAsCAPC" wizardInnerHTML="
      &lt;!-- BEGIN Grid grdTableroSLAs --&gt;
      &lt;table id=&quot;grdTableroSLAs&quot; class=&quot;MainTable&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;
        &lt;tr&gt;
          &lt;td valign=&quot;top&quot;&gt;
            &lt;table class=&quot;Header&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;
              &lt;tr&gt;
                &lt;td class=&quot;HeaderLeft&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;Styles/{CCS_Style}/Images/Spacer.gif&quot;&gt;&lt;/td&gt; 
                &lt;td class=&quot;th&quot;&gt;&lt;strong&gt;Niveles de Servicio Reportados por el CAPC&lt;/strong&gt;&lt;/td&gt; 
                &lt;td class=&quot;HeaderRight&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;Styles/{CCS_Style}/Images/Spacer.gif&quot;&gt;&lt;/td&gt;
              &lt;/tr&gt;
            &lt;/table&gt;
 
            &lt;table class=&quot;Grid&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;
              &lt;tr class=&quot;Caption&quot;&gt;
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_Orden --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_Orden&quot;&gt;Servicio&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_Orden --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotHERR_EST_COST --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotHERR_EST_COST&quot;&gt;Uso de una&lt;br&gt;
                Herramienta&lt;br&gt;
                para Estimación&lt;br&gt;
                de Costo&lt;br&gt;
                y Tiempos&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotHERR_EST_COST --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotREQ_SERV --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotREQ_SERV&quot;&gt;Requisitos&lt;br&gt;
                de Servicio&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotREQ_SERV --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotCUMPL_REQ_FUNC --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotCUMPL_REQ_FUNC&quot;&gt;Cumplimiento en&lt;br&gt;
                Requisitos&lt;br&gt;
                Funcionales&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotCUMPL_REQ_FUNC --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotCALIDAD_PROD_TERM --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotCALIDAD_PROD_TERM&quot;&gt;Calidad de&lt;br&gt;
                Productos&lt;br&gt;
                Terminados&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotCALIDAD_PROD_TERM --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotRETR_ENTREGABLE --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotRETR_ENTREGABLE&quot;&gt;Retraso en&lt;br&gt;
                Entregables&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotRETR_ENTREGABLE --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotCAL_COD --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotCAL_COD&quot;&gt;Calidad&lt;br&gt;
                de Código&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotCAL_COD --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotDEF_FUG_AMB_PROD --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotDEF_FUG_AMB_PROD&quot;&gt;Defectos Fugados&lt;br&gt;
                al Ambiente&lt;br&gt;
                Productivo&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotDEF_FUG_AMB_PROD --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotTiempoAsignacion --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotTiempoAsignacion&quot;&gt;Manejo de&lt;br&gt;
                Incidentes -&lt;br&gt;
                Tiempo de&lt;br&gt;
                Atención&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotTiempoAsignacion --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotTiempoSolucion --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotTiempoSolucion&quot;&gt;Manejo de&lt;br&gt;
                Incidentes -&lt;br&gt;
                Tiempo de&lt;br&gt;
                Solución&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotTiempoSolucion --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_EFIC_PRES --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_EFIC_PRES&quot;&gt;Eficiencia&lt;br&gt;
                Presupuestal&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_EFIC_PRES --&gt;&lt;/th&gt;
              &lt;/tr&gt;
 
              &lt;!-- BEGIN Row --&gt;
              &lt;tr class=&quot;Row&quot;&gt;
                &lt;td&gt;{descripcion}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_HERR_EST_COST_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_HERR_EST_COST}&quot;&gt;&lt;br&gt;
                  {CumplenHERR_EST_COST}{TotHERR_EST_COST}{HERR_EST_COST}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_REQ_SERV_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_REQ_SERV}&quot;&gt;&lt;br&gt;
                  {CumplenREQ_SERV}{TotREQ_SERV}{REQ_SERV}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_CUMPL_REQ_FUNC_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_CUMPL_REQ_FUNC}&quot;&gt;&lt;br&gt;
                  {CumplenCUMPL_REQ_FUNC}{TotCUMPL_REQ_FUNC}{CUMPL_REQ_FUNC}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_CALIDAD_PROD_TERM_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_CALIDAD_PROD_TERM}&quot;&gt;&lt;br&gt;
                  {CumplenCALIDAD_PROD_TERM}{TotCALIDAD_PROD_TERM}{CALIDAD_PROD_TERM}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_RETR_ENTREGABLE_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_RETR_ENTREGABLE}&quot;&gt;&lt;br&gt;
                  {CumplenRETR_ENTREGABLE}{TotRETR_ENTREGABLE}{RETR_ENTREGABLE}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_CAL_COD_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_CAL_COD}&quot;&gt;&lt;br&gt;
                  {CumplenCAL_COD}{TotCAL_COD}{CAL_COD}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_DEF_FUG_AMB_PROD_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_DEF_FUG_AMB_PROD}&quot;&gt;&lt;br&gt;
                  {CumplenDEF_FUG_AMB_PROD}{TotDEF_FUG_AMB_PROD}{DEF_FUG_AMB_PROD}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_Inc_TiempoAsignacion_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_Inc_TiempoAsignacion}&quot;&gt;&lt;br&gt;
                  {CumplenInc_TiempoAsignacion}{TotInc_TiempoAsignacion}{Inc_TiempoAsignacion}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_Inc_TiempoSolucion_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_Inc_TiempoSolucion}&quot;&gt;&lt;br&gt;
                  {CumplenInc_TiempoSolucion}{TotInc_TiempoSolucion}{Inc_TiempoSolucion}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_EFIC_PRESUP_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_EFIC_PRESUP}&quot;&gt;&lt;br&gt;
                  {CumplenEFIC_PRESUP}{TotEFIC_PRESUP}{EFIC_PRESUP}&lt;/td&gt;
              &lt;/tr&gt;
 &lt;!-- END Row --&gt;
              &lt;!-- BEGIN NoRecords --&gt;
              &lt;tr class=&quot;NoRecords&quot;&gt;
                &lt;td colspan=&quot;11&quot;&gt;No hay registros&lt;/td&gt;
              &lt;/tr&gt;
              &lt;!-- END NoRecords --&gt;
              &lt;tr class=&quot;Footer&quot;&gt;
                &lt;td colspan=&quot;11&quot;&gt;
                  &lt;!-- BEGIN Navigator Navigator --&gt;&lt;span class=&quot;Navigator&quot;&gt;Registro por página 
                  &lt;select style=&quot;VERTICAL-ALIGN: middle&quot; name=&quot;{FormName}PageSize&quot; data-grid-size=&quot;{FormName}&quot;&gt;
                    &lt;option selected value=&quot;&quot;&gt;-&lt;/option&gt;
 {PageSize_Options}
                  &lt;/select&gt;
 
                  &lt;!-- BEGIN First_On --&gt;&lt;a href=&quot;{First_URL}&quot;&gt;&lt;img alt=&quot;{First_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/First.gif&quot;&gt;&lt;/a&gt; &lt;!-- END First_On --&gt;
                  &lt;!-- BEGIN First_Off --&gt;&lt;img alt=&quot;{First_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/FirstOff.gif&quot;&gt;&lt;!-- END First_Off --&gt;
                  &lt;!-- BEGIN Prev_On --&gt;&lt;a href=&quot;{Prev_URL}&quot;&gt;&lt;img alt=&quot;{Prev_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/Prev.gif&quot;&gt;&lt;/a&gt; &lt;!-- END Prev_On --&gt;
                  &lt;!-- BEGIN Prev_Off --&gt;&lt;img alt=&quot;{Prev_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/PrevOff.gif&quot;&gt;&lt;!-- END Prev_Off --&gt;&amp;nbsp;{Page_Number} de&amp;nbsp;{Total_Pages}&amp;nbsp; 
                  &lt;!-- BEGIN Next_On --&gt;&lt;a href=&quot;{Next_URL}&quot;&gt;&lt;img alt=&quot;{Next_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/Next.gif&quot;&gt;&lt;/a&gt; &lt;!-- END Next_On --&gt;
                  &lt;!-- BEGIN Next_Off --&gt;&lt;img alt=&quot;{Next_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/NextOff.gif&quot;&gt;&lt;!-- END Next_Off --&gt;
                  &lt;!-- BEGIN Last_On --&gt;&lt;a href=&quot;{Last_URL}&quot;&gt;&lt;img alt=&quot;{Last_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/Last.gif&quot;&gt;&lt;/a&gt; &lt;!-- END Last_On --&gt;
                  &lt;!-- BEGIN Last_Off --&gt;&lt;img alt=&quot;{Last_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/LastOff.gif&quot;&gt;&lt;!-- END Last_Off --&gt;&lt;/span&gt;&lt;!-- END Navigator Navigator --&gt;&amp;nbsp;&lt;/td&gt;
              &lt;/tr&gt;
            &lt;/table&gt;
          &lt;/td&gt;
        &lt;/tr&gt;
      &lt;/table&gt;
      &lt;!-- END Grid grdTableroSLAs --&gt;" PathID="pnlSLAsCAPC">
			<Components>
				<Grid id="412" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="grdSLAsCAPC" connection="cnDisenio" dataSource="select 
	c.agrupador,
	v.Descripcion , 
	count(cast(HERR_EST_COST as int)) as TotHERR_EST_COST,
	sum(cast(HERR_EST_COST as int)) as CumplenHERR_EST_COST,
	case when count(cast(HERR_EST_COST as int)) &gt;0 then sum(cast(HERR_EST_COST as int)) /count(cast(HERR_EST_COST as int)) *100 else NULL end as HERR_EST_COST,
	(Select Meta from mc_c_metrica where acronimo='HERR_EST_COST') as Meta_HERR_EST_COST,
	count(cast(REQ_SERV as int)) as TotREQ_SERV,
	sum(cast(REQ_SERV as int)) as CumplenREQ_SERV,
	case when count(cast(REQ_SERV as int)) &gt;0 then sum(cast(REQ_SERV as int)) /count(cast(REQ_SERV as int)) *100 else NULL end as REQ_SERV,
	(Select Meta from mc_c_metrica where acronimo='REQ_SERV') as Meta_REQ_SERV,
	count(cast(CUMPL_REQ_FUN as int)) as TotCUMPL_REQ_FUN,
	sum(cast(CUMPL_REQ_FUN as int)) as CumplenCUMPL_REQ_FUN,
	case when count(cast(CUMPL_REQ_FUN as int)) &gt;0 then sum(cast(CUMPL_REQ_FUN as int)) /count(cast(CUMPL_REQ_FUN as int)) *100 else NULL end as CUMPL_REQ_FUN,
	(Select Meta from mc_c_metrica where acronimo='CUMPL_REQ_FUNC') as Meta_CUMPL_REQ_FUNC,
	max(c.Deductiva) Deductiva,
	count(cast(CALIDAD_PROD_TERM as int)) as TotCALIDAD_PROD_TERM,
	sum(cast(CALIDAD_PROD_TERM as int)) as CumplenCALIDAD_PROD_TERM,
	max(cast(c.CALIDAD_PROD_TERM as int)) CALIDAD_PROD_TERM ,
	(Select Meta from mc_c_metrica where acronimo='CALIDAD_PROD_TERM') as Meta_CALIDAD_PROD_TERM,
	sum(c.ReportesCompletos) ReportesCompletos,
	sum(c.SLAsNoReportados) SLAsNoReportados,
	count(cast(c.DEDUC_OMISION as int)) as TotDEDUC_OMISION,
	sum(cast(c.DEDUC_OMISION as int)) as CumplenDEDUC_OMISION,
	max(cast(c.DEDUC_OMISION as int)) DEDUC_OMISION,
	sum(cast(c.UnidadesActuales as float)) UnidadesActuales,
	sum(cast(c.UnidadesAnteriores as float)) UnidadesAnteriores,  
	max(cast(c.EFIC_PRESUP as int)) EFIC_PRESUP,
	avg(cast(c.DiasPlaneados as int)) DiasPlaneados,
	avg(cast(c.DiasReales as int)) DiasReales,
	count(cast(c.RETR_ENTREGABLE as int)) as TotRETR_ENTREGABLE,
	sum(cast(c.RETR_ENTREGABLE as int)) as CumplenRETR_ENTREGABLE,
	max(cast(c.RETR_ENTREGABLE as int)) RETR_ENTREGABLE,
	--case when count(cast(c.RETR_ENTREGABLE as int)) &gt;0 then sum(cast(c.RETR_ENTREGABLE as int)) /count(cast(c.RETR_ENTREGABLE as int)) *100 else NULL end as RETR_ENTREGABLE,
	(Select Meta from mc_c_metrica where acronimo='RETR_ENTREGABLE') as Meta_RETR_ENTREGABLE,
	v.id IdServCont
	, avg(c.pctcalidad) pctcalidad,
	c.id_serviciocont
from dbo.mc_c_ServContractual v 
     left join mc_calificacion_CAPC c 
	on v.id = c.id_serviciocont 
	and mes={sMes}  
	and anio = {sAnio}
	and SLO = {sSLO}
	where v.Aplica ='CAPC'
group by 	
	v.Descripcion ,
	v.id ,
	c.agrupador,
	c.id_serviciocont" pageSizeLimit="100" pageSize="True" wizardCaption="Niveles de Servicio" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="pnlSLAsCAPCgrdSLAsCAPC" wizardAllowSorting="True">
					<Components>
						<Sorter id="413" visible="True" name="Sorter_TotCUMPL_REQ_FUNC" column="TotCUMPL_REQ_FUNC" wizardCaption="Tot CUMPL REQ FUNC" wizardSortingType="SimpleDir" wizardControl="TotCUMPL_REQ_FUNC" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_TotCUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="414" visible="True" name="Sorter_TotCALIDAD_PROD_TERM" column="TotCALIDAD_PROD_TERM" wizardCaption="Tot CALIDAD PROD TERM" wizardSortingType="SimpleDir" wizardControl="TotCALIDAD_PROD_TERM" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_TotCALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="415" visible="True" name="Sorter_TotRETR_ENTREGABLE" column="TotRETR_ENTREGABLE" wizardCaption="Tot RETR ENTREGABLE" wizardSortingType="SimpleDir" wizardControl="TotRETR_ENTREGABLE" wizardAddNbsp="False" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_TotRETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Label id="420" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripcion" fieldSource="Descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCdescripcion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="421" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotREQ_SERV" fieldSource="TotREQ_SERV" wizardCaption="Tot REQ SERV" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCTotREQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="422" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCUMPL_REQ_FUNC" fieldSource="TotCUMPL_REQ_FUNC" wizardCaption="Tot CUMPL REQ FUNC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCTotCUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="423" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCALIDAD_PROD_TERM" fieldSource="TotCALIDAD_PROD_TERM" wizardCaption="Tot CALIDAD PROD TERM" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCTotCALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="424" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotRETR_ENTREGABLE" fieldSource="TotRETR_ENTREGABLE" wizardCaption="Tot RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCTotRETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="425" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCAL_COD" fieldSource="TotCAL_COD" wizardCaption="Tot EST PROY" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCTotCAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="426" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotDEF_FUG_AMB_PROD" fieldSource="TotDEF_FUG_AMB_PROD" wizardCaption="Tot DEF FUG AMB PROD" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCTotDEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="427" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotInc_TiempoAsignacion" fieldSource="TotTiempoAsignacion" wizardCaption="Tot Tiempo Asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCTotInc_TiempoAsignacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="428" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotInc_TiempoSolucion" fieldSource="TotTiempoSolucion" wizardCaption="Tot Tiempo Solucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCTotInc_TiempoSolucion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Navigator id="429" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Navigator>
						<Sorter id="430" visible="True" name="Sorter_TotREQ_SERV" column="TotREQ_SERV" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_TotREQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="431" visible="True" name="Sorter_TotHERR_EST_COST" column="TotHERR_EST_COST" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_TotHERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Label id="432" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenREQ_SERV" fieldSource="CumplenREQ_SERV" wizardCaption="Cumplen REQ SERV" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenREQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="433" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCUMPL_REQ_FUNC" fieldSource="CumplenCUMPL_REQ_FUNC" wizardCaption="Cumplen CUMPL REQ FUNC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenCUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="434" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCALIDAD_PROD_TERM" fieldSource="CumplenCALIDAD_PROD_TERM" wizardCaption="Cumplen CALIDAD PROD TERM" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenCALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="435" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenRETR_ENTREGABLE" fieldSource="CumplenRETR_ENTREGABLE" wizardCaption="Cumplen RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenRETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="436" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCAL_COD" fieldSource="CumplenCAL_COD" wizardCaption="Cumplen EST PROY" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenCAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="437" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenDEF_FUG_AMB_PROD" fieldSource="CumplenDEF_FUG_AMB_PROD" wizardCaption="Cumplen DEF FUG AMB PROD" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenDEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="438" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenInc_TiempoAsignacion" fieldSource="CumplenTiempoAsignacion" wizardCaption="Cumplen Tiempo Asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenInc_TiempoAsignacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="439" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenInc_TiempoSolucion" fieldSource="CumplenTiempoSolucion" wizardCaption="Cumplen Tiempo Solucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenInc_TiempoSolucion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="440" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="HERR_EST_COST" PathID="pnlSLAsCAPCgrdSLAsCAPCHERR_EST_COST" fieldSource="HERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="441" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="REQ_SERV" PathID="pnlSLAsCAPCgrdSLAsCAPCREQ_SERV" fieldSource="REQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="442" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CUMPL_REQ_FUNC" PathID="pnlSLAsCAPCgrdSLAsCAPCCUMPL_REQ_FUNC" fieldSource="CUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="443" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CALIDAD_PROD_TERM" PathID="pnlSLAsCAPCgrdSLAsCAPCCALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="444" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="RETR_ENTREGABLE" PathID="pnlSLAsCAPCgrdSLAsCAPCRETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="445" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CAL_COD" PathID="pnlSLAsCAPCgrdSLAsCAPCCAL_COD" fieldSource="CAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="446" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="DEF_FUG_AMB_PROD" PathID="pnlSLAsCAPCgrdSLAsCAPCDEF_FUG_AMB_PROD" fieldSource="DEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="447" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Inc_TiempoAsignacion" PathID="pnlSLAsCAPCgrdSLAsCAPCInc_TiempoAsignacion" fieldSource="Inc_TiempoAsignacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="448" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Inc_TiempoSolucion" PathID="pnlSLAsCAPCgrdSLAsCAPCInc_TiempoSolucion" fieldSource="Inc_TiempoSolucion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="449" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_HERR_EST_COST" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_HERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="450" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_REQ_SERV" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_REQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="451" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CUMPL_REQ_FUNC" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_CUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="452" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CALIDAD_PROD_TERM" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_CALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="453" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_RETR_ENTREGABLE" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_RETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="454" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CAL_COD" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_CAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="455" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_DEF_FUG_AMB_PROD" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_DEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="456" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_Inc_TiempoAsignacion" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_Inc_TiempoAsignacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="457" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_Inc_TiempoSolucion" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_Inc_TiempoSolucion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="458" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenEFIC_PRESUP" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenEFIC_PRESUP" fieldSource="Cumple_EF">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="459" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotEFIC_PRESUP" PathID="pnlSLAsCAPCgrdSLAsCAPCTotEFIC_PRESUP" fieldSource="Total_ef">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="460" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="EFIC_PRESUP" PathID="pnlSLAsCAPCgrdSLAsCAPCEFIC_PRESUP" fieldSource="EFIC_PRESUP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="462" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_EFIC_PRESUP" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_EFIC_PRESUP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Sorter id="463" visible="True" name="Sorter_Orden" wizardSortingType="SimpleDir" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_Orden" wizardCaption="Servicio" column="orden">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Label id="464" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenHERR_EST_COST" fieldSource="CumplenHERR_EST_COST" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenHERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="465" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotHERR_EST_COST" fieldSource="TotHERR_EST_COST" PathID="pnlSLAsCAPCgrdSLAsCAPCTotHERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Sorter id="477" visible="True" name="Sorter_DEDUC_OMISION" wizardSortingType="SimpleDir" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_DEDUC_OMISION" wizardCaption="Deductivas por omisión" column="DEDUC_OMISION">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Image id="482" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_DEDUC_OMISION" PathID="pnlSLAsCAPCgrdSLAsCAPCImg_DEDUC_OMISION">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="483" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="DEDUC_OMISION" PathID="pnlSLAsCAPCgrdSLAsCAPCDEDUC_OMISION" fieldSource="DEDUC_OMISION">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="488" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotDEDUC_OMISION" PathID="pnlSLAsCAPCgrdSLAsCAPCTotDEDUC_OMISION" fieldSource="TotDEDUC_OMISION">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="489" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenDEDUC_OMISION" PathID="pnlSLAsCAPCgrdSLAsCAPCCumplenDEDUC_OMISION" fieldSource="CumplenDEDUC_OMISION">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Sorter id="461" visible="True" name="Sorter_EFIC_PRES" column="EFIC_PRESUP" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_EFIC_PRES">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="419" visible="True" name="Sorter_TotTiempoSolucion" column="TotTiempoSolucion" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_TotTiempoSolucion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="418" visible="True" name="Sorter_TotTiempoAsignacion" column="TotTiempoAsignacion" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_TotTiempoAsignacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="417" visible="True" name="Sorter_TotDEF_FUG_AMB_PROD" column="TotDEF_FUG_AMB_PROD" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_TotDEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="416" visible="True" name="Sorter_TotCAL_COD" column="TotCAL_COD" PathID="pnlSLAsCAPCgrdSLAsCAPCSorter_TotCAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
					</Components>
					<Events>
						<Event name="BeforeShowRow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="466"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="467"/>
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
						<SQLParameter id="594" dataType="Integer" defaultValue="date('m')-2" designDefaultValue="8" old_temp_id="346" parameterSource="s_MesReporte" parameterType="URL" variable="sMes"/>
						<SQLParameter id="595" dataType="Integer" defaultValue="date('Y')" designDefaultValue="2015" old_temp_id="347" parameterSource="s_AnioReporte" parameterType="URL" variable="sAnio"/>
						<SQLParameter id="596" dataType="Integer" defaultValue="0" designDefaultValue="1" old_temp_id="348" parameterSource="s_id_proveedor" parameterType="URL" variable="sProveedor"/>
						<SQLParameter id="597" dataType="Integer" defaultValue="0" designDefaultValue="0" old_temp_id="349" parameterSource="sSLO" parameterType="URL" variable="sSLO"/>
					</SQLParameters>
					<SecurityGroups/>
					<Attributes/>
					<Features/>
				</Grid>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Grid id="498" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="grdTableroSLAsMG" connection="cnDisenio" dataSource="select sc.IdOld, sc.orden,	sc.descripcion, mc.*
 from mc_c_ServContractual sc left join (
select  
	 COUNT(HERR_EST_COST) TotHERR_EST_COST, SUM(cast(HERR_EST_COST as int)) CumplenHERR_EST_COST, SUM(cast(HERR_EST_COST as float))/COUNT(HERR_EST_COST)*100 HERR_EST_COST,
	 (Select Meta from mc_c_metrica where acronimo='HERR_EST_COST') as Meta_HERR_EST_COST,
	 COUNT(REQ_SERV) TotREQ_SERV, SUM(cast(REQ_SERV as int)) CumplenREQ_SERV, SUM(cast(REQ_SERV as float))/COUNT(REQ_SERV)*100 REQ_SERV,
	 (Select Meta from mc_c_metrica where acronimo='REQ_SERV') as Meta_REQ_SERV,
	 COUNT(CUMPL_REQ_FUNC) TotCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as int)) CumplenCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as float))/COUNT(CUMPL_REQ_FUNC)*100 CUMPL_REQ_FUNC,
	 (Select Meta from mc_c_metrica where acronimo='CUMPL_REQ_FUNC') as Meta_CUMPL_REQ_FUNC,
	 COUNT(CALIDAD_PROD_TERM) TotCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as int)) CumplenCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as float))/COUNT(CALIDAD_PROD_TERM)*100 CALIDAD_PROD_TERM,
	 (Select Meta from mc_c_metrica where acronimo='CALIDAD_PROD_TERM') as Meta_CALIDAD_PROD_TERM,
	 COUNT(RETR_ENTREGABLE) TotRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as int)) CumplenRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as float))/COUNT(RETR_ENTREGABLE)*100 RETR_ENTREGABLE,
	 (Select Meta from mc_c_metrica where acronimo='RETR_ENTREGABLE') as Meta_RETR_ENTREGABLE,
	 COUNT(COMPL_RUTA_CRITICA) TotCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as int)) CumplenCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as float))/COUNT(COMPL_RUTA_CRITICA)*100 COMPL_RUTA_CRITICA,
	 (Select Meta from mc_c_metrica where acronimo='COMPL_RUTA_CRITICA') as Meta_COMPL_RUTA_CRITICA,	 
	 COUNT(CAL_COD) TotCAL_COD, SUM(cast(CAL_COD as int)) CumplenCAL_COD, SUM(cast(CAL_COD as float))/COUNT(CAL_COD)*100 CAL_COD,
	 (Select Meta from mc_c_metrica where acronimo='EST_PROY') as Meta_EST_PROY,
	 COUNT(DEF_FUG_AMB_PROD) TotDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as int)) CumplenDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as float))/COUNT(DEF_FUG_AMB_PROD)*100  DEF_FUG_AMB_PROD,
	 (Select Meta from mc_c_metrica where acronimo='DEF_FUG_AMB_PROD') as Meta_DEF_FUG_AMB_PROD,
	 COUNT(Cumple_Inc_TiempoAsignacion) TotTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as int)) CumplenTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as float))/COUNT(Cumple_Inc_TiempoAsignacion)*100 Inc_TiempoAsignacion,
	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoSolucion') as Meta_Inc_TiempoSolucion,
	 COUNT(Cumple_Inc_TiempoSolucion) TotTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as int)) CumplenTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as float))/COUNT(Cumple_Inc_TiempoSolucion)*100 Inc_TiempoSolucion,
	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoAsignacion') as Meta_Inc_TiempoAsignacion,
	 COUNT(Cumple_DISP_SOPORTE) TotCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as int)) CumplenCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as float))/COUNT(Cumple_DISP_SOPORTE)*100 DISP_SOPORTE,
	(Select Meta from mc_c_metrica where acronimo='DISP_SOPORTE') as Meta_DISP_SOPORTE,
	AVG(Cumple_EF) Cumple_EF, AVG(total_ef) Total_ef, avg(cast(Cumple_EF as float))/avg(total_ef)*100  EFIC_PRESUP,
	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as Meta_EFIC_PRESUP,
	 sc.Id   id_servicio_cont 
from mc_c_ServContractual sc 
left join mc_calificacion_rs_SAT m on sc.Id = m.id_servicio_cont  
and m.IdUniverso in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
and m.IdUniverso not in (select id from mc_universo_cds where revision=2  )
	 left join	(select Cumple_DISP_SOPORTE, Cumple_Inc_TiempoAsignacion, Cumple_Inc_TiempoSolucion, MesReporte , AnioReporte ,  
				id_proveedor, 5 IdServicioCont 
				from mc_calificacion_incidentes_SAT
				where (id_proveedor = {sProveedor} or 0={sProveedor})  and MesReporte={sMes} and AnioReporte ={sAnio} 
				and Id_incidente in (select numero from mc_universo_cds where SLO={sSLO} and tipo = 'IN') 
				)  mi on  mi.IdServicioCont= sc.Id 
left join  (select SUM(CumpleSLA) Cumple_EF, COUNT(CumpleSLA) Total_EF, Id_Proveedor, MesReporte , anioreporte , 2 IdServicioCont  
			from mc_eficiencia_presupuestal  where CumpleSLA in (1,0)  
			and (([GrupoAplicativos] not like 'Todos%' and (4&lt;&gt;4 or (MesReporte&gt;2 and anioreporte &gt;2013)) ) 
					or (4=4 and MesReporte&lt;=2 and anioreporte &lt;2014 ) or 0=4)
			group by Id_Proveedor, MesReporte , anioreporte  ) ef 
			on ef.Id_Proveedor  = m.id_proveedor  and m.MesReporte  = ef.MesReporte and m.AnioReporte  = ef.anioreporte  
				and ef.IdServicioCont= sc.Id 
where (m.mesreporte = {sMes} or mi.MesReporte = {sMes}) 
			and (m.anioreporte = {sAnio}  or mi.AnioReporte = {sAnio}) 
			and (m.id_proveedor = {sProveedor} or mi.id_proveedor = {sProveedor} or  {sProveedor}=0)
group by sc.id
) as mc on sc.id = mc.id_servicio_cont 
where sc.Aplica ='CDS'
order by sc.orden" pageSizeLimit="100" pageSize="True" wizardCaption="Niveles de Servicio" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="grdTableroSLAsMG">
			<Components>
				<Navigator id="523" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="522" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="EFIC_PRESUP_MG" fieldSource="EFIC_PRESUP" PathID="grdTableroSLAsMGEFIC_PRESUP_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="578" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotEFIC_PRESUP_MG" PathID="grdTableroSLAsMGTotEFIC_PRESUP_MG" fieldSource="Total_ef">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="560" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_EFIC_PRESUP_MG" PathID="grdTableroSLAsMGImg_EFIC_PRESUP_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="521" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Inc_TiempoSolucion_MG" fieldSource="Inc_TiempoSolucion" PathID="grdTableroSLAsMGInc_TiempoSolucion_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="576" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotInc_TiempoSolucion_MG" PathID="grdTableroSLAsMGTotInc_TiempoSolucion_MG" fieldSource="TotTiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="575" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenInc_TiempoSolucion_MG" PathID="grdTableroSLAsMGCumplenInc_TiempoSolucion_MG" fieldSource="CumplenTiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="559" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_Inc_TiempoSolucion_MG" PathID="grdTableroSLAsMGImg_Inc_TiempoSolucion_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="520" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Inc_TiempoAsignacion_MG" fieldSource="Inc_TiempoAsignacion" PathID="grdTableroSLAsMGInc_TiempoAsignacion_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="574" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotInc_TiempoAsignacion_MG" PathID="grdTableroSLAsMGTotInc_TiempoAsignacion_MG" fieldSource="TotTiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="573" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenInc_TiempoAsignacion_MG" PathID="grdTableroSLAsMGCumplenInc_TiempoAsignacion_MG" fieldSource="CumplenTiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="558" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_Inc_TiempoAsignacion_MG" PathID="grdTableroSLAsMGImg_Inc_TiempoAsignacion_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="519" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="DEF_FUG_AMB_PROD_MG" fieldSource="DEF_FUG_AMB_PROD" PathID="grdTableroSLAsMGDEF_FUG_AMB_PROD_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="572" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotDEF_FUG_AMB_PROD_MG" PathID="grdTableroSLAsMGTotDEF_FUG_AMB_PROD_MG" fieldSource="TotDEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="571" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenDEF_FUG_AMB_PROD_MG" PathID="grdTableroSLAsMGCumplenDEF_FUG_AMB_PROD_MG" fieldSource="CumplenDEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="557" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_DEF_FUG_AMB_PROD_MG" PathID="grdTableroSLAsMGImg_DEF_FUG_AMB_PROD_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="518" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="RETR_ENTREGABLE_MG" fieldSource="RETR_ENTREGABLE" PathID="grdTableroSLAsMGRETR_ENTREGABLE_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="570" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotRETR_ENTREGABLE_MG" PathID="grdTableroSLAsMGTotRETR_ENTREGABLE_MG" fieldSource="TotRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="569" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenRETR_ENTREGABLE_MG" PathID="grdTableroSLAsMGCumplenRETR_ENTREGABLE_MG" fieldSource="CumplenRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="556" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_RETR_ENTREGABLE_MG" PathID="grdTableroSLAsMGImg_RETR_ENTREGABLE_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="517" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CALIDAD_PROD_TERM_MG" fieldSource="CALIDAD_PROD_TERM" PathID="grdTableroSLAsMGCALIDAD_PROD_TERM_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="568" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCALIDAD_PROD_TERM_MG" PathID="grdTableroSLAsMGTotCALIDAD_PROD_TERM_MG" fieldSource="TotCALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="567" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCALIDAD_PROD_TERM_MG" PathID="grdTableroSLAsMGCumplenCALIDAD_PROD_TERM_MG" fieldSource="CumplenCALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="555" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CALIDAD_PROD_TERM_MG" PathID="grdTableroSLAsMGImg_CALIDAD_PROD_TERM_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="516" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CUMPL_REQ_FUNC_MG" fieldSource="CUMPL_REQ_FUNC" PathID="grdTableroSLAsMGCUMPL_REQ_FUNC_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="566" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCUMPL_REQ_FUNC_MG" PathID="grdTableroSLAsMGTotCUMPL_REQ_FUNC_MG" fieldSource="TotCUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="565" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCUMPL_REQ_FUNC_MG" PathID="grdTableroSLAsMGCumplenCUMPL_REQ_FUNC_MG" fieldSource="CumplenCUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="554" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CUMPL_REQ_FUNC_MG" PathID="grdTableroSLAsMGImg_CUMPL_REQ_FUNC_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="515" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="REQ_SERV_MG" fieldSource="REQ_SERV" PathID="grdTableroSLAsMGREQ_SERV_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="564" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotREQ_SERV_MG" PathID="grdTableroSLAsMGTotREQ_SERV_MG" fieldSource="TotREQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="563" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenREQ_SERV_MG" PathID="grdTableroSLAsMGCumplenREQ_SERV_MG" fieldSource="CumplenREQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="581" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_REQ_SERV_MG" PathID="grdTableroSLAsMGImg_REQ_SERV_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="514" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="HERR_EST_COST_MG" fieldSource="HERR_EST_COST" PathID="grdTableroSLAsMGHERR_EST_COST_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="562" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotHERR_EST_COST_MG" PathID="grdTableroSLAsMGTotHERR_EST_COST_MG" fieldSource="TotHERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="561" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenHERR_EST_COST_MG" PathID="grdTableroSLAsMGCumplenHERR_EST_COST_MG" fieldSource="CumplenHERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="552" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_HERR_EST_COST_MG" PathID="grdTableroSLAsMGImg_HERR_EST_COST_MG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="513" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripcion" fieldSource="descripcion" PathID="grdTableroSLAsMGdescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="512" visible="True" name="Sorter_EFIC_PRESUP" column="EFIC_PRESUP" PathID="grdTableroSLAsMGSorter_EFIC_PRESUP">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="511" visible="True" name="Sorter_Inc_TiempoSolucion" column="Inc_TiempoSolucion" PathID="grdTableroSLAsMGSorter_Inc_TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="510" visible="True" name="Sorter_Inc_TiempoAsignacion" column="Inc_TiempoAsignacion" PathID="grdTableroSLAsMGSorter_Inc_TiempoAsignacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="509" visible="True" name="Sorter_DEF_FUG_AMB_PROD" column="DEF_FUG_AMB_PROD" PathID="grdTableroSLAsMGSorter_DEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="508" visible="True" name="Sorter_RETR_ENTREGABLE" column="RETR_ENTREGABLE" PathID="grdTableroSLAsMGSorter_RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="507" visible="True" name="Sorter_CALIDAD_PROD_TERM" column="CALIDAD_PROD_TERM" PathID="grdTableroSLAsMGSorter_CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="506" visible="True" name="Sorter_CUMPL_REQ_FUNC" column="CUMPL_REQ_FUNC" PathID="grdTableroSLAsMGSorter_CUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="505" visible="True" name="Sorter_REQ_SERV" column="REQ_SERV" PathID="grdTableroSLAsMGSorter_REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="504" visible="True" name="Sorter_HERR_EST_COST" column="HERR_EST_COST" PathID="grdTableroSLAsMGSorter_HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="503" visible="True" name="Sorter_descripcion" column="descripcion" PathID="grdTableroSLAsMGSorter_descripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="577" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenEFIC_PRESUP_MG" PathID="grdTableroSLAsMGCumplenEFIC_PRESUP_MG" fieldSource="Cumple_EF">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="598" visible="True" name="Sorter_TotCAL_COD" column="TotCAL_COD" wizardCaption="Tot EST PROY" wizardSortingType="SimpleDir" wizardControl="TotEST_PROY" wizardAddNbsp="False" PathID="grdTableroSLAsMGSorter_TotCAL_COD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
<Image id="599" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CAL_COD_MG" PathID="grdTableroSLAsMGImg_CAL_COD_MG">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Image>
<Label id="601" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCAL_COD_MG" PathID="grdTableroSLAsMGCumplenCAL_COD_MG" fieldSource="CumplenCAL_COD">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="603" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CAL_COD_MG" PathID="grdTableroSLAsMGCAL_COD_MG" fieldSource="CAL_COD">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="600" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCAL_COD_MG" PathID="grdTableroSLAsMGTotCAL_COD_MG" fieldSource="TotCAL_COD">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="579"/>
					</Actions>
				</Event>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="580"/>
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
				<SQLParameter id="604" dataType="Integer" defaultValue="0" designDefaultValue="0" parameterSource="sSLO" parameterType="URL" variable="sSLO"/>
<SQLParameter id="605" dataType="Integer" defaultValue="0" designDefaultValue="2" parameterSource="s_id_proveedor" parameterType="URL" variable="sProveedor"/>
<SQLParameter id="606" dataType="Integer" defaultValue="date('m')-2" designDefaultValue="7" parameterSource="s_MesReporte" parameterType="URL" variable="sMes"/>
<SQLParameter id="607" dataType="Integer" defaultValue="date('Y')" designDefaultValue="2015" parameterSource="s_AnioReporte" parameterType="URL" variable="sAnio"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Panel id="350" visible="True" generateDiv="False" name="pnlTableroSLAs" wizardInnerHTML="
      &lt;!-- BEGIN Grid grdTableroSLAs --&gt;
      &lt;table id=&quot;grdTableroSLAs&quot; class=&quot;MainTable&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;
        &lt;tr&gt;
          &lt;td valign=&quot;top&quot;&gt;
            &lt;table class=&quot;Header&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; border=&quot;0&quot;&gt;
              &lt;tr&gt;
                &lt;td class=&quot;HeaderLeft&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;Styles/{CCS_Style}/Images/Spacer.gif&quot;&gt;&lt;/td&gt; 
                &lt;td class=&quot;th&quot;&gt;&lt;strong&gt;Niveles de Servicio Reportados por el CAPC&lt;/strong&gt;&lt;/td&gt; 
                &lt;td class=&quot;HeaderRight&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;Styles/{CCS_Style}/Images/Spacer.gif&quot;&gt;&lt;/td&gt;
              &lt;/tr&gt;
            &lt;/table&gt;
 
            &lt;table class=&quot;Grid&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;
              &lt;tr class=&quot;Caption&quot;&gt;
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_Orden --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_Orden&quot;&gt;Servicio&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_Orden --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotHERR_EST_COST --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotHERR_EST_COST&quot;&gt;Uso de una&lt;br&gt;
                Herramienta&lt;br&gt;
                para Estimación&lt;br&gt;
                de Costo&lt;br&gt;
                y Tiempos&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotHERR_EST_COST --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotREQ_SERV --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotREQ_SERV&quot;&gt;Requisitos&lt;br&gt;
                de Servicio&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotREQ_SERV --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotCUMPL_REQ_FUNC --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotCUMPL_REQ_FUNC&quot;&gt;Cumplimiento en&lt;br&gt;
                Requisitos&lt;br&gt;
                Funcionales&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotCUMPL_REQ_FUNC --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotCALIDAD_PROD_TERM --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotCALIDAD_PROD_TERM&quot;&gt;Calidad de&lt;br&gt;
                Productos&lt;br&gt;
                Terminados&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotCALIDAD_PROD_TERM --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotRETR_ENTREGABLE --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotRETR_ENTREGABLE&quot;&gt;Retraso en&lt;br&gt;
                Entregables&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotRETR_ENTREGABLE --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotCAL_COD --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotCAL_COD&quot;&gt;Calidad&lt;br&gt;
                de Código&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotCAL_COD --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotDEF_FUG_AMB_PROD --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotDEF_FUG_AMB_PROD&quot;&gt;Defectos Fugados&lt;br&gt;
                al Ambiente&lt;br&gt;
                Productivo&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotDEF_FUG_AMB_PROD --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotTiempoAsignacion --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotTiempoAsignacion&quot;&gt;Manejo de&lt;br&gt;
                Incidentes -&lt;br&gt;
                Tiempo de&lt;br&gt;
                Atención&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotTiempoAsignacion --&gt;&lt;/th&gt;
 
                &lt;th style=&quot;WIDTH: 100px&quot; scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_TotTiempoSolucion --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_TotTiempoSolucion&quot;&gt;Manejo de&lt;br&gt;
                Incidentes -&lt;br&gt;
                Tiempo de&lt;br&gt;
                Solución&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_TotTiempoSolucion --&gt;&lt;/th&gt;
 
                &lt;th scope=&quot;col&quot;&gt;
                &lt;!-- BEGIN Sorter Sorter_EFIC_PRES --&gt;&lt;span class=&quot;Sorter&quot;&gt;&lt;a href=&quot;{Sort_URL}&quot; id=&quot;grdTableroSLAsSorter_EFIC_PRES&quot;&gt;Eficiencia&lt;br&gt;
                Presupuestal&lt;/a&gt; 
                &lt;!-- BEGIN Asc_On --&gt;&lt;img alt=&quot;Ascendente&quot; src=&quot;Styles/{CCS_Style}/Images/Asc.gif&quot;&gt;&lt;!-- END Asc_On --&gt;
                &lt;!-- BEGIN Desc_On --&gt;&lt;img alt=&quot;Descendente&quot; src=&quot;Styles/{CCS_Style}/Images/Desc.gif&quot;&gt;&lt;!-- END Desc_On --&gt;&lt;/span&gt;&lt;!-- END Sorter Sorter_EFIC_PRES --&gt;&lt;/th&gt;
              &lt;/tr&gt;
 
              &lt;!-- BEGIN Row --&gt;
              &lt;tr class=&quot;Row&quot;&gt;
                &lt;td&gt;{descripcion}&amp;nbsp;&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_HERR_EST_COST_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_HERR_EST_COST}&quot;&gt;&lt;br&gt;
                  {CumplenHERR_EST_COST}{TotHERR_EST_COST}{HERR_EST_COST}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_REQ_SERV_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_REQ_SERV}&quot;&gt;&lt;br&gt;
                  {CumplenREQ_SERV}{TotREQ_SERV}{REQ_SERV}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_CUMPL_REQ_FUNC_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_CUMPL_REQ_FUNC}&quot;&gt;&lt;br&gt;
                  {CumplenCUMPL_REQ_FUNC}{TotCUMPL_REQ_FUNC}{CUMPL_REQ_FUNC}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_CALIDAD_PROD_TERM_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_CALIDAD_PROD_TERM}&quot;&gt;&lt;br&gt;
                  {CumplenCALIDAD_PROD_TERM}{TotCALIDAD_PROD_TERM}{CALIDAD_PROD_TERM}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_RETR_ENTREGABLE_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_RETR_ENTREGABLE}&quot;&gt;&lt;br&gt;
                  {CumplenRETR_ENTREGABLE}{TotRETR_ENTREGABLE}{RETR_ENTREGABLE}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_CAL_COD_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_CAL_COD}&quot;&gt;&lt;br&gt;
                  {CumplenCAL_COD}{TotCAL_COD}{CAL_COD}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_DEF_FUG_AMB_PROD_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_DEF_FUG_AMB_PROD}&quot;&gt;&lt;br&gt;
                  {CumplenDEF_FUG_AMB_PROD}{TotDEF_FUG_AMB_PROD}{DEF_FUG_AMB_PROD}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_Inc_TiempoAsignacion_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_Inc_TiempoAsignacion}&quot;&gt;&lt;br&gt;
                  {CumplenInc_TiempoAsignacion}{TotInc_TiempoAsignacion}{Inc_TiempoAsignacion}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_Inc_TiempoSolucion_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_Inc_TiempoSolucion}&quot;&gt;&lt;br&gt;
                  {CumplenInc_TiempoSolucion}{TotInc_TiempoSolucion}{Inc_TiempoSolucion}&lt;/td&gt; 
                &lt;td style=&quot;TEXT-ALIGN: center&quot;&gt;&lt;img id=&quot;grdTableroSLAsImg_EFIC_PRESUP_{grdTableroSLAs:rowNumber}&quot; alt=&quot;&quot; src=&quot;{Img_EFIC_PRESUP}&quot;&gt;&lt;br&gt;
                  {CumplenEFIC_PRESUP}{TotEFIC_PRESUP}{EFIC_PRESUP}&lt;/td&gt;
              &lt;/tr&gt;
 &lt;!-- END Row --&gt;
              &lt;!-- BEGIN NoRecords --&gt;
              &lt;tr class=&quot;NoRecords&quot;&gt;
                &lt;td colspan=&quot;11&quot;&gt;No hay registros&lt;/td&gt;
              &lt;/tr&gt;
              &lt;!-- END NoRecords --&gt;
              &lt;tr class=&quot;Footer&quot;&gt;
                &lt;td colspan=&quot;11&quot;&gt;
                  &lt;!-- BEGIN Navigator Navigator --&gt;&lt;span class=&quot;Navigator&quot;&gt;Registro por página 
                  &lt;select style=&quot;VERTICAL-ALIGN: middle&quot; name=&quot;{FormName}PageSize&quot; data-grid-size=&quot;{FormName}&quot;&gt;
                    &lt;option selected value=&quot;&quot;&gt;-&lt;/option&gt;
 {PageSize_Options}
                  &lt;/select&gt;
 
                  &lt;!-- BEGIN First_On --&gt;&lt;a href=&quot;{First_URL}&quot;&gt;&lt;img alt=&quot;{First_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/First.gif&quot;&gt;&lt;/a&gt; &lt;!-- END First_On --&gt;
                  &lt;!-- BEGIN First_Off --&gt;&lt;img alt=&quot;{First_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/FirstOff.gif&quot;&gt;&lt;!-- END First_Off --&gt;
                  &lt;!-- BEGIN Prev_On --&gt;&lt;a href=&quot;{Prev_URL}&quot;&gt;&lt;img alt=&quot;{Prev_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/Prev.gif&quot;&gt;&lt;/a&gt; &lt;!-- END Prev_On --&gt;
                  &lt;!-- BEGIN Prev_Off --&gt;&lt;img alt=&quot;{Prev_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/PrevOff.gif&quot;&gt;&lt;!-- END Prev_Off --&gt;&amp;nbsp;{Page_Number} de&amp;nbsp;{Total_Pages}&amp;nbsp; 
                  &lt;!-- BEGIN Next_On --&gt;&lt;a href=&quot;{Next_URL}&quot;&gt;&lt;img alt=&quot;{Next_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/Next.gif&quot;&gt;&lt;/a&gt; &lt;!-- END Next_On --&gt;
                  &lt;!-- BEGIN Next_Off --&gt;&lt;img alt=&quot;{Next_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/NextOff.gif&quot;&gt;&lt;!-- END Next_Off --&gt;
                  &lt;!-- BEGIN Last_On --&gt;&lt;a href=&quot;{Last_URL}&quot;&gt;&lt;img alt=&quot;{Last_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/Last.gif&quot;&gt;&lt;/a&gt; &lt;!-- END Last_On --&gt;
                  &lt;!-- BEGIN Last_Off --&gt;&lt;img alt=&quot;{Last_URL}&quot; src=&quot;Styles/{CCS_Style}/Images/LastOff.gif&quot;&gt;&lt;!-- END Last_Off --&gt;&lt;/span&gt;&lt;!-- END Navigator Navigator --&gt;&amp;nbsp;&lt;/td&gt;
              &lt;/tr&gt;
            &lt;/table&gt;
          &lt;/td&gt;
        &lt;/tr&gt;
      &lt;/table&gt;
      &lt;!-- END Grid grdTableroSLAs --&gt;" PathID="pnlTableroSLAs">
			<Components>
				<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="grdTableroSLAs" connection="cnDisenio" dataSource="select sc.IdOld, sc.orden,	sc.descripcion, mc.*
 from mc_c_ServContractual sc left join (
select  
	 COUNT(HERR_EST_COST) TotHERR_EST_COST, SUM(cast(HERR_EST_COST as int)) CumplenHERR_EST_COST, SUM(cast(HERR_EST_COST as float))/COUNT(HERR_EST_COST)*100 HERR_EST_COST,
	 (Select Meta from mc_c_metrica where acronimo='HERR_EST_COST') as Meta_HERR_EST_COST,
	 COUNT(REQ_SERV) TotREQ_SERV, SUM(cast(REQ_SERV as int)) CumplenREQ_SERV, SUM(cast(REQ_SERV as float))/COUNT(REQ_SERV)*100 REQ_SERV,
	 (Select Meta from mc_c_metrica where acronimo='REQ_SERV') as Meta_REQ_SERV,
	 COUNT(CUMPL_REQ_FUNC) TotCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as int)) CumplenCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as float))/COUNT(CUMPL_REQ_FUNC)*100 CUMPL_REQ_FUNC,
	 (Select Meta from mc_c_metrica where acronimo='CUMPL_REQ_FUNC') as Meta_CUMPL_REQ_FUNC,
	 COUNT(CALIDAD_PROD_TERM) TotCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as int)) CumplenCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as float))/COUNT(CALIDAD_PROD_TERM)*100 CALIDAD_PROD_TERM,
	 (Select Meta from mc_c_metrica where acronimo='CALIDAD_PROD_TERM') as Meta_CALIDAD_PROD_TERM,
	 COUNT(RETR_ENTREGABLE) TotRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as int)) CumplenRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as float))/COUNT(RETR_ENTREGABLE)*100 RETR_ENTREGABLE,
	 (Select Meta from mc_c_metrica where acronimo='RETR_ENTREGABLE') as Meta_RETR_ENTREGABLE,
	 COUNT(COMPL_RUTA_CRITICA) TotCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as int)) CumplenCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as float))/COUNT(COMPL_RUTA_CRITICA)*100 COMPL_RUTA_CRITICA,
	 (Select Meta from mc_c_metrica where acronimo='COMPL_RUTA_CRITICA') as Meta_COMPL_RUTA_CRITICA,
	 COUNT(CAL_COD) TotCAL_COD, SUM(cast(CAL_COD as int)) CumplenCAL_COD, SUM(cast(CAL_COD as float))/COUNT(CAL_COD)*100 CAL_COD,
	 (Select Meta from mc_c_metrica where acronimo='EST_PROY') as Meta_EST_PROY,
	 COUNT(DEF_FUG_AMB_PROD) TotDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as int)) CumplenDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as float))/COUNT(DEF_FUG_AMB_PROD)*100  DEF_FUG_AMB_PROD,
	 (Select Meta from mc_c_metrica where acronimo='DEF_FUG_AMB_PROD') as Meta_DEF_FUG_AMB_PROD,
	 COUNT(Cumple_Inc_TiempoAsignacion) TotTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as int)) CumplenTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as float))/COUNT(Cumple_Inc_TiempoAsignacion)*100 Inc_TiempoAsignacion,
	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoSolucion') as Meta_Inc_TiempoSolucion,
	 COUNT(Cumple_Inc_TiempoSolucion) TotTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as int)) CumplenTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as float))/COUNT(Cumple_Inc_TiempoSolucion)*100 Inc_TiempoSolucion,
	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoAsignacion') as Meta_Inc_TiempoAsignacion,
	 COUNT(Cumple_DISP_SOPORTE) TotCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as int)) CumplenCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as float))/COUNT(Cumple_DISP_SOPORTE)*100 DISP_SOPORTE,
	(Select Meta from mc_c_metrica where acronimo='DISP_SOPORTE') as Meta_DISP_SOPORTE,
	AVG(Cumple_EF) Cumple_EF, AVG(total_ef) Total_ef, avg(cast(Cumple_EF as float))/avg(total_ef)*100  EFIC_PRESUP,
	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as Meta_EFIC_PRESUP,
	 sc.Id   id_servicio_cont 
from mc_c_ServContractual sc 
left join mc_calificacion_rs_MC m on sc.Id = m.id_servicio_cont  
and m.IdUniverso in (select id from mc_universo_cds where SLO={sSLO} and tipo &lt;&gt; 'IN')
and m.IdUniverso not in (select id from mc_universo_cds where revision=2  )
	 left join	(select Cumple_DISP_SOPORTE, Cumple_Inc_TiempoAsignacion, Cumple_Inc_TiempoSolucion, MesReporte , AnioReporte ,  
				id_proveedor, 5 IdServicioCont 
				from mc_calificacion_incidentes_MC
				where (id_proveedor = {sProveedor} or 0={sProveedor})  and MesReporte={sMes} and AnioReporte ={sAnio} 
				and Id_incidente in (select numero from mc_universo_cds where SLO={sSLO} and tipo = 'IN') 
				)  mi on  mi.IdServicioCont= sc.Id 
left join  (select SUM(CumpleSLA) Cumple_EF, COUNT(CumpleSLA) Total_EF, Id_Proveedor, MesReporte , anioreporte , 2 IdServicioCont  
			from mc_eficiencia_presupuestal  where CumpleSLA in (1,0)  
			and (([GrupoAplicativos] not like 'Todos%' and (4&lt;&gt;4 or (MesReporte&gt;2 and anioreporte &gt;2013)) ) 
					or (4=4 and MesReporte&lt;=2 and anioreporte &lt;2014 ) or 0=4)
			group by Id_Proveedor, MesReporte , anioreporte  ) ef 
			on ef.Id_Proveedor  = m.id_proveedor  and m.MesReporte  = ef.MesReporte and m.AnioReporte  = ef.anioreporte  
				and ef.IdServicioCont= sc.Id 
where (m.mesreporte = {sMes} or mi.MesReporte = {sMes}) 
			and (m.anioreporte = {sAnio}  or mi.AnioReporte = {sAnio}) 
			and (m.id_proveedor = {sProveedor} or mi.id_proveedor = {sProveedor} or  {sProveedor}=0)
group by sc.id
) as mc on sc.id = mc.id_servicio_cont 
where sc.Aplica ='CDS'
order by sc.orden" pageSizeLimit="100" pageSize="True" wizardCaption="Niveles de Servicio" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="pnlTableroSLAsgrdTableroSLAs" wizardAllowSorting="True">
					<Components>
						<Sorter id="12" visible="True" name="Sorter_TotCUMPL_REQ_FUNC" column="TotCUMPL_REQ_FUNC" wizardCaption="Tot CUMPL REQ FUNC" wizardSortingType="SimpleDir" wizardControl="TotCUMPL_REQ_FUNC" wizardAddNbsp="False" PathID="pnlTableroSLAsgrdTableroSLAsSorter_TotCUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="14" visible="True" name="Sorter_TotCALIDAD_PROD_TERM" column="TotCALIDAD_PROD_TERM" wizardCaption="Tot CALIDAD PROD TERM" wizardSortingType="SimpleDir" wizardControl="TotCALIDAD_PROD_TERM" wizardAddNbsp="False" PathID="pnlTableroSLAsgrdTableroSLAsSorter_TotCALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="16" visible="True" name="Sorter_TotRETR_ENTREGABLE" column="TotRETR_ENTREGABLE" wizardCaption="Tot RETR ENTREGABLE" wizardSortingType="SimpleDir" wizardControl="TotRETR_ENTREGABLE" wizardAddNbsp="False" PathID="pnlTableroSLAsgrdTableroSLAsSorter_TotRETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="20" visible="True" name="Sorter_TotCAL_COD" column="TotCAL_COD" wizardCaption="Tot EST PROY" wizardSortingType="SimpleDir" wizardControl="TotEST_PROY" wizardAddNbsp="False" PathID="pnlTableroSLAsgrdTableroSLAsSorter_TotCAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="22" visible="True" name="Sorter_TotDEF_FUG_AMB_PROD" column="TotDEF_FUG_AMB_PROD" wizardCaption="Tot DEF FUG AMB PROD" wizardSortingType="SimpleDir" wizardControl="TotDEF_FUG_AMB_PROD" wizardAddNbsp="False" PathID="pnlTableroSLAsgrdTableroSLAsSorter_TotDEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="24" visible="True" name="Sorter_TotTiempoAsignacion" column="TotTiempoAsignacion" wizardCaption="Tot Tiempo Asignacion" wizardSortingType="SimpleDir" wizardControl="TotTiempoAsignacion" wizardAddNbsp="False" PathID="pnlTableroSLAsgrdTableroSLAsSorter_TotTiempoAsignacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="26" visible="True" name="Sorter_TotTiempoSolucion" column="TotTiempoSolucion" wizardCaption="Tot Tiempo Solucion" wizardSortingType="SimpleDir" wizardControl="TotTiempoSolucion" wizardAddNbsp="False" PathID="pnlTableroSLAsgrdTableroSLAsSorter_TotTiempoSolucion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripcion" fieldSource="descripcion" wizardCaption="Descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsdescripcion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="33" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotREQ_SERV" fieldSource="TotREQ_SERV" wizardCaption="Tot REQ SERV" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsTotREQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="35" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCUMPL_REQ_FUNC" fieldSource="TotCUMPL_REQ_FUNC" wizardCaption="Tot CUMPL REQ FUNC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsTotCUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="37" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCALIDAD_PROD_TERM" fieldSource="TotCALIDAD_PROD_TERM" wizardCaption="Tot CALIDAD PROD TERM" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsTotCALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="39" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotRETR_ENTREGABLE" fieldSource="TotRETR_ENTREGABLE" wizardCaption="Tot RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsTotRETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="43" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotCAL_COD" fieldSource="TotCAL_COD" wizardCaption="Tot EST PROY" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsTotCAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="45" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotDEF_FUG_AMB_PROD" fieldSource="TotDEF_FUG_AMB_PROD" wizardCaption="Tot DEF FUG AMB PROD" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsTotDEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="47" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotInc_TiempoAsignacion" fieldSource="TotTiempoAsignacion" wizardCaption="Tot Tiempo Asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsTotInc_TiempoAsignacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="49" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotInc_TiempoSolucion" fieldSource="TotTiempoSolucion" wizardCaption="Tot Tiempo Solucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsTotInc_TiempoSolucion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Navigator id="53" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Navigator>
						<Sorter id="10" visible="True" name="Sorter_TotREQ_SERV" column="TotREQ_SERV" PathID="pnlTableroSLAsgrdTableroSLAsSorter_TotREQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="8" visible="True" name="Sorter_TotHERR_EST_COST" column="TotHERR_EST_COST" PathID="pnlTableroSLAsgrdTableroSLAsSorter_TotHERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Label id="34" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenREQ_SERV" fieldSource="CumplenREQ_SERV" wizardCaption="Cumplen REQ SERV" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsCumplenREQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="36" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCUMPL_REQ_FUNC" fieldSource="CumplenCUMPL_REQ_FUNC" wizardCaption="Cumplen CUMPL REQ FUNC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsCumplenCUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="38" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCALIDAD_PROD_TERM" fieldSource="CumplenCALIDAD_PROD_TERM" wizardCaption="Cumplen CALIDAD PROD TERM" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsCumplenCALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="40" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenRETR_ENTREGABLE" fieldSource="CumplenRETR_ENTREGABLE" wizardCaption="Cumplen RETR ENTREGABLE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsCumplenRETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="44" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenCAL_COD" fieldSource="CumplenCAL_COD" wizardCaption="Cumplen EST PROY" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsCumplenCAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="46" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenDEF_FUG_AMB_PROD" fieldSource="CumplenDEF_FUG_AMB_PROD" wizardCaption="Cumplen DEF FUG AMB PROD" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsCumplenDEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="48" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenInc_TiempoAsignacion" fieldSource="CumplenTiempoAsignacion" wizardCaption="Cumplen Tiempo Asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsCumplenInc_TiempoAsignacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="50" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenInc_TiempoSolucion" fieldSource="CumplenTiempoSolucion" wizardCaption="Cumplen Tiempo Solucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="pnlTableroSLAsgrdTableroSLAsCumplenInc_TiempoSolucion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="67" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="HERR_EST_COST" PathID="pnlTableroSLAsgrdTableroSLAsHERR_EST_COST" fieldSource="HERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="68" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="REQ_SERV" PathID="pnlTableroSLAsgrdTableroSLAsREQ_SERV" fieldSource="REQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="69" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CUMPL_REQ_FUNC" PathID="pnlTableroSLAsgrdTableroSLAsCUMPL_REQ_FUNC" fieldSource="CUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="70" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CALIDAD_PROD_TERM" PathID="pnlTableroSLAsgrdTableroSLAsCALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="71" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="RETR_ENTREGABLE" PathID="pnlTableroSLAsgrdTableroSLAsRETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="73" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="CAL_COD" PathID="pnlTableroSLAsgrdTableroSLAsCAL_COD" fieldSource="CAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="74" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="DEF_FUG_AMB_PROD" PathID="pnlTableroSLAsgrdTableroSLAsDEF_FUG_AMB_PROD" fieldSource="DEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="75" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Inc_TiempoAsignacion" PathID="pnlTableroSLAsgrdTableroSLAsInc_TiempoAsignacion" fieldSource="Inc_TiempoAsignacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="76" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="Inc_TiempoSolucion" PathID="pnlTableroSLAsgrdTableroSLAsInc_TiempoSolucion" fieldSource="Inc_TiempoSolucion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Image id="78" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_HERR_EST_COST" PathID="pnlTableroSLAsgrdTableroSLAsImg_HERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_REQ_SERV" PathID="pnlTableroSLAsgrdTableroSLAsImg_REQ_SERV">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CUMPL_REQ_FUNC" PathID="pnlTableroSLAsgrdTableroSLAsImg_CUMPL_REQ_FUNC">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CALIDAD_PROD_TERM" PathID="pnlTableroSLAsgrdTableroSLAsImg_CALIDAD_PROD_TERM">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_RETR_ENTREGABLE" PathID="pnlTableroSLAsgrdTableroSLAsImg_RETR_ENTREGABLE">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_CAL_COD" PathID="pnlTableroSLAsgrdTableroSLAsImg_CAL_COD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_DEF_FUG_AMB_PROD" PathID="pnlTableroSLAsgrdTableroSLAsImg_DEF_FUG_AMB_PROD">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_Inc_TiempoAsignacion" PathID="pnlTableroSLAsgrdTableroSLAsImg_Inc_TiempoAsignacion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Image id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_Inc_TiempoSolucion" PathID="pnlTableroSLAsgrdTableroSLAsImg_Inc_TiempoSolucion">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Label id="104" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenEFIC_PRESUP" PathID="pnlTableroSLAsgrdTableroSLAsCumplenEFIC_PRESUP" fieldSource="Cumple_EF">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="108" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotEFIC_PRESUP" PathID="pnlTableroSLAsgrdTableroSLAsTotEFIC_PRESUP" fieldSource="Total_ef">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="112" fieldSourceType="DBColumn" dataType="Integer" html="True" generateSpan="False" name="EFIC_PRESUP" PathID="pnlTableroSLAsgrdTableroSLAsEFIC_PRESUP" fieldSource="EFIC_PRESUP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Sorter id="116" visible="True" name="Sorter_EFIC_PRES" wizardSortingType="SimpleDir" PathID="pnlTableroSLAsgrdTableroSLAsSorter_EFIC_PRES" wizardCaption="Eficiencia&lt;br&gt;Presupuestal" column="EFIC_PRESUP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Image id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Img_EFIC_PRESUP" PathID="pnlTableroSLAsgrdTableroSLAsImg_EFIC_PRESUP">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Sorter id="125" visible="True" name="Sorter_Orden" wizardSortingType="SimpleDir" PathID="pnlTableroSLAsgrdTableroSLAsSorter_Orden" wizardCaption="Servicio" column="orden">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Label id="32" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="CumplenHERR_EST_COST" fieldSource="CumplenHERR_EST_COST" PathID="pnlTableroSLAsgrdTableroSLAsCumplenHERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="31" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="TotHERR_EST_COST" fieldSource="TotHERR_EST_COST" PathID="pnlTableroSLAsgrdTableroSLAsTotHERR_EST_COST">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
					</Components>
					<Events>
						<Event name="BeforeShowRow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="89" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="208" eventType="Server"/>
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
						<SQLParameter id="608" dataType="Integer" defaultValue="date('m')-2" designDefaultValue="1" old_temp_id="346" parameterSource="s_MesReporte" parameterType="URL" variable="sMes"/>
<SQLParameter id="609" dataType="Integer" defaultValue="date('Y')" designDefaultValue="2014" old_temp_id="347" parameterSource="s_AnioReporte" parameterType="URL" variable="sAnio"/>
<SQLParameter id="610" dataType="Integer" defaultValue="0" designDefaultValue="3" old_temp_id="348" parameterSource="s_id_proveedor" parameterType="URL" variable="sProveedor"/>
<SQLParameter id="611" dataType="Integer" defaultValue="0" designDefaultValue="1" old_temp_id="349" parameterSource="sSLO" parameterType="URL" variable="sSLO"/>
</SQLParameters>
					<SecurityGroups/>
					<Attributes/>
					<Features/>
				</Grid>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="TableroSLAs.php" forShow="True" url="TableroSLAs.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="TableroSLAs_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="129" groupID="2"/>
		<Group id="130" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="204"/>
			</Actions>
		</Event>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="205"/>
			</Actions>
		</Event>
		<Event name="AfterInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="206"/>
			</Actions>
		</Event>
	</Events>
</Page>
