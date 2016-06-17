<?php
//Include Common Files @1-ECD33876
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "MuestraReporte.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Include Page implementation @3-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

//ReportesMyM ReportGroup class @30-20A913D7
class clsReportGroupReportesMyM {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $Grupo, $_GrupoAttributes;
    public $Nombre, $_NombrePage, $_NombreParameters, $_NombreAttributes;
    public $ReportLabel1, $_ReportLabel1Attributes;
    public $IdReporte, $_IdReporteAttributes;
    public $activo, $_activoAttributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $GrupoTotalIndex;

    function clsReportGroupReportesMyM(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Grupo = $this->Parent->Grupo->Value;
        $this->Nombre = $this->Parent->Nombre->Value;
        $this->ReportLabel1 = $this->Parent->ReportLabel1->Value;
        $this->IdReporte = $this->Parent->IdReporte->Value;
        $this->activo = $this->Parent->activo->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_NombrePage = $this->Parent->Nombre->Page;
        $this->_NombreParameters = $this->Parent->Nombre->Parameters;
        $this->_GrupoAttributes = $this->Parent->Grupo->Attributes->GetAsArray();
        $this->_NombreAttributes = $this->Parent->Nombre->Attributes->GetAsArray();
        $this->_ReportLabel1Attributes = $this->Parent->ReportLabel1->Attributes->GetAsArray();
        $this->_IdReporteAttributes = $this->Parent->IdReporte->Attributes->GetAsArray();
        $this->_activoAttributes = $this->Parent->activo->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->Grupo = $Header->Grupo;
        $Header->_GrupoAttributes = $this->_GrupoAttributes;
        $this->Parent->Grupo->Value = $Header->Grupo;
        $this->Parent->Grupo->Attributes->RestoreFromArray($Header->_GrupoAttributes);
        $this->Nombre = $Header->Nombre;
        $this->_NombrePage = $Header->_NombrePage;
        $this->_NombreParameters = $Header->_NombreParameters;
        $Header->_NombreAttributes = $this->_NombreAttributes;
        $this->Parent->Nombre->Value = $Header->Nombre;
        $this->Parent->Nombre->Attributes->RestoreFromArray($Header->_NombreAttributes);
        $this->ReportLabel1 = $Header->ReportLabel1;
        $Header->_ReportLabel1Attributes = $this->_ReportLabel1Attributes;
        $this->Parent->ReportLabel1->Value = $Header->ReportLabel1;
        $this->Parent->ReportLabel1->Attributes->RestoreFromArray($Header->_ReportLabel1Attributes);
        $this->IdReporte = $Header->IdReporte;
        $Header->_IdReporteAttributes = $this->_IdReporteAttributes;
        $this->Parent->IdReporte->Value = $Header->IdReporte;
        $this->Parent->IdReporte->Attributes->RestoreFromArray($Header->_IdReporteAttributes);
        $this->activo = $Header->activo;
        $Header->_activoAttributes = $this->_activoAttributes;
        $this->Parent->activo->Value = $Header->activo;
        $this->Parent->activo->Attributes->RestoreFromArray($Header->_activoAttributes);
    }
    function ChangeTotalControls() {
    }
}
//End ReportesMyM ReportGroup class

//ReportesMyM GroupsCollection class @30-9CF43214
class clsGroupsCollectionReportesMyM {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mGrupoCurrentHeaderIndex;
    public $PageSize;
    public $TotalPages = 0;
    public $TotalRows = 0;
    public $CurrentPageSize = 0;
    public $Pages;
    public $Parent;
    public $LastDetailIndex;

    function clsGroupsCollectionReportesMyM(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mGrupoCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReportesMyM($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->GrupoTotalIndex = $this->mGrupoCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Grupo->Value = $this->Parent->Grupo->initialValue;
        $this->Parent->Nombre->Value = $this->Parent->Nombre->initialValue;
        $this->Parent->ReportLabel1->Value = $this->Parent->ReportLabel1->initialValue;
        $this->Parent->IdReporte->Value = $this->Parent->IdReporte->initialValue;
        $this->Parent->activo->Value = $this->Parent->activo->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
        if ($groupName == "Grupo") {
            $GroupGrupo = & $this->InitGroup(true);
            $this->Parent->Grupo_Header->CCSEventResult = CCGetEvent($this->Parent->Grupo_Header->CCSEvents, "OnInitialize", $this->Parent->Grupo_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Grupo_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Grupo_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Grupo_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Grupo_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Grupo_Header->Height;
                $GroupGrupo->SetTotalControls("GetNextValue");
            $this->Parent->Grupo_Header->CCSEventResult = CCGetEvent($this->Parent->Grupo_Header->CCSEvents, "OnCalculate", $this->Parent->Grupo_Header);
            $GroupGrupo->SetControls();
            $GroupGrupo->Mode = 1;
            $GroupGrupo->GroupType = "Grupo";
            $this->mGrupoCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupGrupo;
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
        $GroupGrupo = & $this->InitGroup(true);
        $this->Parent->Grupo_Footer->CCSEventResult = CCGetEvent($this->Parent->Grupo_Footer->CCSEvents, "OnInitialize", $this->Parent->Grupo_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Grupo_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Grupo_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Grupo_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupGrupo->SetTotalControls("GetPrevValue");
        $GroupGrupo->SyncWithHeader($this->Groups[$this->mGrupoCurrentHeaderIndex]);
        if ($this->Parent->Grupo_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Grupo_Footer->Height;
        $this->Parent->Grupo_Footer->CCSEventResult = CCGetEvent($this->Parent->Grupo_Footer->CCSEvents, "OnCalculate", $this->Parent->Grupo_Footer);
        $GroupGrupo->SetControls();
        $this->RestoreValues();
        $GroupGrupo->Mode = 2;
        $GroupGrupo->GroupType ="Grupo";
        $this->Groups[] = & $GroupGrupo;
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End ReportesMyM GroupsCollection class

class clsReportReportesMyM { //ReportesMyM Class @30-846FA4A6

//ReportesMyM Variables @30-0D2A7D58

    public $ComponentType = "Report";
    public $PageSize;
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $CCSEvents = array();
    public $CCSEventResult;
    public $RelativePath = "";
    public $ViewMode = "Web";
    public $TemplateBlock;
    public $PageNumber;
    public $RowNumber;
    public $TotalRows;
    public $TotalPages;
    public $ControlsVisible = array();
    public $IsEmpty;
    public $Attributes;
    public $DetailBlock, $Detail;
    public $Report_FooterBlock, $Report_Footer;
    public $Report_HeaderBlock, $Report_Header;
    public $Page_FooterBlock, $Page_Footer;
    public $Page_HeaderBlock, $Page_Header;
    public $Grupo_HeaderBlock, $Grupo_Header;
    public $Grupo_FooterBlock, $Grupo_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $Grupo_HeaderControls, $Grupo_FooterControls;
//End ReportesMyM Variables

//Class_Initialize Event @30-27B803DF
    function clsReportReportesMyM($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "ReportesMyM";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $this->Page_Header->Visible = false;
        $this->Grupo_Footer = new clsSection($this);
        $this->Grupo_Header = new clsSection($this);
        $this->Grupo_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Grupo_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReportesMyMDataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 100;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Grupo = new clsControl(ccsReportLabel, "Grupo", "Grupo", ccsText, "", "", $this);
        $this->Nombre = new clsControl(ccsLink, "Nombre", "Nombre", ccsText, "", CCGetRequestParam("Nombre", ccsGet, NULL), $this);
        $this->Nombre->Page = "";
        $this->ReportLabel1 = new clsControl(ccsReportLabel, "ReportLabel1", "ReportLabel1", ccsText, "", "", $this);
        $this->ReportLabel1->IsEmptySource = true;
        $this->IdReporte = new clsControl(ccsHidden, "IdReporte", "IdReporte", ccsInteger, "", CCGetRequestParam("IdReporte", ccsGet, NULL), $this);
        $this->activo = new clsControl(ccsReportLabel, "activo", "activo", ccsInteger, "", "", $this);
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @30-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @30-CC614C42
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Grupo->Errors->Count());
        $errors = ($errors || $this->Nombre->Errors->Count());
        $errors = ($errors || $this->ReportLabel1->Errors->Count());
        $errors = ($errors || $this->IdReporte->Errors->Count());
        $errors = ($errors || $this->activo->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @30-79AD1A78
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Grupo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IdReporte->Errors->ToString());
        $errors = ComposeStrings($errors, $this->activo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @30-9B2BF471
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["expr83"] = 'SLAs';
        $this->DataSource->Parameters["expr84"] = 1;
        $this->DataSource->Parameters["sesMyMUserID"] = CCGetSession("MyMUserID", NULL);
        $this->DataSource->Parameters["sesGrupoValoracion"] = CCGetSession("GrupoValoracion", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $GrupoKey = "";
        $Groups = new clsGroupsCollectionReportesMyM($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Grupo->SetValue($this->DataSource->Grupo->GetValue());
            $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
            $this->IdReporte->SetValue($this->DataSource->IdReporte->GetValue());
            $this->activo->SetValue($this->DataSource->activo->GetValue());
            $this->Nombre->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->Nombre->Parameters = CCAddParam($this->Nombre->Parameters, "IdReporte", $this->DataSource->f("IdReporte"));
            $this->ReportLabel1->SetValue("");
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $GrupoKey != $this->DataSource->f("Grupo")) {
                $Groups->OpenGroup("Grupo");
            }
            $Groups->AddItem();
            $GrupoKey = $this->DataSource->f("Grupo");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $GrupoKey != $this->DataSource->f("Grupo")) {
                $Groups->CloseGroup("Grupo");
            }
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            $this->ControlsVisible["Grupo"] = $this->Grupo->Visible;
            $this->ControlsVisible["Nombre"] = $this->Nombre->Visible;
            $this->ControlsVisible["ReportLabel1"] = $this->ReportLabel1->Visible;
            $this->ControlsVisible["IdReporte"] = $this->IdReporte->Visible;
            $this->ControlsVisible["activo"] = $this->activo->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Nombre->SetValue($items[$i]->Nombre);
                        $this->Nombre->Page = $items[$i]->_NombrePage;
                        $this->Nombre->Parameters = $items[$i]->_NombreParameters;
                        $this->Nombre->Attributes->RestoreFromArray($items[$i]->_NombreAttributes);
                        $this->ReportLabel1->SetValue($items[$i]->ReportLabel1);
                        $this->ReportLabel1->Attributes->RestoreFromArray($items[$i]->_ReportLabel1Attributes);
                        $this->IdReporte->SetValue($items[$i]->IdReporte);
                        $this->IdReporte->Attributes->RestoreFromArray($items[$i]->_IdReporteAttributes);
                        $this->activo->SetValue($items[$i]->activo);
                        $this->activo->Attributes->RestoreFromArray($items[$i]->_activoAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Nombre->Show();
                        $this->ReportLabel1->Show();
                        $this->IdReporte->Show();
                        $this->activo->Show();
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                        if ($this->Detail->Visible)
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode) && ($this->Navigator->TotalPages > 1);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Navigator->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Grupo":
                        if ($items[$i]->Mode == 1) {
                            $this->Grupo->SetValue($items[$i]->Grupo);
                            $this->Grupo->Attributes->RestoreFromArray($items[$i]->_GrupoAttributes);
                            $this->Grupo_Header->CCSEventResult = CCGetEvent($this->Grupo_Header->CCSEvents, "BeforeShow", $this->Grupo_Header);
                            if ($this->Grupo_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Grupo_Header";
                                $this->Attributes->Show();
                                $this->Grupo->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Grupo_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Grupo_Footer->CCSEventResult = CCGetEvent($this->Grupo_Footer->CCSEvents, "BeforeShow", $this->Grupo_Footer);
                            if ($this->Grupo_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Grupo_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Grupo_Footer", true, "Section Detail");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End ReportesMyM Class @30-FCB6E20C

class clsReportesMyMDataSource extends clsDBcnDisenio {  //ReportesMyMDataSource Class @30-E64C1439

//DataSource Variables @30-BA734934
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $Grupo;
    public $Nombre;
    public $IdReporte;
    public $activo;
//End DataSource Variables

//DataSourceClass_Initialize Event @30-1028CC18
    function clsReportesMyMDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report ReportesMyM";
        $this->Initialize();
        $this->Grupo = new clsField("Grupo", ccsText, "");
        
        $this->Nombre = new clsField("Nombre", ccsText, "");
        
        $this->IdReporte = new clsField("IdReporte", ccsInteger, "");
        
        $this->activo = new clsField("activo", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @30-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @30-57A1FCD6
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "expr83", ccsText, "", "", $this->Parameters["expr83"], "", false);
        $this->wp->AddParameter("2", "expr84", ccsInteger, "", "", $this->Parameters["expr84"], 0, false);
        $this->wp->AddParameter("3", "sesMyMUserID", ccsInteger, "", "", $this->Parameters["sesMyMUserID"], 0, false);
        $this->wp->AddParameter("4", "sesGrupoValoracion", ccsText, "", "", $this->Parameters["sesGrupoValoracion"], "", false);
    }
//End Prepare Method

//Open Method @30-C09B83E9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT IdReporte, Nombre, Grupo, usuario_reporteMyM.activo AS Perm_activo \n" .
        "FROM ReportesMyM INNER JOIN usuario_reporteMyM ON\n" .
        "ReportesMyM.IdReporte = usuario_reporteMyM.id_reporte\n" .
        "WHERE (Grupo <> '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "' OR '" . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "' =  'CAPC')\n" .
        "AND ReportesMyM.activo = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . "\n" .
        "AND id_usuario = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsInteger) . " ";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "ReportesMyM.Grupo asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @30-271BE820
    function SetValues()
    {
        $this->Grupo->SetDBValue($this->f("Grupo"));
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->IdReporte->SetDBValue(trim($this->f("IdReporte")));
        $this->activo->SetDBValue(trim($this->f("Perm_activo")));
    }
//End SetValues Method

} //End ReportesMyMDataSource Class @30-FCB6E20C

//DEL      function Open()
//DEL      {
//DEL          $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
//DEL          $this->SQL = "SELECT * \n" .
//DEL          "FROM ReportesMyM Rep\n" .
//DEL          "left join usuario_reporteMyM  Perm on Perm.id_reporte=Rep.IdReporte\n" .
//DEL          "where (Rep.Grupo <> 'SLAs' or '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'  ='SLAs')\n" .
//DEL          "	and Rep.activo=1\n" .
//DEL          "	and Perm.activo=1\n" .
//DEL          "	and Perm.id_usuario=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsInteger) . " {SQL_OrderBy}";
//DEL          $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
//DEL          $this->query(CCBuildSQL($this->SQL, $this->Where, "Grupo asc" .  ($this->Order ? ", " . $this->Order: "")));
//DEL          $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
//DEL      }



//Initialize Page @1-EFBE8721
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
$TemplateFileName = "MuestraReporte.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-872FD3D7
CCSecurityRedirect("", "");
//End Authenticate User

//Include events file @1-D4CEC5F3
include_once("./MuestraReporte_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-B72E65B3
$DBcnDisenio = new clsDBcnDisenio();
$MainPage->Connections["cnDisenio"] = & $DBcnDisenio;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Header = new clsHeader("", "Header", $MainPage);
$Header->Initialize();
$lReportContent = new clsControl(ccsLabel, "lReportContent", "lReportContent", ccsText, "", CCGetRequestParam("lReportContent", ccsGet, NULL), $MainPage);
$lReportContent->HTML = true;
$ImageLink2 = new clsControl(ccsImageLink, "ImageLink2", "ImageLink2", ccsText, "", CCGetRequestParam("ImageLink2", ccsGet, NULL), $MainPage);
$ImageLink2->Page = "MuestraReporte.php";
$ReportesMyM = new clsReportReportesMyM("", $MainPage);
$MainPage->Header = & $Header;
$MainPage->lReportContent = & $lReportContent;
$MainPage->ImageLink2 = & $ImageLink2;
$MainPage->ReportesMyM = & $ReportesMyM;
$ImageLink2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$ImageLink2->Parameters = CCAddParam($ImageLink2->Parameters, "fullscreen", 0);
$ReportesMyM->Initialize();
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

//Execute Components @1-47111282
$Header->Operations();
//End Execute Components

//Go to destination page @1-6095D023
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBcnDisenio->close();
    header("Location: " . $Redirect);
    $Header->Class_Terminate();
    unset($Header);
    unset($ReportesMyM);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E06F5EF8
$Header->Show();
$ReportesMyM->Show();
$lReportContent->Show();
$ImageLink2->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-8733F827
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBcnDisenio->close();
$Header->Class_Terminate();
unset($Header);
unset($ReportesMyM);
unset($Tpl);
//End Unload Page


?>
