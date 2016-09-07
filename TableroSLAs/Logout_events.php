<?php
//BindEvents Method @1-8B556F44
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Page_AfterInitialize @1-19E439B8
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Logout; //Compatibility
//End Page_AfterInitialize

//Logout @2-B63EF15B
    CCLogoutUser();
    CCSetCookie("MyMLogin", "");
//End Logout

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize

//Page_BeforeShow @1-08BB93A5
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Logout; //Compatibility
//End Page_BeforeShow

//Custom Code @3-2A29BDB7
// -------------------------
 
 //Inicia registro de cierre de usuario
    global $db;
    $db= new clsDBcnDisenio;
    $sSQL="UPDATE mc_acceso_usuarios set cierre=getdate() where id_session='".session_id()."' and id = (select max(id) from mc_acceso_usuarios where id_session='".session_id()."')";
    if (CCGetUserLogin()=='fjaime'){
			echo($sSQL);die;
		}
	$db->query($sSQL);
	$db->close();

    global $Redirect;
    CCSetSession("GrupoValoracion",""); 
    $Redirect ="login.php";

// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
