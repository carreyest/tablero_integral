<?php
//BindEvents Method @1-0A1FA38E
function BindEvents()
{
    global $periodos_carga;
    global $result_comparativo_cierre;
    global $result_comparativo_cierre1;
    global $result_comparativo_cierre2;
    $periodos_carga->Label1->CCSEvents["BeforeShow"] = "periodos_carga_Label1_BeforeShow";
    $result_comparativo_cierre->result_comparativo_cierre_TotalRecords->CCSEvents["BeforeShow"] = "result_comparativo_cierre_result_comparativo_cierre_TotalRecords_BeforeShow";
    $result_comparativo_cierre->CCSEvents["BeforeShowRow"] = "result_comparativo_cierre_BeforeShowRow";
    $result_comparativo_cierre1->CCSEvents["BeforeShow"] = "result_comparativo_cierre1_BeforeShow";
    $result_comparativo_cierre2->CCSEvents["BeforeShow"] = "result_comparativo_cierre2_BeforeShow";
}
//End BindEvents Method

//periodos_carga_Label1_BeforeShow @173-4CC7D3D8
function periodos_carga_Label1_BeforeShow(& $sender)
{
    $periodos_carga_Label1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $periodos_carga; //Compatibility
//End periodos_carga_Label1_BeforeShow

//Custom Code @174-2A29BDB7
// -------------------------
    global $DBcnDisenio;
	$DBcnDisenio->query("select nombre_mes + '/' + convert(varchar(4),anio) fecha from archivosxls.dbo.periodos_carga where id_periodo=". $periodos_carga->s_id_periodo->getValue());
	if($DBcnDisenio->next_record()){
		$periodos_carga->Label1->SetValue($DBcnDisenio->f("fecha"));
	}
// -------------------------
//End Custom Code

//Close periodos_carga_Label1_BeforeShow @173-EAE38E32
    return $periodos_carga_Label1_BeforeShow;
}
//End Close periodos_carga_Label1_BeforeShow

//result_comparativo_cierre_result_comparativo_cierre_TotalRecords_BeforeShow @177-5AE748E8
function result_comparativo_cierre_result_comparativo_cierre_TotalRecords_BeforeShow(& $sender)
{
    $result_comparativo_cierre_result_comparativo_cierre_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_cierre; //Compatibility
//End result_comparativo_cierre_result_comparativo_cierre_TotalRecords_BeforeShow

//Retrieve number of records @178-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close result_comparativo_cierre_result_comparativo_cierre_TotalRecords_BeforeShow @177-FF3B6C8F
    return $result_comparativo_cierre_result_comparativo_cierre_TotalRecords_BeforeShow;
}
//End Close result_comparativo_cierre_result_comparativo_cierre_TotalRecords_BeforeShow

//result_comparativo_cierre_BeforeShowRow @175-B3BBD459
function result_comparativo_cierre_BeforeShowRow(& $sender)
{
    $result_comparativo_cierre_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_cierre; //Compatibility
//End result_comparativo_cierre_BeforeShowRow

//Set Row Style @181-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close result_comparativo_cierre_BeforeShowRow @175-3F0C3620
    return $result_comparativo_cierre_BeforeShowRow;
}
//End Close result_comparativo_cierre_BeforeShowRow

//result_comparativo_cierre1_BeforeShow @192-11CFE240
function result_comparativo_cierre1_BeforeShow(& $sender)
{
    $result_comparativo_cierre1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_cierre1; //Compatibility
//End result_comparativo_cierre1_BeforeShow

//Custom Code @216-2A29BDB7
// -------------------------
if (CCGetFromGet("s_id_ppmc_cierre","")=="" || CCGetFromGet("s_id_estimacion_cierre","")=="")
 {
 	$result_comparativo_cierre1->Visible=False;
 }
else
 { 	 
     $result_comparativo_cierre1->cump_req_func->Visible  =false;  
	$valor=$result_comparativo_cierre1->cump_req_func->GetValue(); 
	switch($valor){
			case "1":
				$result_comparativo_cierre1->imgcump_req_func->SetValue("images/Cumple.png");  
				$result_comparativo_cierre1->imgcump_req_func->Visible  =true;
				break;
			case "0":
				$result_comparativo_cierre1->imgcump_req_func->SetValue("images/NoCumple.png");  
				$result_comparativo_cierre1->imgcump_req_func->Visible  =true;
				break;
			default:
				$result_comparativo_cierre1->imgcump_req_func->Visible  =false;
				$result_comparativo_cierre1->cump_req_func->Visible  =true;
				$result_comparativo_cierre1->cump_req_func->SetValue($valor);
	}


	$result_comparativo_cierre1->retraso_entregables->Visible  =false;
	$valor=$result_comparativo_cierre1->retraso_entregables->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_cierre1->imgretraso_entregables->SetValue("images/Cumple.png");  
				$result_comparativo_cierre1->imgretraso_entregables->Visible  =true;
				break;
			case "0":
				$result_comparativo_cierre1->imgretraso_entregables->SetValue("images/NoCumple.png");  
				$result_comparativo_cierre1->imgretraso_entregables->Visible  =true;
				break;
			default:
				$result_comparativo_cierre1->imgretraso_entregables->Visible  =false;
				$result_comparativo_cierre1->retraso_entregables->Visible  =true;
				$result_comparativo_cierre1->retraso_entregables->SetValue($valor);
	
	}
	

	$result_comparativo_cierre1->calidad_prod_term->Visible  =false;
	$valor=$result_comparativo_cierre1->calidad_prod_term->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_cierre1->imgcalidad_prod_term->SetValue("images/Cumple.png");  
				$result_comparativo_cierre1->imgcalidad_prod_term->Visible  =true;
				break;
			case "0":
				$result_comparativo_cierre1->imgcalidad_prod_term->SetValue("images/NoCumple.png");  
				$result_comparativo_cierre1->imgcalidad_prod_term->Visible  =true;
				break;
			default:
				$result_comparativo_cierre1->imgcalidad_prod_term->Visible  =false;
				$result_comparativo_cierre1->calidad_prod_term->Visible  =true;
				$result_comparativo_cierre1->calidad_prod_term->SetValue($valor);
	
	}
	

	$result_comparativo_cierre1->calidad_codigo->Visible  =false;
	$valor=$result_comparativo_cierre1->calidad_codigo->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_cierre1->imgcalidad_codigo->SetValue("images/Cumple.png");  
				$result_comparativo_cierre1->imgcalidad_codigo->Visible  =true;
				break;
			case "0":
				$result_comparativo_cierre1->imgcalidad_codigo->SetValue("images/NoCumple.png");  
				$result_comparativo_cierre1->imgcalidad_codigo->Visible  =true;
				break;
			default:
				$result_comparativo_cierre1->imgcalidad_codigo->Visible  =false;
				$result_comparativo_cierre1->calidad_codigo->Visible  =true;
				$result_comparativo_cierre1->calidad_codigo->SetValue($valor);
	
	} 
	
	$result_comparativo_cierre1->defectos_fugados_amb_prod->Visible  =false;
	$valor=$result_comparativo_cierre1->defectos_fugados_amb_prod->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_cierre1->imgdefectos_fugados_amb_prod->SetValue("images/Cumple.png");  
				$result_comparativo_cierre1->imgdefectos_fugados_amb_prod->Visible  =true;
				break;
			case "0":
				$result_comparativo_cierre1->imgdefectos_fugados_amb_prod->SetValue("images/NoCumple.png");  
				$result_comparativo_cierre1->imgdefectos_fugados_amb_prod->Visible  =true;
				break;
			default:
				$result_comparativo_cierre1->imgdefectos_fugados_amb_prod->Visible  =false;
				$result_comparativo_cierre1->defectos_fugados_amb_prod->Visible  =true;
				$result_comparativo_cierre1->defectos_fugados_amb_prod->SetValue($valor);
	
	}
	



 }
    
    // Write your own code here.
// -------------------------
//End Custom Code

//Close result_comparativo_cierre1_BeforeShow @192-270F7FA4
    return $result_comparativo_cierre1_BeforeShow;
}
//End Close result_comparativo_cierre1_BeforeShow

//result_comparativo_cierre2_BeforeShow @231-CEEC4573
function result_comparativo_cierre2_BeforeShow(& $sender)
{
    $result_comparativo_cierre2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $result_comparativo_cierre2; //Compatibility
//End result_comparativo_cierre2_BeforeShow

//Custom Code @261-2A29BDB7
// -------------------------

if (CCGetFromGet("s_id_ppmc_cierre","")=="" || CCGetFromGet("s_id_estimacion_cierre","")=="")
 {
 	$result_comparativo_cierre2->Visible=False;
 }
else
 { 	 
     $result_comparativo_cierre2->cump_req_func->Visible  =false;  
	$valor=$result_comparativo_cierre2->cump_req_func->GetValue(); 
	switch($valor){
			case "1":
				$result_comparativo_cierre2->imgcump_req_func->SetValue("images/Cumple.png");  
				$result_comparativo_cierre2->imgcump_req_func->Visible  =true;
				break;
			case "0":
				$result_comparativo_cierre2->imgcump_req_func->SetValue("images/NoCumple.png");  
				$result_comparativo_cierre2->imgcump_req_func->Visible  =true;
				break;
			default:
				$result_comparativo_cierre2->imgcump_req_func->Visible  =false;
				$result_comparativo_cierre2->cump_req_func->Visible  =true;
				$result_comparativo_cierre2->cump_req_func->SetValue($valor);
	}


	$result_comparativo_cierre2->retraso_entregables->Visible  =false;
	$valor=$result_comparativo_cierre2->retraso_entregables->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_cierre2->imgretraso_entregables->SetValue("images/Cumple.png");  
				$result_comparativo_cierre2->imgretraso_entregables->Visible  =true;
				break;
			case "0":
				$result_comparativo_cierre2->imgretraso_entregables->SetValue("images/NoCumple.png");  
				$result_comparativo_cierre2->imgretraso_entregables->Visible  =true;
				break;
			default:
				$result_comparativo_cierre2->imgretraso_entregables->Visible  =false;
				$result_comparativo_cierre2->retraso_entregables->Visible  =true;
				$result_comparativo_cierre2->retraso_entregables->SetValue($valor);
	
	}
	

	$result_comparativo_cierre2->calidad_prod_term->Visible  =false;
	$valor=$result_comparativo_cierre2->calidad_prod_term->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_cierre2->imgcalidad_prod_term->SetValue("images/Cumple.png");  
				$result_comparativo_cierre2->imgcalidad_prod_term->Visible  =true;
				break;
			case "0":
				$result_comparativo_cierre2->imgcalidad_prod_term->SetValue("images/NoCumple.png");  
				$result_comparativo_cierre2->imgcalidad_prod_term->Visible  =true;
				break;
			default:
				$result_comparativo_cierre2->imgcalidad_prod_term->Visible  =false;
				$result_comparativo_cierre2->calidad_prod_term->Visible  =true;
				$result_comparativo_cierre2->calidad_prod_term->SetValue($valor);
	
	}
	

	$result_comparativo_cierre2->calidad_codigo->Visible  =false;
	$valor=$result_comparativo_cierre2->calidad_codigo->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_cierre2->imgcalidad_codigo->SetValue("images/Cumple.png");  
				$result_comparativo_cierre2->imgcalidad_codigo->Visible  =true;
				break;
			case "0":
				$result_comparativo_cierre2->imgcalidad_codigo->SetValue("images/NoCumple.png");  
				$result_comparativo_cierre2->imgcalidad_codigo->Visible  =true;
				break;
			default:
				$result_comparativo_cierre2->imgcalidad_codigo->Visible  =false;
				$result_comparativo_cierre2->calidad_codigo->Visible  =true;
				$result_comparativo_cierre2->calidad_codigo->SetValue($valor);
	
	} 
	
	$result_comparativo_cierre2->defectos_fugados_amb_prod->Visible  =false;
	$valor=$result_comparativo_cierre2->defectos_fugados_amb_prod->GetValue();
	switch($valor){
			case "1":
				$result_comparativo_cierre2->imgdefectos_fugados_amb_prod->SetValue("images/Cumple.png");  
				$result_comparativo_cierre2->imgdefectos_fugados_amb_prod->Visible  =true;
				break;
			case "0":
				$result_comparativo_cierre2->imgdefectos_fugados_amb_prod->SetValue("images/NoCumple.png");  
				$result_comparativo_cierre2->imgdefectos_fugados_amb_prod->Visible  =true;
				break;
			default:
				$result_comparativo_cierre2->imgdefectos_fugados_amb_prod->Visible  =false;
				$result_comparativo_cierre2->defectos_fugados_amb_prod->Visible  =true;
				$result_comparativo_cierre2->defectos_fugados_amb_prod->SetValue($valor);
	
	}
	



 }
    // Write your own code here.
// -------------------------
//End Custom Code

//Close result_comparativo_cierre2_BeforeShow @231-5B6E5A7F
    return $result_comparativo_cierre2_BeforeShow;
}
//End Close result_comparativo_cierre2_BeforeShow

//DEL  // -------------------------
//DEL  	$Grid1->cump_req_func->Visible  =false;
//DEL    	$valor=  $Grid1->cump_req_func->GetValue();
//DEL  switch($valor){
//DEL  		case "1":
//DEL  			$Grid1->imgcump_req_func->SetValue("images/Cumple.png");  
//DEL  			$Grid1->imgcump_req_func->Visible  =true;
//DEL  			break;
//DEL  		case "0":
//DEL  			$Grid1->imgcump_req_func->SetValue("images/NoCumple.png");  
//DEL  			$Grid1->imgcump_req_func->Visible  =true;
//DEL  			break;
//DEL  		default:
//DEL  			$Grid1->imgcump_req_func->Visible  =false;
//DEL  			$Grid1->cump_req_func->Visible  =true;
//DEL  			$Grid1->cump_req_func->SetValue($valor);  
//DEL  			
//DEL  			
//DEL  }
//DEL  	$Grid1->retraso_entregables->Visible  =false;
//DEL    	$valor=  $Grid1->retraso_entregables->GetValue();
//DEL  switch($valor){
//DEL  		case "1":
//DEL  			$Grid1->imgretraso_entregables->SetValue("images/Cumple.png");  
//DEL  			$Grid1->imgretraso_entregables->Visible  =true;
//DEL  			break;
//DEL  		case "0":
//DEL  			$Grid1->imgretraso_entregables->SetValue("images/NoCumple.png");  
//DEL  			$Grid1->imgretraso_entregables->Visible  =true;
//DEL  			break;
//DEL  		default:
//DEL  			$Grid1->imgretraso_entregables->Visible  =false;
//DEL  			$Grid1->retraso_entregables->Visible  =true;
//DEL  			$Grid1->retraso_entregables->SetValue($valor);  	
//DEL  			
//DEL  }
//DEL  	$Grid1->calidad_prod_term->Visible  =false;
//DEL    	$valor=  $Grid1->calidad_prod_term->GetValue();
//DEL  switch($valor){
//DEL  		case "1":
//DEL  			$Grid1->imgcalidad_prod_term->SetValue("images/Cumple.png");  
//DEL  			$Grid1->imgcalidad_prod_term->Visible  =true;
//DEL  			break;
//DEL  		case "0":
//DEL  			$Grid1->imgcalidad_prod_term->SetValue("images/NoCumple.png");  
//DEL  			$Grid1->imgcalidad_prod_term->Visible  =true;
//DEL  			break;
//DEL  		default:
//DEL  			$Grid1->imgcalidad_prod_term->Visible  =false;
//DEL  			$Grid1->calidad_prod_term->Visible  =true;
//DEL  			$Grid1->calidad_prod_term->SetValue($valor);  	
//DEL  			
//DEL  }
//DEL  	$Grid1->calidad_codigo->Visible  =false;
//DEL    	$valor=  $Grid1->calidad_codigo->GetValue();
//DEL  switch($valor){
//DEL  		case "1":
//DEL  			$Grid1->imgcalidad_codigo->SetValue("images/Cumple.png");  
//DEL  			$Grid1->imgcalidad_codigo->Visible  =true;
//DEL  			break;
//DEL  		case "0":
//DEL  			$Grid1->imgcalidad_codigo->SetValue("images/NoCumple.png");  
//DEL  			$Grid1->imgcalidad_codigo->Visible  =true;
//DEL  			break;
//DEL  		default:
//DEL  			$Grid1->imgcalidad_codigo->Visible  =false;
//DEL  			$Grid1->calidad_codigo->Visible  =true;
//DEL  			$Grid1->calidad_codigo->SetValue($valor);  	
//DEL  			
//DEL  }
//DEL  	$Grid1->defectos_fugados_amb_prod->Visible  =false;
//DEL    	$valor=  $Grid1->defectos_fugados_amb_prod->GetValue();
//DEL  switch($valor){
//DEL  		case "1":
//DEL  			$Grid1->imgdefectos_fugados_amb_prod->SetValue("images/Cumple.png");  
//DEL  			$Grid1->imgdefectos_fugados_amb_prod->Visible  =true;
//DEL  			break;
//DEL  		case "0":
//DEL  			$Grid1->imgdefectos_fugados_amb_prod->SetValue("images/NoCumple.png");  
//DEL  			$Grid1->imgdefectos_fugados_amb_prod->Visible  =true;
//DEL  			break;
//DEL  		default:
//DEL  			$Grid1->imgdefectos_fugados_amb_prod->Visible  =false;
//DEL  			$Grid1->defectos_fugados_amb_prod->Visible  =true;
//DEL  			$Grid1->defectos_fugados_amb_prod->SetValue($valor);  	
//DEL  			
//DEL  }
//DEL  
//DEL      // Write your own code here.
//DEL  // -------------------------



?>
