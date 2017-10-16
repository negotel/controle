<section id="content">
    <div class="container container-alt">
        <div class="messages card">
            <div class="m-sidebar">
                <header>
                    <h2 class="hidden-xs">Messages</h2>

                    <ul class="actions">
                        <li>
                            <a href="">
                                <i class="zmdi zmdi-comment-text"></i>
                            </a>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="">Profile & Status</a>
                                </li>
                                <li>
                                    <a href="">Help</a>
                                </li>
                                <li>
                                    <a href="">Settings</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </header>

                <div class="ms-search hidden-xs">
                    <div class="fg-line">
                        <i class="zmdi zmdi-search"></i>

                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div>

                <div class="list-group c-overflow">
                    <?php foreach ($getMessengerUser as $myfrends){ ?>
                    <?php 
                        if($myfrends->foto == null){ 
                            if($myfrends->genero == 'Masculino'){
                                $foto = base_url('assets/img/demo/profile-pics/m.jpg');
                            } elseif($myfrends->genero == 'Feminino') {
                                 $foto = base_url('assets/img/demo/profile-pics/f.jpg');
                            }else{
                                $foto = base_url('assets/img/demo/profile-pics/default.jpg');
                            }
                        }else{
                            $foto = $myfrends->foto; 
                        }
                    ?>
                    
                    <a class="list-group-item media <?php if( $this->uri->segment(3) == $myfrends->usernicker){echo 'active';}; ?>" href="<?php echo  base_url('messenger/s/'.$myfrends->usernicker); ?>">
                        <div class="pull-left">
                            <img src="<?php echo $foto; ?>" alt="" class="lgi-img">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading"><?php echo $myfrends->nome ?></div>
                            <small class="lgi-text">Fierent fastidii recteque ad pro</small>
                            <small class="ms-time">05:00 PM</small>
                        </div>
                    </a>
                    <?php } ?>
                </div>

            </div>
            <?php if($this->uri->segment(3) != NULL){ ?>
            <?php 
                        if($getUserMessenger->foto == null){ 
                            if($getUserMessenger->genero == 'Masculino'){
                                $fotoUser = base_url('assets/img/demo/profile-pics/m.jpg');
                            } elseif($getUserMessenger->genero == 'Feminino') {
                                 $fotoUser = base_url('assets/img/demo/profile-pics/f.jpg');
                            }else{
                                $fotoUser = base_url('assets/img/demo/profile-pics/default.jpg');
                            }
                        }else{
                            $fotoUser = $getUserMessenger->foto; 
                        }
                    ?>
            <div class="m-body">
                <header class="mb-header">
                    <div class="mbh-user clearfix">
                        <img src="<?php echo $fotoUser; ?>" alt="">
                        <div class="p-t-5"><?php echo $getUserMessenger->nome; ?></div>
                    </div>

                    <ul class="actions">
                        <li>
                            <a href="">
                                <i class="zmdi zmdi-refresh-alt"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="zmdi zmdi-delete"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="">Contact Info</a>
                                </li>
                                <li>
                                    <a href="">Mute</a>
                                </li>
                                <li>
                                    <a href="">Clear Messages</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </header>

                <div class="mb-list"  id="load_messenger">
                    <div class="mbl-messages c-overflow">
                    <?php if($getMessenger){ ?>
                        <?php foreach ($getMessenger as $messenger){ ?>
                        <?php if($messenger->id_de == $this->session->userdata('id')){ $posicao = 'right'; }else{ $posicao = 'left'; } ?>
                            <div class="mblm-item mblm-item-<?php echo $posicao; ?>">
                                <div>
                                   <?php echo $messenger->messeger; ?>
                                </div>
                                <small><?php echo date('H:i', strtotime($messenger->hora_envio)); ?></small>
                            </div>
                            
                        <?php } ?>
                    <?php }else{ ?>
                        <div class="mblm-item text-center lead" style="padding-top:25%;">
                            Envie uma mensagem para seu amigo, <b>(<?php echo $getUserMessenger->nome; ?>)</b>
                        </div>
                    <?php } ?>
                    </div>

                    <div class="mbl-compose">
                        <form  action="" enctype="multipart/form-data" id="messenger" method="post" >
                            <input type="hidden" name="para" value="<?php echo $getUserMessenger->idUsuarios ?>">
                            <input class="form-control input-sm" name="txtMessenger" id="txtMessenger"  placeholder="Digite uma mensagem..." style="border: none;">
                            <span class="control-group"></span>
                            <button><i class="zmdi zmdi-mail-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
                <div class="m-body">
                    <div class="mblm-item text-center lead" style="padding-top:30%;">
                        Escolha um usuário para iniciar uma conversa.<br>
                        <i class="zmdi zmdi-mood zmdi-hc-5x"></i>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<script src="<?php echo base_url('assets/login/js/valida.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function(){ 
    $('#txtMessenger').focus();
    $("#messenger").validate({
      
	rules:{
	    txtMessenger: {required:true}
	},
	messages:{
	    txtMessenger: {required:'Digite algo para <?php echo '<b>'.$getUserMessenger->nome.'</b>....'; ?>'}
	},
	errorClass: "help-inline",
	errorElement: "span",
	highlight: function (element, errorClass, validClass) {
	    $(element).parents('.control-group').addClass('error');
	},
	unhighlight: function (element, errorClass, validClass) {
	    $(element).parents('.control-group').removeClass('error');
	    $(element).parents('.control-group').addClass('success');
	},
        
        submitHandler: function( form ){
	   var dados = $( form ).serialize();
	    $.ajax({
		type: "POST",
		url: "<?php echo base_url('messenger/sendMensagem'); ?>",
		data: dados,
		dataType: 'json',
		success: function(data) {
		  if(data.result == true){
			$("#load_messenger" ).load("<?php echo current_url(); ?> #load_messenger" );
                        $("#txtMessenger").val('');
		    }else{ alert('Ocorreu um erro ao tentar adicionar produto.'); }
		}
	    });
	    return false;
	}
    });
    
});
</script>