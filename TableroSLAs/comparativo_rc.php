<?php
//Include Common Files @1-DF3C1A65
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "comparativo_rc.php");
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

//Class_Initialize Event @3-76ACA409
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
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsSQL;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->DataSource->SQL = "select id_proveedor, nombre from mc_c_proveedor where descripcion!='CAPC'";
            $this->s_id_proveedor->DataSource->Order = "";
            $this->s_opt_slas = new clsControl(ccsListBox, "s_opt_slas", "s_opt_slas", ccsText, "", CCGetRequestParam("s_opt_slas", $Method, NULL), $this);
            $this->s_opt_slas->DSType = dsListOfValues;
            $this->s_opt_slas->Values = array(array("SLA", "SLA"), array("SLO", "SLO"));
            $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", $Method, NULL), $this);
            $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->Link1->Page = "comparativo.php";
            $this->Link2 = new clsControl(ccsLink, "Link2", "Link2", ccsText, "", CCGetRequestParam("Link2", $Method, NULL), $this);
            $this->Link2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->Link2->Page = "comparativo_inc.php";
            $this->Link3 = new clsControl(ccsLink, "Link3", "Link3", ccsText, "", CCGetRequestParam("Link3", $Method, NULL), $this);
            $this->Link3->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->Link3->Page = "comparativo_ra.php";
            $this->Link4 = new clsControl(ccsLink, "Link4", "Link4", ccsText, "", CCGetRequestParam("Link4", $Method, NULL), $this);
            $this->Link4->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->Link4->Page = "comparativo_rc.php";
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

class clsGridGrid1 { //Grid1 class @135-E857A572

//Variables @135-6E51DF5A

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

//Class_Initialize Event @135-0F5BE4C5
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
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->estado_comparativo = new clsControl(ccsLabel, "estado_comparativo", "estado_comparativo", ccsText, "", CCGetRequestParam("estado_comparativo", ccsGet, NULL), $this);
        $this->id_ppmc = new clsControl(ccsLabel, "id_ppmc", "id_ppmc", ccsInteger, "", CCGetRequestParam("id_ppmc", ccsGet, NULL), $this);
        $this->id_estimacion = new clsControl(ccsLabel, "id_estimacion", "id_estimacion", ccsInteger, "", CCGetRequestParam("id_estimacion", ccsGet, NULL), $this);
        $this->servicio_negocio = new clsControl(ccsLabel, "servicio_negocio", "servicio_negocio", ccsText, "", CCGetRequestParam("servicio_negocio", ccsGet, NULL), $this);
        $this->descripcion = new clsControl(ccsLabel, "descripcion", "descripcion", ccsMemo, "", CCGetRequestParam("descripcion", ccsGet, NULL), $this);
        $this->cump_req_func = new clsControl(ccsLabel, "cump_req_func", "cump_req_func", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("cump_req_func", ccsGet, NULL), $this);
        $this->retraso_entregables = new clsControl(ccsLabel, "retraso_entregables", "retraso_entregables", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("retraso_entregables", ccsGet, NULL), $this);
        $this->calidad_prod_term = new clsControl(ccsLabel, "calidad_prod_term", "calidad_prod_term", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("calidad_prod_term", ccsGet, NULL), $this);
        $this->calidad_codigo = new clsControl(ccsLabel, "calidad_codigo", "calidad_codigo", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("calidad_codigo", ccsGet, NULL), $this);
        $this->defectos_fugados_amb_prod = new clsControl(ccsLabel, "defectos_fugados_amb_prod", "defectos_fugados_amb_prod", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("defectos_fugados_amb_prod", ccsGet, NULL), $this);
        $this->tipo = new clsControl(ccsLabel, "tipo", "tipo", ccsText, "", CCGetRequestParam("tipo", ccsGet, NULL), $this);
        $this->serv_contractual = new clsControl(ccsLabel, "serv_contractual", "serv_contractual", ccsText, "", CCGetRequestParam("serv_contractual", ccsGet, NULL), $this);
        $this->fecha_caes = new clsControl(ccsLabel, "fecha_caes", "fecha_caes", ccsDate, $DefaultDateFormat, CCGetRequestParam("fecha_caes", ccsGet, NULL), $this);
        $this->tipo_nivel_servicio = new clsControl(ccsLabel, "tipo_nivel_servicio", "tipo_nivel_servicio", ccsText, "", CCGetRequestParam("tipo_nivel_servicio", ccsGet, NULL), $this);
        $this->imgcump_req_func = new clsControl(ccsImage, "imgcump_req_func", "imgcump_req_func", ccsText, "", CCGetRequestParam("imgcump_req_func", ccsGet, NULL), $this);
        $this->imgretraso_entregables = new clsControl(ccsImage, "imgretraso_entregables", "imgretraso_entregables", ccsText, "", CCGetRequestParam("imgretraso_entregables", ccsGet, NULL), $this);
        $this->imgcalidad_prod_term = new clsControl(ccsImage, "imgcalidad_prod_term", "imgcalidad_prod_term", ccsText, "", CCGetRequestParam("imgcalidad_prod_term", ccsGet, NULL), $this);
        $this->imgcalidad_codigo = new clsControl(ccsImage, "imgcalidad_codigo", "imgcalidad_codigo", ccsText, "", CCGetRequestParam("imgcalidad_codigo", ccsGet, NULL), $this);
        $this->imgdefectos_fugados_amb_prod = new clsControl(ccsImage, "imgdefectos_fugados_amb_prod", "imgdefectos_fugados_amb_prod", ccsText, "", CCGetRequestParam("imgdefectos_fugados_amb_prod", ccsGet, NULL), $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @135-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @135-59B18386
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_opt_slas"] = CCGetFromGet("s_opt_slas", NULL);
        $this->DataSource->Parameters["urls_id_periodo"] = CCGetFromGet("s_id_periodo", NULL);
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
            $this->ControlsVisible["estado_comparativo"] = $this->estado_comparativo->Visible;
            $this->ControlsVisible["id_ppmc"] = $this->id_ppmc->Visible;
            $this->ControlsVisible["id_estimacion"] = $this->id_estimacion->Visible;
            $this->ControlsVisible["servicio_negocio"] = $this->servicio_negocio->Visible;
            $this->ControlsVisible["descripcion"] = $this->descripcion->Visible;
            $this->ControlsVisible["cump_req_func"] = $this->cump_req_func->Visible;
            $this->ControlsVisible["retraso_entregables"] = $this->retraso_entregables->Visible;
            $this->ControlsVisible["calidad_prod_term"] = $this->calidad_prod_term->Visible;
            $this->ControlsVisible["calidad_codigo"] = $this->calidad_codigo->Visible;
            $this->ControlsVisible["defectos_fugados_amb_prod"] = $this->defectos_fugados_amb_prod->Visible;
            $this->ControlsVisible["tipo"] = $this->tipo->Visible;
            $this->ControlsVisible["serv_contractual"] = $this->serv_contractual->Visible;
            $this->ControlsVisible["fecha_caes"] = $this->fecha_caes->Visible;
            $this->ControlsVisible["tipo_nivel_servicio"] = $this->tipo_nivel_servicio->Visible;
            $this->ControlsVisible["imgcump_req_func"] = $this->imgcump_req_func->Visible;
            $this->ControlsVisible["imgretraso_entregables"] = $this->imgretraso_entregables->Visible;
            $this->ControlsVisible["imgcalidad_prod_term"] = $this->imgcalidad_prod_term->Visible;
            $this->ControlsVisible["imgcalidad_codigo"] = $this->imgcalidad_codigo->Visible;
            $this->ControlsVisible["imgdefectos_fugados_amb_prod"] = $this->imgdefectos_fugados_amb_prod->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->estado_comparativo->SetValue($this->DataSource->estado_comparativo->GetValue());
                $this->id_ppmc->SetValue($this->DataSource->id_ppmc->GetValue());
                $this->id_estimacion->SetValue($this->DataSource->id_estimacion->GetValue());
                $this->servicio_negocio->SetValue($this->DataSource->servicio_negocio->GetValue());
                $this->descripcion->SetValue($this->DataSource->descripcion->GetValue());
                $this->cump_req_func->SetValue($this->DataSource->cump_req_func->GetValue());
                $this->retraso_entregables->SetValue($this->DataSource->retraso_entregables->GetValue());
                $this->calidad_prod_term->SetValue($this->DataSource->calidad_prod_term->GetValue());
                $this->calidad_codigo->SetValue($this->DataSource->calidad_codigo->GetValue());
                $this->defectos_fugados_amb_prod->SetValue($this->DataSource->defectos_fugados_amb_prod->GetValue());
                $this->tipo->SetValue($this->DataSource->tipo->GetValue());
                $this->serv_contractual->SetValue($this->DataSource->serv_contractual->GetValue());
                $this->fecha_caes->SetValue($this->DataSource->fecha_caes->GetValue());
                $this->tipo_nivel_servicio->SetValue($this->DataSource->tipo_nivel_servicio->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->estado_comparativo->Show();
                $this->id_ppmc->Show();
                $this->id_estimacion->Show();
                $this->servicio_negocio->Show();
                $this->descripcion->Show();
                $this->cump_req_func->Show();
                $this->retraso_entregables->Show();
                $this->calidad_prod_term->Show();
                $this->calidad_codigo->Show();
                $this->defectos_fugados_amb_prod->Show();
                $this->tipo->Show();
                $this->serv_contractual->Show();
                $this->fecha_caes->Show();
                $this->tipo_nivel_servicio->Show();
                $this->imgcump_req_func->Show();
                $this->imgretraso_entregables->Show();
                $this->imgcalidad_prod_term->Show();
                $this->imgcalidad_codigo->Show();
                $this->imgdefectos_fugados_amb_prod->Show();
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

//GetErrors Method @135-FB88DD15
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->estado_comparativo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_ppmc->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_estimacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->servicio_negocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cump_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->retraso_entregables->Errors->ToString());
        $errors = ComposeStrings($errors, $this->calidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->calidad_codigo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->defectos_fugados_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->tipo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->serv_contractual->Errors->ToString());
        $errors = ComposeStrings($errors, $this->fecha_caes->Errors->ToString());
        $errors = ComposeStrings($errors, $this->tipo_nivel_servicio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcump_req_func->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgretraso_entregables->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcalidad_prod_term->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgcalidad_codigo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgdefectos_fugados_amb_prod->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @135-FCB6E20C

class clsGrid1DataSource extends clsDBcnDisenio {  //Grid1DataSource Class @135-9B337F8E

//DataSource Variables @135-D1A121A3
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $estado_comparativo;
    public $id_ppmc;
    public $id_estimacion;
    public $servicio_negocio;
    public $descripcion;
    public $cump_req_func;
    public $retraso_entregables;
    public $calidad_prod_term;
    public $calidad_codigo;
    public $defectos_fugados_amb_prod;
    public $tipo;
    public $serv_contractual;
    public $fecha_caes;
    public $tipo_nivel_servicio;
//End DataSource Variables

//DataSourceClass_Initialize Event @135-CBF4D4AD
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->estado_comparativo = new clsField("estado_comparativo", ccsText, "");
        
        $this->id_ppmc = new clsField("id_ppmc", ccsInteger, "");
        
        $this->id_estimacion = new clsField("id_estimacion", ccsInteger, "");
        
        $this->servicio_negocio = new clsField("servicio_negocio", ccsText, "");
        
        $this->descripcion = new clsField("descripcion", ccsMemo, "");
        
        $this->cump_req_func = new clsField("cump_req_func", ccsBoolean, $this->BooleanFormat);
        
        $this->retraso_entregables = new clsField("retraso_entregables", ccsBoolean, $this->BooleanFormat);
        
        $this->calidad_prod_term = new clsField("calidad_prod_term", ccsBoolean, $this->BooleanFormat);
        
        $this->calidad_codigo = new clsField("calidad_codigo", ccsBoolean, $this->BooleanFormat);
        
        $this->defectos_fugados_amb_prod = new clsField("defectos_fugados_amb_prod", ccsBoolean, $this->BooleanFormat);
        
        $this->tipo = new clsField("tipo", ccsText, "");
        
        $this->serv_contractual = new clsField("serv_contractual", ccsText, "");
        
        $this->fecha_caes = new clsField("fecha_caes", ccsDate, $this->DateFormat);
        
        $this->tipo_nivel_servicio = new clsField("tipo_nivel_servicio", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @135-3E7ED564
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "id_ppmc,id_estimacion,estado_comparativo";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @135-58E80A2C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], 'SLA', false);
        $this->wp->AddParameter("2", "urls_id_periodo", ccsText, "", "", $this->Parameters["urls_id_periodo"], 31, false);
        $this->wp->AddParameter("3", "urls_id_proveedor", ccsText, "", "", $this->Parameters["urls_id_proveedor"], 2, false);
    }
//End Prepare Method

//Open Method @135-10D15EF9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select * from (\n" .
        "\n" .
        "SELECT datoscapc.*,'REGISTRO CAPC' estado_comparativo from (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from \n" .
        "(\n" .
        "select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, \n" .
        "	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,\n" .
        "	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , \n" .
        "	c.CUMPL_REQ_FUNC cump_req_func, \n" .
        "	C.CALIDAD_PROD_TERM calidad_prod_term ,\n" .
        "	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,\n" .
        "	c.CAL_COD calidad_codigo,\n" .
        "	i.FechaFirmaCAES fecha_caes,    \n" .
        "	sc.descripcion serv_contractual,\n" .
        "    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio\n" .
        "from mc_universo_cds u inner join \n" .
        "	(\n" .
        "SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA\n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO \n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id\n" .
        "left join mc_info_rs_cr_re_rc i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo\n" .
        "left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso\n" .
        "left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id\n" .
        "left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio \n" .
        "where  isnull(descartar_manual,0)=0 and tipo='PC'\n" .
        "	AND pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "	AND u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        ") a \n" .
        "where tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "	\n" .
        ") datoscapc\n" .
        "INNER JOIN (\n" .
        "\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,\n" .
        "case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,\n" .
        "case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,\n" .
        "case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,\n" .
        "case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,\n" .
        "case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,\n" .
        "a.tipo,a.serv_contractual,a.fecha_caes, 'SLA' tipo_nivel_servicio\n" .
        "FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a\n" .
        "        WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND a.estatus='F'\n" .
        "        and  a.num_carga=(\n" .
        "        SELECT max(b.num_carga)\n" .
        "        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b\n" .
        "        WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND b.estatus='F'\n" .
        "        )\n" .
        "\n" .
        ") datossat ON datossat.id_ppmc=datoscapc.id_ppmc and datossat.id_estimacion=datoscapc.id_estimacion\n" .
        "AND  (datossat.cump_req_func!=datoscapc.cump_req_func\n" .
        "OR datossat.retraso_entregables!=datoscapc.retraso_entregables\n" .
        "OR datossat.calidad_prod_term!=datoscapc.calidad_prod_term\n" .
        "OR datossat.calidad_codigo!=datoscapc.calidad_codigo\n" .
        "OR datossat.defectos_fugados_amb_prod!=datoscapc.defectos_fugados_amb_prod\n" .
        "--OR datossat.tipo!=datoscapc.tipo\n" .
        "--OR datossat.serv_contractual!=datoscapc.serv_contractual\n" .
        ")\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT datossat.*,'REGISTRO CDS' estado_comparativo from (\n" .
        "\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,\n" .
        "case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,\n" .
        "case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,\n" .
        "case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,\n" .
        "case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,\n" .
        "case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,\n" .
        "a.tipo,a.serv_contractual,a.fecha_caes, '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' tipo_nivel_servicio\n" .
        "FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a\n" .
        "        WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND a.estatus='F'\n" .
        "        and  a.num_carga=(\n" .
        "        SELECT max(b.num_carga)\n" .
        "        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b\n" .
        "        WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND b.estatus='F'\n" .
        "        )\n" .
        ") datossat\n" .
        "INNER JOIN (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from \n" .
        "(\n" .
        "select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, \n" .
        "	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,\n" .
        "	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , \n" .
        "	c.CUMPL_REQ_FUNC cump_req_func, \n" .
        "	C.CALIDAD_PROD_TERM calidad_prod_term ,\n" .
        "	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,\n" .
        "	c.CAL_COD calidad_codigo,\n" .
        "	i.FechaFirmaCAES fecha_caes,    \n" .
        "	sc.descripcion serv_contractual,\n" .
        "    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio\n" .
        "from mc_universo_cds u inner join \n" .
        "	(\n" .
        "SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA\n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO \n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id\n" .
        "left join mc_info_rs_cr_re_rc i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo\n" .
        "left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso\n" .
        "left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id\n" .
        "left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio \n" .
        "where  isnull(descartar_manual,0)=0 and tipo='PC'\n" .
        "	AND pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "	AND u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        ") a \n" .
        "where tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "\n" .
        ") datoscapc ON datossat.id_ppmc=datoscapc.id_ppmc and datossat.id_estimacion=datoscapc.id_estimacion\n" .
        "AND  (datossat.cump_req_func!=datoscapc.cump_req_func\n" .
        "OR datossat.retraso_entregables!=datoscapc.retraso_entregables\n" .
        "OR datossat.calidad_prod_term!=datoscapc.calidad_prod_term\n" .
        "OR datossat.calidad_codigo!=datoscapc.calidad_codigo\n" .
        "OR datossat.defectos_fugados_amb_prod!=datoscapc.defectos_fugados_amb_prod\n" .
        "--OR datossat.tipo!=datoscapc.tipo\n" .
        "--OR datossat.serv_contractual!=datoscapc.serv_contractual\n" .
        ")\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "select *,'REG. CDS QUE NO CARGO CAPC' estado_comparativo  from  (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,\n" .
        "case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,\n" .
        "case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,\n" .
        "case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,\n" .
        "case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,\n" .
        "case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,\n" .
        "a.tipo,a.serv_contractual,a.fecha_caes, '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' tipo_nivel_servicio\n" .
        "FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a\n" .
        "        WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND a.estatus='F'\n" .
        "        and  a.num_carga=(\n" .
        "        SELECT max(b.num_carga)\n" .
        "        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b\n" .
        "        WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND b.estatus='F'\n" .
        "        )\n" .
        "        \n" .
        ") uno\n" .
        "WHERE NOT EXISTS (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from \n" .
        "(\n" .
        "select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, \n" .
        "	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,\n" .
        "	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , \n" .
        "	c.CUMPL_REQ_FUNC cump_req_func, \n" .
        "	C.CALIDAD_PROD_TERM calidad_prod_term ,\n" .
        "	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,\n" .
        "	c.CAL_COD calidad_codigo,\n" .
        "	i.FechaFirmaCAES fecha_caes,    \n" .
        "	sc.descripcion serv_contractual,\n" .
        "    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio\n" .
        "from mc_universo_cds u inner join \n" .
        "	(\n" .
        "SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA\n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO \n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id\n" .
        "left join mc_info_rs_cr_re_rc i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo\n" .
        "left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso\n" .
        "left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id\n" .
        "left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio \n" .
        "where  isnull(descartar_manual,0)=0 and tipo='PC'\n" .
        "	AND pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "	AND u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        ") a \n" .
        "where tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "AND a.id_ppmc=uno.id_ppmc and a.id_estimacion=uno.id_estimacion\n" .
        ")\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "select *,'REG. CAPC QUE NO CARGO CDS' estado_comparativo from  (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from \n" .
        "(\n" .
        "select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, \n" .
        "	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,\n" .
        "	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , \n" .
        "	c.CUMPL_REQ_FUNC cump_req_func, \n" .
        "	C.CALIDAD_PROD_TERM calidad_prod_term ,\n" .
        "	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,\n" .
        "	c.CAL_COD calidad_codigo,\n" .
        "	i.FechaFirmaCAES fecha_caes,    \n" .
        "	sc.descripcion serv_contractual,\n" .
        "    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio\n" .
        "from mc_universo_cds u inner join \n" .
        "	(\n" .
        "SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA\n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO \n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id\n" .
        "left join mc_info_rs_cr_re_rc i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo\n" .
        "left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso\n" .
        "left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id\n" .
        "left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio \n" .
        "\n" .
        "where  isnull(descartar_manual,0)=0 and tipo='PC'\n" .
        "    AND pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "	AND u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        ") a \n" .
        "where tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        ") uno\n" .
        "WHERE NOT EXISTS (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,\n" .
        "case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,\n" .
        "case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,\n" .
        "case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,\n" .
        "case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,\n" .
        "case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,\n" .
        "a.tipo,a.serv_contractual,a.fecha_caes, 'SLA' tipo_nivel_servicio\n" .
        "FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a\n" .
        "        WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND a.estatus='F'\n" .
        "        and  a.num_carga=(\n" .
        "        SELECT max(b.num_carga)\n" .
        "        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b\n" .
        "        WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND b.estatus='F'\n" .
        "		AND a.id_ppmc=uno.id_ppmc and a.id_estimacion=uno.id_estimacion        \n" .
        "        )\n" .
        "\n" .
        ")\n" .
        ") as total) cnt";
        $this->SQL = "select * from (\n" .
        "\n" .
        "SELECT datoscapc.*,'REGISTRO CAPC' estado_comparativo from (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from \n" .
        "(\n" .
        "select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, \n" .
        "	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,\n" .
        "	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , \n" .
        "	c.CUMPL_REQ_FUNC cump_req_func, \n" .
        "	C.CALIDAD_PROD_TERM calidad_prod_term ,\n" .
        "	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,\n" .
        "	c.CAL_COD calidad_codigo,\n" .
        "	i.FechaFirmaCAES fecha_caes,    \n" .
        "	sc.descripcion serv_contractual,\n" .
        "    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio\n" .
        "from mc_universo_cds u inner join \n" .
        "	(\n" .
        "SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA\n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO \n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id\n" .
        "left join mc_info_rs_cr_re_rc i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo\n" .
        "left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso\n" .
        "left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id\n" .
        "left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio \n" .
        "where  isnull(descartar_manual,0)=0 and tipo='PC'\n" .
        "	AND pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "	AND u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        ") a \n" .
        "where tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "	\n" .
        ") datoscapc\n" .
        "INNER JOIN (\n" .
        "\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,\n" .
        "case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,\n" .
        "case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,\n" .
        "case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,\n" .
        "case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,\n" .
        "case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,\n" .
        "a.tipo,a.serv_contractual,a.fecha_caes, 'SLA' tipo_nivel_servicio\n" .
        "FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a\n" .
        "        WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND a.estatus='F'\n" .
        "        and  a.num_carga=(\n" .
        "        SELECT max(b.num_carga)\n" .
        "        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b\n" .
        "        WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND b.estatus='F'\n" .
        "        )\n" .
        "\n" .
        ") datossat ON datossat.id_ppmc=datoscapc.id_ppmc and datossat.id_estimacion=datoscapc.id_estimacion\n" .
        "AND  (datossat.cump_req_func!=datoscapc.cump_req_func\n" .
        "OR datossat.retraso_entregables!=datoscapc.retraso_entregables\n" .
        "OR datossat.calidad_prod_term!=datoscapc.calidad_prod_term\n" .
        "OR datossat.calidad_codigo!=datoscapc.calidad_codigo\n" .
        "OR datossat.defectos_fugados_amb_prod!=datoscapc.defectos_fugados_amb_prod\n" .
        "--OR datossat.tipo!=datoscapc.tipo\n" .
        "--OR datossat.serv_contractual!=datoscapc.serv_contractual\n" .
        ")\n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT datossat.*,'REGISTRO CDS' estado_comparativo from (\n" .
        "\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,\n" .
        "case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,\n" .
        "case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,\n" .
        "case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,\n" .
        "case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,\n" .
        "case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,\n" .
        "a.tipo,a.serv_contractual,a.fecha_caes, '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' tipo_nivel_servicio\n" .
        "FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a\n" .
        "        WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND a.estatus='F'\n" .
        "        and  a.num_carga=(\n" .
        "        SELECT max(b.num_carga)\n" .
        "        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b\n" .
        "        WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND b.estatus='F'\n" .
        "        )\n" .
        ") datossat\n" .
        "INNER JOIN (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from \n" .
        "(\n" .
        "select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, \n" .
        "	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,\n" .
        "	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , \n" .
        "	c.CUMPL_REQ_FUNC cump_req_func, \n" .
        "	C.CALIDAD_PROD_TERM calidad_prod_term ,\n" .
        "	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,\n" .
        "	c.CAL_COD calidad_codigo,\n" .
        "	i.FechaFirmaCAES fecha_caes,    \n" .
        "	sc.descripcion serv_contractual,\n" .
        "    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio\n" .
        "from mc_universo_cds u inner join \n" .
        "	(\n" .
        "SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA\n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO \n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id\n" .
        "left join mc_info_rs_cr_re_rc i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo\n" .
        "left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso\n" .
        "left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id\n" .
        "left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio \n" .
        "where  isnull(descartar_manual,0)=0 and tipo='PC'\n" .
        "	AND pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "	AND u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        ") a \n" .
        "where tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "\n" .
        ") datoscapc ON datossat.id_ppmc=datoscapc.id_ppmc and datossat.id_estimacion=datoscapc.id_estimacion\n" .
        "AND  (datossat.cump_req_func!=datoscapc.cump_req_func\n" .
        "OR datossat.retraso_entregables!=datoscapc.retraso_entregables\n" .
        "OR datossat.calidad_prod_term!=datoscapc.calidad_prod_term\n" .
        "OR datossat.calidad_codigo!=datoscapc.calidad_codigo\n" .
        "OR datossat.defectos_fugados_amb_prod!=datoscapc.defectos_fugados_amb_prod\n" .
        "--OR datossat.tipo!=datoscapc.tipo\n" .
        "--OR datossat.serv_contractual!=datoscapc.serv_contractual\n" .
        ")\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "select *,'REG. CDS QUE NO CARGO CAPC' estado_comparativo  from  (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,\n" .
        "case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,\n" .
        "case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,\n" .
        "case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,\n" .
        "case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,\n" .
        "case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,\n" .
        "a.tipo,a.serv_contractual,a.fecha_caes, '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' tipo_nivel_servicio\n" .
        "FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a\n" .
        "        WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND a.estatus='F'\n" .
        "        and  a.num_carga=(\n" .
        "        SELECT max(b.num_carga)\n" .
        "        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b\n" .
        "        WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND b.estatus='F'\n" .
        "        )\n" .
        "        \n" .
        ") uno\n" .
        "WHERE NOT EXISTS (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from \n" .
        "(\n" .
        "select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, \n" .
        "	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,\n" .
        "	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , \n" .
        "	c.CUMPL_REQ_FUNC cump_req_func, \n" .
        "	C.CALIDAD_PROD_TERM calidad_prod_term ,\n" .
        "	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,\n" .
        "	c.CAL_COD calidad_codigo,\n" .
        "	i.FechaFirmaCAES fecha_caes,    \n" .
        "	sc.descripcion serv_contractual,\n" .
        "    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio\n" .
        "from mc_universo_cds u inner join \n" .
        "	(\n" .
        "SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA\n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO \n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id\n" .
        "left join mc_info_rs_cr_re_rc i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo\n" .
        "left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso\n" .
        "left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id\n" .
        "left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio \n" .
        "where  isnull(descartar_manual,0)=0 and tipo='PC'\n" .
        "	AND pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "	AND u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        ") a \n" .
        "where tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "AND a.id_ppmc=uno.id_ppmc and a.id_estimacion=uno.id_estimacion\n" .
        ")\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "select *,'REG. CAPC QUE NO CARGO CDS' estado_comparativo from  (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,a.cump_req_func,a.retraso_entregables,a.calidad_prod_term,a.calidad_codigo,a.defectos_fugados_amb_prod,a.tipo,a.serv_contractual,a.fecha_caes, a.tipo_nivel_servicio from \n" .
        "(\n" .
        "select cast(DatosPPMC.ID_PPMC as integer) id_ppmc, DatosPPMC.NAME descripcion, \n" .
        "	ISNULL(sn.nombre , DatosPPMC.SERVICIO_NEGOCIO) servicio_negocio, \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) tipo,\n" .
        "	ISNULL(u.IdEstimacion,c.IdEstimacion) id_estimacion,c.RETR_ENTREGABLE retraso_entregables , \n" .
        "	c.CUMPL_REQ_FUNC cump_req_func, \n" .
        "	C.CALIDAD_PROD_TERM calidad_prod_term ,\n" .
        "	c.DEF_FUG_AMB_PROD defectos_fugados_amb_prod,\n" .
        "	c.CAL_COD calidad_codigo,\n" .
        "	i.FechaFirmaCAES fecha_caes,    \n" .
        "	sc.descripcion serv_contractual,\n" .
        "    case when u.SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio\n" .
        "from mc_universo_cds u inner join \n" .
        "	(\n" .
        "SELECT DISTINCT  REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT  ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "	and PPMC_Proyectos_AS.FECHA_CARGA=C.FECHA_CARGA\n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) and isnull(DatosPPMC.SLO,0) = u.SLO \n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and u.id_proveedor = c.id_proveedor and c.iduniverso = u.id\n" .
        "left join mc_info_rs_cr_re_rc i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = c.Id_TIpo\n" .
        "left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "left join mc_info_rs_CC cal on cal.idUniverso = c.Iduniverso\n" .
        "left join mc_c_ServContractual sc on i.id_servicio_cont=sc.id\n" .
        "left join periodos_carga pc on pc.mes=u.mes and pc.anio=u.anio \n" .
        "\n" .
        "where  isnull(descartar_manual,0)=0 and tipo='PC'\n" .
        "    AND pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "	AND u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . " \n" .
        ") a \n" .
        "where tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        ") uno\n" .
        "WHERE NOT EXISTS (\n" .
        "select a.servicio_negocio,a.id_ppmc,a.id_estimacion,a.descripcion,\n" .
        "case when isnumeric(a.cump_req_func)=1 Then a.cump_req_func else NULL end cump_req_func,\n" .
        "case when isnumeric(a.retraso_entregables)=1 Then a.retraso_entregables else NULL end retraso_entregables,\n" .
        "case when isnumeric(a.calidad_prod_term)=1 Then a.calidad_prod_term else NULL end calidad_prod_term,\n" .
        "case when isnumeric(a.calidad_codigo)=1 Then a.calidad_codigo else NULL end calidad_codigo,\n" .
        "case when isnumeric(a.defectos_fugados_amb_prod)=1 Then a.defectos_fugados_amb_prod else NULL end defectos_fugados_amb_prod,\n" .
        "a.tipo,a.serv_contractual,a.fecha_caes, 'SLA' tipo_nivel_servicio\n" .
        "FROM archivosxls.dbo.l_detalle_medicion_cierre_sat a\n" .
        "        WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND a.estatus='F'\n" .
        "        and  a.num_carga=(\n" .
        "        SELECT max(b.num_carga)\n" .
        "        FROM archivosxls.dbo.l_detalle_medicion_cierre_sat b\n" .
        "        WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "\n" .
        "        AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "        AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "        AND b.estatus='F'\n" .
        "		AND a.id_ppmc=uno.id_ppmc and a.id_estimacion=uno.id_estimacion        \n" .
        "        )\n" .
        "\n" .
        ")\n" .
        ") as total {SQL_OrderBy}";
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

//SetValues Method @135-24149D30
    function SetValues()
    {
        $this->estado_comparativo->SetDBValue($this->f("estado_comparativo"));
        $this->id_ppmc->SetDBValue(trim($this->f("id_ppmc")));
        $this->id_estimacion->SetDBValue(trim($this->f("id_estimacion")));
        $this->servicio_negocio->SetDBValue($this->f("servicio_negocio"));
        $this->descripcion->SetDBValue($this->f("descripcion"));
        $this->cump_req_func->SetDBValue(trim($this->f("cump_req_func")));
        $this->retraso_entregables->SetDBValue(trim($this->f("retraso_entregables")));
        $this->calidad_prod_term->SetDBValue(trim($this->f("calidad_prod_term")));
        $this->calidad_codigo->SetDBValue(trim($this->f("calidad_codigo")));
        $this->defectos_fugados_amb_prod->SetDBValue(trim($this->f("defectos_fugados_amb_prod")));
        $this->tipo->SetDBValue($this->f("tipo"));
        $this->serv_contractual->SetDBValue($this->f("serv_contractual"));
        $this->fecha_caes->SetDBValue(trim($this->f("fecha_caes")));
        $this->tipo_nivel_servicio->SetDBValue($this->f("tipo_nivel_servicio"));
    }
//End SetValues Method

} //End Grid1DataSource Class @135-FCB6E20C



//Initialize Page @1-EC644339
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
$TemplateFileName = "comparativo_rc.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-3E69EE1A
include_once("./comparativo_rc_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-086150D7
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$periodos_carga = new clsRecordperiodos_carga("", $MainPage);
$Grid1 = new clsGridGrid1("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->periodos_carga = & $periodos_carga;
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

//Execute Components @1-4D47654B
$periodos_carga->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-9C422E74
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($periodos_carga);
    unset($Grid1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-8F708821
$Header->Show();
$periodos_carga->Show();
$Grid1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-7F6D7696
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($periodos_carga);
unset($Grid1);
unset($Tpl);
//End Unload Page


?>
