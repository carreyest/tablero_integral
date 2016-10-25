<?php
//Include Common Files @1-1F27A56E
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsDefFugDetalle.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_info_rs_cr_deffug { //mc_info_rs_cr_deffug Class @3-B56FF5B4

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

//Class_Initialize Event @3-445F46E9
    function clsRecordmc_info_rs_cr_deffug($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_rs_cr_deffug/Error";
        $this->DataSource = new clsmc_info_rs_cr_deffugDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_rs_cr_deffug";
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
            $this->Id = new clsControl(ccsHidden, "Id", "Id", ccsInteger, "", CCGetRequestParam("Id", $Method, NULL), $this);
            $this->Id->Required = true;
            $this->Id_PPMC = new clsControl(ccsHidden, "Id_PPMC", "Id PPMC", ccsInteger, "", CCGetRequestParam("Id_PPMC", $Method, NULL), $this);
            $this->Id_PPMC->Required = true;
            $this->ID_Estimacion = new clsControl(ccsHidden, "ID_Estimacion", "ID Estimacion", ccsInteger, "", CCGetRequestParam("ID_Estimacion", $Method, NULL), $this);
            $this->ID_Estimacion->Required = true;
            $this->Incidentes = new clsControl(ccsTextBox, "Incidentes", "Incidentes", ccsText, "", CCGetRequestParam("Incidentes", $Method, NULL), $this);
            $this->NumIncidentes = new clsControl(ccsTextBox, "NumIncidentes", "Num Incidentes", ccsInteger, "", CCGetRequestParam("NumIncidentes", $Method, NULL), $this);
            $this->NumIncidentes->Required = true;
            $this->Paquetes = new clsControl(ccsTextBox, "Paquetes", "Paquetes", ccsText, "", CCGetRequestParam("Paquetes", $Method, NULL), $this);
            $this->NumPaquetes = new clsControl(ccsTextBox, "NumPaquetes", "Num Paquetes", ccsInteger, "", CCGetRequestParam("NumPaquetes", $Method, NULL), $this);
            $this->NumPaquetes->Required = true;
            $this->IncidentesRAPE = new clsControl(ccsTextBox, "IncidentesRAPE", "Incidentes RAPE", ccsText, "", CCGetRequestParam("IncidentesRAPE", $Method, NULL), $this);
            $this->NumIncidentesRAPE = new clsControl(ccsTextBox, "NumIncidentesRAPE", "Num Incidentes RAPE", ccsInteger, "", CCGetRequestParam("NumIncidentesRAPE", $Method, NULL), $this);
            $this->NumIncidentesRAPE->Required = true;
            $this->Deductiva = new clsControl(ccsTextBox, "Deductiva", "Deductiva", ccsFloat, "", CCGetRequestParam("Deductiva", $Method, NULL), $this);
            $this->CumpleDefFug = new clsControl(ccsListBox, "CumpleDefFug", "Cumple Def Fug", ccsInteger, "", CCGetRequestParam("CumpleDefFug", $Method, NULL), $this);
            $this->CumpleDefFug->DSType = dsListOfValues;
            $this->CumpleDefFug->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsText, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->UsuarioUltMod = new clsControl(ccsHidden, "UsuarioUltMod", "Usuario Ult Mod", ccsText, "", CCGetRequestParam("UsuarioUltMod", $Method, NULL), $this);
            $this->FechaUltMod = new clsControl(ccsHidden, "FechaUltMod", "Fecha Ult Mod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn"), CCGetRequestParam("FechaUltMod", $Method, NULL), $this);
            $this->hdIdProveedor = new clsControl(ccsHidden, "hdIdProveedor", "hdIdProveedor", ccsText, "", CCGetRequestParam("hdIdProveedor", $Method, NULL), $this);
            $this->btnCalcula = new clsButton("btnCalcula", $Method, $this);
            $this->lbPPMC = new clsControl(ccsLabel, "lbPPMC", "lbPPMC", ccsText, "", CCGetRequestParam("lbPPMC", $Method, NULL), $this);
            $this->sNombreProyecto = new clsControl(ccsLabel, "sNombreProyecto", "sNombreProyecto", ccsText, "", CCGetRequestParam("sNombreProyecto", $Method, NULL), $this);
            $this->lServNegocio = new clsControl(ccsLabel, "lServNegocio", "lServNegocio", ccsText, "", CCGetRequestParam("lServNegocio", $Method, NULL), $this);
            $this->sTipoRequerimiento = new clsControl(ccsLabel, "sTipoRequerimiento", "sTipoRequerimiento", ccsText, "", CCGetRequestParam("sTipoRequerimiento", $Method, NULL), $this);
            $this->lbTotalDefectos = new clsControl(ccsLabel, "lbTotalDefectos", "lbTotalDefectos", ccsText, "", CCGetRequestParam("lbTotalDefectos", $Method, NULL), $this);
            $this->lReportado = new clsControl(ccsLabel, "lReportado", "lReportado", ccsText, "", CCGetRequestParam("lReportado", $Method, NULL), $this);
            $this->evidencia_salvedad = new clsControl(ccsCheckBox, "evidencia_salvedad", "evidencia_salvedad", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("evidencia_salvedad", $Method, NULL), $this);
            $this->evidencia_salvedad->CheckedValue = true;
            $this->evidencia_salvedad->UncheckedValue = false;
            $this->observacion_salvedad = new clsControl(ccsTextArea, "observacion_salvedad", "observacion_salvedad", ccsText, "", CCGetRequestParam("observacion_salvedad", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->NumIncidentes->Value) && !strlen($this->NumIncidentes->Value) && $this->NumIncidentes->Value !== false)
                    $this->NumIncidentes->SetText(0);
                if(!is_array($this->NumIncidentesRAPE->Value) && !strlen($this->NumIncidentesRAPE->Value) && $this->NumIncidentesRAPE->Value !== false)
                    $this->NumIncidentesRAPE->SetText(0);
                if(!is_array($this->UsuarioUltMod->Value) && !strlen($this->UsuarioUltMod->Value) && $this->UsuarioUltMod->Value !== false)
                    $this->UsuarioUltMod->SetText(CCGetUserLogin());
                if(!is_array($this->FechaUltMod->Value) && !strlen($this->FechaUltMod->Value) && $this->FechaUltMod->Value !== false)
                    $this->FechaUltMod->SetText(date("Y-m-d H:i"));
                if(!is_array($this->evidencia_salvedad->Value) && !strlen($this->evidencia_salvedad->Value) && $this->evidencia_salvedad->Value !== false)
                    $this->evidencia_salvedad->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @3-4F76030F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//Validate Method @3-D6F47281
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Id->Validate() && $Validation);
        $Validation = ($this->Id_PPMC->Validate() && $Validation);
        $Validation = ($this->ID_Estimacion->Validate() && $Validation);
        $Validation = ($this->Incidentes->Validate() && $Validation);
        $Validation = ($this->NumIncidentes->Validate() && $Validation);
        $Validation = ($this->Paquetes->Validate() && $Validation);
        $Validation = ($this->NumPaquetes->Validate() && $Validation);
        $Validation = ($this->IncidentesRAPE->Validate() && $Validation);
        $Validation = ($this->NumIncidentesRAPE->Validate() && $Validation);
        $Validation = ($this->Deductiva->Validate() && $Validation);
        $Validation = ($this->CumpleDefFug->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->UsuarioUltMod->Validate() && $Validation);
        $Validation = ($this->FechaUltMod->Validate() && $Validation);
        $Validation = ($this->hdIdProveedor->Validate() && $Validation);
        $Validation = ($this->evidencia_salvedad->Validate() && $Validation);
        $Validation = ($this->observacion_salvedad->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Id_PPMC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ID_Estimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Incidentes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NumIncidentes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Paquetes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NumPaquetes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IncidentesRAPE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NumIncidentesRAPE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Deductiva->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumpleDefFug->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsuarioUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdIdProveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->evidencia_salvedad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->observacion_salvedad->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-AB1FB6BF
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Id->Errors->Count());
        $errors = ($errors || $this->Id_PPMC->Errors->Count());
        $errors = ($errors || $this->ID_Estimacion->Errors->Count());
        $errors = ($errors || $this->Incidentes->Errors->Count());
        $errors = ($errors || $this->NumIncidentes->Errors->Count());
        $errors = ($errors || $this->Paquetes->Errors->Count());
        $errors = ($errors || $this->NumPaquetes->Errors->Count());
        $errors = ($errors || $this->IncidentesRAPE->Errors->Count());
        $errors = ($errors || $this->NumIncidentesRAPE->Errors->Count());
        $errors = ($errors || $this->Deductiva->Errors->Count());
        $errors = ($errors || $this->CumpleDefFug->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->UsuarioUltMod->Errors->Count());
        $errors = ($errors || $this->FechaUltMod->Errors->Count());
        $errors = ($errors || $this->hdIdProveedor->Errors->Count());
        $errors = ($errors || $this->lbPPMC->Errors->Count());
        $errors = ($errors || $this->sNombreProyecto->Errors->Count());
        $errors = ($errors || $this->lServNegocio->Errors->Count());
        $errors = ($errors || $this->sTipoRequerimiento->Errors->Count());
        $errors = ($errors || $this->lbTotalDefectos->Errors->Count());
        $errors = ($errors || $this->lReportado->Errors->Count());
        $errors = ($errors || $this->evidencia_salvedad->Errors->Count());
        $errors = ($errors || $this->observacion_salvedad->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-7F82B9C1
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
            } else if($this->btnCalcula->Pressed) {
                $this->PressedButton = "btnCalcula";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = "PPMCsDefFugDetalle.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = "PPMCsDefFugDetalle.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "btnCalcula") {
                $Redirect = "PPMCsDefFugDetalle.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_Insert", "Button_Insert_x", "Button_Insert_y", "Button_Update", "Button_Update_x", "Button_Update_y", "btnCalcula", "btnCalcula_x", "btnCalcula_y")), CCGetQueryString("QueryString", array("Id", "Id_PPMC", "ID_Estimacion", "Incidentes", "NumIncidentes", "Paquetes", "NumPaquetes", "IncidentesRAPE", "NumIncidentesRAPE", "Deductiva", "CumpleDefFug", "Observaciones", "UsuarioUltMod", "FechaUltMod", "hdIdProveedor", "evidencia_salvedad", "observacion_salvedad", "ccsForm")));
                if(!CCGetEvent($this->btnCalcula->CCSEvents, "OnClick", $this->btnCalcula)) {
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

//InsertRow Method @3-C56CD2DC
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Id->SetValue($this->Id->GetValue(true));
        $this->DataSource->Id_PPMC->SetValue($this->Id_PPMC->GetValue(true));
        $this->DataSource->ID_Estimacion->SetValue($this->ID_Estimacion->GetValue(true));
        $this->DataSource->Incidentes->SetValue($this->Incidentes->GetValue(true));
        $this->DataSource->NumIncidentes->SetValue($this->NumIncidentes->GetValue(true));
        $this->DataSource->Paquetes->SetValue($this->Paquetes->GetValue(true));
        $this->DataSource->NumPaquetes->SetValue($this->NumPaquetes->GetValue(true));
        $this->DataSource->IncidentesRAPE->SetValue($this->IncidentesRAPE->GetValue(true));
        $this->DataSource->NumIncidentesRAPE->SetValue($this->NumIncidentesRAPE->GetValue(true));
        $this->DataSource->Deductiva->SetValue($this->Deductiva->GetValue(true));
        $this->DataSource->CumpleDefFug->SetValue($this->CumpleDefFug->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->hdIdProveedor->SetValue($this->hdIdProveedor->GetValue(true));
        $this->DataSource->lbPPMC->SetValue($this->lbPPMC->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->lServNegocio->SetValue($this->lServNegocio->GetValue(true));
        $this->DataSource->sTipoRequerimiento->SetValue($this->sTipoRequerimiento->GetValue(true));
        $this->DataSource->lbTotalDefectos->SetValue($this->lbTotalDefectos->GetValue(true));
        $this->DataSource->lReportado->SetValue($this->lReportado->GetValue(true));
        $this->DataSource->evidencia_salvedad->SetValue($this->evidencia_salvedad->GetValue(true));
        $this->DataSource->observacion_salvedad->SetValue($this->observacion_salvedad->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-138D7F99
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Id->SetValue($this->Id->GetValue(true));
        $this->DataSource->Id_PPMC->SetValue($this->Id_PPMC->GetValue(true));
        $this->DataSource->ID_Estimacion->SetValue($this->ID_Estimacion->GetValue(true));
        $this->DataSource->Incidentes->SetValue($this->Incidentes->GetValue(true));
        $this->DataSource->NumIncidentes->SetValue($this->NumIncidentes->GetValue(true));
        $this->DataSource->Paquetes->SetValue($this->Paquetes->GetValue(true));
        $this->DataSource->NumPaquetes->SetValue($this->NumPaquetes->GetValue(true));
        $this->DataSource->IncidentesRAPE->SetValue($this->IncidentesRAPE->GetValue(true));
        $this->DataSource->NumIncidentesRAPE->SetValue($this->NumIncidentesRAPE->GetValue(true));
        $this->DataSource->Deductiva->SetValue($this->Deductiva->GetValue(true));
        $this->DataSource->CumpleDefFug->SetValue($this->CumpleDefFug->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->evidencia_salvedad->SetValue($this->evidencia_salvedad->GetValue(true));
        $this->DataSource->observacion_salvedad->SetValue($this->observacion_salvedad->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @3-896F653B
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

        $this->CumpleDefFug->Prepare();

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
                    $this->Id->SetValue($this->DataSource->Id->GetValue());
                    $this->Id_PPMC->SetValue($this->DataSource->Id_PPMC->GetValue());
                    $this->ID_Estimacion->SetValue($this->DataSource->ID_Estimacion->GetValue());
                    $this->Incidentes->SetValue($this->DataSource->Incidentes->GetValue());
                    $this->NumIncidentes->SetValue($this->DataSource->NumIncidentes->GetValue());
                    $this->Paquetes->SetValue($this->DataSource->Paquetes->GetValue());
                    $this->NumPaquetes->SetValue($this->DataSource->NumPaquetes->GetValue());
                    $this->IncidentesRAPE->SetValue($this->DataSource->IncidentesRAPE->GetValue());
                    $this->NumIncidentesRAPE->SetValue($this->DataSource->NumIncidentesRAPE->GetValue());
                    $this->Deductiva->SetValue($this->DataSource->Deductiva->GetValue());
                    $this->CumpleDefFug->SetValue($this->DataSource->CumpleDefFug->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                    $this->UsuarioUltMod->SetValue($this->DataSource->UsuarioUltMod->GetValue());
                    $this->FechaUltMod->SetValue($this->DataSource->FechaUltMod->GetValue());
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
            $Error = ComposeStrings($Error, $this->Id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Id_PPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ID_Estimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Incidentes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NumIncidentes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Paquetes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NumPaquetes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IncidentesRAPE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NumIncidentesRAPE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Deductiva->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumpleDefFug->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsuarioUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdIdProveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sNombreProyecto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lServNegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sTipoRequerimiento->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbTotalDefectos->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Id->Show();
        $this->Id_PPMC->Show();
        $this->ID_Estimacion->Show();
        $this->Incidentes->Show();
        $this->NumIncidentes->Show();
        $this->Paquetes->Show();
        $this->NumPaquetes->Show();
        $this->IncidentesRAPE->Show();
        $this->NumIncidentesRAPE->Show();
        $this->Deductiva->Show();
        $this->CumpleDefFug->Show();
        $this->Observaciones->Show();
        $this->UsuarioUltMod->Show();
        $this->FechaUltMod->Show();
        $this->hdIdProveedor->Show();
        $this->btnCalcula->Show();
        $this->lbPPMC->Show();
        $this->sNombreProyecto->Show();
        $this->lServNegocio->Show();
        $this->sTipoRequerimiento->Show();
        $this->lbTotalDefectos->Show();
        $this->lReportado->Show();
        $this->evidencia_salvedad->Show();
        $this->observacion_salvedad->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_rs_cr_deffug Class @3-FCB6E20C

class clsmc_info_rs_cr_deffugDataSource extends clsDBcnDisenio {  //mc_info_rs_cr_deffugDataSource Class @3-B204D397

//DataSource Variables @3-5758F092
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
    public $Id;
    public $Id_PPMC;
    public $ID_Estimacion;
    public $Incidentes;
    public $NumIncidentes;
    public $Paquetes;
    public $NumPaquetes;
    public $IncidentesRAPE;
    public $NumIncidentesRAPE;
    public $Deductiva;
    public $CumpleDefFug;
    public $Observaciones;
    public $UsuarioUltMod;
    public $FechaUltMod;
    public $hdIdProveedor;
    public $lbPPMC;
    public $sNombreProyecto;
    public $lServNegocio;
    public $sTipoRequerimiento;
    public $lbTotalDefectos;
    public $lReportado;
    public $evidencia_salvedad;
    public $observacion_salvedad;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-5544B834
    function clsmc_info_rs_cr_deffugDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_rs_cr_deffug/Error";
        $this->Initialize();
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->Id_PPMC = new clsField("Id_PPMC", ccsInteger, "");
        
        $this->ID_Estimacion = new clsField("ID_Estimacion", ccsInteger, "");
        
        $this->Incidentes = new clsField("Incidentes", ccsText, "");
        
        $this->NumIncidentes = new clsField("NumIncidentes", ccsInteger, "");
        
        $this->Paquetes = new clsField("Paquetes", ccsText, "");
        
        $this->NumPaquetes = new clsField("NumPaquetes", ccsInteger, "");
        
        $this->IncidentesRAPE = new clsField("IncidentesRAPE", ccsText, "");
        
        $this->NumIncidentesRAPE = new clsField("NumIncidentesRAPE", ccsInteger, "");
        
        $this->Deductiva = new clsField("Deductiva", ccsFloat, "");
        
        $this->CumpleDefFug = new clsField("CumpleDefFug", ccsInteger, "");
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->UsuarioUltMod = new clsField("UsuarioUltMod", ccsText, "");
        
        $this->FechaUltMod = new clsField("FechaUltMod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->hdIdProveedor = new clsField("hdIdProveedor", ccsText, "");
        
        $this->lbPPMC = new clsField("lbPPMC", ccsText, "");
        
        $this->sNombreProyecto = new clsField("sNombreProyecto", ccsText, "");
        
        $this->lServNegocio = new clsField("lServNegocio", ccsText, "");
        
        $this->sTipoRequerimiento = new clsField("sTipoRequerimiento", ccsText, "");
        
        $this->lbTotalDefectos = new clsField("lbTotalDefectos", ccsText, "");
        
        $this->lReportado = new clsField("lReportado", ccsText, "");
        
        $this->evidencia_salvedad = new clsField("evidencia_salvedad", ccsBoolean, $this->BooleanFormat);
        
        $this->observacion_salvedad = new clsField("observacion_salvedad", ccsText, "");
        

        $this->InsertFields["Id"] = array("Name" => "[Id]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Id_PPMC"] = array("Name" => "[Id_PPMC]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["ID_Estimacion"] = array("Name" => "[ID_Estimacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Incidentes"] = array("Name" => "[Incidentes]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NumIncidentes"] = array("Name" => "[NumIncidentes]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Paquetes"] = array("Name" => "[Paquetes]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NumPaquetes"] = array("Name" => "[NumPaquetes]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IncidentesRAPE"] = array("Name" => "[IncidentesRAPE]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NumIncidentesRAPE"] = array("Name" => "[NumIncidentesRAPE]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Deductiva"] = array("Name" => "[Deductiva]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["CumpleDefFug"] = array("Name" => "[CumpleDefFug]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["evidencia_salvedad"] = array("Name" => "evidencia_salvedad", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["observacion_salvedad"] = array("Name" => "observacion_salvedad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id"] = array("Name" => "[Id]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id_PPMC"] = array("Name" => "[Id_PPMC]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ID_Estimacion"] = array("Name" => "[ID_Estimacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Incidentes"] = array("Name" => "[Incidentes]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NumIncidentes"] = array("Name" => "[NumIncidentes]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Paquetes"] = array("Name" => "[Paquetes]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NumPaquetes"] = array("Name" => "[NumPaquetes]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["IncidentesRAPE"] = array("Name" => "[IncidentesRAPE]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NumIncidentesRAPE"] = array("Name" => "[NumIncidentesRAPE]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Deductiva"] = array("Name" => "[Deductiva]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumpleDefFug"] = array("Name" => "[CumpleDefFug]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["evidencia_salvedad"] = array("Name" => "evidencia_salvedad", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->UpdateFields["observacion_salvedad"] = array("Name" => "observacion_salvedad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-D6C1B08E
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

//Open Method @3-4F0B1361
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_info_rs_cr_deffug {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-3171901D
    function SetValues()
    {
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->Id_PPMC->SetDBValue(trim($this->f("Id_PPMC")));
        $this->ID_Estimacion->SetDBValue(trim($this->f("ID_Estimacion")));
        $this->Incidentes->SetDBValue($this->f("Incidentes"));
        $this->NumIncidentes->SetDBValue(trim($this->f("NumIncidentes")));
        $this->Paquetes->SetDBValue($this->f("Paquetes"));
        $this->NumPaquetes->SetDBValue(trim($this->f("NumPaquetes")));
        $this->IncidentesRAPE->SetDBValue($this->f("IncidentesRAPE"));
        $this->NumIncidentesRAPE->SetDBValue(trim($this->f("NumIncidentesRAPE")));
        $this->Deductiva->SetDBValue(trim($this->f("Deductiva")));
        $this->CumpleDefFug->SetDBValue(trim($this->f("CumpleDefFug")));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
        $this->UsuarioUltMod->SetDBValue($this->f("UsuarioUltMod"));
        $this->FechaUltMod->SetDBValue(trim($this->f("FechaUltMod")));
        $this->evidencia_salvedad->SetDBValue(trim($this->f("evidencia_salvedad")));
        $this->observacion_salvedad->SetDBValue($this->f("observacion_salvedad"));
    }
//End SetValues Method

//Insert Method @3-0AF969C8
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Id"]["Value"] = $this->Id->GetDBValue(true);
        $this->InsertFields["Id_PPMC"]["Value"] = $this->Id_PPMC->GetDBValue(true);
        $this->InsertFields["ID_Estimacion"]["Value"] = $this->ID_Estimacion->GetDBValue(true);
        $this->InsertFields["Incidentes"]["Value"] = $this->Incidentes->GetDBValue(true);
        $this->InsertFields["NumIncidentes"]["Value"] = $this->NumIncidentes->GetDBValue(true);
        $this->InsertFields["Paquetes"]["Value"] = $this->Paquetes->GetDBValue(true);
        $this->InsertFields["NumPaquetes"]["Value"] = $this->NumPaquetes->GetDBValue(true);
        $this->InsertFields["IncidentesRAPE"]["Value"] = $this->IncidentesRAPE->GetDBValue(true);
        $this->InsertFields["NumIncidentesRAPE"]["Value"] = $this->NumIncidentesRAPE->GetDBValue(true);
        $this->InsertFields["Deductiva"]["Value"] = $this->Deductiva->GetDBValue(true);
        $this->InsertFields["CumpleDefFug"]["Value"] = $this->CumpleDefFug->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->InsertFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->InsertFields["FechaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->InsertFields["evidencia_salvedad"]["Value"] = $this->evidencia_salvedad->GetDBValue(true);
        $this->InsertFields["observacion_salvedad"]["Value"] = $this->observacion_salvedad->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_info_rs_cr_deffug", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-F7DFBC6C
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["Id"] = new clsSQLParameter("ctrlId", ccsInteger, "", "", $this->Id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Id_PPMC"] = new clsSQLParameter("ctrlId_PPMC", ccsInteger, "", "", $this->Id_PPMC->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ID_Estimacion"] = new clsSQLParameter("ctrlID_Estimacion", ccsInteger, "", "", $this->ID_Estimacion->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Incidentes"] = new clsSQLParameter("ctrlIncidentes", ccsText, "", "", $this->Incidentes->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NumIncidentes"] = new clsSQLParameter("ctrlNumIncidentes", ccsInteger, "", "", $this->NumIncidentes->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Paquetes"] = new clsSQLParameter("ctrlPaquetes", ccsText, "", "", $this->Paquetes->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NumPaquetes"] = new clsSQLParameter("ctrlNumPaquetes", ccsInteger, "", "", $this->NumPaquetes->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["IncidentesRAPE"] = new clsSQLParameter("ctrlIncidentesRAPE", ccsText, "", "", $this->IncidentesRAPE->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["NumIncidentesRAPE"] = new clsSQLParameter("ctrlNumIncidentesRAPE", ccsInteger, "", "", $this->NumIncidentesRAPE->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Deductiva"] = new clsSQLParameter("ctrlDeductiva", ccsFloat, "", "", $this->Deductiva->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CumpleDefFug"] = new clsSQLParameter("ctrlCumpleDefFug", ccsInteger, "", "", $this->CumpleDefFug->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Observaciones"] = new clsSQLParameter("ctrlObservaciones", ccsText, "", "", $this->Observaciones->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UsuarioUltMod"] = new clsSQLParameter("ctrlUsuarioUltMod", ccsText, "", "", $this->UsuarioUltMod->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FechaUltMod"] = new clsSQLParameter("ctrlFechaUltMod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn"), array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"), $this->FechaUltMod->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["evidencia_salvedad"] = new clsSQLParameter("ctrlevidencia_salvedad", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), $this->BooleanFormat, $this->evidencia_salvedad->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["observacion_salvedad"] = new clsSQLParameter("ctrlobservacion_salvedad", ccsText, "", "", $this->observacion_salvedad->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlId", ccsInteger, "", "", CCGetFromGet("Id", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["Id"]->GetValue()) and !strlen($this->cp["Id"]->GetText()) and !is_bool($this->cp["Id"]->GetValue())) 
            $this->cp["Id"]->SetValue($this->Id->GetValue(true));
        if (!is_null($this->cp["Id_PPMC"]->GetValue()) and !strlen($this->cp["Id_PPMC"]->GetText()) and !is_bool($this->cp["Id_PPMC"]->GetValue())) 
            $this->cp["Id_PPMC"]->SetValue($this->Id_PPMC->GetValue(true));
        if (!is_null($this->cp["ID_Estimacion"]->GetValue()) and !strlen($this->cp["ID_Estimacion"]->GetText()) and !is_bool($this->cp["ID_Estimacion"]->GetValue())) 
            $this->cp["ID_Estimacion"]->SetValue($this->ID_Estimacion->GetValue(true));
        if (!is_null($this->cp["Incidentes"]->GetValue()) and !strlen($this->cp["Incidentes"]->GetText()) and !is_bool($this->cp["Incidentes"]->GetValue())) 
            $this->cp["Incidentes"]->SetValue($this->Incidentes->GetValue(true));
        if (!is_null($this->cp["NumIncidentes"]->GetValue()) and !strlen($this->cp["NumIncidentes"]->GetText()) and !is_bool($this->cp["NumIncidentes"]->GetValue())) 
            $this->cp["NumIncidentes"]->SetValue($this->NumIncidentes->GetValue(true));
        if (!is_null($this->cp["Paquetes"]->GetValue()) and !strlen($this->cp["Paquetes"]->GetText()) and !is_bool($this->cp["Paquetes"]->GetValue())) 
            $this->cp["Paquetes"]->SetValue($this->Paquetes->GetValue(true));
        if (!is_null($this->cp["NumPaquetes"]->GetValue()) and !strlen($this->cp["NumPaquetes"]->GetText()) and !is_bool($this->cp["NumPaquetes"]->GetValue())) 
            $this->cp["NumPaquetes"]->SetValue($this->NumPaquetes->GetValue(true));
        if (!is_null($this->cp["IncidentesRAPE"]->GetValue()) and !strlen($this->cp["IncidentesRAPE"]->GetText()) and !is_bool($this->cp["IncidentesRAPE"]->GetValue())) 
            $this->cp["IncidentesRAPE"]->SetValue($this->IncidentesRAPE->GetValue(true));
        if (!is_null($this->cp["NumIncidentesRAPE"]->GetValue()) and !strlen($this->cp["NumIncidentesRAPE"]->GetText()) and !is_bool($this->cp["NumIncidentesRAPE"]->GetValue())) 
            $this->cp["NumIncidentesRAPE"]->SetValue($this->NumIncidentesRAPE->GetValue(true));
        if (!is_null($this->cp["Deductiva"]->GetValue()) and !strlen($this->cp["Deductiva"]->GetText()) and !is_bool($this->cp["Deductiva"]->GetValue())) 
            $this->cp["Deductiva"]->SetValue($this->Deductiva->GetValue(true));
        if (!is_null($this->cp["CumpleDefFug"]->GetValue()) and !strlen($this->cp["CumpleDefFug"]->GetText()) and !is_bool($this->cp["CumpleDefFug"]->GetValue())) 
            $this->cp["CumpleDefFug"]->SetValue($this->CumpleDefFug->GetValue(true));
        if (!is_null($this->cp["Observaciones"]->GetValue()) and !strlen($this->cp["Observaciones"]->GetText()) and !is_bool($this->cp["Observaciones"]->GetValue())) 
            $this->cp["Observaciones"]->SetValue($this->Observaciones->GetValue(true));
        if (!is_null($this->cp["UsuarioUltMod"]->GetValue()) and !strlen($this->cp["UsuarioUltMod"]->GetText()) and !is_bool($this->cp["UsuarioUltMod"]->GetValue())) 
            $this->cp["UsuarioUltMod"]->SetValue($this->UsuarioUltMod->GetValue(true));
        if (!is_null($this->cp["FechaUltMod"]->GetValue()) and !strlen($this->cp["FechaUltMod"]->GetText()) and !is_bool($this->cp["FechaUltMod"]->GetValue())) 
            $this->cp["FechaUltMod"]->SetValue($this->FechaUltMod->GetValue(true));
        if (!is_null($this->cp["evidencia_salvedad"]->GetValue()) and !strlen($this->cp["evidencia_salvedad"]->GetText()) and !is_bool($this->cp["evidencia_salvedad"]->GetValue())) 
            $this->cp["evidencia_salvedad"]->SetValue($this->evidencia_salvedad->GetValue(true));
        if (!is_null($this->cp["observacion_salvedad"]->GetValue()) and !strlen($this->cp["observacion_salvedad"]->GetText()) and !is_bool($this->cp["observacion_salvedad"]->GetValue())) 
            $this->cp["observacion_salvedad"]->SetValue($this->observacion_salvedad->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "[Id]", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["Id"]["Value"] = $this->cp["Id"]->GetDBValue(true);
        $this->UpdateFields["Id_PPMC"]["Value"] = $this->cp["Id_PPMC"]->GetDBValue(true);
        $this->UpdateFields["ID_Estimacion"]["Value"] = $this->cp["ID_Estimacion"]->GetDBValue(true);
        $this->UpdateFields["Incidentes"]["Value"] = $this->cp["Incidentes"]->GetDBValue(true);
        $this->UpdateFields["NumIncidentes"]["Value"] = $this->cp["NumIncidentes"]->GetDBValue(true);
        $this->UpdateFields["Paquetes"]["Value"] = $this->cp["Paquetes"]->GetDBValue(true);
        $this->UpdateFields["NumPaquetes"]["Value"] = $this->cp["NumPaquetes"]->GetDBValue(true);
        $this->UpdateFields["IncidentesRAPE"]["Value"] = $this->cp["IncidentesRAPE"]->GetDBValue(true);
        $this->UpdateFields["NumIncidentesRAPE"]["Value"] = $this->cp["NumIncidentesRAPE"]->GetDBValue(true);
        $this->UpdateFields["Deductiva"]["Value"] = $this->cp["Deductiva"]->GetDBValue(true);
        $this->UpdateFields["CumpleDefFug"]["Value"] = $this->cp["CumpleDefFug"]->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->cp["Observaciones"]->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->cp["UsuarioUltMod"]->GetDBValue(true);
        $this->UpdateFields["FechaUltMod"]["Value"] = $this->cp["FechaUltMod"]->GetDBValue(true);
        $this->UpdateFields["evidencia_salvedad"]["Value"] = $this->cp["evidencia_salvedad"]->GetDBValue(true);
        $this->UpdateFields["observacion_salvedad"]["Value"] = $this->cp["observacion_salvedad"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_rs_cr_deffug", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End mc_info_rs_cr_deffugDataSource Class @3-FCB6E20C





class clsEditableGridIncidentesPPMC { //IncidentesPPMC Class @92-4F50592B

//Variables @92-E6B8145F

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
    public $Sorter_Id_Incidente;
    public $Sorter_ClaveMovimiento;
    public $Sorter_DescMovimiento;
    public $Sorter_FechaInicioMov;
    public $Sorter_FechaFinMov;
    public $Sorter_Paquete;
    public $Sorter_Ignorar;
    public $Sorter_Id;
//End Variables

//Class_Initialize Event @92-6AC013D1
    function clsEditableGridIncidentesPPMC($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid IncidentesPPMC/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "IncidentesPPMC";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsIncidentesPPMCDataSource($this);
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

        $this->SorterName = CCGetParam("IncidentesPPMCOrder", "");
        $this->SorterDirection = CCGetParam("IncidentesPPMCDir", "");

        $this->Sorter_Id_Incidente = new clsSorter($this->ComponentName, "Sorter_Id_Incidente", $FileName, $this);
        $this->Sorter_ClaveMovimiento = new clsSorter($this->ComponentName, "Sorter_ClaveMovimiento", $FileName, $this);
        $this->Sorter_DescMovimiento = new clsSorter($this->ComponentName, "Sorter_DescMovimiento", $FileName, $this);
        $this->Sorter_FechaInicioMov = new clsSorter($this->ComponentName, "Sorter_FechaInicioMov", $FileName, $this);
        $this->Sorter_FechaFinMov = new clsSorter($this->ComponentName, "Sorter_FechaFinMov", $FileName, $this);
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
        $this->Sorter_Ignorar = new clsSorter($this->ComponentName, "Sorter_Ignorar", $FileName, $this);
        $this->Sorter_Id = new clsSorter($this->ComponentName, "Sorter_Id", $FileName, $this);
        $this->Id_Incidente = new clsControl(ccsLabel, "Id_Incidente", "Id Incidente", ccsText, "", NULL, $this);
        $this->ClaveMovimiento = new clsControl(ccsLabel, "ClaveMovimiento", "Clave Movimiento", ccsInteger, "", NULL, $this);
        $this->DescMovimiento = new clsControl(ccsLabel, "DescMovimiento", "Desc Movimiento", ccsText, "", NULL, $this);
        $this->FechaInicioMov = new clsControl(ccsLabel, "FechaInicioMov", "Fecha Inicio Mov", ccsDate, array("ShortDate"), NULL, $this);
        $this->FechaFinMov = new clsControl(ccsLabel, "FechaFinMov", "Fecha Fin Mov", ccsDate, array("ShortDate"), NULL, $this);
        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", NULL, $this);
        $this->Ignorar = new clsControl(ccsCheckBox, "Ignorar", "Ignorar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->Ignorar->CheckedValue = true;
        $this->Ignorar->UncheckedValue = false;
        $this->Id = new clsControl(ccsHidden, "Id", "Id", ccsInteger, "", NULL, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
    }
//End Class_Initialize Event

//Initialize Method @92-5F1796A8
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["expr217"] = 'PPMC';
        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//GetFormParameters Method @92-6AB1F9C5
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["Ignorar"][$RowNumber] = CCGetFromPost("Ignorar_" . $RowNumber, NULL);
            $this->FormParameters["Id"][$RowNumber] = CCGetFromPost("Id_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @92-D71DD719
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
            $this->Id->SetText($this->FormParameters["Id"][$this->RowNumber], $this->RowNumber);
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

//ValidateRow Method @92-6B535030
    function ValidateRow()
    {
        global $CCSLocales;
        $this->Ignorar->Validate();
        $this->Id->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->Ignorar->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $this->Ignorar->Errors->Clear();
        $this->Id->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @92-CCE3D1DF
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["Ignorar"][$this->RowNumber]) && count($this->FormParameters["Ignorar"][$this->RowNumber])) || strlen($this->FormParameters["Ignorar"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["Id"][$this->RowNumber]) && count($this->FormParameters["Id"][$this->RowNumber])) || strlen($this->FormParameters["Id"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @92-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @92-909F269B
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

//UpdateGrid Method @92-0E700B31
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
            $this->Id->SetText($this->FormParameters["Id"][$this->RowNumber], $this->RowNumber);
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

//UpdateRow Method @92-792F8A87
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Id->SetValue($this->Id->GetValue(true));
        $this->DataSource->Ignorar->SetValue($this->Ignorar->GetValue(true));
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

//FormScript Method @92-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @92-69E01441
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

//GetFormState Method @92-BF9CEBD0
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

//Show Method @92-E0D876DA
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
        $this->ControlsVisible["Id_Incidente"] = $this->Id_Incidente->Visible;
        $this->ControlsVisible["ClaveMovimiento"] = $this->ClaveMovimiento->Visible;
        $this->ControlsVisible["DescMovimiento"] = $this->DescMovimiento->Visible;
        $this->ControlsVisible["FechaInicioMov"] = $this->FechaInicioMov->Visible;
        $this->ControlsVisible["FechaFinMov"] = $this->FechaFinMov->Visible;
        $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
        $this->ControlsVisible["Ignorar"] = $this->Ignorar->Visible;
        $this->ControlsVisible["Id"] = $this->Id->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->Id_Incidente->SetValue($this->DataSource->Id_Incidente->GetValue());
                    $this->ClaveMovimiento->SetValue($this->DataSource->ClaveMovimiento->GetValue());
                    $this->DescMovimiento->SetValue($this->DataSource->DescMovimiento->GetValue());
                    $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                    $this->FechaFinMov->SetValue($this->DataSource->FechaFinMov->GetValue());
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->Ignorar->SetValue($this->DataSource->Ignorar->GetValue());
                    $this->Id->SetValue($this->DataSource->Id->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->Id_Incidente->SetText("");
                    $this->ClaveMovimiento->SetText("");
                    $this->DescMovimiento->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->FechaFinMov->SetText("");
                    $this->Paquete->SetText("");
                    $this->Id_Incidente->SetValue($this->DataSource->Id_Incidente->GetValue());
                    $this->ClaveMovimiento->SetValue($this->DataSource->ClaveMovimiento->GetValue());
                    $this->DescMovimiento->SetValue($this->DataSource->DescMovimiento->GetValue());
                    $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                    $this->FechaFinMov->SetValue($this->DataSource->FechaFinMov->GetValue());
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
                    $this->Id->SetText($this->FormParameters["Id"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->Id_Incidente->SetText("");
                    $this->ClaveMovimiento->SetText("");
                    $this->DescMovimiento->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->FechaFinMov->SetText("");
                    $this->Paquete->SetText("");
                    $this->Ignorar->SetValue(false);
                    $this->Id->SetText("");
                } else {
                    $this->Id_Incidente->SetText("");
                    $this->ClaveMovimiento->SetText("");
                    $this->DescMovimiento->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->FechaFinMov->SetText("");
                    $this->Paquete->SetText("");
                    $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
                    $this->Id->SetText($this->FormParameters["Id"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id_Incidente->Show($this->RowNumber);
                $this->ClaveMovimiento->Show($this->RowNumber);
                $this->DescMovimiento->Show($this->RowNumber);
                $this->FechaInicioMov->Show($this->RowNumber);
                $this->FechaFinMov->Show($this->RowNumber);
                $this->Paquete->Show($this->RowNumber);
                $this->Ignorar->Show($this->RowNumber);
                $this->Id->Show($this->RowNumber);
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
        $this->Sorter_Id_Incidente->Show();
        $this->Sorter_ClaveMovimiento->Show();
        $this->Sorter_DescMovimiento->Show();
        $this->Sorter_FechaInicioMov->Show();
        $this->Sorter_FechaFinMov->Show();
        $this->Sorter_Paquete->Show();
        $this->Sorter_Ignorar->Show();
        $this->Sorter_Id->Show();
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

} //End IncidentesPPMC Class @92-FCB6E20C

class clsIncidentesPPMCDataSource extends clsDBcnDisenio {  //IncidentesPPMCDataSource Class @92-2772CF7B

//DataSource Variables @92-1A7E9DCB
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
    public $Id_Incidente;
    public $ClaveMovimiento;
    public $DescMovimiento;
    public $FechaInicioMov;
    public $FechaFinMov;
    public $Paquete;
    public $Ignorar;
    public $Id;
//End DataSource Variables

//DataSourceClass_Initialize Event @92-4CC13055
    function clsIncidentesPPMCDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid IncidentesPPMC/Error";
        $this->Initialize();
        $this->Id_Incidente = new clsField("Id_Incidente", ccsText, "");
        
        $this->ClaveMovimiento = new clsField("ClaveMovimiento", ccsInteger, "");
        
        $this->DescMovimiento = new clsField("DescMovimiento", ccsText, "");
        
        $this->FechaInicioMov = new clsField("FechaInicioMov", ccsDate, $this->DateFormat);
        
        $this->FechaFinMov = new clsField("FechaFinMov", ccsDate, $this->DateFormat);
        
        $this->Paquete = new clsField("Paquete", ccsText, "");
        
        $this->Ignorar = new clsField("Ignorar", ccsBoolean, $this->BooleanFormat);
        
        $this->Id = new clsField("Id", ccsInteger, "");
        

        $this->UpdateFields["Ignorar"] = array("Name" => "[Ignorar]", "Value" => "", "DataType" => ccsBoolean);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @92-B0AC5176
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Id_Incidente" => array("Id_Incidente", ""), 
            "Sorter_ClaveMovimiento" => array("ClaveMovimiento", ""), 
            "Sorter_DescMovimiento" => array("DescMovimiento", ""), 
            "Sorter_FechaInicioMov" => array("FechaInicioMov", ""), 
            "Sorter_FechaFinMov" => array("FechaFinMov", ""), 
            "Sorter_Paquete" => array("Paquete", ""), 
            "Sorter_Ignorar" => array("Ignorar", ""), 
            "Sorter_Id" => array("Id", "")));
    }
//End SetOrder Method

//Prepare Method @92-35C8286D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "expr217", ccsText, "", "", $this->Parameters["expr217"], "", false);
        $this->wp->AddParameter("2", "urlId", ccsText, "", "", $this->Parameters["urlId"], CCGetParam("Id"), false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @92-E76AA800
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT mc_info_detalle_paquetes_df.Id, IdDetalle, Id_Incidente, ClaveMovimiento, DescMovimiento, FechaInicioMov, FechaFinMov, Paquete, Ignorar \n" .
        "FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_incidente_avl ON\n" .
        "mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_incidente_avl.Id\n" .
        "WHERE Fuente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' \n" .
        "	and IdPadre = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . ") cnt";
        $this->SQL = "SELECT mc_info_detalle_paquetes_df.Id, IdDetalle, Id_Incidente, ClaveMovimiento, DescMovimiento, FechaInicioMov, FechaFinMov, Paquete, Ignorar \n" .
        "FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_incidente_avl ON\n" .
        "mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_incidente_avl.Id\n" .
        "WHERE Fuente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' \n" .
        "	and IdPadre = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "";
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

//SetValues Method @92-0BC1D875
    function SetValues()
    {
        $this->Id_Incidente->SetDBValue($this->f("Id_Incidente"));
        $this->ClaveMovimiento->SetDBValue(trim($this->f("ClaveMovimiento")));
        $this->DescMovimiento->SetDBValue($this->f("DescMovimiento"));
        $this->FechaInicioMov->SetDBValue(trim($this->f("FechaInicioMov")));
        $this->FechaFinMov->SetDBValue(trim($this->f("FechaFinMov")));
        $this->Paquete->SetDBValue($this->f("Paquete"));
        $this->Ignorar->SetDBValue(trim($this->f("Ignorar")));
        $this->Id->SetDBValue(trim($this->f("Id")));
    }
//End SetValues Method

//Update Method @92-13FC3D80
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["Ignorar"] = new clsSQLParameter("ctrlIgnorar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), $this->BooleanFormat, $this->Ignorar->GetValue(true), 0, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "ctrlId", ccsInteger, "", "", $this->Id->GetValue(true), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["Ignorar"]->GetValue()) and !strlen($this->cp["Ignorar"]->GetText()) and !is_bool($this->cp["Ignorar"]->GetValue())) 
            $this->cp["Ignorar"]->SetValue($this->Ignorar->GetValue(true));
        if (!strlen($this->cp["Ignorar"]->GetText()) and !is_bool($this->cp["Ignorar"]->GetValue(true))) 
            $this->cp["Ignorar"]->SetText(0);
        $wp->Criterion[1] = $wp->Operation(opEqual, "[Id]", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["Ignorar"]["Value"] = $this->cp["Ignorar"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_detalle_paquetes_df", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End IncidentesPPMCDataSource Class @92-FCB6E20C



class clsEditableGridmc_info_detalle_PPMC_avl { //mc_info_detalle_PPMC_avl Class @159-5C7C3CD0

//Variables @159-FD8CAF72

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
    public $Sorter_ClaveMovimiento;
    public $Sorter_Descripcion;
    public $Sorter_FechaInicioMov;
    public $Sorter_FechaFinMov;
    public $Sorter_Paquete;
    public $Sorter_c_rdl;
    public $Sorter_PAQ_CVE_FOL;
    public $Sorter_Ignorar;
//End Variables

//Class_Initialize Event @159-7C05198D
    function clsEditableGridmc_info_detalle_PPMC_avl($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid mc_info_detalle_PPMC_avl/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "mc_info_detalle_PPMC_avl";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_info_detalle_PPMC_avlDataSource($this);
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

        $this->SorterName = CCGetParam("mc_info_detalle_PPMC_avlOrder", "");
        $this->SorterDirection = CCGetParam("mc_info_detalle_PPMC_avlDir", "");

        $this->Sorter_ClaveMovimiento = new clsSorter($this->ComponentName, "Sorter_ClaveMovimiento", $FileName, $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_FechaInicioMov = new clsSorter($this->ComponentName, "Sorter_FechaInicioMov", $FileName, $this);
        $this->Sorter_FechaFinMov = new clsSorter($this->ComponentName, "Sorter_FechaFinMov", $FileName, $this);
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
        $this->Sorter_c_rdl = new clsSorter($this->ComponentName, "Sorter_c_rdl", $FileName, $this);
        $this->Sorter_PAQ_CVE_FOL = new clsSorter($this->ComponentName, "Sorter_PAQ_CVE_FOL", $FileName, $this);
        $this->Sorter_Ignorar = new clsSorter($this->ComponentName, "Sorter_Ignorar", $FileName, $this);
        $this->ClaveMovimiento = new clsControl(ccsLabel, "ClaveMovimiento", "ClaveMovimiento", ccsInteger, "", NULL, $this);
        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", NULL, $this);
        $this->FechaInicioMov = new clsControl(ccsLabel, "FechaInicioMov", "FechaInicioMov", ccsDate, array("ShortDate"), NULL, $this);
        $this->FechaFinMov = new clsControl(ccsLabel, "FechaFinMov", "FechaFinMov", ccsDate, array("ShortDate"), NULL, $this);
        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", NULL, $this);
        $this->c_rdl = new clsControl(ccsLabel, "c_rdl", "c_rdl", ccsInteger, "", NULL, $this);
        $this->PAQ_CVE_FOL = new clsControl(ccsLabel, "PAQ_CVE_FOL", "PAQ_CVE_FOL", ccsInteger, "", NULL, $this);
        $this->Ignorar = new clsControl(ccsCheckBox, "Ignorar", "Ignorar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->Ignorar->CheckedValue = true;
        $this->Ignorar->UncheckedValue = false;
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->mc_info_detalle_paquetes_df_Id = new clsControl(ccsHidden, "mc_info_detalle_paquetes_df_Id", "mc_info_detalle_paquetes_df_Id", ccsInteger, "", NULL, $this);
    }
//End Class_Initialize Event

//Initialize Method @159-854C5086
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["expr225"] = 'REQ';
        $this->DataSource->Parameters["expr226"] = CCGetParam("Id");
    }
//End Initialize Method

//GetFormParameters Method @159-7325D324
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["Ignorar"][$RowNumber] = CCGetFromPost("Ignorar_" . $RowNumber, NULL);
            $this->FormParameters["mc_info_detalle_paquetes_df_Id"][$RowNumber] = CCGetFromPost("mc_info_detalle_paquetes_df_Id_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @159-8068541E
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
            $this->mc_info_detalle_paquetes_df_Id->SetText($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber], $this->RowNumber);
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

//ValidateRow Method @159-4321856D
    function ValidateRow()
    {
        global $CCSLocales;
        $this->Ignorar->Validate();
        $this->mc_info_detalle_paquetes_df_Id->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->Ignorar->Errors->ToString());
        $errors = ComposeStrings($errors, $this->mc_info_detalle_paquetes_df_Id->Errors->ToString());
        $this->Ignorar->Errors->Clear();
        $this->mc_info_detalle_paquetes_df_Id->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @159-38FB3987
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["Ignorar"][$this->RowNumber]) && count($this->FormParameters["Ignorar"][$this->RowNumber])) || strlen($this->FormParameters["Ignorar"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber]) && count($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber])) || strlen($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @159-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @159-909F269B
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

//UpdateGrid Method @159-0C4C4CA2
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
            $this->mc_info_detalle_paquetes_df_Id->SetText($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber], $this->RowNumber);
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

//UpdateRow Method @159-DC811B1A
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->mc_info_detalle_paquetes_df_Id->SetValue($this->mc_info_detalle_paquetes_df_Id->GetValue(true));
        $this->DataSource->Ignorar->SetValue($this->Ignorar->GetValue(true));
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

//FormScript Method @159-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @159-69E01441
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

//GetFormState Method @159-BF9CEBD0
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

//Show Method @159-20ADC252
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
        $this->ControlsVisible["ClaveMovimiento"] = $this->ClaveMovimiento->Visible;
        $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
        $this->ControlsVisible["FechaInicioMov"] = $this->FechaInicioMov->Visible;
        $this->ControlsVisible["FechaFinMov"] = $this->FechaFinMov->Visible;
        $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
        $this->ControlsVisible["c_rdl"] = $this->c_rdl->Visible;
        $this->ControlsVisible["PAQ_CVE_FOL"] = $this->PAQ_CVE_FOL->Visible;
        $this->ControlsVisible["Ignorar"] = $this->Ignorar->Visible;
        $this->ControlsVisible["mc_info_detalle_paquetes_df_Id"] = $this->mc_info_detalle_paquetes_df_Id->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->ClaveMovimiento->SetValue($this->DataSource->ClaveMovimiento->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                    $this->FechaFinMov->SetValue($this->DataSource->FechaFinMov->GetValue());
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->c_rdl->SetValue($this->DataSource->c_rdl->GetValue());
                    $this->PAQ_CVE_FOL->SetValue($this->DataSource->PAQ_CVE_FOL->GetValue());
                    $this->Ignorar->SetValue($this->DataSource->Ignorar->GetValue());
                    $this->mc_info_detalle_paquetes_df_Id->SetValue($this->DataSource->mc_info_detalle_paquetes_df_Id->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->ClaveMovimiento->SetText("");
                    $this->Descripcion->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->FechaFinMov->SetText("");
                    $this->Paquete->SetText("");
                    $this->c_rdl->SetText("");
                    $this->PAQ_CVE_FOL->SetText("");
                    $this->ClaveMovimiento->SetValue($this->DataSource->ClaveMovimiento->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                    $this->FechaFinMov->SetValue($this->DataSource->FechaFinMov->GetValue());
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->c_rdl->SetValue($this->DataSource->c_rdl->GetValue());
                    $this->PAQ_CVE_FOL->SetValue($this->DataSource->PAQ_CVE_FOL->GetValue());
                    $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
                    $this->mc_info_detalle_paquetes_df_Id->SetText($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->ClaveMovimiento->SetText("");
                    $this->Descripcion->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->FechaFinMov->SetText("");
                    $this->Paquete->SetText("");
                    $this->c_rdl->SetText("");
                    $this->PAQ_CVE_FOL->SetText("");
                    $this->Ignorar->SetValue(false);
                    $this->mc_info_detalle_paquetes_df_Id->SetText("");
                } else {
                    $this->ClaveMovimiento->SetText("");
                    $this->Descripcion->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->FechaFinMov->SetText("");
                    $this->Paquete->SetText("");
                    $this->c_rdl->SetText("");
                    $this->PAQ_CVE_FOL->SetText("");
                    $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
                    $this->mc_info_detalle_paquetes_df_Id->SetText($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->ClaveMovimiento->Show($this->RowNumber);
                $this->Descripcion->Show($this->RowNumber);
                $this->FechaInicioMov->Show($this->RowNumber);
                $this->FechaFinMov->Show($this->RowNumber);
                $this->Paquete->Show($this->RowNumber);
                $this->c_rdl->Show($this->RowNumber);
                $this->PAQ_CVE_FOL->Show($this->RowNumber);
                $this->Ignorar->Show($this->RowNumber);
                $this->mc_info_detalle_paquetes_df_Id->Show($this->RowNumber);
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
        $this->Sorter_ClaveMovimiento->Show();
        $this->Sorter_Descripcion->Show();
        $this->Sorter_FechaInicioMov->Show();
        $this->Sorter_FechaFinMov->Show();
        $this->Sorter_Paquete->Show();
        $this->Sorter_c_rdl->Show();
        $this->Sorter_PAQ_CVE_FOL->Show();
        $this->Sorter_Ignorar->Show();
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

} //End mc_info_detalle_PPMC_avl Class @159-FCB6E20C

class clsmc_info_detalle_PPMC_avlDataSource extends clsDBcnDisenio {  //mc_info_detalle_PPMC_avlDataSource Class @159-7D2ACF02

//DataSource Variables @159-1A149B19
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
    public $ClaveMovimiento;
    public $Descripcion;
    public $FechaInicioMov;
    public $FechaFinMov;
    public $Paquete;
    public $c_rdl;
    public $PAQ_CVE_FOL;
    public $Ignorar;
    public $mc_info_detalle_paquetes_df_Id;
//End DataSource Variables

//DataSourceClass_Initialize Event @159-C74A4535
    function clsmc_info_detalle_PPMC_avlDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid mc_info_detalle_PPMC_avl/Error";
        $this->Initialize();
        $this->ClaveMovimiento = new clsField("ClaveMovimiento", ccsInteger, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->FechaInicioMov = new clsField("FechaInicioMov", ccsDate, $this->DateFormat);
        
        $this->FechaFinMov = new clsField("FechaFinMov", ccsDate, $this->DateFormat);
        
        $this->Paquete = new clsField("Paquete", ccsText, "");
        
        $this->c_rdl = new clsField("c_rdl", ccsInteger, "");
        
        $this->PAQ_CVE_FOL = new clsField("PAQ_CVE_FOL", ccsInteger, "");
        
        $this->Ignorar = new clsField("Ignorar", ccsBoolean, $this->BooleanFormat);
        
        $this->mc_info_detalle_paquetes_df_Id = new clsField("mc_info_detalle_paquetes_df_Id", ccsInteger, "");
        

        $this->UpdateFields["Ignorar"] = array("Name" => "[Ignorar]", "Value" => "", "DataType" => ccsBoolean);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @159-4684E114
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_ClaveMovimiento" => array("ClaveMovimiento", ""), 
            "Sorter_Descripcion" => array("Descripcion", ""), 
            "Sorter_FechaInicioMov" => array("FechaInicioMov", ""), 
            "Sorter_FechaFinMov" => array("FechaFinMov", ""), 
            "Sorter_Paquete" => array("Paquete", ""), 
            "Sorter_c_rdl" => array("c_rdl", ""), 
            "Sorter_PAQ_CVE_FOL" => array("PAQ_CVE_FOL", ""), 
            "Sorter_Ignorar" => array("Ignorar", "")));
    }
//End SetOrder Method

//Prepare Method @159-E7CED768
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "expr225", ccsText, "", "", $this->Parameters["expr225"], "", false);
        $this->wp->AddParameter("2", "expr226", ccsText, "", "", $this->Parameters["expr226"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @159-B0EE6762
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT mc_info_detalle_paquetes_df.Id AS mc_info_detalle_paquetes_df_Id, Ignorar, Paquete, mc_detalle_PPMC_Monitor_avl.Id AS mc_detalle_PPMC_Monitor_avl_Id,\n" .
        "ClaveMovimiento, FechaInicioMov, FechaFinMov, Descripcion, c_rdl, PAQ_CVE_FOL \n" .
        "FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_PPMC_Monitor_avl ON\n" .
        "mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_PPMC_Monitor_avl.Id\n" .
        "WHERE Fuente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'  and mc_info_detalle_paquetes_df.IdPadre = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . ") cnt";
        $this->SQL = "SELECT mc_info_detalle_paquetes_df.Id AS mc_info_detalle_paquetes_df_Id, Ignorar, Paquete, mc_detalle_PPMC_Monitor_avl.Id AS mc_detalle_PPMC_Monitor_avl_Id,\n" .
        "ClaveMovimiento, FechaInicioMov, FechaFinMov, Descripcion, c_rdl, PAQ_CVE_FOL \n" .
        "FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_PPMC_Monitor_avl ON\n" .
        "mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_PPMC_Monitor_avl.Id\n" .
        "WHERE Fuente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'  and mc_info_detalle_paquetes_df.IdPadre = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "";
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

//SetValues Method @159-576FD11B
    function SetValues()
    {
        $this->ClaveMovimiento->SetDBValue(trim($this->f("ClaveMovimiento")));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->FechaInicioMov->SetDBValue(trim($this->f("FechaInicioMov")));
        $this->FechaFinMov->SetDBValue(trim($this->f("FechaFinMov")));
        $this->Paquete->SetDBValue($this->f("Paquete"));
        $this->c_rdl->SetDBValue(trim($this->f("c_rdl")));
        $this->PAQ_CVE_FOL->SetDBValue(trim($this->f("PAQ_CVE_FOL")));
        $this->Ignorar->SetDBValue(trim($this->f("Ignorar")));
        $this->mc_info_detalle_paquetes_df_Id->SetDBValue(trim($this->f("mc_info_detalle_paquetes_df_Id")));
    }
//End SetValues Method

//Update Method @159-0CC0A3A4
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["Ignorar"] = new clsSQLParameter("ctrlIgnorar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), $this->BooleanFormat, $this->Ignorar->GetValue(true), 0, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "ctrlmc_info_detalle_paquetes_df_Id", ccsInteger, "", "", $this->mc_info_detalle_paquetes_df_Id->GetValue(true), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["Ignorar"]->GetValue()) and !strlen($this->cp["Ignorar"]->GetText()) and !is_bool($this->cp["Ignorar"]->GetValue())) 
            $this->cp["Ignorar"]->SetValue($this->Ignorar->GetValue(true));
        if (!strlen($this->cp["Ignorar"]->GetText()) and !is_bool($this->cp["Ignorar"]->GetValue(true))) 
            $this->cp["Ignorar"]->SetText(0);
        $wp->Criterion[1] = $wp->Operation(opEqual, "[Id]", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["Ignorar"]["Value"] = $this->cp["Ignorar"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_detalle_paquetes_df", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End mc_info_detalle_PPMC_avlDataSource Class @159-FCB6E20C

class clsEditableGridEditableGrid1 { //EditableGrid1 Class @188-6C37505C

//Variables @188-2D0B3750

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
    public $Sorter_Id_Incidente;
    public $Sorter_ClaveMovimiento;
    public $Sorter_DescMovimiento;
    public $Sorter_FechaInicioMov;
    public $Sorter_FechaFinMov;
    public $Sorter_Paquete;
    public $Sorter_Ignorar;
//End Variables

//Class_Initialize Event @188-C5DC955B
    function clsEditableGridEditableGrid1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid EditableGrid1/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "EditableGrid1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsEditableGrid1DataSource($this);
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

        $this->SorterName = CCGetParam("EditableGrid1Order", "");
        $this->SorterDirection = CCGetParam("EditableGrid1Dir", "");

        $this->Sorter_Id_Incidente = new clsSorter($this->ComponentName, "Sorter_Id_Incidente", $FileName, $this);
        $this->Sorter_ClaveMovimiento = new clsSorter($this->ComponentName, "Sorter_ClaveMovimiento", $FileName, $this);
        $this->Sorter_DescMovimiento = new clsSorter($this->ComponentName, "Sorter_DescMovimiento", $FileName, $this);
        $this->Sorter_FechaInicioMov = new clsSorter($this->ComponentName, "Sorter_FechaInicioMov", $FileName, $this);
        $this->Sorter_FechaFinMov = new clsSorter($this->ComponentName, "Sorter_FechaFinMov", $FileName, $this);
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
        $this->Sorter_Ignorar = new clsSorter($this->ComponentName, "Sorter_Ignorar", $FileName, $this);
        $this->Id_Incidente = new clsControl(ccsLabel, "Id_Incidente", "Id_Incidente", ccsText, "", NULL, $this);
        $this->ClaveMovimiento = new clsControl(ccsLabel, "ClaveMovimiento", "ClaveMovimiento", ccsInteger, "", NULL, $this);
        $this->DescMovimiento = new clsControl(ccsLabel, "DescMovimiento", "DescMovimiento", ccsText, "", NULL, $this);
        $this->FechaInicioMov = new clsControl(ccsLabel, "FechaInicioMov", "FechaInicioMov", ccsDate, array("ShortDate"), NULL, $this);
        $this->FechaFinMov = new clsControl(ccsLabel, "FechaFinMov", "FechaFinMov", ccsDate, array("ShortDate"), NULL, $this);
        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", NULL, $this);
        $this->Ignorar = new clsControl(ccsCheckBox, "Ignorar", "Ignorar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->Ignorar->CheckedValue = true;
        $this->Ignorar->UncheckedValue = false;
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->mc_info_detalle_paquetes_df_Id = new clsControl(ccsHidden, "mc_info_detalle_paquetes_df_Id", "mc_info_detalle_paquetes_df_Id", ccsText, "", NULL, $this);
    }
//End Class_Initialize Event

//Initialize Method @188-85EB4D05
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["expr227"] = 'RAPE';
        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//GetFormParameters Method @188-7325D324
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["Ignorar"][$RowNumber] = CCGetFromPost("Ignorar_" . $RowNumber, NULL);
            $this->FormParameters["mc_info_detalle_paquetes_df_Id"][$RowNumber] = CCGetFromPost("mc_info_detalle_paquetes_df_Id_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @188-8068541E
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
            $this->mc_info_detalle_paquetes_df_Id->SetText($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber], $this->RowNumber);
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

//ValidateRow Method @188-4321856D
    function ValidateRow()
    {
        global $CCSLocales;
        $this->Ignorar->Validate();
        $this->mc_info_detalle_paquetes_df_Id->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->Ignorar->Errors->ToString());
        $errors = ComposeStrings($errors, $this->mc_info_detalle_paquetes_df_Id->Errors->ToString());
        $this->Ignorar->Errors->Clear();
        $this->mc_info_detalle_paquetes_df_Id->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @188-38FB3987
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["Ignorar"][$this->RowNumber]) && count($this->FormParameters["Ignorar"][$this->RowNumber])) || strlen($this->FormParameters["Ignorar"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber]) && count($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber])) || strlen($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @188-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @188-909F269B
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

//UpdateGrid Method @188-0C4C4CA2
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
            $this->mc_info_detalle_paquetes_df_Id->SetText($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber], $this->RowNumber);
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

//UpdateRow Method @188-DC811B1A
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->mc_info_detalle_paquetes_df_Id->SetValue($this->mc_info_detalle_paquetes_df_Id->GetValue(true));
        $this->DataSource->Ignorar->SetValue($this->Ignorar->GetValue(true));
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

//FormScript Method @188-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @188-69E01441
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

//GetFormState Method @188-BF9CEBD0
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

//Show Method @188-919200A5
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
        $this->ControlsVisible["Id_Incidente"] = $this->Id_Incidente->Visible;
        $this->ControlsVisible["ClaveMovimiento"] = $this->ClaveMovimiento->Visible;
        $this->ControlsVisible["DescMovimiento"] = $this->DescMovimiento->Visible;
        $this->ControlsVisible["FechaInicioMov"] = $this->FechaInicioMov->Visible;
        $this->ControlsVisible["FechaFinMov"] = $this->FechaFinMov->Visible;
        $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
        $this->ControlsVisible["Ignorar"] = $this->Ignorar->Visible;
        $this->ControlsVisible["mc_info_detalle_paquetes_df_Id"] = $this->mc_info_detalle_paquetes_df_Id->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->Id_Incidente->SetValue($this->DataSource->Id_Incidente->GetValue());
                    $this->ClaveMovimiento->SetValue($this->DataSource->ClaveMovimiento->GetValue());
                    $this->DescMovimiento->SetValue($this->DataSource->DescMovimiento->GetValue());
                    $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                    $this->FechaFinMov->SetValue($this->DataSource->FechaFinMov->GetValue());
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->Ignorar->SetValue($this->DataSource->Ignorar->GetValue());
                    $this->mc_info_detalle_paquetes_df_Id->SetValue($this->DataSource->mc_info_detalle_paquetes_df_Id->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->Id_Incidente->SetText("");
                    $this->ClaveMovimiento->SetText("");
                    $this->DescMovimiento->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->FechaFinMov->SetText("");
                    $this->Paquete->SetText("");
                    $this->Id_Incidente->SetValue($this->DataSource->Id_Incidente->GetValue());
                    $this->ClaveMovimiento->SetValue($this->DataSource->ClaveMovimiento->GetValue());
                    $this->DescMovimiento->SetValue($this->DataSource->DescMovimiento->GetValue());
                    $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                    $this->FechaFinMov->SetValue($this->DataSource->FechaFinMov->GetValue());
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
                    $this->mc_info_detalle_paquetes_df_Id->SetText($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->Id_Incidente->SetText("");
                    $this->ClaveMovimiento->SetText("");
                    $this->DescMovimiento->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->FechaFinMov->SetText("");
                    $this->Paquete->SetText("");
                    $this->Ignorar->SetValue(false);
                    $this->mc_info_detalle_paquetes_df_Id->SetText("");
                } else {
                    $this->Id_Incidente->SetText("");
                    $this->ClaveMovimiento->SetText("");
                    $this->DescMovimiento->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->FechaFinMov->SetText("");
                    $this->Paquete->SetText("");
                    $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
                    $this->mc_info_detalle_paquetes_df_Id->SetText($this->FormParameters["mc_info_detalle_paquetes_df_Id"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id_Incidente->Show($this->RowNumber);
                $this->ClaveMovimiento->Show($this->RowNumber);
                $this->DescMovimiento->Show($this->RowNumber);
                $this->FechaInicioMov->Show($this->RowNumber);
                $this->FechaFinMov->Show($this->RowNumber);
                $this->Paquete->Show($this->RowNumber);
                $this->Ignorar->Show($this->RowNumber);
                $this->mc_info_detalle_paquetes_df_Id->Show($this->RowNumber);
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
        $this->Sorter_Id_Incidente->Show();
        $this->Sorter_ClaveMovimiento->Show();
        $this->Sorter_DescMovimiento->Show();
        $this->Sorter_FechaInicioMov->Show();
        $this->Sorter_FechaFinMov->Show();
        $this->Sorter_Paquete->Show();
        $this->Sorter_Ignorar->Show();
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

} //End EditableGrid1 Class @188-FCB6E20C

class clsEditableGrid1DataSource extends clsDBcnDisenio {  //EditableGrid1DataSource Class @188-B35CAD29

//DataSource Variables @188-D1FA7708
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
    public $Id_Incidente;
    public $ClaveMovimiento;
    public $DescMovimiento;
    public $FechaInicioMov;
    public $FechaFinMov;
    public $Paquete;
    public $Ignorar;
    public $mc_info_detalle_paquetes_df_Id;
//End DataSource Variables

//DataSourceClass_Initialize Event @188-B30C368D
    function clsEditableGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid EditableGrid1/Error";
        $this->Initialize();
        $this->Id_Incidente = new clsField("Id_Incidente", ccsText, "");
        
        $this->ClaveMovimiento = new clsField("ClaveMovimiento", ccsInteger, "");
        
        $this->DescMovimiento = new clsField("DescMovimiento", ccsText, "");
        
        $this->FechaInicioMov = new clsField("FechaInicioMov", ccsDate, $this->DateFormat);
        
        $this->FechaFinMov = new clsField("FechaFinMov", ccsDate, $this->DateFormat);
        
        $this->Paquete = new clsField("Paquete", ccsText, "");
        
        $this->Ignorar = new clsField("Ignorar", ccsBoolean, $this->BooleanFormat);
        
        $this->mc_info_detalle_paquetes_df_Id = new clsField("mc_info_detalle_paquetes_df_Id", ccsText, "");
        

        $this->UpdateFields["Ignorar"] = array("Name" => "[Ignorar]", "Value" => "", "DataType" => ccsBoolean);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @188-CBFD4F6E
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Id_Incidente" => array("Id_Incidente", ""), 
            "Sorter_ClaveMovimiento" => array("ClaveMovimiento", ""), 
            "Sorter_DescMovimiento" => array("DescMovimiento", ""), 
            "Sorter_FechaInicioMov" => array("FechaInicioMov", ""), 
            "Sorter_FechaFinMov" => array("FechaFinMov", ""), 
            "Sorter_Paquete" => array("Paquete", ""), 
            "Sorter_Ignorar" => array("Ignorar", "")));
    }
//End SetOrder Method

//Prepare Method @188-6869CDA4
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "expr227", ccsText, "", "", $this->Parameters["expr227"], "", false);
        $this->wp->AddParameter("2", "urlId", ccsText, "", "", $this->Parameters["urlId"], CCGetParam("Id"), false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @188-43E3DB7E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT mc_info_detalle_paquetes_df.Id AS mc_info_detalle_paquetes_df_Id, Ignorar, Id_Incidente, ClaveMovimiento, DescMovimiento, FechaInicioMov,\n" .
        "FechaFinMov, Paquete \n" .
        "FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_incidente_avl ON\n" .
        "mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_incidente_avl.Id\n" .
        "WHERE Fuente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' \n" .
        "	and mc_info_detalle_paquetes_df.IdPadre= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . ") cnt";
        $this->SQL = "SELECT mc_info_detalle_paquetes_df.Id AS mc_info_detalle_paquetes_df_Id, Ignorar, Id_Incidente, ClaveMovimiento, DescMovimiento, FechaInicioMov,\n" .
        "FechaFinMov, Paquete \n" .
        "FROM mc_info_detalle_paquetes_df INNER JOIN mc_detalle_incidente_avl ON\n" .
        "mc_info_detalle_paquetes_df.IdDetalle = mc_detalle_incidente_avl.Id\n" .
        "WHERE Fuente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' \n" .
        "	and mc_info_detalle_paquetes_df.IdPadre= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "";
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

//SetValues Method @188-17CA602E
    function SetValues()
    {
        $this->Id_Incidente->SetDBValue($this->f("Id_Incidente"));
        $this->ClaveMovimiento->SetDBValue(trim($this->f("ClaveMovimiento")));
        $this->DescMovimiento->SetDBValue($this->f("DescMovimiento"));
        $this->FechaInicioMov->SetDBValue(trim($this->f("FechaInicioMov")));
        $this->FechaFinMov->SetDBValue(trim($this->f("FechaFinMov")));
        $this->Paquete->SetDBValue($this->f("Paquete"));
        $this->Ignorar->SetDBValue(trim($this->f("Ignorar")));
        $this->mc_info_detalle_paquetes_df_Id->SetDBValue($this->f("mc_info_detalle_paquetes_df_Id"));
    }
//End SetValues Method

//Update Method @188-AD73746E
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["Ignorar"] = new clsSQLParameter("ctrlIgnorar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), $this->BooleanFormat, $this->Ignorar->GetValue(true), "", false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "ctrlmc_info_detalle_paquetes_df_Id", ccsInteger, "", "", $this->mc_info_detalle_paquetes_df_Id->GetValue(true), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["Ignorar"]->GetValue()) and !strlen($this->cp["Ignorar"]->GetText()) and !is_bool($this->cp["Ignorar"]->GetValue())) 
            $this->cp["Ignorar"]->SetValue($this->Ignorar->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "[Id]", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["Ignorar"]["Value"] = $this->cp["Ignorar"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_detalle_paquetes_df", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End EditableGrid1DataSource Class @188-FCB6E20C



//Initialize Page @1-332A2EE9
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
$TemplateFileName = "PPMCsDefFugDetalle.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/ui/jquery.ui.core.js|js/jquery/ui/jquery.ui.widget.js|js/jquery/ui/jquery.ui.datepicker.js|js/jquery/datepicker/ccs-date-timepicker.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-4B0BB954
CCSecurityRedirect("3", "");
//End Authenticate User

//Include events file @1-5F6FFEE3
include_once("./PPMCsDefFugDetalle_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-EA232898
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$lDocs = new clsControl(ccsLabel, "lDocs", "lDocs", ccsText, "", CCGetRequestParam("lDocs", ccsGet, NULL), $MainPage);
$lDocs->HTML = true;
$lkAnterior = new clsControl(ccsLink, "lkAnterior", "lkAnterior", ccsText, "", CCGetRequestParam("lkAnterior", ccsGet, NULL), $MainPage);
$lkAnterior->Page = "PPMCsDefFugDetalle.php";
$lkSiguiente = new clsControl(ccsLink, "lkSiguiente", "lkSiguiente", ccsText, "", CCGetRequestParam("lkSiguiente", ccsGet, NULL), $MainPage);
$lkSiguiente->Page = "PPMCsDefFugDetalle.php";
$mc_info_rs_cr_deffug = new clsRecordmc_info_rs_cr_deffug("", $MainPage);
$IncidentesPPMC = new clsEditableGridIncidentesPPMC("", $MainPage);
$mc_info_detalle_PPMC_avl = new clsEditableGridmc_info_detalle_PPMC_avl("", $MainPage);
$EditableGrid1 = new clsEditableGridEditableGrid1("", $MainPage);
$lkReqFun = new clsControl(ccsLink, "lkReqFun", "lkReqFun", ccsText, "", CCGetRequestParam("lkReqFun", ccsGet, NULL), $MainPage);
$lkReqFun->Page = "PPMCsCumpReqFunDetalle.php";
$lkCalidad = new clsControl(ccsLink, "lkCalidad", "lkCalidad", ccsText, "", CCGetRequestParam("lkCalidad", ccsGet, NULL), $MainPage);
$lkCalidad->Parameters = CCAddParam($lkCalidad->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkCalidad->Page = "PPMCsCrbCalidad.php";
$lkRetEnt_Calidad = new clsControl(ccsLink, "lkRetEnt_Calidad", "lkRetEnt_Calidad", ccsText, "", CCGetRequestParam("lkRetEnt_Calidad", ccsGet, NULL), $MainPage);
$lkRetEnt_Calidad->Parameters = CCAddParam($lkRetEnt_Calidad->Parameters, "sID", CCGetFromGet("Id", NULL));
$lkRetEnt_Calidad->Page = "PPMCsCrbDetalle.php";
$lkCalidadCod = new clsControl(ccsLink, "lkCalidadCod", "lkCalidadCod", ccsText, "", CCGetRequestParam("lkCalidadCod", ccsGet, NULL), $MainPage);
$lkCalidadCod->Parameters = CCAddParam($lkCalidadCod->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkCalidadCod->Page = "PPMCsCrCalCodDetalle.php";
$Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCAddParam($Link1->Parameters, "Id", CCGetFromGet("Id", NULL));
$Link1->Page = "PPMCsDefFugDetalle.php";
$MainPage->Header = & $Header;
$MainPage->lDocs = & $lDocs;
$MainPage->lkAnterior = & $lkAnterior;
$MainPage->lkSiguiente = & $lkSiguiente;
$MainPage->mc_info_rs_cr_deffug = & $mc_info_rs_cr_deffug;
$MainPage->IncidentesPPMC = & $IncidentesPPMC;
$MainPage->mc_info_detalle_PPMC_avl = & $mc_info_detalle_PPMC_avl;
$MainPage->EditableGrid1 = & $EditableGrid1;
$MainPage->lkReqFun = & $lkReqFun;
$MainPage->lkCalidad = & $lkCalidad;
$MainPage->lkRetEnt_Calidad = & $lkRetEnt_Calidad;
$MainPage->lkCalidadCod = & $lkCalidadCod;
$MainPage->Link1 = & $Link1;
$lkReqFun->Parameters = "";
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "src", 1);
$mc_info_rs_cr_deffug->Initialize();
$IncidentesPPMC->Initialize();
$mc_info_detalle_PPMC_avl->Initialize();
$EditableGrid1->Initialize();
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

//Execute Components @1-28EA1E8C
$EditableGrid1->Operation();
$mc_info_detalle_PPMC_avl->Operation();
$IncidentesPPMC->Operation();
$mc_info_rs_cr_deffug->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-E3944041
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_info_rs_cr_deffug);
    unset($IncidentesPPMC);
    unset($mc_info_detalle_PPMC_avl);
    unset($EditableGrid1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-C61A815E
$Header->Show();
$mc_info_rs_cr_deffug->Show();
$IncidentesPPMC->Show();
$mc_info_detalle_PPMC_avl->Show();
$EditableGrid1->Show();
$lDocs->Show();
$lkAnterior->Show();
$lkSiguiente->Show();
$lkReqFun->Show();
$lkCalidad->Show();
$lkRetEnt_Calidad->Show();
$lkCalidadCod->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-AD5F80E4
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_info_rs_cr_deffug);
unset($IncidentesPPMC);
unset($mc_info_detalle_PPMC_avl);
unset($EditableGrid1);
unset($Tpl);
//End Unload Page


?>
