<?php
//Include Common Files @1-DF46D1BC
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "GeneraDictamen.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
require_once 'PHPWord.php';
//End Include Common Files



class clsGridGrid2 { //Grid2 class @21-C37AF6B1

//Variables @21-6E51DF5A

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
//End Variables

//Class_Initialize Event @21-83A8D2F3
    function clsGridGrid2($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Grid2";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid Grid2";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsGrid2DataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 100;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->idSLA = new clsControl(ccsLabel, "idSLA", "idSLA", ccsInteger, "", CCGetRequestParam("idSLA", ccsGet, NULL), $this);
        $this->SLA = new clsControl(ccsLabel, "SLA", "SLA", ccsText, "", CCGetRequestParam("SLA", ccsGet, NULL), $this);
        $this->txtCumplimiento = new clsControl(ccsLabel, "txtCumplimiento", "txtCumplimiento", ccsText, "", CCGetRequestParam("txtCumplimiento", ccsGet, NULL), $this);
        $this->txtCumplimiento->HTML = true;
        $this->txtDetalle1 = new clsControl(ccsLabel, "txtDetalle1", "txtDetalle1", ccsText, "", CCGetRequestParam("txtDetalle1", ccsGet, NULL), $this);
        $this->txtDetalle1->HTML = true;
        $this->Panel1 = new clsPanel("Panel1", $this);
        $this->nombre = new clsControl(ccsHidden, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->Cumplen = new clsControl(ccsHidden, "Cumplen", "Cumplen", ccsFloat, "", CCGetRequestParam("Cumplen", ccsGet, NULL), $this);
        $this->Totales = new clsControl(ccsHidden, "Totales", "Totales", ccsInteger, "", CCGetRequestParam("Totales", ccsGet, NULL), $this);
        $this->Meta = new clsControl(ccsHidden, "Meta", "Meta", ccsInteger, "", CCGetRequestParam("Meta", ccsGet, NULL), $this);
        $this->id_proveedor = new clsControl(ccsHidden, "id_proveedor", "id_proveedor", ccsInteger, "", CCGetRequestParam("id_proveedor", ccsGet, NULL), $this);
        $this->MesReporte = new clsControl(ccsHidden, "MesReporte", "MesReporte", ccsInteger, "", CCGetRequestParam("MesReporte", ccsGet, NULL), $this);
        $this->AnioReporte = new clsControl(ccsHidden, "AnioReporte", "AnioReporte", ccsInteger, "", CCGetRequestParam("AnioReporte", ccsGet, NULL), $this);
        $this->Acronimo = new clsControl(ccsHidden, "Acronimo", "Acronimo", ccsText, "", CCGetRequestParam("Acronimo", ccsGet, NULL), $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Panel1->AddComponent("nombre", $this->nombre);
        $this->Panel1->AddComponent("Cumplen", $this->Cumplen);
        $this->Panel1->AddComponent("Totales", $this->Totales);
        $this->Panel1->AddComponent("Meta", $this->Meta);
        $this->Panel1->AddComponent("id_proveedor", $this->id_proveedor);
        $this->Panel1->AddComponent("MesReporte", $this->MesReporte);
        $this->Panel1->AddComponent("AnioReporte", $this->AnioReporte);
        $this->Panel1->AddComponent("Acronimo", $this->Acronimo);
    }
//End Class_Initialize Event

//Initialize Method @21-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @21-D7E86250
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_MesReporte"] = CCGetFromGet("s_MesReporte", NULL);
        $this->DataSource->Parameters["urls_AnioReporte"] = CCGetFromGet("s_AnioReporte", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);

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
            $this->ControlsVisible["idSLA"] = $this->idSLA->Visible;
            $this->ControlsVisible["SLA"] = $this->SLA->Visible;
            $this->ControlsVisible["txtCumplimiento"] = $this->txtCumplimiento->Visible;
            $this->ControlsVisible["txtDetalle1"] = $this->txtDetalle1->Visible;
            $this->ControlsVisible["Panel1"] = $this->Panel1->Visible;
            $this->ControlsVisible["nombre"] = $this->nombre->Visible;
            $this->ControlsVisible["Cumplen"] = $this->Cumplen->Visible;
            $this->ControlsVisible["Totales"] = $this->Totales->Visible;
            $this->ControlsVisible["Meta"] = $this->Meta->Visible;
            $this->ControlsVisible["id_proveedor"] = $this->id_proveedor->Visible;
            $this->ControlsVisible["MesReporte"] = $this->MesReporte->Visible;
            $this->ControlsVisible["AnioReporte"] = $this->AnioReporte->Visible;
            $this->ControlsVisible["Acronimo"] = $this->Acronimo->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->idSLA->SetValue($this->DataSource->idSLA->GetValue());
                $this->SLA->SetValue($this->DataSource->SLA->GetValue());
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->Cumplen->SetValue($this->DataSource->Cumplen->GetValue());
                $this->Totales->SetValue($this->DataSource->Totales->GetValue());
                $this->Meta->SetValue($this->DataSource->Meta->GetValue());
                $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                $this->MesReporte->SetValue($this->DataSource->MesReporte->GetValue());
                $this->AnioReporte->SetValue($this->DataSource->AnioReporte->GetValue());
                $this->Acronimo->SetValue($this->DataSource->Acronimo->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->idSLA->Show();
                $this->SLA->Show();
                $this->txtCumplimiento->Show();
                $this->txtDetalle1->Show();
                $this->Panel1->Show();
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
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @21-21893172
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->idSLA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SLA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->txtCumplimiento->Errors->ToString());
        $errors = ComposeStrings($errors, $this->txtDetalle1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumplen->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Totales->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Meta->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_proveedor->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MesReporte->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AnioReporte->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Acronimo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid2 Class @21-FCB6E20C

class clsGrid2DataSource extends clsDBcnDisenio {  //Grid2DataSource Class @21-C024CE9B

//DataSource Variables @21-DE8FA51A
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $idSLA;
    public $SLA;
    public $nombre;
    public $Cumplen;
    public $Totales;
    public $Meta;
    public $id_proveedor;
    public $MesReporte;
    public $AnioReporte;
    public $Acronimo;
//End DataSource Variables

//DataSourceClass_Initialize Event @21-0048CC4D
    function clsGrid2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid2";
        $this->Initialize();
        $this->idSLA = new clsField("idSLA", ccsInteger, "");
        
        $this->SLA = new clsField("SLA", ccsText, "");
        
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->Cumplen = new clsField("Cumplen", ccsFloat, "");
        
        $this->Totales = new clsField("Totales", ccsInteger, "");
        
        $this->Meta = new clsField("Meta", ccsInteger, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->MesReporte = new clsField("MesReporte", ccsInteger, "");
        
        $this->AnioReporte = new clsField("AnioReporte", ccsInteger, "");
        
        $this->Acronimo = new clsField("Acronimo", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @21-13B07182
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "id_ver_metrica ";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @21-4498B945
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], date('m'), false);
        $this->wp->AddParameter("2", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], date('Y'), false);
        $this->wp->AddParameter("3", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
    }
//End Prepare Method

//Open Method @21-7EE28580
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (\n" .
        "\n" .
        "select metrica, id_ver_metrica, \n" .
        "	sla.nombre, sla.idsla, sla.sla, sum(sla.cumplen) cumplen, sum(sla.totales) as totales, avg(sla.meta) meta, \n" .
        "	sla.id_proveedor, sla.MesReporte, sla.AnioReporte, sla.Acronimo  \n" .
        "	from vw_Servicios_Proveedores vsp\n" .
        "		left join vw_SLAs_v3 sla on sla.id_proveedor = vsp.id_proveedor\n" .
        "		    and vsp.id_servicio = sla.id_servicio_cont \n" .
        "			and vsp.id_ver_metrica = sla.idsla						\n" .
        "			and mesreporte = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "  \n" .
        "			and anioreporte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "where vsp.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and idSLA is not null\n" .
        "group by metrica, id_ver_metrica, \n" .
        "	sla.nombre, sla.idsla, sla.sla, sla.id_proveedor, sla.MesReporte, sla.AnioReporte, sla.Acronimo) cnt";
        $this->SQL = "\n" .
        "\n" .
        "select TOP {SqlParam_endRecord} metrica, id_ver_metrica, \n" .
        "	sla.nombre, sla.idsla, sla.sla, sum(sla.cumplen) cumplen, sum(sla.totales) as totales, avg(sla.meta) meta, \n" .
        "	sla.id_proveedor, sla.MesReporte, sla.AnioReporte, sla.Acronimo  \n" .
        "	from vw_Servicios_Proveedores vsp\n" .
        "		left join vw_SLAs_v3 sla on sla.id_proveedor = vsp.id_proveedor\n" .
        "		    and vsp.id_servicio = sla.id_servicio_cont \n" .
        "			and vsp.id_ver_metrica = sla.idsla						\n" .
        "			and mesreporte = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "  \n" .
        "			and anioreporte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "where vsp.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and idSLA is not null\n" .
        "group by metrica, id_ver_metrica, \n" .
        "	sla.nombre, sla.idsla, sla.sla, sla.id_proveedor, sla.MesReporte, sla.AnioReporte, sla.Acronimo  {SQL_OrderBy}";
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

//SetValues Method @21-E277349E
    function SetValues()
    {
        $this->idSLA->SetDBValue(trim($this->f("id_ver_metrica")));
        $this->SLA->SetDBValue($this->f("metrica"));
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->Cumplen->SetDBValue(trim($this->f("cumplen")));
        $this->Totales->SetDBValue(trim($this->f("totales")));
        $this->Meta->SetDBValue(trim($this->f("meta")));
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->MesReporte->SetDBValue(trim($this->f("MesReporte")));
        $this->AnioReporte->SetDBValue(trim($this->f("AnioReporte")));
        $this->Acronimo->SetDBValue($this->f("Acronimo"));
    }
//End SetValues Method

} //End Grid2DataSource Class @21-FCB6E20C



//Include Page implementation @63-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

//Initialize Page @1-9A994D2C
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
$TemplateFileName = "GeneraDictamen.html";
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

//Include events file @1-A5BEE29C
include_once("./GeneraDictamen_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-826ED264
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Grid2 = new clsGridGrid2("", $MainPage);
$Label1 = new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", ccsGet, NULL), $MainPage);
$Label1->HTML = true;
$lblPeriodo = new clsControl(ccsLabel, "lblPeriodo", "lblPeriodo", ccsText, "", CCGetRequestParam("lblPeriodo", ccsGet, NULL), $MainPage);
$lblMesCierre = new clsControl(ccsLabel, "lblMesCierre", "lblMesCierre", ccsText, "", CCGetRequestParam("lblMesCierre", ccsGet, NULL), $MainPage);
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$MainPage->Grid2 = & $Grid2;
$MainPage->Label1 = & $Label1;
$MainPage->lblPeriodo = & $lblPeriodo;
$MainPage->lblMesCierre = & $lblMesCierre;
$MainPage->Header = & $Header;
if(!is_array($lblPeriodo->Value) && !strlen($lblPeriodo->Value) && $lblPeriodo->Value !== false)
    $lblPeriodo->SetText(date('d-m-Y',mktime(0,0,0,ccgetparam("s_MesReporte",date('m')),1,ccgetparam("s_AnioReporte",date('Y')))));
$Grid2->Initialize();
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

//Execute Components @1-47111282
$Header->Operations();
//End Execute Components

//Go to destination page @1-F629971A
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($Grid2);
    $Header->Class_Terminate();
    unset($Header);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A0E5B9E1
$Grid2->Show();
$Header->Show();
$Label1->Show();
$lblPeriodo->Show();
$lblMesCierre->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-EC83C7E7
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($Grid2);
$Header->Class_Terminate();
unset($Header);
unset($Tpl);
//End Unload Page


?>
