<?php
//Include Common Files @1-F49D0B4D
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "CalificaIncidenteSAT.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



//Include Page implementation @27-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_info_incidentes { //mc_info_incidentes Class @20-58F404CC

//Variables @20-9E315808

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

//Class_Initialize Event @20-E2FF683C
    function clsRecordmc_info_incidentes($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_incidentes/Error";
        $this->DataSource = new clsmc_info_incidentesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_incidentes";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Id_incidente = new clsControl(ccsLabel, "Id_incidente", "Id_incidente", ccsText, "", CCGetRequestParam("Id_incidente", $Method, NULL), $this);
            $this->slCDS = new clsControl(ccsLabel, "slCDS", "slCDS", ccsText, "", CCGetRequestParam("slCDS", $Method, NULL), $this);
            $this->shId_Proveedor = new clsControl(ccsHidden, "shId_Proveedor", "shId_Proveedor", ccsText, "", CCGetRequestParam("shId_Proveedor", $Method, NULL), $this);
            $this->ServicioNegocio = new clsControl(ccsLabel, "ServicioNegocio", "ServicioNegocio", ccsText, "", CCGetRequestParam("ServicioNegocio", $Method, NULL), $this);
            $this->Aplicacion = new clsControl(ccsLabel, "Aplicacion", "Aplicacion", ccsText, "", CCGetRequestParam("Aplicacion", $Method, NULL), $this);
            $this->FechaNuevo = new clsControl(ccsLabel, "FechaNuevo", "FechaNuevo", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaNuevo", $Method, NULL), $this);
            $this->FechaAsignado = new clsControl(ccsLabel, "FechaAsignado", "FechaAsignado", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaAsignado", $Method, NULL), $this);
            $this->FechaEnCurso = new clsControl(ccsLabel, "FechaEnCurso", "FechaEnCurso", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaEnCurso", $Method, NULL), $this);
            $this->FechaPendiente = new clsControl(ccsLabel, "FechaPendiente", "FechaPendiente", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaPendiente", $Method, NULL), $this);
            $this->FechaResuelto = new clsControl(ccsLabel, "FechaResuelto", "FechaResuelto", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaResuelto", $Method, NULL), $this);
            $this->FechaCerrado = new clsControl(ccsLabel, "FechaCerrado", "FechaCerrado", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaCerrado", $Method, NULL), $this);
            $this->Dictamen = new clsControl(ccsLabel, "Dictamen", "Dictamen", ccsText, "", CCGetRequestParam("Dictamen", $Method, NULL), $this);
            $this->slHistorial = new clsControl(ccsLabel, "slHistorial", "slHistorial", ccsText, "", CCGetRequestParam("slHistorial", $Method, NULL), $this);
            $this->Image1 = new clsControl(ccsImage, "Image1", "Image1", ccsText, "", CCGetRequestParam("Image1", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @20-3E703885
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId_incidente"] = CCGetFromGet("Id_incidente", NULL);
    }
//End Initialize Method

//Validate Method @20-B53C8B31
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->shId_Proveedor->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->shId_Proveedor->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @20-D7482E28
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Id_incidente->Errors->Count());
        $errors = ($errors || $this->slCDS->Errors->Count());
        $errors = ($errors || $this->shId_Proveedor->Errors->Count());
        $errors = ($errors || $this->ServicioNegocio->Errors->Count());
        $errors = ($errors || $this->Aplicacion->Errors->Count());
        $errors = ($errors || $this->FechaNuevo->Errors->Count());
        $errors = ($errors || $this->FechaAsignado->Errors->Count());
        $errors = ($errors || $this->FechaEnCurso->Errors->Count());
        $errors = ($errors || $this->FechaPendiente->Errors->Count());
        $errors = ($errors || $this->FechaResuelto->Errors->Count());
        $errors = ($errors || $this->FechaCerrado->Errors->Count());
        $errors = ($errors || $this->Dictamen->Errors->Count());
        $errors = ($errors || $this->slHistorial->Errors->Count());
        $errors = ($errors || $this->Image1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @20-17DC9883
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

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @20-45C4A834
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
                $this->Id_incidente->SetValue($this->DataSource->Id_incidente->GetValue());
                $this->slCDS->SetValue($this->DataSource->slCDS->GetValue());
                $this->ServicioNegocio->SetValue($this->DataSource->ServicioNegocio->GetValue());
                $this->Aplicacion->SetValue($this->DataSource->Aplicacion->GetValue());
                $this->FechaNuevo->SetValue($this->DataSource->FechaNuevo->GetValue());
                $this->FechaAsignado->SetValue($this->DataSource->FechaAsignado->GetValue());
                $this->FechaEnCurso->SetValue($this->DataSource->FechaEnCurso->GetValue());
                $this->FechaPendiente->SetValue($this->DataSource->FechaPendiente->GetValue());
                $this->FechaResuelto->SetValue($this->DataSource->FechaResuelto->GetValue());
                $this->FechaCerrado->SetValue($this->DataSource->FechaCerrado->GetValue());
                $this->Dictamen->SetValue($this->DataSource->Dictamen->GetValue());
                $this->slHistorial->SetValue($this->DataSource->slHistorial->GetValue());
                if(!$this->FormSubmitted){
                    $this->shId_Proveedor->SetValue($this->DataSource->shId_Proveedor->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Id_incidente->Errors->ToString());
            $Error = ComposeStrings($Error, $this->slCDS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shId_Proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ServicioNegocio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Aplicacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaNuevo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaAsignado->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaEnCurso->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaPendiente->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaResuelto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaCerrado->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Dictamen->Errors->ToString());
            $Error = ComposeStrings($Error, $this->slHistorial->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Image1->Errors->ToString());
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

        $this->Id_incidente->Show();
        $this->slCDS->Show();
        $this->shId_Proveedor->Show();
        $this->ServicioNegocio->Show();
        $this->Aplicacion->Show();
        $this->FechaNuevo->Show();
        $this->FechaAsignado->Show();
        $this->FechaEnCurso->Show();
        $this->FechaPendiente->Show();
        $this->FechaResuelto->Show();
        $this->FechaCerrado->Show();
        $this->Dictamen->Show();
        $this->slHistorial->Show();
        $this->Image1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_incidentes Class @20-FCB6E20C

class clsmc_info_incidentesDataSource extends clsDBcnDisenio {  //mc_info_incidentesDataSource Class @20-AFE708D3

//DataSource Variables @20-1ABC7D98
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $Id_incidente;
    public $slCDS;
    public $shId_Proveedor;
    public $ServicioNegocio;
    public $Aplicacion;
    public $FechaNuevo;
    public $FechaAsignado;
    public $FechaEnCurso;
    public $FechaPendiente;
    public $FechaResuelto;
    public $FechaCerrado;
    public $Dictamen;
    public $slHistorial;
    public $Image1;
//End DataSource Variables

//DataSourceClass_Initialize Event @20-A6EE43E7
    function clsmc_info_incidentesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_incidentes/Error";
        $this->Initialize();
        $this->Id_incidente = new clsField("Id_incidente", ccsText, "");
        
        $this->slCDS = new clsField("slCDS", ccsText, "");
        
        $this->shId_Proveedor = new clsField("shId_Proveedor", ccsText, "");
        
        $this->ServicioNegocio = new clsField("ServicioNegocio", ccsText, "");
        
        $this->Aplicacion = new clsField("Aplicacion", ccsText, "");
        
        $this->FechaNuevo = new clsField("FechaNuevo", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaAsignado = new clsField("FechaAsignado", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaEnCurso = new clsField("FechaEnCurso", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaPendiente = new clsField("FechaPendiente", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaResuelto = new clsField("FechaResuelto", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaCerrado = new clsField("FechaCerrado", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->Dictamen = new clsField("Dictamen", ccsText, "");
        
        $this->slHistorial = new clsField("slHistorial", ccsText, "");
        
        $this->Image1 = new clsField("Image1", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @20-D5067C86
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId_incidente", ccsText, "", "", $this->Parameters["urlId_incidente"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @20-DC5EC5C2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = " SELECT i.*, p.Nombre ,p.Id_Proveedor\n" .
        " FROM mc_info_incidentes i \n" .
        " 	inner join mc_universo_cds u on i.Id_incidente = u.numero  inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        " 	and month(fechacarga)= u.mes and year(FechaCarga)= u.anio \n" .
        "where u.tipo ='IN'\n" .
        "AND i.Id_incidente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' ";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @20-9CA4DD96
    function SetValues()
    {
        $this->Id_incidente->SetDBValue($this->f("Id_incidente"));
        $this->slCDS->SetDBValue($this->f("Nombre"));
        $this->shId_Proveedor->SetDBValue($this->f("Id_Proveedor"));
        $this->ServicioNegocio->SetDBValue($this->f("ServicioNegocio"));
        $this->Aplicacion->SetDBValue($this->f("Aplicacion"));
        $this->FechaNuevo->SetDBValue(trim($this->f("FechaNuevo")));
        $this->FechaAsignado->SetDBValue(trim($this->f("FechaAsignado")));
        $this->FechaEnCurso->SetDBValue(trim($this->f("FechaEnCurso")));
        $this->FechaPendiente->SetDBValue(trim($this->f("FechaPendiente")));
        $this->FechaResuelto->SetDBValue(trim($this->f("FechaResuelto")));
        $this->FechaCerrado->SetDBValue(trim($this->f("FechaCerrado")));
        $this->Dictamen->SetDBValue($this->f("Dictamen"));
        $this->slHistorial->SetDBValue($this->f("Historial"));
    }
//End SetValues Method

} //End mc_info_incidentesDataSource Class @20-FCB6E20C

class clsRecordmc_info_incidentes1 { //mc_info_incidentes1 Class @38-8DC99A29

//Variables @38-9E315808

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

//Class_Initialize Event @38-6BDF3F1A
    function clsRecordmc_info_incidentes1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_incidentes1/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_incidentes1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->FechaAsignado = new clsControl(ccsLabel, "FechaAsignado", "FechaAsignado", ccsText, "", CCGetRequestParam("FechaAsignado", $Method, NULL), $this);
            $this->FechaEnCurso = new clsControl(ccsLabel, "FechaEnCurso", "FechaEnCurso", ccsText, "", CCGetRequestParam("FechaEnCurso", $Method, NULL), $this);
            $this->HorasInvertidas = new clsControl(ccsLabel, "HorasInvertidas", "HorasInvertidas", ccsText, "", CCGetRequestParam("HorasInvertidas", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @38-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @38-F8DE717F
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FechaAsignado->Errors->Count());
        $errors = ($errors || $this->FechaEnCurso->Errors->Count());
        $errors = ($errors || $this->HorasInvertidas->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @38-82225C24
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
    }
//End Operation Method

//Show Method @38-462C0115
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

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->FechaAsignado->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaEnCurso->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HorasInvertidas->Errors->ToString());
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

        $this->FechaAsignado->Show();
        $this->FechaEnCurso->Show();
        $this->HorasInvertidas->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_info_incidentes1 Class @38-FCB6E20C

class clsRecordmc_c_aplicacion { //mc_c_aplicacion Class @45-D758B9FC

//Variables @45-9E315808

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

//Class_Initialize Event @45-3A3785E7
    function clsRecordmc_c_aplicacion($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_c_aplicacion/Error";
        $this->DataSource = new clsmc_c_aplicacionDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_c_aplicacion";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->descripcion = new clsControl(ccsLabel, "descripcion", "descripcion", ccsText, "", CCGetRequestParam("descripcion", $Method, NULL), $this);
            $this->severidad = new clsControl(ccsLabel, "severidad", "severidad", ccsInteger, "", CCGetRequestParam("severidad", $Method, NULL), $this);
            $this->lblTiempoAtencion = new clsControl(ccsLabel, "lblTiempoAtencion", "lblTiempoAtencion", ccsText, "", CCGetRequestParam("lblTiempoAtencion", $Method, NULL), $this);
            $this->lblTiempoSolucion = new clsControl(ccsLabel, "lblTiempoSolucion", "lblTiempoSolucion", ccsText, "", CCGetRequestParam("lblTiempoSolucion", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @45-3E703885
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId_incidente"] = CCGetFromGet("Id_incidente", NULL);
    }
//End Initialize Method

//Validate Method @45-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @45-555AB3CA
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->descripcion->Errors->Count());
        $errors = ($errors || $this->severidad->Errors->Count());
        $errors = ($errors || $this->lblTiempoAtencion->Errors->Count());
        $errors = ($errors || $this->lblTiempoSolucion->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @45-17DC9883
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

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @45-83BF311C
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
                $this->descripcion->SetValue($this->DataSource->descripcion->GetValue());
                $this->severidad->SetValue($this->DataSource->severidad->GetValue());
                $this->lblTiempoAtencion->SetValue($this->DataSource->lblTiempoAtencion->GetValue());
                $this->lblTiempoSolucion->SetValue($this->DataSource->lblTiempoSolucion->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->descripcion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->severidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lblTiempoAtencion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lblTiempoSolucion->Errors->ToString());
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

        $this->descripcion->Show();
        $this->severidad->Show();
        $this->lblTiempoAtencion->Show();
        $this->lblTiempoSolucion->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_c_aplicacion Class @45-FCB6E20C

class clsmc_c_aplicacionDataSource extends clsDBcnDisenio {  //mc_c_aplicacionDataSource Class @45-556B5F31

//DataSource Variables @45-19864DAF
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $descripcion;
    public $severidad;
    public $lblTiempoAtencion;
    public $lblTiempoSolucion;
//End DataSource Variables

//DataSourceClass_Initialize Event @45-60AC0D33
    function clsmc_c_aplicacionDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_c_aplicacion/Error";
        $this->Initialize();
        $this->descripcion = new clsField("descripcion", ccsText, "");
        
        $this->severidad = new clsField("severidad", ccsInteger, "");
        
        $this->lblTiempoAtencion = new clsField("lblTiempoAtencion", ccsText, "");
        
        $this->lblTiempoSolucion = new clsField("lblTiempoSolucion", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @45-D5067C86
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId_incidente", ccsText, "", "", $this->Parameters["urlId_incidente"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @45-27084D7F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT \n" .
        "(select rtrim(valor) from mc_parametros where parametro= \n" .
        "	case when a.severidad = 0 then 'TASeveridad0Segundos' when a.severidad =1 then 'TASeveridad1Segundos' \n" .
        "		 when a.severidad = 2 then 'TASeveridad2Segundos' when a.severidad =3 then 'TASeveridad3Segundos'	end ) as TiempoAtencion,\n" .
        "(select valor from mc_parametros where parametro= \n" .
        "	case when a.severidad = 0 then 'TSSeveridad0Segundos' when a.severidad =1 then 'TSSeveridad1Segundos' \n" .
        "		 when a.severidad = 2 then 'TSSeveridad2Segundos' when a.severidad =3 then 'TSSeveridad3Segundos'	end ) as TiempoSolucion,\n" .
        "*\n" .
        "FROM mc_c_aplicacion a inner join mc_info_incidentes b \n" .
        "on rtrim(b.Aplicacion)=rtrim(a.Descripcion)\n" .
        "WHERE Id_incidente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' ";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @45-2D6525A2
    function SetValues()
    {
        $this->descripcion->SetDBValue($this->f("descripcion"));
        $this->severidad->SetDBValue(trim($this->f("severidad")));
        $this->lblTiempoAtencion->SetDBValue($this->f("TiempoAtencion"));
        $this->lblTiempoSolucion->SetDBValue($this->f("TiempoSolucion"));
    }
//End SetValues Method

} //End mc_c_aplicacionDataSource Class @45-FCB6E20C

class clsRecordmc_info_incidentes2 { //mc_info_incidentes2 Class @53-A6E4C9EA

//Variables @53-9E315808

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

//Class_Initialize Event @53-0647FA52
    function clsRecordmc_info_incidentes2($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_incidentes2/Error";
        $this->DataSource = new clsmc_info_incidentes2DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_incidentes2";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->FechaEnCurso = new clsControl(ccsLabel, "FechaEnCurso", "FechaEnCurso", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaEnCurso", $Method, NULL), $this);
            $this->lblRegistroAVL = new clsControl(ccsLabel, "lblRegistroAVL", "lblRegistroAVL", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("lblRegistroAVL", $Method, NULL), $this);
            $this->HorasInvertidas = new clsControl(ccsLabel, "HorasInvertidas", "HorasInvertidas", ccsText, "", CCGetRequestParam("HorasInvertidas", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @53-3E703885
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId_incidente"] = CCGetFromGet("Id_incidente", NULL);
    }
//End Initialize Method

//Validate Method @53-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @53-E65A4259
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FechaEnCurso->Errors->Count());
        $errors = ($errors || $this->lblRegistroAVL->Errors->Count());
        $errors = ($errors || $this->HorasInvertidas->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @53-17DC9883
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

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @53-EF3D5678
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
                $this->FechaEnCurso->SetValue($this->DataSource->FechaEnCurso->GetValue());
                $this->lblRegistroAVL->SetValue($this->DataSource->lblRegistroAVL->GetValue());
                $this->HorasInvertidas->SetValue($this->DataSource->HorasInvertidas->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->FechaEnCurso->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lblRegistroAVL->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HorasInvertidas->Errors->ToString());
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

        $this->FechaEnCurso->Show();
        $this->lblRegistroAVL->Show();
        $this->HorasInvertidas->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_incidentes2 Class @53-FCB6E20C

class clsmc_info_incidentes2DataSource extends clsDBcnDisenio {  //mc_info_incidentes2DataSource Class @53-04682C14

//DataSource Variables @53-AEDB5C46
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $FechaEnCurso;
    public $lblRegistroAVL;
    public $HorasInvertidas;
//End DataSource Variables

//DataSourceClass_Initialize Event @53-C2E90DEF
    function clsmc_info_incidentes2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_incidentes2/Error";
        $this->Initialize();
        $this->FechaEnCurso = new clsField("FechaEnCurso", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->lblRegistroAVL = new clsField("lblRegistroAVL", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->HorasInvertidas = new clsField("HorasInvertidas", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @53-D5067C86
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId_incidente", ccsText, "", "", $this->Parameters["urlId_incidente"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @53-831EB7F5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT TOP 1 mi.*,\n" .
        "	(select top 1 FechaInicioMov from mc_detalle_incidente_avl \n" .
        "	        where (Id_Incidente=mi.Id_incidente or Id_Incidente = mi.IncPadre ) \n" .
        "	        order by FechaInicioMov   ) as RegistroAVL ,\n" .
        "dbo.ufDiffFechasMCSec(FechaEnCurso,(select top 1 FechaInicioMov from mc_detalle_incidente_avl \n" .
        "                                           where (Id_Incidente=mi.Id_incidente or Id_Incidente = mi.IncPadre ) \n" .
        "                                          order by FechaInicioMov   ) ) \n" .
        "as HorasInvertidas\n" .
        "FROM mc_info_incidentes mi\n" .
        "	inner join mc_universo_cds u on u.numero = mi.Id_incidente  and MONTH(mi.FechaCarga)= u.mes and u.anio = YEAR(mi.FechaCarga)\n" .
        "WHERE mi.Id_incidente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' ";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @53-1158C8B0
    function SetValues()
    {
        $this->FechaEnCurso->SetDBValue(trim($this->f("FechaEnCurso")));
        $this->lblRegistroAVL->SetDBValue(trim($this->f("RegistroAVL")));
        $this->HorasInvertidas->SetDBValue($this->f("HorasInvertidas"));
    }
//End SetValues Method

} //End mc_info_incidentes2DataSource Class @53-FCB6E20C

class clsGridmc_detalle_incidente_avl { //mc_detalle_incidente_avl class @59-C662A7A0

//Variables @59-78437B9D

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
    public $Sorter_ClaveMovimiento;
    public $Sorter_DescMovimiento;
    public $Sorter_FechaInicioMov;
    public $Sorter_FechaFinMov;
    public $Sorter_Paquete;
//End Variables

//Class_Initialize Event @59-8E84F669
    function clsGridmc_detalle_incidente_avl($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_detalle_incidente_avl";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_detalle_incidente_avl";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_detalle_incidente_avlDataSource($this);
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
        $this->SorterName = CCGetParam("mc_detalle_incidente_avlOrder", "");
        $this->SorterDirection = CCGetParam("mc_detalle_incidente_avlDir", "");

        $this->ClaveMovimiento = new clsControl(ccsLabel, "ClaveMovimiento", "ClaveMovimiento", ccsInteger, "", CCGetRequestParam("ClaveMovimiento", ccsGet, NULL), $this);
        $this->DescMovimiento = new clsControl(ccsLabel, "DescMovimiento", "DescMovimiento", ccsText, "", CCGetRequestParam("DescMovimiento", ccsGet, NULL), $this);
        $this->FechaInicioMov = new clsControl(ccsLabel, "FechaInicioMov", "FechaInicioMov", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaInicioMov", ccsGet, NULL), $this);
        $this->FechaFinMov = new clsControl(ccsLabel, "FechaFinMov", "FechaFinMov", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaFinMov", ccsGet, NULL), $this);
        $this->Horas = new clsControl(ccsLabel, "Horas", "Horas", ccsText, "", CCGetRequestParam("Horas", ccsGet, NULL), $this);
        $this->Panel1 = new clsPanel("Panel1", $this);
        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", CCGetRequestParam("Paquete", ccsGet, NULL), $this);
        $this->Paquete->HTML = true;
        $this->Panel2 = new clsPanel("Panel2", $this);
        $this->sflAVLG = new clsControl(ccsLabel, "sflAVLG", "sflAVLG", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("sflAVLG", ccsGet, NULL), $this);
        $this->sTotalSecPaquete = new clsControl(ccsHidden, "sTotalSecPaquete", "sTotalSecPaquete", ccsText, "", CCGetRequestParam("sTotalSecPaquete", ccsGet, NULL), $this);
        $this->Sorter_ClaveMovimiento = new clsSorter($this->ComponentName, "Sorter_ClaveMovimiento", $FileName, $this);
        $this->Sorter_DescMovimiento = new clsSorter($this->ComponentName, "Sorter_DescMovimiento", $FileName, $this);
        $this->Sorter_FechaInicioMov = new clsSorter($this->ComponentName, "Sorter_FechaInicioMov", $FileName, $this);
        $this->Sorter_FechaFinMov = new clsSorter($this->ComponentName, "Sorter_FechaFinMov", $FileName, $this);
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->TotalHoras = new clsControl(ccsLabel, "TotalHoras", "TotalHoras", ccsText, "", CCGetRequestParam("TotalHoras", ccsGet, NULL), $this);
        $this->Panel1->AddComponent("Paquete", $this->Paquete);
        $this->Panel2->AddComponent("sflAVLG", $this->sflAVLG);
    }
//End Class_Initialize Event

//Initialize Method @59-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @59-3B2FA9BF
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlId_incidente"] = CCGetFromGet("Id_incidente", NULL);

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
            $this->ControlsVisible["ClaveMovimiento"] = $this->ClaveMovimiento->Visible;
            $this->ControlsVisible["DescMovimiento"] = $this->DescMovimiento->Visible;
            $this->ControlsVisible["FechaInicioMov"] = $this->FechaInicioMov->Visible;
            $this->ControlsVisible["FechaFinMov"] = $this->FechaFinMov->Visible;
            $this->ControlsVisible["Horas"] = $this->Horas->Visible;
            $this->ControlsVisible["Panel1"] = $this->Panel1->Visible;
            $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
            $this->ControlsVisible["Panel2"] = $this->Panel2->Visible;
            $this->ControlsVisible["sflAVLG"] = $this->sflAVLG->Visible;
            $this->ControlsVisible["sTotalSecPaquete"] = $this->sTotalSecPaquete->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->ClaveMovimiento->SetValue($this->DataSource->ClaveMovimiento->GetValue());
                $this->DescMovimiento->SetValue($this->DataSource->DescMovimiento->GetValue());
                $this->FechaInicioMov->SetValue($this->DataSource->FechaInicioMov->GetValue());
                $this->FechaFinMov->SetValue($this->DataSource->FechaFinMov->GetValue());
                $this->Horas->SetValue($this->DataSource->Horas->GetValue());
                $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                $this->sflAVLG->SetValue($this->DataSource->sflAVLG->GetValue());
                $this->sTotalSecPaquete->SetValue($this->DataSource->sTotalSecPaquete->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->ClaveMovimiento->Show();
                $this->DescMovimiento->Show();
                $this->FechaInicioMov->Show();
                $this->FechaFinMov->Show();
                $this->Horas->Show();
                $this->Panel1->Show();
                $this->Panel2->Show();
                $this->sTotalSecPaquete->Show();
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
        $this->TotalHoras->SetValue($this->DataSource->TotalHoras->GetValue());
        $this->Sorter_ClaveMovimiento->Show();
        $this->Sorter_DescMovimiento->Show();
        $this->Sorter_FechaInicioMov->Show();
        $this->Sorter_FechaFinMov->Show();
        $this->Sorter_Paquete->Show();
        $this->Navigator->Show();
        $this->TotalHoras->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @59-730A08F0
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ClaveMovimiento->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DescMovimiento->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaInicioMov->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaFinMov->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Horas->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Paquete->Errors->ToString());
        $errors = ComposeStrings($errors, $this->sflAVLG->Errors->ToString());
        $errors = ComposeStrings($errors, $this->sTotalSecPaquete->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_detalle_incidente_avl Class @59-FCB6E20C

class clsmc_detalle_incidente_avlDataSource extends clsDBcnDisenio {  //mc_detalle_incidente_avlDataSource Class @59-05BF7EA5

//DataSource Variables @59-54BD554D
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $ClaveMovimiento;
    public $DescMovimiento;
    public $FechaInicioMov;
    public $FechaFinMov;
    public $Horas;
    public $Paquete;
    public $sflAVLG;
    public $TotalHoras;
    public $sTotalSecPaquete;
//End DataSource Variables

//DataSourceClass_Initialize Event @59-4CB2F658
    function clsmc_detalle_incidente_avlDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_detalle_incidente_avl";
        $this->Initialize();
        $this->ClaveMovimiento = new clsField("ClaveMovimiento", ccsInteger, "");
        
        $this->DescMovimiento = new clsField("DescMovimiento", ccsText, "");
        
        $this->FechaInicioMov = new clsField("FechaInicioMov", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaFinMov = new clsField("FechaFinMov", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->Horas = new clsField("Horas", ccsText, "");
        
        $this->Paquete = new clsField("Paquete", ccsText, "");
        
        $this->sflAVLG = new clsField("sflAVLG", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->TotalHoras = new clsField("TotalHoras", ccsText, "");
        
        $this->sTotalSecPaquete = new clsField("sTotalSecPaquete", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @59-B21C95B9
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_ClaveMovimiento" => array("ClaveMovimiento", ""), 
            "Sorter_DescMovimiento" => array("DescMovimiento", ""), 
            "Sorter_FechaInicioMov" => array("FechaInicioMov", ""), 
            "Sorter_FechaFinMov" => array("FechaFinMov", ""), 
            "Sorter_Paquete" => array("Paquete", "")));
    }
//End SetOrder Method

//Prepare Method @59-85B4A777
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId_incidente", ccsText, "", "", $this->Parameters["urlId_incidente"], "", false);
    }
//End Prepare Method

//Open Method @59-19F3FCE6
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (\n" .
        "\n" .
        "select 	det.ClaveMovimiento, det.DescMovimiento , det.FechaInicioMov, det.FechaFinMov, det.Paquete    \n" .
        "	, dbo.ufDiffFechasMCSec(i.FechaEnCurso,i.FechaResuelto) TiempoSolucionRmdy\n" .
        "	, r.LiberacionAVL , r.CountPaquete, t.TotalSecPaquete , s.TotalHoras  \n" .
        ", dbo.ufDiffFechasMCSec(det.FechaInicioMov,  det.FechaFinMov) HorasInvertidas\n" .
        "from mc_info_incidentes i \n" .
        "	inner join mc_universo_cds u on i.Id_incidente = u.numero  and month(i.FechaCarga ) = u.mes and YEAR(fechacarga)= u.anio \n" .
        "	inner join mc_detalle_incidente_avl det on (det.Id_Incidente = i.Id_incidente or det.Id_Incidente = i.IncPadre )\n" .
        "		and month(det.FechaCarga ) = u.mes and YEAR(det.fechacarga)= u.anio \n" .
        "	inner join mc_c_movimiento m on m.ClaveMovimiento = det.ClaveMovimiento \n" .
        "	left join (select id_incidente, paquete, FechaCarga, Min(FechaFinMov) LiberacionAVL, count(FechaFinMov)  CountPaquete\n" .
        "			from mc_detalle_incidente_avl det \n" .
        "				where ClaveMovimiento ='38'\n" .
        "				group by id_incidente, Paquete, FechaCarga  \n" .
        "	) as r on r.Id_Incidente = det.Id_Incidente and r.Paquete = det.Paquete and MONTH(r.FechaCarga )= u.mes  and YEAR(r.FechaCarga )= u.anio \n" .
        "	left join (select id_incidente, paquete, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalSecPaquete\n" .
        "			from mc_detalle_incidente_avl dett\n" .
        "				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion=1 \n" .
        "				group by id_incidente, Paquete, FechaCarga  \n" .
        "	) as t on t.Id_Incidente = det.Id_Incidente and t.Paquete = det.Paquete and MONTH(t.FechaCarga )= u.mes  and YEAR(t.FechaCarga )= u.anio \n" .
        "	left join (select id_incidente, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalHoras\n" .
        "			from mc_detalle_incidente_avl dett\n" .
        "				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion=1 \n" .
        "				group by id_incidente, FechaCarga  \n" .
        "	) as s on s.Id_Incidente = det.Id_Incidente and MONTH(s.FechaCarga )= u.mes and YEAR(s.FechaCarga )= u.anio \n" .
        "where i.id_incidente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "') cnt";
        $this->SQL = "\n" .
        "\n" .
        "select 	det.ClaveMovimiento, det.DescMovimiento , det.FechaInicioMov, det.FechaFinMov, det.Paquete    \n" .
        "	, dbo.ufDiffFechasMCSec(i.FechaEnCurso,i.FechaResuelto) TiempoSolucionRmdy\n" .
        "	, r.LiberacionAVL , r.CountPaquete, t.TotalSecPaquete , s.TotalHoras  \n" .
        ", dbo.ufDiffFechasMCSec(det.FechaInicioMov,  det.FechaFinMov) HorasInvertidas\n" .
        "from mc_info_incidentes i \n" .
        "	inner join mc_universo_cds u on i.Id_incidente = u.numero  and month(i.FechaCarga ) = u.mes and YEAR(fechacarga)= u.anio \n" .
        "	inner join mc_detalle_incidente_avl det on (det.Id_Incidente = i.Id_incidente or det.Id_Incidente = i.IncPadre )\n" .
        "		and month(det.FechaCarga ) = u.mes and YEAR(det.fechacarga)= u.anio \n" .
        "	inner join mc_c_movimiento m on m.ClaveMovimiento = det.ClaveMovimiento \n" .
        "	left join (select id_incidente, paquete, FechaCarga, Min(FechaFinMov) LiberacionAVL, count(FechaFinMov)  CountPaquete\n" .
        "			from mc_detalle_incidente_avl det \n" .
        "				where ClaveMovimiento ='38'\n" .
        "				group by id_incidente, Paquete, FechaCarga  \n" .
        "	) as r on r.Id_Incidente = det.Id_Incidente and r.Paquete = det.Paquete and MONTH(r.FechaCarga )= u.mes  and YEAR(r.FechaCarga )= u.anio \n" .
        "	left join (select id_incidente, paquete, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalSecPaquete\n" .
        "			from mc_detalle_incidente_avl dett\n" .
        "				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion=1 \n" .
        "				group by id_incidente, Paquete, FechaCarga  \n" .
        "	) as t on t.Id_Incidente = det.Id_Incidente and t.Paquete = det.Paquete and MONTH(t.FechaCarga )= u.mes  and YEAR(t.FechaCarga )= u.anio \n" .
        "	left join (select id_incidente, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalHoras\n" .
        "			from mc_detalle_incidente_avl dett\n" .
        "				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion=1 \n" .
        "				group by id_incidente, FechaCarga  \n" .
        "	) as s on s.Id_Incidente = det.Id_Incidente and MONTH(s.FechaCarga )= u.mes and YEAR(s.FechaCarga )= u.anio \n" .
        "where i.id_incidente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'";
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

//SetValues Method @59-FC84A8DC
    function SetValues()
    {
        $this->ClaveMovimiento->SetDBValue(trim($this->f("ClaveMovimiento")));
        $this->DescMovimiento->SetDBValue($this->f("DescMovimiento"));
        $this->FechaInicioMov->SetDBValue(trim($this->f("FechaInicioMov")));
        $this->FechaFinMov->SetDBValue(trim($this->f("FechaFinMov")));
        $this->Horas->SetDBValue($this->f("HorasInvertidas"));
        $this->Paquete->SetDBValue($this->f("Paquete"));
        $this->sflAVLG->SetDBValue(trim($this->f("LiberacionAVL")));
        $this->TotalHoras->SetDBValue($this->f("TotalHoras"));
        $this->sTotalSecPaquete->SetDBValue($this->f("TotalSecPaquete"));
    }
//End SetValues Method

} //End mc_detalle_incidente_avlDataSource Class @59-FCB6E20C

class clsRecordmc_info_incidentes3 { //mc_info_incidentes3 Class @84-BFFFF8AB

//Variables @84-9E315808

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

//Class_Initialize Event @84-A21E2AF8
    function clsRecordmc_info_incidentes3($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_incidentes3/Error";
        $this->DataSource = new clsmc_info_incidentes3DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_incidentes3";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->FechaResuelto = new clsControl(ccsLabel, "FechaResuelto", "FechaResuelto", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaResuelto", $Method, NULL), $this);
            $this->HorasInvertidas = new clsControl(ccsLabel, "HorasInvertidas", "HorasInvertidas", ccsText, "", CCGetRequestParam("HorasInvertidas", $Method, NULL), $this);
            $this->slblflAVL = new clsControl(ccsLabel, "slblflAVL", "slblflAVL", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("slblflAVL", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @84-3E703885
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId_incidente"] = CCGetFromGet("Id_incidente", NULL);
    }
//End Initialize Method

//Validate Method @84-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @84-800C1B19
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FechaResuelto->Errors->Count());
        $errors = ($errors || $this->HorasInvertidas->Errors->Count());
        $errors = ($errors || $this->slblflAVL->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @84-17DC9883
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

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @84-6103844E
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
                $this->FechaResuelto->SetValue($this->DataSource->FechaResuelto->GetValue());
                $this->HorasInvertidas->SetValue($this->DataSource->HorasInvertidas->GetValue());
                $this->slblflAVL->SetValue($this->DataSource->slblflAVL->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->FechaResuelto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HorasInvertidas->Errors->ToString());
            $Error = ComposeStrings($Error, $this->slblflAVL->Errors->ToString());
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

        $this->FechaResuelto->Show();
        $this->HorasInvertidas->Show();
        $this->slblflAVL->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_incidentes3 Class @84-FCB6E20C

class clsmc_info_incidentes3DataSource extends clsDBcnDisenio {  //mc_info_incidentes3DataSource Class @84-329ABCE7

//DataSource Variables @84-78D6D71A
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $FechaResuelto;
    public $HorasInvertidas;
    public $slblflAVL;
//End DataSource Variables

//DataSourceClass_Initialize Event @84-37287CC8
    function clsmc_info_incidentes3DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_info_incidentes3/Error";
        $this->Initialize();
        $this->FechaResuelto = new clsField("FechaResuelto", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->HorasInvertidas = new clsField("HorasInvertidas", ccsText, "");
        
        $this->slblflAVL = new clsField("slblflAVL", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @84-D5067C86
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId_incidente", ccsText, "", "", $this->Parameters["urlId_incidente"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @84-83C67DC2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT TOP 1 * ,(dbo.ufDiffFechasMCSec(\n" .
        "	(select top 1 FechaFinMov from mc_detalle_incidente_avl where (Id_Incidente =a.Id_Incidente or Id_Incidente = a.IncPadre ) \n" .
        "		and ClaveMovimiento =38 and month(FechaCarga) = u.mes and year(FechaCarga) = u.anio order by fechaFinMov desc )  ,	FechaResuelto )) as HorasInvertidas,\n" .
        "(select top 1 FechaFinMov from mc_detalle_incidente_avl \n" .
        "	where (Id_Incidente =a.Id_Incidente or Id_Incidente = a.IncPadre ) \n" .
        "	and ClaveMovimiento =38 	and month(FechaCarga) = u.mes and year(FechaCarga) = u.anio order by fechaFinMov desc ) as LiberacionAVL\n" .
        "FROM mc_info_incidentes a\n" .
        "		inner join mc_universo_cds u on a.Id_incidente = u.numero  and month(a.FechaCarga ) = u.mes and YEAR(a.fechacarga)= u.anio \n" .
        "WHERE Id_incidente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' ";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @84-EF1FDD6F
    function SetValues()
    {
        $this->FechaResuelto->SetDBValue(trim($this->f("FechaResuelto")));
        $this->HorasInvertidas->SetDBValue($this->f("HorasInvertidas"));
        $this->slblflAVL->SetDBValue(trim($this->f("LiberacionAVL")));
    }
//End SetValues Method

} //End mc_info_incidentes3DataSource Class @84-FCB6E20C

class clsRecordmc_info_incidentes4 { //mc_info_incidentes4 Class @90-F0BE6E6C

//Variables @90-9E315808

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

//Class_Initialize Event @90-2F761DC6
    function clsRecordmc_info_incidentes4($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_info_incidentes4/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_info_incidentes4";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->FechaEnCurso = new clsControl(ccsLabel, "FechaEnCurso", "FechaEnCurso", ccsText, "", CCGetRequestParam("FechaEnCurso", $Method, NULL), $this);
            $this->FechaResuelto = new clsControl(ccsLabel, "FechaResuelto", "FechaResuelto", ccsText, "", CCGetRequestParam("FechaResuelto", $Method, NULL), $this);
            $this->HorasInvertidas = new clsControl(ccsLabel, "HorasInvertidas", "HorasInvertidas", ccsText, "", CCGetRequestParam("HorasInvertidas", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @90-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @90-23B92CE9
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->FechaEnCurso->Errors->Count());
        $errors = ($errors || $this->FechaResuelto->Errors->Count());
        $errors = ($errors || $this->HorasInvertidas->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @90-82225C24
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
    }
//End Operation Method

//Show Method @90-B1F364FC
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

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->FechaEnCurso->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaResuelto->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HorasInvertidas->Errors->ToString());
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

        $this->FechaEnCurso->Show();
        $this->FechaResuelto->Show();
        $this->HorasInvertidas->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End mc_info_incidentes4 Class @90-FCB6E20C

class clsRecordFinal { //Final Class @97-3764C1F9

//Variables @97-9E315808

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

//Class_Initialize Event @97-C325F5CE
    function clsRecordFinal($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record Final/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "Final";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->TotalHorasSolucion = new clsControl(ccsLabel, "TotalHorasSolucion", "TotalHorasSolucion", ccsText, "", CCGetRequestParam("TotalHorasSolucion", $Method, NULL), $this);
            $this->TotalHorasSolucion->HTML = true;
            $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", $Method, NULL), $this);
            $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->ImageLink1->Page = "";
            $this->ImageLink1->Visible = false;
            $this->HorasCursoAResuelto = new clsControl(ccsLabel, "HorasCursoAResuelto", "HorasCursoAResuelto", ccsText, "", CCGetRequestParam("HorasCursoAResuelto", $Method, NULL), $this);
            $this->HorasCursoAResuelto->HTML = true;
        }
    }
//End Class_Initialize Event

//Validate Method @97-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @97-024D4338
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TotalHorasSolucion->Errors->Count());
        $errors = ($errors || $this->ImageLink1->Errors->Count());
        $errors = ($errors || $this->HorasCursoAResuelto->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @97-82225C24
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
    }
//End Operation Method

//Show Method @97-0164D10F
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

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->TotalHorasSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ImageLink1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HorasCursoAResuelto->Errors->ToString());
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

        $this->TotalHorasSolucion->Show();
        $this->ImageLink1->Show();
        $this->HorasCursoAResuelto->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End Final Class @97-FCB6E20C

class clsRecordmc_calificacion_incidente { //mc_calificacion_incidente Class @106-984935C7

//Variables @106-9E315808

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

//Class_Initialize Event @106-474CD01A
    function clsRecordmc_calificacion_incidente($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_calificacion_incidente/Error";
        $this->DataSource = new clsmc_calificacion_incidenteDataSource($this);
        $this->ds = & $this->DataSource;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_calificacion_incidente";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Cumple_DISP_SOPORTE = new clsControl(ccsHidden, "Cumple_DISP_SOPORTE", "Disponibilidad del Personal de Soporte", ccsInteger, "", CCGetRequestParam("Cumple_DISP_SOPORTE", $Method, NULL), $this);
            $this->Cumple_Inc_TiempoSolucion = new clsControl(ccsListBox, "Cumple_Inc_TiempoSolucion", "Tiempo Solucion", ccsInteger, "", CCGetRequestParam("Cumple_Inc_TiempoSolucion", $Method, NULL), $this);
            $this->Cumple_Inc_TiempoSolucion->DSType = dsListOfValues;
            $this->Cumple_Inc_TiempoSolucion->Values = array(array("0", "No Cumple"), array("1", "Cumple"));
            $this->Cumple_Inc_TiempoAsignacion = new clsControl(ccsListBox, "Cumple_Inc_TiempoAsignacion", "Tiempo Asignacion", ccsInteger, "", CCGetRequestParam("Cumple_Inc_TiempoAsignacion", $Method, NULL), $this);
            $this->Cumple_Inc_TiempoAsignacion->DSType = dsListOfValues;
            $this->Cumple_Inc_TiempoAsignacion->Values = array(array("0", "No Cumple"), array("1", "Cumple"));
            $this->Obs_Manuales = new clsControl(ccsTextArea, "Obs_Manuales", "Obs Manuales", ccsText, "", CCGetRequestParam("Obs_Manuales", $Method, NULL), $this);
            $this->severidad = new clsControl(ccsHidden, "severidad", "Severidad", ccsInteger, "", CCGetRequestParam("severidad", $Method, NULL), $this);
            $this->MesReporte = new clsControl(ccsHidden, "MesReporte", "Mes Reporte", ccsInteger, "", CCGetRequestParam("MesReporte", $Method, NULL), $this);
            $this->MesReporte->Required = true;
            $this->AnioReporte = new clsControl(ccsHidden, "AnioReporte", "Anio Reporte", ccsInteger, "", CCGetRequestParam("AnioReporte", $Method, NULL), $this);
            $this->AnioReporte->Required = true;
            $this->id_servicio = new clsControl(ccsHidden, "id_servicio", "Id Servicio", ccsInteger, "", CCGetRequestParam("id_servicio", $Method, NULL), $this);
            $this->id_proveedor = new clsControl(ccsHidden, "id_proveedor", "Id Proveedor", ccsInteger, "", CCGetRequestParam("id_proveedor", $Method, NULL), $this);
            $this->FechaUltMod = new clsControl(ccsHidden, "FechaUltMod", "Fecha Ult Mod", ccsDate, array("ShortDate"), CCGetRequestParam("FechaUltMod", $Method, NULL), $this);
            $this->UsrUltMod = new clsControl(ccsHidden, "UsrUltMod", "Usr Ult Mod", ccsText, "", CCGetRequestParam("UsrUltMod", $Method, NULL), $this);
            $this->ObsCAPC = new clsControl(ccsLabel, "ObsCAPC", "ObsCAPC", ccsText, "", CCGetRequestParam("ObsCAPC", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @106-3E703885
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId_incidente"] = CCGetFromGet("Id_incidente", NULL);
    }
//End Initialize Method

//Validate Method @106-749EE5C7
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Cumple_DISP_SOPORTE->Validate() && $Validation);
        $Validation = ($this->Cumple_Inc_TiempoSolucion->Validate() && $Validation);
        $Validation = ($this->Cumple_Inc_TiempoAsignacion->Validate() && $Validation);
        $Validation = ($this->Obs_Manuales->Validate() && $Validation);
        $Validation = ($this->severidad->Validate() && $Validation);
        $Validation = ($this->MesReporte->Validate() && $Validation);
        $Validation = ($this->AnioReporte->Validate() && $Validation);
        $Validation = ($this->id_servicio->Validate() && $Validation);
        $Validation = ($this->id_proveedor->Validate() && $Validation);
        $Validation = ($this->FechaUltMod->Validate() && $Validation);
        $Validation = ($this->UsrUltMod->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Cumple_DISP_SOPORTE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Cumple_Inc_TiempoSolucion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Cumple_Inc_TiempoAsignacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Obs_Manuales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->severidad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AnioReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_servicio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UsrUltMod->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @106-6ACC328F
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Cumple_DISP_SOPORTE->Errors->Count());
        $errors = ($errors || $this->Cumple_Inc_TiempoSolucion->Errors->Count());
        $errors = ($errors || $this->Cumple_Inc_TiempoAsignacion->Errors->Count());
        $errors = ($errors || $this->Obs_Manuales->Errors->Count());
        $errors = ($errors || $this->severidad->Errors->Count());
        $errors = ($errors || $this->MesReporte->Errors->Count());
        $errors = ($errors || $this->AnioReporte->Errors->Count());
        $errors = ($errors || $this->id_servicio->Errors->Count());
        $errors = ($errors || $this->id_proveedor->Errors->Count());
        $errors = ($errors || $this->FechaUltMod->Errors->Count());
        $errors = ($errors || $this->UsrUltMod->Errors->Count());
        $errors = ($errors || $this->ObsCAPC->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @106-517B5C36
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
            $this->PressedButton = $this->EditMode ? "Button_Update" : "";
            if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_Update") {
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

//UpdateRow Method @106-D6E15464
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Cumple_DISP_SOPORTE->SetValue($this->Cumple_DISP_SOPORTE->GetValue(true));
        $this->DataSource->Cumple_Inc_TiempoSolucion->SetValue($this->Cumple_Inc_TiempoSolucion->GetValue(true));
        $this->DataSource->Cumple_Inc_TiempoAsignacion->SetValue($this->Cumple_Inc_TiempoAsignacion->GetValue(true));
        $this->DataSource->Obs_Manuales->SetValue($this->Obs_Manuales->GetValue(true));
        $this->DataSource->severidad->SetValue($this->severidad->GetValue(true));
        $this->DataSource->MesReporte->SetValue($this->MesReporte->GetValue(true));
        $this->DataSource->AnioReporte->SetValue($this->AnioReporte->GetValue(true));
        $this->DataSource->id_servicio->SetValue($this->id_servicio->GetValue(true));
        $this->DataSource->id_proveedor->SetValue($this->id_proveedor->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->UsrUltMod->SetValue($this->UsrUltMod->GetValue(true));
        $this->DataSource->ObsCAPC->SetValue($this->ObsCAPC->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @106-28087E3C
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

        $this->Cumple_Inc_TiempoSolucion->Prepare();
        $this->Cumple_Inc_TiempoAsignacion->Prepare();

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
                    $this->Cumple_DISP_SOPORTE->SetValue($this->DataSource->Cumple_DISP_SOPORTE->GetValue());
                    $this->Cumple_Inc_TiempoSolucion->SetValue($this->DataSource->Cumple_Inc_TiempoSolucion->GetValue());
                    $this->Cumple_Inc_TiempoAsignacion->SetValue($this->DataSource->Cumple_Inc_TiempoAsignacion->GetValue());
                    $this->Obs_Manuales->SetValue($this->DataSource->Obs_Manuales->GetValue());
                    $this->severidad->SetValue($this->DataSource->severidad->GetValue());
                    $this->MesReporte->SetValue($this->DataSource->MesReporte->GetValue());
                    $this->AnioReporte->SetValue($this->DataSource->AnioReporte->GetValue());
                    $this->id_servicio->SetValue($this->DataSource->id_servicio->GetValue());
                    $this->id_proveedor->SetValue($this->DataSource->id_proveedor->GetValue());
                    $this->FechaUltMod->SetValue($this->DataSource->FechaUltMod->GetValue());
                    $this->UsrUltMod->SetValue($this->DataSource->UsrUltMod->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Cumple_DISP_SOPORTE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Cumple_Inc_TiempoSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Cumple_Inc_TiempoAsignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Obs_Manuales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->severidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AnioReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_servicio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UsrUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ObsCAPC->Errors->ToString());
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
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Update->Show();
        $this->Cumple_DISP_SOPORTE->Show();
        $this->Cumple_Inc_TiempoSolucion->Show();
        $this->Cumple_Inc_TiempoAsignacion->Show();
        $this->Obs_Manuales->Show();
        $this->severidad->Show();
        $this->MesReporte->Show();
        $this->AnioReporte->Show();
        $this->id_servicio->Show();
        $this->id_proveedor->Show();
        $this->FechaUltMod->Show();
        $this->UsrUltMod->Show();
        $this->ObsCAPC->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_calificacion_incidente Class @106-FCB6E20C

class clsmc_calificacion_incidenteDataSource extends clsDBcnDisenio {  //mc_calificacion_incidenteDataSource Class @106-BFB23304

//DataSource Variables @106-30C7C462
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $wp;
    public $AllParametersSet;

    public $UpdateFields = array();

    // Datasource fields
    public $Cumple_DISP_SOPORTE;
    public $Cumple_Inc_TiempoSolucion;
    public $Cumple_Inc_TiempoAsignacion;
    public $Obs_Manuales;
    public $severidad;
    public $MesReporte;
    public $AnioReporte;
    public $id_servicio;
    public $id_proveedor;
    public $FechaUltMod;
    public $UsrUltMod;
    public $ObsCAPC;
//End DataSource Variables

//DataSourceClass_Initialize Event @106-3CD54438
    function clsmc_calificacion_incidenteDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_calificacion_incidente/Error";
        $this->Initialize();
        $this->Cumple_DISP_SOPORTE = new clsField("Cumple_DISP_SOPORTE", ccsInteger, "");
        
        $this->Cumple_Inc_TiempoSolucion = new clsField("Cumple_Inc_TiempoSolucion", ccsInteger, "");
        
        $this->Cumple_Inc_TiempoAsignacion = new clsField("Cumple_Inc_TiempoAsignacion", ccsInteger, "");
        
        $this->Obs_Manuales = new clsField("Obs_Manuales", ccsText, "");
        
        $this->severidad = new clsField("severidad", ccsInteger, "");
        
        $this->MesReporte = new clsField("MesReporte", ccsInteger, "");
        
        $this->AnioReporte = new clsField("AnioReporte", ccsInteger, "");
        
        $this->id_servicio = new clsField("id_servicio", ccsInteger, "");
        
        $this->id_proveedor = new clsField("id_proveedor", ccsInteger, "");
        
        $this->FechaUltMod = new clsField("FechaUltMod", ccsDate, $this->DateFormat);
        
        $this->UsrUltMod = new clsField("UsrUltMod", ccsText, "");
        
        $this->ObsCAPC = new clsField("ObsCAPC", ccsText, "");
        

        $this->UpdateFields["Cumple_DISP_SOPORTE"] = array("Name" => "[Cumple_DISP_SOPORTE]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Cumple_Inc_TiempoSolucion"] = array("Name" => "[Cumple_Inc_TiempoSolucion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Cumple_Inc_TiempoAsignacion"] = array("Name" => "[Cumple_Inc_TiempoAsignacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Obs_Manuales"] = array("Name" => "[Obs_Manuales]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["severidad"] = array("Name" => "severidad", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["MesReporte"] = array("Name" => "[MesReporte]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["AnioReporte"] = array("Name" => "[AnioReporte]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_servicio"] = array("Name" => "id_servicio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsrUltMod"] = array("Name" => "[UsrUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @106-D654A9F8
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId_incidente", ccsText, "", "", $this->Parameters["urlId_incidente"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "id_incidente", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @106-9B29D29C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_calificacion_incidentes_SAT {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @106-0D70C075
    function SetValues()
    {
        $this->Cumple_DISP_SOPORTE->SetDBValue(trim($this->f("Cumple_DISP_SOPORTE")));
        $this->Cumple_Inc_TiempoSolucion->SetDBValue(trim($this->f("Cumple_Inc_TiempoSolucion")));
        $this->Cumple_Inc_TiempoAsignacion->SetDBValue(trim($this->f("Cumple_Inc_TiempoAsignacion")));
        $this->Obs_Manuales->SetDBValue($this->f("Obs_Manuales"));
        $this->severidad->SetDBValue(trim($this->f("severidad")));
        $this->MesReporte->SetDBValue(trim($this->f("MesReporte")));
        $this->AnioReporte->SetDBValue(trim($this->f("AnioReporte")));
        $this->id_servicio->SetDBValue(trim($this->f("id_servicio")));
        $this->id_proveedor->SetDBValue(trim($this->f("id_proveedor")));
        $this->FechaUltMod->SetDBValue(trim($this->f("FechaUltMod")));
        $this->UsrUltMod->SetDBValue($this->f("UsrUltMod"));
    }
//End SetValues Method

//Update Method @106-9DD2796C
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Cumple_DISP_SOPORTE"]["Value"] = $this->Cumple_DISP_SOPORTE->GetDBValue(true);
        $this->UpdateFields["Cumple_Inc_TiempoSolucion"]["Value"] = $this->Cumple_Inc_TiempoSolucion->GetDBValue(true);
        $this->UpdateFields["Cumple_Inc_TiempoAsignacion"]["Value"] = $this->Cumple_Inc_TiempoAsignacion->GetDBValue(true);
        $this->UpdateFields["Obs_Manuales"]["Value"] = $this->Obs_Manuales->GetDBValue(true);
        $this->UpdateFields["severidad"]["Value"] = $this->severidad->GetDBValue(true);
        $this->UpdateFields["MesReporte"]["Value"] = $this->MesReporte->GetDBValue(true);
        $this->UpdateFields["AnioReporte"]["Value"] = $this->AnioReporte->GetDBValue(true);
        $this->UpdateFields["id_servicio"]["Value"] = $this->id_servicio->GetDBValue(true);
        $this->UpdateFields["id_proveedor"]["Value"] = $this->id_proveedor->GetDBValue(true);
        $this->UpdateFields["FechaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->UpdateFields["UsrUltMod"]["Value"] = $this->UsrUltMod->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_calificacion_incidentes_SAT", $this->UpdateFields, $this);
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

} //End mc_calificacion_incidenteDataSource Class @106-FCB6E20C

//Initialize Page @1-23B2B491
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
$TemplateFileName = "CalificaIncidenteSAT.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-D5F39CEF
CCSecurityRedirect("", "Login.php");
//End Authenticate User

//Include events file @1-B5A4D441
include_once("./CalificaIncidenteSAT_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-1F259E68
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_info_incidentes = new clsRecordmc_info_incidentes("", $MainPage);
$mc_info_incidentes1 = new clsRecordmc_info_incidentes1("", $MainPage);
$mc_c_aplicacion = new clsRecordmc_c_aplicacion("", $MainPage);
$mc_info_incidentes2 = new clsRecordmc_info_incidentes2("", $MainPage);
$mc_detalle_incidente_avl = new clsGridmc_detalle_incidente_avl("", $MainPage);
$mc_info_incidentes3 = new clsRecordmc_info_incidentes3("", $MainPage);
$mc_info_incidentes4 = new clsRecordmc_info_incidentes4("", $MainPage);
$Final = new clsRecordFinal("", $MainPage);
$mc_calificacion_incidente = new clsRecordmc_calificacion_incidente("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->mc_info_incidentes = & $mc_info_incidentes;
$MainPage->mc_info_incidentes1 = & $mc_info_incidentes1;
$MainPage->mc_c_aplicacion = & $mc_c_aplicacion;
$MainPage->mc_info_incidentes2 = & $mc_info_incidentes2;
$MainPage->mc_detalle_incidente_avl = & $mc_detalle_incidente_avl;
$MainPage->mc_info_incidentes3 = & $mc_info_incidentes3;
$MainPage->mc_info_incidentes4 = & $mc_info_incidentes4;
$MainPage->Final = & $Final;
$MainPage->mc_calificacion_incidente = & $mc_calificacion_incidente;
$mc_info_incidentes->Initialize();
$mc_c_aplicacion->Initialize();
$mc_info_incidentes2->Initialize();
$mc_detalle_incidente_avl->Initialize();
$mc_info_incidentes3->Initialize();
$mc_calificacion_incidente->Initialize();
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

//Execute Components @1-AFFC6BBA
$mc_calificacion_incidente->Operation();
$Final->Operation();
$mc_info_incidentes4->Operation();
$mc_info_incidentes3->Operation();
$mc_info_incidentes2->Operation();
$mc_c_aplicacion->Operation();
$mc_info_incidentes1->Operation();
$mc_info_incidentes->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-086A1B92
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_info_incidentes);
    unset($mc_info_incidentes1);
    unset($mc_c_aplicacion);
    unset($mc_info_incidentes2);
    unset($mc_detalle_incidente_avl);
    unset($mc_info_incidentes3);
    unset($mc_info_incidentes4);
    unset($Final);
    unset($mc_calificacion_incidente);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-20378D9E
$Header->Show();
$mc_info_incidentes->Show();
$mc_info_incidentes1->Show();
$mc_c_aplicacion->Show();
$mc_info_incidentes2->Show();
$mc_detalle_incidente_avl->Show();
$mc_info_incidentes3->Show();
$mc_info_incidentes4->Show();
$Final->Show();
$mc_calificacion_incidente->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-57662798
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($mc_info_incidentes);
unset($mc_info_incidentes1);
unset($mc_c_aplicacion);
unset($mc_info_incidentes2);
unset($mc_detalle_incidente_avl);
unset($mc_info_incidentes3);
unset($mc_info_incidentes4);
unset($Final);
unset($mc_calificacion_incidente);
unset($Tpl);
//End Unload Page


?>
