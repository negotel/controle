<section id="content">    <div class="container">	<div class="block-header">	    <h2>Adicionar PRUDUTO</h2>            <ul class="actions">                <button onclick="location.href = '<?php echo base_url('produtos/lista_produtos'); ?>'" class="btn btn-default"><i class="zmdi zmdi-arrow-back"></i> Voltar</button>            </ul>	</div>     	<div class="card">	    <div class="card-header">                <h2 style="font-size: 16px;">CADASTRO DE PRODUTO - <span style="font-size: 13px; color: #ff0000">Preencha todos os campos *</span></h2>	    </div>	    <div class="card-body card-padding">                <form action="#" id="formProduto" method="post" >                    <div class="row">                        <div class="col-sm-12">                               <div class="form-group">                                <p><b>DESCRIÇÃO DO PRODUTO <span class="text-danger">*</span></b></p>                                <div class="fg-line">                                    <input type="text" name="descricao_produto" id="descricao_produto" class="form-control input-sm" placeholder="Descricão do Produto*">                                </div>                            </div>                        </div>                    </div>                     <div class="row">                        <div class="col-sm-6">                               <div class="form-group">                                <p><b>NCM </b></p>                                <div class="fg-line">                                    <input type="text" name="ncm_produto" id="ncm_produto" class="form-control input-sm" placeholder="NCM do Produto">                                </div>                            </div>                        </div>                        <div class="col-sm-6">                            <div class="form-group">                                <p><b> CEST</b></p>                                <div class="fg-line">                                    <input type="text" class="form-control input-sm"  name="cest_produto" id="cest_produto" placeholder="CEST do Produto">                                </div>                            </div>                        </div>                    </div>                     <div class="row">                        <div class="col-sm-6">                               <div class="form-group">                                <p><b>UNIDADE COMERCIAL</b></p>                                <div class="fg-line">                                    <input type="text" name="uc_produto" id="uc_produto" class="form-control input-sm" placeholder="Unidade Comercial, Ex: UN, KG, CX">                                </div>                            </div>                        </div>                                                   <div class="col-sm-6">                            <div class="form-group">                                <p><b>VALOR UNITÁRIO COM.</b></p>                                <div class="fg-line">                                    <input type="text" name="vuc_produto" id="vuc_produto" class="form-control input-sm" placeholder="Valor Unitário Comercial">                                </div>                            </div>                        </div>                    </div>                     <div class="row">                        <div class="col-sm-4">                               <div class="form-group">                                <p><b>UNIDADE TRIB.</b></p>                                <div class="fg-line">                                    <input type="text" name="ut_produto" id="ut_produto" class="form-control input-sm" placeholder="Unidade Trib. Ex: UN, KG, CX">                                </div>                            </div>                        </div>                                                   <div class="col-sm-4">                            <div class="form-group">                                <p><b>QUANTIDADE TRIB.</b></p>                                <div class="fg-line">                                    <input type="text" name="qt_produto" id="qt_produto" class="form-control input-sm" placeholder="Quantidade Tributavel">                                </div>                            </div>                        </div>                        <div class="col-sm-4">                            <div class="form-group">                                <p><b>VALOR UNITÁRIO TRIB.</b></p>                                <div class="fg-line">                                    <input type="text" name="vut_produto" id="vut_produto" class="form-control input-sm" placeholder="Valor Unitário Tributavel">                                </div>                            </div>                        </div>                    </div>                     <div class="form-group">                        <div class="fg-line">                            <button class="btn btn-primary"><i class="zmdi zmdi-check-all"></i> Cadastrar</button>                            <button class="btn btn-danger"> <i class="zmdi zmdi-refresh"></i> Cancelar</button>                        </div>                    </div>                </form>	    </div>	</div>    </div></section><div class='modal fade' id='sucesso' tabindex='-1'   role='dialog'>    <div class='modal-dialog modal-sm' role='document'>        <div class='modal-content'>            <div class='modal-header'>                <h4 class='modal-title'>Notificação</h4>            </div>            <div class='modal-body'>                <span class='mensagem'></span>            </div>            <div class='modal-footer'>                <button type='button' class='btn btn-danger' data-dismiss='modal'>Fechar</button>            </div>        </div><!-- /.modal-content -->    </div><!-- /.modal-dialog --></div><!-- /.modal --><script src="<?php echo base_url('assets/login/js/valida.js') ?>"></script><script type="text/javascript">$(document).ready(function () {    $("#formProduto").validate({	rules: {	    descricao_produto: {required: true},	    vuc_produto: {required: true},	    vut_produto: {required: true}	},	messages: {            descricao_produto: {required: 'Este campo e de preenchimento obrigatório'},	    vuc_produto: {required: 'Este campo e de preenchimento obrigatório'},	    vut_produto: {required: 'Este campo e de preenchimento obrigatório'}	},	errorClass: "help-inline",	errorElement: "span",	highlight: function (element, errorClass, validClass) {	    $(element).parents('.mensg').addClass('danger');	},	unhighlight: function (element, errorClass, validClass) {	    $(element).parents('.mensg').removeClass('danger');	    $(element).parents('.mensg').addClass('success');	},        submitHandler: function( form ){	   var dados = $( form ).serialize();	    $.ajax({		type: "POST",		url: "<?php echo base_url('produtos/adicionarProduto'); ?>",		data: dados,		dataType: 'json',		success: function(ret) {		  if(ret.result == true){                        $('#sucesso').modal('show');                        $('.mensagem').html(ret.mensagen);                        document.getElementById("formProduto").reset()		    }else{                         $('#error').modal('show');                    }		}	    });	    return false;	}    });});</script>