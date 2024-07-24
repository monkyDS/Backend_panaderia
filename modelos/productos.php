<?php
    class Productos{
        //atributo
        public $conexion;

        //metodo contructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos
        public function consulta(){
            $con = "SELECT p.*, pr.razon_social As proveedor, m.nombre AS marca FROM productos p
                    INNER JOIN proveedor pr ON p.fo_proveedor = pr.id_proveedor
                    INNER JOIN marca m ON p.fo_marca = m.id_marca
                    ORDER BY p.nombre;";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO productos(nombre, codigo, valor_compra, valor_venta, stoock, fo_proveedor, fo_marca)
                    VALUES('$params->nombre', '$params->codigo', $params->valor_compra, $params->valor_venta, $params->stoock, $params->fo_proveedor, $params->fo_marca)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El Producto ha sido guardado";
            return $vec;        
        }

        public function editar($id, $params){
            $editar = "UPDATE productos SET nombre = '$params->nombre', codigo = '$params->codigo', valor_compra = $params->valor_compra, valor_venta = $params->valor_venta, stoock = $params->stoock, fo_proveedor = $params->fo_proveedor, fo_marca = $params->fo_marca WHERE id_productos = $id";    
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El producto ha sido editado";
            return $vec;        
        }

        public function eliminar($id){
            $del = "DELETE FROM productos WHERE id_productos = $id";    
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El producto ha sido eliminado";
            return $vec;        
        }

        public function filtro($valor){
            $filtro = "SELECT p.*, pr.razon_social AS proveedor, m.nombre AS marca 
               FROM productos p
               INNER JOIN proveedor pr ON p.fo_proveedor = pr.id_proveedor
               INNER JOIN marca m ON p.fo_marca = m.id_marca
               WHERE pr.razon_social LIKE '%$valor%' 
                  OR p.nombre LIKE '%$valor%' 
                  OR m.nombre LIKE '%$valor%'";   
        
            $res = mysqli_query($this->conexion, $filtro);
            $vec = [];
        
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            
            return $vec;       
        }

    }
?>