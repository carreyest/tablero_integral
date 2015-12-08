<?php
//BindEvents Method @1-E169E7F6
function BindEvents()
{
    global $mc_c_usuarios;
    $mc_c_usuarios->Clave->CCSEvents["OnValidate"] = "mc_c_usuarios_Clave_OnValidate";
    $mc_c_usuarios->CCSEvents["BeforeShow"] = "mc_c_usuarios_BeforeShow";
    $mc_c_usuarios->ds->CCSEvents["BeforeBuildUpdate"] = "mc_c_usuarios_ds_BeforeBuildUpdate";
    $mc_c_usuarios->CCSEvents["OnValidate"] = "mc_c_usuarios_OnValidate";
}
//End BindEvents Method

//mc_c_usuarios_Clave_OnValidate @9-1CDA9534
function mc_c_usuarios_Clave_OnValidate(& $sender)
{
    $mc_c_usuarios_Clave_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_usuarios; //Compatibility
//End mc_c_usuarios_Clave_OnValidate

//Reset Password Validation @10-D640AC00
    if ($Container->EditMode && ($Container->Clave->GetValue() == "")) {
        $Component->Errors->Clear();
    }
//End Reset Password Validation

//Close mc_c_usuarios_Clave_OnValidate @9-E27589E3
    return $mc_c_usuarios_Clave_OnValidate;
}
//End Close mc_c_usuarios_Clave_OnValidate

//mc_c_usuarios_BeforeShow @3-981A5E6E
function mc_c_usuarios_BeforeShow(& $sender)
{
    $mc_c_usuarios_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_usuarios; //Compatibility
//End mc_c_usuarios_BeforeShow

//Preserve Password @5-E31995B4
    if (!$Component->FormSubmitted) {
        $Component->Clave_Shadow->SetValue(CCEncryptString($Component->Clave->GetValue(), CCS_ENCRYPTION_KEY_FOR_COOKIE));
        $Component->Clave->SetValue("");
    }
//End Preserve Password

//Custom Code @22-2A29BDB7
// -------------------------
    $Component->PwdSharePoint->SetValue("");
    $Component->UsrSharePoint->SetValue("");
// -------------------------
//End Custom Code

//Close mc_c_usuarios_BeforeShow @3-31769AD9
    return $mc_c_usuarios_BeforeShow;
}
//End Close mc_c_usuarios_BeforeShow

//mc_c_usuarios_ds_BeforeBuildUpdate @3-42130AD4
function mc_c_usuarios_ds_BeforeBuildUpdate(& $sender)
{
    $mc_c_usuarios_ds_BeforeBuildUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_usuarios; //Compatibility
//End mc_c_usuarios_ds_BeforeBuildUpdate

//Encrypt Password @7-00CE0602
    if ("" != $Component->DataSource->Clave->GetValue()) {
        $Component->DataSource->Clave->SetValue(CCEncryptPasswordDB($Component->DataSource->Clave->GetValue()));
    } else {
        $Component->DataSource->Clave->SetValue(CCDecryptString($Component->DataSource->Clave_Shadow->GetValue(), CCS_ENCRYPTION_KEY_FOR_COOKIE));
    }
//End Encrypt Password

//Close mc_c_usuarios_ds_BeforeBuildUpdate @3-7D56E561
    return $mc_c_usuarios_ds_BeforeBuildUpdate;
}
//End Close mc_c_usuarios_ds_BeforeBuildUpdate

//mc_c_usuarios_OnValidate @3-7319170B
function mc_c_usuarios_OnValidate(& $sender)
{
    $mc_c_usuarios_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $mc_c_usuarios; //Compatibility
//End mc_c_usuarios_OnValidate

//Custom Code @17-2A29BDB7
// -------------------------
    global $db;
    $db= new clsDBcnDisenio;
    if ($mc_c_usuarios->NewPwd->GetValue() != $mc_c_usuarios->ConfirmNewPwd->GetValue()){
		$mc_c_usuarios->Errors->addError("Error:La contraseña nueva y la confirmación no coinciden");
	}
	else{
		if (md5($mc_c_usuarios->Clave->GetValue()) != strtolower(CCDLookUp("clave","mc_c_usuarios","usuario='".CCGetUserLogin()."'",$db))){
			$mc_c_usuarios->Errors->addError("Error:La contraseña actual no coincide con la registrada");
		} else {
			$mc_c_usuarios->Clave->SetValue($mc_c_usuarios->NewPwd->GetValue());
		}
	}
// -------------------------
//End Custom Code

//Close mc_c_usuarios_OnValidate @3-0E8DFE50
    return $mc_c_usuarios_OnValidate;
}
//End Close mc_c_usuarios_OnValidate


?>
