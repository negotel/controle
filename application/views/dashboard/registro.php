<!DOCTYPE html>
<html>
    <head>
	<title>SKY PAINEL :: CONTROLE</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- //for-mobile-apps -->
	<!-- js -->
	<script src="<?php echo base_url('assets/login/js/jquery-1.11.1.min.js') ?>"></script>
        <link href="<?php echo base_url('assets/css/app_1.min.css'); ?>" rel="stylesheet">
	<!-- //js -->
	<link href="<?php echo base_url('assets/login/style.css') ?>" rel="stylesheet" type="text/css" media="all" />
        <style type="text/css">
            .balon{
                text-align: center;
            }
            .msg{
                display: none;
            }
            .send-erro{
                color: #FFF;
            }
            #sucesso{
                display: none;
            }
            .sucesso{
                text-align: center;
                padding: 25px 20px;
                background-color: #4CAF50;
                color: #FFF;
            }
        </style>
    </head>
    <body>
        
	<div class="main">
	    <h1></h1>
	    <div class="w3_login">
		<div id="particles"></div>
                <div class="w3_login_module"  id="sucesso">
                    <div class="module form-module sucesso">
                        <span class="send-sucesso"></span>
                    </div>
                </div>
                <div class="w3_login_module" id="form_hidden">
		    <div class="module form-module">
			<div class=" esquici">
			    <i class="fa fa-times fa-align-right"></i>
			</div>
                        <div class="form text-center ">
			    <h2>Faça se cadastro</h2>
                            <div class="msg alert alert-danger">
				<span class="send-erro"></span>
			    </div>
                            <form id="formRegistro" action="#" method="post">
				<input type="text" name="nome" id="nome" placeholder="Digite Nome, EX: João">
                                <input type="hidden" name="codigo" value="<?php echo aleatoriaCodigo(8); ?>">
				<input type="text" name="snome" id="snome" placeholder="Digite Sobrenome, EX: Oliveira">
				<input type="text" name="email" id="email" placeholder="Digite seu E-mail, Ex: nome@exemplo.com">
				<input type="password" name="senha" id="senha" placeholder="Digite sua Senha ">
				<input type="password" name="csenha" id="csenha" placeholder="Confirme sua Senha">
                                <button id="btn_login">FINALIZAR</button>
			    </form>
                            
			</div>
                        <div class="cta"><a class="esquici" href="<?php echo base_url('login') ?>">Já tenho cadastro.</a></div>
		    </div>
		</div>
	    </div>
	</div>

        <script src="<?php echo base_url('assets/login/js/plugins.js') ?>"></script>
        <script src="<?php echo base_url('assets/login/js/init-particles.js') ?>"></script>
        <script src="<?php echo base_url('assets/login/js/scripts.js') ?>"></script>
        <script src="<?php echo base_url('assets/login/js/valida.js') ?>"></script>
	<script type="text/javascript">
		    $(document).ready(function () {
			$('#nome').focus();
			$("#formRegistro").validate({
			    rules: {
				nome: {required: true, minlength: 3},
				snome: {required: true, minlength: 3},
				email: {required: true, email: true},
				senha: {required: true, minlength: 6},
                                csenha: {required: true,  equalTo: "#senha"}
			    },
			    messages: {
				nome: {required: 'Digite seu nome', minlength: 'Seu nome deve ter no minimo 3 caracteres'},
				snome: {required: 'Digite seu sobrenome', minlength: 'Seu sobrenome deve ter no minimo 3 caracteres'},
				email: {required: 'Digite um e-mail.', email: 'Digite um e-mail válido'},
				senha: {required: 'Digite uma senha.', minlength: 'Sua senha deve ter no minimo 6 caracters'},
                                csenha: {required: 'É preciso confirma senha.', equalTo: 'As senha não combina'}
			    },
			    submitHandler: function (form) {
				var dados = $(form).serialize();
				$.ajax({
				    type: "POST",
				    url: "<?php echo base_url('registro/newcadastro'); ?>",
				    data: dados,
				    dataType: 'json',
                                    beforeSend: function() {	
                                        $("#btn_login").html("Aguarde..... Validando dados <img src='<?php echo base_url('/assets/img/loading.gif') ?>' width='18'> ");
                                    },
				    success: function (data){
					if (data.result == true) {
                                            $("#sucesso").css('display', 'block');
                                            $("#form_hidden").css('display', 'none');
					    $('.send-sucesso').html(data.mensagen);
					} else {
                                            $("#btn_login").html('FINALIZAR');
                                            $(".msg").css('display', 'block')
					    $('.send-erro').html(data.mensagen);
					}
				    }
				});

				return false;
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
		    });

        </script>
    </body>
</html>