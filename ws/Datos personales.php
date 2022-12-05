<?php

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
  case 'GET':
    header("HTTP/1.1 200 successful");
    Mostrar_Datos_personales();
    break;
  default:
   header("HTTP/1.1 405 Method not allowed");
   header("Allow GET");
    break;
}

Function Mostrar_Datos_personales(){
  $link = mysqli_connect('a2nlmysql19plsk.secureserver.net','US','US123','UH');

  if(!$link){
     echo "error al conectar a mysql";
     exit;
  }


  $sql = "Select us.nombre,us.Apellido1,us.Apellido2,us.Id_usuario,us.Telefono,us.Usuario,us.Email,rol.Rol from Usuarios us INNER JOIN Roles rol ON rol.Id_rol=us.Id_Rol
  INNER JOIN Nivel niv ON niv.Id_nivel=rol.Id_nivel where us.Id_usuario=2147483647";

  $rs = $link->query($sql);

  $salida = "<table class='tabla-datos-personales'>";
  $salida .= "<tr>";
  $salida .= "<th class='Nombre'>Nombre</th>";
  $salida .= "<th>Apellido1</th>";
  $salida .= "<th>Apellido2</th>";
  $salida .= "<th>Cedula</th>";
  $salida .= "<th>telefono</th>";
  $salida .= "<th>usuario</th>";
  $salida .= "<th>Email</th>";
  $salida .= "<th>Rol</th>";
  $salida .= "</tr>";

  while($fila = $rs->fetch_assoc()){
    $salida .= "<tr>";
        $salida .= "<td>".$fila['nombre']."</td>";
        $salida .= "<td>".$fila['Apellido1']."</td>";
        $salida .= "<td>".$fila['Apellido2']."</td>";
        $salida .= "<td>".$fila['Id_usuario']."</td>";
        $salida .= "<td>".$fila['Telefono']."</td>";
        $salida .= "<td>".$fila['Usuario']."</td>";
        $salida .= "<td>".$fila['Email']."</td>";
        $salida .= "<td>".$fila['Rol']."</td>";
        $salida .= "<td></td>";
    $salida .= "</tr>";

  }
  $salida .= "</table>";
  echo $salida;

}



 ?>
