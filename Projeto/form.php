<!DOCTYPE HTML>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="format.css">
	<link rel="stylesheet" href="responsivo.css">
	<a href="https://lordicon.com/"></a>
	<link rel="icon" href="imagens/logo.png" type="image/x-icon">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
	<title>Armário Inteligente</title>
</head>

<body>
	<h1 class="tit_armario">Armário Inteligente</h1>
	<hr class="linha">

	<div class="registro">
		<a href="form.php"><button>
				<p>Cadastro</p>
			</button></a>
	</div>

	<div class="registro">
		<a href="login.php"><button>
				<p>Login</p>
			</button></a>
	</div>

	<nav class="menu">
        <article class="fundo_menu">
            <ul>
                <li>
                    <p>Home</p><a href="index.html" target="_self"><img src="imagens/casa.png" width="50"
                            height="50"></a>
                </li>
                <li>
                    <p>Armário</p><a href="armario.php" target="_self"><img src="imagens/armario.png" width="50"
                            height="50"></a>
                </li>
                <li>
                    <p>Estilos</p><a href="estilos.html" target="_self"><img src="imagens/camisa.png" width="50"
                            height="50"></a>
                </li>
                <li>
                    <p>Loja</p><a href="lojas.html" target="_self"><img src="imagens/bolsa.png" width="50"
                            height="50"></a>
                </li>
            </ul>
        </article>
    </nav>
	<div class="form_cadastro-login">
		<fieldset>
			<legend>Cadastro do cliente</legend>
			<form method="post" action="form.php">
				<label for="nome">Nome:</label>
				<input type="text" id="nome" name="nome">

				<label for="email">Email:</label>
				<input type="email" id="email" name="email">

				<label for="cpf">CPF:</label>
				<input type="text" id="cpf" name="cpf" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="11">
				
				<label for="senha">Senha:</label>
				<input type="password" id="senha" name="senha">
				
				<div class="olho">

					<script src="showPassword.js"></script>
					<script src="https://cdn.lordicon.com/lordicon.js"></script>
					<lord-icon
					src="https://cdn.lordicon.com/dicvhxpz.json"
					trigger="hover"
					colors="primary:#e0f7e9,secondary:#e0f7e9"
					style="width:25px;height:25px">
					</lord-icon>
				</div>
			

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
		$cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_NUMBER_INT);
		$nome = filter_var($_POST['nome']);
		$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
		$senha = filter_var($_POST['senha']);

		if ($cpf && $nome && $email) {
			// Verificando se o cpf já existe no banco de dados
			$sql_check = $conexao->prepare("SELECT cpf FROM tbl_usuario WHERE cpf = ?");
			$sql_check->bind_param("s", $cpf);
			$sql_check->execute();
			$sql_check->store_result();

			if ($sql_check->num_rows > 0) {
				echo "<p id='error-message'> CPF já cadastrado.</p>";
				$sql_check->close();  // Fecha o statement antes de sair
				return;  // Para a execução aqui
			}

			// Preparando a inserção de dados
			$stmt = $conexao->prepare("INSERT INTO tbl_usuario (cpf, nome, email, senha) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $cpf, $nome, $email, $senha);

			// Executando o INSERT apenas se o CPF não estiver no banco
			if ($stmt->execute()) {
				echo "<p id='success-message'> Cadastro realizado com sucesso.</p>";
			} else {
				echo "<p id='error-message'> Erro ao realizar cadastro. Por favor, tente novamente.</p>";
			}

			$stmt->close();  // Fechando o statement
		} else {
			echo "<p id='error-message'>Dados inválidos.</p>";
		}


		$conexao->close();  // Fechando a conexão
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
	<script src="messagem_temp.js"></script>
</body>

</html>