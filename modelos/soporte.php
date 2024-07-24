<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $mensaje = $_POST['mensaje'];

    $to = "jhamsoto669@gmail.com";
    $headers = "From: " . $email;

    if (mail($to, $subject, $mensaje, $headers)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
?>