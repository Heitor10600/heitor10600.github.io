<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="format.css">
    <link rel="stylesheet" href="responsivo.css">
    <link rel="icon" href="imagens/logo.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <title>Armário Inteligente</title>
</head>

<body>
    <h1 class="tit_armario">Armário Inteligente</h1>
    <hr class="linha">

    <nav class="menu">
        <article class="fundo_menu">
            <ul>
                <li>
                    <p>Home</p>
                    <a href="index.html"><img src="imagens/casa.png" alt="Home" width="50" height="50"></a>
                </li>
                <li>
                    <p>Armário</p>
                    <a href="armario.html"><img src="imagens/armario.png" alt="Armário" width="50" height="50"></a>
                </li>
                <li>
                    <p>Estilos</p>
                    <a href="estilos.html"><img src="imagens/camisa.png" alt="Estilos" width="50" height="50"></a>
                </li>
                <li>
                    <p>Loja</p>
                    <a href="lojas.html"><img src="imagens/bolsa.png" alt="Loja" width="50" height="50"></a>
                </li>
                <li>
                    <p>Cadastro</p>
                    <a href="form.php"><img src="imagens/person.png" alt="Cadastro" width="50" height="50"></a>
                </li>
            </ul>
        </article>
    </nav>

    <div class="form">
        <fieldset>
            <legend>Cadastro do cliente</legend>
            <form method="post" action="form.php">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">

                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" onkeypress="return event.charCode >= 48 && event.charCode <= 57">

                <div class="input">
                    <input type="submit" value="Enviar" name="submit">
                    <input type="reset" value="Limpar tudo" name="limpar">
                </div>
            </form>
        </fieldset>
    </div>


    <?php
if (isset($_POST['submit'])) {
    include_once('conexao.php');

    // Sanitizar e validar entradas
    $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_STRING);
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if ($cpf && $nome && $email) {
        $stmt = $conexao->prepare("INSERT INTO clientes (cpf, nome, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $cpf, $nome, $email);

        if ($stmt->execute()) {
            echo "<p id='success-message'> Cadastro realizado com sucesso,</p>";
        } else {
            echo "<p id='error-message'> Erro ao realizar cadastro. Por favor, tente novamente.</p>";
        }

        $stmt->close();
    } else {
        echo "<p id='error-message'>Dados inválidos.</p>";
    }

    $conexao->close();
}
?>


<footer>
		<di<fov class="footer__alto">
			<ul class="footer__alto__categorias">
				<li class="footer__alto__categorias__colunas">
					<h1 class="footer__alto__titulo">SUPORTE</h1>
					<ul class="footer__alto__categorias__colunas__lista">
						<li class="footer__alto__categorias__colunas__lista__item">
							<a href="ajuda/faq.html" target="_self">Dúvidas Frequentes</a>
						</li>
						<li class="footer__alto__categorias__colunas__lista__item">
							<a href="ajuda/faq.html" target="_self">Atendimento ao Cliente</a>
						</li>
						<li class="footer__alto__categorias__colunas__lista__item">
							<a href="ajuda/entregas_fretes.html" target="_self">Entregas e Fretes</a>
						</li>
						<li class="footer__alto__categorias__colunas__lista__item">
							<a href="pessoal/pedidos.html" target="_self">Pedidos</a>
						</li>
						<li class="footer__alto__categorias__colunas__lista__item">
							<a href="ajuda/troca.html" target="_self">Trocas e Devoluções</a>
						</li>
						<li class="footer__alto__categorias__colunas__lista__item">
							<a href="ajuda/pagamentos.html" target="_self">Pagamentos</a>
						</li>
					</ul>
				</li>
				<li class="footer__alto__categorias__colunas">
					<h1 class="footer__alto__titulo">INFORMAÇÕES</h1>
					<ul class="footer__alto__categorias__colunas__lista">
						<li class="footer__alto__categorias__colunas__lista__item">
							<a href="index.html" target="_self">Sobre Nós</a>
						</li>
					</ul>
					<h1 class="footer__alto__titulo">Certificados<br>de Segurança</h1>
					<ul class="footer__alto__categorias__colunas__lista">
						<li class="footer__alto__categorias__colunas__lista__item">
							<img class="footer__alto__categorias__colunas__lista__item__certificado"
								src="certificados/certificado_generico.png">
						</li>
						<li class="footer__alto__categorias__colunas__lista__item">
							<img class="footer__alto__categorias__colunas__lista__item__certificado"
								src="certificados/certificado_google.png">
						</li>
					</ul>
				</li>
				<li class="footer__alto__categorias__colunas">
					<h1 class="footer__alto__titulo">SIGA-NOS</h1>
					<ul class="footer__alto__categorias__colunas__lista">
						<li class="footer__alto__categorias__colunas__lista__item">
							<ul class="footer__alto__categorias__colunas__lista__item__linha">
								<li><a href="https://whatsapp.com" target="_self"><img
											src="icons_redes_sociais/whatsapp.png"></a></li>
								<li><a href="https://instagram.com" target="_self"><img
											src="icons_redes_sociais/instagram.png"></a></li>
							</ul>
							<ul class="footer__alto__categorias__colunas__lista__item__linha">
								<li><a href="https://youtube.com" target="_self"><img
											src="icons_redes_sociais/youtube.png"></a></li>
								<li><a href="https://facebook.com" target="_self"><img
											src="icons_redes_sociais/facebook.png"></a></li>
							</ul>
						</li>
						<li class="footer__alto__categorias__colunas__lista__item">
							<ul class="footer__alto__categorias__colunas__lista__item__linha">
								<li><img class="footer__alto__categorias__colunas__lista__item__bandeira"
										src="bandeiras/bandeira_visa.png"></li>
								<li><img class="footer__alto__categorias__colunas__lista__item__bandeira"
										src="bandeiras/bandeira_elo.png"></li>
							</ul>
							<ul class="footer__alto__categorias__colunas__lista__item__linha">
								<li><img class="footer__alto__categorias__colunas__lista__item__bandeira"
										src="bandeiras/bandeira_mastercard.png"></li>
								<li><img class="footer__alto__categorias__colunas__lista__item__bandeira"
										src="bandeiras/bandeira_american_express.png"></li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
			</div>
			<div class="footer__baixo">
				<ul>
					<li><a href="cookies.html" target="_self">Configuração de Cookies</a></li>
					<li>|</li>
					<li><a href="/ajuda/dados_pessoais.html" target="_self">Requisições de dados pessoais</a></li>
					<li>|</li>
					<li><a href="/ajuda/termos_do_usuario.html" target="_self">Termos e Condições de Navegação</a></li>
					<li>|</li>
					<li><a href="/ajuda/faq.html" target="_self">Dúvidas Frequentes</a></li>
					<li>|</li>
					<li><a href="/ajuda/politica_de_privacidade" target="_self">Política de Privacidade</a></li>
				</ul>
			</div>
	</footer>

</body>
</html>



