
<?php
include 'ibo_api.php';
$url = carregarCaptcha();

header('Content-Type: image/png');
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); // Usa o mesmo cookie da sessão!
curl_exec($ch);
curl_close($ch);
?>
