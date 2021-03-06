<?php
//Include Common Files @1-E0D336E6
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "ReqTecList.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsGridgrdDetalleRS { //grdDetalleRS class @3-CC2FAA29

//Variables @3-979ED6FB

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
    public $Sorter_ServContractual;
    public $Sorter_ServNegocio;
    public $Sorter_id_ppmc;
    public $Sorter_Tipo;
    public $Sorter_descripci_n;
    public $Sorter_HERR_EST_COST;
    public $Sorter_REQ_SERV;
//End Variables

//Class_Initialize Event @3-9A93ECBB
    function clsGridgrdDetalleRS($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdDetalleRS";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdDetalleRS";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdDetalleRSDataSource($this);
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
        $this->SorterName = CCGetParam("grdDetalleRSOrder", "");
        $this->SorterDirection = CCGetParam("grdDetalleRSDir", "");

        $this->Panel1 = new clsPanel("Panel1", $this);
        $this->ServContractual = new clsControl(ccsLabel, "ServContractual", "ServContractual", ccsText, "", CCGetRequestParam("ServContractual", ccsGet, NULL), $this);
        $this->ServNegocio = new clsControl(ccsLabel, "ServNegocio", "ServNegocio", ccsText, "", CCGetRequestParam("ServNegocio", ccsGet, NULL), $this);
        $this->id_ppmc = new clsControl(ccsLink, "id_ppmc", "id_ppmc", ccsInteger, "", CCGetRequestParam("id_ppmc", ccsGet, NULL), $this);
        $this->id_ppmc->Page = "CalificaPPMCSAT.php";
        $this->Tipo = new clsControl(ccsLabel, "Tipo", "Tipo", ccsText, "", CCGetRequestParam("Tipo", ccsGet, NULL), $this);
        $this->descripci_n = new clsControl(ccsLabel, "descripci_n", "descripci_n", ccsText, "", CCGetRequestParam("descripci_n", ccsGet, NULL), $this);
        $this->HERR_EST_COST = new clsControl(ccsLabel, "HERR_EST_COST", "HERR_EST_COST", ccsText, "", CCGetRequestParam("HERR_EST_COST", ccsGet, NULL), $this);
        $this->imgCumpleHE = new clsControl(ccsImage, "imgCumpleHE", "imgCumpleHE", ccsText, "", CCGetRequestParam("imgCumpleHE", ccsGet, NULL), $this);
        $this->REQ_SERV = new clsControl(ccsLabel, "REQ_SERV", "REQ_SERV", ccsText, "", CCGetRequestParam("REQ_SERV", ccsGet, NULL), $this);
        $this->imgCumpleRS = new clsControl(ccsImage, "imgCumpleRS", "imgCumpleRS", ccsText, "", CCGetRequestParam("imgCumpleRS", ccsGet, NULL), $this);
        $this->IdEstimacion = new clsControl(ccsLabel, "IdEstimacion", "IdEstimacion", ccsText, "", CCGetRequestParam("IdEstimacion", ccsGet, NULL), $this);
        $this->Grid1_TotalRecords = new clsControl(ccsLabel, "Grid1_TotalRecords", "Grid1_TotalRecords", ccsText, "", CCGetRequestParam("Grid1_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_ServContractual = new clsSorter($this->ComponentName, "Sorter_ServContractual", $FileName, $this);
        $this->Sorter_ServNegocio = new clsSorter($this->ComponentName, "Sorter_ServNegocio", $FileName, $this);
        $this->Sorter_id_ppmc = new clsSorter($this->ComponentName, "Sorter_id_ppmc", $FileName, $this);
        $this->Sorter_Tipo = new clsSorter($this->ComponentName, "Sorter_Tipo", $FileName, $this);
        $this->Sorter_descripci_n = new clsSorter($this->ComponentName, "Sorter_descripci_n", $FileName, $this);
        $this->Sorter_HERR_EST_COST = new clsSorter($this->ComponentName, "Sorter_HERR_EST_COST", $FileName, $this);
        $this->Sorter_REQ_SERV = new clsSorter($this->ComponentName, "Sorter_REQ_SERV", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Panel1->AddComponent("ServContractual", $this->ServContractual);
        $this->Panel1->AddComponent("ServNegocio", $this->ServNegocio);
        $this->Panel1->AddComponent("id_ppmc", $this->id_ppmc);
        $this->Panel1->AddComponent("Tipo", $this->Tipo);
        $this->Panel1->AddComponent("descripci_n", $this->descripci_n);
        $this->Panel1->AddComponent("HERR_EST_COST", $this->HERR_EST_COST);
        $this->Panel1->AddComponent("imgCumpleHE", $this->imgCumpleHE);
        $this->Panel1->AddComponent("REQ_SERV", $this->REQ_SERV);
        $this->Panel1->AddComponent("imgCumpleRS", $this->imgCumpleRS);
        $this->Panel1->AddComponent("IdEstimacion", $this->IdEstimacion);
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

//Show Method @3-0B59FB64
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_MesReporte"] = CCGetFromGet("s_MesReporte", NULL);
        $this->DataSource->Parameters["urls_AnioReporte"] = CCGetFromGet("s_AnioReporte", NULL);
        $this->DataSource->Parameters["urls_Requerimiento"] = CCGetFromGet("s_Requerimiento", NULL);

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
            $this->ControlsVisible["Panel1"] = $this->Panel1->Visible;
            $this->ControlsVisible["ServContractual"] = $this->ServContractual->Visible;
            $this->ControlsVisible["ServNegocio"] = $this->ServNegocio->Visible;
            $this->ControlsVisible["id_ppmc"] = $this->id_ppmc->Visible;
            $this->ControlsVisible["Tipo"] = $this->Tipo->Visible;
            $this->ControlsVisible["descripci_n"] = $this->descripci_n->Visible;
            $this->ControlsVisible["HERR_EST_COST"] = $this->HERR_EST_COST->Visible;
            $this->ControlsVisible["imgCumpleHE"] = $this->imgCumpleHE->Visible;
            $this->ControlsVisible["REQ_SERV"] = $this->REQ_SERV->Visible;
            $this->ControlsVisible["imgCumpleRS"] = $this->imgCumpleRS->Visible;
            $this->ControlsVisible["IdEstimacion"] = $this->IdEstimacion->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->ServContractual->SetValue($this->DataSource->ServContractual->GetValue());
                $this->ServNegocio->SetValue($this->DataSource->ServNegocio->GetValue());
                $this->id_ppmc->SetValue($this->DataSource->id_ppmc->GetValue());
                $this->id_ppmc->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->id_ppmc->Parameters = CCAddParam($this->id_ppmc->Parameters, "IdUniverso", $this->DataSource->f("IdUniverso"));
                $this->Tipo->SetValue($this->DataSource->Tipo->GetValue());
                $this->descripci_n->SetValue($this->DataSource->descripci_n->GetValue());
                $this->HERR_EST_COST->SetValue($this->DataSource->HERR_EST_COST->GetValue());
                $this->REQ_SERV->SetValue($this->DataSource->REQ_SERV->GetValue());
                $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Panel1->Show();
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
        $this->Grid1_TotalRecords->Show();
        $this->Sorter_ServContractual->Show();
        $this->Sorter_ServNegocio->Show();
        $this->Sorter_id_ppmc->Show();
        $this->Sorter_Tipo->Show();
        $this->Sorter_descripci_n->Show();
        $this->Sorter_HERR_EST_COST->Show();
        $this->Sorter_REQ_SERV->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-5F14B2E5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ServContractual->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ServNegocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_ppmc->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Tipo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->descripci_n->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCumpleHE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCumpleRS->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IdEstimacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdDetalleRS Class @3-FCB6E20C

class clsgrdDetalleRSDataSource extends clsDBcnDisenio {  //grdDetalleRSDataSource Class @3-9D50D6CF

//DataSource Variables @3-FE853D18
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $ServContractual;
    public $ServNegocio;
    public $id_ppmc;
    public $Tipo;
    public $descripci_n;
    public $HERR_EST_COST;
    public $REQ_SERV;
    public $IdEstimacion;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-DF17BF96
    function clsgrdDetalleRSDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdDetalleRS";
        $this->Initialize();
        $this->ServContractual = new clsField("ServContractual", ccsText, "");
        
        $this->ServNegocio = new clsField("ServNegocio", ccsText, "");
        
        $this->id_ppmc = new clsField("id_ppmc", ccsInteger, "");
        
        $this->Tipo = new clsField("Tipo", ccsText, "");
        
        $this->descripci_n = new clsField("descripci_n", ccsText, "");
        
        $this->HERR_EST_COST = new clsField("HERR_EST_COST", ccsText, "");
        
        $this->REQ_SERV = new clsField("REQ_SERV", ccsText, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-782B4AAB
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "c.id_ppmc, u.TipoPPMC desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_ServContractual" => array("ServContractual", ""), 
            "Sorter_ServNegocio" => array("ServNegocio", ""), 
            "Sorter_id_ppmc" => array("id_ppmc", ""), 
            "Sorter_Tipo" => array("Tipo", ""), 
            "Sorter_descripci_n" => array("descripción", ""), 
            "Sorter_HERR_EST_COST" => array("HERR_EST_COST", ""), 
            "Sorter_REQ_SERV" => array("REQ_SERV", "")));
    }
//End SetOrder Method

//Prepare Method @3-FC68702D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], 0, false);
        $this->wp->AddParameter("3", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], 0, false);
        $this->wp->AddParameter("4", "urls_Requerimiento", ccsText, "", "", $this->Parameters["urls_Requerimiento"], "", false);
    }
//End Prepare Method

//Open Method @3-925A849B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select sc.Descripcion ServContractual, sn.nombre  ServNegocio, c.id_ppmc, t.Descripcion Tipo, \n" .
        "	c.descripción, c.HERR_EST_COST, c.REQ_SERV, c.CUMPL_REQ_FUNC, c.CALIDAD_PROD_TERM, c.RETR_ENTREGABLE, c.COMPL_RUTA_CRITICA,\n" .
        "	c.EST_PROY, c.DEF_FUG_AMB_PROD ,  c.Obs_manuales, c.id_servicio_negocio,\n" .
        "	'Nivel de Servicio: Retraso en Entregables. '  +  i.observaciones ObsRetrEnt,  \n" .
        "	'Nivel de Servicio: Defectos Fugados a Producción. ' + df.observaciones ObsDefFug,  \n" .
        "	'Nivel de Servicio: Requisitos Funcionales. ' + rf.observaciones ObsReqFun,  \n" .
        "	'Nivel de Servicio: Calidad de Productos Terminados/Retraso en Entregables. ' + ca.observaciones  ObsCalidad,\n" .
        "	'Nivel de Servicio: Estimación de Proyectos.' + ep.Observaciones ObsEstProy, \n" .
        "	ap.observaciones Obs_Apertura ,\n" .
        "	c.IdUniverso, u.medido, mcSAT.Obs_Manuales Obs_SAT,\n" .
        "	u.mestransicion, u.IdEstimacion\n" .
        "from mc_calificacion_rs_MC c\n" .
        "	inner join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "	inner join mc_c_ServContractual sc on sc.Id = c.id_servicio_cont and id_tipo_servicio = 2\n" .
        "	left join mc_c_TipoPPMC  t on t.Id = c.id_tipo \n" .
        "	left join mc_info_rs_cr_re_rc i on i.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "    left join mc_info_rs_cr_EP ep on ep.id = c.iduniverso\n" .
        "    left join mc_info_rs_ap_ec ap on ap.id = c.iduniverso\n" .
        "    left join mc_universo_cds u on u.id = c.iduniverso\n" .
        "    left join mc_calificacion_rs_SAT mcSAT on mcSAT.IdUniverso = c.IdUniverso\n" .
        "where (c.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0 )\n" .
        "	and (c.MesReporte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0)\n" .
        "	and (c.AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "	and (u.EsReqTecnico =1) \n" .
        "	and u.Tipo = 'PA'\n" .
        "	and (numero = '" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "' or ReqTecnico ='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "' or ''='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "'\n" .
        "	     or ReqTecnico IN (select reqtecnico from mc_universo_cds where numero ='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "'))) cnt";
        $this->SQL = "select TOP {SqlParam_endRecord} sc.Descripcion ServContractual, sn.nombre  ServNegocio, c.id_ppmc, t.Descripcion Tipo, \n" .
        "	c.descripción, c.HERR_EST_COST, c.REQ_SERV, c.CUMPL_REQ_FUNC, c.CALIDAD_PROD_TERM, c.RETR_ENTREGABLE, c.COMPL_RUTA_CRITICA,\n" .
        "	c.EST_PROY, c.DEF_FUG_AMB_PROD ,  c.Obs_manuales, c.id_servicio_negocio,\n" .
        "	'Nivel de Servicio: Retraso en Entregables. '  +  i.observaciones ObsRetrEnt,  \n" .
        "	'Nivel de Servicio: Defectos Fugados a Producción. ' + df.observaciones ObsDefFug,  \n" .
        "	'Nivel de Servicio: Requisitos Funcionales. ' + rf.observaciones ObsReqFun,  \n" .
        "	'Nivel de Servicio: Calidad de Productos Terminados/Retraso en Entregables. ' + ca.observaciones  ObsCalidad,\n" .
        "	'Nivel de Servicio: Estimación de Proyectos.' + ep.Observaciones ObsEstProy, \n" .
        "	ap.observaciones Obs_Apertura ,\n" .
        "	c.IdUniverso, u.medido, mcSAT.Obs_Manuales Obs_SAT,\n" .
        "	u.mestransicion, u.IdEstimacion\n" .
        "from mc_calificacion_rs_MC c\n" .
        "	inner join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "	inner join mc_c_ServContractual sc on sc.Id = c.id_servicio_cont and id_tipo_servicio = 2\n" .
        "	left join mc_c_TipoPPMC  t on t.Id = c.id_tipo \n" .
        "	left join mc_info_rs_cr_re_rc i on i.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "    left join mc_info_rs_cr_EP ep on ep.id = c.iduniverso\n" .
        "    left join mc_info_rs_ap_ec ap on ap.id = c.iduniverso\n" .
        "    left join mc_universo_cds u on u.id = c.iduniverso\n" .
        "    left join mc_calificacion_rs_SAT mcSAT on mcSAT.IdUniverso = c.IdUniverso\n" .
        "where (c.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0 )\n" .
        "	and (c.MesReporte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0)\n" .
        "	and (c.AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "	and (u.EsReqTecnico =1) \n" .
        "	and u.Tipo = 'PA'\n" .
        "	and (numero = '" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "' or ReqTecnico ='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "' or ''='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "'\n" .
        "	     or ReqTecnico IN (select reqtecnico from mc_universo_cds where numero ='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "')) {SQL_OrderBy}";
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

//SetValues Method @3-094B0BB0
    function SetValues()
    {
        $this->ServContractual->SetDBValue($this->f("ServContractual"));
        $this->ServNegocio->SetDBValue($this->f("ServNegocio"));
        $this->id_ppmc->SetDBValue(trim($this->f("id_ppmc")));
        $this->Tipo->SetDBValue($this->f("Tipo"));
        $this->descripci_n->SetDBValue($this->f("descripción"));
        $this->HERR_EST_COST->SetDBValue($this->f("HERR_EST_COST"));
        $this->REQ_SERV->SetDBValue($this->f("REQ_SERV"));
        $this->IdEstimacion->SetDBValue($this->f("IdEstimacion"));
    }
//End SetValues Method

} //End grdDetalleRSDataSource Class @3-FCB6E20C

class clsRecordgrdDetalleRS1 { //grdDetalleRS1 Class @25-223A8BBB

//Variables @25-9E315808

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

//Class_Initialize Event @25-2AC3BBAE
    function clsRecordgrdDetalleRS1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record grdDetalleRS1/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "grdDetalleRS1";
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
            $this->s_id_proveedor->DataSource->Parameters["expr34"] = 'CDS';
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "expr34", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["expr34"], "", false);
            $this->s_id_proveedor->DataSource->wp->Criterion[1] = $this->s_id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_id_proveedor->DataSource->wp->GetDBValue("1"), $this->s_id_proveedor->DataSource->ToSQL($this->s_id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_id_proveedor->DataSource->Where = 
                 $this->s_id_proveedor->DataSource->wp->Criterion[1];
            $this->s_MesReporte = new clsControl(ccsListBox, "s_MesReporte", "Mes Reporte", ccsInteger, "", CCGetRequestParam("s_MesReporte", $Method, NULL), $this);
            $this->s_MesReporte->DSType = dsTable;
            $this->s_MesReporte->DataSource = new clsDBcnDisenio();
            $this->s_MesReporte->ds = & $this->s_MesReporte->DataSource;
            $this->s_MesReporte->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_Mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_MesReporte->BoundColumn, $this->s_MesReporte->TextColumn, $this->s_MesReporte->DBFormat) = array("IdMes", "Mes", "");
            $this->s_AnioReporte = new clsControl(ccsListBox, "s_AnioReporte", "Anio Reporte", ccsInteger, "", CCGetRequestParam("s_AnioReporte", $Method, NULL), $this);
            $this->s_AnioReporte->DSType = dsSQL;
            $this->s_AnioReporte->DataSource = new clsDBcnDisenio();
            $this->s_AnioReporte->ds = & $this->s_AnioReporte->DataSource;
            list($this->s_AnioReporte->BoundColumn, $this->s_AnioReporte->TextColumn, $this->s_AnioReporte->DBFormat) = array("Ano", "Ano", "");
            $this->s_AnioReporte->DataSource->SQL = "SELECT * \n" .
            "FROM mc_c_anio  {SQL_OrderBy}";
            $this->s_AnioReporte->DataSource->Order = "ano";
            $this->s_Requerimiento = new clsControl(ccsTextBox, "s_Requerimiento", "s_Requerimiento", ccsText, "", CCGetRequestParam("s_Requerimiento", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @25-F811683F
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_MesReporte->Validate() && $Validation);
        $Validation = ($this->s_AnioReporte->Validate() && $Validation);
        $Validation = ($this->s_Requerimiento->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MesReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_AnioReporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Requerimiento->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @25-9E5CF4A1
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_MesReporte->Errors->Count());
        $errors = ($errors || $this->s_AnioReporte->Errors->Count());
        $errors = ($errors || $this->s_Requerimiento->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @25-244CA671
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
        $Redirect = "ReqTecList.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "ReqTecList.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @25-0EFAA359
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
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MesReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_AnioReporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Requerimiento->Errors->ToString());
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
        $this->s_Requerimiento->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End grdDetalleRS1 Class @25-FCB6E20C

//Include Page implementation @74-1C97D460
include_once(RelativePath . "/MenuTablero.php");
//End Include Page implementation

class clsGridgrdDetalleRS2 { //grdDetalleRS2 class @123-761004B3

//Variables @123-14D88FB2

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
    public $Sorter_ServContractual;
    public $Sorter_ServNegocio;
    public $Sorter_id_ppmc;
    public $Sorter_Tipo;
    public $Sorter_descripci_n;
    public $Sorter_CUMPL_REQ_FUNC;
    public $Sorter_CALIDAD_PROD_TERM;
    public $Sorter_RETR_ENTREGABLE;
    public $Sorter_COMPL_RUTA_CRITICA;
    public $Sorter_EST_PROY;
    public $Sorter_DEF_FUG_AMB_PROD;
//End Variables

//Class_Initialize Event @123-05384E4F
    function clsGridgrdDetalleRS2($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdDetalleRS2";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdDetalleRS2";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdDetalleRS2DataSource($this);
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
        $this->SorterName = CCGetParam("grdDetalleRS2Order", "");
        $this->SorterDirection = CCGetParam("grdDetalleRS2Dir", "");

        $this->Panel1 = new clsPanel("Panel1", $this);
        $this->ServContractual = new clsControl(ccsLabel, "ServContractual", "ServContractual", ccsText, "", CCGetRequestParam("ServContractual", ccsGet, NULL), $this);
        $this->ServNegocio = new clsControl(ccsLabel, "ServNegocio", "ServNegocio", ccsText, "", CCGetRequestParam("ServNegocio", ccsGet, NULL), $this);
        $this->id_ppmc = new clsControl(ccsLink, "id_ppmc", "id_ppmc", ccsInteger, "", CCGetRequestParam("id_ppmc", ccsGet, NULL), $this);
        $this->id_ppmc->Page = "CalificaPPMCSAT.php";
        $this->Tipo = new clsControl(ccsLabel, "Tipo", "Tipo", ccsText, "", CCGetRequestParam("Tipo", ccsGet, NULL), $this);
        $this->descripci_n = new clsControl(ccsLabel, "descripci_n", "descripci_n", ccsText, "", CCGetRequestParam("descripci_n", ccsGet, NULL), $this);
        $this->CUMPL_REQ_FUNC = new clsControl(ccsLabel, "CUMPL_REQ_FUNC", "CUMPL_REQ_FUNC", ccsText, "", CCGetRequestParam("CUMPL_REQ_FUNC", ccsGet, NULL), $this);
        $this->imgCUMPL_REQ_FUNC = new clsControl(ccsImage, "imgCUMPL_REQ_FUNC", "imgCUMPL_REQ_FUNC", ccsText, "", CCGetRequestParam("imgCUMPL_REQ_FUNC", ccsGet, NULL), $this);
        $this->CALIDAD_PROD_TERM = new clsControl(ccsLabel, "CALIDAD_PROD_TERM", "CALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("CALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->imgCALIDAD_PROD_TERM = new clsControl(ccsImage, "imgCALIDAD_PROD_TERM", "imgCALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("imgCALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->RETR_ENTREGABLE = new clsControl(ccsLabel, "RETR_ENTREGABLE", "RETR_ENTREGABLE", ccsText, "", CCGetRequestParam("RETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->imgRETR_ENTREGABLE = new clsControl(ccsImage, "imgRETR_ENTREGABLE", "imgRETR_ENTREGABLE", ccsText, "", CCGetRequestParam("imgRETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->COMPL_RUTA_CRITICA = new clsControl(ccsLabel, "COMPL_RUTA_CRITICA", "COMPL_RUTA_CRITICA", ccsText, "", CCGetRequestParam("COMPL_RUTA_CRITICA", ccsGet, NULL), $this);
        $this->imgCOMPL_RUTA_CRITICA = new clsControl(ccsImage, "imgCOMPL_RUTA_CRITICA", "imgCOMPL_RUTA_CRITICA", ccsText, "", CCGetRequestParam("imgCOMPL_RUTA_CRITICA", ccsGet, NULL), $this);
        $this->EST_PROY = new clsControl(ccsLabel, "EST_PROY", "EST_PROY", ccsText, "", CCGetRequestParam("EST_PROY", ccsGet, NULL), $this);
        $this->imgEST_PROY = new clsControl(ccsImage, "imgEST_PROY", "imgEST_PROY", ccsText, "", CCGetRequestParam("imgEST_PROY", ccsGet, NULL), $this);
        $this->DEF_FUG_AMB_PROD = new clsControl(ccsLabel, "DEF_FUG_AMB_PROD", "DEF_FUG_AMB_PROD", ccsText, "", CCGetRequestParam("DEF_FUG_AMB_PROD", ccsGet, NULL), $this);
        $this->imgDEF_FUG_AMB_PROD = new clsControl(ccsImage, "imgDEF_FUG_AMB_PROD", "imgDEF_FUG_AMB_PROD", ccsText, "", CCGetRequestParam("imgDEF_FUG_AMB_PROD", ccsGet, NULL), $this);
        $this->IdEstimacion = new clsControl(ccsLabel, "IdEstimacion", "IdEstimacion", ccsText, "", CCGetRequestParam("IdEstimacion", ccsGet, NULL), $this);
        $this->Grid1_TotalRecords = new clsControl(ccsLabel, "Grid1_TotalRecords", "Grid1_TotalRecords", ccsText, "", CCGetRequestParam("Grid1_TotalRecords", ccsGet, NULL), $this);
        $this->Sorter_ServContractual = new clsSorter($this->ComponentName, "Sorter_ServContractual", $FileName, $this);
        $this->Sorter_ServNegocio = new clsSorter($this->ComponentName, "Sorter_ServNegocio", $FileName, $this);
        $this->Sorter_id_ppmc = new clsSorter($this->ComponentName, "Sorter_id_ppmc", $FileName, $this);
        $this->Sorter_Tipo = new clsSorter($this->ComponentName, "Sorter_Tipo", $FileName, $this);
        $this->Sorter_descripci_n = new clsSorter($this->ComponentName, "Sorter_descripci_n", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Sorter_CUMPL_REQ_FUNC = new clsSorter($this->ComponentName, "Sorter_CUMPL_REQ_FUNC", $FileName, $this);
        $this->Sorter_CALIDAD_PROD_TERM = new clsSorter($this->ComponentName, "Sorter_CALIDAD_PROD_TERM", $FileName, $this);
        $this->Sorter_RETR_ENTREGABLE = new clsSorter($this->ComponentName, "Sorter_RETR_ENTREGABLE", $FileName, $this);
        $this->Sorter_COMPL_RUTA_CRITICA = new clsSorter($this->ComponentName, "Sorter_COMPL_RUTA_CRITICA", $FileName, $this);
        $this->Sorter_EST_PROY = new clsSorter($this->ComponentName, "Sorter_EST_PROY", $FileName, $this);
        $this->Sorter_DEF_FUG_AMB_PROD = new clsSorter($this->ComponentName, "Sorter_DEF_FUG_AMB_PROD", $FileName, $this);
        $this->Panel1->AddComponent("ServContractual", $this->ServContractual);
        $this->Panel1->AddComponent("ServNegocio", $this->ServNegocio);
        $this->Panel1->AddComponent("id_ppmc", $this->id_ppmc);
        $this->Panel1->AddComponent("Tipo", $this->Tipo);
        $this->Panel1->AddComponent("descripci_n", $this->descripci_n);
        $this->Panel1->AddComponent("CUMPL_REQ_FUNC", $this->CUMPL_REQ_FUNC);
        $this->Panel1->AddComponent("imgCUMPL_REQ_FUNC", $this->imgCUMPL_REQ_FUNC);
        $this->Panel1->AddComponent("CALIDAD_PROD_TERM", $this->CALIDAD_PROD_TERM);
        $this->Panel1->AddComponent("imgCALIDAD_PROD_TERM", $this->imgCALIDAD_PROD_TERM);
        $this->Panel1->AddComponent("RETR_ENTREGABLE", $this->RETR_ENTREGABLE);
        $this->Panel1->AddComponent("imgRETR_ENTREGABLE", $this->imgRETR_ENTREGABLE);
        $this->Panel1->AddComponent("COMPL_RUTA_CRITICA", $this->COMPL_RUTA_CRITICA);
        $this->Panel1->AddComponent("imgCOMPL_RUTA_CRITICA", $this->imgCOMPL_RUTA_CRITICA);
        $this->Panel1->AddComponent("EST_PROY", $this->EST_PROY);
        $this->Panel1->AddComponent("imgEST_PROY", $this->imgEST_PROY);
        $this->Panel1->AddComponent("DEF_FUG_AMB_PROD", $this->DEF_FUG_AMB_PROD);
        $this->Panel1->AddComponent("imgDEF_FUG_AMB_PROD", $this->imgDEF_FUG_AMB_PROD);
        $this->Panel1->AddComponent("IdEstimacion", $this->IdEstimacion);
    }
//End Class_Initialize Event

//Initialize Method @123-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @123-BE23A9C2
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urls_MesReporte"] = CCGetFromGet("s_MesReporte", NULL);
        $this->DataSource->Parameters["urls_AnioReporte"] = CCGetFromGet("s_AnioReporte", NULL);
        $this->DataSource->Parameters["urls_Requerimiento"] = CCGetFromGet("s_Requerimiento", NULL);

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
            $this->ControlsVisible["Panel1"] = $this->Panel1->Visible;
            $this->ControlsVisible["ServContractual"] = $this->ServContractual->Visible;
            $this->ControlsVisible["ServNegocio"] = $this->ServNegocio->Visible;
            $this->ControlsVisible["id_ppmc"] = $this->id_ppmc->Visible;
            $this->ControlsVisible["Tipo"] = $this->Tipo->Visible;
            $this->ControlsVisible["descripci_n"] = $this->descripci_n->Visible;
            $this->ControlsVisible["CUMPL_REQ_FUNC"] = $this->CUMPL_REQ_FUNC->Visible;
            $this->ControlsVisible["imgCUMPL_REQ_FUNC"] = $this->imgCUMPL_REQ_FUNC->Visible;
            $this->ControlsVisible["CALIDAD_PROD_TERM"] = $this->CALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["imgCALIDAD_PROD_TERM"] = $this->imgCALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["RETR_ENTREGABLE"] = $this->RETR_ENTREGABLE->Visible;
            $this->ControlsVisible["imgRETR_ENTREGABLE"] = $this->imgRETR_ENTREGABLE->Visible;
            $this->ControlsVisible["COMPL_RUTA_CRITICA"] = $this->COMPL_RUTA_CRITICA->Visible;
            $this->ControlsVisible["imgCOMPL_RUTA_CRITICA"] = $this->imgCOMPL_RUTA_CRITICA->Visible;
            $this->ControlsVisible["EST_PROY"] = $this->EST_PROY->Visible;
            $this->ControlsVisible["imgEST_PROY"] = $this->imgEST_PROY->Visible;
            $this->ControlsVisible["DEF_FUG_AMB_PROD"] = $this->DEF_FUG_AMB_PROD->Visible;
            $this->ControlsVisible["imgDEF_FUG_AMB_PROD"] = $this->imgDEF_FUG_AMB_PROD->Visible;
            $this->ControlsVisible["IdEstimacion"] = $this->IdEstimacion->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->ServContractual->SetValue($this->DataSource->ServContractual->GetValue());
                $this->ServNegocio->SetValue($this->DataSource->ServNegocio->GetValue());
                $this->id_ppmc->SetValue($this->DataSource->id_ppmc->GetValue());
                $this->id_ppmc->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->id_ppmc->Parameters = CCAddParam($this->id_ppmc->Parameters, "IdUniverso", $this->DataSource->f("IdUniverso"));
                $this->Tipo->SetValue($this->DataSource->Tipo->GetValue());
                $this->descripci_n->SetValue($this->DataSource->descripci_n->GetValue());
                $this->CUMPL_REQ_FUNC->SetValue($this->DataSource->CUMPL_REQ_FUNC->GetValue());
                $this->CALIDAD_PROD_TERM->SetValue($this->DataSource->CALIDAD_PROD_TERM->GetValue());
                $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
                $this->COMPL_RUTA_CRITICA->SetValue($this->DataSource->COMPL_RUTA_CRITICA->GetValue());
                $this->EST_PROY->SetValue($this->DataSource->EST_PROY->GetValue());
                $this->DEF_FUG_AMB_PROD->SetValue($this->DataSource->DEF_FUG_AMB_PROD->GetValue());
                $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Panel1->Show();
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
        $this->Grid1_TotalRecords->Show();
        $this->Sorter_ServContractual->Show();
        $this->Sorter_ServNegocio->Show();
        $this->Sorter_id_ppmc->Show();
        $this->Sorter_Tipo->Show();
        $this->Sorter_descripci_n->Show();
        $this->Navigator->Show();
        $this->Sorter_CUMPL_REQ_FUNC->Show();
        $this->Sorter_CALIDAD_PROD_TERM->Show();
        $this->Sorter_RETR_ENTREGABLE->Show();
        $this->Sorter_COMPL_RUTA_CRITICA->Show();
        $this->Sorter_EST_PROY->Show();
        $this->Sorter_DEF_FUG_AMB_PROD->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @123-299D31B9
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ServContractual->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ServNegocio->Errors->ToString());
        $errors = ComposeStrings($errors, $this->id_ppmc->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Tipo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->descripci_n->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUMPL_REQ_FUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCUMPL_REQ_FUNC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgRETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->COMPL_RUTA_CRITICA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCOMPL_RUTA_CRITICA->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EST_PROY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgEST_PROY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DEF_FUG_AMB_PROD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgDEF_FUG_AMB_PROD->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IdEstimacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdDetalleRS2 Class @123-FCB6E20C

class clsgrdDetalleRS2DataSource extends clsDBcnDisenio {  //grdDetalleRS2DataSource Class @123-105BC785

//DataSource Variables @123-48CCB48B
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $ServContractual;
    public $ServNegocio;
    public $id_ppmc;
    public $Tipo;
    public $descripci_n;
    public $CUMPL_REQ_FUNC;
    public $CALIDAD_PROD_TERM;
    public $RETR_ENTREGABLE;
    public $COMPL_RUTA_CRITICA;
    public $EST_PROY;
    public $DEF_FUG_AMB_PROD;
    public $IdEstimacion;
//End DataSource Variables

//DataSourceClass_Initialize Event @123-2AB3991C
    function clsgrdDetalleRS2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdDetalleRS2";
        $this->Initialize();
        $this->ServContractual = new clsField("ServContractual", ccsText, "");
        
        $this->ServNegocio = new clsField("ServNegocio", ccsText, "");
        
        $this->id_ppmc = new clsField("id_ppmc", ccsInteger, "");
        
        $this->Tipo = new clsField("Tipo", ccsText, "");
        
        $this->descripci_n = new clsField("descripci_n", ccsText, "");
        
        $this->CUMPL_REQ_FUNC = new clsField("CUMPL_REQ_FUNC", ccsText, "");
        
        $this->CALIDAD_PROD_TERM = new clsField("CALIDAD_PROD_TERM", ccsText, "");
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsText, "");
        
        $this->COMPL_RUTA_CRITICA = new clsField("COMPL_RUTA_CRITICA", ccsText, "");
        
        $this->EST_PROY = new clsField("EST_PROY", ccsText, "");
        
        $this->DEF_FUG_AMB_PROD = new clsField("DEF_FUG_AMB_PROD", ccsText, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @123-3D5EEF2B
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "c.id_ppmc, u.TipoPPMC desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_ServContractual" => array("ServContractual", ""), 
            "Sorter_ServNegocio" => array("ServNegocio", ""), 
            "Sorter_id_ppmc" => array("id_ppmc", ""), 
            "Sorter_Tipo" => array("Tipo", ""), 
            "Sorter_descripci_n" => array("descripción", ""), 
            "Sorter_CUMPL_REQ_FUNC" => array("CUMPL_REQ_FUNC", ""), 
            "Sorter_CALIDAD_PROD_TERM" => array("CALIDAD_PROD_TERM", ""), 
            "Sorter_RETR_ENTREGABLE" => array("RETR_ENTREGABLE", ""), 
            "Sorter_COMPL_RUTA_CRITICA" => array("COMPL_RUTA_CRITICA", ""), 
            "Sorter_EST_PROY" => array("EST_PROY", ""), 
            "Sorter_DEF_FUG_AMB_PROD" => array("DEF_FUG_AMB_PROD", "")));
    }
//End SetOrder Method

//Prepare Method @123-FC68702D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], 0, false);
        $this->wp->AddParameter("2", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], 0, false);
        $this->wp->AddParameter("3", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], 0, false);
        $this->wp->AddParameter("4", "urls_Requerimiento", ccsText, "", "", $this->Parameters["urls_Requerimiento"], "", false);
    }
//End Prepare Method

//Open Method @123-5F049FB9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select sc.Descripcion ServContractual, sn.nombre  ServNegocio, c.id_ppmc, t.Descripcion Tipo, \n" .
        "	c.descripción, c.HERR_EST_COST, c.REQ_SERV, c.CUMPL_REQ_FUNC, c.CALIDAD_PROD_TERM, c.RETR_ENTREGABLE, c.COMPL_RUTA_CRITICA,\n" .
        "	c.EST_PROY, c.DEF_FUG_AMB_PROD ,  c.Obs_manuales, c.id_servicio_negocio,\n" .
        "	'Nivel de Servicio: Retraso en Entregables. '  +  i.observaciones ObsRetrEnt,  \n" .
        "	'Nivel de Servicio: Defectos Fugados a Producción. ' + df.observaciones ObsDefFug,  \n" .
        "	'Nivel de Servicio: Requisitos Funcionales. ' + rf.observaciones ObsReqFun,  \n" .
        "	'Nivel de Servicio: Calidad de Productos Terminados/Retraso en Entregables. ' + ca.observaciones  ObsCalidad,\n" .
        "	'Nivel de Servicio: Estimación de Proyectos.' + ep.Observaciones ObsEstProy, \n" .
        "	ap.observaciones Obs_Apertura ,\n" .
        "	c.IdUniverso, u.medido, mcSAT.Obs_Manuales Obs_SAT,\n" .
        "	u.mestransicion, u.IdEstimacion\n" .
        "from mc_calificacion_rs_MC c\n" .
        "	inner join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "	inner join mc_c_ServContractual sc on sc.Id = c.id_servicio_cont and id_tipo_servicio = 2\n" .
        "	left join mc_c_TipoPPMC  t on t.Id = c.id_tipo \n" .
        "	left join mc_info_rs_cr_re_rc i on i.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "    left join mc_info_rs_cr_EP ep on ep.id = c.iduniverso\n" .
        "    left join mc_info_rs_ap_ec ap on ap.id = c.iduniverso\n" .
        "    left join mc_universo_cds u on u.id = c.iduniverso\n" .
        "    left join mc_calificacion_rs_SAT mcSAT on mcSAT.IdUniverso = c.IdUniverso\n" .
        "where (c.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0 )\n" .
        "	and (c.MesReporte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0)\n" .
        "	and (c.AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "	and (u.EsReqTecnico =1) \n" .
        "	and u.Tipo = 'PC'\n" .
        "	and (numero = '" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "' or ReqTecnico ='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "' or ''='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "'\n" .
        "	     or ReqTecnico IN (select reqtecnico from mc_universo_cds where numero ='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "'))) cnt";
        $this->SQL = "select TOP {SqlParam_endRecord} sc.Descripcion ServContractual, sn.nombre  ServNegocio, c.id_ppmc, t.Descripcion Tipo, \n" .
        "	c.descripción, c.HERR_EST_COST, c.REQ_SERV, c.CUMPL_REQ_FUNC, c.CALIDAD_PROD_TERM, c.RETR_ENTREGABLE, c.COMPL_RUTA_CRITICA,\n" .
        "	c.EST_PROY, c.DEF_FUG_AMB_PROD ,  c.Obs_manuales, c.id_servicio_negocio,\n" .
        "	'Nivel de Servicio: Retraso en Entregables. '  +  i.observaciones ObsRetrEnt,  \n" .
        "	'Nivel de Servicio: Defectos Fugados a Producción. ' + df.observaciones ObsDefFug,  \n" .
        "	'Nivel de Servicio: Requisitos Funcionales. ' + rf.observaciones ObsReqFun,  \n" .
        "	'Nivel de Servicio: Calidad de Productos Terminados/Retraso en Entregables. ' + ca.observaciones  ObsCalidad,\n" .
        "	'Nivel de Servicio: Estimación de Proyectos.' + ep.Observaciones ObsEstProy, \n" .
        "	ap.observaciones Obs_Apertura ,\n" .
        "	c.IdUniverso, u.medido, mcSAT.Obs_Manuales Obs_SAT,\n" .
        "	u.mestransicion, u.IdEstimacion\n" .
        "from mc_calificacion_rs_MC c\n" .
        "	inner join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "	inner join mc_c_ServContractual sc on sc.Id = c.id_servicio_cont and id_tipo_servicio = 2\n" .
        "	left join mc_c_TipoPPMC  t on t.Id = c.id_tipo \n" .
        "	left join mc_info_rs_cr_re_rc i on i.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_deffug df on df.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_RF rf on  rf.id = c.iduniverso\n" .
        "    left join mc_info_rs_cr_calidad ca on ca.id = c.Iduniverso \n" .
        "    left join mc_info_rs_cr_EP ep on ep.id = c.iduniverso\n" .
        "    left join mc_info_rs_ap_ec ap on ap.id = c.iduniverso\n" .
        "    left join mc_universo_cds u on u.id = c.iduniverso\n" .
        "    left join mc_calificacion_rs_SAT mcSAT on mcSAT.IdUniverso = c.IdUniverso\n" .
        "where (c.id_proveedor = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0 )\n" .
        "	and (c.MesReporte = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "=0)\n" .
        "	and (c.AnioReporte = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "=0)\n" .
        "	and (u.EsReqTecnico =1) \n" .
        "	and u.Tipo = 'PC'\n" .
        "	and (numero = '" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "' or ReqTecnico ='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "' or ''='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "'\n" .
        "	     or ReqTecnico IN (select reqtecnico from mc_universo_cds where numero ='" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "')) {SQL_OrderBy}";
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

//SetValues Method @123-1EE8942D
    function SetValues()
    {
        $this->ServContractual->SetDBValue($this->f("ServContractual"));
        $this->ServNegocio->SetDBValue($this->f("ServNegocio"));
        $this->id_ppmc->SetDBValue(trim($this->f("id_ppmc")));
        $this->Tipo->SetDBValue($this->f("Tipo"));
        $this->descripci_n->SetDBValue($this->f("descripción"));
        $this->CUMPL_REQ_FUNC->SetDBValue($this->f("CUMPL_REQ_FUNC"));
        $this->CALIDAD_PROD_TERM->SetDBValue($this->f("CALIDAD_PROD_TERM"));
        $this->RETR_ENTREGABLE->SetDBValue($this->f("RETR_ENTREGABLE"));
        $this->COMPL_RUTA_CRITICA->SetDBValue($this->f("COMPL_RUTA_CRITICA"));
        $this->EST_PROY->SetDBValue($this->f("EST_PROY"));
        $this->DEF_FUG_AMB_PROD->SetDBValue($this->f("DEF_FUG_AMB_PROD"));
        $this->IdEstimacion->SetDBValue($this->f("IdEstimacion"));
    }
//End SetValues Method

} //End grdDetalleRS2DataSource Class @123-FCB6E20C





//Initialize Page @1-C1CF502F
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
$TemplateFileName = "ReqTecList.html";
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

//Include events file @1-48514ABB
include_once("./ReqTecList_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-33968171
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$grdDetalleRS = new clsGridgrdDetalleRS("", $MainPage);
$grdDetalleRS1 = new clsRecordgrdDetalleRS1("", $MainPage);
$MenuTablero = new clsMenuTablero("", "MenuTablero", $MainPage);
$MenuTablero->Initialize();
$grdDetalleRS2 = new clsGridgrdDetalleRS2("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->grdDetalleRS = & $grdDetalleRS;
$MainPage->grdDetalleRS1 = & $grdDetalleRS1;
$MainPage->MenuTablero = & $MenuTablero;
$MainPage->grdDetalleRS2 = & $grdDetalleRS2;
$grdDetalleRS->Initialize();
$grdDetalleRS2->Initialize();
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

//Execute Components @1-FEFF6439
$MenuTablero->Operations();
$grdDetalleRS1->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-B28221D3
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($grdDetalleRS);
    unset($grdDetalleRS1);
    $MenuTablero->Class_Terminate();
    unset($MenuTablero);
    unset($grdDetalleRS2);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-593E551B
$Header->Show();
$grdDetalleRS->Show();
$grdDetalleRS1->Show();
$MenuTablero->Show();
$grdDetalleRS2->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-1D91372F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($grdDetalleRS);
unset($grdDetalleRS1);
$MenuTablero->Class_Terminate();
unset($MenuTablero);
unset($grdDetalleRS2);
unset($Tpl);
//End Unload Page


?>
