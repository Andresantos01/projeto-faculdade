<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <h1>VEICULOS</h1>
    <p>cadastre aqui um novo veiculo</p>
    <form action="../controller/veiculoController.php" method="post">

        <label for="tipo">Tipo do veículo:</label>
        <input type="text" name="tipo" id="tipo" placeholder="digite o tipo do veículo" required maxlength="255">


        <label for="marca">Marca do veículo:</label>
        <input type="text" name="marca" id="marca" placeholder="digite a marca do veículo" required maxlength="255">


        <label for="modelo">Modelo do veículo:</label>
        <input type="text" name="modelo" id="modelo" placeholder="digite o modelo do veículo" required maxlength="255">
       

        <label for="cor">Cor do veículo:</label>
        <input type="text" name="cor" id="cor" placeholder="digite a cor do veículo" required maxlength="255">
      
      
        <label for="placa">Placa do veículo:</label>
        <input type="text" name="placa" id="placa" placeholder="digite a placa do veículo" required maxlength="255">
       
       
        <label for="ano">Ano do veículo:</label>
        <input type="number" name="ano" id="ano" placeholder="digite o ano do veículo" required >


        <input type="submit" value="Cadastrar">

    </form>

    <div class='listar-veiculos'>
        <!-- falta usar a requisição para buscar os veiculos cadastrados -->
        <!-- aqui terá o editar e excluir do veiculo -->
        <!-- visualização em cards -->
    </div>
</body>
</html>
