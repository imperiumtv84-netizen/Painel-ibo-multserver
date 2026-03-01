
<form action="processar.php" method="POST">
    <input type="text" name="mac" placeholder="Seu MAC Address">
    <input type="text" name="key" placeholder="Sua Device Key">
    
    <div class="captcha-box">
        <img src="exibir_captcha.php" alt="Captcha IBO">
        <input type="text" name="captcha_code" placeholder="Digite o código acima">
    </div>
    
    <button type="submit">ATIVAR TODOS OS SERVIDORES</button>
</form>
