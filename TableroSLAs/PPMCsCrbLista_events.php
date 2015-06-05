<?php
//BindEvents Method @1-E27842D6
function BindEvents()
{
    global $Grid1;
    global $Grid2;
    global $CCSEvents;
    $Grid1->CCSEvents["BeforeShowRow"] = "Grid1_BeforeShowRow";
    $Grid1->CCSEvents["BeforeShow"] = "Grid1_BeforeShow";
    $Grid2->Button_DoSearch->CCSEvents["OnClick"] = "Grid2_Button_DoSearch_OnClick";
    $Grid2->s_anioparam->ds->CCSEvents["BeforeBuildSelect"] = "Grid2_s_anioparam_ds_BeforeBuildSelect";
    $Grid2->CCSEvents["OnValidate"] = "Grid2_OnValidate";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["BeforeOutput"] = "Page_BeforeOutput";
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

//Custom Code @37-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

// -------------------------
    global $aPPMCsAPbIds;
    global $aPPMCsAPbValues;
  	array_push($aPPMCsAPbIds,$Grid1->ds->f("Id"));
  	array_push($aPPMCsAPbValues,$Grid1->ds->f("ID_PPMC"));
	
	
	//Requisitos Funcionales
	$Grid1->CUMPL_REQ_FUNC->Visible=false;
	if($Grid1->CUMPL_REQ_FUNC->GetValue()==""){
		if($Grid1->DataSource->f("ReqFun")==""){
			$Grid1->lkCUMPL_REQ_FUNC->Visible = True;	
			$Grid1->imgCumpleCRF->Visible=false;
		} else {
			$Grid1->imgCumpleCRF->Visible=true;
			$Grid1->lkCUMPL_REQ_FUNC->Visible = False;	
			$Grid1->imgCumpleCRF->SetValue("images/NoAplica.png");
		}
	} else {
		$Grid1->lkCUMPL_REQ_FUNC->Visible = false;
		$Grid1->imgCumpleCRF->Visible=true;	
		if($Grid1->CUMPL_REQ_FUNC->GetValue()==1){
			$Grid1->imgCumpleCRF->SetValue("images/Cumple.png");
		} else {
			$Grid1->imgCumpleCRF->SetValue("images/NoCumple.png");
		}
	}
	
	//Calidad de Productos Terminados
	$Grid1->CALIDAD_PROD_TERM->Visible=false;
	if($Grid1->CALIDAD_PROD_TERM->GetValue()==""){
		if($Grid1->DataSource->f("Calidad")==""){
			$Grid1->lkCALIDAD_PROD_TERM->Visible = True;	
			$Grid1->imgCALIDAD_PROD_TERM->Visible=false;
		} else {
			$Grid1->imgCALIDAD_PROD_TERM->Visible=true;
			$Grid1->lkCALIDAD_PROD_TERM->Visible = False;	
			$Grid1->imgCALIDAD_PROD_TERM->SetValue("images/NoAplica.png");
		}
	} else {
		$Grid1->lkCALIDAD_PROD_TERM->Visible = false;
		$Grid1->imgCALIDAD_PROD_TERM->Visible=true;	
		if($Grid1->CALIDAD_PROD_TERM->GetValue()==1){
			$Grid1->imgCALIDAD_PROD_TERM->SetValue("images/Cumple.png");
		} else {
			$Grid1->imgCALIDAD_PROD_TERM->SetValue("images/NoCumple.png");
		}
	}
	
	//Retraso en Entregables
	$Grid1->RETR_ENTREGABLE->Visible=false;
	if($Grid1->RETR_ENTREGABLE->GetValue()==""){
		if($Grid1->DataSource->f("RetEnt")==""){
			$Grid1->lkCumpleHE->Visible = True;	
			$Grid1->imgCumpleHE->Visible=false;
		} else {
			$Grid1->imgCumpleHE->Visible=true;
			$Grid1->lkCumpleHE->Visible = False;	
			$Grid1->imgCumpleHE->SetValue("images/NoAplica.png");
		}
	} else {
		$Grid1->lkCumpleHE->Visible = false;
		$Grid1->imgCumpleHE->Visible=($Grid1->RETR_ENTREGABLE->GetValue()!="");	
		if($Grid1->RETR_ENTREGABLE->GetValue()==1){
			$Grid1->imgCumpleHE->SetValue("images/Cumple.png");
		} else {
			$Grid1->imgCumpleHE->SetValue("images/NoCumple.png");
		}
	}
	
	//Calidad de Codigo
	$Grid1->CAL_COD->Visible=false;
	if($Grid1->CAL_COD->GetValue()==""){
		if($Grid1->DataSource->f("ReqFun")==""){
			$Grid1->lkCAL_COD->Visible = True;	
			$Grid1->imgCumpleCC->Visible=false;
		} else {
			$Grid1->imgCumpleCCC->Visible=true;
			$Grid1->lkCAL_COD->Visible = False;	
			$Grid1->imgCumpleCC->SetValue("images/NoAplica.png");
		}
	} else {
		$Grid1->lkCAL_COD->Visible = false;
		$Grid1->imgCumpleCC->Visible=true;	
		if($Grid1->CAL_COD->GetValue()==1){
			$Grid1->imgCumpleCC->SetValue("images/Cumple.png");
		} else {
			$Grid1->imgCumpleCC->SetValue("images/NoCumple.png");
		}
	}	
	
	
	//Defectos Fugados
	$Grid1->DEF_FUG_AMB_PROD->Visible=false;
	if($Grid1->DEF_FUG_AMB_PROD->GetValue()==""){
		if($Grid1->DataSource->f("DefFug")==""){
			$Grid1->lkCumpleDF->Visible = True;	
			$Grid1->imgCumpleDF->Visible=false;
		} else {
			$Grid1->imgCumpleDF->Visible=true;
			$Grid1->imgDEF_FUG_AMB_PROD->Visible=true;
			$Grid1->lkCumpleDF->Visible = False;	
			$Grid1->imgCumpleDF->SetValue("images/NoAplica.png");
		}
	} else {
		$Grid1->lkCumpleDF->Visible = false;
		$Grid1->imgCumpleDF->Visible=true;	
		if($Grid1->DEF_FUG_AMB_PROD->GetValue()==1){
			$Grid1->imgCumpleDF->SetValue("images/Cumple.png");
		} else {
			$Grid1->imgCumpleDF->SetValue("images/NoCumple.png");
		}
	}
	//si tiene datos en el mes que fue trascicionado le pone la leyenda "Pendiente de Medicióon"
	if($Grid1->DataSource->f("MesTransicion")!="" && $Grid1->DataSource->f("MesTransicion") != CCGetParam("s_mesparam")){
		$Grid1->DEF_FUG_AMB_PROD->Visible=true;
		$Grid1->DEF_FUG_AMB_PROD->SetValue("Pendiente de Medición");
		$Grid1->imgCumpleDF->Visible= false;
		}

	if($Grid1->DataSource->f("EsReqTecnico")==1){
		$Grid1->EsReqTecnico->SetValue("MM-RT");
	} else {
		$Grid1->EsReqTecnico->SetValue("");
	}

	if($Grid1->DataSource->f("Revision")==1){
		$Grid1->lRevision->SetValue("2a. ");
	} else {
		$Grid1->lRevision->SetValue("");
	}

// -------------------------


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
//End Grid1_BeforeShow

//Custom Code @195-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

// -------------------------
    if(CCGetSession("GrupoValoracion")!="CAPC"){
		$Grid1->Sorter4->Visible=false;	
		$Grid1->analista->Visible=false;
	}
// -------------------------


//Close Grid1_BeforeShow @3-C0F58113
    return $Grid1_BeforeShow;
}
//End Close Grid1_BeforeShow

//Grid2_Button_DoSearch_OnClick @22-9FBAE5A5
function Grid2_Button_DoSearch_OnClick(& $sender)
{
    $Grid2_Button_DoSearch_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_Button_DoSearch_OnClick

//Custom Code @166-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

// -------------------------

// -------------------------


//Close Grid2_Button_DoSearch_OnClick @22-EA739416
    return $Grid2_Button_DoSearch_OnClick;
}
//End Close Grid2_Button_DoSearch_OnClick

//Grid2_s_anioparam_ds_BeforeBuildSelect @30-496DCB7F
function Grid2_s_anioparam_ds_BeforeBuildSelect(& $sender)
{
    $Grid2_s_anioparam_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_s_anioparam_ds_BeforeBuildSelect

//Custom Code @189-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

// -------------------------
    if(CCGetSession("GrupoValoracion","")=="CAPC"){
    	$Grid2->s_anioparam->DataSource->SQL="select * from mc_c_anio";
    	$Grid2->s_anioparam->DataSource->Where="";
    	}
// -------------------------


//Close Grid2_s_anioparam_ds_BeforeBuildSelect @30-C1C305EF
    return $Grid2_s_anioparam_ds_BeforeBuildSelect;
}
//End Close Grid2_s_anioparam_ds_BeforeBuildSelect

//Grid2_OnValidate @21-16E2EE76
function Grid2_OnValidate(& $sender)
{
    $Grid2_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_OnValidate

//Custom Code @167-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Grid2_OnValidate @21-836FC041
    return $Grid2_OnValidate;
}
//End Close Grid2_OnValidate

//Page_BeforeShow @1-8C73B40D
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsCrbLista; //Compatibility
//End Page_BeforeShow

//Custom Code @38-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

// -------------------------
    global $aPPMCsAPbIds;
    global $aPPMCsAPbValues;
  	
  	$aPPMCsAPbIds= array();
	$aPPMCsAPbValues = array();
	
	global $Grid2;
	$Grid2->Visible=(CCGetSession("GrupoValoracion")=="CAPC");
// -------------------------


//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeOutput @1-E58E910B
function Page_BeforeOutput(& $sender)
{
    $Page_BeforeOutput = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $PPMCsCrbLista; //Compatibility
//End Page_BeforeOutput

//Custom Code @39-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

// -------------------------
	global $aPPMCsAPbIds;
    global $aPPMCsAPbValues;
  	
	CCSetSession("aPPMCsAPbIds",serialize($aPPMCsAPbIds));
	CCSetSession("aPPMCsAPbValues",serialize($aPPMCsAPbValues));
// -------------------------


//Close Page_BeforeOutput @1-8964C188
    return $Page_BeforeOutput;
}
//End Close Page_BeforeOutput


?>
