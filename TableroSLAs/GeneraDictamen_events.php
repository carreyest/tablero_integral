<?php
//BindEvents Method @1-2E5E30C3
function BindEvents()
{
    global $Grid2;
    global $CCSEvents;
    $Grid2->CCSEvents["BeforeShowRow"] = "Grid2_BeforeShowRow";
    $Grid2->ds->CCSEvents["BeforeExecuteSelect"] = "Grid2_ds_BeforeExecuteSelect";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Grid2_BeforeShowRow @21-3751ABF8
function Grid2_BeforeShowRow(& $sender)
{
    $Grid2_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_BeforeShowRow

//Custom Code @34-2A29BDB7
// -------------------------
    global $db;
    global $sServicios;
    $db = new clsDBcnDisenio();
    if($Grid2->Totales->GetValue()==0){
    	$Grid2->txtCumplimiento->SetValue('Para el mes de referencia el licitante adjudicado presenta el nivel de servicio sin datos para medir');
    } else {
		$NoCumplen = $Grid2->Totales->GetValue() - $Grid2->Cumplen->GetValue();
	    $Cumplimiento= $Grid2->Cumplen->GetValue()/ $Grid2->Totales->GetValue()*100;
	    if($Cumplimiento >= $Grid2->Meta->GetValue() ){
	    	$Grid2->txtCumplimiento->SetValue('Para el mes de referencia el licitante adjudicado presenta el nivel de servicio como cumplido');
	    	$Grid2->txtDetalle1->SetValue('<b>De Acuerdo</b> – Conforme a la revisión efectuada por el Modelo de Gobierno a la información presentada por este proveedor y al reporte de monitoreo del CAPC, así como a las herramientas de gestión;' .
	    		'en este período iniciaron ' . $Grid2->Totales->GetValue() . ' requerimientos de servicio de los cuales ' . $Grid2->Cumplen->GetValue() . ' cumplen con el nivel de servicio esperado <br> La documentación se encuentra en el repositorio correspondiente.' );		
	    } else {
	    	if($Grid2->idSLA->GetValue() <10){
	    		/*$db->Query('select  sn.nombre serv_negocio, sum(isnull(unidades,0)), tipounidades from calificacion_rs_SAT r ' .
	    				' left join c_servicio sn on sn.id_servicio = r.id_servicio_negocio ' .
	    				' where r.id_proveedor = ' . ccgetparam("s_id_proveedor","") . '  and r.mesreporte = ' . ccgetparam("s_MesReporte","") . ' and anioreporte =' . ccgetparam("s_AnioReporte","") .
	    				' and ' . $Grid2->Acronimo->GetValue() . ' is not null and Unidades is not null group by sn.nombre, tipounidades ');
	    		
	    		$db->Query('select distinct sn.nombre serv_negocio from mc_calificacion_rs_SAT r ' .
	    				' left join mc_c_servicio sn on sn.id_servicio = r.id_servicio_negocio ' .
	    				' where r.id_proveedor = ' . ccgetparam("s_id_proveedor","") . '  and r.mesreporte = ' . ccgetparam("s_MesReporte","") . ' and anioreporte =' . ccgetparam("s_AnioReporte","") .
	    				' and ' . $Grid2->Acronimo->GetValue() . ' is not null ');
				//se genera la cadena de la tabla de servicios
				while($db->has_next_record()){
					$db->next_record();
					//$sServicios =$sServicios .  '<tr><td width=220px style="border:thin solid">' . $db->f(0) . '</td><td style="border:thin solid">' . $db->f(1) . ' </td><td style="border:thin solid">' . $db->f(2) . '</td><td style="border:thin solid"> %</td></tr>' ;
					$sServicios =$sServicios .  '<tr><td width=220px style="border:thin solid">' . $db->f(0) . '</td><td style="border:thin solid">  </td><td style="border:thin solid"> </td><td style="border:thin solid"> %</td></tr>' ;
				}*/
	    	}
	    	$Grid2->txtCumplimiento->SetValue('Para el mes de referencia el licitante adjudicado presenta el nivel de servicio como incumplido');		    	
	    	$Grid2->txtDetalle1->SetValue('<b>No Satisfactorio</b> – Conforme a la revisión efectuada por el Modelo de Gobierno a la información presentada por este proveedor y al reporte de monitoreo del CAPC, así como a las herramientas de gestión; ' .
	    		'en este período iniciaron ' . $Grid2->Totales->GetValue() . ' requerimientos de servicio de los cuales ' . $NoCumplen . ' se encuentran fuera del rango de servicio esperado. <br />La documentación se encuentra en el repositorio correspondiente.' .
	    		'<br>Derivado de lo anterior, se hace de su conocimiento que el tope de la deductiva es del ___%, por cada uno de los servicios, sobre una base de _______ Unidades de Continuidad Operativa (UCO) para los mantenimientos menores, tal y como se detalla en el cuadro siguiente:<br /><br />'.
	    		'<p align=center>
	    			<table style="border-collapse:collapse;border:thin solid"><tr>
	    					<td rowspan="2" width=220px style="border:thin solid">Servicios</td>
	    					<td rowspan="2" width=160px style="border:thin solid">Unidades</td>
	    					<td width=80px style="border:thin solid">Tipo</td>
	    					<td width=80px style="border:thin solid">%</td></tr>'.
	    		'<tr>
	    					<td style="border:thin solid">Unidad</td>
	    					<td style="border:thin solid">Deductiva</td></tr>' .
	    		$sServicios . '</table><br /></p>'
	    		);		
	    }
    }
// -------------------------
//End Custom Code

//Close Grid2_BeforeShowRow @21-707E26A2
    return $Grid2_BeforeShowRow;
}
//End Close Grid2_BeforeShowRow

//Grid2_ds_BeforeExecuteSelect @21-AD5D63DB
function Grid2_ds_BeforeExecuteSelect(& $sender)
{
    $Grid2_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Grid2; //Compatibility
//End Grid2_ds_BeforeExecuteSelect

//Custom Code @59-2A29BDB7
// -------------------------
     
// -------------------------
//End Custom Code

//Close Grid2_ds_BeforeExecuteSelect @21-CE3AF58F
    return $Grid2_ds_BeforeExecuteSelect;
}
//End Close Grid2_ds_BeforeExecuteSelect

//Page_OnInitializeView @1-9B9A1BC0
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GeneraDictamen; //Compatibility
//End Page_OnInitializeView

//Custom Code @2-2A29BDB7
// -------------------------
	global $Grid3;
	global $Grid2;
	global $Label1;
	global $Header;
	global $Redirect;
	
	global $sMesMedicion;
	 $aMeses = array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
	$sMesMedicion = $aMeses[ccgetparam("s_MesReporte")-1];  
	
	global $db;
	global $dbSvc;
    global $sServicios;
    $db = new clsDBcnDisenio();
    $dbSvc = new clsDBcnDisenio();
    
	if(ccgetparam("chkExport","")==1){
		$PHPWord = new PHPWord();
		$PHPWord->setDefaultFontName('Constantia');
		$PHPWord->setDefaultFontSize(11);
		$PHPWord->addParagraphStyle('default', array('spaceBefore'=>0,'spaceAfter'=>0,'spacing'=>0));
	
		$styleTable = array('borderColor'=>'FFFFFF',
			  'borderSize'=>0,
			  'cellMargin'=>0,
			  'cellMarginTop'=>0,
			  'cellMarginLeft'=>0,
			  'cellMarginRight'=>0,
			  'cellMarginBottom'=>0);
		$styleTableSvc = array('borderColor'=>'000000',
			  'borderSize'=>4,
			  'cellMargin'=>0,
			  'cellMarginTop'=>0,
			  'cellMarginLeft'=>0,
			  'cellMarginRight'=>0,
			  'cellMarginBottom'=>0);
		
		$PHPWord->addTableStyle('myTable', $styleTable);
		$PHPWord->addTableStyle('tblServicios', $styleTableSvc);
		$PHPWord->addTableStyle('notaTable', $styleTable);
		
		$section = $PHPWord->createSection(array('orientation' => null,
			    'marginLeft' => 1300,
			    'marginRight' => 1115,
			    'marginTop' => 1300,
			    'marginBottom' => 1300));
		
		$header = $section->createHeader();
		$imageStyle = array('marginLeft'=>5, 'marginTop'=>20, 'width'=>205, 'height'=>65, 'align'=>'left');
		$header->addWatermark('images/logoSHCP.png',$imageStyle );
		$imageStyle = array('marginLeft'=>460, 'marginTop'=>7, 'width'=>195, 'height'=>42, 'align'=>'right');
		$header->addWatermark('images/logoSAT.png',$imageStyle );
		$header->addText('');
		$header->addText('Administración General de Comunicaciones y Tecnologías de la Información.', array('name'=>'Constantia', 'size'=>9, 'bold'=>true),array('align'=>'right','spaceBefore'=>0,'spacing'=>0,'spaceAfter'=>0));
		$header->addText('Administración Central de Desarrollo y Mantenimiento de Aplicaciones.', array('name'=>'Constantia', 'size'=>8, 'bold'=>true),array('align'=>'right','spaceBefore'=>0,'spacing'=>0,'spaceAfter'=>120));
		
		$notatable = $header->addTable('notaTable');
		$notatable->addRow();
		$notatable->addCell(10000,array('bgColor'=>'AAAAAA'))->addText('ATENTA NOTA núm. 038',array('name'=>'Constantia', 'size'=>12, 'bold'=>true),array('spaceBefore'=>0,'spacing'=>0,'spaceAfter'=>0));
		
		$db->Query('select RazonSocial, nombre from mc_c_proveedor where id_proveedor= ' . CCGetParam("s_id_proveedor") );
		$db->next_record();
		$sRazonSocial = $db->f("RazonSocial");
		$sNombreCDS = $db->f("nombre");
		
		//$header->addText('ATENTA NOTA núm. 038', array('name'=>'Constantia', 'size'=>12, 'bold'=>true),array('align'=>'left'));
		$imageStyle = array('marginLeft'=>40, 'marginTop'=>85, 'width'=>545, 'height'=>550, );
		$header->addWatermark('images/Aguila85.jpg',$imageStyle );		
		$section->addText('México, D.F. a ' . date('d') . ' de ' . $aMeses[date('m')-1]   . ' del '.date('Y').'.','',array('align'=>'right'));
		$table = $section->addTable('myTable');
		$table->addRow();
		$table->addCell(1500)->addText('Para:',array('name'=>'Constantia', 'size'=>11, 'bold'=>true));
		$cell = $table->addCell(4000);
		$cell->addText('Lic. Mauricio Sandoval Rebollo',array('name'=>'Constantia', 'size'=>11, 'bold'=>true),array('spaceBefore'=>0,'spacing'=>0,'spaceAfter'=>0));
		$cell->addText('Administrador Central de Planeación y',array(),array('spaceBefore'=>0,'spacing'=>0,'spaceAfter'=>0));
		$cell->addText('Programación Informática.',array(),array('spaceBefore'=>0,'spacing'=>0,'spaceAfter'=>0));
		$table->addRow();
		$table->addCell(1500)->addText('');
		$table->addRow();
		$table->addCell(1500)->addText('De:',array('name'=>'Constantia', 'size'=>11, 'bold'=>true));
		$cell = $table->addCell(4000);
		$cell->addText('Lic. Héctor Juan Lara Flores',array('name'=>'Constantia', 'size'=>11, 'bold'=>true),array('spaceBefore'=>0,'spacing'=>0,'spaceAfter'=>0));
		$cell->addText('Administrador Central de Desarrollo y',array(),array('spaceBefore'=>0,'spacing'=>0,'spaceAfter'=>0));
		$cell->addText('Mantenimiento de Aplicaciones.',array(),array('spaceBefore'=>0,'spacing'=>0,'spaceAfter'=>0));
		$table->addRow();
		$table->addCell(1500)->addText('');
		$table->addRow();
		$table->addCell(1500)->addText('Asunto:',array('name'=>'Constantia', 'size'=>11, 'bold'=>true));
		$table->addCell(8000)->addText('Primera revisión de la documentación correspondiente a los Niveles de Servicio, Mediciones, Métricas y Gestión de los Servicios del Contrato, al cierre del mes ' . $sMesMedicion . ' de ' . CCGetParam("s_AnioReporte")  . ' - ' . $sRazonSocial ,array('name'=>'Constantia', 'size'=>11, 'bold'=>true));
		
		$section->addText('Me permito hacer de su conocimiento que los días __________, _________, ________ y _________ '  .
							', se recibió en esta Administración Central de Desarrollo y Mantenimiento de Aplicaciones (ACDMA), ' . 
							'la documentación relativa al soporte de los SLAs, Mediciones, Métricas y Gestión de los Servicios del ' . 
							'Contrato de la fase de "Operación del Servicio", del 01 al ' .  date('d',mktime(0, 0, 0, CCGetparam("s_Mesreporte")-1, 0, CCGetParam("s_AnioReporte"))) . ' de ' . $sMesMedicion . ' de ' . 
							CCGetParam("s_AnioReporte") . ', así como la evidencia de implementación de la herramienta para el seguimiento y control de los servicios objeto del contrato, del licitante adjudicado ' .  $sRazonSocial . ' (' . $sNombreCDS . '), Centro de Desarrollo de Software No. 1, para la Partida No. 1., con número de contrato CS-309-LP-P-092/11.',array(),array('align'=>'both'));
		$section->addText('Sobre el particular, y en relación con lo citado en el rubro de Niveles de Servicio, punto No. 8 del citado anexo técnico, en el apartado correspondiente a cada indicador, le notifico el resultado de la revisión efectuada por este modelo de gobierno a la información presentada por el proveedor y por el CAPC, con corte al cierre del mes de diciembre de 2012.',array(),array('align'=>'both'));
		
		/*Inicia el texto de cada SLA */
		$db->Query('select metrica, id_ver_metrica, sla.nombre, sla.idsla, sla.sla, sum(sla.cumplen) cumplen, sum(sla.totales) as totales, avg(sla.meta) meta,  ' .
					' sla.id_proveedor, sla.MesReporte, sla.AnioReporte, sla.Acronimo  ' .
					' from vw_Servicios_Proveedores vsp ' .
					'	left join vw_SLAs_v3 sla on sla.id_proveedor = vsp.id_proveedor ' .
					'		and vsp.id_ver_metrica = sla.idsla ' .
					'		and vsp.id_servicio = sla.id_servicio_cont  ' .
					'		and mesreporte =  ' . CCGetParam("s_MesReporte") . 
					'		and anioreporte = ' . CCGetParam("s_AnioReporte") .
				' where vsp.id_proveedor =  ' . CCGetParam("s_id_proveedor") .
				' and idSLA is not null ' .
				' group by metrica, id_ver_metrica, ' . 
				'	sla.nombre, sla.idsla, sla.sla, sla.id_proveedor, sla.MesReporte, sla.AnioReporte, sla.Acronimo  ' .
				' order by id_ver_metrica ');
		while($db->has_next_record()){
			$db->next_record();
			$section->addText($db->f("id_ver_metrica") . "-" . $db->f("metrica"),array('bold'=>true));
			if($db->f("totales")==0){
    			$section->addText('Para el mes de referencia el licitante adjudicado presenta el nivel de servicio sin datos para medir',array(),array('align'=>'both'));
    		} else {
				$NoCumplen = $db->f("totales") - $db->f("cumplen");
			    $Cumplimiento= $db->f("cumplen")/ $db->f("totales")*100;
			    if($Cumplimiento >= $db->f("meta") ){
			    	$section->addText('Para el mes de referencia el licitante adjudicado presenta el nivel de servicio como cumplido',array(),array('align'=>'both'));
			    	$textrun = $section->createTextRun(array('align'=>'both'));
			    	$textrun->addText('De Acuerdo',array('bold'=>true));
			    	$textrun->addText(' - Conforme a la revisión efectuada por el Modelo de Gobierno a la información presentada por este proveedor y al reporte de monitoreo del CAPC, así como a las herramientas de gestión; ' .
			    		'en este período iniciaron ' . $db->f("totales"). ' requerimientos de servicio de los cuales ' . $db->f("cumplen")  . ' cumplen con el nivel de servicio esperado ');
			    	$section->addText('La documentación se encuentra en el repositorio correspondiente.');
			    	$section->addText('');		
			    } else {
					$section->addText('Para el mes de referencia el licitante adjudicado presenta el nivel de servicio como incumplido',array(),array('align'=>'both'));		    	
			    	$textrun = $section->createTextRun(array('align'=>'both'));
			    	$textrun->addText('No Satisfactorio', array('bold'=>true)); 
			    	$textrun->addText(' - Conforme a la revisión efectuada por el Modelo de Gobierno a la información presentada por este proveedor y al reporte de monitoreo del CAPC, así como a las herramientas de gestión; ' .
			    		'en este período iniciaron ' . $db->f("totales") . ' requerimientos de servicio de los cuales ' . $NoCumplen . ' se encuentran fuera del rango de servicio esperado. ');
			    	$section->addText('La documentación se encuentra en el repositorio correspondiente.'); 
			    	$section->addText('Derivado de lo anterior, se hace de su conocimiento que el tope de la deductiva es del ___%, por cada uno de los servicios, sobre una base de _______ Unidades de Continuidad Operativa (UCO) para los mantenimientos menores, tal y como se detalla en el cuadro siguiente:',array(),array('align'=>'both'));
			    	$section->addText('');
			    	$dbSvc->Query ('select distinct sn.nombre serv_negocio from mc_calificacion_rs_SAT r ' .
	    				' left join mc_c_servicio sn on sn.id_servicio = r.id_servicio_negocio ' .
	    				' where r.id_proveedor = ' . ccgetparam("s_id_proveedor","") . '  and r.mesreporte = ' . ccgetparam("s_MesReporte","") . ' and anioreporte =' . ccgetparam("s_AnioReporte","") .
	    				' and ' . $db->f("Acronimo") . ' is not null and 1=0');
					//$sectable = $PHPWord->createSection(array('marginLeft' => 950));
					$tableSvc = $section->addTable('tblServicios');
					while($dbSvc->has_next_record()){
						$dbSvc->next_record();
						$tableSvc->addRow();
						$tableSvc->addCell(2500)->addText($dbSvc->f(0));
					}
					$section->addText('');
					$section->addText('');
					$section->addText('');
				}
			}
		}
		//$PHPWord->addFontStyle('myOwnStyle', array('name'=>'Verdana', 'size'=>14, 'color'=>'1B2232'));
		//$section->addText('Hello world! I am formatted by a user defined style', 'myOwnStyle');
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		$sFile= 'Predictament' .time() . '.doc';
		$objWriter->save($sFile);
	   	$Redirect = $sFile;
	} else {
		$Label1->SetValue('<link rel="stylesheet" type="text/css" href="Styles/Basic1/Style_doctype.css">');
	}
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-BE91216B
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GeneraDictamen; //Compatibility
//End Page_BeforeShow

//Custom Code @55-2A29BDB7
// -------------------------
    global $lblMesCierre;
    global $lblPeriodo ;
    setlocale(LC_ALL, 'esm');
    $sFecha = mktime(0,0,0,ccgetparam("s_MesReporte",date('m')),1,ccgetparam("s_AnioReporte",date('Y')));
    $lblPeriodo->SetValue ( '1 al 30 de ' . strftime('%B',$sFecha) . ' de ' . date('Y',$sFecha));
    $lblMesCierre->SetValue (strftime('%B',$sFecha) . ' de ' . date('Y',$sFecha));
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
