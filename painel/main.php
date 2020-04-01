<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
       
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Painel de controle</title>

    <!--Required Meta Tag-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/a0fd9e46f4.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
</head>

<body>
    <div class="menu">
        <div class="menu-wraper">
            <div class="box-usuario">
                <!-- verificar se a sessao tem imagem para efetuar a troca -->
                <?php

                    if($_SESSION['img'] == ''){
                ?>
                <div class="avatar-usuario">
                    <i class="fa fa-user"></i>
                </div>

                <?php }else{ ?>
                    <div class="imagem-usuario">
                    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" >
                    </div>

                <?php } ?>

                <div class="nome-usuario">
                    <p><?php echo $_SESSION['nome']; ?></p>
                    <p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
                </div>
            </div>
            <div class="itens-menu">
                <h2>Cadastro</h2>
                <a <?php selecionadoMenu('cadastrar-depoimentos');?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimentos">Cadastrar Depoimento</a>
                <a <?php selecionadoMenu('cadastrar-serviço');?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-servico">Cadastrar Serviço</a>
                <a <?php selecionadoMenu('cadastrar-slides');?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides">Cadastrar Slides</a>
                <h2>Gestão</h2>
                <a <?php selecionadoMenu('listar-depoimentos');?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar Depoimentos</a>
                <a <?php selecionadoMenu('listar-servicos');?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos">Listar Serviços</a>
                <a <?php selecionadoMenu('listar-slides');?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">Listar Slides</a>
                <h2>Administração do Painel</h2>
                <a <?php selecionadoMenu('editar-usuario');?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuários</a>
                <a <?php selecionadoMenu('adicionar-usuarios'); verificaPermissaoMenu(2);?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuarios">Adicionar usuários</a>
                <h2>Configuração Geral</h2>
                <a <?php selecionadoMenu('editar-site');?>  href="<?php echo INCLUDE_PATH_PAINEL ?>editar-site">Editar Site</a>
                
            </div>
        </div>
    </div>
    <header>
        <div class="center">
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
            
            <div class="loggout">
                <a <?php if(@$_GET['url'] == ''){ ?> style="background: #60727a;padding: 20px 10px;"<?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"> <i class="fa fa-home"></i> <span>Página Inicial</span></a>

                <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"> <i class="fa fa-window-close"></i>  <span>Sair</span></a>
            </div>
        </div>
        <div class="clear"></div>
    </header>
    
    <div class="content">
    
        <?php Painel::loadPage() ?>
       
    </div>
    <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>

</html>