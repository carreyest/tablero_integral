<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<IncludePage id="2" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Grid id="3" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="20" name="Grid1" connection="cnDisenio" dataSource="select cast(DatosPPMC.ID_PPMC as integer) ID_PPMC, DatosPPMC.NAME, 
	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) SERVICIO_NEGOCIO, 
	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) TIPO_REQUERIMIENTO,
	p.nombre, ISNULL(c.IdEstimacion,u.IdEstimacion) IdEstimacion, u.Id, c.RETR_ENTREGABLE  , c.COMPL_RUTA_CRITICA,c.CUMPL_REQ_FUNC, C.EST_PROY , C.CALIDAD_PROD_TERM ,c.DEF_FUG_AMB_PROD, c.CAL_COD,
	i.FechaFirmaCAES, i.IdTipoReq, i.id_servicio_cont, i.id RetEnt, u.analista , df.id DefFug, rf.id ReqFun, ca.id Calidad, u.MesTransicion, u.EsReqTecnico, u.Revision
from mc_universo_cds u inner join 
	(
SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_RO_AS 
UNION ALL
SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo
	FROM PPMC_PROYECTOS_AS 
UNION ALL
SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo
	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC 
UNION ALL
SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo
	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  
 ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO 
inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id
left join mc_info_rs_cr_re_rc i on i.id = u.id
left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo
left join mc_info_rs_cr_deffug df on df.id = c.iduniverso
left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso
left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso 
left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio 
where  isnull(descartar_manual,0)=0 and tipo='PC'
	and (mes = {s_mesparam} or 0={s_mesparam})
	and anio = {s_anioparam}
	AND (u.id_proveedor ={s_id_proveedor} OR 0={s_id_proveedor})
	AND (u.numero ='{s_numero}' OR ''='{s_numero}')
	and (u.analista like '%{sAnalista}%' or u.analista  is null)" pageSizeLimit="100" pageSize="True" wizardCaption="Requerimientos de Apertura" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="Grid1" wizardAllowSorting="True">
			<Components>
				<Sorter id="6" visible="True" name="Sorter_ID_PPMC" column="ID_PPMC" wizardCaption="ID PPMC" wizardSortingType="SimpleDir" wizardControl="ID_PPMC" wizardAddNbsp="False" PathID="Grid1Sorter_ID_PPMC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="7" visible="True" name="Sorter_SERVICIO_NEGOCIO" column="SERVICIO_NEGOCIO" wizardCaption="SERVICIO NEGOCIO" wizardSortingType="SimpleDir" wizardControl="SERVICIO_NEGOCIO" wizardAddNbsp="False" PathID="Grid1Sorter_SERVICIO_NEGOCIO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_nombre" column="nombre" wizardCaption="Nombre" wizardSortingType="SimpleDir" wizardControl="nombre" wizardAddNbsp="False" PathID="Grid1Sorter_nombre">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="9" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ID_PPMC" fieldSource="ID_PPMC" wizardCaption="ID PPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1ID_PPMC" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="None" hrefSource="PPMCsCrInfoGeneral.ccp" linkProperties="{'textSource':'','textSourceDB':'ID_PPMC','hrefSource':'PPMCsCrInfoGeneral.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'ID_PPMC'},'1':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'ID_PPMC'},'2':{'sourceType':'DataField','parameterSource':'IdEstimacion','parameterName':'IdEstimacion'},'3':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'ID_PPMC'},'4':{'sourceType':'DataField','parameterSource':'IdEstimacion','parameterName':'IdEstimacion'},'5':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'6':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'7':{'sourceType':'DataField','parameterSource':'Id','parameterName':'sId'},'8':{'sourceType':'DataField','parameterSource':'Id','parameterName':'sID'},'9':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'length':10,'objectType':'linkParameters'}}" format="####">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="47" sourceType="DataField" name="Id" source="Id"/>
					</LinkParameters>
				</Link>
				<Label id="10" fieldSourceType="DBColumn" dataType="Memo" html="False" generateSpan="False" name="NAME" fieldSource="NAME" wizardCaption="NAME" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="11" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="SERVICIO_NEGOCIO" fieldSource="SERVICIO_NEGOCIO" wizardCaption="SERVICIO NEGOCIO" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1SERVICIO_NEGOCIO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="12" fieldSourceType="DBColumn" dataType="Memo" html="False" generateSpan="False" name="TIPO_REQUERIMIENTO" fieldSource="TIPO_REQUERIMIENTO" wizardCaption="TIPO REQUERIMIENTO" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1TIPO_REQUERIMIENTO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="13" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="nombre" fieldSource="nombre" wizardCaption="Nombre" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1nombre">
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
				<Sorter id="17" visible="True" name="Sorter1" wizardSortingType="SimpleDir" PathID="Grid1Sorter1" wizardCaption="Proyecto" column="NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="18" visible="True" name="Sorter2" wizardSortingType="SimpleDir" PathID="Grid1Sorter2" wizardCaption="Tipo de Requerimiento" column="TIPO_REQUERIMIENTO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="51" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="IdEstimacion" PathID="Grid1IdEstimacion" fieldSource="IdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="52" visible="True" name="Sorter3" wizardSortingType="SimpleDir" PathID="Grid1Sorter3" wizardCaption="Estimación" column="IdEstimacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<ImageLink id="93" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCumpleHE" PathID="Grid1imgCumpleHE" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="PPMCsCrbDetalle.php" linkProperties="{'textSource':'','textSourceDB':'','hrefSource':'PPMCsCrbDetalle.php','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id','parameterName':'sID'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="145" sourceType="DataField" name="sID" source="Id"/>
					</LinkParameters>
				</ImageLink>
				<Label id="73" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="RETR_ENTREGABLE" fieldSource="RETR_ENTREGABLE" PathID="Grid1RETR_ENTREGABLE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="100" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaFirmaCAES" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Grid1FechaFirmaCAES" fieldSource="FechaFirmaCAES" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="dd/mm/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="101" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="CAL_COD" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Grid1CAL_COD" fieldSource="CAL_COD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="107" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCumpleCC" PathID="Grid1imgCumpleCC" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="PPMCsCrCalCodDetalle.ccp" linkProperties="{&quot;textSource&quot;:&quot;&quot;,&quot;textSourceDB&quot;:&quot;&quot;,&quot;hrefSource&quot;:&quot;PPMCsCrCalCodDetalle.ccp&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;0&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;length&quot;:1,&quot;objectType&quot;:&quot;linkParameters&quot;}}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="151" sourceType="DataField" name="Id" source="Id"/>
					</LinkParameters>
				</ImageLink>
				<Link id="108" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lkCumpleCC" wizardCaption="ID PPMC" wizardIsPassword="False" wizardUseTemplateBlock="True" wizardAddNbsp="True" PathID="Grid1lkCumpleCC" visible="Dynamic" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="PPMCsCrCalCodDetalle.ccp" linkProperties="{'textSource':'Ver','textSourceDB':'ID_PPMC','hrefSource':'PPMCsCrCalCodDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'ID_PPMC'},'1':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'ID_PPMC'},'2':{'sourceType':'DataField','parameterSource':'IdEstimacion','parameterName':'IdEstimacion'},'3':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'ID_PPMC'},'4':{'sourceType':'DataField','parameterSource':'IdEstimacion','parameterName':'IdEstimacion'},'5':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'6':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'7':{'sourceType':'DataField','parameterSource':'Id','parameterName':'sId'},'8':{'sourceType':'DataField','parameterSource':'Id','parameterName':'sID'},'9':{'sourceType':'DataField','parameterSource':'Id','parameterName':'sID'},'10':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'11':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'12':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'length':13,'objectType':'linkParameters'}}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="109" sourceType="DataField" name="Id" source="Id"/>
					</LinkParameters>
				</Link>
				<Label id="110" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="CUMPL_REQ_FUNC" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Grid1CUMPL_REQ_FUNC" fieldSource="CUMPL_REQ_FUNC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="120" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCumpleCRF" PathID="Grid1imgCumpleCRF" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="PPMCsCumpReqFunDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'','hrefSource':'PPMCsCumpReqFunDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="143" sourceType="DataField" name="Id" source="Id"/>
					</LinkParameters>
				</ImageLink>
				<Label id="126" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DEF_FUG_AMB_PROD" fieldSource="DEF_FUG_AMB_PROD" PathID="Grid1DEF_FUG_AMB_PROD">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="127" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lkCumpleDF" wizardCaption="ID PPMC" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="Grid1lkCumpleDF" visible="Dynamic" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="PPMCsDefFugDetalle.ccp" linkProperties="{&quot;textSource&quot;:&quot;Ver&quot;,&quot;textSourceDB&quot;:&quot;ID_PPMC&quot;,&quot;hrefSource&quot;:&quot;PPMCsDefFugDetalle.ccp&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;0&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;ID_PPMC&quot;,&quot;parameterName&quot;:&quot;ID_PPMC&quot;},&quot;1&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;ID_PPMC&quot;,&quot;parameterName&quot;:&quot;ID_PPMC&quot;},&quot;2&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;IdEstimacion&quot;,&quot;parameterName&quot;:&quot;IdEstimacion&quot;},&quot;3&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;ID_PPMC&quot;,&quot;parameterName&quot;:&quot;ID_PPMC&quot;},&quot;4&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;IdEstimacion&quot;,&quot;parameterName&quot;:&quot;IdEstimacion&quot;},&quot;5&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;6&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;7&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;sId&quot;},&quot;8&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;sID&quot;},&quot;9&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;sID&quot;},&quot;10&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;11&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;12&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;13&quot;:{&quot;sourceType&quot;:&quot;DataField&quot;,&quot;parameterSource&quot;:&quot;Id&quot;,&quot;parameterName&quot;:&quot;Id&quot;},&quot;length&quot;:14,&quot;objectType&quot;:&quot;linkParameters&quot;}}" format="####">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="128" sourceType="DataField" name="Id" source="Id"/>
					</LinkParameters>
				</Link>
				<Link id="129" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkCALIDAD_PROD_TERM" PathID="Grid1lkCALIDAD_PROD_TERM" hrefSource="PPMCsCrbCalidad.ccp" fieldSource="Calidad" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Ver','textSourceDB':'Calidad','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'1':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'length':2,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="130" sourceType="DataField" format="yyyy-mm-dd" name="Id" source="Id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="131" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkCUMPL_REQ_FUNC" PathID="Grid1lkCUMPL_REQ_FUNC" hrefSource="PPMCsCumpReqFunDetalle.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Ver','textSourceDB':'','hrefSource':'PPMCsCumpReqFunDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="132" sourceType="DataField" name="Id" source="Id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="133" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="analista" PathID="Grid1analista" fieldSource="analista">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="139" visible="True" name="Sorter4" wizardSortingType="SimpleDir" PathID="Grid1Sorter4" wizardCaption="Analista" column="analista">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<ImageLink id="140" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" name="imgCumpleDF" PathID="Grid1imgCumpleDF" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="PPMCsDefFugDetalle.ccp" linkProperties="{'textSource':'','textSourceDB':'','hrefSource':'PPMCsDefFugDetalle.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="152" sourceType="DataField" name="Id" source="Id"/>
					</LinkParameters>
				</ImageLink>
				<Label id="141" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="CALIDAD_PROD_TERM" PathID="Grid1CALIDAD_PROD_TERM" fieldSource="CALIDAD_PROD_TERM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="142" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="imgCALIDAD_PROD_TERM" PathID="Grid1imgCALIDAD_PROD_TERM" linkProperties="{'textSource':'','textSourceDB':'','hrefSource':'PPMCsCrbCalidad.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id','parameterName':'Id'},'length':1,'objectType':'linkParameters'}}" hrefSource="PPMCsCrbCalidad.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="144" sourceType="DataField" name="Id" source="Id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Link id="146" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkCumpleHE" PathID="Grid1lkCumpleHE" hrefSource="PPMCsCrbDetalle.php" fieldSource="Ver" wizardUseTemplateBlock="True" linkProperties="{'textSource':'Ver','textSourceDB':'Ver','hrefSource':'PPMCsCrbDetalle.php','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'Id','parameterName':'sID'},'1':{'sourceType':'DataField','parameterSource':'Id','parameterName':'sID'},'length':2,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="147" sourceType="DataField" format="yyyy-mm-dd" name="sID" source="Id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="173" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="EsReqTecnico" PathID="Grid1EsReqTecnico" fieldSource="EsReqTecnico" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="ReqTecList.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'','textSourceDB':'EsReqTecnico','hrefSource':'ReqTecList.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'ID_PPMC','parameterName':'s_Requerimiento'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="179" sourceType="DataField" name="s_Requerimiento" source="ID_PPMC"/>
					</LinkParameters>
				</Link>
				<Label id="201" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lRevision" PathID="Grid1lRevision">
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
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="195"/>
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
				<SQLParameter id="202" dataType="Integer" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))" designDefaultValue="11" parameterSource="s_mesparam" parameterType="URL" variable="s_mesparam"/>
<SQLParameter id="203" dataType="Integer" defaultValue="date(&quot;Y&quot;,mktime(0,0,0,date(&quot;m&quot;)-1,date(&quot;d&quot;),date(&quot;Y&quot;)))" designDefaultValue="2013" parameterSource="s_anioparam" parameterType="URL" variable="s_anioparam"/>
<SQLParameter id="204" dataType="Integer" defaultValue="CCGetSession(&quot;CDSPreferido&quot;)" designDefaultValue="0" parameterSource="s_id_proveedor" parameterType="URL" variable="s_id_proveedor"/>
<SQLParameter id="205" dataType="Text" designDefaultValue="eminero" parameterSource="sAnalista" parameterType="URL" variable="sAnalista"/>
<SQLParameter id="206" dataType="Text" designDefaultValue="0" parameterSource="s_numero" parameterType="URL" variable="s_numero"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="21" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Grid2" searchIds="21" fictitiousConnection="cnDisenio" fictitiousDataSource="mc_universo_cds" wizardCaption="  Buscar" changedCaptionSearch="False" wizardOrientation="Horizontal" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="True" wizardResultsForm="Grid1" returnPage="PPMCsCrbLista.ccp" PathID="Grid2">
			<Components>
				<Button id="22" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Buscar" PathID="Grid2Button_DoSearch">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="166"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Grid2s_id_proveedor" sourceType="Table" connection="cnDisenio" dataSource="mc_c_proveedor" boundColumn="id_proveedor" textColumn="nombre" defaultValue="CCGetSession(&quot;CDSPreferido&quot;,&quot;&quot;)">
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
				<TextBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_numero" fieldSource="numero" wizardIsPassword="False" wizardCaption="Numero" caption="Numero" required="False" unique="False" wizardSize="25" wizardMaxLength="25" PathID="Grid2s_numero">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_mesparam" fieldSource="mes" wizardIsPassword="False" wizardCaption="Mes" caption="Mes" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Grid2s_mesparam" sourceType="Table" connection="cnDisenio" dataSource="mc_c_mes" boundColumn="IdMes" textColumn="Mes" defaultValue="date(&quot;m&quot;,mktime(0,0,0,date(&quot;m&quot;),date(&quot;d&quot;)-45,date(&quot;Y&quot;)))">
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
				<ListBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="s_anioparam" fieldSource="anio" wizardIsPassword="False" wizardCaption="Anio" caption="Anio" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Grid2s_anioparam" sourceType="Table" connection="cnDisenio" dataSource="mc_c_anio" boundColumn="Ano" textColumn="Ano" defaultValue="2014">
					<Components/>
					<Events>
						<Event name="BeforeBuildSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="189"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters>
						<TableParameter id="181" conditionType="Parameter" useIsNull="False" dataType="Integer" field="Ano" logicOperator="And" parameterSource="2013" parameterType="Expression" searchConditionType="GreaterThan"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="180" posHeight="88" posLeft="10" posTop="10" posWidth="95" tableName="mc_c_anio"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="182" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="183" dataType="Integer" fieldName="Ano" tableName="mc_c_anio"/>
					</PKFields>
				</ListBox>
				<ListBox id="59" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="sAnalista" wizardEmptyCaption="Seleccionar Valor" PathID="Grid2sAnalista" connection="cnDisenio" dataSource="mc_c_usuarios" boundColumn="Usuario" textColumn="Usuario" orderBy="Usuario">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="65" conditionType="Parameter" useIsNull="False" dataType="Integer" defaultValue="3" field="Nivel" logicOperator="And" parameterSource="Nivel" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="64" posHeight="180" posLeft="10" posTop="10" posWidth="118" tableName="mc_c_usuarios"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="66" fieldName="*"/>
					</Fields>
					<PKFields>
						<PKField id="67" dataType="Integer" fieldName="Id" tableName="mc_c_usuarios"/>
					</PKFields>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="167"/>
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
		<Link id="158" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkCuadroNS" PathID="lkCuadroNS" hrefSource="PPMCsApbCuadroNSRSxls.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Cuadro Ns RSs','textSourceDB':'','hrefSource':'PPMCsApbCuadroNSRSxls.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="160" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkDetalleRS" PathID="lkDetalleRS" hrefSource="PPMCsApbDetalleRSxls.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Detalle RSs','textSourceDB':'','hrefSource':'PPMCsApbDetalleRSxls.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="95" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="lkTableroSLAs" PathID="lkTableroSLAs" hrefSource="TableroSLAs.ccp" wizardUseTemplateBlock="False" linkProperties="{'textSource':'Tablero SLAs','textSourceDB':'','hrefSource':'TableroSLAs.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}"><Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="PPMCsCrbLista_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="PPMCsCrbLista.php" forShow="True" url="PPMCsCrbLista.php" comment="//" codePage="windows-1252"/>
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
