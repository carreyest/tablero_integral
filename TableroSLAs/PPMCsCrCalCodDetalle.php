<?php
//Include Common Files @1-4EA5A261
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsCrCalCodDetalle.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_info_rs_CC { //mc_info_rs_CC Class @27-62C12348

//Variables @27-9E315808

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

//Class_Initialize Event @27-F587B0A0
    function clsRecordmc_info_rs_CC($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_rs_CC/Error";
        $this->DataSource = new clsmc_info_rs_CCDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_rs_CC";
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
            $this->Id_PPMC = new clsControl(ccsLabel, "Id_PPMC", "Id_PPMC", ccsInteger, "", CCGetRequestParam("Id_PPMC", $Method, NULL), $this);
            $this->ID_Estimacion = new clsControl(ccsLabel, "ID_Estimacion", "ID_Estimacion", ccsInteger, "", CCGetRequestParam("ID_Estimacion", $Method, NULL), $this);
            $this->PctReglas = new clsControl(ccsTextBox, "PctReglas", "Pct Calidad", ccsFloat, array(True, 2, Null, "", False, array("#"), array("#", "#"), 1, True, ""), CCGetRequestParam("PctReglas", $Method, NULL), $this);
            $this->CumpleCalidadCod = new clsControl(ccsListBox, "CumpleCalidadCod", "Cumple Calidad Cod", ccsInteger, "", CCGetRequestParam("CumpleCalidadCod", $Method, NULL), $this);
            $this->CumpleCalidadCod->DSType = dsListOfValues;
            $this->CumpleCalidadCod->Values = array(array("-1", "No Aplica"), array("1", "Cumplio"), array("0", "No Cumplio"));
            $this->UsuarioUltMod = new clsControl(ccsHidden, "UsuarioUltMod", "Usuario Ult Mod", ccsText, "", CCGetRequestParam("UsuarioUltMod", $Method, NULL), $this);
            $this->FechaUltMod = new clsControl(ccsHidden, "FechaUltMod", "Fecha Ult Mod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn"), CCGetRequestParam("FechaUltMod", $Method, NULL), $this);
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsText, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->PctMetricas = new clsControl(ccsTextBox, "PctMetricas", "PctMetricas", ccsFloat, array(True, 2, Null, "", False, array("#"), array("#", "#"), 1, True, ""), CCGetRequestParam("PctMetricas", $Method, NULL), $this);
            $this->Id_PPMC_HID = new clsControl(ccsHidden, "Id_PPMC_HID", "Id_PPMC_HID", ccsText, "", CCGetRequestParam("Id_PPMC_HID", $Method, NULL), $this);
            $this->ID_Estimacion_HID = new clsControl(ccsHidden, "ID_Estimacion_HID", "ID_Estimacion_HID", ccsText, "", CCGetRequestParam("ID_Estimacion_HID", $Method, NULL), $this);
            $this->mesMed = new clsControl(ccsHidden, "mesMed", "mesMed", ccsText, "", CCGetRequestParam("mesMed", $Method, NULL), $this);
            $this->anioMed = new clsControl(ccsHidden, "anioMed", "anioMed", ccsText, "", CCGetRequestParam("anioMed", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->FechaUltMod->Value) && !strlen($this->FechaUltMod->Value) && $this->FechaUltMod->Value !== false)
                    $this->FechaUltMod->SetText(date("Y-m-d H:i"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @27-4F76030F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//Validate Method @27-EB68D12A
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->PctReglas->Validate() && $Validation);
        $Validation = ($this->CumpleCalidadCod->Validate() && $Validation);
        $Validation = ($this->UsuarioUltMod->Validate() && $Validation);
        $Validation = ($this->FechaUltMod->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->PctMetricas->Validate() && $Validation);
        $Validation = ($this->Id_PPMC_HID->Validate() && $Validation);
        $Validation = ($this->ID_Estimacion_HID->Validate() && $Validation);
        $Validation = ($this->mesMed->Validate() && $Validation);
        $Validation = ($this->anioMed->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->PctReglas->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumpleCalidadCod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsuarioUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PctMetricas->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Id_PPMC_HID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ID_Estimacion_HID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->mesMed->Errors->Count() == 0);
        $Validation =  $Validation && ($this->anioMed->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @27-75C1951C
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Id_PPMC->Errors->Count());
        $errors = ($errors || $this->ID_Estimacion->Errors->Count());
        $errors = ($errors || $this->PctReglas->Errors->Count());
        $errors = ($errors || $this->CumpleCalidadCod->Errors->Count());
        $errors = ($errors || $this->UsuarioUltMod->Errors->Count());
        $errors = ($errors || $this->FechaUltMod->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->PctMetricas->Errors->Count());
        $errors = ($errors || $this->Id_PPMC_HID->Errors->Count());
        $errors = ($errors || $this->ID_Estimacion_HID->Errors->Count());
        $errors = ($errors || $this->mesMed->Errors->Count());
        $errors = ($errors || $this->anioMed->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @27-E955BD63
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

//InsertRow Method @27-1C4C9A4D
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->PctReglas->SetValue($this->PctReglas->GetValue(true));
        $this->DataSource->CumpleCalidadCod->SetValue($this->CumpleCalidadCod->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->PctMetricas->SetValue($this->PctMetricas->GetValue(true));
        $this->DataSource->Id_PPMC_HID->SetValue($this->Id_PPMC_HID->GetValue(true));
        $this->DataSource->ID_Estimacion_HID->SetValue($this->ID_Estimacion_HID->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @27-7150333B
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->PctReglas->SetValue($this->PctReglas->GetValue(true));
        $this->DataSource->Id_PPMC_HID->SetValue($this->Id_PPMC_HID->GetValue(true));
        $this->DataSource->ID_Estimacion_HID->SetValue($this->ID_Estimacion_HID->GetValue(true));
        $this->DataSource->PctMetricas->SetValue($this->PctMetricas->GetValue(true));
        $this->DataSource->CumpleCalidadCod->SetValue($this->CumpleCalidadCod->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @27-76BDABB6
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

        $this->CumpleCalidadCod->Prepare();

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
                $this->Id_PPMC->SetValue($this->DataSource->Id_PPMC->GetValue());
                $this->ID_Estimacion->SetValue($this->DataSource->ID_Estimacion->GetValue());
                if(!$this->FormSubmitted){
                    $this->PctReglas->SetValue($this->DataSource->PctReglas->GetValue());
                    $this->CumpleCalidadCod->SetValue($this->DataSource->CumpleCalidadCod->GetValue());
                    $this->UsuarioUltMod->SetValue($this->DataSource->UsuarioUltMod->GetValue());
                    $this->FechaUltMod->SetValue($this->DataSource->FechaUltMod->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                    $this->PctMetricas->SetValue($this->DataSource->PctMetricas->GetValue());
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
            $Error = ComposeStrings($Error, $this->PctReglas->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumpleCalidadCod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsuarioUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PctMetricas->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Id_PPMC_HID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ID_Estimacion_HID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mesMed->Errors->ToString());
            $Error = ComposeStrings($Error, $this->anioMed->Errors->ToString());
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
        $this->PctReglas->Show();
        $this->CumpleCalidadCod->Show();
        $this->UsuarioUltMod->Show();
        $this->FechaUltMod->Show();
        $this->Observaciones->Show();
        $this->PctMetricas->Show();
        $this->Id_PPMC_HID->Show();
        $this->ID_Estimacion_HID->Show();
        $this->mesMed->Show();
        $this->anioMed->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_rs_CC Class @27-FCB6E20C

class clsmc_info_rs_CCDataSource extends clsDBcnDisenio {  //mc_info_rs_CCDataSource Class @27-E5C326FA

//DataSource Variables @27-B04F1B86
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
    public $PctReglas;
    public $CumpleCalidadCod;
    public $UsuarioUltMod;
    public $FechaUltMod;
    public $Observaciones;
    public $PctMetricas;
    public $Id_PPMC_HID;
    public $ID_Estimacion_HID;
    public $mesMed;
    public $anioMed;
//End DataSource Variables

//DataSourceClass_Initialize Event @27-9C5F9D08
    function clsmc_info_rs_CCDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_rs_CC/Error";
        $this->Initialize();
        $this->Id_PPMC = new clsField("Id_PPMC", ccsInteger, "");
        
        $this->ID_Estimacion = new clsField("ID_Estimacion", ccsInteger, "");
        
        $this->PctReglas = new clsField("PctReglas", ccsFloat, "");
        
        $this->CumpleCalidadCod = new clsField("CumpleCalidadCod", ccsInteger, "");
        
        $this->UsuarioUltMod = new clsField("UsuarioUltMod", ccsText, "");
        
        $this->FechaUltMod = new clsField("FechaUltMod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->PctMetricas = new clsField("PctMetricas", ccsFloat, "");
        
        $this->Id_PPMC_HID = new clsField("Id_PPMC_HID", ccsText, "");
        
        $this->ID_Estimacion_HID = new clsField("ID_Estimacion_HID", ccsText, "");
        
        $this->mesMed = new clsField("mesMed", ccsText, "");
        
        $this->anioMed = new clsField("anioMed", ccsText, "");
        

        $this->InsertFields["PctReglas"] = array("Name" => "[PctReglas]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["CumpleCalidadCod"] = array("Name" => "[CumpleCalidadCod]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PctMetricas"] = array("Name" => "[PctMetricas]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["Id_PPMC"] = array("Name" => "[Id_PPMC]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["ID_Estimacion"] = array("Name" => "[ID_Estimacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IdUniverso"] = array("Name" => "[IdUniverso]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PctReglas"] = array("Name" => "[PctReglas]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id_PPMC"] = array("Name" => "[Id_PPMC]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ID_Estimacion"] = array("Name" => "[ID_Estimacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PctMetricas"] = array("Name" => "[PctMetricas]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumpleCalidadCod"] = array("Name" => "[CumpleCalidadCod]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @27-D63607C7
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId", ccsInteger, "", "", $this->Parameters["urlId"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[IdUniverso]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @27-BE481804
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_info_rs_CC {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @27-EF11AD7D
    function SetValues()
    {
        $this->Id_PPMC->SetDBValue(trim($this->f("Id_PPMC")));
        $this->ID_Estimacion->SetDBValue(trim($this->f("ID_Estimacion")));
        $this->PctReglas->SetDBValue(trim($this->f("PctReglas")));
        $this->CumpleCalidadCod->SetDBValue(trim($this->f("CumpleCalidadCod")));
        $this->UsuarioUltMod->SetDBValue($this->f("UsuarioUltMod"));
        $this->FechaUltMod->SetDBValue(trim($this->f("FechaUltMod")));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
        $this->PctMetricas->SetDBValue(trim($this->f("PctMetricas")));
    }
//End SetValues Method

//Insert Method @27-EF0C7B4B
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["PctReglas"] = new clsSQLParameter("ctrlPctReglas", ccsFloat, array(True, 2, Null, "", False, array("#"), array("#", "#"), 1, True, ""), "", $this->PctReglas->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CumpleCalidadCod"] = new clsSQLParameter("ctrlCumpleCalidadCod", ccsInteger, "", "", $this->CumpleCalidadCod->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["UsuarioUltMod"] = new clsSQLParameter("ctrlUsuarioUltMod", ccsText, "", "", $this->UsuarioUltMod->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FechaUltMod"] = new clsSQLParameter("ctrlFechaUltMod", ccsDate, array("ShortDate"), $this->DateFormat, $this->FechaUltMod->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Observaciones"] = new clsSQLParameter("ctrlObservaciones", ccsText, "", "", $this->Observaciones->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PctMetricas"] = new clsSQLParameter("ctrlPctMetricas", ccsFloat, array(True, 2, Null, "", False, array("#"), array("#", "#"), 1, True, ""), "", $this->PctMetricas->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Id_PPMC"] = new clsSQLParameter("ctrlId_PPMC_HID", ccsInteger, "", "", $this->Id_PPMC_HID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ID_Estimacion"] = new clsSQLParameter("ctrlID_Estimacion_HID", ccsInteger, "", "", $this->ID_Estimacion_HID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["IdUniverso"] = new clsSQLParameter("urlId", ccsInteger, "", "", CCGetFromGet("Id", NULL), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["PctReglas"]->GetValue()) and !strlen($this->cp["PctReglas"]->GetText()) and !is_bool($this->cp["PctReglas"]->GetValue())) 
            $this->cp["PctReglas"]->SetValue($this->PctReglas->GetValue(true));
        if (!is_null($this->cp["CumpleCalidadCod"]->GetValue()) and !strlen($this->cp["CumpleCalidadCod"]->GetText()) and !is_bool($this->cp["CumpleCalidadCod"]->GetValue())) 
            $this->cp["CumpleCalidadCod"]->SetValue($this->CumpleCalidadCod->GetValue(true));
        if (!is_null($this->cp["UsuarioUltMod"]->GetValue()) and !strlen($this->cp["UsuarioUltMod"]->GetText()) and !is_bool($this->cp["UsuarioUltMod"]->GetValue())) 
            $this->cp["UsuarioUltMod"]->SetValue($this->UsuarioUltMod->GetValue(true));
        if (!is_null($this->cp["FechaUltMod"]->GetValue()) and !strlen($this->cp["FechaUltMod"]->GetText()) and !is_bool($this->cp["FechaUltMod"]->GetValue())) 
            $this->cp["FechaUltMod"]->SetValue($this->FechaUltMod->GetValue(true));
        if (!is_null($this->cp["Observaciones"]->GetValue()) and !strlen($this->cp["Observaciones"]->GetText()) and !is_bool($this->cp["Observaciones"]->GetValue())) 
            $this->cp["Observaciones"]->SetValue($this->Observaciones->GetValue(true));
        if (!is_null($this->cp["PctMetricas"]->GetValue()) and !strlen($this->cp["PctMetricas"]->GetText()) and !is_bool($this->cp["PctMetricas"]->GetValue())) 
            $this->cp["PctMetricas"]->SetValue($this->PctMetricas->GetValue(true));
        if (!is_null($this->cp["Id_PPMC"]->GetValue()) and !strlen($this->cp["Id_PPMC"]->GetText()) and !is_bool($this->cp["Id_PPMC"]->GetValue())) 
            $this->cp["Id_PPMC"]->SetValue($this->Id_PPMC_HID->GetValue(true));
        if (!is_null($this->cp["ID_Estimacion"]->GetValue()) and !strlen($this->cp["ID_Estimacion"]->GetText()) and !is_bool($this->cp["ID_Estimacion"]->GetValue())) 
            $this->cp["ID_Estimacion"]->SetValue($this->ID_Estimacion_HID->GetValue(true));
        if (!is_null($this->cp["IdUniverso"]->GetValue()) and !strlen($this->cp["IdUniverso"]->GetText()) and !is_bool($this->cp["IdUniverso"]->GetValue())) 
            $this->cp["IdUniverso"]->SetText(CCGetFromGet("Id", NULL));
        $this->InsertFields["PctReglas"]["Value"] = $this->cp["PctReglas"]->GetDBValue(true);
        $this->InsertFields["CumpleCalidadCod"]["Value"] = $this->cp["CumpleCalidadCod"]->GetDBValue(true);
        $this->InsertFields["UsuarioUltMod"]["Value"] = $this->cp["UsuarioUltMod"]->GetDBValue(true);
        $this->InsertFields["FechaUltMod"]["Value"] = $this->cp["FechaUltMod"]->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->cp["Observaciones"]->GetDBValue(true);
        $this->InsertFields["PctMetricas"]["Value"] = $this->cp["PctMetricas"]->GetDBValue(true);
        $this->InsertFields["Id_PPMC"]["Value"] = $this->cp["Id_PPMC"]->GetDBValue(true);
        $this->InsertFields["ID_Estimacion"]["Value"] = $this->cp["ID_Estimacion"]->GetDBValue(true);
        $this->InsertFields["IdUniverso"]["Value"] = $this->cp["IdUniverso"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_info_rs_CC", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @27-55731000
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["PctReglas"] = new clsSQLParameter("ctrlPctReglas", ccsFloat, "", "", $this->PctReglas->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Id_PPMC"] = new clsSQLParameter("ctrlId_PPMC_HID", ccsInteger, "", "", $this->Id_PPMC_HID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ID_Estimacion"] = new clsSQLParameter("ctrlID_Estimacion_HID", ccsInteger, "", "", $this->ID_Estimacion_HID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["PctMetricas"] = new clsSQLParameter("ctrlPctMetricas", ccsFloat, "", "", $this->PctMetricas->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CumpleCalidadCod"] = new clsSQLParameter("ctrlCumpleCalidadCod", ccsInteger, "", "", $this->CumpleCalidadCod->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["UsuarioUltMod"] = new clsSQLParameter("ctrlUsuarioUltMod", ccsText, "", "", $this->UsuarioUltMod->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["FechaUltMod"] = new clsSQLParameter("ctrlFechaUltMod", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->FechaUltMod->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["Observaciones"] = new clsSQLParameter("ctrlObservaciones", ccsText, "", "", $this->Observaciones->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlId", ccsInteger, "", "", CCGetFromGet("Id", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["PctReglas"]->GetValue()) and !strlen($this->cp["PctReglas"]->GetText()) and !is_bool($this->cp["PctReglas"]->GetValue())) 
            $this->cp["PctReglas"]->SetValue($this->PctReglas->GetValue(true));
        if (!is_null($this->cp["Id_PPMC"]->GetValue()) and !strlen($this->cp["Id_PPMC"]->GetText()) and !is_bool($this->cp["Id_PPMC"]->GetValue())) 
            $this->cp["Id_PPMC"]->SetValue($this->Id_PPMC_HID->GetValue(true));
        if (!is_null($this->cp["ID_Estimacion"]->GetValue()) and !strlen($this->cp["ID_Estimacion"]->GetText()) and !is_bool($this->cp["ID_Estimacion"]->GetValue())) 
            $this->cp["ID_Estimacion"]->SetValue($this->ID_Estimacion_HID->GetValue(true));
        if (!is_null($this->cp["PctMetricas"]->GetValue()) and !strlen($this->cp["PctMetricas"]->GetText()) and !is_bool($this->cp["PctMetricas"]->GetValue())) 
            $this->cp["PctMetricas"]->SetValue($this->PctMetricas->GetValue(true));
        if (!is_null($this->cp["CumpleCalidadCod"]->GetValue()) and !strlen($this->cp["CumpleCalidadCod"]->GetText()) and !is_bool($this->cp["CumpleCalidadCod"]->GetValue())) 
            $this->cp["CumpleCalidadCod"]->SetValue($this->CumpleCalidadCod->GetValue(true));
        if (!is_null($this->cp["UsuarioUltMod"]->GetValue()) and !strlen($this->cp["UsuarioUltMod"]->GetText()) and !is_bool($this->cp["UsuarioUltMod"]->GetValue())) 
            $this->cp["UsuarioUltMod"]->SetValue($this->UsuarioUltMod->GetValue(true));
        if (!is_null($this->cp["FechaUltMod"]->GetValue()) and !strlen($this->cp["FechaUltMod"]->GetText()) and !is_bool($this->cp["FechaUltMod"]->GetValue())) 
            $this->cp["FechaUltMod"]->SetValue($this->FechaUltMod->GetValue(true));
        if (!is_null($this->cp["Observaciones"]->GetValue()) and !strlen($this->cp["Observaciones"]->GetText()) and !is_bool($this->cp["Observaciones"]->GetValue())) 
            $this->cp["Observaciones"]->SetValue($this->Observaciones->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "[IdUniverso]", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["PctReglas"]["Value"] = $this->cp["PctReglas"]->GetDBValue(true);
        $this->UpdateFields["Id_PPMC"]["Value"] = $this->cp["Id_PPMC"]->GetDBValue(true);
        $this->UpdateFields["ID_Estimacion"]["Value"] = $this->cp["ID_Estimacion"]->GetDBValue(true);
        $this->UpdateFields["PctMetricas"]["Value"] = $this->cp["PctMetricas"]->GetDBValue(true);
        $this->UpdateFields["CumpleCalidadCod"]["Value"] = $this->cp["CumpleCalidadCod"]->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->cp["UsuarioUltMod"]->GetDBValue(true);
        $this->UpdateFields["FechaUltMod"]["Value"] = $this->cp["FechaUltMod"]->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->cp["Observaciones"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_rs_CC", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

} //End mc_info_rs_CCDataSource Class @27-FCB6E20C

class clsGridCalidadCodigoMetricas { //CalidadCodigoMetricas class @47-C2C0059A

//Variables @47-5F97FA3E

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
    public $Sorter_Paquete;
    public $Sorter_N_mero_del_Aplicativo;
    public $Sorter_Servicio_de_Negocio;
    public $Sorter_Tipo_de_requerimiento;
    public $Sorter_Nombre_del_CDS;
    public $Sorter_Porcentaje_de_calidad_m_tricas;
//End Variables

//Class_Initialize Event @47-05C47FFB
    function clsGridCalidadCodigoMetricas($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "CalidadCodigoMetricas";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid CalidadCodigoMetricas";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsCalidadCodigoMetricasDataSource($this);
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
        $this->SorterName = CCGetParam("CalidadCodigoMetricasOrder", "");
        $this->SorterDirection = CCGetParam("CalidadCodigoMetricasDir", "");

        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", CCGetRequestParam("Paquete", ccsGet, NULL), $this);
        $this->N_mero_del_Aplicativo = new clsControl(ccsLabel, "N_mero_del_Aplicativo", "N_mero_del_Aplicativo", ccsText, "", CCGetRequestParam("N_mero_del_Aplicativo", ccsGet, NULL), $this);
        $this->Servicio_de_Negocio = new clsControl(ccsLabel, "Servicio_de_Negocio", "Servicio_de_Negocio", ccsText, "", CCGetRequestParam("Servicio_de_Negocio", ccsGet, NULL), $this);
        $this->Tipo_de_requerimiento = new clsControl(ccsLabel, "Tipo_de_requerimiento", "Tipo_de_requerimiento", ccsText, "", CCGetRequestParam("Tipo_de_requerimiento", ccsGet, NULL), $this);
        $this->Nombre_del_CDS = new clsControl(ccsLabel, "Nombre_del_CDS", "Nombre_del_CDS", ccsText, "", CCGetRequestParam("Nombre_del_CDS", ccsGet, NULL), $this);
        $this->Porcentaje_de_calidad_m_tricas = new clsControl(ccsLabel, "Porcentaje_de_calidad_m_tricas", "Porcentaje_de_calidad_m_tricas", ccsFloat, "", CCGetRequestParam("Porcentaje_de_calidad_m_tricas", ccsGet, NULL), $this);
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
        $this->Sorter_N_mero_del_Aplicativo = new clsSorter($this->ComponentName, "Sorter_N_mero_del_Aplicativo", $FileName, $this);
        $this->Sorter_Servicio_de_Negocio = new clsSorter($this->ComponentName, "Sorter_Servicio_de_Negocio", $FileName, $this);
        $this->Sorter_Tipo_de_requerimiento = new clsSorter($this->ComponentName, "Sorter_Tipo_de_requerimiento", $FileName, $this);
        $this->Sorter_Nombre_del_CDS = new clsSorter($this->ComponentName, "Sorter_Nombre_del_CDS", $FileName, $this);
        $this->Sorter_Porcentaje_de_calidad_m_tricas = new clsSorter($this->ComponentName, "Sorter_Porcentaje_de_calidad_m_tricas", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @47-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @47-49BC0AA1
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;


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
            $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
            $this->ControlsVisible["N_mero_del_Aplicativo"] = $this->N_mero_del_Aplicativo->Visible;
            $this->ControlsVisible["Servicio_de_Negocio"] = $this->Servicio_de_Negocio->Visible;
            $this->ControlsVisible["Tipo_de_requerimiento"] = $this->Tipo_de_requerimiento->Visible;
            $this->ControlsVisible["Nombre_del_CDS"] = $this->Nombre_del_CDS->Visible;
            $this->ControlsVisible["Porcentaje_de_calidad_m_tricas"] = $this->Porcentaje_de_calidad_m_tricas->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                $this->N_mero_del_Aplicativo->SetValue($this->DataSource->N_mero_del_Aplicativo->GetValue());
                $this->Servicio_de_Negocio->SetValue($this->DataSource->Servicio_de_Negocio->GetValue());
                $this->Tipo_de_requerimiento->SetValue($this->DataSource->Tipo_de_requerimiento->GetValue());
                $this->Nombre_del_CDS->SetValue($this->DataSource->Nombre_del_CDS->GetValue());
                $this->Porcentaje_de_calidad_m_tricas->SetValue($this->DataSource->Porcentaje_de_calidad_m_tricas->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Paquete->Show();
                $this->N_mero_del_Aplicativo->Show();
                $this->Servicio_de_Negocio->Show();
                $this->Tipo_de_requerimiento->Show();
                $this->Nombre_del_CDS->Show();
                $this->Porcentaje_de_calidad_m_tricas->Show();
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
        $this->Sorter_Paquete->Show();
        $this->Sorter_N_mero_del_Aplicativo->Show();
        $this->Sorter_Servicio_de_Negocio->Show();
        $this->Sorter_Tipo_de_requerimiento->Show();
        $this->Sorter_Nombre_del_CDS->Show();
        $this->Sorter_Porcentaje_de_calidad_m_tricas->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @47-C0A7CC71
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Paquete->Errors->ToString());
        $errors = ComposeStrings($errors, $this->N_mero_del_Aplicativo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Servicio_de_Negocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Tipo_de_requerimiento->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Nombre_del_CDS->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Porcentaje_de_calidad_m_tricas->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End CalidadCodigoMetricas Class @47-FCB6E20C

class clsCalidadCodigoMetricasDataSource extends clsDBConnCarga {  //CalidadCodigoMetricasDataSource Class @47-565431F3

//DataSource Variables @47-B2C6D0FE
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Paquete;
    public $N_mero_del_Aplicativo;
    public $Servicio_de_Negocio;
    public $Tipo_de_requerimiento;
    public $Nombre_del_CDS;
    public $Porcentaje_de_calidad_m_tricas;
//End DataSource Variables

//DataSourceClass_Initialize Event @47-903647CC
    function clsCalidadCodigoMetricasDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid CalidadCodigoMetricas";
        $this->Initialize();
        $this->Paquete = new clsField("Paquete", ccsText, "");
        
        $this->N_mero_del_Aplicativo = new clsField("N_mero_del_Aplicativo", ccsText, "");
        
        $this->Servicio_de_Negocio = new clsField("Servicio_de_Negocio", ccsText, "");
        
        $this->Tipo_de_requerimiento = new clsField("Tipo_de_requerimiento", ccsText, "");
        
        $this->Nombre_del_CDS = new clsField("Nombre_del_CDS", ccsText, "");
        
        $this->Porcentaje_de_calidad_m_tricas = new clsField("Porcentaje_de_calidad_m_tricas", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @47-C0F6C78B
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Paquete" => array("Paquete", ""), 
            "Sorter_N_mero_del_Aplicativo" => array("[Número del Aplicativo]", ""), 
            "Sorter_Servicio_de_Negocio" => array("[Servicio de Negocio]", ""), 
            "Sorter_Tipo_de_requerimiento" => array("[Tipo de requerimiento]", ""), 
            "Sorter_Nombre_del_CDS" => array("[Nombre del CDS]", ""), 
            "Sorter_Porcentaje_de_calidad_m_tricas" => array("[Porcentaje de calidad métricas]", "")));
    }
//End SetOrder Method

//Prepare Method @47-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @47-104EE274
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM CalidadCodigoMetricas";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} Paquete, [Número del Aplicativo] AS [Número_del Aplicativo], [Servicio de Negocio] AS [Servicio_de Negocio], [Tipo de requerimiento] AS [Tipo_de requerimiento],\n\n" .
        "[Nombre del CDS] AS [Nombre_del CDS], [Porcentaje de calidad métricas] AS [Porcentaje_de calidad métricas] \n\n" .
        "FROM CalidadCodigoMetricas {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @47-2D3899BD
    function SetValues()
    {
        $this->Paquete->SetDBValue($this->f("Paquete"));
        $this->N_mero_del_Aplicativo->SetDBValue($this->f("Número_del Aplicativo"));
        $this->Servicio_de_Negocio->SetDBValue($this->f("Servicio_de Negocio"));
        $this->Tipo_de_requerimiento->SetDBValue($this->f("Tipo_de requerimiento"));
        $this->Nombre_del_CDS->SetDBValue($this->f("Nombre_del CDS"));
        $this->Porcentaje_de_calidad_m_tricas->SetDBValue(trim($this->f("Porcentaje_de calidad métricas")));
    }
//End SetValues Method

} //End CalidadCodigoMetricasDataSource Class @47-FCB6E20C

class clsGridCalidadCodigoReglas { //CalidadCodigoReglas class @123-97C37DC8

//Variables @123-40316A4B

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
    public $Sorter_PPMC;
    public $Sorter_N_mero_del_Aplicativo;
    public $Sorter_Servicio_de_Negocio;
    public $Sorter_Tipo_de_requerimiento;
    public $Sorter_Nombre_del_CDS;
    public $Sorter_Porcentaje_de_Calidad_de_C_digo;
    public $Sorter_Paquete;
//End Variables

//Class_Initialize Event @123-5DA8268B
    function clsGridCalidadCodigoReglas($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "CalidadCodigoReglas";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid CalidadCodigoReglas";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsCalidadCodigoReglasDataSource($this);
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
        $this->SorterName = CCGetParam("CalidadCodigoReglasOrder", "");
        $this->SorterDirection = CCGetParam("CalidadCodigoReglasDir", "");

        $this->PPMC = new clsControl(ccsLabel, "PPMC", "PPMC", ccsText, "", CCGetRequestParam("PPMC", ccsGet, NULL), $this);
        $this->N_mero_del_Aplicativo = new clsControl(ccsLabel, "N_mero_del_Aplicativo", "N_mero_del_Aplicativo", ccsFloat, "", CCGetRequestParam("N_mero_del_Aplicativo", ccsGet, NULL), $this);
        $this->Servicio_de_Negocio = new clsControl(ccsLabel, "Servicio_de_Negocio", "Servicio_de_Negocio", ccsText, "", CCGetRequestParam("Servicio_de_Negocio", ccsGet, NULL), $this);
        $this->Tipo_de_requerimiento = new clsControl(ccsLabel, "Tipo_de_requerimiento", "Tipo_de_requerimiento", ccsText, "", CCGetRequestParam("Tipo_de_requerimiento", ccsGet, NULL), $this);
        $this->Nombre_del_CDS = new clsControl(ccsLabel, "Nombre_del_CDS", "Nombre_del_CDS", ccsText, "", CCGetRequestParam("Nombre_del_CDS", ccsGet, NULL), $this);
        $this->Porcentaje_de_Calidad_de_C_digo = new clsControl(ccsLabel, "Porcentaje_de_Calidad_de_C_digo", "Porcentaje_de_Calidad_de_C_digo", ccsFloat, "", CCGetRequestParam("Porcentaje_de_Calidad_de_C_digo", ccsGet, NULL), $this);
        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", CCGetRequestParam("Paquete", ccsGet, NULL), $this);
        $this->Sorter_PPMC = new clsSorter($this->ComponentName, "Sorter_PPMC", $FileName, $this);
        $this->Sorter_N_mero_del_Aplicativo = new clsSorter($this->ComponentName, "Sorter_N_mero_del_Aplicativo", $FileName, $this);
        $this->Sorter_Servicio_de_Negocio = new clsSorter($this->ComponentName, "Sorter_Servicio_de_Negocio", $FileName, $this);
        $this->Sorter_Tipo_de_requerimiento = new clsSorter($this->ComponentName, "Sorter_Tipo_de_requerimiento", $FileName, $this);
        $this->Sorter_Nombre_del_CDS = new clsSorter($this->ComponentName, "Sorter_Nombre_del_CDS", $FileName, $this);
        $this->Sorter_Porcentaje_de_Calidad_de_C_digo = new clsSorter($this->ComponentName, "Sorter_Porcentaje_de_Calidad_de_C_digo", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @123-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @123-513CEF64
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;


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
            $this->ControlsVisible["PPMC"] = $this->PPMC->Visible;
            $this->ControlsVisible["N_mero_del_Aplicativo"] = $this->N_mero_del_Aplicativo->Visible;
            $this->ControlsVisible["Servicio_de_Negocio"] = $this->Servicio_de_Negocio->Visible;
            $this->ControlsVisible["Tipo_de_requerimiento"] = $this->Tipo_de_requerimiento->Visible;
            $this->ControlsVisible["Nombre_del_CDS"] = $this->Nombre_del_CDS->Visible;
            $this->ControlsVisible["Porcentaje_de_Calidad_de_C_digo"] = $this->Porcentaje_de_Calidad_de_C_digo->Visible;
            $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->PPMC->SetValue($this->DataSource->PPMC->GetValue());
                $this->N_mero_del_Aplicativo->SetValue($this->DataSource->N_mero_del_Aplicativo->GetValue());
                $this->Servicio_de_Negocio->SetValue($this->DataSource->Servicio_de_Negocio->GetValue());
                $this->Tipo_de_requerimiento->SetValue($this->DataSource->Tipo_de_requerimiento->GetValue());
                $this->Nombre_del_CDS->SetValue($this->DataSource->Nombre_del_CDS->GetValue());
                $this->Porcentaje_de_Calidad_de_C_digo->SetValue($this->DataSource->Porcentaje_de_Calidad_de_C_digo->GetValue());
                $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->PPMC->Show();
                $this->N_mero_del_Aplicativo->Show();
                $this->Servicio_de_Negocio->Show();
                $this->Tipo_de_requerimiento->Show();
                $this->Nombre_del_CDS->Show();
                $this->Porcentaje_de_Calidad_de_C_digo->Show();
                $this->Paquete->Show();
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
        $this->Sorter_PPMC->Show();
        $this->Sorter_N_mero_del_Aplicativo->Show();
        $this->Sorter_Servicio_de_Negocio->Show();
        $this->Sorter_Tipo_de_requerimiento->Show();
        $this->Sorter_Nombre_del_CDS->Show();
        $this->Sorter_Porcentaje_de_Calidad_de_C_digo->Show();
        $this->Navigator->Show();
        $this->Sorter_Paquete->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @123-19CD23B1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->PPMC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->N_mero_del_Aplicativo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Servicio_de_Negocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Tipo_de_requerimiento->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Nombre_del_CDS->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Porcentaje_de_Calidad_de_C_digo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Paquete->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End CalidadCodigoReglas Class @123-FCB6E20C

class clsCalidadCodigoReglasDataSource extends clsDBConnCarga {  //CalidadCodigoReglasDataSource Class @123-B9AA5226

//DataSource Variables @123-9A493EC5
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $PPMC;
    public $N_mero_del_Aplicativo;
    public $Servicio_de_Negocio;
    public $Tipo_de_requerimiento;
    public $Nombre_del_CDS;
    public $Porcentaje_de_Calidad_de_C_digo;
    public $Paquete;
//End DataSource Variables

//DataSourceClass_Initialize Event @123-7D365EE5
    function clsCalidadCodigoReglasDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid CalidadCodigoReglas";
        $this->Initialize();
        $this->PPMC = new clsField("PPMC", ccsText, "");
        
        $this->N_mero_del_Aplicativo = new clsField("N_mero_del_Aplicativo", ccsFloat, "");
        
        $this->Servicio_de_Negocio = new clsField("Servicio_de_Negocio", ccsText, "");
        
        $this->Tipo_de_requerimiento = new clsField("Tipo_de_requerimiento", ccsText, "");
        
        $this->Nombre_del_CDS = new clsField("Nombre_del_CDS", ccsText, "");
        
        $this->Porcentaje_de_Calidad_de_C_digo = new clsField("Porcentaje_de_Calidad_de_C_digo", ccsFloat, "");
        
        $this->Paquete = new clsField("Paquete", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @123-74FF61ED
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_PPMC" => array("PPMC", ""), 
            "Sorter_N_mero_del_Aplicativo" => array("[Número del Aplicativo]", ""), 
            "Sorter_Servicio_de_Negocio" => array("[Servicio de Negocio]", ""), 
            "Sorter_Tipo_de_requerimiento" => array("[Tipo de requerimiento]", ""), 
            "Sorter_Nombre_del_CDS" => array("[Nombre del CDS]", ""), 
            "Sorter_Porcentaje_de_Calidad_de_C_digo" => array("[Porcentaje de Calidad de Código]", ""), 
            "Sorter_Paquete" => array("Paquete", "")));
    }
//End SetOrder Method

//Prepare Method @123-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @123-EB755928
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM CalidadCodigoReglas";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} [Número del Aplicativo] AS [Número_del Aplicativo], [Servicio de Negocio] AS [Servicio_de Negocio], Paquete, [Tipo de requerimiento] AS [Tipo_de requerimiento],\n\n" .
        "[Nombre del CDS] AS [Nombre_del CDS], [Porcentaje de Calidad de Código] AS [Porcentaje_de Calidad de Código] \n\n" .
        "FROM CalidadCodigoReglas {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @123-23BE4D91
    function SetValues()
    {
        $this->PPMC->SetDBValue($this->f("PPMC"));
        $this->N_mero_del_Aplicativo->SetDBValue(trim($this->f("Número_del Aplicativo")));
        $this->Servicio_de_Negocio->SetDBValue($this->f("Servicio_de Negocio"));
        $this->Tipo_de_requerimiento->SetDBValue($this->f("Tipo_de requerimiento"));
        $this->Nombre_del_CDS->SetDBValue($this->f("Nombre_del CDS"));
        $this->Porcentaje_de_Calidad_de_C_digo->SetDBValue(trim($this->f("Porcentaje_de Calidad de Código")));
        $this->Paquete->SetDBValue($this->f("Paquete"));
    }
//End SetValues Method

} //End CalidadCodigoReglasDataSource Class @123-FCB6E20C



//Initialize Page @1-4478BAF3
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
$TemplateFileName = "PPMCsCrCalCodDetalle.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-586E8DA6
include_once("./PPMCsCrCalCodDetalle_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-58F70F9A
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$DBConnCarga = new clsDBConnCarga();
$MainPage->Connections["ConnCarga"] = & $DBConnCarga;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$lkAnterior = new clsControl(ccsLink, "lkAnterior", "lkAnterior", ccsText, "", CCGetRequestParam("lkAnterior", ccsGet, NULL), $MainPage);
$lkAnterior->Page = "PPMCsDefFugDetalle.php";
$lkSiguiente = new clsControl(ccsLink, "lkSiguiente", "lkSiguiente", ccsText, "", CCGetRequestParam("lkSiguiente", ccsGet, NULL), $MainPage);
$lkSiguiente->Page = "PPMCsDefFugDetalle.php";
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
$mc_info_rs_CC = new clsRecordmc_info_rs_CC("", $MainPage);
$CalidadCodigoMetricas = new clsGridCalidadCodigoMetricas("", $MainPage);
$CalidadCodigoReglas = new clsGridCalidadCodigoReglas("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->lkAnterior = & $lkAnterior;
$MainPage->lkSiguiente = & $lkSiguiente;
$MainPage->lkReqFun = & $lkReqFun;
$MainPage->lkCalidad = & $lkCalidad;
$MainPage->lkRetEnt_Calidad = & $lkRetEnt_Calidad;
$MainPage->lkCalidadCod = & $lkCalidadCod;
$MainPage->Link1 = & $Link1;
$MainPage->mc_info_rs_CC = & $mc_info_rs_CC;
$MainPage->CalidadCodigoMetricas = & $CalidadCodigoMetricas;
$MainPage->CalidadCodigoReglas = & $CalidadCodigoReglas;
$lkReqFun->Parameters = "";
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "src", 1);
$mc_info_rs_CC->Initialize();
$CalidadCodigoMetricas->Initialize();
$CalidadCodigoReglas->Initialize();
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

//Execute Components @1-3EDB8D21
$mc_info_rs_CC->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-2D255C9B
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    $DBConnCarga->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_info_rs_CC);
    unset($CalidadCodigoMetricas);
    unset($CalidadCodigoReglas);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-746D5412
$Header->Show();
$mc_info_rs_CC->Show();
$CalidadCodigoMetricas->Show();
$CalidadCodigoReglas->Show();
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

//Unload Page @1-596A6443
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$DBConnCarga->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_info_rs_CC);
unset($CalidadCodigoMetricas);
unset($CalidadCodigoReglas);
unset($Tpl);
//End Unload Page


?>
