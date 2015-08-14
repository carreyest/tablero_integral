<?php

class clsHeader { //Header class @1-CC982CB1

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

//Class_Initialize Event @1-5C4FA0A2
    function clsHeader($RelativePath, $ComponentName, & $Parent)
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = $ComponentName;
        $this->RelativePath = $RelativePath;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->FileName = "Header.php";
        $this->Redirect = "";
        $this->TemplateFileName = "Header.html";
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

//BindEvents Method @1-979A3959
    function BindEvents()
    {
        $this->pnlMenu->CCSEvents["BeforeShow"] = "Header_pnlMenu_BeforeShow";
        $this->CCSEvents["BeforeShow"] = "Header_BeforeShow";
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

//Initialize Method @1-A4A3D3A8
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
        $this->ImageLink1 = new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink1->Page = "";
        $this->hdLogoPath = new clsControl(ccsHidden, "hdLogoPath", "hdLogoPath", ccsText, "", CCGetRequestParam("hdLogoPath", ccsGet, NULL), $this);
        $this->pnlMenu = new clsPanel("pnlMenu", $this);
        $this->pnlMenuAdmin = new clsPanel("pnlMenuAdmin", $this);
        $this->lkAdmin = new clsControl(ccsLink, "lkAdmin", "lkAdmin", ccsText, "", CCGetRequestParam("lkAdmin", ccsGet, NULL), $this);
        $this->lkAdmin->Page = $this->RelativePath . "MainAdmin.php";
        $this->Panel3 = new clsPanel("Panel3", $this);
        $this->lkUniverso = new clsControl(ccsLink, "lkUniverso", "lkUniverso", ccsText, "", CCGetRequestParam("lkUniverso", ccsGet, NULL), $this);
        $this->lkUniverso->Page = $this->RelativePath . "UniversoLista.php";
        $this->lkIncidentes = new clsControl(ccsLink, "lkIncidentes", "lkIncidentes", ccsText, "", CCGetRequestParam("lkIncidentes", ccsGet, NULL), $this);
        $this->lkIncidentes->Page = $this->RelativePath . "IncidentesLista.php";
        $this->lkRequerimientos = new clsControl(ccsLink, "lkRequerimientos", "lkRequerimientos", ccsText, "", CCGetRequestParam("lkRequerimientos", ccsGet, NULL), $this);
        $this->lkRequerimientos->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkRequerimientos->Page = $this->RelativePath . "PPMCsApbLista.php";
        $this->lkPPMCCierre = new clsControl(ccsLink, "lkPPMCCierre", "lkPPMCCierre", ccsText, "", CCGetRequestParam("lkPPMCCierre", ccsGet, NULL), $this);
        $this->lkPPMCCierre->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkPPMCCierre->Page = $this->RelativePath . "PPMCsCrbLista.php";
        $this->Link2 = new clsControl(ccsLink, "Link2", "Link2", ccsText, "", CCGetRequestParam("Link2", ccsGet, NULL), $this);
        $this->Link2->Page = $this->RelativePath . "EficienciaPresLista.php";
        $this->Link3 = new clsControl(ccsLink, "Link3", "Link3", ccsText, "", CCGetRequestParam("Link3", ccsGet, NULL), $this);
        $this->Link3->Page = $this->RelativePath . "SLAsCAPCLista.php";
        $this->Panel1 = new clsPanel("Panel1", $this);
        $this->lSesion = new clsControl(ccsLink, "lSesion", "lSesion", ccsText, "", CCGetRequestParam("lSesion", ccsGet, NULL), $this);
        $this->lSesion->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lSesion->Page = $this->RelativePath . "CambiarPsw.php";
        $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $this);
        $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link1->Page = $this->RelativePath . "Logout.php";
        $this->img_abre_pantalla = new clsControl(ccsImageLink, "img_abre_pantalla", "img_abre_pantalla", ccsText, "", CCGetRequestParam("img_abre_pantalla", ccsGet, NULL), $this);
        $this->img_abre_pantalla->Page = $this->RelativePath . "MuestraReporte.php";
        $this->Panel2 = new clsPanel("Panel2", $this);
        $this->Link4 = new clsControl(ccsLink, "Link4", "Link4", ccsText, "", CCGetRequestParam("Link4", ccsGet, NULL), $this);
        $this->Link4->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link4->Page = $this->RelativePath . "TableroSLAs.php";
        $this->Link5 = new clsControl(ccsLink, "Link5", "Link5", ccsText, "", CCGetRequestParam("Link5", ccsGet, NULL), $this);
        $this->Link5->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link5->Page = $this->RelativePath . "MuestraReporte.php";
        $this->Link6 = new clsControl(ccsLink, "Link6", "Link6", ccsText, "", CCGetRequestParam("Link6", ccsGet, NULL), $this);
        $this->Link6->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link6->Page = "http://webiterasrv2/sites/SDMA_Reporte/Pages/default.aspx";
        $this->pnlMenu->AddComponent("pnlMenuAdmin", $this->pnlMenuAdmin);
        $this->pnlMenu->AddComponent("Panel3", $this->Panel3);
        $this->pnlMenuAdmin->AddComponent("lkAdmin", $this->lkAdmin);
        $this->Panel3->AddComponent("lkUniverso", $this->lkUniverso);
        $this->Panel3->AddComponent("lkIncidentes", $this->lkIncidentes);
        $this->Panel3->AddComponent("lkRequerimientos", $this->lkRequerimientos);
        $this->Panel3->AddComponent("lkPPMCCierre", $this->lkPPMCCierre);
        $this->Panel3->AddComponent("Link2", $this->Link2);
        $this->Panel3->AddComponent("Link3", $this->Link3);
        $this->Panel1->AddComponent("lSesion", $this->lSesion);
        $this->Panel1->AddComponent("Link1", $this->Link1);
        $this->Panel1->AddComponent("img_abre_pantalla", $this->img_abre_pantalla);
        $this->Panel2->AddComponent("Link4", $this->Link4);
        $this->Panel2->AddComponent("Link5", $this->Link5);
        $this->Panel2->AddComponent("Link6", $this->Link6);
        $this->BindEvents();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnInitializeView", $this);
        $this->lkIncidentes->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->lkIncidentes->Parameters = CCAddParam($this->lkIncidentes->Parameters, "s_mes_param", CCGetParam("s_MesReporte"));
        $this->img_abre_pantalla->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->img_abre_pantalla->Parameters = CCAddParam($this->img_abre_pantalla->Parameters, "fullscreen", 1);
    }
//End Initialize Method

//Show Method @1-A090FA54
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
        $this->ImageLink1->Show();
        $this->hdLogoPath->Show();
        $this->pnlMenu->Show();
        $this->Panel1->Show();
        $this->Panel2->Show();
        $Tpl->Parse();
        $Tpl->block_path = $block_path;
        $TplData = $Tpl->GetVar($this->ComponentName);
        $Tpl->SetVar($this->ComponentName, $TplData);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeOutput", $this);
    }
//End Show Method

} //End Header Class @1-FCB6E20C

//Include Event File @1-6613ADCA
include_once(RelativePath . "/Header_events.php");
//End Include Event File
?>
