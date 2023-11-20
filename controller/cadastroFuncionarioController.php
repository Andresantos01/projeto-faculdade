<?php
require_once '../database/conexao.php';

class CadastroFuncionarioController extends ConexaoMySQL
{
    private $nome;
    private $usuario;
    private $senha;
    public function cadastrar()
    {
    /* ---------------- verifica se recebeu um post com os campos --------------- */
    if (isset($_POST['nome']) && isset($_POST['usuario']) && isset($_POST['senha'])) {

        $this->nome = $_POST['nome']; 
        $this->usuario = $_POST['usuario'];

        /* -------- essa PASSWORD_BCRYPT é usada para gerar a senha criptografada -------- */
        $this->senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

        /* --------------------- conexao com banco estabelecida --------------------- */
        $conn = $this->conexao();
        
        /* ----------------- previne invasão por querys maliciosas ----------------- */
        $consulta = $conn->prepare("INSERT INTO funcionario (nome, usuario, senha) VALUES (?, ?, ?);");

        /* -------------- os "sss" são referentes aos parametros string ------------- */
        $consulta->bind_param("sss", $this->nome, $this->usuario, $this->senha); 

        if ($consulta->execute()) {
        
            echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href = '../view/viewLogin.php';</script>";
        
        } else {
        
            echo "Erro ao criar novo usuário!";
        
        }
        } else {
            echo 'Os campos usuário, senha e nome são obrigatórios!';
        }
    }

}

$cadastro = new CadastroFuncionarioController();
$cadastro->cadastrar();