<?php
//Include Common Files @1-94271AB4
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "IncidentesDetalleNS.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordmc_info_incidentesSearch { //mc_info_incidentesSearch Class @2-A8AEC4CE

//Variables @2-9E315808

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

//Class_Initialize Event @2-C2A1B609
    function clsRecordmc_info_incidentesSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_incidentesSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_incidentesSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "s_id_proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsTable;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            $this->s_id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->DataSource->Parameters["expr129"] = "CDS";
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "expr129", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["expr129"], "CDS", false);
            $this->s_id_proveedor->DataSource->wp->Criterion[1] = $this->s_id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_id_proveedor->DataSource->wp->GetDBValue("1"), $this->s_id_proveedor->DataSource->ToSQL($this->s_id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_id_proveedor->DataSource->Where = 
                 $this->s_id_proveedor->DataSource->wp->Criterion[1];
            $this->s_AnioReporte = new clsControl(ccsListBox, "s_AnioReporte", "s_AnioReporte", ccsText, "", CCGetRequestParam("s_AnioReporte", $Method, NULL), $this);
            $this->s_AnioReporte->DSType = dsTable;
            $this->s_AnioReporte->DataSource = new clsDBcnDisenio();
            $this->s_AnioReporte->ds = & $this->s_AnioReporte->DataSource;
            $this->s_AnioReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_AnioReporte->BoundColumn, $this->s_AnioReporte->TextColumn, $this->s_AnioReporte->DBFormat) = array("Ano", "Ano", "");
            $this->s_AnioReporte->DataSource->Parameters["expr225"] = 2013;
            $this->s_AnioReporte->DataSource->wp = new clsSQLParameters();
            $this->s_AnioReporte->DataSource->wp->AddParameter("1", "expr225", ccsInteger, "", "", $this->s_AnioReporte->DataSource->Parameters["expr225"], "", false);
            $this->s_AnioReporte->DataSource->wp->Criterion[1] = $this->s_AnioReporte->DataSource->wp->Operation(opGreaterThan, "[Ano]", $this->s_AnioReporte->DataSource->wp->GetDBValue("1"), $this->s_AnioReporte->DataSource->ToSQL($this->s_AnioReporte->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->s_AnioReporte->DataSource->Where = 
                 $this->s_AnioReporte->DataSource->wp->Criterion[1];
            $this->s_MesReporte = new clsControl(ccsListBox, "s_MesReporte", "s_MesReporte", ccsText, "", CCGetRequestParam("s_MesReporte", $Method, NULL), $this);
            $this->s_MesReporte->DSType = dsTable;
            $this->s_MesReporte->DataSource = new clsDBcnDisenio();
            $this->s_MesReporte->ds = & $this->s_MesReporte->DataSource;
            $this->s_MesReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_MesReporte->BoundColumn, $this->s_MesReporte->TextColumn, $this->s_MesReporte->DBFormat) = array("IdMes", "Mes", "");
            $this->s_Id_incidente_param = new clsControl(ccsTextBox, "s_Id_incidente_param", "s_Id_incidente_param", ccsText, "", CCGetRequestParam("s_Id_incidente_param", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_AnioReporte->Value) && !strlen($this->s_AnioReporte->Value) && $this->s_AnioReporte->Value !== false)
                    $this->s_AnioReporte->SetText(date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))));
                if(!is_array($this->s_MesReporte->Value) && !strlen($this->s_MesReporte->Value) && $this->s_MesReporte->Value !== false)
                    $this->s_MesReporte->SetText(date("m",mktime(0,0,0,date("m")-1,date("d"),date("Y"))));
            }
        }
    }
//End Class_Initialize Event

//Validate Method @2-05144C5F
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_AnioReporte->Validate() && $Validation);
        $Validation = ($this->s_MesReporte->Validate() && $Validation);
        $Validation = ($this->s_Id_incidente_param->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_AnioReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Id_incidente_param->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-D4566CEF
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_AnioReporte->Errors->Count());
        $errors = ($errors || $this->s_MesReporte->Errors->Count());
        $errors = ($errors || $this->s_Id_incidente_param->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-DD94EE4C
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

//Show Method @2-680E0E75
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
        $this->s_AnioReporte->Prepare();
        $this->s_MesReporte->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_AnioReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Id_incidente_param->Errors->ToString());
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
        $this->s_AnioReporte->Show();
        $this->s_MesReporte->Show();
        $this->s_Id_incidente_param->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_info_incidentesSearch Class @2-FCB6E20C

class clsGridmc_info_incidentes { //mc_info_incidentes class @26-075BA89B

//Variables @26-CF66FE56

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
    public $Sorter_Id_incidente;
    public $Sorter_ServicioNegocio;
    public $Sorter_Aplicacion;
    public $Sorter1;
    public $Sorter2;
//End Variables

//Class_Initialize Event @26-F69EC2D2
    function clsGridmc_info_incidentes($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_info_incidentes";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_info_incidentes";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_info_incidentesDataSource($this);
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
        $this->SorterName = CCGetParam("mc_info_incidentesOrder", "");
        $this->SorterDirection = CCGetParam("mc_info_incidentesDir", "");

        $this->Panel1 = new clsPanel("Panel1", $this);
        $this->Id_incidente = new clsControl(ccsLink, "Id_incidente", "Id_incidente", ccsText, "", CCGetRequestParam("Id_incidente", ccsGet, NULL), $this);
        $this->Id_incidente->Page = "IncidenteDetalle.php";
        $this->ServicioNegocio = new clsControl(ccsLabel, "ServicioNegocio", "ServicioNegocio", ccsText, "", CCGetRequestParam("ServicioNegocio", ccsGet, NULL), $this);
        $this->Aplicacion = new clsControl(ccsLabel, "Aplicacion", "Aplicacion", ccsText, "", CCGetRequestParam("Aplicacion", ccsGet, NULL), $this);
        $this->Severidad = new clsControl(ccsLabel, "Severidad", "Severidad", ccsText, "", CCGetRequestParam("Severidad", ccsGet, NULL), $this);
        $this->Cumple_Inc_TiempoAsignacion = new clsControl(ccsImage, "Cumple_Inc_TiempoAsignacion", "Cumple_Inc_TiempoAsignacion", ccsInteger, "", CCGetRequestParam("Cumple_Inc_TiempoAsignacion", ccsGet, NULL), $this);
        $this->Cumple_Inc_TiempoSolucion = new clsControl(ccsImage, "Cumple_Inc_TiempoSolucion", "Cumple_Inc_TiempoSolucion", ccsInteger, "", CCGetRequestParam("Cumple_Inc_TiempoSolucion", ccsGet, NULL), $this);
        $this->Obs_Manuales = new clsControl(ccsLabel, "Obs_Manuales", "Obs_Manuales", ccsMemo, "", CCGetRequestParam("Obs_Manuales", ccsGet, NULL), $this);
        $this->lkEvidencia = new clsControl(ccsLink, "lkEvidencia", "lkEvidencia", ccsText, "", CCGetRequestParam("lkEvidencia", ccsGet, NULL), $this);
        $this->lkEvidencia->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkEvidencia->Page = "";
        $this->Obs_SAT = new clsControl(ccsLabel, "Obs_SAT", "Obs_SAT", ccsText, "", CCGetRequestParam("Obs_SAT", ccsGet, NULL), $this);
        $this->Sorter_Id_incidente = new clsSorter($this->ComponentName, "Sorter_Id_incidente", $FileName, $this);
        $this->Sorter_ServicioNegocio = new clsSorter($this->ComponentName, "Sorter_ServicioNegocio", $FileName, $this);
        $this->Sorter_Aplicacion = new clsSorter($this->ComponentName, "Sorter_Aplicacion", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->lblRegistros = new clsControl(ccsLabel, "lblRegistros", "lblRegistros", ccsText, "", CCGetRequestParam("lblRegistros", ccsGet, NULL), $this);
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink1->Page = "";
        $this->ImageLink1->Visible = false;
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
        $this->Sorter2 = new clsSorter($this->ComponentName, "Sorter2", $FileName, $this);
        $this->Panel1->AddComponent("Id_incidente", $this->Id_incidente);
        $this->Panel1->AddComponent("ServicioNegocio", $this->ServicioNegocio);
        $this->Panel1->AddComponent("Aplicacion", $this->Aplicacion);
        $this->Panel1->AddComponent("Severidad", $this->Severidad);
        $this->Panel1->AddComponent("Cumple_Inc_TiempoAsignacion", $this->Cumple_Inc_TiempoAsignacion);
        $this->Panel1->AddComponent("Cumple_Inc_TiempoSolucion", $this->Cumple_Inc_TiempoSolucion);
        $this->Panel1->AddComponent("Obs_Manuales", $this->Obs_Manuales);
        $this->Panel1->AddComponent("lkEvidencia", $this->lkEvidencia);
        $this->Panel1->AddComponent("Obs_SAT", $this->Obs_SAT);
    }
//End Class_Initialize Event

//Initialize Method @26-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @26-8448D7FD
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_Id_incidente_param"] = CCGetFromGet("s_Id_incidente_param", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_MesReporte"] = CCGetFromGet("s_MesReporte", NULL);
        $this->DataSource->Parameters["urls_AnioReporte"] = CCGetFromGet("s_AnioReporte", NULL);
        $this->DataSource->Parameters["urls_analista_param"] = CCGetFromGet("s_analista_param", NULL);

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
            $this->ControlsVisible["Panel1"] = $this->Panel1->Visible;
            $this->ControlsVisible["Id_incidente"] = $this->Id_incidente->Visible;
            $this->ControlsVisible["ServicioNegocio"] = $this->ServicioNegocio->Visible;
            $this->ControlsVisible["Aplicacion"] = $this->Aplicacion->Visible;
            $this->ControlsVisible["Severidad"] = $this->Severidad->Visible;
            $this->ControlsVisible["Cumple_Inc_TiempoAsignacion"] = $this->Cumple_Inc_TiempoAsignacion->Visible;
            $this->ControlsVisible["Cumple_Inc_TiempoSolucion"] = $this->Cumple_Inc_TiempoSolucion->Visible;
            $this->ControlsVisible["Obs_Manuales"] = $this->Obs_Manuales->Visible;
            $this->ControlsVisible["lkEvidencia"] = $this->lkEvidencia->Visible;
            $this->ControlsVisible["Obs_SAT"] = $this->Obs_SAT->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Id_incidente->SetValue($this->DataSource->Id_incidente->GetValue());
                $this->Id_incidente->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Id_incidente->Parameters = CCAddParam($this->Id_incidente->Parameters, "Id_incidente", $this->DataSource->f("Id_incidente"));
                $this->Id_incidente->Parameters = CCAddParam($this->Id_incidente->Parameters, "NC", 1);
                $this->ServicioNegocio->SetValue($this->DataSource->ServicioNegocio->GetValue());
                $this->Aplicacion->SetValue($this->DataSource->Aplicacion->GetValue());
                $this->Severidad->SetValue($this->DataSource->Severidad->GetValue());
                $this->Cumple_Inc_TiempoAsignacion->SetValue($this->DataSource->Cumple_Inc_TiempoAsignacion->GetValue());
                $this->Cumple_Inc_TiempoSolucion->SetValue($this->DataSource->Cumple_Inc_TiempoSolucion->GetValue());
                $this->Obs_Manuales->SetValue($this->DataSource->Obs_Manuales->GetValue());
                $this->Obs_SAT->SetValue($this->DataSource->Obs_SAT->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Panel1->Show();
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
        $this->Sorter_Id_incidente->Show();
        $this->Sorter_ServicioNegocio->Show();
        $this->Sorter_Aplicacion->Show();
        $this->Navigator->Show();
        $this->lblRegistros->Show();
        $this->ImageLink1->Show();
        $this->Sorter1->Show();
        $this->Sorter2->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @26-ADD302FB
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Id_incidente->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ServicioNegocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Aplicacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Severidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumple_Inc_TiempoAsignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumple_Inc_TiempoSolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Obs_Manuales->Errors->ToString());
        $errors = ComposeStrings($errors, $this->lkEvidencia->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Obs_SAT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_info_incidentes Class @26-FCB6E20C

class clsmc_info_incidentesDataSource extends clsDBcnDisenio {  //mc_info_incidentesDataSource Class @26-AFE708D3

//DataSource Variables @26-9E53D454
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Id_incidente;
    public $ServicioNegocio;
    public $Aplicacion;
    public $Severidad;
    public $Cumple_Inc_TiempoAsignacion;
    public $Cumple_Inc_TiempoSolucion;
    public $Obs_Manuales;
    public $Obs_SAT;
//End DataSource Variables

//DataSourceClass_Initialize Event @26-A0A3D426
    function clsmc_info_incidentesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_info_incidentes";
        $this->Initialize();
        $this->Id_incidente = new clsField("Id_incidente", ccsText, "");
        
        $this->ServicioNegocio = new clsField("ServicioNegocio", ccsText, "");
        
        $this->Aplicacion = new clsField("Aplicacion", ccsText, "");
        
        $this->Severidad = new clsField("Severidad", ccsText, "");
        
        $this->Cumple_Inc_TiempoAsignacion = new clsField("Cumple_Inc_TiempoAsignacion", ccsInteger, "");
        
        $this->Cumple_Inc_TiempoSolucion = new clsField("Cumple_Inc_TiempoSolucion", ccsInteger, "");
        
        $this->Obs_Manuales = new clsField("Obs_Manuales", ccsMemo, "");
        
        $this->Obs_SAT = new clsField("Obs_SAT", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @26-8D5241A2
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Id_incidente" => array("Id_incidente", ""), 
            "Sorter_ServicioNegocio" => array("ServicioNegocio", ""), 
            "Sorter_Aplicacion" => array("Aplicacion", ""), 
            "Sorter1" => array("Cumple_Inc_TiempoAsignacion", ""), 
            "Sorter2" => array("Cumple_Inc_TiempoSolucion", "")));
    }
//End SetOrder Method

//Prepare Method @26-E7A4B14C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_Id_incidente_param", ccsText, "", "", $this->Parameters["urls_Id_incidente_param"], "", false);
        $this->wp->AddParameter("2", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("3", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], date("m",mktime(0,0,0,date("m")-1,date("d"),date("Y"))), false);
        $this->wp->AddParameter("4", "urls_AnioReporte", ccsText, "", "", $this->Parameters["urls_AnioReporte"], date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))), false);
        $this->wp->AddParameter("5", "urls_analista_param", ccsText, "", "", $this->Parameters["urls_analista_param"], "", false);
    }
//End Prepare Method

//Open Method @26-9C0639D3
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select mc.Id_incidente ,mci.ServicioNegocio ,mci.Aplicacion ,mci.FechaNuevo ,mci.FechaAsignado ,mci.FechaEnCurso ,mci.FechaPendiente ,mci.FechaResuelto ,mci.FechaCerrado, mc.severidad ,\n" .
        "(select top 1 FechaInicioMov from mc_detalle_incidente_avl where Id_Incidente=mci.Id_incidente order by paquete,clavemovimiento ) as RegistroAVL,\n" .
        "mc.Cumple_Inc_TiempoAsignacion ,mc.Cumple_Inc_TiempoSolucion ,mc.Cumple_DISP_SOPORTE ,mc.Obs_Manuales , mci.Estado, mcu.analista ,\n" .
        "mcSAT.Obs_Manuales Obs_SAT, mcu.medido\n" .
        "from mc_universo_cds mcu \n" .
        "	inner join mc_calificacion_incidentes_MC mc on mc.id_incidente = mcu.numero\n" .
        "	left join  mc_info_incidentes mci on mci.id_incidente=mcu.Numero \n" .
        "               and month(mci.FechaCarga) = mcu.mes and YEAR(mci.FechaCarga )= mcu.anio \n" .
        "    left join mc_calificacion_incidentes_SAT mcSAT on mcSAT.id_incidente = mc.id_incidente \n" .
        "where mcu.tipo='IN'\n" .
        "and mcu.mes=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "and mcu.anio=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "\n" .
        "and (mcu.analista='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "' OR '" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "'=''  ) \n" .
        "and ((mcu.id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ") or (" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0))\n" .
        "and (mci.Id_incidente like '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' or mci.Id_incidente is null)\n" .
        "and (mcu.slo is null or mcu.slo =0)) cnt";
        $this->SQL = "select TOP {SqlParam_endRecord} mc.Id_incidente ,mci.ServicioNegocio ,mci.Aplicacion ,mci.FechaNuevo ,mci.FechaAsignado ,mci.FechaEnCurso ,mci.FechaPendiente ,mci.FechaResuelto ,mci.FechaCerrado, mc.severidad ,\n" .
        "(select top 1 FechaInicioMov from mc_detalle_incidente_avl where Id_Incidente=mci.Id_incidente order by paquete,clavemovimiento ) as RegistroAVL,\n" .
        "mc.Cumple_Inc_TiempoAsignacion ,mc.Cumple_Inc_TiempoSolucion ,mc.Cumple_DISP_SOPORTE ,mc.Obs_Manuales , mci.Estado, mcu.analista ,\n" .
        "mcSAT.Obs_Manuales Obs_SAT, mcu.medido\n" .
        "from mc_universo_cds mcu \n" .
        "	inner join mc_calificacion_incidentes_MC mc on mc.id_incidente = mcu.numero\n" .
        "	left join  mc_info_incidentes mci on mci.id_incidente=mcu.Numero \n" .
        "               and month(mci.FechaCarga) = mcu.mes and YEAR(mci.FechaCarga )= mcu.anio \n" .
        "    left join mc_calificacion_incidentes_SAT mcSAT on mcSAT.id_incidente = mc.id_incidente \n" .
        "where mcu.tipo='IN'\n" .
        "and mcu.mes=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "and mcu.anio=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "\n" .
        "and (mcu.analista='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "' OR '" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "'=''  ) \n" .
        "and ((mcu.id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ") or (" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0))\n" .
        "and (mci.Id_incidente like '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' or mci.Id_incidente is null)\n" .
        "and (mcu.slo is null or mcu.slo =0)";
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

//SetValues Method @26-F5795F6E
    function SetValues()
    {
        $this->Id_incidente->SetDBValue($this->f("Id_incidente"));
        $this->ServicioNegocio->SetDBValue($this->f("ServicioNegocio"));
        $this->Aplicacion->SetDBValue($this->f("Aplicacion"));
        $this->Severidad->SetDBValue($this->f("severidad"));
        $this->Cumple_Inc_TiempoAsignacion->SetDBValue(trim($this->f("Cumple_Inc_TiempoAsignacion")));
        $this->Cumple_Inc_TiempoSolucion->SetDBValue(trim($this->f("Cumple_Inc_TiempoSolucion")));
        $this->Obs_Manuales->SetDBValue($this->f("Obs_Manuales"));
        $this->Obs_SAT->SetDBValue($this->f("Obs_SAT"));
    }
//End SetValues Method

} //End mc_info_incidentesDataSource Class @26-FCB6E20C

//Include Page implementation @165-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

//Include Page implementation @229-1C97D460
include_once(RelativePath . "/MenuTablero.php");
//End Include Page implementation

//Initialize Page @1-46DBA311
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
$TemplateFileName = "IncidentesDetalleNS.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-DAB76F23
include_once("./IncidentesDetalleNS_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-262334E9
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$mc_info_incidentesSearch = new clsRecordmc_info_incidentesSearch("", $MainPage);
$mc_info_incidentes = new clsGridmc_info_incidentes("", $MainPage);
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$MenuTablero = new clsMenuTablero("", "MenuTablero", $MainPage);
$MenuTablero->Initialize();
$MainPage->mc_info_incidentesSearch = & $mc_info_incidentesSearch;
$MainPage->mc_info_incidentes = & $mc_info_incidentes;
$MainPage->Header = & $Header;
$MainPage->MenuTablero = & $MenuTablero;
$mc_info_incidentes->Initialize();
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

//Execute Components @1-9B61BE67
$MenuTablero->Operations();
$Header->Operations();
$mc_info_incidentesSearch->Operation();
//End Execute Components

//Go to destination page @1-46DD2E7E
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($mc_info_incidentesSearch);
    unset($mc_info_incidentes);
    $Header->Class_Terminate();
    unset($Header);
    $MenuTablero->Class_Terminate();
    unset($MenuTablero);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-36EC22F0
$mc_info_incidentesSearch->Show();
$mc_info_incidentes->Show();
$Header->Show();
$MenuTablero->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-5DC95C61
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($mc_info_incidentesSearch);
unset($mc_info_incidentes);
$Header->Class_Terminate();
unset($Header);
$MenuTablero->Class_Terminate();
unset($MenuTablero);
unset($Tpl);
//End Unload Page


?>
