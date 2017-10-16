<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="card-title">
                    <strong>Cadastro</strong> de Imagens
                    <small>Preencha todos os campos de uso obrigátorio *</small>
                </h4>
                <div class="card-body">
                    <?php
                        if ($this->session->flashdata('error') != null || $this->session->flashdata('success') != null) {
                            if($this->session->flashdata('success') == TRUE){
                                $alert = 'primary';
                            } else {
                                $alert = 'danger';
                            }
                    ?>
                    <div class="alert alert-<?php echo $alert; ?>" role="alert">
                            <?php
                                if ($this->session->flashdata('success') == TRUE) {
                                    echo '<i class="zmdi zmdi-check"></i> '. $this->session->flashdata('success'); 
                                } else {
                                    echo 'Ops, um error encontrado! <br> <b>Drescrição do Erro:</b> <br>'. $this->session->flashdata('error'); 
                                }
                            ?>
                    </div>
                    <?php } ?>
                    <form action="<?php echo base_url('imagens/adicionarImg'); ?>" id="formImg" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input-normal">Autor da Imagem <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="autor_imagem" name="autor_imagem">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input-normal">Url de Origem <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="url_imagem" name="url_imagem">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="select">Situação <span class="text-danger">*</span></label>
                                    <select class="form-control" data-provide="selectpicker" name="situacao_imagem" id="situacao_imagem">
                                        <option value="">Selecione uma opção</option>
                                        <option value="1">01 - Ativo</option>
                                        <option value="2">02 - Inativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="select">Selecionar Imagem:  <span class="text-danger">*</span></label>
                                   <input type="file" data-provide="dropify" name="userfile" data-show-remove="true" data-default-file=" <?php echo base_url('assets/img/avatar/1.png'); ?>">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-label btn-info"><label><i class="material-icons">done_all</i></label> Adicionar Imagem</button>
                                    <button class="btn btn-label btn-danger"><label><i class="material-icons">arrow_back</i></label> Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>