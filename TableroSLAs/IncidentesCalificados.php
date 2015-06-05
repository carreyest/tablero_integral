<?php
//Include Common Files @1-0EB1030B
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "IncidentesCalificados.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridgrdIncidentes { //grdIncidentes class @2-71CDBF74

//Variables @2-816CD2C3

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
    public $Sorter_servicio;
    public $Sorter_id_incidente;
    public $Sorter_Cumple_DISP_SOPORTE;
    public $Sorter_Cumple_Inc_TiempoAsignacion;
    public $Sorter_Cumple_Inc_TiempoSolucion;
    public $Sorter_Obs_Proceso;
    public $Sorter_descartar;
    public $Sorter_Paquete;
    public $Sorter_severidad;
//End Variables

//Class_Initialize Event @2-74ECFD0E
    function clsGridgrdIncidentes($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdIncidentes";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdIncidentes";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdIncidentesDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 25;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("grdIncidentesOrder", "");
        $this->SorterDirection = CCGetParam("grdIncidentesDir", "");

        $this->nombre = new clsControl(ccsLabel, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->servicio = new clsControl(ccsLabel, "servicio", "servicio", ccsText, "", CCGetRequestParam("servicio", ccsGet, NULL), $this);
        $this->id_incidente = new clsControl(ccsLink, "id_incidente", "id_incidente", ccsText, "", CCGetRequestParam("id_incidente", ccsGet, NULL), $this);
        $this->id_incidente->Page = "CalificaIncidenteCAPC.php";
        $this->Cumple_DISP_SOPORTE = new clsControl(ccsLabel, "Cumple_DISP_SOPORTE", "Cumple_DISP_SOPORTE", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("Cumple_DISP_SOPORTE", ccsGet, NULL), $this);
        $this->Cumple_Inc_TiempoAsignacion = new clsControl(ccsLabel, "Cumple_Inc_TiempoAsignacion", "Cumple_Inc_TiempoAsignacion", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("Cumple_Inc_TiempoAsignacion", ccsGet, NULL), $this);
        $this->Cumple_Inc_TiempoSolucion = new clsControl(ccsLabel, "Cumple_Inc_TiempoSolucion", "Cumple_Inc_TiempoSolucion", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("Cumple_Inc_TiempoSolucion", ccsGet, NULL), $this);
        $this->Obs_Proceso = new clsControl(ccsLabel, "Obs_Proceso", "Obs_Proceso", ccsText, "", CCGetRequestParam("Obs_Proceso", ccsGet, NULL), $this);
        $this->descartar = new clsControl(ccsLabel, "descartar", "descartar", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("descartar", ccsGet, NULL), $this);
        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", CCGetRequestParam("Paquete", ccsGet, NULL), $this);
        $this->severidad = new clsControl(ccsLabel, "severidad", "severidad", ccsInteger, "", CCGetRequestParam("severidad", ccsGet, NULL), $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Sorter_servicio = new clsSorter($this->ComponentName, "Sorter_servicio", $FileName, $this);
        $this->Sorter_id_incidente = new clsSorter($this->ComponentName, "Sorter_id_incidente", $FileName, $this);
        $this->Sorter_Cumple_DISP_SOPORTE = new clsSorter($this->ComponentName, "Sorter_Cumple_DISP_SOPORTE", $FileName, $this);
        $this->Sorter_Cumple_Inc_TiempoAsignacion = new clsSorter($this->ComponentName, "Sorter_Cumple_Inc_TiempoAsignacion", $FileName, $this);
        $this->Sorter_Cumple_Inc_TiempoSolucion = new clsSorter($this->ComponentName, "Sorter_Cumple_Inc_TiempoSolucion", $FileName, $this);
        $this->Sorter_Obs_Proceso = new clsSorter($this->ComponentName, "Sorter_Obs_Proceso", $FileName, $this);
        $this->Sorter_descartar = new clsSorter($this->ComponentName, "Sorter_descartar", $FileName, $this);
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
        $this->Sorter_severidad = new clsSorter($this->ComponentName, "Sorter_severidad", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
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

//Show Method @2-DBC36991
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_incidente"] = CCGetFromGet("s_id_incidente", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_severidad"] = CCGetFromGet("s_severidad", NULL);
        $this->DataSource->Parameters["urls_descartar"] = CCGetFromGet("s_descartar", NULL);
        $this->DataSource->Parameters["urls_Paquete"] = CCGetFromGet("s_Paquete", NULL);
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
            $this->ControlsVisible["servicio"] = $this->servicio->Visible;
            $this->ControlsVisible["id_incidente"] = $this->id_incidente->Visible;
            $this->ControlsVisible["Cumple_DISP_SOPORTE"] = $this->Cumple_DISP_SOPORTE->Visible;
            $this->ControlsVisible["Cumple_Inc_TiempoAsignacion"] = $this->Cumple_Inc_TiempoAsignacion->Visible;
            $this->ControlsVisible["Cumple_Inc_TiempoSolucion"] = $this->Cumple_Inc_TiempoSolucion->Visible;
            $this->ControlsVisible["Obs_Proceso"] = $this->Obs_Proceso->Visible;
            $this->ControlsVisible["descartar"] = $this->descartar->Visible;
            $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
            $this->ControlsVisible["severidad"] = $this->severidad->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->servicio->SetValue($this->DataSource->servicio->GetValue());
                $this->id_incidente->SetValue($this->DataSource->id_incidente->GetValue());
                $this->id_incidente->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->id_incidente->Parameters = CCAddParam($this->id_incidente->Parameters, "id_incidente", $this->DataSource->f("id_incidente"));
                $this->Cumple_DISP_SOPORTE->SetValue($this->DataSource->Cumple_DISP_SOPORTE->GetValue());
                $this->Cumple_Inc_TiempoAsignacion->SetValue($this->DataSource->Cumple_Inc_TiempoAsignacion->GetValue());
                $this->Cumple_Inc_TiempoSolucion->SetValue($this->DataSource->Cumple_Inc_TiempoSolucion->GetValue());
                $this->Obs_Proceso->SetValue($this->DataSource->Obs_Proceso->GetValue());
                $this->descartar->SetValue($this->DataSource->descartar->GetValue());
                $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                $this->severidad->SetValue($this->DataSource->severidad->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->nombre->Show();
                $this->servicio->Show();
                $this->id_incidente->Show();
                $this->Cumple_DISP_SOPORTE->Show();
                $this->Cumple_Inc_TiempoAsignacion->Show();
                $this->Cumple_Inc_TiempoSolucion->Show();
                $this->Obs_Proceso->Show();
                $this->descartar->Show();
                $this->Paquete->Show();
                $this->severidad->Show();
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
        $this->Sorter_servicio->Show();
        $this->Sorter_id_incidente->Show();
        $this->Sorter_Cumple_DISP_SOPORTE->Show();
        $this->Sorter_Cumple_Inc_TiempoAsignacion->Show();
        $this->Sorter_Cumple_Inc_TiempoSolucion->Show();
        $this->Sorter_Obs_Proceso->Show();
        $this->Sorter_descartar->Show();
        $this->Sorter_Paquete->Show();
        $this->Sorter_severidad->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-60099E72
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->servicio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_incidente->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumple_DISP_SOPORTE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumple_Inc_TiempoAsignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumple_Inc_TiempoSolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Obs_Proceso->Errors->ToString());
        $errors = ComposeStrings($errors, $this->descartar->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Paquete->Errors->ToString());
        $errors = ComposeStrings($errors, $this->severidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdIncidentes Class @2-FCB6E20C

class clsgrdIncidentesDataSource extends clsDBcnDisenio {  //grdIncidentesDataSource Class @2-7603C401

//DataSource Variables @2-3D7F8871
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $nombre;
    public $servicio;
    public $id_incidente;
    public $Cumple_DISP_SOPORTE;
    public $Cumple_Inc_TiempoAsignacion;
    public $Cumple_Inc_TiempoSolucion;
    public $Obs_Proceso;
    public $descartar;
    public $Paquete;
    public $severidad;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-D43335AB
    function clsgrdIncidentesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdIncidentes";
        $this->Initialize();
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->servicio = new clsField("servicio", ccsText, "");
        
        $this->id_incidente = new clsField("id_incidente", ccsText, "");
        
        $this->Cumple_DISP_SOPORTE = new clsField("Cumple_DISP_SOPORTE", ccsBoolean, $this->BooleanFormat);
        
        $this->Cumple_Inc_TiempoAsignacion = new clsField("Cumple_Inc_TiempoAsignacion", ccsBoolean, $this->BooleanFormat);
        
        $this->Cumple_Inc_TiempoSolucion = new clsField("Cumple_Inc_TiempoSolucion", ccsBoolean, $this->BooleanFormat);
        
        $this->Obs_Proceso = new clsField("Obs_Proceso", ccsText, "");
        
        $this->descartar = new clsField("descartar", ccsBoolean, $this->BooleanFormat);
        
        $this->Paquete = new clsField("Paquete", ccsText, "");
        
        $this->severidad = new clsField("severidad", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-BC3AA950
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_nombre" => array("nombre", ""), 
            "Sorter_servicio" => array("servicio", ""), 
            "Sorter_id_incidente" => array("id_incidente", ""), 
            "Sorter_Cumple_DISP_SOPORTE" => array("Cumple_DISP_SOPORTE", ""), 
            "Sorter_Cumple_Inc_TiempoAsignacion" => array("Cumple_Inc_TiempoAsignacion", ""), 
            "Sorter_Cumple_Inc_TiempoSolucion" => array("Cumple_Inc_TiempoSolucion", ""), 
            "Sorter_Obs_Proceso" => array("Obs_Proceso", ""), 
            "Sorter_descartar" => array("descartar", ""), 
            "Sorter_Paquete" => array("Paquete", ""), 
            "Sorter_severidad" => array("severidad", "")));
    }
//End SetOrder Method

//Prepare Method @2-1EB47587
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_incidente", ccsText, "", "", $this->Parameters["urls_id_incidente"], "", false);
        $this->wp->AddParameter("2", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("3", "urls_severidad", ccsInteger, "", "", $this->Parameters["urls_severidad"], 0, false);
        $this->wp->AddParameter("4", "urls_descartar", ccsInteger, "", "", $this->Parameters["urls_descartar"], 0, false);
        $this->wp->AddParameter("5", "urls_Paquete", ccsText, "", "", $this->Parameters["urls_Paquete"], "", false);
        $this->wp->AddParameter("6", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], date("m"), false);
        $this->wp->AddParameter("7", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], date("Y"), false);
    }
//End Prepare Method

//Open Method @2-D2387560
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select p.nombre\n" .
        ", s.nombre servicio\n" .
        ", q.id_incidente\n" .
        ", q.Cumple_DISP_SOPORTE \n" .
        ", q.Cumple_Inc_TiempoAsignacion\n" .
        ", q.Cumple_Inc_TiempoSolucion\n" .
        ", q.MesReporte, q.AnioReporte\n" .
        ", q.Obs_Manuales\n" .
        ", i.Obs_Proceso\n" .
        ", q.descartar\n" .
        ", i.descartar descartadoAUT\n" .
        ", i.Paquete  \n" .
        ", i.severidad\n" .
        ", i.id_proveedor\n" .
        ", i.id_servicio\n" .
        "from calificacion_incidentes_mc q\n" .
        "	inner join calificacion_incidentes_aut  i on i.id_incidente    = q.id_incidente  \n" .
        "	inner join c_proveedor p on p.id_proveedor = i.id_proveedor \n" .
        "	inner join c_servicio s on s.id_servicio  = i.id_servicio  \n" .
        "where q.id_incidente like '%%'\n" .
        "and (i.id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ")\n" .
        "and (i.severidad=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "and (q.descartar= " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . "=-1)\n" .
        "and case when i.Paquete   is null then '' else i.Paquete end like '%" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "%'\n" .
        "and q.MesReporte = " . $this->SQLValue($this->wp->GetDBValue("6"), ccsInteger) . "\n" .
        "and q.AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("7"), ccsInteger) . "\n" .
        ") cnt";
        $this->SQL = "select p.nombre\n" .
        ", s.nombre servicio\n" .
        ", q.id_incidente\n" .
        ", q.Cumple_DISP_SOPORTE \n" .
        ", q.Cumple_Inc_TiempoAsignacion\n" .
        ", q.Cumple_Inc_TiempoSolucion\n" .
        ", q.MesReporte, q.AnioReporte\n" .
        ", q.Obs_Manuales\n" .
        ", i.Obs_Proceso\n" .
        ", q.descartar\n" .
        ", i.descartar descartadoAUT\n" .
        ", i.Paquete  \n" .
        ", i.severidad\n" .
        ", i.id_proveedor\n" .
        ", i.id_servicio\n" .
        "from calificacion_incidentes_mc q\n" .
        "	inner join calificacion_incidentes_aut  i on i.id_incidente    = q.id_incidente  \n" .
        "	inner join c_proveedor p on p.id_proveedor = i.id_proveedor \n" .
        "	inner join c_servicio s on s.id_servicio  = i.id_servicio  \n" .
        "where q.id_incidente like '%%'\n" .
        "and (i.id_proveedor=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or 0=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . ")\n" .
        "and (i.severidad=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "and (q.descartar= " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . "=-1)\n" .
        "and case when i.Paquete   is null then '' else i.Paquete end like '%" . $this->SQLValue($this->wp->GetDBValue("5"), ccsText) . "%'\n" .
        "and q.MesReporte = " . $this->SQLValue($this->wp->GetDBValue("6"), ccsInteger) . "\n" .
        "and q.AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("7"), ccsInteger) . "\n" .
        "";
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

//SetValues Method @2-1537B882
    function SetValues()
    {
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->servicio->SetDBValue($this->f("servicio"));
        $this->id_incidente->SetDBValue($this->f("id_incidente"));
        $this->Cumple_DISP_SOPORTE->SetDBValue(trim($this->f("Cumple_DISP_SOPORTE")));
        $this->Cumple_Inc_TiempoAsignacion->SetDBValue(trim($this->f("Cumple_Inc_TiempoAsignacion")));
        $this->Cumple_Inc_TiempoSolucion->SetDBValue(trim($this->f("Cumple_Inc_TiempoSolucion")));
        $this->Obs_Proceso->SetDBValue($this->f("Obs_Manuales"));
        $this->descartar->SetDBValue(trim($this->f("descartar")));
        $this->Paquete->SetDBValue($this->f("Paquete"));
        $this->severidad->SetDBValue(trim($this->f("severidad")));
    }
//End SetValues Method

} //End grdIncidentesDataSource Class @2-FCB6E20C

class clsRecordgrdIncidentes1 { //grdIncidentes1 Class @35-449384C8

//Variables @35-9E315808

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

//Class_Initialize Event @35-B91369A0
    function clsRecordgrdIncidentes1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record grdIncidentes1/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "grdIncidentes1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ClearParameters = new clsControl(ccsLink, "ClearParameters", "ClearParameters", ccsText, "", CCGetRequestParam("ClearParameters", $Method, NULL), $this);
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_id_incidente", "s_id_proveedor", "s_severidad", "s_descartar", "s_Paquete", "s_MesReporte", "s_AnioReporte", "ccsForm"));
            $this->ClearParameters->Page = "IncidentesCalificados.php";
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_id_incidente = new clsControl(ccsTextBox, "s_id_incidente", "s_id_incidente", ccsText, "", CCGetRequestParam("s_id_incidente", $Method, NULL), $this);
            $this->s_severidad = new clsControl(ccsTextBox, "s_severidad", "s_severidad", ccsInteger, "", CCGetRequestParam("s_severidad", $Method, NULL), $this);
            $this->s_descartar = new clsControl(ccsListBox, "s_descartar", "s_descartar", ccsInteger, "", CCGetRequestParam("s_descartar", $Method, NULL), $this);
            $this->s_descartar->DSType = dsListOfValues;
            $this->s_descartar->Values = array(array("1", "Descartados"), array("0", "No Descartados"), array("-1", "Todos"));
            $this->s_Paquete = new clsControl(ccsTextBox, "s_Paquete", "s_Paquete", ccsText, "", CCGetRequestParam("s_Paquete", $Method, NULL), $this);
            $this->s_id_proveedor = new clsControl(ccsListBox, "s_id_proveedor", "s_id_proveedor", ccsInteger, "", CCGetRequestParam("s_id_proveedor", $Method, NULL), $this);
            $this->s_id_proveedor->DSType = dsTable;
            $this->s_id_proveedor->DataSource = new clsDBcnDisenio();
            $this->s_id_proveedor->ds = & $this->s_id_proveedor->DataSource;
            $this->s_id_proveedor->DataSource->SQL = "SELECT * \n" .
"FROM c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_MesReporte = new clsControl(ccsListBox, "s_MesReporte", "s_MesReporte", ccsInteger, "", CCGetRequestParam("s_MesReporte", $Method, NULL), $this);
            $this->s_MesReporte->DSType = dsTable;
            $this->s_MesReporte->DataSource = new clsDBcnDisenio();
            $this->s_MesReporte->ds = & $this->s_MesReporte->DataSource;
            $this->s_MesReporte->DataSource->SQL = "SELECT * \n" .
"FROM C_Mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_MesReporte->BoundColumn, $this->s_MesReporte->TextColumn, $this->s_MesReporte->DBFormat) = array("IdMes", "Mes", "");
            $this->s_AnioReporte = new clsControl(ccsListBox, "s_AnioReporte", "s_AnioReporte", ccsInteger, "", CCGetRequestParam("s_AnioReporte", $Method, NULL), $this);
            $this->s_AnioReporte->DSType = dsTable;
            $this->s_AnioReporte->DataSource = new clsDBcnDisenio();
            $this->s_AnioReporte->ds = & $this->s_AnioReporte->DataSource;
            $this->s_AnioReporte->DataSource->SQL = "SELECT * \n" .
"FROM c_ano {SQL_Where} {SQL_OrderBy}";
            list($this->s_AnioReporte->BoundColumn, $this->s_AnioReporte->TextColumn, $this->s_AnioReporte->DBFormat) = array("Ano", "Ano", "");
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_MesReporte->Value) && !strlen($this->s_MesReporte->Value) && $this->s_MesReporte->Value !== false)
                    $this->s_MesReporte->SetText(date("m", strtotime("-2 months")));
                if(!is_array($this->s_AnioReporte->Value) && !strlen($this->s_AnioReporte->Value) && $this->s_AnioReporte->Value !== false)
                    $this->s_AnioReporte->SetText(date("Y"));
            }
        }
    }
//End Class_Initialize Event

//Validate Method @35-EFE53CE3
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_incidente->Validate() && $Validation);
        $Validation = ($this->s_severidad->Validate() && $Validation);
        $Validation = ($this->s_descartar->Validate() && $Validation);
        $Validation = ($this->s_Paquete->Validate() && $Validation);
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_MesReporte->Validate() && $Validation);
        $Validation = ($this->s_AnioReporte->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_incidente->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_severidad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_descartar->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Paquete->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_AnioReporte->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @35-D6E950CD
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_id_incidente->Errors->Count());
        $errors = ($errors || $this->s_severidad->Errors->Count());
        $errors = ($errors || $this->s_descartar->Errors->Count());
        $errors = ($errors || $this->s_Paquete->Errors->Count());
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_MesReporte->Errors->Count());
        $errors = ($errors || $this->s_AnioReporte->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @35-0D299C5F
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
        $Redirect = "IncidentesCalificados.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "IncidentesCalificados.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @35-B6CEE750
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

        $this->s_descartar->Prepare();
        $this->s_id_proveedor->Prepare();
        $this->s_MesReporte->Prepare();
        $this->s_AnioReporte->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_id_incidente->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_severidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_descartar->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Paquete->Errors->ToString());
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

        $this->ClearParameters->Show();
        $this->Button_DoSearch->Show();
        $this->s_id_incidente->Show();
        $this->s_severidad->Show();
        $this->s_descartar->Show();
        $this->s_Paquete->Show();
        $this->s_id_proveedor->Show();
        $this->s_MesReporte->Show();
        $this->s_AnioReporte->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End grdIncidentes1 Class @35-FCB6E20C

//Include Page implementation @53-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation



//Initialize Page @1-B4B95842
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
$TemplateFileName = "IncidentesCalificados.html";
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

//Include events file @1-B7C03BC1
include_once("./IncidentesCalificados_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-1E34A7FA
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$grdIncidentes = new clsGridgrdIncidentes("", $MainPage);
$grdIncidentes1 = new clsRecordgrdIncidentes1("", $MainPage);
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$MainPage->grdIncidentes = & $grdIncidentes;
$MainPage->grdIncidentes1 = & $grdIncidentes1;
$MainPage->Header = & $Header;
$grdIncidentes->Initialize();
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

//Execute Components @1-957D119F
$Header->Operations();
$grdIncidentes1->Operation();
//End Execute Components

//Go to destination page @1-76C4265A
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($grdIncidentes);
    unset($grdIncidentes1);
    $Header->Class_Terminate();
    unset($Header);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A3F8407D
$grdIncidentes->Show();
$grdIncidentes1->Show();
$Header->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-221E677F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($grdIncidentes);
unset($grdIncidentes1);
$Header->Class_Terminate();
unset($Header);
unset($Tpl);
//End Unload Page


?>
