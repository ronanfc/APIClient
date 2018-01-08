<?php
/**
 * Created by PhpStorm.
 * User: Ronan
 * Date: 07/01/2018
 * Time: 18:36
 */


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" id="maincss-css" href="css/main.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">


    <script src="js/js.cookie.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/js/messages/messages.pt-br.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/validacao.js"></script>

    <style>


    </style>


    <script>

        Cookies.get('destination');
        Cookies.get('id_destination');
        Cookies.get('plano');

        Cookies.get('despesa');
        Cookies.get('bagagem');
        Cookies.get('preco');
        Cookies.get('limite');
        Cookies.get('limite');

        Cookies.get('idpartida');
        Cookies.get('idretorno');
        Cookies.get('id_email');
        Cookies.get('id_celular');
        Cookies.get('id_nome');

        $(document).ready(function () {


            $.ajax({
                url: "api.php",
                type: 'GET',
                dataType: "html",
                data: {
                    u: 'products',
                    c: Cookies.set("codigo")

                },
                success: function(data) {
                    $('#detalhes').html(data).show();
                },

                error: function(e)
                {
                    console.log(result);
                }

            });


            $('#bt_comprar').click(function() {
                window.print();
                return false;
            });



        });



    </script>

</head>
<body class="imagem img-responsive">
<div class="clearfix headsearch text-center table-transp">
    <h1>Seguros Promo </h1>
</div>

<div class="row-fluid search-container_results ">
    <div class="search-result">
        <div class="container table-color">

            <div class="row-fluid clearfix ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 infodetailplan"><h3>Dados Pessoais</h3>
                        <i class="label-icon fa fa-user" aria-hidden="true"></i> Nome: <script> window.document.write(Cookies.get('id_nome')); </script> &nbsp;&nbsp; &nbsp;
                        <i class="label-icon fa fa-envelope" aria-hidden="true"></i> E-mail:  <script> window.document.write(Cookies.get('id_email')); </script> &nbsp; &nbsp; &nbsp;
                        <i class="label-icon fa fa-phone" aria-hidden="true"></i> Telefone:  <script> window.document.write(Cookies.get('id_celular')); </script><br>

                    </div>
                </div>
            </div>
        </div>
        <div style="padding: 2px;"></div>
        <div class="container table-color">

            <div class="row-fluid clearfix ">

                    <div class="row">
                        <div class="col-md-5 col-sm-7 col-xs-12 infodetailplan"><h3>Resumo da sua compra</h3>
                            <i class="label-icon fa fa-ticket" aria-hidden="true"></i> Seguradora: <script> window.document.write(Cookies.get('seguradora')); </script><br>
                            <i class="label-icon fa fa-map-marker" aria-hidden="true"></i> Destino:  <script> window.document.write(Cookies.get('destination')); </script><br>

                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 infodetailplan">
                            <h3 class="hidden-xs">&nbsp;</h3>
                            <i class="label-icon fa fa-calendar" aria-hidden="true"></i> Início: <script> window.document.write(Cookies.get('idpartida')); </script><br>
                            <i class="label-icon fa fa-calendar" aria-hidden="true"></i> Término: <script> window.document.write(Cookies.get('idretorno')); </script><br>
                            <i class="label-icon fa fa-heart" aria-hidden="true"></i> Idade:  <script> window.document.write(Cookies.get('limite')); </script><br>

                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-12 infodetailplan">

                                <h3><strong> <script> window.document.write(Cookies.get('preco')); </script></strong></h3>

                            <button id="bt_comprar" class="btn btn-yellow"><span>Comprar</span> </button>

                        </div>
                    </div>
            </div>

        </div>

    </div>

              <div class="row-fluid detailplan clearfix">
                  <div class="container listheight clearfix table-transp">
                      <div class="container listheight clearfix"> <br>  </div>
                      <div id="detalhes">
                          <div style="padding: 20px; text-align: center;"><i class="fa fa-spinner fa-spin fa-5x fa-fw"></i></div>
                      </div>


                  </div>
              </div>


</div>





</body>
</html>

