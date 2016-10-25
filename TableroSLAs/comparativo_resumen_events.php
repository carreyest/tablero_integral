<?php
//BindEvents Method @1-108773EB
function BindEvents()
{
    global $periodos_carga;
    global $Grid2;
    global $Grid1;
    $periodos_carga->Label1->CCSEvents["BeforeShow"] = "periodos_carga_Label1_BeforeShow";
    $Grid2->CCSEvents["BeforeShowRow"] = "Grid2_BeforeShowRow";
    $Grid2->CCSEvents["BeforeShow"] = "Grid2_BeforeShow";
    $Grid1->ds->CCSEvents["AfterExecuteSelect"] = "Grid1_ds_AfterExecuteSelect";
}
//End BindEvents Method

//periodos_carga_Label1_BeforeShow @148-4CC7D3D8
function periodos_carga_Label1_BeforeShow(& $sender)
{
    $periodos_carga_Label1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $periodos_carga; //Compatibility
//End periodos_carga_Label1_BeforeShow

//Custom Code @149-2A29BDB7
// -------------------------
    //$periodos_carga->Label1->SetValue($periodos_carga->s_id_periodo->getValue());
	global $DBcnDisenio;
	if ($periodos_carga->s_id_periodo->getValue()) {
		$DBcnDisenio->query("select nombre_mes + '/' + convert(varchar(4),anio) fecha from archivosxls.dbo.periodos_carga where id_periodo=". $periodos_carga->s_id_periodo->getValue());
		if($DBcnDisenio->next_record()){
			$periodos_carga->Label1->SetValue($DBcnDisenio->f("fecha"));
		}
	}
    // Write your own code here.
// -------------------------
//End Custom Code

//Close periodos_carga_Label1_BeforeShow @148-EAE38E32
    return $periodos_carga_Label1_BeforeShow;
}
//End Close periodos_carga_Label1_BeforeShow

//Grid2_BeforeShowRow @24-3751ABF8
function Grid2_BeforeShowRow(& $sender)
{
    $Grid2_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_BeforeShowRow

//Custom Code @110-2A29BDB7
// -------------------------
        	global $db;
	global $lColorCelda;
	$db= new clsDBcnDisenio();
	/*
	para que este código funcione es necesario que el nombre de los controles cumpla con lo esperado en el código
	un prefijo seguido del acronimo del SLA 
	*/
	$db->query("SELECT lower(Acronimo)  FROM mc_c_metrica where id_ver_metrica<12 ");
	while($db->next_record()){
		$sAcronimo= $db->f(0);
		$sImg= "img" . $db->f(0); //se asocia la imagen al acronimo
		$sCumplen = "cumplen" . $sAcronimo;
		$sTotal = "tot"  . $sAcronimo;
		$sMeta = "meta_" . $sAcronimo;
		$Grid2->$sCumplen->Visible=false;
		$Grid2->$sTotal->Visible=false;
		//if($db->f(0)==1){//si el campo activo del SLA para el servicio es 1, se pintan los semáforos, de lo contrario no aplica el SLA para el servicio
			$Grid2->$sImg->SetValue("images/blank_SLA.png");
			if (isset($Grid2->$sImg)){
				if($Grid2->DataSource->f($sTotal) != "0" && $Grid2->DataSource->f($sTotal)!=""){

					$result=$Grid2->$sCumplen->GetValue();
					$result2= $Grid2->$sTotal->GetValue();
					$total_div=($result/$result2)*100;
					$Grid2->$sAcronimo->SetValue($Grid2->$sCumplen->GetValue() . "/" . $Grid2->$sTotal->GetValue() . " = " . round($total_div,2) . "%");
					if($Grid2->DataSource->f($db->f(0))<$Grid2->DataSource->f($sMeta)){
						$Grid2->$sImg->SetValue("images/down.png");						
					} else {
						$Grid2->$sImg->SetValue("images/up.png");
					}
				} else {
					$Grid2->$sImg->SetValue("images/left.png");
					$Grid2->$sAcronimo->SetValue("Sin Datos<br>para Medir");
				}
			}
	}
	$db->close();
// -------------------------
//End Custom Code


	$db= new clsDBcnDisenio();
	/*
	para que este código funcione es necesario que el nombre de los controles cumpla con lo esperado en el código
	un prefijo seguido del acronimo del SLA 
	*/
	$db->query("SELECT lower(Acronimo)  FROM mc_c_metrica where id_ver_metrica<12 ");
	while($db->next_record()){
		$sAcronimo= $db->f(0)."_sat";
		$sImg= "img" . $db->f(0)."_sat"; //se asocia la imagen al acronimo
		$sCumplen = "cumplen" . $sAcronimo;
		$sTotal = "tot"  . $sAcronimo;
		$sMeta = "meta_" . $sAcronimo;
		$Grid2->$sCumplen->Visible=false;
		$Grid2->$sTotal->Visible=false;
		//if($db->f(0)==1){//si el campo activo del SLA para el servicio es 1, se pintan los semáforos, de lo contrario no aplica el SLA para el servicio
			$Grid2->$sImg->SetValue("images/blank_SLA.png");
			if (isset($Grid2->$sImg)){
				if($Grid2->DataSource->f($sTotal) != "0" && $Grid2->DataSource->f($sTotal)!=""){
					$result=$Grid2->$sCumplen->GetValue();
					$result2= $Grid2->$sTotal->GetValue();
					$total_div=($result/$result2)*100;
					$Grid2->$sAcronimo->SetValue($Grid2->$sCumplen->GetValue() . "/" . $Grid2->$sTotal->GetValue() . " = " . round($total_div,2) . "%");
					if($Grid2->DataSource->f($db->f(0)."_sat")<$Grid2->DataSource->f($sMeta)){
						$Grid2->$sImg->SetValue("images/down.png");						
					} else {
						$Grid2->$sImg->SetValue("images/up.png");
					}
				} else {
					$Grid2->$sImg->SetValue("images/left.png");
					$Grid2->$sAcronimo->SetValue("Sin Datos<br>para Medir");
				}
			}
	}
	$db->close();
// -------------------------
//End Custom Code





// -------------------------
//End Custom Code

//Close Grid2_BeforeShowRow @24-707E26A2
    return $Grid2_BeforeShowRow;
}
//End Close Grid2_BeforeShowRow

//Grid2_BeforeShow @24-F39F333E
function Grid2_BeforeShow(& $sender)
{
    $Grid2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_BeforeShow
//Custom Code @153-2A29BDB7
// -------------------------
   	global $DBcnDisenio;
   	$db= new clsDBcnDisenio();
   	$consulta="
		SELECT count(*)
		FROM archivosxls.dbo.resumen_SAT sat LEFT JOIN archivosxls.dbo.resumen_CAPC capc ON sat.Medicion=capc.Medicion 
		WHERE sat.id_proveedor = ".CCGetParam("s_id_proveedor",0)."
		AND sat.id_periodo = ".CCGetParam("s_id_periodo",0)."
		AND sat.tipo_nivel_servicio = '".CCGetParam("s_opt_slas","SLA")."' 
		AND sat.id_periodo = capc.id_periodo 
		AND sat.id_proveedor = capc.id_proveedor 
		AND sat.tipo_nivel_servicio = capc.tipo_nivel_servicio
		AND sat.fecha_visible<=getDATE()
	";
	$db->query($consulta);

	if($db->next_record()){
		$registroGrid1=$db->f(0);
	}
    if ($registroGrid1 == 0) {
     	$Grid2->Visible=False;
    }
	$db->close(); 
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Grid2_BeforeShow @24-BC94A4C8
    return $Grid2_BeforeShow;
}
//End Close Grid2_BeforeShow

//Grid1_ds_AfterExecuteSelect @9-7BC43FC3
function Grid1_ds_AfterExecuteSelect(& $sender)
{
    $Grid1_ds_AfterExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
//End Grid1_ds_AfterExecuteSelect

//Custom Code @154-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Grid1_ds_AfterExecuteSelect @9-98A50B02
    return $Grid1_ds_AfterExecuteSelect;
}
//End Close Grid1_ds_AfterExecuteSelect


?>
