<?php
require_once "conn/conn.php";

class model
{
    private $ins_conn;
    private $link;

    function __construct()
    {
        $this->ins_conn = new conn();
    }

    public function valLogin($usuario, $pass)
    {
        $this->link = $this->ins_conn->conectar();
        $sql = "select*";
        $sql .= "from Usuarios where Usuario='$usuario' and Contraseña=md5('uh_$pass')";
        $rs = $this->link->query($sql);
        $datos = []; // esto sera mi matriz

        while ($fila = $rs->fetch_assoc()) {
            if($fila['Id_rol']==2){
                $sql2 = "select*from Padre;";
                $rs2 = $this->link->query($sql2);
                while ($fila2 = $rs2->fetch_assoc()){
                    $datos['Id_usuario'] = $fila2['Id_Padre'];
                }
            }else{
                $datos['Id_usuario'] = $fila['Id_usuario'];
            }
            $datos['Email'] = $fila['Email'];
            $datos['Nombre'] = $fila['Nombre'];
            $datos['Apellido1'] = $fila['Apellido1'];
            $datos['Apellido2'] = $fila['Apellido2'];
            $datos['Telefono'] = $fila['Telefono'];
            $datos['Id_rol'] = $fila['Id_rol'];
           
        }

        $this->ins_conn->desconectar(); // puede q esto lo tengas q modificar!!!
        return $datos;
    }

    //crud
    public function getUsuarios()
    {
        //read
        // 'MD5('uh_$arr_nuevo_usuario[2]'),
    }
    public function setUsuario($arr_nuevo_usuario,$rol)
    {
        //create
        $this->link = $this->ins_conn->conectar();
        $sql = "INSERT INTO Registro_temporal";
        $sql .= " VALUES($arr_nuevo_usuario[0],
        '$arr_nuevo_usuario[1]',
        MD5('uh_$arr_nuevo_usuario[2]'),
        '$arr_nuevo_usuario[3]',
        '$arr_nuevo_usuario[4]',
        '$arr_nuevo_usuario[5]',
        '$arr_nuevo_usuario[6]',
      $arr_nuevo_usuario[7],
      $arr_nuevo_usuario[8]);";
        if($rol==2){
            $sql2 = "INSERT INTO Padre values($arr_nuevo_usuario[9],$arr_nuevo_usuario[0]);";
            try {
                if ($this->link->query($sql2) === true) {
                } else {
                }
            } catch (Exception $e) {
            }
        }

        try {
            if ($this->link->query($sql) === true) {
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            return "er";
        }
    }

    public function UptUsuario()
    {
        //update
    }
    public function delUsuario()
    {
        //delete
    }

    //padre
}
?>
