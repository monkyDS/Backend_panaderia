<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-Whit, Content-Type, Accept");

    require_once ("../conexion.php");
    require_once ("../modelos/ventas.php");

    $control = $_GET['control'];

    $ventas = new Ventas($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $ventas->consulta();
            break;
            case 'insertar':
                $json = file_get_contents('php://input');
                //$json = '{"nombre":"prueba 2"}';
                $params = json_decode($json);
                $texto_arreglo = serialize($params->productos);
                $params->productos = $texto_arreglo;
                
                $vec = $ventas->insertar($params);
            break;
            //case 'editar':
            //    $json = file_get_contents('php://input');
            //    $params = json_decode($json);
            //    $id = $_GET['id'];
            //    $vec = $ventas->editar($id, $params);
            //break;
            case 'eliminar':
                $id = $_GET['id'];
                $vec = $ventas->eliminar($id);
            break;
            case 'filtro':
                $dato = $_GET['dato'];
                $vec = $ventas->filtro($dato);
            break;
            case 'productos':
                $id = $_GET['id'];
                $vec = $ventas->consultap($id);
                break;          
    }
    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');
?>