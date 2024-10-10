<?php
    class Cliente{
        //atributo
        public $conexion;

        //metodo contructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos
        public function consulta(){
            $con = "SELECT cli.*, ciu.nombre AS ciudad FROM cliente cli
                    INNER JOIN ciudad ciu ON cli.fo_ciudad = ciu.id_ciudad
                    ORDER BY cli.nombre;";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function filtro($dato){
            $con = "SELECT cli.*, ci.nombre AS ciudad, d.nombre AS dpto 
                    FROM cliente cli
                    INNER JOIN ciudad ci ON cli.fo_ciudad = ci.id_ciudad
                    INNER JOIN dpto d ON ci.fo_dpto = d.id_dpto
                    WHERE cli.identificacion LIKE '%$dato%' 
                    OR cli.nombre LIKE '%$dato%' 
                    OR cli.direccion LIKE '%$dato%' 
                    OR cli.email LIKE '%$dato%'
                    OR cli.celular LIKE '%$dato%' 
                    OR ci.nombre LIKE '%$dato%' 
                    OR d.nombre LIKE '%$dato%'
                    ORDER BY cli.nombre";
            
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
        
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
        
            return $vec;
        }

        public function consultar_cliente($dato){
            $con = "SELECT cli.*, ci.nombre AS ciudad FROM cliente cli 
            INNER JOIN ciudad ci ON cli.fo_ciudad = ci.id_ciudad 
            WHERE cli.identificacion = '$dato' 
            ORDER BY cli.nombre"; 
        $res = mysqli_query($this->conexion, $con);
        $vec = [];
        
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
        
            return $vec;
        }
        
    }
?>