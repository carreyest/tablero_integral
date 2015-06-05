<?php
//Include Common Files @1-0608046B
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "ListaSimpleIncidentes.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

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

//Class_Initialize Event @2-D5430197
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
            $this->PageSize = 200;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 200)
            $this->PageSize = 200;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->id_incidente = new clsControl(ccsLabel, "id_incidente", "id_incidente", ccsText, "", CCGetRequestParam("id_incidente", ccsGet, NULL), $this);
        $this->cumple_inc_tiemposolucion = new clsControl(ccsLabel, "cumple_inc_tiemposolucion", "cumple_inc_tiemposolucion", ccsInteger, "", CCGetRequestParam("cumple_inc_tiemposolucion", ccsGet, NULL), $this);
        $this->cumple_inc_tiempoasignacion = new clsControl(ccsLabel, "cumple_inc_tiempoasignacion", "cumple_inc_tiempoasignacion", ccsInteger, "", CCGetRequestParam("cumple_inc_tiempoasignacion", ccsGet, NULL), $this);
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

//Show Method @2-C6EC13E8
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_cds_param"] = CCGetFromGet("s_cds_param", NULL);
        $this->DataSource->Parameters["urls_mes_param"] = CCGetFromGet("s_mes_param", NULL);
        $this->DataSource->Parameters["urls_anio_param"] = CCGetFromGet("s_anio_param", NULL);

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
            $this->ControlsVisible["id_incidente"] = $this->id_incidente->Visible;
            $this->ControlsVisible["cumple_inc_tiemposolucion"] = $this->cumple_inc_tiemposolucion->Visible;
            $this->ControlsVisible["cumple_inc_tiempoasignacion"] = $this->cumple_inc_tiempoasignacion->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->id_incidente->SetValue($this->DataSource->id_incidente->GetValue());
                $this->cumple_inc_tiemposolucion->SetValue($this->DataSource->cumple_inc_tiemposolucion->GetValue());
                $this->cumple_inc_tiempoasignacion->SetValue($this->DataSource->cumple_inc_tiempoasignacion->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id_incidente->Show();
                $this->cumple_inc_tiemposolucion->Show();
                $this->cumple_inc_tiempoasignacion->Show();
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

//GetErrors Method @2-883183E3
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->id_incidente->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumple_inc_tiemposolucion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->cumple_inc_tiempoasignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @2-FCB6E20C

class clsGrid1DataSource extends clsDBcnDisenio {  //Grid1DataSource Class @2-9B337F8E

//DataSource Variables @2-6836512B
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $id_incidente;
    public $cumple_inc_tiemposolucion;
    public $cumple_inc_tiempoasignacion;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-B318E1FA
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->id_incidente = new clsField("id_incidente", ccsText, "");
        
        $this->cumple_inc_tiemposolucion = new clsField("cumple_inc_tiemposolucion", ccsInteger, "");
        
        $this->cumple_inc_tiempoasignacion = new clsField("cumple_inc_tiempoasignacion", ccsInteger, "");
        

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

//Prepare Method @2-8DF3E9BE
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_cds_param", ccsInteger, "", "", $this->Parameters["urls_cds_param"], 0, false);
        $this->wp->AddParameter("2", "urls_mes_param", ccsInteger, "", "", $this->Parameters["urls_mes_param"], 0, false);
        $this->wp->AddParameter("3", "urls_anio_param", ccsInteger, "", "", $this->Parameters["urls_anio_param"], 0, false);
    }
//End Prepare Method

//Open Method @2-E9042E7F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select id_incidente, \n" .
        "	cumple_inc_tiemposolucion, \n" .
        "	cumple_inc_tiempoasignacion   \n" .
        "from mc_calificacion_incidentes_mc\n" .
        "where mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and anioreporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "	) cnt";
        $this->SQL = "select id_incidente, \n" .
        "	cumple_inc_tiemposolucion, \n" .
        "	cumple_inc_tiempoasignacion   \n" .
        "from mc_calificacion_incidentes_mc\n" .
        "where mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and anioreporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "	";
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

//SetValues Method @2-2E151ABB
    function SetValues()
    {
        $this->id_incidente->SetDBValue($this->f("id_incidente"));
        $this->cumple_inc_tiemposolucion->SetDBValue(trim($this->f("cumple_inc_tiemposolucion")));
        $this->cumple_inc_tiempoasignacion->SetDBValue(trim($this->f("cumple_inc_tiempoasignacion")));
    }
//End SetValues Method

} //End Grid1DataSource Class @2-FCB6E20C

class clsGridmc_calificacion_rs_MC { //mc_calificacion_rs_MC class @13-75F2E500

//Variables @13-6E51DF5A

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

//Class_Initialize Event @13-896F932F
    function clsGridmc_calificacion_rs_MC($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_calificacion_rs_MC";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_calificacion_rs_MC";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_calificacion_rs_MCDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 200;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 200)
            $this->PageSize = 200;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->id_ppmc = new clsControl(ccsLabel, "id_ppmc", "id_ppmc", ccsInteger, "", CCGetRequestParam("id_ppmc", ccsGet, NULL), $this);
        $this->HERR_EST_COST = new clsControl(ccsLabel, "HERR_EST_COST", "HERR_EST_COST", ccsInteger, "", CCGetRequestParam("HERR_EST_COST", ccsGet, NULL), $this);
        $this->REQ_SERV = new clsControl(ccsLabel, "REQ_SERV", "REQ_SERV", ccsInteger, "", CCGetRequestParam("REQ_SERV", ccsGet, NULL), $this);
        $this->CUMPL_REQ_FUNC = new clsControl(ccsLabel, "CUMPL_REQ_FUNC", "CUMPL_REQ_FUNC", ccsInteger, "", CCGetRequestParam("CUMPL_REQ_FUNC", ccsGet, NULL), $this);
        $this->CALIDAD_PROD_TERM = new clsControl(ccsLabel, "CALIDAD_PROD_TERM", "CALIDAD_PROD_TERM", ccsInteger, "", CCGetRequestParam("CALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->RETR_ENTREGABLE = new clsControl(ccsLabel, "RETR_ENTREGABLE", "RETR_ENTREGABLE", ccsInteger, "", CCGetRequestParam("RETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->COMPL_RUTA_CRITICA = new clsControl(ccsLabel, "COMPL_RUTA_CRITICA", "COMPL_RUTA_CRITICA", ccsInteger, "", CCGetRequestParam("COMPL_RUTA_CRITICA", ccsGet, NULL), $this);
        $this->EST_PROY = new clsControl(ccsLabel, "EST_PROY", "EST_PROY", ccsInteger, "", CCGetRequestParam("EST_PROY", ccsGet, NULL), $this);
        $this->DEF_FUG_AMB_PROD = new clsControl(ccsLabel, "DEF_FUG_AMB_PROD", "DEF_FUG_AMB_PROD", ccsInteger, "", CCGetRequestParam("DEF_FUG_AMB_PROD", ccsGet, NULL), $this);
    }
//End Class_Initialize Event

//Initialize Method @13-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @13-ACE4E402
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_mes_param"] = CCGetFromGet("s_mes_param", NULL);
        $this->DataSource->Parameters["urls_anio_param"] = CCGetFromGet("s_anio_param", NULL);
        $this->DataSource->Parameters["urls_cds_param"] = CCGetFromGet("s_cds_param", NULL);

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
            $this->ControlsVisible["id_ppmc"] = $this->id_ppmc->Visible;
            $this->ControlsVisible["HERR_EST_COST"] = $this->HERR_EST_COST->Visible;
            $this->ControlsVisible["REQ_SERV"] = $this->REQ_SERV->Visible;
            $this->ControlsVisible["CUMPL_REQ_FUNC"] = $this->CUMPL_REQ_FUNC->Visible;
            $this->ControlsVisible["CALIDAD_PROD_TERM"] = $this->CALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["RETR_ENTREGABLE"] = $this->RETR_ENTREGABLE->Visible;
            $this->ControlsVisible["COMPL_RUTA_CRITICA"] = $this->COMPL_RUTA_CRITICA->Visible;
            $this->ControlsVisible["EST_PROY"] = $this->EST_PROY->Visible;
            $this->ControlsVisible["DEF_FUG_AMB_PROD"] = $this->DEF_FUG_AMB_PROD->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->id_ppmc->SetValue($this->DataSource->id_ppmc->GetValue());
                $this->HERR_EST_COST->SetValue($this->DataSource->HERR_EST_COST->GetValue());
                $this->REQ_SERV->SetValue($this->DataSource->REQ_SERV->GetValue());
                $this->CUMPL_REQ_FUNC->SetValue($this->DataSource->CUMPL_REQ_FUNC->GetValue());
                $this->CALIDAD_PROD_TERM->SetValue($this->DataSource->CALIDAD_PROD_TERM->GetValue());
                $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
                $this->COMPL_RUTA_CRITICA->SetValue($this->DataSource->COMPL_RUTA_CRITICA->GetValue());
                $this->EST_PROY->SetValue($this->DataSource->EST_PROY->GetValue());
                $this->DEF_FUG_AMB_PROD->SetValue($this->DataSource->DEF_FUG_AMB_PROD->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id_ppmc->Show();
                $this->HERR_EST_COST->Show();
                $this->REQ_SERV->Show();
                $this->CUMPL_REQ_FUNC->Show();
                $this->CALIDAD_PROD_TERM->Show();
                $this->RETR_ENTREGABLE->Show();
                $this->COMPL_RUTA_CRITICA->Show();
                $this->EST_PROY->Show();
                $this->DEF_FUG_AMB_PROD->Show();
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

//GetErrors Method @13-4EB0E249
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->id_ppmc->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUMPL_REQ_FUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->COMPL_RUTA_CRITICA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EST_PROY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DEF_FUG_AMB_PROD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_calificacion_rs_MC Class @13-FCB6E20C

class clsmc_calificacion_rs_MCDataSource extends clsDBcnDisenio {  //mc_calificacion_rs_MCDataSource Class @13-EB5F0A7A

//DataSource Variables @13-3B7E9ABB
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $id_ppmc;
    public $HERR_EST_COST;
    public $REQ_SERV;
    public $CUMPL_REQ_FUNC;
    public $CALIDAD_PROD_TERM;
    public $RETR_ENTREGABLE;
    public $COMPL_RUTA_CRITICA;
    public $EST_PROY;
    public $DEF_FUG_AMB_PROD;
//End DataSource Variables

//DataSourceClass_Initialize Event @13-AAF2ADF0
    function clsmc_calificacion_rs_MCDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_calificacion_rs_MC";
        $this->Initialize();
        $this->id_ppmc = new clsField("id_ppmc", ccsInteger, "");
        
        $this->HERR_EST_COST = new clsField("HERR_EST_COST", ccsInteger, "");
        
        $this->REQ_SERV = new clsField("REQ_SERV", ccsInteger, "");
        
        $this->CUMPL_REQ_FUNC = new clsField("CUMPL_REQ_FUNC", ccsInteger, "");
        
        $this->CALIDAD_PROD_TERM = new clsField("CALIDAD_PROD_TERM", ccsInteger, "");
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsInteger, "");
        
        $this->COMPL_RUTA_CRITICA = new clsField("COMPL_RUTA_CRITICA", ccsInteger, "");
        
        $this->EST_PROY = new clsField("EST_PROY", ccsInteger, "");
        
        $this->DEF_FUG_AMB_PROD = new clsField("DEF_FUG_AMB_PROD", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @13-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @13-F0CC4CE9
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_mes_param", ccsInteger, "", "", $this->Parameters["urls_mes_param"], "", false);
        $this->wp->AddParameter("2", "urls_anio_param", ccsInteger, "", "", $this->Parameters["urls_anio_param"], "", false);
        $this->wp->AddParameter("3", "urls_cds_param", ccsInteger, "", "", $this->Parameters["urls_cds_param"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[MesReporte]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "[AnioReporte]", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "id_proveedor", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]);
    }
//End Prepare Method

//Open Method @13-16C7CFEF
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM mc_calificacion_rs_MC";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} * \n\n" .
        "FROM mc_calificacion_rs_MC {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @13-81B77811
    function SetValues()
    {
        $this->id_ppmc->SetDBValue(trim($this->f("id_ppmc")));
        $this->HERR_EST_COST->SetDBValue(trim($this->f("HERR_EST_COST")));
        $this->REQ_SERV->SetDBValue(trim($this->f("REQ_SERV")));
        $this->CUMPL_REQ_FUNC->SetDBValue(trim($this->f("CUMPL_REQ_FUNC")));
        $this->CALIDAD_PROD_TERM->SetDBValue(trim($this->f("CALIDAD_PROD_TERM")));
        $this->RETR_ENTREGABLE->SetDBValue(trim($this->f("RETR_ENTREGABLE")));
        $this->COMPL_RUTA_CRITICA->SetDBValue(trim($this->f("COMPL_RUTA_CRITICA")));
        $this->EST_PROY->SetDBValue(trim($this->f("EST_PROY")));
        $this->DEF_FUG_AMB_PROD->SetDBValue(trim($this->f("DEF_FUG_AMB_PROD")));
    }
//End SetValues Method

} //End mc_calificacion_rs_MCDataSource Class @13-FCB6E20C

//Initialize Page @1-4123FC75
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
$TemplateFileName = "ListaSimpleIncidentes.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-E91F0950
include_once("./ListaSimpleIncidentes_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-06E55939
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Grid1 = new clsGridGrid1("", $MainPage);
$mc_calificacion_rs_MC = new clsGridmc_calificacion_rs_MC("", $MainPage);
$MainPage->Grid1 = & $Grid1;
$MainPage->mc_calificacion_rs_MC = & $mc_calificacion_rs_MC;
$Grid1->Initialize();
$mc_calificacion_rs_MC->Initialize();
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

//Go to destination page @1-42466C33
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($Grid1);
    unset($mc_calificacion_rs_MC);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-09EDC0E6
$Grid1->Show();
$mc_calificacion_rs_MC->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-E63F3716
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($Grid1);
unset($mc_calificacion_rs_MC);
unset($Tpl);
//End Unload Page


?>
