<?php
//Include Common Files @1-6A503194
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "EficienciaPresLista.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsGridmc_c_proveedor_mc_eficien { //mc_c_proveedor_mc_eficien class @3-61D3C847

//Variables @3-8069731D

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
    public $Sorter_GrupoAplicativos;
    public $Sorter_ServiciosRelacionados;
    public $Sorter_CFMAnterior;
    public $Sorter_CFMActual;
    public $Sorter_EficienciaPresupuestal;
    public $Sorter_CumpleSLA;
    public $Sorter_MesReporte;
    public $Sorter_AnioRepote;
    public $Sorter_nombre;
//End Variables

//Class_Initialize Event @3-8DEFEE00
    function clsGridmc_c_proveedor_mc_eficien($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_c_proveedor_mc_eficien";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_c_proveedor_mc_eficien";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_c_proveedor_mc_eficienDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 5;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("mc_c_proveedor_mc_eficienOrder", "");
        $this->SorterDirection = CCGetParam("mc_c_proveedor_mc_eficienDir", "");

        $this->Id = new clsControl(ccsLink, "Id", "Id", ccsInteger, "", CCGetRequestParam("Id", ccsGet, NULL), $this);
        $this->Id->Page = "EficienciaPresLista.php";
        $this->GrupoAplicativos = new clsControl(ccsLabel, "GrupoAplicativos", "GrupoAplicativos", ccsText, "", CCGetRequestParam("GrupoAplicativos", ccsGet, NULL), $this);
        $this->ServiciosRelacionados = new clsControl(ccsLabel, "ServiciosRelacionados", "ServiciosRelacionados", ccsText, "", CCGetRequestParam("ServiciosRelacionados", ccsGet, NULL), $this);
        $this->CFMAnterior = new clsControl(ccsLabel, "CFMAnterior", "CFMAnterior", ccsFloat, array(False, 4, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("CFMAnterior", ccsGet, NULL), $this);
        $this->CFMActual = new clsControl(ccsLabel, "CFMActual", "CFMActual", ccsFloat, array(False, 4, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("CFMActual", ccsGet, NULL), $this);
        $this->EficienciaPresupuestal = new clsControl(ccsLabel, "EficienciaPresupuestal", "EficienciaPresupuestal", ccsFloat, array(False, 4, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("EficienciaPresupuestal", ccsGet, NULL), $this);
        $this->CumpleSLA = new clsControl(ccsHidden, "CumpleSLA", "CumpleSLA", ccsInteger, "", CCGetRequestParam("CumpleSLA", ccsGet, NULL), $this);
        $this->MesReporte = new clsControl(ccsLabel, "MesReporte", "MesReporte", ccsInteger, "", CCGetRequestParam("MesReporte", ccsGet, NULL), $this);
        $this->AnioRepote = new clsControl(ccsLabel, "AnioRepote", "AnioRepote", ccsInteger, "", CCGetRequestParam("AnioRepote", ccsGet, NULL), $this);
        $this->nombre = new clsControl(ccsLabel, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->imgCumpleSLA = new clsControl(ccsImage, "imgCumpleSLA", "imgCumpleSLA", ccsText, "", CCGetRequestParam("imgCumpleSLA", ccsGet, NULL), $this);
        $this->observaciones = new clsControl(ccsLabel, "observaciones", "observaciones", ccsText, "", CCGetRequestParam("observaciones", ccsGet, NULL), $this);
        $this->mc_c_proveedor_mc_eficien_TotalRecords = new clsControl(ccsLabel, "mc_c_proveedor_mc_eficien_TotalRecords", "mc_c_proveedor_mc_eficien_TotalRecords", ccsText, "", CCGetRequestParam("mc_c_proveedor_mc_eficien_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_Id = new clsSorter($this->ComponentName, "Sorter_Id", $FileName, $this);
        $this->Sorter_GrupoAplicativos = new clsSorter($this->ComponentName, "Sorter_GrupoAplicativos", $FileName, $this);
        $this->Sorter_ServiciosRelacionados = new clsSorter($this->ComponentName, "Sorter_ServiciosRelacionados", $FileName, $this);
        $this->Sorter_CFMAnterior = new clsSorter($this->ComponentName, "Sorter_CFMAnterior", $FileName, $this);
        $this->Sorter_CFMActual = new clsSorter($this->ComponentName, "Sorter_CFMActual", $FileName, $this);
        $this->Sorter_EficienciaPresupuestal = new clsSorter($this->ComponentName, "Sorter_EficienciaPresupuestal", $FileName, $this);
        $this->Sorter_CumpleSLA = new clsSorter($this->ComponentName, "Sorter_CumpleSLA", $FileName, $this);
        $this->Sorter_MesReporte = new clsSorter($this->ComponentName, "Sorter_MesReporte", $FileName, $this);
        $this->Sorter_AnioRepote = new clsSorter($this->ComponentName, "Sorter_AnioRepote", $FileName, $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
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

//Show Method @3-CEB6561B
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_Id_Proveedor"] = CCGetFromGet("s_Id_Proveedor", NULL);
        $this->DataSource->Parameters["urls_GrupoAplicativos"] = CCGetFromGet("s_GrupoAplicativos", NULL);
        $this->DataSource->Parameters["urls_MesReporte"] = CCGetFromGet("s_MesReporte", NULL);
        $this->DataSource->Parameters["urls_AnioRepote"] = CCGetFromGet("s_AnioRepote", NULL);

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
            $this->ControlsVisible["GrupoAplicativos"] = $this->GrupoAplicativos->Visible;
            $this->ControlsVisible["ServiciosRelacionados"] = $this->ServiciosRelacionados->Visible;
            $this->ControlsVisible["CFMAnterior"] = $this->CFMAnterior->Visible;
            $this->ControlsVisible["CFMActual"] = $this->CFMActual->Visible;
            $this->ControlsVisible["EficienciaPresupuestal"] = $this->EficienciaPresupuestal->Visible;
            $this->ControlsVisible["CumpleSLA"] = $this->CumpleSLA->Visible;
            $this->ControlsVisible["MesReporte"] = $this->MesReporte->Visible;
            $this->ControlsVisible["AnioRepote"] = $this->AnioRepote->Visible;
            $this->ControlsVisible["nombre"] = $this->nombre->Visible;
            $this->ControlsVisible["imgCumpleSLA"] = $this->imgCumpleSLA->Visible;
            $this->ControlsVisible["observaciones"] = $this->observaciones->Visible;
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
                $this->GrupoAplicativos->SetValue($this->DataSource->GrupoAplicativos->GetValue());
                $this->ServiciosRelacionados->SetValue($this->DataSource->ServiciosRelacionados->GetValue());
                $this->CFMAnterior->SetValue($this->DataSource->CFMAnterior->GetValue());
                $this->CFMActual->SetValue($this->DataSource->CFMActual->GetValue());
                $this->EficienciaPresupuestal->SetValue($this->DataSource->EficienciaPresupuestal->GetValue());
                $this->CumpleSLA->SetValue($this->DataSource->CumpleSLA->GetValue());
                $this->MesReporte->SetValue($this->DataSource->MesReporte->GetValue());
                $this->AnioRepote->SetValue($this->DataSource->AnioRepote->GetValue());
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->observaciones->SetValue($this->DataSource->observaciones->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Id->Show();
                $this->GrupoAplicativos->Show();
                $this->ServiciosRelacionados->Show();
                $this->CFMAnterior->Show();
                $this->CFMActual->Show();
                $this->EficienciaPresupuestal->Show();
                $this->CumpleSLA->Show();
                $this->MesReporte->Show();
                $this->AnioRepote->Show();
                $this->nombre->Show();
                $this->imgCumpleSLA->Show();
                $this->observaciones->Show();
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
        $this->mc_c_proveedor_mc_eficien_TotalRecords->Show();
        $this->Sorter_Id->Show();
        $this->Sorter_GrupoAplicativos->Show();
        $this->Sorter_ServiciosRelacionados->Show();
        $this->Sorter_CFMAnterior->Show();
        $this->Sorter_CFMActual->Show();
        $this->Sorter_EficienciaPresupuestal->Show();
        $this->Sorter_CumpleSLA->Show();
        $this->Sorter_MesReporte->Show();
        $this->Sorter_AnioRepote->Show();
        $this->Sorter_nombre->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-74FE5DEE
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GrupoAplicativos->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ServiciosRelacionados->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CFMAnterior->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CFMActual->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EficienciaPresupuestal->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumpleSLA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MesReporte->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AnioRepote->Errors->ToString());
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCumpleSLA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->observaciones->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_c_proveedor_mc_eficien Class @3-FCB6E20C

class clsmc_c_proveedor_mc_eficienDataSource extends clsDBcnDisenio {  //mc_c_proveedor_mc_eficienDataSource Class @3-801EE255

//DataSource Variables @3-1AD9B081
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Id;
    public $GrupoAplicativos;
    public $ServiciosRelacionados;
    public $CFMAnterior;
    public $CFMActual;
    public $EficienciaPresupuestal;
    public $CumpleSLA;
    public $MesReporte;
    public $AnioRepote;
    public $nombre;
    public $observaciones;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-64E146C5
    function clsmc_c_proveedor_mc_eficienDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_c_proveedor_mc_eficien";
        $this->Initialize();
        $this->Id = new clsField("Id", ccsInteger, "");
        
        $this->GrupoAplicativos = new clsField("GrupoAplicativos", ccsText, "");
        
        $this->ServiciosRelacionados = new clsField("ServiciosRelacionados", ccsText, "");
        
        $this->CFMAnterior = new clsField("CFMAnterior", ccsFloat, "");
        
        $this->CFMActual = new clsField("CFMActual", ccsFloat, "");
        
        $this->EficienciaPresupuestal = new clsField("EficienciaPresupuestal", ccsFloat, "");
        
        $this->CumpleSLA = new clsField("CumpleSLA", ccsInteger, "");
        
        $this->MesReporte = new clsField("MesReporte", ccsInteger, "");
        
        $this->AnioRepote = new clsField("AnioRepote", ccsInteger, "");
        
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->observaciones = new clsField("observaciones", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-E7B94F11
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Id" => array("Id", ""), 
            "Sorter_GrupoAplicativos" => array("GrupoAplicativos", ""), 
            "Sorter_ServiciosRelacionados" => array("ServiciosRelacionados", ""), 
            "Sorter_CFMAnterior" => array("CFMAnterior", ""), 
            "Sorter_CFMActual" => array("CFMActual", ""), 
            "Sorter_EficienciaPresupuestal" => array("EficienciaPresupuestal", ""), 
            "Sorter_CumpleSLA" => array("CumpleSLA", ""), 
            "Sorter_MesReporte" => array("MesReporte", ""), 
            "Sorter_AnioRepote" => array("AnioReporte", ""), 
            "Sorter_nombre" => array("nombre", "")));
    }
//End SetOrder Method

//Prepare Method @3-875E0579
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_Id_Proveedor", ccsInteger, "", "", $this->Parameters["urls_Id_Proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_GrupoAplicativos", ccsText, "", "", $this->Parameters["urls_GrupoAplicativos"], "", false);
        $this->wp->AddParameter("3", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))), false);
        $this->wp->AddParameter("4", "urls_AnioRepote", ccsInteger, "", "", $this->Parameters["urls_AnioRepote"], date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))), false);
    }
//End Prepare Method

//Open Method @3-FF057CD5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT nombre, GrupoAplicativos, ServiciosRelacionados, CFMAnterior, CFMActual, EficienciaPresupuestal, CumpleSLA, MesReporte, Id,\n" .
        "anioreporte, observaciones \n" .
        "FROM mc_eficiencia_presupuestal INNER JOIN mc_c_proveedor ON\n" .
        "mc_eficiencia_presupuestal.Id_Proveedor = mc_c_proveedor.Id_Proveedor\n" .
        "WHERE (mc_eficiencia_presupuestal.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0)\n" .
        "AND mc_eficiencia_presupuestal.GrupoAplicativos LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "AND (mc_eficiencia_presupuestal.MesReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "AND (anioreporte = " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . "=0 )) cnt";
        $this->SQL = "SELECT nombre, GrupoAplicativos, ServiciosRelacionados, CFMAnterior, CFMActual, EficienciaPresupuestal, CumpleSLA, MesReporte, Id,\n" .
        "anioreporte, observaciones \n" .
        "FROM mc_eficiencia_presupuestal INNER JOIN mc_c_proveedor ON\n" .
        "mc_eficiencia_presupuestal.Id_Proveedor = mc_c_proveedor.Id_Proveedor\n" .
        "WHERE (mc_eficiencia_presupuestal.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0)\n" .
        "AND mc_eficiencia_presupuestal.GrupoAplicativos LIKE '%" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "%'\n" .
        "AND (mc_eficiencia_presupuestal.MesReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "AND (anioreporte = " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . "=0 )";
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

//SetValues Method @3-3346079E
    function SetValues()
    {
        $this->Id->SetDBValue(trim($this->f("Id")));
        $this->GrupoAplicativos->SetDBValue($this->f("GrupoAplicativos"));
        $this->ServiciosRelacionados->SetDBValue($this->f("ServiciosRelacionados"));
        $this->CFMAnterior->SetDBValue(trim($this->f("CFMAnterior")));
        $this->CFMActual->SetDBValue(trim($this->f("CFMActual")));
        $this->EficienciaPresupuestal->SetDBValue(trim($this->f("EficienciaPresupuestal")));
        $this->CumpleSLA->SetDBValue(trim($this->f("CumpleSLA")));
        $this->MesReporte->SetDBValue(trim($this->f("MesReporte")));
        $this->AnioRepote->SetDBValue(trim($this->f("anioreporte")));
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->observaciones->SetDBValue($this->f("observaciones"));
    }
//End SetValues Method

} //End mc_c_proveedor_mc_eficienDataSource Class @3-FCB6E20C

class clsRecordmc_eficiencia_presupuesta { //mc_eficiencia_presupuesta Class @54-FAAE7A0F

//Variables @54-9E315808

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

//Class_Initialize Event @54-EFDA4B88
    function clsRecordmc_eficiencia_presupuesta($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_eficiencia_presupuesta/Error";
        $this->DataSource = new clsmc_eficiencia_presupuestaDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_eficiencia_presupuesta";
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
            $this->Id_Proveedor = new clsControl(ccsHidden, "Id_Proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("Id_Proveedor", $Method, NULL), $this);
            $this->Id_Proveedor->Required = true;
            $this->GrupoAplicativos = new clsControl(ccsHidden, "GrupoAplicativos", "Grupo Aplicativos", ccsText, "", CCGetRequestParam("GrupoAplicativos", $Method, NULL), $this);
            $this->GrupoAplicativos->Required = true;
            $this->ServiciosRelacionados = new clsControl(ccsHidden, "ServiciosRelacionados", "Servicios Relacionados", ccsText, "", CCGetRequestParam("ServiciosRelacionados", $Method, NULL), $this);
            $this->ServiciosRelacionados->Required = true;
            $this->CFMAnterior = new clsControl(ccsHidden, "CFMAnterior", "CFMAnterior", ccsFloat, array(False, 4, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("CFMAnterior", $Method, NULL), $this);
            $this->CFMActual = new clsControl(ccsTextBox, "CFMActual", "CFMActual", ccsFloat, array(False, 4, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("CFMActual", $Method, NULL), $this);
            $this->EficienciaPresupuestal = new clsControl(ccsTextBox, "EficienciaPresupuestal", "Eficiencia Presupuestal", ccsFloat, array(False, 4, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("EficienciaPresupuestal", $Method, NULL), $this);
            $this->CumpleSLA = new clsControl(ccsListBox, "CumpleSLA", "CumpleSLA", ccsInteger, "", CCGetRequestParam("CumpleSLA", $Method, NULL), $this);
            $this->CumpleSLA->DSType = dsListOfValues;
            $this->CumpleSLA->Values = array(array("1", "Cumple"), array("0", "No Cumple"), array("3", "Sin Información para Medir"));
            $this->Observaciones = new clsControl(ccsTextArea, "Observaciones", "Observaciones", ccsText, "", CCGetRequestParam("Observaciones", $Method, NULL), $this);
            $this->lProveedor = new clsControl(ccsLabel, "lProveedor", "lProveedor", ccsText, "", CCGetRequestParam("lProveedor", $Method, NULL), $this);
            $this->lGrupoAplicativos = new clsControl(ccsLabel, "lGrupoAplicativos", "lGrupoAplicativos", ccsText, "", CCGetRequestParam("lGrupoAplicativos", $Method, NULL), $this);
            $this->lServiciosRelacionados = new clsControl(ccsLabel, "lServiciosRelacionados", "lServiciosRelacionados", ccsText, "", CCGetRequestParam("lServiciosRelacionados", $Method, NULL), $this);
            $this->lCFMAnterior = new clsControl(ccsLabel, "lCFMAnterior", "lCFMAnterior", ccsFloat, array(False, 4, Null, "", False, "", "", 1, True, ""), CCGetRequestParam("lCFMAnterior", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @54-4F76030F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId"] = CCGetFromGet("Id", NULL);
    }
//End Initialize Method

//Validate Method @54-377B1F71
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Id_Proveedor->Validate() && $Validation);
        $Validation = ($this->GrupoAplicativos->Validate() && $Validation);
        $Validation = ($this->ServiciosRelacionados->Validate() && $Validation);
        $Validation = ($this->CFMAnterior->Validate() && $Validation);
        $Validation = ($this->CFMActual->Validate() && $Validation);
        $Validation = ($this->EficienciaPresupuestal->Validate() && $Validation);
        $Validation = ($this->CumpleSLA->Validate() && $Validation);
        $Validation = ($this->Observaciones->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Id_Proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GrupoAplicativos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ServiciosRelacionados->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CFMAnterior->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CFMActual->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EficienciaPresupuestal->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CumpleSLA->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Observaciones->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @54-086D6B73
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Id_Proveedor->Errors->Count());
        $errors = ($errors || $this->GrupoAplicativos->Errors->Count());
        $errors = ($errors || $this->ServiciosRelacionados->Errors->Count());
        $errors = ($errors || $this->CFMAnterior->Errors->Count());
        $errors = ($errors || $this->CFMActual->Errors->Count());
        $errors = ($errors || $this->EficienciaPresupuestal->Errors->Count());
        $errors = ($errors || $this->CumpleSLA->Errors->Count());
        $errors = ($errors || $this->Observaciones->Errors->Count());
        $errors = ($errors || $this->lProveedor->Errors->Count());
        $errors = ($errors || $this->lGrupoAplicativos->Errors->Count());
        $errors = ($errors || $this->lServiciosRelacionados->Errors->Count());
        $errors = ($errors || $this->lCFMAnterior->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @54-B908BA44
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

//InsertRow Method @54-8AFDFBFB
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Id_Proveedor->SetValue($this->Id_Proveedor->GetValue(true));
        $this->DataSource->GrupoAplicativos->SetValue($this->GrupoAplicativos->GetValue(true));
        $this->DataSource->ServiciosRelacionados->SetValue($this->ServiciosRelacionados->GetValue(true));
        $this->DataSource->CFMAnterior->SetValue($this->CFMAnterior->GetValue(true));
        $this->DataSource->CFMActual->SetValue($this->CFMActual->GetValue(true));
        $this->DataSource->EficienciaPresupuestal->SetValue($this->EficienciaPresupuestal->GetValue(true));
        $this->DataSource->CumpleSLA->SetValue($this->CumpleSLA->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->lProveedor->SetValue($this->lProveedor->GetValue(true));
        $this->DataSource->lGrupoAplicativos->SetValue($this->lGrupoAplicativos->GetValue(true));
        $this->DataSource->lServiciosRelacionados->SetValue($this->lServiciosRelacionados->GetValue(true));
        $this->DataSource->lCFMAnterior->SetValue($this->lCFMAnterior->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @54-93BD30D6
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Id_Proveedor->SetValue($this->Id_Proveedor->GetValue(true));
        $this->DataSource->GrupoAplicativos->SetValue($this->GrupoAplicativos->GetValue(true));
        $this->DataSource->ServiciosRelacionados->SetValue($this->ServiciosRelacionados->GetValue(true));
        $this->DataSource->CFMAnterior->SetValue($this->CFMAnterior->GetValue(true));
        $this->DataSource->CFMActual->SetValue($this->CFMActual->GetValue(true));
        $this->DataSource->EficienciaPresupuestal->SetValue($this->EficienciaPresupuestal->GetValue(true));
        $this->DataSource->CumpleSLA->SetValue($this->CumpleSLA->GetValue(true));
        $this->DataSource->Observaciones->SetValue($this->Observaciones->GetValue(true));
        $this->DataSource->lProveedor->SetValue($this->lProveedor->GetValue(true));
        $this->DataSource->lGrupoAplicativos->SetValue($this->lGrupoAplicativos->GetValue(true));
        $this->DataSource->lServiciosRelacionados->SetValue($this->lServiciosRelacionados->GetValue(true));
        $this->DataSource->lCFMAnterior->SetValue($this->lCFMAnterior->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @54-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @54-29CE73A9
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

        $this->CumpleSLA->Prepare();

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
                    $this->Id_Proveedor->SetValue($this->DataSource->Id_Proveedor->GetValue());
                    $this->GrupoAplicativos->SetValue($this->DataSource->GrupoAplicativos->GetValue());
                    $this->ServiciosRelacionados->SetValue($this->DataSource->ServiciosRelacionados->GetValue());
                    $this->CFMAnterior->SetValue($this->DataSource->CFMAnterior->GetValue());
                    $this->CFMActual->SetValue($this->DataSource->CFMActual->GetValue());
                    $this->EficienciaPresupuestal->SetValue($this->DataSource->EficienciaPresupuestal->GetValue());
                    $this->CumpleSLA->SetValue($this->DataSource->CumpleSLA->GetValue());
                    $this->Observaciones->SetValue($this->DataSource->Observaciones->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Id_Proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GrupoAplicativos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ServiciosRelacionados->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CFMAnterior->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CFMActual->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EficienciaPresupuestal->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CumpleSLA->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Observaciones->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lProveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lGrupoAplicativos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lServiciosRelacionados->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lCFMAnterior->Errors->ToString());
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
        $this->Id_Proveedor->Show();
        $this->GrupoAplicativos->Show();
        $this->ServiciosRelacionados->Show();
        $this->CFMAnterior->Show();
        $this->CFMActual->Show();
        $this->EficienciaPresupuestal->Show();
        $this->CumpleSLA->Show();
        $this->Observaciones->Show();
        $this->lProveedor->Show();
        $this->lGrupoAplicativos->Show();
        $this->lServiciosRelacionados->Show();
        $this->lCFMAnterior->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_eficiencia_presupuesta Class @54-FCB6E20C

class clsmc_eficiencia_presupuestaDataSource extends clsDBcnDisenio {  //mc_eficiencia_presupuestaDataSource Class @54-ABCE35EF

//DataSource Variables @54-15E26BA9
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
    public $Id_Proveedor;
    public $GrupoAplicativos;
    public $ServiciosRelacionados;
    public $CFMAnterior;
    public $CFMActual;
    public $EficienciaPresupuestal;
    public $CumpleSLA;
    public $Observaciones;
    public $lProveedor;
    public $lGrupoAplicativos;
    public $lServiciosRelacionados;
    public $lCFMAnterior;
//End DataSource Variables

//DataSourceClass_Initialize Event @54-C102FCCC
    function clsmc_eficiencia_presupuestaDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_eficiencia_presupuesta/Error";
        $this->Initialize();
        $this->Id_Proveedor = new clsField("Id_Proveedor", ccsInteger, "");
        
        $this->GrupoAplicativos = new clsField("GrupoAplicativos", ccsText, "");
        
        $this->ServiciosRelacionados = new clsField("ServiciosRelacionados", ccsText, "");
        
        $this->CFMAnterior = new clsField("CFMAnterior", ccsFloat, "");
        
        $this->CFMActual = new clsField("CFMActual", ccsFloat, "");
        
        $this->EficienciaPresupuestal = new clsField("EficienciaPresupuestal", ccsFloat, "");
        
        $this->CumpleSLA = new clsField("CumpleSLA", ccsInteger, "");
        
        $this->Observaciones = new clsField("Observaciones", ccsText, "");
        
        $this->lProveedor = new clsField("lProveedor", ccsText, "");
        
        $this->lGrupoAplicativos = new clsField("lGrupoAplicativos", ccsText, "");
        
        $this->lServiciosRelacionados = new clsField("lServiciosRelacionados", ccsText, "");
        
        $this->lCFMAnterior = new clsField("lCFMAnterior", ccsFloat, "");
        

        $this->InsertFields["Id_Proveedor"] = array("Name" => "[Id_Proveedor]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["GrupoAplicativos"] = array("Name" => "[GrupoAplicativos]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ServiciosRelacionados"] = array("Name" => "[ServiciosRelacionados]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CFMAnterior"] = array("Name" => "[CFMAnterior]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["CFMActual"] = array("Name" => "[CFMActual]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["EficienciaPresupuestal"] = array("Name" => "[EficienciaPresupuestal]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["CumpleSLA"] = array("Name" => "[CumpleSLA]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Id_Proveedor"] = array("Name" => "[Id_Proveedor]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["GrupoAplicativos"] = array("Name" => "[GrupoAplicativos]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ServiciosRelacionados"] = array("Name" => "[ServiciosRelacionados]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CFMAnterior"] = array("Name" => "[CFMAnterior]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["CFMActual"] = array("Name" => "[CFMActual]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["EficienciaPresupuestal"] = array("Name" => "[EficienciaPresupuestal]", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["CumpleSLA"] = array("Name" => "[CumpleSLA]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Observaciones"] = array("Name" => "[Observaciones]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @54-D6C1B08E
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

//Open Method @54-A0AE29AA
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_eficiencia_presupuestal {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @54-31A11063
    function SetValues()
    {
        $this->Id_Proveedor->SetDBValue(trim($this->f("Id_Proveedor")));
        $this->GrupoAplicativos->SetDBValue($this->f("GrupoAplicativos"));
        $this->ServiciosRelacionados->SetDBValue($this->f("ServiciosRelacionados"));
        $this->CFMAnterior->SetDBValue(trim($this->f("CFMAnterior")));
        $this->CFMActual->SetDBValue(trim($this->f("CFMActual")));
        $this->EficienciaPresupuestal->SetDBValue(trim($this->f("EficienciaPresupuestal")));
        $this->CumpleSLA->SetDBValue(trim($this->f("CumpleSLA")));
        $this->Observaciones->SetDBValue($this->f("Observaciones"));
    }
//End SetValues Method

//Insert Method @54-EB6BFC03
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Id_Proveedor"]["Value"] = $this->Id_Proveedor->GetDBValue(true);
        $this->InsertFields["GrupoAplicativos"]["Value"] = $this->GrupoAplicativos->GetDBValue(true);
        $this->InsertFields["ServiciosRelacionados"]["Value"] = $this->ServiciosRelacionados->GetDBValue(true);
        $this->InsertFields["CFMAnterior"]["Value"] = $this->CFMAnterior->GetDBValue(true);
        $this->InsertFields["CFMActual"]["Value"] = $this->CFMActual->GetDBValue(true);
        $this->InsertFields["EficienciaPresupuestal"]["Value"] = $this->EficienciaPresupuestal->GetDBValue(true);
        $this->InsertFields["CumpleSLA"]["Value"] = $this->CumpleSLA->GetDBValue(true);
        $this->InsertFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_eficiencia_presupuestal", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @54-6A5E3A9C
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Id_Proveedor"]["Value"] = $this->Id_Proveedor->GetDBValue(true);
        $this->UpdateFields["GrupoAplicativos"]["Value"] = $this->GrupoAplicativos->GetDBValue(true);
        $this->UpdateFields["ServiciosRelacionados"]["Value"] = $this->ServiciosRelacionados->GetDBValue(true);
        $this->UpdateFields["CFMAnterior"]["Value"] = $this->CFMAnterior->GetDBValue(true);
        $this->UpdateFields["CFMActual"]["Value"] = $this->CFMActual->GetDBValue(true);
        $this->UpdateFields["EficienciaPresupuestal"]["Value"] = $this->EficienciaPresupuestal->GetDBValue(true);
        $this->UpdateFields["CumpleSLA"]["Value"] = $this->CumpleSLA->GetDBValue(true);
        $this->UpdateFields["Observaciones"]["Value"] = $this->Observaciones->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_eficiencia_presupuestal", $this->UpdateFields, $this);
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

//Delete Method @54-06AA0285
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM mc_eficiencia_presupuestal";
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

} //End mc_eficiencia_presupuestaDataSource Class @54-FCB6E20C

class clsRecordmc_eficiencia_presupuesta1 { //mc_eficiencia_presupuesta1 Class @70-8F06535D

//Variables @70-9E315808

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

//Class_Initialize Event @70-CB10F3F9
    function clsRecordmc_eficiencia_presupuesta1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_eficiencia_presupuesta1/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_eficiencia_presupuesta1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_Id_Proveedor = new clsControl(ccsListBox, "s_Id_Proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("s_Id_Proveedor", $Method, NULL), $this);
            $this->s_Id_Proveedor->DSType = dsTable;
            $this->s_Id_Proveedor->DataSource = new clsDBcnDisenio();
            $this->s_Id_Proveedor->ds = & $this->s_Id_Proveedor->DataSource;
            $this->s_Id_Proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_Id_Proveedor->BoundColumn, $this->s_Id_Proveedor->TextColumn, $this->s_Id_Proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_Id_Proveedor->DataSource->Parameters["expr77"] = 'CDS';
            $this->s_Id_Proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_Id_Proveedor->DataSource->wp->AddParameter("1", "expr77", ccsText, "", "", $this->s_Id_Proveedor->DataSource->Parameters["expr77"], "", false);
            $this->s_Id_Proveedor->DataSource->wp->Criterion[1] = $this->s_Id_Proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_Id_Proveedor->DataSource->wp->GetDBValue("1"), $this->s_Id_Proveedor->DataSource->ToSQL($this->s_Id_Proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_Id_Proveedor->DataSource->Where = 
                 $this->s_Id_Proveedor->DataSource->wp->Criterion[1];
            $this->s_GrupoAplicativos = new clsControl(ccsTextBox, "s_GrupoAplicativos", "Grupo Aplicativos", ccsText, "", CCGetRequestParam("s_GrupoAplicativos", $Method, NULL), $this);
            $this->s_MesReporte = new clsControl(ccsListBox, "s_MesReporte", "Mes Reporte", ccsInteger, "", CCGetRequestParam("s_MesReporte", $Method, NULL), $this);
            $this->s_MesReporte->DSType = dsTable;
            $this->s_MesReporte->DataSource = new clsDBcnDisenio();
            $this->s_MesReporte->ds = & $this->s_MesReporte->DataSource;
            $this->s_MesReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_MesReporte->BoundColumn, $this->s_MesReporte->TextColumn, $this->s_MesReporte->DBFormat) = array("IdMes", "Mes", "");
            $this->s_AnioRepote = new clsControl(ccsListBox, "s_AnioRepote", "Anio Repote", ccsInteger, "", CCGetRequestParam("s_AnioRepote", $Method, NULL), $this);
            $this->s_AnioRepote->DSType = dsTable;
            $this->s_AnioRepote->DataSource = new clsDBcnDisenio();
            $this->s_AnioRepote->ds = & $this->s_AnioRepote->DataSource;
            $this->s_AnioRepote->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_AnioRepote->BoundColumn, $this->s_AnioRepote->TextColumn, $this->s_AnioRepote->DBFormat) = array("Ano", "Ano", "");
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_MesReporte->Value) && !strlen($this->s_MesReporte->Value) && $this->s_MesReporte->Value !== false)
                    $this->s_MesReporte->SetText(date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))));
                if(!is_array($this->s_AnioRepote->Value) && !strlen($this->s_AnioRepote->Value) && $this->s_AnioRepote->Value !== false)
                    $this->s_AnioRepote->SetText(date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))));
            }
        }
    }
//End Class_Initialize Event

//Validate Method @70-099A4C99
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_Id_Proveedor->Validate() && $Validation);
        $Validation = ($this->s_GrupoAplicativos->Validate() && $Validation);
        $Validation = ($this->s_MesReporte->Validate() && $Validation);
        $Validation = ($this->s_AnioRepote->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_Id_Proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_GrupoAplicativos->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_AnioRepote->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @70-9CD242A6
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_Id_Proveedor->Errors->Count());
        $errors = ($errors || $this->s_GrupoAplicativos->Errors->Count());
        $errors = ($errors || $this->s_MesReporte->Errors->Count());
        $errors = ($errors || $this->s_AnioRepote->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @70-DD94EE4C
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
    }
//End Operation Method

//Show Method @70-3EAD794C
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

        $this->s_Id_Proveedor->Prepare();
        $this->s_MesReporte->Prepare();
        $this->s_AnioRepote->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_Id_Proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_GrupoAplicativos->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_AnioRepote->Errors->ToString());
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
        $this->s_Id_Proveedor->Show();
        $this->s_GrupoAplicativos->Show();
        $this->s_MesReporte->Show();
        $this->s_AnioRepote->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_eficiencia_presupuesta1 Class @70-FCB6E20C



//Initialize Page @1-2D18728E
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
$TemplateFileName = "EficienciaPresLista.html";
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

//Include events file @1-1DAE2B22
include_once("./EficienciaPresLista_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-52FC7BCB
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_c_proveedor_mc_eficien = new clsGridmc_c_proveedor_mc_eficien("", $MainPage);
$mc_eficiencia_presupuesta = new clsRecordmc_eficiencia_presupuesta("", $MainPage);
$mc_eficiencia_presupuesta1 = new clsRecordmc_eficiencia_presupuesta1("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_c_proveedor_mc_eficien = & $mc_c_proveedor_mc_eficien;
$MainPage->mc_eficiencia_presupuesta = & $mc_eficiencia_presupuesta;
$MainPage->mc_eficiencia_presupuesta1 = & $mc_eficiencia_presupuesta1;
$mc_c_proveedor_mc_eficien->Initialize();
$mc_eficiencia_presupuesta->Initialize();
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

//Execute Components @1-59DB7289
$mc_eficiencia_presupuesta1->Operation();
$mc_eficiencia_presupuesta->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-BA70EF90
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_c_proveedor_mc_eficien);
    unset($mc_eficiencia_presupuesta);
    unset($mc_eficiencia_presupuesta1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-CCBA5752
$Header->Show();
$mc_c_proveedor_mc_eficien->Show();
$mc_eficiencia_presupuesta->Show();
$mc_eficiencia_presupuesta1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-83267CE0
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_c_proveedor_mc_eficien);
unset($mc_eficiencia_presupuesta);
unset($mc_eficiencia_presupuesta1);
unset($Tpl);
//End Unload Page


?>
