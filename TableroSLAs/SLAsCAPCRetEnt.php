<?php
//Include Common Files @1-D6F68C55
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "SLAsCAPCRetEnt.php");
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

//Class_Initialize Event @3-D87ECEF6
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
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
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
            $this->id_serviciocont = new clsControl(ccsListBox, "id_serviciocont", "Id Serviciocont", ccsInteger, "", CCGetRequestParam("id_serviciocont", $Method, NULL), $this);
            $this->id_serviciocont->DSType = dsTable;
            $this->id_serviciocont->DataSource = new clsDBcnDisenio();
            $this->id_serviciocont->ds = & $this->id_serviciocont->DataSource;
            $this->id_serviciocont->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_ServContractual {SQL_Where} {SQL_OrderBy}";
            list($this->id_serviciocont->BoundColumn, $this->id_serviciocont->TextColumn, $this->id_serviciocont->DBFormat) = array("Id", "Descripcion", "");
            $this->id_serviciocont->DataSource->Parameters["expr44"] = 'CAPC';
            $this->id_serviciocont->DataSource->wp = new clsSQLParameters();
            $this->id_serviciocont->DataSource->wp->AddParameter("1", "expr44", ccsText, "", "", $this->id_serviciocont->DataSource->Parameters["expr44"], "", false);
            $this->id_serviciocont->DataSource->wp->Criterion[1] = $this->id_serviciocont->DataSource->wp->Operation(opEqual, "[Aplica]", $this->id_serviciocont->DataSource->wp->GetDBValue("1"), $this->id_serviciocont->DataSource->ToSQL($this->id_serviciocont->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->id_serviciocont->DataSource->Where = 
                 $this->id_serviciocont->DataSource->wp->Criterion[1];
            $this->URLEntregables = new clsControl(ccsTextArea, "URLEntregables", "URLEntregables", ccsText, "", CCGetRequestParam("URLEntregables", $Method, NULL), $this);
            $this->CAPFirmada = new clsControl(ccsCheckBox, "CAPFirmada", "CAPFirmada", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("CAPFirmada", $Method, NULL), $this);
            $this->CAPFirmada->CheckedValue = true;
            $this->CAPFirmada->UncheckedValue = false;
            $this->FechaFirmaCAES = new clsControl(ccsTextBox, "FechaFirmaCAES", "FechaFirmaCAES", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("FechaFirmaCAES", $Method, NULL), $this);
            $this->DiasRetrasoHabiles = new clsControl(ccsTextBox, "DiasRetrasoHabiles", "DiasRetrasoHabiles", ccsFloat, array(False, 2, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("DiasRetrasoHabiles", $Method, NULL), $this);
            $this->DiasRetrasoNaturales = new clsControl(ccsTextBox, "DiasRetrasoNaturales", "DiasRetrasoNaturales", ccsFloat, array(False, 2, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("DiasRetrasoNaturales", $Method, NULL), $this);
            $this->PctMaximo = new clsControl(ccsTextBox, "PctMaximo", "PctMaximo", ccsFloat, "", CCGetRequestParam("PctMaximo", $Method, NULL), $this);
            $this->DiasPlaneados = new clsControl(ccsTextBox, "DiasPlaneados", "DiasPlaneados", ccsFloat, array(False, 2, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("DiasPlaneados", $Method, NULL), $this);
            $this->DiasReales = new clsControl(ccsTextBox, "DiasReales", "DiasReales", ccsFloat, array(False, 2, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("DiasReales", $Method, NULL), $this);
            $this->DiasReales->Visible = false;
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
            $this->paquetes_cerrados = new clsControl(ccsCheckBox, "paquetes_cerrados", "paquetes_cerrados", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("paquetes_cerrados", $Method, NULL), $this);
            $this->paquetes_cerrados->CheckedValue = true;
            $this->paquetes_cerrados->UncheckedValue = false;
            $this->RETR_ENTREGABLE = new clsControl(ccsListBox, "RETR_ENTREGABLE", "RETR ENTREGABLE", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("RETR_ENTREGABLE", $Method, NULL), $this);
            $this->RETR_ENTREGABLE->DSType = dsListOfValues;
            $this->RETR_ENTREGABLE->Values = array(array("1", "Cumple"), array("0", "No Cumple"));
            $this->btnCalcular = new clsButton("btnCalcular", $Method, $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->id_proveedor->Value) && !strlen($this->id_proveedor->Value) && $this->id_proveedor->Value !== false)
                    $this->id_proveedor->SetText(1);
                if(!is_array($this->CAPFirmada->Value) && !strlen($this->CAPFirmada->Value) && $this->CAPFirmada->Value !== false)
                    $this->CAPFirmada->SetValue(false);
                if(!is_array($this->SLO->Value) && !strlen($this->SLO->Value) && $this->SLO->Value !== false)
                    $this->SLO->SetValue(false);
                if(!is_array($this->paquetes_cerrados->Value) && !strlen($this->paquetes_cerrados->Value) && $this->paquetes_cerrados->Value !== false)
                    $this->paquetes_cerrados->SetValue(false);
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

//Validate Method @3-FE2ACC15
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
        $Validation = ($this->id_serviciocont->Validate() && $Validation);
        $Validation = ($this->URLEntregables->Validate() && $Validation);
        $Validation = ($this->CAPFirmada->Validate() && $Validation);
        $Validation = ($this->FechaFirmaCAES->Validate() && $Validation);
        $Validation = ($this->DiasRetrasoHabiles->Validate() && $Validation);
        $Validation = ($this->DiasRetrasoNaturales->Validate() && $Validation);
        $Validation = ($this->PctMaximo->Validate() && $Validation);
        $Validation = ($this->DiasPlaneados->Validate() && $Validation);
        $Validation = ($this->DiasReales->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->IdEstimacion->Validate() && $Validation);
        $Validation = ($this->id_tipo->Validate() && $Validation);
        $Validation = ($this->SLO->Validate() && $Validation);
        $Validation = ($this->paquetes_cerrados->Validate() && $Validation);
        $Validation = ($this->RETR_ENTREGABLE->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->numero->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Descripcion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Agrupador->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_serviciocont->Errors->Count() == 0);
        $Validation =  $Validation && ($this->URLEntregables->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CAPFirmada->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaFirmaCAES->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiasRetrasoHabiles->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiasRetrasoNaturales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PctMaximo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiasPlaneados->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DiasReales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IdEstimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_tipo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SLO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->paquetes_cerrados->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RETR_ENTREGABLE->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-19126359
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->numero->Errors->Count());
        $errors = ($errors || $this->Descripcion->Errors->Count());
        $errors = ($errors || $this->mes->Errors->Count());
        $errors = ($errors || $this->anio->Errors->Count());
        $errors = ($errors || $this->Agrupador->Errors->Count());
        $errors = ($errors || $this->id_serviciocont->Errors->Count());
        $errors = ($errors || $this->URLEntregables->Errors->Count());
        $errors = ($errors || $this->CAPFirmada->Errors->Count());
        $errors = ($errors || $this->FechaFirmaCAES->Errors->Count());
        $errors = ($errors || $this->DiasRetrasoHabiles->Errors->Count());
        $errors = ($errors || $this->DiasRetrasoNaturales->Errors->Count());
        $errors = ($errors || $this->PctMaximo->Errors->Count());
        $errors = ($errors || $this->DiasPlaneados->Errors->Count());
        $errors = ($errors || $this->DiasReales->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->IdEstimacion->Errors->Count());
        $errors = ($errors || $this->id_tipo->Errors->Count());
        $errors = ($errors || $this->SLO->Errors->Count());
        $errors = ($errors || $this->paquetes_cerrados->Errors->Count());
        $errors = ($errors || $this->RETR_ENTREGABLE->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-02E2496D
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
            } else if($this->PressedButton == "btnCalcular") {
                $Redirect = "SLAsCAPCRetEnt.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @3-EC29A8FF
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
        $this->DataSource->id_serviciocont->SetValue($this->id_serviciocont->GetValue(true));
        $this->DataSource->URLEntregables->SetValue($this->URLEntregables->GetValue(true));
        $this->DataSource->CAPFirmada->SetValue($this->CAPFirmada->GetValue(true));
        $this->DataSource->FechaFirmaCAES->SetValue($this->FechaFirmaCAES->GetValue(true));
        $this->DataSource->DiasRetrasoHabiles->SetValue($this->DiasRetrasoHabiles->GetValue(true));
        $this->DataSource->DiasRetrasoNaturales->SetValue($this->DiasRetrasoNaturales->GetValue(true));
        $this->DataSource->PctMaximo->SetValue($this->PctMaximo->GetValue(true));
        $this->DataSource->DiasPlaneados->SetValue($this->DiasPlaneados->GetValue(true));
        $this->DataSource->DiasReales->SetValue($this->DiasReales->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->IdEstimacion->SetValue($this->IdEstimacion->GetValue(true));
        $this->DataSource->id_tipo->SetValue($this->id_tipo->GetValue(true));
        $this->DataSource->SLO->SetValue($this->SLO->GetValue(true));
        $this->DataSource->paquetes_cerrados->SetValue($this->paquetes_cerrados->GetValue(true));
        $this->DataSource->RETR_ENTREGABLE->SetValue($this->RETR_ENTREGABLE->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-29810C4F
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
        $this->DataSource->id_serviciocont->SetValue($this->id_serviciocont->GetValue(true));
        $this->DataSource->URLEntregables->SetValue($this->URLEntregables->GetValue(true));
        $this->DataSource->CAPFirmada->SetValue($this->CAPFirmada->GetValue(true));
        $this->DataSource->FechaFirmaCAES->SetValue($this->FechaFirmaCAES->GetValue(true));
        $this->DataSource->DiasRetrasoHabiles->SetValue($this->DiasRetrasoHabiles->GetValue(true));
        $this->DataSource->DiasRetrasoNaturales->SetValue($this->DiasRetrasoNaturales->GetValue(true));
        $this->DataSource->PctMaximo->SetValue($this->PctMaximo->GetValue(true));
        $this->DataSource->DiasPlaneados->SetValue($this->DiasPlaneados->GetValue(true));
        $this->DataSource->DiasReales->SetValue($this->DiasReales->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->IdEstimacion->SetValue($this->IdEstimacion->GetValue(true));
        $this->DataSource->id_tipo->SetValue($this->id_tipo->GetValue(true));
        $this->DataSource->SLO->SetValue($this->SLO->GetValue(true));
        $this->DataSource->paquetes_cerrados->SetValue($this->paquetes_cerrados->GetValue(true));
        $this->DataSource->RETR_ENTREGABLE->SetValue($this->RETR_ENTREGABLE->GetValue(true));
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

//Show Method @3-CD952FD1
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
        $this->id_serviciocont->Prepare();
        $this->id_tipo->Prepare();
        $this->RETR_ENTREGABLE->Prepare();

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
                    $this->id_serviciocont->SetValue($this->DataSource->id_serviciocont->GetValue());
                    $this->URLEntregables->SetValue($this->DataSource->URLEntregables->GetValue());
                    $this->CAPFirmada->SetValue($this->DataSource->CAPFirmada->GetValue());
                    $this->FechaFirmaCAES->SetValue($this->DataSource->FechaFirmaCAES->GetValue());
                    $this->DiasRetrasoHabiles->SetValue($this->DataSource->DiasRetrasoHabiles->GetValue());
                    $this->DiasRetrasoNaturales->SetValue($this->DataSource->DiasRetrasoNaturales->GetValue());
                    $this->PctMaximo->SetValue($this->DataSource->PctMaximo->GetValue());
                    $this->DiasPlaneados->SetValue($this->DataSource->DiasPlaneados->GetValue());
                    $this->DiasReales->SetValue($this->DataSource->DiasReales->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                    $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                    $this->id_tipo->SetValue($this->DataSource->id_tipo->GetValue());
                    $this->SLO->SetValue($this->DataSource->SLO->GetValue());
                    $this->paquetes_cerrados->SetValue($this->DataSource->paquetes_cerrados->GetValue());
                    $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
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
            $Error = ComposeStrings($Error, $this->id_serviciocont->Errors->ToString());
            $Error = ComposeStrings($Error, $this->URLEntregables->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CAPFirmada->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaFirmaCAES->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiasRetrasoHabiles->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiasRetrasoNaturales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PctMaximo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiasPlaneados->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DiasReales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IdEstimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_tipo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SLO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->paquetes_cerrados->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RETR_ENTREGABLE->Errors->ToString());
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
        $this->Descripcion->Show();
        $this->mes->Show();
        $this->anio->Show();
        $this->Agrupador->Show();
        $this->id_serviciocont->Show();
        $this->URLEntregables->Show();
        $this->CAPFirmada->Show();
        $this->FechaFirmaCAES->Show();
        $this->DiasRetrasoHabiles->Show();
        $this->DiasRetrasoNaturales->Show();
        $this->PctMaximo->Show();
        $this->DiasPlaneados->Show();
        $this->DiasReales->Show();
        $this->Observaciones->Show();
        $this->IdEstimacion->Show();
        $this->id_tipo->Show();
        $this->SLO->Show();
        $this->paquetes_cerrados->Show();
        $this->RETR_ENTREGABLE->Show();
        $this->btnCalcular->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_calificacion_capc Class @3-FCB6E20C

class clsmc_calificacion_capcDataSource extends clsDBcnDisenio {  //mc_calificacion_capcDataSource Class @3-68AE7315

//DataSource Variables @3-22D6ED00
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
    public $id_serviciocont;
    public $URLEntregables;
    public $CAPFirmada;
    public $FechaFirmaCAES;
    public $DiasRetrasoHabiles;
    public $DiasRetrasoNaturales;
    public $PctMaximo;
    public $DiasPlaneados;
    public $DiasReales;
    public $Observaciones;
    public $IdEstimacion;
    public $id_tipo;
    public $SLO;
    public $paquetes_cerrados;
    public $RETR_ENTREGABLE;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-5A4C2943
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
        
        $this->id_serviciocont = new clsField("id_serviciocont", ccsInteger, "");
        
        $this->URLEntregables = new clsField("URLEntregables", ccsText, "");
        
        $this->CAPFirmada = new clsField("CAPFirmada", ccsBoolean, $this->BooleanFormat);
        
        $this->FechaFirmaCAES = new clsField("FechaFirmaCAES", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->DiasRetrasoHabiles = new clsField("DiasRetrasoHabiles", ccsFloat, "");
        
        $this->DiasRetrasoNaturales = new clsField("DiasRetrasoNaturales", ccsFloat, "");
        
        $this->PctMaximo = new clsField("PctMaximo", ccsFloat, "");
        
        $this->DiasPlaneados = new clsField("DiasPlaneados", ccsFloat, "");
        
        $this->DiasReales = new clsField("DiasReales", ccsFloat, "");
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsText, "");
        
        $this->id_tipo = new clsField("id_tipo", ccsText, "");
        
        $this->SLO = new clsField("SLO", ccsInteger, "");
        
        $this->paquetes_cerrados = new clsField("paquetes_cerrados", ccsBoolean, $this->BooleanFormat);
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsBoolean, $this->BooleanFormat);
        

        $this->InsertFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["numero"] = array("Name" => "numero", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["mes"] = array("Name" => "mes", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["anio"] = array("Name" => "anio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Agrupador"] = array("Name" => "[Agrupador]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["id_serviciocont"] = array("Name" => "id_serviciocont", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["urlentregables"] = array("Name" => "urlentregables", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CAPFirmada"] = array("Name" => "[CAPFirmada]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["FechaFirmaCAES"] = array("Name" => "[FechaFirmaCAES]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasRetrasoHabiles"] = array("Name" => "[DiasRetrasoHabiles]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasRetrasoNaturales"] = array("Name" => "[DiasRetrasoNaturales]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["PctMaximo"] = array("Name" => "[PctMaximo]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasPlaneados"] = array("Name" => "[DiasPlaneados]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["DiasReales"] = array("Name" => "[DiasReales]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["IdEstimacion"] = array("Name" => "[IdEstimacion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["id_tipo"] = array("Name" => "id_tipo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SLO"] = array("Name" => "SLO", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["paquetes_cerrados"] = array("Name" => "paquetes_cerrados", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["RETR_ENTREGABLE"] = array("Name" => "RETR_ENTREGABLE", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["numero"] = array("Name" => "numero", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["mes"] = array("Name" => "mes", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["anio"] = array("Name" => "anio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Agrupador"] = array("Name" => "[Agrupador]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_serviciocont"] = array("Name" => "id_serviciocont", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["urlentregables"] = array("Name" => "urlentregables", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CAPFirmada"] = array("Name" => "[CAPFirmada]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["FechaFirmaCAES"] = array("Name" => "[FechaFirmaCAES]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasRetrasoHabiles"] = array("Name" => "[DiasRetrasoHabiles]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasRetrasoNaturales"] = array("Name" => "[DiasRetrasoNaturales]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["PctMaximo"] = array("Name" => "[PctMaximo]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasPlaneados"] = array("Name" => "[DiasPlaneados]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["DiasReales"] = array("Name" => "[DiasReales]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["IdEstimacion"] = array("Name" => "[IdEstimacion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_tipo"] = array("Name" => "id_tipo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SLO"] = array("Name" => "SLO", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["paquetes_cerrados"] = array("Name" => "paquetes_cerrados", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["RETR_ENTREGABLE"] = array("Name" => "RETR_ENTREGABLE", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
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

//SetValues Method @3-452D8695
    function SetValues()
    {
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->numero->SetDBValue($this->f("numero"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->mes->SetDBValue(trim($this->f("mes")));
        $this->anio->SetDBValue(trim($this->f("anio")));
        $this->Agrupador->SetDBValue($this->f("Agrupador"));
        $this->id_serviciocont->SetDBValue(trim($this->f("id_serviciocont")));
        $this->URLEntregables->SetDBValue($this->f("urlentregables"));
        $this->CAPFirmada->SetDBValue(trim($this->f("CAPFirmada")));
        $this->FechaFirmaCAES->SetDBValue(trim($this->f("FechaFirmaCAES")));
        $this->DiasRetrasoHabiles->SetDBValue(trim($this->f("DiasRetrasoHabiles")));
        $this->DiasRetrasoNaturales->SetDBValue(trim($this->f("DiasRetrasoNaturales")));
        $this->PctMaximo->SetDBValue(trim($this->f("PctMaximo")));
        $this->DiasPlaneados->SetDBValue(trim($this->f("DiasPlaneados")));
        $this->DiasReales->SetDBValue(trim($this->f("DiasReales")));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
        $this->IdEstimacion->SetDBValue($this->f("IdEstimacion"));
        $this->id_tipo->SetDBValue($this->f("id_tipo"));
        $this->SLO->SetDBValue(trim($this->f("SLO")));
        $this->paquetes_cerrados->SetDBValue(trim($this->f("paquetes_cerrados")));
        $this->RETR_ENTREGABLE->SetDBValue(trim($this->f("RETR_ENTREGABLE")));
    }
//End SetValues Method

//Insert Method @3-07BF41FC
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
        $this->InsertFields["id_serviciocont"]["Value"] = $this->id_serviciocont->GetDBValue(true);
        $this->InsertFields["urlentregables"]["Value"] = $this->URLEntregables->GetDBValue(true);
        $this->InsertFields["CAPFirmada"]["Value"] = $this->CAPFirmada->GetDBValue(true);
        $this->InsertFields["FechaFirmaCAES"]["Value"] = $this->FechaFirmaCAES->GetDBValue(true);
        $this->InsertFields["DiasRetrasoHabiles"]["Value"] = $this->DiasRetrasoHabiles->GetDBValue(true);
        $this->InsertFields["DiasRetrasoNaturales"]["Value"] = $this->DiasRetrasoNaturales->GetDBValue(true);
        $this->InsertFields["PctMaximo"]["Value"] = $this->PctMaximo->GetDBValue(true);
        $this->InsertFields["DiasPlaneados"]["Value"] = $this->DiasPlaneados->GetDBValue(true);
        $this->InsertFields["DiasReales"]["Value"] = $this->DiasReales->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->InsertFields["IdEstimacion"]["Value"] = $this->IdEstimacion->GetDBValue(true);
        $this->InsertFields["id_tipo"]["Value"] = $this->id_tipo->GetDBValue(true);
        $this->InsertFields["SLO"]["Value"] = $this->SLO->GetDBValue(true);
        $this->InsertFields["paquetes_cerrados"]["Value"] = $this->paquetes_cerrados->GetDBValue(true);
        $this->InsertFields["RETR_ENTREGABLE"]["Value"] = $this->RETR_ENTREGABLE->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_calificacion_capc", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-3769A627
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
        $this->UpdateFields["id_serviciocont"]["Value"] = $this->id_serviciocont->GetDBValue(true);
        $this->UpdateFields["urlentregables"]["Value"] = $this->URLEntregables->GetDBValue(true);
        $this->UpdateFields["CAPFirmada"]["Value"] = $this->CAPFirmada->GetDBValue(true);
        $this->UpdateFields["FechaFirmaCAES"]["Value"] = $this->FechaFirmaCAES->GetDBValue(true);
        $this->UpdateFields["DiasRetrasoHabiles"]["Value"] = $this->DiasRetrasoHabiles->GetDBValue(true);
        $this->UpdateFields["DiasRetrasoNaturales"]["Value"] = $this->DiasRetrasoNaturales->GetDBValue(true);
        $this->UpdateFields["PctMaximo"]["Value"] = $this->PctMaximo->GetDBValue(true);
        $this->UpdateFields["DiasPlaneados"]["Value"] = $this->DiasPlaneados->GetDBValue(true);
        $this->UpdateFields["DiasReales"]["Value"] = $this->DiasReales->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->UpdateFields["IdEstimacion"]["Value"] = $this->IdEstimacion->GetDBValue(true);
        $this->UpdateFields["id_tipo"]["Value"] = $this->id_tipo->GetDBValue(true);
        $this->UpdateFields["SLO"]["Value"] = $this->SLO->GetDBValue(true);
        $this->UpdateFields["paquetes_cerrados"]["Value"] = $this->paquetes_cerrados->GetDBValue(true);
        $this->UpdateFields["RETR_ENTREGABLE"]["Value"] = $this->RETR_ENTREGABLE->GetDBValue(true);
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

class clsGridmc_info_capc_cr_RE_Artefa { //mc_info_capc_cr_RE_Artefa class @77-3AD43B5E

//Variables @77-D7CB6747

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
    public $Sorter_Id;
    public $Sorter_Nombre;
    public $Sorter_Descripcion;
    public $Sorter_Formato;
    public $Sorter_NombreConHerramienta;
    public $Sorter_FechaEstFin;
    public $Sorter_FechaEntrega;
    public $Sorter_DiasHabilesDesviacion;
    public $Sorter_DiasNaturalesDesviacion;
    public $Sorter_DiasHabilesReales;
    public $Sorter_PctDeductiva;
//End Variables

//Class_Initialize Event @77-B77F4EC8
    function clsGridmc_info_capc_cr_RE_Artefa($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_info_capc_cr_RE_Artefa";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_info_capc_cr_RE_Artefa";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_info_capc_cr_RE_ArtefaDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("mc_info_capc_cr_RE_ArtefaOrder", "");
        $this->SorterDirection = CCGetParam("mc_info_capc_cr_RE_ArtefaDir", "");

        $this->Id = new clsControl(ccsLabel, "Id", "Id", ccsInteger, "", CCGetRequestParam("Id", ccsGet, NULL), $this);
        $this->Nombre = new clsControl(ccsLabel, "Nombre", "Nombre", ccsText, "", CCGetRequestParam("Nombre", ccsGet, NULL), $this);
        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", ccsGet, NULL), $this);
        $this->Formato = new clsControl(ccsLabel, "Formato", "Formato", ccsText, "", CCGetRequestParam("Formato", ccsGet, NULL), $this);
        $this->NombreConHerramienta = new clsControl(ccsLabel, "NombreConHerramienta", "NombreConHerramienta", ccsText, "", CCGetRequestParam("NombreConHerramienta", ccsGet, NULL), $this);
        $this->FechaEstFin = new clsControl(ccsLabel, "FechaEstFin", "FechaEstFin", ccsDate, array("ShortDate"), CCGetRequestParam("FechaEstFin", ccsGet, NULL), $this);
        $this->FechaEntrega = new clsControl(ccsLabel, "FechaEntrega", "FechaEntrega", ccsDate, array("ShortDate"), CCGetRequestParam("FechaEntrega", ccsGet, NULL), $this);
        $this->DiasHabilesDesviacion = new clsControl(ccsLabel, "DiasHabilesDesviacion", "DiasHabilesDesviacion", ccsInteger, "", CCGetRequestParam("DiasHabilesDesviacion", ccsGet, NULL), $this);
        $this->DiasNaturalesDesviacion = new clsControl(ccsLabel, "DiasNaturalesDesviacion", "DiasNaturalesDesviacion", ccsInteger, "", CCGetRequestParam("DiasNaturalesDesviacion", ccsGet, NULL), $this);
        $this->Comentarios = new clsControl(ccsLabel, "Comentarios", "Comentarios", ccsMemo, "", CCGetRequestParam("Comentarios", ccsGet, NULL), $this);
        $this->DiasHabilesReales = new clsControl(ccsLabel, "DiasHabilesReales", "DiasHabilesReales", ccsInteger, "", CCGetRequestParam("DiasHabilesReales", ccsGet, NULL), $this);
        $this->PctDeductiva = new clsControl(ccsLabel, "PctDeductiva", "PctDeductiva", ccsFloat, "", CCGetRequestParam("PctDeductiva", ccsGet, NULL), $this);
        $this->Sorter_Id = new clsSorter($this->ComponentName, "Sorter_Id", $FileName, $this);
        $this->Sorter_Nombre = new clsSorter($this->ComponentName, "Sorter_Nombre", $FileName, $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_Formato = new clsSorter($this->ComponentName, "Sorter_Formato", $FileName, $this);
        $this->Sorter_NombreConHerramienta = new clsSorter($this->ComponentName, "Sorter_NombreConHerramienta", $FileName, $this);
        $this->Sorter_FechaEstFin = new clsSorter($this->ComponentName, "Sorter_FechaEstFin", $FileName, $this);
        $this->Sorter_FechaEntrega = new clsSorter($this->ComponentName, "Sorter_FechaEntrega", $FileName, $this);
        $this->Sorter_DiasHabilesDesviacion = new clsSorter($this->ComponentName, "Sorter_DiasHabilesDesviacion", $FileName, $this);
        $this->Sorter_DiasNaturalesDesviacion = new clsSorter($this->ComponentName, "Sorter_DiasNaturalesDesviacion", $FileName, $this);
        $this->Sorter_DiasHabilesReales = new clsSorter($this->ComponentName, "Sorter_DiasHabilesReales", $FileName, $this);
        $this->Sorter_PctDeductiva = new clsSorter($this->ComponentName, "Sorter_PctDeductiva", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @77-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @77-85DE9E6C
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlid"] = CCGetFromGet("id", NULL);

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
            $this->ControlsVisible["Id"] = $this->Id->Visible;
            $this->ControlsVisible["Nombre"] = $this->Nombre->Visible;
            $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
            $this->ControlsVisible["Formato"] = $this->Formato->Visible;
            $this->ControlsVisible["NombreConHerramienta"] = $this->NombreConHerramienta->Visible;
            $this->ControlsVisible["FechaEstFin"] = $this->FechaEstFin->Visible;
            $this->ControlsVisible["FechaEntrega"] = $this->FechaEntrega->Visible;
            $this->ControlsVisible["DiasHabilesDesviacion"] = $this->DiasHabilesDesviacion->Visible;
            $this->ControlsVisible["DiasNaturalesDesviacion"] = $this->DiasNaturalesDesviacion->Visible;
            $this->ControlsVisible["Comentarios"] = $this->Comentarios->Visible;
            $this->ControlsVisible["DiasHabilesReales"] = $this->DiasHabilesReales->Visible;
            $this->ControlsVisible["PctDeductiva"] = $this->PctDeductiva->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Id->SetValue($this->DataSource->Id->GetValue());
                $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                $this->Formato->SetValue($this->DataSource->Formato->GetValue());
                $this->NombreConHerramienta->SetValue($this->DataSource->NombreConHerramienta->GetValue());
                $this->FechaEstFin->SetValue($this->DataSource->FechaEstFin->GetValue());
                $this->FechaEntrega->SetValue($this->DataSource->FechaEntrega->GetValue());
                $this->DiasHabilesDesviacion->SetValue($this->DataSource->DiasHabilesDesviacion->GetValue());
                $this->DiasNaturalesDesviacion->SetValue($this->DataSource->DiasNaturalesDesviacion->GetValue());
                $this->Comentarios->SetValue($this->DataSource->Comentarios->GetValue());
                $this->DiasHabilesReales->SetValue($this->DataSource->DiasHabilesReales->GetValue());
                $this->PctDeductiva->SetValue($this->DataSource->PctDeductiva->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id->Show();
                $this->Nombre->Show();
                $this->Descripcion->Show();
                $this->Formato->Show();
                $this->NombreConHerramienta->Show();
                $this->FechaEstFin->Show();
                $this->FechaEntrega->Show();
                $this->DiasHabilesDesviacion->Show();
                $this->DiasNaturalesDesviacion->Show();
                $this->Comentarios->Show();
                $this->DiasHabilesReales->Show();
                $this->PctDeductiva->Show();
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
        $this->Sorter_Id->Show();
        $this->Sorter_Nombre->Show();
        $this->Sorter_Descripcion->Show();
        $this->Sorter_Formato->Show();
        $this->Sorter_NombreConHerramienta->Show();
        $this->Sorter_FechaEstFin->Show();
        $this->Sorter_FechaEntrega->Show();
        $this->Sorter_DiasHabilesDesviacion->Show();
        $this->Sorter_DiasNaturalesDesviacion->Show();
        $this->Sorter_DiasHabilesReales->Show();
        $this->Sorter_PctDeductiva->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @77-499818C1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Formato->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NombreConHerramienta->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaEstFin->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaEntrega->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DiasHabilesDesviacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DiasNaturalesDesviacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Comentarios->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DiasHabilesReales->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PctDeductiva->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_info_capc_cr_RE_Artefa Class @77-FCB6E20C

class clsmc_info_capc_cr_RE_ArtefaDataSource extends clsDBcnDisenio {  //mc_info_capc_cr_RE_ArtefaDataSource Class @77-6058CA3B

//DataSource Variables @77-5B5B33AE
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


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
    public $Comentarios;
    public $DiasHabilesReales;
    public $PctDeductiva;
//End DataSource Variables

//DataSourceClass_Initialize Event @77-9EDFA00E
    function clsmc_info_capc_cr_RE_ArtefaDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_info_capc_cr_RE_Artefa";
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
        
        $this->Comentarios = new clsField("Comentarios", ccsMemo, "");
        
        $this->DiasHabilesReales = new clsField("DiasHabilesReales", ccsInteger, "");
        
        $this->PctDeductiva = new clsField("PctDeductiva", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @77-E0E019B3
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
            "Sorter_DiasHabilesReales" => array("DiasHabilesReales", ""), 
            "Sorter_PctDeductiva" => array("PctDeductiva", "")));
    }
//End SetOrder Method

//Prepare Method @77-3CAF2A5D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlid", ccsInteger, "", "", $this->Parameters["urlid"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[Id_Padre]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @77-052A4ED2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM mc_info_rs_cr_RE_RC_Artefacto_CAPC";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} * \n\n" .
        "FROM mc_info_rs_cr_RE_RC_Artefacto_CAPC {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @77-AA4E3BD0
    function SetValues()
    {
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->Formato->SetDBValue($this->f("Formato"));
        $this->NombreConHerramienta->SetDBValue($this->f("NombreConHerramienta"));
        $this->FechaEstFin->SetDBValue(trim($this->f("FechaEstFin")));
        $this->FechaEntrega->SetDBValue(trim($this->f("FechaEntrega")));
        $this->DiasHabilesDesviacion->SetDBValue(trim($this->f("DiasHabilesDesviacion")));
        $this->DiasNaturalesDesviacion->SetDBValue(trim($this->f("DiasNaturalesDesviacion")));
        $this->Comentarios->SetDBValue($this->f("Comentarios"));
        $this->DiasHabilesReales->SetDBValue(trim($this->f("DiasHabilesReales")));
        $this->PctDeductiva->SetDBValue(trim($this->f("PctDeductiva")));
    }
//End SetValues Method

} //End mc_info_capc_cr_RE_ArtefaDataSource Class @77-FCB6E20C

//Initialize Page @1-FD70CF26
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
$TemplateFileName = "SLAsCAPCRetEnt.html";
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

//Include events file @1-18561F95
include_once("./SLAsCAPCRetEnt_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-625B27F7
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_calificacion_capc = new clsRecordmc_calificacion_capc("", $MainPage);
$mc_info_capc_cr_RE_Artefa = new clsGridmc_info_capc_cr_RE_Artefa("", $MainPage);
$Panel1 = new clsPanel("Panel1", $MainPage);
$lErrores = new clsControl(ccsLabel, "lErrores", "lErrores", ccsText, "", CCGetRequestParam("lErrores", ccsGet, NULL), $MainPage);
$lkAnterior = new clsControl(ccsLink, "lkAnterior", "lkAnterior", ccsText, "", CCGetRequestParam("lkAnterior", ccsGet, NULL), $MainPage);
$lkAnterior->Page = "SLAsCAPCRetEnt.php";
$lkSiguiente = new clsControl(ccsLink, "lkSiguiente", "lkSiguiente", ccsText, "", CCGetRequestParam("lkSiguiente", ccsGet, NULL), $MainPage);
$lkSiguiente->Page = "SLAsCAPCRetEnt.php";
$lkCumplimiento = new clsControl(ccsLink, "lkCumplimiento", "lkCumplimiento", ccsText, "", CCGetRequestParam("lkCumplimiento", ccsGet, NULL), $MainPage);
$lkCumplimiento->Parameters = CCAddParam($lkCumplimiento->Parameters, "sID", CCGetFromGet("id", NULL));
$lkCumplimiento->Page = "SLAsCAPCReqFunDetalle.php";
$lkCalidad = new clsControl(ccsLink, "lkCalidad", "lkCalidad", ccsText, "", CCGetRequestParam("lkCalidad", ccsGet, NULL), $MainPage);
$lkCalidad->Parameters = CCAddParam($lkCalidad->Parameters, "Id", CCGetFromGet("id", NULL));
$lkCalidad->Page = "PPMCsCrbCalidadCAPC.php";
$lkDeductiva = new clsControl(ccsLink, "lkDeductiva", "lkDeductiva", ccsText, "", CCGetRequestParam("lkDeductiva", ccsGet, NULL), $MainPage);
$lkDeductiva->Parameters = CCAddParam($lkDeductiva->Parameters, "id", CCGetFromGet("id", NULL));
$lkDeductiva->Page = "SLAsCAPCDetalle.php";
$MainPage->Header = & $Header;
$MainPage->mc_calificacion_capc = & $mc_calificacion_capc;
$MainPage->mc_info_capc_cr_RE_Artefa = & $mc_info_capc_cr_RE_Artefa;
$MainPage->Panel1 = & $Panel1;
$MainPage->lErrores = & $lErrores;
$MainPage->lkAnterior = & $lkAnterior;
$MainPage->lkSiguiente = & $lkSiguiente;
$MainPage->lkCumplimiento = & $lkCumplimiento;
$MainPage->lkCalidad = & $lkCalidad;
$MainPage->lkDeductiva = & $lkDeductiva;
$mc_calificacion_capc->Initialize();
$mc_info_capc_cr_RE_Artefa->Initialize();
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

//Go to destination page @1-59457102
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_calificacion_capc);
    unset($mc_info_capc_cr_RE_Artefa);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-F9E56B12
$Header->Show();
$mc_calificacion_capc->Show();
$mc_info_capc_cr_RE_Artefa->Show();
$Panel1->Show();
$lErrores->Show();
$lkAnterior->Show();
$lkSiguiente->Show();
$lkCumplimiento->Show();
$lkCalidad->Show();
$lkDeductiva->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-9CB6A13F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_calificacion_capc);
unset($mc_info_capc_cr_RE_Artefa);
unset($Tpl);
//End Unload Page


?>
