<?php
//Include Common Files @1-1A083D48
define("RelativePath", "..");
define("PathToCurrentPage", "/ConfigDeCargas/");
define("FileName", "ProcesoCargaAMaint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordproceso_carga_archivos { //proceso_carga_archivos Class @2-B88AA56C

//Variables @2-9E315808

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

//Class_Initialize Event @2-4A53EE0F
    function clsRecordproceso_carga_archivos($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record proceso_carga_archivos/Error";
        $this->DataSource = new clsproceso_carga_archivosDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "proceso_carga_archivos";
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
            $this->descripcion = new clsControl(ccsTextBox, "descripcion", "Descripcion", ccsText, "", CCGetRequestParam("descripcion", $Method, NULL), $this);
            $this->mascara_archivo = new clsControl(ccsTextBox, "mascara_archivo", "Mascara Archivo", ccsText, "", CCGetRequestParam("mascara_archivo", $Method, NULL), $this);
            $this->mascara_archivo->Required = true;
            $this->formato_archivo = new clsControl(ccsListBox, "formato_archivo", "Formato Archivo", ccsText, "", CCGetRequestParam("formato_archivo", $Method, NULL), $this);
            $this->formato_archivo->DSType = dsListOfValues;
            $this->formato_archivo->Values = array(array("xlsx", "xlsx"), array("xls", "xls"));
            $this->formato_archivo->Required = true;
            $this->repositorio = new clsControl(ccsTextBox, "repositorio", "Repositorio", ccsText, "", CCGetRequestParam("repositorio", $Method, NULL), $this);
            $this->repositorio->Required = true;
            $this->mails_responsables = new clsControl(ccsTextBox, "mails_responsables", "Mails Responsables", ccsText, "", CCGetRequestParam("mails_responsables", $Method, NULL), $this);
            $this->mails_responsables->Required = true;
            $this->tabla_destino = new clsControl(ccsTextBox, "tabla_destino", "Tabla Destino", ccsText, "", CCGetRequestParam("tabla_destino", $Method, NULL), $this);
            $this->tabla_destino->Required = true;
            $this->procedimiento_extra = new clsControl(ccsTextBox, "procedimiento_extra", "Procedimiento Extra", ccsText, "", CCGetRequestParam("procedimiento_extra", $Method, NULL), $this);
            $this->numero_hoja_excel = new clsControl(ccsTextBox, "numero_hoja_excel", "Numero Hoja Excel", ccsInteger, "", CCGetRequestParam("numero_hoja_excel", $Method, NULL), $this);
            $this->numero_hoja_excel->Required = true;
            $this->filas_sin_datos_excel = new clsControl(ccsTextBox, "filas_sin_datos_excel", "Filas Sin Datos Excel", ccsInteger, "", CCGetRequestParam("filas_sin_datos_excel", $Method, NULL), $this);
            $this->filas_sin_datos_excel->Required = true;
            $this->campo_fecha_cierre = new clsControl(ccsTextBox, "campo_fecha_cierre", "Campo Fecha Cierre", ccsText, "", CCGetRequestParam("campo_fecha_cierre", $Method, NULL), $this);
            $this->campo_indice = new clsControl(ccsTextBox, "campo_indice", "Campo Indice", ccsText, "", CCGetRequestParam("campo_indice", $Method, NULL), $this);
            $this->campo_indice_identity = new clsControl(ccsCheckBox, "campo_indice_identity", "campo_indice_identity", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("campo_indice_identity", $Method, NULL), $this);
            $this->campo_indice_identity->CheckedValue = true;
            $this->campo_indice_identity->UncheckedValue = false;
            $this->periodicidad = new clsControl(ccsListBox, "periodicidad", "Periodicidad", ccsText, "", CCGetRequestParam("periodicidad", $Method, NULL), $this);
            $this->periodicidad->DSType = dsListOfValues;
            $this->periodicidad->Values = array(array("semanal", "semanal"), array("quincenal", "quincenal"), array("mensual_fin", "Fin de mes"), array("mensual_inicio", "Inicio de mes"));
            $this->cve_carga = new clsControl(ccsTextBox, "cve_carga", "cve_carga", ccsText, "", CCGetRequestParam("cve_carga", $Method, NULL), $this);
            $this->db_destino = new clsControl(ccsListBox, "db_destino", "db_destino", ccsText, "", CCGetRequestParam("db_destino", $Method, NULL), $this);
            $this->db_destino->DSType = dsListOfValues;
            $this->db_destino->Values = array(array("Reportes_ACDMA", "Reportes_ACDMA"), array("TableroMyM_SDMA4", "TableroMyM_SDMA4"), array("archivosxls", "archivosxls"), array("MesaControl_Prod", "MesaControl_Prod"), array("MesaControlHistorico_Desa", "MesaControlHistorico_Desa"), array("replica_mcam", "replica_mcam"), array("replica_mcam_temp", "replica_mcam_temp"), array("replica_mcam_v2", "replica_mcam_v2"), array("Tablero_MesaControl_Pruebas", "Tablero_MesaControl_Pruebas"));
            $this->db_destino->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->campo_indice_identity->Value) && !strlen($this->campo_indice_identity->Value) && $this->campo_indice_identity->Value !== false)
                    $this->campo_indice_identity->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @2-3BED5A6D
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlcve_carga"] = CCGetFromGet("cve_carga", NULL);
    }
//End Initialize Method

//Validate Method @2-1160C38D
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->descripcion->Validate() && $Validation);
        $Validation = ($this->mascara_archivo->Validate() && $Validation);
        $Validation = ($this->formato_archivo->Validate() && $Validation);
        $Validation = ($this->repositorio->Validate() && $Validation);
        $Validation = ($this->mails_responsables->Validate() && $Validation);
        $Validation = ($this->tabla_destino->Validate() && $Validation);
        $Validation = ($this->procedimiento_extra->Validate() && $Validation);
        $Validation = ($this->numero_hoja_excel->Validate() && $Validation);
        $Validation = ($this->filas_sin_datos_excel->Validate() && $Validation);
        $Validation = ($this->campo_fecha_cierre->Validate() && $Validation);
        $Validation = ($this->campo_indice->Validate() && $Validation);
        $Validation = ($this->campo_indice_identity->Validate() && $Validation);
        $Validation = ($this->periodicidad->Validate() && $Validation);
        $Validation = ($this->cve_carga->Validate() && $Validation);
        $Validation = ($this->db_destino->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->descripcion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->mascara_archivo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->formato_archivo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->repositorio->Errors->Count() == 0);
        $Validation =  $Validation && ($this->mails_responsables->Errors->Count() == 0);
        $Validation =  $Validation && ($this->tabla_destino->Errors->Count() == 0);
        $Validation =  $Validation && ($this->procedimiento_extra->Errors->Count() == 0);
        $Validation =  $Validation && ($this->numero_hoja_excel->Errors->Count() == 0);
        $Validation =  $Validation && ($this->filas_sin_datos_excel->Errors->Count() == 0);
        $Validation =  $Validation && ($this->campo_fecha_cierre->Errors->Count() == 0);
        $Validation =  $Validation && ($this->campo_indice->Errors->Count() == 0);
        $Validation =  $Validation && ($this->campo_indice_identity->Errors->Count() == 0);
        $Validation =  $Validation && ($this->periodicidad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->cve_carga->Errors->Count() == 0);
        $Validation =  $Validation && ($this->db_destino->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-8A12FE3F
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->descripcion->Errors->Count());
        $errors = ($errors || $this->mascara_archivo->Errors->Count());
        $errors = ($errors || $this->formato_archivo->Errors->Count());
        $errors = ($errors || $this->repositorio->Errors->Count());
        $errors = ($errors || $this->mails_responsables->Errors->Count());
        $errors = ($errors || $this->tabla_destino->Errors->Count());
        $errors = ($errors || $this->procedimiento_extra->Errors->Count());
        $errors = ($errors || $this->numero_hoja_excel->Errors->Count());
        $errors = ($errors || $this->filas_sin_datos_excel->Errors->Count());
        $errors = ($errors || $this->campo_fecha_cierre->Errors->Count());
        $errors = ($errors || $this->campo_indice->Errors->Count());
        $errors = ($errors || $this->campo_indice_identity->Errors->Count());
        $errors = ($errors || $this->periodicidad->Errors->Count());
        $errors = ($errors || $this->cve_carga->Errors->Count());
        $errors = ($errors || $this->db_destino->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-54C81064
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
            }
        }
        $Redirect = "ProcesoCargaAList.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
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

//InsertRow Method @2-229B4BB6
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->descripcion->SetValue($this->descripcion->GetValue(true));
        $this->DataSource->mascara_archivo->SetValue($this->mascara_archivo->GetValue(true));
        $this->DataSource->formato_archivo->SetValue($this->formato_archivo->GetValue(true));
        $this->DataSource->repositorio->SetValue($this->repositorio->GetValue(true));
        $this->DataSource->mails_responsables->SetValue($this->mails_responsables->GetValue(true));
        $this->DataSource->tabla_destino->SetValue($this->tabla_destino->GetValue(true));
        $this->DataSource->procedimiento_extra->SetValue($this->procedimiento_extra->GetValue(true));
        $this->DataSource->numero_hoja_excel->SetValue($this->numero_hoja_excel->GetValue(true));
        $this->DataSource->filas_sin_datos_excel->SetValue($this->filas_sin_datos_excel->GetValue(true));
        $this->DataSource->campo_fecha_cierre->SetValue($this->campo_fecha_cierre->GetValue(true));
        $this->DataSource->campo_indice->SetValue($this->campo_indice->GetValue(true));
        $this->DataSource->campo_indice_identity->SetValue($this->campo_indice_identity->GetValue(true));
        $this->DataSource->periodicidad->SetValue($this->periodicidad->GetValue(true));
        $this->DataSource->cve_carga->SetValue($this->cve_carga->GetValue(true));
        $this->DataSource->db_destino->SetValue($this->db_destino->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-873C1E49
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->descripcion->SetValue($this->descripcion->GetValue(true));
        $this->DataSource->mascara_archivo->SetValue($this->mascara_archivo->GetValue(true));
        $this->DataSource->formato_archivo->SetValue($this->formato_archivo->GetValue(true));
        $this->DataSource->repositorio->SetValue($this->repositorio->GetValue(true));
        $this->DataSource->mails_responsables->SetValue($this->mails_responsables->GetValue(true));
        $this->DataSource->tabla_destino->SetValue($this->tabla_destino->GetValue(true));
        $this->DataSource->procedimiento_extra->SetValue($this->procedimiento_extra->GetValue(true));
        $this->DataSource->numero_hoja_excel->SetValue($this->numero_hoja_excel->GetValue(true));
        $this->DataSource->filas_sin_datos_excel->SetValue($this->filas_sin_datos_excel->GetValue(true));
        $this->DataSource->campo_fecha_cierre->SetValue($this->campo_fecha_cierre->GetValue(true));
        $this->DataSource->campo_indice->SetValue($this->campo_indice->GetValue(true));
        $this->DataSource->campo_indice_identity->SetValue($this->campo_indice_identity->GetValue(true));
        $this->DataSource->periodicidad->SetValue($this->periodicidad->GetValue(true));
        $this->DataSource->cve_carga->SetValue($this->cve_carga->GetValue(true));
        $this->DataSource->db_destino->SetValue($this->db_destino->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @2-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @2-7B0C5C1C
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

        $this->formato_archivo->Prepare();
        $this->periodicidad->Prepare();
        $this->db_destino->Prepare();

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
                if(!$this->FormSubmitted){
                    $this->descripcion->SetValue($this->DataSource->descripcion->GetValue());
                    $this->mascara_archivo->SetValue($this->DataSource->mascara_archivo->GetValue());
                    $this->formato_archivo->SetValue($this->DataSource->formato_archivo->GetValue());
                    $this->repositorio->SetValue($this->DataSource->repositorio->GetValue());
                    $this->mails_responsables->SetValue($this->DataSource->mails_responsables->GetValue());
                    $this->tabla_destino->SetValue($this->DataSource->tabla_destino->GetValue());
                    $this->procedimiento_extra->SetValue($this->DataSource->procedimiento_extra->GetValue());
                    $this->numero_hoja_excel->SetValue($this->DataSource->numero_hoja_excel->GetValue());
                    $this->filas_sin_datos_excel->SetValue($this->DataSource->filas_sin_datos_excel->GetValue());
                    $this->campo_fecha_cierre->SetValue($this->DataSource->campo_fecha_cierre->GetValue());
                    $this->campo_indice->SetValue($this->DataSource->campo_indice->GetValue());
                    $this->campo_indice_identity->SetValue($this->DataSource->campo_indice_identity->GetValue());
                    $this->periodicidad->SetValue($this->DataSource->periodicidad->GetValue());
                    $this->cve_carga->SetValue($this->DataSource->cve_carga->GetValue());
                    $this->db_destino->SetValue($this->DataSource->db_destino->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->descripcion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mascara_archivo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->formato_archivo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->repositorio->Errors->ToString());
            $Error = ComposeStrings($Error, $this->mails_responsables->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tabla_destino->Errors->ToString());
            $Error = ComposeStrings($Error, $this->procedimiento_extra->Errors->ToString());
            $Error = ComposeStrings($Error, $this->numero_hoja_excel->Errors->ToString());
            $Error = ComposeStrings($Error, $this->filas_sin_datos_excel->Errors->ToString());
            $Error = ComposeStrings($Error, $this->campo_fecha_cierre->Errors->ToString());
            $Error = ComposeStrings($Error, $this->campo_indice->Errors->ToString());
            $Error = ComposeStrings($Error, $this->campo_indice_identity->Errors->ToString());
            $Error = ComposeStrings($Error, $this->periodicidad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->cve_carga->Errors->ToString());
            $Error = ComposeStrings($Error, $this->db_destino->Errors->ToString());
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
        $this->descripcion->Show();
        $this->mascara_archivo->Show();
        $this->formato_archivo->Show();
        $this->repositorio->Show();
        $this->mails_responsables->Show();
        $this->tabla_destino->Show();
        $this->procedimiento_extra->Show();
        $this->numero_hoja_excel->Show();
        $this->filas_sin_datos_excel->Show();
        $this->campo_fecha_cierre->Show();
        $this->campo_indice->Show();
        $this->campo_indice_identity->Show();
        $this->periodicidad->Show();
        $this->cve_carga->Show();
        $this->db_destino->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End proceso_carga_archivos Class @2-FCB6E20C

class clsproceso_carga_archivosDataSource extends clsDBConnCarga {  //proceso_carga_archivosDataSource Class @2-C2127757

//DataSource Variables @2-D1F6A3BB
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
    public $descripcion;
    public $mascara_archivo;
    public $formato_archivo;
    public $repositorio;
    public $mails_responsables;
    public $tabla_destino;
    public $procedimiento_extra;
    public $numero_hoja_excel;
    public $filas_sin_datos_excel;
    public $campo_fecha_cierre;
    public $campo_indice;
    public $campo_indice_identity;
    public $periodicidad;
    public $cve_carga;
    public $db_destino;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-4541BF83
    function clsproceso_carga_archivosDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record proceso_carga_archivos/Error";
        $this->Initialize();
        $this->descripcion = new clsField("descripcion", ccsText, "");
        
        $this->mascara_archivo = new clsField("mascara_archivo", ccsText, "");
        
        $this->formato_archivo = new clsField("formato_archivo", ccsText, "");
        
        $this->repositorio = new clsField("repositorio", ccsText, "");
        
        $this->mails_responsables = new clsField("mails_responsables", ccsText, "");
        
        $this->tabla_destino = new clsField("tabla_destino", ccsText, "");
        
        $this->procedimiento_extra = new clsField("procedimiento_extra", ccsText, "");
        
        $this->numero_hoja_excel = new clsField("numero_hoja_excel", ccsInteger, "");
        
        $this->filas_sin_datos_excel = new clsField("filas_sin_datos_excel", ccsInteger, "");
        
        $this->campo_fecha_cierre = new clsField("campo_fecha_cierre", ccsText, "");
        
        $this->campo_indice = new clsField("campo_indice", ccsText, "");
        
        $this->campo_indice_identity = new clsField("campo_indice_identity", ccsBoolean, $this->BooleanFormat);
        
        $this->periodicidad = new clsField("periodicidad", ccsText, "");
        
        $this->cve_carga = new clsField("cve_carga", ccsText, "");
        
        $this->db_destino = new clsField("db_destino", ccsText, "");
        

        $this->InsertFields["descripcion"] = array("Name" => "descripcion", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["mascara_archivo"] = array("Name" => "mascara_archivo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["formato_archivo"] = array("Name" => "formato_archivo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["repositorio"] = array("Name" => "repositorio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["mails_responsables"] = array("Name" => "mails_responsables", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["tabla_destino"] = array("Name" => "tabla_destino", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["procedimiento_extra"] = array("Name" => "procedimiento_extra", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["numero_hoja_excel"] = array("Name" => "numero_hoja_excel", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["filas_sin_datos_excel"] = array("Name" => "filas_sin_datos_excel", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["campo_fecha_cierre"] = array("Name" => "campo_fecha_cierre", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["campo_indice"] = array("Name" => "campo_indice", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["campo_indice_identity"] = array("Name" => "campo_indice_identity", "Value" => "", "DataType" => ccsBoolean);
        $this->InsertFields["periodicidad"] = array("Name" => "periodicidad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["cve_carga"] = array("Name" => "cve_carga", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["db_destino"] = array("Name" => "db_destino", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["descripcion"] = array("Name" => "descripcion", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["mascara_archivo"] = array("Name" => "mascara_archivo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["formato_archivo"] = array("Name" => "formato_archivo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["repositorio"] = array("Name" => "repositorio", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["mails_responsables"] = array("Name" => "mails_responsables", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["tabla_destino"] = array("Name" => "tabla_destino", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["procedimiento_extra"] = array("Name" => "procedimiento_extra", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["numero_hoja_excel"] = array("Name" => "numero_hoja_excel", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["filas_sin_datos_excel"] = array("Name" => "filas_sin_datos_excel", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["campo_fecha_cierre"] = array("Name" => "campo_fecha_cierre", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["campo_indice"] = array("Name" => "campo_indice", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["campo_indice_identity"] = array("Name" => "campo_indice_identity", "Value" => "", "DataType" => ccsBoolean);
        $this->UpdateFields["periodicidad"] = array("Name" => "periodicidad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["cve_carga"] = array("Name" => "cve_carga", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["db_destino"] = array("Name" => "db_destino", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-81CF2B83
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlcve_carga", ccsText, "", "", $this->Parameters["urlcve_carga"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "cve_carga", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-55ACC09A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM proceso_carga_archivos {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-43643606
    function SetValues()
    {
        $this->descripcion->SetDBValue($this->f("descripcion"));
        $this->mascara_archivo->SetDBValue($this->f("mascara_archivo"));
        $this->formato_archivo->SetDBValue($this->f("formato_archivo"));
        $this->repositorio->SetDBValue($this->f("repositorio"));
        $this->mails_responsables->SetDBValue($this->f("mails_responsables"));
        $this->tabla_destino->SetDBValue($this->f("tabla_destino"));
        $this->procedimiento_extra->SetDBValue($this->f("procedimiento_extra"));
        $this->numero_hoja_excel->SetDBValue(trim($this->f("numero_hoja_excel")));
        $this->filas_sin_datos_excel->SetDBValue(trim($this->f("filas_sin_datos_excel")));
        $this->campo_fecha_cierre->SetDBValue($this->f("campo_fecha_cierre"));
        $this->campo_indice->SetDBValue($this->f("campo_indice"));
        $this->campo_indice_identity->SetDBValue(trim($this->f("campo_indice_identity")));
        $this->periodicidad->SetDBValue($this->f("periodicidad"));
        $this->cve_carga->SetDBValue($this->f("cve_carga"));
        $this->db_destino->SetDBValue($this->f("db_destino"));
    }
//End SetValues Method

//Insert Method @2-7EACC3CA
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["descripcion"]["Value"] = $this->descripcion->GetDBValue(true);
        $this->InsertFields["mascara_archivo"]["Value"] = $this->mascara_archivo->GetDBValue(true);
        $this->InsertFields["formato_archivo"]["Value"] = $this->formato_archivo->GetDBValue(true);
        $this->InsertFields["repositorio"]["Value"] = $this->repositorio->GetDBValue(true);
        $this->InsertFields["mails_responsables"]["Value"] = $this->mails_responsables->GetDBValue(true);
        $this->InsertFields["tabla_destino"]["Value"] = $this->tabla_destino->GetDBValue(true);
        $this->InsertFields["procedimiento_extra"]["Value"] = $this->procedimiento_extra->GetDBValue(true);
        $this->InsertFields["numero_hoja_excel"]["Value"] = $this->numero_hoja_excel->GetDBValue(true);
        $this->InsertFields["filas_sin_datos_excel"]["Value"] = $this->filas_sin_datos_excel->GetDBValue(true);
        $this->InsertFields["campo_fecha_cierre"]["Value"] = $this->campo_fecha_cierre->GetDBValue(true);
        $this->InsertFields["campo_indice"]["Value"] = $this->campo_indice->GetDBValue(true);
        $this->InsertFields["campo_indice_identity"]["Value"] = $this->campo_indice_identity->GetDBValue(true);
        $this->InsertFields["periodicidad"]["Value"] = $this->periodicidad->GetDBValue(true);
        $this->InsertFields["cve_carga"]["Value"] = $this->cve_carga->GetDBValue(true);
        $this->InsertFields["db_destino"]["Value"] = $this->db_destino->GetDBValue(true);
        $this->SQL = CCBuildInsert("proceso_carga_archivos", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-5966CBCC
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["descripcion"]["Value"] = $this->descripcion->GetDBValue(true);
        $this->UpdateFields["mascara_archivo"]["Value"] = $this->mascara_archivo->GetDBValue(true);
        $this->UpdateFields["formato_archivo"]["Value"] = $this->formato_archivo->GetDBValue(true);
        $this->UpdateFields["repositorio"]["Value"] = $this->repositorio->GetDBValue(true);
        $this->UpdateFields["mails_responsables"]["Value"] = $this->mails_responsables->GetDBValue(true);
        $this->UpdateFields["tabla_destino"]["Value"] = $this->tabla_destino->GetDBValue(true);
        $this->UpdateFields["procedimiento_extra"]["Value"] = $this->procedimiento_extra->GetDBValue(true);
        $this->UpdateFields["numero_hoja_excel"]["Value"] = $this->numero_hoja_excel->GetDBValue(true);
        $this->UpdateFields["filas_sin_datos_excel"]["Value"] = $this->filas_sin_datos_excel->GetDBValue(true);
        $this->UpdateFields["campo_fecha_cierre"]["Value"] = $this->campo_fecha_cierre->GetDBValue(true);
        $this->UpdateFields["campo_indice"]["Value"] = $this->campo_indice->GetDBValue(true);
        $this->UpdateFields["campo_indice_identity"]["Value"] = $this->campo_indice_identity->GetDBValue(true);
        $this->UpdateFields["periodicidad"]["Value"] = $this->periodicidad->GetDBValue(true);
        $this->UpdateFields["cve_carga"]["Value"] = $this->cve_carga->GetDBValue(true);
        $this->UpdateFields["db_destino"]["Value"] = $this->db_destino->GetDBValue(true);
        $this->SQL = CCBuildUpdate("proceso_carga_archivos", $this->UpdateFields, $this);
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

//Delete Method @2-C0DE5512
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM proceso_carga_archivos";
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

} //End proceso_carga_archivosDataSource Class @2-FCB6E20C

//Include Page implementation @22-3DD2EFDC
include_once(RelativePath . "/Header.php");
//End Include Page implementation

class clsMenuMenu1 extends clsMenu { //Menu1 class @31-FEAC4CDE

//Class_Initialize Event @31-391691DD
    function clsMenuMenu1($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Menu1";
        $this->Visible = True;
        $this->controls = array();
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->ErrorBlock = "Menu Menu1";

        $this->StaticItems = array();
        $this->StaticItems[] = array("item_id" => "MenuItem2", "item_id_parent" => null, "item_caption" => "Procesos de carga", "item_url" => array("Page" => "ProcesoCargaAList.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3", "item_id_parent" => null, "item_caption" => "Layouts de procesos de carga", "item_url" => array("Page" => "DetalleLayoutList.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem1", "item_id_parent" => null, "item_caption" => "Log ultimas cargas", "item_url" => array("Page" => "UltimasCargas.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem4", "item_id_parent" => null, "item_caption" => "Ejecutar Carga", "item_url" => array("Page" => "ExecCarga.php", "Parameters" => null), "item_target" => "_self", "item_title" => "");

        $this->DataSource = new clsMenu1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->DataSource->SetProvider(array("DBLib" => "Array"));

        parent::clsMenu("item_id_parent", "item_id", null);

        $this->ItemLink = new clsControl(ccsLink, "ItemLink", "ItemLink", ccsText, "", CCGetRequestParam("ItemLink", ccsGet, NULL), $this);
        $this->controls["ItemLink"] = & $this->ItemLink;
        $this->ItemLink->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ItemLink->Page = "";
        $this->LinkStartParameters = $this->ItemLink->Parameters;
    }
//End Class_Initialize Event

//SetControlValues Method @31-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @31-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End Menu1 Class @31-FCB6E20C

//Menu1DataSource Class @31-201CC8D7
class clsMenu1DataSource extends DB_Adapter {
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;
    var $wp;
    var $Record = array();
    var $Index;
    var $FieldsList = array();

    function clsMenu1DataSource($parent) {
        $this->Parent = & $parent;
        $this->ErrorBlock = "Menu Menu1";
        $this->ItemLink = new clsField("ItemLink", ccsText, "");
        $this->FieldsList["ItemLink"] = & $this->ItemLink;
    }

    function Prepare()
    {
    }

    function Open()
    {
        $this->query($this->Parent->StaticItems);
    }

    function SetValues()
    {
        $this->ItemLink->SetDBValue($this->f("item_caption"));
    }
}
//End Menu1DataSource Class

//Initialize Page @1-5ACA787A
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
$TemplateFileName = "ProcesoCargaAMaint.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/menu/ccs-menu.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-DC94A87D
CCSecurityRedirect("1", "");
//End Authenticate User

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-3DE68967
$DBConnCarga = new clsDBConnCarga();
$MainPage->Connections["ConnCarga"] = & $DBConnCarga;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$proceso_carga_archivos = new clsRecordproceso_carga_archivos("", $MainPage);
$Header = new clsHeader("../", "Header", $MainPage);
$Header->Initialize();
$Menu1 = new clsMenuMenu1("", $MainPage);
$MainPage->proceso_carga_archivos = & $proceso_carga_archivos;
$MainPage->Header = & $Header;
$MainPage->Menu1 = & $Menu1;
$proceso_carga_archivos->Initialize();
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-7D7DF5BA
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
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-A249AC58
$Header->Operations();
$proceso_carga_archivos->Operation();
//End Execute Components

//Go to destination page @1-DADB9B8F
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnCarga->close();
    header("Location: " . $Redirect);
    unset($proceso_carga_archivos);
    $Header->Class_Terminate();
    unset($Header);
    unset($Menu1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-436B1C7D
$proceso_carga_archivos->Show();
$Header->Show();
$Menu1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-91C3B985
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnCarga->close();
unset($proceso_carga_archivos);
$Header->Class_Terminate();
unset($Header);
unset($Menu1);
unset($Tpl);
//End Unload Page


?>
