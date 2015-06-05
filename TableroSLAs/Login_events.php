<?php
//BindEvents Method @1-DA3936AB
function BindEvents()
{
    global $Login1;
    global $CCSEvents;
    $Login1->Button_DoLogin->CCSEvents["OnClick"] = "Login1_Button_DoLogin_OnClick";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Login1_Button_DoLogin_OnClick @3-E337B8B9
function Login1_Button_DoLogin_OnClick(& $sender)
{
    $Login1_Button_DoLogin_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Login1; //Compatibility
//End Login1_Button_DoLogin_OnClick

//Login @6-8D8664A8
    global $CCSLocales;
    global $Redirect;

    if ( !CCLoginUser( $Container->login->Value, $Container->password->Value)) {
        $Container->Errors->addError($CCSLocales->GetText("CCS_LoginError"));
        $Container->password->SetValue("");
        $Login1_Button_DoLogin_OnClick = 0;
    } else {
        global $Redirect;
        global $PathToRoot;
        $Redirect = $PathToRoot . "Index.php";
        $Login1_Button_DoLogin_OnClick = 1;
        
        // obtiene el grupo del usuario
        $db = new  clsDBcnDisenio();
        $sGrupoValoracion = CCDLookUp("Grupo","mc_c_usuarios","id= " . CCGetUserID() , $db);
		CCSetSession("GrupoValoracion",$sGrupoValoracion); 
		$sCDSPreferido  = CCDLookUp("CDSDefault","mc_c_usuarios","id= " . CCGetUserID() , $db);
		CCSetSession("CDSPreferido",$sCDSPreferido); 
		$db->close();
		
		// dependiendo del grupo lo manda a la página que le interesa
		if($sGrupoValoracion == 'MyM'){
			$Redirect = $PathToRoot . "MuestraReporte.php?frame=2";
		} else {
			if($sGrupoValoracion == 'SLAs'){
				$Redirect = $PathToRoot . "MuestraReporte.php?frame=2";
			} else {
				if($sGrupoValoracion == 'SAT'){
					$Redirect = $PathToRoot . "TableroSLAs.php";
				} else {
					$Redirect = $PathToRoot . "Index.php";
				}
			}
		}
		
    }
//End Login

//Close Login1_Button_DoLogin_OnClick @3-53D741FA
    return $Login1_Button_DoLogin_OnClick;
}
//End Close Login1_Button_DoLogin_OnClick

//Page_BeforeShow @1-3C919380
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Login; //Compatibility
//End Page_BeforeShow

//Custom Code @9-2A29BDB7
// -------------------------
    
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
