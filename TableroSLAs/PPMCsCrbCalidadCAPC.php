<?php
//Include Common Files @1-58A31602
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsCrbCalidadCAPC.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordmc_info_rs_cr_calidad_capc { //mc_info_rs_cr_calidad_capc Class @81-EC28A6A6

//Variables @81-9E315808

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

//Class_Initialize Event @81-5F8B132C
    function clsRecordmc_info_rs_cr_calidad_capc($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_rs_cr_calidad_capc/Error";
        $this->DataSource = new clsmc_info_rs_cr_calidad_capcDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_rs_cr_calidad_capc";
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
            $this->id_ppmc = new clsControl(ccsHidden, "id_ppmc", "Id Ppmc", ccsInteger, "", CCGetRequestParam("id_ppmc", $Method, NULL), $this);
            $this->id_ppmc->Required = true;
            $this->id_estimacion = new clsControl(ccsHidden, "id_estimacion", "Id Estimacion", ccsInteger, "", CCGetRequestParam("id_estimacion", $Method, NULL), $this);
            $this->id_estimacion->Required = true;
            $this->IndiceCalidadDoc = new clsControl(ccsTextBox, "IndiceCalidadDoc", "Indice Calidad Doc", ccsFloat, "", CCGetRequestParam("IndiceCalidadDoc", $Method, NULL), $this);
            $this->DeductivaDoc = new clsControl(ccsTextBox, "DeductivaDoc", "Deductiva Doc", ccsFloat, "", CCGetRequestParam("DeductivaDoc", $Method, NULL), $this);
            $this->CumpleCalidad = new clsControl(ccsListBox, "CumpleCalidad", "Cumple Calidad", ccsInteger, "", CCGetRequestParam("CumpleCalidad", $Method, NULL), $this);
            $this->CumpleCalidad->DSType = dsListOfValues;
            $this->CumpleCalidad->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsText, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->UsuarioUltMod = new clsControl(ccsHidden, "UsuarioUltMod", "Usuario Ult Mod", ccsText, "", CCGetRequestParam("UsuarioUltMod", $Method, NULL), $this);
            $this->FechaUltMod = new clsControl(ccsHidden, "FechaUltMod", "Fcha Ult Mod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn"), CCGetRequestParam("FechaUltMod", $Method, NULL), $this);
            $this->sNombreProyecto = new clsControl(ccsLabel, "sNombreProyecto", "sNombreProyecto", ccsText, "", CCGetRequestParam("sNombreProyecto", $Method, NULL), $this);
            $this->lbIdEstimacion = new clsControl(ccsLabel, "lbIdEstimacion", "lbIdEstimacion", ccsText, "", CCGetRequestParam("lbIdEstimacion", $Method, NULL), $this);
            $this->hdId = new clsControl(ccsHidden, "hdId", "hdId", ccsText, "", CCGetRequestParam("hdId", $Method, NULL), $this);
            $this->lsServNegocio = new clsControl(ccsHidden, "lsServNegocio", "Servicio de Negocio", ccsText, "", CCGetRequestParam("lsServNegocio", $Method, NULL), $this);
            $this->lsServNegocio->Required = true;
            $this->lsServContractual = new clsControl(ccsHidden, "lsServContractual", "Servicio Contractual", ccsText, "", CCGetRequestParam("lsServContractual", $Method, NULL), $this);
            $this->lsServContractual->Required = true;
            $this->btnCalcula = new clsButton("btnCalcula", $Method, $this);
            $this->lbIdPPMC = new clsControl(ccsLabel, "lbIdPPMC", "lbIdPPMC", ccsText, "", CCGetRequestParam("lbIdPPMC", $Method, NULL), $this);
            $this->DeductivaTot = new clsControl(ccsTextBox, "DeductivaTot", "Deductiva Tot", ccsFloat, "", CCGetRequestParam("DeductivaTot", $Method, NULL), $this);
            $this->lbServNegocio = new clsControl(ccsLabel, "lbServNegocio", "lbServNegocio", ccsText, "", CCGetRequestParam("lbServNegocio", $Method, NULL), $this);
            $this->lbServContractual = new clsControl(ccsLabel, "lbServContractual", "lbServContractual", ccsText, "", CCGetRequestParam("lbServContractual", $Method, NULL), $this);
            $this->lReportado = new clsControl(ccsLabel, "lReportado", "lReportado", ccsText, "", CCGetRequestParam("lReportado", $Method, NULL), $this);
            $this->hallazgo_errores_ort = new clsControl(ccsTextBox, "hallazgo_errores_ort", "hallazgo_errores_ort", ccsInteger, "", CCGetRequestParam("hallazgo_errores_ort", $Method, NULL), $this);
            $this->hallazgo_formato_incorrecto = new clsControl(ccsTextBox, "hallazgo_formato_incorrecto", "hallazgo_formato_incorrecto", ccsInteger, "", CCGetRequestParam("hallazgo_formato_incorrecto", $Method, NULL), $this);
            $this->hallazgo_falta_vinculo = new clsControl(ccsTextBox, "hallazgo_falta_vinculo", "hallazgo_falta_vinculo", ccsInteger, "", CCGetRequestParam("hallazgo_falta_vinculo", $Method, NULL), $this);
            $this->sTipoRequerimiento = new clsControl(ccsLabel, "sTipoRequerimiento", "sTipoRequerimiento", ccsText, "", CCGetRequestParam("sTipoRequerimiento", $Method, NULL), $this);
            $this->hallazgo_doc_incorrecta = new clsControl(ccsTextBox, "hallazgo_doc_incorrecta", "hallazgo_doc_incorrecta", ccsInteger, "", CCGetRequestParam("hallazgo_doc_incorrecta", $Method, NULL), $this);
            $this->hallazgo_incumpl_acept = new clsControl(ccsTextBox, "hallazgo_incumpl_acept", "hallazgo_incumpl_acept", ccsInteger, "", CCGetRequestParam("hallazgo_incumpl_acept", $Method, NULL), $this);
            $this->defectos_errores_ort = new clsControl(ccsTextBox, "defectos_errores_ort", "defectos_errores_ort", ccsInteger, "", CCGetRequestParam("defectos_errores_ort", $Method, NULL), $this);
            $this->defectos_formato_incorrecto = new clsControl(ccsTextBox, "defectos_formato_incorrecto", "defectos_formato_incorrecto", ccsText, "", CCGetRequestParam("defectos_formato_incorrecto", $Method, NULL), $this);
            $this->defectos_falta_vinculo = new clsControl(ccsTextBox, "defectos_falta_vinculo", "defectos_falta_vinculo", ccsInteger, "", CCGetRequestParam("defectos_falta_vinculo", $Method, NULL), $this);
            $this->defectos_incumpl_acept = new clsControl(ccsTextBox, "defectos_incumpl_acept", "defectos_incumpl_acept", ccsInteger, "", CCGetRequestParam("defectos_incumpl_acept", $Method, NULL), $this);
            $this->defectos_doc_incorrecta = new clsControl(ccsTextBox, "defectos_doc_incorrecta", "defectos_doc_incorrecta", ccsInteger, "", CCGetRequestParam("defectos_doc_incorrecta", $Method, NULL), $this);
            $this->btnCalculaUpdate = new clsButton("btnCalculaUpdate", $Method, $this);
            $this->evidencia_salvedad = new clsControl(ccsCheckBox, "evidencia_salvedad", "evidencia_salvedad", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("evidencia_salvedad", $Method, NULL), $this);
            $this->evidencia_salvedad->CheckedValue = true;
            $this->evidencia_salvedad->UncheckedValue = false;
            $this->observacion_salvedad = new clsControl(ccsTextArea, "observacion_salvedad", "observacion_salvedad", ccsText, "", CCGetRequestParam("observacion_salvedad", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->IndiceCalidadDoc->Value) && !strlen($this->IndiceCalidadDoc->Value) && $this->IndiceCalidadDoc->Value !== false)
                    $this->IndiceCalidadDoc->SetText(0);
                if(!is_array($this->DeductivaDoc->Value) && !strlen($this->DeductivaDoc->Value) && $this->DeductivaDoc->Value !== false)
                    $this->DeductivaDoc->SetText(0);
                if(!is_array($this->UsuarioUltMod->Value) && !strlen($this->UsuarioUltMod->Value) && $this->UsuarioUltMod->Value !== false)
                    $this->UsuarioUltMod->SetText(CCGetUserLogin());
                if(!is_array($this->FechaUltMod->Value) && !strlen($this->FechaUltMod->Value) && $this->FechaUltMod->Value !== false)
                    $this->FechaUltMod->SetText(date("Y-m-d H:i"));
                if(!is_array($this->hdId->Value) && !strlen($this->hdId->Value) && $this->hdId->Value !== false)
                    $this->hdId->SetText(CCGetParam("Id"));
                if(!is_array($this->evidencia_salvedad->Value) && !strlen($this->evidencia_salvedad->Value) && $this->evidencia_salvedad->Value !== false)
                    $this->evidencia_salvedad->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @81-4F76030F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//Validate Method @81-87CC07B6
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->id_ppmc->Validate() && $Validation);
        $Validation = ($this->id_estimacion->Validate() && $Validation);
        $Validation = ($this->IndiceCalidadDoc->Validate() && $Validation);
        $Validation = ($this->DeductivaDoc->Validate() && $Validation);
        $Validation = ($this->CumpleCalidad->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->UsuarioUltMod->Validate() && $Validation);
        $Validation = ($this->FechaUltMod->Validate() && $Validation);
        $Validation = ($this->hdId->Validate() && $Validation);
        $Validation = ($this->lsServNegocio->Validate() && $Validation);
        $Validation = ($this->lsServContractual->Validate() && $Validation);
        $Validation = ($this->DeductivaTot->Validate() && $Validation);
        $Validation = ($this->hallazgo_errores_ort->Validate() && $Validation);
        $Validation = ($this->hallazgo_formato_incorrecto->Validate() && $Validation);
        $Validation = ($this->hallazgo_falta_vinculo->Validate() && $Validation);
        $Validation = ($this->hallazgo_doc_incorrecta->Validate() && $Validation);
        $Validation = ($this->hallazgo_incumpl_acept->Validate() && $Validation);
        $Validation = ($this->defectos_errores_ort->Validate() && $Validation);
        $Validation = ($this->defectos_formato_incorrecto->Validate() && $Validation);
        $Validation = ($this->defectos_falta_vinculo->Validate() && $Validation);
        $Validation = ($this->defectos_incumpl_acept->Validate() && $Validation);
        $Validation = ($this->defectos_doc_incorrecta->Validate() && $Validation);
        $Validation = ($this->evidencia_salvedad->Validate() && $Validation);
        $Validation = ($this->observacion_salvedad->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->id_ppmc->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_estimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IndiceCalidadDoc->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeductivaDoc->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumpleCalidad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsuarioUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdId->Errors->Count() == 0);
        $Validation =  $Validation && ($this->lsServNegocio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->lsServContractual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeductivaTot->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hallazgo_errores_ort->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hallazgo_formato_incorrecto->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hallazgo_falta_vinculo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hallazgo_doc_incorrecta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hallazgo_incumpl_acept->Errors->Count() == 0);
        $Validation =  $Validation && ($this->defectos_errores_ort->Errors->Count() == 0);
        $Validation =  $Validation && ($this->defectos_formato_incorrecto->Errors->Count() == 0);
        $Validation =  $Validation && ($this->defectos_falta_vinculo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->defectos_incumpl_acept->Errors->Count() == 0);
        $Validation =  $Validation && ($this->defectos_doc_incorrecta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->evidencia_salvedad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->observacion_salvedad->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @81-EAE22147
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_ppmc->Errors->Count());
        $errors = ($errors || $this->id_estimacion->Errors->Count());
        $errors = ($errors || $this->IndiceCalidadDoc->Errors->Count());
        $errors = ($errors || $this->DeductivaDoc->Errors->Count());
        $errors = ($errors || $this->CumpleCalidad->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->UsuarioUltMod->Errors->Count());
        $errors = ($errors || $this->FechaUltMod->Errors->Count());
        $errors = ($errors || $this->sNombreProyecto->Errors->Count());
        $errors = ($errors || $this->lbIdEstimacion->Errors->Count());
        $errors = ($errors || $this->hdId->Errors->Count());
        $errors = ($errors || $this->lsServNegocio->Errors->Count());
        $errors = ($errors || $this->lsServContractual->Errors->Count());
        $errors = ($errors || $this->lbIdPPMC->Errors->Count());
        $errors = ($errors || $this->DeductivaTot->Errors->Count());
        $errors = ($errors || $this->lbServNegocio->Errors->Count());
        $errors = ($errors || $this->lbServContractual->Errors->Count());
        $errors = ($errors || $this->lReportado->Errors->Count());
        $errors = ($errors || $this->hallazgo_errores_ort->Errors->Count());
        $errors = ($errors || $this->hallazgo_formato_incorrecto->Errors->Count());
        $errors = ($errors || $this->hallazgo_falta_vinculo->Errors->Count());
        $errors = ($errors || $this->sTipoRequerimiento->Errors->Count());
        $errors = ($errors || $this->hallazgo_doc_incorrecta->Errors->Count());
        $errors = ($errors || $this->hallazgo_incumpl_acept->Errors->Count());
        $errors = ($errors || $this->defectos_errores_ort->Errors->Count());
        $errors = ($errors || $this->defectos_formato_incorrecto->Errors->Count());
        $errors = ($errors || $this->defectos_falta_vinculo->Errors->Count());
        $errors = ($errors || $this->defectos_incumpl_acept->Errors->Count());
        $errors = ($errors || $this->defectos_doc_incorrecta->Errors->Count());
        $errors = ($errors || $this->evidencia_salvedad->Errors->Count());
        $errors = ($errors || $this->observacion_salvedad->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @81-FE9BD5A6
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
            } else if($this->btnCalculaUpdate->Pressed) {
                $this->PressedButton = "btnCalculaUpdate";
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
            } else if($this->PressedButton == "btnCalcula") {
                $Redirect = "PPMCsCrbCalidadCAPC.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
                if(!CCGetEvent($this->btnCalcula->CCSEvents, "OnClick", $this->btnCalcula) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "btnCalculaUpdate") {
                if(!CCGetEvent($this->btnCalculaUpdate->CCSEvents, "OnClick", $this->btnCalculaUpdate) || !$this->UpdateRow()) {
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

//InsertRow Method @81-E03266AB
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->id_ppmc->SetValue($this->id_ppmc->GetValue(true));
        $this->DataSource->id_estimacion->SetValue($this->id_estimacion->GetValue(true));
        $this->DataSource->IndiceCalidadDoc->SetValue($this->IndiceCalidadDoc->GetValue(true));
        $this->DataSource->DeductivaDoc->SetValue($this->DeductivaDoc->GetValue(true));
        $this->DataSource->CumpleCalidad->SetValue($this->CumpleCalidad->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->lbIdEstimacion->SetValue($this->lbIdEstimacion->GetValue(true));
        $this->DataSource->hdId->SetValue($this->hdId->GetValue(true));
        $this->DataSource->lsServNegocio->SetValue($this->lsServNegocio->GetValue(true));
        $this->DataSource->lsServContractual->SetValue($this->lsServContractual->GetValue(true));
        $this->DataSource->lbIdPPMC->SetValue($this->lbIdPPMC->GetValue(true));
        $this->DataSource->DeductivaTot->SetValue($this->DeductivaTot->GetValue(true));
        $this->DataSource->lbServNegocio->SetValue($this->lbServNegocio->GetValue(true));
        $this->DataSource->lbServContractual->SetValue($this->lbServContractual->GetValue(true));
        $this->DataSource->lReportado->SetValue($this->lReportado->GetValue(true));
        $this->DataSource->hallazgo_errores_ort->SetValue($this->hallazgo_errores_ort->GetValue(true));
        $this->DataSource->hallazgo_formato_incorrecto->SetValue($this->hallazgo_formato_incorrecto->GetValue(true));
        $this->DataSource->hallazgo_falta_vinculo->SetValue($this->hallazgo_falta_vinculo->GetValue(true));
        $this->DataSource->sTipoRequerimiento->SetValue($this->sTipoRequerimiento->GetValue(true));
        $this->DataSource->hallazgo_doc_incorrecta->SetValue($this->hallazgo_doc_incorrecta->GetValue(true));
        $this->DataSource->hallazgo_incumpl_acept->SetValue($this->hallazgo_incumpl_acept->GetValue(true));
        $this->DataSource->defectos_errores_ort->SetValue($this->defectos_errores_ort->GetValue(true));
        $this->DataSource->defectos_formato_incorrecto->SetValue($this->defectos_formato_incorrecto->GetValue(true));
        $this->DataSource->defectos_falta_vinculo->SetValue($this->defectos_falta_vinculo->GetValue(true));
        $this->DataSource->defectos_incumpl_acept->SetValue($this->defectos_incumpl_acept->GetValue(true));
        $this->DataSource->defectos_doc_incorrecta->SetValue($this->defectos_doc_incorrecta->GetValue(true));
        $this->DataSource->evidencia_salvedad->SetValue($this->evidencia_salvedad->GetValue(true));
        $this->DataSource->observacion_salvedad->SetValue($this->observacion_salvedad->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @81-A0FAD002
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id_ppmc->SetValue($this->id_ppmc->GetValue(true));
        $this->DataSource->id_estimacion->SetValue($this->id_estimacion->GetValue(true));
        $this->DataSource->IndiceCalidadDoc->SetValue($this->IndiceCalidadDoc->GetValue(true));
        $this->DataSource->DeductivaDoc->SetValue($this->DeductivaDoc->GetValue(true));
        $this->DataSource->CumpleCalidad->SetValue($this->CumpleCalidad->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->lbIdEstimacion->SetValue($this->lbIdEstimacion->GetValue(true));
        $this->DataSource->hdId->SetValue($this->hdId->GetValue(true));
        $this->DataSource->lsServNegocio->SetValue($this->lsServNegocio->GetValue(true));
        $this->DataSource->lsServContractual->SetValue($this->lsServContractual->GetValue(true));
        $this->DataSource->lbIdPPMC->SetValue($this->lbIdPPMC->GetValue(true));
        $this->DataSource->DeductivaTot->SetValue($this->DeductivaTot->GetValue(true));
        $this->DataSource->lbServNegocio->SetValue($this->lbServNegocio->GetValue(true));
        $this->DataSource->lbServContractual->SetValue($this->lbServContractual->GetValue(true));
        $this->DataSource->lReportado->SetValue($this->lReportado->GetValue(true));
        $this->DataSource->hallazgo_errores_ort->SetValue($this->hallazgo_errores_ort->GetValue(true));
        $this->DataSource->hallazgo_formato_incorrecto->SetValue($this->hallazgo_formato_incorrecto->GetValue(true));
        $this->DataSource->hallazgo_falta_vinculo->SetValue($this->hallazgo_falta_vinculo->GetValue(true));
        $this->DataSource->sTipoRequerimiento->SetValue($this->sTipoRequerimiento->GetValue(true));
        $this->DataSource->hallazgo_doc_incorrecta->SetValue($this->hallazgo_doc_incorrecta->GetValue(true));
        $this->DataSource->hallazgo_incumpl_acept->SetValue($this->hallazgo_incumpl_acept->GetValue(true));
        $this->DataSource->defectos_errores_ort->SetValue($this->defectos_errores_ort->GetValue(true));
        $this->DataSource->defectos_formato_incorrecto->SetValue($this->defectos_formato_incorrecto->GetValue(true));
        $this->DataSource->defectos_falta_vinculo->SetValue($this->defectos_falta_vinculo->GetValue(true));
        $this->DataSource->defectos_incumpl_acept->SetValue($this->defectos_incumpl_acept->GetValue(true));
        $this->DataSource->defectos_doc_incorrecta->SetValue($this->defectos_doc_incorrecta->GetValue(true));
        $this->DataSource->evidencia_salvedad->SetValue($this->evidencia_salvedad->GetValue(true));
        $this->DataSource->observacion_salvedad->SetValue($this->observacion_salvedad->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @81-0E7EE6B7
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

        $this->CumpleCalidad->Prepare();

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
                    $this->id_ppmc->SetValue($this->DataSource->id_ppmc->GetValue());
                    $this->id_estimacion->SetValue($this->DataSource->id_estimacion->GetValue());
                    $this->IndiceCalidadDoc->SetValue($this->DataSource->IndiceCalidadDoc->GetValue());
                    $this->DeductivaDoc->SetValue($this->DataSource->DeductivaDoc->GetValue());
                    $this->CumpleCalidad->SetValue($this->DataSource->CumpleCalidad->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                    $this->UsuarioUltMod->SetValue($this->DataSource->UsuarioUltMod->GetValue());
                    $this->FechaUltMod->SetValue($this->DataSource->FechaUltMod->GetValue());
                    $this->hdId->SetValue($this->DataSource->hdId->GetValue());
                    $this->lsServNegocio->SetValue($this->DataSource->lsServNegocio->GetValue());
                    $this->lsServContractual->SetValue($this->DataSource->lsServContractual->GetValue());
                    $this->DeductivaTot->SetValue($this->DataSource->DeductivaTot->GetValue());
                    $this->hallazgo_errores_ort->SetValue($this->DataSource->hallazgo_errores_ort->GetValue());
                    $this->hallazgo_formato_incorrecto->SetValue($this->DataSource->hallazgo_formato_incorrecto->GetValue());
                    $this->hallazgo_falta_vinculo->SetValue($this->DataSource->hallazgo_falta_vinculo->GetValue());
                    $this->hallazgo_doc_incorrecta->SetValue($this->DataSource->hallazgo_doc_incorrecta->GetValue());
                    $this->hallazgo_incumpl_acept->SetValue($this->DataSource->hallazgo_incumpl_acept->GetValue());
                    $this->defectos_errores_ort->SetValue($this->DataSource->defectos_errores_ort->GetValue());
                    $this->defectos_formato_incorrecto->SetValue($this->DataSource->defectos_formato_incorrecto->GetValue());
                    $this->defectos_falta_vinculo->SetValue($this->DataSource->defectos_falta_vinculo->GetValue());
                    $this->defectos_incumpl_acept->SetValue($this->DataSource->defectos_incumpl_acept->GetValue());
                    $this->defectos_doc_incorrecta->SetValue($this->DataSource->defectos_doc_incorrecta->GetValue());
                    $this->evidencia_salvedad->SetValue($this->DataSource->evidencia_salvedad->GetValue());
                    $this->observacion_salvedad->SetValue($this->DataSource->observacion_salvedad->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_ppmc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_estimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IndiceCalidadDoc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeductivaDoc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumpleCalidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsuarioUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sNombreProyecto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbIdEstimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdId->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lsServNegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lsServContractual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbIdPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeductivaTot->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbServNegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbServContractual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lReportado->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hallazgo_errores_ort->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hallazgo_formato_incorrecto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hallazgo_falta_vinculo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sTipoRequerimiento->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hallazgo_doc_incorrecta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hallazgo_incumpl_acept->Errors->ToString());
            $Error = ComposeStrings($Error, $this->defectos_errores_ort->Errors->ToString());
            $Error = ComposeStrings($Error, $this->defectos_formato_incorrecto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->defectos_falta_vinculo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->defectos_incumpl_acept->Errors->ToString());
            $Error = ComposeStrings($Error, $this->defectos_doc_incorrecta->Errors->ToString());
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
        $this->btnCalcula->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->btnCalculaUpdate->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->id_ppmc->Show();
        $this->id_estimacion->Show();
        $this->IndiceCalidadDoc->Show();
        $this->DeductivaDoc->Show();
        $this->CumpleCalidad->Show();
        $this->Observaciones->Show();
        $this->UsuarioUltMod->Show();
        $this->FechaUltMod->Show();
        $this->sNombreProyecto->Show();
        $this->lbIdEstimacion->Show();
        $this->hdId->Show();
        $this->lsServNegocio->Show();
        $this->lsServContractual->Show();
        $this->btnCalcula->Show();
        $this->lbIdPPMC->Show();
        $this->DeductivaTot->Show();
        $this->lbServNegocio->Show();
        $this->lbServContractual->Show();
        $this->lReportado->Show();
        $this->hallazgo_errores_ort->Show();
        $this->hallazgo_formato_incorrecto->Show();
        $this->hallazgo_falta_vinculo->Show();
        $this->sTipoRequerimiento->Show();
        $this->hallazgo_doc_incorrecta->Show();
        $this->hallazgo_incumpl_acept->Show();
        $this->defectos_errores_ort->Show();
        $this->defectos_formato_incorrecto->Show();
        $this->defectos_falta_vinculo->Show();
        $this->defectos_incumpl_acept->Show();
        $this->defectos_doc_incorrecta->Show();
        $this->btnCalculaUpdate->Show();
        $this->evidencia_salvedad->Show();
        $this->observacion_salvedad->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_rs_cr_calidad_capc Class @81-FCB6E20C

class clsmc_info_rs_cr_calidad_capcDataSource extends clsDBcnDisenio {  //mc_info_rs_cr_calidad_capcDataSource Class @81-290FB435

//DataSource Variables @81-93F44C84
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
    public $id_ppmc;
    public $id_estimacion;
    public $IndiceCalidadDoc;
    public $DeductivaDoc;
    public $CumpleCalidad;
    public $Observaciones;
    public $UsuarioUltMod;
    public $FechaUltMod;
    public $sNombreProyecto;
    public $lbIdEstimacion;
    public $hdId;
    public $lsServNegocio;
    public $lsServContractual;
    public $lbIdPPMC;
    public $DeductivaTot;
    public $lbServNegocio;
    public $lbServContractual;
    public $lReportado;
    public $hallazgo_errores_ort;
    public $hallazgo_formato_incorrecto;
    public $hallazgo_falta_vinculo;
    public $sTipoRequerimiento;
    public $hallazgo_doc_incorrecta;
    public $hallazgo_incumpl_acept;
    public $defectos_errores_ort;
    public $defectos_formato_incorrecto;
    public $defectos_falta_vinculo;
    public $defectos_incumpl_acept;
    public $defectos_doc_incorrecta;
    public $evidencia_salvedad;
    public $observacion_salvedad;
//End DataSource Variables

//DataSourceClass_Initialize Event @81-61379FD8
    function clsmc_info_rs_cr_calidad_capcDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_rs_cr_calidad_capc/Error";
        $this->Initialize();
        $this->id_ppmc = new clsField("id_ppmc", ccsInteger, "");
        
        $this->id_estimacion = new clsField("id_estimacion", ccsInteger, "");
        
        $this->IndiceCalidadDoc = new clsField("IndiceCalidadDoc", ccsFloat, "");
        
        $this->DeductivaDoc = new clsField("DeductivaDoc", ccsFloat, "");
        
        $this->CumpleCalidad = new clsField("CumpleCalidad", ccsInteger, "");
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->UsuarioUltMod = new clsField("UsuarioUltMod", ccsText, "");
        
        $this->FechaUltMod = new clsField("FechaUltMod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->sNombreProyecto = new clsField("sNombreProyecto", ccsText, "");
        
        $this->lbIdEstimacion = new clsField("lbIdEstimacion", ccsText, "");
        
        $this->hdId = new clsField("hdId", ccsText, "");
        
        $this->lsServNegocio = new clsField("lsServNegocio", ccsText, "");
        
        $this->lsServContractual = new clsField("lsServContractual", ccsText, "");
        
        $this->lbIdPPMC = new clsField("lbIdPPMC", ccsText, "");
        
        $this->DeductivaTot = new clsField("DeductivaTot", ccsFloat, "");
        
        $this->lbServNegocio = new clsField("lbServNegocio", ccsText, "");
        
        $this->lbServContractual = new clsField("lbServContractual", ccsText, "");
        
        $this->lReportado = new clsField("lReportado", ccsText, "");
        
        $this->hallazgo_errores_ort = new clsField("hallazgo_errores_ort", ccsInteger, "");
        
        $this->hallazgo_formato_incorrecto = new clsField("hallazgo_formato_incorrecto", ccsInteger, "");
        
        $this->hallazgo_falta_vinculo = new clsField("hallazgo_falta_vinculo", ccsInteger, "");
        
        $this->sTipoRequerimiento = new clsField("sTipoRequerimiento", ccsText, "");
        
        $this->hallazgo_doc_incorrecta = new clsField("hallazgo_doc_incorrecta", ccsInteger, "");
        
        $this->hallazgo_incumpl_acept = new clsField("hallazgo_incumpl_acept", ccsInteger, "");
        
        $this->defectos_errores_ort = new clsField("defectos_errores_ort", ccsInteger, "");
        
        $this->defectos_formato_incorrecto = new clsField("defectos_formato_incorrecto", ccsText, "");
        
        $this->defectos_falta_vinculo = new clsField("defectos_falta_vinculo", ccsInteger, "");
        
        $this->defectos_incumpl_acept = new clsField("defectos_incumpl_acept", ccsInteger, "");
        
        $this->defectos_doc_incorrecta = new clsField("defectos_doc_incorrecta", ccsInteger, "");
        
        $this->evidencia_salvedad = new clsField("evidencia_salvedad", ccsBoolean, $this->BooleanFormat);
        
        $this->observacion_salvedad = new clsField("observacion_salvedad", ccsText, "");
        

        $this->InsertFields["id_ppmc"] = array("Name" => "id_ppmc", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["id_estimacion"] = array("Name" => "id_estimacion", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IndiceCalidadDoc"] = array("Name" => "[IndiceCalidadDoc]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["DeductivaDoc"] = array("Name" => "[DeductivaDoc]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["CumpleCalidad"] = array("Name" => "[CumpleCalidad]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FchaUltMod"] = array("Name" => "[FchaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["id"] = array("Name" => "id", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Id_Serv_Negocio"] = array("Name" => "[Id_Serv_Negocio]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Id_Serv_Contractual"] = array("Name" => "[Id_Serv_Contractual]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DeductivaTot"] = array("Name" => "[DeductivaTot]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["hallazgos_errores_ortogr"] = array("Name" => "hallazgos_errores_ortogr", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["hallazgos_formato_incorrecto"] = array("Name" => "hallazgos_formato_incorrecto", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["hallazgos_falta_vinculo"] = array("Name" => "hallazgos_falta_vinculo", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["hallazgos_doc_incorrecta"] = array("Name" => "hallazgos_doc_incorrecta", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["hallazgos_incumpl_acept"] = array("Name" => "hallazgos_incumpl_acept", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["defectos_errores_ortogr"] = array("Name" => "defectos_errores_ortogr", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["defectos_formato_incorrecto"] = array("Name" => "defectos_formato_incorrecto", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["defectos_falta_vinculo"] = array("Name" => "defectos_falta_vinculo", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["defectos_incumpl_acept"] = array("Name" => "defectos_incumpl_acept", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["defectos_doc_incorrecta"] = array("Name" => "defectos_doc_incorrecta", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["evidencia_salvedad"] = array("Name" => "evidencia_salvedad", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["observacion_salvedad"] = array("Name" => "observacion_salvedad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_ppmc"] = array("Name" => "id_ppmc", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_estimacion"] = array("Name" => "id_estimacion", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["IndiceCalidadDoc"] = array("Name" => "[IndiceCalidadDoc]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["DeductivaDoc"] = array("Name" => "[DeductivaDoc]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumpleCalidad"] = array("Name" => "[CumpleCalidad]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FchaUltMod"] = array("Name" => "[FchaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["id"] = array("Name" => "id", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id_Serv_Negocio"] = array("Name" => "[Id_Serv_Negocio]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id_Serv_Contractual"] = array("Name" => "[Id_Serv_Contractual]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DeductivaTot"] = array("Name" => "[DeductivaTot]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["hallazgos_errores_ortogr"] = array("Name" => "hallazgos_errores_ortogr", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["hallazgos_formato_incorrecto"] = array("Name" => "hallazgos_formato_incorrecto", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["hallazgos_falta_vinculo"] = array("Name" => "hallazgos_falta_vinculo", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["hallazgos_doc_incorrecta"] = array("Name" => "hallazgos_doc_incorrecta", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["hallazgos_incumpl_acept"] = array("Name" => "hallazgos_incumpl_acept", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["defectos_errores_ortogr"] = array("Name" => "defectos_errores_ortogr", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["defectos_formato_incorrecto"] = array("Name" => "defectos_formato_incorrecto", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["defectos_falta_vinculo"] = array("Name" => "defectos_falta_vinculo", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["defectos_incumpl_acept"] = array("Name" => "defectos_incumpl_acept", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["defectos_doc_incorrecta"] = array("Name" => "defectos_doc_incorrecta", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["evidencia_salvedad"] = array("Name" => "evidencia_salvedad", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["observacion_salvedad"] = array("Name" => "observacion_salvedad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @81-3E1E5082
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId", ccsInteger, "", "", $this->Parameters["urlId"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @81-2DA066BE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_info_rs_cr_calidad_CAPC {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @81-EFAB730E
    function SetValues()
    {
        $this->id_ppmc->SetDBValue(trim($this->f("id_ppmc")));
        $this->id_estimacion->SetDBValue(trim($this->f("id_estimacion")));
        $this->IndiceCalidadDoc->SetDBValue(trim($this->f("IndiceCalidadDoc")));
        $this->DeductivaDoc->SetDBValue(trim($this->f("DeductivaDoc")));
        $this->CumpleCalidad->SetDBValue(trim($this->f("CumpleCalidad")));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
        $this->UsuarioUltMod->SetDBValue($this->f("UsuarioUltMod"));
        $this->FechaUltMod->SetDBValue(trim($this->f("FchaUltMod")));
        $this->hdId->SetDBValue($this->f("id"));
        $this->lsServNegocio->SetDBValue($this->f("Id_Serv_Negocio"));
        $this->lsServContractual->SetDBValue($this->f("Id_Serv_Contractual"));
        $this->DeductivaTot->SetDBValue(trim($this->f("DeductivaTot")));
        $this->hallazgo_errores_ort->SetDBValue(trim($this->f("hallazgos_errores_ortogr")));
        $this->hallazgo_formato_incorrecto->SetDBValue(trim($this->f("hallazgos_formato_incorrecto")));
        $this->hallazgo_falta_vinculo->SetDBValue(trim($this->f("hallazgos_falta_vinculo")));
        $this->hallazgo_doc_incorrecta->SetDBValue(trim($this->f("hallazgos_doc_incorrecta")));
        $this->hallazgo_incumpl_acept->SetDBValue(trim($this->f("hallazgos_incumpl_acept")));
        $this->defectos_errores_ort->SetDBValue(trim($this->f("defectos_errores_ortogr")));
        $this->defectos_formato_incorrecto->SetDBValue($this->f("defectos_formato_incorrecto"));
        $this->defectos_falta_vinculo->SetDBValue(trim($this->f("defectos_falta_vinculo")));
        $this->defectos_incumpl_acept->SetDBValue(trim($this->f("defectos_incumpl_acept")));
        $this->defectos_doc_incorrecta->SetDBValue(trim($this->f("defectos_doc_incorrecta")));
        $this->evidencia_salvedad->SetDBValue(trim($this->f("evidencia_salvedad")));
        $this->observacion_salvedad->SetDBValue($this->f("observacion_salvedad"));
    }
//End SetValues Method

//Insert Method @81-3001CA0C
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["id_ppmc"]["Value"] = $this->id_ppmc->GetDBValue(true);
        $this->InsertFields["id_estimacion"]["Value"] = $this->id_estimacion->GetDBValue(true);
        $this->InsertFields["IndiceCalidadDoc"]["Value"] = $this->IndiceCalidadDoc->GetDBValue(true);
        $this->InsertFields["DeductivaDoc"]["Value"] = $this->DeductivaDoc->GetDBValue(true);
        $this->InsertFields["CumpleCalidad"]["Value"] = $this->CumpleCalidad->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->InsertFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->InsertFields["FchaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->InsertFields["id"]["Value"] = $this->hdId->GetDBValue(true);
        $this->InsertFields["Id_Serv_Negocio"]["Value"] = $this->lsServNegocio->GetDBValue(true);
        $this->InsertFields["Id_Serv_Contractual"]["Value"] = $this->lsServContractual->GetDBValue(true);
        $this->InsertFields["DeductivaTot"]["Value"] = $this->DeductivaTot->GetDBValue(true);
        $this->InsertFields["hallazgos_errores_ortogr"]["Value"] = $this->hallazgo_errores_ort->GetDBValue(true);
        $this->InsertFields["hallazgos_formato_incorrecto"]["Value"] = $this->hallazgo_formato_incorrecto->GetDBValue(true);
        $this->InsertFields["hallazgos_falta_vinculo"]["Value"] = $this->hallazgo_falta_vinculo->GetDBValue(true);
        $this->InsertFields["hallazgos_doc_incorrecta"]["Value"] = $this->hallazgo_doc_incorrecta->GetDBValue(true);
        $this->InsertFields["hallazgos_incumpl_acept"]["Value"] = $this->hallazgo_incumpl_acept->GetDBValue(true);
        $this->InsertFields["defectos_errores_ortogr"]["Value"] = $this->defectos_errores_ort->GetDBValue(true);
        $this->InsertFields["defectos_formato_incorrecto"]["Value"] = $this->defectos_formato_incorrecto->GetDBValue(true);
        $this->InsertFields["defectos_falta_vinculo"]["Value"] = $this->defectos_falta_vinculo->GetDBValue(true);
        $this->InsertFields["defectos_incumpl_acept"]["Value"] = $this->defectos_incumpl_acept->GetDBValue(true);
        $this->InsertFields["defectos_doc_incorrecta"]["Value"] = $this->defectos_doc_incorrecta->GetDBValue(true);
        $this->InsertFields["evidencia_salvedad"]["Value"] = $this->evidencia_salvedad->GetDBValue(true);
        $this->InsertFields["observacion_salvedad"]["Value"] = $this->observacion_salvedad->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_info_rs_cr_calidad_CAPC", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @81-AE755356
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["id_ppmc"]["Value"] = $this->id_ppmc->GetDBValue(true);
        $this->UpdateFields["id_estimacion"]["Value"] = $this->id_estimacion->GetDBValue(true);
        $this->UpdateFields["IndiceCalidadDoc"]["Value"] = $this->IndiceCalidadDoc->GetDBValue(true);
        $this->UpdateFields["DeductivaDoc"]["Value"] = $this->DeductivaDoc->GetDBValue(true);
        $this->UpdateFields["CumpleCalidad"]["Value"] = $this->CumpleCalidad->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->UpdateFields["FchaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->UpdateFields["id"]["Value"] = $this->hdId->GetDBValue(true);
        $this->UpdateFields["Id_Serv_Negocio"]["Value"] = $this->lsServNegocio->GetDBValue(true);
        $this->UpdateFields["Id_Serv_Contractual"]["Value"] = $this->lsServContractual->GetDBValue(true);
        $this->UpdateFields["DeductivaTot"]["Value"] = $this->DeductivaTot->GetDBValue(true);
        $this->UpdateFields["hallazgos_errores_ortogr"]["Value"] = $this->hallazgo_errores_ort->GetDBValue(true);
        $this->UpdateFields["hallazgos_formato_incorrecto"]["Value"] = $this->hallazgo_formato_incorrecto->GetDBValue(true);
        $this->UpdateFields["hallazgos_falta_vinculo"]["Value"] = $this->hallazgo_falta_vinculo->GetDBValue(true);
        $this->UpdateFields["hallazgos_doc_incorrecta"]["Value"] = $this->hallazgo_doc_incorrecta->GetDBValue(true);
        $this->UpdateFields["hallazgos_incumpl_acept"]["Value"] = $this->hallazgo_incumpl_acept->GetDBValue(true);
        $this->UpdateFields["defectos_errores_ortogr"]["Value"] = $this->defectos_errores_ort->GetDBValue(true);
        $this->UpdateFields["defectos_formato_incorrecto"]["Value"] = $this->defectos_formato_incorrecto->GetDBValue(true);
        $this->UpdateFields["defectos_falta_vinculo"]["Value"] = $this->defectos_falta_vinculo->GetDBValue(true);
        $this->UpdateFields["defectos_incumpl_acept"]["Value"] = $this->defectos_incumpl_acept->GetDBValue(true);
        $this->UpdateFields["defectos_doc_incorrecta"]["Value"] = $this->defectos_doc_incorrecta->GetDBValue(true);
        $this->UpdateFields["evidencia_salvedad"]["Value"] = $this->evidencia_salvedad->GetDBValue(true);
        $this->UpdateFields["observacion_salvedad"]["Value"] = $this->observacion_salvedad->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_rs_cr_calidad_CAPC", $this->UpdateFields, $this);
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

} //End mc_info_rs_cr_calidad_capcDataSource Class @81-FCB6E20C

//Include Page implementation @143-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation





//Initialize Page @1-43AF4A4D
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
$TemplateFileName = "PPMCsCrbCalidadCAPC.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-4B0BB954
CCSecurityRedirect("3", "");
//End Authenticate User

//Include events file @1-A0CAE67C
include_once("./PPMCsCrbCalidadCAPC_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-64E35D81
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$lDocs = new clsControl(ccsLabel, "lDocs", "lDocs", ccsText, "", CCGetRequestParam("lDocs", ccsGet, NULL), $MainPage);
$lDocs->HTML = true;
$mc_info_rs_cr_calidad_capc = new clsRecordmc_info_rs_cr_calidad_capc("", $MainPage);
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$lkAnterior = new clsControl(ccsLink, "lkAnterior", "lkAnterior", ccsText, "", CCGetRequestParam("lkAnterior", ccsGet, NULL), $MainPage);
$lkAnterior->Page = "PPMCsCrbCalidadCAPC.php";
$lkSiguiente = new clsControl(ccsLink, "lkSiguiente", "lkSiguiente", ccsText, "", CCGetRequestParam("lkSiguiente", ccsGet, NULL), $MainPage);
$lkSiguiente->Page = "PPMCsCrbCalidadCAPC.php";
$lkCumplimiento = new clsControl(ccsLink, "lkCumplimiento", "lkCumplimiento", ccsText, "", CCGetRequestParam("lkCumplimiento", ccsGet, NULL), $MainPage);
$lkCumplimiento->Parameters = CCAddParam($lkCumplimiento->Parameters, "sID", CCGetFromGet("Id", NULL));
$lkCumplimiento->Page = "SLAsCAPCReqFunDetalle.php";
$lkCalidad = new clsControl(ccsLink, "lkCalidad", "lkCalidad", ccsText, "", CCGetRequestParam("lkCalidad", ccsGet, NULL), $MainPage);
$lkCalidad->Parameters = CCAddParam($lkCalidad->Parameters, "id", CCGetFromGet("Id", NULL));
$lkCalidad->Page = "SLAsCAPCDetalle.php";
$lkRetraso = new clsControl(ccsLink, "lkRetraso", "lkRetraso", ccsText, "", CCGetRequestParam("lkRetraso", ccsGet, NULL), $MainPage);
$lkRetraso->Parameters = CCAddParam($lkRetraso->Parameters, "id", CCGetFromGet("Id", NULL));
$lkRetraso->Page = "SLAsCAPCRetEnt.php";
$MainPage->lDocs = & $lDocs;
$MainPage->mc_info_rs_cr_calidad_capc = & $mc_info_rs_cr_calidad_capc;
$MainPage->Header = & $Header;
$MainPage->lkAnterior = & $lkAnterior;
$MainPage->lkSiguiente = & $lkSiguiente;
$MainPage->lkCumplimiento = & $lkCumplimiento;
$MainPage->lkCalidad = & $lkCalidad;
$MainPage->lkRetraso = & $lkRetraso;
$mc_info_rs_cr_calidad_capc->Initialize();
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

//Execute Components @1-A51C5E99
$Header->Operations();
$mc_info_rs_cr_calidad_capc->Operation();
//End Execute Components

//Go to destination page @1-5954C1D6
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($mc_info_rs_cr_calidad_capc);
    $Header->Class_Terminate();
    unset($Header);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-422DD1EA
$mc_info_rs_cr_calidad_capc->Show();
$Header->Show();
$lDocs->Show();
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

//Unload Page @1-30492473
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($mc_info_rs_cr_calidad_capc);
$Header->Class_Terminate();
unset($Header);
unset($Tpl);
//End Unload Page


?>
