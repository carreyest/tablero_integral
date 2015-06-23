<?php
class clsMenuTablero { //MenuTablero class @1-5E48B5E6

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

//Class_Initialize Event @1-A0893FA8
    function clsMenuTablero($RelativePath, $ComponentName, & $Parent)
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = $ComponentName;
        $this->RelativePath = $RelativePath;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->FileName = "MenuTablero.php";
        $this->Redirect = "";
        $this->TemplateFileName = "MenuTablero.html";
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

//BindEvents Method @1-09636D26
    function BindEvents()
    {
        $this->CCSEvents["BeforeShow"] = "MenuTablero_BeforeShow";
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

//Initialize Method @1-7DABA332
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
        $this->lkCuadroNS->Page = $this->RelativePath . "PPMCsApbCuadroNSRSxls.php";
        $this->lkDetalleRS = new clsControl(ccsLink, "lkDetalleRS", "lkDetalleRS", ccsText, "", CCGetRequestParam("lkDetalleRS", ccsGet, NULL), $this);
        $this->lkDetalleRS->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkDetalleRS->Page = $this->RelativePath . "PPMCsApbDetalleRSxls.php";
        $this->lkTableroSLAs = new clsControl(ccsLink, "lkTableroSLAs", "lkTableroSLAs", ccsText, "", CCGetRequestParam("lkTableroSLAs", ccsGet, NULL), $this);
        $this->lkTableroSLAs->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkTableroSLAs->Page = $this->RelativePath . "TableroSLAs.php";
        $this->lkCuadroNSInc = new clsControl(ccsLink, "lkCuadroNSInc", "lkCuadroNSInc", ccsText, "", CCGetRequestParam("lkCuadroNSInc", ccsGet, NULL), $this);
        $this->lkCuadroNSInc->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkCuadroNSInc->Page = $this->RelativePath . "IncidentesCuadroNSxls.php";
        $this->lkDetalleIncidentesNS = new clsControl(ccsLink, "lkDetalleIncidentesNS", "lkDetalleIncidentesNS", ccsText, "", CCGetRequestParam("lkDetalleIncidentesNS", ccsGet, NULL), $this);
        $this->lkDetalleIncidentesNS->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkDetalleIncidentesNS->Page = $this->RelativePath . "IncidentesDetalleNS.php";
        $this->pnlDictamen = new clsPanel("pnlDictamen", $this);
        $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $this);
        $this->Link1->Page = $this->RelativePath . "GeneraDictamen.php";
        $this->lkReporteExcel1 = new clsControl(ccsImageLink, "lkReporteExcel1", "lkReporteExcel1", ccsText, "", CCGetRequestParam("lkReporteExcel1", ccsGet, NULL), $this);
        $this->lkReporteExcel1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkReporteExcel1->Page = $this->RelativePath . "TableroExcel.php";
        $this->Link2 = new clsControl(ccsLink, "Link2", "Link2", ccsText, "", CCGetRequestParam("Link2", ccsGet, NULL), $this);
        $this->Link2->Page = $this->RelativePath . "TableroExcel.php";
        $this->Link2->Visible = false;
        $this->lkReporteExcel2 = new clsControl(ccsLink, "lkReporteExcel2", "lkReporteExcel2", ccsText, "", CCGetRequestParam("lkReporteExcel2", ccsGet, NULL), $this);
        $this->lkReporteExcel2->Page = $this->RelativePath . "TableroExcel.php";
        $this->lkEntregables1 = new clsControl(ccsLink, "lkEntregables1", "lkEntregables1", ccsText, "", CCGetRequestParam("lkEntregables1", ccsGet, NULL), $this);
        $this->lkEntregables1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkEntregables1->Page = $this->RelativePath . "ListadoVerificacionEntregables.php";
        $this->pnlDictamen->AddComponent("Link1", $this->Link1);
        $this->BindEvents();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnInitializeView", $this);
        $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link1->Parameters = CCAddParam($this->Link1->Parameters, "chkExport", 1);
        $this->Link2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link2->Parameters = CCAddParam($this->Link2->Parameters, "SAT", 1);
        $this->lkReporteExcel2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkReporteExcel2->Parameters = CCAddParam($this->lkReporteExcel2->Parameters, "DyP", 1);
    }
//End Initialize Method

//Show Method @1-A309A506
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
        $this->lkEntregables1->Show();
        $Tpl->Parse();
        $Tpl->block_path = $block_path;
        $TplData = $Tpl->GetVar($this->ComponentName);
        $Tpl->SetVar($this->ComponentName, $TplData);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeOutput", $this);
    }
//End Show Method

} //End MenuTablero Class @1-FCB6E20C

//Include Event File @1-67E66012
include_once(RelativePath . "/MenuTablero_events.php");
//End Include Event File


?>
