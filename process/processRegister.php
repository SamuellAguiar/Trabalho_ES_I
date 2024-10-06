<?php
// Conectar ao banco de dados 
$servername = "localhost:3307";
$username = "root";
$password = "Samlat03";
$dbname = "pizzaria";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
     die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Processar dados de registro
if( $_SERVER["REQUEST_METHOD"]  == "POST"){
     $username = $_POST['username'];
     $password = $_POST['password'];
     $confirmPassword = $_POST['confirmPassword'];

     // Verificar se as senhas coincidem
     if($password != $confirmPassword){
          header("Location: ../register.php?error=As senhas não coincidem");
          exit();
     }

     // Verificar se o usuário já existe
     $sql = "SELECT * FROM usuarios WHERE username='$username'";
     $result = $conn->query($sql);

     if($result->num_rows > 0){
          header("Location: ../register.php?error=O usuário já existe");
          exit();
     }

     // Registrar o novo usuário
     $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";

     if($conn->query($sql) === TRUE){
          header("Location: ../login.php");
     } else{
          echo "Erro: " . $sql . "<br>" . $conn->error;
     }
}
?>

