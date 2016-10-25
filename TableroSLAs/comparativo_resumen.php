<?php
//Include Common Files @1-B883664D
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "comparativo_resumen.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordperiodos_carga { //periodos_carga Class @3-C6BD6D21

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

//Class_Initialize Event @3-5EAE6FA5
    function clsRecordperiodos_carga($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record periodos_carga/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "periodos_carga";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_id_periodo = new clsControl(ccsListBox, "s_id_periodo", "Id Periodo", ccsInteger, "", CCGetRequestParam("s_id_periodo", $Method, NULL), $this);
            $this->s_id_periodo->DSType = dsSQL;
            $this->s_id_periodo->DataSource = new clsDBcnDisenio();
            $this->s_id_periodo->ds = & $this->s_id_periodo->DataSource;
            list($this->s_id_periodo->BoundColumn, $this->s_id_periodo->TextColumn, $this->s_id_periodo->DBFormat) = array("id_periodo", "periodo", "");
            $this->s_id_periodo->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
            $this->s_id_periodo->DataSource->wp = new clsSQLParameters();
            $this->s_id_periodo->DataSource->wp->AddParameter("1", "urls_id_proveedor", ccsText, "", "", $this->s_id_periodo->DataSource->Parameters["urls_id_proveedor"], 2, false);
            $this->s_id_periodo->DataSource->SQL = "select distinct id_periodo,  periodo+tipo_periodo as periodo\n" .
            "from archivosxls.dbo.periodos_hist\n" .
            "where (id_proveedor=0 or id_proveedor=" . $this->s_id_periodo->DataSource->SQLValue($this->s_id_periodo->DataSource->wp->GetDBValue("1"), ccsText) . " or " . $this->s_id_periodo->DataSource->SQLValue($this->s_id_periodo->DataSource->wp->GetDBValue("1"), ccsText) . " =1)\n" .
            "and id_periodo > 30\n" .
            "and id_periodo  in (select distinct id_periodo from resumen_sat where id_proveedor=" . $this->s_id_periodo->DataSource->SQLValue($this->s_id_periodo->DataSource->wp->GetDBValue("1"), ccsText) . ")\n" .
            "\n" .
            "\n" .
            "";
            $this->s_id_periodo->DataSource->Order = "";
            $this->s_id_periodo->Required = true;
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsSQL;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->DataSource->SQL = "select id_proveedor, nombre from mc_c_proveedor where descripcion!='CAPC'";
            $this->s_id_proveedor->DataSource->Order = "";
            $this->s_id_proveedor->Required = true;
            $this->s_opt_slas = new clsControl(ccsListBox, "s_opt_slas", "s_opt_slas", ccsText, "", CCGetRequestParam("s_opt_slas", $Method, NULL), $this);
            $this->s_opt_slas->DSType = dsListOfValues;
            $this->s_opt_slas->Values = array(array("SLA", "SLA"), array("SLO", "SLO"));
            $this->s_opt_slas->Required = true;
            $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", $Method, NULL), $this);
            $this->Link1->Parameters = CCGetQueryString("QueryString", array("s_id_incidencia", "s_id_ppmc", "s_id_estimacion", "s_id_ppmc_cierre", "s_id_estimacion_cierre", "ccsForm"));
            $this->Link1->Page = "comparativo_resumen.php";
            $this->Link2 = new clsControl(ccsLink, "Link2", "Link2", ccsText, "", CCGetRequestParam("Link2", $Method, NULL), $this);
            $this->Link2->Parameters = CCGetQueryString("QueryString", array("s_id_incidencia", "s_id_ppmc", "s_id_estimacion", "s_id_ppmc_cierre", "s_id_estimacion_cierre", "ccsForm"));
            $this->Link2->Page = "comparativo_incidentes.php";
            $this->Link3 = new clsControl(ccsLink, "Link3", "Link3", ccsText, "", CCGetRequestParam("Link3", $Method, NULL), $this);
            $this->Link3->Parameters = CCGetQueryString("QueryString", array("s_id_incidencia", "s_id_ppmc", "s_id_estimacion", "s_id_ppmc_cierre", "s_id_estimacion_cierre", "ccsForm"));
            $this->Link3->Page = "comparativo_apertura.php";
            $this->Link4 = new clsControl(ccsLink, "Link4", "Link4", ccsText, "", CCGetRequestParam("Link4", $Method, NULL), $this);
            $this->Link4->Parameters = CCGetQueryString("QueryString", array("s_id_incidencia", "s_id_ppmc", "s_id_estimacion", "s_id_ppmc_cierre", "s_id_estimacion_cierre", "ccsForm"));
            $this->Link4->Page = "comparativo_cierre.php";
            $this->Label1 = new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_id_periodo->Value) && !strlen($this->s_id_periodo->Value) && $this->s_id_periodo->Value !== false)
                    $this->s_id_periodo->SetText(31);
                if(!is_array($this->s_id_proveedor->Value) && !strlen($this->s_id_proveedor->Value) && $this->s_id_proveedor->Value !== false)
                    $this->s_id_proveedor->SetText(2);
                if(!is_array($this->s_opt_slas->Value) && !strlen($this->s_opt_slas->Value) && $this->s_opt_slas->Value !== false)
                    $this->s_opt_slas->SetText('SLA');
            }
        }
    }
//End Class_Initialize Event

//Validate Method @3-C4E0290F
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_periodo->Validate() && $Validation);
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_opt_slas->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_periodo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_opt_slas->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-DF0950CD
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_periodo->Errors->Count());
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_opt_slas->Errors->Count());
        $errors = ($errors || $this->Link1->Errors->Count());
        $errors = ($errors || $this->Link2->Errors->Count());
        $errors = ($errors || $this->Link3->Errors->Count());
        $errors = ($errors || $this->Link4->Errors->Count());
        $errors = ($errors || $this->Label1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @3-DD94EE4C
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

//Show Method @3-4A21EC81
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

        $this->s_id_periodo->Prepare();
        $this->s_id_proveedor->Prepare();
        $this->s_opt_slas->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_periodo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_opt_slas->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Link4->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Label1->Errors->ToString());
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
        $this->s_id_periodo->Show();
        $this->s_id_proveedor->Show();
        $this->s_opt_slas->Show();
        $this->Link1->Show();
        $this->Link2->Show();
        $this->Link3->Show();
        $this->Link4->Show();
        $this->Label1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End periodos_carga Class @3-FCB6E20C

class clsGridGrid2 { //Grid2 class @24-C37AF6B1

//Variables @24-6E51DF5A

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

//Class_Initialize Event @24-294B990F
    function clsGridGrid2($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Grid2";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid Grid2";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsGrid2DataSource($this);
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

        $this->descripcion_sat = new clsControl(ccsLabel, "descripcion_sat", "descripcion_sat", ccsText, "", CCGetRequestParam("descripcion_sat", ccsGet, NULL), $this);
        $this->totherr_est_cost_sat = new clsControl(ccsLabel, "totherr_est_cost_sat", "totherr_est_cost_sat", ccsInteger, "", CCGetRequestParam("totherr_est_cost_sat", ccsGet, NULL), $this);
        $this->totherr_est_cost = new clsControl(ccsLabel, "totherr_est_cost", "totherr_est_cost", ccsInteger, "", CCGetRequestParam("totherr_est_cost", ccsGet, NULL), $this);
        $this->totreq_serv_sat = new clsControl(ccsLabel, "totreq_serv_sat", "totreq_serv_sat", ccsInteger, "", CCGetRequestParam("totreq_serv_sat", ccsGet, NULL), $this);
        $this->totreq_serv = new clsControl(ccsLabel, "totreq_serv", "totreq_serv", ccsInteger, "", CCGetRequestParam("totreq_serv", ccsGet, NULL), $this);
        $this->totcumpl_req_func_sat = new clsControl(ccsLabel, "totcumpl_req_func_sat", "totcumpl_req_func_sat", ccsInteger, "", CCGetRequestParam("totcumpl_req_func_sat", ccsGet, NULL), $this);
        $this->totcumpl_req_func = new clsControl(ccsLabel, "totcumpl_req_func", "totcumpl_req_func", ccsInteger, "", CCGetRequestParam("totcumpl_req_func", ccsGet, NULL), $this);
        $this->totcalidad_prod_term_sat = new clsControl(ccsLabel, "totcalidad_prod_term_sat", "totcalidad_prod_term_sat", ccsInteger, "", CCGetRequestParam("totcalidad_prod_term_sat", ccsGet, NULL), $this);
        $this->totcalidad_prod_term = new clsControl(ccsLabel, "totcalidad_prod_term", "totcalidad_prod_term", ccsInteger, "", CCGetRequestParam("totcalidad_prod_term", ccsGet, NULL), $this);
        $this->totretr_entregable_sat = new clsControl(ccsLabel, "totretr_entregable_sat", "totretr_entregable_sat", ccsInteger, "", CCGetRequestParam("totretr_entregable_sat", ccsGet, NULL), $this);
        $this->totretr_entregable = new clsControl(ccsLabel, "totretr_entregable", "totretr_entregable", ccsInteger, "", CCGetRequestParam("totretr_entregable", ccsGet, NULL), $this);
        $this->totcal_cod_sat = new clsControl(ccsLabel, "totcal_cod_sat", "totcal_cod_sat", ccsInteger, "", CCGetRequestParam("totcal_cod_sat", ccsGet, NULL), $this);
        $this->totcal_cod = new clsControl(ccsLabel, "totcal_cod", "totcal_cod", ccsInteger, "", CCGetRequestParam("totcal_cod", ccsGet, NULL), $this);
        $this->totdef_fug_amb_prod_sat = new clsControl(ccsLabel, "totdef_fug_amb_prod_sat", "totdef_fug_amb_prod_sat", ccsInteger, "", CCGetRequestParam("totdef_fug_amb_prod_sat", ccsGet, NULL), $this);
        $this->totdef_fug_amb_prod = new clsControl(ccsLabel, "totdef_fug_amb_prod", "totdef_fug_amb_prod", ccsInteger, "", CCGetRequestParam("totdef_fug_amb_prod", ccsGet, NULL), $this);
        $this->totinc_tiempoasignacion_sat = new clsControl(ccsLabel, "totinc_tiempoasignacion_sat", "totinc_tiempoasignacion_sat", ccsInteger, "", CCGetRequestParam("totinc_tiempoasignacion_sat", ccsGet, NULL), $this);
        $this->totinc_tiempoasignacion = new clsControl(ccsLabel, "totinc_tiempoasignacion", "totinc_tiempoasignacion", ccsInteger, "", CCGetRequestParam("totinc_tiempoasignacion", ccsGet, NULL), $this);
        $this->totinc_tiemposolucion_sat = new clsControl(ccsLabel, "totinc_tiemposolucion_sat", "totinc_tiemposolucion_sat", ccsInteger, "", CCGetRequestParam("totinc_tiemposolucion_sat", ccsGet, NULL), $this);
        $this->totinc_tiemposolucion = new clsControl(ccsLabel, "totinc_tiemposolucion", "totinc_tiemposolucion", ccsInteger, "", CCGetRequestParam("totinc_tiemposolucion", ccsGet, NULL), $this);
        $this->cumplenefic_presup_sat = new clsControl(ccsLabel, "cumplenefic_presup_sat", "cumplenefic_presup_sat", ccsInteger, "", CCGetRequestParam("cumplenefic_presup_sat", ccsGet, NULL), $this);
        $this->cumplenefic_presup = new clsControl(ccsLabel, "cumplenefic_presup", "cumplenefic_presup", ccsInteger, "", CCGetRequestParam("cumplenefic_presup", ccsGet, NULL), $this);
        $this->cumplenherr_est_cost_sat = new clsControl(ccsLabel, "cumplenherr_est_cost_sat", "cumplenherr_est_cost_sat", ccsInteger, "", CCGetRequestParam("cumplenherr_est_cost_sat", ccsGet, NULL), $this);
        $this->herr_est_cost_sat = new clsControl(ccsLabel, "herr_est_cost_sat", "herr_est_cost_sat", ccsFloat, "", CCGetRequestParam("herr_est_cost_sat", ccsGet, NULL), $this);
        $this->herr_est_cost_sat->HTML = true;
        $this->meta_herr_est_cost_sat = new clsControl(ccsHidden, "meta_herr_est_cost_sat", "meta_herr_est_cost_sat", ccsFloat, "", CCGetRequestParam("meta_herr_est_cost_sat", ccsGet, NULL), $this);
        $this->cumplenherr_est_cost = new clsControl(ccsLabel, "cumplenherr_est_cost", "cumplenherr_est_cost", ccsInteger, "", CCGetRequestParam("cumplenherr_est_cost", ccsGet, NULL), $this);
        $this->herr_est_cost = new clsControl(ccsLabel, "herr_est_cost", "herr_est_cost", ccsFloat, "", CCGetRequestParam("herr_est_cost", ccsGet, NULL), $this);
        $this->herr_est_cost->HTML = true;
        $this->meta_herr_est_cost = new clsControl(ccsHidden, "meta_herr_est_cost", "meta_herr_est_cost", ccsFloat, "", CCGetRequestParam("meta_herr_est_cost", ccsGet, NULL), $this);
        $this->cumplenreq_serv_sat = new clsControl(ccsLabel, "cumplenreq_serv_sat", "cumplenreq_serv_sat", ccsInteger, "", CCGetRequestParam("cumplenreq_serv_sat", ccsGet, NULL), $this);
        $this->req_serv_sat = new clsControl(ccsLabel, "req_serv_sat", "req_serv_sat", ccsFloat, "", CCGetRequestParam("req_serv_sat", ccsGet, NULL), $this);
        $this->req_serv_sat->HTML = true;
        $this->meta_req_serv_sat = new clsControl(ccsHidden, "meta_req_serv_sat", "meta_req_serv_sat", ccsFloat, "", CCGetRequestParam("meta_req_serv_sat", ccsGet, NULL), $this);
        $this->cumplenreq_serv = new clsControl(ccsLabel, "cumplenreq_serv", "cumplenreq_serv", ccsInteger, "", CCGetRequestParam("cumplenreq_serv", ccsGet, NULL), $this);
        $this->req_serv = new clsControl(ccsLabel, "req_serv", "req_serv", ccsFloat, "", CCGetRequestParam("req_serv", ccsGet, NULL), $this);
        $this->req_serv->HTML = true;
        $this->meta_req_serv = new clsControl(ccsHidden, "meta_req_serv", "meta_req_serv", ccsFloat, "", CCGetRequestParam("meta_req_serv", ccsGet, NULL), $this);
        $this->cumplencumpl_req_func_sat = new clsControl(ccsLabel, "cumplencumpl_req_func_sat", "cumplencumpl_req_func_sat", ccsInteger, "", CCGetRequestParam("cumplencumpl_req_func_sat", ccsGet, NULL), $this);
        $this->cumpl_req_func_sat = new clsControl(ccsLabel, "cumpl_req_func_sat", "cumpl_req_func_sat", ccsFloat, "", CCGetRequestParam("cumpl_req_func_sat", ccsGet, NULL), $this);
        $this->cumpl_req_func_sat->HTML = true;
        $this->meta_cumpl_req_func_sat = new clsControl(ccsHidden, "meta_cumpl_req_func_sat", "meta_cumpl_req_func_sat", ccsFloat, "", CCGetRequestParam("meta_cumpl_req_func_sat", ccsGet, NULL), $this);
        $this->cumplencumpl_req_func = new clsControl(ccsLabel, "cumplencumpl_req_func", "cumplencumpl_req_func", ccsInteger, "", CCGetRequestParam("cumplencumpl_req_func", ccsGet, NULL), $this);
        $this->cumpl_req_func = new clsControl(ccsLabel, "cumpl_req_func", "cumpl_req_func", ccsFloat, "", CCGetRequestParam("cumpl_req_func", ccsGet, NULL), $this);
        $this->cumpl_req_func->HTML = true;
        $this->meta_cumpl_req_func = new clsControl(ccsHidden, "meta_cumpl_req_func", "meta_cumpl_req_func", ccsFloat, "", CCGetRequestParam("meta_cumpl_req_func", ccsGet, NULL), $this);
        $this->cumplencalidad_prod_term_sat = new clsControl(ccsLabel, "cumplencalidad_prod_term_sat", "cumplencalidad_prod_term_sat", ccsInteger, "", CCGetRequestParam("cumplencalidad_prod_term_sat", ccsGet, NULL), $this);
        $this->calidad_prod_term_sat = new clsControl(ccsLabel, "calidad_prod_term_sat", "calidad_prod_term_sat", ccsFloat, "", CCGetRequestParam("calidad_prod_term_sat", ccsGet, NULL), $this);
        $this->calidad_prod_term_sat->HTML = true;
        $this->meta_calidad_prod_term_sat = new clsControl(ccsHidden, "meta_calidad_prod_term_sat", "meta_calidad_prod_term_sat", ccsFloat, "", CCGetRequestParam("meta_calidad_prod_term_sat", ccsGet, NULL), $this);
        $this->cumplencalidad_prod_term = new clsControl(ccsLabel, "cumplencalidad_prod_term", "cumplencalidad_prod_term", ccsInteger, "", CCGetRequestParam("cumplencalidad_prod_term", ccsGet, NULL), $this);
        $this->calidad_prod_term = new clsControl(ccsLabel, "calidad_prod_term", "calidad_prod_term", ccsFloat, "", CCGetRequestParam("calidad_prod_term", ccsGet, NULL), $this);
        $this->calidad_prod_term->HTML = true;
        $this->meta_calidad_prod_term = new clsControl(ccsHidden, "meta_calidad_prod_term", "meta_calidad_prod_term", ccsFloat, "", CCGetRequestParam("meta_calidad_prod_term", ccsGet, NULL), $this);
        $this->cumplenretr_entregable_sat = new clsControl(ccsLabel, "cumplenretr_entregable_sat", "cumplenretr_entregable_sat", ccsInteger, "", CCGetRequestParam("cumplenretr_entregable_sat", ccsGet, NULL), $this);
        $this->retr_entregable_sat = new clsControl(ccsLabel, "retr_entregable_sat", "retr_entregable_sat", ccsFloat, "", CCGetRequestParam("retr_entregable_sat", ccsGet, NULL), $this);
        $this->retr_entregable_sat->HTML = true;
        $this->meta_retr_entregable_sat = new clsControl(ccsHidden, "meta_retr_entregable_sat", "meta_retr_entregable_sat", ccsFloat, "", CCGetRequestParam("meta_retr_entregable_sat", ccsGet, NULL), $this);
        $this->cumplenretr_entregable = new clsControl(ccsLabel, "cumplenretr_entregable", "cumplenretr_entregable", ccsInteger, "", CCGetRequestParam("cumplenretr_entregable", ccsGet, NULL), $this);
        $this->retr_entregable = new clsControl(ccsLabel, "retr_entregable", "retr_entregable", ccsFloat, "", CCGetRequestParam("retr_entregable", ccsGet, NULL), $this);
        $this->retr_entregable->HTML = true;
        $this->meta_retr_entregable = new clsControl(ccsHidden, "meta_retr_entregable", "meta_retr_entregable", ccsFloat, "", CCGetRequestParam("meta_retr_entregable", ccsGet, NULL), $this);
        $this->cumplencal_cod_sat = new clsControl(ccsLabel, "cumplencal_cod_sat", "cumplencal_cod_sat", ccsInteger, "", CCGetRequestParam("cumplencal_cod_sat", ccsGet, NULL), $this);
        $this->cal_cod_sat = new clsControl(ccsLabel, "cal_cod_sat", "cal_cod_sat", ccsFloat, "", CCGetRequestParam("cal_cod_sat", ccsGet, NULL), $this);
        $this->cal_cod_sat->HTML = true;
        $this->meta_cal_cod_sat = new clsControl(ccsHidden, "meta_cal_cod_sat", "meta_cal_cod_sat", ccsFloat, "", CCGetRequestParam("meta_cal_cod_sat", ccsGet, NULL), $this);
        $this->cumplencal_cod = new clsControl(ccsLabel, "cumplencal_cod", "cumplencal_cod", ccsInteger, "", CCGetRequestParam("cumplencal_cod", ccsGet, NULL), $this);
        $this->cal_cod = new clsControl(ccsLabel, "cal_cod", "cal_cod", ccsFloat, "", CCGetRequestParam("cal_cod", ccsGet, NULL), $this);
        $this->cal_cod->HTML = true;
        $this->meta_cal_cod = new clsControl(ccsHidden, "meta_cal_cod", "meta_cal_cod", ccsFloat, "", CCGetRequestParam("meta_cal_cod", ccsGet, NULL), $this);
        $this->cumplendef_fug_amb_prod_sat = new clsControl(ccsLabel, "cumplendef_fug_amb_prod_sat", "cumplendef_fug_amb_prod_sat", ccsInteger, "", CCGetRequestParam("cumplendef_fug_amb_prod_sat", ccsGet, NULL), $this);
        $this->def_fug_amb_prod_sat = new clsControl(ccsLabel, "def_fug_amb_prod_sat", "def_fug_amb_prod_sat", ccsFloat, "", CCGetRequestParam("def_fug_amb_prod_sat", ccsGet, NULL), $this);
        $this->def_fug_amb_prod_sat->HTML = true;
        $this->meta_def_fug_amb_prod_sat = new clsControl(ccsHidden, "meta_def_fug_amb_prod_sat", "meta_def_fug_amb_prod_sat", ccsFloat, "", CCGetRequestParam("meta_def_fug_amb_prod_sat", ccsGet, NULL), $this);
        $this->cumplendef_fug_amb_prod = new clsControl(ccsLabel, "cumplendef_fug_amb_prod", "cumplendef_fug_amb_prod", ccsInteger, "", CCGetRequestParam("cumplendef_fug_amb_prod", ccsGet, NULL), $this);
        $this->def_fug_amb_prod = new clsControl(ccsLabel, "def_fug_amb_prod", "def_fug_amb_prod", ccsFloat, "", CCGetRequestParam("def_fug_amb_prod", ccsGet, NULL), $this);
        $this->def_fug_amb_prod->HTML = true;
        $this->meta_def_fug_amb_prod = new clsControl(ccsHidden, "meta_def_fug_amb_prod", "meta_def_fug_amb_prod", ccsFloat, "", CCGetRequestParam("meta_def_fug_amb_prod", ccsGet, NULL), $this);
        $this->cumpleninc_tiempoasignacion_sat = new clsControl(ccsLabel, "cumpleninc_tiempoasignacion_sat", "cumpleninc_tiempoasignacion_sat", ccsInteger, "", CCGetRequestParam("cumpleninc_tiempoasignacion_sat", ccsGet, NULL), $this);
        $this->inc_tiempoasignacion_sat = new clsControl(ccsLabel, "inc_tiempoasignacion_sat", "inc_tiempoasignacion_sat", ccsFloat, "", CCGetRequestParam("inc_tiempoasignacion_sat", ccsGet, NULL), $this);
        $this->inc_tiempoasignacion_sat->HTML = true;
        $this->meta_inc_tiempoasignacion_sat = new clsControl(ccsHidden, "meta_inc_tiempoasignacion_sat", "meta_inc_tiempoasignacion_sat", ccsFloat, "", CCGetRequestParam("meta_inc_tiempoasignacion_sat", ccsGet, NULL), $this);
        $this->cumpleninc_tiempoasignacion = new clsControl(ccsLabel, "cumpleninc_tiempoasignacion", "cumpleninc_tiempoasignacion", ccsInteger, "", CCGetRequestParam("cumpleninc_tiempoasignacion", ccsGet, NULL), $this);
        $this->inc_tiempoasignacion = new clsControl(ccsLabel, "inc_tiempoasignacion", "inc_tiempoasignacion", ccsFloat, "", CCGetRequestParam("inc_tiempoasignacion", ccsGet, NULL), $this);
        $this->inc_tiempoasignacion->HTML = true;
        $this->cumpleninc_tiemposolucion_sat = new clsControl(ccsLabel, "cumpleninc_tiemposolucion_sat", "cumpleninc_tiemposolucion_sat", ccsInteger, "", CCGetRequestParam("cumpleninc_tiemposolucion_sat", ccsGet, NULL), $this);
        $this->inc_tiemposolucion_sat = new clsControl(ccsLabel, "inc_tiemposolucion_sat", "inc_tiemposolucion_sat", ccsFloat, "", CCGetRequestParam("inc_tiemposolucion_sat", ccsGet, NULL), $this);
        $this->inc_tiemposolucion_sat->HTML = true;
        $this->meta_inc_tiemposolucion_sat = new clsControl(ccsHidden, "meta_inc_tiemposolucion_sat", "meta_inc_tiemposolucion_sat", ccsFloat, "", CCGetRequestParam("meta_inc_tiemposolucion_sat", ccsGet, NULL), $this);
        $this->cumpleninc_tiemposolucion = new clsControl(ccsLabel, "cumpleninc_tiemposolucion", "cumpleninc_tiemposolucion", ccsInteger, "", CCGetRequestParam("cumpleninc_tiemposolucion", ccsGet, NULL), $this);
        $this->inc_tiemposolucion = new clsControl(ccsLabel, "inc_tiemposolucion", "inc_tiemposolucion", ccsFloat, "", CCGetRequestParam("inc_tiemposolucion", ccsGet, NULL), $this);
        $this->inc_tiemposolucion->HTML = true;
        $this->totefic_presup_sat = new clsControl(ccsLabel, "totefic_presup_sat", "totefic_presup_sat", ccsInteger, "", CCGetRequestParam("totefic_presup_sat", ccsGet, NULL), $this);
        $this->efic_presup_sat = new clsControl(ccsLabel, "efic_presup_sat", "efic_presup_sat", ccsFloat, "", CCGetRequestParam("efic_presup_sat", ccsGet, NULL), $this);
        $this->efic_presup_sat->HTML = true;
        $this->meta_efic_presup_sat = new clsControl(ccsHidden, "meta_efic_presup_sat", "meta_efic_presup_sat", ccsFloat, "", CCGetRequestParam("meta_efic_presup_sat", ccsGet, NULL), $this);
        $this->totefic_presup = new clsControl(ccsLabel, "totefic_presup", "totefic_presup", ccsInteger, "", CCGetRequestParam("totefic_presup", ccsGet, NULL), $this);
        $this->efic_presup = new clsControl(ccsLabel, "efic_presup", "efic_presup", ccsFloat, "", CCGetRequestParam("efic_presup", ccsGet, NULL), $this);
        $this->efic_presup->HTML = true;
        $this->meta_efic_presup = new clsControl(ccsHidden, "meta_efic_presup", "meta_efic_presup", ccsFloat, "", CCGetRequestParam("meta_efic_presup", ccsGet, NULL), $this);
        $this->imgherr_est_cost_sat = new clsControl(ccsImage, "imgherr_est_cost_sat", "imgherr_est_cost_sat", ccsText, "", CCGetRequestParam("imgherr_est_cost_sat", ccsGet, NULL), $this);
        $this->imgherr_est_cost = new clsControl(ccsImage, "imgherr_est_cost", "imgherr_est_cost", ccsText, "", CCGetRequestParam("imgherr_est_cost", ccsGet, NULL), $this);
        $this->imgreq_serv_sat = new clsControl(ccsImage, "imgreq_serv_sat", "imgreq_serv_sat", ccsText, "", CCGetRequestParam("imgreq_serv_sat", ccsGet, NULL), $this);
        $this->imgreq_serv = new clsControl(ccsImage, "imgreq_serv", "imgreq_serv", ccsText, "", CCGetRequestParam("imgreq_serv", ccsGet, NULL), $this);
        $this->imgcumpl_req_func_sat = new clsControl(ccsImage, "imgcumpl_req_func_sat", "imgcumpl_req_func_sat", ccsText, "", CCGetRequestParam("imgcumpl_req_func_sat", ccsGet, NULL), $this);
        $this->imgcumpl_req_func = new clsControl(ccsImage, "imgcumpl_req_func", "imgcumpl_req_func", ccsText, "", CCGetRequestParam("imgcumpl_req_func", ccsGet, NULL), $this);
        $this->imgcalidad_prod_term_sat = new clsControl(ccsImage, "imgcalidad_prod_term_sat", "imgcalidad_prod_term_sat", ccsText, "", CCGetRequestParam("imgcalidad_prod_term_sat", ccsGet, NULL), $this);
        $this->imgcalidad_prod_term = new clsControl(ccsImage, "imgcalidad_prod_term", "imgcalidad_prod_term", ccsText, "", CCGetRequestParam("imgcalidad_prod_term", ccsGet, NULL), $this);
        $this->imgretr_entregable_sat = new clsControl(ccsImage, "imgretr_entregable_sat", "imgretr_entregable_sat", ccsText, "", CCGetRequestParam("imgretr_entregable_sat", ccsGet, NULL), $this);
        $this->imgretr_entregable = new clsControl(ccsImage, "imgretr_entregable", "imgretr_entregable", ccsText, "", CCGetRequestParam("imgretr_entregable", ccsGet, NULL), $this);
        $this->imgcal_cod_sat = new clsControl(ccsImage, "imgcal_cod_sat", "imgcal_cod_sat", ccsText, "", CCGetRequestParam("imgcal_cod_sat", ccsGet, NULL), $this);
        $this->imgcal_cod = new clsControl(ccsImage, "imgcal_cod", "imgcal_cod", ccsText, "", CCGetRequestParam("imgcal_cod", ccsGet, NULL), $this);
        $this->imgdef_fug_amb_prod_sat = new clsControl(ccsImage, "imgdef_fug_amb_prod_sat", "imgdef_fug_amb_prod_sat", ccsText, "", CCGetRequestParam("imgdef_fug_amb_prod_sat", ccsGet, NULL), $this);
        $this->imgdef_fug_amb_prod = new clsControl(ccsImage, "imgdef_fug_amb_prod", "imgdef_fug_amb_prod", ccsText, "", CCGetRequestParam("imgdef_fug_amb_prod", ccsGet, NULL), $this);
        $this->imginc_tiempoasignacion_sat = new clsControl(ccsImage, "imginc_tiempoasignacion_sat", "imginc_tiempoasignacion_sat", ccsText, "", CCGetRequestParam("imginc_tiempoasignacion_sat", ccsGet, NULL), $this);
        $this->imginc_tiempoasignacion = new clsControl(ccsImage, "imginc_tiempoasignacion", "imginc_tiempoasignacion", ccsText, "", CCGetRequestParam("imginc_tiempoasignacion", ccsGet, NULL), $this);
        $this->imginc_tiemposolucion_sat = new clsControl(ccsImage, "imginc_tiemposolucion_sat", "imginc_tiemposolucion_sat", ccsText, "", CCGetRequestParam("imginc_tiemposolucion_sat", ccsGet, NULL), $this);
        $this->imginc_tiemposolucion = new clsControl(ccsImage, "imginc_tiemposolucion", "imginc_tiemposolucion", ccsText, "", CCGetRequestParam("imginc_tiemposolucion", ccsGet, NULL), $this);
        $this->imgefic_presup_sat = new clsControl(ccsImage, "imgefic_presup_sat", "imgefic_presup_sat", ccsText, "", CCGetRequestParam("imgefic_presup_sat", ccsGet, NULL), $this);
        $this->imgefic_presup = new clsControl(ccsImage, "imgefic_presup", "imgefic_presup", ccsText, "", CCGetRequestParam("imgefic_presup", ccsGet, NULL), $this);
        $this->meta_inc_tiempoasignacion = new clsControl(ccsHidden, "meta_inc_tiempoasignacion", "meta_inc_tiempoasignacion", ccsFloat, "", CCGetRequestParam("meta_inc_tiempoasignacion", ccsGet, NULL), $this);
        $this->meta_inc_tiemposolucion = new clsControl(ccsHidden, "meta_inc_tiemposolucion", "meta_inc_tiemposolucion", ccsFloat, "", CCGetRequestParam("meta_inc_tiemposolucion", ccsGet, NULL), $this);
    }
//End Class_Initialize Event

//Initialize Method @24-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @24-73D6AD51
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_opt_slas"] = CCGetFromGet("s_opt_slas", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_id_periodo"] = CCGetFromGet("s_id_periodo", NULL);

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
            $this->ControlsVisible["descripcion_sat"] = $this->descripcion_sat->Visible;
            $this->ControlsVisible["totherr_est_cost_sat"] = $this->totherr_est_cost_sat->Visible;
            $this->ControlsVisible["totherr_est_cost"] = $this->totherr_est_cost->Visible;
            $this->ControlsVisible["totreq_serv_sat"] = $this->totreq_serv_sat->Visible;
            $this->ControlsVisible["totreq_serv"] = $this->totreq_serv->Visible;
            $this->ControlsVisible["totcumpl_req_func_sat"] = $this->totcumpl_req_func_sat->Visible;
            $this->ControlsVisible["totcumpl_req_func"] = $this->totcumpl_req_func->Visible;
            $this->ControlsVisible["totcalidad_prod_term_sat"] = $this->totcalidad_prod_term_sat->Visible;
            $this->ControlsVisible["totcalidad_prod_term"] = $this->totcalidad_prod_term->Visible;
            $this->ControlsVisible["totretr_entregable_sat"] = $this->totretr_entregable_sat->Visible;
            $this->ControlsVisible["totretr_entregable"] = $this->totretr_entregable->Visible;
            $this->ControlsVisible["totcal_cod_sat"] = $this->totcal_cod_sat->Visible;
            $this->ControlsVisible["totcal_cod"] = $this->totcal_cod->Visible;
            $this->ControlsVisible["totdef_fug_amb_prod_sat"] = $this->totdef_fug_amb_prod_sat->Visible;
            $this->ControlsVisible["totdef_fug_amb_prod"] = $this->totdef_fug_amb_prod->Visible;
            $this->ControlsVisible["totinc_tiempoasignacion_sat"] = $this->totinc_tiempoasignacion_sat->Visible;
            $this->ControlsVisible["totinc_tiempoasignacion"] = $this->totinc_tiempoasignacion->Visible;
            $this->ControlsVisible["totinc_tiemposolucion_sat"] = $this->totinc_tiemposolucion_sat->Visible;
            $this->ControlsVisible["totinc_tiemposolucion"] = $this->totinc_tiemposolucion->Visible;
            $this->ControlsVisible["cumplenefic_presup_sat"] = $this->cumplenefic_presup_sat->Visible;
            $this->ControlsVisible["cumplenefic_presup"] = $this->cumplenefic_presup->Visible;
            $this->ControlsVisible["cumplenherr_est_cost_sat"] = $this->cumplenherr_est_cost_sat->Visible;
            $this->ControlsVisible["herr_est_cost_sat"] = $this->herr_est_cost_sat->Visible;
            $this->ControlsVisible["meta_herr_est_cost_sat"] = $this->meta_herr_est_cost_sat->Visible;
            $this->ControlsVisible["cumplenherr_est_cost"] = $this->cumplenherr_est_cost->Visible;
            $this->ControlsVisible["herr_est_cost"] = $this->herr_est_cost->Visible;
            $this->ControlsVisible["meta_herr_est_cost"] = $this->meta_herr_est_cost->Visible;
            $this->ControlsVisible["cumplenreq_serv_sat"] = $this->cumplenreq_serv_sat->Visible;
            $this->ControlsVisible["req_serv_sat"] = $this->req_serv_sat->Visible;
            $this->ControlsVisible["meta_req_serv_sat"] = $this->meta_req_serv_sat->Visible;
            $this->ControlsVisible["cumplenreq_serv"] = $this->cumplenreq_serv->Visible;
            $this->ControlsVisible["req_serv"] = $this->req_serv->Visible;
            $this->ControlsVisible["meta_req_serv"] = $this->meta_req_serv->Visible;
            $this->ControlsVisible["cumplencumpl_req_func_sat"] = $this->cumplencumpl_req_func_sat->Visible;
            $this->ControlsVisible["cumpl_req_func_sat"] = $this->cumpl_req_func_sat->Visible;
            $this->ControlsVisible["meta_cumpl_req_func_sat"] = $this->meta_cumpl_req_func_sat->Visible;
            $this->ControlsVisible["cumplencumpl_req_func"] = $this->cumplencumpl_req_func->Visible;
            $this->ControlsVisible["cumpl_req_func"] = $this->cumpl_req_func->Visible;
            $this->ControlsVisible["meta_cumpl_req_func"] = $this->meta_cumpl_req_func->Visible;
            $this->ControlsVisible["cumplencalidad_prod_term_sat"] = $this->cumplencalidad_prod_term_sat->Visible;
            $this->ControlsVisible["calidad_prod_term_sat"] = $this->calidad_prod_term_sat->Visible;
            $this->ControlsVisible["meta_calidad_prod_term_sat"] = $this->meta_calidad_prod_term_sat->Visible;
            $this->ControlsVisible["cumplencalidad_prod_term"] = $this->cumplencalidad_prod_term->Visible;
            $this->ControlsVisible["calidad_prod_term"] = $this->calidad_prod_term->Visible;
            $this->ControlsVisible["meta_calidad_prod_term"] = $this->meta_calidad_prod_term->Visible;
            $this->ControlsVisible["cumplenretr_entregable_sat"] = $this->cumplenretr_entregable_sat->Visible;
            $this->ControlsVisible["retr_entregable_sat"] = $this->retr_entregable_sat->Visible;
            $this->ControlsVisible["meta_retr_entregable_sat"] = $this->meta_retr_entregable_sat->Visible;
            $this->ControlsVisible["cumplenretr_entregable"] = $this->cumplenretr_entregable->Visible;
            $this->ControlsVisible["retr_entregable"] = $this->retr_entregable->Visible;
            $this->ControlsVisible["meta_retr_entregable"] = $this->meta_retr_entregable->Visible;
            $this->ControlsVisible["cumplencal_cod_sat"] = $this->cumplencal_cod_sat->Visible;
            $this->ControlsVisible["cal_cod_sat"] = $this->cal_cod_sat->Visible;
            $this->ControlsVisible["meta_cal_cod_sat"] = $this->meta_cal_cod_sat->Visible;
            $this->ControlsVisible["cumplencal_cod"] = $this->cumplencal_cod->Visible;
            $this->ControlsVisible["cal_cod"] = $this->cal_cod->Visible;
            $this->ControlsVisible["meta_cal_cod"] = $this->meta_cal_cod->Visible;
            $this->ControlsVisible["cumplendef_fug_amb_prod_sat"] = $this->cumplendef_fug_amb_prod_sat->Visible;
            $this->ControlsVisible["def_fug_amb_prod_sat"] = $this->def_fug_amb_prod_sat->Visible;
            $this->ControlsVisible["meta_def_fug_amb_prod_sat"] = $this->meta_def_fug_amb_prod_sat->Visible;
            $this->ControlsVisible["cumplendef_fug_amb_prod"] = $this->cumplendef_fug_amb_prod->Visible;
            $this->ControlsVisible["def_fug_amb_prod"] = $this->def_fug_amb_prod->Visible;
            $this->ControlsVisible["meta_def_fug_amb_prod"] = $this->meta_def_fug_amb_prod->Visible;
            $this->ControlsVisible["cumpleninc_tiempoasignacion_sat"] = $this->cumpleninc_tiempoasignacion_sat->Visible;
            $this->ControlsVisible["inc_tiempoasignacion_sat"] = $this->inc_tiempoasignacion_sat->Visible;
            $this->ControlsVisible["meta_inc_tiempoasignacion_sat"] = $this->meta_inc_tiempoasignacion_sat->Visible;
            $this->ControlsVisible["cumpleninc_tiempoasignacion"] = $this->cumpleninc_tiempoasignacion->Visible;
            $this->ControlsVisible["inc_tiempoasignacion"] = $this->inc_tiempoasignacion->Visible;
            $this->ControlsVisible["cumpleninc_tiemposolucion_sat"] = $this->cumpleninc_tiemposolucion_sat->Visible;
            $this->ControlsVisible["inc_tiemposolucion_sat"] = $this->inc_tiemposolucion_sat->Visible;
            $this->ControlsVisible["meta_inc_tiemposolucion_sat"] = $this->meta_inc_tiemposolucion_sat->Visible;
            $this->ControlsVisible["cumpleninc_tiemposolucion"] = $this->cumpleninc_tiemposolucion->Visible;
            $this->ControlsVisible["inc_tiemposolucion"] = $this->inc_tiemposolucion->Visible;
            $this->ControlsVisible["totefic_presup_sat"] = $this->totefic_presup_sat->Visible;
            $this->ControlsVisible["efic_presup_sat"] = $this->efic_presup_sat->Visible;
            $this->ControlsVisible["meta_efic_presup_sat"] = $this->meta_efic_presup_sat->Visible;
            $this->ControlsVisible["totefic_presup"] = $this->totefic_presup->Visible;
            $this->ControlsVisible["efic_presup"] = $this->efic_presup->Visible;
            $this->ControlsVisible["meta_efic_presup"] = $this->meta_efic_presup->Visible;
            $this->ControlsVisible["imgherr_est_cost_sat"] = $this->imgherr_est_cost_sat->Visible;
            $this->ControlsVisible["imgherr_est_cost"] = $this->imgherr_est_cost->Visible;
            $this->ControlsVisible["imgreq_serv_sat"] = $this->imgreq_serv_sat->Visible;
            $this->ControlsVisible["imgreq_serv"] = $this->imgreq_serv->Visible;
            $this->ControlsVisible["imgcumpl_req_func_sat"] = $this->imgcumpl_req_func_sat->Visible;
            $this->ControlsVisible["imgcumpl_req_func"] = $this->imgcumpl_req_func->Visible;
            $this->ControlsVisible["imgcalidad_prod_term_sat"] = $this->imgcalidad_prod_term_sat->Visible;
            $this->ControlsVisible["imgcalidad_prod_term"] = $this->imgcalidad_prod_term->Visible;
            $this->ControlsVisible["imgretr_entregable_sat"] = $this->imgretr_entregable_sat->Visible;
            $this->ControlsVisible["imgretr_entregable"] = $this->imgretr_entregable->Visible;
            $this->ControlsVisible["imgcal_cod_sat"] = $this->imgcal_cod_sat->Visible;
            $this->ControlsVisible["imgcal_cod"] = $this->imgcal_cod->Visible;
            $this->ControlsVisible["imgdef_fug_amb_prod_sat"] = $this->imgdef_fug_amb_prod_sat->Visible;
            $this->ControlsVisible["imgdef_fug_amb_prod"] = $this->imgdef_fug_amb_prod->Visible;
            $this->ControlsVisible["imginc_tiempoasignacion_sat"] = $this->imginc_tiempoasignacion_sat->Visible;
            $this->ControlsVisible["imginc_tiempoasignacion"] = $this->imginc_tiempoasignacion->Visible;
            $this->ControlsVisible["imginc_tiemposolucion_sat"] = $this->imginc_tiemposolucion_sat->Visible;
            $this->ControlsVisible["imginc_tiemposolucion"] = $this->imginc_tiemposolucion->Visible;
            $this->ControlsVisible["imgefic_presup_sat"] = $this->imgefic_presup_sat->Visible;
            $this->ControlsVisible["imgefic_presup"] = $this->imgefic_presup->Visible;
            $this->ControlsVisible["meta_inc_tiempoasignacion"] = $this->meta_inc_tiempoasignacion->Visible;
            $this->ControlsVisible["meta_inc_tiemposolucion"] = $this->meta_inc_tiemposolucion->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->descripcion_sat->SetValue($this->DataSource->descripcion_sat->GetValue());
                $this->totherr_est_cost_sat->SetValue($this->DataSource->totherr_est_cost_sat->GetValue());
                $this->totherr_est_cost->SetValue($this->DataSource->totherr_est_cost->GetValue());
                $this->totreq_serv_sat->SetValue($this->DataSource->totreq_serv_sat->GetValue());
                $this->totreq_serv->SetValue($this->DataSource->totreq_serv->GetValue());
                $this->totcumpl_req_func_sat->SetValue($this->DataSource->totcumpl_req_func_sat->GetValue());
                $this->totcumpl_req_func->SetValue($this->DataSource->totcumpl_req_func->GetValue());
                $this->totcalidad_prod_term_sat->SetValue($this->DataSource->totcalidad_prod_term_sat->GetValue());
                $this->totcalidad_prod_term->SetValue($this->DataSource->totcalidad_prod_term->GetValue());
                $this->totretr_entregable_sat->SetValue($this->DataSource->totretr_entregable_sat->GetValue());
                $this->totretr_entregable->SetValue($this->DataSource->totretr_entregable->GetValue());
                $this->totcal_cod_sat->SetValue($this->DataSource->totcal_cod_sat->GetValue());
                $this->totcal_cod->SetValue($this->DataSource->totcal_cod->GetValue());
                $this->totdef_fug_amb_prod_sat->SetValue($this->DataSource->totdef_fug_amb_prod_sat->GetValue());
                $this->totdef_fug_amb_prod->SetValue($this->DataSource->totdef_fug_amb_prod->GetValue());
                $this->totinc_tiempoasignacion_sat->SetValue($this->DataSource->totinc_tiempoasignacion_sat->GetValue());
                $this->totinc_tiempoasignacion->SetValue($this->DataSource->totinc_tiempoasignacion->GetValue());
                $this->totinc_tiemposolucion_sat->SetValue($this->DataSource->totinc_tiemposolucion_sat->GetValue());
                $this->totinc_tiemposolucion->SetValue($this->DataSource->totinc_tiemposolucion->GetValue());
                $this->cumplenefic_presup_sat->SetValue($this->DataSource->cumplenefic_presup_sat->GetValue());
                $this->cumplenefic_presup->SetValue($this->DataSource->cumplenefic_presup->GetValue());
                $this->cumplenherr_est_cost_sat->SetValue($this->DataSource->cumplenherr_est_cost_sat->GetValue());
                $this->herr_est_cost_sat->SetValue($this->DataSource->herr_est_cost_sat->GetValue());
                $this->meta_herr_est_cost_sat->SetValue($this->DataSource->meta_herr_est_cost_sat->GetValue());
                $this->cumplenherr_est_cost->SetValue($this->DataSource->cumplenherr_est_cost->GetValue());
                $this->herr_est_cost->SetValue($this->DataSource->herr_est_cost->GetValue());
                $this->meta_herr_est_cost->SetValue($this->DataSource->meta_herr_est_cost->GetValue());
                $this->cumplenreq_serv_sat->SetValue($this->DataSource->cumplenreq_serv_sat->GetValue());
                $this->req_serv_sat->SetValue($this->DataSource->req_serv_sat->GetValue());
                $this->meta_req_serv_sat->SetValue($this->DataSource->meta_req_serv_sat->GetValue());
                $this->cumplenreq_serv->SetValue($this->DataSource->cumplenreq_serv->GetValue());
                $this->req_serv->SetValue($this->DataSource->req_serv->GetValue());
                $this->meta_req_serv->SetValue($this->DataSource->meta_req_serv->GetValue());
                $this->cumplencumpl_req_func_sat->SetValue($this->DataSource->cumplencumpl_req_func_sat->GetValue());
                $this->cumpl_req_func_sat->SetValue($this->DataSource->cumpl_req_func_sat->GetValue());
                $this->meta_cumpl_req_func_sat->SetValue($this->DataSource->meta_cumpl_req_func_sat->GetValue());
                $this->cumplencumpl_req_func->SetValue($this->DataSource->cumplencumpl_req_func->GetValue());
                $this->cumpl_req_func->SetValue($this->DataSource->cumpl_req_func->GetValue());
                $this->meta_cumpl_req_func->SetValue($this->DataSource->meta_cumpl_req_func->GetValue());
                $this->cumplencalidad_prod_term_sat->SetValue($this->DataSource->cumplencalidad_prod_term_sat->GetValue());
                $this->calidad_prod_term_sat->SetValue($this->DataSource->calidad_prod_term_sat->GetValue());
                $this->meta_calidad_prod_term_sat->SetValue($this->DataSource->meta_calidad_prod_term_sat->GetValue());
                $this->cumplencalidad_prod_term->SetValue($this->DataSource->cumplencalidad_prod_term->GetValue());
                $this->calidad_prod_term->SetValue($this->DataSource->calidad_prod_term->GetValue());
                $this->meta_calidad_prod_term->SetValue($this->DataSource->meta_calidad_prod_term->GetValue());
                $this->cumplenretr_entregable_sat->SetValue($this->DataSource->cumplenretr_entregable_sat->GetValue());
                $this->retr_entregable_sat->SetValue($this->DataSource->retr_entregable_sat->GetValue());
                $this->meta_retr_entregable_sat->SetValue($this->DataSource->meta_retr_entregable_sat->GetValue());
                $this->cumplenretr_entregable->SetValue($this->DataSource->cumplenretr_entregable->GetValue());
                $this->retr_entregable->SetValue($this->DataSource->retr_entregable->GetValue());
                $this->meta_retr_entregable->SetValue($this->DataSource->meta_retr_entregable->GetValue());
                $this->cumplencal_cod_sat->SetValue($this->DataSource->cumplencal_cod_sat->GetValue());
                $this->cal_cod_sat->SetValue($this->DataSource->cal_cod_sat->GetValue());
                $this->meta_cal_cod_sat->SetValue($this->DataSource->meta_cal_cod_sat->GetValue());
                $this->cumplencal_cod->SetValue($this->DataSource->cumplencal_cod->GetValue());
                $this->cal_cod->SetValue($this->DataSource->cal_cod->GetValue());
                $this->meta_cal_cod->SetValue($this->DataSource->meta_cal_cod->GetValue());
                $this->cumplendef_fug_amb_prod_sat->SetValue($this->DataSource->cumplendef_fug_amb_prod_sat->GetValue());
                $this->def_fug_amb_prod_sat->SetValue($this->DataSource->def_fug_amb_prod_sat->GetValue());
                $this->meta_def_fug_amb_prod_sat->SetValue($this->DataSource->meta_def_fug_amb_prod_sat->GetValue());
                $this->cumplendef_fug_amb_prod->SetValue($this->DataSource->cumplendef_fug_amb_prod->GetValue());
                $this->def_fug_amb_prod->SetValue($this->DataSource->def_fug_amb_prod->GetValue());
                $this->meta_def_fug_amb_prod->SetValue($this->DataSource->meta_def_fug_amb_prod->GetValue());
                $this->cumpleninc_tiempoasignacion_sat->SetValue($this->DataSource->cumpleninc_tiempoasignacion_sat->GetValue());
                $this->inc_tiempoasignacion_sat->SetValue($this->DataSource->inc_tiempoasignacion_sat->GetValue());
                $this->meta_inc_tiempoasignacion_sat->SetValue($this->DataSource->meta_inc_tiempoasignacion_sat->GetValue());
                $this->cumpleninc_tiempoasignacion->SetValue($this->DataSource->cumpleninc_tiempoasignacion->GetValue());
                $this->inc_tiempoasignacion->SetValue($this->DataSource->inc_tiempoasignacion->GetValue());
                $this->cumpleninc_tiemposolucion_sat->SetValue($this->DataSource->cumpleninc_tiemposolucion_sat->GetValue());
                $this->inc_tiemposolucion_sat->SetValue($this->DataSource->inc_tiemposolucion_sat->GetValue());
                $this->meta_inc_tiemposolucion_sat->SetValue($this->DataSource->meta_inc_tiemposolucion_sat->GetValue());
                $this->cumpleninc_tiemposolucion->SetValue($this->DataSource->cumpleninc_tiemposolucion->GetValue());
                $this->inc_tiemposolucion->SetValue($this->DataSource->inc_tiemposolucion->GetValue());
                $this->totefic_presup_sat->SetValue($this->DataSource->totefic_presup_sat->GetValue());
                $this->efic_presup_sat->SetValue($this->DataSource->efic_presup_sat->GetValue());
                $this->meta_efic_presup_sat->SetValue($this->DataSource->meta_efic_presup_sat->GetValue());
                $this->totefic_presup->SetValue($this->DataSource->totefic_presup->GetValue());
                $this->efic_presup->SetValue($this->DataSource->efic_presup->GetValue());
                $this->meta_efic_presup->SetValue($this->DataSource->meta_efic_presup->GetValue());
                $this->meta_inc_tiempoasignacion->SetValue($this->DataSource->meta_inc_tiempoasignacion->GetValue());
                $this->meta_inc_tiemposolucion->SetValue($this->DataSource->meta_inc_tiemposolucion->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->descripcion_sat->Show();
                $this->totherr_est_cost_sat->Show();
                $this->totherr_est_cost->Show();
                $this->totreq_serv_sat->Show();
                $this->totreq_serv->Show();
                $this->totcumpl_req_func_sat->Show();
                $this->totcumpl_req_func->Show();
                $this->totcalidad_prod_term_sat->Show();
                $this->totcalidad_prod_term->Show();
                $this->totretr_entregable_sat->Show();
                $this->totretr_entregable->Show();
                $this->totcal_cod_sat->Show();
                $this->totcal_cod->Show();
                $this->totdef_fug_amb_prod_sat->Show();
                $this->totdef_fug_amb_prod->Show();
                $this->totinc_tiempoasignacion_sat->Show();
                $this->totinc_tiempoasignacion->Show();
                $this->totinc_tiemposolucion_sat->Show();
                $this->totinc_tiemposolucion->Show();
                $this->cumplenefic_presup_sat->Show();
                $this->cumplenefic_presup->Show();
                $this->cumplenherr_est_cost_sat->Show();
                $this->herr_est_cost_sat->Show();
                $this->meta_herr_est_cost_sat->Show();
                $this->cumplenherr_est_cost->Show();
                $this->herr_est_cost->Show();
                $this->meta_herr_est_cost->Show();
                $this->cumplenreq_serv_sat->Show();
                $this->req_serv_sat->Show();
                $this->meta_req_serv_sat->Show();
                $this->cumplenreq_serv->Show();
                $this->req_serv->Show();
                $this->meta_req_serv->Show();
                $this->cumplencumpl_req_func_sat->Show();
                $this->cumpl_req_func_sat->Show();
                $this->meta_cumpl_req_func_sat->Show();
                $this->cumplencumpl_req_func->Show();
                $this->cumpl_req_func->Show();
                $this->meta_cumpl_req_func->Show();
                $this->cumplencalidad_prod_term_sat->Show();
                $this->calidad_prod_term_sat->Show();
                $this->meta_calidad_prod_term_sat->Show();
                $this->cumplencalidad_prod_term->Show();
                $this->calidad_prod_term->Show();
                $this->meta_calidad_prod_term->Show();
                $this->cumplenretr_entregable_sat->Show();
                $this->retr_entregable_sat->Show();
                $this->meta_retr_entregable_sat->Show();
                $this->cumplenretr_entregable->Show();
                $this->retr_entregable->Show();
                $this->meta_retr_entregable->Show();
                $this->cumplencal_cod_sat->Show();
                $this->cal_cod_sat->Show();
                $this->meta_cal_cod_sat->Show();
                $this->cumplencal_cod->Show();
                $this->cal_cod->Show();
                $this->meta_cal_cod->Show();
                $this->cumplendef_fug_amb_prod_sat->Show();
                $this->def_fug_amb_prod_sat->Show();
                $this->meta_def_fug_amb_prod_sat->Show();
                $this->cumplendef_fug_amb_prod->Show();
                $this->def_fug_amb_prod->Show();
                $this->meta_def_fug_amb_prod->Show();
                $this->cumpleninc_tiempoasignacion_sat->Show();
                $this->inc_tiempoasignacion_sat->Show();
                $this->meta_inc_tiempoasignacion_sat->Show();
                $this->cumpleninc_tiempoasignacion->Show();
                $this->inc_tiempoasignacion->Show();
                $this->cumpleninc_tiemposolucion_sat->Show();
                $this->inc_tiemposolucion_sat->Show();
                $this->meta_inc_tiemposolucion_sat->Show();
                $this->cumpleninc_tiemposolucion->Show();
                $this->inc_tiemposolucion->Show();
                $this->totefic_presup_sat->Show();
                $this->efic_presup_sat->Show();
                $this->meta_efic_presup_sat->Show();
                $this->totefic_presup->Show();
                $this->efic_presup->Show();
                $this->meta_efic_presup->Show();
                $this->imgherr_est_cost_sat->Show();
                $this->imgherr_est_cost->Show();
                $this->imgreq_serv_sat->Show();
                $this->imgreq_serv->Show();
                $this->imgcumpl_req_func_sat->Show();
                $this->imgcumpl_req_func->Show();
                $this->imgcalidad_prod_term_sat->Show();
                $this->imgcalidad_prod_term->Show();
                $this->imgretr_entregable_sat->Show();
                $this->imgretr_entregable->Show();
                $this->imgcal_cod_sat->Show();
                $this->imgcal_cod->Show();
                $this->imgdef_fug_amb_prod_sat->Show();
                $this->imgdef_fug_amb_prod->Show();
                $this->imginc_tiempoasignacion_sat->Show();
                $this->imginc_tiempoasignacion->Show();
                $this->imginc_tiemposolucion_sat->Show();
                $this->imginc_tiemposolucion->Show();
                $this->imgefic_presup_sat->Show();
                $this->imgefic_presup->Show();
                $this->meta_inc_tiempoasignacion->Show();
                $this->meta_inc_tiemposolucion->Show();
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
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @24-377028A1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->descripcion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totherr_est_cost_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totherr_est_cost->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totreq_serv_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totreq_serv->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcumpl_req_func_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcumpl_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcalidad_prod_term_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcalidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totretr_entregable_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totretr_entregable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcal_cod_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcal_cod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totdef_fug_amb_prod_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totdef_fug_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totinc_tiempoasignacion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totinc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totinc_tiemposolucion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totinc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenefic_presup_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenefic_presup->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenherr_est_cost_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->herr_est_cost_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_herr_est_cost_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenherr_est_cost->Errors->ToString());
        $errors = ComposeStrings($errors, $this->herr_est_cost->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_herr_est_cost->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenreq_serv_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->req_serv_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_req_serv_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenreq_serv->Errors->ToString());
        $errors = ComposeStrings($errors, $this->req_serv->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_req_serv->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencumpl_req_func_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpl_req_func_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_cumpl_req_func_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencumpl_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpl_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_cumpl_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencalidad_prod_term_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->calidad_prod_term_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_calidad_prod_term_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencalidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->calidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_calidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenretr_entregable_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->retr_entregable_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_retr_entregable_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenretr_entregable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->retr_entregable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_retr_entregable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencal_cod_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cal_cod_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_cal_cod_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencal_cod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cal_cod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_cal_cod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplendef_fug_amb_prod_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->def_fug_amb_prod_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_def_fug_amb_prod_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplendef_fug_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->def_fug_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_def_fug_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpleninc_tiempoasignacion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->inc_tiempoasignacion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_inc_tiempoasignacion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpleninc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->inc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpleninc_tiemposolucion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->inc_tiemposolucion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_inc_tiemposolucion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpleninc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->inc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totefic_presup_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->efic_presup_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_efic_presup_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totefic_presup->Errors->ToString());
        $errors = ComposeStrings($errors, $this->efic_presup->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_efic_presup->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgherr_est_cost_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgherr_est_cost->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgreq_serv_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgreq_serv->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcumpl_req_func_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcumpl_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcalidad_prod_term_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcalidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgretr_entregable_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgretr_entregable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcal_cod_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcal_cod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgdef_fug_amb_prod_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgdef_fug_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imginc_tiempoasignacion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imginc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imginc_tiemposolucion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imginc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgefic_presup_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgefic_presup->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_inc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_inc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid2 Class @24-FCB6E20C

class clsGrid2DataSource extends clsDBcnDisenio {  //Grid2DataSource Class @24-C024CE9B

//DataSource Variables @24-B9D8D880
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $descripcion_sat;
    public $totherr_est_cost_sat;
    public $totherr_est_cost;
    public $totreq_serv_sat;
    public $totreq_serv;
    public $totcumpl_req_func_sat;
    public $totcumpl_req_func;
    public $totcalidad_prod_term_sat;
    public $totcalidad_prod_term;
    public $totretr_entregable_sat;
    public $totretr_entregable;
    public $totcal_cod_sat;
    public $totcal_cod;
    public $totdef_fug_amb_prod_sat;
    public $totdef_fug_amb_prod;
    public $totinc_tiempoasignacion_sat;
    public $totinc_tiempoasignacion;
    public $totinc_tiemposolucion_sat;
    public $totinc_tiemposolucion;
    public $cumplenefic_presup_sat;
    public $cumplenefic_presup;
    public $cumplenherr_est_cost_sat;
    public $herr_est_cost_sat;
    public $meta_herr_est_cost_sat;
    public $cumplenherr_est_cost;
    public $herr_est_cost;
    public $meta_herr_est_cost;
    public $cumplenreq_serv_sat;
    public $req_serv_sat;
    public $meta_req_serv_sat;
    public $cumplenreq_serv;
    public $req_serv;
    public $meta_req_serv;
    public $cumplencumpl_req_func_sat;
    public $cumpl_req_func_sat;
    public $meta_cumpl_req_func_sat;
    public $cumplencumpl_req_func;
    public $cumpl_req_func;
    public $meta_cumpl_req_func;
    public $cumplencalidad_prod_term_sat;
    public $calidad_prod_term_sat;
    public $meta_calidad_prod_term_sat;
    public $cumplencalidad_prod_term;
    public $calidad_prod_term;
    public $meta_calidad_prod_term;
    public $cumplenretr_entregable_sat;
    public $retr_entregable_sat;
    public $meta_retr_entregable_sat;
    public $cumplenretr_entregable;
    public $retr_entregable;
    public $meta_retr_entregable;
    public $cumplencal_cod_sat;
    public $cal_cod_sat;
    public $meta_cal_cod_sat;
    public $cumplencal_cod;
    public $cal_cod;
    public $meta_cal_cod;
    public $cumplendef_fug_amb_prod_sat;
    public $def_fug_amb_prod_sat;
    public $meta_def_fug_amb_prod_sat;
    public $cumplendef_fug_amb_prod;
    public $def_fug_amb_prod;
    public $meta_def_fug_amb_prod;
    public $cumpleninc_tiempoasignacion_sat;
    public $inc_tiempoasignacion_sat;
    public $meta_inc_tiempoasignacion_sat;
    public $cumpleninc_tiempoasignacion;
    public $inc_tiempoasignacion;
    public $cumpleninc_tiemposolucion_sat;
    public $inc_tiemposolucion_sat;
    public $meta_inc_tiemposolucion_sat;
    public $cumpleninc_tiemposolucion;
    public $inc_tiemposolucion;
    public $totefic_presup_sat;
    public $efic_presup_sat;
    public $meta_efic_presup_sat;
    public $totefic_presup;
    public $efic_presup;
    public $meta_efic_presup;
    public $meta_inc_tiempoasignacion;
    public $meta_inc_tiemposolucion;
//End DataSource Variables

//DataSourceClass_Initialize Event @24-DCCAA2B3
    function clsGrid2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid2";
        $this->Initialize();
        $this->descripcion_sat = new clsField("descripcion_sat", ccsText, "");
        
        $this->totherr_est_cost_sat = new clsField("totherr_est_cost_sat", ccsInteger, "");
        
        $this->totherr_est_cost = new clsField("totherr_est_cost", ccsInteger, "");
        
        $this->totreq_serv_sat = new clsField("totreq_serv_sat", ccsInteger, "");
        
        $this->totreq_serv = new clsField("totreq_serv", ccsInteger, "");
        
        $this->totcumpl_req_func_sat = new clsField("totcumpl_req_func_sat", ccsInteger, "");
        
        $this->totcumpl_req_func = new clsField("totcumpl_req_func", ccsInteger, "");
        
        $this->totcalidad_prod_term_sat = new clsField("totcalidad_prod_term_sat", ccsInteger, "");
        
        $this->totcalidad_prod_term = new clsField("totcalidad_prod_term", ccsInteger, "");
        
        $this->totretr_entregable_sat = new clsField("totretr_entregable_sat", ccsInteger, "");
        
        $this->totretr_entregable = new clsField("totretr_entregable", ccsInteger, "");
        
        $this->totcal_cod_sat = new clsField("totcal_cod_sat", ccsInteger, "");
        
        $this->totcal_cod = new clsField("totcal_cod", ccsInteger, "");
        
        $this->totdef_fug_amb_prod_sat = new clsField("totdef_fug_amb_prod_sat", ccsInteger, "");
        
        $this->totdef_fug_amb_prod = new clsField("totdef_fug_amb_prod", ccsInteger, "");
        
        $this->totinc_tiempoasignacion_sat = new clsField("totinc_tiempoasignacion_sat", ccsInteger, "");
        
        $this->totinc_tiempoasignacion = new clsField("totinc_tiempoasignacion", ccsInteger, "");
        
        $this->totinc_tiemposolucion_sat = new clsField("totinc_tiemposolucion_sat", ccsInteger, "");
        
        $this->totinc_tiemposolucion = new clsField("totinc_tiemposolucion", ccsInteger, "");
        
        $this->cumplenefic_presup_sat = new clsField("cumplenefic_presup_sat", ccsInteger, "");
        
        $this->cumplenefic_presup = new clsField("cumplenefic_presup", ccsInteger, "");
        
        $this->cumplenherr_est_cost_sat = new clsField("cumplenherr_est_cost_sat", ccsInteger, "");
        
        $this->herr_est_cost_sat = new clsField("herr_est_cost_sat", ccsFloat, "");
        
        $this->meta_herr_est_cost_sat = new clsField("meta_herr_est_cost_sat", ccsFloat, "");
        
        $this->cumplenherr_est_cost = new clsField("cumplenherr_est_cost", ccsInteger, "");
        
        $this->herr_est_cost = new clsField("herr_est_cost", ccsFloat, "");
        
        $this->meta_herr_est_cost = new clsField("meta_herr_est_cost", ccsFloat, "");
        
        $this->cumplenreq_serv_sat = new clsField("cumplenreq_serv_sat", ccsInteger, "");
        
        $this->req_serv_sat = new clsField("req_serv_sat", ccsFloat, "");
        
        $this->meta_req_serv_sat = new clsField("meta_req_serv_sat", ccsFloat, "");
        
        $this->cumplenreq_serv = new clsField("cumplenreq_serv", ccsInteger, "");
        
        $this->req_serv = new clsField("req_serv", ccsFloat, "");
        
        $this->meta_req_serv = new clsField("meta_req_serv", ccsFloat, "");
        
        $this->cumplencumpl_req_func_sat = new clsField("cumplencumpl_req_func_sat", ccsInteger, "");
        
        $this->cumpl_req_func_sat = new clsField("cumpl_req_func_sat", ccsFloat, "");
        
        $this->meta_cumpl_req_func_sat = new clsField("meta_cumpl_req_func_sat", ccsFloat, "");
        
        $this->cumplencumpl_req_func = new clsField("cumplencumpl_req_func", ccsInteger, "");
        
        $this->cumpl_req_func = new clsField("cumpl_req_func", ccsFloat, "");
        
        $this->meta_cumpl_req_func = new clsField("meta_cumpl_req_func", ccsFloat, "");
        
        $this->cumplencalidad_prod_term_sat = new clsField("cumplencalidad_prod_term_sat", ccsInteger, "");
        
        $this->calidad_prod_term_sat = new clsField("calidad_prod_term_sat", ccsFloat, "");
        
        $this->meta_calidad_prod_term_sat = new clsField("meta_calidad_prod_term_sat", ccsFloat, "");
        
        $this->cumplencalidad_prod_term = new clsField("cumplencalidad_prod_term", ccsInteger, "");
        
        $this->calidad_prod_term = new clsField("calidad_prod_term", ccsFloat, "");
        
        $this->meta_calidad_prod_term = new clsField("meta_calidad_prod_term", ccsFloat, "");
        
        $this->cumplenretr_entregable_sat = new clsField("cumplenretr_entregable_sat", ccsInteger, "");
        
        $this->retr_entregable_sat = new clsField("retr_entregable_sat", ccsFloat, "");
        
        $this->meta_retr_entregable_sat = new clsField("meta_retr_entregable_sat", ccsFloat, "");
        
        $this->cumplenretr_entregable = new clsField("cumplenretr_entregable", ccsInteger, "");
        
        $this->retr_entregable = new clsField("retr_entregable", ccsFloat, "");
        
        $this->meta_retr_entregable = new clsField("meta_retr_entregable", ccsFloat, "");
        
        $this->cumplencal_cod_sat = new clsField("cumplencal_cod_sat", ccsInteger, "");
        
        $this->cal_cod_sat = new clsField("cal_cod_sat", ccsFloat, "");
        
        $this->meta_cal_cod_sat = new clsField("meta_cal_cod_sat", ccsFloat, "");
        
        $this->cumplencal_cod = new clsField("cumplencal_cod", ccsInteger, "");
        
        $this->cal_cod = new clsField("cal_cod", ccsFloat, "");
        
        $this->meta_cal_cod = new clsField("meta_cal_cod", ccsFloat, "");
        
        $this->cumplendef_fug_amb_prod_sat = new clsField("cumplendef_fug_amb_prod_sat", ccsInteger, "");
        
        $this->def_fug_amb_prod_sat = new clsField("def_fug_amb_prod_sat", ccsFloat, "");
        
        $this->meta_def_fug_amb_prod_sat = new clsField("meta_def_fug_amb_prod_sat", ccsFloat, "");
        
        $this->cumplendef_fug_amb_prod = new clsField("cumplendef_fug_amb_prod", ccsInteger, "");
        
        $this->def_fug_amb_prod = new clsField("def_fug_amb_prod", ccsFloat, "");
        
        $this->meta_def_fug_amb_prod = new clsField("meta_def_fug_amb_prod", ccsFloat, "");
        
        $this->cumpleninc_tiempoasignacion_sat = new clsField("cumpleninc_tiempoasignacion_sat", ccsInteger, "");
        
        $this->inc_tiempoasignacion_sat = new clsField("inc_tiempoasignacion_sat", ccsFloat, "");
        
        $this->meta_inc_tiempoasignacion_sat = new clsField("meta_inc_tiempoasignacion_sat", ccsFloat, "");
        
        $this->cumpleninc_tiempoasignacion = new clsField("cumpleninc_tiempoasignacion", ccsInteger, "");
        
        $this->inc_tiempoasignacion = new clsField("inc_tiempoasignacion", ccsFloat, "");
        
        $this->cumpleninc_tiemposolucion_sat = new clsField("cumpleninc_tiemposolucion_sat", ccsInteger, "");
        
        $this->inc_tiemposolucion_sat = new clsField("inc_tiemposolucion_sat", ccsFloat, "");
        
        $this->meta_inc_tiemposolucion_sat = new clsField("meta_inc_tiemposolucion_sat", ccsFloat, "");
        
        $this->cumpleninc_tiemposolucion = new clsField("cumpleninc_tiemposolucion", ccsInteger, "");
        
        $this->inc_tiemposolucion = new clsField("inc_tiemposolucion", ccsFloat, "");
        
        $this->totefic_presup_sat = new clsField("totefic_presup_sat", ccsInteger, "");
        
        $this->efic_presup_sat = new clsField("efic_presup_sat", ccsFloat, "");
        
        $this->meta_efic_presup_sat = new clsField("meta_efic_presup_sat", ccsFloat, "");
        
        $this->totefic_presup = new clsField("totefic_presup", ccsInteger, "");
        
        $this->efic_presup = new clsField("efic_presup", ccsFloat, "");
        
        $this->meta_efic_presup = new clsField("meta_efic_presup", ccsFloat, "");
        
        $this->meta_inc_tiempoasignacion = new clsField("meta_inc_tiempoasignacion", ccsFloat, "");
        
        $this->meta_inc_tiemposolucion = new clsField("meta_inc_tiemposolucion", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @24-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @24-4B520C46
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], "", false);
        $this->wp->AddParameter("2", "urls_id_proveedor", ccsText, "", "", $this->Parameters["urls_id_proveedor"], "", false);
        $this->wp->AddParameter("3", "urls_id_periodo", ccsText, "", "", $this->Parameters["urls_id_periodo"], "", false);
    }
//End Prepare Method

//Open Method @24-5BF8CB28
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select * from (\n" .
        "select  replace(capc.descripcion,CHAR(9),'') descripcion_sat,\n" .
        "	 sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end) totherr_est_cost_sat, \n" .
        "		sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end) cumplenherr_est_cost_sat, \n" .
        "		case when sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end)/cast((sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end herr_est_cost_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='herr_est_cost') as meta_herr_est_cost_sat,\n" .
        "	 \n" .
        "	 sum(case when req_serv='1' or req_serv='0' then 1 else 0 end) totreq_serv_sat, \n" .
        "		sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end) cumplenreq_serv_sat, \n" .
        "		case when sum(case when req_serv='1' or req_serv='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end)/cast((sum(case when req_serv='1' or req_serv='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end req_serv_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='req_serv') as meta_req_serv_sat,\n" .
        "	 \n" .
        "	 sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end) totcumpl_req_func_sat, \n" .
        "		sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as int) else 0 end) cumplencumpl_req_func_sat, \n" .
        "		case when sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as int) else 0 end)/cast((sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end cumpl_req_func_sat ,\n" .
        "	 (select meta from mc_c_metrica where acronimo='cumpl_req_func') as meta_cumpl_req_func_sat,\n" .
        "	 \n" .
        "	 \n" .
        "	 sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end) totcalidad_prod_term_sat, \n" .
        "		sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end) cumplencalidad_prod_term_sat, \n" .
        "		case when sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end)/\n" .
        "		 cast(	(sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end))AS float)*100 \n" .
        "		else 0 end calidad_prod_term_sat,\n" .
        "	 (select meta from mc_c_metrica where acronimo='calidad_prod_term') as meta_calidad_prod_term_sat,\n" .
        "	\n" .
        "	\n" .
        "	 sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end) totretr_entregable_sat, \n" .
        "		sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end) cumplenretr_entregable_sat, \n" .
        "		case when sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end)/cast((sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end retr_entregable_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='retr_entregable') as meta_retr_entregable_sat,\n" .
        "	 \n" .
        "	 sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end) totcal_cod_sat, \n" .
        "		sum(case when isnumeric(calidad_codigo)=1 then cast(calidad_codigo  as int) else 0 end) cumplencal_cod_sat, \n" .
        "		case when sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(calidad_codigo)=1 then cast(calidad_codigo  as int) else 0 end)/cast((sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end cal_cod_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='cal_cod') as meta_cal_cod_sat,\n" .
        "	 \n" .
        "	 sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end) totdef_fug_amb_prod_sat, \n" .
        "		sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end) cumplendef_fug_amb_prod_sat, \n" .
        "		case when sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end)/cast((sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end)) as float)*100  \n" .
        "		else 0 end def_fug_amb_prod_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='def_fug_amb_prod') as meta_def_fug_amb_prod_sat,\n" .
        "	 \n" .
        "	 sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end)  totinc_tiempoasignacion_sat, \n" .
        "		sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end) cumpleninc_tiempoasignacion_sat, \n" .
        "		case when sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end)/cast((sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end inc_tiempoasignacion_sat,\n" .
        "	 (select meta from mc_c_metrica where acronimo='inc_tiempoasignacion') as meta_inc_tiempoasignacion_sat,\n" .
        "	\n" .
        "	 sum(case when cumple_inc_tiemposolucion='1' or cumple_inc_tiemposolucion='0' then 1 else 0 end) totinc_tiemposolucion_sat, \n" .
        "		sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end) cumpleninc_tiemposolucion_sat, \n" .
        "		case when sum(case when cumple_inc_tiemposolucion='1' or cumple_inc_tiemposolucion='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end)/cast((sum(case when cumple_inc_tiemposolucion='1' or cumple_inc_tiemposolucion='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end inc_tiemposolucion_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='inc_tiemposolucion') as meta_inc_tiemposolucion_sat,\n" .
        "	 	\n" .
        "	 	 AVG(Cumple_EF) cumplenefic_presup_sat, AVG(total_ef) totefic_presup_sat, avg(cast(Cumple_EF as float))/avg(total_ef)*100  efic_presup_sat,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as meta_efic_presup_sat\n" .
        "from mc_c_ServContractual capc \n" .
        "left join (select * from [archivosxls].[dbo].l_calificacion_rs_aut_sat m\n" .
        "	where m.id_periodo= " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "    and m.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " and m.tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' and m.estatus ='F' \n" .
        "	and num_carga=(\n" .
        "       select max(b.num_carga)\n" .
        "       from [archivosxls].[dbo].l_calificacion_rs_aut_sat  b\n" .
        "       where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " \n" .
        "       and b.id_periodo =  " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        "       and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' \n" .
        "       and b.estatus='F'\n" .
        "       )) m on replace(capc.Descripcion,CHAR(9),'')  = m.servicio_cont  \n" .
        "	 left join	(select cumple_inc_tiempoasignacion, cumple_inc_tiempoSolucion, \n" .
        "				id_proveedor, 'Servicio de Soporte de Aplicaciones'  servicio_cont\n" .
        "				from [archivosxls].[dbo].l_calificacion_incidentes_AUT_sat\n" .
        "				where (id_periodo= " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "   and id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "  and tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'   and estatus ='F'\n" .
        "				and num_carga=(select max(b.num_carga) from [archivosxls].[dbo].l_calificacion_incidentes_aut_sat b \n" .
        "				where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "  and b.id_periodo =   " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "  and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'  and b.estatus='F' ) \n" .
        "				) )  mi on  mi.servicio_cont = replace(capc.Descripcion,CHAR(9),'') \n" .
        "	left join (select SUM(case when efic_presupuestal='1' then 1 else 0 end) Cumple_EF, COUNT(efic_presupuestal) Total_EF, Id_Proveedor,  2 IdServicioCont  \n" .
        "			from [archivosxls].[dbo].l_detalle_eficiencia_presupuestal_sat \n" .
        "			where (id_periodo=  " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "   and id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "  and tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'   and estatus ='F'\n" .
        "				and num_carga=(select max(b.num_carga) from [archivosxls].[dbo].l_detalle_eficiencia_presupuestal_sat b \n" .
        "				where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "  and b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "  and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'  and b.estatus='F' ) \n" .
        "				) group by id_proveedor ) ef on ef.IdServicioCont = capc.id\n" .
        "where capc.Aplica ='CDS' and IdOld <>0\n" .
        "group by capc.Descripcion\n" .
        ") as sat\n" .
        "left join (\n" .
        "select 	replace(sc.descripcion,CHAR(9),'') descripcion, mc.*\n" .
        " from mc_c_ServContractual sc left join (\n" .
        "select  \n" .
        "	 COUNT(HERR_EST_COST) totherr_est_cost, SUM(cast(HERR_EST_COST as int)) cumplenherr_est_cost, SUM(cast(HERR_EST_COST as float))/COUNT(HERR_EST_COST)*100 herr_est_cost,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='HERR_EST_COST') as meta_herr_est_cost,\n" .
        "	 COUNT(REQ_SERV) totreq_serv, SUM(cast(REQ_SERV as int)) cumplenreq_serv, SUM(cast(REQ_SERV as float))/COUNT(REQ_SERV)*100 req_serv,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='REQ_SERV') as meta_req_serv,\n" .
        "	 COUNT(CUMPL_REQ_FUNC) totcumpl_req_func, SUM(cast(CUMPL_REQ_FUNC as int)) cumplencumpl_req_func, SUM(cast(CUMPL_REQ_FUNC as float))/COUNT(CUMPL_REQ_FUNC)*100 cumpl_req_func,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='CUMPL_REQ_FUNC') as meta_cumpl_req_func,\n" .
        "	 COUNT(CALIDAD_PROD_TERM) totcalidad_prod_term, SUM(cast(CALIDAD_PROD_TERM as int)) cumplencalidad_prod_term, SUM(cast(CALIDAD_PROD_TERM as float))/COUNT(CALIDAD_PROD_TERM)*100 calidad_prod_term,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='CALIDAD_PROD_TERM') as meta_calidad_prod_term,\n" .
        "	 COUNT(RETR_ENTREGABLE) totretr_entregable, SUM(cast(RETR_ENTREGABLE as int)) cumplenretr_entregable, SUM(cast(RETR_ENTREGABLE as float))/COUNT(RETR_ENTREGABLE)*100 retr_entregable,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='RETR_ENTREGABLE') as meta_retr_entregable,\n" .
        "	 COUNT(CAL_COD) totcal_cod, SUM(cast(CAL_COD as int)) cumplencal_cod, SUM(cast(CAL_COD as float))/COUNT(CAL_COD)*100 cal_cod,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='CAL_COD') as meta_cal_cod,\n" .
        "	 COUNT(DEF_FUG_AMB_PROD) totdef_fug_amb_prod, SUM(cast(DEF_FUG_AMB_PROD as int)) cumplendef_fug_amb_prod, SUM(cast(DEF_FUG_AMB_PROD as float))/COUNT(DEF_FUG_AMB_PROD)*100  def_fug_amb_prod,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='DEF_FUG_AMB_PROD') as meta_def_fug_amb_prod,\n" .
        "	 COUNT(Cumple_Inc_TiempoAsignacion) totinc_tiempoasignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as int)) cumpleninc_tiempoasignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as float))/COUNT(Cumple_Inc_TiempoAsignacion)*100 inc_tiempoasignacion,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoSolucion') as meta_inc_tiemposolucion,\n" .
        "	 COUNT(Cumple_Inc_TiempoSolucion) totinc_tiemposolucion, SUM(cast(Cumple_Inc_TiempoSolucion as int)) cumpleninc_tiemposolucion, SUM(cast(Cumple_Inc_TiempoSolucion as float))/COUNT(Cumple_Inc_TiempoSolucion)*100 inc_tiemposolucion,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoAsignacion') as meta_inc_tiempoasignacion,\n" .
        "	AVG(Cumple_EF) cumplenefic_presup, AVG(total_ef) totefic_presup, avg(cast(Cumple_EF as float))/avg(total_ef)*100  efic_presup,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as meta_efic_presup,\n" .
        "	 sc.Id   id_servicio_cont \n" .
        "from mc_c_ServContractual sc \n" .
        "left join mc_calificacion_rs_MC m on sc.Id = m.id_servicio_cont \n" .
        "and m.IdUniverso in (select id from (\n" .
        "										select id,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo <> 'IN'\n" .
        "										) as uno\n" .
        "										where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "									)\n" .
        "and m.IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	 left join	(select mc.Cumple_DISP_SOPORTE, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.MesReporte , mc.AnioReporte ,  \n" .
        "				mc.id_proveedor, 5 IdServicioCont \n" .
        "				from mc_calificacion_incidentes_MC mc\n" .
        "				LEFT JOIN\n" .
        "                                periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio\n" .
        "				where (mc.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . ")  \n" .
        "				and pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        "				and mc.Id_incidente in (select numero from (\n" .
        "														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'\n" .
        "														) as uno\n" .
        "														where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "										) \n" .
        "				)  mi on  mi.IdServicioCont= sc.Id \n" .
        "left join  (select SUM(CumpleSLA) Cumple_EF, COUNT(CumpleSLA) Total_EF, Id_Proveedor, MesReporte , anioreporte , 2 IdServicioCont  \n" .
        "			from mc_eficiencia_presupuestal  where CumpleSLA in (1,0)  \n" .
        "			and (([GrupoAplicativos] not like 'Todos%' and (4<>4 or (MesReporte>2 and anioreporte >2013)) ) \n" .
        "					or (4=4 and MesReporte<=2 and anioreporte <2014 ) or 0=4)\n" .
        "			group by Id_Proveedor, MesReporte , anioreporte  ) ef \n" .
        "			on ef.Id_Proveedor  = m.id_proveedor  and m.MesReporte  = ef.MesReporte and m.AnioReporte  = ef.anioreporte  \n" .
        "				and ef.IdServicioCont= sc.Id \n" .
        "LEFT JOIN\n" .
        "            periodos_carga pc ON (m.MesReporte = pc.mes OR mi.MesReporte = pc.mes) AND (m.AnioReporte = pc.anio OR mi.AnioReporte = pc.anio)\n" .
        "								\n" .
        "where  pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        "			and (m.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " or mi.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " or  " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "=0)\n" .
        "group by sc.id\n" .
        ") as mc on sc.id = mc.id_servicio_cont \n" .
        "where sc.Aplica ='CDS'\n" .
        ") as cds on cds.descripcion = sat.descripcion_sat) cnt";
        $this->SQL = "select * from (\n" .
        "select  replace(capc.descripcion,CHAR(9),'') descripcion_sat,\n" .
        "	 sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end) totherr_est_cost_sat, \n" .
        "		sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end) cumplenherr_est_cost_sat, \n" .
        "		case when sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end)/cast((sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end herr_est_cost_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='herr_est_cost') as meta_herr_est_cost_sat,\n" .
        "	 \n" .
        "	 sum(case when req_serv='1' or req_serv='0' then 1 else 0 end) totreq_serv_sat, \n" .
        "		sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end) cumplenreq_serv_sat, \n" .
        "		case when sum(case when req_serv='1' or req_serv='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end)/cast((sum(case when req_serv='1' or req_serv='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end req_serv_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='req_serv') as meta_req_serv_sat,\n" .
        "	 \n" .
        "	 sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end) totcumpl_req_func_sat, \n" .
        "		sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as int) else 0 end) cumplencumpl_req_func_sat, \n" .
        "		case when sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as int) else 0 end)/cast((sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end cumpl_req_func_sat ,\n" .
        "	 (select meta from mc_c_metrica where acronimo='cumpl_req_func') as meta_cumpl_req_func_sat,\n" .
        "	 \n" .
        "	 \n" .
        "	 sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end) totcalidad_prod_term_sat, \n" .
        "		sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end) cumplencalidad_prod_term_sat, \n" .
        "		case when sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end)/\n" .
        "		 cast(	(sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end))AS float)*100 \n" .
        "		else 0 end calidad_prod_term_sat,\n" .
        "	 (select meta from mc_c_metrica where acronimo='calidad_prod_term') as meta_calidad_prod_term_sat,\n" .
        "	\n" .
        "	\n" .
        "	 sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end) totretr_entregable_sat, \n" .
        "		sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end) cumplenretr_entregable_sat, \n" .
        "		case when sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end)/cast((sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end retr_entregable_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='retr_entregable') as meta_retr_entregable_sat,\n" .
        "	 \n" .
        "	 sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end) totcal_cod_sat, \n" .
        "		sum(case when isnumeric(calidad_codigo)=1 then cast(calidad_codigo  as int) else 0 end) cumplencal_cod_sat, \n" .
        "		case when sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(calidad_codigo)=1 then cast(calidad_codigo  as int) else 0 end)/cast((sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end cal_cod_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='cal_cod') as meta_cal_cod_sat,\n" .
        "	 \n" .
        "	 sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end) totdef_fug_amb_prod_sat, \n" .
        "		sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end) cumplendef_fug_amb_prod_sat, \n" .
        "		case when sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end)/cast((sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end)) as float)*100  \n" .
        "		else 0 end def_fug_amb_prod_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='def_fug_amb_prod') as meta_def_fug_amb_prod_sat,\n" .
        "	 \n" .
        "	 sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end)  totinc_tiempoasignacion_sat, \n" .
        "		sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end) cumpleninc_tiempoasignacion_sat, \n" .
        "		case when sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end)/cast((sum(case when cumple_inc_tiempoasignacion='1' or cumple_inc_tiempoasignacion='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end inc_tiempoasignacion_sat,\n" .
        "	 (select meta from mc_c_metrica where acronimo='inc_tiempoasignacion') as meta_inc_tiempoasignacion_sat,\n" .
        "	\n" .
        "	 sum(case when cumple_inc_tiemposolucion='1' or cumple_inc_tiemposolucion='0' then 1 else 0 end) totinc_tiemposolucion_sat, \n" .
        "		sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end) cumpleninc_tiemposolucion_sat, \n" .
        "		case when sum(case when cumple_inc_tiemposolucion='1' or cumple_inc_tiemposolucion='0' then 1 else 0 end)>0 then \n" .
        "			sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end)/cast((sum(case when cumple_inc_tiemposolucion='1' or cumple_inc_tiemposolucion='0' then 1 else 0 end)) as float)*100 \n" .
        "		else 0 end inc_tiemposolucion_sat,	 \n" .
        "	 (select meta from mc_c_metrica where acronimo='inc_tiemposolucion') as meta_inc_tiemposolucion_sat,\n" .
        "	 	\n" .
        "	 	 AVG(Cumple_EF) cumplenefic_presup_sat, AVG(total_ef) totefic_presup_sat, avg(cast(Cumple_EF as float))/avg(total_ef)*100  efic_presup_sat,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as meta_efic_presup_sat\n" .
        "from mc_c_ServContractual capc \n" .
        "left join (select * from [archivosxls].[dbo].l_calificacion_rs_aut_sat m\n" .
        "	where m.id_periodo= " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "    and m.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " and m.tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' and m.estatus ='F' \n" .
        "	and num_carga=(\n" .
        "       select max(b.num_carga)\n" .
        "       from [archivosxls].[dbo].l_calificacion_rs_aut_sat  b\n" .
        "       where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " \n" .
        "       and b.id_periodo =  " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        "       and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' \n" .
        "       and b.estatus='F'\n" .
        "       )) m on replace(capc.Descripcion,CHAR(9),'')  = m.servicio_cont  \n" .
        "	 left join	(select cumple_inc_tiempoasignacion, cumple_inc_tiempoSolucion, \n" .
        "				id_proveedor, 'Servicio de Soporte de Aplicaciones'  servicio_cont\n" .
        "				from [archivosxls].[dbo].l_calificacion_incidentes_AUT_sat\n" .
        "				where (id_periodo= " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "   and id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "  and tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'   and estatus ='F'\n" .
        "				and num_carga=(select max(b.num_carga) from [archivosxls].[dbo].l_calificacion_incidentes_aut_sat b \n" .
        "				where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "  and b.id_periodo =   " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "  and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'  and b.estatus='F' ) \n" .
        "				) )  mi on  mi.servicio_cont = replace(capc.Descripcion,CHAR(9),'') \n" .
        "	left join (select SUM(case when efic_presupuestal='1' then 1 else 0 end) Cumple_EF, COUNT(efic_presupuestal) Total_EF, Id_Proveedor,  2 IdServicioCont  \n" .
        "			from [archivosxls].[dbo].l_detalle_eficiencia_presupuestal_sat \n" .
        "			where (id_periodo=  " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "   and id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "  and tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'   and estatus ='F'\n" .
        "				and num_carga=(select max(b.num_carga) from [archivosxls].[dbo].l_detalle_eficiencia_presupuestal_sat b \n" .
        "				where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "  and b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "  and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'  and b.estatus='F' ) \n" .
        "				) group by id_proveedor ) ef on ef.IdServicioCont = capc.id\n" .
        "where capc.Aplica ='CDS' and IdOld <>0\n" .
        "group by capc.Descripcion\n" .
        ") as sat\n" .
        "left join (\n" .
        "select 	replace(sc.descripcion,CHAR(9),'') descripcion, mc.*\n" .
        " from mc_c_ServContractual sc left join (\n" .
        "select  \n" .
        "	 COUNT(HERR_EST_COST) totherr_est_cost, SUM(cast(HERR_EST_COST as int)) cumplenherr_est_cost, SUM(cast(HERR_EST_COST as float))/COUNT(HERR_EST_COST)*100 herr_est_cost,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='HERR_EST_COST') as meta_herr_est_cost,\n" .
        "	 COUNT(REQ_SERV) totreq_serv, SUM(cast(REQ_SERV as int)) cumplenreq_serv, SUM(cast(REQ_SERV as float))/COUNT(REQ_SERV)*100 req_serv,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='REQ_SERV') as meta_req_serv,\n" .
        "	 COUNT(CUMPL_REQ_FUNC) totcumpl_req_func, SUM(cast(CUMPL_REQ_FUNC as int)) cumplencumpl_req_func, SUM(cast(CUMPL_REQ_FUNC as float))/COUNT(CUMPL_REQ_FUNC)*100 cumpl_req_func,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='CUMPL_REQ_FUNC') as meta_cumpl_req_func,\n" .
        "	 COUNT(CALIDAD_PROD_TERM) totcalidad_prod_term, SUM(cast(CALIDAD_PROD_TERM as int)) cumplencalidad_prod_term, SUM(cast(CALIDAD_PROD_TERM as float))/COUNT(CALIDAD_PROD_TERM)*100 calidad_prod_term,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='CALIDAD_PROD_TERM') as meta_calidad_prod_term,\n" .
        "	 COUNT(RETR_ENTREGABLE) totretr_entregable, SUM(cast(RETR_ENTREGABLE as int)) cumplenretr_entregable, SUM(cast(RETR_ENTREGABLE as float))/COUNT(RETR_ENTREGABLE)*100 retr_entregable,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='RETR_ENTREGABLE') as meta_retr_entregable,\n" .
        "	 COUNT(CAL_COD) totcal_cod, SUM(cast(CAL_COD as int)) cumplencal_cod, SUM(cast(CAL_COD as float))/COUNT(CAL_COD)*100 cal_cod,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='CAL_COD') as meta_cal_cod,\n" .
        "	 COUNT(DEF_FUG_AMB_PROD) totdef_fug_amb_prod, SUM(cast(DEF_FUG_AMB_PROD as int)) cumplendef_fug_amb_prod, SUM(cast(DEF_FUG_AMB_PROD as float))/COUNT(DEF_FUG_AMB_PROD)*100  def_fug_amb_prod,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='DEF_FUG_AMB_PROD') as meta_def_fug_amb_prod,\n" .
        "	 COUNT(Cumple_Inc_TiempoAsignacion) totinc_tiempoasignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as int)) cumpleninc_tiempoasignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as float))/COUNT(Cumple_Inc_TiempoAsignacion)*100 inc_tiempoasignacion,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoSolucion') as meta_inc_tiemposolucion,\n" .
        "	 COUNT(Cumple_Inc_TiempoSolucion) totinc_tiemposolucion, SUM(cast(Cumple_Inc_TiempoSolucion as int)) cumpleninc_tiemposolucion, SUM(cast(Cumple_Inc_TiempoSolucion as float))/COUNT(Cumple_Inc_TiempoSolucion)*100 inc_tiemposolucion,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='Inc_TiempoAsignacion') as meta_inc_tiempoasignacion,\n" .
        "	AVG(Cumple_EF) cumplenefic_presup, AVG(total_ef) totefic_presup, avg(cast(Cumple_EF as float))/avg(total_ef)*100  efic_presup,\n" .
        "	 (Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as meta_efic_presup,\n" .
        "	 sc.Id   id_servicio_cont \n" .
        "from mc_c_ServContractual sc \n" .
        "left join mc_calificacion_rs_MC m on sc.Id = m.id_servicio_cont \n" .
        "and m.IdUniverso in (select id from (\n" .
        "										select id,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo <> 'IN'\n" .
        "										) as uno\n" .
        "										where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "									)\n" .
        "and m.IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	 left join	(select mc.Cumple_DISP_SOPORTE, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.MesReporte , mc.AnioReporte ,  \n" .
        "				mc.id_proveedor, 5 IdServicioCont \n" .
        "				from mc_calificacion_incidentes_MC mc\n" .
        "				LEFT JOIN\n" .
        "                                periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio\n" .
        "				where (mc.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . ")  \n" .
        "				and pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        "				and mc.Id_incidente in (select numero from (\n" .
        "														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'\n" .
        "														) as uno\n" .
        "														where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "										) \n" .
        "				)  mi on  mi.IdServicioCont= sc.Id \n" .
        "left join  (select SUM(CumpleSLA) Cumple_EF, COUNT(CumpleSLA) Total_EF, Id_Proveedor, MesReporte , anioreporte , 2 IdServicioCont  \n" .
        "			from mc_eficiencia_presupuestal  where CumpleSLA in (1,0)  \n" .
        "			and (([GrupoAplicativos] not like 'Todos%' and (4<>4 or (MesReporte>2 and anioreporte >2013)) ) \n" .
        "					or (4=4 and MesReporte<=2 and anioreporte <2014 ) or 0=4)\n" .
        "			group by Id_Proveedor, MesReporte , anioreporte  ) ef \n" .
        "			on ef.Id_Proveedor  = m.id_proveedor  and m.MesReporte  = ef.MesReporte and m.AnioReporte  = ef.anioreporte  \n" .
        "				and ef.IdServicioCont= sc.Id \n" .
        "LEFT JOIN\n" .
        "            periodos_carga pc ON (m.MesReporte = pc.mes OR mi.MesReporte = pc.mes) AND (m.AnioReporte = pc.anio OR mi.AnioReporte = pc.anio)\n" .
        "								\n" .
        "where  pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        "			and (m.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " or mi.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " or  " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "=0)\n" .
        "group by sc.id\n" .
        ") as mc on sc.id = mc.id_servicio_cont \n" .
        "where sc.Aplica ='CDS'\n" .
        ") as cds on cds.descripcion = sat.descripcion_sat";
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

//SetValues Method @24-5E75ED39
    function SetValues()
    {
        $this->descripcion_sat->SetDBValue($this->f("descripcion_sat"));
        $this->totherr_est_cost_sat->SetDBValue(trim($this->f("totherr_est_cost_sat")));
        $this->totherr_est_cost->SetDBValue(trim($this->f("totherr_est_cost")));
        $this->totreq_serv_sat->SetDBValue(trim($this->f("totreq_serv_sat")));
        $this->totreq_serv->SetDBValue(trim($this->f("totreq_serv")));
        $this->totcumpl_req_func_sat->SetDBValue(trim($this->f("totcumpl_req_func_sat")));
        $this->totcumpl_req_func->SetDBValue(trim($this->f("totcumpl_req_func")));
        $this->totcalidad_prod_term_sat->SetDBValue(trim($this->f("totcalidad_prod_term_sat")));
        $this->totcalidad_prod_term->SetDBValue(trim($this->f("totcalidad_prod_term")));
        $this->totretr_entregable_sat->SetDBValue(trim($this->f("totretr_entregable_sat")));
        $this->totretr_entregable->SetDBValue(trim($this->f("totretr_entregable")));
        $this->totcal_cod_sat->SetDBValue(trim($this->f("totcal_cod_sat")));
        $this->totcal_cod->SetDBValue(trim($this->f("totcal_cod")));
        $this->totdef_fug_amb_prod_sat->SetDBValue(trim($this->f("totdef_fug_amb_prod_sat")));
        $this->totdef_fug_amb_prod->SetDBValue(trim($this->f("totdef_fug_amb_prod")));
        $this->totinc_tiempoasignacion_sat->SetDBValue(trim($this->f("totinc_tiempoasignacion_sat")));
        $this->totinc_tiempoasignacion->SetDBValue(trim($this->f("totinc_tiempoasignacion")));
        $this->totinc_tiemposolucion_sat->SetDBValue(trim($this->f("totinc_tiemposolucion_sat")));
        $this->totinc_tiemposolucion->SetDBValue(trim($this->f("totinc_tiemposolucion")));
        $this->cumplenefic_presup_sat->SetDBValue(trim($this->f("cumplenefic_presup_sat")));
        $this->cumplenefic_presup->SetDBValue(trim($this->f("cumplenefic_presup")));
        $this->cumplenherr_est_cost_sat->SetDBValue(trim($this->f("cumplenherr_est_cost_sat")));
        $this->herr_est_cost_sat->SetDBValue(trim($this->f("herr_est_cost_sat")));
        $this->meta_herr_est_cost_sat->SetDBValue(trim($this->f("meta_herr_est_cost_sat")));
        $this->cumplenherr_est_cost->SetDBValue(trim($this->f("cumplenherr_est_cost")));
        $this->herr_est_cost->SetDBValue(trim($this->f("herr_est_cost")));
        $this->meta_herr_est_cost->SetDBValue(trim($this->f("meta_herr_est_cost")));
        $this->cumplenreq_serv_sat->SetDBValue(trim($this->f("cumplenreq_serv_sat")));
        $this->req_serv_sat->SetDBValue(trim($this->f("req_serv_sat")));
        $this->meta_req_serv_sat->SetDBValue(trim($this->f("meta_req_serv_sat")));
        $this->cumplenreq_serv->SetDBValue(trim($this->f("cumplenreq_serv")));
        $this->req_serv->SetDBValue(trim($this->f("req_serv")));
        $this->meta_req_serv->SetDBValue(trim($this->f("meta_req_serv")));
        $this->cumplencumpl_req_func_sat->SetDBValue(trim($this->f("cumplencumpl_req_func_sat")));
        $this->cumpl_req_func_sat->SetDBValue(trim($this->f("cumpl_req_func_sat")));
        $this->meta_cumpl_req_func_sat->SetDBValue(trim($this->f("meta_cumpl_req_func_sat")));
        $this->cumplencumpl_req_func->SetDBValue(trim($this->f("cumplencumpl_req_func")));
        $this->cumpl_req_func->SetDBValue(trim($this->f("cumpl_req_func")));
        $this->meta_cumpl_req_func->SetDBValue(trim($this->f("meta_cumpl_req_func")));
        $this->cumplencalidad_prod_term_sat->SetDBValue(trim($this->f("cumplencalidad_prod_term_sat")));
        $this->calidad_prod_term_sat->SetDBValue(trim($this->f("calidad_prod_term_sat")));
        $this->meta_calidad_prod_term_sat->SetDBValue(trim($this->f("meta_calidad_prod_term_sat")));
        $this->cumplencalidad_prod_term->SetDBValue(trim($this->f("cumplencalidad_prod_term")));
        $this->calidad_prod_term->SetDBValue(trim($this->f("calidad_prod_term")));
        $this->meta_calidad_prod_term->SetDBValue(trim($this->f("meta_calidad_prod_term")));
        $this->cumplenretr_entregable_sat->SetDBValue(trim($this->f("cumplenretr_entregable_sat")));
        $this->retr_entregable_sat->SetDBValue(trim($this->f("retr_entregable_sat")));
        $this->meta_retr_entregable_sat->SetDBValue(trim($this->f("meta_retr_entregable_sat")));
        $this->cumplenretr_entregable->SetDBValue(trim($this->f("cumplenretr_entregable")));
        $this->retr_entregable->SetDBValue(trim($this->f("retr_entregable")));
        $this->meta_retr_entregable->SetDBValue(trim($this->f("meta_retr_entregable")));
        $this->cumplencal_cod_sat->SetDBValue(trim($this->f("cumplencal_cod_sat")));
        $this->cal_cod_sat->SetDBValue(trim($this->f("cal_cod_sat")));
        $this->meta_cal_cod_sat->SetDBValue(trim($this->f("meta_cal_cod_sat")));
        $this->cumplencal_cod->SetDBValue(trim($this->f("cumplencal_cod")));
        $this->cal_cod->SetDBValue(trim($this->f("cal_cod")));
        $this->meta_cal_cod->SetDBValue(trim($this->f("meta_cal_cod")));
        $this->cumplendef_fug_amb_prod_sat->SetDBValue(trim($this->f("cumplendef_fug_amb_prod_sat")));
        $this->def_fug_amb_prod_sat->SetDBValue(trim($this->f("def_fug_amb_prod_sat")));
        $this->meta_def_fug_amb_prod_sat->SetDBValue(trim($this->f("meta_def_fug_amb_prod_sat")));
        $this->cumplendef_fug_amb_prod->SetDBValue(trim($this->f("cumplendef_fug_amb_prod")));
        $this->def_fug_amb_prod->SetDBValue(trim($this->f("def_fug_amb_prod")));
        $this->meta_def_fug_amb_prod->SetDBValue(trim($this->f("meta_def_fug_amb_prod")));
        $this->cumpleninc_tiempoasignacion_sat->SetDBValue(trim($this->f("cumpleninc_tiempoasignacion_sat")));
        $this->inc_tiempoasignacion_sat->SetDBValue(trim($this->f("inc_tiempoasignacion_sat")));
        $this->meta_inc_tiempoasignacion_sat->SetDBValue(trim($this->f("meta_inc_tiempoasignacion_sat")));
        $this->cumpleninc_tiempoasignacion->SetDBValue(trim($this->f("cumpleninc_tiempoasignacion")));
        $this->inc_tiempoasignacion->SetDBValue(trim($this->f("inc_tiempoasignacion")));
        $this->cumpleninc_tiemposolucion_sat->SetDBValue(trim($this->f("cumpleninc_tiemposolucion_sat")));
        $this->inc_tiemposolucion_sat->SetDBValue(trim($this->f("inc_tiemposolucion_sat")));
        $this->meta_inc_tiemposolucion_sat->SetDBValue(trim($this->f("meta_inc_tiemposolucion_sat")));
        $this->cumpleninc_tiemposolucion->SetDBValue(trim($this->f("cumpleninc_tiemposolucion")));
        $this->inc_tiemposolucion->SetDBValue(trim($this->f("inc_tiemposolucion")));
        $this->totefic_presup_sat->SetDBValue(trim($this->f("totefic_presup_sat")));
        $this->efic_presup_sat->SetDBValue(trim($this->f("efic_presup_sat")));
        $this->meta_efic_presup_sat->SetDBValue(trim($this->f("meta_efic_presup_sat")));
        $this->totefic_presup->SetDBValue(trim($this->f("totefic_presup")));
        $this->efic_presup->SetDBValue(trim($this->f("efic_presup")));
        $this->meta_efic_presup->SetDBValue(trim($this->f("meta_efic_presup")));
        $this->meta_inc_tiempoasignacion->SetDBValue(trim($this->f("meta_inc_tiempoasignacion")));
        $this->meta_inc_tiemposolucion->SetDBValue(trim($this->f("meta_inc_tiemposolucion")));
    }
//End SetValues Method

} //End Grid2DataSource Class @24-FCB6E20C

class clsGridGrid1 { //Grid1 class @9-E857A572

//Variables @9-F0251385

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
    public $Sorter_Medicion_sat;
    public $Sorter_Total_sat;
    public $Sorter_Total_capc;
//End Variables

//Class_Initialize Event @9-1604A3E7
    function clsGridGrid1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Grid1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid Grid1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsGrid1DataSource($this);
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
        $this->SorterName = CCGetParam("Grid1Order", "");
        $this->SorterDirection = CCGetParam("Grid1Dir", "");

        $this->Medicion_sat = new clsControl(ccsLabel, "Medicion_sat", "Medicion_sat", ccsText, "", CCGetRequestParam("Medicion_sat", ccsGet, NULL), $this);
        $this->Total_sat = new clsControl(ccsLabel, "Total_sat", "Total_sat", ccsInteger, "", CCGetRequestParam("Total_sat", ccsGet, NULL), $this);
        $this->Total_capc = new clsControl(ccsLabel, "Total_capc", "Total_capc", ccsInteger, "", CCGetRequestParam("Total_capc", ccsGet, NULL), $this);
        $this->Sorter_Medicion_sat = new clsSorter($this->ComponentName, "Sorter_Medicion_sat", $FileName, $this);
        $this->Sorter_Total_sat = new clsSorter($this->ComponentName, "Sorter_Total_sat", $FileName, $this);
        $this->Sorter_Total_capc = new clsSorter($this->ComponentName, "Sorter_Total_capc", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @9-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @9-6BA7BB09
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_id_periodo"] = CCGetFromGet("s_id_periodo", NULL);
        $this->DataSource->Parameters["urls_opt_slas"] = CCGetFromGet("s_opt_slas", NULL);

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
            $this->ControlsVisible["Medicion_sat"] = $this->Medicion_sat->Visible;
            $this->ControlsVisible["Total_sat"] = $this->Total_sat->Visible;
            $this->ControlsVisible["Total_capc"] = $this->Total_capc->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Medicion_sat->SetValue($this->DataSource->Medicion_sat->GetValue());
                $this->Total_sat->SetValue($this->DataSource->Total_sat->GetValue());
                $this->Total_capc->SetValue($this->DataSource->Total_capc->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Medicion_sat->Show();
                $this->Total_sat->Show();
                $this->Total_capc->Show();
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
        $this->Sorter_Medicion_sat->Show();
        $this->Sorter_Total_sat->Show();
        $this->Sorter_Total_capc->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @9-C9E7FB85
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Medicion_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Total_sat->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Total_capc->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @9-FCB6E20C

class clsGrid1DataSource extends clsDBcnDisenio {  //Grid1DataSource Class @9-9B337F8E

//DataSource Variables @9-9080F43D
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Medicion_sat;
    public $Total_sat;
    public $Total_capc;
//End DataSource Variables

//DataSourceClass_Initialize Event @9-DE9094FC
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->Medicion_sat = new clsField("Medicion_sat", ccsText, "");
        
        $this->Total_sat = new clsField("Total_sat", ccsInteger, "");
        
        $this->Total_capc = new clsField("Total_capc", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @9-AC78773F
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Medicion_sat" => array("Medicion_sat", ""), 
            "Sorter_Total_sat" => array("Total_sat", ""), 
            "Sorter_Total_capc" => array("Total_capc", "")));
    }
//End SetOrder Method

//Prepare Method @9-BB2E3F5A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 2, false);
        $this->wp->AddParameter("2", "urls_id_periodo", ccsInteger, "", "", $this->Parameters["urls_id_periodo"], 31, false);
        $this->wp->AddParameter("3", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], 'SLA', false);
    }
//End Prepare Method

//Open Method @9-E7557E17
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT sat.Medicion Medicion_sat,sat.Total Total_sat,capc.Total Total_capc \n" .
        "FROM resumen_SAT sat LEFT JOIN resumen_CAPC capc ON sat.Medicion=capc.Medicion \n" .
        "WHERE sat.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " \n" .
        "AND sat.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "AND sat.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND sat.id_periodo = capc.id_periodo \n" .
        "AND sat.id_proveedor = capc.id_proveedor \n" .
        "AND sat.tipo_nivel_servicio = capc.tipo_nivel_servicio\n" .
        "AND sat.fecha_visible<=getDATE()) cnt";
        $this->SQL = "SELECT sat.Medicion Medicion_sat,sat.Total Total_sat,capc.Total Total_capc \n" .
        "FROM resumen_SAT sat LEFT JOIN resumen_CAPC capc ON sat.Medicion=capc.Medicion \n" .
        "WHERE sat.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " \n" .
        "AND sat.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "AND sat.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND sat.id_periodo = capc.id_periodo \n" .
        "AND sat.id_proveedor = capc.id_proveedor \n" .
        "AND sat.tipo_nivel_servicio = capc.tipo_nivel_servicio\n" .
        "AND sat.fecha_visible<=getDATE()";
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

//SetValues Method @9-92228B9A
    function SetValues()
    {
        $this->Medicion_sat->SetDBValue($this->f("Medicion_sat"));
        $this->Total_sat->SetDBValue(trim($this->f("Total_sat")));
        $this->Total_capc->SetDBValue(trim($this->f("Total_capc")));
    }
//End SetValues Method

} //End Grid1DataSource Class @9-FCB6E20C



//Initialize Page @1-6BC8681F
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
$TemplateFileName = "comparativo_resumen.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-04D09F14
include_once("./comparativo_resumen_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-AACA5150
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$periodos_carga = new clsRecordperiodos_carga("", $MainPage);
$Grid2 = new clsGridGrid2("", $MainPage);
$Grid1 = new clsGridGrid1("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->periodos_carga = & $periodos_carga;
$MainPage->Grid2 = & $Grid2;
$MainPage->Grid1 = & $Grid1;
$Grid2->Initialize();
$Grid1->Initialize();
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

//Execute Components @1-4D47654B
$periodos_carga->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-AFED0E36
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($periodos_carga);
    unset($Grid2);
    unset($Grid1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-57AF4633
$Header->Show();
$periodos_carga->Show();
$Grid2->Show();
$Grid1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C5C95713
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($periodos_carga);
unset($Grid2);
unset($Grid1);
unset($Tpl);
//End Unload Page


?>
