<?php
    class Ventas{
        //atributo
        public $conexion;

        //metodo contructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos
        public function consulta(){
            $con = "SELECT vent.*, c.nombre AS cliente, u.nombre AS usuarios 
            FROM ventas vent
                    INNER JOIN cliente c ON vent.fo_cliente = c.id_cliente
                    INNER JOIN usuarios u ON vent.fo_usuario = u.id_usuario
                    ORDER BY vent.fecha;";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function consultap($id){
            $con = "SELECT productos from ventas WHERE id_ventas = $id";
            $res = mysqli_query($this->conexion, $con);
            $row = mysqli_fetch_array($res);
            $vec = unserialize($row[0]);

            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO ventas(fecha, fo_cliente, productos, subtotal, total, fo_usuario)
                    VALUES('$params->fecha', $params->fo_cliente, '$params->productos', $params->subtotal, $params->total, $params->fo_usuario)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La venta ha sido guardada";
            return $vec;        
        }

        //public function editar($id, $params){
        //    $editar = "UPDATE ventas SET fecha = '$params->fecha', fo_cliente = $params->fo_cliente, fo_productos = $params->fo_productos, fo_proveedor = $params->fo_proveedor, cantidad = '$params->cantidad', precios = $params->precios, iva = '$params->iva', subtotales = $params->subtotales, total = $params->total, fo_usuario= $params->fo_usuario WHERE id_ventas = $id";    
        //    mysqli_query($this->conexion, $editar);
        //    $vec = [];
        //    $vec['resultado'] = "OK";
        //    $vec['mensaje'] = "La venta ha sido editada";
        //    return $vec;        
        //}

        public function eliminar($id){
            $del = "DELETE FROM ventas WHERE id_ventas = $id";    
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La venta ha sido eliminada";
            return $vec;        
        }

        public function filtro($valor){
            $filtro = "SELECT vent.*, c.nombre AS cliente, p.nombre AS productos, pr.razon_social AS proveedor, u.nombre AS usuarios 
                       FROM ventas vent
                       INNER JOIN cliente c ON vent.fo_cliente = c.id_cliente
                       INNER JOIN productos p ON vent.fo_productos = p.id_productos
                       INNER JOIN proveedor pr ON vent.fo_proveedor = pr.id_proveedor
                       INNER JOIN usuarios u ON vent.fo_usuario = u.id_usuario
                       WHERE c.nombre LIKE '%$valor%' 
                          OR p.nombre LIKE '%$valor%' 
                          OR pr.razon_social LIKE '%$valor%' 
                          OR u.nombre LIKE '%$valor%'";
            
            $res = mysqli_query($this->conexion, $filtro);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            
            return $vec;       
        }
    }
?>