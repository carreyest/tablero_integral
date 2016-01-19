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
		CCSetSession("capc_cds","CAPC"); 
		$sCDSPreferido  = CCDLookUp("CDSDefault","mc_c_usuarios","id= " . CCGetUserID() , $db);
		CCSetSession("CDSPreferido",$sCDSPreferido); 
        $sAdministracion = CCDLookUp("Administracion_rape","mc_c_usuarios","id= " . CCGetUserID() , $db);
		CCSetSession("AdministracionRape",$sAdministracion); 
        $sNivel = CCDLookUp("Nivel","mc_c_usuarios","id= " . CCGetUserID() , $db);
		CCSetSession("Nivel",$sNivel); 
		$sEsRape = CCDLookUp("Rape","mc_c_usuarios","id= " . CCGetUserID() , $db);
		CCSetSession("Rape",$sEsRape); 
		$sNombre = CCDLookUp("substring(nombre,1,case when charindex(' ',nombre)=0 then len(nombre) else charindex(' ',nombre)-1 end )","mc_c_usuarios","id= " . CCGetUserID() , $db);
		CCSetSession("NombreCorto",$sNombre);
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
	$ldaprdn  = 'sharepoint@capcmc.itera';     // ldap rdn or dn
	$ldappass = 'itera.2012';  // associated password
	// connect to ldap server
	$ldapconn = ldap_connect("capcmc.itera")
    or die("No es posible conectarse con el servidor de dominio.");

	if ($ldapconn) {
    	// binding to ldap server
    	$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
    	// verify binding
    	if ($ldapbind) {
    		
    	} else {
        	echo "No es posible autenticarse con el AD...";
    	}
	}


			$REPORT = "/AnalyticsReports/1%20Varios/VistaInicial.rdl";
		                                     
					global $lReportContent;
					//$lReportContent->SetValue("<div style='overflow:auto; width:1000px; height:700px' >" . $result_html . "</div>");
					$lReportContent->SetValue("<center><iframe  id='rep_metri'   width='85%' height='900px' scrolling='no'  frameborder=0 src=reportviewer/VerReporteVistaLogin.aspx?urlreporte=" . $REPORT . "&fullscreen=1></iframe></center>");
    
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
