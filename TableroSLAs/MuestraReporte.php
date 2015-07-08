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

//ReportesMyM ReportGroup class @5-E436748F
class clsReportGroupReportesMyM {
    public $GroupType;
    public $mode; //1 - open, 2 - close
    public $grupo, $_grupoAttributes;
    public $Nombre, $_NombrePage, $_NombreParameters, $_NombreAttributes;
    public $Hidden1, $_Hidden1Attributes;
    public $Attributes;
    public $ReportTotalIndex = 0;
    public $PageTotalIndex;
    public $PageNumber;
    public $RowNumber;
    public $Parent;
    public $grupoTotalIndex;

    function clsReportGroupReportesMyM(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->grupo = $this->Parent->grupo->Value;
        $this->Nombre = $this->Parent->Nombre->Value;
        $this->Hidden1 = $this->Parent->Hidden1->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_NombrePage = $this->Parent->Nombre->Page;
        $this->_NombreParameters = $this->Parent->Nombre->Parameters;
        $this->_grupoAttributes = $this->Parent->grupo->Attributes->GetAsArray();
        $this->_NombreAttributes = $this->Parent->Nombre->Attributes->GetAsArray();
        $this->_Hidden1Attributes = $this->Parent->Hidden1->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->grupo = $Header->grupo;
        $Header->_grupoAttributes = $this->_grupoAttributes;
        $this->Parent->grupo->Value = $Header->grupo;
        $this->Parent->grupo->Attributes->RestoreFromArray($Header->_grupoAttributes);
        $this->Nombre = $Header->Nombre;
        $this->_NombrePage = $Header->_NombrePage;
        $this->_NombreParameters = $Header->_NombreParameters;
        $Header->_NombreAttributes = $this->_NombreAttributes;
        $this->Parent->Nombre->Value = $Header->Nombre;
        $this->Parent->Nombre->Attributes->RestoreFromArray($Header->_NombreAttributes);
        $this->Hidden1 = $Header->Hidden1;
        $Header->_Hidden1Attributes = $this->_Hidden1Attributes;
        $this->Parent->Hidden1->Value = $Header->Hidden1;
        $this->Parent->Hidden1->Attributes->RestoreFromArray($Header->_Hidden1Attributes);
    }
    function ChangeTotalControls() {
    }
}
//End ReportesMyM ReportGroup class

//ReportesMyM GroupsCollection class @5-B117C0ED
class clsGroupsCollectionReportesMyM {
    public $Groups;
    public $mPageCurrentHeaderIndex;
    public $mgrupoCurrentHeaderIndex;
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
        $this->mgrupoCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupReportesMyM($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->grupoTotalIndex = $this->mgrupoCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->grupo->Value = $this->Parent->grupo->initialValue;
        $this->Parent->Nombre->Value = $this->Parent->Nombre->initialValue;
        $this->Parent->Hidden1->Value = $this->Parent->Hidden1->initialValue;
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
        if ($groupName == "grupo") {
            $Groupgrupo = & $this->InitGroup(true);
            $this->Parent->grupo_Header->CCSEventResult = CCGetEvent($this->Parent->grupo_Header->CCSEvents, "OnInitialize", $this->Parent->grupo_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->grupo_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->grupo_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->grupo_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->grupo_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->grupo_Header->Height;
                $Groupgrupo->SetTotalControls("GetNextValue");
            $this->Parent->grupo_Header->CCSEventResult = CCGetEvent($this->Parent->grupo_Header->CCSEvents, "OnCalculate", $this->Parent->grupo_Header);
            $Groupgrupo->SetControls();
            $Groupgrupo->Mode = 1;
            $Groupgrupo->GroupType = "grupo";
            $this->mgrupoCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $Groupgrupo;
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
        $Groupgrupo = & $this->InitGroup(true);
        $this->Parent->grupo_Footer->CCSEventResult = CCGetEvent($this->Parent->grupo_Footer->CCSEvents, "OnInitialize", $this->Parent->grupo_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->grupo_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->grupo_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->grupo_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $Groupgrupo->SetTotalControls("GetPrevValue");
        $Groupgrupo->SyncWithHeader($this->Groups[$this->mgrupoCurrentHeaderIndex]);
        if ($this->Parent->grupo_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->grupo_Footer->Height;
        $this->Parent->grupo_Footer->CCSEventResult = CCGetEvent($this->Parent->grupo_Footer->CCSEvents, "OnCalculate", $this->Parent->grupo_Footer);
        $Groupgrupo->SetControls();
        $this->RestoreValues();
        $Groupgrupo->Mode = 2;
        $Groupgrupo->GroupType ="grupo";
        $this->Groups[] = & $Groupgrupo;
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

class clsReportReportesMyM { //ReportesMyM Class @5-846FA4A6

//ReportesMyM Variables @5-EF042D91

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
    public $grupo_HeaderBlock, $grupo_Header;
    public $grupo_FooterBlock, $grupo_Footer;
    public $SorterName, $SorterDirection;

    public $ds;
    public $DataSource;
    public $UseClientPaging = false;

    //Report Controls
    public $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    public $Page_FooterControls, $Page_HeaderControls;
    public $grupo_HeaderControls, $grupo_FooterControls;
//End ReportesMyM Variables

//Class_Initialize Event @5-57885CAD
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
        $this->grupo_Footer = new clsSection($this);
        $this->grupo_Header = new clsSection($this);
        $this->grupo_Header->Height = 2;
        $MaxSectionSize = max($MaxSectionSize, $this->grupo_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsReportesMyMDataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 50;
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

        $this->grupo = new clsControl(ccsReportLabel, "grupo", "grupo", ccsText, "", "", $this);
        $this->Nombre = new clsControl(ccsLink, "Nombre", "Nombre", ccsText, "", CCGetRequestParam("Nombre", ccsGet, NULL), $this);
        $this->Nombre->Page = "";
        $this->Hidden1 = new clsControl(ccsHidden, "Hidden1", "Hidden1", ccsInteger, "", CCGetRequestParam("Hidden1", ccsGet, NULL), $this);
        $this->NoRecords = new clsPanel("NoRecords", $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @5-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @5-4D64EE79
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->grupo->Errors->Count());
        $errors = ($errors || $this->Nombre->Errors->Count());
        $errors = ($errors || $this->Hidden1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @5-7619AE1D
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->grupo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Nombre->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @5-42947B35
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["sesGrupoValoracion"] = CCGetSession("GrupoValoracion", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $grupoKey = "";
        $Groups = new clsGroupsCollectionReportesMyM($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->grupo->SetValue($this->DataSource->grupo->GetValue());
            $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
            $this->Hidden1->SetValue($this->DataSource->Hidden1->GetValue());
            $this->Nombre->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
            $this->Nombre->Parameters = CCAddParam($this->Nombre->Parameters, "IdReporte", $this->DataSource->f("IdReporte"));
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $grupoKey != $this->DataSource->f("Grupo")) {
                $Groups->OpenGroup("grupo");
            }
            $Groups->AddItem();
            $grupoKey = $this->DataSource->f("Grupo");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $grupoKey != $this->DataSource->f("Grupo")) {
                $Groups->CloseGroup("grupo");
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
            $this->ControlsVisible["grupo"] = $this->grupo->Visible;
            $this->ControlsVisible["Nombre"] = $this->Nombre->Visible;
            $this->ControlsVisible["Hidden1"] = $this->Hidden1->Visible;
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
                        $this->Hidden1->SetValue($items[$i]->Hidden1);
                        $this->Hidden1->Attributes->RestoreFromArray($items[$i]->_Hidden1Attributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Nombre->Show();
                        $this->Hidden1->Show();
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
                    case "grupo":
                        if ($items[$i]->Mode == 1) {
                            $this->grupo->SetValue($items[$i]->grupo);
                            $this->grupo->Attributes->RestoreFromArray($items[$i]->_grupoAttributes);
                            $this->grupo_Header->CCSEventResult = CCGetEvent($this->grupo_Header->CCSEvents, "BeforeShow", $this->grupo_Header);
                            if ($this->grupo_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section grupo_Header";
                                $this->Attributes->Show();
                                $this->grupo->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section grupo_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->grupo_Footer->CCSEventResult = CCGetEvent($this->grupo_Footer->CCSEvents, "BeforeShow", $this->grupo_Footer);
                            if ($this->grupo_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section grupo_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section grupo_Footer", true, "Section Detail");
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

} //End ReportesMyM Class @5-FCB6E20C

class clsReportesMyMDataSource extends clsDBcnDisenio {  //ReportesMyMDataSource Class @5-E64C1439

//DataSource Variables @5-DE2292CF
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $wp;


    // Datasource fields
    public $grupo;
    public $Nombre;
    public $Hidden1;
//End DataSource Variables

//DataSourceClass_Initialize Event @5-5BCE2512
    function clsReportesMyMDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report ReportesMyM";
        $this->Initialize();
        $this->grupo = new clsField("grupo", ccsText, "");
        
        $this->Nombre = new clsField("Nombre", ccsText, "");
        
        $this->Hidden1 = new clsField("Hidden1", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @5-A5AC057F
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "Nombre";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @5-7797F16C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sesGrupoValoracion", ccsText, "", "", $this->Parameters["sesGrupoValoracion"], "", false);
    }
//End Prepare Method

//Open Method @5-FF51EB96
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n" .
        "FROM ReportesMyM \n" .
        "where (grupo <> 'SLAs' or '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'  ='SLAs')\n" .
        "	and activo=1 {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "ReportesMyM.Grupo asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @5-11937448
    function SetValues()
    {
        $this->grupo->SetDBValue($this->f("Grupo"));
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->Hidden1->SetDBValue(trim($this->f("IdReporte")));
    }
//End SetValues Method

} //End ReportesMyMDataSource Class @5-FCB6E20C

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

//Initialize Objects @1-2834C2F8
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
$ReportesMyM = new clsReportReportesMyM("", $MainPage);
$ImageLink2 = new clsControl(ccsImageLink, "ImageLink2", "ImageLink2", ccsText, "", CCGetRequestParam("ImageLink2", ccsGet, NULL), $MainPage);
$ImageLink2->Page = "MuestraReporte.php";
$MainPage->Header = & $Header;
$MainPage->lReportContent = & $lReportContent;
$MainPage->ReportesMyM = & $ReportesMyM;
$MainPage->ImageLink2 = & $ImageLink2;
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
