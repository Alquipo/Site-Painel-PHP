<?php

//criar cookie para lembrar

    if(isset($_COOKIE['lembrar'])){
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
        $sql->execute(array($user,$password));
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password']=$password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];

            header('location: '.INCLUDE_PATH_PAINEL);
            die();
        }
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
    <div class="box-login">
        <!--acessar o bando de dados e consultar o login-->
    <?php
        if(isset($_POST['acao'])){
            $user = $_POST['user'];
            $password = $_POST['password'];
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
            $sql->execute(array($user,$password));
            if($sql->rowCount() == 1){
                $info = $sql->fetch();
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['password']=$password;
                $_SESSION['cargo'] = $info['cargo'];
                $_SESSION['nome'] = $info['nome'];
                $_SESSION['img'] = $info['img'];
                //logica do lembrar coockie
                if(isset($_POST['lembrar'])){
                    setcookie('lembrar',true,time()+(60*60*24),'/');
                    setcookie('user',$user,time()+(60*60*24),'/');
                    setcookie('user',$password,time()+(60*60*24),'/');
                }
                header('location: '.INCLUDE_PATH_PAINEL);
                die();
            }else{
                echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
            }
        }

    ?>
        <h2>Efetue o Login!</h2>
        <form method="POST">
            <input type="text" name="user" placeholder="Login" required />
            <input type="password" name="password" placeholder="Senha" required />

            <div class="form-group-login left">
                 <input type="submit" name="acao" value="Logar!" />
            </div>
            
            <div class="form-group-login right">
                 <label>Lembrar-me</label>
                 <input type="checkbox" name="lembrar">
            </div>
            <div class="clear"></div>
        </form>


    </div>



</body>

</html>