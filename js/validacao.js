$(document).ready(function() {



    $('#bt_comparar').click(function(e){

        e.preventDefault();
        if($('#id_destination').val() != 0 && $('#form1 #id_destination').val() != "" && $('#idpartida').val() != 0 && $('#idpartida').val() != "" && $('#idretorno').val() != 0 && $('#idretorno').val() != ""  ){
            $('#bt_comparar').hide();
            $('.frame-custom-two').show();
            $('.frame-custom-two').addClass('animated fadeIn');

        }else{
            alert('Preencha todos os campos');
        }
    });


    $('#bt_continuar').click(function(e){Cookies.set('id_destination', $("#id_destination").val(), 1);

        e.preventDefault();
        if( $('#id_destination').val() != 0 && $('#id_destination').val() != "" && $('#idpartida').val() != 0 && $('#idpartida').val() != "" && $('#idretorno').val() != 0 && $('#idretorno').val() != "" && $('#id_nome').val() != 0 && $('#id_nome').val() != "" && $('#id_email').val() != 0 && $('#id_email').val() != "" && $('#id_celular').val() != 0 && $('#id_celular').val() != "" ) {

            Cookies.set('idpartida', $("#idpartida").val(), 7);
            Cookies.set('idretorno', $("#idretorno").val(), 7);
            Cookies.set('id_email', $("#id_email").val(), 7);
            Cookies.set('id_celular', $("#id_celular").val(), 7);
            Cookies.set('id_nome', $("#id_nome").val(), 7);


            $( "#formdestino" ).submit();
        }
        else{
            alert('Preencha todos os campos');
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


});