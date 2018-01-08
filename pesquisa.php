<?php
/**
 * Created by PhpStorm.
 * User: Ronan
 * Date: 06/01/2018
 * Time: 18:36
 */

function FormatData($data){
    $ano= substr($data, 6);
    $mes= substr($data, 3,-5);
    $dia= substr($data, 0,-8);
    return $ano."-".$mes."-".$dia;
}

foreach($_POST as $campos => $valor){
    $comando = "\$" . $campos . "='" . $valor . "';";
    eval($comando);
}
if (isset($partida)){
$p = FormatData($partida);
$r = FormatData($retorno);

}else{
    header("Location: index.php");
}

//$p = str_replace("/", "-", $partida);
//$r = str_replace("/", "-", $retorno);
//echo $p = date('Y-m-d', strtotime($p));
//echo $r = date('Y-m-d', strtotime($retorno));
//$p = date_format($partida, 'Y-m-d');
//$r = date_format($retorno, 'Y-m-d');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" id="maincss-css" href="css/main.css" type="text/css" media="all">

    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script src="js/js.cookie.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/js/messages/messages.pt-br.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/validacao.js"></script>

    <style>
        .imagem{
            background: #5bc0de;
            background-image: url("imagens/praia1.jpg");
            background-repeat: no-repeat;
        }
        .table-color{
             background: rgba(66,66,111, 1);
             text-align: center;
             color: #FFFFFF;
         }



        .table-transp{
            background: rgba(255, 255, 255, 0.6);
        }

        @media only screen and (max-width:768px){
            .cab {
                display: none;
            }
        }
        .text-small{
            font-size: small;
        }

    </style>

</head>
<body class="imagem img-responsive">
<div class="clearfix headsearch text-center table-transp">
    <h1>Seguros Promo </h1>
</div>
<form id="formdestino" action="pesquisa.php" method="post">
<div class="row-fluid filter clearfix bgsearchresult hidden-xs table-transp" >
        <div class="container">
        <div class="row clearfix visible-xs">
            <div class="col-xs-12 closeframe">
                <h6>Altere sua pesquisa:</h6>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 frame-style ">
                <div class="row frame-one repesquisa">
                    <div class="col-md-4 col-sm-3 pr0">
                        <div class="form-group">
                            <select class="form-control selectdestiny" style="margin-bottom: 0.7em;" id="id_destination" name="destination">
                                <option>Carregando...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4 col-sm-3  pr0">
                                <div class="form-group">
                                    <div class="react-datepicker__input-container"><input type="text" id="idpartida" name="partida" value="<?php echo $partida ?>" class="form-control"></div><i class="fa fa-calendar"></i></div>
                            </div>
                            <div class="col-md-4 col-sm-3 col-xs-12 pr0">
                                <div class="form-group">
                                    <div class="react-datepicker__input-container"><input type="text" id="idretorno" name="retorno" value="<?php echo $retorno ?>" class="form-control"></div><i class="fa fa-calendar"></i></div>
                            </div>
                            <div class="col-md-offset-0 col-md-4 col-sm-offset-0 col-sm-3 col-xs-offset-6 col-xs-6  "><button id="bt_continuar" class="btn btn-block btn-yellow"><span>Compare</span></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="search-result"></div>
        </div>
    </div>
</div>
</form>

<div class="row-fluid search-container_results">
    <div class="search-result">
        <div class="clearfix headsearch text-center table-transp">
            <h1>Encontre abaixo as melhores opções de seguro viagem para: </h1>
            <span><i class="fa fa-users" aria-hidden="true"></i><!-- react-text: 99 -->&nbsp; Destino: <label id="destino"></label> </span><span>&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i><!-- react-text: 107 -->&nbsp; Saída: <?php echo $partida ?><span> &nbsp;<i class="fa fa-calendar" aria-hidden="true"></i><!-- react-text: 111 -->&nbsp; Retorno: <?php echo $retorno ?></span>
        </div>
        <div class="container filter_results hidden-xs">

        </div>
        <div class="container container-xs">
            <div class="table-responsive search_results_table">
                <table class="table table-bordered">
                    <thead class="cab">
                    <tr>
                        <th class="table-color">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-2">SEGURADORA</div>
                                    <div class="col-md-2">PLANO</div>
                                    <div class="col-md-2">DESPESA MÉDICA HOSPITALAR TOTAL</div>
                                    <div class="col-md-2">SEGURO BAGAGEM</div>
                                    <div class="col-md-4">TOTAL POR SEGURADO</div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr style="text-align: center; padding: 20px 0px; background-color: rgba(238, 240, 236, 0.8);">
                            <td>
                                <div id="result">
                                    <div style="padding: 20px;"><i class="fa fa-spinner fa-spin fa-5x fa-fw"></i></div>
                                </div>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div></div>
    </div>
</div>
<div>


</body>
</html>


<script>
    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#idpartida').datepicker({
        locale: 'pt-br',
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        minDate: today,
        maxDate: function () {
            return $('#idretorno').val();
        }

    });
    $('#idretorno').datepicker({
        locale: 'pt-br',
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        minDate: function () {
            return $('#idpartida').val();
        }
    });


    $(document).ready(function () {
        $.getJSON('api.php?u=destinations', function (dados){

            var option;
            var destino;
            $.each(dados, function(i, obj){
                if (obj.slug== '<?php echo $destination ?>'){
                    option += '<option value="'+obj.slug+'" selected>'+obj.name+'</option>';
                    destino = obj.name;
                }else{
                    option += '<option value="'+obj.slug+'">'+obj.name+'</option>';
                }
            })
            $('#id_destination').html(option).show();
            $('#destino').html(destino).show();
        });

        $.ajax({
            url: "api.php",
            type: 'GET',
            dataType: "html",
            data: {
                u: 'quotations',
                d: '<?php echo $destination ?>',
                p: '<?php echo $p ?>',
                r: '<?php echo $r ?>'

            },
            success: function(data) {
                $('#result').html(data).show();
            },

            error: function(e)
            {
                console.log(result);
            }

        });




    });

    function Selecionado(Code)
    {
        Cookies.set('codigo', Code, 1);
        Cookies.set('plano', document.getElementById("plano"+Code).innerHTML, 1);
        Cookies.set('seguradora', document.getElementById("seguradora"+Code).innerHTML, 1);
        Cookies.set('despesa', document.getElementById("despesa"+Code).innerHTML, 1);
        Cookies.set('bagagem', document.getElementById("bagagem"+Code).innerHTML, 1);
        Cookies.set('preco', document.getElementById("preco"+Code).innerHTML, 1);
        Cookies.set('limite', document.getElementById("limite"+Code).innerHTML, 1);
        Cookies.set('destination', document.getElementById("destino").innerHTML);

        window.location = 'pedido.php';

    }



</script>