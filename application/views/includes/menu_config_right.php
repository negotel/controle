<?php $config = unserialize($config->configs_sistema);?>

<form action="#" method="post" id="config_sistema">
<div class="quickview-body">
    <div class="tab-content">
        <div class="tab-pane fade active show" id="qv-global-tab-settings">
            <div class="media-list media-list-divided media-list-hover">

                <div class="media">
                    <div class="media-body">
                        <p><strong>Sticky Topbar</strong></p>
                        <p>Topbar is allways visible</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked onchange="topbar.toggleFix()">
                        <span class="switch-indicator"></span>
                    </label>
                </div>

                <div class="media">
                    <div class="media-body">
                        <p><strong>Barra Lateral</strong></p>
                        <p>Somente exibir ícones</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" onchange="sidebar.toggleFold()">
                        <span class="switch-indicator"></span>
                    </label>
                </div>
                <div class="media">
                    <div class="media-body">
                        <p><strong>Cadastro de Usuário</strong></p>
                        <p>Liberar Cadastro no sistema</p>
                    </div>
                    <label class="switch">
                        <input <?php if(isset($config['cUsuario'])){ if($config['cUsuario'] == '1'){echo 'checked';}}?> type="checkbox" name="cUsuario" value="1">
                        <span class="switch-indicator"></span>
                    </label>
                </div>
                <div class="media">
                    <div class="media-body">
                        <p><strong>Topbar Color</strong></p>
                        <p>Change background color of the topbar</p>

                        <div class="color-selector color-selector-sm mt-12">
                            <label class="inverse">
                                <input type="radio" value="default" name="global-topbar-color" checked>
                                <span style="background-color:#ffffff"></span>
                            </label>

                            <label>
                                <input type="radio" value="33cabb" name="global-topbar-color">
                                <span style="background-color:#33cabb"></span>
                            </label>

                            <label>
                                <input type="radio" value="48b0f7" name="global-topbar-color">
                                <span style="background-color:#48b0f7"></span>
                            </label>

                            <label>
                                <input type="radio" value="faa64b" name="global-topbar-color">
                                <span style="background-color:#faa64b"></span>
                            </label>

                            <label>
                                <input type="radio" value="f96868" name="global-topbar-color">
                                <span style="background-color:#f96868"></span>
                            </label>

                            <label>
                                <input type="radio" value="926dde" name="global-topbar-color">
                                <span style="background-color:#926dde"></span>
                            </label>

                            <label>
                                <input type="radio" value="57c7d4" name="global-topbar-color">
                                <span style="background-color:#57c7d4"></span>
                            </label>

                            <label>
                                <input type="radio" value="3f4a59" name="global-topbar-color">
                                <span style="background-color:#3f4a59"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="media">
                    <div class="media-body">
                        <p><strong>Sidebar Color</strong></p>
                        <p>Change background color of the sidebar</p>

                        <div class="color-selector color-selector-sm mt-12">
                            <label class="inverse">
                                <input type="radio" value="light" name="global-sidebar-color">
                                <span style="background-color:#ffffff"></span>
                            </label>

                            <label>
                                <input type="radio" value="default" name="global-sidebar-color" checked>
                                <span style="background-color:#3f4a59"></span>
                            </label>

                            <label>
                                <input type="radio" value="dark" name="global-sidebar-color">
                                <span style="background-color:#242a33"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="media">
                    <div class="media-body">
                        <p><strong>Sidebar Menu Color</strong></p>
                        <p>Change background color of the selected menu</p>

                        <div class="color-selector color-selector-sm mt-12">
                            <label>
                                <input type="radio" value="primary" name="global-sidebar-menu-color" checked>
                                <span style="background-color:#33cabb"></span>
                            </label>

                            <label>
                                <input type="radio" value="info" name="global-sidebar-menu-color">
                                <span style="background-color:#48b0f7"></span>
                            </label>

                            <label>
                                <input type="radio" value="warning" name="global-sidebar-menu-color">
                                <span style="background-color:#faa64b"></span>
                            </label>

                            <label>
                                <input type="radio" value="danger" name="global-sidebar-menu-color">
                                <span style="background-color:#f96868"></span>
                            </label>

                            <label>
                                <input type="radio" value="purple" name="global-sidebar-menu-color">
                                <span style="background-color:#926dde"></span>
                            </label>

                            <label>
                                <input type="radio" value="pink" name="global-sidebar-menu-color">
                                <span style="background-color:#f96197"></span>
                            </label>

                            <label>
                                <input type="radio" value="cyan" name="global-sidebar-menu-color">
                                <span style="background-color:#57c7d4"></span>
                            </label>

                            <label>
                                <input type="radio" value="dark" name="global-sidebar-menu-color">
                                <span style="background-color:#3f4a59"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="p-20 mt-20">
                    <button class="btn btn-info btn-block" type="button" >Atualizar Configurações</button>
                </div>

            </div>
        </div>


        <div class="tab-pane fade" id="qv-global-tab-contacts">
            <div class="media-list media-list-hover">
                <div class="media items-center">
                    <a class="avatar avatar-sm status-success" href="../page/profile.html">
                        <img src="../assets/img/avatar/1.jpg" alt="...">
                    </a>
                    <a class="title" href="#">Maryam Amiri</a>
                    <a class="media-action hover-primary" href="#"><i class="fa fa-phone"></i></a>
                    <a class="media-action hover-primary" href="../page-app/mailbox-single.html"><i class="fa fa-envelope"></i></a>
                </div>

                <div class="media items-center">
                    <a class="avatar avatar-sm status-danger" href="../page/profile.html">
                        <img src="../assets/img/avatar/2.jpg" alt="...">
                    </a>
                    <a class="title" href="#">Hossein Shams</a>
                    <a class="media-action hover-primary" href="#"><i class="fa fa-phone"></i></a>
                    <a class="media-action hover-primary" href="../page-app/mailbox-single.html"><i class="fa fa-envelope"></i></a>
                </div>

                <div class="media items-center">
                    <a class="avatar avatar-sm status-success" href="../page/profile.html">TH</a>
                    <a class="title" href="#">Tim Hank</a>
                    <a class="media-action hover-primary" href="#"><i class="fa fa-phone"></i></a>
                    <a class="media-action hover-primary" href="../page-app/mailbox-single.html"><i class="fa fa-envelope"></i></a>
                </div>

                <div class="media items-center">
                    <a class="avatar avatar-sm status-danger" href="../page/profile.html">
                        <img src="../assets/img/avatar/3.jpg" alt="...">
                    </a>
                    <a class="title" href="#">Luz Buchler</a>
                    <a class="media-action hover-primary" href="#"><i class="fa fa-phone"></i></a>
                    <a class="media-action hover-primary" href="../page-app/mailbox-single.html"><i class="fa fa-envelope"></i></a>
                </div>

                <div class="media items-center">
                    <a class="avatar avatar-sm status-info bg-dark" href="../page/profile.html">KC</a>
                    <a class="title" href="#">Karla Cardinal</a>
                    <a class="media-action hover-primary" href="#"><i class="fa fa-phone"></i></a>
                    <a class="media-action hover-primary" href="../page-app/mailbox-single.html"><i class="fa fa-envelope"></i></a>
                </div>

                <div class="media items-center">
                    <a class="avatar avatar-sm status-danger" href="../page/profile.html">
                        <img src="../assets/img/avatar/4.jpg" alt="...">
                    </a>
                    <a class="title" href="#">Frank Camly</a>
                    <a class="media-action hover-primary" href="#"><i class="fa fa-phone"></i></a>
                    <a class="media-action hover-primary" href="../page-app/mailbox-single.html"><i class="fa fa-envelope"></i></a>
                </div>

                <div class="media items-center">
                    <a class="avatar avatar-sm status-success bg-pink" href="../page/profile.html">EM</a>
                    <a class="title" href="#">Eisha Muhel</a>
                    <a class="media-action hover-primary" href="#"><i class="fa fa-phone"></i></a>
                    <a class="media-action hover-primary" href="../page-app/mailbox-single.html"><i class="fa fa-envelope"></i></a>
                </div>

                <div class="media items-center">
                    <a class="avatar avatar-sm status-warning" href="../page/profile.html">
                        <img src="../assets/img/avatar/5.jpg" alt="...">
                    </a>
                    <a class="title" href="#">Bobby Mincy</a>
                    <a class="media-action hover-primary" href="#"><i class="fa fa-phone"></i></a>
                    <a class="media-action hover-primary" href="../page-app/mailbox-single.html"><i class="fa fa-envelope"></i></a>
                </div>

                <div class="media items-center">
                    <a class="avatar avatar-sm status-dark" href="../page/profile.html">
                        <img src="../assets/img/avatar/6.jpg" alt="...">
                    </a>
                    <a class="title" href="#">Gary Camara</a>
                    <a class="media-action hover-primary" href="#"><i class="fa fa-phone"></i></a>
                    <a class="media-action hover-primary" href="../page-app/mailbox-single.html"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="qv-global-tab-index">
            <div class="text-center">
                <div class="spinner-dots">
                    <span class="dot1"></span>
                    <span class="dot2"></span>
                    <span class="dot3"></span>
                </div>
            </div>
        </div>


    </div>
</div>
</form>
