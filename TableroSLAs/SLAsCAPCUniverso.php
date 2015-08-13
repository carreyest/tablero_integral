<?php
//Include Common Files @1-913E968E
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "SLAsCAPCUniverso.php");
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

//Class_Initialize Event @3-E50737C4
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
            $this->numero = new clsControl(ccsTextBox, "numero", "Numero", ccsText, "", CCGetRequestParam("numero", $Method, NULL), $this);
            $this->numero->Required = true;
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
            $this->IdEstimacion = new clsControl(ccsTextBox, "IdEstimacion", "Id Estimacion", ccsInteger, "", CCGetRequestParam("IdEstimacion", $Method, NULL), $this);
            $this->SLO = new clsControl(ccsCheckBox, "SLO", "SLO", ccsInteger, "", CCGetRequestParam("SLO", $Method, NULL), $this);
            $this->SLO->CheckedValue = $this->SLO->GetParsedValue(1);
            $this->SLO->UncheckedValue = $this->SLO->GetParsedValue(0);
            $this->id_tipo = new clsControl(ccsListBox, "id_tipo", "Id Tipo", ccsInteger, "", CCGetRequestParam("id_tipo", $Method, NULL), $this);
            $this->id_tipo->DSType = dsTable;
            $this->id_tipo->DataSource = new clsDBcnDisenio();
            $this->id_tipo->ds = & $this->id_tipo->DataSource;
            $this->id_tipo->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_TipoPPMC {SQL_Where} {SQL_OrderBy}";
            list($this->id_tipo->BoundColumn, $this->id_tipo->TextColumn, $this->id_tipo->DBFormat) = array("Id", "Descripcion", "");
            $this->analista = new clsControl(ccsListBox, "analista", "analista", ccsText, "", CCGetRequestParam("analista", $Method, NULL), $this);
            $this->analista->DSType = dsTable;
            $this->analista->DataSource = new clsDBcnDisenio();
            $this->analista->ds = & $this->analista->DataSource;
            $this->analista->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_usuarios {SQL_Where} {SQL_OrderBy}";
            list($this->analista->BoundColumn, $this->analista->TextColumn, $this->analista->DBFormat) = array("Usuario", "Usuario", "");
            $this->analista->DataSource->Parameters["expr97"] = 'CAPC';
            $this->analista->DataSource->wp = new clsSQLParameters();
            $this->analista->DataSource->wp->AddParameter("1", "expr97", ccsText, "", "", $this->analista->DataSource->Parameters["expr97"], "", false);
            $this->analista->DataSource->wp->Criterion[1] = $this->analista->DataSource->wp->Operation(opEqual, "[Grupo]", $this->analista->DataSource->wp->GetDBValue("1"), $this->analista->DataSource->ToSQL($this->analista->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->analista->DataSource->Where = 
                 $this->analista->DataSource->wp->Criterion[1];
            if(!$this->FormSubmitted) {
                if(!is_array($this->SLO->Value) && !strlen($this->SLO->Value) && $this->SLO->Value !== false)
                    $this->SLO->SetValue(false);
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

//Validate Method @3-DD5B99B7
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->numero->Validate() && $Validation);
        $Validation = ($this->mes->Validate() && $Validation);
        $Validation = ($this->anio->Validate() && $Validation);
        $Validation = ($this->IdEstimacion->Validate() && $Validation);
        $Validation = ($this->SLO->Validate() && $Validation);
        $Validation = ($this->id_tipo->Validate() && $Validation);
        $Validation = ($this->analista->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->numero->Errors->Count() == 0);
        $Validation =  $Validation && ($this->mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IdEstimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SLO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_tipo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->analista->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-1FB2CED7
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->numero->Errors->Count());
        $errors = ($errors || $this->mes->Errors->Count());
        $errors = ($errors || $this->anio->Errors->Count());
        $errors = ($errors || $this->IdEstimacion->Errors->Count());
        $errors = ($errors || $this->SLO->Errors->Count());
        $errors = ($errors || $this->id_tipo->Errors->Count());
        $errors = ($errors || $this->analista->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-B908BA44
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
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @3-8F813261
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->numero->SetValue($this->numero->GetValue(true));
        $this->DataSource->mes->SetValue($this->mes->GetValue(true));
        $this->DataSource->anio->SetValue($this->anio->GetValue(true));
        $this->DataSource->IdEstimacion->SetValue($this->IdEstimacion->GetValue(true));
        $this->DataSource->SLO->SetValue($this->SLO->GetValue(true));
        $this->DataSource->id_tipo->SetValue($this->id_tipo->GetValue(true));
        $this->DataSource->analista->SetValue($this->analista->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @3-1B3B79DD
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->numero->SetValue($this->numero->GetValue(true));
        $this->DataSource->mes->SetValue($this->mes->GetValue(true));
        $this->DataSource->anio->SetValue($this->anio->GetValue(true));
        $this->DataSource->IdEstimacion->SetValue($this->IdEstimacion->GetValue(true));
        $this->DataSource->SLO->SetValue($this->SLO->GetValue(true));
        $this->DataSource->id_tipo->SetValue($this->id_tipo->GetValue(true));
        $this->DataSource->analista->SetValue($this->analista->GetValue(true));
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

//Show Method @3-3B438C46
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
        $this->id_tipo->Prepare();
        $this->analista->Prepare();

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
                    $this->numero->SetValue($this->DataSource->numero->GetValue());
                    $this->mes->SetValue($this->DataSource->mes->GetValue());
                    $this->anio->SetValue($this->DataSource->anio->GetValue());
                    $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                    $this->SLO->SetValue($this->DataSource->SLO->GetValue());
                    $this->id_tipo->SetValue($this->DataSource->id_tipo->GetValue());
                    $this->analista->SetValue($this->DataSource->analista->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->numero->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IdEstimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SLO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_tipo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->analista->Errors->ToString());
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
        $this->numero->Show();
        $this->mes->Show();
        $this->anio->Show();
        $this->IdEstimacion->Show();
        $this->SLO->Show();
        $this->id_tipo->Show();
        $this->analista->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_calificacion_capc Class @3-FCB6E20C

class clsmc_calificacion_capcDataSource extends clsDBcnDisenio {  //mc_calificacion_capcDataSource Class @3-68AE7315

//DataSource Variables @3-46038A21
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
    public $numero;
    public $mes;
    public $anio;
    public $IdEstimacion;
    public $SLO;
    public $id_tipo;
    public $analista;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-1699606A
    function clsmc_calificacion_capcDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_calificacion_capc/Error";
        $this->Initialize();
        $this->numero = new clsField("numero", ccsText, "");
        
        $this->mes = new clsField("mes", ccsInteger, "");
        
        $this->anio = new clsField("anio", ccsInteger, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsInteger, "");
        
        $this->SLO = new clsField("SLO", ccsInteger, "");
        
        $this->id_tipo = new clsField("id_tipo", ccsInteger, "");
        
        $this->analista = new clsField("analista", ccsText, "");
        

        $this->InsertFields["numero"] = array("Name" => "numero", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["mes"] = array("Name" => "mes", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["anio"] = array("Name" => "anio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IdEstimacion"] = array("Name" => "[IdEstimacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["SLO"] = array("Name" => "SLO", "Value" => "", "DataType" => ccsInteger);
        $this->InsertFields["id_tipo"] = array("Name" => "id_tipo", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["analista"] = array("Name" => "analista", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["numero"] = array("Name" => "numero", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["mes"] = array("Name" => "mes", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["anio"] = array("Name" => "anio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["IdEstimacion"] = array("Name" => "[IdEstimacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["SLO"] = array("Name" => "SLO", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["id_tipo"] = array("Name" => "id_tipo", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["analista"] = array("Name" => "analista", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
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

//SetValues Method @3-88A0E0D9
    function SetValues()
    {
        $this->numero->SetDBValue($this->f("numero"));
        $this->mes->SetDBValue(trim($this->f("mes")));
        $this->anio->SetDBValue(trim($this->f("anio")));
        $this->IdEstimacion->SetDBValue(trim($this->f("IdEstimacion")));
        $this->SLO->SetDBValue(trim($this->f("SLO")));
        $this->id_tipo->SetDBValue(trim($this->f("id_tipo")));
        $this->analista->SetDBValue($this->f("analista"));
    }
//End SetValues Method

//Insert Method @3-1717E73F
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["numero"]["Value"] = $this->numero->GetDBValue(true);
        $this->InsertFields["mes"]["Value"] = $this->mes->GetDBValue(true);
        $this->InsertFields["anio"]["Value"] = $this->anio->GetDBValue(true);
        $this->InsertFields["IdEstimacion"]["Value"] = $this->IdEstimacion->GetDBValue(true);
        $this->InsertFields["SLO"]["Value"] = $this->SLO->GetDBValue(true);
        $this->InsertFields["id_tipo"]["Value"] = $this->id_tipo->GetDBValue(true);
        $this->InsertFields["analista"]["Value"] = $this->analista->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_calificacion_capc", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @3-FF9D36DC
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["numero"]["Value"] = $this->numero->GetDBValue(true);
        $this->UpdateFields["mes"]["Value"] = $this->mes->GetDBValue(true);
        $this->UpdateFields["anio"]["Value"] = $this->anio->GetDBValue(true);
        $this->UpdateFields["IdEstimacion"]["Value"] = $this->IdEstimacion->GetDBValue(true);
        $this->UpdateFields["SLO"]["Value"] = $this->SLO->GetDBValue(true);
        $this->UpdateFields["id_tipo"]["Value"] = $this->id_tipo->GetDBValue(true);
        $this->UpdateFields["analista"]["Value"] = $this->analista->GetDBValue(true);
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

class clsGridmc_c_mes_mc_calificacion { //mc_c_mes_mc_calificacion class @17-F1E8F66B

//Variables @17-7CD7409B

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
    public $Sorter_numero;
    public $Sorter_mc_c_mes_Mes;
    public $Sorter_anio;
    public $Sorter_IdEstimacion;
    public $Sorter_SLO;
//End Variables

//Class_Initialize Event @17-8FFC575C
    function clsGridmc_c_mes_mc_calificacion($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_c_mes_mc_calificacion";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_c_mes_mc_calificacion";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_c_mes_mc_calificacionDataSource($this);
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
        $this->SorterName = CCGetParam("mc_c_mes_mc_calificacionOrder", "");
        $this->SorterDirection = CCGetParam("mc_c_mes_mc_calificacionDir", "");

        $this->numero = new clsControl(ccsLink, "numero", "numero", ccsText, "", CCGetRequestParam("numero", ccsGet, NULL), $this);
        $this->numero->Page = "";
        $this->mc_c_mes_Mes = new clsControl(ccsLabel, "mc_c_mes_Mes", "mc_c_mes_Mes", ccsText, "", CCGetRequestParam("mc_c_mes_Mes", ccsGet, NULL), $this);
        $this->anio = new clsControl(ccsLabel, "anio", "anio", ccsInteger, "", CCGetRequestParam("anio", ccsGet, NULL), $this);
        $this->IdEstimacion = new clsControl(ccsLabel, "IdEstimacion", "IdEstimacion", ccsInteger, "", CCGetRequestParam("IdEstimacion", ccsGet, NULL), $this);
        $this->SLO = new clsControl(ccsLabel, "SLO", "SLO", ccsInteger, "", CCGetRequestParam("SLO", ccsGet, NULL), $this);
        $this->Sorter_numero = new clsSorter($this->ComponentName, "Sorter_numero", $FileName, $this);
        $this->Sorter_mc_c_mes_Mes = new clsSorter($this->ComponentName, "Sorter_mc_c_mes_Mes", $FileName, $this);
        $this->Sorter_anio = new clsSorter($this->ComponentName, "Sorter_anio", $FileName, $this);
        $this->Sorter_IdEstimacion = new clsSorter($this->ComponentName, "Sorter_IdEstimacion", $FileName, $this);
        $this->Sorter_SLO = new clsSorter($this->ComponentName, "Sorter_SLO", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @17-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @17-08360985
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_numero"] = CCGetFromGet("s_numero", NULL);
        $this->DataSource->Parameters["urls_mc_calificacion_capc_mes"] = CCGetFromGet("s_mc_calificacion_capc_mes", NULL);
        $this->DataSource->Parameters["urls_anio"] = CCGetFromGet("s_anio", NULL);
        $this->DataSource->Parameters["urls_SLO"] = CCGetFromGet("s_SLO", NULL);

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
            $this->ControlsVisible["numero"] = $this->numero->Visible;
            $this->ControlsVisible["mc_c_mes_Mes"] = $this->mc_c_mes_Mes->Visible;
            $this->ControlsVisible["anio"] = $this->anio->Visible;
            $this->ControlsVisible["IdEstimacion"] = $this->IdEstimacion->Visible;
            $this->ControlsVisible["SLO"] = $this->SLO->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->numero->SetValue($this->DataSource->numero->GetValue());
                $this->numero->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->numero->Parameters = CCAddParam($this->numero->Parameters, "id", $this->DataSource->f("id"));
                $this->mc_c_mes_Mes->SetValue($this->DataSource->mc_c_mes_Mes->GetValue());
                $this->anio->SetValue($this->DataSource->anio->GetValue());
                $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                $this->SLO->SetValue($this->DataSource->SLO->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->numero->Show();
                $this->mc_c_mes_Mes->Show();
                $this->anio->Show();
                $this->IdEstimacion->Show();
                $this->SLO->Show();
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
        $this->Sorter_numero->Show();
        $this->Sorter_mc_c_mes_Mes->Show();
        $this->Sorter_anio->Show();
        $this->Sorter_IdEstimacion->Show();
        $this->Sorter_SLO->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @17-0B32AFEA
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->numero->Errors->ToString());
        $errors = ComposeStrings($errors, $this->mc_c_mes_Mes->Errors->ToString());
        $errors = ComposeStrings($errors, $this->anio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IdEstimacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SLO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_c_mes_mc_calificacion Class @17-FCB6E20C

class clsmc_c_mes_mc_calificacionDataSource extends clsDBcnDisenio {  //mc_c_mes_mc_calificacionDataSource Class @17-8895EA3C

//DataSource Variables @17-B1EFA743
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $numero;
    public $mc_c_mes_Mes;
    public $anio;
    public $IdEstimacion;
    public $SLO;
//End DataSource Variables

//DataSourceClass_Initialize Event @17-434C84E6
    function clsmc_c_mes_mc_calificacionDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_c_mes_mc_calificacion";
        $this->Initialize();
        $this->numero = new clsField("numero", ccsText, "");
        
        $this->mc_c_mes_Mes = new clsField("mc_c_mes_Mes", ccsText, "");
        
        $this->anio = new clsField("anio", ccsInteger, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsInteger, "");
        
        $this->SLO = new clsField("SLO", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @17-2CFCB7BA
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_numero" => array("numero", ""), 
            "Sorter_mc_c_mes_Mes" => array("mc_c_mes_Mes", ""), 
            "Sorter_anio" => array("anio", ""), 
            "Sorter_IdEstimacion" => array("IdEstimacion", ""), 
            "Sorter_SLO" => array("SLO", "")));
    }
//End SetOrder Method

//Prepare Method @17-F4D923B9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_numero", ccsText, "", "", $this->Parameters["urls_numero"], "", false);
        $this->wp->AddParameter("2", "urls_mc_calificacion_capc_mes", ccsInteger, "", "", $this->Parameters["urls_mc_calificacion_capc_mes"], 0, false);
        $this->wp->AddParameter("3", "urls_anio", ccsInteger, "", "", $this->Parameters["urls_anio"], 0, false);
        $this->wp->AddParameter("4", "urls_SLO", ccsInteger, "", "", $this->Parameters["urls_SLO"], 0, false);
    }
//End Prepare Method

//Open Method @17-2BD98E24
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT numero, mc_calificacion_capc.mes AS mc_calificacion_capc_mes, anio, IdEstimacion, SLO, mc_c_mes.Mes AS mc_c_mes_Mes, id \n" .
        "FROM mc_calificacion_capc INNER JOIN mc_c_mes ON\n" .
        "mc_calificacion_capc.mes = mc_c_mes.IdMes\n" .
        "WHERE mc_calificacion_capc.numero LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "AND (IdMes = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or 0 = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ")\n" .
        "AND (mc_calificacion_capc.anio = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0 = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "AND (mc_calificacion_capc.SLO = " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " )) cnt";
        $this->SQL = "SELECT numero, mc_calificacion_capc.mes AS mc_calificacion_capc_mes, anio, IdEstimacion, SLO, mc_c_mes.Mes AS mc_c_mes_Mes, id \n" .
        "FROM mc_calificacion_capc INNER JOIN mc_c_mes ON\n" .
        "mc_calificacion_capc.mes = mc_c_mes.IdMes\n" .
        "WHERE mc_calificacion_capc.numero LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "AND (IdMes = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or 0 = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ")\n" .
        "AND (mc_calificacion_capc.anio = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0 = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "AND (mc_calificacion_capc.SLO = " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " )";
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

//SetValues Method @17-35C85320
    function SetValues()
    {
        $this->numero->SetDBValue($this->f("numero"));
        $this->mc_c_mes_Mes->SetDBValue($this->f("mc_c_mes_Mes"));
        $this->anio->SetDBValue(trim($this->f("anio")));
        $this->IdEstimacion->SetDBValue(trim($this->f("IdEstimacion")));
        $this->SLO->SetDBValue(trim($this->f("SLO")));
    }
//End SetValues Method

} //End mc_c_mes_mc_calificacionDataSource Class @17-FCB6E20C

class clsRecordmc_c_mes_mc_calificacion1 { //mc_c_mes_mc_calificacion1 Class @45-2C67A18F

//Variables @45-9E315808

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

//Class_Initialize Event @45-B03C7D9F
    function clsRecordmc_c_mes_mc_calificacion1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_c_mes_mc_calificacion1/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_c_mes_mc_calificacion1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_numero = new clsControl(ccsTextBox, "s_numero", "Numero", ccsText, "", CCGetRequestParam("s_numero", $Method, NULL), $this);
            $this->s_mc_calificacion_capc_mes = new clsControl(ccsListBox, "s_mc_calificacion_capc_mes", "Mc Calificacion Capc Mes", ccsInteger, "", CCGetRequestParam("s_mc_calificacion_capc_mes", $Method, NULL), $this);
            $this->s_mc_calificacion_capc_mes->DSType = dsTable;
            $this->s_mc_calificacion_capc_mes->DataSource = new clsDBcnDisenio();
            $this->s_mc_calificacion_capc_mes->ds = & $this->s_mc_calificacion_capc_mes->DataSource;
            $this->s_mc_calificacion_capc_mes->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_mc_calificacion_capc_mes->BoundColumn, $this->s_mc_calificacion_capc_mes->TextColumn, $this->s_mc_calificacion_capc_mes->DBFormat) = array("IdMes", "Mes", "");
            $this->s_anio = new clsControl(ccsTextBox, "s_anio", "Anio", ccsInteger, "", CCGetRequestParam("s_anio", $Method, NULL), $this);
            $this->s_SLO = new clsControl(ccsCheckBox, "s_SLO", "SLO", ccsInteger, "", CCGetRequestParam("s_SLO", $Method, NULL), $this);
            $this->s_SLO->CheckedValue = $this->s_SLO->GetParsedValue(1);
            $this->s_SLO->UncheckedValue = $this->s_SLO->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_SLO->Value) && !strlen($this->s_SLO->Value) && $this->s_SLO->Value !== false)
                    $this->s_SLO->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Validate Method @45-72FD585C
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_numero->Validate() && $Validation);
        $Validation = ($this->s_mc_calificacion_capc_mes->Validate() && $Validation);
        $Validation = ($this->s_anio->Validate() && $Validation);
        $Validation = ($this->s_SLO->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_numero->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_mc_calificacion_capc_mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_SLO->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @45-C8A5842D
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_numero->Errors->Count());
        $errors = ($errors || $this->s_mc_calificacion_capc_mes->Errors->Count());
        $errors = ($errors || $this->s_anio->Errors->Count());
        $errors = ($errors || $this->s_SLO->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @45-4919DF59
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "SLAsCAPCUniverso.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "SLAsCAPCUniverso.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @45-C1ECBB89
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

        $this->s_mc_calificacion_capc_mes->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_numero->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_mc_calificacion_capc_mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_SLO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_DoSearch->Show();
        $this->s_numero->Show();
        $this->s_mc_calificacion_capc_mes->Show();
        $this->s_anio->Show();
        $this->s_SLO->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_c_mes_mc_calificacion1 Class @45-FCB6E20C

//Include Page implementation @86-97AA785B
include_once(RelativePath . "/SLAsCAPCMenu.php");
//End Include Page implementation

//Initialize Page @1-F9BC34BB
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
$TemplateFileName = "SLAsCAPCUniverso.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-872FD3D7
CCSecurityRedirect("", "");
//End Authenticate User

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-10F9FDC1
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_calificacion_capc = new clsRecordmc_calificacion_capc("", $MainPage);
$mc_c_mes_mc_calificacion = new clsGridmc_c_mes_mc_calificacion("", $MainPage);
$mc_c_mes_mc_calificacion1 = new clsRecordmc_c_mes_mc_calificacion1("", $MainPage);
$SLAsCAPCMenu = new clsSLAsCAPCMenu("", "SLAsCAPCMenu", $MainPage);
$SLAsCAPCMenu->Initialize();
$MainPage->Header = & $Header;
$MainPage->mc_calificacion_capc = & $mc_calificacion_capc;
$MainPage->mc_c_mes_mc_calificacion = & $mc_c_mes_mc_calificacion;
$MainPage->mc_c_mes_mc_calificacion1 = & $mc_c_mes_mc_calificacion1;
$MainPage->SLAsCAPCMenu = & $SLAsCAPCMenu;
$mc_calificacion_capc->Initialize();
$mc_c_mes_mc_calificacion->Initialize();
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

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

//Execute Components @1-4055DE1F
$SLAsCAPCMenu->Operations();
$mc_c_mes_mc_calificacion1->Operation();
$mc_calificacion_capc->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-9456466F
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_calificacion_capc);
    unset($mc_c_mes_mc_calificacion);
    unset($mc_c_mes_mc_calificacion1);
    $SLAsCAPCMenu->Class_Terminate();
    unset($SLAsCAPCMenu);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-8A2367B3
$Header->Show();
$mc_calificacion_capc->Show();
$mc_c_mes_mc_calificacion->Show();
$mc_c_mes_mc_calificacion1->Show();
$SLAsCAPCMenu->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-67174FA0
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_calificacion_capc);
unset($mc_c_mes_mc_calificacion);
unset($mc_c_mes_mc_calificacion1);
$SLAsCAPCMenu->Class_Terminate();
unset($SLAsCAPCMenu);
unset($Tpl);
//End Unload Page


?>
