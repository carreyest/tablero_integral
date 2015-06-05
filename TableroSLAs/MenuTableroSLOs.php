<?php

class clsMenuTableroSLOs { //MenuTableroSLOs class @1-3DC68FC1

//Variables @1-EEEBE252
    public $ComponentType = "IncludablePage";
    public $Connections = array();
    public $FileName = "";
    public $Redirect = "";
    public $Tpl = "";
    public $TemplateFileName = "";
    public $BlockToParse = "";
    public $ComponentName = "";
    public $Attributes = "";

    // Events;
    public $CCSEvents = "";
    public $CCSEventResult = "";
    public $RelativePath;
    public $Visible;
    public $Parent;
    public $TemplateSource;
//End Variables

//Class_Initialize Event @1-E475FBA4
    function clsMenuTableroSLOs($RelativePath, $ComponentName, & $Parent)
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = $ComponentName;
        $this->RelativePath = $RelativePath;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->FileName = "MenuTableroSLOs.php";
        $this->Redirect = "";
        $this->TemplateFileName = "MenuTableroSLOs.html";
        $this->BlockToParse = "main";
        $this->TemplateEncoding = "CP1252";
        $this->ContentType = "text/html";
    }
//End Class_Initialize Event

//Class_Terminate Event @1-32FD4740
    function Class_Terminate()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUnload", $this);
    }
//End Class_Terminate Event

//BindEvents Method @1-8FB10730
    function BindEvents()
    {
        $this->CCSEvents["BeforeShow"] = "MenuTableroSLOs_BeforeShow";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInitialize", $this);
    }
//End BindEvents Method

//Operations Method @1-7E2A14CF
    function Operations()
    {
        global $Redirect;
        if(!$this->Visible)
            return "";
    }
//End Operations Method

//Initialize Method @1-DB53BE06
    function Initialize($Path = "")
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        global $Scripts;
        $IncScripts = "|";
        $SList = explode("|", $IncScripts);
        foreach ($SList as $Script) {
            if ($Script != "" && strpos($Scripts, "|" . $Script . "|") === false)  $Scripts = $Scripts . $Script . "|";
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInitialize", $this);
        if(!$this->Visible)
            return "";
        $this->Attributes = & $this->Parent->Attributes;

        // Create Components
        $this->lkCuadroNS = new clsControl(ccsLink, "lkCuadroNS", "lkCuadroNS", ccsText, "", CCGetRequestParam("lkCuadroNS", ccsGet, NULL), $this);
        $this->lkCuadroNS->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkCuadroNS->Page = $this->RelativePath . "PPMCsApbCuadroNSRSxlsSLOs.php";
        $this->lkDetalleRS = new clsControl(ccsLink, "lkDetalleRS", "lkDetalleRS", ccsText, "", CCGetRequestParam("lkDetalleRS", ccsGet, NULL), $this);
        $this->lkDetalleRS->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkDetalleRS->Page = $this->RelativePath . "PPMCsApbDetalleRSxlsSLOs.php";
        $this->lkTableroSLAs = new clsControl(ccsLink, "lkTableroSLAs", "lkTableroSLAs", ccsText, "", CCGetRequestParam("lkTableroSLAs", ccsGet, NULL), $this);
        $this->lkTableroSLAs->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkTableroSLAs->Page = $this->RelativePath . "TableroSLOs.php";
        $this->lkCuadroNSInc = new clsControl(ccsLink, "lkCuadroNSInc", "lkCuadroNSInc", ccsText, "", CCGetRequestParam("lkCuadroNSInc", ccsGet, NULL), $this);
        $this->lkCuadroNSInc->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkCuadroNSInc->Page = $this->RelativePath . "IncidentesCuadroNSxlsSLOs.php";
        $this->lkDetalleIncidentesNS = new clsControl(ccsLink, "lkDetalleIncidentesNS", "lkDetalleIncidentesNS", ccsText, "", CCGetRequestParam("lkDetalleIncidentesNS", ccsGet, NULL), $this);
        $this->lkDetalleIncidentesNS->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkDetalleIncidentesNS->Page = $this->RelativePath . "IncidentesDetalleNSSLOs.php";
        $this->pnlDictamen = new clsPanel("pnlDictamen", $this);
        $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $this);
        $this->Link1->Page = $this->RelativePath . "GeneraDictamen.php";
        $this->lkReporteExcel1 = new clsControl(ccsLink, "lkReporteExcel1", "lkReporteExcel1", ccsText, "", CCGetRequestParam("lkReporteExcel1", ccsGet, NULL), $this);
        $this->lkReporteExcel1->Page = $this->RelativePath . "TableroExcel.php";
        $this->Link2 = new clsControl(ccsLink, "Link2", "Link2", ccsText, "", CCGetRequestParam("Link2", ccsGet, NULL), $this);
        $this->Link2->Page = $this->RelativePath . "TableroExcel.php";
        $this->lkReporteExcel2 = new clsControl(ccsLink, "lkReporteExcel2", "lkReporteExcel2", ccsText, "", CCGetRequestParam("lkReporteExcel2", ccsGet, NULL), $this);
        $this->lkReporteExcel2->Page = $this->RelativePath . "TableroExcel.php";
        $this->pnlDictamen->AddComponent("Link1", $this->Link1);
        $this->BindEvents();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnInitializeView", $this);
        $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link1->Parameters = CCAddParam($this->Link1->Parameters, "chkExport", 1);
        $this->lkReporteExcel1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkReporteExcel1->Parameters = CCAddParam($this->lkReporteExcel1->Parameters, "s_SLO", 1);
        $this->Link2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link2->Parameters = CCAddParam($this->Link2->Parameters, "SAT", 1);
        $this->lkReporteExcel2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkReporteExcel2->Parameters = CCAddParam($this->lkReporteExcel2->Parameters, "DyP", 1);
    }
//End Initialize Method

//Show Method @1-555355D3
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        $block_path = $Tpl->block_path;
        if ($this->TemplateSource) {
            $Tpl->LoadTemplateFromStr($this->TemplateSource, $this->ComponentName, $this->TemplateEncoding);
        } else {
            $Tpl->LoadTemplate("/" . $this->TemplateFileName, $this->ComponentName, $this->TemplateEncoding, "remove");
        }
        $Tpl->block_path = $Tpl->block_path . "/" . $this->ComponentName;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) {
            $Tpl->block_path = $block_path;
            $Tpl->SetVar($this->ComponentName, "");
            return "";
        }
        $this->Attributes->Show();
        $this->lkCuadroNS->Show();
        $this->lkDetalleRS->Show();
        $this->lkTableroSLAs->Show();
        $this->lkCuadroNSInc->Show();
        $this->lkDetalleIncidentesNS->Show();
        $this->pnlDictamen->Show();
        $this->lkReporteExcel1->Show();
        $this->Link2->Show();
        $this->lkReporteExcel2->Show();
        $Tpl->Parse();
        $Tpl->block_path = $block_path;
        $TplData = $Tpl->GetVar($this->ComponentName);
        $Tpl->SetVar($this->ComponentName, $TplData);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeOutput", $this);
    }
//End Show Method

} //End MenuTableroSLOs Class @1-FCB6E20C

//Include Event File @1-A8D11262
include_once(RelativePath . "/MenuTableroSLOs_events.php");
//End Include Event File


?>
