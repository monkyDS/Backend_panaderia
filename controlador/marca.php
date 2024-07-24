<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-Whit, Content-Type, Accept");

    require_once ("../conexion.php");
    require_once ("../modelos/marca.php");

    $control = $_GET['control'];

    $marca = new Marca($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $marca->consulta();
            break;
            /*case 'insertar':
                $json = file_get_contents('php://input');
                //$json = '{"nombre":"prueba 2"}';
                $params = json_decode($json);
                $vec = $usuario->insertar($params);
            break;
            case 'editar':
                $json = file_get_contents('php://input');
                $params = json_decode($json);
                $id = $_GET['id'];
                $vec = $usuario->editar($id, $params);
            break;
            case 'eliminar':
                $id = $_GET['id'];
                $vec = $usuario->eliminar($id);
            break;
            case 'filtro':
                $dato = $_GET['dato'];
                $vec = $usuario->filtro($dato);
            break;*/            
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');
?>