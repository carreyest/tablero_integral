<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Austere4" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Grid id="68" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="mc_detalle_incidente_avl" connection="cnDisenio" dataSource="select 	det.ClaveMovimiento, det.DescMovimiento , det.FechaInicioMov, det.FechaFinMov, det.Paquete    
	, dbo.ufDiffFechasMCSec(i.FechaEnCurso,i.FechaResuelto) TiempoSolucionRmdy
	, case when i.id_incidente = 'INC000005935483' then '2016-10-24 03:12:00' else r.LiberacionAVL end LiberacionAVL
	, case when i.id_incidente = 'INC000005935483' then 1 else r.CountPaquete end CountPaquete, t.TotalSecPaquete , s.TotalHoras   
    , dbo.ufDiffFechasMCSec(det.FechaInicioMov,  det.FechaFinMov) HorasInvertidas
from mc_info_incidentes i 
	inner join mc_universo_cds u on i.Id_incidente = u.numero  and month(i.FechaCarga ) = u.mes and YEAR(fechacarga)= u.anio 
	inner join mc_detalle_incidente_avl det on (det.Id_Incidente = i.Id_incidente or det.Id_Incidente = i.IncPadre )
		and month(det.FechaCarga ) = u.mes and YEAR(det.fechacarga)= u.anio 
	inner join mc_c_movimiento m on m.ClaveMovimiento = det.ClaveMovimiento 
	left join (select id_incidente, paquete, FechaCarga, Max(FechaFinMov) LiberacionAVL, count(FechaFinMov)  CountPaquete
			from mc_detalle_incidente_avl det 
				where  (
						( MONTH(FechaCarga) &gt;= 11 and YEAR(FechaCarga) = 2016 ) OR YEAR(FechaCarga) &gt;= 2017
						AND
						ClaveMovimiento in ('38','36','49')
					   )
					   OR
					   (
						( MONTH(FechaCarga) &lt; 11 and YEAR(FechaCarga) = 2016 ) OR YEAR(FechaCarga) &lt;= 2015
						AND
						ClaveMovimiento in ('38','49','36','47','40')
					   )					   
group by id_incidente, Paquete, FechaCarga    
	) as r on r.Id_Incidente = det.Id_Incidente and r.Paquete = det.Paquete and MONTH(r.FechaCarga )= u.mes  and YEAR(r.FechaCarga )= u.anio 
	left join (select id_incidente, paquete, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalSecPaquete
			from mc_detalle_incidente_avl dett
				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion2=1 
				group by id_incidente, Paquete, FechaCarga  
	) as t on t.Id_Incidente = det.Id_Incidente and t.Paquete = det.Paquete and MONTH(t.FechaCarga )= u.mes  and YEAR(t.FechaCarga )= u.anio 
	left join (select id_incidente, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalHoras
			from mc_detalle_incidente_avl dett
				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion2=1 
				group by id_incidente, FechaCarga  
	) as s on s.Id_Incidente = det.Id_Incidente and MONTH(s.FechaCarga )= u.mes and YEAR(s.FechaCarga )= u.anio 
where i.id_incidente = '{Id_incidente}'
	and i.Estado = 'Closed'
	and det.ClaveMovimiento not in (550,701,702,703,704,705,710,711)	
	order by Paquete, FechaInicioMov " pageSizeLimit="100" pageSize="True" wizardCaption="List of Mc Detalle Incidente Avl " wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="False" gridExtendedHTML="False" PathID="mc_detalle_incidente_avl">
			<Components>
				<Sorter id="69" visible="True" name="Sorter_ClaveMovimiento" column="ClaveMovimiento" wizardCaption="Clave Movimiento" wizardSortingType="SimpleDir" wizardControl="ClaveMovimiento" wizardAddNbsp="False" PathID="mc_detalle_incidente_avlSorter_ClaveMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="70" visible="True" name="Sorter_DescMovimiento" column="DescMovimiento" wizardCaption="Desc Movimiento" wizardSortingType="SimpleDir" wizardControl="DescMovimiento" wizardAddNbsp="False" PathID="mc_detalle_incidente_avlSorter_DescMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="71" visible="True" name="Sorter_FechaInicioMov" column="FechaInicioMov" wizardCaption="Fecha Inicio Mov" wizardSortingType="SimpleDir" wizardControl="FechaInicioMov" wizardAddNbsp="False" PathID="mc_detalle_incidente_avlSorter_FechaInicioMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="72" visible="True" name="Sorter_FechaFinMov" column="FechaFinMov" wizardCaption="Fecha Fin Mov" wizardSortingType="SimpleDir" wizardControl="FechaFinMov" wizardAddNbsp="False" PathID="mc_detalle_incidente_avlSorter_FechaFinMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="73" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="mc_detalle_incidente_avlSorter_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="74" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ClaveMovimiento" fieldSource="ClaveMovimiento" wizardCaption="Clave Movimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_detalle_incidente_avlClaveMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="75" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DescMovimiento" fieldSource="DescMovimiento" wizardCaption="Desc Movimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_detalle_incidente_avlDescMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="76" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaInicioMov" fieldSource="FechaInicioMov" wizardCaption="Fecha Inicio Mov" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_detalle_incidente_avlFechaInicioMov" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="77" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaFinMov" fieldSource="FechaFinMov" wizardCaption="Fecha Fin Mov" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_detalle_incidente_avlFechaFinMov" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="78" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="79" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Horas" PathID="mc_detalle_incidente_avlHoras" fieldSource="HorasInvertidas">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="80" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Panel id="81" visible="True" generateDiv="False" name="Panel1" PathID="mc_detalle_incidente_avlPanel1">
					<Components>
						<Label id="82" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardCaption="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_detalle_incidente_avlPanel1Paquete">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="83" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Label>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
				<Panel id="84" visible="True" generateDiv="False" name="Panel2" PathID="mc_detalle_incidente_avlPanel2">
					<Components>
						<Label id="85" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="sflAVLG" PathID="mc_detalle_incidente_avlPanel2sflAVLG" fieldSource="LiberacionAVL" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
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
				<Label id="195" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="TotalHoras" PathID="mc_detalle_incidente_avlTotalHoras" fieldSource="TotalHoras">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="196" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="245" fieldSourceType="DBColumn" dataType="Text" name="sTotalSecPaquete" PathID="mc_detalle_incidente_avlsTotalSecPaquete" fieldSource="TotalSecPaquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="86" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="87" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="88" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<PKFields>
			</PKFields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="449" dataType="Text" designDefaultValue="INC000003376478" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Link id="132" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="slAnterior" PathID="slAnterior" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="138"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
			<LinkParameters/>
		</Link>
		<Link id="130" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="slSiguiente" PathID="slSiguiente" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="131" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
			<LinkParameters/>
		</Link>
		<Record id="20" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentes" connection="cnDisenio" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Add/Edit Mc Info Incidentes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Horizontal" templatePageRecord="C:\Program Files (x86)\CodeChargeStudio5//Templates//Record//Horizontal.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_incidentes" editableComponentTypeString="Record" dataSource="SELECT i.Id,i.Id_incidente,i.ServicioNegocio,i.Aplicacion,
case when (select primera_fecha_nuevo from mc_incidentes_reasignaciones where id_incidente='{Id_incidente}') IS NULL THEN i.FechaNuevo ELSE (select primera_fecha_nuevo from mc_incidentes_reasignaciones where id_incidente='{Id_incidente}') END FechaNuevo,
i.FechaAsignado,i.FechaEnCurso,i.FechaPendiente,i.FechaResuelto,i.FechaCerrado,i.FechaCarga,i.Estado,i.Severidad,i.Dictamen,i.Historial,i.IncPadre,i.Dictamen2, 
p.Nombre ,p.Id_Proveedor, a.severidad SeveridadApp,
 	(select rtrim(valor) from mc_parametros where parametro= 
	case when a.severidad = 0 then 'TASeveridad0Segundos' when a.severidad =1 then 'TASeveridad1Segundos' 
		 when a.severidad = 2 then 'TASeveridad2Segundos' when a.severidad =3 then 'TASeveridad3Segundos'	end ) as TiempoAtencion,
(select valor from mc_parametros where parametro= 
	case when a.severidad = 0 then 'TSSeveridad0Segundos' when a.severidad =1 then 'TSSeveridad1Segundos' 
		 when a.severidad = 2 then 'TSSeveridad2Segundos' when a.severidad =3 then 'TSSeveridad3Segundos'	end ) as TiempoSolucion,
		 m.Mes  , u.anio 
 FROM mc_info_incidentes i 
 	inner join mc_universo_cds u on i.Id_incidente = u.numero  inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor and month(fechacarga)= u.mes and year(FechaCarga)= u.anio 
 	left join mc_c_aplicacion a on rtrim(i.Aplicacion)=rtrim(a.Descripcion)
 	left join mc_c_mes m on m.IdMes = u.mes 
where u.tipo ='IN'
AND i.Id_incidente = '{Id_incidente}' 
AND i.estado = 'Closed'">
			<Components>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Id_incidente" fieldSource="Id_incidente" PathID="mc_info_incidentesId_incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="slCDS" fieldSource="Nombre" PathID="mc_info_incidentesslCDS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="175" fieldSourceType="DBColumn" dataType="Text" name="shId_Proveedor" PathID="mc_info_incidentesshId_Proveedor" fieldSource="Id_Proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ServicioNegocio" fieldSource="ServicioNegocio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Servicio Negocio" wizardAddNbsp="True" PathID="mc_info_incidentesServicioNegocio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Aplicacion" fieldSource="Aplicacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Aplicacion" wizardAddNbsp="True" PathID="mc_info_incidentesAplicacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaNuevo" fieldSource="FechaNuevo" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Nuevo" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentesFechaNuevo" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaAsignado" fieldSource="FechaAsignado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Asignado" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentesFechaAsignado" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaEnCurso" fieldSource="FechaEnCurso" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha En Curso" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentesFechaEnCurso" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaPendiente" fieldSource="FechaPendiente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Pendiente" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentesFechaPendiente" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaResuelto" fieldSource="FechaResuelto" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Resuelto" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentesFechaResuelto" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="28" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaCerrado" fieldSource="FechaCerrado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Cerrado" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentesFechaCerrado" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="141" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Dictamen" PathID="mc_info_incidentesDictamen" fieldSource="Dictamen">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="232" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="slHistorial" PathID="mc_info_incidentesslHistorial" fieldSource="Historial">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="233" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Image1" PathID="mc_info_incidentesImage1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Label id="312" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Label1" PathID="mc_info_incidentesLabel1" fieldSource="Aplicacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="313" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="SeveridadApp" PathID="mc_info_incidentesSeveridadApp" fieldSource="SeveridadApp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="314" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="TiempoAtencion" PathID="mc_info_incidentesTiempoAtencion" fieldSource="TiempoAtencion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="315" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="TiempoSolucion" PathID="mc_info_incidentesTiempoSolucion" fieldSource="TiempoSolucion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="318" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lMes" PathID="mc_info_incidenteslMes" fieldSource="Mes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="31" eventType="Server"/>
						<Action actionName="Custom Code" actionCategory="General" id="317"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="393" dataType="Text" designDefaultValue="INC000003620123" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
			</SQLParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks>
			</JoinLinks>
			<Fields>
			</Fields>
			<PKFields>
			</PKFields>
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
		<Record id="143" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_calificacion_incidente" connection="cnDisenio" dataSource="mc_calificacion_incidentes_MC" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id_incidente" encryptPasswordField="False" wizardUseInterVariables="True" pkIsAutoincrement="True" wizardCaption="{res:mc_calificacion_incidentes_MC_RecordForm}" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_calificacion_incidente" returnPage="IncidenteDetalle2.ccp" activeCollection="UFormElements" activeTableType="mc_calificacion_incidentes_MC" customUpdate="mc_calificacion_incidentes_MC" customUpdateType="Table" customInsert="mc_calificacion_incidentes_MC" customInsertType="Table">
			<Components>
				<Button id="145" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" PathID="mc_calificacion_incidenteButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="146" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" PathID="mc_calificacion_incidenteButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="148" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="id_servicio" fieldSource="id_servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:id_servicio}" caption="{res:id_servicio}" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_calificacion_incidenteid_servicio" html="False">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="163" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<ListBox id="150" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Cumple_Inc_TiempoAsignacion" fieldSource="Cumple_Inc_TiempoAsignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:Cumple_Inc_TiempoAsignacion}" caption="{res:Cumple_Inc_TiempoAsignacion}" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_calificacion_incidenteCumple_Inc_TiempoAsignacion" sourceType="ListOfValues" dataSource="1;Cumplio;0;No Cumplio">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="183" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
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
				<ListBox id="151" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Cumple_Inc_TiempoSolucion" fieldSource="Cumple_Inc_TiempoSolucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:Cumple_Inc_TiempoSolucion}" caption="{res:Cumple_Inc_TiempoSolucion}" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_calificacion_incidenteCumple_Inc_TiempoSolucion" sourceType="ListOfValues" dataSource="1;Cumplio;0;No Cumplio">
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
				<Hidden id="152" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="Cumple_DISP_SOPORTE" fieldSource="Cumple_DISP_SOPORTE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:Cumple_DISP_SOPORTE}" caption="{res:Cumple_DISP_SOPORTE}" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="mc_calificacion_incidenteCumple_DISP_SOPORTE" sourceType="ListOfValues" dataSource=";No Aplica;1;Cumplio;0;No Cumplio">
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
				</Hidden>
				<TextArea id="153" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Obs_Manuales" fieldSource="Obs_Manuales" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:Obs_Manuales}" caption="{res:Obs_Manuales}" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_calificacion_incidenteObs_Manuales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Label id="155" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="Aplicacion" PathID="mc_calificacion_incidenteAplicacion">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="164" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="162" fieldSourceType="DBColumn" dataType="Text" name="shId_Incidente" PathID="mc_calificacion_incidenteshId_Incidente" fieldSource="id_incidente" html="False">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="166" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="167" fieldSourceType="DBColumn" dataType="Text" name="shDescartar" PathID="mc_calificacion_incidenteshDescartar" fieldSource="descartar" defaultValue="0">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="168" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="169" fieldSourceType="DBColumn" dataType="Text" name="shMes" PathID="mc_calificacion_incidenteshMes" fieldSource="MesReporte">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="171" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="170" fieldSourceType="DBColumn" dataType="Text" name="shAnio" PathID="mc_calificacion_incidenteshAnio" fieldSource="AnioReporte">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="172" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="173" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Servicio" PathID="mc_calificacion_incidenteServicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="176" fieldSourceType="DBColumn" dataType="Text" name="shIdProveedor" PathID="mc_calificacion_incidenteshIdProveedor" fieldSource="id_proveedor">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="177" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="181" fieldSourceType="DBColumn" dataType="Text" name="shId_Aplicacion" PathID="mc_calificacion_incidenteshId_Aplicacion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="184" urlType="Relative" enableValidation="False" isDefault="False" name="Cancelar" PathID="mc_calificacion_incidenteCancelar" returnPage="IncidentesLista.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="186" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="slSeveridad" wizardEmptyCaption="{res:CCS_SelectValue}" PathID="mc_calificacion_incidenteslSeveridad" dataSource="1;1;2;2;3;3;4;4" fieldSource="severidad" html="False">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="262"/>
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
					<Attributes/>
					<Features/>
				</Label>
				<CheckBox id="256" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="CheckBox1" PathID="mc_calificacion_incidenteCheckBox1" fieldSource="chkTiempo">
					<Components>
						<Label id="257" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="TotalHorasSolucion" PathID="mc_calificacion_incidenteCheckBox1TotalHorasSolucion">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="258"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Label>
					</Components>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="259"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</CheckBox>
				<Hidden id="267" fieldSourceType="DBColumn" dataType="Integer" name="shTiempoAtencion" PathID="mc_calificacion_incidenteshTiempoAtencion" fieldSource="Med_Ate_Mod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="268" fieldSourceType="DBColumn" dataType="Integer" name="shTiempoSolucion" PathID="mc_calificacion_incidenteshTiempoSolucion" fieldSource="Med_Sol_Mod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="269" fieldSourceType="DBColumn" dataType="Integer" name="shTiempoSoporte" PathID="mc_calificacion_incidenteshTiempoSoporte" fieldSource="Med_Sop_Mod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="271" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lblCalificado" PathID="mc_calificacion_incidentelblCalificado">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="272"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="283" fieldSourceType="DBColumn" dataType="Text" name="shUsuarioAlta" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_incidenteshUsuarioAlta" fieldSource="UsuarioAlta" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="286" fieldSourceType="DBColumn" dataType="Date" name="FechaUltMod" fieldSource="FechaUltMod" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S" PathID="mc_calificacion_incidenteFechaUltMod" html="False">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="287" id_oncopy="287"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="284" fieldSourceType="DBColumn" dataType="Text" name="shUsuarioUltMod" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_incidenteshUsuarioUltMod" fieldSource="UsuarioUltMod" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="288" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lblUsuarioUltMod" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_incidentelblUsuarioUltMod" fieldSource="UsuarioUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="289" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lblFechaUltMod" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_incidentelblFechaUltMod" fieldSource="FechaUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextArea id="290" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="txtCumple_Inc_TiempoAsignacion" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_incidentetxtCumple_Inc_TiempoAsignacion" fieldSource="Obs_Med_Ate">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="293"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextArea id="291" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="txtCumple_Inc_TiempoSolucion" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_incidentetxtCumple_Inc_TiempoSolucion" fieldSource="Obs_Med_Sol">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextArea id="292" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="txtCumple_DISP_SOPORTE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_incidentetxtCumple_DISP_SOPORTE" fieldSource="Obs_Med_Sop">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Image id="294" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Image1" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_incidenteImage1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="295" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Image2" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_incidenteImage2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Image id="296" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Image3" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="mc_calificacion_incidenteImage3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Hidden id="308" fieldSourceType="DBColumn" dataType="Text" name="Hidden1" PathID="mc_calificacion_incidenteHidden1" fieldSource="TiempoTotal">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<CheckBox id="388" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="evidencia_salvedad_TA" PathID="mc_calificacion_incidenteevidencia_salvedad_TA" fieldSource="evidencia_salvedad_TA" checkedValue="True" uncheckedValue="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextArea id="389" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="observacion_salvedad_TA" PathID="mc_calificacion_incidenteobservacion_salvedad_TA" fieldSource="observacion_salvedad_TA">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<CheckBox id="390" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" defaultValue="Unchecked" name="evidencia_salvedad_TS" PathID="mc_calificacion_incidenteevidencia_salvedad_TS" fieldSource="evidencia_salvedad_TS" checkedValue="True" uncheckedValue="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextArea id="391" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="observacion_salvedad_TS" PathID="mc_calificacion_incidenteobservacion_salvedad_TS" fieldSource="observacion_salvedad_TS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="446" fieldSourceType="DBColumn" dataType="Text" name="hslSeveridad" PathID="mc_calificacion_incidentehslSeveridad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="165" eventType="Server"/>
						<Action actionName="Custom Code" actionCategory="General" id="304"/>
					</Actions>
				</Event>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="178" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="270"/>
					</Actions>
				</Event>
				<Event name="BeforeInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="285"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="160" conditionType="Parameter" useIsNull="False" dataType="Text" field="id_incidente" logicOperator="And" orderNumber="1" parameterSource="Id_incidente" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="385" tableName="mc_calificacion_incidentes_MC"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="161" fieldName="*"/>
			</Fields>
			<PKFields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="421" field="id_servicio" dataType="Integer" parameterType="Control" parameterSource="id_servicio" omitIfEmpty="True"/>
				<CustomParameter id="422" field="Cumple_Inc_TiempoAsignacion" dataType="Integer" parameterType="Control" parameterSource="Cumple_Inc_TiempoAsignacion" omitIfEmpty="True"/>
				<CustomParameter id="423" field="Cumple_Inc_TiempoSolucion" dataType="Integer" parameterType="Control" parameterSource="Cumple_Inc_TiempoSolucion" omitIfEmpty="True"/>
				<CustomParameter id="424" field="Cumple_DISP_SOPORTE" dataType="Integer" parameterType="Control" parameterSource="Cumple_DISP_SOPORTE" omitIfEmpty="True"/>
				<CustomParameter id="425" field="Obs_Manuales" dataType="Text" parameterType="Control" parameterSource="Obs_Manuales" omitIfEmpty="True"/>
				<CustomParameter id="426" field="id_incidente" dataType="Text" parameterType="Control" parameterSource="shId_Incidente" omitIfEmpty="True"/>
				<CustomParameter id="427" field="descartar" dataType="Text" parameterType="Control" parameterSource="shDescartar" omitIfEmpty="True"/>
				<CustomParameter id="428" field="MesReporte" dataType="Text" parameterType="Control" parameterSource="shMes" omitIfEmpty="True"/>
				<CustomParameter id="429" field="AnioReporte" dataType="Text" parameterType="Control" parameterSource="shAnio" omitIfEmpty="True"/>
				<CustomParameter id="430" field="id_proveedor" dataType="Text" parameterType="Control" parameterSource="shIdProveedor" omitIfEmpty="True"/>
				<CustomParameter id="431" field="chkTiempo" dataType="Boolean" parameterType="Control" parameterSource="CheckBox1" omitIfEmpty="True"/>
				<CustomParameter id="432" field="Med_Ate_Mod" dataType="Integer" parameterType="Control" parameterSource="shTiempoAtencion" omitIfEmpty="True"/>
				<CustomParameter id="433" field="Med_Sol_Mod" dataType="Integer" parameterType="Control" parameterSource="shTiempoSolucion" omitIfEmpty="True"/>
				<CustomParameter id="434" field="Med_Sop_Mod" dataType="Integer" parameterType="Control" parameterSource="shTiempoSoporte" omitIfEmpty="True"/>
				<CustomParameter id="435" field="UsuarioAlta" dataType="Text" parameterType="Control" parameterSource="shUsuarioAlta" omitIfEmpty="True"/>
				<CustomParameter id="436" field="FechaUltMod" dataType="Date" parameterType="Control" parameterSource="FechaUltMod" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S" omitIfEmpty="True"/>
				<CustomParameter id="437" field="UsuarioUltMod" dataType="Text" parameterType="Control" parameterSource="shUsuarioUltMod" omitIfEmpty="True"/>
				<CustomParameter id="438" field="Obs_Med_Ate" dataType="Text" parameterType="Control" parameterSource="txtCumple_Inc_TiempoAsignacion" omitIfEmpty="True"/>
				<CustomParameter id="439" field="Obs_Med_Sol" dataType="Text" parameterType="Control" parameterSource="txtCumple_Inc_TiempoSolucion" omitIfEmpty="True"/>
				<CustomParameter id="440" field="Obs_Med_Sop" dataType="Text" parameterType="Control" parameterSource="txtCumple_DISP_SOPORTE" omitIfEmpty="True"/>
				<CustomParameter id="441" field="TiempoTotal" dataType="Text" parameterType="Control" parameterSource="Hidden1" omitIfEmpty="True"/>
				<CustomParameter id="442" field="evidencia_salvedad_TA" dataType="Boolean" parameterType="Control" parameterSource="evidencia_salvedad_TA" omitIfEmpty="True"/>
				<CustomParameter id="443" field="observacion_salvedad_TA" dataType="Text" parameterType="Control" parameterSource="observacion_salvedad_TA" omitIfEmpty="True"/>
				<CustomParameter id="444" field="evidencia_salvedad_TS" dataType="Boolean" parameterType="Control" parameterSource="evidencia_salvedad_TS" omitIfEmpty="True"/>
				<CustomParameter id="445" field="observacion_salvedad_TS" dataType="Text" parameterType="Control" parameterSource="observacion_salvedad_TS" omitIfEmpty="True"/>
				<CustomParameter id="448" field="severidad" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="hslSeveridad"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions>
				<TableParameter id="395" conditionType="Parameter" useIsNull="False" field="id_incidente" dataType="Text" parameterType="URL" parameterSource="Id_incidente" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="396" field="id_servicio" dataType="Integer" parameterType="Control" parameterSource="id_servicio" omitIfEmpty="True"/>
				<CustomParameter id="397" field="Cumple_Inc_TiempoAsignacion" dataType="Integer" parameterType="Control" parameterSource="Cumple_Inc_TiempoAsignacion" omitIfEmpty="True"/>
				<CustomParameter id="398" field="Cumple_Inc_TiempoSolucion" dataType="Integer" parameterType="Control" parameterSource="Cumple_Inc_TiempoSolucion" omitIfEmpty="True"/>
				<CustomParameter id="399" field="Cumple_DISP_SOPORTE" dataType="Integer" parameterType="Control" parameterSource="Cumple_DISP_SOPORTE" omitIfEmpty="True"/>
				<CustomParameter id="400" field="Obs_Manuales" dataType="Text" parameterType="Control" parameterSource="Obs_Manuales" omitIfEmpty="True"/>
				<CustomParameter id="401" field="id_incidente" dataType="Text" parameterType="Control" parameterSource="shId_Incidente" omitIfEmpty="True"/>
				<CustomParameter id="402" field="descartar" dataType="Text" parameterType="Control" parameterSource="shDescartar" omitIfEmpty="True"/>
				<CustomParameter id="403" field="MesReporte" dataType="Text" parameterType="Control" parameterSource="shMes" omitIfEmpty="True"/>
				<CustomParameter id="404" field="AnioReporte" dataType="Text" parameterType="Control" parameterSource="shAnio" omitIfEmpty="True"/>
				<CustomParameter id="405" field="id_proveedor" dataType="Text" parameterType="Control" parameterSource="shIdProveedor" omitIfEmpty="True"/>
				<CustomParameter id="406" field="chkTiempo" dataType="Boolean" parameterType="Control" parameterSource="CheckBox1" omitIfEmpty="False" defaultValue="0"/>
				<CustomParameter id="407" field="Med_Ate_Mod" dataType="Integer" parameterType="Control" parameterSource="shTiempoAtencion" omitIfEmpty="True"/>
				<CustomParameter id="408" field="Med_Sol_Mod" dataType="Integer" parameterType="Control" parameterSource="shTiempoSolucion" omitIfEmpty="True"/>
				<CustomParameter id="409" field="Med_Sop_Mod" dataType="Integer" parameterType="Control" parameterSource="shTiempoSoporte" omitIfEmpty="True"/>
				<CustomParameter id="410" field="UsuarioAlta" dataType="Text" parameterType="Control" parameterSource="shUsuarioAlta" omitIfEmpty="True"/>
				<CustomParameter id="411" field="FechaUltMod" dataType="Date" parameterType="Control" parameterSource="FechaUltMod" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S" omitIfEmpty="True"/>
				<CustomParameter id="412" field="UsuarioUltMod" dataType="Text" parameterType="Control" parameterSource="shUsuarioUltMod" omitIfEmpty="True"/>
				<CustomParameter id="413" field="Obs_Med_Ate" dataType="Text" parameterType="Control" parameterSource="txtCumple_Inc_TiempoAsignacion" omitIfEmpty="True"/>
				<CustomParameter id="414" field="Obs_Med_Sol" dataType="Text" parameterType="Control" parameterSource="txtCumple_Inc_TiempoSolucion" omitIfEmpty="True"/>
				<CustomParameter id="415" field="Obs_Med_Sop" dataType="Text" parameterType="Control" parameterSource="txtCumple_DISP_SOPORTE" omitIfEmpty="True"/>
				<CustomParameter id="416" field="TiempoTotal" dataType="Text" parameterType="Control" parameterSource="Hidden1" omitIfEmpty="True"/>
				<CustomParameter id="417" field="evidencia_salvedad_TA" dataType="Boolean" parameterType="Control" parameterSource="evidencia_salvedad_TA" omitIfEmpty="True"/>
				<CustomParameter id="418" field="observacion_salvedad_TA" dataType="Text" parameterType="Control" parameterSource="observacion_salvedad_TA" omitIfEmpty="True"/>
				<CustomParameter id="419" field="evidencia_salvedad_TS" dataType="Boolean" parameterType="Control" parameterSource="evidencia_salvedad_TS" omitIfEmpty="True"/>
				<CustomParameter id="420" field="observacion_salvedad_TS" dataType="Text" parameterType="Control" parameterSource="observacion_salvedad_TS" omitIfEmpty="True"/>
				<CustomParameter id="447" field="severidad" dataType="Integer" parameterType="Control" omitIfEmpty="True" parameterSource="hslSeveridad"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="112" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentes3" connection="cnDisenio" dataSource="SELECT * ,(dbo.ufDiffFechasMCSec(
	(select top 1 FechaFinMov from mc_detalle_incidente_avl where (Id_Incidente =a.Id_Incidente or Id_Incidente = a.IncPadre ) 
		and (ClaveMovimiento =38 OR ClaveMovimiento =49 OR ClaveMovimiento =36 OR ClaveMovimiento =47) and month(FechaCarga) = u.mes and year(FechaCarga) = u.anio order by fechaFinMov desc )  ,	FechaResuelto )) as HorasInvertidas,
(select top 1 FechaFinMov from mc_detalle_incidente_avl 
	where (Id_Incidente =a.Id_Incidente or Id_Incidente = a.IncPadre ) 
	and (ClaveMovimiento =38 OR ClaveMovimiento =49 OR ClaveMovimiento =36 OR ClaveMovimiento =47) 	and month(FechaCarga) = u.mes and year(FechaCarga) = u.anio order by fechaFinMov desc ) as LiberacionAVL
FROM mc_info_incidentes a
		inner join mc_universo_cds u on a.Id_incidente = u.numero  and month(a.FechaCarga ) = u.mes and YEAR(a.fechacarga)= u.anio 
WHERE Id_incidente = '{Id_incidente}' " errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Add/Edit Mc Info Incidentes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Horizontal" templatePageRecord="C:\Program Files (x86)\CodeChargeStudio5//Templates//Record//Horizontal.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_incidentes3">
			<Components>
				<Label id="113" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaResuelto" fieldSource="FechaResuelto" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Resuelto" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentes3FechaResuelto" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="114" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="HorasInvertidas" PathID="mc_info_incidentes3HorasInvertidas" fieldSource="HorasInvertidas">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="115" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="116" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="slblflAVL" PathID="mc_info_incidentes3slblflAVL" fieldSource="LiberacionAVL" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="346" dataType="Text" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
			</SQLParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<PKFields>
			</PKFields>
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
		<Record id="124" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentes4" connection="cnDisenio" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Add/Edit Mc Info Incidentes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Horizontal" templatePageRecord="C:\Program Files (x86)\CodeChargeStudio5//Templates//Record//Horizontal.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_incidentes4">
			<Components>
				<Label id="125" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="FechaEnCurso" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha En Curso" wizardAddNbsp="True" PathID="mc_info_incidentes4FechaEnCurso">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="126" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="FechaResuelto" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Resuelto" wizardAddNbsp="True" format="dd/mm/yyyy HH:mm:ss" PathID="mc_info_incidentes4FechaResuelto" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="127" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="HorasInvertidas" PathID="mc_info_incidentes4HorasInvertidas">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="228"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="128" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="129" dataType="Text" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
			</SQLParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<PKFields>
			</PKFields>
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
		<IncludePage id="282" name="Header" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="46" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentes1" connection="cnDisenio" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Add/Edit Mc Info Incidentes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Horizontal" templatePageRecord="C:\Program Files (x86)\CodeChargeStudio5//Templates//Record//Horizontal.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_incidentes1">
			<Components>
				<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="FechaAsignado" fieldSource="FechaAsignado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Asignado" wizardAddNbsp="True" PathID="mc_info_incidentes1FechaAsignado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="48" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="FechaEnCurso" fieldSource="FechaEnCurso" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha En Curso" wizardAddNbsp="True" PathID="mc_info_incidentes1FechaEnCurso">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="192" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="HorasInvertidas" PathID="mc_info_incidentes1HorasInvertidas">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="241" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="49" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="50" conditionType="Parameter" useIsNull="False" dataType="Text" field="Id_incidente" logicOperator="And" orderNumber="1" parameterSource="Id_incidente" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<PKFields>
			</PKFields>
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
		<Record id="56" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentes2" connection="cnDisenio" dataSource="SELECT mi.*,
	(select top 1 FechaInicioMov from mc_detalle_incidente_avl 
	        where (Id_Incidente=mi.Id_incidente or Id_Incidente = mi.IncPadre )
	        and  MONTH(FechaCarga)= {s_mes_param} and YEAR(FechaCarga) = {s_anio_param} 
	        order by FechaInicioMov   ) as RegistroAVL ,
dbo.ufDiffFechasMCSec(FechaEnCurso,(select top 1 FechaInicioMov from mc_detalle_incidente_avl 
                                           where (Id_Incidente=mi.Id_incidente or Id_Incidente = mi.IncPadre)
                                           and  MONTH(FechaCarga)= {s_mes_param} and YEAR(FechaCarga) = {s_anio_param}                                             
                                          order by FechaInicioMov   ) ) 
as HorasInvertidas
FROM mc_info_incidentes mi
	inner join mc_universo_cds u on u.numero = mi.Id_incidente  and MONTH(mi.FechaCarga)= u.mes and u.anio = YEAR(mi.FechaCarga)
WHERE mi.Id_incidente = '{Id_incidente}' " errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Add/Edit Mc Info Incidentes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Horizontal" templatePageRecord="C:\Program Files (x86)\CodeChargeStudio5//Templates//Record//Horizontal.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_incidentes2">
			<Components>
				<Label id="57" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaEnCurso" fieldSource="FechaEnCurso" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha En Curso" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentes2FechaEnCurso" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="58" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="lblRegistroAVL" PathID="mc_info_incidentes2lblRegistroAVL" fieldSource="RegistroAVL" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="dd/mm/yyyy HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="59" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="HorasInvertidas" PathID="mc_info_incidentes2HorasInvertidas" fieldSource="HorasInvertidas">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="60" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="379"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="342" dataType="Text" designDefaultValue="INC000003432416" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
				<SQLParameter id="343" dataType="Integer" defaultValue="1" parameterSource="s_mes_param" parameterType="URL" variable="s_mes_param"/>
				<SQLParameter id="344" dataType="Integer" defaultValue="2014" parameterSource="s_anio_param" parameterType="URL" variable="s_anio_param"/>
			</SQLParameters>
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
		<Grid id="319" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="5" name="mc_incidentes_relacionado" connection="cnDisenio" dataSource="mc_incidentes_relacionados" pageSizeLimit="25" pageSize="True" wizardCaption=" Incidentes Relacionados" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="Simple" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No hay registros" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="mc_incidentes_relacionado">
			<Components>
				<Sorter id="320" visible="True" name="Sorter_Inc_Secundario" column="Inc_Secundario" wizardCaption="Inc Secundario" wizardSortingType="Simple" wizardControl="Inc_Secundario" wizardAddNbsp="False" PathID="mc_incidentes_relacionadoSorter_Inc_Secundario">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="321" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardSortingType="Simple" wizardControl="Paquete" wizardAddNbsp="False" PathID="mc_incidentes_relacionadoSorter_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="322" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Inc_Secundario" fieldSource="Inc_Secundario" wizardCaption="Inc Secundario" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_incidentes_relacionadoInc_Secundario">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="323" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardCaption="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_incidentes_relacionadoPaquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="324" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="Inicio" wizardPrev="True" wizardPrevText="Anterior" wizardNext="True" wizardNextText="Siguiente" wizardLast="True" wizardLastText="Final" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="de" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="325" conditionType="Parameter" useIsNull="False" dataType="Text" field="Inc_Principal" logicOperator="And" parameterSource="Id_incidente" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="386" tableName="mc_incidentes_relacionados"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="327" fieldName="*"/>
			</Fields>
			<PKFields>
				<PKField id="328" dataType="Integer" fieldName="Id" tableName="mc_incidentes_relacionados"/>
			</PKFields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="227" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Final" actionPage="IncidenteDetalle" errorSummator="Error" wizardFormMethod="post" PathID="Final" wizardCaption="{res:Final}">
			<Components>
				<Label id="229" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="TotalHorasSolucion" PathID="FinalTotalHorasSolucion">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="230" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="250" visible="No" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="FinalImageLink1" linkProperties="{&quot;textSource&quot;:&quot;Images/ayuda.jpg&quot;,&quot;textSourceDB&quot;:&quot;&quot;,&quot;hrefSource&quot;:&quot;&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;0&quot;:{&quot;sourceType&quot;:&quot;URL&quot;,&quot;parameterSource&quot;:&quot;1&quot;,&quot;parameterName&quot;:&quot;export&quot;},&quot;1&quot;:{&quot;sourceType&quot;:&quot;URL&quot;,&quot;parameterSource&quot;:&quot;1&quot;,&quot;parameterName&quot;:&quot;export&quot;},&quot;2&quot;:{&quot;sourceType&quot;:&quot;DBParameter&quot;,&quot;parameterSource&quot;:&quot;export&quot;,&quot;parameterName&quot;:&quot;export&quot;},&quot;length&quot;:3,&quot;objectType&quot;:&quot;linkParameters&quot;}}">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="252" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Label id="260" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="HorasCursoAResuelto" PathID="FinalHorasCursoAResuelto">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="261" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="OnValidate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="249" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="251" eventType="Server"/>
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
		<Record id="347" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_incidentes_reasignacio" connection="cnDisenio" dataSource="mc_incidentes_reasignaciones" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Agregar/Editar Mc Incidentes Reasignaciones " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_incidentes_reasignacio">
			<Components>
				<Button id="349" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Agregar" PathID="mc_incidentes_reasignacioButton_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="350" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_incidentes_reasignacioButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="351" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Borrar" PathID="mc_incidentes_reasignacioButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="352" message="Borrar registro?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="353" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancelar" PathID="mc_incidentes_reasignacioButton_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Label id="355" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="id_incidente" fieldSource="id_incidente" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Id Incidente" wizardAddNbsp="True" PathID="mc_incidentes_reasignacioid_incidente" defaultValue="CCGetParam(&quot;Id_incidente&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="356" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="mes" fieldSource="mes" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Mes" wizardAddNbsp="True" PathID="mc_incidentes_reasignaciomes" defaultValue="CCGetParam(&quot;s_mes_param&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="357" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="anio" fieldSource="anio" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Anio" wizardAddNbsp="True" PathID="mc_incidentes_reasignacioanio" defaultValue="CCGetParam(&quot;s_anio_param&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="358" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="primera_fecha_asignacion" fieldSource="primera_fecha_asignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Primera Fecha Asignacion" caption="Primera Fecha Asignacion" required="True" format="dd/mm/yyyy HH:nn:ss" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_incidentes_reasignacioprimera_fecha_asignacion" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="359" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
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
				<TextBox id="360" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="primera_fecha_encurso" fieldSource="primera_fecha_encurso" wizardIsPassword="False" wizardUseTemplateBlock="False" features="(assigned)" wizardCaption="Primera Fecha Encurso" caption="Primera Fecha Encurso" required="True" format="dd/mm/yyyy HH:nn:ss" unique="False" wizardSize="8" wizardMaxLength="100" PathID="mc_incidentes_reasignacioprimera_fecha_encurso" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="361" show_weekend="True" name="InlineDatePicker2" category="jQuery" enabled="True">
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
				<Label id="362" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="horas_invertidas" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Horas Invertidas" caption="Horas Invertidas" required="False" unique="False" wizardSize="20" wizardMaxLength="20" PathID="mc_incidentes_reasignaciohoras_invertidas" html="False">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="367"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="363" fieldSourceType="DBColumn" dataType="Text" name="H_id_incidente" PathID="mc_incidentes_reasignacioH_id_incidente" fieldSource="id_incidente" defaultValue="CCGetParam(&quot;Id_incidente&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="364" fieldSourceType="DBColumn" dataType="Text" name="H_mes" PathID="mc_incidentes_reasignacioH_mes" defaultValue="CCGetParam(&quot;s_mes_param&quot;)" fieldSource="mes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="365" fieldSourceType="DBColumn" dataType="Text" name="H_anio" PathID="mc_incidentes_reasignacioH_anio" fieldSource="anio" defaultValue="CCGetParam(&quot;s_anio_param&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="366" fieldSourceType="DBColumn" dataType="Float" name="H_horas_invertidas" PathID="mc_incidentes_reasignacioH_horas_invertidas" fieldSource="horas_invertidas">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="392" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="primera_fecha_nuevo" PathID="mc_incidentes_reasignacioprimera_fecha_nuevo" fieldSource="primera_fecha_nuevo" format="dd/mm/yyyy HH:nn:ss" required="True" unique="False" DBFormat="yyyy-mm-dd HH:nn:ss.S" generateDiv="False" features="(assigned)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features>
						<JDateTimePicker id="394" show_weekend="True" name="InlineDatePicker3" category="jQuery" featureNameChanged="No">
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
			</Components>
			<Events>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="377"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="378"/>
					</Actions>
				</Event>
				<Event name="AfterUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="380"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="375" conditionType="Parameter" useIsNull="False" dataType="Text" field="id_incidente" logicOperator="And" orderNumber="1" parameterSource="Id_incidente" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="374" posHeight="168" posLeft="10" posTop="10" posWidth="160" tableName="mc_incidentes_reasignaciones"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="376" fieldName="*"/>
			</Fields>
			<PKFields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="368" field="primera_fecha_asignacion" dataType="Date" parameterType="Control" parameterSource="primera_fecha_asignacion" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S"/>
				<CustomParameter id="369" field="primera_fecha_encurso" dataType="Date" parameterType="Control" parameterSource="primera_fecha_encurso" format="dd/mm/yyyy HH:nn" DBFormat="yyyy-mm-dd HH:nn:ss.S"/>
				<CustomParameter id="370" field="id_incidente" dataType="Text" parameterType="Control" parameterSource="H_id_incidente"/>
				<CustomParameter id="371" field="mes" dataType="Text" parameterType="Control" parameterSource="H_mes"/>
				<CustomParameter id="372" field="anio" dataType="Text" parameterType="Control" parameterSource="H_anio"/>
				<CustomParameter id="373" field="horas_invertidas" dataType="Float" parameterType="Control" parameterSource="H_horas_invertidas"/>
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
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="IncidenteDetalle2_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="IncidenteDetalle2.php" forShow="True" url="IncidenteDetalle2.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="307" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="139"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="140"/>
			</Actions>
		</Event>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="247"/>
			</Actions>
		</Event>
		<Event name="AfterInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="253"/>
			</Actions>
		</Event>
	</Events>
</Page>
