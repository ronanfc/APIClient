<?php
/**
 * Created by PhpStorm.
 * User: Ronan
 * Date: 07/01/2018
 * Time: 08:26
 */
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" id="maincss-css" href="css/main.css" type="text/css" media="all">

    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.7.3/dist/combined/js/messages/messages.pt-br.js" type="text/javascript"></script>

    <script src="js/js.cookie.js"></script>
    <script src="js/jquery.mask.min.js"></script>

    <script type="text/javascript" src="js/validacao.js"></script>

    <style>
        .imagem{
            background-image: url("imagens/hotel.JPG");
        }
        .table-transp{
            background: rgba(255, 255, 255, 0.6);
        }

    </style>




</head>
<body class="imagem img-responsive">
<div class="clearfix headsearch text-center table-transp">
    <h1>Seguros Promo </h1>
</div>
<div class="container">
<form id="formdestino" action="pesquisa.php" method="post">
	<div class="row-fluid filter wbg">
		<div class="container">
			<div class="col-md-6 col-sm-6 col-xs-12 frame-style margin-control-frame frame-custom-one">
				<div class="row">

					<div class="col-md-12 ">
						<h1>Encontre as melhores ofertas <br class="visible-lg visible-md">de <span>Seguro Viagem</span> da internet</h1>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 pr0">
								<select class="form-control mb15" id="id_destination" name="destination" title="Selecione um destino" required >
                                    <option>Carregando...</option>
								</select>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 datepickercontainer pr0">
                                <input required id="idpartida" name="partida" width="260" placeholder="Partida"  readonly="readonly" type="text" />
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
                                <input required id="idretorno" name="retorno" width="260" placeholder="Retorno" readonly="readonly" type="text"  />
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 text-right pr0" style="padding-top: 7px">
								<button id="bt_comparar" class="btn btn-yellow bt_comparar"><span>Pesquisar</span>

								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 frame-style margin-control-frame frame-custom-two" style="display: none;">
				<div class="row frame-two">
					<div class="col-md-12 ">
						<h1>Como podemos <br class=""><span>falar com você?</span></h1>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 pr0">
								<input type="text" id="id_nome" class="form-control mb15" name="name" placeholder="Nome">
								<i class="fa fa-user"></i>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 pr0">
								<input type="text" id="id_email" class="form-control mb15" name="email" placeholder="Email">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 pr0">
								<input type="tel" id="id_celular" class="form-control mb15" name="phone" placeholder="Celular" data-mask="(00) 0000-00009">
								<i class="fa fa-phone"></i>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 pr0">

							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 text-right pr0">
								<button id="bt_continuar" class="btn btn-yellow"><span>Continuar</span> </button><br><br>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</form>
</div>
</div>

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


        $('#id_celular').mask('(00) 0000-00009');


        $.getJSON('api.php?u=destinations', function (dados){

            var option = '<option value="" selected="selected">Destino</option>';
            $.each(dados, function(i, obj){
                option += '<option value="'+obj.slug+'">'+obj.name+'</option>';
            })
            $('#id_destination').html(option).show();

        });


        var cookies = get_cookies_array();
        for(var name in cookies) {

            if ( $('#'+name).length){
                if((name!='id_destination') && (name!='idpartida') && (name!='idretorno')) {
                $('#'+name).val(cookies[name]);
                }
            }
        }

    });


    function get_cookies_array() {

        var cookies = { };

        if (document.cookie && document.cookie != '') {
            var split = document.cookie.split(';');
            for (var i = 0; i < split.length; i++) {
                var name_value = split[i].split("=");
                name_value[0] = name_value[0].replace(/^ /, '');
                cookies[decodeURIComponent(name_value[0])] = decodeURIComponent(name_value[1]);
            }
        }

        return cookies;

    }

</script>

</body>
</html>