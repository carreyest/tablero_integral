<?php
//Include Common Files @1-75CDD9C7
define("RelativePath", "..");
define("PathToCurrentPage", "/ConfigDeCargas/");
define("FileName", "DetalleLayoutMaint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecorddetalle_layout { //detalle_layout Class @2-113F3993

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

//Class_Initialize Event @2-FA134249
    function clsRecorddetalle_layout($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record detalle_layout/Error";
        $this->DataSource = new clsdetalle_layoutDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "detalle_layout";
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
            $this->cve_carga = new clsControl(ccsListBox, "cve_carga", "Cve Carga", ccsText, "", CCGetRequestParam("cve_carga", $Method, NULL), $this);
            $this->cve_carga->DSType = dsSQL;
            $this->cve_carga->DataSource = new clsDBConnCarga();
            $this->cve_carga->ds = & $this->cve_carga->DataSource;
            list($this->cve_carga->BoundColumn, $this->cve_carga->TextColumn, $this->cve_carga->DBFormat) = array("", "", "");
            $this->cve_carga->DataSource->SQL = "select cve_carga, cve_carga from proceso_carga_archivos";
            $this->cve_carga->DataSource->Order = "";
            $this->cve_carga->Required = true;
            $this->nombre_columna_tabla = new clsControl(ccsTextBox, "nombre_columna_tabla", "Nombre Columna Tabla", ccsText, "", CCGetRequestParam("nombre_columna_tabla", $Method, NULL), $this);
            $this->nombre_columna_tabla->Required = true;
            $this->num_columna_excel = new clsControl(ccsTextBox, "num_columna_excel", "Num Columna Excel", ccsInteger, "", CCGetRequestParam("num_columna_excel", $Method, NULL), $this);
            $this->num_columna_excel->Required = true;
            $this->tipo_columna = new clsControl(ccsListBox, "tipo_columna", "Tipo Columna", ccsText, "", CCGetRequestParam("tipo_columna", $Method, NULL), $this);
            $this->tipo_columna->DSType = dsListOfValues;
            $this->tipo_columna->Values = array(array("varchar", "varchar"), array("int", "int"), array("float", "float"), array("date", "date"), array("datetime", "datetime"));
            $this->tipo_columna->Required = true;
            $this->acepta_nulo = new clsControl(ccsListBox, "acepta_nulo", "Acepta Nulo", ccsText, "", CCGetRequestParam("acepta_nulo", $Method, NULL), $this);
            $this->acepta_nulo->DSType = dsListOfValues;
            $this->acepta_nulo->Values = array(array("NO", "No"), array("SI", "Si"));
            $this->acepta_nulo->Required = true;
            $this->dato_indispensable = new clsControl(ccsCheckBox, "dato_indispensable", "dato_indispensable", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("dato_indispensable", $Method, NULL), $this);
            $this->dato_indispensable->CheckedValue = true;
            $this->dato_indispensable->UncheckedValue = false;
            $this->valor_x_default = new clsControl(ccsTextBox, "valor_x_default", "Valor X Default", ccsText, "", CCGetRequestParam("valor_x_default", $Method, NULL), $this);
            $this->mapeo_de_valor = new clsControl(ccsTextBox, "mapeo_de_valor", "Mapeo de valor", ccsText, "", CCGetRequestParam("mapeo_de_valor", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->dato_indispensable->Value) && !strlen($this->dato_indispensable->Value) && $this->dato_indispensable->Value !== false)
                    $this->dato_indispensable->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @2-94902CCB
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlid_detalle_layout"] = CCGetFromGet("id_detalle_layout", NULL);
    }
//End Initialize Method

//Validate Method @2-49C4887D
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->cve_carga->Validate() && $Validation);
        $Validation = ($this->nombre_columna_tabla->Validate() && $Validation);
        $Validation = ($this->num_columna_excel->Validate() && $Validation);
        $Validation = ($this->tipo_columna->Validate() && $Validation);
        $Validation = ($this->acepta_nulo->Validate() && $Validation);
        $Validation = ($this->dato_indispensable->Validate() && $Validation);
        $Validation = ($this->valor_x_default->Validate() && $Validation);
        $Validation = ($this->mapeo_de_valor->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->cve_carga->Errors->Count() == 0);
        $Validation =  $Validation && ($this->nombre_columna_tabla->Errors->Count() == 0);
        $Validation =  $Validation && ($this->num_columna_excel->Errors->Count() == 0);
        $Validation =  $Validation && ($this->tipo_columna->Errors->Count() == 0);
        $Validation =  $Validation && ($this->acepta_nulo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->dato_indispensable->Errors->Count() == 0);
        $Validation =  $Validation && ($this->valor_x_default->Errors->Count() == 0);
        $Validation =  $Validation && ($this->mapeo_de_valor->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-8C25CD69
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->cve_carga->Errors->Count());
        $errors = ($errors || $this->nombre_columna_tabla->Errors->Count());
        $errors = ($errors || $this->num_columna_excel->Errors->Count());
        $errors = ($errors || $this->tipo_columna->Errors->Count());
        $errors = ($errors || $this->acepta_nulo->Errors->Count());
        $errors = ($errors || $this->dato_indispensable->Errors->Count());
        $errors = ($errors || $this->valor_x_default->Errors->Count());
        $errors = ($errors || $this->mapeo_de_valor->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-F1E653A3
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
        $Redirect = "DetalleLayoutList.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @2-A363A629
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->cve_carga->SetValue($this->cve_carga->GetValue(true));
        $this->DataSource->nombre_columna_tabla->SetValue($this->nombre_columna_tabla->GetValue(true));
        $this->DataSource->num_columna_excel->SetValue($this->num_columna_excel->GetValue(true));
        $this->DataSource->tipo_columna->SetValue($this->tipo_columna->GetValue(true));
        $this->DataSource->acepta_nulo->SetValue($this->acepta_nulo->GetValue(true));
        $this->DataSource->dato_indispensable->SetValue($this->dato_indispensable->GetValue(true));
        $this->DataSource->valor_x_default->SetValue($this->valor_x_default->GetValue(true));
        $this->DataSource->mapeo_de_valor->SetValue($this->mapeo_de_valor->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-35ACF3F1
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->cve_carga->SetValue($this->cve_carga->GetValue(true));
        $this->DataSource->nombre_columna_tabla->SetValue($this->nombre_columna_tabla->GetValue(true));
        $this->DataSource->num_columna_excel->SetValue($this->num_columna_excel->GetValue(true));
        $this->DataSource->tipo_columna->SetValue($this->tipo_columna->GetValue(true));
        $this->DataSource->acepta_nulo->SetValue($this->acepta_nulo->GetValue(true));
        $this->DataSource->dato_indispensable->SetValue($this->dato_indispensable->GetValue(true));
        $this->DataSource->valor_x_default->SetValue($this->valor_x_default->GetValue(true));
        $this->DataSource->mapeo_de_valor->SetValue($this->mapeo_de_valor->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @2-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @2-FC2B26F6
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

        $this->cve_carga->Prepare();
        $this->tipo_columna->Prepare();
        $this->acepta_nulo->Prepare();

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
                    $this->cve_carga->SetValue($this->DataSource->cve_carga->GetValue());
                    $this->nombre_columna_tabla->SetValue($this->DataSource->nombre_columna_tabla->GetValue());
                    $this->num_columna_excel->SetValue($this->DataSource->num_columna_excel->GetValue());
                    $this->tipo_columna->SetValue($this->DataSource->tipo_columna->GetValue());
                    $this->acepta_nulo->SetValue($this->DataSource->acepta_nulo->GetValue());
                    $this->dato_indispensable->SetValue($this->DataSource->dato_indispensable->GetValue());
                    $this->valor_x_default->SetValue($this->DataSource->valor_x_default->GetValue());
                    $this->mapeo_de_valor->SetValue($this->DataSource->mapeo_de_valor->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->cve_carga->Errors->ToString());
            $Error = ComposeStrings($Error, $this->nombre_columna_tabla->Errors->ToString());
            $Error = ComposeStrings($Error, $this->num_columna_excel->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tipo_columna->Errors->ToString());
            $Error = ComposeStrings($Error, $this->acepta_nulo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->dato_indispensable->Errors->ToString());
            $Error = ComposeStrings($Error, $this->valor_x_default->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mapeo_de_valor->Errors->ToString());
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
        $this->cve_carga->Show();
        $this->nombre_columna_tabla->Show();
        $this->num_columna_excel->Show();
        $this->tipo_columna->Show();
        $this->acepta_nulo->Show();
        $this->dato_indispensable->Show();
        $this->valor_x_default->Show();
        $this->mapeo_de_valor->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End detalle_layout Class @2-FCB6E20C

class clsdetalle_layoutDataSource extends clsDBConnCarga {  //detalle_layoutDataSource Class @2-DE459E83

//DataSource Variables @2-53D61282
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
    public $cve_carga;
    public $nombre_columna_tabla;
    public $num_columna_excel;
    public $tipo_columna;
    public $acepta_nulo;
    public $dato_indispensable;
    public $valor_x_default;
    public $mapeo_de_valor;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-0D2FF160
    function clsdetalle_layoutDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record detalle_layout/Error";
        $this->Initialize();
        $this->cve_carga = new clsField("cve_carga", ccsText, "");
        
        $this->nombre_columna_tabla = new clsField("nombre_columna_tabla", ccsText, "");
        
        $this->num_columna_excel = new clsField("num_columna_excel", ccsInteger, "");
        
        $this->tipo_columna = new clsField("tipo_columna", ccsText, "");
        
        $this->acepta_nulo = new clsField("acepta_nulo", ccsText, "");
        
        $this->dato_indispensable = new clsField("dato_indispensable", ccsBoolean, $this->BooleanFormat);
        
        $this->valor_x_default = new clsField("valor_x_default", ccsText, "");
        
        $this->mapeo_de_valor = new clsField("mapeo_de_valor", ccsText, "");
        

        $this->InsertFields["cve_carga"] = array("Name" => "cve_carga", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["nombre_columna_tabla"] = array("Name" => "nombre_columna_tabla", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["num_columna_excel"] = array("Name" => "num_columna_excel", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["tipo_columna"] = array("Name" => "tipo_columna", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["acepta_nulo"] = array("Name" => "acepta_nulo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["dato_indispensable"] = array("Name" => "dato_indispensable", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["valor_x_default"] = array("Name" => "valor_x_default", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["mapeo_de_valor"] = array("Name" => "mapeo_de_valor", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["cve_carga"] = array("Name" => "cve_carga", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["nombre_columna_tabla"] = array("Name" => "nombre_columna_tabla", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["num_columna_excel"] = array("Name" => "num_columna_excel", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["tipo_columna"] = array("Name" => "tipo_columna", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["acepta_nulo"] = array("Name" => "acepta_nulo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["dato_indispensable"] = array("Name" => "dato_indispensable", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["valor_x_default"] = array("Name" => "valor_x_default", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["mapeo_de_valor"] = array("Name" => "mapeo_de_valor", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-9EC4EC12
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlid_detalle_layout", ccsInteger, "", "", $this->Parameters["urlid_detalle_layout"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_detalle_layout", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-2534263A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM detalle_layout {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-71CEE145
    function SetValues()
    {
        $this->cve_carga->SetDBValue($this->f("cve_carga"));
        $this->nombre_columna_tabla->SetDBValue($this->f("nombre_columna_tabla"));
        $this->num_columna_excel->SetDBValue(trim($this->f("num_columna_excel")));
        $this->tipo_columna->SetDBValue($this->f("tipo_columna"));
        $this->acepta_nulo->SetDBValue($this->f("acepta_nulo"));
        $this->dato_indispensable->SetDBValue(trim($this->f("dato_indispensable")));
        $this->valor_x_default->SetDBValue($this->f("valor_x_default"));
        $this->mapeo_de_valor->SetDBValue($this->f("mapeo_de_valor"));
    }
//End SetValues Method

//Insert Method @2-E2B09910
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["cve_carga"]["Value"] = $this->cve_carga->GetDBValue(true);
        $this->InsertFields["nombre_columna_tabla"]["Value"] = $this->nombre_columna_tabla->GetDBValue(true);
        $this->InsertFields["num_columna_excel"]["Value"] = $this->num_columna_excel->GetDBValue(true);
        $this->InsertFields["tipo_columna"]["Value"] = $this->tipo_columna->GetDBValue(true);
        $this->InsertFields["acepta_nulo"]["Value"] = $this->acepta_nulo->GetDBValue(true);
        $this->InsertFields["dato_indispensable"]["Value"] = $this->dato_indispensable->GetDBValue(true);
        $this->InsertFields["valor_x_default"]["Value"] = $this->valor_x_default->GetDBValue(true);
        $this->InsertFields["mapeo_de_valor"]["Value"] = $this->mapeo_de_valor->GetDBValue(true);
        $this->SQL = CCBuildInsert("detalle_layout", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-1FE011DF
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["cve_carga"]["Value"] = $this->cve_carga->GetDBValue(true);
        $this->UpdateFields["nombre_columna_tabla"]["Value"] = $this->nombre_columna_tabla->GetDBValue(true);
        $this->UpdateFields["num_columna_excel"]["Value"] = $this->num_columna_excel->GetDBValue(true);
        $this->UpdateFields["tipo_columna"]["Value"] = $this->tipo_columna->GetDBValue(true);
        $this->UpdateFields["acepta_nulo"]["Value"] = $this->acepta_nulo->GetDBValue(true);
        $this->UpdateFields["dato_indispensable"]["Value"] = $this->dato_indispensable->GetDBValue(true);
        $this->UpdateFields["valor_x_default"]["Value"] = $this->valor_x_default->GetDBValue(true);
        $this->UpdateFields["mapeo_de_valor"]["Value"] = $this->mapeo_de_valor->GetDBValue(true);
        $this->SQL = CCBuildUpdate("detalle_layout", $this->UpdateFields, $this);
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

//Delete Method @2-66A9426D
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM detalle_layout";
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

} //End detalle_layoutDataSource Class @2-FCB6E20C

//Include Page implementation @15-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsMenuMenu1 extends clsMenu { //Menu1 class @23-FEAC4CDE

//Class_Initialize Event @23-391691DD
    function clsMenuMenu1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Menu1";
        $this->Visible = True;
        $this->controls = array();
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->ErrorBlock = "Menu Menu1";

        $this->StaticItems = array();
        $this->StaticItems[] = array("item_id" => "MenuItem2", "item_id_parent" => null, "item_caption" => "Procesos de carga", "item_url" => array("Page" => "ProcesoCargaAList.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3", "item_id_parent" => null, "item_caption" => "Layouts de procesos de carga", "item_url" => array("Page" => "DetalleLayoutList.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem1", "item_id_parent" => null, "item_caption" => "Log ultimas cargas", "item_url" => array("Page" => "UltimasCargas.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem4", "item_id_parent" => null, "item_caption" => "Ejecutar Carga", "item_url" => array("Page" => "ExecCarga.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");

        $this->DataSource = new clsMenu1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->DataSource->SetProvider(array("DBLib" => "Array"));

        parent::clsMenu("item_id_parent", "item_id", null);

        $this->ItemLink = new clsControl(ccsLink, "ItemLink", "ItemLink", ccsText, "", CCGetRequestParam("ItemLink", ccsGet, NULL), $this);
        $this->controls["ItemLink"] = & $this->ItemLink;
        $this->ItemLink->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ItemLink->Page = "";
        $this->LinkStartParameters = $this->ItemLink->Parameters;
    }
//End Class_Initialize Event

//SetControlValues Method @23-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @23-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End Menu1 Class @23-FCB6E20C

//Menu1DataSource Class @23-201CC8D7
class clsMenu1DataSource extends DB_Adapter {
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;
    var $wp;
    var $Record = array();
    var $Index;
    var $FieldsList = array();

    function clsMenu1DataSource($parent) {
        $this->Parent = & $parent;
        $this->ErrorBlock = "Menu Menu1";
        $this->ItemLink = new clsField("ItemLink", ccsText, "");
        $this->FieldsList["ItemLink"] = & $this->ItemLink;
    }

    function Prepare()
    {
    }

    function Open()
    {
        $this->query($this->Parent->StaticItems);
    }

    function SetValues()
    {
        $this->ItemLink->SetDBValue($this->f("item_caption"));
    }
}
//End Menu1DataSource Class

//Initialize Page @1-C143158A
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
$TemplateFileName = "DetalleLayoutMaint.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/menu/ccs-menu.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-DC94A87D
CCSecurityRedirect("1", "");
//End Authenticate User

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-86FE49EC
$DBConnCarga = new clsDBConnCarga();
$MainPage->Connections["ConnCarga"] = & $DBConnCarga;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$detalle_layout = new clsRecorddetalle_layout("", $MainPage);
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$Menu1 = new clsMenuMenu1("", $MainPage);
$MainPage->detalle_layout = & $detalle_layout;
$MainPage->Header = & $Header;
$MainPage->Menu1 = & $Menu1;
$detalle_layout->Initialize();
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

//Initialize HTML Template @1-7D7DF5BA
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
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-3525A4C4
$Header->Operations();
$detalle_layout->Operation();
//End Execute Components

//Go to destination page @1-F985655A
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnCarga->close();
    header("Location: " . $Redirect);
    unset($detalle_layout);
    $Header->Class_Terminate();
    unset($Header);
    unset($Menu1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-BFB78DF4
$detalle_layout->Show();
$Header->Show();
$Menu1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-5CEEFB7A
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnCarga->close();
unset($detalle_layout);
$Header->Class_Terminate();
unset($Header);
unset($Menu1);
unset($Tpl);
//End Unload Page


?>
