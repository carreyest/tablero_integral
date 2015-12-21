<?php
//Include Common Files @1-1CE44E1E
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsCrInfoGeneral.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_calificacion_rs_MC { //mc_calificacion_rs_MC Class @3-58DA90F6

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

//Class_Initialize Event @3-4055A3E8
    function clsRecordmc_calificacion_rs_MC($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_calificacion_rs_MC/Error";
        $this->DataSource = new clsmc_calificacion_rs_MCDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_calificacion_rs_MC";
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
            $this->id_ppmc = new clsControl(ccsLabel, "id_ppmc", "Id Ppmc", ccsInteger, "", CCGetRequestParam("id_ppmc", $Method, NULL), $this);
            $this->NombreProveedor = new clsControl(ccsLabel, "NombreProveedor", "Id Proveedor", ccsText, "", CCGetRequestParam("NombreProveedor", $Method, NULL), $this);
            $this->id_servicio_cont = new clsControl(ccsListBox, "id_servicio_cont", "Servicio Contractual", ccsInteger, "", CCGetRequestParam("id_servicio_cont", $Method, NULL), $this);
            $this->id_servicio_cont->DSType = dsTable;
            $this->id_servicio_cont->DataSource = new clsDBcnDisenio();
            $this->id_servicio_cont->ds = & $this->id_servicio_cont->DataSource;
            $this->id_servicio_cont->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_ServContractual {SQL_Where} {SQL_OrderBy}";
            list($this->id_servicio_cont->BoundColumn, $this->id_servicio_cont->TextColumn, $this->id_servicio_cont->DBFormat) = array("Id", "Descripcion", "");
            $this->id_servicio_cont->DataSource->Parameters["expr114"] = 'CDS';
            $this->id_servicio_cont->DataSource->wp = new clsSQLParameters();
            $this->id_servicio_cont->DataSource->wp->AddParameter("1", "expr114", ccsText, "", "", $this->id_servicio_cont->DataSource->Parameters["expr114"], "", false);
            $this->id_servicio_cont->DataSource->wp->Criterion[1] = $this->id_servicio_cont->DataSource->wp->Operation(opEqual, "[Aplica]", $this->id_servicio_cont->DataSource->wp->GetDBValue("1"), $this->id_servicio_cont->DataSource->ToSQL($this->id_servicio_cont->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->id_servicio_cont->DataSource->Where = 
                 $this->id_servicio_cont->DataSource->wp->Criterion[1];
            $this->id_servicio_cont->Required = true;
            $this->id_servicio_negocio = new clsControl(ccsListBox, "id_servicio_negocio", "Servicio de Negocio", ccsInteger, "", CCGetRequestParam("id_servicio_negocio", $Method, NULL), $this);
            $this->id_servicio_negocio->DSType = dsSQL;
            $this->id_servicio_negocio->DataSource = new clsDBcnDisenio();
            $this->id_servicio_negocio->ds = & $this->id_servicio_negocio->DataSource;
            list($this->id_servicio_negocio->BoundColumn, $this->id_servicio_negocio->TextColumn, $this->id_servicio_negocio->DBFormat) = array("id_servicio", "nombre", "");
            $this->id_servicio_negocio->DataSource->SQL = "select id_servicio, nombre\n" .
            "from mc_c_servicio where id_tipo_servicio=2 {SQL_OrderBy}";
            $this->id_servicio_negocio->DataSource->Order = "nombre";
            $this->id_servicio_negocio->Required = true;
            $this->id_tipo = new clsControl(ccsListBox, "id_tipo", "Tipo de Requerimiento", ccsInteger, "", CCGetRequestParam("id_tipo", $Method, NULL), $this);
            $this->id_tipo->DSType = dsTable;
            $this->id_tipo->DataSource = new clsDBcnDisenio();
            $this->id_tipo->ds = & $this->id_tipo->DataSource;
            $this->id_tipo->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_TipoPPMC {SQL_Where} {SQL_OrderBy}";
            list($this->id_tipo->BoundColumn, $this->id_tipo->TextColumn, $this->id_tipo->DBFormat) = array("Id", "Descripcion", "");
            $this->descripci_n = new clsControl(ccsTextBox, "descripci_n", "Descripción", ccsText, "", CCGetRequestParam("descripci_n", $Method, NULL), $this);
            $this->Obs_manuales = new clsControl(ccsTextArea, "Obs_manuales", "Obs Manuales", ccsText, "", CCGetRequestParam("Obs_manuales", $Method, NULL), $this);
            $this->MesReporte = new clsControl(ccsHidden, "MesReporte", "Mes Reporte", ccsInteger, "", CCGetRequestParam("MesReporte", $Method, NULL), $this);
            $this->MesReporte->Required = true;
            $this->AnioReporte = new clsControl(ccsHidden, "AnioReporte", "Anio Reporte", ccsInteger, "", CCGetRequestParam("AnioReporte", $Method, NULL), $this);
            $this->AnioReporte->Required = true;
            $this->ppmc_adicional = new clsControl(ccsTextBox, "ppmc_adicional", "Ppmc Adicional", ccsText, "", CCGetRequestParam("ppmc_adicional", $Method, NULL), $this);
            $this->UrlEvidencia = new clsControl(ccsTextArea, "UrlEvidencia", "Url Evidencia", ccsText, "", CCGetRequestParam("UrlEvidencia", $Method, NULL), $this);
            $this->UCOS = new clsControl(ccsTextBox, "UCOS", "UCOS", ccsFloat, "", CCGetRequestParam("UCOS", $Method, NULL), $this);
            $this->UCOS->Required = true;
            $this->IdEstimacion = new clsControl(ccsTextBox, "IdEstimacion", "Id de Estimacion", ccsText, "", CCGetRequestParam("IdEstimacion", $Method, NULL), $this);
            $this->id_proveedor = new clsControl(ccsHidden, "id_proveedor", "id_proveedor", ccsInteger, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->id_proveedor->Required = true;
            $this->hdid_ppmc = new clsControl(ccsHidden, "hdid_ppmc", "hdid_ppmc", ccsText, "", CCGetRequestParam("hdid_ppmc", $Method, NULL), $this);
            $this->hdid_ppmc->Required = true;
            $this->UDX = new clsControl(ccsTextBox, "UDX", "UDX", ccsFloat, "", CCGetRequestParam("UDX", $Method, NULL), $this);
            $this->UDX->Required = true;
            $this->USP = new clsControl(ccsTextBox, "USP", "USP", ccsFloat, "", CCGetRequestParam("USP", $Method, NULL), $this);
            $this->USP->Required = true;
            $this->UDA = new clsControl(ccsTextBox, "UDA", "UDA", ccsFloat, "", CCGetRequestParam("UDA", $Method, NULL), $this);
            $this->UDA->Required = true;
            $this->lReportado = new clsControl(ccsLabel, "lReportado", "lReportado", ccsText, "", CCGetRequestParam("lReportado", $Method, NULL), $this);
            $this->UST = new clsControl(ccsTextBox, "UST", "UST", ccsFloat, "", CCGetRequestParam("UST", $Method, NULL), $this);
            $this->UST->Required = true;
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

//Validate Method @3-D77A32FA
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->id_servicio_cont->Validate() && $Validation);
        $Validation = ($this->id_servicio_negocio->Validate() && $Validation);
        $Validation = ($this->id_tipo->Validate() && $Validation);
        $Validation = ($this->descripci_n->Validate() && $Validation);
        $Validation = ($this->Obs_manuales->Validate() && $Validation);
        $Validation = ($this->MesReporte->Validate() && $Validation);
        $Validation = ($this->AnioReporte->Validate() && $Validation);
        $Validation = ($this->ppmc_adicional->Validate() && $Validation);
        $Validation = ($this->UrlEvidencia->Validate() && $Validation);
        $Validation = ($this->UCOS->Validate() && $Validation);
        $Validation = ($this->IdEstimacion->Validate() && $Validation);
        $Validation = ($this->id_proveedor->Validate() && $Validation);
        $Validation = ($this->hdid_ppmc->Validate() && $Validation);
        $Validation = ($this->UDX->Validate() && $Validation);
        $Validation = ($this->USP->Validate() && $Validation);
        $Validation = ($this->UDA->Validate() && $Validation);
        $Validation = ($this->UST->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->id_servicio_cont->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_servicio_negocio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_tipo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->descripci_n->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Obs_manuales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AnioReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ppmc_adicional->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UrlEvidencia->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UCOS->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IdEstimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->hdid_ppmc->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UDX->Errors->Count() == 0);
        $Validation =  $Validation && ($this->USP->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UDA->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UST->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-10B13843
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_ppmc->Errors->Count());
        $errors = ($errors || $this->NombreProveedor->Errors->Count());
        $errors = ($errors || $this->id_servicio_cont->Errors->Count());
        $errors = ($errors || $this->id_servicio_negocio->Errors->Count());
        $errors = ($errors || $this->id_tipo->Errors->Count());
        $errors = ($errors || $this->descripci_n->Errors->Count());
        $errors = ($errors || $this->Obs_manuales->Errors->Count());
        $errors = ($errors || $this->MesReporte->Errors->Count());
        $errors = ($errors || $this->AnioReporte->Errors->Count());
        $errors = ($errors || $this->ppmc_adicional->Errors->Count());
        $errors = ($errors || $this->UrlEvidencia->Errors->Count());
        $errors = ($errors || $this->UCOS->Errors->Count());
        $errors = ($errors || $this->IdEstimacion->Errors->Count());
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->hdid_ppmc->Errors->Count());
        $errors = ($errors || $this->UDX->Errors->Count());
        $errors = ($errors || $this->USP->Errors->Count());
        $errors = ($errors || $this->UDA->Errors->Count());
        $errors = ($errors || $this->lReportado->Errors->Count());
        $errors = ($errors || $this->UST->Errors->Count());
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

//InsertRow Method @3-FB8F403A
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->id_servicio_cont->SetValue($this->id_servicio_cont->GetValue(true));
        $this->DataSource->id_servicio_negocio->SetValue($this->id_servicio_negocio->GetValue(true));
        $this->DataSource->id_tipo->SetValue($this->id_tipo->GetValue(true));
        $this->DataSource->descripci_n->SetValue($this->descripci_n->GetValue(true));
        $this->DataSource->Obs_manuales->SetValue($this->Obs_manuales->GetValue(true));
        $this->DataSource->MesReporte->SetValue($this->MesReporte->GetValue(true));
        $this->DataSource->AnioReporte->SetValue($this->AnioReporte->GetValue(true));
        $this->DataSource->ppmc_adicional->SetValue($this->ppmc_adicional->GetValue(true));
        $this->DataSource->UrlEvidencia->SetValue($this->UrlEvidencia->GetValue(true));
        $this->DataSource->hdid_ppmc->SetValue($this->hdid_ppmc->GetValue(true));
        $this->DataSource->id_proveedor->SetValue($this->id_proveedor->GetValue(true));
        $this->DataSource->IdEstimacion->SetValue($this->IdEstimacion->GetValue(true));
        $this->DataSource->UDX->SetValue($this->UDX->GetValue(true));
        $this->DataSource->USP->SetValue($this->USP->GetValue(true));
        $this->DataSource->UDA->SetValue($this->UDA->GetValue(true));
        $this->DataSource->UCOS->SetValue($this->UCOS->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-40BC865C
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id_ppmc->SetValue($this->id_ppmc->GetValue(true));
        $this->DataSource->NombreProveedor->SetValue($this->NombreProveedor->GetValue(true));
        $this->DataSource->id_servicio_cont->SetValue($this->id_servicio_cont->GetValue(true));
        $this->DataSource->id_servicio_negocio->SetValue($this->id_servicio_negocio->GetValue(true));
        $this->DataSource->id_tipo->SetValue($this->id_tipo->GetValue(true));
        $this->DataSource->descripci_n->SetValue($this->descripci_n->GetValue(true));
        $this->DataSource->Obs_manuales->SetValue($this->Obs_manuales->GetValue(true));
        $this->DataSource->MesReporte->SetValue($this->MesReporte->GetValue(true));
        $this->DataSource->AnioReporte->SetValue($this->AnioReporte->GetValue(true));
        $this->DataSource->ppmc_adicional->SetValue($this->ppmc_adicional->GetValue(true));
        $this->DataSource->UrlEvidencia->SetValue($this->UrlEvidencia->GetValue(true));
        $this->DataSource->UCOS->SetValue($this->UCOS->GetValue(true));
        $this->DataSource->IdEstimacion->SetValue($this->IdEstimacion->GetValue(true));
        $this->DataSource->id_proveedor->SetValue($this->id_proveedor->GetValue(true));
        $this->DataSource->hdid_ppmc->SetValue($this->hdid_ppmc->GetValue(true));
        $this->DataSource->UDX->SetValue($this->UDX->GetValue(true));
        $this->DataSource->USP->SetValue($this->USP->GetValue(true));
        $this->DataSource->UDA->SetValue($this->UDA->GetValue(true));
        $this->DataSource->lReportado->SetValue($this->lReportado->GetValue(true));
        $this->DataSource->UST->SetValue($this->UST->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @3-F7C9482B
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

        $this->id_servicio_cont->Prepare();
        $this->id_servicio_negocio->Prepare();
        $this->id_tipo->Prepare();

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
                    $this->id_servicio_cont->SetValue($this->DataSource->id_servicio_cont->GetValue());
                    $this->id_servicio_negocio->SetValue($this->DataSource->id_servicio_negocio->GetValue());
                    $this->id_tipo->SetValue($this->DataSource->id_tipo->GetValue());
                    $this->descripci_n->SetValue($this->DataSource->descripci_n->GetValue());
                    $this->Obs_manuales->SetValue($this->DataSource->Obs_manuales->GetValue());
                    $this->MesReporte->SetValue($this->DataSource->MesReporte->GetValue());
                    $this->AnioReporte->SetValue($this->DataSource->AnioReporte->GetValue());
                    $this->ppmc_adicional->SetValue($this->DataSource->ppmc_adicional->GetValue());
                    $this->UrlEvidencia->SetValue($this->DataSource->UrlEvidencia->GetValue());
                    $this->UCOS->SetValue($this->DataSource->UCOS->GetValue());
                    $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                    $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                    $this->hdid_ppmc->SetValue($this->DataSource->hdid_ppmc->GetValue());
                    $this->UDX->SetValue($this->DataSource->UDX->GetValue());
                    $this->USP->SetValue($this->DataSource->USP->GetValue());
                    $this->UDA->SetValue($this->DataSource->UDA->GetValue());
                    $this->UST->SetValue($this->DataSource->UST->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_ppmc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NombreProveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_servicio_cont->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_servicio_negocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_tipo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->descripci_n->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Obs_manuales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AnioReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ppmc_adicional->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UrlEvidencia->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UCOS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IdEstimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->hdid_ppmc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UDX->Errors->ToString());
            $Error = ComposeStrings($Error, $this->USP->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UDA->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lReportado->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UST->Errors->ToString());
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
        $this->id_ppmc->Show();
        $this->NombreProveedor->Show();
        $this->id_servicio_cont->Show();
        $this->id_servicio_negocio->Show();
        $this->id_tipo->Show();
        $this->descripci_n->Show();
        $this->Obs_manuales->Show();
        $this->MesReporte->Show();
        $this->AnioReporte->Show();
        $this->ppmc_adicional->Show();
        $this->UrlEvidencia->Show();
        $this->UCOS->Show();
        $this->IdEstimacion->Show();
        $this->id_proveedor->Show();
        $this->hdid_ppmc->Show();
        $this->UDX->Show();
        $this->USP->Show();
        $this->UDA->Show();
        $this->lReportado->Show();
        $this->UST->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_calificacion_rs_MC Class @3-FCB6E20C

class clsmc_calificacion_rs_MCDataSource extends clsDBcnDisenio {  //mc_calificacion_rs_MCDataSource Class @3-EB5F0A7A

//DataSource Variables @3-32C03C5C
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
    public $NombreProveedor;
    public $id_servicio_cont;
    public $id_servicio_negocio;
    public $id_tipo;
    public $descripci_n;
    public $Obs_manuales;
    public $MesReporte;
    public $AnioReporte;
    public $ppmc_adicional;
    public $UrlEvidencia;
    public $UCOS;
    public $IdEstimacion;
    public $id_proveedor;
    public $hdid_ppmc;
    public $UDX;
    public $USP;
    public $UDA;
    public $lReportado;
    public $UST;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-DA6E657E
    function clsmc_calificacion_rs_MCDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_calificacion_rs_MC/Error";
        $this->Initialize();
        $this->id_ppmc = new clsField("id_ppmc", ccsInteger, "");
        
        $this->NombreProveedor = new clsField("NombreProveedor", ccsText, "");
        
        $this->id_servicio_cont = new clsField("id_servicio_cont", ccsInteger, "");
        
        $this->id_servicio_negocio = new clsField("id_servicio_negocio", ccsInteger, "");
        
        $this->id_tipo = new clsField("id_tipo", ccsInteger, "");
        
        $this->descripci_n = new clsField("descripci_n", ccsText, "");
        
        $this->Obs_manuales = new clsField("Obs_manuales", ccsText, "");
        
        $this->MesReporte = new clsField("MesReporte", ccsInteger, "");
        
        $this->AnioReporte = new clsField("AnioReporte", ccsInteger, "");
        
        $this->ppmc_adicional = new clsField("ppmc_adicional", ccsText, "");
        
        $this->UrlEvidencia = new clsField("UrlEvidencia", ccsText, "");
        
        $this->UCOS = new clsField("UCOS", ccsFloat, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsText, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->hdid_ppmc = new clsField("hdid_ppmc", ccsText, "");
        
        $this->UDX = new clsField("UDX", ccsFloat, "");
        
        $this->USP = new clsField("USP", ccsFloat, "");
        
        $this->UDA = new clsField("UDA", ccsFloat, "");
        
        $this->lReportado = new clsField("lReportado", ccsText, "");
        
        $this->UST = new clsField("UST", ccsFloat, "");
        

        $this->InsertFields["id_servicio_cont"] = array("Name" => "id_servicio_cont", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["id_servicio_negocio"] = array("Name" => "id_servicio_negocio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["id_tipo"] = array("Name" => "id_tipo", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["descripción"] = array("Name" => "[descripción]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Obs_manuales"] = array("Name" => "[Obs_manuales]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MesReporte"] = array("Name" => "[MesReporte]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["AnioReporte"] = array("Name" => "[AnioReporte]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["ppmc_adicional"] = array("Name" => "ppmc_adicional", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UrlEvidencia"] = array("Name" => "[UrlEvidencia]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Iduniverso"] = array("Name" => "[Iduniverso]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["id_ppmc"] = array("Name" => "id_ppmc", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IdEstimacion"] = array("Name" => "[IdEstimacion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UDX"] = array("Name" => "UDX", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["USP"] = array("Name" => "USP", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["UDA"] = array("Name" => "UDA", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["UCOS"] = array("Name" => "UCOS", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_servicio_cont"] = array("Name" => "id_servicio_cont", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_servicio_negocio"] = array("Name" => "id_servicio_negocio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_tipo"] = array("Name" => "id_tipo", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["descripción"] = array("Name" => "[descripción]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Obs_manuales"] = array("Name" => "[Obs_manuales]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MesReporte"] = array("Name" => "[MesReporte]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["AnioReporte"] = array("Name" => "[AnioReporte]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ppmc_adicional"] = array("Name" => "ppmc_adicional", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UrlEvidencia"] = array("Name" => "[UrlEvidencia]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UCOS"] = array("Name" => "UCOS", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["IdEstimacion"] = array("Name" => "[IdEstimacion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_ppmc"] = array("Name" => "id_ppmc", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UDX"] = array("Name" => "UDX", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["USP"] = array("Name" => "USP", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["UDA"] = array("Name" => "UDA", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["UST"] = array("Name" => "UST", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-52109B95
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId", ccsInteger, "", "", $this->Parameters["urlId"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[Iduniverso]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @3-14423CBE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_calificacion_rs_MC {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-00A2ED93
    function SetValues()
    {
        $this->id_servicio_cont->SetDBValue(trim($this->f("id_servicio_cont")));
        $this->id_servicio_negocio->SetDBValue(trim($this->f("id_servicio_negocio")));
        $this->id_tipo->SetDBValue(trim($this->f("id_tipo")));
        $this->descripci_n->SetDBValue($this->f("descripción"));
        $this->Obs_manuales->SetDBValue($this->f("Obs_manuales"));
        $this->MesReporte->SetDBValue(trim($this->f("MesReporte")));
        $this->AnioReporte->SetDBValue(trim($this->f("AnioReporte")));
        $this->ppmc_adicional->SetDBValue($this->f("ppmc_adicional"));
        $this->UrlEvidencia->SetDBValue($this->f("UrlEvidencia"));
        $this->UCOS->SetDBValue(trim($this->f("UCOS")));
        $this->IdEstimacion->SetDBValue($this->f("IdEstimacion"));
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->hdid_ppmc->SetDBValue($this->f("id_ppmc"));
        $this->UDX->SetDBValue(trim($this->f("UDX")));
        $this->USP->SetDBValue(trim($this->f("USP")));
        $this->UDA->SetDBValue(trim($this->f("UDA")));
        $this->UST->SetDBValue(trim($this->f("UST")));
    }
//End SetValues Method

//Insert Method @3-2F4AAB15
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["id_servicio_cont"] = new clsSQLParameter("ctrlid_servicio_cont", ccsInteger, "", "", $this->id_servicio_cont->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["id_servicio_negocio"] = new clsSQLParameter("ctrlid_servicio_negocio", ccsInteger, "", "", $this->id_servicio_negocio->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["id_tipo"] = new clsSQLParameter("ctrlid_tipo", ccsInteger, "", "", $this->id_tipo->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["descripción"] = new clsSQLParameter("ctrldescripci_n", ccsText, "", "", $this->descripci_n->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Obs_manuales"] = new clsSQLParameter("ctrlObs_manuales", ccsText, "", "", $this->Obs_manuales->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["MesReporte"] = new clsSQLParameter("ctrlMesReporte", ccsInteger, "", "", $this->MesReporte->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["AnioReporte"] = new clsSQLParameter("ctrlAnioReporte", ccsInteger, "", "", $this->AnioReporte->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ppmc_adicional"] = new clsSQLParameter("ctrlppmc_adicional", ccsText, "", "", $this->ppmc_adicional->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["UrlEvidencia"] = new clsSQLParameter("ctrlUrlEvidencia", ccsText, "", "", $this->UrlEvidencia->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Iduniverso"] = new clsSQLParameter("urlId", ccsInteger, "", "", CCGetFromGet("Id", NULL), NULL, false, $this->ErrorBlock);
        $this->cp["id_ppmc"] = new clsSQLParameter("ctrlhdid_ppmc", ccsInteger, "", "", $this->hdid_ppmc->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["id_proveedor"] = new clsSQLParameter("ctrlid_proveedor", ccsInteger, "", "", $this->id_proveedor->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["IdEstimacion"] = new clsSQLParameter("ctrlIdEstimacion", ccsText, "", "", $this->IdEstimacion->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["UDX"] = new clsSQLParameter("ctrlUDX", ccsFloat, "", "", $this->UDX->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["USP"] = new clsSQLParameter("ctrlUSP", ccsFloat, "", "", $this->USP->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["UDA"] = new clsSQLParameter("ctrlUDA", ccsFloat, "", "", $this->UDA->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["UCOS"] = new clsSQLParameter("ctrlUCOS", ccsFloat, "", "", $this->UCOS->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["id_servicio_cont"]->GetValue()) and !strlen($this->cp["id_servicio_cont"]->GetText()) and !is_bool($this->cp["id_servicio_cont"]->GetValue())) 
            $this->cp["id_servicio_cont"]->SetValue($this->id_servicio_cont->GetValue(true));
        if (!is_null($this->cp["id_servicio_negocio"]->GetValue()) and !strlen($this->cp["id_servicio_negocio"]->GetText()) and !is_bool($this->cp["id_servicio_negocio"]->GetValue())) 
            $this->cp["id_servicio_negocio"]->SetValue($this->id_servicio_negocio->GetValue(true));
        if (!is_null($this->cp["id_tipo"]->GetValue()) and !strlen($this->cp["id_tipo"]->GetText()) and !is_bool($this->cp["id_tipo"]->GetValue())) 
            $this->cp["id_tipo"]->SetValue($this->id_tipo->GetValue(true));
        if (!is_null($this->cp["descripción"]->GetValue()) and !strlen($this->cp["descripción"]->GetText()) and !is_bool($this->cp["descripción"]->GetValue())) 
            $this->cp["descripción"]->SetValue($this->descripci_n->GetValue(true));
        if (!is_null($this->cp["Obs_manuales"]->GetValue()) and !strlen($this->cp["Obs_manuales"]->GetText()) and !is_bool($this->cp["Obs_manuales"]->GetValue())) 
            $this->cp["Obs_manuales"]->SetValue($this->Obs_manuales->GetValue(true));
        if (!is_null($this->cp["MesReporte"]->GetValue()) and !strlen($this->cp["MesReporte"]->GetText()) and !is_bool($this->cp["MesReporte"]->GetValue())) 
            $this->cp["MesReporte"]->SetValue($this->MesReporte->GetValue(true));
        if (!is_null($this->cp["AnioReporte"]->GetValue()) and !strlen($this->cp["AnioReporte"]->GetText()) and !is_bool($this->cp["AnioReporte"]->GetValue())) 
            $this->cp["AnioReporte"]->SetValue($this->AnioReporte->GetValue(true));
        if (!is_null($this->cp["ppmc_adicional"]->GetValue()) and !strlen($this->cp["ppmc_adicional"]->GetText()) and !is_bool($this->cp["ppmc_adicional"]->GetValue())) 
            $this->cp["ppmc_adicional"]->SetValue($this->ppmc_adicional->GetValue(true));
        if (!is_null($this->cp["UrlEvidencia"]->GetValue()) and !strlen($this->cp["UrlEvidencia"]->GetText()) and !is_bool($this->cp["UrlEvidencia"]->GetValue())) 
            $this->cp["UrlEvidencia"]->SetValue($this->UrlEvidencia->GetValue(true));
        if (!is_null($this->cp["Iduniverso"]->GetValue()) and !strlen($this->cp["Iduniverso"]->GetText()) and !is_bool($this->cp["Iduniverso"]->GetValue())) 
            $this->cp["Iduniverso"]->SetText(CCGetFromGet("Id", NULL));
        if (!is_null($this->cp["id_ppmc"]->GetValue()) and !strlen($this->cp["id_ppmc"]->GetText()) and !is_bool($this->cp["id_ppmc"]->GetValue())) 
            $this->cp["id_ppmc"]->SetValue($this->hdid_ppmc->GetValue(true));
        if (!is_null($this->cp["id_proveedor"]->GetValue()) and !strlen($this->cp["id_proveedor"]->GetText()) and !is_bool($this->cp["id_proveedor"]->GetValue())) 
            $this->cp["id_proveedor"]->SetValue($this->id_proveedor->GetValue(true));
        if (!is_null($this->cp["IdEstimacion"]->GetValue()) and !strlen($this->cp["IdEstimacion"]->GetText()) and !is_bool($this->cp["IdEstimacion"]->GetValue())) 
            $this->cp["IdEstimacion"]->SetValue($this->IdEstimacion->GetValue(true));
        if (!is_null($this->cp["UDX"]->GetValue()) and !strlen($this->cp["UDX"]->GetText()) and !is_bool($this->cp["UDX"]->GetValue())) 
            $this->cp["UDX"]->SetValue($this->UDX->GetValue(true));
        if (!is_null($this->cp["USP"]->GetValue()) and !strlen($this->cp["USP"]->GetText()) and !is_bool($this->cp["USP"]->GetValue())) 
            $this->cp["USP"]->SetValue($this->USP->GetValue(true));
        if (!is_null($this->cp["UDA"]->GetValue()) and !strlen($this->cp["UDA"]->GetText()) and !is_bool($this->cp["UDA"]->GetValue())) 
            $this->cp["UDA"]->SetValue($this->UDA->GetValue(true));
        if (!is_null($this->cp["UCOS"]->GetValue()) and !strlen($this->cp["UCOS"]->GetText()) and !is_bool($this->cp["UCOS"]->GetValue())) 
            $this->cp["UCOS"]->SetValue($this->UCOS->GetValue(true));
        $this->InsertFields["id_servicio_cont"]["Value"] = $this->cp["id_servicio_cont"]->GetDBValue(true);
        $this->InsertFields["id_servicio_negocio"]["Value"] = $this->cp["id_servicio_negocio"]->GetDBValue(true);
        $this->InsertFields["id_tipo"]["Value"] = $this->cp["id_tipo"]->GetDBValue(true);
        $this->InsertFields["descripción"]["Value"] = $this->cp["descripción"]->GetDBValue(true);
        $this->InsertFields["Obs_manuales"]["Value"] = $this->cp["Obs_manuales"]->GetDBValue(true);
        $this->InsertFields["MesReporte"]["Value"] = $this->cp["MesReporte"]->GetDBValue(true);
        $this->InsertFields["AnioReporte"]["Value"] = $this->cp["AnioReporte"]->GetDBValue(true);
        $this->InsertFields["ppmc_adicional"]["Value"] = $this->cp["ppmc_adicional"]->GetDBValue(true);
        $this->InsertFields["UrlEvidencia"]["Value"] = $this->cp["UrlEvidencia"]->GetDBValue(true);
        $this->InsertFields["Iduniverso"]["Value"] = $this->cp["Iduniverso"]->GetDBValue(true);
        $this->InsertFields["id_ppmc"]["Value"] = $this->cp["id_ppmc"]->GetDBValue(true);
        $this->InsertFields["id_proveedor"]["Value"] = $this->cp["id_proveedor"]->GetDBValue(true);
        $this->InsertFields["IdEstimacion"]["Value"] = $this->cp["IdEstimacion"]->GetDBValue(true);
        $this->InsertFields["UDX"]["Value"] = $this->cp["UDX"]->GetDBValue(true);
        $this->InsertFields["USP"]["Value"] = $this->cp["USP"]->GetDBValue(true);
        $this->InsertFields["UDA"]["Value"] = $this->cp["UDA"]->GetDBValue(true);
        $this->InsertFields["UCOS"]["Value"] = $this->cp["UCOS"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_calificacion_rs_MC", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-A80C5AF5
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["id_servicio_cont"]["Value"] = $this->id_servicio_cont->GetDBValue(true);
        $this->UpdateFields["id_servicio_negocio"]["Value"] = $this->id_servicio_negocio->GetDBValue(true);
        $this->UpdateFields["id_tipo"]["Value"] = $this->id_tipo->GetDBValue(true);
        $this->UpdateFields["descripción"]["Value"] = $this->descripci_n->GetDBValue(true);
        $this->UpdateFields["Obs_manuales"]["Value"] = $this->Obs_manuales->GetDBValue(true);
        $this->UpdateFields["MesReporte"]["Value"] = $this->MesReporte->GetDBValue(true);
        $this->UpdateFields["AnioReporte"]["Value"] = $this->AnioReporte->GetDBValue(true);
        $this->UpdateFields["ppmc_adicional"]["Value"] = $this->ppmc_adicional->GetDBValue(true);
        $this->UpdateFields["UrlEvidencia"]["Value"] = $this->UrlEvidencia->GetDBValue(true);
        $this->UpdateFields["UCOS"]["Value"] = $this->UCOS->GetDBValue(true);
        $this->UpdateFields["IdEstimacion"]["Value"] = $this->IdEstimacion->GetDBValue(true);
        $this->UpdateFields["id_proveedor"]["Value"] = $this->id_proveedor->GetDBValue(true);
        $this->UpdateFields["id_ppmc"]["Value"] = $this->hdid_ppmc->GetDBValue(true);
        $this->UpdateFields["UDX"]["Value"] = $this->UDX->GetDBValue(true);
        $this->UpdateFields["USP"]["Value"] = $this->USP->GetDBValue(true);
        $this->UpdateFields["UDA"]["Value"] = $this->UDA->GetDBValue(true);
        $this->UpdateFields["UST"]["Value"] = $this->UST->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_calificacion_rs_MC", $this->UpdateFields, $this);
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

} //End mc_calificacion_rs_MCDataSource Class @3-FCB6E20C

//Initialize Page @1-91169680
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
$TemplateFileName = "PPMCsCrInfoGeneral.html";
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

//Include events file @1-78FDA30B
include_once("./PPMCsCrInfoGeneral_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-4BB8F3F5
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_calificacion_rs_MC = new clsRecordmc_calificacion_rs_MC("", $MainPage);
$lkReqFun = new clsControl(ccsLink, "lkReqFun", "lkReqFun", ccsText, "", CCGetRequestParam("lkReqFun", ccsGet, NULL), $MainPage);
$lkReqFun->Page = "PPMCsCumpReqFunDetalle.php";
$lkCalidad = new clsControl(ccsLink, "lkCalidad", "lkCalidad", ccsText, "", CCGetRequestParam("lkCalidad", ccsGet, NULL), $MainPage);
$lkCalidad->Page = "PPMCsCrbCalidad.php";
$lkRetEnt_Calidad = new clsControl(ccsLink, "lkRetEnt_Calidad", "lkRetEnt_Calidad", ccsText, "", CCGetRequestParam("lkRetEnt_Calidad", ccsGet, NULL), $MainPage);
$lkRetEnt_Calidad->Page = "PPMCsCrbDetalle.php";
$lkCalidadCodigo = new clsControl(ccsLink, "lkCalidadCodigo", "lkCalidadCodigo", ccsText, "", CCGetRequestParam("lkCalidadCodigo", ccsGet, NULL), $MainPage);
$lkCalidadCodigo->Page = "PPMCsCrCalCodDetalle.php";
$Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Page = "PPMCsDefFugDetalle.php";
$lkAnterior = new clsControl(ccsLink, "lkAnterior", "lkAnterior", ccsText, "", CCGetRequestParam("lkAnterior", ccsGet, NULL), $MainPage);
$lkAnterior->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkAnterior->Page = "PPMCsCrbCalidad.php";
$lkSiguiente = new clsControl(ccsLink, "lkSiguiente", "lkSiguiente", ccsText, "", CCGetRequestParam("lkSiguiente", ccsGet, NULL), $MainPage);
$lkSiguiente->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkSiguiente->Page = "PPMCsCrbCalidad.php";
$MainPage->Header = & $Header;
$MainPage->mc_calificacion_rs_MC = & $mc_calificacion_rs_MC;
$MainPage->lkReqFun = & $lkReqFun;
$MainPage->lkCalidad = & $lkCalidad;
$MainPage->lkRetEnt_Calidad = & $lkRetEnt_Calidad;
$MainPage->lkCalidadCodigo = & $lkCalidadCodigo;
$MainPage->Link1 = & $Link1;
$MainPage->lkAnterior = & $lkAnterior;
$MainPage->lkSiguiente = & $lkSiguiente;
$lkReqFun->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "src", 1);
$lkCalidad->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkCalidad->Parameters = CCAddParam($lkCalidad->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkCalidad->Parameters = CCAddParam($lkCalidad->Parameters, "src", 1);
$lkRetEnt_Calidad->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkRetEnt_Calidad->Parameters = CCAddParam($lkRetEnt_Calidad->Parameters, "sID", CCGetFromGet("Id", NULL));
$lkRetEnt_Calidad->Parameters = CCAddParam($lkRetEnt_Calidad->Parameters, "src", 1);
$lkCalidadCodigo->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkCalidadCodigo->Parameters = CCAddParam($lkCalidadCodigo->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkCalidadCodigo->Parameters = CCAddParam($lkCalidadCodigo->Parameters, "src", 1);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Parameters = CCAddParam($Link1->Parameters, "Id", CCGetFromGet("Id", NULL));
$Link1->Parameters = CCAddParam($Link1->Parameters, "src", 1);
$mc_calificacion_rs_MC->Initialize();
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

//Execute Components @1-C10EA3BD
$mc_calificacion_rs_MC->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-FC36400D
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_calificacion_rs_MC);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-6B296437
$Header->Show();
$mc_calificacion_rs_MC->Show();
$lkReqFun->Show();
$lkCalidad->Show();
$lkRetEnt_Calidad->Show();
$lkCalidadCodigo->Show();
$Link1->Show();
$lkAnterior->Show();
$lkSiguiente->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-99F27B2E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_calificacion_rs_MC);
unset($Tpl);
//End Unload Page


?>
