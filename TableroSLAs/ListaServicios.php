<?php
//Include Common Files @1-9F44CA36
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "ListaServicios.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridGrid1 { //Grid1 class @26-E857A572

//Variables @26-6DD06309

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
    public $Sorter_nombre;
    public $Sorter_descripcion;
    public $Sorter_tipo_de_servicio;
    public $Sorter1;
//End Variables

//Class_Initialize Event @26-5A60366A
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

        $this->nombre = new clsControl(ccsLink, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->nombre->Page = "EditarServicios.php";
        $this->descripcion = new clsControl(ccsLabel, "descripcion", "descripcion", ccsText, "", CCGetRequestParam("descripcion", ccsGet, NULL), $this);
        $this->tipo_de_servicio = new clsControl(ccsLabel, "tipo_de_servicio", "tipo_de_servicio", ccsText, "", CCGetRequestParam("tipo_de_servicio", ccsGet, NULL), $this);
        $this->lProveedor = new clsControl(ccsLabel, "lProveedor", "lProveedor", ccsText, "", CCGetRequestParam("lProveedor", ccsGet, NULL), $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Sorter_descripcion = new clsSorter($this->ComponentName, "Sorter_descripcion", $FileName, $this);
        $this->Sorter_tipo_de_servicio = new clsSorter($this->ComponentName, "Sorter_tipo_de_servicio", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
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

//Show Method @26-2CC9BCD4
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_nomre"] = CCGetFromGet("s_nomre", NULL);
        $this->DataSource->Parameters["urls_id_tipo_servicio"] = CCGetFromGet("s_id_tipo_servicio", NULL);
        $this->DataSource->Parameters["urls_idProveedor"] = CCGetFromGet("s_idProveedor", NULL);

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
            $this->ControlsVisible["nombre"] = $this->nombre->Visible;
            $this->ControlsVisible["descripcion"] = $this->descripcion->Visible;
            $this->ControlsVisible["tipo_de_servicio"] = $this->tipo_de_servicio->Visible;
            $this->ControlsVisible["lProveedor"] = $this->lProveedor->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->nombre->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->nombre->Parameters = CCAddParam($this->nombre->Parameters, "id_servicio", $this->DataSource->f("id_servicio"));
                $this->descripcion->SetValue($this->DataSource->descripcion->GetValue());
                $this->tipo_de_servicio->SetValue($this->DataSource->tipo_de_servicio->GetValue());
                $this->lProveedor->SetValue($this->DataSource->lProveedor->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->nombre->Show();
                $this->descripcion->Show();
                $this->tipo_de_servicio->Show();
                $this->lProveedor->Show();
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
        $this->Sorter_nombre->Show();
        $this->Sorter_descripcion->Show();
        $this->Sorter_tipo_de_servicio->Show();
        $this->Navigator->Show();
        $this->Sorter1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @26-6CD28B15
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->tipo_de_servicio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->lProveedor->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @26-FCB6E20C

class clsGrid1DataSource extends clsDBcnDisenio {  //Grid1DataSource Class @26-9B337F8E

//DataSource Variables @26-A94C064B
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $nombre;
    public $descripcion;
    public $tipo_de_servicio;
    public $lProveedor;
//End DataSource Variables

//DataSourceClass_Initialize Event @26-8177847A
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->descripcion = new clsField("descripcion", ccsText, "");
        
        $this->tipo_de_servicio = new clsField("tipo_de_servicio", ccsText, "");
        
        $this->lProveedor = new clsField("lProveedor", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @26-25151E2D
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_nombre" => array("nombre", ""), 
            "Sorter_descripcion" => array("descripcion", ""), 
            "Sorter_tipo_de_servicio" => array("tipo_de_servicio", ""), 
            "Sorter1" => array("proveedor", "")));
    }
//End SetOrder Method

//Prepare Method @26-8E855E0E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_nomre", ccsText, "", "", $this->Parameters["urls_nomre"], "", false);
        $this->wp->AddParameter("2", "urls_id_tipo_servicio", ccsInteger, "", "", $this->Parameters["urls_id_tipo_servicio"], 0, false);
        $this->wp->AddParameter("3", "urls_idProveedor", ccsInteger, "", "", $this->Parameters["urls_idProveedor"], 0, false);
    }
//End Prepare Method

//Open Method @26-D6D3522B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (\n" .
        "select \n" .
        "	s.* \n" .
        "	, p.nombre proveedor\n" .
        "	, ts.nombre tipo_de_servicio\n" .
        "from c_servicio s\n" .
        "	inner join c_tipo_servicio ts on ts.id_tipo_servicio = s.id_tipo_servicio \n" .
        "	left join proveedor_servicio ps on ps.id_servicio = s.id_servicio \n" .
        "	left join c_proveedor p on p.id_proveedor = ps.id_proveedor \n" .
        "where  (s.id_tipo_servicio=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or (" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0 and s.id_tipo_servicio in (1,2) ))\n" .
        "	and s.nombre like '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "    and (p.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)) cnt";
        $this->SQL = "\n" .
        "select \n" .
        "	s.* \n" .
        "	, p.nombre proveedor\n" .
        "	, ts.nombre tipo_de_servicio\n" .
        "from c_servicio s\n" .
        "	inner join c_tipo_servicio ts on ts.id_tipo_servicio = s.id_tipo_servicio \n" .
        "	left join proveedor_servicio ps on ps.id_servicio = s.id_servicio \n" .
        "	left join c_proveedor p on p.id_proveedor = ps.id_proveedor \n" .
        "where  (s.id_tipo_servicio=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or (" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0 and s.id_tipo_servicio in (1,2) ))\n" .
        "	and s.nombre like '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "    and (p.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)";
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

//SetValues Method @26-0530F0DD
    function SetValues()
    {
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->descripcion->SetDBValue($this->f("descripcion"));
        $this->tipo_de_servicio->SetDBValue($this->f("tipo_de_servicio"));
        $this->lProveedor->SetDBValue($this->f("proveedor"));
    }
//End SetValues Method

} //End Grid1DataSource Class @26-FCB6E20C

class clsRecordGrid2 { //Grid2 Class @35-542C3E47

//Variables @35-9E315808

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

//Class_Initialize Event @35-DA9B3CC7
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
            $this->s_nombre = new clsControl(ccsTextBox, "s_nombre", "Nombre", ccsText, "", CCGetRequestParam("s_nombre", $Method, NULL), $this);
            $this->s_id_tipo_servicio = new clsControl(ccsListBox, "s_id_tipo_servicio", "Id Tipo Servicio", ccsInteger, "", CCGetRequestParam("s_id_tipo_servicio", $Method, NULL), $this);
            $this->s_id_tipo_servicio->DSType = dsTable;
            $this->s_id_tipo_servicio->DataSource = new clsDBcnDisenio();
            $this->s_id_tipo_servicio->ds = & $this->s_id_tipo_servicio->DataSource;
            $this->s_id_tipo_servicio->DataSource->SQL = "SELECT * \n" .
"FROM c_tipo_servicio {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_tipo_servicio->BoundColumn, $this->s_id_tipo_servicio->TextColumn, $this->s_id_tipo_servicio->DBFormat) = array("id_tipo_servicio", "nombre", "");
            $this->s_id_tipo_servicio->DataSource->wp = new clsSQLParameters();
            $this->s_id_tipo_servicio->DataSource->wp->Criterion[1] = "( id_tipo_servicio in (1,2) )";
            $this->s_id_tipo_servicio->DataSource->Where = 
                 $this->s_id_tipo_servicio->DataSource->wp->Criterion[1];
            $this->s_idProveedor = new clsControl(ccsListBox, "s_idProveedor", "s_idProveedor", ccsText, "", CCGetRequestParam("s_idProveedor", $Method, NULL), $this);
            $this->s_idProveedor->DSType = dsTable;
            $this->s_idProveedor->DataSource = new clsDBcnDisenio();
            $this->s_idProveedor->ds = & $this->s_idProveedor->DataSource;
            $this->s_idProveedor->DataSource->SQL = "SELECT * \n" .
"FROM c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_idProveedor->BoundColumn, $this->s_idProveedor->TextColumn, $this->s_idProveedor->DBFormat) = array("id_proveedor", "nombre", "");
        }
    }
//End Class_Initialize Event

//Validate Method @35-FBD69B60
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_nombre->Validate() && $Validation);
        $Validation = ($this->s_id_tipo_servicio->Validate() && $Validation);
        $Validation = ($this->s_idProveedor->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_nombre->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_tipo_servicio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_idProveedor->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @35-0E269EA1
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_nombre->Errors->Count());
        $errors = ($errors || $this->s_id_tipo_servicio->Errors->Count());
        $errors = ($errors || $this->s_idProveedor->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @35-05E15477
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
        $Redirect = "ListaServicios.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "ListaServicios.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @35-387B0E93
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

        $this->s_id_tipo_servicio->Prepare();
        $this->s_idProveedor->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_nombre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_tipo_servicio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_idProveedor->Errors->ToString());
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
        $this->s_nombre->Show();
        $this->s_id_tipo_servicio->Show();
        $this->s_idProveedor->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End Grid2 Class @35-FCB6E20C

//Include Page implementation @60-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation



//Initialize Page @1-D97E66F5
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
$TemplateFileName = "ListaServicios.html";
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

//Include events file @1-508F6A0F
include_once("./ListaServicios_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-4B90F02F
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Grid1 = new clsGridGrid1("", $MainPage);
$Grid2 = new clsRecordGrid2("", $MainPage);
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$MainPage->Grid1 = & $Grid1;
$MainPage->Grid2 = & $Grid2;
$MainPage->Header = & $Header;
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

//Execute Components @1-8BFAFE44
$Header->Operations();
$Grid2->Operation();
//End Execute Components

//Go to destination page @1-19EFE337
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($Grid1);
    unset($Grid2);
    $Header->Class_Terminate();
    unset($Header);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-9919A35D
$Grid1->Show();
$Grid2->Show();
$Header->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-7334329E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($Grid1);
unset($Grid2);
$Header->Class_Terminate();
unset($Header);
unset($Tpl);
//End Unload Page


?>
