<?php
session_start();

session_destroy();

header("location:index.php");
// header("Location: http://localhost/ProyectoProgramacion3/index.php");
?>
