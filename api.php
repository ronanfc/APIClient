<?php
/**
 * Created by PhpStorm.
 * User: Ronan
 * Date: 07/01/2018
 * Time: 16:01
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
if(isset($_GET['c'])){
    $data = array("code" => $c);
# Setup request to send json via POST.
    $payload = json_encode(  $data );
}



if(isset($_GET['u'])){
    switch ($u) {
        case 'destinations':
            $url.= 'additional-info/destinations' ;
            break;
        case 'quotations':
            $url.= 'quotations' ;
            break;
        case "products":
            $url.= 'products/'.$c ;
            break;
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



    if($u=='quotations' ){

//        print_r($decode = json_decode( $resposta, TRUE ));
        $decode = json_decode( $resposta, TRUE );
        $mostrar= '';
        $contcor = 0;
        foreach ( $decode as $valor){
            $provider_name =  $valor['provider_name'];
            $code =  $valor['code'];
            $min_age_adult =  $valor['adult']['min_age'];
            $max_age_adult =  $valor['adult']['max_age'];
            $price_adult =  number_format($valor['adult']['price'], 2, ',', '.');
            $name =  $valor['name'];
            if($contcor==0){
               $contcor=1;
               $corlinha = "style='background: #FFFFFF'";
            }else{
                $corlinha = "";
                $contcor=0;
            }

            $mostrar .= '<div class="container-fluid" '.$corlinha.'>
                                                   <div class="row">
                                                       <div class="col-md-2 text-danger"><h3 id="seguradora'.$code.'">'.$provider_name.'</h3></div>
                                                        <div class="col-md-2"><h6 id="plano'.$code.'">'.$name.'</h6></div>
                                                        <div class="col-md-2"><h6 id="despesa'.$code.'">USD 35.000</h6></div>
                                                        <div class="col-md-2"><h6 id="bagagem'.$code.'">USD 1.200 COMPLEMENTAR </h6></div>
                                                        <div class="col-md-4"><h5 class="text-left text-success"  id="preco'.$code.'">R$ '.$price_adult.'</h5>
                                                            <div class="text-right">
                                                            <input type="button" class="btn btn-success" name="'.$code.'" value="Selecionar" onclick="Selecionado(this.name)">
                                                            <br>
                                                            <h3 style="margin-top: 5px;"><small><span class="text-small" id="limite'.$code.'">Limite '.$min_age_adult.' a '.$max_age_adult.' anos</span></small></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';

        }

         echo $mostrar;
    }else if($u=='products') {
       //print_r($decode = json_decode( $resposta, TRUE ));
        $decode = json_decode( $resposta, TRUE );
        $mostrar= '';
        $contcor = 0;

        //$mostrar .= $decode ['terms_url'];
        foreach ( $decode as $valor){

            if(is_array($valor)){
                //print_r($valor);
                $cont = 0;

            foreach ( $valor as $val){

                $name =  $val['name'];
                $coverage =  $val['coverage'];

                    if($cont==0){
                         $category_old =  $val['category_name'];
                         $category_new =  $val['category_name'];
                         $mostrar .= '<div class="row-fluid">
                                  <div class="col-md-12 title_detailplan clearfix table-color">'.$category_new.'</div>
                                  </div>';
                    }else{
                        $category_new =  $val['category_name'];

                    }

                    if($category_old!=$category_new) {
                        $mostrar .= '<div class="row-fluid">
                                  <div class="col-md-12 title_detailplan clearfix table-color">'.$category_new.'</div>
                                  </div>';
                        $category_old=$category_new;
                    }

                    $mostrar .= '<div class="container ">
                                  <div class="row table-color-white">
                                  <div class="col-md-12 col-sm-8 col-xs-8">
                                  <a style="cursor: pointer;"><i class="fa fa-info-circle"></i></a>&nbsp;'.$name.'
                                
                                    <div class="text-right">'.$coverage.'</div>
                              </div>
                                  </div>
                                  </div>';

                $cont = 1;

            }

            }


        }
        echo $mostrar;

    }else{

        echo $resposta;
    }




}