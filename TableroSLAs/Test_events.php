<?php
//BindEvents Method @1-6A6248BD
function BindEvents()
{
    global $CCSEvents;
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//Page_AfterInitialize @1-992FFD53
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Test; //Compatibility
//End Page_AfterInitialize

//Custom Code @2-2A29BDB7
// -------------------------
	phpinfo();
	global $db;
	$db = new clsDBcnDisenio;
/*
	$db->query("SELECT REPLACE([SOL_CVE_ALFA],'PPMC-','') Clave, [PAQ_CVE_ALFA], " .
				" [MOV_CVE],  FechaIncial, FechaFinal,Intento,substring(Proceso,1,250),substring(Solucion,1,250) ,substring([TER_DESC],1,250) , " .
				" c_rdl,PAQ_CVE_FOL, '2014-04-30',substring(Resultado,1,250) " .
				" FROM OPENROWSET('Microsoft.ACE.OLEDB.12.0','Excel 12.0; " .
				" Database=\\172.16.8.10\c$\ReportesMC\IncidenciasMonitor_29052014.xlsx;HDR=YES;IMEX=1', " .
				"'SELECT * FROM [Sheet1$] " .
				"	WHERE  SOL_CVE_ALFA like ''%PPMC%80354'' " .
				"	')");
	if($db->next_record())
		echo $db->f(1);
 	$db->close();
 	*/
 	
 	$para      = 'omendoza@hotmail.com';
$titulo    = 'El título';
$mensaje   = 'Hola';
$cabeceras = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

//mail($para, $titulo, $mensaje, $cabeceras);

    $post_header='<soapenv:Header> ' .
    '  <urn:AuthenticationInfo> ' .
    '     <urn:userName>CONT_ITE02</urn:userName> ' .
    '     <urn:password>CONT_ITE02</urn:password>' .
    '  </urn:AuthenticationInfo>' .
   '</soapenv:Header>' ;
   
   $post_body= '<soapenv:Body>' .
   '   <urn:HelpDesk_QueryList_Service>' .
   '      <urn:Qualification></urn:Qualification>' .
   '      <urn:startRecord>1</urn:startRecord>' .
   '      <urn:maxLimit>5</urn:maxLimit>' .
   '   </urn:HelpDesk_QueryList_Service>' .
   '</soapenv:Body>' ;


$post_string='<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"> ' .
	'  <soap:Body> ' .
	'       <GetListCollection xmlns="http://schemas.microsoft.com/sharepoint/soap/" />'.
	'  </soap:Body></soap:Envelope> ';
    
    $post_stringx='<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
			  '<soap:Body>'.
 				 '<GetViewCollection xmlns="http://schemas.microsoft.com/sharepoint/soap/">'.
      			' <listName>9FD110DC-6505-40F5-88B8-6A67E53C2857</listName>'.
    			'</GetViewCollection>'.
			  '</soap:Body>'.
			'</soap:Envelope>';			
			
 	$post_string='<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">'.
			  '<soap:Body>'.
			  '  <GetListItems xmlns="http://schemas.microsoft.com/sharepoint/soap/">'.
			  '    <listName>9FD110DC-6505-40F5-88B8-6A67E53C2857</listName>'.
			  '		<viewName>30A4D873-C402-439A-9875-73D952BB829D</viewName>'.
			  '    <rowLimit>500</rowLimit>'.
			  '		<query><Query><Where>' .
			  '		<And>' .
			  '			<Eq><FieldRef Name="FSObjType" /><Value Type="Lookup">0</Value></Eq> '.
			  '			<And><Contains><FieldRef Name="FileRef" /><Value Type="Text">89327</Value></Contains> '.
			  '				 <Contains><FieldRef Name="FileRef" /><Value Type="Text">Proy</Value></Contains> '.
			  '			</And>' .
			  '		</And></Where></Query></query> '.
			  '	   <queryOptions> '.
			  '      <QueryOptions> '.
			  '         <ViewAttributes Scope="RecursiveAll"/> '.
			  '       </QueryOptions> '.
			  '     </queryOptions> '.
			  '    <webID>67d59dc6-3137-4a0d-b4d1-09c5d3271281</webID>'.
			  '  </GetListItems>'.
			  '</soap:Body>'.
			'</soap:Envelope>';			
 	$result=CallSOAPCURL($post_string);
 	var_dump($result);
 	
 	
/* 	
        // Prepare SoapHeader parameters
        $sh_param = array(
                    'Username'    =>    'CONT_ITE02',
                    'Password'    =>    'CONT_ITE02');
        $headers = new SoapHeader('https://remedy.sat.gob.mx/arsys/services/ARService?server=remedyservergroup&webService=HPD_IncidentInterface_WS', 'UserCredentials', $sh_param);
   
        
 	 $soapClient = new SoapClient("https://remedy.sat.gob.mx/arsys/WSDL/public/remedyservergroup/HPD_IncidentInterface_WS",array(
                    'Username'    =>    'CONT_ITE02',
                    'Password'    =>    'CONT_ITE02',
                    'Trace' => true));
                    
echo("<pre>"); //to format it legibly on your screen
var_dump($client->__getLastRequestHeaders()); //the headers of your last request
var_dump($client->__getLastRequest()); //your last request

var_dump($client->__getLastResponseHeaders()); //response headers
var_dump($client->__getLastResponse()); //the response
   
        // Prepare Soap Client
        $soapClient->__setSoapHeaders(array($headers));
   
        // Setup the RemoteFunction parameters
        $ap_param = array('Qualification'     =>    '','startRecord'=>1,'maxLimit'=>100);
                   
        // Call RemoteFunction ()
        $error = 0;
        try {
            $info = $soapClient->__call("HelpDesk_QueryList_Service", array($ap_param));
        } catch (SoapFault $fault) {
            $error = 1;
            print("
            alert('Sorry, blah returned the following ERROR: ".$fault->faultcode."-".$fault->faultstring.". We will now take you back to our home page.');
            window.location = 'main.php';
            ");
        }
       
        if ($error == 0) {       
            $auth_num = $info->RemoteFunctionResult;
           var_dump($auth_num);
                unset($soapClient);
    }    
 */   
 	die();
// -------------------------
//End Custom Code

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize

//Page_OnInitializeView @1-AAD74194
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Test; //Compatibility
//End Page_OnInitializeView

//Custom Code @3-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

function get_inner_html( $node ) {
    $innerHTML= '';
    $children = $node->childNodes;
    foreach ($children as $child) {
        $innerHTML .= $child->ownerDocument->saveXML( $child );
    }
    return $innerHTML;
}

class NTLM_SoapClient extends SoapClient { 
    
    public function __construct($wsdl, $options = array()) { 
        if (empty($options['proxy_login']) || empty($options['proxy_password'])) throw new Exception('Login and password required for NTLM authentication!'); 
        $this->proxy_login = $options['proxy_login']; 
        $this->proxy_password = $options['proxy_password']; 
        $this->proxy_host = (empty($options['proxy_host']) ? 'localhost' : $options['proxy_host']); 
        $this->proxy_port = (empty($options['proxy_port']) ? 8080 : $options['proxy_port']); 
        parent::__construct($wsdl, $options); 
    } 
    
    /** 
     * Call a url using curl with ntlm auth 
     * 
     * @param string $url 
     * @param string $data 
     * @return string 
     * @throws SoapFault on curl connection error 
     */ 
    protected function callCurl($url, $data) { 
    $handle   = curl_init(); 
    curl_setopt($handle, CURLOPT_HEADER, false); 
    curl_setopt($handle, CURLOPT_URL, $url); 
    curl_setopt($handle, CURLOPT_FAILONERROR, true); 
    curl_setopt($handle, CURLOPT_HTTPHEADER, Array("PHP SOAP-NTLM Client") ); 
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($handle, CURLOPT_POSTFIELDS, $data); 
    curl_setopt($handle, CURLOPT_PROXYUSERPWD,$this->proxy_login.':'.$this->proxy_password); 
    curl_setopt($handle, CURLOPT_PROXY, $this->proxy_host.':'.$this->proxy_port); 
    curl_setopt($handle, CURLOPT_PROXYAUTH, CURLAUTH_NTLM); 
    $response = curl_exec($handle); 
    if (empty($response)) { 
      throw new SoapFault('CURL error: '.curl_error($handle),curl_errno($handle)); 
    } 
    curl_close($handle); 
    return $response; 
    } 
    
    public function __doRequest($request,$location,$action,$version,$one_way = 0) { 
        return $this->callCurl($location,$request); 
    } 
    
}

function CallSOAPCURL($post_string){
$usr = 'rarp6837';
$pwd = 'Mexico.0515';

$url="http://satportal.dssat.sat.gob.mx/agcti/SDMA4/_vti_bin/Lists.asmx";
//$url="http://satportal.dssat.sat.gob.mx/agcti/SDMA4/_vti_bin/SiteData.asmx";

//Initialize a cURL session
 $curl = curl_init();
//Return the transfer as a string of the return value of curl_exec() instead of outputting it out directly
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//Set URL to fetch
 curl_setopt($curl, CURLOPT_URL, $url);
//Force HTTP version 1.1
 curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
//Use NTLM for HTTP authentication
 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
//Username:password to use for the connection
 curl_setopt($curl, CURLOPT_USERPWD, $usr . ':' . $pwd);
//Stop cURL from verifying the peer’s certification
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_HTTPHEADER,     array('Content-Type: text/xml; charset=utf-8','SOAPAction: "http://schemas.microsoft.com/sharepoint/soap/GetListItems"','Content-Length: '.strlen($post_string) ));
 curl_setopt($curl, CURLOPT_POSTFIELDS,    $post_string); 
//Execute cURL session
 $result = curl_exec($curl);
//Close cURL session
 curl_close($curl);
return $result;	
	}

function getPageURL() 
{ 
    $PageUrl = $_SERVER["HTTPS"] == "on"? 'https://' : 'http://'; 
    $uri = $_SERVER["REQUEST_URI"]; 
    $index = strpos($uri, '?'); 
    if($index !== false) 
    { 
         $uri = substr($uri, 0, $index); 
    } 
    $PageUrl .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $uri; 
    return $PageUrl; 
}





function CallSOAPCURL_remedy($post_header,$post_body){
$usr = 'CONT_ITE02';
$pwd = 'CONT_ITE02';


$url="https://remedy.sat.gob.mx/arsys/WSDL/public/remedyservergroup/HPD_IncidentInterface_WS";

//Initialize a cURL session
 $curl = curl_init();
//Return the transfer as a string of the return value of curl_exec() instead of outputting it out directly
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//Set URL to fetch
 curl_setopt($curl, CURLOPT_URL, $url);
//Force HTTP version 1.1
 curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
//Use NTLM for HTTP authentication
 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
//Username:password to use for the connection
 curl_setopt($curl, CURLOPT_USERPWD, $usr . ':' . $pwd);
//Stop cURL from verifying the peer’s certification
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_HTTPHEADER,     array('Content-Type: text/xml; charset=utf-8', 'Content-Length: '.strlen($post_string) ));
 curl_setopt($curl, CURLOPT_POSTFIELDS,    $post_string); 
//Execute cURL session
 $result = curl_exec($curl);
//Close cURL session
 curl_close($curl);
return $result;	
	}

?>

