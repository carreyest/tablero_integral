<?php
//Include Common Files @1-F1BEF63F
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "IncidentesLista.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordmc_info_incidentesSearch { //mc_info_incidentesSearch Class @2-A8AEC4CE

//Variables @2-9E315808

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

//Class_Initialize Event @2-E071FFF2
    function clsRecordmc_info_incidentesSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_incidentesSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_incidentesSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_cds_param = new clsControl(ccsListBox, "s_cds_param", "s_cds_param", ccsInteger, "", CCGetRequestParam("s_cds_param", $Method, NULL), $this);
            $this->s_cds_param->DSType = dsTable;
            $this->s_cds_param->DataSource = new clsDBcnDisenio();
            $this->s_cds_param->ds = & $this->s_cds_param->DataSource;
            $this->s_cds_param->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_cds_param->BoundColumn, $this->s_cds_param->TextColumn, $this->s_cds_param->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_cds_param->DataSource->Parameters["expr129"] = "CDS";
            $this->s_cds_param->DataSource->wp = new clsSQLParameters();
            $this->s_cds_param->DataSource->wp->AddParameter("1", "expr129", ccsText, "", "", $this->s_cds_param->DataSource->Parameters["expr129"], "CDS", false);
            $this->s_cds_param->DataSource->wp->Criterion[1] = $this->s_cds_param->DataSource->wp->Operation(opEqual, "descripcion", $this->s_cds_param->DataSource->wp->GetDBValue("1"), $this->s_cds_param->DataSource->ToSQL($this->s_cds_param->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_cds_param->DataSource->Where = 
                 $this->s_cds_param->DataSource->wp->Criterion[1];
            $this->s_mes_param = new clsControl(ccsListBox, "s_mes_param", "s_mes_param", ccsInteger, "", CCGetRequestParam("s_mes_param", $Method, NULL), $this);
            $this->s_mes_param->DSType = dsTable;
            $this->s_mes_param->DataSource = new clsDBcnDisenio();
            $this->s_mes_param->ds = & $this->s_mes_param->DataSource;
            $this->s_mes_param->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_mes_param->BoundColumn, $this->s_mes_param->TextColumn, $this->s_mes_param->DBFormat) = array("IdMes", "Mes", "");
            $this->s_anio_param = new clsControl(ccsListBox, "s_anio_param", "s_anio_param", ccsText, "", CCGetRequestParam("s_anio_param", $Method, NULL), $this);
            $this->s_anio_param->DSType = dsTable;
            $this->s_anio_param->DataSource = new clsDBcnDisenio();
            $this->s_anio_param->ds = & $this->s_anio_param->DataSource;
            $this->s_anio_param->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_anio_param->BoundColumn, $this->s_anio_param->TextColumn, $this->s_anio_param->DBFormat) = array("Ano", "Ano", "");
            $this->s_anio_param->DataSource->Parameters["expr173"] = 2013;
            $this->s_anio_param->DataSource->wp = new clsSQLParameters();
            $this->s_anio_param->DataSource->wp->AddParameter("1", "expr173", ccsInteger, "", "", $this->s_anio_param->DataSource->Parameters["expr173"], "", false);
            $this->s_anio_param->DataSource->wp->Criterion[1] = $this->s_anio_param->DataSource->wp->Operation(opGreaterThan, "[Ano]", $this->s_anio_param->DataSource->wp->GetDBValue("1"), $this->s_anio_param->DataSource->ToSQL($this->s_anio_param->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->s_anio_param->DataSource->Where = 
                 $this->s_anio_param->DataSource->wp->Criterion[1];
            $this->s_Id_incidente_param = new clsControl(ccsTextBox, "s_Id_incidente_param", "s_Id_incidente_param", ccsText, "", CCGetRequestParam("s_Id_incidente_param", $Method, NULL), $this);
            $this->s_analista_param1 = new clsControl(ccsListBox, "s_analista_param1", "s_analista_param1", ccsText, "", CCGetRequestParam("s_analista_param1", $Method, NULL), $this);
            $this->s_analista_param1->DSType = dsTable;
            $this->s_analista_param1->DataSource = new clsDBcnDisenio();
            $this->s_analista_param1->ds = & $this->s_analista_param1->DataSource;
            $this->s_analista_param1->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_usuarios {SQL_Where} {SQL_OrderBy}";
            list($this->s_analista_param1->BoundColumn, $this->s_analista_param1->TextColumn, $this->s_analista_param1->DBFormat) = array("Usuario", "Usuario", "");
            $this->s_analista_param1->DataSource->Parameters["expr133"] = "3";
            $this->s_analista_param1->DataSource->wp = new clsSQLParameters();
            $this->s_analista_param1->DataSource->wp->AddParameter("1", "expr133", ccsInteger, "", "", $this->s_analista_param1->DataSource->Parameters["expr133"], "", false);
            $this->s_analista_param1->DataSource->wp->Criterion[1] = $this->s_analista_param1->DataSource->wp->Operation(opEqual, "[Nivel]", $this->s_analista_param1->DataSource->wp->GetDBValue("1"), $this->s_analista_param1->DataSource->ToSQL($this->s_analista_param1->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->s_analista_param1->DataSource->Where = 
                 $this->s_analista_param1->DataSource->wp->Criterion[1];
            $this->s_estado_param = new clsControl(ccsListBox, "s_estado_param", "s_estado_param", ccsText, "", CCGetRequestParam("s_estado_param", $Method, NULL), $this);
            $this->s_estado_param->DSType = dsListOfValues;
            $this->s_estado_param->Values = array(array("Calificado", "Calificados"), array("No Calificado", "No Calificados"));
            $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", $Method, NULL), $this);
            $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->Link1->Page = "IncidentesDetalleMedicion.php";
            $this->Link2 = new clsControl(ccsLink, "Link2", "Link2", ccsText, "", CCGetRequestParam("Link2", $Method, NULL), $this);
            $this->Link2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->Link2->Parameters = CCAddParam($this->Link2->Parameters, "s_mes_param", CCGetFromGet("s_mes_param", NULL));
            $this->Link2->Parameters = CCAddParam($this->Link2->Parameters, "s_anio_param", CCGetFromGet("s_anio_param", NULL));
            $this->Link2->Parameters = CCAddParam($this->Link2->Parameters, "s_cds_param", CCGetFromGet("s_cds_param", NULL));
            $this->Link2->Page = "ReporteIncidentes.php";
            $this->Link3 = new clsControl(ccsLink, "Link3", "Link3", ccsText, "", CCGetRequestParam("Link3", $Method, NULL), $this);
            $this->Link3->Page = "ListaSimpleIncidentes.php";
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_mes_param->Value) && !strlen($this->s_mes_param->Value) && $this->s_mes_param->Value !== false)
                    $this->s_mes_param->SetText(date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))));
                if(!is_array($this->s_anio_param->Value) && !strlen($this->s_anio_param->Value) && $this->s_anio_param->Value !== false)
                    $this->s_anio_param->SetText(date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))));
            }
        }
    }
//End Class_Initialize Event

//Validate Method @2-C111B0D5
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_cds_param->Validate() && $Validation);
        $Validation = ($this->s_mes_param->Validate() && $Validation);
        $Validation = ($this->s_anio_param->Validate() && $Validation);
        $Validation = ($this->s_Id_incidente_param->Validate() && $Validation);
        $Validation = ($this->s_analista_param1->Validate() && $Validation);
        $Validation = ($this->s_estado_param->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_cds_param->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_mes_param->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_anio_param->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Id_incidente_param->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_analista_param1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_estado_param->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-59D1D07F
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_cds_param->Errors->Count());
        $errors = ($errors || $this->s_mes_param->Errors->Count());
        $errors = ($errors || $this->s_anio_param->Errors->Count());
        $errors = ($errors || $this->s_Id_incidente_param->Errors->Count());
        $errors = ($errors || $this->s_analista_param1->Errors->Count());
        $errors = ($errors || $this->s_estado_param->Errors->Count());
        $errors = ($errors || $this->Link1->Errors->Count());
        $errors = ($errors || $this->Link2->Errors->Count());
        $errors = ($errors || $this->Link3->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-DD94EE4C
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

//Show Method @2-E3881041
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

        $this->s_cds_param->Prepare();
        $this->s_mes_param->Prepare();
        $this->s_anio_param->Prepare();
        $this->s_analista_param1->Prepare();
        $this->s_estado_param->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }
        $this->Link3->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link3->Parameters = CCAddParam($this->Link3->Parameters, "export", 1);

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_cds_param->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_mes_param->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_anio_param->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Id_incidente_param->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_analista_param1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_estado_param->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link3->Errors->ToString());
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
        $this->s_cds_param->Show();
        $this->s_mes_param->Show();
        $this->s_anio_param->Show();
        $this->s_Id_incidente_param->Show();
        $this->s_analista_param1->Show();
        $this->s_estado_param->Show();
        $this->Link1->Show();
        $this->Link2->Show();
        $this->Link3->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_info_incidentesSearch Class @2-FCB6E20C

class clsGridmc_info_incidentes { //mc_info_incidentes class @26-075BA89B

//Variables @26-2F859928

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
    public $Sorter_Id_incidente;
    public $Sorter_ServicioNegocio;
    public $Sorter_Aplicacion;
    public $Sorter_FechaNuevo;
    public $Sorter_FechaAsignado;
    public $Sorter_FechaEnCurso;
    public $Sorter_FechaPendiente;
    public $Sorter_FechaResuelto;
    public $Sorter_FechaCerrado;
    public $Sorter1;
//End Variables

//Class_Initialize Event @26-12B5775D
    function clsGridmc_info_incidentes($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_info_incidentes";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_info_incidentes";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_info_incidentesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("mc_info_incidentesOrder", "");
        $this->SorterDirection = CCGetParam("mc_info_incidentesDir", "");

        $this->Id_incidente = new clsControl(ccsLink, "Id_incidente", "Id_incidente", ccsText, "", CCGetRequestParam("Id_incidente", ccsGet, NULL), $this);
        $this->Id_incidente->Page = "IncidenteDetalle.php";
        $this->ServicioNegocio = new clsControl(ccsLabel, "ServicioNegocio", "ServicioNegocio", ccsText, "", CCGetRequestParam("ServicioNegocio", ccsGet, NULL), $this);
        $this->Aplicacion = new clsControl(ccsLabel, "Aplicacion", "Aplicacion", ccsText, "", CCGetRequestParam("Aplicacion", ccsGet, NULL), $this);
        $this->FechaNuevo = new clsControl(ccsLabel, "FechaNuevo", "FechaNuevo", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaNuevo", ccsGet, NULL), $this);
        $this->FechaAsignado = new clsControl(ccsLabel, "FechaAsignado", "FechaAsignado", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaAsignado", ccsGet, NULL), $this);
        $this->FechaEnCurso = new clsControl(ccsLabel, "FechaEnCurso", "FechaEnCurso", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaEnCurso", ccsGet, NULL), $this);
        $this->FechaPendiente = new clsControl(ccsLabel, "FechaPendiente", "FechaPendiente", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaPendiente", ccsGet, NULL), $this);
        $this->FechaResuelto = new clsControl(ccsLabel, "FechaResuelto", "FechaResuelto", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaResuelto", ccsGet, NULL), $this);
        $this->FechaCerrado = new clsControl(ccsLabel, "FechaCerrado", "FechaCerrado", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaCerrado", ccsGet, NULL), $this);
        $this->lblCalificado = new clsControl(ccsLabel, "lblCalificado", "lblCalificado", ccsText, "", CCGetRequestParam("lblCalificado", ccsGet, NULL), $this);
        $this->analista = new clsControl(ccsLabel, "analista", "analista", ccsText, "", CCGetRequestParam("analista", ccsGet, NULL), $this);
        $this->Sorter_Id_incidente = new clsSorter($this->ComponentName, "Sorter_Id_incidente", $FileName, $this);
        $this->Sorter_ServicioNegocio = new clsSorter($this->ComponentName, "Sorter_ServicioNegocio", $FileName, $this);
        $this->Sorter_Aplicacion = new clsSorter($this->ComponentName, "Sorter_Aplicacion", $FileName, $this);
        $this->Sorter_FechaNuevo = new clsSorter($this->ComponentName, "Sorter_FechaNuevo", $FileName, $this);
        $this->Sorter_FechaAsignado = new clsSorter($this->ComponentName, "Sorter_FechaAsignado", $FileName, $this);
        $this->Sorter_FechaEnCurso = new clsSorter($this->ComponentName, "Sorter_FechaEnCurso", $FileName, $this);
        $this->Sorter_FechaPendiente = new clsSorter($this->ComponentName, "Sorter_FechaPendiente", $FileName, $this);
        $this->Sorter_FechaResuelto = new clsSorter($this->ComponentName, "Sorter_FechaResuelto", $FileName, $this);
        $this->Sorter_FechaCerrado = new clsSorter($this->ComponentName, "Sorter_FechaCerrado", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->lblRegistros = new clsControl(ccsLabel, "lblRegistros", "lblRegistros", ccsText, "", CCGetRequestParam("lblRegistros", ccsGet, NULL), $this);
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
        $this->lAnalista = new clsControl(ccsLabel, "lAnalista", "lAnalista", ccsText, "", CCGetRequestParam("lAnalista", ccsGet, NULL), $this);
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

//Show Method @26-7434C7A0
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_Id_incidente_param"] = CCGetFromGet("s_Id_incidente_param", NULL);
        $this->DataSource->Parameters["urls_cds_param"] = CCGetFromGet("s_cds_param", NULL);
        $this->DataSource->Parameters["urls_mes_param"] = CCGetFromGet("s_mes_param", NULL);
        $this->DataSource->Parameters["urls_anio_param"] = CCGetFromGet("s_anio_param", NULL);
        $this->DataSource->Parameters["urls_analista_param1"] = CCGetFromGet("s_analista_param1", NULL);
        $this->DataSource->Parameters["urls_estado_param"] = CCGetFromGet("s_estado_param", NULL);

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
            $this->ControlsVisible["Id_incidente"] = $this->Id_incidente->Visible;
            $this->ControlsVisible["ServicioNegocio"] = $this->ServicioNegocio->Visible;
            $this->ControlsVisible["Aplicacion"] = $this->Aplicacion->Visible;
            $this->ControlsVisible["FechaNuevo"] = $this->FechaNuevo->Visible;
            $this->ControlsVisible["FechaAsignado"] = $this->FechaAsignado->Visible;
            $this->ControlsVisible["FechaEnCurso"] = $this->FechaEnCurso->Visible;
            $this->ControlsVisible["FechaPendiente"] = $this->FechaPendiente->Visible;
            $this->ControlsVisible["FechaResuelto"] = $this->FechaResuelto->Visible;
            $this->ControlsVisible["FechaCerrado"] = $this->FechaCerrado->Visible;
            $this->ControlsVisible["lblCalificado"] = $this->lblCalificado->Visible;
            $this->ControlsVisible["analista"] = $this->analista->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Id_incidente->SetValue($this->DataSource->Id_incidente->GetValue());
                $this->Id_incidente->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Id_incidente->Parameters = CCAddParam($this->Id_incidente->Parameters, "Id_incidente", $this->DataSource->f("Id_incidente"));
                $this->Id_incidente->Parameters = CCAddParam($this->Id_incidente->Parameters, "s_mes_param", $this->DataSource->f("mes"));
                $this->Id_incidente->Parameters = CCAddParam($this->Id_incidente->Parameters, "s_anio_param", $this->DataSource->f("anio"));
                $this->ServicioNegocio->SetValue($this->DataSource->ServicioNegocio->GetValue());
                $this->Aplicacion->SetValue($this->DataSource->Aplicacion->GetValue());
                $this->FechaNuevo->SetValue($this->DataSource->FechaNuevo->GetValue());
                $this->FechaAsignado->SetValue($this->DataSource->FechaAsignado->GetValue());
                $this->FechaEnCurso->SetValue($this->DataSource->FechaEnCurso->GetValue());
                $this->FechaPendiente->SetValue($this->DataSource->FechaPendiente->GetValue());
                $this->FechaResuelto->SetValue($this->DataSource->FechaResuelto->GetValue());
                $this->FechaCerrado->SetValue($this->DataSource->FechaCerrado->GetValue());
                $this->lblCalificado->SetValue($this->DataSource->lblCalificado->GetValue());
                $this->analista->SetValue($this->DataSource->analista->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id_incidente->Show();
                $this->ServicioNegocio->Show();
                $this->Aplicacion->Show();
                $this->FechaNuevo->Show();
                $this->FechaAsignado->Show();
                $this->FechaEnCurso->Show();
                $this->FechaPendiente->Show();
                $this->FechaResuelto->Show();
                $this->FechaCerrado->Show();
                $this->lblCalificado->Show();
                $this->analista->Show();
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
        if(!is_array($this->lAnalista->Value) && !strlen($this->lAnalista->Value) && $this->lAnalista->Value !== false)
            $this->lAnalista->SetText("Analista");
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator->TotalPages <= 1 && $this->Navigator->PageNumber == 1) || $this->Navigator->PageSize == "") {
            $this->Navigator->Visible = false;
        }
        $this->Sorter_Id_incidente->Show();
        $this->Sorter_ServicioNegocio->Show();
        $this->Sorter_Aplicacion->Show();
        $this->Sorter_FechaNuevo->Show();
        $this->Sorter_FechaAsignado->Show();
        $this->Sorter_FechaEnCurso->Show();
        $this->Sorter_FechaPendiente->Show();
        $this->Sorter_FechaResuelto->Show();
        $this->Sorter_FechaCerrado->Show();
        $this->Navigator->Show();
        $this->lblRegistros->Show();
        $this->Sorter1->Show();
        $this->lAnalista->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @26-58534517
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Id_incidente->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ServicioNegocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Aplicacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaNuevo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaAsignado->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaEnCurso->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaPendiente->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaResuelto->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaCerrado->Errors->ToString());
        $errors = ComposeStrings($errors, $this->lblCalificado->Errors->ToString());
        $errors = ComposeStrings($errors, $this->analista->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_info_incidentes Class @26-FCB6E20C

class clsmc_info_incidentesDataSource extends clsDBcnDisenio {  //mc_info_incidentesDataSource Class @26-AFE708D3

//DataSource Variables @26-381B0B88
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Id_incidente;
    public $ServicioNegocio;
    public $Aplicacion;
    public $FechaNuevo;
    public $FechaAsignado;
    public $FechaEnCurso;
    public $FechaPendiente;
    public $FechaResuelto;
    public $FechaCerrado;
    public $lblCalificado;
    public $analista;
//End DataSource Variables

//DataSourceClass_Initialize Event @26-E280AD45
    function clsmc_info_incidentesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_info_incidentes";
        $this->Initialize();
        $this->Id_incidente = new clsField("Id_incidente", ccsText, "");
        
        $this->ServicioNegocio = new clsField("ServicioNegocio", ccsText, "");
        
        $this->Aplicacion = new clsField("Aplicacion", ccsText, "");
        
        $this->FechaNuevo = new clsField("FechaNuevo", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaAsignado = new clsField("FechaAsignado", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaEnCurso = new clsField("FechaEnCurso", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaPendiente = new clsField("FechaPendiente", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaResuelto = new clsField("FechaResuelto", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaCerrado = new clsField("FechaCerrado", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->lblCalificado = new clsField("lblCalificado", ccsText, "");
        
        $this->analista = new clsField("analista", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @26-F3A33ADB
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Id_incidente" => array("Id_incidente", ""), 
            "Sorter_ServicioNegocio" => array("ServicioNegocio", ""), 
            "Sorter_Aplicacion" => array("Aplicacion", ""), 
            "Sorter_FechaNuevo" => array("FechaNuevo", ""), 
            "Sorter_FechaAsignado" => array("FechaAsignado", ""), 
            "Sorter_FechaEnCurso" => array("FechaEnCurso", ""), 
            "Sorter_FechaPendiente" => array("FechaPendiente", ""), 
            "Sorter_FechaResuelto" => array("FechaResuelto", ""), 
            "Sorter_FechaCerrado" => array("FechaCerrado", ""), 
            "Sorter1" => array("Estado", "")));
    }
//End SetOrder Method

//Prepare Method @26-46ADFD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_Id_incidente_param", ccsText, "", "", $this->Parameters["urls_Id_incidente_param"], "", false);
        $this->wp->AddParameter("2", "urls_cds_param", ccsInteger, "", "", $this->Parameters["urls_cds_param"], 0, false);
        $this->wp->AddParameter("3", "urls_mes_param", ccsInteger, "", "", $this->Parameters["urls_mes_param"], date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))), false);
        $this->wp->AddParameter("4", "urls_anio_param", ccsText, "", "", $this->Parameters["urls_anio_param"], date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))), false);
        $this->wp->AddParameter("5", "urls_analista_param1", ccsText, "", "", $this->Parameters["urls_analista_param1"], "", false);
        $this->wp->AddParameter("6", "urls_estado_param", ccsText, "", "", $this->Parameters["urls_estado_param"], "", false);
    }
//End Prepare Method

//Open Method @26-66B0EC6C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select mci.Id_incidente ,mci.ServicioNegocio ,mci.Aplicacion ,mci.FechaNuevo ,mci.FechaAsignado ,mci.FechaEnCurso ,mci.FechaPendiente ,mci.FechaResuelto ,mci.FechaCerrado, mcu.analista,\n" .
        "(CASE WHEN (SELECT COUNT(id_incidente) from  mc_calificacion_incidentes_MC where id_incidente = mcu.Numero and MesReporte=mcu.mes and Anioreporte=mcu.anio and id_proveedor=mcu.Id_Proveedor)>0 THEN 'Calificado' ELSE 'No Calificado' END  ) as Estado,\n" .
        "mcu.mes, mcu.anio \n" .
        "from mc_universo_cds mcu \n" .
        "	inner join  mc_info_incidentes mci on mci.id_incidente=mcu.Numero  and month(mci.FechaCarga)= mcu.mes and YEAR(mci.FechaCarga ) = mcu.anio\n" .
        "where mcu.tipo='IN'\n" .
        "and (id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " OR " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0  )\n" .
        "and (mes=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "and anio=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "\n" .
        "and (mcu.analista='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "' OR '" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "'=''  ) \n" .
        "and Id_incidente like '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "and ((CASE WHEN (SELECT COUNT(id_incidente) from  mc_calificacion_incidentes_MC where id_incidente = mcu.Numero and MesReporte=mcu.mes and Anioreporte=mcu.anio and id_proveedor=mcu.Id_Proveedor)>0 THEN 'Calificado' ELSE 'No Calificado' END  )='" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "' or '" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "'='' )\n" .
        ") cnt";
        $this->SQL = "select mci.Id_incidente ,mci.ServicioNegocio ,mci.Aplicacion ,mci.FechaNuevo ,mci.FechaAsignado ,mci.FechaEnCurso ,mci.FechaPendiente ,mci.FechaResuelto ,mci.FechaCerrado, mcu.analista,\n" .
        "(CASE WHEN (SELECT COUNT(id_incidente) from  mc_calificacion_incidentes_MC where id_incidente = mcu.Numero and MesReporte=mcu.mes and Anioreporte=mcu.anio and id_proveedor=mcu.Id_Proveedor)>0 THEN 'Calificado' ELSE 'No Calificado' END  ) as Estado,\n" .
        "mcu.mes, mcu.anio \n" .
        "from mc_universo_cds mcu \n" .
        "	inner join  mc_info_incidentes mci on mci.id_incidente=mcu.Numero  and month(mci.FechaCarga)= mcu.mes and YEAR(mci.FechaCarga ) = mcu.anio\n" .
        "where mcu.tipo='IN'\n" .
        "and (id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " OR " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0  )\n" .
        "and (mes=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "and anio=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "\n" .
        "and (mcu.analista='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "' OR '" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "'=''  ) \n" .
        "and Id_incidente like '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "and ((CASE WHEN (SELECT COUNT(id_incidente) from  mc_calificacion_incidentes_MC where id_incidente = mcu.Numero and MesReporte=mcu.mes and Anioreporte=mcu.anio and id_proveedor=mcu.Id_Proveedor)>0 THEN 'Calificado' ELSE 'No Calificado' END  )='" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "' or '" . $this->SQLValue($this->wp->GetDBValue("6"), ccsText) . "'='' )\n" .
        "";
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

//SetValues Method @26-D59BB89C
    function SetValues()
    {
        $this->Id_incidente->SetDBValue($this->f("Id_incidente"));
        $this->ServicioNegocio->SetDBValue($this->f("ServicioNegocio"));
        $this->Aplicacion->SetDBValue($this->f("Aplicacion"));
        $this->FechaNuevo->SetDBValue(trim($this->f("FechaNuevo")));
        $this->FechaAsignado->SetDBValue(trim($this->f("FechaAsignado")));
        $this->FechaEnCurso->SetDBValue(trim($this->f("FechaEnCurso")));
        $this->FechaPendiente->SetDBValue(trim($this->f("FechaPendiente")));
        $this->FechaResuelto->SetDBValue(trim($this->f("FechaResuelto")));
        $this->FechaCerrado->SetDBValue(trim($this->f("FechaCerrado")));
        $this->lblCalificado->SetDBValue($this->f("Estado"));
        $this->analista->SetDBValue($this->f("analista"));
    }
//End SetValues Method

} //End mc_info_incidentesDataSource Class @26-FCB6E20C

//Include Page implementation @136-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

//Initialize Page @1-302DC9A3
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
$TemplateFileName = "IncidentesLista.html";
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

//Include events file @1-135233AE
include_once("./IncidentesLista_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-AA513ACD
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$mc_info_incidentesSearch = new clsRecordmc_info_incidentesSearch("", $MainPage);
$mc_info_incidentes = new clsGridmc_info_incidentes("", $MainPage);
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$MainPage->mc_info_incidentesSearch = & $mc_info_incidentesSearch;
$MainPage->mc_info_incidentes = & $mc_info_incidentes;
$MainPage->Header = & $Header;
$mc_info_incidentes->Initialize();
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

//Execute Components @1-F5FF4D86
$Header->Operations();
$mc_info_incidentesSearch->Operation();
//End Execute Components

//Go to destination page @1-46F91559
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($mc_info_incidentesSearch);
    unset($mc_info_incidentes);
    $Header->Class_Terminate();
    unset($Header);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E1A9E962
$mc_info_incidentesSearch->Show();
$mc_info_incidentes->Show();
$Header->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-320DCC29
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($mc_info_incidentesSearch);
unset($mc_info_incidentes);
$Header->Class_Terminate();
unset($Header);
unset($Tpl);
//End Unload Page


?>
