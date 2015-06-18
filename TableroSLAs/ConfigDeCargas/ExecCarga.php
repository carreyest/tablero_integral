<?php
//Include Common Files @1-15D0284E
define("RelativePath", "..");
define("PathToCurrentPage", "/ConfigDeCargas/");
define("FileName", "ExecCarga.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsMenuMenu1 extends clsMenu { //Menu1 class @3-FEAC4CDE

//Class_Initialize Event @3-391691DD
    function clsMenuMenu1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Menu1";
        $this->Visible = True;
        $this->controls = array();
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->ErrorBlock = "Menu Menu1";

        $this->StaticItems = array();
        $this->StaticItems[] = array("item_id" => "MenuItem2", "item_id_parent" => null, "item_caption" => "Procesos de carga", "item_url" => array("Page" => "ProcesoCargaAList.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3", "item_id_parent" => null, "item_caption" => "Layouts de procesos de carga", "item_url" => array("Page" => "DetalleLayoutList.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem1", "item_id_parent" => null, "item_caption" => "Log ultimas cargas", "item_url" => array("Page" => "UltimasCargas.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem4", "item_id_parent" => null, "item_caption" => "Ejecutar Carga", "item_url" => array("Page" => "ExecCarga.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");

        $this->DataSource = new clsMenu1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->DataSource->SetProvider(array("DBLib" => "Array"));

        parent::clsMenu("item_id_parent", "item_id", null);

        $this->ItemLink = new clsControl(ccsLink, "ItemLink", "ItemLink", ccsText, "", CCGetRequestParam("ItemLink", ccsGet, NULL), $this);
        $this->controls["ItemLink"] = & $this->ItemLink;
        //$this->ItemLink->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ItemLink->Page = "";
        $this->LinkStartParameters = $this->ItemLink->Parameters;
    }
//End Class_Initialize Event

//SetControlValues Method @3-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @3-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End Menu1 Class @3-FCB6E20C

//Menu1DataSource Class @3-201CC8D7
class clsMenu1DataSource extends DB_Adapter {
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;
    var $wp;
    var $Record = array();
    var $Index;
    var $FieldsList = array();

    function clsMenu1DataSource($parent) {
        $this->Parent = & $parent;
        $this->ErrorBlock = "Menu Menu1";
        $this->ItemLink = new clsField("ItemLink", ccsText, "");
        $this->FieldsList["ItemLink"] = & $this->ItemLink;
    }

    function Prepare()
    {
    }

    function Open()
    {
        $this->query($this->Parent->StaticItems);
    }

    function SetValues()
    {
        $this->ItemLink->SetDBValue($this->f("item_caption"));
    }
}
//End Menu1DataSource Class



class clsGridproceso_carga_archivos { //proceso_carga_archivos class @40-EC79DA30

//Variables @40-D692E5D3

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
    public $Sorter_cve_carga;
    public $Sorter_descripcion;
    public $Sorter_periodicidad;
//End Variables

//Class_Initialize Event @40-FD2971BA
    function clsGridproceso_carga_archivos($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "proceso_carga_archivos";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid proceso_carga_archivos";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsproceso_carga_archivosDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 30;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("proceso_carga_archivosOrder", "");
        $this->SorterDirection = CCGetParam("proceso_carga_archivosDir", "");

        $this->cve_carga = new clsControl(ccsLink, "cve_carga", "cve_carga", ccsText, "", CCGetRequestParam("cve_carga", ccsGet, NULL), $this);
        $this->cve_carga->Page = "ExecCarga.php";
        $this->descripcion = new clsControl(ccsLabel, "descripcion", "descripcion", ccsText, "", CCGetRequestParam("descripcion", ccsGet, NULL), $this);
        $this->periodicidad = new clsControl(ccsLabel, "periodicidad", "periodicidad", ccsText, "", CCGetRequestParam("periodicidad", ccsGet, NULL), $this);
        $this->Sorter_cve_carga = new clsSorter($this->ComponentName, "Sorter_cve_carga", $FileName, $this);
        $this->Sorter_descripcion = new clsSorter($this->ComponentName, "Sorter_descripcion", $FileName, $this);
        $this->Sorter_periodicidad = new clsSorter($this->ComponentName, "Sorter_periodicidad", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @40-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @40-93158C5D
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;


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
            $this->ControlsVisible["cve_carga"] = $this->cve_carga->Visible;
            $this->ControlsVisible["descripcion"] = $this->descripcion->Visible;
            $this->ControlsVisible["periodicidad"] = $this->periodicidad->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->cve_carga->SetValue($this->DataSource->cve_carga->GetValue());
                $this->cve_carga->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->cve_carga->Parameters = CCAddParam($this->cve_carga->Parameters, "cveCarga", $this->DataSource->f("cve_carga"));
                $this->descripcion->SetValue($this->DataSource->descripcion->GetValue());
                $this->periodicidad->SetValue($this->DataSource->periodicidad->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->cve_carga->Show();
                $this->descripcion->Show();
                $this->periodicidad->Show();
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
        $this->Sorter_cve_carga->Show();
        $this->Sorter_descripcion->Show();
        $this->Sorter_periodicidad->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @40-B8974D4F
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->cve_carga->Errors->ToString());
        $errors = ComposeStrings($errors, $this->descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->periodicidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End proceso_carga_archivos Class @40-FCB6E20C

class clsproceso_carga_archivosDataSource extends clsDBConnCarga {  //proceso_carga_archivosDataSource Class @40-C2127757

//DataSource Variables @40-14CF5C26
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $cve_carga;
    public $descripcion;
    public $periodicidad;
//End DataSource Variables

//DataSourceClass_Initialize Event @40-943AE501
    function clsproceso_carga_archivosDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid proceso_carga_archivos";
        $this->Initialize();
        $this->cve_carga = new clsField("cve_carga", ccsText, "");
        
        $this->descripcion = new clsField("descripcion", ccsText, "");
        
        $this->periodicidad = new clsField("periodicidad", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @40-C8F5BD87
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "cve_carga";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_cve_carga" => array("cve_carga", ""), 
            "Sorter_descripcion" => array("descripcion", ""), 
            "Sorter_periodicidad" => array("periodicidad", "")));
    }
//End SetOrder Method

//Prepare Method @40-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @40-C863421F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM proceso_carga_archivos";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} * \n\n" .
        "FROM proceso_carga_archivos {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @40-89D77AE8
    function SetValues()
    {
        $this->cve_carga->SetDBValue($this->f("cve_carga"));
        $this->descripcion->SetDBValue($this->f("descripcion"));
        $this->periodicidad->SetDBValue($this->f("periodicidad"));
    }
//End SetValues Method

} //End proceso_carga_archivosDataSource Class @40-FCB6E20C

//Initialize Page @1-D0C8B440
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
$TemplateFileName = "ExecCarga.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/menu/ccs-menu.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-7E52ACB6
include_once("./ExecCarga_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-536FD39B
$DBConnCarga = new clsDBConnCarga();
$MainPage->Connections["ConnCarga"] = & $DBConnCarga;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$Menu1 = new clsMenuMenu1("", $MainPage);
$LExec = new clsControl(ccsLabel, "LExec", "LExec", ccsText, "", CCGetRequestParam("LExec", ccsGet, NULL), $MainPage);
$LExec->HTML = true;
$proceso_carga_archivos = new clsGridproceso_carga_archivos("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->Menu1 = & $Menu1;
$MainPage->LExec = & $LExec;
$MainPage->proceso_carga_archivos = & $proceso_carga_archivos;
$proceso_carga_archivos->Initialize();
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

//Execute Components @1-47111282
$Header->Operations();
//End Execute Components

//Go to destination page @1-C790B2B9
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnCarga->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($Menu1);
    unset($proceso_carga_archivos);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-5904A43F
$Header->Show();
$Menu1->Show();
$proceso_carga_archivos->Show();
$LExec->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-0483D2E1
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnCarga->close();
$Header->Class_Terminate();
unset($Header);
unset($Menu1);
unset($proceso_carga_archivos);
unset($Tpl);
//End Unload Page


?>
