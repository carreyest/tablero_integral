<?php
//Include Common Files @1-4BE196F0
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "SLAsCAPCDetalle.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_calificacion_capc { //mc_calificacion_capc Class @3-0A320629

//Variables @3-9E315808

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

//Class_Initialize Event @3-A2A48833
    function clsRecordmc_calificacion_capc($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_calificacion_capc/Error";
        $this->DataSource = new clsmc_calificacion_capcDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_calificacion_capc";
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
            $this->id_proveedor = new clsControl(ccsHidden, "id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->id_proveedor->Required = true;
            $this->numero = new clsControl(ccsTextBox, "numero", "Numero", ccsText, "", CCGetRequestParam("numero", $Method, NULL), $this);
            $this->numero->Required = true;
            $this->Descripcion = new clsControl(ccsTextBox, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", $Method, NULL), $this);
            $this->mes = new clsControl(ccsListBox, "mes", "Mes", ccsInteger, "", CCGetRequestParam("mes", $Method, NULL), $this);
            $this->mes->DSType = dsTable;
            $this->mes->DataSource = new clsDBcnDisenio();
            $this->mes->ds = & $this->mes->DataSource;
            $this->mes->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->mes->BoundColumn, $this->mes->TextColumn, $this->mes->DBFormat) = array("IdMes", "Mes", "");
            $this->mes->Required = true;
            $this->anio = new clsControl(ccsListBox, "anio", "Anio", ccsInteger, "", CCGetRequestParam("anio", $Method, NULL), $this);
            $this->anio->DSType = dsTable;
            $this->anio->DataSource = new clsDBcnDisenio();
            $this->anio->ds = & $this->anio->DataSource;
            $this->anio->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->anio->BoundColumn, $this->anio->TextColumn, $this->anio->DBFormat) = array("Ano", "Ano", "");
            $this->anio->Required = true;
            $this->Agrupador = new clsControl(ccsTextBox, "Agrupador", "Agrupador", ccsText, "", CCGetRequestParam("Agrupador", $Method, NULL), $this);
            $this->DEDUC_OMISION = new clsControl(ccsListBox, "DEDUC_OMISION", "DEDUC OMISION", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("DEDUC_OMISION", $Method, NULL), $this);
            $this->DEDUC_OMISION->DSType = dsListOfValues;
            $this->DEDUC_OMISION->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->EFIC_PRESUP = new clsControl(ccsListBox, "EFIC_PRESUP", "EFIC PRESUP", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("EFIC_PRESUP", $Method, NULL), $this);
            $this->EFIC_PRESUP->DSType = dsListOfValues;
            $this->EFIC_PRESUP->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->RETR_ENTREGABLE = new clsControl(ccsListBox, "RETR_ENTREGABLE", "RETR ENTREGABLE", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("RETR_ENTREGABLE", $Method, NULL), $this);
            $this->RETR_ENTREGABLE->DSType = dsListOfValues;
            $this->RETR_ENTREGABLE->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->CALIDAD_PROD_TERM = new clsControl(ccsListBox, "CALIDAD_PROD_TERM", "CALIDAD PROD TERM", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("CALIDAD_PROD_TERM", $Method, NULL), $this);
            $this->CALIDAD_PROD_TERM->DSType = dsListOfValues;
            $this->CALIDAD_PROD_TERM->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->txtEntregableCalidad = new clsControl(ccsTextArea, "txtEntregableCalidad", "txtEntregableCalidad", ccsText, "", CCGetRequestParam("txtEntregableCalidad", $Method, NULL), $this);
            $this->Hallazgos = new clsControl(ccsTextBox, "Hallazgos", "Hallazgos", ccsText, "", CCGetRequestParam("Hallazgos", $Method, NULL), $this);
            $this->DetalleCalidad = new clsControl(ccsTextArea, "DetalleCalidad", "DetalleCalidad", ccsText, "", CCGetRequestParam("DetalleCalidad", $Method, NULL), $this);
            $this->txtEntregableEF = new clsControl(ccsTextArea, "txtEntregableEF", "txtEntregableEF", ccsText, "", CCGetRequestParam("txtEntregableEF", $Method, NULL), $this);
            $this->DetalleEficPres = new clsControl(ccsTextArea, "DetalleEficPres", "DetalleEficPres", ccsText, "", CCGetRequestParam("DetalleEficPres", $Method, NULL), $this);
            $this->UnidadesAnteriores = new clsControl(ccsTextBox, "UnidadesAnteriores", "UnidadesAnteriores", ccsText, "", CCGetRequestParam("UnidadesAnteriores", $Method, NULL), $this);
            $this->UnidadesActuales = new clsControl(ccsTextBox, "UnidadesActuales", "UnidadesActuales", ccsText, "", CCGetRequestParam("UnidadesActuales", $Method, NULL), $this);
            $this->URLEntregables = new clsControl(ccsTextBox, "URLEntregables", "URLEntregables", ccsText, "", CCGetRequestParam("URLEntregables", $Method, NULL), $this);
            $this->Defectos = new clsControl(ccsTextBox, "Defectos", "Defectos", ccsText, "", CCGetRequestParam("Defectos", $Method, NULL), $this);
            $this->Deductiva = new clsControl(ccsTextBox, "Deductiva", "Deductiva", ccsText, "", CCGetRequestParam("Deductiva", $Method, NULL), $this);
            $this->HallazgosSinSev = new clsControl(ccsTextBox, "HallazgosSinSev", "HallazgosSinSev", ccsText, "", CCGetRequestParam("HallazgosSinSev", $Method, NULL), $this);
            $this->HallazgosAlta = new clsControl(ccsTextBox, "HallazgosAlta", "HallazgosAlta", ccsText, "", CCGetRequestParam("HallazgosAlta", $Method, NULL), $this);
            $this->HallazgosMedia = new clsControl(ccsTextBox, "HallazgosMedia", "HallazgosMedia", ccsInteger, "", CCGetRequestParam("HallazgosMedia", $Method, NULL), $this);
            $this->RevisionPares = new clsControl(ccsCheckBox, "RevisionPares", "RevisionPares", ccsInteger, "", CCGetRequestParam("RevisionPares", $Method, NULL), $this);
            $this->RevisionPares->CheckedValue = $this->RevisionPares->GetParsedValue(1);
            $this->RevisionPares->UncheckedValue = $this->RevisionPares->GetParsedValue(0);
            $this->CAPFirmada = new clsControl(ccsCheckBox, "CAPFirmada", "CAPFirmada", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("CAPFirmada", $Method, NULL), $this);
            $this->CAPFirmada->CheckedValue = true;
            $this->CAPFirmada->UncheckedValue = false;
            $this->FechaFirmaCAES = new clsControl(ccsTextBox, "FechaFirmaCAES", "FechaFirmaCAES", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("FechaFirmaCAES", $Method, NULL), $this);
            $this->DiasRetrasoHabiles = new clsControl(ccsTextBox, "DiasRetrasoHabiles", "DiasRetrasoHabiles", ccsInteger, "", CCGetRequestParam("DiasRetrasoHabiles", $Method, NULL), $this);
            $this->DiasRetrasoNaturales = new clsControl(ccsTextBox, "DiasRetrasoNaturales", "DiasRetrasoNaturales", ccsInteger, "", CCGetRequestParam("DiasRetrasoNaturales", $Method, NULL), $this);
            $this->PctMaximo = new clsControl(ccsTextBox, "PctMaximo", "PctMaximo", ccsFloat, "", CCGetRequestParam("PctMaximo", $Method, NULL), $this);
            $this->PctCalidad = new clsControl(ccsTextBox, "PctCalidad", "PctCalidad", ccsFloat, array(False, 2, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("PctCalidad", $Method, NULL), $this);
            $this->DiasPlaneados = new clsControl(ccsTextBox, "DiasPlaneados", "DiasPlaneados", ccsInteger, "", CCGetRequestParam("DiasPlaneados", $Method, NULL), $this);
            $this->DiasReales = new clsControl(ccsTextBox, "DiasReales", "DiasReales", ccsInteger, "", CCGetRequestParam("DiasReales", $Method, NULL), $this);
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsText, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->IdEstimacion = new clsControl(ccsTextBox, "IdEstimacion", "IdEstimacion", ccsText, "", CCGetRequestParam("IdEstimacion", $Method, NULL), $this);
            $this->id_tipo = new clsControl(ccsListBox, "id_tipo", "id_tipo", ccsText, "", CCGetRequestParam("id_tipo", $Method, NULL), $this);
            $this->id_tipo->DSType = dsTable;
            $this->id_tipo->DataSource = new clsDBcnDisenio();
            $this->id_tipo->ds = & $this->id_tipo->DataSource;
            $this->id_tipo->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_TipoPPMC {SQL_Where} {SQL_OrderBy}";
            list($this->id_tipo->BoundColumn, $this->id_tipo->TextColumn, $this->id_tipo->DBFormat) = array("Id", "Descripcion", "");
            $this->SLO = new clsControl(ccsCheckBox, "SLO", "SLO", ccsInteger, "", CCGetRequestParam("SLO", $Method, NULL), $this);
            $this->SLO->CheckedValue = $this->SLO->GetParsedValue(1);
            $this->SLO->UncheckedValue = $this->SLO->GetParsedValue(0);
            $this->id_servicionegocio = new clsControl(ccsListBox, "id_servicionegocio", "Servicio de Negocio", ccsInteger, "", CCGetRequestParam("id_servicionegocio", $Method, NULL), $this);
            $this->id_servicionegocio->DSType = dsTable;
            $this->id_servicionegocio->DataSource = new clsDBcnDisenio();
            $this->id_servicionegocio->ds = & $this->id_servicionegocio->DataSource;
            $this->id_servicionegocio->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_servicio {SQL_Where} {SQL_OrderBy}";
            list($this->id_servicionegocio->BoundColumn, $this->id_servicionegocio->TextColumn, $this->id_servicionegocio->DBFormat) = array("id_servicio", "nombre", "");
            $this->id_servicionegocio->DataSource->Parameters["expr98"] = 1;
            $this->id_servicionegocio->DataSource->Parameters["expr99"] = 2;
            $this->id_servicionegocio->DataSource->wp = new clsSQLParameters();
            $this->id_servicionegocio->DataSource->wp->AddParameter("1", "expr98", ccsInteger, "", "", $this->id_servicionegocio->DataSource->Parameters["expr98"], "", false);
            $this->id_servicionegocio->DataSource->wp->AddParameter("2", "expr99", ccsInteger, "", "", $this->id_servicionegocio->DataSource->Parameters["expr99"], "", false);
            $this->id_servicionegocio->DataSource->wp->Criterion[1] = $this->id_servicionegocio->DataSource->wp->Operation(opEqual, "id_tipo_servicio", $this->id_servicionegocio->DataSource->wp->GetDBValue("1"), $this->id_servicionegocio->DataSource->ToSQL($this->id_servicionegocio->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->id_servicionegocio->DataSource->wp->Criterion[2] = $this->id_servicionegocio->DataSource->wp->Operation(opEqual, "id_tipo_servicio", $this->id_servicionegocio->DataSource->wp->GetDBValue("2"), $this->id_servicionegocio->DataSource->ToSQL($this->id_servicionegocio->DataSource->wp->GetDBValue("2"), ccsInteger),false);
            $this->id_servicionegocio->DataSource->Where = $this->id_servicionegocio->DataSource->wp->opOR(
                 false, 
                 $this->id_servicionegocio->DataSource->wp->Criterion[1], 
                 $this->id_servicionegocio->DataSource->wp->Criterion[2]);
            $this->id_servicionegocio->Required = true;
            $this->id_serviciocont = new clsControl(ccsListBox, "id_serviciocont", "Servicio Contractual", ccsInteger, "", CCGetRequestParam("id_serviciocont", $Method, NULL), $this);
            $this->id_serviciocont->DSType = dsTable;
            $this->id_serviciocont->DataSource = new clsDBcnDisenio();
            $this->id_serviciocont->ds = & $this->id_serviciocont->DataSource;
            $this->id_serviciocont->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_ServContractual {SQL_Where} {SQL_OrderBy}";
            list($this->id_serviciocont->BoundColumn, $this->id_serviciocont->TextColumn, $this->id_serviciocont->DBFormat) = array("Id", "Descripcion", "");
            $this->id_serviciocont->DataSource->Parameters["expr94"] = 'CAPC';
            $this->id_serviciocont->DataSource->wp = new clsSQLParameters();
            $this->id_serviciocont->DataSource->wp->AddParameter("1", "expr94", ccsText, "", "", $this->id_serviciocont->DataSource->Parameters["expr94"], "", false);
            $this->id_serviciocont->DataSource->wp->Criterion[1] = $this->id_serviciocont->DataSource->wp->Operation(opEqual, "[Aplica]", $this->id_serviciocont->DataSource->wp->GetDBValue("1"), $this->id_serviciocont->DataSource->ToSQL($this->id_serviciocont->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->id_serviciocont->DataSource->Where = 
                 $this->id_serviciocont->DataSource->wp->Criterion[1];
            $this->id_serviciocont->Required = true;
            $this->evidencia_salvedad = new clsControl(ccsCheckBox, "evidencia_salvedad", "evidencia_salvedad", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("evidencia_salvedad", $Method, NULL), $this);
            $this->evidencia_salvedad->CheckedValue = true;
            $this->evidencia_salvedad->UncheckedValue = false;
            $this->observacion_salvedad = new clsControl(ccsTextArea, "observacion_salvedad", "observacion_salvedad", ccsText, "", CCGetRequestParam("observacion_salvedad", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->id_proveedor->Value) && !strlen($this->id_proveedor->Value) && $this->id_proveedor->Value !== false)
                    $this->id_proveedor->SetText(1);
                if(!is_array($this->DEDUC_OMISION->Value) && !strlen($this->DEDUC_OMISION->Value) && $this->DEDUC_OMISION->Value !== false)
                    $this->DEDUC_OMISION->SetText(1);
                if(!is_array($this->RevisionPares->Value) && !strlen($this->RevisionPares->Value) && $this->RevisionPares->Value !== false)
                    $this->RevisionPares->SetValue(true);
                if(!is_array($this->CAPFirmada->Value) && !strlen($this->CAPFirmada->Value) && $this->CAPFirmada->Value !== false)
                    $this->CAPFirmada->SetValue(false);
                if(!is_array($this->SLO->Value) && !strlen($this->SLO->Value) && $this->SLO->Value !== false)
                    $this->SLO->SetValue(false);
                if(!is_array($this->evidencia_salvedad->Value) && !strlen($this->evidencia_salvedad->Value) && $this->evidencia_salvedad->Value !== false)
                    $this->evidencia_salvedad->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @3-2832F4DC
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlid"] = CCGetFromGet("id", NULL);
    }
//End Initialize Method

//Validate Method @3-B27BE1B1
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->id_proveedor->Validate() && $Validation);
        $Validation = ($this->numero->Validate() && $Validation);
        $Validation = ($this->Descripcion->Validate() && $Validation);
        $Validation = ($this->mes->Validate() && $Validation);
        $Validation = ($this->anio->Validate() && $Validation);
        $Validation = ($this->Agrupador->Validate() && $Validation);
        $Validation = ($this->DEDUC_OMISION->Validate() && $Validation);
        $Validation = ($this->EFIC_PRESUP->Validate() && $Validation);
        $Validation = ($this->RETR_ENTREGABLE->Validate() && $Validation);
        $Validation = ($this->CALIDAD_PROD_TERM->Validate() && $Validation);
        $Validation = ($this->txtEntregableCalidad->Validate() && $Validation);
        $Validation = ($this->Hallazgos->Validate() && $Validation);
        $Validation = ($this->DetalleCalidad->Validate() && $Validation);
        $Validation = ($this->txtEntregableEF->Validate() && $Validation);
        $Validation = ($this->DetalleEficPres->Validate() && $Validation);
        $Validation = ($this->UnidadesAnteriores->Validate() && $Validation);
        $Validation = ($this->UnidadesActuales->Validate() && $Validation);
        $Validation = ($this->URLEntregables->Validate() && $Validation);
        $Validation = ($this->Defectos->Validate() && $Validation);
        $Validation = ($this->Deductiva->Validate() && $Validation);
        $Validation = ($this->HallazgosSinSev->Validate() && $Validation);
        $Validation = ($this->HallazgosAlta->Validate() && $Validation);
        $Validation = ($this->HallazgosMedia->Validate() && $Validation);
        $Validation = ($this->RevisionPares->Validate() && $Validation);
        $Validation = ($this->CAPFirmada->Validate() && $Validation);
        $Validation = ($this->FechaFirmaCAES->Validate() && $Validation);
        $Validation = ($this->DiasRetrasoHabiles->Validate() && $Validation);
        $Validation = ($this->DiasRetrasoNaturales->Validate() && $Validation);
        $Validation = ($this->PctMaximo->Validate() && $Validation);
        $Validation = ($this->PctCalidad->Validate() && $Validation);
        $Validation = ($this->DiasPlaneados->Validate() && $Validation);
        $Validation = ($this->DiasReales->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->IdEstimacion->Validate() && $Validation);
        $Validation = ($this->id_tipo->Validate() && $Validation);
        $Validation = ($this->SLO->Validate() && $Validation);
        $Validation = ($this->id_servicionegocio->Validate() && $Validation);
        $Validation = ($this->id_serviciocont->Validate() && $Validation);
        $Validation = ($this->evidencia_salvedad->Validate() && $Validation);
        $Validation = ($this->observacion_salvedad->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->numero->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Descripcion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Agrupador->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DEDUC_OMISION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EFIC_PRESUP->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RETR_ENTREGABLE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CALIDAD_PROD_TERM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->txtEntregableCalidad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Hallazgos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DetalleCalidad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->txtEntregableEF->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DetalleEficPres->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UnidadesAnteriores->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UnidadesActuales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->URLEntregables->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Defectos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Deductiva->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HallazgosSinSev->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HallazgosAlta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HallazgosMedia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RevisionPares->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CAPFirmada->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaFirmaCAES->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiasRetrasoHabiles->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiasRetrasoNaturales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PctMaximo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PctCalidad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiasPlaneados->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiasReales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IdEstimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_tipo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SLO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_servicionegocio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_serviciocont->Errors->Count() == 0);
        $Validation =  $Validation && ($this->evidencia_salvedad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->observacion_salvedad->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-0D12432A
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->numero->Errors->Count());
        $errors = ($errors || $this->Descripcion->Errors->Count());
        $errors = ($errors || $this->mes->Errors->Count());
        $errors = ($errors || $this->anio->Errors->Count());
        $errors = ($errors || $this->Agrupador->Errors->Count());
        $errors = ($errors || $this->DEDUC_OMISION->Errors->Count());
        $errors = ($errors || $this->EFIC_PRESUP->Errors->Count());
        $errors = ($errors || $this->RETR_ENTREGABLE->Errors->Count());
        $errors = ($errors || $this->CALIDAD_PROD_TERM->Errors->Count());
        $errors = ($errors || $this->txtEntregableCalidad->Errors->Count());
        $errors = ($errors || $this->Hallazgos->Errors->Count());
        $errors = ($errors || $this->DetalleCalidad->Errors->Count());
        $errors = ($errors || $this->txtEntregableEF->Errors->Count());
        $errors = ($errors || $this->DetalleEficPres->Errors->Count());
        $errors = ($errors || $this->UnidadesAnteriores->Errors->Count());
        $errors = ($errors || $this->UnidadesActuales->Errors->Count());
        $errors = ($errors || $this->URLEntregables->Errors->Count());
        $errors = ($errors || $this->Defectos->Errors->Count());
        $errors = ($errors || $this->Deductiva->Errors->Count());
        $errors = ($errors || $this->HallazgosSinSev->Errors->Count());
        $errors = ($errors || $this->HallazgosAlta->Errors->Count());
        $errors = ($errors || $this->HallazgosMedia->Errors->Count());
        $errors = ($errors || $this->RevisionPares->Errors->Count());
        $errors = ($errors || $this->CAPFirmada->Errors->Count());
        $errors = ($errors || $this->FechaFirmaCAES->Errors->Count());
        $errors = ($errors || $this->DiasRetrasoHabiles->Errors->Count());
        $errors = ($errors || $this->DiasRetrasoNaturales->Errors->Count());
        $errors = ($errors || $this->PctMaximo->Errors->Count());
        $errors = ($errors || $this->PctCalidad->Errors->Count());
        $errors = ($errors || $this->DiasPlaneados->Errors->Count());
        $errors = ($errors || $this->DiasReales->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->IdEstimacion->Errors->Count());
        $errors = ($errors || $this->id_tipo->Errors->Count());
        $errors = ($errors || $this->SLO->Errors->Count());
        $errors = ($errors || $this->id_servicionegocio->Errors->Count());
        $errors = ($errors || $this->id_serviciocont->Errors->Count());
        $errors = ($errors || $this->evidencia_salvedad->Errors->Count());
        $errors = ($errors || $this->observacion_salvedad->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-E955BD63
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
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
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

//InsertRow Method @3-44A14CE8
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->id_proveedor->SetValue($this->id_proveedor->GetValue(true));
        $this->DataSource->numero->SetValue($this->numero->GetValue(true));
        $this->DataSource->Descripcion->SetValue($this->Descripcion->GetValue(true));
        $this->DataSource->mes->SetValue($this->mes->GetValue(true));
        $this->DataSource->anio->SetValue($this->anio->GetValue(true));
        $this->DataSource->Agrupador->SetValue($this->Agrupador->GetValue(true));
        $this->DataSource->DEDUC_OMISION->SetValue($this->DEDUC_OMISION->GetValue(true));
        $this->DataSource->EFIC_PRESUP->SetValue($this->EFIC_PRESUP->GetValue(true));
        $this->DataSource->RETR_ENTREGABLE->SetValue($this->RETR_ENTREGABLE->GetValue(true));
        $this->DataSource->CALIDAD_PROD_TERM->SetValue($this->CALIDAD_PROD_TERM->GetValue(true));
        $this->DataSource->txtEntregableCalidad->SetValue($this->txtEntregableCalidad->GetValue(true));
        $this->DataSource->Hallazgos->SetValue($this->Hallazgos->GetValue(true));
        $this->DataSource->DetalleCalidad->SetValue($this->DetalleCalidad->GetValue(true));
        $this->DataSource->txtEntregableEF->SetValue($this->txtEntregableEF->GetValue(true));
        $this->DataSource->DetalleEficPres->SetValue($this->DetalleEficPres->GetValue(true));
        $this->DataSource->UnidadesAnteriores->SetValue($this->UnidadesAnteriores->GetValue(true));
        $this->DataSource->UnidadesActuales->SetValue($this->UnidadesActuales->GetValue(true));
        $this->DataSource->URLEntregables->SetValue($this->URLEntregables->GetValue(true));
        $this->DataSource->Defectos->SetValue($this->Defectos->GetValue(true));
        $this->DataSource->Deductiva->SetValue($this->Deductiva->GetValue(true));
        $this->DataSource->HallazgosSinSev->SetValue($this->HallazgosSinSev->GetValue(true));
        $this->DataSource->HallazgosAlta->SetValue($this->HallazgosAlta->GetValue(true));
        $this->DataSource->HallazgosMedia->SetValue($this->HallazgosMedia->GetValue(true));
        $this->DataSource->RevisionPares->SetValue($this->RevisionPares->GetValue(true));
        $this->DataSource->CAPFirmada->SetValue($this->CAPFirmada->GetValue(true));
        $this->DataSource->FechaFirmaCAES->SetValue($this->FechaFirmaCAES->GetValue(true));
        $this->DataSource->DiasRetrasoHabiles->SetValue($this->DiasRetrasoHabiles->GetValue(true));
        $this->DataSource->DiasRetrasoNaturales->SetValue($this->DiasRetrasoNaturales->GetValue(true));
        $this->DataSource->PctMaximo->SetValue($this->PctMaximo->GetValue(true));
        $this->DataSource->PctCalidad->SetValue($this->PctCalidad->GetValue(true));
        $this->DataSource->DiasPlaneados->SetValue($this->DiasPlaneados->GetValue(true));
        $this->DataSource->DiasReales->SetValue($this->DiasReales->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->IdEstimacion->SetValue($this->IdEstimacion->GetValue(true));
        $this->DataSource->id_tipo->SetValue($this->id_tipo->GetValue(true));
        $this->DataSource->SLO->SetValue($this->SLO->GetValue(true));
        $this->DataSource->id_servicionegocio->SetValue($this->id_servicionegocio->GetValue(true));
        $this->DataSource->id_serviciocont->SetValue($this->id_serviciocont->GetValue(true));
        $this->DataSource->evidencia_salvedad->SetValue($this->evidencia_salvedad->GetValue(true));
        $this->DataSource->observacion_salvedad->SetValue($this->observacion_salvedad->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-621A33EE
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id_proveedor->SetValue($this->id_proveedor->GetValue(true));
        $this->DataSource->numero->SetValue($this->numero->GetValue(true));
        $this->DataSource->Descripcion->SetValue($this->Descripcion->GetValue(true));
        $this->DataSource->mes->SetValue($this->mes->GetValue(true));
        $this->DataSource->anio->SetValue($this->anio->GetValue(true));
        $this->DataSource->Agrupador->SetValue($this->Agrupador->GetValue(true));
        $this->DataSource->DEDUC_OMISION->SetValue($this->DEDUC_OMISION->GetValue(true));
        $this->DataSource->EFIC_PRESUP->SetValue($this->EFIC_PRESUP->GetValue(true));
        $this->DataSource->RETR_ENTREGABLE->SetValue($this->RETR_ENTREGABLE->GetValue(true));
        $this->DataSource->CALIDAD_PROD_TERM->SetValue($this->CALIDAD_PROD_TERM->GetValue(true));
        $this->DataSource->txtEntregableCalidad->SetValue($this->txtEntregableCalidad->GetValue(true));
        $this->DataSource->Hallazgos->SetValue($this->Hallazgos->GetValue(true));
        $this->DataSource->DetalleCalidad->SetValue($this->DetalleCalidad->GetValue(true));
        $this->DataSource->txtEntregableEF->SetValue($this->txtEntregableEF->GetValue(true));
        $this->DataSource->DetalleEficPres->SetValue($this->DetalleEficPres->GetValue(true));
        $this->DataSource->UnidadesAnteriores->SetValue($this->UnidadesAnteriores->GetValue(true));
        $this->DataSource->UnidadesActuales->SetValue($this->UnidadesActuales->GetValue(true));
        $this->DataSource->URLEntregables->SetValue($this->URLEntregables->GetValue(true));
        $this->DataSource->Defectos->SetValue($this->Defectos->GetValue(true));
        $this->DataSource->Deductiva->SetValue($this->Deductiva->GetValue(true));
        $this->DataSource->HallazgosSinSev->SetValue($this->HallazgosSinSev->GetValue(true));
        $this->DataSource->HallazgosAlta->SetValue($this->HallazgosAlta->GetValue(true));
        $this->DataSource->HallazgosMedia->SetValue($this->HallazgosMedia->GetValue(true));
        $this->DataSource->RevisionPares->SetValue($this->RevisionPares->GetValue(true));
        $this->DataSource->CAPFirmada->SetValue($this->CAPFirmada->GetValue(true));
        $this->DataSource->FechaFirmaCAES->SetValue($this->FechaFirmaCAES->GetValue(true));
        $this->DataSource->DiasRetrasoHabiles->SetValue($this->DiasRetrasoHabiles->GetValue(true));
        $this->DataSource->DiasRetrasoNaturales->SetValue($this->DiasRetrasoNaturales->GetValue(true));
        $this->DataSource->PctMaximo->SetValue($this->PctMaximo->GetValue(true));
        $this->DataSource->PctCalidad->SetValue($this->PctCalidad->GetValue(true));
        $this->DataSource->DiasPlaneados->SetValue($this->DiasPlaneados->GetValue(true));
        $this->DataSource->DiasReales->SetValue($this->DiasReales->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->IdEstimacion->SetValue($this->IdEstimacion->GetValue(true));
        $this->DataSource->id_tipo->SetValue($this->id_tipo->GetValue(true));
        $this->DataSource->SLO->SetValue($this->SLO->GetValue(true));
        $this->DataSource->id_servicionegocio->SetValue($this->id_servicionegocio->GetValue(true));
        $this->DataSource->id_serviciocont->SetValue($this->id_serviciocont->GetValue(true));
        $this->DataSource->evidencia_salvedad->SetValue($this->evidencia_salvedad->GetValue(true));
        $this->DataSource->observacion_salvedad->SetValue($this->observacion_salvedad->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @3-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @3-ABCEA8E2
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

        $this->mes->Prepare();
        $this->anio->Prepare();
        $this->DEDUC_OMISION->Prepare();
        $this->EFIC_PRESUP->Prepare();
        $this->RETR_ENTREGABLE->Prepare();
        $this->CALIDAD_PROD_TERM->Prepare();
        $this->id_tipo->Prepare();
        $this->id_servicionegocio->Prepare();
        $this->id_serviciocont->Prepare();

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
                    $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                    $this->numero->SetValue($this->DataSource->numero->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->mes->SetValue($this->DataSource->mes->GetValue());
                    $this->anio->SetValue($this->DataSource->anio->GetValue());
                    $this->Agrupador->SetValue($this->DataSource->Agrupador->GetValue());
                    $this->DEDUC_OMISION->SetValue($this->DataSource->DEDUC_OMISION->GetValue());
                    $this->EFIC_PRESUP->SetValue($this->DataSource->EFIC_PRESUP->GetValue());
                    $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
                    $this->CALIDAD_PROD_TERM->SetValue($this->DataSource->CALIDAD_PROD_TERM->GetValue());
                    $this->txtEntregableCalidad->SetValue($this->DataSource->txtEntregableCalidad->GetValue());
                    $this->Hallazgos->SetValue($this->DataSource->Hallazgos->GetValue());
                    $this->DetalleCalidad->SetValue($this->DataSource->DetalleCalidad->GetValue());
                    $this->txtEntregableEF->SetValue($this->DataSource->txtEntregableEF->GetValue());
                    $this->DetalleEficPres->SetValue($this->DataSource->DetalleEficPres->GetValue());
                    $this->UnidadesAnteriores->SetValue($this->DataSource->UnidadesAnteriores->GetValue());
                    $this->UnidadesActuales->SetValue($this->DataSource->UnidadesActuales->GetValue());
                    $this->URLEntregables->SetValue($this->DataSource->URLEntregables->GetValue());
                    $this->Defectos->SetValue($this->DataSource->Defectos->GetValue());
                    $this->Deductiva->SetValue($this->DataSource->Deductiva->GetValue());
                    $this->HallazgosSinSev->SetValue($this->DataSource->HallazgosSinSev->GetValue());
                    $this->HallazgosAlta->SetValue($this->DataSource->HallazgosAlta->GetValue());
                    $this->HallazgosMedia->SetValue($this->DataSource->HallazgosMedia->GetValue());
                    $this->RevisionPares->SetValue($this->DataSource->RevisionPares->GetValue());
                    $this->CAPFirmada->SetValue($this->DataSource->CAPFirmada->GetValue());
                    $this->FechaFirmaCAES->SetValue($this->DataSource->FechaFirmaCAES->GetValue());
                    $this->DiasRetrasoHabiles->SetValue($this->DataSource->DiasRetrasoHabiles->GetValue());
                    $this->DiasRetrasoNaturales->SetValue($this->DataSource->DiasRetrasoNaturales->GetValue());
                    $this->PctMaximo->SetValue($this->DataSource->PctMaximo->GetValue());
                    $this->PctCalidad->SetValue($this->DataSource->PctCalidad->GetValue());
                    $this->DiasPlaneados->SetValue($this->DataSource->DiasPlaneados->GetValue());
                    $this->DiasReales->SetValue($this->DataSource->DiasReales->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                    $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                    $this->id_tipo->SetValue($this->DataSource->id_tipo->GetValue());
                    $this->SLO->SetValue($this->DataSource->SLO->GetValue());
                    $this->id_servicionegocio->SetValue($this->DataSource->id_servicionegocio->GetValue());
                    $this->id_serviciocont->SetValue($this->DataSource->id_serviciocont->GetValue());
                    $this->evidencia_salvedad->SetValue($this->DataSource->evidencia_salvedad->GetValue());
                    $this->observacion_salvedad->SetValue($this->DataSource->observacion_salvedad->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->numero->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Descripcion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Agrupador->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DEDUC_OMISION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EFIC_PRESUP->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RETR_ENTREGABLE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CALIDAD_PROD_TERM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->txtEntregableCalidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Hallazgos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DetalleCalidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->txtEntregableEF->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DetalleEficPres->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UnidadesAnteriores->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UnidadesActuales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->URLEntregables->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Defectos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Deductiva->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HallazgosSinSev->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HallazgosAlta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HallazgosMedia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RevisionPares->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CAPFirmada->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaFirmaCAES->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiasRetrasoHabiles->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiasRetrasoNaturales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PctMaximo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PctCalidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiasPlaneados->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiasReales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IdEstimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_tipo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SLO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_servicionegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_serviciocont->Errors->ToString());
            $Error = ComposeStrings($Error, $this->evidencia_salvedad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->observacion_salvedad->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->id_proveedor->Show();
        $this->numero->Show();
        $this->Descripcion->Show();
        $this->mes->Show();
        $this->anio->Show();
        $this->Agrupador->Show();
        $this->DEDUC_OMISION->Show();
        $this->EFIC_PRESUP->Show();
        $this->RETR_ENTREGABLE->Show();
        $this->CALIDAD_PROD_TERM->Show();
        $this->txtEntregableCalidad->Show();
        $this->Hallazgos->Show();
        $this->DetalleCalidad->Show();
        $this->txtEntregableEF->Show();
        $this->DetalleEficPres->Show();
        $this->UnidadesAnteriores->Show();
        $this->UnidadesActuales->Show();
        $this->URLEntregables->Show();
        $this->Defectos->Show();
        $this->Deductiva->Show();
        $this->HallazgosSinSev->Show();
        $this->HallazgosAlta->Show();
        $this->HallazgosMedia->Show();
        $this->RevisionPares->Show();
        $this->CAPFirmada->Show();
        $this->FechaFirmaCAES->Show();
        $this->DiasRetrasoHabiles->Show();
        $this->DiasRetrasoNaturales->Show();
        $this->PctMaximo->Show();
        $this->PctCalidad->Show();
        $this->DiasPlaneados->Show();
        $this->DiasReales->Show();
        $this->Observaciones->Show();
        $this->IdEstimacion->Show();
        $this->id_tipo->Show();
        $this->SLO->Show();
        $this->id_servicionegocio->Show();
        $this->id_serviciocont->Show();
        $this->evidencia_salvedad->Show();
        $this->observacion_salvedad->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_calificacion_capc Class @3-FCB6E20C

class clsmc_calificacion_capcDataSource extends clsDBcnDisenio {  //mc_calificacion_capcDataSource Class @3-68AE7315

//DataSource Variables @3-2488FE79
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
    public $Descripcion;
    public $mes;
    public $anio;
    public $Agrupador;
    public $DEDUC_OMISION;
    public $EFIC_PRESUP;
    public $RETR_ENTREGABLE;
    public $CALIDAD_PROD_TERM;
    public $txtEntregableCalidad;
    public $Hallazgos;
    public $DetalleCalidad;
    public $txtEntregableEF;
    public $DetalleEficPres;
    public $UnidadesAnteriores;
    public $UnidadesActuales;
    public $URLEntregables;
    public $Defectos;
    public $Deductiva;
    public $HallazgosSinSev;
    public $HallazgosAlta;
    public $HallazgosMedia;
    public $RevisionPares;
    public $CAPFirmada;
    public $FechaFirmaCAES;
    public $DiasRetrasoHabiles;
    public $DiasRetrasoNaturales;
    public $PctMaximo;
    public $PctCalidad;
    public $DiasPlaneados;
    public $DiasReales;
    public $Observaciones;
    public $IdEstimacion;
    public $id_tipo;
    public $SLO;
    public $id_servicionegocio;
    public $id_serviciocont;
    public $evidencia_salvedad;
    public $observacion_salvedad;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-5B2AA303
    function clsmc_calificacion_capcDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_calificacion_capc/Error";
        $this->Initialize();
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->numero = new clsField("numero", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->mes = new clsField("mes", ccsInteger, "");
        
        $this->anio = new clsField("anio", ccsInteger, "");
        
        $this->Agrupador = new clsField("Agrupador", ccsText, "");
        
        $this->DEDUC_OMISION = new clsField("DEDUC_OMISION", ccsBoolean, $this->BooleanFormat);
        
        $this->EFIC_PRESUP = new clsField("EFIC_PRESUP", ccsBoolean, $this->BooleanFormat);
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsBoolean, $this->BooleanFormat);
        
        $this->CALIDAD_PROD_TERM = new clsField("CALIDAD_PROD_TERM", ccsBoolean, $this->BooleanFormat);
        
        $this->txtEntregableCalidad = new clsField("txtEntregableCalidad", ccsText, "");
        
        $this->Hallazgos = new clsField("Hallazgos", ccsText, "");
        
        $this->DetalleCalidad = new clsField("DetalleCalidad", ccsText, "");
        
        $this->txtEntregableEF = new clsField("txtEntregableEF", ccsText, "");
        
        $this->DetalleEficPres = new clsField("DetalleEficPres", ccsText, "");
        
        $this->UnidadesAnteriores = new clsField("UnidadesAnteriores", ccsText, "");
        
        $this->UnidadesActuales = new clsField("UnidadesActuales", ccsText, "");
        
        $this->URLEntregables = new clsField("URLEntregables", ccsText, "");
        
        $this->Defectos = new clsField("Defectos", ccsText, "");
        
        $this->Deductiva = new clsField("Deductiva", ccsText, "");
        
        $this->HallazgosSinSev = new clsField("HallazgosSinSev", ccsText, "");
        
        $this->HallazgosAlta = new clsField("HallazgosAlta", ccsText, "");
        
        $this->HallazgosMedia = new clsField("HallazgosMedia", ccsInteger, "");
        
        $this->RevisionPares = new clsField("RevisionPares", ccsInteger, "");
        
        $this->CAPFirmada = new clsField("CAPFirmada", ccsBoolean, $this->BooleanFormat);
        
        $this->FechaFirmaCAES = new clsField("FechaFirmaCAES", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->DiasRetrasoHabiles = new clsField("DiasRetrasoHabiles", ccsInteger, "");
        
        $this->DiasRetrasoNaturales = new clsField("DiasRetrasoNaturales", ccsInteger, "");
        
        $this->PctMaximo = new clsField("PctMaximo", ccsFloat, "");
        
        $this->PctCalidad = new clsField("PctCalidad", ccsFloat, "");
        
        $this->DiasPlaneados = new clsField("DiasPlaneados", ccsInteger, "");
        
        $this->DiasReales = new clsField("DiasReales", ccsInteger, "");
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsText, "");
        
        $this->id_tipo = new clsField("id_tipo", ccsText, "");
        
        $this->SLO = new clsField("SLO", ccsInteger, "");
        
        $this->id_servicionegocio = new clsField("id_servicionegocio", ccsInteger, "");
        
        $this->id_serviciocont = new clsField("id_serviciocont", ccsInteger, "");
        
        $this->evidencia_salvedad = new clsField("evidencia_salvedad", ccsBoolean, $this->BooleanFormat);
        
        $this->observacion_salvedad = new clsField("observacion_salvedad", ccsText, "");
        

        $this->InsertFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["numero"] = array("Name" => "numero", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["mes"] = array("Name" => "mes", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["anio"] = array("Name" => "anio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Agrupador"] = array("Name" => "[Agrupador]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DEDUC_OMISION"] = array("Name" => "DEDUC_OMISION", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->InsertFields["EFIC_PRESUP"] = array("Name" => "EFIC_PRESUP", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->InsertFields["RETR_ENTREGABLE"] = array("Name" => "RETR_ENTREGABLE", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->InsertFields["CALIDAD_PROD_TERM"] = array("Name" => "CALIDAD_PROD_TERM", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->InsertFields["EntregableCalidad"] = array("Name" => "[EntregableCalidad]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Hallazgos"] = array("Name" => "[Hallazgos]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DetalleCalidad"] = array("Name" => "[DetalleCalidad]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EntregableEficiencia"] = array("Name" => "[EntregableEficiencia]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DetalleEficiencia"] = array("Name" => "[DetalleEficiencia]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UnidadesAnteriores"] = array("Name" => "[UnidadesAnteriores]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UnidadesActuales"] = array("Name" => "[UnidadesActuales]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["urlentregables"] = array("Name" => "urlentregables", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Defectos"] = array("Name" => "[Defectos]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Deductiva"] = array("Name" => "[Deductiva]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["HallazgosSinSev"] = array("Name" => "[HallazgosSinSev]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["HallazgosAlta"] = array("Name" => "[HallazgosAlta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["HallazgosMedia"] = array("Name" => "[HallazgosMedia]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["RevisionPares"] = array("Name" => "[RevisionPares]", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["CAPFirmada"] = array("Name" => "[CAPFirmada]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["FechaFirmaCAES"] = array("Name" => "[FechaFirmaCAES]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasRetrasoHabiles"] = array("Name" => "[DiasRetrasoHabiles]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasRetrasoNaturales"] = array("Name" => "[DiasRetrasoNaturales]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["PctMaximo"] = array("Name" => "[PctMaximo]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["PctCalidad"] = array("Name" => "[PctCalidad]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasPlaneados"] = array("Name" => "[DiasPlaneados]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasReales"] = array("Name" => "[DiasReales]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["IdEstimacion"] = array("Name" => "[IdEstimacion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["id_tipo"] = array("Name" => "id_tipo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SLO"] = array("Name" => "SLO", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["Id_servicio_negoico"] = array("Name" => "[Id_servicio_negoico]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["id_serviciocont"] = array("Name" => "id_serviciocont", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["evidencia_salvedad_dpo"] = array("Name" => "evidencia_salvedad_dpo", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["observacion_salvedad_dpo"] = array("Name" => "observacion_salvedad_dpo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["numero"] = array("Name" => "numero", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["mes"] = array("Name" => "mes", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["anio"] = array("Name" => "anio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Agrupador"] = array("Name" => "[Agrupador]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DEDUC_OMISION"] = array("Name" => "DEDUC_OMISION", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->UpdateFields["EFIC_PRESUP"] = array("Name" => "EFIC_PRESUP", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->UpdateFields["RETR_ENTREGABLE"] = array("Name" => "RETR_ENTREGABLE", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->UpdateFields["CALIDAD_PROD_TERM"] = array("Name" => "CALIDAD_PROD_TERM", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->UpdateFields["EntregableCalidad"] = array("Name" => "[EntregableCalidad]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Hallazgos"] = array("Name" => "[Hallazgos]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DetalleCalidad"] = array("Name" => "[DetalleCalidad]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EntregableEficiencia"] = array("Name" => "[EntregableEficiencia]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DetalleEficiencia"] = array("Name" => "[DetalleEficiencia]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UnidadesAnteriores"] = array("Name" => "[UnidadesAnteriores]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UnidadesActuales"] = array("Name" => "[UnidadesActuales]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["urlentregables"] = array("Name" => "urlentregables", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Defectos"] = array("Name" => "[Defectos]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Deductiva"] = array("Name" => "[Deductiva]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["HallazgosSinSev"] = array("Name" => "[HallazgosSinSev]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["HallazgosAlta"] = array("Name" => "[HallazgosAlta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["HallazgosMedia"] = array("Name" => "[HallazgosMedia]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["RevisionPares"] = array("Name" => "[RevisionPares]", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["CAPFirmada"] = array("Name" => "[CAPFirmada]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["FechaFirmaCAES"] = array("Name" => "[FechaFirmaCAES]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasRetrasoHabiles"] = array("Name" => "[DiasRetrasoHabiles]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasRetrasoNaturales"] = array("Name" => "[DiasRetrasoNaturales]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PctMaximo"] = array("Name" => "[PctMaximo]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["PctCalidad"] = array("Name" => "[PctCalidad]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasPlaneados"] = array("Name" => "[DiasPlaneados]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasReales"] = array("Name" => "[DiasReales]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["IdEstimacion"] = array("Name" => "[IdEstimacion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_tipo"] = array("Name" => "id_tipo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SLO"] = array("Name" => "SLO", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["Id_servicio_negoico"] = array("Name" => "[Id_servicio_negoico]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_serviciocont"] = array("Name" => "id_serviciocont", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["evidencia_salvedad_dpo"] = array("Name" => "evidencia_salvedad_dpo", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["observacion_salvedad_dpo"] = array("Name" => "observacion_salvedad_dpo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-35B33087
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

//Open Method @3-7636BF92
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_calificacion_capc {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-36BF3ACB
    function SetValues()
    {
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->numero->SetDBValue($this->f("numero"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->mes->SetDBValue(trim($this->f("mes")));
        $this->anio->SetDBValue(trim($this->f("anio")));
        $this->Agrupador->SetDBValue($this->f("Agrupador"));
        $this->DEDUC_OMISION->SetDBValue(trim($this->f("DEDUC_OMISION")));
        $this->EFIC_PRESUP->SetDBValue(trim($this->f("EFIC_PRESUP")));
        $this->RETR_ENTREGABLE->SetDBValue(trim($this->f("RETR_ENTREGABLE")));
        $this->CALIDAD_PROD_TERM->SetDBValue(trim($this->f("CALIDAD_PROD_TERM")));
        $this->txtEntregableCalidad->SetDBValue($this->f("EntregableCalidad"));
        $this->Hallazgos->SetDBValue($this->f("Hallazgos"));
        $this->DetalleCalidad->SetDBValue($this->f("DetalleCalidad"));
        $this->txtEntregableEF->SetDBValue($this->f("EntregableEficiencia"));
        $this->DetalleEficPres->SetDBValue($this->f("DetalleEficiencia"));
        $this->UnidadesAnteriores->SetDBValue($this->f("UnidadesAnteriores"));
        $this->UnidadesActuales->SetDBValue($this->f("UnidadesActuales"));
        $this->URLEntregables->SetDBValue($this->f("urlentregables"));
        $this->Defectos->SetDBValue($this->f("Defectos"));
        $this->Deductiva->SetDBValue($this->f("Deductiva"));
        $this->HallazgosSinSev->SetDBValue($this->f("HallazgosSinSev"));
        $this->HallazgosAlta->SetDBValue($this->f("HallazgosAlta"));
        $this->HallazgosMedia->SetDBValue(trim($this->f("HallazgosMedia")));
        $this->RevisionPares->SetDBValue(trim($this->f("RevisionPares")));
        $this->CAPFirmada->SetDBValue(trim($this->f("CAPFirmada")));
        $this->FechaFirmaCAES->SetDBValue(trim($this->f("FechaFirmaCAES")));
        $this->DiasRetrasoHabiles->SetDBValue(trim($this->f("DiasRetrasoHabiles")));
        $this->DiasRetrasoNaturales->SetDBValue(trim($this->f("DiasRetrasoNaturales")));
        $this->PctMaximo->SetDBValue(trim($this->f("PctMaximo")));
        $this->PctCalidad->SetDBValue(trim($this->f("PctCalidad")));
        $this->DiasPlaneados->SetDBValue(trim($this->f("DiasPlaneados")));
        $this->DiasReales->SetDBValue(trim($this->f("DiasReales")));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
        $this->IdEstimacion->SetDBValue($this->f("IdEstimacion"));
        $this->id_tipo->SetDBValue($this->f("id_tipo"));
        $this->SLO->SetDBValue(trim($this->f("SLO")));
        $this->id_servicionegocio->SetDBValue(trim($this->f("Id_servicio_negoico")));
        $this->id_serviciocont->SetDBValue(trim($this->f("id_serviciocont")));
        $this->evidencia_salvedad->SetDBValue(trim($this->f("evidencia_salvedad_dpo")));
        $this->observacion_salvedad->SetDBValue($this->f("observacion_salvedad_dpo"));
    }
//End SetValues Method

//Insert Method @3-9E936AD2
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["id_proveedor"]["Value"] = $this->id_proveedor->GetDBValue(true);
        $this->InsertFields["numero"]["Value"] = $this->numero->GetDBValue(true);
        $this->InsertFields["Descripcion"]["Value"] = $this->Descripcion->GetDBValue(true);
        $this->InsertFields["mes"]["Value"] = $this->mes->GetDBValue(true);
        $this->InsertFields["anio"]["Value"] = $this->anio->GetDBValue(true);
        $this->InsertFields["Agrupador"]["Value"] = $this->Agrupador->GetDBValue(true);
        $this->InsertFields["DEDUC_OMISION"]["Value"] = $this->DEDUC_OMISION->GetDBValue(true);
        $this->InsertFields["EFIC_PRESUP"]["Value"] = $this->EFIC_PRESUP->GetDBValue(true);
        $this->InsertFields["RETR_ENTREGABLE"]["Value"] = $this->RETR_ENTREGABLE->GetDBValue(true);
        $this->InsertFields["CALIDAD_PROD_TERM"]["Value"] = $this->CALIDAD_PROD_TERM->GetDBValue(true);
        $this->InsertFields["EntregableCalidad"]["Value"] = $this->txtEntregableCalidad->GetDBValue(true);
        $this->InsertFields["Hallazgos"]["Value"] = $this->Hallazgos->GetDBValue(true);
        $this->InsertFields["DetalleCalidad"]["Value"] = $this->DetalleCalidad->GetDBValue(true);
        $this->InsertFields["EntregableEficiencia"]["Value"] = $this->txtEntregableEF->GetDBValue(true);
        $this->InsertFields["DetalleEficiencia"]["Value"] = $this->DetalleEficPres->GetDBValue(true);
        $this->InsertFields["UnidadesAnteriores"]["Value"] = $this->UnidadesAnteriores->GetDBValue(true);
        $this->InsertFields["UnidadesActuales"]["Value"] = $this->UnidadesActuales->GetDBValue(true);
        $this->InsertFields["urlentregables"]["Value"] = $this->URLEntregables->GetDBValue(true);
        $this->InsertFields["Defectos"]["Value"] = $this->Defectos->GetDBValue(true);
        $this->InsertFields["Deductiva"]["Value"] = $this->Deductiva->GetDBValue(true);
        $this->InsertFields["HallazgosSinSev"]["Value"] = $this->HallazgosSinSev->GetDBValue(true);
        $this->InsertFields["HallazgosAlta"]["Value"] = $this->HallazgosAlta->GetDBValue(true);
        $this->InsertFields["HallazgosMedia"]["Value"] = $this->HallazgosMedia->GetDBValue(true);
        $this->InsertFields["RevisionPares"]["Value"] = $this->RevisionPares->GetDBValue(true);
        $this->InsertFields["CAPFirmada"]["Value"] = $this->CAPFirmada->GetDBValue(true);
        $this->InsertFields["FechaFirmaCAES"]["Value"] = $this->FechaFirmaCAES->GetDBValue(true);
        $this->InsertFields["DiasRetrasoHabiles"]["Value"] = $this->DiasRetrasoHabiles->GetDBValue(true);
        $this->InsertFields["DiasRetrasoNaturales"]["Value"] = $this->DiasRetrasoNaturales->GetDBValue(true);
        $this->InsertFields["PctMaximo"]["Value"] = $this->PctMaximo->GetDBValue(true);
        $this->InsertFields["PctCalidad"]["Value"] = $this->PctCalidad->GetDBValue(true);
        $this->InsertFields["DiasPlaneados"]["Value"] = $this->DiasPlaneados->GetDBValue(true);
        $this->InsertFields["DiasReales"]["Value"] = $this->DiasReales->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->InsertFields["IdEstimacion"]["Value"] = $this->IdEstimacion->GetDBValue(true);
        $this->InsertFields["id_tipo"]["Value"] = $this->id_tipo->GetDBValue(true);
        $this->InsertFields["SLO"]["Value"] = $this->SLO->GetDBValue(true);
        $this->InsertFields["Id_servicio_negoico"]["Value"] = $this->id_servicionegocio->GetDBValue(true);
        $this->InsertFields["id_serviciocont"]["Value"] = $this->id_serviciocont->GetDBValue(true);
        $this->InsertFields["evidencia_salvedad_dpo"]["Value"] = $this->evidencia_salvedad->GetDBValue(true);
        $this->InsertFields["observacion_salvedad_dpo"]["Value"] = $this->observacion_salvedad->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_calificacion_capc", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-465F6131
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["id_proveedor"]["Value"] = $this->id_proveedor->GetDBValue(true);
        $this->UpdateFields["numero"]["Value"] = $this->numero->GetDBValue(true);
        $this->UpdateFields["Descripcion"]["Value"] = $this->Descripcion->GetDBValue(true);
        $this->UpdateFields["mes"]["Value"] = $this->mes->GetDBValue(true);
        $this->UpdateFields["anio"]["Value"] = $this->anio->GetDBValue(true);
        $this->UpdateFields["Agrupador"]["Value"] = $this->Agrupador->GetDBValue(true);
        $this->UpdateFields["DEDUC_OMISION"]["Value"] = $this->DEDUC_OMISION->GetDBValue(true);
        $this->UpdateFields["EFIC_PRESUP"]["Value"] = $this->EFIC_PRESUP->GetDBValue(true);
        $this->UpdateFields["RETR_ENTREGABLE"]["Value"] = $this->RETR_ENTREGABLE->GetDBValue(true);
        $this->UpdateFields["CALIDAD_PROD_TERM"]["Value"] = $this->CALIDAD_PROD_TERM->GetDBValue(true);
        $this->UpdateFields["EntregableCalidad"]["Value"] = $this->txtEntregableCalidad->GetDBValue(true);
        $this->UpdateFields["Hallazgos"]["Value"] = $this->Hallazgos->GetDBValue(true);
        $this->UpdateFields["DetalleCalidad"]["Value"] = $this->DetalleCalidad->GetDBValue(true);
        $this->UpdateFields["EntregableEficiencia"]["Value"] = $this->txtEntregableEF->GetDBValue(true);
        $this->UpdateFields["DetalleEficiencia"]["Value"] = $this->DetalleEficPres->GetDBValue(true);
        $this->UpdateFields["UnidadesAnteriores"]["Value"] = $this->UnidadesAnteriores->GetDBValue(true);
        $this->UpdateFields["UnidadesActuales"]["Value"] = $this->UnidadesActuales->GetDBValue(true);
        $this->UpdateFields["urlentregables"]["Value"] = $this->URLEntregables->GetDBValue(true);
        $this->UpdateFields["Defectos"]["Value"] = $this->Defectos->GetDBValue(true);
        $this->UpdateFields["Deductiva"]["Value"] = $this->Deductiva->GetDBValue(true);
        $this->UpdateFields["HallazgosSinSev"]["Value"] = $this->HallazgosSinSev->GetDBValue(true);
        $this->UpdateFields["HallazgosAlta"]["Value"] = $this->HallazgosAlta->GetDBValue(true);
        $this->UpdateFields["HallazgosMedia"]["Value"] = $this->HallazgosMedia->GetDBValue(true);
        $this->UpdateFields["RevisionPares"]["Value"] = $this->RevisionPares->GetDBValue(true);
        $this->UpdateFields["CAPFirmada"]["Value"] = $this->CAPFirmada->GetDBValue(true);
        $this->UpdateFields["FechaFirmaCAES"]["Value"] = $this->FechaFirmaCAES->GetDBValue(true);
        $this->UpdateFields["DiasRetrasoHabiles"]["Value"] = $this->DiasRetrasoHabiles->GetDBValue(true);
        $this->UpdateFields["DiasRetrasoNaturales"]["Value"] = $this->DiasRetrasoNaturales->GetDBValue(true);
        $this->UpdateFields["PctMaximo"]["Value"] = $this->PctMaximo->GetDBValue(true);
        $this->UpdateFields["PctCalidad"]["Value"] = $this->PctCalidad->GetDBValue(true);
        $this->UpdateFields["DiasPlaneados"]["Value"] = $this->DiasPlaneados->GetDBValue(true);
        $this->UpdateFields["DiasReales"]["Value"] = $this->DiasReales->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->UpdateFields["IdEstimacion"]["Value"] = $this->IdEstimacion->GetDBValue(true);
        $this->UpdateFields["id_tipo"]["Value"] = $this->id_tipo->GetDBValue(true);
        $this->UpdateFields["SLO"]["Value"] = $this->SLO->GetDBValue(true);
        $this->UpdateFields["Id_servicio_negoico"]["Value"] = $this->id_servicionegocio->GetDBValue(true);
        $this->UpdateFields["id_serviciocont"]["Value"] = $this->id_serviciocont->GetDBValue(true);
        $this->UpdateFields["evidencia_salvedad_dpo"]["Value"] = $this->evidencia_salvedad->GetDBValue(true);
        $this->UpdateFields["observacion_salvedad_dpo"]["Value"] = $this->observacion_salvedad->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_calificacion_capc", $this->UpdateFields, $this);
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

//Delete Method @3-5136CAB9
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM mc_calificacion_capc";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End mc_calificacion_capcDataSource Class @3-FCB6E20C

//Initialize Page @1-93CEA130
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
$TemplateFileName = "SLAsCAPCDetalle.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/ui/jquery.ui.core.js|js/jquery/ui/jquery.ui.widget.js|js/jquery/ui/jquery.ui.datepicker.js|js/jquery/datepicker/ccs-date-timepicker.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-872FD3D7
CCSecurityRedirect("", "");
//End Authenticate User

//Include events file @1-89FC4278
include_once("./SLAsCAPCDetalle_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-2540A770
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_calificacion_capc = new clsRecordmc_calificacion_capc("", $MainPage);
$lkAnterior = new clsControl(ccsLink, "lkAnterior", "lkAnterior", ccsText, "", CCGetRequestParam("lkAnterior", ccsGet, NULL), $MainPage);
$lkAnterior->Page = "SLAsCAPCDetalle.php";
$lkSiguiente = new clsControl(ccsLink, "lkSiguiente", "lkSiguiente", ccsText, "", CCGetRequestParam("lkSiguiente", ccsGet, NULL), $MainPage);
$lkSiguiente->Page = "SLAsCAPCDetalle.php";
$lkCumplimiento = new clsControl(ccsLink, "lkCumplimiento", "lkCumplimiento", ccsText, "", CCGetRequestParam("lkCumplimiento", ccsGet, NULL), $MainPage);
$lkCumplimiento->Parameters = CCAddParam($lkCumplimiento->Parameters, "sID", CCGetFromGet("id", NULL));
$lkCumplimiento->Page = "SLAsCAPCReqFunDetalle.php";
$lkCalidad = new clsControl(ccsLink, "lkCalidad", "lkCalidad", ccsText, "", CCGetRequestParam("lkCalidad", ccsGet, NULL), $MainPage);
$lkCalidad->Parameters = CCAddParam($lkCalidad->Parameters, "Id", CCGetFromGet("id", NULL));
$lkCalidad->Page = "PPMCsCrbCalidadCAPC.php";
$lkRetraso = new clsControl(ccsLink, "lkRetraso", "lkRetraso", ccsText, "", CCGetRequestParam("lkRetraso", ccsGet, NULL), $MainPage);
$lkRetraso->Parameters = CCAddParam($lkRetraso->Parameters, "id", CCGetFromGet("id", NULL));
$lkRetraso->Page = "SLAsCAPCRetEnt.php";
$MainPage->Header = & $Header;
$MainPage->mc_calificacion_capc = & $mc_calificacion_capc;
$MainPage->lkAnterior = & $lkAnterior;
$MainPage->lkSiguiente = & $lkSiguiente;
$MainPage->lkCumplimiento = & $lkCumplimiento;
$MainPage->lkCalidad = & $lkCalidad;
$MainPage->lkRetraso = & $lkRetraso;
$mc_calificacion_capc->Initialize();
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

//Execute Components @1-773E28D8
$mc_calificacion_capc->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-A149CA39
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_calificacion_capc);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-53EB6AB0
$Header->Show();
$mc_calificacion_capc->Show();
$lkAnterior->Show();
$lkSiguiente->Show();
$lkCumplimiento->Show();
$lkCalidad->Show();
$lkRetraso->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-47AE57A7
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_calificacion_capc);
unset($Tpl);
//End Unload Page


?>
