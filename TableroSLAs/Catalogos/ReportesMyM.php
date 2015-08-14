<?php
//Include Common Files @1-98A3E134
define("RelativePath", "..");
define("PathToCurrentPage", "/Catalogos/");
define("FileName", "ReportesMyM.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridReportesMyM1 { //ReportesMyM1 class @3-6FDA0716

//Variables @3-BF8CDB0C

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
    public $Sorter_Nombre;
    public $Sorter_Descripcion;
    public $Sorter_NombreRDL;
//End Variables

//Class_Initialize Event @3-FF69447F
    function clsGridReportesMyM1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "ReportesMyM1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid ReportesMyM1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsReportesMyM1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("ReportesMyM1Order", "");
        $this->SorterDirection = CCGetParam("ReportesMyM1Dir", "");

        $this->Nombre = new clsControl(ccsLink, "Nombre", "Nombre", ccsText, "", CCGetRequestParam("Nombre", ccsGet, NULL), $this);
        $this->Nombre->Page = "";
        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", ccsGet, NULL), $this);
        $this->NombreRDL = new clsControl(ccsLink, "NombreRDL", "NombreRDL", ccsText, "", CCGetRequestParam("NombreRDL", ccsGet, NULL), $this);
        $this->NombreRDL->Page = "../MuestraReporte.php";
        $this->ReportesMyM1_Insert = new clsControl(ccsLink, "ReportesMyM1_Insert", "ReportesMyM1_Insert", ccsText, "", CCGetRequestParam("ReportesMyM1_Insert", ccsGet, NULL), $this);
        $this->ReportesMyM1_Insert->Parameters = CCGetQueryString("QueryString", array("IdReporte", "ccsForm"));
        $this->ReportesMyM1_Insert->Page = "ReportesMyM.php";
        $this->ReportesMyM1_TotalRecords = new clsControl(ccsLabel, "ReportesMyM1_TotalRecords", "ReportesMyM1_TotalRecords", ccsText, "", CCGetRequestParam("ReportesMyM1_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_Nombre = new clsSorter($this->ComponentName, "Sorter_Nombre", $FileName, $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_NombreRDL = new clsSorter($this->ComponentName, "Sorter_NombreRDL", $FileName, $this);
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

//Show Method @3-4C6D4A9E
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_Nombre"] = CCGetFromGet("s_Nombre", NULL);
        $this->DataSource->Parameters["urls_NombreRDL"] = CCGetFromGet("s_NombreRDL", NULL);

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
            $this->ControlsVisible["Nombre"] = $this->Nombre->Visible;
            $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
            $this->ControlsVisible["NombreRDL"] = $this->NombreRDL->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                $this->Nombre->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Nombre->Parameters = CCAddParam($this->Nombre->Parameters, "IdReporte", $this->DataSource->f("IdReporte"));
                $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                $this->NombreRDL->SetValue($this->DataSource->NombreRDL->GetValue());
                $this->NombreRDL->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->NombreRDL->Parameters = CCAddParam($this->NombreRDL->Parameters, "IdReporte", $this->DataSource->f("IdReporte"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Nombre->Show();
                $this->Descripcion->Show();
                $this->NombreRDL->Show();
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
        $this->ReportesMyM1_Insert->Show();
        $this->ReportesMyM1_TotalRecords->Show();
        $this->Sorter_Nombre->Show();
        $this->Sorter_Descripcion->Show();
        $this->Sorter_NombreRDL->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-C38C25C1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NombreRDL->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End ReportesMyM1 Class @3-FCB6E20C

class clsReportesMyM1DataSource extends clsDBcnDisenio {  //ReportesMyM1DataSource Class @3-1FE93D7B

//DataSource Variables @3-900FA835
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Nombre;
    public $Descripcion;
    public $NombreRDL;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-52E11A66
    function clsReportesMyM1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid ReportesMyM1";
        $this->Initialize();
        $this->Nombre = new clsField("Nombre", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->NombreRDL = new clsField("NombreRDL", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-337803A8
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Nombre" => array("Nombre", ""), 
            "Sorter_Descripcion" => array("Descripcion", ""), 
            "Sorter_NombreRDL" => array("NombreRDL", "")));
    }
//End SetOrder Method

//Prepare Method @3-D8613901
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_Nombre", ccsText, "", "", $this->Parameters["urls_Nombre"], "", false);
        $this->wp->AddParameter("2", "urls_NombreRDL", ccsText, "", "", $this->Parameters["urls_NombreRDL"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "[Nombre]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "[NombreRDL]", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @3-464FA13D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM ReportesMyM";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} IdReporte, Nombre, Descripcion, NombreRDL \n\n" .
        "FROM ReportesMyM {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @3-8C577E4D
    function SetValues()
    {
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->NombreRDL->SetDBValue($this->f("NombreRDL"));
    }
//End SetValues Method

} //End ReportesMyM1DataSource Class @3-FCB6E20C

class clsRecordReportesMyMSearch { //ReportesMyMSearch Class @22-1CF9019E

//Variables @22-9E315808

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

//Class_Initialize Event @22-2F7EDF40
    function clsRecordReportesMyMSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record ReportesMyMSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "ReportesMyMSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_Nombre = new clsControl(ccsTextBox, "s_Nombre", "Nombre", ccsText, "", CCGetRequestParam("s_Nombre", $Method, NULL), $this);
            $this->s_NombreRDL = new clsControl(ccsTextBox, "s_NombreRDL", "Nombre RDL", ccsText, "", CCGetRequestParam("s_NombreRDL", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @22-F3AB5CA0
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_Nombre->Validate() && $Validation);
        $Validation = ($this->s_NombreRDL->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_Nombre->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_NombreRDL->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @22-27FEF248
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_Nombre->Errors->Count());
        $errors = ($errors || $this->s_NombreRDL->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @22-CCF3E05E
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
        $Redirect = "ReportesMyM.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "ReportesMyM.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @22-5DDF928E
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


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_Nombre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_NombreRDL->Errors->ToString());
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
        $this->s_Nombre->Show();
        $this->s_NombreRDL->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End ReportesMyMSearch Class @22-FCB6E20C

class clsRecordReportesMyM2 { //ReportesMyM2 Class @26-29262499

//Variables @26-9E315808

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

//Class_Initialize Event @26-1EF3B439
    function clsRecordReportesMyM2($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record ReportesMyM2/Error";
        $this->DataSource = new clsReportesMyM2DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "ReportesMyM2";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Nombre = new clsControl(ccsTextBox, "Nombre", "Nombre", ccsText, "", CCGetRequestParam("Nombre", $Method, NULL), $this);
            $this->Descripcion = new clsControl(ccsTextBox, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", $Method, NULL), $this);
            $this->grupo = new clsControl(ccsTextBox, "grupo", "grupo", ccsText, "", CCGetRequestParam("grupo", $Method, NULL), $this);
            $this->NombreRDL = new clsControl(ccsTextBox, "NombreRDL", "Nombre RDL", ccsText, "", CCGetRequestParam("NombreRDL", $Method, NULL), $this);
            $this->CheckBox1 = new clsControl(ccsCheckBox, "CheckBox1", "CheckBox1", ccsInteger, "", CCGetRequestParam("CheckBox1", $Method, NULL), $this);
            $this->CheckBox1->CheckedValue = $this->CheckBox1->GetParsedValue(1);
            $this->CheckBox1->UncheckedValue = $this->CheckBox1->GetParsedValue(0);
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->CheckBox1->Value) && !strlen($this->CheckBox1->Value) && $this->CheckBox1->Value !== false)
                    $this->CheckBox1->SetValue(true);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @26-E7255FC1
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlIdReporte"] = CCGetFromGet("IdReporte", NULL);
    }
//End Initialize Method

//Validate Method @26-1E57D48A
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Nombre->Validate() && $Validation);
        $Validation = ($this->Descripcion->Validate() && $Validation);
        $Validation = ($this->grupo->Validate() && $Validation);
        $Validation = ($this->NombreRDL->Validate() && $Validation);
        $Validation = ($this->CheckBox1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Nombre->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Descripcion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->grupo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NombreRDL->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CheckBox1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @26-F9B020AA
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Nombre->Errors->Count());
        $errors = ($errors || $this->Descripcion->Errors->Count());
        $errors = ($errors || $this->grupo->Errors->Count());
        $errors = ($errors || $this->NombreRDL->Errors->Count());
        $errors = ($errors || $this->CheckBox1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @26-0BF2B389
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
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
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

//InsertRow Method @26-DEA3A523
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Nombre->SetValue($this->Nombre->GetValue(true));
        $this->DataSource->Descripcion->SetValue($this->Descripcion->GetValue(true));
        $this->DataSource->grupo->SetValue($this->grupo->GetValue(true));
        $this->DataSource->NombreRDL->SetValue($this->NombreRDL->GetValue(true));
        $this->DataSource->CheckBox1->SetValue($this->CheckBox1->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @26-947753B6
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Nombre->SetValue($this->Nombre->GetValue(true));
        $this->DataSource->Descripcion->SetValue($this->Descripcion->GetValue(true));
        $this->DataSource->grupo->SetValue($this->grupo->GetValue(true));
        $this->DataSource->NombreRDL->SetValue($this->NombreRDL->GetValue(true));
        $this->DataSource->CheckBox1->SetValue($this->CheckBox1->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @26-15AF1A7D
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
                    $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->grupo->SetValue($this->DataSource->grupo->GetValue());
                    $this->NombreRDL->SetValue($this->DataSource->NombreRDL->GetValue());
                    $this->CheckBox1->SetValue($this->DataSource->CheckBox1->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Nombre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Descripcion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->grupo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NombreRDL->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CheckBox1->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Nombre->Show();
        $this->Descripcion->Show();
        $this->grupo->Show();
        $this->NombreRDL->Show();
        $this->CheckBox1->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Cancel->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End ReportesMyM2 Class @26-FCB6E20C

class clsReportesMyM2DataSource extends clsDBcnDisenio {  //ReportesMyM2DataSource Class @26-44FE8C6E

//DataSource Variables @26-18924E51
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $Nombre;
    public $Descripcion;
    public $grupo;
    public $NombreRDL;
    public $CheckBox1;
//End DataSource Variables

//DataSourceClass_Initialize Event @26-5FD4E7E7
    function clsReportesMyM2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record ReportesMyM2/Error";
        $this->Initialize();
        $this->Nombre = new clsField("Nombre", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->grupo = new clsField("grupo", ccsText, "");
        
        $this->NombreRDL = new clsField("NombreRDL", ccsText, "");
        
        $this->CheckBox1 = new clsField("CheckBox1", ccsInteger, "");
        

        $this->InsertFields["Nombre"] = array("Name" => "[Nombre]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Grupo"] = array("Name" => "[Grupo]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NombreRDL"] = array("Name" => "[NombreRDL]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["activo"] = array("Name" => "activo", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["Nombre"] = array("Name" => "[Nombre]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Grupo"] = array("Name" => "[Grupo]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NombreRDL"] = array("Name" => "[NombreRDL]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["activo"] = array("Name" => "activo", "Value" => "", "DataType" => ccsInteger);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @26-0A36280E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlIdReporte", ccsInteger, "", "", $this->Parameters["urlIdReporte"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[IdReporte]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @26-C96FAACC
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM ReportesMyM {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @26-4EC09A61
    function SetValues()
    {
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->grupo->SetDBValue($this->f("Grupo"));
        $this->NombreRDL->SetDBValue($this->f("NombreRDL"));
        $this->CheckBox1->SetDBValue(trim($this->f("activo")));
    }
//End SetValues Method

//Insert Method @26-7B45169B
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Nombre"]["Value"] = $this->Nombre->GetDBValue(true);
        $this->InsertFields["Descripcion"]["Value"] = $this->Descripcion->GetDBValue(true);
        $this->InsertFields["Grupo"]["Value"] = $this->grupo->GetDBValue(true);
        $this->InsertFields["NombreRDL"]["Value"] = $this->NombreRDL->GetDBValue(true);
        $this->InsertFields["activo"]["Value"] = $this->CheckBox1->GetDBValue(true);
        $this->SQL = CCBuildInsert("ReportesMyM", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @26-568EC826
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Nombre"]["Value"] = $this->Nombre->GetDBValue(true);
        $this->UpdateFields["Descripcion"]["Value"] = $this->Descripcion->GetDBValue(true);
        $this->UpdateFields["Grupo"]["Value"] = $this->grupo->GetDBValue(true);
        $this->UpdateFields["NombreRDL"]["Value"] = $this->NombreRDL->GetDBValue(true);
        $this->UpdateFields["activo"]["Value"] = $this->CheckBox1->GetDBValue(true);
        $this->SQL = CCBuildUpdate("ReportesMyM", $this->UpdateFields, $this);
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

} //End ReportesMyM2DataSource Class @26-FCB6E20C

//Include Page implementation @35-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

//Initialize Page @1-B72FAA18
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
$TemplateFileName = "ReportesMyM.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-872FD3D7
CCSecurityRedirect("", "");
//End Authenticate User

//Include events file @1-14D5B0F3
include_once("./ReportesMyM_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-EA30AE29
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$ReportesMyM1 = new clsGridReportesMyM1("", $MainPage);
$ReportesMyMSearch = new clsRecordReportesMyMSearch("", $MainPage);
$ReportesMyM2 = new clsRecordReportesMyM2("", $MainPage);
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$MainPage->ReportesMyM1 = & $ReportesMyM1;
$MainPage->ReportesMyMSearch = & $ReportesMyMSearch;
$MainPage->ReportesMyM2 = & $ReportesMyM2;
$MainPage->Header = & $Header;
$ReportesMyM1->Initialize();
$ReportesMyM2->Initialize();
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

//Initialize HTML Template @1-7D7DF5BA
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
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-94D70332
$Header->Operations();
$ReportesMyM2->Operation();
$ReportesMyMSearch->Operation();
//End Execute Components

//Go to destination page @1-D55DF745
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($ReportesMyM1);
    unset($ReportesMyMSearch);
    unset($ReportesMyM2);
    $Header->Class_Terminate();
    unset($Header);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-F74AB783
$ReportesMyM1->Show();
$ReportesMyMSearch->Show();
$ReportesMyM2->Show();
$Header->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-D115EEDE
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($ReportesMyM1);
unset($ReportesMyMSearch);
unset($ReportesMyM2);
$Header->Class_Terminate();
unset($Header);
unset($Tpl);
//End Unload Page


?>
