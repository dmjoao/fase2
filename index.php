<?php
	ob_start();
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
                header("HTTP/1.0 404 Not Found");
        }
    }

    $vRota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    $sPaginaRota = $vRota['path'];
    $sPagina = substr($sPaginaRota,1);
    $sPagina = strtolower($sPagina);
?>


<!DOCTYPE html>
<html>
<head>
<!-- Início do cabecalho -->
	<?php
	    require_once("includes/cabecalho.php");
	?>
<!-- Fim do cabecalho -->
</head>

<body>
	<?php
	    require_once("includes/menu.php");
	    verificaRota($sPagina);
	?>

<!-- Início do rodapé -->
	<?php
	    require_once("includes/rodape.php");
	?>
<!-- Fim do rodapé -->	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>