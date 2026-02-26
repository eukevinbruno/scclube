$(document).ready( function() {

//var dir_root = 'http://localhost:8000';
//var dir_root = 'http://comissao.pro-aqua.com.br';
    var dir_root = $('#url_base').val();
    
    $('#produto').change(function(){
        calcula();
    })
    $('#parcela').change(function(){
        calcula();
    })
    $('#desconto_porcentagem').focusout(function(){
        calcula();
    })
    $('#desconto_reais').focusout(function(){
        calcula();
    })
    $('.acessorio_quant').focusout(function(){
        calcula();
    })
    
    function calcula(){
        
        var acessorio_total = 0;
        
        $("[id^='quant_']").each(function () {

            var quantidade = parseInt($(this).val());
            var valor_acessorio = $(this).attr('data-valor');
            
            if(quantidade > 0){
                var acessorio_subtotal = quantidade * valor_acessorio;
            } else {
                var acessorio_subtotal = 0;
            }
            
            acessorio_total = acessorio_total + acessorio_subtotal;
            
        });
        
        
        $('#acessorio_total').val(acessorio_total);
        
        var kit = $('#produto').val();
        var parcela = $('#parcela').val();
        var desconto_porcentagem = $('#desconto_porcentagem').val();
        var desconto_reais = $('#desconto_reais').val();
        
        //alert(dir_root);
        
        var _token = $('#_token').val();

        $.ajax({
            type: "POST",
            url: dir_root + "/painel/ajaxCalculo",
            dataType: 'json',
            data: {
                kit: kit,
                parcela: parcela,
                desconto_porcentagem: desconto_porcentagem,
                desconto_reais: desconto_reais,
                acessorio_total: acessorio_total,
                _token: _token
            },
            success: function(data) {

                if(data.sucesso > 0){
                    $('#valor').val(unescape(data.valor_kit));
                    $('#desconto_total').val(unescape(data.desconto_total));
                    $('#valor_com_desconto').val(unescape(data.valor_com_desconto));
                    $('#valor_parcela').val(unescape(data.valor_parcela));
                    
                    $('#juros_cartao').val(unescape(data.juros_cartao));
                    $('#juros_pago_cartao').val(unescape(data.juros_pago_cartao));
                    $('#valor_liquido').val(unescape(data.valor_liquido));
                    
                    $('#porcentagem_comissao_maxima').val(unescape(data.porcentagem_comissao_maxima));
                    $('#valor_minimo_comissao_maxima').val(unescape(data.valor_minimo_comissao_maxima));
                    $('#valor_faixa5').val(unescape(data.valor_faixa5));
                    $('#valor_faixa10').val(unescape(data.valor_faixa10));
                    $('#valor_faixa15').val(unescape(data.valor_faixa15));
                    $('#preco_sem_comissao_consultor').val(unescape(data.preco_sem_comissao_consultor));
                    $('#preco_sem_comissao_lider').val(unescape(data.preco_sem_comissao_lider));
                    
                    $('#desconto_relacao_valor_minimo_verde').val(unescape(data.desconto_relacao_valor_minimo_verde));
                    $('#valor_minimo_amarela').val(unescape(data.valor_minimo_amarela));
                    
                    $('#consultor_meta0').val(unescape(data.comissao.CONSULTOR.META_0));
                    $('#consultor_meta1200').val(unescape(data.comissao.CONSULTOR.META_1200));
                    $('#consultor_meta2000').val(unescape(data.comissao.CONSULTOR.META_2000));
                    $('#lider_meta0').val(unescape(data.comissao.LIDER.META_0));
                    $('#lider_meta1200').val(unescape(data.comissao.LIDER.META_1200));
                    $('#lider_meta2000').val(unescape(data.comissao.LIDER.META_2000));
                    
                        
                    var htmldiv = '<div class="text-center" style="font-size: 15px;height: 50px; margin-bottom: 20px; background-color:' + unescape(data.msg_bg_cor) + '; color:' + unescape(data.msg_cor) + ';"><b>' + unescape(data.msg_valor) + '</b></div>';                    
                    $('#respostavalor').html(htmldiv).show();
                    
                    $('#msg-input').val(unescape(data.msg_valor));
                    
                    
                } 
            }
        });
    }

})