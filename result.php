<?php
/**
 * Created by PhpStorm.
 * User: Ronan
 * Date: 07/01/2018
 * Time: 19:35
 */

$user = 'illager';
$pass = 'evoker@111';

$token = 'aWxsYWdlcjpldm9rZXJAMTEx';

$url = 'staging.segurospromo.com.br/emitir-seguros/v0/';

foreach($_GET as $campos => $valor){
    $comando = "\$" . $campos . "='" . $valor . "';";
    echo  eval($comando);
}

if(isset($_GET['p'])){
    $data = array("begin_date" => $p, "end_date" => $r, "destination" => $d);
# Setup request to send json via POST.
    $payload = json_encode(  $data );

}



header("Content-Type: application/json; charset=utf-8");
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt( $ch, CURLOPT_HEADER, 0 );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $token) );
if(isset($_GET['p'])) {
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
}
//curl_exec( $ch );
//$resposta = ob_get_contents();
//ob_end_clean();
//$httpCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
//curl_close( $ch );

# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$resposta = curl_exec($ch);
curl_close($ch);

echo $resposta;