<?php
//BindEvents Method @1-E0DEDC1E
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
}
//End BindEvents Method

//Page_BeforeShow @1-33C542D8
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $RunCarga; //Compatibility
//End Page_BeforeShow

//Custom Code @2-2A29BDB7
// -------------------------
   $cvecarga=CCGetParam("s_cve_carga","");
   $del_ant=CCGetParam("s_rm_ant",0)>0?"Con eliminación de datos anteriores":"Sin eliminación de datos anteriores";
   $divarchivo=explode('.',CCGetParam("s_archivo",""));
   $archivo=$divarchivo[0];
   $divfecha=explode('/',CCGetParam("s_fecha",""));
   $fecha=$divfecha[2]."/".$divfecha[1]."/".$divfecha[0];
   $mssgs="";   
   if ($cvecarga != "" && $archivo != "" && $fecha != "") {
		exec("cd Autocarga && php carga.php -d ".$cvecarga." ".$archivo." ".$fecha, $output);
    	 foreach($output as $reg) {
    	 	if (strpos($reg,"=> ")) {
    	 	 $reg=str_replace("=> ","",str_replace("ï»¿","",$reg));	
    	 	 $mssgs.="<p style='background-color:#f4f4f4;color:#000000;font-family:Arial; font-size:13px'>".$reg."</p>";
    	 	}
    	 }
        
    } else{
		$mssgs="<p style='background-color:#f4f4f4;color:#000000;font-family:Arial; font-size:13px'>Falta algún parametro para la carga.</p>";    	
    	
   }
   	
   	$sql_select = "update bitacora_de_carga set mensajes=mensajes + '\n\r##Carga realizada por web##' + ' ".$del_ant."', id_usuario='".CCGetUserID()."' where nombreCarga='".$cvecarga."' and fecha_ejecucion=( select MAX(fecha_ejecucion) from bitacora_de_carga where nombreCarga='".$cvecarga."')";
	$db=new clsDBConnCarga;		
	$db->query($sql_select);

   global $lblmssgs;
   $lblmssgs->SetValue($mssgs);
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_AfterInitialize @1-FAAA756D
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $RunCarga; //Compatibility
//End Page_AfterInitialize

//Custom Code @6-2A29BDB7
// -------------------------
    $db=new clsDBConnCarga ;
if (CCGetUserID()!= "") {
	$permiso_carga_metrica = CCDLookUp("carga_metricas", "[TableroMyM_SDMA4].dbo.mc_c_usuarios", "Id=" . CCGetUserID(), $db);
} else {
	$permiso_carga_metrica=0;
}

if ($permiso_carga_metrica==0) {
	echo("Permisos insufientes para esta platilla");die;
}

    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize


?>
