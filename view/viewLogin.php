<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../css/view-login.css" rel="stylesheet"/>
</head>
<body>
    <h1>Cadastrar novo funcionário</h1>
    <form action="../controller/loginController.php" method="post">
        <label for="nome">Usuário:</label>
        <input type="text" name="usuario" placeholder="usuário" id="nome" required maxlength="255">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" placeholder="senha" id="senha" required maxlength="255">
        
        <input type="submit" value="Entrar">

    </form> 
    <a href="./viewCadastroFuncionario.php">
        <button>
        Cadastrar novo funcionário
        </button>
    </a>

    
</body>
</html>