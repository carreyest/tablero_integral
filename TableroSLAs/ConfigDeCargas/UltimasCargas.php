<?php
//Include Common Files @1-49C7D4FE
define("RelativePath", "..");
define("PathToCurrentPage", "/ConfigDeCargas/");
define("FileName", "UltimasCargas.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation



class clsMenuMenu1 extends clsMenu { //Menu1 class @13-FEAC4CDE

//Class_Initialize Event @13-391691DD
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
        $this->ItemLink->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ItemLink->Page = "";
        $this->LinkStartParameters = $this->ItemLink->Parameters;
    }
//End Class_Initialize Event

//SetControlValues Method @13-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @13-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End Menu1 Class @13-FCB6E20C

//Menu1DataSource Class @13-201CC8D7
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

class clsGridGrid1 { //Grid1 class @18-E857A572

//Variables @18-0F53ED51

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
    public $Sorter_nombreCarga;
    public $Sorter_fecha_ejecucion;
    public $Sorter_status;
    public $Sorter_archivo_cargado;
    public $Sorter_Registros;
    public $Sorter_tabla_destino;
//End Variables

//Class_Initialize Event @18-79D01FE9
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

        $this->nombreCarga = new clsControl(ccsLabel, "nombreCarga", "nombreCarga", ccsText, "", CCGetRequestParam("nombreCarga", ccsGet, NULL), $this);
        $this->fecha_ejecucion = new clsControl(ccsLabel, "fecha_ejecucion", "fecha_ejecucion", ccsDate, array("GeneralDate"), CCGetRequestParam("fecha_ejecucion", ccsGet, NULL), $this);
        $this->status = new clsControl(ccsLabel, "status", "status", ccsText, "", CCGetRequestParam("status", ccsGet, NULL), $this);
        $this->archivo_cargado = new clsControl(ccsLabel, "archivo_cargado", "archivo_cargado", ccsText, "", CCGetRequestParam("archivo_cargado", ccsGet, NULL), $this);
        $this->Registros = new clsControl(ccsLabel, "Registros", "Registros", ccsInteger, "", CCGetRequestParam("Registros", ccsGet, NULL), $this);
        $this->tabla_destino = new clsControl(ccsLabel, "tabla_destino", "tabla_destino", ccsText, "", CCGetRequestParam("tabla_destino", ccsGet, NULL), $this);
        $this->mensajes = new clsControl(ccsLabel, "mensajes", "mensajes", ccsMemo, "", CCGetRequestParam("mensajes", ccsGet, NULL), $this);
        $this->Sorter_nombreCarga = new clsSorter($this->ComponentName, "Sorter_nombreCarga", $FileName, $this);
        $this->Sorter_fecha_ejecucion = new clsSorter($this->ComponentName, "Sorter_fecha_ejecucion", $FileName, $this);
        $this->Sorter_status = new clsSorter($this->ComponentName, "Sorter_status", $FileName, $this);
        $this->Sorter_archivo_cargado = new clsSorter($this->ComponentName, "Sorter_archivo_cargado", $FileName, $this);
        $this->Sorter_Registros = new clsSorter($this->ComponentName, "Sorter_Registros", $FileName, $this);
        $this->Sorter_tabla_destino = new clsSorter($this->ComponentName, "Sorter_tabla_destino", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @18-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @18-769083A4
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
            $this->ControlsVisible["nombreCarga"] = $this->nombreCarga->Visible;
            $this->ControlsVisible["fecha_ejecucion"] = $this->fecha_ejecucion->Visible;
            $this->ControlsVisible["status"] = $this->status->Visible;
            $this->ControlsVisible["archivo_cargado"] = $this->archivo_cargado->Visible;
            $this->ControlsVisible["Registros"] = $this->Registros->Visible;
            $this->ControlsVisible["tabla_destino"] = $this->tabla_destino->Visible;
            $this->ControlsVisible["mensajes"] = $this->mensajes->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->nombreCarga->SetValue($this->DataSource->nombreCarga->GetValue());
                $this->fecha_ejecucion->SetValue($this->DataSource->fecha_ejecucion->GetValue());
                $this->status->SetValue($this->DataSource->status->GetValue());
                $this->archivo_cargado->SetValue($this->DataSource->archivo_cargado->GetValue());
                $this->Registros->SetValue($this->DataSource->Registros->GetValue());
                $this->tabla_destino->SetValue($this->DataSource->tabla_destino->GetValue());
                $this->mensajes->SetValue($this->DataSource->mensajes->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->nombreCarga->Show();
                $this->fecha_ejecucion->Show();
                $this->status->Show();
                $this->archivo_cargado->Show();
                $this->Registros->Show();
                $this->tabla_destino->Show();
                $this->mensajes->Show();
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
        $this->Sorter_nombreCarga->Show();
        $this->Sorter_fecha_ejecucion->Show();
        $this->Sorter_status->Show();
        $this->Sorter_archivo_cargado->Show();
        $this->Sorter_Registros->Show();
        $this->Sorter_tabla_destino->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @18-581BE976
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->nombreCarga->Errors->ToString());
        $errors = ComposeStrings($errors, $this->fecha_ejecucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->status->Errors->ToString());
        $errors = ComposeStrings($errors, $this->archivo_cargado->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Registros->Errors->ToString());
        $errors = ComposeStrings($errors, $this->tabla_destino->Errors->ToString());
        $errors = ComposeStrings($errors, $this->mensajes->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @18-FCB6E20C

class clsGrid1DataSource extends clsDBConnCarga {  //Grid1DataSource Class @18-112C61C3

//DataSource Variables @18-6B085059
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $nombreCarga;
    public $fecha_ejecucion;
    public $status;
    public $archivo_cargado;
    public $Registros;
    public $tabla_destino;
    public $mensajes;
//End DataSource Variables

//DataSourceClass_Initialize Event @18-632078AC
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->nombreCarga = new clsField("nombreCarga", ccsText, "");
        
        $this->fecha_ejecucion = new clsField("fecha_ejecucion", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->status = new clsField("status", ccsText, "");
        
        $this->archivo_cargado = new clsField("archivo_cargado", ccsText, "");
        
        $this->Registros = new clsField("Registros", ccsInteger, "");
        
        $this->tabla_destino = new clsField("tabla_destino", ccsText, "");
        
        $this->mensajes = new clsField("mensajes", ccsMemo, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @18-04663909
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "2 desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_nombreCarga" => array("nombreCarga", ""), 
            "Sorter_fecha_ejecucion" => array("fecha_ejecucion", ""), 
            "Sorter_status" => array("status", ""), 
            "Sorter_archivo_cargado" => array("archivo_cargado", ""), 
            "Sorter_Registros" => array("Registros", ""), 
            "Sorter_tabla_destino" => array("tabla_destino", "")));
    }
//End SetOrder Method

//Prepare Method @18-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @18-2643C8CF
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select b.nombreCarga,b.fecha_ejecucion,b.status,b.archivo_cargado, b.registros_en_archivo Registros, P.tabla_destino, b.mensajes\n" .
        "from bitacora_de_carga b\n" .
        "inner join (select nombreCarga,  MAX(fecha_ejecucion) maxfecha from bitacora_de_carga group by nombreCarga) j on b.nombreCarga=j.nombreCarga and b.fecha_ejecucion=j.maxfecha\n" .
        "left join proceso_carga_archivos P ON b.nombreCarga=P.cve_carga) cnt";
        $this->SQL = "select TOP {SqlParam_endRecord} b.nombreCarga,b.fecha_ejecucion,b.status,b.archivo_cargado, b.registros_en_archivo Registros, P.tabla_destino, b.mensajes\n" .
        "from bitacora_de_carga b\n" .
        "inner join (select nombreCarga,  MAX(fecha_ejecucion) maxfecha from bitacora_de_carga group by nombreCarga) j on b.nombreCarga=j.nombreCarga and b.fecha_ejecucion=j.maxfecha\n" .
        "left join proceso_carga_archivos P ON b.nombreCarga=P.cve_carga {SQL_OrderBy}";
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

//SetValues Method @18-5C2F17B9
    function SetValues()
    {
        $this->nombreCarga->SetDBValue($this->f("nombreCarga"));
        $this->fecha_ejecucion->SetDBValue(trim($this->f("fecha_ejecucion")));
        $this->status->SetDBValue($this->f("status"));
        $this->archivo_cargado->SetDBValue($this->f("archivo_cargado"));
        $this->Registros->SetDBValue(trim($this->f("Registros")));
        $this->tabla_destino->SetDBValue($this->f("tabla_destino"));
        $this->mensajes->SetDBValue($this->f("mensajes"));
    }
//End SetValues Method

} //End Grid1DataSource Class @18-FCB6E20C



//Initialize Page @1-75FA391E
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
$TemplateFileName = "UltimasCargas.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/menu/ccs-menu.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-0BF8A55A
$DBConnCarga = new clsDBConnCarga();
$MainPage->Connections["ConnCarga"] = & $DBConnCarga;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$Menu1 = new clsMenuMenu1("", $MainPage);
$Grid1 = new clsGridGrid1("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->Menu1 = & $Menu1;
$MainPage->Grid1 = & $Grid1;
$Grid1->Initialize();
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

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

//Go to destination page @1-522E1B66
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnCarga->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($Menu1);
    unset($Grid1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-946BA1E4
$Header->Show();
$Menu1->Show();
$Grid1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-45647D30
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnCarga->close();
$Header->Class_Terminate();
unset($Header);
unset($Menu1);
unset($Grid1);
unset($Tpl);
//End Unload Page


?>
