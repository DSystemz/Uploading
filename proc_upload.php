<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Upload de Imagem - PIXYL</title>
</head>
<body>
<?php
	include_once("db_connect.php");
	$arquivo = $_FILES['arquivo']['name'];

	$_UP['pasta'] = 'img/';

	//Tamanho do arquivo em Bytes
	$_UP['tamanho'] = 1024*1024*100;

	//Array com as extensões permitidas
	$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

	//Renomear arquivo
	$_UP['renomeia'] = false;

	//Array com os possíveis erros de upload
	$_UP['erros'] [0] = 'Não houve erro';
	$_UP['erros'] [1] = 'O arquivo no upload é maior que o limite do PHP';
	$_UP['erros'] [2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
	$_UP['erros'] [3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'] [4] = 'Não foi feito o upload do arquivo';

	//Verifica se houve algum erro com o upload. Se sim exibe mensagem de erro
	if($_FILES['arquivo']['error'] != 0){
		die("Não foi possível fazer o upload, erro: <br />". $_UP['error'][$_FILES['arquivo']['error']]);
		exit;
	}
	//Faz a verificação da extensao do arquivo
	$extensao = strtolower(end(explode(('.'), $_FILES['arquivo']['name'])));
	if(array_search($extensao, $_UP['extensoes']) === false) {
		echo "
			<META HTTP-EQUIV-REFRESH CONTENT = '0;URL=http://localhost/upload.php'>
			<script type=\"text/javascript\">
				alert(\"A imagem não foi cadastrada, extensão inválida.\");
			</script>";
	}
	//Faz a verificação do tamanho do Arquivo
	else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
		echo "
			<META HTTP-EQUIV-REFRESH CONTENT = '0;URL=http://localhost/upload.php'>
			<script type=\"text/javascript\">
				alert(\"Arquivo muito grande.\");
			</script>";
	
	}else{
		if($_UP['renomeia'] == true){
			$nome_final = time().'.jpg';
		
		}else{
			$nome_final = $_FILES['arquivo']['name'];
		
		}if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
			$query = mysqli_query($connect, "INSERT INTO arquivo (arquivo) VALUES('$nome_final')");
			echo "
				<META HTTP-EQUIV-REFRESH CONTENT = '0;URL=http://localhost/upload.php'>
				<script type=\"text/javascript\">
					alert(\"Imagem anexada ao banco de dados.\");
				</script>";

		}else{
			echo "
				<META HTTP-EQUIV-REFRESH CONTENT = '0;URL=http://localhost/upload.php'>
				<script type=\"text/javascript\">
					alert(\"Imagem não foi anexada ao banco de dados.).\");
				</script>
			";}
		}
?>
</body>
</html>
