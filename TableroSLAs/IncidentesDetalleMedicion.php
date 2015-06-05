<?php
//Include Common Files @1-3E2E87A4
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "IncidentesDetalleMedicion.php");
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

//Class_Initialize Event @2-6736DA55
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
            $this->s_anio_param = new clsControl(ccsListBox, "s_anio_param", "s_anio_param", ccsText, "", CCGetRequestParam("s_anio_param", $Method, NULL), $this);
            $this->s_anio_param->DSType = dsTable;
            $this->s_anio_param->DataSource = new clsDBcnDisenio();
            $this->s_anio_param->ds = & $this->s_anio_param->DataSource;
            $this->s_anio_param->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_anio_param->BoundColumn, $this->s_anio_param->TextColumn, $this->s_anio_param->DBFormat) = array("Ano", "Ano", "");
            $this->s_Id_incidente_param = new clsControl(ccsTextBox, "s_Id_incidente_param", "s_Id_incidente_param", ccsText, "", CCGetRequestParam("s_Id_incidente_param", $Method, NULL), $this);
            $this->s_mes_param = new clsControl(ccsListBox, "s_mes_param", "s_mes_param", ccsText, "", CCGetRequestParam("s_mes_param", $Method, NULL), $this);
            $this->s_mes_param->DSType = dsTable;
            $this->s_mes_param->DataSource = new clsDBcnDisenio();
            $this->s_mes_param->ds = & $this->s_mes_param->DataSource;
            $this->s_mes_param->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_mes_param->BoundColumn, $this->s_mes_param->TextColumn, $this->s_mes_param->DBFormat) = array("IdMes", "Mes", "");
            $this->s_analista_param = new clsControl(ccsListBox, "s_analista_param", "s_analista_param", ccsText, "", CCGetRequestParam("s_analista_param", $Method, NULL), $this);
            $this->s_analista_param->DSType = dsTable;
            $this->s_analista_param->DataSource = new clsDBcnDisenio();
            $this->s_analista_param->ds = & $this->s_analista_param->DataSource;
            $this->s_analista_param->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_usuarios {SQL_Where} {SQL_OrderBy}";
            list($this->s_analista_param->BoundColumn, $this->s_analista_param->TextColumn, $this->s_analista_param->DBFormat) = array("Usuario", "Usuario", "");
            $this->s_analista_param->DataSource->Parameters["expr191"] = "3";
            $this->s_analista_param->DataSource->wp = new clsSQLParameters();
            $this->s_analista_param->DataSource->wp->AddParameter("1", "expr191", ccsInteger, "", "", $this->s_analista_param->DataSource->Parameters["expr191"], "", false);
            $this->s_analista_param->DataSource->wp->Criterion[1] = $this->s_analista_param->DataSource->wp->Operation(opEqual, "[Nivel]", $this->s_analista_param->DataSource->wp->GetDBValue("1"), $this->s_analista_param->DataSource->ToSQL($this->s_analista_param->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->s_analista_param->DataSource->Where = 
                 $this->s_analista_param->DataSource->wp->Criterion[1];
            $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", $Method, NULL), $this);
            $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->Link1->Page = "IncidentesDetalleNS.php";
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_anio_param->Value) && !strlen($this->s_anio_param->Value) && $this->s_anio_param->Value !== false)
                    $this->s_anio_param->SetText(date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))));
                if(!is_array($this->s_mes_param->Value) && !strlen($this->s_mes_param->Value) && $this->s_mes_param->Value !== false)
                    $this->s_mes_param->SetText(date("m",mktime(0,0,0,date("m")-1,date("d"),date("Y"))));
            }
        }
    }
//End Class_Initialize Event

//Validate Method @2-A44ACA64
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_cds_param->Validate() && $Validation);
        $Validation = ($this->s_anio_param->Validate() && $Validation);
        $Validation = ($this->s_Id_incidente_param->Validate() && $Validation);
        $Validation = ($this->s_mes_param->Validate() && $Validation);
        $Validation = ($this->s_analista_param->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_cds_param->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_anio_param->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Id_incidente_param->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_mes_param->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_analista_param->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-075D15EE
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_cds_param->Errors->Count());
        $errors = ($errors || $this->s_anio_param->Errors->Count());
        $errors = ($errors || $this->s_Id_incidente_param->Errors->Count());
        $errors = ($errors || $this->s_mes_param->Errors->Count());
        $errors = ($errors || $this->s_analista_param->Errors->Count());
        $errors = ($errors || $this->Link1->Errors->Count());
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

//Show Method @2-CECBAB4F
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
        $this->s_anio_param->Prepare();
        $this->s_mes_param->Prepare();
        $this->s_analista_param->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_cds_param->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_anio_param->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Id_incidente_param->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_mes_param->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_analista_param->Errors->ToString());
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
        $this->s_cds_param->Show();
        $this->s_anio_param->Show();
        $this->s_Id_incidente_param->Show();
        $this->s_mes_param->Show();
        $this->s_analista_param->Show();
        $this->Link1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_info_incidentesSearch Class @2-FCB6E20C

class clsGridmc_info_incidentes { //mc_info_incidentes class @26-075BA89B

//Variables @26-CB6A3E02

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
//End Variables

//Class_Initialize Event @26-1762EF12
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
        $this->Severidad = new clsControl(ccsLabel, "Severidad", "Severidad", ccsText, "", CCGetRequestParam("Severidad", ccsGet, NULL), $this);
        $this->RegistroAVL = new clsControl(ccsLabel, "RegistroAVL", "RegistroAVL", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("RegistroAVL", ccsGet, NULL), $this);
        $this->Cumple_Inc_TiempoAsignacion = new clsControl(ccsImage, "Cumple_Inc_TiempoAsignacion", "Cumple_Inc_TiempoAsignacion", ccsInteger, "", CCGetRequestParam("Cumple_Inc_TiempoAsignacion", ccsGet, NULL), $this);
        $this->Cumple_Inc_TiempoSolucion = new clsControl(ccsImage, "Cumple_Inc_TiempoSolucion", "Cumple_Inc_TiempoSolucion", ccsInteger, "", CCGetRequestParam("Cumple_Inc_TiempoSolucion", ccsGet, NULL), $this);
        $this->Cumple_DISP_SOPORTE = new clsControl(ccsImage, "Cumple_DISP_SOPORTE", "Cumple_DISP_SOPORTE", ccsInteger, "", CCGetRequestParam("Cumple_DISP_SOPORTE", ccsGet, NULL), $this);
        $this->Obs_Manuales = new clsControl(ccsLabel, "Obs_Manuales", "Obs_Manuales", ccsMemo, "", CCGetRequestParam("Obs_Manuales", ccsGet, NULL), $this);
        $this->Estado = new clsControl(ccsLabel, "Estado", "Estado", ccsText, "", CCGetRequestParam("Estado", ccsGet, NULL), $this);
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
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink1->Page = "";
        $this->ImageLink1->Visible = false;
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

//Show Method @26-5F9925E1
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
        $this->DataSource->Parameters["urls_analista_param"] = CCGetFromGet("s_analista_param", NULL);

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
            $this->ControlsVisible["Severidad"] = $this->Severidad->Visible;
            $this->ControlsVisible["RegistroAVL"] = $this->RegistroAVL->Visible;
            $this->ControlsVisible["Cumple_Inc_TiempoAsignacion"] = $this->Cumple_Inc_TiempoAsignacion->Visible;
            $this->ControlsVisible["Cumple_Inc_TiempoSolucion"] = $this->Cumple_Inc_TiempoSolucion->Visible;
            $this->ControlsVisible["Cumple_DISP_SOPORTE"] = $this->Cumple_DISP_SOPORTE->Visible;
            $this->ControlsVisible["Obs_Manuales"] = $this->Obs_Manuales->Visible;
            $this->ControlsVisible["Estado"] = $this->Estado->Visible;
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
                $this->ServicioNegocio->SetValue($this->DataSource->ServicioNegocio->GetValue());
                $this->Aplicacion->SetValue($this->DataSource->Aplicacion->GetValue());
                $this->FechaNuevo->SetValue($this->DataSource->FechaNuevo->GetValue());
                $this->FechaAsignado->SetValue($this->DataSource->FechaAsignado->GetValue());
                $this->FechaEnCurso->SetValue($this->DataSource->FechaEnCurso->GetValue());
                $this->FechaPendiente->SetValue($this->DataSource->FechaPendiente->GetValue());
                $this->FechaResuelto->SetValue($this->DataSource->FechaResuelto->GetValue());
                $this->FechaCerrado->SetValue($this->DataSource->FechaCerrado->GetValue());
                $this->Severidad->SetValue($this->DataSource->Severidad->GetValue());
                $this->RegistroAVL->SetValue($this->DataSource->RegistroAVL->GetValue());
                $this->Cumple_Inc_TiempoAsignacion->SetValue($this->DataSource->Cumple_Inc_TiempoAsignacion->GetValue());
                $this->Cumple_Inc_TiempoSolucion->SetValue($this->DataSource->Cumple_Inc_TiempoSolucion->GetValue());
                $this->Cumple_DISP_SOPORTE->SetValue($this->DataSource->Cumple_DISP_SOPORTE->GetValue());
                $this->Obs_Manuales->SetValue($this->DataSource->Obs_Manuales->GetValue());
                $this->Estado->SetValue($this->DataSource->Estado->GetValue());
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
                $this->Severidad->Show();
                $this->RegistroAVL->Show();
                $this->Cumple_Inc_TiempoAsignacion->Show();
                $this->Cumple_Inc_TiempoSolucion->Show();
                $this->Cumple_DISP_SOPORTE->Show();
                $this->Obs_Manuales->Show();
                $this->Estado->Show();
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
        $this->ImageLink1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @26-E15D8B85
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
        $errors = ComposeStrings($errors, $this->Severidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RegistroAVL->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumple_Inc_TiempoAsignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumple_Inc_TiempoSolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumple_DISP_SOPORTE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Obs_Manuales->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Estado->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_info_incidentes Class @26-FCB6E20C

class clsmc_info_incidentesDataSource extends clsDBcnDisenio {  //mc_info_incidentesDataSource Class @26-AFE708D3

//DataSource Variables @26-2FE762F0
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
    public $Severidad;
    public $RegistroAVL;
    public $Cumple_Inc_TiempoAsignacion;
    public $Cumple_Inc_TiempoSolucion;
    public $Cumple_DISP_SOPORTE;
    public $Obs_Manuales;
    public $Estado;
//End DataSource Variables

//DataSourceClass_Initialize Event @26-FF7665C4
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
        
        $this->Severidad = new clsField("Severidad", ccsText, "");
        
        $this->RegistroAVL = new clsField("RegistroAVL", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->Cumple_Inc_TiempoAsignacion = new clsField("Cumple_Inc_TiempoAsignacion", ccsInteger, "");
        
        $this->Cumple_Inc_TiempoSolucion = new clsField("Cumple_Inc_TiempoSolucion", ccsInteger, "");
        
        $this->Cumple_DISP_SOPORTE = new clsField("Cumple_DISP_SOPORTE", ccsInteger, "");
        
        $this->Obs_Manuales = new clsField("Obs_Manuales", ccsMemo, "");
        
        $this->Estado = new clsField("Estado", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @26-49EA09B1
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
            "Sorter_FechaCerrado" => array("FechaCerrado", "")));
    }
//End SetOrder Method

//Prepare Method @26-8FCCD174
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_Id_incidente_param", ccsText, "", "", $this->Parameters["urls_Id_incidente_param"], "", false);
        $this->wp->AddParameter("2", "urls_cds_param", ccsInteger, "", "", $this->Parameters["urls_cds_param"], 0, false);
        $this->wp->AddParameter("3", "urls_mes_param", ccsInteger, "", "", $this->Parameters["urls_mes_param"], date("m",mktime(0,0,0,date("m")-1,date("d"),date("Y"))), false);
        $this->wp->AddParameter("4", "urls_anio_param", ccsText, "", "", $this->Parameters["urls_anio_param"], date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))), false);
        $this->wp->AddParameter("5", "urls_analista_param", ccsText, "", "", $this->Parameters["urls_analista_param"], "", false);
    }
//End Prepare Method

//Open Method @26-62C7A68B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select mci.Id_incidente ,mci.ServicioNegocio ,mci.Aplicacion ,mci.FechaNuevo ,mci.FechaAsignado ,mci.FechaEnCurso ,mci.FechaPendiente ,mci.FechaResuelto ,mci.FechaCerrado, mc.severidad ,\n" .
        "(select top 1 FechaInicioMov from mc_detalle_incidente_avl where Id_Incidente=mci.Id_incidente order by paquete,clavemovimiento ) as RegistroAVL,\n" .
        "Cumple_Inc_TiempoAsignacion ,Cumple_Inc_TiempoSolucion ,Cumple_DISP_SOPORTE ,mc.Obs_Manuales , mci.Estado, mcu.analista \n" .
        "from mc_universo_cds mcu inner join  mc_info_incidentes mci\n" .
        "on mci.id_incidente=mcu.Numero and month(mci.FechaCarga) = mcu.mes and YEAR(mci.FechaCarga )= mcu.anio \n" .
        "inner join mc_calificacion_incidentes_MC mc on mc.id_incidente =mci.Id_incidente  \n" .
        "where mcu.tipo='IN'\n" .
        "and mcu.mes=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "and mcu.anio=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "\n" .
        "and (mcu.analista='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "' OR '" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "'=''  ) \n" .
        "and ((mcu.id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ") or (" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0))\n" .
        "and mci.Id_incidente like '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        ") cnt";
        $this->SQL = "select TOP {SqlParam_endRecord} mci.Id_incidente ,mci.ServicioNegocio ,mci.Aplicacion ,mci.FechaNuevo ,mci.FechaAsignado ,mci.FechaEnCurso ,mci.FechaPendiente ,mci.FechaResuelto ,mci.FechaCerrado, mc.severidad ,\n" .
        "(select top 1 FechaInicioMov from mc_detalle_incidente_avl where Id_Incidente=mci.Id_incidente order by paquete,clavemovimiento ) as RegistroAVL,\n" .
        "Cumple_Inc_TiempoAsignacion ,Cumple_Inc_TiempoSolucion ,Cumple_DISP_SOPORTE ,mc.Obs_Manuales , mci.Estado, mcu.analista \n" .
        "from mc_universo_cds mcu inner join  mc_info_incidentes mci\n" .
        "on mci.id_incidente=mcu.Numero and month(mci.FechaCarga) = mcu.mes and YEAR(mci.FechaCarga )= mcu.anio \n" .
        "inner join mc_calificacion_incidentes_MC mc on mc.id_incidente =mci.Id_incidente  \n" .
        "where mcu.tipo='IN'\n" .
        "and mcu.mes=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "and mcu.anio=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "\n" .
        "and (mcu.analista='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "' OR '" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "'=''  ) \n" .
        "and ((mcu.id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ") or (" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0))\n" .
        "and mci.Id_incidente like '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
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

//SetValues Method @26-0BD33E58
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
        $this->Severidad->SetDBValue($this->f("severidad"));
        $this->RegistroAVL->SetDBValue(trim($this->f("RegistroAVL")));
        $this->Cumple_Inc_TiempoAsignacion->SetDBValue(trim($this->f("Cumple_Inc_TiempoAsignacion")));
        $this->Cumple_Inc_TiempoSolucion->SetDBValue(trim($this->f("Cumple_Inc_TiempoSolucion")));
        $this->Cumple_DISP_SOPORTE->SetDBValue(trim($this->f("Cumple_DISP_SOPORTE")));
        $this->Obs_Manuales->SetDBValue($this->f("Obs_Manuales"));
        $this->Estado->SetDBValue($this->f("Estado"));
    }
//End SetValues Method

} //End mc_info_incidentesDataSource Class @26-FCB6E20C

//Include Page implementation @165-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

//Initialize Page @1-D94C52E6
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
$TemplateFileName = "IncidentesDetalleMedicion.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-9507B6CD
include_once("./IncidentesDetalleMedicion_events.php");
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
