
function getCalcFrete() {
    if ($("#cep").val()) {

        $('#msgmCep').html("");

        $.get('http://localhost:8000/cart/frete/' + $("#cep").val(), function (data) {
            $('#msgmCep').html("<p class='alert alert-success'>CEP encontrado</p>");
            $('#codigo').val(data['codigo']);
            $('#valor').val(data['valor']);
            $('#prazo').val(data['prazo']);

            /*
            $('#address').val(data['logradouro'] ? data['logradouro'] : data['endereco']);
            $('#district').val(data['bairro']);
            $('#city').val(data['cidade']);
            $('#state').val(data['estado']);
            */
        });
    }
    else {
        $('#cep').focus();
        $('#codigo').val("");
        $('#msgmCep').html("<p class='alert alert-danger'>Insira um CEP</p>");
        $('#valor').val("");
        $('#prazo').val("");
        /*
        $('#address').val("");
        $('#district').val("");
        $('#city').val("");
        $('#state').val("");

        */
    }
}