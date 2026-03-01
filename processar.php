<?php
include 'ibo_api.php';
include 'config.php';

$mac = $_POST['mac'];
$key = $_POST['key'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$captcha = $_POST['captcha_code'];

$sucessos = 0;

foreach ($meus_servidores as $dns) {
    $resultado = enviarPlaylist($mac, $key, $dns, $user, $pass, $captcha);
    
    // Verifica se na resposta do IBO veio algo como "Success"
    if (strpos($resultado, 'success') !== false) {
        $sucessos++;
    }
}

echo "Processo concluído! $sucessos servidores foram configurados no seu IBO Player.";
?>
