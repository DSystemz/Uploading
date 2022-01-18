<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Valorant - Pixyl</title>
</head>
<body>
<h1>Envie a foto para o nosso Banco de Dados</h1>
<p>Seja muito bem vindo a Pixyl! Uma comunidade voltada para jogadores de Valorant, certifique-se de que conhece os melhores Pixels, fique por dentro do nosso fórum que mantém sempre um conteúdo atualizado referente ao lançamento de novos agentes, rankings, torneios e muito mais</p>
	<form method="POST" action="proc_upload.php" enctype="multipart/form-data">
	Imagem: <input name="arquivo" type="file"><br><br>
	<input type="submit" value="Enviar">
</form>
</body>
</html>
