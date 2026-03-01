<?php 
// Ativa erros para você depurar durante o teste
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ativador Multi-DNS - IBO Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #121212; color: white; font-family: sans-serif; }
        .card { background-color: #1e1e1e; border: 1px solid #333; border-radius: 15px; }
        .btn-primary { background-color: #e50914; border: none; font-weight: bold; }
        .btn-primary:hover { background-color: #b20710; }
        .captcha-img { border-radius: 5px; background: #fff; padding: 5px; margin-bottom: 10px; }
        input { background-color: #2b2b2b !important; border: 1px solid #444 !important; color: white !important; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <div class="text-center mb-4">
                    <h3>🚀 Ativação Inteligente</h3>
                    <p class="text-muted">Configure todos os servidores de backup de uma vez.</p>
                </div>

                <form action="processar.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Mac Address</label>
                        <input type="text" name="mac" class="form-control" placeholder="00:11:22:AA:BB:CC" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Device Key</label>
                        <input type="text" name="key" class="form-control" placeholder="123456" required>
                    </div>

                    <hr>

                    <div class="mb-3 text-center">
                        <label class="form-label d-block text-start">Código de Verificação</label>
                        <img src="exibir_captcha.php" alt="Carregando Captcha..." class="captcha-img img-fluid">
                        <input type="text" name="captcha_code" class="form-control" placeholder="Digite o código da imagem" required>
                        <small class="text-info d-block mt-2" style="cursor:pointer" onclick="location.reload()">Atualizar Imagem</small>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">ATIVAR AGORA</button>
                    </div>
                </form>
            </div>
            <p class="text-center mt-3 text-muted" style="font-size: 0.8rem;">
                Ao clicar, enviaremos automaticamente as 3 DNS de segurança para seu dispositivo.
            </p>
        </div>
    </div>
</div>

</body>
</html>
