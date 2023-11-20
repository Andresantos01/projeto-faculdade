<?php
require_once '../database/conexao.php';

class LoginController extends ConexaoMySQL
{
    private $usuario;
    private $senha;

    public function logar()
    {
        /* ---------------- verifica se recebeu um post com os campos --------------- */
        if (isset($_POST['usuario']) && isset($_POST['senha'])) {

            $this->usuario = $_POST['usuario'];
            $this->senha = $_POST['senha'];

            /* --------------------- conexao com banco estabelecida --------------------- */
            $conn = $this->conexao();

            /* ----------------- previne inversao por querys maliciosas ----------------- */
            $consulta = $conn->prepare("SELECT * FROM funcionario WHERE usuario = ?");
            $consulta->bind_param("s", $this->usuario);

            if ($consulta->execute()) {
                /* -------------------- pega o usuario no banco de dados -------------------- */
                $result = $consulta->get_result();

                /* ----------------- verifica se realmente existe o usuario ----------------- */
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    /* ----------------- verifica a senha usando password_verify ----------------- */
                    if (password_verify($this->senha, $row['senha'])) {
                        session_start();
                        $_SESSION['logado'] = true;
                        header('Location: ../view/viewHome.php');
                        /* -------------- logica para setar a sessao e tbm redireciona -------------- */
                    } else {
                        echo "Usuário e/ou senha inválidos!";
                    }
                } else {
                    echo "Usuário e/ou senha inválidos!";
                }
            } else {
                echo "Erro ao executar a consulta SQL: " . $conn->error;
            }

        } else {
            echo 'Os campos usuário e senha são obrigatórios!';
        }
    }
}

$login = new LoginController();
$login->logar();