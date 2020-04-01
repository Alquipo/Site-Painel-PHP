<?php
  
   session_start();
   date_default_timezone_set('America/Sao_Paulo');
   
   //autoload de classes dinamico

    $autoload = function($class){
        if($class == 'Email'){
			require 'vendor/autoload.php';
		}
        include('class/'.$class.'.php');
    };

    spl_autoload_register($autoload);

   
      
   //constantes para diretorio de arquivos
    define('INCLUDE_PATH', 'http://localhost/Danki_Cursos/Projetos_PHP_Danki/Site_Empresa_PHP/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    define('BASE_DIR_PAINEL',__DIR__.'/painel');


    //contantes para o banco de dados
    //conectar ao banco de dados
    define('HOST', 'localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','site_empresa_teste');

    //Constantes para o painel de controle
    define('NOME_EMPRESA','Alquipo Sistemas');

    

    //funções do painel
    function pegaCargo($indice){
        return Painel::$cargos[$indice];
        
    }

    function selecionadoMenu($par){
        $url = explode('/',@$_GET['url'])[0];
        if($url == $par){
            echo 'class="menu-active"';
        }
    }

    function verificaPermissaoMenu($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            echo 'style="display:none;"';
        }
    }

    function verificaPermissaoPagina($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            include('painel/pages/permissao-negada.php');
            die();
        }
    }

    
?> 