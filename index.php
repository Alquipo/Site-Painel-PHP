<?php
    include('config.php');
    Site::updateUsuarioOnline();
    Site::contador();

    $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
    $infoSite->execute();
    $infoSite = $infoSite->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title><?php echo $infoSite['titulo']; ?></title>
    <!-- AWESOME -->
    <script src="https://kit.fontawesome.com/a0fd9e46f4.js" crossorigin="anonymous"></script>
    <!-- FONTE -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css">
    <!--Required Meta Tag-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Meta Tag de SEO -->
    <meta name="description" content="Descrição do meu site">
    <meta name="keywords" content="Palavra-chave,do,meu,site">

    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon">
</head>

<body>

    <base base="<?php echo INCLUDE_PATH; ?>" />

    <?php
    //colocando URL Dinamicas
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        switch ($url) {
            case 'sobre':
                echo '<target target="sobre"/>';
                break;

            case 'servicos':
                echo '<target target="servicos"/>';
                break;
    }
    ?>
    <div class="sucesso">Formulário enviado com sucesso</div>
    <div class="overlay-loading">
        <img src="<?php echo INCLUDE_PATH; ?>img/ajax-loader.gif" />
    </div>
    <!--overlay-loading -->

    <header>
        <div class="center">
            <div class="logo left"><a href="<?php echo INCLUDE_PATH; ?>">Logomarca</a></div>
            <!--logo-->
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile">
                    <i class="fas fa-bars"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </header>

    <div class="container-principal">
        <?php
        //verificar se a url existe
            if(file_exists("pages/${url}.php")){
                include("pages/${url}.php");
            }else{
                //podemos adicionar o que quiser, pagina não ira carregar
                if ($url != 'sobre' && $url != 'servicos') {
                    $pagina404 = true;
                    include('pages/404.php');
                } else {
                    include('pages/home.php');
                }
            }
        ?>
    </div>
    <!--container principal-->

    <footer <?php if (isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
        <div class="center">
            <p>Todos os direitos reservados</p>
        </div>
    </footer>

    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
    
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>

        
    <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
    

    <!-- validacao para exibir script somento na pagina contatos -->
    
    <script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>
</body>

</html>