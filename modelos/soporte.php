<?php
    class Soporte{
        //atributo
        public $conexion;

        //metodo contructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos
        public function consulta(){
            $con = "SELECT sopor.*, u.nombre AS usuarios 
            FROM soporte sopor
                    INNER JOIN usuarios u ON sopor.fo_usuario = u.id_usuario
                    ORDER BY asunto, contenido, fecha_envio, estado, respuesta, fecha_respuesta";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO sopor(fo_usuario, asunto, contenido, fecha_envio, estado, respuesta, fecha_respuesta)
                    VALUES($params->fo_usuario, '$params->asunto', '$params->contenido', '$params->fecha_envio', '$params->estado', '$params->respuesta', '$params->fecha_respuesta')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "el mensaje ha sido guardado";
            return $vec;        
        }

        public function editar($id, $params){
            $editar = "UPDATE sopor SET fo_usuario = $params->fo_usuario, asunto= '$params->asunto', contenido = '$params->contenido', fecha_envio = '$params->fecha_envio', estado = '$params->estado',  respuesta = '$params->respuesta', fecha_respuesta = '$params->fecha_respuesta' WHERE id_soporte = $id";
            $res = mysqli_query($this->conexion, $editar);
            if(!$res) {
                return ['resultado' => 'ERROR', 'mensaje' => mysqli_error($this->conexion)];
            }
            return ['resultado' => 'OK', 'mensaje' => 'El mensaje ha sido editada'];
        }

        public function eliminar($id){
            $del = "DELETE FROM soporte WHERE id_soporte = $id";    
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El mensaje ha sido eliminado";
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