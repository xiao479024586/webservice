<?php
class AuthHeader
{
    public $auth_token;   
}
$client = new SoapClient("http://localhost/webservice1/soap/wsdl.php?wsdl",array('soap_version'=> SOAP_1_2));
try{
	
	$AuthHeader = new AuthHeader();

	$AuthHeader->auth_token = 'foo';

	$Headers[] = new SoapHeader('http://localhost/', 'AuthHeader', $AuthHeader);

	$client->__setSoapHeaders($Headers);

       $result = $client->test();
	   echo $result . "<br />"; 
	   $result = $client->add("1","2");
	   echo $result. "<br />";
	   $result = $client->set("2","2");
	   echo $result. "<br />";
}catch (SoapFault $f){
        echo "Error Message: {$f->getMessage()}";
}


?>
