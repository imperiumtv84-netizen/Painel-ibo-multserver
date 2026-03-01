<?php
include 'config.php';

// Função para iniciar a sessão e pegar a imagem do Captcha
function carregarCaptcha() {
    global $cookie_file;
    $url_login = "https://iboplayer.com/device/login";

    $ch = curl_init($url_login);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file); // Cria o arquivo de sessão
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36");
    
    $html = curl_exec($ch);
    curl_close($ch);

    // Busca a URL da imagem do captcha no HTML (Geralmente está em uma tag <img>)
    // Nota: O seletor abaixo pode precisar de ajuste se o IBO mudar o ID da imagem
    preg_match('/<img src="([^"]+captcha[^"]+)"/i', $html, $matches);
    
    return [
        'html' => $html,
        'captcha_url' => $matches[1] ?? null
    ];
}

// Função para enviar os dados para o IBO
function enviarPlaylist($mac, $key, $dns, $user, $pass, $captcha_solucao) {
    global $cookie_file;
    $url_post = "https://iboplayer.com/device/login"; // URL onde o form é enviado

    // Dados que o formulário do IBO normalmente pede
    $campos = [
        'mac_address' => $mac,
        'device_key'  => $key,
        'playlist_name' => "Servidor_" . rand(10, 99), // Nome aleatório para não dar erro
        'username'    => $user,
        'password'    => $pass,
        'dns_url'     => $dns,
        'captcha'     => $captcha_solucao,
        'login_btn'   => 'Login' // O nome do botão de envio
    ];

    $ch = curl_init($url_post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($campos));
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); // Usa a mesma sessão do captcha
    curl_setopt($ch, CURLOPT_REFERER, "https://iboplayer.com/device/login");
    
    $resposta = curl_exec($ch);
    curl_close($ch);

    return $resposta;
}
?>
