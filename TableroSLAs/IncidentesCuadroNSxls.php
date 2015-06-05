<?php
//Include Common Files @1-B64E881C
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "IncidentesCuadroNSxls.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsGridgrdIncCuadroNS { //grdIncCuadroNS class @3-21C5CCF3

//Variables @3-920EE17A

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
    public $Sorter_nombre;
    public $Sorter_severidad;
    public $Sorter_Suma;
    public $Sorter_Cumplen;
    public $Sorter_Meta;
    public $Sorter_pena;
//End Variables

//Class_Initialize Event @3-87E5F9CE
    function clsGridgrdIncCuadroNS($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdIncCuadroNS";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdIncCuadroNS";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdIncCuadroNSDataSource($this);
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
        $this->SorterName = CCGetParam("grdIncCuadroNSOrder", "");
        $this->SorterDirection = CCGetParam("grdIncCuadroNSDir", "");

        $this->nombre = new clsControl(ccsLabel, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->severidad = new clsControl(ccsLabel, "severidad", "severidad", ccsInteger, "", CCGetRequestParam("severidad", ccsGet, NULL), $this);
        $this->Suma = new clsControl(ccsLabel, "Suma", "Suma", ccsInteger, "", CCGetRequestParam("Suma", ccsGet, NULL), $this);
        $this->Suma->HTML = true;
        $this->Cumplen = new clsControl(ccsLabel, "Cumplen", "Cumplen", ccsInteger, "", CCGetRequestParam("Cumplen", ccsGet, NULL), $this);
        $this->Cumplen->HTML = true;
        $this->Meta = new clsControl(ccsLabel, "Meta", "Meta", ccsFloat, "", CCGetRequestParam("Meta", ccsGet, NULL), $this);
        $this->pena = new clsControl(ccsLabel, "pena", "pena", ccsText, "", CCGetRequestParam("pena", ccsGet, NULL), $this);
        $this->PctCumplimiento = new clsControl(ccsLabel, "PctCumplimiento", "PctCumplimiento", ccsFloat, array(False, 0, Null, "", False, "", "%", 100, True, ""), CCGetRequestParam("PctCumplimiento", ccsGet, NULL), $this);
        $this->PctCumplimiento->HTML = true;
        $this->ImgCumple = new clsControl(ccsImage, "ImgCumple", "ImgCumple", ccsText, "", CCGetRequestParam("ImgCumple", ccsGet, NULL), $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Sorter_severidad = new clsSorter($this->ComponentName, "Sorter_severidad", $FileName, $this);
        $this->Sorter_Suma = new clsSorter($this->ComponentName, "Sorter_Suma", $FileName, $this);
        $this->Sorter_Cumplen = new clsSorter($this->ComponentName, "Sorter_Cumplen", $FileName, $this);
        $this->Sorter_Meta = new clsSorter($this->ComponentName, "Sorter_Meta", $FileName, $this);
        $this->Sorter_pena = new clsSorter($this->ComponentName, "Sorter_pena", $FileName, $this);
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

//Show Method @3-F562958B
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
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
            $this->ControlsVisible["nombre"] = $this->nombre->Visible;
            $this->ControlsVisible["severidad"] = $this->severidad->Visible;
            $this->ControlsVisible["Suma"] = $this->Suma->Visible;
            $this->ControlsVisible["Cumplen"] = $this->Cumplen->Visible;
            $this->ControlsVisible["Meta"] = $this->Meta->Visible;
            $this->ControlsVisible["pena"] = $this->pena->Visible;
            $this->ControlsVisible["PctCumplimiento"] = $this->PctCumplimiento->Visible;
            $this->ControlsVisible["ImgCumple"] = $this->ImgCumple->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->severidad->SetValue($this->DataSource->severidad->GetValue());
                $this->Suma->SetValue($this->DataSource->Suma->GetValue());
                $this->Cumplen->SetValue($this->DataSource->Cumplen->GetValue());
                $this->Meta->SetValue($this->DataSource->Meta->GetValue());
                $this->pena->SetValue($this->DataSource->pena->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->nombre->Show();
                $this->severidad->Show();
                $this->Suma->Show();
                $this->Cumplen->Show();
                $this->Meta->Show();
                $this->pena->Show();
                $this->PctCumplimiento->Show();
                $this->ImgCumple->Show();
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
        $this->Sorter_nombre->Show();
        $this->Sorter_severidad->Show();
        $this->Sorter_Suma->Show();
        $this->Sorter_Cumplen->Show();
        $this->Sorter_Meta->Show();
        $this->Sorter_pena->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-384E8DA8
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->severidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Suma->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumplen->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Meta->Errors->ToString());
        $errors = ComposeStrings($errors, $this->pena->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PctCumplimiento->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgCumple->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdIncCuadroNS Class @3-FCB6E20C

class clsgrdIncCuadroNSDataSource extends clsDBcnDisenio {  //grdIncCuadroNSDataSource Class @3-6EC15916

//DataSource Variables @3-254658C4
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $nombre;
    public $severidad;
    public $Suma;
    public $Cumplen;
    public $Meta;
    public $pena;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-FDC6737F
    function clsgrdIncCuadroNSDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdIncCuadroNS";
        $this->Initialize();
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->severidad = new clsField("severidad", ccsInteger, "");
        
        $this->Suma = new clsField("Suma", ccsInteger, "");
        
        $this->Cumplen = new clsField("Cumplen", ccsInteger, "");
        
        $this->Meta = new clsField("Meta", ccsFloat, "");
        
        $this->pena = new clsField("pena", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-EAF6832C
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_nombre" => array("nombre", ""), 
            "Sorter_severidad" => array("severidad", ""), 
            "Sorter_Suma" => array("Suma", ""), 
            "Sorter_Cumplen" => array("Cumplen", ""), 
            "Sorter_Meta" => array("Meta", ""), 
            "Sorter_pena" => array("pena", "")));
    }
//End SetOrder Method

//Prepare Method @3-2027C7FB
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], date("m"), false);
        $this->wp->AddParameter("3", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], date("Y"), false);
    }
//End Prepare Method

//Open Method @3-AC8D2AFB
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select mc_c_metrica.nombre,  ''  DescSev, 0 severidad, c.Suma,  c.Cumplen,  mc_c_metrica.Meta,  mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(Cumple_DISP_SOPORTE) Suma,\n" .
        "	sum(cast(~Cast(Cumple_DISP_SOPORTE as bit) as int)) Cumplen\n" .
        "	from mc_calificacion_incidentes_MC mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor \n" .
        ") c\n" .
        "where acronimo ='DISP_SOPORTE'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, 'Severidad', c.severidad, c.Suma,  c.Cumplen,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select sv.severidad, id_proveedor,\n" .
        "	COUNT(Cumple_Inc_TiempoAsignacion) Suma,\n" .
        "	sum(cast(~CAST(Cumple_Inc_TiempoAsignacion as bit) as int)) Cumplen\n" .
        "	from (select distinct severidad  from mc_c_aplicacion) sv left join  mc_calificacion_incidentes_MC mc\n" .
        "		on mc.severidad= sv.severidad\n" .
        "	and id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor, sv.severidad   \n" .
        ") c\n" .
        "where acronimo ='Inc_TiempoAsignacion'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, 'Severidad', c.severidad,  c.Suma,  c.Cumplen,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select sv.severidad, id_proveedor,\n" .
        "	COUNT(Cumple_Inc_TiempoSolucion) Suma,\n" .
        "	sum(cast(~CAST(Cumple_Inc_TiempoSolucion as bit) as int)) Cumplen\n" .
        "	from (select distinct severidad  from mc_c_aplicacion) sv left join  mc_calificacion_incidentes_MC mc\n" .
        "		on mc.severidad= sv.severidad\n" .
        "	and id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor, sv.severidad   \n" .
        ") c\n" .
        "where acronimo ='Inc_TiempoSolucion'";
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

//SetValues Method @3-914CBE85
    function SetValues()
    {
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->severidad->SetDBValue(trim($this->f("severidad")));
        $this->Suma->SetDBValue(trim($this->f("Suma")));
        $this->Cumplen->SetDBValue(trim($this->f("Cumplen")));
        $this->Meta->SetDBValue(trim($this->f("Meta")));
        $this->pena->SetDBValue($this->f("pena"));
    }
//End SetValues Method

} //End grdIncCuadroNSDataSource Class @3-FCB6E20C

class clsRecordmc_calificacion_incidente { //mc_calificacion_incidente Class @21-984935C7

//Variables @21-9E315808

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

//Class_Initialize Event @21-7F7D4197
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
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_calificacion_incidente";
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
            $this->s_id_proveedor->DataSource->Parameters["expr27"] = 'CDS';
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "expr27", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["expr27"], "", false);
            $this->s_id_proveedor->DataSource->wp->Criterion[1] = $this->s_id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_id_proveedor->DataSource->wp->GetDBValue("1"), $this->s_id_proveedor->DataSource->ToSQL($this->s_id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_id_proveedor->DataSource->Where = 
                 $this->s_id_proveedor->DataSource->wp->Criterion[1];
            $this->s_MesReporte = new clsControl(ccsListBox, "s_MesReporte", "Mes Reporte", ccsInteger, "", CCGetRequestParam("s_MesReporte", $Method, NULL), $this);
            $this->s_MesReporte->DSType = dsTable;
            $this->s_MesReporte->DataSource = new clsDBcnDisenio();
            $this->s_MesReporte->ds = & $this->s_MesReporte->DataSource;
            $this->s_MesReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_MesReporte->BoundColumn, $this->s_MesReporte->TextColumn, $this->s_MesReporte->DBFormat) = array("IdMes", "Mes", "");
            $this->s_AnioReporte = new clsControl(ccsListBox, "s_AnioReporte", "Anio Reporte", ccsInteger, "", CCGetRequestParam("s_AnioReporte", $Method, NULL), $this);
            $this->s_AnioReporte->DSType = dsTable;
            $this->s_AnioReporte->DataSource = new clsDBcnDisenio();
            $this->s_AnioReporte->ds = & $this->s_AnioReporte->DataSource;
            $this->s_AnioReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_AnioReporte->BoundColumn, $this->s_AnioReporte->TextColumn, $this->s_AnioReporte->DBFormat) = array("Ano", "Ano", "");
            $this->s_AnioReporte->DataSource->Parameters["expr72"] = 2013;
            $this->s_AnioReporte->DataSource->wp = new clsSQLParameters();
            $this->s_AnioReporte->DataSource->wp->AddParameter("1", "expr72", ccsInteger, "", "", $this->s_AnioReporte->DataSource->Parameters["expr72"], "", false);
            $this->s_AnioReporte->DataSource->wp->Criterion[1] = $this->s_AnioReporte->DataSource->wp->Operation(opGreaterThan, "[Ano]", $this->s_AnioReporte->DataSource->wp->GetDBValue("1"), $this->s_AnioReporte->DataSource->ToSQL($this->s_AnioReporte->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->s_AnioReporte->DataSource->Where = 
                 $this->s_AnioReporte->DataSource->wp->Criterion[1];
        }
    }
//End Class_Initialize Event

//Validate Method @21-713777E7
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

//CheckErrors Method @21-F92AA8F5
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

//Operation Method @21-DD94EE4C
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

//Show Method @21-7342DCBE
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

} //End mc_calificacion_incidente Class @21-FCB6E20C

//Include Page implementation @37-1C97D460
include_once(RelativePath . "/MenuTablero.php");
//End Include Page implementation

class clsGridgrdIncCuadroNS1 { //grdIncCuadroNS1 class @40-3BD686DC

//Variables @40-920EE17A

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
    public $Sorter_nombre;
    public $Sorter_severidad;
    public $Sorter_Suma;
    public $Sorter_Cumplen;
    public $Sorter_Meta;
    public $Sorter_pena;
//End Variables

//Class_Initialize Event @40-7E2F1F62
    function clsGridgrdIncCuadroNS1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdIncCuadroNS1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdIncCuadroNS1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdIncCuadroNS1DataSource($this);
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
        $this->SorterName = CCGetParam("grdIncCuadroNS1Order", "");
        $this->SorterDirection = CCGetParam("grdIncCuadroNS1Dir", "");

        $this->nombre = new clsControl(ccsLabel, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->severidad = new clsControl(ccsLabel, "severidad", "severidad", ccsInteger, "", CCGetRequestParam("severidad", ccsGet, NULL), $this);
        $this->Suma = new clsControl(ccsLabel, "Suma", "Suma", ccsInteger, "", CCGetRequestParam("Suma", ccsGet, NULL), $this);
        $this->Suma->HTML = true;
        $this->Cumplen = new clsControl(ccsLabel, "Cumplen", "Cumplen", ccsInteger, "", CCGetRequestParam("Cumplen", ccsGet, NULL), $this);
        $this->Cumplen->HTML = true;
        $this->Meta = new clsControl(ccsLabel, "Meta", "Meta", ccsFloat, "", CCGetRequestParam("Meta", ccsGet, NULL), $this);
        $this->pena = new clsControl(ccsLabel, "pena", "pena", ccsText, "", CCGetRequestParam("pena", ccsGet, NULL), $this);
        $this->PctCumplimiento = new clsControl(ccsLabel, "PctCumplimiento", "PctCumplimiento", ccsFloat, array(False, 0, Null, "", False, "", "%", 100, True, ""), CCGetRequestParam("PctCumplimiento", ccsGet, NULL), $this);
        $this->PctCumplimiento->HTML = true;
        $this->ImgCumple = new clsControl(ccsImage, "ImgCumple", "ImgCumple", ccsText, "", CCGetRequestParam("ImgCumple", ccsGet, NULL), $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Sorter_severidad = new clsSorter($this->ComponentName, "Sorter_severidad", $FileName, $this);
        $this->Sorter_Suma = new clsSorter($this->ComponentName, "Sorter_Suma", $FileName, $this);
        $this->Sorter_Cumplen = new clsSorter($this->ComponentName, "Sorter_Cumplen", $FileName, $this);
        $this->Sorter_Meta = new clsSorter($this->ComponentName, "Sorter_Meta", $FileName, $this);
        $this->Sorter_pena = new clsSorter($this->ComponentName, "Sorter_pena", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @40-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @40-F562958B
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
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
            $this->ControlsVisible["nombre"] = $this->nombre->Visible;
            $this->ControlsVisible["severidad"] = $this->severidad->Visible;
            $this->ControlsVisible["Suma"] = $this->Suma->Visible;
            $this->ControlsVisible["Cumplen"] = $this->Cumplen->Visible;
            $this->ControlsVisible["Meta"] = $this->Meta->Visible;
            $this->ControlsVisible["pena"] = $this->pena->Visible;
            $this->ControlsVisible["PctCumplimiento"] = $this->PctCumplimiento->Visible;
            $this->ControlsVisible["ImgCumple"] = $this->ImgCumple->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->severidad->SetValue($this->DataSource->severidad->GetValue());
                $this->Suma->SetValue($this->DataSource->Suma->GetValue());
                $this->Cumplen->SetValue($this->DataSource->Cumplen->GetValue());
                $this->Meta->SetValue($this->DataSource->Meta->GetValue());
                $this->pena->SetValue($this->DataSource->pena->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->nombre->Show();
                $this->severidad->Show();
                $this->Suma->Show();
                $this->Cumplen->Show();
                $this->Meta->Show();
                $this->pena->Show();
                $this->PctCumplimiento->Show();
                $this->ImgCumple->Show();
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
        $this->Sorter_nombre->Show();
        $this->Sorter_severidad->Show();
        $this->Sorter_Suma->Show();
        $this->Sorter_Cumplen->Show();
        $this->Sorter_Meta->Show();
        $this->Sorter_pena->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @40-384E8DA8
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->severidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Suma->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumplen->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Meta->Errors->ToString());
        $errors = ComposeStrings($errors, $this->pena->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PctCumplimiento->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImgCumple->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdIncCuadroNS1 Class @40-FCB6E20C

class clsgrdIncCuadroNS1DataSource extends clsDBcnDisenio {  //grdIncCuadroNS1DataSource Class @40-B4B08D6F

//DataSource Variables @40-254658C4
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $nombre;
    public $severidad;
    public $Suma;
    public $Cumplen;
    public $Meta;
    public $pena;
//End DataSource Variables

//DataSourceClass_Initialize Event @40-8F2AF6AF
    function clsgrdIncCuadroNS1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdIncCuadroNS1";
        $this->Initialize();
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->severidad = new clsField("severidad", ccsInteger, "");
        
        $this->Suma = new clsField("Suma", ccsInteger, "");
        
        $this->Cumplen = new clsField("Cumplen", ccsInteger, "");
        
        $this->Meta = new clsField("Meta", ccsFloat, "");
        
        $this->pena = new clsField("pena", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @40-EAF6832C
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_nombre" => array("nombre", ""), 
            "Sorter_severidad" => array("severidad", ""), 
            "Sorter_Suma" => array("Suma", ""), 
            "Sorter_Cumplen" => array("Cumplen", ""), 
            "Sorter_Meta" => array("Meta", ""), 
            "Sorter_pena" => array("pena", "")));
    }
//End SetOrder Method

//Prepare Method @40-2027C7FB
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], date("m"), false);
        $this->wp->AddParameter("3", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], date("Y"), false);
    }
//End Prepare Method

//Open Method @40-189AB25E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (\n" .
        "select mc_c_metrica.nombre,  ''  DescSev, 0 severidad, c.Suma,  c.Cumplen,  mc_c_metrica.Meta,  mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(Cumple_DISP_SOPORTE) Suma,\n" .
        "	sum(cast(~Cast(Cumple_DISP_SOPORTE as bit) as int)) Cumplen\n" .
        "	from mc_calificacion_incidentes_SAT mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor \n" .
        ") c\n" .
        "where acronimo ='DISP_SOPORTE'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, 'Severidad', c.severidad, c.Suma,  c.Cumplen,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select sv.severidad, id_proveedor,\n" .
        "	COUNT(Cumple_Inc_TiempoAsignacion) Suma,\n" .
        "	sum(cast(~CAST(Cumple_Inc_TiempoAsignacion as bit) as int)) Cumplen\n" .
        "	from (select distinct severidad  from mc_c_aplicacion) sv left join  mc_calificacion_incidentes_SAT mc\n" .
        "		on mc.severidad= sv.severidad\n" .
        "	and id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor, sv.severidad   \n" .
        ") c\n" .
        "where acronimo ='Inc_TiempoAsignacion'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, 'Severidad', c.severidad,  c.Suma,  c.Cumplen,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select sv.severidad, id_proveedor,\n" .
        "	COUNT(Cumple_Inc_TiempoSolucion) Suma,\n" .
        "	sum(cast(~CAST(Cumple_Inc_TiempoSolucion as bit) as int)) Cumplen\n" .
        "	from (select distinct severidad  from mc_c_aplicacion) sv left join  mc_calificacion_incidentes_SAt mc\n" .
        "		on mc.severidad= sv.severidad\n" .
        "	and id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor, sv.severidad   \n" .
        ") c\n" .
        "where acronimo ='Inc_TiempoSolucion') cnt";
        $this->SQL = "\n" .
        "select mc_c_metrica.nombre,  ''  DescSev, 0 severidad, c.Suma,  c.Cumplen,  mc_c_metrica.Meta,  mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(Cumple_DISP_SOPORTE) Suma,\n" .
        "	sum(cast(~Cast(Cumple_DISP_SOPORTE as bit) as int)) Cumplen\n" .
        "	from mc_calificacion_incidentes_SAT mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor \n" .
        ") c\n" .
        "where acronimo ='DISP_SOPORTE'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, 'Severidad', c.severidad, c.Suma,  c.Cumplen,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select sv.severidad, id_proveedor,\n" .
        "	COUNT(Cumple_Inc_TiempoAsignacion) Suma,\n" .
        "	sum(cast(~CAST(Cumple_Inc_TiempoAsignacion as bit) as int)) Cumplen\n" .
        "	from (select distinct severidad  from mc_c_aplicacion) sv left join  mc_calificacion_incidentes_SAT mc\n" .
        "		on mc.severidad= sv.severidad\n" .
        "	and id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor, sv.severidad   \n" .
        ") c\n" .
        "where acronimo ='Inc_TiempoAsignacion'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, 'Severidad', c.severidad,  c.Suma,  c.Cumplen,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select sv.severidad, id_proveedor,\n" .
        "	COUNT(Cumple_Inc_TiempoSolucion) Suma,\n" .
        "	sum(cast(~CAST(Cumple_Inc_TiempoSolucion as bit) as int)) Cumplen\n" .
        "	from (select distinct severidad  from mc_c_aplicacion) sv left join  mc_calificacion_incidentes_SAt mc\n" .
        "		on mc.severidad= sv.severidad\n" .
        "	and id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_incidente not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor, sv.severidad   \n" .
        ") c\n" .
        "where acronimo ='Inc_TiempoSolucion'";
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

//SetValues Method @40-914CBE85
    function SetValues()
    {
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->severidad->SetDBValue(trim($this->f("severidad")));
        $this->Suma->SetDBValue(trim($this->f("Suma")));
        $this->Cumplen->SetDBValue(trim($this->f("Cumplen")));
        $this->Meta->SetDBValue(trim($this->f("Meta")));
        $this->pena->SetDBValue($this->f("pena"));
    }
//End SetValues Method

} //End grdIncCuadroNS1DataSource Class @40-FCB6E20C

//Initialize Page @1-EDC46FCC
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
$TemplateFileName = "IncidentesCuadroNSxls.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-ED7CB2E0
CCSecurityRedirect("2", "");
//End Authenticate User

//Include events file @1-D9D0A4DE
include_once("./IncidentesCuadroNSxls_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-1C637AD7
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$grdIncCuadroNS = new clsGridgrdIncCuadroNS("", $MainPage);
$mc_calificacion_incidente = new clsRecordmc_calificacion_incidente("", $MainPage);
$MenuTablero = new clsMenuTablero("", "MenuTablero", $MainPage);
$MenuTablero->Initialize();
$grdIncCuadroNS1 = new clsGridgrdIncCuadroNS1("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->grdIncCuadroNS = & $grdIncCuadroNS;
$MainPage->mc_calificacion_incidente = & $mc_calificacion_incidente;
$MainPage->MenuTablero = & $MenuTablero;
$MainPage->grdIncCuadroNS1 = & $grdIncCuadroNS1;
$grdIncCuadroNS->Initialize();
$grdIncCuadroNS1->Initialize();
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

//Execute Components @1-38ED92D2
$MenuTablero->Operations();
$mc_calificacion_incidente->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-859B207E
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($grdIncCuadroNS);
    unset($mc_calificacion_incidente);
    $MenuTablero->Class_Terminate();
    unset($MenuTablero);
    unset($grdIncCuadroNS1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-74B5C13C
$Header->Show();
$grdIncCuadroNS->Show();
$mc_calificacion_incidente->Show();
$MenuTablero->Show();
$grdIncCuadroNS1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-DA4A54EF
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($grdIncCuadroNS);
unset($mc_calificacion_incidente);
$MenuTablero->Class_Terminate();
unset($MenuTablero);
unset($grdIncCuadroNS1);
unset($Tpl);
//End Unload Page


?>
