
<section class="box-content">
    
    <h2><i class="fa fa-pencil"></i> Cadastrar Slide</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){

            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];
           

            //validação de require no backEnd em vez de usar o require no frontend
            if($nome == ''){
                Painel::alert('erro', 'O campo nome não pode ficar vazio');
            }else{
                //podemos cadastrar
                if(Painel::imagemValida($imagem)== false){
                    Painel::alert('erro', 'O formato especificado não esta correto');
                }else{
                    //apenas cadastrar no banco de dados
                    include('../class/lib-wideImage/wideImage.php');
                    $imagem = Painel::uploadFile($imagem);
                    //lib wide imagem
                   // WideImage::load('uploads/'.$imagem)->resize(100)->saveToFile('uploads/'.$imagem);

                    $arr = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site.slides'];
                    Painel::insert($arr);
                    Painel::alert('sucesso', "O cadastro do slide foi realizado com sucesso");
                }
            }
          
        }
    ?>
        <div class="form-group">
            <label>Nome do Slide:</label>
            <input type="text" name="nome"  >
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