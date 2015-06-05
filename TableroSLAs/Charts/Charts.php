<?php
//Include Common Files @1-9A2D7848
define("RelativePath", "..");
define("PathToCurrentPage", "/Charts/");
define("FileName", "Charts.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @4-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_c_metrica { //mc_c_metrica Class @5-34284005

//Variables @5-9E315808

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

//Class_Initialize Event @5-A19231CD
    function clsRecordmc_c_metrica($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_c_metrica/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_c_metrica";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_Acronimo = new clsControl(ccsCheckBoxList, "s_Acronimo", "Acronimo", ccsText, "", CCGetRequestParam("s_Acronimo", $Method, NULL), $this);
            $this->s_Acronimo->Multiple = true;
            $this->s_Acronimo->DSType = dsTable;
            $this->s_Acronimo->DataSource = new clsDBcnDisenio();
            $this->s_Acronimo->ds = & $this->s_Acronimo->DataSource;
            $this->s_Acronimo->DataSource->SQL = "SELECT Acronimo, mc_c_metrica.nombre AS mc_c_metrica_nombre \n" .
"FROM mc_c_metrica INNER JOIN mc_metrica_atributo ON\n" .
"mc_c_metrica.id_ver_metrica = mc_metrica_atributo.id_ver_metrica {SQL_Where} {SQL_OrderBy}";
            $this->s_Acronimo->DataSource->Order = "valor";
            list($this->s_Acronimo->BoundColumn, $this->s_Acronimo->TextColumn, $this->s_Acronimo->DBFormat) = array("Acronimo", "mc_c_metrica_nombre", "");
            $this->s_Acronimo->DataSource->Parameters["expr31"] = 'Orden';
            $this->s_Acronimo->DataSource->wp = new clsSQLParameters();
            $this->s_Acronimo->DataSource->wp->AddParameter("2", "expr31", ccsText, "", "", $this->s_Acronimo->DataSource->Parameters["expr31"], "", false);
            $this->s_Acronimo->DataSource->wp->Criterion[1] = "( Acronimo is not null )";
            $this->s_Acronimo->DataSource->wp->Criterion[2] = $this->s_Acronimo->DataSource->wp->Operation(opEqual, "mc_metrica_atributo.nombre", $this->s_Acronimo->DataSource->wp->GetDBValue("2"), $this->s_Acronimo->DataSource->ToSQL($this->s_Acronimo->DataSource->wp->GetDBValue("2"), ccsText),false);
            $this->s_Acronimo->DataSource->Where = $this->s_Acronimo->DataSource->wp->opAND(
                 false, 
                 $this->s_Acronimo->DataSource->wp->Criterion[1], 
                 $this->s_Acronimo->DataSource->wp->Criterion[2]);
            $this->s_Acronimo->DataSource->Order = "valor";
            $this->s_Acronimo->HTML = true;
            $this->s_Anio = new clsControl(ccsListBox, "s_Anio", "s_Anio", ccsText, "", CCGetRequestParam("s_Anio", $Method, NULL), $this);
            $this->s_Anio->DSType = dsTable;
            $this->s_Anio->DataSource = new clsDBcnDisenio();
            $this->s_Anio->ds = & $this->s_Anio->DataSource;
            $this->s_Anio->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_Anio->BoundColumn, $this->s_Anio->TextColumn, $this->s_Anio->DBFormat) = array("Ano", "Ano", "");
            $this->s_Metrica = new clsControl(ccsListBox, "s_Metrica", "s_Metrica", ccsText, "", CCGetRequestParam("s_Metrica", $Method, NULL), $this);
            $this->s_Metrica->DSType = dsListOfValues;
            $this->s_Metrica->Values = array(array("0", "% Cumplimiento"), array("1", "# Medidos"), array("2", "# Cumplen"));
            $this->s_Mes = new clsControl(ccsListBox, "s_Mes", "s_Mes", ccsText, "", CCGetRequestParam("s_Mes", $Method, NULL), $this);
            $this->s_Mes->DSType = dsTable;
            $this->s_Mes->DataSource = new clsDBcnDisenio();
            $this->s_Mes->ds = & $this->s_Mes->DataSource;
            $this->s_Mes->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_Mes->BoundColumn, $this->s_Mes->TextColumn, $this->s_Mes->DBFormat) = array("IdMes", "Mes", "");
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_Anio->Value) && !strlen($this->s_Anio->Value) && $this->s_Anio->Value !== false)
                    $this->s_Anio->SetText(date('Y'));
                if(!is_array($this->s_Metrica->Value) && !strlen($this->s_Metrica->Value) && $this->s_Metrica->Value !== false)
                    $this->s_Metrica->SetText(0);
            }
        }
    }
//End Class_Initialize Event

//Validate Method @5-E8C0BA65
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_Acronimo->Validate() && $Validation);
        $Validation = ($this->s_Anio->Validate() && $Validation);
        $Validation = ($this->s_Metrica->Validate() && $Validation);
        $Validation = ($this->s_Mes->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_Acronimo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Metrica->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Mes->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @5-1A0AFCCF
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_Acronimo->Errors->Count());
        $errors = ($errors || $this->s_Anio->Errors->Count());
        $errors = ($errors || $this->s_Metrica->Errors->Count());
        $errors = ($errors || $this->s_Mes->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @5-DD94EE4C
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

//Show Method @5-2B2C0DD2
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

        $this->s_Acronimo->Prepare();
        $this->s_Anio->Prepare();
        $this->s_Metrica->Prepare();
        $this->s_Mes->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_Acronimo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Metrica->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Mes->Errors->ToString());
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
        $this->s_Acronimo->Show();
        $this->s_Anio->Show();
        $this->s_Metrica->Show();
        $this->s_Mes->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_c_metrica Class @5-FCB6E20C

//Initialize Page @1-28351E8C
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
$TemplateFileName = "Charts.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-872FD3D7
CCSecurityRedirect("", "");
//End Authenticate User

//Include events file @1-96DD521A
include_once("./Charts_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-255DCCC8
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$mc_c_metrica = new clsRecordmc_c_metrica("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_c_metrica = & $mc_c_metrica;
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

//Execute Components @1-F20C6022
$mc_c_metrica->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-F136C90D
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_c_metrica);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-69C164CC
$Header->Show();
$mc_c_metrica->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-DEC328CA
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_c_metrica);
unset($Tpl);
//End Unload Page


?>
