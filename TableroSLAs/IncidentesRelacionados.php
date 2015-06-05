<?php
//Include Common Files @1-E12F9CCA
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "IncidentesRelacionados.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_universo_cds { //mc_universo_cds Class @20-D3187B14

//Variables @20-9E315808

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

//Class_Initialize Event @20-41564AEA
    function clsRecordmc_universo_cds($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_universo_cds/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_universo_cds";
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
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_mes->Value) && !strlen($this->s_mes->Value) && $this->s_mes->Value !== false)
                    $this->s_mes->SetText(CCGetParam("s_mes"));
                if(!is_array($this->s_anio->Value) && !strlen($this->s_anio->Value) && $this->s_anio->Value !== false)
                    $this->s_anio->SetText(CCGetParam("s_anio"));
            }
        }
    }
//End Class_Initialize Event

//Validate Method @20-CB0467D1
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_numero->Validate() && $Validation);
        $Validation = ($this->s_mes->Validate() && $Validation);
        $Validation = ($this->s_anio->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_numero->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_anio->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @20-063C20CB
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_numero->Errors->Count());
        $errors = ($errors || $this->s_mes->Errors->Count());
        $errors = ($errors || $this->s_anio->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @20-DD94EE4C
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

//Show Method @20-8987E4C3
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

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_numero->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_anio->Errors->ToString());
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
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_universo_cds Class @20-FCB6E20C

class clsEditableGridEditableGrid1 { //EditableGrid1 Class @3-6C37505C

//Variables @3-2F42A3C6

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
    public $Sorter_id_incidente;
    public $Sorter_paquete;
    public $Sorter_FechaCarga;
//End Variables

//Class_Initialize Event @3-FDC3AC0F
    function clsEditableGridEditableGrid1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid EditableGrid1/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "EditableGrid1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsEditableGrid1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 25;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: EditableGrid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->EmptyRows = 0;
        $this->DeleteAllowed = true;
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

        $this->SorterName = CCGetParam("EditableGrid1Order", "");
        $this->SorterDirection = CCGetParam("EditableGrid1Dir", "");

        $this->Sorter_id_incidente = new clsSorter($this->ComponentName, "Sorter_id_incidente", $FileName, $this);
        $this->Sorter_paquete = new clsSorter($this->ComponentName, "Sorter_paquete", $FileName, $this);
        $this->Sorter_FechaCarga = new clsSorter($this->ComponentName, "Sorter_FechaCarga", $FileName, $this);
        $this->id_incidente = new clsControl(ccsLabel, "id_incidente", "id_incidente", ccsText, "", NULL, $this);
        $this->paquete = new clsControl(ccsLabel, "paquete", "paquete", ccsText, "", NULL, $this);
        $this->FechaCarga = new clsControl(ccsLabel, "FechaCarga", "FechaCarga", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn"), NULL, $this);
        $this->CheckBox_Delete_Panel = new clsPanel("CheckBox_Delete_Panel", $this);
        $this->CheckBox_Delete = new clsControl(ccsCheckBox, "CheckBox_Delete", "CheckBox_Delete", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->CheckBox_Delete->CheckedValue = true;
        $this->CheckBox_Delete->UncheckedValue = false;
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->hdIdIncidente = new clsControl(ccsHidden, "hdIdIncidente", "hdIdIncidente", ccsText, "", NULL, $this);
        $this->hdPaquete = new clsControl(ccsHidden, "hdPaquete", "hdPaquete", ccsText, "", NULL, $this);
        $this->CheckBox_Delete_Panel->AddComponent("CheckBox_Delete", $this->CheckBox_Delete);
    }
//End Class_Initialize Event

//Initialize Method @3-5F06E401
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urls_mes"] = CCGetFromGet("s_mes", NULL);
        $this->DataSource->Parameters["urls_anio"] = CCGetFromGet("s_anio", NULL);
        $this->DataSource->Parameters["urls_numero"] = CCGetFromGet("s_numero", NULL);
    }
//End Initialize Method

//GetFormParameters Method @3-497412FC
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["CheckBox_Delete"][$RowNumber] = CCGetFromPost("CheckBox_Delete_" . $RowNumber, NULL);
            $this->FormParameters["hdIdIncidente"][$RowNumber] = CCGetFromPost("hdIdIncidente_" . $RowNumber, NULL);
            $this->FormParameters["hdPaquete"][$RowNumber] = CCGetFromPost("hdPaquete_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @3-6A977E2B
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
            $this->hdIdIncidente->SetText($this->FormParameters["hdIdIncidente"][$this->RowNumber], $this->RowNumber);
            $this->hdPaquete->SetText($this->FormParameters["hdPaquete"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if(!$this->CheckBox_Delete->Value)
                    $Validation = ($this->ValidateRow() && $Validation);
            }
            else if($this->CheckInsert())
            {
                $Validation = ($this->ValidateRow() && $Validation);
            }
        }
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//ValidateRow Method @3-51FA83FD
    function ValidateRow()
    {
        global $CCSLocales;
        $this->CheckBox_Delete->Validate();
        $this->hdIdIncidente->Validate();
        $this->hdPaquete->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->CheckBox_Delete->Errors->ToString());
        $errors = ComposeStrings($errors, $this->hdIdIncidente->Errors->ToString());
        $errors = ComposeStrings($errors, $this->hdPaquete->Errors->ToString());
        $this->CheckBox_Delete->Errors->Clear();
        $this->hdIdIncidente->Errors->Clear();
        $this->hdPaquete->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @3-40766A17
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["hdIdIncidente"][$this->RowNumber]) && count($this->FormParameters["hdIdIncidente"][$this->RowNumber])) || strlen($this->FormParameters["hdIdIncidente"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["hdPaquete"][$this->RowNumber]) && count($this->FormParameters["hdPaquete"][$this->RowNumber])) || strlen($this->FormParameters["hdPaquete"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @3-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-909F269B
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

//UpdateGrid Method @3-7BB37E4B
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
            $this->hdIdIncidente->SetText($this->FormParameters["hdIdIncidente"][$this->RowNumber], $this->RowNumber);
            $this->hdPaquete->SetText($this->FormParameters["hdPaquete"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if($this->CheckBox_Delete->Value) {
                    if($this->DeleteAllowed) { $Validation = ($this->DeleteRow() && $Validation); }
                } else if($this->UpdateAllowed) {
                    $Validation = ($this->UpdateRow() && $Validation);
                }
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

//DeleteRow Method @3-BC2A586F
    function DeleteRow()
    {
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->CheckBox_Delete->SetValue($this->CheckBox_Delete->GetValue());
        $this->DataSource->hdIdIncidente->SetValue($this->hdIdIncidente->GetValue());
        $this->DataSource->Delete();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End DeleteRow Method

//FormScript Method @3-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @3-69E01441
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
            for($i = 2; $i < sizeof($pieces); $i = $i + 0)  {
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @3-BF9CEBD0
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @3-CDC3E55A
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


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
        $this->ControlsVisible["id_incidente"] = $this->id_incidente->Visible;
        $this->ControlsVisible["paquete"] = $this->paquete->Visible;
        $this->ControlsVisible["FechaCarga"] = $this->FechaCarga->Visible;
        $this->ControlsVisible["CheckBox_Delete_Panel"] = $this->CheckBox_Delete_Panel->Visible;
        $this->ControlsVisible["CheckBox_Delete"] = $this->CheckBox_Delete->Visible;
        $this->ControlsVisible["hdIdIncidente"] = $this->hdIdIncidente->Visible;
        $this->ControlsVisible["hdPaquete"] = $this->hdPaquete->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($is_next_record) || !($this->DeleteAllowed)) {
                    $this->CheckBox_Delete->Visible = false;
                    $this->CheckBox_Delete_Panel->Visible = false;
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->CheckBox_Delete->SetValue(false);
                    $this->hdIdIncidente->SetText("");
                    $this->hdPaquete->SetText("");
                    $this->id_incidente->SetValue($this->DataSource->id_incidente->GetValue());
                    $this->paquete->SetValue($this->DataSource->paquete->GetValue());
                    $this->FechaCarga->SetValue($this->DataSource->FechaCarga->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->id_incidente->SetText("");
                    $this->paquete->SetText("");
                    $this->FechaCarga->SetText("");
                    $this->id_incidente->SetValue($this->DataSource->id_incidente->GetValue());
                    $this->paquete->SetValue($this->DataSource->paquete->GetValue());
                    $this->FechaCarga->SetValue($this->DataSource->FechaCarga->GetValue());
                    $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
                    $this->hdIdIncidente->SetText($this->FormParameters["hdIdIncidente"][$this->RowNumber], $this->RowNumber);
                    $this->hdPaquete->SetText($this->FormParameters["hdPaquete"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->id_incidente->SetText("");
                    $this->paquete->SetText("");
                    $this->FechaCarga->SetText("");
                    $this->hdIdIncidente->SetText("");
                    $this->hdPaquete->SetText("");
                } else {
                    $this->id_incidente->SetText("");
                    $this->paquete->SetText("");
                    $this->FechaCarga->SetText("");
                    $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
                    $this->hdIdIncidente->SetText($this->FormParameters["hdIdIncidente"][$this->RowNumber], $this->RowNumber);
                    $this->hdPaquete->SetText($this->FormParameters["hdPaquete"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id_incidente->Show($this->RowNumber);
                $this->paquete->Show($this->RowNumber);
                $this->FechaCarga->Show($this->RowNumber);
                $this->CheckBox_Delete_Panel->Show($this->RowNumber);
                $this->hdIdIncidente->Show($this->RowNumber);
                $this->hdPaquete->Show($this->RowNumber);
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
                        $is_next_record =  $this->ReadAllowed && $this->DataSource->next_record() && $this->RowNumber < $this->UpdatedRows;
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
        $this->Sorter_id_incidente->Show();
        $this->Sorter_paquete->Show();
        $this->Sorter_FechaCarga->Show();
        $this->Navigator->Show();
        $this->Button_Submit->Show();

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

} //End EditableGrid1 Class @3-FCB6E20C

class clsEditableGrid1DataSource extends clsDBcnDisenio {  //EditableGrid1DataSource Class @3-B35CAD29

//DataSource Variables @3-7365F0BC
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $DeleteParameters;
    public $CountSQL;
    public $wp;
    public $AllParametersSet;

    public $CurrentRow;

    // Datasource fields
    public $id_incidente;
    public $paquete;
    public $FechaCarga;
    public $CheckBox_Delete;
    public $hdIdIncidente;
    public $hdPaquete;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-A75AA261
    function clsEditableGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid EditableGrid1/Error";
        $this->Initialize();
        $this->id_incidente = new clsField("id_incidente", ccsText, "");
        
        $this->paquete = new clsField("paquete", ccsText, "");
        
        $this->FechaCarga = new clsField("FechaCarga", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->CheckBox_Delete = new clsField("CheckBox_Delete", ccsBoolean, $this->BooleanFormat);
        
        $this->hdIdIncidente = new clsField("hdIdIncidente", ccsText, "");
        
        $this->hdPaquete = new clsField("hdPaquete", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-25625A93
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "2,3";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_id_incidente" => array("id_incidente", ""), 
            "Sorter_paquete" => array("paquete", ""), 
            "Sorter_FechaCarga" => array("FechaAsignado", "")));
    }
//End SetOrder Method

//Prepare Method @3-23779D13
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_mes", ccsInteger, "", "", $this->Parameters["urls_mes"], 0, false);
        $this->wp->AddParameter("2", "urls_anio", ccsInteger, "", "", $this->Parameters["urls_anio"], date('Y'), false);
        $this->wp->AddParameter("3", "urls_numero", ccsText, "", "", $this->Parameters["urls_numero"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @3-F4AFFE88
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (\n" .
        "select distinct d.id_incidente, paquete, FechaAsignado , u.id_proveedor\n" .
        "from mc_detalle_incidente_avl d\n" .
        "	inner join mc_universo_cds u on  u.numero = d.id_incidente\n" .
        "	and month(d.FechaCarga )= u.mes  and YEAR(d.FechaCarga) = u.anio \n" .
        "	inner join mc_info_incidentes i on i.id_incidente = u.numero \n" .
        "	and month(i.FechaCarga )= u.mes  and YEAR(i.FechaCarga) = u.anio \n" .
        "where mes= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and tipo='IN'\n" .
        "and Paquete in (\n" .
        "	select Paquete\n" .
        "	from mc_detalle_incidente_avl \n" .
        "		inner join mc_universo_cds u on u.mes = MONTH(FechaCarga) and u.anio = YEAR(FechaCarga) and u.numero = Id_Incidente \n" .
        "	where month(FechaCarga )= u.mes  and YEAR(FechaCarga) = u.anio \n" .
        "	group by Paquete \n" .
        "	having count(distinct id_incidente) >1\n" .
        ") \n" .
        "and d.Id_Incidente not in (select inc_principal from mc_incidentes_relacionados )\n" .
        "and (paquete = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' or ''='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "')) cnt";
        $this->SQL = "\n" .
        "select distinct TOP {SqlParam_endRecord} d.id_incidente, paquete, FechaAsignado , u.id_proveedor\n" .
        "from mc_detalle_incidente_avl d\n" .
        "	inner join mc_universo_cds u on  u.numero = d.id_incidente\n" .
        "	and month(d.FechaCarga )= u.mes  and YEAR(d.FechaCarga) = u.anio \n" .
        "	inner join mc_info_incidentes i on i.id_incidente = u.numero \n" .
        "	and month(i.FechaCarga )= u.mes  and YEAR(i.FechaCarga) = u.anio \n" .
        "where mes= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and tipo='IN'\n" .
        "and Paquete in (\n" .
        "	select Paquete\n" .
        "	from mc_detalle_incidente_avl \n" .
        "		inner join mc_universo_cds u on u.mes = MONTH(FechaCarga) and u.anio = YEAR(FechaCarga) and u.numero = Id_Incidente \n" .
        "	where month(FechaCarga )= u.mes  and YEAR(FechaCarga) = u.anio \n" .
        "	group by Paquete \n" .
        "	having count(distinct id_incidente) >1\n" .
        ") \n" .
        "and d.Id_Incidente not in (select inc_principal from mc_incidentes_relacionados )\n" .
        "and (paquete = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' or ''='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "') {SQL_OrderBy}";
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

//SetValues Method @3-EE837002
    function SetValues()
    {
        $this->id_incidente->SetDBValue($this->f("id_incidente"));
        $this->paquete->SetDBValue($this->f("paquete"));
        $this->FechaCarga->SetDBValue(trim($this->f("FechaAsignado")));
    }
//End SetValues Method

//Delete Method @3-1D803EA8
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["CheckBox_Delete"] = new clsSQLParameter("ctrlCheckBox_Delete", ccsText, "", "", $this->CheckBox_Delete->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["hdIdIncidente"] = new clsSQLParameter("ctrlhdIdIncidente", ccsText, "", "", $this->hdIdIncidente->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["CheckBox_Delete"]->GetValue()) and !strlen($this->cp["CheckBox_Delete"]->GetText()) and !is_bool($this->cp["CheckBox_Delete"]->GetValue())) 
            $this->cp["CheckBox_Delete"]->SetValue($this->CheckBox_Delete->GetValue(true));
        if (!is_null($this->cp["hdIdIncidente"]->GetValue()) and !strlen($this->cp["hdIdIncidente"]->GetText()) and !is_bool($this->cp["hdIdIncidente"]->GetValue())) 
            $this->cp["hdIdIncidente"]->SetValue($this->hdIdIncidente->GetValue(true));
        $this->SQL = "select 1";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End EditableGrid1DataSource Class @3-FCB6E20C

class clsGridGrid1 { //Grid1 class @29-E857A572

//Variables @29-D46377A7

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
    public $Sorter_Id;
    public $Sorter_Inc_Principal;
    public $Sorter_Paquete;
    public $Sorter_Inc_Secundario;
//End Variables

//Class_Initialize Event @29-5AD4A82F
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
            $this->PageSize = 25;
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

        $this->Id = new clsControl(ccsLabel, "Id", "Id", ccsInteger, "", CCGetRequestParam("Id", ccsGet, NULL), $this);
        $this->Inc_Principal = new clsControl(ccsLabel, "Inc_Principal", "Inc_Principal", ccsText, "", CCGetRequestParam("Inc_Principal", ccsGet, NULL), $this);
        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", CCGetRequestParam("Paquete", ccsGet, NULL), $this);
        $this->Inc_Secundario = new clsControl(ccsLabel, "Inc_Secundario", "Inc_Secundario", ccsText, "", CCGetRequestParam("Inc_Secundario", ccsGet, NULL), $this);
        $this->Sorter_Id = new clsSorter($this->ComponentName, "Sorter_Id", $FileName, $this);
        $this->Sorter_Inc_Principal = new clsSorter($this->ComponentName, "Sorter_Inc_Principal", $FileName, $this);
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
        $this->Sorter_Inc_Secundario = new clsSorter($this->ComponentName, "Sorter_Inc_Secundario", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @29-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @29-2CC2093C
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_mes"] = CCGetFromGet("s_mes", NULL);
        $this->DataSource->Parameters["urls_anio"] = CCGetFromGet("s_anio", NULL);

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
            $this->ControlsVisible["Id"] = $this->Id->Visible;
            $this->ControlsVisible["Inc_Principal"] = $this->Inc_Principal->Visible;
            $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
            $this->ControlsVisible["Inc_Secundario"] = $this->Inc_Secundario->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Id->SetValue($this->DataSource->Id->GetValue());
                $this->Inc_Principal->SetValue($this->DataSource->Inc_Principal->GetValue());
                $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                $this->Inc_Secundario->SetValue($this->DataSource->Inc_Secundario->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id->Show();
                $this->Inc_Principal->Show();
                $this->Paquete->Show();
                $this->Inc_Secundario->Show();
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
        $this->Sorter_Id->Show();
        $this->Sorter_Inc_Principal->Show();
        $this->Sorter_Paquete->Show();
        $this->Sorter_Inc_Secundario->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @29-8B550523
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Inc_Principal->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Paquete->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Inc_Secundario->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @29-FCB6E20C

class clsGrid1DataSource extends clsDBcnDisenio {  //Grid1DataSource Class @29-9B337F8E

//DataSource Variables @29-824D7097
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Id;
    public $Inc_Principal;
    public $Paquete;
    public $Inc_Secundario;
//End DataSource Variables

//DataSourceClass_Initialize Event @29-316509E3
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->Inc_Principal = new clsField("Inc_Principal", ccsText, "");
        
        $this->Paquete = new clsField("Paquete", ccsText, "");
        
        $this->Inc_Secundario = new clsField("Inc_Secundario", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @29-BE213B2A
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Id" => array("Id", ""), 
            "Sorter_Inc_Principal" => array("Inc_Principal", ""), 
            "Sorter_Paquete" => array("Paquete", ""), 
            "Sorter_Inc_Secundario" => array("Inc_Secundario", "")));
    }
//End SetOrder Method

//Prepare Method @29-F7773BD2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_mes", ccsInteger, "", "", $this->Parameters["urls_mes"], 0, false);
        $this->wp->AddParameter("2", "urls_anio", ccsInteger, "", "", $this->Parameters["urls_anio"], 0, false);
    }
//End Prepare Method

//Open Method @29-CCA81A3E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select i.* \n" .
        "from mc_universo_cds u \n" .
        "	inner join mc_incidentes_relacionados i on i.inc_principal = u.numero \n" .
        "where u.mes= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and u.anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "      ) cnt";
        $this->SQL = "select i.* \n" .
        "from mc_universo_cds u \n" .
        "	inner join mc_incidentes_relacionados i on i.inc_principal = u.numero \n" .
        "where u.mes= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and u.anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "      ";
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

//SetValues Method @29-1EF18D10
    function SetValues()
    {
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->Inc_Principal->SetDBValue($this->f("Inc_Principal"));
        $this->Paquete->SetDBValue($this->f("Paquete"));
        $this->Inc_Secundario->SetDBValue($this->f("Inc_Secundario"));
    }
//End SetValues Method

} //End Grid1DataSource Class @29-FCB6E20C





//Initialize Page @1-185DA9AC
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
$TemplateFileName = "IncidentesRelacionados.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-54EC737A
include_once("./IncidentesRelacionados_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-73B311A4
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_universo_cds = new clsRecordmc_universo_cds("", $MainPage);
$EditableGrid1 = new clsEditableGridEditableGrid1("", $MainPage);
$Grid1 = new clsGridGrid1("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_universo_cds = & $mc_universo_cds;
$MainPage->EditableGrid1 = & $EditableGrid1;
$MainPage->Grid1 = & $Grid1;
$EditableGrid1->Initialize();
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

//Execute Components @1-6033CE5C
$EditableGrid1->Operation();
$mc_universo_cds->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-6CB9A802
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_universo_cds);
    unset($EditableGrid1);
    unset($Grid1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-F7249E04
$Header->Show();
$mc_universo_cds->Show();
$EditableGrid1->Show();
$Grid1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-8D8DCE82
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_universo_cds);
unset($EditableGrid1);
unset($Grid1);
unset($Tpl);
//End Unload Page


?>
