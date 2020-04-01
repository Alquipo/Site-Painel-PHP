<?php
    $usuariosOnline = Painel::listarUsuariosOnline();
    $pegarVisitasTotais = Painel::pegarVisitasTotais();
    $pegarVisitasHoje = Painel::pegarVisitasHoje()
    
?>


<section class="box-content w100">

    <h2><i class="fa fa-home"></i> Painel de Controle - <?php echo NOME_EMPRESA ?></h2>

    <section class="box-metricas">
        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Usúarios Online</h2>
                <p><?php echo count($usuariosOnline); ?></p>
            </div>
        </div>

        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Total de Visitas</h2>
                <p><?php echo $pegarVisitasTotais; ?></p>
            </div>
        </div>

        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Visitas Hoje</h2>
                <p><?php echo $pegarVisitasHoje; ?></p>
            </div>
        </div>
        <div class="clear"></div>
    </section>
</section>

<section class="box-content w50 left">

    <h2><i class="fas fa-users"></i> Usuarios online no Site</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div>
            <div class="col">
                <span>Última acao</span>
            </div>
            <div class="clear"></div>
        </div>

        <?php
            foreach($usuariosOnline as $key => $value){
        ?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['ip']; ?></span>
            </div>
            <div class="col">
                <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])); ?></span>
            </div>
            <div class="clear"></div>
        </div>

        <?php  }?>
    </div>

</section>

<section class="box-content w50 right">

    <h2><i class="fas fa-user"></i> Usuarios do Painel</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>Nome</span>
            </div>
            <div class="col">
                <span>Cargo</span>
            </div>
            <div class="clear"></div>
        </div>

        <?php
        //sistema para pegar usuarios no painel de controle
            $usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
            $usuariosPainel->execute();
            $usuariosPainel = $usuariosPainel->fetchall();

            foreach($usuariosPainel as $key => $value){
        ?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['user']; ?></span>
            </div>
            <div class="col">
                <span><?php echo pegaCargo($value['cargo']); ?></span>
            </div>
            <div class="clear"></div>
        </div>

        <?php  }?>
    </div>

</section>

<div class="clear"></div>
