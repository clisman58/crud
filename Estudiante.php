<?php
include_once "ConexionBD.php";

class Estudiante
{
    private $id;
    private $codigo;
    private $nombres;
    private $apellidos;
    private $telefono;
    private $correo;
    private $id_pa;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function insertar(String $codigo, String $nombres, String $apellidos, String $telefono, String $correo, int $pa): bool
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO estudiantes(codigo, nombres, apellidos, telefono, correo, id_pa) 
                    VALUES('$codigo', '$nombres', '$apellidos', '$telefono', '$correo', $pa)";
            $filasAfectadas = $conn->exec($sql);

            if($filasAfectadas != 0){
                $resultado = true;
            }else{
                $resultado = false;
            }

            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostrar()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT e.id, e.nombres, e.apellidos, pa.nombre as pa_nombre, f.nombre as f_nombre
                    FROM estudiantes as e
                    JOIN pa as pa ON e.id_pa = pa.id
                    JOIN facultad as f ON pa.id_facultad = f.id";

            $resultado = $conn->query($sql);
            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostrarEstudiantesPorId()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM estudiantes WHERE id=$this->id";

            $resultado = $conn->query($sql);
            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function actualizar(int $id, String $codigo, String $nombres, String $apellidos, String $telefono, String $correo, int $pa): bool
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();

            $sql = "UPDATE estudiantes
                    SET codigo='$codigo', nombres='$nombres', apellidos='$apellidos', telefono='$telefono', correo='$correo', id_pa=$pa
                    WHERE id=$id";
            $filasAfectadas = $conn->exec($sql);

            if($filasAfectadas != 0){
                $resultado = true;
            }else{
                $resultado = false;
            }

            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function eliminar():bool
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();

            $sql = "DELETE FROM estudiantes WHERE id=$this->id";
            $filasAfectadas = $conn->exec($sql);

            if($filasAfectadas != 0){
                $resultado = true;
            }else{
                $resultado = false;
            }

            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}