<?php
//Include Common Files @1-E18A8A1A
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "TableroSLAsCDSs.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordGrid2 { //Grid2 Class @55-542C3E47

//Variables @55-9E315808

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

//Class_Initialize Event @55-A2DB071E
    function clsRecordGrid2($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Grid2/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "Grid2";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsTable;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            $this->s_id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_MesReporte = new clsControl(ccsListBox, "s_MesReporte", "Mes", ccsInteger, "", CCGetRequestParam("s_MesReporte", $Method, NULL), $this);
            $this->s_MesReporte->DSType = dsTable;
            $this->s_MesReporte->DataSource = new clsDBcnDisenio();
            $this->s_MesReporte->ds = & $this->s_MesReporte->DataSource;
            $this->s_MesReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_MesReporte->BoundColumn, $this->s_MesReporte->TextColumn, $this->s_MesReporte->DBFormat) = array("IdMes", "Mes", "");
            $this->s_AnioReporte = new clsControl(ccsListBox, "s_AnioReporte", "Anio", ccsInteger, "", CCGetRequestParam("s_AnioReporte", $Method, NULL), $this);
            $this->s_AnioReporte->DSType = dsTable;
            $this->s_AnioReporte->DataSource = new clsDBcnDisenio();
            $this->s_AnioReporte->ds = & $this->s_AnioReporte->DataSource;
            $this->s_AnioReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_AnioReporte->BoundColumn, $this->s_AnioReporte->TextColumn, $this->s_AnioReporte->DBFormat) = array("Ano", "Ano", "");
            $this->s_AnioReporte->DataSource->Parameters["expr310"] = 0;
            $this->s_AnioReporte->DataSource->wp = new clsSQLParameters();
            $this->s_AnioReporte->DataSource->wp->AddParameter("1", "expr310", ccsInteger, "", "", $this->s_AnioReporte->DataSource->Parameters["expr310"], "", false);
            $this->s_AnioReporte->DataSource->wp->Criterion[1] = $this->s_AnioReporte->DataSource->wp->Operation(opGreaterThan, "[Ano]", $this->s_AnioReporte->DataSource->wp->GetDBValue("1"), $this->s_AnioReporte->DataSource->ToSQL($this->s_AnioReporte->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->s_AnioReporte->DataSource->Where = 
                 $this->s_AnioReporte->DataSource->wp->Criterion[1];
        }
    }
//End Class_Initialize Event

//Validate Method @55-713777E7
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_MesReporte->Validate() && $Validation);
        $Validation = ($this->s_AnioReporte->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_AnioReporte->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @55-F92AA8F5
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_MesReporte->Errors->Count());
        $errors = ($errors || $this->s_AnioReporte->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @55-29686344
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
        $Redirect = "TableroSLAsCDSs.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "TableroSLAsCDSs.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @55-7342DCBE
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

        $this->s_id_proveedor->Prepare();
        $this->s_MesReporte->Prepare();
        $this->s_AnioReporte->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_AnioReporte->Errors->ToString());
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
        $this->s_id_proveedor->Show();
        $this->s_MesReporte->Show();
        $this->s_AnioReporte->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End Grid2 Class @55-FCB6E20C

class clsGridgrdTableroSLAs { //grdTableroSLAs class @3-02B4D02B

//Variables @3-B1711D24

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
    public $Sorter_TotCUMPL_REQ_FUNC;
    public $Sorter_TotCALIDAD_PROD_TERM;
    public $Sorter_TotRETR_ENTREGABLE;
    public $Sorter_TotCAL_COD;
    public $Sorter_TotDEF_FUG_AMB_PROD;
    public $Sorter_TotTiempoAsignacion;
    public $Sorter_TotTiempoSolucion;
    public $Sorter_TotREQ_SERV;
    public $Sorter_TotHERR_EST_COST;
    public $Sorter_EFIC_PRES;
    public $Sorter_Orden;
//End Variables

//Class_Initialize Event @3-E491025F
    function clsGridgrdTableroSLAs($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdTableroSLAs";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdTableroSLAs";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdTableroSLAsDataSource($this);
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
        $this->SorterName = CCGetParam("grdTableroSLAsOrder", "");
        $this->SorterDirection = CCGetParam("grdTableroSLAsDir", "");

        $this->descripcion = new clsControl(ccsLabel, "descripcion", "descripcion", ccsText, "", CCGetRequestParam("descripcion", ccsGet, NULL), $this);
        $this->TotREQ_SERV = new clsControl(ccsLabel, "TotREQ_SERV", "TotREQ_SERV", ccsInteger, "", CCGetRequestParam("TotREQ_SERV", ccsGet, NULL), $this);
        $this->TotCUMPL_REQ_FUNC = new clsControl(ccsLabel, "TotCUMPL_REQ_FUNC", "TotCUMPL_REQ_FUNC", ccsInteger, "", CCGetRequestParam("TotCUMPL_REQ_FUNC", ccsGet, NULL), $this);
        $this->TotCALIDAD_PROD_TERM = new clsControl(ccsLabel, "TotCALIDAD_PROD_TERM", "TotCALIDAD_PROD_TERM", ccsInteger, "", CCGetRequestParam("TotCALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->TotRETR_ENTREGABLE = new clsControl(ccsLabel, "TotRETR_ENTREGABLE", "TotRETR_ENTREGABLE", ccsInteger, "", CCGetRequestParam("TotRETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->TotCAL_COD = new clsControl(ccsLabel, "TotCAL_COD", "TotCAL_COD", ccsInteger, "", CCGetRequestParam("TotCAL_COD", ccsGet, NULL), $this);
        $this->TotDEF_FUG_AMB_PROD = new clsControl(ccsLabel, "TotDEF_FUG_AMB_PROD", "TotDEF_FUG_AMB_PROD", ccsInteger, "", CCGetRequestParam("TotDEF_FUG_AMB_PROD", ccsGet, NULL), $this);
        $this->TotInc_TiempoAsignacion = new clsControl(ccsLabel, "TotInc_TiempoAsignacion", "TotInc_TiempoAsignacion", ccsInteger, "", CCGetRequestParam("TotInc_TiempoAsignacion", ccsGet, NULL), $this);
        $this->TotInc_TiempoSolucion = new clsControl(ccsLabel, "TotInc_TiempoSolucion", "TotInc_TiempoSolucion", ccsInteger, "", CCGetRequestParam("TotInc_TiempoSolucion", ccsGet, NULL), $this);
        $this->CumplenREQ_SERV = new clsControl(ccsLabel, "CumplenREQ_SERV", "CumplenREQ_SERV", ccsInteger, "", CCGetRequestParam("CumplenREQ_SERV", ccsGet, NULL), $this);
        $this->CumplenCUMPL_REQ_FUNC = new clsControl(ccsLabel, "CumplenCUMPL_REQ_FUNC", "CumplenCUMPL_REQ_FUNC", ccsInteger, "", CCGetRequestParam("CumplenCUMPL_REQ_FUNC", ccsGet, NULL), $this);
        $this->CumplenCALIDAD_PROD_TERM = new clsControl(ccsLabel, "CumplenCALIDAD_PROD_TERM", "CumplenCALIDAD_PROD_TERM", ccsInteger, "", CCGetRequestParam("CumplenCALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->CumplenRETR_ENTREGABLE = new clsControl(ccsLabel, "CumplenRETR_ENTREGABLE", "CumplenRETR_ENTREGABLE", ccsInteger, "", CCGetRequestParam("CumplenRETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->CumplenCAL_COD = new clsControl(ccsLabel, "CumplenCAL_COD", "CumplenCAL_COD", ccsInteger, "", CCGetRequestParam("CumplenCAL_COD", ccsGet, NULL), $this);
        $this->CumplenDEF_FUG_AMB_PROD = new clsControl(ccsLabel, "CumplenDEF_FUG_AMB_PROD", "CumplenDEF_FUG_AMB_PROD", ccsInteger, "", CCGetRequestParam("CumplenDEF_FUG_AMB_PROD", ccsGet, NULL), $this);
        $this->CumplenInc_TiempoAsignacion = new clsControl(ccsLabel, "CumplenInc_TiempoAsignacion", "CumplenInc_TiempoAsignacion", ccsInteger, "", CCGetRequestParam("CumplenInc_TiempoAsignacion", ccsGet, NULL), $this);
        $this->CumplenInc_TiempoSolucion = new clsControl(ccsLabel, "CumplenInc_TiempoSolucion", "CumplenInc_TiempoSolucion", ccsInteger, "", CCGetRequestParam("CumplenInc_TiempoSolucion", ccsGet, NULL), $this);
        $this->HERR_EST_COST = new clsControl(ccsLabel, "HERR_EST_COST", "HERR_EST_COST", ccsInteger, "", CCGetRequestParam("HERR_EST_COST", ccsGet, NULL), $this);
        $this->HERR_EST_COST->HTML = true;
        $this->REQ_SERV = new clsControl(ccsLabel, "REQ_SERV", "REQ_SERV", ccsInteger, "", CCGetRequestParam("REQ_SERV", ccsGet, NULL), $this);
        $this->REQ_SERV->HTML = true;
        $this->CUMPL_REQ_FUNC = new clsControl(ccsLabel, "CUMPL_REQ_FUNC", "CUMPL_REQ_FUNC", ccsInteger, "", CCGetRequestParam("CUMPL_REQ_FUNC", ccsGet, NULL), $this);
        $this->CUMPL_REQ_FUNC->HTML = true;
        $this->CALIDAD_PROD_TERM = new clsControl(ccsLabel, "CALIDAD_PROD_TERM", "CALIDAD_PROD_TERM", ccsInteger, "", CCGetRequestParam("CALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->CALIDAD_PROD_TERM->HTML = true;
        $this->RETR_ENTREGABLE = new clsControl(ccsLabel, "RETR_ENTREGABLE", "RETR_ENTREGABLE", ccsInteger, "", CCGetRequestParam("RETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->RETR_ENTREGABLE->HTML = true;
        $this->CAL_COD = new clsControl(ccsLabel, "CAL_COD", "CAL_COD", ccsInteger, "", CCGetRequestParam("CAL_COD", ccsGet, NULL), $this);
        $this->CAL_COD->HTML = true;
        $this->DEF_FUG_AMB_PROD = new clsControl(ccsLabel, "DEF_FUG_AMB_PROD", "DEF_FUG_AMB_PROD", ccsInteger, "", CCGetRequestParam("DEF_FUG_AMB_PROD", ccsGet, NULL), $this);
        $this->DEF_FUG_AMB_PROD->HTML = true;
        $this->Inc_TiempoAsignacion = new clsControl(ccsLabel, "Inc_TiempoAsignacion", "Inc_TiempoAsignacion", ccsInteger, "", CCGetRequestParam("Inc_TiempoAsignacion", ccsGet, NULL), $this);
        $this->Inc_TiempoAsignacion->HTML = true;
        $this->Inc_TiempoSolucion = new clsControl(ccsLabel, "Inc_TiempoSolucion", "Inc_TiempoSolucion", ccsInteger, "", CCGetRequestParam("Inc_TiempoSolucion", ccsGet, NULL), $this);
        $this->Inc_TiempoSolucion->HTML = true;
        $this->Img_HERR_EST_COST = new clsControl(ccsImage, "Img_HERR_EST_COST", "Img_HERR_EST_COST", ccsText, "", CCGetRequestParam("Img_HERR_EST_COST", ccsGet, NULL), $this);
        $this->Img_REQ_SERV = new clsControl(ccsImage, "Img_REQ_SERV", "Img_REQ_SERV", ccsText, "", CCGetRequestParam("Img_REQ_SERV", ccsGet, NULL), $this);
        $this->Img_CUMPL_REQ_FUNC = new clsControl(ccsImage, "Img_CUMPL_REQ_FUNC", "Img_CUMPL_REQ_FUNC", ccsText, "", CCGetRequestParam("Img_CUMPL_REQ_FUNC", ccsGet, NULL), $this);
        $this->Img_CALIDAD_PROD_TERM = new clsControl(ccsImage, "Img_CALIDAD_PROD_TERM", "Img_CALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("Img_CALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->Img_RETR_ENTREGABLE = new clsControl(ccsImage, "Img_RETR_ENTREGABLE", "Img_RETR_ENTREGABLE", ccsText, "", CCGetRequestParam("Img_RETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->Img_CAL_COD = new clsControl(ccsImage, "Img_CAL_COD", "Img_CAL_COD", ccsText, "", CCGetRequestParam("Img_CAL_COD", ccsGet, NULL), $this);
        $this->Img_DEF_FUG_AMB_PROD = new clsControl(ccsImage, "Img_DEF_FUG_AMB_PROD", "Img_DEF_FUG_AMB_PROD", ccsText, "", CCGetRequestParam("Img_DEF_FUG_AMB_PROD", ccsGet, NULL), $this);
        $this->Img_Inc_TiempoAsignacion = new clsControl(ccsImage, "Img_Inc_TiempoAsignacion", "Img_Inc_TiempoAsignacion", ccsText, "", CCGetRequestParam("Img_Inc_TiempoAsignacion", ccsGet, NULL), $this);
        $this->Img_Inc_TiempoSolucion = new clsControl(ccsImage, "Img_Inc_TiempoSolucion", "Img_Inc_TiempoSolucion", ccsText, "", CCGetRequestParam("Img_Inc_TiempoSolucion", ccsGet, NULL), $this);
        $this->CumplenEFIC_PRESUP = new clsControl(ccsLabel, "CumplenEFIC_PRESUP", "CumplenEFIC_PRESUP", ccsInteger, "", CCGetRequestParam("CumplenEFIC_PRESUP", ccsGet, NULL), $this);
        $this->TotEFIC_PRESUP = new clsControl(ccsLabel, "TotEFIC_PRESUP", "TotEFIC_PRESUP", ccsInteger, "", CCGetRequestParam("TotEFIC_PRESUP", ccsGet, NULL), $this);
        $this->EFIC_PRESUP = new clsControl(ccsLabel, "EFIC_PRESUP", "EFIC_PRESUP", ccsInteger, "", CCGetRequestParam("EFIC_PRESUP", ccsGet, NULL), $this);
        $this->EFIC_PRESUP->HTML = true;
        $this->Img_EFIC_PRESUP = new clsControl(ccsImage, "Img_EFIC_PRESUP", "Img_EFIC_PRESUP", ccsText, "", CCGetRequestParam("Img_EFIC_PRESUP", ccsGet, NULL), $this);
        $this->CumplenHERR_EST_COST = new clsControl(ccsLabel, "CumplenHERR_EST_COST", "CumplenHERR_EST_COST", ccsInteger, "", CCGetRequestParam("CumplenHERR_EST_COST", ccsGet, NULL), $this);
        $this->TotHERR_EST_COST = new clsControl(ccsLabel, "TotHERR_EST_COST", "TotHERR_EST_COST", ccsInteger, "", CCGetRequestParam("TotHERR_EST_COST", ccsGet, NULL), $this);
        $this->Sorter_TotCUMPL_REQ_FUNC = new clsSorter($this->ComponentName, "Sorter_TotCUMPL_REQ_FUNC", $FileName, $this);
        $this->Sorter_TotCALIDAD_PROD_TERM = new clsSorter($this->ComponentName, "Sorter_TotCALIDAD_PROD_TERM", $FileName, $this);
        $this->Sorter_TotRETR_ENTREGABLE = new clsSorter($this->ComponentName, "Sorter_TotRETR_ENTREGABLE", $FileName, $this);
        $this->Sorter_TotCAL_COD = new clsSorter($this->ComponentName, "Sorter_TotCAL_COD", $FileName, $this);
        $this->Sorter_TotDEF_FUG_AMB_PROD = new clsSorter($this->ComponentName, "Sorter_TotDEF_FUG_AMB_PROD", $FileName, $this);
        $this->Sorter_TotTiempoAsignacion = new clsSorter($this->ComponentName, "Sorter_TotTiempoAsignacion", $FileName, $this);
        $this->Sorter_TotTiempoSolucion = new clsSorter($this->ComponentName, "Sorter_TotTiempoSolucion", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Sorter_TotREQ_SERV = new clsSorter($this->ComponentName, "Sorter_TotREQ_SERV", $FileName, $this);
        $this->Sorter_TotHERR_EST_COST = new clsSorter($this->ComponentName, "Sorter_TotHERR_EST_COST", $FileName, $this);
        $this->Sorter_EFIC_PRES = new clsSorter($this->ComponentName, "Sorter_EFIC_PRES", $FileName, $this);
        $this->Sorter_Orden = new clsSorter($this->ComponentName, "Sorter_Orden", $FileName, $this);
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

//Show Method @3-74CAC420
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_MesReporte"] = CCGetFromGet("s_MesReporte", NULL);
        $this->DataSource->Parameters["urls_AnioReporte"] = CCGetFromGet("s_AnioReporte", NULL);
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
            $this->ControlsVisible["descripcion"] = $this->descripcion->Visible;
            $this->ControlsVisible["TotREQ_SERV"] = $this->TotREQ_SERV->Visible;
            $this->ControlsVisible["TotCUMPL_REQ_FUNC"] = $this->TotCUMPL_REQ_FUNC->Visible;
            $this->ControlsVisible["TotCALIDAD_PROD_TERM"] = $this->TotCALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["TotRETR_ENTREGABLE"] = $this->TotRETR_ENTREGABLE->Visible;
            $this->ControlsVisible["TotCAL_COD"] = $this->TotCAL_COD->Visible;
            $this->ControlsVisible["TotDEF_FUG_AMB_PROD"] = $this->TotDEF_FUG_AMB_PROD->Visible;
            $this->ControlsVisible["TotInc_TiempoAsignacion"] = $this->TotInc_TiempoAsignacion->Visible;
            $this->ControlsVisible["TotInc_TiempoSolucion"] = $this->TotInc_TiempoSolucion->Visible;
            $this->ControlsVisible["CumplenREQ_SERV"] = $this->CumplenREQ_SERV->Visible;
            $this->ControlsVisible["CumplenCUMPL_REQ_FUNC"] = $this->CumplenCUMPL_REQ_FUNC->Visible;
            $this->ControlsVisible["CumplenCALIDAD_PROD_TERM"] = $this->CumplenCALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["CumplenRETR_ENTREGABLE"] = $this->CumplenRETR_ENTREGABLE->Visible;
            $this->ControlsVisible["CumplenCAL_COD"] = $this->CumplenCAL_COD->Visible;
            $this->ControlsVisible["CumplenDEF_FUG_AMB_PROD"] = $this->CumplenDEF_FUG_AMB_PROD->Visible;
            $this->ControlsVisible["CumplenInc_TiempoAsignacion"] = $this->CumplenInc_TiempoAsignacion->Visible;
            $this->ControlsVisible["CumplenInc_TiempoSolucion"] = $this->CumplenInc_TiempoSolucion->Visible;
            $this->ControlsVisible["HERR_EST_COST"] = $this->HERR_EST_COST->Visible;
            $this->ControlsVisible["REQ_SERV"] = $this->REQ_SERV->Visible;
            $this->ControlsVisible["CUMPL_REQ_FUNC"] = $this->CUMPL_REQ_FUNC->Visible;
            $this->ControlsVisible["CALIDAD_PROD_TERM"] = $this->CALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["RETR_ENTREGABLE"] = $this->RETR_ENTREGABLE->Visible;
            $this->ControlsVisible["CAL_COD"] = $this->CAL_COD->Visible;
            $this->ControlsVisible["DEF_FUG_AMB_PROD"] = $this->DEF_FUG_AMB_PROD->Visible;
            $this->ControlsVisible["Inc_TiempoAsignacion"] = $this->Inc_TiempoAsignacion->Visible;
            $this->ControlsVisible["Inc_TiempoSolucion"] = $this->Inc_TiempoSolucion->Visible;
            $this->ControlsVisible["Img_HERR_EST_COST"] = $this->Img_HERR_EST_COST->Visible;
            $this->ControlsVisible["Img_REQ_SERV"] = $this->Img_REQ_SERV->Visible;
            $this->ControlsVisible["Img_CUMPL_REQ_FUNC"] = $this->Img_CUMPL_REQ_FUNC->Visible;
            $this->ControlsVisible["Img_CALIDAD_PROD_TERM"] = $this->Img_CALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["Img_RETR_ENTREGABLE"] = $this->Img_RETR_ENTREGABLE->Visible;
            $this->ControlsVisible["Img_CAL_COD"] = $this->Img_CAL_COD->Visible;
            $this->ControlsVisible["Img_DEF_FUG_AMB_PROD"] = $this->Img_DEF_FUG_AMB_PROD->Visible;
            $this->ControlsVisible["Img_Inc_TiempoAsignacion"] = $this->Img_Inc_TiempoAsignacion->Visible;
            $this->ControlsVisible["Img_Inc_TiempoSolucion"] = $this->Img_Inc_TiempoSolucion->Visible;
            $this->ControlsVisible["CumplenEFIC_PRESUP"] = $this->CumplenEFIC_PRESUP->Visible;
            $this->ControlsVisible["TotEFIC_PRESUP"] = $this->TotEFIC_PRESUP->Visible;
            $this->ControlsVisible["EFIC_PRESUP"] = $this->EFIC_PRESUP->Visible;
            $this->ControlsVisible["Img_EFIC_PRESUP"] = $this->Img_EFIC_PRESUP->Visible;
            $this->ControlsVisible["CumplenHERR_EST_COST"] = $this->CumplenHERR_EST_COST->Visible;
            $this->ControlsVisible["TotHERR_EST_COST"] = $this->TotHERR_EST_COST->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->descripcion->SetValue($this->DataSource->descripcion->GetValue());
                $this->TotREQ_SERV->SetValue($this->DataSource->TotREQ_SERV->GetValue());
                $this->TotCUMPL_REQ_FUNC->SetValue($this->DataSource->TotCUMPL_REQ_FUNC->GetValue());
                $this->TotCALIDAD_PROD_TERM->SetValue($this->DataSource->TotCALIDAD_PROD_TERM->GetValue());
                $this->TotRETR_ENTREGABLE->SetValue($this->DataSource->TotRETR_ENTREGABLE->GetValue());
                $this->TotCAL_COD->SetValue($this->DataSource->TotCAL_COD->GetValue());
                $this->TotDEF_FUG_AMB_PROD->SetValue($this->DataSource->TotDEF_FUG_AMB_PROD->GetValue());
                $this->TotInc_TiempoAsignacion->SetValue($this->DataSource->TotInc_TiempoAsignacion->GetValue());
                $this->TotInc_TiempoSolucion->SetValue($this->DataSource->TotInc_TiempoSolucion->GetValue());
                $this->CumplenREQ_SERV->SetValue($this->DataSource->CumplenREQ_SERV->GetValue());
                $this->CumplenCUMPL_REQ_FUNC->SetValue($this->DataSource->CumplenCUMPL_REQ_FUNC->GetValue());
                $this->CumplenCALIDAD_PROD_TERM->SetValue($this->DataSource->CumplenCALIDAD_PROD_TERM->GetValue());
                $this->CumplenRETR_ENTREGABLE->SetValue($this->DataSource->CumplenRETR_ENTREGABLE->GetValue());
                $this->CumplenCAL_COD->SetValue($this->DataSource->CumplenCAL_COD->GetValue());
                $this->CumplenDEF_FUG_AMB_PROD->SetValue($this->DataSource->CumplenDEF_FUG_AMB_PROD->GetValue());
                $this->CumplenInc_TiempoAsignacion->SetValue($this->DataSource->CumplenInc_TiempoAsignacion->GetValue());
                $this->CumplenInc_TiempoSolucion->SetValue($this->DataSource->CumplenInc_TiempoSolucion->GetValue());
                $this->HERR_EST_COST->SetValue($this->DataSource->HERR_EST_COST->GetValue());
                $this->REQ_SERV->SetValue($this->DataSource->REQ_SERV->GetValue());
                $this->CUMPL_REQ_FUNC->SetValue($this->DataSource->CUMPL_REQ_FUNC->GetValue());
                $this->CALIDAD_PROD_TERM->SetValue($this->DataSource->CALIDAD_PROD_TERM->GetValue());
                $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
                $this->CAL_COD->SetValue($this->DataSource->CAL_COD->GetValue());
                $this->DEF_FUG_AMB_PROD->SetValue($this->DataSource->DEF_FUG_AMB_PROD->GetValue());
                $this->Inc_TiempoAsignacion->SetValue($this->DataSource->Inc_TiempoAsignacion->GetValue());
                $this->Inc_TiempoSolucion->SetValue($this->DataSource->Inc_TiempoSolucion->GetValue());
                $this->CumplenEFIC_PRESUP->SetValue($this->DataSource->CumplenEFIC_PRESUP->GetValue());
                $this->TotEFIC_PRESUP->SetValue($this->DataSource->TotEFIC_PRESUP->GetValue());
                $this->EFIC_PRESUP->SetValue($this->DataSource->EFIC_PRESUP->GetValue());
                $this->CumplenHERR_EST_COST->SetValue($this->DataSource->CumplenHERR_EST_COST->GetValue());
                $this->TotHERR_EST_COST->SetValue($this->DataSource->TotHERR_EST_COST->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->descripcion->Show();
                $this->TotREQ_SERV->Show();
                $this->TotCUMPL_REQ_FUNC->Show();
                $this->TotCALIDAD_PROD_TERM->Show();
                $this->TotRETR_ENTREGABLE->Show();
                $this->TotCAL_COD->Show();
                $this->TotDEF_FUG_AMB_PROD->Show();
                $this->TotInc_TiempoAsignacion->Show();
                $this->TotInc_TiempoSolucion->Show();
                $this->CumplenREQ_SERV->Show();
                $this->CumplenCUMPL_REQ_FUNC->Show();
                $this->CumplenCALIDAD_PROD_TERM->Show();
                $this->CumplenRETR_ENTREGABLE->Show();
                $this->CumplenCAL_COD->Show();
                $this->CumplenDEF_FUG_AMB_PROD->Show();
                $this->CumplenInc_TiempoAsignacion->Show();
                $this->CumplenInc_TiempoSolucion->Show();
                $this->HERR_EST_COST->Show();
                $this->REQ_SERV->Show();
                $this->CUMPL_REQ_FUNC->Show();
                $this->CALIDAD_PROD_TERM->Show();
                $this->RETR_ENTREGABLE->Show();
                $this->CAL_COD->Show();
                $this->DEF_FUG_AMB_PROD->Show();
                $this->Inc_TiempoAsignacion->Show();
                $this->Inc_TiempoSolucion->Show();
                $this->Img_HERR_EST_COST->Show();
                $this->Img_REQ_SERV->Show();
                $this->Img_CUMPL_REQ_FUNC->Show();
                $this->Img_CALIDAD_PROD_TERM->Show();
                $this->Img_RETR_ENTREGABLE->Show();
                $this->Img_CAL_COD->Show();
                $this->Img_DEF_FUG_AMB_PROD->Show();
                $this->Img_Inc_TiempoAsignacion->Show();
                $this->Img_Inc_TiempoSolucion->Show();
                $this->CumplenEFIC_PRESUP->Show();
                $this->TotEFIC_PRESUP->Show();
                $this->EFIC_PRESUP->Show();
                $this->Img_EFIC_PRESUP->Show();
                $this->CumplenHERR_EST_COST->Show();
                $this->TotHERR_EST_COST->Show();
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
        $this->Sorter_TotCUMPL_REQ_FUNC->Show();
        $this->Sorter_TotCALIDAD_PROD_TERM->Show();
        $this->Sorter_TotRETR_ENTREGABLE->Show();
        $this->Sorter_TotCAL_COD->Show();
        $this->Sorter_TotDEF_FUG_AMB_PROD->Show();
        $this->Sorter_TotTiempoAsignacion->Show();
        $this->Sorter_TotTiempoSolucion->Show();
        $this->Navigator->Show();
        $this->Sorter_TotREQ_SERV->Show();
        $this->Sorter_TotHERR_EST_COST->Show();
        $this->Sorter_EFIC_PRES->Show();
        $this->Sorter_Orden->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-85550EC4
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotREQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotCUMPL_REQ_FUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotCALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotRETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotCAL_COD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotDEF_FUG_AMB_PROD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotInc_TiempoAsignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotInc_TiempoSolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumplenREQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumplenCUMPL_REQ_FUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumplenCALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumplenRETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumplenCAL_COD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumplenDEF_FUG_AMB_PROD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumplenInc_TiempoAsignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumplenInc_TiempoSolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUMPL_REQ_FUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CAL_COD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DEF_FUG_AMB_PROD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Inc_TiempoAsignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Inc_TiempoSolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_HERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_REQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_CUMPL_REQ_FUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_CALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_RETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_CAL_COD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_DEF_FUG_AMB_PROD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_Inc_TiempoAsignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_Inc_TiempoSolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumplenEFIC_PRESUP->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotEFIC_PRESUP->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EFIC_PRESUP->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Img_EFIC_PRESUP->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CumplenHERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotHERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdTableroSLAs Class @3-FCB6E20C

class clsgrdTableroSLAsDataSource extends clsDBcnDisenio {  //grdTableroSLAsDataSource Class @3-2E4EA7D1

//DataSource Variables @3-003219CC
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $descripcion;
    public $TotREQ_SERV;
    public $TotCUMPL_REQ_FUNC;
    public $TotCALIDAD_PROD_TERM;
    public $TotRETR_ENTREGABLE;
    public $TotCAL_COD;
    public $TotDEF_FUG_AMB_PROD;
    public $TotInc_TiempoAsignacion;
    public $TotInc_TiempoSolucion;
    public $CumplenREQ_SERV;
    public $CumplenCUMPL_REQ_FUNC;
    public $CumplenCALIDAD_PROD_TERM;
    public $CumplenRETR_ENTREGABLE;
    public $CumplenCAL_COD;
    public $CumplenDEF_FUG_AMB_PROD;
    public $CumplenInc_TiempoAsignacion;
    public $CumplenInc_TiempoSolucion;
    public $HERR_EST_COST;
    public $REQ_SERV;
    public $CUMPL_REQ_FUNC;
    public $CALIDAD_PROD_TERM;
    public $RETR_ENTREGABLE;
    public $CAL_COD;
    public $DEF_FUG_AMB_PROD;
    public $Inc_TiempoAsignacion;
    public $Inc_TiempoSolucion;
    public $CumplenEFIC_PRESUP;
    public $TotEFIC_PRESUP;
    public $EFIC_PRESUP;
    public $CumplenHERR_EST_COST;
    public $TotHERR_EST_COST;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-E32B61C3
    function clsgrdTableroSLAsDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdTableroSLAs";
        $this->Initialize();
        $this->descripcion = new clsField("descripcion", ccsText, "");
        
        $this->TotREQ_SERV = new clsField("TotREQ_SERV", ccsInteger, "");
        
        $this->TotCUMPL_REQ_FUNC = new clsField("TotCUMPL_REQ_FUNC", ccsInteger, "");
        
        $this->TotCALIDAD_PROD_TERM = new clsField("TotCALIDAD_PROD_TERM", ccsInteger, "");
        
        $this->TotRETR_ENTREGABLE = new clsField("TotRETR_ENTREGABLE", ccsInteger, "");
        
        $this->TotCAL_COD = new clsField("TotCAL_COD", ccsInteger, "");
        
        $this->TotDEF_FUG_AMB_PROD = new clsField("TotDEF_FUG_AMB_PROD", ccsInteger, "");
        
        $this->TotInc_TiempoAsignacion = new clsField("TotInc_TiempoAsignacion", ccsInteger, "");
        
        $this->TotInc_TiempoSolucion = new clsField("TotInc_TiempoSolucion", ccsInteger, "");
        
        $this->CumplenREQ_SERV = new clsField("CumplenREQ_SERV", ccsInteger, "");
        
        $this->CumplenCUMPL_REQ_FUNC = new clsField("CumplenCUMPL_REQ_FUNC", ccsInteger, "");
        
        $this->CumplenCALIDAD_PROD_TERM = new clsField("CumplenCALIDAD_PROD_TERM", ccsInteger, "");
        
        $this->CumplenRETR_ENTREGABLE = new clsField("CumplenRETR_ENTREGABLE", ccsInteger, "");
        
        $this->CumplenCAL_COD = new clsField("CumplenCAL_COD", ccsInteger, "");
        
        $this->CumplenDEF_FUG_AMB_PROD = new clsField("CumplenDEF_FUG_AMB_PROD", ccsInteger, "");
        
        $this->CumplenInc_TiempoAsignacion = new clsField("CumplenInc_TiempoAsignacion", ccsInteger, "");
        
        $this->CumplenInc_TiempoSolucion = new clsField("CumplenInc_TiempoSolucion", ccsInteger, "");
        
        $this->HERR_EST_COST = new clsField("HERR_EST_COST", ccsInteger, "");
        
        $this->REQ_SERV = new clsField("REQ_SERV", ccsInteger, "");
        
        $this->CUMPL_REQ_FUNC = new clsField("CUMPL_REQ_FUNC", ccsInteger, "");
        
        $this->CALIDAD_PROD_TERM = new clsField("CALIDAD_PROD_TERM", ccsInteger, "");
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsInteger, "");
        
        $this->CAL_COD = new clsField("CAL_COD", ccsInteger, "");
        
        $this->DEF_FUG_AMB_PROD = new clsField("DEF_FUG_AMB_PROD", ccsInteger, "");
        
        $this->Inc_TiempoAsignacion = new clsField("Inc_TiempoAsignacion", ccsInteger, "");
        
        $this->Inc_TiempoSolucion = new clsField("Inc_TiempoSolucion", ccsInteger, "");
        
        $this->CumplenEFIC_PRESUP = new clsField("CumplenEFIC_PRESUP", ccsInteger, "");
        
        $this->TotEFIC_PRESUP = new clsField("TotEFIC_PRESUP", ccsInteger, "");
        
        $this->EFIC_PRESUP = new clsField("EFIC_PRESUP", ccsInteger, "");
        
        $this->CumplenHERR_EST_COST = new clsField("CumplenHERR_EST_COST", ccsInteger, "");
        
        $this->TotHERR_EST_COST = new clsField("TotHERR_EST_COST", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-49D84467
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "sc.orden";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_TotCUMPL_REQ_FUNC" => array("TotCUMPL_REQ_FUNC", ""), 
            "Sorter_TotCALIDAD_PROD_TERM" => array("TotCALIDAD_PROD_TERM", ""), 
            "Sorter_TotRETR_ENTREGABLE" => array("TotRETR_ENTREGABLE", ""), 
            "Sorter_TotCAL_COD" => array("TotCAL_COD", ""), 
            "Sorter_TotDEF_FUG_AMB_PROD" => array("TotDEF_FUG_AMB_PROD", ""), 
            "Sorter_TotTiempoAsignacion" => array("TotTiempoAsignacion", ""), 
            "Sorter_TotTiempoSolucion" => array("TotTiempoSolucion", ""), 
            "Sorter_TotREQ_SERV" => array("TotREQ_SERV", ""), 
            "Sorter_TotHERR_EST_COST" => array("TotHERR_EST_COST", ""), 
            "Sorter_EFIC_PRES" => array("EFIC_PRESUP", ""), 
            "Sorter_Orden" => array("orden", "")));
    }
//End SetOrder Method

//Prepare Method @3-EFCE5614
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], date('m')-2, false);
        $this->wp->AddParameter("2", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], date('Y'), false);
        $this->wp->AddParameter("3", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
    }
//End Prepare Method

//Open Method @3-4AEAE7D5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select sc.IdOld, sc.orden,	sc.descripcion, mc.*\n" .
        " from mc_c_ServContractual sc left join (\n" .
        "select  \n" .
        "	 COUNT(HERR_EST_COST) TotHERR_EST_COST, SUM(cast(HERR_EST_COST as int)) CumplenHERR_EST_COST, SUM(cast(HERR_EST_COST as float))/COUNT(HERR_EST_COST)*100 HERR_EST_COST,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='HERR_EST_COST') as Meta_HERR_EST_COST,\n" .
        "	 COUNT(REQ_SERV) TotREQ_SERV, SUM(cast(REQ_SERV as int)) CumplenREQ_SERV, SUM(cast(REQ_SERV as float))/COUNT(REQ_SERV)*100 REQ_SERV,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='REQ_SERV') as Meta_REQ_SERV,\n" .
        "	 COUNT(CUMPL_REQ_FUNC) TotCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as int)) CumplenCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as float))/COUNT(CUMPL_REQ_FUNC)*100 CUMPL_REQ_FUNC,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='CUMPL_REQ_FUNC') as Meta_CUMPL_REQ_FUNC,\n" .
        "	 COUNT(CALIDAD_PROD_TERM) TotCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as int)) CumplenCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as float))/COUNT(CALIDAD_PROD_TERM)*100 CALIDAD_PROD_TERM,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='CALIDAD_PROD_TERM') as Meta_CALIDAD_PROD_TERM,\n" .
        "	 COUNT(RETR_ENTREGABLE) TotRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as int)) CumplenRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as float))/COUNT(RETR_ENTREGABLE)*100 RETR_ENTREGABLE,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='RETR_ENTREGABLE') as Meta_RETR_ENTREGABLE,\n" .
        "	 COUNT(COMPL_RUTA_CRITICA) TotCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as int)) CumplenCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as float))/COUNT(COMPL_RUTA_CRITICA)*100 COMPL_RUTA_CRITICA,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='COMPL_RUTA_CRITICA') as Meta_COMPL_RUTA_CRITICA,\n" .
        "	 COUNT(CAL_COD) TotCAL_COD, SUM(cast(CAL_COD as int)) CumplenCAL_COD, SUM(cast(CAL_COD as float))/COUNT(CAL_COD)*100 CAL_COD,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='EST_PROY') as Meta_EST_PROY,\n" .
        "	 COUNT(DEF_FUG_AMB_PROD) TotDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as int)) CumplenDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as float))/COUNT(DEF_FUG_AMB_PROD)*100  DEF_FUG_AMB_PROD,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='DEF_FUG_AMB_PROD') as Meta_DEF_FUG_AMB_PROD,\n" .
        "	 COUNT(Cumple_Inc_TiempoAsignacion) TotTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as int)) CumplenTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as float))/COUNT(Cumple_Inc_TiempoAsignacion)*100 Inc_TiempoAsignacion,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoSolucion') as Meta_Inc_TiempoSolucion,\n" .
        "	 COUNT(Cumple_Inc_TiempoSolucion) TotTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as int)) CumplenTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as float))/COUNT(Cumple_Inc_TiempoSolucion)*100 Inc_TiempoSolucion,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoAsignacion') as Meta_Inc_TiempoAsignacion,\n" .
        "	 COUNT(Cumple_DISP_SOPORTE) TotCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as int)) CumplenCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as float))/COUNT(Cumple_DISP_SOPORTE)*100 DISP_SOPORTE,\n" .
        "	(Select Meta from mc_c_metrica where acronimo='DISP_SOPORTE') as Meta_DISP_SOPORTE,\n" .
        "	AVG(Cumple_EF) Cumple_EF, AVG(total_ef) Total_ef, avg(cast(Cumple_EF as float))/avg(total_ef)*100  EFIC_PRESUP,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as Meta_EFIC_PRESUP,\n" .
        "	 sc.Id   id_servicio_cont \n" .
        "from mc_c_ServContractual sc left join mc_calificacion_rs_MC m on sc.Id = m.id_servicio_cont \n" .
        "and m.id_ppmc not in (select numero from mc_universo_cds where SLO=1  )\n" .
        "and m.IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	 left join	(select Cumple_DISP_SOPORTE, Cumple_Inc_TiempoAsignacion, Cumple_Inc_TiempoSolucion, MesReporte , AnioReporte ,  \n" .
        "				id_proveedor, 5 IdServicioCont \n" .
        "				from mc_calificacion_incidentes_MC\n" .
        "				where (id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")  and MesReporte=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and AnioReporte =" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "				)  mi on  mi.IdServicioCont= sc.Id \n" .
        "left join  (select SUM(CumpleSLA) Cumple_EF, COUNT(CumpleSLA) Total_EF, Id_Proveedor, MesReporte , anioreporte , 2 IdServicioCont  \n" .
        "			from mc_eficiencia_presupuestal  where CumpleSLA in (1,0)  \n" .
        "			and (([GrupoAplicativos] not like 'Todos%' and (4<>4 or (MesReporte>2 and anioreporte >2013)) ) \n" .
        "					or (4=4 and MesReporte<=2 and anioreporte <2014 ) or 0=4)\n" .
        "			group by Id_Proveedor, MesReporte , anioreporte  ) ef \n" .
        "			on ef.Id_Proveedor  = m.id_proveedor  and m.MesReporte  = ef.MesReporte and m.AnioReporte  = ef.anioreporte  \n" .
        "				and ef.IdServicioCont= sc.Id \n" .
        "where (m.mesreporte = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or mi.MesReporte = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ") \n" .
        "			and (m.anioreporte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "  or mi.AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ") \n" .
        "			and (m.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or mi.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or  " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "group by sc.id\n" .
        ") as mc on sc.id = mc.id_servicio_cont \n" .
        "where sc.Aplica ='CDS') cnt";
        $this->SQL = "select TOP {SqlParam_endRecord} sc.IdOld, sc.orden,	sc.descripcion, mc.*\n" .
        " from mc_c_ServContractual sc left join (\n" .
        "select  \n" .
        "	 COUNT(HERR_EST_COST) TotHERR_EST_COST, SUM(cast(HERR_EST_COST as int)) CumplenHERR_EST_COST, SUM(cast(HERR_EST_COST as float))/COUNT(HERR_EST_COST)*100 HERR_EST_COST,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='HERR_EST_COST') as Meta_HERR_EST_COST,\n" .
        "	 COUNT(REQ_SERV) TotREQ_SERV, SUM(cast(REQ_SERV as int)) CumplenREQ_SERV, SUM(cast(REQ_SERV as float))/COUNT(REQ_SERV)*100 REQ_SERV,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='REQ_SERV') as Meta_REQ_SERV,\n" .
        "	 COUNT(CUMPL_REQ_FUNC) TotCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as int)) CumplenCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as float))/COUNT(CUMPL_REQ_FUNC)*100 CUMPL_REQ_FUNC,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='CUMPL_REQ_FUNC') as Meta_CUMPL_REQ_FUNC,\n" .
        "	 COUNT(CALIDAD_PROD_TERM) TotCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as int)) CumplenCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as float))/COUNT(CALIDAD_PROD_TERM)*100 CALIDAD_PROD_TERM,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='CALIDAD_PROD_TERM') as Meta_CALIDAD_PROD_TERM,\n" .
        "	 COUNT(RETR_ENTREGABLE) TotRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as int)) CumplenRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as float))/COUNT(RETR_ENTREGABLE)*100 RETR_ENTREGABLE,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='RETR_ENTREGABLE') as Meta_RETR_ENTREGABLE,\n" .
        "	 COUNT(COMPL_RUTA_CRITICA) TotCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as int)) CumplenCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as float))/COUNT(COMPL_RUTA_CRITICA)*100 COMPL_RUTA_CRITICA,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='COMPL_RUTA_CRITICA') as Meta_COMPL_RUTA_CRITICA,\n" .
        "	 COUNT(CAL_COD) TotCAL_COD, SUM(cast(CAL_COD as int)) CumplenCAL_COD, SUM(cast(CAL_COD as float))/COUNT(CAL_COD)*100 CAL_COD,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='EST_PROY') as Meta_EST_PROY,\n" .
        "	 COUNT(DEF_FUG_AMB_PROD) TotDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as int)) CumplenDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as float))/COUNT(DEF_FUG_AMB_PROD)*100  DEF_FUG_AMB_PROD,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='DEF_FUG_AMB_PROD') as Meta_DEF_FUG_AMB_PROD,\n" .
        "	 COUNT(Cumple_Inc_TiempoAsignacion) TotTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as int)) CumplenTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as float))/COUNT(Cumple_Inc_TiempoAsignacion)*100 Inc_TiempoAsignacion,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoSolucion') as Meta_Inc_TiempoSolucion,\n" .
        "	 COUNT(Cumple_Inc_TiempoSolucion) TotTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as int)) CumplenTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as float))/COUNT(Cumple_Inc_TiempoSolucion)*100 Inc_TiempoSolucion,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoAsignacion') as Meta_Inc_TiempoAsignacion,\n" .
        "	 COUNT(Cumple_DISP_SOPORTE) TotCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as int)) CumplenCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as float))/COUNT(Cumple_DISP_SOPORTE)*100 DISP_SOPORTE,\n" .
        "	(Select Meta from mc_c_metrica where acronimo='DISP_SOPORTE') as Meta_DISP_SOPORTE,\n" .
        "	AVG(Cumple_EF) Cumple_EF, AVG(total_ef) Total_ef, avg(cast(Cumple_EF as float))/avg(total_ef)*100  EFIC_PRESUP,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as Meta_EFIC_PRESUP,\n" .
        "	 sc.Id   id_servicio_cont \n" .
        "from mc_c_ServContractual sc left join mc_calificacion_rs_MC m on sc.Id = m.id_servicio_cont \n" .
        "and m.id_ppmc not in (select numero from mc_universo_cds where SLO=1  )\n" .
        "and m.IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	 left join	(select Cumple_DISP_SOPORTE, Cumple_Inc_TiempoAsignacion, Cumple_Inc_TiempoSolucion, MesReporte , AnioReporte ,  \n" .
        "				id_proveedor, 5 IdServicioCont \n" .
        "				from mc_calificacion_incidentes_MC\n" .
        "				where (id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")  and MesReporte=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and AnioReporte =" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "				)  mi on  mi.IdServicioCont= sc.Id \n" .
        "left join  (select SUM(CumpleSLA) Cumple_EF, COUNT(CumpleSLA) Total_EF, Id_Proveedor, MesReporte , anioreporte , 2 IdServicioCont  \n" .
        "			from mc_eficiencia_presupuestal  where CumpleSLA in (1,0)  \n" .
        "			and (([GrupoAplicativos] not like 'Todos%' and (4<>4 or (MesReporte>2 and anioreporte >2013)) ) \n" .
        "					or (4=4 and MesReporte<=2 and anioreporte <2014 ) or 0=4)\n" .
        "			group by Id_Proveedor, MesReporte , anioreporte  ) ef \n" .
        "			on ef.Id_Proveedor  = m.id_proveedor  and m.MesReporte  = ef.MesReporte and m.AnioReporte  = ef.anioreporte  \n" .
        "				and ef.IdServicioCont= sc.Id \n" .
        "where (m.mesreporte = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or mi.MesReporte = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . ") \n" .
        "			and (m.anioreporte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "  or mi.AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ") \n" .
        "			and (m.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or mi.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or  " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "group by sc.id\n" .
        ") as mc on sc.id = mc.id_servicio_cont \n" .
        "where sc.Aplica ='CDS' {SQL_OrderBy}";
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

//SetValues Method @3-55F4477E
    function SetValues()
    {
        $this->descripcion->SetDBValue($this->f("descripcion"));
        $this->TotREQ_SERV->SetDBValue(trim($this->f("TotREQ_SERV")));
        $this->TotCUMPL_REQ_FUNC->SetDBValue(trim($this->f("TotCUMPL_REQ_FUNC")));
        $this->TotCALIDAD_PROD_TERM->SetDBValue(trim($this->f("TotCALIDAD_PROD_TERM")));
        $this->TotRETR_ENTREGABLE->SetDBValue(trim($this->f("TotRETR_ENTREGABLE")));
        $this->TotCAL_COD->SetDBValue(trim($this->f("TotCAL_COD")));
        $this->TotDEF_FUG_AMB_PROD->SetDBValue(trim($this->f("TotDEF_FUG_AMB_PROD")));
        $this->TotInc_TiempoAsignacion->SetDBValue(trim($this->f("TotTiempoAsignacion")));
        $this->TotInc_TiempoSolucion->SetDBValue(trim($this->f("TotTiempoSolucion")));
        $this->CumplenREQ_SERV->SetDBValue(trim($this->f("CumplenREQ_SERV")));
        $this->CumplenCUMPL_REQ_FUNC->SetDBValue(trim($this->f("CumplenCUMPL_REQ_FUNC")));
        $this->CumplenCALIDAD_PROD_TERM->SetDBValue(trim($this->f("CumplenCALIDAD_PROD_TERM")));
        $this->CumplenRETR_ENTREGABLE->SetDBValue(trim($this->f("CumplenRETR_ENTREGABLE")));
        $this->CumplenCAL_COD->SetDBValue(trim($this->f("CumplenCAL_COD")));
        $this->CumplenDEF_FUG_AMB_PROD->SetDBValue(trim($this->f("CumplenDEF_FUG_AMB_PROD")));
        $this->CumplenInc_TiempoAsignacion->SetDBValue(trim($this->f("CumplenTiempoAsignacion")));
        $this->CumplenInc_TiempoSolucion->SetDBValue(trim($this->f("CumplenTiempoSolucion")));
        $this->HERR_EST_COST->SetDBValue(trim($this->f("HERR_EST_COST")));
        $this->REQ_SERV->SetDBValue(trim($this->f("REQ_SERV")));
        $this->CUMPL_REQ_FUNC->SetDBValue(trim($this->f("CUMPL_REQ_FUNC")));
        $this->CALIDAD_PROD_TERM->SetDBValue(trim($this->f("CALIDAD_PROD_TERM")));
        $this->RETR_ENTREGABLE->SetDBValue(trim($this->f("RETR_ENTREGABLE")));
        $this->CAL_COD->SetDBValue(trim($this->f("CAL_COD")));
        $this->DEF_FUG_AMB_PROD->SetDBValue(trim($this->f("DEF_FUG_AMB_PROD")));
        $this->Inc_TiempoAsignacion->SetDBValue(trim($this->f("Inc_TiempoAsignacion")));
        $this->Inc_TiempoSolucion->SetDBValue(trim($this->f("Inc_TiempoSolucion")));
        $this->CumplenEFIC_PRESUP->SetDBValue(trim($this->f("Cumple_EF")));
        $this->TotEFIC_PRESUP->SetDBValue(trim($this->f("Total_ef")));
        $this->EFIC_PRESUP->SetDBValue(trim($this->f("EFIC_PRESUP")));
        $this->CumplenHERR_EST_COST->SetDBValue(trim($this->f("CumplenHERR_EST_COST")));
        $this->TotHERR_EST_COST->SetDBValue(trim($this->f("TotHERR_EST_COST")));
    }
//End SetValues Method

} //End grdTableroSLAsDataSource Class @3-FCB6E20C

//Include Page implementation @121-1C97D460
include_once(RelativePath . "/MenuTablero.php");
//End Include Page implementation



class clsGridgrdSLAsCAPC { //grdSLAsCAPC class @213-E36FD0EE

//Variables @213-EE844A86

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
    public $Sorter_Descripcion;
    public $Sorter_CALIDAD_PROD_TERM;
    public $Sorter_ReportesCompletos;
    public $Sorter_SLAsNoReportados;
    public $Sorter_DEDUC_OMISION;
    public $Sorter_UnidadesActuales;
    public $Sorter_UnidadesAnteriores;
    public $Sorter_EFIC_PRESUP;
    public $Sorter_DiasPlaneados;
    public $Sorter_DiasReales;
    public $Sorter_RETR_ENTREGABLE;
    public $Sorter_pctcalidad;
//End Variables

//Class_Initialize Event @213-0D5D74A6
    function clsGridgrdSLAsCAPC($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdSLAsCAPC";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdSLAsCAPC";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdSLAsCAPCDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("grdSLAsCAPCOrder", "");
        $this->SorterDirection = CCGetParam("grdSLAsCAPCDir", "");

        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", ccsGet, NULL), $this);
        $this->ReportesCompletos = new clsControl(ccsLabel, "ReportesCompletos", "ReportesCompletos", ccsText, "", CCGetRequestParam("ReportesCompletos", ccsGet, NULL), $this);
        $this->SLAsNoReportados = new clsControl(ccsLabel, "SLAsNoReportados", "SLAsNoReportados", ccsText, "", CCGetRequestParam("SLAsNoReportados", ccsGet, NULL), $this);
        $this->DEDUC_OMISION = new clsControl(ccsLabel, "DEDUC_OMISION", "DEDUC_OMISION", ccsText, "", CCGetRequestParam("DEDUC_OMISION", ccsGet, NULL), $this);
        $this->UnidadesActuales = new clsControl(ccsLabel, "UnidadesActuales", "UnidadesActuales", ccsText, "", CCGetRequestParam("UnidadesActuales", ccsGet, NULL), $this);
        $this->UnidadesAnteriores = new clsControl(ccsLabel, "UnidadesAnteriores", "UnidadesAnteriores", ccsText, "", CCGetRequestParam("UnidadesAnteriores", ccsGet, NULL), $this);
        $this->DiasPlaneados = new clsControl(ccsLabel, "DiasPlaneados", "DiasPlaneados", ccsText, "", CCGetRequestParam("DiasPlaneados", ccsGet, NULL), $this);
        $this->DiasReales = new clsControl(ccsLabel, "DiasReales", "DiasReales", ccsText, "", CCGetRequestParam("DiasReales", ccsGet, NULL), $this);
        $this->RETR_ENTREGABLE = new clsControl(ccsLabel, "RETR_ENTREGABLE", "RETR_ENTREGABLE", ccsText, "", CCGetRequestParam("RETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->pctcalidad = new clsControl(ccsLabel, "pctcalidad", "pctcalidad", ccsText, "", CCGetRequestParam("pctcalidad", ccsGet, NULL), $this);
        $this->imgCALIDAD_PROD_TERM = new clsControl(ccsImage, "imgCALIDAD_PROD_TERM", "imgCALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("imgCALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->imgDEDUC_OMISION = new clsControl(ccsImage, "imgDEDUC_OMISION", "imgDEDUC_OMISION", ccsText, "", CCGetRequestParam("imgDEDUC_OMISION", ccsGet, NULL), $this);
        $this->Label2 = new clsControl(ccsLabel, "Label2", "Label2", ccsText, "", CCGetRequestParam("Label2", ccsGet, NULL), $this);
        $this->imgEFIC_PRESUP = new clsControl(ccsImage, "imgEFIC_PRESUP", "imgEFIC_PRESUP", ccsText, "", CCGetRequestParam("imgEFIC_PRESUP", ccsGet, NULL), $this);
        $this->imgRETR_ENTREGABLE = new clsControl(ccsImage, "imgRETR_ENTREGABLE", "imgRETR_ENTREGABLE", ccsText, "", CCGetRequestParam("imgRETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->agrupador = new clsControl(ccsLabel, "agrupador", "agrupador", ccsText, "", CCGetRequestParam("agrupador", ccsGet, NULL), $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_CALIDAD_PROD_TERM = new clsSorter($this->ComponentName, "Sorter_CALIDAD_PROD_TERM", $FileName, $this);
        $this->Sorter_ReportesCompletos = new clsSorter($this->ComponentName, "Sorter_ReportesCompletos", $FileName, $this);
        $this->Sorter_SLAsNoReportados = new clsSorter($this->ComponentName, "Sorter_SLAsNoReportados", $FileName, $this);
        $this->Sorter_DEDUC_OMISION = new clsSorter($this->ComponentName, "Sorter_DEDUC_OMISION", $FileName, $this);
        $this->Sorter_UnidadesActuales = new clsSorter($this->ComponentName, "Sorter_UnidadesActuales", $FileName, $this);
        $this->Sorter_UnidadesAnteriores = new clsSorter($this->ComponentName, "Sorter_UnidadesAnteriores", $FileName, $this);
        $this->Sorter_EFIC_PRESUP = new clsSorter($this->ComponentName, "Sorter_EFIC_PRESUP", $FileName, $this);
        $this->Sorter_DiasPlaneados = new clsSorter($this->ComponentName, "Sorter_DiasPlaneados", $FileName, $this);
        $this->Sorter_DiasReales = new clsSorter($this->ComponentName, "Sorter_DiasReales", $FileName, $this);
        $this->Sorter_RETR_ENTREGABLE = new clsSorter($this->ComponentName, "Sorter_RETR_ENTREGABLE", $FileName, $this);
        $this->Sorter_pctcalidad = new clsSorter($this->ComponentName, "Sorter_pctcalidad", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @213-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @213-72360520
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_MesReporte"] = CCGetFromGet("s_MesReporte", NULL);
        $this->DataSource->Parameters["urls_AnioReporte"] = CCGetFromGet("s_AnioReporte", NULL);

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
            $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
            $this->ControlsVisible["ReportesCompletos"] = $this->ReportesCompletos->Visible;
            $this->ControlsVisible["SLAsNoReportados"] = $this->SLAsNoReportados->Visible;
            $this->ControlsVisible["DEDUC_OMISION"] = $this->DEDUC_OMISION->Visible;
            $this->ControlsVisible["UnidadesActuales"] = $this->UnidadesActuales->Visible;
            $this->ControlsVisible["UnidadesAnteriores"] = $this->UnidadesAnteriores->Visible;
            $this->ControlsVisible["DiasPlaneados"] = $this->DiasPlaneados->Visible;
            $this->ControlsVisible["DiasReales"] = $this->DiasReales->Visible;
            $this->ControlsVisible["RETR_ENTREGABLE"] = $this->RETR_ENTREGABLE->Visible;
            $this->ControlsVisible["pctcalidad"] = $this->pctcalidad->Visible;
            $this->ControlsVisible["imgCALIDAD_PROD_TERM"] = $this->imgCALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["imgDEDUC_OMISION"] = $this->imgDEDUC_OMISION->Visible;
            $this->ControlsVisible["Label2"] = $this->Label2->Visible;
            $this->ControlsVisible["imgEFIC_PRESUP"] = $this->imgEFIC_PRESUP->Visible;
            $this->ControlsVisible["imgRETR_ENTREGABLE"] = $this->imgRETR_ENTREGABLE->Visible;
            $this->ControlsVisible["agrupador"] = $this->agrupador->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                $this->ReportesCompletos->SetValue($this->DataSource->ReportesCompletos->GetValue());
                $this->SLAsNoReportados->SetValue($this->DataSource->SLAsNoReportados->GetValue());
                $this->DEDUC_OMISION->SetValue($this->DataSource->DEDUC_OMISION->GetValue());
                $this->UnidadesActuales->SetValue($this->DataSource->UnidadesActuales->GetValue());
                $this->UnidadesAnteriores->SetValue($this->DataSource->UnidadesAnteriores->GetValue());
                $this->DiasPlaneados->SetValue($this->DataSource->DiasPlaneados->GetValue());
                $this->DiasReales->SetValue($this->DataSource->DiasReales->GetValue());
                $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
                $this->pctcalidad->SetValue($this->DataSource->pctcalidad->GetValue());
                $this->agrupador->SetValue($this->DataSource->agrupador->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Descripcion->Show();
                $this->ReportesCompletos->Show();
                $this->SLAsNoReportados->Show();
                $this->DEDUC_OMISION->Show();
                $this->UnidadesActuales->Show();
                $this->UnidadesAnteriores->Show();
                $this->DiasPlaneados->Show();
                $this->DiasReales->Show();
                $this->RETR_ENTREGABLE->Show();
                $this->pctcalidad->Show();
                $this->imgCALIDAD_PROD_TERM->Show();
                $this->imgDEDUC_OMISION->Show();
                $this->Label2->Show();
                $this->imgEFIC_PRESUP->Show();
                $this->imgRETR_ENTREGABLE->Show();
                $this->agrupador->Show();
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
        $this->Sorter_Descripcion->Show();
        $this->Sorter_CALIDAD_PROD_TERM->Show();
        $this->Sorter_ReportesCompletos->Show();
        $this->Sorter_SLAsNoReportados->Show();
        $this->Sorter_DEDUC_OMISION->Show();
        $this->Sorter_UnidadesActuales->Show();
        $this->Sorter_UnidadesAnteriores->Show();
        $this->Sorter_EFIC_PRESUP->Show();
        $this->Sorter_DiasPlaneados->Show();
        $this->Sorter_DiasReales->Show();
        $this->Sorter_RETR_ENTREGABLE->Show();
        $this->Sorter_pctcalidad->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @213-C422ED3E
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportesCompletos->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SLAsNoReportados->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DEDUC_OMISION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UnidadesActuales->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UnidadesAnteriores->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DiasPlaneados->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DiasReales->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->pctcalidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgDEDUC_OMISION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Label2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgEFIC_PRESUP->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgRETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->agrupador->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdSLAsCAPC Class @213-FCB6E20C

class clsgrdSLAsCAPCDataSource extends clsDBcnDisenio {  //grdSLAsCAPCDataSource Class @213-65A90E3B

//DataSource Variables @213-DC55EEB5
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Descripcion;
    public $ReportesCompletos;
    public $SLAsNoReportados;
    public $DEDUC_OMISION;
    public $UnidadesActuales;
    public $UnidadesAnteriores;
    public $DiasPlaneados;
    public $DiasReales;
    public $RETR_ENTREGABLE;
    public $pctcalidad;
    public $agrupador;
//End DataSource Variables

//DataSourceClass_Initialize Event @213-6ADF2B11
    function clsgrdSLAsCAPCDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdSLAsCAPC";
        $this->Initialize();
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->ReportesCompletos = new clsField("ReportesCompletos", ccsText, "");
        
        $this->SLAsNoReportados = new clsField("SLAsNoReportados", ccsText, "");
        
        $this->DEDUC_OMISION = new clsField("DEDUC_OMISION", ccsText, "");
        
        $this->UnidadesActuales = new clsField("UnidadesActuales", ccsText, "");
        
        $this->UnidadesAnteriores = new clsField("UnidadesAnteriores", ccsText, "");
        
        $this->DiasPlaneados = new clsField("DiasPlaneados", ccsText, "");
        
        $this->DiasReales = new clsField("DiasReales", ccsText, "");
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsText, "");
        
        $this->pctcalidad = new clsField("pctcalidad", ccsText, "");
        
        $this->agrupador = new clsField("agrupador", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @213-B609F886
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Descripcion" => array("Descripcion", ""), 
            "Sorter_CALIDAD_PROD_TERM" => array("CALIDAD_PROD_TERM", ""), 
            "Sorter_ReportesCompletos" => array("ReportesCompletos", ""), 
            "Sorter_SLAsNoReportados" => array("SLAsNoReportados", ""), 
            "Sorter_DEDUC_OMISION" => array("DEDUC_OMISION", ""), 
            "Sorter_UnidadesActuales" => array("UnidadesActuales", ""), 
            "Sorter_UnidadesAnteriores" => array("UnidadesAnteriores", ""), 
            "Sorter_EFIC_PRESUP" => array("EFIC_PRESUP", ""), 
            "Sorter_DiasPlaneados" => array("DiasPlaneados", ""), 
            "Sorter_DiasReales" => array("DiasReales", ""), 
            "Sorter_RETR_ENTREGABLE" => array("RETR_ENTREGABLE", ""), 
            "Sorter_pctcalidad" => array("pctcalidad", "")));
    }
//End SetOrder Method

//Prepare Method @213-D189120C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], 0, false);
        $this->wp->AddParameter("2", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], 0, false);
    }
//End Prepare Method

//Open Method @213-76BAEB41
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select \n" .
        "	c.agrupador ,\n" .
        "	v.Descripcion , \n" .
        "	max(c.Deductiva) Deductiva,\n" .
        "	max(cast(c.CALIDAD_PROD_TERM as int)) CALIDAD_PROD_TERM ,\n" .
        "	sum(c.ReportesCompletos) ReportesCompletos,\n" .
        "	sum(c.SLAsNoReportados) SLAsNoReportados,\n" .
        "	max(cast(c.DEDUC_OMISION as int)) DEDUC_OMISION,\n" .
        "	sum(cast(c.UnidadesActuales as float)) UnidadesActuales,\n" .
        "	sum(cast(c.UnidadesAnteriores as float)) UnidadesAnteriores,  \n" .
        "	max(cast(c.EFIC_PRESUP as int)) EFIC_PRESUP,\n" .
        "	AVG(cast(c.DiasPlaneados as int)) DiasPlaneados,\n" .
        "	AVG(cast(c.DiasReales as int)) DiasReales,\n" .
        "	max(cast(c.RETR_ENTREGABLE as int)) RETR_ENTREGABLE,\n" .
        "	v.id IdServCont\n" .
        "	, avg(c.pctcalidad) pctcalidad\n" .
        "from dbo.mc_c_ServContractual v \n" .
        "     left join mc_calificacion_CAPC c \n" .
        "	on v.id = c.id_serviciocont and mes=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "where v.Aplica ='CAPC'\n" .
        "group by 	\n" .
        "	v.Descripcion ,\n" .
        "	v.id ,\n" .
        "c.agrupador) cnt";
        $this->SQL = "select \n" .
        "	c.agrupador ,\n" .
        "	v.Descripcion , \n" .
        "	max(c.Deductiva) Deductiva,\n" .
        "	max(cast(c.CALIDAD_PROD_TERM as int)) CALIDAD_PROD_TERM ,\n" .
        "	sum(c.ReportesCompletos) ReportesCompletos,\n" .
        "	sum(c.SLAsNoReportados) SLAsNoReportados,\n" .
        "	max(cast(c.DEDUC_OMISION as int)) DEDUC_OMISION,\n" .
        "	sum(cast(c.UnidadesActuales as float)) UnidadesActuales,\n" .
        "	sum(cast(c.UnidadesAnteriores as float)) UnidadesAnteriores,  \n" .
        "	max(cast(c.EFIC_PRESUP as int)) EFIC_PRESUP,\n" .
        "	AVG(cast(c.DiasPlaneados as int)) DiasPlaneados,\n" .
        "	AVG(cast(c.DiasReales as int)) DiasReales,\n" .
        "	max(cast(c.RETR_ENTREGABLE as int)) RETR_ENTREGABLE,\n" .
        "	v.id IdServCont\n" .
        "	, avg(c.pctcalidad) pctcalidad\n" .
        "from dbo.mc_c_ServContractual v \n" .
        "     left join mc_calificacion_CAPC c \n" .
        "	on v.id = c.id_serviciocont and mes=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "where v.Aplica ='CAPC'\n" .
        "group by 	\n" .
        "	v.Descripcion ,\n" .
        "	v.id ,\n" .
        "c.agrupador";
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

//SetValues Method @213-2DD178AE
    function SetValues()
    {
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->ReportesCompletos->SetDBValue($this->f("ReportesCompletos"));
        $this->SLAsNoReportados->SetDBValue($this->f("SLAsNoReportados"));
        $this->DEDUC_OMISION->SetDBValue($this->f("DEDUC_OMISION"));
        $this->UnidadesActuales->SetDBValue($this->f("UnidadesActuales"));
        $this->UnidadesAnteriores->SetDBValue($this->f("UnidadesAnteriores"));
        $this->DiasPlaneados->SetDBValue($this->f("DiasPlaneados"));
        $this->DiasReales->SetDBValue($this->f("DiasReales"));
        $this->RETR_ENTREGABLE->SetDBValue($this->f("RETR_ENTREGABLE"));
        $this->pctcalidad->SetDBValue($this->f("pctcalidad"));
        $this->agrupador->SetDBValue($this->f("agrupador"));
    }
//End SetValues Method

} //End grdSLAsCAPCDataSource Class @213-FCB6E20C





//Initialize Page @1-595F513A
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
$TemplateFileName = "TableroSLAsCDSs.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-4621CFB8
CCSecurityRedirect("2;3", "");
//End Authenticate User

//Include events file @1-038D90BB
include_once("./TableroSLAsCDSs_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-9AB1A9D5
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$Grid2 = new clsRecordGrid2("", $MainPage);
$grdTableroSLAs = new clsGridgrdTableroSLAs("", $MainPage);
$MenuTablero = new clsMenuTablero("", "MenuTablero", $MainPage);
$MenuTablero->Initialize();
$UrlCDS = new clsControl(ccsLink, "UrlCDS", "UrlCDS", ccsText, "", CCGetRequestParam("UrlCDS", ccsGet, NULL), $MainPage);
$UrlCDS->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$UrlCDS->Page = "";
$pnlSLAsCAPC = new clsPanel("pnlSLAsCAPC", $MainPage);
$grdSLAsCAPC = new clsGridgrdSLAsCAPC("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->Grid2 = & $Grid2;
$MainPage->grdTableroSLAs = & $grdTableroSLAs;
$MainPage->MenuTablero = & $MenuTablero;
$MainPage->UrlCDS = & $UrlCDS;
$MainPage->pnlSLAsCAPC = & $pnlSLAsCAPC;
$MainPage->grdSLAsCAPC = & $grdSLAsCAPC;
$pnlSLAsCAPC->AddComponent("grdSLAsCAPC", $grdSLAsCAPC);
$grdTableroSLAs->Initialize();
$grdSLAsCAPC->Initialize();
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

//Execute Components @1-9EFA395C
$MenuTablero->Operations();
$Grid2->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-50937D31
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($Grid2);
    unset($grdTableroSLAs);
    $MenuTablero->Class_Terminate();
    unset($MenuTablero);
    unset($grdSLAsCAPC);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2CAD3F10
$Header->Show();
$Grid2->Show();
$grdTableroSLAs->Show();
$MenuTablero->Show();
$UrlCDS->Show();
$pnlSLAsCAPC->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C118B8C7
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($Grid2);
unset($grdTableroSLAs);
$MenuTablero->Class_Terminate();
unset($MenuTablero);
unset($grdSLAsCAPC);
unset($Tpl);
//End Unload Page


?>
