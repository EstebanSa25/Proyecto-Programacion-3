<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();
require_once 'libs/smarty_4_2_1/config_smarty.php';
require_once 'model/model.php';
class control
{
    private $insView;
    private $ins_model;
    function __construct()
    {
        $this->insView = new config_smarty();
        $this->ins_model = new model();
    }
    public function get_insView()
    {
        return $this->insView;
    }
    public function set_insView($new_inst)
    {
        $this->insView = $new_inst;
    }

    public function gestor_acciones()
    {
        // administrador del menu!!!
        if (isset($_SESSION['usuario'])) {
            $this->insView->setAssign("_data", "");
            $this->insView->setAssign("_nombre", $_SESSION['nombre'] . " " . $_SESSION['apell1']);
            $this->insView->setAssign("rol", $_SESSION['rol']);
            $this->insView->setAssign("_Id_usuario", $_SESSION['id_usuario']);
            $this->insView->setDisplay("Principal.tpl");
            //echo "entro al sistema  <a href='logoff.php'>Salir</a>";
            exit();
        }
        if (isset($_REQUEST["accion"])) {
            $accion = $_REQUEST["accion"];

            switch ($accion) {
                case "login":
                    $this->validar_login();
                    break;
                case "abrir_frm_registro":
                    $this->insView->setAssign("msg", "");
                    $this->insView->setDisplay("frm_registro.tpl");
                    break;
                case "registrar_nuevo_usuario":
                    $rol_num = 1;
                    $this->crear_nuevo_usuario();
                    break;
                case "registrar_nuevo_usuario_padre":
                    $rol_num = 2;
                    $this->crear_nuevo_usuario();
                    break;
                case "abrir_login":
                    $this->insView->setAssign("msg", "");
                    $this->insView->setDisplay("login.tpl");
                    break;
                case "abrir_registro":
                    $this->insView->setAssign("msg", "");
                    $this->insView->setDisplay("Registro.tpl");
                    break;
                case "abrir_pagina_principal":
                    $this->insView->setAssign("msg", "");
                    $this->insView->setDisplay("index.tpl");
                    break;
                case "abrir_registro_alumno":
                    $rol_definido = 1;
                    $this->insView->setAssign("msg", "");
                    $this->insView->setDisplay("Alumno_create.tpl");
                    break;
                case "abrir_registro_padres":
                    $rol_definido = 2;
                    $this->insView->setAssign("msg", "");
                    $this->insView->setDisplay("Padre_create.tpl");
                    break;

                default:
                    $this->insView->setAssign("msg", "");
                    $this->insView->setDisplay("Principal.tpl");
                    break;
            }
        } else {
            $this->insView->setAssign("msg", "");
            $this->insView->setDisplay("index.tpl");
        }
    }

    public function crear_nuevo_usuario()
    {
        $this->insView->setAssign("ejecutar_alumno", " ");
        $this->insView->setAssign("action_alerta", " ");
        $this->insView->setAssign("msg", " ");
        $nombre = $_REQUEST["nombre"];
        $apellido1 = $_REQUEST["apell1"];
        $apellido2 = $_REQUEST["apell2"];
        $cedula = $_REQUEST["Id_usuario"];
        $telefono = $_REQUEST["telefono"];
        $email = $_REQUEST["email"];
        $usuario = $_REQUEST["usuario"];
        $pass = $_REQUEST["password"];
        $confirmar = $_REQUEST["password_confirmar"];
        $rol = $_REQUEST["Id_rol"];
        if ($pass != $confirmar) {
            if (isset($_REQUEST["accion"])) {
                $accion = $_REQUEST["accion"];
                switch ($accion) {
                    case 'registrar_nuevo_usuario':
                        $this->insView->setAssign(
                            "ejecutar_alumno",
                            "document.getElementById('nombre').value = '$nombre';
                            document.getElementById('apell1').value = '$apellido1';
                            document.getElementById('apell2').value = '$apellido2';
                            document.getElementById('apell2').value = '$apellido2';
                            document.getElementById('Id_usuario').value = '$cedula';
                            document.getElementById('telefono').value = '$telefono';
                            document.getElementById('email').value = '$email';
                            document.getElementById('usuario').value = '$usuario';"
                        );
                        $this->insView->setAssign("msg", "Las contraseñas no coinciden");
                        $this->insView->setDisplay("Alumno_create.tpl");

                        break;

                    case 'registrar_nuevo_usuario_padre':
                        $nombre_hijo = $_REQUEST["nombre_hijo"];
                        $this->insView->setAssign(
                            "ejecutar_padre",
                            "document.getElementById('nombre').value = '$nombre';
                            document.getElementById('apell1').value = '$apellido1';
                            document.getElementById('apell2').value = '$apellido2';
                            document.getElementById('apell2').value = '$apellido2';
                            document.getElementById('Id_usuario').value = '$cedula';
                            document.getElementById('telefono').value = '$telefono';
                            document.getElementById('email').value = '$email';
                            document.getElementById('usuario').value = '$usuario';
                            document.getElementById('cedula_hijo').value = '$nombre_hijo';");
                        $this->insView->setAssign("msg", "Las contraseñas no coinciden");
                        $this->insView->setDisplay("Padre_create.tpl");
                        break;
                }
            }
        } else {
            $arr_nuevo_usuario = [];
            $arr_nuevo_usuario[0] = $cedula;
            $arr_nuevo_usuario[1] = $usuario;
            $arr_nuevo_usuario[2] = $pass;
            $arr_nuevo_usuario[3] = $email;
            $arr_nuevo_usuario[4] = $nombre;
            $arr_nuevo_usuario[5] = $apellido1;
            $arr_nuevo_usuario[6] = $apellido2;
            $arr_nuevo_usuario[7] = $telefono;
            $arr_nuevo_usuario[8] = $rol;
            if($rol==2){
                $cedulaHijo = $_REQUEST['nombre_hijo'];
                $arr_nuevo_usuario[9] = $cedulaHijo;
            }

            $rs = $this->ins_model->setUsuario($arr_nuevo_usuario,$rol);
            $this->insView->setAssign("msg", " ");

            if ($rs == "ok") {
                $this->insView->setAssign("msg", "Usuario Creado correctamente!!");
                $this->insView->setAssign("action_alerta", "mostrar_alerta_correcto('Usuario Creado correctamente!!');");
                $this->insView->setDisplay("index.tpl");
            } else {
                $this->insView->setAssign("msg", "Error al crear el usuario,ingrese los datos correctamente");
                $this->insView->setAssign("action_alerta", "mostrar_alerta_incorrecto('Error al crear el usuario,ingrese los datos correctamente');");
                $this->insView->setDisplay("Alumno_create.tpl");
            }
        }
    }
    // padre

    //padre
    public function validar_login()
    {
        $usuario = $_REQUEST["usuario"];
        $pass = $_REQUEST["password"];

        $rs = $this->ins_model->valLogin($usuario, $pass);

        if (sizeof($rs) > 0) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['id_usuario'] = $rs['Id_usuario'];
            $_SESSION['email'] = $rs['Email'];
            $_SESSION['nombre'] = $rs['Nombre'];
            $_SESSION['apell1'] = $rs['Apellido1'];
            $_SESSION['apell2'] = $rs['Apellido2'];
            $_SESSION['telefono'] = $rs['Telefono'];
            $_SESSION['rol'] = $rs['Id_rol'];
            $this->insView->setAssign("_nombre", $_SESSION['nombre'] . " " . $_SESSION['apell1']);
            $this->insView->setAssign("rol", $_SESSION['rol']);
            $this->insView->setAssign("_Id_usuario", $_SESSION['id_usuario']);
            $this->insView->setDisplay("Principal.tpl");
            //echo "entro al sistema";
        } else {
            $this->insView->setAssign("msg", "Error! usuario o pass invalido!!");
            $this->insView->setDisplay("login.tpl");
        }
    }
}

?>
