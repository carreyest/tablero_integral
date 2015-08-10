<?php
//Include Common Files @1-1AE0D391
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "ListadoVerificacionEntregables.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordBuscar { //Buscar Class @21-BABB3C11

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

//Class_Initialize Event @21-D6AA5211
    function clsRecordBuscar($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Buscar/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "Buscar";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_buscar = new clsButton("Button_buscar", $Method, $this);
            $this->MesReporte = new clsControl(ccsListBox, "MesReporte", "Mes Reporte", ccsInteger, "", CCGetRequestParam("MesReporte", $Method, NULL), $this);
            $this->MesReporte->DSType = dsTable;
            $this->MesReporte->DataSource = new clsDBcnDisenio();
            $this->MesReporte->ds = & $this->MesReporte->DataSource;
            $this->MesReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->MesReporte->BoundColumn, $this->MesReporte->TextColumn, $this->MesReporte->DBFormat) = array("IdMes", "Mes", "");
            $this->anioreporte = new clsControl(ccsListBox, "anioreporte", "Anioreporte", ccsInteger, "", CCGetRequestParam("anioreporte", $Method, NULL), $this);
            $this->anioreporte->DSType = dsTable;
            $this->anioreporte->DataSource = new clsDBcnDisenio();
            $this->anioreporte->ds = & $this->anioreporte->DataSource;
            $this->anioreporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->anioreporte->BoundColumn, $this->anioreporte->TextColumn, $this->anioreporte->DBFormat) = array("Ano", "Ano", "");
            $this->anioreporte->DataSource->Parameters["expr78"] = 2013;
            $this->anioreporte->DataSource->wp = new clsSQLParameters();
            $this->anioreporte->DataSource->wp->AddParameter("1", "expr78", ccsInteger, "", "", $this->anioreporte->DataSource->Parameters["expr78"], "", false);
            $this->anioreporte->DataSource->wp->Criterion[1] = $this->anioreporte->DataSource->wp->Operation(opGreaterThan, "[Ano]", $this->anioreporte->DataSource->wp->GetDBValue("1"), $this->anioreporte->DataSource->ToSQL($this->anioreporte->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->anioreporte->DataSource->Where = 
                 $this->anioreporte->DataSource->wp->Criterion[1];
            $this->busqproveedor = new clsControl(ccsListBox, "busqproveedor", "busqproveedor", ccsText, "", CCGetRequestParam("busqproveedor", $Method, NULL), $this);
            $this->busqproveedor->DSType = dsTable;
            $this->busqproveedor->DataSource = new clsDBcnDisenio();
            $this->busqproveedor->ds = & $this->busqproveedor->DataSource;
            $this->busqproveedor->DataSource->SQL = "SELECT id_proveedor, nombre \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->busqproveedor->BoundColumn, $this->busqproveedor->TextColumn, $this->busqproveedor->DBFormat) = array("id_proveedor", "nombre", "");
            if(!$this->FormSubmitted) {
                if(!is_array($this->MesReporte->Value) && !strlen($this->MesReporte->Value) && $this->MesReporte->Value !== false)
                    $this->MesReporte->SetText(date('m'));
                if(!is_array($this->anioreporte->Value) && !strlen($this->anioreporte->Value) && $this->anioreporte->Value !== false)
                    $this->anioreporte->SetText(2015);
            }
        }
    }
//End Class_Initialize Event

//Validate Method @21-D69748CA
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->MesReporte->Validate() && $Validation);
        $Validation = ($this->anioreporte->Validate() && $Validation);
        $Validation = ($this->busqproveedor->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->anioreporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->busqproveedor->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @21-551D1251
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->MesReporte->Errors->Count());
        $errors = ($errors || $this->anioreporte->Errors->Count());
        $errors = ($errors || $this->busqproveedor->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @21-F385C03C
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
            $this->PressedButton = "Button_buscar";
            if($this->Button_buscar->Pressed) {
                $this->PressedButton = "Button_buscar";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_buscar") {
                $Redirect = "ListadoVerificacionEntregables.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_buscar", "Button_buscar_x", "Button_buscar_y")), CCGetQueryString("QueryString", array("MesReporte", "anioreporte", "busqproveedor", "ccsForm")));
                if(!CCGetEvent($this->Button_buscar->CCSEvents, "OnClick", $this->Button_buscar)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @21-8DB4DE0E
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

        $this->MesReporte->Prepare();
        $this->anioreporte->Prepare();
        $this->busqproveedor->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->anioreporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->busqproveedor->Errors->ToString());
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

        $this->Button_buscar->Show();
        $this->MesReporte->Show();
        $this->anioreporte->Show();
        $this->busqproveedor->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End Buscar Class @21-FCB6E20C

class clsEditableGridGridEntregables { //GridEntregables Class @93-85CA138F

//Variables @93-5361207B

    // Public variables
    public $ComponentType = "EditableGrid";
    public $ComponentName;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormParameters;
    public $FormState;
    public $FormEnctype;
    public $CachedColumns;
    public $TotalRows;
    public $UpdatedRows;
    public $EmptyRows;
    public $Visible;
    public $RowsErrors;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode;
    public $ValidatingControls;
    public $Controls;
    public $ControlsErrors;
    public $RowNumber;
    public $Attributes;

    // Class variables
    public $Sorter_proveedor;
    public $Sorter_entregado;
    public $Sorter_mes;
    public $Sorter_anio_corte;
    public $Sorter_periodicidad;
    public $Sorter_entregable;
//End Variables

//Class_Initialize Event @93-8E772675
    function clsEditableGridGridEntregables($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid GridEntregables/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "GridEntregables";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->CachedColumns["id_registro"][0] = "id_registro";
        $this->DataSource = new clsGridEntregablesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: EditableGrid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->EmptyRows = 0;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if(!$this->Visible) return;

        $CCSForm = CCGetFromGet("ccsForm", "");
        $this->FormEnctype = "application/x-www-form-urlencoded";
        $this->FormSubmitted = ($CCSForm == $this->ComponentName);
        if($this->FormSubmitted) {
            $this->FormState = CCGetFromPost("FormState", "");
            $this->SetFormState($this->FormState);
        } else {
            $this->FormState = "";
        }
        $Method = $this->FormSubmitted ? ccsPost : ccsGet;

        $this->SorterName = CCGetParam("GridEntregablesOrder", "");
        $this->SorterDirection = CCGetParam("GridEntregablesDir", "");

        $this->Sorter_proveedor = new clsSorter($this->ComponentName, "Sorter_proveedor", $FileName, $this);
        $this->Sorter_entregado = new clsSorter($this->ComponentName, "Sorter_entregado", $FileName, $this);
        $this->Sorter_mes = new clsSorter($this->ComponentName, "Sorter_mes", $FileName, $this);
        $this->Sorter_anio_corte = new clsSorter($this->ComponentName, "Sorter_anio_corte", $FileName, $this);
        $this->entregable = new clsControl(ccsLabel, "entregable", "entregable", ccsText, "", NULL, $this);
        $this->periodicidad = new clsControl(ccsLabel, "periodicidad", "periodicidad", ccsText, "", NULL, $this);
        $this->proveedor = new clsControl(ccsLabel, "proveedor", "proveedor", ccsText, "", NULL, $this);
        $this->entregado = new clsControl(ccsListBox, "entregado", "Entregado", ccsInteger, "", NULL, $this);
        $this->entregado->DSType = dsListOfValues;
        $this->entregado->Values = array(array("0", "No"), array("1", "NoAplica"), array("2", "Si"));
        $this->entregado->Required = true;
        $this->comentarios = new clsControl(ccsTextArea, "comentarios", "Comentarios", ccsMemo, "", NULL, $this);
        $this->mes = new clsControl(ccsLabel, "mes", "mes", ccsText, "", NULL, $this);
        $this->anio_corte = new clsControl(ccsLabel, "anio_corte", "anio_corte", ccsInteger, "", NULL, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->Sorter_periodicidad = new clsSorter($this->ComponentName, "Sorter_periodicidad", $FileName, $this);
        $this->Sorter_entregable = new clsSorter($this->ComponentName, "Sorter_entregable", $FileName, $this);
        $this->id_entregable = new clsControl(ccsHidden, "id_entregable", "Id Entregable", ccsInteger, "", NULL, $this);
    }
//End Class_Initialize Event

//Initialize Method @93-EAA02E80
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urlMesReporte"] = CCGetFromGet("MesReporte", NULL);
        $this->DataSource->Parameters["urlanioreporte"] = CCGetFromGet("anioreporte", NULL);
        $this->DataSource->Parameters["urlbusqproveedor"] = CCGetFromGet("busqproveedor", NULL);
    }
//End Initialize Method

//GetFormParameters Method @93-4DD1271A
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["entregado"][$RowNumber] = CCGetFromPost("entregado_" . $RowNumber, NULL);
            $this->FormParameters["comentarios"][$RowNumber] = CCGetFromPost("comentarios_" . $RowNumber, NULL);
            $this->FormParameters["id_entregable"][$RowNumber] = CCGetFromPost("id_entregable_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @93-4242D444
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["id_registro"] = $this->CachedColumns["id_registro"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->entregado->SetText($this->FormParameters["entregado"][$this->RowNumber], $this->RowNumber);
            $this->comentarios->SetText($this->FormParameters["comentarios"][$this->RowNumber], $this->RowNumber);
            $this->id_entregable->SetText($this->FormParameters["id_entregable"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                $Validation = ($this->ValidateRow($this->RowNumber) && $Validation);
            }
            else if($this->CheckInsert())
            {
                $Validation = ($this->ValidateRow() && $Validation);
            }
        }
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//ValidateRow Method @93-2858866A
    function ValidateRow()
    {
        global $CCSLocales;
        $this->entregado->Validate();
        $this->comentarios->Validate();
        $this->id_entregable->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->entregado->Errors->ToString());
        $errors = ComposeStrings($errors, $this->comentarios->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_entregable->Errors->ToString());
        $this->entregado->Errors->Clear();
        $this->comentarios->Errors->Clear();
        $this->id_entregable->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @93-5E08B099
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["entregado"][$this->RowNumber]) && count($this->FormParameters["entregado"][$this->RowNumber])) || strlen($this->FormParameters["entregado"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["comentarios"][$this->RowNumber]) && count($this->FormParameters["comentarios"][$this->RowNumber])) || strlen($this->FormParameters["comentarios"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["id_entregable"][$this->RowNumber]) && count($this->FormParameters["id_entregable"][$this->RowNumber])) || strlen($this->FormParameters["id_entregable"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @93-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @93-909F269B
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted)
            return;

        $this->GetFormParameters();
        $this->PressedButton = "Button_Submit";
        if($this->Button_Submit->Pressed) {
            $this->PressedButton = "Button_Submit";
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Submit") {
            if(!CCGetEvent($this->Button_Submit->CCSEvents, "OnClick", $this->Button_Submit) || !$this->UpdateGrid()) {
                $Redirect = "";
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//UpdateGrid Method @93-E7097540
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["id_registro"] = $this->CachedColumns["id_registro"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->entregado->SetText($this->FormParameters["entregado"][$this->RowNumber], $this->RowNumber);
            $this->comentarios->SetText($this->FormParameters["comentarios"][$this->RowNumber], $this->RowNumber);
            $this->id_entregable->SetText($this->FormParameters["id_entregable"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if($this->UpdateAllowed) { $Validation = ($this->UpdateRow() && $Validation); }
            }
            else if($this->CheckInsert() && $this->InsertAllowed)
            {
                $Validation = ($Validation && $this->InsertRow());
            }
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterSubmit", $this);
        if ($this->Errors->Count() == 0 && $Validation){
            $this->DataSource->close();
            return true;
        }
        return false;
    }
//End UpdateGrid Method

//UpdateRow Method @93-4AC9F695
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->entregado->SetValue($this->entregado->GetValue(true));
        $this->DataSource->comentarios->SetValue($this->comentarios->GetValue(true));
        $this->DataSource->Update();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End UpdateRow Method

//FormScript Method @93-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @93-A1D2B0C1
    function SetFormState($FormState)
    {
        if(strlen($FormState)) {
            $FormState = str_replace("\\\\", "\\" . ord("\\"), $FormState);
            $FormState = str_replace("\\;", "\\" . ord(";"), $FormState);
            $pieces = explode(";", $FormState);
            $this->UpdatedRows = $pieces[0];
            $this->EmptyRows   = $pieces[1];
            $this->TotalRows = $this->UpdatedRows + $this->EmptyRows;
            $RowNumber = 0;
            for($i = 2; $i < sizeof($pieces); $i = $i + 1)  {
                $piece = $pieces[$i + 0];
                $piece = str_replace("\\" . ord("\\"), "\\", $piece);
                $piece = str_replace("\\" . ord(";"), ";", $piece);
                $this->CachedColumns["id_registro"][$RowNumber] = $piece;
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $this->CachedColumns["id_registro"][$RowNumber] = "";
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @93-BADC76DD
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["id_registro"][$i]));
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @93-EF9FB058
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->entregado->Prepare();

        $this->DataSource->open();
        $is_next_record = ($this->ReadAllowed && $this->DataSource->next_record());
        $this->IsEmpty = ! $is_next_record;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) { return; }

        $this->Attributes->Show();
        $this->Button_Submit->Visible = $this->Button_Submit->Visible && ($this->InsertAllowed || $this->UpdateAllowed || $this->DeleteAllowed);
        $ParentPath = $Tpl->block_path;
        $EditableGridPath = $ParentPath . "/EditableGrid " . $this->ComponentName;
        $EditableGridRowPath = $ParentPath . "/EditableGrid " . $this->ComponentName . "/Row";
        $Tpl->block_path = $EditableGridRowPath;
        $this->RowNumber = 0;
        $NonEmptyRows = 0;
        $EmptyRowsLeft = $this->EmptyRows;
        $this->ControlsVisible["entregable"] = $this->entregable->Visible;
        $this->ControlsVisible["periodicidad"] = $this->periodicidad->Visible;
        $this->ControlsVisible["proveedor"] = $this->proveedor->Visible;
        $this->ControlsVisible["entregado"] = $this->entregado->Visible;
        $this->ControlsVisible["comentarios"] = $this->comentarios->Visible;
        $this->ControlsVisible["mes"] = $this->mes->Visible;
        $this->ControlsVisible["anio_corte"] = $this->anio_corte->Visible;
        $this->ControlsVisible["id_entregable"] = $this->id_entregable->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->CachedColumns["id_registro"][$this->RowNumber] = $this->DataSource->CachedColumns["id_registro"];
                    $this->entregable->SetValue($this->DataSource->entregable->GetValue());
                    $this->periodicidad->SetValue($this->DataSource->periodicidad->GetValue());
                    $this->proveedor->SetValue($this->DataSource->proveedor->GetValue());
                    $this->entregado->SetValue($this->DataSource->entregado->GetValue());
                    $this->comentarios->SetValue($this->DataSource->comentarios->GetValue());
                    $this->mes->SetValue($this->DataSource->mes->GetValue());
                    $this->anio_corte->SetValue($this->DataSource->anio_corte->GetValue());
                    $this->id_entregable->SetValue($this->DataSource->id_entregable->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->entregable->SetText("");
                    $this->periodicidad->SetText("");
                    $this->proveedor->SetText("");
                    $this->mes->SetText("");
                    $this->anio_corte->SetText("");
                    $this->entregable->SetValue($this->DataSource->entregable->GetValue());
                    $this->periodicidad->SetValue($this->DataSource->periodicidad->GetValue());
                    $this->proveedor->SetValue($this->DataSource->proveedor->GetValue());
                    $this->mes->SetValue($this->DataSource->mes->GetValue());
                    $this->anio_corte->SetValue($this->DataSource->anio_corte->GetValue());
                    $this->entregado->SetText($this->FormParameters["entregado"][$this->RowNumber], $this->RowNumber);
                    $this->comentarios->SetText($this->FormParameters["comentarios"][$this->RowNumber], $this->RowNumber);
                    $this->id_entregable->SetText($this->FormParameters["id_entregable"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->CachedColumns["id_registro"][$this->RowNumber] = "";
                    $this->entregable->SetText("");
                    $this->periodicidad->SetText("");
                    $this->proveedor->SetText("");
                    $this->entregado->SetText("");
                    $this->comentarios->SetText("");
                    $this->mes->SetText("");
                    $this->anio_corte->SetText("");
                    $this->id_entregable->SetText("");
                } else {
                    $this->entregable->SetText("");
                    $this->periodicidad->SetText("");
                    $this->proveedor->SetText("");
                    $this->mes->SetText("");
                    $this->anio_corte->SetText("");
                    $this->entregado->SetText($this->FormParameters["entregado"][$this->RowNumber], $this->RowNumber);
                    $this->comentarios->SetText($this->FormParameters["comentarios"][$this->RowNumber], $this->RowNumber);
                    $this->id_entregable->SetText($this->FormParameters["id_entregable"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->entregable->Show($this->RowNumber);
                $this->periodicidad->Show($this->RowNumber);
                $this->proveedor->Show($this->RowNumber);
                $this->entregado->Show($this->RowNumber);
                $this->comentarios->Show($this->RowNumber);
                $this->mes->Show($this->RowNumber);
                $this->anio_corte->Show($this->RowNumber);
                $this->id_entregable->Show($this->RowNumber);
                if (isset($this->RowsErrors[$this->RowNumber]) && ($this->RowsErrors[$this->RowNumber] != "")) {
                    $Tpl->setblockvar("RowError", "");
                    $Tpl->setvar("Error", $this->RowsErrors[$this->RowNumber]);
                    $this->Attributes->Show();
                    $Tpl->parse("RowError", false);
                } else {
                    $Tpl->setblockvar("RowError", "");
                }
                $Tpl->setvar("FormScript", $this->FormScript($this->RowNumber));
                $Tpl->parse();
                if ($is_next_record) {
                    if ($this->FormSubmitted) {
                        $is_next_record = $this->RowNumber < $this->UpdatedRows;
                        if (($this->DataSource->CachedColumns["id_registro"] == $this->CachedColumns["id_registro"][$this->RowNumber])) {
                            if ($this->ReadAllowed) $this->DataSource->next_record();
                        }
                    }else{
                        $is_next_record = ($this->RowNumber < $this->PageSize) &&  $this->ReadAllowed && $this->DataSource->next_record();
                    }
                } else { 
                    $EmptyRowsLeft--;
                }
            } while($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed));
        } else {
            $Tpl->block_path = $EditableGridPath;
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $Tpl->block_path = $EditableGridPath;
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator->TotalPages <= 1 && $this->Navigator->PageNumber == 1) || $this->Navigator->PageSize == "") {
            $this->Navigator->Visible = false;
        }
        $this->Sorter_proveedor->Show();
        $this->Sorter_entregado->Show();
        $this->Sorter_mes->Show();
        $this->Sorter_anio_corte->Show();
        $this->Navigator->Show();
        $this->Button_Submit->Show();
        $this->Sorter_periodicidad->Show();
        $this->Sorter_entregable->Show();

        if($this->CheckErrors()) {
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        if (!$CCSUseAmp) {
            $Tpl->SetVar("HTMLFormProperties", "method=\"POST\" action=\"" . $this->HTMLFormAction . "\" name=\"" . $this->ComponentName . "\"");
        } else {
            $Tpl->SetVar("HTMLFormProperties", "method=\"post\" action=\"" . str_replace("&", "&amp;", $this->HTMLFormAction) . "\" id=\"" . $this->ComponentName . "\"");
        }
        $Tpl->SetVar("FormState", CCToHTML($this->GetFormState($NonEmptyRows)));
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End GridEntregables Class @93-FCB6E20C

class clsGridEntregablesDataSource extends clsDBcnDisenio {  //GridEntregablesDataSource Class @93-CEFA896A

//DataSource Variables @93-3905E358
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $CountSQL;
    public $wp;
    public $AllParametersSet;

    public $CachedColumns;
    public $CurrentRow;
    public $UpdateFields = array();

    // Datasource fields
    public $entregable;
    public $periodicidad;
    public $proveedor;
    public $entregado;
    public $comentarios;
    public $mes;
    public $anio_corte;
    public $id_entregable;
//End DataSource Variables

//DataSourceClass_Initialize Event @93-5DCBB571
    function clsGridEntregablesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid GridEntregables/Error";
        $this->Initialize();
        $this->entregable = new clsField("entregable", ccsText, "");
        
        $this->periodicidad = new clsField("periodicidad", ccsText, "");
        
        $this->proveedor = new clsField("proveedor", ccsText, "");
        
        $this->entregado = new clsField("entregado", ccsInteger, "");
        
        $this->comentarios = new clsField("comentarios", ccsMemo, "");
        
        $this->mes = new clsField("mes", ccsText, "");
        
        $this->anio_corte = new clsField("anio_corte", ccsInteger, "");
        
        $this->id_entregable = new clsField("id_entregable", ccsInteger, "");
        

        $this->UpdateFields["entregado"] = array("Name" => "entregado", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["comentarios"] = array("Name" => "comentarios", "Value" => "", "DataType" => ccsMemo);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @93-B0255B3D
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_proveedor" => array("proveedor", ""), 
            "Sorter_entregado" => array("entregado", ""), 
            "Sorter_mes" => array("mes", ""), 
            "Sorter_anio_corte" => array("anio_corte", ""), 
            "Sorter_periodicidad" => array("periodicidad", ""), 
            "Sorter_entregable" => array("entregable", "")));
    }
//End SetOrder Method

//Prepare Method @93-F65E0162
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlMesReporte", ccsInteger, "", "", $this->Parameters["urlMesReporte"], 1, false);
        $this->wp->AddParameter("2", "urlanioreporte", ccsInteger, "", "", $this->Parameters["urlanioreporte"], 2015, false);
        $this->wp->AddParameter("3", "urlbusqproveedor", ccsInteger, "", "", $this->Parameters["urlbusqproveedor"], 1, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @93-22D269C0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT e.id_registro, c.id_entregable, c.entregable, c.periodicidad, p.nombre proveedor, e.entregado, e.comentarios, m.mes, e.anio_corte \n" .
        "FROM entregables_periodicos_smda4 e\n" .
        "LEFT JOIN mc_c_entregables_periodicos c ON e.id_entregable=c.id_entregable\n" .
        "LEFT JOIN mc_c_mes m ON m.IdMes = e.mes_corte\n" .
        "LEFT JOIN mc_c_proveedor p ON p.id_proveedor = e.id_proveedor\n" .
        "WHERE e.mes_corte = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and e.anio_corte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " AND e.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ") cnt";
        $this->SQL = "SELECT e.id_registro, c.id_entregable, c.entregable, c.periodicidad, p.nombre proveedor, e.entregado, e.comentarios, m.mes, e.anio_corte \n" .
        "FROM entregables_periodicos_smda4 e\n" .
        "LEFT JOIN mc_c_entregables_periodicos c ON e.id_entregable=c.id_entregable\n" .
        "LEFT JOIN mc_c_mes m ON m.IdMes = e.mes_corte\n" .
        "LEFT JOIN mc_c_proveedor p ON p.id_proveedor = e.id_proveedor\n" .
        "WHERE e.mes_corte = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and e.anio_corte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " AND e.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "";
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

//SetValues Method @93-641DBC2A
    function SetValues()
    {
        $this->CachedColumns["id_registro"] = $this->f("id_registro");
        $this->entregable->SetDBValue($this->f("entregable"));
        $this->periodicidad->SetDBValue($this->f("periodicidad"));
        $this->proveedor->SetDBValue($this->f("proveedor"));
        $this->entregado->SetDBValue(trim($this->f("entregado")));
        $this->comentarios->SetDBValue($this->f("comentarios"));
        $this->mes->SetDBValue($this->f("mes"));
        $this->anio_corte->SetDBValue(trim($this->f("anio_corte")));
        $this->id_entregable->SetDBValue(trim($this->f("id_entregable")));
    }
//End SetValues Method

//Update Method @93-C5D50941
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["entregado"] = new clsSQLParameter("ctrlentregado", ccsInteger, "", "", $this->entregado->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["comentarios"] = new clsSQLParameter("ctrlcomentarios", ccsMemo, "", "", $this->comentarios->GetValue(true), "", false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "dsid_registro", ccsInteger, "", "", $this->CachedColumns["id_registro"], "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["entregado"]->GetValue()) and !strlen($this->cp["entregado"]->GetText()) and !is_bool($this->cp["entregado"]->GetValue())) 
            $this->cp["entregado"]->SetValue($this->entregado->GetValue(true));
        if (!is_null($this->cp["comentarios"]->GetValue()) and !strlen($this->cp["comentarios"]->GetText()) and !is_bool($this->cp["comentarios"]->GetValue())) 
            $this->cp["comentarios"]->SetValue($this->comentarios->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "id_registro", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["entregado"]["Value"] = $this->cp["entregado"]->GetDBValue(true);
        $this->UpdateFields["comentarios"]["Value"] = $this->cp["comentarios"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("entregables_periodicos_smda4", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End GridEntregablesDataSource Class @93-FCB6E20C

class clsRecordGenList { //GenList Class @44-EFD6B9DA

//Variables @44-9E315808

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

//Class_Initialize Event @44-5793993E
    function clsRecordGenList($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record GenList/Error";
        $this->DataSource = new clsGenListDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "GenList";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Generar = new clsButton("Button_Generar", $Method, $this);
            $this->MesGenCorte = new clsControl(ccsListBox, "MesGenCorte", "Mes Reporte", ccsInteger, "", CCGetRequestParam("MesGenCorte", $Method, NULL), $this);
            $this->MesGenCorte->DSType = dsTable;
            $this->MesGenCorte->DataSource = new clsDBcnDisenio();
            $this->MesGenCorte->ds = & $this->MesGenCorte->DataSource;
            $this->MesGenCorte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->MesGenCorte->BoundColumn, $this->MesGenCorte->TextColumn, $this->MesGenCorte->DBFormat) = array("IdMes", "Mes", "");
            $this->AnioGenCorte = new clsControl(ccsListBox, "AnioGenCorte", "Anioreporte", ccsInteger, "", CCGetRequestParam("AnioGenCorte", $Method, NULL), $this);
            $this->AnioGenCorte->DSType = dsTable;
            $this->AnioGenCorte->DataSource = new clsDBcnDisenio();
            $this->AnioGenCorte->ds = & $this->AnioGenCorte->DataSource;
            $this->AnioGenCorte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->AnioGenCorte->BoundColumn, $this->AnioGenCorte->TextColumn, $this->AnioGenCorte->DBFormat) = array("Ano", "Ano", "");
            $this->AnioGenCorte->DataSource->Parameters["expr84"] = 2013;
            $this->AnioGenCorte->DataSource->wp = new clsSQLParameters();
            $this->AnioGenCorte->DataSource->wp->AddParameter("1", "expr84", ccsInteger, "", "", $this->AnioGenCorte->DataSource->Parameters["expr84"], "", false);
            $this->AnioGenCorte->DataSource->wp->Criterion[1] = $this->AnioGenCorte->DataSource->wp->Operation(opGreaterThan, "[Ano]", $this->AnioGenCorte->DataSource->wp->GetDBValue("1"), $this->AnioGenCorte->DataSource->ToSQL($this->AnioGenCorte->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->AnioGenCorte->DataSource->Where = 
                 $this->AnioGenCorte->DataSource->wp->Criterion[1];
            $this->Genproveedor = new clsControl(ccsListBox, "Genproveedor", "Genproveedor", ccsText, "", CCGetRequestParam("Genproveedor", $Method, NULL), $this);
            $this->Genproveedor->DSType = dsTable;
            $this->Genproveedor->DataSource = new clsDBcnDisenio();
            $this->Genproveedor->ds = & $this->Genproveedor->DataSource;
            $this->Genproveedor->DataSource->SQL = "SELECT id_proveedor, nombre \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->Genproveedor->BoundColumn, $this->Genproveedor->TextColumn, $this->Genproveedor->DBFormat) = array("id_proveedor", "nombre", "");
            if(!$this->FormSubmitted) {
                if(!is_array($this->MesGenCorte->Value) && !strlen($this->MesGenCorte->Value) && $this->MesGenCorte->Value !== false)
                    $this->MesGenCorte->SetText(date('m'));
                if(!is_array($this->AnioGenCorte->Value) && !strlen($this->AnioGenCorte->Value) && $this->AnioGenCorte->Value !== false)
                    $this->AnioGenCorte->SetText(2015);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @44-5D060BAC
    function Initialize()
    {

        if(!$this->Visible)
            return;

    }
//End Initialize Method

//Validate Method @44-58689267
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->MesGenCorte->Validate() && $Validation);
        $Validation = ($this->AnioGenCorte->Validate() && $Validation);
        $Validation = ($this->Genproveedor->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->MesGenCorte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AnioGenCorte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Genproveedor->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @44-672D242D
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->MesGenCorte->Errors->Count());
        $errors = ($errors || $this->AnioGenCorte->Errors->Count());
        $errors = ($errors || $this->Genproveedor->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @44-985E3027
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = true;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_Generar";
            if($this->Button_Generar->Pressed) {
                $this->PressedButton = "Button_Generar";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_Generar") {
                if(!CCGetEvent($this->Button_Generar->CCSEvents, "OnClick", $this->Button_Generar) || !$this->InsertRow()) {
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

//InsertRow Method @44-742F8311
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->MesGenCorte->SetValue($this->MesGenCorte->GetValue(true));
        $this->DataSource->AnioGenCorte->SetValue($this->AnioGenCorte->GetValue(true));
        $this->DataSource->Genproveedor->SetValue($this->Genproveedor->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//Show Method @44-2BACFB1E
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

        $this->MesGenCorte->Prepare();
        $this->AnioGenCorte->Prepare();
        $this->Genproveedor->Prepare();

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
                    $this->MesGenCorte->SetValue($this->DataSource->MesGenCorte->GetValue());
                    $this->AnioGenCorte->SetValue($this->DataSource->AnioGenCorte->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->MesGenCorte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AnioGenCorte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Genproveedor->Errors->ToString());
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
        $this->Button_Generar->Visible = !$this->EditMode && $this->InsertAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Generar->Show();
        $this->MesGenCorte->Show();
        $this->AnioGenCorte->Show();
        $this->Genproveedor->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End GenList Class @44-FCB6E20C

class clsGenListDataSource extends clsDBcnDisenio {  //GenListDataSource Class @44-8AA0B6C1

//DataSource Variables @44-D4763F17
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $MesGenCorte;
    public $AnioGenCorte;
    public $Genproveedor;
//End DataSource Variables

//DataSourceClass_Initialize Event @44-7329A197
    function clsGenListDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record GenList/Error";
        $this->Initialize();
        $this->MesGenCorte = new clsField("MesGenCorte", ccsInteger, "");
        
        $this->AnioGenCorte = new clsField("AnioGenCorte", ccsInteger, "");
        
        $this->Genproveedor = new clsField("Genproveedor", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @44-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @44-A849054E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM entregables_periodicos_smda4 {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @44-20734997
    function SetValues()
    {
        $this->MesGenCorte->SetDBValue(trim($this->f("MesReporte")));
        $this->AnioGenCorte->SetDBValue(trim($this->f("anioreporte")));
    }
//End SetValues Method

//Insert Method @44-CE9FB5A7
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["MesGenCorte"] = new clsSQLParameter("ctrlMesGenCorte", ccsInteger, "", "", $this->MesGenCorte->GetValue(true), 1, false, $this->ErrorBlock);
        $this->cp["AnioGenCorte"] = new clsSQLParameter("ctrlAnioGenCorte", ccsInteger, "", "", $this->AnioGenCorte->GetValue(true), 2015, false, $this->ErrorBlock);
        $this->cp["Genproveedor"] = new clsSQLParameter("ctrlGenproveedor", ccsInteger, "", "", $this->Genproveedor->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["MesGenCorte"]->GetValue()) and !strlen($this->cp["MesGenCorte"]->GetText()) and !is_bool($this->cp["MesGenCorte"]->GetValue())) 
            $this->cp["MesGenCorte"]->SetValue($this->MesGenCorte->GetValue(true));
        if (!strlen($this->cp["MesGenCorte"]->GetText()) and !is_bool($this->cp["MesGenCorte"]->GetValue(true))) 
            $this->cp["MesGenCorte"]->SetText(1);
        if (!is_null($this->cp["AnioGenCorte"]->GetValue()) and !strlen($this->cp["AnioGenCorte"]->GetText()) and !is_bool($this->cp["AnioGenCorte"]->GetValue())) 
            $this->cp["AnioGenCorte"]->SetValue($this->AnioGenCorte->GetValue(true));
        if (!strlen($this->cp["AnioGenCorte"]->GetText()) and !is_bool($this->cp["AnioGenCorte"]->GetValue(true))) 
            $this->cp["AnioGenCorte"]->SetText(2015);
        if (!is_null($this->cp["Genproveedor"]->GetValue()) and !strlen($this->cp["Genproveedor"]->GetText()) and !is_bool($this->cp["Genproveedor"]->GetValue())) 
            $this->cp["Genproveedor"]->SetValue($this->Genproveedor->GetValue(true));
        if (!strlen($this->cp["Genproveedor"]->GetText()) and !is_bool($this->cp["Genproveedor"]->GetValue(true))) 
            $this->cp["Genproveedor"]->SetText(0);
        $this->SQL = "INSERT INTO entregables_periodicos_smda4(entregado, comentarios, anio_corte, mes_corte, id_entregable, id_proveedor) \n" .
        "SELECT e.entregado ,NULL, " . $this->SQLValue($this->cp["AnioGenCorte"]->GetDBValue(), ccsInteger) . ", " . $this->SQLValue($this->cp["MesGenCorte"]->GetDBValue(), ccsInteger) . ", c.id_entregable, " . $this->SQLValue($this->cp["Genproveedor"]->GetDBValue(), ccsInteger) . "\n" .
        "FROM mc_c_entregables_periodicos c \n" .
        "LEFT JOIN entregables_periodicos_smda4 e ON e.id_entregable = c.id_entregable\n" .
        "LEFT JOIN mc_c_proveedor p ON p.id_proveedor = e.id_proveedor\n" .
        "WHERE e.mes_corte=(select MAX(mes_corte) from entregables_periodicos_smda4 where id_proveedor=" . $this->SQLValue($this->cp["Genproveedor"]->GetDBValue(), ccsInteger) . ") \n" .
        "AND e.anio_corte =(select MAX(anio_corte) from entregables_periodicos_smda4 where id_proveedor=" . $this->SQLValue($this->cp["Genproveedor"]->GetDBValue(), ccsInteger) . ")\n" .
        "AND e.id_proveedor = " . $this->SQLValue($this->cp["Genproveedor"]->GetDBValue(), ccsInteger) . "\n" .
        "AND (c.proveedor = 'CDS Y CAPC'\n" .
        "OR c.proveedor = p.descripcion)";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

} //End GenListDataSource Class @44-FCB6E20C





//Initialize Page @1-1095CB33
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
$TemplateFileName = "ListadoVerificacionEntregables.html";
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

//Include events file @1-4B18BB6F
include_once("./ListadoVerificacionEntregables_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-3B05BAFC
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$Buscar = new clsRecordBuscar("", $MainPage);
$GridEntregables = new clsEditableGridGridEntregables("", $MainPage);
$lnkexcellista = new clsControl(ccsLink, "lnkexcellista", "lnkexcellista", ccsText, "", CCGetRequestParam("lnkexcellista", ccsGet, NULL), $MainPage);
$lnkexcellista->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lnkexcellista->Page = "EntregablesExcel.php";
$GenList = new clsRecordGenList("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->Buscar = & $Buscar;
$MainPage->GridEntregables = & $GridEntregables;
$MainPage->lnkexcellista = & $lnkexcellista;
$MainPage->GenList = & $GenList;
$GridEntregables->Initialize();
$GenList->Initialize();
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

//Execute Components @1-EB2664BD
$GenList->Operation();
$GridEntregables->Operation();
$Buscar->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-EF864C37
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($Buscar);
    unset($GridEntregables);
    unset($GenList);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-4031E54F
$Header->Show();
$Buscar->Show();
$GridEntregables->Show();
$GenList->Show();
$lnkexcellista->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-F24B9730
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($Buscar);
unset($GridEntregables);
unset($GenList);
unset($Tpl);
//End Unload Page


?>
