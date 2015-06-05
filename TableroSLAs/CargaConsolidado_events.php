<?php
//BindEvents Method @1-D40060DD
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//Page_BeforeShow @1-412EBB92
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CargaConsolidado; //Compatibility
//End Page_BeforeShow

//Custom Code @2-2A29BDB7
// -------------------------
    global $xlsx;
    $iSheets=1;
    $iHEstimaciones=-1;
    $iHProyectos=-1;
    $iHROS=-1;
    
    $xlsx = new SimpleXLSX('assets/Informacion_Consolidada151113.xlsx');
	if ($xlsx->success()){
		for($iSheets=1; $iSheets<=$xlsx->sheetsCount(); $iSheets++ ){
			if(strtolower($xlsx->sheetName($iSheets)) == "estimaciones")
				$iHEstimaciones = $iSheets;
		}
		
		//Para la hoja es estimaciones se filtra para las aprobadas en el mes de medición
		$iColEdoEst = 0;
		$iColEdoReq = 0;
		$iColFechaApb = 0;
		list($num_cols, $num_rows) = $xlsx->dimension($iHEstimaciones);
		$aFilas = $xlsx->rows($iHEstimaciones);
		//solo para la primer fila se revisan los encabezados
		for( $i=1; $i < $num_cols; $i++ ){ // buscamos los indices de las columnas para filtrar
			if(strtolower(utf8_decode($aFilas[0][$i])) == "estado requerimiento")
				$iColEdoReq = $i;
			if(strtolower($aFilas[0][$i]) == "estado estimacion")
				$iColEdoEst = $i;
			if(strtolower($aFilas[0][$i]) == "fecha aprobacion")
				$iColFechaApb = $i;				
		} // terminamos de obtener los indices de las columnas para filtrar			
		echo '<table border=1>';
		for( $i=2; $i < $num_rows; $i++ ) {
			// se barren las filas filtrando por los valores deseados
			// se compara el valor del estado del requerimiento y de la estimación
			$dFechaApb = new DateTime('12/30/1899');
			$dFechaApb->add(new DateInterval('P' . floor($aFilas[$i][$iColFechaApb]) .'D'));
			if($dFechaApb->format('m-Y') == "10-2013" && strtolower(utf8_decode($aFilas[$i][$iColEdoReq])) == "estimación aprobada" && strtolower(utf8_decode($aFilas[$i][$iColEdoEst]))!= "rechazada"){
				echo '<tr>' ;
				for( $j=0; $j < $num_cols; $j++ ){
					echo '<td>'.( (!empty($aFilas[$i][$j])) ? utf8_decode($aFilas[$i][$j]) : '&nbsp;' ).'</td>';
				}
				echo '</tr>';
			}
		}
		echo '</table>';
	}
	
	
	
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
