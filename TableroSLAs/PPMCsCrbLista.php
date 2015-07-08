<?php
//Include Common Files @1-F6BE7722
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsCrbLista.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsGridGrid1 { //Grid1 class @3-E857A572

//Variables @3-A7991B86

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
    public $Sorter_ID_PPMC;
    public $Sorter_SERVICIO_NEGOCIO;
    public $Sorter_nombre;
    public $Sorter1;
    public $Sorter2;
    public $Sorter3;
    public $Sorter4;
//End Variables

//Class_Initialize Event @3-C1C93FEF
    function clsGridGrid1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Grid1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid Grid1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsGrid1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("Grid1Order", "");
        $this->SorterDirection = CCGetParam("Grid1Dir", "");

        $this->ID_PPMC = new clsControl(ccsLink, "ID_PPMC", "ID_PPMC", ccsInteger, array(True, 0, Null, "", False, array("#", "#", "#", "#"), "", 1, True, ""), CCGetRequestParam("ID_PPMC", ccsGet, NULL), $this);
        $this->ID_PPMC->Page = "PPMCsCrInfoGeneral.php";
        $this->NAME = new clsControl(ccsLabel, "NAME", "NAME", ccsMemo, "", CCGetRequestParam("NAME", ccsGet, NULL), $this);
        $this->SERVICIO_NEGOCIO = new clsControl(ccsLabel, "SERVICIO_NEGOCIO", "SERVICIO_NEGOCIO", ccsText, "", CCGetRequestParam("SERVICIO_NEGOCIO", ccsGet, NULL), $this);
        $this->TIPO_REQUERIMIENTO = new clsControl(ccsLabel, "TIPO_REQUERIMIENTO", "TIPO_REQUERIMIENTO", ccsMemo, "", CCGetRequestParam("TIPO_REQUERIMIENTO", ccsGet, NULL), $this);
        $this->nombre = new clsControl(ccsLabel, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->IdEstimacion = new clsControl(ccsLabel, "IdEstimacion", "IdEstimacion", ccsText, "", CCGetRequestParam("IdEstimacion", ccsGet, NULL), $this);
        $this->imgCumpleHE = new clsControl(ccsImageLink, "imgCumpleHE", "imgCumpleHE", ccsText, "", CCGetRequestParam("imgCumpleHE", ccsGet, NULL), $this);
        $this->imgCumpleHE->Page = "PPMCsCrbDetalle.php";
        $this->RETR_ENTREGABLE = new clsControl(ccsLabel, "RETR_ENTREGABLE", "RETR_ENTREGABLE", ccsText, "", CCGetRequestParam("RETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->FechaFirmaCAES = new clsControl(ccsLabel, "FechaFirmaCAES", "FechaFirmaCAES", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("FechaFirmaCAES", ccsGet, NULL), $this);
        $this->CAL_COD = new clsControl(ccsLabel, "CAL_COD", "CAL_COD", ccsText, "", CCGetRequestParam("CAL_COD", ccsGet, NULL), $this);
        $this->imgCumpleCC = new clsControl(ccsImageLink, "imgCumpleCC", "imgCumpleCC", ccsText, "", CCGetRequestParam("imgCumpleCC", ccsGet, NULL), $this);
        $this->imgCumpleCC->Page = "PPMCsCrCalCodDetalle.php";
        $this->lkCumpleCC = new clsControl(ccsLink, "lkCumpleCC", "lkCumpleCC", ccsText, "", CCGetRequestParam("lkCumpleCC", ccsGet, NULL), $this);
        $this->lkCumpleCC->Page = "PPMCsCrCalCodDetalle.php";
        $this->CUMPL_REQ_FUNC = new clsControl(ccsLabel, "CUMPL_REQ_FUNC", "CUMPL_REQ_FUNC", ccsText, "", CCGetRequestParam("CUMPL_REQ_FUNC", ccsGet, NULL), $this);
        $this->imgCumpleCRF = new clsControl(ccsImageLink, "imgCumpleCRF", "imgCumpleCRF", ccsText, "", CCGetRequestParam("imgCumpleCRF", ccsGet, NULL), $this);
        $this->imgCumpleCRF->Page = "PPMCsCumpReqFunDetalle.php";
        $this->DEF_FUG_AMB_PROD = new clsControl(ccsLabel, "DEF_FUG_AMB_PROD", "DEF_FUG_AMB_PROD", ccsText, "", CCGetRequestParam("DEF_FUG_AMB_PROD", ccsGet, NULL), $this);
        $this->lkCumpleDF = new clsControl(ccsLink, "lkCumpleDF", "lkCumpleDF", ccsText, "", CCGetRequestParam("lkCumpleDF", ccsGet, NULL), $this);
        $this->lkCumpleDF->Page = "PPMCsDefFugDetalle.php";
        $this->lkCALIDAD_PROD_TERM = new clsControl(ccsLink, "lkCALIDAD_PROD_TERM", "lkCALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("lkCALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->lkCALIDAD_PROD_TERM->Page = "PPMCsCrbCalidad.php";
        $this->lkCUMPL_REQ_FUNC = new clsControl(ccsLink, "lkCUMPL_REQ_FUNC", "lkCUMPL_REQ_FUNC", ccsText, "", CCGetRequestParam("lkCUMPL_REQ_FUNC", ccsGet, NULL), $this);
        $this->lkCUMPL_REQ_FUNC->Page = "PPMCsCumpReqFunDetalle.php";
        $this->analista = new clsControl(ccsLabel, "analista", "analista", ccsText, "", CCGetRequestParam("analista", ccsGet, NULL), $this);
        $this->imgCumpleDF = new clsControl(ccsImageLink, "imgCumpleDF", "imgCumpleDF", ccsText, "", CCGetRequestParam("imgCumpleDF", ccsGet, NULL), $this);
        $this->imgCumpleDF->Page = "PPMCsDefFugDetalle.php";
        $this->CALIDAD_PROD_TERM = new clsControl(ccsLabel, "CALIDAD_PROD_TERM", "CALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("CALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->imgCALIDAD_PROD_TERM = new clsControl(ccsImageLink, "imgCALIDAD_PROD_TERM", "imgCALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("imgCALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->imgCALIDAD_PROD_TERM->Page = "PPMCsCrbCalidad.php";
        $this->lkCumpleHE = new clsControl(ccsLink, "lkCumpleHE", "lkCumpleHE", ccsText, "", CCGetRequestParam("lkCumpleHE", ccsGet, NULL), $this);
        $this->lkCumpleHE->Page = "PPMCsCrbDetalle.php";
        $this->EsReqTecnico = new clsControl(ccsLink, "EsReqTecnico", "EsReqTecnico", ccsText, "", CCGetRequestParam("EsReqTecnico", ccsGet, NULL), $this);
        $this->EsReqTecnico->Page = "ReqTecList.php";
        $this->lRevision = new clsControl(ccsLabel, "lRevision", "lRevision", ccsText, "", CCGetRequestParam("lRevision", ccsGet, NULL), $this);
        $this->Sorter_ID_PPMC = new clsSorter($this->ComponentName, "Sorter_ID_PPMC", $FileName, $this);
        $this->Sorter_SERVICIO_NEGOCIO = new clsSorter($this->ComponentName, "Sorter_SERVICIO_NEGOCIO", $FileName, $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
        $this->Sorter2 = new clsSorter($this->ComponentName, "Sorter2", $FileName, $this);
        $this->Sorter3 = new clsSorter($this->ComponentName, "Sorter3", $FileName, $this);
        $this->Sorter4 = new clsSorter($this->ComponentName, "Sorter4", $FileName, $this);
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

//Show Method @3-3C6E73EA
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_mesparam"] = CCGetFromGet("s_mesparam", NULL);
        $this->DataSource->Parameters["urls_anioparam"] = CCGetFromGet("s_anioparam", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urlsAnalista"] = CCGetFromGet("sAnalista", NULL);
        $this->DataSource->Parameters["urls_numero"] = CCGetFromGet("s_numero", NULL);
        $this->DataSource->Parameters["urlsSLO"] = CCGetFromGet("sSLO", NULL);

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
            $this->ControlsVisible["ID_PPMC"] = $this->ID_PPMC->Visible;
            $this->ControlsVisible["NAME"] = $this->NAME->Visible;
            $this->ControlsVisible["SERVICIO_NEGOCIO"] = $this->SERVICIO_NEGOCIO->Visible;
            $this->ControlsVisible["TIPO_REQUERIMIENTO"] = $this->TIPO_REQUERIMIENTO->Visible;
            $this->ControlsVisible["nombre"] = $this->nombre->Visible;
            $this->ControlsVisible["IdEstimacion"] = $this->IdEstimacion->Visible;
            $this->ControlsVisible["imgCumpleHE"] = $this->imgCumpleHE->Visible;
            $this->ControlsVisible["RETR_ENTREGABLE"] = $this->RETR_ENTREGABLE->Visible;
            $this->ControlsVisible["FechaFirmaCAES"] = $this->FechaFirmaCAES->Visible;
            $this->ControlsVisible["CAL_COD"] = $this->CAL_COD->Visible;
            $this->ControlsVisible["imgCumpleCC"] = $this->imgCumpleCC->Visible;
            $this->ControlsVisible["lkCumpleCC"] = $this->lkCumpleCC->Visible;
            $this->ControlsVisible["CUMPL_REQ_FUNC"] = $this->CUMPL_REQ_FUNC->Visible;
            $this->ControlsVisible["imgCumpleCRF"] = $this->imgCumpleCRF->Visible;
            $this->ControlsVisible["DEF_FUG_AMB_PROD"] = $this->DEF_FUG_AMB_PROD->Visible;
            $this->ControlsVisible["lkCumpleDF"] = $this->lkCumpleDF->Visible;
            $this->ControlsVisible["lkCALIDAD_PROD_TERM"] = $this->lkCALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["lkCUMPL_REQ_FUNC"] = $this->lkCUMPL_REQ_FUNC->Visible;
            $this->ControlsVisible["analista"] = $this->analista->Visible;
            $this->ControlsVisible["imgCumpleDF"] = $this->imgCumpleDF->Visible;
            $this->ControlsVisible["CALIDAD_PROD_TERM"] = $this->CALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["imgCALIDAD_PROD_TERM"] = $this->imgCALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["lkCumpleHE"] = $this->lkCumpleHE->Visible;
            $this->ControlsVisible["EsReqTecnico"] = $this->EsReqTecnico->Visible;
            $this->ControlsVisible["lRevision"] = $this->lRevision->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->ID_PPMC->SetValue($this->DataSource->ID_PPMC->GetValue());
                $this->ID_PPMC->Parameters = "";
                $this->ID_PPMC->Parameters = CCAddParam($this->ID_PPMC->Parameters, "Id", $this->DataSource->f("Id"));
                $this->NAME->SetValue($this->DataSource->NAME->GetValue());
                $this->SERVICIO_NEGOCIO->SetValue($this->DataSource->SERVICIO_NEGOCIO->GetValue());
                $this->TIPO_REQUERIMIENTO->SetValue($this->DataSource->TIPO_REQUERIMIENTO->GetValue());
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                $this->imgCumpleHE->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->imgCumpleHE->Parameters = CCAddParam($this->imgCumpleHE->Parameters, "sID", $this->DataSource->f("Id"));
                $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
                $this->FechaFirmaCAES->SetValue($this->DataSource->FechaFirmaCAES->GetValue());
                $this->CAL_COD->SetValue($this->DataSource->CAL_COD->GetValue());
                $this->imgCumpleCC->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->imgCumpleCC->Parameters = CCAddParam($this->imgCumpleCC->Parameters, "Id", $this->DataSource->f("Id"));
                $this->lkCumpleCC->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->lkCumpleCC->Parameters = CCAddParam($this->lkCumpleCC->Parameters, "Id", $this->DataSource->f("Id"));
                $this->CUMPL_REQ_FUNC->SetValue($this->DataSource->CUMPL_REQ_FUNC->GetValue());
                $this->imgCumpleCRF->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->imgCumpleCRF->Parameters = CCAddParam($this->imgCumpleCRF->Parameters, "Id", $this->DataSource->f("Id"));
                $this->DEF_FUG_AMB_PROD->SetValue($this->DataSource->DEF_FUG_AMB_PROD->GetValue());
                $this->lkCumpleDF->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->lkCumpleDF->Parameters = CCAddParam($this->lkCumpleDF->Parameters, "Id", $this->DataSource->f("Id"));
                $this->lkCALIDAD_PROD_TERM->SetValue($this->DataSource->lkCALIDAD_PROD_TERM->GetValue());
                $this->lkCALIDAD_PROD_TERM->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->lkCALIDAD_PROD_TERM->Parameters = CCAddParam($this->lkCALIDAD_PROD_TERM->Parameters, "Id", $this->DataSource->f("Id"));
                $this->lkCUMPL_REQ_FUNC->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->lkCUMPL_REQ_FUNC->Parameters = CCAddParam($this->lkCUMPL_REQ_FUNC->Parameters, "Id", $this->DataSource->f("Id"));
                $this->analista->SetValue($this->DataSource->analista->GetValue());
                $this->imgCumpleDF->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->imgCumpleDF->Parameters = CCAddParam($this->imgCumpleDF->Parameters, "Id", $this->DataSource->f("Id"));
                $this->CALIDAD_PROD_TERM->SetValue($this->DataSource->CALIDAD_PROD_TERM->GetValue());
                $this->imgCALIDAD_PROD_TERM->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->imgCALIDAD_PROD_TERM->Parameters = CCAddParam($this->imgCALIDAD_PROD_TERM->Parameters, "Id", $this->DataSource->f("Id"));
                $this->lkCumpleHE->SetValue($this->DataSource->lkCumpleHE->GetValue());
                $this->lkCumpleHE->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->lkCumpleHE->Parameters = CCAddParam($this->lkCumpleHE->Parameters, "sID", $this->DataSource->f("Id"));
                $this->EsReqTecnico->SetValue($this->DataSource->EsReqTecnico->GetValue());
                $this->EsReqTecnico->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->EsReqTecnico->Parameters = CCAddParam($this->EsReqTecnico->Parameters, "s_Requerimiento", $this->DataSource->f("ID_PPMC"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->ID_PPMC->Show();
                $this->NAME->Show();
                $this->SERVICIO_NEGOCIO->Show();
                $this->TIPO_REQUERIMIENTO->Show();
                $this->nombre->Show();
                $this->IdEstimacion->Show();
                $this->imgCumpleHE->Show();
                $this->RETR_ENTREGABLE->Show();
                $this->FechaFirmaCAES->Show();
                $this->CAL_COD->Show();
                $this->imgCumpleCC->Show();
                $this->lkCumpleCC->Show();
                $this->CUMPL_REQ_FUNC->Show();
                $this->imgCumpleCRF->Show();
                $this->DEF_FUG_AMB_PROD->Show();
                $this->lkCumpleDF->Show();
                $this->lkCALIDAD_PROD_TERM->Show();
                $this->lkCUMPL_REQ_FUNC->Show();
                $this->analista->Show();
                $this->imgCumpleDF->Show();
                $this->CALIDAD_PROD_TERM->Show();
                $this->imgCALIDAD_PROD_TERM->Show();
                $this->lkCumpleHE->Show();
                $this->EsReqTecnico->Show();
                $this->lRevision->Show();
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
        $this->Sorter_ID_PPMC->Show();
        $this->Sorter_SERVICIO_NEGOCIO->Show();
        $this->Sorter_nombre->Show();
        $this->Navigator->Show();
        $this->Sorter1->Show();
        $this->Sorter2->Show();
        $this->Sorter3->Show();
        $this->Sorter4->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-B7BA75B0
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ID_PPMC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICIO_NEGOCIO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TIPO_REQUERIMIENTO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IdEstimacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCumpleHE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaFirmaCAES->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CAL_COD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCumpleCC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->lkCumpleCC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUMPL_REQ_FUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCumpleCRF->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DEF_FUG_AMB_PROD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->lkCumpleDF->Errors->ToString());
        $errors = ComposeStrings($errors, $this->lkCALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->lkCUMPL_REQ_FUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->analista->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCumpleDF->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->lkCumpleHE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EsReqTecnico->Errors->ToString());
        $errors = ComposeStrings($errors, $this->lRevision->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @3-FCB6E20C

class clsGrid1DataSource extends clsDBcnDisenio {  //Grid1DataSource Class @3-9B337F8E

//DataSource Variables @3-BB227E6C
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $ID_PPMC;
    public $NAME;
    public $SERVICIO_NEGOCIO;
    public $TIPO_REQUERIMIENTO;
    public $nombre;
    public $IdEstimacion;
    public $RETR_ENTREGABLE;
    public $FechaFirmaCAES;
    public $CAL_COD;
    public $CUMPL_REQ_FUNC;
    public $DEF_FUG_AMB_PROD;
    public $lkCALIDAD_PROD_TERM;
    public $analista;
    public $CALIDAD_PROD_TERM;
    public $lkCumpleHE;
    public $EsReqTecnico;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-321C7110
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->ID_PPMC = new clsField("ID_PPMC", ccsInteger, "");
        
        $this->NAME = new clsField("NAME", ccsMemo, "");
        
        $this->SERVICIO_NEGOCIO = new clsField("SERVICIO_NEGOCIO", ccsText, "");
        
        $this->TIPO_REQUERIMIENTO = new clsField("TIPO_REQUERIMIENTO", ccsMemo, "");
        
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsText, "");
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsText, "");
        
        $this->FechaFirmaCAES = new clsField("FechaFirmaCAES", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->CAL_COD = new clsField("CAL_COD", ccsText, "");
        
        $this->CUMPL_REQ_FUNC = new clsField("CUMPL_REQ_FUNC", ccsText, "");
        
        $this->DEF_FUG_AMB_PROD = new clsField("DEF_FUG_AMB_PROD", ccsText, "");
        
        $this->lkCALIDAD_PROD_TERM = new clsField("lkCALIDAD_PROD_TERM", ccsText, "");
        
        $this->analista = new clsField("analista", ccsText, "");
        
        $this->CALIDAD_PROD_TERM = new clsField("CALIDAD_PROD_TERM", ccsText, "");
        
        $this->lkCumpleHE = new clsField("lkCumpleHE", ccsText, "");
        
        $this->EsReqTecnico = new clsField("EsReqTecnico", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-FBD16565
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_ID_PPMC" => array("ID_PPMC", ""), 
            "Sorter_SERVICIO_NEGOCIO" => array("SERVICIO_NEGOCIO", ""), 
            "Sorter_nombre" => array("nombre", ""), 
            "Sorter1" => array("NAME", ""), 
            "Sorter2" => array("TIPO_REQUERIMIENTO", ""), 
            "Sorter3" => array("IdEstimacion", ""), 
            "Sorter4" => array("analista", "")));
    }
//End SetOrder Method

//Prepare Method @3-1FA0DC53
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_mesparam", ccsInteger, "", "", $this->Parameters["urls_mesparam"], date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))), false);
        $this->wp->AddParameter("2", "urls_anioparam", ccsInteger, "", "", $this->Parameters["urls_anioparam"], date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))), false);
        $this->wp->AddParameter("3", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], CCGetSession("CDSPreferido"), false);
        $this->wp->AddParameter("4", "urlsAnalista", ccsText, "", "", $this->Parameters["urlsAnalista"], "", false);
        $this->wp->AddParameter("5", "urls_numero", ccsText, "", "", $this->Parameters["urls_numero"], "", false);
        $this->wp->AddParameter("6", "urlsSLO", ccsInteger, "", "", $this->Parameters["urlsSLO"], 0, false);
    }
//End Prepare Method

//Open Method @3-B83794DC
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select cast(DatosPPMC.ID_PPMC as integer) ID_PPMC, DatosPPMC.NAME, \n" .
        "	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) SERVICIO_NEGOCIO, \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) TIPO_REQUERIMIENTO,\n" .
        "	p.nombre, ISNULL(c.IdEstimacion,u.IdEstimacion) IdEstimacion, u.Id, c.RETR_ENTREGABLE  , c.COMPL_RUTA_CRITICA,c.CUMPL_REQ_FUNC, C.EST_PROY , C.CALIDAD_PROD_TERM ,c.DEF_FUG_AMB_PROD, c.CAL_COD,\n" .
        "	i.FechaFirmaCAES, i.IdTipoReq, i.id_servicio_cont, i.id RetEnt, u.analista , df.id DefFug, rf.id ReqFun, ca.id Calidad, u.MesTransicion, u.EsReqTecnico, u.Revision\n" .
        "from mc_universo_cds u inner join \n" .
        "	(\n" .
        "SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO \n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id\n" .
        "left join mc_info_rs_cr_re_rc i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo\n" .
        "left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "where  isnull(descartar_manual,0)=0 and tipo='PC'\n" .
        "	and (mes = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "	and anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and (u.SLO= " . $this->SQLValue($this->wp->GetDBValue("6"), ccsInteger) . ")\n" .
        "	AND (u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " OR 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "	AND (u.numero ='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "' OR ''='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "')\n" .
        "	and (u.analista like '%" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "%' or u.analista  is null)) cnt";
        $this->SQL = "select cast(DatosPPMC.ID_PPMC as integer) ID_PPMC, DatosPPMC.NAME, \n" .
        "	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) SERVICIO_NEGOCIO, \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) TIPO_REQUERIMIENTO,\n" .
        "	p.nombre, ISNULL(c.IdEstimacion,u.IdEstimacion) IdEstimacion, u.Id, c.RETR_ENTREGABLE  , c.COMPL_RUTA_CRITICA,c.CUMPL_REQ_FUNC, C.EST_PROY , C.CALIDAD_PROD_TERM ,c.DEF_FUG_AMB_PROD, c.CAL_COD,\n" .
        "	i.FechaFirmaCAES, i.IdTipoReq, i.id_servicio_cont, i.id RetEnt, u.analista , df.id DefFug, rf.id ReqFun, ca.id Calidad, u.MesTransicion, u.EsReqTecnico, u.Revision\n" .
        "from mc_universo_cds u inner join \n" .
        "	(\n" .
        "SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO \n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id\n" .
        "left join mc_info_rs_cr_re_rc i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo\n" .
        "left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "where  isnull(descartar_manual,0)=0 and tipo='PC'\n" .
        "	and (mes = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "	and anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and (u.SLO= " . $this->SQLValue($this->wp->GetDBValue("6"), ccsInteger) . ")\n" .
        "	AND (u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " OR 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "	AND (u.numero ='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "' OR ''='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "')\n" .
        "	and (u.analista like '%" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "%' or u.analista  is null)";
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

//SetValues Method @3-5B7150ED
    function SetValues()
    {
        $this->ID_PPMC->SetDBValue(trim($this->f("ID_PPMC")));
        $this->NAME->SetDBValue($this->f("NAME"));
        $this->SERVICIO_NEGOCIO->SetDBValue($this->f("SERVICIO_NEGOCIO"));
        $this->TIPO_REQUERIMIENTO->SetDBValue($this->f("TIPO_REQUERIMIENTO"));
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->IdEstimacion->SetDBValue($this->f("IdEstimacion"));
        $this->RETR_ENTREGABLE->SetDBValue($this->f("RETR_ENTREGABLE"));
        $this->FechaFirmaCAES->SetDBValue(trim($this->f("FechaFirmaCAES")));
        $this->CAL_COD->SetDBValue($this->f("CAL_COD"));
        $this->CUMPL_REQ_FUNC->SetDBValue($this->f("CUMPL_REQ_FUNC"));
        $this->DEF_FUG_AMB_PROD->SetDBValue($this->f("DEF_FUG_AMB_PROD"));
        $this->lkCALIDAD_PROD_TERM->SetDBValue($this->f("Calidad"));
        $this->analista->SetDBValue($this->f("analista"));
        $this->CALIDAD_PROD_TERM->SetDBValue($this->f("CALIDAD_PROD_TERM"));
        $this->lkCumpleHE->SetDBValue($this->f("Ver"));
        $this->EsReqTecnico->SetDBValue($this->f("EsReqTecnico"));
    }
//End SetValues Method

} //End Grid1DataSource Class @3-FCB6E20C

class clsRecordGrid2 { //Grid2 Class @21-542C3E47

//Variables @21-9E315808

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

//Class_Initialize Event @21-38A65744
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
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsTable;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            $this->s_id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->DataSource->Parameters["expr76"] = 'CDS';
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "expr76", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["expr76"], "", false);
            $this->s_id_proveedor->DataSource->wp->Criterion[1] = $this->s_id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_id_proveedor->DataSource->wp->GetDBValue("1"), $this->s_id_proveedor->DataSource->ToSQL($this->s_id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_id_proveedor->DataSource->Where = 
                 $this->s_id_proveedor->DataSource->wp->Criterion[1];
            $this->s_numero = new clsControl(ccsTextBox, "s_numero", "Numero", ccsText, "", CCGetRequestParam("s_numero", $Method, NULL), $this);
            $this->s_mesparam = new clsControl(ccsListBox, "s_mesparam", "Mes", ccsInteger, "", CCGetRequestParam("s_mesparam", $Method, NULL), $this);
            $this->s_mesparam->DSType = dsTable;
            $this->s_mesparam->DataSource = new clsDBcnDisenio();
            $this->s_mesparam->ds = & $this->s_mesparam->DataSource;
            $this->s_mesparam->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_mesparam->BoundColumn, $this->s_mesparam->TextColumn, $this->s_mesparam->DBFormat) = array("IdMes", "Mes", "");
            $this->s_anioparam = new clsControl(ccsListBox, "s_anioparam", "Anio", ccsInteger, "", CCGetRequestParam("s_anioparam", $Method, NULL), $this);
            $this->s_anioparam->DSType = dsTable;
            $this->s_anioparam->DataSource = new clsDBcnDisenio();
            $this->s_anioparam->ds = & $this->s_anioparam->DataSource;
            $this->s_anioparam->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_anioparam->BoundColumn, $this->s_anioparam->TextColumn, $this->s_anioparam->DBFormat) = array("Ano", "Ano", "");
            $this->s_anioparam->DataSource->Parameters["expr181"] = 2013;
            $this->s_anioparam->DataSource->wp = new clsSQLParameters();
            $this->s_anioparam->DataSource->wp->AddParameter("1", "expr181", ccsInteger, "", "", $this->s_anioparam->DataSource->Parameters["expr181"], "", false);
            $this->s_anioparam->DataSource->wp->Criterion[1] = $this->s_anioparam->DataSource->wp->Operation(opGreaterThan, "[Ano]", $this->s_anioparam->DataSource->wp->GetDBValue("1"), $this->s_anioparam->DataSource->ToSQL($this->s_anioparam->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->s_anioparam->DataSource->Where = 
                 $this->s_anioparam->DataSource->wp->Criterion[1];
            $this->sAnalista = new clsControl(ccsListBox, "sAnalista", "sAnalista", ccsText, "", CCGetRequestParam("sAnalista", $Method, NULL), $this);
            $this->sAnalista->DSType = dsTable;
            $this->sAnalista->DataSource = new clsDBcnDisenio();
            $this->sAnalista->ds = & $this->sAnalista->DataSource;
            $this->sAnalista->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_usuarios {SQL_Where} {SQL_OrderBy}";
            $this->sAnalista->DataSource->Order = "Usuario";
            list($this->sAnalista->BoundColumn, $this->sAnalista->TextColumn, $this->sAnalista->DBFormat) = array("Usuario", "Usuario", "");
            $this->sAnalista->DataSource->Parameters["urlNivel"] = CCGetFromGet("Nivel", NULL);
            $this->sAnalista->DataSource->Parameters["expr216"] = 'CAPC';
            $this->sAnalista->DataSource->wp = new clsSQLParameters();
            $this->sAnalista->DataSource->wp->AddParameter("1", "urlNivel", ccsInteger, "", "", $this->sAnalista->DataSource->Parameters["urlNivel"], 3, false);
            $this->sAnalista->DataSource->wp->AddParameter("2", "expr216", ccsText, "", "", $this->sAnalista->DataSource->Parameters["expr216"], "", false);
            $this->sAnalista->DataSource->wp->Criterion[1] = $this->sAnalista->DataSource->wp->Operation(opEqual, "[Nivel]", $this->sAnalista->DataSource->wp->GetDBValue("1"), $this->sAnalista->DataSource->ToSQL($this->sAnalista->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->sAnalista->DataSource->wp->Criterion[2] = $this->sAnalista->DataSource->wp->Operation(opEqual, "[Grupo]", $this->sAnalista->DataSource->wp->GetDBValue("2"), $this->sAnalista->DataSource->ToSQL($this->sAnalista->DataSource->wp->GetDBValue("2"), ccsText),false);
            $this->sAnalista->DataSource->Where = $this->sAnalista->DataSource->wp->opAND(
                 false, 
                 $this->sAnalista->DataSource->wp->Criterion[1], 
                 $this->sAnalista->DataSource->wp->Criterion[2]);
            $this->sAnalista->DataSource->Order = "Usuario";
            $this->sSLO = new clsControl(ccsCheckBox, "sSLO", "sSLO", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("sSLO", $Method, NULL), $this);
            $this->sSLO->CheckedValue = true;
            $this->sSLO->UncheckedValue = false;
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_id_proveedor->Value) && !strlen($this->s_id_proveedor->Value) && $this->s_id_proveedor->Value !== false)
                    $this->s_id_proveedor->SetText(CCGetSession("CDSPreferido",""));
                if(!is_array($this->s_mesparam->Value) && !strlen($this->s_mesparam->Value) && $this->s_mesparam->Value !== false)
                    $this->s_mesparam->SetText(date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))));
                if(!is_array($this->s_anioparam->Value) && !strlen($this->s_anioparam->Value) && $this->s_anioparam->Value !== false)
                    $this->s_anioparam->SetText(2014);
                if(!is_array($this->sSLO->Value) && !strlen($this->sSLO->Value) && $this->sSLO->Value !== false)
                    $this->sSLO->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Validate Method @21-18F6CD14
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_numero->Validate() && $Validation);
        $Validation = ($this->s_mesparam->Validate() && $Validation);
        $Validation = ($this->s_anioparam->Validate() && $Validation);
        $Validation = ($this->sAnalista->Validate() && $Validation);
        $Validation = ($this->sSLO->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_numero->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_mesparam->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_anioparam->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sAnalista->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sSLO->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @21-D489604E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_numero->Errors->Count());
        $errors = ($errors || $this->s_mesparam->Errors->Count());
        $errors = ($errors || $this->s_anioparam->Errors->Count());
        $errors = ($errors || $this->sAnalista->Errors->Count());
        $errors = ($errors || $this->sSLO->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @21-81DEA30B
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
        $Redirect = "PPMCsCrbLista.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "PPMCsCrbLista.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @21-18485925
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
        $this->s_mesparam->Prepare();
        $this->s_anioparam->Prepare();
        $this->sAnalista->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_numero->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_mesparam->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_anioparam->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sAnalista->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sSLO->Errors->ToString());
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
        $this->s_id_proveedor->Show();
        $this->s_numero->Show();
        $this->s_mesparam->Show();
        $this->s_anioparam->Show();
        $this->sAnalista->Show();
        $this->sSLO->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End Grid2 Class @21-FCB6E20C



//Initialize Page @1-7AB1D40F
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
$TemplateFileName = "PPMCsCrbLista.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-DCC8390B
CCSecurityRedirect("3;4;5", "");
//End Authenticate User

//Include events file @1-B9534BF3
include_once("./PPMCsCrbLista_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-A30EB671
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$Grid1 = new clsGridGrid1("", $MainPage);
$Grid2 = new clsRecordGrid2("", $MainPage);
$lkCuadroNS = new clsControl(ccsLink, "lkCuadroNS", "lkCuadroNS", ccsText, "", CCGetRequestParam("lkCuadroNS", ccsGet, NULL), $MainPage);
$lkCuadroNS->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkCuadroNS->Page = "PPMCsApbCuadroNSRSxls.php";
$lkDetalleRS = new clsControl(ccsLink, "lkDetalleRS", "lkDetalleRS", ccsText, "", CCGetRequestParam("lkDetalleRS", ccsGet, NULL), $MainPage);
$lkDetalleRS->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkDetalleRS->Page = "PPMCsApbDetalleRSxls.php";
$lkTableroSLAs = new clsControl(ccsLink, "lkTableroSLAs", "lkTableroSLAs", ccsText, "", CCGetRequestParam("lkTableroSLAs", ccsGet, NULL), $MainPage);
$lkTableroSLAs->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkTableroSLAs->Page = "TableroSLAs.php";
$MainPage->Header = & $Header;
$MainPage->Grid1 = & $Grid1;
$MainPage->Grid2 = & $Grid2;
$MainPage->lkCuadroNS = & $lkCuadroNS;
$MainPage->lkDetalleRS = & $lkDetalleRS;
$MainPage->lkTableroSLAs = & $lkTableroSLAs;
$Grid1->Initialize();
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

//Go to destination page @1-F58E208A
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($Grid1);
    unset($Grid2);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A44F6B81
$Header->Show();
$Grid1->Show();
$Grid2->Show();
$lkCuadroNS->Show();
$lkDetalleRS->Show();
$lkTableroSLAs->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-E217B085
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($Grid1);
unset($Grid2);
unset($Tpl);
//End Unload Page


?>
