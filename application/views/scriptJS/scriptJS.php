
<script>
    $(document).ready(function () {
        $(".money").maskMoney();
        //verificar formulario de ordem de serviço
        $("#formOS").validate({
            rules: {
                cliente_id: {required: true},
                status: {required: true},
                cep_entrega: {required: true, minlength: 9},
                numero: {required: true}
            },
            messages: {
                cliente_id: {required: 'Campo Obrigatório'},
                status: {required: 'Campo Obrigatório'},
                cep_entrega: {required: 'Campo Obrigatório', minlength: jQuery.validator.format("o cep deve conter {0} caracteres.")},
                numero: {required: 'Campo Obrigatório'}
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.mensg').addClass('danger');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.mensg').removeClass('danger');
                $(element).parents('.mensg').addClass('success');
            }
        });
        //excluir ordem de serviço
        $(document).on('click', '#excluirOS', function (event) {
            var ordemservico = $(this).attr('ordemservico');
            $('#id_os').val(ordemservico);
        });
        
        //adicionar produto a uma ordem de serviço
        $("#formAdicionaProduto").validate({
            rules:{
                produto_id: {required:true},
                valor_produto: {required:true},
                quantidade:{required:true}
            },
            messages:{
                produto_id: {required:'Campo Obrigatório'},
                valor_produto: {required:'Campo Obrigatório'},
                quantidade: {required:'Campo Obrigatório'}
            },
            submitHandler: function( form ){
               var dados = $( form ).serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('os/adicionarProduto'); ?>",
                    data: dados,
                    dataType: 'json',
                    success: function(data) {
                      if(data.result == true){
                            $("#reloadTable" ).load("<?php echo current_url(); ?> #reloadTable" );
                            $("#produto_id" ).load("<?php echo current_url(); ?> #produto_id" );
                            app.toast(data.mensagem);
                            document.getElementById("formAdicionaProduto").reset()
                        }else{
                             app.toast(data.mensagen);
                        }
                    }
                });
                return false;
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }

        });
        //excluir produto da ordem de serviço
        $(document).on('click', '#excluirProduto', function(event) {
	var acaoID = $(this).attr('produtoOS');
        
	$.ajax({
	    type: "POST",
	    url: "<?php echo base_url('os/excluirProduto'); ?>",
	    data: "id="+acaoID,
	    dataType: 'json',
	    success: function(data) {
		if(data.result == true){
			$( "#reloadTable" ).load("<?php echo current_url();?> #reloadTable" );
			app.toast(data.mensagem);
		}else{
		    $('#error').modal('show');
		}
	    }
	});
	return false;
   });
        //buscar preço do produto selecionado
        $('#produto_id').change(function (e) {
           var preco = $('#produto_id').val();
           $.getJSON( '<?php echo base_url('os/buscaConteudo?opcao=vunitario&valor='); ?>'+preco, function (dados) {
               if (dados.length > 0) {
                   var option = '';
                   $.each(dados, function (i, obj) {
                       option +=  obj.vuc_produto;
                   });
               } else {
                   Reset();
               }
               $('#valor_produto').val(option).show();
           });
       });
    });
    
    function id(el) {
       return document.getElementById( el );
     }
     function total( un, quantidade) {
            return parseFloat(un.replace(',', '.'), 10) * parseFloat(quantidade.replace(',', '.'), 10);
        }
        window.onload = function () {
            id('valor_produto').addEventListener('keyup', function () {
                var result = total(this.value, id('quantidade').value);
                id('total').value = String(result.toFixed(2)).formatMoney();
            });

            id('quantidade').addEventListener('keyup', function () {
                var result = total(id('valor_produto').value, this.value);
                id('sub_total').value = String(result.toFixed(2)).formatMoney();
            });
        }

        String.prototype.formatMoney = function () {
            var v = this;

            if (v.indexOf('.') === -1) {
                v = v.replace(/([\d]+)/, "$1,00");
            }

            v = v.replace(/([\d]+)\.([\d]{1})$/, "$1,$20");
            v = v.replace(/([\d]+)\.([\d]{2})$/, "$1,$2");
            v = v.replace(/([\d]+)([\d]{3}),([\d]{2})$/, "$1.$2,$3");

            return v;
        }
        
        
$('#dadosProdutoOS').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    // Extract info from data-* attributes
    var id = button.data('produto')
    var valor = button.data('produto1')
    var quantidade = button.data('produto2')
    var sub_total = button.data('produto3')
    var modal = $(this)
    modal.find('.id_produtos').val(id);
    modal.find('#valor').val(valor);
    modal.find('#quantidade').val(quantidade);
    modal.find('#sub_total').val(sub_total);
});
</script>
