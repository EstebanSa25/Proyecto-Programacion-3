<?php
if (isset($_REQUEST["accion"])) {
    $accion = $_REQUEST["accion"];

    $metodo = $_SERVER["REQUEST_METHOD"];
    switch ($metodo) {
        case "GET":
            header("HTTP/1.1 200 successful");
            switch ($accion) {
                case "Colocar_asistencia":
                    fn_listar_horario();
                    break;
                case "Colocar_promedios":
                    fn_listar_materia();
                    break;
                case "mostrar_alumnos_asistencia":
                    fn_listar_Asistencia();
                    break;
                case "traer_lista_asistencia_editar":
                    fn_mostrar_asistencia_editar();
                    break;
                case "mostrar_alumnos_promedio":
                    fn_listar_estudiantes_promedio();
                    break;
                case "lista_promedios_editar":
                    fn_mostrar_promedios();
                    break;
                case "Mostrar_todos_mis_alumnos":
                    fn_listar_alumnos_totales();
                    break;
                case "Mostrar_todos_los_profesores":
                    fn_listar_todos_los_profesores();
                    break;
            }
            // Mostrar_Compañeros();

            break;
        case "DELETE":
            header("HTTP/1.1 200 successful");
            fn_borrar_usuario();
            break;
        case "POST":
            switch ($accion) {
                case "Editar_asistencia_alumno":
                    fn_actualizar_asistencia();
                    break;
                case "Editar_promedio_alumno":
                    fn_actualizar_promedios();
                    break;
            }
            break;
        case "PUT":
            switch ($accion) {
                case "insertar_asistencia_de_alumno":
                    fn_insertar_asistencia();
                    break;
                case "Insertar_nota":
                    fn_insertar_promedio();
                    break;
            }
            break;
        default:
            header("HTTP/1.1 405 Method not allowed");
            header("Allow GET");
            break;
    }
}
//----------Asistencia-----------Asistencia----------------Asistencia-----------------------//
//Asistencia
function fn_listar_horario()
{
    if (isset($_REQUEST["Id_usuario"])) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql =
            "select asig.Nombre,hor.HoraInicio,hor.HoraFin,niv.Aula,hor.Dia,asig.Id_asignatura from Usuarios us INNER JOIN Asignatura asig ON asig.Id_profesor=us.Id_usuario
            INNER JOIN Horario hor On hor.Id_asignatura=asig.Id_asignatura INNER JOIN Nivel niv ON niv.Id_nivel=asig.Id_nivel where asig.Id_profesor=" .
            $_REQUEST["Id_usuario"] .
            " ;";
        $rs = $link->query($sql);
        $salida = "<div class='container'>
        <!-- TIMELINE -->
        <div id='2020' class='spacer-toc'><i class='fa fa-calendar'></i></div>
        <h2 class='border-line'>Curso lectivo 2022</h2>";

        while ($fila = $rs->fetch_assoc()) {
            $HoraInicio_12hr = date("g:i a", strtotime($fila["HoraInicio"]));
            $HoraFin_12hr = date("g:i a", strtotime($fila["HoraFin"]));

            $salida .=
                "
<!-- 2020 -->
<div onclick='ajax_metodos(`rsf_Profesor.php?accion=mostrar_alumnos_asistencia`,`GET`,`&Id_asignatura=" .
                $fila["Id_asignatura"] .
                "`)' class='eventWrapper'>
	<div class='event'>
		<div class='event--img'>
		<img src='http://localhost/ProyectoProgramacion3/SVG/logo-color.svg' width='20px'>
		</div>
		<div class='event--date'><span>Aula</span><span>" .
                $fila["Aula"] .
                "</span><span>Dia: " .
                $fila["Dia"] .
                "</span></div>
		<div class='event--content'>
			<h2>" .
                $fila["Nombre"] .
                "</h2>
			<p class='event--content-hall'>" .
                $HoraInicio_12hr .
                " a " .
                $HoraFin_12hr .
                "</p>
			<p class='event--content-ensemble'>Curso lectivo 2022</p>
		</div>
	</div>

</div><!-- container -->";
        }
        echo $salida;
    } else {
        echo "Error en WS";
        exit();
    }
}
//lista de alumnos
function fn_listar_Asistencia()
{
    if (isset($_REQUEST["Id_asignatura"])) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );

        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql =
            "select DISTINCT us.Nombre,us.Apellido1,us.Apellido2,us.Id_usuario from Asignatura_has_alumno has INNER JOIN Asignatura asig On asig.Id_asignatura=has.Id_asignatura INNER JOIN Usuarios us On us.Id_usuario=has.Id_alumno where asig.Id_asignatura=" .
            $_REQUEST["Id_asignatura"] .
            ";";
        $rs = $link->query($sql);
        $salida =
            "<span class='txt-aprobar_usu'>Lista de asistencia<span class='txt-rojo'>USUARIO</span></span></h1>";
        $salida .= "<table class='table table-striped'>";
        $salida .= "<tr>";
        $salida .= "<th>Cedula</th>";
        $salida .= "<th>Nombre</th>";
        $salida .= "<th>Apellido1</th>";
        $salida .= "<th>Apellido2</th>";
        $salida .= "<th>Accion</th>";
        $salida .= "</tr>";
        $msg = "hola";
        while ($fila = $rs->fetch_assoc()) {
            $salida .=
                "<tr><input type='hidden' id='cedula_alumno' value='" .
                $fila["Id_usuario"] .
                "'><input type='hidden' id='Id_asignatura_asistencia' value='" .
                $_REQUEST["Id_asignatura"] .
                "'>";
            $salida .= "<td>" . $fila["Id_usuario"] . "</td> ";
            $salida .= "<td>" . $fila["Nombre"] . "</td>";
            $salida .= "<td>" . $fila["Apellido1"] . "</td>";
            $salida .= "<td>" . $fila["Apellido2"] . "</td>";
            $salida .=
                "<td><img id='editar'onclick='recuperar_cedula(" .
                $fila["Id_usuario"] .
                ")' src='http://localhost/ProyectoProgramacion3/images/presente.png'data-bs-toggle='modal' data-bs-target='#asistencia' title='Colocar_Asistencia' style='cursor: pointer;' width='50px'>
        <img onclick='ajax_metodos(`rsf_Profesor.php?accion=traer_lista_asistencia_editar&Id_usuario=`,`GET`," .
                $fila["Id_usuario"] .
                ")' id='editar' src='http://localhost/ProyectoProgramacion3/SVG/edit.svg' title='Colocar_Asistencia' style='cursor: pointer;' width='50px'>
        </td>";
            $salida .= "</tr>";
        }
        $salida .= "</table>";
        echo $salida;
    }
}
//Lista de alumnos
//Pantalla para editar asistencia
function fn_mostrar_asistencia_editar()
{
    if (isset($_REQUEST["Id_usuario"])) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );

        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }

        $sql =
            " SELECT fa.Fecha, fa.Justificada, asig.Nombre,has.Id_alumno,asig.Id_asignatura FROM  Asignatura_has_alumno has, Asignatura asig,
            Falta_Asistencia fa
            where has.Id_asignatura = asig.Id_asignatura
            AND fa.Id_alumno = has.Id_alumno
            AND fa.Id_asignatura = asig.Id_asignatura
            AND has.Id_alumno = " . $_REQUEST["Id_usuario"];

        $rs = $link->query($sql);
        $salida = "<table class='table table-striped'>";
        $salida .= "<tr>";
        $salida .= "<th>Nombre</th>";
        $salida .= "<th>Fecha</th>";
        $salida .= "<th>Justificado</th>";
        $salida .= "<th>Editar</th>";
        $salida .= "</tr>";
        $msg = "hola";
        $salida .= "<tbody>";
        $contador = 0;
        while ($fila = $rs->fetch_assoc()) {
            $salida .= "<tr>";
            $salida .= "<td>" . $fila["Nombre"] . "</td>";
            $salida .= "<td>" . $fila["Fecha"] . "</td>";
            $salida .= "<td> <select class='custom-select' id='Tipo_Asistencia_editar{$contador}'>";
            if ($fila["Justificada"] == "Presente") {
                $salida .= " <option selected value='Presente'>Presente</option>
                        <option value='Ausente'>Ausente</option>
                        <option value='Ausencia Justificada'>Ausencia Justificada</option>
                    </select></td>";
            } elseif ($fila["Justificada"] == "Ausente") {
                $salida .= " <option value='Presente'>Presente</option>
                        <option selected value='Ausente'>Ausente</option>
                        <option value='Ausencia Justificada'>Ausencia Justificada</option>
                    </select></td>";
            } else {
                $salida .= " <option value='Presente'>Presente</option>
                        <option value='Ausente'>Ausente</option>
                        <option selected value='Ausencia Justificada'>Ausencia Justificada</option>
                    </select></td>";
            }
            $salida .=
                "<td><input type='submit' onclick='fn_actualizar_asistencia($contador," .
                $fila["Id_alumno"] .
                "," .
                $fila["Id_asignatura"] .
                ",`" .
                $fila["Fecha"] .
                "`);' id='submit_asistencia{$contador}' value='Enviar'></td>";
            $salida .= "</tr>";
            $contador++;
        }
        $salida .= "</tbody>";
        $salida .= "</table>";
        echo $salida;
    }
}
//Pantalla para editar asistencia
//Metodo para actualizar asistencia
function fn_actualizar_asistencia()
{
    if (
        isset(
            $_REQUEST["Id_usuario"],
            $_REQUEST["Id_asignatura"],
            $_REQUEST["Fecha"],
            $_REQUEST["Justificada"]
        )
    ) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql =
            " Update Falta_Asistencia set Justificada='" .
            $_REQUEST["Justificada"] .
            "' where Id_alumno=" .
            $_REQUEST["Id_usuario"] .
            " and Fecha='" .
            $_REQUEST["Fecha"] .
            "' and Id_asignatura=" .
            $_REQUEST["Id_asignatura"] .
            ";";
        try {
            if ($link->query($sql) === true) {
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "error";

            return "er";
        }
    } else {
        echo "Error en WS";
        exit();
    }
}
//Medodo para actualizar asistencia
//Metodo para insertar asistencia
function fn_insertar_asistencia()
{
    if (
        isset(
            $_REQUEST["Id_usuario"],
            $_REQUEST["Id_asignatura"],
            $_REQUEST["Fecha"],
            $_REQUEST["Justificada"]
        )
    ) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql =
            " Insert into Falta_Asistencia values(" .
            $_REQUEST["Id_usuario"] .
            "," .
            $_REQUEST["Id_asignatura"] .
            ",'" .
            $_REQUEST["Fecha"] .
            "','" .
            $_REQUEST["Justificada"] .
            "');";
        try {
            if ($link->query($sql) === true) {
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "error";

            return "er";
        }
    } else {
        echo "Error en WS";
        exit();
    }
}
//Metodo para insertar asistencia
//Asistencia
//----------Promedios-----------Promedios----------------Promedios-----------------------//
//Promedios
//metodo traer las materias
function fn_listar_materia()
{
    if (isset($_REQUEST["Id_usuario"])) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql =
            "select asig.Nombre,hor.HoraInicio,hor.HoraFin,niv.Aula,hor.Dia,asig.Id_asignatura from Usuarios us INNER JOIN Asignatura asig ON asig.Id_profesor=us.Id_usuario
            INNER JOIN Horario hor On hor.Id_asignatura=asig.Id_asignatura INNER JOIN Nivel niv ON niv.Id_nivel=asig.Id_nivel where asig.Id_profesor=" .
            $_REQUEST["Id_usuario"] .
            " ;";
        $rs = $link->query($sql);
        $salida = "<div class='container'>
        <!-- TIMELINE -->
        <div id='2020' class='spacer-toc'><i class='fa fa-calendar'></i></div>
        <h2 class='border-line'>Curso lectivo 2022</h2>";

        while ($fila = $rs->fetch_assoc()) {
            $HoraInicio_12hr = date("g:i a", strtotime($fila["HoraInicio"]));
            $HoraFin_12hr = date("g:i a", strtotime($fila["HoraFin"]));

            $salida .=
                "
<!-- 2020 -->
<div onclick='GETService_accion(`rsf_Profesor.php?accion=mostrar_alumnos_promedio`,`&Id_asignatura=`," .
                $fila["Id_asignatura"] .
                ")' class='eventWrapper'>
    <div class='event'>
        <div class='event--img'>
        <img src='http://localhost/ProyectoProgramacion3/SVG/logo-color.svg' width='20px'>
        </div>
        <div class='event--date'><span>Aula</span><span>" .
                $fila["Aula"] .
                "</span><span>Dia: " .
                $fila["Dia"] .
                "</span></div>
        <div class='event--content'>
            <h2>" .
                $fila["Nombre"] .
                "</h2>
            <p class='event--content-hall'>" .
                $HoraInicio_12hr .
                " a " .
                $HoraFin_12hr .
                "</p>
            <p class='event--content-ensemble'>Curso lectivo 2022</p>
        </div>
    </div>

</div><!-- container -->";
        }
        echo $salida;
    } else {
        echo "Error en WS";
        exit();
    }
}
//metodo traer las materias
//Metodo mostrar lista de alumnos
function fn_listar_estudiantes_promedio()
{
    if (isset($_REQUEST["Id_asignatura"])) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );

        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql =
            " select DISTINCT us.Nombre,us.Apellido1,us.Apellido2,us.Id_usuario,asig.Id_asignatura from Asignatura_has_alumno has INNER JOIN Asignatura asig On asig.Id_asignatura=has.Id_asignatura INNER JOIN Usuarios us On us.Id_usuario=has.Id_alumno where asig.Id_asignatura=" .
            $_REQUEST["Id_asignatura"] .
            ";";
        $rs = $link->query($sql);
        $salida =
            "  <span class='txt-aprobar_usu'>Ingresar promedios <span class='txt-rojo'> de alumno</span></span></h1>";
        $salida .= "<table class='table table-striped'>";
        $salida .= "<tr>";
        $salida .= "<th>Cedula</th>";
        $salida .= "<th>Nombre</th>";
        $salida .= "<th>Apellido1</th>";
        $salida .= "<th>Apellido2</th>";
        $salida .= "<th>Accion</th>";
        $salida .= "</tr>";
        $msg = "hola";
        while ($fila = $rs->fetch_assoc()) {
            $salida .=
                "<tr><input type='hidden' id='cedula_alumno' value='" .
                $fila["Id_usuario"] .
                "'><input type='hidden' id='Id_asignatura_asistencia' value='" .
                $_REQUEST["Id_asignatura"] .
                "'>";

            $salida .= "<td>" . $fila["Id_usuario"] . "</td>";
            $salida .= "<td>" . $fila["Nombre"] . "</td>";
            $salida .= "<td>" . $fila["Apellido1"] . "</td>";
            $salida .= "<td>" . $fila["Apellido2"] . "</td>";
            $salida .=
                "<td><img id='editar' onclick='recuperar_cedula(" .
                $fila["Id_usuario"] .
                ")' src='http://localhost/ProyectoProgramacion3/images/notas.png'data-bs-toggle='modal' data-bs-target='#promedio' title='insertar promedios' style='cursor: pointer;' width='50px'>
                    <img id='editar' src='http://localhost/ProyectoProgramacion3/images/pencil.png'onclick='GETService_accion(`rsf_Profesor.php?accion=lista_promedios_editar`,`&Id_usuario=`,`" .
                $fila["Id_usuario"] .
                "&Id_asignatura=" .
                $fila["Id_asignatura"] .
                "`)' title='Editar promedios' style='cursor: pointer;' width='45px'>
                    </td>";
            $salida .= "</tr>";
        }
        $salida .= "</table>";
        echo $salida;
    }
}
//Metodo mostrar lista de alumnos
//Metodo para editar Promedio
function fn_mostrar_promedios()
{
    if (isset($_REQUEST["Id_usuario"], $_REQUEST["Id_asignatura"])) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );

        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }

        $sql =
            "SELECT*FROM Nota where Id_alumno=" .
            $_REQUEST["Id_usuario"] .
            " and Id_asignatura=" .
            $_REQUEST["Id_asignatura"] .
            ";";

        $rs = $link->query($sql);
        $salida = "<table class='table table-striped'>";
        $salida .= "<tr>";
        $salida .= "<th>Nota#</th>";
        $salida .= "<th>Trimestre</th>";
        $salida .= "<th>Nota</th>";
        $salida .= "<th>Editar</th>";
        $salida .= "</tr>";
        $msg = "hola";
        $salida .= "<tbody>";
        $contador = 0;
        while ($fila = $rs->fetch_assoc()) {
            $salida .= "<tr>";
            $salida .= "<td>" . $fila["Id_nota"] . "<input type='hidden' id='_Id_nota{$contador}' value='".$fila['Id_nota']."'></td>";
            $salida .=
                "<td><input type='text' id='Trimestre{$contador}' value='" .
                $fila["Trimestre"] .
                "'></td>";
            $salida .=
                "<td><input type='text' id='Nota{$contador}' value='" .
                $fila["Nota"] .
                "'></td>";
            $salida .=
                "<td><input type='submit' onclick='fn_actualizar_promedio($contador,".$fila["Id_asignatura"].");' id='submit_promedio{$contador}' value='Enviar'></td>";
            $contador++;
        }
        $salida .= "</tbody>";
        $salida .= "</table>";
        echo $salida;
    } else {
        echo "No me pasaste bien los parametros";
    }
}
function fn_actualizar_promedios()
{
    if (isset($_REQUEST["Trimestre"], $_REQUEST["Nota"],$_REQUEST["Id_nota"])) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );

        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }

        $sql ="UPDATE Nota set Trimestre=".$_REQUEST["Trimestre"].",Nota=".$_REQUEST["Nota"]."  where Id_nota=".$_REQUEST["Id_nota"].";";
        try {
            if ($link->query($sql) === true) {
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "error";
            return "er";
        }
    } else {
        echo "Error en parametros";
    }
}

//Metodo para editar Promedio
//Metodo para insertar Promedio
function fn_insertar_promedio()
{
    if (
        isset(
            $_REQUEST["Id_nota"],
            $_REQUEST["Id_usuario"],
            $_REQUEST["Id_asignatura"],
            $_REQUEST["Trimestre"],
            $_REQUEST["Nota"]
        )
    ) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql =
            " Insert into Nota values(" .
            $_REQUEST["Id_nota"] .
            "," .
            $_REQUEST["Id_usuario"] .
            "," .
            $_REQUEST["Id_asignatura"] .
            "," .
            $_REQUEST["Trimestre"] .
            "," .
            $_REQUEST["Nota"] .
            ");";
        try {
            if ($link->query($sql) === true) {
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "error";

            return "er";
        }
    } else {
        echo "Error en WS";
        exit();
    }
}

//Metodo para insertar Promedio
//Promedios

//----------Lista de todos los alumnos del profesor-----------Lista de todos los alumnos del profesor----------------Lista de todos los alumnos del profesor-----------------------//
function fn_listar_alumnos_totales()
{
    if (isset($_REQUEST["Id_usuario"])) {
        $link = mysqli_connect(
            "a2nlmysql19plsk.secureserver.net",
            "US",
            "US123",
            "UH"
        );

        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql =
            " select DISTINCT us.Nombre,us.Apellido1,us.Apellido2,us.Id_usuario,asig.Nombre as Nombre_Materia from Asignatura_has_alumno has INNER JOIN Asignatura asig On asig.Id_asignatura=has.Id_asignatura INNER JOIN Usuarios us On us.Id_usuario=has.Id_alumno where asig.Id_profesor=" .
            $_REQUEST["Id_usuario"] .
            ";";
        $rs = $link->query($sql);
        $salida =
            "  <span class='txt-aprobar_usu'>Todos mis alumos de todas las <span class='txt-rojo'> MATERIAS</span></span></h1>";
        $salida .= "<table class='table table-striped'>";
        $salida .= "<tr>";
        $salida .= "<th>Cedula</th>";
        $salida .= "<th>Nombre</th>";
        $salida .= "<th>Apellido1</th>";
        $salida .= "<th>Apellido2</th>";
        $salida .= "<th>Materia</th>";
        $salida .= "</tr>";
        $msg = "hola";
        while ($fila = $rs->fetch_assoc()) {
            $salida .= "<tr>";
            $salida .= "<td>" . $fila["Id_usuario"] . "</td>";
            $salida .= "<td>" . $fila["Nombre"] . "</td>";
            $salida .= "<td>" . $fila["Apellido1"] . "</td>";
            $salida .= "<td>" . $fila["Apellido2"] . "</td>";
            $salida .= "<td>" . $fila["Nombre_Materia"] . "</td>";
            $salida .= "</tr>";
        }
        $salida .= "</table>";
        echo $salida;
    }
}

//----------Mostrar todos los profesores-----------Mostrar todos los profesores----------------Mostrar todos los profesores-----------------------//
function fn_listar_todos_los_profesores()
{
    $link = mysqli_connect(
        "a2nlmysql19plsk.secureserver.net",
        "US",
        "US123",
        "UH"
    );

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }
    $sql = "select Nombre,Apellido1,Apellido2 from Usuarios where Id_rol=3";
    $rs = $link->query($sql);
    $salida =
        "  <span class='txt-aprobar_usu'>Lista de profesores<span class='txt-rojo'> del colegio</span></span></h1>";
    $salida .= "<table class='table table-striped'>";
    $salida .= "<tr>";
    $salida .= "<th>Nombre</th>";
    $salida .= "<th>Apellido1</th>";
    $salida .= "<th>Apellido2</th>";
    $salida .= "</tr>";
    $msg = "hola";
    while ($fila = $rs->fetch_assoc()) {
        $salida .= "<tr>";
        $salida .= "<td>" . $fila["Nombre"] . "</td>";
        $salida .= "<td>" . $fila["Apellido1"] . "</td>";
        $salida .= "<td>" . $fila["Apellido2"] . "</td>";
        $salida .= "</tr>";
    }
    $salida .= "</table>";
    echo $salida;
}

?>
