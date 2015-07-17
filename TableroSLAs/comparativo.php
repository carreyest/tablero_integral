<?php
//Include Common Files @1-22705CE2
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "comparativo.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



//Include Page implementation @56-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation



class clsRecordl_calificacion_incidentes1 { //l_calificacion_incidentes1 Class @352-2A0C9BE3

//Variables @352-9E315808

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

//Class_Initialize Event @352-0CDD8802
    function clsRecordl_calificacion_incidentes1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record l_calificacion_incidentes1/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "l_calificacion_incidentes1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "CDS", ccsText, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsSQL;
            $this->s_id_proveedor->DataSource = new clsDBcon_xls();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nom_proveedor", "");
            $this->s_id_proveedor->DataSource->Parameters["sesid_proveedor"] = CCGetSession("id_proveedor", NULL);
            $this->s_id_proveedor->DataSource->Parameters["sescapc_cds"] = CCGetSession("capc_cds", NULL);
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "sesid_proveedor", ccsInteger, "", "", $this->s_id_proveedor->DataSource->Parameters["sesid_proveedor"], 0, false);
            $this->s_id_proveedor->DataSource->wp->AddParameter("2", "sescapc_cds", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["sescapc_cds"], "", false);
            $this->s_id_proveedor->DataSource->SQL = "SELECT distinct id_proveedor, nom_proveedor \n" .
            "FROM usuario \n" .
            "where id_proveedor<>0 and \n" .
            "capc_cds='CDS'\n" .
            "\n" .
            "\n" .
            "";
            $this->s_id_proveedor->DataSource->Order = "";
            $this->s_id_proveedor->Required = true;
            $this->s_id_periodo = new clsControl(ccsListBox, "s_id_periodo", "s_id_periodo", ccsText, "", CCGetRequestParam("s_id_periodo", $Method, NULL), $this);
            $this->s_id_periodo->DSType = dsSQL;
            $this->s_id_periodo->DataSource = new clsDBcon_xls();
            $this->s_id_periodo->ds = & $this->s_id_periodo->DataSource;
            list($this->s_id_periodo->BoundColumn, $this->s_id_periodo->TextColumn, $this->s_id_periodo->DBFormat) = array("id_periodo", "periodo", "");
            $this->s_id_periodo->DataSource->Parameters["sesid_proveedor"] = CCGetSession("id_proveedor", NULL);
            $this->s_id_periodo->DataSource->wp = new clsSQLParameters();
            $this->s_id_periodo->DataSource->wp->AddParameter("1", "sesid_proveedor", ccsInteger, "", "", $this->s_id_periodo->DataSource->Parameters["sesid_proveedor"], 0, false);
            $this->s_id_periodo->DataSource->SQL = "select distinct id_periodo,  periodo+tipo_periodo as periodo\n" .
            "from periodos_hist\n" .
            "where (id_proveedor=0 or id_proveedor=" . $this->s_id_periodo->DataSource->SQLValue($this->s_id_periodo->DataSource->wp->GetDBValue("1"), ccsInteger) . " or " . $this->s_id_periodo->DataSource->SQLValue($this->s_id_periodo->DataSource->wp->GetDBValue("1"), ccsInteger) . " =1)";
            $this->s_id_periodo->DataSource->Order = "";
            $this->s_id_periodo->Required = true;
            $this->lb_periodo_fecha_carga2 = new clsControl(ccsLabel, "lb_periodo_fecha_carga2", "lb_periodo_fecha_carga2", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "hh", ":", "mm"), CCGetRequestParam("lb_periodo_fecha_carga2", $Method, NULL), $this);
            $this->lb_periodo_fecha_carga2->HTML = true;
            $this->lb_nom_periodo = new clsControl(ccsLabel, "lb_nom_periodo", "lb_nom_periodo", ccsText, "", CCGetRequestParam("lb_nom_periodo", $Method, NULL), $this);
            $this->lb_nom_periodo->HTML = true;
            $this->Label1 = new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", $Method, NULL), $this);
            $this->s_opt_slas = new clsControl(ccsListBox, "s_opt_slas", "s_opt_slas", ccsText, "", CCGetRequestParam("s_opt_slas", $Method, NULL), $this);
            $this->s_opt_slas->DSType = dsListOfValues;
            $this->s_opt_slas->Values = array(array("SLA", "SLA"), array("SLO", "SLO"));
            $this->s_opt_slas->Required = true;
        }
    }
//End Class_Initialize Event

//Validate Method @352-B510F28A
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_id_periodo->Validate() && $Validation);
        $Validation = ($this->s_opt_slas->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_periodo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_opt_slas->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @352-63111507
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_id_periodo->Errors->Count());
        $errors = ($errors || $this->lb_periodo_fecha_carga2->Errors->Count());
        $errors = ($errors || $this->lb_nom_periodo->Errors->Count());
        $errors = ($errors || $this->Label1->Errors->Count());
        $errors = ($errors || $this->s_opt_slas->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @352-DD94EE4C
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

//Show Method @352-F688C745
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
        $this->s_id_periodo->Prepare();
        $this->s_opt_slas->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_periodo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lb_periodo_fecha_carga2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lb_nom_periodo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Label1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_opt_slas->Errors->ToString());
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
        $this->s_id_periodo->Show();
        $this->lb_periodo_fecha_carga2->Show();
        $this->lb_nom_periodo->Show();
        $this->Label1->Show();
        $this->s_opt_slas->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End l_calificacion_incidentes1 Class @352-FCB6E20C



class clsGridGrid1 { //Grid1 class @2-E857A572

//Variables @2-6E51DF5A

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

//Class_Initialize Event @2-8BD59462
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
            $this->PageSize = 15;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->descripcion = new clsControl(ccsLabel, "descripcion", "descripcion", ccsText, "", CCGetRequestParam("descripcion", ccsGet, NULL), $this);
        $this->cumplenherr_est_cost = new clsControl(ccsLabel, "cumplenherr_est_cost", "cumplenherr_est_cost", ccsInteger, "", CCGetRequestParam("cumplenherr_est_cost", ccsGet, NULL), $this);
        $this->cumplenreq_serv = new clsControl(ccsLabel, "cumplenreq_serv", "cumplenreq_serv", ccsInteger, "", CCGetRequestParam("cumplenreq_serv", ccsGet, NULL), $this);
        $this->cumplencumpl_req_func = new clsControl(ccsLabel, "cumplencumpl_req_func", "cumplencumpl_req_func", ccsInteger, "", CCGetRequestParam("cumplencumpl_req_func", ccsGet, NULL), $this);
        $this->cumplencalidad_prod_term = new clsControl(ccsLabel, "cumplencalidad_prod_term", "cumplencalidad_prod_term", ccsInteger, "", CCGetRequestParam("cumplencalidad_prod_term", ccsGet, NULL), $this);
        $this->cumplenretr_entregable = new clsControl(ccsLabel, "cumplenretr_entregable", "cumplenretr_entregable", ccsInteger, "", CCGetRequestParam("cumplenretr_entregable", ccsGet, NULL), $this);
        $this->cumplencal_cod = new clsControl(ccsLabel, "cumplencal_cod", "cumplencal_cod", ccsInteger, "", CCGetRequestParam("cumplencal_cod", ccsGet, NULL), $this);
        $this->cumplendef_fug_amb_prod = new clsControl(ccsLabel, "cumplendef_fug_amb_prod", "cumplendef_fug_amb_prod", ccsInteger, "", CCGetRequestParam("cumplendef_fug_amb_prod", ccsGet, NULL), $this);
        $this->totherr_est_cost = new clsControl(ccsLabel, "totherr_est_cost", "totherr_est_cost", ccsInteger, "", CCGetRequestParam("totherr_est_cost", ccsGet, NULL), $this);
        $this->herr_est_cost = new clsControl(ccsLabel, "herr_est_cost", "herr_est_cost", ccsText, "", CCGetRequestParam("herr_est_cost", ccsGet, NULL), $this);
        $this->herr_est_cost->HTML = true;
        $this->meta_herr_est_cost = new clsControl(ccsHidden, "meta_herr_est_cost", "meta_herr_est_cost", ccsFloat, "", CCGetRequestParam("meta_herr_est_cost", ccsGet, NULL), $this);
        $this->totreq_serv = new clsControl(ccsLabel, "totreq_serv", "totreq_serv", ccsInteger, "", CCGetRequestParam("totreq_serv", ccsGet, NULL), $this);
        $this->req_serv = new clsControl(ccsLabel, "req_serv", "req_serv", ccsText, "", CCGetRequestParam("req_serv", ccsGet, NULL), $this);
        $this->req_serv->HTML = true;
        $this->meta_req_serv = new clsControl(ccsHidden, "meta_req_serv", "meta_req_serv", ccsFloat, "", CCGetRequestParam("meta_req_serv", ccsGet, NULL), $this);
        $this->totcumpl_req_func = new clsControl(ccsLabel, "totcumpl_req_func", "totcumpl_req_func", ccsInteger, "", CCGetRequestParam("totcumpl_req_func", ccsGet, NULL), $this);
        $this->cumpl_req_func = new clsControl(ccsLabel, "cumpl_req_func", "cumpl_req_func", ccsText, "", CCGetRequestParam("cumpl_req_func", ccsGet, NULL), $this);
        $this->cumpl_req_func->HTML = true;
        $this->meta_cumpl_req_func = new clsControl(ccsHidden, "meta_cumpl_req_func", "meta_cumpl_req_func", ccsFloat, "", CCGetRequestParam("meta_cumpl_req_func", ccsGet, NULL), $this);
        $this->totcalidad_prod_term = new clsControl(ccsLabel, "totcalidad_prod_term", "totcalidad_prod_term", ccsInteger, "", CCGetRequestParam("totcalidad_prod_term", ccsGet, NULL), $this);
        $this->calidad_prod_term = new clsControl(ccsLabel, "calidad_prod_term", "calidad_prod_term", ccsText, "", CCGetRequestParam("calidad_prod_term", ccsGet, NULL), $this);
        $this->calidad_prod_term->HTML = true;
        $this->meta_calidad_prod_term = new clsControl(ccsHidden, "meta_calidad_prod_term", "meta_calidad_prod_term", ccsFloat, "", CCGetRequestParam("meta_calidad_prod_term", ccsGet, NULL), $this);
        $this->totretr_entregable = new clsControl(ccsLabel, "totretr_entregable", "totretr_entregable", ccsInteger, "", CCGetRequestParam("totretr_entregable", ccsGet, NULL), $this);
        $this->retr_entregable = new clsControl(ccsLabel, "retr_entregable", "retr_entregable", ccsText, "", CCGetRequestParam("retr_entregable", ccsGet, NULL), $this);
        $this->retr_entregable->HTML = true;
        $this->meta_retr_entregable = new clsControl(ccsHidden, "meta_retr_entregable", "meta_retr_entregable", ccsFloat, "", CCGetRequestParam("meta_retr_entregable", ccsGet, NULL), $this);
        $this->totcal_cod = new clsControl(ccsLabel, "totcal_cod", "totcal_cod", ccsInteger, "", CCGetRequestParam("totcal_cod", ccsGet, NULL), $this);
        $this->cal_cod = new clsControl(ccsLabel, "cal_cod", "cal_cod", ccsText, "", CCGetRequestParam("cal_cod", ccsGet, NULL), $this);
        $this->cal_cod->HTML = true;
        $this->meta_cal_cod = new clsControl(ccsHidden, "meta_cal_cod", "meta_cal_cod", ccsFloat, "", CCGetRequestParam("meta_cal_cod", ccsGet, NULL), $this);
        $this->totdef_fug_amb_prod = new clsControl(ccsLabel, "totdef_fug_amb_prod", "totdef_fug_amb_prod", ccsInteger, "", CCGetRequestParam("totdef_fug_amb_prod", ccsGet, NULL), $this);
        $this->def_fug_amb_prod = new clsControl(ccsLabel, "def_fug_amb_prod", "def_fug_amb_prod", ccsText, "", CCGetRequestParam("def_fug_amb_prod", ccsGet, NULL), $this);
        $this->def_fug_amb_prod->HTML = true;
        $this->meta_def_fug_amb_prod = new clsControl(ccsHidden, "meta_def_fug_amb_prod", "meta_def_fug_amb_prod", ccsFloat, "", CCGetRequestParam("meta_def_fug_amb_prod", ccsGet, NULL), $this);
        $this->imgherr_est_cost = new clsControl(ccsImage, "imgherr_est_cost", "imgherr_est_cost", ccsText, "", CCGetRequestParam("imgherr_est_cost", ccsGet, NULL), $this);
        $this->imgreq_serv = new clsControl(ccsImage, "imgreq_serv", "imgreq_serv", ccsText, "", CCGetRequestParam("imgreq_serv", ccsGet, NULL), $this);
        $this->imgcumpl_req_func = new clsControl(ccsImage, "imgcumpl_req_func", "imgcumpl_req_func", ccsText, "", CCGetRequestParam("imgcumpl_req_func", ccsGet, NULL), $this);
        $this->imgcalidad_prod_term = new clsControl(ccsImage, "imgcalidad_prod_term", "imgcalidad_prod_term", ccsText, "", CCGetRequestParam("imgcalidad_prod_term", ccsGet, NULL), $this);
        $this->imgretr_entregable = new clsControl(ccsImage, "imgretr_entregable", "imgretr_entregable", ccsText, "", CCGetRequestParam("imgretr_entregable", ccsGet, NULL), $this);
        $this->imgcal_cod = new clsControl(ccsImage, "imgcal_cod", "imgcal_cod", ccsText, "", CCGetRequestParam("imgcal_cod", ccsGet, NULL), $this);
        $this->imgdef_fug_amb_prod = new clsControl(ccsImage, "imgdef_fug_amb_prod", "imgdef_fug_amb_prod", ccsText, "", CCGetRequestParam("imgdef_fug_amb_prod", ccsGet, NULL), $this);
        $this->cumpleninc_tiempoasignacion = new clsControl(ccsLabel, "cumpleninc_tiempoasignacion", "cumpleninc_tiempoasignacion", ccsInteger, "", CCGetRequestParam("cumpleninc_tiempoasignacion", ccsGet, NULL), $this);
        $this->totinc_tiempoasignacion = new clsControl(ccsLabel, "totinc_tiempoasignacion", "totinc_tiempoasignacion", ccsInteger, "", CCGetRequestParam("totinc_tiempoasignacion", ccsGet, NULL), $this);
        $this->inc_tiempoasignacion = new clsControl(ccsLabel, "inc_tiempoasignacion", "inc_tiempoasignacion", ccsText, "", CCGetRequestParam("inc_tiempoasignacion", ccsGet, NULL), $this);
        $this->inc_tiempoasignacion->HTML = true;
        $this->meta_inc_tiempoasignacion = new clsControl(ccsHidden, "meta_inc_tiempoasignacion", "meta_inc_tiempoasignacion", ccsInteger, "", CCGetRequestParam("meta_inc_tiempoasignacion", ccsGet, NULL), $this);
        $this->cumpleninc_tiemposolucion = new clsControl(ccsLabel, "cumpleninc_tiemposolucion", "cumpleninc_tiemposolucion", ccsInteger, "", CCGetRequestParam("cumpleninc_tiemposolucion", ccsGet, NULL), $this);
        $this->totinc_tiemposolucion = new clsControl(ccsLabel, "totinc_tiemposolucion", "totinc_tiemposolucion", ccsInteger, "", CCGetRequestParam("totinc_tiemposolucion", ccsGet, NULL), $this);
        $this->inc_tiemposolucion = new clsControl(ccsLabel, "inc_tiemposolucion", "inc_tiemposolucion", ccsText, "", CCGetRequestParam("inc_tiemposolucion", ccsGet, NULL), $this);
        $this->inc_tiemposolucion->HTML = true;
        $this->meta_inc_tiemposolucion = new clsControl(ccsHidden, "meta_inc_tiemposolucion", "meta_inc_tiemposolucion", ccsInteger, "", CCGetRequestParam("meta_inc_tiemposolucion", ccsGet, NULL), $this);
        $this->imginc_tiempoasignacion = new clsControl(ccsImage, "imginc_tiempoasignacion", "imginc_tiempoasignacion", ccsText, "", CCGetRequestParam("imginc_tiempoasignacion", ccsGet, NULL), $this);
        $this->imginc_tiemposolucion = new clsControl(ccsImage, "imginc_tiemposolucion", "imginc_tiemposolucion", ccsText, "", CCGetRequestParam("imginc_tiemposolucion", ccsGet, NULL), $this);
        $this->imgefic_presup = new clsControl(ccsImage, "imgefic_presup", "imgefic_presup", ccsText, "", CCGetRequestParam("imgefic_presup", ccsGet, NULL), $this);
        $this->cumplenefic_presup = new clsControl(ccsLabel, "cumplenefic_presup", "cumplenefic_presup", ccsInteger, "", CCGetRequestParam("cumplenefic_presup", ccsGet, NULL), $this);
        $this->totefic_presup = new clsControl(ccsLabel, "totefic_presup", "totefic_presup", ccsInteger, "", CCGetRequestParam("totefic_presup", ccsGet, NULL), $this);
        $this->efic_presup = new clsControl(ccsLabel, "efic_presup", "efic_presup", ccsText, "", CCGetRequestParam("efic_presup", ccsGet, NULL), $this);
        $this->efic_presup->HTML = true;
        $this->meta_efic_presup = new clsControl(ccsHidden, "meta_efic_presup", "meta_efic_presup", ccsText, "", CCGetRequestParam("meta_efic_presup", ccsGet, NULL), $this);
        $this->imgherr_est_cost1 = new clsControl(ccsImage, "imgherr_est_cost1", "imgherr_est_cost1", ccsText, "", CCGetRequestParam("imgherr_est_cost1", ccsGet, NULL), $this);
        $this->cumplenherr_est_cost1 = new clsControl(ccsLabel, "cumplenherr_est_cost1", "cumplenherr_est_cost1", ccsInteger, "", CCGetRequestParam("cumplenherr_est_cost1", ccsGet, NULL), $this);
        $this->totherr_est_cost1 = new clsControl(ccsLabel, "totherr_est_cost1", "totherr_est_cost1", ccsInteger, "", CCGetRequestParam("totherr_est_cost1", ccsGet, NULL), $this);
        $this->herr_est_cost1 = new clsControl(ccsLabel, "herr_est_cost1", "herr_est_cost1", ccsText, "", CCGetRequestParam("herr_est_cost1", ccsGet, NULL), $this);
        $this->herr_est_cost1->HTML = true;
        $this->meta_herr_est_cost1 = new clsControl(ccsHidden, "meta_herr_est_cost1", "meta_herr_est_cost1", ccsFloat, "", CCGetRequestParam("meta_herr_est_cost1", ccsGet, NULL), $this);
        $this->cumplenreq_serv1 = new clsControl(ccsLabel, "cumplenreq_serv1", "cumplenreq_serv1", ccsInteger, "", CCGetRequestParam("cumplenreq_serv1", ccsGet, NULL), $this);
        $this->totreq_serv1 = new clsControl(ccsLabel, "totreq_serv1", "totreq_serv1", ccsInteger, "", CCGetRequestParam("totreq_serv1", ccsGet, NULL), $this);
        $this->req_serv1 = new clsControl(ccsLabel, "req_serv1", "req_serv1", ccsText, "", CCGetRequestParam("req_serv1", ccsGet, NULL), $this);
        $this->req_serv1->HTML = true;
        $this->meta_req_serv1 = new clsControl(ccsHidden, "meta_req_serv1", "meta_req_serv1", ccsFloat, "", CCGetRequestParam("meta_req_serv1", ccsGet, NULL), $this);
        $this->imgreq_serv1 = new clsControl(ccsImage, "imgreq_serv1", "imgreq_serv1", ccsText, "", CCGetRequestParam("imgreq_serv1", ccsGet, NULL), $this);
        $this->cumplencumpl_req_func1 = new clsControl(ccsLabel, "cumplencumpl_req_func1", "cumplencumpl_req_func1", ccsInteger, "", CCGetRequestParam("cumplencumpl_req_func1", ccsGet, NULL), $this);
        $this->totcumpl_req_func1 = new clsControl(ccsLabel, "totcumpl_req_func1", "totcumpl_req_func1", ccsInteger, "", CCGetRequestParam("totcumpl_req_func1", ccsGet, NULL), $this);
        $this->cumpl_req_func1 = new clsControl(ccsLabel, "cumpl_req_func1", "cumpl_req_func1", ccsText, "", CCGetRequestParam("cumpl_req_func1", ccsGet, NULL), $this);
        $this->cumpl_req_func1->HTML = true;
        $this->meta_cumpl_req_func1 = new clsControl(ccsHidden, "meta_cumpl_req_func1", "meta_cumpl_req_func1", ccsFloat, "", CCGetRequestParam("meta_cumpl_req_func1", ccsGet, NULL), $this);
        $this->imgcumpl_req_func1 = new clsControl(ccsImage, "imgcumpl_req_func1", "imgcumpl_req_func1", ccsText, "", CCGetRequestParam("imgcumpl_req_func1", ccsGet, NULL), $this);
        $this->cumplencalidad_prod_term1 = new clsControl(ccsLabel, "cumplencalidad_prod_term1", "cumplencalidad_prod_term1", ccsInteger, "", CCGetRequestParam("cumplencalidad_prod_term1", ccsGet, NULL), $this);
        $this->totcalidad_prod_term1 = new clsControl(ccsLabel, "totcalidad_prod_term1", "totcalidad_prod_term1", ccsInteger, "", CCGetRequestParam("totcalidad_prod_term1", ccsGet, NULL), $this);
        $this->calidad_prod_term1 = new clsControl(ccsLabel, "calidad_prod_term1", "calidad_prod_term1", ccsText, "", CCGetRequestParam("calidad_prod_term1", ccsGet, NULL), $this);
        $this->calidad_prod_term1->HTML = true;
        $this->meta_calidad_prod_term1 = new clsControl(ccsHidden, "meta_calidad_prod_term1", "meta_calidad_prod_term1", ccsFloat, "", CCGetRequestParam("meta_calidad_prod_term1", ccsGet, NULL), $this);
        $this->imgcalidad_prod_term1 = new clsControl(ccsImage, "imgcalidad_prod_term1", "imgcalidad_prod_term1", ccsText, "", CCGetRequestParam("imgcalidad_prod_term1", ccsGet, NULL), $this);
        $this->cumplenretr_entregable1 = new clsControl(ccsLabel, "cumplenretr_entregable1", "cumplenretr_entregable1", ccsInteger, "", CCGetRequestParam("cumplenretr_entregable1", ccsGet, NULL), $this);
        $this->totretr_entregable1 = new clsControl(ccsLabel, "totretr_entregable1", "totretr_entregable1", ccsInteger, "", CCGetRequestParam("totretr_entregable1", ccsGet, NULL), $this);
        $this->retr_entregable1 = new clsControl(ccsLabel, "retr_entregable1", "retr_entregable1", ccsText, "", CCGetRequestParam("retr_entregable1", ccsGet, NULL), $this);
        $this->retr_entregable1->HTML = true;
        $this->meta_retr_entregable1 = new clsControl(ccsHidden, "meta_retr_entregable1", "meta_retr_entregable1", ccsFloat, "", CCGetRequestParam("meta_retr_entregable1", ccsGet, NULL), $this);
        $this->imgretr_entregable1 = new clsControl(ccsImage, "imgretr_entregable1", "imgretr_entregable1", ccsText, "", CCGetRequestParam("imgretr_entregable1", ccsGet, NULL), $this);
        $this->cumplencal_cod1 = new clsControl(ccsLabel, "cumplencal_cod1", "cumplencal_cod1", ccsInteger, "", CCGetRequestParam("cumplencal_cod1", ccsGet, NULL), $this);
        $this->totcal_cod1 = new clsControl(ccsLabel, "totcal_cod1", "totcal_cod1", ccsInteger, "", CCGetRequestParam("totcal_cod1", ccsGet, NULL), $this);
        $this->cal_cod1 = new clsControl(ccsLabel, "cal_cod1", "cal_cod1", ccsText, "", CCGetRequestParam("cal_cod1", ccsGet, NULL), $this);
        $this->cal_cod1->HTML = true;
        $this->meta_cal_cod1 = new clsControl(ccsHidden, "meta_cal_cod1", "meta_cal_cod1", ccsFloat, "", CCGetRequestParam("meta_cal_cod1", ccsGet, NULL), $this);
        $this->imgcal_cod1 = new clsControl(ccsImage, "imgcal_cod1", "imgcal_cod1", ccsText, "", CCGetRequestParam("imgcal_cod1", ccsGet, NULL), $this);
        $this->cumplendef_fug_amb_prod1 = new clsControl(ccsLabel, "cumplendef_fug_amb_prod1", "cumplendef_fug_amb_prod1", ccsInteger, "", CCGetRequestParam("cumplendef_fug_amb_prod1", ccsGet, NULL), $this);
        $this->totdef_fug_amb_prod1 = new clsControl(ccsLabel, "totdef_fug_amb_prod1", "totdef_fug_amb_prod1", ccsInteger, "", CCGetRequestParam("totdef_fug_amb_prod1", ccsGet, NULL), $this);
        $this->def_fug_amb_prod1 = new clsControl(ccsLabel, "def_fug_amb_prod1", "def_fug_amb_prod1", ccsText, "", CCGetRequestParam("def_fug_amb_prod1", ccsGet, NULL), $this);
        $this->def_fug_amb_prod1->HTML = true;
        $this->meta_def_fug_amb_prod1 = new clsControl(ccsHidden, "meta_def_fug_amb_prod1", "meta_def_fug_amb_prod1", ccsFloat, "", CCGetRequestParam("meta_def_fug_amb_prod1", ccsGet, NULL), $this);
        $this->imgdef_fug_amb_prod1 = new clsControl(ccsImage, "imgdef_fug_amb_prod1", "imgdef_fug_amb_prod1", ccsText, "", CCGetRequestParam("imgdef_fug_amb_prod1", ccsGet, NULL), $this);
        $this->cumpleninc_tiempoasignacion1 = new clsControl(ccsLabel, "cumpleninc_tiempoasignacion1", "cumpleninc_tiempoasignacion1", ccsInteger, "", CCGetRequestParam("cumpleninc_tiempoasignacion1", ccsGet, NULL), $this);
        $this->totinc_tiempoasignacion1 = new clsControl(ccsLabel, "totinc_tiempoasignacion1", "totinc_tiempoasignacion1", ccsInteger, "", CCGetRequestParam("totinc_tiempoasignacion1", ccsGet, NULL), $this);
        $this->inc_tiempoasignacion1 = new clsControl(ccsLabel, "inc_tiempoasignacion1", "inc_tiempoasignacion1", ccsText, "", CCGetRequestParam("inc_tiempoasignacion1", ccsGet, NULL), $this);
        $this->inc_tiempoasignacion1->HTML = true;
        $this->meta_inc_tiempoasignacion1 = new clsControl(ccsHidden, "meta_inc_tiempoasignacion1", "meta_inc_tiempoasignacion1", ccsInteger, "", CCGetRequestParam("meta_inc_tiempoasignacion1", ccsGet, NULL), $this);
        $this->imginc_tiempoasignacion1 = new clsControl(ccsImage, "imginc_tiempoasignacion1", "imginc_tiempoasignacion1", ccsText, "", CCGetRequestParam("imginc_tiempoasignacion1", ccsGet, NULL), $this);
        $this->cumpleninc_tiemposolucion1 = new clsControl(ccsLabel, "cumpleninc_tiemposolucion1", "cumpleninc_tiemposolucion1", ccsInteger, "", CCGetRequestParam("cumpleninc_tiemposolucion1", ccsGet, NULL), $this);
        $this->totinc_tiemposolucion1 = new clsControl(ccsLabel, "totinc_tiemposolucion1", "totinc_tiemposolucion1", ccsInteger, "", CCGetRequestParam("totinc_tiemposolucion1", ccsGet, NULL), $this);
        $this->inc_tiemposolucion1 = new clsControl(ccsLabel, "inc_tiemposolucion1", "inc_tiemposolucion1", ccsText, "", CCGetRequestParam("inc_tiemposolucion1", ccsGet, NULL), $this);
        $this->inc_tiemposolucion1->HTML = true;
        $this->meta_inc_tiemposolucion1 = new clsControl(ccsHidden, "meta_inc_tiemposolucion1", "meta_inc_tiemposolucion1", ccsInteger, "", CCGetRequestParam("meta_inc_tiemposolucion1", ccsGet, NULL), $this);
        $this->imginc_tiemposolucion1 = new clsControl(ccsImage, "imginc_tiemposolucion1", "imginc_tiemposolucion1", ccsText, "", CCGetRequestParam("imginc_tiemposolucion1", ccsGet, NULL), $this);
        $this->imgefic_presup1 = new clsControl(ccsImage, "imgefic_presup1", "imgefic_presup1", ccsText, "", CCGetRequestParam("imgefic_presup1", ccsGet, NULL), $this);
        $this->cumplenefic_presup1 = new clsControl(ccsLabel, "cumplenefic_presup1", "cumplenefic_presup1", ccsInteger, "", CCGetRequestParam("cumplenefic_presup1", ccsGet, NULL), $this);
        $this->totefic_presup1 = new clsControl(ccsLabel, "totefic_presup1", "totefic_presup1", ccsInteger, "", CCGetRequestParam("totefic_presup1", ccsGet, NULL), $this);
        $this->efic_presup1 = new clsControl(ccsLabel, "efic_presup1", "efic_presup1", ccsText, "", CCGetRequestParam("efic_presup1", ccsGet, NULL), $this);
        $this->efic_presup1->HTML = true;
        $this->meta_efic_presup1 = new clsControl(ccsHidden, "meta_efic_presup1", "meta_efic_presup1", ccsText, "", CCGetRequestParam("meta_efic_presup1", ccsGet, NULL), $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @2-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @2-CC37C449
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
            $this->ControlsVisible["descripcion"] = $this->descripcion->Visible;
            $this->ControlsVisible["cumplenherr_est_cost"] = $this->cumplenherr_est_cost->Visible;
            $this->ControlsVisible["cumplenreq_serv"] = $this->cumplenreq_serv->Visible;
            $this->ControlsVisible["cumplencumpl_req_func"] = $this->cumplencumpl_req_func->Visible;
            $this->ControlsVisible["cumplencalidad_prod_term"] = $this->cumplencalidad_prod_term->Visible;
            $this->ControlsVisible["cumplenretr_entregable"] = $this->cumplenretr_entregable->Visible;
            $this->ControlsVisible["cumplencal_cod"] = $this->cumplencal_cod->Visible;
            $this->ControlsVisible["cumplendef_fug_amb_prod"] = $this->cumplendef_fug_amb_prod->Visible;
            $this->ControlsVisible["totherr_est_cost"] = $this->totherr_est_cost->Visible;
            $this->ControlsVisible["herr_est_cost"] = $this->herr_est_cost->Visible;
            $this->ControlsVisible["meta_herr_est_cost"] = $this->meta_herr_est_cost->Visible;
            $this->ControlsVisible["totreq_serv"] = $this->totreq_serv->Visible;
            $this->ControlsVisible["req_serv"] = $this->req_serv->Visible;
            $this->ControlsVisible["meta_req_serv"] = $this->meta_req_serv->Visible;
            $this->ControlsVisible["totcumpl_req_func"] = $this->totcumpl_req_func->Visible;
            $this->ControlsVisible["cumpl_req_func"] = $this->cumpl_req_func->Visible;
            $this->ControlsVisible["meta_cumpl_req_func"] = $this->meta_cumpl_req_func->Visible;
            $this->ControlsVisible["totcalidad_prod_term"] = $this->totcalidad_prod_term->Visible;
            $this->ControlsVisible["calidad_prod_term"] = $this->calidad_prod_term->Visible;
            $this->ControlsVisible["meta_calidad_prod_term"] = $this->meta_calidad_prod_term->Visible;
            $this->ControlsVisible["totretr_entregable"] = $this->totretr_entregable->Visible;
            $this->ControlsVisible["retr_entregable"] = $this->retr_entregable->Visible;
            $this->ControlsVisible["meta_retr_entregable"] = $this->meta_retr_entregable->Visible;
            $this->ControlsVisible["totcal_cod"] = $this->totcal_cod->Visible;
            $this->ControlsVisible["cal_cod"] = $this->cal_cod->Visible;
            $this->ControlsVisible["meta_cal_cod"] = $this->meta_cal_cod->Visible;
            $this->ControlsVisible["totdef_fug_amb_prod"] = $this->totdef_fug_amb_prod->Visible;
            $this->ControlsVisible["def_fug_amb_prod"] = $this->def_fug_amb_prod->Visible;
            $this->ControlsVisible["meta_def_fug_amb_prod"] = $this->meta_def_fug_amb_prod->Visible;
            $this->ControlsVisible["imgherr_est_cost"] = $this->imgherr_est_cost->Visible;
            $this->ControlsVisible["imgreq_serv"] = $this->imgreq_serv->Visible;
            $this->ControlsVisible["imgcumpl_req_func"] = $this->imgcumpl_req_func->Visible;
            $this->ControlsVisible["imgcalidad_prod_term"] = $this->imgcalidad_prod_term->Visible;
            $this->ControlsVisible["imgretr_entregable"] = $this->imgretr_entregable->Visible;
            $this->ControlsVisible["imgcal_cod"] = $this->imgcal_cod->Visible;
            $this->ControlsVisible["imgdef_fug_amb_prod"] = $this->imgdef_fug_amb_prod->Visible;
            $this->ControlsVisible["cumpleninc_tiempoasignacion"] = $this->cumpleninc_tiempoasignacion->Visible;
            $this->ControlsVisible["totinc_tiempoasignacion"] = $this->totinc_tiempoasignacion->Visible;
            $this->ControlsVisible["inc_tiempoasignacion"] = $this->inc_tiempoasignacion->Visible;
            $this->ControlsVisible["meta_inc_tiempoasignacion"] = $this->meta_inc_tiempoasignacion->Visible;
            $this->ControlsVisible["cumpleninc_tiemposolucion"] = $this->cumpleninc_tiemposolucion->Visible;
            $this->ControlsVisible["totinc_tiemposolucion"] = $this->totinc_tiemposolucion->Visible;
            $this->ControlsVisible["inc_tiemposolucion"] = $this->inc_tiemposolucion->Visible;
            $this->ControlsVisible["meta_inc_tiemposolucion"] = $this->meta_inc_tiemposolucion->Visible;
            $this->ControlsVisible["imginc_tiempoasignacion"] = $this->imginc_tiempoasignacion->Visible;
            $this->ControlsVisible["imginc_tiemposolucion"] = $this->imginc_tiemposolucion->Visible;
            $this->ControlsVisible["imgefic_presup"] = $this->imgefic_presup->Visible;
            $this->ControlsVisible["cumplenefic_presup"] = $this->cumplenefic_presup->Visible;
            $this->ControlsVisible["totefic_presup"] = $this->totefic_presup->Visible;
            $this->ControlsVisible["efic_presup"] = $this->efic_presup->Visible;
            $this->ControlsVisible["meta_efic_presup"] = $this->meta_efic_presup->Visible;
            $this->ControlsVisible["imgherr_est_cost1"] = $this->imgherr_est_cost1->Visible;
            $this->ControlsVisible["cumplenherr_est_cost1"] = $this->cumplenherr_est_cost1->Visible;
            $this->ControlsVisible["totherr_est_cost1"] = $this->totherr_est_cost1->Visible;
            $this->ControlsVisible["herr_est_cost1"] = $this->herr_est_cost1->Visible;
            $this->ControlsVisible["meta_herr_est_cost1"] = $this->meta_herr_est_cost1->Visible;
            $this->ControlsVisible["cumplenreq_serv1"] = $this->cumplenreq_serv1->Visible;
            $this->ControlsVisible["totreq_serv1"] = $this->totreq_serv1->Visible;
            $this->ControlsVisible["req_serv1"] = $this->req_serv1->Visible;
            $this->ControlsVisible["meta_req_serv1"] = $this->meta_req_serv1->Visible;
            $this->ControlsVisible["imgreq_serv1"] = $this->imgreq_serv1->Visible;
            $this->ControlsVisible["cumplencumpl_req_func1"] = $this->cumplencumpl_req_func1->Visible;
            $this->ControlsVisible["totcumpl_req_func1"] = $this->totcumpl_req_func1->Visible;
            $this->ControlsVisible["cumpl_req_func1"] = $this->cumpl_req_func1->Visible;
            $this->ControlsVisible["meta_cumpl_req_func1"] = $this->meta_cumpl_req_func1->Visible;
            $this->ControlsVisible["imgcumpl_req_func1"] = $this->imgcumpl_req_func1->Visible;
            $this->ControlsVisible["cumplencalidad_prod_term1"] = $this->cumplencalidad_prod_term1->Visible;
            $this->ControlsVisible["totcalidad_prod_term1"] = $this->totcalidad_prod_term1->Visible;
            $this->ControlsVisible["calidad_prod_term1"] = $this->calidad_prod_term1->Visible;
            $this->ControlsVisible["meta_calidad_prod_term1"] = $this->meta_calidad_prod_term1->Visible;
            $this->ControlsVisible["imgcalidad_prod_term1"] = $this->imgcalidad_prod_term1->Visible;
            $this->ControlsVisible["cumplenretr_entregable1"] = $this->cumplenretr_entregable1->Visible;
            $this->ControlsVisible["totretr_entregable1"] = $this->totretr_entregable1->Visible;
            $this->ControlsVisible["retr_entregable1"] = $this->retr_entregable1->Visible;
            $this->ControlsVisible["meta_retr_entregable1"] = $this->meta_retr_entregable1->Visible;
            $this->ControlsVisible["imgretr_entregable1"] = $this->imgretr_entregable1->Visible;
            $this->ControlsVisible["cumplencal_cod1"] = $this->cumplencal_cod1->Visible;
            $this->ControlsVisible["totcal_cod1"] = $this->totcal_cod1->Visible;
            $this->ControlsVisible["cal_cod1"] = $this->cal_cod1->Visible;
            $this->ControlsVisible["meta_cal_cod1"] = $this->meta_cal_cod1->Visible;
            $this->ControlsVisible["imgcal_cod1"] = $this->imgcal_cod1->Visible;
            $this->ControlsVisible["cumplendef_fug_amb_prod1"] = $this->cumplendef_fug_amb_prod1->Visible;
            $this->ControlsVisible["totdef_fug_amb_prod1"] = $this->totdef_fug_amb_prod1->Visible;
            $this->ControlsVisible["def_fug_amb_prod1"] = $this->def_fug_amb_prod1->Visible;
            $this->ControlsVisible["meta_def_fug_amb_prod1"] = $this->meta_def_fug_amb_prod1->Visible;
            $this->ControlsVisible["imgdef_fug_amb_prod1"] = $this->imgdef_fug_amb_prod1->Visible;
            $this->ControlsVisible["cumpleninc_tiempoasignacion1"] = $this->cumpleninc_tiempoasignacion1->Visible;
            $this->ControlsVisible["totinc_tiempoasignacion1"] = $this->totinc_tiempoasignacion1->Visible;
            $this->ControlsVisible["inc_tiempoasignacion1"] = $this->inc_tiempoasignacion1->Visible;
            $this->ControlsVisible["meta_inc_tiempoasignacion1"] = $this->meta_inc_tiempoasignacion1->Visible;
            $this->ControlsVisible["imginc_tiempoasignacion1"] = $this->imginc_tiempoasignacion1->Visible;
            $this->ControlsVisible["cumpleninc_tiemposolucion1"] = $this->cumpleninc_tiemposolucion1->Visible;
            $this->ControlsVisible["totinc_tiemposolucion1"] = $this->totinc_tiemposolucion1->Visible;
            $this->ControlsVisible["inc_tiemposolucion1"] = $this->inc_tiemposolucion1->Visible;
            $this->ControlsVisible["meta_inc_tiemposolucion1"] = $this->meta_inc_tiemposolucion1->Visible;
            $this->ControlsVisible["imginc_tiemposolucion1"] = $this->imginc_tiemposolucion1->Visible;
            $this->ControlsVisible["imgefic_presup1"] = $this->imgefic_presup1->Visible;
            $this->ControlsVisible["cumplenefic_presup1"] = $this->cumplenefic_presup1->Visible;
            $this->ControlsVisible["totefic_presup1"] = $this->totefic_presup1->Visible;
            $this->ControlsVisible["efic_presup1"] = $this->efic_presup1->Visible;
            $this->ControlsVisible["meta_efic_presup1"] = $this->meta_efic_presup1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->descripcion->SetValue($this->DataSource->descripcion->GetValue());
                $this->cumplenherr_est_cost->SetValue($this->DataSource->cumplenherr_est_cost->GetValue());
                $this->cumplenreq_serv->SetValue($this->DataSource->cumplenreq_serv->GetValue());
                $this->cumplencumpl_req_func->SetValue($this->DataSource->cumplencumpl_req_func->GetValue());
                $this->cumplencalidad_prod_term->SetValue($this->DataSource->cumplencalidad_prod_term->GetValue());
                $this->cumplenretr_entregable->SetValue($this->DataSource->cumplenretr_entregable->GetValue());
                $this->cumplencal_cod->SetValue($this->DataSource->cumplencal_cod->GetValue());
                $this->cumplendef_fug_amb_prod->SetValue($this->DataSource->cumplendef_fug_amb_prod->GetValue());
                $this->totherr_est_cost->SetValue($this->DataSource->totherr_est_cost->GetValue());
                $this->herr_est_cost->SetValue($this->DataSource->herr_est_cost->GetValue());
                $this->meta_herr_est_cost->SetValue($this->DataSource->meta_herr_est_cost->GetValue());
                $this->totreq_serv->SetValue($this->DataSource->totreq_serv->GetValue());
                $this->req_serv->SetValue($this->DataSource->req_serv->GetValue());
                $this->meta_req_serv->SetValue($this->DataSource->meta_req_serv->GetValue());
                $this->totcumpl_req_func->SetValue($this->DataSource->totcumpl_req_func->GetValue());
                $this->cumpl_req_func->SetValue($this->DataSource->cumpl_req_func->GetValue());
                $this->meta_cumpl_req_func->SetValue($this->DataSource->meta_cumpl_req_func->GetValue());
                $this->totcalidad_prod_term->SetValue($this->DataSource->totcalidad_prod_term->GetValue());
                $this->calidad_prod_term->SetValue($this->DataSource->calidad_prod_term->GetValue());
                $this->meta_calidad_prod_term->SetValue($this->DataSource->meta_calidad_prod_term->GetValue());
                $this->totretr_entregable->SetValue($this->DataSource->totretr_entregable->GetValue());
                $this->retr_entregable->SetValue($this->DataSource->retr_entregable->GetValue());
                $this->meta_retr_entregable->SetValue($this->DataSource->meta_retr_entregable->GetValue());
                $this->totcal_cod->SetValue($this->DataSource->totcal_cod->GetValue());
                $this->cal_cod->SetValue($this->DataSource->cal_cod->GetValue());
                $this->meta_cal_cod->SetValue($this->DataSource->meta_cal_cod->GetValue());
                $this->totdef_fug_amb_prod->SetValue($this->DataSource->totdef_fug_amb_prod->GetValue());
                $this->def_fug_amb_prod->SetValue($this->DataSource->def_fug_amb_prod->GetValue());
                $this->meta_def_fug_amb_prod->SetValue($this->DataSource->meta_def_fug_amb_prod->GetValue());
                $this->cumpleninc_tiempoasignacion->SetValue($this->DataSource->cumpleninc_tiempoasignacion->GetValue());
                $this->totinc_tiempoasignacion->SetValue($this->DataSource->totinc_tiempoasignacion->GetValue());
                $this->inc_tiempoasignacion->SetValue($this->DataSource->inc_tiempoasignacion->GetValue());
                $this->meta_inc_tiempoasignacion->SetValue($this->DataSource->meta_inc_tiempoasignacion->GetValue());
                $this->cumpleninc_tiemposolucion->SetValue($this->DataSource->cumpleninc_tiemposolucion->GetValue());
                $this->totinc_tiemposolucion->SetValue($this->DataSource->totinc_tiemposolucion->GetValue());
                $this->inc_tiemposolucion->SetValue($this->DataSource->inc_tiemposolucion->GetValue());
                $this->meta_inc_tiemposolucion->SetValue($this->DataSource->meta_inc_tiemposolucion->GetValue());
                $this->cumplenefic_presup->SetValue($this->DataSource->cumplenefic_presup->GetValue());
                $this->totefic_presup->SetValue($this->DataSource->totefic_presup->GetValue());
                $this->efic_presup->SetValue($this->DataSource->efic_presup->GetValue());
                $this->meta_efic_presup->SetValue($this->DataSource->meta_efic_presup->GetValue());
                $this->cumplenherr_est_cost1->SetValue($this->DataSource->cumplenherr_est_cost1->GetValue());
                $this->totherr_est_cost1->SetValue($this->DataSource->totherr_est_cost1->GetValue());
                $this->herr_est_cost1->SetValue($this->DataSource->herr_est_cost1->GetValue());
                $this->meta_herr_est_cost1->SetValue($this->DataSource->meta_herr_est_cost1->GetValue());
                $this->cumplenreq_serv1->SetValue($this->DataSource->cumplenreq_serv1->GetValue());
                $this->totreq_serv1->SetValue($this->DataSource->totreq_serv1->GetValue());
                $this->req_serv1->SetValue($this->DataSource->req_serv1->GetValue());
                $this->meta_req_serv1->SetValue($this->DataSource->meta_req_serv1->GetValue());
                $this->cumplencumpl_req_func1->SetValue($this->DataSource->cumplencumpl_req_func1->GetValue());
                $this->totcumpl_req_func1->SetValue($this->DataSource->totcumpl_req_func1->GetValue());
                $this->cumpl_req_func1->SetValue($this->DataSource->cumpl_req_func1->GetValue());
                $this->meta_cumpl_req_func1->SetValue($this->DataSource->meta_cumpl_req_func1->GetValue());
                $this->cumplencalidad_prod_term1->SetValue($this->DataSource->cumplencalidad_prod_term1->GetValue());
                $this->totcalidad_prod_term1->SetValue($this->DataSource->totcalidad_prod_term1->GetValue());
                $this->calidad_prod_term1->SetValue($this->DataSource->calidad_prod_term1->GetValue());
                $this->meta_calidad_prod_term1->SetValue($this->DataSource->meta_calidad_prod_term1->GetValue());
                $this->cumplenretr_entregable1->SetValue($this->DataSource->cumplenretr_entregable1->GetValue());
                $this->totretr_entregable1->SetValue($this->DataSource->totretr_entregable1->GetValue());
                $this->retr_entregable1->SetValue($this->DataSource->retr_entregable1->GetValue());
                $this->meta_retr_entregable1->SetValue($this->DataSource->meta_retr_entregable1->GetValue());
                $this->cumplencal_cod1->SetValue($this->DataSource->cumplencal_cod1->GetValue());
                $this->totcal_cod1->SetValue($this->DataSource->totcal_cod1->GetValue());
                $this->cal_cod1->SetValue($this->DataSource->cal_cod1->GetValue());
                $this->meta_cal_cod1->SetValue($this->DataSource->meta_cal_cod1->GetValue());
                $this->cumplendef_fug_amb_prod1->SetValue($this->DataSource->cumplendef_fug_amb_prod1->GetValue());
                $this->totdef_fug_amb_prod1->SetValue($this->DataSource->totdef_fug_amb_prod1->GetValue());
                $this->def_fug_amb_prod1->SetValue($this->DataSource->def_fug_amb_prod1->GetValue());
                $this->meta_def_fug_amb_prod1->SetValue($this->DataSource->meta_def_fug_amb_prod1->GetValue());
                $this->cumpleninc_tiempoasignacion1->SetValue($this->DataSource->cumpleninc_tiempoasignacion1->GetValue());
                $this->totinc_tiempoasignacion1->SetValue($this->DataSource->totinc_tiempoasignacion1->GetValue());
                $this->inc_tiempoasignacion1->SetValue($this->DataSource->inc_tiempoasignacion1->GetValue());
                $this->meta_inc_tiempoasignacion1->SetValue($this->DataSource->meta_inc_tiempoasignacion1->GetValue());
                $this->cumpleninc_tiemposolucion1->SetValue($this->DataSource->cumpleninc_tiemposolucion1->GetValue());
                $this->totinc_tiemposolucion1->SetValue($this->DataSource->totinc_tiemposolucion1->GetValue());
                $this->inc_tiemposolucion1->SetValue($this->DataSource->inc_tiemposolucion1->GetValue());
                $this->meta_inc_tiemposolucion1->SetValue($this->DataSource->meta_inc_tiemposolucion1->GetValue());
                $this->cumplenefic_presup1->SetValue($this->DataSource->cumplenefic_presup1->GetValue());
                $this->totefic_presup1->SetValue($this->DataSource->totefic_presup1->GetValue());
                $this->efic_presup1->SetValue($this->DataSource->efic_presup1->GetValue());
                $this->meta_efic_presup1->SetValue($this->DataSource->meta_efic_presup1->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->descripcion->Show();
                $this->cumplenherr_est_cost->Show();
                $this->cumplenreq_serv->Show();
                $this->cumplencumpl_req_func->Show();
                $this->cumplencalidad_prod_term->Show();
                $this->cumplenretr_entregable->Show();
                $this->cumplencal_cod->Show();
                $this->cumplendef_fug_amb_prod->Show();
                $this->totherr_est_cost->Show();
                $this->herr_est_cost->Show();
                $this->meta_herr_est_cost->Show();
                $this->totreq_serv->Show();
                $this->req_serv->Show();
                $this->meta_req_serv->Show();
                $this->totcumpl_req_func->Show();
                $this->cumpl_req_func->Show();
                $this->meta_cumpl_req_func->Show();
                $this->totcalidad_prod_term->Show();
                $this->calidad_prod_term->Show();
                $this->meta_calidad_prod_term->Show();
                $this->totretr_entregable->Show();
                $this->retr_entregable->Show();
                $this->meta_retr_entregable->Show();
                $this->totcal_cod->Show();
                $this->cal_cod->Show();
                $this->meta_cal_cod->Show();
                $this->totdef_fug_amb_prod->Show();
                $this->def_fug_amb_prod->Show();
                $this->meta_def_fug_amb_prod->Show();
                $this->imgherr_est_cost->Show();
                $this->imgreq_serv->Show();
                $this->imgcumpl_req_func->Show();
                $this->imgcalidad_prod_term->Show();
                $this->imgretr_entregable->Show();
                $this->imgcal_cod->Show();
                $this->imgdef_fug_amb_prod->Show();
                $this->cumpleninc_tiempoasignacion->Show();
                $this->totinc_tiempoasignacion->Show();
                $this->inc_tiempoasignacion->Show();
                $this->meta_inc_tiempoasignacion->Show();
                $this->cumpleninc_tiemposolucion->Show();
                $this->totinc_tiemposolucion->Show();
                $this->inc_tiemposolucion->Show();
                $this->meta_inc_tiemposolucion->Show();
                $this->imginc_tiempoasignacion->Show();
                $this->imginc_tiemposolucion->Show();
                $this->imgefic_presup->Show();
                $this->cumplenefic_presup->Show();
                $this->totefic_presup->Show();
                $this->efic_presup->Show();
                $this->meta_efic_presup->Show();
                $this->imgherr_est_cost1->Show();
                $this->cumplenherr_est_cost1->Show();
                $this->totherr_est_cost1->Show();
                $this->herr_est_cost1->Show();
                $this->meta_herr_est_cost1->Show();
                $this->cumplenreq_serv1->Show();
                $this->totreq_serv1->Show();
                $this->req_serv1->Show();
                $this->meta_req_serv1->Show();
                $this->imgreq_serv1->Show();
                $this->cumplencumpl_req_func1->Show();
                $this->totcumpl_req_func1->Show();
                $this->cumpl_req_func1->Show();
                $this->meta_cumpl_req_func1->Show();
                $this->imgcumpl_req_func1->Show();
                $this->cumplencalidad_prod_term1->Show();
                $this->totcalidad_prod_term1->Show();
                $this->calidad_prod_term1->Show();
                $this->meta_calidad_prod_term1->Show();
                $this->imgcalidad_prod_term1->Show();
                $this->cumplenretr_entregable1->Show();
                $this->totretr_entregable1->Show();
                $this->retr_entregable1->Show();
                $this->meta_retr_entregable1->Show();
                $this->imgretr_entregable1->Show();
                $this->cumplencal_cod1->Show();
                $this->totcal_cod1->Show();
                $this->cal_cod1->Show();
                $this->meta_cal_cod1->Show();
                $this->imgcal_cod1->Show();
                $this->cumplendef_fug_amb_prod1->Show();
                $this->totdef_fug_amb_prod1->Show();
                $this->def_fug_amb_prod1->Show();
                $this->meta_def_fug_amb_prod1->Show();
                $this->imgdef_fug_amb_prod1->Show();
                $this->cumpleninc_tiempoasignacion1->Show();
                $this->totinc_tiempoasignacion1->Show();
                $this->inc_tiempoasignacion1->Show();
                $this->meta_inc_tiempoasignacion1->Show();
                $this->imginc_tiempoasignacion1->Show();
                $this->cumpleninc_tiemposolucion1->Show();
                $this->totinc_tiemposolucion1->Show();
                $this->inc_tiemposolucion1->Show();
                $this->meta_inc_tiemposolucion1->Show();
                $this->imginc_tiemposolucion1->Show();
                $this->imgefic_presup1->Show();
                $this->cumplenefic_presup1->Show();
                $this->totefic_presup1->Show();
                $this->efic_presup1->Show();
                $this->meta_efic_presup1->Show();
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
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-E897E8F4
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenherr_est_cost->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenreq_serv->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencumpl_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencalidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenretr_entregable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencal_cod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplendef_fug_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totherr_est_cost->Errors->ToString());
        $errors = ComposeStrings($errors, $this->herr_est_cost->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_herr_est_cost->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totreq_serv->Errors->ToString());
        $errors = ComposeStrings($errors, $this->req_serv->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_req_serv->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcumpl_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpl_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_cumpl_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcalidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->calidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_calidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totretr_entregable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->retr_entregable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_retr_entregable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcal_cod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cal_cod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_cal_cod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totdef_fug_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->def_fug_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_def_fug_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgherr_est_cost->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgreq_serv->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcumpl_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcalidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgretr_entregable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcal_cod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgdef_fug_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpleninc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totinc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->inc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_inc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpleninc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totinc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->inc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_inc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imginc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imginc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgefic_presup->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenefic_presup->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totefic_presup->Errors->ToString());
        $errors = ComposeStrings($errors, $this->efic_presup->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_efic_presup->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgherr_est_cost1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenherr_est_cost1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totherr_est_cost1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->herr_est_cost1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_herr_est_cost1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenreq_serv1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totreq_serv1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->req_serv1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_req_serv1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgreq_serv1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencumpl_req_func1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcumpl_req_func1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpl_req_func1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_cumpl_req_func1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcumpl_req_func1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencalidad_prod_term1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcalidad_prod_term1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->calidad_prod_term1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_calidad_prod_term1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcalidad_prod_term1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenretr_entregable1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totretr_entregable1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->retr_entregable1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_retr_entregable1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgretr_entregable1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplencal_cod1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totcal_cod1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cal_cod1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_cal_cod1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcal_cod1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplendef_fug_amb_prod1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totdef_fug_amb_prod1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->def_fug_amb_prod1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_def_fug_amb_prod1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgdef_fug_amb_prod1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpleninc_tiempoasignacion1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totinc_tiempoasignacion1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->inc_tiempoasignacion1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_inc_tiempoasignacion1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imginc_tiempoasignacion1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumpleninc_tiemposolucion1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totinc_tiemposolucion1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->inc_tiemposolucion1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_inc_tiemposolucion1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imginc_tiemposolucion1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgefic_presup1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumplenefic_presup1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->totefic_presup1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->efic_presup1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->meta_efic_presup1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @2-FCB6E20C

class clsGrid1DataSource extends clsDBcon_xls {  //Grid1DataSource Class @2-4A4C3D6C

//DataSource Variables @2-8BDECCFD
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $descripcion;
    public $cumplenherr_est_cost;
    public $cumplenreq_serv;
    public $cumplencumpl_req_func;
    public $cumplencalidad_prod_term;
    public $cumplenretr_entregable;
    public $cumplencal_cod;
    public $cumplendef_fug_amb_prod;
    public $totherr_est_cost;
    public $herr_est_cost;
    public $meta_herr_est_cost;
    public $totreq_serv;
    public $req_serv;
    public $meta_req_serv;
    public $totcumpl_req_func;
    public $cumpl_req_func;
    public $meta_cumpl_req_func;
    public $totcalidad_prod_term;
    public $calidad_prod_term;
    public $meta_calidad_prod_term;
    public $totretr_entregable;
    public $retr_entregable;
    public $meta_retr_entregable;
    public $totcal_cod;
    public $cal_cod;
    public $meta_cal_cod;
    public $totdef_fug_amb_prod;
    public $def_fug_amb_prod;
    public $meta_def_fug_amb_prod;
    public $cumpleninc_tiempoasignacion;
    public $totinc_tiempoasignacion;
    public $inc_tiempoasignacion;
    public $meta_inc_tiempoasignacion;
    public $cumpleninc_tiemposolucion;
    public $totinc_tiemposolucion;
    public $inc_tiemposolucion;
    public $meta_inc_tiemposolucion;
    public $cumplenefic_presup;
    public $totefic_presup;
    public $efic_presup;
    public $meta_efic_presup;
    public $cumplenherr_est_cost1;
    public $totherr_est_cost1;
    public $herr_est_cost1;
    public $meta_herr_est_cost1;
    public $cumplenreq_serv1;
    public $totreq_serv1;
    public $req_serv1;
    public $meta_req_serv1;
    public $cumplencumpl_req_func1;
    public $totcumpl_req_func1;
    public $cumpl_req_func1;
    public $meta_cumpl_req_func1;
    public $cumplencalidad_prod_term1;
    public $totcalidad_prod_term1;
    public $calidad_prod_term1;
    public $meta_calidad_prod_term1;
    public $cumplenretr_entregable1;
    public $totretr_entregable1;
    public $retr_entregable1;
    public $meta_retr_entregable1;
    public $cumplencal_cod1;
    public $totcal_cod1;
    public $cal_cod1;
    public $meta_cal_cod1;
    public $cumplendef_fug_amb_prod1;
    public $totdef_fug_amb_prod1;
    public $def_fug_amb_prod1;
    public $meta_def_fug_amb_prod1;
    public $cumpleninc_tiempoasignacion1;
    public $totinc_tiempoasignacion1;
    public $inc_tiempoasignacion1;
    public $meta_inc_tiempoasignacion1;
    public $cumpleninc_tiemposolucion1;
    public $totinc_tiemposolucion1;
    public $inc_tiemposolucion1;
    public $meta_inc_tiemposolucion1;
    public $cumplenefic_presup1;
    public $totefic_presup1;
    public $efic_presup1;
    public $meta_efic_presup1;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-A7DF09B8
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->descripcion = new clsField("descripcion", ccsText, "");
        
        $this->cumplenherr_est_cost = new clsField("cumplenherr_est_cost", ccsInteger, "");
        
        $this->cumplenreq_serv = new clsField("cumplenreq_serv", ccsInteger, "");
        
        $this->cumplencumpl_req_func = new clsField("cumplencumpl_req_func", ccsInteger, "");
        
        $this->cumplencalidad_prod_term = new clsField("cumplencalidad_prod_term", ccsInteger, "");
        
        $this->cumplenretr_entregable = new clsField("cumplenretr_entregable", ccsInteger, "");
        
        $this->cumplencal_cod = new clsField("cumplencal_cod", ccsInteger, "");
        
        $this->cumplendef_fug_amb_prod = new clsField("cumplendef_fug_amb_prod", ccsInteger, "");
        
        $this->totherr_est_cost = new clsField("totherr_est_cost", ccsInteger, "");
        
        $this->herr_est_cost = new clsField("herr_est_cost", ccsText, "");
        
        $this->meta_herr_est_cost = new clsField("meta_herr_est_cost", ccsFloat, "");
        
        $this->totreq_serv = new clsField("totreq_serv", ccsInteger, "");
        
        $this->req_serv = new clsField("req_serv", ccsText, "");
        
        $this->meta_req_serv = new clsField("meta_req_serv", ccsFloat, "");
        
        $this->totcumpl_req_func = new clsField("totcumpl_req_func", ccsInteger, "");
        
        $this->cumpl_req_func = new clsField("cumpl_req_func", ccsText, "");
        
        $this->meta_cumpl_req_func = new clsField("meta_cumpl_req_func", ccsFloat, "");
        
        $this->totcalidad_prod_term = new clsField("totcalidad_prod_term", ccsInteger, "");
        
        $this->calidad_prod_term = new clsField("calidad_prod_term", ccsText, "");
        
        $this->meta_calidad_prod_term = new clsField("meta_calidad_prod_term", ccsFloat, "");
        
        $this->totretr_entregable = new clsField("totretr_entregable", ccsInteger, "");
        
        $this->retr_entregable = new clsField("retr_entregable", ccsText, "");
        
        $this->meta_retr_entregable = new clsField("meta_retr_entregable", ccsFloat, "");
        
        $this->totcal_cod = new clsField("totcal_cod", ccsInteger, "");
        
        $this->cal_cod = new clsField("cal_cod", ccsText, "");
        
        $this->meta_cal_cod = new clsField("meta_cal_cod", ccsFloat, "");
        
        $this->totdef_fug_amb_prod = new clsField("totdef_fug_amb_prod", ccsInteger, "");
        
        $this->def_fug_amb_prod = new clsField("def_fug_amb_prod", ccsText, "");
        
        $this->meta_def_fug_amb_prod = new clsField("meta_def_fug_amb_prod", ccsFloat, "");
        
        $this->cumpleninc_tiempoasignacion = new clsField("cumpleninc_tiempoasignacion", ccsInteger, "");
        
        $this->totinc_tiempoasignacion = new clsField("totinc_tiempoasignacion", ccsInteger, "");
        
        $this->inc_tiempoasignacion = new clsField("inc_tiempoasignacion", ccsText, "");
        
        $this->meta_inc_tiempoasignacion = new clsField("meta_inc_tiempoasignacion", ccsInteger, "");
        
        $this->cumpleninc_tiemposolucion = new clsField("cumpleninc_tiemposolucion", ccsInteger, "");
        
        $this->totinc_tiemposolucion = new clsField("totinc_tiemposolucion", ccsInteger, "");
        
        $this->inc_tiemposolucion = new clsField("inc_tiemposolucion", ccsText, "");
        
        $this->meta_inc_tiemposolucion = new clsField("meta_inc_tiemposolucion", ccsInteger, "");
        
        $this->cumplenefic_presup = new clsField("cumplenefic_presup", ccsInteger, "");
        
        $this->totefic_presup = new clsField("totefic_presup", ccsInteger, "");
        
        $this->efic_presup = new clsField("efic_presup", ccsText, "");
        
        $this->meta_efic_presup = new clsField("meta_efic_presup", ccsText, "");
        
        $this->cumplenherr_est_cost1 = new clsField("cumplenherr_est_cost1", ccsInteger, "");
        
        $this->totherr_est_cost1 = new clsField("totherr_est_cost1", ccsInteger, "");
        
        $this->herr_est_cost1 = new clsField("herr_est_cost1", ccsText, "");
        
        $this->meta_herr_est_cost1 = new clsField("meta_herr_est_cost1", ccsFloat, "");
        
        $this->cumplenreq_serv1 = new clsField("cumplenreq_serv1", ccsInteger, "");
        
        $this->totreq_serv1 = new clsField("totreq_serv1", ccsInteger, "");
        
        $this->req_serv1 = new clsField("req_serv1", ccsText, "");
        
        $this->meta_req_serv1 = new clsField("meta_req_serv1", ccsFloat, "");
        
        $this->cumplencumpl_req_func1 = new clsField("cumplencumpl_req_func1", ccsInteger, "");
        
        $this->totcumpl_req_func1 = new clsField("totcumpl_req_func1", ccsInteger, "");
        
        $this->cumpl_req_func1 = new clsField("cumpl_req_func1", ccsText, "");
        
        $this->meta_cumpl_req_func1 = new clsField("meta_cumpl_req_func1", ccsFloat, "");
        
        $this->cumplencalidad_prod_term1 = new clsField("cumplencalidad_prod_term1", ccsInteger, "");
        
        $this->totcalidad_prod_term1 = new clsField("totcalidad_prod_term1", ccsInteger, "");
        
        $this->calidad_prod_term1 = new clsField("calidad_prod_term1", ccsText, "");
        
        $this->meta_calidad_prod_term1 = new clsField("meta_calidad_prod_term1", ccsFloat, "");
        
        $this->cumplenretr_entregable1 = new clsField("cumplenretr_entregable1", ccsInteger, "");
        
        $this->totretr_entregable1 = new clsField("totretr_entregable1", ccsInteger, "");
        
        $this->retr_entregable1 = new clsField("retr_entregable1", ccsText, "");
        
        $this->meta_retr_entregable1 = new clsField("meta_retr_entregable1", ccsFloat, "");
        
        $this->cumplencal_cod1 = new clsField("cumplencal_cod1", ccsInteger, "");
        
        $this->totcal_cod1 = new clsField("totcal_cod1", ccsInteger, "");
        
        $this->cal_cod1 = new clsField("cal_cod1", ccsText, "");
        
        $this->meta_cal_cod1 = new clsField("meta_cal_cod1", ccsFloat, "");
        
        $this->cumplendef_fug_amb_prod1 = new clsField("cumplendef_fug_amb_prod1", ccsInteger, "");
        
        $this->totdef_fug_amb_prod1 = new clsField("totdef_fug_amb_prod1", ccsInteger, "");
        
        $this->def_fug_amb_prod1 = new clsField("def_fug_amb_prod1", ccsText, "");
        
        $this->meta_def_fug_amb_prod1 = new clsField("meta_def_fug_amb_prod1", ccsFloat, "");
        
        $this->cumpleninc_tiempoasignacion1 = new clsField("cumpleninc_tiempoasignacion1", ccsInteger, "");
        
        $this->totinc_tiempoasignacion1 = new clsField("totinc_tiempoasignacion1", ccsInteger, "");
        
        $this->inc_tiempoasignacion1 = new clsField("inc_tiempoasignacion1", ccsText, "");
        
        $this->meta_inc_tiempoasignacion1 = new clsField("meta_inc_tiempoasignacion1", ccsInteger, "");
        
        $this->cumpleninc_tiemposolucion1 = new clsField("cumpleninc_tiemposolucion1", ccsInteger, "");
        
        $this->totinc_tiemposolucion1 = new clsField("totinc_tiemposolucion1", ccsInteger, "");
        
        $this->inc_tiemposolucion1 = new clsField("inc_tiemposolucion1", ccsText, "");
        
        $this->meta_inc_tiemposolucion1 = new clsField("meta_inc_tiemposolucion1", ccsInteger, "");
        
        $this->cumplenefic_presup1 = new clsField("cumplenefic_presup1", ccsInteger, "");
        
        $this->totefic_presup1 = new clsField("totefic_presup1", ccsInteger, "");
        
        $this->efic_presup1 = new clsField("efic_presup1", ccsText, "");
        
        $this->meta_efic_presup1 = new clsField("meta_efic_presup1", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-5D0759C7
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], CCGetSession("id_proveedor"), false);
        $this->wp->AddParameter("2", "urls_id_periodo", ccsInteger, "", "", $this->Parameters["urls_id_periodo"], 0, false);
        $this->wp->AddParameter("3", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], "", false);
    }
//End Prepare Method

//Open Method @2-FF85A107
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select  sc.descripcion,\n" .
        "	 sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end) totherr_est_cost, \n" .
        "		sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end) cumplenherr_est_cost, \n" .
        "		case when count(herr_est_cost)>0 then \n" .
        "			sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end)/cast(count(herr_est_cost) as float)*100 \n" .
        "		else 0 end herr_est_cost,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='herr_est_cost') as meta_herr_est_cost,\n" .
        "	 sum(case when req_serv='1' or req_serv='0' then 1 else 0 end) totreq_serv, \n" .
        "		sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end) cumplenreq_serv, \n" .
        "		case when count(req_serv)>0 then \n" .
        "			sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end)/cast(count(req_serv) as float)*100 \n" .
        "		else 0 end req_serv,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='req_serv') as meta_req_serv,\n" .
        "	 sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end) totcumpl_req_func, \n" .
        "		sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as int) else 0 end) cumplencumpl_req_func, \n" .
        "		case when count(cumpl_req_func)>0 then \n" .
        "			sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as int) else 0 end)/cast(count(cumpl_req_func) as float)*100 \n" .
        "		else 0 end cumpl_req_func ,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='cumpl_req_func') as meta_cumpl_req_func,\n" .
        "	 sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end) totcalidad_prod_term, \n" .
        "		sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end) cumplencalidad_prod_term, \n" .
        "		case when count(calidad_prod_term)>0 then \n" .
        "			sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end)/cast(count(calidad_prod_term) as float)*100 \n" .
        "		else 0 end calidad_prod_term,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='calidad_prod_term') as meta_calidad_prod_term,\n" .
        "	 sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end) totretr_entregable, \n" .
        "		sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end) cumplenretr_entregable, \n" .
        "		case when count(retr_entregable)>0 then \n" .
        "			sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end)/cast(count(retr_entregable) as float)*100 \n" .
        "		else 0 end retr_entregable,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='retr_entregable') as meta_retr_entregable,\n" .
        "	 sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end) totcal_cod, \n" .
        "		sum(case when isnumeric(calidad_codigo)=1 then cast(calidad_codigo  as int) else 0 end) cumplencal_cod, \n" .
        "		case when count(calidad_codigo)>0 then \n" .
        "			sum(case when isnumeric(calidad_codigo)=1 then cast(calidad_codigo  as int) else 0 end)/cast(count(calidad_codigo) as float)*100 \n" .
        "		else 0 end cal_cod,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='cal_cod') as meta_cal_cod,\n" .
        "	 sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end) totdef_fug_amb_prod, \n" .
        "		sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end) cumplendef_fug_amb_prod, \n" .
        "		case when count(def_fug_amb_prod)>0 then \n" .
        "			sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end)/cast(count(def_fug_amb_prod) as float)*100  \n" .
        "		else 0 end def_fug_amb_prod,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='def_fug_amb_prod') as meta_def_fug_amb_prod,\n" .
        "count(cumple_inc_tiempoasignacion) totinc_tiempoasignacion, \n" .
        "		sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end) cumpleninc_tiempoasignacion, \n" .
        "		case when count(cumple_inc_tiempoasignacion)>0 then \n" .
        "			sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end)/cast(count(cumple_inc_tiempoasignacion) as float)*100 \n" .
        "		else 0 end inc_tiempoasignacion,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='inc_tiempoasignacion') as meta_inc_tiempoasignacion,\n" .
        "	 count(cumple_inc_tiemposolucion) totinc_tiemposolucion, \n" .
        "		sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end) cumpleninc_tiemposolucion, \n" .
        "		case when count(cumple_inc_tiemposolucion)>0 then \n" .
        "			sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end)/cast(count(cumple_inc_tiemposolucion) as float)*100 \n" .
        "		else 0 end inc_tiemposolucion,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='inc_tiemposolucion') as meta_inc_tiemposolucion,\n" .
        "	 	 AVG(Cumple_EF) cumplen_efic_presup, AVG(total_ef) tot_efic_presup, avg(cast(Cumple_EF as float))/avg(total_ef)*100  efic_presup,\n" .
        "	 (Select Meta from [archivosxls].[dbo].mc_c_metrica where acronimo='EFIC_PRESUP') as meta_efic_presup\n" .
        "from [archivosxls].[dbo].mc_c_ServContractual sc \n" .
        "left join (select * from [archivosxls].[dbo].l_calificacion_rs_aut m\n" .
        "	where m.id_periodo=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "   and m.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and m.tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' and m.estatus ='F' \n" .
        "	and num_carga=(\n" .
        "       select max(b.num_carga)\n" .
        "       from [archivosxls].[dbo].l_calificacion_rs_aut  b\n" .
        "       where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "       and b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "       and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "       and b.estatus='F'\n" .
        "       )) m on sc.Descripcion  = m.servicio_cont  \n" .
        "	 left join	(select cumple_inc_tiempoasignacion, cumple_inc_tiempoSolucion, \n" .
        "				id_proveedor, 'Servicio de Soporte de Aplicaciones'  servicio_cont\n" .
        "				from [archivosxls].[dbo].l_calificacion_incidentes_AUT\n" .
        "				where (id_periodo=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "  and id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'   and estatus ='F'\n" .
        "				and num_carga=(select max(b.num_carga) from [archivosxls].[dbo].l_calificacion_incidentes_aut b \n" .
        "				where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and b.id_periodo =  " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'  and b.estatus='F' ) \n" .
        "				) )  mi on  mi.servicio_cont = sc.Descripcion \n" .
        "	left join (select SUM(case when efic_presupuestal='1' or efic_presupuestal='0' then 1 else 0 end) Cumple_EF, COUNT(efic_presupuestal) Total_EF, Id_Proveedor,  2 IdServicioCont  \n" .
        "			from [archivosxls].[dbo].l_detalle_eficiencia_presupuestal \n" .
        "			where (id_periodo= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "  and id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'   and estatus ='F'\n" .
        "				and num_carga=(select max(b.num_carga) from [archivosxls].[dbo].l_calificacion_incidentes_aut b \n" .
        "				where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'  and b.estatus='F' ) \n" .
        "				) group by id_proveedor ) ef on ef.IdServicioCont = sc.id\n" .
        "where sc.Aplica ='CDS' and IdOld <>0\n" .
        "group by sc.Descripcion ) cnt";
        $this->SQL = "select  sc.descripcion,\n" .
        "	 sum(case when herr_est_cost='1' or herr_est_cost='0' then 1 else 0 end) totherr_est_cost, \n" .
        "		sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end) cumplenherr_est_cost, \n" .
        "		case when count(herr_est_cost)>0 then \n" .
        "			sum(case when isnumeric(herr_est_cost)=1 then cast(herr_est_cost as int) else 0 end)/cast(count(herr_est_cost) as float)*100 \n" .
        "		else 0 end herr_est_cost,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='herr_est_cost') as meta_herr_est_cost,\n" .
        "	 sum(case when req_serv='1' or req_serv='0' then 1 else 0 end) totreq_serv, \n" .
        "		sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end) cumplenreq_serv, \n" .
        "		case when count(req_serv)>0 then \n" .
        "			sum(case when isnumeric(req_serv)=1 then cast(req_serv as int) else 0 end)/cast(count(req_serv) as float)*100 \n" .
        "		else 0 end req_serv,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='req_serv') as meta_req_serv,\n" .
        "	 sum(case when cumpl_req_func='1' or cumpl_req_func='0' then 1 else 0 end) totcumpl_req_func, \n" .
        "		sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as int) else 0 end) cumplencumpl_req_func, \n" .
        "		case when count(cumpl_req_func)>0 then \n" .
        "			sum(case when isnumeric(cumpl_req_func)=1 then cast(cumpl_req_func as int) else 0 end)/cast(count(cumpl_req_func) as float)*100 \n" .
        "		else 0 end cumpl_req_func ,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='cumpl_req_func') as meta_cumpl_req_func,\n" .
        "	 sum(case when calidad_prod_term='1' or calidad_prod_term='0' then 1 else 0 end) totcalidad_prod_term, \n" .
        "		sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end) cumplencalidad_prod_term, \n" .
        "		case when count(calidad_prod_term)>0 then \n" .
        "			sum(case when isnumeric(calidad_prod_term)=1 then cast(calidad_prod_term as int) else 0 end)/cast(count(calidad_prod_term) as float)*100 \n" .
        "		else 0 end calidad_prod_term,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='calidad_prod_term') as meta_calidad_prod_term,\n" .
        "	 sum(case when retr_entregable='1' or retr_entregable='0' then 1 else 0 end) totretr_entregable, \n" .
        "		sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end) cumplenretr_entregable, \n" .
        "		case when count(retr_entregable)>0 then \n" .
        "			sum(case when isnumeric(retr_entregable)=1 then cast(retr_entregable as int) else 0 end)/cast(count(retr_entregable) as float)*100 \n" .
        "		else 0 end retr_entregable,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='retr_entregable') as meta_retr_entregable,\n" .
        "	 sum(case when calidad_codigo='1' or calidad_codigo='0' then 1 else 0 end) totcal_cod, \n" .
        "		sum(case when isnumeric(calidad_codigo)=1 then cast(calidad_codigo  as int) else 0 end) cumplencal_cod, \n" .
        "		case when count(calidad_codigo)>0 then \n" .
        "			sum(case when isnumeric(calidad_codigo)=1 then cast(calidad_codigo  as int) else 0 end)/cast(count(calidad_codigo) as float)*100 \n" .
        "		else 0 end cal_cod,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='cal_cod') as meta_cal_cod,\n" .
        "	 sum(case when def_fug_amb_prod='1' or def_fug_amb_prod='0' then 1 else 0 end) totdef_fug_amb_prod, \n" .
        "		sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end) cumplendef_fug_amb_prod, \n" .
        "		case when count(def_fug_amb_prod)>0 then \n" .
        "			sum(case when isnumeric(def_fug_amb_prod)=1 then cast(def_fug_amb_prod as int) else 0 end)/cast(count(def_fug_amb_prod) as float)*100  \n" .
        "		else 0 end def_fug_amb_prod,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='def_fug_amb_prod') as meta_def_fug_amb_prod,\n" .
        "count(cumple_inc_tiempoasignacion) totinc_tiempoasignacion, \n" .
        "		sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end) cumpleninc_tiempoasignacion, \n" .
        "		case when count(cumple_inc_tiempoasignacion)>0 then \n" .
        "			sum(case when isnumeric(cumple_inc_tiempoasignacion)=1 then cast(cumple_inc_tiempoasignacion as int) else 0 end)/cast(count(cumple_inc_tiempoasignacion) as float)*100 \n" .
        "		else 0 end inc_tiempoasignacion,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='inc_tiempoasignacion') as meta_inc_tiempoasignacion,\n" .
        "	 count(cumple_inc_tiemposolucion) totinc_tiemposolucion, \n" .
        "		sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end) cumpleninc_tiemposolucion, \n" .
        "		case when count(cumple_inc_tiemposolucion)>0 then \n" .
        "			sum(case when isnumeric(cumple_inc_tiempoSolucion)=1 then cast(cumple_inc_tiempoSolucion as int) else 0 end)/cast(count(cumple_inc_tiemposolucion) as float)*100 \n" .
        "		else 0 end inc_tiemposolucion,\n" .
        "	 (select meta from [archivosxls].[dbo].mc_c_metrica where acronimo='inc_tiemposolucion') as meta_inc_tiemposolucion,\n" .
        "	 	 AVG(Cumple_EF) cumplen_efic_presup, AVG(total_ef) tot_efic_presup, avg(cast(Cumple_EF as float))/avg(total_ef)*100  efic_presup,\n" .
        "	 (Select Meta from [archivosxls].[dbo].mc_c_metrica where acronimo='EFIC_PRESUP') as meta_efic_presup\n" .
        "from [archivosxls].[dbo].mc_c_ServContractual sc \n" .
        "left join (select * from [archivosxls].[dbo].l_calificacion_rs_aut m\n" .
        "	where m.id_periodo=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "   and m.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and m.tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' and m.estatus ='F' \n" .
        "	and num_carga=(\n" .
        "       select max(b.num_carga)\n" .
        "       from [archivosxls].[dbo].l_calificacion_rs_aut  b\n" .
        "       where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "       and b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "       and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "       and b.estatus='F'\n" .
        "       )) m on sc.Descripcion  = m.servicio_cont  \n" .
        "	 left join	(select cumple_inc_tiempoasignacion, cumple_inc_tiempoSolucion, \n" .
        "				id_proveedor, 'Servicio de Soporte de Aplicaciones'  servicio_cont\n" .
        "				from [archivosxls].[dbo].l_calificacion_incidentes_AUT\n" .
        "				where (id_periodo=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "  and id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'   and estatus ='F'\n" .
        "				and num_carga=(select max(b.num_carga) from [archivosxls].[dbo].l_calificacion_incidentes_aut b \n" .
        "				where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and b.id_periodo =  " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'  and b.estatus='F' ) \n" .
        "				) )  mi on  mi.servicio_cont = sc.Descripcion \n" .
        "	left join (select SUM(case when efic_presupuestal='1' or efic_presupuestal='0' then 1 else 0 end) Cumple_EF, COUNT(efic_presupuestal) Total_EF, Id_Proveedor,  2 IdServicioCont  \n" .
        "			from [archivosxls].[dbo].l_detalle_eficiencia_presupuestal \n" .
        "			where (id_periodo= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "  and id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and tipo_nivel_servicio ='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'   and estatus ='F'\n" .
        "				and num_carga=(select max(b.num_carga) from [archivosxls].[dbo].l_calificacion_incidentes_aut b \n" .
        "				where b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " and b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'  and b.estatus='F' ) \n" .
        "				) group by id_proveedor ) ef on ef.IdServicioCont = sc.id\n" .
        "where sc.Aplica ='CDS' and IdOld <>0\n" .
        "group by sc.Descripcion ";
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

//SetValues Method @2-4E29109A
    function SetValues()
    {
        $this->descripcion->SetDBValue($this->f("descripcion"));
        $this->cumplenherr_est_cost->SetDBValue(trim($this->f("cumplenherr_est_cost")));
        $this->cumplenreq_serv->SetDBValue(trim($this->f("cumplenreq_serv")));
        $this->cumplencumpl_req_func->SetDBValue(trim($this->f("cumplencumpl_req_func")));
        $this->cumplencalidad_prod_term->SetDBValue(trim($this->f("cumplencalidad_prod_term")));
        $this->cumplenretr_entregable->SetDBValue(trim($this->f("cumplenretr_entregable")));
        $this->cumplencal_cod->SetDBValue(trim($this->f("cumplencal_cod")));
        $this->cumplendef_fug_amb_prod->SetDBValue(trim($this->f("cumplendef_fug_amb_prod")));
        $this->totherr_est_cost->SetDBValue(trim($this->f("totherr_est_cost")));
        $this->herr_est_cost->SetDBValue($this->f("herr_est_cost"));
        $this->meta_herr_est_cost->SetDBValue(trim($this->f("meta_herr_est_cost")));
        $this->totreq_serv->SetDBValue(trim($this->f("totreq_serv")));
        $this->req_serv->SetDBValue($this->f("req_serv"));
        $this->meta_req_serv->SetDBValue(trim($this->f("meta_req_serv")));
        $this->totcumpl_req_func->SetDBValue(trim($this->f("totcumpl_req_func")));
        $this->cumpl_req_func->SetDBValue($this->f("cumpl_req_func"));
        $this->meta_cumpl_req_func->SetDBValue(trim($this->f("meta_cumpl_req_func")));
        $this->totcalidad_prod_term->SetDBValue(trim($this->f("totcalidad_prod_term")));
        $this->calidad_prod_term->SetDBValue($this->f("calidad_prod_term"));
        $this->meta_calidad_prod_term->SetDBValue(trim($this->f("meta_calidad_prod_term")));
        $this->totretr_entregable->SetDBValue(trim($this->f("totretr_entregable")));
        $this->retr_entregable->SetDBValue($this->f("retr_entregable"));
        $this->meta_retr_entregable->SetDBValue(trim($this->f("meta_retr_entregable")));
        $this->totcal_cod->SetDBValue(trim($this->f("totcal_cod")));
        $this->cal_cod->SetDBValue($this->f("cal_cod"));
        $this->meta_cal_cod->SetDBValue(trim($this->f("meta_cal_cod")));
        $this->totdef_fug_amb_prod->SetDBValue(trim($this->f("totdef_fug_amb_prod")));
        $this->def_fug_amb_prod->SetDBValue($this->f("def_fug_amb_prod"));
        $this->meta_def_fug_amb_prod->SetDBValue(trim($this->f("meta_def_fug_amb_prod")));
        $this->cumpleninc_tiempoasignacion->SetDBValue(trim($this->f("cumpleninc_tiempoasignacion")));
        $this->totinc_tiempoasignacion->SetDBValue(trim($this->f("totinc_tiempoasignacion")));
        $this->inc_tiempoasignacion->SetDBValue($this->f("inc_tiempoasignacion"));
        $this->meta_inc_tiempoasignacion->SetDBValue(trim($this->f("meta_inc_tiempoasignacion")));
        $this->cumpleninc_tiemposolucion->SetDBValue(trim($this->f("cumpleninc_tiemposolucion")));
        $this->totinc_tiemposolucion->SetDBValue(trim($this->f("totinc_tiemposolucion")));
        $this->inc_tiemposolucion->SetDBValue($this->f("inc_tiemposolucion"));
        $this->meta_inc_tiemposolucion->SetDBValue(trim($this->f("meta_inc_tiemposolucion")));
        $this->cumplenefic_presup->SetDBValue(trim($this->f("cumplen_efic_presup")));
        $this->totefic_presup->SetDBValue(trim($this->f("tot_efic_presup")));
        $this->efic_presup->SetDBValue($this->f("efic_presup"));
        $this->meta_efic_presup->SetDBValue($this->f("meta_efic_presup"));
        $this->cumplenherr_est_cost1->SetDBValue(trim($this->f("cumplenherr_est_cost")));
        $this->totherr_est_cost1->SetDBValue(trim($this->f("totherr_est_cost")));
        $this->herr_est_cost1->SetDBValue($this->f("herr_est_cost"));
        $this->meta_herr_est_cost1->SetDBValue(trim($this->f("meta_herr_est_cost")));
        $this->cumplenreq_serv1->SetDBValue(trim($this->f("cumplenreq_serv")));
        $this->totreq_serv1->SetDBValue(trim($this->f("totreq_serv")));
        $this->req_serv1->SetDBValue($this->f("req_serv"));
        $this->meta_req_serv1->SetDBValue(trim($this->f("meta_req_serv")));
        $this->cumplencumpl_req_func1->SetDBValue(trim($this->f("cumplencumpl_req_func")));
        $this->totcumpl_req_func1->SetDBValue(trim($this->f("totcumpl_req_func")));
        $this->cumpl_req_func1->SetDBValue($this->f("cumpl_req_func"));
        $this->meta_cumpl_req_func1->SetDBValue(trim($this->f("meta_cumpl_req_func")));
        $this->cumplencalidad_prod_term1->SetDBValue(trim($this->f("cumplencalidad_prod_term")));
        $this->totcalidad_prod_term1->SetDBValue(trim($this->f("totcalidad_prod_term")));
        $this->calidad_prod_term1->SetDBValue($this->f("calidad_prod_term"));
        $this->meta_calidad_prod_term1->SetDBValue(trim($this->f("meta_calidad_prod_term")));
        $this->cumplenretr_entregable1->SetDBValue(trim($this->f("cumplenretr_entregable")));
        $this->totretr_entregable1->SetDBValue(trim($this->f("totretr_entregable")));
        $this->retr_entregable1->SetDBValue($this->f("retr_entregable"));
        $this->meta_retr_entregable1->SetDBValue(trim($this->f("meta_retr_entregable")));
        $this->cumplencal_cod1->SetDBValue(trim($this->f("cumplencal_cod")));
        $this->totcal_cod1->SetDBValue(trim($this->f("totcal_cod")));
        $this->cal_cod1->SetDBValue($this->f("cal_cod"));
        $this->meta_cal_cod1->SetDBValue(trim($this->f("meta_cal_cod")));
        $this->cumplendef_fug_amb_prod1->SetDBValue(trim($this->f("cumplendef_fug_amb_prod")));
        $this->totdef_fug_amb_prod1->SetDBValue(trim($this->f("totdef_fug_amb_prod")));
        $this->def_fug_amb_prod1->SetDBValue($this->f("def_fug_amb_prod"));
        $this->meta_def_fug_amb_prod1->SetDBValue(trim($this->f("meta_def_fug_amb_prod")));
        $this->cumpleninc_tiempoasignacion1->SetDBValue(trim($this->f("cumpleninc_tiempoasignacion")));
        $this->totinc_tiempoasignacion1->SetDBValue(trim($this->f("totinc_tiempoasignacion")));
        $this->inc_tiempoasignacion1->SetDBValue($this->f("inc_tiempoasignacion"));
        $this->meta_inc_tiempoasignacion1->SetDBValue(trim($this->f("meta_inc_tiempoasignacion")));
        $this->cumpleninc_tiemposolucion1->SetDBValue(trim($this->f("cumpleninc_tiemposolucion")));
        $this->totinc_tiemposolucion1->SetDBValue(trim($this->f("totinc_tiemposolucion")));
        $this->inc_tiemposolucion1->SetDBValue($this->f("inc_tiemposolucion"));
        $this->meta_inc_tiemposolucion1->SetDBValue(trim($this->f("meta_inc_tiemposolucion")));
        $this->cumplenefic_presup1->SetDBValue(trim($this->f("cumplen_efic_presup")));
        $this->totefic_presup1->SetDBValue(trim($this->f("tot_efic_presup")));
        $this->efic_presup1->SetDBValue($this->f("efic_presup"));
        $this->meta_efic_presup1->SetDBValue($this->f("meta_efic_presup"));
    }
//End SetValues Method

} //End Grid1DataSource Class @2-FCB6E20C



//Initialize Page @1-F877155A
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
$TemplateFileName = "comparativo.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-F245928E
include_once("./comparativo_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-E460F639
$DBcon_xls = new clsDBcon_xls();
$MainPage->Connections["con_xls"] = & $DBcon_xls;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$l_calificacion_incidentes1 = new clsRecordl_calificacion_incidentes1("", $MainPage);
$lb_periodo_fecha_carga = new clsControl(ccsLabel, "lb_periodo_fecha_carga", "lb_periodo_fecha_carga", ccsText, "", CCGetRequestParam("lb_periodo_fecha_carga", ccsGet, NULL), $MainPage);
$lb_periodo_fecha_carga->HTML = true;
$Grid1 = new clsGridGrid1("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->l_calificacion_incidentes1 = & $l_calificacion_incidentes1;
$MainPage->lb_periodo_fecha_carga = & $lb_periodo_fecha_carga;
$MainPage->Grid1 = & $Grid1;
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

//Execute Components @1-7D906631
$l_calificacion_incidentes1->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-3CDA54CF
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcon_xls->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($l_calificacion_incidentes1);
    unset($Grid1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-88D6C1F9
$Header->Show();
$l_calificacion_incidentes1->Show();
$Grid1->Show();
$lb_periodo_fecha_carga->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$main_block = CCConvertEncoding($main_block, $FileEncoding, $TemplateEncoding);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-266F095E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcon_xls->close();
$Header->Class_Terminate();
unset($Header);
unset($l_calificacion_incidentes1);
unset($Grid1);
unset($Tpl);
//End Unload Page


?>
