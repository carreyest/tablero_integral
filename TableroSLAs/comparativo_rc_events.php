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

//Grid1_BeforeShowRow @135-FCC1FF76
function Grid1_BeforeShowRow(& $sender)
{
    $Grid1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
//End Grid1_BeforeShowRow

//Custom Code @163-2A29BDB7
// -------------------------
	$Grid1->cump_req_func->Visible  =false;
  	$valor=  $Grid1->cump_req_func->GetValue();
switch($valor){
		case "1":
			$Grid1->imgcump_req_func->SetValue("images/Cumple.png");  
			$Grid1->imgcump_req_func->Visible  =true;
			break;
		case "0":
			$Grid1->imgcump_req_func->SetValue("images/NoCumple.png");  
			$Grid1->imgcump_req_func->Visible  =true;
			break;
		default:
			$Grid1->imgcump_req_func->Visible  =false;
			$Grid1->cump_req_func->Visible  =true;
			$Grid1->cump_req_func->SetValue($valor);  
			
			
}
	$Grid1->retraso_entregables->Visible  =false;
  	$valor=  $Grid1->retraso_entregables->GetValue();
switch($valor){
		case "1":
			$Grid1->imgretraso_entregables->SetValue("images/Cumple.png");  
			$Grid1->imgretraso_entregables->Visible  =true;
			break;
		case "0":
			$Grid1->imgretraso_entregables->SetValue("images/NoCumple.png");  
			$Grid1->imgretraso_entregables->Visible  =true;
			break;
		default:
			$Grid1->imgretraso_entregables->Visible  =false;
			$Grid1->retraso_entregables->Visible  =true;
			$Grid1->retraso_entregables->SetValue($valor);  	
			
}
	$Grid1->calidad_prod_term->Visible  =false;
  	$valor=  $Grid1->calidad_prod_term->GetValue();
switch($valor){
		case "1":
			$Grid1->imgcalidad_prod_term->SetValue("images/Cumple.png");  
			$Grid1->imgcalidad_prod_term->Visible  =true;
			break;
		case "0":
			$Grid1->imgcalidad_prod_term->SetValue("images/NoCumple.png");  
			$Grid1->imgcalidad_prod_term->Visible  =true;
			break;
		default:
			$Grid1->imgcalidad_prod_term->Visible  =false;
			$Grid1->calidad_prod_term->Visible  =true;
			$Grid1->calidad_prod_term->SetValue($valor);  	
			
}
	$Grid1->calidad_codigo->Visible  =false;
  	$valor=  $Grid1->calidad_codigo->GetValue();
switch($valor){
		case "1":
			$Grid1->imgcalidad_codigo->SetValue("images/Cumple.png");  
			$Grid1->imgcalidad_codigo->Visible  =true;
			break;
		case "0":
			$Grid1->imgcalidad_codigo->SetValue("images/NoCumple.png");  
			$Grid1->imgcalidad_codigo->Visible  =true;
			break;
		default:
			$Grid1->imgcalidad_codigo->Visible  =false;
			$Grid1->calidad_codigo->Visible  =true;
			$Grid1->calidad_codigo->SetValue($valor);  	
			
}
	$Grid1->defectos_fugados_amb_prod->Visible  =false;
  	$valor=  $Grid1->defectos_fugados_amb_prod->GetValue();
switch($valor){
		case "1":
			$Grid1->imgdefectos_fugados_amb_prod->SetValue("images/Cumple.png");  
			$Grid1->imgdefectos_fugados_amb_prod->Visible  =true;
			break;
		case "0":
			$Grid1->imgdefectos_fugados_amb_prod->SetValue("images/NoCumple.png");  
			$Grid1->imgdefectos_fugados_amb_prod->Visible  =true;
			break;
		default:
			$Grid1->imgdefectos_fugados_amb_prod->Visible  =false;
			$Grid1->defectos_fugados_amb_prod->Visible  =true;
			$Grid1->defectos_fugados_amb_prod->SetValue($valor);  	
			
}

    // Write your own code here.
// -------------------------
//End Custom Code

//Close Grid1_BeforeShowRow @135-23E47D26
    return $Grid1_BeforeShowRow;
}
//End Close Grid1_BeforeShowRow


?>
