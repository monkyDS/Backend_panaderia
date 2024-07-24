<?php
    class Compras{
        //atributo
        public $conexion;

        //metodo contructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos
        public function consulta(){
            $con = "SELECT comp.*, p.nombre AS productos, pr.razon_social As proveedor, u.nombre AS usuarios FROM compras comp
                    INNER JOIN productos p ON comp.fo_productos = p.id_productos
                    INNER JOIN proveedor pr ON comp.fo_proveedor = pr.id_proveedor
                    INNER JOIN usuarios u ON comp.fo_usuario = u.id_usuario
                    ORDER BY comp.fecha;";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO compras(fecha, fo_productos, fo_proveedor, cantidad, iva, subtotales, total, fo_usuario)
                    VALUES('$params->fecha', $params->fo_productos, $params->fo_proveedor, '$params->cantidad', '$params->iva', $params->subtotales, $params->total, $params->fo_usuario)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La compra ha sido guardada";
            return $vec;        
        }

        public function editar($id, $params){
            $editar = "UPDATE compras SET fecha = '$params->fecha', fo_productos = $params->fo_productos, fo_proveedor = $params->fo_proveedor, cantidad = '$params->cantidad', iva = '$params->iva', subtotales = $params->subtotales, total = $params->total, fo_usuario= $params->fo_usuario WHERE id_compras = $id";
            $res = mysqli_query($this->conexion, $editar);
            if(!$res) {
                return ['resultado' => 'ERROR', 'mensaje' => mysqli_error($this->conexion)];
            }
            return ['resultado' => 'OK', 'mensaje' => 'La compra ha sido editada'];
        }

        public function eliminar($id){
            $del = "DELETE FROM compras WHERE id_compras = $id";    
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La compra ha sido eliminada";
            return $vec;        
        }

        public function filtro($valor){
            $filtro = "SELECT comp.*, p.nombre AS productos, pr.razon_social AS proveedor, u.nombre AS usuarios 
                       FROM compras comp
                       INNER JOIN productos p ON comp.fo_productos = p.id_productos
                       INNER JOIN proveedor pr ON comp.fo_proveedor = pr.id_proveedor
                       INNER JOIN usuarios u ON comp.fo_usuario = u.id_usuario
                       WHERE p.nombre LIKE '%$valor%' 
                          OR pr.razon_social LIKE '%$valor%' 
                          OR u.nombre LIKE '%$valor%' 
                          OR comp.fecha LIKE '%$valor%'
                          OR comp.cantidad LIKE '%$valor%'
                          OR comp.iva LIKE '%$valor%'
                          OR comp.subtotales LIKE '%$valor%'
                          OR comp.total LIKE '%$valor%'";
            
            $res = mysqli_query($this->conexion, $filtro);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            
            return $vec;       
        }
    }
?>