<?php
//BindEvents Method @1-19688080
function BindEvents()
{
    global $grdPPMCs;
    $grdPPMCs->CCSEvents["BeforeShowRow"] = "grdPPMCs_BeforeShowRow";
}
//End BindEvents Method

//grdPPMCs_BeforeShowRow @3-84E3D3DC
function grdPPMCs_BeforeShowRow(& $sender)
{
    $grdPPMCs_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $grdPPMCs; //Compatibility
//End grdPPMCs_BeforeShowRow

//Set Row Style @29-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @88-2A29BDB7
// -------------------------
	
	switch($grdPPMCs->HERR_EST_COST->GetValue()){
		case "1":
			$grdPPMCs->ImgHERR_EST_COST->SetValue("images/Cumple.png");  
			$grdPPMCs->ImgHERR_EST_COST->Visible  =true;
			break;
		case "0":
			$grdPPMCs->ImgHERR_EST_COST->SetValue("images/NoCumple.png");  
			$grdPPMCs->ImgHERR_EST_COST->Visible  =true;
			break;
		default:
			$grdPPMCs->ImgHERR_EST_COST->Visible  =false;
	}	

	switch($grdPPMCs->REQ_SERV->GetValue()){
		case "1":
			$grdPPMCs->ImgREQ_SERV->SetValue("images/Cumple.png");  
			$grdPPMCs->ImgREQ_SERV->Visible  =true;
			break;
		case "0":
			$grdPPMCs->ImgREQ_SERV->SetValue("images/NoCumple.png");  
			$grdPPMCs->ImgREQ_SERV->Visible  =true;
			break;
		default:
			$grdPPMCs->ImgREQ_SERV->Visible  =false;
	}

	switch($grdPPMCs->CUMPL_REQ_FUNC->GetValue()){
		case "1":
			$grdPPMCs->ImgCUMPLREQFUNC->SetValue("images/Cumple.png");  
			$grdPPMCs->ImgCUMPLREQFUNC->Visible  =true;
			break;
		case "0":
			$grdPPMCs->ImgCUMPLREQFUNC->SetValue("images/NoCumple.png");  
			$grdPPMCs->ImgCUMPLREQFUNC->Visible  =true;
			break;
		default:
			$grdPPMCs->ImgCUMPLREQFUNC->Visible  =false;
	}
	
	switch($grdPPMCs->CALIDAD_PROD_TERM->GetValue()){
		case "1":
			$grdPPMCs->ImgCALIDADPRODTERM->SetValue("images/Cumple.png");  
			$grdPPMCs->ImgCALIDADPRODTERM->Visible  =true;
			break;
		case "0":
			$grdPPMCs->ImgCALIDADPRODTERM->SetValue("images/NoCumple.png");  
			$grdPPMCs->ImgCALIDADPRODTERM->Visible  =true;
			break;
		default:
			$grdPPMCs->ImgCALIDADPRODTERM->Visible  =false;
	}

	switch($grdPPMCs->RETR_ENTREGABLE->GetValue()){
		case "1":
			$grdPPMCs->ImgRETRENTREGABLE->SetValue("images/Cumple.png");  
			$grdPPMCs->ImgRETRENTREGABLE->Visible  =true;
			break;
		case "0":
			$grdPPMCs->ImgRETRENTREGABLE->SetValue("images/NoCumple.png");  
			$grdPPMCs->ImgRETRENTREGABLE->Visible  =true;
			break;
		default:
			$grdPPMCs->ImgRETRENTREGABLE->Visible  =false;
	}
	switch($grdPPMCs->COMPL_RUTA_CRITICA->GetValue()){
		case "1":
			$grdPPMCs->ImgCOMPLRUTACRITICA->SetValue("images/Cumple.png");  
			$grdPPMCs->ImgCOMPLRUTACRITICA->Visible  =true;
			break;
		case "0":
			$grdPPMCs->ImgCOMPLRUTACRITICA->SetValue("images/NoCumple.png");  
			$grdPPMCs->ImgCOMPLRUTACRITICA->Visible  =true;
			break;
		default:
			$grdPPMCs->ImgCOMPLRUTACRITICA->Visible  =false;
	}

	switch($grdPPMCs->EST_PROY->GetValue()){
		case "1":
			$grdPPMCs->ImgESTPROY->SetValue("images/Cumple.png");  
			$grdPPMCs->ImgESTPROY->Visible  =true;
			break;
		case "0":
			$grdPPMCs->ImgESTPROY->SetValue("images/NoCumple.png");  
			$grdPPMCs->ImgESTPROY->Visible  =true;
			break;
		default:
			$grdPPMCs->ImgESTPROY->Visible  =false;
	}

	switch($grdPPMCs->DEF_FUG_AMB_PROD->GetValue()){
		case "1":
			$grdPPMCs->ImgDEFFUGAMBPROD->SetValue("images/Cumple.png");  
			$grdPPMCs->ImgDEFFUGAMBPROD->Visible  =true;
			break;
		case "0":
			$grdPPMCs->ImgDEFFUGAMBPROD->SetValue("images/NoCumple.png");  
			$grdPPMCs->ImgDEFFUGAMBPROD->Visible  =true;
			break;
		default:
			$grdPPMCs->ImgDEFFUGAMBPROD->Visible  =false;
	}
// -------------------------
//End Custom Code

//Close grdPPMCs_BeforeShowRow @3-04C3B028
    return $grdPPMCs_BeforeShowRow;
}
//End Close grdPPMCs_BeforeShowRow
?>
