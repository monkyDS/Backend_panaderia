<?php
    class Inventario{
        //atributo
        public $conexion;

        //metodo contructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos
        public function consulta(){
            $con = "SELECT inv.*, p.nombre AS productos, pr.razon_social As proveedor, m.nombre AS marca FROM inventario inv
                    INNER JOIN productos p ON inv.fo_productos = p.id_productos
                    INNER JOIN proveedor pr ON inv.fo_proveedor = pr.id_proveedor
                    INNER JOIN marca m ON inv.fo_marca = m.id_marca
                    ORDER BY inv.nombre;";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO inventario(fecha, fo_productos, fo_proveedor, cantidades, nombre, fo_marca, codigo, stoock)
                    VALUES('$params->fecha', $params->fo_productos, $params->fo_proveedor, '$params->cantidades', '$params->nombre', $params->fo_marca, '$params->codigo', $params->stoock)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El Inventario ha sido guardado";
            return $vec;        
        }

        public function editar($id, $params){
            $editar = "UPDATE inventario SET fecha = '$params->fecha', fo_productos = $params->fo_productos, fo_proveedor = $params->fo_proveedor, cantidades = '$params->cantidades', nombre = '$params->nombre', fo_marca = $params->fo_marca, codigo = '$params->codigo', stoock= $params->stoock WHERE id_inventario = $id";    
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El inventario ha sido editado";
            return $vec;        
        }

        public function eliminar($id){
            $del = "DELETE FROM inventario WHERE id_inventario = $id";    
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El inventario ha sido eliminado";
            return $vec;        
        }

        public function filtro($valor){
            $filtro = "SELECT inv.*, pr.razon_social AS proveedor, m.nombre AS marca 
               FROM inventario inv
               INNER JOIN proveedor pr ON inv.fo_proveedor = pr.id_proveedor
               INNER JOIN marca m ON inv.fo_marca = m.id_marca
               WHERE pr.razon_social LIKE '%$valor%' 
                  OR inv.nombre LIKE '%$valor%' 
                  OR m.nombre LIKE '%$valor%' 
                  OR pr.razon_social LIKE '%$valor%'";    
        
            $res = mysqli_query($this->conexion, $filtro);
            $vec = [];
        
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            
            return $vec;       
        }

    }
?>