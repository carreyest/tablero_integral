<?php
//Include Common Files @1-653F9B30
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "EficienciaPresBase.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_c_proveedor_mc_EfPresu1 { //mc_c_proveedor_mc_EfPresu1 Class @50-AD0A4566

//Variables @50-9E315808

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

//Class_Initialize Event @50-7A4FF90C
    function clsRecordmc_c_proveedor_mc_EfPresu1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_c_proveedor_mc_EfPresu1/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_c_proveedor_mc_EfPresu1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_Id_Proveedor = new clsControl(ccsListBox, "s_Id_Proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("s_Id_Proveedor", $Method, NULL), $this);
            $this->s_Id_Proveedor->DSType = dsTable;
            $this->s_Id_Proveedor->DataSource = new clsDBcnDisenio();
            $this->s_Id_Proveedor->ds = & $this->s_Id_Proveedor->DataSource;
            $this->s_Id_Proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_Id_Proveedor->BoundColumn, $this->s_Id_Proveedor->TextColumn, $this->s_Id_Proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_Id_Proveedor->DataSource->Parameters["expr59"] = 'CDS';
            $this->s_Id_Proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_Id_Proveedor->DataSource->wp->AddParameter("1", "expr59", ccsText, "", "", $this->s_Id_Proveedor->DataSource->Parameters["expr59"], "", false);
            $this->s_Id_Proveedor->DataSource->wp->Criterion[1] = $this->s_Id_Proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_Id_Proveedor->DataSource->wp->GetDBValue("1"), $this->s_Id_Proveedor->DataSource->ToSQL($this->s_Id_Proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_Id_Proveedor->DataSource->Where = 
                 $this->s_Id_Proveedor->DataSource->wp->Criterion[1];
            $this->s_GrupoAplicativos = new clsControl(ccsTextBox, "s_GrupoAplicativos", "Grupo Aplicativos", ccsText, "", CCGetRequestParam("s_GrupoAplicativos", $Method, NULL), $this);
            $this->s_ServiciosRelacionados = new clsControl(ccsTextBox, "s_ServiciosRelacionados", "Servicios Relacionados", ccsText, "", CCGetRequestParam("s_ServiciosRelacionados", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @50-DB4ED45D
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_Id_Proveedor->Validate() && $Validation);
        $Validation = ($this->s_GrupoAplicativos->Validate() && $Validation);
        $Validation = ($this->s_ServiciosRelacionados->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_Id_Proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_GrupoAplicativos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_ServiciosRelacionados->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @50-BC3EE42B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_Id_Proveedor->Errors->Count());
        $errors = ($errors || $this->s_GrupoAplicativos->Errors->Count());
        $errors = ($errors || $this->s_ServiciosRelacionados->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @50-D4F62B54
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
        $Redirect = "EficienciaPresBase.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "EficienciaPresBase.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @50-472863E3
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

        $this->s_Id_Proveedor->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_Id_Proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_GrupoAplicativos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_ServiciosRelacionados->Errors->ToString());
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
        $this->s_Id_Proveedor->Show();
        $this->s_GrupoAplicativos->Show();
        $this->s_ServiciosRelacionados->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_c_proveedor_mc_EfPresu1 Class @50-FCB6E20C

class clsGridmc_c_proveedor_mc_EfPresu { //mc_c_proveedor_mc_EfPresu class @3-1D1BE9A6

//Variables @3-DAADB8A4

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
    public $Sorter_nombre;
    public $Sorter_GrupoAplicativos;
    public $Sorter_ServiciosRelacionados;
    public $Sorter_CFMAnterior;
    public $Sorter_Vigente;
//End Variables

//Class_Initialize Event @3-02078544
    function clsGridmc_c_proveedor_mc_EfPresu($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_c_proveedor_mc_EfPresu";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_c_proveedor_mc_EfPresu";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_c_proveedor_mc_EfPresuDataSource($this);
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
        $this->SorterName = CCGetParam("mc_c_proveedor_mc_EfPresuOrder", "");
        $this->SorterDirection = CCGetParam("mc_c_proveedor_mc_EfPresuDir", "");

        $this->Id = new clsControl(ccsLink, "Id", "Id", ccsInteger, "", CCGetRequestParam("Id", ccsGet, NULL), $this);
        $this->Id->Page = "";
        $this->nombre = new clsControl(ccsLabel, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->GrupoAplicativos = new clsControl(ccsLabel, "GrupoAplicativos", "GrupoAplicativos", ccsText, "", CCGetRequestParam("GrupoAplicativos", ccsGet, NULL), $this);
        $this->ServiciosRelacionados = new clsControl(ccsLabel, "ServiciosRelacionados", "ServiciosRelacionados", ccsText, "", CCGetRequestParam("ServiciosRelacionados", ccsGet, NULL), $this);
        $this->CFMAnterior = new clsControl(ccsLabel, "CFMAnterior", "CFMAnterior", ccsFloat, array(False, 4, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("CFMAnterior", ccsGet, NULL), $this);
        $this->Vigente = new clsControl(ccsLabel, "Vigente", "Vigente", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("Vigente", ccsGet, NULL), $this);
        $this->mc_c_proveedor_mc_EfPresu_Insert = new clsControl(ccsLink, "mc_c_proveedor_mc_EfPresu_Insert", "mc_c_proveedor_mc_EfPresu_Insert", ccsText, "", CCGetRequestParam("mc_c_proveedor_mc_EfPresu_Insert", ccsGet, NULL), $this);
        $this->mc_c_proveedor_mc_EfPresu_Insert->Parameters = CCGetQueryString("QueryString", array("Id", "ccsForm"));
        $this->mc_c_proveedor_mc_EfPresu_Insert->Page = "EficienciaPresBase.php";
        $this->mc_c_proveedor_mc_EfPresu_TotalRecords = new clsControl(ccsLabel, "mc_c_proveedor_mc_EfPresu_TotalRecords", "mc_c_proveedor_mc_EfPresu_TotalRecords", ccsText, "", CCGetRequestParam("mc_c_proveedor_mc_EfPresu_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_Id = new clsSorter($this->ComponentName, "Sorter_Id", $FileName, $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Sorter_GrupoAplicativos = new clsSorter($this->ComponentName, "Sorter_GrupoAplicativos", $FileName, $this);
        $this->Sorter_ServiciosRelacionados = new clsSorter($this->ComponentName, "Sorter_ServiciosRelacionados", $FileName, $this);
        $this->Sorter_CFMAnterior = new clsSorter($this->ComponentName, "Sorter_CFMAnterior", $FileName, $this);
        $this->Sorter_Vigente = new clsSorter($this->ComponentName, "Sorter_Vigente", $FileName, $this);
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

//Show Method @3-5BC1BDCB
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_Id_Proveedor"] = CCGetFromGet("s_Id_Proveedor", NULL);
        $this->DataSource->Parameters["urls_GrupoAplicativos"] = CCGetFromGet("s_GrupoAplicativos", NULL);
        $this->DataSource->Parameters["urls_ServiciosRelacionados"] = CCGetFromGet("s_ServiciosRelacionados", NULL);

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
            $this->ControlsVisible["nombre"] = $this->nombre->Visible;
            $this->ControlsVisible["GrupoAplicativos"] = $this->GrupoAplicativos->Visible;
            $this->ControlsVisible["ServiciosRelacionados"] = $this->ServiciosRelacionados->Visible;
            $this->ControlsVisible["CFMAnterior"] = $this->CFMAnterior->Visible;
            $this->ControlsVisible["Vigente"] = $this->Vigente->Visible;
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
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->GrupoAplicativos->SetValue($this->DataSource->GrupoAplicativos->GetValue());
                $this->ServiciosRelacionados->SetValue($this->DataSource->ServiciosRelacionados->GetValue());
                $this->CFMAnterior->SetValue($this->DataSource->CFMAnterior->GetValue());
                $this->Vigente->SetValue($this->DataSource->Vigente->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id->Show();
                $this->nombre->Show();
                $this->GrupoAplicativos->Show();
                $this->ServiciosRelacionados->Show();
                $this->CFMAnterior->Show();
                $this->Vigente->Show();
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
        $this->mc_c_proveedor_mc_EfPresu_Insert->Show();
        $this->mc_c_proveedor_mc_EfPresu_TotalRecords->Show();
        $this->Sorter_Id->Show();
        $this->Sorter_nombre->Show();
        $this->Sorter_GrupoAplicativos->Show();
        $this->Sorter_ServiciosRelacionados->Show();
        $this->Sorter_CFMAnterior->Show();
        $this->Sorter_Vigente->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-7592861A
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GrupoAplicativos->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ServiciosRelacionados->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CFMAnterior->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Vigente->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_c_proveedor_mc_EfPresu Class @3-FCB6E20C

class clsmc_c_proveedor_mc_EfPresuDataSource extends clsDBcnDisenio {  //mc_c_proveedor_mc_EfPresuDataSource Class @3-3B0D6BD8

//DataSource Variables @3-73530783
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Id;
    public $nombre;
    public $GrupoAplicativos;
    public $ServiciosRelacionados;
    public $CFMAnterior;
    public $Vigente;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-EC313D39
    function clsmc_c_proveedor_mc_EfPresuDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_c_proveedor_mc_EfPresu";
        $this->Initialize();
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->GrupoAplicativos = new clsField("GrupoAplicativos", ccsText, "");
        
        $this->ServiciosRelacionados = new clsField("ServiciosRelacionados", ccsText, "");
        
        $this->CFMAnterior = new clsField("CFMAnterior", ccsFloat, "");
        
        $this->Vigente = new clsField("Vigente", ccsBoolean, $this->BooleanFormat);
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-92C95E84
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Id" => array("Id", ""), 
            "Sorter_nombre" => array("nombre", ""), 
            "Sorter_GrupoAplicativos" => array("GrupoAplicativos", ""), 
            "Sorter_ServiciosRelacionados" => array("ServiciosRelacionados", ""), 
            "Sorter_CFMAnterior" => array("CFMAnterior", ""), 
            "Sorter_Vigente" => array("Vigente", "")));
    }
//End SetOrder Method

//Prepare Method @3-206B6A95
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_Id_Proveedor", ccsInteger, "", "", $this->Parameters["urls_Id_Proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_GrupoAplicativos", ccsText, "", "", $this->Parameters["urls_GrupoAplicativos"], "", false);
        $this->wp->AddParameter("3", "urls_ServiciosRelacionados", ccsText, "", "", $this->Parameters["urls_ServiciosRelacionados"], "", false);
    }
//End Prepare Method

//Open Method @3-E81DEEA2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT nombre, mc_EfPresup_base.* \n" .
        "FROM mc_EfPresup_base INNER JOIN mc_c_proveedor ON\n" .
        "mc_EfPresup_base.Id_Proveedor = mc_c_proveedor.Id_Proveedor\n" .
        "WHERE (mc_EfPresup_base.Id_Proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0)\n" .
        "AND GrupoAplicativos LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "AND ServiciosRelacionados LIKE '%" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "%' ) cnt";
        $this->SQL = "SELECT nombre, mc_EfPresup_base.* \n" .
        "FROM mc_EfPresup_base INNER JOIN mc_c_proveedor ON\n" .
        "mc_EfPresup_base.Id_Proveedor = mc_c_proveedor.Id_Proveedor\n" .
        "WHERE (mc_EfPresup_base.Id_Proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0)\n" .
        "AND GrupoAplicativos LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "AND ServiciosRelacionados LIKE '%" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "%' ";
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

//SetValues Method @3-183B5BB5
    function SetValues()
    {
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->GrupoAplicativos->SetDBValue($this->f("GrupoAplicativos"));
        $this->ServiciosRelacionados->SetDBValue($this->f("ServiciosRelacionados"));
        $this->CFMAnterior->SetDBValue(trim($this->f("CFMAnterior")));
        $this->Vigente->SetDBValue(trim($this->f("Vigente")));
    }
//End SetValues Method

} //End mc_c_proveedor_mc_EfPresuDataSource Class @3-FCB6E20C

class clsRecordmc_EfPresup_base { //mc_EfPresup_base Class @28-592D744F

//Variables @28-9E315808

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

//Class_Initialize Event @28-39532F68
    function clsRecordmc_EfPresup_base($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_EfPresup_base/Error";
        $this->DataSource = new clsmc_EfPresup_baseDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_EfPresup_base";
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
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->Id_Proveedor = new clsControl(ccsListBox, "Id_Proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("Id_Proveedor", $Method, NULL), $this);
            $this->Id_Proveedor->DSType = dsTable;
            $this->Id_Proveedor->DataSource = new clsDBcnDisenio();
            $this->Id_Proveedor->ds = & $this->Id_Proveedor->DataSource;
            $this->Id_Proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->Id_Proveedor->BoundColumn, $this->Id_Proveedor->TextColumn, $this->Id_Proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->Id_Proveedor->DataSource->Parameters["expr47"] = 'CDS';
            $this->Id_Proveedor->DataSource->wp = new clsSQLParameters();
            $this->Id_Proveedor->DataSource->wp->AddParameter("1", "expr47", ccsText, "", "", $this->Id_Proveedor->DataSource->Parameters["expr47"], "", false);
            $this->Id_Proveedor->DataSource->wp->Criterion[1] = $this->Id_Proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->Id_Proveedor->DataSource->wp->GetDBValue("1"), $this->Id_Proveedor->DataSource->ToSQL($this->Id_Proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->Id_Proveedor->DataSource->Where = 
                 $this->Id_Proveedor->DataSource->wp->Criterion[1];
            $this->Id_Proveedor->Required = true;
            $this->GrupoAplicativos = new clsControl(ccsTextBox, "GrupoAplicativos", "Grupo Aplicativos", ccsText, "", CCGetRequestParam("GrupoAplicativos", $Method, NULL), $this);
            $this->GrupoAplicativos->Required = true;
            $this->ServiciosRelacionados = new clsControl(ccsTextBox, "ServiciosRelacionados", "Servicios Relacionados", ccsText, "", CCGetRequestParam("ServiciosRelacionados", $Method, NULL), $this);
            $this->ServiciosRelacionados->Required = true;
            $this->CFMAnterior = new clsControl(ccsTextBox, "CFMAnterior", "CFMAnterior", ccsFloat, array(False, 4, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("CFMAnterior", $Method, NULL), $this);
            $this->Vigente = new clsControl(ccsCheckBox, "Vigente", "Vigente", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("Vigente", $Method, NULL), $this);
            $this->Vigente->CheckedValue = true;
            $this->Vigente->UncheckedValue = false;
            $this->AnioServicio = new clsControl(ccsTextBox, "AnioServicio", "AnioServicio", ccsText, "", CCGetRequestParam("AnioServicio", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->Vigente->Value) && !strlen($this->Vigente->Value) && $this->Vigente->Value !== false)
                    $this->Vigente->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @28-4F76030F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//Validate Method @28-F756FA58
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Id_Proveedor->Validate() && $Validation);
        $Validation = ($this->GrupoAplicativos->Validate() && $Validation);
        $Validation = ($this->ServiciosRelacionados->Validate() && $Validation);
        $Validation = ($this->CFMAnterior->Validate() && $Validation);
        $Validation = ($this->Vigente->Validate() && $Validation);
        $Validation = ($this->AnioServicio->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Id_Proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GrupoAplicativos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ServiciosRelacionados->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CFMAnterior->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Vigente->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AnioServicio->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @28-71B31B2A
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Id_Proveedor->Errors->Count());
        $errors = ($errors || $this->GrupoAplicativos->Errors->Count());
        $errors = ($errors || $this->ServiciosRelacionados->Errors->Count());
        $errors = ($errors || $this->CFMAnterior->Errors->Count());
        $errors = ($errors || $this->Vigente->Errors->Count());
        $errors = ($errors || $this->AnioServicio->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @28-0BF2B389
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

//InsertRow Method @28-0178D3EB
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Id_Proveedor->SetValue($this->Id_Proveedor->GetValue(true));
        $this->DataSource->GrupoAplicativos->SetValue($this->GrupoAplicativos->GetValue(true));
        $this->DataSource->ServiciosRelacionados->SetValue($this->ServiciosRelacionados->GetValue(true));
        $this->DataSource->CFMAnterior->SetValue($this->CFMAnterior->GetValue(true));
        $this->DataSource->Vigente->SetValue($this->Vigente->GetValue(true));
        $this->DataSource->AnioServicio->SetValue($this->AnioServicio->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @28-DBC7C0B2
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Id_Proveedor->SetValue($this->Id_Proveedor->GetValue(true));
        $this->DataSource->GrupoAplicativos->SetValue($this->GrupoAplicativos->GetValue(true));
        $this->DataSource->ServiciosRelacionados->SetValue($this->ServiciosRelacionados->GetValue(true));
        $this->DataSource->CFMAnterior->SetValue($this->CFMAnterior->GetValue(true));
        $this->DataSource->Vigente->SetValue($this->Vigente->GetValue(true));
        $this->DataSource->AnioServicio->SetValue($this->AnioServicio->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @28-CF61130A
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

        $this->Id_Proveedor->Prepare();

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
                    $this->Id_Proveedor->SetValue($this->DataSource->Id_Proveedor->GetValue());
                    $this->GrupoAplicativos->SetValue($this->DataSource->GrupoAplicativos->GetValue());
                    $this->ServiciosRelacionados->SetValue($this->DataSource->ServiciosRelacionados->GetValue());
                    $this->CFMAnterior->SetValue($this->DataSource->CFMAnterior->GetValue());
                    $this->Vigente->SetValue($this->DataSource->Vigente->GetValue());
                    $this->AnioServicio->SetValue($this->DataSource->AnioServicio->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Id_Proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GrupoAplicativos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ServiciosRelacionados->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CFMAnterior->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Vigente->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AnioServicio->Errors->ToString());
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
        $this->Button_Cancel->Show();
        $this->Id_Proveedor->Show();
        $this->GrupoAplicativos->Show();
        $this->ServiciosRelacionados->Show();
        $this->CFMAnterior->Show();
        $this->Vigente->Show();
        $this->AnioServicio->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_EfPresup_base Class @28-FCB6E20C

class clsmc_EfPresup_baseDataSource extends clsDBcnDisenio {  //mc_EfPresup_baseDataSource Class @28-CCA7CAFB

//DataSource Variables @28-6DB92DC1
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
    public $Id_Proveedor;
    public $GrupoAplicativos;
    public $ServiciosRelacionados;
    public $CFMAnterior;
    public $Vigente;
    public $AnioServicio;
//End DataSource Variables

//DataSourceClass_Initialize Event @28-CB2A3846
    function clsmc_EfPresup_baseDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_EfPresup_base/Error";
        $this->Initialize();
        $this->Id_Proveedor = new clsField("Id_Proveedor", ccsInteger, "");
        
        $this->GrupoAplicativos = new clsField("GrupoAplicativos", ccsText, "");
        
        $this->ServiciosRelacionados = new clsField("ServiciosRelacionados", ccsText, "");
        
        $this->CFMAnterior = new clsField("CFMAnterior", ccsFloat, "");
        
        $this->Vigente = new clsField("Vigente", ccsBoolean, $this->BooleanFormat);
        
        $this->AnioServicio = new clsField("AnioServicio", ccsText, "");
        

        $this->InsertFields["Id_Proveedor"] = array("Name" => "[Id_Proveedor]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["GrupoAplicativos"] = array("Name" => "[GrupoAplicativos]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ServiciosRelacionados"] = array("Name" => "[ServiciosRelacionados]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CFMAnterior"] = array("Name" => "[CFMAnterior]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["Vigente"] = array("Name" => "[Vigente]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["AnioServicio"] = array("Name" => "[AnioServicio]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id_Proveedor"] = array("Name" => "[Id_Proveedor]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["GrupoAplicativos"] = array("Name" => "[GrupoAplicativos]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ServiciosRelacionados"] = array("Name" => "[ServiciosRelacionados]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CFMAnterior"] = array("Name" => "[CFMAnterior]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["Vigente"] = array("Name" => "[Vigente]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["AnioServicio"] = array("Name" => "[AnioServicio]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @28-D6C1B08E
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

//Open Method @28-56CA01F9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_EfPresup_base {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @28-3369A37E
    function SetValues()
    {
        $this->Id_Proveedor->SetDBValue(trim($this->f("Id_Proveedor")));
        $this->GrupoAplicativos->SetDBValue($this->f("GrupoAplicativos"));
        $this->ServiciosRelacionados->SetDBValue($this->f("ServiciosRelacionados"));
        $this->CFMAnterior->SetDBValue(trim($this->f("CFMAnterior")));
        $this->Vigente->SetDBValue(trim($this->f("Vigente")));
        $this->AnioServicio->SetDBValue($this->f("AnioServicio"));
    }
//End SetValues Method

//Insert Method @28-A7E7357B
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Id_Proveedor"]["Value"] = $this->Id_Proveedor->GetDBValue(true);
        $this->InsertFields["GrupoAplicativos"]["Value"] = $this->GrupoAplicativos->GetDBValue(true);
        $this->InsertFields["ServiciosRelacionados"]["Value"] = $this->ServiciosRelacionados->GetDBValue(true);
        $this->InsertFields["CFMAnterior"]["Value"] = $this->CFMAnterior->GetDBValue(true);
        $this->InsertFields["Vigente"]["Value"] = $this->Vigente->GetDBValue(true);
        $this->InsertFields["AnioServicio"]["Value"] = $this->AnioServicio->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_EfPresup_base", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @28-A418F20E
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Id_Proveedor"]["Value"] = $this->Id_Proveedor->GetDBValue(true);
        $this->UpdateFields["GrupoAplicativos"]["Value"] = $this->GrupoAplicativos->GetDBValue(true);
        $this->UpdateFields["ServiciosRelacionados"]["Value"] = $this->ServiciosRelacionados->GetDBValue(true);
        $this->UpdateFields["CFMAnterior"]["Value"] = $this->CFMAnterior->GetDBValue(true);
        $this->UpdateFields["Vigente"]["Value"] = $this->Vigente->GetDBValue(true);
        $this->UpdateFields["AnioServicio"]["Value"] = $this->AnioServicio->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_EfPresup_base", $this->UpdateFields, $this);
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

} //End mc_EfPresup_baseDataSource Class @28-FCB6E20C

class clsRecordmc_eficiencia_presupuesta { //mc_eficiencia_presupuesta Class @67-FAAE7A0F

//Variables @67-9E315808

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

//Class_Initialize Event @67-D92601D0
    function clsRecordmc_eficiencia_presupuesta($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_eficiencia_presupuesta/Error";
        $this->DataSource = new clsmc_eficiencia_presupuestaDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_eficiencia_presupuesta";
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
            $this->Id_Proveedor = new clsControl(ccsListBox, "Id_Proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("Id_Proveedor", $Method, NULL), $this);
            $this->Id_Proveedor->DSType = dsTable;
            $this->Id_Proveedor->DataSource = new clsDBcnDisenio();
            $this->Id_Proveedor->ds = & $this->Id_Proveedor->DataSource;
            $this->Id_Proveedor->DataSource->SQL = "SELECT nombre, id_proveedor \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->Id_Proveedor->BoundColumn, $this->Id_Proveedor->TextColumn, $this->Id_Proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->Id_Proveedor->DataSource->Parameters["expr75"] = 'CDS';
            $this->Id_Proveedor->DataSource->wp = new clsSQLParameters();
            $this->Id_Proveedor->DataSource->wp->AddParameter("1", "expr75", ccsText, "", "", $this->Id_Proveedor->DataSource->Parameters["expr75"], "", false);
            $this->Id_Proveedor->DataSource->wp->Criterion[1] = $this->Id_Proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->Id_Proveedor->DataSource->wp->GetDBValue("1"), $this->Id_Proveedor->DataSource->ToSQL($this->Id_Proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->Id_Proveedor->DataSource->Where = 
                 $this->Id_Proveedor->DataSource->wp->Criterion[1];
            $this->Id_Proveedor->Required = true;
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
            $this->anioreporte->DataSource->Parameters["expr82"] = 2013;
            $this->anioreporte->DataSource->wp = new clsSQLParameters();
            $this->anioreporte->DataSource->wp->AddParameter("1", "expr82", ccsInteger, "", "", $this->anioreporte->DataSource->Parameters["expr82"], "", false);
            $this->anioreporte->DataSource->wp->Criterion[1] = $this->anioreporte->DataSource->wp->Operation(opGreaterThan, "[Ano]", $this->anioreporte->DataSource->wp->GetDBValue("1"), $this->anioreporte->DataSource->ToSQL($this->anioreporte->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->anioreporte->DataSource->Where = 
                 $this->anioreporte->DataSource->wp->Criterion[1];
            if(!$this->FormSubmitted) {
                if(!is_array($this->MesReporte->Value) && !strlen($this->MesReporte->Value) && $this->MesReporte->Value !== false)
                    $this->MesReporte->SetText(date('m'));
                if(!is_array($this->anioreporte->Value) && !strlen($this->anioreporte->Value) && $this->anioreporte->Value !== false)
                    $this->anioreporte->SetText(2014);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @67-4F76030F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//Validate Method @67-3858CAD2
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Id_Proveedor->Validate() && $Validation);
        $Validation = ($this->MesReporte->Validate() && $Validation);
        $Validation = ($this->anioreporte->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Id_Proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->anioreporte->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @67-616FD2CF
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Id_Proveedor->Errors->Count());
        $errors = ($errors || $this->MesReporte->Errors->Count());
        $errors = ($errors || $this->anioreporte->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @67-EFC50250
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

//InsertRow Method @67-C09745DC
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Id_Proveedor->SetValue($this->Id_Proveedor->GetValue(true));
        $this->DataSource->MesReporte->SetValue($this->MesReporte->GetValue(true));
        $this->DataSource->anioreporte->SetValue($this->anioreporte->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//Show Method @67-F8D81036
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

        $this->Id_Proveedor->Prepare();
        $this->MesReporte->Prepare();
        $this->anioreporte->Prepare();

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
                    $this->Id_Proveedor->SetValue($this->DataSource->Id_Proveedor->GetValue());
                    $this->MesReporte->SetValue($this->DataSource->MesReporte->GetValue());
                    $this->anioreporte->SetValue($this->DataSource->anioreporte->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Id_Proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->anioreporte->Errors->ToString());
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
        $this->Id_Proveedor->Show();
        $this->MesReporte->Show();
        $this->anioreporte->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_eficiencia_presupuesta Class @67-FCB6E20C

class clsmc_eficiencia_presupuestaDataSource extends clsDBcnDisenio {  //mc_eficiencia_presupuestaDataSource Class @67-ABCE35EF

//DataSource Variables @67-58289A50
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $Id_Proveedor;
    public $MesReporte;
    public $anioreporte;
//End DataSource Variables

//DataSourceClass_Initialize Event @67-C28A725B
    function clsmc_eficiencia_presupuestaDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_eficiencia_presupuesta/Error";
        $this->Initialize();
        $this->Id_Proveedor = new clsField("Id_Proveedor", ccsInteger, "");
        
        $this->MesReporte = new clsField("MesReporte", ccsInteger, "");
        
        $this->anioreporte = new clsField("anioreporte", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @67-D6C1B08E
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

//Open Method @67-A0AE29AA
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_eficiencia_presupuestal {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @67-79647A10
    function SetValues()
    {
        $this->Id_Proveedor->SetDBValue(trim($this->f("Id_Proveedor")));
        $this->MesReporte->SetDBValue(trim($this->f("MesReporte")));
        $this->anioreporte->SetDBValue(trim($this->f("anioreporte")));
    }
//End SetValues Method

//Insert Method @67-69F6B314
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["Id_Proveedor"] = new clsSQLParameter("ctrlId_Proveedor", ccsInteger, "", "", $this->Id_Proveedor->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["MesReporte"] = new clsSQLParameter("ctrlMesReporte", ccsInteger, "", "", $this->MesReporte->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["anioreporte"] = new clsSQLParameter("ctrlanioreporte", ccsInteger, "", "", $this->anioreporte->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["Id_Proveedor"]->GetValue()) and !strlen($this->cp["Id_Proveedor"]->GetText()) and !is_bool($this->cp["Id_Proveedor"]->GetValue())) 
            $this->cp["Id_Proveedor"]->SetValue($this->Id_Proveedor->GetValue(true));
        if (!strlen($this->cp["Id_Proveedor"]->GetText()) and !is_bool($this->cp["Id_Proveedor"]->GetValue(true))) 
            $this->cp["Id_Proveedor"]->SetText(0);
        if (!is_null($this->cp["MesReporte"]->GetValue()) and !strlen($this->cp["MesReporte"]->GetText()) and !is_bool($this->cp["MesReporte"]->GetValue())) 
            $this->cp["MesReporte"]->SetValue($this->MesReporte->GetValue(true));
        if (!is_null($this->cp["anioreporte"]->GetValue()) and !strlen($this->cp["anioreporte"]->GetText()) and !is_bool($this->cp["anioreporte"]->GetValue())) 
            $this->cp["anioreporte"]->SetValue($this->anioreporte->GetValue(true));
        $this->SQL = "insert into mc_eficiencia_presupuestal \n" .
        "(Id_Proveedor, GrupoAplicativos, ServiciosRelacionados , CFMAnterior , MesReporte , anioreporte   )\n" .
        "select Id_Proveedor, GrupoAplicativos, ServiciosRelacionados , CFMAnterior ," . $this->SQLValue($this->cp["MesReporte"]->GetDBValue(), ccsInteger) . " , " . $this->SQLValue($this->cp["anioreporte"]->GetDBValue(), ccsInteger) . "\n" .
        "from mc_EfPresup_base \n" .
        "where Vigente  =1\n" .
        "and Id_Proveedor = " . $this->SQLValue($this->cp["Id_Proveedor"]->GetDBValue(), ccsInteger) . "\n" .
        "	and GrupoAplicativos not in (select GrupoAplicativos from mc_eficiencia_presupuestal \n" .
        "	where MesReporte =" . $this->SQLValue($this->cp["MesReporte"]->GetDBValue(), ccsInteger) . "  \n" .
        "and anioreporte = " . $this->SQLValue($this->cp["anioreporte"]->GetDBValue(), ccsInteger) . " and id_proveedor= " . $this->SQLValue($this->cp["Id_Proveedor"]->GetDBValue(), ccsInteger) . ")";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

} //End mc_eficiencia_presupuestaDataSource Class @67-FCB6E20C

//Initialize Page @1-15730903
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
$TemplateFileName = "EficienciaPresBase.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-4B0BB954
CCSecurityRedirect("3", "");
//End Authenticate User

//Include events file @1-000902D9
include_once("./EficienciaPresBase_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-B99AF3BF
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_c_proveedor_mc_EfPresu1 = new clsRecordmc_c_proveedor_mc_EfPresu1("", $MainPage);
$mc_c_proveedor_mc_EfPresu = new clsGridmc_c_proveedor_mc_EfPresu("", $MainPage);
$mc_EfPresup_base = new clsRecordmc_EfPresup_base("", $MainPage);
$mc_eficiencia_presupuesta = new clsRecordmc_eficiencia_presupuesta("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_c_proveedor_mc_EfPresu1 = & $mc_c_proveedor_mc_EfPresu1;
$MainPage->mc_c_proveedor_mc_EfPresu = & $mc_c_proveedor_mc_EfPresu;
$MainPage->mc_EfPresup_base = & $mc_EfPresup_base;
$MainPage->mc_eficiencia_presupuesta = & $mc_eficiencia_presupuesta;
$mc_c_proveedor_mc_EfPresu->Initialize();
$mc_EfPresup_base->Initialize();
$mc_eficiencia_presupuesta->Initialize();
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

//Execute Components @1-16D21B53
$mc_eficiencia_presupuesta->Operation();
$mc_EfPresup_base->Operation();
$mc_c_proveedor_mc_EfPresu1->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-0C771016
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_c_proveedor_mc_EfPresu1);
    unset($mc_c_proveedor_mc_EfPresu);
    unset($mc_EfPresup_base);
    unset($mc_eficiencia_presupuesta);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-87872539
$Header->Show();
$mc_c_proveedor_mc_EfPresu1->Show();
$mc_c_proveedor_mc_EfPresu->Show();
$mc_EfPresup_base->Show();
$mc_eficiencia_presupuesta->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-A4360F56
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_c_proveedor_mc_EfPresu1);
unset($mc_c_proveedor_mc_EfPresu);
unset($mc_EfPresup_base);
unset($mc_eficiencia_presupuesta);
unset($Tpl);
//End Unload Page


?>
