<?php
//Include Common Files @1-F85B203F
define("RelativePath", "..");
define("PathToCurrentPage", "/ConfigDeCargas/");
define("FileName", "DetalleLayoutList.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecorddetalle_layoutSearch { //detalle_layoutSearch Class @2-D2C0DD93

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

//Class_Initialize Event @2-6DC5D191
    function clsRecorddetalle_layoutSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record detalle_layoutSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "detalle_layoutSearch";
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
            $this->detalle_layout_list = new clsControl(ccsLink, "detalle_layout_list", "detalle_layout_list", ccsText, "", CCGetRequestParam("detalle_layout_list", $Method, NULL), $this);
            $this->detalle_layout_list->Page = "DetalleLayoutList.php";
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

//CheckErrors Method @2-8758511E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->detalle_layout_list->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-240AC2DC
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
        $Redirect = "DetalleLayoutList.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "DetalleLayoutList.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @2-DEEDB065
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
            $Error = ComposeStrings($Error, $this->detalle_layout_list->Errors->ToString());
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
        $this->detalle_layout_list->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End detalle_layoutSearch Class @2-FCB6E20C

class clsGriddetalle_layout { //detalle_layout class @6-1DF62577

//Variables @6-36EFAF11

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
    public $Sorter_id_detalle_layout;
    public $Sorter_cve_carga;
    public $Sorter_nombre_columna_tabla;
    public $Sorter_num_columna_excel;
    public $Sorter_tipo_columna;
    public $Sorter_acepta_nulo;
    public $Sorter_dato_indispensable;
    public $Sorter_valor_x_default;
//End Variables

//Class_Initialize Event @6-E8669B80
    function clsGriddetalle_layout($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "detalle_layout";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid detalle_layout";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsdetalle_layoutDataSource($this);
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
        $this->SorterName = CCGetParam("detalle_layoutOrder", "");
        $this->SorterDirection = CCGetParam("detalle_layoutDir", "");

        $this->id_detalle_layout = new clsControl(ccsLink, "id_detalle_layout", "id_detalle_layout", ccsInteger, "", CCGetRequestParam("id_detalle_layout", ccsGet, NULL), $this);
        $this->id_detalle_layout->Page = "DetalleLayoutMaint.php";
        $this->cve_carga = new clsControl(ccsLabel, "cve_carga", "cve_carga", ccsText, "", CCGetRequestParam("cve_carga", ccsGet, NULL), $this);
        $this->nombre_columna_tabla = new clsControl(ccsLabel, "nombre_columna_tabla", "nombre_columna_tabla", ccsText, "", CCGetRequestParam("nombre_columna_tabla", ccsGet, NULL), $this);
        $this->num_columna_excel = new clsControl(ccsLabel, "num_columna_excel", "num_columna_excel", ccsText, "", CCGetRequestParam("num_columna_excel", ccsGet, NULL), $this);
        $this->tipo_columna = new clsControl(ccsLabel, "tipo_columna", "tipo_columna", ccsText, "", CCGetRequestParam("tipo_columna", ccsGet, NULL), $this);
        $this->acepta_nulo = new clsControl(ccsLabel, "acepta_nulo", "acepta_nulo", ccsText, "", CCGetRequestParam("acepta_nulo", ccsGet, NULL), $this);
        $this->dato_indispensable = new clsControl(ccsLabel, "dato_indispensable", "dato_indispensable", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("dato_indispensable", ccsGet, NULL), $this);
        $this->valor_x_default = new clsControl(ccsLabel, "valor_x_default", "valor_x_default", ccsText, "", CCGetRequestParam("valor_x_default", ccsGet, NULL), $this);
        $this->detalle_layout_Insert = new clsControl(ccsLink, "detalle_layout_Insert", "detalle_layout_Insert", ccsText, "", CCGetRequestParam("detalle_layout_Insert", ccsGet, NULL), $this);
        $this->detalle_layout_Insert->Parameters = CCGetQueryString("QueryString", array("id_detalle_layout", "ccsForm"));
        $this->detalle_layout_Insert->Page = "DetalleLayoutMaint.php";
        $this->Sorter_id_detalle_layout = new clsSorter($this->ComponentName, "Sorter_id_detalle_layout", $FileName, $this);
        $this->Sorter_cve_carga = new clsSorter($this->ComponentName, "Sorter_cve_carga", $FileName, $this);
        $this->Sorter_nombre_columna_tabla = new clsSorter($this->ComponentName, "Sorter_nombre_columna_tabla", $FileName, $this);
        $this->Sorter_num_columna_excel = new clsSorter($this->ComponentName, "Sorter_num_columna_excel", $FileName, $this);
        $this->Sorter_tipo_columna = new clsSorter($this->ComponentName, "Sorter_tipo_columna", $FileName, $this);
        $this->Sorter_acepta_nulo = new clsSorter($this->ComponentName, "Sorter_acepta_nulo", $FileName, $this);
        $this->Sorter_dato_indispensable = new clsSorter($this->ComponentName, "Sorter_dato_indispensable", $FileName, $this);
        $this->Sorter_valor_x_default = new clsSorter($this->ComponentName, "Sorter_valor_x_default", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
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

//Show Method @6-BE6CE788
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
            $this->ControlsVisible["id_detalle_layout"] = $this->id_detalle_layout->Visible;
            $this->ControlsVisible["cve_carga"] = $this->cve_carga->Visible;
            $this->ControlsVisible["nombre_columna_tabla"] = $this->nombre_columna_tabla->Visible;
            $this->ControlsVisible["num_columna_excel"] = $this->num_columna_excel->Visible;
            $this->ControlsVisible["tipo_columna"] = $this->tipo_columna->Visible;
            $this->ControlsVisible["acepta_nulo"] = $this->acepta_nulo->Visible;
            $this->ControlsVisible["dato_indispensable"] = $this->dato_indispensable->Visible;
            $this->ControlsVisible["valor_x_default"] = $this->valor_x_default->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->id_detalle_layout->SetValue($this->DataSource->id_detalle_layout->GetValue());
                $this->id_detalle_layout->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->id_detalle_layout->Parameters = CCAddParam($this->id_detalle_layout->Parameters, "id_detalle_layout", $this->DataSource->f("id_detalle_layout"));
                $this->cve_carga->SetValue($this->DataSource->cve_carga->GetValue());
                $this->nombre_columna_tabla->SetValue($this->DataSource->nombre_columna_tabla->GetValue());
                $this->num_columna_excel->SetValue($this->DataSource->num_columna_excel->GetValue());
                $this->tipo_columna->SetValue($this->DataSource->tipo_columna->GetValue());
                $this->acepta_nulo->SetValue($this->DataSource->acepta_nulo->GetValue());
                $this->dato_indispensable->SetValue($this->DataSource->dato_indispensable->GetValue());
                $this->valor_x_default->SetValue($this->DataSource->valor_x_default->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id_detalle_layout->Show();
                $this->cve_carga->Show();
                $this->nombre_columna_tabla->Show();
                $this->num_columna_excel->Show();
                $this->tipo_columna->Show();
                $this->acepta_nulo->Show();
                $this->dato_indispensable->Show();
                $this->valor_x_default->Show();
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
        $this->detalle_layout_Insert->Show();
        $this->Sorter_id_detalle_layout->Show();
        $this->Sorter_cve_carga->Show();
        $this->Sorter_nombre_columna_tabla->Show();
        $this->Sorter_num_columna_excel->Show();
        $this->Sorter_tipo_columna->Show();
        $this->Sorter_acepta_nulo->Show();
        $this->Sorter_dato_indispensable->Show();
        $this->Sorter_valor_x_default->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @6-F6FA07FD
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->id_detalle_layout->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cve_carga->Errors->ToString());
        $errors = ComposeStrings($errors, $this->nombre_columna_tabla->Errors->ToString());
        $errors = ComposeStrings($errors, $this->num_columna_excel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->tipo_columna->Errors->ToString());
        $errors = ComposeStrings($errors, $this->acepta_nulo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->dato_indispensable->Errors->ToString());
        $errors = ComposeStrings($errors, $this->valor_x_default->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End detalle_layout Class @6-FCB6E20C

class clsdetalle_layoutDataSource extends clsDBConnCarga {  //detalle_layoutDataSource Class @6-DE459E83

//DataSource Variables @6-BF16D0DE
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $id_detalle_layout;
    public $cve_carga;
    public $nombre_columna_tabla;
    public $num_columna_excel;
    public $tipo_columna;
    public $acepta_nulo;
    public $dato_indispensable;
    public $valor_x_default;
//End DataSource Variables

//DataSourceClass_Initialize Event @6-18D96B74
    function clsdetalle_layoutDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid detalle_layout";
        $this->Initialize();
        $this->id_detalle_layout = new clsField("id_detalle_layout", ccsInteger, "");
        
        $this->cve_carga = new clsField("cve_carga", ccsText, "");
        
        $this->nombre_columna_tabla = new clsField("nombre_columna_tabla", ccsText, "");
        
        $this->num_columna_excel = new clsField("num_columna_excel", ccsText, "");
        
        $this->tipo_columna = new clsField("tipo_columna", ccsText, "");
        
        $this->acepta_nulo = new clsField("acepta_nulo", ccsText, "");
        
        $this->dato_indispensable = new clsField("dato_indispensable", ccsBoolean, $this->BooleanFormat);
        
        $this->valor_x_default = new clsField("valor_x_default", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @6-18BC7A2B
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_id_detalle_layout" => array("id_detalle_layout", ""), 
            "Sorter_cve_carga" => array("cve_carga", ""), 
            "Sorter_nombre_columna_tabla" => array("nombre_columna_tabla", ""), 
            "Sorter_num_columna_excel" => array("num_columna_excel", ""), 
            "Sorter_tipo_columna" => array("tipo_columna", ""), 
            "Sorter_acepta_nulo" => array("acepta_nulo", ""), 
            "Sorter_dato_indispensable" => array("dato_indispensable", ""), 
            "Sorter_valor_x_default" => array("valor_x_default", "")));
    }
//End SetOrder Method

//Prepare Method @6-45DCE537
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("3", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("4", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("5", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("6", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "cve_carga", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "nombre_columna_tabla", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "num_columna_excel", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "tipo_columna", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opContains, "acepta_nulo", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "valor_x_default", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->Where = $this->wp->opOR(
             true, $this->wp->opOR(
             false, $this->wp->opOR(
             false, $this->wp->opOR(
             false, $this->wp->opOR(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]);
    }
//End Prepare Method

//Open Method @6-DC1E4EC1
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM detalle_layout";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} id_detalle_layout, cve_carga, nombre_columna_tabla, num_columna_excel, tipo_columna, acepta_nulo, dato_indispensable, valor_x_default \n\n" .
        "FROM detalle_layout {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @6-4171E6BD
    function SetValues()
    {
        $this->id_detalle_layout->SetDBValue(trim($this->f("id_detalle_layout")));
        $this->cve_carga->SetDBValue($this->f("cve_carga"));
        $this->nombre_columna_tabla->SetDBValue($this->f("nombre_columna_tabla"));
        $this->num_columna_excel->SetDBValue($this->f("num_columna_excel"));
        $this->tipo_columna->SetDBValue($this->f("tipo_columna"));
        $this->acepta_nulo->SetDBValue($this->f("acepta_nulo"));
        $this->dato_indispensable->SetDBValue(trim($this->f("dato_indispensable")));
        $this->valor_x_default->SetDBValue($this->f("valor_x_default"));
    }
//End SetValues Method

} //End detalle_layoutDataSource Class @6-FCB6E20C

//Include Page implementation @43-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsMenuMenu1 extends clsMenu { //Menu1 class @53-FEAC4CDE

//Class_Initialize Event @53-391691DD
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
        $this->StaticItems[] = array("item_id" => "MenuItem4", "item_id_parent" => null, "item_caption" => "Ejecutar Carga", "item_url" => array("Page" => "ExecCarga.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");

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

//SetControlValues Method @53-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @53-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End Menu1 Class @53-FCB6E20C

//Menu1DataSource Class @53-201CC8D7
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

//Initialize Page @1-B31C82E7
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
$TemplateFileName = "DetalleLayoutList.html";
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

//Include events file @1-A6511C40
include_once("./DetalleLayoutList_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-51E22B30
$DBConnCarga = new clsDBConnCarga();
$MainPage->Connections["ConnCarga"] = & $DBConnCarga;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$detalle_layoutSearch = new clsRecorddetalle_layoutSearch("", $MainPage);
$detalle_layout = new clsGriddetalle_layout("", $MainPage);
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$Menu1 = new clsMenuMenu1("", $MainPage);
$MainPage->detalle_layoutSearch = & $detalle_layoutSearch;
$MainPage->detalle_layout = & $detalle_layout;
$MainPage->Header = & $Header;
$MainPage->Menu1 = & $Menu1;
$detalle_layout->Initialize();
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

//Execute Components @1-94343D88
$Header->Operations();
$detalle_layoutSearch->Operation();
//End Execute Components

//Go to destination page @1-0DA8B532
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnCarga->close();
    header("Location: " . $Redirect);
    unset($detalle_layoutSearch);
    unset($detalle_layout);
    $Header->Class_Terminate();
    unset($Header);
    unset($Menu1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-8462E552
$detalle_layoutSearch->Show();
$detalle_layout->Show();
$Header->Show();
$Menu1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-62D753A9
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnCarga->close();
unset($detalle_layoutSearch);
unset($detalle_layout);
$Header->Class_Terminate();
unset($Header);
unset($Menu1);
unset($Tpl);
//End Unload Page


?>
