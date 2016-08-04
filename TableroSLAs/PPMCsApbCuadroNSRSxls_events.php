<?php
//BindEvents Method @1-D39D030F
function BindEvents()
{
    global $Grid1;
    global $mc_calificacion_rs_MC;
    global $Grid2;
    global $Grid3;
    global $CCSEvents;
    $Grid1->CCSEvents["BeforeShowRow"] = "Grid1_BeforeShowRow";
    $Grid1->CCSEvents["BeforeShow"] = "Grid1_BeforeShow";
    $mc_calificacion_rs_MC->CCSEvents["BeforeShow"] = "mc_calificacion_rs_MC_BeforeShow";
    $Grid2->CCSEvents["BeforeShowRow"] = "Grid2_BeforeShowRow";
    $Grid2->CCSEvents["BeforeShow"] = "Grid2_BeforeShow";
    $Grid3->CCSEvents["BeforeShowRow"] = "Grid3_BeforeShowRow";
    $Grid3->CCSEvents["BeforeShow"] = "Grid3_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Grid1_BeforeShowRow @3-FCC1FF76
function Grid1_BeforeShowRow(& $sender)
{
    $Grid1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
//End Grid1_BeforeShowRow

//Custom Code @18-2A29BDB7
// -------------------------
    if($Grid1->SumaApb->GetValue()>0){
    	$Grid1->Cumplimiento->SetValue(number_format((($Grid1->SumaApb->GetValue()-$Grid1->incumplimientos->GetValue())/$Grid1->SumaApb->GetValue())*100 , 2, '.', ''))  ;
    	if($Grid1->Cumplimiento->GetValue()<$Grid1->Meta->GetValue()){
	    	$Grid1->Indicador->SetValue("images/NoCumple.png");
	    } else {
	    	$Grid1->Indicador->SetValue("images/Cumple.png");
	    }
    } else {
    	$Grid1->SumaApb->SetValue("Sin datos para<br>medir");
    	$Grid1->Cumplimiento->SetValue("Sin datos para<br>medir");
    	$Grid1->incumplimientos->SetValue("Sin datos para<br>medir");
    	$Grid1->Indicador->SetValue("images/left.png");
    }
    
// -------------------------
//End Custom Code

//Close Grid1_BeforeShowRow @3-23E47D26
    return $Grid1_BeforeShowRow;
}
//End Close Grid1_BeforeShowRow

//Grid1_BeforeShow @3-706857BD
function Grid1_BeforeShow(& $sender)
{
    $Grid1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid1; //Compatibility
    global $Grid2; //Compatibility

//End Grid1_BeforeShow

//Custom Code @51-2A29BDB7
// -------------------------
    
    //si no esta cerrado el mes de medición y no es CAPC no puede ver el cuadro CAPC    
    global $db;
    $db= new clsDBcnDisenio;
    $db->query("select  COUNT(*) from mc_universo_cds  where mes= " .CCGetParam("s_MesReporte",date('m')) . "  and anio = " .  CCGetParam("s_AnioReporte",date('Y')) . " and (Medido <>1 or Medido is null)");
	if($db->next_record()){
		if(($db->f(0)> 0 && CCGetSession("GrupoValoracion","")!='CAPC') ){
				$Grid1->Visible =false;				
				$Grid2->Visible =false;
				
		} else {
		     if(CCGetParam("s_id_proveedor",0)!=1){
				$Grid1->Visible =true;
				$Grid2->Visible =true;
		     } else {
				$Grid1->Visible =false;
				$Grid2->Visible =false;
		     
		     }
		}
	}
// -------------------------
//End Custom Code

//Close Grid1_BeforeShow @3-C0F58113
    return $Grid1_BeforeShow;
}
//End Close Grid1_BeforeShow

//mc_calificacion_rs_MC_BeforeShow @20-54D6F7CA
function mc_calificacion_rs_MC_BeforeShow(& $sender)
{
    $mc_calificacion_rs_MC_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_calificacion_rs_MC; //Compatibility
//End mc_calificacion_rs_MC_BeforeShow

//Custom Code @134-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio();
    $db->query("select month(cast(max(cast(anioreporte as varchar) + '-' + CAST(mesreporte as varchar) + '-01') as date)) " .
    	 ", year(cast(max(cast(anioreporte as varchar) + '-' + CAST(mesreporte as varchar) + '-01') as date)) from mc_calificacion_rs_MC");
    if($db->next_record()){
    	if(CCGetParam("s_MesReporte","")==""){
    		//$Grid2->s_MesReporte->SetValue($db->f(0));
    		$mc_calificacion_rs_MC->s_MesReporte->SetValue(date("m")-2);
    	}
    	if(CCGetParam("s_AnioReporte","")==""){
    		$mc_calificacion_rs_MC->s_AnioReporte->SetValue($db->f(1));
    		$mc_calificacion_rs_MC->s_AnioReporte->SetValue(date("Y"));
    	}
    }
    $db->close();

// -------------------------
//End Custom Code

//Close mc_calificacion_rs_MC_BeforeShow @20-9453A30A
    return $mc_calificacion_rs_MC_BeforeShow;
}
//End Close mc_calificacion_rs_MC_BeforeShow

//Grid2_BeforeShowRow @52-3751ABF8
function Grid2_BeforeShowRow(& $sender)
{
    $Grid2_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_BeforeShowRow

//Custom Code @66-2A29BDB7
// -------------------------
    if($Grid2->SumaApb->GetValue()>0){
    	$Grid2->Cumplimiento->SetValue(number_format((($Grid2->SumaApb->GetValue()-$Grid2->incumplimientos->GetValue())/$Grid2->SumaApb->GetValue())*100 , 2, '.', ''))  ;
    	if($Grid2->Cumplimiento->GetValue()<$Grid2->Meta->GetValue()){
	    	$Grid2->Indicador->SetValue("images/NoCumple.png");
	    } else {
	    	$Grid2->Indicador->SetValue("images/Cumple.png");
	    }
    } else {
    	$Grid2->SumaApb->SetValue("Sin datos para<br>medir");
    	$Grid2->Cumplimiento->SetValue("Sin datos para<br>medir");
    	$Grid2->incumplimientos->SetValue("Sin datos para<br>medir");
    	$Grid2->Indicador->SetValue("images/left.png");
    }
    
// -------------------------
//End Custom Code

//Close Grid2_BeforeShowRow @52-707E26A2
    return $Grid2_BeforeShowRow;
}
//End Close Grid2_BeforeShowRow

//Grid2_BeforeShow @52-F39F333E
function Grid2_BeforeShow(& $sender)
{
    $Grid2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_BeforeShow

//Custom Code @67-2A29BDB7
// -------------------------
			if (CCGetParam("s_id_proveedor",0)==1){
				$Grid2->Visible =false;
			} else{
				$Grid2->Visible =true;
			}
    
// -------------------------
//End Custom Code

//Close Grid2_BeforeShow @52-BC94A4C8
    return $Grid2_BeforeShow;
}
//End Close Grid2_BeforeShow

//Grid3_BeforeShowRow @115-71DE6782
function Grid3_BeforeShowRow(& $sender)
{
    $Grid3_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid3; //Compatibility
//End Grid3_BeforeShowRow

//Custom Code @131-2A29BDB7
// -------------------------
    if($Grid3->ReqAprob->GetValue()>0){
    	$Grid3->Cumplimiento->SetValue(number_format((($Grid3->ReqAprob->GetValue()-$Grid3->Incumpl->GetValue())/$Grid3->ReqAprob->GetValue())*100 , 2, '.', ''))  ;
    	if($Grid3->Cumplimiento->GetValue()<$Grid3->ValorObj->GetValue()){
	    	$Grid3->Indicador->SetValue("images/NoCumple.png");
	    } else {
	    	$Grid3->Indicador->SetValue("images/Cumple.png");
	    }
    } else {
    	$Grid3->ReqAprob->SetValue("Sin datos para<br>medir");
    	$Grid3->Cumplimiento->SetValue("Sin datos para<br>medir");
    	$Grid3->Incumpl->SetValue("Sin datos para<br>medir");
    	$Grid3->Indicador->SetValue("images/left.png");
    }

// -------------------------
//End Custom Code

//Close Grid3_BeforeShowRow @115-F7D8EDE1
    return $Grid3_BeforeShowRow;
}
//End Close Grid3_BeforeShowRow

//Grid3_BeforeShow @115-8D3210BF
function Grid3_BeforeShow(& $sender)
{
    $Grid3_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid3; //Compatibility
//End Grid3_BeforeShow

//Custom Code @132-2A29BDB7
// -------------------------
    //si no esta cerrado el mes de medición y no es CAPC no puede ver el cuadro CAPC    
    global $db;
    $db= new clsDBcnDisenio;
    $db->query("select  COUNT(*) from mc_universo_cds  where mes= " .CCGetParam("s_MesReporte",date('m')) . "  and anio = " .  CCGetParam("s_AnioReporte",date('Y')) . " and (Medido <>1 or Medido is null)");
	if($db->next_record()){
		echo("<script>console.log('".$db->f(0)."')</script>");
		if($db->f(0)> 0 && CCGetSession("GrupoValoracion","")!='CAPC' ){
				$Grid3->Visible=false;			
	    } else {
					if (CCGetParam("s_id_proveedor",0)==1){
						$Grid3->Visible =true;
					} else{
						$Grid3->Visible =false;
					}

		}
	}

// -------------------------
//End Custom Code

//Close Grid3_BeforeShow @115-219B45BE
    return $Grid3_BeforeShow;
}
//End Close Grid3_BeforeShow

//Page_BeforeShow @1-201FFBD8
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsApbCuadroNSRSxls; //Compatibility
//End Page_BeforeShow

//Custom Code @83-2A29BDB7
// -------------------------
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
