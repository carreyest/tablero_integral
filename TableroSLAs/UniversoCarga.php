<?php
//Include Common Files @1-DE8CB7B0
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "UniversoCarga.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @20-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecorduniverso_cds { //universo_cds Class @2-1D17A04F

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

//Class_Initialize Event @2-DA75C48C
    function clsRecorduniverso_cds($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record universo_cds/Error";
        $this->DataSource = new clsuniverso_cdsDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "universo_cds";
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
            $this->id_proveedor = new clsControl(ccsListBox, "id_proveedor", "CDS", ccsInteger, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->id_proveedor->DSType = dsTable;
            $this->id_proveedor->DataSource = new clsDBcnDisenio();
            $this->id_proveedor->ds = & $this->id_proveedor->DataSource;
            $this->id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->id_proveedor->BoundColumn, $this->id_proveedor->TextColumn, $this->id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->id_proveedor->DataSource->Parameters["expr5"] = "CDS";
            $this->id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->id_proveedor->DataSource->wp->AddParameter("1", "expr5", ccsText, "", "", $this->id_proveedor->DataSource->Parameters["expr5"], "", false);
            $this->id_proveedor->DataSource->wp->Criterion[1] = $this->id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->id_proveedor->DataSource->wp->GetDBValue("1"), $this->id_proveedor->DataSource->ToSQL($this->id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->id_proveedor->DataSource->Where = 
                 $this->id_proveedor->DataSource->wp->Criterion[1];
            $this->id_proveedor->Required = true;
            $this->txtIncidentes = new clsControl(ccsTextArea, "txtIncidentes", "Numero", ccsText, "", CCGetRequestParam("txtIncidentes", $Method, NULL), $this);
            $this->txtIncidentes->Required = true;
            $this->mes = new clsControl(ccsListBox, "mes", "Mes", ccsInteger, "", CCGetRequestParam("mes", $Method, NULL), $this);
            $this->mes->DSType = dsTable;
            $this->mes->DataSource = new clsDBcnDisenio();
            $this->mes->ds = & $this->mes->DataSource;
            $this->mes->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->mes->BoundColumn, $this->mes->TextColumn, $this->mes->DBFormat) = array("IdMes", "Mes", "");
            $this->mes->Required = true;
            $this->anio = new clsControl(ccsListBox, "anio", "Anio", ccsInteger, "", CCGetRequestParam("anio", $Method, NULL), $this);
            $this->anio->DSType = dsListOfValues;
            $this->anio->Values = array(array("2013", "2013"), array("2014", "2014"), array("2015", "2015"));
            $this->anio->Required = true;
            $this->txtPPMC_Aprobados = new clsControl(ccsTextArea, "txtPPMC_Aprobados", "txtPPMC_Aprobados", ccsText, "", CCGetRequestParam("txtPPMC_Aprobados", $Method, NULL), $this);
            $this->txtPPMC_Cerrados = new clsControl(ccsTextArea, "txtPPMC_Cerrados", "txtPPMC_Cerrados", ccsText, "", CCGetRequestParam("txtPPMC_Cerrados", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->mes->Value) && !strlen($this->mes->Value) && $this->mes->Value !== false)
                    $this->mes->SetText(date('m'));
                if(!is_array($this->anio->Value) && !strlen($this->anio->Value) && $this->anio->Value !== false)
                    $this->anio->SetText(date('Y'));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @2-2832F4DC
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlid"] = CCGetFromGet("id", NULL);
    }
//End Initialize Method

//Validate Method @2-68E73905
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->id_proveedor->Validate() && $Validation);
        $Validation = ($this->txtIncidentes->Validate() && $Validation);
        $Validation = ($this->mes->Validate() && $Validation);
        $Validation = ($this->anio->Validate() && $Validation);
        $Validation = ($this->txtPPMC_Aprobados->Validate() && $Validation);
        $Validation = ($this->txtPPMC_Cerrados->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->txtIncidentes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->txtPPMC_Aprobados->Errors->Count() == 0);
        $Validation =  $Validation && ($this->txtPPMC_Cerrados->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-8F46CDB8
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->txtIncidentes->Errors->Count());
        $errors = ($errors || $this->mes->Errors->Count());
        $errors = ($errors || $this->anio->Errors->Count());
        $errors = ($errors || $this->txtPPMC_Aprobados->Errors->Count());
        $errors = ($errors || $this->txtPPMC_Cerrados->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-26AC3914
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
            $this->PressedButton = "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            }
        }
        $Redirect = "UniversoLista.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
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

//InsertRow Method @2-2B6A5BEC
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//Show Method @2-2598A394
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

        $this->id_proveedor->Prepare();
        $this->mes->Prepare();
        $this->anio->Prepare();

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
                    $this->txtIncidentes->SetValue($this->DataSource->txtIncidentes->GetValue());
                    $this->mes->SetValue($this->DataSource->mes->GetValue());
                    $this->anio->SetValue($this->DataSource->anio->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->txtIncidentes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->txtPPMC_Aprobados->Errors->ToString());
            $Error = ComposeStrings($Error, $this->txtPPMC_Cerrados->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->id_proveedor->Show();
        $this->txtIncidentes->Show();
        $this->mes->Show();
        $this->anio->Show();
        $this->txtPPMC_Aprobados->Show();
        $this->txtPPMC_Cerrados->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End universo_cds Class @2-FCB6E20C

class clsuniverso_cdsDataSource extends clsDBcnDisenio {  //universo_cdsDataSource Class @2-45E09402

//DataSource Variables @2-EB8F81CB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $id_proveedor;
    public $txtIncidentes;
    public $mes;
    public $anio;
    public $txtPPMC_Aprobados;
    public $txtPPMC_Cerrados;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-32DC566C
    function clsuniverso_cdsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record universo_cds/Error";
        $this->Initialize();
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->txtIncidentes = new clsField("txtIncidentes", ccsText, "");
        
        $this->mes = new clsField("mes", ccsInteger, "");
        
        $this->anio = new clsField("anio", ccsInteger, "");
        
        $this->txtPPMC_Aprobados = new clsField("txtPPMC_Aprobados", ccsText, "");
        
        $this->txtPPMC_Cerrados = new clsField("txtPPMC_Cerrados", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-35B33087
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

//Open Method @2-F09ADBA5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_universo_cds {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-E465895C
    function SetValues()
    {
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->txtIncidentes->SetDBValue($this->f("numero"));
        $this->mes->SetDBValue(trim($this->f("mes")));
        $this->anio->SetDBValue(trim($this->f("anio")));
    }
//End SetValues Method

//Insert Method @2-D82F642D
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->SQL = "Select 1";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

} //End universo_cdsDataSource Class @2-FCB6E20C

class clsRecordGeneraUniverso { //GeneraUniverso Class @23-8DC23ED6

//Variables @23-9E315808

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

//Class_Initialize Event @23-07551A56
    function clsRecordGeneraUniverso($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record GeneraUniverso/Error";
        $this->DataSource = new clsGeneraUniversoDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "GeneraUniverso";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->sMesMedicion = new clsControl(ccsTextBox, "sMesMedicion", "sMesMedicion", ccsInteger, "", CCGetRequestParam("sMesMedicion", $Method, NULL), $this);
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->sFechaCorte = new clsControl(ccsTextBox, "sFechaCorte", "sFechaCorte", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("sFechaCorte", $Method, NULL), $this);
            $this->sRutaArchivos = new clsControl(ccsTextBox, "sRutaArchivos", "sRutaArchivos", ccsText, "", CCGetRequestParam("sRutaArchivos", $Method, NULL), $this);
            $this->sAnioMedicion = new clsControl(ccsTextBox, "sAnioMedicion", "sAnioMedicion", ccsText, "", CCGetRequestParam("sAnioMedicion", $Method, NULL), $this);
            $this->lMensaje = new clsControl(ccsLabel, "lMensaje", "lMensaje", ccsText, "", CCGetRequestParam("lMensaje", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @23-5D060BAC
    function Initialize()
    {

        if(!$this->Visible)
            return;

    }
//End Initialize Method

//Validate Method @23-7AA4F20F
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->sMesMedicion->Validate() && $Validation);
        $Validation = ($this->sFechaCorte->Validate() && $Validation);
        $Validation = ($this->sRutaArchivos->Validate() && $Validation);
        $Validation = ($this->sAnioMedicion->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->sMesMedicion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sFechaCorte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sRutaArchivos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sAnioMedicion->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @23-DE80269F
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->sMesMedicion->Errors->Count());
        $errors = ($errors || $this->sFechaCorte->Errors->Count());
        $errors = ($errors || $this->sRutaArchivos->Errors->Count());
        $errors = ($errors || $this->sAnioMedicion->Errors->Count());
        $errors = ($errors || $this->lMensaje->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @23-003D273D
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = true;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = $FileName;
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = $FileName . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
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

//Show Method @23-233E4BE2
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
                    $this->sMesMedicion->SetValue($this->DataSource->sMesMedicion->GetValue());
                    $this->sFechaCorte->SetValue($this->DataSource->sFechaCorte->GetValue());
                    $this->sRutaArchivos->SetValue($this->DataSource->sRutaArchivos->GetValue());
                    $this->sAnioMedicion->SetValue($this->DataSource->sAnioMedicion->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->sMesMedicion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sFechaCorte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sRutaArchivos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sAnioMedicion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lMensaje->Errors->ToString());
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

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->sMesMedicion->Show();
        $this->Button_DoSearch->Show();
        $this->sFechaCorte->Show();
        $this->sRutaArchivos->Show();
        $this->sAnioMedicion->Show();
        $this->lMensaje->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End GeneraUniverso Class @23-FCB6E20C

class clsGeneraUniversoDataSource extends clsDBcnDisenio {  //GeneraUniversoDataSource Class @23-408FB50D

//DataSource Variables @23-F2BD440E
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $sMesMedicion;
    public $sFechaCorte;
    public $sRutaArchivos;
    public $sAnioMedicion;
    public $lMensaje;
//End DataSource Variables

//DataSourceClass_Initialize Event @23-70F3177B
    function clsGeneraUniversoDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record GeneraUniverso/Error";
        $this->Initialize();
        $this->sMesMedicion = new clsField("sMesMedicion", ccsInteger, "");
        
        $this->sFechaCorte = new clsField("sFechaCorte", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->sRutaArchivos = new clsField("sRutaArchivos", ccsText, "");
        
        $this->sAnioMedicion = new clsField("sAnioMedicion", ccsText, "");
        
        $this->lMensaje = new clsField("lMensaje", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @23-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @23-D4A096CE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "\n" .
        "\n" .
        "select valor RutaArchivos, Month(FechaCarga) MesCarga, Year(FechaCarga) AnioCarga , FechaCorte  \n" .
        "from mc_parametros p\n" .
        "	inner join (select \n" .
        "	dateadd(m,1,max(convert(date,cast(anio as varchar) + '-' + cast(mes as varchar)+ '-1'))) FechaCarga,\n" .
        "	case when DATEPART(W, getdate()) <6 then \n" .
        "			DATEADD(d,(-1*(DATEPART(W, getdate())+1)),GETDATE())\n" .
        "		else \n" .
        "			DATEADD(d,6-DATEPART(W, getdate()),getdate())\n" .
        "		end FechaCorte,1 id\n" .
        "from mc_universo_cds \n" .
        "	) as  mesd  on mesd.id= p.id \n" .
        "where p.parametro ='RutaArchivos CAPC'\n" .
        "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @23-7FAFA890
    function SetValues()
    {
        $this->sMesMedicion->SetDBValue(trim($this->f("MesCarga")));
        $this->sFechaCorte->SetDBValue(trim($this->f("FechaCorte")));
        $this->sRutaArchivos->SetDBValue($this->f("RutaArchivos"));
        $this->sAnioMedicion->SetDBValue($this->f("AnioCarga"));
    }
//End SetValues Method

} //End GeneraUniversoDataSource Class @23-FCB6E20C



//Initialize Page @1-3F9035D1
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
$TemplateFileName = "UniversoCarga.html";
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

//Include events file @1-3417EA81
include_once("./UniversoCarga_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-F471AD1C
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$universo_cds = new clsRecorduniverso_cds("", $MainPage);
$GeneraUniverso = new clsRecordGeneraUniverso("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->universo_cds = & $universo_cds;
$MainPage->GeneraUniverso = & $GeneraUniverso;
$universo_cds->Initialize();
$GeneraUniverso->Initialize();
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

//Execute Components @1-F21681D1
$GeneraUniverso->Operation();
$universo_cds->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-64C1F8F3
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($universo_cds);
    unset($GeneraUniverso);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-34FF6A3B
$Header->Show();
$universo_cds->Show();
$GeneraUniverso->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-70CC7225
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($universo_cds);
unset($GeneraUniverso);
unset($Tpl);
//End Unload Page


?>
