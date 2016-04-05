<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
//Include Common Files @1-7AD21813
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsApbDetalle2.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_info_rs_ap_EC { //mc_info_rs_ap_EC Class @3-3A652514

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

//Class_Initialize Event @3-5B486B38
    function clsRecordmc_info_rs_ap_EC($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_rs_ap_EC/Error";
        $this->DataSource = new clsmc_info_rs_ap_ECDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_rs_ap_EC";
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
            $this->Id_Proveedor = new clsControl(ccsLabel, "Id_Proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("Id_Proveedor", $Method, NULL), $this);
            $this->URLReferencia = new clsControl(ccsTextArea, "URLReferencia", "URLReferencia", ccsMemo, "", CCGetRequestParam("URLReferencia", $Method, NULL), $this);
            $this->FechaAsignacion = new clsControl(ccsTextBox, "FechaAsignacion", "Fecha Asignacion", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn"), CCGetRequestParam("FechaAsignacion", $Method, NULL), $this);
            $this->FechaAsignacion->Required = true;
            $this->FechaEntregaPropuesta = new clsControl(ccsTextBox, "FechaEntregaPropuesta", "Fecha Entrega Propuesta", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn"), CCGetRequestParam("FechaEntregaPropuesta", $Method, NULL), $this);
            $this->FechaEntregaPropuesta->Required = true;
            $this->FechaEntregaEvidencia = new clsControl(ccsTextBox, "FechaEntregaEvidencia", "Fecha Entrega Evidencia", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn"), CCGetRequestParam("FechaEntregaEvidencia", $Method, NULL), $this);
            $this->FechaAceptacionPropuesta = new clsControl(ccsTextBox, "FechaAceptacionPropuesta", "Fecha Aceptacion Propuesta", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn"), CCGetRequestParam("FechaAceptacionPropuesta", $Method, NULL), $this);
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsMemo, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->CumplioRS = new clsControl(ccsListBox, "CumplioRS", "CumplioRS", ccsInteger, "", CCGetRequestParam("CumplioRS", $Method, NULL), $this);
            $this->CumplioRS->DSType = dsListOfValues;
            $this->CumplioRS->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->sIdPPMC = new clsControl(ccsLabel, "sIdPPMC", "sIdPPMC", ccsText, "", CCGetRequestParam("sIdPPMC", $Method, NULL), $this);
            $this->sNombreProyecto = new clsControl(ccsLabel, "sNombreProyecto", "sNombreProyecto", ccsText, "", CCGetRequestParam("sNombreProyecto", $Method, NULL), $this);
            $this->sServicioNegocio = new clsControl(ccsListBox, "sServicioNegocio", "Servicio de Negocio", ccsText, "", CCGetRequestParam("sServicioNegocio", $Method, NULL), $this);
            $this->sServicioNegocio->DSType = dsSQL;
            $this->sServicioNegocio->DataSource = new clsDBcnDisenio();
            $this->sServicioNegocio->ds = & $this->sServicioNegocio->DataSource;
            list($this->sServicioNegocio->BoundColumn, $this->sServicioNegocio->TextColumn, $this->sServicioNegocio->DBFormat) = array("id_servicio", "nombre", "");
            $this->sServicioNegocio->DataSource->SQL = "\n" .
            "select id_servicio, nombre\n" .
            "from mc_c_servicio where id_tipo_servicio=2 {SQL_OrderBy}";
            $this->sServicioNegocio->DataSource->Order = "nombre";
            $this->sServicioNegocio->Required = true;
            $this->sTipoRequerimiento = new clsControl(ccsListBox, "sTipoRequerimiento", "Tipo Requerimiento", ccsText, "", CCGetRequestParam("sTipoRequerimiento", $Method, NULL), $this);
            $this->sTipoRequerimiento->DSType = dsTable;
            $this->sTipoRequerimiento->DataSource = new clsDBcnDisenio();
            $this->sTipoRequerimiento->ds = & $this->sTipoRequerimiento->DataSource;
            $this->sTipoRequerimiento->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_TipoPPMC {SQL_Where} {SQL_OrderBy}";
            list($this->sTipoRequerimiento->BoundColumn, $this->sTipoRequerimiento->TextColumn, $this->sTipoRequerimiento->DBFormat) = array("Id", "Descripcion", "");
            $this->sTipoRequerimiento->Required = true;
            $this->sID = new clsControl(ccsHidden, "sID", "sID", ccsInteger, "", CCGetRequestParam("sID", $Method, NULL), $this);
            $this->CumplioHE = new clsControl(ccsListBox, "CumplioHE", "CumplioHE", ccsInteger, "", CCGetRequestParam("CumplioHE", $Method, NULL), $this);
            $this->CumplioHE->DSType = dsListOfValues;
            $this->CumplioHE->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->sEstadoPPMC = new clsControl(ccsLabel, "sEstadoPPMC", "sEstadoPPMC", ccsText, "", CCGetRequestParam("sEstadoPPMC", $Method, NULL), $this);
            $this->sIDEstimacion = new clsControl(ccsLabel, "sIDEstimacion", "sIDEstimacion", ccsText, "", CCGetRequestParam("sIDEstimacion", $Method, NULL), $this);
            $this->sIDEstimacion->HTML = true;
            $this->sUnidades = new clsControl(ccsLabel, "sUnidades", "sUnidades", ccsText, "", CCGetRequestParam("sUnidades", $Method, NULL), $this);
            $this->sUnidades->HTML = true;
            $this->sDatosPadre = new clsControl(ccsTextBox, "sDatosPadre", "sDatosPadre", ccsInteger, array(False, 0, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("sDatosPadre", $Method, NULL), $this);
            $this->sHrsPropuesta = new clsControl(ccsLabel, "sHrsPropuesta", "sHrsPropuesta", ccsText, "", CCGetRequestParam("sHrsPropuesta", $Method, NULL), $this);
            $this->sDiasPropuesta = new clsControl(ccsTextBox, "sDiasPropuesta", "Dias para Propuesta", ccsFloat, "", CCGetRequestParam("sDiasPropuesta", $Method, NULL), $this);
            $this->sDiasPropuesta->Required = true;
            $this->sRAPE = new clsControl(ccsLabel, "sRAPE", "sRAPE", ccsText, "", CCGetRequestParam("sRAPE", $Method, NULL), $this);
            $this->sRAPE->HTML = true;
            $this->hdUsrAlta = new clsControl(ccsHidden, "hdUsrAlta", "hdUsrAlta", ccsText, "", CCGetRequestParam("hdUsrAlta", $Method, NULL), $this);
            $this->lstServContractual = new clsControl(ccsListBox, "lstServContractual", "Servicio Contractual", ccsText, "", CCGetRequestParam("lstServContractual", $Method, NULL), $this);
            $this->lstServContractual->DSType = dsTable;
            $this->lstServContractual->DataSource = new clsDBcnDisenio();
            $this->lstServContractual->ds = & $this->lstServContractual->DataSource;
            $this->lstServContractual->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_ServContractual {SQL_Where} {SQL_OrderBy}";
            list($this->lstServContractual->BoundColumn, $this->lstServContractual->TextColumn, $this->lstServContractual->DBFormat) = array("Id", "Descripcion", "");
            $this->lstServContractual->DataSource->Parameters["expr170"] = 'CDS';
            $this->lstServContractual->DataSource->wp = new clsSQLParameters();
            $this->lstServContractual->DataSource->wp->AddParameter("1", "expr170", ccsText, "", "", $this->lstServContractual->DataSource->Parameters["expr170"], "", false);
            $this->lstServContractual->DataSource->wp->Criterion[1] = $this->lstServContractual->DataSource->wp->Operation(opEqual, "[Aplica]", $this->lstServContractual->DataSource->wp->GetDBValue("1"), $this->lstServContractual->DataSource->ToSQL($this->lstServContractual->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->lstServContractual->DataSource->Where = 
                 $this->lstServContractual->DataSource->wp->Criterion[1];
            $this->lstServContractual->Required = true;
            $this->sUnidadesManuales = new clsControl(ccsTextBox, "sUnidadesManuales", "Unidades Aprobadas", ccsFloat, "", CCGetRequestParam("sUnidadesManuales", $Method, NULL), $this);
            $this->sUnidadesManuales->Required = true;
            $this->sHorasManuales = new clsControl(ccsTextBox, "sHorasManuales", "Horas Aprobadas", ccsFloat, "", CCGetRequestParam("sHorasManuales", $Method, NULL), $this);
            $this->sHorasManuales->Required = true;
            $this->lServContractual = new clsControl(ccsLabel, "lServContractual", "lServContractual", ccsText, "", CCGetRequestParam("lServContractual", $Method, NULL), $this);
            $this->lServNegocio = new clsControl(ccsLabel, "lServNegocio", "lServNegocio", ccsText, "", CCGetRequestParam("lServNegocio", $Method, NULL), $this);
            $this->hIDPPMC = new clsControl(ccsHidden, "hIDPPMC", "hIDPPMC", ccsInteger, "", CCGetRequestParam("hIDPPMC", $Method, NULL), $this);
            $this->hIDPPMC->Required = true;
            $this->FechaEntregaHerramienta = new clsControl(ccsTextBox, "FechaEntregaHerramienta", "Fecha Entrega Herramienta Estimación", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn"), CCGetRequestParam("FechaEntregaHerramienta", $Method, NULL), $this);
            $this->UDX = new clsControl(ccsTextBox, "UDX", "UDX", ccsFloat, "", CCGetRequestParam("UDX", $Method, NULL), $this);
            $this->UDX->Required = true;
            $this->UDA = new clsControl(ccsTextBox, "UDA", "UDA", ccsFloat, "", CCGetRequestParam("UDA", $Method, NULL), $this);
            $this->UDA->Required = true;
            $this->USP = new clsControl(ccsTextBox, "USP", "USP", ccsFloat, "", CCGetRequestParam("USP", $Method, NULL), $this);
            $this->USP->Required = true;
            $this->URLEvidencia = new clsControl(ccsCheckBox, "URLEvidencia", "URLEvidencia", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("URLEvidencia", $Method, NULL), $this);
            $this->URLEvidencia->CheckedValue = true;
            $this->URLEvidencia->UncheckedValue = false;
            $this->formatoEvidencia = new clsControl(ccsCheckBox, "formatoEvidencia", "formatoEvidencia", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("formatoEvidencia", $Method, NULL), $this);
            $this->formatoEvidencia->CheckedValue = true;
            $this->formatoEvidencia->UncheckedValue = false;
            $this->IDsCorrectos = new clsControl(ccsCheckBox, "IDsCorrectos", "IDsCorrectos", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("IDsCorrectos", $Method, NULL), $this);
            $this->IDsCorrectos->CheckedValue = true;
            $this->IDsCorrectos->UncheckedValue = false;
            $this->TipoPadre = new clsControl(ccsListBox, "TipoPadre", "Tipo Padre", ccsInteger, "", CCGetRequestParam("TipoPadre", $Method, NULL), $this);
            $this->TipoPadre->DSType = dsTable;
            $this->TipoPadre->DataSource = new clsDBcnDisenio();
            $this->TipoPadre->ds = & $this->TipoPadre->DataSource;
            $this->TipoPadre->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_TipoPPMC {SQL_Where} {SQL_OrderBy}";
            list($this->TipoPadre->BoundColumn, $this->TipoPadre->TextColumn, $this->TipoPadre->DBFormat) = array("Id", "Descripcion", "");
            $this->hdUsrUltMod = new clsControl(ccsHidden, "hdUsrUltMod", "hdUsrUltMod", ccsText, "", CCGetRequestParam("hdUsrUltMod", $Method, NULL), $this);
            $this->DatosUltMod = new clsControl(ccsLabel, "DatosUltMod", "DatosUltMod", ccsText, "", CCGetRequestParam("DatosUltMod", $Method, NULL), $this);
            $this->hdFechaUltMod = new clsControl(ccsHidden, "hdFechaUltMod", "hdFechaUltMod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn"), CCGetRequestParam("hdFechaUltMod", $Method, NULL), $this);
            $this->btnCalcular = new clsButton("btnCalcular", $Method, $this);
            $this->hdEstado = new clsControl(ccsHidden, "hdEstado", "hdEstado", ccsText, "", CCGetRequestParam("hdEstado", $Method, NULL), $this);
            $this->hdNombreProyecto = new clsControl(ccsHidden, "hdNombreProyecto", "hdNombreProyecto", ccsText, "", CCGetRequestParam("hdNombreProyecto", $Method, NULL), $this);
            $this->URLEvidenciaMed = new clsControl(ccsTextBox, "URLEvidenciaMed", "URLEvidenciaMed", ccsText, "", CCGetRequestParam("URLEvidenciaMed", $Method, NULL), $this);
            $this->SinEvidencia = new clsControl(ccsCheckBox, "SinEvidencia", "SinEvidencia", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("SinEvidencia", $Method, NULL), $this);
            $this->SinEvidencia->CheckedValue = true;
            $this->SinEvidencia->UncheckedValue = false;
            $this->UST = new clsControl(ccsTextBox, "UST", "UST", ccsFloat, "", CCGetRequestParam("UST", $Method, NULL), $this);
            $this->UST->Required = true;
            $this->UPL = new clsControl(ccsTextBox, "UPL", "UPL", ccsFloat, "", CCGetRequestParam("UPL", $Method, NULL), $this);
            $this->DHoraSAT = new clsControl(ccsTextBox, "DHoraSAT", "DHoraSAT", ccsInteger, "", CCGetRequestParam("DHoraSAT", $Method, NULL), $this);
            $this->DMinSAT = new clsControl(ccsTextBox, "DMinSAT", "DMinSAT", ccsInteger, "", CCGetRequestParam("DMinSAT", $Method, NULL), $this);
            $this->DSegSAT = new clsControl(ccsTextBox, "DSegSAT", "DSegSAT", ccsInteger, "", CCGetRequestParam("DSegSAT", $Method, NULL), $this);
            $this->HorasSAT = new clsControl(ccsHidden, "HorasSAT", "HorasSAT", ccsFloat, "", CCGetRequestParam("HorasSAT", $Method, NULL), $this);
            $this->SinHerramienta = new clsControl(ccsCheckBox, "SinHerramienta", "SinHerramienta", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("SinHerramienta", $Method, NULL), $this);
            $this->SinHerramienta->CheckedValue = true;
            $this->SinHerramienta->UncheckedValue = false;
            $this->PPMMalCatalogado = new clsControl(ccsCheckBox, "PPMMalCatalogado", "PPMMalCatalogado", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("PPMMalCatalogado", $Method, NULL), $this);
            $this->PPMMalCatalogado->CheckedValue = true;
            $this->PPMMalCatalogado->UncheckedValue = false;
            $this->EstNoAprobada = new clsControl(ccsCheckBox, "EstNoAprobada", "EstNoAprobada", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("EstNoAprobada", $Method, NULL), $this);
            $this->EstNoAprobada->CheckedValue = true;
            $this->EstNoAprobada->UncheckedValue = false;
            if(!$this->FormSubmitted) {
                if(!is_array($this->URLEvidencia->Value) && !strlen($this->URLEvidencia->Value) && $this->URLEvidencia->Value !== false)
                    $this->URLEvidencia->SetValue(false);
                if(!is_array($this->formatoEvidencia->Value) && !strlen($this->formatoEvidencia->Value) && $this->formatoEvidencia->Value !== false)
                    $this->formatoEvidencia->SetValue(false);
                if(!is_array($this->IDsCorrectos->Value) && !strlen($this->IDsCorrectos->Value) && $this->IDsCorrectos->Value !== false)
                    $this->IDsCorrectos->SetValue(false);
                if(!is_array($this->hdFechaUltMod->Value) && !strlen($this->hdFechaUltMod->Value) && $this->hdFechaUltMod->Value !== false)
                    $this->hdFechaUltMod->SetText(date("Y-m-d H:i"));
                if(!is_array($this->SinEvidencia->Value) && !strlen($this->SinEvidencia->Value) && $this->SinEvidencia->Value !== false)
                    $this->SinEvidencia->SetValue(false);
                if(!is_array($this->SinHerramienta->Value) && !strlen($this->SinHerramienta->Value) && $this->SinHerramienta->Value !== false)
                    $this->SinHerramienta->SetValue(false);
                if(!is_array($this->PPMMalCatalogado->Value) && !strlen($this->PPMMalCatalogado->Value) && $this->PPMMalCatalogado->Value !== false)
                    $this->PPMMalCatalogado->SetValue(false);
                if(!is_array($this->EstNoAprobada->Value) && !strlen($this->EstNoAprobada->Value) && $this->EstNoAprobada->Value !== false)
                    $this->EstNoAprobada->SetValue(false);
            }
            if(!is_array($this->sIdPPMC->Value) && !strlen($this->sIdPPMC->Value) && $this->sIdPPMC->Value !== false)
                $this->sIdPPMC->SetText(CCGetParam("ID_PPMC"));
        }
    }
//End Class_Initialize Event

//Initialize Method @3-8CCBE5AE
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlsID"] = CCGetFromGet("sID", NULL);
    }
//End Initialize Method

//Validate Method @3-16A2641F
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->URLReferencia->Validate() && $Validation);
        $Validation = ($this->FechaAsignacion->Validate() && $Validation);
        $Validation = ($this->FechaEntregaPropuesta->Validate() && $Validation);
        $Validation = ($this->FechaEntregaEvidencia->Validate() && $Validation);
        $Validation = ($this->FechaAceptacionPropuesta->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->CumplioRS->Validate() && $Validation);
        $Validation = ($this->sServicioNegocio->Validate() && $Validation);
        $Validation = ($this->sTipoRequerimiento->Validate() && $Validation);
        $Validation = ($this->sID->Validate() && $Validation);
        $Validation = ($this->CumplioHE->Validate() && $Validation);
        $Validation = ($this->sDatosPadre->Validate() && $Validation);
        $Validation = ($this->sDiasPropuesta->Validate() && $Validation);
        $Validation = ($this->hdUsrAlta->Validate() && $Validation);
        $Validation = ($this->lstServContractual->Validate() && $Validation);
        $Validation = ($this->sUnidadesManuales->Validate() && $Validation);
        $Validation = ($this->sHorasManuales->Validate() && $Validation);
        $Validation = ($this->hIDPPMC->Validate() && $Validation);
        $Validation = ($this->FechaEntregaHerramienta->Validate() && $Validation);
        $Validation = ($this->UDX->Validate() && $Validation);
        $Validation = ($this->UDA->Validate() && $Validation);
        $Validation = ($this->USP->Validate() && $Validation);
        $Validation = ($this->URLEvidencia->Validate() && $Validation);
        $Validation = ($this->formatoEvidencia->Validate() && $Validation);
        $Validation = ($this->IDsCorrectos->Validate() && $Validation);
        $Validation = ($this->TipoPadre->Validate() && $Validation);
        $Validation = ($this->hdUsrUltMod->Validate() && $Validation);
        $Validation = ($this->hdFechaUltMod->Validate() && $Validation);
        $Validation = ($this->hdEstado->Validate() && $Validation);
        $Validation = ($this->hdNombreProyecto->Validate() && $Validation);
        $Validation = ($this->URLEvidenciaMed->Validate() && $Validation);
        $Validation = ($this->SinEvidencia->Validate() && $Validation);
        $Validation = ($this->UST->Validate() && $Validation);
        $Validation = ($this->UPL->Validate() && $Validation);
        $Validation = ($this->DHoraSAT->Validate() && $Validation);
        $Validation = ($this->DMinSAT->Validate() && $Validation);
        $Validation = ($this->DSegSAT->Validate() && $Validation);
        $Validation = ($this->HorasSAT->Validate() && $Validation);
        $Validation = ($this->SinHerramienta->Validate() && $Validation);
        $Validation = ($this->PPMMalCatalogado->Validate() && $Validation);
        $Validation = ($this->EstNoAprobada->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->URLReferencia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaAsignacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaEntregaPropuesta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaEntregaEvidencia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaAceptacionPropuesta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumplioRS->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sServicioNegocio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sTipoRequerimiento->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumplioHE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sDatosPadre->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sDiasPropuesta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdUsrAlta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->lstServContractual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sUnidadesManuales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sHorasManuales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hIDPPMC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaEntregaHerramienta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UDX->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UDA->Errors->Count() == 0);
        $Validation =  $Validation && ($this->USP->Errors->Count() == 0);
        $Validation =  $Validation && ($this->URLEvidencia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->formatoEvidencia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IDsCorrectos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TipoPadre->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdUsrUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdFechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdEstado->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdNombreProyecto->Errors->Count() == 0);
        $Validation =  $Validation && ($this->URLEvidenciaMed->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SinEvidencia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UST->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPL->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DHoraSAT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DMinSAT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DSegSAT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HorasSAT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SinHerramienta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PPMMalCatalogado->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EstNoAprobada->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-9D3F0A29
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Id_Proveedor->Errors->Count());
        $errors = ($errors || $this->URLReferencia->Errors->Count());
        $errors = ($errors || $this->FechaAsignacion->Errors->Count());
        $errors = ($errors || $this->FechaEntregaPropuesta->Errors->Count());
        $errors = ($errors || $this->FechaEntregaEvidencia->Errors->Count());
        $errors = ($errors || $this->FechaAceptacionPropuesta->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->CumplioRS->Errors->Count());
        $errors = ($errors || $this->sIdPPMC->Errors->Count());
        $errors = ($errors || $this->sNombreProyecto->Errors->Count());
        $errors = ($errors || $this->sServicioNegocio->Errors->Count());
        $errors = ($errors || $this->sTipoRequerimiento->Errors->Count());
        $errors = ($errors || $this->sID->Errors->Count());
        $errors = ($errors || $this->CumplioHE->Errors->Count());
        $errors = ($errors || $this->sEstadoPPMC->Errors->Count());
        $errors = ($errors || $this->sIDEstimacion->Errors->Count());
        $errors = ($errors || $this->sUnidades->Errors->Count());
        $errors = ($errors || $this->sDatosPadre->Errors->Count());
        $errors = ($errors || $this->sHrsPropuesta->Errors->Count());
        $errors = ($errors || $this->sDiasPropuesta->Errors->Count());
        $errors = ($errors || $this->sRAPE->Errors->Count());
        $errors = ($errors || $this->hdUsrAlta->Errors->Count());
        $errors = ($errors || $this->lstServContractual->Errors->Count());
        $errors = ($errors || $this->sUnidadesManuales->Errors->Count());
        $errors = ($errors || $this->sHorasManuales->Errors->Count());
        $errors = ($errors || $this->lServContractual->Errors->Count());
        $errors = ($errors || $this->lServNegocio->Errors->Count());
        $errors = ($errors || $this->hIDPPMC->Errors->Count());
        $errors = ($errors || $this->FechaEntregaHerramienta->Errors->Count());
        $errors = ($errors || $this->UDX->Errors->Count());
        $errors = ($errors || $this->UDA->Errors->Count());
        $errors = ($errors || $this->USP->Errors->Count());
        $errors = ($errors || $this->URLEvidencia->Errors->Count());
        $errors = ($errors || $this->formatoEvidencia->Errors->Count());
        $errors = ($errors || $this->IDsCorrectos->Errors->Count());
        $errors = ($errors || $this->TipoPadre->Errors->Count());
        $errors = ($errors || $this->hdUsrUltMod->Errors->Count());
        $errors = ($errors || $this->DatosUltMod->Errors->Count());
        $errors = ($errors || $this->hdFechaUltMod->Errors->Count());
        $errors = ($errors || $this->hdEstado->Errors->Count());
        $errors = ($errors || $this->hdNombreProyecto->Errors->Count());
        $errors = ($errors || $this->URLEvidenciaMed->Errors->Count());
        $errors = ($errors || $this->SinEvidencia->Errors->Count());
        $errors = ($errors || $this->UST->Errors->Count());
        $errors = ($errors || $this->UPL->Errors->Count());
        $errors = ($errors || $this->DHoraSAT->Errors->Count());
        $errors = ($errors || $this->DMinSAT->Errors->Count());
        $errors = ($errors || $this->DSegSAT->Errors->Count());
        $errors = ($errors || $this->HorasSAT->Errors->Count());
        $errors = ($errors || $this->SinHerramienta->Errors->Count());
        $errors = ($errors || $this->PPMMalCatalogado->Errors->Count());
        $errors = ($errors || $this->EstNoAprobada->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-2CC8303E
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
            } else if($this->btnCalcular->Pressed) {
                $this->PressedButton = "btnCalcular";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete)) {
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
            } else if($this->PressedButton == "btnCalcular") {
                if(!CCGetEvent($this->btnCalcular->CCSEvents, "OnClick", $this->btnCalcular)) {
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

//InsertRow Method @3-D9527254
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Id_Proveedor->SetValue($this->Id_Proveedor->GetValue(true));
        $this->DataSource->URLReferencia->SetValue($this->URLReferencia->GetValue(true));
        $this->DataSource->FechaAsignacion->SetValue($this->FechaAsignacion->GetValue(true));
        $this->DataSource->FechaEntregaPropuesta->SetValue($this->FechaEntregaPropuesta->GetValue(true));
        $this->DataSource->FechaEntregaEvidencia->SetValue($this->FechaEntregaEvidencia->GetValue(true));
        $this->DataSource->FechaAceptacionPropuesta->SetValue($this->FechaAceptacionPropuesta->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->CumplioRS->SetValue($this->CumplioRS->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->sServicioNegocio->SetValue($this->sServicioNegocio->GetValue(true));
        $this->DataSource->sTipoRequerimiento->SetValue($this->sTipoRequerimiento->GetValue(true));
        $this->DataSource->sID->SetValue($this->sID->GetValue(true));
        $this->DataSource->CumplioHE->SetValue($this->CumplioHE->GetValue(true));
        $this->DataSource->sEstadoPPMC->SetValue($this->sEstadoPPMC->GetValue(true));
        $this->DataSource->sIDEstimacion->SetValue($this->sIDEstimacion->GetValue(true));
        $this->DataSource->sUnidades->SetValue($this->sUnidades->GetValue(true));
        $this->DataSource->sDatosPadre->SetValue($this->sDatosPadre->GetValue(true));
        $this->DataSource->sHrsPropuesta->SetValue($this->sHrsPropuesta->GetValue(true));
        $this->DataSource->sDiasPropuesta->SetValue($this->sDiasPropuesta->GetValue(true));
        $this->DataSource->sRAPE->SetValue($this->sRAPE->GetValue(true));
        $this->DataSource->hdUsrAlta->SetValue($this->hdUsrAlta->GetValue(true));
        $this->DataSource->lstServContractual->SetValue($this->lstServContractual->GetValue(true));
        $this->DataSource->sUnidadesManuales->SetValue($this->sUnidadesManuales->GetValue(true));
        $this->DataSource->sHorasManuales->SetValue($this->sHorasManuales->GetValue(true));
        $this->DataSource->lServContractual->SetValue($this->lServContractual->GetValue(true));
        $this->DataSource->lServNegocio->SetValue($this->lServNegocio->GetValue(true));
        $this->DataSource->hIDPPMC->SetValue($this->hIDPPMC->GetValue(true));
        $this->DataSource->FechaEntregaHerramienta->SetValue($this->FechaEntregaHerramienta->GetValue(true));
        $this->DataSource->UDX->SetValue($this->UDX->GetValue(true));
        $this->DataSource->UDA->SetValue($this->UDA->GetValue(true));
        $this->DataSource->USP->SetValue($this->USP->GetValue(true));
        $this->DataSource->URLEvidencia->SetValue($this->URLEvidencia->GetValue(true));
        $this->DataSource->formatoEvidencia->SetValue($this->formatoEvidencia->GetValue(true));
        $this->DataSource->IDsCorrectos->SetValue($this->IDsCorrectos->GetValue(true));
        $this->DataSource->TipoPadre->SetValue($this->TipoPadre->GetValue(true));
        $this->DataSource->hdUsrUltMod->SetValue($this->hdUsrUltMod->GetValue(true));
        $this->DataSource->DatosUltMod->SetValue($this->DatosUltMod->GetValue(true));
        $this->DataSource->hdFechaUltMod->SetValue($this->hdFechaUltMod->GetValue(true));
        $this->DataSource->hdEstado->SetValue($this->hdEstado->GetValue(true));
        $this->DataSource->hdNombreProyecto->SetValue($this->hdNombreProyecto->GetValue(true));
        $this->DataSource->URLEvidenciaMed->SetValue($this->URLEvidenciaMed->GetValue(true));
        $this->DataSource->SinEvidencia->SetValue($this->SinEvidencia->GetValue(true));
        $this->DataSource->UST->SetValue($this->UST->GetValue(true));
        $this->DataSource->UPL->SetValue($this->UPL->GetValue(true));
        $this->DataSource->DHoraSAT->SetValue($this->DHoraSAT->GetValue(true));
        $this->DataSource->DMinSAT->SetValue($this->DMinSAT->GetValue(true));
        $this->DataSource->DSegSAT->SetValue($this->DSegSAT->GetValue(true));
        $this->DataSource->HorasSAT->SetValue($this->HorasSAT->GetValue(true));
        $this->DataSource->SinHerramienta->SetValue($this->SinHerramienta->GetValue(true));
        $this->DataSource->PPMMalCatalogado->SetValue($this->PPMMalCatalogado->GetValue(true));
        $this->DataSource->EstNoAprobada->SetValue($this->EstNoAprobada->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-4B6B6A11
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Id_Proveedor->SetValue($this->Id_Proveedor->GetValue(true));
        $this->DataSource->URLReferencia->SetValue($this->URLReferencia->GetValue(true));
        $this->DataSource->FechaAsignacion->SetValue($this->FechaAsignacion->GetValue(true));
        $this->DataSource->FechaEntregaPropuesta->SetValue($this->FechaEntregaPropuesta->GetValue(true));
        $this->DataSource->FechaEntregaEvidencia->SetValue($this->FechaEntregaEvidencia->GetValue(true));
        $this->DataSource->FechaAceptacionPropuesta->SetValue($this->FechaAceptacionPropuesta->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->CumplioRS->SetValue($this->CumplioRS->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->sServicioNegocio->SetValue($this->sServicioNegocio->GetValue(true));
        $this->DataSource->sTipoRequerimiento->SetValue($this->sTipoRequerimiento->GetValue(true));
        $this->DataSource->sID->SetValue($this->sID->GetValue(true));
        $this->DataSource->CumplioHE->SetValue($this->CumplioHE->GetValue(true));
        $this->DataSource->sEstadoPPMC->SetValue($this->sEstadoPPMC->GetValue(true));
        $this->DataSource->sIDEstimacion->SetValue($this->sIDEstimacion->GetValue(true));
        $this->DataSource->sUnidades->SetValue($this->sUnidades->GetValue(true));
        $this->DataSource->sDatosPadre->SetValue($this->sDatosPadre->GetValue(true));
        $this->DataSource->sHrsPropuesta->SetValue($this->sHrsPropuesta->GetValue(true));
        $this->DataSource->sDiasPropuesta->SetValue($this->sDiasPropuesta->GetValue(true));
        $this->DataSource->sRAPE->SetValue($this->sRAPE->GetValue(true));
        $this->DataSource->hdUsrAlta->SetValue($this->hdUsrAlta->GetValue(true));
        $this->DataSource->lstServContractual->SetValue($this->lstServContractual->GetValue(true));
        $this->DataSource->sUnidadesManuales->SetValue($this->sUnidadesManuales->GetValue(true));
        $this->DataSource->sHorasManuales->SetValue($this->sHorasManuales->GetValue(true));
        $this->DataSource->lServContractual->SetValue($this->lServContractual->GetValue(true));
        $this->DataSource->lServNegocio->SetValue($this->lServNegocio->GetValue(true));
        $this->DataSource->hIDPPMC->SetValue($this->hIDPPMC->GetValue(true));
        $this->DataSource->FechaEntregaHerramienta->SetValue($this->FechaEntregaHerramienta->GetValue(true));
        $this->DataSource->UDX->SetValue($this->UDX->GetValue(true));
        $this->DataSource->UDA->SetValue($this->UDA->GetValue(true));
        $this->DataSource->USP->SetValue($this->USP->GetValue(true));
        $this->DataSource->URLEvidencia->SetValue($this->URLEvidencia->GetValue(true));
        $this->DataSource->formatoEvidencia->SetValue($this->formatoEvidencia->GetValue(true));
        $this->DataSource->IDsCorrectos->SetValue($this->IDsCorrectos->GetValue(true));
        $this->DataSource->TipoPadre->SetValue($this->TipoPadre->GetValue(true));
        $this->DataSource->hdUsrUltMod->SetValue($this->hdUsrUltMod->GetValue(true));
        $this->DataSource->DatosUltMod->SetValue($this->DatosUltMod->GetValue(true));
        $this->DataSource->hdFechaUltMod->SetValue($this->hdFechaUltMod->GetValue(true));
        $this->DataSource->hdEstado->SetValue($this->hdEstado->GetValue(true));
        $this->DataSource->hdNombreProyecto->SetValue($this->hdNombreProyecto->GetValue(true));
        $this->DataSource->URLEvidenciaMed->SetValue($this->URLEvidenciaMed->GetValue(true));
        $this->DataSource->SinEvidencia->SetValue($this->SinEvidencia->GetValue(true));
        $this->DataSource->UST->SetValue($this->UST->GetValue(true));
        $this->DataSource->UPL->SetValue($this->UPL->GetValue(true));
        $this->DataSource->DHoraSAT->SetValue($this->DHoraSAT->GetValue(true));
        $this->DataSource->DMinSAT->SetValue($this->DMinSAT->GetValue(true));
        $this->DataSource->DSegSAT->SetValue($this->DSegSAT->GetValue(true));
        $this->DataSource->HorasSAT->SetValue($this->HorasSAT->GetValue(true));
        $this->DataSource->SinHerramienta->SetValue($this->SinHerramienta->GetValue(true));
        $this->DataSource->PPMMalCatalogado->SetValue($this->PPMMalCatalogado->GetValue(true));
        $this->DataSource->EstNoAprobada->SetValue($this->EstNoAprobada->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @3-484DB736
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

        $this->CumplioRS->Prepare();
        $this->sServicioNegocio->Prepare();
        $this->sTipoRequerimiento->Prepare();
        $this->CumplioHE->Prepare();
        $this->lstServContractual->Prepare();
        $this->TipoPadre->Prepare();

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
                $this->Id_Proveedor->SetValue($this->DataSource->Id_Proveedor->GetValue());
                if(!$this->FormSubmitted){
                    $this->URLReferencia->SetValue($this->DataSource->URLReferencia->GetValue());
                    $this->FechaAsignacion->SetValue($this->DataSource->FechaAsignacion->GetValue());
                    $this->FechaEntregaPropuesta->SetValue($this->DataSource->FechaEntregaPropuesta->GetValue());
                    $this->FechaEntregaEvidencia->SetValue($this->DataSource->FechaEntregaEvidencia->GetValue());
                    $this->FechaAceptacionPropuesta->SetValue($this->DataSource->FechaAceptacionPropuesta->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                    $this->CumplioRS->SetValue($this->DataSource->CumplioRS->GetValue());
                    $this->sServicioNegocio->SetValue($this->DataSource->sServicioNegocio->GetValue());
                    $this->sTipoRequerimiento->SetValue($this->DataSource->sTipoRequerimiento->GetValue());
                    $this->sID->SetValue($this->DataSource->sID->GetValue());
                    $this->CumplioHE->SetValue($this->DataSource->CumplioHE->GetValue());
                    $this->sDatosPadre->SetValue($this->DataSource->sDatosPadre->GetValue());
                    $this->sDiasPropuesta->SetValue($this->DataSource->sDiasPropuesta->GetValue());
                    $this->hdUsrAlta->SetValue($this->DataSource->hdUsrAlta->GetValue());
                    $this->lstServContractual->SetValue($this->DataSource->lstServContractual->GetValue());
                    $this->sUnidadesManuales->SetValue($this->DataSource->sUnidadesManuales->GetValue());
                    $this->sHorasManuales->SetValue($this->DataSource->sHorasManuales->GetValue());
                    $this->hIDPPMC->SetValue($this->DataSource->hIDPPMC->GetValue());
                    $this->FechaEntregaHerramienta->SetValue($this->DataSource->FechaEntregaHerramienta->GetValue());
                    $this->UDX->SetValue($this->DataSource->UDX->GetValue());
                    $this->UDA->SetValue($this->DataSource->UDA->GetValue());
                    $this->USP->SetValue($this->DataSource->USP->GetValue());
                    $this->URLEvidencia->SetValue($this->DataSource->URLEvidencia->GetValue());
                    $this->formatoEvidencia->SetValue($this->DataSource->formatoEvidencia->GetValue());
                    $this->IDsCorrectos->SetValue($this->DataSource->IDsCorrectos->GetValue());
                    $this->TipoPadre->SetValue($this->DataSource->TipoPadre->GetValue());
                    $this->hdUsrUltMod->SetValue($this->DataSource->hdUsrUltMod->GetValue());
                    $this->hdFechaUltMod->SetValue($this->DataSource->hdFechaUltMod->GetValue());
                    $this->URLEvidenciaMed->SetValue($this->DataSource->URLEvidenciaMed->GetValue());
                    $this->SinEvidencia->SetValue($this->DataSource->SinEvidencia->GetValue());
                    $this->UST->SetValue($this->DataSource->UST->GetValue());
                    $this->UPL->SetValue($this->DataSource->UPL->GetValue());
                    $this->HorasSAT->SetValue($this->DataSource->HorasSAT->GetValue());
                    $this->SinHerramienta->SetValue($this->DataSource->SinHerramienta->GetValue());
                    $this->PPMMalCatalogado->SetValue($this->DataSource->PPMMalCatalogado->GetValue());
                    $this->EstNoAprobada->SetValue($this->DataSource->EstNoAprobada->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }
        if ($this->DHoraSAT->GetValue() < 0 )
             $this->DHoraSAT->Text = CCFormatNumber($this->DHoraSAT->GetValue(), array(False, 0, Null, "", True, "(", ")", 1, True, ""));
        else
             $this->DHoraSAT->Text = CCFormatNumber($this->DHoraSAT->GetValue(), array(False, 0, Null, "", False, "", "", 1, True, ""));
        if ($this->DMinSAT->GetValue() < 0 )
             $this->DMinSAT->Text = CCFormatNumber($this->DMinSAT->GetValue(), array(False, 0, Null, "", True, "(", ")", 1, True, ""));
        else
             $this->DMinSAT->Text = CCFormatNumber($this->DMinSAT->GetValue(), array(False, 0, Null, "", False, "", "", 1, True, ""));
        if ($this->DSegSAT->GetValue() < 0 )
             $this->DSegSAT->Text = CCFormatNumber($this->DSegSAT->GetValue(), array(False, 0, Null, "", True, "(", ")", 1, True, ""));
        else
             $this->DSegSAT->Text = CCFormatNumber($this->DSegSAT->GetValue(), array(False, 0, Null, "", False, "", "", 1, True, ""));

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Id_Proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->URLReferencia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaAsignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaEntregaPropuesta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaEntregaEvidencia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaAceptacionPropuesta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumplioRS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sIdPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sNombreProyecto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sServicioNegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sTipoRequerimiento->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumplioHE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sEstadoPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sIDEstimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sUnidades->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sDatosPadre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sHrsPropuesta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sDiasPropuesta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sRAPE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdUsrAlta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lstServContractual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sUnidadesManuales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sHorasManuales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lServContractual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lServNegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hIDPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaEntregaHerramienta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UDX->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UDA->Errors->ToString());
            $Error = ComposeStrings($Error, $this->USP->Errors->ToString());
            $Error = ComposeStrings($Error, $this->URLEvidencia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->formatoEvidencia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IDsCorrectos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TipoPadre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdUsrUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatosUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdFechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdEstado->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdNombreProyecto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->URLEvidenciaMed->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SinEvidencia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UST->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPL->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DHoraSAT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DMinSAT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DSegSAT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HorasSAT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SinHerramienta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PPMMalCatalogado->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EstNoAprobada->Errors->ToString());
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
        $this->Id_Proveedor->Show();
        $this->URLReferencia->Show();
        $this->FechaAsignacion->Show();
        $this->FechaEntregaPropuesta->Show();
        $this->FechaEntregaEvidencia->Show();
        $this->FechaAceptacionPropuesta->Show();
        $this->Observaciones->Show();
        $this->CumplioRS->Show();
        $this->sIdPPMC->Show();
        $this->sNombreProyecto->Show();
        $this->sServicioNegocio->Show();
        $this->sTipoRequerimiento->Show();
        $this->sID->Show();
        $this->CumplioHE->Show();
        $this->sEstadoPPMC->Show();
        $this->sIDEstimacion->Show();
        $this->sUnidades->Show();
        $this->sDatosPadre->Show();
        $this->sHrsPropuesta->Show();
        $this->sDiasPropuesta->Show();
        $this->sRAPE->Show();
        $this->hdUsrAlta->Show();
        $this->lstServContractual->Show();
        $this->sUnidadesManuales->Show();
        $this->sHorasManuales->Show();
        $this->lServContractual->Show();
        $this->lServNegocio->Show();
        $this->hIDPPMC->Show();
        $this->FechaEntregaHerramienta->Show();
        $this->UDX->Show();
        $this->UDA->Show();
        $this->USP->Show();
        $this->URLEvidencia->Show();
        $this->formatoEvidencia->Show();
        $this->IDsCorrectos->Show();
        $this->TipoPadre->Show();
        $this->hdUsrUltMod->Show();
        $this->DatosUltMod->Show();
        $this->hdFechaUltMod->Show();
        $this->btnCalcular->Show();
        $this->hdEstado->Show();
        $this->hdNombreProyecto->Show();
        $this->URLEvidenciaMed->Show();
        $this->SinEvidencia->Show();
        $this->UST->Show();
        $this->UPL->Show();
        $this->DHoraSAT->Show();
        $this->DMinSAT->Show();
        $this->DSegSAT->Show();
        $this->HorasSAT->Show();
        $this->SinHerramienta->Show();
        $this->PPMMalCatalogado->Show();
        $this->EstNoAprobada->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_rs_ap_EC Class @3-FCB6E20C

class clsmc_info_rs_ap_ECDataSource extends clsDBcnDisenio {  //mc_info_rs_ap_ECDataSource Class @3-9CE83123

//DataSource Variables @3-FADC75A2
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $Id_Proveedor;
    public $URLReferencia;
    public $FechaAsignacion;
    public $FechaEntregaPropuesta;
    public $FechaEntregaEvidencia;
    public $FechaAceptacionPropuesta;
    public $Observaciones;
    public $CumplioRS;
    public $sIdPPMC;
    public $sNombreProyecto;
    public $sServicioNegocio;
    public $sTipoRequerimiento;
    public $sID;
    public $CumplioHE;
    public $sEstadoPPMC;
    public $sIDEstimacion;
    public $sUnidades;
    public $sDatosPadre;
    public $sHrsPropuesta;
    public $sDiasPropuesta;
    public $sRAPE;
    public $hdUsrAlta;
    public $lstServContractual;
    public $sUnidadesManuales;
    public $sHorasManuales;
    public $lServContractual;
    public $lServNegocio;
    public $hIDPPMC;
    public $FechaEntregaHerramienta;
    public $UDX;
    public $UDA;
    public $USP;
    public $URLEvidencia;
    public $formatoEvidencia;
    public $IDsCorrectos;
    public $TipoPadre;
    public $hdUsrUltMod;
    public $DatosUltMod;
    public $hdFechaUltMod;
    public $hdEstado;
    public $hdNombreProyecto;
    public $URLEvidenciaMed;
    public $SinEvidencia;
    public $UST;
    public $UPL;
    public $DHoraSAT;
    public $DMinSAT;
    public $DSegSAT;
    public $HorasSAT;
    public $SinHerramienta;
    public $PPMMalCatalogado;
    public $EstNoAprobada;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-1F33FCB7
    function clsmc_info_rs_ap_ECDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_rs_ap_EC/Error";
        $this->Initialize();
        $this->Id_Proveedor = new clsField("Id_Proveedor", ccsInteger, "");
        
        $this->URLReferencia = new clsField("URLReferencia", ccsMemo, "");
        
        $this->FechaAsignacion = new clsField("FechaAsignacion", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaEntregaPropuesta = new clsField("FechaEntregaPropuesta", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaEntregaEvidencia = new clsField("FechaEntregaEvidencia", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaAceptacionPropuesta = new clsField("FechaAceptacionPropuesta", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->Observaciones = new clsField("Observaciones", ccsMemo, "");
        
        $this->CumplioRS = new clsField("CumplioRS", ccsInteger, "");
        
        $this->sIdPPMC = new clsField("sIdPPMC", ccsText, "");
        
        $this->sNombreProyecto = new clsField("sNombreProyecto", ccsText, "");
        
        $this->sServicioNegocio = new clsField("sServicioNegocio", ccsText, "");
        
        $this->sTipoRequerimiento = new clsField("sTipoRequerimiento", ccsText, "");
        
        $this->sID = new clsField("sID", ccsInteger, "");
        
        $this->CumplioHE = new clsField("CumplioHE", ccsInteger, "");
        
        $this->sEstadoPPMC = new clsField("sEstadoPPMC", ccsText, "");
        
        $this->sIDEstimacion = new clsField("sIDEstimacion", ccsText, "");
        
        $this->sUnidades = new clsField("sUnidades", ccsText, "");
        
        $this->sDatosPadre = new clsField("sDatosPadre", ccsInteger, "");
        
        $this->sHrsPropuesta = new clsField("sHrsPropuesta", ccsText, "");
        
        $this->sDiasPropuesta = new clsField("sDiasPropuesta", ccsFloat, "");
        
        $this->sRAPE = new clsField("sRAPE", ccsText, "");
        
        $this->hdUsrAlta = new clsField("hdUsrAlta", ccsText, "");
        
        $this->lstServContractual = new clsField("lstServContractual", ccsText, "");
        
        $this->sUnidadesManuales = new clsField("sUnidadesManuales", ccsFloat, "");
        
        $this->sHorasManuales = new clsField("sHorasManuales", ccsFloat, "");
        
        $this->lServContractual = new clsField("lServContractual", ccsText, "");
        
        $this->lServNegocio = new clsField("lServNegocio", ccsText, "");
        
        $this->hIDPPMC = new clsField("hIDPPMC", ccsInteger, "");
        
        $this->FechaEntregaHerramienta = new clsField("FechaEntregaHerramienta", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->UDX = new clsField("UDX", ccsFloat, "");
        
        $this->UDA = new clsField("UDA", ccsFloat, "");
        
        $this->USP = new clsField("USP", ccsFloat, "");
        
        $this->URLEvidencia = new clsField("URLEvidencia", ccsBoolean, $this->BooleanFormat);
        
        $this->formatoEvidencia = new clsField("formatoEvidencia", ccsBoolean, $this->BooleanFormat);
        
        $this->IDsCorrectos = new clsField("IDsCorrectos", ccsBoolean, $this->BooleanFormat);
        
        $this->TipoPadre = new clsField("TipoPadre", ccsInteger, "");
        
        $this->hdUsrUltMod = new clsField("hdUsrUltMod", ccsText, "");
        
        $this->DatosUltMod = new clsField("DatosUltMod", ccsText, "");
        
        $this->hdFechaUltMod = new clsField("hdFechaUltMod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->hdEstado = new clsField("hdEstado", ccsText, "");
        
        $this->hdNombreProyecto = new clsField("hdNombreProyecto", ccsText, "");
        
        $this->URLEvidenciaMed = new clsField("URLEvidenciaMed", ccsText, "");
        
        $this->SinEvidencia = new clsField("SinEvidencia", ccsBoolean, $this->BooleanFormat);
        
        $this->UST = new clsField("UST", ccsFloat, "");
        
        $this->UPL = new clsField("UPL", ccsFloat, "");
        
        $this->DHoraSAT = new clsField("DHoraSAT", ccsInteger, "");
        
        $this->DMinSAT = new clsField("DMinSAT", ccsInteger, "");
        
        $this->DSegSAT = new clsField("DSegSAT", ccsInteger, "");
        
        $this->HorasSAT = new clsField("HorasSAT", ccsFloat, "");
        
        $this->SinHerramienta = new clsField("SinHerramienta", ccsBoolean, $this->BooleanFormat);
        
        $this->PPMMalCatalogado = new clsField("PPMMalCatalogado", ccsBoolean, $this->BooleanFormat);
        
        $this->EstNoAprobada = new clsField("EstNoAprobada", ccsBoolean, $this->BooleanFormat);
        

        $this->InsertFields["URLReferencia"] = array("Name" => "[URLReferencia]", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaAsignacion"] = array("Name" => "[FechaAsignacion]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaEntregaPropuesta"] = array("Name" => "[FechaEntregaPropuesta]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaEntregaEvidencia"] = array("Name" => "[FechaEntregaEvidencia]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaAceptacionPropuesta"] = array("Name" => "[FechaAceptacionPropuesta]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->InsertFields["CumplioRS"] = array("Name" => "[CumplioRS]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["id_servicio_negocio"] = array("Name" => "id_servicio_negocio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["IdTipoReq"] = array("Name" => "[IdTipoReq]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Id"] = array("Name" => "[Id]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["CumplioHE"] = array("Name" => "[CumplioHE]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IdPadre"] = array("Name" => "[IdPadre]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasPropuesta"] = array("Name" => "[DiasPropuesta]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioAlta"] = array("Name" => "[UsuarioAlta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["id_servicio_cont"] = array("Name" => "id_servicio_cont", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UnidadesApb"] = array("Name" => "[UnidadesApb]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["HorasAprobadas"] = array("Name" => "[HorasAprobadas]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["ID_PPMC"] = array("Name" => "ID_PPMC", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaEntregaHerramienta"] = array("Name" => "[FechaEntregaHerramienta]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["UDX"] = array("Name" => "UDX", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["UDA"] = array("Name" => "UDA", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["USP"] = array("Name" => "USP", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["URLInfoEvidencia"] = array("Name" => "[URLInfoEvidencia]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["formatoEvidencia"] = array("Name" => "[formatoEvidencia]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["IDsCorrectos"] = array("Name" => "[IDsCorrectos]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["TipoPadre"] = array("Name" => "[TipoPadre]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["URLEvidencia"] = array("Name" => "[URLEvidencia]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SinEvidencia"] = array("Name" => "[SinEvidencia]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["UST"] = array("Name" => "UST", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["UPL"] = array("Name" => "UPL", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["HorasSAT"] = array("Name" => "[HorasSAT]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["SinHerramienta"] = array("Name" => "[SinHerramienta]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["PPMMalCatalogado"] = array("Name" => "[PPMMalCatalogado]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["EstNoAprobada"] = array("Name" => "[EstNoAprobada]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["URLReferencia"] = array("Name" => "[URLReferencia]", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaAsignacion"] = array("Name" => "[FechaAsignacion]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaEntregaPropuesta"] = array("Name" => "[FechaEntregaPropuesta]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaEntregaEvidencia"] = array("Name" => "[FechaEntregaEvidencia]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaAceptacionPropuesta"] = array("Name" => "[FechaAceptacionPropuesta]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumplioRS"] = array("Name" => "[CumplioRS]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_servicio_negocio"] = array("Name" => "id_servicio_negocio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["IdTipoReq"] = array("Name" => "[IdTipoReq]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id"] = array("Name" => "[Id]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumplioHE"] = array("Name" => "[CumplioHE]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["IdPadre"] = array("Name" => "[IdPadre]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasPropuesta"] = array("Name" => "[DiasPropuesta]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioAlta"] = array("Name" => "[UsuarioAlta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_servicio_cont"] = array("Name" => "id_servicio_cont", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UnidadesApb"] = array("Name" => "[UnidadesApb]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["HorasAprobadas"] = array("Name" => "[HorasAprobadas]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["ID_PPMC"] = array("Name" => "ID_PPMC", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaEntregaHerramienta"] = array("Name" => "[FechaEntregaHerramienta]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["UDX"] = array("Name" => "UDX", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["UDA"] = array("Name" => "UDA", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["USP"] = array("Name" => "USP", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["URLInfoEvidencia"] = array("Name" => "[URLInfoEvidencia]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["formatoEvidencia"] = array("Name" => "[formatoEvidencia]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["IDsCorrectos"] = array("Name" => "[IDsCorrectos]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["TipoPadre"] = array("Name" => "[TipoPadre]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["URLEvidencia"] = array("Name" => "[URLEvidencia]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SinEvidencia"] = array("Name" => "[SinEvidencia]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["UST"] = array("Name" => "UST", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["UPL"] = array("Name" => "UPL", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["HorasSAT"] = array("Name" => "[HorasSAT]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["SinHerramienta"] = array("Name" => "[SinHerramienta]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["PPMMalCatalogado"] = array("Name" => "[PPMMalCatalogado]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["EstNoAprobada"] = array("Name" => "[EstNoAprobada]", "Value" => "", "DataType" => ccsBoolean);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-F4F588D0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlsID", ccsInteger, "", "", $this->Parameters["urlsID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[Id]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @3-F1DFD519
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_info_rs_ap_EC {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-FFBD2673
    function SetValues()
    {
        $this->Id_Proveedor->SetDBValue(trim($this->f("Id_Proveedor")));
        $this->URLReferencia->SetDBValue($this->f("URLReferencia"));
        $this->FechaAsignacion->SetDBValue(trim($this->f("FechaAsignacion")));
        $this->FechaEntregaPropuesta->SetDBValue(trim($this->f("FechaEntregaPropuesta")));
        $this->FechaEntregaEvidencia->SetDBValue(trim($this->f("FechaEntregaEvidencia")));
        $this->FechaAceptacionPropuesta->SetDBValue(trim($this->f("FechaAceptacionPropuesta")));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
        $this->CumplioRS->SetDBValue(trim($this->f("CumplioRS")));
        $this->sServicioNegocio->SetDBValue($this->f("id_servicio_negocio"));
        $this->sTipoRequerimiento->SetDBValue($this->f("IdTipoReq"));
        $this->sID->SetDBValue(trim($this->f("Id")));
        $this->CumplioHE->SetDBValue(trim($this->f("CumplioHE")));
        $this->sDatosPadre->SetDBValue(trim($this->f("IdPadre")));
        $this->sDiasPropuesta->SetDBValue(trim($this->f("DiasPropuesta")));
        $this->hdUsrAlta->SetDBValue($this->f("UsuarioAlta"));
        $this->lstServContractual->SetDBValue($this->f("id_servicio_cont"));
        $this->sUnidadesManuales->SetDBValue(trim($this->f("UnidadesApb")));
        $this->sHorasManuales->SetDBValue(trim($this->f("HorasAprobadas")));
        $this->hIDPPMC->SetDBValue(trim($this->f("ID_PPMC")));
        $this->FechaEntregaHerramienta->SetDBValue(trim($this->f("FechaEntregaHerramienta")));
        $this->UDX->SetDBValue(trim($this->f("UDX")));
        $this->UDA->SetDBValue(trim($this->f("UDA")));
        $this->USP->SetDBValue(trim($this->f("USP")));
        $this->URLEvidencia->SetDBValue(trim($this->f("URLInfoEvidencia")));
        $this->formatoEvidencia->SetDBValue(trim($this->f("formatoEvidencia")));
        $this->IDsCorrectos->SetDBValue(trim($this->f("IDsCorrectos")));
        $this->TipoPadre->SetDBValue(trim($this->f("TipoPadre")));
        $this->hdUsrUltMod->SetDBValue($this->f("UsuarioUltMod"));
        $this->hdFechaUltMod->SetDBValue(trim($this->f("FechaUltMod")));
        $this->URLEvidenciaMed->SetDBValue($this->f("URLEvidencia"));
        $this->SinEvidencia->SetDBValue(trim($this->f("SinEvidencia")));
        $this->UST->SetDBValue(trim($this->f("UST")));
        $this->UPL->SetDBValue(trim($this->f("UPL")));
        $this->HorasSAT->SetDBValue(trim($this->f("HorasSAT")));
        $this->SinHerramienta->SetDBValue(trim($this->f("SinHerramienta")));
        $this->PPMMalCatalogado->SetDBValue(trim($this->f("PPMMalCatalogado")));
        $this->EstNoAprobada->SetDBValue(trim($this->f("EstNoAprobada")));
    }
//End SetValues Method

//Insert Method @3-8E8E1AC4
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["URLReferencia"]["Value"] = $this->URLReferencia->GetDBValue(true);
        $this->InsertFields["FechaAsignacion"]["Value"] = $this->FechaAsignacion->GetDBValue(true);
        $this->InsertFields["FechaEntregaPropuesta"]["Value"] = $this->FechaEntregaPropuesta->GetDBValue(true);
        $this->InsertFields["FechaEntregaEvidencia"]["Value"] = $this->FechaEntregaEvidencia->GetDBValue(true);
        $this->InsertFields["FechaAceptacionPropuesta"]["Value"] = $this->FechaAceptacionPropuesta->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->InsertFields["CumplioRS"]["Value"] = $this->CumplioRS->GetDBValue(true);
        $this->InsertFields["id_servicio_negocio"]["Value"] = $this->sServicioNegocio->GetDBValue(true);
        $this->InsertFields["IdTipoReq"]["Value"] = $this->sTipoRequerimiento->GetDBValue(true);
        $this->InsertFields["Id"]["Value"] = $this->sID->GetDBValue(true);
        $this->InsertFields["CumplioHE"]["Value"] = $this->CumplioHE->GetDBValue(true);
        $this->InsertFields["IdPadre"]["Value"] = $this->sDatosPadre->GetDBValue(true);
        $this->InsertFields["DiasPropuesta"]["Value"] = $this->sDiasPropuesta->GetDBValue(true);
        $this->InsertFields["UsuarioAlta"]["Value"] = $this->hdUsrAlta->GetDBValue(true);
        $this->InsertFields["id_servicio_cont"]["Value"] = $this->lstServContractual->GetDBValue(true);
        $this->InsertFields["UnidadesApb"]["Value"] = $this->sUnidadesManuales->GetDBValue(true);
        $this->InsertFields["HorasAprobadas"]["Value"] = $this->sHorasManuales->GetDBValue(true);
        $this->InsertFields["ID_PPMC"]["Value"] = $this->hIDPPMC->GetDBValue(true);
        $this->InsertFields["FechaEntregaHerramienta"]["Value"] = $this->FechaEntregaHerramienta->GetDBValue(true);
        $this->InsertFields["UDX"]["Value"] = $this->UDX->GetDBValue(true);
        $this->InsertFields["UDA"]["Value"] = $this->UDA->GetDBValue(true);
        $this->InsertFields["USP"]["Value"] = $this->USP->GetDBValue(true);
        $this->InsertFields["URLInfoEvidencia"]["Value"] = $this->URLEvidencia->GetDBValue(true);
        $this->InsertFields["formatoEvidencia"]["Value"] = $this->formatoEvidencia->GetDBValue(true);
        $this->InsertFields["IDsCorrectos"]["Value"] = $this->IDsCorrectos->GetDBValue(true);
        $this->InsertFields["TipoPadre"]["Value"] = $this->TipoPadre->GetDBValue(true);
        $this->InsertFields["UsuarioUltMod"]["Value"] = $this->hdUsrUltMod->GetDBValue(true);
        $this->InsertFields["FechaUltMod"]["Value"] = $this->hdFechaUltMod->GetDBValue(true);
        $this->InsertFields["URLEvidencia"]["Value"] = $this->URLEvidenciaMed->GetDBValue(true);
        $this->InsertFields["SinEvidencia"]["Value"] = $this->SinEvidencia->GetDBValue(true);
        $this->InsertFields["UST"]["Value"] = $this->UST->GetDBValue(true);
        $this->InsertFields["UPL"]["Value"] = $this->UPL->GetDBValue(true);
        $this->InsertFields["HorasSAT"]["Value"] = $this->HorasSAT->GetDBValue(true);
        $this->InsertFields["SinHerramienta"]["Value"] = $this->SinHerramienta->GetDBValue(true);
        $this->InsertFields["PPMMalCatalogado"]["Value"] = $this->PPMMalCatalogado->GetDBValue(true);
        $this->InsertFields["EstNoAprobada"]["Value"] = $this->EstNoAprobada->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_info_rs_ap_EC", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-E289C1E7
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["URLReferencia"]["Value"] = $this->URLReferencia->GetDBValue(true);
        $this->UpdateFields["FechaAsignacion"]["Value"] = $this->FechaAsignacion->GetDBValue(true);
        $this->UpdateFields["FechaEntregaPropuesta"]["Value"] = $this->FechaEntregaPropuesta->GetDBValue(true);
        $this->UpdateFields["FechaEntregaEvidencia"]["Value"] = $this->FechaEntregaEvidencia->GetDBValue(true);
        $this->UpdateFields["FechaAceptacionPropuesta"]["Value"] = $this->FechaAceptacionPropuesta->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->UpdateFields["CumplioRS"]["Value"] = $this->CumplioRS->GetDBValue(true);
        $this->UpdateFields["id_servicio_negocio"]["Value"] = $this->sServicioNegocio->GetDBValue(true);
        $this->UpdateFields["IdTipoReq"]["Value"] = $this->sTipoRequerimiento->GetDBValue(true);
        $this->UpdateFields["Id"]["Value"] = $this->sID->GetDBValue(true);
        $this->UpdateFields["CumplioHE"]["Value"] = $this->CumplioHE->GetDBValue(true);
        $this->UpdateFields["IdPadre"]["Value"] = $this->sDatosPadre->GetDBValue(true);
        $this->UpdateFields["DiasPropuesta"]["Value"] = $this->sDiasPropuesta->GetDBValue(true);
        $this->UpdateFields["UsuarioAlta"]["Value"] = $this->hdUsrAlta->GetDBValue(true);
        $this->UpdateFields["id_servicio_cont"]["Value"] = $this->lstServContractual->GetDBValue(true);
        $this->UpdateFields["UnidadesApb"]["Value"] = $this->sUnidadesManuales->GetDBValue(true);
        $this->UpdateFields["HorasAprobadas"]["Value"] = $this->sHorasManuales->GetDBValue(true);
        $this->UpdateFields["ID_PPMC"]["Value"] = $this->hIDPPMC->GetDBValue(true);
        $this->UpdateFields["FechaEntregaHerramienta"]["Value"] = $this->FechaEntregaHerramienta->GetDBValue(true);
        $this->UpdateFields["UDX"]["Value"] = $this->UDX->GetDBValue(true);
        $this->UpdateFields["UDA"]["Value"] = $this->UDA->GetDBValue(true);
        $this->UpdateFields["USP"]["Value"] = $this->USP->GetDBValue(true);
        $this->UpdateFields["URLInfoEvidencia"]["Value"] = $this->URLEvidencia->GetDBValue(true);
        $this->UpdateFields["formatoEvidencia"]["Value"] = $this->formatoEvidencia->GetDBValue(true);
        $this->UpdateFields["IDsCorrectos"]["Value"] = $this->IDsCorrectos->GetDBValue(true);
        $this->UpdateFields["TipoPadre"]["Value"] = $this->TipoPadre->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->hdUsrUltMod->GetDBValue(true);
        $this->UpdateFields["FechaUltMod"]["Value"] = $this->hdFechaUltMod->GetDBValue(true);
        $this->UpdateFields["URLEvidencia"]["Value"] = $this->URLEvidenciaMed->GetDBValue(true);
        $this->UpdateFields["SinEvidencia"]["Value"] = $this->SinEvidencia->GetDBValue(true);
        $this->UpdateFields["UST"]["Value"] = $this->UST->GetDBValue(true);
        $this->UpdateFields["UPL"]["Value"] = $this->UPL->GetDBValue(true);
        $this->UpdateFields["HorasSAT"]["Value"] = $this->HorasSAT->GetDBValue(true);
        $this->UpdateFields["SinHerramienta"]["Value"] = $this->SinHerramienta->GetDBValue(true);
        $this->UpdateFields["PPMMalCatalogado"]["Value"] = $this->PPMMalCatalogado->GetDBValue(true);
        $this->UpdateFields["EstNoAprobada"]["Value"] = $this->EstNoAprobada->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_rs_ap_EC", $this->UpdateFields, $this);
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

} //End mc_info_rs_ap_ECDataSource Class @3-FCB6E20C

//Initialize Page @1-A9C341AB
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
$TemplateFileName = "PPMCsApbDetalle2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/ui/jquery.ui.core.js|js/jquery/ui/jquery.ui.widget.js|js/jquery/ui/jquery.ui.datepicker.js|js/jquery/datepicker/ccs-date-timepicker.js|js/jquery/external/jquery.mousewheel.js|js/jquery/ui/jquery.ui.button.js|js/jquery/ui/jquery.ui.spinner.js|js/jquery/spinner/ccs-numeric-up-down.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-DCC8390B
CCSecurityRedirect("3;4;5", "");
//End Authenticate User

//Include events file @1-7888C930
include_once("./PPMCsApbDetalle2_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-91B8AF7D
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_info_rs_ap_EC = new clsRecordmc_info_rs_ap_EC("", $MainPage);
$lDocs = new clsControl(ccsLabel, "lDocs", "lDocs", ccsText, "", CCGetRequestParam("lDocs", ccsGet, NULL), $MainPage);
$lDocs->HTML = true;
$lkSiguiente = new clsControl(ccsLink, "lkSiguiente", "lkSiguiente", ccsText, "", CCGetRequestParam("lkSiguiente", ccsGet, NULL), $MainPage);
$lkSiguiente->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkSiguiente->Page = "PPMCsApbDetalle.php";
$lkAnterior = new clsControl(ccsLink, "lkAnterior", "lkAnterior", ccsText, "", CCGetRequestParam("lkAnterior", ccsGet, NULL), $MainPage);
$lkAnterior->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkAnterior->Page = "PPMCsApbDetalle.php";
$MainPage->Header = & $Header;
$MainPage->mc_info_rs_ap_EC = & $mc_info_rs_ap_EC;
$MainPage->lDocs = & $lDocs;
$MainPage->lkSiguiente = & $lkSiguiente;
$MainPage->lkAnterior = & $lkAnterior;
$mc_info_rs_ap_EC->Initialize();
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

//Execute Components @1-72555100
$mc_info_rs_ap_EC->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-5E004BB8
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_info_rs_ap_EC);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-5667450F
$Header->Show();
$mc_info_rs_ap_EC->Show();
$lDocs->Show();
$lkSiguiente->Show();
$lkAnterior->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-F335969E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_info_rs_ap_EC);
unset($Tpl);
//End Unload Page


?>
