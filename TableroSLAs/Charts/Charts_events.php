<?php
//BindEvents Method @1-EF623785
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Page_OnInitializeView @1-857FD63C
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Charts; //Compatibility
//End Page_OnInitializeView

//Custom Code @2-2A29BDB7
// -------------------------
	error_reporting(E_ERROR ); 
    include_once(RelativePath . "/Charts/pChart/pData.class");
    include_once(RelativePath . "/Charts/pChart/pChart.class");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-D24CF1F7
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Charts; //Compatibility
//End Page_BeforeShow

//Custom Code @3-2A29BDB7
// -------------------------
    if(CCGetParam(s_Acronimo,"")!=""){
    	ufIndicadoresCumplimiento();
    } else {
    	global $iMes;
    	$iMes=0;
	    global $db;
	    $db= new clsDBcnDisenio;
	    
	    $db->query("select COUNT(*), MesReporte, AnioReporte , p.nombre " .
	    	"from mc_calificacion_incidentes_MC i inner join mc_c_proveedor p on i.id_proveedor = p.id_proveedor " .
	    	" where anioreporte = " . CCGetParam("s_Anio",date(Y))  .
	    	" group by MesReporte, AnioReporte, p.nombre order by 2,1");
	    $aCDS=array();
	    while($db->next_record()){
	    	$sCDS = $db->f("nombre");
	    	if(count($$sCDS)==0){ 
	    		$$sCDS = array();
	    		array_push($aCDS, $db->f("nombre"));
	    	}
	    	// si el numero de mes es menor al indice del arreglo se insertan los meses que faltan	
	    	while(count($$sCDS) < $db->f(1)-1) {
	    		array_push($$sCDS, 0);
	    	}
	    	array_push($$sCDS, $db->f(0));
	    }
	    $db->close();
	    // Dataset definition  
	    $sTable="<table border=1><tr><td></td><td>Ene</td><td>Feb</td><td>Mar</td><td>Abr</td><td>May</td><td>Jun</td><td>Jul</td><td>Ago</td><td>Sep</td><td>Oct</td><td>Nov</td><td>Dic</td></tr>";	
		$DataSet = new pData;
		for ($i = 0; $i < count($aCDS); $i++) {
			$xCDS = $aCDS[$i];
	    	$DataSet->AddPoint($$xCDS,$aCDS[$i]);  
			$DataSet->AddSerie($aCDS[$i]);  
			$DataSet->SetSerieName($aCDS[$i],$aCDS[$i]);  	
			$sTable= $sTable . "<tr><td  width='80px'>" . $aCDS[$i] . "</td><td width='40px'>" . implode("</td><td  width='40px'>",$$aCDS[$i]) . "</td></tr>";
		}
		$DataSet->AddPoint(array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"),"Serie4");  
		$DataSet->SetAbsciseLabelSerie("Serie4");  
		$sTable = $sTable . "</table>";
		 
		// Initialise the graph  
		$Test = new pChart(700,230);  
		$Test->setFontProperties("Fonts/tahoma.ttf",10);  
		$Test->setGraphArea(40,30,680,200);  
		$Test->drawGraphArea(252,252,252);  
		$Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);  
		$Test->drawGrid(4,TRUE,230,230,230,255);  
	 
		// Draw the line graph  
		$Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());  
		$Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);  
		 
		// Finish the graph  
		$Test->setFontProperties("Fonts/tahoma.ttf",8);  
		$Test->drawLegend(45,35,$DataSet->GetDataDescription(),255,255,255);  
		$Test->setFontProperties("Fonts/tahoma.ttf",10);  
		$Test->drawTitle(60,22,"Incidentesx Totales por CDS por Mes",50,50,50,585);  
		$Test->Render("Incidentes.png");  
	
		//limpia los arreglos creados para los CDSs
		for ($i = 0; $i < count($aCDS); $i++) {
			$sCDS = $aCDS[$i];
			unset($$sCDS);
		}
		unset($aCDS) ;
	
		/// Genera la gráfica de los de Apertura
		$db->query("select COUNT(*) , MesReporte, AnioReporte , p.nombre " .
	    	"from mc_calificacion_rs_MC i inner join mc_c_proveedor p on i.id_proveedor = p.id_proveedor " .
	    	" where (HERR_EST_COST is not null or REQ_SERV is not null) and anioreporte = " . CCGetParam("s_Anio",date(Y))  .
	    	" group by MesReporte, AnioReporte , p.nombre order by 2,1");
	    $aCDSa=array();
	    while($db->next_record()){
	    	$sCDSa = $db->f("nombre");
	    	if(count($$sCDSa)==0){ 
	    		$$sCDSa = array();
	    		array_push($aCDSa, $db->f("nombre"));
	    	}
	    	// si el numero de mes es menor al indice del arreglo se insertan los meses que faltan	
	    	while(count($$sCDSa) < $db->f(1)-1) {
	    		array_push($$sCDSa, 0);
	    	}
	    		array_push($$sCDSa, $db->f(0));
	    }
		
		// Dataset definition   
		$sTablea="<table border=1><tr><td></td><td>Ene</td><td>Feb</td><td>Mar</td><td>Abr</td><td>May</td><td>Jun</td><td>Jul</td><td>Ago</td><td>Sep</td><td>Oct</td><td>Nov</td><td>Dic</td></tr>";	
		$DataSeta = new pData;
		for ($i = 0; $i < count($aCDSa); $i++) {
	    	$sCDSAcronimo = $$aCDSa[$i] ;
	    	$DataSeta->AddPoint($$aCDSa[$i],$aCDSa[$i]);  
			$DataSeta->AddSerie($aCDSa[$i]);  
			$DataSeta->SetSerieName($aCDSa[$i],$aCDSa[$i]); 
			$sTablea = $sTablea . "<tr><td  width='80px'>" . $aCDSa[$i] . "</td><td width='40px'>" . implode("</td><td  width='40px'>",$sCDSAcronimo) . "</td></tr>"; 	
		}
		$DataSeta->AddPoint(array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"),"Serie4");  
		$DataSeta->SetAbsciseLabelSerie("Serie4");  
		$sTablea = $sTablea . "</table>";
		
		// Initialise the graph  
		$Testa = new pChart(700,230);  
		$Testa->setFontProperties("Fonts/tahoma.ttf",10);  
		$Testa->setGraphArea(40,30,680,200);  
		$Testa->drawGraphArea(252,252,252);  
		$Testa->drawScale($DataSeta->GetData(),$DataSeta->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);  
		$Testa->drawGrid(4,TRUE,230,230,230,255);  
	 
		// Draw the line graph  
		$Testa->drawLineGraph($DataSeta->GetData(),$DataSeta->GetDataDescription());  
		$Testa->drawPlotGraph($DataSeta->GetData(),$DataSeta->GetDataDescription(),3,2,255,255,255);  
		 
		// Finish the graph  
		$Testa->setFontProperties("Fonts/tahoma.ttf",8);  
		$Testa->drawLegend(45,35,$DataSeta->GetDataDescription(),255,255,255);  
		$Testa->setFontProperties("Fonts/tahoma.ttf",10);  
		$Testa->drawTitle(60,22,"Reuqerimientos de Apertura por CDS por Mes",50,50,50,585);  
		$Testa->Render("Apertura1.png");  
	
		//limpia los arreglos creados para los CDSs
		for ($i = 0; $i < count($aCDSa); $i++) {
			$sCDSa = $aCDSa[$i];
			unset($$sCDSa);
		}
		unset($aCDSa) ;
	
		///Genera la gráfica de los de cierre
		$db->query("select COUNT(*) , MesReporte, AnioReporte , p.nombre " .
	    	"from mc_calificacion_rs_MC i inner join mc_c_proveedor p on i.id_proveedor = p.id_proveedor " .
	    	" where (CUMPL_REQ_FUNC is not null or RETR_ENTREGABLE is not null or CALIDAD_PROD_TERM is not null or DEF_FUG_AMB_PROD is not null) " .
	    	"  and anioreporte = " . CCGetParam("s_Anio",date(Y))  .
	    	"group by MesReporte, AnioReporte , p.nombre order by 2,1");
	    $aCDSc=array();
	    while($db->next_record()){
	    	$sCDSc = $db->f("nombre");
	    	if(count($$sCDSc)==0){ 
	    		$$sCDSc = array();
	    		array_push($aCDSc, $db->f("nombre"));
	    	}
	    	// si el numero de mes es menor al indice del arreglo se insertan los meses que faltan	
	    	while(count($$sCDSc) < $db->f(1)-1) {
	    		array_push($$sCDSc, 0);
	    	}
	    		array_push($$sCDSc, $db->f(0));
	    }
		$db->close();
		
		// Dataset definition   
		$sTablec="<table border=1><tr><td></td><td>Ene</td><td>Feb</td><td>Mar</td><td>Abr</td><td>May</td><td>Jun</td><td>Jul</td><td>Ago</td><td>Sep</td><td>Oct</td><td>Nov</td><td>Dic</td></tr>";	
		$DataSetc = new pData;
		for ($i = 0; $i < count($aCDSc); $i++) {
	    	$DataSetc->AddPoint($$aCDSc[$i],$aCDSc[$i]);  
			$DataSetc->AddSerie($aCDSc[$i]);  
			$DataSetc->SetSerieName($aCDSc[$i],$aCDSc[$i]);  	
			$sTablec = $sTablec . "<tr><td  width='80px'>" . $aCDSc[$i] . "</td><td width='40px'>" . implode("</td><td  width='40px'>",$$aCDSc[$i]) . "</td></tr>";
		}
		$DataSetc->AddPoint(array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"),"Serie4");  
		$DataSetc->SetAbsciseLabelSerie("Serie4");  		
		$sTablec = $sTablec . "</table>";
		 
		// Initialise the graph  
		$Testc = new pChart(700,230);  
		$Testc->setFontProperties("Fonts/tahoma.ttf",10);  
		$Testc->setGraphArea(40,30,680,200);  
		$Testc->drawGraphArea(252,252,252);  
		$Testc->drawScale($DataSetc->GetData(),$DataSetc->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);  
		$Testc->drawGrid(4,TRUE,230,230,230,255);  
	 	
		// Draw the line graph  
		$Testc->drawLineGraph($DataSetc->GetData(),$DataSetc->GetDataDescription());  
		$Testc->drawPlotGraph($DataSetc->GetData(),$DataSetc->GetDataDescription(),3,2,255,255,255);  
		 
		// Finish the graph  
		$Testc->setFontProperties("Fonts/tahoma.ttf",8);  
		$Testc->drawLegend(45,35,$DataSetc->GetDataDescription(),255,255,255);  
		$Testc->setFontProperties("Fonts/tahoma.ttf",10);  
		$Testc->drawTitle(60,22,"Requerimientos de Cierre por CDS por Mes",50,50,50,585);  
		$Testc->Render("Cierre1.png");  
		
		for ($i = 0; $i < count($aCDSc); $i++) {
			$sCDSc = $aCDSc[$i];
			unset($$sCDSc);
		}
		unset($aCDSc) ;
	
	
		global $Tpl;
		$Tpl->Setvar("vGrafica",'<center><img src="Incidentes.png" border=1/>' .$sTable  .'</center><br><center><img src="Apertura1.png" border=1/>' . $sTablea . '</center><br><center><img src="Cierre1.png" border=1/>' .  $sTablec . '</center>' );
    }
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

function ufIndicadoresCumplimiento(){
	global $sCharts;
	
	$sSQL=" select    " .
	 "COUNT(HERR_EST_COST) TotHERR_EST_COST, SUM(cast(HERR_EST_COST as int)) CumplenHERR_EST_COST, SUM(cast(HERR_EST_COST as float))/COUNT(HERR_EST_COST)*100 HERR_EST_COST,  " .
	 "(Select Meta from mc_c_metrica where acronimo='HERR_EST_COST') as Meta_HERR_EST_COST,  " .
	 "COUNT(REQ_SERV) TotREQ_SERV, SUM(cast(REQ_SERV as int)) CumplenREQ_SERV, SUM(cast(REQ_SERV as float))/COUNT(REQ_SERV)*100 REQ_SERV,  " .
	 "(Select Meta from mc_c_metrica where acronimo='REQ_SERV') as Meta_REQ_SERV,  " .
	 "COUNT(CUMPL_REQ_FUNC) TotCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as int)) CumplenCUMPL_REQ_FUNC, SUM(cast(CUMPL_REQ_FUNC as float))/COUNT(CUMPL_REQ_FUNC)*100 CUMPL_REQ_FUNC,  " .
	 "(Select Meta from mc_c_metrica where acronimo='CUMPL_REQ_FUNC') as Meta_CUMPL_REQ_FUNC,  " .
	 "COUNT(CALIDAD_PROD_TERM) TotCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as int)) CumplenCALIDAD_PROD_TERM, SUM(cast(CALIDAD_PROD_TERM as float))/COUNT(CALIDAD_PROD_TERM)*100 CALIDAD_PROD_TERM,  " .
	 "(Select Meta from mc_c_metrica where acronimo='CALIDAD_PROD_TERM') as Meta_CALIDAD_PROD_TERM,  " .
	 "COUNT(RETR_ENTREGABLE) TotRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as int)) CumplenRETR_ENTREGABLE, SUM(cast(RETR_ENTREGABLE as float))/COUNT(RETR_ENTREGABLE)*100 RETR_ENTREGABLE,  " .
	 "(Select Meta from mc_c_metrica where acronimo='RETR_ENTREGABLE') as Meta_RETR_ENTREGABLE,  " .
	 "COUNT(COMPL_RUTA_CRITICA) TotCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as int)) CumplenCOMPL_RUTA_CRITICA, SUM(cast(COMPL_RUTA_CRITICA as float))/COUNT(COMPL_RUTA_CRITICA)*100 COMPL_RUTA_CRITICA,  " .
	 "(Select Meta from mc_c_metrica where acronimo='COMPL_RUTA_CRITICA') as Meta_COMPL_RUTA_CRITICA,  " .
	 "COUNT(EST_PROY) TotEST_PROY, SUM(cast(EST_PROY as int)) CumplenEST_PROY, SUM(cast(EST_PROY as float))/COUNT(EST_PROY)*100 EST_PROY,  " .
	 "(Select Meta from mc_c_metrica where acronimo='EST_PROY') as Meta_EST_PROY,  " .
	 "COUNT(DEF_FUG_AMB_PROD) TotDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as int)) CumplenDEF_FUG_AMB_PROD, SUM(cast(DEF_FUG_AMB_PROD as float))/COUNT(DEF_FUG_AMB_PROD)*100  DEF_FUG_AMB_PROD,  " .
	 "(Select Meta from mc_c_metrica where acronimo='DEF_FUG_AMB_PROD') as Meta_DEF_FUG_AMB_PROD,  " .
	 "avg(TotTiempoAsignacion) TotInc_TiempoAsignacion, avg(CumplenTiempoAsignacion) CumplenInc_TiempoAsignacion, avg(cast(CumplenTiempoAsignacion as float))/avg(cast(TotTiempoAsignacion as float))*100 Inc_TiempoAsignacion,  " .
	 "(Select Meta from mc_c_metrica where acronimo='Inc_TiempoSolucion') as Meta_Inc_TiempoSolucion,  " .
	 "avg(TotTiempoSolucion) TotInc_TiempoSolucion, avg(CumplenTiempoSolucion) CumplenInc_TiempoSolucion, avg(cast(CumplenTiempoSolucion as float))/avg(cast(TotTiempoSolucion as float))*100 Inc_TiempoSolucion,  " .
	 "(Select Meta from mc_c_metrica where acronimo='Inc_TiempoAsignacion') as Meta_Inc_TiempoAsignacion,  " .
	 "avg(TotCumple_DISP_SOPORTE) TotDISP_SOPORTE , avg(CumplenCumple_DISP_SOPORTE) CumplenDISP_SOPORTE, avg(cast(TotCumple_DISP_SOPORTE as float))/avg(cast(TotCumple_DISP_SOPORTE as float))*100 DISP_SOPORTE,  " .
	 "(Select Meta from mc_c_metrica where acronimo='DISP_SOPORTE') as Meta_DISP_SOPORTE,  " .
	 "AVG(Cumple_EF) Cumple_EF, AVG(total_ef) Total_ef, avg(cast(Cumple_EF as float))/avg(total_ef)*100  EFIC_PRESUP,  " .
	 "(Select Meta from mc_c_metrica where acronimo='EFIC_PRESUP') as Meta_EFIC_PRESUP,  " .
	 "m.MesReporte , m.anioreporte , p.nombre   " .
	"from  mc_c_proveedor p  inner join  mc_calificacion_rs_MC m on p.id_proveedor = m.id_proveedor  " .
	 	"left join	(select  " .
	 		"COUNT(Cumple_Inc_TiempoAsignacion) TotTiempoAsignacion, SUM(cast(Cumple_Inc_TiempoAsignacion as int)) CumplenTiempoAsignacion,  " .
	 		"COUNT(Cumple_DISP_SOPORTE) TotCumple_DISP_SOPORTE, SUM(cast(Cumple_DISP_SOPORTE as int)) CumplenCumple_DISP_SOPORTE,   " .
	 		"COUNT(Cumple_Inc_TiempoSolucion) TotTiempoSolucion, SUM(cast(Cumple_Inc_TiempoSolucion as int)) CumplenTiempoSolucion,  " .
	 	 "MesReporte , AnioReporte ,    " .
				"id_proveedor from mc_calificacion_incidentes_MC " .
				"group by Id_Proveedor, MesReporte , anioreporte  )  mi on  mi.Id_Proveedor= p.id_proveedor    " .
			"and mi.Id_Proveedor  = m.id_proveedor  and m.MesReporte  = mi.MesReporte and m.AnioReporte  = mi.anioreporte    " .
	"left join  (select SUM(CumpleSLA) Cumple_EF, COUNT(CumpleSLA) Total_EF, Id_Proveedor, MesReporte , anioreporte , 2 IdServicioCont    " .
			"from mc_eficiencia_presupuestal  where CumpleSLA in (1,0)  and [GrupoAplicativos] not like 'Todos%'   " .
			"group by Id_Proveedor, MesReporte , anioreporte  ) ef   " .
			"on ef.Id_Proveedor  = m.id_proveedor  and m.MesReporte  = ef.MesReporte and m.AnioReporte  = ef.anioreporte    " .
				"where m.anioreporte = " . CCGetParam("s_Anio",date(Y)) .  " and (m.mesreporte =" . CCGetParam("s_Mes",0) .  " or " . CCGetParam("s_Mes",0) . " =0) " .
	" group by m.MesReporte , m.anioreporte , p.nombre  order by p.nombre, MesReporte,anioreporte  "  ;

	global $db;
    $db= new clsDBcnDisenio;
    $db->query($sSQL);
	
	//Si no se especifico un mes,  para cada SLA seleccionado se genera una gráfica
	if(CCGetParam("s_Mes",0)==0){	
		$s_Acronimo= CCGetParam(s_Acronimo,"");	
		$aCDS = array();
		$aMeta = array();
	    while($db->next_record()){
	    	$sCDS = $db->f("nombre");
	    	if(array_search($sCDS,$aCDS)===false)  $aCDS[]=$sCDS;
	    	
	    	//para cada proveedor verifica si existe el arreglo del acronimo de la metrica 
	    	for($iAcronimo=0;$iAcronimo<count($s_Acronimo);$iAcronimo++){
				$sCDSAcronimo = $sCDS .$s_Acronimo[$iAcronimo] ;
				if(count($$sCDSAcronimo)==0){ 
					$$sCDSAcronimo = array();
				}
				switch(CCGetParam("s_Metrica","")){
					case 1:
						array_push($$sCDSAcronimo, $db->f("Tot" . $s_Acronimo[$iAcronimo]));		
						break;
					case 2:
						array_push($$sCDSAcronimo, $db->f("Cumplen" . $s_Acronimo[$iAcronimo]));		
						break;
					default:
						array_push($$sCDSAcronimo, number_format($db->f($s_Acronimo[$iAcronimo])));	
				}
				
				$saMeta = "Meta_" . $s_Acronimo[$iAcronimo];
				if(array_search($saMeta ,$aMeta)===false)  $aMeta[]=$saMeta;
				if(count($$saMeta)==0) $$saMeta=array();
				// no mete mas elementos a la meta que los que tiene el proveedor
				if(count($$saMeta)<count($$sCDSAcronimo))
					array_push($$saMeta, $db->f("Meta_" . $s_Acronimo[$iAcronimo]));	
			}	
	    }
	    for($iAcronimo=0;$iAcronimo<count($s_Acronimo);$iAcronimo++){    			
				// Dataset definition   
				$DataSet = new pData;
				$DataSet->AddPoint(array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"),"Serie4");  
				$DataSet->SetAbsciseLabelSerie("Serie4");  
				
				//se pone la meta
				$i=0;
				$DataSet->AddPoint($$saMeta,$aMeta[$iAcronimo]);  
				$DataSet->AddSerie($aMeta[$iAcronimo]);  
				$DataSet->SetSerieName($aMeta[$iAcronimo],$aMeta[$iAcronimo]);  	
				$sTable="<table border=1><tr><td></td><td>Ene</td><td>Feb</td><td>Mar</td><td>Abr</td><td>May</td><td>Jun</td><td>Jul</td><td>Ago</td><td>Sep</td><td>Oct</td><td>Nov</td><td>Dic</td></tr>";	
				for ($i = 0; $i < count($aCDS); $i++) {
			    	$sCDSAcronimo = $aCDS[$i] .$s_Acronimo[$iAcronimo] ;
			    	
			    	$DataSet->AddPoint($$sCDSAcronimo,$aCDS[$i]);  
					$DataSet->AddSerie($aCDS[$i]);  
					$DataSet->SetSerieName($aCDS[$i],$aCDS[$i]);  	
					$sTable= $sTable . "<tr><td  width='80px'>" . $aCDS[$i] . "</td><td width='40px'>" . implode("</td><td  width='40px'>",$$sCDSAcronimo) . "</td></tr>";
				}	
					$sTable = $sTable . "</table>";
					
					// Initialise the graph  
					$Test = new pChart(920,250);  
					$Test->setFontProperties("Fonts/tahoma.ttf",10);  
					$Test->setGraphArea(40,30,720,200);  
					$Test->drawGraphArea(252,252,252);  
					$Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);  
					$Test->drawGrid(4,TRUE,230,230,230,255);  
				 
					// Draw the line graph  
					$Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());  
					$Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);  
					 
					// Finish the graph  
					$Test->setFontProperties("Fonts/tahoma.ttf",8);  
					$Test->drawLegend(745,15,$DataSet->GetDataDescription(),255,255,255);  
					$Test->setFontProperties("Fonts/tahoma.ttf",10);  
					$Test->drawTitle(60,22,"Cumplimieto por Mes por CDS " . $s_Acronimo[$iAcronimo] ,50,50,50,585);  
					$Test->Render( $sCDSAcronimo .".png");  	
	
					$sCharts= $sCharts . '<center><img src="' .  $sCDSAcronimo . '.png" border=1/>' . $sTable  . '</center><br /> <br />';
					
	    }
	} else {//si se especifico un mes, genera una gráfica de Radar
		$s_Acronimo= CCGetParam(s_Acronimo,"");	
		$aCDS = array();
	    while($db->next_record()){
	    	$sCDS = $db->f("nombre");
	    	if(array_search($sCDS,$aCDS)===false)  {
	    		$$sCDS= array();
	    		$aCDS[]=$sCDS;
	    	}
	    	for($iAcronimo=0;$iAcronimo<count($s_Acronimo);$iAcronimo++){
	    		switch(CCGetParam("s_Metrica","")){
					case 1:
						array_push($$sCDS, number_format($db->f("Tot" . $s_Acronimo[$iAcronimo]),1));	
						break;
					case 2:
						array_push($$sCDS, number_format($db->f("Cumplen" . $s_Acronimo[$iAcronimo]),1));			
						break;
					default:
						array_push($$sCDS, number_format($db->f($s_Acronimo[$iAcronimo])/10,1));	
				}
	    		//array_push($$sCDS, number_format($db->f($s_Acronimo[$iAcronimo])/10,1));	
	    	}
	    }
	    // Dataset definition   
		$DataSet = new pData;
				
		$DataSet->AddPoint($s_Acronimo,"Serie4");  
		$DataSet->SetAbsciseLabelSerie("Serie4");  
				
		for ($i = 0; $i < count($aCDS); $i++) {
			$sCDS = $aCDS[$i];   	
			$DataSet->AddPoint($$sCDS,$aCDS[$i]);  
			$DataSet->AddSerie($aCDS[$i]);  
			$DataSet->SetSerieName($aCDS[$i],$aCDS[$i]);  	
			//var_dump($$sCDS);
		}
					 // Initialise the graph  
					$Test = new pChart(600,600);  
					$Test->setFontProperties("Fonts/tahoma.ttf",8);  
					$Test->drawFilledRoundedRectangle(7,7,580,580,5,240,240,240);
					$Test->drawRoundedRectangle(5,5,585,585,5,230,230,230);
					$Test->setGraphArea(30,30,570,570);
					$Test->drawFilledRoundedRectangle(30,30,570,570,5,255,255,255);
					$Test->drawRoundedRectangle(30,30,570,570,5,220,220,220);
					
					// Draw the radar graph  
					$Test->drawRadarAxis($DataSet->GetData(),$DataSet->GetDataDescription(),FALSE,10,120,120,120,230,230,230);  
					$Test->drawFilledRadar($DataSet->GetData(),$DataSet->GetDataDescription(),5,20);  
					
					// Finish the graph  
					$Test->drawLegend(15,15,$DataSet->GetDataDescription(),255,255,255);  
					$Test->setFontProperties("Fonts/tahoma.ttf",10);  
					$Test->drawTitle(0,22,"Comparativa por CDS por Mes",50,50,50,400);  
					$Test->Render( "radar.png");  	
	
					$sCharts= $sCharts . '<center><img src="radar.png" border=1/></center><br /> <br />';	    
	}    
		global $Tpl;
		$Tpl->Setvar("vGrafica",$sCharts);	
		unset($aCDS);
	    unset($$sCDS);
}





function array_put_to_position(&$array, $object, $position, $name = null)
{
        $count = 0;
        $return = array();
        foreach ($array as $k => $v) 
        {   
                // insert new object
                if ($count == $position)
                {   
                        if (!$name) $name = $count;
                        $return[$name] = $object;
                        $inserted = true;
                }   
                // insert old object
                $return[$k] = $v; 
                $count++;
        }   
        if (!$name) $name = $count;
        if (!$inserted) $return[$name];
        $array = $return;
        return $array;
}
?>
