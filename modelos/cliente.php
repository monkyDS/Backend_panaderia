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
    }
?>