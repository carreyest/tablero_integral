<?php
//Include Common Files @1-539CA029
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "UniversoLista.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordgrdFiltra { //grdFiltra Class @15-6CAF7DF4

//Variables @15-9E315808

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

//Class_Initialize Event @15-1649BDF4
    function clsRecordgrdFiltra($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record grdFiltra/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "grdFiltra";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "s_id_proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsTable;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            $this->s_id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->DataSource->Parameters["expr99"] = 'CDS';
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "expr99", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["expr99"], "", false);
            $this->s_id_proveedor->DataSource->wp->Criterion[1] = $this->s_id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_id_proveedor->DataSource->wp->GetDBValue("1"), $this->s_id_proveedor->DataSource->ToSQL($this->s_id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_id_proveedor->DataSource->Where = 
                 $this->s_id_proveedor->DataSource->wp->Criterion[1];
            $this->s_mes = new clsControl(ccsListBox, "s_mes", "s_mes", ccsInteger, "", CCGetRequestParam("s_mes", $Method, NULL), $this);
            $this->s_mes->DSType = dsTable;
            $this->s_mes->DataSource = new clsDBcnDisenio();
            $this->s_mes->ds = & $this->s_mes->DataSource;
            $this->s_mes->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_mes->BoundColumn, $this->s_mes->TextColumn, $this->s_mes->DBFormat) = array("IdMes", "Mes", "");
            $this->s_anio = new clsControl(ccsListBox, "s_anio", "s_anio", ccsInteger, "", CCGetRequestParam("s_anio", $Method, NULL), $this);
            $this->s_anio->DSType = dsTable;
            $this->s_anio->DataSource = new clsDBcnDisenio();
            $this->s_anio->ds = & $this->s_anio->DataSource;
            $this->s_anio->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_anio->BoundColumn, $this->s_anio->TextColumn, $this->s_anio->DBFormat) = array("Ano", "Ano", "");
            $this->s_tipo = new clsControl(ccsListBox, "s_tipo", "s_tipo", ccsText, "", CCGetRequestParam("s_tipo", $Method, NULL), $this);
            $this->s_tipo->DSType = dsListOfValues;
            $this->s_tipo->Values = array(array("IN", "Incidente"), array("PA", "PPMC de Apertura"), array("PC", "PPMC de Cierre"));
            $this->sPendientes = new clsControl(ccsCheckBox, "sPendientes", "sPendientes", ccsInteger, "", CCGetRequestParam("sPendientes", $Method, NULL), $this);
            $this->sPendientes->CheckedValue = $this->sPendientes->GetParsedValue(1);
            $this->sPendientes->UncheckedValue = $this->sPendientes->GetParsedValue(0);
            $this->s_Numero = new clsControl(ccsTextBox, "s_Numero", "s_Numero", ccsText, "", CCGetRequestParam("s_Numero", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_mes->Value) && !strlen($this->s_mes->Value) && $this->s_mes->Value !== false)
                    $this->s_mes->SetText(date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))));
                if(!is_array($this->s_anio->Value) && !strlen($this->s_anio->Value) && $this->s_anio->Value !== false)
                    $this->s_anio->SetText(date('Y'));
                if(!is_array($this->sPendientes->Value) && !strlen($this->sPendientes->Value) && $this->sPendientes->Value !== false)
                    $this->sPendientes->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Validate Method @15-CA2C417C
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_mes->Validate() && $Validation);
        $Validation = ($this->s_anio->Validate() && $Validation);
        $Validation = ($this->s_tipo->Validate() && $Validation);
        $Validation = ($this->sPendientes->Validate() && $Validation);
        $Validation = ($this->s_Numero->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_tipo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sPendientes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Numero->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @15-04BE5436
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_mes->Errors->Count());
        $errors = ($errors || $this->s_anio->Errors->Count());
        $errors = ($errors || $this->s_tipo->Errors->Count());
        $errors = ($errors || $this->sPendientes->Errors->Count());
        $errors = ($errors || $this->s_Numero->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @15-CE5D9CEB
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
        $Redirect = "UniversoLista.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "UniversoLista.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @15-DAFC80B7
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
        $this->s_mes->Prepare();
        $this->s_anio->Prepare();
        $this->s_tipo->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_tipo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sPendientes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Numero->Errors->ToString());
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
        $this->s_mes->Show();
        $this->s_anio->Show();
        $this->s_tipo->Show();
        $this->sPendientes->Show();
        $this->s_Numero->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End grdFiltra Class @15-FCB6E20C

//Include Page implementation @44-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecorduniverso_cds { //universo_cds Class @31-1D17A04F

//Variables @31-9E315808

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

//Class_Initialize Event @31-5EAF1355
    function clsRecorduniverso_cds($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record universo_cds/Error";
        $this->DataSource = new clsuniverso_cdsDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "universo_cds";
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
            $this->id_proveedor = new clsControl(ccsListBox, "id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->id_proveedor->DSType = dsTable;
            $this->id_proveedor->DataSource = new clsDBcnDisenio();
            $this->id_proveedor->ds = & $this->id_proveedor->DataSource;
            $this->id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->id_proveedor->BoundColumn, $this->id_proveedor->TextColumn, $this->id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->id_proveedor->DataSource->Parameters["expr103"] = 'CDS';
            $this->id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->id_proveedor->DataSource->wp->AddParameter("1", "expr103", ccsText, "", "", $this->id_proveedor->DataSource->Parameters["expr103"], "", false);
            $this->id_proveedor->DataSource->wp->Criterion[1] = $this->id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->id_proveedor->DataSource->wp->GetDBValue("1"), $this->id_proveedor->DataSource->ToSQL($this->id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->id_proveedor->DataSource->Where = 
                 $this->id_proveedor->DataSource->wp->Criterion[1];
            $this->id_proveedor->Required = true;
            $this->numero = new clsControl(ccsTextBox, "numero", "Numero", ccsText, "", CCGetRequestParam("numero", $Method, NULL), $this);
            $this->numero->Required = true;
            $this->tipo = new clsControl(ccsListBox, "tipo", "Tipo", ccsText, "", CCGetRequestParam("tipo", $Method, NULL), $this);
            $this->tipo->DSType = dsListOfValues;
            $this->tipo->Values = array(array("IN", "Incidente"), array("PA", "PPMC de Aprobación"), array("PC", "PPMC de Cierre"));
            $this->tipo->Required = true;
            $this->mes = new clsControl(ccsListBox, "mes", "Mes", ccsInteger, "", CCGetRequestParam("mes", $Method, NULL), $this);
            $this->mes->DSType = dsTable;
            $this->mes->DataSource = new clsDBcnDisenio();
            $this->mes->ds = & $this->mes->DataSource;
            $this->mes->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->mes->BoundColumn, $this->mes->TextColumn, $this->mes->DBFormat) = array("IdMes", "Mes", "");
            $this->mes->Required = true;
            $this->anio = new clsControl(ccsListBox, "anio", "Año", ccsInteger, "", CCGetRequestParam("anio", $Method, NULL), $this);
            $this->anio->DSType = dsListOfValues;
            $this->anio->Values = array(array("2012", "2012"), array("2013", "2013"), array("2014", "2014"), array("2015", "2015"), array("2016", "2016"), array("2017", "2017"));
            $this->anio->Required = true;
            $this->chkDescartar = new clsControl(ccsCheckBox, "chkDescartar", "chkDescartar", ccsInteger, "", CCGetRequestParam("chkDescartar", $Method, NULL), $this);
            $this->chkDescartar->CheckedValue = $this->chkDescartar->GetParsedValue(1);
            $this->chkDescartar->UncheckedValue = $this->chkDescartar->GetParsedValue(0);
            $this->notas_manual = new clsControl(ccsTextBox, "notas_manual", "Comentario", ccsText, "", CCGetRequestParam("notas_manual", $Method, NULL), $this);
            $this->notas_manual->Required = true;
            $this->NoMedir = new clsControl(ccsCheckBox, "NoMedir", "NoMedir", ccsInteger, "", CCGetRequestParam("NoMedir", $Method, NULL), $this);
            $this->NoMedir->CheckedValue = $this->NoMedir->GetParsedValue(1);
            $this->NoMedir->UncheckedValue = $this->NoMedir->GetParsedValue(0);
            $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", $Method, NULL), $this);
            $this->Link1->Parameters = CCGetQueryString("QueryString", array("id", "ccsForm"));
            $this->Link1->Page = "";
            $this->chkEsReqTeq = new clsControl(ccsCheckBox, "chkEsReqTeq", "chkEsReqTeq", ccsInteger, "", CCGetRequestParam("chkEsReqTeq", $Method, NULL), $this);
            $this->chkEsReqTeq->CheckedValue = $this->chkEsReqTeq->GetParsedValue(1);
            $this->chkEsReqTeq->UncheckedValue = $this->chkEsReqTeq->GetParsedValue(0);
            $this->ReqTecnico = new clsControl(ccsListBox, "ReqTecnico", "ReqTecnico", ccsText, "", CCGetRequestParam("ReqTecnico", $Method, NULL), $this);
            $this->ReqTecnico->DSType = dsTable;
            $this->ReqTecnico->DataSource = new clsDBcnDisenio();
            $this->ReqTecnico->ds = & $this->ReqTecnico->DataSource;
            $this->ReqTecnico->DataSource->SQL = "SELECT numero, id \n" .
"FROM mc_universo_cds {SQL_Where} {SQL_OrderBy}";
            list($this->ReqTecnico->BoundColumn, $this->ReqTecnico->TextColumn, $this->ReqTecnico->DBFormat) = array("numero", "numero", "");
            $this->ReqTecnico->DataSource->Parameters["expr164"] = 1;
            $this->ReqTecnico->DataSource->Parameters["expr165"] = 'PC';
            $this->ReqTecnico->DataSource->wp = new clsSQLParameters();
            $this->ReqTecnico->DataSource->wp->AddParameter("1", "expr164", ccsInteger, "", "", $this->ReqTecnico->DataSource->Parameters["expr164"], "", false);
            $this->ReqTecnico->DataSource->wp->AddParameter("2", "expr165", ccsText, "", "", $this->ReqTecnico->DataSource->Parameters["expr165"], "", false);
            $this->ReqTecnico->DataSource->wp->Criterion[1] = $this->ReqTecnico->DataSource->wp->Operation(opEqual, "[EsReqTecnico]", $this->ReqTecnico->DataSource->wp->GetDBValue("1"), $this->ReqTecnico->DataSource->ToSQL($this->ReqTecnico->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->ReqTecnico->DataSource->wp->Criterion[2] = $this->ReqTecnico->DataSource->wp->Operation(opEqual, "tipo", $this->ReqTecnico->DataSource->wp->GetDBValue("2"), $this->ReqTecnico->DataSource->ToSQL($this->ReqTecnico->DataSource->wp->GetDBValue("2"), ccsText),false);
            $this->ReqTecnico->DataSource->Where = $this->ReqTecnico->DataSource->wp->opAND(
                 false, 
                 $this->ReqTecnico->DataSource->wp->Criterion[1], 
                 $this->ReqTecnico->DataSource->wp->Criterion[2]);
            $this->chkSLO = new clsControl(ccsCheckBox, "chkSLO", "chkSLO", ccsInteger, "", CCGetRequestParam("chkSLO", $Method, NULL), $this);
            $this->chkSLO->CheckedValue = $this->chkSLO->GetParsedValue(1);
            $this->chkSLO->UncheckedValue = $this->chkSLO->GetParsedValue(0);
            $this->IdEstimacion = new clsControl(ccsTextBox, "IdEstimacion", "IdEstimacion", ccsText, "", CCGetRequestParam("IdEstimacion", $Method, NULL), $this);
            $this->chkRevision = new clsControl(ccsCheckBox, "chkRevision", "chkRevision", ccsInteger, "", CCGetRequestParam("chkRevision", $Method, NULL), $this);
            $this->chkRevision->CheckedValue = $this->chkRevision->GetParsedValue(1);
            $this->chkRevision->UncheckedValue = $this->chkRevision->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->id_proveedor->Value) && !strlen($this->id_proveedor->Value) && $this->id_proveedor->Value !== false)
                    $this->id_proveedor->SetText(CCGetParam("s_id_proveedor"));
                if(!is_array($this->tipo->Value) && !strlen($this->tipo->Value) && $this->tipo->Value !== false)
                    $this->tipo->SetText(CCGetParam("s_tipo"));
                if(!is_array($this->mes->Value) && !strlen($this->mes->Value) && $this->mes->Value !== false)
                    $this->mes->SetText(CCGetParam("s_mes"));
                if(!is_array($this->anio->Value) && !strlen($this->anio->Value) && $this->anio->Value !== false)
                    $this->anio->SetText(CCGetParam("s_anio"));
                if(!is_array($this->chkDescartar->Value) && !strlen($this->chkDescartar->Value) && $this->chkDescartar->Value !== false)
                    $this->chkDescartar->SetValue(false);
                if(!is_array($this->NoMedir->Value) && !strlen($this->NoMedir->Value) && $this->NoMedir->Value !== false)
                    $this->NoMedir->SetValue(false);
                if(!is_array($this->chkEsReqTeq->Value) && !strlen($this->chkEsReqTeq->Value) && $this->chkEsReqTeq->Value !== false)
                    $this->chkEsReqTeq->SetValue(false);
                if(!is_array($this->chkSLO->Value) && !strlen($this->chkSLO->Value) && $this->chkSLO->Value !== false)
                    $this->chkSLO->SetValue(false);
                if(!is_array($this->chkRevision->Value) && !strlen($this->chkRevision->Value) && $this->chkRevision->Value !== false)
                    $this->chkRevision->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @31-2832F4DC
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlid"] = CCGetFromGet("id", NULL);
    }
//End Initialize Method

//Validate Method @31-B36370B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->id_proveedor->Validate() && $Validation);
        $Validation = ($this->numero->Validate() && $Validation);
        $Validation = ($this->tipo->Validate() && $Validation);
        $Validation = ($this->mes->Validate() && $Validation);
        $Validation = ($this->anio->Validate() && $Validation);
        $Validation = ($this->chkDescartar->Validate() && $Validation);
        $Validation = ($this->notas_manual->Validate() && $Validation);
        $Validation = ($this->NoMedir->Validate() && $Validation);
        $Validation = ($this->chkEsReqTeq->Validate() && $Validation);
        $Validation = ($this->ReqTecnico->Validate() && $Validation);
        $Validation = ($this->chkSLO->Validate() && $Validation);
        $Validation = ($this->IdEstimacion->Validate() && $Validation);
        $Validation = ($this->chkRevision->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->numero->Errors->Count() == 0);
        $Validation =  $Validation && ($this->tipo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->chkDescartar->Errors->Count() == 0);
        $Validation =  $Validation && ($this->notas_manual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NoMedir->Errors->Count() == 0);
        $Validation =  $Validation && ($this->chkEsReqTeq->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ReqTecnico->Errors->Count() == 0);
        $Validation =  $Validation && ($this->chkSLO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IdEstimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->chkRevision->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @31-564E9B03
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->numero->Errors->Count());
        $errors = ($errors || $this->tipo->Errors->Count());
        $errors = ($errors || $this->mes->Errors->Count());
        $errors = ($errors || $this->anio->Errors->Count());
        $errors = ($errors || $this->chkDescartar->Errors->Count());
        $errors = ($errors || $this->notas_manual->Errors->Count());
        $errors = ($errors || $this->NoMedir->Errors->Count());
        $errors = ($errors || $this->Link1->Errors->Count());
        $errors = ($errors || $this->chkEsReqTeq->Errors->Count());
        $errors = ($errors || $this->ReqTecnico->Errors->Count());
        $errors = ($errors || $this->chkSLO->Errors->Count());
        $errors = ($errors || $this->IdEstimacion->Errors->Count());
        $errors = ($errors || $this->chkRevision->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @31-A031DE25
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
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "id"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
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

//InsertRow Method @31-8BCE839B
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->id_proveedor->SetValue($this->id_proveedor->GetValue(true));
        $this->DataSource->numero->SetValue($this->numero->GetValue(true));
        $this->DataSource->tipo->SetValue($this->tipo->GetValue(true));
        $this->DataSource->mes->SetValue($this->mes->GetValue(true));
        $this->DataSource->anio->SetValue($this->anio->GetValue(true));
        $this->DataSource->chkDescartar->SetValue($this->chkDescartar->GetValue(true));
        $this->DataSource->notas_manual->SetValue($this->notas_manual->GetValue(true));
        $this->DataSource->NoMedir->SetValue($this->NoMedir->GetValue(true));
        $this->DataSource->Link1->SetValue($this->Link1->GetValue(true));
        $this->DataSource->chkEsReqTeq->SetValue($this->chkEsReqTeq->GetValue(true));
        $this->DataSource->ReqTecnico->SetValue($this->ReqTecnico->GetValue(true));
        $this->DataSource->chkSLO->SetValue($this->chkSLO->GetValue(true));
        $this->DataSource->IdEstimacion->SetValue($this->IdEstimacion->GetValue(true));
        $this->DataSource->chkRevision->SetValue($this->chkRevision->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @31-0B2C719F
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id_proveedor->SetValue($this->id_proveedor->GetValue(true));
        $this->DataSource->numero->SetValue($this->numero->GetValue(true));
        $this->DataSource->tipo->SetValue($this->tipo->GetValue(true));
        $this->DataSource->mes->SetValue($this->mes->GetValue(true));
        $this->DataSource->anio->SetValue($this->anio->GetValue(true));
        $this->DataSource->chkDescartar->SetValue($this->chkDescartar->GetValue(true));
        $this->DataSource->notas_manual->SetValue($this->notas_manual->GetValue(true));
        $this->DataSource->NoMedir->SetValue($this->NoMedir->GetValue(true));
        $this->DataSource->Link1->SetValue($this->Link1->GetValue(true));
        $this->DataSource->chkEsReqTeq->SetValue($this->chkEsReqTeq->GetValue(true));
        $this->DataSource->ReqTecnico->SetValue($this->ReqTecnico->GetValue(true));
        $this->DataSource->chkSLO->SetValue($this->chkSLO->GetValue(true));
        $this->DataSource->IdEstimacion->SetValue($this->IdEstimacion->GetValue(true));
        $this->DataSource->chkRevision->SetValue($this->chkRevision->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @31-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @31-C89803EE
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

        $this->id_proveedor->Prepare();
        $this->tipo->Prepare();
        $this->mes->Prepare();
        $this->anio->Prepare();
        $this->ReqTecnico->Prepare();

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
                $this->Link1->SetValue($this->DataSource->Link1->GetValue());
                if(!$this->FormSubmitted){
                    $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                    $this->numero->SetValue($this->DataSource->numero->GetValue());
                    $this->tipo->SetValue($this->DataSource->tipo->GetValue());
                    $this->mes->SetValue($this->DataSource->mes->GetValue());
                    $this->anio->SetValue($this->DataSource->anio->GetValue());
                    $this->chkDescartar->SetValue($this->DataSource->chkDescartar->GetValue());
                    $this->notas_manual->SetValue($this->DataSource->notas_manual->GetValue());
                    $this->NoMedir->SetValue($this->DataSource->NoMedir->GetValue());
                    $this->chkEsReqTeq->SetValue($this->DataSource->chkEsReqTeq->GetValue());
                    $this->ReqTecnico->SetValue($this->DataSource->ReqTecnico->GetValue());
                    $this->chkSLO->SetValue($this->DataSource->chkSLO->GetValue());
                    $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                    $this->chkRevision->SetValue($this->DataSource->chkRevision->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->numero->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tipo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->chkDescartar->Errors->ToString());
            $Error = ComposeStrings($Error, $this->notas_manual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NoMedir->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->chkEsReqTeq->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ReqTecnico->Errors->ToString());
            $Error = ComposeStrings($Error, $this->chkSLO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IdEstimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->chkRevision->Errors->ToString());
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
        $this->id_proveedor->Show();
        $this->numero->Show();
        $this->tipo->Show();
        $this->mes->Show();
        $this->anio->Show();
        $this->chkDescartar->Show();
        $this->notas_manual->Show();
        $this->NoMedir->Show();
        $this->Link1->Show();
        $this->chkEsReqTeq->Show();
        $this->ReqTecnico->Show();
        $this->chkSLO->Show();
        $this->IdEstimacion->Show();
        $this->chkRevision->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End universo_cds Class @31-FCB6E20C

class clsuniverso_cdsDataSource extends clsDBcnDisenio {  //universo_cdsDataSource Class @31-45E09402

//DataSource Variables @31-FA0B918C
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
    public $id_proveedor;
    public $numero;
    public $tipo;
    public $mes;
    public $anio;
    public $chkDescartar;
    public $notas_manual;
    public $NoMedir;
    public $Link1;
    public $chkEsReqTeq;
    public $ReqTecnico;
    public $chkSLO;
    public $IdEstimacion;
    public $chkRevision;
//End DataSource Variables

//DataSourceClass_Initialize Event @31-FB1734E2
    function clsuniverso_cdsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record universo_cds/Error";
        $this->Initialize();
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->numero = new clsField("numero", ccsText, "");
        
        $this->tipo = new clsField("tipo", ccsText, "");
        
        $this->mes = new clsField("mes", ccsInteger, "");
        
        $this->anio = new clsField("anio", ccsInteger, "");
        
        $this->chkDescartar = new clsField("chkDescartar", ccsInteger, "");
        
        $this->notas_manual = new clsField("notas_manual", ccsText, "");
        
        $this->NoMedir = new clsField("NoMedir", ccsInteger, "");
        
        $this->Link1 = new clsField("Link1", ccsText, "");
        
        $this->chkEsReqTeq = new clsField("chkEsReqTeq", ccsInteger, "");
        
        $this->ReqTecnico = new clsField("ReqTecnico", ccsText, "");
        
        $this->chkSLO = new clsField("chkSLO", ccsInteger, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsText, "");
        
        $this->chkRevision = new clsField("chkRevision", ccsInteger, "");
        

        $this->InsertFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["numero"] = array("Name" => "numero", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["tipo"] = array("Name" => "tipo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["mes"] = array("Name" => "mes", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["anio"] = array("Name" => "anio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["descartar_manual"] = array("Name" => "descartar_manual", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["notas_manual"] = array("Name" => "notas_manual", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NoMedir"] = array("Name" => "[NoMedir]", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["EsReqTecnico"] = array("Name" => "[EsReqTecnico]", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["ReqTecnico"] = array("Name" => "[ReqTecnico]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SLO"] = array("Name" => "SLO", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["IdEstimacion"] = array("Name" => "[IdEstimacion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Revision"] = array("Name" => "[Revision]", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["numero"] = array("Name" => "numero", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["tipo"] = array("Name" => "tipo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["mes"] = array("Name" => "mes", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["anio"] = array("Name" => "anio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["descartar_manual"] = array("Name" => "descartar_manual", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["notas_manual"] = array("Name" => "notas_manual", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NoMedir"] = array("Name" => "[NoMedir]", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["EsReqTecnico"] = array("Name" => "[EsReqTecnico]", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["ReqTecnico"] = array("Name" => "[ReqTecnico]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SLO"] = array("Name" => "SLO", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["IdEstimacion"] = array("Name" => "[IdEstimacion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Revision"] = array("Name" => "[Revision]", "Value" => "", "DataType" => ccsInteger);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @31-35B33087
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlid", ccsInteger, "", "", $this->Parameters["urlid"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @31-F09ADBA5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_universo_cds {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @31-84E1F47E
    function SetValues()
    {
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->numero->SetDBValue($this->f("numero"));
        $this->tipo->SetDBValue($this->f("tipo"));
        $this->mes->SetDBValue(trim($this->f("mes")));
        $this->anio->SetDBValue(trim($this->f("anio")));
        $this->chkDescartar->SetDBValue(trim($this->f("descartar_manual")));
        $this->notas_manual->SetDBValue($this->f("notas_manual"));
        $this->NoMedir->SetDBValue(trim($this->f("NoMedir")));
        $this->Link1->SetDBValue($this->f("Limpiar Campos"));
        $this->chkEsReqTeq->SetDBValue(trim($this->f("EsReqTecnico")));
        $this->ReqTecnico->SetDBValue($this->f("ReqTecnico"));
        $this->chkSLO->SetDBValue(trim($this->f("SLO")));
        $this->IdEstimacion->SetDBValue($this->f("IdEstimacion"));
        $this->chkRevision->SetDBValue(trim($this->f("Revision")));
    }
//End SetValues Method

//Insert Method @31-983AADAF
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["id_proveedor"]["Value"] = $this->id_proveedor->GetDBValue(true);
        $this->InsertFields["numero"]["Value"] = $this->numero->GetDBValue(true);
        $this->InsertFields["tipo"]["Value"] = $this->tipo->GetDBValue(true);
        $this->InsertFields["mes"]["Value"] = $this->mes->GetDBValue(true);
        $this->InsertFields["anio"]["Value"] = $this->anio->GetDBValue(true);
        $this->InsertFields["descartar_manual"]["Value"] = $this->chkDescartar->GetDBValue(true);
        $this->InsertFields["notas_manual"]["Value"] = $this->notas_manual->GetDBValue(true);
        $this->InsertFields["NoMedir"]["Value"] = $this->NoMedir->GetDBValue(true);
        $this->InsertFields["EsReqTecnico"]["Value"] = $this->chkEsReqTeq->GetDBValue(true);
        $this->InsertFields["ReqTecnico"]["Value"] = $this->ReqTecnico->GetDBValue(true);
        $this->InsertFields["SLO"]["Value"] = $this->chkSLO->GetDBValue(true);
        $this->InsertFields["IdEstimacion"]["Value"] = $this->IdEstimacion->GetDBValue(true);
        $this->InsertFields["Revision"]["Value"] = $this->chkRevision->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_universo_cds", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @31-4B2E043C
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["id_proveedor"]["Value"] = $this->id_proveedor->GetDBValue(true);
        $this->UpdateFields["numero"]["Value"] = $this->numero->GetDBValue(true);
        $this->UpdateFields["tipo"]["Value"] = $this->tipo->GetDBValue(true);
        $this->UpdateFields["mes"]["Value"] = $this->mes->GetDBValue(true);
        $this->UpdateFields["anio"]["Value"] = $this->anio->GetDBValue(true);
        $this->UpdateFields["descartar_manual"]["Value"] = $this->chkDescartar->GetDBValue(true);
        $this->UpdateFields["notas_manual"]["Value"] = $this->notas_manual->GetDBValue(true);
        $this->UpdateFields["NoMedir"]["Value"] = $this->NoMedir->GetDBValue(true);
        $this->UpdateFields["EsReqTecnico"]["Value"] = $this->chkEsReqTeq->GetDBValue(true);
        $this->UpdateFields["ReqTecnico"]["Value"] = $this->ReqTecnico->GetDBValue(true);
        $this->UpdateFields["SLO"]["Value"] = $this->chkSLO->GetDBValue(true);
        $this->UpdateFields["IdEstimacion"]["Value"] = $this->IdEstimacion->GetDBValue(true);
        $this->UpdateFields["Revision"]["Value"] = $this->chkRevision->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_universo_cds", $this->UpdateFields, $this);
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

//Delete Method @31-92253996
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["RETURN_VALUE"] = new clsSQLParameter("urlRETURN_VALUE", ccsInteger, "", "", CCGetFromGet("RETURN_VALUE", NULL), "", false, $this->ErrorBlock);
        $this->cp["IdU"] = new clsSQLParameter("urlid", ccsInteger, "", "", CCGetFromGet("id", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["RETURN_VALUE"]->GetValue()) and !strlen($this->cp["RETURN_VALUE"]->GetText()) and !is_bool($this->cp["RETURN_VALUE"]->GetValue())) 
            $this->cp["RETURN_VALUE"]->SetText(CCGetFromGet("RETURN_VALUE", NULL));
        if (!is_null($this->cp["IdU"]->GetValue()) and !strlen($this->cp["IdU"]->GetText()) and !is_bool($this->cp["IdU"]->GetValue())) 
            $this->cp["IdU"]->SetText(CCGetFromGet("id", NULL));
        $this->SQL = "EXEC spD_BorraReq " . $this->ToSQL($this->cp["IdU"]->GetDBValue(), $this->cp["IdU"]->DataType) . ";";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End universo_cdsDataSource Class @31-FCB6E20C

class clsGridgrdUniverso { //grdUniverso class @2-289C34FB

//Variables @2-7544DF4E

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
    public $Sorter_tipo;
    public $Sorter_numero;
    public $Sorter_proveedor;
    public $Sorter_nombre;
    public $Sorter_anio;
    public $Sorter_IdEstimacion;
//End Variables

//Class_Initialize Event @2-54770AFB
    function clsGridgrdUniverso($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdUniverso";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdUniverso";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdUniversoDataSource($this);
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
        $this->SorterName = CCGetParam("grdUniversoOrder", "");
        $this->SorterDirection = CCGetParam("grdUniversoDir", "");

        $this->tipo = new clsControl(ccsLabel, "tipo", "tipo", ccsText, "", CCGetRequestParam("tipo", ccsGet, NULL), $this);
        $this->hnumero = new clsControl(ccsLink, "hnumero", "hnumero", ccsText, "", CCGetRequestParam("hnumero", ccsGet, NULL), $this);
        $this->hnumero->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->hnumero->Page = "";
        $this->proveedor = new clsControl(ccsLabel, "proveedor", "proveedor", ccsText, "", CCGetRequestParam("proveedor", ccsGet, NULL), $this);
        $this->mes = new clsControl(ccsLabel, "mes", "mes", ccsText, "", CCGetRequestParam("mes", ccsGet, NULL), $this);
        $this->anio = new clsControl(ccsLabel, "anio", "anio", ccsInteger, "", CCGetRequestParam("anio", ccsGet, NULL), $this);
        $this->descartar_manual = new clsControl(ccsLabel, "descartar_manual", "descartar_manual", ccsText, "", CCGetRequestParam("descartar_manual", ccsGet, NULL), $this);
        $this->lbSLO_RT = new clsControl(ccsLink, "lbSLO_RT", "lbSLO_RT", ccsText, "", CCGetRequestParam("lbSLO_RT", ccsGet, NULL), $this);
        $this->lbSLO_RT->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lbSLO_RT->Page = "ReqTecList.php";
        $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $this);
        $this->Link1->Page = "";
        $this->IdEstimacion = new clsControl(ccsLabel, "IdEstimacion", "IdEstimacion", ccsText, "", CCGetRequestParam("IdEstimacion", ccsGet, NULL), $this);
        $this->Sorter_tipo = new clsSorter($this->ComponentName, "Sorter_tipo", $FileName, $this);
        $this->Sorter_numero = new clsSorter($this->ComponentName, "Sorter_numero", $FileName, $this);
        $this->Sorter_proveedor = new clsSorter($this->ComponentName, "Sorter_proveedor", $FileName, $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Sorter_anio = new clsSorter($this->ComponentName, "Sorter_anio", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Sorter_IdEstimacion = new clsSorter($this->ComponentName, "Sorter_IdEstimacion", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @2-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @2-2CF8BD74
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_mes"] = CCGetFromGet("s_mes", NULL);
        $this->DataSource->Parameters["urls_anio"] = CCGetFromGet("s_anio", NULL);
        $this->DataSource->Parameters["urls_tipo"] = CCGetFromGet("s_tipo", NULL);
        $this->DataSource->Parameters["urlsPendientes"] = CCGetFromGet("sPendientes", NULL);
        $this->DataSource->Parameters["urls_Numero"] = CCGetFromGet("s_Numero", NULL);

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
            $this->ControlsVisible["tipo"] = $this->tipo->Visible;
            $this->ControlsVisible["hnumero"] = $this->hnumero->Visible;
            $this->ControlsVisible["proveedor"] = $this->proveedor->Visible;
            $this->ControlsVisible["mes"] = $this->mes->Visible;
            $this->ControlsVisible["anio"] = $this->anio->Visible;
            $this->ControlsVisible["descartar_manual"] = $this->descartar_manual->Visible;
            $this->ControlsVisible["lbSLO_RT"] = $this->lbSLO_RT->Visible;
            $this->ControlsVisible["Link1"] = $this->Link1->Visible;
            $this->ControlsVisible["IdEstimacion"] = $this->IdEstimacion->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->tipo->SetValue($this->DataSource->tipo->GetValue());
                $this->hnumero->SetValue($this->DataSource->hnumero->GetValue());
                $this->proveedor->SetValue($this->DataSource->proveedor->GetValue());
                $this->mes->SetValue($this->DataSource->mes->GetValue());
                $this->anio->SetValue($this->DataSource->anio->GetValue());
                $this->descartar_manual->SetValue($this->DataSource->descartar_manual->GetValue());
                $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link1->Parameters = CCAddParam($this->Link1->Parameters, "id", $this->DataSource->f("id"));
                $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->tipo->Show();
                $this->hnumero->Show();
                $this->proveedor->Show();
                $this->mes->Show();
                $this->anio->Show();
                $this->descartar_manual->Show();
                $this->lbSLO_RT->Show();
                $this->Link1->Show();
                $this->IdEstimacion->Show();
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
        $this->Sorter_tipo->Show();
        $this->Sorter_numero->Show();
        $this->Sorter_proveedor->Show();
        $this->Sorter_nombre->Show();
        $this->Sorter_anio->Show();
        $this->Navigator->Show();
        $this->Sorter_IdEstimacion->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-22451E85
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->tipo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->hnumero->Errors->ToString());
        $errors = ComposeStrings($errors, $this->proveedor->Errors->ToString());
        $errors = ComposeStrings($errors, $this->mes->Errors->ToString());
        $errors = ComposeStrings($errors, $this->anio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->descartar_manual->Errors->ToString());
        $errors = ComposeStrings($errors, $this->lbSLO_RT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IdEstimacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdUniverso Class @2-FCB6E20C

class clsgrdUniversoDataSource extends clsDBcnDisenio {  //grdUniversoDataSource Class @2-51B5B915

//DataSource Variables @2-8EB4094D
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $tipo;
    public $hnumero;
    public $proveedor;
    public $mes;
    public $anio;
    public $descartar_manual;
    public $IdEstimacion;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-2F28A1D7
    function clsgrdUniversoDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdUniverso";
        $this->Initialize();
        $this->tipo = new clsField("tipo", ccsText, "");
        
        $this->hnumero = new clsField("hnumero", ccsText, "");
        
        $this->proveedor = new clsField("proveedor", ccsText, "");
        
        $this->mes = new clsField("mes", ccsText, "");
        
        $this->anio = new clsField("anio", ccsInteger, "");
        
        $this->descartar_manual = new clsField("descartar_manual", ccsText, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-1FCB5EB9
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_tipo" => array("tipo", ""), 
            "Sorter_numero" => array("numero", ""), 
            "Sorter_proveedor" => array("proveedor", ""), 
            "Sorter_nombre" => array("nombre", ""), 
            "Sorter_anio" => array("anio", ""), 
            "Sorter_IdEstimacion" => array("IdEstimacion", "")));
    }
//End SetOrder Method

//Prepare Method @2-D2408C9F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_mes", ccsInteger, "", "", $this->Parameters["urls_mes"], date("m",mktime(0,0,0,date("m")-1,date("d"),date("Y"))), false);
        $this->wp->AddParameter("3", "urls_anio", ccsInteger, "", "", $this->Parameters["urls_anio"], date("Y",mktime(0,0,0,date("m"),date("d")-45,date("Y"))), false);
        $this->wp->AddParameter("4", "urls_tipo", ccsText, "", "", $this->Parameters["urls_tipo"], "", false);
        $this->wp->AddParameter("5", "urlsPendientes", ccsInteger, "", "", $this->Parameters["urlsPendientes"], 0, false);
        $this->wp->AddParameter("6", "urls_Numero", ccsText, "", "", $this->Parameters["urls_Numero"], "", false);
    }
//End Prepare Method

//Open Method @2-4D507C3A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select u.id, u.numero,  u.IdEstimacion,p.nombre proveedor, m.mes, u.anio ,\n" .
        "	case when tipo ='IN' THEN 'Incidente'\n" .
        "		when tipo='PA' THEN 'Aprobación PPMC'\n" .
        "		when tipo='PC' THEN 'Cierre PPMC'\n" .
        "	end as desc_tipo,\n" .
        "	u.descartar_manual,\n" .
        "	u.tipo, u.medido, u.slo, u.EsReqTecnico \n" .
        "from mc_universo_cds u\n" .
        "	left join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "	left join mc_c_mes m on m.idMes = u.mes \n" .
        "where (\n" .
        "	(u.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0)\n" .
        "    and (u.mes=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ")\n" .
        "    and (u.anio=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "    and u.tipo like '%" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "%'\n" .
        "    --and (u.descartar_manual =0 or u.descartar_manual is null)\n" .
        "    and u.numero like '%" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "%'\n" .
        ") or (u.descartar_manual = " . $this->SQLValue($this->wp->GetDBValue("5"), ccsInteger) . " and  1=" . $this->SQLValue($this->wp->GetDBValue("5"), ccsInteger) . ")) cnt";
        $this->SQL = "select u.id, u.numero,  u.IdEstimacion,p.nombre proveedor, m.mes, u.anio ,\n" .
        "	case when tipo ='IN' THEN 'Incidente'\n" .
        "		when tipo='PA' THEN 'Aprobación PPMC'\n" .
        "		when tipo='PC' THEN 'Cierre PPMC'\n" .
        "	end as desc_tipo,\n" .
        "	u.descartar_manual,\n" .
        "	u.tipo, u.medido, u.slo, u.EsReqTecnico \n" .
        "from mc_universo_cds u\n" .
        "	left join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "	left join mc_c_mes m on m.idMes = u.mes \n" .
        "where (\n" .
        "	(u.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0)\n" .
        "    and (u.mes=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ")\n" .
        "    and (u.anio=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "    and u.tipo like '%" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "%'\n" .
        "    --and (u.descartar_manual =0 or u.descartar_manual is null)\n" .
        "    and u.numero like '%" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "%'\n" .
        ") or (u.descartar_manual = " . $this->SQLValue($this->wp->GetDBValue("5"), ccsInteger) . " and  1=" . $this->SQLValue($this->wp->GetDBValue("5"), ccsInteger) . ")";
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

//SetValues Method @2-43FAAEA7
    function SetValues()
    {
        $this->tipo->SetDBValue($this->f("desc_tipo"));
        $this->hnumero->SetDBValue($this->f("numero"));
        $this->proveedor->SetDBValue($this->f("proveedor"));
        $this->mes->SetDBValue($this->f("mes"));
        $this->anio->SetDBValue(trim($this->f("anio")));
        $this->descartar_manual->SetDBValue($this->f("descartar_manual"));
        $this->IdEstimacion->SetDBValue($this->f("IdEstimacion"));
    }
//End SetValues Method

} //End grdUniversoDataSource Class @2-FCB6E20C

class clsRecordmc_universo_cds { //mc_universo_cds Class @147-D3187B14

//Variables @147-9E315808

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

//Class_Initialize Event @147-CA7950FC
    function clsRecordmc_universo_cds($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_universo_cds/Error";
        $this->DataSource = new clsmc_universo_cdsDataSource($this);
        $this->ds = & $this->DataSource;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_universo_cds";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->EsReqTecnico = new clsControl(ccsCheckBox, "EsReqTecnico", "EsReqTecnico", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("EsReqTecnico", $Method, NULL), $this);
            $this->EsReqTecnico->CheckedValue = true;
            $this->EsReqTecnico->UncheckedValue = false;
            $this->ReqTecnico = new clsControl(ccsListBox, "ReqTecnico", "Req Tecnico", ccsInteger, "", CCGetRequestParam("ReqTecnico", $Method, NULL), $this);
            $this->ReqTecnico->DSType = dsTable;
            $this->ReqTecnico->DataSource = new clsDBcnDisenio();
            $this->ReqTecnico->ds = & $this->ReqTecnico->DataSource;
            $this->ReqTecnico->DataSource->SQL = "SELECT * \n" .
"FROM mc_universo_cds {SQL_Where} {SQL_OrderBy}";
            list($this->ReqTecnico->BoundColumn, $this->ReqTecnico->TextColumn, $this->ReqTecnico->DBFormat) = array("numero", "numero", "");
            $this->ReqTecnico->DataSource->Parameters["expr159"] = 1;
            $this->ReqTecnico->DataSource->Parameters["expr160"] = 'PC';
            $this->ReqTecnico->DataSource->wp = new clsSQLParameters();
            $this->ReqTecnico->DataSource->wp->AddParameter("1", "expr159", ccsInteger, "", "", $this->ReqTecnico->DataSource->Parameters["expr159"], "", false);
            $this->ReqTecnico->DataSource->wp->AddParameter("2", "expr160", ccsText, "", "", $this->ReqTecnico->DataSource->Parameters["expr160"], "", false);
            $this->ReqTecnico->DataSource->wp->Criterion[1] = $this->ReqTecnico->DataSource->wp->Operation(opEqual, "[EsReqTecnico]", $this->ReqTecnico->DataSource->wp->GetDBValue("1"), $this->ReqTecnico->DataSource->ToSQL($this->ReqTecnico->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->ReqTecnico->DataSource->wp->Criterion[2] = $this->ReqTecnico->DataSource->wp->Operation(opEqual, "tipo", $this->ReqTecnico->DataSource->wp->GetDBValue("2"), $this->ReqTecnico->DataSource->ToSQL($this->ReqTecnico->DataSource->wp->GetDBValue("2"), ccsText),false);
            $this->ReqTecnico->DataSource->Where = $this->ReqTecnico->DataSource->wp->opAND(
                 false, 
                 $this->ReqTecnico->DataSource->wp->Criterion[1], 
                 $this->ReqTecnico->DataSource->wp->Criterion[2]);
            if(!$this->FormSubmitted) {
                if(!is_array($this->EsReqTecnico->Value) && !strlen($this->EsReqTecnico->Value) && $this->EsReqTecnico->Value !== false)
                    $this->EsReqTecnico->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @147-2832F4DC
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlid"] = CCGetFromGet("id", NULL);
    }
//End Initialize Method

//Validate Method @147-F69FD101
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->EsReqTecnico->Validate() && $Validation);
        $Validation = ($this->ReqTecnico->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->EsReqTecnico->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ReqTecnico->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @147-A0A3A069
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->EsReqTecnico->Errors->Count());
        $errors = ($errors || $this->ReqTecnico->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @147-517B5C36
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
            $this->PressedButton = $this->EditMode ? "Button_Update" : "";
            if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_Update") {
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

//UpdateRow Method @147-2A2A5FBF
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->EsReqTecnico->SetValue($this->EsReqTecnico->GetValue(true));
        $this->DataSource->ReqTecnico->SetValue($this->ReqTecnico->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @147-36DD9B23
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

        $this->ReqTecnico->Prepare();

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
                    $this->EsReqTecnico->SetValue($this->DataSource->EsReqTecnico->GetValue());
                    $this->ReqTecnico->SetValue($this->DataSource->ReqTecnico->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->EsReqTecnico->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ReqTecnico->Errors->ToString());
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
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Update->Show();
        $this->EsReqTecnico->Show();
        $this->ReqTecnico->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_universo_cds Class @147-FCB6E20C

class clsmc_universo_cdsDataSource extends clsDBcnDisenio {  //mc_universo_cdsDataSource Class @147-15155AF6

//DataSource Variables @147-BDB3FB4A
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $wp;
    public $AllParametersSet;

    public $UpdateFields = array();

    // Datasource fields
    public $EsReqTecnico;
    public $ReqTecnico;
//End DataSource Variables

//DataSourceClass_Initialize Event @147-C15A85F0
    function clsmc_universo_cdsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_universo_cds/Error";
        $this->Initialize();
        $this->EsReqTecnico = new clsField("EsReqTecnico", ccsBoolean, $this->BooleanFormat);
        
        $this->ReqTecnico = new clsField("ReqTecnico", ccsInteger, "");
        

        $this->UpdateFields["EsReqTecnico"] = array("Name" => "[EsReqTecnico]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["ReqTecnico"] = array("Name" => "[ReqTecnico]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @147-35B33087
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlid", ccsInteger, "", "", $this->Parameters["urlid"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @147-F09ADBA5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_universo_cds {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @147-917E9D33
    function SetValues()
    {
        $this->EsReqTecnico->SetDBValue(trim($this->f("EsReqTecnico")));
        $this->ReqTecnico->SetDBValue(trim($this->f("ReqTecnico")));
    }
//End SetValues Method

//Update Method @147-34DC0FB9
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["EsReqTecnico"]["Value"] = $this->EsReqTecnico->GetDBValue(true);
        $this->UpdateFields["ReqTecnico"]["Value"] = $this->ReqTecnico->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_universo_cds", $this->UpdateFields, $this);
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

} //End mc_universo_cdsDataSource Class @147-FCB6E20C



//Initialize Page @1-FF6E5C9B
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
$TemplateFileName = "UniversoLista.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-D5F39CEF
CCSecurityRedirect("", "Login.php");
//End Authenticate User

//Include events file @1-2890936C
include_once("./UniversoLista_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-2FF10139
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$grdFiltra = new clsRecordgrdFiltra("", $MainPage);
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$Panel1 = new clsPanel("Panel1", $MainPage);
$universo_cds = new clsRecorduniverso_cds("", $MainPage);
$grdUniverso = new clsGridgrdUniverso("", $MainPage);
$mc_universo_cds = new clsRecordmc_universo_cds("", $MainPage);
$Panel2 = new clsPanel("Panel2", $MainPage);
$Link3 = new clsControl(ccsLink, "Link3", "Link3", ccsText, "", CCGetRequestParam("Link3", ccsGet, NULL), $MainPage);
$Link3->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link3->Page = "IncidentesRelacionados.php";
$lkCargaMultiple = new clsControl(ccsLink, "lkCargaMultiple", "lkCargaMultiple", ccsText, "", CCGetRequestParam("lkCargaMultiple", ccsGet, NULL), $MainPage);
$lkCargaMultiple->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkCargaMultiple->Page = "UniversoCarga.php";
$Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Page = "UniversoCarga.php";
$Link2 = new clsControl(ccsLink, "Link2", "Link2", ccsText, "", CCGetRequestParam("Link2", ccsGet, NULL), $MainPage);
$Link2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link2->Page = "UniversoDistribucion.php";
$MainPage->grdFiltra = & $grdFiltra;
$MainPage->Header = & $Header;
$MainPage->Panel1 = & $Panel1;
$MainPage->universo_cds = & $universo_cds;
$MainPage->grdUniverso = & $grdUniverso;
$MainPage->mc_universo_cds = & $mc_universo_cds;
$MainPage->Panel2 = & $Panel2;
$MainPage->Link3 = & $Link3;
$MainPage->lkCargaMultiple = & $lkCargaMultiple;
$MainPage->Link1 = & $Link1;
$MainPage->Link2 = & $Link2;
$Panel1->AddComponent("universo_cds", $universo_cds);
$Panel2->AddComponent("Link3", $Link3);
$Panel2->AddComponent("lkCargaMultiple", $lkCargaMultiple);
$Panel2->AddComponent("Link1", $Link1);
$Panel2->AddComponent("Link2", $Link2);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Parameters = CCAddParam($Link1->Parameters, "Generar", 1);
$universo_cds->Initialize();
$grdUniverso->Initialize();
$mc_universo_cds->Initialize();
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

//Execute Components @1-17E74EC5
$mc_universo_cds->Operation();
$universo_cds->Operation();
$Header->Operations();
$grdFiltra->Operation();
//End Execute Components

//Go to destination page @1-38AF00BB
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($grdFiltra);
    $Header->Class_Terminate();
    unset($Header);
    unset($universo_cds);
    unset($grdUniverso);
    unset($mc_universo_cds);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-1D8ABE8E
$grdFiltra->Show();
$Header->Show();
$grdUniverso->Show();
$mc_universo_cds->Show();
$Panel1->Show();
$Panel2->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-3E430870
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($grdFiltra);
$Header->Class_Terminate();
unset($Header);
unset($universo_cds);
unset($grdUniverso);
unset($mc_universo_cds);
unset($Tpl);
//End Unload Page


?>
