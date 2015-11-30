<?php
//BindEvents Method @1-878CA8D8
function BindEvents()
{
    global $mc_calificacion_capc;
    global $CCSEvents;
    $mc_calificacion_capc->FechaFirmaCAES->CCSEvents["BeforeShow"] = "mc_calificacion_capc_FechaFirmaCAES_BeforeShow";
    $mc_calificacion_capc->btnCalcular->CCSEvents["OnClick"] = "mc_calificacion_capc_btnCalcular_OnClick";
    $mc_calificacion_capc->CCSEvents["BeforeShow"] = "mc_calificacion_capc_BeforeShow";
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_calificacion_capc_FechaFirmaCAES_BeforeShow @59-33870576
function mc_calificacion_capc_FechaFirmaCAES_BeforeShow(& $sender)
{
    $mc_calificacion_capc_FechaFirmaCAES_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_capc; //Compatibility
    global $Panel1;
//End mc_calificacion_capc_FechaFirmaCAES_BeforeShow

    global $db;
    $db= new clsDBcnDisenio;
    global $DBcnDisenio;
	$DBcnDisenio->query('SELECT TipoMedicion FROM mc_calificacion_capc where id='. CCGetParam("id",0));
		if($DBcnDisenio->has_next_record()){
			$DBcnDisenio->next_record();
				if($DBcnDisenio->f("TipoMedicion")!="PC" ){
						$mc_calificacion_capc->btnCalcular->Visible=false;
						$Panel1->Visible=false;

				} else {
						$mc_calificacion_capc->btnCalcular->Visible=true;

				}
	}




		if (! $mc_calificacion_capc->EditMode){
			$mc_calificacion_capc->btnCalcular->Visible=false;	
        }

//Close mc_calificacion_capc_FechaFirmaCAES_BeforeShow @59-D780BEBB
    return $mc_calificacion_capc_FechaFirmaCAES_BeforeShow;
}
//End Close mc_calificacion_capc_FechaFirmaCAES_BeforeShow

//mc_calificacion_capc_btnCalcular_OnClick @111-0D208761
function mc_calificacion_capc_btnCalcular_OnClick(& $sender)
{
    $mc_calificacion_capc_btnCalcular_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_capc; //Compatibility
//End mc_calificacion_capc_btnCalcular_OnClick

//Custom Code @112-2A29BDB7
// -------------------------
    $db= new clsDBcnDisenio;
    $sSQL= 'update mc_calificacion_capc set DiasRetrasoNaturales  =(select top 1 DiasNaturalesDesviacion from mc_info_rs_cr_RE_RC_Artefacto_CAPC where Id_Padre = mc_calificacion_capc.Id   order by DiasNaturalesDesviacion desc ), ' .
			' DiasRetrasoHabiles = (select top 1 DiasHabilesDesviacion from mc_info_rs_cr_RE_RC_Artefacto_CAPC where Id_Padre = mc_calificacion_capc.id order by DiasHabilesDesviacion desc ) , ' .
			' PctMaximo = isnull((select top 1 PctDeductiva from mc_info_rs_cr_RE_RC_Artefacto_CAPC where Id_Padre = NULL.id  order by PctDeductiva desc ),0)	' .
			' where NULL.id= ' . CCGetParam("id",0) ;
	$db->query($sSQL);

// -------------------------
//End Custom Code

//Close mc_calificacion_capc_btnCalcular_OnClick @111-3AA4B018
    return $mc_calificacion_capc_btnCalcular_OnClick;
}
//End Close mc_calificacion_capc_btnCalcular_OnClick

//mc_calificacion_capc_BeforeShow @3-5FF7ECB3
function mc_calificacion_capc_BeforeShow(& $sender)
{
    $mc_calificacion_capc_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_capc; //Compatibility
//End mc_calificacion_capc_BeforeShow

//Custom Code @113-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio;
    global $DBcnDisenio;
	$DBcnDisenio->query('SELECT TipoMedicion FROM mc_calificacion_capc where id='. CCGetParam("id",0));
		if($DBcnDisenio->has_next_record()){
			$DBcnDisenio->next_record();
				if($DBcnDisenio->f("TipoMedicion")!="PC" ){
					$mc_calificacion_capc->Button_Insert->Visible=false;
					$mc_calificacion_capc->Button_Update->Visible=false;
					$mc_calificacion_capc->Button_Delete->Visible=false;
				} 
	}

// -------------------------
//End Custom Code

//Close mc_calificacion_capc_BeforeShow @3-4A8DC635
    return $mc_calificacion_capc_BeforeShow;
}
//End Close mc_calificacion_capc_BeforeShow

//Page_AfterInitialize @1-086205A1
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SLAsCAPCRetEnt; //Compatibility
//End Page_AfterInitialize

//Custom Code @108-2A29BDB7
// -------------------------
    global $sPPMC;
	global $PathToRoot;
    global $db;
    global $FileName;
    global $ActionFileUpload;
    global $lErrores;
    $ActionFileUpload= $FileName . "?" . CCGetQueryString("QueryString", "");
    $sValues="";
 	$db = new clsDBcnDisenio;
 	$vId= CCGetParam("id",0);
	$db->query('SELECT numero, mes, anio FROM mc_calificacion_capc u WHERE u.Id = ' . $vId );
	if($db->next_record()){
    	$vIdPPMC = $db->f(0);
    	$vMes= $db->f(1);
    	$vAnio = $db->f(2);
    }
 	if (isset($_FILES['userfile']['name'])) {
	 	$nombre_archivo = $_FILES['userfile']['name']; 
	 	$tipo_archivo = $_FILES['userfile']['type']; 
	 	$tamano_archivo = $_FILES['userfile']['size']; 
	 	//compruebo si las características del archivo son las que deseo 
	 	if ($tamano_archivo > 100000) {
			$lErrores->SetValue("<div style='color:red'>El tamaño del archivo es mayor al permitido. se permiten archivos de 100 Kb máximo.</td></tr></table></div>"); 
	 	} else {
	     	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $PathToRoot . '/Uploads/'. $nombre_archivo)) { 
	        	$row = 1;
				if (($handle = fopen($PathToRoot . '/Uploads/'. $nombre_archivo, "r")) !== FALSE) {
				    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				        if($row>1){//se ignora la linea 1, tiene los titulos
				        	$num = count($data);
				        	if($num>7){
				        		$lErrores->SetValue( "<div style='color:red'>La fila " . $row . " tiene más columnas de las esperadas.  No se proceso la fila</div>");
				        	} else {
				        		$sValues = $vIdPPMC . "," . $vId . ",";
					        	$EstFin = CCParseDate($data[6],array("dd","/","mm","/","yyyy"));
					        	//se da formato a las fechas
					        	$data[1] = str_replace("'","''",$data[1]);
					        	$data[2] = str_replace("'","''",$data[2]);
					        	$data[3] = str_replace("'","''",$data[3]);
					        	$data[4] = str_replace("'","''",$data[4]);

					        	$data[5] = CCFormatDate(CCParseDate($data[5],array("dd","/","mm","/","yyyy")),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss")) ;
					        	$data[6] = CCFormatDate(CCParseDate($data[6],array("dd","/","mm","/","yyyy")),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss")) ;
					        	for ($c=1; $c < $num; $c++) { // se descarta la columna 1 que es el numerador del archivo
					            	if($c==2){
					            		$sValues = $sValues . "'" . substr($data[$c],0,450) . "',";
					            	} else {
					            		if($c==3){
					            			$sValues = $sValues . "'" . substr($data[$c],0,40) . "',";
					            		} else {
					            			$sValues = $sValues . "'" . $data[$c] . "',";
					            		}
					            	}
					        	}
					        	
					        	//si no tiene fecha de entrega se toma la del ultimo día del mes de medición
					        	$dUltDia = "1900-01-01";
					        	if($EstFin == strtotime($dUltDia)){
					        		$EstFin= date("Y-m-d",mktime(0, 0, 0, $vMes  , date("t",mktime(0, 0, 0, $vMes  , 1, $vAnio)), $vAnio));
					        		$sValues = $sValues . " case when datediff(d,'" . $data[5]  . "','" . $EstFin . "')<0 THEN 0 else datediff(d,'" . $data[5]  . "','" . $EstFin . "') end , ";
					        		$sValues = $sValues  . "dbo.ufNumDiasHabilesMC('" . $data[5] . "','" . $EstFin . "')- (select COUNT(fecha) from dia_inhabil where fecha >= '" . $data[5] . "' and fecha <= '" . $EstFin . "')";
					        	} else {
					        		$sValues = $sValues . " case when datediff(d,'" . $data[5]  . "','" . $data[6] . "')<0 THEN 0 else datediff(d,'" . $data[5]  . "','" . $data[6] . "') end , ";
					        		$sValues = $sValues  . "dbo.ufNumDiasHabilesMC('" . $data[5] . "','" . $data[6] . "')- (select COUNT(fecha) from dia_inhabil where fecha >= '" . $data[5] . "' and fecha <= '" . $data[6] . "')";
					        	}
					        	//$sValues = $sValues . " case when datediff(d,'" . $data[5]  . "','" . $data[6] . "')<0 THEN 0 else datediff(d,'" . $data[5]  . "','" . $data[6] . "') end , ";
					        	//$sValues = $sValues  . "dbo.ufNumDiasHabilesMC('" . $data[5] . "','" . $data[6] . "')- (select COUNT(fecha) from dia_inhabil where fecha >= '" . $data[5] . "' and fecha <= '" . $data[6] . "')";
					        	
					        	$sValues = $sValues . ",0)";
					        	$ssql="Insert into mc_info_rs_cr_RE_RC_Artefacto_CAPC (Id_PPMC, Id_Padre, Nombre, Descripcion, Formato, NombreConHerramienta, FechaEstFin, FechaEntrega, DiasNaturalesDesviacion,DiasHabilesDesviacion,DiasHabilesReales) values (";
					        	if(strlen($data[1])>0){
					        		$db->query($ssql . $sValues); //echo $ssql . $sValues . "<br><br>";
					        		if($db->Errors->Count()>0){
					        			$lErrores->Setvalue("<br><div style='color:red'>Hubo errores al procesar el archivo, verifique la información cargada</div><br>". $ssql . $sValues);
					        		} else {
					        			$lErrores->Setvalue("Se proceso el archivo, verifique la información cargada");
					        		}
					        	}
				        	}
				        }
				        $row++;
				    }
				    fclose($handle);
				    //se actualiza la deductiva de los artefactos
				    $ssql = ' update mc_info_rs_cr_RE_RC_Artefacto_CAPC set PctDeductiva = ' .
							' case when DiasNaturalesDesviacion>0 then ' . 
							'		case when af.DiasNaturalesDesviacion between 1 and 3 then 2 ' . 
							'			when af.DiasNaturalesDesviacion between 4 and 6 then 3 ' . 
							'			when af.DiasNaturalesDesviacion between 7 and 10 then 5 ' . 
							'			else ' . 
							'				case when af.DiasNaturalesDesviacion >35 then 30 + af.DiasNaturalesDesviacion  *0.143 ' . 
							'				else (abs(af.DiasNaturalesDesviacion-5)) end ' . 
							'		end ' . 
							'else 0.0 end ' . 
						' from mc_info_rs_cr_RE_RC_Artefacto_CAPC af ' . 
						'	inner join  mc_calificacion_CAPC rc on rc.id = af.Id_Padre ' . 
						' where rc.id = ' . $vId ;
					//echo $ssql . "<br>";
					$db->query($ssql);
				} else {
					$lErrores->Setvalue("<div style='color:red'>No se puede cargar el archivo</div>");
				}
	     	} else { 
	        	$lErrores->Setvalue("<div style='color:red'>Ocurrió algún error al subir el archivo. No pudo guardarse.</div>"); 
	     	}
	 	}	
 	}
 	$db->close();
// -------------------------
//End Custom Code

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize

//Page_BeforeShow @1-AC5FA96B
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $SLAsCAPCRetEnt; //Compatibility
//End Page_BeforeShow

//Custom Code @127-2A29BDB7
// -------------------------
    global $lkAnterior;
    global $lkSiguiente;
    
    $aPPMCsAPbIds = unserialize(CCGetSession("aPPMCsAPbIdsCAPC"));
    $aPPMCsAPbValues = unserialize(CCGetSession("aPPMCsAPbValuesCAPC"));

    if(count($aPPMCsAPbIds)>1){
    	$iPos=array_search(CCGetParam("id"),$aPPMCsAPbIds);
    	if($iPos==0){
			$lkAnterior->SetLink("SLAsCAPCLista.php?" . CCGetQueryString("QueryString",""));
			$lkAnterior->SetValue("Lista requerimientos");
    	} else {
    		$lkAnterior->SetValue($aPPMCsAPbValues[$iPos-1]);
    		$lkAnterior->SetLink("SLAsCAPCRetEnt.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","id"),"ccsForm"),"id",$aPPMCsAPbIds[$iPos-1]));
    	}
    	if($iPos < count($aPPMCsAPbIds)-1){
    		$lkSiguiente->SetValue($aPPMCsAPbValues[$iPos+1]);
    		$lkSiguiente->SetLink("SLAsCAPCRetEnt.php?" . CCAddParam( CCRemoveParam( CCGetQueryString("QueryString","id"),"ccsForm"),"id",$aPPMCsAPbIds[$iPos+1]));
    	} else {
    		$lkSiguiente->SetValue("");
    	}
    }

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
