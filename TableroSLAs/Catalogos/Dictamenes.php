<?php
//Include Common Files @1-14C68FC2
define("RelativePath", "..");
define("PathToCurrentPage", "/Catalogos/");
define("FileName", "Dictamenes.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsGridmc_c_dictamenes { //mc_c_dictamenes class @3-E2E94E4B

//Variables @3-827D2A18

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
    public $Sorter_Codigo;
    public $Sorter_Descripcion;
    public $Sorter_Uso;
    public $Sorter_SeMideSLA;
    public $Sorter_TipoSLA;
    public $Sorter_FugadoProduccion;
    public $Sorter_Comentarios;
//End Variables

//Class_Initialize Event @3-71FEB9F6
    function clsGridmc_c_dictamenes($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_c_dictamenes";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_c_dictamenes";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_c_dictamenesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 15;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("mc_c_dictamenesOrder", "");
        $this->SorterDirection = CCGetParam("mc_c_dictamenesDir", "");

        $this->Id = new clsControl(ccsLink, "Id", "Id", ccsInteger, "", CCGetRequestParam("Id", ccsGet, NULL), $this);
        $this->Id->Page = "";
        $this->Codigo = new clsControl(ccsLabel, "Codigo", "Codigo", ccsText, "", CCGetRequestParam("Codigo", ccsGet, NULL), $this);
        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", ccsGet, NULL), $this);
        $this->Uso = new clsControl(ccsLabel, "Uso", "Uso", ccsText, "", CCGetRequestParam("Uso", ccsGet, NULL), $this);
        $this->Comentarios = new clsControl(ccsLabel, "Comentarios", "Comentarios", ccsText, "", CCGetRequestParam("Comentarios", ccsGet, NULL), $this);
        $this->SeMideSLA = new clsControl(ccsLabel, "SeMideSLA", "SeMideSLA", ccsInteger, "", CCGetRequestParam("SeMideSLA", ccsGet, NULL), $this);
        $this->FugadoProduccion = new clsControl(ccsLabel, "FugadoProduccion", "FugadoProduccion", ccsInteger, "", CCGetRequestParam("FugadoProduccion", ccsGet, NULL), $this);
        $this->TipoSLA = new clsControl(ccsLabel, "TipoSLA", "TipoSLA", ccsText, "", CCGetRequestParam("TipoSLA", ccsGet, NULL), $this);
        $this->mc_c_dictamenes_Insert = new clsControl(ccsLink, "mc_c_dictamenes_Insert", "mc_c_dictamenes_Insert", ccsText, "", CCGetRequestParam("mc_c_dictamenes_Insert", ccsGet, NULL), $this);
        $this->mc_c_dictamenes_Insert->Parameters = CCGetQueryString("QueryString", array("Id", "ccsForm"));
        $this->mc_c_dictamenes_Insert->Page = "Dictamenes.php";
        $this->Sorter_Id = new clsSorter($this->ComponentName, "Sorter_Id", $FileName, $this);
        $this->Sorter_Codigo = new clsSorter($this->ComponentName, "Sorter_Codigo", $FileName, $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_Uso = new clsSorter($this->ComponentName, "Sorter_Uso", $FileName, $this);
        $this->Sorter_SeMideSLA = new clsSorter($this->ComponentName, "Sorter_SeMideSLA", $FileName, $this);
        $this->Sorter_TipoSLA = new clsSorter($this->ComponentName, "Sorter_TipoSLA", $FileName, $this);
        $this->Sorter_FugadoProduccion = new clsSorter($this->ComponentName, "Sorter_FugadoProduccion", $FileName, $this);
        $this->Sorter_Comentarios = new clsSorter($this->ComponentName, "Sorter_Comentarios", $FileName, $this);
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

//Show Method @3-6F0A558C
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_Codigo"] = CCGetFromGet("s_Codigo", NULL);
        $this->DataSource->Parameters["urls_SeMideSLA"] = CCGetFromGet("s_SeMideSLA", NULL);
        $this->DataSource->Parameters["urls_TipoSLA"] = CCGetFromGet("s_TipoSLA", NULL);
        $this->DataSource->Parameters["urls_FugadoProduccion"] = CCGetFromGet("s_FugadoProduccion", NULL);

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
            $this->ControlsVisible["Codigo"] = $this->Codigo->Visible;
            $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
            $this->ControlsVisible["Uso"] = $this->Uso->Visible;
            $this->ControlsVisible["Comentarios"] = $this->Comentarios->Visible;
            $this->ControlsVisible["SeMideSLA"] = $this->SeMideSLA->Visible;
            $this->ControlsVisible["FugadoProduccion"] = $this->FugadoProduccion->Visible;
            $this->ControlsVisible["TipoSLA"] = $this->TipoSLA->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Id->SetValue($this->DataSource->Id->GetValue());
                $this->Id->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Id->Parameters = CCAddParam($this->Id->Parameters, "Id", $this->DataSource->f("Id"));
                $this->Codigo->SetValue($this->DataSource->Codigo->GetValue());
                $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                $this->Uso->SetValue($this->DataSource->Uso->GetValue());
                $this->Comentarios->SetValue($this->DataSource->Comentarios->GetValue());
                $this->SeMideSLA->SetValue($this->DataSource->SeMideSLA->GetValue());
                $this->FugadoProduccion->SetValue($this->DataSource->FugadoProduccion->GetValue());
                $this->TipoSLA->SetValue($this->DataSource->TipoSLA->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id->Show();
                $this->Codigo->Show();
                $this->Descripcion->Show();
                $this->Uso->Show();
                $this->Comentarios->Show();
                $this->SeMideSLA->Show();
                $this->FugadoProduccion->Show();
                $this->TipoSLA->Show();
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
        $this->mc_c_dictamenes_Insert->Show();
        $this->Sorter_Id->Show();
        $this->Sorter_Codigo->Show();
        $this->Sorter_Descripcion->Show();
        $this->Sorter_Uso->Show();
        $this->Sorter_SeMideSLA->Show();
        $this->Sorter_TipoSLA->Show();
        $this->Sorter_FugadoProduccion->Show();
        $this->Sorter_Comentarios->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-B4210A1C
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Codigo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Uso->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Comentarios->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SeMideSLA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FugadoProduccion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TipoSLA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_c_dictamenes Class @3-FCB6E20C

class clsmc_c_dictamenesDataSource extends clsDBcnDisenio {  //mc_c_dictamenesDataSource Class @3-D12BBFA2

//DataSource Variables @3-4F896363
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Id;
    public $Codigo;
    public $Descripcion;
    public $Uso;
    public $Comentarios;
    public $SeMideSLA;
    public $FugadoProduccion;
    public $TipoSLA;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-BE8E7355
    function clsmc_c_dictamenesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_c_dictamenes";
        $this->Initialize();
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->Codigo = new clsField("Codigo", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->Uso = new clsField("Uso", ccsText, "");
        
        $this->Comentarios = new clsField("Comentarios", ccsText, "");
        
        $this->SeMideSLA = new clsField("SeMideSLA", ccsInteger, "");
        
        $this->FugadoProduccion = new clsField("FugadoProduccion", ccsInteger, "");
        
        $this->TipoSLA = new clsField("TipoSLA", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-A64B9E04
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Id" => array("Id", ""), 
            "Sorter_Codigo" => array("Codigo", ""), 
            "Sorter_Descripcion" => array("Descripcion", ""), 
            "Sorter_Uso" => array("Uso", ""), 
            "Sorter_SeMideSLA" => array("SeMideSLA", ""), 
            "Sorter_TipoSLA" => array("TipoSLA", ""), 
            "Sorter_FugadoProduccion" => array("FugadoProduccion", ""), 
            "Sorter_Comentarios" => array("Comentarios", "")));
    }
//End SetOrder Method

//Prepare Method @3-3D32042E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_Codigo", ccsText, "", "", $this->Parameters["urls_Codigo"], "", false);
        $this->wp->AddParameter("2", "urls_SeMideSLA", ccsInteger, "", "", $this->Parameters["urls_SeMideSLA"], "", false);
        $this->wp->AddParameter("3", "urls_TipoSLA", ccsText, "", "", $this->Parameters["urls_TipoSLA"], "", false);
        $this->wp->AddParameter("4", "urls_FugadoProduccion", ccsInteger, "", "", $this->Parameters["urls_FugadoProduccion"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "[Codigo]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "[SeMideSLA]", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "[TipoSLA]", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opEqual, "[FugadoProduccion]", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]);
    }
//End Prepare Method

//Open Method @3-1214E2E5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM mc_c_dictamenes";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} Id, Codigo, Descripcion, Uso, SeMideSLA, TipoSLA, FugadoProduccion, Comentarios \n\n" .
        "FROM mc_c_dictamenes {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @3-57077375
    function SetValues()
    {
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->Codigo->SetDBValue($this->f("Codigo"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->Uso->SetDBValue($this->f("Uso"));
        $this->Comentarios->SetDBValue($this->f("Comentarios"));
        $this->SeMideSLA->SetDBValue(trim($this->f("SeMideSLA")));
        $this->FugadoProduccion->SetDBValue(trim($this->f("FugadoProduccion")));
        $this->TipoSLA->SetDBValue($this->f("TipoSLA"));
    }
//End SetValues Method

} //End mc_c_dictamenesDataSource Class @3-FCB6E20C

class clsRecordmc_c_dictamenesSearch { //mc_c_dictamenesSearch Class @36-FECA2134

//Variables @36-9E315808

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

//Class_Initialize Event @36-33EA78FC
    function clsRecordmc_c_dictamenesSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_c_dictamenesSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_c_dictamenesSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_Codigo = new clsControl(ccsTextBox, "s_Codigo", "Codigo", ccsText, "", CCGetRequestParam("s_Codigo", $Method, NULL), $this);
            $this->s_SeMideSLA = new clsControl(ccsListBox, "s_SeMideSLA", "Se Mide SLA", ccsInteger, "", CCGetRequestParam("s_SeMideSLA", $Method, NULL), $this);
            $this->s_TipoSLA = new clsControl(ccsListBox, "s_TipoSLA", "Tipo SLA", ccsText, "", CCGetRequestParam("s_TipoSLA", $Method, NULL), $this);
            $this->s_FugadoProduccion = new clsControl(ccsListBox, "s_FugadoProduccion", "Fugado Produccion", ccsInteger, "", CCGetRequestParam("s_FugadoProduccion", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @36-72D0D9A5
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_Codigo->Validate() && $Validation);
        $Validation = ($this->s_SeMideSLA->Validate() && $Validation);
        $Validation = ($this->s_TipoSLA->Validate() && $Validation);
        $Validation = ($this->s_FugadoProduccion->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_Codigo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_SeMideSLA->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_TipoSLA->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FugadoProduccion->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @36-43C6FF04
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_Codigo->Errors->Count());
        $errors = ($errors || $this->s_SeMideSLA->Errors->Count());
        $errors = ($errors || $this->s_TipoSLA->Errors->Count());
        $errors = ($errors || $this->s_FugadoProduccion->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @36-A904F929
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
        $Redirect = "Dictamenes.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "Dictamenes.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @36-E7E12D89
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

        $this->s_SeMideSLA->Prepare();
        $this->s_TipoSLA->Prepare();
        $this->s_FugadoProduccion->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_Codigo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_SeMideSLA->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_TipoSLA->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FugadoProduccion->Errors->ToString());
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
        $this->s_Codigo->Show();
        $this->s_SeMideSLA->Show();
        $this->s_TipoSLA->Show();
        $this->s_FugadoProduccion->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_c_dictamenesSearch Class @36-FCB6E20C

class clsRecordmc_c_dictamenes1 { //mc_c_dictamenes1 Class @42-D0BCF78E

//Variables @42-9E315808

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

//Class_Initialize Event @42-E803B0F7
    function clsRecordmc_c_dictamenes1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_c_dictamenes1/Error";
        $this->DataSource = new clsmc_c_dictamenes1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_c_dictamenes1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Codigo = new clsControl(ccsTextBox, "Codigo", "Codigo", ccsText, "", CCGetRequestParam("Codigo", $Method, NULL), $this);
            $this->Codigo->Required = true;
            $this->Descripcion = new clsControl(ccsTextBox, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", $Method, NULL), $this);
            $this->Uso = new clsControl(ccsTextArea, "Uso", "Uso", ccsText, "", CCGetRequestParam("Uso", $Method, NULL), $this);
            $this->SeMideSLA = new clsControl(ccsCheckBox, "SeMideSLA", "SeMideSLA", ccsInteger, "", CCGetRequestParam("SeMideSLA", $Method, NULL), $this);
            $this->SeMideSLA->CheckedValue = $this->SeMideSLA->GetParsedValue(1);
            $this->SeMideSLA->UncheckedValue = $this->SeMideSLA->GetParsedValue(0);
            $this->TipoSLA = new clsControl(ccsTextBox, "TipoSLA", "Tipo SLA", ccsText, "", CCGetRequestParam("TipoSLA", $Method, NULL), $this);
            $this->FugadoProduccion = new clsControl(ccsCheckBox, "FugadoProduccion", "FugadoProduccion", ccsInteger, "", CCGetRequestParam("FugadoProduccion", $Method, NULL), $this);
            $this->FugadoProduccion->CheckedValue = $this->FugadoProduccion->GetParsedValue(1);
            $this->FugadoProduccion->UncheckedValue = $this->FugadoProduccion->GetParsedValue(0);
            $this->Comentarios = new clsControl(ccsTextArea, "Comentarios", "Comentarios", ccsText, "", CCGetRequestParam("Comentarios", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->SeMideSLA->Value) && !strlen($this->SeMideSLA->Value) && $this->SeMideSLA->Value !== false)
                    $this->SeMideSLA->SetValue(false);
                if(!is_array($this->FugadoProduccion->Value) && !strlen($this->FugadoProduccion->Value) && $this->FugadoProduccion->Value !== false)
                    $this->FugadoProduccion->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @42-4F76030F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//Validate Method @42-634B5386
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Codigo->Validate() && $Validation);
        $Validation = ($this->Descripcion->Validate() && $Validation);
        $Validation = ($this->Uso->Validate() && $Validation);
        $Validation = ($this->SeMideSLA->Validate() && $Validation);
        $Validation = ($this->TipoSLA->Validate() && $Validation);
        $Validation = ($this->FugadoProduccion->Validate() && $Validation);
        $Validation = ($this->Comentarios->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Codigo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Descripcion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Uso->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SeMideSLA->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TipoSLA->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FugadoProduccion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Comentarios->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @42-D5411AD5
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Codigo->Errors->Count());
        $errors = ($errors || $this->Descripcion->Errors->Count());
        $errors = ($errors || $this->Uso->Errors->Count());
        $errors = ($errors || $this->SeMideSLA->Errors->Count());
        $errors = ($errors || $this->TipoSLA->Errors->Count());
        $errors = ($errors || $this->FugadoProduccion->Errors->Count());
        $errors = ($errors || $this->Comentarios->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @42-9D7BB5D5
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
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "Id"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "Id"));
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

//InsertRow Method @42-7694688A
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Codigo->SetValue($this->Codigo->GetValue(true));
        $this->DataSource->Descripcion->SetValue($this->Descripcion->GetValue(true));
        $this->DataSource->Uso->SetValue($this->Uso->GetValue(true));
        $this->DataSource->SeMideSLA->SetValue($this->SeMideSLA->GetValue(true));
        $this->DataSource->TipoSLA->SetValue($this->TipoSLA->GetValue(true));
        $this->DataSource->FugadoProduccion->SetValue($this->FugadoProduccion->GetValue(true));
        $this->DataSource->Comentarios->SetValue($this->Comentarios->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @42-5FF9B21E
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Codigo->SetValue($this->Codigo->GetValue(true));
        $this->DataSource->Descripcion->SetValue($this->Descripcion->GetValue(true));
        $this->DataSource->Uso->SetValue($this->Uso->GetValue(true));
        $this->DataSource->SeMideSLA->SetValue($this->SeMideSLA->GetValue(true));
        $this->DataSource->TipoSLA->SetValue($this->TipoSLA->GetValue(true));
        $this->DataSource->FugadoProduccion->SetValue($this->FugadoProduccion->GetValue(true));
        $this->DataSource->Comentarios->SetValue($this->Comentarios->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @42-EA2D0CAA
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
                    $this->Codigo->SetValue($this->DataSource->Codigo->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->Uso->SetValue($this->DataSource->Uso->GetValue());
                    $this->SeMideSLA->SetValue($this->DataSource->SeMideSLA->GetValue());
                    $this->TipoSLA->SetValue($this->DataSource->TipoSLA->GetValue());
                    $this->FugadoProduccion->SetValue($this->DataSource->FugadoProduccion->GetValue());
                    $this->Comentarios->SetValue($this->DataSource->Comentarios->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Codigo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Descripcion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Uso->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SeMideSLA->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TipoSLA->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FugadoProduccion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Comentarios->Errors->ToString());
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

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Codigo->Show();
        $this->Descripcion->Show();
        $this->Uso->Show();
        $this->SeMideSLA->Show();
        $this->TipoSLA->Show();
        $this->FugadoProduccion->Show();
        $this->Comentarios->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_c_dictamenes1 Class @42-FCB6E20C

class clsmc_c_dictamenes1DataSource extends clsDBcnDisenio {  //mc_c_dictamenes1DataSource Class @42-7803101C

//DataSource Variables @42-44D9945D
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
    public $Codigo;
    public $Descripcion;
    public $Uso;
    public $SeMideSLA;
    public $TipoSLA;
    public $FugadoProduccion;
    public $Comentarios;
//End DataSource Variables

//DataSourceClass_Initialize Event @42-5CC8A160
    function clsmc_c_dictamenes1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_c_dictamenes1/Error";
        $this->Initialize();
        $this->Codigo = new clsField("Codigo", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->Uso = new clsField("Uso", ccsText, "");
        
        $this->SeMideSLA = new clsField("SeMideSLA", ccsInteger, "");
        
        $this->TipoSLA = new clsField("TipoSLA", ccsText, "");
        
        $this->FugadoProduccion = new clsField("FugadoProduccion", ccsInteger, "");
        
        $this->Comentarios = new clsField("Comentarios", ccsText, "");
        

        $this->InsertFields["Codigo"] = array("Name" => "[Codigo]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Uso"] = array("Name" => "[Uso]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SeMideSLA"] = array("Name" => "[SeMideSLA]", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["TipoSLA"] = array("Name" => "[TipoSLA]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FugadoProduccion"] = array("Name" => "[FugadoProduccion]", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["Comentarios"] = array("Name" => "[Comentarios]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Codigo"] = array("Name" => "[Codigo]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Uso"] = array("Name" => "[Uso]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SeMideSLA"] = array("Name" => "[SeMideSLA]", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["TipoSLA"] = array("Name" => "[TipoSLA]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FugadoProduccion"] = array("Name" => "[FugadoProduccion]", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["Comentarios"] = array("Name" => "[Comentarios]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @42-D6C1B08E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId", ccsInteger, "", "", $this->Parameters["urlId"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[Id]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @42-675C6DB8
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_c_dictamenes {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @42-C7590AFB
    function SetValues()
    {
        $this->Codigo->SetDBValue($this->f("Codigo"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->Uso->SetDBValue($this->f("Uso"));
        $this->SeMideSLA->SetDBValue(trim($this->f("SeMideSLA")));
        $this->TipoSLA->SetDBValue($this->f("TipoSLA"));
        $this->FugadoProduccion->SetDBValue(trim($this->f("FugadoProduccion")));
        $this->Comentarios->SetDBValue($this->f("Comentarios"));
    }
//End SetValues Method

//Insert Method @42-E388D291
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Codigo"]["Value"] = $this->Codigo->GetDBValue(true);
        $this->InsertFields["Descripcion"]["Value"] = $this->Descripcion->GetDBValue(true);
        $this->InsertFields["Uso"]["Value"] = $this->Uso->GetDBValue(true);
        $this->InsertFields["SeMideSLA"]["Value"] = $this->SeMideSLA->GetDBValue(true);
        $this->InsertFields["TipoSLA"]["Value"] = $this->TipoSLA->GetDBValue(true);
        $this->InsertFields["FugadoProduccion"]["Value"] = $this->FugadoProduccion->GetDBValue(true);
        $this->InsertFields["Comentarios"]["Value"] = $this->Comentarios->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_c_dictamenes", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @42-61582977
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Codigo"]["Value"] = $this->Codigo->GetDBValue(true);
        $this->UpdateFields["Descripcion"]["Value"] = $this->Descripcion->GetDBValue(true);
        $this->UpdateFields["Uso"]["Value"] = $this->Uso->GetDBValue(true);
        $this->UpdateFields["SeMideSLA"]["Value"] = $this->SeMideSLA->GetDBValue(true);
        $this->UpdateFields["TipoSLA"]["Value"] = $this->TipoSLA->GetDBValue(true);
        $this->UpdateFields["FugadoProduccion"]["Value"] = $this->FugadoProduccion->GetDBValue(true);
        $this->UpdateFields["Comentarios"]["Value"] = $this->Comentarios->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_c_dictamenes", $this->UpdateFields, $this);
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

} //End mc_c_dictamenes1DataSource Class @42-FCB6E20C

//Initialize Page @1-5D197674
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
$TemplateFileName = "Dictamenes.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-E67D5A43
include_once("./Dictamenes_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-1ECE7AE1
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$mc_c_dictamenes = new clsGridmc_c_dictamenes("", $MainPage);
$mc_c_dictamenesSearch = new clsRecordmc_c_dictamenesSearch("", $MainPage);
$mc_c_dictamenes1 = new clsRecordmc_c_dictamenes1("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_c_dictamenes = & $mc_c_dictamenes;
$MainPage->mc_c_dictamenesSearch = & $mc_c_dictamenesSearch;
$MainPage->mc_c_dictamenes1 = & $mc_c_dictamenes1;
$mc_c_dictamenes->Initialize();
$mc_c_dictamenes1->Initialize();
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

//Execute Components @1-4373C7C6
$mc_c_dictamenes1->Operation();
$mc_c_dictamenesSearch->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-816D89C6
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_c_dictamenes);
    unset($mc_c_dictamenesSearch);
    unset($mc_c_dictamenes1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E76C72C4
$Header->Show();
$mc_c_dictamenes->Show();
$mc_c_dictamenesSearch->Show();
$mc_c_dictamenes1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-AA62AB36
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_c_dictamenes);
unset($mc_c_dictamenesSearch);
unset($mc_c_dictamenes1);
unset($Tpl);
//End Unload Page


?>
