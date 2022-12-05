<?php

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
    case 'GET':
        header("HTTP/1.1 200 successful");
        fn_listar_panel_chat();
        break;
}



function fn_listar_panel_chat()
{
    $salida = "<iframe class='iframe_chat' src='https://www.tidio.com/panel/inbox/conversations?stream=unassigned' frameborder=0' style='position: absolute; height: 100%; overflow:hidden'width=100% ></iframe>";
    $salida .= "<h1>insertarEnTidio</h1>";
    echo $salida;
    
}


?>
