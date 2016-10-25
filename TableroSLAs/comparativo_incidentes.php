<?php
//Include Common Files @1-CF2D36F4
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "comparativo_incidentes.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordperiodos_carga { //periodos_carga Class @3-C6BD6D21

//Variables @3-9E315808

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

//Class_Initialize Event @3-EEC871C9
    function clsRecordperiodos_carga($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record periodos_carga/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "periodos_carga";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_id_periodo = new clsControl(ccsListBox, "s_id_periodo", "Id Periodo", ccsInteger, "", CCGetRequestParam("s_id_periodo", $Method, NULL), $this);
            $this->s_id_periodo->DSType = dsSQL;
            $this->s_id_periodo->DataSource = new clsDBcnDisenio();
            $this->s_id_periodo->ds = & $this->s_id_periodo->DataSource;
            list($this->s_id_periodo->BoundColumn, $this->s_id_periodo->TextColumn, $this->s_id_periodo->DBFormat) = array("id_periodo", "periodo", "");
            $this->s_id_periodo->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
            $this->s_id_periodo->DataSource->wp = new clsSQLParameters();
            $this->s_id_periodo->DataSource->wp->AddParameter("1", "urls_id_proveedor", ccsText, "", "", $this->s_id_periodo->DataSource->Parameters["urls_id_proveedor"], 2, false);
            $this->s_id_periodo->DataSource->SQL = "select distinct id_periodo,  periodo+tipo_periodo as periodo\n" .
            "from archivosxls.dbo.periodos_hist\n" .
            "where (id_proveedor=0 or id_proveedor=" . $this->s_id_periodo->DataSource->SQLValue($this->s_id_periodo->DataSource->wp->GetDBValue("1"), ccsText) . " or " . $this->s_id_periodo->DataSource->SQLValue($this->s_id_periodo->DataSource->wp->GetDBValue("1"), ccsText) . " =1)\n" .
            "and id_periodo > 30\n" .
            "and id_periodo  in (select distinct id_periodo from resumen_sat where id_proveedor=" . $this->s_id_periodo->DataSource->SQLValue($this->s_id_periodo->DataSource->wp->GetDBValue("1"), ccsText) . ")\n" .
            "\n" .
            "\n" .
            "";
            $this->s_id_periodo->DataSource->Order = "";
            $this->s_id_periodo->Required = true;
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsSQL;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->DataSource->SQL = "select id_proveedor, nombre from mc_c_proveedor where descripcion!='CAPC'";
            $this->s_id_proveedor->DataSource->Order = "";
            $this->s_id_proveedor->Required = true;
            $this->s_opt_slas = new clsControl(ccsListBox, "s_opt_slas", "s_opt_slas", ccsText, "", CCGetRequestParam("s_opt_slas", $Method, NULL), $this);
            $this->s_opt_slas->DSType = dsListOfValues;
            $this->s_opt_slas->Values = array(array("SLA", "SLA"), array("SLO", "SLO"));
            $this->s_opt_slas->Required = true;
            $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", $Method, NULL), $this);
            $this->Link1->Parameters = CCGetQueryString("QueryString", array("s_id_incidencia", "s_id_ppmc", "s_id_estimacion", "s_id_ppmc_cierre", "s_id_estimacion_cierre", "ccsForm"));
            $this->Link1->Page = "comparativo_cierre.php";
            $this->Link2 = new clsControl(ccsLink, "Link2", "Link2", ccsText, "", CCGetRequestParam("Link2", $Method, NULL), $this);
            $this->Link2->Parameters = CCGetQueryString("QueryString", array("s_id_incidencia", "s_id_ppmc", "s_id_estimacion", "s_id_ppmc_cierre", "s_id_estimacion_cierre", "ccsForm"));
            $this->Link2->Page = "comparativo_incidentes.php";
            $this->Link3 = new clsControl(ccsLink, "Link3", "Link3", ccsText, "", CCGetRequestParam("Link3", $Method, NULL), $this);
            $this->Link3->Parameters = CCGetQueryString("QueryString", array("s_id_incidencia", "s_id_ppmc", "s_id_estimacion", "s_id_ppmc_cierre", "s_id_estimacion_cierre", "ccsForm"));
            $this->Link3->Page = "comparativo_apertura.php";
            $this->Link4 = new clsControl(ccsLink, "Link4", "Link4", ccsText, "", CCGetRequestParam("Link4", $Method, NULL), $this);
            $this->Link4->Parameters = CCGetQueryString("QueryString", array("s_id_incidencia", "s_id_ppmc", "s_id_estimacion", "s_id_ppmc_cierre", "s_id_estimacion_cierre", "ccsForm"));
            $this->Link4->Page = "comparativo_cierre.php";
            $this->Label1 = new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_id_periodo->Value) && !strlen($this->s_id_periodo->Value) && $this->s_id_periodo->Value !== false)
                    $this->s_id_periodo->SetText(31);
                if(!is_array($this->s_id_proveedor->Value) && !strlen($this->s_id_proveedor->Value) && $this->s_id_proveedor->Value !== false)
                    $this->s_id_proveedor->SetText(2);
                if(!is_array($this->s_opt_slas->Value) && !strlen($this->s_opt_slas->Value) && $this->s_opt_slas->Value !== false)
                    $this->s_opt_slas->SetText('SLA');
            }
        }
    }
//End Class_Initialize Event

//Validate Method @3-C4E0290F
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_periodo->Validate() && $Validation);
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_opt_slas->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_periodo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_opt_slas->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-DF0950CD
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_periodo->Errors->Count());
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_opt_slas->Errors->Count());
        $errors = ($errors || $this->Link1->Errors->Count());
        $errors = ($errors || $this->Link2->Errors->Count());
        $errors = ($errors || $this->Link3->Errors->Count());
        $errors = ($errors || $this->Link4->Errors->Count());
        $errors = ($errors || $this->Label1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-DD94EE4C
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

//Show Method @3-4A21EC81
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

        $this->s_id_periodo->Prepare();
        $this->s_id_proveedor->Prepare();
        $this->s_opt_slas->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_periodo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_opt_slas->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link4->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Label1->Errors->ToString());
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
        $this->s_id_periodo->Show();
        $this->s_id_proveedor->Show();
        $this->s_opt_slas->Show();
        $this->Link1->Show();
        $this->Link2->Show();
        $this->Link3->Show();
        $this->Link4->Show();
        $this->Label1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End periodos_carga Class @3-FCB6E20C

class clsGridresult_comparativo_incide { //result_comparativo_incide class @172-AE2EDC4F

//Variables @172-FEE178C2

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
    public $Sorter_id_incidencia;
//End Variables

//Class_Initialize Event @172-B9D08BC4
    function clsGridresult_comparativo_incide($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "result_comparativo_incide";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid result_comparativo_incide";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsresult_comparativo_incideDataSource($this);
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
        $this->SorterName = CCGetParam("result_comparativo_incideOrder", "");
        $this->SorterDirection = CCGetParam("result_comparativo_incideDir", "");

        $this->id_incidencia = new clsControl(ccsLink, "id_incidencia", "id_incidencia", ccsText, "", CCGetRequestParam("id_incidencia", ccsGet, NULL), $this);
        $this->id_incidencia->Page = "comparativo_incidentes.php";
        $this->result_comparativo_incide_TotalRecords = new clsControl(ccsLabel, "result_comparativo_incide_TotalRecords", "result_comparativo_incide_TotalRecords", ccsText, "", CCGetRequestParam("result_comparativo_incide_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_id_incidencia = new clsSorter($this->ComponentName, "Sorter_id_incidencia", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @172-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @172-A9EDF6A7
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_periodo"] = CCGetFromGet("s_id_periodo", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_opt_slas"] = CCGetFromGet("s_opt_slas", NULL);

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
            $this->ControlsVisible["id_incidencia"] = $this->id_incidencia->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->id_incidencia->SetValue($this->DataSource->id_incidencia->GetValue());
                $this->id_incidencia->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->id_incidencia->Parameters = CCAddParam($this->id_incidencia->Parameters, "s_id_incidencia", $this->DataSource->f("id_incidencia"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id_incidencia->Show();
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
        $this->result_comparativo_incide_TotalRecords->Show();
        $this->Sorter_id_incidencia->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @172-9BBAC60B
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->id_incidencia->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End result_comparativo_incide Class @172-FCB6E20C

class clsresult_comparativo_incideDataSource extends clsDBcnDisenio {  //result_comparativo_incideDataSource Class @172-99276AE4

//DataSource Variables @172-3434C636
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $id_incidencia;
//End DataSource Variables

//DataSourceClass_Initialize Event @172-5370E9BF
    function clsresult_comparativo_incideDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid result_comparativo_incide";
        $this->Initialize();
        $this->id_incidencia = new clsField("id_incidencia", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @172-D91B8626
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "id_incidencia";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_id_incidencia" => array("id_incidencia", "")));
    }
//End SetOrder Method

//Prepare Method @172-92312C4A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_periodo", ccsInteger, "", "", $this->Parameters["urls_id_periodo"], 31, false);
        $this->wp->AddParameter("2", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 2, false);
        $this->wp->AddParameter("3", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], 'SLA', false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_periodo", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "id_proveedor", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "tipo_nivel_servicio", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = "( estado_comparativo != 'REGISTRO CDS' )";
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

//Open Method @172-FC71A9FD
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM result_comparativo_incidentes";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} id_incidencia \n\n" .
        "FROM result_comparativo_incidentes {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @172-7B2B8FF3
    function SetValues()
    {
        $this->id_incidencia->SetDBValue($this->f("id_incidencia"));
    }
//End SetValues Method

} //End result_comparativo_incideDataSource Class @172-FCB6E20C

class clsRecordresult_comparativo_incide1 { //result_comparativo_incide1 Class @199-746F2A8F

//Variables @199-9E315808

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

//Class_Initialize Event @199-073AFA88
    function clsRecordresult_comparativo_incide1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record result_comparativo_incide1/Error";
        $this->DataSource = new clsresult_comparativo_incide1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "result_comparativo_incide1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->servicio_de_negocio = new clsControl(ccsLabel, "servicio_de_negocio", "servicio_de_negocio", ccsText, "", CCGetRequestParam("servicio_de_negocio", $Method, NULL), $this);
            $this->severidad = new clsControl(ccsLabel, "severidad", "severidad", ccsText, "", CCGetRequestParam("severidad", $Method, NULL), $this);
            $this->Cumple_Inc_TiempoAsignacion = new clsControl(ccsLabel, "Cumple_Inc_TiempoAsignacion", "Cumple_Inc_TiempoAsignacion", ccsText, "", CCGetRequestParam("Cumple_Inc_TiempoAsignacion", $Method, NULL), $this);
            $this->Cumple_Inc_TiempoSolucion = new clsControl(ccsLabel, "Cumple_Inc_TiempoSolucion", "Cumple_Inc_TiempoSolucion", ccsText, "", CCGetRequestParam("Cumple_Inc_TiempoSolucion", $Method, NULL), $this);
            $this->id_periodo = new clsControl(ccsLabel, "id_periodo", "id_periodo", ccsInteger, "", CCGetRequestParam("id_periodo", $Method, NULL), $this);
            $this->id_proveedor = new clsControl(ccsLabel, "id_proveedor", "id_proveedor", ccsInteger, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->nombre_del_producto = new clsControl(ccsLabel, "nombre_del_producto", "nombre_del_producto", ccsText, "", CCGetRequestParam("nombre_del_producto", $Method, NULL), $this);
            $this->tipo_nivel_servicio = new clsControl(ccsLabel, "tipo_nivel_servicio", "tipo_nivel_servicio", ccsText, "", CCGetRequestParam("tipo_nivel_servicio", $Method, NULL), $this);
            $this->estado_comparativo = new clsControl(ccsLabel, "estado_comparativo", "estado_comparativo", ccsText, "", CCGetRequestParam("estado_comparativo", $Method, NULL), $this);
            $this->imgCumple_Inc_TiempoAsignacion = new clsControl(ccsImage, "imgCumple_Inc_TiempoAsignacion", "imgCumple_Inc_TiempoAsignacion", ccsText, "", CCGetRequestParam("imgCumple_Inc_TiempoAsignacion", $Method, NULL), $this);
            $this->imgCumple_Inc_TiempoSolucion = new clsControl(ccsImage, "imgCumple_Inc_TiempoSolucion", "imgCumple_Inc_TiempoSolucion", ccsText, "", CCGetRequestParam("imgCumple_Inc_TiempoSolucion", $Method, NULL), $this);
            $this->id_incidencia = new clsControl(ccsLabel, "id_incidencia", "id_incidencia", ccsText, "", CCGetRequestParam("id_incidencia", $Method, NULL), $this);
            $this->id_incidencia->HTML = true;
            if(!is_array($this->id_incidencia->Value) && !strlen($this->id_incidencia->Value) && $this->id_incidencia->Value !== false)
                $this->id_incidencia->SetText("<font color=red>ID NO REPORTADO</font>");
        }
    }
//End Class_Initialize Event

//Initialize Method @199-297000A7
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urls_id_incidencia"] = CCGetFromGet("s_id_incidencia", NULL);
        $this->DataSource->Parameters["urls_id_periodo"] = CCGetFromGet("s_id_periodo", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_opt_slas"] = CCGetFromGet("s_opt_slas", NULL);
    }
//End Initialize Method

//Validate Method @199-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @199-7B13B99C
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->servicio_de_negocio->Errors->Count());
        $errors = ($errors || $this->severidad->Errors->Count());
        $errors = ($errors || $this->Cumple_Inc_TiempoAsignacion->Errors->Count());
        $errors = ($errors || $this->Cumple_Inc_TiempoSolucion->Errors->Count());
        $errors = ($errors || $this->id_periodo->Errors->Count());
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->nombre_del_producto->Errors->Count());
        $errors = ($errors || $this->tipo_nivel_servicio->Errors->Count());
        $errors = ($errors || $this->estado_comparativo->Errors->Count());
        $errors = ($errors || $this->imgCumple_Inc_TiempoAsignacion->Errors->Count());
        $errors = ($errors || $this->imgCumple_Inc_TiempoSolucion->Errors->Count());
        $errors = ($errors || $this->id_incidencia->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @199-17DC9883
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

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @199-4C0AD27C
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
                $this->servicio_de_negocio->SetValue($this->DataSource->servicio_de_negocio->GetValue());
                $this->severidad->SetValue($this->DataSource->severidad->GetValue());
                $this->Cumple_Inc_TiempoAsignacion->SetValue($this->DataSource->Cumple_Inc_TiempoAsignacion->GetValue());
                $this->Cumple_Inc_TiempoSolucion->SetValue($this->DataSource->Cumple_Inc_TiempoSolucion->GetValue());
                $this->id_periodo->SetValue($this->DataSource->id_periodo->GetValue());
                $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                $this->nombre_del_producto->SetValue($this->DataSource->nombre_del_producto->GetValue());
                $this->tipo_nivel_servicio->SetValue($this->DataSource->tipo_nivel_servicio->GetValue());
                $this->estado_comparativo->SetValue($this->DataSource->estado_comparativo->GetValue());
                $this->id_incidencia->SetValue($this->DataSource->id_incidencia->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->servicio_de_negocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->severidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Cumple_Inc_TiempoAsignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Cumple_Inc_TiempoSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_periodo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->nombre_del_producto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tipo_nivel_servicio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->estado_comparativo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->imgCumple_Inc_TiempoAsignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->imgCumple_Inc_TiempoSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_incidencia->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->servicio_de_negocio->Show();
        $this->severidad->Show();
        $this->Cumple_Inc_TiempoAsignacion->Show();
        $this->Cumple_Inc_TiempoSolucion->Show();
        $this->id_periodo->Show();
        $this->id_proveedor->Show();
        $this->nombre_del_producto->Show();
        $this->tipo_nivel_servicio->Show();
        $this->estado_comparativo->Show();
        $this->imgCumple_Inc_TiempoAsignacion->Show();
        $this->imgCumple_Inc_TiempoSolucion->Show();
        $this->id_incidencia->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End result_comparativo_incide1 Class @199-FCB6E20C

class clsresult_comparativo_incide1DataSource extends clsDBcnDisenio {  //result_comparativo_incide1DataSource Class @199-E7F4F86C

//DataSource Variables @199-1DECBF89
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $servicio_de_negocio;
    public $severidad;
    public $Cumple_Inc_TiempoAsignacion;
    public $Cumple_Inc_TiempoSolucion;
    public $id_periodo;
    public $id_proveedor;
    public $nombre_del_producto;
    public $tipo_nivel_servicio;
    public $estado_comparativo;
    public $imgCumple_Inc_TiempoAsignacion;
    public $imgCumple_Inc_TiempoSolucion;
    public $id_incidencia;
//End DataSource Variables

//DataSourceClass_Initialize Event @199-8CDC1F42
    function clsresult_comparativo_incide1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record result_comparativo_incide1/Error";
        $this->Initialize();
        $this->servicio_de_negocio = new clsField("servicio_de_negocio", ccsText, "");
        
        $this->severidad = new clsField("severidad", ccsText, "");
        
        $this->Cumple_Inc_TiempoAsignacion = new clsField("Cumple_Inc_TiempoAsignacion", ccsText, "");
        
        $this->Cumple_Inc_TiempoSolucion = new clsField("Cumple_Inc_TiempoSolucion", ccsText, "");
        
        $this->id_periodo = new clsField("id_periodo", ccsInteger, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->nombre_del_producto = new clsField("nombre_del_producto", ccsText, "");
        
        $this->tipo_nivel_servicio = new clsField("tipo_nivel_servicio", ccsText, "");
        
        $this->estado_comparativo = new clsField("estado_comparativo", ccsText, "");
        
        $this->imgCumple_Inc_TiempoAsignacion = new clsField("imgCumple_Inc_TiempoAsignacion", ccsText, "");
        
        $this->imgCumple_Inc_TiempoSolucion = new clsField("imgCumple_Inc_TiempoSolucion", ccsText, "");
        
        $this->id_incidencia = new clsField("id_incidencia", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @199-42B3427C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_incidencia", ccsText, "", "", $this->Parameters["urls_id_incidencia"], "", false);
        $this->wp->AddParameter("2", "urls_id_periodo", ccsInteger, "", "", $this->Parameters["urls_id_periodo"], "", false);
        $this->wp->AddParameter("3", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], "", false);
        $this->wp->AddParameter("5", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], 'SLA', false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_incidencia", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "id_periodo", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "id_proveedor", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->wp->Criterion[4] = "( estado_comparativo = 'REGISTRO CAPC' OR estado_comparativo = 'REG. CAPC QUE NO CARGO CDS' )";
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "tipo_nivel_servicio", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
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

//Open Method @199-0F20C769
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM result_comparativo_incidentes {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @199-5C1A8620
    function SetValues()
    {
        $this->servicio_de_negocio->SetDBValue($this->f("servicio_de_negocio"));
        $this->severidad->SetDBValue($this->f("severidad"));
        $this->Cumple_Inc_TiempoAsignacion->SetDBValue($this->f("Cumple_Inc_TiempoAsignacion"));
        $this->Cumple_Inc_TiempoSolucion->SetDBValue($this->f("Cumple_Inc_TiempoSolucion"));
        $this->id_periodo->SetDBValue(trim($this->f("id_periodo")));
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->nombre_del_producto->SetDBValue($this->f("nombre_del_producto"));
        $this->tipo_nivel_servicio->SetDBValue($this->f("tipo_nivel_servicio"));
        $this->estado_comparativo->SetDBValue($this->f("estado_comparativo"));
        $this->id_incidencia->SetDBValue($this->f("id_incidencia"));
    }
//End SetValues Method

} //End result_comparativo_incide1DataSource Class @199-FCB6E20C

class clsRecordresult_comparativo_incide2 { //result_comparativo_incide2 Class @219-5F42794C

//Variables @219-9E315808

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

//Class_Initialize Event @219-9BEC0C9E
    function clsRecordresult_comparativo_incide2($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record result_comparativo_incide2/Error";
        $this->DataSource = new clsresult_comparativo_incide2DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "result_comparativo_incide2";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->servicio_de_negocio = new clsControl(ccsLabel, "servicio_de_negocio", "servicio_de_negocio", ccsText, "", CCGetRequestParam("servicio_de_negocio", $Method, NULL), $this);
            $this->severidad = new clsControl(ccsLabel, "severidad", "severidad", ccsText, "", CCGetRequestParam("severidad", $Method, NULL), $this);
            $this->Cumple_Inc_TiempoAsignacion = new clsControl(ccsLabel, "Cumple_Inc_TiempoAsignacion", "Cumple_Inc_TiempoAsignacion", ccsText, "", CCGetRequestParam("Cumple_Inc_TiempoAsignacion", $Method, NULL), $this);
            $this->Cumple_Inc_TiempoSolucion = new clsControl(ccsLabel, "Cumple_Inc_TiempoSolucion", "Cumple_Inc_TiempoSolucion", ccsText, "", CCGetRequestParam("Cumple_Inc_TiempoSolucion", $Method, NULL), $this);
            $this->id_periodo = new clsControl(ccsLabel, "id_periodo", "id_periodo", ccsInteger, "", CCGetRequestParam("id_periodo", $Method, NULL), $this);
            $this->id_proveedor = new clsControl(ccsLabel, "id_proveedor", "id_proveedor", ccsInteger, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->nombre_del_producto = new clsControl(ccsLabel, "nombre_del_producto", "nombre_del_producto", ccsText, "", CCGetRequestParam("nombre_del_producto", $Method, NULL), $this);
            $this->tipo_nivel_servicio = new clsControl(ccsLabel, "tipo_nivel_servicio", "tipo_nivel_servicio", ccsText, "", CCGetRequestParam("tipo_nivel_servicio", $Method, NULL), $this);
            $this->estado_comparativo = new clsControl(ccsLabel, "estado_comparativo", "estado_comparativo", ccsText, "", CCGetRequestParam("estado_comparativo", $Method, NULL), $this);
            $this->imgCumple_Inc_TiempoAsignacion = new clsControl(ccsImage, "imgCumple_Inc_TiempoAsignacion", "imgCumple_Inc_TiempoAsignacion", ccsText, "", CCGetRequestParam("imgCumple_Inc_TiempoAsignacion", $Method, NULL), $this);
            $this->imgCumple_Inc_TiempoSolucion = new clsControl(ccsImage, "imgCumple_Inc_TiempoSolucion", "imgCumple_Inc_TiempoSolucion", ccsText, "", CCGetRequestParam("imgCumple_Inc_TiempoSolucion", $Method, NULL), $this);
            $this->id_incidencia = new clsControl(ccsLabel, "id_incidencia", "id_incidencia", ccsText, "", CCGetRequestParam("id_incidencia", $Method, NULL), $this);
            $this->id_incidencia->HTML = true;
            if(!is_array($this->id_incidencia->Value) && !strlen($this->id_incidencia->Value) && $this->id_incidencia->Value !== false)
                $this->id_incidencia->SetText("<font color=red>ID NO REPORTADO</font>");
        }
    }
//End Class_Initialize Event

//Initialize Method @219-297000A7
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urls_id_incidencia"] = CCGetFromGet("s_id_incidencia", NULL);
        $this->DataSource->Parameters["urls_id_periodo"] = CCGetFromGet("s_id_periodo", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_opt_slas"] = CCGetFromGet("s_opt_slas", NULL);
    }
//End Initialize Method

//Validate Method @219-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @219-7B13B99C
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->servicio_de_negocio->Errors->Count());
        $errors = ($errors || $this->severidad->Errors->Count());
        $errors = ($errors || $this->Cumple_Inc_TiempoAsignacion->Errors->Count());
        $errors = ($errors || $this->Cumple_Inc_TiempoSolucion->Errors->Count());
        $errors = ($errors || $this->id_periodo->Errors->Count());
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->nombre_del_producto->Errors->Count());
        $errors = ($errors || $this->tipo_nivel_servicio->Errors->Count());
        $errors = ($errors || $this->estado_comparativo->Errors->Count());
        $errors = ($errors || $this->imgCumple_Inc_TiempoAsignacion->Errors->Count());
        $errors = ($errors || $this->imgCumple_Inc_TiempoSolucion->Errors->Count());
        $errors = ($errors || $this->id_incidencia->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @219-17DC9883
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

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @219-4C0AD27C
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
                $this->servicio_de_negocio->SetValue($this->DataSource->servicio_de_negocio->GetValue());
                $this->severidad->SetValue($this->DataSource->severidad->GetValue());
                $this->Cumple_Inc_TiempoAsignacion->SetValue($this->DataSource->Cumple_Inc_TiempoAsignacion->GetValue());
                $this->Cumple_Inc_TiempoSolucion->SetValue($this->DataSource->Cumple_Inc_TiempoSolucion->GetValue());
                $this->id_periodo->SetValue($this->DataSource->id_periodo->GetValue());
                $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                $this->nombre_del_producto->SetValue($this->DataSource->nombre_del_producto->GetValue());
                $this->tipo_nivel_servicio->SetValue($this->DataSource->tipo_nivel_servicio->GetValue());
                $this->estado_comparativo->SetValue($this->DataSource->estado_comparativo->GetValue());
                $this->id_incidencia->SetValue($this->DataSource->id_incidencia->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->servicio_de_negocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->severidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Cumple_Inc_TiempoAsignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Cumple_Inc_TiempoSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_periodo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->nombre_del_producto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tipo_nivel_servicio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->estado_comparativo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->imgCumple_Inc_TiempoAsignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->imgCumple_Inc_TiempoSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_incidencia->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->servicio_de_negocio->Show();
        $this->severidad->Show();
        $this->Cumple_Inc_TiempoAsignacion->Show();
        $this->Cumple_Inc_TiempoSolucion->Show();
        $this->id_periodo->Show();
        $this->id_proveedor->Show();
        $this->nombre_del_producto->Show();
        $this->tipo_nivel_servicio->Show();
        $this->estado_comparativo->Show();
        $this->imgCumple_Inc_TiempoAsignacion->Show();
        $this->imgCumple_Inc_TiempoSolucion->Show();
        $this->id_incidencia->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End result_comparativo_incide2 Class @219-FCB6E20C

class clsresult_comparativo_incide2DataSource extends clsDBcnDisenio {  //result_comparativo_incide2DataSource Class @219-BCE34979

//DataSource Variables @219-1DECBF89
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $servicio_de_negocio;
    public $severidad;
    public $Cumple_Inc_TiempoAsignacion;
    public $Cumple_Inc_TiempoSolucion;
    public $id_periodo;
    public $id_proveedor;
    public $nombre_del_producto;
    public $tipo_nivel_servicio;
    public $estado_comparativo;
    public $imgCumple_Inc_TiempoAsignacion;
    public $imgCumple_Inc_TiempoSolucion;
    public $id_incidencia;
//End DataSource Variables

//DataSourceClass_Initialize Event @219-3223D5DB
    function clsresult_comparativo_incide2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record result_comparativo_incide2/Error";
        $this->Initialize();
        $this->servicio_de_negocio = new clsField("servicio_de_negocio", ccsText, "");
        
        $this->severidad = new clsField("severidad", ccsText, "");
        
        $this->Cumple_Inc_TiempoAsignacion = new clsField("Cumple_Inc_TiempoAsignacion", ccsText, "");
        
        $this->Cumple_Inc_TiempoSolucion = new clsField("Cumple_Inc_TiempoSolucion", ccsText, "");
        
        $this->id_periodo = new clsField("id_periodo", ccsInteger, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->nombre_del_producto = new clsField("nombre_del_producto", ccsText, "");
        
        $this->tipo_nivel_servicio = new clsField("tipo_nivel_servicio", ccsText, "");
        
        $this->estado_comparativo = new clsField("estado_comparativo", ccsText, "");
        
        $this->imgCumple_Inc_TiempoAsignacion = new clsField("imgCumple_Inc_TiempoAsignacion", ccsText, "");
        
        $this->imgCumple_Inc_TiempoSolucion = new clsField("imgCumple_Inc_TiempoSolucion", ccsText, "");
        
        $this->id_incidencia = new clsField("id_incidencia", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @219-9CFBC3A0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_incidencia", ccsText, "", "", $this->Parameters["urls_id_incidencia"], "", false);
        $this->wp->AddParameter("2", "urls_id_periodo", ccsInteger, "", "", $this->Parameters["urls_id_periodo"], 31, false);
        $this->wp->AddParameter("3", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 2, false);
        $this->wp->AddParameter("4", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], 'SLA', false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_incidencia", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "id_periodo", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "id_proveedor", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opEqual, "tipo_nivel_servicio", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = "( estado_comparativo = 'REGISTRO CDS' OR estado_comparativo = 'REG. CDS QUE NO CARGO CAPC' )";
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

//Open Method @219-0F20C769
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM result_comparativo_incidentes {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @219-5C1A8620
    function SetValues()
    {
        $this->servicio_de_negocio->SetDBValue($this->f("servicio_de_negocio"));
        $this->severidad->SetDBValue($this->f("severidad"));
        $this->Cumple_Inc_TiempoAsignacion->SetDBValue($this->f("Cumple_Inc_TiempoAsignacion"));
        $this->Cumple_Inc_TiempoSolucion->SetDBValue($this->f("Cumple_Inc_TiempoSolucion"));
        $this->id_periodo->SetDBValue(trim($this->f("id_periodo")));
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->nombre_del_producto->SetDBValue($this->f("nombre_del_producto"));
        $this->tipo_nivel_servicio->SetDBValue($this->f("tipo_nivel_servicio"));
        $this->estado_comparativo->SetDBValue($this->f("estado_comparativo"));
        $this->id_incidencia->SetDBValue($this->f("id_incidencia"));
    }
//End SetValues Method

} //End result_comparativo_incide2DataSource Class @219-FCB6E20C





//Initialize Page @1-D2AFB604
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
$TemplateFileName = "comparativo_incidentes.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-91339D2C
include_once("./comparativo_incidentes_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-9C176427
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$periodos_carga = new clsRecordperiodos_carga("", $MainPage);
$result_comparativo_incide = new clsGridresult_comparativo_incide("", $MainPage);
$result_comparativo_incide1 = new clsRecordresult_comparativo_incide1("", $MainPage);
$result_comparativo_incide2 = new clsRecordresult_comparativo_incide2("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->periodos_carga = & $periodos_carga;
$MainPage->result_comparativo_incide = & $result_comparativo_incide;
$MainPage->result_comparativo_incide1 = & $result_comparativo_incide1;
$MainPage->result_comparativo_incide2 = & $result_comparativo_incide2;
$result_comparativo_incide->Initialize();
$result_comparativo_incide1->Initialize();
$result_comparativo_incide2->Initialize();
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

//Execute Components @1-62B9C75A
$result_comparativo_incide2->Operation();
$result_comparativo_incide1->Operation();
$periodos_carga->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-6CA62473
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($periodos_carga);
    unset($result_comparativo_incide);
    unset($result_comparativo_incide1);
    unset($result_comparativo_incide2);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-08B1F7AF
$Header->Show();
$periodos_carga->Show();
$result_comparativo_incide->Show();
$result_comparativo_incide1->Show();
$result_comparativo_incide2->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-59B4DF4F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($periodos_carga);
unset($result_comparativo_incide);
unset($result_comparativo_incide1);
unset($result_comparativo_incide2);
unset($Tpl);
//End Unload Page


?>
