<?php
//Include Common Files @1-0956DEA2
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "TableroSLAsCAPC.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridgrdSLAsCAPC { //grdSLAsCAPC class @2-E36FD0EE

//Variables @2-23B4A8C8

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
    public $Sorter_Descripcion;
    public $Sorter_Deductiva;
    public $Sorter_CALIDAD_PROD_TERM;
    public $Sorter_ReportesCompletos;
    public $Sorter_SLAsNoReportados;
    public $Sorter_DEDUC_OMISION;
    public $Sorter_UnidadesActuales;
    public $Sorter_UnidadesAnteriores;
    public $Sorter_EFIC_PRESUP;
    public $Sorter_DiasPlaneados;
    public $Sorter_DiasReales;
    public $Sorter_RETR_ENTREGABLE;
    public $Sorter_pctcalidad;
//End Variables

//Class_Initialize Event @2-FC304B03
    function clsGridgrdSLAsCAPC($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "grdSLAsCAPC";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid grdSLAsCAPC";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsgrdSLAsCAPCDataSource($this);
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
        $this->SorterName = CCGetParam("grdSLAsCAPCOrder", "");
        $this->SorterDirection = CCGetParam("grdSLAsCAPCDir", "");

        $this->Descripcion = new clsControl(ccsLabel, "Descripcion", "Descripcion", ccsText, "", CCGetRequestParam("Descripcion", ccsGet, NULL), $this);
        $this->Deductiva = new clsControl(ccsLabel, "Deductiva", "Deductiva", ccsText, "", CCGetRequestParam("Deductiva", ccsGet, NULL), $this);
        $this->ReportesCompletos = new clsControl(ccsLabel, "ReportesCompletos", "ReportesCompletos", ccsText, "", CCGetRequestParam("ReportesCompletos", ccsGet, NULL), $this);
        $this->SLAsNoReportados = new clsControl(ccsLabel, "SLAsNoReportados", "SLAsNoReportados", ccsText, "", CCGetRequestParam("SLAsNoReportados", ccsGet, NULL), $this);
        $this->DEDUC_OMISION = new clsControl(ccsLabel, "DEDUC_OMISION", "DEDUC_OMISION", ccsText, "", CCGetRequestParam("DEDUC_OMISION", ccsGet, NULL), $this);
        $this->UnidadesActuales = new clsControl(ccsLabel, "UnidadesActuales", "UnidadesActuales", ccsText, "", CCGetRequestParam("UnidadesActuales", ccsGet, NULL), $this);
        $this->UnidadesAnteriores = new clsControl(ccsLabel, "UnidadesAnteriores", "UnidadesAnteriores", ccsText, "", CCGetRequestParam("UnidadesAnteriores", ccsGet, NULL), $this);
        $this->DiasPlaneados = new clsControl(ccsLabel, "DiasPlaneados", "DiasPlaneados", ccsText, "", CCGetRequestParam("DiasPlaneados", ccsGet, NULL), $this);
        $this->DiasReales = new clsControl(ccsLabel, "DiasReales", "DiasReales", ccsText, "", CCGetRequestParam("DiasReales", ccsGet, NULL), $this);
        $this->RETR_ENTREGABLE = new clsControl(ccsLabel, "RETR_ENTREGABLE", "RETR_ENTREGABLE", ccsText, "", CCGetRequestParam("RETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->pctcalidad = new clsControl(ccsLabel, "pctcalidad", "pctcalidad", ccsText, "", CCGetRequestParam("pctcalidad", ccsGet, NULL), $this);
        $this->Label1 = new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", ccsGet, NULL), $this);
        $this->imgCALIDAD_PROD_TERM = new clsControl(ccsImage, "imgCALIDAD_PROD_TERM", "imgCALIDAD_PROD_TERM", ccsText, "", CCGetRequestParam("imgCALIDAD_PROD_TERM", ccsGet, NULL), $this);
        $this->imgDEDUC_OMISION = new clsControl(ccsImage, "imgDEDUC_OMISION", "imgDEDUC_OMISION", ccsText, "", CCGetRequestParam("imgDEDUC_OMISION", ccsGet, NULL), $this);
        $this->Label2 = new clsControl(ccsLabel, "Label2", "Label2", ccsText, "", CCGetRequestParam("Label2", ccsGet, NULL), $this);
        $this->imgEFIC_PRESUP = new clsControl(ccsImage, "imgEFIC_PRESUP", "imgEFIC_PRESUP", ccsText, "", CCGetRequestParam("imgEFIC_PRESUP", ccsGet, NULL), $this);
        $this->imgRETR_ENTREGABLE = new clsControl(ccsImage, "imgRETR_ENTREGABLE", "imgRETR_ENTREGABLE", ccsText, "", CCGetRequestParam("imgRETR_ENTREGABLE", ccsGet, NULL), $this);
        $this->Sorter_Descripcion = new clsSorter($this->ComponentName, "Sorter_Descripcion", $FileName, $this);
        $this->Sorter_Deductiva = new clsSorter($this->ComponentName, "Sorter_Deductiva", $FileName, $this);
        $this->Sorter_CALIDAD_PROD_TERM = new clsSorter($this->ComponentName, "Sorter_CALIDAD_PROD_TERM", $FileName, $this);
        $this->Sorter_ReportesCompletos = new clsSorter($this->ComponentName, "Sorter_ReportesCompletos", $FileName, $this);
        $this->Sorter_SLAsNoReportados = new clsSorter($this->ComponentName, "Sorter_SLAsNoReportados", $FileName, $this);
        $this->Sorter_DEDUC_OMISION = new clsSorter($this->ComponentName, "Sorter_DEDUC_OMISION", $FileName, $this);
        $this->Sorter_UnidadesActuales = new clsSorter($this->ComponentName, "Sorter_UnidadesActuales", $FileName, $this);
        $this->Sorter_UnidadesAnteriores = new clsSorter($this->ComponentName, "Sorter_UnidadesAnteriores", $FileName, $this);
        $this->Sorter_EFIC_PRESUP = new clsSorter($this->ComponentName, "Sorter_EFIC_PRESUP", $FileName, $this);
        $this->Sorter_DiasPlaneados = new clsSorter($this->ComponentName, "Sorter_DiasPlaneados", $FileName, $this);
        $this->Sorter_DiasReales = new clsSorter($this->ComponentName, "Sorter_DiasReales", $FileName, $this);
        $this->Sorter_RETR_ENTREGABLE = new clsSorter($this->ComponentName, "Sorter_RETR_ENTREGABLE", $FileName, $this);
        $this->Sorter_pctcalidad = new clsSorter($this->ComponentName, "Sorter_pctcalidad", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
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

//Show Method @2-32494C9E
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

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
            $this->ControlsVisible["Descripcion"] = $this->Descripcion->Visible;
            $this->ControlsVisible["Deductiva"] = $this->Deductiva->Visible;
            $this->ControlsVisible["ReportesCompletos"] = $this->ReportesCompletos->Visible;
            $this->ControlsVisible["SLAsNoReportados"] = $this->SLAsNoReportados->Visible;
            $this->ControlsVisible["DEDUC_OMISION"] = $this->DEDUC_OMISION->Visible;
            $this->ControlsVisible["UnidadesActuales"] = $this->UnidadesActuales->Visible;
            $this->ControlsVisible["UnidadesAnteriores"] = $this->UnidadesAnteriores->Visible;
            $this->ControlsVisible["DiasPlaneados"] = $this->DiasPlaneados->Visible;
            $this->ControlsVisible["DiasReales"] = $this->DiasReales->Visible;
            $this->ControlsVisible["RETR_ENTREGABLE"] = $this->RETR_ENTREGABLE->Visible;
            $this->ControlsVisible["pctcalidad"] = $this->pctcalidad->Visible;
            $this->ControlsVisible["Label1"] = $this->Label1->Visible;
            $this->ControlsVisible["imgCALIDAD_PROD_TERM"] = $this->imgCALIDAD_PROD_TERM->Visible;
            $this->ControlsVisible["imgDEDUC_OMISION"] = $this->imgDEDUC_OMISION->Visible;
            $this->ControlsVisible["Label2"] = $this->Label2->Visible;
            $this->ControlsVisible["imgEFIC_PRESUP"] = $this->imgEFIC_PRESUP->Visible;
            $this->ControlsVisible["imgRETR_ENTREGABLE"] = $this->imgRETR_ENTREGABLE->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Descripcion->SetValue($this->DataSource->Descripcion->GetValue());
                $this->Deductiva->SetValue($this->DataSource->Deductiva->GetValue());
                $this->ReportesCompletos->SetValue($this->DataSource->ReportesCompletos->GetValue());
                $this->SLAsNoReportados->SetValue($this->DataSource->SLAsNoReportados->GetValue());
                $this->DEDUC_OMISION->SetValue($this->DataSource->DEDUC_OMISION->GetValue());
                $this->UnidadesActuales->SetValue($this->DataSource->UnidadesActuales->GetValue());
                $this->UnidadesAnteriores->SetValue($this->DataSource->UnidadesAnteriores->GetValue());
                $this->DiasPlaneados->SetValue($this->DataSource->DiasPlaneados->GetValue());
                $this->DiasReales->SetValue($this->DataSource->DiasReales->GetValue());
                $this->RETR_ENTREGABLE->SetValue($this->DataSource->RETR_ENTREGABLE->GetValue());
                $this->pctcalidad->SetValue($this->DataSource->pctcalidad->GetValue());
                $this->Label1->SetText("No Aplica para este Servicio");
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Descripcion->Show();
                $this->Deductiva->Show();
                $this->ReportesCompletos->Show();
                $this->SLAsNoReportados->Show();
                $this->DEDUC_OMISION->Show();
                $this->UnidadesActuales->Show();
                $this->UnidadesAnteriores->Show();
                $this->DiasPlaneados->Show();
                $this->DiasReales->Show();
                $this->RETR_ENTREGABLE->Show();
                $this->pctcalidad->Show();
                $this->Label1->Show();
                $this->imgCALIDAD_PROD_TERM->Show();
                $this->imgDEDUC_OMISION->Show();
                $this->Label2->Show();
                $this->imgEFIC_PRESUP->Show();
                $this->imgRETR_ENTREGABLE->Show();
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
        $this->Sorter_Descripcion->Show();
        $this->Sorter_Deductiva->Show();
        $this->Sorter_CALIDAD_PROD_TERM->Show();
        $this->Sorter_ReportesCompletos->Show();
        $this->Sorter_SLAsNoReportados->Show();
        $this->Sorter_DEDUC_OMISION->Show();
        $this->Sorter_UnidadesActuales->Show();
        $this->Sorter_UnidadesAnteriores->Show();
        $this->Sorter_EFIC_PRESUP->Show();
        $this->Sorter_DiasPlaneados->Show();
        $this->Sorter_DiasReales->Show();
        $this->Sorter_RETR_ENTREGABLE->Show();
        $this->Sorter_pctcalidad->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-FA357315
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Descripcion->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Deductiva->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportesCompletos->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SLAsNoReportados->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DEDUC_OMISION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UnidadesActuales->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UnidadesAnteriores->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DiasPlaneados->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DiasReales->Errors->ToString());
        $errors = ComposeStrings($errors, $this->RETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->pctcalidad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Label1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgCALIDAD_PROD_TERM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgDEDUC_OMISION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Label2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgEFIC_PRESUP->Errors->ToString());
        $errors = ComposeStrings($errors, $this->imgRETR_ENTREGABLE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End grdSLAsCAPC Class @2-FCB6E20C

class clsgrdSLAsCAPCDataSource extends clsDBcnDisenio {  //grdSLAsCAPCDataSource Class @2-65A90E3B

//DataSource Variables @2-A6D07B7C
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Descripcion;
    public $Deductiva;
    public $ReportesCompletos;
    public $SLAsNoReportados;
    public $DEDUC_OMISION;
    public $UnidadesActuales;
    public $UnidadesAnteriores;
    public $DiasPlaneados;
    public $DiasReales;
    public $RETR_ENTREGABLE;
    public $pctcalidad;
    public $Label1;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-DB46C1F7
    function clsgrdSLAsCAPCDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid grdSLAsCAPC";
        $this->Initialize();
        $this->Descripcion = new clsField("Descripcion", ccsText, "");
        
        $this->Deductiva = new clsField("Deductiva", ccsText, "");
        
        $this->ReportesCompletos = new clsField("ReportesCompletos", ccsText, "");
        
        $this->SLAsNoReportados = new clsField("SLAsNoReportados", ccsText, "");
        
        $this->DEDUC_OMISION = new clsField("DEDUC_OMISION", ccsText, "");
        
        $this->UnidadesActuales = new clsField("UnidadesActuales", ccsText, "");
        
        $this->UnidadesAnteriores = new clsField("UnidadesAnteriores", ccsText, "");
        
        $this->DiasPlaneados = new clsField("DiasPlaneados", ccsText, "");
        
        $this->DiasReales = new clsField("DiasReales", ccsText, "");
        
        $this->RETR_ENTREGABLE = new clsField("RETR_ENTREGABLE", ccsText, "");
        
        $this->pctcalidad = new clsField("pctcalidad", ccsText, "");
        
        $this->Label1 = new clsField("Label1", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-3D1FC979
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Descripcion" => array("Descripcion", ""), 
            "Sorter_Deductiva" => array("Deductiva", ""), 
            "Sorter_CALIDAD_PROD_TERM" => array("CALIDAD_PROD_TERM", ""), 
            "Sorter_ReportesCompletos" => array("ReportesCompletos", ""), 
            "Sorter_SLAsNoReportados" => array("SLAsNoReportados", ""), 
            "Sorter_DEDUC_OMISION" => array("DEDUC_OMISION", ""), 
            "Sorter_UnidadesActuales" => array("UnidadesActuales", ""), 
            "Sorter_UnidadesAnteriores" => array("UnidadesAnteriores", ""), 
            "Sorter_EFIC_PRESUP" => array("EFIC_PRESUP", ""), 
            "Sorter_DiasPlaneados" => array("DiasPlaneados", ""), 
            "Sorter_DiasReales" => array("DiasReales", ""), 
            "Sorter_RETR_ENTREGABLE" => array("RETR_ENTREGABLE", ""), 
            "Sorter_pctcalidad" => array("pctcalidad", "")));
    }
//End SetOrder Method

//Prepare Method @2-D189120C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_MesReporte", ccsInteger, "", "", $this->Parameters["urls_MesReporte"], 0, false);
        $this->wp->AddParameter("2", "urls_AnioReporte", ccsInteger, "", "", $this->Parameters["urls_AnioReporte"], 0, false);
    }
//End Prepare Method

//Open Method @2-233F630A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select \n" .
        "	v.Descripcion , \n" .
        "	max(c.Deductiva) Deductiva,\n" .
        "	max(cast(c.CALIDAD_PROD_TERM as int)) CALIDAD_PROD_TERM ,\n" .
        "	sum(c.ReportesCompletos) ReportesCompletos,\n" .
        "	sum(c.SLAsNoReportados) SLAsNoReportados,\n" .
        "	max(cast(c.DEDUC_OMISION as int)) DEDUC_OMISION,\n" .
        "	sum(cast(c.UnidadesActuales as int)) UnidadesActuales,\n" .
        "	sum(cast(c.UnidadesAnteriores as int)) UnidadesAnteriores,  \n" .
        "	max(cast(c.EFIC_PRESUP as int)) EFIC_PRESUP,\n" .
        "	sum(cast(c.DiasPlaneados as int)) DiasPlaneados,\n" .
        "	sum(cast(c.DiasReales as int)) DiasReales,\n" .
        "	max(cast(c.RETR_ENTREGABLE as int)) RETR_ENTREGABLE,\n" .
        "	v.id IdServCont\n" .
        "	, avg(c.pctcalidad) pctcalidad\n" .
        "from dbo.mc_c_ServContractual v \n" .
        "     left join mc_calificacion_CAPC c \n" .
        "	on v.id = c.id_serviciocont and mes=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "where v.Aplica ='CAPC'\n" .
        "group by 	\n" .
        "	v.Descripcion ,\n" .
        "	v.id \n" .
        ") cnt";
        $this->SQL = "select \n" .
        "	v.Descripcion , \n" .
        "	max(c.Deductiva) Deductiva,\n" .
        "	max(cast(c.CALIDAD_PROD_TERM as int)) CALIDAD_PROD_TERM ,\n" .
        "	sum(c.ReportesCompletos) ReportesCompletos,\n" .
        "	sum(c.SLAsNoReportados) SLAsNoReportados,\n" .
        "	max(cast(c.DEDUC_OMISION as int)) DEDUC_OMISION,\n" .
        "	sum(cast(c.UnidadesActuales as int)) UnidadesActuales,\n" .
        "	sum(cast(c.UnidadesAnteriores as int)) UnidadesAnteriores,  \n" .
        "	max(cast(c.EFIC_PRESUP as int)) EFIC_PRESUP,\n" .
        "	sum(cast(c.DiasPlaneados as int)) DiasPlaneados,\n" .
        "	sum(cast(c.DiasReales as int)) DiasReales,\n" .
        "	max(cast(c.RETR_ENTREGABLE as int)) RETR_ENTREGABLE,\n" .
        "	v.id IdServCont\n" .
        "	, avg(c.pctcalidad) pctcalidad\n" .
        "from dbo.mc_c_ServContractual v \n" .
        "     left join mc_calificacion_CAPC c \n" .
        "	on v.id = c.id_serviciocont and mes=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsInteger) . " and anio = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "where v.Aplica ='CAPC'\n" .
        "group by 	\n" .
        "	v.Descripcion ,\n" .
        "	v.id \n" .
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

//SetValues Method @2-BD36532B
    function SetValues()
    {
        $this->Descripcion->SetDBValue($this->f("Descripcion"));
        $this->Deductiva->SetDBValue($this->f("Deductiva"));
        $this->ReportesCompletos->SetDBValue($this->f("ReportesCompletos"));
        $this->SLAsNoReportados->SetDBValue($this->f("SLAsNoReportados"));
        $this->DEDUC_OMISION->SetDBValue($this->f("DEDUC_OMISION"));
        $this->UnidadesActuales->SetDBValue($this->f("UnidadesActuales"));
        $this->UnidadesAnteriores->SetDBValue($this->f("UnidadesAnteriores"));
        $this->DiasPlaneados->SetDBValue($this->f("DiasPlaneados"));
        $this->DiasReales->SetDBValue($this->f("DiasReales"));
        $this->RETR_ENTREGABLE->SetDBValue($this->f("RETR_ENTREGABLE"));
        $this->pctcalidad->SetDBValue($this->f("pctcalidad"));
    }
//End SetValues Method

} //End grdSLAsCAPCDataSource Class @2-FCB6E20C

//Initialize Page @1-3D96F65A
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
$TemplateFileName = "TableroSLAsCAPC.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-28DB8C6E
CCSecurityRedirect("5", "");
//End Authenticate User

//Include events file @1-124C6914
include_once("./TableroSLAsCAPC_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-05392E84
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$grdSLAsCAPC = new clsGridgrdSLAsCAPC("", $MainPage);
$MainPage->grdSLAsCAPC = & $grdSLAsCAPC;
$grdSLAsCAPC->Initialize();
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

//Go to destination page @1-2ED4483B
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($grdSLAsCAPC);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-EF13A38E
$grdSLAsCAPC->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-BF7B4704
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($grdSLAsCAPC);
unset($Tpl);
//End Unload Page


?>
