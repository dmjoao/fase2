<?php header('HTTP/1.1 404 Not Found'); ?>

<?php
    function verificaRota($sPagina) {
        $vPaginas = ["index","inicial","empresa","produtos","servicos","contato"];
        if(in_array($sPagina,$vPaginas)){
            if(is_file(__DIR__."/".$sPagina.".php")){
                if($sPagina == "index")
                    $sPagina = "inicial";
                require_once($sPagina.".php");
            }
        }else{
            if($sPagina == "")
                require_once("inicial.php");
            else
                require_once("erro.php");               
        }
    }

    $vRota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    $sPaginaRota = $vRota['path'];
    $sPagina = substr($sPaginaRota,1);
    $sPagina = strtolower($sPagina);
?>



	<?php
	    require_once("includes/cabecalho.php");
  	    require_once("includes/menu.php");
	    verificaRota($sPagina);
	    require_once("includes/rodape.php");
	?>