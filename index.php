<?php 
$vPaginas = [
    ""         => "inicial.php",
    "index"    => "inicial.php",
    "inicial"  => "inicial.php",
    "empresa"  => "empresa.php",
    "produtos" => "produtos.php",
    "servicos" => "servicos.php",
    "contato"  => "contato.php"
];
    	
function verificaRota($sPagina) {
    if (array_key_exists($sPagina, $vPaginas) && is_file(__DIR__. "/" . $vPaginas[$sPagina]) {
	require_once __DIR__ . "/" . $vPaginas[$sPagina];
    } else {
        http_response_code(404);
        require_once "erro.php";
    }
}

$vRota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$sPaginaRota = $vRota['path'];
$sPagina = substr($sPaginaRota,1);
$sPagina = strtolower($sPagina);
    
require_once("includes/cabecalho.php");
require_once("includes/menu.php");
verificaRota($sPagina);
require_once("includes/rodape.php");