<?php
//Include Common Files @1-1001A994
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "comparativo_inc.php");
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

//Variables @135-E9913200

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
    public $Sorter_estado_comparativo;
    public $Sorter_id_incidencia;
    public $Sorter_servicio_de_negocio;
    public $Sorter_severidad;
    public $Sorter_nombre_del_producto;
    public $Sorter_Cumple_Inc_TiempoAsignacion;
    public $Sorter_Cumple_Inc_TiempoSolucion;
//End Variables

//Class_Initialize Event @135-B7531D55
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
        $this->SorterName = CCGetParam("Grid1Order", "");
        $this->SorterDirection = CCGetParam("Grid1Dir", "");

        $this->estado_comparativo = new clsControl(ccsLabel, "estado_comparativo", "estado_comparativo", ccsText, "", CCGetRequestParam("estado_comparativo", ccsGet, NULL), $this);
        $this->id_incidencia = new clsControl(ccsLabel, "id_incidencia", "id_incidencia", ccsText, "", CCGetRequestParam("id_incidencia", ccsGet, NULL), $this);
        $this->servicio_de_negocio = new clsControl(ccsLabel, "servicio_de_negocio", "servicio_de_negocio", ccsText, "", CCGetRequestParam("servicio_de_negocio", ccsGet, NULL), $this);
        $this->severidad = new clsControl(ccsLabel, "severidad", "severidad", ccsInteger, "", CCGetRequestParam("severidad", ccsGet, NULL), $this);
        $this->nombre_del_producto = new clsControl(ccsLabel, "nombre_del_producto", "nombre_del_producto", ccsText, "", CCGetRequestParam("nombre_del_producto", ccsGet, NULL), $this);
        $this->Cumple_Inc_TiempoAsignacion = new clsControl(ccsLabel, "Cumple_Inc_TiempoAsignacion", "Cumple_Inc_TiempoAsignacion", ccsInteger, "", CCGetRequestParam("Cumple_Inc_TiempoAsignacion", ccsGet, NULL), $this);
        $this->Cumple_Inc_TiempoSolucion = new clsControl(ccsLabel, "Cumple_Inc_TiempoSolucion", "Cumple_Inc_TiempoSolucion", ccsInteger, "", CCGetRequestParam("Cumple_Inc_TiempoSolucion", ccsGet, NULL), $this);
        $this->ImgCumple_Inc_TiempoSolucion = new clsControl(ccsImage, "ImgCumple_Inc_TiempoSolucion", "ImgCumple_Inc_TiempoSolucion", ccsText, "", CCGetRequestParam("ImgCumple_Inc_TiempoSolucion", ccsGet, NULL), $this);
        $this->ImgCumple_Inc_TiempoAsignacion = new clsControl(ccsImage, "ImgCumple_Inc_TiempoAsignacion", "ImgCumple_Inc_TiempoAsignacion", ccsText, "", CCGetRequestParam("ImgCumple_Inc_TiempoAsignacion", ccsGet, NULL), $this);
        $this->Sorter_estado_comparativo = new clsSorter($this->ComponentName, "Sorter_estado_comparativo", $FileName, $this);
        $this->Sorter_id_incidencia = new clsSorter($this->ComponentName, "Sorter_id_incidencia", $FileName, $this);
        $this->Sorter_servicio_de_negocio = new clsSorter($this->ComponentName, "Sorter_servicio_de_negocio", $FileName, $this);
        $this->Sorter_severidad = new clsSorter($this->ComponentName, "Sorter_severidad", $FileName, $this);
        $this->Sorter_nombre_del_producto = new clsSorter($this->ComponentName, "Sorter_nombre_del_producto", $FileName, $this);
        $this->Sorter_Cumple_Inc_TiempoAsignacion = new clsSorter($this->ComponentName, "Sorter_Cumple_Inc_TiempoAsignacion", $FileName, $this);
        $this->Sorter_Cumple_Inc_TiempoSolucion = new clsSorter($this->ComponentName, "Sorter_Cumple_Inc_TiempoSolucion", $FileName, $this);
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

//Show Method @135-E5CA3ABC
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
            $this->ControlsVisible["estado_comparativo"] = $this->estado_comparativo->Visible;
            $this->ControlsVisible["id_incidencia"] = $this->id_incidencia->Visible;
            $this->ControlsVisible["servicio_de_negocio"] = $this->servicio_de_negocio->Visible;
            $this->ControlsVisible["severidad"] = $this->severidad->Visible;
            $this->ControlsVisible["nombre_del_producto"] = $this->nombre_del_producto->Visible;
            $this->ControlsVisible["Cumple_Inc_TiempoAsignacion"] = $this->Cumple_Inc_TiempoAsignacion->Visible;
            $this->ControlsVisible["Cumple_Inc_TiempoSolucion"] = $this->Cumple_Inc_TiempoSolucion->Visible;
            $this->ControlsVisible["ImgCumple_Inc_TiempoSolucion"] = $this->ImgCumple_Inc_TiempoSolucion->Visible;
            $this->ControlsVisible["ImgCumple_Inc_TiempoAsignacion"] = $this->ImgCumple_Inc_TiempoAsignacion->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->estado_comparativo->SetValue($this->DataSource->estado_comparativo->GetValue());
                $this->id_incidencia->SetValue($this->DataSource->id_incidencia->GetValue());
                $this->servicio_de_negocio->SetValue($this->DataSource->servicio_de_negocio->GetValue());
                $this->severidad->SetValue($this->DataSource->severidad->GetValue());
                $this->nombre_del_producto->SetValue($this->DataSource->nombre_del_producto->GetValue());
                $this->Cumple_Inc_TiempoAsignacion->SetValue($this->DataSource->Cumple_Inc_TiempoAsignacion->GetValue());
                $this->Cumple_Inc_TiempoSolucion->SetValue($this->DataSource->Cumple_Inc_TiempoSolucion->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->estado_comparativo->Show();
                $this->id_incidencia->Show();
                $this->servicio_de_negocio->Show();
                $this->severidad->Show();
                $this->nombre_del_producto->Show();
                $this->Cumple_Inc_TiempoAsignacion->Show();
                $this->Cumple_Inc_TiempoSolucion->Show();
                $this->ImgCumple_Inc_TiempoSolucion->Show();
                $this->ImgCumple_Inc_TiempoAsignacion->Show();
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
        $this->Sorter_estado_comparativo->Show();
        $this->Sorter_id_incidencia->Show();
        $this->Sorter_servicio_de_negocio->Show();
        $this->Sorter_severidad->Show();
        $this->Sorter_nombre_del_producto->Show();
        $this->Sorter_Cumple_Inc_TiempoAsignacion->Show();
        $this->Sorter_Cumple_Inc_TiempoSolucion->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @135-459FDEFC
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->estado_comparativo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_incidencia->Errors->ToString());
        $errors = ComposeStrings($errors, $this->servicio_de_negocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->severidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->nombre_del_producto->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumple_Inc_TiempoAsignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumple_Inc_TiempoSolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgCumple_Inc_TiempoSolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgCumple_Inc_TiempoAsignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @135-FCB6E20C

class clsGrid1DataSource extends clsDBcnDisenio {  //Grid1DataSource Class @135-9B337F8E

//DataSource Variables @135-D080920D
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $estado_comparativo;
    public $id_incidencia;
    public $servicio_de_negocio;
    public $severidad;
    public $nombre_del_producto;
    public $Cumple_Inc_TiempoAsignacion;
    public $Cumple_Inc_TiempoSolucion;
//End DataSource Variables

//DataSourceClass_Initialize Event @135-5F786974
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->estado_comparativo = new clsField("estado_comparativo", ccsText, "");
        
        $this->id_incidencia = new clsField("id_incidencia", ccsText, "");
        
        $this->servicio_de_negocio = new clsField("servicio_de_negocio", ccsText, "");
        
        $this->severidad = new clsField("severidad", ccsInteger, "");
        
        $this->nombre_del_producto = new clsField("nombre_del_producto", ccsText, "");
        
        $this->Cumple_Inc_TiempoAsignacion = new clsField("Cumple_Inc_TiempoAsignacion", ccsInteger, "");
        
        $this->Cumple_Inc_TiempoSolucion = new clsField("Cumple_Inc_TiempoSolucion", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @135-BA87C48D
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "id_incidencia";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_estado_comparativo" => array("estado_comparativo", ""), 
            "Sorter_id_incidencia" => array("id_incidencia", ""), 
            "Sorter_servicio_de_negocio" => array("servicio_de_negocio", ""), 
            "Sorter_severidad" => array("severidad", ""), 
            "Sorter_nombre_del_producto" => array("nombre_del_producto", ""), 
            "Sorter_Cumple_Inc_TiempoAsignacion" => array("Cumple_Inc_TiempoAsignacion", ""), 
            "Sorter_Cumple_Inc_TiempoSolucion" => array("Cumple_Inc_TiempoSolucion", "")));
    }
//End SetOrder Method

//Prepare Method @135-BF43F520
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsText, "", "", $this->Parameters["urls_id_proveedor"], 2, false);
        $this->wp->AddParameter("2", "urls_id_periodo", ccsText, "", "", $this->Parameters["urls_id_periodo"], 31, false);
        $this->wp->AddParameter("3", "urls_opt_slas", ccsText, "", "", $this->Parameters["urls_opt_slas"], 'SLA', false);
    }
//End Prepare Method

//Open Method @135-2334BDB0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select * from (\n" .
        "SELECT datossat.*,'REGISTRO CDS' estado_comparativo from (\n" .
        "SELECT a.id_incidencia, a.servicio_de_negocio , a.severidad, a.Cumple_Inc_TiempoAsignacion, a.Cumple_Inc_TiempoSolucion, a.Obs_Proceso, a.id_periodo,a.id_proveedor  , a.nombre_del_producto\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a\n" .
        "WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND a.estatus='F'\n" .
        "and  a.num_carga=(\n" .
        "SELECT max(b.num_carga)\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b\n" .
        "WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND b.estatus='F'\n" .
        ")\n" .
        ") datossat\n" .
        "INNER JOIN (select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales, mc.MesReporte , mc.AnioReporte , " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " id_periodo,\n" .
        "				mc.id_proveedor,mci.Aplicacion nombre_del_producto\n" .
        "				from mc_calificacion_incidentes_MC mc\n" .
        "				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio\n" .
        "				LEFT JOIN    mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente\n" .
        "				LEFT JOIN    mc_c_servicio serv ON serv.id_servicio = mc.id_servicio \n" .
        "				where (mc.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . ")  \n" .
        "				and pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " \n" .
        "				and mc.Id_incidente in (select numero from (\n" .
        "														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'\n" .
        "														) as uno\n" .
        "														where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "										) \n" .
        "\n" .
        ") datoscapc ON datossat.id_incidencia=datoscapc.id_incidencia\n" .
        "AND (\n" .
        "--        datossat.servicio_de_negocio!=datoscapc.servicio_de_negocio \n" .
        "--	 OR datossat.nombre_del_producto!=datoscds.nombre_del_producto\n" .
        "--	 OR datossat.severidad!= datoscapc.severidad\n" .
        "--	 OR \n" .
        "	 datossat.Cumple_Inc_TiempoAsignacion!= datoscapc.Cumple_Inc_TiempoAsignacion\n" .
        "	 OR datossat.Cumple_Inc_TiempoSolucion != datoscapc.Cumple_Inc_TiempoSolucion)	 \n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT datoscapc.*,'REGISTRO CAPC' estado_comparativo from (\n" .
        "\n" .
        "select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales, " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " id_periodo,mc.id_proveedor ,mci.Aplicacion nombre_del_producto\n" .
        "				from mc_calificacion_incidentes_MC mc\n" .
        "				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio\n" .
        "				LEFT JOIN mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente\n" .
        "				LEFT JOIN  mc_c_servicio serv ON serv.id_servicio = mc.id_servicio \n" .
        "				where (mc.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . ")  \n" .
        "				and pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " \n" .
        "				and mc.Id_incidente in (select numero from (\n" .
        "														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'\n" .
        "														) as uno\n" .
        "														where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "										) \n" .
        ") datoscapc\n" .
        "INNER JOIN (\n" .
        "SELECT a.* \n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a\n" .
        "WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND a.estatus='F'\n" .
        "and  a.num_carga=(\n" .
        "SELECT max(b.num_carga)\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b\n" .
        "WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND b.estatus='F'\n" .
        ")\n" .
        " )\n" .
        "datossat ON datossat.id_incidencia=datoscapc.id_incidencia\n" .
        "AND (\n" .
        "--datossat.servicio_de_negocio!=datoscapc.servicio_de_negocio \n" .
        "--	 OR datossat.nombre_del_producto!=datoscds.nombre_del_producto\n" .
        "--	 OR datossat.severidad!= datoscapc.severidad\n" .
        "--	 OR \n" .
        "	 datossat.Cumple_Inc_TiempoAsignacion!= datoscapc.Cumple_Inc_TiempoAsignacion\n" .
        "	 OR datossat.Cumple_Inc_TiempoSolucion != datoscapc.Cumple_Inc_TiempoSolucion)	 \n" .
        "\n" .
        "UNION\n" .
        "select *,'REG. CDS QUE NO CARGO CAPC' estado_comparativo  from (\n" .
        "SELECT a.id_incidencia, a.servicio_de_negocio , a.severidad, a.Cumple_Inc_TiempoAsignacion, a.Cumple_Inc_TiempoSolucion, a.Obs_Proceso, a.id_periodo,a.id_proveedor , a.nombre_del_producto \n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a\n" .
        "WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND a.tipo_nivel_servicio = ' " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND a.estatus='F'\n" .
        "and  a.num_carga=(\n" .
        "SELECT max(b.num_carga)\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b\n" .
        "WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND b.estatus='F')\n" .
        ") uno\n" .
        " WHERE NOT EXISTS (\n" .
        "select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales, mc.MesReporte , mc.AnioReporte , " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " id_periodo,\n" .
        "				mc.id_proveedor, mci.Aplicacion nombre_del_producto\n" .
        "				from mc_calificacion_incidentes_MC mc\n" .
        "				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio\n" .
        "				LEFT JOIN mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente\n" .
        "				LEFT JOIN  mc_c_servicio serv ON serv.id_servicio = mc.id_servicio \n" .
        "				where (mc.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . ")  \n" .
        "				and pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " \n" .
        "				and mc.Id_incidente in (select numero from (\n" .
        "														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'\n" .
        "														) as uno\n" .
        "														where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "										) \n" .
        "				AND mc.id_incidente=uno.id_incidencia \n" .
        "\n" .
        ")\n" .
        "UNION\n" .
        "select *,'REG. CAPC QUE NO CARGO CDS' estado_comparativo  from (\n" .
        "select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales,  " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " id_periodo,\n" .
        "				mc.id_proveedor, mci.Aplicacion nombre_del_producto\n" .
        "				from mc_calificacion_incidentes_MC mc\n" .
        "				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio\n" .
        "				LEFT JOIN mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente\n" .
        "				LEFT JOIN  mc_c_servicio serv ON serv.id_servicio = mc.id_servicio \n" .
        "				where (mc.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . ")  \n" .
        "				and pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " \n" .
        "				and mc.Id_incidente in (select numero from (\n" .
        "														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'\n" .
        "														) as uno\n" .
        "														where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "										) \n" .
        "\n" .
        ") uno\n" .
        " WHERE NOT EXISTS (\n" .
        "SELECT a.id_incidencia, a.servicio_de_negocio , a.severidad, a.Cumple_Inc_TiempoAsignacion, a.Cumple_Inc_TiempoSolucion, a.Obs_Proceso, a.id_periodo,a.id_proveedor , a.nombre_del_producto\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a\n" .
        "WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND a.estatus='F'\n" .
        "and  a.num_carga=(\n" .
        "SELECT max(b.num_carga)\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b\n" .
        "WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND b.estatus='F')\n" .
        "AND a.id_incidencia=uno.id_incidencia\n" .
        ")\n" .
        " \n" .
        ") as total) cnt";
        $this->SQL = "select * from (\n" .
        "SELECT datossat.*,'REGISTRO CDS' estado_comparativo from (\n" .
        "SELECT a.id_incidencia, a.servicio_de_negocio , a.severidad, a.Cumple_Inc_TiempoAsignacion, a.Cumple_Inc_TiempoSolucion, a.Obs_Proceso, a.id_periodo,a.id_proveedor  , a.nombre_del_producto\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a\n" .
        "WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND a.estatus='F'\n" .
        "and  a.num_carga=(\n" .
        "SELECT max(b.num_carga)\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b\n" .
        "WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND b.estatus='F'\n" .
        ")\n" .
        ") datossat\n" .
        "INNER JOIN (select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales, mc.MesReporte , mc.AnioReporte , " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " id_periodo,\n" .
        "				mc.id_proveedor,mci.Aplicacion nombre_del_producto\n" .
        "				from mc_calificacion_incidentes_MC mc\n" .
        "				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio\n" .
        "				LEFT JOIN    mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente\n" .
        "				LEFT JOIN    mc_c_servicio serv ON serv.id_servicio = mc.id_servicio \n" .
        "				where (mc.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . ")  \n" .
        "				and pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " \n" .
        "				and mc.Id_incidente in (select numero from (\n" .
        "														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'\n" .
        "														) as uno\n" .
        "														where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "										) \n" .
        "\n" .
        ") datoscapc ON datossat.id_incidencia=datoscapc.id_incidencia\n" .
        "AND (\n" .
        "--        datossat.servicio_de_negocio!=datoscapc.servicio_de_negocio \n" .
        "--	 OR datossat.nombre_del_producto!=datoscds.nombre_del_producto\n" .
        "--	 OR datossat.severidad!= datoscapc.severidad\n" .
        "--	 OR \n" .
        "	 datossat.Cumple_Inc_TiempoAsignacion!= datoscapc.Cumple_Inc_TiempoAsignacion\n" .
        "	 OR datossat.Cumple_Inc_TiempoSolucion != datoscapc.Cumple_Inc_TiempoSolucion)	 \n" .
        "\n" .
        "\n" .
        "UNION\n" .
        "\n" .
        "SELECT datoscapc.*,'REGISTRO CAPC' estado_comparativo from (\n" .
        "\n" .
        "select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales, " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " id_periodo,mc.id_proveedor ,mci.Aplicacion nombre_del_producto\n" .
        "				from mc_calificacion_incidentes_MC mc\n" .
        "				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio\n" .
        "				LEFT JOIN mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente\n" .
        "				LEFT JOIN  mc_c_servicio serv ON serv.id_servicio = mc.id_servicio \n" .
        "				where (mc.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . ")  \n" .
        "				and pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " \n" .
        "				and mc.Id_incidente in (select numero from (\n" .
        "														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'\n" .
        "														) as uno\n" .
        "														where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "										) \n" .
        ") datoscapc\n" .
        "INNER JOIN (\n" .
        "SELECT a.* \n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a\n" .
        "WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND a.estatus='F'\n" .
        "and  a.num_carga=(\n" .
        "SELECT max(b.num_carga)\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b\n" .
        "WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND b.estatus='F'\n" .
        ")\n" .
        " )\n" .
        "datossat ON datossat.id_incidencia=datoscapc.id_incidencia\n" .
        "AND (\n" .
        "--datossat.servicio_de_negocio!=datoscapc.servicio_de_negocio \n" .
        "--	 OR datossat.nombre_del_producto!=datoscds.nombre_del_producto\n" .
        "--	 OR datossat.severidad!= datoscapc.severidad\n" .
        "--	 OR \n" .
        "	 datossat.Cumple_Inc_TiempoAsignacion!= datoscapc.Cumple_Inc_TiempoAsignacion\n" .
        "	 OR datossat.Cumple_Inc_TiempoSolucion != datoscapc.Cumple_Inc_TiempoSolucion)	 \n" .
        "\n" .
        "UNION\n" .
        "select *,'REG. CDS QUE NO CARGO CAPC' estado_comparativo  from (\n" .
        "SELECT a.id_incidencia, a.servicio_de_negocio , a.severidad, a.Cumple_Inc_TiempoAsignacion, a.Cumple_Inc_TiempoSolucion, a.Obs_Proceso, a.id_periodo,a.id_proveedor , a.nombre_del_producto \n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a\n" .
        "WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND a.tipo_nivel_servicio = ' " . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND a.estatus='F'\n" .
        "and  a.num_carga=(\n" .
        "SELECT max(b.num_carga)\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b\n" .
        "WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND b.estatus='F')\n" .
        ") uno\n" .
        " WHERE NOT EXISTS (\n" .
        "select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales, mc.MesReporte , mc.AnioReporte , " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " id_periodo,\n" .
        "				mc.id_proveedor, mci.Aplicacion nombre_del_producto\n" .
        "				from mc_calificacion_incidentes_MC mc\n" .
        "				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio\n" .
        "				LEFT JOIN mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente\n" .
        "				LEFT JOIN  mc_c_servicio serv ON serv.id_servicio = mc.id_servicio \n" .
        "				where (mc.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . ")  \n" .
        "				and pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " \n" .
        "				and mc.Id_incidente in (select numero from (\n" .
        "														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'\n" .
        "														) as uno\n" .
        "														where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "										) \n" .
        "				AND mc.id_incidente=uno.id_incidencia \n" .
        "\n" .
        ")\n" .
        "UNION\n" .
        "select *,'REG. CAPC QUE NO CARGO CDS' estado_comparativo  from (\n" .
        "select mc.id_incidente id_incidencia, serv.nombre servicio_de_negocio , mc.severidad, mc.Cumple_Inc_TiempoAsignacion, mc.Cumple_Inc_TiempoSolucion, mc.Obs_Manuales,  " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " id_periodo,\n" .
        "				mc.id_proveedor, mci.Aplicacion nombre_del_producto\n" .
        "				from mc_calificacion_incidentes_MC mc\n" .
        "				LEFT JOIN    periodos_carga pc ON mc.MesReporte = pc.mes AND mc.AnioReporte = pc.anio\n" .
        "				LEFT JOIN mc_info_incidentes mci ON month(mci.fechaCarga)=pc.mes and year(mci.fechaCarga)=pc.anio and mci.Id_incidente=mc.id_incidente\n" .
        "				LEFT JOIN  mc_c_servicio serv ON serv.id_servicio = mc.id_servicio \n" .
        "				where (mc.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . ")  \n" .
        "				and pc.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " \n" .
        "				and mc.Id_incidente in (select numero from (\n" .
        "														select numero,case when SLO=1 THEN 'SLO' ELSE 'SLA' END tipo_nivel_servicio from mc_universo_cds where tipo = 'IN'\n" .
        "														) as uno\n" .
        "														where uno.tipo_nivel_servicio='" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "'\n" .
        "										) \n" .
        "\n" .
        ") uno\n" .
        " WHERE NOT EXISTS (\n" .
        "SELECT a.id_incidencia, a.servicio_de_negocio , a.severidad, a.Cumple_Inc_TiempoAsignacion, a.Cumple_Inc_TiempoSolucion, a.Obs_Proceso, a.id_periodo,a.id_proveedor , a.nombre_del_producto\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT a\n" .
        "WHERE a.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND a.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND a.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND a.estatus='F'\n" .
        "and  a.num_carga=(\n" .
        "SELECT max(b.num_carga)\n" .
        "FROM archivosxls.dbo.l_calificacion_incidentes_AUT_SAT b\n" .
        "WHERE b.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "AND b.id_periodo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "\n" .
        "AND b.tipo_nivel_servicio = '" . $this->SQLValue($this->wp->GetDBValue("3"), ccsText) . "' \n" .
        "AND b.estatus='F')\n" .
        "AND a.id_incidencia=uno.id_incidencia\n" .
        ")\n" .
        " \n" .
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

//SetValues Method @135-4679324C
    function SetValues()
    {
        $this->estado_comparativo->SetDBValue($this->f("estado_comparativo"));
        $this->id_incidencia->SetDBValue($this->f("id_incidencia"));
        $this->servicio_de_negocio->SetDBValue($this->f("servicio_de_negocio"));
        $this->severidad->SetDBValue(trim($this->f("severidad")));
        $this->nombre_del_producto->SetDBValue($this->f("nombre_del_producto"));
        $this->Cumple_Inc_TiempoAsignacion->SetDBValue(trim($this->f("Cumple_Inc_TiempoAsignacion")));
        $this->Cumple_Inc_TiempoSolucion->SetDBValue(trim($this->f("Cumple_Inc_TiempoSolucion")));
    }
//End SetValues Method

} //End Grid1DataSource Class @135-FCB6E20C



//Initialize Page @1-96C4DDD3
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
$TemplateFileName = "comparativo_inc.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-D789B1FE
include_once("./comparativo_inc_events.php");
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
