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
					<p>Armário</p><a href="armario.html" target="_self"><img src="imagens/armario.png" width="50"
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

	<?php
	include_once('conexao.php');
	if (isset($_POST['submit']))
	?>

	<div class="form_add_peca">
		<fieldset>
			<legend>Adicionar peça de roupa</legend>
			<form method="post" action="add_peca.php" enctype="multipart/form-data">
					<p for="categor">Tipo de roupa:</p>
					<select size="1" name="categor">
						<?php
					// gera a lista de categorias
					$res = mysqli_query($conexao, "SELECT * FROM tbl_categoria");
					while ($registro = mysqli_fetch_row($res)) {
						$cod = $registro[0];
						$nome = $registro[1];
						echo "<option value=\"$cod\">$cod - $nome</option>\n";
					}
						?>
					</select>

					<p>Imagem da roupa:</p>
					<label class="add_peca_input">
						<h1>selecionar imagem</h1>
					<input type="file" id="upload" name="upload" accept="image/*">
					</label>

					<div class="input">
						<input type="submit" value="Enviar" name="submit">
						<input type="reset" value="Limpar tudo" name="limpar">
					</div>
				</form>
			</fieldset>
	</div>

</body>
</html>

<?php
include_once('conexao.php'); // Certifique-se de que a conexão com o banco de dados está incluída

if (isset($_POST['submit'])) {
	
	$categoria = $_POST['categor']; // Obtém a categoria selecionada no formulário

    // Verifique se o arquivo foi enviado sem erros
    if (isset($_FILES['upload']) && $_FILES['upload']['error'] == 0) {
        $arquivoTmp = $_FILES['upload']['tmp_name'];
        $nomeArquivoOriginal = $_FILES['upload']['name'];
        
        // Defina o caminho onde deseja salvar o arquivo
        $diretorioDestino = 'uploads/'; // Certifique-se de que esta pasta existe e possui permissão de escrita
        
        // Personalize o nome do arquivo usando o nome do produto e categoria
        $categoria = $_POST['categor']; // Certifique-se de que existe um campo 'categoria' no formulário
        
        // Limpa os valores para evitar caracteres especiais
        $categoriaLimpo = preg_replace("/[^a-zA-Z0-9_\-]/", "", $categoria);
        
        // Obtém a extensão do arquivo
        $extensao = pathinfo($nomeArquivoOriginal, PATHINFO_EXTENSION);
        
        // Gera um nome de arquivo personalizado
        $nomeNovoArquivo = "_categoria_" . $categoriaLimpo . "_" . uniqid() . "." . $extensao;
        $caminhoCompleto = $diretorioDestino . $nomeNovoArquivo;
        
        // Move o arquivo temporário para o diretório de destino
        if (move_uploaded_file($arquivoTmp, $caminhoCompleto)) {
            echo "<p id='success-message'>Imagem enviada com sucesso! </p>";
        } else {
            echo "<p id='error-message'>Erro ao salvar a imagem.</p>";
        }
    } else {
        echo "<p id='error-message'>Nenhum arquivo foi enviado ou ocorreu um erro.</p>";
    }
	header("Location: armario.html");
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
<script src="inserir_img_armario.js"></script>

</body>

</html>