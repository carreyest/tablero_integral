<?php
//BindEvents Method @1-C8C7C6BD
function BindEvents()
{
    global $periodos_carga;
    global $result_comparativo_incide;
    global $result_comparativo_incide1;
    global $result_comparativo_incide2;
    $periodos_carga->Label1->CCSEvents["BeforeShow"] = "periodos_carga_Label1_BeforeShow";
    $result_comparativo_incide->result_comparativo_incide_TotalRecords->CCSEvents["BeforeShow"] = "result_comparativo_incide_result_comparativo_incide_TotalRecords_BeforeShow";
    $result_comparativo_incide->CCSEvents["BeforeShowRow"] = "result_comparativo_incide_BeforeShowRow";
    $result_comparativo_incide1->CCSEvents["BeforeShow"] = "result_comparativo_incide1_BeforeShow";
    $result_comparativo_incide2->CCSEvents["BeforeShow"] = "result_comparativo_incide2_BeforeShow";
}
//End BindEvents Method

//periodos_carga_Label1_BeforeShow @170-4CC7D3D8
function periodos_carga_Label1_BeforeShow(& $sender)
{
    $periodos_carga_Label1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $periodos_carga; //Compatibility
//End periodos_carga_Label1_BeforeShow

//Custom Code @171-2A29BDB7
// -------------------------
	global $DBcnDisenio;
	if ($periodos_carga->s_id_periodo->getValue()) {
		$DBcnDisenio->query("select nombre_mes + '/' + convert(varchar(4),anio) fecha from archivosxls.dbo.periodos_carga where id_periodo=". $periodos_carga->s_id_periodo->getValue());
		if($DBcnDisenio->next_record()){
			$periodos_carga->Label1->SetValue($DBcnDisenio->f("fecha"));
		}
	}
// -------------------------
//End Custom Code

//Close periodos_carga_Label1_BeforeShow @170-EAE38E32
    return $periodos_carga_Label1_BeforeShow;
}
//End Close periodos_carga_Label1_BeforeShow

//DEL  // -------------------------
//DEL  
//DEL  
//DEL       $Grid1->Cumple_Inc_TiempoAsignacion->Visible  =false;  
//DEL  $valor=$Grid1->Cumple_Inc_TiempoAsignacion->GetValue(); 
//DEL  switch($valor){
//DEL  		case "1":
//DEL  			$Grid1->ImgCumple_Inc_TiempoAsignacion->SetValue("images/Cumple.png");  
//DEL  			$Grid1->ImgCumple_Inc_TiempoAsignacion->Visible  =true;
//DEL  			break;
//DEL  		case "0":
//DEL  			$Grid1->ImgCumple_Inc_TiempoAsignacion->SetValue("images/NoCumple.png");  
//DEL  			$Grid1->ImgCumple_Inc_TiempoAsignacion->Visible  =true;
//DEL  			break;
//DEL  		default:
//DEL  			$Grid1->ImgCumple_Inc_TiempoAsignacion->Visible  =false;
//DEL  			$Grid1->Cumple_Inc_TiempoAsignacion->Visible  =true;
//DEL  			$Grid1->Cumple_Inc_TiempoAsignacion->SetValue($valor);
//DEL  }
//DEL  
//DEL  
//DEL  $Grid1->Cumple_Inc_TiempoSolucion->Visible  =false;
//DEL  $valor=$Grid1->Cumple_Inc_TiempoSolucion->GetValue();
//DEL  switch($valor){
//DEL  		case "1":
//DEL  			$Grid1->ImgCumple_Inc_TiempoSolucion->SetValue("images/Cumple.png");  
//DEL  			$Grid1->ImgCumple_Inc_TiempoSolucion->Visible  =true;
//DEL  			break;
//DEL  		case "0":
//DEL  			$Grid1->ImgCumple_Inc_TiempoSolucion->SetValue("images/NoCumple.png");  
//DEL  			$Grid1->ImgCumple_Inc_TiempoSolucion->Visible  =true;
//DEL  			break;
//DEL  		default:
//DEL  			$Grid1->ImgCumple_Inc_TiempoSolucion->Visible  =false;
//DEL  			$Grid1->Cumple_Inc_TiempoSolucion->Visible  =true;
//DEL  			$Grid1->Cumple_Inc_TiempoSolucion->SetValue($valor);
//DEL  
//DEL  	} 
//DEL  
//DEL  
//DEL  // -------------------------

//result_comparativo_incide_result_comparativo_incide_TotalRecords_BeforeShow @174-A7703527
function result_comparativo_incide_result_comparativo_incide_TotalRecords_BeforeShow(& $sender)
{
    $result_comparativo_incide_result_comparativo_incide_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_incide; //Compatibility
//End result_comparativo_incide_result_comparativo_incide_TotalRecords_BeforeShow

//Retrieve number of records @175-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close result_comparativo_incide_result_comparativo_incide_TotalRecords_BeforeShow @174-41A859C9
    return $result_comparativo_incide_result_comparativo_incide_TotalRecords_BeforeShow;
}
//End Close result_comparativo_incide_result_comparativo_incide_TotalRecords_BeforeShow

//result_comparativo_incide_BeforeShowRow @172-02C1D6B1
function result_comparativo_incide_BeforeShowRow(& $sender)
{
    $result_comparativo_incide_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_incide; //Compatibility
//End result_comparativo_incide_BeforeShowRow

//Set Row Style @177-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close result_comparativo_incide_BeforeShowRow @172-DCB18296
    return $result_comparativo_incide_BeforeShowRow;
}
//End Close result_comparativo_incide_BeforeShowRow

//result_comparativo_incide1_BeforeShow @199-415C45A7
function result_comparativo_incide1_BeforeShow(& $sender)
{
    $result_comparativo_incide1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_incide1; //Compatibility
//End result_comparativo_incide1_BeforeShow

//Custom Code @287-2A29BDB7
// -------------------------
if (CCGetFromGet("s_id_incidencia","")=="")
 {
 	$result_comparativo_incide1->Visible=False;
 }
else
 { 	 
     $result_comparativo_incide1->Cumple_Inc_TiempoAsignacion->Visible  =false;  
	$valor=$result_comparativo_incide1->Cumple_Inc_TiempoAsignacion->GetValue(); 
	switch($valor){
			case "1":
				$result_comparativo_incide1->imgCumple_Inc_TiempoAsignacion->SetValue("images/Cumple.png");  
				$result_comparativo_incide1->imgCumple_Inc_TiempoAsignacion->Visible  =true;
				break;
			case "0":
				$result_comparativo_incide1->imgCumple_Inc_TiempoAsignacion->SetValue("images/NoCumple.png");  
				$result_comparativo_incide1->imgCumple_Inc_TiempoAsignacion->Visible  =true;
				break;
			default:
				$result_comparativo_incide1->imgCumple_Inc_TiempoAsignacion->Visible  =false;
				$result_comparativo_incide1->Cumple_Inc_TiempoAsignacion->Visible  =true;
				$result_comparativo_incide1->Cumple_Inc_TiempoAsignacion->SetValue($valor);
	}


	$result_comparativo_incide1->Cumple_Inc_TiempoSolucion->Visible  =false;
	$valor=$result_comparativo_incide1->Cumple_Inc_TiempoSolucion->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_incide1->imgCumple_Inc_TiempoSolucion->SetValue("images/Cumple.png");  
				$result_comparativo_incide1->imgCumple_Inc_TiempoSolucion->Visible  =true;
				break;
			case "0":
				$result_comparativo_incide1->imgCumple_Inc_TiempoSolucion->SetValue("images/NoCumple.png");  
				$result_comparativo_incide1->imgCumple_Inc_TiempoSolucion->Visible  =true;
				break;
			default:
				$result_comparativo_incide1->imgCumple_Inc_TiempoSolucion->Visible  =false;
				$result_comparativo_incide1->Cumple_Inc_TiempoSolucion->Visible  =true;
				$result_comparativo_incide1->Cumple_Inc_TiempoSolucion->SetValue($valor);
	
		} 

 }

    // Write your own code here.
// -------------------------
//End Custom Code

//Close result_comparativo_incide1_BeforeShow @199-23353249
    return $result_comparativo_incide1_BeforeShow;
}
//End Close result_comparativo_incide1_BeforeShow

//result_comparativo_incide2_BeforeShow @219-9E7FE294
function result_comparativo_incide2_BeforeShow(& $sender)
{
    $result_comparativo_incide2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_incide2; //Compatibility
//End result_comparativo_incide2_BeforeShow

//Custom Code @290-2A29BDB7
// -------------------------
if (CCGetFromGet("s_id_incidencia","")=="")
 {
 	$result_comparativo_incide2->Visible=False;
 }
else
 { 	 
     $result_comparativo_incide2->Cumple_Inc_TiempoAsignacion->Visible  =false;  
$valor=$result_comparativo_incide2->Cumple_Inc_TiempoAsignacion->GetValue(); 
switch($valor){
		case "1":
			$result_comparativo_incide2->imgCumple_Inc_TiempoAsignacion->SetValue("images/Cumple.png");  
			$result_comparativo_incide2->imgCumple_Inc_TiempoAsignacion->Visible  =true;
			break;
		case "0":
			$result_comparativo_incide2->imgCumple_Inc_TiempoAsignacion->SetValue("images/NoCumple.png");  
			$result_comparativo_incide2->imgCumple_Inc_TiempoAsignacion->Visible  =true;
			break;
		default:
			$result_comparativo_incide2->imgCumple_Inc_TiempoAsignacion->Visible  =false;
			$result_comparativo_incide2->Cumple_Inc_TiempoAsignacion->Visible  =true;
			$result_comparativo_incide2->Cumple_Inc_TiempoAsignacion->SetValue($valor);
}


$result_comparativo_incide2->Cumple_Inc_TiempoSolucion->Visible  =false;
$valor=$result_comparativo_incide2->Cumple_Inc_TiempoSolucion->GetValue();
switch($valor){
		case "1":
			$result_comparativo_incide2->imgCumple_Inc_TiempoSolucion->SetValue("images/Cumple.png");  
			$result_comparativo_incide2->imgCumple_Inc_TiempoSolucion->Visible  =true;
			break;
		case "0":
			$result_comparativo_incide2->imgCumple_Inc_TiempoSolucion->SetValue("images/NoCumple.png");  
			$result_comparativo_incide2->imgCumple_Inc_TiempoSolucion->Visible  =true;
			break;
		default:
			$result_comparativo_incide2->imgCumple_Inc_TiempoSolucion->Visible  =false;
			$result_comparativo_incide2->Cumple_Inc_TiempoSolucion->Visible  =true;
			$result_comparativo_incide2->Cumple_Inc_TiempoSolucion->SetValue($valor);

	} 
 }
    // Write your own code here.
// -------------------------
//End Custom Code

//Close result_comparativo_incide2_BeforeShow @219-5F541792
    return $result_comparativo_incide2_BeforeShow;
}
//End Close result_comparativo_incide2_BeforeShow
?>
