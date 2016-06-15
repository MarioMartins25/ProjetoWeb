<div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="#" class="logo"><img src="../public/images/logo.png" alt="" class="thumb-md img-circle"></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../public/images/users/<?= $user_ativo['foto']; ?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="router.php?route=dashboard&action=perfil"><i class="ti-settings m-r-5"></i> Perfil</a></li>
                                        <li><a href="<?php echo $APP_Router->buildURL('auth@logout')?>"><i class="ti-power-off m-r-5"></i> Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
