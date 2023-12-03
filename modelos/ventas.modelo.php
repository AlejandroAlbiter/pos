<?php

require_once "conexion.php";

class ModeloVentas {

    /*=============================================
    MOSTRAR VENTAS
    =============================================*/
    static public function mdlMostrarVentas($tabla, $item, $valor) {
        if($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    /*=============================================
    REGISTRO DE VENTA
    =============================================*/
    static public function mdlIngresarVenta($tabla, $datos) {
        $link = Conexion::conectar();
        $link->beginTransaction();
        try {
            $stmt = $link->prepare("INSERT INTO $tabla(codigo, id_cliente, id_vendedor, productos, impuesto, neto, total, metodo_pago) VALUES (:codigo, :id_cliente, :id_vendedor, :productos, :impuesto, :neto, :total, :metodo_pago)");

            // bind params...

            $stmt->execute();
            $link->commit();
            return "ok";
        } catch (Exception $e) {
            $link->rollBack();
            return "error: " . $e->getMessage();
        }
    }

    /* Resto de métodos adaptados... */

    /*=============================================
    EDITAR VENTA
    =============================================*/
    static public function mdlEditarVenta($tabla, $datos) {
        $link = Conexion::conectar();
        $link->beginTransaction();
        try {
            $stmt = $link->prepare("UPDATE $tabla SET id_cliente = :id_cliente, id_vendedor = :id_vendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total = :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");

            // bind params...

            $stmt->execute();
            $link->commit();
            return "ok";
        } catch (Exception $e) {
            $link->rollBack();
            return "error: " . e->getMessage();
        }
    }

    /*=============================================
    ELIMINAR VENTA
    =============================================*/
    static public function mdlEliminarVenta($tabla, $datos) {
        $link = Conexion::conectar();
        $link->beginTransaction();
        try {
            $stmt = $link->prepare("DELETE FROM $tabla WHERE id = :id");

            $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

            $stmt->execute();
            $link->commit();
            return "ok";
        } catch (Exception $e) {
            $link->rollBack();
            return "error: " . e->getMessage();
        }
    }

    /*=============================================
    RANGO FECHAS
    =============================================*/
    static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal) {
        if($fechaInicial == null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");
            $stmt->execute();
            return $stmt->fetchAll();
        } else if($fechaInicial == $fechaFinal) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");
            $stmt->bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $fechaFinal2 = new DateTime($fechaFinal);
            $fechaFinal2->modify('+1 day');
            $fechaFinalMasUno = $fechaFinal2->format('Y-m-d');
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN :fechaInicial AND :fechaFinalMasUno");
            $stmt->bindParam(":fechaInicial", $fechaInicial);
            $stmt->bindParam(":fechaFinalMasUno", $fechaFinalMasUno);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    /*=============================================
    SUMAR EL TOTAL DE VENTAS
    =============================================*/
    static public function mdlSumaTotalVentas($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT SUM(neto) as total FROM $tabla");
        $stmt->execute();
        return $stmt->fetch();
    }
}
