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

//Custom Code @173-2A29BDB7
// -------------------------
$Grid1->herr_est_cost->Visible  =false;
  $valor=  $Grid1->herr_est_cost->GetValue();
switch($valor){
		case "1":
			$Grid1->Imgherr_est_cost->SetValue("images/Cumple.png");  
			$Grid1->Imgherr_est_cost->Visible  =true;
			break;
		case "0":
			$Grid1->Imgherr_est_cost->SetValue("images/NoCumple.png");  
			$Grid1->Imgherr_est_cost->Visible  =true;
			break;
		default:
			$Grid1->Imgherr_est_cost->Visible  =false;
			$Grid1->herr_est_cost->Visible  =true;
			$Grid1->herr_est_cost->SetValue($valor);  
			
			
}

$Grid1->req_serv->Visible  =false;
$valor=$Grid1->req_serv->GetValue();
switch($valor){
		case "1":
			$Grid1->imgreq_serv->SetValue("images/Cumple.png");  
			$Grid1->imgreq_serv->Visible  =true;
			break;
		case "0":
			$Grid1->imgreq_serv->SetValue("images/NoCumple.png");  
			$Grid1->imgreq_serv->Visible  =true;
			break;
		default:
			$Grid1->imgreq_serv->Visible  =false;
			$Grid1->req_serv->Visible  =true;
			$Grid1->req_serv->SetValue($valor);  
			
	}
// -------------------------
//End Custom Code

//Close Grid1_BeforeShowRow @135-23E47D26
    return $Grid1_BeforeShowRow;
}
//End Close Grid1_BeforeShowRow


?>
