<?php

class veiculoController extends ConexaoMySQL
{
    private $tipo;
    private $marca;
    private $modelo;
    private $ano;
    private $cor;
    private $placa;
    

    public function cadastrarVeiculo()
    {
        //pega os valores do frontend
        $this->tipo = $_POST['tipo'];
        $this->marca = $_POST['marca'];
        $this->modelo = $_POST['modelo'];
        $this->ano = $_POST['ano'];
        $this->cor = $_POST['cor'];
        $this->placa = $_POST['placa'];

        //estabelece coenxao com o banco de dados
        $conn = $this->conexao();
        
        // insere os dados do veiculo no banco 
        $inserirNoBanco = $conn->prepare("INSERT INTO veiculos (tipo,marca,modelo, ano,cor,placa) VALUES (?,?,?,?,?,?);");

        $inserirNoBanco->bind_param("ssssss",$this->tipo, $this->marca,$this->modelo, $this->ano, $this->cor, $this->placa);

        if ($inserirNoBanco->execute()) {
        
            echo "<script>alert('Veículo cadastrado com sucesso!'); window.location.href = '../view/viewHome.php';</script>";
        
        } else {
        
            echo "Erro ao criar um novo veículo!";
        
        }

    }

    public function listarVeiculos()
    {
        // Estabelece conexão com o banco de dados
        $conn = $this->conexao();
    
        $listar = $conn->prepare("SELECT * FROM veiculos;");
    
        if ($listar->execute()) {
    
            $result = $listar->get_result();  
    
            /* ----------------- Verifica se realmente existem veículos ----------------- */
            if ($result->num_rows > 0) {
                // pegamos todos os valores encontrados
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                
                // retornamos os valores
                return $rows;

            } else {
                echo "Não há veículos cadastrados.";
            }
    
        } else {
            echo "Erro ao listar veículos!";
        }
    }


    public function listarVeiculoPorId($id)
    {
        // Estabelece conexão com o banco de dados
        $conn = $this->conexao();

        // Seleciona o veículo pelo ID
        $listarPorId = $conn->prepare("SELECT * FROM veiculos WHERE id=?");
        $listarPorId->bind_param("i", $id);

        if ($listarPorId->execute()) {

            $result = $listarPorId->get_result();

            /* ----------------- Verifica se o veículo foi encontrado ----------------- */
            if ($result->num_rows > 0) {
                // Pega o primeiro (e único) resultado, já que deve retornar apenas um veículo pelo ID
                $row = $result->fetch_assoc();

                // Retorna os valores do veículo
                return $row;

            } else {
                echo "Veículo não encontrado.";
            }

        } else {
            echo "Erro ao listar veículo por ID!";
        }
    }



    public function atualizarVeiculo()
    {
        // Pega os valores do frontend
        $this->tipo = $_POST['tipo'];
        $this->marca = $_POST['marca'];
        $this->modelo = $_POST['modelo'];
        $this->ano = $_POST['ano'];
        $this->cor = $_POST['cor'];
        $this->placa = $_POST['placa'];

        // Estabelece conexão com o banco de dados
        $conn = $this->conexao();

        // Atualiza os dados do veiculo no banco
        $atualizarNoBanco = $conn->prepare("UPDATE veiculos SET tipo=?, marca=?, modelo=?, ano=?, cor=?, placa=? WHERE id=?");

        $atualizarNoBanco->bind_param("ssssssi", $this->tipo, $this->marca, $this->modelo, $this->ano, $this->cor, $this->placa, $_POST['id']);

        if ($atualizarNoBanco->execute()) {

            echo "<script>alert('Veículo atualizado com sucesso!'); window.location.href = '../view/viewHome.php';</script>";

        } else {

            echo "Erro ao atualizar o veículo!";
        }
    }


    public function deletarVeiculo()
    {
        //    pegar id na req
        $idVeiculo = $_POST['id'];

        // Estabelece conexão com o banco de dados
        $conn = $this->conexao();

        // Deleta o veículo do banco
        $deletarNoBanco = $conn->prepare("DELETE FROM veiculos WHERE id=?");

        $deletarNoBanco->bind_param("i", $idVeiculo);

        if ($deletarNoBanco->execute()) {

            echo "<script>alert('Veículo deletado com sucesso!'); window.location.href = '../view/viewHome.php';</script>";

        } else {

            echo "Erro ao deletar o veículo!";
        }
    }

    
}