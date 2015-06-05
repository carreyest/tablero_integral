<?php
//Include Common Files @1-81938521
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "CambiarPsw.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_c_usuarios { //mc_c_usuarios Class @3-51B8D947

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

//Class_Initialize Event @3-6BFF9FCD
    function clsRecordmc_c_usuarios($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_c_usuarios/Error";
        $this->DataSource = new clsmc_c_usuariosDataSource($this);
        $this->ds = & $this->DataSource;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_c_usuarios";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Clave = new clsControl(ccsTextBox, "Clave", "Clave", ccsText, "", CCGetRequestParam("Clave", $Method, NULL), $this);
            $this->Clave->Required = true;
            $this->UsrSharePoint = new clsControl(ccsTextBox, "UsrSharePoint", "Usr Share Point", ccsText, "", CCGetRequestParam("UsrSharePoint", $Method, NULL), $this);
            $this->PwdSharePoint = new clsControl(ccsTextBox, "PwdSharePoint", "Pwd Share Point", ccsText, "", CCGetRequestParam("PwdSharePoint", $Method, NULL), $this);
            $this->CDSDefault = new clsControl(ccsTextBox, "CDSDefault", "CDSDefault", ccsText, "", CCGetRequestParam("CDSDefault", $Method, NULL), $this);
            $this->Clave_Shadow = new clsControl(ccsHidden, "Clave_Shadow", "Clave_Shadow", ccsText, "", CCGetRequestParam("Clave_Shadow", $Method, NULL), $this);
            $this->NewPwd = new clsControl(ccsTextBox, "NewPwd", "NewPwd", ccsText, "", CCGetRequestParam("NewPwd", $Method, NULL), $this);
            $this->ConfirmNewPwd = new clsControl(ccsTextBox, "ConfirmNewPwd", "ConfirmNewPwd", ccsText, "", CCGetRequestParam("ConfirmNewPwd", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @3-A6EAFA3C
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["expr19"] = CCGetUserId();
    }
//End Initialize Method

//Validate Method @3-1F7875C1
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Clave->Validate() && $Validation);
        $Validation = ($this->UsrSharePoint->Validate() && $Validation);
        $Validation = ($this->PwdSharePoint->Validate() && $Validation);
        $Validation = ($this->CDSDefault->Validate() && $Validation);
        $Validation = ($this->Clave_Shadow->Validate() && $Validation);
        $Validation = ($this->NewPwd->Validate() && $Validation);
        $Validation = ($this->ConfirmNewPwd->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Clave->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsrSharePoint->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PwdSharePoint->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CDSDefault->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Clave_Shadow->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NewPwd->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ConfirmNewPwd->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-9002A9F1
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Clave->Errors->Count());
        $errors = ($errors || $this->UsrSharePoint->Errors->Count());
        $errors = ($errors || $this->PwdSharePoint->Errors->Count());
        $errors = ($errors || $this->CDSDefault->Errors->Count());
        $errors = ($errors || $this->Clave_Shadow->Errors->Count());
        $errors = ($errors || $this->NewPwd->Errors->Count());
        $errors = ($errors || $this->ConfirmNewPwd->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-517B5C36
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
            $this->PressedButton = $this->EditMode ? "Button_Update" : "";
            if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_Update") {
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

//UpdateRow Method @3-CA829EEE
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Clave->SetValue($this->Clave->GetValue(true));
        $this->DataSource->UsrSharePoint->SetValue($this->UsrSharePoint->GetValue(true));
        $this->DataSource->PwdSharePoint->SetValue($this->PwdSharePoint->GetValue(true));
        $this->DataSource->CDSDefault->SetValue($this->CDSDefault->GetValue(true));
        $this->DataSource->Clave_Shadow->SetValue($this->Clave_Shadow->GetValue(true));
        $this->DataSource->NewPwd->SetValue($this->NewPwd->GetValue(true));
        $this->DataSource->ConfirmNewPwd->SetValue($this->ConfirmNewPwd->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @3-06478026
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
                    $this->Clave->SetValue($this->DataSource->Clave->GetValue());
                    $this->UsrSharePoint->SetValue($this->DataSource->UsrSharePoint->GetValue());
                    $this->PwdSharePoint->SetValue($this->DataSource->PwdSharePoint->GetValue());
                    $this->CDSDefault->SetValue($this->DataSource->CDSDefault->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Clave->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsrSharePoint->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PwdSharePoint->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CDSDefault->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Clave_Shadow->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NewPwd->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ConfirmNewPwd->Errors->ToString());
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
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Update->Show();
        $this->Clave->Show();
        $this->UsrSharePoint->Show();
        $this->PwdSharePoint->Show();
        $this->CDSDefault->Show();
        $this->Clave_Shadow->Show();
        $this->NewPwd->Show();
        $this->ConfirmNewPwd->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_c_usuarios Class @3-FCB6E20C

class clsmc_c_usuariosDataSource extends clsDBcnDisenio {  //mc_c_usuariosDataSource Class @3-86F6BAC1

//DataSource Variables @3-62BCE385
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
    public $Clave;
    public $UsrSharePoint;
    public $PwdSharePoint;
    public $CDSDefault;
    public $Clave_Shadow;
    public $NewPwd;
    public $ConfirmNewPwd;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-FD3D9139
    function clsmc_c_usuariosDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_c_usuarios/Error";
        $this->Initialize();
        $this->Clave = new clsField("Clave", ccsText, "");
        
        $this->UsrSharePoint = new clsField("UsrSharePoint", ccsText, "");
        
        $this->PwdSharePoint = new clsField("PwdSharePoint", ccsText, "");
        
        $this->CDSDefault = new clsField("CDSDefault", ccsText, "");
        
        $this->Clave_Shadow = new clsField("Clave_Shadow", ccsText, "");
        
        $this->NewPwd = new clsField("NewPwd", ccsText, "");
        
        $this->ConfirmNewPwd = new clsField("ConfirmNewPwd", ccsText, "");
        

        $this->UpdateFields["Clave"] = array("Name" => "[Clave]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsrSharePoint"] = array("Name" => "[UsrSharePoint]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PwdSharePoint"] = array("Name" => "[PwdSharePoint]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CDSDefault"] = array("Name" => "[CDSDefault]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-475E5B13
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "expr19", ccsInteger, "", "", $this->Parameters["expr19"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[Id]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @3-49D3BF33
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_c_usuarios {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-F1AFC6AE
    function SetValues()
    {
        $this->Clave->SetDBValue($this->f("Clave"));
        $this->UsrSharePoint->SetDBValue($this->f("UsrSharePoint"));
        $this->PwdSharePoint->SetDBValue($this->f("PwdSharePoint"));
        $this->CDSDefault->SetDBValue($this->f("CDSDefault"));
    }
//End SetValues Method

//Update Method @3-F8B0EC83
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Clave"]["Value"] = $this->Clave->GetDBValue(true);
        $this->UpdateFields["UsrSharePoint"]["Value"] = $this->UsrSharePoint->GetDBValue(true);
        $this->UpdateFields["PwdSharePoint"]["Value"] = $this->PwdSharePoint->GetDBValue(true);
        $this->UpdateFields["CDSDefault"]["Value"] = $this->CDSDefault->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_c_usuarios", $this->UpdateFields, $this);
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

} //End mc_c_usuariosDataSource Class @3-FCB6E20C

//Initialize Page @1-53A79073
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
$TemplateFileName = "CambiarPsw.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-5434B419
include_once("./CambiarPsw_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-2BF9A555
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_c_usuarios = new clsRecordmc_c_usuarios("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_c_usuarios = & $mc_c_usuarios;
$mc_c_usuarios->Initialize();
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

//Execute Components @1-9B724141
$mc_c_usuarios->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-C0253F6A
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_c_usuarios);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-972133CF
$Header->Show();
$mc_c_usuarios->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-EF40515F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_c_usuarios);
unset($Tpl);
//End Unload Page


?>
