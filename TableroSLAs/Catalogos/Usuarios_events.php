<?php
//BindEvents Method @1-0FAE5CE7
function BindEvents()
{
    global $mc_c_usuarios;
    global $mc_c_usuarios1;
    global $usuario_reporteMyM;
    global $CCSEvents;
    $mc_c_usuarios->mc_c_usuarios_TotalRecords->CCSEvents["BeforeShow"] = "mc_c_usuarios_mc_c_usuarios_TotalRecords_BeforeShow";
    $mc_c_usuarios1->Clave->CCSEvents["OnValidate"] = "mc_c_usuarios1_Clave_OnValidate";
    $mc_c_usuarios1->CCSEvents["BeforeShow"] = "mc_c_usuarios1_BeforeShow";
    $mc_c_usuarios1->ds->CCSEvents["BeforeBuildInsert"] = "mc_c_usuarios1_ds_BeforeBuildInsert";
    $mc_c_usuarios1->ds->CCSEvents["BeforeBuildUpdate"] = "mc_c_usuarios1_ds_BeforeBuildUpdate";
    $mc_c_usuarios1->ds->CCSEvents["AfterExecuteInsert"] = "mc_c_usuarios1_ds_AfterExecuteInsert";
    $usuario_reporteMyM->CCSEvents["BeforeShow"] = "usuario_reporteMyM_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//mc_c_usuarios_mc_c_usuarios_TotalRecords_BeforeShow @7-6BA8FF6B
function mc_c_usuarios_mc_c_usuarios_TotalRecords_BeforeShow(& $sender)
{
    $mc_c_usuarios_mc_c_usuarios_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_usuarios; //Compatibility
//End mc_c_usuarios_mc_c_usuarios_TotalRecords_BeforeShow

//Retrieve number of records @8-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close mc_c_usuarios_mc_c_usuarios_TotalRecords_BeforeShow @7-DACBD85F
    return $mc_c_usuarios_mc_c_usuarios_TotalRecords_BeforeShow;
}
//End Close mc_c_usuarios_mc_c_usuarios_TotalRecords_BeforeShow

//mc_c_usuarios1_Clave_OnValidate @37-5E7248B5
function mc_c_usuarios1_Clave_OnValidate(& $sender)
{
    $mc_c_usuarios1_Clave_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_usuarios1; //Compatibility
//End mc_c_usuarios1_Clave_OnValidate

//Reset Password Validation @38-D640AC00
    if ($Container->EditMode && ($Container->Clave->GetValue() == "")) {
        $Component->Errors->Clear();
    }
//End Reset Password Validation

//Close mc_c_usuarios1_Clave_OnValidate @37-A9837ECC
    return $mc_c_usuarios1_Clave_OnValidate;
}
//End Close mc_c_usuarios1_Clave_OnValidate

//mc_c_usuarios1_BeforeShow @28-04D2D580
function mc_c_usuarios1_BeforeShow(& $sender)
{
    $mc_c_usuarios1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_usuarios1; //Compatibility
//End mc_c_usuarios1_BeforeShow

//Preserve Password @30-E31995B4
    if (!$Component->FormSubmitted) {
        $Component->Clave_Shadow->SetValue(CCEncryptString($Component->Clave->GetValue(), CCS_ENCRYPTION_KEY_FOR_COOKIE));
        $Component->Clave->SetValue("");
    }
//End Preserve Password

//Custom Code @75-2A29BDB7
// -------------------------
    //si el usuario es supervisor solo puede crear usuarios por debajo de ese nivel y del mismo grupo que el
    if(CCGetGroupID()<5){
    	$Component->Nivel->Values = array(array("1", "Visitante"), array("2", "Capturista"), array("3", "Analista"), array("4", "Supervisor"));
    	$Component->Grupo->Values= array(array(CCGetSession("GrupoValoracion"), CCGetSession("GrupoValoracion")));
    	}
// -------------------------
//End Custom Code

//Close mc_c_usuarios1_BeforeShow @28-C86A5802
    return $mc_c_usuarios1_BeforeShow;
}
//End Close mc_c_usuarios1_BeforeShow

//mc_c_usuarios1_ds_BeforeBuildInsert @28-035B41FF
function mc_c_usuarios1_ds_BeforeBuildInsert(& $sender)
{
    $mc_c_usuarios1_ds_BeforeBuildInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_usuarios1; //Compatibility
//End mc_c_usuarios1_ds_BeforeBuildInsert

//Encrypt Password @32-E8C91460
    $Component->DataSource->Clave->SetValue(CCEncryptPasswordDB($Component->DataSource->Clave->GetValue()));
//End Encrypt Password

//Close mc_c_usuarios1_ds_BeforeBuildInsert @28-594D20F0
    return $mc_c_usuarios1_ds_BeforeBuildInsert;
}
//End Close mc_c_usuarios1_ds_BeforeBuildInsert

//mc_c_usuarios1_ds_BeforeBuildUpdate @28-BC6D470E
function mc_c_usuarios1_ds_BeforeBuildUpdate(& $sender)
{
    $mc_c_usuarios1_ds_BeforeBuildUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_usuarios1; //Compatibility
//End mc_c_usuarios1_ds_BeforeBuildUpdate

//Encrypt Password @34-00CE0602
    if ("" != $Component->DataSource->Clave->GetValue()) {
        $Component->DataSource->Clave->SetValue(CCEncryptPasswordDB($Component->DataSource->Clave->GetValue()));
    } else {
        $Component->DataSource->Clave->SetValue(CCDecryptString($Component->DataSource->Clave_Shadow->GetValue(), CCS_ENCRYPTION_KEY_FOR_COOKIE));
    }
//End Encrypt Password

//Close mc_c_usuarios1_ds_BeforeBuildUpdate @28-9664E17F
    return $mc_c_usuarios1_ds_BeforeBuildUpdate;
}
//End Close mc_c_usuarios1_ds_BeforeBuildUpdate

//mc_c_usuarios1_ds_AfterExecuteInsert @28-FF558EF0
function mc_c_usuarios1_ds_AfterExecuteInsert(& $sender)
{
    $mc_c_usuarios1_ds_AfterExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_usuarios1; //Compatibility
//End mc_c_usuarios1_ds_AfterExecuteInsert

//Custom Code @112-2A29BDB7
// -------------------------
    // Write your own code here.
    global $DBcnDisenio;

	$DBcnDisenio->query("select id, Nombre, usuario from mc_c_usuarios where id = (select MAX(id) from mc_c_usuarios)" );
	if($DBcnDisenio->next_record()){
		$sInsert="insert into usuario_reporteMyM(id_usuario, id_reporte, activo, nombre_reporte,usuario) select ".$DBcnDisenio->f("id").", IdReporte, 1, nombre,'".$DBcnDisenio->f("usuario")."' from ReportesMyM";	
	}
	$DBcnDisenio->query($sInsert);
// -------------------------
//End Custom Code

//Close mc_c_usuarios1_ds_AfterExecuteInsert @28-6749DB7D
    return $mc_c_usuarios1_ds_AfterExecuteInsert;
}
//End Close mc_c_usuarios1_ds_AfterExecuteInsert

//usuario_reporteMyM_BeforeShow @96-C5D084F4
function usuario_reporteMyM_BeforeShow(& $sender)
{
    $usuario_reporteMyM_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $usuario_reporteMyM; //Compatibility
    global $Panel1;
    global $NewRecord1;
//End usuario_reporteMyM_BeforeShow

//Custom Code @111-2A29BDB7
// -------------------------
    // Write your own code here.

	if (CCGetParam("Id") == '')
	{

    	$usuario_reporteMyM->Visible = False;
    	$Panel1->Visible = False;
    	$NewRecord1->Visible = False;
	}

// -------------------------
//End Custom Code

//Close usuario_reporteMyM_BeforeShow @96-2EE33B48
    return $usuario_reporteMyM_BeforeShow;
}
//End Close usuario_reporteMyM_BeforeShow

//Page_BeforeShow @1-9731030E
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Usuarios; //Compatibility
//End Page_BeforeShow

//Custom Code @77-2A29BDB7
// -------------------------
	global $mc_c_usuariosSearch;
     if(CCGetGroupID()<5){
    	$mc_c_usuariosSearch->s_Grupo->Values= array(array(CCGetSession("GrupoValoracion"), CCGetSession("GrupoValoracion")));
    	}

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
