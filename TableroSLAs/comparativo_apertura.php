<?php
//Include Common Files @1-82800222
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "comparativo_apertura.php");
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

//Class_Initialize Event @3-5EAE6FA5
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
            $this->Link1->Page = "comparativo_resumen.php";
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

class clsGridresult_comparativo_apertu { //result_comparativo_apertu class @192-FAA165DC

//Variables @192-4043A8A2

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
    public $Sorter_id_ppmc;
    public $Sorter_id_estimacion;
//End Variables

//Class_Initialize Event @192-C48DBB50
    function clsGridresult_comparativo_apertu($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "result_comparativo_apertu";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid result_comparativo_apertu";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsresult_comparativo_apertuDataSource($this);
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
        $this->SorterName = CCGetParam("result_comparativo_apertuOrder", "");
        $this->SorterDirection = CCGetParam("result_comparativo_apertuDir", "");

        $this->id_ppmc = new clsControl(ccsLink, "id_ppmc", "id_ppmc", ccsInteger, "", CCGetRequestParam("id_ppmc", ccsGet, NULL), $this);
        $this->id_ppmc->Page = "comparativo_apertura.php";
        $this->id_estimacion = new clsControl(ccsLabel, "id_estimacion", "id_estimacion", ccsInteger, "", CCGetRequestParam("id_estimacion", ccsGet, NULL), $this);
        $this->result_comparativo_apertu_TotalRecords = new clsControl(ccsLabel, "result_comparativo_apertu_TotalRecords", "result_comparativo_apertu_TotalRecords", ccsText, "", CCGetRequestParam("result_comparativo_apertu_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_id_ppmc = new clsSorter($this->ComponentName, "Sorter_id_ppmc", $FileName, $this);
        $this->Sorter_id_estimacion = new clsSorter($this->ComponentName, "Sorter_id_estimacion", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @192-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @192-34E93D36
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_id_periodo"] = CCGetFromGet("s_id_periodo", NULL);
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
            $this->ControlsVisible["id_ppmc"] = $this->id_ppmc->Visible;
            $this->ControlsVisible["id_estimacion"] = $this->id_estimacion->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->id_ppmc->SetValue($this->DataSource->id_ppmc->GetValue());
                $this->id_ppmc->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->id_ppmc->Parameters = CCAddParam($this->id_ppmc->Parameters, "s_id_ppmc", $this->DataSource->f("id_ppmc"));
                $this->id_ppmc->Parameters = CCAddParam($this->id_ppmc->Parameters, "s_id_estimacion", $this->DataSource->f("id_estimacion"));
                $this->id_estimacion->SetValue($this->DataSource->id_estimacion->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id_ppmc->Show();
                $this->id_estimacion->Show();
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
        $this->result_comparativo_apertu_TotalRecords->Show();
        $this->Sorter_id_ppmc->Show();
        $this->Sorter_id_estimacion->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @192-7EA56374
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->id_ppmc->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_estimacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End result_comparativo_apertu Class @192-FCB6E20C

class clsresult_comparativo_apertuDataSource extends clsDBcnDisenio {  //result_comparativo_apertuDataSource Class @192-1FCF29CB

//DataSource Variables @192-D8CF60A1
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $id_ppmc;
    public $id_estimacion;
//End DataSource Variables

//DataSourceClass_Initialize Event @192-6608476F
    function clsresult_comparativo_apertuDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid result_comparativo_apertu";
        $this->Initialize();
        $this->id_ppmc = new clsField("id_ppmc", ccsInteger, "");
        
        $this->id_estimacion = new clsField("id_estimacion", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @192-6CD55540
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_id_ppmc" => array("id_ppmc", ""), 
            "Sorter_id_estimacion" => array("id_estimacion", "")));
    }
//End SetOrder Method

//Prepare Method @192-DDB0A28D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], "", false);
        $this->wp->AddParameter("2", "urls_id_periodo", ccsInteger, "", "", $this->Parameters["urls_id_periodo"], "", false);
        $this->wp->AddParameter("3", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_proveedor", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "id_periodo", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
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

//Open Method @192-420BE14C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM result_comparativo_aperturas";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} * \n\n" .
        "FROM result_comparativo_aperturas {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @192-DEACA796
    function SetValues()
    {
        $this->id_ppmc->SetDBValue(trim($this->f("id_ppmc")));
        $this->id_estimacion->SetDBValue(trim($this->f("id_estimacion")));
    }
//End SetValues Method

} //End result_comparativo_apertuDataSource Class @192-FCB6E20C

class clsRecordresult_comparativo_apertu1 { //result_comparativo_apertu1 Class @209-1D3D67C8

//Variables @209-9E315808

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

//Class_Initialize Event @209-05718A93
    function clsRecordresult_comparativo_apertu1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record result_comparativo_apertu1/Error";
        $this->DataSource = new clsresult_comparativo_apertu1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "result_comparativo_apertu1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->id_estimacion = new clsControl(ccsLabel, "id_estimacion", "id_estimacion", ccsInteger, "", CCGetRequestParam("id_estimacion", $Method, NULL), $this);
            $this->servicio_negocio = new clsControl(ccsLabel, "servicio_negocio", "servicio_negocio", ccsText, "", CCGetRequestParam("servicio_negocio", $Method, NULL), $this);
            $this->tipo = new clsControl(ccsLabel, "tipo", "tipo", ccsText, "", CCGetRequestParam("tipo", $Method, NULL), $this);
            $this->herr_est_cost = new clsControl(ccsLabel, "herr_est_cost", "herr_est_cost", ccsInteger, "", CCGetRequestParam("herr_est_cost", $Method, NULL), $this);
            $this->req_serv = new clsControl(ccsLabel, "req_serv", "req_serv", ccsInteger, "", CCGetRequestParam("req_serv", $Method, NULL), $this);
            $this->fecha_asignacion = new clsControl(ccsLabel, "fecha_asignacion", "fecha_asignacion", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("fecha_asignacion", $Method, NULL), $this);
            $this->fecha_entrega_prop = new clsControl(ccsLabel, "fecha_entrega_prop", "fecha_entrega_prop", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("fecha_entrega_prop", $Method, NULL), $this);
            $this->fecha_acepta_prop = new clsControl(ccsLabel, "fecha_acepta_prop", "fecha_acepta_prop", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("fecha_acepta_prop", $Method, NULL), $this);
            $this->horas_aprobadas = new clsControl(ccsLabel, "horas_aprobadas", "horas_aprobadas", ccsInteger, "", CCGetRequestParam("horas_aprobadas", $Method, NULL), $this);
            $this->tiempo_limite_entrega_prop = new clsControl(ccsLabel, "tiempo_limite_entrega_prop", "tiempo_limite_entrega_prop", ccsInteger, "", CCGetRequestParam("tiempo_limite_entrega_prop", $Method, NULL), $this);
            $this->ppmc_padre = new clsControl(ccsLabel, "ppmc_padre", "ppmc_padre", ccsInteger, "", CCGetRequestParam("ppmc_padre", $Method, NULL), $this);
            $this->serv_contractual = new clsControl(ccsLabel, "serv_contractual", "serv_contractual", ccsText, "", CCGetRequestParam("serv_contractual", $Method, NULL), $this);
            $this->tipo_nivel_servicio = new clsControl(ccsLabel, "tipo_nivel_servicio", "tipo_nivel_servicio", ccsText, "", CCGetRequestParam("tipo_nivel_servicio", $Method, NULL), $this);
            $this->estado_comparativo = new clsControl(ccsLabel, "estado_comparativo", "estado_comparativo", ccsText, "", CCGetRequestParam("estado_comparativo", $Method, NULL), $this);
            $this->id_periodo = new clsControl(ccsLabel, "id_periodo", "id_periodo", ccsInteger, "", CCGetRequestParam("id_periodo", $Method, NULL), $this);
            $this->id_proveedor = new clsControl(ccsLabel, "id_proveedor", "id_proveedor", ccsInteger, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->id_ppmc = new clsControl(ccsLabel, "id_ppmc", "id_ppmc", ccsText, "", CCGetRequestParam("id_ppmc", $Method, NULL), $this);
            $this->id_ppmc->HTML = true;
            $this->imgherr_est_cost = new clsControl(ccsImage, "imgherr_est_cost", "imgherr_est_cost", ccsText, "", CCGetRequestParam("imgherr_est_cost", $Method, NULL), $this);
            $this->imgreq_serv = new clsControl(ccsImage, "imgreq_serv", "imgreq_serv", ccsText, "", CCGetRequestParam("imgreq_serv", $Method, NULL), $this);
            if(!is_array($this->id_ppmc->Value) && !strlen($this->id_ppmc->Value) && $this->id_ppmc->Value !== false)
                $this->id_ppmc->SetText("<font color=red>ID NO REPORTADO</font>");
        }
    }
//End Class_Initialize Event

//Initialize Method @209-4E454E36
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urls_id_ppmc"] = CCGetFromGet("s_id_ppmc", NULL);
        $this->DataSource->Parameters["urls_id_periodo"] = CCGetFromGet("s_id_periodo", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_opt_slas"] = CCGetFromGet("s_opt_slas", NULL);
        $this->DataSource->Parameters["urls_id_estimacion"] = CCGetFromGet("s_id_estimacion", NULL);
    }
//End Initialize Method

//Validate Method @209-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @209-EE45306C
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_estimacion->Errors->Count());
        $errors = ($errors || $this->servicio_negocio->Errors->Count());
        $errors = ($errors || $this->tipo->Errors->Count());
        $errors = ($errors || $this->herr_est_cost->Errors->Count());
        $errors = ($errors || $this->req_serv->Errors->Count());
        $errors = ($errors || $this->fecha_asignacion->Errors->Count());
        $errors = ($errors || $this->fecha_entrega_prop->Errors->Count());
        $errors = ($errors || $this->fecha_acepta_prop->Errors->Count());
        $errors = ($errors || $this->horas_aprobadas->Errors->Count());
        $errors = ($errors || $this->tiempo_limite_entrega_prop->Errors->Count());
        $errors = ($errors || $this->ppmc_padre->Errors->Count());
        $errors = ($errors || $this->serv_contractual->Errors->Count());
        $errors = ($errors || $this->tipo_nivel_servicio->Errors->Count());
        $errors = ($errors || $this->estado_comparativo->Errors->Count());
        $errors = ($errors || $this->id_periodo->Errors->Count());
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->id_ppmc->Errors->Count());
        $errors = ($errors || $this->imgherr_est_cost->Errors->Count());
        $errors = ($errors || $this->imgreq_serv->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @209-17DC9883
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

//Show Method @209-4E38E372
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
                $this->id_estimacion->SetValue($this->DataSource->id_estimacion->GetValue());
                $this->servicio_negocio->SetValue($this->DataSource->servicio_negocio->GetValue());
                $this->tipo->SetValue($this->DataSource->tipo->GetValue());
                $this->herr_est_cost->SetValue($this->DataSource->herr_est_cost->GetValue());
                $this->req_serv->SetValue($this->DataSource->req_serv->GetValue());
                $this->fecha_asignacion->SetValue($this->DataSource->fecha_asignacion->GetValue());
                $this->fecha_entrega_prop->SetValue($this->DataSource->fecha_entrega_prop->GetValue());
                $this->fecha_acepta_prop->SetValue($this->DataSource->fecha_acepta_prop->GetValue());
                $this->horas_aprobadas->SetValue($this->DataSource->horas_aprobadas->GetValue());
                $this->tiempo_limite_entrega_prop->SetValue($this->DataSource->tiempo_limite_entrega_prop->GetValue());
                $this->ppmc_padre->SetValue($this->DataSource->ppmc_padre->GetValue());
                $this->serv_contractual->SetValue($this->DataSource->serv_contractual->GetValue());
                $this->tipo_nivel_servicio->SetValue($this->DataSource->tipo_nivel_servicio->GetValue());
                $this->estado_comparativo->SetValue($this->DataSource->estado_comparativo->GetValue());
                $this->id_periodo->SetValue($this->DataSource->id_periodo->GetValue());
                $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                $this->id_ppmc->SetValue($this->DataSource->id_ppmc->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_estimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->servicio_negocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tipo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->herr_est_cost->Errors->ToString());
            $Error = ComposeStrings($Error, $this->req_serv->Errors->ToString());
            $Error = ComposeStrings($Error, $this->fecha_asignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->fecha_entrega_prop->Errors->ToString());
            $Error = ComposeStrings($Error, $this->fecha_acepta_prop->Errors->ToString());
            $Error = ComposeStrings($Error, $this->horas_aprobadas->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tiempo_limite_entrega_prop->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ppmc_padre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->serv_contractual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tipo_nivel_servicio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->estado_comparativo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_periodo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_ppmc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->imgherr_est_cost->Errors->ToString());
            $Error = ComposeStrings($Error, $this->imgreq_serv->Errors->ToString());
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

        $this->id_estimacion->Show();
        $this->servicio_negocio->Show();
        $this->tipo->Show();
        $this->herr_est_cost->Show();
        $this->req_serv->Show();
        $this->fecha_asignacion->Show();
        $this->fecha_entrega_prop->Show();
        $this->fecha_acepta_prop->Show();
        $this->horas_aprobadas->Show();
        $this->tiempo_limite_entrega_prop->Show();
        $this->ppmc_padre->Show();
        $this->serv_contractual->Show();
        $this->tipo_nivel_servicio->Show();
        $this->estado_comparativo->Show();
        $this->id_periodo->Show();
        $this->id_proveedor->Show();
        $this->id_ppmc->Show();
        $this->imgherr_est_cost->Show();
        $this->imgreq_serv->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End result_comparativo_apertu1 Class @209-FCB6E20C

class clsresult_comparativo_apertu1DataSource extends clsDBcnDisenio {  //result_comparativo_apertu1DataSource Class @209-4CA32D76

//DataSource Variables @209-370876C4
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $id_estimacion;
    public $servicio_negocio;
    public $tipo;
    public $herr_est_cost;
    public $req_serv;
    public $fecha_asignacion;
    public $fecha_entrega_prop;
    public $fecha_acepta_prop;
    public $horas_aprobadas;
    public $tiempo_limite_entrega_prop;
    public $ppmc_padre;
    public $serv_contractual;
    public $tipo_nivel_servicio;
    public $estado_comparativo;
    public $id_periodo;
    public $id_proveedor;
    public $id_ppmc;
    public $imgherr_est_cost;
    public $imgreq_serv;
//End DataSource Variables

//DataSourceClass_Initialize Event @209-5BEA4D70
    function clsresult_comparativo_apertu1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record result_comparativo_apertu1/Error";
        $this->Initialize();
        $this->id_estimacion = new clsField("id_estimacion", ccsInteger, "");
        
        $this->servicio_negocio = new clsField("servicio_negocio", ccsText, "");
        
        $this->tipo = new clsField("tipo", ccsText, "");
        
        $this->herr_est_cost = new clsField("herr_est_cost", ccsInteger, "");
        
        $this->req_serv = new clsField("req_serv", ccsInteger, "");
        
        $this->fecha_asignacion = new clsField("fecha_asignacion", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->fecha_entrega_prop = new clsField("fecha_entrega_prop", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->fecha_acepta_prop = new clsField("fecha_acepta_prop", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->horas_aprobadas = new clsField("horas_aprobadas", ccsInteger, "");
        
        $this->tiempo_limite_entrega_prop = new clsField("tiempo_limite_entrega_prop", ccsInteger, "");
        
        $this->ppmc_padre = new clsField("ppmc_padre", ccsInteger, "");
        
        $this->serv_contractual = new clsField("serv_contractual", ccsText, "");
        
        $this->tipo_nivel_servicio = new clsField("tipo_nivel_servicio", ccsText, "");
        
        $this->estado_comparativo = new clsField("estado_comparativo", ccsText, "");
        
        $this->id_periodo = new clsField("id_periodo", ccsInteger, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->id_ppmc = new clsField("id_ppmc", ccsText, "");
        
        $this->imgherr_est_cost = new clsField("imgherr_est_cost", ccsText, "");
        
        $this->imgreq_serv = new clsField("imgreq_serv", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @209-3CDFDC7D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_ppmc", ccsInteger, "", "", $this->Parameters["urls_id_ppmc"], "", false);
        $this->wp->AddParameter("2", "urls_id_periodo", ccsInteger, "", "", $this->Parameters["urls_id_periodo"], "", false);
        $this->wp->AddParameter("3", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], "", false);
        $this->wp->AddParameter("4", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], "", false);
        $this->wp->AddParameter("6", "urls_id_estimacion", ccsInteger, "", "", $this->Parameters["urls_id_estimacion"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_ppmc", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "id_periodo", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "id_proveedor", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opEqual, "tipo_nivel_servicio", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = "( estado_comparativo = 'REGISTRO CAPC' OR estado_comparativo = 'REG. CAPC QUE NO CARGO CDS' )";
        $this->wp->Criterion[6] = $this->wp->Operation(opEqual, "id_estimacion", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]);
    }
//End Prepare Method

//Open Method @209-42CC883A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM result_comparativo_aperturas {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @209-056C2642
    function SetValues()
    {
        $this->id_estimacion->SetDBValue(trim($this->f("id_estimacion")));
        $this->servicio_negocio->SetDBValue($this->f("servicio_negocio"));
        $this->tipo->SetDBValue($this->f("tipo"));
        $this->herr_est_cost->SetDBValue(trim($this->f("herr_est_cost")));
        $this->req_serv->SetDBValue(trim($this->f("req_serv")));
        $this->fecha_asignacion->SetDBValue(trim($this->f("fecha_asignacion")));
        $this->fecha_entrega_prop->SetDBValue(trim($this->f("fecha_entrega_prop")));
        $this->fecha_acepta_prop->SetDBValue(trim($this->f("fecha_acepta_prop")));
        $this->horas_aprobadas->SetDBValue(trim($this->f("horas_aprobadas")));
        $this->tiempo_limite_entrega_prop->SetDBValue(trim($this->f("tiempo_limite_entrega_prop")));
        $this->ppmc_padre->SetDBValue(trim($this->f("ppmc_padre")));
        $this->serv_contractual->SetDBValue($this->f("serv_contractual"));
        $this->tipo_nivel_servicio->SetDBValue($this->f("tipo_nivel_servicio"));
        $this->estado_comparativo->SetDBValue($this->f("estado_comparativo"));
        $this->id_periodo->SetDBValue(trim($this->f("id_periodo")));
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->id_ppmc->SetDBValue($this->f("id_ppmc"));
    }
//End SetValues Method

} //End result_comparativo_apertu1DataSource Class @209-FCB6E20C

class clsRecordresult_comparativo_apertu2 { //result_comparativo_apertu2 Class @239-3610340B

//Variables @239-9E315808

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

//Class_Initialize Event @239-34AD10DC
    function clsRecordresult_comparativo_apertu2($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record result_comparativo_apertu2/Error";
        $this->DataSource = new clsresult_comparativo_apertu2DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "result_comparativo_apertu2";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->id_estimacion = new clsControl(ccsLabel, "id_estimacion", "id_estimacion", ccsInteger, "", CCGetRequestParam("id_estimacion", $Method, NULL), $this);
            $this->servicio_negocio = new clsControl(ccsLabel, "servicio_negocio", "servicio_negocio", ccsText, "", CCGetRequestParam("servicio_negocio", $Method, NULL), $this);
            $this->tipo = new clsControl(ccsLabel, "tipo", "tipo", ccsText, "", CCGetRequestParam("tipo", $Method, NULL), $this);
            $this->herr_est_cost = new clsControl(ccsLabel, "herr_est_cost", "herr_est_cost", ccsInteger, "", CCGetRequestParam("herr_est_cost", $Method, NULL), $this);
            $this->req_serv = new clsControl(ccsLabel, "req_serv", "req_serv", ccsInteger, "", CCGetRequestParam("req_serv", $Method, NULL), $this);
            $this->fecha_asignacion = new clsControl(ccsLabel, "fecha_asignacion", "fecha_asignacion", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("fecha_asignacion", $Method, NULL), $this);
            $this->fecha_entrega_prop = new clsControl(ccsLabel, "fecha_entrega_prop", "fecha_entrega_prop", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("fecha_entrega_prop", $Method, NULL), $this);
            $this->fecha_acepta_prop = new clsControl(ccsLabel, "fecha_acepta_prop", "fecha_acepta_prop", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("fecha_acepta_prop", $Method, NULL), $this);
            $this->horas_aprobadas = new clsControl(ccsLabel, "horas_aprobadas", "horas_aprobadas", ccsInteger, "", CCGetRequestParam("horas_aprobadas", $Method, NULL), $this);
            $this->tiempo_limite_entrega_prop = new clsControl(ccsLabel, "tiempo_limite_entrega_prop", "tiempo_limite_entrega_prop", ccsInteger, "", CCGetRequestParam("tiempo_limite_entrega_prop", $Method, NULL), $this);
            $this->ppmc_padre = new clsControl(ccsLabel, "ppmc_padre", "ppmc_padre", ccsInteger, "", CCGetRequestParam("ppmc_padre", $Method, NULL), $this);
            $this->serv_contractual = new clsControl(ccsLabel, "serv_contractual", "serv_contractual", ccsText, "", CCGetRequestParam("serv_contractual", $Method, NULL), $this);
            $this->tipo_nivel_servicio = new clsControl(ccsLabel, "tipo_nivel_servicio", "tipo_nivel_servicio", ccsText, "", CCGetRequestParam("tipo_nivel_servicio", $Method, NULL), $this);
            $this->id_periodo = new clsControl(ccsLabel, "id_periodo", "id_periodo", ccsInteger, "", CCGetRequestParam("id_periodo", $Method, NULL), $this);
            $this->id_proveedor = new clsControl(ccsLabel, "id_proveedor", "id_proveedor", ccsInteger, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->id_ppmc = new clsControl(ccsLabel, "id_ppmc", "id_ppmc", ccsText, "", CCGetRequestParam("id_ppmc", $Method, NULL), $this);
            $this->id_ppmc->HTML = true;
            $this->imgherr_est_cost = new clsControl(ccsImage, "imgherr_est_cost", "imgherr_est_cost", ccsText, "", CCGetRequestParam("imgherr_est_cost", $Method, NULL), $this);
            $this->imgreq_serv = new clsControl(ccsImage, "imgreq_serv", "imgreq_serv", ccsText, "", CCGetRequestParam("imgreq_serv", $Method, NULL), $this);
            if(!is_array($this->id_ppmc->Value) && !strlen($this->id_ppmc->Value) && $this->id_ppmc->Value !== false)
                $this->id_ppmc->SetText("<font color=red>ID NO REPORTADO</font>");
        }
    }
//End Class_Initialize Event

//Initialize Method @239-4E454E36
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urls_id_ppmc"] = CCGetFromGet("s_id_ppmc", NULL);
        $this->DataSource->Parameters["urls_id_periodo"] = CCGetFromGet("s_id_periodo", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_opt_slas"] = CCGetFromGet("s_opt_slas", NULL);
        $this->DataSource->Parameters["urls_id_estimacion"] = CCGetFromGet("s_id_estimacion", NULL);
    }
//End Initialize Method

//Validate Method @239-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @239-E382A32F
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_estimacion->Errors->Count());
        $errors = ($errors || $this->servicio_negocio->Errors->Count());
        $errors = ($errors || $this->tipo->Errors->Count());
        $errors = ($errors || $this->herr_est_cost->Errors->Count());
        $errors = ($errors || $this->req_serv->Errors->Count());
        $errors = ($errors || $this->fecha_asignacion->Errors->Count());
        $errors = ($errors || $this->fecha_entrega_prop->Errors->Count());
        $errors = ($errors || $this->fecha_acepta_prop->Errors->Count());
        $errors = ($errors || $this->horas_aprobadas->Errors->Count());
        $errors = ($errors || $this->tiempo_limite_entrega_prop->Errors->Count());
        $errors = ($errors || $this->ppmc_padre->Errors->Count());
        $errors = ($errors || $this->serv_contractual->Errors->Count());
        $errors = ($errors || $this->tipo_nivel_servicio->Errors->Count());
        $errors = ($errors || $this->id_periodo->Errors->Count());
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->id_ppmc->Errors->Count());
        $errors = ($errors || $this->imgherr_est_cost->Errors->Count());
        $errors = ($errors || $this->imgreq_serv->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @239-17DC9883
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

//Show Method @239-8C0BA5BC
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
                $this->id_estimacion->SetValue($this->DataSource->id_estimacion->GetValue());
                $this->servicio_negocio->SetValue($this->DataSource->servicio_negocio->GetValue());
                $this->tipo->SetValue($this->DataSource->tipo->GetValue());
                $this->herr_est_cost->SetValue($this->DataSource->herr_est_cost->GetValue());
                $this->req_serv->SetValue($this->DataSource->req_serv->GetValue());
                $this->fecha_asignacion->SetValue($this->DataSource->fecha_asignacion->GetValue());
                $this->fecha_entrega_prop->SetValue($this->DataSource->fecha_entrega_prop->GetValue());
                $this->fecha_acepta_prop->SetValue($this->DataSource->fecha_acepta_prop->GetValue());
                $this->horas_aprobadas->SetValue($this->DataSource->horas_aprobadas->GetValue());
                $this->tiempo_limite_entrega_prop->SetValue($this->DataSource->tiempo_limite_entrega_prop->GetValue());
                $this->ppmc_padre->SetValue($this->DataSource->ppmc_padre->GetValue());
                $this->serv_contractual->SetValue($this->DataSource->serv_contractual->GetValue());
                $this->tipo_nivel_servicio->SetValue($this->DataSource->tipo_nivel_servicio->GetValue());
                $this->id_periodo->SetValue($this->DataSource->id_periodo->GetValue());
                $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                $this->id_ppmc->SetValue($this->DataSource->id_ppmc->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_estimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->servicio_negocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tipo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->herr_est_cost->Errors->ToString());
            $Error = ComposeStrings($Error, $this->req_serv->Errors->ToString());
            $Error = ComposeStrings($Error, $this->fecha_asignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->fecha_entrega_prop->Errors->ToString());
            $Error = ComposeStrings($Error, $this->fecha_acepta_prop->Errors->ToString());
            $Error = ComposeStrings($Error, $this->horas_aprobadas->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tiempo_limite_entrega_prop->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ppmc_padre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->serv_contractual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tipo_nivel_servicio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_periodo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_ppmc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->imgherr_est_cost->Errors->ToString());
            $Error = ComposeStrings($Error, $this->imgreq_serv->Errors->ToString());
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

        $this->id_estimacion->Show();
        $this->servicio_negocio->Show();
        $this->tipo->Show();
        $this->herr_est_cost->Show();
        $this->req_serv->Show();
        $this->fecha_asignacion->Show();
        $this->fecha_entrega_prop->Show();
        $this->fecha_acepta_prop->Show();
        $this->horas_aprobadas->Show();
        $this->tiempo_limite_entrega_prop->Show();
        $this->ppmc_padre->Show();
        $this->serv_contractual->Show();
        $this->tipo_nivel_servicio->Show();
        $this->id_periodo->Show();
        $this->id_proveedor->Show();
        $this->id_ppmc->Show();
        $this->imgherr_est_cost->Show();
        $this->imgreq_serv->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End result_comparativo_apertu2 Class @239-FCB6E20C

class clsresult_comparativo_apertu2DataSource extends clsDBcnDisenio {  //result_comparativo_apertu2DataSource Class @239-17B49C63

//DataSource Variables @239-5769BB09
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $id_estimacion;
    public $servicio_negocio;
    public $tipo;
    public $herr_est_cost;
    public $req_serv;
    public $fecha_asignacion;
    public $fecha_entrega_prop;
    public $fecha_acepta_prop;
    public $horas_aprobadas;
    public $tiempo_limite_entrega_prop;
    public $ppmc_padre;
    public $serv_contractual;
    public $tipo_nivel_servicio;
    public $id_periodo;
    public $id_proveedor;
    public $id_ppmc;
    public $imgherr_est_cost;
    public $imgreq_serv;
//End DataSource Variables

//DataSourceClass_Initialize Event @239-841BF484
    function clsresult_comparativo_apertu2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record result_comparativo_apertu2/Error";
        $this->Initialize();
        $this->id_estimacion = new clsField("id_estimacion", ccsInteger, "");
        
        $this->servicio_negocio = new clsField("servicio_negocio", ccsText, "");
        
        $this->tipo = new clsField("tipo", ccsText, "");
        
        $this->herr_est_cost = new clsField("herr_est_cost", ccsInteger, "");
        
        $this->req_serv = new clsField("req_serv", ccsInteger, "");
        
        $this->fecha_asignacion = new clsField("fecha_asignacion", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->fecha_entrega_prop = new clsField("fecha_entrega_prop", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->fecha_acepta_prop = new clsField("fecha_acepta_prop", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->horas_aprobadas = new clsField("horas_aprobadas", ccsInteger, "");
        
        $this->tiempo_limite_entrega_prop = new clsField("tiempo_limite_entrega_prop", ccsInteger, "");
        
        $this->ppmc_padre = new clsField("ppmc_padre", ccsInteger, "");
        
        $this->serv_contractual = new clsField("serv_contractual", ccsText, "");
        
        $this->tipo_nivel_servicio = new clsField("tipo_nivel_servicio", ccsText, "");
        
        $this->id_periodo = new clsField("id_periodo", ccsInteger, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->id_ppmc = new clsField("id_ppmc", ccsText, "");
        
        $this->imgherr_est_cost = new clsField("imgherr_est_cost", ccsText, "");
        
        $this->imgreq_serv = new clsField("imgreq_serv", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @239-6C98C05A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_ppmc", ccsInteger, "", "", $this->Parameters["urls_id_ppmc"], "", false);
        $this->wp->AddParameter("2", "urls_id_periodo", ccsInteger, "", "", $this->Parameters["urls_id_periodo"], "", false);
        $this->wp->AddParameter("3", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], "", false);
        $this->wp->AddParameter("4", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], "", false);
        $this->wp->AddParameter("6", "urls_id_estimacion", ccsInteger, "", "", $this->Parameters["urls_id_estimacion"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_ppmc", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "id_periodo", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "id_proveedor", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opEqual, "tipo_nivel_servicio", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = "( estado_comparativo = 'REGISTRO CDS'  or estado_comparativo = 'REG. CDS QUE NO CARGO CAPC' )";
        $this->wp->Criterion[6] = $this->wp->Operation(opEqual, "id_estimacion", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]);
    }
//End Prepare Method

//Open Method @239-42CC883A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM result_comparativo_aperturas {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @239-A4B386CD
    function SetValues()
    {
        $this->id_estimacion->SetDBValue(trim($this->f("id_estimacion")));
        $this->servicio_negocio->SetDBValue($this->f("servicio_negocio"));
        $this->tipo->SetDBValue($this->f("tipo"));
        $this->herr_est_cost->SetDBValue(trim($this->f("herr_est_cost")));
        $this->req_serv->SetDBValue(trim($this->f("req_serv")));
        $this->fecha_asignacion->SetDBValue(trim($this->f("fecha_asignacion")));
        $this->fecha_entrega_prop->SetDBValue(trim($this->f("fecha_entrega_prop")));
        $this->fecha_acepta_prop->SetDBValue(trim($this->f("fecha_acepta_prop")));
        $this->horas_aprobadas->SetDBValue(trim($this->f("horas_aprobadas")));
        $this->tiempo_limite_entrega_prop->SetDBValue(trim($this->f("tiempo_limite_entrega_prop")));
        $this->ppmc_padre->SetDBValue(trim($this->f("ppmc_padre")));
        $this->serv_contractual->SetDBValue($this->f("serv_contractual"));
        $this->tipo_nivel_servicio->SetDBValue($this->f("tipo_nivel_servicio"));
        $this->id_periodo->SetDBValue(trim($this->f("id_periodo")));
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->id_ppmc->SetDBValue($this->f("id_ppmc"));
    }
//End SetValues Method

} //End result_comparativo_apertu2DataSource Class @239-FCB6E20C



//Initialize Page @1-AE2D8E93
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
$TemplateFileName = "comparativo_apertura.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-CB7BA48A
include_once("./comparativo_apertura_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-A4A5DB29
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$periodos_carga = new clsRecordperiodos_carga("", $MainPage);
$result_comparativo_apertu = new clsGridresult_comparativo_apertu("", $MainPage);
$result_comparativo_apertu1 = new clsRecordresult_comparativo_apertu1("", $MainPage);
$result_comparativo_apertu2 = new clsRecordresult_comparativo_apertu2("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->periodos_carga = & $periodos_carga;
$MainPage->result_comparativo_apertu = & $result_comparativo_apertu;
$MainPage->result_comparativo_apertu1 = & $result_comparativo_apertu1;
$MainPage->result_comparativo_apertu2 = & $result_comparativo_apertu2;
$result_comparativo_apertu->Initialize();
$result_comparativo_apertu1->Initialize();
$result_comparativo_apertu2->Initialize();
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

//Execute Components @1-D19D6BBF
$result_comparativo_apertu2->Operation();
$result_comparativo_apertu1->Operation();
$periodos_carga->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-34D45CD7
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($periodos_carga);
    unset($result_comparativo_apertu);
    unset($result_comparativo_apertu1);
    unset($result_comparativo_apertu2);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-412A9015
$Header->Show();
$periodos_carga->Show();
$result_comparativo_apertu->Show();
$result_comparativo_apertu1->Show();
$result_comparativo_apertu2->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-62AF03F5
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($periodos_carga);
unset($result_comparativo_apertu);
unset($result_comparativo_apertu1);
unset($result_comparativo_apertu2);
unset($Tpl);
//End Unload Page


?>
