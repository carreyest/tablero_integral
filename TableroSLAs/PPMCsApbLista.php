<?php
//Include Common Files @1-CBE6CA86
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "PPMCsApbLista.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @2-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsGridgrdReqsApertura { //grdReqsApertura class @3-5176C7F6

//Variables @3-FA91E133

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
    public $Sorter_ID_PPMC;
    public $Sorter_SERVICIO_NEGOCIO;
    public $Sorter_nombre;
    public $Sorter1;
    public $Sorter2;
    public $Sorter3;
//End Variables

//Class_Initialize Event @3-5407BA1D
    function clsGridgrdReqsApertura($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdReqsApertura";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdReqsApertura";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdReqsAperturaDataSource($this);
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
        $this->SorterName = CCGetParam("grdReqsAperturaOrder", "");
        $this->SorterDirection = CCGetParam("grdReqsAperturaDir", "");

        $this->ID_PPMC = new clsControl(ccsLink, "ID_PPMC", "ID_PPMC", ccsInteger, array(True, 0, Null, "", False, array("#", "#", "#", "#"), "", 1, True, ""), CCGetRequestParam("ID_PPMC", ccsGet, NULL), $this);
        $this->ID_PPMC->Page = "PPMCsApbDetalle.php";
        $this->NAME = new clsControl(ccsLabel, "NAME", "NAME", ccsMemo, "", CCGetRequestParam("NAME", ccsGet, NULL), $this);
        $this->SERVICIO_NEGOCIO = new clsControl(ccsLabel, "SERVICIO_NEGOCIO", "SERVICIO_NEGOCIO", ccsText, "", CCGetRequestParam("SERVICIO_NEGOCIO", ccsGet, NULL), $this);
        $this->TIPO_REQUERIMIENTO = new clsControl(ccsLabel, "TIPO_REQUERIMIENTO", "TIPO_REQUERIMIENTO", ccsMemo, "", CCGetRequestParam("TIPO_REQUERIMIENTO", ccsGet, NULL), $this);
        $this->nombre = new clsControl(ccsLabel, "nombre", "nombre", ccsText, "", CCGetRequestParam("nombre", ccsGet, NULL), $this);
        $this->IdEstimacion = new clsControl(ccsLabel, "IdEstimacion", "IdEstimacion", ccsText, "", CCGetRequestParam("IdEstimacion", ccsGet, NULL), $this);
        $this->HERR_EST_COST = new clsControl(ccsLabel, "HERR_EST_COST", "HERR_EST_COST", ccsText, "", CCGetRequestParam("HERR_EST_COST", ccsGet, NULL), $this);
        $this->REQ_SERV = new clsControl(ccsLabel, "REQ_SERV", "REQ_SERV", ccsText, "", CCGetRequestParam("REQ_SERV", ccsGet, NULL), $this);
        $this->FechaAsignacion = new clsControl(ccsLabel, "FechaAsignacion", "FechaAsignacion", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn"), CCGetRequestParam("FechaAsignacion", ccsGet, NULL), $this);
        $this->FechaEntregaPropuesta = new clsControl(ccsLabel, "FechaEntregaPropuesta", "FechaEntregaPropuesta", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn"), CCGetRequestParam("FechaEntregaPropuesta", ccsGet, NULL), $this);
        $this->FechaAceptacionPropuesta = new clsControl(ccsLabel, "FechaAceptacionPropuesta", "FechaAceptacionPropuesta", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn"), CCGetRequestParam("FechaAceptacionPropuesta", ccsGet, NULL), $this);
        $this->Label1 = new clsControl(ccsLabel, "Label1", "Label1", ccsFloat, array(True, 2, Null, "", False, array("0"), array("#", "#"), 1, True, ""), CCGetRequestParam("Label1", ccsGet, NULL), $this);
        $this->imgCumpleHE = new clsControl(ccsImage, "imgCumpleHE", "imgCumpleHE", ccsText, "", CCGetRequestParam("imgCumpleHE", ccsGet, NULL), $this);
        $this->imgCumpleRS = new clsControl(ccsImage, "imgCumpleRS", "imgCumpleRS", ccsText, "", CCGetRequestParam("imgCumpleRS", ccsGet, NULL), $this);
        $this->Analista = new clsControl(ccsLabel, "Analista", "Analista", ccsText, "", CCGetRequestParam("Analista", ccsGet, NULL), $this);
        $this->ReqTec = new clsControl(ccsLink, "ReqTec", "ReqTec", ccsText, "", CCGetRequestParam("ReqTec", ccsGet, NULL), $this);
        $this->ReqTec->Page = "ReqTecList.php";
        $this->Sorter_ID_PPMC = new clsSorter($this->ComponentName, "Sorter_ID_PPMC", $FileName, $this);
        $this->Sorter_SERVICIO_NEGOCIO = new clsSorter($this->ComponentName, "Sorter_SERVICIO_NEGOCIO", $FileName, $this);
        $this->Sorter_nombre = new clsSorter($this->ComponentName, "Sorter_nombre", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Sorter1 = new clsSorter($this->ComponentName, "Sorter1", $FileName, $this);
        $this->Sorter2 = new clsSorter($this->ComponentName, "Sorter2", $FileName, $this);
        $this->Sorter3 = new clsSorter($this->ComponentName, "Sorter3", $FileName, $this);
        $this->lAnalista = new clsControl(ccsLabel, "lAnalista", "lAnalista", ccsText, "", CCGetRequestParam("lAnalista", ccsGet, NULL), $this);
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

//Show Method @3-60729ADE
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_mesparam"] = CCGetFromGet("s_mesparam", NULL);
        $this->DataSource->Parameters["urls_anioparam"] = CCGetFromGet("s_anioparam", NULL);
        $this->DataSource->Parameters["urls_id_proveedor"] = CCGetFromGet("s_id_proveedor", NULL);
        $this->DataSource->Parameters["urlsAnalista"] = CCGetFromGet("sAnalista", NULL);
        $this->DataSource->Parameters["urls_numero"] = CCGetFromGet("s_numero", NULL);
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
            $this->ControlsVisible["ID_PPMC"] = $this->ID_PPMC->Visible;
            $this->ControlsVisible["NAME"] = $this->NAME->Visible;
            $this->ControlsVisible["SERVICIO_NEGOCIO"] = $this->SERVICIO_NEGOCIO->Visible;
            $this->ControlsVisible["TIPO_REQUERIMIENTO"] = $this->TIPO_REQUERIMIENTO->Visible;
            $this->ControlsVisible["nombre"] = $this->nombre->Visible;
            $this->ControlsVisible["IdEstimacion"] = $this->IdEstimacion->Visible;
            $this->ControlsVisible["HERR_EST_COST"] = $this->HERR_EST_COST->Visible;
            $this->ControlsVisible["REQ_SERV"] = $this->REQ_SERV->Visible;
            $this->ControlsVisible["FechaAsignacion"] = $this->FechaAsignacion->Visible;
            $this->ControlsVisible["FechaEntregaPropuesta"] = $this->FechaEntregaPropuesta->Visible;
            $this->ControlsVisible["FechaAceptacionPropuesta"] = $this->FechaAceptacionPropuesta->Visible;
            $this->ControlsVisible["Label1"] = $this->Label1->Visible;
            $this->ControlsVisible["imgCumpleHE"] = $this->imgCumpleHE->Visible;
            $this->ControlsVisible["imgCumpleRS"] = $this->imgCumpleRS->Visible;
            $this->ControlsVisible["Analista"] = $this->Analista->Visible;
            $this->ControlsVisible["ReqTec"] = $this->ReqTec->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->ID_PPMC->SetValue($this->DataSource->ID_PPMC->GetValue());
                $this->ID_PPMC->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ID_PPMC->Parameters = CCAddParam($this->ID_PPMC->Parameters, "sID", $this->DataSource->f("Id"));
                $this->NAME->SetValue($this->DataSource->NAME->GetValue());
                $this->SERVICIO_NEGOCIO->SetValue($this->DataSource->SERVICIO_NEGOCIO->GetValue());
                $this->TIPO_REQUERIMIENTO->SetValue($this->DataSource->TIPO_REQUERIMIENTO->GetValue());
                $this->nombre->SetValue($this->DataSource->nombre->GetValue());
                $this->IdEstimacion->SetValue($this->DataSource->IdEstimacion->GetValue());
                $this->HERR_EST_COST->SetValue($this->DataSource->HERR_EST_COST->GetValue());
                $this->REQ_SERV->SetValue($this->DataSource->REQ_SERV->GetValue());
                $this->FechaAsignacion->SetValue($this->DataSource->FechaAsignacion->GetValue());
                $this->FechaEntregaPropuesta->SetValue($this->DataSource->FechaEntregaPropuesta->GetValue());
                $this->FechaAceptacionPropuesta->SetValue($this->DataSource->FechaAceptacionPropuesta->GetValue());
                $this->Label1->SetValue($this->DataSource->Label1->GetValue());
                $this->Analista->SetValue($this->DataSource->Analista->GetValue());
                $this->ReqTec->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->ReqTec->Parameters = CCAddParam($this->ReqTec->Parameters, "s_Requerimiento", $this->DataSource->f("ID_PPMC"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->ID_PPMC->Show();
                $this->NAME->Show();
                $this->SERVICIO_NEGOCIO->Show();
                $this->TIPO_REQUERIMIENTO->Show();
                $this->nombre->Show();
                $this->IdEstimacion->Show();
                $this->HERR_EST_COST->Show();
                $this->REQ_SERV->Show();
                $this->FechaAsignacion->Show();
                $this->FechaEntregaPropuesta->Show();
                $this->FechaAceptacionPropuesta->Show();
                $this->Label1->Show();
                $this->imgCumpleHE->Show();
                $this->imgCumpleRS->Show();
                $this->Analista->Show();
                $this->ReqTec->Show();
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
        if(!is_array($this->lAnalista->Value) && !strlen($this->lAnalista->Value) && $this->lAnalista->Value !== false)
            $this->lAnalista->SetText("Analista");
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator->TotalPages <= 1 && $this->Navigator->PageNumber == 1) || $this->Navigator->PageSize == "") {
            $this->Navigator->Visible = false;
        }
        $this->Sorter_ID_PPMC->Show();
        $this->Sorter_SERVICIO_NEGOCIO->Show();
        $this->Sorter_nombre->Show();
        $this->Navigator->Show();
        $this->Sorter1->Show();
        $this->Sorter2->Show();
        $this->Sorter3->Show();
        $this->lAnalista->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @3-817A4036
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ID_PPMC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICIO_NEGOCIO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TIPO_REQUERIMIENTO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IdEstimacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HERR_EST_COST->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REQ_SERV->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaAsignacion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaEntregaPropuesta->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FechaAceptacionPropuesta->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Label1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCumpleHE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCumpleRS->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Analista->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReqTec->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdReqsApertura Class @3-FCB6E20C

class clsgrdReqsAperturaDataSource extends clsDBcnDisenio {  //grdReqsAperturaDataSource Class @3-93EB84B2

//DataSource Variables @3-EF14F089
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $ID_PPMC;
    public $NAME;
    public $SERVICIO_NEGOCIO;
    public $TIPO_REQUERIMIENTO;
    public $nombre;
    public $IdEstimacion;
    public $HERR_EST_COST;
    public $REQ_SERV;
    public $FechaAsignacion;
    public $FechaEntregaPropuesta;
    public $FechaAceptacionPropuesta;
    public $Label1;
    public $Analista;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-44EFC116
    function clsgrdReqsAperturaDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdReqsApertura";
        $this->Initialize();
        $this->ID_PPMC = new clsField("ID_PPMC", ccsInteger, "");
        
        $this->NAME = new clsField("NAME", ccsMemo, "");
        
        $this->SERVICIO_NEGOCIO = new clsField("SERVICIO_NEGOCIO", ccsText, "");
        
        $this->TIPO_REQUERIMIENTO = new clsField("TIPO_REQUERIMIENTO", ccsMemo, "");
        
        $this->nombre = new clsField("nombre", ccsText, "");
        
        $this->IdEstimacion = new clsField("IdEstimacion", ccsText, "");
        
        $this->HERR_EST_COST = new clsField("HERR_EST_COST", ccsText, "");
        
        $this->REQ_SERV = new clsField("REQ_SERV", ccsText, "");
        
        $this->FechaAsignacion = new clsField("FechaAsignacion", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaEntregaPropuesta = new clsField("FechaEntregaPropuesta", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->FechaAceptacionPropuesta = new clsField("FechaAceptacionPropuesta", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->Label1 = new clsField("Label1", ccsFloat, "");
        
        $this->Analista = new clsField("Analista", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @3-BE7CFD4F
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_ID_PPMC" => array("ID_PPMC", ""), 
            "Sorter_SERVICIO_NEGOCIO" => array("SERVICIO_NEGOCIO", ""), 
            "Sorter_nombre" => array("nombre", ""), 
            "Sorter1" => array("NAME", ""), 
            "Sorter2" => array("TIPO_REQUERIMIENTO", ""), 
            "Sorter3" => array("IdEstimacion", "")));
    }
//End SetOrder Method

//Prepare Method @3-AA569C2C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_mesparam", ccsInteger, "", "", $this->Parameters["urls_mesparam"], date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))), false);
        $this->wp->AddParameter("2", "urls_anioparam", ccsInteger, "", "", $this->Parameters["urls_anioparam"], date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))), false);
        $this->wp->AddParameter("3", "urls_id_proveedor", ccsInteger, "", "", $this->Parameters["urls_id_proveedor"], CCGetSession("CDSPreferido"), false);
        $this->wp->AddParameter("4", "urlsAnalista", ccsText, "", "", $this->Parameters["urlsAnalista"], "", false);
        $this->wp->AddParameter("5", "urls_numero", ccsInteger, "", "", $this->Parameters["urls_numero"], 0, false);
        $this->wp->AddParameter("6", "urlsSLO", ccsInteger, "", "", $this->Parameters["urlsSLO"], 0, false);
    }
//End Prepare Method

//Open Method @3-BD7F1B3A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select cast(u.numero as integer) ID_PPMC, DatosPPMC.NAME, \n" .
        "	isnull(sn.nombre,  DatosPPMC.SERVICIO_NEGOCIO ) SERVICIO_NEGOCIO , \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) TIPO_REQUERIMIENTO,\n" .
        "	p.nombre, u.IdEstimacion, u.Id, c.HERR_EST_COST , c.REQ_SERV,\n" .
        "	i.FechaAsignacion, i.FechaEntregaPropuesta, i.FechaAceptacionPropuesta, i.HorasAprobadas, i.DiasPropuesta, \n" .
        "	i.Observaciones, i.IdTipoReq, i.id_servicio_cont,  i.idpadre, i.tipopadre, u.Analista, u.EsReqTecnico \n" .
        "from mc_universo_cds u left join \n" .
        "	(\n" .
        "SELECT DISTINCT REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "	and c.FECHA_CARGA = PPMC_Proyectos_AS.FECHA_CARGA \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) \n" .
        " and (isnull(DatosPPMC.slo,0) = u.slo or DatosPPMC.fecha_carga > '2015-06-01') -- a partir de este corte ya no hay dos cargas\n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and c.iduniverso= u.id  \n" .
        "left join mc_info_rs_ap_ec i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = i.IdTipoReq \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "where (mes = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0)\n" .
        "	and anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	AND (u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " OR 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "	AND (u.numero ='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsInteger) . "' OR 0='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsInteger) . "')\n" .
        "	and (tipo='PA' or tipo='AC')\n" .
        "	and (u.analista like '%" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "%' or u.analista  is null)\n" .
        "	and u.slo= " . $this->SQLValue($this->wp->GetDBValue("6"), ccsInteger) . ") cnt";
        $this->SQL = "select cast(u.numero as integer) ID_PPMC, DatosPPMC.NAME, \n" .
        "	isnull(sn.nombre,  DatosPPMC.SERVICIO_NEGOCIO ) SERVICIO_NEGOCIO , \n" .
        "	isnull(t.Descripcion,DatosPPMC.TIPO_REQUERIMIENTO) TIPO_REQUERIMIENTO,\n" .
        "	p.nombre, u.IdEstimacion, u.Id, c.HERR_EST_COST , c.REQ_SERV,\n" .
        "	i.FechaAsignacion, i.FechaEntregaPropuesta, i.FechaAceptacionPropuesta, i.HorasAprobadas, i.DiasPropuesta, \n" .
        "	i.Observaciones, i.IdTipoReq, i.id_servicio_cont,  i.idpadre, i.tipopadre, u.Analista, u.EsReqTecnico \n" .
        "from mc_universo_cds u left join \n" .
        "	(\n" .
        "SELECT DISTINCT REQUEST_ID ID_PPMC, NAME, SERVICIO_NEGOCIO, TIPO_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_RO_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_PROYECTO, Nombre_Proyecto, SERVICIO_NEGOCIO, TIP_REQUERIMIENTO, FECHA_CARGA, 0 PPMC_Relacionado, slo\n" .
        "	FROM PPMC_PROYECTOS_AS \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT REQ_CAMBIO_ID, DESC_BREVE, SERVICIO_NEGOCIO, TIPO_Solicitud, C.FECHA_CARGA, ID_PPMC, c.slo\n" .
        "	FROM PPMC_CAMBIOS C inner join PPMC_Proyectos_AS on PPMC_PROYECTOS_AS.ID_PROYECTO = C.ID_PPMC \n" .
        "	and c.FECHA_CARGA = PPMC_Proyectos_AS.FECHA_CARGA \n" .
        "UNION ALL\n" .
        "SELECT DISTINCT ID_CC, NOMBRE_RO, SERVICIO_NEGOCIO, MOTIVO_CAMBIO, C.FECHA_CARGA, ID_RO, c.slo\n" .
        "	FROM PPMC_CAMBIOS_RO C inner join PPMC_RO_AS  on PPMC_RO_AS.REQUEST_ID  = C.ID_RO  \n" .
        " ) as DatosPPMC on DatosPPMC.ID_PPMC = numero 	and u.mes = month(FECHA_CARGA) and u.anio = YEAR(FECHA_CARGA) \n" .
        " and (isnull(DatosPPMC.slo,0) = u.slo or DatosPPMC.fecha_carga > '2015-06-01') -- a partir de este corte ya no hay dos cargas\n" .
        "inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor \n" .
        "left join mc_calificacion_rs_MC c on c.id_ppmc = numero and c.MesReporte = u.mes and u.anio = c.AnioReporte and c.iduniverso= u.id  \n" .
        "left join mc_info_rs_ap_ec i on i.id = u.id\n" .
        "left join mc_c_TipoPPMC t on t.Id = i.IdTipoReq \n" .
        "left join mc_c_servicio sn on sn.id_servicio = c.id_servicio_negocio \n" .
        "where (mes = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " or " . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . "=0)\n" .
        "	and anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "	AND (u.id_proveedor =" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " OR 0=" . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . ")\n" .
        "	AND (u.numero ='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsInteger) . "' OR 0='" . $this->SQLValue($this->wp->GetDBValue("5"), ccsInteger) . "')\n" .
        "	and (tipo='PA' or tipo='AC')\n" .
        "	and (u.analista like '%" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "%' or u.analista  is null)\n" .
        "	and u.slo= " . $this->SQLValue($this->wp->GetDBValue("6"), ccsInteger) . "";
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

//SetValues Method @3-42C5B1AF
    function SetValues()
    {
        $this->ID_PPMC->SetDBValue(trim($this->f("ID_PPMC")));
        $this->NAME->SetDBValue($this->f("NAME"));
        $this->SERVICIO_NEGOCIO->SetDBValue($this->f("SERVICIO_NEGOCIO"));
        $this->TIPO_REQUERIMIENTO->SetDBValue($this->f("TIPO_REQUERIMIENTO"));
        $this->nombre->SetDBValue($this->f("nombre"));
        $this->IdEstimacion->SetDBValue($this->f("IdEstimacion"));
        $this->HERR_EST_COST->SetDBValue($this->f("HERR_EST_COST"));
        $this->REQ_SERV->SetDBValue($this->f("REQ_SERV"));
        $this->FechaAsignacion->SetDBValue(trim($this->f("FechaAsignacion")));
        $this->FechaEntregaPropuesta->SetDBValue(trim($this->f("FechaEntregaPropuesta")));
        $this->FechaAceptacionPropuesta->SetDBValue(trim($this->f("FechaAceptacionPropuesta")));
        $this->Label1->SetDBValue(trim($this->f("HorasAprobadas")));
        $this->Analista->SetDBValue($this->f("Analista"));
    }
//End SetValues Method

} //End grdReqsAperturaDataSource Class @3-FCB6E20C

class clsRecordgrsBusca { //grsBusca Class @21-B7E4B908

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

//Class_Initialize Event @21-ED4314BC
    function clsRecordgrsBusca($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record grsBusca/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "grsBusca";
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
            $this->s_id_proveedor->DataSource->Parameters["expr76"] = 'CDS';
            $this->s_id_proveedor->DataSource->wp = new clsSQLParameters();
            $this->s_id_proveedor->DataSource->wp->AddParameter("1", "expr76", ccsText, "", "", $this->s_id_proveedor->DataSource->Parameters["expr76"], "", false);
            $this->s_id_proveedor->DataSource->wp->Criterion[1] = $this->s_id_proveedor->DataSource->wp->Operation(opEqual, "descripcion", $this->s_id_proveedor->DataSource->wp->GetDBValue("1"), $this->s_id_proveedor->DataSource->ToSQL($this->s_id_proveedor->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->s_id_proveedor->DataSource->Where = 
                 $this->s_id_proveedor->DataSource->wp->Criterion[1];
            $this->s_numero = new clsControl(ccsTextBox, "s_numero", "Numero", ccsInteger, "", CCGetRequestParam("s_numero", $Method, NULL), $this);
            $this->s_mesparam = new clsControl(ccsListBox, "s_mesparam", "Mes", ccsInteger, "", CCGetRequestParam("s_mesparam", $Method, NULL), $this);
            $this->s_mesparam->DSType = dsTable;
            $this->s_mesparam->DataSource = new clsDBcnDisenio();
            $this->s_mesparam->ds = & $this->s_mesparam->DataSource;
            $this->s_mesparam->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_mes {SQL_Where} {SQL_OrderBy}";
            list($this->s_mesparam->BoundColumn, $this->s_mesparam->TextColumn, $this->s_mesparam->DBFormat) = array("IdMes", "Mes", "");
            $this->s_anioparam = new clsControl(ccsListBox, "s_anioparam", "Anio", ccsInteger, "", CCGetRequestParam("s_anioparam", $Method, NULL), $this);
            $this->s_anioparam->DSType = dsTable;
            $this->s_anioparam->DataSource = new clsDBcnDisenio();
            $this->s_anioparam->ds = & $this->s_anioparam->DataSource;
            $this->s_anioparam->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_anio {SQL_Where} {SQL_OrderBy}";
            list($this->s_anioparam->BoundColumn, $this->s_anioparam->TextColumn, $this->s_anioparam->DBFormat) = array("Ano", "Ano", "");
            $this->s_anioparam->DataSource->Parameters["expr119"] = 2013;
            $this->s_anioparam->DataSource->wp = new clsSQLParameters();
            $this->s_anioparam->DataSource->wp->AddParameter("1", "expr119", ccsInteger, "", "", $this->s_anioparam->DataSource->Parameters["expr119"], "", false);
            $this->s_anioparam->DataSource->wp->Criterion[1] = $this->s_anioparam->DataSource->wp->Operation(opGreaterThan, "[Ano]", $this->s_anioparam->DataSource->wp->GetDBValue("1"), $this->s_anioparam->DataSource->ToSQL($this->s_anioparam->DataSource->wp->GetDBValue("1"), ccsInteger),false);
            $this->s_anioparam->DataSource->Where = 
                 $this->s_anioparam->DataSource->wp->Criterion[1];
            $this->sAnalista = new clsControl(ccsListBox, "sAnalista", "sAnalista", ccsText, "", CCGetRequestParam("sAnalista", $Method, NULL), $this);
            $this->sAnalista->DSType = dsTable;
            $this->sAnalista->DataSource = new clsDBcnDisenio();
            $this->sAnalista->ds = & $this->sAnalista->DataSource;
            $this->sAnalista->DataSource->SQL = "SELECT * \n" .
"FROM mc_c_usuarios {SQL_Where} {SQL_OrderBy}";
            $this->sAnalista->DataSource->Order = "Usuario";
            list($this->sAnalista->BoundColumn, $this->sAnalista->TextColumn, $this->sAnalista->DBFormat) = array("Usuario", "Usuario", "");
            $this->sAnalista->DataSource->Parameters["urlGrupo"] = CCGetFromGet("Grupo", NULL);
            $this->sAnalista->DataSource->Parameters["expr148"] = 'CAPC';
            $this->sAnalista->DataSource->wp = new clsSQLParameters();
            $this->sAnalista->DataSource->wp->AddParameter("1", "urlGrupo", ccsText, "", "", $this->sAnalista->DataSource->Parameters["urlGrupo"], 'CAPC', false);
            $this->sAnalista->DataSource->wp->AddParameter("2", "expr148", ccsText, "", "", $this->sAnalista->DataSource->Parameters["expr148"], "", false);
            $this->sAnalista->DataSource->wp->Criterion[1] = $this->sAnalista->DataSource->wp->Operation(opEqual, "[Grupo]", $this->sAnalista->DataSource->wp->GetDBValue("1"), $this->sAnalista->DataSource->ToSQL($this->sAnalista->DataSource->wp->GetDBValue("1"), ccsText),false);
            $this->sAnalista->DataSource->wp->Criterion[2] = $this->sAnalista->DataSource->wp->Operation(opEqual, "[Grupo]", $this->sAnalista->DataSource->wp->GetDBValue("2"), $this->sAnalista->DataSource->ToSQL($this->sAnalista->DataSource->wp->GetDBValue("2"), ccsText),false);
            $this->sAnalista->DataSource->Where = $this->sAnalista->DataSource->wp->opAND(
                 false, 
                 $this->sAnalista->DataSource->wp->Criterion[1], 
                 $this->sAnalista->DataSource->wp->Criterion[2]);
            $this->sAnalista->DataSource->Order = "Usuario";
            $this->sSLO = new clsControl(ccsCheckBox, "sSLO", "sSLO", ccsInteger, "", CCGetRequestParam("sSLO", $Method, NULL), $this);
            $this->sSLO->CheckedValue = $this->sSLO->GetParsedValue(1);
            $this->sSLO->UncheckedValue = $this->sSLO->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->s_id_proveedor->Value) && !strlen($this->s_id_proveedor->Value) && $this->s_id_proveedor->Value !== false)
                    $this->s_id_proveedor->SetText(CCGetSession("CDSPreferido",""));
                if(!is_array($this->s_mesparam->Value) && !strlen($this->s_mesparam->Value) && $this->s_mesparam->Value !== false)
                    $this->s_mesparam->SetText(date("m",mktime(0,0,0,date("m"),date("d")-45,date("Y"))));
                if(!is_array($this->s_anioparam->Value) && !strlen($this->s_anioparam->Value) && $this->s_anioparam->Value !== false)
                    $this->s_anioparam->SetText(date("Y",mktime(0,0,0,date("m")-1,date("d"),date("Y"))));
                if(!is_array($this->sSLO->Value) && !strlen($this->sSLO->Value) && $this->sSLO->Value !== false)
                    $this->sSLO->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Validate Method @21-18F6CD14
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_id_proveedor->Validate() && $Validation);
        $Validation = ($this->s_numero->Validate() && $Validation);
        $Validation = ($this->s_mesparam->Validate() && $Validation);
        $Validation = ($this->s_anioparam->Validate() && $Validation);
        $Validation = ($this->sAnalista->Validate() && $Validation);
        $Validation = ($this->sSLO->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_id_proveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_numero->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_mesparam->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_anioparam->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sAnalista->Errors->Count() == 0);
        $Validation =  $Validation && ($this->sSLO->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @21-D489604E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_id_proveedor->Errors->Count());
        $errors = ($errors || $this->s_numero->Errors->Count());
        $errors = ($errors || $this->s_mesparam->Errors->Count());
        $errors = ($errors || $this->s_anioparam->Errors->Count());
        $errors = ($errors || $this->sAnalista->Errors->Count());
        $errors = ($errors || $this->sSLO->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @21-31EEA0B8
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
        $Redirect = "PPMCsApbLista.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "PPMCsApbLista.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @21-18485925
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
        $this->s_mesparam->Prepare();
        $this->s_anioparam->Prepare();
        $this->sAnalista->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_id_proveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_numero->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_mesparam->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_anioparam->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sAnalista->Errors->ToString());
            $Error = ComposeStrings($Error, $this->sSLO->Errors->ToString());
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
        $this->s_numero->Show();
        $this->s_mesparam->Show();
        $this->s_anioparam->Show();
        $this->sAnalista->Show();
        $this->sSLO->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End grsBusca Class @21-FCB6E20C



//Initialize Page @1-0C167EA0
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
$TemplateFileName = "PPMCsApbLista.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-DCC8390B
CCSecurityRedirect("3;4;5", "");
//End Authenticate User

//Include events file @1-73C7830E
include_once("./PPMCsApbLista_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-DADAB6FB
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$grdReqsApertura = new clsGridgrdReqsApertura("", $MainPage);
$grsBusca = new clsRecordgrsBusca("", $MainPage);
$lkCuadroNS = new clsControl(ccsLink, "lkCuadroNS", "lkCuadroNS", ccsText, "", CCGetRequestParam("lkCuadroNS", ccsGet, NULL), $MainPage);
$lkCuadroNS->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkCuadroNS->Page = "PPMCsApbCuadroNSRSxls.php";
$lkDetalleRS = new clsControl(ccsLink, "lkDetalleRS", "lkDetalleRS", ccsText, "", CCGetRequestParam("lkDetalleRS", ccsGet, NULL), $MainPage);
$lkDetalleRS->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkDetalleRS->Page = "PPMCsApbDetalleRSxls.php";
$lkTableroSLAs = new clsControl(ccsLink, "lkTableroSLAs", "lkTableroSLAs", ccsText, "", CCGetRequestParam("lkTableroSLAs", ccsGet, NULL), $MainPage);
$lkTableroSLAs->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$lkTableroSLAs->Page = "TableroSLAs.php";
$MainPage->Header = & $Header;
$MainPage->grdReqsApertura = & $grdReqsApertura;
$MainPage->grsBusca = & $grsBusca;
$MainPage->lkCuadroNS = & $lkCuadroNS;
$MainPage->lkDetalleRS = & $lkDetalleRS;
$MainPage->lkTableroSLAs = & $lkTableroSLAs;
$grdReqsApertura->Initialize();
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

//Execute Components @1-A8F5D908
$grsBusca->Operation();
$Header->Operations();
//End Execute Components

//Go to destination page @1-0F703297
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($grdReqsApertura);
    unset($grsBusca);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-53AE8C78
$Header->Show();
$grdReqsApertura->Show();
$grsBusca->Show();
$lkCuadroNS->Show();
$lkDetalleRS->Show();
$lkTableroSLAs->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-718CF781
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($grdReqsApertura);
unset($grsBusca);
unset($Tpl);
//End Unload Page


?>
