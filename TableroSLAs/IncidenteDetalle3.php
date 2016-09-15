<?php
//Include Common Files @1-D3AF159A
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "IncidenteDetalle3.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



class clsGridmc_detalle_incidente_avl { //mc_detalle_incidente_avl class @68-C662A7A0

//Variables @68-78437B9D

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

//Class_Initialize Event @68-8E84F669
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

//Initialize Method @68-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @68-3B2FA9BF
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

//GetErrors Method @68-730A08F0
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

} //End mc_detalle_incidente_avl Class @68-FCB6E20C

class clsmc_detalle_incidente_avlDataSource extends clsDBcnDisenio {  //mc_detalle_incidente_avlDataSource Class @68-05BF7EA5

//DataSource Variables @68-54BD554D
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

//DataSourceClass_Initialize Event @68-4CB2F658
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

//SetOrder Method @68-71E43B5D
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "Paquete, FechaInicioMov ";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_ClaveMovimiento" => array("ClaveMovimiento", ""), 
            "Sorter_DescMovimiento" => array("DescMovimiento", ""), 
            "Sorter_FechaInicioMov" => array("FechaInicioMov", ""), 
            "Sorter_FechaFinMov" => array("FechaFinMov", ""), 
            "Sorter_Paquete" => array("Paquete", "")));
    }
//End SetOrder Method

//Prepare Method @68-85B4A777
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId_incidente", ccsText, "", "", $this->Parameters["urlId_incidente"], "", false);
    }
//End Prepare Method

//Open Method @68-D0CCFE2F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select 	det.ClaveMovimiento, det.DescMovimiento , det.FechaInicioMov, det.FechaFinMov, det.Paquete    \n" .
        "	, dbo.ufDiffFechasMCSec(i.FechaEnCurso,i.FechaResuelto) TiempoSolucionRmdy\n" .
        "	, r.LiberacionAVL , r.CountPaquete, t.TotalSecPaquete , s.TotalHoras  \n" .
        ", dbo.ufDiffFechasMCSec(det.FechaInicioMov,  det.FechaFinMov) HorasInvertidas\n" .
        "from mc_info_incidentes i \n" .
        "	inner join mc_universo_cds u on i.Id_incidente = u.numero  and month(i.FechaCarga ) = u.mes and YEAR(fechacarga)= u.anio \n" .
        "	inner join mc_detalle_incidente_avl det on (det.Id_Incidente = i.Id_incidente or det.Id_Incidente = i.IncPadre )\n" .
        "		and month(det.FechaCarga ) = u.mes and YEAR(det.fechacarga)= u.anio \n" .
        "	inner join mc_c_movimiento m on m.ClaveMovimiento = det.ClaveMovimiento \n" .
        "	left join (select id_incidente, paquete, FechaCarga, Max(FechaFinMov) LiberacionAVL, count(FechaFinMov)  CountPaquete\n" .
        "			from mc_detalle_incidente_avl det \n" .
        "				where ClaveMovimiento ='38' OR ClaveMovimiento ='49' OR ClaveMovimiento ='36' OR ClaveMovimiento ='47' OR ClaveMovimiento ='40'\n" .
        "				group by id_incidente, Paquete, FechaCarga  \n" .
        "	) as r on r.Id_Incidente = det.Id_Incidente and r.Paquete = det.Paquete and MONTH(r.FechaCarga )= u.mes  and YEAR(r.FechaCarga )= u.anio \n" .
        "	left join (select id_incidente, paquete, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalSecPaquete\n" .
        "			from mc_detalle_incidente_avl dett\n" .
        "				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion3=1 \n" .
        "				group by id_incidente, Paquete, FechaCarga  \n" .
        "	) as t on t.Id_Incidente = det.Id_Incidente and t.Paquete = det.Paquete and MONTH(t.FechaCarga )= u.mes  and YEAR(t.FechaCarga )= u.anio \n" .
        "	left join (select id_incidente, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalHoras\n" .
        "			from mc_detalle_incidente_avl dett\n" .
        "				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion3=1 \n" .
        "				group by id_incidente, FechaCarga  \n" .
        "	) as s on s.Id_Incidente = det.Id_Incidente and MONTH(s.FechaCarga )= u.mes and YEAR(s.FechaCarga )= u.anio \n" .
        "where i.id_incidente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "	and i.Estado = 'Closed') cnt";
        $this->SQL = "select TOP {SqlParam_endRecord} 	det.ClaveMovimiento, det.DescMovimiento , det.FechaInicioMov, det.FechaFinMov, det.Paquete    \n" .
        "	, dbo.ufDiffFechasMCSec(i.FechaEnCurso,i.FechaResuelto) TiempoSolucionRmdy\n" .
        "	, r.LiberacionAVL , r.CountPaquete, t.TotalSecPaquete , s.TotalHoras  \n" .
        ", dbo.ufDiffFechasMCSec(det.FechaInicioMov,  det.FechaFinMov) HorasInvertidas\n" .
        "from mc_info_incidentes i \n" .
        "	inner join mc_universo_cds u on i.Id_incidente = u.numero  and month(i.FechaCarga ) = u.mes and YEAR(fechacarga)= u.anio \n" .
        "	inner join mc_detalle_incidente_avl det on (det.Id_Incidente = i.Id_incidente or det.Id_Incidente = i.IncPadre )\n" .
        "		and month(det.FechaCarga ) = u.mes and YEAR(det.fechacarga)= u.anio \n" .
        "	inner join mc_c_movimiento m on m.ClaveMovimiento = det.ClaveMovimiento \n" .
        "	left join (select id_incidente, paquete, FechaCarga, Max(FechaFinMov) LiberacionAVL, count(FechaFinMov)  CountPaquete\n" .
        "			from mc_detalle_incidente_avl det \n" .
        "				where ClaveMovimiento ='38' OR ClaveMovimiento ='49' OR ClaveMovimiento ='36' OR ClaveMovimiento ='47' OR ClaveMovimiento ='40'\n" .
        "				group by id_incidente, Paquete, FechaCarga  \n" .
        "	) as r on r.Id_Incidente = det.Id_Incidente and r.Paquete = det.Paquete and MONTH(r.FechaCarga )= u.mes  and YEAR(r.FechaCarga )= u.anio \n" .
        "	left join (select id_incidente, paquete, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalSecPaquete\n" .
        "			from mc_detalle_incidente_avl dett\n" .
        "				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion3=1 \n" .
        "				group by id_incidente, Paquete, FechaCarga  \n" .
        "	) as t on t.Id_Incidente = det.Id_Incidente and t.Paquete = det.Paquete and MONTH(t.FechaCarga )= u.mes  and YEAR(t.FechaCarga )= u.anio \n" .
        "	left join (select id_incidente, FechaCarga, SUM(dbo.ufDiffFechasMCSec(FechaInicioMov,FechaFinMov)) TotalHoras\n" .
        "			from mc_detalle_incidente_avl dett\n" .
        "				inner join mc_c_movimiento mov on mov.ClaveMovimiento = dett.ClaveMovimiento  and mov.issolucion3=1 \n" .
        "				group by id_incidente, FechaCarga  \n" .
        "	) as s on s.Id_Incidente = det.Id_Incidente and MONTH(s.FechaCarga )= u.mes and YEAR(s.FechaCarga )= u.anio \n" .
        "where i.id_incidente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'\n" .
        "	and i.Estado = 'Closed'\n" .
        "	 {SQL_OrderBy}";
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

//SetValues Method @68-FC84A8DC
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

} //End mc_detalle_incidente_avlDataSource Class @68-FCB6E20C

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

//Class_Initialize Event @20-3028705D
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
            $this->Label1 = new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", $Method, NULL), $this);
            $this->SeveridadApp = new clsControl(ccsLabel, "SeveridadApp", "SeveridadApp", ccsText, "", CCGetRequestParam("SeveridadApp", $Method, NULL), $this);
            $this->TiempoAtencion = new clsControl(ccsLabel, "TiempoAtencion", "TiempoAtencion", ccsText, "", CCGetRequestParam("TiempoAtencion", $Method, NULL), $this);
            $this->TiempoSolucion = new clsControl(ccsLabel, "TiempoSolucion", "TiempoSolucion", ccsText, "", CCGetRequestParam("TiempoSolucion", $Method, NULL), $this);
            $this->lMes = new clsControl(ccsLabel, "lMes", "lMes", ccsText, "", CCGetRequestParam("lMes", $Method, NULL), $this);
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

//CheckErrors Method @20-EC0117CC
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
        $errors = ($errors || $this->Label1->Errors->Count());
        $errors = ($errors || $this->SeveridadApp->Errors->Count());
        $errors = ($errors || $this->TiempoAtencion->Errors->Count());
        $errors = ($errors || $this->TiempoSolucion->Errors->Count());
        $errors = ($errors || $this->lMes->Errors->Count());
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

//Show Method @20-54D3A00A
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
                $this->Label1->SetValue($this->DataSource->Label1->GetValue());
                $this->SeveridadApp->SetValue($this->DataSource->SeveridadApp->GetValue());
                $this->TiempoAtencion->SetValue($this->DataSource->TiempoAtencion->GetValue());
                $this->TiempoSolucion->SetValue($this->DataSource->TiempoSolucion->GetValue());
                $this->lMes->SetValue($this->DataSource->lMes->GetValue());
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
            $Error = ComposeStrings($Error, $this->Label1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SeveridadApp->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TiempoAtencion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TiempoSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lMes->Errors->ToString());
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
        $this->Label1->Show();
        $this->SeveridadApp->Show();
        $this->TiempoAtencion->Show();
        $this->TiempoSolucion->Show();
        $this->lMes->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_info_incidentes Class @20-FCB6E20C

class clsmc_info_incidentesDataSource extends clsDBcnDisenio {  //mc_info_incidentesDataSource Class @20-AFE708D3

//DataSource Variables @20-71B196FE
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
    public $Label1;
    public $SeveridadApp;
    public $TiempoAtencion;
    public $TiempoSolucion;
    public $lMes;
//End DataSource Variables

//DataSourceClass_Initialize Event @20-62ACD468
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
        
        $this->Label1 = new clsField("Label1", ccsText, "");
        
        $this->SeveridadApp = new clsField("SeveridadApp", ccsText, "");
        
        $this->TiempoAtencion = new clsField("TiempoAtencion", ccsText, "");
        
        $this->TiempoSolucion = new clsField("TiempoSolucion", ccsText, "");
        
        $this->lMes = new clsField("lMes", ccsText, "");
        

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

//Open Method @20-B913A1C5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = " SELECT i.*, p.Nombre ,p.Id_Proveedor, a.severidad SeveridadApp,\n" .
        " 	(select rtrim(valor) from mc_parametros where parametro= \n" .
        "	case when a.severidad = 0 then 'TASeveridad0Segundos' when a.severidad =1 then 'TASeveridad1Segundos' \n" .
        "		 when a.severidad = 2 then 'TASeveridad2Segundos' when a.severidad =3 then 'TASeveridad3Segundos'	end ) as TiempoAtencion,\n" .
        "(select valor from mc_parametros where parametro= \n" .
        "	case when a.severidad = 0 then 'TSSeveridad0Segundos' when a.severidad =1 then 'TSSeveridad1Segundos' \n" .
        "		 when a.severidad = 2 then 'TSSeveridad2Segundos' when a.severidad =3 then 'TSSeveridad3Segundos'	end ) as TiempoSolucion,\n" .
        "		 m.Mes  , u.anio \n" .
        " FROM mc_info_incidentes i \n" .
        " 	inner join mc_universo_cds u on i.Id_incidente = u.numero  inner join mc_c_proveedor p on p.id_proveedor = u.id_proveedor and month(fechacarga)= u.mes and year(FechaCarga)= u.anio \n" .
        " 	left join mc_c_aplicacion a on rtrim(i.Aplicacion)=rtrim(a.Descripcion)\n" .
        " 	left join mc_c_mes m on m.IdMes = u.mes \n" .
        "where u.tipo ='IN'\n" .
        "AND i.Id_incidente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' \n" .
        "AND i.estado = 'Closed'";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @20-AA89D875
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
        $this->Label1->SetDBValue($this->f("Aplicacion"));
        $this->SeveridadApp->SetDBValue($this->f("SeveridadApp"));
        $this->TiempoAtencion->SetDBValue($this->f("TiempoAtencion"));
        $this->TiempoSolucion->SetDBValue($this->f("TiempoSolucion"));
        $this->lMes->SetDBValue($this->f("Mes"));
    }
//End SetValues Method

} //End mc_info_incidentesDataSource Class @20-FCB6E20C

class clsRecordmc_calificacion_incidente { //mc_calificacion_incidente Class @143-984935C7

//Variables @143-9E315808

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

//Class_Initialize Event @143-6641DDD9
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
        $this->InsertAllowed = true;
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
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->id_servicio = new clsControl(ccsHidden, "id_servicio", $CCSLocales->GetText("id_servicio"), ccsInteger, "", CCGetRequestParam("id_servicio", $Method, NULL), $this);
            $this->Cumple_Inc_TiempoAsignacion = new clsControl(ccsListBox, "Cumple_Inc_TiempoAsignacion", $CCSLocales->GetText("Cumple_Inc_TiempoAsignacion"), ccsInteger, "", CCGetRequestParam("Cumple_Inc_TiempoAsignacion", $Method, NULL), $this);
            $this->Cumple_Inc_TiempoAsignacion->DSType = dsListOfValues;
            $this->Cumple_Inc_TiempoAsignacion->Values = array(array("1", "Cumplio"), array("0", "No Cumplio"));
            $this->Cumple_Inc_TiempoSolucion = new clsControl(ccsListBox, "Cumple_Inc_TiempoSolucion", $CCSLocales->GetText("Cumple_Inc_TiempoSolucion"), ccsInteger, "", CCGetRequestParam("Cumple_Inc_TiempoSolucion", $Method, NULL), $this);
            $this->Cumple_Inc_TiempoSolucion->DSType = dsListOfValues;
            $this->Cumple_Inc_TiempoSolucion->Values = array(array("1", "Cumplio"), array("0", "No Cumplio"));
            $this->Cumple_DISP_SOPORTE = new clsControl(ccsHidden, "Cumple_DISP_SOPORTE", $CCSLocales->GetText("Cumple_DISP_SOPORTE"), ccsInteger, "", CCGetRequestParam("Cumple_DISP_SOPORTE", $Method, NULL), $this);
            $this->Obs_Manuales = new clsControl(ccsTextArea, "Obs_Manuales", $CCSLocales->GetText("Obs_Manuales"), ccsText, "", CCGetRequestParam("Obs_Manuales", $Method, NULL), $this);
            $this->Aplicacion = new clsControl(ccsLabel, "Aplicacion", "Aplicacion", ccsText, "", CCGetRequestParam("Aplicacion", $Method, NULL), $this);
            $this->Aplicacion->HTML = true;
            $this->shId_Incidente = new clsControl(ccsHidden, "shId_Incidente", "shId_Incidente", ccsText, "", CCGetRequestParam("shId_Incidente", $Method, NULL), $this);
            $this->shDescartar = new clsControl(ccsHidden, "shDescartar", "shDescartar", ccsText, "", CCGetRequestParam("shDescartar", $Method, NULL), $this);
            $this->shMes = new clsControl(ccsHidden, "shMes", "shMes", ccsText, "", CCGetRequestParam("shMes", $Method, NULL), $this);
            $this->shAnio = new clsControl(ccsHidden, "shAnio", "shAnio", ccsText, "", CCGetRequestParam("shAnio", $Method, NULL), $this);
            $this->Servicio = new clsControl(ccsLabel, "Servicio", "Servicio", ccsText, "", CCGetRequestParam("Servicio", $Method, NULL), $this);
            $this->shIdProveedor = new clsControl(ccsHidden, "shIdProveedor", "shIdProveedor", ccsText, "", CCGetRequestParam("shIdProveedor", $Method, NULL), $this);
            $this->shId_Aplicacion = new clsControl(ccsHidden, "shId_Aplicacion", "shId_Aplicacion", ccsText, "", CCGetRequestParam("shId_Aplicacion", $Method, NULL), $this);
            $this->Cancelar = new clsButton("Cancelar", $Method, $this);
            $this->slSeveridad = new clsControl(ccsListBox, "slSeveridad", "slSeveridad", ccsText, "", CCGetRequestParam("slSeveridad", $Method, NULL), $this);
            $this->slSeveridad->DSType = dsListOfValues;
            $this->slSeveridad->Values = array(array("1", "1"), array("2", "2"), array("3", "3"), array("4", "4"));
            $this->CheckBox1 = new clsControl(ccsCheckBox, "CheckBox1", "CheckBox1", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("CheckBox1", $Method, NULL), $this);
            $this->CheckBox1->CheckedValue = true;
            $this->CheckBox1->UncheckedValue = false;
            $this->TotalHorasSolucion = new clsControl(ccsLabel, "TotalHorasSolucion", "TotalHorasSolucion", ccsText, "", CCGetRequestParam("TotalHorasSolucion", $Method, NULL), $this);
            $this->shTiempoAtencion = new clsControl(ccsHidden, "shTiempoAtencion", "shTiempoAtencion", ccsInteger, "", CCGetRequestParam("shTiempoAtencion", $Method, NULL), $this);
            $this->shTiempoSolucion = new clsControl(ccsHidden, "shTiempoSolucion", "shTiempoSolucion", ccsInteger, "", CCGetRequestParam("shTiempoSolucion", $Method, NULL), $this);
            $this->shTiempoSoporte = new clsControl(ccsHidden, "shTiempoSoporte", "shTiempoSoporte", ccsInteger, "", CCGetRequestParam("shTiempoSoporte", $Method, NULL), $this);
            $this->lblCalificado = new clsControl(ccsLabel, "lblCalificado", "lblCalificado", ccsText, "", CCGetRequestParam("lblCalificado", $Method, NULL), $this);
            $this->shUsuarioAlta = new clsControl(ccsHidden, "shUsuarioAlta", "shUsuarioAlta", ccsText, "", CCGetRequestParam("shUsuarioAlta", $Method, NULL), $this);
            $this->FechaUltMod = new clsControl(ccsHidden, "FechaUltMod", "FechaUltMod", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("FechaUltMod", $Method, NULL), $this);
            $this->shUsuarioUltMod = new clsControl(ccsHidden, "shUsuarioUltMod", "shUsuarioUltMod", ccsText, "", CCGetRequestParam("shUsuarioUltMod", $Method, NULL), $this);
            $this->lblUsuarioUltMod = new clsControl(ccsLabel, "lblUsuarioUltMod", "lblUsuarioUltMod", ccsText, "", CCGetRequestParam("lblUsuarioUltMod", $Method, NULL), $this);
            $this->lblFechaUltMod = new clsControl(ccsLabel, "lblFechaUltMod", "lblFechaUltMod", ccsText, "", CCGetRequestParam("lblFechaUltMod", $Method, NULL), $this);
            $this->txtCumple_Inc_TiempoAsignacion = new clsControl(ccsTextArea, "txtCumple_Inc_TiempoAsignacion", "txtCumple_Inc_TiempoAsignacion", ccsText, "", CCGetRequestParam("txtCumple_Inc_TiempoAsignacion", $Method, NULL), $this);
            $this->txtCumple_Inc_TiempoSolucion = new clsControl(ccsTextArea, "txtCumple_Inc_TiempoSolucion", "txtCumple_Inc_TiempoSolucion", ccsText, "", CCGetRequestParam("txtCumple_Inc_TiempoSolucion", $Method, NULL), $this);
            $this->txtCumple_DISP_SOPORTE = new clsControl(ccsTextArea, "txtCumple_DISP_SOPORTE", "txtCumple_DISP_SOPORTE", ccsText, "", CCGetRequestParam("txtCumple_DISP_SOPORTE", $Method, NULL), $this);
            $this->Image1 = new clsControl(ccsImage, "Image1", "Image1", ccsText, "", CCGetRequestParam("Image1", $Method, NULL), $this);
            $this->Image2 = new clsControl(ccsImage, "Image2", "Image2", ccsText, "", CCGetRequestParam("Image2", $Method, NULL), $this);
            $this->Image3 = new clsControl(ccsImage, "Image3", "Image3", ccsText, "", CCGetRequestParam("Image3", $Method, NULL), $this);
            $this->Hidden1 = new clsControl(ccsHidden, "Hidden1", "Hidden1", ccsText, "", CCGetRequestParam("Hidden1", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->shDescartar->Value) && !strlen($this->shDescartar->Value) && $this->shDescartar->Value !== false)
                    $this->shDescartar->SetText(0);
                if(!is_array($this->CheckBox1->Value) && !strlen($this->CheckBox1->Value) && $this->CheckBox1->Value !== false)
                    $this->CheckBox1->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @143-3E703885
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId_incidente"] = CCGetFromGet("Id_incidente", NULL);
    }
//End Initialize Method

//Validate Method @143-6A9419FB
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->id_servicio->Validate() && $Validation);
        $Validation = ($this->Cumple_Inc_TiempoAsignacion->Validate() && $Validation);
        $Validation = ($this->Cumple_Inc_TiempoSolucion->Validate() && $Validation);
        $Validation = ($this->Cumple_DISP_SOPORTE->Validate() && $Validation);
        $Validation = ($this->Obs_Manuales->Validate() && $Validation);
        $Validation = ($this->shId_Incidente->Validate() && $Validation);
        $Validation = ($this->shDescartar->Validate() && $Validation);
        $Validation = ($this->shMes->Validate() && $Validation);
        $Validation = ($this->shAnio->Validate() && $Validation);
        $Validation = ($this->shIdProveedor->Validate() && $Validation);
        $Validation = ($this->shId_Aplicacion->Validate() && $Validation);
        $Validation = ($this->slSeveridad->Validate() && $Validation);
        $Validation = ($this->CheckBox1->Validate() && $Validation);
        $Validation = ($this->shTiempoAtencion->Validate() && $Validation);
        $Validation = ($this->shTiempoSolucion->Validate() && $Validation);
        $Validation = ($this->shTiempoSoporte->Validate() && $Validation);
        $Validation = ($this->shUsuarioAlta->Validate() && $Validation);
        $Validation = ($this->FechaUltMod->Validate() && $Validation);
        $Validation = ($this->shUsuarioUltMod->Validate() && $Validation);
        $Validation = ($this->txtCumple_Inc_TiempoAsignacion->Validate() && $Validation);
        $Validation = ($this->txtCumple_Inc_TiempoSolucion->Validate() && $Validation);
        $Validation = ($this->txtCumple_DISP_SOPORTE->Validate() && $Validation);
        $Validation = ($this->Hidden1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->id_servicio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Cumple_Inc_TiempoAsignacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Cumple_Inc_TiempoSolucion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Cumple_DISP_SOPORTE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Obs_Manuales->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shId_Incidente->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shDescartar->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shMes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shAnio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shIdProveedor->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shId_Aplicacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->slSeveridad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CheckBox1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shTiempoAtencion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shTiempoSolucion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shTiempoSoporte->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shUsuarioAlta->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FechaUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->shUsuarioUltMod->Errors->Count() == 0);
        $Validation =  $Validation && ($this->txtCumple_Inc_TiempoAsignacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->txtCumple_Inc_TiempoSolucion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->txtCumple_DISP_SOPORTE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Hidden1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @143-6E297BBB
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_servicio->Errors->Count());
        $errors = ($errors || $this->Cumple_Inc_TiempoAsignacion->Errors->Count());
        $errors = ($errors || $this->Cumple_Inc_TiempoSolucion->Errors->Count());
        $errors = ($errors || $this->Cumple_DISP_SOPORTE->Errors->Count());
        $errors = ($errors || $this->Obs_Manuales->Errors->Count());
        $errors = ($errors || $this->Aplicacion->Errors->Count());
        $errors = ($errors || $this->shId_Incidente->Errors->Count());
        $errors = ($errors || $this->shDescartar->Errors->Count());
        $errors = ($errors || $this->shMes->Errors->Count());
        $errors = ($errors || $this->shAnio->Errors->Count());
        $errors = ($errors || $this->Servicio->Errors->Count());
        $errors = ($errors || $this->shIdProveedor->Errors->Count());
        $errors = ($errors || $this->shId_Aplicacion->Errors->Count());
        $errors = ($errors || $this->slSeveridad->Errors->Count());
        $errors = ($errors || $this->CheckBox1->Errors->Count());
        $errors = ($errors || $this->TotalHorasSolucion->Errors->Count());
        $errors = ($errors || $this->shTiempoAtencion->Errors->Count());
        $errors = ($errors || $this->shTiempoSolucion->Errors->Count());
        $errors = ($errors || $this->shTiempoSoporte->Errors->Count());
        $errors = ($errors || $this->lblCalificado->Errors->Count());
        $errors = ($errors || $this->shUsuarioAlta->Errors->Count());
        $errors = ($errors || $this->FechaUltMod->Errors->Count());
        $errors = ($errors || $this->shUsuarioUltMod->Errors->Count());
        $errors = ($errors || $this->lblUsuarioUltMod->Errors->Count());
        $errors = ($errors || $this->lblFechaUltMod->Errors->Count());
        $errors = ($errors || $this->txtCumple_Inc_TiempoAsignacion->Errors->Count());
        $errors = ($errors || $this->txtCumple_Inc_TiempoSolucion->Errors->Count());
        $errors = ($errors || $this->txtCumple_DISP_SOPORTE->Errors->Count());
        $errors = ($errors || $this->Image1->Errors->Count());
        $errors = ($errors || $this->Image2->Errors->Count());
        $errors = ($errors || $this->Image3->Errors->Count());
        $errors = ($errors || $this->Hidden1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @143-A5A2BEC0
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
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Cancelar->Pressed) {
                $this->PressedButton = "Cancelar";
            }
        }
        $Redirect = "IncidenteDetalle.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Cancelar") {
            $Redirect = "IncidentesLista.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
            if(!CCGetEvent($this->Cancelar->CCSEvents, "OnClick", $this->Cancelar)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
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

//InsertRow Method @143-6FDDE17F
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->id_servicio->SetValue($this->id_servicio->GetValue(true));
        $this->DataSource->Cumple_Inc_TiempoAsignacion->SetValue($this->Cumple_Inc_TiempoAsignacion->GetValue(true));
        $this->DataSource->Cumple_Inc_TiempoSolucion->SetValue($this->Cumple_Inc_TiempoSolucion->GetValue(true));
        $this->DataSource->Cumple_DISP_SOPORTE->SetValue($this->Cumple_DISP_SOPORTE->GetValue(true));
        $this->DataSource->Obs_Manuales->SetValue($this->Obs_Manuales->GetValue(true));
        $this->DataSource->Aplicacion->SetValue($this->Aplicacion->GetValue(true));
        $this->DataSource->shId_Incidente->SetValue($this->shId_Incidente->GetValue(true));
        $this->DataSource->shDescartar->SetValue($this->shDescartar->GetValue(true));
        $this->DataSource->shMes->SetValue($this->shMes->GetValue(true));
        $this->DataSource->shAnio->SetValue($this->shAnio->GetValue(true));
        $this->DataSource->Servicio->SetValue($this->Servicio->GetValue(true));
        $this->DataSource->shIdProveedor->SetValue($this->shIdProveedor->GetValue(true));
        $this->DataSource->shId_Aplicacion->SetValue($this->shId_Aplicacion->GetValue(true));
        $this->DataSource->slSeveridad->SetValue($this->slSeveridad->GetValue(true));
        $this->DataSource->CheckBox1->SetValue($this->CheckBox1->GetValue(true));
        $this->DataSource->TotalHorasSolucion->SetValue($this->TotalHorasSolucion->GetValue(true));
        $this->DataSource->shTiempoAtencion->SetValue($this->shTiempoAtencion->GetValue(true));
        $this->DataSource->shTiempoSolucion->SetValue($this->shTiempoSolucion->GetValue(true));
        $this->DataSource->shTiempoSoporte->SetValue($this->shTiempoSoporte->GetValue(true));
        $this->DataSource->lblCalificado->SetValue($this->lblCalificado->GetValue(true));
        $this->DataSource->shUsuarioAlta->SetValue($this->shUsuarioAlta->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->shUsuarioUltMod->SetValue($this->shUsuarioUltMod->GetValue(true));
        $this->DataSource->lblUsuarioUltMod->SetValue($this->lblUsuarioUltMod->GetValue(true));
        $this->DataSource->lblFechaUltMod->SetValue($this->lblFechaUltMod->GetValue(true));
        $this->DataSource->txtCumple_Inc_TiempoAsignacion->SetValue($this->txtCumple_Inc_TiempoAsignacion->GetValue(true));
        $this->DataSource->txtCumple_Inc_TiempoSolucion->SetValue($this->txtCumple_Inc_TiempoSolucion->GetValue(true));
        $this->DataSource->txtCumple_DISP_SOPORTE->SetValue($this->txtCumple_DISP_SOPORTE->GetValue(true));
        $this->DataSource->Image1->SetValue($this->Image1->GetValue(true));
        $this->DataSource->Image2->SetValue($this->Image2->GetValue(true));
        $this->DataSource->Image3->SetValue($this->Image3->GetValue(true));
        $this->DataSource->Hidden1->SetValue($this->Hidden1->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @143-AF7ED1E7
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id_servicio->SetValue($this->id_servicio->GetValue(true));
        $this->DataSource->Cumple_Inc_TiempoAsignacion->SetValue($this->Cumple_Inc_TiempoAsignacion->GetValue(true));
        $this->DataSource->Cumple_Inc_TiempoSolucion->SetValue($this->Cumple_Inc_TiempoSolucion->GetValue(true));
        $this->DataSource->Cumple_DISP_SOPORTE->SetValue($this->Cumple_DISP_SOPORTE->GetValue(true));
        $this->DataSource->Obs_Manuales->SetValue($this->Obs_Manuales->GetValue(true));
        $this->DataSource->Aplicacion->SetValue($this->Aplicacion->GetValue(true));
        $this->DataSource->shId_Incidente->SetValue($this->shId_Incidente->GetValue(true));
        $this->DataSource->shDescartar->SetValue($this->shDescartar->GetValue(true));
        $this->DataSource->shMes->SetValue($this->shMes->GetValue(true));
        $this->DataSource->shAnio->SetValue($this->shAnio->GetValue(true));
        $this->DataSource->Servicio->SetValue($this->Servicio->GetValue(true));
        $this->DataSource->shIdProveedor->SetValue($this->shIdProveedor->GetValue(true));
        $this->DataSource->shId_Aplicacion->SetValue($this->shId_Aplicacion->GetValue(true));
        $this->DataSource->slSeveridad->SetValue($this->slSeveridad->GetValue(true));
        $this->DataSource->CheckBox1->SetValue($this->CheckBox1->GetValue(true));
        $this->DataSource->TotalHorasSolucion->SetValue($this->TotalHorasSolucion->GetValue(true));
        $this->DataSource->shTiempoAtencion->SetValue($this->shTiempoAtencion->GetValue(true));
        $this->DataSource->shTiempoSolucion->SetValue($this->shTiempoSolucion->GetValue(true));
        $this->DataSource->shTiempoSoporte->SetValue($this->shTiempoSoporte->GetValue(true));
        $this->DataSource->lblCalificado->SetValue($this->lblCalificado->GetValue(true));
        $this->DataSource->shUsuarioAlta->SetValue($this->shUsuarioAlta->GetValue(true));
        $this->DataSource->FechaUltMod->SetValue($this->FechaUltMod->GetValue(true));
        $this->DataSource->shUsuarioUltMod->SetValue($this->shUsuarioUltMod->GetValue(true));
        $this->DataSource->lblUsuarioUltMod->SetValue($this->lblUsuarioUltMod->GetValue(true));
        $this->DataSource->lblFechaUltMod->SetValue($this->lblFechaUltMod->GetValue(true));
        $this->DataSource->txtCumple_Inc_TiempoAsignacion->SetValue($this->txtCumple_Inc_TiempoAsignacion->GetValue(true));
        $this->DataSource->txtCumple_Inc_TiempoSolucion->SetValue($this->txtCumple_Inc_TiempoSolucion->GetValue(true));
        $this->DataSource->txtCumple_DISP_SOPORTE->SetValue($this->txtCumple_DISP_SOPORTE->GetValue(true));
        $this->DataSource->Image1->SetValue($this->Image1->GetValue(true));
        $this->DataSource->Image2->SetValue($this->Image2->GetValue(true));
        $this->DataSource->Image3->SetValue($this->Image3->GetValue(true));
        $this->DataSource->Hidden1->SetValue($this->Hidden1->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @143-5EC36551
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

        $this->Cumple_Inc_TiempoAsignacion->Prepare();
        $this->Cumple_Inc_TiempoSolucion->Prepare();
        $this->slSeveridad->Prepare();

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
                $this->lblUsuarioUltMod->SetValue($this->DataSource->lblUsuarioUltMod->GetValue());
                $this->lblFechaUltMod->SetValue($this->DataSource->lblFechaUltMod->GetValue());
                if(!$this->FormSubmitted){
                    $this->id_servicio->SetValue($this->DataSource->id_servicio->GetValue());
                    $this->Cumple_Inc_TiempoAsignacion->SetValue($this->DataSource->Cumple_Inc_TiempoAsignacion->GetValue());
                    $this->Cumple_Inc_TiempoSolucion->SetValue($this->DataSource->Cumple_Inc_TiempoSolucion->GetValue());
                    $this->Cumple_DISP_SOPORTE->SetValue($this->DataSource->Cumple_DISP_SOPORTE->GetValue());
                    $this->Obs_Manuales->SetValue($this->DataSource->Obs_Manuales->GetValue());
                    $this->shId_Incidente->SetValue($this->DataSource->shId_Incidente->GetValue());
                    $this->shDescartar->SetValue($this->DataSource->shDescartar->GetValue());
                    $this->shMes->SetValue($this->DataSource->shMes->GetValue());
                    $this->shAnio->SetValue($this->DataSource->shAnio->GetValue());
                    $this->shIdProveedor->SetValue($this->DataSource->shIdProveedor->GetValue());
                    $this->slSeveridad->SetValue($this->DataSource->slSeveridad->GetValue());
                    $this->CheckBox1->SetValue($this->DataSource->CheckBox1->GetValue());
                    $this->shTiempoAtencion->SetValue($this->DataSource->shTiempoAtencion->GetValue());
                    $this->shTiempoSolucion->SetValue($this->DataSource->shTiempoSolucion->GetValue());
                    $this->shTiempoSoporte->SetValue($this->DataSource->shTiempoSoporte->GetValue());
                    $this->shUsuarioAlta->SetValue($this->DataSource->shUsuarioAlta->GetValue());
                    $this->FechaUltMod->SetValue($this->DataSource->FechaUltMod->GetValue());
                    $this->shUsuarioUltMod->SetValue($this->DataSource->shUsuarioUltMod->GetValue());
                    $this->txtCumple_Inc_TiempoAsignacion->SetValue($this->DataSource->txtCumple_Inc_TiempoAsignacion->GetValue());
                    $this->txtCumple_Inc_TiempoSolucion->SetValue($this->DataSource->txtCumple_Inc_TiempoSolucion->GetValue());
                    $this->txtCumple_DISP_SOPORTE->SetValue($this->DataSource->txtCumple_DISP_SOPORTE->GetValue());
                    $this->Hidden1->SetValue($this->DataSource->Hidden1->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_servicio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Cumple_Inc_TiempoAsignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Cumple_Inc_TiempoSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Cumple_DISP_SOPORTE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Obs_Manuales->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Aplicacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shId_Incidente->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shDescartar->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shMes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shAnio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Servicio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shIdProveedor->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shId_Aplicacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->slSeveridad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CheckBox1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TotalHorasSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shTiempoAtencion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shTiempoSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shTiempoSoporte->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lblCalificado->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shUsuarioAlta->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->shUsuarioUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lblUsuarioUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->lblFechaUltMod->Errors->ToString());
            $Error = ComposeStrings($Error, $this->txtCumple_Inc_TiempoAsignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->txtCumple_Inc_TiempoSolucion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->txtCumple_DISP_SOPORTE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Image1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Image2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Image3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Hidden1->Errors->ToString());
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
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->id_servicio->Show();
        $this->Cumple_Inc_TiempoAsignacion->Show();
        $this->Cumple_Inc_TiempoSolucion->Show();
        $this->Cumple_DISP_SOPORTE->Show();
        $this->Obs_Manuales->Show();
        $this->Aplicacion->Show();
        $this->shId_Incidente->Show();
        $this->shDescartar->Show();
        $this->shMes->Show();
        $this->shAnio->Show();
        $this->Servicio->Show();
        $this->shIdProveedor->Show();
        $this->shId_Aplicacion->Show();
        $this->Cancelar->Show();
        $this->slSeveridad->Show();
        $this->CheckBox1->Show();
        $this->shTiempoAtencion->Show();
        $this->shTiempoSolucion->Show();
        $this->shTiempoSoporte->Show();
        $this->lblCalificado->Show();
        $this->shUsuarioAlta->Show();
        $this->FechaUltMod->Show();
        $this->shUsuarioUltMod->Show();
        $this->lblUsuarioUltMod->Show();
        $this->lblFechaUltMod->Show();
        $this->txtCumple_Inc_TiempoAsignacion->Show();
        $this->txtCumple_Inc_TiempoSolucion->Show();
        $this->txtCumple_DISP_SOPORTE->Show();
        $this->Image1->Show();
        $this->Image2->Show();
        $this->Image3->Show();
        $this->Hidden1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_calificacion_incidente Class @143-FCB6E20C

class clsmc_calificacion_incidenteDataSource extends clsDBcnDisenio {  //mc_calificacion_incidenteDataSource Class @143-BFB23304

//DataSource Variables @143-0C3D68FD
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $id_servicio;
    public $Cumple_Inc_TiempoAsignacion;
    public $Cumple_Inc_TiempoSolucion;
    public $Cumple_DISP_SOPORTE;
    public $Obs_Manuales;
    public $Aplicacion;
    public $shId_Incidente;
    public $shDescartar;
    public $shMes;
    public $shAnio;
    public $Servicio;
    public $shIdProveedor;
    public $shId_Aplicacion;
    public $slSeveridad;
    public $CheckBox1;
    public $TotalHorasSolucion;
    public $shTiempoAtencion;
    public $shTiempoSolucion;
    public $shTiempoSoporte;
    public $lblCalificado;
    public $shUsuarioAlta;
    public $FechaUltMod;
    public $shUsuarioUltMod;
    public $lblUsuarioUltMod;
    public $lblFechaUltMod;
    public $txtCumple_Inc_TiempoAsignacion;
    public $txtCumple_Inc_TiempoSolucion;
    public $txtCumple_DISP_SOPORTE;
    public $Image1;
    public $Image2;
    public $Image3;
    public $Hidden1;
//End DataSource Variables

//DataSourceClass_Initialize Event @143-CB19E666
    function clsmc_calificacion_incidenteDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_calificacion_incidente/Error";
        $this->Initialize();
        $this->id_servicio = new clsField("id_servicio", ccsInteger, "");
        
        $this->Cumple_Inc_TiempoAsignacion = new clsField("Cumple_Inc_TiempoAsignacion", ccsInteger, "");
        
        $this->Cumple_Inc_TiempoSolucion = new clsField("Cumple_Inc_TiempoSolucion", ccsInteger, "");
        
        $this->Cumple_DISP_SOPORTE = new clsField("Cumple_DISP_SOPORTE", ccsInteger, "");
        
        $this->Obs_Manuales = new clsField("Obs_Manuales", ccsText, "");
        
        $this->Aplicacion = new clsField("Aplicacion", ccsText, "");
        
        $this->shId_Incidente = new clsField("shId_Incidente", ccsText, "");
        
        $this->shDescartar = new clsField("shDescartar", ccsText, "");
        
        $this->shMes = new clsField("shMes", ccsText, "");
        
        $this->shAnio = new clsField("shAnio", ccsText, "");
        
        $this->Servicio = new clsField("Servicio", ccsText, "");
        
        $this->shIdProveedor = new clsField("shIdProveedor", ccsText, "");
        
        $this->shId_Aplicacion = new clsField("shId_Aplicacion", ccsText, "");
        
        $this->slSeveridad = new clsField("slSeveridad", ccsText, "");
        
        $this->CheckBox1 = new clsField("CheckBox1", ccsBoolean, $this->BooleanFormat);
        
        $this->TotalHorasSolucion = new clsField("TotalHorasSolucion", ccsText, "");
        
        $this->shTiempoAtencion = new clsField("shTiempoAtencion", ccsInteger, "");
        
        $this->shTiempoSolucion = new clsField("shTiempoSolucion", ccsInteger, "");
        
        $this->shTiempoSoporte = new clsField("shTiempoSoporte", ccsInteger, "");
        
        $this->lblCalificado = new clsField("lblCalificado", ccsText, "");
        
        $this->shUsuarioAlta = new clsField("shUsuarioAlta", ccsText, "");
        
        $this->FechaUltMod = new clsField("FechaUltMod", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->shUsuarioUltMod = new clsField("shUsuarioUltMod", ccsText, "");
        
        $this->lblUsuarioUltMod = new clsField("lblUsuarioUltMod", ccsText, "");
        
        $this->lblFechaUltMod = new clsField("lblFechaUltMod", ccsText, "");
        
        $this->txtCumple_Inc_TiempoAsignacion = new clsField("txtCumple_Inc_TiempoAsignacion", ccsText, "");
        
        $this->txtCumple_Inc_TiempoSolucion = new clsField("txtCumple_Inc_TiempoSolucion", ccsText, "");
        
        $this->txtCumple_DISP_SOPORTE = new clsField("txtCumple_DISP_SOPORTE", ccsText, "");
        
        $this->Image1 = new clsField("Image1", ccsText, "");
        
        $this->Image2 = new clsField("Image2", ccsText, "");
        
        $this->Image3 = new clsField("Image3", ccsText, "");
        
        $this->Hidden1 = new clsField("Hidden1", ccsText, "");
        

        $this->InsertFields["id_servicio"] = array("Name" => "id_servicio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Cumple_Inc_TiempoAsignacion"] = array("Name" => "[Cumple_Inc_TiempoAsignacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Cumple_Inc_TiempoSolucion"] = array("Name" => "[Cumple_Inc_TiempoSolucion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Cumple_DISP_SOPORTE"] = array("Name" => "[Cumple_DISP_SOPORTE]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Obs_Manuales"] = array("Name" => "[Obs_Manuales]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["id_incidente"] = array("Name" => "id_incidente", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["descartar"] = array("Name" => "descartar", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MesReporte"] = array("Name" => "[MesReporte]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["AnioReporte"] = array("Name" => "[AnioReporte]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["severidad"] = array("Name" => "severidad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["chkTiempo"] = array("Name" => "[chkTiempo]", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["Med_Ate_Mod"] = array("Name" => "[Med_Ate_Mod]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Med_Sol_Mod"] = array("Name" => "[Med_Sol_Mod]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Med_Sop_Mod"] = array("Name" => "[Med_Sop_Mod]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioAlta"] = array("Name" => "[UsuarioAlta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Obs_Med_Ate"] = array("Name" => "[Obs_Med_Ate]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Obs_Med_Sol"] = array("Name" => "[Obs_Med_Sol]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Obs_Med_Sop"] = array("Name" => "[Obs_Med_Sop]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["TiempoTotal"] = array("Name" => "[TiempoTotal]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_servicio"] = array("Name" => "id_servicio", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Cumple_Inc_TiempoAsignacion"] = array("Name" => "[Cumple_Inc_TiempoAsignacion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Cumple_Inc_TiempoSolucion"] = array("Name" => "[Cumple_Inc_TiempoSolucion]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Cumple_DISP_SOPORTE"] = array("Name" => "[Cumple_DISP_SOPORTE]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Obs_Manuales"] = array("Name" => "[Obs_Manuales]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_incidente"] = array("Name" => "id_incidente", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["descartar"] = array("Name" => "descartar", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MesReporte"] = array("Name" => "[MesReporte]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AnioReporte"] = array("Name" => "[AnioReporte]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_proveedor"] = array("Name" => "id_proveedor", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["severidad"] = array("Name" => "severidad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["chkTiempo"] = array("Name" => "[chkTiempo]", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["Med_Ate_Mod"] = array("Name" => "[Med_Ate_Mod]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Med_Sol_Mod"] = array("Name" => "[Med_Sol_Mod]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Med_Sop_Mod"] = array("Name" => "[Med_Sop_Mod]", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioAlta"] = array("Name" => "[UsuarioAlta]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FechaUltMod"] = array("Name" => "[FechaUltMod]", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["UsuarioUltMod"] = array("Name" => "[UsuarioUltMod]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Obs_Med_Ate"] = array("Name" => "[Obs_Med_Ate]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Obs_Med_Sol"] = array("Name" => "[Obs_Med_Sol]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Obs_Med_Sop"] = array("Name" => "[Obs_Med_Sop]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["TiempoTotal"] = array("Name" => "[TiempoTotal]", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @143-D654A9F8
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

//Open Method @143-B6AD3CEF
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_calificacion_incidentes_MC {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @143-3DC4D27F
    function SetValues()
    {
        $this->id_servicio->SetDBValue(trim($this->f("id_servicio")));
        $this->Cumple_Inc_TiempoAsignacion->SetDBValue(trim($this->f("Cumple_Inc_TiempoAsignacion")));
        $this->Cumple_Inc_TiempoSolucion->SetDBValue(trim($this->f("Cumple_Inc_TiempoSolucion")));
        $this->Cumple_DISP_SOPORTE->SetDBValue(trim($this->f("Cumple_DISP_SOPORTE")));
        $this->Obs_Manuales->SetDBValue($this->f("Obs_Manuales"));
        $this->shId_Incidente->SetDBValue($this->f("id_incidente"));
        $this->shDescartar->SetDBValue($this->f("descartar"));
        $this->shMes->SetDBValue($this->f("MesReporte"));
        $this->shAnio->SetDBValue($this->f("AnioReporte"));
        $this->shIdProveedor->SetDBValue($this->f("id_proveedor"));
        $this->slSeveridad->SetDBValue($this->f("severidad"));
        $this->CheckBox1->SetDBValue(trim($this->f("chkTiempo")));
        $this->shTiempoAtencion->SetDBValue(trim($this->f("Med_Ate_Mod")));
        $this->shTiempoSolucion->SetDBValue(trim($this->f("Med_Sol_Mod")));
        $this->shTiempoSoporte->SetDBValue(trim($this->f("Med_Sop_Mod")));
        $this->shUsuarioAlta->SetDBValue($this->f("UsuarioAlta"));
        $this->FechaUltMod->SetDBValue(trim($this->f("FechaUltMod")));
        $this->shUsuarioUltMod->SetDBValue($this->f("UsuarioUltMod"));
        $this->lblUsuarioUltMod->SetDBValue($this->f("UsuarioUltMod"));
        $this->lblFechaUltMod->SetDBValue($this->f("FechaUltMod"));
        $this->txtCumple_Inc_TiempoAsignacion->SetDBValue($this->f("Obs_Med_Ate"));
        $this->txtCumple_Inc_TiempoSolucion->SetDBValue($this->f("Obs_Med_Sol"));
        $this->txtCumple_DISP_SOPORTE->SetDBValue($this->f("Obs_Med_Sop"));
        $this->Hidden1->SetDBValue($this->f("TiempoTotal"));
    }
//End SetValues Method

//Insert Method @143-B9614C21
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["id_servicio"]["Value"] = $this->id_servicio->GetDBValue(true);
        $this->InsertFields["Cumple_Inc_TiempoAsignacion"]["Value"] = $this->Cumple_Inc_TiempoAsignacion->GetDBValue(true);
        $this->InsertFields["Cumple_Inc_TiempoSolucion"]["Value"] = $this->Cumple_Inc_TiempoSolucion->GetDBValue(true);
        $this->InsertFields["Cumple_DISP_SOPORTE"]["Value"] = $this->Cumple_DISP_SOPORTE->GetDBValue(true);
        $this->InsertFields["Obs_Manuales"]["Value"] = $this->Obs_Manuales->GetDBValue(true);
        $this->InsertFields["id_incidente"]["Value"] = $this->shId_Incidente->GetDBValue(true);
        $this->InsertFields["descartar"]["Value"] = $this->shDescartar->GetDBValue(true);
        $this->InsertFields["MesReporte"]["Value"] = $this->shMes->GetDBValue(true);
        $this->InsertFields["AnioReporte"]["Value"] = $this->shAnio->GetDBValue(true);
        $this->InsertFields["id_proveedor"]["Value"] = $this->shIdProveedor->GetDBValue(true);
        $this->InsertFields["severidad"]["Value"] = $this->slSeveridad->GetDBValue(true);
        $this->InsertFields["chkTiempo"]["Value"] = $this->CheckBox1->GetDBValue(true);
        $this->InsertFields["Med_Ate_Mod"]["Value"] = $this->shTiempoAtencion->GetDBValue(true);
        $this->InsertFields["Med_Sol_Mod"]["Value"] = $this->shTiempoSolucion->GetDBValue(true);
        $this->InsertFields["Med_Sop_Mod"]["Value"] = $this->shTiempoSoporte->GetDBValue(true);
        $this->InsertFields["UsuarioAlta"]["Value"] = $this->shUsuarioAlta->GetDBValue(true);
        $this->InsertFields["FechaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->InsertFields["UsuarioUltMod"]["Value"] = $this->shUsuarioUltMod->GetDBValue(true);
        $this->InsertFields["Obs_Med_Ate"]["Value"] = $this->txtCumple_Inc_TiempoAsignacion->GetDBValue(true);
        $this->InsertFields["Obs_Med_Sol"]["Value"] = $this->txtCumple_Inc_TiempoSolucion->GetDBValue(true);
        $this->InsertFields["Obs_Med_Sop"]["Value"] = $this->txtCumple_DISP_SOPORTE->GetDBValue(true);
        $this->InsertFields["TiempoTotal"]["Value"] = $this->Hidden1->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_calificacion_incidentes_MC", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @143-F7E0530E
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["id_servicio"]["Value"] = $this->id_servicio->GetDBValue(true);
        $this->UpdateFields["Cumple_Inc_TiempoAsignacion"]["Value"] = $this->Cumple_Inc_TiempoAsignacion->GetDBValue(true);
        $this->UpdateFields["Cumple_Inc_TiempoSolucion"]["Value"] = $this->Cumple_Inc_TiempoSolucion->GetDBValue(true);
        $this->UpdateFields["Cumple_DISP_SOPORTE"]["Value"] = $this->Cumple_DISP_SOPORTE->GetDBValue(true);
        $this->UpdateFields["Obs_Manuales"]["Value"] = $this->Obs_Manuales->GetDBValue(true);
        $this->UpdateFields["id_incidente"]["Value"] = $this->shId_Incidente->GetDBValue(true);
        $this->UpdateFields["descartar"]["Value"] = $this->shDescartar->GetDBValue(true);
        $this->UpdateFields["MesReporte"]["Value"] = $this->shMes->GetDBValue(true);
        $this->UpdateFields["AnioReporte"]["Value"] = $this->shAnio->GetDBValue(true);
        $this->UpdateFields["id_proveedor"]["Value"] = $this->shIdProveedor->GetDBValue(true);
        $this->UpdateFields["severidad"]["Value"] = $this->slSeveridad->GetDBValue(true);
        $this->UpdateFields["chkTiempo"]["Value"] = $this->CheckBox1->GetDBValue(true);
        $this->UpdateFields["Med_Ate_Mod"]["Value"] = $this->shTiempoAtencion->GetDBValue(true);
        $this->UpdateFields["Med_Sol_Mod"]["Value"] = $this->shTiempoSolucion->GetDBValue(true);
        $this->UpdateFields["Med_Sop_Mod"]["Value"] = $this->shTiempoSoporte->GetDBValue(true);
        $this->UpdateFields["UsuarioAlta"]["Value"] = $this->shUsuarioAlta->GetDBValue(true);
        $this->UpdateFields["FechaUltMod"]["Value"] = $this->FechaUltMod->GetDBValue(true);
        $this->UpdateFields["UsuarioUltMod"]["Value"] = $this->shUsuarioUltMod->GetDBValue(true);
        $this->UpdateFields["Obs_Med_Ate"]["Value"] = $this->txtCumple_Inc_TiempoAsignacion->GetDBValue(true);
        $this->UpdateFields["Obs_Med_Sol"]["Value"] = $this->txtCumple_Inc_TiempoSolucion->GetDBValue(true);
        $this->UpdateFields["Obs_Med_Sop"]["Value"] = $this->txtCumple_DISP_SOPORTE->GetDBValue(true);
        $this->UpdateFields["TiempoTotal"]["Value"] = $this->Hidden1->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_calificacion_incidentes_MC", $this->UpdateFields, $this);
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

} //End mc_calificacion_incidenteDataSource Class @143-FCB6E20C

class clsRecordmc_info_incidentes3 { //mc_info_incidentes3 Class @112-BFFFF8AB

//Variables @112-9E315808

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

//Class_Initialize Event @112-A21E2AF8
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

//Initialize Method @112-3E703885
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId_incidente"] = CCGetFromGet("Id_incidente", NULL);
    }
//End Initialize Method

//Validate Method @112-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @112-800C1B19
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

//Operation Method @112-17DC9883
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

//Show Method @112-6103844E
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

} //End mc_info_incidentes3 Class @112-FCB6E20C

class clsmc_info_incidentes3DataSource extends clsDBcnDisenio {  //mc_info_incidentes3DataSource Class @112-329ABCE7

//DataSource Variables @112-78D6D71A
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

//DataSourceClass_Initialize Event @112-37287CC8
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

//Prepare Method @112-D5067C86
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId_incidente", ccsText, "", "", $this->Parameters["urlId_incidente"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @112-2DC739D5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT TOP 1 * ,(dbo.ufDiffFechasMCSec(\n" .
        "	(select top 1 FechaFinMov from mc_detalle_incidente_avl where (Id_Incidente =a.Id_Incidente or Id_Incidente = a.IncPadre ) \n" .
        "		and (ClaveMovimiento =38 OR ClaveMovimiento =49 OR ClaveMovimiento =36 OR ClaveMovimiento =47) and month(FechaCarga) = u.mes and year(FechaCarga) = u.anio order by fechaFinMov desc )  ,	FechaResuelto )) as HorasInvertidas,\n" .
        "(select top 1 FechaFinMov from mc_detalle_incidente_avl \n" .
        "	where (Id_Incidente =a.Id_Incidente or Id_Incidente = a.IncPadre ) \n" .
        "	and (ClaveMovimiento =38 OR ClaveMovimiento =49 OR ClaveMovimiento =36 OR ClaveMovimiento =47) 	and month(FechaCarga) = u.mes and year(FechaCarga) = u.anio order by fechaFinMov desc ) as LiberacionAVL\n" .
        "FROM mc_info_incidentes a\n" .
        "		inner join mc_universo_cds u on a.Id_incidente = u.numero  and month(a.FechaCarga ) = u.mes and YEAR(a.fechacarga)= u.anio \n" .
        "WHERE Id_incidente = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' ";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @112-EF1FDD6F
    function SetValues()
    {
        $this->FechaResuelto->SetDBValue(trim($this->f("FechaResuelto")));
        $this->HorasInvertidas->SetDBValue($this->f("HorasInvertidas"));
        $this->slblflAVL->SetDBValue(trim($this->f("LiberacionAVL")));
    }
//End SetValues Method

} //End mc_info_incidentes3DataSource Class @112-FCB6E20C

class clsRecordmc_info_incidentes4 { //mc_info_incidentes4 Class @124-F0BE6E6C

//Variables @124-9E315808

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

//Class_Initialize Event @124-2F761DC6
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

//Validate Method @124-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @124-23B92CE9
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

//Operation Method @124-82225C24
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

//Show Method @124-B1F364FC
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

} //End mc_info_incidentes4 Class @124-FCB6E20C

//Include Page implementation @282-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsRecordmc_info_incidentes1 { //mc_info_incidentes1 Class @46-8DC99A29

//Variables @46-9E315808

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

//Class_Initialize Event @46-6BDF3F1A
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

//Validate Method @46-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @46-F8DE717F
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

//Operation Method @46-82225C24
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

//Show Method @46-462C0115
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

} //End mc_info_incidentes1 Class @46-FCB6E20C

class clsRecordmc_info_incidentes2 { //mc_info_incidentes2 Class @56-A6E4C9EA

//Variables @56-9E315808

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

//Class_Initialize Event @56-0647FA52
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

//Initialize Method @56-C52A8F00
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId_incidente"] = CCGetFromGet("Id_incidente", NULL);
        $this->DataSource->Parameters["urls_mes_param"] = CCGetFromGet("s_mes_param", NULL);
        $this->DataSource->Parameters["urls_anio_param"] = CCGetFromGet("s_anio_param", NULL);
    }
//End Initialize Method

//Validate Method @56-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @56-E65A4259
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

//Operation Method @56-17DC9883
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

//Show Method @56-EF3D5678
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

} //End mc_info_incidentes2 Class @56-FCB6E20C

class clsmc_info_incidentes2DataSource extends clsDBcnDisenio {  //mc_info_incidentes2DataSource Class @56-04682C14

//DataSource Variables @56-AEDB5C46
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

//DataSourceClass_Initialize Event @56-C2E90DEF
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

//Prepare Method @56-FD1693A3
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId_incidente", ccsText, "", "", $this->Parameters["urlId_incidente"], "", false);
        $this->wp->AddParameter("2", "urls_mes_param", ccsInteger, "", "", $this->Parameters["urls_mes_param"], 1, false);
        $this->wp->AddParameter("3", "urls_anio_param", ccsInteger, "", "", $this->Parameters["urls_anio_param"], 2014, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @56-628ED241
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT TOP 1 mi.*,\n" .
        "	(select top 1 FechaInicioMov from mc_detalle_incidente_avl \n" .
        "	        where (Id_Incidente=mi.Id_incidente or Id_Incidente = mi.IncPadre )\n" .
        "	        and  MONTH(FechaCarga)= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " and YEAR(FechaCarga) = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " \n" .
        "	        order by FechaInicioMov   ) as RegistroAVL ,\n" .
        "dbo.ufDiffFechasMCSec(FechaEnCurso,(select top 1 FechaInicioMov from mc_detalle_incidente_avl \n" .
        "                                           where (Id_Incidente=mi.Id_incidente or Id_Incidente = mi.IncPadre)\n" .
        "                                           and  MONTH(FechaCarga)= " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " and YEAR(FechaCarga) = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . "                                             \n" .
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

//SetValues Method @56-1158C8B0
    function SetValues()
    {
        $this->FechaEnCurso->SetDBValue(trim($this->f("FechaEnCurso")));
        $this->lblRegistroAVL->SetDBValue(trim($this->f("RegistroAVL")));
        $this->HorasInvertidas->SetDBValue($this->f("HorasInvertidas"));
    }
//End SetValues Method

} //End mc_info_incidentes2DataSource Class @56-FCB6E20C

class clsGridmc_incidentes_relacionado { //mc_incidentes_relacionado class @319-222DEE3C

//Variables @319-54166695

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
    public $Sorter_Inc_Secundario;
    public $Sorter_Paquete;
//End Variables

//Class_Initialize Event @319-37851C6B
    function clsGridmc_incidentes_relacionado($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "mc_incidentes_relacionado";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid mc_incidentes_relacionado";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsmc_incidentes_relacionadoDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 5;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 25)
            $this->PageSize = 25;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("mc_incidentes_relacionadoOrder", "");
        $this->SorterDirection = CCGetParam("mc_incidentes_relacionadoDir", "");

        $this->Inc_Secundario = new clsControl(ccsLabel, "Inc_Secundario", "Inc_Secundario", ccsText, "", CCGetRequestParam("Inc_Secundario", ccsGet, NULL), $this);
        $this->Paquete = new clsControl(ccsLabel, "Paquete", "Paquete", ccsText, "", CCGetRequestParam("Paquete", ccsGet, NULL), $this);
        $this->Sorter_Inc_Secundario = new clsSorter($this->ComponentName, "Sorter_Inc_Secundario", $FileName, $this);
        $this->Sorter_Paquete = new clsSorter($this->ComponentName, "Sorter_Paquete", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @319-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @319-C571241A
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
            $this->ControlsVisible["Inc_Secundario"] = $this->Inc_Secundario->Visible;
            $this->ControlsVisible["Paquete"] = $this->Paquete->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Inc_Secundario->SetValue($this->DataSource->Inc_Secundario->GetValue());
                $this->Paquete->SetValue($this->DataSource->Paquete->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Inc_Secundario->Show();
                $this->Paquete->Show();
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
        $this->Sorter_Inc_Secundario->Show();
        $this->Sorter_Paquete->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @319-B326CF2B
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Inc_Secundario->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Paquete->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End mc_incidentes_relacionado Class @319-FCB6E20C

class clsmc_incidentes_relacionadoDataSource extends clsDBcnDisenio {  //mc_incidentes_relacionadoDataSource Class @319-F19E8142

//DataSource Variables @319-0670C442
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $Inc_Secundario;
    public $Paquete;
//End DataSource Variables

//DataSourceClass_Initialize Event @319-714FB7D3
    function clsmc_incidentes_relacionadoDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid mc_incidentes_relacionado";
        $this->Initialize();
        $this->Inc_Secundario = new clsField("Inc_Secundario", ccsText, "");
        
        $this->Paquete = new clsField("Paquete", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @319-111F919B
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Inc_Secundario" => array("Inc_Secundario", ""), 
            "Sorter_Paquete" => array("Paquete", "")));
    }
//End SetOrder Method

//Prepare Method @319-E1686364
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlId_incidente", ccsText, "", "", $this->Parameters["urlId_incidente"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "[Inc_Principal]", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @319-A087008B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM mc_incidentes_relacionados";
        $this->SQL = "SELECT TOP {SqlParam_endRecord} * \n\n" .
        "FROM mc_incidentes_relacionados {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @319-F71D000D
    function SetValues()
    {
        $this->Inc_Secundario->SetDBValue($this->f("Inc_Secundario"));
        $this->Paquete->SetDBValue($this->f("Paquete"));
    }
//End SetValues Method

} //End mc_incidentes_relacionadoDataSource Class @319-FCB6E20C

class clsRecordFinal { //Final Class @227-3764C1F9

//Variables @227-9E315808

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

//Class_Initialize Event @227-C325F5CE
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

//Validate Method @227-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @227-024D4338
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

//Operation Method @227-82225C24
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

//Show Method @227-0164D10F
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

} //End Final Class @227-FCB6E20C

class clsRecordmc_incidentes_reasignacio { //mc_incidentes_reasignacio Class @347-9672665D

//Variables @347-9E315808

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

//Class_Initialize Event @347-1B919760
    function clsRecordmc_incidentes_reasignacio($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record mc_incidentes_reasignacio/Error";
        $this->DataSource = new clsmc_incidentes_reasignacioDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "mc_incidentes_reasignacio";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->id_incidente = new clsControl(ccsLabel, "id_incidente", "id_incidente", ccsText, "", CCGetRequestParam("id_incidente", $Method, NULL), $this);
            $this->mes = new clsControl(ccsLabel, "mes", "mes", ccsInteger, "", CCGetRequestParam("mes", $Method, NULL), $this);
            $this->anio = new clsControl(ccsLabel, "anio", "anio", ccsInteger, "", CCGetRequestParam("anio", $Method, NULL), $this);
            $this->primera_fecha_asignacion = new clsControl(ccsTextBox, "primera_fecha_asignacion", "Primera Fecha Asignacion", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("primera_fecha_asignacion", $Method, NULL), $this);
            $this->primera_fecha_asignacion->Required = true;
            $this->primera_fecha_encurso = new clsControl(ccsTextBox, "primera_fecha_encurso", "Primera Fecha Encurso", ccsDate, array("dd", "/", "mm", "/", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("primera_fecha_encurso", $Method, NULL), $this);
            $this->primera_fecha_encurso->Required = true;
            $this->horas_invertidas = new clsControl(ccsLabel, "horas_invertidas", "Horas Invertidas", ccsText, "", CCGetRequestParam("horas_invertidas", $Method, NULL), $this);
            $this->H_id_incidente = new clsControl(ccsHidden, "H_id_incidente", "H_id_incidente", ccsText, "", CCGetRequestParam("H_id_incidente", $Method, NULL), $this);
            $this->H_mes = new clsControl(ccsHidden, "H_mes", "H_mes", ccsText, "", CCGetRequestParam("H_mes", $Method, NULL), $this);
            $this->H_anio = new clsControl(ccsHidden, "H_anio", "H_anio", ccsText, "", CCGetRequestParam("H_anio", $Method, NULL), $this);
            $this->H_horas_invertidas = new clsControl(ccsHidden, "H_horas_invertidas", "H_horas_invertidas", ccsFloat, "", CCGetRequestParam("H_horas_invertidas", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->H_id_incidente->Value) && !strlen($this->H_id_incidente->Value) && $this->H_id_incidente->Value !== false)
                    $this->H_id_incidente->SetText(CCGetParam("Id_incidente"));
                if(!is_array($this->H_mes->Value) && !strlen($this->H_mes->Value) && $this->H_mes->Value !== false)
                    $this->H_mes->SetText(CCGetParam("s_mes_param"));
                if(!is_array($this->H_anio->Value) && !strlen($this->H_anio->Value) && $this->H_anio->Value !== false)
                    $this->H_anio->SetText(CCGetParam("s_anio_param"));
            }
            if(!is_array($this->id_incidente->Value) && !strlen($this->id_incidente->Value) && $this->id_incidente->Value !== false)
                $this->id_incidente->SetText(CCGetParam("Id_incidente"));
            if(!is_array($this->mes->Value) && !strlen($this->mes->Value) && $this->mes->Value !== false)
                $this->mes->SetText(CCGetParam("s_mes_param"));
            if(!is_array($this->anio->Value) && !strlen($this->anio->Value) && $this->anio->Value !== false)
                $this->anio->SetText(CCGetParam("s_anio_param"));
        }
    }
//End Class_Initialize Event

//Initialize Method @347-3E703885
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlId_incidente"] = CCGetFromGet("Id_incidente", NULL);
    }
//End Initialize Method

//Validate Method @347-B4D060AF
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->primera_fecha_asignacion->Validate() && $Validation);
        $Validation = ($this->primera_fecha_encurso->Validate() && $Validation);
        $Validation = ($this->H_id_incidente->Validate() && $Validation);
        $Validation = ($this->H_mes->Validate() && $Validation);
        $Validation = ($this->H_anio->Validate() && $Validation);
        $Validation = ($this->H_horas_invertidas->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->primera_fecha_asignacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->primera_fecha_encurso->Errors->Count() == 0);
        $Validation =  $Validation && ($this->H_id_incidente->Errors->Count() == 0);
        $Validation =  $Validation && ($this->H_mes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->H_anio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->H_horas_invertidas->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @347-EB2075D9
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->id_incidente->Errors->Count());
        $errors = ($errors || $this->mes->Errors->Count());
        $errors = ($errors || $this->anio->Errors->Count());
        $errors = ($errors || $this->primera_fecha_asignacion->Errors->Count());
        $errors = ($errors || $this->primera_fecha_encurso->Errors->Count());
        $errors = ($errors || $this->horas_invertidas->Errors->Count());
        $errors = ($errors || $this->H_id_incidente->Errors->Count());
        $errors = ($errors || $this->H_mes->Errors->Count());
        $errors = ($errors || $this->H_anio->Errors->Count());
        $errors = ($errors || $this->H_horas_invertidas->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @347-288F0419
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
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
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

//InsertRow Method @347-CB7E3A6F
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->id_incidente->SetValue($this->id_incidente->GetValue(true));
        $this->DataSource->mes->SetValue($this->mes->GetValue(true));
        $this->DataSource->anio->SetValue($this->anio->GetValue(true));
        $this->DataSource->primera_fecha_asignacion->SetValue($this->primera_fecha_asignacion->GetValue(true));
        $this->DataSource->primera_fecha_encurso->SetValue($this->primera_fecha_encurso->GetValue(true));
        $this->DataSource->horas_invertidas->SetValue($this->horas_invertidas->GetValue(true));
        $this->DataSource->H_id_incidente->SetValue($this->H_id_incidente->GetValue(true));
        $this->DataSource->H_mes->SetValue($this->H_mes->GetValue(true));
        $this->DataSource->H_anio->SetValue($this->H_anio->GetValue(true));
        $this->DataSource->H_horas_invertidas->SetValue($this->H_horas_invertidas->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @347-1330B912
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id_incidente->SetValue($this->id_incidente->GetValue(true));
        $this->DataSource->mes->SetValue($this->mes->GetValue(true));
        $this->DataSource->anio->SetValue($this->anio->GetValue(true));
        $this->DataSource->primera_fecha_asignacion->SetValue($this->primera_fecha_asignacion->GetValue(true));
        $this->DataSource->primera_fecha_encurso->SetValue($this->primera_fecha_encurso->GetValue(true));
        $this->DataSource->horas_invertidas->SetValue($this->horas_invertidas->GetValue(true));
        $this->DataSource->H_id_incidente->SetValue($this->H_id_incidente->GetValue(true));
        $this->DataSource->H_mes->SetValue($this->H_mes->GetValue(true));
        $this->DataSource->H_anio->SetValue($this->H_anio->GetValue(true));
        $this->DataSource->H_horas_invertidas->SetValue($this->H_horas_invertidas->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @347-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @347-715E79FD
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
                $this->id_incidente->SetValue($this->DataSource->id_incidente->GetValue());
                $this->mes->SetValue($this->DataSource->mes->GetValue());
                $this->anio->SetValue($this->DataSource->anio->GetValue());
                if(!$this->FormSubmitted){
                    $this->primera_fecha_asignacion->SetValue($this->DataSource->primera_fecha_asignacion->GetValue());
                    $this->primera_fecha_encurso->SetValue($this->DataSource->primera_fecha_encurso->GetValue());
                    $this->H_id_incidente->SetValue($this->DataSource->H_id_incidente->GetValue());
                    $this->H_mes->SetValue($this->DataSource->H_mes->GetValue());
                    $this->H_anio->SetValue($this->DataSource->H_anio->GetValue());
                    $this->H_horas_invertidas->SetValue($this->DataSource->H_horas_invertidas->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->id_incidente->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->primera_fecha_asignacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->primera_fecha_encurso->Errors->ToString());
            $Error = ComposeStrings($Error, $this->horas_invertidas->Errors->ToString());
            $Error = ComposeStrings($Error, $this->H_id_incidente->Errors->ToString());
            $Error = ComposeStrings($Error, $this->H_mes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->H_anio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->H_horas_invertidas->Errors->ToString());
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
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->id_incidente->Show();
        $this->mes->Show();
        $this->anio->Show();
        $this->primera_fecha_asignacion->Show();
        $this->primera_fecha_encurso->Show();
        $this->horas_invertidas->Show();
        $this->H_id_incidente->Show();
        $this->H_mes->Show();
        $this->H_anio->Show();
        $this->H_horas_invertidas->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End mc_incidentes_reasignacio Class @347-FCB6E20C

class clsmc_incidentes_reasignacioDataSource extends clsDBcnDisenio {  //mc_incidentes_reasignacioDataSource Class @347-5A6F6ECF

//DataSource Variables @347-4DDC2895
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $DeleteParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $id_incidente;
    public $mes;
    public $anio;
    public $primera_fecha_asignacion;
    public $primera_fecha_encurso;
    public $horas_invertidas;
    public $H_id_incidente;
    public $H_mes;
    public $H_anio;
    public $H_horas_invertidas;
//End DataSource Variables

//DataSourceClass_Initialize Event @347-E7BBC786
    function clsmc_incidentes_reasignacioDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record mc_incidentes_reasignacio/Error";
        $this->Initialize();
        $this->id_incidente = new clsField("id_incidente", ccsText, "");
        
        $this->mes = new clsField("mes", ccsInteger, "");
        
        $this->anio = new clsField("anio", ccsInteger, "");
        
        $this->primera_fecha_asignacion = new clsField("primera_fecha_asignacion", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->primera_fecha_encurso = new clsField("primera_fecha_encurso", ccsDate, array("yyyy", "-", "mm", "-", "dd", " ", "HH", ":", "nn", ":", "ss", ".", "S"));
        
        $this->horas_invertidas = new clsField("horas_invertidas", ccsText, "");
        
        $this->H_id_incidente = new clsField("H_id_incidente", ccsText, "");
        
        $this->H_mes = new clsField("H_mes", ccsText, "");
        
        $this->H_anio = new clsField("H_anio", ccsText, "");
        
        $this->H_horas_invertidas = new clsField("H_horas_invertidas", ccsFloat, "");
        

        $this->InsertFields["primera_fecha_asignacion"] = array("Name" => "primera_fecha_asignacion", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["primera_fecha_encurso"] = array("Name" => "primera_fecha_encurso", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["id_incidente"] = array("Name" => "id_incidente", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["mes"] = array("Name" => "mes", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["anio"] = array("Name" => "anio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["horas_invertidas"] = array("Name" => "horas_invertidas", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["primera_fecha_asignacion"] = array("Name" => "primera_fecha_asignacion", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["primera_fecha_encurso"] = array("Name" => "primera_fecha_encurso", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["id_incidente"] = array("Name" => "id_incidente", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["mes"] = array("Name" => "mes", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["anio"] = array("Name" => "anio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["horas_invertidas"] = array("Name" => "horas_invertidas", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @347-D654A9F8
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

//Open Method @347-DCD5DF82
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM mc_incidentes_reasignaciones {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @347-98349A6C
    function SetValues()
    {
        $this->id_incidente->SetDBValue($this->f("id_incidente"));
        $this->mes->SetDBValue(trim($this->f("mes")));
        $this->anio->SetDBValue(trim($this->f("anio")));
        $this->primera_fecha_asignacion->SetDBValue(trim($this->f("primera_fecha_asignacion")));
        $this->primera_fecha_encurso->SetDBValue(trim($this->f("primera_fecha_encurso")));
        $this->H_id_incidente->SetDBValue($this->f("id_incidente"));
        $this->H_mes->SetDBValue($this->f("mes"));
        $this->H_anio->SetDBValue($this->f("anio"));
        $this->H_horas_invertidas->SetDBValue(trim($this->f("horas_invertidas")));
    }
//End SetValues Method

//Insert Method @347-05046EE8
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["primera_fecha_asignacion"]["Value"] = $this->primera_fecha_asignacion->GetDBValue(true);
        $this->InsertFields["primera_fecha_encurso"]["Value"] = $this->primera_fecha_encurso->GetDBValue(true);
        $this->InsertFields["id_incidente"]["Value"] = $this->H_id_incidente->GetDBValue(true);
        $this->InsertFields["mes"]["Value"] = $this->H_mes->GetDBValue(true);
        $this->InsertFields["anio"]["Value"] = $this->H_anio->GetDBValue(true);
        $this->InsertFields["horas_invertidas"]["Value"] = $this->H_horas_invertidas->GetDBValue(true);
        $this->SQL = CCBuildInsert("mc_incidentes_reasignaciones", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @347-4FFCF01D
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["primera_fecha_asignacion"]["Value"] = $this->primera_fecha_asignacion->GetDBValue(true);
        $this->UpdateFields["primera_fecha_encurso"]["Value"] = $this->primera_fecha_encurso->GetDBValue(true);
        $this->UpdateFields["id_incidente"]["Value"] = $this->H_id_incidente->GetDBValue(true);
        $this->UpdateFields["mes"]["Value"] = $this->H_mes->GetDBValue(true);
        $this->UpdateFields["anio"]["Value"] = $this->H_anio->GetDBValue(true);
        $this->UpdateFields["horas_invertidas"]["Value"] = $this->H_horas_invertidas->GetDBValue(true);
        $this->SQL = CCBuildUpdate("mc_incidentes_reasignaciones", $this->UpdateFields, $this);
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

//Delete Method @347-BC0F2D7B
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM mc_incidentes_reasignaciones";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End mc_incidentes_reasignacioDataSource Class @347-FCB6E20C









//Initialize Page @1-46529897
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
$TemplateFileName = "IncidenteDetalle3.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/ui/jquery.ui.core.js|js/jquery/ui/jquery.ui.widget.js|js/jquery/ui/jquery.ui.datepicker.js|js/jquery/datepicker/ccs-date-timepicker.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-4B0BB954
CCSecurityRedirect("3", "");
//End Authenticate User

//Include events file @1-CCE3D925
include_once("./IncidenteDetalle3_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-21A6CB3E
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$mc_detalle_incidente_avl = new clsGridmc_detalle_incidente_avl("", $MainPage);
$slAnterior = new clsControl(ccsLink, "slAnterior", "slAnterior", ccsText, "", CCGetRequestParam("slAnterior", ccsGet, NULL), $MainPage);
$slAnterior->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$slAnterior->Page = "";
$slSiguiente = new clsControl(ccsLink, "slSiguiente", "slSiguiente", ccsText, "", CCGetRequestParam("slSiguiente", ccsGet, NULL), $MainPage);
$slSiguiente->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$slSiguiente->Page = "";
$mc_info_incidentes = new clsRecordmc_info_incidentes("", $MainPage);
$mc_calificacion_incidente = new clsRecordmc_calificacion_incidente("", $MainPage);
$mc_info_incidentes3 = new clsRecordmc_info_incidentes3("", $MainPage);
$mc_info_incidentes4 = new clsRecordmc_info_incidentes4("", $MainPage);
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$mc_info_incidentes1 = new clsRecordmc_info_incidentes1("", $MainPage);
$mc_info_incidentes2 = new clsRecordmc_info_incidentes2("", $MainPage);
$mc_incidentes_relacionado = new clsGridmc_incidentes_relacionado("", $MainPage);
$Final = new clsRecordFinal("", $MainPage);
$mc_incidentes_reasignacio = new clsRecordmc_incidentes_reasignacio("", $MainPage);
$MainPage->mc_detalle_incidente_avl = & $mc_detalle_incidente_avl;
$MainPage->slAnterior = & $slAnterior;
$MainPage->slSiguiente = & $slSiguiente;
$MainPage->mc_info_incidentes = & $mc_info_incidentes;
$MainPage->mc_calificacion_incidente = & $mc_calificacion_incidente;
$MainPage->mc_info_incidentes3 = & $mc_info_incidentes3;
$MainPage->mc_info_incidentes4 = & $mc_info_incidentes4;
$MainPage->Header = & $Header;
$MainPage->mc_info_incidentes1 = & $mc_info_incidentes1;
$MainPage->mc_info_incidentes2 = & $mc_info_incidentes2;
$MainPage->mc_incidentes_relacionado = & $mc_incidentes_relacionado;
$MainPage->Final = & $Final;
$MainPage->mc_incidentes_reasignacio = & $mc_incidentes_reasignacio;
$mc_detalle_incidente_avl->Initialize();
$mc_info_incidentes->Initialize();
$mc_calificacion_incidente->Initialize();
$mc_info_incidentes3->Initialize();
$mc_info_incidentes2->Initialize();
$mc_incidentes_relacionado->Initialize();
$mc_incidentes_reasignacio->Initialize();
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

//Execute Components @1-717FC1F3
$mc_incidentes_reasignacio->Operation();
$Final->Operation();
$mc_info_incidentes2->Operation();
$mc_info_incidentes1->Operation();
$Header->Operations();
$mc_info_incidentes4->Operation();
$mc_info_incidentes3->Operation();
$mc_calificacion_incidente->Operation();
$mc_info_incidentes->Operation();
//End Execute Components

//Go to destination page @1-AF62E11B
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    unset($mc_detalle_incidente_avl);
    unset($mc_info_incidentes);
    unset($mc_calificacion_incidente);
    unset($mc_info_incidentes3);
    unset($mc_info_incidentes4);
    $Header->Class_Terminate();
    unset($Header);
    unset($mc_info_incidentes1);
    unset($mc_info_incidentes2);
    unset($mc_incidentes_relacionado);
    unset($Final);
    unset($mc_incidentes_reasignacio);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-97BEEF49
$mc_detalle_incidente_avl->Show();
$mc_info_incidentes->Show();
$mc_calificacion_incidente->Show();
$mc_info_incidentes3->Show();
$mc_info_incidentes4->Show();
$Header->Show();
$mc_info_incidentes1->Show();
$mc_info_incidentes2->Show();
$mc_incidentes_relacionado->Show();
$Final->Show();
$mc_incidentes_reasignacio->Show();
$slAnterior->Show();
$slSiguiente->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-3DD7A7D3
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
unset($mc_detalle_incidente_avl);
unset($mc_info_incidentes);
unset($mc_calificacion_incidente);
unset($mc_info_incidentes3);
unset($mc_info_incidentes4);
$Header->Class_Terminate();
unset($Header);
unset($mc_info_incidentes1);
unset($mc_info_incidentes2);
unset($mc_incidentes_relacionado);
unset($Final);
unset($mc_incidentes_reasignacio);
unset($Tpl);
//End Unload Page


?>
