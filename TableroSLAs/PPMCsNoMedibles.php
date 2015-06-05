<?php
//Include Common Files @1-228F7231
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsNoMedibles.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsGridmc_PPMC_NoMedibles { //mc_PPMC_NoMedibles class @3-DB120427

//Variables @3-6E51DF5A

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
//End Variables

//Class_Initialize Event @3-9E95C5BA
    function clsGridmc_PPMC_NoMedibles($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_PPMC_NoMedibles";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_PPMC_NoMedibles";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_PPMC_NoMediblesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 200)
            $this->PageSize = 200;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->Id = new clsControl(ccsLink, "Id", "Id", ccsInteger, "", CCGetRequestParam("Id", ccsGet, NULL), $this);
        $this->Id->Page = "";
        $this->IDPPMC = new clsControl(ccsLabel, "IDPPMC", "IDPPMC", ccsInteger, "", CCGetRequestParam("IDPPMC", ccsGet, NULL), $this);
        $this->IDEstimacion = new clsControl(ccsLabel, "IDEstimacion", "IDEstimacion", ccsInteger, "", CCGetRequestParam("IDEstimacion", ccsGet, NULL), $this);
        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", ccsGet, NULL), $this);
        $this->FechaEstimacion = new clsControl(ccsLabel, "FechaEstimacion", "FechaEstimacion", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("FechaEstimacion", ccsGet, NULL), $this);
        $this->Servicio_Negocio = new clsControl(ccsLabel, "Servicio_Negocio", "Servicio_Negocio", ccsText, "", CCGetRequestParam("Servicio_Negocio", ccsGet, NULL), $this);
        $this->Notas = new clsControl(ccsLabel, "Notas", "Notas", ccsText, "", CCGetRequestParam("Notas", ccsGet, NULL), $this);
        $this->mesreporte = new clsControl(ccsLabel, "mesreporte", "mesreporte", ccsInteger, "", CCGetRequestParam("mesreporte", ccsGet, NULL), $this);
        $this->anioreporte = new clsControl(ccsLabel, "anioreporte", "anioreporte", ccsInteger, "", CCGetRequestParam("anioreporte", ccsGet, NULL), $this);
        $this->id_proveedor = new clsControl(ccsLabel, "id_proveedor", "id_proveedor", ccsText, "", CCGetRequestParam("id_proveedor", ccsGet, NULL), $this);
        $this->Navigator1 = new clsNavigator($this->ComponentName, "Navigator1", $FileName, 10, tpCentered, $this);
        $this->Navigator1->PageSizes = array("1", "5", "10", "25", "50");
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

//Show Method @3-0856A4C3
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_IDPPMC"] = CCGetFromGet("s_IDPPMC", NULL);
        $this->DataSource->Parameters["urls_mesreporte"] = CCGetFromGet("s_mesreporte", NULL);
        $this->DataSource->Parameters["urls_anioreporte"] = CCGetFromGet("s_anioreporte", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);

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
            $this->ControlsVisible["IDPPMC"] = $this->IDPPMC->Visible;
            $this->ControlsVisible["IDEstimacion"] = $this->IDEstimacion->Visible;
            $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
            $this->ControlsVisible["FechaEstimacion"] = $this->FechaEstimacion->Visible;
            $this->ControlsVisible["Servicio_Negocio"] = $this->Servicio_Negocio->Visible;
            $this->ControlsVisible["Notas"] = $this->Notas->Visible;
            $this->ControlsVisible["mesreporte"] = $this->mesreporte->Visible;
            $this->ControlsVisible["anioreporte"] = $this->anioreporte->Visible;
            $this->ControlsVisible["id_proveedor"] = $this->id_proveedor->Visible;
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
                $this->IDPPMC->SetValue($this->DataSource->IDPPMC->GetValue());
                $this->IDEstimacion->SetValue($this->DataSource->IDEstimacion->GetValue());
                $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                $this->FechaEstimacion->SetValue($this->DataSource->FechaEstimacion->GetValue());
                $this->Servicio_Negocio->SetValue($this->DataSource->Servicio_Negocio->GetValue());
                $this->Notas->SetValue($this->DataSource->Notas->GetValue());
                $this->mesreporte->SetValue($this->DataSource->mesreporte->GetValue());
                $this->anioreporte->SetValue($this->DataSource->anioreporte->GetValue());
                $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id->Show();
                $this->IDPPMC->Show();
                $this->IDEstimacion->Show();
                $this->Descripcion->Show();
                $this->FechaEstimacion->Show();
                $this->Servicio_Negocio->Show();
                $this->Notas->Show();
                $this->mesreporte->Show();
                $this->anioreporte->Show();
                $this->id_proveedor->Show();
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
        $this->Navigator1->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator1->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator1->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator1->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator1->TotalPages <= 1 && $this->Navigator1->PageNumber == 1) || $this->Navigator1->PageSize == "") {
            $this->Navigator1->Visible = false;
        }
        $this->Navigator1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-2D3BA121
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IDPPMC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IDEstimacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaEstimacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Servicio_Negocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Notas->Errors->ToString());
        $errors = ComposeStrings($errors, $this->mesreporte->Errors->ToString());
        $errors = ComposeStrings($errors, $this->anioreporte->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_proveedor->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_PPMC_NoMedibles Class @3-FCB6E20C

class clsmc_PPMC_NoMediblesDataSource extends clsDBcnDisenio {  //mc_PPMC_NoMediblesDataSource Class @3-11E72D80

//DataSource Variables @3-7EA017D2
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Id;
    public $IDPPMC;
    public $IDEstimacion;
    public $Descripcion;
    public $FechaEstimacion;
    public $Servicio_Negocio;
    public $Notas;
    public $mesreporte;
    public $anioreporte;
    public $id_proveedor;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-BDBC5F2F
    function clsmc_PPMC_NoMediblesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_PPMC_NoMedibles";
        $this->Initialize();
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->IDPPMC = new clsField("IDPPMC", ccsInteger, "");
        
        $this->IDEstimacion = new clsField("IDEstimacion", ccsInteger, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->FechaEstimacion = new clsField("FechaEstimacion", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->Servicio_Negocio = new clsField("Servicio_Negocio", ccsText, "");
        
        $this->Notas = new clsField("Notas", ccsText, "");
        
        $this->mesreporte = new clsField("mesreporte", ccsInteger, "");
        
        $this->anioreporte = new clsField("anioreporte", ccsInteger, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @3-0DE7A94B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_IDPPMC", ccsInteger, "", "", $this->Parameters["urls_IDPPMC"], "", false);
        $this->wp->AddParameter("2", "urls_mesreporte", ccsInteger, "", "", $this->Parameters["urls_mesreporte"], "", false);
        $this->wp->AddParameter("3", "urls_anioreporte", ccsInteger, "", "", $this->Parameters["urls_anioreporte"], "", false);
        $this->wp->AddParameter("4", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[mc_PPMC_NoMedibles].IDPPMC", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "[mc_PPMC_NoMedibles].mesreporte", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "[mc_PPMC_NoMedibles].anioreporte", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opEqual, "[mc_PPMC_NoMedibles].id_proveedor", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]);
    }
//End Prepare Method

//Open Method @3-E08C97E3
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM mc_PPMC_NoMedibles INNER JOIN mc_c_proveedor ON\n\n" .
        "mc_PPMC_NoMedibles.id_proveedor = mc_c_proveedor.id_proveedor";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} mc_PPMC_NoMedibles.*, nombre \n\n" .
        "FROM mc_PPMC_NoMedibles INNER JOIN mc_c_proveedor ON\n\n" .
        "mc_PPMC_NoMedibles.id_proveedor = mc_c_proveedor.id_proveedor {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @3-07541B66
    function SetValues()
    {
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->IDPPMC->SetDBValue(trim($this->f("IDPPMC")));
        $this->IDEstimacion->SetDBValue(trim($this->f("IDEstimacion")));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->FechaEstimacion->SetDBValue(trim($this->f("FechaEstimacion")));
        $this->Servicio_Negocio->SetDBValue($this->f("Servicio_Negocio"));
        $this->Notas->SetDBValue($this->f("Notas"));
        $this->mesreporte->SetDBValue(trim($this->f("mesreporte")));
        $this->anioreporte->SetDBValue(trim($this->f("anioreporte")));
        $this->id_proveedor->SetDBValue($this->f("nombre"));
    }
//End SetValues Method

} //End mc_PPMC_NoMediblesDataSource Class @3-FCB6E20C

class clsRecordmc_PPMC_NoMediblesSearch { //mc_PPMC_NoMediblesSearch Class @19-12FEBEB4

//Variables @19-9E315808

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

//Class_Initialize Event @19-E2776952
    function clsRecordmc_PPMC_NoMediblesSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_PPMC_NoMediblesSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_PPMC_NoMediblesSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_IDPPMC = new clsControl(ccsTextBox, "s_IDPPMC", "IDPPMC", ccsInteger, "", CCGetRequestParam("s_IDPPMC", $Method, NULL), $this);
            $this->s_mesreporte = new clsControl(ccsListBox, "s_mesreporte", "Mesreporte", ccsInteger, "", CCGetRequestParam("s_mesreporte", $Method, NULL), $this);
            $this->s_mesreporte->DSType = dsTable;
            $this->s_mesreporte->DataSource = new clsDBcnDisenio();
            $this->s_mesreporte->ds = & $this->s_mesreporte->DataSource;
            $this->s_mesreporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_mesreporte->BoundColumn, $this->s_mesreporte->TextColumn, $this->s_mesreporte->DBFormat) = array("IdMes", "Mes", "");
            $this->s_anioreporte = new clsControl(ccsListBox, "s_anioreporte", "Anioreporte", ccsInteger, "", CCGetRequestParam("s_anioreporte", $Method, NULL), $this);
            $this->s_anioreporte->DSType = dsTable;
            $this->s_anioreporte->DataSource = new clsDBcnDisenio();
            $this->s_anioreporte->ds = & $this->s_anioreporte->DataSource;
            $this->s_anioreporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_anioreporte->BoundColumn, $this->s_anioreporte->TextColumn, $this->s_anioreporte->DBFormat) = array("Ano", "Ano", "");
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsTable;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            $this->s_id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->DataSource->Parameters["expr26"] = 'CDS';
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "expr26", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["expr26"], "", false);
            $this->s_id_proveedor->DataSource->wp->Criterion[1] = $this->s_id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_id_proveedor->DataSource->wp->GetDBValue("1"), $this->s_id_proveedor->DataSource->ToSQL($this->s_id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_id_proveedor->DataSource->Where = 
                 $this->s_id_proveedor->DataSource->wp->Criterion[1];
        }
    }
//End Class_Initialize Event

//Validate Method @19-4E6B53DF
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_IDPPMC->Validate() && $Validation);
        $Validation = ($this->s_mesreporte->Validate() && $Validation);
        $Validation = ($this->s_anioreporte->Validate() && $Validation);
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_IDPPMC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_mesreporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_anioreporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @19-4C3ECC39
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_IDPPMC->Errors->Count());
        $errors = ($errors || $this->s_mesreporte->Errors->Count());
        $errors = ($errors || $this->s_anioreporte->Errors->Count());
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @19-5C6A73E4
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
        $Redirect = "PPMCsNoMedibles.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "PPMCsNoMedibles.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @19-7D16965E
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

        $this->s_mesreporte->Prepare();
        $this->s_anioreporte->Prepare();
        $this->s_id_proveedor->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_IDPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_mesreporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_anioreporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
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
        $this->s_IDPPMC->Show();
        $this->s_mesreporte->Show();
        $this->s_anioreporte->Show();
        $this->s_id_proveedor->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_PPMC_NoMediblesSearch Class @19-FCB6E20C

class clsRecordmc_PPMC_NoMedibles1 { //mc_PPMC_NoMedibles1 Class @29-4FC22C22

//Variables @29-9E315808

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

//Class_Initialize Event @29-D892EBE5
    function clsRecordmc_PPMC_NoMedibles1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_PPMC_NoMedibles1/Error";
        $this->DataSource = new clsmc_PPMC_NoMedibles1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_PPMC_NoMedibles1";
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
            $this->id_proveedor = new clsControl(ccsListBox, "id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->id_proveedor->DSType = dsTable;
            $this->id_proveedor->DataSource = new clsDBcnDisenio();
            $this->id_proveedor->ds = & $this->id_proveedor->DataSource;
            $this->id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->id_proveedor->BoundColumn, $this->id_proveedor->TextColumn, $this->id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->id_proveedor->DataSource->Parameters["expr46"] = 'CDS';
            $this->id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->id_proveedor->DataSource->wp->AddParameter("1", "expr46", ccsText, "", "", $this->id_proveedor->DataSource->Parameters["expr46"], "", false);
            $this->id_proveedor->DataSource->wp->Criterion[1] = $this->id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->id_proveedor->DataSource->wp->GetDBValue("1"), $this->id_proveedor->DataSource->ToSQL($this->id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->id_proveedor->DataSource->Where = 
                 $this->id_proveedor->DataSource->wp->Criterion[1];
            $this->IDPPMC = new clsControl(ccsTextBox, "IDPPMC", "IDPPMC", ccsInteger, "", CCGetRequestParam("IDPPMC", $Method, NULL), $this);
            $this->IDPPMC->Required = true;
            $this->IDEstimacion = new clsControl(ccsTextBox, "IDEstimacion", "IDEstimacion", ccsInteger, "", CCGetRequestParam("IDEstimacion", $Method, NULL), $this);
            $this->IDEstimacion->Required = true;
            $this->Descripcion = new clsControl(ccsTextBox, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", $Method, NULL), $this);
            $this->FechaEstimacion = new clsControl(ccsTextBox, "FechaEstimacion", "Fecha Estimacion", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("FechaEstimacion", $Method, NULL), $this);
            $this->Servicio_Negocio = new clsControl(ccsTextBox, "Servicio_Negocio", "Servicio Negocio", ccsText, "", CCGetRequestParam("Servicio_Negocio", $Method, NULL), $this);
            $this->Notas = new clsControl(ccsTextBox, "Notas", "Notas", ccsText, "", CCGetRequestParam("Notas", $Method, NULL), $this);
            $this->mesreporte = new clsControl(ccsListBox, "mesreporte", "Mesreporte", ccsInteger, "", CCGetRequestParam("mesreporte", $Method, NULL), $this);
            $this->mesreporte->DSType = dsTable;
            $this->mesreporte->DataSource = new clsDBcnDisenio();
            $this->mesreporte->ds = & $this->mesreporte->DataSource;
            $this->mesreporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->mesreporte->BoundColumn, $this->mesreporte->TextColumn, $this->mesreporte->DBFormat) = array("IdMes", "Mes", "");
            $this->anioreporte = new clsControl(ccsListBox, "anioreporte", "Anioreporte", ccsInteger, "", CCGetRequestParam("anioreporte", $Method, NULL), $this);
            $this->anioreporte->DSType = dsTable;
            $this->anioreporte->DataSource = new clsDBcnDisenio();
            $this->anioreporte->ds = & $this->anioreporte->DataSource;
            $this->anioreporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->anioreporte->BoundColumn, $this->anioreporte->TextColumn, $this->anioreporte->DBFormat) = array("Ano", "Ano", "");
        }
    }
//End Class_Initialize Event

//Initialize Method @29-4F76030F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//Validate Method @29-A61E19B3
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->id_proveedor->Validate() && $Validation);
        $Validation = ($this->IDPPMC->Validate() && $Validation);
        $Validation = ($this->IDEstimacion->Validate() && $Validation);
        $Validation = ($this->Descripcion->Validate() && $Validation);
        $Validation = ($this->FechaEstimacion->Validate() && $Validation);
        $Validation = ($this->Servicio_Negocio->Validate() && $Validation);
        $Validation = ($this->Notas->Validate() && $Validation);
        $Validation = ($this->mesreporte->Validate() && $Validation);
        $Validation = ($this->anioreporte->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IDPPMC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IDEstimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Descripcion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaEstimacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Servicio_Negocio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Notas->Errors->Count() == 0);
        $Validation =  $Validation && ($this->mesreporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->anioreporte->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @29-A9C8E30F
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->IDPPMC->Errors->Count());
        $errors = ($errors || $this->IDEstimacion->Errors->Count());
        $errors = ($errors || $this->Descripcion->Errors->Count());
        $errors = ($errors || $this->FechaEstimacion->Errors->Count());
        $errors = ($errors || $this->Servicio_Negocio->Errors->Count());
        $errors = ($errors || $this->Notas->Errors->Count());
        $errors = ($errors || $this->mesreporte->Errors->Count());
        $errors = ($errors || $this->anioreporte->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @29-B908BA44
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

//InsertRow Method @29-8254A46C
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->id_proveedor->SetValue($this->id_proveedor->GetValue(true));
        $this->DataSource->IDPPMC->SetValue($this->IDPPMC->GetValue(true));
        $this->DataSource->IDEstimacion->SetValue($this->IDEstimacion->GetValue(true));
        $this->DataSource->Descripcion->SetValue($this->Descripcion->GetValue(true));
        $this->DataSource->FechaEstimacion->SetValue($this->FechaEstimacion->GetValue(true));
        $this->DataSource->Servicio_Negocio->SetValue($this->Servicio_Negocio->GetValue(true));
        $this->DataSource->Notas->SetValue($this->Notas->GetValue(true));
        $this->DataSource->mesreporte->SetValue($this->mesreporte->GetValue(true));
        $this->DataSource->anioreporte->SetValue($this->anioreporte->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @29-E51985F5
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id_proveedor->SetValue($this->id_proveedor->GetValue(true));
        $this->DataSource->IDPPMC->SetValue($this->IDPPMC->GetValue(true));
        $this->DataSource->IDEstimacion->SetValue($this->IDEstimacion->GetValue(true));
        $this->DataSource->Descripcion->SetValue($this->Descripcion->GetValue(true));
        $this->DataSource->FechaEstimacion->SetValue($this->FechaEstimacion->GetValue(true));
        $this->DataSource->Servicio_Negocio->SetValue($this->Servicio_Negocio->GetValue(true));
        $this->DataSource->Notas->SetValue($this->Notas->GetValue(true));
        $this->DataSource->mesreporte->SetValue($this->mesreporte->GetValue(true));
        $this->DataSource->anioreporte->SetValue($this->anioreporte->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @29-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @29-4585F0E6
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
        $this->mesreporte->Prepare();
        $this->anioreporte->Prepare();

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
                    $this->IDPPMC->SetValue($this->DataSource->IDPPMC->GetValue());
                    $this->IDEstimacion->SetValue($this->DataSource->IDEstimacion->GetValue());
                    $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                    $this->FechaEstimacion->SetValue($this->DataSource->FechaEstimacion->GetValue());
                    $this->Servicio_Negocio->SetValue($this->DataSource->Servicio_Negocio->GetValue());
                    $this->Notas->SetValue($this->DataSource->Notas->GetValue());
                    $this->mesreporte->SetValue($this->DataSource->mesreporte->GetValue());
                    $this->anioreporte->SetValue($this->DataSource->anioreporte->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IDPPMC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IDEstimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Descripcion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaEstimacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Servicio_Negocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Notas->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mesreporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->anioreporte->Errors->ToString());
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
        $this->IDPPMC->Show();
        $this->IDEstimacion->Show();
        $this->Descripcion->Show();
        $this->FechaEstimacion->Show();
        $this->Servicio_Negocio->Show();
        $this->Notas->Show();
        $this->mesreporte->Show();
        $this->anioreporte->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_PPMC_NoMedibles1 Class @29-FCB6E20C

class clsmc_PPMC_NoMedibles1DataSource extends clsDBcnDisenio {  //mc_PPMC_NoMedibles1DataSource Class @29-ADA39D6A

//DataSource Variables @29-5BE576D0
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
    public $IDPPMC;
    public $IDEstimacion;
    public $Descripcion;
    public $FechaEstimacion;
    public $Servicio_Negocio;
    public $Notas;
    public $mesreporte;
    public $anioreporte;
//End DataSource Variables

//DataSourceClass_Initialize Event @29-83BA9629
    function clsmc_PPMC_NoMedibles1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_PPMC_NoMedibles1/Error";
        $this->Initialize();
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->IDPPMC = new clsField("IDPPMC", ccsInteger, "");
        
        $this->IDEstimacion = new clsField("IDEstimacion", ccsInteger, "");
        
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->FechaEstimacion = new clsField("FechaEstimacion", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss"));
        
        $this->Servicio_Negocio = new clsField("Servicio_Negocio", ccsText, "");
        
        $this->Notas = new clsField("Notas", ccsText, "");
        
        $this->mesreporte = new clsField("mesreporte", ccsInteger, "");
        
        $this->anioreporte = new clsField("anioreporte", ccsInteger, "");
        

        $this->InsertFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IDPPMC"] = array("Name" => "IDPPMC", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["IDEstimacion"] = array("Name" => "[IDEstimacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaEstimacion"] = array("Name" => "[FechaEstimacion]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Servicio_Negocio"] = array("Name" => "[Servicio_Negocio]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Notas"] = array("Name" => "[Notas]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["mesreporte"] = array("Name" => "mesreporte", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["anioreporte"] = array("Name" => "anioreporte", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["IDPPMC"] = array("Name" => "IDPPMC", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["IDEstimacion"] = array("Name" => "[IDEstimacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Descripcion"] = array("Name" => "[Descripcion]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaEstimacion"] = array("Name" => "[FechaEstimacion]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Servicio_Negocio"] = array("Name" => "[Servicio_Negocio]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Notas"] = array("Name" => "[Notas]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["mesreporte"] = array("Name" => "mesreporte", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["anioreporte"] = array("Name" => "anioreporte", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @29-D6C1B08E
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

//Open Method @29-B94C4873
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_PPMC_NoMedibles {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @29-5C8DBE15
    function SetValues()
    {
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->IDPPMC->SetDBValue(trim($this->f("IDPPMC")));
        $this->IDEstimacion->SetDBValue(trim($this->f("IDEstimacion")));
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->FechaEstimacion->SetDBValue(trim($this->f("FechaEstimacion")));
        $this->Servicio_Negocio->SetDBValue($this->f("Servicio_Negocio"));
        $this->Notas->SetDBValue($this->f("Notas"));
        $this->mesreporte->SetDBValue(trim($this->f("mesreporte")));
        $this->anioreporte->SetDBValue(trim($this->f("anioreporte")));
    }
//End SetValues Method

//Insert Method @29-70BE11B8
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["id_proveedor"]["Value"] = $this->id_proveedor->GetDBValue(true);
        $this->InsertFields["IDPPMC"]["Value"] = $this->IDPPMC->GetDBValue(true);
        $this->InsertFields["IDEstimacion"]["Value"] = $this->IDEstimacion->GetDBValue(true);
        $this->InsertFields["Descripcion"]["Value"] = $this->Descripcion->GetDBValue(true);
        $this->InsertFields["FechaEstimacion"]["Value"] = $this->FechaEstimacion->GetDBValue(true);
        $this->InsertFields["Servicio_Negocio"]["Value"] = $this->Servicio_Negocio->GetDBValue(true);
        $this->InsertFields["Notas"]["Value"] = $this->Notas->GetDBValue(true);
        $this->InsertFields["mesreporte"]["Value"] = $this->mesreporte->GetDBValue(true);
        $this->InsertFields["anioreporte"]["Value"] = $this->anioreporte->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_PPMC_NoMedibles", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @29-A41DCAF5
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["id_proveedor"]["Value"] = $this->id_proveedor->GetDBValue(true);
        $this->UpdateFields["IDPPMC"]["Value"] = $this->IDPPMC->GetDBValue(true);
        $this->UpdateFields["IDEstimacion"]["Value"] = $this->IDEstimacion->GetDBValue(true);
        $this->UpdateFields["Descripcion"]["Value"] = $this->Descripcion->GetDBValue(true);
        $this->UpdateFields["FechaEstimacion"]["Value"] = $this->FechaEstimacion->GetDBValue(true);
        $this->UpdateFields["Servicio_Negocio"]["Value"] = $this->Servicio_Negocio->GetDBValue(true);
        $this->UpdateFields["Notas"]["Value"] = $this->Notas->GetDBValue(true);
        $this->UpdateFields["mesreporte"]["Value"] = $this->mesreporte->GetDBValue(true);
        $this->UpdateFields["anioreporte"]["Value"] = $this->anioreporte->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_PPMC_NoMedibles", $this->UpdateFields, $this);
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

//Delete Method @29-4E22EE1B
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM [mc_PPMC_NoMedibles]";
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

} //End mc_PPMC_NoMedibles1DataSource Class @29-FCB6E20C

//Initialize Page @1-3803A3CA
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
$TemplateFileName = "PPMCsNoMedibles.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/ui/jquery.ui.core.js|js/jquery/ui/jquery.ui.widget.js|js/jquery/ui/jquery.ui.datepicker.js|js/jquery/datepicker/ccs-date-timepicker.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-17E753CD
include_once("./PPMCsNoMedibles_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-800FA64C
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_PPMC_NoMedibles = new clsGridmc_PPMC_NoMedibles("", $MainPage);
$mc_PPMC_NoMediblesSearch = new clsRecordmc_PPMC_NoMediblesSearch("", $MainPage);
$mc_PPMC_NoMedibles1 = new clsRecordmc_PPMC_NoMedibles1("", $MainPage);
$lErrores = new clsControl(ccsLabel, "lErrores", "lErrores", ccsText, "", CCGetRequestParam("lErrores", ccsGet, NULL), $MainPage);
$lErrores->HTML = true;
$MainPage->Header = & $Header;
$MainPage->mc_PPMC_NoMedibles = & $mc_PPMC_NoMedibles;
$MainPage->mc_PPMC_NoMediblesSearch = & $mc_PPMC_NoMediblesSearch;
$MainPage->mc_PPMC_NoMedibles1 = & $mc_PPMC_NoMedibles1;
$MainPage->lErrores = & $lErrores;
$mc_PPMC_NoMedibles->Initialize();
$mc_PPMC_NoMedibles1->Initialize();
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

//Execute Components @1-103BB235
$mc_PPMC_NoMedibles1->Operation();
$mc_PPMC_NoMediblesSearch->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-F5183518
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_PPMC_NoMedibles);
    unset($mc_PPMC_NoMediblesSearch);
    unset($mc_PPMC_NoMedibles1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-0D9542FF
$Header->Show();
$mc_PPMC_NoMedibles->Show();
$mc_PPMC_NoMediblesSearch->Show();
$mc_PPMC_NoMedibles1->Show();
$lErrores->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2AF16CC0
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_PPMC_NoMedibles);
unset($mc_PPMC_NoMediblesSearch);
unset($mc_PPMC_NoMedibles1);
unset($Tpl);
//End Unload Page


?>
