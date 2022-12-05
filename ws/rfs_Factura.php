<?php

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
    case 'GET':
        header("HTTP/1.1 200 successful");
        fn_listar_panel_Factura();
        break;
}



function fn_listar_panel_Factura()
{
  if (isset($_REQUEST['Id_usuario'])) {
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }
    $sql = "SELECT Email from Usuarios where Id_usuario=".$_REQUEST['Id_usuario']."";
    $rs = $link->query($sql);
    $fila = $rs->fetch_assoc();
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "ProyectoProgramacion3.123";
    $to = "'".$fila['Email']."'";
    $subject = "Checking PHP mail";
    $message = "PHP mail works just fine";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
  }else{
    echo "error";
  }
}


?>
