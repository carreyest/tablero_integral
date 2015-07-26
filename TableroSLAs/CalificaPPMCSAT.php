<?php
//Include Common Files @1-BEE6C4EE
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "CalificaPPMCSAT.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @25-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordcalificacion_rs_AUT { //calificacion_rs_AUT Class @2-4CDBCDD2

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

//Class_Initialize Event @2-4EC41C14
    function clsRecordcalificacion_rs_AUT($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record calificacion_rs_AUT/Error";
        $this->DataSource = new clscalificacion_rs_AUTDataSource($this);
        $this->ds = & $this->DataSource;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "calificacion_rs_AUT";
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
            $this->id_ppmc = new clsControl(ccsLabel, "id_ppmc", "Id Ppmc", ccsInteger, "", CCGetRequestParam("id_ppmc", $Method, NULL), $this);
            $this->id_proveedor = new clsControl(ccsLabel, "id_proveedor", "Id Proveedor", ccsText, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->id_servicio_negocio = new clsControl(ccsLabel, "id_servicio_negocio", "Id Servicio Negocio", ccsText, "", CCGetRequestParam("id_servicio_negocio", $Method, NULL), $this);
            $this->id_tipo = new clsControl(ccsLabel, "id_tipo", "Id Tipo", ccsInteger, "", CCGetRequestParam("id_tipo", $Method, NULL), $this);
            $this->descripci_n = new clsControl(ccsLabel, "descripci_n", "Descripción", ccsText, "", CCGetRequestParam("descripci_n", $Method, NULL), $this);
            $this->Obs_manuales = new clsControl(ccsTextArea, "Obs_manuales", "Obs Manuales", ccsText, "", CCGetRequestParam("Obs_manuales", $Method, NULL), $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->Label1 = new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", $Method, NULL), $this);
            $this->mc_c_ServContractual_Desc = new clsControl(ccsLabel, "mc_c_ServContractual_Desc", "mc_c_ServContractual_Desc", ccsText, "", CCGetRequestParam("mc_c_ServContractual_Desc", $Method, NULL), $this);
            $this->AnioReporte = new clsControl(ccsLabel, "AnioReporte", "Anio Reporte", ccsInteger, "", CCGetRequestParam("AnioReporte", $Method, NULL), $this);
            $this->MesReporte = new clsControl(ccsLabel, "MesReporte", "MesReporte", ccsText, "", CCGetRequestParam("MesReporte", $Method, NULL), $this);
            $this->pnlApertura = new clsPanel("pnlApertura", $this);
            $this->HERR_EST_COST = new clsControl(ccsListBox, "HERR_EST_COST", "HERR EST COST", ccsInteger, "", CCGetRequestParam("HERR_EST_COST", $Method, NULL), $this);
            $this->HERR_EST_COST->DSType = dsListOfValues;
            $this->HERR_EST_COST->Values = array(array("0", "No Cumple"), array("1", "Cumple"));
            $this->REQ_SERV = new clsControl(ccsListBox, "REQ_SERV", "REQ SERV", ccsInteger, "", CCGetRequestParam("REQ_SERV", $Method, NULL), $this);
            $this->REQ_SERV->DSType = dsListOfValues;
            $this->REQ_SERV->Values = array(array("0", "No Cumple"), array("1", "Cumple"));
            $this->OBS_HERR_EST_COST = new clsControl(ccsLabel, "OBS_HERR_EST_COST", "OBS_HERR_EST_COST", ccsText, "", CCGetRequestParam("OBS_HERR_EST_COST", $Method, NULL), $this);
            $this->pnlCierre = new clsPanel("pnlCierre", $this);
            $this->CUMPL_REQ_FUNC = new clsControl(ccsListBox, "CUMPL_REQ_FUNC", "CUMPL REQ FUNC", ccsInteger, "", CCGetRequestParam("CUMPL_REQ_FUNC", $Method, NULL), $this);
            $this->CUMPL_REQ_FUNC->DSType = dsListOfValues;
            $this->CUMPL_REQ_FUNC->Values = array(array("0", "No Cumple"), array("1", "Cumple"));
            $this->OBS_CUMPL_REQ_FUNC = new clsControl(ccsLabel, "OBS_CUMPL_REQ_FUNC", "OBS_CUMPL_REQ_FUNC", ccsText, "", CCGetRequestParam("OBS_CUMPL_REQ_FUNC", $Method, NULL), $this);
            $this->CALIDAD_PROD_TERM = new clsControl(ccsListBox, "CALIDAD_PROD_TERM", "CALIDAD PROD TERM", ccsInteger, "", CCGetRequestParam("CALIDAD_PROD_TERM", $Method, NULL), $this);
            $this->CALIDAD_PROD_TERM->DSType = dsListOfValues;
            $this->CALIDAD_PROD_TERM->Values = array(array("0", "No Cumple"), array("1", "Cumple"));
            $this->OBS_CALIDAD_PROD_TERM = new clsControl(ccsLabel, "OBS_CALIDAD_PROD_TERM", "OBS_CALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("OBS_CALIDAD_PROD_TERM", $Method, NULL), $this);
            $this->RETR_ENTREGABLE = new clsControl(ccsListBox, "RETR_ENTREGABLE", "RETR ENTREGABLE", ccsInteger, "", CCGetRequestParam("RETR_ENTREGABLE", $Method, NULL), $this);
            $this->RETR_ENTREGABLE->DSType = dsListOfValues;
            $this->RETR_ENTREGABLE->Values = array(array("0", "No Cumple"), array("1", "Cumple"));
            $this->OBS_COMPL_RUTA_CRITICA = new clsControl(ccsLabel, "OBS_COMPL_RUTA_CRITICA", "OBS_COMPL_RUTA_CRITICA", ccsText, "", CCGetRequestParam("OBS_COMPL_RUTA_CRITICA", $Method, NULL), $this);
            $this->EST_PROY = new clsControl(ccsListBox, "EST_PROY", "EST PROY", ccsInteger, "", CCGetRequestParam("EST_PROY", $Method, NULL), $this);
            $this->EST_PROY->DSType = dsListOfValues;
            $this->EST_PROY->Values = array(array("0", "No Cumple"), array("1", "Cumple"));
            $this->OBS_EST_PROY = new clsControl(ccsLabel, "OBS_EST_PROY", "OBS_EST_PROY", ccsText, "", CCGetRequestParam("OBS_EST_PROY", $Method, NULL), $this);
            $this->DEF_FUG_AMB_PROD = new clsControl(ccsListBox, "DEF_FUG_AMB_PROD", "DEF FUG AMB PROD", ccsInteger, "", CCGetRequestParam("DEF_FUG_AMB_PROD", $Method, NULL), $this);
            $this->DEF_FUG_AMB_PROD->DSType = dsListOfValues;
            $this->DEF_FUG_AMB_PROD->Values = array(array("0", "No Cumple"), array("1", "Cumple"));
            $this->OBS_DEF_FUG_AMB_PROD = new clsControl(ccsLabel, "OBS_DEF_FUG_AMB_PROD", "OBS_DEF_FUG_AMB_PROD", ccsText, "", CCGetRequestParam("OBS_DEF_FUG_AMB_PROD", $Method, NULL), $this);
            $this->pnlApertura->AddComponent("HERR_EST_COST", $this->HERR_EST_COST);
            $this->pnlApertura->AddComponent("REQ_SERV", $this->REQ_SERV);
            $this->pnlApertura->AddComponent("OBS_HERR_EST_COST", $this->OBS_HERR_EST_COST);
            $this->pnlCierre->AddComponent("CUMPL_REQ_FUNC", $this->CUMPL_REQ_FUNC);
            $this->pnlCierre->AddComponent("CALIDAD_PROD_TERM", $this->CALIDAD_PROD_TERM);
            $this->pnlCierre->AddComponent("RETR_ENTREGABLE", $this->RETR_ENTREGABLE);
            $this->pnlCierre->AddComponent("EST_PROY", $this->EST_PROY);
            $this->pnlCierre->AddComponent("DEF_FUG_AMB_PROD", $this->DEF_FUG_AMB_PROD);
            $this->pnlCierre->AddComponent("OBS_CUMPL_REQ_FUNC", $this->OBS_CUMPL_REQ_FUNC);
            $this->pnlCierre->AddComponent("OBS_CALIDAD_PROD_TERM", $this->OBS_CALIDAD_PROD_TERM);
            $this->pnlCierre->AddComponent("OBS_COMPL_RUTA_CRITICA", $this->OBS_COMPL_RUTA_CRITICA);
            $this->pnlCierre->AddComponent("OBS_EST_PROY", $this->OBS_EST_PROY);
            $this->pnlCierre->AddComponent("OBS_DEF_FUG_AMB_PROD", $this->OBS_DEF_FUG_AMB_PROD);
        }
    }
//End Class_Initialize Event

//Initialize Method @2-9DB51877
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlIdUniverso"] = CCGetFromGet("IdUniverso", NULL);
    }
//End Initialize Method

//Validate Method @2-931DDFC3
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Obs_manuales->Validate() && $Validation);
        $Validation = ($this->HERR_EST_COST->Validate() && $Validation);
        $Validation = ($this->REQ_SERV->Validate() && $Validation);
        $Validation = ($this->CUMPL_REQ_FUNC->Validate() && $Validation);
        $Validation = ($this->CALIDAD_PROD_TERM->Validate() && $Validation);
        $Validation = ($this->RETR_ENTREGABLE->Validate() && $Validation);
        $Validation = ($this->EST_PROY->Validate() && $Validation);
        $Validation = ($this->DEF_FUG_AMB_PROD->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Obs_manuales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HERR_EST_COST->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REQ_SERV->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUMPL_REQ_FUNC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CALIDAD_PROD_TERM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->RETR_ENTREGABLE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EST_PROY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DEF_FUG_AMB_PROD->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-513B45A6
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_ppmc->Errors->Count());
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->id_servicio_negocio->Errors->Count());
        $errors = ($errors || $this->id_tipo->Errors->Count());
        $errors = ($errors || $this->descripci_n->Errors->Count());
        $errors = ($errors || $this->Obs_manuales->Errors->Count());
        $errors = ($errors || $this->Label1->Errors->Count());
        $errors = ($errors || $this->mc_c_ServContractual_Desc->Errors->Count());
        $errors = ($errors || $this->AnioReporte->Errors->Count());
        $errors = ($errors || $this->MesReporte->Errors->Count());
        $errors = ($errors || $this->HERR_EST_COST->Errors->Count());
        $errors = ($errors || $this->REQ_SERV->Errors->Count());
        $errors = ($errors || $this->OBS_HERR_EST_COST->Errors->Count());
        $errors = ($errors || $this->CUMPL_REQ_FUNC->Errors->Count());
        $errors = ($errors || $this->OBS_CUMPL_REQ_FUNC->Errors->Count());
        $errors = ($errors || $this->CALIDAD_PROD_TERM->Errors->Count());
        $errors = ($errors || $this->OBS_CALIDAD_PROD_TERM->Errors->Count());
        $errors = ($errors || $this->RETR_ENTREGABLE->Errors->Count());
        $errors = ($errors || $this->OBS_COMPL_RUTA_CRITICA->Errors->Count());
        $errors = ($errors || $this->EST_PROY->Errors->Count());
        $errors = ($errors || $this->OBS_EST_PROY->Errors->Count());
        $errors = ($errors || $this->DEF_FUG_AMB_PROD->Errors->Count());
        $errors = ($errors || $this->OBS_DEF_FUG_AMB_PROD->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-BDF64177
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
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = "PPMCsApbDetalleRSxls.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert)) {
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

//UpdateRow Method @2-CF114474
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->HERR_EST_COST->SetValue($this->HERR_EST_COST->GetValue(true));
        $this->DataSource->REQ_SERV->SetValue($this->REQ_SERV->GetValue(true));
        $this->DataSource->CUMPL_REQ_FUNC->SetValue($this->CUMPL_REQ_FUNC->GetValue(true));
        $this->DataSource->CALIDAD_PROD_TERM->SetValue($this->CALIDAD_PROD_TERM->GetValue(true));
        $this->DataSource->RETR_ENTREGABLE->SetValue($this->RETR_ENTREGABLE->GetValue(true));
        $this->DataSource->COMPL_RUTA_CRITICA->SetValue($this->COMPL_RUTA_CRITICA->GetValue(true));
        $this->DataSource->EST_PROY->SetValue($this->EST_PROY->GetValue(true));
        $this->DataSource->DEF_FUG_AMB_PROD->SetValue($this->DEF_FUG_AMB_PROD->GetValue(true));
        $this->DataSource->Obs_manuales->SetValue($this->Obs_manuales->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @2-4D57943D
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

        $this->HERR_EST_COST->Prepare();
        $this->REQ_SERV->Prepare();
        $this->CUMPL_REQ_FUNC->Prepare();
        $this->CALIDAD_PROD_TERM->Prepare();
        $this->RETR_ENTREGABLE->Prepare();
        $this->EST_PROY->Prepare();
        $this->DEF_FUG_AMB_PROD->Prepare();

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
                $this->id_ppmc->SetValue($this->DataSource->id_ppmc->GetValue());
                $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                $this->id_servicio_negocio->SetValue($this->DataSource->id_servicio_negocio->GetValue());
                $this->id_tipo->SetValue($this->DataSource->id_tipo->GetValue());
                $this->descripci_n->SetValue($this->DataSource->descripci_n->GetValue());
                $this->mc_c_ServContractual_Desc->SetValue($this->DataSource->mc_c_ServContractual_Desc->GetValue());
                $this->AnioReporte->SetValue($this->DataSource->AnioReporte->GetValue());
                $this->MesReporte->SetValue($this->DataSource->MesReporte->GetValue());
                $this->OBS_HERR_EST_COST->SetValue($this->DataSource->OBS_HERR_EST_COST->GetValue());
                $this->OBS_CUMPL_REQ_FUNC->SetValue($this->DataSource->OBS_CUMPL_REQ_FUNC->GetValue());
                $this->OBS_CALIDAD_PROD_TERM->SetValue($this->DataSource->OBS_CALIDAD_PROD_TERM->GetValue());
                $this->OBS_COMPL_RUTA_CRITICA->SetValue($this->DataSource->OBS_COMPL_RUTA_CRITICA->GetValue());
                $this->OBS_EST_PROY->SetValue($this->DataSource->OBS_EST_PROY->GetValue());
                $this->OBS_DEF_FUG_AMB_PROD->SetValue($this->DataSource->OBS_DEF_FUG_AMB_PROD->GetValue());
                if(!$this->FormSubmitted){
                    $this->Obs_manuales->SetValue($this->DataSource->Obs_manuales->GetValue());
                    $this->HERR_EST_COST->SetValue($this->DataSource->HERR_EST_COST->GetValue());
                    $this->REQ_SERV->SetValue($this->DataSource->REQ_SERV->GetValue());
                    $this->CUMPL_REQ_FUNC->SetValue($this->DataSource->CUMPL_REQ_FUNC->GetValue());
                    $this->CALIDAD_PROD_TERM->SetValue($this->DataSource->CALIDAD_PROD_TERM->GetValue());
                    $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
                    $this->EST_PROY->SetValue($this->DataSource->EST_PROY->GetValue());
                    $this->DEF_FUG_AMB_PROD->SetValue($this->DataSource->DEF_FUG_AMB_PROD->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_ppmc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_servicio_negocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_tipo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->descripci_n->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Obs_manuales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Label1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mc_c_ServContractual_Desc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AnioReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HERR_EST_COST->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REQ_SERV->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OBS_HERR_EST_COST->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUMPL_REQ_FUNC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OBS_CUMPL_REQ_FUNC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CALIDAD_PROD_TERM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OBS_CALIDAD_PROD_TERM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->RETR_ENTREGABLE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OBS_COMPL_RUTA_CRITICA->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EST_PROY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OBS_EST_PROY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DEF_FUG_AMB_PROD->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OBS_DEF_FUG_AMB_PROD->Errors->ToString());
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
        $this->id_ppmc->Show();
        $this->id_proveedor->Show();
        $this->id_servicio_negocio->Show();
        $this->id_tipo->Show();
        $this->descripci_n->Show();
        $this->Obs_manuales->Show();
        $this->Button_Cancel->Show();
        $this->Label1->Show();
        $this->mc_c_ServContractual_Desc->Show();
        $this->AnioReporte->Show();
        $this->MesReporte->Show();
        $this->pnlApertura->Show();
        $this->pnlCierre->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End calificacion_rs_AUT Class @2-FCB6E20C

class clscalificacion_rs_AUTDataSource extends clsDBcnDisenio {  //calificacion_rs_AUTDataSource Class @2-E84E522E

//DataSource Variables @2-0AAAE3A7
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $wp;
    public $AllParametersSet;

    public $UpdateFields = array();

    // Datasource fields
    public $id_ppmc;
    public $id_proveedor;
    public $id_servicio_negocio;
    public $id_tipo;
    public $descripci_n;
    public $Obs_manuales;
    public $Label1;
    public $mc_c_ServContractual_Desc;
    public $AnioReporte;
    public $MesReporte;
    public $HERR_EST_COST;
    public $REQ_SERV;
    public $OBS_HERR_EST_COST;
    public $CUMPL_REQ_FUNC;
    public $OBS_CUMPL_REQ_FUNC;
    public $CALIDAD_PROD_TERM;
    public $OBS_CALIDAD_PROD_TERM;
    public $RETR_ENTREGABLE;
    public $OBS_COMPL_RUTA_CRITICA;
    public $EST_PROY;
    public $OBS_EST_PROY;
    public $DEF_FUG_AMB_PROD;
    public $OBS_DEF_FUG_AMB_PROD;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-FD43543E
    function clscalificacion_rs_AUTDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record calificacion_rs_AUT/Error";
        $this->Initialize();
        $this->id_ppmc = new clsField("id_ppmc", ccsInteger, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsText, "");
        
        $this->id_servicio_negocio = new clsField("id_servicio_negocio", ccsText, "");
        
        $this->id_tipo = new clsField("id_tipo", ccsInteger, "");
        
        $this->descripci_n = new clsField("descripci_n", ccsText, "");
        
        $this->Obs_manuales = new clsField("Obs_manuales", ccsText, "");
        
        $this->Label1 = new clsField("Label1", ccsText, "");
        
        $this->mc_c_ServContractual_Desc = new clsField("mc_c_ServContractual_Desc", ccsText, "");
        
        $this->AnioReporte = new clsField("AnioReporte", ccsInteger, "");
        
        $this->MesReporte = new clsField("MesReporte", ccsText, "");
        
        $this->HERR_EST_COST = new clsField("HERR_EST_COST", ccsInteger, "");
        
        $this->REQ_SERV = new clsField("REQ_SERV", ccsInteger, "");
        
        $this->OBS_HERR_EST_COST = new clsField("OBS_HERR_EST_COST", ccsText, "");
        
        $this->CUMPL_REQ_FUNC = new clsField("CUMPL_REQ_FUNC", ccsInteger, "");
        
        $this->OBS_CUMPL_REQ_FUNC = new clsField("OBS_CUMPL_REQ_FUNC", ccsText, "");
        
        $this->CALIDAD_PROD_TERM = new clsField("CALIDAD_PROD_TERM", ccsInteger, "");
        
        $this->OBS_CALIDAD_PROD_TERM = new clsField("OBS_CALIDAD_PROD_TERM", ccsText, "");
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsInteger, "");
        
        $this->OBS_COMPL_RUTA_CRITICA = new clsField("OBS_COMPL_RUTA_CRITICA", ccsText, "");
        
        $this->EST_PROY = new clsField("EST_PROY", ccsInteger, "");
        
        $this->OBS_EST_PROY = new clsField("OBS_EST_PROY", ccsText, "");
        
        $this->DEF_FUG_AMB_PROD = new clsField("DEF_FUG_AMB_PROD", ccsInteger, "");
        
        $this->OBS_DEF_FUG_AMB_PROD = new clsField("OBS_DEF_FUG_AMB_PROD", ccsText, "");
        

        $this->UpdateFields["HERR_EST_COST"] = array("Name" => "HERR_EST_COST", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["REQ_SERV"] = array("Name" => "REQ_SERV", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["CUMPL_REQ_FUNC"] = array("Name" => "CUMPL_REQ_FUNC", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["CALIDAD_PROD_TERM"] = array("Name" => "CALIDAD_PROD_TERM", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["RETR_ENTREGABLE"] = array("Name" => "RETR_ENTREGABLE", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["COMPL_RUTA_CRITICA"] = array("Name" => "COMPL_RUTA_CRITICA", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["EST_PROY"] = array("Name" => "EST_PROY", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DEF_FUG_AMB_PROD"] = array("Name" => "DEF_FUG_AMB_PROD", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Obs_manuales"] = array("Name" => "[Obs_manuales]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsText);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-A29D9853
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlIdUniverso", ccsInteger, "", "", $this->Parameters["urlIdUniverso"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[IdUniverso]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-8097CEA0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT RazonSocial, mc_c_ServContractual.Descripcion AS mc_c_ServContractual_Desc, mc_c_servicio.nombre AS mc_c_servicio_nombre, mc_c_mes.Mes AS mc_c_mes_Mes,\n\n" .
        "tipo AS TipoUniverso, mc_calificacion_rs_SAT.* \n\n" .
        "FROM ((((mc_calificacion_rs_SAT INNER JOIN mc_c_proveedor ON\n\n" .
        "mc_calificacion_rs_SAT.id_proveedor = mc_c_proveedor.id_proveedor) INNER JOIN mc_c_ServContractual ON\n\n" .
        "mc_calificacion_rs_SAT.id_servicio_cont = mc_c_ServContractual.Id) INNER JOIN mc_c_servicio ON\n\n" .
        "mc_calificacion_rs_SAT.id_servicio_negocio = mc_c_servicio.id_servicio) INNER JOIN mc_c_mes ON\n\n" .
        "mc_calificacion_rs_SAT.MesReporte = mc_c_mes.IdMes) INNER JOIN mc_universo_cds ON\n\n" .
        "mc_calificacion_rs_SAT.IdUniverso = mc_universo_cds.id {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-AFD9CC78
    function SetValues()
    {
        $this->id_ppmc->SetDBValue(trim($this->f("id_ppmc")));
        $this->id_proveedor->SetDBValue($this->f("RazonSocial"));
        $this->id_servicio_negocio->SetDBValue($this->f("mc_c_servicio_nombre"));
        $this->id_tipo->SetDBValue(trim($this->f("id_tipo")));
        $this->descripci_n->SetDBValue($this->f("descripción"));
        $this->Obs_manuales->SetDBValue($this->f("Obs_manuales"));
        $this->mc_c_ServContractual_Desc->SetDBValue($this->f("mc_c_ServContractual_Desc"));
        $this->AnioReporte->SetDBValue(trim($this->f("AnioReporte")));
        $this->MesReporte->SetDBValue($this->f("mc_c_mes_Mes"));
        $this->HERR_EST_COST->SetDBValue(trim($this->f("HERR_EST_COST")));
        $this->REQ_SERV->SetDBValue(trim($this->f("REQ_SERV")));
        $this->OBS_HERR_EST_COST->SetDBValue($this->f("OBS_HERR_EST_COST"));
        $this->CUMPL_REQ_FUNC->SetDBValue(trim($this->f("CUMPL_REQ_FUNC")));
        $this->OBS_CUMPL_REQ_FUNC->SetDBValue($this->f("OBS_CUMPL_REQ_FUNC"));
        $this->CALIDAD_PROD_TERM->SetDBValue(trim($this->f("CALIDAD_PROD_TERM")));
        $this->OBS_CALIDAD_PROD_TERM->SetDBValue($this->f("OBS_CALIDAD_PROD_TERM"));
        $this->RETR_ENTREGABLE->SetDBValue(trim($this->f("RETR_ENTREGABLE")));
        $this->OBS_COMPL_RUTA_CRITICA->SetDBValue($this->f("OBS_COMPL_RUTA_CRITICA"));
        $this->EST_PROY->SetDBValue(trim($this->f("EST_PROY")));
        $this->OBS_EST_PROY->SetDBValue($this->f("OBS_EST_PROY"));
        $this->DEF_FUG_AMB_PROD->SetDBValue(trim($this->f("DEF_FUG_AMB_PROD")));
        $this->OBS_DEF_FUG_AMB_PROD->SetDBValue($this->f("OBS_DEF_FUG_AMB_PROD"));
    }
//End SetValues Method

//Update Method @2-CBC5691A
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["HERR_EST_COST"] = new clsSQLParameter("ctrlHERR_EST_COST", ccsInteger, "", "", $this->HERR_EST_COST->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["REQ_SERV"] = new clsSQLParameter("ctrlREQ_SERV", ccsInteger, "", "", $this->REQ_SERV->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CUMPL_REQ_FUNC"] = new clsSQLParameter("ctrlCUMPL_REQ_FUNC", ccsInteger, "", "", $this->CUMPL_REQ_FUNC->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CALIDAD_PROD_TERM"] = new clsSQLParameter("ctrlCALIDAD_PROD_TERM", ccsInteger, "", "", $this->CALIDAD_PROD_TERM->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["RETR_ENTREGABLE"] = new clsSQLParameter("ctrlRETR_ENTREGABLE", ccsInteger, "", "", $this->RETR_ENTREGABLE->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["COMPL_RUTA_CRITICA"] = new clsSQLParameter("ctrlCOMPL_RUTA_CRITICA", ccsInteger, "", "", $this->COMPL_RUTA_CRITICA->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["EST_PROY"] = new clsSQLParameter("ctrlEST_PROY", ccsInteger, "", "", $this->EST_PROY->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["DEF_FUG_AMB_PROD"] = new clsSQLParameter("ctrlDEF_FUG_AMB_PROD", ccsInteger, "", "", $this->DEF_FUG_AMB_PROD->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Obs_manuales"] = new clsSQLParameter("ctrlObs_manuales", ccsText, "", "", $this->Obs_manuales->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["UsuarioUltMod"] = new clsSQLParameter("expr181", ccsText, "", "", CCGetUserLogin(), NULL, false, $this->ErrorBlock);
        $this->cp["FechaUltMod"] = new clsSQLParameter("expr182", ccsText, "", "", date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlIdUniverso", ccsInteger, "", "", CCGetFromGet("IdUniverso", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["HERR_EST_COST"]->GetValue()) and !strlen($this->cp["HERR_EST_COST"]->GetText()) and !is_bool($this->cp["HERR_EST_COST"]->GetValue())) 
            $this->cp["HERR_EST_COST"]->SetValue($this->HERR_EST_COST->GetValue(true));
        if (!is_null($this->cp["REQ_SERV"]->GetValue()) and !strlen($this->cp["REQ_SERV"]->GetText()) and !is_bool($this->cp["REQ_SERV"]->GetValue())) 
            $this->cp["REQ_SERV"]->SetValue($this->REQ_SERV->GetValue(true));
        if (!is_null($this->cp["CUMPL_REQ_FUNC"]->GetValue()) and !strlen($this->cp["CUMPL_REQ_FUNC"]->GetText()) and !is_bool($this->cp["CUMPL_REQ_FUNC"]->GetValue())) 
            $this->cp["CUMPL_REQ_FUNC"]->SetValue($this->CUMPL_REQ_FUNC->GetValue(true));
        if (!is_null($this->cp["CALIDAD_PROD_TERM"]->GetValue()) and !strlen($this->cp["CALIDAD_PROD_TERM"]->GetText()) and !is_bool($this->cp["CALIDAD_PROD_TERM"]->GetValue())) 
            $this->cp["CALIDAD_PROD_TERM"]->SetValue($this->CALIDAD_PROD_TERM->GetValue(true));
        if (!is_null($this->cp["RETR_ENTREGABLE"]->GetValue()) and !strlen($this->cp["RETR_ENTREGABLE"]->GetText()) and !is_bool($this->cp["RETR_ENTREGABLE"]->GetValue())) 
            $this->cp["RETR_ENTREGABLE"]->SetValue($this->RETR_ENTREGABLE->GetValue(true));
        if (!is_null($this->cp["COMPL_RUTA_CRITICA"]->GetValue()) and !strlen($this->cp["COMPL_RUTA_CRITICA"]->GetText()) and !is_bool($this->cp["COMPL_RUTA_CRITICA"]->GetValue())) 
            $this->cp["COMPL_RUTA_CRITICA"]->SetValue($this->COMPL_RUTA_CRITICA->GetValue(true));
        if (!is_null($this->cp["EST_PROY"]->GetValue()) and !strlen($this->cp["EST_PROY"]->GetText()) and !is_bool($this->cp["EST_PROY"]->GetValue())) 
            $this->cp["EST_PROY"]->SetValue($this->EST_PROY->GetValue(true));
        if (!is_null($this->cp["DEF_FUG_AMB_PROD"]->GetValue()) and !strlen($this->cp["DEF_FUG_AMB_PROD"]->GetText()) and !is_bool($this->cp["DEF_FUG_AMB_PROD"]->GetValue())) 
            $this->cp["DEF_FUG_AMB_PROD"]->SetValue($this->DEF_FUG_AMB_PROD->GetValue(true));
        if (!is_null($this->cp["Obs_manuales"]->GetValue()) and !strlen($this->cp["Obs_manuales"]->GetText()) and !is_bool($this->cp["Obs_manuales"]->GetValue())) 
            $this->cp["Obs_manuales"]->SetValue($this->Obs_manuales->GetValue(true));
        if (!is_null($this->cp["UsuarioUltMod"]->GetValue()) and !strlen($this->cp["UsuarioUltMod"]->GetText()) and !is_bool($this->cp["UsuarioUltMod"]->GetValue())) 
            $this->cp["UsuarioUltMod"]->SetValue(CCGetUserLogin());
        if (!is_null($this->cp["FechaUltMod"]->GetValue()) and !strlen($this->cp["FechaUltMod"]->GetText()) and !is_bool($this->cp["FechaUltMod"]->GetValue())) 
            $this->cp["FechaUltMod"]->SetValue(date("Y-m-d H:i:s"));
        if (!strlen($this->cp["FechaUltMod"]->GetText()) and !is_bool($this->cp["FechaUltMod"]->GetValue(true))) 
            $this->cp["FechaUltMod"]->SetText(date("Y-m-d H:i:s"));
        $wp->Criterion[1] = $wp->Operation(opEqual, "[IdUniverso]", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["HERR_EST_COST"]["Value"] = $this->cp["HERR_EST_COST"]->GetDBValue(true);
        $this->UpdateFields["REQ_SERV"]["Value"] = $this->cp["REQ_SERV"]->GetDBValue(true);
        $this->UpdateFields["CUMPL_REQ_FUNC"]["Value"] = $this->cp["CUMPL_REQ_FUNC"]->GetDBValue(true);
        $this->UpdateFields["CALIDAD_PROD_TERM"]["Value"] = $this->cp["CALIDAD_PROD_TERM"]->GetDBValue(true);
        $this->UpdateFields["RETR_ENTREGABLE"]["Value"] = $this->cp["RETR_ENTREGABLE"]->GetDBValue(true);
        $this->UpdateFields["COMPL_RUTA_CRITICA"]["Value"] = $this->cp["COMPL_RUTA_CRITICA"]->GetDBValue(true);
        $this->UpdateFields["EST_PROY"]["Value"] = $this->cp["EST_PROY"]->GetDBValue(true);
        $this->UpdateFields["DEF_FUG_AMB_PROD"]["Value"] = $this->cp["DEF_FUG_AMB_PROD"]->GetDBValue(true);
        $this->UpdateFields["Obs_manuales"]["Value"] = $this->cp["Obs_manuales"]->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->cp["UsuarioUltMod"]->GetDBValue(true);
        $this->UpdateFields["FechaUltMod"]["Value"] = $this->cp["FechaUltMod"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_calificacion_rs_SAT", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End calificacion_rs_AUTDataSource Class @2-FCB6E20C

//Initialize Page @1-2B498792
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
$TemplateFileName = "CalificaPPMCSAT.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-D5F39CEF
CCSecurityRedirect("", "Login.php");
//End Authenticate User

//Include events file @1-164C1BCD
include_once("./CalificaPPMCSAT_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-BE8845CB
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$calificacion_rs_AUT = new clsRecordcalificacion_rs_AUT("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->calificacion_rs_AUT = & $calificacion_rs_AUT;
$calificacion_rs_AUT->Initialize();
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

//Execute Components @1-FB37DFF7
$calificacion_rs_AUT->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-34925DB0
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($calificacion_rs_AUT);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-FEFE9E3E
$Header->Show();
$calificacion_rs_AUT->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-D4BADE5E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($calificacion_rs_AUT);
unset($Tpl);
//End Unload Page


?>
