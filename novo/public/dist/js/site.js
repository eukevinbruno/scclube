$(document).ready( function() {

//var dir_root = 'http://localhost:8000';

var dir_root = $('#url_base').val();

    $('.dinheiro').mask('#.##0,00', {reverse: true});
    $(".cpf").mask("999.999.999-99");
    $(".cnpj").mask("99.999.999/9999-99");
    $(".date").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
    $(".telefone").mask("(00) 0000-00009");
    $('.number').mask('00#');
    //$(".cardNumber").mask("9999 9999 9999 9999");
    $(".cardExpiry").mask("99/99");
    $(".cardCVC").mask("00#");
    
    $('#ordem').change(function(){
        $('#formOrdem').submit();
    });
    
    
    $("#preco").blur(function(){
        
        $('#has-error-preco').html('').show();
        $('.btnPublicar').removeAttr('disabled');
//        
        var preco = $('#preco').val();
        var preco_sem_ponto = preco.split('.').join('');
        var preco_sem_ponto1 = parseFloat(preco_sem_ponto.replace(",", "."));
        
        console.log(preco);
        console.log(preco_sem_ponto1);
//        
        if(preco_sem_ponto1 <= 1000){
            
            $('#preco').focus();
            $('#has-error-preco').html(' (Valor deve ser maior que R$1.000,00)').show();
            $('.btnPublicar').attr('disabled', 'disabled');
        }
        
    });
    
    $('#email').change(function(){

        var email = $('#email').val();
        //var _token = $('#_token').val();
        var _token = $("input[type=hidden][name=_token]").val();
        
        $.ajax({
            type: "POST",
            url: dir_root + "/painel/ajaxEmail",
            dataType: 'json',
            data: {
                email: email,
                _token: _token
            },
            success: function(data) {
                $('#has-error-email').html('').hide();
                if(data > 1){
                    $('#has-error-email').html(' (Esse email já está sendo utilizado)').show();
                    $('#email').focus();
                    $('#btnCadastro').attr('disabled', 'disabled');
                    return false;
                } else {
                    $('#btnCadastro').removeAttr('disabled');
                }
            }
        });
    });
    
    $('#login').change(function(){

        var login = $('#login').val();
        var _token = $("input[type=hidden][name=_token]").val();

        $.ajax({
            type: "POST",
            url: dir_root + "/painel/ajaxLogin",
            dataType: 'json',
            data: {
                login: login,
                _token: _token
            },
            success: function(data) {
                $('#has-error-login').html('').hide();
                if(data > 1){
                    $('#has-error-login').html(' (Esse nome de usuário já está sendo utilizado)').show();
                    $('#login').focus();
                    $('#btnCadastro').attr('disabled', 'disabled');
                    return false;
                } else {
                    $('#btnCadastro').removeAttr('disabled');
                }
            }
        });
    });

    $('#cep').change(function(){
        
        var cep = $('#cep').val();
        var _token = $("input[type=hidden][name=_token]").val();
        
        $.ajax({
            type: "POST",
            url: dir_root + "/painel/ajaxCep",
            dataType: 'json',
            data: {
                cep: cep,
                _token: _token
            },
            success: function(data) {

                if(data.sucesso > 0){
                    $('#endereco').val(unescape(data.endereco));
                    $('#bairro').val(unescape(data.bairro));
                    $('#cidade').val(unescape(data.cidade));
                    $('#uf').val(unescape(data.uf));
                    $('#numero').focus();
                } 
            }
        });
    });
    
    $('#cnpj_cpf').change(function(){
        
        var cpf = $('#cnpj_cpf').val();
//        cpf = cpf.replace(/\./g, "");
//        cpf = cpf.replace(/-/g, "");
//        cpf = cpf.replace(/\//g, "");
        
        var _token = $("input[type=hidden][name=_token]").val();

        $.ajax({
            type: "POST",
            url: dir_root + "/painel/ajaxCpf",
            dataType: 'json',
            data: {
                cpf: cpf,
                _token: _token
            },
            success: function(data) {
                $('#has-error-cpf').html('').hide();
                if(data > 1){
                    $('#has-error-cpf').html(' (Esse CPF já está sendo utilizado)').show();
                    $('#cnpj_cpf').focus();
                    $('#btnCadastro').attr('disabled', 'disabled');
                    return false;
                } else {
                    $('#btnCadastro').removeAttr('disabled');
                }
            }
        });
        

        
    });    

    
    function Formata_Dinheiro(n) {
        return n.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
    }
       
    
    $('.btnCadastro').click(function(){

        var senha = $('#senha').val();
        var resenha = $('#resenha').val();

        if(senha != resenha){
            $('#has-error-resenha').html(" (Senha e Confirmar senha devem ser idênticos)").show();
            return false;
        } else {
            $('#has-error-resenha').html("").show();
        }

    });
    
    
    $('#paycartao').click(function(){
        
 
    });
    
    $('#payboleto').click(function(){
        
 
    });
    
    //MARCA
    $('#veiculo').change(function(){
        
        var veiculo = $('#veiculo').val();
        var _token = $("input[type=hidden][name=_token]").val();
        var destaque_marca;
        
        if(veiculo == 'moto'){
            $('#carroceria').attr('disabled', 'disabled');
            $('#transmissao').attr('disabled', 'disabled');
            $('#carroceria').attr("required", false);
            $('#transmissao').attr("required", false);
        } else {
            $('#carroceria').removeAttr('disabled');
            $('#transmissao').removeAttr('disabled');
            $('#carroceria').attr("required", true);
            $('#transmissao').attr("required", true);
        }
        
        
        $.ajax({
            type: "POST",
            url: dir_root + "/ajaxMarca",
            dataType: 'json',
            data: {
                tipo: veiculo,
                _token: _token
            },
            success: function(data) {

                if(data.length > 0){
                        
                    var options = '<option value="">Selecione</option>';
                    for (var i = 0; i < data.length; i++) {
                        
                        if(i > 0 && destaque_marca != data[i].destaque){
                            options += '<option value="">------------------------</option>';
                        }
                        options += '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                        
                        destaque_marca = data[i].destaque;
                    }

                    $('#marca').html(options).show();

                } 
            }
        });
        
    });
    
    
    var veiculo_default = $('#veiculo').val();
    var marca_default = $('#marca_default').val();
    var _token = $("input[type=hidden][name=_token]").val();
        
    if(_token){
        
//    var marca_descricao = $("#marca option:selected").text();
//    $('#marca_descricao').val(marca_descricao);
    
    $.ajax({
        type: "POST",
        url: dir_root + "/ajaxMarca",
        dataType: 'json',
        data: {
            tipo: veiculo_default,
            _token: _token
        },
        success: function(data) {

            if(data.length > 0){

                var options = '<option value="">Selecione</option>';
                for (var i = 0; i < data.length; i++) {
                    var selMarca = '';
                    if(marca_default == data[i].id){
                        selMarca = 'selected';
                    }
                    options += '<option value="' + data[i].id + '"' + selMarca + '>' + data[i].nome + '</option>';
                }

                $('#marca').html(options).show();

            } 
        }
    });
    }
    //MARCA - FIM
    
    //MODELO
    $('#marca').change(function(){
        
        var marca = $('#marca').val();
        var tipo = $('#tipo').val();
        var _token = $("input[type=hidden][name=_token]").val();
        
        var marca_descricao = $("#marca option:selected").text();
        $('#marca_descricao').val(marca_descricao);
        
        $.ajax({
            type: "POST",
            url: dir_root + "/ajaxModelo",
            dataType: 'json',
            data: {
                marca: marca,
                tipo: tipo,
                _token: _token
            },
            success: function(data) {

                if(data.length > 0){
                        
                    var options = '<option value="">Todos</option>';
                    for (var i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                    }

                    $('#modelo').html(options).show();

                } 
            }
        });
        
    });
    
    
    var veiculo_default = $('#veiculo_default').val();
    var marca_default = $('#marca_default').val();
    var modelo_default = $('#modelo_default').val();
    var _token = $("input[type=hidden][name=_token]").val();
    if(_token){
        
//    var marca_descricao = $("#marca option:selected").text();
//    $('#marca_descricao').val(marca_descricao);
        
    $.ajax({
            type: "POST",
            url: dir_root + "/ajaxModelo",
            dataType: 'json',
            data: {
                marca: marca_default,
                tipo: veiculo_default,
                _token: _token
            },
            success: function(data) {

                if(data.length > 0){
                        
                    var options = '<option value="">Todos</option>';
                    for (var i = 0; i < data.length; i++) {
                        var selModelo = '';
                        if(modelo_default == data[i].id){
                            selModelo = 'selected';
                        }                        
                        options += '<option value="' + data[i].id + '"' + selModelo + '>' + data[i].nome + '</option>';
                    }

                    $('#modelo').html(options).show();

                } 
            }
        });
    }    
    //MODELO - FIM
    
    
    //MODELO
    $('#modelo').change(function(){
        
        
        var modelo = $('#modelo').val();
        var _token = $("input[type=hidden][name=_token]").val();
                
        var modelo_descricao = $("#modelo option:selected").text();
        $('#modelo_descricao').val(modelo_descricao);
        
        $.ajax({
            type: "POST",
            url: dir_root + "/ajaxVersao",
            dataType: 'json',
            data: {
                modelo: modelo,
                _token: _token
            },
            success: function(data) {

                if(data.length > 0){
                        
                    var options = '<option value="">Todas as versões</option>';
                    for (var i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                    }

                    $('#versao').html(options).show();

                } 
            }
        });
        
    });
    
    
    var versao_default = $('#versao_default').val();
    var modelo_default = $('#modelo_default').val();
    var _token = $("input[type=hidden][name=_token]").val();
    
    if(_token){
    
//    var modelo_descricao = $("#modelo option:selected").text();
//    $('#modelo_descricao').val(modelo_descricao);
//    var versao_descricao = $("#versao option:selected").text();
//    $('#versao_descricao').val(versao_descricao);
//        
    $.ajax({
            type: "POST",
            url: dir_root + "/ajaxVersao",
            dataType: 'json',
            data: {
                modelo: modelo_default,
                _token: _token
            },
            success: function(data) {

                if(data.length > 0){
                        
                    var options = '<option value="">Todas as versões</option>';
                    for (var i = 0; i < data.length; i++) {
                        var selVersao = '';
                        if(versao_default == data[i].id){
                            selVersao = 'selected';
                        }                        
                        options += '<option value="' + data[i].id + '"' + selVersao + '>' + data[i].nome + '</option>';
                    }

                    $('#versao').html(options).show();

                } 
            }
        });
    }
    //MODELO - FIM
    
    
    
    
    $("#imagem1").on('change', function () {

        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                var image_holder = $("#preview1");
                image_holder.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                            "class": "thumb-image"
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("Esse browser não suporta preview de imagens");
            }
        } else {
            alert("Favor selecionar somente imagens");
        }
    });
    
    $("#imagem2").on('change', function () {

        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {

                var image_holder = $("#preview2");
                image_holder.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                            "class": "thumb-image"
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("Esse browser não suporta preview de imagens");
            }
        } else {
            alert("Favor selecionar somente imagens");
        }
    });
    

   
})