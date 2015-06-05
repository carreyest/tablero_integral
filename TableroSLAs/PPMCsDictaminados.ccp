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
	, c_mes.Mes 
	, r.* 
from calificacion_rs_SAT r
	inner join c_proveedor p on p.id_proveedor = r.id_proveedor 
	inner join c_mes on c_mes.idmes = r.mesreporte
	left join c_servicio sn on sn.id_servicio = r.id_servicio_negocio 
	left join c_servicio sc on sc.id_servicio = r.id_servivio_cont
	left join c_generico  g on r.id_tipo  = g.id_generico  and id_catalogo =17
where (r.id_ppmc = {s_id_ppmc} or 0={s_id_ppmc})
and (r.id_proveedor = {s_id_proveedor} or 0={s_id_proveedor})
and ({s_MesReporte} = r.mesreporte or 0={s_MesReporte} )
and (anioreporte ={s_AnioReporte}  or {s_AnioReporte}=0)
and (r.id_tipo={lstTipoPPMC} or 0={lstTipoPPMC})
and (r.id_servicio_negocio={lstServNeg} or 0= {lstServNeg})" name="grdPPMCs" pageSizeLimit="100" wizardCaption=" Grid1 Lista de" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" PathID="grdPPMCs">
			<Components>
				<Sorter id="4" visible="True" name="Sorter_serv_negocio" column="serv_negocio" wizardCaption="Serv Negocio" wizardSortingType="SimpleDir" wizardControl="serv_negocio" wizardAddNbsp="False" PathID="grdPPMCsSorter_serv_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="5" visible="True" name="Sorter_serv_cont" column="serv_cont" wizardCaption="Serv Cont" wizardSortingType="SimpleDir" wizardControl="serv_cont" wizardAddNbsp="False" PathID="grdPPMCsSorter_serv_cont">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="6" visible="True" name="Sorter_Proveedor" column="Proveedor" wizardCaption="Proveedor" wizardSortingType="SimpleDir" wizardControl="Proveedor" wizardAddNbsp="False" PathID="grdPPMCsSorter_Proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_Tipo_PPMC" column="Tipo_PPMC" wizardCaption="Tipo PPMC" wizardSortingType="SimpleDir" wizardControl="Tipo_PPMC" wizardAddNbsp="False" PathID="grdPPMCsSorter_Tipo_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_id_ppmc" column="id_ppmc" wizardCaption="Id Ppmc" wizardSortingType="SimpleDir" wizardControl="id_ppmc" wizardAddNbsp="False" PathID="grdPPMCsSorter_id_ppmc">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="13" visible="True" name="Sorter_descripci_n" column="descripción" wizardCaption="Descripción" wizardSortingType="SimpleDir" wizardControl="descripci_n" wizardAddNbsp="False" PathID="grdPPMCsSorter_descripci_n">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_HERR_EST_COST" column="HERR_EST_COST" wizardCaption="HERR EST COST" wizardSortingType="SimpleDir" wizardControl="HERR_EST_COST" wizardAddNbsp="False" PathID="grdPPMCsSorter_HERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_REQ_SERV" column="REQ_SERV" wizardCaption="REQ SERV" wizardSortingType="SimpleDir" wizardControl="REQ_SERV" wizardAddNbsp="False" PathID="grdPPMCsSorter_REQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_CUMPL_REQ_FUNC" column="CUMPL_REQ_FUNC" wizardCaption="CUMPL REQ FUNC" wizardSortingType="SimpleDir" wizardControl="CUMPL_REQ_FUNC" wizardAddNbsp="False" PathID="grdPPMCsSorter_CUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="17" visible="True" name="Sorter_CALIDAD_PROD_TERM" column="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardSortingType="SimpleDir" wizardControl="CALIDAD_PROD_TERM" wizardAddNbsp="False" PathID="grdPPMCsSorter_CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="18" visible="True" name="Sorter_RETR_ENTREGABLE" column="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardSortingType="SimpleDir" wizardControl="RETR_ENTREGABLE" wizardAddNbsp="False" PathID="grdPPMCsSorter_RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="19" visible="True" name="Sorter_COMPL_RUTA_CRITICA" column="COMPL_RUTA_CRITICA" wizardCaption="COMPL RUTA CRITICA" wizardSortingType="SimpleDir" wizardControl="COMPL_RUTA_CRITICA" wizardAddNbsp="False" PathID="grdPPMCsSorter_COMPL_RUTA_CRITICA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="20" visible="True" name="Sorter_EST_PROY" column="EST_PROY" wizardCaption="EST PROY" wizardSortingType="SimpleDir" wizardControl="EST_PROY" wizardAddNbsp="False" PathID="grdPPMCsSorter_EST_PROY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="21" visible="True" name="Sorter_DEF_FUG_AMB_PROD" column="DEF_FUG_AMB_PROD" wizardCaption="DEF FUG AMB PROD" wizardSortingType="SimpleDir" wizardControl="DEF_FUG_AMB_PROD" wizardAddNbsp="False" PathID="grdPPMCsSorter_DEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="23" visible="True" name="Sorter_MesReporte" column="MesReporte" wizardCaption="Mes Reporte" wizardSortingType="SimpleDir" wizardControl="MesReporte" wizardAddNbsp="False" PathID="grdPPMCsSorter_MesReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="24" visible="True" name="Sorter_AnioReporte" column="AnioReporte" wizardCaption="Anio Reporte" wizardSortingType="SimpleDir" wizardControl="AnioReporte" wizardAddNbsp="False" PathID="grdPPMCsSorter_AnioReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="26" visible="True" name="Sorter_ACSI" column="ACSI" wizardCaption="ACSI" wizardSortingType="SimpleDir" wizardControl="ACSI" wizardAddNbsp="False" PathID="grdPPMCsSorter_ACSI">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="28" visible="True" name="Sorter_descartar" column="descartar" wizardCaption="Descartar" wizardSortingType="SimpleDir" wizardControl="descartar" wizardAddNbsp="False" PathID="grdPPMCsSorter_descartar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" name="serv_negocio" fieldSource="serv_negocio" wizardCaption="Serv Negocio" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsserv_negocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="serv_cont" fieldSource="serv_cont" wizardCaption="Serv Cont" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsserv_cont">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="32" fieldSourceType="DBColumn" dataType="Text" html="False" name="Proveedor" fieldSource="Proveedor" wizardCaption="Proveedor" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsProveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="Tipo_PPMC" fieldSource="Tipo_PPMC" wizardCaption="Tipo PPMC" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsTipo_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="34" fieldSourceType="DBColumn" dataType="Integer" html="False" name="id_ppmc" fieldSource="id_ppmc" wizardCaption="Id Ppmc" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdPPMCsid_ppmc" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="CalificaPPMCSAT.ccp" linkProperties="{'textSource':'','textSourceDB':'id_ppmc','hrefSource':'CalificaPPMCSAT.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'ID','parameterName':'ID'},'1':{'sourceType':'DataField','parameterSource':'ID','parameterName':'ID'},'length':2,'objectType':'linkParameters'}}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="79" sourceType="DataField" name="ID" source="ID"/>
					</LinkParameters>
				</Link>
				<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="False" name="descripci_n" fieldSource="descripción" wizardCaption="Descripción" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsdescripci_n">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="40" fieldSourceType="DBColumn" dataType="Text" html="False" name="HERR_EST_COST" fieldSource="HERR_EST_COST" wizardCaption="HERR EST COST" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsHERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="41" fieldSourceType="DBColumn" dataType="Text" html="False" name="REQ_SERV" fieldSource="REQ_SERV" wizardCaption="REQ SERV" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsREQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="42" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUMPL_REQ_FUNC" fieldSource="CUMPL_REQ_FUNC" wizardCaption="CUMPL REQ FUNC" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsCUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="43" fieldSourceType="DBColumn" dataType="Text" html="False" name="CALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM" wizardCaption="CALIDAD PROD TERM" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsCALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="44" fieldSourceType="DBColumn" dataType="Text" html="False" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" wizardCaption="RETR ENTREGABLE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsRETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="45" fieldSourceType="DBColumn" dataType="Text" html="False" name="COMPL_RUTA_CRITICA" fieldSource="COMPL_RUTA_CRITICA" wizardCaption="COMPL RUTA CRITICA" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsCOMPL_RUTA_CRITICA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="46" fieldSourceType="DBColumn" dataType="Text" html="False" name="EST_PROY" fieldSource="EST_PROY" wizardCaption="EST PROY" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsEST_PROY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="47" fieldSourceType="DBColumn" dataType="Text" html="False" name="DEF_FUG_AMB_PROD" fieldSource="DEF_FUG_AMB_PROD" wizardCaption="DEF FUG AMB PROD" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsDEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="49" fieldSourceType="DBColumn" dataType="Text" html="False" name="MesReporte" fieldSource="Mes" wizardCaption="Mes Reporte" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdPPMCsMesReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="50" fieldSourceType="DBColumn" dataType="Integer" html="False" name="AnioReporte" fieldSource="AnioReporte" wizardCaption="Anio Reporte" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdPPMCsAnioReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="52" fieldSourceType="DBColumn" dataType="Integer" html="False" name="ACSI" fieldSource="ACSI" wizardCaption="ACSI" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="grdPPMCsACSI">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="54" fieldSourceType="DBColumn" dataType="Boolean" html="False" name="descartar" fieldSource="descartar" wizardCaption="Descartar" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsdescartar">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="55" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}" PathID="grdPPMCsNavigator">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="51" fieldSourceType="DBColumn" dataType="Text" html="False" name="ppmc_adicional" fieldSource="ppmc_adicional" wizardCaption="Ppmc Adicional" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsppmc_adicional">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="48" fieldSourceType="DBColumn" dataType="Text" html="False" name="Obs_manuales" fieldSource="Obs_manuales" wizardCaption="Obs Manuales" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="grdPPMCsObs_manuales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="80" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="ImgHERR_EST_COST" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="grdPPMCsImgHERR_EST_COST">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="81" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="ImgREQ_SERV" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="grdPPMCsImgREQ_SERV">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="82" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="ImgCUMPLREQFUNC" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="grdPPMCsImgCUMPLREQFUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="83" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="ImgCALIDADPRODTERM" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="grdPPMCsImgCALIDADPRODTERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="84" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="ImgRETRENTREGABLE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="grdPPMCsImgRETRENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="85" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="ImgCOMPLRUTACRITICA" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="grdPPMCsImgCOMPLRUTACRITICA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="86" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="ImgESTPROY" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="grdPPMCsImgESTPROY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="87" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="ImgDEFFUGAMBPROD" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="grdPPMCsImgDEFFUGAMBPROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="29" styles="Row;AltRow" name="rowStyle"/>
						<Action actionName="Custom Code" actionCategory="General" id="88"/>
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
				<SQLParameter id="106" dataType="Integer" defaultValue="0" parameterSource="s_id_ppmc" parameterType="URL" variable="s_id_ppmc"/>
				<SQLParameter id="107" dataType="Integer" defaultValue="0" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
				<SQLParameter id="108" dataType="Integer" defaultValue="0" parameterSource="s_id_servivio_cont" parameterType="URL" variable="s_id_servivio_cont"/>
				<SQLParameter id="109" dataType="Integer" defaultValue="0" parameterSource="s_id_servicio_negocio" parameterType="URL" variable="s_id_servicio_negocio"/>
				<SQLParameter id="110" dataType="Integer" defaultValue="0" parameterSource="s_id_tipo" parameterType="URL" variable="s_id_tipo"/>
				<SQLParameter id="111" dataType="Integer" defaultValue="0" parameterSource="s_MesReporte" parameterType="URL" variable="s_MesReporte"/>
				<SQLParameter id="112" dataType="Integer" defaultValue="0" parameterSource="s_AnioReporte" parameterType="URL" variable="s_AnioReporte"/>
				<SQLParameter id="113" dataType="Integer" defaultValue="0" parameterSource="lstTipoPPMC" parameterType="URL" variable="lstTipoPPMC"/>
				<SQLParameter id="114" dataType="Integer" defaultValue="0" parameterSource="lstServNeg" parameterType="URL" variable="lstServNeg"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
			<PKFields/>
		</Grid>
		<Record id="56" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Grid2" wizardCaption=" Grid1 Buscar" wizardOrientation="Horizontal" wizardFormMethod="post" returnPage="PPMCsDictaminados.ccp" PathID="Grid2">
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
				<ListBox id="96" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Text" returnValueType="Number" name="lstTipoPPMC" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" wizardEmptyCaption="Seleccionar Valor" PathID="Grid2lstTipoPPMC" connection="cnDisenio" dataSource="select  mc.id_tipo, g.nombre TipoPPMC
from calificacion_rs_SAT  mc
inner join c_generico g on g.id_generico = mc.id_tipo  and g.id_catalogo = 17 
group by mc.id_tipo, g.nombre 
" boundColumn="id_tipo" textColumn="TipoPPMC">
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
				<ListBox id="105" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Text" returnValueType="Number" name="lstServNeg" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" wizardEmptyCaption="Seleccionar Valor" PathID="Grid2lstServNeg" connection="cnDisenio" dataSource="
select  distinct  mc.id_servicio_negocio, sn.nombre ServNeg
from calificacion_rs_SAT  mc
inner join c_servicio sn on sn.id_servicio = mc.id_servicio_negocio 
" boundColumn="id_servicio_negocio" textColumn="ServNeg">
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
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsDictaminados_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsDictaminados.php" forShow="True" url="PPMCsDictaminados.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
