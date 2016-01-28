<?php
//BindEvents Method @1-7C6F9B2F
function BindEvents()
{
    global $mc_detalle_incidente_avl;
    global $slAnterior;
    global $slSiguiente;
    global $mc_info_incidentes;
    global $mc_calificacion_incidente;
    global $mc_info_incidentes3;
    global $mc_info_incidentes4;
    global $mc_info_incidentes1;
    global $mc_info_incidentes2;
    global $Final;
    global $mc_incidentes_reasignacio;
    global $CCSEvents;
    $mc_detalle_incidente_avl->Horas->CCSEvents["BeforeShow"] = "mc_detalle_incidente_avl_Horas_BeforeShow";
    $mc_detalle_incidente_avl->Paquete->CCSEvents["BeforeShow"] = "mc_detalle_incidente_avl_Paquete_BeforeShow";
    $mc_detalle_incidente_avl->TotalHoras->CCSEvents["BeforeShow"] = "mc_detalle_incidente_avl_TotalHoras_BeforeShow";
    $mc_detalle_incidente_avl->CCSEvents["BeforeShow"] = "mc_detalle_incidente_avl_BeforeShow";
    $mc_detalle_incidente_avl->CCSEvents["BeforeShowRow"] = "mc_detalle_incidente_avl_BeforeShowRow";
    $mc_detalle_incidente_avl->ds->CCSEvents["AfterExecuteSelect"] = "mc_detalle_incidente_avl_ds_AfterExecuteSelect";
    $slAnterior->CCSEvents["BeforeShow"] = "slAnterior_BeforeShow";
    $slSiguiente->CCSEvents["BeforeShow"] = "slSiguiente_BeforeShow";
    $mc_info_incidentes->CCSEvents["BeforeShow"] = "mc_info_incidentes_BeforeShow";
    $mc_calificacion_incidente->id_servicio->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_id_servicio_BeforeShow";
    $mc_calificacion_incidente->Cumple_Inc_TiempoAsignacion->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_Cumple_Inc_TiempoAsignacion_BeforeShow";
    $mc_calificacion_incidente->Aplicacion->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_Aplicacion_BeforeShow";
    $mc_calificacion_incidente->shId_Incidente->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_shId_Incidente_BeforeShow";
    $mc_calificacion_incidente->shDescartar->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_shDescartar_BeforeShow";
    $mc_calificacion_incidente->shMes->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_shMes_BeforeShow";
    $mc_calificacion_incidente->shAnio->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_shAnio_BeforeShow";
    $mc_calificacion_incidente->shIdProveedor->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_shIdProveedor_BeforeShow";
    $mc_calificacion_incidente->slSeveridad->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_slSeveridad_BeforeShow";
    $mc_calificacion_incidente->CheckBox1->TotalHorasSolucion->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_CheckBox1_TotalHorasSolucion_BeforeShow";
    $mc_calificacion_incidente->CheckBox1->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_CheckBox1_BeforeShow";
    $mc_calificacion_incidente->lblCalificado->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_lblCalificado_BeforeShow";
    $mc_calificacion_incidente->FechaUltMod->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_FechaUltMod_BeforeShow";
    $mc_calificacion_incidente->txtCumple_Inc_TiempoAsignacion->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_txtCumple_Inc_TiempoAsignacion_BeforeShow";
    $mc_calificacion_incidente->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_BeforeShow";
    $mc_calificacion_incidente->CCSEvents["OnValidate"] = "mc_calificacion_incidente_OnValidate";
    $mc_calificacion_incidente->CCSEvents["BeforeUpdate"] = "mc_calificacion_incidente_BeforeUpdate";
    $mc_calificacion_incidente->CCSEvents["BeforeInsert"] = "mc_calificacion_incidente_BeforeInsert";
    $mc_info_incidentes3->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes3_HorasInvertidas_BeforeShow";
    $mc_info_incidentes4->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes4_HorasInvertidas_BeforeShow";
    $mc_info_incidentes4->CCSEvents["BeforeShow"] = "mc_info_incidentes4_BeforeShow";
    $mc_info_incidentes1->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes1_HorasInvertidas_BeforeShow";
    $mc_info_incidentes1->CCSEvents["BeforeShow"] = "mc_info_incidentes1_BeforeShow";
    $mc_info_incidentes2->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes2_HorasInvertidas_BeforeShow";
    $mc_info_incidentes2->CCSEvents["BeforeShow"] = "mc_info_incidentes2_BeforeShow";
    $Final->TotalHorasSolucion->CCSEvents["BeforeShow"] = "Final_TotalHorasSolucion_BeforeShow";
    $Final->ImageLink1->CCSEvents["BeforeShow"] = "Final_ImageLink1_BeforeShow";
    $Final->HorasCursoAResuelto->CCSEvents["BeforeShow"] = "Final_HorasCursoAResuelto_BeforeShow";
    $Final->CCSEvents["OnValidate"] = "Final_OnValidate";
    $Final->CCSEvents["BeforeShow"] = "Final_BeforeShow";
    $mc_incidentes_reasignacio->primera_fecha_asignacion->CCSEvents["BeforeShow"] = "mc_incidentes_reasignacio_primera_fecha_asignacion_BeforeShow";
    $mc_incidentes_reasignacio->primera_fecha_encurso->CCSEvents["BeforeShow"] = "mc_incidentes_reasignacio_primera_fecha_encurso_BeforeShow";
    $mc_incidentes_reasignacio->horas_invertidas->CCSEvents["BeforeShow"] = "mc_incidentes_reasignacio_horas_invertidas_BeforeShow";
    $mc_incidentes_reasignacio->ds->CCSEvents["AfterExecuteInsert"] = "mc_incidentes_reasignacio_ds_AfterExecuteInsert";
    $mc_incidentes_reasignacio->CCSEvents["BeforeShow"] = "mc_incidentes_reasignacio_BeforeShow";
    $mc_incidentes_reasignacio->CCSEvents["AfterUpdate"] = "mc_incidentes_reasignacio_AfterUpdate";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
}
//End BindEvents Method


//mc_detalle_incidente_avl_Horas_BeforeShow @79-5AC19451
function mc_detalle_incidente_avl_Horas_BeforeShow(& $sender)
{
    $mc_detalle_incidente_avl_Horas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_Horas_BeforeShow

//Custom Code @80-2A29BDB7
// -------------------------
    global $Horas;
    global $Minutos;
	global $Segundos;
	
	if($mc_detalle_incidente_avl->Horas->GetValue()!='N/A'){
		$Minutos=floor(($mc_detalle_incidente_avl->Horas->GetValue() / 60)%60);
		$Segundos=($mc_detalle_incidente_avl->Horas->GetValue() % 60);	
		$Horas= floor((($mc_detalle_incidente_avl->Horas->GetValue()) / 60)/60);

		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}

		if ($Segundos<10){
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
			if ( $Minutos<10) {
				$mc_detalle_incidente_avl->Horas->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
			} else {
				$mc_detalle_incidente_avl->Horas->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
			}
		} else {
			if ( $Minutos<10) {
				$mc_detalle_incidente_avl->Horas->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
			} else {
				$mc_detalle_incidente_avl->Horas->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}
	} else {

	}
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_Horas_BeforeShow @79-B16B6D7D
    return $mc_detalle_incidente_avl_Horas_BeforeShow;
}
//End Close mc_detalle_incidente_avl_Horas_BeforeShow

//mc_detalle_incidente_avl_Paquete_BeforeShow @82-BFE97FE9
function mc_detalle_incidente_avl_Paquete_BeforeShow(& $sender)
{
    $mc_detalle_incidente_avl_Paquete_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_Paquete_BeforeShow

//Custom Code @83-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_Paquete_BeforeShow @82-25F20F08
    return $mc_detalle_incidente_avl_Paquete_BeforeShow;
}
//End Close mc_detalle_incidente_avl_Paquete_BeforeShow

//mc_detalle_incidente_avl_TotalHoras_BeforeShow @195-2C098D34
function mc_detalle_incidente_avl_TotalHoras_BeforeShow(& $sender)
{
    $mc_detalle_incidente_avl_TotalHoras_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_TotalHoras_BeforeShow

//Custom Code @196-2A29BDB7
// -------------------------
	global $TotalHoras;
	global $TiempoPaquetes;

	$TotalHoras=$mc_detalle_incidente_avl->TotalHoras->GetValue();

	global $SegundosTotalesSolucion;
	$SegundosTotalesSolucion=$SegundosTotalesSolucion+$mc_detalle_incidente_avl->TotalHoras->GetValue();

	if ($mc_detalle_incidente_avl->TotalHoras->GetValue()>0) {

////////
	    global $Horas;
	    global $Minutos;
		global $Segundos;
		
		$Minutos=floor(($mc_detalle_incidente_avl->TotalHoras->GetValue() / 60)%60);
		
		$Segundos=($mc_detalle_incidente_avl->TotalHoras->GetValue() % 60);
		
		
		$Horas= floor((($mc_detalle_incidente_avl->TotalHoras->GetValue()) / 60)/60);
	
		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}
		if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
		if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$mc_detalle_incidente_avl->TotalHoras->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$mc_detalle_incidente_avl->TotalHoras->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$mc_detalle_incidente_avl->TotalHoras->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$mc_detalle_incidente_avl->TotalHoras->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}

	} else {
		$mc_detalle_incidente_avl->TotalHoras->SetValue('N/A');
	}

	
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_TotalHoras_BeforeShow @195-E6F13F37
    return $mc_detalle_incidente_avl_TotalHoras_BeforeShow;
}
//End Close mc_detalle_incidente_avl_TotalHoras_BeforeShow

//mc_detalle_incidente_avl_BeforeShow @68-E896C520
function mc_detalle_incidente_avl_BeforeShow(& $sender)
{
    $mc_detalle_incidente_avl_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_BeforeShow

//Custom Code @86-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_BeforeShow @68-9F51EFBD
    return $mc_detalle_incidente_avl_BeforeShow;
}
//End Close mc_detalle_incidente_avl_BeforeShow

//mc_detalle_incidente_avl_BeforeShowRow @68-C730B84D
function mc_detalle_incidente_avl_BeforeShowRow(& $sender)
{
    $mc_detalle_incidente_avl_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_BeforeShowRow

//Custom Code @87-2A29BDB7
// -------------------------
    global $sPaquete;

	if ($sPaquete == $mc_detalle_incidente_avl->Paquete->GetValue()){
		$mc_detalle_incidente_avl->Panel1->Visible=false;
		$mc_detalle_incidente_avl->Panel2->Visible=false;
	} else {
	    global $Tpl;
		$Tpl->SetVar("iRows",$mc_detalle_incidente_avl->DataSource->f("CountPaquete"));
	   	$sPaquete = $mc_detalle_incidente_avl->Paquete->GetValue();
	   	$mc_detalle_incidente_avl->Panel1->Visible=true;
	   	$mc_detalle_incidente_avl->Panel2->Visible=true;
	}
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_BeforeShowRow @68-DAC72CCB
    return $mc_detalle_incidente_avl_BeforeShowRow;
}
//End Close mc_detalle_incidente_avl_BeforeShowRow

//mc_detalle_incidente_avl_ds_AfterExecuteSelect @68-C3EC0330
function mc_detalle_incidente_avl_ds_AfterExecuteSelect(& $sender)
{
    $mc_detalle_incidente_avl_ds_AfterExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_ds_AfterExecuteSelect

//Custom Code @88-2A29BDB7
// -------------------------
	if($mc_detalle_incidente_avl->DataSource->RecordsCount ==0){
		$mc_detalle_incidente_avl->DataSource->query("select ClaveMovimiento, Descripcion DescMovimiento, " .
			" NULL FechaInicioMov, NULL FechaFinMov, NULL Paquete, NULL  TiempoSolucionRmdy, NULL  LiberacionAVL , " .
			" NULL  CountPaquete, NULL TotalSecPaquete , NULL TotalHoras , 'N/A' HorasInvertidas " .
			" from mc_c_movimiento  where clavemovimiento in (16, 701, 702, 704, 705) ");
	}
	
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_ds_AfterExecuteSelect @68-C1CE9C05
    return $mc_detalle_incidente_avl_ds_AfterExecuteSelect;
}
//End Close mc_detalle_incidente_avl_ds_AfterExecuteSelect

//slAnterior_BeforeShow @132-B7AFA212
function slAnterior_BeforeShow(& $sender)
{
    $slAnterior_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $slAnterior; //Compatibility
//End slAnterior_BeforeShow

//Custom Code @138-2A29BDB7
// -------------------------
	global $miArray;
	global $claveSiguiente;
	global $claveAnterior;
			

	if ($claveAnterior>0) 
	{ 	
   			$Container->slSiguiente->SetValue($miArray[$claveSiguiente]);
		$Container->slAnterior->SetValue($miArray[$claveAnterior]);

   		$RedirectAnterior =  "IncidenteDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id_incidente"),"ccsForm"),"Id_incidente",$miArray[$claveAnterior]);
	$Container->slAnterior->SetLink($RedirectAnterior);

	}
	else
	{
   		$RedirectAnterior =  "IncidentesLista.php?" . CCGetQueryString("QueryString","");
		$Container->slAnterior->SetValue("Lista incidentes");
		$Container->slAnterior->SetLink($RedirectAnterior);

	}

   	$RedirectSiguiente =  "IncidenteDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id_incidente"),"ccsForm"),"Id_incidente",$miArray[$claveSiguiente]);


	$Container->slSiguiente->SetLink($RedirectSiguiente);

    // Write your own code here.
// -------------------------
//End Custom Code

//Close slAnterior_BeforeShow @132-AA25483D
    return $slAnterior_BeforeShow;
}
//End Close slAnterior_BeforeShow

//slSiguiente_BeforeShow @130-E6C984BA
function slSiguiente_BeforeShow(& $sender)
{
    $slSiguiente_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $slSiguiente; //Compatibility
//End slSiguiente_BeforeShow

//Custom Code @131-2A29BDB7
// -------------------------
	global $miArray;
	global $claveSiguiente;
	global $claveAnterior;
	
	if($claveAnterior >=0){		
		$Container->slSiguiente->SetValue($miArray[$claveSiguiente]);
		$Container->slAnterior->SetValue($miArray[$claveAnterior]);
	
   		$RedirectAnterior =  "IncidenteDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id_incidente"),"ccsForm"),"Id_incidente",$miArray[$claveAnterior]);
   		$RedirectSiguiente =  "IncidenteDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id_incidente"),"ccsForm"),"Id_incidente",$miArray[$claveSiguiente]);
   		
   		$Container->slAnterior->SetLink($RedirectAnterior);
		$Container->slSiguiente->SetLink($RedirectSiguiente);		
	} else {
		$Container->slAnterior->Visible=false;
		$Container->slSiguiente->Visible=false;	
	}

// -------------------------
//End Custom Code

//Close slSiguiente_BeforeShow @130-29A2B30F
    return $slSiguiente_BeforeShow;
}
//End Close slSiguiente_BeforeShow

//mc_info_incidentes_BeforeShow @20-64F4663D
function mc_info_incidentes_BeforeShow(& $sender)
{
    $mc_info_incidentes_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_BeforeShow

//Custom Code @31-2A29BDB7
// -------------------------		
		global $Servicio;
		global $Aplicacion;
		
		global $IdIncidente;
		global $IdProveedor;		
		
		$Servicio= $mc_info_incidentes->ServicioNegocio->GetValue();
		$Aplicacion= $mc_info_incidentes->Aplicacion->GetValue();
		$IdIncidente=$mc_info_incidentes->Id_incidente->GetValue();
		$IdProveedor=$mc_info_incidentes->shId_Proveedor->GetValue();

		
		global $FechaAsignado;
		global $FechaenCurso;
		global $FechaResuelto;
		
		$FechaAsignado= CCFormatDate($mc_info_incidentes->DataSource->FechaAsignado->GetValue(), array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss"));
		$FechaenCurso=CCFormatDate($mc_info_incidentes->DataSource->FechaEnCurso->GetValue(), array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss"));
		$FechaResuelto=CCFormatDate($mc_info_incidentes->DataSource->FechaResuelto->GetValue(), array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss"));
		$secs = $mc_info_incidentes->TiempoAtencion->GetValue();
		$horas =$secs/3600;
		$minutos =($secs % 3600)/60  ;
		$segundos =(($secs % 3600)%60);
		$mc_info_incidentes->TiempoAtencion->SetValue( (($horas>9)?$horas:"0".$horas) . ":" . (($minutos>9)?$minutos:"0".$minutos) . ":" . (($segundos>9)?$segundos:"0".$segundos));
		$secs = $mc_info_incidentes->TiempoSolucion->GetValue();
		$horas =$secs/3600;
		$minutos =($secs % 3600)/60  ;
		$segundos =(($secs % 3600)%60);
		$mc_info_incidentes->TiempoSolucion->SetValue( (($horas>9)?$horas:"0".$horas) . ":" . (($minutos>9)?$minutos:"0".$minutos) . ":" . (($segundos>9)?$segundos:"0".$segundos));
// -------------------------
//End Custom Code

//Custom Code @317-2A29BDB7
// -------------------------
    global $existe_actualizacion_asignacion;	
	if ($existe_actualizacion_asignacion > 0){
		global $nueva_fecha_asignacion;
		global $nueva_fecha_encurso;
		$mc_info_incidentes->FechaAsignado->SetValue(CCParseDate($nueva_fecha_asignacion,array("dd","/","mm","/","yyyy"," ","HH",":","nn",":","ss")));
		$mc_info_incidentes->FechaEnCurso->SetValue(CCParseDate($nueva_fecha_encurso,array("dd","/","mm","/","yyyy"," ","HH",":","nn",":","ss")));
	
	}

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes_BeforeShow @20-F01FD70E
    return $mc_info_incidentes_BeforeShow;
}
//End Close mc_info_incidentes_BeforeShow

//mc_calificacion_incidente_id_servicio_BeforeShow @148-543BB798
function mc_calificacion_incidente_id_servicio_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_id_servicio_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_id_servicio_BeforeShow

//Custom Code @163-2A29BDB7
// -------------------------
	global $Servicio;

	global $DBcnDisenio;
	$DBcnDisenio->query("SELECT top 1 Id_Servicio, Nombre FROM MC_C_SERVICIO WHERE NOMBRE='" . trim($Servicio) . "'" );
	if($DBcnDisenio->next_record()){
		$mc_calificacion_incidente->Servicio->SetValue($DBcnDisenio->f("Nombre"));
		$mc_calificacion_incidente->id_servicio->SetValue($DBcnDisenio->f("Id_Servicio"));
	}
	else
	{
		$mc_calificacion_incidente->Servicio->SetValue("No existe este servicio");
	}
	
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_id_servicio_BeforeShow @148-C12BAB33
    return $mc_calificacion_incidente_id_servicio_BeforeShow;
}
//End Close mc_calificacion_incidente_id_servicio_BeforeShow

//mc_calificacion_incidente_Cumple_Inc_TiempoAsignacion_BeforeShow @150-479BF0AA
function mc_calificacion_incidente_Cumple_Inc_TiempoAsignacion_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_Cumple_Inc_TiempoAsignacion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_Cumple_Inc_TiempoAsignacion_BeforeShow

//Custom Code @183-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_Cumple_Inc_TiempoAsignacion_BeforeShow @150-7AD6393B
    return $mc_calificacion_incidente_Cumple_Inc_TiempoAsignacion_BeforeShow;
}
//End Close mc_calificacion_incidente_Cumple_Inc_TiempoAsignacion_BeforeShow

//mc_calificacion_incidente_Aplicacion_BeforeShow @155-A3F0DC78
function mc_calificacion_incidente_Aplicacion_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_Aplicacion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_Aplicacion_BeforeShow

//Custom Code @164-2A29BDB7
// -------------------------
	global $Aplicacion;
	global $DBcnDisenio;
	$DBcnDisenio->query("SELECT top 1 Id, Descripcion, Severidad FROM MC_C_APLICACION WHERE DESCRIPCION='" . trim($Aplicacion) . "'" );
	if($DBcnDisenio->next_record()){
		$mc_calificacion_incidente->shId_Aplicacion->SetValue($DBcnDisenio->f("Id"));
		$mc_calificacion_incidente->Aplicacion->SetValue($DBcnDisenio->f("Descripcion"));	
		if ($mc_calificacion_incidente->slSeveridad->GetValue() == "")
		{ 
			$mc_calificacion_incidente->slSeveridad->SetValue($DBcnDisenio->f("Severidad"));
		}
	}
	else
	{
		global $PatToRoot;
		$mc_calificacion_incidente->Aplicacion->SetValue("<a href='" . $PatToRoot . "/MyMSDMA4/Catalogos/AplicacionesLista.php?descripcion=" . trim($Aplicacion) . "'>No existe esta Aplicación</a>");
	}

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_Aplicacion_BeforeShow @155-48706F9B
    return $mc_calificacion_incidente_Aplicacion_BeforeShow;
}
//End Close mc_calificacion_incidente_Aplicacion_BeforeShow

//mc_calificacion_incidente_shId_Incidente_BeforeShow @162-B4208035
function mc_calificacion_incidente_shId_Incidente_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_shId_Incidente_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_shId_Incidente_BeforeShow

//Custom Code @166-2A29BDB7
// -------------------------
	global $IdIncidente;
	$mc_calificacion_incidente->shId_Incidente->SetValue($IdIncidente);
		
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_shId_Incidente_BeforeShow @162-B138529D
    return $mc_calificacion_incidente_shId_Incidente_BeforeShow;
}
//End Close mc_calificacion_incidente_shId_Incidente_BeforeShow

//mc_calificacion_incidente_shDescartar_BeforeShow @167-8984CEE5
function mc_calificacion_incidente_shDescartar_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_shDescartar_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_shDescartar_BeforeShow

//Custom Code @168-2A29BDB7
// -------------------------
	$mc_calificacion_incidente->shDescartar->SetValue(0);
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_shDescartar_BeforeShow @167-E98A00C3
    return $mc_calificacion_incidente_shDescartar_BeforeShow;
}
//End Close mc_calificacion_incidente_shDescartar_BeforeShow

//mc_calificacion_incidente_shMes_BeforeShow @169-3BF780A0
function mc_calificacion_incidente_shMes_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_shMes_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_shMes_BeforeShow

//Custom Code @171-2A29BDB7
// -------------------------
	$mc_calificacion_incidente->shMes->SetValue(CCGetParam("s_mes_param",0));
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_shMes_BeforeShow @169-D99F145E
    return $mc_calificacion_incidente_shMes_BeforeShow;
}
//End Close mc_calificacion_incidente_shMes_BeforeShow

//mc_calificacion_incidente_shAnio_BeforeShow @170-3ACD6CB6
function mc_calificacion_incidente_shAnio_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_shAnio_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_shAnio_BeforeShow

//Custom Code @172-2A29BDB7
// -------------------------
	$mc_calificacion_incidente->shAnio->SetValue(CCGetParam("s_anio_param",0));

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_shAnio_BeforeShow @170-BB6098A7
    return $mc_calificacion_incidente_shAnio_BeforeShow;
}
//End Close mc_calificacion_incidente_shAnio_BeforeShow

//mc_calificacion_incidente_shIdProveedor_BeforeShow @176-2893E2B6
function mc_calificacion_incidente_shIdProveedor_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_shIdProveedor_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_shIdProveedor_BeforeShow

//Custom Code @177-2A29BDB7
// -------------------------
	global $IdProveedor;
	$mc_calificacion_incidente->shIdProveedor->SetValue($IdProveedor);
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_shIdProveedor_BeforeShow @176-140C66A6
    return $mc_calificacion_incidente_shIdProveedor_BeforeShow;
}
//End Close mc_calificacion_incidente_shIdProveedor_BeforeShow

//mc_calificacion_incidente_slSeveridad_BeforeShow @186-A2814307
function mc_calificacion_incidente_slSeveridad_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_slSeveridad_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_slSeveridad_BeforeShow

//Custom Code @262-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_slSeveridad_BeforeShow @186-8D074B04
    return $mc_calificacion_incidente_slSeveridad_BeforeShow;
}
//End Close mc_calificacion_incidente_slSeveridad_BeforeShow

//mc_calificacion_incidente_CheckBox1_TotalHorasSolucion_BeforeShow @257-0EC7E1F8
function mc_calificacion_incidente_CheckBox1_TotalHorasSolucion_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_CheckBox1_TotalHorasSolucion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_CheckBox1_TotalHorasSolucion_BeforeShow

//Custom Code @258-2A29BDB7

// -------------------------

	global $TipoCalculoTiempo;
	global $TiempoAtencion;
	global $TiempoSolucion;
	global $TiempoPaquetes;
	global $TienePaquetes;
	global $TiempoConcluidaResuelto;
	global $TiempoCursoaResuelto;
	global $arrayMovimiento;
  	global $arraySegundos;
  	global $arrayFechaIni;
  	global $arrayFechaFin;
  	
  	for ($i=0; $i<=count($arrayMovimiento)-1;$i++){	    			
		
		global $fechaINI;
		global $fechaFIN;
		global $SEGUNDOS;
		
		echo "No" . $i . "<br>";
		echo "Index -" .  $arrayMovimiento[$i] . "<br>";
	
		
		echo "FechaIni -"  . CCFormatDate($arrayFechaIni[$i],array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")). "<br>";
		echo "FechaFin -" . CCFormatDate($arrayFechaFin[$i],array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")) . "<br>";
		echo "Segundos -" . $arraySegundos[$i] . "<br>";
	
		$fechaINI=CCFormatDate($arrayFechaIni[$i],array("dd","/","mm","/","yyyy"));
		$fechaFIN=CCFormatDate($arrayFechaFin[$i],array("dd","/","mm","/","yyyy"));
		$SEGUNDOS=$arraySegundos[$i];
		
		for ($ii=0; $ii<=count($arrayMovimiento)-1 ; $ii++){
			if ($arrayMovimiento[$i]==$arrayMovimiento[$ii] && $arraySegundos[$ii]>0){
				if ($fechaINI>=CCFormatDate($arrayFechaIni[$ii],array("dd","/","mm","/","yyyy")) &&  CCFormatDate($arrayFechaFin[$ii],array("dd","/","mm","/","yyyy")) >= $fechaFIN){
					if ($arraySegundos[$i]<$arraySegundos[$ii]  && $i<$ii){
						echo "1.-No se Suma " . $fechaINI . " & " . CCFormatDate($arrayFechaIni[$ii],array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")) . "<br>";
						$i++;
					} else {
						if ($arraySegundos[$i]<$arraySegundos[$ii]  && $i>$ii){
							echo "3.-No se Suma " . $fechaINI . " & " . CCFormatDate($arrayFechaIni[$ii],array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")) . "<br>";
						}	
					}
				}
			}					
		}


  	}
		  
	if ($TienePaquetes == 0 && ($TiempoPaquetes<=0 || trim($TiempoPaquetes)=="")){
			$Final->TotalHorasSolucion->SetValue($TiempoCursoaResuelto);
	}	

	if ($TiempoPaquetes>0 || $TienePaquetes > 0){
		$Final->TotalHorasSolucion->SetValue($TiempoAtencion+$TiempoSolucion+$TiempoPaquetes+$TiempoConcluidaResuelto);
	}	
	

	    global $Horas;
	    global $Minutos;
		global $Segundos;
		
		$Minutos=floor(($Final->TotalHorasSolucion->GetValue() / 60)%60);	
		$Segundos=($Final->TotalHorasSolucion->GetValue() % 60);
		$Horas= floor((($Final->TotalHorasSolucion->GetValue()) / 60)/60);
	
		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
		if ($Segundos<10) {
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
			if ( $Minutos<10) {
				$Final->TotalHorasSolucion->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
			} else {
				$Final->TotalHorasSolucion->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
			}
		} else {
			if ( $Minutos<10) {
				$Final->TotalHorasSolucion->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
			} else {
				$Final->TotalHorasSolucion->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_CheckBox1_TotalHorasSolucion_BeforeShow @257-BFDA34B9
    return $mc_calificacion_incidente_CheckBox1_TotalHorasSolucion_BeforeShow;
}
//End Close mc_calificacion_incidente_CheckBox1_TotalHorasSolucion_BeforeShow

//mc_calificacion_incidente_CheckBox1_BeforeShow @256-611B206D
function mc_calificacion_incidente_CheckBox1_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_CheckBox1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_CheckBox1_BeforeShow

//Custom Code @259-2A29BDB7
// -------------------------
//codigo aqui de chk

    
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_CheckBox1_BeforeShow @256-7970C092
    return $mc_calificacion_incidente_CheckBox1_BeforeShow;
}
//End Close mc_calificacion_incidente_CheckBox1_BeforeShow

//mc_calificacion_incidente_lblCalificado_BeforeShow @271-CB37F07D
function mc_calificacion_incidente_lblCalificado_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_lblCalificado_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_lblCalificado_BeforeShow

//Custom Code @272-2A29BDB7
// -------------------------
	global $DBcnDisenio;
	global $Calificado;	
	
	$DBcnDisenio->query("SELECT id_incidente  from  mc_universo_cds mcu left join  mc_calificacion_incidentes_MC  mci on mci.id_incidente=mcu.Numero  " .
		" and mci.MesReporte = mcu.mes and mci.Anioreporte  = mcu.anio " .
		" where numero='"  . CCGetParam("Id_incidente",0) . "'");

	$mc_calificacion_incidente->lblCalificado->SetValue("No Calificado");
  	while ($DBcnDisenio->next_record())
  	{
  		if($DBcnDisenio->f(0)!=""){
	  		$mc_calificacion_incidente->lblCalificado->SetValue("Calificado");
  			$Calificado="1";
  		}
  	}
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_lblCalificado_BeforeShow @271-1A52B286
    return $mc_calificacion_incidente_lblCalificado_BeforeShow;
}
//End Close mc_calificacion_incidente_lblCalificado_BeforeShow

//mc_calificacion_incidente_FechaUltMod_BeforeShow @286-BC21D487
function mc_calificacion_incidente_FechaUltMod_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_FechaUltMod_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_FechaUltMod_BeforeShow

//Custom Code @287-2A29BDB7
// -------------------------

	if ($mc_calificacion_incidente->lblUsuarioUltMod->GetValue()!=""){ 
		$mc_calificacion_incidente->FechaUltMod->SetValue(date("d/m/Y H:i:s",mktime(date("H"), date("i"),date("s") , date("m"), date("d") , date("y"))));
	} else {
		$mc_calificacion_incidente->lblUsuarioUltMod->SetValue($mc_calificacion_incidente->DataSource->f("UsuarioAlta"));
		$mc_calificacion_incidente->lblFechaUltMod->SetValue($mc_calificacion_incidente->DataSource->f("FechaAlta"));
	}
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_FechaUltMod_BeforeShow @286-D7F89798
    return $mc_calificacion_incidente_FechaUltMod_BeforeShow;
}
//End Close mc_calificacion_incidente_FechaUltMod_BeforeShow

//mc_calificacion_incidente_txtCumple_Inc_TiempoAsignacion_BeforeShow @290-B81E1D05
function mc_calificacion_incidente_txtCumple_Inc_TiempoAsignacion_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_txtCumple_Inc_TiempoAsignacion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_txtCumple_Inc_TiempoAsignacion_BeforeShow

//Custom Code @293-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_txtCumple_Inc_TiempoAsignacion_BeforeShow @290-D8692B4B
    return $mc_calificacion_incidente_txtCumple_Inc_TiempoAsignacion_BeforeShow;
}
//End Close mc_calificacion_incidente_txtCumple_Inc_TiempoAsignacion_BeforeShow

//DEL  // -------------------------
//DEL  
//DEL  // -------------------------

//mc_calificacion_incidente_BeforeShow @143-BCFAF919
function mc_calificacion_incidente_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_BeforeShow

//Custom Code @165-2A29BDB7
// -------------------------
	global $valorAtencion;
	global $valorSolución;
	global $valorSoporte;

	global $Calificado;	


	$valorAtencion=$mc_calificacion_incidente->Cumple_Inc_TiempoAsignacion->GetValue();
	$valorSolucion=$mc_calificacion_incidente->Cumple_Inc_TiempoSolucion->GetValue();
	$valorSoporte=$mc_calificacion_incidente->Cumple_DISP_SOPORTE->GetValue();


    global $DBcnDisenio;
    // Verifica si esta cerrado para medición
    $flgCerrado=CCDLookUp("Medido","mc_universo_cds","numero='" .CCGetParam("Id_incidente","") ."'",$DBcnDisenio);
    if($flgCerrado==1){
    	$mc_calificacion_incidente->Button_Insert->Visible= false;
    	$mc_calificacion_incidente->Button_Update->Visible = false;
    }
// -------------------------
//End Custom Code

//Custom Code @304-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_BeforeShow @143-DB37D23A
    return $mc_calificacion_incidente_BeforeShow;
}
//End Close mc_calificacion_incidente_BeforeShow

//mc_calificacion_incidente_OnValidate @143-1D079C0C
function mc_calificacion_incidente_OnValidate(& $sender)
{
    $mc_calificacion_incidente_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_OnValidate

//Custom Code @178-2A29BDB7
// -------------------------
					
		if (trim($mc_calificacion_incidente->id_servicio->GetValue()) == ""){
			$mc_calificacion_incidente->Errors->addError("Debe dar de alta el Servicio");
		}
		if (trim($mc_calificacion_incidente->shId_Aplicacion->GetValue()) == ""){
			$mc_calificacion_incidente->Errors->addError("Debe dar de alta la Aplicación");
		}
		if (trim($mc_calificacion_incidente->Cumple_Inc_TiempoAsignacion->GetValue())=="")
		{
			$mc_calificacion_incidente->Errors->addError("Debe dar una calificación al Tiempo de Asignación");
			
		}
		if (trim($mc_calificacion_incidente->Cumple_Inc_TiempoSolucion->GetValue())=="")
		{
			$mc_calificacion_incidente->Errors->addError("Debe dar una calificación al Tiempo de Solución");
			
		}
		/*
		if (trim($mc_calificacion_incidente->Cumple_DISP_SOPORTE->GetValue())==""){
			$mc_calificacion_incidente->Errors->addError("Debe dar una calificación a la Disposición de Soporte");
		}
		*/
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_OnValidate @143-E4CCB6B3
    return $mc_calificacion_incidente_OnValidate;
}
//End Close mc_calificacion_incidente_OnValidate

//mc_calificacion_incidente_BeforeUpdate @143-3D09EEBE
function mc_calificacion_incidente_BeforeUpdate(& $sender)
{
    $mc_calificacion_incidente_BeforeUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_BeforeUpdate

//Custom Code @270-2A29BDB7
// -------------------------
	global $valorAtencion;
	global $valorSolucion;
	global $valorSoporte;
	global $Calificado;

	
	if ($valorAtencion!=$mc_calificacion_incidente->Cumple_Inc_TiempoAsignacion->GetValue())
	{$mc_calificacion_incidente->shTiempoAtencion->SetValue(1);}
	if ($valorSolucion!=$mc_calificacion_incidente->Cumple_Inc_TiempoSolucion->GetValue())
	{$mc_calificacion_incidente->shTiempoSolucion->SetValue(1);}
	if($valorSoporte!=$mc_calificacion_incidente->Cumple_DISP_SOPORTE->GetValue())
	{$mc_calificacion_incidente->shTiempoSoporte->SetValue(1);}

	
	$mc_calificacion_incidente->shUsuarioUltMod->SetValue(CCGetUserLogin());
	$mc_calificacion_incidente->FechaUltMod->SetValue(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y")));

	if($mc_calificacion_incidente->txtCumple_Inc_TiempoAsignacion->GetValue()!=""){
		//$mc_calificacion_incidente->Obs_Manuales->SetValue($mc_calificacion_incidente->Obs_Manuales->GetValue() . " Obs. TA: " . $mc_calificacion_incidente->txtCumple_Inc_TiempoAsignacion->GetValue() );
	}
	if($mc_calificacion_incidente->txtCumple_Inc_TiempoSolucion->GetValue()!=""){
		//$mc_calificacion_incidente->Obs_Manuales->SetValue($mc_calificacion_incidente->Obs_Manuales->GetValue() .  " Obs. TS: " . $mc_calificacion_incidente->txtCumple_Inc_TiempoSolucion->GetValue());
	}

	
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_BeforeUpdate @143-D8D0B59C
    return $mc_calificacion_incidente_BeforeUpdate;
}
//End Close mc_calificacion_incidente_BeforeUpdate

//mc_calificacion_incidente_BeforeInsert @143-857682DD
function mc_calificacion_incidente_BeforeInsert(& $sender)
{
    $mc_calificacion_incidente_BeforeInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_BeforeInsert

//Custom Code @285-2A29BDB7
// -------------------------
	if ($valorAtencion!=$mc_calificacion_incidente->Cumple_Inc_TiempoAsignacion->GetValue())
	{$mc_calificacion_incidente->shTiempoAtencion->SetValue(1);}
	if ($valorSolucion!=$mc_calificacion_incidente->Cumple_Inc_TiempoSolucion->GetValue())
	{$mc_calificacion_incidente->shTiempoSolucion->SetValue(1);}
	if($valorSoporte!=$mc_calificacion_incidente->Cumple_DISP_SOPORTE->GetValue())
	{$mc_calificacion_incidente->shTiempoSoporte->SetValue(1);}


	$mc_calificacion_incidente->shUsuarioAlta->SetValue(CCGetUserLogin());
	//si se especificaron observaciones las agrega
	if($mc_calificacion_incidente->txtCumple_Inc_TiempoAsignacion->GetValue()!=""){
		//$mc_calificacion_incidente->Obs_Manuales->SetValue($mc_calificacion_incidente->Obs_Manuales->GetValue() . " Obs. TA: " . $mc_calificacion_incidente->txtCumple_Inc_TiempoAsignacion->GetValue() );
	}
	if($mc_calificacion_incidente->txtCumple_Inc_TiempoSolucion->GetValue()!=""){
		//$mc_calificacion_incidente->Obs_Manuales->SetValue($mc_calificacion_incidente->Obs_Manuales->GetValue() .  " Obs. TS: " . $mc_calificacion_incidente->txtCumple_Inc_TiempoSolucion->GetValue());
	}
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_BeforeInsert @143-17F97413
    return $mc_calificacion_incidente_BeforeInsert;
}
//End Close mc_calificacion_incidente_BeforeInsert

//mc_info_incidentes3_HorasInvertidas_BeforeShow @114-C527685B
function mc_info_incidentes3_HorasInvertidas_BeforeShow(& $sender)
{
    $mc_info_incidentes3_HorasInvertidas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes3; //Compatibility
//End mc_info_incidentes3_HorasInvertidas_BeforeShow

//Custom Code @115-2A29BDB7
// -------------------------
	global $TiempoConcluidaResuelto;	
	global $SegundosTotalesSolucion;
	$SegundosTotalesSolucion=$SegundosTotalesSolucion+$mc_info_incidentes3->HorasInvertidas->GetValue();

	$TiempoConcluidaResuelto=$mc_info_incidentes3->HorasInvertidas->GetValue();

	
	if ($mc_info_incidentes3->HorasInvertidas->GetValue()>0 ){
	    global $Horas;
	    global $Minutos;
		global $Segundos;
		
		$Minutos=floor(($mc_info_incidentes3->HorasInvertidas->GetValue() / 60)%60);
		
		$Segundos=($mc_info_incidentes3->HorasInvertidas->GetValue() % 60);
		
		
		$Horas= floor((($mc_info_incidentes3->HorasInvertidas->GetValue()) / 60)/60);
	
		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
	
	if ($Horas<10)
	{		
		if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$mc_info_incidentes3->HorasInvertidas->SetValue("0" . $Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$mc_info_incidentes3->HorasInvertidas->SetValue("0" . $Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$mc_info_incidentes3->HorasInvertidas->SetValue("0" . $Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$mc_info_incidentes3->HorasInvertidas->SetValue("0" . $Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}
	}
	else
	{
				if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$mc_info_incidentes3->HorasInvertidas->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$mc_info_incidentes3->HorasInvertidas->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$mc_info_incidentes3->HorasInvertidas->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$mc_info_incidentes3->HorasInvertidas->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}

	}
	
	
	}
	else
	{
		if($mc_info_incidentes3->HorasInvertidas->GetValue()<0){
			$mc_info_incidentes3->HorasInvertidas->SetValue('N/A Incumplimiento a Proceso');
		} else {
			if($mc_info_incidentes3->HorasInvertidas->GetValue()!=""){
				$mc_info_incidentes3->HorasInvertidas->SetValue('00:00:00');
			} else {
				$mc_info_incidentes3->HorasInvertidas->SetValue('N/A');
			}
		}
	}
// -------------------------
//End Custom Code

//Close mc_info_incidentes3_HorasInvertidas_BeforeShow @114-B0473712
    return $mc_info_incidentes3_HorasInvertidas_BeforeShow;
}
//End Close mc_info_incidentes3_HorasInvertidas_BeforeShow

//mc_info_incidentes4_HorasInvertidas_BeforeShow @127-C5AAE585
function mc_info_incidentes4_HorasInvertidas_BeforeShow(& $sender)
{
    $mc_info_incidentes4_HorasInvertidas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes4; //Compatibility
//End mc_info_incidentes4_HorasInvertidas_BeforeShow

//Custom Code @228-2A29BDB7
// -------------------------
    global $Horas;
    global $Minutos;
	global $Segundos;
	global $TiempoCursoaResuelto;
	
	$TiempoCursoaResuelto=$mc_info_incidentes4->HorasInvertidas->GetValue();

	$Minutos=floor(($mc_info_incidentes4->HorasInvertidas->GetValue() / 60)%60);
	
	$Segundos=($mc_info_incidentes4->HorasInvertidas->GetValue() % 60);
	
	
	$Horas= floor((($mc_info_incidentes4->HorasInvertidas->GetValue()) / 60)/60);
//	$Minutos= ($mc_detalle_incidente_avl->Horas->GetValue()) % 60;
	
//	$Horas= floor($mc_detalle_incidente_avl->Horas->GetValue() / 60);
//	$Minutos= $mc_detalle_incidente_avl->Horas->GetValue() % 60;

	if ($mc_info_incidentes4->HorasInvertidas->GetValue()>0)
	{
		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
	
		
		if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$mc_info_incidentes4->HorasInvertidas->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$mc_info_incidentes4->HorasInvertidas->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$mc_info_incidentes4->HorasInvertidas->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$mc_info_incidentes4->HorasInvertidas->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}
	}
		else
	{
		if($mc_info_incidentes4->HorasInvertidas->GetValue()<0){
			$mc_info_incidentes4->HorasInvertidas->SetValue('N/A Incumplimiento a Proceso');
		} else {
			if($mc_info_incidentes4->HorasInvertidas->GetValue()!=""){
				$mc_info_incidentes4->HorasInvertidas->SetValue('00:00:00');
			} else {
				$mc_info_incidentes4->HorasInvertidas->SetValue('N/A');
			}
		}

	}



    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes4_HorasInvertidas_BeforeShow @127-05659E2A
    return $mc_info_incidentes4_HorasInvertidas_BeforeShow;
}
//End Close mc_info_incidentes4_HorasInvertidas_BeforeShow

//mc_info_incidentes4_BeforeShow @124-D93A4608
function mc_info_incidentes4_BeforeShow(& $sender)
{
    $mc_info_incidentes4_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes4; //Compatibility
//End mc_info_incidentes4_BeforeShow

//Custom Code @128-2A29BDB7
// -------------------------
	global $DBcnDisenio;
	global $FechaResuelto;
	global $FechaenCurso;

	global $Horas;
	global $MinutosF;


	$mc_info_incidentes4->FechaResuelto->SetValue(CCFormatDate(CCParseDate($FechaResuelto,array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));
	
	global $existe_actualizacion_asignacion;	
    global $mc_incidentes_reasignacio;
    global $nueva_fecha_encurso;
	if ($existe_actualizacion_asignacion > 0){
		
		$mc_info_incidentes4->FechaEnCurso->SetValue(CCFormatDate(CCParseDate($nueva_fecha_encurso,array("dd","/","mm","/","yyyy"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));
		$FechaenCurso=CCFormatDate(CCParseDate($mc_info_incidentes4->FechaEnCurso->GetValue(),array("dd","/","mm","/","yyyy"," ","HH",":","nn",":","ss")), array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss"));
	} else {
		$mc_info_incidentes4->FechaEnCurso->SetValue(CCFormatDate(CCParseDate($FechaenCurso,array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));
	}
	
	$DBcnDisenio->query("SELECT dbo.ufDiffFechasMCSec('".$FechaenCurso."','".$FechaResuelto."') as Minutos");
	if($DBcnDisenio->next_record()){

	//$DBcnDisenio->next_record()
	$MinutosF= $DBcnDisenio->f("Minutos");
		global $HorasCursoAResuelto; 
		$HorasCursoAResuelto=$MinutosF;
		$mc_info_incidentes4->HorasInvertidas->SetValue($MinutosF);

	}
	$DBcnDisenio->close();
// -------------------------
//End Custom Code

//Close mc_info_incidentes4_BeforeShow @124-54BF1855
    return $mc_info_incidentes4_BeforeShow;
}
//End Close mc_info_incidentes4_BeforeShow

//mc_info_incidentes1_HorasInvertidas_BeforeShow @192-C54FDBBF
function mc_info_incidentes1_HorasInvertidas_BeforeShow(& $sender)
{
    $mc_info_incidentes1_HorasInvertidas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes1; //Compatibility
//End mc_info_incidentes1_HorasInvertidas_BeforeShow

//Custom Code @241-2A29BDB7
// -------------------------
	
	global $TiempoAtencion;	
	$TiempoAtencion=$mc_info_incidentes1->HorasInvertidas->GetValue();
	if ($mc_info_incidentes1->HorasInvertidas->GetValue()>0) {
    	global $Horas;
    	global $Minutos;
		global $Segundos;
	
		$Minutos=floor(($mc_info_incidentes1->HorasInvertidas->GetValue() / 60)%60);
	
		$Segundos=($mc_info_incidentes1->HorasInvertidas->GetValue() % 60);
	
		$Horas= floor((($mc_info_incidentes1->HorasInvertidas->GetValue()) / 60)/60);

		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}

		if ($Horas<10){
			if ($Segundos<10){
				if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
				if ( $Minutos<10) {
					$mc_info_incidentes1->HorasInvertidas->SetValue("0" . $Horas . ":0" . $Minutos . ":0" . $Segundos );
				} else {
					$mc_info_incidentes1->HorasInvertidas->SetValue("0" . $Horas . ":" . $Minutos . ":0" . $Segundos);
				}
			} else {
				if ( $Minutos<10) {
					$mc_info_incidentes1->HorasInvertidas->SetValue("0" . $Horas . ":0" . $Minutos . ":" . $Segundos );
				} else {
					$mc_info_incidentes1->HorasInvertidas->SetValue("0" . $Horas . ":" . $Minutos . ":" . $Segundos);
				}
			}
		} else	{
			if ($Segundos<10) {
				if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
				if ( $Minutos<10) {
					$mc_info_incidentes1->HorasInvertidas->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
				} else {
					$mc_info_incidentes1->HorasInvertidas->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
				}
			} else {
				if ( $Minutos<10) {
					$mc_info_incidentes1->HorasInvertidas->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
				} else {
					$mc_info_incidentes1->HorasInvertidas->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
				}
			}
		}
	} else {
		if($mc_info_incidentes1->HorasInvertidas->GetValue()<0){
			$mc_info_incidentes1->HorasInvertidas->SetValue('N/A Incumplimiento a Proceso');
		} else {
			if($mc_info_incidentes1->HorasInvertidas->GetValue()!=""){
				$mc_info_incidentes1->HorasInvertidas->SetValue('00:00:00');
			} else {
				$mc_info_incidentes1->HorasInvertidas->SetValue('N/A');
			}
		}
	}
// -------------------------
//End Custom Code

//Close mc_info_incidentes1_HorasInvertidas_BeforeShow @192-C886F102
    return $mc_info_incidentes1_HorasInvertidas_BeforeShow;
}
//End Close mc_info_incidentes1_HorasInvertidas_BeforeShow

//mc_info_incidentes1_BeforeShow @46-FFDA1A76
function mc_info_incidentes1_BeforeShow(& $sender)
{
    $mc_info_incidentes1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes1; //Compatibility
//End mc_info_incidentes1_BeforeShow

//Custom Code @49-2A29BDB7
// -------------------------

	global $DBcnDisenio;
	global $FechaAsignado;
	global $FechaenCurso;

	$mc_info_incidentes1->FechaAsignado->SetValue(CCFormatDate(CCParseDate($FechaAsignado,array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));
	$mc_info_incidentes1->FechaEnCurso->SetValue(CCFormatDate(CCParseDate($FechaenCurso,array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));

	$DBcnDisenio->query("SELECT dbo.ufDiffFechasMCSec('".$FechaAsignado."','".$FechaenCurso."') as Minutos");
	if($DBcnDisenio->next_record()){

	//$DBcnDisenio->next_record()
	$MinutosF= $DBcnDisenio->f("Minutos");
	
	$mc_info_incidentes1->HorasInvertidas->SetValue($MinutosF);

/*
	global $MinutosTotalesSolucion;    
	if ($MinutosF>0) 
	{
	$MinutosTotalesSolucion=$MinutosTotalesSolucion+ $MinutosF;}
		
	
	$Horas= floor($MinutosF / 60);
	$MinutosF= ($MinutosF % 60);

	if ($MinutosF<0){$MinutosF=0;}


	
		if ($MinutosF<10) {

			$mc_info_incidentes1->HorasInvertidas->SetValue($Horas . ":0" . $MinutosF);
		}
		else
		{
			$mc_info_incidentes1->HorasInvertidas->SetValue($Horas . ":" . $MinutosF);
		}
	
*/	
	}
	$DBcnDisenio->close();


    global $existe_actualizacion_asignacion;	
    global $mc_incidentes_reasignacio;
	if ($existe_actualizacion_asignacion > 0){
		global $nueva_fecha_asignacion;
		global $nueva_fecha_encurso;
		global $nuevas_horas_invertidas;
		$mc_info_incidentes1->FechaAsignado->SetValue(CCFormatDate(CCParseDate($nueva_fecha_asignacion,array("dd","/","mm","/","yyyy"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));
		$mc_info_incidentes1->FechaEnCurso->SetValue(CCFormatDate(CCParseDate($nueva_fecha_encurso,array("dd","/","mm","/","yyyy"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));
		$mc_info_incidentes1->HorasInvertidas->SetValue($nuevas_horas_invertidas);
	}

		 
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes1_BeforeShow @46-D01C7638
    return $mc_info_incidentes1_BeforeShow;
}
//End Close mc_info_incidentes1_BeforeShow

//mc_info_incidentes2_HorasInvertidas_BeforeShow @59-C51331A9
function mc_info_incidentes2_HorasInvertidas_BeforeShow(& $sender)
{
    $mc_info_incidentes2_HorasInvertidas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes2; //Compatibility
//End mc_info_incidentes2_HorasInvertidas_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    	global $SegundosTotalesSolucion;
	global $TiempoSolucion;
	$SegundosTotalesSolucion=$SegundosTotalesSolucion+$mc_info_incidentes2->HorasInvertidas->GetValue();
	$TiempoSolucion=$mc_info_incidentes2->HorasInvertidas->GetValue();

	if ($mc_info_incidentes2->HorasInvertidas->GetValue()>0) {
	    global $Horas;
	    global $Minutos;
		global $Segundos;
		
		$Minutos=floor(($mc_info_incidentes2->HorasInvertidas->GetValue() / 60)%60);		
		$Segundos=($mc_info_incidentes2->HorasInvertidas->GetValue() % 60);
		$Horas= floor((($mc_info_incidentes2->HorasInvertidas->GetValue()) / 60)/60);
	
		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
	
		if ($Horas<10)	{
			if ($Segundos<10){
				if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
				if ( $Minutos<10) {
					$mc_info_incidentes2->HorasInvertidas->SetValue("0" . $Horas . ":0" . $Minutos . ":0" . $Segundos );
				} else {
					$mc_info_incidentes2->HorasInvertidas->SetValue("0" . $Horas . ":" . $Minutos . ":0" . $Segundos);
				}
			}else{
				if ( $Minutos<10) {
					$mc_info_incidentes2->HorasInvertidas->SetValue("0" . $Horas . ":0" . $Minutos . ":" . $Segundos );
				} else {
					$mc_info_incidentes2->HorasInvertidas->SetValue("0" . $Horas . ":" . $Minutos . ":" . $Segundos);
				}
			}
		} else {
			if ($Segundos<10){
				if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
				if ( $Minutos<10) {
					$mc_info_incidentes2->HorasInvertidas->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
				} else {
					$mc_info_incidentes2->HorasInvertidas->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
				}
			} else {
				if ( $Minutos<10) {
					$mc_info_incidentes2->HorasInvertidas->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
				} else {
				$mc_info_incidentes2->HorasInvertidas->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
				}
			}
		}
	} else {
		if($mc_info_incidentes2->HorasInvertidas->GetValue()<0){
			$mc_info_incidentes2->HorasInvertidas->SetValue('N/A Incumplimiento a Proceso');
		} else {
			if($mc_info_incidentes2->HorasInvertidas->GetValue()!=""){
				$mc_info_incidentes2->HorasInvertidas->SetValue('00:00:00');
			} else {
				$mc_info_incidentes2->HorasInvertidas->SetValue('N/A');
			}
		}
	}
// -------------------------
//End Custom Code

//Close mc_info_incidentes2_HorasInvertidas_BeforeShow @59-8C27D41A
    return $mc_info_incidentes2_HorasInvertidas_BeforeShow;
}
//End Close mc_info_incidentes2_HorasInvertidas_BeforeShow

//mc_info_incidentes2_BeforeShow @56-E27A2E5C
function mc_info_incidentes2_BeforeShow(& $sender)
{
    $mc_info_incidentes2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes2; //Compatibility
//End mc_info_incidentes2_BeforeShow

//Custom Code @379-2A29BDB7
// -------------------------
    global $existe_actualizacion_asignacion;	
    global $DBcnDisenio;
	if ($existe_actualizacion_asignacion > 0){
		global $nueva_fecha_encurso;
		global $nuevas_horas_invertidas;
		$mc_info_incidentes2->FechaEnCurso->SetValue(CCParseDate($nueva_fecha_encurso,array("dd","/","mm","/","yyyy"," ","HH",":","nn",":","ss")));
		$nuevaFechaEnCurso=str_replace('-','/',CCDLookUp("convert(varchar(30),primera_fecha_encurso,120)","mc_incidentes_reasignaciones"," id_incidente='".CCGetParam("Id_incidente",0)."' and mes=".CCGetParam("s_mes_param",0)." and anio=".CCGetParam("s_anio_param",0), $DBcnDisenio));	
		//$nuevaFechaEnCurso = CCFormatDate(CCParseDate($nueva_fecha_encurso,array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")),array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss"));
		
		$fechainicioavl=CCFormatDate($mc_info_incidentes2->lblRegistroAVL->GetValue(),array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss"));
		$calculo_tiempo=CCDLookUp("top 1 dbo.ufDiffFechasMCSec('".$nuevaFechaEnCurso."','".$fechainicioavl."')","mc_incidentes_reasignaciones"," 1=1", $DBcnDisenio);
		$mc_info_incidentes2->HorasInvertidas->SetValue($calculo_tiempo);
	}
// -------------------------
//End Custom Code

//Close mc_info_incidentes2_BeforeShow @56-AC7D53E3
    return $mc_info_incidentes2_BeforeShow;
}
//End Close mc_info_incidentes2_BeforeShow

//Final_TotalHorasSolucion_BeforeShow @229-B78AD150
function Final_TotalHorasSolucion_BeforeShow(& $sender)
{
    $Final_TotalHorasSolucion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Final; //Compatibility
//End Final_TotalHorasSolucion_BeforeShow

//Custom Code @230-2A29BDB7

// -------------------------
	global $TiempoPaquetes;
	global $TienePaquetes;
	global $TiempoCursoaResuelto;
	global $TipoCalculoTiempo;
	global $TiempoAtencion;
	global $TiempoSolucion;
	global $TiempoConcluidaResuelto;
	global $db;
	
	$db= new clsDBcnDisenio;
	$TipoCalculoTiempo=1;
	
	
	if ($TipoCalculoTiempo==1){
		global $DBcnDisenio;
		//cambio a partir de que se agregaron las Torres AVL
  		$DBcnDisenio->query("SELECT ClaveMovimiento,DescMovimiento,FechaInicioMov,FechaFinMov,Paquete, dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov) as  HorasInvertidas " .
			" FROM mc_detalle_incidente_avl a inner join mc_universo_cds u on u.numero = a.Id_Incidente  and month(FechaCarga)= u.mes and u.anio  = year(FechaCarga) " .
			" where ( ClaveMovimiento in (select claveMovimiento from mc_c_movimiento where issolucion=1) ) " .
			" and Id_Incidente='"  . CCGetParam("Id_incidente",0) . "'  ORDER BY  ClaveMovimiento, case when fechacarga > '2014-09-01' then fechainiciomov end,  HorasInvertidas desc" );
  		if(!$DBcnDisenio->has_next_record()){
  			//si no tiene paquetes busca por el padre
  			$DBcnDisenio->query("select 	det.ClaveMovimiento, det.DescMovimiento , det.FechaInicioMov, det.FechaFinMov, det.Paquete " .
				", dbo.ufDiffFechasMCSec(det.FechaInicioMov,  det.FechaFinMov) HorasInvertidas " .
				"from mc_info_incidentes i " .
				"inner join mc_universo_cds u on i.Id_incidente = u.numero  and month(i.FechaCarga ) = u.mes and YEAR(i.fechacarga)= u.anio " .
				"inner join mc_detalle_incidente_avl det on (det.Id_Incidente = i.Id_incidente or det.Id_Incidente = i.IncPadre ) " .
					" and month(det.FechaCarga ) = u.mes and YEAR(det.fechacarga)= u.anio " .
				"inner join mc_c_movimiento m on m.ClaveMovimiento = det.ClaveMovimiento " .
				"WHERE i.id_incidente = '"  . CCGetParam("Id_incidente",0) . "'	ORDER BY ClaveMovimiento, case when i.fechacarga > '2014-10-01' then fechainiciomov end, HorasInvertidas desc ");
  		}
  		global $i;
		$i=1;
		$TienePaquetes=0;		
	  	while ($DBcnDisenio->next_record()){
			global $ClaveMov;
			global $fechaINI;
			global $fechaFIN;
			global $SEGUNDOS;
	
			global $ClaveMovAnt;
			global $fechaINIAnt;
			global $fechaFINAnt;
			global $SEGUNDOSAnt;
			
			$SEGUNDOS=0;

			$ClaveMov=$DBcnDisenio->f("ClaveMovimiento");
			$fechaINI= CCFormatDate(CCParseDate($DBcnDisenio->f("FechaInicioMov"),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss",".","S")),array("dd","/","mm","/","yyyy"));//CCFormatDate((string)$DBcnDisenio->f("FechaInicioMov"),array("dd","/","mm","/","yyyy")); //CCFormatDate($DBcnDisenio->f("FechaInicioMov"),array("dd","/","mm","/","yyyy"));
			$fechaFIN= CCFormatDate(CCParseDate($DBcnDisenio->f("FechaFinMov"),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss",".","S")),array("dd","/","mm","/","yyyy"));//CCFormatDate($DBcnDisenio->f("FechaFinMov"),array("dd","/","mm","/","yyyy"));
			$SEGUNDOS=$DBcnDisenio->f("HorasInvertidas");
			$vFechaINI= $DBcnDisenio->f("FechaInicioMov");
			$vFechaFIN= $DBcnDisenio->f("FechaFinMov");
			$TienePaquetes = $TienePaquetes +1;	
			if ($i==1){
				$TiempoPaquetes=$TiempoPaquetes + $SEGUNDOS;
			} else {
				if ($ClaveMov==$ClaveMovAnt){
					//si no se traslapa con el paquete toma el total de los segundos
					if(($vFechaINI < $vFechaINIAnt && $vFechaFIN < $vFechaINIAnt) || ($vFechaFIN > $vFechaFINAnt && $vFechaINI > $vFechaFINAnt) ){
						$TiempoPaquetes=$TiempoPaquetes+ $SEGUNDOS;	
					} else {
						if ($vFechaINI < $vFechaINIAnt && $vFechaFIN < $vFechaFINAnt && $vFechaFIN > $vFechaINIAnt  ) {
							$sql="select dbo.ufDiffFechasMCSec('" . $vFechaINI . "','" . $vFechaINIAnt . "')";
							$db->query($sql);
						}
						if($vFechaFIN > $vFechaFINAnt && $vFechaINI > $vFechaINIAnt && $vFechaINI <= $vFechaFINAnt){
							$sql="select dbo.ufDiffFechasMCSec('" . $vFechaFINAnt . "','" . $vFechaFIN . "')";
							$db->query($sql);
						}
						if($db->next_record()){
							$TiempoPaquetes = $TiempoPaquetes + $db->f(0);
						}
						
					}
				} else {
						$TiempoPaquetes=$TiempoPaquetes+ $SEGUNDOS;				
				}
			}
			$ClaveMovAnt=$DBcnDisenio->f("ClaveMovimiento");
			$fechaINIAnt= CCFormatDate(CCParseDate($DBcnDisenio->f("FechaInicioMov"),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss",".","S")),array("dd","/","mm","/","yyyy"));//CCFormatDate((string)$DBcnDisenio->f("FechaInicioMov"),array("dd","/","mm","/","yyyy")); //CCFormatDate($DBcnDisenio->f("FechaInicioMov"),array("dd","/","mm","/","yyyy"));
			$fechaFINAnt= CCFormatDate(CCParseDate($DBcnDisenio->f("FechaFinMov"),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss",".","S")),array("dd","/","mm","/","yyyy"));//CCFormatDate($DBcnDisenio->f("FechaFinMov"),array("dd","/","mm","/","yyyy"));
			$vFechaINIAnt= $DBcnDisenio->f("FechaInicioMov");
			$vFechaFINAnt= $DBcnDisenio->f("FechaFinMov");
			$i++;
	  	}	

	}	//fin calculo de tiempo ==1


	if ($TipoCalculoTiempo==2){
		global $DBcnDisenio;
		
	  	$DBcnDisenio->query("select top 1 Paquete, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) as TotalSegundos from mc_detalle_incidente_avl a " .
							" where Id_Incidente ='" .  CCGetParam("Id_incidente",0)  . "' and ClaveMovimiento in (select claveMovimiento from mc_c_movimiento where issolucion=1) " . 
							" and month(FechaCarga) = (select MONTH (FechaCerrado)  from mc_info_incidentes where Id_Incidente = a.Id_Incidente ) " .
							" group by Paquete order by SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) desc ");
	
	  	while ($DBcnDisenio->next_record())
	  	{
	  		$TiempoPaquetes=$DBcnDisenio->f("TotalSegundos");
	  		
	  	}
		
    }	



		if ($TienePaquetes == 0 && ($TiempoPaquetes<=0 or trim($TiempoPaquetes)=="")){				
			$Final->TotalHorasSolucion->SetValue($TiempoCursoaResuelto);
		}	
		
		if ($TiempoPaquetes>0 || $TienePaquetes > 0 )
		{
			if ($TiempoSolucion<0){$TiempoSolucion=0;}
			if ($TiempoPaquetes<0){$TiempoPaquetes=0;}
			if ($TiempoAtencion<0){$TiempoAtencion=0;}
			if ($TiempoConcluidaResuelto<0){$TiempoConcluidaResuelto=0;}
			
			$Final->TotalHorasSolucion->SetValue($TiempoPaquetes+$TiempoConcluidaResuelto+$TiempoSolucion);
		}	
			
 		//++
		

	    global $Horas;
	    global $Minutos;
		global $Segundos;
		
		$Minutos=floor(($Final->TotalHorasSolucion->GetValue() / 60)%60);
		
		$Segundos=($Final->TotalHorasSolucion->GetValue() % 60);
		
		
		$Horas= floor((($Final->TotalHorasSolucion->GetValue()) / 60)/60);
	//	$Minutos= ($mc_detalle_incidente_avl->Horas->GetValue()) % 60;
		
	//	$Horas= floor($mc_detalle_incidente_avl->Horas->GetValue() / 60);
	//	$Minutos= $mc_detalle_incidente_avl->Horas->GetValue() % 60;
	
		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
	
		
		if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$Final->TotalHorasSolucion->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$Final->TotalHorasSolucion->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$Final->TotalHorasSolucion->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$Final->TotalHorasSolucion->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}



    // Write your own code here.
// -------------------------
//End Custom Code

//Close Final_TotalHorasSolucion_BeforeShow @229-D0A1BF45
    return $Final_TotalHorasSolucion_BeforeShow;
}
//End Close Final_TotalHorasSolucion_BeforeShow

//Final_ImageLink1_BeforeShow @250-8B877E2D
function Final_ImageLink1_BeforeShow(& $sender)
{
    $Final_ImageLink1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Final; //Compatibility
//End Final_ImageLink1_BeforeShow

//Custom Code @252-2A29BDB7
// -------------------------
	global $Redirec;
   	$Redirec =  "IncidenteDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","export"),"ccsForm"),"export","1");
	$Final->ImageLink1->SetLink($Redirec);

	if (CCGetUserLogin()=="omendoza")
		{
			$Final->ImageLink1->Visible=true;
		}
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Final_ImageLink1_BeforeShow @250-44BADD6F
    return $Final_ImageLink1_BeforeShow;
}
//End Close Final_ImageLink1_BeforeShow

//Final_HorasCursoAResuelto_BeforeShow @260-3214D1A4
function Final_HorasCursoAResuelto_BeforeShow(& $sender)
{
    $Final_HorasCursoAResuelto_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Final; //Compatibility
//End Final_HorasCursoAResuelto_BeforeShow

//Custom Code @261-2A29BDB7
// -------------------------
	global $TiempoCursoaResuelto;
	$Final->HorasCursoAResuelto->SetValue($TiempoCursoaResuelto);
	
	    global $Horas;
	    global $Minutos;
		global $Segundos;
		
		$Minutos=floor(($Final->HorasCursoAResuelto->GetValue() / 60)%60);
		
		$Segundos=($Final->HorasCursoAResuelto->GetValue() % 60);
		
		
		$Horas= floor((($Final->HorasCursoAResuelto->GetValue()) / 60)/60);
	//	$Minutos= ($mc_detalle_incidente_avl->Horas->GetValue()) % 60;
		
	//	$Horas= floor($mc_detalle_incidente_avl->Horas->GetValue() / 60);
	//	$Minutos= $mc_detalle_incidente_avl->Horas->GetValue() % 60;
	
		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
	
		
		if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$Final->HorasCursoAResuelto->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$Final->HorasCursoAResuelto->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$Final->HorasCursoAResuelto->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$Final->HorasCursoAResuelto->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}
		
		global $Final;
		global $mc_calificacion_incidente;
		
		if ($mc_calificacion_incidente->CheckBox1->GetValue()==1){
			global $Tpl;
			$Tpl->SetVar("tFinal",$Final->HorasCursoAResuelto->GetValue());
		} else {
	    	global $Tpl;
			$Tpl->SetVar("tFinal",$Final->TotalHorasSolucion->GetValue());
		}

// -------------------------
//End Custom Code

//Close Final_HorasCursoAResuelto_BeforeShow @260-DC661D96
    return $Final_HorasCursoAResuelto_BeforeShow;
}
//End Close Final_HorasCursoAResuelto_BeforeShow

//Final_OnValidate @227-6ACE2ADC
function Final_OnValidate(& $sender)
{
    $Final_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Final; //Compatibility
//End Final_OnValidate

//Custom Code @249-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Final_OnValidate @227-EC082324
    return $Final_OnValidate;
}
//End Close Final_OnValidate

//Final_BeforeShow @227-8FB3F794
function Final_BeforeShow(& $sender)
{
    $Final_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Final; //Compatibility
//End Final_BeforeShow

//Custom Code @251-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Final_BeforeShow @227-D3F347AD
    return $Final_BeforeShow;
}
//End Close Final_BeforeShow

//mc_incidentes_reasignacio_primera_fecha_asignacion_BeforeShow @358-661E3EC9
function mc_incidentes_reasignacio_primera_fecha_asignacion_BeforeShow(& $sender)
{
    $mc_incidentes_reasignacio_primera_fecha_asignacion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_incidentes_reasignacio; //Compatibility
//End mc_incidentes_reasignacio_primera_fecha_asignacion_BeforeShow

//Close mc_incidentes_reasignacio_primera_fecha_asignacion_BeforeShow @358-1F00F56A
    return $mc_incidentes_reasignacio_primera_fecha_asignacion_BeforeShow;
}
//End Close mc_incidentes_reasignacio_primera_fecha_asignacion_BeforeShow

//mc_incidentes_reasignacio_primera_fecha_encurso_BeforeShow @360-1670BEB9
function mc_incidentes_reasignacio_primera_fecha_encurso_BeforeShow(& $sender)
{
    $mc_incidentes_reasignacio_primera_fecha_encurso_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_incidentes_reasignacio; //Compatibility
//End mc_incidentes_reasignacio_primera_fecha_encurso_BeforeShow

//Close mc_incidentes_reasignacio_primera_fecha_encurso_BeforeShow @360-79CBAA51
    return $mc_incidentes_reasignacio_primera_fecha_encurso_BeforeShow;
}
//End Close mc_incidentes_reasignacio_primera_fecha_encurso_BeforeShow

//mc_incidentes_reasignacio_horas_invertidas_BeforeShow @362-A4224D50
function mc_incidentes_reasignacio_horas_invertidas_BeforeShow(& $sender)
{
    $mc_incidentes_reasignacio_horas_invertidas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_incidentes_reasignacio; //Compatibility
//End mc_incidentes_reasignacio_horas_invertidas_BeforeShow

//Custom Code @367-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_incidentes_reasignacio_horas_invertidas_BeforeShow @362-2F6C092A
    return $mc_incidentes_reasignacio_horas_invertidas_BeforeShow;
}
//End Close mc_incidentes_reasignacio_horas_invertidas_BeforeShow

//mc_incidentes_reasignacio_ds_AfterExecuteInsert @347-E7167F6C
function mc_incidentes_reasignacio_ds_AfterExecuteInsert(& $sender)
{
    $mc_incidentes_reasignacio_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_incidentes_reasignacio; //Compatibility
//End mc_incidentes_reasignacio_ds_AfterExecuteInsert

//Custom Code @377-2A29BDB7
// -------------------------
  	global $id_insertado;
  	global $fech_ini;
  	global $fech_fin;
  	global $calculo_tiempo;
  	global $DBcnDisenio;
  	
  	$id_insertado=CCDLookUp("max(id)","mc_incidentes_reasignaciones"," 1=1 ", $DBcnDisenio);
  	$fecha_ini=CCDLookUp("primera_fecha_asignacion","mc_incidentes_reasignaciones"," id=".$id_insertado, $DBcnDisenio);
  	$fecha_fin=CCDLookUp("primera_fecha_encurso","mc_incidentes_reasignaciones"," id=".$id_insertado, $DBcnDisenio);
  	$calculo_tiempo_seg=CCDLookUp("top 1 dbo.ufDiffFechasMCSec('".$fecha_ini."','".$fecha_fin."')","mc_incidentes_reasignaciones"," 1=1", $DBcnDisenio);
  
  	$DBcnDisenio->query("UPDATE mc_incidentes_reasignaciones set horas_invertidas = " . $calculo_tiempo_seg . " where id=".$id_insertado);
  
  	$mc_incidentes_reasignacio->horas_invertidas->SetValue(sec_to_time($mc_incidentes_reasignacio->H_horas_invertidas->GetValue()));

// -------------------------
//End Custom Code

//Close mc_incidentes_reasignacio_ds_AfterExecuteInsert @347-53DE6FE6
    return $mc_incidentes_reasignacio_ds_AfterExecuteInsert;
}
//End Close mc_incidentes_reasignacio_ds_AfterExecuteInsert

//mc_incidentes_reasignacio_BeforeShow @347-36DEE836
function mc_incidentes_reasignacio_BeforeShow(& $sender)
{
    $mc_incidentes_reasignacio_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_incidentes_reasignacio; //Compatibility
//End mc_incidentes_reasignacio_BeforeShow

//Custom Code @378-2A29BDB7
// -------------------------
	global $mc_info_incidentes2;
	global $existe_actualizacion_asignacion;	
	$mc_incidentes_reasignacio->Visible=$existe_actualizacion_asignacion < 1 && $mc_info_incidentes2->HorasInvertidas->GetValue()!='N/A Incumplimiento a Proceso' ? false : true;
	$mc_incidentes_reasignacio->horas_invertidas->SetValue(sec_to_time($mc_incidentes_reasignacio->H_horas_invertidas->GetValue()));	

   
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_incidentes_reasignacio_BeforeShow @347-E452A13F
    return $mc_incidentes_reasignacio_BeforeShow;
}
//End Close mc_incidentes_reasignacio_BeforeShow

//mc_incidentes_reasignacio_AfterUpdate @347-FDC2C17A
function mc_incidentes_reasignacio_AfterUpdate(& $sender)
{
    $mc_incidentes_reasignacio_AfterUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_incidentes_reasignacio; //Compatibility
//End mc_incidentes_reasignacio_AfterUpdate

//Custom Code @380-2A29BDB7
// -------------------------
	global $DBcnDisenio;
  	//echo("  id_incidente =".CCGetParam("Id_incidente",0). " and mes =". CCGetParam("s_mes_param",0). " and anio ". CCGetParam("s_anio_param",0)); die;
  	//$fecha_ini=CCDLookUp("primera_fecha_asignacion","mc_incidentes_reasignaciones","  id_incidente ='".CCGetParam("Id_incidente",0). "' and mes =". CCGetParam("s_mes_param",0). " and anio ". CCGetParam("s_anio_param",0), $DBcnDisenio);
  	//echo("fecha_ini=>".$fecha_ini."<br>");
  	//$fecha_fin=CCDLookUp("primera_fecha_encurso","mc_incidentes_reasignaciones","  id_incidente ='".CCGetParam("Id_incidente",0). "' and mes =". CCGetParam("s_mes_param",0). " and anio ". CCGetParam("s_anio_param",0), $DBcnDisenio);
  	//echo("fecha_fin=>".$fecha_fin."<br>");
  	//$calculo_tiempo_seg=CCDLookUp("top 1 dbo.ufDiffFechasMCSec('".$fecha_ini."','".$fecha_fin."')","mc_incidentes_reasignaciones"," 1=1", $DBcnDisenio);
  	//echo("=>".$calculo_tiempo_seg);die;
  	//echo($fecha_ini);
	//echo("UPDATE mc_incidentes_reasignaciones set horas_invertidas = dbo.ufDiffFechasMCSec(primera_fecha_asignacion,primera_fecha_encurso) where id_incidente='".CCGetParam("Id_incidente",0). "' and mes =". CCGetParam("s_mes_param",0). " and anio ". CCGetParam("s_anio_param",0));  	
  	//die;
  	$DBcnDisenio->query("UPDATE mc_incidentes_reasignaciones set horas_invertidas = dbo.ufDiffFechasMCSec(primera_fecha_asignacion,primera_fecha_encurso) where id_incidente='".CCGetParam("Id_incidente",0). "' and mes =". CCGetParam("s_mes_param",0). " and anio =". CCGetParam("s_anio_param",0));
	//echo("UPDATE mc_incidentes_reasignaciones set horas_invertidas = " . $calculo_tiempo_seg . " where id_incidente=".CCGetParam("Id_incidente",0). " and mes =". CCGetParam("s_mes_param",0). " and anio ". CCGetParam("s_anio_param",0));die;
  
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_incidentes_reasignacio_AfterUpdate @347-000684DC
    return $mc_incidentes_reasignacio_AfterUpdate;
}
//End Close mc_incidentes_reasignacio_AfterUpdate

//DEL  // -------------------------
//DEL  	$mc_incidentes_reasignacio->horas_invertidas->SetValue(sec_to_time($mc_incidentes_reasignacio->H_horas_invertidas->GetValue()));
//DEL      // Write your own code here.
//DEL  // -------------------------

//DEL  // -------------------------
//DEL  	global $id_insertado;
//DEL  	global $fech_ini;
//DEL  	global $fech_fin;
//DEL  	global $calculo_tiempo;
//DEL  	global $DBcnDisenio;
//DEL  	
//DEL  	$id_insertado=CCDLookUp("max(id)","mc_incidentes_reasignaciones"," 1=1 ", $DBcnDisenio);
//DEL  	$fecha_ini=CCDLookUp("primera_fecha_asignacion","mc_incidentes_reasignaciones"," id=".$id_insertado, $DBcnDisenio);
//DEL  	$fecha_fin=CCDLookUp("primera_fecha_encurso","mc_incidentes_reasignaciones"," id=".$id_insertado, $DBcnDisenio);
//DEL  	$calculo_tiempo_seg=CCDLookUp("top 1 dbo.ufDiffFechasMCSec('".$fecha_ini."','".$fecha_fin."')","mc_incidentes_reasignaciones"," 1=1", $DBcnDisenio);
//DEL  
//DEL  	$DBcnDisenio->query("UPDATE mc_incidentes_reasignaciones set horas_invertidas = " . $calculo_tiempo_seg );
//DEL  
//DEL  // -------------------------

//DEL  // -------------------------
//DEL  	$mc_incidentes_reasignacio->horas_invertidas->SetValue(sec_to_time($mc_incidentes_reasignacio->H_horas_invertidas->GetValue()));
//DEL      // Write your own code here.
//DEL  // -------------------------

//Page_BeforeInitialize @1-5C1E5C56
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidenteDetalle; //Compatibility
//End Page_BeforeInitialize

//Custom Code @139-2A29BDB7
// -------------------------

	global $ExisteServicio;
	global $ExisteAplicacion;
	global $TipoCalculoTiempo;
	global $TiempoAtencion;
	global $TiempoSolucion;
	global $TiempoPaquetes;
	global $TiempoConcluidaResuelto;
	global $TiempoCursoaResuelto;

	global $Calificado;	
	
	$Calificado=0;
	
	$TipoCalculoTiempo=1;  // 0= Default , 1= Sin Paquetes toma el tiempo en curso a resuelto , 2= Si tiene 2 paquetes toma el de mayor tiempo, 3= toma los paquetes de mayor duración y quita los que coincidan con las fechas 4= En cascada

	global $miArray;
  	global $arrayMovimiento;
  	global $arraySegundos;
  	global $arrayFechaIni;
  	global $arrayFechaFin;
  	
  	
  	$arrayMovimiento=array();
  	$arraySegundos= array();

  	$arrayFechaIni= array();
  	$arrayFechaFin=array();
  
  	
  	$miArray = unserialize($_SESSION['SQL']);   //array();

	global $existe_actualizacion_asignacion;
	global $nueva_fecha_asignacion;
	global $nueva_fecha_encurso;
	global $nuevas_horas_invertidas;

	global $DBcnDisenio;
	$DBcnDisenio = new clsDBcnDisenio;
	$existe_actualizacion_asignacion=0;
	$existe_actualizacion_asignacion=CCDLookUp("count(*)","mc_incidentes_reasignaciones"," id_incidente='".CCGetParam("Id_incidente",0)."' and mes=".CCGetParam("s_mes_param",0)." and anio=".CCGetParam("s_anio_param",0), $DBcnDisenio);
	if ($existe_actualizacion_asignacion > 0){
		$nueva_fecha_asignacion=CCDLookUp("convert(varchar(30),primera_fecha_asignacion,103) + ' ' + convert(varchar(30),primera_fecha_asignacion,108)","mc_incidentes_reasignaciones"," id_incidente='".CCGetParam("Id_incidente",0)."' and mes=".CCGetParam("s_mes_param",0)." and anio=".CCGetParam("s_anio_param",0), $DBcnDisenio);
		$nueva_fecha_encurso=CCDLookUp("convert(varchar(30),primera_fecha_encurso,103) + ' ' + convert(varchar(30),primera_fecha_encurso,108)","mc_incidentes_reasignaciones"," id_incidente='".CCGetParam("Id_incidente",0)."' and mes=".CCGetParam("s_mes_param",0)." and anio=".CCGetParam("s_anio_param",0), $DBcnDisenio);	
		$nuevas_horas_invertidas=CCDLookUp("horas_invertidas","mc_incidentes_reasignaciones"," id_incidente='".CCGetParam("Id_incidente",0)."' and mes=".CCGetParam("s_mes_param",0)." and anio=".CCGetParam("s_anio_param",0), $DBcnDisenio);			
	}	
	
    $DBcnDisenio->close();
	
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

//Page_BeforeShow @1-7D9E16AE
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidenteDetalle; //Compatibility
//End Page_BeforeShow

//Custom Code @140-2A29BDB7
// -------------------------
	global $miArray;
  	
  	$clave= array_search(CCGetParam("Id_incidente",0),$miArray );

  	global $claveAnterior;
  	global $claveSiguiente;

	$result= count($miArray)-1;
  	

	if ($clave==1) 
	{
		$claveAnterior=0;
		$claveSiguiente=$clave+1;
		}
	else
	{
		if ($result>$clave)
		{
			$claveAnterior=$clave-1;
			$claveSiguiente=$clave+1;	
		}
		else
		{
			if ($result=$clave)
			{
				$claveAnterior=$clave-1;
				$claveSiguiente=$clave;	
				
				}
			else
			{
				$claveAnterior=$clave-1;
				$claveSiguiente=$clave+1;	
			}
		}
	}

    





// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_OnInitializeView @1-F6618F35
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidenteDetalle; //Compatibility
//End Page_OnInitializeView

//Custom Code @247-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_AfterInitialize @1-93EB6294
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $IncidenteDetalle; //Compatibility
//End Page_AfterInitialize

//Custom Code @253-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize

function sec_to_time($tiempo_en_segundos){
	if ($tiempo_en_segundos > 0) {
		$horas = floor($tiempo_en_segundos / 3600);
		$minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
		$segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);
		$horas = $horas < 10 ? '0'.$horas:$horas;
		$minutos = $minutos < 10 ? '0'.$minutos:$minutos;
		$segundos = $segundos < 10 ? '0'.$segundos:$segundos;
		
		return $horas . ':' . $minutos . ":" . $segundos;		
	} 
	else {
		if ($tiempo_en_segundos < 0){
		 return 'N/A';	
		}
		else {
		 return '00:00:00';				
		}	
	}
}	

?>
