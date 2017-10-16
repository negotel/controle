<section id="content">
    <div class="container">
	<?php
	    if ($this->session->flashdata('error') != null || $this->session->flashdata('success') != null) {
		if($this->session->flashdata('success') == TRUE){
		    $alert = 'success';
		} else {
		    $alert = 'warning';
		}
		
	?>
	<div class="alert alert-<?php echo $alert; ?> alert-dismissible" role="alert">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php
		    if ($this->session->flashdata('success') == TRUE) {
			echo '<i class="zmdi zmdi-check"></i> '. $this->session->flashdata('success'); 
		    } else {
			echo 'Advertência!'. $this->session->flashdata('error'); 
		    }
		?>
	</div>
	<?php	
	    }
	?>
	<div class="block-header">
	    <h2>Usuários</h2>
            <ul class="actions">
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aUsuario')){ ?>
                    <button type="submit" onclick="location.href = '<?php echo base_url('usuarios/adicionar'); ?>'" class="btn btn-primary">
                         <i class="zmdi zmdi-collection-text"></i> Adicionar
                    </button>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'pUsuario')){ ?>
                    <button class="btn btn-info"> <i class="zmdi zmdi-search"></i> <a data-toggle="modal" href="#pesquisar" style="color: #FFF;"> Buscar</a> </button>
                <?php } ?>
            </ul>
	</div>
        
        <div class="card">
            <div class="action-header clearfix">
                <div class="ah-label hidden-xs p-b-10">Todas Usuários</div>
                 <small>Clique sobre a foto do usuário e veja mais detalhes.</small>

                <div class="ah-search">
                    <input type="text" placeholder="Start typing..." class="ahs-input">

                    <i class="ahs-close" data-ma-action="action-header-close">&times;</i>
                </div>

                <ul class="actions">
                    <li>
                        <a href="" data-ma-action="action-header-open">
                            <i class="zmdi zmdi-search"></i>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <i class="zmdi zmdi-time"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" aria-expanded="true">
                            <i class="zmdi zmdi-sort"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="">Last Modified</a>
                            </li>
                            <li>
                                <a href="">Last Edited</a>
                            </li>
                            <li>
                                <a href="">Name</a>
                            </li>
                            <li>
                                <a href="">Date</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="zmdi zmdi-info"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card-body card-padding">

                <div class="contacts clearfix row" id="ajax_div">
                </div>
                
                <div class="load-more" id="remove_row">
                    <button class="btn btn-primary" id="load_more" data-val = "0">Carregar Mais Usuário... <img style="display: none" id="loader" src="<?php echo str_replace('index.php', '', base_url('assets/img/loading.gif')) ?>"> </button>
                </div>
            </div>
        </div>
       
            <div class="modal fade" id="detalhes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="text-center" >Detalhes do usuário - <span class="modal-title-movimento"></span></h4>
                        </div>
                        
                        <div class="modal-body">
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <dl class="dl-horizontal">
                                        <dt>Codígo:</dt>
                                        <dd class="id"></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Nome Completo:</dt>
                                        <dd class="nome"></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Genero:</dt>
                                        <dd class="genero"></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>E-mail</dt>
                                        <dd class="email"></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Celular</dt>
                                        <dd class="celular"></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>CPF/RG</dt>
                                        <dd class="cpf_rg"></dd>
                                    </dl>
                                   
                                    <dl class="dl-horizontal">
                                        <dt>Situação / Permissão</dt>
                                        <dd class="situacao_permissap"></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Endereço</dt>
                                        <dd class="endereco"></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Data do Cadastro</dt>
                                        <dd class="data-cadastro"></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eUsuario')) { ?>
                                <a class="btn_editar">Editar</a>
                            <?php } ?>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dUsuario')) { ?>
                                <a class="btn_excluir">Excluir</a>
                            <?php } ?>
                            <button class="btn btn-default"  data-dismiss="modal" aria-hidden="true">fechar</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<script>
$(document).ready(function () {
    getcountry(0);
    $("#load_more").click(function (e) {
        e.preventDefault();
        var page = $(this).data('val');
        getcountry(page);
    });
});
var getcountry = function (page) {
    $("#loader").show();
    $.ajax({
        url: "<?php echo base_url('usuarios/getUser') ?>",
        type: 'GET',
        data: {page: page}
    }).done(function (response) {
        $("#ajax_div").append(response);
        $("#loader").hide();
        $('#load_more').data('val', ($('#load_more').data('val') + 1));
        scroll();
    });
};
var scroll = function () {
    $('html, body').animate({
        scrollTop: $('#load_more').offset().top
    }, 1000);
};
</script>
<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
	<form action="<?php echo base_url() ?>usuarios/excluir" method="post" >
	    <div class="modal-content">
		<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    <h4 class="modal-title" id="myModalLabel">Notificação</h4>
		</div>
		<div class="modal-body">
		    <input type="hidden" id="idUsuarios" name="id" value="" />
		    <div class="meg"></div>
		</div>
		<div class="modal-footer">
		    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
		    <button class="btn btn-success">Sim</button>
		</div>
	    </div>
	</form>
    </div>
</div>
<div class="modal fade" id="ativar-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <form action="<?php echo base_url() ?>usuarios/ativar" method="post" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Notificação</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="ativaUsuario" name="id" value="" />
                    <div class="meg"><p style="text-align: center">Deseja realmente Ativa este usuário?</p></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button class="btn btn-success">Sim</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="bloquear-0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <form action="<?php echo base_url() ?>usuarios/bloquear" method="post" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Notificação</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="bloquearUsuario" name="id" value="" />
                    <div class="meg"><p style="text-align: center">Deseja realmente bloquear este usuário?</p></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                    <button class="btn btn-success">Sim</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">

$(document).ready(function () {
    $(document).on('click', '#excluirUsuario', function (event) {
        var usuario = $(this).attr('usuario');
        $('#idUsuarios').val(usuario);
        $('.meg').html('<p style="text-align: center">Deseja realmente excluir este usuário?</p>');
    });
     $(document).on('click', '#situacao1', function (event) {
        var ativar = $(this).attr('ativar');
        $('#ativaUsuario').val(ativar);
    });
    $(document).on('click', '#situacao2', function (event) {
        var bloquear = $(this).attr('bloquear');
        $('#bloquearUsuario').val(bloquear);
    });
});

$('#detalhes').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('whatever')
    var nome = button.data('whatever1')
    var email = button.data('whatever2')
    var celular = button.data('whatever3')
    var cpf_rg = button.data('whatever4')
    var situacao_permissap = button.data('whatever5')
    var endereco = button.data('whatever6')
    var genero = button.data('whatever7')
    var dataCadastro = button.data('whatever8')   
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title-movimento').text(nome);
    modal.find('.id').text(id);
    modal.find('.nome').text(nome);
    modal.find('.email').text(email);
    modal.find('.celular').text(celular);
    modal.find('.cpf_rg').text(cpf_rg);
    modal.find('.situacao_permissap').text(situacao_permissap);
    modal.find('.endereco').text(endereco);
    modal.find('.genero').text(genero);
    modal.find('.data-cadastro').text(dataCadastro);
    modal.find('.btn_excluir').html('<a href="#excluir" id="excluirUsuario" role="button" data-toggle="modal" usuario="'+id+'" class="btn btn-danger"><i class="zmdi zmdi-close"></i> Excluir</a>');
    modal.find('.btn_editar').html('<a href="/usuarios/editar/'+id+'" class="btn btn-info"><i class="zmdi zmdi-edit"></i> Editar</a>');
})
</script>
<div class="modal fade" id="pesquisar" data-backdrop="static" data-keyboard="false"
     tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
	<div class="modal-content">
	    <div class="modal-header">
		<h4 class="modal-title text-center text-uppercase" style="color: #777; font-weight: bold">Pesquisa Detalhada</h4>
	    </div>
            <form role="form" method="get" action="<?php echo base_url(); ?>pesquisar/usuarios">
	    <div class="modal-body">
                    <small>Lista de usuários<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'pUsuario')){ ?>, para procurar por um determinado usuário digite o nome ou email no formulario abaixo<?php } ?>.</small>                <div class="row p-t-20">
                    <div class="col-sm-6">
			<div class="form-group fg-line">
                            <input type="text" class="form-control input-sm" name="nome" id="nome"  placeholder="Digite o nome do usuário">
			</div>
		    </div>
		    <div class="col-sm-6">
			<div class="form-group fg-line">
                            <input type="text" class="form-control input-sm" name="email" id="email"  placeholder="Digite o email do usuário">
			</div>
		    </div>
		    
                    <div class="col-sm-6">
			<div class="form-group fg-line">
                            <input type="text" class="form-control input-sm" name="cpf" id="cpf" data-mask="000.000.000-00"  placeholder="Digite o CFP do usuário">
			</div>
		    </div>
                </div>
	    </div>
	    <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-search"></i> Buscar</button>
		<button type="button"  class="btn btn-danger" data-dismiss="modal"><i class="zmdi zmdi-close"></i> Fecha</button>
	    </div>
            </form>
	</div>
    </div>
</div>
