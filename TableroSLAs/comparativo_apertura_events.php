<?php
//BindEvents Method @1-AF2237E1
function BindEvents()
{
    global $periodos_carga;
    global $result_comparativo_apertu;
    global $result_comparativo_apertu1;
    global $result_comparativo_apertu2;
    $periodos_carga->Label1->CCSEvents["BeforeShow"] = "periodos_carga_Label1_BeforeShow";
    $result_comparativo_apertu->result_comparativo_apertu_TotalRecords->CCSEvents["BeforeShow"] = "result_comparativo_apertu_result_comparativo_apertu_TotalRecords_BeforeShow";
    $result_comparativo_apertu->CCSEvents["BeforeShowRow"] = "result_comparativo_apertu_BeforeShowRow";
    $result_comparativo_apertu1->CCSEvents["BeforeShow"] = "result_comparativo_apertu1_BeforeShow";
    $result_comparativo_apertu2->CCSEvents["BeforeShow"] = "result_comparativo_apertu2_BeforeShow";
}
//End BindEvents Method

//periodos_carga_Label1_BeforeShow @190-4CC7D3D8
function periodos_carga_Label1_BeforeShow(& $sender)
{
    $periodos_carga_Label1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $periodos_carga; //Compatibility
//End periodos_carga_Label1_BeforeShow

//Custom Code @191-2A29BDB7
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

//Close periodos_carga_Label1_BeforeShow @190-EAE38E32
    return $periodos_carga_Label1_BeforeShow;
}
//End Close periodos_carga_Label1_BeforeShow

//DEL  // -------------------------
//DEL  $Grid1->herr_est_cost->Visible  =false;
//DEL    $valor=  $Grid1->herr_est_cost->GetValue();
//DEL  switch($valor){
//DEL  		case "1":
//DEL  			$Grid1->Imgherr_est_cost->SetValue("images/Cumple.png");  
//DEL  			$Grid1->Imgherr_est_cost->Visible  =true;
//DEL  			break;
//DEL  		case "0":
//DEL  			$Grid1->Imgherr_est_cost->SetValue("images/NoCumple.png");  
//DEL  			$Grid1->Imgherr_est_cost->Visible  =true;
//DEL  			break;
//DEL  		default:
//DEL  			$Grid1->Imgherr_est_cost->Visible  =false;
//DEL  			$Grid1->herr_est_cost->Visible  =true;
//DEL  			$Grid1->herr_est_cost->SetValue($valor);  
//DEL  			
//DEL  			
//DEL  }
//DEL  
//DEL  $Grid1->req_serv->Visible  =false;
//DEL  $valor=$Grid1->req_serv->GetValue();
//DEL  switch($valor){
//DEL  		case "1":
//DEL  			$Grid1->imgreq_serv->SetValue("images/Cumple.png");  
//DEL  			$Grid1->imgreq_serv->Visible  =true;
//DEL  			break;
//DEL  		case "0":
//DEL  			$Grid1->imgreq_serv->SetValue("images/NoCumple.png");  
//DEL  			$Grid1->imgreq_serv->Visible  =true;
//DEL  			break;
//DEL  		default:
//DEL  			$Grid1->imgreq_serv->Visible  =false;
//DEL  			$Grid1->req_serv->Visible  =true;
//DEL  			$Grid1->req_serv->SetValue($valor);  
//DEL  			
//DEL  	}
//DEL  // -------------------------

//result_comparativo_apertu_result_comparativo_apertu_TotalRecords_BeforeShow @194-45CDC861
function result_comparativo_apertu_result_comparativo_apertu_TotalRecords_BeforeShow(& $sender)
{
    $result_comparativo_apertu_result_comparativo_apertu_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_apertu; //Compatibility
//End result_comparativo_apertu_result_comparativo_apertu_TotalRecords_BeforeShow

//Retrieve number of records @195-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close result_comparativo_apertu_result_comparativo_apertu_TotalRecords_BeforeShow @194-97AC710B
    return $result_comparativo_apertu_result_comparativo_apertu_TotalRecords_BeforeShow;
}
//End Close result_comparativo_apertu_result_comparativo_apertu_TotalRecords_BeforeShow

//result_comparativo_apertu_BeforeShowRow @192-70CFB298
function result_comparativo_apertu_BeforeShowRow(& $sender)
{
    $result_comparativo_apertu_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_apertu; //Compatibility
//End result_comparativo_apertu_BeforeShowRow

//Set Row Style @198-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close result_comparativo_apertu_BeforeShowRow @192-F9BD425C
    return $result_comparativo_apertu_BeforeShowRow;
}
//End Close result_comparativo_apertu_BeforeShowRow

//result_comparativo_apertu1_BeforeShow @209-A002D70D
function result_comparativo_apertu1_BeforeShow(& $sender)
{
    $result_comparativo_apertu1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_apertu1; //Compatibility
//End result_comparativo_apertu1_BeforeShow

//Custom Code @238-2A29BDB7
// -------------------------
if (CCGetFromGet("s_id_ppmc","")=="")
 {
 	$result_comparativo_apertu1->Visible=False;
 }
else
 { 	 
     $result_comparativo_apertu1->herr_est_cost->Visible  =false;  
	$valor=$result_comparativo_apertu1->herr_est_cost->GetValue(); 
	switch($valor){
			case "1":
				$result_comparativo_apertu1->imgherr_est_cost->SetValue("images/Cumple.png");  
				$result_comparativo_apertu1->imgherr_est_cost->Visible  =true;
				break;
			case "0":
				$result_comparativo_apertu1->imgherr_est_cost->SetValue("images/NoCumple.png");  
				$result_comparativo_apertu1->imgherr_est_cost->Visible  =true;
				break;
			default:
				$result_comparativo_apertu1->imgherr_est_cost->Visible  =false;
				$result_comparativo_apertu1->herr_est_cost->Visible  =true;
				$result_comparativo_apertu1->herr_est_cost->SetValue($valor);
	}


	$result_comparativo_apertu1->req_serv->Visible  =false;
	$valor=$result_comparativo_apertu1->req_serv->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_apertu1->imgreq_serv->SetValue("images/Cumple.png");  
				$result_comparativo_apertu1->imgreq_serv->Visible  =true;
				break;
			case "0":
				$result_comparativo_apertu1->imgreq_serv->SetValue("images/NoCumple.png");  
				$result_comparativo_apertu1->imgreq_serv->Visible  =true;
				break;
			default:
				$result_comparativo_apertu1->imgreq_serv->Visible  =false;
				$result_comparativo_apertu1->req_serv->Visible  =true;
				$result_comparativo_apertu1->req_serv->SetValue($valor);
	
		} 

 }


    // Write your own code here.
// -------------------------
//End Custom Code

//Close result_comparativo_apertu1_BeforeShow @209-37335954
    return $result_comparativo_apertu1_BeforeShow;
}
//End Close result_comparativo_apertu1_BeforeShow

//result_comparativo_apertu2_BeforeShow @239-7F21703E
function result_comparativo_apertu2_BeforeShow(& $sender)
{
    $result_comparativo_apertu2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_apertu2; //Compatibility
//End result_comparativo_apertu2_BeforeShow

//Custom Code @267-2A29BDB7
// -------------------------
if (CCGetFromGet("s_id_ppmc","")=="")
 {
 	$result_comparativo_apertu2->Visible=False;
 }
else
 { 	 
     $result_comparativo_apertu2->herr_est_cost->Visible  =false;  
	$valor=$result_comparativo_apertu2->herr_est_cost->GetValue(); 
	switch($valor){
			case "1":
				$result_comparativo_apertu2->imgherr_est_cost->SetValue("images/Cumple.png");  
				$result_comparativo_apertu2->imgherr_est_cost->Visible  =true;
				break;
			case "0":
				$result_comparativo_apertu2->imgherr_est_cost->SetValue("images/NoCumple.png");  
				$result_comparativo_apertu2->imgherr_est_cost->Visible  =true;
				break;
			default:
				$result_comparativo_apertu2->imgherr_est_cost->Visible  =false;
				$result_comparativo_apertu2->herr_est_cost->Visible  =true;
				$result_comparativo_apertu2->herr_est_cost->SetValue($valor);
	}


	$result_comparativo_apertu2->req_serv->Visible  =false;
	$valor=$result_comparativo_apertu2->req_serv->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_apertu2->imgreq_serv->SetValue("images/Cumple.png");  
				$result_comparativo_apertu2->imgreq_serv->Visible  =true;
				break;
			case "0":
				$result_comparativo_apertu2->imgreq_serv->SetValue("images/NoCumple.png");  
				$result_comparativo_apertu2->imgreq_serv->Visible  =true;
				break;
			default:
				$result_comparativo_apertu2->imgreq_serv->Visible  =false;
				$result_comparativo_apertu2->req_serv->Visible  =true;
				$result_comparativo_apertu2->req_serv->SetValue($valor);
	
		} 

 }

    // Write your own code here.
// -------------------------
//End Custom Code

//Close result_comparativo_apertu2_BeforeShow @239-4B527C8F
    return $result_comparativo_apertu2_BeforeShow;
}
//End Close result_comparativo_apertu2_BeforeShow
?>
