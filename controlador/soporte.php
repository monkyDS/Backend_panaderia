<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-Whit, Content-Type, Accept");
    header('Content-Type: application/json');

    require_once ("../conexion.php");
    require_once ("../modelos/soporte.php");

    $control = $_GET['control'];

    $soporte = new Soporte($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $soporte->consulta();
            break;
        case 'insertar':
            $json = file_get_contents('php://input');
            $params = json_decode($json);
            $vec = $soporte->insertar($params);
            break;
        case 'editar':
            $json = file_get_contents('php://input');
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $soporte->editar($id, $params);
            break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $soporte->eliminar($id);
            break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $soporte->filtro($dato);
            break;           
    }
    
    $datosj = json_encode($vec);
    echo $datosj;
?>
