<?php
//BindEvents Method @1-6A6248BD
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//Page_AfterInitialize @1-96E74979
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ListaEntregablesSharePoint; //Compatibility
//End Page_AfterInitialize

//Custom Code @2-2A29BDB7
// -------------------------
	global $DBcnDisenio;
	global $lDocs;
	
	$DBcnDisenio= new clsDBcnDisenio;
	$DBcnDisenio->query('SELECT UrlSharepoint, GUID_Lista, GUID_Vista, GUID_WebId , numero ' .
		' from mc_c_proveedor inner join mc_universo_cds on mc_universo_cds.id_proveedor = mc_c_proveedor.id_proveedor ' .
		' where id  = ' . CCGetParam("sID",0) );		
	if($DBcnDisenio->has_next_record()){
		$DBcnDisenio->next_record();
	}
	$result = CallSOAPCurl("ListItems",$DBcnDisenio->f("numero"),$DBcnDisenio->f("UrlSharepoint") , $DBcnDisenio->f("GUID_Lista"), $DBcnDisenio->f("GUID_Vista"), $DBcnDisenio->f("GUID_WebId"));
	if(CCGetUserLogin()=="omendoza"){
		echo $result;
		}
	if($result!=""){
	// se procesan los resultados para mostrar información del elemento
	$doc = new DOMDocument();
	$doc->loadXML($result);
	$nodos=$doc->getElementsByTagName("row");
	$sItems = '<table class="Record" cellspacing="0" cellpadding="0" width="60%">';
	for ($item=0; $item < $nodos->length; $item++){
		//si tiene más de una versión va por el historial
		$sVersiones="";
		/*
		if($nodos->item($item)->getAttribute('ows_owshiddenversion')!='1') {
			$versiones = CallSOAPCurl("ItemVersions",$nodos->item($item)->getAttribute('ows_ID'));
			$vdoc = new DOMDocument();
			$vdoc->loadXML($versiones);
			$nVersion = $vdoc->getElementsByTagName("Version");
			$sVersiones='<table class="Record" cellspacing="0" cellpadding="0">';
			for ($vitem=0; $vitem < $nVersion->length; $vitem++){
				$sVersiones = $sVersiones . '<tr class="Controls">';
				$sVersiones = $sVersiones. "<td>" . $nVersion->item($vitem)->getAttribute('ows_FileLeafRef') . "</td>";
				$sVersiones = $sVersiones. "<td>" . $nVersion->item($vitem)->getAttribute('Modified'). "</td>";
				$sVersiones = $sVersiones. "</tr>";
			}	
			$sVersiones = $sVersiones. "</table>";
			$sItems = $sItems . '<tr class="Controls"><td colspan=3>' .  $sVersiones . '</td></tr>';
		} else {*/
			if ($item==0){
				//$sItems = $sItems . '<tr class="Controls"><td colspan="3">' . substr(strstr($nodos->item($item)->getAttribute('ows_FileRef'),'#'),1,strrpos(substr(strstr($nodos->item($item)->getAttribute('ows_FileRef'),'')) . "</td></tr>";
			}
			if(($item % 2)==0){
				$bckColor = "rgb(218,224,228)";
			} else {
				$bckColor ='rgb(242,242,243)';
			}
			$sItems = $sItems . '<tr class="Controls">';
			$sItems = $sItems . '<td style="background-color:' . $bckColor .'"><div style="width:620px;overflow:auto"><a href="http://satportal.dssat.sat.gob.mx/' . substr($nodos->item($item)->getAttribute('ows_FileRef'),strpos($nodos->item($item)->getAttribute('ows_FileRef'),"#")+1) . '">' . $nodos->item($item)->getAttribute('ows_LinkFilename') . $sVersiones . "</a></div></td>";
			$sItems = $sItems . '<td style="background-color:' . $bckColor .'" width="20px"><a target="_blank" href="' . $DBcnDisenio->f("UrlSharepoint") . '/_layouts/versions.aspx?FileName=/'. rawurlencode(substr($nodos->item($item)->getAttribute('ows_FileRef'),strpos($nodos->item($item)->getAttribute('ows_FileRef'),"#")+1))  . '&listid=' . $DBcnDisenio->f("GUID_Lista") . '">' . $nodos->item($item)->getAttribute('ows_owshiddenversion'). '</a></td>';
			$sItems = $sItems . '<td style="background-color:' . $bckColor .'" width="90px">' . CCFormatDate(CCParseDate(substr(strstr($nodos->item($item)->getAttribute('ows_Created_x0020_Date'),'#'),1),array("yyyy","-","mm","-","dd"," ","HH",":","nn",":","ss")),array("dd","/","mm","/","yyyy"," ","HH",":","nn")) . "</td>";
			$sItems = $sItems . '</tr>';
		//}
	}
	$sItems = $sItems . "</table>";
	$lDocs->SetValue(iconv('UTF-8','Windows-1252', $sItems));
}
// -------------------------
//End Custom Code

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize

//Page_OnInitializeView @1-0071B47A
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ListaEntregablesSharePoint; //Compatibility
//End Page_OnInitializeView

//Custom Code @3-2A29BDB7
// -------------------------
 	
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

function CallSOAPCurl($tipoquery,$ItemId, $URLSahrepoint, $GUID_Lista, $GUID_Vista, $GUID_WebId){
	global $dbSOAPIds;
	global $sPPMC;
	$sPPMC=$ItemId;
	// para información de la implementación buscar en internet CURL SOAP NTLM
	switch ($tipoquery){
		case "ListItems":
			// arma la petición de la lista de elementos
			$post_string='<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
			  '<soap:Body>'.
			  '  <GetListItems xmlns="http://schemas.microsoft.com/sharepoint/soap/">'.
			  '    <listName>' . $GUID_Lista . '</listName>'.
			  '		<viewName>' . $GUID_Vista . '</viewName>'.
			  '    <rowLimit>500</rowLimit>'.
			  '		<query><Query><Where>' .
			  '		<And>' .
			  '			<Eq><FieldRef Name="FSObjType" /><Value Type="Lookup">0</Value></Eq> '.
			  '			<And><Contains><FieldRef Name="FileRef" /><Value Type="Text">' . $sPPMC  . '</Value></Contains> '.
			  '				 <Contains><FieldRef Name="FileRef" /><Value Type="Text">Sistema</Value></Contains> '.
			  '			</And>' .
			  '		</And></Where></Query></query> '.
			  '	   <queryOptions> '.
			  '      <QueryOptions> '.
			  '         <ViewAttributes Scope="RecursiveAll"/> '.
			  '       </QueryOptions> '.
			  '     </queryOptions> '.
			  '    <webID>' . $GUID_WebId . '</webID>'.
			  '  </GetListItems>'.
			  '</soap:Body>'.
			'</soap:Envelope>';			
			break;
		case "ItemVersions":
			$post_string='<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
			 ' <soap:Body>'.
			 '   <GetVersionCollection xmlns="http://schemas.microsoft.com/sharepoint/soap/">'.
			 '     <strlistID>' . $GUID_Lista . '</strlistID>'.
			 '     <strlistItemID>' . $ItemId . '</strlistItemID>'.
			 '	   <strFieldName>ows_FileLeafRef</strFieldName> '.
			 '   </GetVersionCollection>'.
			 ' </soap:Body> '.
			'</soap:Envelope>';
			break;
		}
	
	//se indica la ruta del servicio 
	$url= $URLSahrepoint . "/_vti_bin/Lists.asmx";
	//información de autenticación
	$db= new clsDBcnDisenio;
	$db->query('SELECT UsrSharePoint, PwdSharePoint ' .
					' FROM mc_c_usuarios u WHERE u.Id = ' . CCGetUserId());
	
	if($db->next_record()){
    	$usr= $db->f(0);
    	$pwd= $db->f(1);
    }
	$db->close();	
	$curl = curl_init();
 	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_URL, $url);
 	curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
 	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
 	curl_setopt($curl, CURLOPT_USERPWD, $usr . ':' . $pwd);
 	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 	curl_setopt($curl, CURLOPT_HTTPHEADER,     array('Content-Type: text/xml; charset=utf-8', 'Content-Length: '.strlen($post_string) ));
 	curl_setopt($curl, CURLOPT_POSTFIELDS,    $post_string); 
 	$result = curl_exec($curl);
 	curl_close($curl);
	return $result;
}

?>