<?php
error_reporting(E_ERROR);
ini_set('display_errors','On');
//Include Common Files @1-CEEBC83D
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsCrbDetalle.php");
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

//Class_Initialize Event @3-BD122026
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
            $this->sIdPPMC = new clsControl(ccsLabel, "sIdPPMC", "sIdPPMC", ccsText, "", CCGetRequestParam("sIdPPMC", $Method, NULL), $this);
            $this->sNombreProyecto = new clsControl(ccsLabel, "sNombreProyecto", "sNombreProyecto", ccsText, "", CCGetRequestParam("sNombreProyecto", $Method, NULL), $this);
            $this->sServicioNegocio = new clsControl(ccsHidden, "sServicioNegocio", "Servicio de Negocio", ccsText, "", CCGetRequestParam("sServicioNegocio", $Method, NULL), $this);
            $this->sServicioNegocio->Required = true;
            $this->sTipoRequerimiento = new clsControl(ccsListBox, "sTipoRequerimiento", "Tipo Requerimiento", ccsText, "", CCGetRequestParam("sTipoRequerimiento", $Method, NULL), $this);
            $this->sTipoRequerimiento->DSType = dsTable;
            $this->sTipoRequerimiento->DataSource = new clsDBcnDisenio();
            $this->sTipoRequerimiento->ds = & $this->sTipoRequerimiento->DataSource;
            $this->sTipoRequerimiento->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_TipoPPMC {SQL_Where} {SQL_OrderBy}";
            list($this->sTipoRequerimiento->BoundColumn, $this->sTipoRequerimiento->TextColumn, $this->sTipoRequerimiento->DBFormat) = array("Id", "Descripcion", "");
            $this->sTipoRequerimiento->Required = true;
            $this->sEstadoPPMC = new clsControl(ccsLabel, "sEstadoPPMC", "sEstadoPPMC", ccsText, "", CCGetRequestParam("sEstadoPPMC", $Method, NULL), $this);
            $this->hdUsrAlta = new clsControl(ccsHidden, "hdUsrAlta", "hdUsrAlta", ccsText, "", CCGetRequestParam("hdUsrAlta", $Method, NULL), $this);
            $this->lstServContractual = new clsControl(ccsHidden, "lstServContractual", "Servicio Contractual", ccsText, "", CCGetRequestParam("lstServContractual", $Method, NULL), $this);
            $this->lstServContractual->Required = true;
            $this->lServContractual = new clsControl(ccsLabel, "lServContractual", "lServContractual", ccsText, "", CCGetRequestParam("lServContractual", $Method, NULL), $this);
            $this->lServNegocio = new clsControl(ccsLabel, "lServNegocio", "lServNegocio", ccsText, "", CCGetRequestParam("lServNegocio", $Method, NULL), $this);
            $this->DatosUltMod = new clsControl(ccsLabel, "DatosUltMod", "DatosUltMod", ccsText, "", CCGetRequestParam("DatosUltMod", $Method, NULL), $this);
            $this->hdFechaUltMod = new clsControl(ccsHidden, "hdFechaUltMod", "hdFechaUltMod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn"), CCGetRequestParam("hdFechaUltMod", $Method, NULL), $this);
            $this->hdEstado = new clsControl(ccsHidden, "hdEstado", "hdEstado", ccsText, "", CCGetRequestParam("hdEstado", $Method, NULL), $this);
            $this->hdNombreProyecto = new clsControl(ccsHidden, "hdNombreProyecto", "hdNombreProyecto", ccsText, "", CCGetRequestParam("hdNombreProyecto", $Method, NULL), $this);
            $this->URLReferencia = new clsControl(ccsTextArea, "URLReferencia", "URLReferencia", ccsText, "", CCGetRequestParam("URLReferencia", $Method, NULL), $this);
            $this->lbSLA = new clsControl(ccsListBox, "lbSLA", "lbSLA", ccsInteger, "", CCGetRequestParam("lbSLA", $Method, NULL), $this);
            $this->lbSLA->DSType = dsListOfValues;
            $this->lbSLA->Values = "";
            $this->sTipoRequerimiento1 = new clsControl(ccsListBox, "sTipoRequerimiento1", "Tipo Medición", ccsText, "", CCGetRequestParam("sTipoRequerimiento1", $Method, NULL), $this);
            $this->sTipoRequerimiento1->DSType = dsListOfValues;
            $this->sTipoRequerimiento1->Values = array(array("2", "Mantenimiento Mayor"), array("3", "Mantenimiento Menor"));
            $this->FechaFirmaCAES = new clsControl(ccsTextBox, "FechaFirmaCAES", "FechaFirmaCAES", ccsDate, array("ShortDate"), CCGetRequestParam("FechaFirmaCAES", $Method, NULL), $this);
            $this->txtDiasEstimados = new clsControl(ccsTextBox, "txtDiasEstimados", "Días Planeados", ccsFloat, array(False, 3, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("txtDiasEstimados", $Method, NULL), $this);
            $this->txtDiasEstimados->Visible = false;
            $this->MaxDiasRetrasoNat = new clsControl(ccsTextBox, "MaxDiasRetrasoNat", "MaxDiasRetrasoNat", ccsFloat, array(False, 3, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("MaxDiasRetrasoNat", $Method, NULL), $this);
            $this->MaxDiasRetrasoHab = new clsControl(ccsTextBox, "MaxDiasRetrasoHab", "MaxDiasRetrasoHab", ccsFloat, array(False, 3, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("MaxDiasRetrasoHab", $Method, NULL), $this);
            $this->PctMax = new clsControl(ccsTextBox, "PctMax", "PctMax", ccsFloat, array(False, 4, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("PctMax", $Method, NULL), $this);
            $this->CumplioRS = new clsControl(ccsListBox, "CumplioRS", "CumplioRS", ccsText, "", CCGetRequestParam("CumplioRS", $Method, NULL), $this);
            $this->CumplioRS->DSType = dsListOfValues;
            $this->CumplioRS->Values = array(array("", "No Aplica"), array("1", "Cumplio"), array("0", "No Cumplio"));
            $this->CumplioHE = new clsControl(ccsListBox, "CumplioHE", "CumplioHE", ccsText, "", CCGetRequestParam("CumplioHE", $Method, NULL), $this);
            $this->CumplioHE->DSType = dsListOfValues;
            $this->CumplioHE->Values = array(array("", "No Aplica"), array("1", "Cumple"), array("0", "No Cumple"));
            $this->hIDPPMC = new clsControl(ccsHidden, "hIDPPMC", "hIDPPMC", ccsInteger, "", CCGetRequestParam("hIDPPMC", $Method, NULL), $this);
            $this->hIDPPMC->Required = true;
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsMemo, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->Image1 = new clsControl(ccsImage, "Image1", "Image1", ccsText, "", CCGetRequestParam("Image1", $Method, NULL), $this);
            $this->CAPFirmada = new clsControl(ccsCheckBox, "CAPFirmada", "CAPFirmada", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("CAPFirmada", $Method, NULL), $this);
            $this->CAPFirmada->CheckedValue = true;
            $this->CAPFirmada->UncheckedValue = false;
            $this->TPaquetes = new clsControl(ccsCheckBox, "TPaquetes", "TPaquetes", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("TPaquetes", $Method, NULL), $this);
            $this->TPaquetes->CheckedValue = true;
            $this->TPaquetes->UncheckedValue = false;
            $this->hExiste = new clsControl(ccsHidden, "hExiste", "hExiste", ccsInteger, "", CCGetRequestParam("hExiste", $Method, NULL), $this);
            $this->sID = new clsControl(ccsHidden, "sID", "sID", ccsInteger, "", CCGetRequestParam("sID", $Method, NULL), $this);
            $this->hdUsrUltMod = new clsControl(ccsHidden, "hdUsrUltMod", "hdUsrUltMod", ccsText, "", CCGetRequestParam("hdUsrUltMod", $Method, NULL), $this);
            $this->btnCalcular = new clsButton("btnCalcular", $Method, $this);
            $this->lReportado = new clsControl(ccsLabel, "lReportado", "lReportado", ccsText, "", CCGetRequestParam("lReportado", $Method, NULL), $this);
            $this->evidencia_salvedad = new clsControl(ccsCheckBox, "evidencia_salvedad", "evidencia_salvedad", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("evidencia_salvedad", $Method, NULL), $this);
            $this->evidencia_salvedad->CheckedValue = true;
            $this->evidencia_salvedad->UncheckedValue = false;
            $this->observacion_salvedad = new clsControl(ccsTextArea, "observacion_salvedad", "observacion_salvedad", ccsText, "", CCGetRequestParam("observacion_salvedad", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->hdFechaUltMod->Value) && !strlen($this->hdFechaUltMod->Value) && $this->hdFechaUltMod->Value !== false)
                    $this->hdFechaUltMod->SetText(date("Y-m-d H:i"));
                if(!is_array($this->txtDiasEstimados->Value) && !strlen($this->txtDiasEstimados->Value) && $this->txtDiasEstimados->Value !== false)
                    $this->txtDiasEstimados->SetText(0);
                if(!is_array($this->MaxDiasRetrasoNat->Value) && !strlen($this->MaxDiasRetrasoNat->Value) && $this->MaxDiasRetrasoNat->Value !== false)
                    $this->MaxDiasRetrasoNat->SetText(0);
                if(!is_array($this->MaxDiasRetrasoHab->Value) && !strlen($this->MaxDiasRetrasoHab->Value) && $this->MaxDiasRetrasoHab->Value !== false)
                    $this->MaxDiasRetrasoHab->SetText(0);
                if(!is_array($this->PctMax->Value) && !strlen($this->PctMax->Value) && $this->PctMax->Value !== false)
                    $this->PctMax->SetText(0);
                if(!is_array($this->CAPFirmada->Value) && !strlen($this->CAPFirmada->Value) && $this->CAPFirmada->Value !== false)
                    $this->CAPFirmada->SetValue(false);
                if(!is_array($this->TPaquetes->Value) && !strlen($this->TPaquetes->Value) && $this->TPaquetes->Value !== false)
                    $this->TPaquetes->SetValue(false);
                if(!is_array($this->evidencia_salvedad->Value) && !strlen($this->evidencia_salvedad->Value) && $this->evidencia_salvedad->Value !== false)
                    $this->evidencia_salvedad->SetValue(false);
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

//Validate Method @3-C0B40F07
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->sServicioNegocio->Validate() && $Validation);
        $Validation = ($this->sTipoRequerimiento->Validate() && $Validation);
        $Validation = ($this->hdUsrAlta->Validate() && $Validation);
        $Validation = ($this->lstServContractual->Validate() && $Validation);
        $Validation = ($this->hdFechaUltMod->Validate() && $Validation);
        $Validation = ($this->hdEstado->Validate() && $Validation);
        $Validation = ($this->hdNombreProyecto->Validate() && $Validation);
        $Validation = ($this->URLReferencia->Validate() && $Validation);
        $Validation = ($this->lbSLA->Validate() && $Validation);
        $Validation = ($this->sTipoRequerimiento1->Validate() && $Validation);
        $Validation = ($this->FechaFirmaCAES->Validate() && $Validation);
        $Validation = ($this->txtDiasEstimados->Validate() && $Validation);
        $Validation = ($this->MaxDiasRetrasoNat->Validate() && $Validation);
        $Validation = ($this->MaxDiasRetrasoHab->Validate() && $Validation);
        $Validation = ($this->PctMax->Validate() && $Validation);
        $Validation = ($this->CumplioRS->Validate() && $Validation);
        $Validation = ($this->CumplioHE->Validate() && $Validation);
        $Validation = ($this->hIDPPMC->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->CAPFirmada->Validate() && $Validation);
        $Validation = ($this->TPaquetes->Validate() && $Validation);
        $Validation = ($this->hExiste->Validate() && $Validation);
        $Validation = ($this->sID->Validate() && $Validation);
        $Validation = ($this->hdUsrUltMod->Validate() && $Validation);
        $Validation = ($this->evidencia_salvedad->Validate() && $Validation);
        $Validation = ($this->observacion_salvedad->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->sServicioNegocio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sTipoRequerimiento->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdUsrAlta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->lstServContractual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdFechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdEstado->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdNombreProyecto->Errors->Count() == 0);
        $Validation =  $Validation && ($this->URLReferencia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->lbSLA->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sTipoRequerimiento1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaFirmaCAES->Errors->Count() == 0);
        $Validation =  $Validation && ($this->txtDiasEstimados->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MaxDiasRetrasoNat->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MaxDiasRetrasoHab->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PctMax->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumplioRS->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumplioHE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hIDPPMC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CAPFirmada->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TPaquetes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hExiste->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdUsrUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->evidencia_salvedad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->observacion_salvedad->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-81F7B700
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Id_Proveedor->Errors->Count());
        $errors = ($errors || $this->sIdPPMC->Errors->Count());
        $errors = ($errors || $this->sNombreProyecto->Errors->Count());
        $errors = ($errors || $this->sServicioNegocio->Errors->Count());
        $errors = ($errors || $this->sTipoRequerimiento->Errors->Count());
        $errors = ($errors || $this->sEstadoPPMC->Errors->Count());
        $errors = ($errors || $this->hdUsrAlta->Errors->Count());
        $errors = ($errors || $this->lstServContractual->Errors->Count());
        $errors = ($errors || $this->lServContractual->Errors->Count());
        $errors = ($errors || $this->lServNegocio->Errors->Count());
        $errors = ($errors || $this->DatosUltMod->Errors->Count());
        $errors = ($errors || $this->hdFechaUltMod->Errors->Count());
        $errors = ($errors || $this->hdEstado->Errors->Count());
        $errors = ($errors || $this->hdNombreProyecto->Errors->Count());
        $errors = ($errors || $this->URLReferencia->Errors->Count());
        $errors = ($errors || $this->lbSLA->Errors->Count());
        $errors = ($errors || $this->sTipoRequerimiento1->Errors->Count());
        $errors = ($errors || $this->FechaFirmaCAES->Errors->Count());
        $errors = ($errors || $this->txtDiasEstimados->Errors->Count());
        $errors = ($errors || $this->MaxDiasRetrasoNat->Errors->Count());
        $errors = ($errors || $this->MaxDiasRetrasoHab->Errors->Count());
        $errors = ($errors || $this->PctMax->Errors->Count());
        $errors = ($errors || $this->CumplioRS->Errors->Count());
        $errors = ($errors || $this->CumplioHE->Errors->Count());
        $errors = ($errors || $this->hIDPPMC->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->Image1->Errors->Count());
        $errors = ($errors || $this->CAPFirmada->Errors->Count());
        $errors = ($errors || $this->TPaquetes->Errors->Count());
        $errors = ($errors || $this->hExiste->Errors->Count());
        $errors = ($errors || $this->sID->Errors->Count());
        $errors = ($errors || $this->hdUsrUltMod->Errors->Count());
        $errors = ($errors || $this->lReportado->Errors->Count());
        $errors = ($errors || $this->evidencia_salvedad->Errors->Count());
        $errors = ($errors || $this->observacion_salvedad->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-91A2AF96
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
                $Redirect = "PPMCsCrbDetalle.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "btnCalcular") {
                $Redirect = "PPMCsCrbDetalle.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "URLReferencia"));
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

//InsertRow Method @3-A4B31DC9
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Id_Proveedor->SetValue($this->Id_Proveedor->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->sServicioNegocio->SetValue($this->sServicioNegocio->GetValue(true));
        $this->DataSource->sTipoRequerimiento->SetValue($this->sTipoRequerimiento->GetValue(true));
        $this->DataSource->sEstadoPPMC->SetValue($this->sEstadoPPMC->GetValue(true));
        $this->DataSource->hdUsrAlta->SetValue($this->hdUsrAlta->GetValue(true));
        $this->DataSource->lstServContractual->SetValue($this->lstServContractual->GetValue(true));
        $this->DataSource->lServContractual->SetValue($this->lServContractual->GetValue(true));
        $this->DataSource->lServNegocio->SetValue($this->lServNegocio->GetValue(true));
        $this->DataSource->DatosUltMod->SetValue($this->DatosUltMod->GetValue(true));
        $this->DataSource->hdFechaUltMod->SetValue($this->hdFechaUltMod->GetValue(true));
        $this->DataSource->hdEstado->SetValue($this->hdEstado->GetValue(true));
        $this->DataSource->hdNombreProyecto->SetValue($this->hdNombreProyecto->GetValue(true));
        $this->DataSource->URLReferencia->SetValue($this->URLReferencia->GetValue(true));
        $this->DataSource->lbSLA->SetValue($this->lbSLA->GetValue(true));
        $this->DataSource->sTipoRequerimiento1->SetValue($this->sTipoRequerimiento1->GetValue(true));
        $this->DataSource->FechaFirmaCAES->SetValue($this->FechaFirmaCAES->GetValue(true));
        $this->DataSource->txtDiasEstimados->SetValue($this->txtDiasEstimados->GetValue(true));
        $this->DataSource->MaxDiasRetrasoNat->SetValue($this->MaxDiasRetrasoNat->GetValue(true));
        $this->DataSource->MaxDiasRetrasoHab->SetValue($this->MaxDiasRetrasoHab->GetValue(true));
        $this->DataSource->PctMax->SetValue($this->PctMax->GetValue(true));
        $this->DataSource->CumplioRS->SetValue($this->CumplioRS->GetValue(true));
        $this->DataSource->CumplioHE->SetValue($this->CumplioHE->GetValue(true));
        $this->DataSource->hIDPPMC->SetValue($this->hIDPPMC->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->Image1->SetValue($this->Image1->GetValue(true));
        $this->DataSource->CAPFirmada->SetValue($this->CAPFirmada->GetValue(true));
        $this->DataSource->TPaquetes->SetValue($this->TPaquetes->GetValue(true));
        $this->DataSource->hExiste->SetValue($this->hExiste->GetValue(true));
        $this->DataSource->sID->SetValue($this->sID->GetValue(true));
        $this->DataSource->hdUsrUltMod->SetValue($this->hdUsrUltMod->GetValue(true));
        $this->DataSource->lReportado->SetValue($this->lReportado->GetValue(true));
        $this->DataSource->evidencia_salvedad->SetValue($this->evidencia_salvedad->GetValue(true));
        $this->DataSource->observacion_salvedad->SetValue($this->observacion_salvedad->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-9EA5A7AB
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Id_Proveedor->SetValue($this->Id_Proveedor->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->sServicioNegocio->SetValue($this->sServicioNegocio->GetValue(true));
        $this->DataSource->sTipoRequerimiento->SetValue($this->sTipoRequerimiento->GetValue(true));
        $this->DataSource->sEstadoPPMC->SetValue($this->sEstadoPPMC->GetValue(true));
        $this->DataSource->hdUsrAlta->SetValue($this->hdUsrAlta->GetValue(true));
        $this->DataSource->lstServContractual->SetValue($this->lstServContractual->GetValue(true));
        $this->DataSource->lServContractual->SetValue($this->lServContractual->GetValue(true));
        $this->DataSource->lServNegocio->SetValue($this->lServNegocio->GetValue(true));
        $this->DataSource->DatosUltMod->SetValue($this->DatosUltMod->GetValue(true));
        $this->DataSource->hdFechaUltMod->SetValue($this->hdFechaUltMod->GetValue(true));
        $this->DataSource->hdEstado->SetValue($this->hdEstado->GetValue(true));
        $this->DataSource->hdNombreProyecto->SetValue($this->hdNombreProyecto->GetValue(true));
        $this->DataSource->URLReferencia->SetValue($this->URLReferencia->GetValue(true));
        $this->DataSource->lbSLA->SetValue($this->lbSLA->GetValue(true));
        $this->DataSource->sTipoRequerimiento1->SetValue($this->sTipoRequerimiento1->GetValue(true));
        $this->DataSource->FechaFirmaCAES->SetValue($this->FechaFirmaCAES->GetValue(true));
        $this->DataSource->txtDiasEstimados->SetValue($this->txtDiasEstimados->GetValue(true));
        $this->DataSource->MaxDiasRetrasoNat->SetValue($this->MaxDiasRetrasoNat->GetValue(true));
        $this->DataSource->MaxDiasRetrasoHab->SetValue($this->MaxDiasRetrasoHab->GetValue(true));
        $this->DataSource->PctMax->SetValue($this->PctMax->GetValue(true));
        $this->DataSource->CumplioRS->SetValue($this->CumplioRS->GetValue(true));
        $this->DataSource->CumplioHE->SetValue($this->CumplioHE->GetValue(true));
        $this->DataSource->hIDPPMC->SetValue($this->hIDPPMC->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->Image1->SetValue($this->Image1->GetValue(true));
        $this->DataSource->CAPFirmada->SetValue($this->CAPFirmada->GetValue(true));
        $this->DataSource->TPaquetes->SetValue($this->TPaquetes->GetValue(true));
        $this->DataSource->hExiste->SetValue($this->hExiste->GetValue(true));
        $this->DataSource->sID->SetValue($this->sID->GetValue(true));
        $this->DataSource->hdUsrUltMod->SetValue($this->hdUsrUltMod->GetValue(true));
        $this->DataSource->lReportado->SetValue($this->lReportado->GetValue(true));
        $this->DataSource->evidencia_salvedad->SetValue($this->evidencia_salvedad->GetValue(true));
        $this->DataSource->observacion_salvedad->SetValue($this->observacion_salvedad->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @3-2A3EE58A
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

        $this->sTipoRequerimiento->Prepare();
        $this->lbSLA->Prepare();
        $this->sTipoRequerimiento1->Prepare();
        $this->CumplioRS->Prepare();
        $this->CumplioHE->Prepare();

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
                    $this->sServicioNegocio->SetValue($this->DataSource->sServicioNegocio->GetValue());
                    $this->sTipoRequerimiento->SetValue($this->DataSource->sTipoRequerimiento->GetValue());
                    $this->hdUsrAlta->SetValue($this->DataSource->hdUsrAlta->GetValue());
                    $this->lstServContractual->SetValue($this->DataSource->lstServContractual->GetValue());
                    $this->hdFechaUltMod->SetValue($this->DataSource->hdFechaUltMod->GetValue());
                    $this->URLReferencia->SetValue($this->DataSource->URLReferencia->GetValue());
                    $this->lbSLA->SetValue($this->DataSource->lbSLA->GetValue());
                    $this->sTipoRequerimiento1->SetValue($this->DataSource->sTipoRequerimiento1->GetValue());
                    $this->FechaFirmaCAES->SetValue($this->DataSource->FechaFirmaCAES->GetValue());
                    $this->txtDiasEstimados->SetValue($this->DataSource->txtDiasEstimados->GetValue());
                    $this->MaxDiasRetrasoNat->SetValue($this->DataSource->MaxDiasRetrasoNat->GetValue());
                    $this->MaxDiasRetrasoHab->SetValue($this->DataSource->MaxDiasRetrasoHab->GetValue());
                    $this->PctMax->SetValue($this->DataSource->PctMax->GetValue());
                    $this->CumplioRS->SetValue($this->DataSource->CumplioRS->GetValue());
                    $this->CumplioHE->SetValue($this->DataSource->CumplioHE->GetValue());
                    $this->hIDPPMC->SetValue($this->DataSource->hIDPPMC->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                    $this->CAPFirmada->SetValue($this->DataSource->CAPFirmada->GetValue());
                    $this->TPaquetes->SetValue($this->DataSource->TPaquetes->GetValue());
                    $this->sID->SetValue($this->DataSource->sID->GetValue());
                    $this->hdUsrUltMod->SetValue($this->DataSource->hdUsrUltMod->GetValue());
                    $this->evidencia_salvedad->SetValue($this->DataSource->evidencia_salvedad->GetValue());
                    $this->observacion_salvedad->SetValue($this->DataSource->observacion_salvedad->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Id_Proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sIdPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sNombreProyecto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sServicioNegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sTipoRequerimiento->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sEstadoPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdUsrAlta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lstServContractual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lServContractual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lServNegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatosUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdFechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdEstado->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdNombreProyecto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->URLReferencia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbSLA->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sTipoRequerimiento1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaFirmaCAES->Errors->ToString());
            $Error = ComposeStrings($Error, $this->txtDiasEstimados->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MaxDiasRetrasoNat->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MaxDiasRetrasoHab->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PctMax->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumplioRS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumplioHE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hIDPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Image1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CAPFirmada->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TPaquetes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hExiste->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdUsrUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lReportado->Errors->ToString());
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
        $this->sIdPPMC->Show();
        $this->sNombreProyecto->Show();
        $this->sServicioNegocio->Show();
        $this->sTipoRequerimiento->Show();
        $this->sEstadoPPMC->Show();
        $this->hdUsrAlta->Show();
        $this->lstServContractual->Show();
        $this->lServContractual->Show();
        $this->lServNegocio->Show();
        $this->DatosUltMod->Show();
        $this->hdFechaUltMod->Show();
        $this->hdEstado->Show();
        $this->hdNombreProyecto->Show();
        $this->URLReferencia->Show();
        $this->lbSLA->Show();
        $this->sTipoRequerimiento1->Show();
        $this->FechaFirmaCAES->Show();
        $this->txtDiasEstimados->Show();
        $this->MaxDiasRetrasoNat->Show();
        $this->MaxDiasRetrasoHab->Show();
        $this->PctMax->Show();
        $this->CumplioRS->Show();
        $this->CumplioHE->Show();
        $this->hIDPPMC->Show();
        $this->Observaciones->Show();
        $this->Image1->Show();
        $this->CAPFirmada->Show();
        $this->TPaquetes->Show();
        $this->hExiste->Show();
        $this->sID->Show();
        $this->hdUsrUltMod->Show();
        $this->btnCalcular->Show();
        $this->lReportado->Show();
        $this->evidencia_salvedad->Show();
        $this->observacion_salvedad->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_rs_ap_EC Class @3-FCB6E20C

class clsmc_info_rs_ap_ECDataSource extends clsDBcnDisenio {  //mc_info_rs_ap_ECDataSource Class @3-9CE83123

//DataSource Variables @3-566D7B6D
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
    public $sIdPPMC;
    public $sNombreProyecto;
    public $sServicioNegocio;
    public $sTipoRequerimiento;
    public $sEstadoPPMC;
    public $hdUsrAlta;
    public $lstServContractual;
    public $lServContractual;
    public $lServNegocio;
    public $DatosUltMod;
    public $hdFechaUltMod;
    public $hdEstado;
    public $hdNombreProyecto;
    public $URLReferencia;
    public $lbSLA;
    public $sTipoRequerimiento1;
    public $FechaFirmaCAES;
    public $txtDiasEstimados;
    public $MaxDiasRetrasoNat;
    public $MaxDiasRetrasoHab;
    public $PctMax;
    public $CumplioRS;
    public $CumplioHE;
    public $hIDPPMC;
    public $Observaciones;
    public $Image1;
    public $CAPFirmada;
    public $TPaquetes;
    public $hExiste;
    public $sID;
    public $hdUsrUltMod;
    public $lReportado;
    public $evidencia_salvedad;
    public $observacion_salvedad;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-E503442C
    function clsmc_info_rs_ap_ECDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_rs_ap_EC/Error";
        $this->Initialize();
        $this->Id_Proveedor = new clsField("Id_Proveedor", ccsInteger, "");
        
        $this->sIdPPMC = new clsField("sIdPPMC", ccsText, "");
        
        $this->sNombreProyecto = new clsField("sNombreProyecto", ccsText, "");
        
        $this->sServicioNegocio = new clsField("sServicioNegocio", ccsText, "");
        
        $this->sTipoRequerimiento = new clsField("sTipoRequerimiento", ccsText, "");
        
        $this->sEstadoPPMC = new clsField("sEstadoPPMC", ccsText, "");
        
        $this->hdUsrAlta = new clsField("hdUsrAlta", ccsText, "");
        
        $this->lstServContractual = new clsField("lstServContractual", ccsText, "");
        
        $this->lServContractual = new clsField("lServContractual", ccsText, "");
        
        $this->lServNegocio = new clsField("lServNegocio", ccsText, "");
        
        $this->DatosUltMod = new clsField("DatosUltMod", ccsText, "");
        
        $this->hdFechaUltMod = new clsField("hdFechaUltMod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->hdEstado = new clsField("hdEstado", ccsText, "");
        
        $this->hdNombreProyecto = new clsField("hdNombreProyecto", ccsText, "");
        
        $this->URLReferencia = new clsField("URLReferencia", ccsText, "");
        
        $this->lbSLA = new clsField("lbSLA", ccsInteger, "");
        
        $this->sTipoRequerimiento1 = new clsField("sTipoRequerimiento1", ccsText, "");
        
        $this->FechaFirmaCAES = new clsField("FechaFirmaCAES", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->txtDiasEstimados = new clsField("txtDiasEstimados", ccsFloat, "");
        
        $this->MaxDiasRetrasoNat = new clsField("MaxDiasRetrasoNat", ccsFloat, "");
        
        $this->MaxDiasRetrasoHab = new clsField("MaxDiasRetrasoHab", ccsFloat, "");
        
        $this->PctMax = new clsField("PctMax", ccsFloat, "");
        
        $this->CumplioRS = new clsField("CumplioRS", ccsText, "");
        
        $this->CumplioHE = new clsField("CumplioHE", ccsText, "");
        
        $this->hIDPPMC = new clsField("hIDPPMC", ccsInteger, "");
        
        $this->Observaciones = new clsField("Observaciones", ccsMemo, "");
        
        $this->Image1 = new clsField("Image1", ccsText, "");
        
        $this->CAPFirmada = new clsField("CAPFirmada", ccsBoolean, $this->BooleanFormat);
        
        $this->TPaquetes = new clsField("TPaquetes", ccsBoolean, $this->BooleanFormat);
        
        $this->hExiste = new clsField("hExiste", ccsInteger, "");
        
        $this->sID = new clsField("sID", ccsInteger, "");
        
        $this->hdUsrUltMod = new clsField("hdUsrUltMod", ccsText, "");
        
        $this->lReportado = new clsField("lReportado", ccsText, "");
        
        $this->evidencia_salvedad = new clsField("evidencia_salvedad", ccsBoolean, $this->BooleanFormat);
        
        $this->observacion_salvedad = new clsField("observacion_salvedad", ccsText, "");
        

        $this->InsertFields["id_servicio_negocio"] = array("Name" => "id_servicio_negocio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["IdTipoReq"] = array("Name" => "[IdTipoReq]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioAlta"] = array("Name" => "[UsuarioAlta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["id_servicio_cont"] = array("Name" => "id_servicio_cont", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["URLReferencia"] = array("Name" => "[URLReferencia]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["TipoSLA"] = array("Name" => "[TipoSLA]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IdReqCC"] = array("Name" => "[IdReqCC]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaFirmaCAES"] = array("Name" => "[FechaFirmaCAES]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasDesarrolloEst"] = array("Name" => "[DiasDesarrolloEst]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["MaxDiasRetrasoNat"] = array("Name" => "[MaxDiasRetrasoNat]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["MaxDiasRetrasoHab"] = array("Name" => "[MaxDiasRetrasoHab]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["PctMax"] = array("Name" => "[PctMax]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["CumplioRC"] = array("Name" => "[CumplioRC]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CumplioRE"] = array("Name" => "[CumplioRE]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ID_PPMC"] = array("Name" => "ID_PPMC", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->InsertFields["CAPFirmada"] = array("Name" => "[CAPFirmada]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["TPaquetes"] = array("Name" => "[TPaquetes]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["Id"] = array("Name" => "[Id]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["evidencia_salvedad"] = array("Name" => "evidencia_salvedad", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["observacion_salvedad"] = array("Name" => "observacion_salvedad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_servicio_negocio"] = array("Name" => "id_servicio_negocio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["IdTipoReq"] = array("Name" => "[IdTipoReq]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioAlta"] = array("Name" => "[UsuarioAlta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_servicio_cont"] = array("Name" => "id_servicio_cont", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["URLReferencia"] = array("Name" => "[URLReferencia]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["TipoSLA"] = array("Name" => "[TipoSLA]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["IdReqCC"] = array("Name" => "[IdReqCC]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaFirmaCAES"] = array("Name" => "[FechaFirmaCAES]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasDesarrolloEst"] = array("Name" => "[DiasDesarrolloEst]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["MaxDiasRetrasoNat"] = array("Name" => "[MaxDiasRetrasoNat]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["MaxDiasRetrasoHab"] = array("Name" => "[MaxDiasRetrasoHab]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["PctMax"] = array("Name" => "[PctMax]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumplioRC"] = array("Name" => "[CumplioRC]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumplioRE"] = array("Name" => "[CumplioRE]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ID_PPMC"] = array("Name" => "ID_PPMC", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->UpdateFields["CAPFirmada"] = array("Name" => "[CAPFirmada]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["TPaquetes"] = array("Name" => "[TPaquetes]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["Id"] = array("Name" => "[Id]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["evidencia_salvedad"] = array("Name" => "evidencia_salvedad", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["observacion_salvedad"] = array("Name" => "observacion_salvedad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
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

//Open Method @3-287BBBE5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_info_rs_cr_RE_RC {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-190A59F3
    function SetValues()
    {
        $this->Id_Proveedor->SetDBValue(trim($this->f("Id_Proveedor")));
        $this->sServicioNegocio->SetDBValue($this->f("id_servicio_negocio"));
        $this->sTipoRequerimiento->SetDBValue($this->f("IdTipoReq"));
        $this->hdUsrAlta->SetDBValue($this->f("UsuarioAlta"));
        $this->lstServContractual->SetDBValue($this->f("id_servicio_cont"));
        $this->hdFechaUltMod->SetDBValue(trim($this->f("FechaUltMod")));
        $this->URLReferencia->SetDBValue($this->f("URLReferencia"));
        $this->lbSLA->SetDBValue(trim($this->f("TipoSLA")));
        $this->sTipoRequerimiento1->SetDBValue($this->f("IdReqCC"));
        $this->FechaFirmaCAES->SetDBValue(trim($this->f("FechaFirmaCAES")));
        $this->txtDiasEstimados->SetDBValue(trim($this->f("DiasDesarrolloEst")));
        $this->MaxDiasRetrasoNat->SetDBValue(trim($this->f("MaxDiasRetrasoNat")));
        $this->MaxDiasRetrasoHab->SetDBValue(trim($this->f("MaxDiasRetrasoHab")));
        $this->PctMax->SetDBValue(trim($this->f("PctMax")));
        $this->CumplioRS->SetDBValue($this->f("CumplioRC"));
        $this->CumplioHE->SetDBValue($this->f("CumplioRE"));
        $this->hIDPPMC->SetDBValue(trim($this->f("ID_PPMC")));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
        $this->CAPFirmada->SetDBValue(trim($this->f("CAPFirmada")));
        $this->TPaquetes->SetDBValue(trim($this->f("TPaquetes")));
        $this->sID->SetDBValue(trim($this->f("Id")));
        $this->hdUsrUltMod->SetDBValue($this->f("UsuarioUltMod"));
        $this->evidencia_salvedad->SetDBValue(trim($this->f("evidencia_salvedad")));
        $this->observacion_salvedad->SetDBValue($this->f("observacion_salvedad"));
    }
//End SetValues Method

//Insert Method @3-0F931CFC
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["id_servicio_negocio"]["Value"] = $this->sServicioNegocio->GetDBValue(true);
        $this->InsertFields["IdTipoReq"]["Value"] = $this->sTipoRequerimiento->GetDBValue(true);
        $this->InsertFields["UsuarioAlta"]["Value"] = $this->hdUsrAlta->GetDBValue(true);
        $this->InsertFields["id_servicio_cont"]["Value"] = $this->lstServContractual->GetDBValue(true);
        $this->InsertFields["FechaUltMod"]["Value"] = $this->hdFechaUltMod->GetDBValue(true);
        $this->InsertFields["URLReferencia"]["Value"] = $this->URLReferencia->GetDBValue(true);
        $this->InsertFields["TipoSLA"]["Value"] = $this->lbSLA->GetDBValue(true);
        $this->InsertFields["IdReqCC"]["Value"] = $this->sTipoRequerimiento1->GetDBValue(true);
        $this->InsertFields["FechaFirmaCAES"]["Value"] = $this->FechaFirmaCAES->GetDBValue(true);
        $this->InsertFields["DiasDesarrolloEst"]["Value"] = $this->txtDiasEstimados->GetDBValue(true);
        $this->InsertFields["MaxDiasRetrasoNat"]["Value"] = $this->MaxDiasRetrasoNat->GetDBValue(true);
        $this->InsertFields["MaxDiasRetrasoHab"]["Value"] = $this->MaxDiasRetrasoHab->GetDBValue(true);
        $this->InsertFields["PctMax"]["Value"] = $this->PctMax->GetDBValue(true);
        $this->InsertFields["CumplioRC"]["Value"] = $this->CumplioRS->GetDBValue(true);
        $this->InsertFields["CumplioRE"]["Value"] = $this->CumplioHE->GetDBValue(true);
        $this->InsertFields["ID_PPMC"]["Value"] = $this->hIDPPMC->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->InsertFields["CAPFirmada"]["Value"] = $this->CAPFirmada->GetDBValue(true);
        $this->InsertFields["TPaquetes"]["Value"] = $this->TPaquetes->GetDBValue(true);
        $this->InsertFields["Id"]["Value"] = $this->sID->GetDBValue(true);
        $this->InsertFields["UsuarioUltMod"]["Value"] = $this->hdUsrUltMod->GetDBValue(true);
        $this->InsertFields["evidencia_salvedad"]["Value"] = $this->evidencia_salvedad->GetDBValue(true);
        $this->InsertFields["observacion_salvedad"]["Value"] = $this->observacion_salvedad->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_info_rs_cr_RE_RC", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-53F51417
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["id_servicio_negocio"]["Value"] = $this->sServicioNegocio->GetDBValue(true);
        $this->UpdateFields["IdTipoReq"]["Value"] = $this->sTipoRequerimiento->GetDBValue(true);
        $this->UpdateFields["UsuarioAlta"]["Value"] = $this->hdUsrAlta->GetDBValue(true);
        $this->UpdateFields["id_servicio_cont"]["Value"] = $this->lstServContractual->GetDBValue(true);
        $this->UpdateFields["FechaUltMod"]["Value"] = $this->hdFechaUltMod->GetDBValue(true);
        $this->UpdateFields["URLReferencia"]["Value"] = $this->URLReferencia->GetDBValue(true);
        $this->UpdateFields["TipoSLA"]["Value"] = $this->lbSLA->GetDBValue(true);
        $this->UpdateFields["IdReqCC"]["Value"] = $this->sTipoRequerimiento1->GetDBValue(true);
        $this->UpdateFields["FechaFirmaCAES"]["Value"] = $this->FechaFirmaCAES->GetDBValue(true);
        $this->UpdateFields["DiasDesarrolloEst"]["Value"] = $this->txtDiasEstimados->GetDBValue(true);
        $this->UpdateFields["MaxDiasRetrasoNat"]["Value"] = $this->MaxDiasRetrasoNat->GetDBValue(true);
        $this->UpdateFields["MaxDiasRetrasoHab"]["Value"] = $this->MaxDiasRetrasoHab->GetDBValue(true);
        $this->UpdateFields["PctMax"]["Value"] = $this->PctMax->GetDBValue(true);
        $this->UpdateFields["CumplioRC"]["Value"] = $this->CumplioRS->GetDBValue(true);
        $this->UpdateFields["CumplioRE"]["Value"] = $this->CumplioHE->GetDBValue(true);
        $this->UpdateFields["ID_PPMC"]["Value"] = $this->hIDPPMC->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->UpdateFields["CAPFirmada"]["Value"] = $this->CAPFirmada->GetDBValue(true);
        $this->UpdateFields["TPaquetes"]["Value"] = $this->TPaquetes->GetDBValue(true);
        $this->UpdateFields["Id"]["Value"] = $this->sID->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->hdUsrUltMod->GetDBValue(true);
        $this->UpdateFields["evidencia_salvedad"]["Value"] = $this->evidencia_salvedad->GetDBValue(true);
        $this->UpdateFields["observacion_salvedad"]["Value"] = $this->observacion_salvedad->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_rs_cr_RE_RC", $this->UpdateFields, $this);
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



class clsRecordmc_info_rs_cr_RE_RC_Artef1 { //mc_info_rs_cr_RE_RC_Artef1 Class @190-918FB47E

//Variables @190-9E315808

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

//Class_Initialize Event @190-BDC89A42
    function clsRecordmc_info_rs_cr_RE_RC_Artef1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_rs_cr_RE_RC_Artef1/Error";
        $this->DataSource = new clsmc_info_rs_cr_RE_RC_Artef1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_rs_cr_RE_RC_Artef1";
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
            $this->DiasHabilesReales = new clsControl(ccsTextBox, "DiasHabilesReales", "Dias Habiles Reales", ccsInteger, "", CCGetRequestParam("DiasHabilesReales", $Method, NULL), $this);
            $this->DiasHabilesReales->Required = true;
            $this->UsuarioAlta = new clsControl(ccsHidden, "UsuarioAlta", "Usuario Alta", ccsText, "", CCGetRequestParam("UsuarioAlta", $Method, NULL), $this);
            $this->FechaUltMod = new clsControl(ccsHidden, "FechaUltMod", "Fecha Ult Mod", ccsDate, array("ShortDate"), CCGetRequestParam("FechaUltMod", $Method, NULL), $this);
            $this->UsuarioUltMod = new clsControl(ccsHidden, "UsuarioUltMod", "Usuario Ult Mod", ccsText, "", CCGetRequestParam("UsuarioUltMod", $Method, NULL), $this);
            $this->FechaEntrega = new clsControl(ccsTextBox, "FechaEntrega", "Fecha Entrega", ccsDate, array("ShortDate"), CCGetRequestParam("FechaEntrega", $Method, NULL), $this);
            $this->FechaEntrega->Required = true;
            $this->Comentarios = new clsControl(ccsTextArea, "Comentarios", "Comentarios", ccsMemo, "", CCGetRequestParam("Comentarios", $Method, NULL), $this);
            $this->ID_PPMC = new clsControl(ccsHidden, "ID_PPMC", "ID PPMC", ccsText, "", CCGetRequestParam("ID_PPMC", $Method, NULL), $this);
            $this->ID_PPMC->Required = true;
            $this->Id_Padre = new clsControl(ccsHidden, "Id_Padre", "Id_Padre", ccsText, "", CCGetRequestParam("Id_Padre", $Method, NULL), $this);
            $this->Descripcion = new clsControl(ccsTextArea, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", $Method, NULL), $this);
            $this->Nombre = new clsControl(ccsTextBox, "Nombre", "Nombre", ccsText, "", CCGetRequestParam("Nombre", $Method, NULL), $this);
            $this->Nombre->Required = true;
            $this->Formato = new clsControl(ccsTextBox, "Formato", "Formato", ccsText, "", CCGetRequestParam("Formato", $Method, NULL), $this);
            $this->FechaEstFin = new clsControl(ccsTextBox, "FechaEstFin", "Fecha Compromiso", ccsDate, array("ShortDate"), CCGetRequestParam("FechaEstFin", $Method, NULL), $this);
            $this->FechaEstFin->Required = true;
            $this->NombreConHerramienta = new clsControl(ccsTextBox, "NombreConHerramienta", "Nombre en Herramienta", ccsText, "", CCGetRequestParam("NombreConHerramienta", $Method, NULL), $this);
            $this->NombreConHerramienta->Required = true;
            $this->DiasHabilesDesviacion = new clsControl(ccsTextBox, "DiasHabilesDesviacion", "Dias Habiles Desviacion", ccsInteger, "", CCGetRequestParam("DiasHabilesDesviacion", $Method, NULL), $this);
            $this->DiasHabilesDesviacion->Required = true;
            $this->DiasNaturalesDesviacion = new clsControl(ccsTextBox, "DiasNaturalesDesviacion", "Dias Naturales Desviacion", ccsInteger, "", CCGetRequestParam("DiasNaturalesDesviacion", $Method, NULL), $this);
            $this->DiasNaturalesDesviacion->Required = true;
            $this->Pct = new clsControl(ccsHidden, "Pct", "Pct", ccsFloat, "", CCGetRequestParam("Pct", $Method, NULL), $this);
            $this->lblDeductiva = new clsControl(ccsTextBox, "lblDeductiva", "lblDeductiva", ccsFloat, array(False, 3, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("lblDeductiva", $Method, NULL), $this);
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->DiasHabilesReales->Value) && !strlen($this->DiasHabilesReales->Value) && $this->DiasHabilesReales->Value !== false)
                    $this->DiasHabilesReales->SetText(0);
                if(!is_array($this->DiasHabilesDesviacion->Value) && !strlen($this->DiasHabilesDesviacion->Value) && $this->DiasHabilesDesviacion->Value !== false)
                    $this->DiasHabilesDesviacion->SetText(0);
                if(!is_array($this->DiasNaturalesDesviacion->Value) && !strlen($this->DiasNaturalesDesviacion->Value) && $this->DiasNaturalesDesviacion->Value !== false)
                    $this->DiasNaturalesDesviacion->SetText(0);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @190-4F76030F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//Validate Method @190-5090081B
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->DiasHabilesReales->Validate() && $Validation);
        $Validation = ($this->UsuarioAlta->Validate() && $Validation);
        $Validation = ($this->FechaUltMod->Validate() && $Validation);
        $Validation = ($this->UsuarioUltMod->Validate() && $Validation);
        $Validation = ($this->FechaEntrega->Validate() && $Validation);
        $Validation = ($this->Comentarios->Validate() && $Validation);
        $Validation = ($this->ID_PPMC->Validate() && $Validation);
        $Validation = ($this->Id_Padre->Validate() && $Validation);
        $Validation = ($this->Descripcion->Validate() && $Validation);
        $Validation = ($this->Nombre->Validate() && $Validation);
        $Validation = ($this->Formato->Validate() && $Validation);
        $Validation = ($this->FechaEstFin->Validate() && $Validation);
        $Validation = ($this->NombreConHerramienta->Validate() && $Validation);
        $Validation = ($this->DiasHabilesDesviacion->Validate() && $Validation);
        $Validation = ($this->DiasNaturalesDesviacion->Validate() && $Validation);
        $Validation = ($this->Pct->Validate() && $Validation);
        $Validation = ($this->lblDeductiva->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->DiasHabilesReales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsuarioAlta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsuarioUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaEntrega->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Comentarios->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ID_PPMC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Id_Padre->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Descripcion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Nombre->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Formato->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaEstFin->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NombreConHerramienta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiasHabilesDesviacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiasNaturalesDesviacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Pct->Errors->Count() == 0);
        $Validation =  $Validation && ($this->lblDeductiva->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @190-87E3A4C4
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DiasHabilesReales->Errors->Count());
        $errors = ($errors || $this->UsuarioAlta->Errors->Count());
        $errors = ($errors || $this->FechaUltMod->Errors->Count());
        $errors = ($errors || $this->UsuarioUltMod->Errors->Count());
        $errors = ($errors || $this->FechaEntrega->Errors->Count());
        $errors = ($errors || $this->Comentarios->Errors->Count());
        $errors = ($errors || $this->ID_PPMC->Errors->Count());
        $errors = ($errors || $this->Id_Padre->Errors->Count());
        $errors = ($errors || $this->Descripcion->Errors->Count());
        $errors = ($errors || $this->Nombre->Errors->Count());
        $errors = ($errors || $this->Formato->Errors->Count());
        $errors = ($errors || $this->FechaEstFin->Errors->Count());
        $errors = ($errors || $this->NombreConHerramienta->Errors->Count());
        $errors = ($errors || $this->DiasHabilesDesviacion->Errors->Count());
        $errors = ($errors || $this->DiasNaturalesDesviacion->Errors->Count());
        $errors = ($errors || $this->Pct->Errors->Count());
        $errors = ($errors || $this->lblDeductiva->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @190-B908BA44
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
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @190-475ACF4C
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->DiasHabilesReales->SetValue($this->DiasHabilesReales->GetValue(true));
        $this->DataSource->UsuarioAlta->SetValue($this->UsuarioAlta->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaEntrega->SetValue($this->FechaEntrega->GetValue(true));
        $this->DataSource->Comentarios->SetValue($this->Comentarios->GetValue(true));
        $this->DataSource->ID_PPMC->SetValue($this->ID_PPMC->GetValue(true));
        $this->DataSource->Id_Padre->SetValue($this->Id_Padre->GetValue(true));
        $this->DataSource->Descripcion->SetValue($this->Descripcion->GetValue(true));
        $this->DataSource->Nombre->SetValue($this->Nombre->GetValue(true));
        $this->DataSource->Formato->SetValue($this->Formato->GetValue(true));
        $this->DataSource->FechaEstFin->SetValue($this->FechaEstFin->GetValue(true));
        $this->DataSource->NombreConHerramienta->SetValue($this->NombreConHerramienta->GetValue(true));
        $this->DataSource->DiasHabilesDesviacion->SetValue($this->DiasHabilesDesviacion->GetValue(true));
        $this->DataSource->DiasNaturalesDesviacion->SetValue($this->DiasNaturalesDesviacion->GetValue(true));
        $this->DataSource->Pct->SetValue($this->Pct->GetValue(true));
        $this->DataSource->lblDeductiva->SetValue($this->lblDeductiva->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @190-6748C759
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->DiasHabilesReales->SetValue($this->DiasHabilesReales->GetValue(true));
        $this->DataSource->UsuarioAlta->SetValue($this->UsuarioAlta->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaEntrega->SetValue($this->FechaEntrega->GetValue(true));
        $this->DataSource->Comentarios->SetValue($this->Comentarios->GetValue(true));
        $this->DataSource->ID_PPMC->SetValue($this->ID_PPMC->GetValue(true));
        $this->DataSource->Id_Padre->SetValue($this->Id_Padre->GetValue(true));
        $this->DataSource->Descripcion->SetValue($this->Descripcion->GetValue(true));
        $this->DataSource->Nombre->SetValue($this->Nombre->GetValue(true));
        $this->DataSource->Formato->SetValue($this->Formato->GetValue(true));
        $this->DataSource->FechaEstFin->SetValue($this->FechaEstFin->GetValue(true));
        $this->DataSource->NombreConHerramienta->SetValue($this->NombreConHerramienta->GetValue(true));
        $this->DataSource->DiasHabilesDesviacion->SetValue($this->DiasHabilesDesviacion->GetValue(true));
        $this->DataSource->DiasNaturalesDesviacion->SetValue($this->DiasNaturalesDesviacion->GetValue(true));
        $this->DataSource->Pct->SetValue($this->Pct->GetValue(true));
        $this->DataSource->lblDeductiva->SetValue($this->lblDeductiva->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @190-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @190-D2C16A77
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
                    $this->DiasHabilesReales->SetValue($this->DataSource->DiasHabilesReales->GetValue());
                    $this->UsuarioAlta->SetValue($this->DataSource->UsuarioAlta->GetValue());
                    $this->FechaUltMod->SetValue($this->DataSource->FechaUltMod->GetValue());
                    $this->UsuarioUltMod->SetValue($this->DataSource->UsuarioUltMod->GetValue());
                    $this->FechaEntrega->SetValue($this->DataSource->FechaEntrega->GetValue());
                    $this->Comentarios->SetValue($this->DataSource->Comentarios->GetValue());
                    $this->ID_PPMC->SetValue($this->DataSource->ID_PPMC->GetValue());
                    $this->Id_Padre->SetValue($this->DataSource->Id_Padre->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                    $this->Formato->SetValue($this->DataSource->Formato->GetValue());
                    $this->FechaEstFin->SetValue($this->DataSource->FechaEstFin->GetValue());
                    $this->NombreConHerramienta->SetValue($this->DataSource->NombreConHerramienta->GetValue());
                    $this->DiasHabilesDesviacion->SetValue($this->DataSource->DiasHabilesDesviacion->GetValue());
                    $this->DiasNaturalesDesviacion->SetValue($this->DataSource->DiasNaturalesDesviacion->GetValue());
                    $this->Pct->SetValue($this->DataSource->Pct->GetValue());
                    $this->lblDeductiva->SetValue($this->DataSource->lblDeductiva->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->DiasHabilesReales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsuarioAlta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsuarioUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaEntrega->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Comentarios->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ID_PPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Id_Padre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Descripcion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Nombre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Formato->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaEstFin->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NombreConHerramienta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiasHabilesDesviacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiasNaturalesDesviacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Pct->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lblDeductiva->Errors->ToString());
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
        $this->DiasHabilesReales->Show();
        $this->UsuarioAlta->Show();
        $this->FechaUltMod->Show();
        $this->UsuarioUltMod->Show();
        $this->FechaEntrega->Show();
        $this->Comentarios->Show();
        $this->ID_PPMC->Show();
        $this->Id_Padre->Show();
        $this->Descripcion->Show();
        $this->Nombre->Show();
        $this->Formato->Show();
        $this->FechaEstFin->Show();
        $this->NombreConHerramienta->Show();
        $this->DiasHabilesDesviacion->Show();
        $this->DiasNaturalesDesviacion->Show();
        $this->Pct->Show();
        $this->lblDeductiva->Show();
        $this->Button_Delete->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_rs_cr_RE_RC_Artef1 Class @190-FCB6E20C

class clsmc_info_rs_cr_RE_RC_Artef1DataSource extends clsDBcnDisenio {  //mc_info_rs_cr_RE_RC_Artef1DataSource Class @190-2AFD7010

//DataSource Variables @190-C8B0B899
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
    public $DiasHabilesReales;
    public $UsuarioAlta;
    public $FechaUltMod;
    public $UsuarioUltMod;
    public $FechaEntrega;
    public $Comentarios;
    public $ID_PPMC;
    public $Id_Padre;
    public $Descripcion;
    public $Nombre;
    public $Formato;
    public $FechaEstFin;
    public $NombreConHerramienta;
    public $DiasHabilesDesviacion;
    public $DiasNaturalesDesviacion;
    public $Pct;
    public $lblDeductiva;
//End DataSource Variables

//DataSourceClass_Initialize Event @190-DAE5C6C3
    function clsmc_info_rs_cr_RE_RC_Artef1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_rs_cr_RE_RC_Artef1/Error";
        $this->Initialize();
        $this->DiasHabilesReales = new clsField("DiasHabilesReales", ccsInteger, "");
        
        $this->UsuarioAlta = new clsField("UsuarioAlta", ccsText, "");
        
        $this->FechaUltMod = new clsField("FechaUltMod", ccsDate, $this->DateFormat);
        
        $this->UsuarioUltMod = new clsField("UsuarioUltMod", ccsText, "");
        
        $this->FechaEntrega = new clsField("FechaEntrega", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->Comentarios = new clsField("Comentarios", ccsMemo, "");
        
        $this->ID_PPMC = new clsField("ID_PPMC", ccsText, "");
        
        $this->Id_Padre = new clsField("Id_Padre", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->Nombre = new clsField("Nombre", ccsText, "");
        
        $this->Formato = new clsField("Formato", ccsText, "");
        
        $this->FechaEstFin = new clsField("FechaEstFin", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->NombreConHerramienta = new clsField("NombreConHerramienta", ccsText, "");
        
        $this->DiasHabilesDesviacion = new clsField("DiasHabilesDesviacion", ccsInteger, "");
        
        $this->DiasNaturalesDesviacion = new clsField("DiasNaturalesDesviacion", ccsInteger, "");
        
        $this->Pct = new clsField("Pct", ccsFloat, "");
        
        $this->lblDeductiva = new clsField("lblDeductiva", ccsFloat, "");
        

        $this->InsertFields["DiasHabilesReales"] = array("Name" => "[DiasHabilesReales]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioAlta"] = array("Name" => "[UsuarioAlta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaEntrega"] = array("Name" => "[FechaEntrega]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Comentarios"] = array("Name" => "[Comentarios]", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->InsertFields["ID_PPMC"] = array("Name" => "ID_PPMC", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Id_Padre"] = array("Name" => "[Id_Padre]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Nombre"] = array("Name" => "[Nombre]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Formato"] = array("Name" => "[Formato]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaEstFin"] = array("Name" => "[FechaEstFin]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["NombreConHerramienta"] = array("Name" => "[NombreConHerramienta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasHabilesDesviacion"] = array("Name" => "[DiasHabilesDesviacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasNaturalesDesviacion"] = array("Name" => "[DiasNaturalesDesviacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Pct"] = array("Name" => "[Pct]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["PctDeductiva"] = array("Name" => "[PctDeductiva]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasHabilesReales"] = array("Name" => "[DiasHabilesReales]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioAlta"] = array("Name" => "[UsuarioAlta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaEntrega"] = array("Name" => "[FechaEntrega]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Comentarios"] = array("Name" => "[Comentarios]", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->UpdateFields["ID_PPMC"] = array("Name" => "ID_PPMC", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id_Padre"] = array("Name" => "[Id_Padre]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Nombre"] = array("Name" => "[Nombre]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Formato"] = array("Name" => "[Formato]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaEstFin"] = array("Name" => "[FechaEstFin]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["NombreConHerramienta"] = array("Name" => "[NombreConHerramienta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasHabilesDesviacion"] = array("Name" => "[DiasHabilesDesviacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasNaturalesDesviacion"] = array("Name" => "[DiasNaturalesDesviacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Pct"] = array("Name" => "[Pct]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["PctDeductiva"] = array("Name" => "[PctDeductiva]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @190-D6C1B08E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId", ccsInteger, "", "", $this->Parameters["urlId"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[Id]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @190-CE239459
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_info_rs_cr_RE_RC_Artefacto {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @190-5B075248
    function SetValues()
    {
        $this->DiasHabilesReales->SetDBValue(trim($this->f("DiasHabilesReales")));
        $this->UsuarioAlta->SetDBValue($this->f("UsuarioAlta"));
        $this->FechaUltMod->SetDBValue(trim($this->f("FechaUltMod")));
        $this->UsuarioUltMod->SetDBValue($this->f("UsuarioUltMod"));
        $this->FechaEntrega->SetDBValue(trim($this->f("FechaEntrega")));
        $this->Comentarios->SetDBValue($this->f("Comentarios"));
        $this->ID_PPMC->SetDBValue($this->f("ID_PPMC"));
        $this->Id_Padre->SetDBValue($this->f("Id_Padre"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->Formato->SetDBValue($this->f("Formato"));
        $this->FechaEstFin->SetDBValue(trim($this->f("FechaEstFin")));
        $this->NombreConHerramienta->SetDBValue($this->f("NombreConHerramienta"));
        $this->DiasHabilesDesviacion->SetDBValue(trim($this->f("DiasHabilesDesviacion")));
        $this->DiasNaturalesDesviacion->SetDBValue(trim($this->f("DiasNaturalesDesviacion")));
        $this->Pct->SetDBValue(trim($this->f("Pct")));
        $this->lblDeductiva->SetDBValue(trim($this->f("PctDeductiva")));
    }
//End SetValues Method

//Insert Method @190-A2D7E03F
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["DiasHabilesReales"]["Value"] = $this->DiasHabilesReales->GetDBValue(true);
        $this->InsertFields["UsuarioAlta"]["Value"] = $this->UsuarioAlta->GetDBValue(true);
        $this->InsertFields["FechaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->InsertFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->InsertFields["FechaEntrega"]["Value"] = $this->FechaEntrega->GetDBValue(true);
        $this->InsertFields["Comentarios"]["Value"] = $this->Comentarios->GetDBValue(true);
        $this->InsertFields["ID_PPMC"]["Value"] = $this->ID_PPMC->GetDBValue(true);
        $this->InsertFields["Id_Padre"]["Value"] = $this->Id_Padre->GetDBValue(true);
        $this->InsertFields["Descripcion"]["Value"] = $this->Descripcion->GetDBValue(true);
        $this->InsertFields["Nombre"]["Value"] = $this->Nombre->GetDBValue(true);
        $this->InsertFields["Formato"]["Value"] = $this->Formato->GetDBValue(true);
        $this->InsertFields["FechaEstFin"]["Value"] = $this->FechaEstFin->GetDBValue(true);
        $this->InsertFields["NombreConHerramienta"]["Value"] = $this->NombreConHerramienta->GetDBValue(true);
        $this->InsertFields["DiasHabilesDesviacion"]["Value"] = $this->DiasHabilesDesviacion->GetDBValue(true);
        $this->InsertFields["DiasNaturalesDesviacion"]["Value"] = $this->DiasNaturalesDesviacion->GetDBValue(true);
        $this->InsertFields["Pct"]["Value"] = $this->Pct->GetDBValue(true);
        $this->InsertFields["PctDeductiva"]["Value"] = $this->lblDeductiva->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_info_rs_cr_RE_RC_Artefacto", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @190-5D337010
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["DiasHabilesReales"]["Value"] = $this->DiasHabilesReales->GetDBValue(true);
        $this->UpdateFields["UsuarioAlta"]["Value"] = $this->UsuarioAlta->GetDBValue(true);
        $this->UpdateFields["FechaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->UpdateFields["FechaEntrega"]["Value"] = $this->FechaEntrega->GetDBValue(true);
        $this->UpdateFields["Comentarios"]["Value"] = $this->Comentarios->GetDBValue(true);
        $this->UpdateFields["ID_PPMC"]["Value"] = $this->ID_PPMC->GetDBValue(true);
        $this->UpdateFields["Id_Padre"]["Value"] = $this->Id_Padre->GetDBValue(true);
        $this->UpdateFields["Descripcion"]["Value"] = $this->Descripcion->GetDBValue(true);
        $this->UpdateFields["Nombre"]["Value"] = $this->Nombre->GetDBValue(true);
        $this->UpdateFields["Formato"]["Value"] = $this->Formato->GetDBValue(true);
        $this->UpdateFields["FechaEstFin"]["Value"] = $this->FechaEstFin->GetDBValue(true);
        $this->UpdateFields["NombreConHerramienta"]["Value"] = $this->NombreConHerramienta->GetDBValue(true);
        $this->UpdateFields["DiasHabilesDesviacion"]["Value"] = $this->DiasHabilesDesviacion->GetDBValue(true);
        $this->UpdateFields["DiasNaturalesDesviacion"]["Value"] = $this->DiasNaturalesDesviacion->GetDBValue(true);
        $this->UpdateFields["Pct"]["Value"] = $this->Pct->GetDBValue(true);
        $this->UpdateFields["PctDeductiva"]["Value"] = $this->lblDeductiva->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_rs_cr_RE_RC_Artefacto", $this->UpdateFields, $this);
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

//Delete Method @190-FF52C947
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM [mc_info_rs_cr_RE_RC_Artefacto]";
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

} //End mc_info_rs_cr_RE_RC_Artef1DataSource Class @190-FCB6E20C

class clsEditableGridmc_info_rs_cr_RE_RC_Artef2 { //mc_info_rs_cr_RE_RC_Artef2 Class @374-402CB004

//Variables @374-0A5C86AE

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
    public $Sorter_Id;
    public $Sorter_Nombre;
    public $Sorter_Descripcion;
    public $Sorter_Formato;
    public $Sorter_NombreConHerramienta;
    public $Sorter_FechaEstFin;
    public $Sorter_FechaEntrega;
    public $Sorter_DiasHabilesDesviacion;
    public $Sorter_DiasNaturalesDesviacion;
    public $Sorter_PctDeductiva;
//End Variables

//Class_Initialize Event @374-46A0D3F3
    function clsEditableGridmc_info_rs_cr_RE_RC_Artef2($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid mc_info_rs_cr_RE_RC_Artef2/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "mc_info_rs_cr_RE_RC_Artef2";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->CachedColumns["Id"][0] = "Id";
        $this->DataSource = new clsmc_info_rs_cr_RE_RC_Artef2DataSource($this);
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
        $this->DeleteAllowed = true;
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

        $this->SorterName = CCGetParam("mc_info_rs_cr_RE_RC_Artef2Order", "");
        $this->SorterDirection = CCGetParam("mc_info_rs_cr_RE_RC_Artef2Dir", "");

        $this->Sorter_Id = new clsSorter($this->ComponentName, "Sorter_Id", $FileName, $this);
        $this->Sorter_Nombre = new clsSorter($this->ComponentName, "Sorter_Nombre", $FileName, $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_Formato = new clsSorter($this->ComponentName, "Sorter_Formato", $FileName, $this);
        $this->Sorter_NombreConHerramienta = new clsSorter($this->ComponentName, "Sorter_NombreConHerramienta", $FileName, $this);
        $this->Sorter_FechaEstFin = new clsSorter($this->ComponentName, "Sorter_FechaEstFin", $FileName, $this);
        $this->Sorter_FechaEntrega = new clsSorter($this->ComponentName, "Sorter_FechaEntrega", $FileName, $this);
        $this->Sorter_DiasHabilesDesviacion = new clsSorter($this->ComponentName, "Sorter_DiasHabilesDesviacion", $FileName, $this);
        $this->Sorter_DiasNaturalesDesviacion = new clsSorter($this->ComponentName, "Sorter_DiasNaturalesDesviacion", $FileName, $this);
        $this->Sorter_PctDeductiva = new clsSorter($this->ComponentName, "Sorter_PctDeductiva", $FileName, $this);
        $this->Id = new clsControl(ccsLink, "Id", "Id", ccsInteger, "", NULL, $this);
        $this->Id->Page = "PPMCsCrbDetalle.php";
        $this->Nombre = new clsControl(ccsLabel, "Nombre", "Nombre", ccsText, "", NULL, $this);
        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", NULL, $this);
        $this->Formato = new clsControl(ccsLabel, "Formato", "Formato", ccsText, "", NULL, $this);
        $this->NombreConHerramienta = new clsControl(ccsLabel, "NombreConHerramienta", "NombreConHerramienta", ccsText, "", NULL, $this);
        $this->FechaEstFin = new clsControl(ccsLabel, "FechaEstFin", "FechaEstFin", ccsDate, array("ShortDate"), NULL, $this);
        $this->FechaEntrega = new clsControl(ccsLabel, "FechaEntrega", "FechaEntrega", ccsDate, array("ShortDate"), NULL, $this);
        $this->DiasHabilesDesviacion = new clsControl(ccsLabel, "DiasHabilesDesviacion", "DiasHabilesDesviacion", ccsInteger, "", NULL, $this);
        $this->DiasNaturalesDesviacion = new clsControl(ccsLabel, "DiasNaturalesDesviacion", "DiasNaturalesDesviacion", ccsInteger, "", NULL, $this);
        $this->PctDeductiva = new clsControl(ccsLabel, "PctDeductiva", "PctDeductiva", ccsFloat, "", NULL, $this);
        $this->Comentarios = new clsControl(ccsLabel, "Comentarios", "Comentarios", ccsMemo, "", NULL, $this);
        $this->CheckBox_Delete_Panel = new clsPanel("CheckBox_Delete_Panel", $this);
        $this->CheckBox_Delete = new clsControl(ccsCheckBox, "CheckBox_Delete", "CheckBox_Delete", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->CheckBox_Delete->CheckedValue = true;
        $this->CheckBox_Delete->UncheckedValue = false;
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->CheckBox_Delete_Panel->AddComponent("CheckBox_Delete", $this->CheckBox_Delete);
    }
//End Class_Initialize Event

//Initialize Method @374-2F4F5D94
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urlsID"] = CCGetFromGet("sID", NULL);
    }
//End Initialize Method

//GetFormParameters Method @374-5BC48FB4
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["CheckBox_Delete"][$RowNumber] = CCGetFromPost("CheckBox_Delete_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @374-340A7A45
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["Id"] = $this->CachedColumns["Id"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if(!$this->CheckBox_Delete->Value)
                    $Validation = ($this->ValidateRow() && $Validation);
            }
            else if($this->CheckInsert())
            {
                $Validation = ($this->ValidateRow() && $Validation);
            }
        }
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//ValidateRow Method @374-213646E1
    function ValidateRow()
    {
        global $CCSLocales;
        $this->CheckBox_Delete->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->CheckBox_Delete->Errors->ToString());
        $this->CheckBox_Delete->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @374-FC0A7F41
    function CheckInsert()
    {
        $filed = false;
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @374-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @374-909F269B
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
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Submit") {
            if(!CCGetEvent($this->Button_Submit->CCSEvents, "OnClick", $this->Button_Submit) || !$this->UpdateGrid()) {
                $Redirect = "";
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//UpdateGrid Method @374-9482BF9F
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["Id"] = $this->CachedColumns["Id"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if($this->CheckBox_Delete->Value) {
                    if($this->DeleteAllowed) { $Validation = ($this->DeleteRow() && $Validation); }
                } else if($this->UpdateAllowed) {
                    $Validation = ($this->UpdateRow() && $Validation);
                }
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

//DeleteRow Method @374-A4A656F6
    function DeleteRow()
    {
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End DeleteRow Method

//FormScript Method @374-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @374-4EB6C0EF
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
            for($i = 2; $i < sizeof($pieces); $i = $i + 1)  {
                $piece = $pieces[$i + 0];
                $piece = str_replace("\\" . ord("\\"), "\\", $piece);
                $piece = str_replace("\\" . ord(";"), ";", $piece);
                $this->CachedColumns["Id"][$RowNumber] = $piece;
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $this->CachedColumns["Id"][$RowNumber] = "";
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @374-D936D85E
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["Id"][$i]));
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @374-045581F7
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


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
        $this->ControlsVisible["Id"] = $this->Id->Visible;
        $this->ControlsVisible["Nombre"] = $this->Nombre->Visible;
        $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
        $this->ControlsVisible["Formato"] = $this->Formato->Visible;
        $this->ControlsVisible["NombreConHerramienta"] = $this->NombreConHerramienta->Visible;
        $this->ControlsVisible["FechaEstFin"] = $this->FechaEstFin->Visible;
        $this->ControlsVisible["FechaEntrega"] = $this->FechaEntrega->Visible;
        $this->ControlsVisible["DiasHabilesDesviacion"] = $this->DiasHabilesDesviacion->Visible;
        $this->ControlsVisible["DiasNaturalesDesviacion"] = $this->DiasNaturalesDesviacion->Visible;
        $this->ControlsVisible["PctDeductiva"] = $this->PctDeductiva->Visible;
        $this->ControlsVisible["Comentarios"] = $this->Comentarios->Visible;
        $this->ControlsVisible["CheckBox_Delete_Panel"] = $this->CheckBox_Delete_Panel->Visible;
        $this->ControlsVisible["CheckBox_Delete"] = $this->CheckBox_Delete->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($is_next_record) || !($this->DeleteAllowed)) {
                    $this->CheckBox_Delete->Visible = false;
                    $this->CheckBox_Delete_Panel->Visible = false;
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->CachedColumns["Id"][$this->RowNumber] = $this->DataSource->CachedColumns["Id"];
                    $this->CheckBox_Delete->SetValue(false);
                    $this->Id->SetValue($this->DataSource->Id->GetValue());
                    $this->Id->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                    $this->Id->Parameters = CCAddParam($this->Id->Parameters, "Id", $this->DataSource->f("Id"));
                    $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->Formato->SetValue($this->DataSource->Formato->GetValue());
                    $this->NombreConHerramienta->SetValue($this->DataSource->NombreConHerramienta->GetValue());
                    $this->FechaEstFin->SetValue($this->DataSource->FechaEstFin->GetValue());
                    $this->FechaEntrega->SetValue($this->DataSource->FechaEntrega->GetValue());
                    $this->DiasHabilesDesviacion->SetValue($this->DataSource->DiasHabilesDesviacion->GetValue());
                    $this->DiasNaturalesDesviacion->SetValue($this->DataSource->DiasNaturalesDesviacion->GetValue());
                    $this->PctDeductiva->SetValue($this->DataSource->PctDeductiva->GetValue());
                    $this->Comentarios->SetValue($this->DataSource->Comentarios->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->Id->SetText("");
                    $this->Nombre->SetText("");
                    $this->Descripcion->SetText("");
                    $this->Formato->SetText("");
                    $this->NombreConHerramienta->SetText("");
                    $this->FechaEstFin->SetText("");
                    $this->FechaEntrega->SetText("");
                    $this->DiasHabilesDesviacion->SetText("");
                    $this->DiasNaturalesDesviacion->SetText("");
                    $this->PctDeductiva->SetText("");
                    $this->Comentarios->SetText("");
                    $this->Id->SetValue($this->DataSource->Id->GetValue());
                    $this->Id->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                    $this->Id->Parameters = CCAddParam($this->Id->Parameters, "Id", $this->DataSource->f("Id"));
                    $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->Formato->SetValue($this->DataSource->Formato->GetValue());
                    $this->NombreConHerramienta->SetValue($this->DataSource->NombreConHerramienta->GetValue());
                    $this->FechaEstFin->SetValue($this->DataSource->FechaEstFin->GetValue());
                    $this->FechaEntrega->SetValue($this->DataSource->FechaEntrega->GetValue());
                    $this->DiasHabilesDesviacion->SetValue($this->DataSource->DiasHabilesDesviacion->GetValue());
                    $this->DiasNaturalesDesviacion->SetValue($this->DataSource->DiasNaturalesDesviacion->GetValue());
                    $this->PctDeductiva->SetValue($this->DataSource->PctDeductiva->GetValue());
                    $this->Comentarios->SetValue($this->DataSource->Comentarios->GetValue());
                    $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
                    $this->Id->Parameters = CCAddParam($this->Id->Parameters, "Id", $this->DataSource->f("Id"));
                    $this->Id->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                } elseif (!$this->FormSubmitted) {
                    $this->CachedColumns["Id"][$this->RowNumber] = "";
                    $this->Id->SetText("");
                    $this->Nombre->SetText("");
                    $this->Descripcion->SetText("");
                    $this->Formato->SetText("");
                    $this->NombreConHerramienta->SetText("");
                    $this->FechaEstFin->SetText("");
                    $this->FechaEntrega->SetText("");
                    $this->DiasHabilesDesviacion->SetText("");
                    $this->DiasNaturalesDesviacion->SetText("");
                    $this->PctDeductiva->SetText("");
                    $this->Comentarios->SetText("");
                    $this->Id->Parameters = CCAddParam($this->Id->Parameters, "Id", $this->DataSource->f("Id"));
                } else {
                    $this->Id->SetText("");
                    $this->Nombre->SetText("");
                    $this->Descripcion->SetText("");
                    $this->Formato->SetText("");
                    $this->NombreConHerramienta->SetText("");
                    $this->FechaEstFin->SetText("");
                    $this->FechaEntrega->SetText("");
                    $this->DiasHabilesDesviacion->SetText("");
                    $this->DiasNaturalesDesviacion->SetText("");
                    $this->PctDeductiva->SetText("");
                    $this->Comentarios->SetText("");
                    $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
                    $this->Id->Parameters = CCAddParam($this->Id->Parameters, "Id", $this->DataSource->f("Id"));
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id->Show($this->RowNumber);
                $this->Nombre->Show($this->RowNumber);
                $this->Descripcion->Show($this->RowNumber);
                $this->Formato->Show($this->RowNumber);
                $this->NombreConHerramienta->Show($this->RowNumber);
                $this->FechaEstFin->Show($this->RowNumber);
                $this->FechaEntrega->Show($this->RowNumber);
                $this->DiasHabilesDesviacion->Show($this->RowNumber);
                $this->DiasNaturalesDesviacion->Show($this->RowNumber);
                $this->PctDeductiva->Show($this->RowNumber);
                $this->Comentarios->Show($this->RowNumber);
                $this->CheckBox_Delete_Panel->Show($this->RowNumber);
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
                        $is_next_record = $this->RowNumber < $this->UpdatedRows;
                        if (($this->DataSource->CachedColumns["Id"] == $this->CachedColumns["Id"][$this->RowNumber])) {
                            if ($this->ReadAllowed) $this->DataSource->next_record();
                        }
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
        $this->Sorter_Id->Show();
        $this->Sorter_Nombre->Show();
        $this->Sorter_Descripcion->Show();
        $this->Sorter_Formato->Show();
        $this->Sorter_NombreConHerramienta->Show();
        $this->Sorter_FechaEstFin->Show();
        $this->Sorter_FechaEntrega->Show();
        $this->Sorter_DiasHabilesDesviacion->Show();
        $this->Sorter_DiasNaturalesDesviacion->Show();
        $this->Sorter_PctDeductiva->Show();
        $this->Navigator->Show();
        $this->Button_Submit->Show();

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

} //End mc_info_rs_cr_RE_RC_Artef2 Class @374-FCB6E20C

class clsmc_info_rs_cr_RE_RC_Artef2DataSource extends clsDBcnDisenio {  //mc_info_rs_cr_RE_RC_Artef2DataSource Class @374-71EAC105

//DataSource Variables @374-92A2BFF0
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $DeleteParameters;
    public $CountSQL;
    public $wp;
    public $AllParametersSet;

    public $CachedColumns;
    public $CurrentRow;

    // Datasource fields
    public $Id;
    public $Nombre;
    public $Descripcion;
    public $Formato;
    public $NombreConHerramienta;
    public $FechaEstFin;
    public $FechaEntrega;
    public $DiasHabilesDesviacion;
    public $DiasNaturalesDesviacion;
    public $PctDeductiva;
    public $Comentarios;
    public $CheckBox_Delete;
//End DataSource Variables

//DataSourceClass_Initialize Event @374-EBB1F989
    function clsmc_info_rs_cr_RE_RC_Artef2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid mc_info_rs_cr_RE_RC_Artef2/Error";
        $this->Initialize();
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->Nombre = new clsField("Nombre", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->Formato = new clsField("Formato", ccsText, "");
        
        $this->NombreConHerramienta = new clsField("NombreConHerramienta", ccsText, "");
        
        $this->FechaEstFin = new clsField("FechaEstFin", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaEntrega = new clsField("FechaEntrega", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->DiasHabilesDesviacion = new clsField("DiasHabilesDesviacion", ccsInteger, "");
        
        $this->DiasNaturalesDesviacion = new clsField("DiasNaturalesDesviacion", ccsInteger, "");
        
        $this->PctDeductiva = new clsField("PctDeductiva", ccsFloat, "");
        
        $this->Comentarios = new clsField("Comentarios", ccsMemo, "");
        
        $this->CheckBox_Delete = new clsField("CheckBox_Delete", ccsBoolean, $this->BooleanFormat);
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @374-F344964B
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
            "Sorter_DiasNaturalesDesviacion" => array("DiasNaturalesDesviacion", ""), 
            "Sorter_PctDeductiva" => array("PctDeductiva", "")));
    }
//End SetOrder Method

//Prepare Method @374-EF04C502
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlsID", ccsInteger, "", "", $this->Parameters["urlsID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[Id_Padre]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @374-4426858A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM mc_info_rs_cr_RE_RC_Artefacto";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} * \n\n" .
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

//SetValues Method @374-2A18127E
    function SetValues()
    {
        $this->CachedColumns["Id"] = $this->f("Id");
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->Formato->SetDBValue($this->f("Formato"));
        $this->NombreConHerramienta->SetDBValue($this->f("NombreConHerramienta"));
        $this->FechaEstFin->SetDBValue(trim($this->f("FechaEstFin")));
        $this->FechaEntrega->SetDBValue(trim($this->f("FechaEntrega")));
        $this->DiasHabilesDesviacion->SetDBValue(trim($this->f("DiasHabilesDesviacion")));
        $this->DiasNaturalesDesviacion->SetDBValue(trim($this->f("DiasNaturalesDesviacion")));
        $this->PctDeductiva->SetDBValue(trim($this->f("PctDeductiva")));
        $this->Comentarios->SetDBValue($this->f("Comentarios"));
    }
//End SetValues Method

//Delete Method @374-75CC7EBD
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $SelectWhere = $this->Where;
        $this->Where = "Id=" . $this->ToSQL($this->CachedColumns["Id"], ccsInteger);
        $this->SQL = "DELETE FROM [mc_info_rs_cr_RE_RC_Artefacto]";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
        $this->Where = $SelectWhere;
    }
//End Delete Method

} //End mc_info_rs_cr_RE_RC_Artef2DataSource Class @374-FCB6E20C



//Initialize Page @1-93F54244
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
$TemplateFileName = "PPMCsCrbDetalle.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/ui/jquery.ui.core.js|js/jquery/ui/jquery.ui.widget.js|js/jquery/ui/jquery.ui.datepicker.js|js/jquery/datepicker/ccs-date-timepicker.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-DCC8390B
CCSecurityRedirect("3;4;5", "");
//End Authenticate User

//Include events file @1-FB513E91
include_once("./PPMCsCrbDetalle_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-634FC7FF
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_info_rs_ap_EC = new clsRecordmc_info_rs_ap_EC("", $MainPage);
$lkSiguiente = new clsControl(ccsLink, "lkSiguiente", "lkSiguiente", ccsText, "", CCGetRequestParam("lkSiguiente", ccsGet, NULL), $MainPage);
$lkSiguiente->Page = "PPMCsCrbDetalle.php";
$lkAnterior = new clsControl(ccsLink, "lkAnterior", "lkAnterior", ccsText, "", CCGetRequestParam("lkAnterior", ccsGet, NULL), $MainPage);
$lkAnterior->Page = "PPMCsCrbDetalle.php";
$mc_info_rs_cr_RE_RC_Artef1 = new clsRecordmc_info_rs_cr_RE_RC_Artef1("", $MainPage);
$lDocs = new clsControl(ccsLabel, "lDocs", "lDocs", ccsText, "", CCGetRequestParam("lDocs", ccsGet, NULL), $MainPage);
$lDocs->HTML = true;
$lErrores = new clsControl(ccsLabel, "lErrores", "lErrores", ccsText, "", CCGetRequestParam("lErrores", ccsGet, NULL), $MainPage);
$lErrores->HTML = true;
$lkReqFun = new clsControl(ccsLink, "lkReqFun", "lkReqFun", ccsText, "", CCGetRequestParam("lkReqFun", ccsGet, NULL), $MainPage);
$lkReqFun->Page = "PPMCsCumpReqFunDetalle.php";
$lkCalidad = new clsControl(ccsLink, "lkCalidad", "lkCalidad", ccsText, "", CCGetRequestParam("lkCalidad", ccsGet, NULL), $MainPage);
$lkCalidad->Parameters = CCAddParam($lkCalidad->Parameters, "Id", CCGetFromGet("sID", NULL));
$lkCalidad->Page = "PPMCsCrbCalidad.php";
$lkRetEnt_Calidad = new clsControl(ccsLink, "lkRetEnt_Calidad", "lkRetEnt_Calidad", ccsText, "", CCGetRequestParam("lkRetEnt_Calidad", ccsGet, NULL), $MainPage);
$lkRetEnt_Calidad->Parameters = CCAddParam($lkRetEnt_Calidad->Parameters, "sID", CCGetFromGet("Id", NULL));
$lkRetEnt_Calidad->Parameters = CCAddParam($lkRetEnt_Calidad->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkRetEnt_Calidad->Page = "PPMCsCrbDetalle.php";
$lkCalidadCod = new clsControl(ccsLink, "lkCalidadCod", "lkCalidadCod", ccsText, "", CCGetRequestParam("lkCalidadCod", ccsGet, NULL), $MainPage);
$lkCalidadCod->Parameters = CCAddParam($lkCalidadCod->Parameters, "Id", CCGetFromGet("sID", NULL));
$lkCalidadCod->Page = "PPMCsCrCalCodDetalle.php";
$Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCAddParam($Link1->Parameters, "Id", CCGetFromGet("sID", NULL));
$Link1->Page = "PPMCsDefFugDetalle.php";
$mc_info_rs_cr_RE_RC_Artef2 = new clsEditableGridmc_info_rs_cr_RE_RC_Artef2("", $MainPage);
$Link2 = new clsControl(ccsLink, "Link2", "Link2", ccsText, "", CCGetRequestParam("Link2", ccsGet, NULL), $MainPage);
$Link2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link2->Page = "ListaEntregablesSharePoint.php";
$Panel1 = new clsPanel("Panel1", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_info_rs_ap_EC = & $mc_info_rs_ap_EC;
$MainPage->lkSiguiente = & $lkSiguiente;
$MainPage->lkAnterior = & $lkAnterior;
$MainPage->mc_info_rs_cr_RE_RC_Artef1 = & $mc_info_rs_cr_RE_RC_Artef1;
$MainPage->lDocs = & $lDocs;
$MainPage->lErrores = & $lErrores;
$MainPage->lkReqFun = & $lkReqFun;
$MainPage->lkCalidad = & $lkCalidad;
$MainPage->lkRetEnt_Calidad = & $lkRetEnt_Calidad;
$MainPage->lkCalidadCod = & $lkCalidadCod;
$MainPage->Link1 = & $Link1;
$MainPage->mc_info_rs_cr_RE_RC_Artef2 = & $mc_info_rs_cr_RE_RC_Artef2;
$MainPage->Link2 = & $Link2;
$MainPage->Panel1 = & $Panel1;
$lkReqFun->Parameters = "";
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "Id", CCGetFromGet("sID", NULL));
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "src", 1);
$mc_info_rs_ap_EC->Initialize();
$mc_info_rs_cr_RE_RC_Artef1->Initialize();
$mc_info_rs_cr_RE_RC_Artef2->Initialize();
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

//Execute Components @1-A48FE302
$mc_info_rs_cr_RE_RC_Artef2->Operation();
$mc_info_rs_cr_RE_RC_Artef1->Operation();
$mc_info_rs_ap_EC->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-78BF63FF
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_info_rs_ap_EC);
    unset($mc_info_rs_cr_RE_RC_Artef1);
    unset($mc_info_rs_cr_RE_RC_Artef2);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-D5703C48
$Header->Show();
$mc_info_rs_ap_EC->Show();
$mc_info_rs_cr_RE_RC_Artef1->Show();
$mc_info_rs_cr_RE_RC_Artef2->Show();
$lkSiguiente->Show();
$lkAnterior->Show();
$lDocs->Show();
$lErrores->Show();
$lkReqFun->Show();
$lkCalidad->Show();
$lkRetEnt_Calidad->Show();
$lkCalidadCod->Show();
$Link1->Show();
$Link2->Show();
$Panel1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-E92069CF
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_info_rs_ap_EC);
unset($mc_info_rs_cr_RE_RC_Artef1);
unset($mc_info_rs_cr_RE_RC_Artef2);
unset($Tpl);
//End Unload Page


?>
