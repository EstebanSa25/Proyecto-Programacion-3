<?php


$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
  case 'GET':
    header("HTTP/1.1 200 successful");
    fn_listar_usuarios();
    break;

  default:
   header("HTTP/1.1 405 Method not allowed");
   header("Allow GET");
    break;
}



function fn_listar_usuarios(){
if(isset($_REQUEST['Id_usuario'])){
$link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
  if(!$link){
     echo "error al conectar a mysql";
     exit;
  }
  $sql = "SELECT Id_usuario,Usuario,Email,Nombre,Apellido1,Apellido2,Telefono,Id_rol FROM Usuarios where Id_usuario=".$_REQUEST['Id_usuario'].";";
  $rs = $link->query($sql);
  $fila = $rs->fetch_assoc();
$salida="<div class='container mt-4'>
<h1 class='display-4 text-center'>
  <i class='fas fa-user text-secondary'></i><span class='text-dark'>  MIS DATOS <span class='text-danger'>  PERSONALES</span></span></h1>
  <form id='book-form'>
    <div class='form-group'>
      <label for='Nombre'>Nombre</label>
      <input readonly type='text' class='form-control' value=".$fila['Nombre'].">
    </div>
    <div class='form-group'>
      <label for='author'>Primer apellido</label>
      <input readonly type='text'class='form-control' value=".$fila['Apellido1'].">
    </div>
    <div class='form-group'>
      <label for='author'>Segundo apellido</label>
      <input readonly type='text'class='form-control' value=".$fila['Apellido2'].">
    </div>
    <div class='form-group'>
    <label for='author'>Correo electronico</label>
    <input readonly type='email' class='form-control' value=".$fila['Email'].">
  </div>
  <div class='form-group'>
  <label for='author'>Usuario</label>
  <input readonly type='text' class='form-control' value=".$fila['Usuario'].">
</div>
<div class='form-group'>
<label for='author'>Telefono</label>
<input readonly type='tel' class='form-control' value=".$fila['Telefono'].">
</div>
  <div class='form-group'>
    <label for='author'>Cedula</label>
    <input readonly type='text' class='form-control' value=".$fila['Id_usuario'].">
  </div>
  </form>
</div>
";

  echo $salida;
}else {
  echo "Error en WS";
  exit();
}
}

 ?>
