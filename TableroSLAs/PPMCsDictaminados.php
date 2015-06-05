<?php
//Include Common Files @1-FDA4285A
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsDictaminados.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsGridgrdPPMCs { //grdPPMCs class @3-328D077F

//Variables @3-70EDC030

    // Public variables
    public $ComponentType = "Grid";
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $ErrorBlock;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $ForceIteration = false;
    public $HasRecord = false;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $RowNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";
    public $Attributes;

    // Grid Controls
    public $StaticControls;
    public $RowControls;
    public $Sorter_serv_negocio;
    public $Sorter_serv_cont;
    public $Sorter_Proveedor;
    public $Sorter_Tipo_PPMC;
    public $Sorter_id_ppmc;
    public $Sorter_descripci_n;
    public $Sorter_HERR_EST_COST;
    public $Sorter_REQ_SERV;
    public $Sorter_CUMPL_REQ_FUNC;
    public $Sorter_CALIDAD_PROD_TERM;
    public $Sorter_RETR_ENTREGABLE;
    public $Sorter_COMPL_RUTA_CRITICA;
    public $Sorter_EST_PROY;
    public $Sorter_DEF_FUG_AMB_PROD;
    public $Sorter_MesReporte;
    public $Sorter_AnioReporte;
    public $Sorter_ACSI;
    public $Sorter_descartar;
//End Variables

//Class_Initialize Event @3-5A9063F5
    function clsGridgrdPPMCs($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdPPMCs";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdPPMCs";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdPPMCsDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 25;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("grdPPMCsOrder", "");
        $this->SorterDirection = CCGetParam("grdPPMCsDir", "");

        $this->serv_negocio = new clsControl(ccsLabel, "serv_negocio", "serv_negocio", ccsText, "", CCGetRequestParam("serv_negocio", ccsGet, NULL), $this);
        $this->serv_cont = new clsControl(ccsLabel, "serv_cont", "serv_cont", ccsText, "", CCGetRequestParam("serv_cont", ccsGet, NULL), $this);
        $this->Proveedor = new clsControl(ccsLabel, "Proveedor", "Proveedor", ccsText, "", CCGetRequestParam("Proveedor", ccsGet, NULL), $this);
        $this->Tipo_PPMC = new clsControl(ccsLabel, "Tipo_PPMC", "Tipo_PPMC", ccsText, "", CCGetRequestParam("Tipo_PPMC", ccsGet, NULL), $this);
        $this->id_ppmc = new clsControl(ccsLink, "id_ppmc", "id_ppmc", ccsInteger, "", CCGetRequestParam("id_ppmc", ccsGet, NULL), $this);
        $this->id_ppmc->Page = "CalificaPPMCSAT.php";
        $this->descripci_n = new clsControl(ccsLabel, "descripci_n", "descripci_n", ccsText, "", CCGetRequestParam("descripci_n", ccsGet, NULL), $this);
        $this->HERR_EST_COST = new clsControl(ccsHidden, "HERR_EST_COST", "HERR_EST_COST", ccsText, "", CCGetRequestParam("HERR_EST_COST", ccsGet, NULL), $this);
        $this->REQ_SERV = new clsControl(ccsHidden, "REQ_SERV", "REQ_SERV", ccsText, "", CCGetRequestParam("REQ_SERV", ccsGet, NULL), $this);
        $this->CUMPL_REQ_FUNC = new clsControl(ccsHidden, "CUMPL_REQ_FUNC", "CUMPL_REQ_FUNC", ccsText, "", CCGetRequestParam("CUMPL_REQ_FUNC", ccsGet, NULL), $this);
        $this->CALIDAD_PROD_TERM = new clsControl(ccsHidden, "CALIDAD_PROD_TERM", "CALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("CALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->RETR_ENTREGABLE = new clsControl(ccsHidden, "RETR_ENTREGABLE", "RETR_ENTREGABLE", ccsText, "", CCGetRequestParam("RETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->COMPL_RUTA_CRITICA = new clsControl(ccsHidden, "COMPL_RUTA_CRITICA", "COMPL_RUTA_CRITICA", ccsText, "", CCGetRequestParam("COMPL_RUTA_CRITICA", ccsGet, NULL), $this);
        $this->EST_PROY = new clsControl(ccsHidden, "EST_PROY", "EST_PROY", ccsText, "", CCGetRequestParam("EST_PROY", ccsGet, NULL), $this);
        $this->DEF_FUG_AMB_PROD = new clsControl(ccsHidden, "DEF_FUG_AMB_PROD", "DEF_FUG_AMB_PROD", ccsText, "", CCGetRequestParam("DEF_FUG_AMB_PROD", ccsGet, NULL), $this);
        $this->MesReporte = new clsControl(ccsLabel, "MesReporte", "MesReporte", ccsText, "", CCGetRequestParam("MesReporte", ccsGet, NULL), $this);
        $this->AnioReporte = new clsControl(ccsLabel, "AnioReporte", "AnioReporte", ccsInteger, "", CCGetRequestParam("AnioReporte", ccsGet, NULL), $this);
        $this->ACSI = new clsControl(ccsLabel, "ACSI", "ACSI", ccsInteger, "", CCGetRequestParam("ACSI", ccsGet, NULL), $this);
        $this->descartar = new clsControl(ccsLabel, "descartar", "descartar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("descartar", ccsGet, NULL), $this);
        $this->ppmc_adicional = new clsControl(ccsLabel, "ppmc_adicional", "ppmc_adicional", ccsText, "", CCGetRequestParam("ppmc_adicional", ccsGet, NULL), $this);
        $this->Obs_manuales = new clsControl(ccsLabel, "Obs_manuales", "Obs_manuales", ccsText, "", CCGetRequestParam("Obs_manuales", ccsGet, NULL), $this);
        $this->ImgHERR_EST_COST = new clsControl(ccsImage, "ImgHERR_EST_COST", "ImgHERR_EST_COST", ccsText, "", CCGetRequestParam("ImgHERR_EST_COST", ccsGet, NULL), $this);
        $this->ImgREQ_SERV = new clsControl(ccsImage, "ImgREQ_SERV", "ImgREQ_SERV", ccsText, "", CCGetRequestParam("ImgREQ_SERV", ccsGet, NULL), $this);
        $this->ImgCUMPLREQFUNC = new clsControl(ccsImage, "ImgCUMPLREQFUNC", "ImgCUMPLREQFUNC", ccsText, "", CCGetRequestParam("ImgCUMPLREQFUNC", ccsGet, NULL), $this);
        $this->ImgCALIDADPRODTERM = new clsControl(ccsImage, "ImgCALIDADPRODTERM", "ImgCALIDADPRODTERM", ccsText, "", CCGetRequestParam("ImgCALIDADPRODTERM", ccsGet, NULL), $this);
        $this->ImgRETRENTREGABLE = new clsControl(ccsImage, "ImgRETRENTREGABLE", "ImgRETRENTREGABLE", ccsText, "", CCGetRequestParam("ImgRETRENTREGABLE", ccsGet, NULL), $this);
        $this->ImgCOMPLRUTACRITICA = new clsControl(ccsImage, "ImgCOMPLRUTACRITICA", "ImgCOMPLRUTACRITICA", ccsText, "", CCGetRequestParam("ImgCOMPLRUTACRITICA", ccsGet, NULL), $this);
        $this->ImgESTPROY = new clsControl(ccsImage, "ImgESTPROY", "ImgESTPROY", ccsText, "", CCGetRequestParam("ImgESTPROY", ccsGet, NULL), $this);
        $this->ImgDEFFUGAMBPROD = new clsControl(ccsImage, "ImgDEFFUGAMBPROD", "ImgDEFFUGAMBPROD", ccsText, "", CCGetRequestParam("ImgDEFFUGAMBPROD", ccsGet, NULL), $this);
        $this->Sorter_serv_negocio = new clsSorter($this->ComponentName, "Sorter_serv_negocio", $FileName, $this);
        $this->Sorter_serv_cont = new clsSorter($this->ComponentName, "Sorter_serv_cont", $FileName, $this);
        $this->Sorter_Proveedor = new clsSorter($this->ComponentName, "Sorter_Proveedor", $FileName, $this);
        $this->Sorter_Tipo_PPMC = new clsSorter($this->ComponentName, "Sorter_Tipo_PPMC", $FileName, $this);
        $this->Sorter_id_ppmc = new clsSorter($this->ComponentName, "Sorter_id_ppmc", $FileName, $this);
        $this->Sorter_descripci_n = new clsSorter($this->ComponentName, "Sorter_descripci_n", $FileName, $this);
        $this->Sorter_HERR_EST_COST = new clsSorter($this->ComponentName, "Sorter_HERR_EST_COST", $FileName, $this);
        $this->Sorter_REQ_SERV = new clsSorter($this->ComponentName, "Sorter_REQ_SERV", $FileName, $this);
        $this->Sorter_CUMPL_REQ_FUNC = new clsSorter($this->ComponentName, "Sorter_CUMPL_REQ_FUNC", $FileName, $this);
        $this->Sorter_CALIDAD_PROD_TERM = new clsSorter($this->ComponentName, "Sorter_CALIDAD_PROD_TERM", $FileName, $this);
        $this->Sorter_RETR_ENTREGABLE = new clsSorter($this->ComponentName, "Sorter_RETR_ENTREGABLE", $FileName, $this);
        $this->Sorter_COMPL_RUTA_CRITICA = new clsSorter($this->ComponentName, "Sorter_COMPL_RUTA_CRITICA", $FileName, $this);
        $this->Sorter_EST_PROY = new clsSorter($this->ComponentName, "Sorter_EST_PROY", $FileName, $this);
        $this->Sorter_DEF_FUG_AMB_PROD = new clsSorter($this->ComponentName, "Sorter_DEF_FUG_AMB_PROD", $FileName, $this);
        $this->Sorter_MesReporte = new clsSorter($this->ComponentName, "Sorter_MesReporte", $FileName, $this);
        $this->Sorter_AnioReporte = new clsSorter($this->ComponentName, "Sorter_AnioReporte", $FileName, $this);
        $this->Sorter_ACSI = new clsSorter($this->ComponentName, "Sorter_ACSI", $FileName, $this);
        $this->Sorter_descartar = new clsSorter($this->ComponentName, "Sorter_descartar", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @3-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @3-CD69126E
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_ppmc"] = CCGetFromGet("s_id_ppmc", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_id_servivio_cont"] = CCGetFromGet("s_id_servivio_cont", NULL);
        $this->DataSource->Parameters["urls_id_servicio_negocio"] = CCGetFromGet("s_id_servicio_negocio", NULL);
        $this->DataSource->Parameters["urls_id_tipo"] = CCGetFromGet("s_id_tipo", NULL);
        $this->DataSource->Parameters["urls_MesReporte"] = CCGetFromGet("s_MesReporte", NULL);
        $this->DataSource->Parameters["urls_AnioReporte"] = CCGetFromGet("s_AnioReporte", NULL);
        $this->DataSource->Parameters["urllstTipoPPMC"] = CCGetFromGet("lstTipoPPMC", NULL);
        $this->DataSource->Parameters["urllstServNeg"] = CCGetFromGet("lstServNeg", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["serv_negocio"] = $this->serv_negocio->Visible;
            $this->ControlsVisible["serv_cont"] = $this->serv_cont->Visible;
            $this->ControlsVisible["Proveedor"] = $this->Proveedor->Visible;
            $this->ControlsVisible["Tipo_PPMC"] = $this->Tipo_PPMC->Visible;
            $this->ControlsVisible["id_ppmc"] = $this->id_ppmc->Visible;
            $this->ControlsVisible["descripci_n"] = $this->descripci_n->Visible;
            $this->ControlsVisible["HERR_EST_COST"] = $this->HERR_EST_COST->Visible;
            $this->ControlsVisible["REQ_SERV"] = $this->REQ_SERV->Visible;
            $this->ControlsVisible["CUMPL_REQ_FUNC"] = $this->CUMPL_REQ_FUNC->Visible;
            $this->ControlsVisible["CALIDAD_PROD_TERM"] = $this->CALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["RETR_ENTREGABLE"] = $this->RETR_ENTREGABLE->Visible;
            $this->ControlsVisible["COMPL_RUTA_CRITICA"] = $this->COMPL_RUTA_CRITICA->Visible;
            $this->ControlsVisible["EST_PROY"] = $this->EST_PROY->Visible;
            $this->ControlsVisible["DEF_FUG_AMB_PROD"] = $this->DEF_FUG_AMB_PROD->Visible;
            $this->ControlsVisible["MesReporte"] = $this->MesReporte->Visible;
            $this->ControlsVisible["AnioReporte"] = $this->AnioReporte->Visible;
            $this->ControlsVisible["ACSI"] = $this->ACSI->Visible;
            $this->ControlsVisible["descartar"] = $this->descartar->Visible;
            $this->ControlsVisible["ppmc_adicional"] = $this->ppmc_adicional->Visible;
            $this->ControlsVisible["Obs_manuales"] = $this->Obs_manuales->Visible;
            $this->ControlsVisible["ImgHERR_EST_COST"] = $this->ImgHERR_EST_COST->Visible;
            $this->ControlsVisible["ImgREQ_SERV"] = $this->ImgREQ_SERV->Visible;
            $this->ControlsVisible["ImgCUMPLREQFUNC"] = $this->ImgCUMPLREQFUNC->Visible;
            $this->ControlsVisible["ImgCALIDADPRODTERM"] = $this->ImgCALIDADPRODTERM->Visible;
            $this->ControlsVisible["ImgRETRENTREGABLE"] = $this->ImgRETRENTREGABLE->Visible;
            $this->ControlsVisible["ImgCOMPLRUTACRITICA"] = $this->ImgCOMPLRUTACRITICA->Visible;
            $this->ControlsVisible["ImgESTPROY"] = $this->ImgESTPROY->Visible;
            $this->ControlsVisible["ImgDEFFUGAMBPROD"] = $this->ImgDEFFUGAMBPROD->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->serv_negocio->SetValue($this->DataSource->serv_negocio->GetValue());
                $this->serv_cont->SetValue($this->DataSource->serv_cont->GetValue());
                $this->Proveedor->SetValue($this->DataSource->Proveedor->GetValue());
                $this->Tipo_PPMC->SetValue($this->DataSource->Tipo_PPMC->GetValue());
                $this->id_ppmc->SetValue($this->DataSource->id_ppmc->GetValue());
                $this->id_ppmc->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->id_ppmc->Parameters = CCAddParam($this->id_ppmc->Parameters, "ID", $this->DataSource->f("ID"));
                $this->descripci_n->SetValue($this->DataSource->descripci_n->GetValue());
                $this->HERR_EST_COST->SetValue($this->DataSource->HERR_EST_COST->GetValue());
                $this->REQ_SERV->SetValue($this->DataSource->REQ_SERV->GetValue());
                $this->CUMPL_REQ_FUNC->SetValue($this->DataSource->CUMPL_REQ_FUNC->GetValue());
                $this->CALIDAD_PROD_TERM->SetValue($this->DataSource->CALIDAD_PROD_TERM->GetValue());
                $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
                $this->COMPL_RUTA_CRITICA->SetValue($this->DataSource->COMPL_RUTA_CRITICA->GetValue());
                $this->EST_PROY->SetValue($this->DataSource->EST_PROY->GetValue());
                $this->DEF_FUG_AMB_PROD->SetValue($this->DataSource->DEF_FUG_AMB_PROD->GetValue());
                $this->MesReporte->SetValue($this->DataSource->MesReporte->GetValue());
                $this->AnioReporte->SetValue($this->DataSource->AnioReporte->GetValue());
                $this->ACSI->SetValue($this->DataSource->ACSI->GetValue());
                $this->descartar->SetValue($this->DataSource->descartar->GetValue());
                $this->ppmc_adicional->SetValue($this->DataSource->ppmc_adicional->GetValue());
                $this->Obs_manuales->SetValue($this->DataSource->Obs_manuales->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->serv_negocio->Show();
                $this->serv_cont->Show();
                $this->Proveedor->Show();
                $this->Tipo_PPMC->Show();
                $this->id_ppmc->Show();
                $this->descripci_n->Show();
                $this->HERR_EST_COST->Show();
                $this->REQ_SERV->Show();
                $this->CUMPL_REQ_FUNC->Show();
                $this->CALIDAD_PROD_TERM->Show();
                $this->RETR_ENTREGABLE->Show();
                $this->COMPL_RUTA_CRITICA->Show();
                $this->EST_PROY->Show();
                $this->DEF_FUG_AMB_PROD->Show();
                $this->MesReporte->Show();
                $this->AnioReporte->Show();
                $this->ACSI->Show();
                $this->descartar->Show();
                $this->ppmc_adicional->Show();
                $this->Obs_manuales->Show();
                $this->ImgHERR_EST_COST->Show();
                $this->ImgREQ_SERV->Show();
                $this->ImgCUMPLREQFUNC->Show();
                $this->ImgCALIDADPRODTERM->Show();
                $this->ImgRETRENTREGABLE->Show();
                $this->ImgCOMPLRUTACRITICA->Show();
                $this->ImgESTPROY->Show();
                $this->ImgDEFFUGAMBPROD->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator->TotalPages <= 1 && $this->Navigator->PageNumber == 1) || $this->Navigator->PageSize == "") {
            $this->Navigator->Visible = false;
        }
        $this->Sorter_serv_negocio->Show();
        $this->Sorter_serv_cont->Show();
        $this->Sorter_Proveedor->Show();
        $this->Sorter_Tipo_PPMC->Show();
        $this->Sorter_id_ppmc->Show();
        $this->Sorter_descripci_n->Show();
        $this->Sorter_HERR_EST_COST->Show();
        $this->Sorter_REQ_SERV->Show();
        $this->Sorter_CUMPL_REQ_FUNC->Show();
        $this->Sorter_CALIDAD_PROD_TERM->Show();
        $this->Sorter_RETR_ENTREGABLE->Show();
        $this->Sorter_COMPL_RUTA_CRITICA->Show();
        $this->Sorter_EST_PROY->Show();
        $this->Sorter_DEF_FUG_AMB_PROD->Show();
        $this->Sorter_MesReporte->Show();
        $this->Sorter_AnioReporte->Show();
        $this->Sorter_ACSI->Show();
        $this->Sorter_descartar->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-1ED9F0C7
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->serv_negocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->serv_cont->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Proveedor->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Tipo_PPMC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_ppmc->Errors->ToString());
        $errors = ComposeStrings($errors, $this->descripci_n->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUMPL_REQ_FUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->COMPL_RUTA_CRITICA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EST_PROY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DEF_FUG_AMB_PROD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MesReporte->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AnioReporte->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ACSI->Errors->ToString());
        $errors = ComposeStrings($errors, $this->descartar->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ppmc_adicional->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Obs_manuales->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgHERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgREQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgCUMPLREQFUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgCALIDADPRODTERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgRETRENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgCOMPLRUTACRITICA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgESTPROY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgDEFFUGAMBPROD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdPPMCs Class @3-FCB6E20C

class clsgrdPPMCsDataSource extends clsDBcnDisenio {  //grdPPMCsDataSource Class @3-DE6CFD53

//DataSource Variables @3-F12F2BF1
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $serv_negocio;
    public $serv_cont;
    public $Proveedor;
    public $Tipo_PPMC;
    public $id_ppmc;
    public $descripci_n;
    public $HERR_EST_COST;
    public $REQ_SERV;
    public $CUMPL_REQ_FUNC;
    public $CALIDAD_PROD_TERM;
    public $RETR_ENTREGABLE;
    public $COMPL_RUTA_CRITICA;
    public $EST_PROY;
    public $DEF_FUG_AMB_PROD;
    public $MesReporte;
    public $AnioReporte;
    public $ACSI;
    public $descartar;
    public $ppmc_adicional;
    public $Obs_manuales;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-71E024D5
    function clsgrdPPMCsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdPPMCs";
        $this->Initialize();
        $this->serv_negocio = new clsField("serv_negocio", ccsText, "");
        
        $this->serv_cont = new clsField("serv_cont", ccsText, "");
        
        $this->Proveedor = new clsField("Proveedor", ccsText, "");
        
        $this->Tipo_PPMC = new clsField("Tipo_PPMC", ccsText, "");
        
        $this->id_ppmc = new clsField("id_ppmc", ccsInteger, "");
        
        $this->descripci_n = new clsField("descripci_n", ccsText, "");
        
        $this->HERR_EST_COST = new clsField("HERR_EST_COST", ccsText, "");
        
        $this->REQ_SERV = new clsField("REQ_SERV", ccsText, "");
        
        $this->CUMPL_REQ_FUNC = new clsField("CUMPL_REQ_FUNC", ccsText, "");
        
        $this->CALIDAD_PROD_TERM = new clsField("CALIDAD_PROD_TERM", ccsText, "");
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsText, "");
        
        $this->COMPL_RUTA_CRITICA = new clsField("COMPL_RUTA_CRITICA", ccsText, "");
        
        $this->EST_PROY = new clsField("EST_PROY", ccsText, "");
        
        $this->DEF_FUG_AMB_PROD = new clsField("DEF_FUG_AMB_PROD", ccsText, "");
        
        $this->MesReporte = new clsField("MesReporte", ccsText, "");
        
        $this->AnioReporte = new clsField("AnioReporte", ccsInteger, "");
        
        $this->ACSI = new clsField("ACSI", ccsInteger, "");
        
        $this->descartar = new clsField("descartar", ccsBoolean, $this->BooleanFormat);
        
        $this->ppmc_adicional = new clsField("ppmc_adicional", ccsText, "");
        
        $this->Obs_manuales = new clsField("Obs_manuales", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-7C963C91
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_serv_negocio" => array("serv_negocio", ""), 
            "Sorter_serv_cont" => array("serv_cont", ""), 
            "Sorter_Proveedor" => array("Proveedor", ""), 
            "Sorter_Tipo_PPMC" => array("Tipo_PPMC", ""), 
            "Sorter_id_ppmc" => array("id_ppmc", ""), 
            "Sorter_descripci_n" => array("descripción", ""), 
            "Sorter_HERR_EST_COST" => array("HERR_EST_COST", ""), 
            "Sorter_REQ_SERV" => array("REQ_SERV", ""), 
            "Sorter_CUMPL_REQ_FUNC" => array("CUMPL_REQ_FUNC", ""), 
            "Sorter_CALIDAD_PROD_TERM" => array("CALIDAD_PROD_TERM", ""), 
            "Sorter_RETR_ENTREGABLE" => array("RETR_ENTREGABLE", ""), 
            "Sorter_COMPL_RUTA_CRITICA" => array("COMPL_RUTA_CRITICA", ""), 
            "Sorter_EST_PROY" => array("EST_PROY", ""), 
            "Sorter_DEF_FUG_AMB_PROD" => array("DEF_FUG_AMB_PROD", ""), 
            "Sorter_MesReporte" => array("MesReporte", ""), 
            "Sorter_AnioReporte" => array("AnioReporte", ""), 
            "Sorter_ACSI" => array("ACSI", ""), 
            "Sorter_descartar" => array("descartar", "")));
    }
//End SetOrder Method

//Prepare Method @3-03C7FBE1
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_ppmc", ccsInteger, "", "", $this->Parameters["urls_id_ppmc"], 0, false);
        $this->wp->AddParameter("2", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("3", "urls_id_servivio_cont", ccsInteger, "", "", $this->Parameters["urls_id_servivio_cont"], 0, false);
        $this->wp->AddParameter("4", "urls_id_servicio_negocio", ccsInteger, "", "", $this->Parameters["urls_id_servicio_negocio"], 0, false);
        $this->wp->AddParameter("5", "urls_id_tipo", ccsInteger, "", "", $this->Parameters["urls_id_tipo"], 0, false);
        $this->wp->AddParameter("6", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], 0, false);
        $this->wp->AddParameter("7", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], 0, false);
        $this->wp->AddParameter("8", "urllstTipoPPMC", ccsInteger, "", "", $this->Parameters["urllstTipoPPMC"], 0, false);
        $this->wp->AddParameter("9", "urllstServNeg", ccsInteger, "", "", $this->Parameters["urllstServNeg"], 0, false);
    }
//End Prepare Method

//Open Method @3-437F53B6
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select  sn.nombre serv_negocio\n" .
        "	, sc.nombre serv_cont\n" .
        "	, p.nombre Proveedor\n" .
        "	, g.nombre  Tipo_PPMC\n" .
        "	, c_mes.Mes \n" .
        "	, r.* \n" .
        "from calificacion_rs_SAT r\n" .
        "	inner join c_proveedor p on p.id_proveedor = r.id_proveedor \n" .
        "	inner join c_mes on c_mes.idmes = r.mesreporte\n" .
        "	left join c_servicio sn on sn.id_servicio = r.id_servicio_negocio \n" .
        "	left join c_servicio sc on sc.id_servicio = r.id_servivio_cont\n" .
        "	left join c_generico  g on r.id_tipo  = g.id_generico  and id_catalogo =17\n" .
        "where (r.id_ppmc = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "and (r.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ")\n" .
        "and (" . $this->SQLValue($this->wp->GetDBValue("6"), ccsInteger) . " = r.mesreporte or 0=" . $this->SQLValue($this->wp->GetDBValue("6"), ccsInteger) . " )\n" .
        "and (anioreporte =" . $this->SQLValue($this->wp->GetDBValue("7"), ccsInteger) . "  or " . $this->SQLValue($this->wp->GetDBValue("7"), ccsInteger) . "=0)\n" .
        "and (r.id_tipo=" . $this->SQLValue($this->wp->GetDBValue("8"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("8"), ccsInteger) . ")\n" .
        "and (r.id_servicio_negocio=" . $this->SQLValue($this->wp->GetDBValue("9"), ccsInteger) . " or 0= " . $this->SQLValue($this->wp->GetDBValue("9"), ccsInteger) . ")) cnt";
        $this->SQL = "select  sn.nombre serv_negocio\n" .
        "	, sc.nombre serv_cont\n" .
        "	, p.nombre Proveedor\n" .
        "	, g.nombre  Tipo_PPMC\n" .
        "	, c_mes.Mes \n" .
        "	, r.* \n" .
        "from calificacion_rs_SAT r\n" .
        "	inner join c_proveedor p on p.id_proveedor = r.id_proveedor \n" .
        "	inner join c_mes on c_mes.idmes = r.mesreporte\n" .
        "	left join c_servicio sn on sn.id_servicio = r.id_servicio_negocio \n" .
        "	left join c_servicio sc on sc.id_servicio = r.id_servivio_cont\n" .
        "	left join c_generico  g on r.id_tipo  = g.id_generico  and id_catalogo =17\n" .
        "where (r.id_ppmc = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "and (r.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ")\n" .
        "and (" . $this->SQLValue($this->wp->GetDBValue("6"), ccsInteger) . " = r.mesreporte or 0=" . $this->SQLValue($this->wp->GetDBValue("6"), ccsInteger) . " )\n" .
        "and (anioreporte =" . $this->SQLValue($this->wp->GetDBValue("7"), ccsInteger) . "  or " . $this->SQLValue($this->wp->GetDBValue("7"), ccsInteger) . "=0)\n" .
        "and (r.id_tipo=" . $this->SQLValue($this->wp->GetDBValue("8"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("8"), ccsInteger) . ")\n" .
        "and (r.id_servicio_negocio=" . $this->SQLValue($this->wp->GetDBValue("9"), ccsInteger) . " or 0= " . $this->SQLValue($this->wp->GetDBValue("9"), ccsInteger) . ")";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
        $this->MoveToPage($this->AbsolutePage);
    }
//End Open Method

//SetValues Method @3-F68A5DB5
    function SetValues()
    {
        $this->serv_negocio->SetDBValue($this->f("serv_negocio"));
        $this->serv_cont->SetDBValue($this->f("serv_cont"));
        $this->Proveedor->SetDBValue($this->f("Proveedor"));
        $this->Tipo_PPMC->SetDBValue($this->f("Tipo_PPMC"));
        $this->id_ppmc->SetDBValue(trim($this->f("id_ppmc")));
        $this->descripci_n->SetDBValue($this->f("descripción"));
        $this->HERR_EST_COST->SetDBValue($this->f("HERR_EST_COST"));
        $this->REQ_SERV->SetDBValue($this->f("REQ_SERV"));
        $this->CUMPL_REQ_FUNC->SetDBValue($this->f("CUMPL_REQ_FUNC"));
        $this->CALIDAD_PROD_TERM->SetDBValue($this->f("CALIDAD_PROD_TERM"));
        $this->RETR_ENTREGABLE->SetDBValue($this->f("RETR_ENTREGABLE"));
        $this->COMPL_RUTA_CRITICA->SetDBValue($this->f("COMPL_RUTA_CRITICA"));
        $this->EST_PROY->SetDBValue($this->f("EST_PROY"));
        $this->DEF_FUG_AMB_PROD->SetDBValue($this->f("DEF_FUG_AMB_PROD"));
        $this->MesReporte->SetDBValue($this->f("Mes"));
        $this->AnioReporte->SetDBValue(trim($this->f("AnioReporte")));
        $this->ACSI->SetDBValue(trim($this->f("ACSI")));
        $this->descartar->SetDBValue(trim($this->f("descartar")));
        $this->ppmc_adicional->SetDBValue($this->f("ppmc_adicional"));
        $this->Obs_manuales->SetDBValue($this->f("Obs_manuales"));
    }
//End SetValues Method

} //End grdPPMCsDataSource Class @3-FCB6E20C

class clsRecordGrid2 { //Grid2 Class @56-542C3E47

//Variables @56-9E315808

    // Public variables
    public $ComponentType = "Record";
    public $ComponentName;
    public $Parent;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormEnctype;
    public $Visible;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode      = false;
    public $ds;
    public $DataSource;
    public $ValidatingControls;
    public $Controls;
    public $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @56-4774F80E
    function clsRecordGrid2($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Grid2/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "Grid2";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_id_ppmc = new clsControl(ccsTextBox, "s_id_ppmc", "s_id_ppmc", ccsInteger, "", CCGetRequestParam("s_id_ppmc", $Method, NULL), $this);
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "s_id_proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsTable;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            $this->s_id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_MesReporte = new clsControl(ccsListBox, "s_MesReporte", "s_MesReporte", ccsInteger, "", CCGetRequestParam("s_MesReporte", $Method, NULL), $this);
            $this->s_MesReporte->DSType = dsTable;
            $this->s_MesReporte->DataSource = new clsDBcnDisenio();
            $this->s_MesReporte->ds = & $this->s_MesReporte->DataSource;
            $this->s_MesReporte->DataSource->SQL = "SELECT * \n" .
"FROM c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_MesReporte->BoundColumn, $this->s_MesReporte->TextColumn, $this->s_MesReporte->DBFormat) = array("IdMes", "Mes", "");
            $this->s_AnioReporte = new clsControl(ccsListBox, "s_AnioReporte", "s_AnioReporte", ccsInteger, "", CCGetRequestParam("s_AnioReporte", $Method, NULL), $this);
            $this->s_AnioReporte->DSType = dsTable;
            $this->s_AnioReporte->DataSource = new clsDBcnDisenio();
            $this->s_AnioReporte->ds = & $this->s_AnioReporte->DataSource;
            $this->s_AnioReporte->DataSource->SQL = "SELECT * \n" .
"FROM C_Ano {SQL_Where} {SQL_OrderBy}";
            list($this->s_AnioReporte->BoundColumn, $this->s_AnioReporte->TextColumn, $this->s_AnioReporte->DBFormat) = array("Ano", "Ano", "");
            $this->lstTipoPPMC = new clsControl(ccsListBox, "lstTipoPPMC", "lstTipoPPMC", ccsText, "", CCGetRequestParam("lstTipoPPMC", $Method, NULL), $this);
            $this->lstTipoPPMC->DSType = dsSQL;
            $this->lstTipoPPMC->DataSource = new clsDBcnDisenio();
            $this->lstTipoPPMC->ds = & $this->lstTipoPPMC->DataSource;
            list($this->lstTipoPPMC->BoundColumn, $this->lstTipoPPMC->TextColumn, $this->lstTipoPPMC->DBFormat) = array("id_tipo", "TipoPPMC", "");
            $this->lstTipoPPMC->DataSource->SQL = "select  mc.id_tipo, g.nombre TipoPPMC\n" .
            "from calificacion_rs_SAT  mc\n" .
            "inner join c_generico g on g.id_generico = mc.id_tipo  and g.id_catalogo = 17 \n" .
            "group by mc.id_tipo, g.nombre \n" .
            "";
            $this->lstTipoPPMC->DataSource->Order = "";
            $this->lstServNeg = new clsControl(ccsListBox, "lstServNeg", "lstServNeg", ccsText, "", CCGetRequestParam("lstServNeg", $Method, NULL), $this);
            $this->lstServNeg->DSType = dsSQL;
            $this->lstServNeg->DataSource = new clsDBcnDisenio();
            $this->lstServNeg->ds = & $this->lstServNeg->DataSource;
            list($this->lstServNeg->BoundColumn, $this->lstServNeg->TextColumn, $this->lstServNeg->DBFormat) = array("id_servicio_negocio", "ServNeg", "");
            $this->lstServNeg->DataSource->SQL = "\n" .
            "select  distinct  mc.id_servicio_negocio, sn.nombre ServNeg\n" .
            "from calificacion_rs_SAT  mc\n" .
            "inner join c_servicio sn on sn.id_servicio = mc.id_servicio_negocio \n" .
            "";
            $this->lstServNeg->DataSource->Order = "";
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_MesReporte->Value) && !strlen($this->s_MesReporte->Value) && $this->s_MesReporte->Value !== false)
                    $this->s_MesReporte->SetText(date("m", strtotime("-2 months")));
                if(!is_array($this->s_AnioReporte->Value) && !strlen($this->s_AnioReporte->Value) && $this->s_AnioReporte->Value !== false)
                    $this->s_AnioReporte->SetText(date("Y"));
            }
        }
    }
//End Class_Initialize Event

//Validate Method @56-1662768E
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_ppmc->Validate() && $Validation);
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_MesReporte->Validate() && $Validation);
        $Validation = ($this->s_AnioReporte->Validate() && $Validation);
        $Validation = ($this->lstTipoPPMC->Validate() && $Validation);
        $Validation = ($this->lstServNeg->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_ppmc->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_AnioReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->lstTipoPPMC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->lstServNeg->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @56-461A7AFF
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_ppmc->Errors->Count());
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_MesReporte->Errors->Count());
        $errors = ($errors || $this->s_AnioReporte->Errors->Count());
        $errors = ($errors || $this->lstTipoPPMC->Errors->Count());
        $errors = ($errors || $this->lstServNeg->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @56-0F34E0D1
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "PPMCsDictaminados.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "PPMCsDictaminados.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @56-2C429680
    function Show()
    {
        global $CCSUseAmp;
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->s_id_proveedor->Prepare();
        $this->s_MesReporte->Prepare();
        $this->s_AnioReporte->Prepare();
        $this->lstTipoPPMC->Prepare();
        $this->lstServNeg->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_ppmc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_AnioReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lstTipoPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lstServNeg->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_DoSearch->Show();
        $this->s_id_ppmc->Show();
        $this->s_id_proveedor->Show();
        $this->s_MesReporte->Show();
        $this->s_AnioReporte->Show();
        $this->lstTipoPPMC->Show();
        $this->lstServNeg->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End Grid2 Class @56-FCB6E20C

//Initialize Page @1-88CF609C
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";
$TemplateSource = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "PPMCsDictaminados.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-D5F39CEF
CCSecurityRedirect("", "Login.php");
//End Authenticate User

//Include events file @1-8C3767C1
include_once("./PPMCsDictaminados_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-962EF6E3
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$grdPPMCs = new clsGridgrdPPMCs("", $MainPage);
$Grid2 = new clsRecordGrid2("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->grdPPMCs = & $grdPPMCs;
$MainPage->Grid2 = & $Grid2;
$grdPPMCs->Initialize();
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

BindEvents();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-FA3E6D4A
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
if (strlen($TemplateSource)) {
    $Tpl->LoadTemplateFromStr($TemplateSource, $BlockToParse, "CP1252");
} else {
    $Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
}
$Tpl->SetVar("CCS_PathToRoot", $PathToRoot);
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-2D26F3CC
$Grid2->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-037EFB91
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($grdPPMCs);
    unset($Grid2);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-D1D3D1E5
$Header->Show();
$grdPPMCs->Show();
$Grid2->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-8A3E05B1
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($grdPPMCs);
unset($Grid2);
unset($Tpl);
//End Unload Page


?>
