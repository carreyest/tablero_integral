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

//Class_Initialize Event @27-5A07F4D8
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
            $this->Id = new clsControl(ccsHidden, "Id", "Id", ccsInteger, "", CCGetRequestParam("Id", $Method, NULL), $this);
            $this->Id->Required = true;
            $this->Id_PPMC = new clsControl(ccsLabel, "Id_PPMC", "Id_PPMC", ccsInteger, "", CCGetRequestParam("Id_PPMC", $Method, NULL), $this);
            $this->ID_Estimacion = new clsControl(ccsLabel, "ID_Estimacion", "ID_Estimacion", ccsInteger, "", CCGetRequestParam("ID_Estimacion", $Method, NULL), $this);
            $this->PctReglas = new clsControl(ccsTextBox, "PctReglas", "Pct Calidad", ccsFloat, array(True, 2, Null, "", False, array("#"), array("#", "#"), 1, True, ""), CCGetRequestParam("PctReglas", $Method, NULL), $this);
            $this->CumpleCalidadCod = new clsControl(ccsListBox, "CumpleCalidadCod", "Cumple Calidad Cod", ccsInteger, "", CCGetRequestParam("CumpleCalidadCod", $Method, NULL), $this);
            $this->CumpleCalidadCod->DSType = dsListOfValues;
            $this->CumpleCalidadCod->Values = array(array("", "No Aplica"), array("1", "Cumplio"), array("0", "No Cumplio"));
            $this->UsuarioUltMod = new clsControl(ccsHidden, "UsuarioUltMod", "Usuario Ult Mod", ccsText, "", CCGetRequestParam("UsuarioUltMod", $Method, NULL), $this);
            $this->FechaUltMod = new clsControl(ccsHidden, "FechaUltMod", "Fecha Ult Mod", ccsDate, array("ShortDate"), CCGetRequestParam("FechaUltMod", $Method, NULL), $this);
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsText, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->PctMetricas = new clsControl(ccsTextBox, "PctMetricas", "PctMetricas", ccsFloat, array(True, 2, Null, "", False, array("#"), array("#", "#"), 1, True, ""), CCGetRequestParam("PctMetricas", $Method, NULL), $this);
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

//Validate Method @27-672669D8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Id->Validate() && $Validation);
        $Validation = ($this->PctReglas->Validate() && $Validation);
        $Validation = ($this->CumpleCalidadCod->Validate() && $Validation);
        $Validation = ($this->UsuarioUltMod->Validate() && $Validation);
        $Validation = ($this->FechaUltMod->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $Validation = ($this->PctMetricas->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PctReglas->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumpleCalidadCod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsuarioUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PctMetricas->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @27-A6663DFA
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Id->Errors->Count());
        $errors = ($errors || $this->Id_PPMC->Errors->Count());
        $errors = ($errors || $this->ID_Estimacion->Errors->Count());
        $errors = ($errors || $this->PctReglas->Errors->Count());
        $errors = ($errors || $this->CumpleCalidadCod->Errors->Count());
        $errors = ($errors || $this->UsuarioUltMod->Errors->Count());
        $errors = ($errors || $this->FechaUltMod->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->PctMetricas->Errors->Count());
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

//InsertRow Method @27-84D977FA
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Id->SetValue($this->Id->GetValue(true));
        $this->DataSource->Id_PPMC->SetValue($this->Id_PPMC->GetValue(true));
        $this->DataSource->ID_Estimacion->SetValue($this->ID_Estimacion->GetValue(true));
        $this->DataSource->PctReglas->SetValue($this->PctReglas->GetValue(true));
        $this->DataSource->CumpleCalidadCod->SetValue($this->CumpleCalidadCod->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->PctMetricas->SetValue($this->PctMetricas->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @27-28A5E4AA
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Id->SetValue($this->Id->GetValue(true));
        $this->DataSource->Id_PPMC->SetValue($this->Id_PPMC->GetValue(true));
        $this->DataSource->ID_Estimacion->SetValue($this->ID_Estimacion->GetValue(true));
        $this->DataSource->PctReglas->SetValue($this->PctReglas->GetValue(true));
        $this->DataSource->CumpleCalidadCod->SetValue($this->CumpleCalidadCod->GetValue(true));
        $this->DataSource->UsuarioUltMod->SetValue($this->UsuarioUltMod->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->PctMetricas->SetValue($this->PctMetricas->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @27-EC09F1F0
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
                    $this->Id->SetValue($this->DataSource->Id->GetValue());
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

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Id_PPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ID_Estimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PctReglas->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumpleCalidadCod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsuarioUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PctMetricas->Errors->ToString());
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
        $this->PctReglas->Show();
        $this->CumpleCalidadCod->Show();
        $this->UsuarioUltMod->Show();
        $this->FechaUltMod->Show();
        $this->Observaciones->Show();
        $this->PctMetricas->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_rs_CC Class @27-FCB6E20C

class clsmc_info_rs_CCDataSource extends clsDBcnDisenio {  //mc_info_rs_CCDataSource Class @27-E5C326FA

//DataSource Variables @27-3C333F84
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
    public $PctReglas;
    public $CumpleCalidadCod;
    public $UsuarioUltMod;
    public $FechaUltMod;
    public $Observaciones;
    public $PctMetricas;
//End DataSource Variables

//DataSourceClass_Initialize Event @27-9D1D2241
    function clsmc_info_rs_CCDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_rs_CC/Error";
        $this->Initialize();
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->Id_PPMC = new clsField("Id_PPMC", ccsInteger, "");
        
        $this->ID_Estimacion = new clsField("ID_Estimacion", ccsInteger, "");
        
        $this->PctReglas = new clsField("PctReglas", ccsFloat, "");
        
        $this->CumpleCalidadCod = new clsField("CumpleCalidadCod", ccsInteger, "");
        
        $this->UsuarioUltMod = new clsField("UsuarioUltMod", ccsText, "");
        
        $this->FechaUltMod = new clsField("FechaUltMod", ccsDate, $this->DateFormat);
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->PctMetricas = new clsField("PctMetricas", ccsFloat, "");
        

        $this->InsertFields["Id"] = array("Name" => "[Id]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["PctReglas"] = array("Name" => "[PctReglas]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["CumpleCalidadCod"] = array("Name" => "[CumpleCalidadCod]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PctMetricas"] = array("Name" => "[PctMetricas]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id"] = array("Name" => "[Id]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["PctReglas"] = array("Name" => "[PctReglas]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumpleCalidadCod"] = array("Name" => "[CumpleCalidadCod]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PctMetricas"] = array("Name" => "[PctMetricas]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @27-D6C1B08E
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

//SetValues Method @27-F6DBD488
    function SetValues()
    {
        $this->Id->SetDBValue(trim($this->f("Id")));
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

//Insert Method @27-47BE4E5C
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Id"]["Value"] = $this->Id->GetDBValue(true);
        $this->InsertFields["PctReglas"]["Value"] = $this->PctReglas->GetDBValue(true);
        $this->InsertFields["CumpleCalidadCod"]["Value"] = $this->CumpleCalidadCod->GetDBValue(true);
        $this->InsertFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->InsertFields["FechaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->InsertFields["PctMetricas"]["Value"] = $this->PctMetricas->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_info_rs_CC", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @27-A3F84CB2
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Id"]["Value"] = $this->Id->GetDBValue(true);
        $this->UpdateFields["PctReglas"]["Value"] = $this->PctReglas->GetDBValue(true);
        $this->UpdateFields["CumpleCalidadCod"]["Value"] = $this->CumpleCalidadCod->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->UsuarioUltMod->GetDBValue(true);
        $this->UpdateFields["FechaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->UpdateFields["PctMetricas"]["Value"] = $this->PctMetricas->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_info_rs_CC", $this->UpdateFields, $this);
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

} //End mc_info_rs_CCDataSource Class @27-FCB6E20C

//Initialize Page @1-C82A9957
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
$Scripts = "|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-586E8DA6
include_once("./PPMCsCrCalCodDetalle_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-B4690976
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
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
$MainPage->Header = & $Header;
$MainPage->lkAnterior = & $lkAnterior;
$MainPage->lkSiguiente = & $lkSiguiente;
$MainPage->lkReqFun = & $lkReqFun;
$MainPage->lkCalidad = & $lkCalidad;
$MainPage->lkRetEnt_Calidad = & $lkRetEnt_Calidad;
$MainPage->lkCalidadCod = & $lkCalidadCod;
$MainPage->Link1 = & $Link1;
$MainPage->mc_info_rs_CC = & $mc_info_rs_CC;
$lkReqFun->Parameters = "";
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "Id", CCGetFromGet("Id", NULL));
$lkReqFun->Parameters = CCAddParam($lkReqFun->Parameters, "src", 1);
$mc_info_rs_CC->Initialize();
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

//Go to destination page @1-2BEEA55D
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_info_rs_CC);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-3FD60CD5
$Header->Show();
$mc_info_rs_CC->Show();
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

//Unload Page @1-6021D752
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_info_rs_CC);
unset($Tpl);
//End Unload Page


?>
