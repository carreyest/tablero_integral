<?php
//BindEvents Method @1-0FF530D5
function BindEvents()
{
    global $mc_info_incidentes;
    global $mc_info_incidentes1;
    global $mc_c_aplicacion;
    global $mc_info_incidentes2;
    global $mc_detalle_incidente_avl;
    global $mc_info_incidentes3;
    global $mc_info_incidentes4;
    global $Final;
    global $mc_calificacion_incidente;
    $mc_info_incidentes->CCSEvents["BeforeShow"] = "mc_info_incidentes_BeforeShow";
    $mc_info_incidentes1->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes1_HorasInvertidas_BeforeShow";
    $mc_info_incidentes1->CCSEvents["BeforeShow"] = "mc_info_incidentes1_BeforeShow";
    $mc_c_aplicacion->lblTiempoAtencion->CCSEvents["BeforeShow"] = "mc_c_aplicacion_lblTiempoAtencion_BeforeShow";
    $mc_c_aplicacion->lblTiempoSolucion->CCSEvents["BeforeShow"] = "mc_c_aplicacion_lblTiempoSolucion_BeforeShow";
    $mc_info_incidentes2->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes2_HorasInvertidas_BeforeShow";
    $mc_detalle_incidente_avl->Horas->CCSEvents["BeforeShow"] = "mc_detalle_incidente_avl_Horas_BeforeShow";
    $mc_detalle_incidente_avl->Paquete->CCSEvents["BeforeShow"] = "mc_detalle_incidente_avl_Paquete_BeforeShow";
    $mc_detalle_incidente_avl->TotalHoras->CCSEvents["BeforeShow"] = "mc_detalle_incidente_avl_TotalHoras_BeforeShow";
    $mc_detalle_incidente_avl->CCSEvents["BeforeShow"] = "mc_detalle_incidente_avl_BeforeShow";
    $mc_detalle_incidente_avl->CCSEvents["BeforeShowRow"] = "mc_detalle_incidente_avl_BeforeShowRow";
    $mc_detalle_incidente_avl->ds->CCSEvents["AfterExecuteSelect"] = "mc_detalle_incidente_avl_ds_AfterExecuteSelect";
    $mc_info_incidentes3->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes3_HorasInvertidas_BeforeShow";
    $mc_info_incidentes4->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes4_HorasInvertidas_BeforeShow";
    $mc_info_incidentes4->CCSEvents["BeforeShow"] = "mc_info_incidentes4_BeforeShow";
    $Final->TotalHorasSolucion->CCSEvents["BeforeShow"] = "Final_TotalHorasSolucion_BeforeShow";
    $Final->ImageLink1->CCSEvents["BeforeShow"] = "Final_ImageLink1_BeforeShow";
    $Final->HorasCursoAResuelto->CCSEvents["BeforeShow"] = "Final_HorasCursoAResuelto_BeforeShow";
    $Final->CCSEvents["OnValidate"] = "Final_OnValidate";
    $Final->CCSEvents["BeforeShow"] = "Final_BeforeShow";
    $mc_calificacion_incidente->CCSEvents["BeforeShow"] = "mc_calificacion_incidente_BeforeShow";
}
//End BindEvents Method

//mc_info_incidentes_BeforeShow @20-64F4663D
function mc_info_incidentes_BeforeShow(& $sender)
{
    $mc_info_incidentes_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes; //Compatibility
//End mc_info_incidentes_BeforeShow

//Custom Code @36-2A29BDB7
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
		
// -------------------------
//End Custom Code

//Close mc_info_incidentes_BeforeShow @20-F01FD70E
    return $mc_info_incidentes_BeforeShow;
}
//End Close mc_info_incidentes_BeforeShow

//mc_info_incidentes1_HorasInvertidas_BeforeShow @41-C54FDBBF
function mc_info_incidentes1_HorasInvertidas_BeforeShow(& $sender)
{
    $mc_info_incidentes1_HorasInvertidas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes1; //Compatibility
//End mc_info_incidentes1_HorasInvertidas_BeforeShow

//Custom Code @42-2A29BDB7
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
		if ($Segundos<0){$Segundos=0;}
		if ($Horas<10) {
			if ($Segundos<10) {
				if ($Minutos<0){$Minutos=0;}
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
		} else {
			if ($Segundos<10) {
				if ($Minutos<0){$Minutos=0;}	
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
		$mc_info_incidentes1->HorasInvertidas->SetValue('00:00:00');
	}
	
// -------------------------
//End Custom Code

//Close mc_info_incidentes1_HorasInvertidas_BeforeShow @41-C886F102
    return $mc_info_incidentes1_HorasInvertidas_BeforeShow;
}
//End Close mc_info_incidentes1_HorasInvertidas_BeforeShow

//mc_info_incidentes1_BeforeShow @38-FFDA1A76
function mc_info_incidentes1_BeforeShow(& $sender)
{
    $mc_info_incidentes1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes1; //Compatibility
//End mc_info_incidentes1_BeforeShow

//Custom Code @43-2A29BDB7
// -------------------------

	global $db;
	global $FechaAsignado;
	global $FechaenCurso;

	$mc_info_incidentes1->FechaAsignado->SetValue(CCFormatDate(CCParseDate($FechaAsignado,array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));
	$mc_info_incidentes1->FechaEnCurso->SetValue(CCFormatDate(CCParseDate($FechaenCurso,array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));

	$db= new clsDBcnDisenio;
	$db->query("SELECT dbo.ufDiffFechasMCSec('".$FechaAsignado."','".$FechaenCurso."') as Minutos");
	if($db->next_record()){
		$MinutosF= $db->f("Minutos");
		$mc_info_incidentes1->HorasInvertidas->SetValue($MinutosF);
	}
	$db->close();
 
// -------------------------
//End Custom Code

//Close mc_info_incidentes1_BeforeShow @38-D01C7638
    return $mc_info_incidentes1_BeforeShow;
}
//End Close mc_info_incidentes1_BeforeShow

//mc_c_aplicacion_lblTiempoAtencion_BeforeShow @48-3E0EB450
function mc_c_aplicacion_lblTiempoAtencion_BeforeShow(& $sender)
{
    $mc_c_aplicacion_lblTiempoAtencion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_aplicacion; //Compatibility
//End mc_c_aplicacion_lblTiempoAtencion_BeforeShow

//Custom Code @49-2A29BDB7
// -------------------------
	if ($mc_c_aplicacion->lblTiempoAtencion->GetValue()>0) {
	    global $Horas;
	    global $Minutos;
		global $Segundos;
		
		$Minutos=floor(($mc_c_aplicacion->lblTiempoAtencion->GetValue() / 60)%60);
		$Segundos=($mc_c_aplicacion->lblTiempoAtencion->GetValue() % 60);
		$Horas= floor((($mc_c_aplicacion->lblTiempoAtencion->GetValue()) / 60)/60);
	
		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
	
	if ($Horas<10)
	{
		if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$mc_c_aplicacion->lblTiempoAtencion->SetValue("0" . $Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$mc_c_aplicacion->lblTiempoAtencion->SetValue("0" . $Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$mc_c_aplicacion->lblTiempoAtencion->SetValue("0" . $Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$mc_c_aplicacion->lblTiempoAtencion->SetValue("0" . $Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}
	}
	
	else
	{
		if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$mc_c_aplicacion->lblTiempoAtencion->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$mc_c_aplicacion->lblTiempoAtencion->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$mc_c_aplicacion->lblTiempoAtencion->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$mc_c_aplicacion->lblTiempoAtencion->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}

	}
	
	}
	else
	{
//		$mc_info_incidentes2->HorasInvertidas->SetValue('00:00:00');
		$mc_c_aplicacion->lblTiempoAtencion->SetValue('No Aplica');

	}


    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_c_aplicacion_lblTiempoAtencion_BeforeShow @48-86A90362
    return $mc_c_aplicacion_lblTiempoAtencion_BeforeShow;
}
//End Close mc_c_aplicacion_lblTiempoAtencion_BeforeShow

//mc_c_aplicacion_lblTiempoSolucion_BeforeShow @50-745752A7
function mc_c_aplicacion_lblTiempoSolucion_BeforeShow(& $sender)
{
    $mc_c_aplicacion_lblTiempoSolucion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_aplicacion; //Compatibility
//End mc_c_aplicacion_lblTiempoSolucion_BeforeShow

//Custom Code @51-2A29BDB7
// -------------------------
	if ($mc_c_aplicacion->lblTiempoSolucion->GetValue()>0) 
	{

	    global $Horas;
	    global $Minutos;
		global $Segundos;
		
		$Minutos=floor(($mc_c_aplicacion->lblTiempoSolucion->GetValue() / 60)%60);
		
		$Segundos=($mc_c_aplicacion->lblTiempoSolucion->GetValue() % 60);
		
		
		$Horas= floor((($mc_c_aplicacion->lblTiempoSolucion->GetValue()) / 60)/60);
	//	$Minutos= ($mc_detalle_incidente_avl->Horas->GetValue()) % 60;
		
	//	$Horas= floor($mc_detalle_incidente_avl->Horas->GetValue() / 60);
	//	$Minutos= $mc_detalle_incidente_avl->Horas->GetValue() % 60;
	
		if ($Horas<0){$Horas=0;}
		if ($Minutos<0){$Minutos=0;}
		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
	
	if ($Horas<10)
	{
		if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$mc_c_aplicacion->lblTiempoSolucion->SetValue("0" . $Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$mc_c_aplicacion->lblTiempoSolucion->SetValue("0" . $Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$mc_c_aplicacion->lblTiempoSolucion->SetValue("0" . $Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$mc_c_aplicacion->lblTiempoSolucion->SetValue("0" . $Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}
	}
	
	else
	{
		if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$mc_c_aplicacion->lblTiempoSolucion->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$mc_c_aplicacion->lblTiempoSolucion->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$mc_c_aplicacion->lblTiempoSolucion->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$mc_c_aplicacion->lblTiempoSolucion->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}

	}
	
	}
	else
	{
//		$mc_info_incidentes2->HorasInvertidas->SetValue('00:00:00');
		$mc_c_aplicacion->lblTiempoSolucion->SetValue('No Aplica');

	}

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_c_aplicacion_lblTiempoSolucion_BeforeShow @50-F60A9205
    return $mc_c_aplicacion_lblTiempoSolucion_BeforeShow;
}
//End Close mc_c_aplicacion_lblTiempoSolucion_BeforeShow

//mc_info_incidentes2_HorasInvertidas_BeforeShow @56-C51331A9
function mc_info_incidentes2_HorasInvertidas_BeforeShow(& $sender)
{
    $mc_info_incidentes2_HorasInvertidas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes2; //Compatibility
//End mc_info_incidentes2_HorasInvertidas_BeforeShow

//Custom Code @57-2A29BDB7
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
		$mc_info_incidentes2->HorasInvertidas->SetValue('No Aplica');
	}

    
// -------------------------
//End Custom Code

//Close mc_info_incidentes2_HorasInvertidas_BeforeShow @56-8C27D41A
    return $mc_info_incidentes2_HorasInvertidas_BeforeShow;
}
//End Close mc_info_incidentes2_HorasInvertidas_BeforeShow

//mc_detalle_incidente_avl_Horas_BeforeShow @70-5AC19451
function mc_detalle_incidente_avl_Horas_BeforeShow(& $sender)
{
    $mc_detalle_incidente_avl_Horas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_Horas_BeforeShow

//Custom Code @71-2A29BDB7
// -------------------------
    global $Horas;
    global $Minutos;
	global $Segundos;
	
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

// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_Horas_BeforeShow @70-B16B6D7D
    return $mc_detalle_incidente_avl_Horas_BeforeShow;
}
//End Close mc_detalle_incidente_avl_Horas_BeforeShow

//mc_detalle_incidente_avl_Paquete_BeforeShow @73-BFE97FE9
function mc_detalle_incidente_avl_Paquete_BeforeShow(& $sender)
{
    $mc_detalle_incidente_avl_Paquete_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_Paquete_BeforeShow

//Custom Code @74-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_Paquete_BeforeShow @73-25F20F08
    return $mc_detalle_incidente_avl_Paquete_BeforeShow;
}
//End Close mc_detalle_incidente_avl_Paquete_BeforeShow

//mc_detalle_incidente_avl_TotalHoras_BeforeShow @77-2C098D34
function mc_detalle_incidente_avl_TotalHoras_BeforeShow(& $sender)
{
    $mc_detalle_incidente_avl_TotalHoras_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_TotalHoras_BeforeShow

//Custom Code @78-2A29BDB7
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
	//	$Minutos= ($mc_detalle_incidente_avl->Horas->GetValue()) % 60;
		
	//	$Horas= floor($mc_detalle_incidente_avl->Horas->GetValue() / 60);
	//	$Minutos= $mc_detalle_incidente_avl->Horas->GetValue() % 60;
	
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

	}

	
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_TotalHoras_BeforeShow @77-E6F13F37
    return $mc_detalle_incidente_avl_TotalHoras_BeforeShow;
}
//End Close mc_detalle_incidente_avl_TotalHoras_BeforeShow

//mc_detalle_incidente_avl_BeforeShow @59-E896C520
function mc_detalle_incidente_avl_BeforeShow(& $sender)
{
    $mc_detalle_incidente_avl_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_BeforeShow

//Custom Code @80-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_BeforeShow @59-9F51EFBD
    return $mc_detalle_incidente_avl_BeforeShow;
}
//End Close mc_detalle_incidente_avl_BeforeShow

//mc_detalle_incidente_avl_BeforeShowRow @59-C730B84D
function mc_detalle_incidente_avl_BeforeShowRow(& $sender)
{
    $mc_detalle_incidente_avl_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_BeforeShowRow

//Custom Code @81-2A29BDB7
// -------------------------
    global $sPaquete;

/*
  	global $arrayMovimiento;
  	global $arraySegundos;
  	global $arrayFechaIni;
    global $arrayFechaFin;

    
	global $sMovimiento;
	global $TiempoMovimiento;
	global $TiempoPaquetes;
	global $OpcionMovimiento;	

	//global $index;
	
	$OpcionMovimiento=1;
//	echo $TiempoPaquetes;
//	$TiempoPaquetes=1;
	
	switch ($OpcionMovimiento)
	{
		case 1:
				if ($mc_detalle_incidente_avl->Horas->GetValue()>0 )
     			{ 	array_push($arrayMovimiento,$mc_detalle_incidente_avl->ClaveMovimiento->GetValue());
				 	array_push($arraySegundos,$mc_detalle_incidente_avl->Horas->GetValue());
				 	array_push($arrayFechaIni,$mc_detalle_incidente_avl->FechaInicioMov->GetValue());
				 	array_push($arrayFechaFin,$mc_detalle_incidente_avl->FechaFinMov->GetValue());
     			}
		break;

	//codigo de la opción que toma el paquete con mayor tiempo de duración				
		case 2:
		
			if ($TiempoPaquetes<$mc_detalle_incidente_avl->sTotalSecPaquete->GetValue())
				{
					$TiempoPaquetes=$mc_detalle_incidente_avl->sTotalSecPaquete->GetValue();	
				}
//			echo $TiempoPaquetes . "<br>";
			
		break;

	}
*/	
	if ($sPaquete == $mc_detalle_incidente_avl->Paquete->GetValue())
	
	   {
		
	//	$mc_detalle_incidente_avl->Paquete->Visible=false;
		$mc_detalle_incidente_avl->Panel1->Visible=false;
		$mc_detalle_incidente_avl->Panel2->Visible=false;
						
	   } 
	   else 
	   {
	    global $Tpl;
		$Tpl->SetVar("iRows",$mc_detalle_incidente_avl->DataSource->f("CountPaquete"));
	   	$sPaquete = $mc_detalle_incidente_avl->Paquete->GetValue();
	   	$mc_detalle_incidente_avl->Panel1->Visible=true;
	   	$mc_detalle_incidente_avl->Panel2->Visible=true;
									
	   }

	
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_BeforeShowRow @59-DAC72CCB
    return $mc_detalle_incidente_avl_BeforeShowRow;
}
//End Close mc_detalle_incidente_avl_BeforeShowRow

//mc_detalle_incidente_avl_ds_AfterExecuteSelect @59-C3EC0330
function mc_detalle_incidente_avl_ds_AfterExecuteSelect(& $sender)
{
    $mc_detalle_incidente_avl_ds_AfterExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_detalle_incidente_avl; //Compatibility
//End mc_detalle_incidente_avl_ds_AfterExecuteSelect

//Custom Code @82-2A29BDB7
// -------------------------
//   global $Tpl;
//  	$Tpl->SetVar("iRows",$mc_detalle_incidente_avl->DataSource->CountPaquete);

//  	$Tpl->SetVar("iRows",$mc_detalle_incidente_avl->DataSource->RecordsCount);
   // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_detalle_incidente_avl_ds_AfterExecuteSelect @59-C1CE9C05
    return $mc_detalle_incidente_avl_ds_AfterExecuteSelect;
}
//End Close mc_detalle_incidente_avl_ds_AfterExecuteSelect

//mc_info_incidentes3_HorasInvertidas_BeforeShow @86-C527685B
function mc_info_incidentes3_HorasInvertidas_BeforeShow(& $sender)
{
    $mc_info_incidentes3_HorasInvertidas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes3; //Compatibility
//End mc_info_incidentes3_HorasInvertidas_BeforeShow

//Custom Code @87-2A29BDB7
// -------------------------
	global $TiempoConcluidaResuelto;	
	global $SegundosTotalesSolucion;
	$SegundosTotalesSolucion=$SegundosTotalesSolucion+$mc_info_incidentes3->HorasInvertidas->GetValue();

	$TiempoConcluidaResuelto=$mc_info_incidentes3->HorasInvertidas->GetValue();

	
	if ($mc_info_incidentes3->HorasInvertidas->GetValue()>0 )
	{
	

	    global $Horas;
	    global $Minutos;
		global $Segundos;
		
		$Minutos=floor(($mc_info_incidentes3->HorasInvertidas->GetValue() / 60)%60);
		
		$Segundos=($mc_info_incidentes3->HorasInvertidas->GetValue() % 60);
		
		
		$Horas= floor((($mc_info_incidentes3->HorasInvertidas->GetValue()) / 60)/60);
	//	$Minutos= ($mc_detalle_incidente_avl->Horas->GetValue()) % 60;
		
	//	$Horas= floor($mc_detalle_incidente_avl->Horas->GetValue() / 60);
	//	$Minutos= $mc_detalle_incidente_avl->Horas->GetValue() % 60;
	
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
		$mc_info_incidentes3->HorasInvertidas->SetValue('00:00:00');
	}
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes3_HorasInvertidas_BeforeShow @86-B0473712
    return $mc_info_incidentes3_HorasInvertidas_BeforeShow;
}
//End Close mc_info_incidentes3_HorasInvertidas_BeforeShow

//mc_info_incidentes4_HorasInvertidas_BeforeShow @93-C5AAE585
function mc_info_incidentes4_HorasInvertidas_BeforeShow(& $sender)
{
    $mc_info_incidentes4_HorasInvertidas_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes4; //Compatibility
//End mc_info_incidentes4_HorasInvertidas_BeforeShow

//Custom Code @94-2A29BDB7
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
	} else {
		$mc_info_incidentes4->HorasInvertidas->SetValue('00:00:00');
	}
// -------------------------
//End Custom Code

//Close mc_info_incidentes4_HorasInvertidas_BeforeShow @93-05659E2A
    return $mc_info_incidentes4_HorasInvertidas_BeforeShow;
}
//End Close mc_info_incidentes4_HorasInvertidas_BeforeShow

//mc_info_incidentes4_BeforeShow @90-D93A4608
function mc_info_incidentes4_BeforeShow(& $sender)
{
    $mc_info_incidentes4_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_info_incidentes4; //Compatibility
//End mc_info_incidentes4_BeforeShow

//Custom Code @95-2A29BDB7
// -------------------------
	global $db;
	global $FechaResuelto;
	global $FechaenCurso;

	global $Horas;
	global $MinutosF;

	$mc_info_incidentes4->FechaResuelto->SetValue(CCFormatDate(CCParseDate($FechaResuelto,array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));
	$mc_info_incidentes4->FechaEnCurso->SetValue(CCFormatDate(CCParseDate($FechaenCurso,array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));

	
	$db= new clsDBcnDisenio;
	$db->query("SELECT dbo.ufDiffFechasMCSec('".$FechaenCurso."','".$FechaResuelto."') as Minutos");
	if($db->next_record()){

	//$DBcnDisenio->next_record()
	$MinutosF= $db->f("Minutos");
		global $HorasCursoAResuelto; 
		$HorasCursoAResuelto=$MinutosF;
		$mc_info_incidentes4->HorasInvertidas->SetValue($MinutosF);

	}
	$db->close();
	
// -------------------------
//End Custom Code

//Close mc_info_incidentes4_BeforeShow @90-54BF1855
    return $mc_info_incidentes4_BeforeShow;
}
//End Close mc_info_incidentes4_BeforeShow

//Final_TotalHorasSolucion_BeforeShow @98-B78AD150
function Final_TotalHorasSolucion_BeforeShow(& $sender)
{
    $Final_TotalHorasSolucion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Final; //Compatibility
//End Final_TotalHorasSolucion_BeforeShow

//Custom Code @99-2A29BDB7

// -------------------------
	global $TiempoPaquetes;
	global $TiempoCursoaResuelto;
	global $TipoCalculoTiempo;
	global $TiempoAtencion;
	global $TiempoSolucion;
	global $TiempoConcluidaResuelto;
	global $db;
	global $DBcnDisenio;
	
	$db= new clsDBcnDisenio;
	$TipoCalculoTiempo=1;
	
	
	if ($TipoCalculoTiempo==1){
		$DBcnDisenio->query("SELECT ClaveMovimiento,DescMovimiento,FechaInicioMov,FechaFinMov,Paquete, dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov) as  HorasInvertidas " .
			" FROM mc_detalle_incidente_avl a inner join mc_universo_cds u on u.numero = a.Id_Incidente  and month(FechaCarga)= u.mes and u.anio  = year(FechaCarga) " .
			" where ( ClaveMovimiento in (select claveMovimiento from mc_c_movimiento where issolucion=1) ) " .
			" and Id_Incidente='"  . CCGetParam("Id_incidente",0) . "'  ORDER BY ClaveMovimiento, HorasInvertidas desc" );
  		global $i;
		$i=1;
		
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
						if($vFechaFIN > $vFechaFINAnt && $vFechaINI > $vFechaINIAnt && $vFechaINI < $vFechaFINAnt){
							$sql="select dbo.ufDiffFechasMCSec('" . $vFechaFIN . "','" . $vFechaFINAnt . "')";
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




		if ($TiempoPaquetes<=0 or trim($TiempoPaquetes)=="")
		{
				
			$Final->TotalHorasSolucion->SetValue($TiempoCursoaResuelto);
			
		}	
		
		if ($TiempoPaquetes>0)
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

//Close Final_TotalHorasSolucion_BeforeShow @98-D0A1BF45
    return $Final_TotalHorasSolucion_BeforeShow;
}
//End Close Final_TotalHorasSolucion_BeforeShow

//Final_ImageLink1_BeforeShow @100-8B877E2D
function Final_ImageLink1_BeforeShow(& $sender)
{
    $Final_ImageLink1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Final; //Compatibility
//End Final_ImageLink1_BeforeShow

//Custom Code @101-2A29BDB7
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

//Close Final_ImageLink1_BeforeShow @100-44BADD6F
    return $Final_ImageLink1_BeforeShow;
}
//End Close Final_ImageLink1_BeforeShow

//Final_HorasCursoAResuelto_BeforeShow @102-3214D1A4
function Final_HorasCursoAResuelto_BeforeShow(& $sender)
{
    $Final_HorasCursoAResuelto_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Final; //Compatibility
//End Final_HorasCursoAResuelto_BeforeShow

//Custom Code @103-2A29BDB7
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
		
		
		global $db;
		$db= new clsDBcnDisenio;
		$flgTiempo=CCDLookUp("chkTiempo","mc_calificacion_incidentes_MC","id_incidente='" . CCGetParam("Id_incidente",0) . "'",$db);
		if ($flgTiempo==1){
		    global $Tpl;
			$Tpl->SetVar("tFinal",$Final->HorasCursoAResuelto->GetValue());
		} else {
	    	global $Tpl;
			$Tpl->SetVar("tFinal",$Final->TotalHorasSolucion->GetValue());
		}
// -------------------------
//End Custom Code

//Close Final_HorasCursoAResuelto_BeforeShow @102-DC661D96
    return $Final_HorasCursoAResuelto_BeforeShow;
}
//End Close Final_HorasCursoAResuelto_BeforeShow

//Final_OnValidate @97-6ACE2ADC
function Final_OnValidate(& $sender)
{
    $Final_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Final; //Compatibility
//End Final_OnValidate

//Custom Code @104-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Final_OnValidate @97-EC082324
    return $Final_OnValidate;
}
//End Close Final_OnValidate

//Final_BeforeShow @97-8FB3F794
function Final_BeforeShow(& $sender)
{
    $Final_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Final; //Compatibility
//End Final_BeforeShow

//Custom Code @105-2A29BDB7
// -------------------------
	global $ExportToExcel;
	global $Grid1;
	
	$ExportFileName = "ListOfCourses.xls";
	if (CCGetFromGet("export","") == "1") {
		//Set Content type to Excel
		 header("Content-Type: application/vnd.ms-excel");
		 //Fix IE 5.0-5.5 bug with Content-Disposition=attachment
		if (strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.5;") || strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.0;")) {
			header("Content-Disposition: filename=" . $fFileName);
		} else {
			header("Content-Disposition: attachment; filename=" . $ExportFileName);
		}  
	}
// -------------------------
//End Custom Code

//Close Final_BeforeShow @97-D3F347AD
    return $Final_BeforeShow;
}
//End Close Final_BeforeShow

//mc_calificacion_incidente_BeforeShow @106-BCFAF919
function mc_calificacion_incidente_BeforeShow(& $sender)
{
    $mc_calificacion_incidente_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_incidente; //Compatibility
//End mc_calificacion_incidente_BeforeShow

//Custom Code @127-2A29BDB7
// -------------------------
    
		global $db;
		$db= new clsDBcnDisenio;
		$obsCAPC = CCDLookUp("obs_manuales","mc_calificacion_incidentes_MC","id_incidente='" . CCGetParam("Id_incidente",0) . "'",$db);
		$mc_calificacion_incidente->ObsCAPC->SetValue($obsCAPC);
		    
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_BeforeShow @106-DB37D23A
    return $mc_calificacion_incidente_BeforeShow;
}
//End Close mc_calificacion_incidente_BeforeShow
?>
