<?php
include_once("templates/headerLogin.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Registro de Usuário</title>
     <link rel="shortcut icon" href="img/pizza.svg" type="image/x-icon">
     <link rel="stylesheet" href="css/register.css">
</head>

<body>
     <div class="register-container">
          <form action="process/processRegister.php" method="post">
               <h2>Registrar-se</h2>

               <?php
               // Exibir mensagens de erro, se houver
               if (isset($_GET['error'])) {
                    echo '<p style="color: red;">' . $_GET['error'] . '</p>';
               }
               ?>

               <label for="username">Usuário:</label>
               <input type="text" id="username" name="username" required>

               <label for="password">Senha:</label>
               <input type="password" id="password" name="password" required>

               <label for="confirmPassword">Confirmar Senha:</label>
               <input type="password" id="confirmPassword" name="confirmPassword" required>

               <button type="submit">Registrar</button>

               <!-- Link para voltar à página de login -->
               <div class="login-link">
                    <a href="login.php">Voltar ao Login</a>
               </div>
          </form>
     </div>

</body>

</html>

<?php
include_once("templates/footer.php");
?>