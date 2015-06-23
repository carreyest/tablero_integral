<?php
//BindEvents Method @1-542C2619
function BindEvents()
{
    global $Menu1;
    global $proceso_carga_archivos;
    global $CCSEvents;
    $Menu1->CCSEvents["BeforeShow"] = "Menu1_BeforeShow";
    $proceso_carga_archivos->CCSEvents["BeforeShow"] = "proceso_carga_archivos_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Menu1_BeforeShow @3-FD569740
function Menu1_BeforeShow(& $sender)
{
    $Menu1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Menu1; //Compatibility
//End Menu1_BeforeShow

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Menu1_BeforeShow @3-E5D31D78
    return $Menu1_BeforeShow;
}
//End Close Menu1_BeforeShow

//proceso_carga_archivos_BeforeShow @40-5AB6D6B3
function proceso_carga_archivos_BeforeShow(& $sender)
{
    $proceso_carga_archivos_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $proceso_carga_archivos; //Compatibility
//End proceso_carga_archivos_BeforeShow

//Custom Code @50-2A29BDB7
// -------------------------
  	if(CCGetParam("cveCarga")!=''){
  		global $LExec;
  		$LExec->SetValue("<iframe style='overflow:auto; width:1160px; height:600px;' frameborder=0 src='./Autocarga/intfzcarga.php?cveCarga=" . CCGetParam("cveCarga") . "'></iframe>");
  	}	

    // Write your own code here.
// -------------------------
//End Custom Code

//Close proceso_carga_archivos_BeforeShow @40-53792EEA
    return $proceso_carga_archivos_BeforeShow;
}
//End Close proceso_carga_archivos_BeforeShow

//DEL  // -------------------------
//DEL  	if(CCGetParam("cveCarga")!=''){
//DEL  		echo("ENTRO");
//DEL  		global $lExec;
//DEL  		$NewRecord1->lExec->SetValue("<iframe style='overflow:auto; width:1160px; height:600px;' frameborder=0 src='../../Autocarga/carga.php?cveCarga=" . CCGetParam("cveCarga") . "'></iframe>");
//DEL  	}	
//DEL  
//DEL      // Write your own code here.
//DEL  // -------------------------

//Page_BeforeShow @1-8D2E7381
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ExecCarga; //Compatibility
//End Page_BeforeShow

//Custom Code @12-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
