<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro funcionário</title>
</head>
<body>
    <h1>Cadastro</h1>
    <form action="../controller/cadastroFuncionarioController.php" method="post">

        <label for="nome">Nome do funcionário:</label>
        <input type="text" name="nome" placeholder="digite o nome do funcionário" id="nome" required maxlength="255">
       
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" placeholder="digite seu usuário de acesso" id="usuario" required maxlength="255">
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" placeholder="crie uma senha" id="senha" required maxlength="255">
        
        <input type="submit" value="Cadastrar">
    </form> 
</body>
</html>