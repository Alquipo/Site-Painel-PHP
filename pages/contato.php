<div id="map"></div>
<div class="contato-conteiner">
    <div class="center">
        <form method="POST" action="">
            <input type="text" name="nome" placeholder="Nome" required/>
            <div></div>
            <input type="email" name="email" placeholder="E-mail" required/>
            <div></div>
            <input type="text" name="telefone" placeholder="Telefone" required/>
            <div></div>
            <textarea name="mensagem" placeholder="Sua mensagem" required></textarea>
            <div></div>
            <input type="hidden" name="identificador" value="form_contato"/>
            <input type="submit" name="acao" value="Enviar"/>
        </form>
    </div><!--center-->
</div><!--contato-conteiner-->
<?php ?>