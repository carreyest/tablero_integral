<?php
//Include Common Files @1-28DCC4F4
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "SLAsCAPCLista.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_calificacion_capc { //mc_calificacion_capc Class @39-0A320629

//Variables @39-9E315808

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

//Class_Initialize Event @39-D17D42CA
    function clsRecordmc_calificacion_capc($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_calificacion_capc/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_calificacion_capc";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_numero = new clsControl(ccsTextBox, "s_numero", "Numero", ccsText, "", CCGetRequestParam("s_numero", $Method, NULL), $this);
            $this->s_mes = new clsControl(ccsListBox, "s_mes", "Mes", ccsInteger, "", CCGetRequestParam("s_mes", $Method, NULL), $this);
            $this->s_mes->DSType = dsTable;
            $this->s_mes->DataSource = new clsDBcnDisenio();
            $this->s_mes->ds = & $this->s_mes->DataSource;
            $this->s_mes->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_mes->BoundColumn, $this->s_mes->TextColumn, $this->s_mes->DBFormat) = array("IdMes", "Mes", "");
            $this->s_anio = new clsControl(ccsListBox, "s_anio", "Anio", ccsInteger, "", CCGetRequestParam("s_anio", $Method, NULL), $this);
            $this->s_anio->DSType = dsTable;
            $this->s_anio->DataSource = new clsDBcnDisenio();
            $this->s_anio->ds = & $this->s_anio->DataSource;
            $this->s_anio->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_anio->BoundColumn, $this->s_anio->TextColumn, $this->s_anio->DBFormat) = array("Ano", "Ano", "");
            $this->s_id_serviciocont = new clsControl(ccsListBox, "s_id_serviciocont", "Id Serviciocont", ccsInteger, "", CCGetRequestParam("s_id_serviciocont", $Method, NULL), $this);
            $this->s_id_serviciocont->DSType = dsTable;
            $this->s_id_serviciocont->DataSource = new clsDBcnDisenio();
            $this->s_id_serviciocont->ds = & $this->s_id_serviciocont->DataSource;
            $this->s_id_serviciocont->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_ServContractual {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_serviciocont->BoundColumn, $this->s_id_serviciocont->TextColumn, $this->s_id_serviciocont->DBFormat) = array("Id", "Descripcion", "");
            $this->s_id_serviciocont->DataSource->Parameters["expr53"] = 'CAPC';
            $this->s_id_serviciocont->DataSource->wp = new clsSQLParameters();
            $this->s_id_serviciocont->DataSource->wp->AddParameter("1", "expr53", ccsText, "", "", $this->s_id_serviciocont->DataSource->Parameters["expr53"], "", false);
            $this->s_id_serviciocont->DataSource->wp->Criterion[1] = $this->s_id_serviciocont->DataSource->wp->Operation(opEqual, "[Aplica]", $this->s_id_serviciocont->DataSource->wp->GetDBValue("1"), $this->s_id_serviciocont->DataSource->ToSQL($this->s_id_serviciocont->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_id_serviciocont->DataSource->Where = 
                 $this->s_id_serviciocont->DataSource->wp->Criterion[1];
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_mes->Value) && !strlen($this->s_mes->Value) && $this->s_mes->Value !== false)
                    $this->s_mes->SetText(date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))));
                if(!is_array($this->s_anio->Value) && !strlen($this->s_anio->Value) && $this->s_anio->Value !== false)
                    $this->s_anio->SetText(date("Y",mktime(0,0,0,date("m"),date("d")-45,date("Y"))));
            }
        }
    }
//End Class_Initialize Event

//Validate Method @39-2E8D0961
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_numero->Validate() && $Validation);
        $Validation = ($this->s_mes->Validate() && $Validation);
        $Validation = ($this->s_anio->Validate() && $Validation);
        $Validation = ($this->s_id_serviciocont->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_numero->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_serviciocont->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @39-263B4559
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_numero->Errors->Count());
        $errors = ($errors || $this->s_mes->Errors->Count());
        $errors = ($errors || $this->s_anio->Errors->Count());
        $errors = ($errors || $this->s_id_serviciocont->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @39-DD94EE4C
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
        $Redirect = $FileName;
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = $FileName . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @39-1CE6E928
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

        $this->s_mes->Prepare();
        $this->s_anio->Prepare();
        $this->s_id_serviciocont->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_numero->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_serviciocont->Errors->ToString());
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
        $this->s_numero->Show();
        $this->s_mes->Show();
        $this->s_anio->Show();
        $this->s_id_serviciocont->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_calificacion_capc Class @39-FCB6E20C

class clsGridmc_c_ServContractual_mc_c { //mc_c_ServContractual_mc_c class @3-584A250C

//Variables @3-8FE0E334

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
    public $Sorter_mc_c_ServContractual_Descripcion;
    public $Sorter_numero;
    public $Sorter_Descripcion;
    public $Sorter_Agrupador;
    public $Sorter_CALIDAD_PROD_TERM;
    public $Sorter_DEDUC_OMISION;
    public $Sorter_RETR_ENTREGABLE;
    public $Sorter_Observaciones;
//End Variables

//Class_Initialize Event @3-0E885D8E
    function clsGridmc_c_ServContractual_mc_c($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_c_ServContractual_mc_c";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_c_ServContractual_mc_c";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_c_ServContractual_mc_cDataSource($this);
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
        $this->SorterName = CCGetParam("mc_c_ServContractual_mc_cOrder", "");
        $this->SorterDirection = CCGetParam("mc_c_ServContractual_mc_cDir", "");

        $this->mc_c_ServContractual_Descripcion = new clsControl(ccsLabel, "mc_c_ServContractual_Descripcion", "mc_c_ServContractual_Descripcion", ccsText, "", CCGetRequestParam("mc_c_ServContractual_Descripcion", ccsGet, NULL), $this);
        $this->numero = new clsControl(ccsLink, "numero", "numero", ccsText, "", CCGetRequestParam("numero", ccsGet, NULL), $this);
        $this->numero->Page = "SLAsCapcApbDetalle.php";
        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", ccsGet, NULL), $this);
        $this->Agrupador = new clsControl(ccsLink, "Agrupador", "Agrupador", ccsText, "", CCGetRequestParam("Agrupador", ccsGet, NULL), $this);
        $this->Agrupador->Page = "SLAsCAPCDetalle.php";
        $this->CALIDAD_PROD_TERM = new clsControl(ccsLink, "CALIDAD_PROD_TERM", "CALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("CALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->CALIDAD_PROD_TERM->HTML = true;
        $this->CALIDAD_PROD_TERM->Page = "PPMCsCrbCalidadCAPC.php";
        $this->DEDUC_OMISION = new clsControl(ccsLink, "DEDUC_OMISION", "DEDUC_OMISION", ccsText, "", CCGetRequestParam("DEDUC_OMISION", ccsGet, NULL), $this);
        $this->DEDUC_OMISION->HTML = true;
        $this->DEDUC_OMISION->Page = "SLAsCAPCDetalle.php";
        $this->RETR_ENTREGABLE = new clsControl(ccsLink, "RETR_ENTREGABLE", "RETR_ENTREGABLE", ccsText, "", CCGetRequestParam("RETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->RETR_ENTREGABLE->HTML = true;
        $this->RETR_ENTREGABLE->Page = "SLAsCAPCRetEnt.php";
        $this->Observaciones = new clsControl(ccsLabel, "Observaciones", "Observaciones", ccsText, "", CCGetRequestParam("Observaciones", ccsGet, NULL), $this);
        $this->Img_CALIDAD_PROD_TERM = new clsControl(ccsImageLink, "Img_CALIDAD_PROD_TERM", "Img_CALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("Img_CALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->Img_CALIDAD_PROD_TERM->Page = "PPMCsCrbCalidadCAPC.php";
        $this->Img_DEDUC_OMISION = new clsControl(ccsImageLink, "Img_DEDUC_OMISION", "Img_DEDUC_OMISION", ccsText, "", CCGetRequestParam("Img_DEDUC_OMISION", ccsGet, NULL), $this);
        $this->Img_DEDUC_OMISION->Page = "SLAsCAPCDetalle.php";
        $this->Img_RETR_ENTREGABLE = new clsControl(ccsImageLink, "Img_RETR_ENTREGABLE", "Img_RETR_ENTREGABLE", ccsText, "", CCGetRequestParam("Img_RETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->Img_RETR_ENTREGABLE->Page = "SLAsCAPCRetEnt.php";
        $this->HERR_EST_COST = new clsControl(ccsLabel, "HERR_EST_COST", "HERR_EST_COST", ccsText, "", CCGetRequestParam("HERR_EST_COST", ccsGet, NULL), $this);
        $this->HERR_EST_COST->HTML = true;
        $this->REQ_SERV = new clsControl(ccsLabel, "REQ_SERV", "REQ_SERV", ccsText, "", CCGetRequestParam("REQ_SERV", ccsGet, NULL), $this);
        $this->REQ_SERV->HTML = true;
        $this->CUMPL_REQ_FUN = new clsControl(ccsLink, "CUMPL_REQ_FUN", "CUMPL_REQ_FUN", ccsText, "", CCGetRequestParam("CUMPL_REQ_FUN", ccsGet, NULL), $this);
        $this->CUMPL_REQ_FUN->HTML = true;
        $this->CUMPL_REQ_FUN->Page = "SLAsCAPCReqFunDetalle.php";
        $this->Img_HERR_EST_COST = new clsControl(ccsImageLink, "Img_HERR_EST_COST", "Img_HERR_EST_COST", ccsText, "", CCGetRequestParam("Img_HERR_EST_COST", ccsGet, NULL), $this);
        $this->Img_HERR_EST_COST->Page = "SLAsCapcApbDetalle.php";
        $this->Img_REQ_SERV = new clsControl(ccsImageLink, "Img_REQ_SERV", "Img_REQ_SERV", ccsText, "", CCGetRequestParam("Img_REQ_SERV", ccsGet, NULL), $this);
        $this->Img_REQ_SERV->Page = "SLAsCapcApbDetalle.php";
        $this->Img_CUMPL_REQ_FUN = new clsControl(ccsImageLink, "Img_CUMPL_REQ_FUN", "Img_CUMPL_REQ_FUN", ccsText, "", CCGetRequestParam("Img_CUMPL_REQ_FUN", ccsGet, NULL), $this);
        $this->Img_CUMPL_REQ_FUN->Page = "SLAsCAPCReqFunDetalle.php";
        $this->DetalleCalidad = new clsControl(ccsLabel, "DetalleCalidad", "DetalleCalidad", ccsText, "", CCGetRequestParam("DetalleCalidad", ccsGet, NULL), $this);
        $this->Obs_AP = new clsControl(ccsLabel, "Obs_AP", "Obs_AP", ccsText, "", CCGetRequestParam("Obs_AP", ccsGet, NULL), $this);
        $this->rf_obs = new clsControl(ccsLabel, "rf_obs", "rf_obs", ccsText, "", CCGetRequestParam("rf_obs", ccsGet, NULL), $this);
        $this->cal_obs = new clsControl(ccsLabel, "cal_obs", "cal_obs", ccsText, "", CCGetRequestParam("cal_obs", ccsGet, NULL), $this);
        $this->Sorter_mc_c_ServContractual_Descripcion = new clsSorter($this->ComponentName, "Sorter_mc_c_ServContractual_Descripcion", $FileName, $this);
        $this->Sorter_numero = new clsSorter($this->ComponentName, "Sorter_numero", $FileName, $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_Agrupador = new clsSorter($this->ComponentName, "Sorter_Agrupador", $FileName, $this);
        $this->Sorter_CALIDAD_PROD_TERM = new clsSorter($this->ComponentName, "Sorter_CALIDAD_PROD_TERM", $FileName, $this);
        $this->Sorter_DEDUC_OMISION = new clsSorter($this->ComponentName, "Sorter_DEDUC_OMISION", $FileName, $this);
        $this->Sorter_RETR_ENTREGABLE = new clsSorter($this->ComponentName, "Sorter_RETR_ENTREGABLE", $FileName, $this);
        $this->Sorter_Observaciones = new clsSorter($this->ComponentName, "Sorter_Observaciones", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $this);
        $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link1->Page = "SLAsCAPCDetalle.php";
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

//Show Method @3-955EA46B
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_numero"] = CCGetFromGet("s_numero", NULL);
        $this->DataSource->Parameters["urls_mes"] = CCGetFromGet("s_mes", NULL);
        $this->DataSource->Parameters["urls_anio"] = CCGetFromGet("s_anio", NULL);
        $this->DataSource->Parameters["urls_id_serviciocont"] = CCGetFromGet("s_id_serviciocont", NULL);

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
            $this->ControlsVisible["mc_c_ServContractual_Descripcion"] = $this->mc_c_ServContractual_Descripcion->Visible;
            $this->ControlsVisible["numero"] = $this->numero->Visible;
            $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
            $this->ControlsVisible["Agrupador"] = $this->Agrupador->Visible;
            $this->ControlsVisible["CALIDAD_PROD_TERM"] = $this->CALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["DEDUC_OMISION"] = $this->DEDUC_OMISION->Visible;
            $this->ControlsVisible["RETR_ENTREGABLE"] = $this->RETR_ENTREGABLE->Visible;
            $this->ControlsVisible["Observaciones"] = $this->Observaciones->Visible;
            $this->ControlsVisible["Img_CALIDAD_PROD_TERM"] = $this->Img_CALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["Img_DEDUC_OMISION"] = $this->Img_DEDUC_OMISION->Visible;
            $this->ControlsVisible["Img_RETR_ENTREGABLE"] = $this->Img_RETR_ENTREGABLE->Visible;
            $this->ControlsVisible["HERR_EST_COST"] = $this->HERR_EST_COST->Visible;
            $this->ControlsVisible["REQ_SERV"] = $this->REQ_SERV->Visible;
            $this->ControlsVisible["CUMPL_REQ_FUN"] = $this->CUMPL_REQ_FUN->Visible;
            $this->ControlsVisible["Img_HERR_EST_COST"] = $this->Img_HERR_EST_COST->Visible;
            $this->ControlsVisible["Img_REQ_SERV"] = $this->Img_REQ_SERV->Visible;
            $this->ControlsVisible["Img_CUMPL_REQ_FUN"] = $this->Img_CUMPL_REQ_FUN->Visible;
            $this->ControlsVisible["DetalleCalidad"] = $this->DetalleCalidad->Visible;
            $this->ControlsVisible["Obs_AP"] = $this->Obs_AP->Visible;
            $this->ControlsVisible["rf_obs"] = $this->rf_obs->Visible;
            $this->ControlsVisible["cal_obs"] = $this->cal_obs->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->mc_c_ServContractual_Descripcion->SetValue($this->DataSource->mc_c_ServContractual_Descripcion->GetValue());
                $this->numero->SetValue($this->DataSource->numero->GetValue());
                $this->numero->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->numero->Parameters = CCAddParam($this->numero->Parameters, "s_numero", $this->DataSource->f("numero"));
                $this->numero->Parameters = CCAddParam($this->numero->Parameters, "sID", $this->DataSource->f("id"));
                $this->numero->Parameters = CCAddParam($this->numero->Parameters, "s_mes", $this->DataSource->f("mes"));
                $this->numero->Parameters = CCAddParam($this->numero->Parameters, "s_anio", $this->DataSource->f("anio"));
                $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                $this->Agrupador->SetValue($this->DataSource->Agrupador->GetValue());
                $this->Agrupador->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Agrupador->Parameters = CCAddParam($this->Agrupador->Parameters, "id", $this->DataSource->f("id"));
                $this->CALIDAD_PROD_TERM->SetValue($this->DataSource->CALIDAD_PROD_TERM->GetValue());
                $this->CALIDAD_PROD_TERM->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->CALIDAD_PROD_TERM->Parameters = CCAddParam($this->CALIDAD_PROD_TERM->Parameters, "Id", $this->DataSource->f("id"));
                $this->DEDUC_OMISION->SetValue($this->DataSource->DEDUC_OMISION->GetValue());
                $this->DEDUC_OMISION->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->DEDUC_OMISION->Parameters = CCAddParam($this->DEDUC_OMISION->Parameters, "id", $this->DataSource->f("id"));
                $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
                $this->RETR_ENTREGABLE->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->RETR_ENTREGABLE->Parameters = CCAddParam($this->RETR_ENTREGABLE->Parameters, "s_numero", $this->DataSource->f("numero"));
                $this->RETR_ENTREGABLE->Parameters = CCAddParam($this->RETR_ENTREGABLE->Parameters, "id", $this->DataSource->f("id"));
                $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                $this->Img_CALIDAD_PROD_TERM->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Img_CALIDAD_PROD_TERM->Parameters = CCAddParam($this->Img_CALIDAD_PROD_TERM->Parameters, "Id", $this->DataSource->f("id"));
                $this->Img_DEDUC_OMISION->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Img_DEDUC_OMISION->Parameters = CCAddParam($this->Img_DEDUC_OMISION->Parameters, "id", $this->DataSource->f("id"));
                $this->Img_DEDUC_OMISION->Parameters = CCAddParam($this->Img_DEDUC_OMISION->Parameters, "s_numero", $this->DataSource->f("numero"));
                $this->Img_RETR_ENTREGABLE->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Img_RETR_ENTREGABLE->Parameters = CCAddParam($this->Img_RETR_ENTREGABLE->Parameters, "s_numero", $this->DataSource->f("numero"));
                $this->Img_RETR_ENTREGABLE->Parameters = CCAddParam($this->Img_RETR_ENTREGABLE->Parameters, "id", $this->DataSource->f("id"));
                $this->HERR_EST_COST->SetValue($this->DataSource->HERR_EST_COST->GetValue());
                $this->REQ_SERV->SetValue($this->DataSource->REQ_SERV->GetValue());
                $this->CUMPL_REQ_FUN->SetValue($this->DataSource->CUMPL_REQ_FUN->GetValue());
                $this->CUMPL_REQ_FUN->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->CUMPL_REQ_FUN->Parameters = CCAddParam($this->CUMPL_REQ_FUN->Parameters, "sID", $this->DataSource->f("id"));
                $this->Img_HERR_EST_COST->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Img_HERR_EST_COST->Parameters = CCAddParam($this->Img_HERR_EST_COST->Parameters, "s_numero", $this->DataSource->f("numero"));
                $this->Img_HERR_EST_COST->Parameters = CCAddParam($this->Img_HERR_EST_COST->Parameters, "sID", $this->DataSource->f("id"));
                $this->Img_REQ_SERV->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Img_REQ_SERV->Parameters = CCAddParam($this->Img_REQ_SERV->Parameters, "s_numero", $this->DataSource->f("numero"));
                $this->Img_REQ_SERV->Parameters = CCAddParam($this->Img_REQ_SERV->Parameters, "sID", $this->DataSource->f("id"));
                $this->Img_CUMPL_REQ_FUN->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Img_CUMPL_REQ_FUN->Parameters = CCAddParam($this->Img_CUMPL_REQ_FUN->Parameters, "sID", $this->DataSource->f("id"));
                $this->Img_CUMPL_REQ_FUN->Parameters = CCAddParam($this->Img_CUMPL_REQ_FUN->Parameters, "s_numero", $this->DataSource->f("numero"));
                $this->DetalleCalidad->SetValue($this->DataSource->DetalleCalidad->GetValue());
                $this->Obs_AP->SetValue($this->DataSource->Obs_AP->GetValue());
                $this->rf_obs->SetValue($this->DataSource->rf_obs->GetValue());
                $this->cal_obs->SetValue($this->DataSource->cal_obs->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->mc_c_ServContractual_Descripcion->Show();
                $this->numero->Show();
                $this->Descripcion->Show();
                $this->Agrupador->Show();
                $this->CALIDAD_PROD_TERM->Show();
                $this->DEDUC_OMISION->Show();
                $this->RETR_ENTREGABLE->Show();
                $this->Observaciones->Show();
                $this->Img_CALIDAD_PROD_TERM->Show();
                $this->Img_DEDUC_OMISION->Show();
                $this->Img_RETR_ENTREGABLE->Show();
                $this->HERR_EST_COST->Show();
                $this->REQ_SERV->Show();
                $this->CUMPL_REQ_FUN->Show();
                $this->Img_HERR_EST_COST->Show();
                $this->Img_REQ_SERV->Show();
                $this->Img_CUMPL_REQ_FUN->Show();
                $this->DetalleCalidad->Show();
                $this->Obs_AP->Show();
                $this->rf_obs->Show();
                $this->cal_obs->Show();
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
        $this->Sorter_mc_c_ServContractual_Descripcion->Show();
        $this->Sorter_numero->Show();
        $this->Sorter_Descripcion->Show();
        $this->Sorter_Agrupador->Show();
        $this->Sorter_CALIDAD_PROD_TERM->Show();
        $this->Sorter_DEDUC_OMISION->Show();
        $this->Sorter_RETR_ENTREGABLE->Show();
        $this->Sorter_Observaciones->Show();
        $this->Navigator->Show();
        $this->Link1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-0799AAAD
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->mc_c_ServContractual_Descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->numero->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Agrupador->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DEDUC_OMISION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Observaciones->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_CALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_DEDUC_OMISION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_RETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUMPL_REQ_FUN->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_HERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_REQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_CUMPL_REQ_FUN->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DetalleCalidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Obs_AP->Errors->ToString());
        $errors = ComposeStrings($errors, $this->rf_obs->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cal_obs->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_c_ServContractual_mc_c Class @3-FCB6E20C

class clsmc_c_ServContractual_mc_cDataSource extends clsDBcnDisenio {  //mc_c_ServContractual_mc_cDataSource Class @3-51953D32

//DataSource Variables @3-3E829BD3
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $mc_c_ServContractual_Descripcion;
    public $numero;
    public $Descripcion;
    public $Agrupador;
    public $CALIDAD_PROD_TERM;
    public $DEDUC_OMISION;
    public $RETR_ENTREGABLE;
    public $Observaciones;
    public $HERR_EST_COST;
    public $REQ_SERV;
    public $CUMPL_REQ_FUN;
    public $DetalleCalidad;
    public $Obs_AP;
    public $rf_obs;
    public $cal_obs;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-D1304724
    function clsmc_c_ServContractual_mc_cDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_c_ServContractual_mc_c";
        $this->Initialize();
        $this->mc_c_ServContractual_Descripcion = new clsField("mc_c_ServContractual_Descripcion", ccsText, "");
        
        $this->numero = new clsField("numero", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->Agrupador = new clsField("Agrupador", ccsText, "");
        
        $this->CALIDAD_PROD_TERM = new clsField("CALIDAD_PROD_TERM", ccsText, "");
        
        $this->DEDUC_OMISION = new clsField("DEDUC_OMISION", ccsText, "");
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsText, "");
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->HERR_EST_COST = new clsField("HERR_EST_COST", ccsText, "");
        
        $this->REQ_SERV = new clsField("REQ_SERV", ccsText, "");
        
        $this->CUMPL_REQ_FUN = new clsField("CUMPL_REQ_FUN", ccsText, "");
        
        $this->DetalleCalidad = new clsField("DetalleCalidad", ccsText, "");
        
        $this->Obs_AP = new clsField("Obs_AP", ccsText, "");
        
        $this->rf_obs = new clsField("rf_obs", ccsText, "");
        
        $this->cal_obs = new clsField("cal_obs", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-4B7535C5
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_mc_c_ServContractual_Descripcion" => array("mc_c_ServContractual_Descripcion", ""), 
            "Sorter_numero" => array("numero", ""), 
            "Sorter_Descripcion" => array("Descripcion", ""), 
            "Sorter_Agrupador" => array("Agrupador", ""), 
            "Sorter_CALIDAD_PROD_TERM" => array("CALIDAD_PROD_TERM", ""), 
            "Sorter_DEDUC_OMISION" => array("DEDUC_OMISION", ""), 
            "Sorter_RETR_ENTREGABLE" => array("RETR_ENTREGABLE", ""), 
            "Sorter_Observaciones" => array("Observaciones", "")));
    }
//End SetOrder Method

//Prepare Method @3-71BC61B1
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_numero", ccsText, "", "", $this->Parameters["urls_numero"], "", false);
        $this->wp->AddParameter("2", "urls_mes", ccsInteger, "", "", $this->Parameters["urls_mes"], date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))), false);
        $this->wp->AddParameter("3", "urls_anio", ccsInteger, "", "", $this->Parameters["urls_anio"], date("Y",mktime(0,0,0,date("m"),date("d")-45,date("Y"))), false);
        $this->wp->AddParameter("4", "urls_id_serviciocont", ccsInteger, "", "", $this->Parameters["urls_id_serviciocont"], 0, false);
    }
//End Prepare Method

//Open Method @3-BD89A806
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT distinct mc_calificacion_capc.*, mc_c_ServContractual.Descripcion AS mc_c_ServContractual_Descripcion ,\n" .
        "	a.Observaciones Obs_Ap, DatosPPMC.Name,  rf.Observaciones obs_rf, cal.Observaciones obs_cal\n" .
        "FROM mc_calificacion_capc \n" .
        "	left  JOIN mc_c_ServContractual ON mc_calificacion_capc.id_serviciocont = mc_c_ServContractual.Id\n" .
        "		left join mc_info_capc_ap a on a.id =  mc_calificacion_capc.id \n" .
        "		left join mc_info_capc_cr_RF rf on rf .Id = mc_calificacion_capc.id \n" .
        "		left join mc_info_rs_cr_calidad_CAPC cal on cal.id = mc_calificacion_capc.id \n" .
        "\n" .
        "		left join (\n" .
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
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and mc_calificacion_capc.mes = month(FECHA_CARGA) and mc_calificacion_capc.anio = YEAR(FECHA_CARGA) \n" .
        "WHERE numero LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "AND (mes = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or  " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0)\n" .
        "AND (anio = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "AND (id_serviciocont = " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . "  or 0=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " )) cnt";
        $this->SQL = "SELECT distinct mc_calificacion_capc.*, mc_c_ServContractual.Descripcion AS mc_c_ServContractual_Descripcion ,\n" .
        "	a.Observaciones Obs_Ap, DatosPPMC.Name,  rf.Observaciones obs_rf, cal.Observaciones obs_cal\n" .
        "FROM mc_calificacion_capc \n" .
        "	left  JOIN mc_c_ServContractual ON mc_calificacion_capc.id_serviciocont = mc_c_ServContractual.Id\n" .
        "		left join mc_info_capc_ap a on a.id =  mc_calificacion_capc.id \n" .
        "		left join mc_info_capc_cr_RF rf on rf .Id = mc_calificacion_capc.id \n" .
        "		left join mc_info_rs_cr_calidad_CAPC cal on cal.id = mc_calificacion_capc.id \n" .
        "\n" .
        "		left join (\n" .
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
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and mc_calificacion_capc.mes = month(FECHA_CARGA) and mc_calificacion_capc.anio = YEAR(FECHA_CARGA) \n" .
        "WHERE numero LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "AND (mes = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or  " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0)\n" .
        "AND (anio = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "AND (id_serviciocont = " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . "  or 0=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " )";
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

//SetValues Method @3-C64B6656
    function SetValues()
    {
        $this->mc_c_ServContractual_Descripcion->SetDBValue($this->f("mc_c_ServContractual_Descripcion"));
        $this->numero->SetDBValue($this->f("numero"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->Agrupador->SetDBValue($this->f("Agrupador"));
        $this->CALIDAD_PROD_TERM->SetDBValue($this->f("CALIDAD_PROD_TERM"));
        $this->DEDUC_OMISION->SetDBValue($this->f("DEDUC_OMISION"));
        $this->RETR_ENTREGABLE->SetDBValue($this->f("RETR_ENTREGABLE"));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
        $this->HERR_EST_COST->SetDBValue($this->f("HERR_EST_COST"));
        $this->REQ_SERV->SetDBValue($this->f("REQ_SERV"));
        $this->CUMPL_REQ_FUN->SetDBValue($this->f("CUMPL_REQ_FUN"));
        $this->DetalleCalidad->SetDBValue($this->f("DetalleCalidad"));
        $this->Obs_AP->SetDBValue($this->f("Obs_Ap"));
        $this->rf_obs->SetDBValue($this->f("obs_rf"));
        $this->cal_obs->SetDBValue($this->f("obs_cal"));
    }
//End SetValues Method

} //End mc_c_ServContractual_mc_cDataSource Class @3-FCB6E20C

//Include Page implementation @116-97AA785B
include_once(RelativePath . "/SLAsCAPCMenu.php");
//End Include Page implementation



//Initialize Page @1-78285DDA
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
$TemplateFileName = "SLAsCAPCLista.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-872FD3D7
CCSecurityRedirect("", "");
//End Authenticate User

//Include events file @1-A873D29D
include_once("./SLAsCAPCLista_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-284536DD
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_calificacion_capc = new clsRecordmc_calificacion_capc("", $MainPage);
$mc_c_ServContractual_mc_c = new clsGridmc_c_ServContractual_mc_c("", $MainPage);
$lkTableroExcelCAPC = new clsControl(ccsLink, "lkTableroExcelCAPC", "lkTableroExcelCAPC", ccsText, "", CCGetRequestParam("lkTableroExcelCAPC", ccsGet, NULL), $MainPage);
$lkTableroExcelCAPC->Page = "TableroExcel.php";
$SLAsCAPCMenu = new clsSLAsCAPCMenu("", "SLAsCAPCMenu", $MainPage);
$SLAsCAPCMenu->Initialize();
$MainPage->Header = & $Header;
$MainPage->mc_calificacion_capc = & $mc_calificacion_capc;
$MainPage->mc_c_ServContractual_mc_c = & $mc_c_ServContractual_mc_c;
$MainPage->lkTableroExcelCAPC = & $lkTableroExcelCAPC;
$MainPage->SLAsCAPCMenu = & $SLAsCAPCMenu;
$lkTableroExcelCAPC->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkTableroExcelCAPC->Parameters = CCAddParam($lkTableroExcelCAPC->Parameters, "s_id_proveedor", 1);
$mc_c_ServContractual_mc_c->Initialize();
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

//Execute Components @1-9E446AD6
$SLAsCAPCMenu->Operations();
$mc_calificacion_capc->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-56ED647F
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_calificacion_capc);
    unset($mc_c_ServContractual_mc_c);
    $SLAsCAPCMenu->Class_Terminate();
    unset($SLAsCAPCMenu);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2801BA69
$Header->Show();
$mc_calificacion_capc->Show();
$mc_c_ServContractual_mc_c->Show();
$SLAsCAPCMenu->Show();
$lkTableroExcelCAPC->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C1449AD7
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_calificacion_capc);
unset($mc_c_ServContractual_mc_c);
$SLAsCAPCMenu->Class_Terminate();
unset($SLAsCAPCMenu);
unset($Tpl);
//End Unload Page


?>
