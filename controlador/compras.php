<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-Whit, Content-Type, Accept");
    header('Content-Type: application/json');

    require_once ("../conexion.php");
    require_once ("../modelos/compras.php");

    $control = $_GET['control'];

    $compras = new Compras($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $compras->consulta();
            break;
            case 'insertar':
                $json = file_get_contents('php://input');
                //$json = '{"nombre":"prueba 2"}';
                $params = json_decode($json);
                $vec = $compras->insertar($params);
            break;
            case 'editar':
                $json = file_get_contents('php://input');
                $params = json_decode($json);
                $id = $_GET['id'];
                $vec = $compras->editar($id, $params);
            break;
            case 'eliminar':
                $id = $_GET['id'];
                $vec = $compras->eliminar($id);
            break;
            case 'filtro':
                $dato = $_GET['dato'];
                $vec = $compras->filtro($dato);
            break;           
    }

    $datosj = json_encode($vec);
    echo $datosj;
    
?>