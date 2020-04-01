<?php
    verificaPermissaoPagina(2);
    
?>
<section class="box-content">
    
    <h2><i class="fa fa-pencil"></i> Adicionar Usuário</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){

            $login = $_POST['login'];
            $nome = $_POST['nome'];
            $senha = $_POST['password'];
            $imagem = $_FILES['imagem'];
            $cargo = $_POST['cargo'];

            //validação de require no backEnd em vez de usar o require no frontend
            if($login == ''){
                Painel::alert('erro', 'O login está vazio');
            }else if($nome ==''){
                Painel::alert('erro', 'O nome está vazio');
            }else if($senha == ''){
                Painel::alert('erro', 'A senha está vazio');
            }else if($cargo == ''){
                Painel::alert('erro', 'O Cargo precisa estar selecionado');
            }else if($imagem['name'] == ''){
                Painel::alert('erro', 'A imagem precisa estar selecionada');
            }else{
                //podemos cadastrar
                if($cargo >= $_SESSION['cargo']){
                    Painel::alert('erro', 'Você precisa selecionar um cargo menor que o seu');
                }else if(Painel::imagemValida($imagem)== false){
                    Painel::alert('erro', 'O formato especificado não esta correto');
                }else if(Usuario::userExists($login)){
                    Painel::alert('erro', 'O login já existe! selecione outro por favor');
                }else{
                    //apenas cadastrar no banco de dados
                    $usuario = new Usuario();

                    $imagem = Painel::uploadFile($imagem);

                    $usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);

                    Painel::alert('sucesso', "O cadastro do usuário '${login}' foi realizado com sucesso");
                }
            }
          
        }
    ?>
        <div class="form-group">
            <label>Login:</label>
            <input type="text" name="login"  >
        </div>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" >
        </div>
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password"  >
        </div>
        <div class="form-group">
            <label>Cargo:</label>
            <select name="cargo">
                <?php
                    foreach (Painel::$cargos as $key => $value) {
                      if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
                    }

                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Imagem</label>
            <input type="file" name="imagem" >
            
        </div>

        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>


</section>