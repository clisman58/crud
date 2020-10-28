<?php
include_once "Estudiante.php";

$id = $_POST["id"];
$estudiante = new Estudiante();
$estudiante->setId($id);
$resultado = $estudiante->mostrarEstudiantesPorId();

foreach ($resultado->fetchAll() as $item) {
    ?>
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <input type="number" name="codigo" placeholder="Ingrese codigo" value="<?= $item["codigo"] ?>"><br>
        <input type="text" name="nombres" placeholder="Ingrese Nombres" value="<?= $item["nombres"] ?>"><br>
        <input type="text" name="apellidos" placeholder="Ingrese Apellidos" value="<?= $item["apellidos"] ?>"><br>
        <input type="number" name="telefono" placeholder="Ingrese Telefono" value="<?= $item["telefono"] ?>"><br>
        <input type="email" name="correo" placeholder="Ingrese Correo" value="<?= $item["correo"] ?>"><br>
        <input type="hidden" name="id" value="<?= $id ?>">
        <select name="pa">
            <option value="1"
                <?php
                if ($item["id_pa"] == 1) {
                    echo "selected";
                }
                ?>
            >
                Sistemas
            </option>
            <option value="2"
                <?php
                if ($item["id_pa"] == 2) {
                    echo "selected";
                }
                ?>
            >
                Civil
            </option>
        </select><br>
        <input type="submit" name="submit" value="actualizar">
    </form>
    <?php
}

if (isset($_POST["submit"])) {
    $codigo = $_POST["codigo"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $pa = $_POST["pa"];
    $id = $_POST["id"];

    $resultado = $estudiante->actualizar($id, $codigo, $nombres, $apellidos, $telefono, $correo, $pa);

    if ($resultado != 0) {
        header("location: index.php");
    } else {
        echo "Error: Informacion no actualizada";
    }

}