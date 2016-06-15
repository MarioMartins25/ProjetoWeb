<div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                <div class="user-details">
                        <div class="pull-left">
                            <img src="../public/images/users/<?= $user_ativo['foto']; ?>" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $user_ativo['nome']; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="router.php?route=dashboard&action=perfil"><i class="md md-settings"></i> Perfil</a></li>
                                    <li><a href="<?php echo $APP_Router->buildURL('auth@logout')?>"><i class="md md-settings-power"></i> Sair</a></li>
                                </ul>
                            </div>

                            <p class="text-muted m-0"><?= ($user_ativo['permissoes'] == 1) ? 'Administrador' : 'Jogador' ; ?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                        	<li class="text-muted menu-title">Navegação</li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect active"><i class="ti-home"></i> <span> Ínicio </span> </a>
                                <ul class="list-unstyled">
                                    <li class="active"><a href="router.php?route=dashboard&action=inicio">Inicio</a></li>
                                    <li><a href="router.php?route=dashboard&action=perfil">Perfil</a></li>
                                </ul>
                            </li>
                            <?php if($user_ativo['permissoes'] == 1){ ?>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ti-text"></i><span> Palavras </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="router.php?route=dashboard&action=novaPalavra"> Adicionar Palavras</a></li>
                                    <li><a href="router.php?route=dashboard&action=listaPalavras"> Lista de Palavras</a></li>
                                    <li><a href="router.php?route=dashboard&action=dicasPalavras"> Dicas das Palavras</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="ti-wand"></i><span> Dicas </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="router.php?route=dashboard&action=novaDica"> Adicionar Dicas</a></li>
                                    <li><a href="router.php?route=dashboard&action=listaDicas"> Lista de Dicas</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="icon-user-follow"></i><span class="label label-success pull-right"><?= $user_ativo['nr_users']; ?></span><span> Utilizadores </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="router.php?route=dashboard&action=novoUser"> Adicionar Utilizadores</a></li>
                                    <li><a href="router.php?route=dashboard&action=listaUsers"> Lista de Utilizadores</a></li>
                                </ul>
                            </li>
                            <?php }else{ ?>
                              <li class="has_sub">
                                  <a href="#" class="waves-effect"><i class="icon-game-controller"></i><span> Jogo </span></a>
                                  <ul class="list-unstyled">
                                      <li><a href="router.php?route=jogo&action=jogar"> Jogar</a></li>
                                  </ul>
                              </li>
                            <?php } ?>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
