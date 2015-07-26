<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" accessDeniedPage="Login.ccp">
	<Components>
		<IncludePage id="27" name="Header" PathID="Header" page="Header.ccp">
			<Components/>
			<Events/>
			<Features/>
		</IncludePage>
		<Record id="20" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentes" connection="cnDisenio" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Add/Edit Mc Info Incidentes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Horizontal" templatePageRecord="C:\Program Files (x86)\CodeChargeStudio5//Templates//Record//Horizontal.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_incidentes" editableComponentTypeString="Record" dataSource=" SELECT i.*, p.Nombre ,p.Id_Proveedor
 FROM mc_info_incidentes i 
 	inner join mc_universo_cds u on i.Id_incidente = u.numero  inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor 
 	and month(fechacarga)= u.mes and year(FechaCarga)= u.anio 
where u.tipo ='IN'
AND i.Id_incidente = '{Id_incidente}' ">
			<Components>
				<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Id_incidente" fieldSource="Id_incidente" PathID="mc_info_incidentesId_incidente">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="slCDS" fieldSource="Nombre" PathID="mc_info_incidentesslCDS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="30" fieldSourceType="DBColumn" dataType="Text" name="shId_Proveedor" PathID="mc_info_incidentesshId_Proveedor" fieldSource="Id_Proveedor">
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
				<Label id="31" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaResuelto" fieldSource="FechaResuelto" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Resuelto" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentesFechaResuelto" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="32" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaCerrado" fieldSource="FechaCerrado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Cerrado" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentesFechaCerrado" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Dictamen" PathID="mc_info_incidentesDictamen" fieldSource="Dictamen">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="34" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="slHistorial" PathID="mc_info_incidentesslHistorial" fieldSource="Historial">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Image1" PathID="mc_info_incidentesImage1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="36"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="37" dataType="Text" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
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
		<Record id="38" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentes1" connection="cnDisenio" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Add/Edit Mc Info Incidentes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Horizontal" templatePageRecord="C:\Program Files (x86)\CodeChargeStudio5//Templates//Record//Horizontal.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_incidentes1">
			<Components>
				<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="FechaAsignado" fieldSource="FechaAsignado" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Asignado" wizardAddNbsp="True" PathID="mc_info_incidentes1FechaAsignado">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="FechaEnCurso" fieldSource="FechaEnCurso" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha En Curso" wizardAddNbsp="True" PathID="mc_info_incidentes1FechaEnCurso">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="41" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="HorasInvertidas" PathID="mc_info_incidentes1HorasInvertidas">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="42"/>
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
						<Action actionName="Custom Code" actionCategory="General" id="43"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="44" conditionType="Parameter" useIsNull="False" dataType="Text" field="Id_incidente" logicOperator="And" orderNumber="1" parameterSource="Id_incidente" parameterType="URL" searchConditionType="Equal"/>
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
		<Record id="45" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_c_aplicacion" connection="cnDisenio" dataSource="SELECT 
(select rtrim(valor) from mc_parametros where parametro= 
	case when a.severidad = 0 then 'TASeveridad0Segundos' when a.severidad =1 then 'TASeveridad1Segundos' 
		 when a.severidad = 2 then 'TASeveridad2Segundos' when a.severidad =3 then 'TASeveridad3Segundos'	end ) as TiempoAtencion,
(select valor from mc_parametros where parametro= 
	case when a.severidad = 0 then 'TSSeveridad0Segundos' when a.severidad =1 then 'TSSeveridad1Segundos' 
		 when a.severidad = 2 then 'TSSeveridad2Segundos' when a.severidad =3 then 'TSSeveridad3Segundos'	end ) as TiempoSolucion,
*
FROM mc_c_aplicacion a inner join mc_info_incidentes b 
on rtrim(b.Aplicacion)=rtrim(a.Descripcion)
WHERE Id_incidente = '{Id_incidente}' " errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id" encryptPasswordField="False" wizardUseInterVariables="True" pkIsAutoincrement="True" wizardCaption="{res:mc_c_aplicacion_RecordForm}" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_c_aplicacion">
			<Components>
				<Label id="46" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="descripcion" fieldSource="descripcion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:descripcion}" wizardAddNbsp="True" PathID="mc_c_aplicaciondescripcion">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="severidad" fieldSource="severidad" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="{res:severidad}" wizardAddNbsp="True" PathID="mc_c_aplicacionseveridad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="48" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lblTiempoAtencion" PathID="mc_c_aplicacionlblTiempoAtencion" fieldSource="TiempoAtencion">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="49"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="50" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="lblTiempoSolucion" PathID="mc_c_aplicacionlblTiempoSolucion" fieldSource="TiempoSolucion">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="51"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="52" dataType="Text" designDefaultValue="INC000003156314" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
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
		<Record id="53" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentes2" connection="cnDisenio" dataSource="SELECT mi.*,
	(select top 1 FechaInicioMov from mc_detalle_incidente_avl 
	        where (Id_Incidente=mi.Id_incidente or Id_Incidente = mi.IncPadre ) 
	        order by FechaInicioMov   ) as RegistroAVL ,
dbo.ufDiffFechasMCSec(FechaEnCurso,(select top 1 FechaInicioMov from mc_detalle_incidente_avl 
                                           where (Id_Incidente=mi.Id_incidente or Id_Incidente = mi.IncPadre ) 
                                          order by FechaInicioMov   ) ) 
as HorasInvertidas
FROM mc_info_incidentes mi
	inner join mc_universo_cds u on u.numero = mi.Id_incidente  and MONTH(mi.FechaCarga)= u.mes and u.anio = YEAR(mi.FechaCarga)
WHERE mi.Id_incidente = '{Id_incidente}' " errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Add/Edit Mc Info Incidentes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Horizontal" templatePageRecord="C:\Program Files (x86)\CodeChargeStudio5//Templates//Record//Horizontal.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_incidentes2">
			<Components>
				<Label id="54" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaEnCurso" fieldSource="FechaEnCurso" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha En Curso" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentes2FechaEnCurso" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="55" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="lblRegistroAVL" PathID="mc_info_incidentes2lblRegistroAVL" fieldSource="RegistroAVL" DBFormat="yyyy-mm-dd HH:nn:ss.S" format="dd/mm/yyyy HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="56" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="HorasInvertidas" PathID="mc_info_incidentes2HorasInvertidas" fieldSource="HorasInvertidas">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="57"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="58" dataType="Text" designDefaultValue="INC000003432416" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
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
		<Grid id="59" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="mc_detalle_incidente_avl" connection="cnDisenio" dataSource="

select 	det.ClaveMovimiento, det.DescMovimiento , det.FechaInicioMov, det.FechaFinMov, det.Paquete    
	, dbo.ufDiffFechasMCSec(i.FechaEnCurso,i.FechaResuelto) TiempoSolucionRmdy
	, r.LiberacionAVL , r.CountPaquete, t.TotalSecPaquete , s.TotalHoras  
, dbo.ufDiffFechasMCSec(det.FechaInicioMov,  det.FechaFinMov) HorasInvertidas
from mc_info_incidentes i 
	inner join mc_universo_cds u on i.Id_incidente = u.numero  and month(i.FechaCarga ) = u.mes and YEAR(fechacarga)= u.anio 
	inner join mc_detalle_incidente_avl det on (det.Id_Incidente = i.Id_incidente or det.Id_Incidente = i.IncPadre )
		and month(det.FechaCarga ) = u.mes and YEAR(det.fechacarga)= u.anio 
	inner join mc_c_movimiento m on m.ClaveMovimiento = det.ClaveMovimiento 
	left join (select id_incidente, paquete, FechaCarga, Min(FechaFinMov) LiberacionAVL, count(FechaFinMov)  CountPaquete
			from mc_detalle_incidente_avl det 
				where ClaveMovimiento ='38'
				group by id_incidente, Paquete, FechaCarga  
	) as r on r.Id_Incidente = det.Id_Incidente and r.Paquete = det.Paquete and MONTH(r.FechaCarga )= u.mes  and YEAR(r.FechaCarga )= u.anio 
	left join (select id_incidente, paquete, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalSecPaquete
			from mc_detalle_incidente_avl dett
				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion=1 
				group by id_incidente, Paquete, FechaCarga  
	) as t on t.Id_Incidente = det.Id_Incidente and t.Paquete = det.Paquete and MONTH(t.FechaCarga )= u.mes  and YEAR(t.FechaCarga )= u.anio 
	left join (select id_incidente, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalHoras
			from mc_detalle_incidente_avl dett
				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion=1 
				group by id_incidente, FechaCarga  
	) as s on s.Id_Incidente = det.Id_Incidente and MONTH(s.FechaCarga )= u.mes and YEAR(s.FechaCarga )= u.anio 
where i.id_incidente = '{Id_incidente}'" pageSizeLimit="100" pageSize="True" wizardCaption="List of Mc Detalle Incidente Avl " wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Simple" wizardUseSearch="False" wizardAddNbsp="True" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="False" gridExtendedHTML="False" PathID="mc_detalle_incidente_avl">
			<Components>
				<Sorter id="60" visible="True" name="Sorter_ClaveMovimiento" column="ClaveMovimiento" wizardCaption="Clave Movimiento" wizardSortingType="SimpleDir" wizardControl="ClaveMovimiento" wizardAddNbsp="False" PathID="mc_detalle_incidente_avlSorter_ClaveMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="61" visible="True" name="Sorter_DescMovimiento" column="DescMovimiento" wizardCaption="Desc Movimiento" wizardSortingType="SimpleDir" wizardControl="DescMovimiento" wizardAddNbsp="False" PathID="mc_detalle_incidente_avlSorter_DescMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="62" visible="True" name="Sorter_FechaInicioMov" column="FechaInicioMov" wizardCaption="Fecha Inicio Mov" wizardSortingType="SimpleDir" wizardControl="FechaInicioMov" wizardAddNbsp="False" PathID="mc_detalle_incidente_avlSorter_FechaInicioMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="63" visible="True" name="Sorter_FechaFinMov" column="FechaFinMov" wizardCaption="Fecha Fin Mov" wizardSortingType="SimpleDir" wizardControl="FechaFinMov" wizardAddNbsp="False" PathID="mc_detalle_incidente_avlSorter_FechaFinMov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="64" visible="True" name="Sorter_Paquete" column="Paquete" wizardCaption="Paquete" wizardSortingType="SimpleDir" wizardControl="Paquete" wizardAddNbsp="False" PathID="mc_detalle_incidente_avlSorter_Paquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Label id="65" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="ClaveMovimiento" fieldSource="ClaveMovimiento" wizardCaption="Clave Movimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="mc_detalle_incidente_avlClaveMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="66" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="DescMovimiento" fieldSource="DescMovimiento" wizardCaption="Desc Movimiento" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_detalle_incidente_avlDescMovimiento">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="67" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaInicioMov" fieldSource="FechaInicioMov" wizardCaption="Fecha Inicio Mov" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_detalle_incidente_avlFechaInicioMov" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="68" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaFinMov" fieldSource="FechaFinMov" wizardCaption="Fecha Fin Mov" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_detalle_incidente_avlFechaFinMov" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="69" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Simple" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Simple" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="{ccs_style}">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="70" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="Horas" PathID="mc_detalle_incidente_avlHoras" fieldSource="HorasInvertidas">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="71"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Panel id="72" visible="True" generateDiv="False" name="Panel1" PathID="mc_detalle_incidente_avlPanel1">
					<Components>
						<Label id="73" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="Paquete" fieldSource="Paquete" wizardCaption="Paquete" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="mc_detalle_incidente_avlPanel1Paquete">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="74" eventType="Server"/>
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
				<Panel id="75" visible="True" generateDiv="False" name="Panel2" PathID="mc_detalle_incidente_avlPanel2">
					<Components>
						<Label id="76" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="sflAVLG" PathID="mc_detalle_incidente_avlPanel2sflAVLG" fieldSource="LiberacionAVL" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
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
				<Label id="77" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="TotalHoras" PathID="mc_detalle_incidente_avlTotalHoras" fieldSource="TotalHoras">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="78"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="79" fieldSourceType="DBColumn" dataType="Text" name="sTotalSecPaquete" PathID="mc_detalle_incidente_avlsTotalSecPaquete" fieldSource="TotalSecPaquete">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="80" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="81"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="82"/>
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
				<SQLParameter id="83" dataType="Text" designDefaultValue="INC000003376478" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="84" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentes3" connection="cnDisenio" dataSource="SELECT * ,(dbo.ufDiffFechasMCSec(
	(select top 1 FechaFinMov from mc_detalle_incidente_avl where (Id_Incidente =a.Id_Incidente or Id_Incidente = a.IncPadre ) 
		and ClaveMovimiento =38 and month(FechaCarga) = u.mes and year(FechaCarga) = u.anio order by fechaFinMov desc )  ,	FechaResuelto )) as HorasInvertidas,
(select top 1 FechaFinMov from mc_detalle_incidente_avl 
	where (Id_Incidente =a.Id_Incidente or Id_Incidente = a.IncPadre ) 
	and ClaveMovimiento =38 	and month(FechaCarga) = u.mes and year(FechaCarga) = u.anio order by fechaFinMov desc ) as LiberacionAVL
FROM mc_info_incidentes a
		inner join mc_universo_cds u on a.Id_incidente = u.numero  and month(a.FechaCarga ) = u.mes and YEAR(a.fechacarga)= u.anio 
WHERE Id_incidente = '{Id_incidente}' " errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Add/Edit Mc Info Incidentes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Horizontal" templatePageRecord="C:\Program Files (x86)\CodeChargeStudio5//Templates//Record//Horizontal.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_incidentes3">
			<Components>
				<Label id="85" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="FechaResuelto" fieldSource="FechaResuelto" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Resuelto" wizardAddNbsp="True" format="dd/mm/yyyy HH:nn:ss" PathID="mc_info_incidentes3FechaResuelto" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="86" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="HorasInvertidas" PathID="mc_info_incidentes3HorasInvertidas" fieldSource="HorasInvertidas">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="87"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="88" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="slblflAVL" PathID="mc_info_incidentes3slblflAVL" fieldSource="LiberacionAVL" format="dd/mm/yyyy HH:nn:ss" DBFormat="yyyy-mm-dd HH:nn:ss.S">
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
				<SQLParameter id="89" dataType="Text" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
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
		<Record id="90" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_info_incidentes4" connection="cnDisenio" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="Id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Add/Edit Mc Info Incidentes " wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="False" recordDirection="Horizontal" templatePageRecord="C:\Program Files (x86)\CodeChargeStudio5//Templates//Record//Horizontal.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="mc_info_incidentes4">
			<Components>
				<Label id="91" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="FechaEnCurso" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha En Curso" wizardAddNbsp="True" PathID="mc_info_incidentes4FechaEnCurso">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="92" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="FechaResuelto" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Fecha Resuelto" wizardAddNbsp="True" format="dd/mm/yyyy HH:mm:ss" PathID="mc_info_incidentes4FechaResuelto" DBFormat="yyyy-mm-dd HH:nn:ss.S">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="93" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="HorasInvertidas" PathID="mc_info_incidentes4HorasInvertidas">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="94"/>
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
						<Action actionName="Custom Code" actionCategory="General" id="95"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="96" dataType="Text" parameterSource="Id_incidente" parameterType="URL" variable="Id_incidente"/>
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
		<Record id="97" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Final" actionPage="IncidenteDetalle" errorSummator="Error" wizardFormMethod="post" PathID="Final" wizardCaption="{res:Final}">
			<Components>
				<Label id="98" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="TotalHorasSolucion" PathID="FinalTotalHorasSolucion">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="99"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<ImageLink id="100" visible="No" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="FinalImageLink1" linkProperties="{&quot;textSource&quot;:&quot;Images/ayuda.jpg&quot;,&quot;textSourceDB&quot;:&quot;&quot;,&quot;hrefSource&quot;:&quot;&quot;,&quot;hrefSourceDB&quot;:&quot;&quot;,&quot;title&quot;:&quot;&quot;,&quot;target&quot;:&quot;&quot;,&quot;name&quot;:&quot;&quot;,&quot;linkParameters&quot;:{&quot;0&quot;:{&quot;sourceType&quot;:&quot;URL&quot;,&quot;parameterSource&quot;:&quot;1&quot;,&quot;parameterName&quot;:&quot;export&quot;},&quot;1&quot;:{&quot;sourceType&quot;:&quot;URL&quot;,&quot;parameterSource&quot;:&quot;1&quot;,&quot;parameterName&quot;:&quot;export&quot;},&quot;2&quot;:{&quot;sourceType&quot;:&quot;DBParameter&quot;,&quot;parameterSource&quot;:&quot;export&quot;,&quot;parameterName&quot;:&quot;export&quot;},&quot;length&quot;:3,&quot;objectType&quot;:&quot;linkParameters&quot;}}">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="101"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Label id="102" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="HorasCursoAResuelto" PathID="FinalHorasCursoAResuelto">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="103"/>
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
						<Action actionName="Custom Code" actionCategory="General" id="104" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="105"/>
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
		<Record id="106" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="mc_calificacion_incidente" connection="cnDisenio" dataSource="mc_calificacion_incidentes_SAT" errorSummator="Error" allowCancel="False" recordDeleteConfirmation="False" buttonsType="button" wizardRecordKey="id_incidente" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="False" wizardCaption="Calificar Incidente" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" recordAddTemplatePanel="False" PathID="mc_calificacion_incidente">
			<Components>
				<Button id="108" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Enviar" PathID="mc_calificacion_incidenteButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="110" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="Cumple_DISP_SOPORTE" fieldSource="Cumple_DISP_SOPORTE" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple DISP SOPORTE" caption="Disponibilidad del Personal de Soporte" required="False" unique="False" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_incidenteCumple_DISP_SOPORTE" dataSource="0;No Cumple;1;Cumple">
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
				</Hidden>
<ListBox id="111" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="Cumple_Inc_TiempoSolucion" fieldSource="Cumple_Inc_TiempoSolucion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Inc Tiempo Solucion" caption="Tiempo Solucion" required="False" unique="False" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_incidenteCumple_Inc_TiempoSolucion" dataSource="0;No Cumple;1;Cumple">
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
				<ListBox id="112" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Integer" returnValueType="Number" name="Cumple_Inc_TiempoAsignacion" fieldSource="Cumple_Inc_TiempoAsignacion" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Cumple Inc Tiempo Asignacion" caption="Tiempo Asignacion" required="False" unique="False" wizardEmptyCaption="Seleccionar Valor" PathID="mc_calificacion_incidenteCumple_Inc_TiempoAsignacion" dataSource="0;No Cumple;1;Cumple">
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
				<TextArea id="113" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Obs_Manuales" fieldSource="Obs_Manuales" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Obs Manuales" caption="Obs Manuales" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="mc_calificacion_incidenteObs_Manuales">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="114" fieldSourceType="DBColumn" dataType="Integer" name="severidad" fieldSource="severidad" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Severidad" caption="Severidad" required="False" unique="False" PathID="mc_calificacion_incidenteseveridad">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="115" fieldSourceType="DBColumn" dataType="Integer" name="MesReporte" fieldSource="MesReporte" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Mes Reporte" caption="Mes Reporte" required="True" unique="False" PathID="mc_calificacion_incidenteMesReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="116" fieldSourceType="DBColumn" dataType="Integer" name="AnioReporte" fieldSource="AnioReporte" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Anio Reporte" caption="Anio Reporte" required="True" unique="False" PathID="mc_calificacion_incidenteAnioReporte">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="117" fieldSourceType="DBColumn" dataType="Integer" name="id_servicio" fieldSource="id_servicio" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Id Servicio" caption="Id Servicio" required="False" unique="False" PathID="mc_calificacion_incidenteid_servicio">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="118" fieldSourceType="DBColumn" dataType="Integer" name="id_proveedor" fieldSource="id_proveedor" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Id Proveedor" caption="Id Proveedor" required="False" unique="False" PathID="mc_calificacion_incidenteid_proveedor">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="119" fieldSourceType="DBColumn" dataType="Date" name="FechaUltMod" fieldSource="FechaUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Fecha Ult Mod" caption="Fecha Ult Mod" required="False" format="ShortDate" unique="False" PathID="mc_calificacion_incidenteFechaUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="120" fieldSourceType="DBColumn" dataType="Text" name="UsrUltMod" fieldSource="UsrUltMod" wizardIsPassword="False" wizardUseTemplateBlock="False" visible="Yes" wizardCaption="Usr Ult Mod" caption="Usr Ult Mod" required="False" unique="False" PathID="mc_calificacion_incidenteUsrUltMod">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="128" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ObsCAPC" PathID="mc_calificacion_incidenteObsCAPC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="127"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="125" conditionType="Parameter" useIsNull="False" dataType="Text" field="id_incidente" logicOperator="And" orderNumber="1" parameterSource="Id_incidente" parameterType="URL" searchConditionType="Equal"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="124" posHeight="180" posLeft="10" posTop="10" posWidth="160" tableName="mc_calificacion_incidentes_SAT"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="126" fieldName="*"/>
			</Fields>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="CalificaIncidenteSAT_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="CalificaIncidenteSAT.php" forShow="True" url="CalificaIncidenteSAT.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
