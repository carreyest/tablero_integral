<?php
//BindEvents Method @1-5D22336D
function BindEvents()
{
    global $periodos_carga;
    global $Grid1;
    $periodos_carga->Label1->CCSEvents["BeforeShow"] = "periodos_carga_Label1_BeforeShow";
    $Grid1->CCSEvents["BeforeShowRow"] = "Grid1_BeforeShowRow";
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
	$DBcnDisenio->query("select nombre_mes + '/' + convert(varchar(4),anio) fecha from archivosxls.dbo.periodos_carga where id_periodo=". $periodos_carga->s_id_periodo->getValue());
	if($DBcnDisenio->next_record()){
		$periodos_carga->Label1->SetValue($DBcnDisenio->f("fecha"));
	}

// -------------------------
//End Custom Code

//Close periodos_carga_Label1_BeforeShow @170-EAE38E32
    return $periodos_carga_Label1_BeforeShow;
}
//End Close periodos_carga_Label1_BeforeShow

//Grid1_BeforeShowRow @135-FCC1FF76
function Grid1_BeforeShowRow(& $sender)
{
    $Grid1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
//End Grid1_BeforeShowRow

//Custom Code @156-2A29BDB7
// -------------------------


     $Grid1->Cumple_Inc_TiempoAsignacion->Visible  =false;  
$valor=$Grid1->Cumple_Inc_TiempoAsignacion->GetValue(); 
switch($valor){
		case "1":
			$Grid1->ImgCumple_Inc_TiempoAsignacion->SetValue("images/Cumple.png");  
			$Grid1->ImgCumple_Inc_TiempoAsignacion->Visible  =true;
			break;
		case "0":
			$Grid1->ImgCumple_Inc_TiempoAsignacion->SetValue("images/NoCumple.png");  
			$Grid1->ImgCumple_Inc_TiempoAsignacion->Visible  =true;
			break;
		default:
			$Grid1->ImgCumple_Inc_TiempoAsignacion->Visible  =false;
			$Grid1->Cumple_Inc_TiempoAsignacion->Visible  =true;
			$Grid1->Cumple_Inc_TiempoAsignacion->SetValue($valor);
}


$Grid1->Cumple_Inc_TiempoSolucion->Visible  =false;
$valor=$Grid1->Cumple_Inc_TiempoSolucion->GetValue();
switch($valor){
		case "1":
			$Grid1->ImgCumple_Inc_TiempoSolucion->SetValue("images/Cumple.png");  
			$Grid1->ImgCumple_Inc_TiempoSolucion->Visible  =true;
			break;
		case "0":
			$Grid1->ImgCumple_Inc_TiempoSolucion->SetValue("images/NoCumple.png");  
			$Grid1->ImgCumple_Inc_TiempoSolucion->Visible  =true;
			break;
		default:
			$Grid1->ImgCumple_Inc_TiempoSolucion->Visible  =false;
			$Grid1->Cumple_Inc_TiempoSolucion->Visible  =true;
			$Grid1->Cumple_Inc_TiempoSolucion->SetValue($valor);

	} 


// -------------------------
//End Custom Code

//Close Grid1_BeforeShowRow @135-23E47D26
    return $Grid1_BeforeShowRow;
}
//End Close Grid1_BeforeShowRow


?>
