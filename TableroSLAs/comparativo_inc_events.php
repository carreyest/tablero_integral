<?php
//BindEvents Method @1-B1A6A580
function BindEvents()
{
    global $Grid1;
    $Grid1->CCSEvents["BeforeShowRow"] = "Grid1_BeforeShowRow";
}
//End BindEvents Method

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
