<div class="main-content">    <div class="row">        <div class="col-lg-12">            <div class="card">                <div class="card-body">                    <form action="<?php echo base_url('permissoes/adicionar'); ?>" id="formPermissao" method="post">                                                                            <div class="row mb-20">                                <div class="col-md-6">                                    <div class="form-group">                                        <label for="input-normal">Nome da Permissão <span class="text-danger">*</span></label>                                        <input type="text" name="nome" class="form-control input-sm">                                    </div>                                </div>                                <div class="col-md-2">                                    <div class="form-group">                                        <label for="select">Situação <span class="text-danger">*</span></label>                                        <select class="form-control" data-provide="selectpicker" name="situacao" id="situacao">                                            <option value="">Opção</option>                                            <option value="1">Ativo</option>                                            <option value="2">Inativo</option>                                        </select>                                    </div>                                </div>                                <div class="pl-50" style="padding-top: 30px;">                                    <button class="btn btn-success-outline" id="marcardesmarcar" data-provide="tooltip"><span id="btnMostrar">Marcar Todos</span></button>                                </div>                            </div>                                           <table class="table table-bordered">                            <thead>                                <tr style="text-transform: uppercase; font-weight: bold; color: #33cabb">                                    <th scope="col" style="width:15%">Telas</th>                                    <th scope="col" style="width:15%">Cadastro</th>                                    <th scope="col" style="width:15%">Editar</th>                                    <th scope="col" style="width:15%">Visualizar / Outros</th>                                    <th scope="col" style="width:15%">Excluir/Cancelar</th>                                    <th scope="col" style="width:15%">Pesquisar</th>                                </tr>                            </thead>                            <tbody>                                <tr>                                    <th scope="row">Usuários</th>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="aUsuario" id="ts1" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input name="eUsuario" id="ts2" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input name="vUsuario" id="ts3" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input name="dUsuario" id="ts4" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input name="pUsuario" id="ts13" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                </tr>                                <tr>                                    <th scope="row">Clientes</th>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="aCliente" id="ts1" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="eCliente" id="ts2" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="vCliente" id="ts3" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="dCliente" id="ts4" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="pCliente" id="ts13" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                </tr>                                <tr>                                    <th scope="row">Produtos</th>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="aProduto" id="ts1" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="eProduto" id="ts2" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="vProduto" id="ts3" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="dProduto" id="ts4" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="pProduto" id="ts13" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                </tr>                                <tr>                                    <th scope="row">Nota Fiscal</th>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="aNotaFiscal" id="ts1" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="eNotaFiscal" id="ts2" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="vNotaFiscal" id="ts3" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="dNotaFiscal" id="ts4" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="pNotaFiscal" id="ts13" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                </tr>                                <tr>                                    <th scope="row">Permissões</th>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="aPermissao" id="ts1" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input name="ePermissao" id="ts2" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="vPermissao" id="ts3" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="dPermissao" id="ts4" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="pPermissao" id="ts13" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                </tr>                                <tr>                                    <th scope="row">Configurações Painel</th>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="aConfig" id="ts1" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="eConfig" id="ts2" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="vConfig" id="ts3" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="dConfig" id="ts4" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                    <td>                                        <div class="toggle-switch toggle-switch-demo">                                            <label class="switch switch-success">                                                <input  name="pConfig" id="ts13" type="checkbox" class="marca" hidden="hidden" value="1">                                                <span class="switch-indicator"></span>                                            </label>                                        </div>                                    </td>                                </tr>                            </tbody>                        </table>                        <div class="row">                            <div class="col-md-12">                                <div class="form-group">                                    <button class="btn btn-label btn-success"><label><i class="material-icons">done_all</i></label> Atualizar Permissão</button>                                    <button class="btn btn-label btn-danger"><label><i class="material-icons">arrow_back</i></label> Cancelar</button>                                </div>                            </div>                        </div>                    </form>                </div>            </div>        </div>    </div></div><script type="text/javascript">$(document).ready(function () {    $('#nome').focus();    $("#formPermissao").validate({        rules :{            nome: {required: true}        },        messages:{            nome: {required: 'Campo obrigatório'}        }    }); });</script>