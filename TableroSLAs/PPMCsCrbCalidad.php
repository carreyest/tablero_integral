<?php
//Include Common Files @1-0068C660
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsCrbCalidad.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files







class clsRecordmc_info_rs_cr_calidad { //mc_info_rs_cr_calidad Class @81-255F8432

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

//Class_Initialize Event @81-EDD28B2D
    function clsRecordmc_info_rs_cr_calidad($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_rs_cr_calidad/Error";
        $this->DataSource = new clsmc_info_rs_cr_calidadDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_rs_cr_calidad";
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
            $this->RechazosDocAVL = new clsControl(ccsTextBox, "RechazosDocAVL", "Rechazos Doc AVL", ccsInteger, "", CCGetRequestParam("RechazosDocAVL", $Method, NULL), $this);
            $this->HallazgosDocQC = new clsControl(ccsTextBox, "HallazgosDocQC", "Hallazgos Doc QC", ccsInteger, "", CCGetRequestParam("HallazgosDocQC", $Method, NULL), $this);
            $this->IndiceCalidadDoc = new clsControl(ccsTextBox, "IndiceCalidadDoc", "Indice Calidad Doc", ccsFloat, "", CCGetRequestParam("IndiceCalidadDoc", $Method, NULL), $this);
            $this->DeductivaDoc = new clsControl(ccsTextBox, "DeductivaDoc", "Deductiva Doc", ccsFloat, "", CCGetRequestParam("DeductivaDoc", $Method, NULL), $this);
            $this->CumpleCalidad = new clsControl(ccsListBox, "CumpleCalidad", "Cumple Calidad", ccsInteger, "", CCGetRequestParam("CumpleCalidad", $Method, NULL), $this);
            $this->CumpleCalidad->DSType = dsListOfValues;
            $this->CumpleCalidad->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsText, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->UsuarioUltMod = new clsControl(ccsHidden, "UsuarioUltMod", "Usuario Ult Mod", ccsText, "", CCGetRequestParam("UsuarioUltMod", $Method, NULL), $this);
            $this->FechaUltMod = new clsControl(ccsHidden, "FechaUltMod", "Fcha Ult Mod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn"), CCGetRequestParam("FechaUltMod", $Method, NULL), $this);
            $this->RechazosFunAVL = new clsControl(ccsTextBox, "RechazosFunAVL", "Rechazos Fun AVL", ccsInteger, "", CCGetRequestParam("RechazosFunAVL", $Method, NULL), $this);
            $this->DefectosQC = new clsControl(ccsTextBox, "DefectosQC", "Defectos QC", ccsInteger, "", CCGetRequestParam("DefectosQC", $Method, NULL), $this);
            $this->sTipoRequerimiento = new clsControl(ccsLabel, "sTipoRequerimiento", "sTipoRequerimiento", ccsText, "", CCGetRequestParam("sTipoRequerimiento", $Method, NULL), $this);
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
            $this->CasosdePrueba = new clsControl(ccsTextBox, "CasosdePrueba", "Casosde Prueba", ccsInteger, "", CCGetRequestParam("CasosdePrueba", $Method, NULL), $this);
            $this->TotalDefectos = new clsControl(ccsTextBox, "TotalDefectos", "Total Defectos", ccsInteger, "", CCGetRequestParam("TotalDefectos", $Method, NULL), $this);
            $this->IndiceCalidadFun = new clsControl(ccsTextBox, "IndiceCalidadFun", "Indice Calidad Fun", ccsFloat, "", CCGetRequestParam("IndiceCalidadFun", $Method, NULL), $this);
            $this->DeductivaFun = new clsControl(ccsTextBox, "DeductivaFun", "Deductiva Fun", ccsFloat, "", CCGetRequestParam("DeductivaFun", $Method, NULL), $this);
            $this->lbServNegocio = new clsControl(ccsLabel, "lbServNegocio", "lbServNegocio", ccsText, "", CCGetRequestParam("lbServNegocio", $Method, NULL), $this);
            $this->lbServContractual = new clsControl(ccsLabel, "lbServContractual", "lbServContractual", ccsText, "", CCGetRequestParam("lbServContractual", $Method, NULL), $this);
            $this->lReportado = new clsControl(ccsLabel, "lReportado", "lReportado", ccsText, "", CCGetRequestParam("lReportado", $Method, NULL), $this);
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
                if(!is_array($this->TotalDefectos->Value) && !strlen($this->TotalDefectos->Value) && $this->TotalDefectos->Value !== false)
                    $this->TotalDefectos->SetText(0);
                if(!is_array($this->IndiceCalidadFun->Value) && !strlen($this->IndiceCalidadFun->Value) && $this->IndiceCalidadFun->Value !== false)
                    $this->IndiceCalidadFun->SetText(0);
                if(!is_array($this->DeductivaFun->Value) && !strlen($this->DeductivaFun->Value) && $this->DeductivaFun->Value !== false)
                    $this->DeductivaFun->SetText(0);
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

//Validate Method @81-03D6E6EC
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->id_ppmc->Validate() && $Validation);
        $Validation = ($this->id_estimacion->Validate() && $Validation);
        $Validation = ($this->RechazosDocAVL->Validate() && $Validation);
        $Validation = ($this->HallazgosDocQC->Validate() && $Validation);
        $Validation = ($this->IndiceCalidadDoc->Validate() && $Validation);
        $Validation = ($this->DeductivaDoc->Validate() && $Validation);
        $Validation = ($this->CumpleCalidad->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->UsuarioUltMod->Validate() && $Validation);
        $Validation = ($this->FechaUltMod->Validate() && $Validation);
        $Validation = ($this->RechazosFunAVL->Validate() && $Validation);
        $Validation = ($this->DefectosQC->Validate() && $Validation);
        $Validation = ($this->hdId->Validate() && $Validation);
        $Validation = ($this->lsServNegocio->Validate() && $Validation);
        $Validation = ($this->lsServContractual->Validate() && $Validation);
        $Validation = ($this->DeductivaTot->Validate() && $Validation);
        $Validation = ($this->CasosdePrueba->Validate() && $Validation);
        $Validation = ($this->TotalDefectos->Validate() && $Validation);
        $Validation = ($this->IndiceCalidadFun->Validate() && $Validation);
        $Validation = ($this->DeductivaFun->Validate() && $Validation);
        $Validation = ($this->evidencia_salvedad->Validate() && $Validation);
        $Validation = ($this->observacion_salvedad->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->id_ppmc->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_estimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RechazosDocAVL->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HallazgosDocQC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IndiceCalidadDoc->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeductivaDoc->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumpleCalidad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsuarioUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RechazosFunAVL->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DefectosQC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdId->Errors->Count() == 0);
        $Validation =  $Validation && ($this->lsServNegocio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->lsServContractual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeductivaTot->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CasosdePrueba->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TotalDefectos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IndiceCalidadFun->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DeductivaFun->Errors->Count() == 0);
        $Validation =  $Validation && ($this->evidencia_salvedad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->observacion_salvedad->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @81-D355E621
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_ppmc->Errors->Count());
        $errors = ($errors || $this->id_estimacion->Errors->Count());
        $errors = ($errors || $this->RechazosDocAVL->Errors->Count());
        $errors = ($errors || $this->HallazgosDocQC->Errors->Count());
        $errors = ($errors || $this->IndiceCalidadDoc->Errors->Count());
        $errors = ($errors || $this->DeductivaDoc->Errors->Count());
        $errors = ($errors || $this->CumpleCalidad->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->UsuarioUltMod->Errors->Count());
        $errors = ($errors || $this->FechaUltMod->Errors->Count());
        $errors = ($errors || $this->RechazosFunAVL->Errors->Count());
        $errors = ($errors || $this->DefectosQC->Errors->Count());
        $errors = ($errors || $this->sTipoRequerimiento->Errors->Count());
        $errors = ($errors || $this->sNombreProyecto->Errors->Count());
        $errors = ($errors || $this->lbIdEstimacion->Errors->Count());
        $errors = ($errors || $this->hdId->Errors->Count());
        $errors = ($errors || $this->lsServNegocio->Errors->Count());
        $errors = ($errors || $this->lsServContractual->Errors->Count());
        $errors = ($errors || $this->lbIdPPMC->Errors->Count());
        $errors = ($errors || $this->DeductivaTot->Errors->Count());
        $errors = ($errors || $this->CasosdePrueba->Errors->Count());
        $errors = ($errors || $this->TotalDefectos->Errors->Count());
        $errors = ($errors || $this->IndiceCalidadFun->Errors->Count());
        $errors = ($errors || $this->DeductivaFun->Errors->Count());
        $errors = ($errors || $this->lbServNegocio->Errors->Count());
        $errors = ($errors || $this->lbServContractual->Errors->Count());
        $errors = ($errors || $this->lReportado->Errors->Count());
        $errors = ($errors || $this->evidencia_salvedad->Errors->Count());
        $errors = ($errors || $this->observacion_salvedad->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @81-18A3B321
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
                $Redirect = "PPMCsCrbCalidad.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = "PPMCsCrbCalidad.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "btnCalcula") {
                $Redirect = "PPMCsCrbCalidad.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
                if(!CCGetEvent($this->btnCalcula->CCSEvents, "OnClick", $this->btnCalcula) || !$this->UpdateRow()) {
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

//InsertRow Method @81-69AC4418
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->id_ppmc->SetValue($this->id_ppmc->GetValue(true));
        $this->DataSource->id_estimacion->SetValue($this->id_estimacion->GetValue(true));
        $this->DataSource->RechazosDocAVL->SetValue($this->RechazosDocAVL->GetValue(true));
        $this->DataSource->HallazgosDocQC->SetValue($this->HallazgosDocQC->GetValue(true));
        $this->DataSource->IndiceCalidadDoc->SetValue($this->IndiceCalidadDoc->GetValue(true));
        $this->DataSource->DeductivaDoc->SetValue($this->DeductivaDoc->GetValue(true));
        $this->DataSource->CumpleCalidad->SetValue($this->CumpleCalidad->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->RechazosFunAVL->SetValue($this->RechazosFunAVL->GetValue(true));
        $this->DataSource->DefectosQC->SetValue($this->DefectosQC->GetValue(true));
        $this->DataSource->sTipoRequerimiento->SetValue($this->sTipoRequerimiento->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->lbIdEstimacion->SetValue($this->lbIdEstimacion->GetValue(true));
        $this->DataSource->hdId->SetValue($this->hdId->GetValue(true));
        $this->DataSource->lsServNegocio->SetValue($this->lsServNegocio->GetValue(true));
        $this->DataSource->lsServContractual->SetValue($this->lsServContractual->GetValue(true));
        $this->DataSource->lbIdPPMC->SetValue($this->lbIdPPMC->GetValue(true));
        $this->DataSource->DeductivaTot->SetValue($this->DeductivaTot->GetValue(true));
        $this->DataSource->CasosdePrueba->SetValue($this->CasosdePrueba->GetValue(true));
        $this->DataSource->TotalDefectos->SetValue($this->TotalDefectos->GetValue(true));
        $this->DataSource->IndiceCalidadFun->SetValue($this->IndiceCalidadFun->GetValue(true));
        $this->DataSource->DeductivaFun->SetValue($this->DeductivaFun->GetValue(true));
        $this->DataSource->lbServNegocio->SetValue($this->lbServNegocio->GetValue(true));
        $this->DataSource->lbServContractual->SetValue($this->lbServContractual->GetValue(true));
        $this->DataSource->lReportado->SetValue($this->lReportado->GetValue(true));
        $this->DataSource->evidencia_salvedad->SetValue($this->evidencia_salvedad->GetValue(true));
        $this->DataSource->observacion_salvedad->SetValue($this->observacion_salvedad->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @81-8EB8490B
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id_ppmc->SetValue($this->id_ppmc->GetValue(true));
        $this->DataSource->id_estimacion->SetValue($this->id_estimacion->GetValue(true));
        $this->DataSource->RechazosDocAVL->SetValue($this->RechazosDocAVL->GetValue(true));
        $this->DataSource->HallazgosDocQC->SetValue($this->HallazgosDocQC->GetValue(true));
        $this->DataSource->IndiceCalidadDoc->SetValue($this->IndiceCalidadDoc->GetValue(true));
        $this->DataSource->DeductivaDoc->SetValue($this->DeductivaDoc->GetValue(true));
        $this->DataSource->CumpleCalidad->SetValue($this->CumpleCalidad->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->RechazosFunAVL->SetValue($this->RechazosFunAVL->GetValue(true));
        $this->DataSource->DefectosQC->SetValue($this->DefectosQC->GetValue(true));
        $this->DataSource->sTipoRequerimiento->SetValue($this->sTipoRequerimiento->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->lbIdEstimacion->SetValue($this->lbIdEstimacion->GetValue(true));
        $this->DataSource->hdId->SetValue($this->hdId->GetValue(true));
        $this->DataSource->lsServNegocio->SetValue($this->lsServNegocio->GetValue(true));
        $this->DataSource->lsServContractual->SetValue($this->lsServContractual->GetValue(true));
        $this->DataSource->lbIdPPMC->SetValue($this->lbIdPPMC->GetValue(true));
        $this->DataSource->DeductivaTot->SetValue($this->DeductivaTot->GetValue(true));
        $this->DataSource->CasosdePrueba->SetValue($this->CasosdePrueba->GetValue(true));
        $this->DataSource->TotalDefectos->SetValue($this->TotalDefectos->GetValue(true));
        $this->DataSource->IndiceCalidadFun->SetValue($this->IndiceCalidadFun->GetValue(true));
        $this->DataSource->DeductivaFun->SetValue($this->DeductivaFun->GetValue(true));
        $this->DataSource->lbServNegocio->SetValue($this->lbServNegocio->GetValue(true));
        $this->DataSource->lbServContractual->SetValue($this->lbServContractual->GetValue(true));
        $this->DataSource->lReportado->SetValue($this->lReportado->GetValue(true));
        $this->DataSource->evidencia_salvedad->SetValue($this->evidencia_salvedad->GetValue(true));
        $this->DataSource->observacion_salvedad->SetValue($this->observacion_salvedad->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @81-660328D3
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
                    $this->RechazosDocAVL->SetValue($this->DataSource->RechazosDocAVL->GetValue());
                    $this->HallazgosDocQC->SetValue($this->DataSource->HallazgosDocQC->GetValue());
                    $this->IndiceCalidadDoc->SetValue($this->DataSource->IndiceCalidadDoc->GetValue());
                    $this->DeductivaDoc->SetValue($this->DataSource->DeductivaDoc->GetValue());
                    $this->CumpleCalidad->SetValue($this->DataSource->CumpleCalidad->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                    $this->UsuarioUltMod->SetValue($this->DataSource->UsuarioUltMod->GetValue());
                    $this->FechaUltMod->SetValue($this->DataSource->FechaUltMod->GetValue());
                    $this->RechazosFunAVL->SetValue($this->DataSource->RechazosFunAVL->GetValue());
                    $this->DefectosQC->SetValue($this->DataSource->DefectosQC->GetValue());
                    $this->hdId->SetValue($this->DataSource->hdId->GetValue());
                    $this->lsServNegocio->SetValue($this->DataSource->lsServNegocio->GetValue());
                    $this->lsServContractual->SetValue($this->DataSource->lsServContractual->GetValue());
                    $this->DeductivaTot->SetValue($this->DataSource->DeductivaTot->GetValue());
                    $this->CasosdePrueba->SetValue($this->DataSource->CasosdePrueba->GetValue());
                    $this->TotalDefectos->SetValue($this->DataSource->TotalDefectos->GetValue());
                    $this->IndiceCalidadFun->SetValue($this->DataSource->IndiceCalidadFun->GetValue());
                    $this->DeductivaFun->SetValue($this->DataSource->DeductivaFun->GetValue());
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
            $Error = ComposeStrings($Error, $this->RechazosDocAVL->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HallazgosDocQC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IndiceCalidadDoc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeductivaDoc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumpleCalidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsuarioUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RechazosFunAVL->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DefectosQC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sTipoRequerimiento->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sNombreProyecto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbIdEstimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdId->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lsServNegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lsServContractual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbIdPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeductivaTot->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CasosdePrueba->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TotalDefectos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IndiceCalidadFun->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DeductivaFun->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbServNegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lbServContractual->Errors->ToString());
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
        $this->btnCalcula->Visible = $this->EditMode && $this->UpdateAllowed;

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
        $this->RechazosDocAVL->Show();
        $this->HallazgosDocQC->Show();
        $this->IndiceCalidadDoc->Show();
        $this->DeductivaDoc->Show();
        $this->CumpleCalidad->Show();
        $this->Observaciones->Show();
        $this->UsuarioUltMod->Show();
        $this->FechaUltMod->Show();
        $this->RechazosFunAVL->Show();
        $this->DefectosQC->Show();
        $this->sTipoRequerimiento->Show();
        $this->sNombreProyecto->Show();
        $this->lbIdEstimacion->Show();
        $this->hdId->Show();
        $this->lsServNegocio->Show();
        $this->lsServContractual->Show();
        $this->btnCalcula->Show();
        $this->lbIdPPMC->Show();
        $this->DeductivaTot->Show();
        $this->CasosdePrueba->Show();
        $this->TotalDefectos->Show();
        $this->IndiceCalidadFun->Show();
        $this->DeductivaFun->Show();
        $this->lbServNegocio->Show();
        $this->lbServContractual->Show();
        $this->lReportado->Show();
        $this->evidencia_salvedad->Show();
        $this->observacion_salvedad->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_rs_cr_calidad Class @81-FCB6E20C

class clsmc_info_rs_cr_calidadDataSource extends clsDBcnDisenio {  //mc_info_rs_cr_calidadDataSource Class @81-D3DE42B0

//DataSource Variables @81-73C7122E
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
    public $RechazosDocAVL;
    public $HallazgosDocQC;
    public $IndiceCalidadDoc;
    public $DeductivaDoc;
    public $CumpleCalidad;
    public $Observaciones;
    public $UsuarioUltMod;
    public $FechaUltMod;
    public $RechazosFunAVL;
    public $DefectosQC;
    public $sTipoRequerimiento;
    public $sNombreProyecto;
    public $lbIdEstimacion;
    public $hdId;
    public $lsServNegocio;
    public $lsServContractual;
    public $lbIdPPMC;
    public $DeductivaTot;
    public $CasosdePrueba;
    public $TotalDefectos;
    public $IndiceCalidadFun;
    public $DeductivaFun;
    public $lbServNegocio;
    public $lbServContractual;
    public $lReportado;
    public $evidencia_salvedad;
    public $observacion_salvedad;
//End DataSource Variables

//DataSourceClass_Initialize Event @81-29D8F2A9
    function clsmc_info_rs_cr_calidadDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_rs_cr_calidad/Error";
        $this->Initialize();
        $this->id_ppmc = new clsField("id_ppmc", ccsInteger, "");
        
        $this->id_estimacion = new clsField("id_estimacion", ccsInteger, "");
        
        $this->RechazosDocAVL = new clsField("RechazosDocAVL", ccsInteger, "");
        
        $this->HallazgosDocQC = new clsField("HallazgosDocQC", ccsInteger, "");
        
        $this->IndiceCalidadDoc = new clsField("IndiceCalidadDoc", ccsFloat, "");
        
        $this->DeductivaDoc = new clsField("DeductivaDoc", ccsFloat, "");
        
        $this->CumpleCalidad = new clsField("CumpleCalidad", ccsInteger, "");
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->UsuarioUltMod = new clsField("UsuarioUltMod", ccsText, "");
        
        $this->FechaUltMod = new clsField("FechaUltMod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->RechazosFunAVL = new clsField("RechazosFunAVL", ccsInteger, "");
        
        $this->DefectosQC = new clsField("DefectosQC", ccsInteger, "");
        
        $this->sTipoRequerimiento = new clsField("sTipoRequerimiento", ccsText, "");
        
        $this->sNombreProyecto = new clsField("sNombreProyecto", ccsText, "");
        
        $this->lbIdEstimacion = new clsField("lbIdEstimacion", ccsText, "");
        
        $this->hdId = new clsField("hdId", ccsText, "");
        
        $this->lsServNegocio = new clsField("lsServNegocio", ccsText, "");
        
        $this->lsServContractual = new clsField("lsServContractual", ccsText, "");
        
        $this->lbIdPPMC = new clsField("lbIdPPMC", ccsText, "");
        
        $this->DeductivaTot = new clsField("DeductivaTot", ccsFloat, "");
        
        $this->CasosdePrueba = new clsField("CasosdePrueba", ccsInteger, "");
        
        $this->TotalDefectos = new clsField("TotalDefectos", ccsInteger, "");
        
        $this->IndiceCalidadFun = new clsField("IndiceCalidadFun", ccsFloat, "");
        
        $this->DeductivaFun = new clsField("DeductivaFun", ccsFloat, "");
        
        $this->lbServNegocio = new clsField("lbServNegocio", ccsText, "");
        
        $this->lbServContractual = new clsField("lbServContractual", ccsText, "");
        
        $this->lReportado = new clsField("lReportado", ccsText, "");
        
        $this->evidencia_salvedad = new clsField("evidencia_salvedad", ccsBoolean, $this->BooleanFormat);
        
        $this->observacion_salvedad = new clsField("observacion_salvedad", ccsText, "");
        

        $this->InsertFields["id_ppmc"] = array("Name" => "id_ppmc", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["id_estimacion"] = array("Name" => "id_estimacion", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["RechazosDocAVL"] = array("Name" => "[RechazosDocAVL]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["HallazgosDocQC"] = array("Name" => "[HallazgosDocQC]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IndiceCalidadDoc"] = array("Name" => "[IndiceCalidadDoc]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["DeductivaDoc"] = array("Name" => "[DeductivaDoc]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["CumpleCalidad"] = array("Name" => "[CumpleCalidad]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FchaUltMod"] = array("Name" => "[FchaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["RechazosFunAVL"] = array("Name" => "[RechazosFunAVL]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DefectosQC"] = array("Name" => "[DefectosQC]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["id"] = array("Name" => "id", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Id_Serv_Negocio"] = array("Name" => "[Id_Serv_Negocio]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Id_Serv_Contractual"] = array("Name" => "[Id_Serv_Contractual]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DeductivaTot"] = array("Name" => "[DeductivaTot]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["CasosdePrueba"] = array("Name" => "[CasosdePrueba]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["TotalDefectos"] = array("Name" => "[TotalDefectos]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IndiceCalidadFun"] = array("Name" => "[IndiceCalidadFun]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["DeductivaFun"] = array("Name" => "[DeductivaFun]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["evidencia_salvedad"] = array("Name" => "evidencia_salvedad", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["observacion_salvedad"] = array("Name" => "observacion_salvedad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_ppmc"] = array("Name" => "id_ppmc", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_estimacion"] = array("Name" => "id_estimacion", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["RechazosDocAVL"] = array("Name" => "[RechazosDocAVL]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["HallazgosDocQC"] = array("Name" => "[HallazgosDocQC]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["IndiceCalidadDoc"] = array("Name" => "[IndiceCalidadDoc]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["DeductivaDoc"] = array("Name" => "[DeductivaDoc]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumpleCalidad"] = array("Name" => "[CumpleCalidad]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FchaUltMod"] = array("Name" => "[FchaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["RechazosFunAVL"] = array("Name" => "[RechazosFunAVL]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DefectosQC"] = array("Name" => "[DefectosQC]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id"] = array("Name" => "id", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id_Serv_Negocio"] = array("Name" => "[Id_Serv_Negocio]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id_Serv_Contractual"] = array("Name" => "[Id_Serv_Contractual]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DeductivaTot"] = array("Name" => "[DeductivaTot]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["CasosdePrueba"] = array("Name" => "[CasosdePrueba]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TotalDefectos"] = array("Name" => "[TotalDefectos]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["IndiceCalidadFun"] = array("Name" => "[IndiceCalidadFun]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["DeductivaFun"] = array("Name" => "[DeductivaFun]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
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

//Open Method @81-260B888F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_info_rs_cr_calidad {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @81-C8535C7A
    function SetValues()
    {
        $this->id_ppmc->SetDBValue(trim($this->f("id_ppmc")));
        $this->id_estimacion->SetDBValue(trim($this->f("id_estimacion")));
        $this->RechazosDocAVL->SetDBValue(trim($this->f("RechazosDocAVL")));
        $this->HallazgosDocQC->SetDBValue(trim($this->f("HallazgosDocQC")));
        $this->IndiceCalidadDoc->SetDBValue(trim($this->f("IndiceCalidadDoc")));
        $this->DeductivaDoc->SetDBValue(trim($this->f("DeductivaDoc")));
        $this->CumpleCalidad->SetDBValue(trim($this->f("CumpleCalidad")));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
        $this->UsuarioUltMod->SetDBValue($this->f("UsuarioUltMod"));
        $this->FechaUltMod->SetDBValue(trim($this->f("FchaUltMod")));
        $this->RechazosFunAVL->SetDBValue(trim($this->f("RechazosFunAVL")));
        $this->DefectosQC->SetDBValue(trim($this->f("DefectosQC")));
        $this->hdId->SetDBValue($this->f("id"));
        $this->lsServNegocio->SetDBValue($this->f("Id_Serv_Negocio"));
        $this->lsServContractual->SetDBValue($this->f("Id_Serv_Contractual"));
        $this->DeductivaTot->SetDBValue(trim($this->f("DeductivaTot")));
        $this->CasosdePrueba->SetDBValue(trim($this->f("CasosdePrueba")));
        $this->TotalDefectos->SetDBValue(trim($this->f("TotalDefectos")));
        $this->IndiceCalidadFun->SetDBValue(trim($this->f("IndiceCalidadFun")));
        $this->DeductivaFun->SetDBValue(trim($this->f("DeductivaFun")));
        $this->evidencia_salvedad->SetDBValue(trim($this->f("evidencia_salvedad")));
        $this->observacion_salvedad->SetDBValue($this->f("observacion_salvedad"));
    }
//End SetValues Method

//Insert Method @81-DD25EE8C
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["id_ppmc"]["Value"] = $this->id_ppmc->GetDBValue(true);
        $this->InsertFields["id_estimacion"]["Value"] = $this->id_estimacion->GetDBValue(true);
        $this->InsertFields["RechazosDocAVL"]["Value"] = $this->RechazosDocAVL->GetDBValue(true);
        $this->InsertFields["HallazgosDocQC"]["Value"] = $this->HallazgosDocQC->GetDBValue(true);
        $this->InsertFields["IndiceCalidadDoc"]["Value"] = $this->IndiceCalidadDoc->GetDBValue(true);
        $this->InsertFields["DeductivaDoc"]["Value"] = $this->DeductivaDoc->GetDBValue(true);
        $this->InsertFields["CumpleCalidad"]["Value"] = $this->CumpleCalidad->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->InsertFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->InsertFields["FchaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->InsertFields["RechazosFunAVL"]["Value"] = $this->RechazosFunAVL->GetDBValue(true);
        $this->InsertFields["DefectosQC"]["Value"] = $this->DefectosQC->GetDBValue(true);
        $this->InsertFields["id"]["Value"] = $this->hdId->GetDBValue(true);
        $this->InsertFields["Id_Serv_Negocio"]["Value"] = $this->lsServNegocio->GetDBValue(true);
        $this->InsertFields["Id_Serv_Contractual"]["Value"] = $this->lsServContractual->GetDBValue(true);
        $this->InsertFields["DeductivaTot"]["Value"] = $this->DeductivaTot->GetDBValue(true);
        $this->InsertFields["CasosdePrueba"]["Value"] = $this->CasosdePrueba->GetDBValue(true);
        $this->InsertFields["TotalDefectos"]["Value"] = $this->TotalDefectos->GetDBValue(true);
        $this->InsertFields["IndiceCalidadFun"]["Value"] = $this->IndiceCalidadFun->GetDBValue(true);
        $this->InsertFields["DeductivaFun"]["Value"] = $this->DeductivaFun->GetDBValue(true);
        $this->InsertFields["evidencia_salvedad"]["Value"] = $this->evidencia_salvedad->GetDBValue(true);
        $this->InsertFields["observacion_salvedad"]["Value"] = $this->observacion_salvedad->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_info_rs_cr_calidad", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @81-9FD56546
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["id_ppmc"]["Value"] = $this->id_ppmc->GetDBValue(true);
        $this->UpdateFields["id_estimacion"]["Value"] = $this->id_estimacion->GetDBValue(true);
        $this->UpdateFields["RechazosDocAVL"]["Value"] = $this->RechazosDocAVL->GetDBValue(true);
        $this->UpdateFields["HallazgosDocQC"]["Value"] = $this->HallazgosDocQC->GetDBValue(true);
        $this->UpdateFields["IndiceCalidadDoc"]["Value"] = $this->IndiceCalidadDoc->GetDBValue(true);
        $this->UpdateFields["DeductivaDoc"]["Value"] = $this->DeductivaDoc->GetDBValue(true);
        $this->UpdateFields["CumpleCalidad"]["Value"] = $this->CumpleCalidad->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->UpdateFields["FchaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->UpdateFields["RechazosFunAVL"]["Value"] = $this->RechazosFunAVL->GetDBValue(true);
        $this->UpdateFields["DefectosQC"]["Value"] = $this->DefectosQC->GetDBValue(true);
        $this->UpdateFields["id"]["Value"] = $this->hdId->GetDBValue(true);
        $this->UpdateFields["Id_Serv_Negocio"]["Value"] = $this->lsServNegocio->GetDBValue(true);
        $this->UpdateFields["Id_Serv_Contractual"]["Value"] = $this->lsServContractual->GetDBValue(true);
        $this->UpdateFields["DeductivaTot"]["Value"] = $this->DeductivaTot->GetDBValue(true);
        $this->UpdateFields["CasosdePrueba"]["Value"] = $this->CasosdePrueba->GetDBValue(true);
        $this->UpdateFields["TotalDefectos"]["Value"] = $this->TotalDefectos->GetDBValue(true);
        $this->UpdateFields["IndiceCalidadFun"]["Value"] = $this->IndiceCalidadFun->GetDBValue(true);
        $this->UpdateFields["DeductivaFun"]["Value"] = $this->DeductivaFun->GetDBValue(true);
        $this->UpdateFields["evidencia_salvedad"]["Value"] = $this->evidencia_salvedad->GetDBValue(true);
        $this->UpdateFields["observacion_salvedad"]["Value"] = $this->observacion_salvedad->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_rs_cr_calidad", $this->UpdateFields, $this);
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

} //End mc_info_rs_cr_calidadDataSource Class @81-FCB6E20C

//Include Page implementation @143-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsEditableGridmc_info_detalle_hallazgos { //mc_info_detalle_hallazgos Class @166-D66710D4

//Variables @166-8A16021B

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
    public $Sorter_TipoRegistro;
    public $Sorter_Estado;
    public $Sorter_Tipo;
    public $Sorter_Paquete;
    public $Sorter_Descripcion;
    public $Sorter_Ignorar;
    public $Sorter1;
//End Variables

//Class_Initialize Event @166-A3F5325E
    function clsEditableGridmc_info_detalle_hallazgos($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid mc_info_detalle_hallazgos/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "mc_info_detalle_hallazgos";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->CachedColumns["Id"][0] = "Id";
        $this->DataSource = new clsmc_info_detalle_hallazgosDataSource($this);
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

        $this->SorterName = CCGetParam("mc_info_detalle_hallazgosOrder", "");
        $this->SorterDirection = CCGetParam("mc_info_detalle_hallazgosDir", "");

        $this->Sorter_TipoRegistro = new clsSorter($this->ComponentName, "Sorter_TipoRegistro", $FileName, $this);
        $this->Sorter_Estado = new clsSorter($this->ComponentName, "Sorter_Estado", $FileName, $this);
        $this->Sorter_Tipo = new clsSorter($this->ComponentName, "Sorter_Tipo", $FileName, $this);
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_Ignorar = new clsSorter($this->ComponentName, "Sorter_Ignorar", $FileName, $this);
        $this->TipoRegistro = new clsControl(ccsLabel, "TipoRegistro", "TipoRegistro", ccsText, "", NULL, $this);
        $this->Estado = new clsControl(ccsLabel, "Estado", "Estado", ccsText, "", NULL, $this);
        $this->Tipo = new clsControl(ccsLabel, "Tipo", "Tipo", ccsText, "", NULL, $this);
        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", NULL, $this);
        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", NULL, $this);
        $this->Ignorar = new clsControl(ccsCheckBox, "Ignorar", "Ignorar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->Ignorar->CheckedValue = true;
        $this->Ignorar->UncheckedValue = false;
        $this->IdPadre = new clsControl(ccsHidden, "IdPadre", "Id Padre", ccsInteger, "", NULL, $this);
        $this->Id = new clsControl(ccsHidden, "Id", "Id", ccsInteger, "", NULL, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->FechaInicioMov = new clsControl(ccsLabel, "FechaInicioMov", "FechaInicioMov", ccsDate, array("dd", "/", "mm", "/", "yyyy"), NULL, $this);
        $this->IdRelacionado = new clsControl(ccsLabel, "IdRelacionado", "IdRelacionado", ccsText, "", NULL, $this);
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
        $this->ProveedorPaq = new clsControl(ccsLabel, "ProveedorPaq", "ProveedorPaq", ccsText, "", NULL, $this);
    }
//End Class_Initialize Event

//Initialize Method @166-A6794006
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
        $this->DataSource->Parameters["expr313"] = 'Hallazgo';
    }
//End Initialize Method

//GetFormParameters Method @166-27CE6D6F
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["Ignorar"][$RowNumber] = CCGetFromPost("Ignorar_" . $RowNumber, NULL);
            $this->FormParameters["IdPadre"][$RowNumber] = CCGetFromPost("IdPadre_" . $RowNumber, NULL);
            $this->FormParameters["Id"][$RowNumber] = CCGetFromPost("Id_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @166-B1EBBB28
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["Id"] = $this->CachedColumns["Id"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
            $this->IdPadre->SetText($this->FormParameters["IdPadre"][$this->RowNumber], $this->RowNumber);
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

//ValidateRow Method @166-D655E3CE
    function ValidateRow()
    {
        global $CCSLocales;
        $this->Ignorar->Validate();
        $this->IdPadre->Validate();
        $this->Id->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->Ignorar->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IdPadre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $this->Ignorar->Errors->Clear();
        $this->IdPadre->Errors->Clear();
        $this->Id->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @166-03B61A2D
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["Ignorar"][$this->RowNumber]) && count($this->FormParameters["Ignorar"][$this->RowNumber])) || strlen($this->FormParameters["Ignorar"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["IdPadre"][$this->RowNumber]) && count($this->FormParameters["IdPadre"][$this->RowNumber])) || strlen($this->FormParameters["IdPadre"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["Id"][$this->RowNumber]) && count($this->FormParameters["Id"][$this->RowNumber])) || strlen($this->FormParameters["Id"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @166-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @166-909F269B
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

//UpdateGrid Method @166-36A832D4
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["Id"] = $this->CachedColumns["Id"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
            $this->IdPadre->SetText($this->FormParameters["IdPadre"][$this->RowNumber], $this->RowNumber);
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

//UpdateRow Method @166-EADDBB8E
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
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

//FormScript Method @166-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @166-4EB6C0EF
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

//GetFormState Method @166-D936D85E
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

//Show Method @166-AF7CF910
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
        $this->ControlsVisible["TipoRegistro"] = $this->TipoRegistro->Visible;
        $this->ControlsVisible["Estado"] = $this->Estado->Visible;
        $this->ControlsVisible["Tipo"] = $this->Tipo->Visible;
        $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
        $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
        $this->ControlsVisible["Ignorar"] = $this->Ignorar->Visible;
        $this->ControlsVisible["IdPadre"] = $this->IdPadre->Visible;
        $this->ControlsVisible["Id"] = $this->Id->Visible;
        $this->ControlsVisible["FechaInicioMov"] = $this->FechaInicioMov->Visible;
        $this->ControlsVisible["IdRelacionado"] = $this->IdRelacionado->Visible;
        $this->ControlsVisible["ProveedorPaq"] = $this->ProveedorPaq->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->CachedColumns["Id"][$this->RowNumber] = $this->DataSource->CachedColumns["Id"];
                    $this->TipoRegistro->SetValue($this->DataSource->TipoRegistro->GetValue());
                    $this->Estado->SetValue($this->DataSource->Estado->GetValue());
                    $this->Tipo->SetValue($this->DataSource->Tipo->GetValue());
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->Ignorar->SetValue($this->DataSource->Ignorar->GetValue());
                    $this->IdPadre->SetValue($this->DataSource->IdPadre->GetValue());
                    $this->Id->SetValue($this->DataSource->Id->GetValue());
                    $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                    $this->IdRelacionado->SetValue($this->DataSource->IdRelacionado->GetValue());
                    $this->ProveedorPaq->SetValue($this->DataSource->ProveedorPaq->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->TipoRegistro->SetText("");
                    $this->Estado->SetText("");
                    $this->Tipo->SetText("");
                    $this->Paquete->SetText("");
                    $this->Descripcion->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->IdRelacionado->SetText("");
                    $this->ProveedorPaq->SetText("");
                    $this->TipoRegistro->SetValue($this->DataSource->TipoRegistro->GetValue());
                    $this->Estado->SetValue($this->DataSource->Estado->GetValue());
                    $this->Tipo->SetValue($this->DataSource->Tipo->GetValue());
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                    $this->IdRelacionado->SetValue($this->DataSource->IdRelacionado->GetValue());
                    $this->ProveedorPaq->SetValue($this->DataSource->ProveedorPaq->GetValue());
                    $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
                    $this->IdPadre->SetText($this->FormParameters["IdPadre"][$this->RowNumber], $this->RowNumber);
                    $this->Id->SetText($this->FormParameters["Id"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->CachedColumns["Id"][$this->RowNumber] = "";
                    $this->TipoRegistro->SetText("");
                    $this->Estado->SetText("");
                    $this->Tipo->SetText("");
                    $this->Paquete->SetText("");
                    $this->Descripcion->SetText("");
                    $this->Ignorar->SetValue(false);
                    $this->IdPadre->SetText("");
                    $this->Id->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->IdRelacionado->SetText("");
                    $this->ProveedorPaq->SetText("");
                } else {
                    $this->TipoRegistro->SetText("");
                    $this->Estado->SetText("");
                    $this->Tipo->SetText("");
                    $this->Paquete->SetText("");
                    $this->Descripcion->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->IdRelacionado->SetText("");
                    $this->ProveedorPaq->SetText("");
                    $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
                    $this->IdPadre->SetText($this->FormParameters["IdPadre"][$this->RowNumber], $this->RowNumber);
                    $this->Id->SetText($this->FormParameters["Id"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->TipoRegistro->Show($this->RowNumber);
                $this->Estado->Show($this->RowNumber);
                $this->Tipo->Show($this->RowNumber);
                $this->Paquete->Show($this->RowNumber);
                $this->Descripcion->Show($this->RowNumber);
                $this->Ignorar->Show($this->RowNumber);
                $this->IdPadre->Show($this->RowNumber);
                $this->Id->Show($this->RowNumber);
                $this->FechaInicioMov->Show($this->RowNumber);
                $this->IdRelacionado->Show($this->RowNumber);
                $this->ProveedorPaq->Show($this->RowNumber);
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
        $this->Sorter_TipoRegistro->Show();
        $this->Sorter_Estado->Show();
        $this->Sorter_Tipo->Show();
        $this->Sorter_Paquete->Show();
        $this->Sorter_Descripcion->Show();
        $this->Sorter_Ignorar->Show();
        $this->Navigator->Show();
        $this->Button_Submit->Show();
        $this->Sorter1->Show();

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

} //End mc_info_detalle_hallazgos Class @166-FCB6E20C

class clsmc_info_detalle_hallazgosDataSource extends clsDBcnDisenio {  //mc_info_detalle_hallazgosDataSource Class @166-572F5980

//DataSource Variables @166-A425A02A
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $CountSQL;
    public $wp;
    public $AllParametersSet;

    public $CachedColumns;
    public $CurrentRow;
    public $UpdateFields = array();

    // Datasource fields
    public $TipoRegistro;
    public $Estado;
    public $Tipo;
    public $Paquete;
    public $Descripcion;
    public $Ignorar;
    public $IdPadre;
    public $Id;
    public $FechaInicioMov;
    public $IdRelacionado;
    public $ProveedorPaq;
//End DataSource Variables

//DataSourceClass_Initialize Event @166-33167EB3
    function clsmc_info_detalle_hallazgosDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid mc_info_detalle_hallazgos/Error";
        $this->Initialize();
        $this->TipoRegistro = new clsField("TipoRegistro", ccsText, "");
        
        $this->Estado = new clsField("Estado", ccsText, "");
        
        $this->Tipo = new clsField("Tipo", ccsText, "");
        
        $this->Paquete = new clsField("Paquete", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->Ignorar = new clsField("Ignorar", ccsBoolean, $this->BooleanFormat);
        
        $this->IdPadre = new clsField("IdPadre", ccsInteger, "");
        
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->FechaInicioMov = new clsField("FechaInicioMov", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->IdRelacionado = new clsField("IdRelacionado", ccsText, "");
        
        $this->ProveedorPaq = new clsField("ProveedorPaq", ccsText, "");
        

        $this->UpdateFields["Ignorar"] = array("Name" => "[Ignorar]", "Value" => "", "DataType" => ccsBoolean);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @166-799EE016
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_TipoRegistro" => array("TipoRegistro", ""), 
            "Sorter_Estado" => array("Estado", ""), 
            "Sorter_Tipo" => array("Tipo", ""), 
            "Sorter_Paquete" => array("Paquete", ""), 
            "Sorter_Descripcion" => array("Descripcion", ""), 
            "Sorter_Ignorar" => array("Ignorar", ""), 
            "Sorter1" => array("IdRelacionado", "")));
    }
//End SetOrder Method

//Prepare Method @166-DE684141
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId", ccsInteger, "", "", $this->Parameters["urlId"], 0, false);
        $this->wp->AddParameter("2", "expr313", ccsText, "", "", $this->Parameters["expr313"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @166-93A0B93D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT det.*, mc_c_proveedor.Nombre\n" .
        "FROM  mc_universo_cds u \n" .
        "	inner join mc_info_detalle_defectos_calidad  det on det.IdPadre = u.id \n" .
        "	INNER JOIN mc_detalle_PPMC_Defectos def ON\n" .
        "		det.IdRelacionado = def.ID_DEFECTO\n" .
        "		and def.ID_PPMC =  u.numero \n" .
        "		and MONTH(def.FECHA_CARGA )=u.mes  and YEAR(def.FECHA_CARGA ) = u.anio \n" .
        "	LEFT JOIN mc_c_proveedor ON\n" .
        "         det.id_ProveedorPaq = mc_c_proveedor.id_proveedor\n" .
        "WHERE u.id = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "AND det.TipoRegistro  = '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "'\n" .
        ") cnt";
        $this->SQL = "SELECT det.*, mc_c_proveedor.Nombre\n" .
        "FROM  mc_universo_cds u \n" .
        "	inner join mc_info_detalle_defectos_calidad  det on det.IdPadre = u.id \n" .
        "	INNER JOIN mc_detalle_PPMC_Defectos def ON\n" .
        "		det.IdRelacionado = def.ID_DEFECTO\n" .
        "		and def.ID_PPMC =  u.numero \n" .
        "		and MONTH(def.FECHA_CARGA )=u.mes  and YEAR(def.FECHA_CARGA ) = u.anio \n" .
        "	LEFT JOIN mc_c_proveedor ON\n" .
        "         det.id_ProveedorPaq = mc_c_proveedor.id_proveedor\n" .
        "WHERE u.id = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "AND det.TipoRegistro  = '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "'\n" .
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

//SetValues Method @166-CE290025
    function SetValues()
    {
        $this->CachedColumns["Id"] = $this->f("Id");
        $this->TipoRegistro->SetDBValue($this->f("TipoRegistro"));
        $this->Estado->SetDBValue($this->f("Estado"));
        $this->Tipo->SetDBValue($this->f("Tipo"));
        $this->Paquete->SetDBValue($this->f("Paquete"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->Ignorar->SetDBValue(trim($this->f("Ignorar")));
        $this->IdPadre->SetDBValue(trim($this->f("IdPadre")));
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->FechaInicioMov->SetDBValue(trim($this->f("FechaInicioMov")));
        $this->IdRelacionado->SetDBValue($this->f("IdRelacionado"));
        $this->ProveedorPaq->SetDBValue($this->f("Nombre"));
    }
//End SetValues Method

//Update Method @166-39506363
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["Ignorar"] = new clsSQLParameter("ctrlIgnorar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), $this->BooleanFormat, $this->Ignorar->GetValue(true), 0, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "dsId", ccsInteger, "", "", $this->CachedColumns["Id"], "", false);
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
        $this->SQL = CCBuildUpdate("mc_info_detalle_defectos_calidad", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End mc_info_detalle_hallazgosDataSource Class @166-FCB6E20C

class clsEditableGridmc_info_detalle_defectos { //mc_info_detalle_defectos Class @200-23781F11

//Variables @200-8A16021B

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
    public $Sorter_TipoRegistro;
    public $Sorter_Estado;
    public $Sorter_Tipo;
    public $Sorter_Paquete;
    public $Sorter_Descripcion;
    public $Sorter_Ignorar;
    public $Sorter1;
//End Variables

//Class_Initialize Event @200-6EB5C942
    function clsEditableGridmc_info_detalle_defectos($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid mc_info_detalle_defectos/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "mc_info_detalle_defectos";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->CachedColumns["id_proveedor"][0] = "id_proveedor";
        $this->CachedColumns["Id"][0] = "Id";
        $this->DataSource = new clsmc_info_detalle_defectosDataSource($this);
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

        $this->SorterName = CCGetParam("mc_info_detalle_defectosOrder", "");
        $this->SorterDirection = CCGetParam("mc_info_detalle_defectosDir", "");

        $this->Sorter_TipoRegistro = new clsSorter($this->ComponentName, "Sorter_TipoRegistro", $FileName, $this);
        $this->Sorter_Estado = new clsSorter($this->ComponentName, "Sorter_Estado", $FileName, $this);
        $this->Sorter_Tipo = new clsSorter($this->ComponentName, "Sorter_Tipo", $FileName, $this);
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_Ignorar = new clsSorter($this->ComponentName, "Sorter_Ignorar", $FileName, $this);
        $this->TipoRegistro = new clsControl(ccsLabel, "TipoRegistro", "TipoRegistro", ccsText, "", NULL, $this);
        $this->Estado = new clsControl(ccsLabel, "Estado", "Estado", ccsText, "", NULL, $this);
        $this->Tipo = new clsControl(ccsLabel, "Tipo", "Tipo", ccsText, "", NULL, $this);
        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", NULL, $this);
        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", NULL, $this);
        $this->Ignorar = new clsControl(ccsCheckBox, "Ignorar", "Ignorar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->Ignorar->CheckedValue = true;
        $this->Ignorar->UncheckedValue = false;
        $this->IdPadre = new clsControl(ccsHidden, "IdPadre", "Id Padre", ccsInteger, "", NULL, $this);
        $this->Id = new clsControl(ccsHidden, "Id", "Id", ccsInteger, "", NULL, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->IdRelacionado = new clsControl(ccsLabel, "IdRelacionado", "IdRelacionado", ccsText, "", NULL, $this);
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
        $this->ProveedorPaq = new clsControl(ccsLabel, "ProveedorPaq", "ProveedorPaq", ccsText, "", NULL, $this);
    }
//End Class_Initialize Event

//Initialize Method @200-9DEC5F90
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
        $this->DataSource->Parameters["expr307"] = 'Defecto';
    }
//End Initialize Method

//GetFormParameters Method @200-27CE6D6F
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["Ignorar"][$RowNumber] = CCGetFromPost("Ignorar_" . $RowNumber, NULL);
            $this->FormParameters["IdPadre"][$RowNumber] = CCGetFromPost("IdPadre_" . $RowNumber, NULL);
            $this->FormParameters["Id"][$RowNumber] = CCGetFromPost("Id_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @200-BEBDC77B
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["id_proveedor"] = $this->CachedColumns["id_proveedor"][$this->RowNumber];
            $this->DataSource->CachedColumns["Id"] = $this->CachedColumns["Id"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
            $this->IdPadre->SetText($this->FormParameters["IdPadre"][$this->RowNumber], $this->RowNumber);
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

//ValidateRow Method @200-D655E3CE
    function ValidateRow()
    {
        global $CCSLocales;
        $this->Ignorar->Validate();
        $this->IdPadre->Validate();
        $this->Id->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->Ignorar->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IdPadre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $this->Ignorar->Errors->Clear();
        $this->IdPadre->Errors->Clear();
        $this->Id->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @200-03B61A2D
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["Ignorar"][$this->RowNumber]) && count($this->FormParameters["Ignorar"][$this->RowNumber])) || strlen($this->FormParameters["Ignorar"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["IdPadre"][$this->RowNumber]) && count($this->FormParameters["IdPadre"][$this->RowNumber])) || strlen($this->FormParameters["IdPadre"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["Id"][$this->RowNumber]) && count($this->FormParameters["Id"][$this->RowNumber])) || strlen($this->FormParameters["Id"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @200-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @200-909F269B
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

//UpdateGrid Method @200-A173A8AE
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["id_proveedor"] = $this->CachedColumns["id_proveedor"][$this->RowNumber];
            $this->DataSource->CachedColumns["Id"] = $this->CachedColumns["Id"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
            $this->IdPadre->SetText($this->FormParameters["IdPadre"][$this->RowNumber], $this->RowNumber);
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

//UpdateRow Method @200-EADDBB8E
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
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

//FormScript Method @200-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @200-74077DDC
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
            for($i = 2; $i < sizeof($pieces); $i = $i + 2)  {
                $piece = $pieces[$i + 0];
                $piece = str_replace("\\" . ord("\\"), "\\", $piece);
                $piece = str_replace("\\" . ord(";"), ";", $piece);
                $this->CachedColumns["id_proveedor"][$RowNumber] = $piece;
                $piece = $pieces[$i + 1];
                $piece = str_replace("\\" . ord("\\"), "\\", $piece);
                $piece = str_replace("\\" . ord(";"), ";", $piece);
                $this->CachedColumns["Id"][$RowNumber] = $piece;
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $this->CachedColumns["id_proveedor"][$RowNumber] = "";
                $this->CachedColumns["Id"][$RowNumber] = "";
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @200-FAC955F6
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["id_proveedor"][$i]));
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["Id"][$i]));
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @200-0BCE8601
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
        $this->ControlsVisible["TipoRegistro"] = $this->TipoRegistro->Visible;
        $this->ControlsVisible["Estado"] = $this->Estado->Visible;
        $this->ControlsVisible["Tipo"] = $this->Tipo->Visible;
        $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
        $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
        $this->ControlsVisible["Ignorar"] = $this->Ignorar->Visible;
        $this->ControlsVisible["IdPadre"] = $this->IdPadre->Visible;
        $this->ControlsVisible["Id"] = $this->Id->Visible;
        $this->ControlsVisible["IdRelacionado"] = $this->IdRelacionado->Visible;
        $this->ControlsVisible["ProveedorPaq"] = $this->ProveedorPaq->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->CachedColumns["id_proveedor"][$this->RowNumber] = $this->DataSource->CachedColumns["id_proveedor"];
                    $this->CachedColumns["Id"][$this->RowNumber] = $this->DataSource->CachedColumns["Id"];
                    $this->TipoRegistro->SetValue($this->DataSource->TipoRegistro->GetValue());
                    $this->Estado->SetValue($this->DataSource->Estado->GetValue());
                    $this->Tipo->SetValue($this->DataSource->Tipo->GetValue());
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->Ignorar->SetValue($this->DataSource->Ignorar->GetValue());
                    $this->IdPadre->SetValue($this->DataSource->IdPadre->GetValue());
                    $this->Id->SetValue($this->DataSource->Id->GetValue());
                    $this->IdRelacionado->SetValue($this->DataSource->IdRelacionado->GetValue());
                    $this->ProveedorPaq->SetValue($this->DataSource->ProveedorPaq->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->TipoRegistro->SetText("");
                    $this->Estado->SetText("");
                    $this->Tipo->SetText("");
                    $this->Paquete->SetText("");
                    $this->Descripcion->SetText("");
                    $this->IdRelacionado->SetText("");
                    $this->ProveedorPaq->SetText("");
                    $this->TipoRegistro->SetValue($this->DataSource->TipoRegistro->GetValue());
                    $this->Estado->SetValue($this->DataSource->Estado->GetValue());
                    $this->Tipo->SetValue($this->DataSource->Tipo->GetValue());
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->IdRelacionado->SetValue($this->DataSource->IdRelacionado->GetValue());
                    $this->ProveedorPaq->SetValue($this->DataSource->ProveedorPaq->GetValue());
                    $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
                    $this->IdPadre->SetText($this->FormParameters["IdPadre"][$this->RowNumber], $this->RowNumber);
                    $this->Id->SetText($this->FormParameters["Id"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->CachedColumns["id_proveedor"][$this->RowNumber] = "";
                    $this->CachedColumns["Id"][$this->RowNumber] = "";
                    $this->TipoRegistro->SetText("");
                    $this->Estado->SetText("");
                    $this->Tipo->SetText("");
                    $this->Paquete->SetText("");
                    $this->Descripcion->SetText("");
                    $this->Ignorar->SetValue(false);
                    $this->IdPadre->SetText("");
                    $this->Id->SetText("");
                    $this->IdRelacionado->SetText("");
                    $this->ProveedorPaq->SetText("");
                } else {
                    $this->TipoRegistro->SetText("");
                    $this->Estado->SetText("");
                    $this->Tipo->SetText("");
                    $this->Paquete->SetText("");
                    $this->Descripcion->SetText("");
                    $this->IdRelacionado->SetText("");
                    $this->ProveedorPaq->SetText("");
                    $this->Ignorar->SetText($this->FormParameters["Ignorar"][$this->RowNumber], $this->RowNumber);
                    $this->IdPadre->SetText($this->FormParameters["IdPadre"][$this->RowNumber], $this->RowNumber);
                    $this->Id->SetText($this->FormParameters["Id"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->TipoRegistro->Show($this->RowNumber);
                $this->Estado->Show($this->RowNumber);
                $this->Tipo->Show($this->RowNumber);
                $this->Paquete->Show($this->RowNumber);
                $this->Descripcion->Show($this->RowNumber);
                $this->Ignorar->Show($this->RowNumber);
                $this->IdPadre->Show($this->RowNumber);
                $this->Id->Show($this->RowNumber);
                $this->IdRelacionado->Show($this->RowNumber);
                $this->ProveedorPaq->Show($this->RowNumber);
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
                        if (($this->DataSource->CachedColumns["id_proveedor"] == $this->CachedColumns["id_proveedor"][$this->RowNumber]) && ($this->DataSource->CachedColumns["Id"] == $this->CachedColumns["Id"][$this->RowNumber])) {
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
        $this->Sorter_TipoRegistro->Show();
        $this->Sorter_Estado->Show();
        $this->Sorter_Tipo->Show();
        $this->Sorter_Paquete->Show();
        $this->Sorter_Descripcion->Show();
        $this->Sorter_Ignorar->Show();
        $this->Navigator->Show();
        $this->Button_Submit->Show();
        $this->Sorter1->Show();

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

} //End mc_info_detalle_defectos Class @200-FCB6E20C

class clsmc_info_detalle_defectosDataSource extends clsDBcnDisenio {  //mc_info_detalle_defectosDataSource Class @200-D9CB7FD3

//DataSource Variables @200-8400A316
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $CountSQL;
    public $wp;
    public $AllParametersSet;

    public $CachedColumns;
    public $CurrentRow;
    public $UpdateFields = array();

    // Datasource fields
    public $TipoRegistro;
    public $Estado;
    public $Tipo;
    public $Paquete;
    public $Descripcion;
    public $Ignorar;
    public $IdPadre;
    public $Id;
    public $IdRelacionado;
    public $ProveedorPaq;
//End DataSource Variables

//DataSourceClass_Initialize Event @200-8DC490CC
    function clsmc_info_detalle_defectosDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid mc_info_detalle_defectos/Error";
        $this->Initialize();
        $this->TipoRegistro = new clsField("TipoRegistro", ccsText, "");
        
        $this->Estado = new clsField("Estado", ccsText, "");
        
        $this->Tipo = new clsField("Tipo", ccsText, "");
        
        $this->Paquete = new clsField("Paquete", ccsText, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->Ignorar = new clsField("Ignorar", ccsBoolean, $this->BooleanFormat);
        
        $this->IdPadre = new clsField("IdPadre", ccsInteger, "");
        
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->IdRelacionado = new clsField("IdRelacionado", ccsText, "");
        
        $this->ProveedorPaq = new clsField("ProveedorPaq", ccsText, "");
        

        $this->UpdateFields["Ignorar"] = array("Name" => "[Ignorar]", "Value" => "", "DataType" => ccsBoolean);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @200-799EE016
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_TipoRegistro" => array("TipoRegistro", ""), 
            "Sorter_Estado" => array("Estado", ""), 
            "Sorter_Tipo" => array("Tipo", ""), 
            "Sorter_Paquete" => array("Paquete", ""), 
            "Sorter_Descripcion" => array("Descripcion", ""), 
            "Sorter_Ignorar" => array("Ignorar", ""), 
            "Sorter1" => array("IdRelacionado", "")));
    }
//End SetOrder Method

//Prepare Method @200-B01B1F15
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId", ccsInteger, "", "", $this->Parameters["urlId"], "", false);
        $this->wp->AddParameter("2", "expr307", ccsText, "", "", $this->Parameters["expr307"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "mc_info_detalle_defectos_calidad.[IdPadre]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "mc_info_detalle_defectos_calidad.[TipoRegistro]", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @200-15B2530D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM mc_info_detalle_defectos_calidad LEFT JOIN mc_c_proveedor ON\n\n" .
        "mc_info_detalle_defectos_calidad.id_ProveedorPaq = mc_c_proveedor.id_proveedor";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} mc_info_detalle_defectos_calidad.*, nombre \n\n" .
        "FROM mc_info_detalle_defectos_calidad LEFT JOIN mc_c_proveedor ON\n\n" .
        "mc_info_detalle_defectos_calidad.id_ProveedorPaq = mc_c_proveedor.id_proveedor {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @200-C5F353F6
    function SetValues()
    {
        $this->CachedColumns["id_proveedor"] = $this->f("id_proveedor");
        $this->CachedColumns["Id"] = $this->f("Id");
        $this->TipoRegistro->SetDBValue($this->f("TipoRegistro"));
        $this->Estado->SetDBValue($this->f("Estado"));
        $this->Tipo->SetDBValue($this->f("Tipo"));
        $this->Paquete->SetDBValue($this->f("Paquete"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->Ignorar->SetDBValue(trim($this->f("Ignorar")));
        $this->IdPadre->SetDBValue(trim($this->f("IdPadre")));
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->IdRelacionado->SetDBValue($this->f("IdRelacionado"));
        $this->ProveedorPaq->SetDBValue($this->f("nombre"));
    }
//End SetValues Method

//Update Method @200-39506363
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["Ignorar"] = new clsSQLParameter("ctrlIgnorar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), $this->BooleanFormat, $this->Ignorar->GetValue(true), 0, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "dsId", ccsInteger, "", "", $this->CachedColumns["Id"], "", false);
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
        $this->SQL = CCBuildUpdate("mc_info_detalle_defectos_calidad", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End mc_info_detalle_defectosDataSource Class @200-FCB6E20C

class clsEditableGridEditableGrid1 { //EditableGrid1 Class @238-6C37505C

//Variables @238-0AADA924

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
//End Variables

//Class_Initialize Event @238-542614AE
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
            $this->PageSize = 5;
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

        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", NULL, $this);
        $this->c_rdl = new clsControl(ccsLabel, "c_rdl", "c_rdl", ccsInteger, "", NULL, $this);
        $this->Tipo = new clsControl(ccsLabel, "Tipo", "Tipo", ccsText, "", NULL, $this);
        $this->ciclo = new clsControl(ccsLabel, "ciclo", "ciclo", ccsInteger, "", NULL, $this);
        $this->considerar = new clsControl(ccsCheckBox, "considerar", "considerar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->considerar->CheckedValue = true;
        $this->considerar->UncheckedValue = false;
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->id_rec = new clsControl(ccsHidden, "id_rec", "id_rec", ccsInteger, "", NULL, $this);
        $this->FechaInicioMov = new clsControl(ccsLabel, "FechaInicioMov", "FechaInicioMov", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn"), NULL, $this);
        $this->Cierre = new clsControl(ccsLabel, "Cierre", "Cierre", ccsText, "", NULL, $this);
    }
//End Class_Initialize Event

//Initialize Method @238-6A4D3746
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
        $this->DataSource->Parameters["urlc_rdl"] = CCGetFromGet("c_rdl", NULL);
    }
//End Initialize Method

//GetFormParameters Method @238-3F33DEFB
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["considerar"][$RowNumber] = CCGetFromPost("considerar_" . $RowNumber, NULL);
            $this->FormParameters["id_rec"][$RowNumber] = CCGetFromPost("id_rec_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @238-50415B9A
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->considerar->SetText($this->FormParameters["considerar"][$this->RowNumber], $this->RowNumber);
            $this->id_rec->SetText($this->FormParameters["id_rec"][$this->RowNumber], $this->RowNumber);
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

//ValidateRow Method @238-C6AFA2A0
    function ValidateRow()
    {
        global $CCSLocales;
        $this->considerar->Validate();
        $this->id_rec->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->considerar->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_rec->Errors->ToString());
        $this->considerar->Errors->Clear();
        $this->id_rec->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @238-C83642E6
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["considerar"][$this->RowNumber]) && count($this->FormParameters["considerar"][$this->RowNumber])) || strlen($this->FormParameters["considerar"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["id_rec"][$this->RowNumber]) && count($this->FormParameters["id_rec"][$this->RowNumber])) || strlen($this->FormParameters["id_rec"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @238-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @238-909F269B
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

//UpdateGrid Method @238-98AF65FD
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->considerar->SetText($this->FormParameters["considerar"][$this->RowNumber], $this->RowNumber);
            $this->id_rec->SetText($this->FormParameters["id_rec"][$this->RowNumber], $this->RowNumber);
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

//UpdateRow Method @238-463921E2
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->considerar->SetValue($this->considerar->GetValue(true));
        $this->DataSource->id_rec->SetValue($this->id_rec->GetValue(true));
        $this->DataSource->id_rec->SetValue($this->id_rec->GetValue(true));
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

//FormScript Method @238-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @238-69E01441
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

//GetFormState Method @238-BF9CEBD0
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

//Show Method @238-7A50708E
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
        $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
        $this->ControlsVisible["c_rdl"] = $this->c_rdl->Visible;
        $this->ControlsVisible["Tipo"] = $this->Tipo->Visible;
        $this->ControlsVisible["ciclo"] = $this->ciclo->Visible;
        $this->ControlsVisible["considerar"] = $this->considerar->Visible;
        $this->ControlsVisible["id_rec"] = $this->id_rec->Visible;
        $this->ControlsVisible["FechaInicioMov"] = $this->FechaInicioMov->Visible;
        $this->ControlsVisible["Cierre"] = $this->Cierre->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->c_rdl->SetValue($this->DataSource->c_rdl->GetValue());
                    $this->Tipo->SetValue($this->DataSource->Tipo->GetValue());
                    $this->ciclo->SetValue($this->DataSource->ciclo->GetValue());
                    $this->considerar->SetValue($this->DataSource->considerar->GetValue());
                    $this->id_rec->SetValue($this->DataSource->id_rec->GetValue());
                    $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                    $this->Cierre->SetValue($this->DataSource->Cierre->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->Paquete->SetText("");
                    $this->c_rdl->SetText("");
                    $this->Tipo->SetText("");
                    $this->ciclo->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->Cierre->SetText("");
                    $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                    $this->c_rdl->SetValue($this->DataSource->c_rdl->GetValue());
                    $this->Tipo->SetValue($this->DataSource->Tipo->GetValue());
                    $this->ciclo->SetValue($this->DataSource->ciclo->GetValue());
                    $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                    $this->Cierre->SetValue($this->DataSource->Cierre->GetValue());
                    $this->considerar->SetText($this->FormParameters["considerar"][$this->RowNumber], $this->RowNumber);
                    $this->id_rec->SetText($this->FormParameters["id_rec"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->Paquete->SetText("");
                    $this->c_rdl->SetText("");
                    $this->Tipo->SetText("");
                    $this->ciclo->SetText("");
                    $this->considerar->SetValue(false);
                    $this->id_rec->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->Cierre->SetText("");
                } else {
                    $this->Paquete->SetText("");
                    $this->c_rdl->SetText("");
                    $this->Tipo->SetText("");
                    $this->ciclo->SetText("");
                    $this->FechaInicioMov->SetText("");
                    $this->Cierre->SetText("");
                    $this->considerar->SetText($this->FormParameters["considerar"][$this->RowNumber], $this->RowNumber);
                    $this->id_rec->SetText($this->FormParameters["id_rec"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Paquete->Show($this->RowNumber);
                $this->c_rdl->Show($this->RowNumber);
                $this->Tipo->Show($this->RowNumber);
                $this->ciclo->Show($this->RowNumber);
                $this->considerar->Show($this->RowNumber);
                $this->id_rec->Show($this->RowNumber);
                $this->FechaInicioMov->Show($this->RowNumber);
                $this->Cierre->Show($this->RowNumber);
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

} //End EditableGrid1 Class @238-FCB6E20C

class clsEditableGrid1DataSource extends clsDBcnDisenio {  //EditableGrid1DataSource Class @238-B35CAD29

//DataSource Variables @238-BC9D21F2
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

    // Datasource fields
    public $Paquete;
    public $c_rdl;
    public $Tipo;
    public $ciclo;
    public $considerar;
    public $id_rec;
    public $FechaInicioMov;
    public $Cierre;
//End DataSource Variables

//DataSourceClass_Initialize Event @238-DA7EA304
    function clsEditableGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid EditableGrid1/Error";
        $this->Initialize();
        $this->Paquete = new clsField("Paquete", ccsText, "");
        
        $this->c_rdl = new clsField("c_rdl", ccsInteger, "");
        
        $this->Tipo = new clsField("Tipo", ccsText, "");
        
        $this->ciclo = new clsField("ciclo", ccsInteger, "");
        
        $this->considerar = new clsField("considerar", ccsBoolean, $this->BooleanFormat);
        
        $this->id_rec = new clsField("id_rec", ccsInteger, "");
        
        $this->FechaInicioMov = new clsField("FechaInicioMov", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->Cierre = new clsField("Cierre", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @238-A140CAD6
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "det.ciclo, det.c_rdl, det.fechainiciomov, e.tipo ";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @238-98745294
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId", ccsInteger, "", "", $this->Parameters["urlId"], 0, false);
        $this->wp->AddParameter("2", "urlc_rdl", ccsInteger, "", "", $this->Parameters["urlc_rdl"], 0, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @238-90F78277
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT det.id id_rec, det.Paquete, det.ClaveMovimiento, det.c_rdl, det.PAQ_CVE_FOL, \n" .
        "		paq.FechaInicioMov,  det.considerar, e.Tipo, det.ciclo,\n" .
        "		(select top 1 DescMovimiento from mc_detalle_PPMC_avl paq2 where paq2.Paquete = det.Paquete and paq2.c_rdl = det.c_rdl and paq2.DescMovimiento like ('%Cerrado%')) Cierre\n" .
        "from mc_detalle_PPMC_Monitor_avl det\n" .
        "		inner join mc_detalle_PPMC_avl paq on paq.Paquete = det.Paquete and paq.c_rdl = det.c_rdl and paq.ClaveMovimiento in (16,500)\n" .
        "		and paq.ciclo = det.ciclo  and det.Id_PPMC = paq.Id_PPMC \n" .
        "		and month(paq.FechaCarga)= MONTH(det.FechaCarga )and year(paq.FechaCarga)= year(det.FechaCarga )\n" .
        "	inner JOIN mc_universo_cds ON det.Id_PPMC = mc_universo_cds.numero \n" .
        "	      and mc_universo_cds.mes = month(det.fechacarga) and mc_universo_cds.anio = year(det.fechacarga)\n" .
        "	      and mc_universo_cds.id_proveedor = det.Id_Proveedor \n" .
        "	left   join mc_c_Errores e on replace(e.Descripcion,' ','') = replace(det.Descripcion,' ','') --and e.AplicaCDS = 1 \n" .
        "where mc_universo_cds.id =  " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and (det.idpadre is null or det.idpadre = mc_universo_cds.id)) cnt";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} det.id id_rec, det.Paquete, det.ClaveMovimiento, det.c_rdl, det.PAQ_CVE_FOL, \n" .
        "		paq.FechaInicioMov,  det.considerar, e.Tipo, det.ciclo,\n" .
        "		(select top 1 DescMovimiento from mc_detalle_PPMC_avl paq2 where paq2.Paquete = det.Paquete and paq2.c_rdl = det.c_rdl and paq2.DescMovimiento like ('%Cerrado%')) Cierre\n" .
        "from mc_detalle_PPMC_Monitor_avl det\n" .
        "		inner join mc_detalle_PPMC_avl paq on paq.Paquete = det.Paquete and paq.c_rdl = det.c_rdl and paq.ClaveMovimiento in (16,500)\n" .
        "		and paq.ciclo = det.ciclo  and det.Id_PPMC = paq.Id_PPMC \n" .
        "		and month(paq.FechaCarga)= MONTH(det.FechaCarga )and year(paq.FechaCarga)= year(det.FechaCarga )\n" .
        "	inner JOIN mc_universo_cds ON det.Id_PPMC = mc_universo_cds.numero \n" .
        "	      and mc_universo_cds.mes = month(det.fechacarga) and mc_universo_cds.anio = year(det.fechacarga)\n" .
        "	      and mc_universo_cds.id_proveedor = det.Id_Proveedor \n" .
        "	left   join mc_c_Errores e on replace(e.Descripcion,' ','') = replace(det.Descripcion,' ','') --and e.AplicaCDS = 1 \n" .
        "where mc_universo_cds.id =  " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and (det.idpadre is null or det.idpadre = mc_universo_cds.id) {SQL_OrderBy}";
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

//SetValues Method @238-AF2878C1
    function SetValues()
    {
        $this->Paquete->SetDBValue($this->f("Paquete"));
        $this->c_rdl->SetDBValue(trim($this->f("c_rdl")));
        $this->Tipo->SetDBValue($this->f("Tipo"));
        $this->ciclo->SetDBValue(trim($this->f("ciclo")));
        $this->considerar->SetDBValue(trim($this->f("considerar")));
        $this->id_rec->SetDBValue(trim($this->f("id_rec")));
        $this->FechaInicioMov->SetDBValue(trim($this->f("FechaInicioMov")));
        $this->Cierre->SetDBValue($this->f("Cierre"));
    }
//End SetValues Method

//Update Method @238-2D2BAB6A
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["considerar"] = new clsSQLParameter("ctrlconsiderar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), $this->BooleanFormat, $this->considerar->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["id_rec"] = new clsSQLParameter("ctrlid_rec", ccsInteger, "", "", $this->id_rec->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["considerar"]->GetValue()) and !strlen($this->cp["considerar"]->GetText()) and !is_bool($this->cp["considerar"]->GetValue())) 
            $this->cp["considerar"]->SetValue($this->considerar->GetValue(true));
        if (!is_null($this->cp["id_rec"]->GetValue()) and !strlen($this->cp["id_rec"]->GetText()) and !is_bool($this->cp["id_rec"]->GetValue())) 
            $this->cp["id_rec"]->SetValue($this->id_rec->GetValue(true));
        if (!strlen($this->cp["id_rec"]->GetText()) and !is_bool($this->cp["id_rec"]->GetValue(true))) 
            $this->cp["id_rec"]->SetText(0);
        $this->SQL = "UPDATE mc_detalle_PPMC_Monitor_avl SET considerar='" . $this->SQLValue($this->cp["considerar"]->GetDBValue(), ccsBoolean) . "' WHERE  Id = " . $this->SQLValue($this->cp["id_rec"]->GetDBValue(), ccsInteger) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End EditableGrid1DataSource Class @238-FCB6E20C



//Initialize Page @1-A5343E7C
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
$TemplateFileName = "PPMCsCrbCalidad.html";
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

//Include events file @1-87480D3C
include_once("./PPMCsCrbCalidad_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-683D00E2
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$lDocs = new clsControl(ccsLabel, "lDocs", "lDocs", ccsText, "", CCGetRequestParam("lDocs", ccsGet, NULL), $MainPage);
$lDocs->HTML = true;
$mc_info_rs_cr_calidad = new clsRecordmc_info_rs_cr_calidad("", $MainPage);
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$lkAnterior = new clsControl(ccsLink, "lkAnterior", "lkAnterior", ccsText, "", CCGetRequestParam("lkAnterior", ccsGet, NULL), $MainPage);
$lkAnterior->Page = "PPMCsCrbCalidad.php";
$lkSiguiente = new clsControl(ccsLink, "lkSiguiente", "lkSiguiente", ccsText, "", CCGetRequestParam("lkSiguiente", ccsGet, NULL), $MainPage);
$lkSiguiente->Page = "PPMCsCrbCalidad.php";
$mc_info_detalle_hallazgos = new clsEditableGridmc_info_detalle_hallazgos("", $MainPage);
$mc_info_detalle_defectos = new clsEditableGridmc_info_detalle_defectos("", $MainPage);
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
$MainPage->lDocs = & $lDocs;
$MainPage->mc_info_rs_cr_calidad = & $mc_info_rs_cr_calidad;
$MainPage->Header = & $Header;
$MainPage->lkAnterior = & $lkAnterior;
$MainPage->lkSiguiente = & $lkSiguiente;
$MainPage->mc_info_detalle_hallazgos = & $mc_info_detalle_hallazgos;
$MainPage->mc_info_detalle_defectos = & $mc_info_detalle_defectos;
$MainPage->EditableGrid1 = & $EditableGrid1;
$MainPage->lkReqFun = & $lkReqFun;
$MainPage->lkCalidad = & $lkCalidad;
$MainPage->lkRetEnt_Calidad = & $lkRetEnt_Calidad;
$MainPage->lkCalidadCod = & $lkCalidadCod;
$MainPage->Link1 = & $Link1;
$lkReqFun->Parameters = "";
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "src", 1);
$mc_info_rs_cr_calidad->Initialize();
$mc_info_detalle_hallazgos->Initialize();
$mc_info_detalle_defectos->Initialize();
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

//Execute Components @1-AF2876E3
$EditableGrid1->Operation();
$mc_info_detalle_defectos->Operation();
$mc_info_detalle_hallazgos->Operation();
$Header->Operations();
$mc_info_rs_cr_calidad->Operation();
//End Execute Components

//Go to destination page @1-25F50584
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($mc_info_rs_cr_calidad);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_info_detalle_hallazgos);
    unset($mc_info_detalle_defectos);
    unset($EditableGrid1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-0AEB0488
$mc_info_rs_cr_calidad->Show();
$Header->Show();
$mc_info_detalle_hallazgos->Show();
$mc_info_detalle_defectos->Show();
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

//Unload Page @1-CD3730D4
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($mc_info_rs_cr_calidad);
$Header->Class_Terminate();
unset($Header);
unset($mc_info_detalle_hallazgos);
unset($mc_info_detalle_defectos);
unset($EditableGrid1);
unset($Tpl);
//End Unload Page


?>
