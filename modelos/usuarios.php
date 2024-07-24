<?php
    class Usuarios{
        //atributo
        public $conexion;

        //metodo contructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos
        public function consulta(){
            $con = "SELECT * FROM usuarios ORDER BY nombre, celular, email, clave, tipo_usuario";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO usuarios(nombre, celular, email, clave, tipo_usuario)
                    VALUES('$params->nombre', '$params->celular', '$params->email', '$params->clave', '$params->tipo_usuario')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El Usuario ha sido guardado";
            return $vec;        
        }

        public function editar($id, $params){
            $editar = "UPDATE usuarios SET nombre = '$params->nombre', celular = '$params->celular', email = '$params->email', clave = '$params->clave', tipo_usuario = '$params->tipo_usuario' WHERE id_usuario = $id";    
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El Usuario ha sido editado";
            return $vec;        
        }

        public function eliminar($id){
            $del = "DELETE FROM usuarios WHERE id_usuario = $id";    
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El Usuario ha sido eliminado";
            return $vec;        
        }

        public function filtro($valor){
            $filtro = "SELECT * FROM usuarios u WHERE u.nombre LIKE '%$valor%' OR u.celular LIKE '%$valor%'
                        OR u.email LIKE '%$valor%' OR u.tipo_usuario LIKE '%$valor%' ";    
        
            $res = mysqli_query($this->conexion, $filtro);
            $vec = [];
        
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            
            return $vec;       
        }
    }
?>