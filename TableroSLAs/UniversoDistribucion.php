<?php
//Include Common Files @1-D290C8BF
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "UniversoDistribucion.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_c_proveedor_mc_EfPresu { //mc_c_proveedor_mc_EfPresu Class @22-F4AEF8B9

//Variables @22-9E315808

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

//Class_Initialize Event @22-ABC5C6D3
    function clsRecordmc_c_proveedor_mc_EfPresu($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_c_proveedor_mc_EfPresu/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_c_proveedor_mc_EfPresu";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsTable;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            $this->s_id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->DataSource->Parameters["expr39"] = 'CDS';
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "expr39", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["expr39"], "", false);
            $this->s_id_proveedor->DataSource->wp->Criterion[1] = $this->s_id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_id_proveedor->DataSource->wp->GetDBValue("1"), $this->s_id_proveedor->DataSource->ToSQL($this->s_id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_id_proveedor->DataSource->Where = 
                 $this->s_id_proveedor->DataSource->wp->Criterion[1];
            $this->s_numero = new clsControl(ccsTextBox, "s_numero", "Numero", ccsText, "", CCGetRequestParam("s_numero", $Method, NULL), $this);
            $this->s_tipo = new clsControl(ccsListBox, "s_tipo", "Tipo", ccsText, "", CCGetRequestParam("s_tipo", $Method, NULL), $this);
            $this->s_tipo->DSType = dsListOfValues;
            $this->s_tipo->Values = array(array("IN", "Incidente"), array("PA", "PPMC de Apertura"), array("PC", "PPMC de Cierre"));
            $this->s_mes = new clsControl(ccsListBox, "s_mes", "Mes", ccsInteger, "", CCGetRequestParam("s_mes", $Method, NULL), $this);
            $this->s_mes->DSType = dsTable;
            $this->s_mes->DataSource = new clsDBcnDisenio();
            $this->s_mes->ds = & $this->s_mes->DataSource;
            $this->s_mes->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_mes->BoundColumn, $this->s_mes->TextColumn, $this->s_mes->DBFormat) = array("IdMes", "Mes", "");
            $this->s_anio = new clsControl(ccsListBox, "s_anio", "Anio", ccsInteger, "", CCGetRequestParam("s_anio", $Method, NULL), $this);
            $this->s_anio->DSType = dsTable;
            $this->s_anio->DataSource = new clsDBcnDisenio();
            $this->s_anio->ds = & $this->s_anio->DataSource;
            $this->s_anio->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_anio->BoundColumn, $this->s_anio->TextColumn, $this->s_anio->DBFormat) = array("Ano", "Ano", "");
            $this->s_analista = new clsControl(ccsListBox, "s_analista", "Analista", ccsText, "", CCGetRequestParam("s_analista", $Method, NULL), $this);
            $this->s_analista->DSType = dsTable;
            $this->s_analista->DataSource = new clsDBcnDisenio();
            $this->s_analista->ds = & $this->s_analista->DataSource;
            $this->s_analista->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_usuarios {SQL_Where} {SQL_OrderBy}";
            list($this->s_analista->BoundColumn, $this->s_analista->TextColumn, $this->s_analista->DBFormat) = array("Usuario", "Usuario", "");
            $this->s_analista->DataSource->Parameters["urlGrupo"] = CCGetFromGet("Grupo", NULL);
            $this->s_analista->DataSource->Parameters["expr150"] = 1;
            $this->s_analista->DataSource->wp = new clsSQLParameters();
            $this->s_analista->DataSource->wp->AddParameter("1", "urlGrupo", ccsText, "", "", $this->s_analista->DataSource->Parameters["urlGrupo"], 'CAPC', false);
            $this->s_analista->DataSource->wp->AddParameter("2", "expr150", ccsInteger, "", "", $this->s_analista->DataSource->Parameters["expr150"], "", false);
            $this->s_analista->DataSource->wp->Criterion[1] = $this->s_analista->DataSource->wp->Operation(opEqual, "[Grupo]", $this->s_analista->DataSource->wp->GetDBValue("1"), $this->s_analista->DataSource->ToSQL($this->s_analista->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_analista->DataSource->wp->Criterion[2] = $this->s_analista->DataSource->wp->Operation(opEqual, "[Activo]", $this->s_analista->DataSource->wp->GetDBValue("2"), $this->s_analista->DataSource->ToSQL($this->s_analista->DataSource->wp->GetDBValue("2"), ccsInteger),false);
            $this->s_analista->DataSource->Where = $this->s_analista->DataSource->wp->opAND(
                 false, 
                 $this->s_analista->DataSource->wp->Criterion[1], 
                 $this->s_analista->DataSource->wp->Criterion[2]);
            $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", $Method, NULL), $this);
            $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->Link1->Page = "ListadoMes.php";
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_mes->Value) && !strlen($this->s_mes->Value) && $this->s_mes->Value !== false)
                    $this->s_mes->SetText(date("m")-2);
                if(!is_array($this->s_anio->Value) && !strlen($this->s_anio->Value) && $this->s_anio->Value !== false)
                    $this->s_anio->SetText(date("Y"));
            }
        }
    }
//End Class_Initialize Event

//Validate Method @22-2C30E4F7
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_numero->Validate() && $Validation);
        $Validation = ($this->s_tipo->Validate() && $Validation);
        $Validation = ($this->s_mes->Validate() && $Validation);
        $Validation = ($this->s_anio->Validate() && $Validation);
        $Validation = ($this->s_analista->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_numero->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_tipo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_analista->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @22-EE738123
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_numero->Errors->Count());
        $errors = ($errors || $this->s_tipo->Errors->Count());
        $errors = ($errors || $this->s_mes->Errors->Count());
        $errors = ($errors || $this->s_anio->Errors->Count());
        $errors = ($errors || $this->s_analista->Errors->Count());
        $errors = ($errors || $this->Link1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @22-962E14B3
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
        $Redirect = "UniversoDistribucion.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "UniversoDistribucion.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @22-C5D0019D
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

        $this->s_id_proveedor->Prepare();
        $this->s_tipo->Prepare();
        $this->s_mes->Prepare();
        $this->s_anio->Prepare();
        $this->s_analista->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_numero->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_tipo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_analista->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link1->Errors->ToString());
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
        $this->s_id_proveedor->Show();
        $this->s_numero->Show();
        $this->s_tipo->Show();
        $this->s_mes->Show();
        $this->s_anio->Show();
        $this->s_analista->Show();
        $this->Link1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_c_proveedor_mc_EfPresu Class @22-FCB6E20C

class clsEditableGridmc_universo_cds { //mc_universo_cds Class @3-F263941D

//Variables @3-18531F0E

    // Public variables
    public $ComponentType = "EditableGrid";
    public $ComponentName;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormParameters;
    public $FormState;
    public $FormEnctype;
    public $CachedColumns;
    public $TotalRows;
    public $UpdatedRows;
    public $EmptyRows;
    public $Visible;
    public $RowsErrors;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode;
    public $ValidatingControls;
    public $Controls;
    public $ControlsErrors;
    public $RowNumber;
    public $Attributes;

    // Class variables
    public $Sorter_id;
    public $Sorter_id_proveedor;
    public $Sorter_numero;
    public $Sorter_tipo;
    public $Sorter_mes;
    public $Sorter_anio;
    public $Sorter_analista;
//End Variables

//Class_Initialize Event @3-4DE7723C
    function clsEditableGridmc_universo_cds($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid mc_universo_cds/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "mc_universo_cds";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_universo_cdsDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 25;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: EditableGrid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->EmptyRows = 0;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if(!$this->Visible) return;

        $CCSForm = CCGetFromGet("ccsForm", "");
        $this->FormEnctype = "application/x-www-form-urlencoded";
        $this->FormSubmitted = ($CCSForm == $this->ComponentName);
        if($this->FormSubmitted) {
            $this->FormState = CCGetFromPost("FormState", "");
            $this->SetFormState($this->FormState);
        } else {
            $this->FormState = "";
        }
        $Method = $this->FormSubmitted ? ccsPost : ccsGet;

        $this->SorterName = CCGetParam("mc_universo_cdsOrder", "");
        $this->SorterDirection = CCGetParam("mc_universo_cdsDir", "");

        $this->Sorter_id = new clsSorter($this->ComponentName, "Sorter_id", $FileName, $this);
        $this->Sorter_id_proveedor = new clsSorter($this->ComponentName, "Sorter_id_proveedor", $FileName, $this);
        $this->Sorter_numero = new clsSorter($this->ComponentName, "Sorter_numero", $FileName, $this);
        $this->Sorter_tipo = new clsSorter($this->ComponentName, "Sorter_tipo", $FileName, $this);
        $this->Sorter_mes = new clsSorter($this->ComponentName, "Sorter_mes", $FileName, $this);
        $this->Sorter_anio = new clsSorter($this->ComponentName, "Sorter_anio", $FileName, $this);
        $this->Sorter_analista = new clsSorter($this->ComponentName, "Sorter_analista", $FileName, $this);
        $this->id = new clsControl(ccsLabel, "id", "id", ccsInteger, "", NULL, $this);
        $this->id_proveedor = new clsControl(ccsLabel, "id_proveedor", "id_proveedor", ccsText, "", NULL, $this);
        $this->numero = new clsControl(ccsLabel, "numero", "numero", ccsText, "", NULL, $this);
        $this->tipo = new clsControl(ccsLabel, "tipo", "tipo", ccsText, "", NULL, $this);
        $this->mes = new clsControl(ccsLabel, "mes", "mes", ccsText, "", NULL, $this);
        $this->anio = new clsControl(ccsLabel, "anio", "anio", ccsInteger, "", NULL, $this);
        $this->analista = new clsControl(ccsListBox, "analista", "Analista", ccsText, "", NULL, $this);
        $this->analista->DSType = dsSQL;
        $this->analista->DataSource = new clsDBcnDisenio();
        $this->analista->ds = & $this->analista->DataSource;
        list($this->analista->BoundColumn, $this->analista->TextColumn, $this->analista->DBFormat) = array("Usuario", "Usuario", "");
        $this->analista->DataSource->Parameters["urlGrupo"] = CCGetFromGet("Grupo", NULL);
        $this->analista->DataSource->Parameters["expr145"] = 1;
        $this->analista->DataSource->Parameters["urls_mes"] = CCGetFromGet("s_mes", NULL);
        $this->analista->DataSource->Parameters["urls_anio"] = CCGetFromGet("s_anio", NULL);
        $this->analista->DataSource->wp = new clsSQLParameters();
        $this->analista->DataSource->wp->AddParameter("1", "urlGrupo", ccsText, "", "", $this->analista->DataSource->Parameters["urlGrupo"], 'CAPC', false);
        $this->analista->DataSource->wp->AddParameter("2", "expr145", ccsInteger, "", "", $this->analista->DataSource->Parameters["expr145"], 0, false);
        $this->analista->DataSource->wp->AddParameter("3", "urls_mes", ccsInteger, "", "", $this->analista->DataSource->Parameters["urls_mes"], 0, false);
        $this->analista->DataSource->wp->AddParameter("4", "urls_anio", ccsInteger, "", "", $this->analista->DataSource->Parameters["urls_anio"], 0, false);
        $this->analista->DataSource->SQL = "SELECT * \n" .
        "FROM mc_c_usuarios\n" .
        "WHERE Grupo = '" . $this->analista->DataSource->SQLValue($this->analista->DataSource->wp->GetDBValue("1"), ccsText) . "'\n" .
        "AND Activo = " . $this->analista->DataSource->SQLValue($this->analista->DataSource->wp->GetDBValue("2"), ccsInteger) . " \n" .
        "   OR usuario IN (\n" .
        "     SELECT DISTINCT analista \n" .
        "     FROM mc_universo_cds \n" .
        "     WHERE mes = " . $this->analista->DataSource->SQLValue($this->analista->DataSource->wp->GetDBValue("3"), ccsInteger) . "  AND anio = " . $this->analista->DataSource->SQLValue($this->analista->DataSource->wp->GetDBValue("4"), ccsInteger) . " )\n" .
        "";
        $this->analista->DataSource->Order = "";
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->hdID = new clsControl(ccsHidden, "hdID", "hdID", ccsText, "", NULL, $this);
        $this->descartar_manual = new clsControl(ccsLabel, "descartar_manual", "descartar_manual", ccsText, "", NULL, $this);
        $this->NumFila = new clsControl(ccsLabel, "NumFila", "NumFila", ccsText, "", NULL, $this);
        $this->TotalRecords = new clsControl(ccsLabel, "TotalRecords", "TotalRecords", ccsText, "", NULL, $this);
        $this->notas_manual = new clsControl(ccsLabel, "notas_manual", "notas_manual", ccsText, "", NULL, $this);
        $this->Medido = new clsControl(ccsCheckBox, "Medido", "Medido", ccsInteger, "", NULL, $this);
        $this->Medido->CheckedValue = $this->Medido->GetParsedValue(1);
        $this->Medido->UncheckedValue = $this->Medido->GetParsedValue(0);
        $this->Button1 = new clsButton("Button1", $Method, $this);
    }
//End Class_Initialize Event

//Initialize Method @3-25DCDC12
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_analista"] = CCGetFromGet("s_analista", NULL);
        $this->DataSource->Parameters["urls_anio"] = CCGetFromGet("s_anio", NULL);
        $this->DataSource->Parameters["urls_mes"] = CCGetFromGet("s_mes", NULL);
        $this->DataSource->Parameters["urls_tipo"] = CCGetFromGet("s_tipo", NULL);
        $this->DataSource->Parameters["urls_numero"] = CCGetFromGet("s_numero", NULL);
    }
//End Initialize Method

//GetFormParameters Method @3-896AB6FC
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["analista"][$RowNumber] = CCGetFromPost("analista_" . $RowNumber, NULL);
            $this->FormParameters["hdID"][$RowNumber] = CCGetFromPost("hdID_" . $RowNumber, NULL);
            $this->FormParameters["Medido"][$RowNumber] = CCGetFromPost("Medido_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @3-983D1C0B
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->analista->SetText($this->FormParameters["analista"][$this->RowNumber], $this->RowNumber);
            $this->hdID->SetText($this->FormParameters["hdID"][$this->RowNumber], $this->RowNumber);
            $this->Medido->SetText($this->FormParameters["Medido"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                $Validation = ($this->ValidateRow($this->RowNumber) && $Validation);
            }
            else if($this->CheckInsert())
            {
                $Validation = ($this->ValidateRow() && $Validation);
            }
        }
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//ValidateRow Method @3-0C0AA5A4
    function ValidateRow()
    {
        global $CCSLocales;
        $this->analista->Validate();
        $this->hdID->Validate();
        $this->Medido->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->analista->Errors->ToString());
        $errors = ComposeStrings($errors, $this->hdID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Medido->Errors->ToString());
        $this->analista->Errors->Clear();
        $this->hdID->Errors->Clear();
        $this->Medido->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @3-55502060
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["analista"][$this->RowNumber]) && count($this->FormParameters["analista"][$this->RowNumber])) || strlen($this->FormParameters["analista"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["hdID"][$this->RowNumber]) && count($this->FormParameters["hdID"][$this->RowNumber])) || strlen($this->FormParameters["hdID"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["Medido"][$this->RowNumber]) && count($this->FormParameters["Medido"][$this->RowNumber])) || strlen($this->FormParameters["Medido"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @3-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-CD4A22D0
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted)
            return;

        $this->GetFormParameters();
        $this->PressedButton = "Button_Submit";
        if($this->Button_Submit->Pressed) {
            $this->PressedButton = "Button_Submit";
        } else if($this->Button1->Pressed) {
            $this->PressedButton = "Button1";
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Submit") {
            if(!CCGetEvent($this->Button_Submit->CCSEvents, "OnClick", $this->Button_Submit) || !$this->UpdateGrid()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button1") {
            if(!CCGetEvent($this->Button1->CCSEvents, "OnClick", $this->Button1)) {
                $Redirect = "";
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//UpdateGrid Method @3-254980C3
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->analista->SetText($this->FormParameters["analista"][$this->RowNumber], $this->RowNumber);
            $this->hdID->SetText($this->FormParameters["hdID"][$this->RowNumber], $this->RowNumber);
            $this->Medido->SetText($this->FormParameters["Medido"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if($this->UpdateAllowed) { $Validation = ($this->UpdateRow() && $Validation); }
            }
            else if($this->CheckInsert() && $this->InsertAllowed)
            {
                $Validation = ($Validation && $this->InsertRow());
            }
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterSubmit", $this);
        if ($this->Errors->Count() == 0 && $Validation){
            $this->DataSource->close();
            return true;
        }
        return false;
    }
//End UpdateGrid Method

//UpdateRow Method @3-C1A2F235
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->hdID->SetValue($this->hdID->GetValue(true));
        $this->DataSource->analista->SetValue($this->analista->GetValue(true));
        $this->DataSource->Medido->SetValue($this->Medido->GetValue(true));
        $this->DataSource->Update();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End UpdateRow Method

//FormScript Method @3-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @3-69E01441
    function SetFormState($FormState)
    {
        if(strlen($FormState)) {
            $FormState = str_replace("\\\\", "\\" . ord("\\"), $FormState);
            $FormState = str_replace("\\;", "\\" . ord(";"), $FormState);
            $pieces = explode(";", $FormState);
            $this->UpdatedRows = $pieces[0];
            $this->EmptyRows   = $pieces[1];
            $this->TotalRows = $this->UpdatedRows + $this->EmptyRows;
            $RowNumber = 0;
            for($i = 2; $i < sizeof($pieces); $i = $i + 0)  {
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @3-BF9CEBD0
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @3-79C397E2
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->analista->Prepare();

        $this->DataSource->open();
        $is_next_record = ($this->ReadAllowed && $this->DataSource->next_record());
        $this->IsEmpty = ! $is_next_record;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) { return; }

        $this->Attributes->Show();
        $this->Button_Submit->Visible = $this->Button_Submit->Visible && ($this->InsertAllowed || $this->UpdateAllowed || $this->DeleteAllowed);
        $ParentPath = $Tpl->block_path;
        $EditableGridPath = $ParentPath . "/EditableGrid " . $this->ComponentName;
        $EditableGridRowPath = $ParentPath . "/EditableGrid " . $this->ComponentName . "/Row";
        $Tpl->block_path = $EditableGridRowPath;
        $this->RowNumber = 0;
        $NonEmptyRows = 0;
        $EmptyRowsLeft = $this->EmptyRows;
        $this->ControlsVisible["id"] = $this->id->Visible;
        $this->ControlsVisible["id_proveedor"] = $this->id_proveedor->Visible;
        $this->ControlsVisible["numero"] = $this->numero->Visible;
        $this->ControlsVisible["tipo"] = $this->tipo->Visible;
        $this->ControlsVisible["mes"] = $this->mes->Visible;
        $this->ControlsVisible["anio"] = $this->anio->Visible;
        $this->ControlsVisible["analista"] = $this->analista->Visible;
        $this->ControlsVisible["hdID"] = $this->hdID->Visible;
        $this->ControlsVisible["descartar_manual"] = $this->descartar_manual->Visible;
        $this->ControlsVisible["NumFila"] = $this->NumFila->Visible;
        $this->ControlsVisible["notas_manual"] = $this->notas_manual->Visible;
        $this->ControlsVisible["Medido"] = $this->Medido->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->NumFila->SetText("");
                    $this->id->SetValue($this->DataSource->id->GetValue());
                    $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                    $this->numero->SetValue($this->DataSource->numero->GetValue());
                    $this->tipo->SetValue($this->DataSource->tipo->GetValue());
                    $this->mes->SetValue($this->DataSource->mes->GetValue());
                    $this->anio->SetValue($this->DataSource->anio->GetValue());
                    $this->analista->SetValue($this->DataSource->analista->GetValue());
                    $this->hdID->SetValue($this->DataSource->hdID->GetValue());
                    $this->descartar_manual->SetValue($this->DataSource->descartar_manual->GetValue());
                    $this->notas_manual->SetValue($this->DataSource->notas_manual->GetValue());
                    $this->Medido->SetValue($this->DataSource->Medido->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->id->SetText("");
                    $this->id_proveedor->SetText("");
                    $this->numero->SetText("");
                    $this->tipo->SetText("");
                    $this->mes->SetText("");
                    $this->anio->SetText("");
                    $this->descartar_manual->SetText("");
                    $this->NumFila->SetText("");
                    $this->notas_manual->SetText("");
                    $this->id->SetValue($this->DataSource->id->GetValue());
                    $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                    $this->numero->SetValue($this->DataSource->numero->GetValue());
                    $this->tipo->SetValue($this->DataSource->tipo->GetValue());
                    $this->mes->SetValue($this->DataSource->mes->GetValue());
                    $this->anio->SetValue($this->DataSource->anio->GetValue());
                    $this->descartar_manual->SetValue($this->DataSource->descartar_manual->GetValue());
                    $this->notas_manual->SetValue($this->DataSource->notas_manual->GetValue());
                    $this->analista->SetText($this->FormParameters["analista"][$this->RowNumber], $this->RowNumber);
                    $this->hdID->SetText($this->FormParameters["hdID"][$this->RowNumber], $this->RowNumber);
                    $this->Medido->SetText($this->FormParameters["Medido"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->id->SetText("");
                    $this->id_proveedor->SetText("");
                    $this->numero->SetText("");
                    $this->tipo->SetText("");
                    $this->mes->SetText("");
                    $this->anio->SetText("");
                    $this->analista->SetText("");
                    $this->hdID->SetText("");
                    $this->descartar_manual->SetText("");
                    $this->NumFila->SetText("");
                    $this->notas_manual->SetText("");
                    $this->Medido->SetValue(false);
                } else {
                    $this->id->SetText("");
                    $this->id_proveedor->SetText("");
                    $this->numero->SetText("");
                    $this->tipo->SetText("");
                    $this->mes->SetText("");
                    $this->anio->SetText("");
                    $this->descartar_manual->SetText("");
                    $this->NumFila->SetText("");
                    $this->notas_manual->SetText("");
                    $this->analista->SetText($this->FormParameters["analista"][$this->RowNumber], $this->RowNumber);
                    $this->hdID->SetText($this->FormParameters["hdID"][$this->RowNumber], $this->RowNumber);
                    $this->Medido->SetText($this->FormParameters["Medido"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id->Show($this->RowNumber);
                $this->id_proveedor->Show($this->RowNumber);
                $this->numero->Show($this->RowNumber);
                $this->tipo->Show($this->RowNumber);
                $this->mes->Show($this->RowNumber);
                $this->anio->Show($this->RowNumber);
                $this->analista->Show($this->RowNumber);
                $this->hdID->Show($this->RowNumber);
                $this->descartar_manual->Show($this->RowNumber);
                $this->NumFila->Show($this->RowNumber);
                $this->notas_manual->Show($this->RowNumber);
                $this->Medido->Show($this->RowNumber);
                if (isset($this->RowsErrors[$this->RowNumber]) && ($this->RowsErrors[$this->RowNumber] != "")) {
                    $Tpl->setblockvar("RowError", "");
                    $Tpl->setvar("Error", $this->RowsErrors[$this->RowNumber]);
                    $this->Attributes->Show();
                    $Tpl->parse("RowError", false);
                } else {
                    $Tpl->setblockvar("RowError", "");
                }
                $Tpl->setvar("FormScript", $this->FormScript($this->RowNumber));
                $Tpl->parse();
                if ($is_next_record) {
                    if ($this->FormSubmitted) {
                        $is_next_record =  $this->ReadAllowed && $this->DataSource->next_record() && $this->RowNumber < $this->UpdatedRows;
                    }else{
                        $is_next_record = ($this->RowNumber < $this->PageSize) &&  $this->ReadAllowed && $this->DataSource->next_record();
                    }
                } else { 
                    $EmptyRowsLeft--;
                }
            } while($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed));
        } else {
            $Tpl->block_path = $EditableGridPath;
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $Tpl->block_path = $EditableGridPath;
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator->TotalPages <= 1 && $this->Navigator->PageNumber == 1) || $this->Navigator->PageSize == "") {
            $this->Navigator->Visible = false;
        }
        $this->Sorter_id->Show();
        $this->Sorter_id_proveedor->Show();
        $this->Sorter_numero->Show();
        $this->Sorter_tipo->Show();
        $this->Sorter_mes->Show();
        $this->Sorter_anio->Show();
        $this->Sorter_analista->Show();
        $this->Navigator->Show();
        $this->Button_Submit->Show();
        $this->TotalRecords->Show();
        $this->Button1->Show();

        if($this->CheckErrors()) {
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        if (!$CCSUseAmp) {
            $Tpl->SetVar("HTMLFormProperties", "method=\"POST\" action=\"" . $this->HTMLFormAction . "\" name=\"" . $this->ComponentName . "\"");
        } else {
            $Tpl->SetVar("HTMLFormProperties", "method=\"post\" action=\"" . str_replace("&", "&amp;", $this->HTMLFormAction) . "\" id=\"" . $this->ComponentName . "\"");
        }
        $Tpl->SetVar("FormState", CCToHTML($this->GetFormState($NonEmptyRows)));
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_universo_cds Class @3-FCB6E20C

class clsmc_universo_cdsDataSource extends clsDBcnDisenio {  //mc_universo_cdsDataSource Class @3-15155AF6

//DataSource Variables @3-7BF6E58E
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $CountSQL;
    public $wp;
    public $AllParametersSet;

    public $CurrentRow;
    public $UpdateFields = array();

    // Datasource fields
    public $id;
    public $id_proveedor;
    public $numero;
    public $tipo;
    public $mes;
    public $anio;
    public $analista;
    public $hdID;
    public $descartar_manual;
    public $NumFila;
    public $notas_manual;
    public $Medido;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-29F54ED4
    function clsmc_universo_cdsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid mc_universo_cds/Error";
        $this->Initialize();
        $this->id = new clsField("id", ccsInteger, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsText, "");
        
        $this->numero = new clsField("numero", ccsText, "");
        
        $this->tipo = new clsField("tipo", ccsText, "");
        
        $this->mes = new clsField("mes", ccsText, "");
        
        $this->anio = new clsField("anio", ccsInteger, "");
        
        $this->analista = new clsField("analista", ccsText, "");
        
        $this->hdID = new clsField("hdID", ccsText, "");
        
        $this->descartar_manual = new clsField("descartar_manual", ccsText, "");
        
        $this->NumFila = new clsField("NumFila", ccsText, "");
        
        $this->notas_manual = new clsField("notas_manual", ccsText, "");
        
        $this->Medido = new clsField("Medido", ccsInteger, "");
        

        $this->UpdateFields["analista"] = array("Name" => "analista", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["Medido"] = array("Name" => "[Medido]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-1E3C6494
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_id" => array("id", ""), 
            "Sorter_id_proveedor" => array("id_proveedor", ""), 
            "Sorter_numero" => array("numero", ""), 
            "Sorter_tipo" => array("tipo", ""), 
            "Sorter_mes" => array("mes", ""), 
            "Sorter_anio" => array("anio", ""), 
            "Sorter_analista" => array("analista", "")));
    }
//End SetOrder Method

//Prepare Method @3-87BE838A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_analista", ccsText, "", "", $this->Parameters["urls_analista"], "", false);
        $this->wp->AddParameter("3", "urls_anio", ccsInteger, "", "", $this->Parameters["urls_anio"], date("Y"), false);
        $this->wp->AddParameter("4", "urls_mes", ccsInteger, "", "", $this->Parameters["urls_mes"], date("m")-2, false);
        $this->wp->AddParameter("5", "urls_tipo", ccsText, "", "", $this->Parameters["urls_tipo"], "", false);
        $this->wp->AddParameter("6", "urls_numero", ccsText, "", "", $this->Parameters["urls_numero"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @3-314E9AB1
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT mc_universo_cds.*, mc_c_proveedor.nombre , m.mes NombreMes\n" .
        "FROM mc_universo_cds \n" .
        "	INNER JOIN mc_c_proveedor ON  mc_universo_cds.id_proveedor = mc_c_proveedor.id_proveedor \n" .
        "	left join mc_c_mes m on m.idMes = mc_universo_cds.mes \n" .
        "where (mc_universo_cds.id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.analista like '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%' or '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "' ='')\n" .
        "	and (mc_universo_cds.anio = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.mes = " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.tipo like '%" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "%')\n" .
        "	and (mc_universo_cds.numero like '%" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "%')\n" .
        "	and (mc_universo_cds.tipo like 'IN')) cnt";
        $this->SQL = "SELECT mc_universo_cds.*, mc_c_proveedor.nombre , m.mes NombreMes\n" .
        "FROM mc_universo_cds \n" .
        "	INNER JOIN mc_c_proveedor ON  mc_universo_cds.id_proveedor = mc_c_proveedor.id_proveedor \n" .
        "	left join mc_c_mes m on m.idMes = mc_universo_cds.mes \n" .
        "where (mc_universo_cds.id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.analista like '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%' or '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "' ='')\n" .
        "	and (mc_universo_cds.anio = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.mes = " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.tipo like '%" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "%')\n" .
        "	and (mc_universo_cds.numero like '%" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "%')\n" .
        "	and (mc_universo_cds.tipo like 'IN')";
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

//SetValues Method @3-1F6AE72F
    function SetValues()
    {
        $this->id->SetDBValue(trim($this->f("id")));
        $this->id_proveedor->SetDBValue($this->f("nombre"));
        $this->numero->SetDBValue($this->f("numero"));
        $this->tipo->SetDBValue($this->f("tipo"));
        $this->mes->SetDBValue($this->f("NombreMes"));
        $this->anio->SetDBValue(trim($this->f("anio")));
        $this->analista->SetDBValue($this->f("analista"));
        $this->hdID->SetDBValue($this->f("id"));
        $this->descartar_manual->SetDBValue($this->f("descartar_manual"));
        $this->notas_manual->SetDBValue($this->f("notas_manual"));
        $this->Medido->SetDBValue(trim($this->f("Medido")));
    }
//End SetValues Method

//Update Method @3-1427BDB4
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["analista"] = new clsSQLParameter("ctrlanalista", ccsText, "", "", $this->analista->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Medido"] = new clsSQLParameter("ctrlMedido", ccsInteger, "", "", $this->Medido->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "ctrlhdID", ccsInteger, "", "", $this->hdID->GetValue(true), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["analista"]->GetValue()) and !strlen($this->cp["analista"]->GetText()) and !is_bool($this->cp["analista"]->GetValue())) 
            $this->cp["analista"]->SetValue($this->analista->GetValue(true));
        if (!is_null($this->cp["Medido"]->GetValue()) and !strlen($this->cp["Medido"]->GetText()) and !is_bool($this->cp["Medido"]->GetValue())) 
            $this->cp["Medido"]->SetValue($this->Medido->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "id", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["analista"]["Value"] = $this->cp["analista"]->GetDBValue(true);
        $this->UpdateFields["Medido"]["Value"] = $this->cp["Medido"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_universo_cds", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End mc_universo_cdsDataSource Class @3-FCB6E20C

class clsEditableGridmc_universo_cds1 { //mc_universo_cds1 Class @57-7CB7EFFB

//Variables @57-AACFB217

    // Public variables
    public $ComponentType = "EditableGrid";
    public $ComponentName;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormParameters;
    public $FormState;
    public $FormEnctype;
    public $CachedColumns;
    public $TotalRows;
    public $UpdatedRows;
    public $EmptyRows;
    public $Visible;
    public $RowsErrors;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode;
    public $ValidatingControls;
    public $Controls;
    public $ControlsErrors;
    public $RowNumber;
    public $Attributes;

    // Class variables
    public $Sorter_id;
    public $Sorter_id_proveedor;
    public $Sorter_numero;
    public $Sorter_tipo;
    public $Sorter_mes;
    public $Sorter_anio;
    public $Sorter_analista;
    public $Sorter_IdEstimacion;
//End Variables

//Class_Initialize Event @57-E2AB96C7
    function clsEditableGridmc_universo_cds1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid mc_universo_cds1/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "mc_universo_cds1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_universo_cds1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 25;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: EditableGrid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->EmptyRows = 0;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if(!$this->Visible) return;

        $CCSForm = CCGetFromGet("ccsForm", "");
        $this->FormEnctype = "application/x-www-form-urlencoded";
        $this->FormSubmitted = ($CCSForm == $this->ComponentName);
        if($this->FormSubmitted) {
            $this->FormState = CCGetFromPost("FormState", "");
            $this->SetFormState($this->FormState);
        } else {
            $this->FormState = "";
        }
        $Method = $this->FormSubmitted ? ccsPost : ccsGet;

        $this->SorterName = CCGetParam("mc_universo_cds1Order", "");
        $this->SorterDirection = CCGetParam("mc_universo_cds1Dir", "");

        $this->Sorter_id = new clsSorter($this->ComponentName, "Sorter_id", $FileName, $this);
        $this->Sorter_id_proveedor = new clsSorter($this->ComponentName, "Sorter_id_proveedor", $FileName, $this);
        $this->Sorter_numero = new clsSorter($this->ComponentName, "Sorter_numero", $FileName, $this);
        $this->Sorter_tipo = new clsSorter($this->ComponentName, "Sorter_tipo", $FileName, $this);
        $this->Sorter_mes = new clsSorter($this->ComponentName, "Sorter_mes", $FileName, $this);
        $this->Sorter_anio = new clsSorter($this->ComponentName, "Sorter_anio", $FileName, $this);
        $this->Sorter_analista = new clsSorter($this->ComponentName, "Sorter_analista", $FileName, $this);
        $this->id = new clsControl(ccsLabel, "id", "id", ccsInteger, "", NULL, $this);
        $this->id_proveedor = new clsControl(ccsLabel, "id_proveedor", "id_proveedor", ccsText, "", NULL, $this);
        $this->numero = new clsControl(ccsLabel, "numero", "numero", ccsText, "", NULL, $this);
        $this->tipo = new clsControl(ccsLabel, "tipo", "tipo", ccsText, "", NULL, $this);
        $this->mes = new clsControl(ccsLabel, "mes", "mes", ccsText, "", NULL, $this);
        $this->anio = new clsControl(ccsLabel, "anio", "anio", ccsInteger, "", NULL, $this);
        $this->analista = new clsControl(ccsListBox, "analista", "Analista", ccsText, "", NULL, $this);
        $this->analista->DSType = dsSQL;
        $this->analista->DataSource = new clsDBcnDisenio();
        $this->analista->ds = & $this->analista->DataSource;
        list($this->analista->BoundColumn, $this->analista->TextColumn, $this->analista->DBFormat) = array("Usuario", "Usuario", "");
        $this->analista->DataSource->Parameters["urlGrupo"] = CCGetFromGet("Grupo", NULL);
        $this->analista->DataSource->Parameters["expr154"] = 1;
        $this->analista->DataSource->Parameters["urls_mes"] = CCGetFromGet("s_mes", NULL);
        $this->analista->DataSource->Parameters["urls_anio"] = CCGetFromGet("s_anio", NULL);
        $this->analista->DataSource->wp = new clsSQLParameters();
        $this->analista->DataSource->wp->AddParameter("1", "urlGrupo", ccsText, "", "", $this->analista->DataSource->Parameters["urlGrupo"], 'CAPC', false);
        $this->analista->DataSource->wp->AddParameter("2", "expr154", ccsInteger, "", "", $this->analista->DataSource->Parameters["expr154"], 0, false);
        $this->analista->DataSource->wp->AddParameter("3", "urls_mes", ccsInteger, "", "", $this->analista->DataSource->Parameters["urls_mes"], 0, false);
        $this->analista->DataSource->wp->AddParameter("4", "urls_anio", ccsInteger, "", "", $this->analista->DataSource->Parameters["urls_anio"], 0, false);
        $this->analista->DataSource->SQL = "SELECT * \n" .
        "FROM mc_c_usuarios\n" .
        "WHERE Grupo = '" . $this->analista->DataSource->SQLValue($this->analista->DataSource->wp->GetDBValue("1"), ccsText) . "'\n" .
        "AND Activo = " . $this->analista->DataSource->SQLValue($this->analista->DataSource->wp->GetDBValue("2"), ccsInteger) . " \n" .
        "	or usuario in (\n" .
        "select distinct  analista \n" .
        "from mc_universo_cds \n" .
        "where mes = " . $this->analista->DataSource->SQLValue($this->analista->DataSource->wp->GetDBValue("3"), ccsInteger) . " and anio = " . $this->analista->DataSource->SQLValue($this->analista->DataSource->wp->GetDBValue("4"), ccsInteger) . ")";
        $this->analista->DataSource->Order = "";
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->hdID = new clsControl(ccsHidden, "hdID", "hdID", ccsText, "", NULL, $this);
        $this->descartar_manual = new clsControl(ccsLabel, "descartar_manual", "descartar_manual", ccsText, "", NULL, $this);
        $this->NumFila = new clsControl(ccsLabel, "NumFila", "NumFila", ccsText, "", NULL, $this);
        $this->TotalRecords = new clsControl(ccsLabel, "TotalRecords", "TotalRecords", ccsText, "", NULL, $this);
        $this->notas_manual = new clsControl(ccsLabel, "notas_manual", "notas_manual", ccsText, "", NULL, $this);
        $this->Medido = new clsControl(ccsCheckBox, "Medido", "Medido", ccsInteger, "", NULL, $this);
        $this->Medido->CheckedValue = $this->Medido->GetParsedValue(1);
        $this->Medido->UncheckedValue = $this->Medido->GetParsedValue(0);
        $this->Button1 = new clsButton("Button1", $Method, $this);
        $this->Sorter_IdEstimacion = new clsSorter($this->ComponentName, "Sorter_IdEstimacion", $FileName, $this);
        $this->IdEstimacion = new clsControl(ccsLabel, "IdEstimacion", "IdEstimacion", ccsText, "", NULL, $this);
    }
//End Class_Initialize Event

//Initialize Method @57-25DCDC12
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_analista"] = CCGetFromGet("s_analista", NULL);
        $this->DataSource->Parameters["urls_anio"] = CCGetFromGet("s_anio", NULL);
        $this->DataSource->Parameters["urls_mes"] = CCGetFromGet("s_mes", NULL);
        $this->DataSource->Parameters["urls_tipo"] = CCGetFromGet("s_tipo", NULL);
        $this->DataSource->Parameters["urls_numero"] = CCGetFromGet("s_numero", NULL);
    }
//End Initialize Method

//GetFormParameters Method @57-896AB6FC
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["analista"][$RowNumber] = CCGetFromPost("analista_" . $RowNumber, NULL);
            $this->FormParameters["hdID"][$RowNumber] = CCGetFromPost("hdID_" . $RowNumber, NULL);
            $this->FormParameters["Medido"][$RowNumber] = CCGetFromPost("Medido_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @57-983D1C0B
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->analista->SetText($this->FormParameters["analista"][$this->RowNumber], $this->RowNumber);
            $this->hdID->SetText($this->FormParameters["hdID"][$this->RowNumber], $this->RowNumber);
            $this->Medido->SetText($this->FormParameters["Medido"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                $Validation = ($this->ValidateRow($this->RowNumber) && $Validation);
            }
            else if($this->CheckInsert())
            {
                $Validation = ($this->ValidateRow() && $Validation);
            }
        }
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//ValidateRow Method @57-0C0AA5A4
    function ValidateRow()
    {
        global $CCSLocales;
        $this->analista->Validate();
        $this->hdID->Validate();
        $this->Medido->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->analista->Errors->ToString());
        $errors = ComposeStrings($errors, $this->hdID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Medido->Errors->ToString());
        $this->analista->Errors->Clear();
        $this->hdID->Errors->Clear();
        $this->Medido->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @57-55502060
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["analista"][$this->RowNumber]) && count($this->FormParameters["analista"][$this->RowNumber])) || strlen($this->FormParameters["analista"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["hdID"][$this->RowNumber]) && count($this->FormParameters["hdID"][$this->RowNumber])) || strlen($this->FormParameters["hdID"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["Medido"][$this->RowNumber]) && count($this->FormParameters["Medido"][$this->RowNumber])) || strlen($this->FormParameters["Medido"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @57-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @57-CD4A22D0
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted)
            return;

        $this->GetFormParameters();
        $this->PressedButton = "Button_Submit";
        if($this->Button_Submit->Pressed) {
            $this->PressedButton = "Button_Submit";
        } else if($this->Button1->Pressed) {
            $this->PressedButton = "Button1";
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Submit") {
            if(!CCGetEvent($this->Button_Submit->CCSEvents, "OnClick", $this->Button_Submit) || !$this->UpdateGrid()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button1") {
            if(!CCGetEvent($this->Button1->CCSEvents, "OnClick", $this->Button1)) {
                $Redirect = "";
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//UpdateGrid Method @57-254980C3
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->analista->SetText($this->FormParameters["analista"][$this->RowNumber], $this->RowNumber);
            $this->hdID->SetText($this->FormParameters["hdID"][$this->RowNumber], $this->RowNumber);
            $this->Medido->SetText($this->FormParameters["Medido"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if($this->UpdateAllowed) { $Validation = ($this->UpdateRow() && $Validation); }
            }
            else if($this->CheckInsert() && $this->InsertAllowed)
            {
                $Validation = ($Validation && $this->InsertRow());
            }
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterSubmit", $this);
        if ($this->Errors->Count() == 0 && $Validation){
            $this->DataSource->close();
            return true;
        }
        return false;
    }
//End UpdateGrid Method

//UpdateRow Method @57-C1A2F235
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->hdID->SetValue($this->hdID->GetValue(true));
        $this->DataSource->analista->SetValue($this->analista->GetValue(true));
        $this->DataSource->Medido->SetValue($this->Medido->GetValue(true));
        $this->DataSource->Update();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End UpdateRow Method

//FormScript Method @57-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @57-69E01441
    function SetFormState($FormState)
    {
        if(strlen($FormState)) {
            $FormState = str_replace("\\\\", "\\" . ord("\\"), $FormState);
            $FormState = str_replace("\\;", "\\" . ord(";"), $FormState);
            $pieces = explode(";", $FormState);
            $this->UpdatedRows = $pieces[0];
            $this->EmptyRows   = $pieces[1];
            $this->TotalRows = $this->UpdatedRows + $this->EmptyRows;
            $RowNumber = 0;
            for($i = 2; $i < sizeof($pieces); $i = $i + 0)  {
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @57-BF9CEBD0
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @57-1729012E
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->analista->Prepare();

        $this->DataSource->open();
        $is_next_record = ($this->ReadAllowed && $this->DataSource->next_record());
        $this->IsEmpty = ! $is_next_record;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) { return; }

        $this->Attributes->Show();
        $this->Button_Submit->Visible = $this->Button_Submit->Visible && ($this->InsertAllowed || $this->UpdateAllowed || $this->DeleteAllowed);
        $ParentPath = $Tpl->block_path;
        $EditableGridPath = $ParentPath . "/EditableGrid " . $this->ComponentName;
        $EditableGridRowPath = $ParentPath . "/EditableGrid " . $this->ComponentName . "/Row";
        $Tpl->block_path = $EditableGridRowPath;
        $this->RowNumber = 0;
        $NonEmptyRows = 0;
        $EmptyRowsLeft = $this->EmptyRows;
        $this->ControlsVisible["id"] = $this->id->Visible;
        $this->ControlsVisible["id_proveedor"] = $this->id_proveedor->Visible;
        $this->ControlsVisible["numero"] = $this->numero->Visible;
        $this->ControlsVisible["tipo"] = $this->tipo->Visible;
        $this->ControlsVisible["mes"] = $this->mes->Visible;
        $this->ControlsVisible["anio"] = $this->anio->Visible;
        $this->ControlsVisible["analista"] = $this->analista->Visible;
        $this->ControlsVisible["hdID"] = $this->hdID->Visible;
        $this->ControlsVisible["descartar_manual"] = $this->descartar_manual->Visible;
        $this->ControlsVisible["NumFila"] = $this->NumFila->Visible;
        $this->ControlsVisible["notas_manual"] = $this->notas_manual->Visible;
        $this->ControlsVisible["Medido"] = $this->Medido->Visible;
        $this->ControlsVisible["IdEstimacion"] = $this->IdEstimacion->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->NumFila->SetText("");
                    $this->id->SetValue($this->DataSource->id->GetValue());
                    $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                    $this->numero->SetValue($this->DataSource->numero->GetValue());
                    $this->tipo->SetValue($this->DataSource->tipo->GetValue());
                    $this->mes->SetValue($this->DataSource->mes->GetValue());
                    $this->anio->SetValue($this->DataSource->anio->GetValue());
                    $this->analista->SetValue($this->DataSource->analista->GetValue());
                    $this->hdID->SetValue($this->DataSource->hdID->GetValue());
                    $this->descartar_manual->SetValue($this->DataSource->descartar_manual->GetValue());
                    $this->notas_manual->SetValue($this->DataSource->notas_manual->GetValue());
                    $this->Medido->SetValue($this->DataSource->Medido->GetValue());
                    $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->id->SetText("");
                    $this->id_proveedor->SetText("");
                    $this->numero->SetText("");
                    $this->tipo->SetText("");
                    $this->mes->SetText("");
                    $this->anio->SetText("");
                    $this->descartar_manual->SetText("");
                    $this->NumFila->SetText("");
                    $this->notas_manual->SetText("");
                    $this->IdEstimacion->SetText("");
                    $this->id->SetValue($this->DataSource->id->GetValue());
                    $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                    $this->numero->SetValue($this->DataSource->numero->GetValue());
                    $this->tipo->SetValue($this->DataSource->tipo->GetValue());
                    $this->mes->SetValue($this->DataSource->mes->GetValue());
                    $this->anio->SetValue($this->DataSource->anio->GetValue());
                    $this->descartar_manual->SetValue($this->DataSource->descartar_manual->GetValue());
                    $this->notas_manual->SetValue($this->DataSource->notas_manual->GetValue());
                    $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                    $this->analista->SetText($this->FormParameters["analista"][$this->RowNumber], $this->RowNumber);
                    $this->hdID->SetText($this->FormParameters["hdID"][$this->RowNumber], $this->RowNumber);
                    $this->Medido->SetText($this->FormParameters["Medido"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->id->SetText("");
                    $this->id_proveedor->SetText("");
                    $this->numero->SetText("");
                    $this->tipo->SetText("");
                    $this->mes->SetText("");
                    $this->anio->SetText("");
                    $this->analista->SetText("");
                    $this->hdID->SetText("");
                    $this->descartar_manual->SetText("");
                    $this->NumFila->SetText("");
                    $this->notas_manual->SetText("");
                    $this->Medido->SetValue(false);
                    $this->IdEstimacion->SetText("");
                } else {
                    $this->id->SetText("");
                    $this->id_proveedor->SetText("");
                    $this->numero->SetText("");
                    $this->tipo->SetText("");
                    $this->mes->SetText("");
                    $this->anio->SetText("");
                    $this->descartar_manual->SetText("");
                    $this->NumFila->SetText("");
                    $this->notas_manual->SetText("");
                    $this->IdEstimacion->SetText("");
                    $this->analista->SetText($this->FormParameters["analista"][$this->RowNumber], $this->RowNumber);
                    $this->hdID->SetText($this->FormParameters["hdID"][$this->RowNumber], $this->RowNumber);
                    $this->Medido->SetText($this->FormParameters["Medido"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id->Show($this->RowNumber);
                $this->id_proveedor->Show($this->RowNumber);
                $this->numero->Show($this->RowNumber);
                $this->tipo->Show($this->RowNumber);
                $this->mes->Show($this->RowNumber);
                $this->anio->Show($this->RowNumber);
                $this->analista->Show($this->RowNumber);
                $this->hdID->Show($this->RowNumber);
                $this->descartar_manual->Show($this->RowNumber);
                $this->NumFila->Show($this->RowNumber);
                $this->notas_manual->Show($this->RowNumber);
                $this->Medido->Show($this->RowNumber);
                $this->IdEstimacion->Show($this->RowNumber);
                if (isset($this->RowsErrors[$this->RowNumber]) && ($this->RowsErrors[$this->RowNumber] != "")) {
                    $Tpl->setblockvar("RowError", "");
                    $Tpl->setvar("Error", $this->RowsErrors[$this->RowNumber]);
                    $this->Attributes->Show();
                    $Tpl->parse("RowError", false);
                } else {
                    $Tpl->setblockvar("RowError", "");
                }
                $Tpl->setvar("FormScript", $this->FormScript($this->RowNumber));
                $Tpl->parse();
                if ($is_next_record) {
                    if ($this->FormSubmitted) {
                        $is_next_record =  $this->ReadAllowed && $this->DataSource->next_record() && $this->RowNumber < $this->UpdatedRows;
                    }else{
                        $is_next_record = ($this->RowNumber < $this->PageSize) &&  $this->ReadAllowed && $this->DataSource->next_record();
                    }
                } else { 
                    $EmptyRowsLeft--;
                }
            } while($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed));
        } else {
            $Tpl->block_path = $EditableGridPath;
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $Tpl->block_path = $EditableGridPath;
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator->TotalPages <= 1 && $this->Navigator->PageNumber == 1) || $this->Navigator->PageSize == "") {
            $this->Navigator->Visible = false;
        }
        $this->Sorter_id->Show();
        $this->Sorter_id_proveedor->Show();
        $this->Sorter_numero->Show();
        $this->Sorter_tipo->Show();
        $this->Sorter_mes->Show();
        $this->Sorter_anio->Show();
        $this->Sorter_analista->Show();
        $this->Navigator->Show();
        $this->Button_Submit->Show();
        $this->TotalRecords->Show();
        $this->Button1->Show();
        $this->Sorter_IdEstimacion->Show();

        if($this->CheckErrors()) {
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        if (!$CCSUseAmp) {
            $Tpl->SetVar("HTMLFormProperties", "method=\"POST\" action=\"" . $this->HTMLFormAction . "\" name=\"" . $this->ComponentName . "\"");
        } else {
            $Tpl->SetVar("HTMLFormProperties", "method=\"post\" action=\"" . str_replace("&", "&amp;", $this->HTMLFormAction) . "\" id=\"" . $this->ComponentName . "\"");
        }
        $Tpl->SetVar("FormState", CCToHTML($this->GetFormState($NonEmptyRows)));
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_universo_cds1 Class @57-FCB6E20C

class clsmc_universo_cds1DataSource extends clsDBcnDisenio {  //mc_universo_cds1DataSource Class @57-14C1BB14

//DataSource Variables @57-9512F298
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $CountSQL;
    public $wp;
    public $AllParametersSet;

    public $CurrentRow;
    public $UpdateFields = array();

    // Datasource fields
    public $id;
    public $id_proveedor;
    public $numero;
    public $tipo;
    public $mes;
    public $anio;
    public $analista;
    public $hdID;
    public $descartar_manual;
    public $NumFila;
    public $notas_manual;
    public $Medido;
    public $IdEstimacion;
//End DataSource Variables

//DataSourceClass_Initialize Event @57-361A3478
    function clsmc_universo_cds1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid mc_universo_cds1/Error";
        $this->Initialize();
        $this->id = new clsField("id", ccsInteger, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsText, "");
        
        $this->numero = new clsField("numero", ccsText, "");
        
        $this->tipo = new clsField("tipo", ccsText, "");
        
        $this->mes = new clsField("mes", ccsText, "");
        
        $this->anio = new clsField("anio", ccsInteger, "");
        
        $this->analista = new clsField("analista", ccsText, "");
        
        $this->hdID = new clsField("hdID", ccsText, "");
        
        $this->descartar_manual = new clsField("descartar_manual", ccsText, "");
        
        $this->NumFila = new clsField("NumFila", ccsText, "");
        
        $this->notas_manual = new clsField("notas_manual", ccsText, "");
        
        $this->Medido = new clsField("Medido", ccsInteger, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsText, "");
        

        $this->UpdateFields["analista"] = array("Name" => "analista", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["Medido"] = array("Name" => "[Medido]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @57-AC60159D
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_id" => array("id", ""), 
            "Sorter_id_proveedor" => array("id_proveedor", ""), 
            "Sorter_numero" => array("numero", ""), 
            "Sorter_tipo" => array("tipo", ""), 
            "Sorter_mes" => array("mes", ""), 
            "Sorter_anio" => array("anio", ""), 
            "Sorter_analista" => array("analista", ""), 
            "Sorter_IdEstimacion" => array("IdEstimacion", "")));
    }
//End SetOrder Method

//Prepare Method @57-87BE838A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_analista", ccsText, "", "", $this->Parameters["urls_analista"], "", false);
        $this->wp->AddParameter("3", "urls_anio", ccsInteger, "", "", $this->Parameters["urls_anio"], date("Y"), false);
        $this->wp->AddParameter("4", "urls_mes", ccsInteger, "", "", $this->Parameters["urls_mes"], date("m")-2, false);
        $this->wp->AddParameter("5", "urls_tipo", ccsText, "", "", $this->Parameters["urls_tipo"], "", false);
        $this->wp->AddParameter("6", "urls_numero", ccsText, "", "", $this->Parameters["urls_numero"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @57-26BF9E4A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT mc_universo_cds.id,mc_universo_cds.id_proveedor,mc_universo_cds.numero,ISNULL(mc_universo_cds.IdEstimacion,(select top 1 ESTIMACION_ID from PPMC_ESTIMACION where id_ppmc=mc_universo_cds.numero  and month(fecha_carga)=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and year(fecha_carga)=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " \n" .
        "    and ESTADO_REQ_ESTIM = 'Estimación Aprobada' and RESULTADO_ESTIMACION <> 'Rechazada'  and (PROVEEDOR like '%softtek%'\n" .
        "or PROVEEDOR like '%hewlett packard%' or PROVEEDOR like '%Itera%' or PROVEEDOR like '%hp%'))) IdEstimacion ,\n" .
        "	   mc_universo_cds.tipo,mc_universo_cds.mes,mc_universo_cds.anio,mc_universo_cds.descartar_manual,mc_universo_cds.analista,\n" .
        "	   mc_universo_cds.medido,mc_universo_cds.notas_manual, mc_c_proveedor.nombre , m.mes NombreMes\n" .
        "FROM mc_universo_cds \n" .
        "	INNER JOIN mc_c_proveedor ON  mc_universo_cds.id_proveedor = mc_c_proveedor.id_proveedor \n" .
        "	left join mc_c_mes m on m.idMes = mc_universo_cds.mes \n" .
        "where (mc_universo_cds.id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.analista like '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%' or '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "' ='')\n" .
        "	and (mc_universo_cds.anio = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.mes = " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.tipo like '%" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "%')\n" .
        "	and (mc_universo_cds.numero like '%" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "%')\n" .
        "	and (mc_universo_cds.tipo not like 'IN')) cnt";
        $this->SQL = "SELECT mc_universo_cds.id,mc_universo_cds.id_proveedor,mc_universo_cds.numero,ISNULL(mc_universo_cds.IdEstimacion,(select top 1 ESTIMACION_ID from PPMC_ESTIMACION where id_ppmc=mc_universo_cds.numero  and month(fecha_carga)=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and year(fecha_carga)=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " \n" .
        "    and ESTADO_REQ_ESTIM = 'Estimación Aprobada' and RESULTADO_ESTIMACION <> 'Rechazada'  and (PROVEEDOR like '%softtek%'\n" .
        "or PROVEEDOR like '%hewlett packard%' or PROVEEDOR like '%Itera%' or PROVEEDOR like '%hp%'))) IdEstimacion ,\n" .
        "	   mc_universo_cds.tipo,mc_universo_cds.mes,mc_universo_cds.anio,mc_universo_cds.descartar_manual,mc_universo_cds.analista,\n" .
        "	   mc_universo_cds.medido,mc_universo_cds.notas_manual, mc_c_proveedor.nombre , m.mes NombreMes\n" .
        "FROM mc_universo_cds \n" .
        "	INNER JOIN mc_c_proveedor ON  mc_universo_cds.id_proveedor = mc_c_proveedor.id_proveedor \n" .
        "	left join mc_c_mes m on m.idMes = mc_universo_cds.mes \n" .
        "where (mc_universo_cds.id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.analista like '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%' or '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "' ='')\n" .
        "	and (mc_universo_cds.anio = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.mes = " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . ")\n" .
        "	and (mc_universo_cds.tipo like '%" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "%')\n" .
        "	and (mc_universo_cds.numero like '%" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "%')\n" .
        "	and (mc_universo_cds.tipo not like 'IN')";
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

//SetValues Method @57-971A32C7
    function SetValues()
    {
        $this->id->SetDBValue(trim($this->f("id")));
        $this->id_proveedor->SetDBValue($this->f("nombre"));
        $this->numero->SetDBValue($this->f("numero"));
        $this->tipo->SetDBValue($this->f("tipo"));
        $this->mes->SetDBValue($this->f("NombreMes"));
        $this->anio->SetDBValue(trim($this->f("anio")));
        $this->analista->SetDBValue($this->f("analista"));
        $this->hdID->SetDBValue($this->f("id"));
        $this->descartar_manual->SetDBValue($this->f("descartar_manual"));
        $this->notas_manual->SetDBValue($this->f("notas_manual"));
        $this->Medido->SetDBValue(trim($this->f("medido")));
        $this->IdEstimacion->SetDBValue($this->f("IdEstimacion"));
    }
//End SetValues Method

//Update Method @57-1427BDB4
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["analista"] = new clsSQLParameter("ctrlanalista", ccsText, "", "", $this->analista->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Medido"] = new clsSQLParameter("ctrlMedido", ccsInteger, "", "", $this->Medido->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "ctrlhdID", ccsInteger, "", "", $this->hdID->GetValue(true), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["analista"]->GetValue()) and !strlen($this->cp["analista"]->GetText()) and !is_bool($this->cp["analista"]->GetValue())) 
            $this->cp["analista"]->SetValue($this->analista->GetValue(true));
        if (!is_null($this->cp["Medido"]->GetValue()) and !strlen($this->cp["Medido"]->GetText()) and !is_bool($this->cp["Medido"]->GetValue())) 
            $this->cp["Medido"]->SetValue($this->Medido->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "id", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["analista"]["Value"] = $this->cp["analista"]->GetDBValue(true);
        $this->UpdateFields["Medido"]["Value"] = $this->cp["Medido"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_universo_cds", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End mc_universo_cds1DataSource Class @57-FCB6E20C





//Initialize Page @1-F9A26B5B
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
$TemplateFileName = "UniversoDistribucion.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-625FBE4C
CCSecurityRedirect("4", "UniversoLista.php");
//End Authenticate User

//Include events file @1-F8A9638F
include_once("./UniversoDistribucion_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-5046D4AD
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_c_proveedor_mc_EfPresu = new clsRecordmc_c_proveedor_mc_EfPresu("", $MainPage);
$mc_universo_cds = new clsEditableGridmc_universo_cds("", $MainPage);
$mc_universo_cds1 = new clsEditableGridmc_universo_cds1("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_c_proveedor_mc_EfPresu = & $mc_c_proveedor_mc_EfPresu;
$MainPage->mc_universo_cds = & $mc_universo_cds;
$MainPage->mc_universo_cds1 = & $mc_universo_cds1;
$mc_universo_cds->Initialize();
$mc_universo_cds1->Initialize();
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

//Execute Components @1-28EBEC77
$mc_universo_cds1->Operation();
$mc_universo_cds->Operation();
$mc_c_proveedor_mc_EfPresu->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-05B7A879
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_c_proveedor_mc_EfPresu);
    unset($mc_universo_cds);
    unset($mc_universo_cds1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-CB99006B
$Header->Show();
$mc_c_proveedor_mc_EfPresu->Show();
$mc_universo_cds->Show();
$mc_universo_cds1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2CE128D7
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_c_proveedor_mc_EfPresu);
unset($mc_universo_cds);
unset($mc_universo_cds1);
unset($Tpl);
//End Unload Page


?>
