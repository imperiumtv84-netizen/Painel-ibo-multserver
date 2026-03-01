
<?php
// Suas DNS de Backup
$meus_servidores = [
    "http://dns-principal.com:8080",
    "http://dns-backup-01.com:8080",
    "http://dns-backup-02.com:8080"
];

// Caminho do arquivo de sessão (importante para o captcha funcionar)
$cookie_file = __DIR__ . '/session_cookie.txt';
