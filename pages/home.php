


<section class="banner-container">
    <!-- Slider -->
    <div style="background:url('<?php echo INCLUDE_PATH; ?>img/bg-form.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;" class="banner-single"></div>
    <!--banne-single-->
    <div style="background:url('<?php echo INCLUDE_PATH; ?>img/bg-form2.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;" class="banner-single"></div>
    <!--banne-single-->
    <div style="background:url('<?php echo INCLUDE_PATH; ?>img/bg-form3.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;" class="banner-single"></div>
    <!--banne-single-->
    <div class="overlay"></div>
    <div class="center">

        <form method="post">
            <h2>Qual o seu melhor e-mail</h2>
            <input type="email" name="email" required />
            <input type="hidden" name="identificador" value="form_home" />
            <input type="submit" name="acao" value="Cadastrar!" />
        </form>
    </div>
    <!--center-->

    <!-- adicionar navegação slider-->
    <div class="bullets">

    </div>

</section>
<!-- banner-principal-->
<section id="sobre" class="descricao-autor">
    <div class="center">
        <div class="w50 left">
            <h2><?php echo $infoSite['nome_autor']; ?></h2>
            <p><?php echo $infoSite['descricao']; ?></p>
           
        </div><!-- w50-->
        <div class="w50 left"><img class="right" src="<?php echo INCLUDE_PATH; ?>img/foto.png" alt="" width="395px" height="410px"></div>

    </div><!-- center-->
    <div class="clear"></div>
</section><!-- descricao-autor-->

<section class="especialidades">
    <div class="center">
        <h2 class="title">Minhas Especialidades</h2>
        <div class="w33 left box-especialidade">
            <h3><i class="<?php echo $infoSite['icone1']; ?>"></i></h3>
            <h4>css3</h4>
            <p><?php echo $infoSite['descricao1']; ?></p>
        </div>
        <!--box-especialidade-->

        <div class="w33 left box-especialidade">
            <h3><i class="<?php echo $infoSite['icone2']; ?>"></i></h3>
            <h4>html 5</h4>
            <p><?php echo $infoSite['descricao2']; ?></p>
        </div>
        <!--box-especialidade-->

        <div class="w33 left box-especialidade">
            <h3><i class="<?php echo $infoSite['icone2']; ?>"></i></h3>
            <h4>JavaScript</h4>
            <p><?php echo $infoSite['descricao3']; ?></p>
        </div>
        <!--box-especialidade-->

    </div>
    <div class="clear"></div>
</section>
<!--especialidades-->

<section class="extras">
    <div class="center">
        <div id="depoimentos" class="w50 left depoimentos-container">
            <h2 class="title">Depoimentos dos nossos clientes</h2>
            <?php
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3 ");
                $sql->execute();
                $depoimentos = $sql->fetchAll();
                
                foreach ($depoimentos as $key => $value) {
                    
            ?>

            <div class="depoimento-single">
                <p class="depoimento-descricao"><?php echo $value['depoimento']; ?></p>
                <p class="nome-autor"><?php echo $value['nome']; ?> - <?php echo $value['data'] ?></p>
            </div>

            <?php  } ?>

        </div>
        <!--w50-->

        <div id="servicos" class="w50 left servicos-container">
            <h2 class="title">Serviços</h2>
            <div class="servicos">
                <ul>
                    <?php
                        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.servicos` ORDER BY order_id ASC LIMIT 3 ");
                        $sql->execute();
                        $servicos = $sql->fetchAll();
                        
                        foreach ($servicos as $key => $value) {
                    ?>
                    <li><?php echo $value['servico']; ?></li>

                    <?php } ?>

                    </ul>
            </div>
        </div>
        <!--w50-->
        <div class="clear"></div>
    </div>
    <!--center-->
</section>
<!--extras-->