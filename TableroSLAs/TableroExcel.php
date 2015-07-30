<?php
//Include Common Files @1-8F01EABB
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "TableroExcel.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
require_once 'SSRSReport.php';
//End Include Common Files

//Include Page implementation @4-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_reporte_ns1 { //mc_reporte_ns1 Class @99-B122E666

//Variables @99-9E315808

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

//Class_Initialize Event @99-C65790DE
    function clsRecordmc_reporte_ns1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_reporte_ns1/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_reporte_ns1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_MesReporte = new clsControl(ccsListBox, "s_MesReporte", "Mesreporte", ccsInteger, "", CCGetRequestParam("s_MesReporte", $Method, NULL), $this);
            $this->s_MesReporte->DSType = dsTable;
            $this->s_MesReporte->DataSource = new clsDBcnDisenio();
            $this->s_MesReporte->ds = & $this->s_MesReporte->DataSource;
            $this->s_MesReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_MesReporte->BoundColumn, $this->s_MesReporte->TextColumn, $this->s_MesReporte->DBFormat) = array("IdMes", "Mes", "");
            $this->s_AnioReporte = new clsControl(ccsListBox, "s_AnioReporte", "Anioreporte", ccsInteger, "", CCGetRequestParam("s_AnioReporte", $Method, NULL), $this);
            $this->s_AnioReporte->DSType = dsTable;
            $this->s_AnioReporte->DataSource = new clsDBcnDisenio();
            $this->s_AnioReporte->ds = & $this->s_AnioReporte->DataSource;
            $this->s_AnioReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_AnioReporte->BoundColumn, $this->s_AnioReporte->TextColumn, $this->s_AnioReporte->DBFormat) = array("Ano", "Ano", "");
            $this->s_AnioReporte->DataSource->Parameters["expr111"] = 2013;
            $this->s_AnioReporte->DataSource->wp = new clsSQLParameters();
            $this->s_AnioReporte->DataSource->wp->AddParameter("1", "expr111", ccsInteger, "", "", $this->s_AnioReporte->DataSource->Parameters["expr111"], "", false);
            $this->s_AnioReporte->DataSource->wp->Criterion[1] = $this->s_AnioReporte->DataSource->wp->Operation(opGreaterThan, "[Ano]", $this->s_AnioReporte->DataSource->wp->GetDBValue("1"), $this->s_AnioReporte->DataSource->ToSQL($this->s_AnioReporte->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->s_AnioReporte->DataSource->Where = 
                 $this->s_AnioReporte->DataSource->wp->Criterion[1];
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsTable;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            $this->s_id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->DataSource->Parameters["expr107"] = 'CDS';
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "expr107", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["expr107"], "", false);
            $this->s_id_proveedor->DataSource->wp->Criterion[1] = $this->s_id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_id_proveedor->DataSource->wp->GetDBValue("1"), $this->s_id_proveedor->DataSource->ToSQL($this->s_id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_id_proveedor->DataSource->Where = 
                 $this->s_id_proveedor->DataSource->wp->Criterion[1];
            $this->s_SLO = new clsControl(ccsCheckBox, "s_SLO", "SLO", ccsInteger, "", CCGetRequestParam("s_SLO", $Method, NULL), $this);
            $this->s_SLO->CheckedValue = $this->s_SLO->GetParsedValue(1);
            $this->s_SLO->UncheckedValue = $this->s_SLO->GetParsedValue(0);
            $this->DyP = new clsControl(ccsCheckBox, "DyP", "Dy P", ccsInteger, "", CCGetRequestParam("DyP", $Method, NULL), $this);
            $this->DyP->CheckedValue = $this->DyP->GetParsedValue(1);
            $this->DyP->UncheckedValue = $this->DyP->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_SLO->Value) && !strlen($this->s_SLO->Value) && $this->s_SLO->Value !== false)
                    $this->s_SLO->SetValue(false);
                if(!is_array($this->DyP->Value) && !strlen($this->DyP->Value) && $this->DyP->Value !== false)
                    $this->DyP->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Validate Method @99-270CE37F
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_MesReporte->Validate() && $Validation);
        $Validation = ($this->s_AnioReporte->Validate() && $Validation);
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_SLO->Validate() && $Validation);
        $Validation = ($this->DyP->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_AnioReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_SLO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DyP->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @99-36715A46
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_MesReporte->Errors->Count());
        $errors = ($errors || $this->s_AnioReporte->Errors->Count());
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_SLO->Errors->Count());
        $errors = ($errors || $this->DyP->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @99-DD94EE4C
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

//Show Method @99-AA344D79
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

        $this->s_MesReporte->Prepare();
        $this->s_AnioReporte->Prepare();
        $this->s_id_proveedor->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_AnioReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_SLO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DyP->Errors->ToString());
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
        $this->s_MesReporte->Show();
        $this->s_AnioReporte->Show();
        $this->s_id_proveedor->Show();
        $this->s_SLO->Show();
        $this->DyP->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_reporte_ns1 Class @99-FCB6E20C

class clsRecordmc_reporte_ns { //mc_reporte_ns Class @5-B06C9AE8

//Variables @5-9E315808

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

//Class_Initialize Event @5-14C9206D
    function clsRecordmc_reporte_ns($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_reporte_ns/Error";
        $this->DataSource = new clsmc_reporte_nsDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_reporte_ns";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Version = new clsControl(ccsTextBox, "Version", "Version", ccsInteger, "", CCGetRequestParam("Version", $Method, NULL), $this);
            $this->Version->Required = true;
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->s_MesReporte = new clsControl(ccsListBox, "s_MesReporte", "s_MesReporte", ccsInteger, "", CCGetRequestParam("s_MesReporte", $Method, NULL), $this);
            $this->s_MesReporte->DSType = dsTable;
            $this->s_MesReporte->DataSource = new clsDBcnDisenio();
            $this->s_MesReporte->ds = & $this->s_MesReporte->DataSource;
            $this->s_MesReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_MesReporte->BoundColumn, $this->s_MesReporte->TextColumn, $this->s_MesReporte->DBFormat) = array("IdMes", "Mes", "");
            $this->s_MesReporte->Required = true;
            $this->Comentario = new clsControl(ccsTextArea, "Comentario", "Comentario", ccsText, "", CCGetRequestParam("Comentario", $Method, NULL), $this);
            $this->s_AnioReporte = new clsControl(ccsListBox, "s_AnioReporte", "s_AnioReporte", ccsInteger, "", CCGetRequestParam("s_AnioReporte", $Method, NULL), $this);
            $this->s_AnioReporte->DSType = dsTable;
            $this->s_AnioReporte->DataSource = new clsDBcnDisenio();
            $this->s_AnioReporte->ds = & $this->s_AnioReporte->DataSource;
            $this->s_AnioReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_AnioReporte->BoundColumn, $this->s_AnioReporte->TextColumn, $this->s_AnioReporte->DBFormat) = array("Ano", "Ano", "");
            $this->s_AnioReporte->Required = true;
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "s_id_proveedor", ccsText, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsTable;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            $this->s_id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->Required = true;
            $this->Responsable = new clsControl(ccsListBox, "Responsable", "Responsable", ccsText, "", CCGetRequestParam("Responsable", $Method, NULL), $this);
            $this->Responsable->DSType = dsTable;
            $this->Responsable->DataSource = new clsDBcnDisenio();
            $this->Responsable->ds = & $this->Responsable->DataSource;
            $this->Responsable->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_usuarios {SQL_Where} {SQL_OrderBy}";
            list($this->Responsable->BoundColumn, $this->Responsable->TextColumn, $this->Responsable->DBFormat) = array("Usuario", "Nombre", "");
            $this->Responsable->DataSource->Parameters["expr186"] = 1;
            $this->Responsable->DataSource->Parameters["expr187"] = 'CAPC';
            $this->Responsable->DataSource->wp = new clsSQLParameters();
            $this->Responsable->DataSource->wp->AddParameter("1", "expr186", ccsInteger, "", "", $this->Responsable->DataSource->Parameters["expr186"], "", false);
            $this->Responsable->DataSource->wp->AddParameter("2", "expr187", ccsText, "", "", $this->Responsable->DataSource->Parameters["expr187"], "", false);
            $this->Responsable->DataSource->wp->Criterion[1] = $this->Responsable->DataSource->wp->Operation(opEqual, "[Activo]", $this->Responsable->DataSource->wp->GetDBValue("1"), $this->Responsable->DataSource->ToSQL($this->Responsable->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->Responsable->DataSource->wp->Criterion[2] = $this->Responsable->DataSource->wp->Operation(opEqual, "[Grupo]", $this->Responsable->DataSource->wp->GetDBValue("2"), $this->Responsable->DataSource->ToSQL($this->Responsable->DataSource->wp->GetDBValue("2"), ccsText),false);
            $this->Responsable->DataSource->Where = $this->Responsable->DataSource->wp->opAND(
                 false, 
                 $this->Responsable->DataSource->wp->Criterion[1], 
                 $this->Responsable->DataSource->wp->Criterion[2]);
            $this->Responsable->Required = true;
            $this->Fecha = new clsControl(ccsTextBox, "Fecha", "Fecha", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "H", ":", "nn"), CCGetRequestParam("Fecha", $Method, NULL), $this);
            $this->Fecha->Required = true;
            $this->Datos = new clsControl(ccsTextBox, "Datos", "Datos", ccsText, "", CCGetRequestParam("Datos", $Method, NULL), $this);
            $this->Datos->Required = true;
            $this->Fuente = new clsControl(ccsTextBox, "Fuente", "Fuente", ccsText, "", CCGetRequestParam("Fuente", $Method, NULL), $this);
            $this->Instrucciones = new clsControl(ccsTextArea, "Instrucciones", "Instrucciones", ccsText, "", CCGetRequestParam("Instrucciones", $Method, NULL), $this);
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsText, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->hdSLO = new clsControl(ccsHidden, "hdSLO", "hdSLO", ccsInteger, "", CCGetRequestParam("hdSLO", $Method, NULL), $this);
            $this->hdDyP = new clsControl(ccsHidden, "hdDyP", "hdDyP", ccsInteger, "", CCGetRequestParam("hdDyP", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->Version->Value) && !strlen($this->Version->Value) && $this->Version->Value !== false)
                    $this->Version->SetText(1);
                if(!is_array($this->s_MesReporte->Value) && !strlen($this->s_MesReporte->Value) && $this->s_MesReporte->Value !== false)
                    $this->s_MesReporte->SetText(CCGetParam("s_MesReporte"));
                if(!is_array($this->s_AnioReporte->Value) && !strlen($this->s_AnioReporte->Value) && $this->s_AnioReporte->Value !== false)
                    $this->s_AnioReporte->SetText(CCGetParam("s_AnioReporte"));
                if(!is_array($this->s_id_proveedor->Value) && !strlen($this->s_id_proveedor->Value) && $this->s_id_proveedor->Value !== false)
                    $this->s_id_proveedor->SetText(CCGetParam("s_id_proveedor"));
                if(!is_array($this->Responsable->Value) && !strlen($this->Responsable->Value) && $this->Responsable->Value !== false)
                    $this->Responsable->SetText(CCGetUserLogin());
                if(!is_array($this->Fecha->Value) && !strlen($this->Fecha->Value) && $this->Fecha->Value !== false)
                    $this->Fecha->SetText(date('d/m/Y H:i'));
                if(!is_array($this->Datos->Value) && !strlen($this->Datos->Value) && $this->Datos->Value !== false)
                    $this->Datos->SetText("Manual");
                if(!is_array($this->Fuente->Value) && !strlen($this->Fuente->Value) && $this->Fuente->Value !== false)
                    $this->Fuente->SetText("CDS");
                if(!is_array($this->hdSLO->Value) && !strlen($this->hdSLO->Value) && $this->hdSLO->Value !== false)
                    $this->hdSLO->SetText(CCGetParam("s_SLO",0));
                if(!is_array($this->hdDyP->Value) && !strlen($this->hdDyP->Value) && $this->hdDyP->Value !== false)
                    $this->hdDyP->SetText(CCGetParam("DyP",0));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @5-3539CED4
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urls_MesReporte"] = CCGetFromGet("s_MesReporte", NULL);
        $this->DataSource->Parameters["urls_AnioReporte"] = CCGetFromGet("s_AnioReporte", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_SLO"] = CCGetFromGet("s_SLO", NULL);
        $this->DataSource->Parameters["urlDyP"] = CCGetFromGet("DyP", NULL);
    }
//End Initialize Method

//Validate Method @5-5E9F6F10
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Version->Validate() && $Validation);
        $Validation = ($this->s_MesReporte->Validate() && $Validation);
        $Validation = ($this->Comentario->Validate() && $Validation);
        $Validation = ($this->s_AnioReporte->Validate() && $Validation);
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->Responsable->Validate() && $Validation);
        $Validation = ($this->Fecha->Validate() && $Validation);
        $Validation = ($this->Datos->Validate() && $Validation);
        $Validation = ($this->Fuente->Validate() && $Validation);
        $Validation = ($this->Instrucciones->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->hdSLO->Validate() && $Validation);
        $Validation = ($this->hdDyP->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Version->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Comentario->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_AnioReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Responsable->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Fecha->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Datos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Fuente->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Instrucciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdSLO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdDyP->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @5-B82B2135
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Version->Errors->Count());
        $errors = ($errors || $this->s_MesReporte->Errors->Count());
        $errors = ($errors || $this->Comentario->Errors->Count());
        $errors = ($errors || $this->s_AnioReporte->Errors->Count());
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->Responsable->Errors->Count());
        $errors = ($errors || $this->Fecha->Errors->Count());
        $errors = ($errors || $this->Datos->Errors->Count());
        $errors = ($errors || $this->Fuente->Errors->Count());
        $errors = ($errors || $this->Instrucciones->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->hdSLO->Errors->Count());
        $errors = ($errors || $this->hdDyP->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @5-AD35F63C
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @5-3EEA905B
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Version->SetValue($this->Version->GetValue(true));
        $this->DataSource->s_MesReporte->SetValue($this->s_MesReporte->GetValue(true));
        $this->DataSource->Comentario->SetValue($this->Comentario->GetValue(true));
        $this->DataSource->s_AnioReporte->SetValue($this->s_AnioReporte->GetValue(true));
        $this->DataSource->s_id_proveedor->SetValue($this->s_id_proveedor->GetValue(true));
        $this->DataSource->Responsable->SetValue($this->Responsable->GetValue(true));
        $this->DataSource->Fecha->SetValue($this->Fecha->GetValue(true));
        $this->DataSource->Datos->SetValue($this->Datos->GetValue(true));
        $this->DataSource->Fuente->SetValue($this->Fuente->GetValue(true));
        $this->DataSource->Instrucciones->SetValue($this->Instrucciones->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->hdSLO->SetValue($this->hdSLO->GetValue(true));
        $this->DataSource->hdDyP->SetValue($this->hdDyP->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @5-EBF095B1
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Version->SetValue($this->Version->GetValue(true));
        $this->DataSource->s_MesReporte->SetValue($this->s_MesReporte->GetValue(true));
        $this->DataSource->Comentario->SetValue($this->Comentario->GetValue(true));
        $this->DataSource->s_AnioReporte->SetValue($this->s_AnioReporte->GetValue(true));
        $this->DataSource->s_id_proveedor->SetValue($this->s_id_proveedor->GetValue(true));
        $this->DataSource->Responsable->SetValue($this->Responsable->GetValue(true));
        $this->DataSource->Fecha->SetValue($this->Fecha->GetValue(true));
        $this->DataSource->Datos->SetValue($this->Datos->GetValue(true));
        $this->DataSource->Fuente->SetValue($this->Fuente->GetValue(true));
        $this->DataSource->Instrucciones->SetValue($this->Instrucciones->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->hdSLO->SetValue($this->hdSLO->GetValue(true));
        $this->DataSource->hdDyP->SetValue($this->hdDyP->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @5-1F72A513
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

        $this->s_MesReporte->Prepare();
        $this->s_AnioReporte->Prepare();
        $this->s_id_proveedor->Prepare();
        $this->Responsable->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                if(!$this->FormSubmitted){
                    $this->Version->SetValue($this->DataSource->Version->GetValue());
                    $this->s_MesReporte->SetValue($this->DataSource->s_MesReporte->GetValue());
                    $this->Comentario->SetValue($this->DataSource->Comentario->GetValue());
                    $this->s_AnioReporte->SetValue($this->DataSource->s_AnioReporte->GetValue());
                    $this->s_id_proveedor->SetValue($this->DataSource->s_id_proveedor->GetValue());
                    $this->Responsable->SetValue($this->DataSource->Responsable->GetValue());
                    $this->Fecha->SetValue($this->DataSource->Fecha->GetValue());
                    $this->Datos->SetValue($this->DataSource->Datos->GetValue());
                    $this->Fuente->SetValue($this->DataSource->Fuente->GetValue());
                    $this->Instrucciones->SetValue($this->DataSource->Instrucciones->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                    $this->hdSLO->SetValue($this->DataSource->hdSLO->GetValue());
                    $this->hdDyP->SetValue($this->DataSource->hdDyP->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Version->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Comentario->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_AnioReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Responsable->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Fecha->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Datos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Fuente->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Instrucciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdSLO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdDyP->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Version->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->s_MesReporte->Show();
        $this->Comentario->Show();
        $this->s_AnioReporte->Show();
        $this->s_id_proveedor->Show();
        $this->Responsable->Show();
        $this->Fecha->Show();
        $this->Datos->Show();
        $this->Fuente->Show();
        $this->Instrucciones->Show();
        $this->Observaciones->Show();
        $this->hdSLO->Show();
        $this->hdDyP->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_reporte_ns Class @5-FCB6E20C

class clsmc_reporte_nsDataSource extends clsDBcnDisenio {  //mc_reporte_nsDataSource Class @5-565CE31A

//DataSource Variables @5-DC94EE5A
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $wp;
    public $AllParametersSet;

    public $UpdateFields = array();

    // Datasource fields
    public $Version;
    public $s_MesReporte;
    public $Comentario;
    public $s_AnioReporte;
    public $s_id_proveedor;
    public $Responsable;
    public $Fecha;
    public $Datos;
    public $Fuente;
    public $Instrucciones;
    public $Observaciones;
    public $hdSLO;
    public $hdDyP;
//End DataSource Variables

//DataSourceClass_Initialize Event @5-74F62C1B
    function clsmc_reporte_nsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_reporte_ns/Error";
        $this->Initialize();
        $this->Version = new clsField("Version", ccsInteger, "");
        
        $this->s_MesReporte = new clsField("s_MesReporte", ccsInteger, "");
        
        $this->Comentario = new clsField("Comentario", ccsText, "");
        
        $this->s_AnioReporte = new clsField("s_AnioReporte", ccsInteger, "");
        
        $this->s_id_proveedor = new clsField("s_id_proveedor", ccsText, "");
        
        $this->Responsable = new clsField("Responsable", ccsText, "");
        
        $this->Fecha = new clsField("Fecha", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->Datos = new clsField("Datos", ccsText, "");
        
        $this->Fuente = new clsField("Fuente", ccsText, "");
        
        $this->Instrucciones = new clsField("Instrucciones", ccsText, "");
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->hdSLO = new clsField("hdSLO", ccsInteger, "");
        
        $this->hdDyP = new clsField("hdDyP", ccsInteger, "");
        

        $this->UpdateFields["version"] = array("Name" => "version", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["mesreporte"] = array("Name" => "mesreporte", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["comentario"] = array("Name" => "comentario", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["anioreporte"] = array("Name" => "anioreporte", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["usuario"] = array("Name" => "usuario", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["fecha"] = array("Name" => "fecha", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["datos"] = array("Name" => "datos", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["fuente"] = array("Name" => "fuente", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["instrucciones"] = array("Name" => "instrucciones", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["observaciones"] = array("Name" => "observaciones", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SLO"] = array("Name" => "SLO", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DyP"] = array("Name" => "[DyP]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @5-FA6C48BD
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], 0, false);
        $this->wp->AddParameter("2", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], 0, false);
        $this->wp->AddParameter("3", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("4", "urls_SLO", ccsInteger, "", "", $this->Parameters["urls_SLO"], 0, false);
        $this->wp->AddParameter("5", "urlDyP", ccsInteger, "", "", $this->Parameters["urlDyP"], 0, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "mesreporte", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "anioreporte", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "id_proveedor", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opEqual, "SLO", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "[DyP]", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]);
    }
//End Prepare Method

//Open Method @5-CE3F6B4A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_reporte_ns {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @5-26173695
    function SetValues()
    {
        $this->Version->SetDBValue(trim($this->f("version")));
        $this->s_MesReporte->SetDBValue(trim($this->f("mesreporte")));
        $this->Comentario->SetDBValue($this->f("comentario"));
        $this->s_AnioReporte->SetDBValue(trim($this->f("anioreporte")));
        $this->s_id_proveedor->SetDBValue($this->f("id_proveedor"));
        $this->Responsable->SetDBValue($this->f("usuario"));
        $this->Fecha->SetDBValue(trim($this->f("fecha")));
        $this->Datos->SetDBValue($this->f("datos"));
        $this->Fuente->SetDBValue($this->f("fuente"));
        $this->Instrucciones->SetDBValue($this->f("instrucciones"));
        $this->Observaciones->SetDBValue($this->f("observaciones"));
        $this->hdSLO->SetDBValue(trim($this->f("SLO")));
        $this->hdDyP->SetDBValue(trim($this->f("DyP")));
    }
//End SetValues Method

//Insert Method @5-366ECA74
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["Version"] = new clsSQLParameter("ctrlVersion", ccsInteger, "", "", $this->Version->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["s_MesReporte"] = new clsSQLParameter("ctrls_MesReporte", ccsInteger, "", "", $this->s_MesReporte->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Comentario"] = new clsSQLParameter("ctrlComentario", ccsText, "", "", $this->Comentario->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["s_AnioReporte"] = new clsSQLParameter("ctrls_AnioReporte", ccsInteger, "", "", $this->s_AnioReporte->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["s_id_proveedor"] = new clsSQLParameter("ctrls_id_proveedor", ccsText, "", "", $this->s_id_proveedor->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Responsable"] = new clsSQLParameter("ctrlResponsable", ccsText, "", "", $this->Responsable->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Fecha"] = new clsSQLParameter("ctrlFecha", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "H", ":", "nn"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"), $this->Fecha->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Datos"] = new clsSQLParameter("ctrlDatos", ccsText, "", "", $this->Datos->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Fuente"] = new clsSQLParameter("ctrlFuente", ccsText, "", "", $this->Fuente->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Instrucciones"] = new clsSQLParameter("ctrlInstrucciones", ccsText, "", "", $this->Instrucciones->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Observaciones"] = new clsSQLParameter("ctrlObservaciones", ccsText, "", "", $this->Observaciones->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["hdSLO"] = new clsSQLParameter("ctrlhdSLO", ccsInteger, "", "", $this->hdSLO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["hdDyP"] = new clsSQLParameter("ctrlhdDyP", ccsInteger, "", "", $this->hdDyP->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["Version"]->GetValue()) and !strlen($this->cp["Version"]->GetText()) and !is_bool($this->cp["Version"]->GetValue())) 
            $this->cp["Version"]->SetValue($this->Version->GetValue(true));
        if (!is_null($this->cp["s_MesReporte"]->GetValue()) and !strlen($this->cp["s_MesReporte"]->GetText()) and !is_bool($this->cp["s_MesReporte"]->GetValue())) 
            $this->cp["s_MesReporte"]->SetValue($this->s_MesReporte->GetValue(true));
        if (!is_null($this->cp["Comentario"]->GetValue()) and !strlen($this->cp["Comentario"]->GetText()) and !is_bool($this->cp["Comentario"]->GetValue())) 
            $this->cp["Comentario"]->SetValue($this->Comentario->GetValue(true));
        if (!is_null($this->cp["s_AnioReporte"]->GetValue()) and !strlen($this->cp["s_AnioReporte"]->GetText()) and !is_bool($this->cp["s_AnioReporte"]->GetValue())) 
            $this->cp["s_AnioReporte"]->SetValue($this->s_AnioReporte->GetValue(true));
        if (!is_null($this->cp["s_id_proveedor"]->GetValue()) and !strlen($this->cp["s_id_proveedor"]->GetText()) and !is_bool($this->cp["s_id_proveedor"]->GetValue())) 
            $this->cp["s_id_proveedor"]->SetValue($this->s_id_proveedor->GetValue(true));
        if (!is_null($this->cp["Responsable"]->GetValue()) and !strlen($this->cp["Responsable"]->GetText()) and !is_bool($this->cp["Responsable"]->GetValue())) 
            $this->cp["Responsable"]->SetValue($this->Responsable->GetValue(true));
        if (!is_null($this->cp["Fecha"]->GetValue()) and !strlen($this->cp["Fecha"]->GetText()) and !is_bool($this->cp["Fecha"]->GetValue())) 
            $this->cp["Fecha"]->SetValue($this->Fecha->GetValue(true));
        if (!is_null($this->cp["Datos"]->GetValue()) and !strlen($this->cp["Datos"]->GetText()) and !is_bool($this->cp["Datos"]->GetValue())) 
            $this->cp["Datos"]->SetValue($this->Datos->GetValue(true));
        if (!is_null($this->cp["Fuente"]->GetValue()) and !strlen($this->cp["Fuente"]->GetText()) and !is_bool($this->cp["Fuente"]->GetValue())) 
            $this->cp["Fuente"]->SetValue($this->Fuente->GetValue(true));
        if (!is_null($this->cp["Instrucciones"]->GetValue()) and !strlen($this->cp["Instrucciones"]->GetText()) and !is_bool($this->cp["Instrucciones"]->GetValue())) 
            $this->cp["Instrucciones"]->SetValue($this->Instrucciones->GetValue(true));
        if (!is_null($this->cp["Observaciones"]->GetValue()) and !strlen($this->cp["Observaciones"]->GetText()) and !is_bool($this->cp["Observaciones"]->GetValue())) 
            $this->cp["Observaciones"]->SetValue($this->Observaciones->GetValue(true));
        if (!is_null($this->cp["hdSLO"]->GetValue()) and !strlen($this->cp["hdSLO"]->GetText()) and !is_bool($this->cp["hdSLO"]->GetValue())) 
            $this->cp["hdSLO"]->SetValue($this->hdSLO->GetValue(true));
        if (!is_null($this->cp["hdDyP"]->GetValue()) and !strlen($this->cp["hdDyP"]->GetText()) and !is_bool($this->cp["hdDyP"]->GetValue())) 
            $this->cp["hdDyP"]->SetValue($this->hdDyP->GetValue(true));
        $this->SQL = "INSERT INTO mc_reporte_ns(version, mesreporte, \n" .
        "comentario, anioreporte, id_proveedor, usuario, \n" .
        "fecha, datos, fuente, instrucciones, observaciones, SLO, DyP) \n" .
        "VALUES(" . $this->SQLValue($this->cp["Version"]->GetDBValue(), ccsInteger) . ", " . $this->SQLValue($this->cp["s_MesReporte"]->GetDBValue(), ccsInteger) . ", '" . $this->SQLValue($this->cp["Comentario"]->GetDBValue(), ccsText) . "', " . $this->SQLValue($this->cp["s_AnioReporte"]->GetDBValue(), ccsInteger) . ", '" . $this->SQLValue($this->cp["s_id_proveedor"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["Responsable"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["Fecha"]->GetDBValue(), ccsDate) . "', '" . $this->SQLValue($this->cp["Datos"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["Fuente"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["Instrucciones"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["Observaciones"]->GetDBValue(), ccsText) . "', " . $this->SQLValue($this->cp["hdSLO"]->GetDBValue(), ccsInteger) . ", " . $this->SQLValue($this->cp["hdDyP"]->GetDBValue(), ccsInteger) . ")";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @5-5EC4B294
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["version"]["Value"] = $this->Version->GetDBValue(true);
        $this->UpdateFields["mesreporte"]["Value"] = $this->s_MesReporte->GetDBValue(true);
        $this->UpdateFields["comentario"]["Value"] = $this->Comentario->GetDBValue(true);
        $this->UpdateFields["anioreporte"]["Value"] = $this->s_AnioReporte->GetDBValue(true);
        $this->UpdateFields["id_proveedor"]["Value"] = $this->s_id_proveedor->GetDBValue(true);
        $this->UpdateFields["usuario"]["Value"] = $this->Responsable->GetDBValue(true);
        $this->UpdateFields["fecha"]["Value"] = $this->Fecha->GetDBValue(true);
        $this->UpdateFields["datos"]["Value"] = $this->Datos->GetDBValue(true);
        $this->UpdateFields["fuente"]["Value"] = $this->Fuente->GetDBValue(true);
        $this->UpdateFields["instrucciones"]["Value"] = $this->Instrucciones->GetDBValue(true);
        $this->UpdateFields["observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->UpdateFields["SLO"]["Value"] = $this->hdSLO->GetDBValue(true);
        $this->UpdateFields["DyP"]["Value"] = $this->hdDyP->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_reporte_ns", $this->UpdateFields, $this);
        $this->SQL .= strlen($this->Where) ? " WHERE " . $this->Where : $this->Where;
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End mc_reporte_nsDataSource Class @5-FCB6E20C







//Initialize Page @1-B8A6DBD7
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
$TemplateFileName = "TableroExcel.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/ui/jquery.ui.core.js|js/jquery/ui/jquery.ui.widget.js|js/jquery/ui/jquery.ui.datepicker.js|js/jquery/datepicker/ccs-date-timepicker.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-ED7CB2E0
CCSecurityRedirect("2", "");
//End Authenticate User

//Include events file @1-F6E8F6B7
include_once("./TableroExcel_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-CEC9E85E
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_reporte_ns1 = new clsRecordmc_reporte_ns1("", $MainPage);
$Panel1 = new clsPanel("Panel1", $MainPage);
$mc_reporte_ns = new clsRecordmc_reporte_ns("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_reporte_ns1 = & $mc_reporte_ns1;
$MainPage->Panel1 = & $Panel1;
$MainPage->mc_reporte_ns = & $mc_reporte_ns;
$Panel1->AddComponent("mc_reporte_ns", $mc_reporte_ns);
$mc_reporte_ns->Initialize();
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

//Execute Components @1-DAB6EDA6
$mc_reporte_ns->Operation();
$mc_reporte_ns1->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-B0F33256
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_reporte_ns1);
    unset($mc_reporte_ns);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E2DF98F5
$Header->Show();
$mc_reporte_ns1->Show();
$Panel1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-D88DAF1F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_reporte_ns1);
unset($mc_reporte_ns);
unset($Tpl);
//End Unload Page


?>
