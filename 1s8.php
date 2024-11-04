<?php
// Configuração do banco de dados
$servername = "192.168.18.85";
$username = "root";
$password = "root";
$dbname = "1s8";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
	die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Coletar dados do formulário
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$mensagem = $_POST["mensagem"];
	
	// Inserir dados no banco de dados
	$sql = "INSERT INTO dados (nome, email, telefone, mensagem) VALUES ('$nome', '$email', '$telefone', '$mensagem')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Dados enviados com sucesso!";
	} else {
		echo "Erro ao enviar dados: " . $conn->error;
	}
	
	// Fechar conexão
	$conn->close();
}
?>