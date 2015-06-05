<?php
//BindEvents Method @1-55ED7590
function BindEvents()
{
    global $mc_info_incidentes2;
    global $mc_detalle_incidente_avl;
    global $slAnterior;
    global $slSiguiente;
    global $mc_info_incidentes;
    global $mc_calificacion_incidente;
    global $mc_info_incidentes1;
    global $mc_info_incidentes3;
    global $mc_info_incidentes4;
    global $Final;
    global $mc_c_aplicacion;
    global $CCSEvents;
    $mc_info_incidentes2->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes2_HorasInvertidas_BeforeShow";
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
    $mc_info_incidentes1->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes1_HorasInvertidas_BeforeShow";
    $mc_info_incidentes1->CCSEvents["BeforeShow"] = "mc_info_incidentes1_BeforeShow";
    $mc_info_incidentes3->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes3_HorasInvertidas_BeforeShow";
    $mc_info_incidentes4->HorasInvertidas->CCSEvents["BeforeShow"] = "mc_info_incidentes4_HorasInvertidas_BeforeShow";
    $mc_info_incidentes4->CCSEvents["BeforeShow"] = "mc_info_incidentes4_BeforeShow";
    $Final->TotalHorasSolucion->CCSEvents["BeforeShow"] = "Final_TotalHorasSolucion_BeforeShow";
    $Final->ImageLink1->CCSEvents["BeforeShow"] = "Final_ImageLink1_BeforeShow";
    $Final->HorasCursoAResuelto->CCSEvents["BeforeShow"] = "Final_HorasCursoAResuelto_BeforeShow";
    $Final->CCSEvents["OnValidate"] = "Final_OnValidate";
    $Final->CCSEvents["BeforeShow"] = "Final_BeforeShow";
    $mc_c_aplicacion->lblTiempoAtencion->CCSEvents["BeforeShow"] = "mc_c_aplicacion_lblTiempoAtencion_BeforeShow";
    $mc_c_aplicacion->lblTiempoSolucion->CCSEvents["BeforeShow"] = "mc_c_aplicacion_lblTiempoSolucion_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
}
//End BindEvents Method

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
		$mc_info_incidentes2->HorasInvertidas->SetValue('No Aplica');
	}

    
// -------------------------
//End Custom Code

//Close mc_info_incidentes2_HorasInvertidas_BeforeShow @59-8C27D41A
    return $mc_info_incidentes2_HorasInvertidas_BeforeShow;
}
//End Close mc_info_incidentes2_HorasInvertidas_BeforeShow

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

//Close mc_detalle_incidente_avl_TotalHoras_BeforeShow @195-E6F13F37
    return $mc_detalle_incidente_avl_TotalHoras_BeforeShow;
}
//End Close mc_detalle_incidente_avl_TotalHoras_BeforeShow

//DEL  // -------------------------
//DEL  	global $TotalHoras;
//DEL  	$mc_detalle_incidente_avl->TotalHoras->SetValue($TotalHoras);
//DEL  	
//DEL      // Write your own code here.
//DEL  // -------------------------

//DEL  // -------------------------
//DEL  	global $TotalHoras;
//DEL  	$mc_detalle_incidente_avl->Horas->SetValue($TotalHoras);
//DEL      // Write your own code here.
//DEL  // -------------------------

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
//   global $Tpl;
//  	$Tpl->SetVar("iRows",$mc_detalle_incidente_avl->DataSource->CountPaquete);

//  	$Tpl->SetVar("iRows",$mc_detalle_incidente_avl->DataSource->RecordsCount);
   // Write your own code here.
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
			
	$Container->slSiguiente->SetValue($miArray[$claveSiguiente]);
	$Container->slAnterior->SetValue($miArray[$claveAnterior]);

	if ($claveAnterior>0) 
	{ 	
   		$RedirectAnterior =  "IncidenteDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id_incidente"),"ccsForm"),"Id_incidente",$miArray[$claveAnterior]);
	$Container->slAnterior->SetLink($RedirectAnterior);

	}
	else
	{
   		$RedirectAnterior =  "IncidentesLista.php?" . CCGetQueryString("QueryString","");
		$Container->slAnterior->SetValue("Lista Incidentes");
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
			
	$Container->slSiguiente->SetValue($miArray[$claveSiguiente]);
	$Container->slAnterior->SetValue($miArray[$claveAnterior]);
	
   	$RedirectAnterior =  "IncidenteDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id_incidente"),"ccsForm"),"Id_incidente",$miArray[$claveAnterior]);
   	$RedirectSiguiente =  "IncidenteDetalle.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","Id_incidente"),"ccsForm"),"Id_incidente",$miArray[$claveSiguiente]);


	$Container->slAnterior->SetLink($RedirectAnterior);
	$Container->slSiguiente->SetLink($RedirectSiguiente);


    // Write your own code here.
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
//	global	$DBcnDisenio;
////	$DBcnDisenio->query("SELECT ServicioNegocio,Aplicacion,FechaNuevo,FechaAsignado,FechaEnCurso,FechaPendiente,FechaResuelto,FechaCerrado " .
//						" FROM mc_info_incidentes INNER JOIN (mc_c_proveedor INNER JOIN mc_universo_cds ON mc_c_proveedor.id_proveedor = mc_universo_cds.id_proveedor) ON " .
//						" mc_info_incidentes.Id_incidente = mc_universo_cds.numero WHERE Id_incidente = '" . CCGetParam("Id_incidente",0) . "'"  );

//	if($DBcnDisenio->has_next_record()){
//		$DBcnDisenio->next_record()
//		$mc_info_incidentes->ServicioNegocio->SetValue($DBcnDisenio->f(0));
//		$mc_info_incidentes->Aplicacion->SetValue($DBcnDisenio->f(1));
//		$mc_info_incidentes->FechaNuevo->SetValue($DBcnDisenio->f("FechaNuevo"));
//		$mc_info_incidentes->FechaAsignado->SetValue($DBcnDisenio->f("FechaAsignado"));
		
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

		

		
//	}


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
		$mc_calificacion_incidente->Aplicacion->SetValue("<a href='" . $PatToRoot . "/valoracion/v2/Catalogos/AplicacionesLista.php?descripcion=" . trim($Aplicacion) . ">No existe esta Aplicación</a>");
//		$mc_Calidicacion_incidente->Errors->addError("You are not allowed to delete this item.");
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
		  

	if ($TiempoPaquetes<=0 or trim($TiempoPaquetes)==""){
			$Final->TotalHorasSolucion->SetValue($TiempoCursoaResuelto);
	}	

	if ($TiempoPaquetes>0){
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

  	$DBcnDisenio->query("SELECT id_incidente from  mc_calificacion_incidentes_MC where id_incidente='"  . CCGetParam("Id_incidente",0) . "' and Anioreporte='" . CCGetParam("s_anio_param",0) . "' and MesReporte='" . CCGetParam("s_mes_param",0) . "'" );
	
	$mc_calificacion_incidente->lblCalificado->SetValue("No Calificado");
  	while ($DBcnDisenio->next_record())
  	{
	
	  	$mc_calificacion_incidente->lblCalificado->SetValue("Calificado");
  		$Calificado="1";

  	}



    // Write your own code here.
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
		if (trim($mc_calificacion_incidente->Cumple_DISP_SOPORTE->GetValue())=="")
		{
			$mc_calificacion_incidente->Errors->addError("Debe dar una calificación a la Disposición de Soporte");
		}

//		if (trim($mc_calificacion_incidente->UrlEvidencia->GetValue())=="")
//		{
//			$mc_calificacion_incidente->Errors->addError("Debe proporcionar la URL de Evidencia");
//		}
		
		
    // Write your own code here.
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
		$mc_calificacion_incidente->Obs_Manuales->SetValue($mc_calificacion_incidente->Obs_Manuales->GetValue() . " Obs. TA: " . $mc_calificacion_incidente->txtCumple_Inc_TiempoAsignacion->GetValue() );
	}
	if($mc_calificacion_incidente->txtCumple_Inc_TiempoSolucion->GetValue()!=""){
		$mc_calificacion_incidente->Obs_Manuales->SetValue($mc_calificacion_incidente->Obs_Manuales->GetValue() .  " Obs. TS: " . $mc_calificacion_incidente->txtCumple_Inc_TiempoSolucion->GetValue());
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
		$mc_calificacion_incidente->Obs_Manuales->SetValue($mc_calificacion_incidente->Obs_Manuales->GetValue() . " Obs. TA: " . $mc_calificacion_incidente->txtCumple_Inc_TiempoAsignacion->GetValue() );
	}
	if($mc_calificacion_incidente->txtCumple_Inc_TiempoSolucion->GetValue()!=""){
		$mc_calificacion_incidente->Obs_Manuales->SetValue($mc_calificacion_incidente->Obs_Manuales->GetValue() .  " Obs. TS: " . $mc_calificacion_incidente->txtCumple_Inc_TiempoSolucion->GetValue());
	}
	
		

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_calificacion_incidente_BeforeInsert @143-17F97413
    return $mc_calificacion_incidente_BeforeInsert;
}
//End Close mc_calificacion_incidente_BeforeInsert

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
	
	
//	global $SegundosTotalesSolucion;
	global $TiempoAtencion;	
//	$SegundosTotalesSolucion=$SegundosTotalesSolucion+$mc_info_incidentes1->HorasInvertidas->GetValue();

	$TiempoAtencion=$mc_info_incidentes1->HorasInvertidas->GetValue();



	if ($mc_info_incidentes1->HorasInvertidas->GetValue()>0) 
	{

	
    global $Horas;
    global $Minutos;
	global $Segundos;
	
	$Minutos=floor(($mc_info_incidentes1->HorasInvertidas->GetValue() / 60)%60);
	
	$Segundos=($mc_info_incidentes1->HorasInvertidas->GetValue() % 60);
	
	
	$Horas= floor((($mc_info_incidentes1->HorasInvertidas->GetValue()) / 60)/60);
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
	
				$mc_info_incidentes1->HorasInvertidas->SetValue("0" . $Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$mc_info_incidentes1->HorasInvertidas->SetValue("0" . $Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$mc_info_incidentes1->HorasInvertidas->SetValue("0" . $Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$mc_info_incidentes1->HorasInvertidas->SetValue("0" . $Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}
	}
	else
	{
				if ($Segundos<10)
		{
			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
	
		
			if ( $Minutos<10) {
	
				$mc_info_incidentes1->HorasInvertidas->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
			}
			else
			{
				$mc_info_incidentes1->HorasInvertidas->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
			}
	
		}
		else
		{
			if ( $Minutos<10) {
		
				$mc_info_incidentes1->HorasInvertidas->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
			}
			else
			{
				$mc_info_incidentes1->HorasInvertidas->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
			}
		}

	}
	}
	else
	{
		$mc_info_incidentes1->HorasInvertidas->SetValue('00:00:00');
	}
	
		
	
    // Write your own code here.
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

		 
    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes1_BeforeShow @46-D01C7638
    return $mc_info_incidentes1_BeforeShow;
}
//End Close mc_info_incidentes1_BeforeShow

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
		$mc_info_incidentes4->HorasInvertidas->SetValue('00:00:00');
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
	$mc_info_incidentes4->FechaEnCurso->SetValue(CCFormatDate(CCParseDate($FechaenCurso,array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")));

	
//	$mc_info_incidentes4->FechaEnCurso->SetValue($FechaenCurso);
//	$mc_info_incidentes4->FechaResuelto->SetValue($FechaResuelto);
	
	$DBcnDisenio->query("SELECT dbo.ufDiffFechasMCSec('".$FechaenCurso."','".$FechaResuelto."') as Minutos");
	if($DBcnDisenio->next_record()){

	//$DBcnDisenio->next_record()
	$MinutosF= $DBcnDisenio->f("Minutos");
		global $HorasCursoAResuelto; 
		$HorasCursoAResuelto=$MinutosF;
		$mc_info_incidentes4->HorasInvertidas->SetValue($MinutosF);

	}
	$DBcnDisenio->close();

    // Write your own code here.
// -------------------------
//End Custom Code

//Close mc_info_incidentes4_BeforeShow @124-54BF1855
    return $mc_info_incidentes4_BeforeShow;
}
//End Close mc_info_incidentes4_BeforeShow

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
		
		if ($mc_calificacion_incidente->CheckBox1->GetValue()==1)
		{
		    global $Tpl;
		$Tpl->SetVar("tFinal",$Final->HorasCursoAResuelto->GetValue());
									

		}
		else
		{
	    global $Tpl;
		$Tpl->SetVar("tFinal",$Final->TotalHorasSolucion->GetValue());


		}



    // Write your own code here.
// -------------------------
//End Custom Code

//Close Final_HorasCursoAResuelto_BeforeShow @260-DC661D96
    return $Final_HorasCursoAResuelto_BeforeShow;
}
//End Close Final_HorasCursoAResuelto_BeforeShow

//DEL  
//DEL  // -------------------------
//DEL  
//DEL  
//DEL  	global $TipoCalculoTiempo;
//DEL  	global $TiempoAtencion;
//DEL  	global $TiempoSolucion;
//DEL  	global $TiempoPaquetes;
//DEL  	global $TiempoConcluidaResuelto;
//DEL  	global $TiempoCursoaResuelto;
//DEL  	global $arrayMovimiento;
//DEL    	global $arraySegundos;
//DEL    	global $arrayFechaIni;
//DEL    	global $arrayFechaFin;
//DEL    	
//DEL    	for ($i=0; $i<=count($arrayMovimiento)-1;$i++)
//DEL    	{	    			
//DEL  		
//DEL  		global $fechaINI;
//DEL  		global $fechaFIN;
//DEL  		global $SEGUNDOS;
//DEL  		
//DEL  		echo "No" . $i . "<br>";
//DEL  		echo "Index -" .  $arrayMovimiento[$i] . "<br>";
//DEL  	
//DEL  		
//DEL  		echo "FechaIni -"  . CCFormatDate($arrayFechaIni[$i],array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")). "<br>";
//DEL  		echo "FechaFin -" . CCFormatDate($arrayFechaFin[$i],array("yyyy","/","mm","/","dd"," ","HH",":","nn",":","ss")) . "<br>";
//DEL  		echo "Segundos -" . $arraySegundos[$i] . "<br>";
//DEL  	
//DEL  		$fechaINI=CCFormatDate($arrayFechaIni[$i],array("dd","/","mm","/","yyyy"));
//DEL  		$fechaFIN=CCFormatDate($arrayFechaFin[$i],array("dd","/","mm","/","yyyy"));
//DEL  		$SEGUNDOS=$arraySegundos[$i];
//DEL  		
//DEL  
//DEL  //		global $iMov;
//DEL  //		$iMov=array_search($arrayMovimiento[$i]	,$arrayMovimiento);
//DEL  		for ($ii=0; $ii<=count($arrayMovimiento)-1 ; $ii++)
//DEL  		{
//DEL  			if ($arrayMovimiento[$i]==$arrayMovimiento[$ii] && $arraySegundos[$ii]>0)
//DEL  			{
//DEL  				if ($fechaINI>=CCFormatDate($arrayFechaIni[$ii],array("dd","/","mm","/","yyyy")) &&  CCFormatDate($arrayFechaFin[$ii],array("dd","/","mm","/","yyyy")) >= $fechaFIN)
//DEL  				{
//DEL  					if ($arraySegundos[$i]<$arraySegundos[$ii]  && $i<$ii)
//DEL  					{
//DEL  						echo "1.-No se Suma " . $fechaINI . " & " . CCFormatDate($arrayFechaIni[$ii],array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")) . "<br>";
//DEL  						$i++;
//DEL  					}	
//DEL  					else
//DEL  					{
//DEL  
//DEL  						if ($arraySegundos[$i]<$arraySegundos[$ii]  && $i>$ii)
//DEL  						{
//DEL  							echo "3.-No se Suma " . $fechaINI . " & " . CCFormatDate($arrayFechaIni[$ii],array("dd","/","mm","/","yyyy"," ","H",":","nn",":","ss")) . "<br>";
//DEL  						}	
//DEL  						
//DEL  
//DEL  					}
//DEL  				}
//DEL  				
//DEL  			}					
//DEL  									
//DEL  		}
//DEL  
//DEL  
//DEL    	}
//DEL  		  
//DEL  //	$TipoCalculoTiempo=1;  // 0= Default , 1= Sin Paquetes toma el tiempo en curso a resuelto , 2= Si tiene 2 paquetes toma el de mayor tiempo, 3= toma los movimientos de mayor duración que no sean concurrentes con otros
//DEL  
//DEL  /*
//DEL  		switch($TipoCalculoTiempo)
//DEL  		{
//DEL  		case 0:		
//DEL  			global $SegundosTotalesSolucion;
//DEL  			$Final->TotalHorasSolucion->SetValue($SegundosTotalesSolucion);
//DEL  			break;
//DEL  		case 1:
//DEL  			$Final->TotalHorasSolucion->SetValue($TiempoCursoaResuelto);
//DEL  			break;
//DEL  		}
//DEL  */
//DEL  //	echo "           TP:". $TiempoPaquetes;		
//DEL  	
//DEL  
//DEL  
//DEL  
//DEL  	if ($TiempoPaquetes<=0 or trim($TiempoPaquetes)==""){
//DEL  		
//DEL  			$Final->TotalHorasSolucion->SetValue($TiempoCursoaResuelto);
//DEL  
//DEL  				
//DEL  		}	
//DEL  
//DEL  	if ($TiempoPaquetes>0)
//DEL  		{
//DEL  			$Final->TotalHorasSolucion->SetValue($TiempoAtencion+$TiempoSolucion+$TiempoPaquetes+$TiempoConcluidaResuelto);
//DEL  		
//DEL  		}	
//DEL  	
//DEL  
//DEL  	    global $Horas;
//DEL  	    global $Minutos;
//DEL  		global $Segundos;
//DEL  		
//DEL  		$Minutos=floor(($Final->TotalHorasSolucion->GetValue() / 60)%60);
//DEL  		
//DEL  		$Segundos=($Final->TotalHorasSolucion->GetValue() % 60);
//DEL  		
//DEL  		
//DEL  		$Horas= floor((($Final->TotalHorasSolucion->GetValue()) / 60)/60);
//DEL  	//	$Minutos= ($mc_detalle_incidente_avl->Horas->GetValue()) % 60;
//DEL  		
//DEL  	//	$Horas= floor($mc_detalle_incidente_avl->Horas->GetValue() / 60);
//DEL  	//	$Minutos= $mc_detalle_incidente_avl->Horas->GetValue() % 60;
//DEL  	
//DEL  		if ($Horas<0){$Horas=0;}
//DEL  		if ($Minutos<0){$Minutos=0;}
//DEL  		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
//DEL  	
//DEL  		
//DEL  		if ($Segundos<10)
//DEL  		{
//DEL  			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
//DEL  	
//DEL  		
//DEL  			if ( $Minutos<10) {
//DEL  	
//DEL  				$Final->TotalHorasSolucion->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
//DEL  			}
//DEL  			else
//DEL  			{
//DEL  				$Final->TotalHorasSolucion->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
//DEL  			}
//DEL  	
//DEL  		}
//DEL  		else
//DEL  		{
//DEL  			if ( $Minutos<10) {
//DEL  		
//DEL  				$Final->TotalHorasSolucion->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
//DEL  			}
//DEL  			else
//DEL  			{
//DEL  				$Final->TotalHorasSolucion->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
//DEL  			}
//DEL  		}
//DEL  
//DEL  
//DEL  
//DEL  
//DEL      // Write your own code here.
//DEL  // -------------------------

//DEL  // -------------------------
//DEL  	global $TiempoCursoaResuelto;
//DEL  	$Final->HorasCursoAResuelto->SetValue($TiempoCursoaResuelto);
//DEL  	
//DEL  	    global $Horas;
//DEL  	    global $Minutos;
//DEL  		global $Segundos;
//DEL  		
//DEL  		$Minutos=floor(($Final->HorasCursoAResuelto->GetValue() / 60)%60);
//DEL  		
//DEL  		$Segundos=($Final->HorasCursoAResuelto->GetValue() % 60);
//DEL  		
//DEL  		
//DEL  		$Horas= floor((($Final->HorasCursoAResuelto->GetValue()) / 60)/60);
//DEL  	//	$Minutos= ($mc_detalle_incidente_avl->Horas->GetValue()) % 60;
//DEL  		
//DEL  	//	$Horas= floor($mc_detalle_incidente_avl->Horas->GetValue() / 60);
//DEL  	//	$Minutos= $mc_detalle_incidente_avl->Horas->GetValue() % 60;
//DEL  	
//DEL  		if ($Horas<0){$Horas=0;}
//DEL  		if ($Minutos<0){$Minutos=0;}
//DEL  		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
//DEL  	
//DEL  		
//DEL  		if ($Segundos<10)
//DEL  		{
//DEL  			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
//DEL  	
//DEL  		
//DEL  			if ( $Minutos<10) {
//DEL  	
//DEL  				$Final->HorasCursoAResuelto->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
//DEL  			}
//DEL  			else
//DEL  			{
//DEL  				$Final->HorasCursoAResuelto->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
//DEL  			}
//DEL  	
//DEL  		}
//DEL  		else
//DEL  		{
//DEL  			if ( $Minutos<10) {
//DEL  		
//DEL  				$Final->HorasCursoAResuelto->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
//DEL  			}
//DEL  			else
//DEL  			{
//DEL  				$Final->HorasCursoAResuelto->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
//DEL  			}
//DEL  		}
//DEL  
//DEL  
//DEL      // Write your own code here.
//DEL  // -------------------------

//DEL  // -------------------------
//DEL  	global $HorasCursoAResuelto;
//DEL  	$Final->lTiempoCursoresuelto->SetValue($HorasCursoAResuelto);
//DEL  	
//DEL      global $Horas;
//DEL      global $Minutos;
//DEL  	global $Segundos;
//DEL  	
//DEL  	if ($Final->lTiempoCursoresuelto->GetValue()>0)
//DEL  	{
//DEL  		if ($Horas<0){$Horas=0;}
//DEL  		if ($Minutos<0){$Minutos=0;}
//DEL  		if ($Segundos<0){$Segundos=0;}//{$Minutos=$Minutos*-1;}
//DEL  	
//DEL  		
//DEL  		if ($Segundos<10)
//DEL  		{
//DEL  			if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
//DEL  	
//DEL  		
//DEL  			if ( $Minutos<10) {
//DEL  	
//DEL  				$Final->lTiempoCursoresuelto->SetValue($Horas . ":0" . $Minutos . ":0" . $Segundos );
//DEL  			}
//DEL  			else
//DEL  			{
//DEL  				$Final->lTiempoCursoresuelto->SetValue($Horas . ":" . $Minutos . ":0" . $Segundos);
//DEL  			}
//DEL  	
//DEL  		}
//DEL  		else
//DEL  		{
//DEL  			if ( $Minutos<10) {
//DEL  		
//DEL  				$Final->lTiempoCursoresuelto->SetValue($Horas . ":0" . $Minutos . ":" . $Segundos );
//DEL  			}
//DEL  			else
//DEL  			{
//DEL  				$Final->lTiempoCursoresuelto->SetValue($Horas . ":" . $Minutos . ":" . $Segundos);
//DEL  			}
//DEL  		}
//DEL  	}
//DEL  		else
//DEL  	{
//DEL  		$Final->lTiempoCursoresuelto->SetValue('00:00:00');
//DEL  	}
//DEL  	
//DEL  	
//DEL      // Write your own code here.
//DEL  // -------------------------

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
	 if (CCGetFromGet("export","") == "1") {
			//Set Content type to Excel
			 header("Content-Type: application/vnd.ms-excel");
		 //Fix IE 5.0-5.5 bug with Content-Disposition=attachment
			if (strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.5;") || 
			 strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.0;")) {
			header("Content-Disposition: filename=" . $ExportFileName);
			} else {
			header("Content-Disposition: attachment; filename=" . $ExportFileName);
			}
			}
		
		global $ExportToExcel;
		
			global $Grid1;
		
			$ExportFileName = "ListOfCourses.xls";
		 if (CCGetFromGet("export","") == "1") {
			//Set Content type to Excel
		 header("Content-Type: application/vnd.ms-excel");
		 //Fix IE 5.0-5.5 bug with Content-Disposition=attachment
			if (strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.5;") || 
		 strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 5.0;")) {
			header("Content-Disposition: filename=" . $fFileName);
			} else {
			header("Content-Disposition: attachment; filename=" . $ExportFileName);
		 }  
 		 }



		
		
		

    // Write your own code here.
// -------------------------
//End Custom Code

//Close Final_BeforeShow @227-D3F347AD
    return $Final_BeforeShow;
}
//End Close Final_BeforeShow

//mc_c_aplicacion_lblTiempoAtencion_BeforeShow @274-3E0EB450
function mc_c_aplicacion_lblTiempoAtencion_BeforeShow(& $sender)
{
    $mc_c_aplicacion_lblTiempoAtencion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_aplicacion; //Compatibility
//End mc_c_aplicacion_lblTiempoAtencion_BeforeShow

//Custom Code @277-2A29BDB7
// -------------------------
	if ($mc_c_aplicacion->lblTiempoAtencion->GetValue()>0) 
	{

	    global $Horas;
	    global $Minutos;
		global $Segundos;
		
		$Minutos=floor(($mc_c_aplicacion->lblTiempoAtencion->GetValue() / 60)%60);
		
		$Segundos=($mc_c_aplicacion->lblTiempoAtencion->GetValue() % 60);
		
		
		$Horas= floor((($mc_c_aplicacion->lblTiempoAtencion->GetValue()) / 60)/60);
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

//Close mc_c_aplicacion_lblTiempoAtencion_BeforeShow @274-86A90362
    return $mc_c_aplicacion_lblTiempoAtencion_BeforeShow;
}
//End Close mc_c_aplicacion_lblTiempoAtencion_BeforeShow

//mc_c_aplicacion_lblTiempoSolucion_BeforeShow @275-745752A7
function mc_c_aplicacion_lblTiempoSolucion_BeforeShow(& $sender)
{
    $mc_c_aplicacion_lblTiempoSolucion_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_aplicacion; //Compatibility
//End mc_c_aplicacion_lblTiempoSolucion_BeforeShow

//Custom Code @279-2A29BDB7
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

//Close mc_c_aplicacion_lblTiempoSolucion_BeforeShow @275-F60A9205
    return $mc_c_aplicacion_lblTiempoSolucion_BeforeShow;
}
//End Close mc_c_aplicacion_lblTiempoSolucion_BeforeShow

//DEL  // -------------------------
//DEL      global $Horas;
//DEL      global $Minutos;
//DEL  	$Horas= floor($Report1->HorasInvertidas->GetValue() / 60);
//DEL  	$Minutos= $Report1->HorasInvertidas->GetValue() % 60;
//DEL  	if ($Horas<0){$Horas=0;}
//DEL  	if ($Minutos<0){$Minutos=0;}//{$Minutos=$Minutos*-1;}
//DEL  
//DEL  	
//DEL  		if ( $Minutos<10) {
//DEL  
//DEL  			$Report1->HorasInvertidas->SetValue($Horas . ":0" . $Minutos );
//DEL  		}
//DEL  		else
//DEL  		{
//DEL  			$Report1->HorasInvertidas->SetValue($Horas . ":" . $Minutos);
//DEL  		}
//DEL  
//DEL  
//DEL      // Write your own code here.
//DEL  // -------------------------

//DEL  // -------------------------
//DEL        global $sPaquete;
//DEL        if ($sPaquete == $Report1->Paquete->GetValue()){
//DEL    
//DEL    //	    		$mc_detalle_incidente_avl->Paquete->Visible=false;
//DEL    				$Report1->Panel1->Visible=false;
//DEL    				$Report1->Panel2->Visible=false;
//DEL    
//DEL        } else {
//DEL    			    global $Tpl;
//DEL      				$Tpl->SetVar("iRows",$Report1->DataSource->f("CountPaquete"));
//DEL    
//DEL    		    	$sPaquete = $Report1->Paquete->GetValue();
//DEL    		    	$Report1->Panel1->Visible=true;
//DEL    				$Report1->Panel2->Visible=true;
//DEL  
//DEL        }
//DEL  
//DEL      // Write your own code here.
//DEL  // -------------------------

//Page_BeforeInitialize @1-0E386BA7
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CalificaIncidenteDetalle; //Compatibility
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


    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

//Page_BeforeShow @1-20DC5C03
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CalificaIncidenteDetalle; //Compatibility
//End Page_BeforeShow

//Custom Code @140-2A29BDB7
// -------------------------
// -------------------------
//	global $DBcnDisenio;
	global $miArray;

	
	
//  	$miArray = unserialize($_SESSION['SQL']);   //array();
  	
//  	$DBcnDisenio->query($_SESSION['SQL']);
//  	while ($DBcnDisenio->has_next_record())
//  	{

//  		array_push($miArray,$DBcnDisenio->f(0));
//  		$DBcnDisenio->next_record();

  
//  	}
//	array_push($miArray,$DBcnDisenio->f(0));
//	array_push($miArray,"");

  	
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

    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_OnInitializeView @1-0A94ED04
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CalificaIncidenteDetalle; //Compatibility
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

//Page_AfterInitialize @1-E0FD0242
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CalificaIncidenteDetalle; //Compatibility
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


?>
