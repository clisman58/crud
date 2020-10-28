<?php
include_once "Estudiante.php";

if (isset($_POST["submit"])) {
    $id = $_POST["id"];

    $estudiante = new Estudiante();
    $estudiante->setId($id);
    $resultado = $estudiante->eliminar();

    if ($resultado != 0) {
        header("location: index.php");
    } else {
        echo "Error: Informacion no Eliminada";
    }
}
