var consultarCEP = function(e){
    e.preventDefault();
    console.log('INTERCEPTED BUTTON')
    var cepID = $(this).attr('data-cepid');
    var cep = $('#' + cepID).val();
    // add validation messages here

    cep = cep.replace('-', '');
    var form_data = new FormData();
    var token = $('input[name=_token]').val();
    form_data.append('cep', cep);
    form_data.append('_token',token);
    // console.log(form_data);
    // return;
    $.ajax({
        url: '/backend/zombiecorp/ceps/cepscontroller/onCEP', // point to server-side controller method
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        dataType:'json',
        type: 'post',
        success: function (response) {
            console.log(response);
            // return;
            // Modals.hideLoadingModal();
            if (response!=false){
                $('input[name=zcDisplay_tipo_log]').val(response.tipo_logradouro);
                $('input[name=zcDisplay_logradouro]').val(response.logradouro);
                $('input[name=zcDisplay_bairro]').val(response.bairro);
                $('input[name=zcDisplay_cidade]').val(response.cidade);
                $('select[name=zcDisplay_estado]').val(response.uf);
            }else{
                $('input[name=zcDisplay_tipo_log]').val('');
                $('input[name=zcDisplay_logradouro]').val('' );
                $('input[name=zcDisplay_bairro]').val('');
                $('input[name=zcDisplay_cidade]').val('');
                $('select[name=zcDisplay_estado]').val('');
                let cep = $('input[name=cep]').val()
                // Modals.genericModal(`<strong>O CEP '${cep}' não foi encontrado</strong><br>Verifique o número e, caso ele esteja correto, continue preenchedo o cadastro.`)
            }
        },
        error: function (response) {
            // Modals.hideLoadingModal();
            console.log('NO GOOD',response); // display error response from the server
        }
    });
}

$(document).ready(function(){
    $('#zcConsultarCEP').click(consultarCEP);
});