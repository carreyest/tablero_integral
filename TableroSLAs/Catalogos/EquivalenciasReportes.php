<?php
//Include Common Files @1-3B82CEBC
define("RelativePath", "..");
define("PathToCurrentPage", "/Catalogos/");
define("FileName", "EquivalenciasReportes.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordGrid2 { //Grid2 Class @30-542C3E47

//Variables @30-9E315808

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

//Class_Initialize Event @30-4B8641F4
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
            $this->s_id_admon = new clsControl(ccsTextBox, "s_id_admon", "Id Admon", ccsText, "", CCGetRequestParam("s_id_admon", $Method, NULL), $this);
            $this->s_id_servicio = new clsControl(ccsTextBox, "s_id_servicio", "Id Servicio", ccsText, "", CCGetRequestParam("s_id_servicio", $Method, NULL), $this);
            $this->s_id_rape = new clsControl(ccsTextBox, "s_id_rape", "Id Rape", ccsText, "", CCGetRequestParam("s_id_rape", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @30-BE269252
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_admon->Validate() && $Validation);
        $Validation = ($this->s_id_servicio->Validate() && $Validation);
        $Validation = ($this->s_id_rape->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_admon->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_servicio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_rape->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @30-CE33C648
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_admon->Errors->Count());
        $errors = ($errors || $this->s_id_servicio->Errors->Count());
        $errors = ($errors || $this->s_id_rape->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @30-3B36955C
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
        $Redirect = "EquivalenciasReportes.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "EquivalenciasReportes.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @30-5F7C3A0D
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
            $Error = ComposeStrings($Error, $this->s_id_admon->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_servicio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_rape->Errors->ToString());
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
        $this->s_id_admon->Show();
        $this->s_id_servicio->Show();
        $this->s_id_rape->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End Grid2 Class @30-FCB6E20C

class clsGridGrid1 { //Grid1 class @3-E857A572

//Variables @3-5D2C745D

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
    public $Sorter_id_mapeo;
    public $Sorter_administracion;
    public $Sorter_servicio_negocio;
    public $Sorter_rape;
//End Variables

//Class_Initialize Event @3-AE609558
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
            $this->PageSize = 10;
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

        $this->id_mapeo = new clsControl(ccsLink, "id_mapeo", "id_mapeo", ccsInteger, "", CCGetRequestParam("id_mapeo", ccsGet, NULL), $this);
        $this->id_mapeo->Page = "";
        $this->administracion = new clsControl(ccsLabel, "administracion", "administracion", ccsText, "", CCGetRequestParam("administracion", ccsGet, NULL), $this);
        $this->servicio_negocio = new clsControl(ccsLink, "servicio_negocio", "servicio_negocio", ccsText, "", CCGetRequestParam("servicio_negocio", ccsGet, NULL), $this);
        $this->servicio_negocio->Page = "";
        $this->rape = new clsControl(ccsLink, "rape", "rape", ccsText, "", CCGetRequestParam("rape", ccsGet, NULL), $this);
        $this->rape->Page = "";
        $this->Grid1_Insert = new clsControl(ccsLink, "Grid1_Insert", "Grid1_Insert", ccsText, "", CCGetRequestParam("Grid1_Insert", ccsGet, NULL), $this);
        $this->Grid1_Insert->Parameters = CCGetQueryString("QueryString", array("id_mapeo", "ccsForm"));
        $this->Grid1_Insert->Page = "EquivalenciasReportes.php";
        $this->Grid1_TotalRecords = new clsControl(ccsLabel, "Grid1_TotalRecords", "Grid1_TotalRecords", ccsText, "", CCGetRequestParam("Grid1_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_id_mapeo = new clsSorter($this->ComponentName, "Sorter_id_mapeo", $FileName, $this);
        $this->Sorter_administracion = new clsSorter($this->ComponentName, "Sorter_administracion", $FileName, $this);
        $this->Sorter_servicio_negocio = new clsSorter($this->ComponentName, "Sorter_servicio_negocio", $FileName, $this);
        $this->Sorter_rape = new clsSorter($this->ComponentName, "Sorter_rape", $FileName, $this);
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

//Show Method @3-54FD3420
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_rape"] = CCGetFromGet("s_id_rape", NULL);
        $this->DataSource->Parameters["urls_id_admon"] = CCGetFromGet("s_id_admon", NULL);
        $this->DataSource->Parameters["urls_id_servicio"] = CCGetFromGet("s_id_servicio", NULL);

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
            $this->ControlsVisible["id_mapeo"] = $this->id_mapeo->Visible;
            $this->ControlsVisible["administracion"] = $this->administracion->Visible;
            $this->ControlsVisible["servicio_negocio"] = $this->servicio_negocio->Visible;
            $this->ControlsVisible["rape"] = $this->rape->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->id_mapeo->SetValue($this->DataSource->id_mapeo->GetValue());
                $this->id_mapeo->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->id_mapeo->Parameters = CCAddParam($this->id_mapeo->Parameters, "id_mapeo", $this->DataSource->f("id_mapeo"));
                $this->administracion->SetValue($this->DataSource->administracion->GetValue());
                $this->servicio_negocio->SetValue($this->DataSource->servicio_negocio->GetValue());
                $this->servicio_negocio->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->servicio_negocio->Parameters = CCAddParam($this->servicio_negocio->Parameters, "id_servicio", $this->DataSource->f("id_servicio"));
                $this->rape->SetValue($this->DataSource->rape->GetValue());
                $this->rape->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->rape->Parameters = CCAddParam($this->rape->Parameters, "id_rape", $this->DataSource->f("id_rape"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id_mapeo->Show();
                $this->administracion->Show();
                $this->servicio_negocio->Show();
                $this->rape->Show();
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
        $this->Grid1_Insert->Show();
        $this->Grid1_TotalRecords->Show();
        $this->Sorter_id_mapeo->Show();
        $this->Sorter_administracion->Show();
        $this->Sorter_servicio_negocio->Show();
        $this->Sorter_rape->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-2BF2F587
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->id_mapeo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->administracion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->servicio_negocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->rape->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @3-FCB6E20C

class clsGrid1DataSource extends clsDBConnCarga {  //Grid1DataSource Class @3-112C61C3

//DataSource Variables @3-D125905C
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $id_mapeo;
    public $administracion;
    public $servicio_negocio;
    public $rape;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-B1907687
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->id_mapeo = new clsField("id_mapeo", ccsInteger, "");
        
        $this->administracion = new clsField("administracion", ccsText, "");
        
        $this->servicio_negocio = new clsField("servicio_negocio", ccsText, "");
        
        $this->rape = new clsField("rape", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-7FA9FFD7
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_id_mapeo" => array("id_mapeo", ""), 
            "Sorter_administracion" => array("administracion", ""), 
            "Sorter_servicio_negocio" => array("servicio_negocio", ""), 
            "Sorter_rape" => array("rape", "")));
    }
//End SetOrder Method

//Prepare Method @3-6FDF9F11
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_rape", ccsText, "", "", $this->Parameters["urls_id_rape"], "", false);
        $this->wp->AddParameter("2", "urls_id_admon", ccsText, "", "", $this->Parameters["urls_id_admon"], "", false);
        $this->wp->AddParameter("3", "urls_id_servicio", ccsText, "", "", $this->Parameters["urls_id_servicio"], "", false);
    }
//End Prepare Method

//Open Method @3-1D974C9F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select m.id_mapeo, a.administracion, s.servicio_negocio,  r.rape , r.id_rape, s.id_servicio\n" .
        "from c_mapeo_admin_serv_rape_repo m \n" .
        "inner join c_administracion_repo a on m.id_admon=a.id_admon\n" .
        "inner join c_rape_repo r on    m.id_rape=r.id_rape\n" .
        "inner join c_servicio_negocio_repo s on m.id_servicio=s.id_servicio \n" .
        "where a.administracion like '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "	and s.servicio_negocio like '%" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "%'\n" .
        "	and r.rape like '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') cnt";
        $this->SQL = "select m.id_mapeo, a.administracion, s.servicio_negocio,  r.rape , r.id_rape, s.id_servicio\n" .
        "from c_mapeo_admin_serv_rape_repo m \n" .
        "inner join c_administracion_repo a on m.id_admon=a.id_admon\n" .
        "inner join c_rape_repo r on    m.id_rape=r.id_rape\n" .
        "inner join c_servicio_negocio_repo s on m.id_servicio=s.id_servicio \n" .
        "where a.administracion like '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "	and s.servicio_negocio like '%" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "%'\n" .
        "	and r.rape like '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'";
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

//SetValues Method @3-3F884304
    function SetValues()
    {
        $this->id_mapeo->SetDBValue(trim($this->f("id_mapeo")));
        $this->administracion->SetDBValue($this->f("administracion"));
        $this->servicio_negocio->SetDBValue($this->f("servicio_negocio"));
        $this->rape->SetDBValue($this->f("rape"));
    }
//End SetValues Method

} //End Grid1DataSource Class @3-FCB6E20C

class clsRecordc_mapeo_admin_serv_rape_r { //c_mapeo_admin_serv_rape_r Class @17-BFE2F1B1

//Variables @17-9E315808

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

//Class_Initialize Event @17-324AEB8C
    function clsRecordc_mapeo_admin_serv_rape_r($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record c_mapeo_admin_serv_rape_r/Error";
        $this->DataSource = new clsc_mapeo_admin_serv_rape_rDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "c_mapeo_admin_serv_rape_r";
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
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->id_admon = new clsControl(ccsListBox, "id_admon", "Id Admon", ccsText, "", CCGetRequestParam("id_admon", $Method, NULL), $this);
            $this->id_admon->DSType = dsTable;
            $this->id_admon->DataSource = new clsDBConnCarga();
            $this->id_admon->ds = & $this->id_admon->DataSource;
            $this->id_admon->DataSource->SQL = "SELECT * \n" .
"FROM c_administracion_repo {SQL_Where} {SQL_OrderBy}";
            list($this->id_admon->BoundColumn, $this->id_admon->TextColumn, $this->id_admon->DBFormat) = array("id_admon", "administracion", "");
            $this->id_admon->Required = true;
            $this->id_servicio = new clsControl(ccsListBox, "id_servicio", "Id Servicio", ccsText, "", CCGetRequestParam("id_servicio", $Method, NULL), $this);
            $this->id_servicio->DSType = dsTable;
            $this->id_servicio->DataSource = new clsDBConnCarga();
            $this->id_servicio->ds = & $this->id_servicio->DataSource;
            $this->id_servicio->DataSource->SQL = "SELECT * \n" .
"FROM c_servicio_negocio_repo {SQL_Where} {SQL_OrderBy}";
            list($this->id_servicio->BoundColumn, $this->id_servicio->TextColumn, $this->id_servicio->DBFormat) = array("id_servicio", "servicio_negocio", "");
            $this->id_servicio->Required = true;
            $this->id_rape = new clsControl(ccsListBox, "id_rape", "Id Rape", ccsText, "", CCGetRequestParam("id_rape", $Method, NULL), $this);
            $this->id_rape->DSType = dsTable;
            $this->id_rape->DataSource = new clsDBConnCarga();
            $this->id_rape->ds = & $this->id_rape->DataSource;
            $this->id_rape->DataSource->SQL = "SELECT * \n" .
"FROM c_rape_repo {SQL_Where} {SQL_OrderBy}";
            list($this->id_rape->BoundColumn, $this->id_rape->TextColumn, $this->id_rape->DBFormat) = array("id_rape", "rape", "");
            $this->id_rape->Required = true;
            $this->id_administrador = new clsControl(ccsListBox, "id_administrador", "Id Administrador", ccsText, "", CCGetRequestParam("id_administrador", $Method, NULL), $this);
            $this->id_administrador->DSType = dsTable;
            $this->id_administrador->DataSource = new clsDBConnCarga();
            $this->id_administrador->ds = & $this->id_administrador->DataSource;
            $this->id_administrador->DataSource->SQL = "SELECT * \n" .
"FROM c_administrador_repo {SQL_Where} {SQL_OrderBy}";
            list($this->id_administrador->BoundColumn, $this->id_administrador->TextColumn, $this->id_administrador->DBFormat) = array("id_administrador", "administrador", "");
            $this->id_administrador->Required = true;
            $this->estatus = new clsControl(ccsCheckBox, "estatus", "estatus", ccsText, "", CCGetRequestParam("estatus", $Method, NULL), $this);
            $this->estatus->CheckedValue = $this->estatus->GetParsedValue(1);
            $this->estatus->UncheckedValue = $this->estatus->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->estatus->Value) && !strlen($this->estatus->Value) && $this->estatus->Value !== false)
                    $this->estatus->SetValue(true);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @17-D486B2A8
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlid_mapeo"] = CCGetFromGet("id_mapeo", NULL);
    }
//End Initialize Method

//Validate Method @17-4FE01126
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->id_admon->Validate() && $Validation);
        $Validation = ($this->id_servicio->Validate() && $Validation);
        $Validation = ($this->id_rape->Validate() && $Validation);
        $Validation = ($this->id_administrador->Validate() && $Validation);
        $Validation = ($this->estatus->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->id_admon->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_servicio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_rape->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_administrador->Errors->Count() == 0);
        $Validation =  $Validation && ($this->estatus->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @17-29306155
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_admon->Errors->Count());
        $errors = ($errors || $this->id_servicio->Errors->Count());
        $errors = ($errors || $this->id_rape->Errors->Count());
        $errors = ($errors || $this->id_administrador->Errors->Count());
        $errors = ($errors || $this->estatus->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @17-288F0419
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
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
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

//InsertRow Method @17-AB9E4677
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->id_admon->SetValue($this->id_admon->GetValue(true));
        $this->DataSource->id_servicio->SetValue($this->id_servicio->GetValue(true));
        $this->DataSource->id_rape->SetValue($this->id_rape->GetValue(true));
        $this->DataSource->id_administrador->SetValue($this->id_administrador->GetValue(true));
        $this->DataSource->estatus->SetValue($this->estatus->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @17-53D2E03B
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id_admon->SetValue($this->id_admon->GetValue(true));
        $this->DataSource->id_servicio->SetValue($this->id_servicio->GetValue(true));
        $this->DataSource->id_rape->SetValue($this->id_rape->GetValue(true));
        $this->DataSource->id_administrador->SetValue($this->id_administrador->GetValue(true));
        $this->DataSource->estatus->SetValue($this->estatus->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @17-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @17-B3B714AA
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

        $this->id_admon->Prepare();
        $this->id_servicio->Prepare();
        $this->id_rape->Prepare();
        $this->id_administrador->Prepare();

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
                    $this->id_admon->SetValue($this->DataSource->id_admon->GetValue());
                    $this->id_servicio->SetValue($this->DataSource->id_servicio->GetValue());
                    $this->id_rape->SetValue($this->DataSource->id_rape->GetValue());
                    $this->id_administrador->SetValue($this->DataSource->id_administrador->GetValue());
                    $this->estatus->SetValue($this->DataSource->estatus->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_admon->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_servicio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_rape->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_administrador->Errors->ToString());
            $Error = ComposeStrings($Error, $this->estatus->Errors->ToString());
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

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->id_admon->Show();
        $this->id_servicio->Show();
        $this->id_rape->Show();
        $this->id_administrador->Show();
        $this->estatus->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End c_mapeo_admin_serv_rape_r Class @17-FCB6E20C

class clsc_mapeo_admin_serv_rape_rDataSource extends clsDBConnCarga {  //c_mapeo_admin_serv_rape_rDataSource Class @17-2F36FF3F

//DataSource Variables @17-83B7691B
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $DeleteParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $id_admon;
    public $id_servicio;
    public $id_rape;
    public $id_administrador;
    public $estatus;
//End DataSource Variables

//DataSourceClass_Initialize Event @17-EC433D92
    function clsc_mapeo_admin_serv_rape_rDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record c_mapeo_admin_serv_rape_r/Error";
        $this->Initialize();
        $this->id_admon = new clsField("id_admon", ccsText, "");
        
        $this->id_servicio = new clsField("id_servicio", ccsText, "");
        
        $this->id_rape = new clsField("id_rape", ccsText, "");
        
        $this->id_administrador = new clsField("id_administrador", ccsText, "");
        
        $this->estatus = new clsField("estatus", ccsText, "");
        

        $this->InsertFields["id_admon"] = array("Name" => "id_admon", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["id_servicio"] = array("Name" => "id_servicio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["id_rape"] = array("Name" => "id_rape", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["id_administrador"] = array("Name" => "id_administrador", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["estatus"] = array("Name" => "estatus", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["id_admon"] = array("Name" => "id_admon", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_servicio"] = array("Name" => "id_servicio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_rape"] = array("Name" => "id_rape", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_administrador"] = array("Name" => "id_administrador", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["estatus"] = array("Name" => "estatus", "Value" => "", "DataType" => ccsText);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @17-B5D987A9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlid_mapeo", ccsInteger, "", "", $this->Parameters["urlid_mapeo"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_mapeo", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @17-02FBA828
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM c_mapeo_admin_serv_rape_repo {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @17-4DE37FE0
    function SetValues()
    {
        $this->id_admon->SetDBValue($this->f("id_admon"));
        $this->id_servicio->SetDBValue($this->f("id_servicio"));
        $this->id_rape->SetDBValue($this->f("id_rape"));
        $this->id_administrador->SetDBValue($this->f("id_administrador"));
        $this->estatus->SetDBValue($this->f("estatus"));
    }
//End SetValues Method

//Insert Method @17-A2D303A1
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["id_admon"]["Value"] = $this->id_admon->GetDBValue(true);
        $this->InsertFields["id_servicio"]["Value"] = $this->id_servicio->GetDBValue(true);
        $this->InsertFields["id_rape"]["Value"] = $this->id_rape->GetDBValue(true);
        $this->InsertFields["id_administrador"]["Value"] = $this->id_administrador->GetDBValue(true);
        $this->InsertFields["estatus"]["Value"] = $this->estatus->GetDBValue(true);
        $this->SQL = CCBuildInsert("c_mapeo_admin_serv_rape_repo", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @17-5F12E2E0
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["id_admon"]["Value"] = $this->id_admon->GetDBValue(true);
        $this->UpdateFields["id_servicio"]["Value"] = $this->id_servicio->GetDBValue(true);
        $this->UpdateFields["id_rape"]["Value"] = $this->id_rape->GetDBValue(true);
        $this->UpdateFields["id_administrador"]["Value"] = $this->id_administrador->GetDBValue(true);
        $this->UpdateFields["estatus"]["Value"] = $this->estatus->GetDBValue(true);
        $this->SQL = CCBuildUpdate("c_mapeo_admin_serv_rape_repo", $this->UpdateFields, $this);
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

//Delete Method @17-57FB2D88
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM c_mapeo_admin_serv_rape_repo";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End c_mapeo_admin_serv_rape_rDataSource Class @17-FCB6E20C

class clsRecordc_rape_repo { //c_rape_repo Class @42-A0118D4E

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

//Class_Initialize Event @42-19CFFFDD
    function clsRecordc_rape_repo($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record c_rape_repo/Error";
        $this->DataSource = new clsc_rape_repoDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "c_rape_repo";
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
            $this->rape = new clsControl(ccsTextBox, "rape", "Rape", ccsText, "", CCGetRequestParam("rape", $Method, NULL), $this);
            $this->rape->Required = true;
            $this->estatus = new clsControl(ccsCheckBox, "estatus", "estatus", ccsText, "", CCGetRequestParam("estatus", $Method, NULL), $this);
            $this->estatus->CheckedValue = $this->estatus->GetParsedValue(1);
            $this->estatus->UncheckedValue = $this->estatus->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->estatus->Value) && !strlen($this->estatus->Value) && $this->estatus->Value !== false)
                    $this->estatus->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @42-71FEC543
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlid_rape"] = CCGetFromGet("id_rape", NULL);
    }
//End Initialize Method

//Validate Method @42-A402B5A7
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->rape->Validate() && $Validation);
        $Validation = ($this->estatus->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->rape->Errors->Count() == 0);
        $Validation =  $Validation && ($this->estatus->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @42-FD57A074
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->rape->Errors->Count());
        $errors = ($errors || $this->estatus->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @42-E955BD63
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

//InsertRow Method @42-B2C6D227
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->rape->SetValue($this->rape->GetValue(true));
        $this->DataSource->estatus->SetValue($this->estatus->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @42-24092638
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->rape->SetValue($this->rape->GetValue(true));
        $this->DataSource->estatus->SetValue($this->estatus->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @42-C575FFE9
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
                    $this->rape->SetValue($this->DataSource->rape->GetValue());
                    $this->estatus->SetValue($this->DataSource->estatus->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->rape->Errors->ToString());
            $Error = ComposeStrings($Error, $this->estatus->Errors->ToString());
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
        $this->rape->Show();
        $this->estatus->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End c_rape_repo Class @42-FCB6E20C

class clsc_rape_repoDataSource extends clsDBConnCarga {  //c_rape_repoDataSource Class @42-94F449F9

//DataSource Variables @42-6395B579
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
    public $rape;
    public $estatus;
//End DataSource Variables

//DataSourceClass_Initialize Event @42-705CC3B4
    function clsc_rape_repoDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record c_rape_repo/Error";
        $this->Initialize();
        $this->rape = new clsField("rape", ccsText, "");
        
        $this->estatus = new clsField("estatus", ccsText, "");
        

        $this->InsertFields["rape"] = array("Name" => "rape", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["estatus"] = array("Name" => "estatus", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["rape"] = array("Name" => "rape", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["estatus"] = array("Name" => "estatus", "Value" => "", "DataType" => ccsText);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @42-95F0AC6A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlid_rape", ccsInteger, "", "", $this->Parameters["urlid_rape"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_rape", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @42-68A2C9D7
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM c_rape_repo {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @42-ECFCE042
    function SetValues()
    {
        $this->rape->SetDBValue($this->f("rape"));
        $this->estatus->SetDBValue($this->f("estatus"));
    }
//End SetValues Method

//Insert Method @42-EECC1CB3
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["rape"]["Value"] = $this->rape->GetDBValue(true);
        $this->InsertFields["estatus"]["Value"] = $this->estatus->GetDBValue(true);
        $this->SQL = CCBuildInsert("c_rape_repo", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @42-57EEA229
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["rape"]["Value"] = $this->rape->GetDBValue(true);
        $this->UpdateFields["estatus"]["Value"] = $this->estatus->GetDBValue(true);
        $this->SQL = CCBuildUpdate("c_rape_repo", $this->UpdateFields, $this);
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

} //End c_rape_repoDataSource Class @42-FCB6E20C

class clsRecordc_servicio_negocio_ppm_ap { //c_servicio_negocio_ppm_ap Class @54-CAF9CD03

//Variables @54-9E315808

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

//Class_Initialize Event @54-B8CB493A
    function clsRecordc_servicio_negocio_ppm_ap($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record c_servicio_negocio_ppm_ap/Error";
        $this->DataSource = new clsc_servicio_negocio_ppm_apDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "c_servicio_negocio_ppm_ap";
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
            $this->servicio_negocio_aplic = new clsControl(ccsTextBox, "servicio_negocio_aplic", "Servicio Negocio Aplic", ccsText, "", CCGetRequestParam("servicio_negocio_aplic", $Method, NULL), $this);
            $this->servicio_negocio_aplic->Required = true;
            $this->servicio_negocio_ppm = new clsControl(ccsTextBox, "servicio_negocio_ppm", "Servicio Negocio Ppm", ccsText, "", CCGetRequestParam("servicio_negocio_ppm", $Method, NULL), $this);
            $this->servicio_negocio_ppm->Required = true;
            $this->estatus = new clsControl(ccsHidden, "estatus", "Estatus", ccsInteger, "", CCGetRequestParam("estatus", $Method, NULL), $this);
            $this->estatus->Required = true;
            $this->id_servicio = new clsControl(ccsHidden, "id_servicio", "id_servicio", ccsText, "", CCGetRequestParam("id_servicio", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->estatus->Value) && !strlen($this->estatus->Value) && $this->estatus->Value !== false)
                    $this->estatus->SetText(1);
                if(!is_array($this->id_servicio->Value) && !strlen($this->id_servicio->Value) && $this->id_servicio->Value !== false)
                    $this->id_servicio->SetText(CCGetParam("id_servicio"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @54-0DED2A0E
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlid_mapa_servicio"] = CCGetFromGet("id_mapa_servicio", NULL);
    }
//End Initialize Method

//Validate Method @54-957C9BED
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->servicio_negocio_aplic->Validate() && $Validation);
        $Validation = ($this->servicio_negocio_ppm->Validate() && $Validation);
        $Validation = ($this->estatus->Validate() && $Validation);
        $Validation = ($this->id_servicio->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->servicio_negocio_aplic->Errors->Count() == 0);
        $Validation =  $Validation && ($this->servicio_negocio_ppm->Errors->Count() == 0);
        $Validation =  $Validation && ($this->estatus->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_servicio->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @54-F787E140
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->servicio_negocio_aplic->Errors->Count());
        $errors = ($errors || $this->servicio_negocio_ppm->Errors->Count());
        $errors = ($errors || $this->estatus->Errors->Count());
        $errors = ($errors || $this->id_servicio->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @54-EFC50250
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
            $this->PressedButton = "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
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

//InsertRow Method @54-FBCF9C01
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->servicio_negocio_aplic->SetValue($this->servicio_negocio_aplic->GetValue(true));
        $this->DataSource->servicio_negocio_ppm->SetValue($this->servicio_negocio_ppm->GetValue(true));
        $this->DataSource->estatus->SetValue($this->estatus->GetValue(true));
        $this->DataSource->id_servicio->SetValue($this->id_servicio->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//Show Method @54-13F07685
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
                    $this->servicio_negocio_aplic->SetValue($this->DataSource->servicio_negocio_aplic->GetValue());
                    $this->servicio_negocio_ppm->SetValue($this->DataSource->servicio_negocio_ppm->GetValue());
                    $this->estatus->SetValue($this->DataSource->estatus->GetValue());
                    $this->id_servicio->SetValue($this->DataSource->id_servicio->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->servicio_negocio_aplic->Errors->ToString());
            $Error = ComposeStrings($Error, $this->servicio_negocio_ppm->Errors->ToString());
            $Error = ComposeStrings($Error, $this->estatus->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_servicio->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->servicio_negocio_aplic->Show();
        $this->servicio_negocio_ppm->Show();
        $this->estatus->Show();
        $this->id_servicio->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End c_servicio_negocio_ppm_ap Class @54-FCB6E20C

class clsc_servicio_negocio_ppm_apDataSource extends clsDBConnCarga {  //c_servicio_negocio_ppm_apDataSource Class @54-571B07DD

//DataSource Variables @54-49D3F09A
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();

    // Datasource fields
    public $servicio_negocio_aplic;
    public $servicio_negocio_ppm;
    public $estatus;
    public $id_servicio;
//End DataSource Variables

//DataSourceClass_Initialize Event @54-A6FD31F0
    function clsc_servicio_negocio_ppm_apDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record c_servicio_negocio_ppm_ap/Error";
        $this->Initialize();
        $this->servicio_negocio_aplic = new clsField("servicio_negocio_aplic", ccsText, "");
        
        $this->servicio_negocio_ppm = new clsField("servicio_negocio_ppm", ccsText, "");
        
        $this->estatus = new clsField("estatus", ccsInteger, "");
        
        $this->id_servicio = new clsField("id_servicio", ccsText, "");
        

        $this->InsertFields["servicio_negocio_aplic"] = array("Name" => "servicio_negocio_aplic", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["servicio_negocio_ppm"] = array("Name" => "servicio_negocio_ppm", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["estatus"] = array("Name" => "estatus", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["id_servicio"] = array("Name" => "id_servicio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @54-983B60E9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlid_mapa_servicio", ccsInteger, "", "", $this->Parameters["urlid_mapa_servicio"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_mapa_servicio", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @54-848EC872
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM c_servicio_negocio_ppm_aplicativo_repo {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @54-34470D28
    function SetValues()
    {
        $this->servicio_negocio_aplic->SetDBValue($this->f("servicio_negocio_aplic"));
        $this->servicio_negocio_ppm->SetDBValue($this->f("servicio_negocio_ppm"));
        $this->estatus->SetDBValue(trim($this->f("estatus")));
        $this->id_servicio->SetDBValue($this->f("id_servicio"));
    }
//End SetValues Method

//Insert Method @54-9566227D
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["servicio_negocio_aplic"]["Value"] = $this->servicio_negocio_aplic->GetDBValue(true);
        $this->InsertFields["servicio_negocio_ppm"]["Value"] = $this->servicio_negocio_ppm->GetDBValue(true);
        $this->InsertFields["estatus"]["Value"] = $this->estatus->GetDBValue(true);
        $this->InsertFields["id_servicio"]["Value"] = $this->id_servicio->GetDBValue(true);
        $this->SQL = CCBuildInsert("c_servicio_negocio_ppm_aplicativo_repo", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

} //End c_servicio_negocio_ppm_apDataSource Class @54-FCB6E20C

class clsGridc_servicio_negocio_ppm_ap1 { //c_servicio_negocio_ppm_ap1 class @61-0B61F025

//Variables @61-9DFCB36E

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
    public $Sorter_servicio_negocio_ppm;
//End Variables

//Class_Initialize Event @61-3D605028
    function clsGridc_servicio_negocio_ppm_ap1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "c_servicio_negocio_ppm_ap1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid c_servicio_negocio_ppm_ap1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsc_servicio_negocio_ppm_ap1DataSource($this);
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
        $this->SorterName = CCGetParam("c_servicio_negocio_ppm_ap1Order", "");
        $this->SorterDirection = CCGetParam("c_servicio_negocio_ppm_ap1Dir", "");

        $this->servicio_negocio_ppm = new clsControl(ccsLabel, "servicio_negocio_ppm", "servicio_negocio_ppm", ccsText, "", CCGetRequestParam("servicio_negocio_ppm", ccsGet, NULL), $this);
        $this->Sorter_servicio_negocio_ppm = new clsSorter($this->ComponentName, "Sorter_servicio_negocio_ppm", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @61-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @61-52691730
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlid_servicio"] = CCGetFromGet("id_servicio", NULL);

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
            $this->ControlsVisible["servicio_negocio_ppm"] = $this->servicio_negocio_ppm->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->servicio_negocio_ppm->SetValue($this->DataSource->servicio_negocio_ppm->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->servicio_negocio_ppm->Show();
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
        $this->Sorter_servicio_negocio_ppm->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @61-D52B6E15
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->servicio_negocio_ppm->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End c_servicio_negocio_ppm_ap1 Class @61-FCB6E20C

class clsc_servicio_negocio_ppm_ap1DataSource extends clsDBConnCarga {  //c_servicio_negocio_ppm_ap1DataSource Class @61-3AC77077

//DataSource Variables @61-75E821EA
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $servicio_negocio_ppm;
//End DataSource Variables

//DataSourceClass_Initialize Event @61-DD202495
    function clsc_servicio_negocio_ppm_ap1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid c_servicio_negocio_ppm_ap1";
        $this->Initialize();
        $this->servicio_negocio_ppm = new clsField("servicio_negocio_ppm", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @61-CEB91975
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_servicio_negocio_ppm" => array("servicio_negocio_ppm", "")));
    }
//End SetOrder Method

//Prepare Method @61-9124B8B9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlid_servicio", ccsInteger, "", "", $this->Parameters["urlid_servicio"], 0, false);
    }
//End Prepare Method

//Open Method @61-F1725522
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM c_servicio_negocio_ppm_aplicativo_repo \n" .
        "where servicio_negocio_aplic = (select servicio_negocio from c_servicio_negocio_repo where id_servicio=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")) cnt";
        $this->SQL = "SELECT * \n" .
        "FROM c_servicio_negocio_ppm_aplicativo_repo \n" .
        "where servicio_negocio_aplic = (select servicio_negocio from c_servicio_negocio_repo where id_servicio=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")";
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

//SetValues Method @61-912AC0FC
    function SetValues()
    {
        $this->servicio_negocio_ppm->SetDBValue($this->f("servicio_negocio_ppm"));
    }
//End SetValues Method

} //End c_servicio_negocio_ppm_ap1DataSource Class @61-FCB6E20C



//Initialize Page @1-3004F9C0
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
$TemplateFileName = "EquivalenciasReportes.html";
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

//Include events file @1-C43AE446
include_once("./EquivalenciasReportes_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-CF7A2C1E
$DBConnCarga = new clsDBConnCarga();
$MainPage->Connections["ConnCarga"] = & $DBConnCarga;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$Grid2 = new clsRecordGrid2("", $MainPage);
$Grid1 = new clsGridGrid1("", $MainPage);
$c_mapeo_admin_serv_rape_r = new clsRecordc_mapeo_admin_serv_rape_r("", $MainPage);
$c_rape_repo = new clsRecordc_rape_repo("", $MainPage);
$c_servicio_negocio_ppm_ap = new clsRecordc_servicio_negocio_ppm_ap("", $MainPage);
$c_servicio_negocio_ppm_ap1 = new clsGridc_servicio_negocio_ppm_ap1("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->Grid2 = & $Grid2;
$MainPage->Grid1 = & $Grid1;
$MainPage->c_mapeo_admin_serv_rape_r = & $c_mapeo_admin_serv_rape_r;
$MainPage->c_rape_repo = & $c_rape_repo;
$MainPage->c_servicio_negocio_ppm_ap = & $c_servicio_negocio_ppm_ap;
$MainPage->c_servicio_negocio_ppm_ap1 = & $c_servicio_negocio_ppm_ap1;
$Grid1->Initialize();
$c_mapeo_admin_serv_rape_r->Initialize();
$c_rape_repo->Initialize();
$c_servicio_negocio_ppm_ap->Initialize();
$c_servicio_negocio_ppm_ap1->Initialize();
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

//Execute Components @1-32041646
$c_servicio_negocio_ppm_ap->Operation();
$c_rape_repo->Operation();
$c_mapeo_admin_serv_rape_r->Operation();
$Grid2->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-6D894BD2
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnCarga->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($Grid2);
    unset($Grid1);
    unset($c_mapeo_admin_serv_rape_r);
    unset($c_rape_repo);
    unset($c_servicio_negocio_ppm_ap);
    unset($c_servicio_negocio_ppm_ap1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-5FEAA51D
$Header->Show();
$Grid2->Show();
$Grid1->Show();
$c_mapeo_admin_serv_rape_r->Show();
$c_rape_repo->Show();
$c_servicio_negocio_ppm_ap->Show();
$c_servicio_negocio_ppm_ap1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-B9E9F8E3
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnCarga->close();
$Header->Class_Terminate();
unset($Header);
unset($Grid2);
unset($Grid1);
unset($c_mapeo_admin_serv_rape_r);
unset($c_rape_repo);
unset($c_servicio_negocio_ppm_ap);
unset($c_servicio_negocio_ppm_ap1);
unset($Tpl);
//End Unload Page


?>
