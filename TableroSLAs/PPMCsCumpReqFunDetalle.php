<?php
//Include Common Files @1-F8CF3A03
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsCumpReqFunDetalle.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_info_rs_cr_RF { //mc_info_rs_cr_RF Class @3-697396CF

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

//Class_Initialize Event @3-73A103C4
    function clsRecordmc_info_rs_cr_RF($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_rs_cr_RF/Error";
        $this->DataSource = new clsmc_info_rs_cr_RFDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_rs_cr_RF";
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
            $this->Id_PPMC = new clsControl(ccsHidden, "Id_PPMC", "Id PPMC", ccsInteger, "", CCGetRequestParam("Id_PPMC", $Method, NULL), $this);
            $this->Id_PPMC->Required = true;
            $this->ID_Estimacion = new clsControl(ccsHidden, "ID_Estimacion", "ID Estimacion", ccsInteger, "", CCGetRequestParam("ID_Estimacion", $Method, NULL), $this);
            $this->ID_Estimacion->Required = true;
            $this->Puntuacion = new clsControl(ccsTextBox, "Puntuacion", "Puntuacion", ccsFloat, "", CCGetRequestParam("Puntuacion", $Method, NULL), $this);
            $this->URLRepositorio = new clsControl(ccsTextBox, "URLRepositorio", "URLRepositorio", ccsText, "", CCGetRequestParam("URLRepositorio", $Method, NULL), $this);
            $this->FechaSubida = new clsControl(ccsTextBox, "FechaSubida", "Fecha Subida", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("FechaSubida", $Method, NULL), $this);
            $this->FechaSubida->Visible = false;
            $this->CumpleReqFun = new clsControl(ccsListBox, "CumpleReqFun", "Cumple Req Fun", ccsInteger, "", CCGetRequestParam("CumpleReqFun", $Method, NULL), $this);
            $this->CumpleReqFun->DSType = dsListOfValues;
            $this->CumpleReqFun->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsText, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->UsuarioUltMod = new clsControl(ccsHidden, "UsuarioUltMod", "Usuario Ult Mod", ccsText, "", CCGetRequestParam("UsuarioUltMod", $Method, NULL), $this);
            $this->FechaUltMod = new clsControl(ccsHidden, "FechaUltMod", "Fecha Ult Mod", ccsDate, array("ShortDate"), CCGetRequestParam("FechaUltMod", $Method, NULL), $this);
            $this->sId_PPMC = new clsControl(ccsLabel, "sId_PPMC", "sId_PPMC", ccsText, "", CCGetRequestParam("sId_PPMC", $Method, NULL), $this);
            $this->sID_Estimacion = new clsControl(ccsLabel, "sID_Estimacion", "sID_Estimacion", ccsText, "", CCGetRequestParam("sID_Estimacion", $Method, NULL), $this);
            $this->TienePonderacion = new clsControl(ccsCheckBox, "TienePonderacion", "TienePonderacion", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("TienePonderacion", $Method, NULL), $this);
            $this->TienePonderacion->CheckedValue = true;
            $this->TienePonderacion->UncheckedValue = false;
            $this->TieneCalificacion = new clsControl(ccsCheckBox, "TieneCalificacion", "TieneCalificacion", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("TieneCalificacion", $Method, NULL), $this);
            $this->TieneCalificacion->CheckedValue = true;
            $this->TieneCalificacion->UncheckedValue = false;
            $this->ListaenPDF = new clsControl(ccsCheckBox, "ListaenPDF", "ListaenPDF", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("ListaenPDF", $Method, NULL), $this);
            $this->ListaenPDF->CheckedValue = true;
            $this->ListaenPDF->UncheckedValue = false;
            $this->Id = new clsControl(ccsHidden, "Id", "Id", ccsText, "", CCGetRequestParam("Id", $Method, NULL), $this);
            $this->ListaenCAES = new clsControl(ccsCheckBox, "ListaenCAES", "ListaenCAES", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("ListaenCAES", $Method, NULL), $this);
            $this->ListaenCAES->CheckedValue = true;
            $this->ListaenCAES->UncheckedValue = false;
            $this->PublicacionCAES = new clsControl(ccsTextBox, "PublicacionCAES", "PublicacionCAES", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("PublicacionCAES", $Method, NULL), $this);
            $this->hdMes = new clsControl(ccsHidden, "hdMes", "hdMes", ccsText, "", CCGetRequestParam("hdMes", $Method, NULL), $this);
            $this->hdAnio = new clsControl(ccsHidden, "hdAnio", "hdAnio", ccsText, "", CCGetRequestParam("hdAnio", $Method, NULL), $this);
            $this->sNombreProyecto = new clsControl(ccsLabel, "sNombreProyecto", "sNombreProyecto", ccsText, "", CCGetRequestParam("sNombreProyecto", $Method, NULL), $this);
            $this->lTipoRequerimiento = new clsControl(ccsLabel, "lTipoRequerimiento", "lTipoRequerimiento", ccsText, "", CCGetRequestParam("lTipoRequerimiento", $Method, NULL), $this);
            $this->TotalRequisitos = new clsControl(ccsHidden, "TotalRequisitos", "Total Requisitos", ccsInteger, "", CCGetRequestParam("TotalRequisitos", $Method, NULL), $this);
            $this->lReportado = new clsControl(ccsLabel, "lReportado", "lReportado", ccsText, "", CCGetRequestParam("lReportado", $Method, NULL), $this);
            $this->SinDatosParaMedir = new clsControl(ccsCheckBox, "SinDatosParaMedir", "SinDatosParaMedir", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("SinDatosParaMedir", $Method, NULL), $this);
            $this->SinDatosParaMedir->CheckedValue = true;
            $this->SinDatosParaMedir->UncheckedValue = false;
            if(!$this->FormSubmitted) {
                if(!is_array($this->FechaSubida->Value) && !strlen($this->FechaSubida->Value) && $this->FechaSubida->Value !== false)
                    $this->FechaSubida->SetValue(time());
                if(!is_array($this->TienePonderacion->Value) && !strlen($this->TienePonderacion->Value) && $this->TienePonderacion->Value !== false)
                    $this->TienePonderacion->SetValue(false);
                if(!is_array($this->TieneCalificacion->Value) && !strlen($this->TieneCalificacion->Value) && $this->TieneCalificacion->Value !== false)
                    $this->TieneCalificacion->SetValue(false);
                if(!is_array($this->ListaenPDF->Value) && !strlen($this->ListaenPDF->Value) && $this->ListaenPDF->Value !== false)
                    $this->ListaenPDF->SetValue(false);
                if(!is_array($this->Id->Value) && !strlen($this->Id->Value) && $this->Id->Value !== false)
                    $this->Id->SetText(CCGetParam("Id"));
                if(!is_array($this->ListaenCAES->Value) && !strlen($this->ListaenCAES->Value) && $this->ListaenCAES->Value !== false)
                    $this->ListaenCAES->SetValue(false);
                if(!is_array($this->SinDatosParaMedir->Value) && !strlen($this->SinDatosParaMedir->Value) && $this->SinDatosParaMedir->Value !== false)
                    $this->SinDatosParaMedir->SetValue(false);
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

//Validate Method @3-285C8B06
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Id_PPMC->Validate() && $Validation);
        $Validation = ($this->ID_Estimacion->Validate() && $Validation);
        $Validation = ($this->Puntuacion->Validate() && $Validation);
        $Validation = ($this->URLRepositorio->Validate() && $Validation);
        $Validation = ($this->FechaSubida->Validate() && $Validation);
        $Validation = ($this->CumpleReqFun->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->UsuarioUltMod->Validate() && $Validation);
        $Validation = ($this->FechaUltMod->Validate() && $Validation);
        $Validation = ($this->TienePonderacion->Validate() && $Validation);
        $Validation = ($this->TieneCalificacion->Validate() && $Validation);
        $Validation = ($this->ListaenPDF->Validate() && $Validation);
        $Validation = ($this->Id->Validate() && $Validation);
        $Validation = ($this->ListaenCAES->Validate() && $Validation);
        $Validation = ($this->PublicacionCAES->Validate() && $Validation);
        $Validation = ($this->hdMes->Validate() && $Validation);
        $Validation = ($this->hdAnio->Validate() && $Validation);
        $Validation = ($this->TotalRequisitos->Validate() && $Validation);
        $Validation = ($this->SinDatosParaMedir->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Id_PPMC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ID_Estimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Puntuacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->URLRepositorio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaSubida->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumpleReqFun->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsuarioUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TienePonderacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TieneCalificacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListaenPDF->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListaenCAES->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PublicacionCAES->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdMes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdAnio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TotalRequisitos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SinDatosParaMedir->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-0607ABB3
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Id_PPMC->Errors->Count());
        $errors = ($errors || $this->ID_Estimacion->Errors->Count());
        $errors = ($errors || $this->Puntuacion->Errors->Count());
        $errors = ($errors || $this->URLRepositorio->Errors->Count());
        $errors = ($errors || $this->FechaSubida->Errors->Count());
        $errors = ($errors || $this->CumpleReqFun->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->UsuarioUltMod->Errors->Count());
        $errors = ($errors || $this->FechaUltMod->Errors->Count());
        $errors = ($errors || $this->sId_PPMC->Errors->Count());
        $errors = ($errors || $this->sID_Estimacion->Errors->Count());
        $errors = ($errors || $this->TienePonderacion->Errors->Count());
        $errors = ($errors || $this->TieneCalificacion->Errors->Count());
        $errors = ($errors || $this->ListaenPDF->Errors->Count());
        $errors = ($errors || $this->Id->Errors->Count());
        $errors = ($errors || $this->ListaenCAES->Errors->Count());
        $errors = ($errors || $this->PublicacionCAES->Errors->Count());
        $errors = ($errors || $this->hdMes->Errors->Count());
        $errors = ($errors || $this->hdAnio->Errors->Count());
        $errors = ($errors || $this->sNombreProyecto->Errors->Count());
        $errors = ($errors || $this->lTipoRequerimiento->Errors->Count());
        $errors = ($errors || $this->TotalRequisitos->Errors->Count());
        $errors = ($errors || $this->lReportado->Errors->Count());
        $errors = ($errors || $this->SinDatosParaMedir->Errors->Count());
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

//InsertRow Method @3-0A25E648
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Id_PPMC->SetValue($this->Id_PPMC->GetValue(true));
        $this->DataSource->ID_Estimacion->SetValue($this->ID_Estimacion->GetValue(true));
        $this->DataSource->Puntuacion->SetValue($this->Puntuacion->GetValue(true));
        $this->DataSource->URLRepositorio->SetValue($this->URLRepositorio->GetValue(true));
        $this->DataSource->FechaSubida->SetValue($this->FechaSubida->GetValue(true));
        $this->DataSource->CumpleReqFun->SetValue($this->CumpleReqFun->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->sId_PPMC->SetValue($this->sId_PPMC->GetValue(true));
        $this->DataSource->sID_Estimacion->SetValue($this->sID_Estimacion->GetValue(true));
        $this->DataSource->TienePonderacion->SetValue($this->TienePonderacion->GetValue(true));
        $this->DataSource->TieneCalificacion->SetValue($this->TieneCalificacion->GetValue(true));
        $this->DataSource->ListaenPDF->SetValue($this->ListaenPDF->GetValue(true));
        $this->DataSource->Id->SetValue($this->Id->GetValue(true));
        $this->DataSource->ListaenCAES->SetValue($this->ListaenCAES->GetValue(true));
        $this->DataSource->PublicacionCAES->SetValue($this->PublicacionCAES->GetValue(true));
        $this->DataSource->hdMes->SetValue($this->hdMes->GetValue(true));
        $this->DataSource->hdAnio->SetValue($this->hdAnio->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->lTipoRequerimiento->SetValue($this->lTipoRequerimiento->GetValue(true));
        $this->DataSource->TotalRequisitos->SetValue($this->TotalRequisitos->GetValue(true));
        $this->DataSource->lReportado->SetValue($this->lReportado->GetValue(true));
        $this->DataSource->SinDatosParaMedir->SetValue($this->SinDatosParaMedir->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-286D889D
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Id_PPMC->SetValue($this->Id_PPMC->GetValue(true));
        $this->DataSource->ID_Estimacion->SetValue($this->ID_Estimacion->GetValue(true));
        $this->DataSource->Puntuacion->SetValue($this->Puntuacion->GetValue(true));
        $this->DataSource->URLRepositorio->SetValue($this->URLRepositorio->GetValue(true));
        $this->DataSource->FechaSubida->SetValue($this->FechaSubida->GetValue(true));
        $this->DataSource->CumpleReqFun->SetValue($this->CumpleReqFun->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->sId_PPMC->SetValue($this->sId_PPMC->GetValue(true));
        $this->DataSource->sID_Estimacion->SetValue($this->sID_Estimacion->GetValue(true));
        $this->DataSource->TienePonderacion->SetValue($this->TienePonderacion->GetValue(true));
        $this->DataSource->TieneCalificacion->SetValue($this->TieneCalificacion->GetValue(true));
        $this->DataSource->ListaenPDF->SetValue($this->ListaenPDF->GetValue(true));
        $this->DataSource->Id->SetValue($this->Id->GetValue(true));
        $this->DataSource->ListaenCAES->SetValue($this->ListaenCAES->GetValue(true));
        $this->DataSource->PublicacionCAES->SetValue($this->PublicacionCAES->GetValue(true));
        $this->DataSource->hdMes->SetValue($this->hdMes->GetValue(true));
        $this->DataSource->hdAnio->SetValue($this->hdAnio->GetValue(true));
        $this->DataSource->sNombreProyecto->SetValue($this->sNombreProyecto->GetValue(true));
        $this->DataSource->lTipoRequerimiento->SetValue($this->lTipoRequerimiento->GetValue(true));
        $this->DataSource->TotalRequisitos->SetValue($this->TotalRequisitos->GetValue(true));
        $this->DataSource->lReportado->SetValue($this->lReportado->GetValue(true));
        $this->DataSource->SinDatosParaMedir->SetValue($this->SinDatosParaMedir->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @3-A21DECE3
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

        $this->CumpleReqFun->Prepare();

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
                    $this->Id_PPMC->SetValue($this->DataSource->Id_PPMC->GetValue());
                    $this->ID_Estimacion->SetValue($this->DataSource->ID_Estimacion->GetValue());
                    $this->Puntuacion->SetValue($this->DataSource->Puntuacion->GetValue());
                    $this->URLRepositorio->SetValue($this->DataSource->URLRepositorio->GetValue());
                    $this->FechaSubida->SetValue($this->DataSource->FechaSubida->GetValue());
                    $this->CumpleReqFun->SetValue($this->DataSource->CumpleReqFun->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                    $this->UsuarioUltMod->SetValue($this->DataSource->UsuarioUltMod->GetValue());
                    $this->FechaUltMod->SetValue($this->DataSource->FechaUltMod->GetValue());
                    $this->TienePonderacion->SetValue($this->DataSource->TienePonderacion->GetValue());
                    $this->TieneCalificacion->SetValue($this->DataSource->TieneCalificacion->GetValue());
                    $this->ListaenPDF->SetValue($this->DataSource->ListaenPDF->GetValue());
                    $this->Id->SetValue($this->DataSource->Id->GetValue());
                    $this->ListaenCAES->SetValue($this->DataSource->ListaenCAES->GetValue());
                    $this->PublicacionCAES->SetValue($this->DataSource->PublicacionCAES->GetValue());
                    $this->TotalRequisitos->SetValue($this->DataSource->TotalRequisitos->GetValue());
                    $this->SinDatosParaMedir->SetValue($this->DataSource->SinDatosParaMedir->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Id_PPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ID_Estimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Puntuacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->URLRepositorio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaSubida->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumpleReqFun->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsuarioUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sId_PPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sID_Estimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TienePonderacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TieneCalificacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListaenPDF->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListaenCAES->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PublicacionCAES->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdMes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdAnio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sNombreProyecto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lTipoRequerimiento->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TotalRequisitos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lReportado->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SinDatosParaMedir->Errors->ToString());
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
        $this->Id_PPMC->Show();
        $this->ID_Estimacion->Show();
        $this->Puntuacion->Show();
        $this->URLRepositorio->Show();
        $this->FechaSubida->Show();
        $this->CumpleReqFun->Show();
        $this->Observaciones->Show();
        $this->UsuarioUltMod->Show();
        $this->FechaUltMod->Show();
        $this->sId_PPMC->Show();
        $this->sID_Estimacion->Show();
        $this->TienePonderacion->Show();
        $this->TieneCalificacion->Show();
        $this->ListaenPDF->Show();
        $this->Id->Show();
        $this->ListaenCAES->Show();
        $this->PublicacionCAES->Show();
        $this->hdMes->Show();
        $this->hdAnio->Show();
        $this->sNombreProyecto->Show();
        $this->lTipoRequerimiento->Show();
        $this->TotalRequisitos->Show();
        $this->lReportado->Show();
        $this->SinDatosParaMedir->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_rs_cr_RF Class @3-FCB6E20C

class clsmc_info_rs_cr_RFDataSource extends clsDBcnDisenio {  //mc_info_rs_cr_RFDataSource Class @3-80E8CB29

//DataSource Variables @3-DC8A0CD0
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
    public $Id_PPMC;
    public $ID_Estimacion;
    public $Puntuacion;
    public $URLRepositorio;
    public $FechaSubida;
    public $CumpleReqFun;
    public $Observaciones;
    public $UsuarioUltMod;
    public $FechaUltMod;
    public $sId_PPMC;
    public $sID_Estimacion;
    public $TienePonderacion;
    public $TieneCalificacion;
    public $ListaenPDF;
    public $Id;
    public $ListaenCAES;
    public $PublicacionCAES;
    public $hdMes;
    public $hdAnio;
    public $sNombreProyecto;
    public $lTipoRequerimiento;
    public $TotalRequisitos;
    public $lReportado;
    public $SinDatosParaMedir;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-1282108D
    function clsmc_info_rs_cr_RFDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_rs_cr_RF/Error";
        $this->Initialize();
        $this->Id_PPMC = new clsField("Id_PPMC", ccsInteger, "");
        
        $this->ID_Estimacion = new clsField("ID_Estimacion", ccsInteger, "");
        
        $this->Puntuacion = new clsField("Puntuacion", ccsFloat, "");
        
        $this->URLRepositorio = new clsField("URLRepositorio", ccsText, "");
        
        $this->FechaSubida = new clsField("FechaSubida", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->CumpleReqFun = new clsField("CumpleReqFun", ccsInteger, "");
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->UsuarioUltMod = new clsField("UsuarioUltMod", ccsText, "");
        
        $this->FechaUltMod = new clsField("FechaUltMod", ccsDate, $this->DateFormat);
        
        $this->sId_PPMC = new clsField("sId_PPMC", ccsText, "");
        
        $this->sID_Estimacion = new clsField("sID_Estimacion", ccsText, "");
        
        $this->TienePonderacion = new clsField("TienePonderacion", ccsBoolean, $this->BooleanFormat);
        
        $this->TieneCalificacion = new clsField("TieneCalificacion", ccsBoolean, $this->BooleanFormat);
        
        $this->ListaenPDF = new clsField("ListaenPDF", ccsBoolean, $this->BooleanFormat);
        
        $this->Id = new clsField("Id", ccsText, "");
        
        $this->ListaenCAES = new clsField("ListaenCAES", ccsBoolean, $this->BooleanFormat);
        
        $this->PublicacionCAES = new clsField("PublicacionCAES", ccsDate, array("yyyy", "-", "mm", "-", "dd"));
        
        $this->hdMes = new clsField("hdMes", ccsText, "");
        
        $this->hdAnio = new clsField("hdAnio", ccsText, "");
        
        $this->sNombreProyecto = new clsField("sNombreProyecto", ccsText, "");
        
        $this->lTipoRequerimiento = new clsField("lTipoRequerimiento", ccsText, "");
        
        $this->TotalRequisitos = new clsField("TotalRequisitos", ccsInteger, "");
        
        $this->lReportado = new clsField("lReportado", ccsText, "");
        
        $this->SinDatosParaMedir = new clsField("SinDatosParaMedir", ccsBoolean, $this->BooleanFormat);
        

        $this->InsertFields["Id_PPMC"] = array("Name" => "[Id_PPMC]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["ID_Estimacion"] = array("Name" => "[ID_Estimacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Puntuacion"] = array("Name" => "[Puntuacion]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["URLRepositorio"] = array("Name" => "[URLRepositorio]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaSubida"] = array("Name" => "[FechaSubida]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["CumpleReqFun"] = array("Name" => "[CumpleReqFun]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["TienePonderacion"] = array("Name" => "[TienePonderacion]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["TieneCalificacion"] = array("Name" => "[TieneCalificacion]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["ListaenPDF"] = array("Name" => "[ListaenPDF]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["Id"] = array("Name" => "[Id]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ListaenCAES"] = array("Name" => "[ListaenCAES]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["PublicacionCAES"] = array("Name" => "[PublicacionCAES]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["TotalRequisitos"] = array("Name" => "[TotalRequisitos]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["SinDatosParaMedir"] = array("Name" => "[SinDatosParaMedir]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["Id_PPMC"] = array("Name" => "[Id_PPMC]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ID_Estimacion"] = array("Name" => "[ID_Estimacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Puntuacion"] = array("Name" => "[Puntuacion]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["URLRepositorio"] = array("Name" => "[URLRepositorio]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaSubida"] = array("Name" => "[FechaSubida]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumpleReqFun"] = array("Name" => "[CumpleReqFun]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["TienePonderacion"] = array("Name" => "[TienePonderacion]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["TieneCalificacion"] = array("Name" => "[TieneCalificacion]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["ListaenPDF"] = array("Name" => "[ListaenPDF]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["Id"] = array("Name" => "[Id]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ListaenCAES"] = array("Name" => "[ListaenCAES]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["PublicacionCAES"] = array("Name" => "[PublicacionCAES]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["TotalRequisitos"] = array("Name" => "[TotalRequisitos]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["SinDatosParaMedir"] = array("Name" => "[SinDatosParaMedir]", "Value" => "", "DataType" => ccsBoolean);
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

//Open Method @3-72A59F22
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_info_rs_cr_RF {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-26CA70E1
    function SetValues()
    {
        $this->Id_PPMC->SetDBValue(trim($this->f("Id_PPMC")));
        $this->ID_Estimacion->SetDBValue(trim($this->f("ID_Estimacion")));
        $this->Puntuacion->SetDBValue(trim($this->f("Puntuacion")));
        $this->URLRepositorio->SetDBValue($this->f("URLRepositorio"));
        $this->FechaSubida->SetDBValue(trim($this->f("FechaSubida")));
        $this->CumpleReqFun->SetDBValue(trim($this->f("CumpleReqFun")));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
        $this->UsuarioUltMod->SetDBValue($this->f("UsuarioUltMod"));
        $this->FechaUltMod->SetDBValue(trim($this->f("FechaUltMod")));
        $this->TienePonderacion->SetDBValue(trim($this->f("TienePonderacion")));
        $this->TieneCalificacion->SetDBValue(trim($this->f("TieneCalificacion")));
        $this->ListaenPDF->SetDBValue(trim($this->f("ListaenPDF")));
        $this->Id->SetDBValue($this->f("Id"));
        $this->ListaenCAES->SetDBValue(trim($this->f("ListaenCAES")));
        $this->PublicacionCAES->SetDBValue(trim($this->f("PublicacionCAES")));
        $this->TotalRequisitos->SetDBValue(trim($this->f("TotalRequisitos")));
        $this->SinDatosParaMedir->SetDBValue(trim($this->f("SinDatosParaMedir")));
    }
//End SetValues Method

//Insert Method @3-62F7E2D5
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Id_PPMC"]["Value"] = $this->Id_PPMC->GetDBValue(true);
        $this->InsertFields["ID_Estimacion"]["Value"] = $this->ID_Estimacion->GetDBValue(true);
        $this->InsertFields["Puntuacion"]["Value"] = $this->Puntuacion->GetDBValue(true);
        $this->InsertFields["URLRepositorio"]["Value"] = $this->URLRepositorio->GetDBValue(true);
        $this->InsertFields["FechaSubida"]["Value"] = $this->FechaSubida->GetDBValue(true);
        $this->InsertFields["CumpleReqFun"]["Value"] = $this->CumpleReqFun->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->InsertFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->InsertFields["FechaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->InsertFields["TienePonderacion"]["Value"] = $this->TienePonderacion->GetDBValue(true);
        $this->InsertFields["TieneCalificacion"]["Value"] = $this->TieneCalificacion->GetDBValue(true);
        $this->InsertFields["ListaenPDF"]["Value"] = $this->ListaenPDF->GetDBValue(true);
        $this->InsertFields["Id"]["Value"] = $this->Id->GetDBValue(true);
        $this->InsertFields["ListaenCAES"]["Value"] = $this->ListaenCAES->GetDBValue(true);
        $this->InsertFields["PublicacionCAES"]["Value"] = $this->PublicacionCAES->GetDBValue(true);
        $this->InsertFields["TotalRequisitos"]["Value"] = $this->TotalRequisitos->GetDBValue(true);
        $this->InsertFields["SinDatosParaMedir"]["Value"] = $this->SinDatosParaMedir->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_info_rs_cr_RF", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-1C4B42EA
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Id_PPMC"]["Value"] = $this->Id_PPMC->GetDBValue(true);
        $this->UpdateFields["ID_Estimacion"]["Value"] = $this->ID_Estimacion->GetDBValue(true);
        $this->UpdateFields["Puntuacion"]["Value"] = $this->Puntuacion->GetDBValue(true);
        $this->UpdateFields["URLRepositorio"]["Value"] = $this->URLRepositorio->GetDBValue(true);
        $this->UpdateFields["FechaSubida"]["Value"] = $this->FechaSubida->GetDBValue(true);
        $this->UpdateFields["CumpleReqFun"]["Value"] = $this->CumpleReqFun->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->UpdateFields["FechaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->UpdateFields["TienePonderacion"]["Value"] = $this->TienePonderacion->GetDBValue(true);
        $this->UpdateFields["TieneCalificacion"]["Value"] = $this->TieneCalificacion->GetDBValue(true);
        $this->UpdateFields["ListaenPDF"]["Value"] = $this->ListaenPDF->GetDBValue(true);
        $this->UpdateFields["Id"]["Value"] = $this->Id->GetDBValue(true);
        $this->UpdateFields["ListaenCAES"]["Value"] = $this->ListaenCAES->GetDBValue(true);
        $this->UpdateFields["PublicacionCAES"]["Value"] = $this->PublicacionCAES->GetDBValue(true);
        $this->UpdateFields["TotalRequisitos"]["Value"] = $this->TotalRequisitos->GetDBValue(true);
        $this->UpdateFields["SinDatosParaMedir"]["Value"] = $this->SinDatosParaMedir->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_rs_cr_RF", $this->UpdateFields, $this);
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

} //End mc_info_rs_cr_RFDataSource Class @3-FCB6E20C

//Initialize Page @1-676C177B
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
$TemplateFileName = "PPMCsCumpReqFunDetalle.html";
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

//Include events file @1-7A9517AA
include_once("./PPMCsCumpReqFunDetalle_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-D10D0817
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_info_rs_cr_RF = new clsRecordmc_info_rs_cr_RF("", $MainPage);
$lkAnterior = new clsControl(ccsLink, "lkAnterior", "lkAnterior", ccsText, "", CCGetRequestParam("lkAnterior", ccsGet, NULL), $MainPage);
$lkAnterior->Page = "PPMCsCumpReqFunDetalle.php";
$lkSiguiente = new clsControl(ccsLink, "lkSiguiente", "lkSiguiente", ccsText, "", CCGetRequestParam("lkSiguiente", ccsGet, NULL), $MainPage);
$lkSiguiente->Page = "PPMCsCumpReqFunDetalle.php";
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
$MainPage->mc_info_rs_cr_RF = & $mc_info_rs_cr_RF;
$MainPage->lkAnterior = & $lkAnterior;
$MainPage->lkSiguiente = & $lkSiguiente;
$MainPage->lkReqFun = & $lkReqFun;
$MainPage->lkCalidad = & $lkCalidad;
$MainPage->lkRetEnt_Calidad = & $lkRetEnt_Calidad;
$MainPage->lkCalidadCod = & $lkCalidadCod;
$MainPage->Link1 = & $Link1;
$lkReqFun->Parameters = "";
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "src", 1);
$mc_info_rs_cr_RF->Initialize();
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

//Execute Components @1-B1BA1B2D
$mc_info_rs_cr_RF->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-565052CE
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_info_rs_cr_RF);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-7FDA4209
$Header->Show();
$mc_info_rs_cr_RF->Show();
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

//Unload Page @1-AA0C838C
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_info_rs_cr_RF);
unset($Tpl);
//End Unload Page


?>
