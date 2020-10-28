<?php
include_once "Estudiante.php";

$estudiante = new Estudiante();
$resultado = $estudiante->mostrar();

    echo "numero de resultados: ".$resultado->rowCount();
    echo "<table border='1'>
            <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>PA</th>
                <th>Facultad</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>";
    foreach ($resultado->fetchAll() as $k => $item) {
        echo "<tr>
                <td>" . ($k + 1) . "</td>
                <td>" . $item["nombres"] . "</td>
                <td>" . $item["apellidos"] . "</td>
                <td>" . $item["pa_nombre"] . "</td>
                <td>" . $item["f_nombre"] . "</td>
                <td><form method='post' action='eliminar.php'>
                        <input type='hidden' name='id' value='".$item["id"]."'>
                        <input type='submit' name='submit' value='Eliminar'>
                    </form>
                </td>
                <td><form method='post' action='actualizar.php'>
                        <input type='hidden' name='id' value='".$item["id"]."'>
                        <input type='submit' name='submit2' value='Actualizar'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";

