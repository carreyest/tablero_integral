<?php
//Include Common Files @1-8DC84EE9
define("RelativePath", "..");
define("PathToCurrentPage", "/ConfigDeCargas/");
define("FileName", "ProcesoCargaAList.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordproceso_carga_archivosSearch { //proceso_carga_archivosSearch Class @2-DEF76409

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

//Class_Initialize Event @2-5214E1AB
    function clsRecordproceso_carga_archivosSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record proceso_carga_archivosSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "proceso_carga_archivosSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_keyword = new clsControl(ccsTextBox, "s_keyword", "Keyword", ccsText, "", CCGetRequestParam("s_keyword", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @2-A144A629
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-D6729123
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-F49E5C4C
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
        $Redirect = "ProcesoCargaAList.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "ProcesoCargaAList.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @2-AB6C9DC4
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
            $Error = ComposeStrings($Error, $this->s_keyword->Errors->ToString());
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
        $this->s_keyword->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End proceso_carga_archivosSearch Class @2-FCB6E20C

class clsGridproceso_carga_archivos { //proceso_carga_archivos class @6-EC79DA30

//Variables @6-131A2F0B

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
    public $Sorter_cve_carga;
    public $Sorter_descripcion;
    public $Sorter_mascara_archivo;
    public $Sorter_formato_archivo;
    public $Sorter_repositorio;
    public $Sorter_db_destino;
    public $Sorter_tabla_destino;
    public $Sorter_numero_hoja_excel;
    public $Sorter_filas_sin_datos_excel;
    public $Sorter_campo_fecha_cierre;
    public $Sorter_campo_indice;
    public $Sorter_periodicidad;
    public $Grupo;
//End Variables

//Class_Initialize Event @6-7A92E54D
    function clsGridproceso_carga_archivos($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "proceso_carga_archivos";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid proceso_carga_archivos";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsproceso_carga_archivosDataSource($this);
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
        $this->SorterName = CCGetParam("proceso_carga_archivosOrder", "");
        $this->SorterDirection = CCGetParam("proceso_carga_archivosDir", "");

        $this->cve_carga = new clsControl(ccsLink, "cve_carga", "cve_carga", ccsText, "", CCGetRequestParam("cve_carga", ccsGet, NULL), $this);
        $this->cve_carga->Page = "ProcesoCargaAMaint.php";
        $this->descripcion = new clsControl(ccsLabel, "descripcion", "descripcion", ccsText, "", CCGetRequestParam("descripcion", ccsGet, NULL), $this);
        $this->mascara_archivo = new clsControl(ccsLabel, "mascara_archivo", "mascara_archivo", ccsText, "", CCGetRequestParam("mascara_archivo", ccsGet, NULL), $this);
        $this->formato_archivo = new clsControl(ccsLabel, "formato_archivo", "formato_archivo", ccsText, "", CCGetRequestParam("formato_archivo", ccsGet, NULL), $this);
        $this->repositorio = new clsControl(ccsLabel, "repositorio", "repositorio", ccsText, "", CCGetRequestParam("repositorio", ccsGet, NULL), $this);
        $this->db_destino = new clsControl(ccsLabel, "db_destino", "db_destino", ccsText, "", CCGetRequestParam("db_destino", ccsGet, NULL), $this);
        $this->tabla_destino = new clsControl(ccsLabel, "tabla_destino", "tabla_destino", ccsText, "", CCGetRequestParam("tabla_destino", ccsGet, NULL), $this);
        $this->numero_hoja_excel = new clsControl(ccsLabel, "numero_hoja_excel", "numero_hoja_excel", ccsInteger, "", CCGetRequestParam("numero_hoja_excel", ccsGet, NULL), $this);
        $this->filas_sin_datos_excel = new clsControl(ccsLabel, "filas_sin_datos_excel", "filas_sin_datos_excel", ccsInteger, "", CCGetRequestParam("filas_sin_datos_excel", ccsGet, NULL), $this);
        $this->campo_fecha_cierre = new clsControl(ccsLabel, "campo_fecha_cierre", "campo_fecha_cierre", ccsText, "", CCGetRequestParam("campo_fecha_cierre", ccsGet, NULL), $this);
        $this->campo_indice = new clsControl(ccsLabel, "campo_indice", "campo_indice", ccsText, "", CCGetRequestParam("campo_indice", ccsGet, NULL), $this);
        $this->periodicidad = new clsControl(ccsLabel, "periodicidad", "periodicidad", ccsText, "", CCGetRequestParam("periodicidad", ccsGet, NULL), $this);
        $this->campo_grupo = new clsControl(ccsLabel, "campo_grupo", "campo_grupo", ccsText, "", CCGetRequestParam("campo_grupo", ccsGet, NULL), $this);
        $this->proceso_carga_archivos_Insert = new clsControl(ccsLink, "proceso_carga_archivos_Insert", "proceso_carga_archivos_Insert", ccsText, "", CCGetRequestParam("proceso_carga_archivos_Insert", ccsGet, NULL), $this);
        $this->proceso_carga_archivos_Insert->Parameters = CCGetQueryString("QueryString", array("cve_carga", "ccsForm"));
        $this->proceso_carga_archivos_Insert->Page = "ProcesoCargaAMaint.php";
        $this->Sorter_cve_carga = new clsSorter($this->ComponentName, "Sorter_cve_carga", $FileName, $this);
        $this->Sorter_descripcion = new clsSorter($this->ComponentName, "Sorter_descripcion", $FileName, $this);
        $this->Sorter_mascara_archivo = new clsSorter($this->ComponentName, "Sorter_mascara_archivo", $FileName, $this);
        $this->Sorter_formato_archivo = new clsSorter($this->ComponentName, "Sorter_formato_archivo", $FileName, $this);
        $this->Sorter_repositorio = new clsSorter($this->ComponentName, "Sorter_repositorio", $FileName, $this);
        $this->Sorter_db_destino = new clsSorter($this->ComponentName, "Sorter_db_destino", $FileName, $this);
        $this->Sorter_tabla_destino = new clsSorter($this->ComponentName, "Sorter_tabla_destino", $FileName, $this);
        $this->Sorter_numero_hoja_excel = new clsSorter($this->ComponentName, "Sorter_numero_hoja_excel", $FileName, $this);
        $this->Sorter_filas_sin_datos_excel = new clsSorter($this->ComponentName, "Sorter_filas_sin_datos_excel", $FileName, $this);
        $this->Sorter_campo_fecha_cierre = new clsSorter($this->ComponentName, "Sorter_campo_fecha_cierre", $FileName, $this);
        $this->Sorter_campo_indice = new clsSorter($this->ComponentName, "Sorter_campo_indice", $FileName, $this);
        $this->Sorter_periodicidad = new clsSorter($this->ComponentName, "Sorter_periodicidad", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Grupo = new clsSorter($this->ComponentName, "Grupo", $FileName, $this);
    }
//End Class_Initialize Event

//Initialize Method @6-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @6-29D572F4
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);

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
            $this->ControlsVisible["cve_carga"] = $this->cve_carga->Visible;
            $this->ControlsVisible["descripcion"] = $this->descripcion->Visible;
            $this->ControlsVisible["mascara_archivo"] = $this->mascara_archivo->Visible;
            $this->ControlsVisible["formato_archivo"] = $this->formato_archivo->Visible;
            $this->ControlsVisible["repositorio"] = $this->repositorio->Visible;
            $this->ControlsVisible["db_destino"] = $this->db_destino->Visible;
            $this->ControlsVisible["tabla_destino"] = $this->tabla_destino->Visible;
            $this->ControlsVisible["numero_hoja_excel"] = $this->numero_hoja_excel->Visible;
            $this->ControlsVisible["filas_sin_datos_excel"] = $this->filas_sin_datos_excel->Visible;
            $this->ControlsVisible["campo_fecha_cierre"] = $this->campo_fecha_cierre->Visible;
            $this->ControlsVisible["campo_indice"] = $this->campo_indice->Visible;
            $this->ControlsVisible["periodicidad"] = $this->periodicidad->Visible;
            $this->ControlsVisible["campo_grupo"] = $this->campo_grupo->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->cve_carga->SetValue($this->DataSource->cve_carga->GetValue());
                $this->cve_carga->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->cve_carga->Parameters = CCAddParam($this->cve_carga->Parameters, "cve_carga", $this->DataSource->f("cve_carga"));
                $this->descripcion->SetValue($this->DataSource->descripcion->GetValue());
                $this->mascara_archivo->SetValue($this->DataSource->mascara_archivo->GetValue());
                $this->formato_archivo->SetValue($this->DataSource->formato_archivo->GetValue());
                $this->repositorio->SetValue($this->DataSource->repositorio->GetValue());
                $this->db_destino->SetValue($this->DataSource->db_destino->GetValue());
                $this->tabla_destino->SetValue($this->DataSource->tabla_destino->GetValue());
                $this->numero_hoja_excel->SetValue($this->DataSource->numero_hoja_excel->GetValue());
                $this->filas_sin_datos_excel->SetValue($this->DataSource->filas_sin_datos_excel->GetValue());
                $this->campo_fecha_cierre->SetValue($this->DataSource->campo_fecha_cierre->GetValue());
                $this->campo_indice->SetValue($this->DataSource->campo_indice->GetValue());
                $this->periodicidad->SetValue($this->DataSource->periodicidad->GetValue());
                $this->campo_grupo->SetValue($this->DataSource->campo_grupo->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->cve_carga->Show();
                $this->descripcion->Show();
                $this->mascara_archivo->Show();
                $this->formato_archivo->Show();
                $this->repositorio->Show();
                $this->db_destino->Show();
                $this->tabla_destino->Show();
                $this->numero_hoja_excel->Show();
                $this->filas_sin_datos_excel->Show();
                $this->campo_fecha_cierre->Show();
                $this->campo_indice->Show();
                $this->periodicidad->Show();
                $this->campo_grupo->Show();
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
        $this->proceso_carga_archivos_Insert->Show();
        $this->Sorter_cve_carga->Show();
        $this->Sorter_descripcion->Show();
        $this->Sorter_mascara_archivo->Show();
        $this->Sorter_formato_archivo->Show();
        $this->Sorter_repositorio->Show();
        $this->Sorter_db_destino->Show();
        $this->Sorter_tabla_destino->Show();
        $this->Sorter_numero_hoja_excel->Show();
        $this->Sorter_filas_sin_datos_excel->Show();
        $this->Sorter_campo_fecha_cierre->Show();
        $this->Sorter_campo_indice->Show();
        $this->Sorter_periodicidad->Show();
        $this->Navigator->Show();
        $this->Grupo->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @6-77E1E2A9
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->cve_carga->Errors->ToString());
        $errors = ComposeStrings($errors, $this->descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->mascara_archivo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->formato_archivo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->repositorio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->db_destino->Errors->ToString());
        $errors = ComposeStrings($errors, $this->tabla_destino->Errors->ToString());
        $errors = ComposeStrings($errors, $this->numero_hoja_excel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->filas_sin_datos_excel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->campo_fecha_cierre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->campo_indice->Errors->ToString());
        $errors = ComposeStrings($errors, $this->periodicidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->campo_grupo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End proceso_carga_archivos Class @6-FCB6E20C

class clsproceso_carga_archivosDataSource extends clsDBConnCarga {  //proceso_carga_archivosDataSource Class @6-C2127757

//DataSource Variables @6-2AA4F17C
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $cve_carga;
    public $descripcion;
    public $mascara_archivo;
    public $formato_archivo;
    public $repositorio;
    public $db_destino;
    public $tabla_destino;
    public $numero_hoja_excel;
    public $filas_sin_datos_excel;
    public $campo_fecha_cierre;
    public $campo_indice;
    public $periodicidad;
    public $campo_grupo;
//End DataSource Variables

//DataSourceClass_Initialize Event @6-BB0DEDF4
    function clsproceso_carga_archivosDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid proceso_carga_archivos";
        $this->Initialize();
        $this->cve_carga = new clsField("cve_carga", ccsText, "");
        
        $this->descripcion = new clsField("descripcion", ccsText, "");
        
        $this->mascara_archivo = new clsField("mascara_archivo", ccsText, "");
        
        $this->formato_archivo = new clsField("formato_archivo", ccsText, "");
        
        $this->repositorio = new clsField("repositorio", ccsText, "");
        
        $this->db_destino = new clsField("db_destino", ccsText, "");
        
        $this->tabla_destino = new clsField("tabla_destino", ccsText, "");
        
        $this->numero_hoja_excel = new clsField("numero_hoja_excel", ccsInteger, "");
        
        $this->filas_sin_datos_excel = new clsField("filas_sin_datos_excel", ccsInteger, "");
        
        $this->campo_fecha_cierre = new clsField("campo_fecha_cierre", ccsText, "");
        
        $this->campo_indice = new clsField("campo_indice", ccsText, "");
        
        $this->periodicidad = new clsField("periodicidad", ccsText, "");
        
        $this->campo_grupo = new clsField("campo_grupo", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @6-8ACA22EA
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_cve_carga" => array("cve_carga", ""), 
            "Sorter_descripcion" => array("descripcion", ""), 
            "Sorter_mascara_archivo" => array("mascara_archivo", ""), 
            "Sorter_formato_archivo" => array("formato_archivo", ""), 
            "Sorter_repositorio" => array("repositorio", ""), 
            "Sorter_db_destino" => array("db_destino", ""), 
            "Sorter_tabla_destino" => array("tabla_destino", ""), 
            "Sorter_numero_hoja_excel" => array("numero_hoja_excel", ""), 
            "Sorter_filas_sin_datos_excel" => array("filas_sin_datos_excel", ""), 
            "Sorter_campo_fecha_cierre" => array("campo_fecha_cierre", ""), 
            "Sorter_campo_indice" => array("campo_indice", ""), 
            "Sorter_periodicidad" => array("periodicidad", ""), 
            "Grupo" => array("grupo", "")));
    }
//End SetOrder Method

//Prepare Method @6-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @6-BFB44604
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT periodicidad, campo_indice, campo_fecha_cierre, filas_sin_datos_excel, numero_hoja_excel, tabla_destino, db_destino, repositorio,\n" .
        "formato_archivo, mascara_archivo, descripcion, cve_carga, grupo \n" .
        "FROM proceso_carga_archivos\n" .
        "WHERE periodicidad LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' \n" .
        "OR campo_indice LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR campo_fecha_cierre LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR procedimiento_extra LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR tabla_destino LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR db_destino LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR mails_responsables LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR repositorio LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR formato_archivo LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR mascara_archivo LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR descripcion LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR  cve_carga LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' ) cnt";
        $this->SQL = "SELECT periodicidad, campo_indice, campo_fecha_cierre, filas_sin_datos_excel, numero_hoja_excel, tabla_destino, db_destino, repositorio,\n" .
        "formato_archivo, mascara_archivo, descripcion, cve_carga, grupo \n" .
        "FROM proceso_carga_archivos\n" .
        "WHERE periodicidad LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' \n" .
        "OR campo_indice LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR campo_fecha_cierre LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR procedimiento_extra LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR tabla_destino LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR db_destino LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR mails_responsables LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR repositorio LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR formato_archivo LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR mascara_archivo LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR descripcion LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR  cve_carga LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%' ";
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

//SetValues Method @6-41CEF252
    function SetValues()
    {
        $this->cve_carga->SetDBValue($this->f("cve_carga"));
        $this->descripcion->SetDBValue($this->f("descripcion"));
        $this->mascara_archivo->SetDBValue($this->f("mascara_archivo"));
        $this->formato_archivo->SetDBValue($this->f("formato_archivo"));
        $this->repositorio->SetDBValue($this->f("repositorio"));
        $this->db_destino->SetDBValue($this->f("db_destino"));
        $this->tabla_destino->SetDBValue($this->f("tabla_destino"));
        $this->numero_hoja_excel->SetDBValue(trim($this->f("numero_hoja_excel")));
        $this->filas_sin_datos_excel->SetDBValue(trim($this->f("filas_sin_datos_excel")));
        $this->campo_fecha_cierre->SetDBValue($this->f("campo_fecha_cierre"));
        $this->campo_indice->SetDBValue($this->f("campo_indice"));
        $this->periodicidad->SetDBValue($this->f("periodicidad"));
        $this->campo_grupo->SetDBValue($this->f("grupo"));
    }
//End SetValues Method

} //End proceso_carga_archivosDataSource Class @6-FCB6E20C

//Include Page implementation @70-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsMenuMenu1 extends clsMenu { //Menu1 class @13-FEAC4CDE

//Class_Initialize Event @13-B74632F7
    function clsMenuMenu1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Menu1";
        $this->Visible = True;
        $this->controls = array();
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->ErrorBlock = "Menu Menu1";

        $this->StaticItems = array();
        $this->StaticItems[] = array("item_id" => "MenuItem2", "item_id_parent" => null, "item_caption" => "Procesos de carga", "item_url" => array("Page" => "ProcesoCargaAList.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3", "item_id_parent" => null, "item_caption" => "Layouts de procesos de carga", "item_url" => array("Page" => "DetalleLayoutList.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem1", "item_id_parent" => null, "item_caption" => "Log ultimas cargas", "item_url" => array("Page" => "UltimasCargas.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");

        $this->DataSource = new clsMenu1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->DataSource->SetProvider(array("DBLib" => "Array"));

        parent::clsMenu("item_id_parent", "item_id", null);

        $this->ItemLink = new clsControl(ccsLink, "ItemLink", "ItemLink", ccsText, "", CCGetRequestParam("ItemLink", ccsGet, NULL), $this);
        $this->controls["ItemLink"] = & $this->ItemLink;
        $this->ItemLink->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ItemLink->Page = "";
        $this->LinkStartParameters = $this->ItemLink->Parameters;
    }
//End Class_Initialize Event

//SetControlValues Method @13-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @13-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End Menu1 Class @13-FCB6E20C

//Menu1DataSource Class @13-201CC8D7
class clsMenu1DataSource extends DB_Adapter {
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;
    var $wp;
    var $Record = array();
    var $Index;
    var $FieldsList = array();

    function clsMenu1DataSource($parent) {
        $this->Parent = & $parent;
        $this->ErrorBlock = "Menu Menu1";
        $this->ItemLink = new clsField("ItemLink", ccsText, "");
        $this->FieldsList["ItemLink"] = & $this->ItemLink;
    }

    function Prepare()
    {
    }

    function Open()
    {
        $this->query($this->Parent->StaticItems);
    }

    function SetValues()
    {
        $this->ItemLink->SetDBValue($this->f("item_caption"));
    }
}
//End Menu1DataSource Class

//Initialize Page @1-5EB3C227
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
$TemplateFileName = "ProcesoCargaAList.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/menu/ccs-menu.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-DC94A87D
CCSecurityRedirect("1", "");
//End Authenticate User

//Include events file @1-EC69023B
include_once("./ProcesoCargaAList_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-6E81EFD4
$DBConnCarga = new clsDBConnCarga();
$MainPage->Connections["ConnCarga"] = & $DBConnCarga;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$proceso_carga_archivosSearch = new clsRecordproceso_carga_archivosSearch("", $MainPage);
$proceso_carga_archivos = new clsGridproceso_carga_archivos("", $MainPage);
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$Menu1 = new clsMenuMenu1("", $MainPage);
$MainPage->proceso_carga_archivosSearch = & $proceso_carga_archivosSearch;
$MainPage->proceso_carga_archivos = & $proceso_carga_archivos;
$MainPage->Header = & $Header;
$MainPage->Menu1 = & $Menu1;
$proceso_carga_archivos->Initialize();
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

//Execute Components @1-474C46BF
$Header->Operations();
$proceso_carga_archivosSearch->Operation();
//End Execute Components

//Go to destination page @1-926F635E
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnCarga->close();
    header("Location: " . $Redirect);
    unset($proceso_carga_archivosSearch);
    unset($proceso_carga_archivos);
    $Header->Class_Terminate();
    unset($Header);
    unset($Menu1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-4866DD93
$proceso_carga_archivosSearch->Show();
$proceso_carga_archivos->Show();
$Header->Show();
$Menu1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-1312C9E2
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnCarga->close();
unset($proceso_carga_archivosSearch);
unset($proceso_carga_archivos);
$Header->Class_Terminate();
unset($Header);
unset($Menu1);
unset($Tpl);
//End Unload Page


?>
