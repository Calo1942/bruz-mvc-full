<?php

namespace BruzDeporte\Models;

use Exception;
use BruzDeporte\config\connect\DBConnect;
use BruzDeporte\config\interfaces\Crud;

class CategoryModel extends DBConnect implements Crud
{
    private $idCategoria;
    private $nombre;

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function store($data)
    {
        try {
        $this->setNombre($data['Nombre'] ?? '');

        if (empty($this->getNombre())) {
            throw new Exception('Nombre requerido');
        }

        $sql = "INSERT INTO Categoria (Nombre) VALUES (:Nombre)";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([':Nombre' => $this->getNombre()]);

    } catch (\Exception $e) {
        echo "Ocurrió un problema: " . $e->getMessage();
        return false;
    }
    }

    public function findAll()
    {
        try{
        $stmt = $this->con->query("SELECT * FROM Categoria");
        return $stmt->fetchAll();

        } catch (\Exception $e) {
            echo "Ocurrió un problema: " . $e->getMessage();
            return false;
        }
    }

    public function find($idCategoria)
    {
        try{
        $this->setIdCategoria($idCategoria);

        $stmt = $this->con->prepare("SELECT * FROM Categoria WHERE IdCategoria = :IdCategoria");
        $stmt->execute([':IdCategoria' => $this->getIdCategoria()]);
        $result = $stmt->fetch();

        if ($result) {
            $this->setNombre($result['Nombre']);
        }
        return $result;

        }catch (\Exception $e) {
            echo "Ocurrió un problema: " . $e->getMessage();
            return false;
        }
    }

    public function update($idCategoria, $data)
    {
        try{
        $this->setIdCategoria($idCategoria);
        $this->setNombre($data['Nombre'] ?? null);

         if (empty($this->getNombre())) {
            return false; 
        }

        $sql = "UPDATE Categoria SET Nombre = :Nombre WHERE IdCategoria = :IdCategoria";
        $stmt = $this->con->prepare($sql);

        return $stmt->execute([
            ':Nombre' => $this->getNombre(),
            ':IdCategoria' => $this->getIdCategoria()
        ]);
        } catch (\Exception $e) {
        echo "Ocurrió un problema: " . $e->getMessage();
        return false; 
    }
    }

    public function delete($idCategoria)
    {
        try{
        $this->setIdCategoria($idCategoria);

        $stmt = $this->con->prepare("DELETE FROM Categoria WHERE IdCategoria = :IdCategoria");
        return $stmt->execute([':IdCategoria' => $this->getIdCategoria()]);

        } catch (\Exception $e) {
            echo "Ocurrió un problema: " . $e->getMessage();
            return false;
        }
    }
}