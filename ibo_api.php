<?php
// No topo do ibo_api.php, adicione estas linhas para lidar com o aceite legal
function iniciarSessaoIbo() {
    global $cookie_file;
    $url = "https://iboplayer.com/device/login";
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120.0.0.0 Safari/537.36");
    
    // Simula o clique no "Accept legal terms" se necessário
    // Muitas vezes apenas carregar a página e salvar o cookie já basta
    $html = curl_exec($ch);
    curl_close($ch);
    
    return $html;
}

function carregarCaptcha() {
    global $cookie_file;
    $html = iniciarSessaoIbo();

    // O IBO Player costuma usar uma URL de imagem como /include/captcha.php
    // Vamos capturar a URL completa da imagem para exibir no seu painel
    if (preg_match('/<img[^>]+src="([^"]*captcha[^"]*)"/i', $html, $matches)) {
        $captcha_url = $matches[1];
        // Se a URL for relativa (ex: /include/captcha.php), adicionamos o domínio
        if (strpos($captcha_url, 'http') === false) {
            $captcha_url = "https://iboplayer.com" . $captcha_url;
        }
        return $captcha_url;
    }
    return null;
}
