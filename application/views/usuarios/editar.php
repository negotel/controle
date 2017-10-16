<section id="content">
    <div class="container">
	<div class="block-header">
	    <h2>Adicionar Usuário</h2>
	</div>
	<div class="card">
	    <div class="card-header">
		<h2>Preencha todos os campos *
		</h2>
		<?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
	    </div>
	    <div class="card-body card-padding">
		<form action="<?php echo base_url('usuarios/editar/'.$result->idUsuarios); ?>" id="formUsuario" method="post" >
		    <?php echo form_hidden('idUsuarios',$result->idUsuarios) ?>
		<div class="row">
		    <div class="col-sm-6">   
			<div class="form-group">
			    <div class="fg-line">
				<input type="text" name="nome" id="nome" class="form-control input-sm" placeholder="Nome do Usuário*"  value="<?php echo $result->nome; ?>">
			    </div>
			</div>
		    </div>
		    <div class="col-sm-6">
			<div class="form-group">
			    <div class="fg-line">
				<input type="text" name="celular" id="celular" data-mask="(00) 0 0000-0000" placeholder="Celular* ex: (00) 0 0000-0000" class="form-control input-sm"  value="<?php echo $result->celular; ?>">
			    </div>
			</div>
		    </div>
		    <div class="col-sm-6">
			<div class="form-group">
			    <div class="fg-line">
				<input type="text" name="rg" id="rg" data-mask="00.000.000-0" placeholder="RG* ex: 00.000.000-0" class="form-control input-sm"  value="<?php echo $result->rg; ?>">
			    </div>
			</div>
		    </div>
		    <div class="col-sm-6">
			<div class="form-group">
			    <div class="fg-line">
				<input type="text" name="cpf"  id="cpf" data-mask="000.000.000-00" placeholder="CPF* ex: 00.000.000-00" class="form-control input-sm"  value="<?php echo $result->cpf; ?>">
			    </div>
			</div>
		    </div>
		</div>   
		<div class="row">
		    <div class="col-sm-6">   
			<div class="form-group">
			    <div class="fg-line">
				<input type="text" name="email" id="email" class="form-control input-sm" placeholder="Digite o e-mail*"  value="<?php echo $result->email; ?>">
			    </div>
			</div>
		    </div>
		    <div class="col-sm-6">
			<div class="form-group">
			    <div class="fg-line">
				<input type="password" name="senha" id="senha" class="form-control input-sm" placeholder="Senha*">
			    </div>
			</div>
		    </div>
		    <div class="col-sm-6">
			<div class="form-group fg-line">
			    <select class="selectpicker" name="permissoes_id" id="permissao" data-live-search="true">
				<option value="">Selecione uma permissão *</option>
				 <?php 
				 foreach ($permissoes as $p) {
                                     if($p->idPermissao == $result->permissoes_id){ $selected = 'selected';}else{$selected = '';}
                                      echo '<option value="'.$p->idPermissao.'"'.$selected.'>'.$p->nPermissao.'</option>';
                                  } ?>
				<option style="background-color: #006f7d; color: #FFF; font-weight: bold;" value=""> Adiconar uma nova permissão </option>
			    </select>
			</div>
		    </div>
		    <div class="col-sm-6">
			<div class="form-group fg-line">
			    <select class="selectpicker" name="situacao" id="situacao" data-live-search="true">
				<?php if($result->situacao == 1){$ativo = 'selected'; $inativo = '';} else{$ativo = ''; $inativo = 'selected';} ?>
                                <option value="1" <?php echo $ativo; ?>>Ativo</option>
                                <option value="2" <?php echo $inativo; ?>>Inativo</option>
			    </select>
			</div>
		    </div>
		</div>
		<div class="form-group">
		    <div class="fg-line">
			<button type="submit" class="btn btn-primary"><i class="zmdi zmdi-check-all"></i> Cadastrar</button>
			<button type="reset" class="btn btn-danger"> <i class="zmdi zmdi-refresh"></i> Cancelar</button>
			<a onclick="location.href = '<?php echo base_url('usuarios'); ?>'" class="btn btn-default"><i class="zmdi zmdi-arrow-back"></i> Voltar</a>
		    </div>
		</div>
		</form>
	    </div>
	</div>
    </div>
</section>
<script src="<?php echo base_url('assets/login/js/valida.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#formUsuario").validate({
	rules: {
	    nome: {required: true},
	    celular: {required: true},
	    rg: {required: true},
	    cpf: {required: true} ,
	    email: {required: true, email: true},
	    permissoes_id: {required: true},
	    situacao: {required: true},
	},
	messages: {
	    nome: {required: 'Coloque o nome do usuário'},
	    celular: {required: 'Coloque o telefone'},
	    rg: {required: 'Coloque o RG do usuário'},
	    cpf: {required: 'Coloque o CPF do usuário'} ,
	    email: {required: 'O campo email é obrigatorio.', email: 'O campo email deve conter um email válido.'},
	    permissoes_id: {required: 'Selecione uma permissao para este usuário'},
	    situacao: {required: 'Selecione uma sistuação para este usuário'}
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