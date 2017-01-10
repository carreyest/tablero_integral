<?php
//BindEvents Method @1-A9A28537
function BindEvents()
{
    global $DetalleCarga;
    global $CCSEvents;
    $DetalleCarga->Button_Exec->CCSEvents["OnClick"] = "DetalleCarga_Button_Exec_OnClick";
    $DetalleCarga->fechaCarga->CCSEvents["BeforeShow"] = "DetalleCarga_fechaCarga_BeforeShow";
    $DetalleCarga->CCSEvents["BeforeShow"] = "DetalleCarga_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
}
//End BindEvents Method

//DetalleCarga_Button_Exec_OnClick @8-E6119F38
function DetalleCarga_Button_Exec_OnClick(& $sender)
{
    $DetalleCarga_Button_Exec_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $DetalleCarga; //Compatibility
//End DetalleCarga_Button_Exec_OnClick

//Custom Code @16-2A29BDB7
// -------------------------
    global $Tpl;
	global  $Redirect;
if ($DetalleCarga->eliminarCargaAnt->GetValue()===TRUE){
   $div_fecha=explode('/',$DetalleCarga->fechaCarga->GetValue());
   $fecha_corte=$div_fecha[2].'-'.$div_fecha[1].'-'.$div_fecha[0];
   $ban_borrar_reg_ant=elimina_reg_ant($fecha_corte);
   $db=new clsDBConnCarga ;		
   $v_repositorio = CCDLookUp("repositorio", "proceso_carga_archivos", "cve_carga='" . CCGetParam("s_cve_carga","")."'", $db);
   $archivo_cargado=$v_repositorio.'\\'.$DetalleCarga->lista_archivos->GetValue();
   if ($ban_borrar_reg_ant!==TRUE) 
    {
	 $Tpl->SetVar("Error", "Hubo un error al tratar de eliminar los registros anteriores"); 
    }  
   else {
	 $ban_borrar_act_bit=actualiza_bitacora($archivo_cargado); 	
	 if ($ban_borrar_act_bit!==TRUE)
	  {
	   $Tpl->SetVar("Error", "Hubo un error al tratar de actualizar dato anterior de bitacora"); 	  	
	  }	
   }  
}
/*
  	if(CCGetParam("s_cve_carga")!="" && $DetalleCarga->lista_archivos->GetValue()!="" && $DetalleCarga->fechaCarga->GetValue()!= "" ){
  		global $lblmssgs;
  		$lblmssgs->SetValue("<iframe style='overflow:auto; width:600px; height:1200px;' frameborder=0 src='./RunCarga.php?s_cve_carga=".CCGetParam("s_cve_carga","")."&s_archivo=".$DetalleCarga->lista_archivos->GetValue()."&s_fecha=".$DetalleCarga->fechaCarga->GetValue()."'></iframe>");
  	}	
*/
$Redirect = "RunCarga.php?s_cve_carga=".CCGetParam("s_cve_carga","")."&s_archivo=".$DetalleCarga->lista_archivos->GetValue()."&s_fecha=".$DetalleCarga->fechaCarga->GetValue()."&s_rm_ant=".$DetalleCarga->eliminarCargaAnt->GetValue();
//Agregar un php nuevo donde se muestre los resultados de la carga  que se llevara a cabo con un exec, donde el 2o. parametro recibirar los mensajes a desplegar Ver ConfigDeCargas/ExecCarga.php
          
    // Write your own code here.
// -------------------------
//End Custom Code

//Close DetalleCarga_Button_Exec_OnClick @8-BEAD8B75
    return $DetalleCarga_Button_Exec_OnClick;
}
//End Close DetalleCarga_Button_Exec_OnClick

//DEL  // -------------------------
//DEL      echo("Dio click");
//DEL      // Write your own code here.
//DEL  // -------------------------

//DetalleCarga_fechaCarga_BeforeShow @11-47E61AA1
function DetalleCarga_fechaCarga_BeforeShow(& $sender)
{
    $DetalleCarga_fechaCarga_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $DetalleCarga; //Compatibility
//End DetalleCarga_fechaCarga_BeforeShow

//Close DetalleCarga_fechaCarga_BeforeShow @11-3E475726
    return $DetalleCarga_fechaCarga_BeforeShow;
}
//End Close DetalleCarga_fechaCarga_BeforeShow

//DetalleCarga_BeforeShow @6-9EF024F9
function DetalleCarga_BeforeShow(& $sender)
{
    $DetalleCarga_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $DetalleCarga; //Compatibility
//End DetalleCarga_BeforeShow
    global $Tpl;
//Custom Code @9-2A29BDB7
// -------------------------
    $db=new clsDBConnCarga ;
	if (CCGetParam("s_cve_carga","")!="")
	{
			$repositorio = CCDLookUp("repositorio", "proceso_carga_archivos", "cve_carga='" . CCGetParam("s_cve_carga","")."'", $db);
			//$dir = str_replace('\','\\\',str_replace('\\172.16.8.10','',$repositorio));
			$dir = str_replace('\\172.16.8.10','',$repositorio);
			
			$location = '\\\\172.16.8.10\\c$';
			$user = "capcmc\\sharepoint";
			$pass = "itera.2012";
			$letter = "H";
			
			//echo("BEGIN");
			// Map the drive
			system("net use ".$letter.": \"".$location."\" ".$pass." /user:".$user." /persistent:no>nul 2>&1");
			
			// Open the directory
			
			//$directorio = opendir("\\\\172.16.8.10\\c$\\TCI_Fuentes\\MC01_ACPP");
			//$directorio = opendir($letter.":\\TCI_Fuentes\\MC01_ACPP");
			@$directorio = opendir($letter.":\\".$dir);    
			
			if ($directorio===FALSE)
			 {
				$Tpl->SetVar("Error", "Directoio no existe: ".$letter.":\\".$dir." Revise la definción de la carga");
	            $Tpl->Parse("Error", true);
			 }
			else { 
				//while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
				$arreglo=array();
				while (false !== ($archivo = readdir($directorio)))
				{
				    if (is_dir($archivo))//verificamos si es o no un directorio
				    {
				//        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
				    }
				    else
				    {
				    	if (stristr($archivo,'.xls') || stristr($archivo,'.xlsx') )
				    	array_push($arreglo,array($archivo,$archivo));
				//        echo $archivo . "<br />";
				    }
				}
				//$NewRecord1->ListBox1->Values = array(array("1", "High"),array("2", "Normal"), array("3", "Low"));
				$DetalleCarga->lista_archivos->Values = $arreglo;
				$Tpl->SetVar("diralistar",CCGetParam("s_cve_carga",""));
			}	
	}

    // Write your own code here.
// -------------------------
//End Custom Code

//Close DetalleCarga_BeforeShow @6-F0677CD4
    return $DetalleCarga_BeforeShow;
}
//End Close DetalleCarga_BeforeShow

//Page_BeforeShow @1-E7780EA7
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CargaMW; //Compatibility
    global $DetalleCarga;
//End Page_BeforeShow

//Custom Code @10-2A29BDB7
// -------------------------
if (CCGetParam("s_cve_carga","")=="")
{
	$DetalleCarga->Visible=false;
}
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_AfterInitialize @1-846F3DD4
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CargaMW; //Compatibility
//End Page_AfterInitialize

//Custom Code @18-2A29BDB7
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

// -------------------------
//End Custom Code

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize

function elimina_reg_ant($fecha) {
		$db=new clsDBConnCarga ;		
		$v_db = CCDLookUp("db_destino", "proceso_carga_archivos", "cve_carga='" . CCGetParam("s_cve_carga","")."'", $db);
		$v_tabla = CCDLookUp("tabla_destino", "proceso_carga_archivos", "cve_carga='" . CCGetParam("s_cve_carga","")."'", $db);
		$v_proveedor = CCDLookUp("proveedor", "proceso_carga_archivos", "cve_carga='" . CCGetParam("s_cve_carga","")."'", $db);
		$v_campo_fecha_cierre = CCDLookUp("campo_fecha_cierre", "proceso_carga_archivos", "cve_carga='" . CCGetParam("s_cve_carga","")."'", $db);
		
		if ($v_proveedor !='TODOS')
		 $where_proveedor=" AND proveedor ='".$v_proveedor."'";
		else
		 $where_proveedor="";
		
		$sql_select = "select count(*) from ".$v_db.".dbo.".$v_tabla." where ".$v_campo_fecha_cierre." ='".$fecha."'".$where_proveedor;		
        	
		$sql_delete = "delete from ".$v_db.".dbo.".$v_tabla." where ".$v_campo_fecha_cierre." ='".$fecha."'".$where_proveedor;

		$db->query($sql_select);
	    if($db->next_record()){ 
    	 		$v_reg_ant=$db->f(0);
	    }	
		if ($v_reg_ant > 0 ) { 
				$db->query($sql_delete); //Eliminacion de registros anteriores
				$db->query($sql_select); //Count para cromprobar si el delete fue exitoso
			    if($db->next_record()) {
			    		$v_reg_fin=$db->f(0);
			    }
				if ($v_reg_fin > 0)
				 {
				  return FALSE; //Hubo un error al tratar de eliminar los registros
				 } 
				else { 
				 return TRUE; //Eliminacion existosa
				 }
		}
		else {
		  return TRUE; //No hay archivos que eliminar
		}
		 
}	
function actualiza_bitacora($archivo_cargado) {
	
	$sql_select = "update bitacora_de_carga set status='CARGA CANCELADA' where nombreCarga='".CCGetParam("s_cve_carga","")."' and archivo_cargado='".$archivo_cargado."'";
	$db=new clsDBConnCarga ;		
	if ($db->query($sql_select))
		return TRUE;		 
	else 
	    return FALSE;	
}	


?>
