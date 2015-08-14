<?php
//Include Common Files @1-89800D74
define("RelativePath", "..");
define("PathToCurrentPage", "/Catalogos/");
define("FileName", "Usuarios.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_c_usuariosSearch { //mc_c_usuariosSearch Class @24-73AF4737

//Variables @24-9E315808

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

//Class_Initialize Event @24-A3E0EBCD
    function clsRecordmc_c_usuariosSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_c_usuariosSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_c_usuariosSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_Usuario = new clsControl(ccsTextBox, "s_Usuario", "Usuario", ccsText, "", CCGetRequestParam("s_Usuario", $Method, NULL), $this);
            $this->s_Grupo = new clsControl(ccsListBox, "s_Grupo", "Grupo", ccsText, "", CCGetRequestParam("s_Grupo", $Method, NULL), $this);
            $this->s_Grupo->DSType = dsListOfValues;
            $this->s_Grupo->Values = array(array("SAT", "SAT"), array("CAPC", "CAPC"), array("CDS", "CDS"));
        }
    }
//End Class_Initialize Event

//Validate Method @24-8D2CBF1B
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_Usuario->Validate() && $Validation);
        $Validation = ($this->s_Grupo->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_Usuario->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Grupo->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @24-B39A4D6F
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_Usuario->Errors->Count());
        $errors = ($errors || $this->s_Grupo->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @24-0C23A7AD
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
        $Redirect = "Usuarios.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "Usuarios.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @24-030B3E8A
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

        $this->s_Grupo->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_Usuario->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Grupo->Errors->ToString());
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
        $this->s_Usuario->Show();
        $this->s_Grupo->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_c_usuariosSearch Class @24-FCB6E20C

class clsGridmc_c_usuarios { //mc_c_usuarios class @3-2EBF058C

//Variables @3-27FAE66D

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
    public $Sorter_Usuario;
    public $Sorter_Nivel;
    public $Sorter_Grupo;
//End Variables

//Class_Initialize Event @3-FE6062AF
    function clsGridmc_c_usuarios($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_c_usuarios";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_c_usuarios";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_c_usuariosDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 25;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("mc_c_usuariosOrder", "");
        $this->SorterDirection = CCGetParam("mc_c_usuariosDir", "");

        $this->Id = new clsControl(ccsLink, "Id", "Id", ccsInteger, "", CCGetRequestParam("Id", ccsGet, NULL), $this);
        $this->Id->Page = "";
        $this->Usuario = new clsControl(ccsLabel, "Usuario", "Usuario", ccsText, "", CCGetRequestParam("Usuario", ccsGet, NULL), $this);
        $this->Nivel = new clsControl(ccsLabel, "Nivel", "Nivel", ccsInteger, "", CCGetRequestParam("Nivel", ccsGet, NULL), $this);
        $this->Grupo = new clsControl(ccsLabel, "Grupo", "Grupo", ccsText, "", CCGetRequestParam("Grupo", ccsGet, NULL), $this);
        $this->Nombre = new clsControl(ccsLabel, "Nombre", "Nombre", ccsText, "", CCGetRequestParam("Nombre", ccsGet, NULL), $this);
        $this->mc_c_usuarios_Insert = new clsControl(ccsLink, "mc_c_usuarios_Insert", "mc_c_usuarios_Insert", ccsText, "", CCGetRequestParam("mc_c_usuarios_Insert", ccsGet, NULL), $this);
        $this->mc_c_usuarios_Insert->Parameters = CCGetQueryString("QueryString", array("Id", "ccsForm"));
        $this->mc_c_usuarios_Insert->Page = "Usuarios.php";
        $this->mc_c_usuarios_TotalRecords = new clsControl(ccsLabel, "mc_c_usuarios_TotalRecords", "mc_c_usuarios_TotalRecords", ccsText, "", CCGetRequestParam("mc_c_usuarios_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_Id = new clsSorter($this->ComponentName, "Sorter_Id", $FileName, $this);
        $this->Sorter_Usuario = new clsSorter($this->ComponentName, "Sorter_Usuario", $FileName, $this);
        $this->Sorter_Nivel = new clsSorter($this->ComponentName, "Sorter_Nivel", $FileName, $this);
        $this->Sorter_Grupo = new clsSorter($this->ComponentName, "Sorter_Grupo", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @3-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @3-4DAAD81D
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_Usuario"] = CCGetFromGet("s_Usuario", NULL);
        $this->DataSource->Parameters["urls_Grupo"] = CCGetFromGet("s_Grupo", NULL);

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
            $this->ControlsVisible["Usuario"] = $this->Usuario->Visible;
            $this->ControlsVisible["Nivel"] = $this->Nivel->Visible;
            $this->ControlsVisible["Grupo"] = $this->Grupo->Visible;
            $this->ControlsVisible["Nombre"] = $this->Nombre->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Id->SetValue($this->DataSource->Id->GetValue());
                $this->Id->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Id->Parameters = CCAddParam($this->Id->Parameters, "Id", $this->DataSource->f("Id"));
                $this->Usuario->SetValue($this->DataSource->Usuario->GetValue());
                $this->Nivel->SetValue($this->DataSource->Nivel->GetValue());
                $this->Grupo->SetValue($this->DataSource->Grupo->GetValue());
                $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id->Show();
                $this->Usuario->Show();
                $this->Nivel->Show();
                $this->Grupo->Show();
                $this->Nombre->Show();
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
        $this->mc_c_usuarios_Insert->Show();
        $this->mc_c_usuarios_TotalRecords->Show();
        $this->Sorter_Id->Show();
        $this->Sorter_Usuario->Show();
        $this->Sorter_Nivel->Show();
        $this->Sorter_Grupo->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-A5D80722
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Usuario->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Nivel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Grupo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_c_usuarios Class @3-FCB6E20C

class clsmc_c_usuariosDataSource extends clsDBcnDisenio {  //mc_c_usuariosDataSource Class @3-86F6BAC1

//DataSource Variables @3-F5AAC63F
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Id;
    public $Usuario;
    public $Nivel;
    public $Grupo;
    public $Nombre;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-CB99A7F0
    function clsmc_c_usuariosDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_c_usuarios";
        $this->Initialize();
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->Usuario = new clsField("Usuario", ccsText, "");
        
        $this->Nivel = new clsField("Nivel", ccsInteger, "");
        
        $this->Grupo = new clsField("Grupo", ccsText, "");
        
        $this->Nombre = new clsField("Nombre", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-018A3C1A
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Id" => array("Id", ""), 
            "Sorter_Usuario" => array("Usuario", ""), 
            "Sorter_Nivel" => array("Nivel", ""), 
            "Sorter_Grupo" => array("Grupo", "")));
    }
//End SetOrder Method

//Prepare Method @3-112727D5
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_Usuario", ccsText, "", "", $this->Parameters["urls_Usuario"], "", false);
        $this->wp->AddParameter("2", "urls_Grupo", ccsText, "", "", $this->Parameters["urls_Grupo"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "[Usuario]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "[Grupo]", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @3-CE19AE50
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM mc_c_usuarios";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} Id, Usuario, Nivel, Grupo, Nombre \n\n" .
        "FROM mc_c_usuarios {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @3-77330858
    function SetValues()
    {
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->Usuario->SetDBValue($this->f("Usuario"));
        $this->Nivel->SetDBValue(trim($this->f("Nivel")));
        $this->Grupo->SetDBValue($this->f("Grupo"));
        $this->Nombre->SetDBValue($this->f("Nombre"));
    }
//End SetValues Method

} //End mc_c_usuariosDataSource Class @3-FCB6E20C



class clsRecordmc_c_usuarios1 { //mc_c_usuarios1 Class @28-F7AA8C5C

//Variables @28-9E315808

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

//Class_Initialize Event @28-3D721DD0
    function clsRecordmc_c_usuarios1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_c_usuarios1/Error";
        $this->DataSource = new clsmc_c_usuarios1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_c_usuarios1";
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
            $this->Usuario = new clsControl(ccsTextBox, "Usuario", "Usuario", ccsText, "", CCGetRequestParam("Usuario", $Method, NULL), $this);
            $this->Usuario->Required = true;
            $this->Clave = new clsControl(ccsTextBox, "Clave", "Clave", ccsText, "", CCGetRequestParam("Clave", $Method, NULL), $this);
            $this->Clave->Required = true;
            $this->Nivel = new clsControl(ccsListBox, "Nivel", "Nivel", ccsInteger, "", CCGetRequestParam("Nivel", $Method, NULL), $this);
            $this->Nivel->DSType = dsListOfValues;
            $this->Nivel->Values = array(array("1", "Visitante"), array("2", "Capturista"), array("3", "Analista"), array("4", "Supervisor"), array("5", "Administrador"));
            $this->Grupo = new clsControl(ccsListBox, "Grupo", "Grupo", ccsText, "", CCGetRequestParam("Grupo", $Method, NULL), $this);
            $this->Grupo->DSType = dsListOfValues;
            $this->Grupo->Values = array(array("SLAs", "SLAs"), array("CAPC", "CAPC"), array("CDS", "CDS"), array("MyM", "MyM"));
            $this->Clave_Shadow = new clsControl(ccsHidden, "Clave_Shadow", "Clave_Shadow", ccsText, "", CCGetRequestParam("Clave_Shadow", $Method, NULL), $this);
            $this->UsrSharepoint = new clsControl(ccsTextBox, "UsrSharepoint", "UsrSharepoint", ccsText, "", CCGetRequestParam("UsrSharepoint", $Method, NULL), $this);
            $this->PwdSharePoint = new clsControl(ccsTextBox, "PwdSharePoint", "PwdSharePoint", ccsText, "", CCGetRequestParam("PwdSharePoint", $Method, NULL), $this);
            $this->CDSDefault = new clsControl(ccsListBox, "CDSDefault", "CDSDefault", ccsText, "", CCGetRequestParam("CDSDefault", $Method, NULL), $this);
            $this->CDSDefault->DSType = dsTable;
            $this->CDSDefault->DataSource = new clsDBcnDisenio();
            $this->CDSDefault->ds = & $this->CDSDefault->DataSource;
            $this->CDSDefault->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->CDSDefault->BoundColumn, $this->CDSDefault->TextColumn, $this->CDSDefault->DBFormat) = array("id_proveedor", "nombre", "");
            $this->Nombre = new clsControl(ccsTextBox, "Nombre", "Nombre", ccsText, "", CCGetRequestParam("Nombre", $Method, NULL), $this);
            $this->CheckBox1 = new clsControl(ccsCheckBox, "CheckBox1", "CheckBox1", ccsInteger, "", CCGetRequestParam("CheckBox1", $Method, NULL), $this);
            $this->CheckBox1->CheckedValue = $this->CheckBox1->GetParsedValue(1);
            $this->CheckBox1->UncheckedValue = $this->CheckBox1->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->CDSDefault->Value) && !strlen($this->CDSDefault->Value) && $this->CDSDefault->Value !== false)
                    $this->CDSDefault->SetText(0);
                if(!is_array($this->CheckBox1->Value) && !strlen($this->CheckBox1->Value) && $this->CheckBox1->Value !== false)
                    $this->CheckBox1->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @28-4F76030F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//Validate Method @28-C0854312
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Usuario->Validate() && $Validation);
        $Validation = ($this->Clave->Validate() && $Validation);
        $Validation = ($this->Nivel->Validate() && $Validation);
        $Validation = ($this->Grupo->Validate() && $Validation);
        $Validation = ($this->Clave_Shadow->Validate() && $Validation);
        $Validation = ($this->UsrSharepoint->Validate() && $Validation);
        $Validation = ($this->PwdSharePoint->Validate() && $Validation);
        $Validation = ($this->CDSDefault->Validate() && $Validation);
        $Validation = ($this->Nombre->Validate() && $Validation);
        $Validation = ($this->CheckBox1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Usuario->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Clave->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Nivel->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Grupo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Clave_Shadow->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsrSharepoint->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PwdSharePoint->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CDSDefault->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Nombre->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CheckBox1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @28-A18FCD8B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Usuario->Errors->Count());
        $errors = ($errors || $this->Clave->Errors->Count());
        $errors = ($errors || $this->Nivel->Errors->Count());
        $errors = ($errors || $this->Grupo->Errors->Count());
        $errors = ($errors || $this->Clave_Shadow->Errors->Count());
        $errors = ($errors || $this->UsrSharepoint->Errors->Count());
        $errors = ($errors || $this->PwdSharePoint->Errors->Count());
        $errors = ($errors || $this->CDSDefault->Errors->Count());
        $errors = ($errors || $this->Nombre->Errors->Count());
        $errors = ($errors || $this->CheckBox1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @28-E955BD63
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

//InsertRow Method @28-3696ECD6
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Usuario->SetValue($this->Usuario->GetValue(true));
        $this->DataSource->Clave->SetValue($this->Clave->GetValue(true));
        $this->DataSource->Nivel->SetValue($this->Nivel->GetValue(true));
        $this->DataSource->Grupo->SetValue($this->Grupo->GetValue(true));
        $this->DataSource->Clave_Shadow->SetValue($this->Clave_Shadow->GetValue(true));
        $this->DataSource->UsrSharepoint->SetValue($this->UsrSharepoint->GetValue(true));
        $this->DataSource->PwdSharePoint->SetValue($this->PwdSharePoint->GetValue(true));
        $this->DataSource->CDSDefault->SetValue($this->CDSDefault->GetValue(true));
        $this->DataSource->Nombre->SetValue($this->Nombre->GetValue(true));
        $this->DataSource->CheckBox1->SetValue($this->CheckBox1->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @28-D8B0874F
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Usuario->SetValue($this->Usuario->GetValue(true));
        $this->DataSource->Clave->SetValue($this->Clave->GetValue(true));
        $this->DataSource->Nivel->SetValue($this->Nivel->GetValue(true));
        $this->DataSource->Grupo->SetValue($this->Grupo->GetValue(true));
        $this->DataSource->Clave_Shadow->SetValue($this->Clave_Shadow->GetValue(true));
        $this->DataSource->UsrSharepoint->SetValue($this->UsrSharepoint->GetValue(true));
        $this->DataSource->PwdSharePoint->SetValue($this->PwdSharePoint->GetValue(true));
        $this->DataSource->CDSDefault->SetValue($this->CDSDefault->GetValue(true));
        $this->DataSource->Nombre->SetValue($this->Nombre->GetValue(true));
        $this->DataSource->CheckBox1->SetValue($this->CheckBox1->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @28-919C34E0
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

        $this->Nivel->Prepare();
        $this->Grupo->Prepare();
        $this->CDSDefault->Prepare();

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
                    $this->Usuario->SetValue($this->DataSource->Usuario->GetValue());
                    $this->Clave->SetValue($this->DataSource->Clave->GetValue());
                    $this->Nivel->SetValue($this->DataSource->Nivel->GetValue());
                    $this->Grupo->SetValue($this->DataSource->Grupo->GetValue());
                    $this->UsrSharepoint->SetValue($this->DataSource->UsrSharepoint->GetValue());
                    $this->PwdSharePoint->SetValue($this->DataSource->PwdSharePoint->GetValue());
                    $this->CDSDefault->SetValue($this->DataSource->CDSDefault->GetValue());
                    $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                    $this->CheckBox1->SetValue($this->DataSource->CheckBox1->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Usuario->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Clave->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Nivel->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Grupo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Clave_Shadow->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsrSharepoint->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PwdSharePoint->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CDSDefault->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Nombre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CheckBox1->Errors->ToString());
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
        $this->Usuario->Show();
        $this->Clave->Show();
        $this->Nivel->Show();
        $this->Grupo->Show();
        $this->Clave_Shadow->Show();
        $this->UsrSharepoint->Show();
        $this->PwdSharePoint->Show();
        $this->CDSDefault->Show();
        $this->Nombre->Show();
        $this->CheckBox1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_c_usuarios1 Class @28-FCB6E20C

class clsmc_c_usuarios1DataSource extends clsDBcnDisenio {  //mc_c_usuarios1DataSource Class @28-ACEFFDFB

//DataSource Variables @28-841C3CF9
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
    public $Usuario;
    public $Clave;
    public $Nivel;
    public $Grupo;
    public $Clave_Shadow;
    public $UsrSharepoint;
    public $PwdSharePoint;
    public $CDSDefault;
    public $Nombre;
    public $CheckBox1;
//End DataSource Variables

//DataSourceClass_Initialize Event @28-AB7A1CD2
    function clsmc_c_usuarios1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_c_usuarios1/Error";
        $this->Initialize();
        $this->Usuario = new clsField("Usuario", ccsText, "");
        
        $this->Clave = new clsField("Clave", ccsText, "");
        
        $this->Nivel = new clsField("Nivel", ccsInteger, "");
        
        $this->Grupo = new clsField("Grupo", ccsText, "");
        
        $this->Clave_Shadow = new clsField("Clave_Shadow", ccsText, "");
        
        $this->UsrSharepoint = new clsField("UsrSharepoint", ccsText, "");
        
        $this->PwdSharePoint = new clsField("PwdSharePoint", ccsText, "");
        
        $this->CDSDefault = new clsField("CDSDefault", ccsText, "");
        
        $this->Nombre = new clsField("Nombre", ccsText, "");
        
        $this->CheckBox1 = new clsField("CheckBox1", ccsInteger, "");
        

        $this->InsertFields["Usuario"] = array("Name" => "[Usuario]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Clave"] = array("Name" => "[Clave]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Nivel"] = array("Name" => "[Nivel]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Grupo"] = array("Name" => "[Grupo]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["UsrSharePoint"] = array("Name" => "[UsrSharePoint]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PwdSharePoint"] = array("Name" => "[PwdSharePoint]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CDSDefault"] = array("Name" => "[CDSDefault]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Nombre"] = array("Name" => "[Nombre]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Activo"] = array("Name" => "[Activo]", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["Usuario"] = array("Name" => "[Usuario]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Clave"] = array("Name" => "[Clave]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Nivel"] = array("Name" => "[Nivel]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Grupo"] = array("Name" => "[Grupo]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsrSharePoint"] = array("Name" => "[UsrSharePoint]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PwdSharePoint"] = array("Name" => "[PwdSharePoint]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CDSDefault"] = array("Name" => "[CDSDefault]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Nombre"] = array("Name" => "[Nombre]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Activo"] = array("Name" => "[Activo]", "Value" => "", "DataType" => ccsInteger);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @28-D6C1B08E
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

//Open Method @28-49D3BF33
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

//SetValues Method @28-03FDCD50
    function SetValues()
    {
        $this->Usuario->SetDBValue($this->f("Usuario"));
        $this->Clave->SetDBValue($this->f("Clave"));
        $this->Nivel->SetDBValue(trim($this->f("Nivel")));
        $this->Grupo->SetDBValue($this->f("Grupo"));
        $this->UsrSharepoint->SetDBValue($this->f("UsrSharePoint"));
        $this->PwdSharePoint->SetDBValue($this->f("PwdSharePoint"));
        $this->CDSDefault->SetDBValue($this->f("CDSDefault"));
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->CheckBox1->SetDBValue(trim($this->f("Activo")));
    }
//End SetValues Method

//Insert Method @28-AF0DA40A
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Usuario"]["Value"] = $this->Usuario->GetDBValue(true);
        $this->InsertFields["Clave"]["Value"] = $this->Clave->GetDBValue(true);
        $this->InsertFields["Nivel"]["Value"] = $this->Nivel->GetDBValue(true);
        $this->InsertFields["Grupo"]["Value"] = $this->Grupo->GetDBValue(true);
        $this->InsertFields["UsrSharePoint"]["Value"] = $this->UsrSharepoint->GetDBValue(true);
        $this->InsertFields["PwdSharePoint"]["Value"] = $this->PwdSharePoint->GetDBValue(true);
        $this->InsertFields["CDSDefault"]["Value"] = $this->CDSDefault->GetDBValue(true);
        $this->InsertFields["Nombre"]["Value"] = $this->Nombre->GetDBValue(true);
        $this->InsertFields["Activo"]["Value"] = $this->CheckBox1->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_c_usuarios", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @28-0472C278
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Usuario"]["Value"] = $this->Usuario->GetDBValue(true);
        $this->UpdateFields["Clave"]["Value"] = $this->Clave->GetDBValue(true);
        $this->UpdateFields["Nivel"]["Value"] = $this->Nivel->GetDBValue(true);
        $this->UpdateFields["Grupo"]["Value"] = $this->Grupo->GetDBValue(true);
        $this->UpdateFields["UsrSharePoint"]["Value"] = $this->UsrSharepoint->GetDBValue(true);
        $this->UpdateFields["PwdSharePoint"]["Value"] = $this->PwdSharePoint->GetDBValue(true);
        $this->UpdateFields["CDSDefault"]["Value"] = $this->CDSDefault->GetDBValue(true);
        $this->UpdateFields["Nombre"]["Value"] = $this->Nombre->GetDBValue(true);
        $this->UpdateFields["Activo"]["Value"] = $this->CheckBox1->GetDBValue(true);
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

} //End mc_c_usuarios1DataSource Class @28-FCB6E20C

class clsEditableGridusuario_reporteMyM { //usuario_reporteMyM Class @96-01508201

//Variables @96-B659A082

    // Public variables
    public $ComponentType = "EditableGrid";
    public $ComponentName;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormParameters;
    public $FormState;
    public $FormEnctype;
    public $CachedColumns;
    public $TotalRows;
    public $UpdatedRows;
    public $EmptyRows;
    public $Visible;
    public $RowsErrors;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode;
    public $ValidatingControls;
    public $Controls;
    public $ControlsErrors;
    public $RowNumber;
    public $Attributes;

    // Class variables
    public $Sorter_id_registro;
    public $Sorter_nombre_reporte;
    public $Sorter_activo;
//End Variables

//Class_Initialize Event @96-6F7688CA
    function clsEditableGridusuario_reporteMyM($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid usuario_reporteMyM/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "usuario_reporteMyM";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->CachedColumns["id_registro"][0] = "id_registro";
        $this->DataSource = new clsusuario_reporteMyMDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 40;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: EditableGrid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->EmptyRows = 0;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if(!$this->Visible) return;

        $CCSForm = CCGetFromGet("ccsForm", "");
        $this->FormEnctype = "application/x-www-form-urlencoded";
        $this->FormSubmitted = ($CCSForm == $this->ComponentName);
        if($this->FormSubmitted) {
            $this->FormState = CCGetFromPost("FormState", "");
            $this->SetFormState($this->FormState);
        } else {
            $this->FormState = "";
        }
        $Method = $this->FormSubmitted ? ccsPost : ccsGet;

        $this->SorterName = CCGetParam("usuario_reporteMyMOrder", "");
        $this->SorterDirection = CCGetParam("usuario_reporteMyMDir", "");

        $this->Sorter_id_registro = new clsSorter($this->ComponentName, "Sorter_id_registro", $FileName, $this);
        $this->Sorter_nombre_reporte = new clsSorter($this->ComponentName, "Sorter_nombre_reporte", $FileName, $this);
        $this->Sorter_activo = new clsSorter($this->ComponentName, "Sorter_activo", $FileName, $this);
        $this->id_registro = new clsControl(ccsLabel, "id_registro", "id_registro", ccsInteger, "", NULL, $this);
        $this->nombre_reporte = new clsControl(ccsLabel, "nombre_reporte", "nombre_reporte", ccsText, "", NULL, $this);
        $this->activo = new clsControl(ccsCheckBox, "activo", "activo", ccsInteger, "", NULL, $this);
        $this->activo->CheckedValue = $this->activo->GetParsedValue(1);
        $this->activo->UncheckedValue = $this->activo->GetParsedValue(0);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
    }
//End Class_Initialize Event

//Initialize Method @96-2FFAA5AD
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//GetFormParameters Method @96-88A2A893
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["activo"][$RowNumber] = CCGetFromPost("activo_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @96-CAEDD373
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["id_registro"] = $this->CachedColumns["id_registro"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->activo->SetText($this->FormParameters["activo"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                $Validation = ($this->ValidateRow($this->RowNumber) && $Validation);
            }
            else if($this->CheckInsert())
            {
                $Validation = ($this->ValidateRow() && $Validation);
            }
        }
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//ValidateRow Method @96-D587E205
    function ValidateRow()
    {
        global $CCSLocales;
        $this->activo->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->activo->Errors->ToString());
        $this->activo->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @96-610FBF7B
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["activo"][$this->RowNumber]) && count($this->FormParameters["activo"][$this->RowNumber])) || strlen($this->FormParameters["activo"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @96-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @96-909F269B
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted)
            return;

        $this->GetFormParameters();
        $this->PressedButton = "Button_Submit";
        if($this->Button_Submit->Pressed) {
            $this->PressedButton = "Button_Submit";
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Submit") {
            if(!CCGetEvent($this->Button_Submit->CCSEvents, "OnClick", $this->Button_Submit) || !$this->UpdateGrid()) {
                $Redirect = "";
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//UpdateGrid Method @96-C973670F
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["id_registro"] = $this->CachedColumns["id_registro"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->activo->SetText($this->FormParameters["activo"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if($this->UpdateAllowed) { $Validation = ($this->UpdateRow() && $Validation); }
            }
            else if($this->CheckInsert() && $this->InsertAllowed)
            {
                $Validation = ($Validation && $this->InsertRow());
            }
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterSubmit", $this);
        if ($this->Errors->Count() == 0 && $Validation){
            $this->DataSource->close();
            return true;
        }
        return false;
    }
//End UpdateGrid Method

//UpdateRow Method @96-CF30C61E
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id_registro->SetValue($this->id_registro->GetValue(true));
        $this->DataSource->nombre_reporte->SetValue($this->nombre_reporte->GetValue(true));
        $this->DataSource->activo->SetValue($this->activo->GetValue(true));
        $this->DataSource->Update();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End UpdateRow Method

//FormScript Method @96-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @96-A1D2B0C1
    function SetFormState($FormState)
    {
        if(strlen($FormState)) {
            $FormState = str_replace("\\\\", "\\" . ord("\\"), $FormState);
            $FormState = str_replace("\\;", "\\" . ord(";"), $FormState);
            $pieces = explode(";", $FormState);
            $this->UpdatedRows = $pieces[0];
            $this->EmptyRows   = $pieces[1];
            $this->TotalRows = $this->UpdatedRows + $this->EmptyRows;
            $RowNumber = 0;
            for($i = 2; $i < sizeof($pieces); $i = $i + 1)  {
                $piece = $pieces[$i + 0];
                $piece = str_replace("\\" . ord("\\"), "\\", $piece);
                $piece = str_replace("\\" . ord(";"), ";", $piece);
                $this->CachedColumns["id_registro"][$RowNumber] = $piece;
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $this->CachedColumns["id_registro"][$RowNumber] = "";
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @96-BADC76DD
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["id_registro"][$i]));
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @96-3B267080
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->open();
        $is_next_record = ($this->ReadAllowed && $this->DataSource->next_record());
        $this->IsEmpty = ! $is_next_record;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) { return; }

        $this->Attributes->Show();
        $this->Button_Submit->Visible = $this->Button_Submit->Visible && ($this->InsertAllowed || $this->UpdateAllowed || $this->DeleteAllowed);
        $ParentPath = $Tpl->block_path;
        $EditableGridPath = $ParentPath . "/EditableGrid " . $this->ComponentName;
        $EditableGridRowPath = $ParentPath . "/EditableGrid " . $this->ComponentName . "/Row";
        $Tpl->block_path = $EditableGridRowPath;
        $this->RowNumber = 0;
        $NonEmptyRows = 0;
        $EmptyRowsLeft = $this->EmptyRows;
        $this->ControlsVisible["id_registro"] = $this->id_registro->Visible;
        $this->ControlsVisible["nombre_reporte"] = $this->nombre_reporte->Visible;
        $this->ControlsVisible["activo"] = $this->activo->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->CachedColumns["id_registro"][$this->RowNumber] = $this->DataSource->CachedColumns["id_registro"];
                    $this->id_registro->SetValue($this->DataSource->id_registro->GetValue());
                    $this->nombre_reporte->SetValue($this->DataSource->nombre_reporte->GetValue());
                    $this->activo->SetValue($this->DataSource->activo->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->id_registro->SetText("");
                    $this->nombre_reporte->SetText("");
                    $this->id_registro->SetValue($this->DataSource->id_registro->GetValue());
                    $this->nombre_reporte->SetValue($this->DataSource->nombre_reporte->GetValue());
                    $this->activo->SetText($this->FormParameters["activo"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->CachedColumns["id_registro"][$this->RowNumber] = "";
                    $this->id_registro->SetText("");
                    $this->nombre_reporte->SetText("");
                    $this->activo->SetValue(false);
                } else {
                    $this->id_registro->SetText("");
                    $this->nombre_reporte->SetText("");
                    $this->activo->SetText($this->FormParameters["activo"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id_registro->Show($this->RowNumber);
                $this->nombre_reporte->Show($this->RowNumber);
                $this->activo->Show($this->RowNumber);
                if (isset($this->RowsErrors[$this->RowNumber]) && ($this->RowsErrors[$this->RowNumber] != "")) {
                    $Tpl->setblockvar("RowError", "");
                    $Tpl->setvar("Error", $this->RowsErrors[$this->RowNumber]);
                    $this->Attributes->Show();
                    $Tpl->parse("RowError", false);
                } else {
                    $Tpl->setblockvar("RowError", "");
                }
                $Tpl->setvar("FormScript", $this->FormScript($this->RowNumber));
                $Tpl->parse();
                if ($is_next_record) {
                    if ($this->FormSubmitted) {
                        $is_next_record = $this->RowNumber < $this->UpdatedRows;
                        if (($this->DataSource->CachedColumns["id_registro"] == $this->CachedColumns["id_registro"][$this->RowNumber])) {
                            if ($this->ReadAllowed) $this->DataSource->next_record();
                        }
                    }else{
                        $is_next_record = ($this->RowNumber < $this->PageSize) &&  $this->ReadAllowed && $this->DataSource->next_record();
                    }
                } else { 
                    $EmptyRowsLeft--;
                }
            } while($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed));
        } else {
            $Tpl->block_path = $EditableGridPath;
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $Tpl->block_path = $EditableGridPath;
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator->TotalPages <= 1 && $this->Navigator->PageNumber == 1) || $this->Navigator->PageSize == "") {
            $this->Navigator->Visible = false;
        }
        $this->Sorter_id_registro->Show();
        $this->Sorter_nombre_reporte->Show();
        $this->Sorter_activo->Show();
        $this->Navigator->Show();
        $this->Button_Submit->Show();

        if($this->CheckErrors()) {
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        if (!$CCSUseAmp) {
            $Tpl->SetVar("HTMLFormProperties", "method=\"POST\" action=\"" . $this->HTMLFormAction . "\" name=\"" . $this->ComponentName . "\"");
        } else {
            $Tpl->SetVar("HTMLFormProperties", "method=\"post\" action=\"" . str_replace("&", "&amp;", $this->HTMLFormAction) . "\" id=\"" . $this->ComponentName . "\"");
        }
        $Tpl->SetVar("FormState", CCToHTML($this->GetFormState($NonEmptyRows)));
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End usuario_reporteMyM Class @96-FCB6E20C

class clsusuario_reporteMyMDataSource extends clsDBcnDisenio {  //usuario_reporteMyMDataSource Class @96-D56C06C2

//DataSource Variables @96-9AEC62B3
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $CountSQL;
    public $wp;
    public $AllParametersSet;

    public $CachedColumns;
    public $CurrentRow;
    public $UpdateFields = array();

    // Datasource fields
    public $id_registro;
    public $nombre_reporte;
    public $activo;
//End DataSource Variables

//DataSourceClass_Initialize Event @96-2EC7EC8F
    function clsusuario_reporteMyMDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid usuario_reporteMyM/Error";
        $this->Initialize();
        $this->id_registro = new clsField("id_registro", ccsInteger, "");
        
        $this->nombre_reporte = new clsField("nombre_reporte", ccsText, "");
        
        $this->activo = new clsField("activo", ccsInteger, "");
        

        $this->UpdateFields["activo"] = array("Name" => "activo", "Value" => "", "DataType" => ccsInteger);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @96-DF1B97B7
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "nombre_reporte";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_id_registro" => array("id_registro", ""), 
            "Sorter_nombre_reporte" => array("nombre_reporte", ""), 
            "Sorter_activo" => array("activo", "")));
    }
//End SetOrder Method

//Prepare Method @96-F8C23670
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId", ccsInteger, "", "", $this->Parameters["urlId"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_usuario", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @96-BE5F3A65
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM usuario_reporteMyM";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} nombre_reporte, activo, id_registro \n\n" .
        "FROM usuario_reporteMyM {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @96-8B50B2BB
    function SetValues()
    {
        $this->CachedColumns["id_registro"] = $this->f("id_registro");
        $this->id_registro->SetDBValue(trim($this->f("id_registro")));
        $this->nombre_reporte->SetDBValue($this->f("nombre_reporte"));
        $this->activo->SetDBValue(trim($this->f("activo")));
    }
//End SetValues Method

//Update Method @96-BD38770F
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $SelectWhere = $this->Where;
        $this->Where = "id_registro=" . $this->ToSQL($this->CachedColumns["id_registro"], ccsInteger);
        $this->UpdateFields["activo"]["Value"] = $this->activo->GetDBValue(true);
        $this->SQL = CCBuildUpdate("usuario_reporteMyM", $this->UpdateFields, $this);
        $this->SQL .= strlen($this->Where) ? " WHERE " . $this->Where : $this->Where;
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
        $this->Where = $SelectWhere;
    }
//End Update Method

} //End usuario_reporteMyMDataSource Class @96-FCB6E20C







//Initialize Page @1-94B66DF3
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
$TemplateFileName = "Usuarios.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-56EB8308
CCSecurityRedirect("4;5", "");
//End Authenticate User

//Include events file @1-C0FBA1C8
include_once("./Usuarios_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-F8196B98
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$mc_c_usuariosSearch = new clsRecordmc_c_usuariosSearch("", $MainPage);
$mc_c_usuarios = new clsGridmc_c_usuarios("", $MainPage);
$mc_c_usuarios1 = new clsRecordmc_c_usuarios1("", $MainPage);
$usuario_reporteMyM = new clsEditableGridusuario_reporteMyM("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_c_usuariosSearch = & $mc_c_usuariosSearch;
$MainPage->mc_c_usuarios = & $mc_c_usuarios;
$MainPage->mc_c_usuarios1 = & $mc_c_usuarios1;
$MainPage->usuario_reporteMyM = & $usuario_reporteMyM;
$mc_c_usuarios->Initialize();
$mc_c_usuarios1->Initialize();
$usuario_reporteMyM->Initialize();
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

//Execute Components @1-CCCD5824
$usuario_reporteMyM->Operation();
$mc_c_usuarios1->Operation();
$mc_c_usuariosSearch->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-5B065570
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_c_usuariosSearch);
    unset($mc_c_usuarios);
    unset($mc_c_usuarios1);
    unset($usuario_reporteMyM);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-F2632A3C
$Header->Show();
$mc_c_usuariosSearch->Show();
$mc_c_usuarios->Show();
$mc_c_usuarios1->Show();
$usuario_reporteMyM->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-AAE4E7C7
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_c_usuariosSearch);
unset($mc_c_usuarios);
unset($mc_c_usuarios1);
unset($usuario_reporteMyM);
unset($Tpl);
//End Unload Page


?>
