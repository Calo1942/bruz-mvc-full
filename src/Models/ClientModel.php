<?php

namespace BruzDeporte\Models;

use PDOException;
use Exception;
use BruzDeporte\Config\Connect\DBConnect;
use BruzDeporte\Config\Interfaces\Crud;

class ClientModel extends DBConnect implements Crud {

    private $Cedula;
    private $Nombre;
    private $Apellido;
    private $Correo;
    private $Telefono;

    public function getCedula() {return $this->Cedula;}

    public function getNombre() {return $this->Nombre;}

    public function getApellido() {return $this->Apellido;}

    public function getCorreo() {return $this->Correo;}

    public function getTelefono() {return $this->Telefono;}

    public function setCedula($Cedula) {$this->Cedula = $Cedula;}

    public function setNombre($Nombre) {$this->Nombre = $Nombre;}

    public function setApellido($Apellido) {$this->Apellido = $Apellido;}

    public function setCorreo($Correo) {$this->Correo = $Correo;}

    public function setTelefono($Telefono) {$this->Telefono = $Telefono;}

    public function store($data) {
        try{
        $sql = "INSERT INTO cliente (
            Cedula, Nombre, Apellido, Correo, Telefono
        ) VALUES (
            :Cedula, :Nombre, :Apellido, :Correo, :Telefono
        )";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':Cedula' => $data['Cedula'],
            ':Nombre' => $data['Nombre'],
            ':Apellido' => $data['Apellido'],
            ':Correo' => $data['Correo'] ?? null,
            ':Telefono' => $data['Telefono'] ?? null
        ]);
        }  catch (\PDOException $e) {
        error_log("Error en Cliente: " . $e->getMessage());
        return false;

        } catch (\Exception $e) {
        error_log("Error inesperado en Cliente: " . $e->getMessage());
        return false;
    }
    }

    public function findAll() {
        try{
            $stmt = $this->con->query("SELECT * FROM cliente");
            return $stmt->fetchAll();

        } catch (\PDOException $e) {
            error_log("Error al obtener clientes: " . $e->getMessage());
            return false;
        }
    }
 
    public function find($cedula) {
        try{
        $stmt = $this->con->prepare("SELECT * FROM cliente WHERE Cedula = ?");
        $stmt->execute([$cedula]);
        return $stmt->fetch();
        } catch (\PDOException $e) {
            error_log("Error al buscar cliente: " . $e->getMessage());
            return false;
        }
    }
 
    public function update($cedula, $data) {
        $sql = "UPDATE cliente SET
            Nombre = :Nombre,
            Apellido = :Apellido,
            Correo = :Correo,
            Telefono = :Telefono
            WHERE Cedula = :Cedula";

        try{    
        $stmt = $this->con->prepare($sql);
        $params = [
            ':Nombre' => $data['Nombre'],
            ':Apellido' => $data['Apellido'],
            ':Correo' => $data['Correo'] ?? null,
            ':Telefono' => $data['Telefono'] ?? null,
            ':Cedula' => $cedula
        ];
        return $stmt->execute($params);
        } catch (\PDOException $e) {
            error_log("Error al actualizar cliente: " . $e->getMessage());
            return false;
        }
    }

    public function delete($cedula) {
        try{
        $stmt = $this->con->prepare("DELETE FROM cliente WHERE Cedula = ?");
        return $stmt->execute([$cedula]);
        
        } catch (\PDOException $e) {
            error_log("Error al eliminar cliente: " . $e->getMessage());
            return false;
        }
    }
}