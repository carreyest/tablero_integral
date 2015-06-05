<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="4" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="99" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_reporte_ns1" searchIds="99" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_reporte_ns" wizardCaption="  Buscar Reporte" changedCaptionSearch="True" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="mc_reporte_ns1">
			<Components>
				<Button id="100" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="mc_reporte_ns1Button_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="101" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_MesReporte" fieldSource="mesreporte" wizardIsPassword="False" wizardCaption="Mesreporte" caption="Mesreporte" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_reporte_ns1s_MesReporte" sourceType="Table" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="114" tableName="mc_c_mes"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
				</ListBox>
				<ListBox id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_AnioReporte" fieldSource="anioreporte" wizardIsPassword="False" wizardCaption="Anioreporte" caption="Anioreporte" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_reporte_ns1s_AnioReporte" sourceType="Table" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters>
						<TableParameter id="111" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Ano" logicOperator="And" parameterSource="2013" parameterType="Expression" searchConditionType="GreaterThan"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="110" posHeight="88" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_anio"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="112" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="113" dataType="Integer" fieldName="Ano" tableName="mc_c_anio"/>
					</PKFields>
				</ListBox>
				<ListBox id="103" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardEmptyCaption="Seleccionar Valor" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre" PathID="mc_reporte_ns1s_id_proveedor">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="107" conditionType="Parameter" useIsNull="False" dataType="Text" field="descripcion" logicOperator="And" parameterSource="'CDS'" parameterType="Expression" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="106" posHeight="180" posLeft="10" posTop="10" posWidth="158" tableName="mc_c_proveedor"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="108" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="109" dataType="Integer" fieldName="id_proveedor" tableName="mc_c_proveedor"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
				<CheckBox id="104" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_SLO" fieldSource="SLO" wizardIsPassword="False" wizardCaption="SLO" caption="SLO" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_reporte_ns1s_SLO" defaultValue="Unchecked" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<CheckBox id="105" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DyP" fieldSource="DyP" wizardIsPassword="False" wizardCaption="Dy P" caption="Dy P" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_reporte_ns1DyP" defaultValue="Unchecked" checkedValue="1" uncheckedValue="0">
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
		<Panel id="120" visible="True" generateDiv="False" name="Panel1" wizardInnerHTML="
      &lt;!-- BEGIN Record mc_reporte_ns --&gt;
      &lt;form name=&quot;{HTMLFormName}&quot; id=&quot;mc_reporte_ns&quot; action=&quot;{Action}&quot; method=&quot;post&quot;&gt;
        &lt;table class=&quot;MainTable&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;
          &lt;tr&gt;
            &lt;td valign=&quot;top&quot;&gt;
              &lt;table class=&quot;Header&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;
                &lt;tr&gt;
                  &lt;td class=&quot;HeaderLeft&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;Styles/{CCS_Style}/Images/Spacer.gif&quot;&gt;&lt;/td&gt; 
                  &lt;td class=&quot;th&quot;&gt;&lt;strong&gt;Caratula del Informe&lt;/strong&gt;&lt;/td&gt; 
                  &lt;td class=&quot;HeaderRight&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;Styles/{CCS_Style}/Images/Spacer.gif&quot;&gt;&lt;/td&gt;
                &lt;/tr&gt;
              &lt;/table&gt;
 
              &lt;table class=&quot;Record&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;
                &lt;!-- BEGIN Error --&gt;
                &lt;tr class=&quot;Error&quot; id=&quot;mc_reporte_nsErrorBlock&quot;&gt;
                  &lt;td colspan=&quot;6&quot;&gt;{Error}&lt;/td&gt;
                &lt;/tr&gt;
                &lt;!-- END Error --&gt;
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&amp;nbsp;Mes de Reporte: &lt;/td&gt; 
                  &lt;td&gt;
                    &lt;select name=&quot;{s_MesReporte_Name}&quot; id=&quot;mc_reporte_nss_MesReporte&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;Seleccionar Valor&lt;/option&gt;
                      {s_MesReporte_Options}
                    &lt;/select&gt;
 &amp;nbsp; &lt;/td&gt; 
                  &lt;td&gt;Año:&amp;nbsp;&lt;/td&gt; 
                  &lt;td&gt;
                    &lt;select name=&quot;{s_AnioReporte_Name}&quot; id=&quot;mc_reporte_nss_AnioReporte&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;Seleccionar Valor&lt;/option&gt;
                      {s_AnioReporte_Options}
                    &lt;/select&gt;
 &amp;nbsp; &lt;/td&gt; 
                  &lt;td&gt;Proveedor:&amp;nbsp;&lt;/td&gt; 
                  &lt;td&gt;
                    &lt;select name=&quot;{s_id_proveedor_Name}&quot; id=&quot;mc_reporte_nss_id_proveedor&quot;&gt;
                      &lt;option selected value=&quot;&quot;&gt;Seleccionar Valor&lt;/option&gt;
                      {s_id_proveedor_Options}
                    &lt;/select&gt;
 &amp;nbsp; &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&lt;label for=&quot;mc_reporte_nsVersion&quot;&gt;Versión:&lt;/label&gt;&lt;/td&gt; 
                  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;{Version_Name}&quot; id=&quot;mc_reporte_nsVersion&quot; value=&quot;{Version}&quot;&gt;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;Responsable&lt;/td&gt; 
                  &lt;td&gt;
                    &lt;select name=&quot;{Responsable_Name}&quot; id=&quot;mc_reporte_nsResponsable&quot;&gt;
                      &lt;option value=&quot;&quot;&gt;Seleccionar Valor&lt;/option&gt;
                      {Responsable_Options}
                    &lt;/select&gt;
 &lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;Fecha:&lt;/td&gt; 
                  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;{Fecha_Name}&quot; id=&quot;mc_reporte_nsFecha&quot; value=&quot;{Fecha}&quot;&gt;&lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;Comentario:&lt;/td&gt; 
                  &lt;td colspan=&quot;5&quot;&gt;&lt;textarea name=&quot;{Comentario_Name}&quot; id=&quot;mc_reporte_nsComentario&quot; cols=&quot;75&quot;&gt;{Comentario}&lt;/textarea&gt;&lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&lt;label for=&quot;mc_reporte_nsResponsable&quot;&gt;Datos:&lt;/label&gt;&lt;/td&gt; 
                  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;{Datos_Name}&quot; id=&quot;mc_reporte_nsDatos&quot; value=&quot;{Datos}&quot;&gt;&lt;/td&gt; 
                  &lt;td&gt;Fuente:&lt;/td&gt; 
                  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;{Fuente_Name}&quot; id=&quot;mc_reporte_nsFuente&quot; value=&quot;{Fuente}&quot;&gt;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;&lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&amp;nbsp;Instrucciones:&lt;/td&gt; 
                  &lt;td colspan=&quot;5&quot;&gt;&lt;textarea name=&quot;{Instrucciones_Name}&quot; id=&quot;mc_reporte_nsInstrucciones&quot; rows=&quot;10&quot; cols=&quot;75&quot;&gt;{Instrucciones}&lt;/textarea&gt;&amp;nbsp;&amp;nbsp; &lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&amp;nbsp;Observaciones:&lt;/td&gt; 
                  &lt;td colspan=&quot;5&quot;&gt;&lt;textarea name=&quot;{Observaciones_Name}&quot; id=&quot;mc_reporte_nsObservaciones&quot; rows=&quot;10&quot; cols=&quot;75&quot;&gt;{Observaciones}&lt;/textarea&gt;&lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&amp;nbsp;&lt;input type=&quot;hidden&quot; name=&quot;{hdSLO_Name}&quot; id=&quot;mc_reporte_nshdSLO&quot; value=&quot;{hdSLO}&quot;&gt;&lt;/td&gt; 
                  &lt;td&gt;&lt;input type=&quot;hidden&quot; name=&quot;{hdDyP_Name}&quot; id=&quot;mc_reporte_nshdDyP&quot; value=&quot;{hdDyP}&quot;&gt;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;&lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Controls&quot;&gt;
                  &lt;td class=&quot;th&quot;&gt;&amp;nbsp;&lt;/td&gt; 
                  &lt;td&gt;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;&lt;/td&gt; 
                  &lt;td&gt;&amp;nbsp;&lt;/td&gt;
                &lt;/tr&gt;
 
                &lt;tr class=&quot;Bottom&quot;&gt;
                  &lt;td style=&quot;text-align: right;&quot; colspan=&quot;6&quot;&gt;
                    &lt;!-- BEGIN Button Button_Insert --&gt;&lt;input type=&quot;submit&quot; name=&quot;{Button_Name}&quot; class=&quot;Button&quot; id=&quot;mc_reporte_nsButton_Insert&quot; alt=&quot;Agregar&quot; value=&quot;Generar&quot;&gt;&lt;!-- END Button Button_Insert --&gt;
                    &lt;!-- BEGIN Button Button_Update --&gt;&lt;input type=&quot;submit&quot; name=&quot;{Button_Name}&quot; class=&quot;Button&quot; id=&quot;mc_reporte_nsButton_Update&quot; alt=&quot;Enviar&quot; value=&quot;Ver&quot;&gt;&lt;!-- END Button Button_Update --&gt;
                    &lt;!-- BEGIN Button Button_Delete --&gt;&lt;input type=&quot;submit&quot; name=&quot;{Button_Name}&quot; class=&quot;Button&quot; id=&quot;mc_reporte_nsButton_Delete&quot; alt=&quot;Borrar&quot; value=&quot;Borrar&quot;&gt;&lt;!-- END Button Button_Delete --&gt;&lt;/td&gt;
                &lt;/tr&gt;
              &lt;/table&gt;
            &lt;/td&gt;
          &lt;/tr&gt;
        &lt;/table&gt;
      &lt;/form&gt;
 &lt;!-- END Record mc_reporte_ns --&gt;" PathID="Panel1">
			<Components>
				<Record id="5" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_reporte_ns" actionPage="TableroExcel" errorSummator="Error" wizardFormMethod="post" PathID="Panel1mc_reporte_ns" dataSource="mc_reporte_ns" connection="cnDisenio" customInsertType="SQL" customInsert="INSERT INTO mc_reporte_ns(version, mesreporte, 
comentario, anioreporte, id_proveedor, usuario, 
fecha, datos, fuente, instrucciones, observaciones, SLO, DyP) 
VALUES({Version}, {s_MesReporte}, '{Comentario}', {s_AnioReporte}, '{s_id_proveedor}', '{Responsable}', '{Fecha}', '{Datos}', '{Fuente}', '{Instrucciones}', '{Observaciones}', {hdSLO}, {hdDyP})">
					<Components>
						<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Version" PathID="Panel1mc_reporte_nsVersion" fieldSource="version" defaultValue="1" required="True">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<Button id="8" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="Panel1mc_reporte_nsButton_Insert">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="9" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="Panel1mc_reporte_nsButton_Update">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="10" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="Panel1mc_reporte_nsButton_Delete">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<ListBox id="14" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_MesReporte" wizardEmptyCaption="Seleccionar Valor" PathID="Panel1mc_reporte_nss_MesReporte" fieldSource="mesreporte" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="CCGetParam(&quot;s_MesReporte&quot;)" required="True">
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
						<TextArea id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Comentario" PathID="Panel1mc_reporte_nsComentario" fieldSource="comentario">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextArea>
						<ListBox id="15" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_AnioReporte" wizardEmptyCaption="Seleccionar Valor" PathID="Panel1mc_reporte_nss_AnioReporte" fieldSource="anioreporte" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="CCGetParam(&quot;s_AnioReporte&quot;)" required="True">
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
						<ListBox id="16" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_id_proveedor" wizardEmptyCaption="Seleccionar Valor" PathID="Panel1mc_reporte_nss_id_proveedor" fieldSource="id_proveedor" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre" required="True" defaultValue="CCGetParam(&quot;s_id_proveedor&quot;)">
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
						<ListBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Responsable" PathID="Panel1mc_reporte_nsResponsable" fieldSource="usuario" required="True" defaultValue="CCGetUserLogin()" sourceType="Table" connection="cnDisenio" dataSource="mc_c_usuarios" boundColumn="Usuario" textColumn="Nombre">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
							<TableParameters/>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables>
								<JoinTable id="131" posHeight="180" posLeft="10" posTop="10" posWidth="118" schemaName="dbo" tableName="mc_c_usuarios" old_temp_id="117"/>
							</JoinTables>
							<JoinLinks/>
							<Fields>
								<Field id="132" fieldName="*" old_temp_id="118"/>
							</Fields>
							<PKFields>
								<PKField id="133" dataType="Integer" fieldName="Id" tableName="mc_c_usuarios" old_temp_id="119"/>
							</PKFields>
						</ListBox>
						<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="Fecha" PathID="Panel1mc_reporte_nsFecha" features="(assigned)" fieldSource="fecha" format="dd/mm/yyyy H:nn" defaultValue="date('d/m/Y H:i')" required="True" DBFormat="yyyy-mm-dd HH:nn:ss.S">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="135" show_weekend="True" name="InlineDatePicker1" category="jQuery" old_temp_id="19">
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
						<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Datos" PathID="Panel1mc_reporte_nsDatos" fieldSource="datos" required="True" defaultValue="&quot;Manual&quot;">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Fuente" PathID="Panel1mc_reporte_nsFuente" fieldSource="fuente" defaultValue="&quot;CDS&quot;">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextArea id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Instrucciones" PathID="Panel1mc_reporte_nsInstrucciones" fieldSource="instrucciones">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextArea>
						<TextArea id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Observaciones" PathID="Panel1mc_reporte_nsObservaciones" fieldSource="observaciones">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextArea>
						<Hidden id="30" fieldSourceType="DBColumn" dataType="Integer" name="hdSLO" PathID="Panel1mc_reporte_nshdSLO" fieldSource="SLO" defaultValue="CCGetParam(&quot;sSLO&quot;,0)">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="37" fieldSourceType="DBColumn" dataType="Integer" name="hdDyP" PathID="Panel1mc_reporte_nshdDyP" fieldSource="DyP" defaultValue="CCGetParam(&quot;DyP&quot;,0)">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
					</Components>
					<Events>
						<Event name="OnValidate" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="46"/>
							</Actions>
						</Event>
						<Event name="BeforeInsert" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="47"/>
							</Actions>
						</Event>
						<Event name="AfterExecuteInsert" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="115"/>
							</Actions>
						</Event>
						<Event name="AfterExecuteUpdate" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="116"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="146" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="0" field="mesreporte" logicOperator="And" parameterSource="s_MesReporte" parameterType="URL" searchConditionType="Equal" old_temp_id="92"/>
						<TableParameter id="147" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="0" field="anioreporte" logicOperator="And" parameterSource="s_AnioReporte" parameterType="URL" searchConditionType="Equal" old_temp_id="93"/>
						<TableParameter id="148" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="0" field="id_proveedor" logicOperator="And" parameterSource="s_id_proveedor" parameterType="URL" searchConditionType="Equal" old_temp_id="94"/>
						<TableParameter id="149" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="0" field="SLO" logicOperator="And" parameterSource="s_SLO" parameterType="URL" searchConditionType="Equal" old_temp_id="95"/>
						<TableParameter id="150" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="0" field="DyP" logicOperator="And" parameterSource="DyP" parameterType="URL" searchConditionType="Equal" old_temp_id="96"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="180" tableName="mc_reporte_ns"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="152" fieldName="*" old_temp_id="97"/>
					</Fields>
					<PKFields>
						<PKField id="153" dataType="Integer" fieldName="id" tableName="mc_reporte_ns" old_temp_id="98"/>
					</PKFields>
					<ISPParameters/>
					<ISQLParameters>
						<SQLParameter id="154" variable="Version" dataType="Integer" parameterType="Control" parameterSource="Version" old_temp_id="61"/>
						<SQLParameter id="155" variable="s_MesReporte" dataType="Integer" parameterType="Control" parameterSource="s_MesReporte" old_temp_id="62"/>
						<SQLParameter id="156" variable="Comentario" dataType="Text" parameterType="Control" parameterSource="Comentario" old_temp_id="63"/>
						<SQLParameter id="157" variable="s_AnioReporte" dataType="Integer" parameterType="Control" parameterSource="s_AnioReporte" old_temp_id="64"/>
						<SQLParameter id="158" variable="s_id_proveedor" dataType="Text" parameterType="Control" parameterSource="s_id_proveedor" old_temp_id="65"/>
						<SQLParameter id="159" variable="Responsable" dataType="Text" parameterType="Control" parameterSource="Responsable" old_temp_id="66"/>
						<SQLParameter id="160" variable="Fecha" dataType="Date" parameterType="Control" parameterSource="Fecha" format="dd/mm/yyyy H:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S" old_temp_id="67"/>
						<SQLParameter id="161" variable="Datos" dataType="Text" parameterType="Control" parameterSource="Datos" old_temp_id="68"/>
						<SQLParameter id="162" variable="Fuente" dataType="Text" parameterType="Control" parameterSource="Fuente" old_temp_id="69"/>
						<SQLParameter id="163" variable="Instrucciones" dataType="Text" parameterType="Control" parameterSource="Instrucciones" old_temp_id="70"/>
						<SQLParameter id="164" variable="Observaciones" dataType="Text" parameterType="Control" parameterSource="Observaciones" old_temp_id="71"/>
						<SQLParameter id="165" variable="hdSLO" dataType="Integer" parameterType="Control" parameterSource="hdSLO" old_temp_id="72"/>
						<SQLParameter id="166" variable="hdDyP" dataType="Integer" parameterType="Control" parameterSource="hdDyP" old_temp_id="73"/>
					</ISQLParameters>
					<IFormElements>
						<CustomParameter id="167" field="version" dataType="Integer" parameterType="Control" parameterSource="Version" old_temp_id="48"/>
						<CustomParameter id="168" field="mesreporte" dataType="Integer" parameterType="Control" parameterSource="s_MesReporte" old_temp_id="49"/>
						<CustomParameter id="169" field="comentario" dataType="Text" parameterType="Control" parameterSource="Comentario" old_temp_id="50"/>
						<CustomParameter id="170" field="anioreporte" dataType="Integer" parameterType="Control" parameterSource="s_AnioReporte" old_temp_id="51"/>
						<CustomParameter id="171" field="id_proveedor" dataType="Text" parameterType="Control" parameterSource="s_id_proveedor" old_temp_id="52"/>
						<CustomParameter id="172" field="usuario" dataType="Text" parameterType="Control" parameterSource="Responsable" old_temp_id="53"/>
						<CustomParameter id="173" field="fecha" dataType="Date" parameterType="Control" parameterSource="Fecha" format="dd/mm/yyyy H:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S" old_temp_id="54"/>
						<CustomParameter id="174" field="datos" dataType="Text" parameterType="Control" parameterSource="Datos" old_temp_id="55"/>
						<CustomParameter id="175" field="fuente" dataType="Text" parameterType="Control" parameterSource="Fuente" old_temp_id="56"/>
						<CustomParameter id="176" field="instrucciones" dataType="Text" parameterType="Control" parameterSource="Instrucciones" old_temp_id="57"/>
						<CustomParameter id="177" field="observaciones" dataType="Text" parameterType="Control" parameterSource="Observaciones" old_temp_id="58"/>
						<CustomParameter id="178" field="SLO" dataType="Integer" parameterType="Control" parameterSource="hdSLO" old_temp_id="59"/>
						<CustomParameter id="179" field="DyP" dataType="Integer" parameterType="Control" parameterSource="hdDyP" old_temp_id="60"/>
					</IFormElements>
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
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="TableroExcel_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="TableroExcel.php" forShow="True" url="TableroExcel.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="3" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="2"/>
			</Actions>
		</Event>
		<Event name="BeforeInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="74"/>
			</Actions>
		</Event>
	</Events>
</Page>
