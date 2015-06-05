<?php
//Include Common Files @1-790358AC
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "ArtefactosDetalle.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridmc_info_rs_cr_RE_RC_Artef { //mc_info_rs_cr_RE_RC_Artef class @57-9B0E2082

//Variables @57-7018E599

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
    public $Sorter_Nombre;
    public $Sorter_Descripcion;
    public $Sorter_Formato;
    public $Sorter_NombreConHerramienta;
    public $Sorter_FechaEstFin;
    public $Sorter_FechaEntrega;
    public $Sorter_DiasHabilesDesviacion;
    public $Sorter_DiasNaturalesDesviacion;
//End Variables

//Class_Initialize Event @57-16172ECB
    function clsGridmc_info_rs_cr_RE_RC_Artef($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_info_rs_cr_RE_RC_Artef";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_info_rs_cr_RE_RC_Artef";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_info_rs_cr_RE_RC_ArtefDataSource($this);
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
        $this->SorterName = CCGetParam("mc_info_rs_cr_RE_RC_ArtefOrder", "");
        $this->SorterDirection = CCGetParam("mc_info_rs_cr_RE_RC_ArtefDir", "");

        $this->Nombre = new clsControl(ccsLabel, "Nombre", "Nombre", ccsText, "", CCGetRequestParam("Nombre", ccsGet, NULL), $this);
        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", ccsGet, NULL), $this);
        $this->Formato = new clsControl(ccsLabel, "Formato", "Formato", ccsText, "", CCGetRequestParam("Formato", ccsGet, NULL), $this);
        $this->NombreConHerramienta = new clsControl(ccsLabel, "NombreConHerramienta", "NombreConHerramienta", ccsText, "", CCGetRequestParam("NombreConHerramienta", ccsGet, NULL), $this);
        $this->FechaEstFin = new clsControl(ccsLabel, "FechaEstFin", "FechaEstFin", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("FechaEstFin", ccsGet, NULL), $this);
        $this->FechaEntrega = new clsControl(ccsLabel, "FechaEntrega", "FechaEntrega", ccsDate, $DefaultDateFormat, CCGetRequestParam("FechaEntrega", ccsGet, NULL), $this);
        $this->DiasHabilesDesviacion = new clsControl(ccsLabel, "DiasHabilesDesviacion", "DiasHabilesDesviacion", ccsInteger, "", CCGetRequestParam("DiasHabilesDesviacion", ccsGet, NULL), $this);
        $this->DiasNaturalesDesviacion = new clsControl(ccsLabel, "DiasNaturalesDesviacion", "DiasNaturalesDesviacion", ccsInteger, "", CCGetRequestParam("DiasNaturalesDesviacion", ccsGet, NULL), $this);
        $this->Comentarios = new clsControl(ccsLabel, "Comentarios", "Comentarios", ccsMemo, "", CCGetRequestParam("Comentarios", ccsGet, NULL), $this);
        $this->Id = new clsControl(ccsLink, "Id", "Id", ccsInteger, "", CCGetRequestParam("Id", ccsGet, NULL), $this);
        $this->Id->Page = "PPMCsCrbDetalle.php";
        $this->Label1 = new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", ccsGet, NULL), $this);
        $this->PctDeductiva = new clsControl(ccsLabel, "PctDeductiva", "PctDeductiva", ccsText, "", CCGetRequestParam("PctDeductiva", ccsGet, NULL), $this);
        $this->Sorter_Id = new clsSorter($this->ComponentName, "Sorter_Id", $FileName, $this);
        $this->Sorter_Nombre = new clsSorter($this->ComponentName, "Sorter_Nombre", $FileName, $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_Formato = new clsSorter($this->ComponentName, "Sorter_Formato", $FileName, $this);
        $this->Sorter_NombreConHerramienta = new clsSorter($this->ComponentName, "Sorter_NombreConHerramienta", $FileName, $this);
        $this->Sorter_FechaEstFin = new clsSorter($this->ComponentName, "Sorter_FechaEstFin", $FileName, $this);
        $this->Sorter_FechaEntrega = new clsSorter($this->ComponentName, "Sorter_FechaEntrega", $FileName, $this);
        $this->Sorter_DiasHabilesDesviacion = new clsSorter($this->ComponentName, "Sorter_DiasHabilesDesviacion", $FileName, $this);
        $this->Sorter_DiasNaturalesDesviacion = new clsSorter($this->ComponentName, "Sorter_DiasNaturalesDesviacion", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink1->Page = "";
        $this->Panel1 = new clsPanel("Panel1", $this);
    }
//End Class_Initialize Event

//Initialize Method @57-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @57-28D1E9C0
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlsID"] = CCGetFromGet("sID", NULL);

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
            $this->ControlsVisible["Formato"] = $this->Formato->Visible;
            $this->ControlsVisible["NombreConHerramienta"] = $this->NombreConHerramienta->Visible;
            $this->ControlsVisible["FechaEstFin"] = $this->FechaEstFin->Visible;
            $this->ControlsVisible["FechaEntrega"] = $this->FechaEntrega->Visible;
            $this->ControlsVisible["DiasHabilesDesviacion"] = $this->DiasHabilesDesviacion->Visible;
            $this->ControlsVisible["DiasNaturalesDesviacion"] = $this->DiasNaturalesDesviacion->Visible;
            $this->ControlsVisible["Comentarios"] = $this->Comentarios->Visible;
            $this->ControlsVisible["Id"] = $this->Id->Visible;
            $this->ControlsVisible["Label1"] = $this->Label1->Visible;
            $this->ControlsVisible["PctDeductiva"] = $this->PctDeductiva->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                $this->Formato->SetValue($this->DataSource->Formato->GetValue());
                $this->NombreConHerramienta->SetValue($this->DataSource->NombreConHerramienta->GetValue());
                $this->FechaEstFin->SetValue($this->DataSource->FechaEstFin->GetValue());
                $this->FechaEntrega->SetValue($this->DataSource->FechaEntrega->GetValue());
                $this->DiasHabilesDesviacion->SetValue($this->DataSource->DiasHabilesDesviacion->GetValue());
                $this->DiasNaturalesDesviacion->SetValue($this->DataSource->DiasNaturalesDesviacion->GetValue());
                $this->Comentarios->SetValue($this->DataSource->Comentarios->GetValue());
                $this->Id->SetValue($this->DataSource->Id->GetValue());
                $this->Id->Parameters = CCGetQueryString("QueryString", array("Id", "ccsForm"));
                $this->Id->Parameters = CCAddParam($this->Id->Parameters, "Id", $this->DataSource->f("Id"));
                $this->PctDeductiva->SetValue($this->DataSource->PctDeductiva->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Nombre->Show();
                $this->Descripcion->Show();
                $this->Formato->Show();
                $this->NombreConHerramienta->Show();
                $this->FechaEstFin->Show();
                $this->FechaEntrega->Show();
                $this->DiasHabilesDesviacion->Show();
                $this->DiasNaturalesDesviacion->Show();
                $this->Comentarios->Show();
                $this->Id->Show();
                $this->Label1->Show();
                $this->PctDeductiva->Show();
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
        $this->Sorter_Nombre->Show();
        $this->Sorter_Descripcion->Show();
        $this->Sorter_Formato->Show();
        $this->Sorter_NombreConHerramienta->Show();
        $this->Sorter_FechaEstFin->Show();
        $this->Sorter_FechaEntrega->Show();
        $this->Sorter_DiasHabilesDesviacion->Show();
        $this->Sorter_DiasNaturalesDesviacion->Show();
        $this->Navigator->Show();
        $this->ImageLink1->Show();
        $this->Panel1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @57-E06036DD
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Formato->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NombreConHerramienta->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaEstFin->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaEntrega->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DiasHabilesDesviacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DiasNaturalesDesviacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Comentarios->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Label1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PctDeductiva->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_info_rs_cr_RE_RC_Artef Class @57-FCB6E20C

class clsmc_info_rs_cr_RE_RC_ArtefDataSource extends clsDBcnDisenio {  //mc_info_rs_cr_RE_RC_ArtefDataSource Class @57-47A98511

//DataSource Variables @57-DF3955B2
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
    public $Formato;
    public $NombreConHerramienta;
    public $FechaEstFin;
    public $FechaEntrega;
    public $DiasHabilesDesviacion;
    public $DiasNaturalesDesviacion;
    public $Comentarios;
    public $Id;
    public $PctDeductiva;
//End DataSource Variables

//DataSourceClass_Initialize Event @57-FFAE123B
    function clsmc_info_rs_cr_RE_RC_ArtefDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_info_rs_cr_RE_RC_Artef";
        $this->Initialize();
        $this->Nombre = new clsField("Nombre", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->Formato = new clsField("Formato", ccsText, "");
        
        $this->NombreConHerramienta = new clsField("NombreConHerramienta", ccsText, "");
        
        $this->FechaEstFin = new clsField("FechaEstFin", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaEntrega = new clsField("FechaEntrega", ccsDate, $this->DateFormat);
        
        $this->DiasHabilesDesviacion = new clsField("DiasHabilesDesviacion", ccsInteger, "");
        
        $this->DiasNaturalesDesviacion = new clsField("DiasNaturalesDesviacion", ccsInteger, "");
        
        $this->Comentarios = new clsField("Comentarios", ccsMemo, "");
        
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->PctDeductiva = new clsField("PctDeductiva", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @57-E7105EE3
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Id" => array("Id", ""), 
            "Sorter_Nombre" => array("Nombre", ""), 
            "Sorter_Descripcion" => array("Descripcion", ""), 
            "Sorter_Formato" => array("Formato", ""), 
            "Sorter_NombreConHerramienta" => array("NombreConHerramienta", ""), 
            "Sorter_FechaEstFin" => array("FechaEstFin", ""), 
            "Sorter_FechaEntrega" => array("FechaEntrega", ""), 
            "Sorter_DiasHabilesDesviacion" => array("DiasHabilesDesviacion", ""), 
            "Sorter_DiasNaturalesDesviacion" => array("DiasNaturalesDesviacion", "")));
    }
//End SetOrder Method

//Prepare Method @57-2D9781FF
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlsID", ccsInteger, "", "", $this->Parameters["urlsID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[Id_Padre]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @57-43E306F9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM mc_info_rs_cr_RE_RC_Artefacto";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} Id, ID_PPMC, Nombre, Descripcion, Formato, NombreConHerramienta, FechaEstFin, FechaEntrega, DiasHabilesDesviacion, DiasNaturalesDesviacion,\n\n" .
        "DiasHabilesReales, Comentarios, PctDeductiva \n\n" .
        "FROM mc_info_rs_cr_RE_RC_Artefacto {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @57-37B14BA9
    function SetValues()
    {
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->Formato->SetDBValue($this->f("Formato"));
        $this->NombreConHerramienta->SetDBValue($this->f("NombreConHerramienta"));
        $this->FechaEstFin->SetDBValue(trim($this->f("FechaEstFin")));
        $this->FechaEntrega->SetDBValue(trim($this->f("FechaEntrega")));
        $this->DiasHabilesDesviacion->SetDBValue(trim($this->f("DiasHabilesDesviacion")));
        $this->DiasNaturalesDesviacion->SetDBValue(trim($this->f("DiasNaturalesDesviacion")));
        $this->Comentarios->SetDBValue($this->f("Comentarios"));
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->PctDeductiva->SetDBValue($this->f("PctDeductiva"));
    }
//End SetValues Method

} //End mc_info_rs_cr_RE_RC_ArtefDataSource Class @57-FCB6E20C

//Initialize Page @1-05DA7BA2
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
$TemplateFileName = "ArtefactosDetalle.html";
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

//Include events file @1-73F447D9
include_once("./ArtefactosDetalle_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-95AF9D03
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$mc_info_rs_cr_RE_RC_Artef = new clsGridmc_info_rs_cr_RE_RC_Artef("", $MainPage);
$Panel1 = new clsPanel("Panel1", $MainPage);
$MainPage->mc_info_rs_cr_RE_RC_Artef = & $mc_info_rs_cr_RE_RC_Artef;
$MainPage->Panel1 = & $Panel1;
$mc_info_rs_cr_RE_RC_Artef->Initialize();
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

//Go to destination page @1-ED074757
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($mc_info_rs_cr_RE_RC_Artef);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E47950DD
$mc_info_rs_cr_RE_RC_Artef->Show();
$Panel1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-EC90BB88
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($mc_info_rs_cr_RE_RC_Artef);
unset($Tpl);
//End Unload Page


?>
