<?php
//Include Common Files @1-49D20FE3
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsApbCuadroNSRSxls.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsGridGrid1 { //Grid1 class @3-E857A572

//Variables @3-D522BBFD

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
    public $Sorter_SumaApb;
    public $Sorter_HERR_EST_COST;
    public $Sorter_Meta;
    public $Sorter_pena;
//End Variables

//Class_Initialize Event @3-9D9ECF45
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

        $this->nombre = new clsControl(ccsLabel, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->SumaApb = new clsControl(ccsLabel, "SumaApb", "SumaApb", ccsText, "", CCGetRequestParam("SumaApb", ccsGet, NULL), $this);
        $this->SumaApb->HTML = true;
        $this->incumplimientos = new clsControl(ccsLabel, "incumplimientos", "incumplimientos", ccsText, "", CCGetRequestParam("incumplimientos", ccsGet, NULL), $this);
        $this->incumplimientos->HTML = true;
        $this->Meta = new clsControl(ccsLabel, "Meta", "Meta", ccsFloat, "", CCGetRequestParam("Meta", ccsGet, NULL), $this);
        $this->pena = new clsControl(ccsLabel, "pena", "pena", ccsText, "", CCGetRequestParam("pena", ccsGet, NULL), $this);
        $this->Cumplimiento = new clsControl(ccsLabel, "Cumplimiento", "Cumplimiento", ccsText, "", CCGetRequestParam("Cumplimiento", ccsGet, NULL), $this);
        $this->Cumplimiento->HTML = true;
        $this->Indicador = new clsControl(ccsImage, "Indicador", "Indicador", ccsText, "", CCGetRequestParam("Indicador", ccsGet, NULL), $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Sorter_SumaApb = new clsSorter($this->ComponentName, "Sorter_SumaApb", $FileName, $this);
        $this->Sorter_HERR_EST_COST = new clsSorter($this->ComponentName, "Sorter_HERR_EST_COST", $FileName, $this);
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

//Show Method @3-644DCF63
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_MesReporte"] = CCGetFromGet("s_MesReporte", NULL);
        $this->DataSource->Parameters["urls_AnioReporte"] = CCGetFromGet("s_AnioReporte", NULL);
        $this->DataSource->Parameters["urlsSLO"] = CCGetFromGet("sSLO", NULL);

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
            $this->ControlsVisible["SumaApb"] = $this->SumaApb->Visible;
            $this->ControlsVisible["incumplimientos"] = $this->incumplimientos->Visible;
            $this->ControlsVisible["Meta"] = $this->Meta->Visible;
            $this->ControlsVisible["pena"] = $this->pena->Visible;
            $this->ControlsVisible["Cumplimiento"] = $this->Cumplimiento->Visible;
            $this->ControlsVisible["Indicador"] = $this->Indicador->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->SumaApb->SetValue($this->DataSource->SumaApb->GetValue());
                $this->incumplimientos->SetValue($this->DataSource->incumplimientos->GetValue());
                $this->Meta->SetValue($this->DataSource->Meta->GetValue());
                $this->pena->SetValue($this->DataSource->pena->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->nombre->Show();
                $this->SumaApb->Show();
                $this->incumplimientos->Show();
                $this->Meta->Show();
                $this->pena->Show();
                $this->Cumplimiento->Show();
                $this->Indicador->Show();
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
        $this->Sorter_SumaApb->Show();
        $this->Sorter_HERR_EST_COST->Show();
        $this->Sorter_Meta->Show();
        $this->Sorter_pena->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-D591EA41
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SumaApb->Errors->ToString());
        $errors = ComposeStrings($errors, $this->incumplimientos->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Meta->Errors->ToString());
        $errors = ComposeStrings($errors, $this->pena->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumplimiento->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Indicador->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid1 Class @3-FCB6E20C

class clsGrid1DataSource extends clsDBcnDisenio {  //Grid1DataSource Class @3-9B337F8E

//DataSource Variables @3-2CC01C12
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $nombre;
    public $SumaApb;
    public $incumplimientos;
    public $Meta;
    public $pena;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-2083423C
    function clsGrid1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid1";
        $this->Initialize();
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->SumaApb = new clsField("SumaApb", ccsText, "");
        
        $this->incumplimientos = new clsField("incumplimientos", ccsText, "");
        
        $this->Meta = new clsField("Meta", ccsFloat, "");
        
        $this->pena = new clsField("pena", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-0C830F62
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_nombre" => array("nombre", ""), 
            "Sorter_SumaApb" => array("SumaApb", ""), 
            "Sorter_HERR_EST_COST" => array("HERR_EST_COST", ""), 
            "Sorter_Meta" => array("Meta", ""), 
            "Sorter_pena" => array("pena", "")));
    }
//End SetOrder Method

//Prepare Method @3-7BB1D26F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], 0, false);
        $this->wp->AddParameter("3", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], 0, false);
        $this->wp->AddParameter("4", "urlsSLO", ccsInteger, "", "", $this->Parameters["urlsSLO"], 0, false);
    }
//End Prepare Method

//Open Method @3-F795C74D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.HERR_EST_COST,  mc_c_metrica.Meta,  mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(HERR_EST_COST) SumaApb,\n" .
        "	sum(cast(~HERR_EST_COST as int)) HERR_EST_COST\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='HERR_EST_COST'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(REQ_SERV) SumaApb,\n" .
        "	sum(cast(~REQ_SERV as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='REQ_SERV'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(CUMPL_REQ_FUNC) SumaApb,\n" .
        "	sum(cast(~CUMPL_REQ_FUNC as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='CUMPL_REQ_FUNC'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(CALIDAD_PROD_TERM) SumaApb,\n" .
        "	sum(cast(~CALIDAD_PROD_TERM as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='CALIDAD_PROD_TERM'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(RETR_ENTREGABLE) SumaApb,\n" .
        "	sum(cast(~RETR_ENTREGABLE as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='RETR_ENTREGABLE'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(COMPL_RUTA_CRITICA) SumaApb,\n" .
        "	sum(cast(~COMPL_RUTA_CRITICA as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='COMPL_RUTA_CRITICA'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(EST_PROY) SumaApb,\n" .
        "	sum(cast(~EST_PROY as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='EST_PROY'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(DEF_FUG_AMB_PROD) SumaApb,\n" .
        "	sum(cast(~DEF_FUG_AMB_PROD as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='DEF_FUG_AMB_PROD'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.CUMPLE_SLA  ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "( select id_proveedor,\n" .
        "	COUNT(CUMPLESLA) SumaApb,\n" .
        "	sum(cast(~cast(CUMPLESLA as bit) as int)) CUMPLE_SLA\n" .
        "	from mc_eficiencia_presupuestal \n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and CumpleSLA in (0,1)\n" .
        "	--and ((id_proveedor <>4 and GrupoAplicativos not like '%Todos%') or (Id_Proveedor =4))\n" .
        "	and (([GrupoAplicativos] not like 'Todos%' and (4<>4 or (MesReporte>2 and anioreporte >2013)) ) \n" .
        "					or (4=4 and MesReporte<=2 and anioreporte <2014 ) or 0=4)\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='EFIC_PRESUP'\n" .
        "union all\n" .
        "\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.CAL_COD,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(CAL_COD) SumaApb,\n" .
        "	sum(cast(~CAL_COD as int)) CAL_COD\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='CAL_COD'\n" .
        "\n" .
        "\n" .
        "\n" .
        ") cnt";
        $this->SQL = "\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.HERR_EST_COST,  mc_c_metrica.Meta,  mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(HERR_EST_COST) SumaApb,\n" .
        "	sum(cast(~HERR_EST_COST as int)) HERR_EST_COST\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='HERR_EST_COST'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(REQ_SERV) SumaApb,\n" .
        "	sum(cast(~REQ_SERV as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='REQ_SERV'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(CUMPL_REQ_FUNC) SumaApb,\n" .
        "	sum(cast(~CUMPL_REQ_FUNC as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='CUMPL_REQ_FUNC'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(CALIDAD_PROD_TERM) SumaApb,\n" .
        "	sum(cast(~CALIDAD_PROD_TERM as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='CALIDAD_PROD_TERM'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(RETR_ENTREGABLE) SumaApb,\n" .
        "	sum(cast(~RETR_ENTREGABLE as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='RETR_ENTREGABLE'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(COMPL_RUTA_CRITICA) SumaApb,\n" .
        "	sum(cast(~COMPL_RUTA_CRITICA as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='COMPL_RUTA_CRITICA'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(EST_PROY) SumaApb,\n" .
        "	sum(cast(~EST_PROY as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='EST_PROY'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(DEF_FUG_AMB_PROD) SumaApb,\n" .
        "	sum(cast(~DEF_FUG_AMB_PROD as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='DEF_FUG_AMB_PROD'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.CUMPLE_SLA  ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "( select id_proveedor,\n" .
        "	COUNT(CUMPLESLA) SumaApb,\n" .
        "	sum(cast(~cast(CUMPLESLA as bit) as int)) CUMPLE_SLA\n" .
        "	from mc_eficiencia_presupuestal \n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and CumpleSLA in (0,1)\n" .
        "	--and ((id_proveedor <>4 and GrupoAplicativos not like '%Todos%') or (Id_Proveedor =4))\n" .
        "	and (([GrupoAplicativos] not like 'Todos%' and (4<>4 or (MesReporte>2 and anioreporte >2013)) ) \n" .
        "					or (4=4 and MesReporte<=2 and anioreporte <2014 ) or 0=4)\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='EFIC_PRESUP'\n" .
        "union all\n" .
        "\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.CAL_COD,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(CAL_COD) SumaApb,\n" .
        "	sum(cast(~CAL_COD as int)) CAL_COD\n" .
        "	from mc_calificacion_rs_mc\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  in (select numero from mc_universo_cds where SLO=" . $this->SQLValue($this->wp->GetDBValue("4"), ccsInteger) . " and tipo <> 'IN')\n" .
        "	and IdUniverso not in (select id from mc_universo_cds where revision=2  )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='CAL_COD'\n" .
        "\n" .
        "\n" .
        "\n" .
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

//SetValues Method @3-4A7AB684
    function SetValues()
    {
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->SumaApb->SetDBValue($this->f("SumaApb"));
        $this->incumplimientos->SetDBValue($this->f("HERR_EST_COST"));
        $this->Meta->SetDBValue(trim($this->f("Meta")));
        $this->pena->SetDBValue($this->f("pena"));
    }
//End SetValues Method

} //End Grid1DataSource Class @3-FCB6E20C

class clsRecordmc_calificacion_rs_MC { //mc_calificacion_rs_MC Class @20-58DA90F6

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

//Class_Initialize Event @20-2D814B12
    function clsRecordmc_calificacion_rs_MC($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_calificacion_rs_MC/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_calificacion_rs_MC";
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
            $this->s_id_proveedor->DataSource->SQL = "SELECT nombre, descripcion, id_proveedor \n" .
"FROM mc_c_proveedor {SQL_Where} {SQL_OrderBy}";
            list($this->s_id_proveedor->BoundColumn, $this->s_id_proveedor->TextColumn, $this->s_id_proveedor->DBFormat) = array("id_proveedor", "nombre", "");
            $this->s_id_proveedor->DataSource->Parameters["expr26"] = 'CDS';
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "expr26", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["expr26"], "", false);
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
            $this->s_AnioReporte->DSType = dsSQL;
            $this->s_AnioReporte->DataSource = new clsDBcnDisenio();
            $this->s_AnioReporte->ds = & $this->s_AnioReporte->DataSource;
            list($this->s_AnioReporte->BoundColumn, $this->s_AnioReporte->TextColumn, $this->s_AnioReporte->DBFormat) = array("Ano", "Ano", "");
            $this->s_AnioReporte->DataSource->SQL = "SELECT * \n" .
            "FROM mc_c_anio \n" .
            "where ano > 2013 {SQL_OrderBy}";
            $this->s_AnioReporte->DataSource->Order = "ano";
        }
    }
//End Class_Initialize Event

//Validate Method @20-713777E7
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

//CheckErrors Method @20-F92AA8F5
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

//Operation Method @20-DD94EE4C
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

//Show Method @20-7342DCBE
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

} //End mc_calificacion_rs_MC Class @20-FCB6E20C

//Include Page implementation @49-1C97D460
include_once(RelativePath . "/MenuTablero.php");
//End Include Page implementation

class clsGridGrid2 { //Grid2 class @52-C37AF6B1

//Variables @52-D522BBFD

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
    public $Sorter_SumaApb;
    public $Sorter_HERR_EST_COST;
    public $Sorter_Meta;
    public $Sorter_pena;
//End Variables

//Class_Initialize Event @52-950CF038
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
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("Grid2Order", "");
        $this->SorterDirection = CCGetParam("Grid2Dir", "");

        $this->nombre = new clsControl(ccsLabel, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->SumaApb = new clsControl(ccsLabel, "SumaApb", "SumaApb", ccsText, "", CCGetRequestParam("SumaApb", ccsGet, NULL), $this);
        $this->SumaApb->HTML = true;
        $this->incumplimientos = new clsControl(ccsLabel, "incumplimientos", "incumplimientos", ccsText, "", CCGetRequestParam("incumplimientos", ccsGet, NULL), $this);
        $this->incumplimientos->HTML = true;
        $this->Meta = new clsControl(ccsLabel, "Meta", "Meta", ccsFloat, "", CCGetRequestParam("Meta", ccsGet, NULL), $this);
        $this->pena = new clsControl(ccsLabel, "pena", "pena", ccsText, "", CCGetRequestParam("pena", ccsGet, NULL), $this);
        $this->Cumplimiento = new clsControl(ccsLabel, "Cumplimiento", "Cumplimiento", ccsText, "", CCGetRequestParam("Cumplimiento", ccsGet, NULL), $this);
        $this->Cumplimiento->HTML = true;
        $this->Indicador = new clsControl(ccsImage, "Indicador", "Indicador", ccsText, "", CCGetRequestParam("Indicador", ccsGet, NULL), $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Sorter_SumaApb = new clsSorter($this->ComponentName, "Sorter_SumaApb", $FileName, $this);
        $this->Sorter_HERR_EST_COST = new clsSorter($this->ComponentName, "Sorter_HERR_EST_COST", $FileName, $this);
        $this->Sorter_Meta = new clsSorter($this->ComponentName, "Sorter_Meta", $FileName, $this);
        $this->Sorter_pena = new clsSorter($this->ComponentName, "Sorter_pena", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @52-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @52-3F861728
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
            $this->ControlsVisible["SumaApb"] = $this->SumaApb->Visible;
            $this->ControlsVisible["incumplimientos"] = $this->incumplimientos->Visible;
            $this->ControlsVisible["Meta"] = $this->Meta->Visible;
            $this->ControlsVisible["pena"] = $this->pena->Visible;
            $this->ControlsVisible["Cumplimiento"] = $this->Cumplimiento->Visible;
            $this->ControlsVisible["Indicador"] = $this->Indicador->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->SumaApb->SetValue($this->DataSource->SumaApb->GetValue());
                $this->incumplimientos->SetValue($this->DataSource->incumplimientos->GetValue());
                $this->Meta->SetValue($this->DataSource->Meta->GetValue());
                $this->pena->SetValue($this->DataSource->pena->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->nombre->Show();
                $this->SumaApb->Show();
                $this->incumplimientos->Show();
                $this->Meta->Show();
                $this->pena->Show();
                $this->Cumplimiento->Show();
                $this->Indicador->Show();
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
        $this->Sorter_SumaApb->Show();
        $this->Sorter_HERR_EST_COST->Show();
        $this->Sorter_Meta->Show();
        $this->Sorter_pena->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @52-D591EA41
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SumaApb->Errors->ToString());
        $errors = ComposeStrings($errors, $this->incumplimientos->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Meta->Errors->ToString());
        $errors = ComposeStrings($errors, $this->pena->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Cumplimiento->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Indicador->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Grid2 Class @52-FCB6E20C

class clsGrid2DataSource extends clsDBcnDisenio {  //Grid2DataSource Class @52-C024CE9B

//DataSource Variables @52-2CC01C12
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $nombre;
    public $SumaApb;
    public $incumplimientos;
    public $Meta;
    public $pena;
//End DataSource Variables

//DataSourceClass_Initialize Event @52-DBDD32AD
    function clsGrid2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid Grid2";
        $this->Initialize();
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->SumaApb = new clsField("SumaApb", ccsText, "");
        
        $this->incumplimientos = new clsField("incumplimientos", ccsText, "");
        
        $this->Meta = new clsField("Meta", ccsFloat, "");
        
        $this->pena = new clsField("pena", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @52-0C830F62
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_nombre" => array("nombre", ""), 
            "Sorter_SumaApb" => array("SumaApb", ""), 
            "Sorter_HERR_EST_COST" => array("HERR_EST_COST", ""), 
            "Sorter_Meta" => array("Meta", ""), 
            "Sorter_pena" => array("pena", "")));
    }
//End SetOrder Method

//Prepare Method @52-66015BB1
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], 0, false);
        $this->wp->AddParameter("3", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], 0, false);
    }
//End Prepare Method

//Open Method @52-B0A4321B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select mc_c_metrica.nombre, c.SumaApb,  c.HERR_EST_COST,  mc_c_metrica.Meta,  mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(HERR_EST_COST) SumaApb,\n" .
        "	sum(cast(~HERR_EST_COST as int)) HERR_EST_COST\n" .
        "	from mc_calificacion_rs_sat\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1 )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='HERR_EST_COST'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(REQ_SERV) SumaApb,\n" .
        "	sum(cast(~REQ_SERV as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_sat\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1 )\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='REQ_SERV'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(CUMPL_REQ_FUNC) SumaApb,\n" .
        "	sum(cast(~CUMPL_REQ_FUNC as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_sat\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='CUMPL_REQ_FUNC'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(CALIDAD_PROD_TERM) SumaApb,\n" .
        "	sum(cast(~CALIDAD_PROD_TERM as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_sat\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='CALIDAD_PROD_TERM'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(RETR_ENTREGABLE) SumaApb,\n" .
        "	sum(cast(~RETR_ENTREGABLE as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_sat\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='RETR_ENTREGABLE'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(COMPL_RUTA_CRITICA) SumaApb,\n" .
        "	sum(cast(~COMPL_RUTA_CRITICA as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_sat\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='COMPL_RUTA_CRITICA'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(EST_PROY) SumaApb,\n" .
        "	sum(cast(~EST_PROY as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_sat\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='EST_PROY'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.REQ_SERV ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(DEF_FUG_AMB_PROD) SumaApb,\n" .
        "	sum(cast(~DEF_FUG_AMB_PROD as int)) REQ_SERV\n" .
        "	from mc_calificacion_rs_sat\n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and id_ppmc  not in (select numero from mc_universo_cds where SLO=1 and revision =1)\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='DEF_FUG_AMB_PROD'\n" .
        "union all\n" .
        "select mc_c_metrica.nombre, c.SumaApb,  c.CUMPLE_SLA  ,  mc_c_metrica.Meta, mc_c_metrica.pena   \n" .
        "from mc_c_metrica \n" .
        "CROSS JOIN \n" .
        "(select id_proveedor,\n" .
        "	COUNT(CUMPLESLA) SumaApb,\n" .
        "	sum(cast(~cast(CUMPLESLA as bit) as int)) CUMPLE_SLA\n" .
        "	from mc_eficiencia_presupuestal \n" .
        "	where id_proveedor= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "\n" .
        "	and mesreporte= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	and AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "\n" .
        "	and CumpleSLA in (0,1)\n" .
        "	--and ((id_proveedor <>4 and GrupoAplicativos not like '%Todos%') or (Id_Proveedor =4))\n" .
        "	and (([GrupoAplicativos] not like 'Todos%' and (4<>4 or (MesReporte>2 and anioreporte >2013)) ) \n" .
        "					or (4=4 and MesReporte<=2 and anioreporte <2014 ) or 0=4)\n" .
        "	group by id_proveedor  \n" .
        ") c\n" .
        "where acronimo ='EFIC_PRESUP'";
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

//SetValues Method @52-4A7AB684
    function SetValues()
    {
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->SumaApb->SetDBValue($this->f("SumaApb"));
        $this->incumplimientos->SetDBValue($this->f("HERR_EST_COST"));
        $this->Meta->SetDBValue(trim($this->f("Meta")));
        $this->pena->SetDBValue($this->f("pena"));
    }
//End SetValues Method

} //End Grid2DataSource Class @52-FCB6E20C

//Initialize Page @1-956369C2
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
$TemplateFileName = "PPMCsApbCuadroNSRSxls.html";
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

//Include events file @1-DC6BF039
include_once("./PPMCsApbCuadroNSRSxls_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-68867E10
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$Grid1 = new clsGridGrid1("", $MainPage);
$mc_calificacion_rs_MC = new clsRecordmc_calificacion_rs_MC("", $MainPage);
$MenuTablero = new clsMenuTablero("", "MenuTablero", $MainPage);
$MenuTablero->Initialize();
$Grid2 = new clsGridGrid2("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->Grid1 = & $Grid1;
$MainPage->mc_calificacion_rs_MC = & $mc_calificacion_rs_MC;
$MainPage->MenuTablero = & $MenuTablero;
$MainPage->Grid2 = & $Grid2;
$Grid1->Initialize();
$Grid2->Initialize();
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

//Execute Components @1-0CF397A3
$MenuTablero->Operations();
$mc_calificacion_rs_MC->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-0C8205F9
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($Grid1);
    unset($mc_calificacion_rs_MC);
    $MenuTablero->Class_Terminate();
    unset($MenuTablero);
    unset($Grid2);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-369C077A
$Header->Show();
$Grid1->Show();
$mc_calificacion_rs_MC->Show();
$MenuTablero->Show();
$Grid2->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2BC11BF5
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($Grid1);
unset($mc_calificacion_rs_MC);
$MenuTablero->Class_Terminate();
unset($MenuTablero);
unset($Grid2);
unset($Tpl);
//End Unload Page


?>
